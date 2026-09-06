<link href="<?=base_url('assets/fileinput/css/fileinput.css') ;?>" media="all" rel="stylesheet" type="text/css"/>
<link href="<?=base_url('assets/fileinput/themes/explorer-fas/theme.css') ;?>" media="all" rel="stylesheet" type="text/css"/>
<link href="<?=base_url('assets/plugins/custom/datatables/datatables.bundle.css') ;?>" rel="stylesheet" type="text/css" />

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
              <a href="" class="text-dark">Pelaksana</a>
            </li>
            <li class="breadcrumb-item text-muted">
              <a href="" class="text-dark">List Perbaikan KBLI</a>
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
            <h3 class="card-label">Permohonan Masuk
            <span class="d-block text-muted pt-2 font-size-sm">Daftar Keseluruhan Perbaikan KBLI</span></h3>
          </div>
          <div class="card-toolbar">

						<!--end::Button-->
					</div>
        </div>

        <div class="card-body">

          <!--begin: Datatable-->
          <table class="table table-bordered table-hover table-checkable mt-10" id="kt_datatable2">
            <thead>
              <tr>
                <th colspan="3">Data Kbli</th>


              </tr>
              <tr>
                <th>Detail Data</th>
                <th>IdIzin</th>
                <th>Proses</th>
                <th>KBLI</th>
                <th>KBLI Perbaikan</th>
                <th>Tgl Masuk</th>
                <th>Tgl Update</th>

              </tr>
            </thead>
            <tbody>
              <?php $count=0 ;?>
              <?php if(!empty($record)) :?>
              <?php foreach($record as $row) :?>
                <?php $count+=1 ;?>
              <tr>
                <td><span class="label label-rounded label-primary mr-2"><?=$count ;?></span></td>
                <td>

                    <?=$row['id_izin'];?>

                </td>
                <td>

                    <a name="<?=$row['id_izin'];?>" onclick="javascript:get_permohonan_detail(this)" class="btn btn-icon btn-light-danger pulse pulse-primary mr-5">
                        <i class="flaticon2-paper-plane"></i>
                        <span class="pulse-ring"></span>
                    </a>

                </td>
                <td><?=$row['kbli'];?></td>
                <td><?=$row['kbli_perbaikan'];?></td>
                <td><?=$row['create_at'];?></td>
                <td><?=$row['update_at'];?></td>


              </tr>
            <?php endforeach ;?>
          <?php endif ;?>



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
<script>

function refresh() {
        window .location.reload();
    }
    function get_permohonan_detail(sel) {
      Swal.fire({
            title: "Anda memperbaiki KBLI dengan id izin "+sel.name+" ?",
            text: "Proses akan mengubah kbli dan pemohon bisa mencetak kembali sertifikat di oss dengan KBLI yang benar!",
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
                  url : "<?php echo base_url('sertifikasi/perbaikan_kbli'); ?>",
                  type : "POST",
                  data : {id_izin : sel.name},
                  success : function(data) {
                    response = jQuery.parseJSON(data);
                    console.log(response);

                    if(response.result==1){
    									Swal.fire({

    				              icon: "success",
    				              title: "Perbaikan kbli berhasil",
    				              showConfirmButton: false,
    				              timer: 1500
    				          });
    								}else{
    									Swal.fire({

    				              icon: "error",
    				              title: "Perbaikan kbli gagal!",
    				              showConfirmButton: false,
    				              timer: 1500
    				          });
    								}
                    window.setInterval('refresh()', 1500);
                    },
                    error: function(xhr, status, error) {
                      var err = eval("(" + xhr.responseText + ")");
                      alert(err.Message);
                    }
                });


            } else if (result.dismiss === "cancel") {
                Swal.fire(
                    "Cancelled",
                    "Perbaikan kbli gagal :)",
                    "error"
                )
            }
        });
    }
function get_permohonan(sel) {
  Swal.fire({
        title: "Anda ingin get list permohonan?",
        text: "Proses akan mengupdate list permohonan yang masuk!",
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
              url : "<?php echo base_url('sertifikasi/get_permohonan'); ?>",
              type : "POST",
              data : {nib : 'aa'},
              success : function(data) {
                response = jQuery.parseJSON(data);
								if(response.result==1){
									Swal.fire({

				              icon: "success",
				              title: "Get list permohonan berhasil",
				              showConfirmButton: false,
				              timer: 1500
				          });
								}else{
									Swal.fire({

				              icon: "error",
				              title: "Data tidak ditemukan!",
				              showConfirmButton: false,
				              timer: 1500
				          });
								}

			          window.setInterval('refresh()', 1500);
                },
                error: function(xhr, status, error) {
                  var err = eval("(" + xhr.responseText + ")");
                  alert(err.Message);
                }
            });

            // result.dismiss can be "cancel", "overlay",
            // "close", and "timer"
        } else if (result.dismiss === "cancel") {
            Swal.fire(
                "Cancelled",
                "List permohonan batal di get :)",
                "error"
            )
        }
    });
}
</script>
