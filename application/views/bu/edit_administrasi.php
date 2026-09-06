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
            <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Badan Usaha</a>
            <!--end::Item-->
            <!--begin::Item-->
            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
            <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Administrasi</a>
            <!--end::Item-->
          </div>
          <!--end::Breadcrumb-->
        </div>
        <!--end::Heading-->
      </div>

    </div>
  </div>

  <div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
      <!--begin::Card-->
      <div class="card card-custom gutter-b">
        <div class="card-header">
          <div class="card-title">
            <span class="card-icon">
              <i class="flaticon-file-1 text-primary"></i>
            </span>
            <h3 class="card-label">Input Administrasi</h3>
          </div>
        </div>
					<?php if(!empty($biodata)):?>
        <?php echo form_open_multipart('administrasi/update/', 'class="form-horizontal form-validate-jquery" id="form-upload-1"');?>
          <div class="card-body">
          <div class="form-group">
						<input type="hidden" id="condition" name="condition" class="form-control">

            <label>NPWP<span class="text-danger">*</span></label>


						<div class="input-group file-caption-main">
							<span class="file-caption-icon"></span>
							<input type="text" id='npwp' name='npwp' value="<?php echo $biodata[0]['NPWP'] ;?>" class="form-control" placeholder="99.999.999.9-999.999" />


						<div class="input-group-btn input-group-append">
									<button type="button" id="get_value" class="btn btn-primary btn-file"><i class="glyphicon glyphicon-folder-open"></i>&nbsp;  <span class="hidden-xs">Searching </span></button>
								</div>
						</div>

          </div>
          <div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">Nama Badan Usaha <span class="text-danger">*</span></label>
                <input type="text" disabled="true" id="nama_bu" name="nama_bu" required="required" class="form-control">
            </div>
            <div class="col-lg-6">
                <label class="control-label">ID_BU <span class="text-danger">*</span></label>
                <input type="text" disabled="true"  name="id_bu" required="required" class="form-control">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">Bentuk Usaha <span class="text-danger">*</span></label>
                <select name="bentuk_bu" id="bentuk_bu" disabled="true" class="form-control" required="required">
                    <option value="">Pilih Bentuk Usaha</option>
										<?php foreach ($bentuk_usaha as $row) :?>
											<option value="<?php echo $row['ID_Bentuk_usaha'] ;?>"><?php echo $row['ID_Bentuk_usaha'] ;?> - <?php echo $row['Nama'] ;?></option>
										<?php endforeach ;?>
                </select>
            </div>
            <div class="col-lg-6">
                <label class="control-label">Jenis Usaha KBLI <span class="text-danger">*</span></label>
                <select name="jenis_bu" id="jenis_bu" disabled="true" class="form-control" required="required">
                    <option value="">Pilih Jenis Usaha</option>
										<?php foreach ($jenis_usaha as $rows) :?>
											<option value="<?php echo $rows['ID_Jenis_BU_kbli'] ;?>"><?php echo $rows['ID_Jenis_BU_kbli'] ;?> - <?php echo $rows['Nama'] ;?></option>
										<?php endforeach ;?>
                </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">Alamat Domisili Hukum <span class="text-danger">*</span></label>
                <input type="text" disabled="true" id="alamat" name="alamat" required="required" class="form-control">
            </div>
            <div class="col-lg-6">
                <label class="control-label">Kategori Badan Usaha <span class="text-danger">*</span></label>
                <select name="kategori_bu" id=kategori_bu disabled="true" class="form-control" required="required">
                    <option value="">Pilih Kategori Usaha</option>
										<?php foreach ($kategory_bu as $rowz) :?>
											<option value="<?php echo $rowz['ID_Bentuk_BU'] ;?>"><?php echo $rowz['ID_Bentuk_BU'] ;?> - <?php echo $rowz['Nama'] ;?></option>
										<?php endforeach ;?>
                </select>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">Propinsi Registrasi <span class="text-danger">*</span></label>
                <select name="propinsi" onchange="getval(this)" disabled="true" id="propinsi"class="form-control" required="required">
                    <option value="">Pilih Provinsi</option>
										<?php foreach ($propinsi as $row2) :?>
											<option value="<?php echo $row2['ID_Propinsi'] ;?>"> - <?php echo $row2['Nama'] ;?></option>
										<?php endforeach ;?>
                </select>
            </div>
            <div class="col-lg-6">
                <label class="control-label">Pimpinan Badan Usaha <span class="text-danger">*</span></label>
                <input type="text" disabled="true" id="pimpinan_bu" name="pimpinan_bu" class="form-control">

            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">Kabupaten/Kota <span class="text-danger">*</span></label>
                <select name="kabupaten" disabled="true" id="kabupaten" class="form-control" required="required">
                    <option value="">Pilih Kabupaten</option>
										<?php foreach ($kabupaten as $row_kab) :?>
											<option value="<?php echo $row_kab['ID_Kabupaten'] ;?>"> - <?php echo $row_kab['Nama'] ;?></option>
										<?php endforeach ;?>
                </select>
            </div>
            <div class="col-lg-6">
                <label class="control-label">Kekayaan Bersih <span class="text-danger">*</span></label>
                <input type="text" disabled="true" id="kekayaan_bu" name="kekayaan_bu" class="form-control">

            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">Telepon <span class="text-danger">*</span></label>
                <input type="text" disabled="true" id="telepon" name="telepon" class="form-control" required="required"  placeholder="Enter phone number">

            </div>
            <div class="col-lg-6">
                <label class="control-label">Nomor Registrasi / NRU <span class="text-danger">*</span></label>
                <input type="text" readonly="true" id="nru" name="nru" class="form-control"  >

            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">Faximili <span class="text-danger">*</span></label>
                <input type="text" disabled="true" id="fax" name="faximili"  class="form-control">

            </div>
            <div class="col-lg-6">
                <label class="control-label">Modal Dasar <span class="text-danger">*</span></label>
                <input type="text" disabled="true" value="0" id="modal_dasar" oninput="setFormat('modal_dasar')" name="modal_dasar" class="form-control" placeholder="5000">

            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">Kode Pos <span class="text-danger">*</span></label>
                <input type="text" disabled="true" id="kode_pos" name="kodepos" class="form-control" placeholder="55555">

            </div>
            <div class="col-lg-6">
                <label class="control-label">Website <span class="text-danger">*</span></label>
                <input type="text" disabled="true" id="url" name="url" class="form-control" placeholder="http://lpjk.net">

            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">Email <span class="text-danger">*</span></label>
                <input type="email" disabled="true" id="email" name="email" class="form-control" id="email" required="required" placeholder="Siki@lpjk.com">

            </div>
            <div class="col-lg-6">
              <label class="control-label">NPWP <span class="text-danger">*</span></label>
              <input class="file-npwp" id="file_npwp" name="file_npwp" type="file" data-preview-file-type="text">
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
					<div class="form-group row">
						<div class="col-lg-6">
							<label class="control-label">Upload Izin Bagi Penanam Modal dari BKPM yang berlaku (Bagi PMA) <span class="text-danger">*</span></label>
							<input class="file-penanam" name="file_penanam" type="file" data-preview-file-type="text">
							<span class="help-block">
								Accepted formats: pdf, zip. Max file size 20Mb
							</span>
							<div class="progress" style="display:none;">
								<div id="progress-bar-3" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
									20%
								</div>
							</div>
						</div>
            <div class="col-lg-6">
              <label class="control-label">Upload Keterangan Domisili <span class="text-danger">*</span></label>
              <input class="file-domisili" id="file_domisili" name="file_domisili" type="file" data-preview-file-type="text">
              <span class="help-block">
                Accepted formats: pdf, zip. Max file size 20Mb
              </span>
							<div class="progress" style="display:none;">
								<div id="progress-bar-4" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
									20%
								</div>
							</div>
            </div>
          </div>
					<div class="form-group row">
						<div class="col-lg-6">
							<label class="control-label">Upload Sertifikat ISO 9001 - 2015 <span class="text-danger">*</span></label>
							<input class="file-iso" name="file_iso" type="file" data-preview-file-type="text">
							<span class="help-block">
								Accepted formats: pdf, zip. Max file size 20Mb
							</span>
							<div class="progress" style="display:none;">
								<div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
									20%
								</div>
							</div>
						</div>
            <div class="col-lg-6">
              <label class="control-label">Isian Data Peralatan <span class="text-danger">*</span></label>
              <input class="file-peralatan"  name="file_peralatan" type="file" data-preview-file-type="text">
              <span class="help-block">
                Accepted formats: pdf, zip. Max file size 20Mb
              </span>
							<div class="progress" style="display:none;">
								<div id="progress-bar-5" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
									20%
								</div>
							</div>
            </div>
          </div>









          </div>
          <div class="card-footer">
            <button type="submit" id="submit" class="btn btn-primary mr-2">Submit</button>

						<button type="reset" class="btn btn-secondary">Cancel</button>
          </div>
        	<?php echo form_close() ;?>
					<?php endif ;?>
      </div>
    </div>
  </div>

</div>
<script>

$("#get_value").click(function () {

	var npwp_value=document.querySelector('#npwp').value;
	if(npwp_value=="" || npwp_value=="  .   .   . -   .   "){

		toastr["warning"]("Mohon isi Field NPWP untuk mencari data!", "Failed");

	}else{

	$.ajax({
		url : "<?php echo base_url('administrasi/cek_npwp'); ?>",
		type : "POST",
		data : {npwp:npwp_value},
		success : function(data) {
			response = jQuery.parseJSON(data);
			document.querySelector('#submit').removeAttribute('disabled');
			document.querySelector('#modal_dasar').removeAttribute('disabled');
			document.querySelector('#url').removeAttribute('disabled');
			document.querySelector('#email').removeAttribute('disabled');
			document.querySelector('#kode_pos').removeAttribute('disabled');
			document.querySelector('#fax').removeAttribute('disabled');
			document.querySelector('#telepon').removeAttribute('disabled');
			//document.querySelector('#kekayaan_bu').removeAttribute('disabled');
			document.querySelector('#kabupaten').removeAttribute('disabled');
			//document.querySelector('#pimpinan_bu').removeAttribute('disabled');
			document.querySelector('#propinsi').removeAttribute('disabled');
			document.querySelector('#kategori_bu').removeAttribute('disabled');
			document.querySelector('#alamat').removeAttribute('disabled');
			document.querySelector('#jenis_bu').removeAttribute('disabled');
			document.querySelector('#bentuk_bu').removeAttribute('disabled');
			document.querySelector('#nama_bu').removeAttribute('disabled');
			//document.querySelector('#npwp').setAttribute('readonly',true);
			document.getElementById('npwp').readOnly = true;
			if(response.status_propinsi=='TRUE'){
				document.querySelector('#submit').setAttribute('disabled','true');
				document.querySelector('#modal_dasar').setAttribute('disabled','true');
				document.querySelector('#url').setAttribute('disabled','true');
				document.querySelector('#email').setAttribute('disabled','true');
				document.querySelector('#kode_pos').setAttribute('disabled','true');
				document.querySelector('#fax').setAttribute('disabled','true');
				document.querySelector('#telepon').setAttribute('disabled','true');
				//document.querySelector('#kekayaan_bu').setAttribute('disabled','true');
				document.querySelector('#kabupaten').setAttribute('disabled','true');
				//document.querySelector('#pimpinan_bu').setAttribute('disabled','true');
				document.querySelector('#propinsi').setAttribute('disabled','true');
				document.querySelector('#kategori_bu').setAttribute('disabled','true');
				document.querySelector('#alamat').setAttribute('disabled','true');
				document.querySelector('#jenis_bu').setAttribute('disabled','true');
				document.querySelector('#bentuk_bu').setAttribute('disabled','true');
				document.querySelector('#nama_bu').setAttribute('disabled','true');
				toastr["error"]("Data Badan Usaha ini milik otoritas propinsi lain", "Notifications");

			}
			else if(response.record === undefined){

				document.querySelector('#submit').setAttribute('disabled','true');
				document.querySelector('#modal_dasar').setAttribute('disabled','true');
				document.querySelector('#url').setAttribute('disabled','true');
				document.querySelector('#email').setAttribute('disabled','true');
				document.querySelector('#kode_pos').setAttribute('disabled','true');
				document.querySelector('#fax').setAttribute('disabled','true');
				document.querySelector('#telepon').setAttribute('disabled','true');
				//document.querySelector('#kekayaan_bu').setAttribute('disabled','true');
				document.querySelector('#kabupaten').setAttribute('disabled','true');
				//document.querySelector('#pimpinan_bu').setAttribute('disabled','true');
				document.querySelector('#propinsi').setAttribute('disabled','true');
				document.querySelector('#kategori_bu').setAttribute('disabled','true');
				document.querySelector('#alamat').setAttribute('disabled','true');
				document.querySelector('#jenis_bu').setAttribute('disabled','true');
				document.querySelector('#bentuk_bu').setAttribute('disabled','true');
				document.querySelector('#nama_bu').setAttribute('disabled','true');
				toastr["warning"]("Maaf terjadi kesalahan mohon refresh halaman dan coba kembali", "Notifications");

		    document.querySelector('#submit').setAttribute('disabled','true');
			}else if(response.record==null){
				$("#condition").val("FALSE");
				toastr["info"]("NPWP belum terdaftar", "Notifications");

				document.querySelector('#submit').removeAttribute('disabled');

				$("#nama_bu").val('');
				$("#id_bu").val('');
				$("#bentuk_bu").val('');
				$("#jenis_bu").val('');
				$("#alamat").val('');
				$("#propinsi").val('');
				$("#kategori_bu").val('');

				$("#modal_dasar").val('');
				$("#telepon").val('');
				$("#fax").val('');
				$("#kode_pos").val('');
				$("#email").val('');
				$("#url").val('');
				$("#id_bu").val(response.id_bu);
			}else{
				$("#condition").val("TRUE");
				toastr["success"]("Data NPWP Ditemukan", "Success");


				$("#nama_bu").val(response.record[0].Nama);
				$("#id_bu").val(response.record[0].ID_BU);
				$("#bentuk_bu").val(response.record[0].id_bentuk_usaha);
				$("#jenis_bu").val(response.record[0].ID_Jenis_BU_kbli);
				$("#alamat").val(response.record[0].Alamat);
				$("#kategori_bu").val(response.record[0].ID_Bentuk_BU);
				$("#propinsi").val(response.record[0].ID_Propinsi);

				$("#kabupaten").val(response.record[0].ID_Kabupaten).attr("selected","selected");
				//$("#kabupaten").val(response.record[0].ID_Kabupaten);
				//$("#kabupaten").selectedIndex(response.record[0].ID_Kabupaten);
				//document.getElementById("kabupaten").value=response.record[0].ID_Kabupaten;
				$("#modal_dasar").val(response.record[0].NO_SPT);
				$("#telepon").val(response.record[0].Telepon);
				$("#fax").val(response.record[0].Fax);
				$("#kode_pos").val(response.record[0].Kodepos);
				$("#email").val(response.record[0].Email);
				$("#url").val(response.record[0].Website);

			}
			//console.log( JSON.parse(data));

		},
		error: function(xhr, status, error) {
			var err = eval("(" + xhr.responseText + ")");
			alert(err.Message);
		}
	});


}
});
</script>
<script>

function getval(sel)
{
	document.getElementById("kabupaten").options.length = 0;

	$.ajax({
			url : "<?php echo base_url('administrasi/kabupaten'); ?>",
			type : "POST",
			data : {id_propinsi : sel.value,},
			success : function(data) {

				response = jQuery.parseJSON(data);
				csrfHash = response.csrfHash;

				//console.log( JSON.parse(data) );
				id_kabupaten=response.record;

				$.each(id_kabupaten, function(i, option) {
					var $option = $("<option>", {text: option.Nama, value: option.ID_Kabupaten});
					$option.appendTo("#kabupaten");
				});
				},
				error: function(xhr, status, error) {
					var err = eval("(" + xhr.responseText + ")");
					alert(err.Message);
				}
		});
}
</script>
<script>

	$('#npwp').inputmask({
            mask: '99.999.999.9-999.999',
            definitions: {
                A: {
                    validator: "[A-Za-z0-9 ]"
                },
            },
        });




</script>
<script type="text/javascript">
	$(".file-npwp").fileinput({
    maxFileSize: 20000,
    allowedFileExtensions: ['jpg', 'png', 'gif'],
    showUpload: false,
    dropZoneEnabled: false
	});
	$(".file-domisili").fileinput({
		maxFileSize: 20000,
    allowedFileExtensions: ['jpg', 'png', 'gif'],
    showUpload: false,
    dropZoneEnabled: false
	});
	$(".file-penanam").fileinput({
		maxFileSize: 20000,
    allowedFileExtensions: ['jpg', 'png', 'gif'],
    showUpload: false,
    dropZoneEnabled: false
	});
	$(".file-iso").fileinput({
		maxFileSize: 20000,
    allowedFileExtensions: ['jpg', 'png', 'gif'],
    showUpload: false,
    dropZoneEnabled: false
	});
	$(".file-peralatan").fileinput({
		maxFileSize: 20000,
    allowedFileExtensions: ['jpg', 'png', 'gif'],
    showUpload: false,
    dropZoneEnabled: false
	});

	var submitCounter = 0;
	$(function () {
		var uploadURI = $('#form-upload-1').attr('action');
		var progressBar = $('#progress-bar-1');

		$("form#form-upload-1").submit(function () {

		var n1=document.querySelector('#nama_bu').value;
		var n2=document.querySelector('#bentuk_bu').value;
		var n3=document.querySelector('#jenis_bu').value;
		var n4=document.querySelector('#alamat').value;
		var n5=document.querySelector('#kategori_bu').value;
		var n6=document.querySelector('#propinsi').value;
		var n7=document.querySelector('#kabupaten').value;
		var n8=document.querySelector('#telepon').value;
		var n9=document.querySelector('#email').value;
			event.preventDefault();

										if(n1!='' && n2!='' && n3!='' && n4!='' && n5!='' && n7!='' && n6!='' && n8!='' && n9!=''){



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
																window.location.replace("<?php echo base_url('administrasi/edit_administrasi');?>");
															}
															else {
																window.location.replace("<?php echo base_url('administrasi/edit_administrasi');?>");

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





									}else{
										toastr["warning"]("Data * Harus diisi", "Notification");

									}
								});
		$('body').on('change.bs.fileinput', function (e) {
			$('.progress').hide();
			progressBar.text("0%");
			progressBar.css({width: "0%"});
		});
	});

</script>
