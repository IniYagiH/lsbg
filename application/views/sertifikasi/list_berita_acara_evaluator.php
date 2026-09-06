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
					<h2 class="d-flex align-items-center text-dark font-weight-bold my-1 mr-3">Sertifikasi</h2>
					<!--end::Page Title-->
					<!--begin::Breadcrumb-->
					<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
						<li class="breadcrumb-item text-muted">
							<a href="" class="text-muted">Pelaksana</a>
						</li>
						<li class="breadcrumb-item text-muted">
							<a href="" class="text-muted">Evaluator Asesor</a>
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
            <h3 class="card-label">Permohonan Evaluator Asesor
            <span class="d-block text-muted pt-2 font-size-sm">Daftar Keseluruhan Permohonan Tim Pemutus</span></h3>
          </div>
          <div class="card-toolbar">
          
          </div>
        </div>
        <div class="card-body">

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
                <th>Penilaian</th>
                <th>Kualifikasi</th>
                <th>Tgl Permohonan</th>
                <th>Tgl_Status_31</th>

                <th>Daftar Asesor</th>
                <th>File Pembayaran</th>
                <th>File Perjanjian</th>
                <th>File Asesor</th>
         
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php if(!empty($record)) :?>
              <?php foreach($record as $row) :?>
              <tr>
                <td></td>
              
                <td><?=$row['nama'];?></td>
                <td><?=$row['NIB'];?></td>
                <td><?=$row['concat_klasifikasi'];?></td>
                <td><?=$row['concat_sub'];?></td>
                 <td><?=$row['concat_sub_penilaian'];?></td>
                <td><?=$row['concat_kualifikasi'];?></td>
                <td><?=$row['tgl_permohonan'];?></td>
                <td><?=$row['tgl_biaya'];?></td>
                <td><?=$row['asesor'];?></td>
                <td><a href="<?= base_url('get_file/get_bu_49/'.$row['file_pembayaran']) ;?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>
                <td><a href="<?= base_url('get_file/get_bu_perjanjian/'.$row['file_perjanjian']) ;?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>
                <!-- <td><a href="<?=base_url('sertifikasi/penilaian_asesor_new/'.encrypt_url($row['NIB']).'/'.encrypt_url($row['tgl_permohonan']));?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td> -->
                <td>
                 <?php $data=$row['concat_sub'];
                  $array = explode(",", $data);
                  $array = array_map('trim', $array);
                   ;?>
                    <?php foreach($array as $row_sub) :?>
                 <a href="<?=base_url('sertifikasi/pelaporan_penilaian_lpjk/'.encrypt_url($row['NIB']).'/'.encrypt_url($row_sub).'/'.encrypt_url($row['asesor1']));?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i><?=$row_sub;?></a>
                <?php endforeach ;?>

                </td>
                <td>
                  <div class="dropdown dropdown-inline">
                    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">
                                      <i class="la la-cog"></i>
                                  </a>
                      <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                      <ul class="nav nav-hoverable flex-column">
                      <li class="nav-item"><a class="nav-link" target="_blank" href="<?= base_url("sertifikasi/form_fthep_evaluasi/".encrypt_url($row['NIB']).'/'.encrypt_url($row['tgl_permohonan'])) ;?>"><i class="nav-icon la la-chalkboard-teacher"></i><span class="nav-text">Form FTHEP Evaluasi</span></a></li>

                      <li class="nav-item"><a class="btn nav-link" id="<?=$row['NIB'];?>" name="<?=$row['tgl_permohonan'];?>" onclick="javascript:verifikasi_pembayaran(this)"><i class="nav-icon la la-file-invoice-dollar"></i><span class="nav-text-left">Kirim ke pemutus</span></a></li>                    </ul>
                       
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
								<i class="flaticon-file-1 text-danger"></i>
							</span>
							<h3 class="card-label"><span class="text-danger">Tolak Permohonan</span></h3>
						</div>
					</div>
					<?php echo form_open_multipart('sertifikasi/tolak_permohonan/', 'class="form-horizontal form-validate-jquery" id="form-upload-2"');?>

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

<div class="modal fade" id="modal_proses" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeXl" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">

			<div class="modal-body">
				<div class="card card-custom gutter-b">
					<div class="card-header">
						<div class="card-title">
							<span class="card-icon">
								<i class="flaticon-file-1 text-danger"></i>
							</span>
							<h3 class="card-label">Tim Pemutus</h3>

						</div>
					</div>
          <?php echo form_open_multipart('sertifikasi/insert_pemutus/', 'class="form-horizontal form-validate-jquery" id="form-upload-1x"');?>

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
            <div class="col-lg-4">
                <label class="control-label">Pemutus 1 <span class="text-danger"></span></label>
                <input type="text"  id="teknis_1" name="teknis_1" class="form-control" placeholder="Nama...">

            </div>
            <div class="col-lg-4">
                <label class="control-label">Pemutus 2 <span class="text-danger"></span></label>
                <input type="text"  id="teknis_2" name="teknis_2" class="form-control" placeholder="Nama...">

            </div>
            <div class="col-lg-4">
                <label class="control-label">Pemutus 3 <span class="text-danger"></span></label>
                <input type="text"  id="teknis_3" name="teknis_3" class="form-control" placeholder="Nama...">

            </div>

          </div>
          <div class="table-responsive">


            <table class="table table-lg" id="pemutus">
              <thead>
                <tr>
                  <th>Sub Klasifikasi</th>
                  <th>Keputusan</th>
                  <th>Pemenuhan Peralatan</th>
                  <th>Pemenuhan Penjualan Tahunan</th>
                  <th>Pemenuhan SMM</th>
                  <th>Pemenuhan SMAP</th>
                </tr>
              </thead>
              <tbody>

              </tbody>
            </table>
          </div>


          </div>
          <div class="modal-footer">

            <button type="submit" class="btn btn-danger btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
            <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross"></i> Close</button>
          </div>
          <?php echo form_close() ;?>

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
<script type="text/javascript">
  	var submitCounter = 0;
  	$(function () {

  		var uploadURI = $('#form-upload-1x').attr('action');



  		$("form#form-upload-1x").submit(function () {
        var result_hasil=$("#keputusan").val();

          var confirm="Yakin keputusan sudah benar?";
          var clas="info";


        var formData = new FormData($(this)[0]);
  			event.preventDefault();
        Swal.fire({
          text: confirm,
          icon: clas,
          showCancelButton: true,
          buttonsStyling: false,
          confirmButtonText: "Ya!",
          cancelButtonText: "Tidak, batalkan",
          customClass: {
            confirmButton: "btn font-weight-bold btn-dark",
            cancelButton: "btn font-weight-bold btn-default"
          }
        }).then(function (result) {
          if (result.value) {
            Swal.fire({
               title: "Mohon Tunggu!",
               text: "Sedang Berjalan",
               onOpen: function() {
                   Swal.showLoading();

               }
           });
            jQuery.ajax({
            url : uploadURI,
            type : "POST",
            data : formData,
            processData: false,
            contentType: false,
              success : function(data) {
                console.log(response);
              var response = jQuery.parseJSON(data);

              Swal.fire({
                text: "Data Berhasil Di Submit",
                icon: "success",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                  confirmButton: "btn font-weight-bold btn-dark",
                }
              });
              window.open("<?= base_url('sertifikasi/cetak_tim_pemutus')?>", '_blank');
            },
            error: function(xhr, status, error) {
              var err = eval("(" + xhr.responseText + ")");
              alert(err.Message);
            }
          });

          } else if (result.dismiss === 'cancel') {
            Swal.fire({
              text: "Your form has not been submitted!.",
              icon: "error",
              buttonsStyling: false,
              confirmButtonText: "Ok, got it!",
              customClass: {
                confirmButton: "btn font-weight-bold btn-dark",
              }
            });
          }
        });


  								});

  	});
</script>
<script type="text/javascript">
function refresh() {
        window .location.reload();
    }
    function verifikasi_pembayaran(sel) {
      Swal.fire({
            title: "Anda ingin mengirim permohonan ke pemutus permohonan dengan NIB "+sel.id+" ?",
            text: "Proses akan mengirim permohonan ke pemutus untuk dilakukan pemutusan",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "YA !",
            cancelButtonText: "No, Batalkan!",
            reverseButtons: true
        }).then(function(result) {
            if (result.value) {
    					Swal.fire({
    						 title: "Mohon Tunggu!",
    						 text: "Sedang Berjalan",
    						 onOpen: function() {
    								 Swal.showLoading();

    						 }
    				 });
              $.ajax({
                  url : "<?php echo base_url('sertifikasi/verifikasi_pemutus'); ?>",
                  type : "POST",
                  data : {nib : sel.id,
                          tgl_permohonan : sel.name},
                  success : function(data) {
                    response = jQuery.parseJSON(data);
                    console.log(response);
                    if(response.result==1){
    									Swal.fire({

    				              icon: "success",
    				              title: "Berhasil mengirim ke pemutus",
    				              showConfirmButton: false,
    				              timer: 1500
    				          });
    								}else{
    									Swal.fire({

    				              icon: "error",
    				              title: "Berhasil mengirim ke pemutus!",
    				              showConfirmButton: false,
    				              timer: 1500
    				          });
    								}
                    window.location.reload();
                    },
                    error: function(xhr, status, error) {
                      var err = eval("(" + xhr.responseText + ")");
                      alert(err.Message);
                    }
                });


            } else if (result.dismiss === "cancel") {
                Swal.fire(
                    "Cancelled",
                    "Pembayaran Batal Diverifikasi :)",
                    "error"
                )
            }
        });
    }
function tolak(sel) {
  $("#nib_tolak").val(sel.name);
  $("#tgl_permohonan_tolak").val(sel.id);
}
$("#proses_data").click(function () {
  var oTable = $('#kt_datatable2').dataTable();
  var rowcollection = oTable.$(".call-checkbox:checked", {"page": "all"});
  var value = [];
  var sub = [];
  var coba=[];
  var coba2=[];
  var coba3=[];
  var coba4=[];
  counter=0;
  counter1=0;
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
    $(".modal-body #nib").val(sub);
    $(".modal-body #tgl_permohonan").val(value);
    jQuery.ajax({
      url : "<?= base_url('sertifikasi/get_subklasi')?>",
      type : "POST",
      data : {nib:sub,
        tgl_permohonan:value},
        success : function(data) {
        response = jQuery.parseJSON(data);
        var array=response.record;
        var table = document.getElementById("pemutus");
        var counter=1;
        while(table.rows.length > 1) {
        table.deleteRow(1);
      }
        if(typeof array != "undefined" && array != null && array.length != null && array.length > 0){
          array.forEach(function(element) {
            var row = table.insertRow(counter);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            var cell4 = row.insertCell(3);
            var cell5 = row.insertCell(4);
            var cell6 = row.insertCell(5);
            counter+=1;
            cell1.innerHTML = element.id_sub_klasifikasi;
            cell2.innerHTML = '<select name="result'+element.id_sub_klasifikasi+'" class="form-control" required="required"><option value="1">Disetujui</option><option value="0">Ditolak</option></select>';
            cell3.innerHTML = '<select name="peralatan'+element.id_sub_klasifikasi+'" class="form-control" required="required"><option value="1">Terpenuhi</option><option value="0">Belum Terpenuhi</option></select>';
            cell4.innerHTML = '<select name="penjualan_tahunan'+element.id_sub_klasifikasi+'" class="form-control" required="required"><option value="1">Terpenuhi</option><option value="0">Belum Terpenuhi</option></select>';
            cell5.innerHTML = '<select name="smm'+element.id_sub_klasifikasi+'" class="form-control" required="required"><option value="1">Terpenuhi</option><option value="0">Belum Terpenuhi</option></select>';
            cell6.innerHTML = '<select name="smap'+element.id_sub_klasifikasi+'" class="form-control" required="required"><option value="1">Terpenuhi</option><option value="0">Belum Terpenuhi</option></select>';

          });
        }
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  });

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
            document.getElementById('timeline').innerHTML += '<div class="timeline-item"><div class="timeline-media"><i class="flaticon2-notification fl text-danger"></i></div><div class="timeline-content"><div class="d-flex align-items-center justify-content-between mb-3"><div class="mr-2"><a  class="text-dark-75 text-hover-danger font-weight-bold">'+arr[counter].upload_deskripsi+'</a><span class="text-muted ml-2">'+arr[counter].tgl_record+'</span><span class="label label-light-danger font-weight-bolder label-inline ml-2">Sudah Diperbaiki</span></div></div><p class="p-0">'+arr[counter].ket+'</p></div></div>';

          }else{
            document.getElementById('timeline').innerHTML += '<div class="timeline-item"><div class="timeline-media"><i class="flaticon2-notification fl text-danger"></i></div><div class="timeline-content"><div class="d-flex align-items-center justify-content-between mb-3"><div class="mr-2"><a  class="text-dark-75 text-hover-danger font-weight-bold">'+arr[counter].upload_deskripsi+'</a><span class="text-muted ml-2">'+arr[counter].tgl_record+'</span><span class="label label-light-danger font-weight-bolder label-inline ml-2">Belum Diperbaiki</span></div></div><p class="p-0">'+arr[counter].ket+'</p></div></div>';

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
  		var uploadURI = $('#form-upload-2').attr('action');
  		var progressBar = $('#progress-bar-1');

  		$("form#form-upload-2").submit(function () {

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
  																window.location.replace("<?php echo base_url('sertifikasi/list_berita_acara');?>");
  															}
  															else {
  																window.location.replace("<?php echo base_url('sertifikasi/list_berita_acara');?>");

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
