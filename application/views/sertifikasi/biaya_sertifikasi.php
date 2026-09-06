<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 11 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../../">
		<meta charset="utf-8" />
		<title>Aplikasi LSBU GAPEKNAS</title>
		<meta name="description" content="Login page example" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="https://keenthemes.com/metronic" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="<?=base_url('assets/css/pages/login/classic/login-5.css') ;?>" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="<?=base_url('assets/plugins/global/plugins.bundle.css') ;?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets/plugins/custom/prismjs/prismjs.bundle.css') ;?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets/css/style.bundle.css') ;?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets/fileinput/css/fileinput.css') ;?>" media="all" rel="stylesheet" type="text/css"/>

		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="<?=base_url('assets/media/logos/Logo_ski_2.png') ;?>" />

  </head>

  <?php
  echo script_tag('assets/plugins/global/plugins.bundle.js');
  echo script_tag('assets/plugins/custom/prismjs/prismjs.bundle.js');
  echo script_tag('assets/js/scripts.bundle.js');
  echo script_tag('assets/fileinput/fileinput2.js');
  echo script_tag('assets/fileinput/js/plugins/piexif.js');
  echo script_tag('assets/fileinput/js/plugins/sortable.js');
  echo script_tag('assets/fileinput/js/locales/fr.js');
  echo script_tag('assets/fileinput/js/locales/es.js');
  echo script_tag('assets/fileinput/fileinput2.js');
  echo script_tag('assets/fileinput/themes/fas/theme.js');
  echo script_tag('assets/fileinput/themes/explorer-fas/theme.js');
  echo script_tag('assets/fileinput/js/plugins/piexif.js');
  echo script_tag('assets/js/mask.js');
  echo script_tag('assets/js/pages/crud/datatables/extensions/responsive.js');
  ;?>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" style="background-image: url(<?=base_url('assets/media/bg/bg-10.jpg') ;?>)" class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">
		<!--begin::Main-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
      <!--begin::Entry-->
      <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
          <!--begin::Invoice-->
					<div class="d-flex flex-column-fluid">
						<!--begin::Container-->
						<div class="container">
							<!-- begin::Card-->
							<div class="card card-custom overflow-hidden">
								<div class="card-body p-0">
									<!-- begin: Invoice-->
									<!-- begin: Invoice header-->
									<div class="row justify-content-center bgi-size-cover bgi-no-repeat py-8 px-8 py-md-27 px-md-0" >
										<div class="col-md-9">
											<div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">
												<h1 class="display-4 text-dark font-weight-boldest mb-10">INVOICE</h1>
												<div class="d-flex flex-column align-items-md-end px-0">
													<!--begin::Logo-->
													<a href="#" class="mb-5">
														<img src="<?= base_url('assets/media/logos/Logo_gapeknas.png') ;?>" style="width: 100%;height:70px;" alt="" />
													</a>
													<!--end::Logo-->
													<span class="text-dark d-flex flex-column align-items-md-end opacity-70">
														<span>Ruko Graha Mas Pemuda Blok AD No. 21 Jl. Pemuda, Rawamangun</span>
														<span>Jakarta Timur</span>
													</span>
												</div>
											</div>
											<div class="border-bottom w-100 opacity-20"></div>
											<div class="d-flex justify-content-between text-dark pt-6">
												<div class="d-flex flex-column flex-root">
													<span class="font-weight-bolde mb-2r">DATE</span>
													<span class="opacity-70"><?= $tgl ;?></span>
												</div>

												<div class="d-flex flex-column flex-root">
													<span class="font-weight-bolder mb-2">INVOICE TO.</span>
													<span class="opacity-70"><?= $biodata[0]['nama'] ;?>
													<br /><?= $biodata[0]['alamat_bu'] ;?></span>
												</div>
											</div>
										</div>
									</div>
									<!-- end: Invoice header-->
									<!-- begin: Invoice body-->
									<div class="row justify-content-center py-8 px-8 py-md-10 px-md-0" style="background-image: url(<?=base_url('assets/media/bg/bg-6.jpg');?>);">
										<div class="col-md-9">
											<div class="table-responsive">
												<table class="table">
													<thead>
														<tr>
															<th class="pl-0 font-weight-bold text-white text-uppercase">Klasifikasi</th>
															<th class="text-right font-weight-bold text-white text-uppercase">Sub Klasifikasi</th>
															<th class="text-right font-weight-bold text-white text-uppercase">Kualifikasi</th>

														</tr>
													</thead>
													<tbody>
														<?php $jumlah=0 ;?>
														<?php foreach($klasifikasi as $row) :?>
														<tr class="font-weight-boldest text-white font-size-lg">
															<td class="pl-0 pt-7"><?= $row['id_klasifikasi'] ;?></td>
															<td class="text-right pt-7"><?= $row['id_sub_klasifikasi'] ;?></td>
															<td class="text-right pt-7"><?= $row['kualifikasi'] ;?></td>
														</tr>
														<?php $jumlah+=$row['biaya'] ;?>
													<?php endforeach ;?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<!-- end: Invoice body-->
									<!-- begin: Invoice footer-->

									<!-- end: Invoice footer-->
									<!-- begin: Invoice action-->
									<div class="row justify-content-center border-top py-8 px-8 py-md-28 px-md-0">
			              <div class="col-md-10">
			                <div class="d-flex font-size-sm flex-wrap">
												
												<a type="button" href="<?= base_url('sertifikasi/print_invoice/'.$nib_dec."/".$tgl_dec) ;?>" target="_blank" class="btn btn-dark font-weight-bolder py-4 mr-3 mr-sm-14 my-1">Print Invoice</a>

												<a type="button" href="<?= base_url('sertifikasi/print_perjanjian/'.$nib_dec."/".$tgl_dec) ;?>" target="_blank" class="btn btn-dark font-weight-bolder py-4 mr-3 mr-sm-14 my-1">Print Perjanjian</a>

			                  <?php if($klasifikasi[0]['file_pembayaran']!='') :?>
			    							<button data-toggle="modal" data-target="#modal_check" type="button" class="btn btn-primary font-weight-bolder ml-sm-auto my-1">Check Pembayaran & Perjanjian</button>
			    						<?php endif ;?>
			    							<button data-toggle="modal" data-target="#modal_upload" type="button" class="btn btn-warning font-weight-bolder ml-sm-auto my-1">Upload Pembayaran & Perjanjian</button>
			                </div>

			              </div>

			            </div>
									<div class="row justify-content-center border-top py-5 px-5 py-md-5 px-md-0">
			              <div class="col-md-10">

											<span>Note:<br>

												<b>*</b> &nbsp;&nbspPerjanjian sertifikasi akan di tandatangani bermaterai terlebih dahulu oleh pemohon sebagai pihak kedua, dan setelah pemohon mengupload bukti perjanjian sertifikasi & bukti pembayaran <b>PT.LSBU GAPEKNAS</b> akan menandatangani surat perjanjian secara elektronik sebagai pihak pertama.<br>
												<b>**</b> Pemohon akan menerima notifikasi melalui email apabila pembayaran telah diverifikasi oleh <b>PT.LSBU GAPEKNAS</b>.
											</span>
			              </div>

			            </div>
									<!-- end: Invoice action-->
									<!-- end: Invoice-->
								</div>
							</div>
							<!-- end::Card-->
						</div>
						<!--end::Container-->
					</div>
          <!--end::Invoice-->
        </div>
        <!--end::Container-->
      </div>
      <!--end::Entry-->
    </div>
    <div class="modal fade" id="modal_check" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeXl" aria-hidden="true">
    	<div class="modal-dialog modal-dialog-centered" role="document">
    		<div class="modal-content">

    			<div class="modal-body">
    				<div class="card card-custom gutter-b">
    					<div class="card-header">
    						<div class="card-title">
    							<span class="card-icon">
    								<i class="flaticon-file-1 text-primary"></i>
    							</span>
    							<h3 class="card-label"><span class="text-primary">Check Bukti Pembayaran Sertifikasi & Surat Perjanjian</span></h3>
    						</div>
    					</div>
    					<div class="card-body">
    						<div class="form-group row">

    							<div class="col-lg-12">
    								<label class="control-label">Bukti Pembayaran<span class="text-danger"></span></label>
    								<a href="<?php echo base_url('get_file/get_bu_49/').$klasifikasi[0]['file_pembayaran'] ;?>" target="_blank" type="button" name="btn_cek_11"  style="float: right" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>

    							</div>
    							<hr>


    						</div>
    						<div class="form-group row">
    						<div class="col-lg-12">
    							<label class="control-label">Bukti Perjanjian<span class="text-danger"></span></label>
    							<a href="<?php echo base_url('get_file/get_bu_perjanjian/').$klasifikasi[0]['file_perjanjian'] ;?>" target="_blank" type="button" name="btn_cek_11"  style="float: right" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>

    						</div>

    							</div>
    					</div>
    				</div>
    			</div>
    			<div class="modal-footer">

    				<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
    			</div>
    		</div>
    	</div>
    </div>

    <div class="modal fade" id="modal_upload" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeXl" aria-hidden="true">
    	<div class="modal-dialog modal-dialog-centered" role="document">
    		<div class="modal-content">

    			<div class="modal-body">
    				<div class="card card-custom gutter-b">
    					<div class="card-header">
    						<div class="card-title">
    							<span class="card-icon">
    								<i class="flaticon-file-1 text-primary"></i>
    							</span>
    							<h3 class="card-label"><span class="text-primary">Upload Bukti Pembayaran Sertifikasi</span></h3>
    						</div>
    					</div>
    					<?php echo form_open_multipart('sertifikasi/insert_pembayaran/', 'class="form-horizontal form-validate-jquery" id="form-upload-1"');?>
    					<div class="card-body">
                <input type="hidden" id='nib' name='nib' class="form-control" value="<?= $nib_dec ;?>" />
                <input type="hidden" id='tgl' name='tgl_permohonan' class="form-control" value="<?= $tgl_dec ;?>" />
                <div class="form-group row">

    							<div class="col-lg-12">
    								<label class="control-label">Upload Bukti Pembayaran<span class="text-danger">*</span></label>
    								<input class="file-pembayaran" id="file_pembayaran" name="file_pembayaran" type="file" required="required" data-preview-file-type="text">
    								<span class="help-block">
    									Accepted formats: pdf, zip. Max file size 20Mb
    								</span>
    								<div class="progress" style="display:none;">
    									<div class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
    										20%
    									</div>
    								</div>
    							</div>

    						</div>
    						<div class="form-group row">

    							<div class="col-lg-12">
    								<label class="control-label">Upload Bukti Perjanjian<span class="text-danger">*</span></label>
    								<input class="file-perjanjian" id="file_perjanjian" name="file_perjanjian" type="file" required="required" data-preview-file-type="text">
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
    			</div>
    			<div class="modal-footer">
    				<button type="submit" id="submit" class="btn btn-primary mr-2">Upload</button>

    				<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
    			</div>
    				<?php echo form_close() ;?>
    		</div>
    	</div>
    </div>
    <script type="text/javascript">
    	$(".file-pembayaran").fileinput({
        maxFileSize: 20000,
        allowedFileExtensions: ['jpg', 'png', 'pdf'],
        showUpload: false,
        dropZoneEnabled: false
    	});
    	$(".file-perjanjian").fileinput({
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





    											// make sure there is file to upload
    											if (document.getElementById("file_pembayaran").files.length != 0 && document.getElementById("file_perjanjian").files.length != 0) {
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
    											}else{
    												toastr["warning"]("File * Harus dilampirkan", "Notification");
    										}

    								});
    		$('body').on('change.bs.fileinput', function (e) {
    			$('.progress').hide();
    			progressBar.text("0%");
    			progressBar.css({width: "0%"});
    		});
    	});

    </script>
		<!--end::Main-->
		<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
    <script type="text/javascript">
				$(function () {
					toastr["<?php echo $this->session->flashdata('class'); ?>"]("<?php echo $this->session->flashdata('text'); ?>", "<?php echo $this->session->flashdata('title'); ?>")


				});
		</script>

	</body>

	<!--end::Body-->
