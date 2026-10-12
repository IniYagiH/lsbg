<div class="container py-5">
<h2><?= $latest ? 'Terbitkan Surat Baru' : 'Terbitkan Surat Pembekuan'; ?></h2>
<p><?= html_escape($row['nama_bu']); ?> ? NIB <?= html_escape($row['nib']); ?> / ID izin <?= html_escape($row['id_izin']); ?></p>
<?php if ($latest) : ?><div class="alert alert-warning">Surat <?= html_escape($latest['nomor_surat']); ?> tetap tersimpan.
Penerbitan ini membuat nomor dan tanggal baru. Untuk cetak atau kirim ulang, gunakan surat yang sudah ada.</div><?php endif; ?>
<p>Nomor dan tanggal surat rekomendasi dialokasikan saat diterbitkan. Masukkan referensi SP II yang sebenarnya.</p>
<?= form_open(base_url('survailen-insidental/sangsi-adminstrastif/terbitkan-surat/' . $row['id'])); ?>
<input type="hidden" name="_sanksi_nonce" value="<?= html_escape($nonce); ?>">
<input type="hidden" name="expected_letter" value="<?= $latest ? (int) $latest['id'] : 0; ?>">
<input type="hidden" name="snapshot_version" value="<?= html_escape($version); ?>">
<div class="form-group"><label>Nomor SP II</label><input class="form-control" name="nomor_sp2" maxlength="100" required></div>
<div class="form-group"><label>Tanggal SP II</label><input class="form-control" type="date" name="tanggal_sp2" max="<?= date('Y-m-d'); ?>" required></div>
<button class="btn btn-primary" type="submit">Terbitkan Surat</button>
<a class="btn btn-light" href="<?= base_url('survailen-insidental/sangsi-adminstrastif'); ?>">Kembali</a>
<?= form_close(); ?>
</div>
