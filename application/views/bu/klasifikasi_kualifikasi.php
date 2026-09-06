<link href="<?=base_url('assets/fileinput/css/fileinput.css') ;?>" media="all" rel="stylesheet" type="text/css"/>
<link href="<?=base_url('assets/fileinput/themes/explorer-fas/theme.css') ;?>" media="all" rel="stylesheet" type="text/css"/>
<link href="<?=base_url('assets/plugins/custom/datatables/datatables.bundle.css') ;?>" rel="stylesheet" type="text/css" />

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
					<h2 class="d-flex align-items-center text-dark font-weight-bold my-1 mr-3">Permohonan</h2>
					<!--end::Page Title-->
					<!--begin::Breadcrumb-->
					<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
						<li class="breadcrumb-item text-muted">
							<a href="" class="text-muted">Badan Usaha</a>
						</li>
						<li class="breadcrumb-item text-muted">
							<a href="" class="text-muted">Klasifikasi Kualifikasi</a>
						</li>

					</ul>
					<!--end::Breadcrumb-->
				</div>
				<!--end::Page Heading-->
			</div>

		</div>
  </div>

  <div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
			<div class="card card-custom">
				<div class="card-header">
					<div class="card-title">
						<span class="card-icon">
							<i class="flaticon-file-1 text-dark"></i>
						</span>
						<h3 class="card-label">Data Pengurus</h3>
					</div>
					<div class="card-toolbar">
						<a data-toggle="modal" data-target="#modal_delete" id="delete_data" class="btn btn-light-danger font-weight-bolder mr-2">
						<i class="la la-trash"></i>Delete Data</a>

						<a data-toggle="modal" data-target="#modal_edit" id="edit" class="btn btn-light-dark font-weight-bolder mr-2">
						<i class="la la-edit"></i>Edit Data</a>

						<a data-toggle="modal" data-target="#modal_input" class="btn btn-dark font-weight-bolder">
						<i class="la la-plus"></i>Tambah Data</a>
					</div>
				</div>
				<div class="card-body">
					<!--begin: Datatable-->
					<table class="table table-separate table-head-custom collapsed" id="kt_datatable2">
						<thead>
							<tr>
								<th>Detail</th>
								<th>Pilih Data</th>
								<th>Klasifikasi</th>
								<th>Sub Klasifikasi</th>
								<th>Kualifikasi</th>
								<th>Tgl Permohonan</th>
								<th>No BA Asosiasi</th>
								<th>Propinsi Registrasi</th>
								<th>Jenis Permohonan</th>
								<th>File Photo Copy SBU (Semua yang dimiliki) /SBU Asli</th>
								<th>File Surat Pernyataan Badan Usaha</th>
								<th>File Surat Permohonan Klasifikasi dan Kualifikasi</th>
								<th>File KTA Asosiasi</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($record as $row) :?>
							<tr>
								<td></td>
								<td>
									<div class="d-flex align-items-center mr-3" data-inbox="actions">
										<label class="checkbox checkbox-outline checkbox-outline-2x checkbox-dark mr-3">
											<input type="checkbox" name="<?= $row['id_sub_klasifikasi'] ;?>" class="call-checkbox"/>
											<span></span>
										</label>

									</div>

								</td>
								<td><?= $row['id_klasifikasi'] ;?></td>
								<td><?= $row['id_sub_klasifikasi'] ;?></td>
								<td><?= $row['kualifikasi'] ;?></td>
								<td><?= $row['tgl_permohonan'] ;?></td>
								<td><?= $row['no_ba_asosiasi'] ;?></td>
								<td><?= $row['propinsi'] ;?></td>

								<td><?= $row['id_permohonan'] ;?></td>
								<td><a href="<?=base_url('get_file/get_bu_12/'.$row['persyaratan_12']) ;?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>
								<td><a href="<?=base_url('get_file/get_bu_5/'.$row['persyaratan_5']) ;?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>

								<td><a href="<?=base_url('get_file/get_bu_4/'.$row['persyaratan_4']) ;?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>
								<td><a href="<?=base_url('get_file/get_bu_10/'.$row['persyaratan_12']) ;?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>


							</tr>
						<?php endforeach ;?>

						</tfoot>
					</table>
					<!--end: Datatable-->
				</div>
			</div>














    </div>
  </div>

</div>
<div class="modal fade" id="modal_input" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeXl" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i aria-hidden="true" class="ki ki-close"></i>
				</button>
			</div>
			<div class="modal-body">
				<div class="card card-custom gutter-b">


	        <?php echo form_open_multipart('klasifikasi_kualifikasi/insert/', 'class="form-horizontal form-validate-jquery" id="form-upload-1"');?>
	          <div class="card-body">

	          <div class="form-group row">
	            <div class="col-lg-6">
	                <label class="control-label">Klasifikasi <span class="text-danger">*</span></label>
									<select name="klasifikasi" onchange="getval(this)" id="klasifikasi" class="form-control">
										<option value="">Pilih Klasifikasi</option>
										<?php foreach ($klasifikasi_bu as $row_klasifikasi) :?>
											<option value="<?php echo $row_klasifikasi['klasifikasi'] ;?>"><?php echo $row_klasifikasi['klasifikasi'] ;?></option>
										<?php endforeach ;?>>
									</select>
								</div>
	            <div class="col-lg-6">
	                <label class="control-label">Sub Klasifikasi <span class="text-danger">*</span></label>
									<select name="sub_klasifikasi" id="sub_klasifikasi" onchange="getval2(this)" class="form-control" required="required">
											<option value="">Pilih Sub Klasifikasi</option>

									</select>
								</div>
	          </div>
						<div class="form-group row">
	            <div class="col-lg-6">
	                <label class="control-label">Kualifikasi <span class="text-danger">*</span></label>
									<select name="kualifikasi" id="kualifikasi"  class="form-control" required="required">
										<option value="">Pilih Kualifikasi</option>

									</select>
								 </div>
	            <div class="col-lg-6">
	                <label class="control-label">No BA Asosiasi <span class="text-danger">*</span></label>
									<input type="text"  id="no_ba" name="no_ba" required="required" class="form-control">

								</div>
	          </div>

						<div class="form-group row">
	            <div class="col-lg-6">
								<label class="control-label">Jenis Permohonan <span class="text-danger"></span></label>
								<select name="jenis_permohonan"  id="jenis_permohonan"class="form-control" required="required">
										<option value="">Pilih Jenis Permohonan</option>
										<option value="1">Baru</option>
										<option value="2">Perpanjangan</option>
										<option value="3">Perubahan</option>
										<option value="4">Peyetaraan</option>
								</select>
							</div>

	          </div>




						<div class="form-group row">
							<div class="col-lg-6">
								<label class="control-label">Upload Photo Copy SBU (Semua yang dimiliki) /SBU Asli <span class="text-danger">*</span></label>
								<input class="file-photocopy" name="file_photocopy" type="file" data-preview-file-type="text">
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
	              <label class="control-label">Upload Surat Pernyataan Badan Usaha <span class="text-danger">*</span></label>
	              <input class="file-pernyataan"  name="file_pernyataan" type="file" data-preview-file-type="text">
	              <span class="help-block">
	                Accepted formats: pdf, zip. Max file size 20Mb
	              </span>
	            </div>
	          </div>
						<div class="form-group row">
							<input type="hidden" name="qwe" value="TRUE" class="form-control">

							<div class="col-lg-6">
								<label class="control-label">Upload Surat Permohonan Klasifikasi dan Kualifikasi <span class="text-danger">*</span></label>
								<input class="file-permohonan" name="file_permohonan" type="file" data-preview-file-type="text">
								<span class="help-block">
									Accepted formats: pdf, zip. Max file size 20Mb
								</span>

							</div>
							<div class="col-lg-6">
								<label class="control-label">Upload KTA Asosiasi <span class="text-danger">*</span></label>
								<input class="file-kta" name="file_kta" type="file" data-preview-file-type="text">
								<span class="help-block">
									Accepted formats: pdf, zip. Max file size 20Mb
								</span>

							</div>

	          </div>

	          </div>


	      </div>
			</div>
			<div class="modal-footer">
				<button type="submit" id="submit" class="btn btn-dark mr-2">Submit</button>

				<button type="button" class="btn btn-light-dark font-weight-bold" data-dismiss="modal">Close</button>
			</div>
		</div>
		<?php echo form_close() ;?>
	</div>
</div>

<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeXl" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i aria-hidden="true" class="ki ki-close"></i>
				</button>
			</div>
			<div class="modal-body">
				<div class="card card-custom gutter-b">


	        <?php echo form_open_multipart('klasifikasi_kualifikasi/update/', 'class="form-horizontal form-validate-jquery" id="form-upload-1"');?>
	          <div class="card-body">

	          <div class="form-group row">
	            <div class="col-lg-6">
	                <label class="control-label">Klasifikasi <span class="text-danger">*</span></label>
									<select name="klasifikasi" onchange="getval(this)" id="klasifikasi_edit" class="form-control">
										<option value="">Pilih Klasifikasi</option>
										<?php foreach ($klasifikasi_bu as $row_klasifikasi) :?>
											<option value="<?php echo $row_klasifikasi['klasifikasi'] ;?>"><?php echo $row_klasifikasi['klasifikasi'] ;?></option>
										<?php endforeach ;?>>
									</select>
								</div>
	            <div class="col-lg-6">
	                <label class="control-label">Sub Klasifikasi <span class="text-danger">*</span></label>
									<select name="sub_klasifikasi" id="sub_klasifikasi_edit" onchange="getval2(this)" class="form-control" required="required">
											<option value="">Pilih Sub Klasifikasi</option>
											<?php foreach ($sub_klasifikasi_bu as $row_subklasifikasi) :?>
												<option value="<?php echo $row_subklasifikasi['id_sub_klasifikasi'] ;?>"><?php echo $row_subklasifikasi['id_sub_klasifikasi'].' / '.$row_subklasifikasi['deskripsi_subklasifikasi'] ;?></option>
											<?php endforeach ;?>>
									</select>
								</div>
	          </div>
						<div class="form-group row">
	            <div class="col-lg-6">
	                <label class="control-label">Kualifikasi <span class="text-danger">*</span></label>
									<select name="kualifikasi" id="kualifikasi_edit"  class="form-control" required="required">
										<option value="">Pilih Kualifikasi</option>

									</select>
								 </div>
	            <div class="col-lg-6">
	                <label class="control-label">No BA Asosiasi <span class="text-danger">*</span></label>
									<input type="text"  id="no_ba_edit" name="no_ba" required="required" class="form-control">

								</div>
	          </div>

						<div class="form-group row">
	            <div class="col-lg-6">
								<label class="control-label">Jenis Permohonan <span class="text-danger"></span></label>
								<select name="jenis_permohonan"  id="jenis_permohonan_edit"class="form-control" required="required">
										<option value="">Pilih Jenis Permohonan</option>
										<option value="1">Baru</option>
										<option value="2">Perpanjangan</option>
										<option value="3">Perubahan</option>
								</select>
							</div>

	          </div>



						<div class="form-group row">
							<div class="col-lg-6">
								<label class="control-label">Upload Photo Copy SBU (Semua yang dimiliki) /SBU Asli <span class="text-danger">*</span></label>
								<input class="file-photocopy" name="file_photocopy" type="file" data-preview-file-type="text">
								<span class="help-block">
									Accepted formats: pdf, zip. Max file size 20Mb
								</span>

							</div>
	            <div class="col-lg-6">
	              <label class="control-label">Upload Surat Pernyataan Badan Usaha <span class="text-danger">*</span></label>
	              <input class="file-pernyataan"  name="file_pernyataan" type="file" data-preview-file-type="text">
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
						<div class="form-group row">
							<input type="hidden" name="qwe" value="TRUE" class="form-control">

							<div class="col-lg-6">
								<label class="control-label">Upload Surat Permohonan Klasifikasi dan Kualifikasi <span class="text-danger">*</span></label>
								<input class="file-permohonan" name="file_permohonan" type="file" data-preview-file-type="text">
								<span class="help-block">
									Accepted formats: pdf, zip. Max file size 20Mb
								</span>

							</div>
							<div class="col-lg-6">
								<label class="control-label">Upload KTA Asosiasi <span class="text-danger">*</span></label>
								<input class="file-kta" name="file_kta" type="file" data-preview-file-type="text">
								<span class="help-block">
									Accepted formats: pdf, zip. Max file size 20Mb
								</span>

							</div>

	          </div>










	          </div>


	      </div>
			</div>
			<div class="modal-footer">
				<button type="submit" id="submit" class="btn btn-dark mr-2">Submit</button>

				<button type="button" class="btn btn-light-dark font-weight-bold" data-dismiss="modal">Close</button>
			</div>
				<?php echo form_close() ;?>
		</div>
	</div>
</div>


<script type="text/javascript">
	$("#edit").click(function () {
    var oTable = $('#kt_datatable2').dataTable();
		var rowcollection = oTable.$(".call-checkbox:checked", {"page": "all"});
		var value = [];
		var sub = [];
    var coba=[];
    var coba2=[];
    counter=0;
		rowcollection.each(function(index,elem){
			value.push($(elem).val());
			sub = elem.name;
			counter=counter+1;
		});
		if(counter==2){
			toastr["warning"]("Tidak dapat edit 2 data sekaligus, Mohon memilih salah satu.", "Notification");
			$("#modal_edit").modal('hide');
		}else if(counter==0){
			toastr["warning"]("Anda belum memilih data yang ingin diedit, silahkan memilih data terlebih dahulu", "Notification");
			$("#modal_edit").modal('hide');
		}else{
			$(".modal-body #id_edit").val(sub);
			$.ajax({
					url : "<?php echo base_url('klasifikasi_kualifikasi/cek_klasifikasi_kualifikasi'); ?>",
					type : "POST",
					data : {id : sub,},
					success : function(data) {

						response = jQuery.parseJSON(data);
						record=response.record;
						$("#klasifikasi_edit").val(record[0].id_klasifikasi).attr("selected","selected");
						$("#sub_klasifikasi_edit").val(record[0].id_sub_klasifikasi).attr("selected","selected");
						$("#jenis_permohonan_edit").val(record[0].id_permohonan).attr("selected","selected");

						$("#kualifikasi_edit").val(record[0].kualifikasi);


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
	document.getElementById("sub_klasifikasi").options.length = 0;

	$.ajax({
			url : "<?php echo base_url('klasifikasi_kualifikasi/sub_klasifikasi'); ?>",
			type : "POST",
			data : {id_klasifikasi : sel.value,},
			success : function(data) {

				response = jQuery.parseJSON(data);
				id_kabupaten=response.record;

				$.each(id_kabupaten, function(i, option) {
					var $option = $("<option>", {text: option.id_sub_klasifikasi+' - '+option.deskripsi_subklasifikasi, value: option.id_sub_klasifikasi, name: option.sifat_usaha});
					$option.appendTo("#sub_klasifikasi");
				});
				$("#sub_klasifikasi").trigger('change');
				},
				error: function(xhr, status, error) {
					var err = eval("(" + xhr.responseText + ")");
					alert(err.Message);
				}
		});
}
</script>
<script>

function getval2(sel)
{
	document.getElementById("kualifikasi").options.length = 0;
	$.ajax({
			url : "<?php echo base_url('klasifikasi_kualifikasi/kualifikasi'); ?>",
			type : "POST",
			data : {id_sub_klasifikasi : sel.value,},
			success : function(data) {

				response = jQuery.parseJSON(data);
				id_kabupaten=response.record;

				$.each(id_kabupaten, function(i, option) {
					if(option.sifat_usaha=='Umum'){
						var $option = $("<option>", {text: 'K', value: 'K'});
						$option.appendTo("#kualifikasi");
						var $option2 = $("<option>", {text: 'M', value: 'M'});
						$option2.appendTo("#kualifikasi");
						var $option3 = $("<option>", {text: 'B', value: 'B'});
						$option3.appendTo("#kualifikasi");
					}else if(option.sifat_usaha=='Spesialis'){
						var $option = $("<option>", {text: 'Spesialis', value: 'Spesialis'});
						$option.appendTo("#kualifikasi");
					}else if(option.sifat_usaha=='Terintegrasi'){
						var $option = $("<option>", {text: 'Terintegrasi', value: 'B'});
						$option.appendTo("#kualifikasi");
					}
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
		allowedFileExtensions: ['jpg', 'png', 'pdf'],
		showUpload: false,
		dropZoneEnabled: false
	});
	$(".file-validasi").fileinput({
		maxFileSize: 20000,
		allowedFileExtensions: ['jpg', 'png', 'pdf'],
		showUpload: false,
		dropZoneEnabled: false
	});
	$(".file-formulir").fileinput({
		maxFileSize: 20000,
		allowedFileExtensions: ['jpg', 'png', 'pdf'],
		showUpload: false,
		dropZoneEnabled: false
	});
	$(".file-pengantar").fileinput({
		maxFileSize: 20000,
		allowedFileExtensions: ['jpg', 'png', 'pdf'],
		showUpload: false,
		dropZoneEnabled: false
	});
	$(".file-permohonan").fileinput({
		maxFileSize: 20000,
		allowedFileExtensions: ['jpg', 'png', 'pdf'],
		showUpload: false,
		dropZoneEnabled: false
	});
	$(".file-photocopy").fileinput({
		maxFileSize: 20000,
		allowedFileExtensions: ['jpg', 'png', 'pdf'],
		showUpload: false,
		dropZoneEnabled: false
	});
	$(".file-pernyataan").fileinput({
		maxFileSize: 20000,
		allowedFileExtensions: ['jpg', 'png', 'pdf'],
		showUpload: false,
		dropZoneEnabled: false
	});
	$(".file-kta").fileinput({
		maxFileSize: 20000,
		allowedFileExtensions: ['jpg', 'png', 'pdf'],
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
															window.location.replace("<?php echo base_url('klasifikasi_kualifikasi');?>");
														}
														else {
															window.location.replace("<?php echo base_url('klasifikasi_kualifikasi');?>");

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
											toastr["warning"]("Submit button can be clicked only once", "Notification Invalid");


									}


								});
		$('body').on('change.bs.fileinput', function (e) {
			$('.progress').hide();
			progressBar.text("0%");
			progressBar.css({width: "0%"});
		});
	});
</script>
