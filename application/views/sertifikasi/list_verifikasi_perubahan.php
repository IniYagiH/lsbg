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
              <a href="" class="text-muted">Tinjauan Permohonan Perubahan</a>
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
            <h3 class="card-label">Tinjauan Permohonan Perubahan
            <span class="d-block text-muted pt-2 font-size-sm">Daftar Keseluruhan Permohonan Untuk Dilakukan Tinjauan Permohonan</span></h3>
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
                <th>Permohonan</th>
                <th>Sub Klasifikasi</th>
                <th>Kualifikasi</th>
                <th>Tgl Permohonan</th>
                <th>Propinsi</th>
                <th>Asosiasi</th>
                <th>Status99</th>

                <th>Biaya</th>

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
                <td>
                  <a type="button" id="<?=$row['NIB'];?>" name="<?=$row['tgl_permohonan'];?>"class="pulse pulse-danger"><span class="label label-danger label-inline mr-2">Non_Asesment<span class="pulse-ring"></span> </span></a>



                </td>
                <td><?=$row['concat_sub'];?></td>
                <td><?=$row['concat_kualifikasi'];?></td>
                <?php if($row['count']=='1') :?>
                <td><?=$row['tgl_permohonan'];?></td>
                <?php else :?>
                <td><span class="label label-lg label-danger label-pill label-inline mr-2"><?=$row['tgl_permohonan'];?></span></td>
                <?php endif ;?>
                <td><?=$row['nama_propinsi'];?></td>
                <td><?=$row['nama_asosiasi'];?></td>
                <td><?=$row['status_0'];?></td>


                <td>Rp, <?= number_format(($row['biaya_lsbu']*1000), 2, '.', ',');?></td>

                <td>
                  <div class="dropdown dropdown-inline">
    								<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">
    	                                <i class="la la-cog"></i>
    	                            </a>
    							  	<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
    									<ul class="nav nav-hoverable flex-column">
                        <li class="nav-item"><a class="nav-link" target="_blank" href="<?= base_url("sertifikasi/tinjauan_permohonan_perubahan/".encrypt_url($row['NIB']).'/'.encrypt_url($row['tgl_permohonan']).'/'.$row['id_izin']) ;?>"><i class="nav-icon la la-chalkboard-teacher"></i><span class="nav-text">Tinjau Permohonan</span></a></li>
                        <li class="nav-item"><a class="nav-link" target="_blank"href="<?= base_url("sertifikasi/get_invoice/".encrypt_url($row['NIB']).'/'.encrypt_url($row['tgl_permohonan'])) ;?>"><i class="nav-icon la la-leaf"></i><span class="nav-text">Lihat Invoice</span></a></li>

                    </ul>
    							  	</div>
    							</div>

    							<a onclick="javascript:tolak(this)" name="<?= $row['id_izin'] ;?>" id="<?= $row['tgl_permohonan'] ;?>" data-toggle="modal" data-target="#modal_tolak" class="btn btn-sm btn-clean btn-icon" title="Pengembalian Berkas Permohonan">
    								<i class="la la-trash"></i>
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
<div class="modal fade" id="modal_tolak" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeLg" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">


			<div class="modal-body" >
        <div class="card card-custom gutter-b">
					<div class="card-header">
						<div class="card-title">
							<span class="card-icon">
								<i class="flaticon-file-1 text-primary"></i>
							</span>
							<h3 class="card-label"><span class="text-primary">Tolak Permohonan</span></h3>
						</div>
					</div>
					<?php echo form_open_multipart('sertifikasi/post_status_90_perubahan/', 'class="form-horizontal form-validate-jquery" id="form-upload-1"');?>

          <hr>
          <div class="form-group row">
            <div class="col-lg-12">
                <label class="control-label">ID IZIN <span class="text-danger"></span></label>
                <input type="text" id="id_izin_tolak" name="id_izin"readonly class="form-control" >
            </div>

          </div>

        <div class="form-group row">
          <div class="col-lg-12">
              <label class="control-label">Alasan Pengembalian <span class="text-danger"></span></label>
              <div class="input-group file-caption-main">
                <span class="file-caption-icon"></span>
                  <textarea id="comment_tolak" name="comment_penolakan"   class="form-control form-control-solid" rows="5"><?php if(!empty($ceklis)){echo $data_comment80;}?> </textarea>


              </div>
                   </div>

        </div>
        <div class="form-group row">

          <div class="col-lg-12">
            <label class="control-label">Bukti Penolakan <span class="text-danger"></span></label>
            <input class="file-tolak" id="file_tolak" name="file_tolak" type="file" data-preview-file-type="text">
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
        <button type="submit" id="submit" class="btn btn-primary mr-2">Submit</button>

        <button type="button" class="btn btn-light-dark font-weight-bold" data-dismiss="modal">Close</button>
      </div>
        	<?php echo form_close() ;?>
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

function get_permohonan_detail(sel) {
  Swal.fire({
        title: "Anda ingin mengganti tinjauan permohonan?",
        text: "Proses mengganti tinjauan permhonan",
        icon: "warning",
        input: 'select',
        inputOptions: {
          '1': 'Tinjauan Propinsi',
          '2': 'Tinjauan Pusat'
        },
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
              url : "<?php echo base_url('sertifikasi/ubah_permohonan'); ?>",
              type : "POST",
              data : {tgl_permohonan : sel.name,
                      nib : sel.id,
                      pilihan : result.value},
              success : function(data) {
                response = jQuery.parseJSON(data);
                console.log(response);

                  Swal.fire({

                      icon: "success",
                      title: "Tinjauan berhasil dirubah",
                      showConfirmButton: false,
                      timer: 1500
                  });


                location.reload();
                },
                error: function(xhr, status, error) {
                  var err = eval("(" + xhr.responseText + ")");
                  alert(err.Message);
                }
            });


        } else if (result.dismiss === "cancel") {
            Swal.fire(
                "Cancelled",
                "Permohonan batal dirubah :)",
                "error"
            )
        }
    });
}
function tolak(sel) {
  document.getElementById('comment_tolak').value='';
  $("#id_izin_tolak").val(sel.name);
  var id_izin_value=sel.name;
  var counter_nomer=0;
  document.getElementById('comment_tolak').value+="Permohonan Sertifikasi dengan ID IZIN : "+id_izin_value+'<br> Ditolak, adapun detail kekurangaalsan penolakannya sebagai berikut : <br><br>';

}

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
              document.getElementById('timeline').innerHTML += '<div class="timeline-item"><div class="timeline-media"><i class="flaticon2-notification fl text-primary"></i></div><div class="timeline-content"><div class="d-flex align-items-center justify-content-between mb-3"><div class="mr-2"><a  class="text-dark-75 text-hover-primary font-weight-bold">'+arr[counter].upload_deskripsi+'</a><span class="text-muted ml-2">'+arr[counter].tgl_record+'</span><span class="label label-light-primary font-weight-bolder label-inline ml-2">Sudah Diperbaiki</span></div></div><p class="p-0">'+arr[counter].ket+'</p></div></div>';

            }else{
              document.getElementById('timeline').innerHTML += '<div class="timeline-item"><div class="timeline-media"><i class="flaticon2-notification fl text-primary"></i></div><div class="timeline-content"><div class="d-flex align-items-center justify-content-between mb-3"><div class="mr-2"><a  class="text-dark-75 text-hover-primary font-weight-bold">'+arr[counter].upload_deskripsi+'</a><span class="text-muted ml-2">'+arr[counter].tgl_record+'</span><span class="label label-light-danger font-weight-bolder label-inline ml-2">Belum Diperbaiki</span></div></div><p class="p-0">'+arr[counter].ket+'</p></div></div>';

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
  																window.location.replace("<?php echo base_url('sertifikasi/list_tinjauan_permohonan');?>");
  															}
  															else {
  																window.location.replace("<?php echo base_url('sertifikasi/list_tinjauan_permohonan');?>");

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
