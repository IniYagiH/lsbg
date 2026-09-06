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
      <div class="d-flex align-items-center flex-wrap mr-1">
        <!--begin::Heading-->
        <div class="d-flex flex-column">
          <!--begin::Title-->
          <h2 class="text-white font-weight-bold my-2 mr-5">Permohonan Masuk</h2>
          <!--end::Title-->
          <!--begin::Breadcrumb-->
          <div class="d-flex align-items-center font-weight-bold my-2">
            <!--begin::Item-->
            <a href="#" class="opacity-75 hover-opacity-100">
              <i class="flaticon2-shelter text-white icon-1x"></i>
            </a>
            <!--end::Item-->
            <!--begin::Item-->
            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
            <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Badan Usaha</a>
            <!--end::Item-->
            <!--begin::Item-->
            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
            <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Permohonan Masuk</a>
            <!--end::Item-->
            <!--begin::Item-->

          </div>
          <!--end::Breadcrumb-->
        </div>
        <!--end::Heading-->
      </div>
      <!--end::Info-->
      <!--begin::Toolbar-->

      <!--end::Toolbar-->
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
            <h3 class="card-label">Permohonan Validasi
            <span class="d-block text-muted pt-2 font-size-sm">Daftar Keseluruhan Permohonan Untuk Dilakukan Validasi</span></h3>
          </div>

        </div>
        <div class="card-body">
          <div class="mb-7">
            <div class="row align-items-center">
              <div class="col-lg-9 col-xl-8">
                <div class="row align-items-center">
                  <div class="col-md-4 my-2 my-md-0">
                    <div class="input-icon">
                      <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
                      <span>
                        <i class="flaticon2-search-1 text-muted"></i>
                      </span>
                    </div>
                  </div>
                  <div class="col-md-4 my-2 my-md-0">
                    <div class="d-flex align-items-center">
                      <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                      <select class="form-control" id="kt_datatable_search_status">
                        <option value="">All</option>
                        <option value="1">Pending</option>
                        <option value="2">Delivered</option>
                        <option value="3">Canceled</option>
                        <option value="4">Success</option>
                        <option value="5">Info</option>
                        <option value="6">Danger</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4 my-2 my-md-0">
                    <div class="d-flex align-items-center">
                      <label class="mr-3 mb-0 d-none d-md-block">Type:</label>
                      <select class="form-control" id="kt_datatable_search_type">
                        <option value="">All</option>
                        <option value="1">Online</option>
                        <option value="2">Retail</option>
                        <option value="3">Direct</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                <button onclick="javascript:submit()" class="btn btn-light-primary px-6 font-weight-bold">Search</button>
              </div>
            </div>
          </div>
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
                <th>Status99</th>
                <th> Status0 </th>
                <th>Biaya</th>

                <th>File Verifikasi</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>

              <?php if(!empty($record)) :?>
              <?php foreach($record as $row) :?>
              <tr>
                <td></td>
                <td>
                  <?php if($row['stat']=='1') :?>
                    <a href="" data-todo='{"id":<?=$row['NIB'];?>,"tgl_permohonan":"<?=$row['tgl_permohonan'];?>"}' data-toggle="modal" class="open-revisi" data-target="#modal_revisi"></i><span class="text-danger"><?=$row['nama'];?></a>
                  <?php elseif($row['stat']=='2') :?>
                    <a href="" data-todo='{"id":<?=$row['NIB'];?>,"tgl_permohonan":"<?=$row['tgl_permohonan'];?>"}' data-toggle="modal" class="open-revisi" data-target="#modal_revisi"></i><span class="text-success"><?=$row['nama'];?></a>
                  <?php else :?>
                    <?=$row['nama'];?>
                  <?php endif ;?>
                </td>
                <td><?=$row['NIB'];?></td>
                <td><?=$row['concat_klasifikasi'];?></td>
                <td><?=$row['concat_sub'];?></td>
                <td><?=$row['concat_kualifikasi'];?></td>
                <td><?=$row['tgl_permohonan'];?></td>
                <td><?=$row['status_0'];?></td>
                <td><?=$row['status_1'];?></td>

                <td>Rp, <?= number_format(($row['biaya_lsbu']*1000), 2, '.', ',');?></td>
                <td><a href="<?=base_url("sertifikasi/cetak_verifikasi/".encrypt_url($row['NIB']).'/'.encrypt_url($row['tgl_permohonan'])) ;?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>

                <td>
                  <div class="dropdown dropdown-inline">
                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">
                                      <i class="la la-cog"></i>
                                  </a>
                      <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                      <ul class="nav nav-hoverable flex-column">
                        <li class="nav-item"><a class="nav-link" target="_blank" href="<?= base_url("sertifikasi/validasi/".encrypt_url($row['NIB']).'/'.encrypt_url($row['tgl_permohonan'])) ;?>"><i class="nav-icon la la-chalkboard-teacher"></i><span class="nav-text">Tinjau Permohonan</span></a></li>
                        <li class="nav-item"><a class="nav-link" target="_blank"href="<?= base_url("sertifikasi/get_invoice/".encrypt_url($row['NIB']).'/'.encrypt_url($row['tgl_permohonan'])) ;?>"><i class="nav-icon la la-leaf"></i><span class="nav-text">Lihat Invoice</span></a></li>
                    </ul>
                      </div>
                  </div>
                  <a onclick="javascript:turun_status(this)" name="<?= $row['NIB'] ;?>" id="<?= $row['tgl_permohonan'] ;?>"  class="btn btn-sm btn-clean btn-icon" title="Turun Status">
    								<i class="la la-arrow-circle-down"></i>
    							</a>
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
<div class="modal fade" id="modal_revisi" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeLg" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">

			<div class="modal-body" >
        <div class="example example-basic">
          <div class="example-preview">
            <!--begin::Timeline-->
            <div class="timeline timeline-3">
              <div class="timeline-items" id='timeline'>




              </div>
            </div>
            <!--end::Timeline-->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
function refresh() {
        window .location.reload();
    }
function turun_status(sel) {
  Swal.fire({
        title: "Apa anda yakin akan menurunkan status?",
        text: "Setelah diturunkan permohonan akan dilakukan verifikasi ulang!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "YA, Turunkan Status!",
        cancelButtonText: "No, Batalkan!",
        reverseButtons: true
    }).then(function(result) {
        if (result.value) {
          $.ajax({
              url : "<?php echo base_url('sertifikasi/turun_status_validasi'); ?>",
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
          window.setInterval('refresh()', 1500);
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
$(function(){
  $(".open-revisi").click(function(){
    var nib_value=$(this).data('todo').id;
    var tgl_permohonan_value=$(this).data('todo').tgl_permohonan;
    $('#timeline').html('');
    jQuery.ajax({
      url : "<?= base_url('sertifikasi/get_revisi_data')?>",
      type : "POST",
      data : {nib:nib_value,
        tgl_permohonan:tgl_permohonan_value},
        success : function(data) {
        response = jQuery.parseJSON(data);
        record=response.record;
        var counter=0;
        record.forEach(function(index,elem,arr){
          if(arr[counter].status=='1'){
            document.getElementById('timeline').innerHTML += '<div class="timeline-item"><div class="timeline-media"><i class="flaticon2-notification fl text-primary"></i></div><div class="timeline-content"><div class="d-flex align-items-center justify-content-between mb-3"><div class="mr-2"><a  class="text-dark-75 text-hover-primary font-weight-bold">'+arr[counter].upload_deskripsi+'</a><span class="text-muted ml-2">'+arr[counter].tgl_record+'</span><span class="label label-light-primary font-weight-bolder label-inline ml-2">Sudah Diperbaiki</span></div></div><p class="p-0">'+arr[counter].ket+'</p></div></div>';

          }else{
            document.getElementById('timeline').innerHTML += '<div class="timeline-item"><div class="timeline-media"><i class="flaticon2-notification fl text-primary"></i></div><div class="timeline-content"><div class="d-flex align-items-center justify-content-between mb-3"><div class="mr-2"><a  class="text-dark-75 text-hover-primary font-weight-bold">'+arr[counter].upload_deskripsi+'</a><span class="text-muted ml-2">'+arr[counter].tgl_record+'</span><span class="label label-light-danger font-weight-bolder label-inline ml-2">Belum Diperbaiki</span></div></div><p class="p-0">'+arr[counter].ket+'</p></div></div>';

          }
          counter+=1;
        });
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
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
  																window.location.replace("<?php echo base_url('sertifikasi/list_validasi');?>");
  															}
  															else {
  																window.location.replace("<?php echo base_url('sertifikasi/list_validasi');?>");

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
