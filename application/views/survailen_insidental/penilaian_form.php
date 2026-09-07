<?php
defined('BASEPATH') or exit('No direct script access allowed');

$values = array_merge(array(
    'tgl_pelaksanaan' => !empty($asesor_insidental[0]['tgl_pelaksanaan'])
        ? $asesor_insidental[0]['tgl_pelaksanaan'] : date('Y-m-d'),
    'tempat_pelaksanaan' => isset($biodata[0]['id_propinsi']) ? $biodata[0]['id_propinsi'] : '',
    'ketidaksesuaian' => '',
    'referensi' => "PERATURAN MENTERI PUPR NOMOR 08 TAHUN 2022;\nKEPUTUSAN DIRJEN BINA KONSTRUKSI NOMOR 144 TAHUN 2022;\nSKEMA SERTIFIKASI",
    'rencana_perbaikan' => '3 BULAN',
    'tgl_selesai' => date('Y-m-d'),
    'jenis_temuan' => null,
    'hasil_akhir' => '1',
    'hasil_tindak_lanjut' => null,
), !empty($penilaian) ? $penilaian[0] : array());

$text_fields = array(
    'tgl_pelaksanaan' => array('Tgl Pelaksanaan', 'text', 'tgl_1'),
    'tempat_pelaksanaan' => array('Tempat Pelaksanaan', 'text', 'tempat_pelaksanaan'),
    'ketidaksesuaian' => array('Ketidaksesuaian (ditulis secara jelas dan terukur)', 'textarea', 'ketidaksesuaian'),
    'referensi' => array('Referensi', 'textarea', 'referensi'),
    'rencana_perbaikan' => array('Rencana Perbaikan', 'textarea', 'rencana_perbaikan'),
    'tgl_selesai' => array('Tgl Selesai', 'text', 'tgl_2'),
);
$select_fields = array(
    'jenis_temuan' => array('Jenis Temuan', array('' => 'Pilih Jenis Temuan', '1' => 'Sesuai', '0' => 'Tidak Sesuai'), 'getval(this)'),
    'hasil_akhir' => array('Hasil Akhir', array('' => 'Pilih Hasil Akhir', '1' => 'Sesuai', '0' => 'Perlu Perbaikan'), ''),
    'hasil_tindak_lanjut' => array('Hasil Perbaikan/Tindak Lanjut', array('' => 'Pilih Hasil Perbaikan', '1' => 'Memenuhi', '0' => 'Tidak Memenuhi'), 'getval2(this)'),
);
?>
<div class="alert alert-light-info mb-4">
    Satu penilaian berlaku untuk seluruh asesor yang ditunjuk.
    <?php if (!empty($values['id_asesor'])) : ?>
        Terakhir disimpan oleh <strong><?= html_escape($values['id_asesor']); ?></strong>
        pada <?= html_escape((string) $values['updated_at']); ?>.
    <?php endif; ?>
</div>
<?= form_open($penilaian_action, array('method' => 'post')); ?>
    <input type="hidden" name="id1" value="<?= html_escape($id1); ?>">
    <input type="hidden" name="assessment_version" value="<?= html_escape($assessment_version); ?>">
    <table class="table table-lg">
        <thead>
            <tr><th>Point Penilaian</th><th>Penilaian Asesor</th></tr>
        </thead>
        <tbody>
            <?php foreach ($text_fields as $field => $config) : ?>
                <tr>
                    <td><label for="<?= $config[2]; ?>">#<?= $config[0]; ?></label></td>
                    <td>
                        <?php if ($config[1] === 'textarea') : ?>
                            <textarea name="<?= $field; ?>" id="<?= $config[2]; ?>" class="form-control form-control-solid" rows="5"><?= html_escape((string) $values[$field]); ?></textarea>
                        <?php else : ?>
                            <input type="text" name="<?= $field; ?>" id="<?= $config[2]; ?>" class="form-control form-control-solid" value="<?= html_escape((string) $values[$field]); ?>">
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            <?php foreach ($select_fields as $field => $config) : ?>
                <tr>
                    <td><label for="<?= $field; ?>">#<?= $config[0]; ?></label></td>
                    <td>
                        <select name="<?= $field; ?>" id="<?= $field; ?>" class="form-control h-auto form-control-solid py-4 px-8"<?= $config[2] !== '' ? ' onchange="' . $config[2] . '"' : ''; ?>>
                            <?php foreach ($config[1] as $value => $label) : ?>
                                <option value="<?= $value; ?>"<?= (string) $values[$field] === (string) $value ? ' selected' : ''; ?>><?= $label; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <button type="submit" name="submit" class="btn btn-dark float-right">
        <i class="la la-save"></i>Submit Penilaian
    </button>
<?= form_close(); ?>
