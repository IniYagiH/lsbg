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
          <h2 class="d-flex align-items-center text-dark font-weight-bold my-1 mr-3">Sertifikasi</h2>
          <!--end::Page Title-->
          <!--begin::Breadcrumb-->
          <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
            <li class="breadcrumb-item text-muted">
              <a href="" class="text-muted">Pelaksana</a>
            </li>
            <li class="breadcrumb-item text-muted">
              <a href="" class="text-muted">Permohonan Masuk</a>
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
            <span class="d-block text-muted pt-2 font-size-sm">Daftar Keseluruhan Permohonan Masuk</span></h3>
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
                <th colspan="3">Data Badan Usaha</th>
                <th colspan="4">Permohonan</th>

                <th colspan="4">Status Permohonan</th>

              </tr>
              <tr>
                <th>Detail Data</th>
                <th>NIB</th>
                <th>GetBU</th>
                <th>IdIzin</th>
                <th>TglMasuk</th>
                <th>NamaBadanUsaha</th>
                <th>Klasifikasi</th>
                <th>Sub Klasifikasi</th>
                <th>Kualifikasi</th>
                <th>Tgl Permohonan</th>
                <th>Biaya</th>

                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php if(!empty($record)) :?>
              <?php foreach($record as $row) :?>
              <tr>
                <td></td>
                <td>
                  <?php if($row['tgl_permohonan']=='') :?>

                    <a id="<?=$row['NIB'];?>" name="<?=$row['id_izin'];?>" onclick="javascript:get_permohonan_detail(this)"></i><span class="text-danger"><?=$row['NIB'];?></a>
                  <?php else :?>
                    <?=$row['NIB'];?>
                  <?php endif ;?>
                </td>
                <td>
                  <?php if($row['tgl_permohonan']=='') :?>

                  <?php if($row['nama']=='') :?>

                    <a id="<?=$row['NIB'];?>" name="<?=$row['id_izin'];?>" onclick="javascript:get_permohonan_detail(this)" class="btn btn-icon btn-light-danger pulse pulse-primary mr-5">
                        <i class="flaticon-download"></i>
                        <span class="pulse-ring"></span>
                    </a>
                  <?php else :?>
                    <?php
                    $yesterday = new DateTime('yesterday');
                    $banding=$yesterday->format('Y-m-d');
                    $now=date('Y-m-d');
                     ;?>
                     <?php if($banding==$row['tgl_permohonan_banding'] OR $row['tgl_permohonan_banding']==$now) :?>
                    <a id="<?=$row['NIB'];?>" name="<?=$row['id_izin'];?>" onclick="javascript:get_permohonan_detail(this)" class="btn btn-icon btn-light-primary pulse pulse-primary mr-5">
                        <i class="flaticon-add-circular-button"></i>
                        <span class="pulse-ring"></span>
                    </a>
                  <?php else :?>
                    <a id="<?=$row['NIB'];?>" name="<?=$row['id_izin'];?>" onclick="javascript:get_permohonan_detail(this)" class="btn btn-icon btn-light-danger pulse pulse-primary mr-5">
                        <i class="flaticon-download"></i>
                        <span class="pulse-ring"></span>
                    </a>
                    <?php endif ;?>
                  <?php endif ;?>
                  <?php else :?>
                    <a id="<?=$row['NIB'];?>" name="<?=$row['id_izin'];?>" onclick="javascript:get_permohonan_detail(this)" class="btn btn-icon btn-light-success pulse pulse-primary mr-5">
                        <i class="flaticon2-checkmark"></i>
                        <span class="pulse-ring"></span>
                    </a>
                  <?php endif ;?>
                </td>
                <td><?=$row['id_izin'];?></td>
                <td><?=$row['tgl_create_izin'];?></td>
                <td>

                    <?=$row['nama'];?>

                </td>

                <td><?=$row['concat_klasifikasi'];?></td>
                <td><?=$row['concat_sub'];?></td>
                <td><?=$row['concat_kualifikasi'];?></td>
                <td><?=$row['tgl_permohonan'];?></td>

                <td>Rp, -</td>
                <td>


    							<a onclick="javascript:tolak(this)" name="<?= $row['NIB'] ;?>" id="<?= $row['tgl_permohonan'] ;?>" data-toggle="modal" data-target="#modal_tolak" class="btn btn-sm btn-clean btn-icon" title="Tolak Permohonan">
    								<i class="la la-trash"></i>
    							</a>
                </td>

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
        window.location.reload();
    }
    function get_permohonan_detail(sel) {
      Swal.fire({
            title: "Anda ingin get detail permohonan id izin "+sel.name+" ?",
            text: "Proses akan mengambil data detail permohonan badan usaha!",
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
                  url : "<?php echo base_url('sertifikasi/get_permohonan_detail'); ?>",
                  type : "POST",
                  data : {id_izin : sel.name},
                  success : function(data) {
                    response = jQuery.parseJSON(data);
                    console.log(response);

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
    				              title: "Data Izin Bermasalah atau Sudah pernah di get!",
    				              showConfirmButton: false,
    				              timer: 1500
    				          });
    								}
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
                    "List permohonan batal di get :)",
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
