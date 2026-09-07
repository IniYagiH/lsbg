<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php if (empty($biodata)) : ?>
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="subheader py-2 py-lg-12 subheader-transparent" id="kt_subheader">
            <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <div class="d-flex align-items-center mr-1">
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <h2 class="d-flex align-items-center text-dark font-weight-bold my-1 mr-3">
                            Tinjauan Permohonan Survailen Insidental
                        </h2>
                    </div>
                </div>
                <a href="<?= html_escape($insidental_back_url); ?>" class="btn btn-light-primary font-weight-bold">
                    <i class="la la-arrow-left"></i>Kembali
                </a>
            </div>
        </div>

        <div class="d-flex flex-column-fluid">
            <div class="container">
                <div class="alert alert-custom alert-light-warning fade show" role="alert">
                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                    <div class="alert-text">
                        Data permohonan SBU untuk <strong><?= $accidental_nama_bu; ?></strong>
                        dengan NIB <strong><?= $accidental_nib; ?></strong> belum tersedia di data badan usaha.
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else : ?>
    <?php include APPPATH . 'views/survailen/tinjau_permohonan.php'; ?>
<?php endif; ?>