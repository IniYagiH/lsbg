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
							<a href="" class="text-muted">Pelaksana</a>
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
						<h3 class="card-label">Data Akun Pelaksana</h3>
					</div>
					<div class="card-toolbar">
						<a data-toggle="modal" data-target="#modal_delete" id="delete_data" class="btn btn-light-danger font-weight-bolder mr-2">
						<i class="la la-trash"></i>Delete Data</a>

						<a data-toggle="modal" data-target="#modal_edit" id="edit" class="btn btn-light-dark font-weight-bolder mr-2">
						<i class="la la-edit"></i>Edit Data</a>

						<a data-toggle="modal" data-target="#modal_input" class="btn btn-danger font-weight-bolder">
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
								<th>Username</th>
								<th>Nama</th>
								<th>Email</th>
								<th>Propinsi</th>


							</tr>
						</thead>
						<tbody>
							<?php foreach($record as $row) :?>
							<tr>
								<td></td>
								<td>
									<div class="d-flex align-items-center mr-3" data-inbox="actions">
										<label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary mr-3">
											<input type="checkbox" name="<?= $row['Username'] ;?>" class="call-checkbox"/>
											<span></span>
										</label>

									</div>

								</td>
								<td><?= $row['Username'] ;?></td>
								<td><?= $row['Nama'] ;?></td>
								<td><?= $row['Email'] ;?></td>
								<td><?= $row['nama_propinsi'] ;?></td>
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
