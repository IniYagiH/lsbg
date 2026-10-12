<link href="<?= base_url('assets/plugins/custom/datatables/datatables.bundle.css'); ?>" rel="stylesheet" type="text/css" />
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="subheader py-2 py-lg-12 subheader-transparent">
        <div class="container">
            <h2 class="text-dark font-weight-bold">Sanksi Administratif</h2>
            <a href="<?= base_url('survailen-insidental'); ?>">Daftar Survailen Insidental</a>
        </div>
    </div>
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom"><div class="card-body">
                <p>Daftar sanksi administratif dari SIKI. Satu izin dapat memiliki beberapa sanksi; setiap sanksi ditampilkan sebagai baris tersendiri.</p>
                <?php if (!$schema_ready) : ?>
                    <div class="alert alert-warning">Tabel sanksi belum tersedia. Jalankan file
                        <code>database/schema/20261010_create_lsbu_sanksi_administratif_sbu.sql</code> pada database aplikasi terlebih dahulu.</div>
                <?php endif; ?>
                <div class="d-flex align-items-center flex-wrap mb-4">
                    <?= form_open(base_url('survailen-insidental/sangsi-adminstrastif/refresh'), array('id' => 'refresh_sanksi_form', 'class' => 'mr-4 mb-2')); ?>
                        <input type="hidden" name="_sanksi_nonce" value="<?= html_escape($refresh_nonce); ?>">
                        <button type="submit" id="refresh_sanksi_btn" class="btn btn-primary" <?= !$schema_ready ? 'disabled' : ''; ?>>
                            <span class="spinner-border spinner-border-sm mr-2 d-none" id="refresh_sanksi_spinner" aria-hidden="true"></span>
                            <span id="refresh_sanksi_label">Refresh Data</span>
                        </button>
                    <?= form_close(); ?>
                    <span class="text-muted mb-2">Refresh terakhir berhasil:
                        <?= html_escape($last_sync ? $last_sync['synced_at'] : 'Belum pernah'); ?>
                        <?= $last_sync ? ' (' . (int) $last_sync['row_count'] . ' sanksi)' : ''; ?>
                    </span>
                </div>
                <div id="refresh_sanksi_message" class="mb-4" role="status" aria-live="polite"></div>
                <form method="get" action="<?= base_url('survailen-insidental/sangsi-adminstrastif'); ?>" class="mb-4">
                    <label for="sanksi_search">Cari nama badan usaha, NIB, ID izin, subklasifikasi, kualifikasi, atau keterangan</label>
                    <div class="d-flex">
                        <input id="sanksi_search" name="q" maxlength="200" class="form-control mr-2" value="<?= html_escape($search); ?>">
                        <button type="submit" class="btn btn-primary mr-2">Cari</button>
                        <a class="btn btn-light" href="<?= base_url('survailen-insidental/sangsi-adminstrastif'); ?>">Reset</a>
                    </div>
                </form>
                <div class="d-flex align-items-center flex-wrap mb-4">
                    <?php if ($schema_ready) : ?>
                        <a class="btn btn-success mr-4" href="<?= html_escape(base_url('survailen-insidental/sangsi-adminstrastif/export') . '?' . http_build_query(array('q' => $search))); ?>">
                            <i class="la la-file-excel"></i>Export Excel (.xlsx)
                        </a>
                    <?php endif; ?>
                    <span><?= count($sanksi_rows); ?> sanksi sesuai pencarian</span>
                </div>
                <p class="text-muted">Ekspor mencakup seluruh hasil pencarian yang sudah diterapkan, termasuk halaman tabel lainnya.</p>
                <p class="text-muted">Pengiriman email uji hanya ke yagihagiyansyah99@gmail.com. Tautan surat berlaku 7 hari.</p>
                <?php if (empty($archive_ready)) : ?>
                <div class="alert alert-warning">Status surat belum tersedia. Jalankan SQL <code>20261012_create_surat_pembekuan.sql</code> untuk mengaktifkan penerbitan dan riwayat email.</div>
                <?php endif; ?>
                <div id="email_sanksi_message" class="mb-4" role="status" aria-live="polite"></div>
                <div class="table-responsive">
                    <table id="sanksi_table" class="table table-bordered table-hover">
                        <thead><tr><th>No.</th><th>ID Izin</th><th>NIB</th><th>Nama Badan Usaha</th>
                            <th>Subklasifikasi</th><th>Kualifikasi</th><th>Keterangan</th><th>Status Surat / Email</th><th>Aksi</th></tr></thead>
                        <tbody>
                        <?php foreach ($sanksi_rows as $index => $row) : ?>
                            <?php
                            $identity = hash('sha256', json_encode(array((string) $row['nib'], (string) $row['id_izin'])));
                            $state = isset($status_map[$identity]) ? $status_map[$identity] : null;
                            ?>
                            <tr><td><?= $index + 1; ?></td>
                                <?php foreach (array('id_izin', 'nib', 'nama_bu', 'kode_subklasifikasi', 'id_kualifikasi', 'keterangan') as $key) : ?>
                                    <td><?= html_escape($row[$key]); ?></td>
                                <?php endforeach; ?>
                                <td>
                                    <?php if (empty($archive_ready)) : ?>Status belum tersedia
                                    <?php else : ?>
                                        <?php if ($state) : ?><div><?= html_escape($state['letter']['nomor_surat']); ?></div><?php endif; ?>
                                        <?php if ($state && $state['success']) : ?>
                                            <span class="badge badge-success"><?= $state['success']['is_test'] ? 'Terkirim ke email uji' : 'Sudah dikirim'; ?></span>
                                            <div><?= html_escape($state['success']['penerima']); ?><br><?= html_escape($state['success']['finished_at']); ?></div>
                                            <?php if ((string) $state['success']['surat_id'] !== (string) $state['letter']['id']) : ?>
                                                <small>Keberhasilan pada surat sebelumnya; surat terbaru belum berhasil dikirim.</small>
                                            <?php endif; ?>
                                        <?php else : ?><span class="badge badge-secondary">Belum dikirim</span><?php endif; ?>
                                        <?php if ($state && $state['last'] && $state['last']['status'] !== 'SENT') : ?>
                                            <div class="text-warning"><?= $state['last']['status'] === 'FAILED' ? 'Percobaan terakhir gagal' : 'Pengiriman sedang diproses / belum terkonfirmasi'; ?></div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </td>
                                <td><a class="btn btn-sm btn-light-primary text-nowrap" href="<?= html_escape(base_url('survailen-insidental/sangsi-adminstrastif/surat/' . $row['id'])); ?>">Surat Pembekuan</a>
                                    <button type="button" class="btn btn-sm btn-primary text-nowrap email-sanksi-btn mt-1" <?= empty($archive_ready) || !$state ? 'disabled' : ''; ?> data-url="<?= html_escape(base_url('survailen-insidental/sangsi-adminstrastif/kirim-email/' . $row['id'])); ?>">Kirim Email</button>
                                    <?php if (!empty($archive_ready) && $state) : ?>
                                    <a class="btn btn-sm btn-light-warning mt-1" href="<?= html_escape(base_url('survailen-insidental/sangsi-adminstrastif/surat/' . $row['id']) . '?baru=1'); ?>">Terbitkan Surat Baru</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div></div>
        </div>
    </div>
</div>
<script>
window.addEventListener('load', function () {
    $('#sanksi_table').DataTable({
        responsive: false, scrollX: true, searching: false, stateSave: false,
        pageLength: 25, lengthMenu: [[10, 25, 50, 100], [10, 25, 50, 100]], order: [],
        columnDefs: [{targets: [0, 7, 8], orderable: false}, {targets: [1, 2, 4, 5], className: 'text-nowrap'}],
        language: {
            lengthMenu: 'Tampilkan _MENU_ data', emptyTable: 'Belum ada sanksi sesuai pencarian',
            info: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ sanksi', infoEmpty: 'Tidak ada data',
            paginate: {first: 'Pertama', last: 'Terakhir', next: 'Berikutnya', previous: 'Sebelumnya'}
        }
    });
    var busy = false;
    function updateEmailCsrf(data) {
        if (!data || !data.csrf_name || !data.csrf_hash) return;
        $('#refresh_sanksi_form input[type="hidden"]').each(function () {
            if (this.name === data.csrf_name) this.value = data.csrf_hash;
        });
    }
    $('#sanksi_table').on('click', '.email-sanksi-btn', function () {
        if (busy) return;
        busy = true;
        var button = $(this);
        button.prop('disabled', true).attr('aria-busy', 'true').text('Mengirim...');
        $('#refresh_sanksi_btn').prop('disabled', true);
        $('#email_sanksi_message').removeClass('text-danger text-success').text('Sedang mengirim email...');
        $.ajax({url: button.attr('data-url'), method: 'POST',
            data: $('#refresh_sanksi_form').serialize(), dataType: 'json', timeout: 125000})
            .done(function (data) {
                updateEmailCsrf(data);
                $('#email_sanksi_message').addClass(data.success ? 'text-success' : 'text-danger').text(data.message);
                if (data.success) window.location.reload();
            })
            .fail(function (xhr) {
                updateEmailCsrf(xhr.responseJSON);
                $('#email_sanksi_message').addClass('text-danger').text(
                    xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message :
                    'Hasil pengiriman belum dapat dikonfirmasi. Periksa kotak masuk sebelum mengirim ulang.');
            })
            .always(function () {
                busy = false;
                button.prop('disabled', false).removeAttr('aria-busy').text('Kirim Email');
                $('#refresh_sanksi_btn').prop('disabled', false);
            });
    });
    $('#refresh_sanksi_form').on('submit', function (event) {
        event.preventDefault();
        if (busy || $('#refresh_sanksi_btn').prop('disabled')) return;
        busy = true;
        $('#refresh_sanksi_btn').prop('disabled', true).attr('aria-busy', 'true');
        $('#refresh_sanksi_spinner').removeClass('d-none');
        $('#refresh_sanksi_label').text('Mengambil data...');
        $('#refresh_sanksi_message').removeClass('text-danger text-success').text('Sedang mengambil data dari SIKI. Mohon tunggu.');
        var form = $(this);
        function updateCsrf(data) {
            if (!data || !data.csrf_name || !data.csrf_hash) return;
            form.find('input[type="hidden"]').each(function () {
                if (this.name === data.csrf_name) this.value = data.csrf_hash;
            });
        }
        $.ajax({url: form.attr('action'), method: 'POST', data: form.serialize(), dataType: 'json', timeout: 125000})
            .done(function (data) {
                updateCsrf(data);
                $('#refresh_sanksi_message').addClass(data.success ? 'text-success' : 'text-danger').text(data.message);
                if (data.success) window.location.reload();
            })
            .fail(function (xhr) {
                updateCsrf(xhr.responseJSON);
                $('#refresh_sanksi_message').addClass('text-danger').text(
                    xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message :
                        'Hasil refresh belum dapat dikonfirmasi. Muat ulang halaman untuk memeriksa waktu refresh terakhir.');
            })
            .always(function () {
                busy = false;
                $('#refresh_sanksi_btn').prop('disabled', false).removeAttr('aria-busy');
                $('#refresh_sanksi_spinner').addClass('d-none');
                $('#refresh_sanksi_label').text('Refresh Data');
            });
    });
});
</script>
