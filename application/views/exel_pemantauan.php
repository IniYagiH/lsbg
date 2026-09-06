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
echo script_tag('assets/bootstrap-datepicker.min.js');
echo script_tag('assets/js/pages/crud/datatables/extensions/responsive.js');
?>
<div class="d-flex flex-row flex-column-fluid container">
  <!--begin::Content Wrapper-->
  <div class="main d-flex flex-column flex-row-fluid">
  <!--begin::Subheader-->

      <!--begin::Card-->
      <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
          <div class="card-title">
            <h3 class="card-label">Export Excel
            <span class="d-block text-muted pt-2 font-size-sm">Masukan range tanggal untuk mengeluarkan data permohonan</span></h3>
          </div>
          <div class="card-toolbar">

						<!--end::Button-->
					</div>
        </div>

        <div class="card-body">
          <?php echo form_open_multipart('reporting/excel_permohonan/', 'class="form-horizontal form-validate-jquery" id="form-upload-2"');?>

          <div class="mb-12">
            <div class="row align-items-center">
              <div class="col-lg-12 col-xl-10">
                <div class="row align-items-center">

                  <div class="col-md-3 my-2 my-md-0">

                    <label><span class="text-danger">Range Tgl Awal</span></label>
                            <div class="input-icon">
                              <input type="text"  name="tgl_awal" class="form-control" id="tgl_1" value="<?=date("Y-m-d");?>">

                              <span>
                                <i class="flaticon-event-calendar-symbol icon-md"></i>
                              </span>
                            </div>
                            <span class="form-text text-muted">&nbsp</span>
                  </div>
                  <div class="col-md-3 my-2 my-md-0">
                    <label><span class="text-danger">Range Tgl Akhir</span></label>
														<div class="input-icon">
                              <input type="text"  name="tgl_akhir" class="form-control" id="tgl_2" value="<?=date("Y-m-d");?>">

															<span>
																<i class="flaticon-event-calendar-symbol icon-md"></i>
															</span>
														</div>
														<span class="form-text text-muted">&nbsp</span>

                  </div>
                  <div class="col-md-4 my-2 my-md-0">

                    <label><span class="text-danger">Propinsi</span></label>
                            <div class="input-icon">
                              <select name="propinsi"  id="propinsi"class="form-control" required="required">
                                  <option value="0">Semua Propinsi</option>
                                  <?php foreach ($propinsi as $row2) :?>
                                    <option value="<?php echo $row2['ID_Propinsi'] ;?>"> - <?php echo $row2['Nama'] ;?></option>
                                  <?php endforeach ;?>
                              </select>
                              <span>
                                <i class="flaticon-placeholder icon-md"></i>
                              </span>
                            </div>
                            <span class="form-text text-muted">&nbsp</span>
                  </div>


                  <div class="col-md-4 my-2 my-md-0">

                    <label><span class="text-danger">Sub Klasifikasi</span></label>
                            <div class="input-icon">
                              <select name="sub_klasifikasi" class="form-control" required="required">
                                  <option value="0">Semua Sub Klasifikasi</option>
                                  <?php foreach ($sub_klasifikasi as $row) :?>
                                    <option value="<?php echo $row['id_sub_klasifikasi'] ;?>"> <?php echo $row['id_sub_klasifikasi'] ;?> - <?php echo $row['deskripsi_subklasifikasi'] ;?></option>
                                  <?php endforeach ;?>
                              </select>
                              <span>
                                <i class="flaticon-medal icon-md"></i>
                              </span>
                            </div>
                            <span class="form-text text-muted">&nbsp</span>
                  </div>
                  <div class="col-md-3 my-2 my-md-0">

                    <label><span class="text-danger">Kualifikasi</span></label>
                            <div class="input-icon">
                              <select name="kualifikasi" class="form-control" required="required">
                                  <option value="0">Semua Kualifikasi</option>

                                    <option value="K"> Kecil</option>
                                    <option value="M"> Menengah</option>
                                    <option value="B"> Besar</option>
                                    <option value="Spesialis"> Spesialis</option>
                              </select>
                              <span>
                                <i class="flaticon-medal icon-md"></i>
                              </span>
                            </div>
                            <span class="form-text text-muted">&nbsp</span>
                  </div>
                  <div class="col-md-3 my-2 my-md-0">

                    <label><span class="text-danger">Asosiasi</span></label>
                            <div class="input-icon">
                              <select name="asosiasi" class="form-control" required="required">
                              <option value="0">Semua Asosiasi</option>
                                  <?php foreach ($asosiasi as $row_asosiasi) :?>
                                    <option value="<?php echo $row_asosiasi['ID_Asosiasi_BU'] ;?>"> <?php echo $row_asosiasi['Nama'] ;?></option>
                                  <?php endforeach ;?>
                              </select>
                              <span>
                                <i class="flaticon-medal icon-md"></i>
                              </span>
                            </div>
                            <span class="form-text text-muted">&nbsp</span>
                  </div>

                </div>
              </div>
              <div class="col-lg-2 col-xl-2 mt-5 mt-lg-0">
                <button  type="submit" class="btn btn-light-primary px-6 font-weight-bold font-size-h3 px-12 py-5">Export</button>

              </div>

            </div>
          </div>
          <?php echo form_close() ;?>
          <!--end: Datatable-->
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
