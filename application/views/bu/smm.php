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
							<a href="" class="text-dark">Badan Usaha</a>
						</li>
						<li class="breadcrumb-item text-muted">
							<a href="" class="text-dark">SMM</a>
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
						<h3 class="card-label">Data SMM</h3>
					</div>
					<div class="card-toolbar">
						<a data-toggle="modal" data-target="#modal_deletex" id="delete_data" class="btn btn-light-danger font-weight-bolder mr-2">
						<i class="la la-trash"></i>Delete Data</a>

						<a data-toggle="modal" data-target="#modal_editx" id="edit" class="btn btn-light-dark font-weight-bolder mr-2">
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
								<th>Nomor Sertifikat</th>
								<th>Tgl Terbit</th>
								<th>Berlaku Sampai</th>
								<th>Lembaga Penerbit</th>
								<th>File Rekaman ISO 9001 </th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($record as $row) :?>
							<tr>
								<td></td>
								<td>
									<div class="d-flex align-items-center mr-3" data-inbox="actions">
										<label class="checkbox checkbox-outline checkbox-outline-2x checkbox-dark mr-3">
											<input type="checkbox" name="<?= $row['NIB'] ;?>" class="call-checkbox"/>
											<span></span>
										</label>

									</div>

								</td>
								<td><?= $row['nomor_sertifikat'] ;?></td>
								<td><?= $row['tgl_terbit'] ;?></td>
								<td><?= $row['berlaku_sampai'] ;?></td>
								<td><?= $row['lembaga_penerbit'] ;?></td>
								<td><a href="<?=base_url('get_file/get_bu_61/'.$row['persyaratan_61']) ;?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>


							</tr>
						<?php endforeach ;?>

						</tfoot>
					</table>
					<!--end: Datatable-->
				</div>
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
		            <h3 class="card-label">Input SMM</h3>
		          </div>
		        </div>

		        <?php echo form_open_multipart('administrasi/insert_smm/', 'class="form-horizontal form-validate-jquery" id="form-upload-1"');?>

							<div class="card-body">
								<div class="form-group row">
									<div class="col-lg-6">
											<label class="control-label">Nomor Sertifikat <span class="text-danger"></span></label>
											<input type="text" id="nomor_sertifikat"  name="nomor_sertifikat" required="required" class="form-control">

									</div>
									<div class="col-lg-6">
											<label class="control-label">Lembaga Penerbit <span class="text-danger"></span></label>
											<input type="text" id="lembaga_penerbit"  name="lembaga_penerbit" required="required" class="form-control">

									</div>

								</div>
								<div class="form-group row">
									<div class="col-lg-6">
											<label class="control-label">Berlaku Sampai <span class="text-danger"></span></label>
											<input type="text" id="berlaku_sampai" name="berlaku_sampai" required="required" class="form-control">

									</div>
									<div class="col-lg-6">
											<label class="control-label">Tgl Terbit <span class="text-danger"></span></label>
											<input type="text" id="tgl_terbit"   name="tgl_terbit" required="required" class="form-control">

									</div>
								</div>


							<div class="form-group row">

								<div class="col-lg-6">
									<label class="control-label">Upload File Iso 9001 <span class="text-danger">*</span></label>
									<input class="file-iso" name="file_iso" type="file" data-preview-file-type="text">
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

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-dark mr-2">Submit</button>

					<button type="button" class="btn btn-light-dark font-weight-bold" data-dismiss="modal">Close</button>
				</div>
				<?php echo form_close() ;?>
			</div>
		</div>
	</div>

</div>
<script type="text/javascript">
$('#tgl_terbit').datepicker({
	format: 'yyyy-mm-dd'
}).on('hide', function(event) {
	event.preventDefault();
	event.stopPropagation();
});
$('#berlaku_sampai').datepicker({
	format: 'yyyy-mm-dd'
}).on('hide', function(event) {
	event.preventDefault();
	event.stopPropagation();
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
					url : "<?php echo base_url('keuangan/cek_neraca'); ?>",
					type : "POST",
					data : {id : sub,},
					success : function(data) {

						response = jQuery.parseJSON(data);
						record=response.record;
						$("#tahun_edit").val(record[0].Tahun);
						$("#kas_bank_edit").val(record[0].KasBank);
						$("#utang_usaha_edit").val(record[0].UtangUsaha);
						$("#piutang_usaha_edit").val(record[0].PiutangUsaha);
						$("#utang_bank_edit").val(record[0].UtangBank);
						$("#persediaan_edit").val(record[0].Persediaan);
						$("#uang_muka_edit").val(record[0].UangMuka);
						$("#piutang_pajak_edit").val(record[0].PiutangPajak);

						$("#utang_pajak_edit").val(record[0].UtangPajak);
						$("#bayar_dimuka_edit").val(record[0].BiayaDimuka);
						$("#harus_dibayar_edit").val(record[0].BiayaMasihDibayar);
						$("#dlm_proses_edit").val(record[0].WIP);
						$("#jatuh_tempo_edit").val(record[0].UtangJPJT);
						$("#aktiva_lainnya_edit").val(record[0].AktivaLancarLainnya);
						$("#utang_lainnya_edit").val(record[0].UtangLain);
						$("#peralatan_proyek_edit").val(record[0].Peralatan);
						$("#utang_bank_jp_edit").val(record[0].UtangBankJP);
						$("#inventaris_kantor_edit").val(record[0].Inventaris);
						$("#total_utang_jp_edit").val(record[0].UtangLainJP);
						$("#peralatan_lainnya_edit").val(record[0].PeralatanLain);
						$("#aktiva_tetap_lainnya_edit").val(record[0].AktivaTetapLainnya);
						$("#akumulasi_penyusutan_edit").val(record[0].AkumulasiPenyusutan);
						$("#aktiva_lainnya_2_edit").val(record[0].AktivaLain);
						$("#modal_disetor_edit").val(record[0].ModalDisetor);
						$("#selisih_revaluasi_edit").val(record[0].SelisihRevaluasi);
						$("#modal_lainnya_edit").val(record[0].modallain);




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

	$(".file-iso").fileinput({
		maxFileSize: 20000,
		allowedFileExtensions: ['jpg', 'png', 'pdf'],
		showUpload: false,
		dropZoneEnabled: false
	});

	var submitCounter = 0;
	$(function () {
		var inputFile = $('input[name=file_iso]');
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
															window.location.replace("<?php echo base_url('administrasi/smm');?>");
														}
														else {
															window.location.replace("<?php echo base_url('administrasi/smm');?>");

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
