<link href="<?= base_url('assets/fileinput/css/fileinput.css'); ?>" media="all" rel="stylesheet" type="text/css" />
<link href="<?= base_url('assets/fileinput/themes/explorer-fas/theme.css'); ?>" media="all" rel="stylesheet"
  type="text/css" />
<link href="<?= base_url('assets/plugins/custom/datatables/datatables.bundle.css'); ?>" rel="stylesheet"
  type="text/css" />

<?php
echo script_tag('assets/jquery.-3.6.0.min.js');

echo script_tag('assets/fileinput/fileinput2.js');
echo script_tag('assets/fileinput/js/plugins/piexif.js');
echo script_tag('assets/fileinput/js/plugins/sortable.js');
echo script_tag('assets/fileinput/js/locales/fr.js');
echo script_tag('assets/fileinput/js/locales/es.js');
echo script_tag('assets/fileinput/themes/fas/theme.js');
echo script_tag('assets/fileinput/themes/explorer-fas/theme.js');
echo script_tag('assets/fileinput/js/plugins/piexif.js');
echo script_tag('assets/js/mask.js');
echo script_tag('assets/js/pages/crud/datatables/extensions/responsive.js');
?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
  <!--begin::Subheader-->
  <div class="subheader py-2 py-lg-12 subheader-transparent" id="kt_subheader">
    <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
      <!--begin::Info-->
      <div class="d-flex align-items-center mr-1">
        <!--begin::Page Heading-->
        <div class="d-flex align-items-baseline flex-wrap mr-5">
          <!--begin::Page Title-->
          <h2 class="d-flex align-items-center text-dark font-weight-bold my-1 mr-3">Permohonan</h2>
          <!--end::Page Title-->
          <!--begin::Breadcrumb-->
          <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
            <li class="breadcrumb-item text-muted">
              <a href="" class="text-dark">Survailen</a>
            </li>
            <li class="breadcrumb-item text-muted">
              <a href="" class="text-dark">List Evaluator Asesor Survailen</a>
            </li>

          </ul>
          <!--end::Breadcrumb-->
        </div>
        <!--end::Page Heading-->
      </div>

    </div>
  </div>
  <!--end::Subheader-->
  <!--begin::Entry-->
  <div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
      <!--begin::Notice-->

      <!--end::Notice-->
      <!--begin::Card-->
      <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
          <div class="card-title">
            <h3 class="card-label">Permohonan Evaluator Asesor
              <span class="d-block text-muted pt-2 font-size-sm">Daftar Keseluruhan Permohonan Untuk Dilakukan Evaluasi
                Asesor Survailen</span>
            </h3>
          </div>
          <div class="card-toolbar">

          </div>

        </div>
        <div class="card-body">

          <!--begin: Datatable-->
          <table class="table table-bordered table-hover table-checkable mt-10" id="kt_datatable2">
            <thead>
              <tr>
                <th colspan="4">Data Badan Usaha</th>
                <th colspan="4">Permohonan</th>

                <th colspan="4">Status Permohonan</th>

              </tr>
              <tr>
                <th>Detail Data</th>

                <th>ID IZIN</th>
                <th>Nama Badan Usaha</th>
                <th>NIB</th>
                <th>Sub Klasifikasi</th>
                <th>Kualifikasi</th>
                <th>Asesor</th>
                <th>Status Proses</th>
                <th>Tgl Permohonan</th>

                <th>File Asesor 1</th>
                <th>File Asesor 2</th>
                <th>File Asesor 3</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($record)) : ?>
              <?php foreach ($record as $row) : ?>
              <tr>
                <td></td>

                <td>

                  <?= $row['id_izin']; ?>

                </td>
                <td>

                  <?= $row['nama']; ?>

                </td>
                <td><?= $row['NIB']; ?></td>

                <td><?= $row['concat_sub']; ?></td>
                <td><?= $row['concat_kualifikasi']; ?></td>
                <td><?= $row['asesor1'].', '.$row['asesor2'].', '.$row['asesor3']; ?></td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="false">Belum Diputuskan</button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" id="<?=$row['id_izin'];?>"
                        onclick="javascript:perbaikan(this)">Perbaikan</a>
                      <a class="dropdown-item" id="<?=$row['id_izin'];?>" onclick="javascript:lolos(this)">Lolos</a>

                    </div>
                  </div>

                </td>

                <td><?= $row['tgl_permohonan']; ?></td>




                <td>
                  <a href="<?=base_url('survailen/cetak_penilaian_asesor/'.$row['id_izin'].'/'.encrypt_url($row['concat_sub']).'/'.encrypt_url($row['username1']));?>"
                    target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat
                    File</a></td>



                <td><a
                    href="<?=base_url('survailen/cetak_penilaian_asesor/'.$row['id_izin'].'/'.encrypt_url($row['concat_sub']).'/'.encrypt_url($row['username2']));?>"
                    target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat
                    File</a></td>



                <td><a
                    href="<?=base_url('survailen/cetak_penilaian_asesor/'.$row['id_izin'].'/'.encrypt_url($row['concat_sub']).'/'.encrypt_url($row['username3']));?>"
                    target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat
                    File</a></td>


              </tr>
              <?php endforeach; ?>
              <?php endif; ?>












            </tbody>
          </table>
          <!--end: Datatable-->
        </div>
      </div>
      <!--end::Card-->
    </div>
    <!--end::Container-->
  </div>
  <!--end::Entry-->
</div>
<script type="text/javascript">

function lolos(sel) {
  console.log(sel.id);
  Swal.fire({
        title: "Anda ingin meloloskan permohonan ini?",
        text: "Proses merubah status permohona survailen ini menjadi lolos",
        icon: "warning",
        
        showCancelButton: true,
        confirmButtonText: "YA !",
        cancelButtonText: "No, Batalkan!",
        reverseButtons: true
    }).then(function(result) {

        if (result.value) {
          Swal.fire({
             title: "Mohon Tunggu!",
             text: "Sedang Berjalan",
             onOpen: function() {
                 Swal.showLoading();

             }
         });
          $.ajax({
              url : "<?php echo base_url('survailen/update_lolos'); ?>",
              type : "POST",
              data : {id_izin : sel.id},
              success : function(data) {
                response = jQuery.parseJSON(data);
                console.log(response);

                  Swal.fire({

                      icon: "success",
                      title: "Status berhasil dirubah",
                      showConfirmButton: false,
                      timer: 1500
                  });


                location.reload();
                },
                error: function(xhr, status, error) {
                  var err = eval("(" + xhr.responseText + ")");
                  alert(err.Message);
                }
            });


        } else if (result.dismiss === "cancel") {
            Swal.fire(
                "Cancelled",
                "Permohonan batal dirubah :)",
                "error"
            )
        }
    });
}
</script>
<script>
function perbaikan(sel) {

  Swal.fire({
        title: "Anda ingin merubah status menjadi Perbaikan?",
        text: "Proses akan memberitahu ke badan usaha untuk memperbaiki permohonan",
        icon: "warning",
        input: 'textarea',
          inputAttributes: {
            autocapitalize: 'off',
            placeholder: "Tulis Pesan Ke Badan Usaha"
          },
        showCancelButton: true,
        confirmButtonText: "YA !",
        cancelButtonText: "No, Batalkan!",
        reverseButtons: true
    }).then(function(result) {

        if (result.value) {
          Swal.fire({
             title: "Mohon Tunggu!",
             text: "Sedang Berjalan",
             onOpen: function() {
                 Swal.showLoading();

             }
         });
          $.ajax({
              url : "<?php echo base_url('survailen/update_perbaikan'); ?>",
              type : "POST",
              data : {id_izin : sel.id,
                  comment: result.value},
              success : function(data) {
                response = jQuery.parseJSON(data);
                console.log(response);

                  Swal.fire({

                      icon: "success",
                      title: "Status berhasil dirubah",
                      showConfirmButton: false,
                      timer: 1500
                  });


                location.reload();
                },
                error: function(xhr, status, error) {
                  var err = eval("(" + xhr.responseText + ")");
                  alert(err.Message);
                }
            });


        } else if (result.dismiss === "cancel") {
            Swal.fire(
                "Cancelled",
                "Permohonan batal dirubah :)",
                "error"
            )
        }
    });
}
</script>
<script>
function tolak(sel) {

  Swal.fire({
        title: "Anda ingin merubah status menjadi Tolak?",
        text: "Proses akan memberitahu ke badan usaha permohonan ditolak dan harus mengulang lagi",
        icon: "warning",
        input: 'textarea',
          inputAttributes: {
            autocapitalize: 'off',
            placeholder: "Tulis Pesan Ke Badan Usaha"
          },
        showCancelButton: true,
        confirmButtonText: "YA !",
        cancelButtonText: "No, Batalkan!",
        reverseButtons: true
    }).then(function(result) {

        if (result.value) {
          Swal.fire({
             title: "Mohon Tunggu!",
             text: "Sedang Berjalan",
             onOpen: function() {
                 Swal.showLoading();

             }
         });
          $.ajax({
              url : "<?php echo base_url('survailen/update_lolos'); ?>",
              type : "POST",
              data : {id_izin : sel.id},
              success : function(data) {
                response = jQuery.parseJSON(data);
                console.log(response);

                  Swal.fire({

                      icon: "success",
                      title: "Status berhasil dirubah",
                      showConfirmButton: false,
                      timer: 1500
                  });


                location.reload();
                },
                error: function(xhr, status, error) {
                  var err = eval("(" + xhr.responseText + ")");
                  alert(err.Message);
                }
            });


        } else if (result.dismiss === "cancel") {
            Swal.fire(
                "Cancelled",
                "Permohonan batal dirubah :)",
                "error"
            )
        }
    });
}
</script>