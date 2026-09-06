<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Survailen_insidental_model extends CI_Model
{
    private $table = 'lsbu_survailen_permohonan_accidental';

    private $column_order = array(
        null,
        'accidental.nama_bu',
        'accidental.nib',
        'accidental.id_izin',
        'subklasifikasi',
        'kualifikasi',
        'accidental.jenis_temuan',
        'accidental.tgl_temuan',
        'accidental.status',
        null,
    );

    private $column_search = array(
        'accidental.nama_bu',
        'accidental.nib',
        'accidental.id_izin',
        'accidental.jenis_temuan',
        'accidental.uraian_temuan',
        'accidental.status',
        'registrasi.id_sub_klasifikasi',
        'registrasi.kualifikasi',
    );

    private $order = array(
        'accidental.created_at' => 'desc',
        'accidental.id' => 'desc',
    );

    private function build_datatables_query($with_order = true)
    {
        $this->db->select(
            'accidental.id, accidental.id_izin, accidental.nib, accidental.nama_bu, '
            . 'accidental.jenis_temuan, accidental.uraian_temuan, accidental.tgl_temuan, '
            . 'accidental.status, accidental.created_at, '
            . 'GROUP_CONCAT(DISTINCT registrasi.id_sub_klasifikasi '
            . 'ORDER BY registrasi.id_sub_klasifikasi SEPARATOR ", ") AS subklasifikasi, '
            . 'GROUP_CONCAT(DISTINCT registrasi.kualifikasi '
            . 'ORDER BY registrasi.kualifikasi SEPARATOR ", ") AS kualifikasi',
            false
        );
        $this->db->from($this->table . ' accidental');
        $this->db->join(
            'lsbu_registrasi registrasi',
            'registrasi.NIB = accidental.nib AND registrasi.id_izin = accidental.id_izin',
            'left'
        );

        $this->apply_search();

        $this->db->group_by(array(
            'accidental.id',
            'accidental.id_izin',
            'accidental.nib',
            'accidental.nama_bu',
            'accidental.jenis_temuan',
            'accidental.uraian_temuan',
            'accidental.tgl_temuan',
            'accidental.status',
            'accidental.created_at',
        ));

        if ($with_order) {
            $this->apply_order();
        }
    }

    private function apply_search()
    {
        $search = $this->input->post('search');
        $search_value = is_array($search) && isset($search['value'])
            ? trim($search['value'])
            : '';

        if ($search_value === '') {
            return;
        }

        $this->db->group_start();
        foreach ($this->column_search as $index => $column) {
            if ($index === 0) {
                $this->db->like($column, $search_value);
            } else {
                $this->db->or_like($column, $search_value);
            }
        }
        $this->db->group_end();
    }
    private function apply_order()
    {
        $requested_order = $this->input->post('order');

        if (is_array($requested_order) && isset($requested_order[0]['column'])) {
            $column_index = (int) $requested_order[0]['column'];
            $direction = isset($requested_order[0]['dir'])
                ? strtolower($requested_order[0]['dir'])
                : 'asc';
            $direction = $direction === 'desc' ? 'desc' : 'asc';

            if (isset($this->column_order[$column_index]) && $this->column_order[$column_index]) {
                $this->db->order_by($this->column_order[$column_index], $direction);
                return;
            }
        }

        foreach ($this->order as $column => $direction) {
            $this->db->order_by($column, $direction);
        }
    }

    public function get_datatables()
    {
        $this->build_datatables_query();

        $length = (int) $this->input->post('length');
        $start = max(0, (int) $this->input->post('start'));

        if ($length !== -1) {
            $length = max(1, min($length, 100));
            $this->db->limit($length, $start);
        }

        return $this->db->get()->result();
    }

    public function count_filtered()
    {
        $this->db->select('COUNT(DISTINCT accidental.id) AS total', false);
        $this->db->from($this->table . ' accidental');
        $this->db->join(
            'lsbu_registrasi registrasi',
            'registrasi.NIB = accidental.nib AND registrasi.id_izin = accidental.id_izin',
            'left'
        );
        $this->apply_search();

        $row = $this->db->get()->row();
        return $row ? (int) $row->total : 0;
    }

    public function count_all()
    {
        return $this->db->count_all($this->table);
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
