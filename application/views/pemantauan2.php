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
	<head><base href="../../../">
		<meta charset="utf-8" />
		<title>Aplikasi LSBU GAPEKNAS</title>
		<meta name="description" content="Pricing table example" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="<?= base_url('assets/media/logos/inkindo.png') ;?>" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="<?= base_url('assets/plugins/global/plugins.bundle.css') ;?>" rel="stylesheet" type="text/css" />
		<link href="<?= base_url('assets/plugins/custom/prismjs/prismjs.bundle.css') ;?>" rel="stylesheet" type="text/css" />
		<link href="<?= base_url('assets/css/style.bundle.css') ;?>" rel="stylesheet" type="text/css" />

		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="<?=base_url('assets/media/logos/Logo_GAPEKNAS.png') ;?>" />
	</head>
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
	<!--end::Head-->
	<!--begin::Body-->

<body id="kt_body" style="background-image: url(<?=base_url('assets/media/bg/bg-10.jpg') ;?>)" class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">

  <div class="subheader py-2 py-lg-12 subheader-transparent" id="kt_subheader">
    <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
      <!--begin::Info-->
      <div class="d-flex align-items-center flex-wrap mr-1">
        <!--begin::Mobile Toggle-->
        <button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none" id="kt_subheader_mobile_toggle">
          <span></span>
        </button>
        <!--end::Mobile Toggle-->
        <!--begin::Heading-->
        <div class="d-flex flex-column">
          <!--begin::Title-->
          <h2 class="text-white font-weight-bold my-2 mr-5">Administrasi</h2>
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
            <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Pemantauan</a>
            <!--end::Item-->
            <!--begin::Item-->
            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
            <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Pemantauan Proses Sertifikasi</a>
            <!--end::Item-->
          </div>
          <!--end::Breadcrumb-->
        </div>
        <!--end::Heading-->
      </div>
      <!--end::Info-->

    </div>
  </div>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

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
            <h3 class="card-label">Pemantauan Proses LSBU GAPEKNAS
            <span class="d-block text-muted pt-2 font-size-sm">Masukan ID Izin / NIB / Nama Badan Usaha yang ingin anda cari</span></h3>
          </div>
          <div class="card-toolbar">

						<!--end::Button-->
					</div>
        </div>

        <div class="card-body">

              <div class="form-group">

                <div class="input-group">
                  <input type="text" id="input" class="form-control" placeholder="Search for..." />
                  <div class="input-group-append">
                    <button class="btn btn-primary" id="submit" type="button">SEARCHING</button>
                  </div>
                </div>
                <div class="form-group row">

                  <div class="col-12 col-form-label">
                    <div class="radio-inline">
                      <label class="radio radio-success">
                      <input type="radio" name="option" value="1" checked/>
                      <span></span>ID Izin</label>
                      <label class="radio radio-success">
                      <input type="radio" name="option" value="2"/>
                      <span></span>NIB</label>
                      <label class="radio radio-success">
                      <input type="radio" name="option" value="3"/>
                      <span></span>Nama</label>
                    </div>
                    <span class="form-text text-muted">Pilih Tipe Pencarian</span>
                  </div>
                </div>
              </div>


              <table class="table table-bordered table-hover table-checkable mt-10" id="kt_datatable2">
                <thead>
                  <tr>
                    <th colspan="3">Data Badan Usaha</th>
                    <th colspan="4">Permohonan</th>

                    <th colspan="4">Status Permohonan</th>

                  </tr>
                  <tr>
                    <th>No</th>
                    <th>ID Izin</th>
                    <th>Nama Badan Usaha</th>
                    <th>Propinsi</th>
                    <th>NIB-Bentuk</th>
                    <th>Jenis</th>

                    <th>Sub Klas - Kualifikasi</th>
                    <th>Status</th>


                  </tr>
                </thead>
                <tbody>

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
		$('#submit').click(function(){
      var options = $('input[name="option"]:checked').val();
      var input_value = $('#input').val();

      jQuery.ajax({
        url : "<?= base_url('pemantauan/search')?>",
        type : "POST",
        data : {input:input_value,
          option:options},
          success : function(data) {
          response = jQuery.parseJSON(data);
          var table = $('#kt_datatable2').DataTable();
          table.clear().draw();

          var array=response.record;
          console.log(array);
          // table.columns(0).header().to$().text('id_izin');
          // table.columns(1).header().to$().text('nama_bujk');
          // table.columns(2).header().to$().text('nama_propinsi');
          // table.columns(3).header().to$().text('NIB');
          // table.columns(4).header().to$().text('nama_jenis');
          // table.columns(5).header().to$().text('id_sub_klasifikasi');
          array.forEach(function(element) {
            if(element.status==20){
              var status='<a type="button" id="'+element.id_izin+'" onclick="javascript:cek_detail(this)" class="pulse pulse-success"><span class="label label-success label-inline mr-2">Tinjauan<span class="pulse-ring"></span> </span></a>';
            }else if(element.status==11){
              var status='<a type="button" id="'+element.id_izin+'" onclick="javascript:cek_detail(this)" class="pulse pulse-danger"><span class="label label-danger label-inline mr-2">Dikembalikan<span class="pulse-ring"></span> </span></a>';
            }else if(element.status==10){
              var status='<a type="button" id="'+element.id_izin+'" onclick="javascript:cek_detail(this)" class="pulse pulse-warning"><span class="label label-warning label-inline mr-2">Pembayaran<span class="pulse-ring"></span> </span></a>';
            }else if(element.status==30){
              var status='<a type="button" id="'+element.id_izin+'" onclick="javascript:cek_detail(this)" class="pulse pulse-warning"><span class="label label-warning label-inline mr-2">Pembayaran<span class="pulse-ring"></span> </span></a>';

            }else if(element.status==31){
              var status='<a type="button" id="'+element.id_izin+'" onclick="javascript:cek_detail(this)" class="pulse pulse-success"><span class="label label-success label-inline mr-2">Penilaian<span class="pulse-ring"></span> </span></a>';

            }else if(element.status==50){
              var status='<a type="button" id="'+element.id_izin+'" onclick="javascript:cek_detail(this)" class="pulse pulse-danger"><span class="label label-success label-inline mr-2">Terbit<span class="pulse-ring"></span> </span></a>';

            }else if(element.status==90){
              var status='<a type="button" id="'+element.id_izin+'" onclick="javascript:cek_detail(this)" class="pulse pulse-danger"><span class="label label-danger label-inline mr-2">Ditolak<span class="pulse-ring"></span> </span></a>';

            }else if(element.status==92){
              var status='<a type="button" id="'+element.id_izin+'" onclick="javascript:cek_detail(this)" class="pulse pulse-danger"><span class="label label-danger label-inline mr-2">Dibatalkan<span class="pulse-ring"></span> </span></a>';
						}else if(element.status==91){
							var status='<a type="button" id="'+element.id_izin+'" onclick="javascript:cek_detail(this)" class="pulse pulse-danger"><span class="label label-danger label-inline mr-2">Dicabut<span class="pulse-ring"></span> </span></a>';

            }else{
            var status="-";
            }

            var rowNode = table
              .row.add( [ '',element.id_izin, element.nama_bujk, element.nama_propinsi,element.NIB+'-'+element.bentuk_nama,element.nama_jenis,element.id_sub_klasifikasi+'-'+element.kualifikasi,status] )
              .draw()
              .node();
              $( rowNode )
  								.css( 'color', 'black' )
  								.animate( { color: 'black' } );
  					});
          },
          error: function(xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
          }
        });

      });


$('#tgl_1').datepicker({
	format: 'yyyy-mm-dd'
}).on('hide', function(event) {
	event.preventDefault();
	event.stopPropagation();
});
$('#tgl_2').datepicker({
	format: 'yyyy-mm-dd'
}).on('hide', function(event) {
	event.preventDefault();
	event.stopPropagation();
});
</script>
<?php
echo script_tag('assets/plugins/global/plugins.bundle.js');
echo script_tag('assets/plugins/custom/prismjs/prismjs.bundle.js');
echo script_tag('assets/js/scripts.bundle.js');
echo script_tag('assets/plugins/custom/datatables/datatables.bundle.js');
echo script_tag('assets/datatables_costume.js');
?>
