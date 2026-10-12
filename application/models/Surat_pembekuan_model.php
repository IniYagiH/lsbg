<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat_pembekuan_model extends CI_Model
{
    public function ready()
    {
        return $this->db->table_exists('lsbu_surat_pembekuan')
            && $this->db->table_exists('lsbu_surat_pembekuan_email');
    }

    public static function identity($nib, $izin)
    {
        return hash('sha256', json_encode(array((string) $nib, (string) $izin)));
    }

    public function find($id)
    {
        return $this->db->query('SELECT * FROM lsbu_surat_pembekuan WHERE id = ?', array($id))->row_array();
    }

    public function latest($nib, $izin)
    {
        return $this->db->query('SELECT * FROM lsbu_surat_pembekuan WHERE nib = ? AND id_izin = ? ORDER BY id DESC LIMIT 1',
            array($nib, $izin))->row_array();
    }

    public function status_map()
    {
        // All attempts remain available, including success on an earlier revision.
        $letters = $this->db->query('SELECT id, nib, id_izin, nomor_surat FROM lsbu_surat_pembekuan ORDER BY id')->result_array();
        $attempts = $this->db->query("SELECT e.*, s.nib, s.id_izin FROM lsbu_surat_pembekuan_email e
            JOIN lsbu_surat_pembekuan s ON s.id = e.surat_id
            WHERE e.id IN (SELECT MAX(id) FROM lsbu_surat_pembekuan_email GROUP BY surat_id)
               OR e.id IN (SELECT MAX(id) FROM lsbu_surat_pembekuan_email WHERE status = 'SENT' GROUP BY surat_id)
            ORDER BY e.id")->result_array();
        $map = array();
        foreach ($letters as $letter) {
            $key = self::identity($letter['nib'], $letter['id_izin']);
            $map[$key] = array('letter' => $letter, 'last' => null, 'success' => null);
        }
        foreach ($attempts as $attempt) {
            $key = self::identity($attempt['nib'], $attempt['id_izin']);
            $map[$key]['last'] = $attempt;
            if ($attempt['status'] === 'SENT') $map[$key]['success'] = $attempt;
        }
        return $map;
    }

    public function issue(array $row, array $sp2, $expected, $user)
    {
        // Serialize numbering and revision allocation across every application worker.
        $lock = $this->db->query("SELECT GET_LOCK(CONCAT(DATABASE(), ':surat_pembekuan'), 10) AS acquired")->row_array();
        if (empty($lock['acquired'])) throw new RuntimeException('Penerbitan sedang berjalan. Coba kembali.');
        $debug = $this->db->db_debug;
        $this->db->db_debug = false;
        try {
            if (!$this->db->trans_begin()) throw new RuntimeException('Transaksi gagal.');
            $latest = $this->latest($row['nib'], $row['id_izin']);
            if ((string) ($latest ? $latest['id'] : '0') !== (string) $expected) {
                throw new RuntimeException('Surat telah diterbitkan pengguna lain. Muat ulang daftar.');
            }
            $now = new DateTimeImmutable('now', new DateTimeZone('Asia/Jakarta'));
            $year = (int) $now->format('Y');
            $result = $this->db->query('SELECT COALESCE(MAX(urutan), 0) AS last_number FROM lsbu_surat_pembekuan WHERE tahun = ?', array($year))->row_array();
            $sequence = (int) $result['last_number'] + 1;
            $this->load->library('Surat_pembekuan');
            $values = $this->surat_pembekuan->defaults($sequence, $now);
            $values['nomor_sp2'] = '';
            $values['tanggal_sp2'] = '';
            // Store only document fields, not transient snapshot IDs or sync timestamps.
            $snapshot = array_intersect_key($row, array_flip(array('nib', 'id_izin', 'nama_bu',
                'kode_subklasifikasi', 'id_kualifikasi', 'keterangan')));
            $record = array('nib' => $row['nib'], 'id_izin' => $row['id_izin'],
                'revisi' => $latest ? (int) $latest['revisi'] + 1 : 1, 'tahun' => $year,
                'urutan' => $sequence, 'nomor_surat' => $values['nomor_surat'],
                'tanggal_surat' => $values['tanggal_surat'],
                'snapshot_json' => json_encode($snapshot, JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR),
                'surat_json' => json_encode($values, JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR),
                'created_by' => (string) $user, 'created_at' => $now->format('Y-m-d H:i:s'));
            if (!$this->db->insert('lsbu_surat_pembekuan', $record)) throw new RuntimeException('Penyimpanan gagal.');
            $record['id'] = $this->db->insert_id();
            if (!$this->db->trans_status() || !$this->db->trans_commit()) throw new RuntimeException('Penyimpanan gagal.');
            return $record;
        } catch (Throwable $e) {
            $this->db->trans_rollback();
            throw new RuntimeException('Surat tidak diterbitkan. Muat ulang halaman dan coba kembali.', 0, $e);
        } finally {
            $this->db->db_debug = $debug;
            $this->db->query("SELECT RELEASE_LOCK(CONCAT(DATABASE(), ':surat_pembekuan'))");
        }
    }

    public function begin_email($id, $recipient, $user)
    {
        $debug = $this->db->db_debug;
        $this->db->db_debug = false;
        try {
            if (!$this->db->insert('lsbu_surat_pembekuan_email', array(
                'surat_id' => $id, 'penerima' => $recipient, 'is_test' => 1, 'status' => 'PENDING',
                'created_by' => (string) $user,
                'created_at' => (new DateTimeImmutable('now', new DateTimeZone('Asia/Jakarta')))->format('Y-m-d H:i:s')
            ))) throw new RuntimeException('Tidak dapat mencatat pengiriman.');
            return $this->db->insert_id();
        } finally {
            $this->db->db_debug = $debug;
        }
    }

    public function finish_email($id, $sent)
    {
        $debug = $this->db->db_debug;
        $this->db->db_debug = false;
        try {
            return $this->db->where('id', $id)->update('lsbu_surat_pembekuan_email', array(
                'status' => $sent ? 'SENT' : 'FAILED',
                'finished_at' => (new DateTimeImmutable('now', new DateTimeZone('Asia/Jakarta')))->format('Y-m-d H:i:s')
            ));
        } finally {
            $this->db->db_debug = $debug;
        }
    }
}
