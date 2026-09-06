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
	echo script_tag('assets/bootstrap-datepicker.min.js');

?>
<?php
$counter_pengalaman=0;
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
          <h2 class="text-white font-weight-bold my-2 mr-5">Pengalaman</h2>
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
            <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Pengalaman</a>
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
            <h3 class="card-label">Update Pengalaman</h3>

          </div>
				</div>
			</div>

      <!--begin::Card-->
      <div class="card card-custom gutter-b">


        <?php echo form_open_multipart('pengalaman/update/', 'class="form-horizontal form-validate-jquery" id="form-upload-1"');?>
          <div class="card-body">

          <div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">Nama Paket <span class="text-danger">*</span></label>
								<input type="text"  id="nama_paket" name="nama_paket" required="required" value="<?php echo $pengalaman[0]['Nama_Paket']; ?>" class="form-control">
            </div>
            <div class="col-lg-6">
                <label class="control-label">Nilai Kontrak <span class="text-danger">*</span></label>
								<input type="text"  id="nilai_kontrak" name="nilai_kontrak" value="<?php echo $pengalaman[0]['Nilai_Kontrak']; ?>" required="required" class="form-control">

							</div>
          </div>
					<div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">Status Kontrak <span class="text-danger">*</span></label>
								<select name="status_kontrak"  id="status_kontrak"class="form-control" required="required">

										<?php foreach ($status_kontrak as $row_statuskontrak) :?>
											<?php if($pengalaman[0]['id_status_kontrak']==$row_statuskontrak['id_status_kontrak']) :?>
												<option value="<?php echo $pengalaman[0]['id_status_kontrak'] ?>"> - <?php echo $row_statuskontrak['nm_status_kontrak'] ;?></option>
											<?php else: ?>
												<option value="<?php echo $row_statuskontrak['id_status_kontrak'] ;?>"> - <?php echo $row_statuskontrak['nm_status_kontrak'] ;?></option>
												<?php endif ;?>
										<?php endforeach ;?>
								</select>
							 </div>
            <div class="col-lg-6">
                <label class="control-label">Nomor Kontrak <span class="text-danger">*</span></label>
								<input type="text" id="nomer_kontrak" value="<?php echo $pengalaman[0]['Nomor_Kontrak'] ;?>" name="nomer_kontrak" class="form-control">
								<input type="hidden" value="<?php echo $pengalaman[0]['Nomor_Kontrak'] ;?>" name="nomer_kontrak2" class="form-control">

							</div>
          </div>
					<div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">Propinsi <span class="text-danger"></span></label>
								<select name="propinsi" id="propinsi"class="form-control" required="required">

                    <?php foreach ($propinsi as $row2) :?>
											<?php if($pengalaman[0]['ID_Propinsi']==$row2['ID_Propinsi']) :?>
												<option value="<?php echo $pengalaman[0]['ID_Propinsi'] ;?>" selected="selected"><?php echo $row2['Nama'] ;?></option>
											<?php else:?>
                      <option value="<?php echo $row2['ID_Propinsi'] ;?>"> - <?php echo $row2['Nama'] ;?></option>
											<?php endif ;?>
										<?php endforeach ;?>
                </select>
							</div>
            <div class="col-lg-6">
                <label class="control-label">Nomor BA Serah Terima <span class="text-danger">*</span></label>
								<input type="text"  id="nomor_ba" name="nomor_ba" value="<?php echo $pengalaman[0]['Nomor_BA_Serah_Terima'] ;?>" required="required" class="form-control">

							</div>
          </div>
					<div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">Asosiasi <span class="text-danger"></span></label>
								<select name="asosiasi" class="form-control" required="required">

										<?php foreach ($asosiasi as $row) :?>
											<?php if($pengalaman[0]['ID_Asosiasi_BU']==$row['ID_Asosiasi_BU']) :?>
												<option value="<?php echo $pengalaman[0]['ID_Asosiasi_BU'] ;?>" selected="selected"> - <?php echo $row['Nama'] ;?></option>
											<?php else :?>
											<option value="<?php echo $row['ID_Asosiasi_BU'] ;?>"> - <?php echo $row['Nama'] ;?></option>
											<?php endif ;?>
										<?php endforeach ;?>
								</select>
							</div>
            <div class="col-lg-6">
                <label class="control-label">Pemberi Tugas <span class="text-danger">*</span></label>
								<input type="text"  id="pemberi_tugas" value="<?php echo $pengalaman[0]['Pemberi_Tugas'] ;?>" name="pemberi_tugas" class="form-control">

							</div>
          </div>

					<div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">Tahun <span class="text-danger"></span></label>
								<input type="text"  id="tahun" name="tahun" value="<?php echo $pengalaman[0]['Tahun'] ;?>" required="required" class="form-control">

							</div>
							<input type="hidden" name="fff" value="<?php echo $id ;?>" class="form-control">

            <div class="col-lg-6">
                <label class="control-label">Sumber Dana <span class="text-danger">*</span></label>
								<select name="sumber_dana" class="form-control" required="required">

										<?php foreach ($sumber_dana as $row5) :?>
											<?php if($pengalaman[0]['ID_Sumber_Dana']==$row5['ID_Sumber_Dana']) :?>
												<option value="<?php echo $pengalaman[0]['ID_Sumber_Dana'] ;?>" selected="selected"><?php echo $row5['Deskripsi'] ;?></option>
											<?php else: ;?>
	                    <option value="<?php echo $row5['ID_Sumber_Dana'] ;?>"> - <?php echo $row5['Deskripsi'] ;?></option>
											<?php endif ;?>
										<?php endforeach ;?>
	              </select>
							</div>
          </div>
					<div class="card card-custom">
						<div class="card-header">
							<div class="card-title">
								<h3 class="card-label">KBLI / CPC
								<small></small></h3>
							</div>
						</div>
						<div class="card-body">
							<div class="form-group row">
		            <div class="col-lg-6">
		                <label class="control-label">Klasifikasi <span class="text-danger"></span></label>
										<select name="klasifikasi" onchange="getval(this)" id="klasifikasi" class="form-control" required="required">
											<option value="<?php echo $pengalaman[0]['ID_Klasifikasi_kbli'] ;?>"><?php echo $pengalaman[0]['ID_Klasifikasi_kbli'] ;?></option>
	                    <?php foreach ($klasifikasi as $row1) :?>
	                      <option value="<?php echo $row1['ID_Klasifikasi'] ;?>"><?php echo $row1['ID_Klasifikasi'] ;?> - <?php echo $row1['Deskripsi'] ;?></option>
	                    <?php endforeach ;?>
		                </select>
									</div>
		            <div class="col-lg-6">
		                <label class="control-label">Sub Klasifikasi <span class="text-danger">*</span></label>
										<select name="sub_klasifikasi" id="sub_klasifikasi" class="form-control" required="required">
											<option value="<?php echo $pengalaman[0]['ID_Sub_Klasifikasi_kbli'] ;?>"><?php echo $pengalaman[0]['ID_Sub_Klasifikasi_kbli'] ;?></option>

										</select>
									</div>
		          </div>

						</div>
					</div>
					<input type="hidden" name="fff2" value="<?php echo $id2 ;?>" class="form-control">

					<div class="card card-custom">
						<div class="card-header">
							<div class="card-title">
								<h3 class="card-label">Tanggal
								<small>Sesuai Kontrak</small></h3>
							</div>
						</div>
						<div class="card-body">
							<div class="form-group row">
		            <div class="col-lg-3">
									<label class="control-label">Tanggal Kontrak <span class="text-danger"></span></label>
									<input type="text" autocomplete="off" id="tgl_1" name="tgl_kontrak" value="<?php echo $pengalaman[0]['Tgl_Kontrak'] ;?>" required="required" class="form-control">

								</div>
								<div class="col-lg-3">
									<label class="control-label">Tanggal Mulai <span class="text-danger"></span></label>
									<input type="text" autocomplete="off" id="tgl_2" name="tgl_mulai" required="required"  value="<?php echo $pengalaman[0]['Tgl_Mulai'] ;?>"class="form-control">

								</div>
								<div class="col-lg-3">
									<label class="control-label">Tanggal Selesai <span class="text-danger"></span></label>
									<input type="text" autocomplete="off" id="tgl_3" value="<?php echo $pengalaman[0]['Tgl_Selesai'] ;?>" name="tgl_selesai" required="required" class="form-control">

								</div>
								<div class="col-lg-3">
									<label class="control-label">Tanggal Terima <span class="text-danger"></span></label>
									<input type="text" autocomplete="off" id="tgl_4" name="tgl_terima" value="<?php echo $pengalaman[0]['Tgl_BA_Serah_Terima'] ;?>" required="required" class="form-control">

								</div>

		          </div>

						</div>
					</div>


					<div class="form-group row">
						<div class="col-lg-6">
							<label class="control-label">Upload Surat Pernyataan Pecah Kontrak & Formulir Pengalaman <span class="text-danger">*</span></label>
							<input class="file-kontrak" name="file_kontrak" type="file" data-preview-file-type="text">
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
              <label class="control-label">Upload Faktur Pajak Pertambahan Nilai <span class="text-danger">*</span></label>
              <input class="file-pajak"  name="file_pajak" type="file" data-preview-file-type="text">
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
							<label class="control-label">Upload PHO <span class="text-danger">*</span></label>
							<input class="file-pho" name="file_pho" type="file" data-preview-file-type="text">
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
              <label class="control-label">Upload Rekaman Kontrak <span class="text-danger">*</span></label>
              <input class="file-1"  name="file_rekaman" type="file" data-preview-file-type="text">
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
$('#tgl_2').datepicker({
	format: 'yyyy-mm-dd'
}).on('hide', function(event) {
	event.preventDefault();
	event.stopPropagation();
});
$('#tgl_3').datepicker({
	format: 'yyyy-mm-dd'
}).on('hide', function(event) {
	event.preventDefault();
	event.stopPropagation();
});
$('#tgl_4').datepicker({
	format: 'yyyy-mm-dd'
}).on('hide', function(event) {
	event.preventDefault();
	event.stopPropagation();
});
function getval(sel)
{
	document.getElementById("sub_klasifikasi").options.length = 0;

	$.ajax({
			url : "<?php echo base_url('pengalaman/sub_klasifikasi'); ?>",
			type : "POST",
			data : {id_klasifikasi : sel.value,},
			success : function(data) {

				response = jQuery.parseJSON(data);
				csrfHash = response.csrfHash;

				console.log( JSON.parse(data) );
				id_kabupaten=response.record;

				$.each(id_kabupaten, function(i, option) {
					var $option = $("<option>", {text: option.id_sub_klasifikasi+'-'+option.Deskripsi, value: option.id_sub_klasifikasi});
					$option.appendTo("#sub_klasifikasi");
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

	function setFormat(id) {

	if (document.getElementById(id).value != "") {
		document.getElementById(id).value = parseFloat(document.getElementById(id).value.replace(/\./g, ""))
			.toString()
			.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
		}else{
			document.getElementById(id).value="0";
		}
	}
</script>

<script type="text/javascript">

	$(".file-1").fileinput({
		maxFileSize: 20000,
		allowedFileExtensions: ['jpg', 'png', 'gif'],
		showUpload: false,
		dropZoneEnabled: false
	});
	$(".file-pho").fileinput({
		maxFileSize: 20000,
		allowedFileExtensions: ['jpg', 'png', 'gif'],
		showUpload: false,
		dropZoneEnabled: false
	});
	$(".file-pajak").fileinput({
		maxFileSize: 20000,
		allowedFileExtensions: ['jpg', 'png', 'gif'],
		showUpload: false,
		dropZoneEnabled: false
	});
	$(".file-kontrak").fileinput({
		maxFileSize: 20000,
		allowedFileExtensions: ['jpg', 'png', 'gif'],
		showUpload: false,
		dropZoneEnabled: false
	});
	var submitCounter = 0;
	$(function () {
		var inputFile = $('input[name=file_kontrak]');
		var uploadURI = $('#form-upload-1').attr('action');
		var progressBar = $('#progress-bar-1');
		var progressBar2 = $('#progress-bar-2');
		var progressBar3 = $('#progress-bar-3');
		var progressBar4 = $('#progress-bar-4');

		$("form#form-upload-1").submit(function () {
			submitCounter++;
		var n1=document.querySelector('#nama_paket').value;
		var n2=document.querySelector('#status_kontrak').value;
		var n3=document.querySelector('#nomer_kontrak').value;
		var n4=document.querySelector('#propinsi').value;
		var n5=document.querySelector('#nomor_ba').value;
		var n6=document.querySelector('#asosiasi').value;
		var n7=document.querySelector('#tahun').value;
		var n8=document.querySelector('#klasifikasi').value;
			event.preventDefault();
			var fileToUpload = inputFile[0].files[0];
										// make sure there is file to upload
										if(n1!='' || n2!='' || n3!='' || n4!='' || n5!='' || n6!='' || n7!='' || n8!=''){

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
															window.location.replace("<?php echo base_url('pengalaman/edit_pengalaman/'.$id.'/'.$id2);?>");
														}else {
															window.location.replace("<?php echo base_url('pengalaman/edit_pengalaman/'.$id.'/'.$id2);?>");
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

																				}
																				else {
																					progressBar2.text(percentComplete + '%');
																					progressBar3.text(percentComplete + '%');
																					progressBar4.text(percentComplete + '%');

																					progressBar.text(percentComplete + '%');
																				}
																				progressBar2.css({width: percentComplete + "%"});
																				progressBar3.css({width: percentComplete + "%"});
																				progressBar4.css({width: percentComplete + "%"});
																				progressBar.css({width: percentComplete + "%"});
																		}
																		;
																}, false);
														return xhr;
													}
												});
										}else{
											toastr["warning"]("Submit button can be clicked only once.", "Notification");

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
