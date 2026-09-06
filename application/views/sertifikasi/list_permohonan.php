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
							<a href="" class="text-muted">Tim Pemutus</a>
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
            <h3 class="card-label">Permohonan Tim Pemutus
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
                <th>Kualifikasi</th>
                <th>Tgl Permohonan</th>
                <th>Status_99</th>
                <th>Status_0</th>


                <th>File Pembayaran</th>
                <th>File Perjanjian</th>
                <th>File Asesor 1</th>
                <th>File Asesor 2</th>
                <th>File Berita Acara Penetapan</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php if(!empty($record)) :?>
              <?php foreach($record as $row) :?>
                <tr>
                  <td></td>

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
                  <td><?=$row['concat_klasifikasi'];?></td>
                  <td><?=$row['concat_sub'];?></td>
                  <td><?=$row['concat_kualifikasi'];?></td>
                  <td><?=$row['tgl_permohonan'];?></td>
                  <td><?=$row['status_0'];?></td>
                  <td><?=$row['status_1'];?></td>

                  <td><a href="<?= base_url('get_file/get_bu_49/'.$row['file_pembayaran']) ;?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>
                  <td><a href="<?= base_url('get_file/get_bu_perjanjian/'.$row['file_perjanjian']) ;?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>
                  <td><a href="<?=base_url('sertifikasi/cetak_asesor/'.encrypt_url($row['NIB']).'/'.encrypt_url($row['tgl_permohonan']).'/'.encrypt_url($row['asesor1']));?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>
                  <td><a href="<?=base_url('sertifikasi/cetak_asesor/'.encrypt_url($row['NIB']).'/'.encrypt_url($row['tgl_permohonan']).'/'.encrypt_url($row['asesor2']));?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>
                  <td><a href="<?=base_url('sertifikasi/berita_acara/'.encrypt_url($row['NIB']).'/'.encrypt_url($row['tgl_permohonan']));?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>

                  <td>
                    <div class="dropdown dropdown-inline">
                      <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">
                                        <i class="la la-cog"></i>
                                    </a>
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <ul class="nav nav-hoverable flex-column">
                          <li class="nav-item"><a class="nav-link" target="_blank" href="<?= base_url("sertifikasi/tinjau_permohonan/".encrypt_url($row['NIB']).'/'.encrypt_url($row['tgl_permohonan'])) ;?>"><i class="nav-icon la la-chalkboard-teacher"></i><span class="nav-text">Tinjau Permohonan</span></a></li>
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
<script>

function refresh() {
        window .location.reload();
    }
function turun_status(sel) {
  Swal.fire({
        title: "Apa anda yakin akan menurunkan status?",
        text: "Setelah diturunkan permohonan akan dilakukan penunjukan dan penilaian asesor ulang!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "YA, Turunkan Status!",
        cancelButtonText: "No, Batalkan!",
        reverseButtons: true
    }).then(function(result) {
        if (result.value) {
          $.ajax({
              url : "<?php echo base_url('sertifikasi/turun_status_berita_acara'); ?>",
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
