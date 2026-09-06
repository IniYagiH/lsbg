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

        $list = $this->survailen_insidental->get_all_grouped_by_nib();
        $rows = array();

        foreach ($list as $item) {
            $rows[] = array(
                'id' => (int) $item->id,
                'nama_bu' => html_escape($item->nama_bu),
                'nib' => html_escape($item->nib),
                'id_izin' => html_escape($item->id_izin),
                'jenis_temuan' => html_escape($this->format_label($item->jenis_temuan)),
                'tgl_temuan' => $this->format_date($item->tgl_temuan),
                'tgl_temuan_order' => empty($item->tgl_temuan) || $item->tgl_temuan === '0000-00-00'
                    ? ''
                    : html_escape($item->tgl_temuan),
                'status' => $this->status_badge($item->status),
            );
        }

        $this->template->load(
            'menu/menu',
            'survailen_insidental/index',
            array('survailen_list' => $rows)
        );
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

    private function deny_access()
    {
        $this->session->set_flashdata('title', 'Warning');
        $this->session->set_flashdata('text', 'Anda tidak memiliki akses');
        $this->session->set_flashdata('class', 'warning');
        redirect('login', 'refresh');
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
