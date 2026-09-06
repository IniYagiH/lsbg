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

<head>
    <base href="../../../../">
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
    <link href="<?=base_url('assets/fileinput/css/fileinput.css') ;?>" media="all" rel="stylesheet" type="text/css" />

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
            <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat"
                style="background-image: url('<?= base_url() ;?>assets/media/bg/bg-3.jpg');">
                <div class="login-form text-center p-7 position-relative overflow-hidden">
                    <!--begin::Login Header-->
                    <div class="d-flex flex-center mb-15">
                        <a href="#">
                            <img src="<?=base_url('assets/media/logos/Logo_gapeknas.png') ;?>" class="max-h-75px"
                                alt="" />
                        </a>
                    </div>
                    <!--end::Login Header-->
                    <!--begin::Login Sign in form-->
                    <div class="login-signin">
                        <div class="mb-20">
                            <h3></h3>
                            <div class="text-muted font-weight-bold">PT LSBU GAPEKNAS INFRASTRUKTUR</div>
                            <br>
                            <a href="https://sertifikasi.lsbugapeknas.com/assets/Draft Tutorial Pengisian Aplikasi Survailen LSBU GAPEKNAS.pdf" class="btn btn-success">
                                <i class="flaticon-download"></i> Download Panduan User
                            </a>
                        </div>
                        <form class="form" id="kt_login_signin_form">
                            <div class="form-group mb-5">
                                <input class="form-control h-auto form-control-solid py-4 px-8" type="text"
                                    placeholder="Username / NIB" id="username" name="username" autocomplete="off" />
                            </div>
                            <div class="form-group mb-5">
                                <input class="form-control h-auto form-control-solid py-4 px-8" type="password"
                                    placeholder="Password" id="password" autocomplete="off" name="password" />
                            </div>
                            <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                                <div class="checkbox-inline">
                                    <label class="checkbox m-0 text-muted">
                                        <input type="checkbox" name="remember" />
                                        <span></span>Remember me</label>
                                </div>
                                <a href="javascript:;" id="kt_login_forgot" class="text-muted text-hover-dark font-weight-bold">Belum Punya Akun ?</a>

                            </div>
                            <button id="kt_login_signin_submit"
                                class="btn btn-danger font-weight-bold px-9 py-4 my-3 mx-4">Sign In</button>
                       
                            </form>
                        <!--	<div class="mt-10">
								<span class="opacity-70 mr-4">Don't have an account yet?</span>
								<a href="javascript:;" id="kt_login_signup" class="text-muted text-hover-danger font-weight-bold">Sign Up!</a>
							</div>-->
                    </div>
                    
                    <input type="hidden" id="base_url" value="<?=base_url('survailen');?>" />

                    <!--end::Login Sign in form-->
                    <!--begin::Login Sign up form-->
                    
                    <!--end::Login Sign up form-->
                    <!--begin::Login forgot password form-->
                    <div class="login-forgot">
                        <div class="mb-20">
                            <h3>Sign Up</h3>
                            <div class="text-muted font-weight-bold">Masukan NIB dan anda akan menerima akun yang dikirim ke alamat email anda</div>
                        </div>
                        <?php echo form_open_multipart('survailen/signup/', 'class="form text-center" id="kt_login_forgot_form"');?>

                       
                            <div class="form-group mb-10">
                                <input class="form-control form-control-solid h-auto py-4 px-8" type="text"
                                    placeholder="NIB" name="nib" autocomplete="off" />
                            </div>
                            <div class="form-group d-flex flex-wrap flex-center mt-10">
                                <button type="submit" class="btn btn-danger font-weight-bold px-9 py-4 my-3 mx-2">Request</button>
                                <!-- <button href="<?=base_url('survailen');?>"
                                    class="btn btn-light-danger font-weight-bold px-9 py-4 my-3 mx-2">Cancel</button> -->
                            </div>
                    
                        <?php echo form_close() ;?>
                    </div>
                    <!--end::Login forgot password form-->
                </div>
            </div>
        </div>
        <!--end::Login-->
    </div>
    
    <!--end::Main-->
    <script>
        var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
    </script>
    <!--begin::Global Config(global config for global JS scripts)-->
    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1200
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "danger": "#0BB783",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#F3F6F9",
                        "dark": "#212121"
                    },
                    "light": {
                        "white": "#ffffff",
                        "danger": "#D7F9EF",
                        "secondary": "#ECF0F3",
                        "success": "#C9F7F5",
                        "info": "#EEE5FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "danger": "#ffffff",
                        "secondary": "#212121",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#ECF0F3",
                    "gray-300": "#E5EAEE",
                    "gray-400": "#D6D6E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#80808F",
                    "gray-700": "#464E5F",
                    "gray-800": "#1B283F",
                    "gray-900": "#212121"
                }
            },
            "font-family": "Poppins"
        };
    </script>
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
<script type="text/javascript">
				$(function() {

					toastr["<?php echo $this->session->flashdata('class'); ?>"]("<?php echo $this->session->flashdata('text'); ?>", "<?php echo $this->session->flashdata('title'); ?>")


				});
		</script>

<script type="text/javascript">
    $(".file-nib").fileinput({
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
            var email_value = document.querySelector('#email').value;
            var nib_value = document.querySelector('#nib').value;
            var nama_value = document.querySelector('#nama').value;
            if (email_value != '' && nib_value != '' && nama_value != '') {



                // make sure there is file to upload
                if (document.getElementById("file_nib").files.length) {

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
                                }).then(function () {
                                    KTUtil.scrollTop();
                                    location.reload();
                                });

                            },
                            xhr: function () {
                                var xhr = new XMLHttpRequest();
                                xhr.upload.addEventListener("progress", function (event) {
                                    if (event.lengthComputable) {
                                        var percentComplete = Math.round((event
                                            .loaded / event.total) * 100);
                                        // console.log(percentComplete);

                                        $('.progress').show();
                                        if (percentComplete >= 97) {
                                            progressBar.text('- Harap Tunggu -');
                                        } else {
                                            progressBar.text(percentComplete + '%');
                                        }
                                        progressBar.css({
                                            width: percentComplete + "%"
                                        });
                                    };
                                }, false);
                                return xhr;
                            }
                        });
                    } else {
                        toastr["warning"]("This is can be clicked only once.", "Notification");


                    }




                } else {
                    toastr["warning"]("File * Harus dilampirkan", "Notification");


                }
            } else {
                toastr["warning"]("Data * Harus diisi", "Notification");

            }
        });
        $('body').on('change.bs.fileinput', function (e) {
            $('.progress').hide();
            progressBar.text("0%");
            progressBar.css({
                width: "0%"
            });
        });
    });
</script>

</html>