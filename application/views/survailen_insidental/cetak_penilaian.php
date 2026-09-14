<?php
defined('BASEPATH') or exit('No direct script access allowed');

$text = function ($value) {
    return nl2br(html_escape((string) $value));
};
$value = function ($field) use ($penilaian, $text) {
    return isset($penilaian[$field]) && $penilaian[$field] !== ''
        ? $text($penilaian[$field]) : '-';
};
$choice = function ($field, $yes, $no) use ($penilaian) {
    if (!isset($penilaian[$field]) || $penilaian[$field] === '') {
        return '-';
    }
    return (string) $penilaian[$field] === '1' ? $yes : $no;
};
// Embed local images so generating a PDF never requests the application over HTTP.
$image_data = function ($relative_path) {
    $path = FCPATH . $relative_path;
    return is_readable($path) ? 'data:image/png;base64,' . base64_encode(file_get_contents($path)) : '';
};
$months = array(1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
$timestamp = !empty($penilaian['updated_at']) ? strtotime($penilaian['updated_at']) : false;
$report_date = $timestamp
    ? date('d', $timestamp) . ' ' . $months[(int) date('n', $timestamp)] . ' ' . date('Y', $timestamp)
    : '-';
$leader = '-';
foreach ($asesor as $appointment) {
    if ((int) $appointment['urutan_asesor'] === 1) {
        $leader = !empty($appointment['Nama']) ? $appointment['Nama'] : $appointment['id_asesor'];
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Laporan Hasil Survailen Insidental</title>
    <style>
        @page { margin: 24px; }
        body { font-family: DejaVu Sans, sans-serif; font-size: 10px; color: #111; }
        table { border-collapse: collapse; width: 100%; }
        td, th { vertical-align: top; padding: 5px; }
        .header td { vertical-align: middle; }
        .header strong { font-size: 17px; }
        .logo { width: 85px; }
        h1 { text-align: center; font-size: 15px; margin: 16px 0; }
        .info { margin-bottom: 12px; }
        .info .number { width: 20px; }
        .info .label { width: 230px; }
        .results { table-layout: fixed; }
        .results td, .results th { border: 1px solid #111; word-wrap: break-word; }
        .results th { text-align: center; font-size: 9px; }
        .results tr { page-break-inside: avoid; }
        .signatures { text-align: center; margin-top: 14px; }
        .signature-space { height: 60px; }
        .signature { max-height: 60px; max-width: 120px; }
        .approval { text-align: center; page-break-inside: avoid; margin-top: 12px; }
    </style>
</head>
<body>
    <table class="header">
        <tr>
            <td style="width: 95px"><img class="logo" src="<?= $image_data('assets/media/logos/Logo_gapeknas.png'); ?>" alt="GAPEKNAS"></td>
            <td>
                <strong>PT LSBU GAPEKNAS INFRASTRUKTUR</strong><br>
                Ruko Graha Mas Pemuda Blok AD No. 21 Jl. Pemuda, Rawamangun, Jakarta Timur<br>
                Telp: (021) 4711 796, Fax: (021) 4711 860.<br>
                Email pt.lsbugapeknas21@gmail.com
            </td>
            <td style="width: 95px"><img class="logo" src="<?= $image_data('assets/media/logos/Logo_kan.png'); ?>" alt="KAN"></td>
        </tr>
    </table>
    <hr>
    <h1>LAPORAN HASIL SURVAILEN INSIDENTAL</h1>
    <table class="info">
        <tr><td class="number">1.</td><td class="label">Nama</td><td>: LSBU GAPEKNAS INFRASTRUKTUR</td></tr>
        <tr><td>2.</td><td>Alamat</td><td>: Ruko Graha Mas Pemuda Blok AD No. 21 Jl. Pemuda, Rawamangun, Jakarta Timur</td></tr>
        <tr><td>3.</td><td>Nama Ketua Pelaksana</td><td>: Roland Togu, ST. MBA</td></tr>
        <tr><td>4.</td><td>Nama Koordinator Manajemen Mutu</td><td>: Astini Primaningtyas</td></tr>
        <tr><td>5.</td><td>Tanggal Pelaksanaan</td><td>: <?= $value('tgl_pelaksanaan'); ?></td></tr>
        <tr><td>6.</td><td>Tempat Pelaksanaan</td><td>: <?= $value('tempat_pelaksanaan'); ?></td></tr>
        <tr><td>7.</td><td>Nama Tim Survailen yang Bertugas</td><td>
            <?php if (empty($asesor)) : ?>-
            <?php else : foreach ($asesor as $appointment) : ?>
                <?= $text($appointment['urutan_asesor']); ?>.
                <?= $text(!empty($appointment['Nama']) ? $appointment['Nama'] : $appointment['id_asesor']); ?><br>
            <?php endforeach; endif; ?>
        </td></tr>
        <tr><td>8.</td><td>NIB</td><td>: <?= $text($nib); ?></td></tr>
        <tr><td>9.</td><td>ID Izin</td><td>: <?= $id_izin !== '' ? $text($id_izin) : '-'; ?></td></tr>
    </table>
    <table class="results">
        <thead>
            <tr>
                <th style="width: 3%">No</th>
                <th style="width: 15%">Nama Badan Usaha Jasa Konstruksi (BUJK)</th>
                <th style="width: 20%">Ketidaksesuaian (ditulis secara jelas dan terukur)</th>
                <th style="width: 12%">Referensi</th>
                <th style="width: 13%">Rencana Perbaikan</th>
                <th style="width: 9%">Tgl Selesai</th>
                <th style="width: 8%">Jenis Temuan</th>
                <th style="width: 9%">Hasil Akhir</th>
                <th style="width: 11%">Hasil Perbaikan/Tindak Lanjut</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1.</td>
                <td><?= $text($nama_bu); ?></td>
                <td><?= $value('ketidaksesuaian'); ?></td>
                <td><?= $value('referensi'); ?></td>
                <td><?= $value('rencana_perbaikan'); ?></td>
                <td><?= $value('tgl_selesai'); ?></td>
                <td><?= $choice('jenis_temuan', 'Sesuai', 'Tidak Sesuai'); ?></td>
                <td><?= $choice('hasil_akhir', 'Sesuai', 'Perlu Perbaikan'); ?></td>
                <td><?= $choice('hasil_tindak_lanjut', 'Memenuhi', 'Tidak Memenuhi'); ?></td>
            </tr>
        </tbody>
    </table>
    <p style="text-align: center">Jakarta, <?= $text($report_date); ?></p>
    <table class="signatures">
        <tr>
            <td style="width: 50%">Tim Survailen:<div class="signature-space"></div>
                <?= $text($leader); ?><br>Ketua Tim Survailen
            </td>
            <td><br><img class="signature" src="<?= $image_data('assets/media/astini.png'); ?>" alt=""><br>
                Astini Primaningtyas<br>Koordinator Manajemen Mutu
            </td>
        </tr>
    </table>
    <div class="approval">
        Mengetahui,<br>
        <b>LEMBAGA UNIT SERTIFIKASI BADAN USAHA<br>GAPEKNAS INFRASTRUKTUR</b><br>
        <img class="signature" src="<?= $image_data('assets/media/roland.png'); ?>" alt=""><br>
        Roland Togu, ST., MBA<br>Ketua Pelaksana
    </div>
</body>
</html>
