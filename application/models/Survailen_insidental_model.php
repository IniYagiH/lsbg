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

    public function save_assessment($nib, array $data)
    {
        $exists = $this->db
            ->where('NIB', $nib)
            ->count_all_results($this->assessment_table) > 0;

        if ($exists) {
            return $this->db
                ->where('NIB', $nib)
                ->update($this->assessment_table, $data);
        }

        $data['NIB'] = $nib;
        return $this->db->insert($this->assessment_table, $data);
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
        return $this->db
            ->where('NIB', $nib)
            ->where('status', 'AKTIF')
            ->update($this->appointment_table, array(
                'status' => 'DIBATALKAN',
                'updated_at' => date('Y-m-d H:i:s'),
            ));
    }
}