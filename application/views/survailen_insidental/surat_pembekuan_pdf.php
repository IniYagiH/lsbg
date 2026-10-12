<?php
// Use the same letterhead assets as survailen/surat_tugas, embedded locally.
$kop_image = function ($filename) {
    $path = FCPATH . 'assets/media/logos/' . $filename;
    return is_readable($path) ? 'data:image/png;base64,' . base64_encode(file_get_contents($path)) : '';
};
$logo_gapeknas = $kop_image('Logo_gapeknas.png');
$logo_kan = $kop_image('Logo_kan.png');
?>
<!DOCTYPE html>
<html lang="id"><head><meta charset="utf-8">
<style>
@page { margin: 20mm 25.4mm 17.5mm; }
body { font-family: Arial, sans-serif; font-size: 10pt; line-height: 1.18; color: #000; }
.kop { width: 100%; border-collapse: collapse; border-bottom: 2px solid #000; margin-bottom: 12px; }
.kop td { vertical-align: middle; text-align: center; padding: 0 4px 8px; }
.kop .logo-cell { width: 75px; }
.kop img { width: 75px; height: auto; }
.kop .kop-text { font-size: 8pt; line-height: 1.25; }
.kop strong { font-size: 10pt; }
h1 { font-size: 12pt; text-align: center; margin: 0 0 14px; }
p { margin: 0 0 8px; text-align: justify; }
.meta { width: 100%; margin-bottom: 12px; border-collapse: collapse; }
.meta td { vertical-align: top; padding: 0; }
.identitas { font-size: 9pt; margin: 8px 0; }
.ttd { text-align: center; width: 65%; margin-left: 35%; page-break-inside: avoid; }
.tembusan { margin-top: 10px; font-size: 9pt; }
</style></head><body>
<table class="kop">
    <tr>
        <?php if ($logo_gapeknas !== '') : ?>
        <td class="logo-cell"><img src="<?= $logo_gapeknas; ?>" alt="GAPEKNAS"></td>
        <?php endif; ?>
        <td class="kop-text">
            <strong>PT LSBU GAPEKNAS INFRASTRUKTUR</strong><br>
            Ruko Graha Mas Pemuda Blok AD No. 21 Jl. Pemuda, Rawamangun, Jakarta Timur<br>
            Telp: (021) 4711 796, Fax: (021) 4711 860.<br>
            Email pt.lsbugapeknas21@gmail.com
        </td>
        <?php if ($logo_kan !== '') : ?>
        <td class="logo-cell"><img src="<?= $logo_kan; ?>" alt="KAN"></td>
        <?php endif; ?>
    </tr>
</table>
<h1>SURAT REKOMENDASI PEMBEKUAN SBU KE LPJK</h1>
<p style="text-align:right"><?= html_escape($surat['kota_surat']); ?>, <?= html_escape($surat['tanggal_surat']); ?></p>
<table class="meta">
<tr><td style="width:65px">Nomor</td><td>: <?= html_escape($surat['nomor_surat']); ?></td></tr>
<tr><td>Lampiran</td><td>: <?= html_escape($surat['lampiran']); ?></td></tr>
<tr><td>Perihal</td><td>: Pembekuan Sertifikat Badan Usaha</td></tr>
</table>
<p>Kepada Yth<br>Ketua LPJK<br>di<br><?= html_escape($surat['tujuan']); ?></p>
<p>Dengan hormat,</p>
<p class="identitas">NIB: <?= html_escape($row['nib']); ?><br>ID Izin: <?= html_escape($row['id_izin']); ?>;
Subklasifikasi: <?= html_escape($row['kode_subklasifikasi']); ?>; Kualifikasi: <?= html_escape($row['id_kualifikasi']); ?></p>
<p>Menunjuk Surat Peringatan II (kedua) tanggal <?= html_escape($surat['tanggal_sp2']); ?> dengan nomor
<?= html_escape($surat['nomor_sp2']); ?>, kepada <?= html_escape($row['nama_bu']); ?> yang Saudara pimpin,
ternyata sampai dengan batas waktu 30 (tiga puluh) hari yang ditetapkan <?= html_escape($row['nama_bu']); ?>
belum memenuhi apa yang diminta dalam isi Surat Peringatan II (kedua) tersebut.</p>
<p>Dengan Saudara tidak memenuhi / mengabaikan Surat Peringatan II (kedua) pelanggaran tersebut maka sesuai Prosedur
LSBU Gapeknas Infrastruktur Nomor: <?= html_escape($surat['nomor_prosedur']); ?>, kepada <?= html_escape($row['nama_bu']); ?>
mengusulkan untuk dikenakan sanksi Pembekuan Sertifikat Badan Usaha. Sehubungan dengan hal tersebut maka terhitung sejak
diterbitkannya surat ini Sertifikat Badan Usaha atas nama <?= html_escape($row['nama_bu']); ?> untuk sementara kami nyatakan tidak berlaku.</p>
<p>Sesuai Rekomendasi dari LPJK, LSBU Gapeknas Infrastruktur akan membuat status pembekuan sertifikasi dalam website dan
pemulihan pembekuan sertifikasi baru dapat dilakukan jika masalah yang mengakibatkan pembekuan telah diselesaikan.</p>
<p>Apabila BUJK gagal dalam menyelesaikan masalah yang mengakibatkan pembekuan, maka Sertifikat Badan Usaha atas nama
<?= html_escape($row['nama_bu']); ?> yang Saudara pimpin diusulkan untuk dicabut atau dilakukan pengurangan lingkup sertifikasi.</p>
<p>LSBU Gapeknas Infrastruktur memberikan batas waktu pembekuan Sertifikat Badan Usaha sertifikat tidak melebihi 6 bulan.</p>
<p>Semua biaya yang timbul untuk pemberlakuan kembali sertifikat akan dikenakan pada BUJK.</p>
<p>Demikian surat pemberitahuan ini kami sampaikan untuk mendapat perhatian sepenuhnya.</p>
<div class="ttd">Lembaga Sertifikasi Badan Usaha<br>Gapeknas Infrastruktur
<div style="height:42px"></div>
<strong><?= html_escape($surat['penandatangan']); ?></strong><br>Ketua Pelaksana</div>
<div class="tembusan">Tembusan kepada Yth:<br>1. Direktur <?= html_escape($row['nama_bu']); ?><br>2. Arsip</div>
<div style="text-align:right;font-size:8pt">FR.PPS.10-03</div>
</body></html>
