<link href="<?=base_url('assets/fileinput/css/fileinput.css') ;?>" media="all" rel="stylesheet" type="text/css"/>
<link href="<?=base_url('assets/fileinput/themes/explorer-fas/theme.css') ;?>" media="all" rel="stylesheet" type="text/css"/>
<?php
	echo script_tag('assets/jquery.js');
	echo script_tag('assets/fileinput/fileinput2.js');
  echo script_tag('assets/fileinput/js/plugins/piexif.js');
  echo script_tag('assets/fileinput/js/plugins/sortable.js');
  echo script_tag('assets/fileinput/js/locales/fr.js');
  echo script_tag('assets/fileinput/js/locales/es.js');
  echo script_tag('assets/fileinput/themes/fas/theme.js');
  echo script_tag('assets/fileinput/themes/explorer-fas/theme.js');
  echo script_tag('assets/fileinput/js/plugins/piexif.js');
	echo script_tag('assets/js/mask.js');
	echo script_tag('assets/bootstrap-datepicker.min.js');
	echo script_tag('assets/lsbu.js');
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
          <h2 class="text-white font-weight-bold my-2 mr-5">Tinjauan Permohonan</h2>
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
            <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Tinjauan Permohonan</a>
            <!--end::Item-->
          </div>
          <!--end::Breadcrumb-->
        </div>
        <!--end::Heading-->
      </div>

    </div>
  </div>
	<?php echo form_open_multipart(base_url('sertifikasi/insert_verifikasi_ceklis'), 'method="POST"');?>

  <div class="d-flex flex-column-fluid">
    <div class="container">
			<div class="card card-custom gutter-b">
				<div class="card-header">
					<div class="card-title">
						<h3 class="card-label">Verifikasi Permohonan</h3>


					</div>
					<div class="card-toolbar">

						<a href="<?= base_url('sertifikasi/verifikasi_permohonan/'.$nib_dec.'/'.$tgl_dec) ;?>" target="_blank" class="btn btn-primary font-weight-bolder">
						<i class="la la-plus"></i>Verifikasi</a>

					</div>
				</div>
				<div class="card-body">
					<br>
					<div class="example mb-10" id="div1">
						<?= $content ;?>
					</div>
					<button id="submit" type="submit" name="submit"  style="float: right" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-paperplane" ></i></b> Submit</button>
					<textarea style="display:none;" id="div2" name="div2" rows="4" cols="50"></textarea>
					<?php echo form_close() ;?>
				</div>
			</div>
    </div>
  </div>
</div>

<script>
$('#submit').on('click', function() {
    var MyDiv1 = document.getElementById('div1');
     var MyDiv2 = document.getElementById('div2');
     MyDiv2.innerHTML = MyDiv1.innerHTML;
  });
</script>
