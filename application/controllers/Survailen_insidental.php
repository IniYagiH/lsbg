<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Survailen_insidental extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Survailen_insidental_model', 'survailen_insidental');
        $this->load->library('Template');
    }

    public function index()
    {
        if (!$this->has_access()) {
            $this->deny_access();
            return;
        }

        $this->template->load('menu/menu', 'survailen_insidental/index');
    }

    public function ajax_list()
    {
        if (!$this->has_access()) {
            $this->deny_access(true);
            return;
        }

        $list = $this->survailen_insidental->get_datatables();
        $data = array();
        $number = (int) $this->input->post('start');

        foreach ($list as $item) {
            $number++;

            $row = array();
            $row[] = $number;
            $row[] = html_escape($item->nama_bu);
            $row[] = html_escape($item->nib);
            $row[] = html_escape($item->id_izin);
            $row[] = $this->display_value($item->subklasifikasi);
            $row[] = $this->display_value($item->kualifikasi);
            $row[] = html_escape($this->format_label($item->jenis_temuan));
            $row[] = $this->format_date($item->tgl_temuan);
            $row[] = $this->status_badge($item->status);
            $row[] = '<a href="' . base_url('survailen-insidental/detail/' . (int) $item->id) . '" class="btn btn-sm btn-light-primary font-weight-bolder"><i class="la la-eye"></i>Detail</a>';
            $data[] = $row;
        }

        $output = array(
            'draw' => (int) $this->input->post('draw'),
            'recordsTotal' => $this->survailen_insidental->count_all(),
            'recordsFiltered' => $this->survailen_insidental->count_filtered(),
            'data' => $data,
        );

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($output));
    }

    public function detail($id = null)
    {
        if (!$this->has_access()) {
            $this->deny_access();
            return;
        }

        if ($id === null || !ctype_digit((string) $id)) {
            show_404();
            return;
        }

        if (!$this->survailen_insidental->find_by_id((int) $id)) {
            show_404();
            return;
        }

        $this->template->load(
            'menu/menu',
            'survailen_insidental/detail',
            array('id' => (int) $id)
        );
    }

    private function has_access()
    {
        return $this->ion_auth->ceklogin()
            && ($this->ion_auth->admin_pusat() || $this->ion_auth->pelaksana());
    }

    private function deny_access($json = false)
    {
        if ($json) {
            $this->output
                ->set_status_header(403)
                ->set_content_type('application/json')
                ->set_output(json_encode(array(
                    'draw' => (int) $this->input->post('draw'),
                    'recordsTotal' => 0,
                    'recordsFiltered' => 0,
                    'data' => array(),
                    'error' => 'Anda tidak memiliki akses.',
                )));
            return;
        }

        $this->session->set_flashdata('title', 'Warning');
        $this->session->set_flashdata('text', 'Anda tidak memiliki akses');
        $this->session->set_flashdata('class', 'warning');
        redirect('login', 'refresh');
    }

    private function display_value($value)
    {
        if ($value === null || trim($value) === '') {
            return '<span class="text-muted">-</span>';
        }

        return html_escape($value);
    }

    private function format_label($value)
    {
        return ucwords(strtolower(str_replace('_', ' ', (string) $value)));
    }

    private function format_date($value)
    {
        if (empty($value) || $value === '0000-00-00') {
            return '<span class="text-muted">-</span>';
        }

        $timestamp = strtotime($value);
        return $timestamp ? date('d-m-Y', $timestamp) : html_escape($value);
    }

    private function status_badge($status)
    {
        $classes = array(
            'BARU' => 'label-light-primary',
            'PROSES' => 'label-light-warning',
            'SELESAI' => 'label-light-success',
            'DIBATALKAN' => 'label-light-danger',
        );

        $status = strtoupper((string) $status);
        $class = isset($classes[$status]) ? $classes[$status] : 'label-light-dark';

        return '<span class="label label-inline ' . $class . ' font-weight-bold">'
            . html_escape($this->format_label($status))
            . '</span>';
    }
}
