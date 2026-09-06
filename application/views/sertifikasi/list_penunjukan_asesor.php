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
							<a href="" class="text-dark">List Penunjukan Asesor</a>
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
            <h3 class="card-label">Permohonan Penujukan Asesor
            <span class="d-block text-muted pt-2 font-size-sm">Daftar Keseluruhan Permohonan Untuk Dilakukan PenujukanAsesor</span></h3>
          </div>
          <div class="card-toolbar">

            <a data-toggle="modal" id="penunjukan" data-target="#modal_input" class="btn btn-light-dark font-weight-bolder">
            <i class="la la-map-pin"></i>Tunjuk Asesor</a>
          </div>

        </div>
        <div class="card-body">

          <!--begin: Datatable-->
          <table class="table table-bordered table-hover table-checkable mt-10" id="kt_datatable2">
            <thead>
              <tr>
                <th colspan="4">Data Badan Usaha</th>
                <th colspan="4">Permohonan</th>

                <th colspan="4">Status Permohonan</th>

              </tr>
              <tr>
                <th>Detail Data</th>
                <th>Pilih Data</th>
                <th>Nama Badan Usaha</th>
                <th>NIB</th>

                <th>Sub Klasifikasi</th>
                <th>Kualifikasi</th>
                <th>Asesor</th>
                <th>Tgl Status 31</th>
                <th>Waktu Proses</th>
                <th>Tgl Permohonan</th>



                <th>Biaya</th>
                <th>File Pembayaran</th>
                <th>File Perjanjian</th>
                <th>File Tinjauan Permohonan</th>

                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php if(!empty($record)) :?>
              <?php foreach($record as $row) :?>
              <tr>
                <td></td>
                <td>
                  <div class="d-flex align-items-center mr-3" data-inbox="actions">
                    <label class="checkbox checkbox-outline checkbox-outline-2x checkbox-danger mr-3">
                      <input type="checkbox" name="<?= $row['NIB'] ;?>" value="<?= $row['tgl_permohonan'] ;?>" class="call-checkbox"/>
                      <span></span>
                    </label>

                  </div>

                </td>
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

                <td><?=$row['concat_sub'];?></td>
                <td><?=$row['concat_kualifikasi'];?></td>
                <td><?=$row['asesor'];?></td>
                <td><?=$row['tgl_biaya'];?></td>
                <td><?php if($row['perbedaan']!='1' AND $row['perbedaan']!='2' AND $row['perbedaan']!='3' AND $row['perbedaan']!='0'):?>
                  <a type="button" class="pulse pulse-danger"><span class="label label-danger label-inline mr-2"><?=$row['perbedaan'];?> Hari<span class="pulse-ring"></span> </span></a>

                <?php else :?>
                  <a type="button" class="pulse pulse-info"><span class="label label-info label-inline mr-2"><?=$row['perbedaan'];?> Hari<span class="pulse-ring"></span> </span></a>

                <?php endif ;?>
                  </td>
                <td><?=$row['tgl_permohonan'];?></td>



                <td>Rp, <?= number_format(($row['biaya_lsbu']*1000), 2, '.', ',');?></td>
                <td><a href="<?= base_url('get_file/get_bu_49/'.$row['file_pembayaran']) ;?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>
                <td><a href="<?= base_url('get_file/get_bu_perjanjian/'.$row['file_perjanjian']) ;?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>
                <td><a href="<?=base_url("sertifikasi/cetak_verifikasi/".encrypt_url($row['NIB']).'/'.encrypt_url($row['tgl_permohonan'])) ;?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>

                <td>
                  <div class="dropdown dropdown-inline">
                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">
                                      <i class="la la-cog"></i>
                                  </a>
                      <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                      <ul class="nav nav-hoverable flex-column">
                        <!--
                        <li class="nav-item"><a class="nav-link" target="_blank" href="<?= base_url("sertifikasi/berita_acara/".encrypt_url($row['NIB']).'/'.encrypt_url($row['tgl_permohonan'])) ;?>"><i class="nav-icon la la-chalkboard-teacher"></i><span class="nav-text">Tinjau Permohonan</span></a></li>
                      -->
                        <li class="nav-item"><a class="nav-link" target="_blank"href="<?= base_url("sertifikasi/get_invoice/".encrypt_url($row['NIB']).'/'.encrypt_url($row['tgl_permohonan'])) ;?>"><i class="nav-icon la la-leaf"></i><span class="nav-text">Lihat Invoice</span></a></li>
                    </ul>
                      </div>
                  </div>
                  <!--
                  <a onclick="javascript:turun_status(this)" name="<?= $row['NIB'] ;?>" id="<?= $row['tgl_permohonan'] ;?>"  class="btn btn-sm btn-clean btn-icon" title="Turun Status">
                    <i class="la la-arrow-circle-down"></i>
                  </a>
                  <a onclick="javascript:tolak(this)" name="<?= $row['NIB'] ;?>" id="<?= $row['tgl_permohonan'] ;?>" data-toggle="modal" data-target="#modal_tolak" class="btn btn-sm btn-clean btn-icon" title="Tolak Permohonan">
                    <i class="la la-trash"></i>
                  </a>-->
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
								<i class="flaticon-file-1 text-danger"></i>
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
        <button type="submit" class="btn btn-danger mr-2">Submit</button>

        <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Close</button>
      </div>
        	<?php echo form_close() ;?>
    </div>
  </div>
</div>
<div class="modal fade" id="modal_input" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeXl" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">

			<div class="modal-body">
				<div class="card card-custom gutter-b">
					<div class="card-header">
						<div class="card-title">
							<span class="card-icon">
								<i class="flaticon-file-1 text-danger"></i>
							</span>
							<h3 class="card-label">Penjukan Asesor - Pemutus</h3>

						</div>
					</div>
          <div class="card-body">


          <div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">NIB <span class="text-danger"></span></label>
                <input type="text" id="nib" name="nib"readonly class="form-control" >
            </div>
            <div class="col-lg-6">
                <label class="control-label">Tgl Permohonan <span class="text-danger"></span></label>
                <input type="text"  id="tgl_permohonan" name="tgl_permohonan"readonly class="form-control">

              </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">Pilih Kualifikasi <span class="text-danger"></span></label>
                <select id="kualifikasi" onchange="getval(this)"  class="form-control" required="required">
                    <option value="">Pilih Kualifikasi</option>

                </select>
              </div>
              <div class="col-lg-6">
                  <label class="control-label"> Petunjuk Penunjukan Asesor : </label>
                  <span class="text-danger">"Penunjukan asesor berdasarkan kualifikasi permohonan untuk B dan M adalah 2 asesor, untuk K dan klasifikasi Spesialis 1 asesor"</span>
                </div>

          </div>

          <div class="table-responsive">
            <table class="table table-lg">
              <thead>
                <tr>
                  <th>Data</th>
                  <th>Nama Asesor</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Asesor 1</td>
                  <td>

                  <div class="form-group">

                    <div class="input-group file-caption-main">
                      <span class="file-caption-icon"></span>
                      <input type="text" id="asesor1" name="asesor1" class="form-control">
                      <div id="style1" style='display:none;'>
                        <select id="asesor11"  class="form-control">
                        </select>
                      </div>
                      <div id="style11" style='display:'';'>
                        <div class="form-control-feedback">
                          <i class="icon-search4 text-muted text-size-base"></i>
                        </div>
                      </div>
                    <div class="input-group-btn input-group-append">
                          <button type="submit"id="get_value" class="btn btn-danger btn-file"><i class="glyphicon glyphicon-folder-open"></i>&nbsp;  <span class="hidden-xs">Searching </span></button>
                          <button type="submit" id="get_value2" style='display:none;' class="btn btn-warning btn-file"><i class="glyphicon glyphicon-folder-open"></i>&nbsp;  <span class="hidden-xs">Back </span></button>



                        </div>
                    </div>

                  </div>
                  </td>

                </tr>
                <tr>
                  <td>Asesor 2</td>
                  <td>


                  <div class="form-group">

                    <div class="input-group file-caption-main">
                      <span class="file-caption-icon"></span>
                      <input type="text" id="asesor2" name="asesor1" class="form-control">
                      <div id="style2" style='display:none;'>
                        <select id="asesor22"  class="form-control">
                        </select>
                      </div>
                      <div id="style22" style='display:'';'>
                        <div class="form-control-feedback">
                          <i class="icon-search4 text-muted text-size-base"></i>
                        </div>
                      </div>
                    <div class="input-group-btn input-group-append">
                          <button type="submit"id="get_values" class="btn btn-danger btn-file"><i class="glyphicon glyphicon-folder-open"></i>&nbsp;  <span class="hidden-xs">Searching </span></button>
                          <button type="submit" id="get_values2" style='display:none;' class="btn btn-warning btn-file"><i class="glyphicon glyphicon-folder-open"></i>&nbsp;  <span class="hidden-xs">Back </span></button>



                        </div>
                    </div>

                  </div>

                 </td>
                </tr>
               
               
             




              </tbody>
            </table>
          </div>
          </div>
          <div class="modal-footer">
            <button type="button" style='display:none;' class="btn btn-dark btn-ladda btn-ladda-spinner" id="send" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Kirim Email Surat Tugas</span></button>

            <button type="button" class="btn btn-danger btn-ladda btn-ladda-spinner" id="delete" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Delete Asesor 1</span></button>
            <button type="button" class="btn btn-danger btn-ladda btn-ladda-spinner" id="delete2" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Delete Asesor 2</span></button>
            <a href="<?php echo base_url('sertifikasi/surat_tugas_pemutus/') ;?>" target="_blank" style='display:none;' id="submit_pemutus" type="button" name="submit" class="btn btn-info btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Surat Tugas Pemutus</span></a>

            <a href="<?php echo base_url('sertifikasi/surat_tugas/') ;?>" target="_blank" style='display:none;' id="submit2" type="button" name="submit" class="btn btn-info btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Surat Tugas Asesor</span></a>
            <button type="button" class="btn btn-danger btn-ladda btn-ladda-spinner" id="submit" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Simpan</span></button>
            <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross"></i> Close</button>
          </div>
        </div>
      </div>
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

<script>
function refresh() {
        window .location.reload();
    }
function turun_status(sel) {
  Swal.fire({
        title: "Apa anda yakin akan menurunkan status?",
        text: "Setelah diturunkan permohonan akan dilakukan verifikasi kembali!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "YA, Turunkan Status!",
        cancelButtonText: "No, Batalkan!",
        reverseButtons: true
    }).then(function(result) {
        if (result.value) {
          $.ajax({
              url : "<?php echo base_url('sertifikasi/turun_status_penunjukan'); ?>",
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

$("#get_value").click(function () {
var nama_asesor=document.querySelector('#asesor1').value;

$.ajax({
    url : "<?php echo base_url('sertifikasi/pilih_asesor'); ?>",
    type : "POST",
    data : {nama : nama_asesor,},
    success : function(data) {

      response = jQuery.parseJSON(data);
      document.querySelector('#asesor1').type='hidden';
      document.querySelector('#style1').style.display='';
      document.querySelector('#style11').style.display='none';
      document.querySelector('#get_value').style.display='none';
      document.querySelector('#get_value2').style.display='';
      console.log( JSON.parse(data) );
      id_asesor=response.record;

      $.each(id_asesor, function(i, option) {
        var $option = $("<option>", {text:option.Nama+' - '+option.nama_propinsi, value: option.Username});
        $option.appendTo(".modal-body #asesor11");

      });
      if(id_asesor.length>0){
        toastr["info"]("Asesor Ditemukan", "Notification");

      }else{
        toastr["warning"]("Asesor Tidak Ditemukan", "Notification");

      }

      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
  });
});

$("#get_value2").click(function () {
document.querySelector('#asesor1').type='text';
document.querySelector('#style1').style.display='none';
document.querySelector('#style11').style.display='';
document.querySelector('#get_value').style.display='';
document.querySelector('#get_value2').style.display='none';
document.getElementById("asesor11").options.length = 0;

});
</script>

<!-- Asesor 2-->

<script>
$("#get_values").click(function () {
var nama_asesor=document.querySelector('#asesor2').value;

$.ajax({
    url : "<?php echo base_url('sertifikasi/pilih_asesor'); ?>",
    type : "POST",
    data : {nama : nama_asesor,},
    success : function(data) {

      response = jQuery.parseJSON(data);
      document.querySelector('#asesor2').type='hidden';
      document.querySelector('#style2').style.display='';
      document.querySelector('#style22').style.display='none';
      document.querySelector('#get_values').style.display='none';
      document.querySelector('#get_values2').style.display='';
      console.log( JSON.parse(data) );
      id_asesor=response.record;

      $.each(id_asesor, function(i, option) {
        var $option = $("<option>", {text: option.Nama+' - '+option.nama_propinsi, value: option.Username});
        $option.appendTo(".modal-body #asesor22");
      });
      if(id_asesor.length>0){

          toastr["info"]("Asesor Ditemukan", "Notification");
      }else{
        toastr["warning"]("Asesor Tidak Ditemukan", "Notification");

      }
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
  });
});

$("#get_values2").click(function () {
document.querySelector('#asesor2').type='text';
document.querySelector('#style2').style.display='none';
document.querySelector('#style22').style.display='';
document.querySelector('#get_values').style.display='';
document.querySelector('#get_values2').style.display='none';
document.getElementById("asesor22").options.length = 0;
});
</script>

<script type="text/javascript">
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
            document.getElementById('timeline').innerHTML += '<div class="timeline-item"><div class="timeline-media"><i class="flaticon2-notification fl text-danger"></i></div><div class="timeline-content"><div class="d-flex align-items-center justify-content-between mb-3"><div class="mr-2"><a  class="text-danger-75 text-hover-danger font-weight-bold">'+arr[counter].upload_deskripsi+'</a><span class="text-muted ml-2">'+arr[counter].tgl_record+'</span><span class="label label-light-danger font-weight-bolder label-inline ml-2">Sudah Diperbaiki</span></div></div><p class="p-0">'+arr[counter].ket+'</p></div></div>';

          }else{
            document.getElementById('timeline').innerHTML += '<div class="timeline-item"><div class="timeline-media"><i class="flaticon2-notification fl text-danger"></i></div><div class="timeline-content"><div class="d-flex align-items-center justify-content-between mb-3"><div class="mr-2"><a  class="text-danger-75 text-hover-danger font-weight-bold">'+arr[counter].upload_deskripsi+'</a><span class="text-muted ml-2">'+arr[counter].tgl_record+'</span><span class="label label-light-danger font-weight-bolder label-inline ml-2">Belum Diperbaiki</span></div></div><p class="p-0">'+arr[counter].ket+'</p></div></div>';

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
$("#send").click(function () {
  Swal.fire({
     title: "Mohon Tunggu!",
     text: "Sedang Berjalan",
     onOpen: function() {
         Swal.showLoading();

     }
 });
 var cek1=document.querySelector('#asesor1').value;
 if(cek1!=''){
   var asesor1_value=document.querySelector('#asesor11').value;
 }else{
   var asesor1_value='';
 }
 $.ajax({
     url : "<?php echo base_url('sertifikasi/send_email_penunjukan'); ?>",
     type : "POST",
     data : {data : asesor1_value},
     success : function(data) {
       response = jQuery.parseJSON(data);

       if(response.result==1){
         Swal.fire({

             icon: "success",
             title: "Berhasil mengirim surat tugas",
             showConfirmButton: false,
             timer: 1500
         });
       }else{
         Swal.fire({

             icon: "error",
             title: "Gagal mengirim surat tugas",
             showConfirmButton: false,
             timer: 1500
         });
       }
       window.setInterval('refresh()', 1500);


       },
       error: function(xhr, status, error) {
         var err = eval("(" + xhr.responseText + ")");
         alert(err.Message);
       }
   });
});
$("#delete").click(function () {
  var nama_asesor=document.querySelector('#delete').value;;
  $.ajax({
      url : "<?php echo base_url('sertifikasi/delete_penunjukan_bu'); ?>",
      type : "POST",
      data : {nama : nama_asesor,},
      success : function(data) {

        response = jQuery.parseJSON(data);
        if(response.status=='Success'){
          toastr["info"]("Penunjukan Telah di hapus", "Notification");

          document.querySelector('#asesor1').value='';


          document.querySelector('#asesor11').removeAttribute('disabled');
          document.querySelector('#get_value2').removeAttribute('disabled');

          document.querySelector('#submit').style.display='';
          document.querySelector('#submit2').style.display='none';
          document.querySelector('#submit_pemutus').style.display='none';
          document.querySelector('#send').style.display='none';
          document.querySelector('#delete').style.display='none';

          document.querySelector('#asesor1').removeAttribute('disabled');
          document.querySelector('#get_value').removeAttribute('disabled');





          document.querySelector('#asesor1').type='text';
          document.querySelector('#style1').style.display='none';
          document.querySelector('#style11').style.display='';
          document.querySelector('#get_value').style.display='';
          document.querySelector('#get_value2').style.display='none';
          document.getElementById("asesor11").options.length = 0;




        }

        },
        error: function(xhr, status, error) {
          var err = eval("(" + xhr.responseText + ")");
          alert(err.Message);
        }
    });
});
$("#delete2").click(function () {
  var nama_asesor=document.querySelector('#delete2').value;;
  $.ajax({
      url : "<?php echo base_url('sertifikasi/delete_penunjukan_bu'); ?>",
      type : "POST",
      data : {nama : nama_asesor,},
      success : function(data) {

        response = jQuery.parseJSON(data);
        if(response.status=='Success'){
          toastr["info"]("Penunjukan Telah di hapus", "Notification");


          document.querySelector('#asesor2').value='';


          document.querySelector('#asesor22').removeAttribute('disabled');
          document.querySelector('#get_values2').removeAttribute('disabled');
          document.querySelector('#submit').style.display='';
          document.querySelector('#submit2').style.display='none';
          document.querySelector('#submit_pemutus').style.display='none';
          document.querySelector('#send').style.display='none';
          document.querySelector('#delete2').style.display='none';


          document.querySelector('#asesor2').removeAttribute('disabled');
          document.querySelector('#get_values').removeAttribute('disabled');





          document.querySelector('#asesor2').type='text';
          document.querySelector('#style2').style.display='none';
          document.querySelector('#style22').style.display='';
          document.querySelector('#get_values').style.display='';
          document.querySelector('#get_values2').style.display='none';
          document.getElementById("asesor22").options.length = 0;



        }

        },
        error: function(xhr, status, error) {
          var err = eval("(" + xhr.responseText + ")");
          alert(err.Message);
        }
    });
});




$("#submit").click(function () {
  var cek1=document.querySelector('#asesor1').value;
  if(cek1!=''){
    var asesor1_value=document.querySelector('#asesor11').value;
  }else{
    var asesor1_value='';
  }
  var cek2=document.querySelector('#asesor2').value;
  if(cek2!=''){
    var asesor2_value=document.querySelector('#asesor22').value;
  }else{
    var asesor2_value='';
  }

  var cek11=document.querySelector('#asesor11').value;
  var cek22=document.querySelector('#asesor22').value;
  var counter1=0;
  var counter2=0;
  var status_value=$('#kualifikasi').val();

  console.log(cek11);
  console.log(cek22);
  $.ajax({
      url : "<?php echo base_url('sertifikasi/insert_penunjukan'); ?>",
      type : "POST",
      data : {asesor1 : asesor1_value,
              asesor2 : asesor2_value,
              status : status_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
        record=response.record;
       // console.log( JSON.parse(data) );

        if(record!=''){
          if(asesor1_value!=''){
            document.getElementById('get_value2').disabled = true;
            document.getElementById('asesor11').disabled = true;
            document.querySelector('#asesor1').value='';
            counter1=1;

            toastr["success"]("Asesor 1 Berhasil Ditunjuk", "Notification");
            document.querySelector('#delete').style.display='';
          }
          if(asesor2_value!=''){
            document.getElementById('get_values2').disabled = true;
            document.getElementById('asesor22').disabled = true;
            document.querySelector('#asesor2').value='';
            document.querySelector('#delete2').style.display='';
            counter2=1;

            toastr["success"]("Asesor 2 Berhasil Ditunjuk", "Notification");
          }

        
            document.querySelector('#delete2').style.display='';
            document.querySelector('#delete').style.display='';
            document.querySelector('#submit').style.display='none';
            document.querySelector('#submit2').style.display='';
            document.querySelector('#submit_pemutus').style.display='';
             
            document.querySelector('#send').style.display='';
          

        }else{

        }


        },
        error: function(xhr, status, error) {
          var err = eval("(" + xhr.responseText + ")");
          alert(err.Message);
        }
    });



});


</script>
<script type="text/javascript">
function getval(sel)
{
  document.querySelector('#delete').style.display='none';
  document.querySelector('#delete2').style.display='none';
  if(sel.value=="1"){
    document.querySelector('#asesor1').value='';
    document.querySelector('#asesor2').value='';
    document.querySelector('#asesor1').removeAttribute('disabled');
    document.querySelector('#get_value').removeAttribute('disabled');
    document.querySelector('#asesor2').removeAttribute('disabled');
    document.querySelector('#get_values').removeAttribute('disabled');
    document.querySelector('#submit').style.display='';
    document.querySelector('#submit2').style.display='none';
    document.querySelector('#submit_pemutus').style.display='none';
    
    document.querySelector('#send').style.display='none';
    //kunci asesor 2

    document.getElementById('asesor2').disabled = true;
    document.getElementById('get_values').disabled = true;


    document.querySelector('#asesor1').type='text';
    document.querySelector('#style1').style.display='none';
    document.querySelector('#style11').style.display='';
    document.querySelector('#get_value').style.display='';
    document.querySelector('#get_value2').style.display='none';
    document.getElementById("asesor11").options.length = 0;

    document.querySelector('#asesor2').type='text';
    document.querySelector('#style2').style.display='none';
    document.querySelector('#style22').style.display='';
    document.querySelector('#get_values').style.display='';
    document.querySelector('#get_values2').style.display='none';
    document.getElementById("asesor22").options.length = 0;


    document.querySelector('#asesor11').removeAttribute('disabled');
    document.querySelector('#get_value2').removeAttribute('disabled');
    document.querySelector('#asesor22').removeAttribute('disabled');
    document.querySelector('#get_values2').removeAttribute('disabled');
  }else{
    document.querySelector('#asesor1').value='';
    document.querySelector('#asesor2').value='';
    document.querySelector('#asesor1').removeAttribute('disabled');
    document.querySelector('#get_value').removeAttribute('disabled');
    document.querySelector('#asesor2').removeAttribute('disabled');
    document.querySelector('#get_values').removeAttribute('disabled');
    document.querySelector('#submit').style.display='';
    document.querySelector('#submit2').style.display='none';
    document.querySelector('#submit_pemutus').style.display='none';
     
    document.querySelector('#send').style.display='none';
    document.querySelector('#asesor1').type='text';
    document.querySelector('#style1').style.display='none';
    document.querySelector('#style11').style.display='';
    document.querySelector('#get_value').style.display='';
    document.querySelector('#get_value2').style.display='none';
    document.getElementById("asesor11").options.length = 0;

    document.querySelector('#asesor2').type='text';
    document.querySelector('#style2').style.display='none';
    document.querySelector('#style22').style.display='';
    document.querySelector('#get_values').style.display='';
    document.querySelector('#get_values2').style.display='none';
    document.getElementById("asesor22").options.length = 0;

    document.querySelector('#asesor11').removeAttribute('disabled');
    document.querySelector('#get_value2').removeAttribute('disabled');
    document.querySelector('#asesor22').removeAttribute('disabled');
    document.querySelector('#get_values2').removeAttribute('disabled');
    }

  var sub=document.getElementById("nib").value;
  var value=document.getElementById("tgl_permohonan").value;
  var status=sel.value;

  $.ajax({
      url : "<?php echo base_url('sertifikasi/cek_asesor_penunjukan'); ?>",
      type : "POST",
      data : {nib : sub,
              tgl_permohonan : value,
              kualifikasi:status},
      success : function(data) {
        response = jQuery.parseJSON(data);
        record=response.record;
        record2=response.record2;
        if(sel.value=="2"){
          if(record.length==1){
            if(record[0].Tgl_penilaian==''){
              document.querySelector('#delete').style.display='';
              var val=' - [ Belum Menilai ]';
            }else{
              if(record[0].hasil_akhir=='1'){

                var val=' - [ '+record[0].tgl_penilaian+' ] - '+'[ Diterima ]';
              }else if(record[0].hasil_akhir=='0'){
                var val=' - [ '+record[0].tgl_penilaian+' ] - '+'[ Ditolak ]';
              }else{
                document.querySelector('#delete').style.display='';
                var val=' - [ Belum Menilai ]';
              }
            }
            $("#asesor1").val(record[0].Nama+val);
            $("#delete").val(record[0].Username);
            document.getElementById('asesor1').disabled = true;
            document.getElementById('get_value').disabled = true;
            document.querySelector('#asesor2').removeAttribute('disabled');
            document.querySelector('#get_values').removeAttribute('disabled');
            document.querySelector('#submit').style.display='';
            document.querySelector('#submit2').style.display='none';
            document.querySelector('#submit_pemutus').style.display='none';
            
            document.querySelector('#send').style.display='none';
          }else if(record.length==2){
            if(record[0].tgl_penilaian==''){
              document.querySelector('#delete').style.display='';
              document.querySelector('#delete2').style.display='';
              var val=' - [ Belum Menilai ]';
            }else{
              if(record[0].hasil_akhir=='1'){
                var val=' - [ '+record[0].tgl_penilaian+' ] - '+'[ Diterima ]';
              }else if(record[0].hasil_akhir=='0'){
                var val=' - [ '+record[0].tgl_penilaian+' ] - '+'[ Ditolak ]';
              }else{
                document.querySelector('#delete').style.display='';
                document.querySelector('#delete2').style.display='';
                var val=' - [ Belum Menilai ]';
              }
            }

            if(record[1].tgl_penilaian==''){
              document.querySelector('#delete').style.display='';
              document.querySelector('#delete2').style.display='';
              var val2=' - [ Belum Menilai ]';
            }else{
              if(record[1].hasil_akhir=='1'){
                var val2=' - [ '+record[1].tgl_penilaian+' ] - '+'[ Diterima ]';
              }else if(record[0].hasil_akhir=='0'){
                var val2=' - [ '+record[1].tgl_penilaian+' ] - '+'[ Ditolak ]';
              }else{
                document.querySelector('#delete').style.display='';
                document.querySelector('#delete2').style.display='';
                var val2=' - [ Belum Menilai ]';
              }
            }
            $("#asesor1").val(record[0].Nama+val);
            $("#asesor2").val(record[1].Nama+val2);
            $("#delete").val(record[0].Username);
            $("#delete2").val(record[1].Username);
            document.getElementById('asesor1').disabled = true;
            document.getElementById('get_value').disabled = true;
            document.getElementById('asesor2').disabled = true;
            document.getElementById('get_values').disabled = true;
            document.querySelector('#submit').style.display='none';
            document.querySelector('#submit2').style.display='';
            document.querySelector('#submit_pemutus').style.display='';
            
            document.querySelector('#send').style.display='';
          }else{
            if(record2.length!=0){
              document.querySelector('#asesor1').type='hidden';
              document.querySelector('#style1').style.display='';
              document.querySelector('#style11').style.display='none';
              document.querySelector('#get_value').style.display='none';
              document.querySelector('#get_value2').style.display='';
              console.log( JSON.parse(data) );
              id_asesor=response.record;

              $.each(record2, function(i, option) {
                $("#asesor1").val(option.Nama);
                var $option = $("<option>", {text:option.Nama+' - '+option.nama_propinsi, value: option.Username});
                $option.appendTo(".modal-body #asesor11");

              });
            }
          }

        }else{
          if(record.length==1){
            if(record[0].Tgl_penilaian==''){
              document.querySelector('#delete').style.display='';
              var val=' - [ Belum Menilai ]';
            }else{
              if(record[0].hasil_akhir=='1'){
                var val=' - [ '+record[0].tgl_penilaian+' ] - '+'[ Diterima ]';
              }else if(record[0].hasil_akhir=='0'){
                var val=' - [ '+record[0].tgl_penilaian+' ] - '+'[ Ditolak ]';
              }else{
                document.querySelector('#delete').style.display='';
                var val=' - [ Belum Menilai ]';
              }
            }
            $("#asesor1").val(record[0].Nama+val);
            $("#delete").val(record[0].Username);
            document.getElementById('asesor1').disabled = true;
            document.getElementById('get_value').disabled = true;
            document.querySelector('#submit').style.display='none';
            document.querySelector('#submit2').style.display='';
            document.querySelector('#submit_pemutus').style.display='';
            document.querySelector('#send').style.display='';
          }else{
            if(record2.length!=0){
              document.querySelector('#asesor1').type='hidden';
              document.querySelector('#style1').style.display='';
              document.querySelector('#style11').style.display='none';
              document.querySelector('#get_value').style.display='none';
              document.querySelector('#get_value2').style.display='';
              console.log( JSON.parse(data) );
              id_asesor=response.record;
              $("#asesor1").val(record2[0].Nama+val);
              $.each(record2, function(i, option) {
                var $option = $("<option>", {text:option.Nama+' - '+option.nama_propinsi, value: option.Username});
                $option.appendTo(".modal-body #asesor11");

              });
            }
            document.querySelector('#submit').style.display='';
            document.querySelector('#submit2').style.display='none';
            document.querySelector('#submit_pemutus').style.display='none';
            
            document.querySelector('#send').style.display='none';
          }
        }


        },
        error: function(xhr, status, error) {
          var err = eval("(" + xhr.responseText + ")");
          alert(err.Message);
        }
    });
}

	$("#penunjukan").click(function () {
		var oTable = $('#kt_datatable2').dataTable();
		var rowcollection = oTable.$(".call-checkbox:checked", {"page": "all"});
    document.getElementById("kualifikasi").options.length = 0;
		var value = [];
		var sub = [];
    var coba=[];
    var coba2=[];
    var coba3=[];
    var coba4=[];
    counter=0;
    counter1=0;
    document.querySelector('#asesor1').value='';
    document.querySelector('#asesor2').value='';

    document.querySelector('#asesor1').removeAttribute('disabled');
    document.querySelector('#get_value').removeAttribute('disabled');
    document.querySelector('#asesor2').removeAttribute('disabled');
    document.querySelector('#get_values').removeAttribute('disabled');
    document.querySelector('#submit').style.display='';
    document.querySelector('#delete').style.display='none';
    document.querySelector('#delete2').style.display='none';
    document.querySelector('#submit2').style.display='none';
    document.querySelector('#submit_pemutus').style.display='none';
    document.querySelector('#send').style.display='none';
		rowcollection.each(function(index,elem){

			sub = elem.name;
      value = elem.value;
      if(coba.length>0){
        if(coba[counter]!=sub){
          counter=counter+1;
          coba[counter]=sub;
          coba2[counter]="'"+sub+"'";
        }
      }else{
        coba[counter]=sub;
        coba2[counter]="'"+sub+"'";
      }
      if(coba3.length>0){
        if(coba3[counter1]!=value){
          counter1=counter1+1;
          coba3[counter1]=value;
          coba4[counter1]="'"+value+"'";
        }
      }else{
        coba3[counter1]=value;
        coba4[counter1]="'"+value+"'";
      }
		});
    $(".modal-body #nib").val(sub);
    $(".modal-body #tgl_permohonan").val(value);
    $.ajax({
        url : "<?php echo base_url('sertifikasi/get_kualifikasi'); ?>",
        type : "POST",
        data : {nib : sub,
                tgl_permohonan : value,},
        success : function(data) {

          response = jQuery.parseJSON(data);
          csrfHash = response.csrfHash;

          //console.log( JSON.parse(data) );
          kualifikasi=response.record;
          var $option2 = $("<option>", {text: 'Pilih Kualifikasi', value: '',selected:"selected"});
          $option2.appendTo("#kualifikasi");
          $.each(kualifikasi, function(i, option) {
            var $option = $("<option>", {text: option.kualifikasi, value: option.value});
            $option.appendTo("#kualifikasi");
          });
          },
          error: function(xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
          }
      });


	});
</script>

<script type="text/javascript">

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
  																window.location.replace("<?php echo base_url('sertifikasi/list_penunjukan_asesor');?>");
  															}
  															else {
  																window.location.replace("<?php echo base_url('sertifikasi/list_penunjukan_asesor');?>");

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
