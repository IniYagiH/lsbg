<?php
require __DIR__ . '/sanksi_administratif_test.php';
require FCPATH . 'application/libraries/Surat_pembekuan.php';
$before = $GLOBALS['checks'];
class LetterModel extends SanksiFakeModel {
    public $record;
    function find_by_id($id) { return $this->record; }
}
class LetterPdf {
    public $html;
    function generate($html, $filename, $stream, $paper, $orientation) {
        $this->html = $html;
        check($paper === 'Letter' && $orientation === 'portrait', 'Template page format');
        return '%PDF-test';
    }
}
function letter_fixture() {
    $row = array('id' => 48, 'nama_bu' => 'PT CONTOH KONSTRUKSI', 'nib' => '00123456789012345678',
        'id_izin' => 'I-202509161200084997036', 'kode_subklasifikasi' => 'BG003',
        'id_kualifikasi' => 'B', 'keterangan' => 'Komitmen SMAP Belum terpenuhi');
    $c = sanksi_fixture($row); $c->sanksi = new LetterModel(); $c->sanksi->record = $row;
    $c->surat_pembekuan = new Surat_pembekuan(); $c->survailen_insidental_pdf = new LetterPdf();
    $c->input->verb = 'get';
    return $c;
}
$library = new Surat_pembekuan();
$values = $library->defaults(48, new DateTimeImmutable('2026-10-10 12:00:00', new DateTimeZone('Asia/Jakarta')));
check($values['nomor_surat'] === '048/REK-PB/LSBU-GI/X/2026', 'Recommendation number format');
check($values['nomor_sp2'] === '048/SP-II/LSBU-GI/X/2026', 'SP II number format');
check($values['tanggal_surat'] === '2026-10-10' && $values['tanggal_sp2'] === '2026-10-10', 'Both dates use click date');
check($values['kota_surat'] === 'Jakarta' && $values['tujuan'] === 'Jakarta' && $values['lampiran'] === '-', 'Fixed defaults');
foreach (array('nomor_prosedur', 'penandatangan', 'alamat_pengirim') as $key) {
    check($values[$key] === '', 'Requested field blank: ' . $key);
}
$midnight = $library->defaults(48, new DateTimeImmutable('2026-12-31 18:00:00', new DateTimeZone('UTC')));
check($midnight['tanggal_surat'] === '2027-01-01' && $midnight['nomor_surat'] === '048/REK-PB/LSBU-GI/I/2027', 'Jakarta timezone rollover');
check($library->formatted($values)['tanggal_surat'] === '10 Oktober 2026', 'Indonesian date');
$c = letter_fixture();
$c->input->query = array('nomor_surat' => 'INJECTED', 'penandatangan' => 'INJECTED');
$c->surat_pembekuan('48');
check($c->output->type === 'application/pdf' && $c->output->body === '%PDF-test', 'GET directly returns PDF');
check($c->template->data === null, 'No input form');
$html = $c->survailen_insidental_pdf->html;
check(strpos($html, 'INJECTED') === false, 'Caller cannot override generated fields');
check(strpos($html, 'PT CONTOH KONSTRUKSI') !== false && strpos($html, '048/REK-PB/') !== false, 'Selected BU and automatic number');
check(strpos($html, '...') === false, 'No dot placeholders');
$c = letter_fixture(); $c->input->verb = 'post';
expect_status(function () use ($c) { $c->surat_pembekuan('48'); }, 405);
$c = letter_fixture(); $c->sanksi->record = array();
expect_status(function () use ($c) { $c->surat_pembekuan('48'); }, 404);
$c = letter_fixture(); $c->sanksi->available = false;
expect_status(function () use ($c) { $c->surat_pembekuan('48'); }, 503);
$c = letter_fixture(); $c->ion_auth->admin = false; $c->surat_pembekuan('48');
check($c->survailen_insidental_pdf->html === null, 'Unauthorized generation rejected');
$c = letter_fixture(); $c->sanksi->record['nama_bu'] = '<script>alert(1)</script>';
$c->surat_pembekuan('48');
check(strpos($c->survailen_insidental_pdf->html, '<script>') === false, 'Escape API data');
if (in_array('--render-letter', $argv, true)) {
    require FCPATH . 'application/libraries/Survailen_insidental_pdf.php';
    $pdf = (new Survailen_insidental_pdf())->generate($html, '', false, 'Letter', 'portrait');
    check(substr($pdf, 0, 5) === '%PDF-', 'Actual PDF render');
    file_put_contents(FCPATH . 'application/cache/surat_pembekuan_test.pdf', $pdf);
    echo 'PDF rendered: ' . strlen($pdf) . " bytes.\n";
}
echo ($GLOBALS['checks'] - $before) . " automatic letter checks passed.\n";
