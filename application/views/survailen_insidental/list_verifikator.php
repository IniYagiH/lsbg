<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<link href="<?= base_url('assets/plugins/custom/datatables/datatables.bundle.css'); ?>" rel="stylesheet" type="text/css" />

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="subheader py-2 py-lg-12 subheader-transparent" id="kt_subheader">
        <div class="container">
            <h2 class="text-dark font-weight-bold my-1">Tinjauan Permohonan Survailen Insidental</h2>
        </div>
    </div>
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">Daftar Penugasan Saya
                            <span class="d-block text-muted pt-2 font-size-sm">
                                Penilaian yang disimpan oleh salah satu asesor berlaku sebagai hasil bersama tim.
                            </span>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-checkable" id="insidental_verifikator_table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Badan Usaha</th>
                                    <th>NIB</th>
                                    <th>ID Izin</th>
                                    <th>Posisi Asesor</th>
                                    <th>Tanggal Pelaksanaan</th>
                                    <th>Status Penilaian</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($survailen_list as $index => $item) : ?>
                                    <?php
                                    $assessed = $item['assessment_nib'] !== null;
                                    $date = !empty($item['tgl_pelaksanaan']) && $item['tgl_pelaksanaan'] !== '0000-00-00'
                                        ? $item['tgl_pelaksanaan'] : '';
                                    $detail_url = base_url('survailen-insidental/tinjauan-permohonan-verifikator/' . encrypt_url($item['nib']));
                                    ?>
                                    <tr>
                                        <td><?= $index + 1; ?></td>
                                        <td><?= html_escape(!empty($item['nama_bu']) ? $item['nama_bu'] : 'Nama badan usaha belum tersedia'); ?></td>
                                        <td><?= html_escape($item['nib']); ?></td>
                                        <td><?= html_escape((string) $item['id_izin']); ?></td>
                                        <td>Asesor <?= (int) $item['urutan_asesor']; ?></td>
                                        <td data-order="<?= html_escape($date); ?>"><?= $date !== '' ? html_escape(date('d-m-Y', strtotime($date))) : '-'; ?></td>
                                        <td>
                                            <span class="label label-inline font-weight-bold <?= $assessed ? 'label-light-success' : 'label-light-warning'; ?>">
                                                <?= $assessed ? 'Sudah tersimpan' : 'Belum dinilai'; ?>
                                            </span>
                                            <?php if ($assessed) : ?>
                                                <small class="d-block text-muted mt-2">
                                                    Disimpan oleh <?= html_escape((string) $item['penilai_terakhir']); ?><br>
                                                    <?= html_escape((string) $item['updated_at']); ?>
                                                </small>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-nowrap">
                                            <a href="<?= html_escape($detail_url); ?>" class="btn btn-sm btn-light-primary font-weight-bolder">
                                                <i class="la la-eye"></i><?= $assessed ? 'Lihat Penilaian' : 'Tinjau'; ?>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
window.addEventListener('load', function () {
    $('#insidental_verifikator_table').DataTable({
        scrollX: true,
        stateSave: false,
        pageLength: 25,
        order: [[5, 'desc']],
        columnDefs: [
            { targets: [0, 7], orderable: false, searchable: false },
            { targets: [0, 4, 5, 7], className: 'text-nowrap' }
        ],
        language: {
            search: 'Cari:',
            lengthMenu: 'Tampilkan _MENU_ data',
            emptyTable: 'Belum ada penugasan survailen insidental aktif untuk Anda.',
            zeroRecords: 'Penugasan tidak ditemukan',
            info: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ penugasan',
            infoEmpty: 'Tidak ada penugasan yang ditampilkan',
            infoFiltered: '(disaring dari _MAX_ penugasan)',
            paginate: { first: 'Pertama', last: 'Terakhir', next: 'Berikutnya', previous: 'Sebelumnya' }
        }
    });
});
</script>
