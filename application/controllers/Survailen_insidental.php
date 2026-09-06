<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Survailen_insidental extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Survailen_insidental_model', 'survailen_insidental');
        $this->load->model('bu/Bu_model');
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

        $nib = $this->decode_nib($token);
        if ($nib === false) {
            show_404();
            return;
        }

        $records = $this->survailen_insidental->get_by_nib($nib);
        if (empty($records)) {
            show_404();
            return;
        }

        $latest = $records[0];
        $penilaian = $this->survailen_insidental->get_assessment_by_nib($nib);
        if (empty($penilaian)) {
            $penilaian = array(array(
                'ketidaksesuaian' => $latest->uraian_temuan,
            ));
        }

        $data = array(
            'biodata' => $this->Bu_model->biodata_opr($nib),
            'biodata_perubahan' => $this->Bu_model->biodata_opr_izin_survailen($nib),
            'pengurus' => $this->Bu_model->pengurus_opr($nib),
            'pengurus_perubahan' => array(),
            'penjualan_tahunan' => $this->Bu_model->pengalaman_opr($nib),
            'penjualan_tahunan_perubahan' => $this->Bu_model->pengalaman_opr_izin_survailen($nib),
            'akte' => $this->Bu_model->akte_opr($nib),
            'akte_perubahan' => $this->Bu_model->akte_opr_izin_survailen($nib),
            'smap' => $this->Bu_model->smap_opr($nib),
            'smap_perubahan' => $this->Bu_model->smap_opr_izin_survailen($nib),
            'neraca' => $this->Bu_model->neraca_ski($nib),
            'neraca_perubahan' => $this->Bu_model->neraca_ski_izin_survailen($nib),
            'pemegang_saham' => $this->Bu_model->pemegang_saham_opr($nib),
            'pemegang_saham_perubahan' => array(),
            'pjbu' => $this->Bu_model->pjbu_opr($nib),
            'pjbu_perubahan' => $this->Bu_model->pjbu_opr_izin_survailen($nib),
            'pjskbu' => $this->Bu_model->pjskbu_opr($nib),
            'pjskbu_perubahan' => $this->Bu_model->pjskbu_opr_izin_survailen($nib),
            'pjtbu' => $this->Bu_model->pjtbu_opr($nib),
            'pjtbu_perubahan' => $this->Bu_model->pjtbu_opr_izin_survailen($nib),
            'peralatan' => $this->Bu_model->peralatan_opr($nib),
            'peralatan_perubahan' => $this->Bu_model->peralatan_opr_izin_survailen($nib),
            'kepemilikan_peralatan' => $this->Bu_model->kepemilikan_peralatan_opr($nib),
            'data_check' => array(),
            'klasifikasi' => $this->Bu_model->klasifikasi_kualifikasi_opr2_terbit($nib),
            'id1' => $token,
            'id2' => encrypt_url((string) $latest->id),
            'penilaian' => $penilaian,
            'penilaian_action' => base_url('survailen-insidental/simpan-penilaian'),
            'is_insidental' => true,
            'accidental_nib' => html_escape($nib),
            'accidental_nama_bu' => html_escape($latest->nama_bu),
        );

        $this->template->load('menu/menu', 'survailen_insidental/detail', $data);
    }

    public function simpan_penilaian()
    {
        if (!$this->has_access()) {
            $this->deny_access();
            return;
        }

        $token = trim((string) $this->input->post('id1'));
        $nib = $this->decode_nib($token);
        if ($nib === false) {
            show_404();
            return;
        }

        $records = $this->survailen_insidental->get_by_nib($nib);
        if (empty($records)) {
            show_404();
            return;
        }

        $latest = $records[0];
        $data = array(
            'id_survailen_accidental' => (int) $latest->id,
            'id_asesor' => $this->session->userdata('id_user'),
            'tgl_pelaksanaan' => $this->post_date('tgl_pelaksanaan'),
            'tempat_pelaksanaan' => $this->post_value('tempat_pelaksanaan'),
            'ketidaksesuaian' => $this->post_value('ketidaksesuaian'),
            'referensi' => $this->post_value('referensi'),
            'rencana_perbaikan' => $this->post_value('rencana_perbaikan'),
            'tgl_selesai' => $this->post_date('tgl_selesai'),
            'jenis_temuan' => $this->post_boolean('jenis_temuan'),
            'hasil_akhir' => $this->post_boolean('hasil_akhir'),
            'hasil_tindak_lanjut' => $this->post_boolean('hasil_tindak_lanjut'),
        );

        if ($this->survailen_insidental->save_assessment($nib, $data)) {
            $this->session->set_flashdata('title', 'Submit Berhasil');
            $this->session->set_flashdata('text', 'Penilaian survailen insidental berhasil disimpan');
            $this->session->set_flashdata('class', 'success');
        } else {
            $this->session->set_flashdata('title', 'Submit Gagal');
            $this->session->set_flashdata('text', 'Penilaian survailen insidental gagal disimpan');
            $this->session->set_flashdata('class', 'error');
        }

        redirect('survailen-insidental/detail/' . $token, 'refresh');
    }

    private function decode_nib($token)
    {
        if (empty($token)) {
            return false;
        }

        $nib = decrypt_url($token);
        if ($nib === false || trim((string) $nib) === '') {
            return false;
        }

        return trim((string) $nib);
    }

    private function post_value($field)
    {
        return trim((string) $this->security->xss_clean($this->input->post($field)));
    }

    private function post_date($field)
    {
        $value = $this->post_value($field);
        if ($value === '') {
            return null;
        }

        $date = DateTime::createFromFormat('Y-m-d', $value);
        return $date && $date->format('Y-m-d') === $value ? $value : null;
    }

    private function post_boolean($field)
    {
        $value = $this->post_value($field);
        return $value === '0' || $value === '1' ? (int) $value : null;
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