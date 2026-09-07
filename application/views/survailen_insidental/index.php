<link href="<?= base_url('assets/plugins/custom/datatables/datatables.bundle.css'); ?>" rel="stylesheet" type="text/css" />

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="subheader py-2 py-lg-12 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center mr-1">
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <h2 class="d-flex align-items-center text-dark font-weight-bold my-1 mr-3">Survailen Insidental</h2>
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
                        <li class="breadcrumb-item text-muted">
                            <a href="<?= base_url('dashboard'); ?>" class="text-muted">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item text-muted">
                            <span class="text-muted">Daftar Badan Usaha</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">Daftar Survailen Insidental
                            <span class="d-block text-muted pt-2 font-size-sm">
                                Satu data terbaru untuk setiap NIB yang akan menjalani survailen insidental.
                            </span>
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-checkable" id="survailen_insidental_table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Badan Usaha</th>
                                    <th>NIB</th>
                                    <th>ID Izin</th>
                                    <th>Jenis Temuan</th>
                                    <th>Tanggal Temuan</th>
                                    <th>Asesor</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($survailen_list as $index => $item) : ?>
                                    <tr>
                                        <td><?= $index + 1; ?></td>
                                        <td><?= $item['nama_bu']; ?></td>
                                        <td><?= $item['nib']; ?></td>
                                        <td><?= $item['id_izin']; ?></td>
                                        <td><?= $item['jenis_temuan']; ?></td>
                                        <td data-order="<?= $item['tgl_temuan_order']; ?>"><?= $item['tgl_temuan']; ?></td>
                                        <td><?= $item['assessor_names']; ?></td>
                                        <td><?= $item['status']; ?></td>
                                        <td class="text-nowrap">
                                            <a href="<?= $item['detail_url']; ?>" class="btn btn-sm btn-light-primary font-weight-bolder mb-1">
                                                <i class="la la-eye"></i>Detail
                                            </a>
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-light-dark font-weight-bolder mb-1 btn-penunjukan-insidental"
                                                data-toggle="modal"
                                                data-target="#modal_penunjukan_insidental"
                                                data-token="<?= $item['token']; ?>"
                                                data-nib="<?= $item['nib']; ?>"
                                                data-nama="<?= $item['nama_bu']; ?>"
                                                data-tgl-pelaksanaan="<?= $item['tgl_pelaksanaan']; ?>"
                                                data-asesor-1="<?= $item['assessor_1']; ?>"
                                                data-asesor-2="<?= $item['assessor_2']; ?>"
                                                data-asesor-3="<?= $item['assessor_3']; ?>"
                                                data-has-appointment="<?= $item['has_appointment']; ?>"
                                            >
                                                <i class="la la-user-check"></i>
                                                <?= $item['has_appointment'] === '1' ? 'Ubah Asesor' : 'Tunjuk Asesor'; ?>
                                            </button>
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

<div class="modal fade" id="modal_penunjukan_insidental" tabindex="-1" role="dialog" aria-labelledby="judul_penunjukan_insidental" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <?php echo form_open(base_url('survailen-insidental/simpan-penunjukan'), array('id' => 'form_penunjukan_insidental')); ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="judul_penunjukan_insidental">Penunjukan Asesor Survailen Insidental</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="token" id="penunjukan_token">

                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label>Nama Badan Usaha</label>
                            <input type="text" id="penunjukan_nama_bu" class="form-control" readonly>
                        </div>
                        <div class="col-lg-4">
                            <label>NIB</label>
                            <input type="text" id="penunjukan_nib" class="form-control" readonly>
                        </div>
                        <div class="col-lg-4">
                            <label>Tanggal Pelaksanaan Survailen</label>
                            <input type="date" name="tgl_pelaksanaan" id="penunjukan_tgl_pelaksanaan" class="form-control" required>
                        </div>
                    </div>

                    <div class="alert alert-custom alert-light-warning fade show" role="alert">
                        <div class="alert-icon"><i class="flaticon-warning"></i></div>
                        <div class="alert-text">
                            Asesor 1 wajib berasal dari Asesor LSBU. Asesor 2 dan 3 dapat berasal dari Asesor atau Verifikator LSBU.
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-vertical-center">
                            <thead>
                                <tr>
                                    <th class="w-150px">Posisi</th>
                                    <th>Nama Asesor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="font-weight-bold">Asesor 1</td>
                                    <td>
                                        <select name="asesor_1" id="penunjukan_asesor_1" class="form-control penunjukan-select" required>
                                            <option value="">Pilih Asesor LSBU</option>
                                            <?php foreach ($assessor_candidates as $candidate) : ?>
                                                <option value="<?= html_escape($candidate['Username']); ?>">
                                                    <?= html_escape($candidate['Nama']); ?>
                                                    — <?= html_escape($candidate['nama_propinsi']); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Asesor 2</td>
                                    <td>
                                        <select name="asesor_2" id="penunjukan_asesor_2" class="form-control penunjukan-select">
                                            <option value="">Tidak ditunjuk</option>
                                            <?php foreach ($support_candidates as $candidate) : ?>
                                                <option value="<?= html_escape($candidate['Username']); ?>">
                                                    <?= html_escape($candidate['Nama']); ?>
                                                    — <?= $candidate['level'] === '3' ? 'Asesor' : 'Verifikator'; ?>
                                                    — <?= html_escape($candidate['nama_propinsi']); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold">Asesor 3</td>
                                    <td>
                                        <select name="asesor_3" id="penunjukan_asesor_3" class="form-control penunjukan-select">
                                            <option value="">Tidak ditunjuk</option>
                                            <?php foreach ($support_candidates as $candidate) : ?>
                                                <option value="<?= html_escape($candidate['Username']); ?>">
                                                    <?= html_escape($candidate['Nama']); ?>
                                                    — <?= $candidate['level'] === '3' ? 'Asesor' : 'Verifikator'; ?>
                                                    — <?= html_escape($candidate['nama_propinsi']); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="modal-footer">
                    <button
                        type="submit"
                        id="btn_batalkan_penunjukan"
                        formaction="<?= base_url('survailen-insidental/batalkan-penunjukan'); ?>"
                        formnovalidate
                        class="btn btn-light-danger mr-auto"
                    >
                        <i class="la la-times"></i>Batalkan Penunjukan
                    </button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="la la-save"></i>Simpan Penunjukan
                    </button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>

<script>
window.addEventListener('load', function () {
    $('#survailen_insidental_table').DataTable({
        responsive: false,
        scrollX: true,
        stateSave: false,
        pageLength: 25,
        lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
        order: [[5, 'desc']],
        columnDefs: [
            { targets: [0, 8], orderable: false, searchable: false },
            { targets: [0, 8], className: 'text-center' },
            { targets: [5, 7, 8], className: 'text-nowrap' }
        ],
        language: {
            search: 'Cari:',
            lengthMenu: 'Tampilkan _MENU_ data',
            zeroRecords: 'Data survailen insidental tidak ditemukan',
            info: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ data',
            infoEmpty: 'Tidak ada data yang ditampilkan',
            infoFiltered: '(disaring dari _MAX_ data)',
            paginate: {
                first: 'Pertama',
                last: 'Terakhir',
                next: 'Berikutnya',
                previous: 'Sebelumnya'
            }
        }
    });

    if ($.fn.select2) {
        $('.penunjukan-select').select2({
            width: '100%',
            dropdownParent: $('#modal_penunjukan_insidental')
        });
    }

    $('.btn-penunjukan-insidental').on('click', function () {
        var button = $(this);

        $('#penunjukan_token').val(button.attr('data-token'));
        $('#penunjukan_nib').val(button.attr('data-nib'));
        $('#penunjukan_nama_bu').val(button.attr('data-nama'));
        $('#penunjukan_tgl_pelaksanaan').val(button.attr('data-tgl-pelaksanaan'));
        $('#penunjukan_asesor_1').val(button.attr('data-asesor-1')).trigger('change');
        $('#penunjukan_asesor_2').val(button.attr('data-asesor-2')).trigger('change');
        $('#penunjukan_asesor_3').val(button.attr('data-asesor-3')).trigger('change');

        if (button.attr('data-has-appointment') === '1') {
            $('#btn_batalkan_penunjukan').show();
        } else {
            $('#btn_batalkan_penunjukan').hide();
        }
    });
});
</script>