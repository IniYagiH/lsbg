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
}