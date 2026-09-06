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
          <h2 class="text-white font-weight-bold my-2 mr-5">PPH & OMSET</h2>
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
            <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">PPH & OMSET</a>
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
            <h3 class="card-label">Edit PPH & OMSET</h3>

          </div>
				</div>
			</div>
      <!--begin::Card-->
      <div class="card card-custom gutter-b">


        <?php echo form_open_multipart('keuangan/update_pph_omset/', 'class="form-horizontal form-validate-jquery" id="form-upload-1"');?>
          <div class="card-body">
					<div class="card card-custom">
						<div class="card-header">
							<div class="card-title">
								<h3 class="card-label">SPT PPH
								<small>2 Tahun Terakhir</small></h3>
							</div>
						</div>
						<div class="card-body">
							<div class="form-group row">
		            <div class="col-lg-6">
		                <label class="control-label">Tahun 1 <span class="text-danger"></span></label>
										<input type="text" id="thn_1" value="<?php echo $pph_omset[0]['Tahun_SPT1'] ;?>" name="thn_1" required="required" class="form-control">
		            </div>
		            <div class="col-lg-6">
		                <label class="control-label">Pembayaran Kewajiban Pajak <span class="text-danger">*</span></label>
										<input type="text"  id="pajak_1" value="<?php echo $pph_omset[0]['SPT1'] ;?>" name="pajak_1" class="form-control">

									</div>
		          </div>
							<div class="form-group row">
		            <div class="col-lg-6">
		                <label class="control-label">Tahun 2 <span class="text-danger"></span></label>
										<input type="text" id="thn_2" name="thn_2" value="<?php echo $pph_omset[0]['Tahun_SPT2'] ;?>" required="required" class="form-control">

									</div>
		            <div class="col-lg-6">
		                <label class="control-label">Pembayaran Kewajiban Pajak <span class="text-danger">*</span></label>
										<input type="text"  id="pajak_2" name="pajak_2" value="<?php echo $pph_omset[0]['SPT2'] ;?>" class="form-control">

									</div>
		          </div>
						</div>
					</div>
					<div class="card card-custom">
						<div class="card-header">
							<div class="card-title">
								<h3 class="card-label">Omset
								<small>5 Tahun Terakhir</small></h3>
							</div>
						</div>
						<div class="card-body">
							<div class="form-group row">
		            <div class="col-lg-6">
		                <label class="control-label">Tahun 1 <span class="text-danger"></span></label>
										<input type="text" id="thn_1_omset" name="thn_1_omset" value="<?php echo $pph_omset[0]['Tahun_Omset1'] ;?>" required="required" class="form-control">

									</div>
		            <div class="col-lg-6">
		                <label class="control-label">Omset <span class="text-danger">*</span></label>
										<input type="text"  id="omset_1" name="omset_1" value="<?php echo $pph_omset[0]['Omset1'] ;?>"class="form-control">

									</div>
		          </div>
							<div class="form-group row">
		            <div class="col-lg-6">
		                <label class="control-label">Tahun 2 <span class="text-danger"></span></label>
										<input type="text" id="thn_2_omset" name="thn_2_omset" required="required" value="<?php echo $pph_omset[0]['Tahun_Omset2'] ;?>" class="form-control">

									</div>
		            <div class="col-lg-6">
		                <label class="control-label">Omset <span class="text-danger">*</span></label>
										<input type="text"  id="omset_2" name="omset_2" value="<?php echo $pph_omset[0]['Omset2'] ;?>" class="form-control">

									</div>
		          </div>
							<div class="form-group row">
		            <div class="col-lg-6">
		                <label class="control-label">Tahun 3 <span class="text-danger"></span></label>
										<input type="text" id="thn_3_omset" name="thn_3_omset" required="required" value="<?php echo $pph_omset[0]['Tahun_Omset3'] ;?>" class="form-control">

									</div>
		            <div class="col-lg-6">
		                <label class="control-label">Omset <span class="text-danger">*</span></label>
										<input type="text"  id="omset_3" name="omset_3" value="<?php echo $pph_omset[0]['Omset3'] ;?>" class="form-control">

									</div>
		          </div>
							<div class="form-group row">
		            <div class="col-lg-6">
		                <label class="control-label">Tahun 4 <span class="text-danger"></span></label>
										<input type="text" id="thn_4_omset" name="thn_4_omset" required="required" value="<?php echo $pph_omset[0]['Tahun_Omset4'] ;?>" class="form-control">

									</div>
		            <div class="col-lg-6">
		                <label class="control-label">Omset <span class="text-danger">*</span></label>
										<input type="text"  id="omset_4" name="omset_4" value="<?php echo $pph_omset[0]['Omset4'] ;?>" class="form-control">

									</div>
		          </div>
							<div class="form-group row">
		            <div class="col-lg-6">
		                <label class="control-label">Tahun 5 <span class="text-danger"></span></label>
										<input type="text" id="thn_5_omset" name="thn_5_omset" required="required" value="<?php echo $pph_omset[0]['Tahun_Omset5'] ;?>" class="form-control">

									</div>
		            <div class="col-lg-6">
		                <label class="control-label">Omset <span class="text-danger">*</span></label>
										<input type="text"  id="omset_5" name="omset_5" value="<?php echo $pph_omset[0]['Omset5'] ;?>" class="form-control">

									</div>
		          </div>

						</div>
					</div>


					<div class="form-group row">
						<div class="col-lg-6">
							<label class="control-label">Upload Persyaratan PPH & Omset <span class="text-danger">*</span></label>
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
			event.preventDefault();
			var fileToUpload = inputFile[0].files[0];
										// make sure there is file to upload

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
															window.location.replace("<?php echo base_url('keuangan/edit_pph_omset');?>");
														}
														else {
															window.location.replace("<?php echo base_url('keuangan/edit_pph_omset');?>");

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
											toastr["warning"]("Submit button can be clicked only once.", "Notification");


									}
										}

								});
		$('body').on('change.bs.fileinput', function (e) {
			$('.progress').hide();
			progressBar.text("0%");
			progressBar.css({width: "0%"});
		});
	});


</script>
