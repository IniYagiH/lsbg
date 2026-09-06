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
<div class="d-flex flex-row flex-column-fluid container">
  <!--begin::Content Wrapper-->
  <div class="main d-flex flex-column flex-row-fluid">


      <!--end::Notice-->
      <!--begin::Card-->
      <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
          <div class="card-title">
            <h3 class="card-label">Pemantauan Status Sertifikasi
            <span class="d-block text-muted pt-2 font-size-sm">Daftar Keseluruhan Permohonan Sertifikasi</span></h3>
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
              <?php $count=0 ;?>
              <?php if(!empty($record)) :?>
              <?php foreach($record as $row) :?>
                <?php $count+=1 ;?>
              <tr>
                  <td></td>
                <td><?=$row['id_izin'];?></td>
                <td>

                    <?=$row['nama_bujk'];?>

                </td>
                <td><?=$row['nama_propinsi'];?></td>
                <td><?=$row['NIB'].'-'.$row['bentuk_nama'];?></td>
                <td><?=$row['nama_jenis'];?></td>

                <td><?=$row['id_sub_klasifikasi'].'-'.$row['kualifikasi'];?></td>
                <td>
                  <?php if($row['status']=='20') :?>
                    <a type="button" id="<?=$row['id_izin'];?>" onclick="javascript:cek_detail(this)" class="pulse pulse-black"><span class="label label-black label-inline mr-2"><?=$row['stat'];?><span class="pulse-ring"></span> </span></a>

                  <?php elseif($row['status']=='10') :?>
                    <a type="button" id="<?=$row['id_izin'];?>" onclick="javascript:cek_detail(this)" class="pulse pulse-warning"><span class="label label-warning label-inline mr-2"><?=$row['stat'];?><span class="pulse-ring"></span> </span></a>

                  <?php elseif($row['status']=='30') :?>
                    <a type="button" id="<?=$row['id_izin'];?>" onclick="javascript:cek_detail(this)" class="pulse pulse-info"><span class="label label-warning label-inline mr-2"><?=$row['stat'];?><span class="pulse-ring"></span> </span></a>
                  <?php elseif($row['status']=='31') :?>
                    <a type="button" id="<?=$row['id_izin'];?>" onclick="javascript:cek_detail(this)" class="pulse pulse-success"><span class="label label-success label-inline mr-2"><?=$row['stat'];?><span class="pulse-ring"></span> </span></a>

                  <?php elseif($row['status']=='11') :?>
                    <a type="button" id="<?=$row['id_izin'];?>" onclick="javascript:cek_detail(this)" class="pulse pulse-danger"><span class="label label-danger label-inline mr-2"><?=$row['stat'];?><span class="pulse-ring"></span> </span></a>

                  <?php elseif($row['status']=='50') :?>
                    <a type="button" id="<?=$row['id_izin'];?>" onclick="javascript:cek_detail(this)" class="pulse pulse-success"><span class="label label-success label-inline mr-2"><?=$row['stat'];?><span class="pulse-ring"></span> </span></a>

                  <?php elseif($row['status']=='90') :?>
                    <a type="button" id="<?=$row['id_izin'];?>" onclick="javascript:cek_detail(this)" class="pulse pulse-danger"><span class="label label-danger label-inline mr-2"><?=$row['stat'];?><span class="pulse-ring"></span> </span></a>
                  <?php else :?>
                    -
                  <?php endif ;?>


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
  <!--end::Entry-->
</div>
<div class="modal fade" id="modal_revisi" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeLg" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">

			<div class="modal-body" >
        <div class="example example-basic">
          <div class="example-preview">
            <!--begin::Timeline-->
            <div class="timeline timeline-1">
              <div class="timeline-sep bg-primary-opacity-20"></div>
              <div id='timeline'>

              </div>





            </div>
            <!--end::Timeline-->
          </div>
        </div>
      </div>
    </div>
  </div>
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
        <button type="submit" id="submit" class="btn btn-primary mr-2">Submit</button>

        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
      </div>
        	<?php echo form_close() ;?>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_qr" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeLg" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">

			<div class="modal-body" >
        <div class="example example-basic">
          <div class="example-preview">
            <!--begin::Timeline-->

            <div class="timeline timeline-3">
              <div class="timeline-items" id='qr_code'>






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

function refresh() {
        window .location.reload();
    }
    function cek_detail(sel) {
      $('#modal_revisi').modal('show');
      var id_izin_value=sel.id;
      $('#timeline').html('');

      $.ajax({
          url : "<?php echo base_url('sertifikasi/get_detail_permohonan'); ?>",
          type : "POST",
          data : {id_izin : id_izin_value,},
          success : function(data) {
            response = jQuery.parseJSON(data);
            console.log(response);
            status_20=response.data_20;
            status_10=response.data_10;
            status_30=response.data_30;
            status_11=response.data_11;
            status_31=response.data_31;
            status_50=response.data_50;
            status_90=response.data_90;
            var counter=0;
            if(status_20!='FALSE'){
              const d = new Date(status_20);
              let day = d.getDay();
              if(day==1){hari='Senin';}else if(day==2){hari='Selasa';}else if(day==3){hari='Rabu';}else if(day==4){hari='Kamis';}else if(day==5){hari='Jumat';}else if(day==6){hari='Sabtu';}else if(day==7){hari='Minggu';}
              document.getElementById('timeline').innerHTML +='<div class="timeline-item"><div class="timeline-label">'+hari+'</div><div class="timeline-badge"><i class="text-primary">20</i></div><div class="timeline-content text-muted font-weight-normal">Data masuk : '+status_20+'</div></div>';
            }
            if(status_11!='FALSE'){

              const d = new Date(status_11[0]['tgl_record']);
              let day = d.getDay();

              if(day==1){hari='Senin';}else if(day==2){hari='Selasa';}else if(day==3){hari='Rabu';}else if(day==4){hari='Kamis';}else if(day==5){hari='Jumat';}else if(day==6){hari='Sabtu';}else{hari='Minggu';}
              var counter=0;
              var counterx=0;
              var kalimat='';
              status_11.forEach(function(index,elem,arr){
                counterx+=1;
                if(arr[counter].status=='1'){
                  kalimat+=counterx+'. '+arr[counter].upload_deskripsi+' : "'+arr[counter].ket+'"<span class="label label-rounded label-primary mr-2">V</span><br>';
                }else{
                  kalimat+=counterx+'. '+arr[counter].upload_deskripsi+' : "'+arr[counter].ket+'"<span class="label label-rounded label-danger mr-2">X</span><br>';

                }

                counter+=1;
              });

              document.getElementById('timeline').innerHTML +='<div class="timeline-item"><div class="timeline-label">'+hari+'-'+status_11[0]['tgl_record']+'</div><div class="timeline-badge"><i class="text-danger">11</i></div><div class="timeline-content text-dark font-weight-normal">Permintaan Revisi Berkas<br> : '+kalimat+'</div></div>';
            }
            if(status_10!='FALSE'){
              const d = new Date(status_10);
              let day = d.getDay();
              if(day==1){hari='Senin';}else if(day==2){hari='Selasa';}else if(day==3){hari='Rabu';}else if(day==4){hari='Kamis';}else if(day==5){hari='Jumat';}else if(day==6){hari='Sabtu';}else if(day==7){hari='Minggu';}
              document.getElementById('timeline').innerHTML +='<div class="timeline-item"><div class="timeline-label">'+hari+'</div><div class="timeline-badge"><i class="text-primary">10</i></div><div class="timeline-content text-muted font-weight-normal">Lolos tijauan permohonan : '+status_10+'</div></div>';
            }
            if(status_30!='FALSE'){
              const d = new Date(status_30);
              let day = d.getDay();
              if(day==1){hari='Senin';}else if(day==2){hari='Selasa';}else if(day==3){hari='Rabu';}else if(day==4){hari='Kamis';}else if(day==5){hari='Jumat';}else if(day==6){hari='Sabtu';}else if(day==7){hari='Minggu';}
              document.getElementById('timeline').innerHTML +='<div class="timeline-item"><div class="timeline-label">'+hari+'</div><div class="timeline-badge"><i class="text-primary">30</i></div><div class="timeline-content text-muted font-weight-normal">BUJK Upload Bukti : '+status_30+'</div></div>';
            }

            if(status_31!='FALSE'){
              const d = new Date(status_31);
              let day = d.getDay();
              if(day==1){hari='Senin';}else if(day==2){hari='Selasa';}else if(day==3){hari='Rabu';}else if(day==4){hari='Kamis';}else if(day==5){hari='Jumat';}else if(day==6){hari='Sabtu';}else if(day==7){hari='Minggu';}
              document.getElementById('timeline').innerHTML +='<div class="timeline-item"><div class="timeline-label">'+hari+'</div><div class="timeline-badge"><i class="text-primary">31</i></div><div class="timeline-content text-muted font-weight-normal">Pembayaran diverifikasi : '+status_31+'</div></div>';
            }
            if(status_50!='FALSE'){
              const d = new Date(status_50);
              let day = d.getDay();
              if(day==1){hari='Senin';}else if(day==2){hari='Selasa';}else if(day==3){hari='Rabu';}else if(day==4){hari='Kamis';}else if(day==5){hari='Jumat';}else if(day==6){hari='Sabtu';}else if(day==7){hari='Minggu';}
              document.getElementById('timeline').innerHTML +='<div class="timeline-item"><div class="timeline-label">'+hari+'</div><div class="timeline-badge"><i class="text-primary">50</i></div><div class="timeline-content text-muted font-weight-normal">Terbit Sertifikat : '+status_50+'</div></div>';
            }
            if(status_90!='FALSE'){
              const d = new Date(status_90);
              let day = d.getDay();
              if(day==1){hari='Senin';}else if(day==2){hari='Selasa';}else if(day==3){hari='Rabu';}else if(day==4){hari='Kamis';}else if(day==5){hari='Jumat';}else if(day==6){hari='Sabtu';}else if(day==7){hari='Minggu';}
              document.getElementById('timeline').innerHTML +='<div class="timeline-item"><div class="timeline-label">'+hari+'</div><div class="timeline-badge"><i class="text-danger">90</i></div><div class="timeline-content text-muted font-weight-normal">Ditolak : '+status_90+'</div></div>';
            }


            },
            error: function(xhr, status, error) {
              var err = eval("(" + xhr.responseText + ")");
              alert(err.Message);
            }
        });
    }
    function get_permohonan_detail(sel) {
      Swal.fire({
            title: "Anda ingin generate QR CODE untuk NIB :"+sel.id+" & sub klasifikasi : "+sel.name+"?",
            text: "Proses akan men-generate QR CODE untuk sertifikat badan usaha. Proses ini juga akan menampilkan QR CODE yg sudah ter-generate untuk LSBU scan !",
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
                  url : "<?php echo base_url('sertifikasi/create_qr'); ?>",
                  type : "POST",
                  data : {nib : sel.id,
                          tgl_permohonan : sel.name},
                  success : function(data) {
                    response = jQuery.parseJSON(data);
                    console.log(response);

                    if(response.result==1){
                      Swal.fire({

                          icon: "success",
                          title: "Create QR CODE berhasil !",
                          showConfirmButton: false,
                          timer: 1500
                      });
                    }else{
                      Swal.fire({

                          icon: "error",
                          title: "Create QR CODE gagal !",
                          showConfirmButton: false,
                          timer: 1500
                      });
                    }
                    //window.setInterval('refresh()', 1500);
                    },
                    error: function(xhr, status, error) {
                      var err = eval("(" + xhr.responseText + ")");
                      alert(err.Message);
                    }
                });


            } else if (result.dismiss === "cancel") {
                Swal.fire(
                    "Cancelled",
                    "Create QR CODE dibatalkan ! :)",
                    "error"
                )
            }
        });
    }
function turun_status(sel) {
  Swal.fire({
        title: "Apa anda yakin akan menurunkan status?",
        text: "Setelah diturunkan permohonan akan dilakukan penilaian kelayakan kembali!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "YA, Turunkan Status!",
        cancelButtonText: "No, Batalkan!",
        reverseButtons: true
    }).then(function(result) {
        if (result.value) {
          $.ajax({
              url : "<?php echo base_url('sertifikasi/turun_status_tanda_terima'); ?>",
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


$(".qr-code").click(function(){
  var nib_value=$(this).data('todo').id;
  var tgl_permohonan_value=$(this).data('todo').tgl_permohonan;
  var sub_klasifikasi_value=$(this).data('todo').sub_klasifikasi;
  console.log(nib_value);
  console.log(sub_klasifikasi_value);
  $('#qr_code').html('');


  jQuery.ajax({
    url : "<?= base_url('sertifikasi/get_qr')?>",
    type : "POST",
    data : {nib:nib_value,
      tgl_permohonan:tgl_permohonan_value,
      sub_klasifikasi:sub_klasifikasi_value},
      success : function(data) {
      response = jQuery.parseJSON(data);
      record=response.record;
      console.log(record);
      var counter=0;
      record.forEach(function(index,elem,arr){
        var qr='data:image/png;base64,'+arr[counter].qr;
        if(arr[counter].pemenuhan_peralatan=='1'){
          var peralatan = '<span class="text-success">TERPENUHI';
        }else{
          var peralatan = '<span class="text-danger">BELUM TERPENUHI';
        }

        if(arr[counter].pemenuhan_penjualan_tahunan=='1'){
          var penjualan_tahunan = '<span class="text-success">TERPENUHI';
        }else{
          var penjualan_tahunan = '<span class="text-danger">BELUM TERPENUHI';
        }
        if(arr[counter].pemenuhan_smm=='1'){
          var smm = '<span class="text-success">TERPENUHI';
        }else{
          var smm = '<span class="text-danger">BELUM TERPENUHI';
        }
        if(arr[counter].pemenuhan_smap=='1'){
          var smap = '<span class="text-success">TERPENUHI';
        }else{
          var smap = '<span class="text-danger">BELUM TERPENUHI';
        }
        if(arr[counter].aset=='1'){
          var asesor_aset = '<span class="text-info">SESUAI';
        }else{
          var asesor_aset = '<span class="text-danger">TIDAK SESUAI';
        }
        if(arr[counter].peralatan=='1'){
          var asesor_peralatan = '<span class="text-info">SESUAI';
        }else{
          var asesor_peraltan = '<span class="text-danger">TIDAK SESUAI';
        }
        if(arr[counter].tk=='1'){
          var asesor_tk = '<span class="text-info">SESUAI';
        }else{
          var asesor_tk = '<span class="text-danger">TIDAK SESUAI';
        }
        if(arr[counter].penjualan_tahunan=='1'){
          var asesor_penjualan_tahunan = '<span class="text-info">SESUAI';
        }else{
          var asesor_penjualan_tahunan = '<span class="text-danger">TIDAK SESUAI';
        }
        if(arr[counter].smm=='1'){
          var asesor_smm = '<span class="text-info">SESUAI';
        }else{
          var asesor_smm = '<span class="text-danger">TIDAK SESUAI';
        }
        if(arr[counter].smap=='1'){
          var asesor_smap = '<span class="text-info">SESUAI';
        }else{
          var asesor_smap = '<span class="text-danger">TIDAK SESUAI';
        }

        document.getElementById('qr_code').innerHTML += '<hr><div class="card card-custom gutter-b"><div class="card-body p-15 pb-20"><div class="row mb-17"><div class="col-md-5"><!--begin::Image--><div class="card card-custom card-stretch"><div class="card-body p-0 rounded px-5 py-15 d-flex align-items-center justify-content-center" style="background-color: #C70039;"><img src="'+qr+'" class="mw-200 w-300px" /></div></div></div><div class="col-md-7"><h2 class="font-weight-bolder text-dark mb-7" style="font-size: 20px;">'+arr[counter].nama_bu+'<br> [ '+arr[counter].id_izin+' ] '+'</h2><div class="font-size-h4 mb-7 text-dark-50">'+arr[counter].alamat_bu+'</div><div class="row mb-12"><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Jenis Usaha</span><span class="text-muted font-weight-bolder font-size-lg">'+arr[counter].nama_jenis_usaha+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Klasifikasi Jenis Usaha</span><span class="text-muted font-weight-bolder font-size-lg">'+arr[counter].nama_klasifikasi_jenis_usaha+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Sifat Usaha</span><span class="text-muted font-weight-bolder font-size-lg">'+arr[counter].nama_sifat+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">KBLI</span><span class="text-muted font-weight-bolder font-size-lg">'+arr[counter].nomor_kbli+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Sub Klasifikasi</span><span class="text-muted font-weight-bolder font-size-lg">'+arr[counter].id_sub_klasifikasi+' - '+arr[counter].deskripsi_subklasifikasi+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Kualifikasi</span><span class="text-muted font-weight-bolder font-size-lg">'+arr[counter].kualifikasi+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Pemenuhan Peralatan</span><span class="text-muted font-weight-bolder font-size-lg">'+peralatan+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Pemenuhan Penjualan Tahunan</span><span class="text-muted font-weight-bolder font-size-lg">'+penjualan_tahunan+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Pemenuhan SMM</span><span class="text-muted font-weight-bolder font-size-lg">'+smm+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Pemenuhan SMAP</span><span class="text-muted font-weight-bolder font-size-lg">'+smap+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Hasil Penilaian Keuangan</span><span class="text-muted font-weight-bolder font-size-lg">'+asesor_aset+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Hasil Penilaian Peralatan</span><span class="text-muted font-weight-bolder font-size-lg">'+asesor_peralatan+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Hasil Penilaian Pejualan Tahunan</span><span class="text-muted font-weight-bolder font-size-lg">'+asesor_penjualan_tahunan+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Hasil Penilaian SMM</span><span class="text-muted font-weight-bolder font-size-lg">'+asesor_smm+'</span></div></div><div class="col-md-6"><div class="mb-8 d-flex flex-column"><span class="text-dark font-weight-bold mb-4">Hasil Penilaian SMAP</span><span class="text-muted font-weight-bolder font-size-lg">'+asesor_smap+'</span></div></div></div></div></div></div></div><hr>';

        counter+=1;
      });
    },
    error: function(xhr, status, error) {
      var err = eval("(" + xhr.responseText + ")");
      alert(err.Message);
    }
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
  																window.location.replace("<?php echo base_url('sertifikasi/list_verifikasi');?>");
  															}
  															else {
  																window.location.replace("<?php echo base_url('sertifikasi/list_verifikasi');?>");

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
