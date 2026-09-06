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
              <a href="" class="text-dark">List Penolakan Berkas</a>
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
            <h3 class="card-label">Tolak Permohonan
            <span class="d-block text-muted pt-2 font-size-sm">Daftar Keseluruhan Permohonan Yang Bisa Ditolak</span></h3>
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


              </tr>
              <tr>

                <th>NIB</th>
                <th>Cabut Permohonan</th>
                <th>IdIzin</th>
                <th>NamaBadanUsaha</th>
                <th>Sub Klasifikasi</th>
                <th>Tgl Permohonan</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if(!empty($record)) :?>
              <?php foreach($record as $row) :?>
              <tr>
                <td>

                    <?=$row['NIB'];?>

                </td>
                <td>

                    <a id="<?=$row['NIB'];?>" name="<?=$row['id_izin'];?>" target="<?=$row['tgl_permohonan'];?>" onclick="javascript:tolak_permohonan(this)" data-toggle="modal" data-target="#modal_tolak" class="btn btn-icon btn-light-danger pulse pulse-danger mr-5">
                        <i class="flaticon2-trash"></i>
                        <span class="pulse-ring"></span>
                    </a>

                </td>
                <td><?=$row['id_izin'];?></td>
                <td>

                    <?=$row['nama'];?>

                </td>

                <td><?=$row['id_sub_klasifikasi'];?></td>
                <td><?=$row['tgl_permohonan'];?></td>
                <td>
                  <div class="dropdown dropdown-inline">
    								<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">
    	                                <i class="la la-cog"></i>
    	                            </a>
    							  	<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
    									<ul class="nav nav-hoverable flex-column">
                        <li class="nav-item"><a class="nav-link" target="_blank" href="<?= base_url("sertifikasi/tinjauan_permohonan_izin/".encrypt_url($row['NIB']).'/'.encrypt_url($row['tgl_permohonan']).'/'.$row['id_izin']) ;?>"><i class="nav-icon la la-chalkboard-teacher"></i><span class="nav-text">Tinjau Permohonan</span></a></li>

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
							<h3 class="card-label"><span class="text-danger">Cabut SBU</span></h3>
						</div>
					</div>
					<?php echo form_open_multipart('sertifikasi/post_status_cabut/', 'class="form-horizontal form-validate-jquery" id="form-upload-1"');?>

          <hr>
        <div class="form-group row">
          <div class="col-lg-6">
              <label class="control-label">NIB <span class="text-danger"></span></label>
              <input type="text" id="nib_tolak" name="nib" readonly class="form-control" >
          </div>
          <div class="col-lg-6">
              <label class="control-label">Tgl Permohonan <span class="text-danger"></span></label>
              <input type="text"  id="tgl_permohonan_tolak" name="tgl_permohonan" readonly class="form-control">

            </div>
        </div>
        <div class="form-group row">
          <div class="col-lg-12">
              <label class="control-label">ID Izin <span class="text-danger"></span></label>
              <input type="text" id="id_izin_tolak" name="id_izin" readonly class="form-control" >
          </div>

        </div>
        <div class="form-group row">
          <div class="col-lg-12">
              <label class="control-label">Alasan Penolakan <span class="text-danger"></span></label>
              <div class="input-group file-caption-main">
                <span class="file-caption-icon"></span>
                  <textarea id="comment_tolak" name="comment_penolakan"  class="form-control form-control-solid" rows="5"><?php if(!empty($ceklis)){echo $data_comment80;}?> </textarea>


              </div>
                   </div>

        </div>
        <div class="form-group row">

          <div class="col-lg-12">
            <label class="control-label">Bukti Penolakan <span class="text-danger"></span></label>
            <input class="file-tolak" id="file_tolak" name="file_tolak" type="file"  data-preview-file-type="text">
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

<script>

function refresh() {
        window .location.reload();
    }
    function tolak_permohonan(sel) {
      document.getElementById('comment_tolak').value='';
      $("#nib_tolak").val(sel.id);
      $("#tgl_permohonan_tolak").val(sel.target);
      $("#id_izin_tolak").val(sel.name);
      var nib_value=sel.id;
      var tgl_permohonan_value=sel.target;
      document.getElementById('comment_tolak').value+="Permohonan SBU Bapak/Ibu dengan NIB : "+nib_value+' Kami cabut ';

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
                                  submitCounter = 0;
  																toastr["success"]("Pencabutan Permohonan Berhasil dilakukan", "Success");
  															}
  															else {
                                  submitCounter = 0;
  																toastr["success"]("Pencabutan Permohonan Berhasil dilakukan", "Success");

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
