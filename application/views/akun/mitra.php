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
<?php setlocale(LC_MONETARY, 'id_ID');?>

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
  <!--begin::Subheader-->
	<div class="subheader py-2 py-lg-12 subheader-transparent" id="kt_subheader">
    <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
      <!--begin::Info-->
			<div class="d-flex align-items-center mr-1">
				<!--begin::Page Heading-->
				<div class="d-flex align-items-baseline flex-wrap mr-5">
					<!--begin::Page Title-->
					<h2 class="d-flex align-items-center text-dark font-weight-bold my-1 mr-3">Akun</h2>
					<!--end::Page Title-->
					<!--begin::Breadcrumb-->
					<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
						<li class="breadcrumb-item text-muted">
							<a href="" class="text-muted">Admin</a>
						</li>
						<li class="breadcrumb-item text-muted">
							<a href="" class="text-muted">Verifikasi Mitra</a>
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
							<i class="flaticon-file-1 text-primary"></i>
						</span>
						<h3 class="card-label">Data Verifikasi Mitra</h3>
					</div>

				</div>
				<div class="card-body">
					<!--begin: Datatable-->
					<table class="table table-separate table-head-custom collapsed" id="kt_datatable2">
						<thead>
							<tr>
								<th>Detail</th>
								<th>Proses Data</th>
								<th>Nama</th>
								<th>NIK</th>
								<th>Alamat</th>
								<th>Propinsi</th>
								<th>Kabupaten</th>
								<th>Email</th>
								<th>Telepon/HP</th>
								<th>Persyaratan</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($record as $row) :?>
							<tr>
								<td></td>
								<td>
									<?php if($row['Username']=="") :?>
										<a id="<?=$row['nik'];?>" name="<?=$row['email'];?>" onclick="javascript:get_permohonan_detail(this)" class="btn btn-icon btn-light-success pulse pulse-primary mr-5">
												<i class="flaticon-email-black-circular-button"></i>
												<span class="pulse-ring"></span>
										</a>
									<?php else :?>
										<a id="<?=$row['nik'];?>" onclick="javascript:edit(this)" data-toggle="modal" data-target="#modal_edit" id="edit" class="btn btn-icon btn-light-info pulse pulse-info mr-5">
												<i class="flaticon-edit"></i>
												<span class="pulse-ring"></span>
										</a>
									<?php endif ;?>

						</td>
								<td><?= $row['nama'] ;?></td>
								<td><?= $row['nik'] ;?></td>
								<td><?= $row['alamat'] ;?></td>
								<td><?= $row['id_propinsi'] ;?></td>
								<td><?= $row['id_kabupaten'] ;?></td>
								<td><?= $row['email'] ;?></td>
								<td><?= $row['telepon'] ;?></td>
								<td><a href="<?=base_url("get_file/get_registrasi/".$row['persyaratan']) ;?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>

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
<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeXl" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">

			<div class="modal-body">


				<!--begin::Card-->
				<div class="card card-custom gutter-b">
					<div class="card-header">
						<div class="card-title">
							<span class="card-icon">
								<i class="flaticon-file-1 text-primary"></i>
							</span>
							<h3 class="card-label">Edit Akun</h3>
						</div>
					</div>

					<?php echo form_open_multipart('akun/update_mitra/', 'class="form-horizontal form-validate-jquery" id="form-upload-1"');?>
					<div class="card-body">

					<div class="form-group row">
						<div class="col-lg-6">
								<label class="control-label">Username <span class="text-danger">*</span></label>
								<input type="text" id="username_edit" name="username" required="required" class="form-control" readonly>
								<input type="hidden" id="id_edit" name="id" readonly>

							</div>
						<div class="col-lg-6">
								<label class="control-label">Nama <span class="text-danger">*</span></label>
								<input type="text" id="nama_edit" name="nama" required="required" class="form-control">
						</div>

					</div>
					<div class="form-group row">
						<div class="col-lg-6">
								<label class="control-label">Password <span class="text-danger">*</span></label>
								<input type="text" id="password_edit" name="password" required="required" class="form-control">

							</div>
						<div class="col-lg-6">
								<label class="control-label">Email <span class="text-danger">*</span></label>
								<input type="text" id="email_edit" name="email" required="required" class="form-control">
						</div>

					</div>
					<div class="form-group row">
						<div class="col-lg-6">
								<label class="control-label">NIK <span class="text-danger">*</span></label>
								<input type="text" id="nik_edit" name="nik" required="required" class="form-control">

							</div>
						<div class="col-lg-6">
								<label class="control-label">Alamat <span class="text-danger">*</span></label>
								<input type="text" id="alamat_edit" name="alamat" required="required" class="form-control">
						</div>

					</div>
					<div class="form-group row">
						<div class="col-lg-6">
								<label class="control-label">Propinsi <span class="text-danger">*</span></label>
								<input type="text" id="propinsi_edit" name="propinsi" required="required" class="form-control">
						</div>
						<div class="col-lg-6">
								<label class="control-label">Kabupaten <span class="text-danger">*</span></label>
								<input type="text" id="kabupaten_edit" name="kabupaten" required="required" class="form-control">

							</div>


					</div>
					<div class="form-group row">
						<div class="col-lg-6">
								<label class="control-label">Telepon <span class="text-danger">*</span></label>
								<input type="text" id="telepon_edit" name="telepon" required="required" class="form-control">
						</div>
						<div class="col-lg-6">
								<label class="control-label">Level <span class="text-danger">*</span></label>
								<select id="level" name="level"  class="form-control h-auto form-control-solid py-4 px-8" required="required">
										<option value="1">Level 1</option>
										<option value="2">Level 2</option>

								</select>
							</div>


					</div>


					</div>


				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary mr-2">Submit</button>

				<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
				<?php echo form_close() ;?>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modal_input" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeXl" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">

			<div class="modal-body">


				<!--begin::Card-->
				<div class="card card-custom gutter-b">
					<div class="card-header">
						<div class="card-title">
							<span class="card-icon">
								<i class="flaticon-file-1 text-primary"></i>
							</span>
							<h3 class="card-label">Tambah Data Akun Pelaksana</h3>
						</div>
					</div>

					<?php echo form_open_multipart('akun/insert_pelaksana/', 'class="form-horizontal form-validate-jquery" id="form-upload-1"');?>
						<div class="card-body">

						<div class="form-group row">
							<div class="col-lg-6">
									<label class="control-label">Username <span class="text-danger">*</span></label>
									<input type="text" id="username" name="username" required="required" class="form-control">

								</div>
							<div class="col-lg-6">
									<label class="control-label">Nama <span class="text-danger">*</span></label>
									<input type="text" id="nama" name="nama" required="required" class="form-control">
							</div>

						</div>
						<div class="form-group row">
							<div class="col-lg-6">
									<label class="control-label">Password <span class="text-danger">*</span></label>
									<input type="text" id="password" name="password" required="required" class="form-control">

								</div>
							<div class="col-lg-6">
									<label class="control-label">Email <span class="text-danger">*</span></label>
									<input type="text" id="email" name="email" required="required" class="form-control">
							</div>

						</div>

						<div class="form-group row">
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
						</div>


				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary mr-2">Submit</button>

				<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
			</div>
			<?php echo form_close() ;?>
		</div>
	</div>
</div>

<div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeXl" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">

			<div class="modal-body">


				<!--begin::Card-->
				<div class="card card-custom gutter-b">
					<div class="card-header">
						<div class="card-title">
							<span class="card-icon">
								<i class="flaticon-file-1 text-primary"></i>
							</span>
							<h3 class="card-label">Delete Akun</h3>
						</div>
					</div>

					<?php echo form_open_multipart('akun/delete_pelaksana/', 'class="form-horizontal form-validate-jquery" id="form-upload-1"');?>
					<div class="card-body">

					<div class="form-group row">
						<div class="col-lg-12">
								<label class="control-label">Username <span class="text-danger">*</span></label>
								<input type="text" id="username_delete" name="username" required="required" class="form-control" readonly>


							</div>


					</div>



					</div>


				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary mr-2">Submit</button>

				<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
				<?php echo form_close() ;?>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
function edit(sel) {
var nik_value=sel.id;
console.log(nik_value);
$.ajax({
		url : "<?php echo base_url('akun/search_mitra'); ?>",
		type : "POST",
		data : {nik : nik_value,},
		success : function(data) {

			response = jQuery.parseJSON(data);
			record=response.record;
			console.log(record);
			$("#username_edit").val(record[0].Username);
			$("#nama_edit").val(record[0].nama);
			$("#email_edit").val(record[0].email);
			$("#nik_edit").val(record[0].nik);
			$("#alamat_edit").val(record[0].alamat);
			$("#propinsi_edit").val(record[0].id_propinsi);
			$("#kabupaten_edit").val(record[0].id_kabupaten);
			$("#telepon_edit").val(record[0].telepon);

			},
			error: function(xhr, status, error) {
				var err = eval("(" + xhr.responseText + ")");
				alert(err.Message);
			}
	});
}
function get_permohonan_detail(sel) {
	Swal.fire({
				title: "Anda akan memverifikasi data MITRA :"+sel.id,
				text: "Proses akan mengenerate akun mitra dan mengirim Username Password ke email mitra !",
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
							url : "<?php echo base_url('akun/verifikasi_mitra'); ?>",
							type : "POST",
							data : {nik : sel.id,
											email : sel.name},
							success : function(data) {
								response = jQuery.parseJSON(data);
								console.log(response);

								if(response.result==1){
									Swal.fire({

											icon: "success",
											title: "Email Terkirim !",
											showConfirmButton: false,
											timer: 1500
									});
								}
								else{
									Swal.fire({

											icon: "error",
											title: "Verifikasi gagal !",
											showConfirmButton: false,
											timer: 1500
									});
								}
								window.location.reload();
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
					url : "<?php echo base_url('pengalaman/search_pengalaman'); ?>",
					type : "POST",
					data : {id : sub,},
					success : function(data) {

						response = jQuery.parseJSON(data);
						record=response.record;
						$("#nama_paket_edit").val(record[0].nama_pengalaman);
						$("#nilai_kontrak_edit").val(record[0].nilai_kontrak);
						$("#status_kontrak_edit").val(record[0].id_status_kontrak).attr("selected","selected");
						$("#nomer_kontrak_edit").val(record[0].nomor_kontrak);
						$("#propinsi_edit").val(record[0].id_propinsi).attr("selected","selected");
						$("#nomor_ba_edit").val(record[0].nomor_ba_serah_terima);

						$("#pemberi_tugas_edit").val(record[0].pemberi_tugas);
						$("#tahun_edit").val(record[0].tahun);
						$("#sumber_dana_edit").val(record[0].id_sumber_dana).attr("selected","selected");
						$("#klasifikasi_edit").val(record[0].id_klasifikasi).attr("selected","selected");
						$("#klasifikasi_edit").trigger('change');


						$("#tgl_1_edit").val(record[0].tgl_kontrak);
						$("#tgl_2_edit").val(record[0].tgl_mulai);
						$("#tgl_3_edit").val(record[0].tgl_selesai);
						$("#tgl_4_edit").val(record[0].tgl_ba_serah_terima);

						$("#sub_klasifikasi_edit").val(record[0].id_sub_klasifikasi).attr("selected","selected");
						},
						error: function(xhr, status, error) {
							var err = eval("(" + xhr.responseText + ")");
							alert(err.Message);
						}
				});
		}


	});
	$("#delete_data").click(function () {
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
			toastr["warning"]("Tidak dapat delete 2 data sekaligus, Mohon memilih salah satu.", "Notification");
			$("#modal_delete").modal('hide');
		}else if(counter==0){
			toastr["warning"]("Anda belum memilih data yang ingin didelete, silahkan memilih data terlebih dahulu", "Notification");
			$("#modal_delete").modal('hide');
		}else{
			$("#username_delete").val(sub);

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
				id_kabupaten=response.record;

				$.each(id_kabupaten, function(i, option) {
					var $option = $("<option>", {text: option.id_sub_klasifikasi+' - '+option.deskripsi_subklasifikasi, value: option.id_sub_klasifikasi, name: option.sifat_usaha});
					$option.appendTo("#sub_klasifikasi");
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
	document.getElementById("sub_klasifikasi_edit").options.length = 0;

	$.ajax({
			url : "<?php echo base_url('pengalaman/sub_klasifikasi'); ?>",
			type : "POST",
			data : {id_klasifikasi : sel.value,},
			success : function(data) {

				response = jQuery.parseJSON(data);
				id_kabupaten=response.record;

				$.each(id_kabupaten, function(i, option) {
					var $option = $("<option>", {text: option.id_sub_klasifikasi+' - '+option.deskripsi_subklasifikasi, value: option.id_sub_klasifikasi, name: option.sifat_usaha});
					$option.appendTo("#sub_klasifikasi_edit");
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
		allowedFileExtensions: ['jpg', 'png', 'pdf'],
		showUpload: false,
		dropZoneEnabled: false
	});
	$(".file-pho").fileinput({
		maxFileSize: 20000,
		allowedFileExtensions: ['jpg', 'png', 'pdf'],
		showUpload: false,
		dropZoneEnabled: false
	});
	$(".file-pajak").fileinput({
		maxFileSize: 20000,
		allowedFileExtensions: ['jpg', 'png', 'pdf'],
		showUpload: false,
		dropZoneEnabled: false
	});
	$(".file-kontrak").fileinput({
		maxFileSize: 20000,
		allowedFileExtensions: ['jpg', 'png', 'pdf'],
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
															window.location.replace("<?php echo base_url('pengalaman');?>");
														}
														else {
															window.location.replace("<?php echo base_url('pengalaman');?>");
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
