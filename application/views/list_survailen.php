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
							<a href="" class="text-dark">List Survailen</a>
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
            <h3 class="card-label">List Pemanatau Survailen
            <span class="d-block text-muted pt-2 font-size-sm">Daftar Keseluruhan Permohonan Untuk Dilakukan Survailen</span></h3>
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
                <th>NIB</th>
                <th>Nama BU</th>
                <th>Alamat_Badan_Usaha</th>
                <th>Propinsi</th>
                <th>ID Izin</th>
                
                <th>Sub Klasifikasi-Kualifikasi</th>
                <th>Status</th>
                <th>Asesor</th>
                <th>Email</th>
                <th>NPWP</th>
             
                <th>Asosiasi</th>
                <th>Nomor KBLI</th>
                <th>Telepon</th>
                <th>Tgl Terbit</th>
                <th>Tunjuk Asesor</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php if(!empty($record)) :?>
              <?php foreach($record as $row) :?>
              <tr>
                <td></td>
                <td>
                  
                    <?=$row['NIB'];?>
                 
                </td>
                <td>
                <?=$row['nama'];?>
                </td>
                <td><?=$row['alamat'];?></td>
                <td><?=$row['propinsi'];?></td>
                <td><?=$row['id_izin'];?></td>
                <td><?=$row['sub_klasifikasi']."-".$row['kualifikasi'];?></td>
                <td><span class="label label-danger label-pill label-inline mr-2">Bekum_Mengajukan</span></td>
                <td><?php if($row['asesor1']!=''){
                  echo $row['asesor1'].", ".$row['asesor2'];
                }?>
                  </td>
                <td><?=$row['email'];?></td>
                <td><?=$row['npwp'];?></td>
                
                <td><?=$row['nama_asosiasi'];?></td>
                <td><?=$row['nomor_kbli'];?></td>
                <td><?=$row['telepon'];?></td>
                <td><?=$row['tgl_terbit'];?></td>
                <td>

                  <a id="<?=$row['kualifikasi'];?>" name="<?=$row['id_izin'];?>"  onclick="javascript:get_permohonan_detail(this)" class="btn btn-icon btn-light-success pulse pulse-primary mr-5">
                      <i class="flaticon2-paper-plane"></i>
                      <span class="pulse-ring"></span>
                  </a>

                </td>
                <td>
                  
                  <a onclick="javascript:upload(this)" name="<?= $row['id_izin'] ;?>" id="<?= $row['tgl_permohonan'] ;?>" data-toggle="modal" data-target="#modal_upload" class="btn btn-sm btn-clean btn-icon" title="Upload Perjanjian">
                    <i class="la la-cloud-upload-alt"></i>
                  </a>

    							</a>
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
<div class="modal fade" id="modal_upload" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeLg" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">


			<div class="modal-body" >
        <div class="card card-custom gutter-b">
					<div class="card-header">
						<div class="card-title">
							<span class="card-icon">
								<i class="flaticon-file-1 text-dark"></i>
							</span>
							<h3 class="card-label"><span class="text-dark">Upload Berkas Survailen</span></h3>
						</div>
					</div>
					<?php echo form_open_multipart('sertifikasi/upload_survailen/', 'class="form-horizontal form-validate-jquery" id="form-upload-2"');?>

          <hr>
        <div class="form-group row">
          
          <div class="col-lg-12">
              <label class="control-label">ID IZIN <span class="text-danger"></span></label>
              <input type="text"  id="id_izin2" name="id_izin"readonly class="form-control">

            </div>
        </div>

        <div class="form-group row">

          <div class="col-lg-12">
            <label class="control-label">Upload Berkas Survailen <span class="text-danger"></span></label>
            <input class="file-survailen" id="file_survailen" name="file_survailen" type="file" required="required" data-preview-file-type="text">
            <span class="help-block">
              Accepted formats: pdf, zip. Max file size 20Mb
            </span>
            <div class="progress" style="display:none;">
              <div id="progress-bar-2" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
                20%
              </div>
            </div>
          </div>

        </div>

        </div>

      </div>
      <div class="modal-footer">
        <button type="submit" id="submit" class="btn btn-dark mr-2">Submit</button>

        <button type="button" class="btn btn-light-dark font-weight-bold" data-dismiss="modal">Close</button>
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
							<h3 class="card-label">Penjukan Asesor</h3>

						</div>
					</div>
          <div class="card-body">


          <div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">ID IZIN <span class="text-danger"></span></label>
                <input type="text" id="id_izin" name="id_izin" readonly class="form-control" >
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

            <a href="<?php echo base_url('sertifikasi/surat_tugas/') ;?>" target="_blank" style='display:none;' id="submit2" type="button" name="submit" class="btn btn-info btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Surat Tugas</span></a>
            <button type="button" class="btn btn-danger btn-ladda btn-ladda-spinner" id="submit" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Simpan</span></button>
            <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross"></i> Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  function upload(sel) {
  $("#id_izin2").val(sel.name);
  }
function get_permohonan_detail(sel) {
  $("#id_izin").val(sel.name);
  document.querySelector('#delete').style.display='none';
  document.querySelector('#delete2').style.display='none';
console.log(sel.id);
  if(sel.id=="K" || sel.id=="Spesialis"){
    document.querySelector('#asesor1').value='';
    document.querySelector('#asesor2').value='';
    document.querySelector('#asesor1').removeAttribute('disabled');
    document.querySelector('#get_value').removeAttribute('disabled');
    document.querySelector('#asesor2').removeAttribute('disabled');
    document.querySelector('#get_values').removeAttribute('disabled');
    document.querySelector('#submit').style.display='';
    document.querySelector('#submit2').style.display='none';
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
  

  $('#modal_input').modal('show'); 
}    
</script>
<script>
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
  var id_izin_value=document.querySelector('#id_izin').value;
  $.ajax({
      url : "<?php echo base_url('dashboard/insert_penunjukan_survailen'); ?>",
      type : "POST",
      data : {asesor1 : asesor1_value,
              asesor2 : asesor2_value,
              id_izin : id_izin_value},
      success : function(data) {
        response = jQuery.parseJSON(data);
        record=response.record;
        console.log( JSON.parse(data) );

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

          if(cek11!='' && cek22!=''){
            document.querySelector('#delete2').style.display='';
            document.querySelector('#delete').style.display='';
            document.querySelector('#submit').style.display='none';
            document.querySelector('#submit2').style.display='';
            document.querySelector('#send').style.display='';
          }

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
function refresh() {
        window .location.reload();
    }
	$(".file-survailen").fileinput({
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
                                    window.setInterval('refresh()', 1500);  															}
  															else {
                                  window.setInterval('refresh()', 1500);
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