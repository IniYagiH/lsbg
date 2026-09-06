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
          <h2 class="text-white font-weight-bold my-2 mr-5">Pemegang Saham</h2>
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
            <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Pemegang Saham</a>
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
            <h3 class="card-label">Update Pemegang Saham</h3>

          </div>
				</div>
			</div>
      <!--begin::Card-->
      <div class="card card-custom gutter-b">


        <?php echo form_open_multipart('keuangan/update_saham/', 'class="form-horizontal form-validate-jquery" id="form-upload-1"');?>
          <div class="card-body">

          <div class="form-group row">
            <div class="col-lg-12">
                <label class="control-label">Nama Pemilik Saham <span class="text-danger">*</span></label>
								<input type="text"  id="pemilik_saham" name="pemilik_saham" value="<?php echo $saham[0]['nama_pemilik'] ?>" required="required" class="form-control">
            </div>

          </div>
					<div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">No KTP <span class="text-danger">*</span></label>
								<input type="text"  id="ktp" name="ktp" required="required" value="<?php echo $saham[0]['no_ktp'] ?>" class="form-control">

							 </div>
            <div class="col-lg-6">
                <label class="control-label">Alamat <span class="text-danger">*</span></label>
								<input type="text"  id="alamat" name="alamat" value="<?php echo $saham[0]['alamat'] ?>" class="form-control">

							</div>
          </div>
					<input type="hidden" name="ddd" value="<?php echo $id;?>" class="form-control">

					<div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">Propinsi <span class="text-danger"></span></label>
								<select name="propinsi" onchange="getval(this)" id="propinsi"class="form-control" required="required">
										<option value="<?php echo $saham[0]['id_propinsi'] ?>"><?php echo $saham[0]['id_propinsi'] ?></option>
										<?php foreach ($propinsi as $row2) :?>
											<option value="<?php echo $row2['ID_Propinsi'] ;?>"> - <?php echo $row2['Nama'] ;?></option>
										<?php endforeach ;?>
								</select>
							</div>
            <div class="col-lg-6">
                <label class="control-label">Kabupaten/Kota <span class="text-danger">*</span></label>
								<select name="kabupaten" id="kabupaten" class="form-control" required="required">
									<option value="<?php echo $saham[0]['id_kabupaten'] ?>"><?php echo $saham[0]['id_kabupaten'] ?></option>
								</select>
							</div>
          </div>
					<div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">Kode Pos <span class="text-danger"></span></label>
								<input type="text" id="kode_pos" name="kodepos" class="form-control" value="<?php echo $saham[0]['kd_pos'] ?>" placeholder="55555">

							</div>
            <div class="col-lg-6">
                <label class="control-label">Jenis Saham <span class="text-danger">*</span></label>
								<input type="text"  id="jenis_saham" name="jenis_saham" value="<?php echo $saham[0]['jenis_saham'] ?>" class="form-control">

							</div>
          </div>
					<div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">Jumlah Saham <span class="text-danger"></span></label>
								<input type="text" id="jumlah_lembar"  name="jumlah_lembar" value="<?php echo $saham[0]['Jumlah_Lembar'] ?>" class="form-control">

							</div>
            <div class="col-lg-6">
                <label class="control-label">Nilai Satuan Lembar <span class="text-danger">*</span></label>
								<input type="text"  id="nilai_saham" onchange="updateInput(this.value)" name="nilai_saham" value="<?php echo $saham[0]['Nilai_Per_Lembar'] ?>" class="form-control">

							</div>
          </div>
					<div class="form-group row">
            <div class="col-lg-6">
                <label class="control-label">Total Modal Yang DItetapkan <span class="text-danger"></span></label>
								<input type="text" readonly="readonly" id="total_modal" name="total_modal" class="form-control" >

							</div>
            <div class="col-lg-6">

							</div>
          </div>






					<div class="form-group row">
						<div class="col-lg-6">
							<label class="control-label">Upload Persyaratan Pemegang Saham <span class="text-danger">*</span></label>
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

 function setFormat(id) {

 if (document.getElementById(id).value != "") {
	 document.getElementById(id).value = parseFloat(document.getElementById(id).value.replace(/\./g, ""))
		 .toString()
		 .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
	 }else{
		 document.getElementById(id).value="0";
	 }
 }

 function jumlah1(){
	 var cek11=document.querySelector('#jumlah_lembar').value;
	 if(cek11==""){cek11="0";}
	 var jumlah_lembar=cek11.replace(/\./g,'');
	 var cek21=document.querySelector('#nilai_saham').value;
	 if(cek21==""){cek21="0";}
	 var nilai_saham=cek21.replace(/\./g,'');


	 var jumlah = parseInt(jumlah_lembar,10) * parseInt(nilai_saham,10);
	 $("#total_modal").val(jumlah);
	 setFormat('total_modal');
 }
</script>
<script>

function getval(sel)
{
	document.getElementById("kabupaten").options.length = 0;

	$.ajax({
			url : "<?php echo base_url('keuangan/kabupaten'); ?>",
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
															window.location.replace("<?php echo base_url('keuangan/pemegang_saham');?>");
														}
														else {
															window.location.replace("<?php echo base_url('keuangan/pemegang_saham');?>");

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
