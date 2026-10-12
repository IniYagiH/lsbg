<?php
// One-click POST issuance; no user-entered fields.
$version_row = $row;
ksort($version_row);
$version = hash('sha256', json_encode(array_map('strval', $version_row)));
?>
<?= form_open(base_url('survailen-insidental/sangsi-adminstrastif/terbitkan-surat/' . $row['id']), array('class' => 'd-inline')); ?>
<input type="hidden" name="_sanksi_nonce" value="<?= html_escape($refresh_nonce); ?>">
<input type="hidden" name="expected_letter" value="<?= $state ? (int) $state['letter']['id'] : 0; ?>">
<input type="hidden" name="snapshot_version" value="<?= html_escape($version); ?>">
<button class="btn btn-sm <?= $state ? 'btn-light-warning' : 'btn-light-primary'; ?> mt-1" type="submit"><?= $state ? 'Terbitkan Surat Baru' : 'Buat Surat Pembekuan'; ?></button>
<?= form_close(); ?>
