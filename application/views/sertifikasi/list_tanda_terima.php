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
              <a href="" class="text-dark">List Rekomendasi LSBU</a>
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
            <h3 class="card-label">Permohonan Penerbitan Sertifikasi
            <span class="d-block text-muted pt-2 font-size-sm">Daftar Keseluruhan Permohonan Untuk Dilakukan Penerbitan Sertifikasi</span></h3>
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
                <th>Nama Badan Usaha</th>
                <th>NIB</th>
                <th>Klasifikasi</th>
                <th>Sub Klasifikasi</th>
                <th>Kualifikasi</th>
                <th>Tgl Permohonan</th>
                <th>Tgl_Status_31</th>

         
                <th>File Tinjauan Permohonan</th>
                <th>File Pembayaran</th>
                <th>File Perjanjian</th>
                <th>File Tim Pemutus</th>
                <th>Create QR Sertifikat</th>
                <th>File SBU</th>
                <th>File Surat Tugas</th>
                <th>File Surat Tugas Pemutus</th>
                <th>File Asesor 1</th>
                <th>File Asesor 2</th>
                <th>File Resume Penilaian</th>
                <th>File FTHEP</th>
                <th>File HEKT</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>

              <?php if(!empty($record)) :?>
              <?php foreach($record as $row) :?>
              <tr>
                <td></td>
                <td>
                  <?php if($row['qr']!='') :?>
                    <a href="" data-todo='{"id":"<?=$row['NIB'];?>","tgl_permohonan":"<?=$row['tgl_permohonan'];?>"}' data-toggle="modal" class="qr-code" data-target="#modal_qr"></i><span class="text-success"><?=$row['nama'];?></a>
                  <?php else :?>
                    <?=$row['nama'];?>
                  <?php endif ;?>
                </td>

                <td><?=$row['NIB'];?></td>
                <td><?=$row['concat_klasifikasi'];?></td>
                <td><?=$row['concat_sub'];?></td>
                <td><?=$row['concat_kualifikasi'];?></td>
                <td><?=$row['tgl_permohonan'];?></td>
                <td><?=$row['tgl_biaya'];?></td>

               
                <td><a href="<?=base_url("sertifikasi/cetak_verifikasi/".encrypt_url($row['NIB']).'/'.encrypt_url($row['tgl_permohonan'])) ;?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>
                <td><a href="<?= base_url('get_file/get_bu_49/'.$row['file_pembayaran']) ;?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>
                <td><a href="<?= base_url('get_file/get_bu_perjanjian/'.$row['file_perjanjian']) ;?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>
                <td>
                  <?php if($row['tgl_biaya']<='2025-09-19') :?>
                  <a href="<?=base_url('sertifikasi/hasil_tim_pemutus/'.encrypt_url($row['NIB']).'/'.encrypt_url($row['tgl_permohonan']));?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a>
                  <?php else :?>
                     <?php $data=$row['concat_sub'];
                  $array = explode(",", $data);
                  $array = array_map('trim', $array);
                   ;?>
                  <?php foreach($array as $row_sub) :?>
                 <a href="<?=base_url('sertifikasi/hasil_tim_pemutus_37/'.encrypt_url($row['NIB']).'/'.encrypt_url($row_sub).'/'.encrypt_url($row['asesor1']));?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i><?=$row_sub;?></a>
                <?php endforeach ;?>

                  <?php endif ;?>
                  </td>
                <td>
                  <?php if($row['qr']!='') :?>
                  <a id="<?=$row['NIB'];?>" name="<?=$row['tgl_permohonan'];?>" onclick="javascript:get_permohonan_detail(this)" class="btn btn-icon btn-light-success pulse pulse-primary mr-5">
                    <i class="flaticon2-correct"></i>
                    <span class="pulse-ring"></span>
                </a>
              <?php else :?>
                <a id="<?=$row['NIB'];?>" name="<?=$row['tgl_permohonan'];?>" onclick="javascript:get_permohonan_detail(this)" class="btn btn-icon btn-light-danger pulse pulse-primary mr-5">
                  <i class="fas fa-qrcode"></i>
                  <span class="pulse-ring"></span>
              </a>
              <?php endif;?>
              </td>
              <td>

              <a id="<?=$row['NIB'];?>" name="<?=$row['tgl_permohonan'];?>" onclick="javascript:get_file(this)" data-toggle="modal" data-target="#modal_file" class="btn btn-icon btn-light-info pulse pulse-info mr-5">
                <i class="far fa-file-pdf"></i>
                <span class="pulse-ring"></span>
            </a>

            </td>
              <td><a href="<?=base_url('sertifikasi/surat_tugas_cetak/'.encrypt_url($row['NIB']).'/'.encrypt_url($row['tgl_permohonan']));?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>
          
              <td><a href="<?=base_url('sertifikasi/surat_tugas_pemutus_cetak/'.encrypt_url($row['NIB']).'/'.encrypt_url($row['tgl_permohonan']));?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>

              <td>
                <?php if($row['tgl_biaya']<='2025-09-19') :?>
                <a href="<?=base_url('sertifikasi/cetak_asesor/'.encrypt_url($row['NIB']).'/'.encrypt_url($row['tgl_permohonan']).'/'.encrypt_url($row['asesor1']));?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a>
                <?php else :?>
                  <?php $data=$row['concat_sub'];
                  $array = explode(",", $data);
                  $array = array_map('trim', $array);
                   ;?>
                  <?php foreach($array as $row_sub) :?>
                 <a href="<?=base_url('sertifikasi/pelaporan_penilaian_lpjk/'.encrypt_url($row['NIB']).'/'.encrypt_url($row_sub).'/'.encrypt_url($row['asesor1']));?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i><?=$row_sub;?></a>
                <?php endforeach ;?>
                 <?php endif ;?>
              </td>
              <td>
                 <?php if($row['tgl_biaya']<='2025-09-19') :?>
                <a href="<?=base_url('sertifikasi/cetak_asesor/'.encrypt_url($row['NIB']).'/'.encrypt_url($row['tgl_permohonan']).'/'.encrypt_url($row['asesor1']));?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a>
                <?php else :?>
                  <?php $data=$row['concat_sub'];
                  $array = explode(",", $data);
                  $array = array_map('trim', $array);
                   ;?>
                  <?php foreach($array as $row_sub) :?>
                 <a href="<?=base_url('sertifikasi/pelaporan_penilaian_lpjk/'.encrypt_url($row['NIB']).'/'.encrypt_url($row_sub).'/'.encrypt_url($row['asesor1']));?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i><?=$row_sub;?></a>
                <?php endforeach ;?>
                 <?php endif ;?>
            </td>
              <td><a href="<?=base_url('sertifikasi/berita_acara/'.encrypt_url($row['NIB']).'/'.encrypt_url($row['tgl_permohonan']));?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>
              
              <td>
                     <?php if($row['tgl_biaya']<='2025-09-19') :?>

                <?php else :?>
                  <?php $data=$row['concat_sub'];
                  $array = explode(",", $data);
                  $array = array_map('trim', $array);
                   ;?>
                  <?php foreach($array as $row_sub) :?>
                 <a href="<?=base_url('sertifikasi/fthep_cetak_lpjk/'.encrypt_url($row['NIB']).'/'.encrypt_url($row_sub).'/'.encrypt_url($row['asesor1']));?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i><?=$row_sub;?></a>
                <?php endforeach ;?>
                 <?php endif ;?>
              </td>
                <td>
                     <?php if($row['tgl_biaya']<='2025-09-19') :?>

                <?php else :?>
                  <?php $data=$row['concat_sub'];
                  $array = explode(",", $data);
                  $array = array_map('trim', $array);
                   ;?>
                  <?php foreach($array as $row_sub) :?>
                 <a href="<?=base_url('sertifikasi/hekt_cetak_lpjk/'.encrypt_url($row['NIB']).'/'.encrypt_url($row_sub).'/'.encrypt_url($row['asesor1']));?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i><?=$row_sub;?></a>
                <?php endforeach ;?>
                 <?php endif ;?>
              </td>



                <td>
                  <div class="dropdown dropdown-inline">
                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">
                                      <i class="la la-cog"></i>
                                  </a>
                      <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                      <ul class="nav nav-hoverable flex-column">
                      <li class="nav-item"><a class="nav-link" target="_blank" href="<?= base_url("sertifikasi/tinjauan_permohonan/".encrypt_url($row['NIB']).'/'.encrypt_url($row['tgl_permohonan'])) ;?>"><i class="nav-icon la la-chalkboard-teacher"></i><span class="nav-text">Tinjau Permohonan</span></a></li>

                        <?php if($row['qr']!='') :?>
                          <?php if($this->session->userdata('id_user')=='adminx' OR $this->session->userdata('id_user')=='admin_pusat3' OR $this->session->userdata('id_user')=="admin_rekomendasi" OR $this->session->userdata('id_user')=='admin_pusat10') :?>
                           <li class="nav-item"><a class="nav-link"  target="_blank" href="<?= base_url("sertifikasi/cetak_rekomendasi/".encrypt_url($row['NIB']).'/'.encrypt_url($row['tgl_permohonan'])) ;?>"><i class="nav-icon la la-chalkboard-teacher" ></i><span class="nav-text">Cetak Rekomendasi ke LPJK</span></a></li>
                         <?php endif ;?>
                      <?php else :?>
                        <li class="nav-item"><a class="nav-link"  ><span class="nav-text">QRCODE harus di create!</span></a></li>
                      <?php endif ;?>
                      <li class="nav-item"><a class="nav-link" id="<?=$row['NIB'];?>" name="<?=$row['tgl_permohonan'];?>"  onclick="javascript:get_kembalikan(this)"><span class="nav-text">Kembalikan Ke Penetapan Pemutus!</span></a></li>

                    </ul>
                      </div>
                  </div>



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
<div class="modal fade" id="modal_tolak" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeLg" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">


			<div class="modal-body" >
        <div class="card card-custom gutter-b">
					<div class="card-header">
						<div class="card-title">
							<span class="card-icon">
								<i class="flaticon-file-1 text-primary"></i>
							</span>
							<h3 class="card-label"><span class="text-danger">Tolak Permohonan</span></h3>
						</div>
					</div>
					<?php echo form_open_multipart('sertifikasi/tolak_permohonan/', 'class="form-horizontal form-validate-jquery" id="form-upload-1"');?>

          <hr>
        <div class="form-group row">
          <div class="col-lg-6">
              <label class="control-label">NIB <span class="text-danger"></span></label>
              <input type="text" id="nib_tolak" name="nib"readonly class="form-control" >
          </div>
          <div class="col-lg-6">
              <label class="control-label">Tgl Permohonan <span class="text-danger"></span></label>
              <input type="text"  id="tgl_permohonan_tolak" name="tgl_permohonan"readonly class="form-control">

            </div>
        </div>
        <div class="form-group row">
          <div class="col-lg-12">
              <label class="control-label">Alasan Penolakan <span class="text-danger"></span></label>
              <div class="input-group file-caption-main">
                <span class="file-caption-icon"></span>
                  <textarea id="comment_tolak" name="comment_penolakan"   class="form-control form-control-solid" rows="5"><?php if(!empty($ceklis)){echo $data_comment80;}?> </textarea>


              </div>
                   </div>

        </div>
        <div class="form-group row">

          <div class="col-lg-12">
            <label class="control-label">Bukti Penolakan <span class="text-danger"></span></label>
            <input class="file-tolak" id="file_tolak" name="file_tolak" type="file" required="required" data-preview-file-type="text">
            <span class="help-block">
              Accepted formats: pdf, zip. Max file size 20Mb
            </span>
            <div class="progress" style="display:none;">
              <div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                20%
              </div>
            </div>
          </div>

        </div>

        </div>

      </div>
      <div class="modal-footer">
        <button type="submit" id="submit" class="btn btn-primary mr-2">Submit</button>

        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
      </div>
        	<?php echo form_close() ;?>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_qr" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeLg" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">

			<div class="modal-body" >
        <div class="example example-basic">
          <div class="example-preview">
            <!--begin::Timeline-->

            <div class="timeline timeline-3">
              <div class="timeline-items" id='qr_code'>






              </div>
            </div>
            <!--end::Timeline-->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal_file" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeLg" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">

			<div class="modal-body" >
        <div class="card-body" id="file_sbu">

        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
function get_file(sel) {
$('#file_sbu').html('');

  $.ajax({
      url : "<?php echo base_url('sertifikasi/get_file_sbu'); ?>",
      type : "POST",
      data : {nib : sel.id,
              tgl_permohonan : sel.name},
      success : function(data) {
        response = jQuery.parseJSON(data);
        console.log(response);
        var counter=0;

        response.forEach(function(index,elem,arr){
          id_izin=arr[counter].id_izin;
          sub_klas=arr[counter].sub_klas;
          file_ds=arr[counter].responses;
          file_ds_final=file_ds.responReceiveGetFileDS;
          file_ds_final2=file_ds_final.data;
          var html='';
          for (var i = 0; i < file_ds_final2.length; i++) {
            data_ds=file_ds_final2[i];
            coun=i+1;
            link="https://sertifikasi.lsbugapeknas.com/sertifikasi/download_sbu/";
            html+='<div class="col-md-4 col-xxl-3 bg-white rounded-left shadow-sm"><div class="pt-25 pb-25 pb-md-10 px-4"><h4 class="mb-15">'+id_izin+'-'+sub_klas+'</h4><span class="px-7 py-3 font-size-h1 font-weight-bold d-inline-flex flex-center bg-primary-o-10 rounded-lg mb-15"> FILE SBU #'+coun+'</span><br /><a type="button" href="'+link+data_ds+'" target="_blank" class="btn btn-primary text-uppercase font-weight-bolder px-15 py-3">Download</a></div></div>';

          }

          document.getElementById('file_sbu').innerHTML +='<div class="row justify-content-center text-center my-0 my-md-25">'+html+'</div>';
          counter+=1;
        });
        },
        error: function(xhr, status, error) {
          var err = eval("(" + xhr.responseText + ")");
          alert(err.Message);
        }
    });
}
    function get_kembalikan(sel) {
      Swal.fire({
            title: "Anda ingin mengembalikan ke pemutus untuk NIB :"+sel.id+" & tgl permohonan : "+sel.name+"?",
            text: "Proses akan mengembalikan ke penetapan pemutus!",
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
                  url : "<?php echo base_url('sertifikasi/kembalikan_pemutus'); ?>",
                  type : "POST",
                  data : {nib : sel.id,
                          tgl_permohonan : sel.name},
                  success : function(data) {
                    response = jQuery.parseJSON(data);
                    console.log(response);

                    if(response.result==1){
                      Swal.fire({

                          icon: "success",
                          title: "Pengembalian berhasil !",
                          showConfirmButton: false,
                          timer: 1500
                      });
                    }
                    else{
                      Swal.fire({

                          icon: "error",
                          title: "Pengembalian gagal !",
                          showConfirmButton: false,
                          timer: 1500
                      });
                    }
                    window.location.reload();
                    },
                    error: function(xhr, status, error) {
                      var err = eval("(" + xhr.responseText + ")");
                      alert(err.Message);
                    }
                });


            } else if (result.dismiss === "cancel") {
                Swal.fire(
                    "Cancelled",
                    "Pengembalian dibatalkan ! :)",
                    "error"
                )
            }
        });
    }

    function get_permohonan_detail(sel) {
      Swal.fire({
            title: "Anda ingin generate QR CODE untuk NIB :"+sel.id+" & tgl permohonan : "+sel.name+"?",
            text: "Proses akan men-generate QR CODE untuk sertifikat badan usaha. Proses ini juga akan menampilkan QR CODE yg sudah ter-generate untuk LSBU scan !",
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
                  url : "<?php echo base_url('sertifikasi/create_qr'); ?>",
                  type : "POST",
                  data : {nib : sel.id,
                          tgl_permohonan : sel.name},
                  success : function(data) {
                    response = jQuery.parseJSON(data);
                    console.log(response);

                    if(response.result==1){
                      Swal.fire({

                          icon: "success",
                          title: "Create QR CODE berhasil !",
                          showConfirmButton: false,
                          timer: 1500
                      });
                    } else if(response.result==3){
                      Swal.fire({

                          icon: "error",
                          title: "Belum 4 jam sejak verifikasi pembayaran !",
                          showConfirmButton: false,
                          timer: 3000
                      });
                    }
                    else{
                      Swal.fire({

                          icon: "error",
                          title: "Create QR CODE gagal !",
                          showConfirmButton: false,
                          timer: 1500
                      });
                    }
                    window.location.reload();
                    },
                    error: function(xhr, status, error) {
                      var err = eval("(" + xhr.responseText + ")");
                      alert(err.Message);
                    }
                });


            } else if (result.dismiss === "cancel") {
                Swal.fire(
                    "Cancelled",
                    "Create QR CODE dibatalkan ! :)",
                    "error"
                )
            }
        });
    }
function turun_status(sel) {
  Swal.fire({
        title: "Apa anda yakin akan menurunkan status?",
        text: "Setelah diturunkan permohonan akan dilakukan penilaian kelayakan kembali!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "YA, Turunkan Status!",
        cancelButtonText: "No, Batalkan!",
        reverseButtons: true
    }).then(function(result) {
        if (result.value) {
          $.ajax({
              url : "<?php echo base_url('sertifikasi/turun_status_tanda_terima'); ?>",
              type : "POST",
              data : {nib : sel.name,
              tgl_permohonan : sel.id},
              success : function(data) {
                response = jQuery.parseJSON(data);

                },
                error: function(xhr, status, error) {
                  var err = eval("(" + xhr.responseText + ")");
                  alert(err.Message);
                }
            });
          Swal.fire({

              icon: "success",
              title: "Data berhasil diturunkan",
              showConfirmButton: false,
              timer: 1500
          });
          //window.setInterval('refresh()', 1500);
            // result.dismiss can be "cancel", "overlay",
            // "close", and "timer"
        } else if (result.dismiss === "cancel") {
            Swal.fire(
                "Cancelled",
                "Data batal diturunkan :)",
                "error"
            )
        }
    });
}


function tolak(sel) {
  $("#nib_tolak").val(sel.name);
  $("#tgl_permohonan_tolak").val(sel.id);
}


$(".qr-code").click(function(){
  var nib_value=$(this).data('todo').id;
  var tgl_permohonan_value=$(this).data('todo').tgl_permohonan;
  console.log(nib_value);
  console.log(tgl_permohonan_value);
  $('#qr_code').html('');


  jQuery.ajax({
    url : "<?= base_url('sertifikasi/get_qr')?>",
    type : "POST",
    data : {nib:nib_value,
      tgl_permohonan:tgl_permohonan_value},
      success : function(data) {
      response = jQuery.parseJSON(data);
      record=response.record;
      console.log(record);
      var counter=0;
      record.forEach(function(index,elem,arr){
        var qr='data:image/png;base64,'+arr[counter].qr;
        if(arr[counter].pemenuhan_peralatan=='1'){
          var peralatan = '<span class="text-success">TERPENUHI';
        }else{
          var peralatan = '<span class="text-danger">BELUM TERPENUHI';
        }

        if(arr[counter].pemenuhan_penjualan_tahunan=='1'){
          var penjualan_tahunan = '<span class="text-success">TERPENUHI';
        }else{
          var penjualan_tahunan = '<span class="text-danger">BELUM TERPENUHI';
        }
        if(arr[counter].pemenuhan_smm=='1'){
          var smm = '<span class="text-success">TERPENUHI';
        }else{
          var smm = '<span class="text-danger">BELUM TERPENUHI';
        }
        if(arr[counter].pemenuhan_smap=='1'){
          var smap = '<span class="text-success">TERPENUHI';
        }else{
          var smap = '<span class="text-danger">BELUM TERPENUHI';
        }
        if(arr[counter].aset=='1'){
          var asesor_aset = '<span class="text-info">SESUAI';
        }else{
          var asesor_aset = '<span class="text-danger">TIDAK SESUAI';
        }
        if(arr[counter].peralatan=='1'){
          var asesor_peralatan = '<span class="text-info">SESUAI';
        }else{
          var asesor_peraltan = '<span class="text-danger">TIDAK SESUAI';
        }
        if(arr[counter].tk=='1'){
          var asesor_tk = '<span class="text-info">SESUAI';
        }else{
          var asesor_tk = '<span class="text-danger">TIDAK SESUAI';
        }
        if(arr[counter].penjualan_tahunan=='1'){
          var asesor_penjualan_tahunan = '<span class="text-info">SESUAI';
        }else{
          var asesor_penjualan_tahunan = '<span class="text-danger">TIDAK SESUAI';
        }
        if(arr[counter].smm=='1'){
          var asesor_smm = '<span class="text-info">SESUAI';
        }else{
          var asesor_smm = '<span class="text-danger">TIDAK SESUAI';
        }
        if(arr[counter].smap=='1'){
          var asesor_smap = '<span class="text-info">SESUAI';
        }else{
          var asesor_smap = '<span class="text-danger">TIDAK SESUAI';
        }

        document.getElementById('qr_code').innerHTML += '<hr><div class="card card-custom gutter-b"><div class="card-body p-15 pb-20"><div class="row mb-17"><div class="col-md-5"><!--begin::Image--><div class="card card-custom card-stretch"><div class="card-body p-0 rounded px-5 py-15 d-flex align-items-center justify-content-center" style="background-color: #C70039;"><img src="'+qr+'" class="mw-200 w-300px" /></div></div></div><div class="col-md-7"><h2 class="font-weight-bolder text-dark mb-7" style="font-size: 20px;">'+arr[counter].nama_bu+'<br> [ '+arr[counter].id_izin+' ] '+'</h2><div class="font-size-h4 mb-7 text-dark-50">'+arr[counter].alamat_bu+'</div><div class="row mb-12"><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Jenis Usaha</span><span class="text-muted font-weight-bolder font-size-lg">'+arr[counter].nama_jenis_usaha+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Klasifikasi Jenis Usaha</span><span class="text-muted font-weight-bolder font-size-lg">'+arr[counter].nama_klasifikasi_jenis_usaha+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Sifat Usaha</span><span class="text-muted font-weight-bolder font-size-lg">'+arr[counter].nama_sifat+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">KBLI</span><span class="text-muted font-weight-bolder font-size-lg">'+arr[counter].nomor_kbli+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Sub Klasifikasi</span><span class="text-muted font-weight-bolder font-size-lg">'+arr[counter].id_sub_klasifikasi+' - '+arr[counter].deskripsi_subklasifikasi+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Kualifikasi</span><span class="text-muted font-weight-bolder font-size-lg">'+arr[counter].kualifikasi+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Pemenuhan Peralatan</span><span class="text-muted font-weight-bolder font-size-lg">'+peralatan+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Pemenuhan Penjualan Tahunan</span><span class="text-muted font-weight-bolder font-size-lg">'+penjualan_tahunan+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Pemenuhan SMM</span><span class="text-muted font-weight-bolder font-size-lg">'+smm+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Pemenuhan SMAP</span><span class="text-muted font-weight-bolder font-size-lg">'+smap+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Hasil Penilaian Keuangan</span><span class="text-muted font-weight-bolder font-size-lg">'+asesor_aset+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Hasil Penilaian Peralatan</span><span class="text-muted font-weight-bolder font-size-lg">'+asesor_peralatan+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Hasil Penilaian Pejualan Tahunan</span><span class="text-muted font-weight-bolder font-size-lg">'+asesor_penjualan_tahunan+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Hasil Penilaian SMM</span><span class="text-muted font-weight-bolder font-size-lg">'+asesor_smm+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Hasil Penilaian SMAP</span><span class="text-muted font-weight-bolder font-size-lg">'+asesor_smap+'</span></div></div></div></div></div></div></div><hr>';

        counter+=1;
      });
    },
    error: function(xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
      alert(err.Message);
    }
  });
});

        var counterx=0;
      function submit(){
      toastr["info"]("Mohon Tunggu...", "Notification");


      var tgl_permohonan_value2= 'tgl';


                jQuery.ajax({
        url : "<?= base_url('ajax/search_permohonan_bu')?>",
        type : "POST",
        data : {tgl_permohonan:tgl_permohonan_value2},
          success : function(data) {
          response = jQuery.parseJSON(data);
          var table = $('#kt_datatable').DataTable();
          table.clear().draw();
          counterx=0;


          var array=response.record;
          var count=1;
          toastr["success"]("Data didapat", "Notification");

          array.forEach(function(element) {



            table.row.add( [
              element.ID_BU,
              element.id_klasifikasi_kbli,
              element.id_sub_klasifikasi_kbli,
              element.ID_Asosiasi_BU,
              element.kualifikasi_kbli,
              element.User_name,
              element.Tgl_proses,
              element.tgl_permohonan,
              element.Propinsi,
              element.Tahun
              ] )
              .draw();
              count+=1;

          });


        },
        error: function(xhr, status, error) {
          var err = eval("(" + xhr.responseText + ")");
          alert(err.Message);
        }
      });



      }

</script>
<script type="text/javascript">
	$(".file-tolak").fileinput({
    maxFileSize: 20000,
    allowedFileExtensions: ['jpg', 'png', 'pdf'],
    showUpload: false,
    dropZoneEnabled: false
	});


  	var submitCounter = 0;
  	$(function () {
  		var uploadURI = $('#form-upload-1').attr('action');
  		var progressBar = $('#progress-bar-1');

  		$("form#form-upload-1").submit(function () {

  			event.preventDefault();




  											// make sure there is file to upload
  											if (submitCounter < 2) {
  												submitCounter++;
  													// provide the form data
  													// that would be sent to sever through ajax
  													var formData = new FormData($(this)[0]);
  													// now upload the file using $.ajax
  													$.ajax({
  														url: uploadURI,
  														type: 'post',
  														data: formData,
  														processData: false,
  														contentType: false,
  														success: function (data) {
  															if (data.result == '1') {
  																window.location.replace("<?php echo base_url('sertifikasi/list_verifikasi');?>");
  															}
  															else {
  																window.location.replace("<?php echo base_url('sertifikasi/list_verifikasi');?>");

  															}
  														},
  														xhr: function () {
  															var xhr = new XMLHttpRequest();
  															xhr.upload.addEventListener("progress", function (event) {
  																if (event.lengthComputable) {
  																	var percentComplete = Math.round((event.loaded / event.total) * 100);
  																					// console.log(percentComplete);

  																					$('.progress').show();
  																					if(percentComplete >= 97)
  																					{
  																						progressBar.text('- Harap Tunggu -');
  																					}
  																					else {
  																						progressBar.text(percentComplete + '%');
  																					}
  																					progressBar.css({width: percentComplete + "%"});
  																			}
  																			;
  																	}, false);
  															return xhr;
  														}
  													});
  											}else{
  												toastr["warning"]("This is can be clicked only once.", "Notification");


  										}




  								});
  		$('body').on('change.bs.fileinput', function (e) {
  			$('.progress').hide();
  			progressBar.text("0%");
  			progressBar.css({width: "0%"});
  		});
  	});
</script>
