<!doctype html>
<html lang="id"><head><meta charset="utf-8"><title>Pemberitahuan Pembekuan SBU</title></head>
<body style="font-family:Arial,sans-serif;color:#333;line-height:1.6">
<div style="max-width:640px;margin:auto;padding:24px;border:1px solid #ddd">
    <h2 style="color:#174d80">LSBU GAPEKNAS</h2>
    <p>Yth. Pimpinan <?= html_escape($row['nama_bu']); ?>,</p>
    <p>Sehubungan dengan hasil survailen insidental dan data sanksi administratif SBU,
        kami menyampaikan pemberitahuan terkait pembekuan SBU dengan rincian berikut:</p>
    <table cellpadding="6">
        <?php foreach (array('nama_bu' => 'Badan Usaha', 'nib' => 'NIB', 'id_izin' => 'ID Izin',
            'kode_subklasifikasi' => 'Subklasifikasi', 'id_kualifikasi' => 'Kualifikasi', 'keterangan' => 'Keterangan') as $key => $label) : ?>
        <tr><td><?= $label; ?></td><td><?= html_escape($row[$key]); ?></td></tr>
        <?php endforeach; ?>
    </table>
    <p>Surat rekomendasi pembekuan SBU ke LPJK dapat dibuka, diunduh, dan dicetak melalui tombol berikut:</p>
    <p><a href="<?= html_escape($document_url); ?>" style="display:inline-block;background:#174d80;color:#fff;padding:12px 20px;text-decoration:none">Lihat / Cetak Surat Pembekuan</a></p>
    <p>Tautan berlaku selama 7 hari sejak email dikirim. Setelah tautan kedaluwarsa,
        silakan meminta tautan baru kepada LSBU GAPEKNAS. Mohon simpan tautan ini dan jangan membagikannya kepada pihak lain.</p>
    <p>Hormat kami,<br>LSBU GAPEKNAS</p>
</div></body></html>
