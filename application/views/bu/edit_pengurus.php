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
	echo script_tag('assets/bootstrap-datepicker.min.js');


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
          <h2 class="text-white font-weight-bold my-2 mr-5">Pengurus</h2>
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
            <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Pengurus</a>
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
			<div class="card card-custom card-sticky">
				<div class="card-header">
					<div class="card-title">
						<h1 class="card-label">Nama :
						<i class="mr-2"></i>
						<small class=""> <?php echo $this->session->userdata('nama'); ?></small></h3>
						<h1 class="card-label">NPWP :
						<i class="mr-2"></i>
						<small class=""> <?php echo $this->session->userdata('npwp'); ?></small></h3>

					</div>

				</div>
				<div class="card-body">
					<div class="card-title">
            <span class="card-icon">
              <i class="flaticon-file-1 text-primary"></i>
            </span>
            <h3 class="card-label">Edit Pengurus</h3>

          </div>
				</div>
			</div>
      <!--begin::Card-->
      <div class="card card-custom gutter-b">


        <?php echo form_open_multipart('pengurus/update/', 'class="form-horizontal form-validate-jquery" id="form-upload-1"');?>
          <div class="card-body">
						<div class="form-group row">
	            <div class="col-lg-8">
	                <label class="control-label">Nama Pengurus <span class="text-danger"></span></label>
									<input type="text"  id="nama_pengurus" name="nama_pengurus" required="required" value="<?php echo $pengurus[0]['Nama'] ?>"  class="form-control">
	            </div>

	          </div>
          <div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">Tempat Lahir <span class="text-danger">*</span></label>
                <input type="text" id="tempat_lahir" value="<?php echo $pengurus[0]['Tempat_Lahir'] ?>" name="tempat_lahir" required="required" class="form-control">
            </div>
            <div class="col-lg-6">
                <label class="control-label">Status Jabatan <span class="text-danger">*</span></label>
								<select name="status_jabatan" id="status_jabatan" class="form-control" required="required">


												<?php foreach ($jabatan as $row9) :?>
													<?php if($pengurus[0]['id_jabatan']==$row9['Id_Jabatan']): ?>
														<option value="<?php echo $pengurus[0]['id_jabatan'] ?>" selected> - <?php echo $row9['Nama_Jabatan'] ;?></option>
													<?php else :?>
													<option value="<?php echo $row9['Id_Jabatan'] ;?>"> - <?php echo $row9['Nama_Jabatan'] ;?></option>
													<?php endif ;?>
												<?php endforeach ;?>

								</select>
							</div>
          </div>
					<div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">No KTP <span class="text-danger">*</span></label>
                <input type="text" id="ktp" value="<?php echo $pengurus[0]['No_KTP'] ?>" name="ktp"  required="required" class="form-control">
            </div>
            <div class="col-lg-6">
                <label class="control-label">NPWP <span class="text-danger">*</span></label>
								<input type="text" id="npwp" name="npwp" value="<?php echo $pengurus[0]['npwp'] ?>" placeholder="99.999.999.9-999.999" required="required" class="form-control">

							</div>
          </div>
					<div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">Jabatan BU <span class="text-danger"></span></label>
                <input type="text" id="jabatan_bu" value="<?php echo $pengurus[0]['Jabatan_BU'] ?>" name="jabatan_bu" class="form-control">
            </div>
            <div class="col-lg-6">
                <label class="control-label">Tanggal Lahir <span class="text-danger">*</span></label>
								<input type="text" id="tgl_1" name="tgl_lahir" value="2020-01-01" required="required" class="form-control">

							</div>
          </div>
					<?php if(empty($cek) || $pengurus[0]['PJBU']=='1') :?>
					<div class="form-group row">
            <div class="col-lg-6">
							<label class="control-label">Penanggung Jawab Badan Usaha <span class="text-danger"></span></label>

							<div class="checkbox-inline">
							<label class="checkbox checkbox-lg">
							<input type="checkbox" name="pjbu" value="1" <?php if($pengurus[0]['PJBU']=='1'):?>checked="checked"<?php endif ;?> />
							<span> </span>Checklis untuk membuat pengurus menjadi PJBU</label>
            </div>
						</div>
            <div class="col-lg-6">

							</div>
          </div>
					<?php endif ;?>
					<div class="card card-custom">
						<div class="card-header">
							<div class="card-title">
								<h3 class="card-label">Alamat
								<small>Sesuai KTP</small></h3>
							</div>
						</div>
						<div class="card-body">
							<div class="form-group row">
		            <div class="col-lg-6">
		                <label class="control-label">Jalan <span class="text-danger"></span></label>
		                <input type="text" id="jalan" value="<?php echo $pengurus[0]['Alamat'] ?>" name="jalan" class="form-control">
		            </div>
								<input type="hidden"  name="id" value="<?php echo $id ?>" class="form-control">

		            <div class="col-lg-6">
		                <label class="control-label">Kode Pos <span class="text-danger">*</span></label>
										<input type="text" id="kode_pos" value="<?php echo $pengurus[0]['Kodepos'] ?>" name="kode_pos"  class="form-control">

									</div>
		          </div>
							<div class="form-group row">
		            <div class="col-lg-6">
		                <label class="control-label">Propinsi <span class="text-danger"></span></label>
										<select name="propinsi" onchange="getval(this)"  id="propinsi"class="form-control" required="required">
											<?php foreach ($propinsi as $row2) :?>
												<?php if($pengurus[0]['ID_Propinsi']==$row2['ID_Propinsi']):?>
													<option value="<?php echo $pengurus[0]['ID_Propinsi'] ?>" selected><?php echo $row2['Nama'] ;?></option>
												<?php else :?>
												<option value="<?php echo $row2['ID_Propinsi'] ;?>"> - <?php echo $row2['Nama'] ;?></option>
												<?php endif ;?>
											<?php endforeach ;?>
										</select>
									</div>
		            <div class="col-lg-6">
		                <label class="control-label">Kabupaten <span class="text-danger">*</span></label>
										<select name="kabupaten" id="kabupaten"  class="form-control" required="required">
											<?php foreach ($kabupaten as $row_kab) :?>
												<?php if($pengurus[0]['ID_Kabupaten_Alamat']==$row_kab['ID_Kabupaten']) :?>
                        <option value="<?php echo $pengurus[0]['ID_Kabupaten_Alamat'] ;?>" selected><?php echo $row_kab['Nama'] ;?></option>
											<?php else:?>
											<option value="<?php echo $row_kab['ID_Kabupaten'] ;?>"> - <?php echo $row_kab['Nama'] ;?></option>
											<?php endif ;?>
											<?php endforeach ;?>
										</select>
									</div>
		          </div>
						</div>
					</div>
					<div class="card card-custom">
						<div class="card-header">
							<div class="card-title">
								<h3 class="card-label">Pendidikan
								<small>Sesuai Ijazah</small></h3>
							</div>
						</div>
						<div class="card-body">
							<div class="form-group row">
		            <div class="col-lg-6">
		                <label class="control-label">Jenjang <span class="text-danger"></span></label>
										<select name="jenjang" id="jenjang" class="form-control" required="required">
												<option value="">Pilih Jenjang</option>
												<?php foreach ($jenjang as $row4) :?>
													<?php if($pengurus[0]['id_jenjang']==$row4['ID_Jenjang']) :?>
	                        <option value="<?php echo $pengurus[0]['id_jenjang'] ;?>" selected><?php echo $row4['Deskripsi'] ;?></option>
												<?php else :?>
                          <option value="<?php echo $row4['ID_Jenjang'] ;?>"> - <?php echo $row4['Deskripsi'] ;?></option>
													<?php endif ;?>
												<?php endforeach ;?>
										</select>
									</div>
		            <div class="col-lg-6">
		                <label class="control-label">Nomer Ijazah <span class="text-danger">*</span></label>
										<input type="text" id="ijazah" value="<?php echo $pengurus[0]['no_ijazah'] ?>" name="ijazah"  class="form-control">

									</div>
		          </div>

						</div>
					</div>


					<div class="form-group row">
						<div class="col-lg-6">
							<label class="control-label">Upload Riwayat Hidup <span class="text-danger">*</span></label>
							<input class="file-riwayat" name="file_riwayat" type="file" data-preview-file-type="text">
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
              <label class="control-label">Upload Peernyataan Bukan PNS,TNI/POLRI <span class="text-danger">*</span></label>
              <input class="file-pns"  name="file_pns" type="file" data-preview-file-type="text">
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
							<label class="control-label">Upload KTP <span class="text-danger">*</span></label>
							<input class="file-ktp" name="file_ktp" type="file" data-preview-file-type="text">
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
              <label class="control-label">Upload Photo PJBU <span class="text-danger">*</span></label>
              <input class="file-pjbu"  name="file_pjbu" type="file" data-preview-file-type="text">
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
							<label class="control-label">Upload NPWP <span class="text-danger">*</span></label>
							<input class="file-npwp" name="file_npwp" type="file" data-preview-file-type="text">
							<span class="help-block">
								Accepted formats: pdf, zip. Max file size 20Mb
							</span>
							<div class="progress" style="display:none;">
								<div id="progress-bar-5" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
									20%
								</div>
							</div>
						</div>
            <div class="col-lg-6">

            </div>
          </div>









          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button type="reset" class="btn btn-secondary">Cancel</button>
          </div>
        	<?php echo form_close() ;?>
      </div>
    </div>
  </div>

</div>

<script>
$('#tgl_1').datepicker({
	format: 'yyyy-mm-dd'
}).on('hide', function(event) {
	event.preventDefault();
	event.stopPropagation();
});

	$('#npwp').inputmask({
            mask: '99.999.999.9-999.999',
            definitions: {
                A: {
                    validator: "[A-Za-z0-9 ]"
                },
            },
        });




</script>

<script>
function capitalize(inputField) {
	inputField.value = inputField.value.replace(/\b[a-z](?=[a-z]{2})/gi, function(letter) {
		return letter.toUpperCase();
	});
}

$('#tgl_lahir').datepicker({
	format: 'yyyy-mm-dd'
}).on('hide', function(event) {
	event.preventDefault();
	event.stopPropagation();
});

function getval(sel)
{
	document.getElementById("kabupaten").options.length = 0;

	$.ajax({
			url : "<?php echo base_url('pengurus/kabupaten'); ?>",
			type : "POST",
			data : {id_propinsi : sel.value,},
			success : function(data) {

				response = jQuery.parseJSON(data);
				csrfHash = response.csrfHash;

				console.log( JSON.parse(data) );
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

function getval2(sel)
{

	$.ajax({
			url : "<?php echo base_url('ajax/get_pengurus'); ?>",
			type : "POST",
			data : {id_personal : sel.value,},
			success : function(data) {

				response = jQuery.parseJSON(data);
				console.log( JSON.parse(data) );
				pengurus=response.record;
				if(pengurus.length!=0){
					new PNotify({
							title: 'Notification',
							text: 'Pengurus ini sudah terdaftar di badan usaha lain',
							addclass: 'bg-warning'
					});
				}

				},
				error: function(xhr, status, error) {
					var err = eval("(" + xhr.responseText + ")");
					alert(err.Message);
				}
		});
}
</script>
<script type="text/javascript">
	$(".file-ktp").fileinput({
		maxFileSize: 20000,
    allowedFileExtensions: ['jpg', 'png', 'gif'],
    showUpload: false,
    dropZoneEnabled: false
	});
	$(".file-npwp").fileinput({
		maxFileSize: 20000,
    allowedFileExtensions: ['jpg', 'png', 'gif'],
    showUpload: false,
    dropZoneEnabled: false
	});
	$(".file-pjbu").fileinput({
		maxFileSize: 20000,
    allowedFileExtensions: ['jpg', 'png', 'gif'],
    showUpload: false,
    dropZoneEnabled: false
	});
	$(".file-pns").fileinput({
		maxFileSize: 20000,
    allowedFileExtensions: ['jpg', 'png', 'gif'],
    showUpload: false,
    dropZoneEnabled: false
	});
	$(".file-riwayat").fileinput({
		maxFileSize: 20000,
    allowedFileExtensions: ['jpg', 'png', 'gif'],
    showUpload: false,
    dropZoneEnabled: false
	});

	var submitCounter = 0;
	$(function () {
		var inputFile = $('input[name=file_npwp]');
		var uploadURI = $('#form-upload-1').attr('action');
		var progressBar = $('#progress-bar-1');
		var progressBar2 = $('#progress-bar-2');
		var progressBar3 = $('#progress-bar-3');
		var progressBar4 = $('#progress-bar-4');
		var progressBar5 = $('#progress-bar-5');


		$("form#form-upload-1").submit(function () {
			submitCounter++;
		var n1=document.querySelector('#nama_pengurus').value;
		var n2=document.querySelector('#ktp').value;
		var n3=document.querySelector('#propinsi').value;
		var n4=document.querySelector('#kabupaten').value;
		event.preventDefault();
			var fileToUpload = inputFile[0].files[0];
										// make sure there is file to upload
										if(n1!='' || n2!='' || n3!='' || n4!=''){


										if (fileToUpload != 'undefined') {
										if (submitCounter < 2) {
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
															window.location.replace("<?php echo base_url('pengurus/edit_pengurus/'.$id);?>");
														}
														else {
															window.location.replace("<?php echo base_url('pengurus/edit_pengurus/'.$id);?>");

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
																					progressBar2.text('- Harap Tunggu -');
																					progressBar3.text('- Harap Tunggu -');
																					progressBar4.text('- Harap Tunggu -');
																					progressBar5.text('- Harap Tunggu -');
																				}
																				else {
																					progressBar.text(percentComplete + '%');
																					progressBar2.text(percentComplete + '%');
																					progressBar3.text(percentComplete + '%');
																					progressBar4.text(percentComplete + '%');
																					progressBar5.text(percentComplete + '%');

																				}
																				progressBar.css({width: percentComplete + "%"});
																				progressBar2.css({width: percentComplete + "%"});
																				progressBar3.css({width: percentComplete + "%"});
																				progressBar4.css({width: percentComplete + "%"});
																				progressBar5.css({width: percentComplete + "%"});

																		}
																		;
																}, false);
														return xhr;
													}
												});
										}else{
											toastr["warning"]("This is can be clicked only once.", "Notification");

									}
										}

									}else{
										toastr["warning"]("Isian * Harus diisi", "Notification");
									}
								});
		$('body').on('change.bs.fileinput', function (e) {
			$('.progress').hide();
			progressBar.text("0%");
			progressBar.css({width: "0%"});
		});
	});

</script>
