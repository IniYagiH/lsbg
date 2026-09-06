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
          <h2 class="text-white font-weight-bold my-2 mr-5">Akte Pendirian</h2>
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
            <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Akte Pendirian</a>
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
						<h3 class="card-label">Edit Akte Pendirian</h3>

					</div>
				</div>
			</div>
      <!--begin::Card-->
      <div class="card card-custom gutter-b">


        <?php echo form_open_multipart('akte/update_pendirian/', 'class="form-horizontal form-validate-jquery" id="form-upload-1"');?>
          <div class="card-body">

          <div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">Nomor Akte <span class="text-danger">*</span></label>
								<input <?php if(!empty($akte_pendirian)) :?>value='<?php echo $akte_pendirian[0]['No_Akte_Pendirian']; ?>'  <?php endif ;?> type="text"  id="nomor_akte" name="nomor_akte" required="required" class="form-control" >
            </div>
            <div class="col-lg-6">
                <label class="control-label">Nama Notaris <span class="text-danger">*</span></label>
								<input type="text" <?php if(!empty($akte_pendirian)) :?>value='<?php echo $akte_pendirian[0]['Nama_Notaris']; ?>'  <?php endif ;?> id="nama_notaris" name="nama_notaris" required="required" class="form-control">

							</div>
          </div>
					<div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">Alamat Notaris <span class="text-danger">*</span></label>
								<input type="text" <?php if(!empty($akte_pendirian)) :?>value='<?php echo $akte_pendirian[0]['Alamat']; ?>'  <?php endif ;?> id="alamat" name="alamat" class="form-control">

							 </div>
            <div class="col-lg-6">
                <label class="control-label">Tanggal Akte <span class="text-danger">*</span></label>
								<input type="text" <?php if(!empty($akte_pendirian)) :?>value='<?php echo $akte_pendirian[0]['Tgl_Akte_Pendirian']; ?>'  <?php else:?> value="2018-01-01" <?php endif ;?> name="tgl_akte" class="form-control" id="tgl_1" >

							</div>
          </div>
					<div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">Propinsi Notaris <span class="text-danger"></span></label>
								<?php if(!empty($akte_pendirian)) :?>
										<select name="propinsi" onchange="getval(this)" id="propinsi"class="form-control" required="required">
											<option value="">Pilih Provinsi</option>
											<?php foreach ($propinsi as $row2) :?>
												<?php if($row2['ID_Propinsi']==$akte_pendirian[0]['Propinsi_Akte_Pendirian']):?>
													<option value="<?php echo $row2['ID_Propinsi'] ;?>" selected> - <?php echo $row2['Nama'] ;?></option>

												<?php else :?>
													<option value="<?php echo $row2['ID_Propinsi'] ;?>"> - <?php echo $row2['Nama'] ;?></option>
												<?php endif ;?>
												<?php endforeach ;?>
										</select>



								<?php else: ?>

									<select name="propinsi" onchange="getval(this)" id="propinsi"class="form-control" required="required">
										<option value="">Pilih Provinsi</option>
										<?php foreach ($propinsi as $row2) :?>
										<option value="<?php echo $row2['ID_Propinsi'] ;?>"> - <?php echo $row2['Nama'] ;?></option>
										<?php endforeach ;?>
									</select>

								<?php endif ;?>
							</div>
            <div class="col-lg-6">
                <label class="control-label">Kabupaten/Kota <span class="text-danger">*</span></label>
								<select name="kabupaten"  id="kabupaten" class="form-control" required="required">
									<option value="<?php echo $akte_pendirian[0]['Kabupaten_Akte_Pendirian']; ?>"><?php echo $akte_pendirian[0]['Kabupaten_Akte_Pendirian']; ?></option>
										<option value="">Pilih Kabupaten</option>
										<?php foreach ($kabupaten as $row_kab) :?>
											<option <?php if($row_kab['ID_Kabupaten']==$akte_pendirian[0]['Kabupaten_Akte_Pendirian']):?>selected="selected"<?php endif ;?> value="<?php echo $row_kab['ID_Kabupaten'] ;?>"> - <?php echo $row_kab['Nama'] ;?></option>
										<?php endforeach ;?>
								</select>
							</div>
          </div>
					<div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">Nama Pengurus <span class="text-danger"></span></label>
								<input type="text" <?php if(!empty($akte_pendirian)) :?>value='<?php echo $akte_pendirian[0]['nama_pengurus']; ?>' <?php endif ;?> id="nama_pengurus" name="nama_pengurus" class="form-control">

							</div>
            <div class="col-lg-6">
                <label class="control-label">Id Jabatan <span class="text-danger">*</span></label>
								<select name="id_jabatan" id="status_jabatan" class="form-control" required="required">
										<?php foreach ($jabatan as $row9) :?>
										<option <?php if($row9['Id_Jabatan']==$akte_pendirian[0]['id_jabatan']):?>selected="selected"<?php endif ;?> value="<?php echo $row9['Id_Jabatan'] ;?>"> - <?php echo $row9['Nama_Jabatan'] ;?></option>
										<?php endforeach ;?>
								</select>
							</div>
          </div>


					<div class="card card-custom">
						<div class="card-header">
							<div class="card-title">
								<h3 class="card-label">Nomor Pengesahan
								<small>Sesuai Akte</small></h3>
							</div>
						</div>
						<div class="card-body">
							<div class="form-group row">
		            <div class="col-lg-6">
		                <label class="control-label">Menteri Kehakiman dan HAM <span class="text-danger"></span></label>
										<input type="text"  <?php if(!empty($akte_pendirian)) :?>value='<?php echo $akte_pendirian[0]['No_Pengesahan_Menteri']; ?>'  <?php endif ;?> id="mentri" name="mentri" class="form-control">

									</div>
		            <div class="col-lg-6">
		                <label class="control-label">Tanggal Mentri <span class="text-danger">*</span></label>
										<input type="text"  <?php if(!empty($akte_pendirian)) :?>value='<?php echo $akte_pendirian[0]['Tgl_Pengesahan_Menteri']; ?>'  <?php else:?> value="2018-01-01" <?php endif ;?> name="tgl_mentri"  class="form-control" id="tgl_2">

									</div>
		          </div>
							<div class="form-group row">
		            <div class="col-lg-6">
		                <label class="control-label">Pengadilan Negeri <span class="text-danger"></span></label>
										<input type="text"  <?php if(!empty($akte_pendirian)) :?>value='<?php echo $akte_pendirian[0]['No_Pengesahan_PN']; ?>'  <?php endif ;?> id="pengadilan_negeri" name="pengadilan_negeri" class="form-control">

									</div>
		            <div class="col-lg-6">
		                <label class="control-label">Tanggal Pengadilan Negeri <span class="text-danger">*</span></label>
										<input type="text"  <?php if(!empty($akte_pendirian)) :?>value='<?php echo $akte_pendirian[0]['Tgl_Pengesahan_PN']; ?>'  <?php else:?> value="2018-01-01" <?php endif ;?> name="tgl_pn" class="form-control" id="tgl_3">

									</div>
		          </div>
							<div class="form-group row">
		            <div class="col-lg-6">
		                <label class="control-label">Lembar Negara <span class="text-danger"></span></label>
										<input type="text"  <?php if(!empty($akte_pendirian)) :?>value='<?php echo $akte_pendirian[0]['No_Pengesahan_LN']; ?>' <?php endif ;?> id="lembar_negara" name="lembar_negara" class="form-control">

									</div>
		            <div class="col-lg-6">
		                <label class="control-label">Tanggal Lembar Negara <span class="text-danger">*</span></label>
										<input type="text"  <?php if(!empty($akte_pendirian)) :?>value='<?php echo $akte_pendirian[0]['Tgl_Pengesahan_LN']; ?>'  <?php else:?> value="2018-01-01" <?php endif ;?> name="tgl_ln" class="form-control" id="tgl_4" >

									</div>
		          </div>

						</div>
					</div>



					<div class="form-group row">
						<div class="col-lg-6">
							<label class="control-label">Upload Persyaratan Akte Pendirian <span class="text-danger">*</span></label>
							<input class="file-1" name="upload_persyaratan" type="file" data-preview-file-type="text">
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
	document.getElementById("kabupaten").options.length = 0;

	$.ajax({
			url : "<?php echo base_url('akte/kabupaten'); ?>",
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
</script>
<script type="text/javascript">

	$(".file-1").fileinput({
		maxFileSize: 20000,
		allowedFileExtensions: ['jpg', 'png', 'gif'],
		showUpload: false,
		dropZoneEnabled: false
	});
	var submitCounter = 0;
	$(function () {
		var inputFile = $('input[name=upload_persyaratan]');
		var uploadURI = $('#form-upload-1').attr('action');
		var progressBar = $('#progress-bar-1');


		$("form#form-upload-1").submit(function () {
		submitCounter++;
		var n1=document.querySelector('#nomor_akte').value;
		var n2=document.querySelector('#nama_notaris').value;
		var n3=document.querySelector('#propinsi').value;
		var n4=document.querySelector('#status_jabatan').value;
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
															window.location.replace("<?php echo base_url('akte/edit_pendirian');?>");
														}
														else {
															window.location.replace("<?php echo base_url('akte/edit_pendirian');?>");
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
											toastr["warning"]("ISubmit button can be clicked only once.", "Notification");

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
