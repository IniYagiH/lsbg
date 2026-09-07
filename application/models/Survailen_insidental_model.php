<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Survailen_insidental_model extends CI_Model
{
    private $table = 'lsbu_survailen_permohonan_accidental';
    private $assessment_table = 'lsbu_survailen_penilaian_insidental';
    private $appointment_table = 'lsbu_survailen_penunjukan_asesor_insidental';

    public function get_all_grouped_by_nib()
    {
        $sql = '
            SELECT
                accidental.id,
                grouped_accidental.id_izin,
                accidental.nib,
                accidental.nama_bu,
                accidental.jenis_temuan,
                accidental.uraian_temuan,
                accidental.tgl_temuan,
                accidental.status,
                accidental.created_at
            FROM ' . $this->table . ' accidental
            INNER JOIN (
                SELECT
                    nib,
                    MAX(id) AS latest_id,
                    GROUP_CONCAT(
                        DISTINCT NULLIF(TRIM(id_izin), \'\')
                        ORDER BY id_izin
                        SEPARATOR \', \'
                    ) AS id_izin
                FROM ' . $this->table . '
                GROUP BY nib
            ) grouped_accidental
                ON grouped_accidental.latest_id = accidental.id
            ORDER BY accidental.created_at DESC, accidental.id DESC
        ';

        return $this->db->query($sql)->result();
    }

    public function get_by_nib($nib)
    {
        return $this->db
            ->where('nib', $nib)
            ->order_by('id', 'desc')
            ->get($this->table)
            ->result();
    }

    public function get_assessment_by_nib($nib)
    {
        return $this->db
            ->where('NIB', $nib)
            ->limit(1)
            ->get($this->assessment_table)
            ->result_array();
    }

    public function get_assigned_requests($username)
    {
        $sql = "
            SELECT accidental.nib, accidental.nama_bu, grouped_accidental.id_izin,
                assigned.urutan_asesor, assigned.tgl_pelaksanaan,
                assessment.NIB AS assessment_nib,
                assessment.id_asesor AS penilai_terakhir, assessment.updated_at
            FROM " . $this->table . " accidental
            INNER JOIN (
                SELECT nib, MAX(id) AS latest_id,
                    GROUP_CONCAT(DISTINCT NULLIF(TRIM(id_izin), '')
                        ORDER BY id_izin SEPARATOR ', ') AS id_izin
                FROM " . $this->table . "
                GROUP BY nib
            ) grouped_accidental ON grouped_accidental.latest_id = accidental.id
            INNER JOIN (
                SELECT NIB, MIN(urutan_asesor) AS urutan_asesor,
                    MAX(tgl_pelaksanaan) AS tgl_pelaksanaan
                FROM " . $this->appointment_table . "
                WHERE id_asesor = ? AND status = 'AKTIF'
                GROUP BY NIB
            ) assigned ON assigned.NIB = accidental.nib COLLATE utf8mb4_unicode_ci
            LEFT JOIN " . $this->assessment_table . " assessment
                ON assessment.NIB = accidental.nib COLLATE utf8mb4_unicode_ci
            ORDER BY assigned.tgl_pelaksanaan DESC, accidental.id DESC
        ";

        return $this->db->query($sql, array($username))->result_array();
    }

    public function has_active_assignment($nib, $username)
    {
        if (trim((string) $username) === '') {
            return false;
        }

        return $this->db
            ->where('NIB', $nib)
            ->where('id_asesor', $username)
            ->where('status', 'AKTIF')
            ->count_all_results($this->appointment_table) > 0;
    }

    public function assessment_version(array $assessment)
    {
        // Include values as well as timestamps: two edits can occur in one second.
        return hash('sha256', serialize($assessment));
    }

    public function save_assessment($nib, array $data, $expected_version, $assigned_user = null)
    {
        $this->db->trans_begin();
        if (!$this->lock_request($nib)) {
            $this->db->trans_rollback();
            return 'error';
        }

        // Appointment changes acquire the same lock, so revocation cannot race a save.
        if ($assigned_user !== null && !$this->has_active_assignment($nib, $assigned_user)) {
            $this->db->trans_rollback();
            return 'forbidden';
        }

        $current = $this->get_assessment_by_nib($nib);
        if (!hash_equals($this->assessment_version($current), (string) $expected_version)) {
            $this->db->trans_rollback();
            return 'conflict';
        }

        if (!empty($current)) {
            $saved = $this->db
                ->where('NIB', $nib)
                ->update($this->assessment_table, $data);
        } else {
            $data['NIB'] = $nib;
            $saved = $this->db->insert($this->assessment_table, $data);
        }

        if (!$saved || $this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return 'error';
        }

        $this->db->trans_commit();
        return 'saved';
    }

    private function lock_request($nib)
    {
        // A stable existing row serializes writes even before the first assessment.
        $query = $this->db->query(
            'SELECT id FROM ' . $this->table
            . ' WHERE nib = ? ORDER BY id ASC LIMIT 1 FOR UPDATE',
            array($nib)
        );
        return $query !== false && $query->num_rows() > 0;
    }

    public function get_assessor_candidates(array $levels)
    {
        return $this->db
            ->select(
                'user.Username, user.Nama, user.level, '
                . 'propinsi.Nama AS nama_propinsi'
            )
            ->from('user')
            ->join('propinsi', 'propinsi.ID_Propinsi = user.Id_propinsi', 'left')
            ->where_in('user.level', $levels)
            ->group_by(array(
                'user.Username',
                'user.Nama',
                'user.level',
                'propinsi.Nama',
            ))
            ->order_by('user.Nama', 'asc')
            ->get()
            ->result_array();
    }

    public function is_valid_assessor($username, array $levels)
    {
        return $this->db
            ->where('Username', $username)
            ->where_in('level', $levels)
            ->count_all_results('user') > 0;
    }

    public function get_active_appointments_grouped()
    {
        return $this->db
            ->select(
                'appointment.NIB, '
                . 'GROUP_CONCAT('
                . 'CONCAT(appointment.urutan_asesor, \'. \', '
                . 'COALESCE(NULLIF(user.Nama, \'\'), appointment.id_asesor)) '
                . 'ORDER BY appointment.urutan_asesor SEPARATOR \', \') '
                . 'AS assessor_names, '
                . 'MAX(CASE WHEN appointment.urutan_asesor = 1 '
                . 'THEN appointment.id_asesor END) AS assessor_1, '
                . 'MAX(CASE WHEN appointment.urutan_asesor = 2 '
                . 'THEN appointment.id_asesor END) AS assessor_2, '
                . 'MAX(CASE WHEN appointment.urutan_asesor = 3 '
                . 'THEN appointment.id_asesor END) AS assessor_3, '
                . 'MAX(appointment.tgl_pelaksanaan) AS tgl_pelaksanaan',
                false
            )
            ->from($this->appointment_table . ' appointment')
            ->join('user', 'user.Username = appointment.id_asesor', 'left')
            ->where('appointment.status', 'AKTIF')
            ->group_by('appointment.NIB')
            ->get()
            ->result();
    }

    public function get_active_appointments($nib)
    {
        return $this->db
            ->select(
                'appointment.*, user.Nama, user.level, '
                . 'propinsi.Nama AS nama_propinsi'
            )
            ->from($this->appointment_table . ' appointment')
            ->join('user', 'user.Username = appointment.id_asesor', 'left')
            ->join('propinsi', 'propinsi.ID_Propinsi = user.Id_propinsi', 'left')
            ->where('appointment.NIB', $nib)
            ->where('appointment.status', 'AKTIF')
            ->order_by('appointment.urutan_asesor', 'asc')
            ->get()
            ->result_array();
    }

    public function replace_appointments(
        $nib,
        $accidental_id,
        $tgl_pelaksanaan,
        $user_penunjukan,
        array $appointments
    ) {
        $now = date('Y-m-d H:i:s');
        $this->db->trans_begin();
        if (!$this->lock_request($nib)) {
            $this->db->trans_rollback();
            return false;
        }

        $this->db
            ->where('NIB', $nib)
            ->where('status', 'AKTIF')
            ->update($this->appointment_table, array(
                'status' => 'DIBATALKAN',
                'updated_at' => $now,
            ));

        $rows = array();
        foreach ($appointments as $slot => $assessor) {
            if ($assessor === '') {
                continue;
            }

            $rows[] = array(
                'id_survailen_accidental' => (int) $accidental_id,
                'NIB' => $nib,
                'id_asesor' => $assessor,
                'urutan_asesor' => (int) $slot,
                'tgl_pelaksanaan' => $tgl_pelaksanaan,
                'tgl_penunjukan' => $now,
                'user_penunjukan' => $user_penunjukan,
                'status' => 'AKTIF',
            );
        }

        if (!empty($rows)) {
            $this->db->insert_batch($this->appointment_table, $rows);
        }

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        }

        $this->db->trans_commit();
        return true;
    }

    public function cancel_appointments($nib)
    {
        $this->db->trans_begin();
        if (!$this->lock_request($nib)) {
            $this->db->trans_rollback();
            return false;
        }

        $saved = $this->db
            ->where('NIB', $nib)
            ->where('status', 'AKTIF')
            ->update($this->appointment_table, array(
                'status' => 'DIBATALKAN',
                'updated_at' => date('Y-m-d H:i:s'),
            ));
        if (!$saved || $this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        }

        $this->db->trans_commit();
        return true;
    }
}