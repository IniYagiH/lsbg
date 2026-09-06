<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Survailen_insidental extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Survailen_insidental_model', 'survailen_insidental');
        $this->load->library('Template');
        $this->load->helper('ssl');
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
                'nama_bu' => html_escape($item->nama_bu),
                'nib' => html_escape($item->nib),
                'id_izin' => html_escape($item->id_izin),
                'jenis_temuan' => html_escape($this->format_label($item->jenis_temuan)),
                'tgl_temuan' => $this->format_date($item->tgl_temuan),
                'tgl_temuan_order' => empty($item->tgl_temuan) || $item->tgl_temuan === '0000-00-00'
                    ? ''
                    : html_escape($item->tgl_temuan),
                'status' => $this->status_badge($item->status),
                'detail_url' => html_escape(
                    base_url('survailen-insidental/detail/' . encrypt_url($item->nib))
                ),
            );
        }

        $this->template->load(
            'menu/menu',
            'survailen_insidental/index',
            array('survailen_list' => $rows)
        );
    }

    public function detail($token = null)
    {
        if (!$this->has_access()) {
            $this->deny_access();
            return;
        }

        if (empty($token)) {
            show_404();
            return;
        }

        $nib = decrypt_url($token);
        if ($nib === false || trim((string) $nib) === '') {
            show_404();
            return;
        }

        $records = $this->survailen_insidental->get_by_nib((string) $nib);
        if (empty($records)) {
            show_404();
            return;
        }

        $latest = $records[0];
        $history = array();
        $permit_ids = array();
        $assessors = array();

        foreach ($records as $record) {
            $history[] = $this->prepare_record($record);

            $permit_id = trim((string) $record->id_izin);
            if ($permit_id !== '') {
                $permit_ids[$permit_id] = html_escape($permit_id);
            }

            foreach (array('asesor_1', 'asesor_2', 'asesor_3') as $assessor_column) {
                $assessor = trim((string) $record->{$assessor_column});
                if ($assessor !== '') {
                    $assessors[$assessor] = html_escape($assessor);
                }
            }
        }

        ksort($permit_ids, SORT_NATURAL);
        ksort($assessors, SORT_NATURAL);

        $data = array(
            'badan_usaha' => array(
                'nama_bu' => $this->display_value($latest->nama_bu),
                'nib' => $this->display_value($latest->nib),
                'total_temuan' => count($records),
            ),
            'id_izin_list' => array_values($permit_ids),
            'assessor_list' => array_values($assessors),
            'temuan_terbaru' => $history[0],
            'riwayat_temuan' => $history,
        );

        $this->template->load('menu/menu', 'survailen_insidental/detail', $data);
    }

    private function prepare_record($record)
    {
        return array(
            'id' => (int) $record->id,
            'id_izin' => $this->display_value($record->id_izin),
            'jenis_temuan' => $this->display_value($this->format_label($record->jenis_temuan)),
            'uraian_temuan' => $this->display_multiline($record->uraian_temuan),
            'detail_temuan' => $this->display_multiline($record->detail_temuan),
            'tgl_temuan' => $this->format_date($record->tgl_temuan),
            'tgl_temuan_order' => $this->date_order_value($record->tgl_temuan),
            'status' => $this->status_badge($record->status),
            'tgl_permohonan' => $this->format_date($record->tgl_permohonan),
            'tgl_penunjukan' => $this->format_date($record->tgl_penunjukan),
            'user_penunjukan' => $this->display_value($record->user_penunjukan),
            'tgl_penilaian' => $this->format_date($record->tgl_penilaian),
            'user_penilaian' => $this->display_value($record->user_penilaian),
            'asesor_1' => $this->display_value($record->asesor_1),
            'asesor_2' => $this->display_value($record->asesor_2),
            'asesor_3' => $this->display_value($record->asesor_3),
            'keputusan' => $this->display_value($record->keputusan),
            'comment' => $this->display_multiline($record->comment),
            'sumber_data' => $this->display_value($record->sumber_data),
            'created_at' => $this->format_datetime($record->created_at),
            'updated_at' => $this->format_datetime($record->updated_at),
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

    private function display_value($value)
    {
        if ($value === null || trim((string) $value) === '') {
            return '<span class="text-muted">-</span>';
        }

        return html_escape($value);
    }

    private function display_multiline($value)
    {
        if ($value === null || trim((string) $value) === '') {
            return '<span class="text-muted">-</span>';
        }

        return nl2br(html_escape($value));
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

    private function date_order_value($value)
    {
        return empty($value) || $value === '0000-00-00' ? '' : html_escape($value);
    }

    private function format_datetime($value)
    {
        if (empty($value) || $value === '0000-00-00 00:00:00') {
            return '<span class="text-muted">-</span>';
        }

        $timestamp = strtotime($value);
        return $timestamp ? date('d-m-Y H:i', $timestamp) : html_escape($value);
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