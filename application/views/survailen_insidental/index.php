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
                                Badan usaha yang telah ditetapkan untuk proses survailen insidental.
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
                                    <th>Subklasifikasi</th>
                                    <th>Kualifikasi</th>
                                    <th>Jenis Temuan</th>
                                    <th>Tanggal Temuan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
window.addEventListener('load', function () {
    $('#survailen_insidental_table').DataTable({
        processing: true,
        serverSide: true,
        responsive: false,
        scrollX: true,
        stateSave: false,
        pageLength: 25,
        lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]],
        order: [[7, 'desc']],
        ajax: {
            url: '<?= base_url('survailen-insidental/ajax-list'); ?>',
            type: 'POST'
        },
        columnDefs: [
            { targets: [0, 9], orderable: false, searchable: false },
            { targets: [0, 9], className: 'text-center' },
            { targets: [7, 8], className: 'text-nowrap' }
        ],
        language: {
            search: 'Cari:',
            lengthMenu: 'Tampilkan _MENU_ data',
            processing: 'Memuat data...',
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
});
</script>
