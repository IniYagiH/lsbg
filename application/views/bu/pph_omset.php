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
							<a href="" class="text-muted">Keuangan Omset</a>
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
						<h3 class="card-label">Data Keuangan Pendapatan</h3>
					</div>
					<div class="card-toolbar">
						<a data-toggle="modal" data-target="#modal_delete" id="delete_data" class="btn btn-light-danger font-weight-bolder mr-2">
						<i class="la la-trash"></i>Delete Data</a>

						<a data-toggle="modal" data-target="#modal_edit" id="edit" class="btn btn-light-dark font-weight-bolder mr-2">
						<i class="la la-edit"></i>Edit Data</a>
						<?php if(empty($record)) :?>
						<a data-toggle="modal" data-target="#modal_input" class="btn btn-dark font-weight-bolder">
						<i class="la la-plus"></i>Tambah Data</a>
						<?php endif ;?>
					</div>
				</div>
				<div class="card-body">
					<!--begin: Datatable-->
					<table class="table table-separate table-head-custom collapsed" id="kt_datatable2">
						<thead>
							<tr>
								<th>Detail</th>
								<th>Pilih Data</th>
								<th>Tahun 1</th>
								<th>Pembayaran Kewajiban Pajak</th>
								<th>Tahun 2</th>
								<th>Pembayaran Kewajiban Pajak</th>
								<th>Tahun 1</th>
								<th>Omset 1</th>
								<th>Tahun 2</th>
								<th>Omset 2</th>
								<th>Tahun 3</th>
								<th>Omset 3</th>
								<th>Tahun 4</th>
								<th>Omset 4</th>
								<th>Tahun 5</th>
								<th>Omset 5</th>
								<th>File Persyaratan PPH & Omset </th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($record as $row) :?>
							<tr>
								<td></td>
								<td>
									<div class="d-flex align-items-center mr-3" data-inbox="actions">
										<label class="checkbox checkbox-outline checkbox-outline-2x checkbox-dark mr-3">
											<input type="checkbox" name="" class="call-checkbox"/>
											<span></span>
										</label>

									</div>

								</td>
								<td><?= $row['thn_spt1'] ;?></td>
								<td><?= $row['spt1'] ;?></td>
								<td><?= $row['thn_spt2'] ;?></td>
								<td><?= $row['spt1'] ;?></td>
								<td><?= $row['thn_omset1'] ;?></td>
								<td><?= $row['omset1'] ;?></td>
								<td><?= $row['thn_omset2'] ;?></td>
								<td><?= $row['omset2'] ;?></td>
								<td><?= $row['thn_omset3'] ;?></td>
								<td><?= $row['omset3'] ;?></td>
								<td><?= $row['thn_omset4'] ;?></td>
								<td><?= $row['omset4'] ;?></td>
								<td><?= $row['thn_omset5'] ;?></td>
								<td><?= $row['omset5'] ;?></td>
								<td><a href="<?=base_url('get_file/get_bu_22/'.$row['persyaratan']) ;?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>
								<td></td>
								<td></td>
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
							<h3 class="card-label"><span class="text-danger">Detele PPH & OMSET</span></h3>
						</div>
					</div><?php echo form_open_multipart('keuangan/delete_pph_omset/', 'class="form-horizontal form-validate-jquery"');?>
					<div class="card-body">
						<div class="form-group row">
							<div class="col-lg-8">
									<label class="control-label">NIB <span class="text-danger">*</span></label>
									<input type="text" id='nama_delete'  name="sub" value=<?= $this->session->userdata('id_user'); ;?> readonly class="form-control">
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
							<h3 class="card-label">Input PPH & OMSET</h3>
						</div>
					</div>

	        <?php echo form_open_multipart('keuangan/insert_pph_omset/', 'class="form-horizontal form-validate-jquery" id="form-upload-1"');?>
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
											<input type="text" id="thn_1" name="thn_1" required="required" class="form-control">
			            </div>
			            <div class="col-lg-6">
			                <label class="control-label">Pembayaran Kewajiban Pajak <span class="text-danger">*</span></label>
											<input type="text" id="pajak_1" name="pajak_1"  class="form-control">

										</div>
			          </div>
								<div class="form-group row">
			            <div class="col-lg-6">
			                <label class="control-label">Tahun 2 <span class="text-danger"></span></label>
											<input type="text" id="thn_2" name="thn_2" required="required" class="form-control">

										</div>
			            <div class="col-lg-6">
			                <label class="control-label">Pembayaran Kewajiban Pajak <span class="text-danger">*</span></label>
											<input type="text"  id="pajak_2" name="pajak_2" class="form-control">

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
											<input type="text" id="thn_1_omset" name="thn_1_omset" required="required" class="form-control">

										</div>
			            <div class="col-lg-6">
			                <label class="control-label">Omset <span class="text-danger">*</span></label>
											<input type="text"  id="omset_1" name="omset_1" class="form-control">

										</div>
			          </div>
								<div class="form-group row">
			            <div class="col-lg-6">
			                <label class="control-label">Tahun 2 <span class="text-danger"></span></label>
											<input type="text" id="thn_2_omset" name="thn_2_omset" required="required" class="form-control">

										</div>
			            <div class="col-lg-6">
			                <label class="control-label">Omset <span class="text-danger">*</span></label>
											<input type="text"  id="omset_2" name="omset_2" class="form-control">

										</div>
			          </div>
								<div class="form-group row">
			            <div class="col-lg-6">
			                <label class="control-label">Tahun 3 <span class="text-danger"></span></label>
											<input type="text" id="thn_3_omset" name="thn_3_omset" required="required" class="form-control">

										</div>
			            <div class="col-lg-6">
			                <label class="control-label">Omset <span class="text-danger">*</span></label>
											<input type="text"  id="omset_3" name="omset_3" class="form-control">

										</div>
			          </div>
								<div class="form-group row">
			            <div class="col-lg-6">
			                <label class="control-label">Tahun 4 <span class="text-danger"></span></label>
											<input type="text" id="thn_4_omset" name="thn_4_omset" required="required" class="form-control">

										</div>
			            <div class="col-lg-6">
			                <label class="control-label">Omset <span class="text-danger">*</span></label>
											<input type="text"  id="omset_4" name="omset_4" class="form-control">

										</div>
			          </div>
								<div class="form-group row">
			            <div class="col-lg-6">
			                <label class="control-label">Tahun 5 <span class="text-danger"></span></label>
											<input type="text" id="thn_5_omset" name="thn_5_omset" required="required" class="form-control">

										</div>
			            <div class="col-lg-6">
			                <label class="control-label">Omset <span class="text-danger">*</span></label>
											<input type="text"  id="omset_5" name="omset_5" class="form-control">

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
							<h3 class="card-label">Edit PPH & OMSET</h3>
						</div>
					</div>

	        <?php echo form_open_multipart('keuangan/update_pph_omset/', 'class="form-horizontal form-validate-jquery" id="form-upload-2"');?>
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
											<input type="text" id="thn_1_edit" name="thn_1" required="required" class="form-control">
			            </div>
			            <div class="col-lg-6">
			                <label class="control-label">Pembayaran Kewajiban Pajak <span class="text-danger">*</span></label>
											<input type="text" id="pajak_1_edit" name="pajak_1"  class="form-control">

										</div>
			          </div>
								<div class="form-group row">
			            <div class="col-lg-6">
			                <label class="control-label">Tahun 2 <span class="text-danger"></span></label>
											<input type="text" id="thn_2_edit" name="thn_2" required="required" class="form-control">

										</div>
			            <div class="col-lg-6">
			                <label class="control-label">Pembayaran Kewajiban Pajak <span class="text-danger">*</span></label>
											<input type="text"  id="pajak_2_edit" name="pajak_2" class="form-control">

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
											<input type="text" id="thn_1_omset_edit" name="thn_1_omset" required="required" class="form-control">

										</div>
			            <div class="col-lg-6">
			                <label class="control-label">Omset <span class="text-danger">*</span></label>
											<input type="text"  id="omset_1_edit" name="omset_1" class="form-control">

										</div>
			          </div>
								<div class="form-group row">
			            <div class="col-lg-6">
			                <label class="control-label">Tahun 2 <span class="text-danger"></span></label>
											<input type="text" id="thn_2_omset_edit" name="thn_2_omset"  class="form-control">

										</div>
			            <div class="col-lg-6">
			                <label class="control-label">Omset <span class="text-danger">*</span></label>
											<input type="text"  id="omset_2_edit" name="omset_2" class="form-control">

										</div>
			          </div>
								<div class="form-group row">
			            <div class="col-lg-6">
			                <label class="control-label">Tahun 3 <span class="text-danger"></span></label>
											<input type="text" id="thn_3_omset_edit" name="thn_3_omset"  class="form-control">

										</div>
			            <div class="col-lg-6">
			                <label class="control-label">Omset <span class="text-danger">*</span></label>
											<input type="text"  id="omset_3_edit" name="omset_3" class="form-control">

										</div>
			          </div>
								<div class="form-group row">
			            <div class="col-lg-6">
			                <label class="control-label">Tahun 4 <span class="text-danger"></span></label>
											<input type="text" id="thn_4_omset_edit" name="thn_4_omset"  class="form-control">

										</div>
			            <div class="col-lg-6">
			                <label class="control-label">Omset <span class="text-danger">*</span></label>
											<input type="text"  id="omset_4_edit" name="omset_4" class="form-control">

										</div>
			          </div>
								<div class="form-group row">
			            <div class="col-lg-6">
			                <label class="control-label">Tahun 5 <span class="text-danger"></span></label>
											<input type="text" id="thn_5_omset_edit" name="thn_5_omset"  class="form-control">

										</div>
			            <div class="col-lg-6">
			                <label class="control-label">Omset <span class="text-danger">*</span></label>
											<input type="text"  id="omset_5_edit" name="omset_5" class="form-control">

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
					url : "<?php echo base_url('keuangan/cek_pph_omset'); ?>",
					type : "POST",
					data : {id : sub,},
					success : function(data) {

						response = jQuery.parseJSON(data);
						record=response.record;
						$("#thn_1_edit").val(record[0].thn_spt1);
						$("#pajak_1_edit").val(record[0].spt1);
						$("#thn_2_edit").val(record[0].thn_spt2);
						$("#pajak_2_edit").val(record[0].spt1);
						$("#thn_1_omset_edit").val(record[0].thn_spt1);
						$("#omset_1_edit").val(record[0].omset1);
						$("#thn_2_omset_edit").val(record[0].thn_spt2);
						$("#omset_2_edit").val(record[0].omset2);
						$("#thn_3_omset_edit").val(record[0].thn_spt3);
						$("#omset_3_edit").val(record[0].omset3);
						$("#thn_4_omset_edit").val(record[0].thn_spt4);
						$("#omset_4_edit").val(record[0].omset4);
						$("#thn_5_omset_edit").val(record[0].thn_spt5);
						$("#omset_5_edit").val(record[0].omset5);

						},
						error: function(xhr, status, error) {
							var err = eval("(" + xhr.responseText + ")");
							alert(err.Message);
						}
				});
		}


	});
</script>

<script type="text/javascript">
	$(".file-1").fileinput({
		maxFileSize: 20000,
    allowedFileExtensions: ['jpg', 'png', 'pdf'],
    showUpload: false,
    dropZoneEnabled: false
	});
	var submitCounter = 0;
	$(function () {
		var inputFile = $('input[name=upload_persyaratan]');
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
															window.location.replace("<?php echo base_url('keuangan/pph_omset');?>");
														}
														else {
															window.location.replace("<?php echo base_url('keuangan/pph_omset');?>");

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
								$("form#form-upload-2").submit(function () {
									submitCounter++;
									event.preventDefault();
									var fileToUpload = inputFile[0].files[0];
																// make sure there is file to upload


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
																					window.location.replace("<?php echo base_url('keuangan/pph_omset');?>");
																				}
																				else {
																					window.location.replace("<?php echo base_url('keuangan/pph_omset');?>");

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


														});
		$('body').on('change.bs.fileinput', function (e) {
			$('.progress').hide();
			progressBar.text("0%");
			progressBar.css({width: "0%"});
		});
	});


</script>
