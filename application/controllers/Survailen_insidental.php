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

    public function sanksi_administratif()
    {
        $this->render_sanksi_administratif(false);
    }

    public function export_sanksi_administratif()
    {
        $this->render_sanksi_administratif(true);
    }

    private function render_sanksi_administratif($export)
    {
        if (!$this->has_access()) {
            $this->deny_access();
            return;
        }
        $q = $this->input->get('q');
        if ($q !== null && (!is_string($q) || mb_strlen($q, 'UTF-8') > 200)) {
            show_error('Pencarian tidak valid (maksimal 200 karakter).', 400);
            return;
        }
        $q = trim((string) $q);
        $this->load->model('Sanksi_administratif_model', 'sanksi');
        $ready = $this->sanksi->ready();
        $rows = $ready ? $this->sanksi->listing($q) : array();
        $sync = $ready ? $this->sanksi->last_sync() : array();
        if ($export) {
            if (!$ready) {
                show_error('Tabel sanksi belum tersedia. Jalankan file SQL terlebih dahulu.', 503);
                return;
            }
            $this->load->library('Sanksi_administratif_xlsx');
            $this->output
                ->set_content_type('application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
                ->set_header('Content-Disposition: attachment; filename="sanksi_administratif_' . date('Y-m-d') . '.xlsx"')
                ->set_header('Cache-Control: no-store, private')
                ->set_output($this->sanksi_administratif_xlsx->build($rows, $q, $sync ? $sync['synced_at'] : 'Belum pernah'));
            return;
        }
        $nonce = $this->session->userdata('sanksi_refresh_nonce');
        if (!$nonce) {
            $nonce = bin2hex(random_bytes(32));
            $this->session->set_userdata('sanksi_refresh_nonce', $nonce);
        }
        $this->load->model('Surat_pembekuan_model', 'surat_arsip');
        $archive_ready = $this->surat_arsip->ready();
        $status_map = $archive_ready ? $this->surat_arsip->status_map() : array();
        $this->template->load('menu/menu', 'survailen_insidental/sanksi_administratif', array(
            'sanksi_rows' => $rows, 'search' => $q, 'schema_ready' => $ready,
            'last_sync' => $sync, 'refresh_nonce' => $nonce,
            'archive_ready' => $archive_ready, 'status_map' => $status_map,
        ));
    }

    public function surat_pembekuan($id = null)
    {
        if (!$this->has_access()) {
            $this->deny_access();
            return;
        }
        if ($this->input->method() !== 'get') {
            show_error('Metode tidak didukung.', 405);
            return;
        }
        if (!is_scalar($id) || !ctype_digit((string) $id) || (int) $id < 1) {
            show_404();
            return;
        }
        $this->load->model('Sanksi_administratif_model', 'sanksi');
        if (!$this->sanksi->ready()) {
            show_error('Tabel sanksi belum tersedia.', 503);
            return;
        }
        $row = $this->sanksi->find_by_id($id);
        if (!$row) {
            show_error('Data sanksi tidak ditemukan atau telah diperbarui. Buka kembali daftar sanksi.', 404);
            return;
        }
        $this->load->model('Surat_pembekuan_model', 'surat_arsip');
        if (!$this->surat_arsip->ready()) {
            show_error('Jalankan SQL 20261012_create_surat_pembekuan.sql terlebih dahulu.', 503);
            return;
        }
        $letter = $this->surat_arsip->latest($row['nib'], $row['id_izin']);
        if (!$letter) {
            redirect('survailen-insidental/sangsi-adminstrastif', 'refresh');
            return;
        }
        $this->render_surat_pembekuan($letter);
    }

    public function terbitkan_surat_pembekuan($id = null)
    {
        if (!$this->has_access()) { $this->deny_access(); return; }
        if ($this->input->method() !== 'post') { show_error('Gunakan tombol penerbitan.', 405); return; }
        $nonce = $this->input->post('_sanksi_nonce');
        $expected_nonce = $this->session->userdata('sanksi_refresh_nonce');
        if (!is_string($nonce) || !is_string($expected_nonce) || $expected_nonce === ''
            || !hash_equals($expected_nonce, $nonce)) { show_error('Sesi tidak valid.', 403); return; }
        if (!is_scalar($id) || !ctype_digit((string) $id) || (int) $id < 1) { show_404(); return; }
        $expected = $this->input->post('expected_letter');
        $version = $this->input->post('snapshot_version');
        if (!is_string($expected) || !ctype_digit($expected) || !is_string($version)) {
            show_error('Versi surat tidak valid.', 400); return;
        }
        $this->load->model('Sanksi_administratif_model', 'sanksi');
        $this->load->model('Surat_pembekuan_model', 'surat_arsip');
        if (!$this->sanksi->ready() || !$this->surat_arsip->ready()) {
            show_error('Tabel belum tersedia. Jalankan SQL surat pembekuan.', 503); return;
        }
        $row = $this->sanksi->find_by_id($id);
        $this->load->library('Surat_pembekuan_token');
        if (!$row || !hash_equals($version, $this->surat_pembekuan_token->fingerprint($row))) {
            show_error('Data telah berubah. Muat ulang daftar.', 409); return;
        }
        try {
            $letter = $this->surat_arsip->issue($row, array('nomor_sp2' => '',
                'tanggal_sp2' => ''), $expected, $this->session->userdata('id_user'));
        } catch (Throwable $e) {
            show_error('Surat belum diterbitkan atau telah diterbitkan pengguna lain. Muat ulang daftar.', 409); return;
        }
        redirect('survailen-insidental/sangsi-adminstrastif/surat/' . (int) $id, 'location', 303);
    }

    private function render_surat_pembekuan(array $letter)
    {
        $id = $letter['id'];
        $row = json_decode($letter['snapshot_json'], true);
        $values = json_decode($letter['surat_json'], true);
        $values['nomor_sp2'] = '';
        $values['tanggal_sp2'] = '';
        $this->load->library('Surat_pembekuan');
        $html = $this->load->view('survailen_insidental/surat_pembekuan_pdf', array(
            'row' => $row, 'surat' => $this->surat_pembekuan->formatted($values),
        ), true);
        $this->load->library('pdfgenerator');
        $pdf = $this->pdfgenerator->generate($html, '', false, 'Letter', 'portrait');
        $this->output->set_content_type('application/pdf')
            ->set_header('Content-Disposition: inline; filename="rekomendasi_pembekuan_' . (int) $id . '.pdf"')
            ->set_header('Cache-Control: no-store, private')
            ->set_header('Referrer-Policy: no-referrer')
            ->set_header('X-Robots-Tag: noindex, nofollow, noarchive')
            ->set_output($pdf);
    }


    public function surat_pembekuan_email($token = null)
    {
        if ($this->input->method() !== 'get') {
            show_error('Metode tidak didukung.', 405);
            return;
        }
        $this->load->library('Surat_pembekuan_token');
        try {
            $data = $this->surat_pembekuan_token->verify($token, $this->config->item('encryption_key'));
        } catch (Throwable $e) {
            $data = false;
        }
        if (!$data) {
            show_error('Tautan surat tidak valid atau telah kedaluwarsa. Silakan meminta email baru kepada LSBU GAPEKNAS.', 403);
            return;
        }
        $this->load->model('Surat_pembekuan_model', 'surat_arsip');
        if (!$this->surat_arsip->ready()) {
            show_error('Dokumen sementara tidak tersedia.', 503);
            return;
        }
        $letter = $this->surat_arsip->find($data['id']);
        if (!$letter || !hash_equals($data['version'], $this->surat_pembekuan_token->fingerprint($letter))) {
            show_error('Surat tidak tersedia. Silakan meminta email baru kepada LSBU GAPEKNAS.', 410);
            return;
        }
        $this->render_surat_pembekuan($letter);
    }


    public function kirim_email_pembekuan($id = null)
    {
        if (!$this->has_access()) {
            $this->sanksi_json(403, 'Anda tidak memiliki akses.');
            return;
        }
        if ($this->input->method() !== 'post') {
            $this->sanksi_json(405, 'Gunakan tombol Kirim Email.');
            return;
        }
        $nonce = $this->input->post('_sanksi_nonce');
        $expected = $this->session->userdata('sanksi_refresh_nonce');
        if (!is_string($nonce) || !is_string($expected) || $expected === '' || !hash_equals($expected, $nonce)) {
            $this->sanksi_json(403, 'Sesi tidak valid. Muat ulang halaman.');
            return;
        }
        if (!is_scalar($id) || !ctype_digit((string) $id) || (int) $id < 1) {
            $this->sanksi_json(400, 'Data sanksi tidak valid.');
            return;
        }
        $this->load->model('Sanksi_administratif_model', 'sanksi');
        if (!$this->sanksi->ready()) {
            $this->sanksi_json(503, 'Tabel sanksi belum tersedia.');
            return;
        }
        $row = $this->sanksi->find_by_id($id);
        if (!$row) {
            $this->sanksi_json(404, 'Data sanksi telah diperbarui. Muat ulang halaman.');
            return;
        }
        $this->load->model('Surat_pembekuan_model', 'surat_arsip');
        if (!$this->surat_arsip->ready()) {
            $this->sanksi_json(503, 'Jalankan SQL 20261012_create_surat_pembekuan.sql terlebih dahulu.'); return;
        }
        $letter = $this->surat_arsip->latest($row['nib'], $row['id_izin']);
        if (!$letter) {
            $this->sanksi_json(409, 'Terbitkan surat terlebih dahulu melalui tombol Surat Pembekuan.'); return;
        }
        $attempt = null;
        try {
            $this->load->library('Surat_pembekuan_token');
            $token = $this->surat_pembekuan_token->issue($letter, $this->config->item('encryption_key'));
            $document_url = base_url('survailen-insidental/sangsi-adminstrastif/surat-email/' . $token);
            $message = $this->load->view('survailen_insidental/email_pembekuan', array(
                'row' => json_decode($letter['snapshot_json'], true), 'document_url' => $document_url,
            ), true);
            $this->load->config('email');
            $this->load->library('email');
            $this->email->clear(true);
            $this->email->from('info@lsbugapeknas.com', 'LSBU GAPEKNAS');
            // Fixed testing recipient; no posted recipient, CC, or BCC.
            $this->email->to('yagihagiyansyah99@gmail.com');
            $this->email->set_mailtype('html');
            $this->email->set_newline("\r\n");
            $this->email->set_crlf("\r\n");
            $this->email->subject('Pemberitahuan Pembekuan SBU - LSBU GAPEKNAS');
            $this->email->message($message);
            $attempt = $this->surat_arsip->begin_email($letter['id'], 'yagihagiyansyah99@gmail.com',
                $this->session->userdata('id_user'));
            $sent = $this->email->send();
        } catch (Throwable $e) {
            $sent = false;
        }
        if ($attempt !== null) {
            try {
                $recorded = $this->surat_arsip->finish_email($attempt, $sent);
            } catch (Throwable $e) {
                $recorded = false;
            }
            if (!$recorded) {
                $this->sanksi_json(502, 'Hasil pengiriman belum tercatat. Periksa kotak masuk sebelum mengirim ulang.');
                return;
            }
        }
        if (!$sent) {
            log_message('error', 'Email pembekuan SBU: persiapan atau pengiriman gagal.');
        }
        $this->sanksi_json($sent ? 200 : 502, $sent
            ? 'Email berhasil dikirim ke yagihagiyansyah99@gmail.com. Tautan berlaku 7 hari.'
            : 'Email gagal dikirim. Periksa konfigurasi email dan kunci aplikasi, lalu coba kembali.');
    }

    public function refresh_sanksi_administratif()
    {
        if (!$this->has_access()) {
            $this->sanksi_json(403, 'Anda tidak memiliki akses.');
            return;
        }
        if ($this->input->method() !== 'post') {
            $this->sanksi_json(405, 'Gunakan tombol Refresh Data.');
            return;
        }
        // Session-bound CSRF protection also works when global CI CSRF is disabled.
        $nonce = $this->input->post('_sanksi_nonce');
        $expected = $this->session->userdata('sanksi_refresh_nonce');
        if (!is_string($nonce) || !is_string($expected) || $expected === '' || !hash_equals($expected, $nonce)) {
            $this->sanksi_json(403, 'Sesi refresh tidak valid. Muat ulang halaman.');
            return;
        }
        $this->load->model('Sanksi_administratif_model', 'sanksi');
        if (!$this->sanksi->ready()) {
            $this->sanksi_json(503, 'Tabel sanksi belum tersedia. Jalankan file SQL terlebih dahulu.');
            return;
        }
        if (!$this->sanksi->acquire_lock()) {
            $this->sanksi_json(409, 'Refresh sedang berjalan. Tunggu hingga selesai.');
            return;
        }
        $status = 200;
        try {
            set_time_limit(120);
            $record = $this->Bu_model->token_api_siki();
            $token = isset($record[0]['token']) ? $record[0]['token'] : '';
            $this->load->library('Siki_sanksi_client');
            $rows = $this->siki_sanksi_client->fetch_all($token);
            $this->sanksi->replace_snapshot($rows);
            $message = 'Refresh berhasil. ' . count($rows) . ' sanksi tersimpan.';
        } catch (RuntimeException $e) {
            $status = 502;
            $message = $e->getMessage();
        } catch (Throwable $e) {
            $status = 500;
            $message = 'Refresh gagal. Data sebelumnya tetap tersedia.';
        } finally {
            $this->sanksi->release_lock();
        }
        $this->sanksi_json($status, $message);
    }

    private function sanksi_json($status, $message)
    {
        $this->output->set_status_header($status)->set_content_type('application/json')
            ->set_header('Cache-Control: no-store')
            ->set_output(json_encode(array('success' => $status === 200, 'message' => $message,
                'csrf_name' => $this->security->get_csrf_token_name(),
                'csrf_hash' => $this->security->get_csrf_hash())));
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
            if ($this->send_assessment_email($nib, $token)) {
                $this->set_flash('Submit Berhasil', 'Penilaian survailen insidental berhasil disimpan dan email telah dikirim ke pemohon.', 'success');
            } else {
                $this->set_flash('Penilaian Tersimpan', 'Penilaian survailen insidental berhasil disimpan, tetapi email gagal dikirim. Periksa alamat email pemohon dan konfigurasi email, lalu submit kembali untuk mengirim ulang.', 'warning');
            }
        } else {
            $this->set_flash('Submit Gagal', 'Penilaian survailen insidental gagal disimpan', 'error');
        }

        redirect(($is_verifikator
            ? 'survailen-insidental/tinjauan-permohonan-verifikator/'
            : 'survailen-insidental/detail/') . $token, 'refresh');
    }

    private function send_assessment_email($nib, $token)
    {
        // Called only after save_assessment commits, including unchanged submissions.
        try {
            $biodata = $this->Bu_model->biodata_opr($nib);
            $recipient = isset($biodata[0]['email']) ? trim($biodata[0]['email']) : '';
            $signature = $this->document_signature($token);
            if (!filter_var($recipient, FILTER_VALIDATE_EMAIL) || $signature === false) {
                log_message('error', 'Email penilaian insidental: alamat pemohon atau encryption_key tidak tersedia/valid.');
                return false;
            }

            $document_url = base_url('survailen-insidental/dokumen-survailen/' . rawurlencode($token))
                . '?signature=' . $signature;
            $this->load->config('email');
            $this->load->library('email');
            $this->email->clear(true);
            $this->email->from('info@lsbugapeknas.com', 'LSBU GAPEKNAS');
            $this->email->to($recipient);
            $this->email->cc('mail.lsbugapeknas@gmail.com, ccgapeknas@gmail.com');
            $this->email->set_mailtype('html');
            $this->email->set_newline("\r\n");
            $this->email->set_crlf("\r\n");
            $this->email->subject('Survailen Insidental LSBU GAPEKNAS');
            $this->email->message($this->notif_email2($document_url));
            if ($this->email->send()) {
                return true;
            }
        } catch (Throwable $e) {
            // Do not expose SMTP credentials or roll back an already saved assessment.
            log_message('error', 'Email penilaian insidental: terjadi kesalahan saat menyiapkan atau mengirim email.');
            return false;
        }

        log_message('error', 'Email penilaian insidental: pengiriman gagal.');
        return false;
    }
    function send_assessment_email2($nib, $token)
    {
        // Called only after save_assessment commits, including unchanged submissions.
        try {
            $biodata = $this->Bu_model->biodata_opr($nib);
            $recipient = isset($biodata[0]['email']) ? trim($biodata[0]['email']) : '';
            $signature = $this->document_signature($token);
            if (!filter_var($recipient, FILTER_VALIDATE_EMAIL) || $signature === false) {
                log_message('error', 'Email penilaian insidental: alamat pemohon atau encryption_key tidak tersedia/valid.');
                return false;
            }

            $document_url = base_url('survailen-insidental/dokumen-survailen/' . rawurlencode($token))
                . '?signature=' . $signature;
            $this->load->config('email');
            $this->load->library('email');
            $this->email->clear(true);
            $this->email->from('info@lsbugapeknas.com', 'LSBU GAPEKNAS');
            $this->email->to('yagihagiyansyah99@gmail.com');
            $this->email->cc('mail.lsbugapeknas@gmail.com, ccgapeknas@gmail.com');
            $this->email->set_mailtype('html');
            $this->email->set_newline("\r\n");
            $this->email->set_crlf("\r\n");
            $this->email->subject('Survailen Insidental LSBU GAPEKNAS');
            $this->email->message($this->notif_email2($document_url));
            if ($this->email->send()) {
                return true;
            }
        } catch (Throwable $e) {
            // Do not expose SMTP credentials or roll back an already saved assessment.
            log_message('error', 'Email penilaian insidental: terjadi kesalahan saat menyiapkan atau mengirim email.');
            return false;
        }

        log_message('error', 'Email penilaian insidental: pengiriman gagal.');
        return false;
    }

    private function notif_email2($document_url)
    {
        return $this->load->view('survailen_insidental/notif_email2', array(
            'document_url' => $document_url,
        ), true);
    }

    private function document_signature($token)
    {
        $key = (string) $this->config->item('encryption_key');
        if ($key === '') {
            return false;
        }

        return hash_hmac('sha256', 'survailen-insidental/dokumen-survailen/' . $token, $key);
    }

    public function dokumen_survailen($token = null)
    {
        // Applicants can open the emailed link without an assessor session.
        // The signature authorizes this document only; an encrypted NIB alone does not.
        $signature = $this->input->get('signature');
        $expected = is_string($token) ? $this->document_signature($token) : false;
        if ($expected === false || !is_string($signature) || !hash_equals($expected, $signature)) {
            show_404();
            return;
        }

        $nib = $this->decode_nib($token);
        if ($nib === false) {
            show_404();
            return;
        }

        $records = $this->survailen_insidental->get_by_nib($nib);
        $penilaian = $this->survailen_insidental->get_assessment_by_nib($nib);
        if (empty($records) || empty($penilaian)) {
            show_404();
            return;
        }

        $biodata = $this->Bu_model->biodata_opr($nib);
        $id_izin = array();
        foreach ($records as $record) {
            if (trim((string) $record->id_izin) !== '') {
                $id_izin[] = trim((string) $record->id_izin);
            }
        }

        $data = array(
            'nib' => $nib,
            'nama_bu' => !empty($biodata[0]['nama']) ? $biodata[0]['nama'] : $records[0]->nama_bu,
            'id_izin' => implode(', ', array_unique($id_izin)),
            'penilaian' => $penilaian[0],
            'asesor' => $this->survailen_insidental->get_active_appointments($nib),
        );
        $html = $this->load->view('survailen_insidental/cetak_penilaian', $data, true);
        $this->load->library('pdfgenerator');
        $this->pdfgenerator->generate($html, 'survailen_insidental_' . time(), true, 'A4', 'landscape');
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

    public function simpan_penunjukan_banyak()
    {
        if (!$this->has_access()) {
            $this->deny_access();
            return;
        }
        if ($this->input->method() !== 'post') {
            show_error('Gunakan form penunjukan untuk menyimpan data.', 405);
            return;
        }
        // JSON avoids max_input_vars truncation when selecting many NIBs.
        $payload = $this->input->post('tokens');
        $tokens = is_string($payload) ? json_decode($payload, true) : null;
        if (!is_array($tokens) || empty($tokens)) {
            show_error('Pilih minimal satu NIB.', 400);
            return;
        }
        $nibs = array();
        foreach ($tokens as $token) {
            $nib = is_string($token) ? $this->decode_nib($token) : false;
            if ($nib === false || in_array($nib, $nibs, true)) {
                show_error('Pilihan NIB tidak valid atau berulang.', 400);
                return;
            }
            $nibs[] = $nib;
        }
        foreach (array('asesor_1', 'asesor_2', 'asesor_3', 'tgl_pelaksanaan') as $field) {
            if (is_array($this->input->post($field))) {
                show_error('Form penunjukan tidak valid.', 400);
                return;
            }
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


        $date = $this->post_date('tgl_pelaksanaan');
        if ($date === null) {
            $this->set_flash('Penunjukan Gagal', 'Tanggal pelaksanaan wajib diisi dengan tanggal yang valid.', 'warning');
            redirect('survailen-insidental', 'refresh');
            return;
        }
        $result = $this->survailen_insidental->replace_appointments_bulk(
            $nibs, $date, $this->session->userdata('id_user'), $appointments
        );
        if ($result === 'saved') {
            $this->set_flash('Penunjukan Berhasil', count($nibs) . ' NIB berhasil ditugaskan.', 'success');
        } elseif ($result === 'conflict') {
            $this->set_flash('Penunjukan Berubah', 'Ada NIB yang sudah memiliki asesor aktif. Seluruh perubahan belum disimpan. Pilih kembali NIB dari daftar terbaru.', 'warning');
        } else {
            $this->set_flash('Penunjukan Gagal', 'Seluruh perubahan dibatalkan. Muat ulang daftar dan coba kembali.', 'error');
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
