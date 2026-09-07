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

        $appointment_map = array();
        foreach ($this->survailen_insidental->get_active_appointments_grouped() as $appointment) {
            $appointment_map[$appointment->NIB] = $appointment;
        }

        $list = $this->survailen_insidental->get_all_grouped_by_nib();
        $rows = array();

        foreach ($list as $item) {
            $appointment = isset($appointment_map[$item->nib])
                ? $appointment_map[$item->nib]
                : null;
            $token = encrypt_url($item->nib);

            $rows[] = array(
                'nama_bu' => html_escape($item->nama_bu),
                'nib' => html_escape($item->nib),
                'id_izin' => html_escape($item->id_izin),
                'jenis_temuan' => html_escape($this->format_label($item->jenis_temuan)),
                'tgl_temuan' => $this->format_date($item->tgl_temuan),
                'tgl_temuan_order' => $this->date_order_value($item->tgl_temuan),
                'status' => $this->status_badge($item->status),
                'assessor_names' => $appointment
                    ? html_escape($appointment->assessor_names)
                    : '<span class="text-muted">Belum ditunjuk</span>',
                'assessor_1' => $appointment ? html_escape($appointment->assessor_1) : '',
                'assessor_2' => $appointment ? html_escape($appointment->assessor_2) : '',
                'assessor_3' => $appointment ? html_escape($appointment->assessor_3) : '',
                'tgl_pelaksanaan' => $appointment && !empty($appointment->tgl_pelaksanaan)
                    ? html_escape($appointment->tgl_pelaksanaan)
                    : date('Y-m-d'),
                'has_appointment' => $appointment ? '1' : '0',
                'token' => html_escape($token),
                'detail_url' => html_escape(
                    base_url('survailen-insidental/detail/' . $token)
                ),
            );
        }

        $data = array(
            'survailen_list' => $rows,
            'assessor_candidates' => $this->survailen_insidental
                ->get_assessor_candidates(array('3')),
            'support_candidates' => $this->survailen_insidental
                ->get_assessor_candidates(array('2', '3')),
        );

        $this->template->load('menu/menu', 'survailen_insidental/index', $data);
    }

    public function detail($token = null)
    {
        if (!$this->has_access()) {
            $this->deny_access();
            return;
        }

        $this->render_detail($token, false);
    }

    public function list_tinjauan_permohonan_verifikator()
    {
        if (!$this->has_verifier_access()) {
            $this->deny_access();
            return;
        }

        $data = array(
            'survailen_list' => $this->survailen_insidental->get_assigned_requests(
                $this->session->userdata('id_user')
            ),
        );
        $this->template->load('menu/menu', 'survailen_insidental/list_verifikator', $data);
    }

    public function tinjauan_permohonan_verifikator($token = null)
    {
        if (!$this->has_verifier_access()) {
            $this->deny_access();
            return;
        }

        $this->render_detail($token, true);
    }

    private function render_detail($token, $is_verifikator)
    {
        $nib = $this->decode_nib($token);
        if ($nib === false) {
            show_404();
            return;
        }

        if ($is_verifikator && !$this->has_active_assignment($nib)) {
            $this->deny_assignment();
            return;
        }

        $records = $this->survailen_insidental->get_by_nib($nib);
        if (empty($records)) {
            show_404();
            return;
        }

        $latest = $records[0];
        $penilaian = $this->survailen_insidental->get_assessment_by_nib($nib);
        $assessment_version = $this->survailen_insidental->assessment_version($penilaian);
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
            'penilaian_action' => base_url($is_verifikator
                ? 'survailen-insidental/simpan-penilaian-verifikator'
                : 'survailen-insidental/simpan-penilaian'),
            'assessment_version' => $assessment_version,
            'insidental_back_url' => base_url($is_verifikator
                ? 'survailen-insidental/tinjauan-permohonan-verifikator'
                : 'survailen-insidental'),
            'is_insidental' => true,
            'asesor_insidental' => $this->survailen_insidental
                ->get_active_appointments($nib),
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

        $this->save_penilaian(false);
    }

    public function simpan_penilaian_verifikator()
    {
        if (!$this->has_verifier_access()) {
            $this->deny_access();
            return;
        }

        $this->save_penilaian(true);
    }

    private function save_penilaian($is_verifikator)
    {
        if ($this->input->method() !== 'post') {
            show_error('Gunakan form penilaian untuk menyimpan data.', 405);
            return;
        }

        $token = trim((string) $this->input->post('id1'));
        $nib = $this->decode_nib($token);
        if ($nib === false) {
            show_404();
            return;
        }

        if ($is_verifikator && !$this->has_active_assignment($nib)) {
            $this->deny_assignment();
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

        $result = $this->survailen_insidental->save_assessment(
            $nib,
            $data,
            $this->post_value('assessment_version'),
            $is_verifikator ? $this->session->userdata('id_user') : null
        );
        if ($result === 'forbidden') {
            $this->deny_assignment();
            return;
        }

        if ($result === 'conflict') {
            $this->set_flash('Penilaian Berubah', 'Data sudah diperbarui oleh pengguna lain. Perubahan Anda belum disimpan. Periksa hasil terbaru sebelum mengisi kembali.', 'warning');
        } elseif ($result === 'saved') {
            $this->set_flash('Submit Berhasil', 'Penilaian survailen insidental berhasil disimpan', 'success');
        } else {
            $this->set_flash('Submit Gagal', 'Penilaian survailen insidental gagal disimpan', 'error');
        }

        redirect(($is_verifikator
            ? 'survailen-insidental/tinjauan-permohonan-verifikator/'
            : 'survailen-insidental/detail/') . $token, 'refresh');
    }

    public function simpan_penunjukan()
    {
        if (!$this->has_access()) {
            $this->deny_access();
            return;
        }

        $token = trim((string) $this->input->post('token'));
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

        $appointments = array(
            1 => $this->post_value('asesor_1'),
            2 => $this->post_value('asesor_2'),
            3 => $this->post_value('asesor_3'),
        );

        if ($appointments[1] === '') {
            $this->set_flash('Penunjukan Gagal', 'Asesor 1 wajib dipilih.', 'warning');
            redirect('survailen-insidental', 'refresh');
            return;
        }

        $selected = array_values(array_filter($appointments, 'strlen'));
        if (count($selected) !== count(array_unique($selected))) {
            $this->set_flash('Penunjukan Gagal', 'Asesor yang sama tidak dapat dipilih lebih dari satu kali.', 'warning');
            redirect('survailen-insidental', 'refresh');
            return;
        }

        if (!$this->survailen_insidental->is_valid_assessor($appointments[1], array('3'))) {
            $this->set_flash('Penunjukan Gagal', 'Asesor 1 harus merupakan Asesor LSBU.', 'warning');
            redirect('survailen-insidental', 'refresh');
            return;
        }

        foreach (array(2, 3) as $slot) {
            if (
                $appointments[$slot] !== ''
                && !$this->survailen_insidental->is_valid_assessor(
                    $appointments[$slot],
                    array('2', '3')
                )
            ) {
                $this->set_flash(
                    'Penunjukan Gagal',
                    'Asesor 2 dan 3 harus merupakan Asesor atau Verifikator LSBU.',
                    'warning'
                );
                redirect('survailen-insidental', 'refresh');
                return;
            }
        }

        $tgl_pelaksanaan = $this->post_date('tgl_pelaksanaan');
        if ($tgl_pelaksanaan === null) {
            $tgl_pelaksanaan = date('Y-m-d');
        }

        $saved = $this->survailen_insidental->replace_appointments(
            $nib,
            (int) $records[0]->id,
            $tgl_pelaksanaan,
            $this->session->userdata('id_user'),
            $appointments
        );

        if ($saved) {
            $this->set_flash('Penunjukan Berhasil', 'Asesor survailen insidental berhasil ditunjuk.', 'success');
        } else {
            $this->set_flash('Penunjukan Gagal', 'Data penunjukan asesor gagal disimpan.', 'error');
        }

        redirect('survailen-insidental', 'refresh');
    }

    public function batalkan_penunjukan()
    {
        if (!$this->has_access()) {
            $this->deny_access();
            return;
        }

        $token = trim((string) $this->input->post('token'));
        $nib = $this->decode_nib($token);
        if ($nib === false) {
            show_404();
            return;
        }

        if ($this->survailen_insidental->cancel_appointments($nib)) {
            $this->set_flash('Penunjukan Dibatalkan', 'Penunjukan asesor insidental berhasil dibatalkan.', 'success');
        } else {
            $this->set_flash('Pembatalan Gagal', 'Penunjukan asesor insidental gagal dibatalkan.', 'error');
        }

        redirect('survailen-insidental', 'refresh');
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

    private function has_verifier_access()
    {
        return $this->ion_auth->ceklogin()
            && in_array((string) $this->session->userdata('level'), array('2', '3'), true);
    }

    private function has_active_assignment($nib)
    {
        return $this->survailen_insidental->has_active_assignment(
            $nib,
            $this->session->userdata('id_user')
        );
    }

    private function deny_assignment()
    {
        $this->set_flash('Penugasan Tidak Aktif', 'Anda tidak memiliki penugasan aktif untuk permohonan ini.', 'warning');
        redirect('survailen-insidental/tinjauan-permohonan-verifikator', 'refresh');
    }

    private function deny_access()
    {
        $this->set_flash('Warning', 'Anda tidak memiliki akses', 'warning');
        redirect('login', 'refresh');
    }

    private function set_flash($title, $text, $class)
    {
        $this->session->set_flashdata('title', $title);
        $this->session->set_flashdata('text', $text);
        $this->session->set_flashdata('class', $class);
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
        return empty($value) || $value === '0000-00-00'
            ? ''
            : html_escape($value);
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