<link href="<?= base_url('assets/plugins/custom/datatables/datatables.bundle.css'); ?>" rel="stylesheet" type="text/css" />

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="subheader py-2 py-lg-12 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center mr-1">
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <h2 class="d-flex align-items-center text-dark font-weight-bold my-1 mr-3">Detail Survailen Insidental</h2>
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
                        <li class="breadcrumb-item text-muted">
                            <a href="<?= base_url('survailen-insidental'); ?>" class="text-muted">Survailen Insidental</a>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <span class="text-muted"><?= $badan_usaha['nib']; ?></span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <a href="<?= base_url('survailen-insidental'); ?>" class="btn btn-light-primary font-weight-bold">
                    <i class="la la-arrow-left"></i>Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom gutter-b">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-user text-primary"></i>
                        </span>
                        <h3 class="card-label">
                            <?= $badan_usaha['nama_bu']; ?>
                            <small>NIB <?= $badan_usaha['nib']; ?></small>
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <?= $temuan_terbaru['status']; ?>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row mb-8">
                        <div class="col-md-4 mb-4 mb-md-0">
                            <div class="bg-light-primary rounded p-5 h-100">
                                <span class="text-muted font-weight-bold d-block mb-2">NIB</span>
                                <span class="text-dark font-weight-bolder font-size-lg"><?= $badan_usaha['nib']; ?></span>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4 mb-md-0">
                            <div class="bg-light-info rounded p-5 h-100">
                                <span class="text-muted font-weight-bold d-block mb-2">Jumlah ID Izin</span>
                                <span class="text-dark font-weight-bolder font-size-lg"><?= count($id_izin_list); ?></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="bg-light-warning rounded p-5 h-100">
                                <span class="text-muted font-weight-bold d-block mb-2">Jumlah Temuan</span>
                                <span class="text-dark font-weight-bolder font-size-lg"><?= $badan_usaha['total_temuan']; ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="mb-8">
                        <span class="text-muted font-weight-bold d-block mb-3">ID Izin</span>
                        <?php if (empty($id_izin_list)) : ?>
                            <span class="text-muted">-</span>
                        <?php else : ?>
                            <?php foreach ($id_izin_list as $id_izin) : ?>
                                <span class="label label-lg label-light-primary label-inline font-weight-bold mr-2 mb-2">
                                    <?= $id_izin; ?>
                                </span>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                    <ul class="nav nav-pills nav-pills-sm nav-dark-75 mb-8" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active py-3 px-6" data-toggle="tab" href="#ringkasan_insidental">
                                <span class="nav-icon"><i class="flaticon2-document"></i></span>
                                <span class="nav-text">Ringkasan</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link py-3 px-6" data-toggle="tab" href="#riwayat_insidental">
                                <span class="nav-icon"><i class="flaticon2-list-2"></i></span>
                                <span class="nav-text">Riwayat Temuan (<?= count($riwayat_temuan); ?>)</span>
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="ringkasan_insidental" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="card card-custom card-border mb-6">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h3 class="card-label">Temuan Terbaru</h3>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-borderless table-vertical-center mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <th class="text-muted w-200px">Jenis Temuan</th>
                                                            <td class="font-weight-bold"><?= $temuan_terbaru['jenis_temuan']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-muted">Tanggal Temuan</th>
                                                            <td><?= $temuan_terbaru['tgl_temuan']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-muted">Status</th>
                                                            <td><?= $temuan_terbaru['status']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-muted align-top">Uraian Temuan</th>
                                                            <td><?= $temuan_terbaru['uraian_temuan']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-muted align-top">Detail Temuan</th>
                                                            <td><?= $temuan_terbaru['detail_temuan']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-muted">Sumber Data</th>
                                                            <td><?= $temuan_terbaru['sumber_data']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-muted">Dibuat</th>
                                                            <td><?= $temuan_terbaru['created_at']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-muted">Diperbarui</th>
                                                            <td><?= $temuan_terbaru['updated_at']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-5">
                                    <div class="card card-custom card-border mb-6">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h3 class="card-label">Proses Survailen</h3>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-borderless mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <th class="text-muted">Tanggal Permohonan</th>
                                                            <td><?= $temuan_terbaru['tgl_permohonan']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-muted">Tanggal Penunjukan</th>
                                                            <td><?= $temuan_terbaru['tgl_penunjukan']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-muted">User Penunjukan</th>
                                                            <td><?= $temuan_terbaru['user_penunjukan']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-muted">Tanggal Penilaian</th>
                                                            <td><?= $temuan_terbaru['tgl_penilaian']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-muted">User Penilaian</th>
                                                            <td><?= $temuan_terbaru['user_penilaian']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-muted">Keputusan</th>
                                                            <td><?= $temuan_terbaru['keputusan']; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th class="text-muted align-top">Komentar</th>
                                                            <td><?= $temuan_terbaru['comment']; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="separator separator-dashed my-5"></div>
                                            <span class="text-muted font-weight-bold d-block mb-3">Assessor terkait</span>
                                            <?php if (empty($assessor_list)) : ?>
                                                <span class="text-muted">Belum ditentukan</span>
                                            <?php else : ?>
                                                <?php foreach ($assessor_list as $assessor) : ?>
                                                    <span class="label label-lg label-light-success label-inline font-weight-bold mr-2 mb-2">
                                                        <?= $assessor; ?>
                                                    </span>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="riwayat_insidental" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="riwayat_survailen_insidental">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>ID Izin</th>
                                            <th>Jenis Temuan</th>
                                            <th>Uraian Temuan</th>
                                            <th>Tanggal Temuan</th>
                                            <th>Status</th>
                                            <th>Assessor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($riwayat_temuan as $index => $item) : ?>
                                            <tr>
                                                <td><?= $index + 1; ?></td>
                                                <td><?= $item['id_izin']; ?></td>
                                                <td><?= $item['jenis_temuan']; ?></td>
                                                <td><?= $item['uraian_temuan']; ?></td>
                                                <td data-order="<?= $item['tgl_temuan_order']; ?>"><?= $item['tgl_temuan']; ?></td>
                                                <td><?= $item['status']; ?></td>
                                                <td>
                                                    <?= $item['asesor_1']; ?><br>
                                                    <?= $item['asesor_2']; ?><br>
                                                    <?= $item['asesor_3']; ?>
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
    </div>
</div>

<script>
window.addEventListener('load', function () {
    var historyTable = $('#riwayat_survailen_insidental').DataTable({
        responsive: false,
        scrollX: true,
        pageLength: 10,
        lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
        order: [[4, 'desc']],
        columnDefs: [
            { targets: [0], orderable: false, searchable: false, className: 'text-center' },
            { targets: [4, 5], className: 'text-nowrap' }
        ],
        language: {
            search: 'Cari:',
            lengthMenu: 'Tampilkan _MENU_ data',
            zeroRecords: 'Riwayat temuan tidak ditemukan',
            info: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ data',
            infoEmpty: 'Tidak ada riwayat yang ditampilkan',
            infoFiltered: '(disaring dari _MAX_ data)',
            paginate: {
                first: 'Pertama',
                last: 'Terakhir',
                next: 'Berikutnya',
                previous: 'Sebelumnya'
            }
        }
    });

    $('a[href="#riwayat_insidental"]').on('shown.bs.tab', function () {
        historyTable.columns.adjust();
    });
});
</script>