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
							<a href="" class="text-muted">Peralatan</a>
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
						<h3 class="card-label">Data Peralatan</h3>
					</div>

					<div class="card-toolbar">
						<a data-toggle="modal" data-target="#modal_delete" id="delete_data" class="btn btn-light-danger font-weight-bolder mr-2">
						<i class="la la-trash"></i>Delete Data</a>

						<a data-toggle="modal" data-target="#modal_edit" id="edit" class="btn btn-light-dark font-weight-bolder mr-2">
						<i class="la la-edit"></i>Edit Data</a>

						<a data-toggle="modal" data-target="#modal_input" class="btn btn-dark font-weight-bolder">
						<i class="la la-plus"></i>Tambah Data</a>
						<!--end::Button-->
					</div>
				</div>
				<div class="card-body">
					<!--begin: Datatable-->
					<table class="table table-separate table-head-custom collapsed" id="kt_datatable2">
						<thead>
							<tr>
								<th>Detail</th>
								<th>Pilih Data</th>
								<th>Jenis Peralatan</th>
								<th>Tipe Peralatan</th>
								<th>Sub Tipe Peralatan</th>
								<th>Tahun Pembuatan</th>
								<th>Kapasitas</th>
								<th>Kondisi %</th>
								<th>Harga</th>
								<th>Propinsi</th>

								<th>File Surat Kepemilikan</th>


							</tr>
						</thead>
						<tbody>
							<?php foreach($record as $row) :?>
							<tr>
								<td></td>
								<td>
									<div class="d-flex align-items-center mr-3" data-inbox="actions">
										<label class="checkbox checkbox-inline checkbox-dark flex-shrink-0 mr-3">
											<input type="checkbox" name="<?= $row['id'] ;?>" value="<?= $row['jenis_peralatan'] ;?>" class="call-checkbox"/>
											<span></span>
										</label>

									</div>

								</td>
								<td><?= $row['jenis_peralatan'] ;?></td>
								<td><?= $row['tipe_peralatan'] ;?></td>
								<td><?= $row['sub_tipe_peralatan'] ;?></td>

								<td><?= $row['tahun_pembuatan'] ;?></td>
								<td><?= $row['kapasitas'] ;?></td>
								<td><?= $row['kondisi'] ;?></td>
								<td><?= $row['harga'] ;?></td>
								<td><?= $row['propinsi'] ;?></td>


								<td><a href="<?=base_url('get_file/get_bu_peralatan/'.$row['persyaratan']) ;?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>


							</tr>
						<?php endforeach ;?>

						</tfoot>
					</table>
					<!--end: Datatable-->
				</div>
			</div>

      <!--begin::Card-->

    </div>
  </div>

</div>
<div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeXl" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">

			<div class="modal-body">
				<div class="card card-custom gutter-b">
					<div class="card-header">
						<div class="card-title">
							<span class="card-icon">
								<i class="flaticon-file-1 text-dark"></i>
							</span>
							<h3 class="card-label"><span class="text-danger">Detele Peralatan</span></h3>
						</div>
					</div><?php echo form_open_multipart('peralatan/delete/', 'class="form-horizontal form-validate-jquery"');?>
					<div class="card-body">
						<input type="hidden" id='id_delete' name='id' class="form-control" />

						<div class="form-group row">
							<div class="col-lg-8">
									<label class="control-label">Tipe Peralatan <span class="text-danger">*</span></label>
									<input type="text"   id='nama_delete'  name="nama" readonly class="form-control">
							</div>

						</div>

					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" id="submit" class="btn btn-danger mr-2">Delete</button>

				<button type="button" class="btn btn-light-dark font-weight-bold" data-dismiss="modal">Close</button>
			</div>
				<?php echo form_close() ;?>
		</div>
	</div>
</div>
<div class="modal fade" id="modal_input" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeXl" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">

			<div class="modal-body">

				<div class="card card-custom gutter-b">
					<div class="card-header">
						<div class="card-title">
							<span class="card-icon">
								<i class="flaticon-file-1 text-dark"></i>
							</span>
							<h3 class="card-label">Input Peralatan</h3>
						</div>
					</div>

					<?php echo form_open_multipart('peralatan/insert/', 'class="form-horizontal form-validate-jquery" id="form-upload-1"');?>
					<div class="card-body">

					<div class="form-group row">
						<div class="col-lg-6">
								<label class="control-label">Jenis Peralatan <span class="text-danger">*</span></label>
								<select name="jenis" onchange="getval(this)"  id="jenis" class="form-control" required="required">
										<option value="">Pilih Jenis Peralatan</option>
										<?php foreach ($peralatan as $row2) :?>
											<option value="<?php echo $row2['jenis'] ;?>"> - <?php echo $row2['jenis'] ;?></option>
										<?php endforeach ;?>
								</select>
							</div>
						<div class="col-lg-6">
								<label class="control-label">Tipe Peralatan <span class="text-danger">*</span></label>
								<select name="tipe" onchange="getval2(this)" id="tipe" class="form-control" required="required">
										<option value="">Pilih Tipe Peralatan</option>

								</select>
						</div>

					</div>
					<div class="form-group row">
						<div class="col-lg-6">
								<label class="control-label">Sub Tipe Peralatan <span class="text-danger">*</span></label>
								<select name="sub_tipe" id="sub_tipe" class="form-control" required="required">
										<option value="">Pilih Sub Tipe Peralatan</option>

								</select>
							</div>
							<div class="col-lg-6">
									<label class="control-label">Propinsi <span class="text-danger"></span></label>
									<select name="propinsi"  id="propinsi"class="form-control" required="required">
											<option value="">Pilih Provinsi</option>
											<?php foreach ($propinsi as $row2) :?>
												<option value="<?php echo $row2['ID_Propinsi'] ;?>"> - <?php echo $row2['Nama'] ;?></option>
											<?php endforeach ;?>
									</select>
								</div>


					</div>
					<div class="form-group row">
						<div class="col-lg-6">
								<label class="control-label">Tahun Pembuatan <span class="text-danger">*</span></label>
								<input type="text" id="tahun" name="tahun"  required="required" class="form-control">
						</div>
						<div class="col-lg-6">
								<label class="control-label">Kapasitas <span class="text-danger">*</span></label>
								<input type="text" id="kapasitas" name="kapasitas"  required="required" class="form-control">
						</div>

					</div>
					<div class="form-group row">
						<div class="col-lg-6">
								<label class="control-label">Kondisi % <span class="text-danger"></span></label>
								<input type="text" id="kondisi" name="kondisi" class="form-control">
						</div>
						<div class="col-lg-6">
								<label class="control-label">Hargas <span class="text-danger">*</span></label>
								<input type="text" id="harga" name="harga" required="required" class="form-control">

							</div>
					</div>





					<div class="form-group row">
						<div class="col-lg-6">
							<label class="control-label">Upload Surat Kepemilikan <span class="text-danger">*</span></label>
							<input class="file-pemilik" name="file_pemilik" type="file" data-preview-file-type="text">
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

			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-dark mr-2">Submit</button>
				<button type="button" class="btn btn-light-dark font-weight-bold" data-dismiss="modal">Close</button>
			</div>
			<?php echo form_close() ;?>
		</div>
	</div>
</div>
<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeXl" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">

			<div class="modal-body">

				<div class="card card-custom gutter-b">
					<div class="card-header">
						<div class="card-title">
							<span class="card-icon">
								<i class="flaticon-file-1 text-dark"></i>
							</span>
							<h3 class="card-label">Update Peralatan</h3>
						</div>
					</div>

					<?php echo form_open_multipart('peralatan/update/', 'class="form-horizontal form-validate-jquery" id="form-upload-2"');?>
					<div class="card-body">
						<input type="hidden" id="id_edit" name="id"  class="form-control">

					<div class="form-group row">
						<div class="col-lg-6">
								<label class="control-label">Jenis Peralatan <span class="text-danger">*</span></label>
								<select name="jenis" onchange="getval_edit(this)"  id="jenis_edit" class="form-control" required="required">
										<option value="">Pilih Jenis Peralatan</option>
										<?php foreach ($peralatan as $row2) :?>
											<option value="<?php echo $row2['jenis'] ;?>"> - <?php echo $row2['jenis'] ;?></option>
										<?php endforeach ;?>
								</select>
							</div>
							<div class="col-lg-6">
									<label class="control-label">Tipe Peralatan <span class="text-danger">*</span></label>
									<select name="tipe" onchange="getval2_edit(this)" id="tipe_edit" class="form-control" required="required">
											<option value="">Pilih Tipe Peralatan</option>
											<?php foreach ($peralatan_tipe as $row2) :?>
												<option value="<?php echo $row2['varian'] ;?>"> - <?php echo $row2['varian'] ;?></option>
											<?php endforeach ;?>
									</select>
							</div>

					</div>
					<div class="form-group row">
						<div class="col-lg-6">
								<label class="control-label">Sub Tipe Peralatan <span class="text-danger">*</span></label>
								<select name="sub_tipe" id="sub_tipe_edit" class="form-control" required="required">
										<option value="">Pilih Sub Tipe Peralatan</option>

												<?php foreach ($peralatan_sub_tipe as $row2) :?>
													<option value="<?php echo $row2['kode'] ;?>"> - <?php echo $row2['subvarian'] ;?></option>
												<?php endforeach ;?>

								</select>
							</div>
							<div class="col-lg-6">
									<label class="control-label">Propinsi <span class="text-danger"></span></label>
									<select name="propinsi"  id="propinsi_edit"class="form-control" required="required">
											<option value="">Pilih Provinsi</option>
											<?php foreach ($propinsi as $row2) :?>
												<option value="<?php echo $row2['ID_Propinsi'] ;?>"> - <?php echo $row2['Nama'] ;?></option>
											<?php endforeach ;?>
									</select>
								</div>


					</div>
					<div class="form-group row">
						<div class="col-lg-6">
								<label class="control-label">Tahun Pembuatan <span class="text-danger">*</span></label>
								<input type="text" id="tahun_edit" name="tahun"  required="required" class="form-control">
						</div>
						<div class="col-lg-6">
								<label class="control-label">Kapasitas <span class="text-danger">*</span></label>
								<input type="text" id="kapasitas_edit" name="kapasitas"  required="required" class="form-control">
						</div>

					</div>
					<div class="form-group row">
						<div class="col-lg-6">
								<label class="control-label">Kondisi % <span class="text-danger"></span></label>
								<input type="text" id="kondisi_edit" name="kondisi" class="form-control">
						</div>
						<div class="col-lg-6">
								<label class="control-label">Hargas <span class="text-danger">*</span></label>
								<input type="text" id="harga_edit" name="harga" required="required" class="form-control">

							</div>
					</div>





					<div class="form-group row">
						<div class="col-lg-6">
							<label class="control-label">Upload Surat Kepemilikan <span class="text-danger">*</span></label>
							<input class="file-pemilik" name="file_pemilik" type="file" data-preview-file-type="text">
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

			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-dark mr-2">Submit</button>
				<button type="button" class="btn btn-light-dark font-weight-bold" data-dismiss="modal">Close</button>
			</div>
			<?php echo form_close() ;?>
		</div>
	</div>
</div>


<script>

function getval(sel)
{
	document.getElementById("tipe").options.length = 0;

	$.ajax({
			url : "<?php echo base_url('peralatan/tipe'); ?>",
			type : "POST",
			data : {id_jenis : sel.value,},
			success : function(data) {

				response = jQuery.parseJSON(data);
				csrfHash = response.csrfHash;

				//console.log( JSON.parse(data) );
				id_kabupaten=response.record;

				$.each(id_kabupaten, function(i, option) {
					var $option = $("<option>", {text: option.varian, value: option.varian});
					$option.appendTo("#tipe");
				});
				$("#tipe").trigger("change");
				},
				error: function(xhr, status, error) {
					var err = eval("(" + xhr.responseText + ")");
					alert(err.Message);
				}
		});
}
function getval2(sel)
{
	document.getElementById("sub_tipe").options.length = 0;

	$.ajax({
			url : "<?php echo base_url('peralatan/sub_tipe'); ?>",
			type : "POST",
			data : {id_tipe : sel.value,},
			success : function(data) {

				response = jQuery.parseJSON(data);
				csrfHash = response.csrfHash;

				//console.log( JSON.parse(data) );
				id_kabupaten=response.record;

				$.each(id_kabupaten, function(i, option) {
					var $option = $("<option>", {text: option.subvarian, value: option.kode});
					$option.appendTo("#sub_tipe");
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
$("#delete_data").click(function () {
	var oTable = $('#kt_datatable2').dataTable();
	var rowcollection = oTable.$(".call-checkbox:checked", {"page": "all"});
	var value = [];
	var sub = [];
	var coba=[];
	var coba2=[];
	var coba3=[];
	var coba4=[];
	counterx=0;
	counter=0;
	counter1=0;
	rowcollection.each(function(index,elem){
		counterx=counterx+1;
		sub = elem.name;
		value = elem.value;
		if(coba.length>0){
			if(coba[counter]!=sub){
				counter=counter+1;
				coba[counter]=sub;
				coba2[counter]="'"+sub+"'";
			}
		}else{
			coba[counter]=sub;
			coba2[counter]="'"+sub+"'";
		}
		if(coba3.length>0){
			if(coba3[counter1]!=value){
				counter1=counter1+1;
				coba3[counter1]=value;
				coba4[counter1]="'"+value+"'";
			}
		}else{
			coba3[counter1]=value;
			coba4[counter1]="'"+value+"'";
		}
	});
	if(counterx==0){
		toastr["warning"]("Anda belum memilih data yang ingin diedit, silahkan memilih data terlebih dahulu", "Notification");
		$("#modal_edit").modal('hide');
	}else{
		$(".modal-body #id_delete").val(coba2);
		$(".modal-body #nama_delete").val(coba4);
	}


});

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
					url : "<?php echo base_url('peralatan/search_peralatan'); ?>",
					type : "POST",
					data : {id : sub,},
					success : function(data) {

						response = jQuery.parseJSON(data);
						record=response.record;
						$("#jenis_edit").val(record[0].jenis_peralatan).attr("selected","selected");
						$("#tipe_edit").val(record[0].tipe_peralatan).attr("selected","selected");
						$("#sub_tipe_edit").val(record[0].sub_tipe_peralatan).attr("selected","selected");

						$("#tahun_edit").val(record[0].tahun_pembuatan);
						$("#kapasitas_edit").val(record[0].kapasitas);
						$("#kondisi_edit").val(record[0].kondisi);
						$("#harga_edit").val(record[0].harga);

						$("#propinsi_edit").val(record[0].propinsi).attr("selected","selected");
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


</script>
<script type="text/javascript">
	$(".file-pemilik").fileinput({
		maxFileSize: 20000,
    allowedFileExtensions: ['jpg', 'png', 'pdf'],
    showUpload: false,
    dropZoneEnabled: false
	});


	var submitCounter = 0;
	$(function () {
		var inputFile = $('input[name=file_pemilik]');
		var uploadURI = $('#form-upload-1').attr('action');
		var uploadURI2 = $('#form-upload-2').attr('action');
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
															window.location.replace("<?php echo base_url('peralatan');?>");
														}
														else {
															window.location.replace("<?php echo base_url('peralatan');?>");

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
										}


								});
								$("form#form-upload-2").submit(function () {
									submitCounter++;

								event.preventDefault();
									var fileToUpload = inputFile[0].files[0];

																if (submitCounter < 2) {
																		// provide the form data
																		// that would be sent to sever through ajax
																		var formData = new FormData($(this)[0]);
																		// now upload the file using $.ajax
																		$.ajax({
																			url: uploadURI2,
																			type: 'post',
																			data: formData,
																			processData: false,
																			contentType: false,
																			success: function (data) {
																				if (data.result == '1') {
																					window.location.replace("<?php echo base_url('peralatan');?>");
																				}
																				else {
																					window.location.replace("<?php echo base_url('peralatan');?>");

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
