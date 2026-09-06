
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
		<title>LSBU GAPEKNAS</title>
		<meta name="description" content="Login page example" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="https://keenthemes.com/metronic" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
    <link href="<?=base_url('assets/css/pages/login/classic/login-4.css') ;?>" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="<?=base_url('assets/plugins/global/plugins.bundle.css') ;?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets/plugins/custom/prismjs/prismjs.bundle.css') ;?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets/css/style.bundle.css') ;?>" rel="stylesheet" type="text/css" />
		<link href="<?=base_url('assets/fileinput/css/fileinput.css') ;?>" media="all" rel="stylesheet" type="text/css"/>

		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<!--end::Layout Themes-->
    <link rel="shortcut icon" href="<?=base_url('assets/media/logos/Logo_gapeknas.png') ;?>" />

	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
				<div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url('<?= base_url() ;?>assets/media/bg/bg-3.jpg');">
					<div class="login-form text-center p-7 position-relative overflow-hidden">
						<!--begin::Login Header-->
						<div class="d-flex flex-center mb-15">
							<a href="#">
								<img src="<?=base_url('assets/media/logos/Logo_gapeknas.png') ;?>" class="max-h-75px" alt="" />
							</a>
						</div>
						<!--end::Login Header-->
						<!--begin::Login Sign in form-->
						<div class="login-signin">
							<div class="mb-20">
								<h3>Sign Up</h3>
								<div class="text-muted font-weight-bold">Enter your details to create your account</div>
							</div>
							<?php echo form_open_multipart('registrasi/signup/', 'class="form text-center" id="kt_login_signup_form"');?>
							<div class="form-group mb-5">
								<input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="Nama" id="nama" name="nama"/>
							</div>
								<div class="form-group mb-5">
									<input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="NIK"  id="nik" name="nik" />
								</div>
								<div class="form-group mb-5">
									<input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="Alamat"  id="alamat" name="alamat" />
								</div>
								<div class="form-group mb-5">

									<select id="propinsi" name="propinsi" onchange="getval(this)" class="form-control h-auto form-control-solid py-4 px-8" required="required">
	                    <option value="">Pilih Propinsi</option>
											<?php foreach ($propinsi as $row2) :?>
												<option value="<?php echo $row2['ID_Propinsi'] ;?>"><?php echo $row2['Nama'] ;?></option>
											<?php endforeach ;?>
	                </select>
								</div>
								<div class="form-group mb-5">

									<select id="kabupaten" name="kabupaten"  class="form-control h-auto form-control-solid py-4 px-8" required="required">
											<option value="">Pilih Kabupaten</option>

									</select>
								</div>
								<div class="form-group mb-5">
									<input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="Email"  id="email" name="email"  />
								</div>
								<div class="form-group mb-5">
									<input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="Telepon/HP"  id="telepon" name="telepon"  />
								</div>

								<div class="form-group mb-5">
									<input class="file-nib" id="file_ktp" name="file_ktp" type="file"  data-preview-file-type="text">
									<span class="help-block">
										File KTP: pdf Max file size 20Mb
									</span>
									<div class="progress" style="display:none;">
										<div id="progress-bar-5" class="progress-bar progress-bar-danger progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
											20%
										</div>
									</div>
								 </div>
								 <div class="form-group mb-5">
									 <input class="file-npwp" id="file_npwp" name="file_npwp" type="file"  data-preview-file-type="text">
									 <span class="help-block">
										 File NPWP: pdf Max file size 20Mb
									 </span>

									</div>
								<div class="form-group mb-5 text-left">
									<div class="checkbox-inline">
										<label class="checkbox m-0">
										<input type="checkbox" name="agree" />
										<span></span>I Agree the
										<a href="#" class="font-weight-bold ml-1 text-danger">terms and conditions</a>.</label>
									</div>
									<div class="form-text text-muted text-center"></div>
								</div>
								<div class="form-group d-flex flex-wrap flex-center mt-10">
									<button id="kt_login_signup_submit2" class="btn btn-danger font-weight-bold px-9 py-4 my-3 mx-2">Sign Up</button>
									<button id="kt_login_signup_cancel" class="btn btn-light-danger font-weight-bold px-9 py-4 my-3 mx-2">Cancel</button>
								</div>
							<?php echo form_close() ;?>
						</div>
            <input type="hidden" id="base_url" value="<?=base_url('login');?>" />

						<!--end::Login Sign in form-->
						<!--begin::Login Sign up form-->

						<!--end::Login Sign up form-->
						<!--begin::Login forgot password form-->
						<div class="login-forgot">
							<div class="mb-20">
								<h3>Forgotten Password ?</h3>
								<div class="text-muted font-weight-bold">Enter your email to reset your password</div>
							</div>
							<form class="form" id="kt_login_forgot_form">
								<div class="form-group mb-10">
									<input class="form-control form-control-solid h-auto py-4 px-8" type="text" placeholder="Email" name="email" autocomplete="off" />
								</div>
								<div class="form-group d-flex flex-wrap flex-center mt-10">
									<button id="kt_login_forgot_submit2" class="btn btn-danger font-weight-bold px-9 py-4 my-3 mx-2">Request</button>
									<button id="kt_login_forgot_cancel" class="btn btn-light-danger font-weight-bold px-9 py-4 my-3 mx-2">Cancel</button>
								</div>
							</form>
						</div>
						<!--end::Login forgot password form-->
					</div>
				</div>
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->
		<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "danger": "#0BB783", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "danger": "#D7F9EF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "danger": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->

    <?php
    echo script_tag('assets/plugins/global/plugins.bundle.js');
    echo script_tag('assets/plugins/custom/prismjs/prismjs.bundle.js');
    echo script_tag('assets/js/scripts.bundle.js');
    echo script_tag('assets/js/pages/custom/login/login-general.js');
    echo script_tag('assets/fileinput/fileinput2.js');

    ;?>
		<!--end::Page Scripts-->
	</body>
	<script>

	function getval(sel)
	{
		document.getElementById("kabupaten").options.length = 0;

		$.ajax({
				url : "<?php echo base_url('registrasi/kabupaten'); ?>",
				type : "POST",
				data : {id_propinsi : sel.value,},
				success : function(data) {

					response = jQuery.parseJSON(data);
					csrfHash = response.csrfHash;

					//console.log( JSON.parse(data) );
					id_kabupaten=response.record;

					$.each(id_kabupaten, function(i, option) {
						var $option = $("<option>", {text: option.Nama, value: option.ID_Kabupaten});
						$option.appendTo("#kabupaten");
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
  		$(".file-nib").fileinput({
  	    maxFileSize: 20000,
  	    allowedFileExtensions: ['jpg', 'png', 'pdf'],
  	    showUpload: false,
  	    dropZoneEnabled: false
  		});
			$(".file-npwp").fileinput({
				maxFileSize: 20000,
				allowedFileExtensions: ['jpg', 'png', 'pdf'],
				showUpload: false,
				dropZoneEnabled: false
			});

  		var submitCounter = 0;
  		$(function () {
  			var uploadURI = $('#kt_login_signup_form').attr('action');
  			var progressBar = $('#progress-bar-1');

  			$("form#kt_login_signup_form").submit(function () {

  				event.preventDefault();
  				var email_value=document.querySelector('#email').value;
  				var nama_value=document.querySelector('#nama').value;
  				var nik_value=document.querySelector('#nik').value;
					var alamat_value=document.querySelector('#alamat').value;
					var telepon_value=document.querySelector('#telepon').value;
												if(telepon_value!='' && alamat_value!='' && email_value!='' && nik_value!='' && nama_value!=''){



  												// make sure there is file to upload
  												if (document.getElementById("file_ktp").files.length && document.getElementById("file_npwp").files.length) {

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
  																/*
  																if (data.result == '1') {
  																	window.location.replace("<?php echo base_url('login');?>");
  																}*/

  																swal.fire({
  								                text: "All is cool! Now you submit this form",
  								                icon: "success",
  								                buttonsStyling: false,
  								                confirmButtonText: "Ok, got it!",
  						                        customClass: {
  						    						confirmButton: "btn font-weight-bold btn-light-danger"
  						    					}
  								            }).then(function() {
  															KTUtil.scrollTop();
  															location.reload();
  													});

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
  													toastr["warning"]("File Harus dilampirkan", "Notification");


  											}
  										}else{
  											toastr["warning"]("Semua Data Harus diisi", "Notification");

  										}
  									});
  			$('body').on('change.bs.fileinput', function (e) {
  				$('.progress').hide();
  				progressBar.text("0%");
  				progressBar.css({width: "0%"});
  			});
  		});

  	</script>
  </html>
