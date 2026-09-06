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
          <h2 class="text-white font-weight-bold my-2 mr-5">Tenaga Kerja</h2>
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
            <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Tenaga Kerja</a>
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
            <h3 class="card-label">Update Tenaga Kerja</h3>

          </div>
				</div>
			</div>
      <!--begin::Card-->
      <div class="card card-custom gutter-b">


        <?php echo form_open_multipart('tenaga_kerja/update/', 'class="form-horizontal form-validate-jquery" id="form-upload-1"');?>
          <div class="card-body">

          <div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">Nomer Registrasi <span class="text-danger">*</span></label>
								<input type="text" readonly="true" id="noreg" name="noreg" required="required" value="<?php echo $tenaga_kerja[0]['Noreg'] ;?>" class="form-control">

            </div>
            <div class="col-lg-6">
                <label class="control-label">Nama <span class="text-danger">*</span></label>
								<input type="text" readonly="true" id="nama" name="nama" value="<?php echo $tenaga_kerja[0]['nama'] ;?>" class="form-control">

            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">KTP <span class="text-danger">*</span></label>
								<input type="text" readonly="true" id="ktp" name="ktp" value="<?php echo $tenaga_kerja[0]['id_personal'] ;?>" required="required" class="form-control">
            </div>
            <div class="col-lg-6">

            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">Tanggal Lahir <span class="text-danger">*</span></label>
								<input type="text" name="tgl_lahir" class="form-control" id="anytime-month-numeric" value="<?php echo $tenaga_kerja[0]['tgl_lahir'] ;?>" value="2018-01-01">

            </div>
            <div class="col-lg-6">

            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">Kode Pos <span class="text-danger">*</span></label>
								<input type="text" readonly="true" id="kode_pos" value="<?php echo $tenaga_kerja[0]['kodepos'] ;?>" name="kode_pos"  class="form-control">

            </div>
            <div class="col-lg-6">
                <label class="control-label">Pendidikan Akhir <span class="text-danger">*</span></label>
								<input type="text" readonly="true"  id="pendidikan_akhir" value="<?php echo $tenaga_kerja[0]['Pend_Akhir'] ;?>" name="pendidikan_akhir"  class="form-control">

            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">No Ijazah <span class="text-danger">*</span></label>
								<input type="text" readonly="true" value="<?php echo $tenaga_kerja[0]['no_ijazah'] ;?>" id="no_ijazah" name="no_ijazah"class="form-control">

            </div>
            <div class="col-lg-6">

            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">Tahun Lulus <span class="text-danger">*</span></label>
								<input type="text" readonly="true" id="tahun_lulus" value="<?php echo $tenaga_kerja[0]['Thn_Lulus'] ;?>" name="tahun_lulus" class="form-control">

            </div>
            <div class="col-lg-6">

            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">NPWP <span class="text-danger">*</span></label>
								<input type="text" readonly="true" id="npwp" value="<?php echo $tenaga_kerja[0]['npwp'] ;?>" name="npwp"class="form-control">

            </div>
            <div class="col-lg-6">

            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">Alamat <span class="text-danger">*</span></label>
								<input type="text" readonly="true" id="alamat" value="<?php echo $tenaga_kerja[0]['alamat'] ;?>" name="alamat" class="form-control">

            </div>
            <div class="col-lg-6">

            </div>
          </div>
					<div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">Sub Bidang <span class="text-danger">*</span></label>
								<select name="sub_bidang" id="sub_bidang" class="form-control" required="required">

									<?php foreach ($sub_bidang as $row_subbu) :?>
										<option value="<?php echo $row_subbu['id_sub_bidang'] ;?>"<?php if($tenaga_kerja[0]['ID_Sub_Bidang_Klasifikasi']==$row_subbu['id_sub_bidang']):?>selected="selected"<?php endif ;?> ><?php echo $row_subbu['id_sub_bidang'] ;?></option>
									<?php endforeach ;?>
								</select>
            </div>
            <div class="col-lg-6">
							<label class="control-label">Sub Sub Bidang <span class="text-danger">*</span></label>
							<input type="text" readonly="true" id="sub_sub_bidang" name="sub_sub_bidang" class="form-control">

            </div>
          </div>

					<div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">Jenis Tenaga Kerja <span class="text-danger">*</span></label>
								<input type="text" readonly="true" id="jenis_tk" value="<?php echo $tenaga_kerja[0]['Tenaga_kerja'] ;?>" name="jenis_tk"class="form-control">

            </div>
            <div class="col-lg-6">
							<label class="control-label">Kualifikasi <span class="text-danger">*</span></label>
							<input type="text" readonly="true" id="kualifikasi" value="<?php echo $tenaga_kerja[0]['id_kualifikasi'] ;?>" name="kualifikasi" class="form-control">

            </div>
          </div>

					<div class="card card-custom">
						<div class="card-header">
							<div class="col-lg-4">
								<div class="card-title">
									<h3 class="card-label">Penanggung Jawab Teknik
									<small></small></h3>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="card-title">
									<h3 class="card-label">Penanggung Jawab Klasifikasi
									<small></small></h3>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="card-title">
									<h3 class="card-label">Tenaga Ahli Tetap
									<small></small></h3>
								</div>
							</div>
						</div>
						<input type="hidden" value="<?php echo $decr ;?>" name="hidden">

						<div class="card-body">
							<div class="form-group row">
								<div class="col-lg-4">
									<label class="control-label">PJT <span class="text-danger"></span></label>


										<div class="checkbox-inline">
										<label class="checkbox checkbox-lg">
										<input type="checkbox" name="PJT" <?php if($tenaga_kerja[0]['PJT']=='1') :?> checked="checked" <?php endif ;?> value="1" />
										<span> </span>Checklis untuk membuat tk menjadi pjt</label>

		            	</div>


								</div>
								<div class="col-lg-4">
									<label class="control-label">PJK <span class="text-danger"></span></label>

									<div class="checkbox-inline">
										<label class="checkbox checkbox-lg">
										<input type="checkbox" id="pjk" name="PJK" <?php if($tenaga_kerja[0]['PJK']=='1') :?> checked="checked" <?php endif ;?> value="1" />
										<span> </span>Checklis untuk membuat tk menjadi pjk</label>
		            	</div>
								</div>
								<div class="col-lg-4">
									<label class="control-label">TA Tetap <span class="text-danger"></span></label>

									<div class="checkbox-inline">
										<label class="checkbox checkbox-lg">
										<input type="checkbox" id="ta_tetap" <?php if($tenaga_kerja[0]['PJSK']=='1') :?> checked="checked" <?php endif ;?> name="ta_tetap" value="1" />
										<span> </span>Checklis untuk membuat tk menjadi ta tetap</label>
		            	</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-lg-4">
									<input type="hidden" value="<?php echo $status ;?>" name="sta">

								</div>
								<div class="col-lg-4">
									<select name="klasifikasi_pjk"  id="klas1"  class="form-control" >
	                    <option value="">Pilih Klasifikasi</option>
											<option value="<?php echo $tenaga_kerja[0]['id_klasifikasi_pjk1'] ;?>"selected><?php echo $tenaga_kerja[0]['id_klasifikasi_pjk1'] ;?> - <?php echo $tenaga_kerja[0]['id_klasifikasi_pjk1'] ;?></option>
											<?php foreach ($klasifikasi_bu as $row_bu) :?>
												<option value="<?php echo $row_bu['ID_Klasifikasi'] ;?>"><?php echo $row_bu['ID_Klasifikasi'] ;?> - <?php echo $row_bu['Deskripsi'] ;?></option>
											<?php endforeach ;?>
	                </select>
								</div>
								<div class="col-lg-4">
									<select name="sub_klasifikasi_tetap" id="subklas1"  class="form-control" >
											<option value="">Pilih Sub Klasifikasi</option>
											<?php foreach ($sub_klasifikasi as $row_sub) :?>
													<option value="<?php echo $row_sub['id_sub_klasifikasi'] ?>"><?php echo $row_sub['id_sub_klasifikasi'] ?></option>

										<?php endforeach ;?>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-lg-4">

								</div>
								<div class="col-lg-4">
									<select name="klasifikasi_pjk2" id="klas2" class="form-control" >
	                    <option value="">Pilih Klasifikasi</option>
											<option value="<?php echo $tenaga_kerja[0]['id_klasifikasi_pjk2'] ;?>" selected><?php echo $tenaga_kerja[0]['id_klasifikasi_pjk2'] ;?> - <?php echo $tenaga_kerja[0]['id_klasifikasi_pjk2'] ;?></option>

											<?php foreach ($klasifikasi_bu as $row_bu3) :?>
												<option value="<?php echo $row_bu3['ID_Klasifikasi'] ;?>"><?php echo $row_bu3['ID_Klasifikasi'] ;?> - <?php echo $row_bu3['Deskripsi'] ;?></option>
											<?php endforeach ;?>
	                </select>
								</div>
								<div class="col-lg-4">
									<select name="sub_klasifikasi_tetap2" id="subklas2"  class="form-control" >
											<option value="">Pilih Sub Klasifikasi</option>
											<?php foreach ($sub_klasifikasi as $row_sub2) :?>
													<option value="<?php echo $row_sub2['id_sub_klasifikasi'] ?>"><?php echo $row_sub2['id_sub_klasifikasi'] ?></option>

										<?php endforeach ;?>
									</select>
								</div>
							</div>

						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-6">
							<label class="control-label">Upload NPWP Tenaga Kerja <span class="text-danger">*</span></label>
							<input class="file-npwp" id='file_npwp' name="file_npwp" type="file" data-preview-file-type="text">
							<span class="help-block">
								Accepted formats: pdf, zip. Max file size 20Mb
							</span>
							<div class="progress" style="display:none;">
								<div id="progress-bar-2" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
									20%
								</div>
							</div>
						</div>
            <div class="col-lg-6">
              <label class="control-label">Upload Ijazah Tenaga Kerja <span class="text-danger">*</span></label>
              <input class="file-ijazah" id="file_ijazah" name="file_ijazah" type="file" data-preview-file-type="text">
              <span class="help-block">
                Accepted formats: pdf, zip. Max file size 20Mb
              </span>
							<div class="progress" style="display:none;">
								<div id="progress-bar-3" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
									20%
								</div>
							</div>
            </div>
          </div>
					<div class="form-group row">
						<div class="col-lg-6">
							<label class="control-label">Upload KTP Tenaga Kerja <span class="text-danger">*</span></label>
							<input class="file-ktp" id='file_ktp' name="file_ktp" type="file" data-preview-file-type="text">
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
							<label class="control-label">Upload SKA/SKT <span class="text-danger">*</span></label>
							<input class="file-1" id="file_sertifikat" name="file_sertifikat" type="file" data-preview-file-type="text">
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
              <label class="control-label">Upload Daftar Riwayat Hidup & Surat Penyataan bukan PNS/TNI/Polri & Surat Pernyataan Pengikat Kerja <span class="text-danger">*</span></label>
              <input class="file-riwayat" id="file_riwayat"  name="file_riwayat" type="file" data-preview-file-type="text">
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




<script type="text/javascript">

	$(".file-1").fileinput({
		maxFileSize: 20000,
    allowedFileExtensions: ['jpg', 'png', 'gif'],
    showUpload: false,
    dropZoneEnabled: false
	});
	$(".file-ktp").fileinput({
		maxFileSize: 20000,
    allowedFileExtensions: ['jpg', 'png', 'gif'],
    showUpload: false,
    dropZoneEnabled: false
	});
	$(".file-ijazah").fileinput({
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
	$(".file-riwayat").fileinput({
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
		var progressBar2 = $('#progress-bar-2');
		var progressBar3 = $('#progress-bar-3');
		var progressBar4 = $('#progress-bar-4');
		var progressBar5 = $('#progress-bar-5');

		$("form#form-upload-1").submit(function () {
			submitCounter++;
			event.preventDefault();

										// make sure there is file to upload

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
															window.location.replace("<?php echo base_url('tenaga_kerja');?>");
														}
														else {
															window.location.replace("<?php echo base_url('tenaga_kerja');?>");

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
											toastr["warning"]("Submit button can be clicked only once", "Notification");


									}


								});
		$('body').on('change.bs.fileinput', function (e) {
			$('.progress').hide();
			progressBar.text("0%");
			progressBar.css({width: "0%"});
		});
	});

</script>
