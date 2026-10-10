<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sanksi_administratif_model extends CI_Model
{
    private $table = 'lsbu_sanksi_administratif_sbu';
    private $sync = 'lsbu_sanksi_administratif_sync';

    public function ready()
    {
        return $this->db->table_exists($this->table) && $this->db->table_exists($this->sync);
    }

    public function listing($search)
    {
        $sql = 'SELECT * FROM ' . $this->table;
        $params = array();
        if ($search !== '') {
            $sql .= ' WHERE LOCATE(?, nama_bu) > 0 OR LOCATE(?, nib) > 0 OR LOCATE(?, id_izin) > 0
                OR LOCATE(?, kode_subklasifikasi) > 0 OR LOCATE(?, id_kualifikasi) > 0 OR LOCATE(?, keterangan) > 0';
            $params = array_fill(0, 6, $search);
        }
        return $this->db->query($sql . ' ORDER BY nama_bu, nib, id_izin, id', $params)->result_array();
    }

    public function find_by_id($id)
    {
        return $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = ?', array($id))->row_array();
    }

    public function last_sync()
    {
        return $this->db->query('SELECT synced_at, row_count FROM ' . $this->sync . ' WHERE id = 1')->row_array();
    }

    public function acquire_lock()
    {
        $row = $this->db->query("SELECT GET_LOCK(CONCAT(DATABASE(), ':sanksi_sbu'), 0) AS acquired")->row_array();
        return isset($row['acquired']) && (string) $row['acquired'] === '1';
    }

    public function release_lock()
    {
        $this->db->query("SELECT RELEASE_LOCK(CONCAT(DATABASE(), ':sanksi_sbu'))");
    }

    public function replace_snapshot(array $rows)
    {
        $debug = $this->db->db_debug;
        $this->db->db_debug = false;
        try {
            if (!$this->db->trans_begin()) {
                throw new RuntimeException('Tidak dapat memulai penyimpanan.');
            }
            // DELETE is transactional; TRUNCATE would commit before the inserts.
            if (!$this->db->query('DELETE FROM ' . $this->table)) {
                throw new RuntimeException('Tidak dapat menyimpan snapshot.');
            }
            $now = date('Y-m-d H:i:s');
            foreach (array_chunk($rows, 200) as $chunk) {
                foreach ($chunk as &$row) {
                    $row['synced_at'] = $now;
                }
                unset($row);
                if ($this->db->insert_batch($this->table, $chunk) === false) {
                    throw new RuntimeException('Tidak dapat menyimpan snapshot.');
                }
            }
            if (!$this->db->query('INSERT INTO ' . $this->sync . ' (id, synced_at, row_count)
                VALUES (1, ?, ?) ON DUPLICATE KEY UPDATE synced_at = VALUES(synced_at), row_count = VALUES(row_count)',
                array($now, count($rows))) || !$this->db->trans_status() || !$this->db->trans_commit()) {
                throw new RuntimeException('Tidak dapat menyelesaikan penyimpanan.');
            }
        } catch (Throwable $e) {
            $this->db->trans_rollback();
            throw new RuntimeException('Penyimpanan gagal. Snapshot lama dipertahankan.', 0, $e);
        } finally {
            $this->db->db_debug = $debug;
        }
    }
}
