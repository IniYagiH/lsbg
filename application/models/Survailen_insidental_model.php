<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Survailen_insidental_model extends CI_Model
{
    private $table = 'lsbu_survailen_permohonan_accidental';

    public function get_all_grouped_by_nib()
    {
        $sql = '
            SELECT
                accidental.id,
                accidental.id_izin,
                accidental.nib,
                accidental.nama_bu,
                accidental.jenis_temuan,
                accidental.uraian_temuan,
                accidental.tgl_temuan,
                accidental.status,
                accidental.created_at
            FROM ' . $this->table . ' accidental
            INNER JOIN (
                SELECT nib, MAX(id) AS latest_id
                FROM ' . $this->table . '
                GROUP BY nib
            ) grouped_accidental
                ON grouped_accidental.latest_id = accidental.id
            ORDER BY accidental.created_at DESC, accidental.id DESC
        ';

        return $this->db->query($sql)->result();
    }

    public function find_by_id($id)
    {
        return $this->db
            ->where('id', (int) $id)
            ->limit(1)
            ->get($this->table)
            ->row();
    }
}
