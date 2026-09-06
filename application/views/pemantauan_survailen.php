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
  <div class="subheader py-2 py-lg-12 subheader-transparent" id="kt_subheader">
    <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
      <!--begin::Info-->
      <div class="d-flex align-items-center mr-1">
        <!--begin::Page Heading-->
        <div class="d-flex align-items-baseline flex-wrap mr-5">
          <!--begin::Page Title-->
          <h2 class="d-flex align-items-center text-dark font-weight-bold my-1 mr-3"></h2>
          <!--end::Page Title-->
          <!--begin::Breadcrumb-->
          <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
            <li class="breadcrumb-item text-muted">
              <a href="" class="text-dark"></a>
            </li>
            <li class="breadcrumb-item text-muted">
              <a href="" class="text-dark"></a>
            </li>

          </ul>
          <!--end::Breadcrumb-->
        </div>
        <!--end::Page Heading-->
      </div>

    </div>
  </div>
  <!--begin::Content Wrapper-->
  <div class="d-flex flex-column-fluid">
  <div class="container">
    <!--begin::Subheader-->

    <!--begin::Card-->
    <div class="card card-custom gutter-b">
    <div class="card-header">
        <div class="card-title">
          <h3 class="card-label">Report
            <span class="d-block text-muted pt-2 font-size-sm">Form Jadwal Surveilan</span></h3>
        </div>
        <div class="card-toolbar">

          <!--end::Button-->
        </div>
      </div>

      <div class="card-body">
        <?php echo form_open_multipart('pemantauan/survailen_jadwal/', 'class="form-horizontal form-validate-jquery" id="form-upload-2"');?>

        <div class="form-group">

          <div class="input-group">
            <div class="col-md-5">
            <select class="form-control select" name="tahun">
              <option value="2025">2025</option>
              <option value="2024">2024</option>
		<option value="2023">2023</option>
            </select>
            </div>
            <div class="col-md-4">
            <select class="form-control select" name="limit">
              <option value="0">Pilih Limit Data Yang Dikeluarkan</option>
              <option value="50">50</option>
              <option value="100">100</option>
		        <option value="200">200</option>
                <option value="500">500</option>
                <option value="1000">1000</option>
                <option value="5000">5000</option>
            </select>
            </div>
            
            
            <div class="input-group-append">
              <button class="btn btn-primary" id="submit" type="submit">Create Report</button>
            </div>
          </div>

        </div>
        <?php echo form_close() ;?>
        <!--end: Datatable-->
      </div>
    </div>
    </div>
    <!--end::Card-->

    <!--end::Container-->
  </div>
  <!--end::Entry-->
</div>
<script>
  $('#tgl_1').datepicker({
    format: 'yyyy-mm-dd'
  }).on('hide', function (event) {
    event.preventDefault();
    event.stopPropagation();
  });
  $('#tgl_2').datepicker({
    format: 'yyyy-mm-dd'
  }).on('hide', function (event) {
    event.preventDefault();
    event.stopPropagation();
  });
</script>