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
						<li class="breadcrumb-item text-dark">
							<a href="" class="text-muted">Badan Usaha</a>
						</li>
						<li class="breadcrumb-item text-dark">
							<a href="" class="text-muted">Komisaris & Direksi</a>
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
						<h3 class="card-label">Data Komisaris & Direksi</h3>
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
								<th>Nama Pengurus</th>
								<th>Tempat Lahir</th>
								<th>Status Jabatan</th>
								<th>No KTP</th>
								<th>NPWP</th>

								<th>Tanggal Lahir</th>

								<th>Jalan </th>
								<th>Kode Pos</th>
								<th>Propinsi</th>
								<th>Kabupaten</th>

									<th>File KTP</th>

								<th>File NPWP</th>

							</tr>
						</thead>
						<tbody>
							<?php foreach($record as $row) :?>
							<tr>
								<td ></td>
								<td>
									<div class="d-flex align-items-center mr-3" data-inbox="actions">
										<label class="checkbox checkbox-inline checkbox-dark flex-shrink-0 mr-3">
											<input type="checkbox" name="<?= $row['id_pengurus'] ;?>" value="<?= $row['nama'] ;?>" class="call-checkbox"/>
											<span></span>
										</label>

									</div>

								</td>
								<td><?= $row['nama'] ;?></td>
								<td><?= $row['tempat_lahir'] ;?></td>
								<td><?= $row['id_jabatan'] ;?></td>
								<td><?= $row['no_ktp'] ;?></td>
								<td><?= $row['npwp'] ;?></td>

								<td><?= $row['tgl_lahir'] ;?></td>
								<td><?= $row['alamat'] ;?></td>
								<td><?= $row['kodepos'] ;?></td>
								<td><?= $row['id_propinsi'] ;?></td>
								<td><?= $row['id_kabupaten'] ;?></td>

								<td><a href="<?=base_url('get_file/get_bu_14/'.$row['persyaratan_14']) ;?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>
								<td><a href="<?=base_url('get_file/get_bu_15/'.$row['persyaratan_15']) ;?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>



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
							<h3 class="card-label"><span class="text-danger">Detele Pengurus</span></h3>
						</div>
					</div><?php echo form_open_multipart('pengurus/delete/', 'class="form-horizontal form-validate-jquery"');?>
					<div class="card-body">
						<input type="hidden" id='id_delete' name='id' class="form-control" />

						<div class="form-group row">
							<div class="col-lg-8">
									<label class="control-label">Nama Pengurus <span class="text-danger">*</span></label>
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
								<i class="flaticon-file-1 text-primary"></i>
							</span>
							<h3 class="card-label">Input Pengurus</h3>
						</div>
					</div>

					<?php echo form_open_multipart('pengurus/insert/', 'class="form-horizontal form-validate-jquery" id="form-upload-1"');?>
						<div class="card-body">
							<div class="form-group row">
								<div class="col-lg-3">
										<label class="control-label">Gelar depan <span class="text-danger"></span></label>
										<input type="text" id="gelar_depan" name="gelar_depan" class="form-control">
								</div>
								<div class="col-lg-6">
										<label class="control-label">Nama Lengkap <span class="text-danger">*</span></label>
										<input type="text" id="nama_pengurus" onkeyup="capitalize(this);" name="nama_pengurus" required="required" class="form-control">
								</div>
								<div class="col-lg-3">
										<label class="control-label">Gelar Belakang <span class="text-danger"></span></label>
										<input type="text" id="gelar_belakang"  name="gelar_belakang" class="form-control">
								</div>
							</div>
						<div class="form-group row">
							<div class="col-lg-6">
									<label class="control-label">Tempat Lahir <span class="text-danger">*</span></label>
									<input type="text" id="tempat_lahir" name="tempat_lahir" required="required" class="form-control">
							</div>
							<div class="col-lg-6">
									<label class="control-label">Status Jabatan <span class="text-danger">*</span></label>
									<select name="status_jabatan" id="status_jabatan" class="form-control" required="required">
											<option value="">Pilih Status Jabatan</option>
											<?php foreach ($jabatan as $row9) :?>
												<option value="<?php echo $row9['id_jabatan'] ;?>"> - <?php echo $row9['Nama_Jabatan'] ;?></option>
											<?php endforeach ;?>

									</select>
								</div>
						</div>
						<div class="form-group row">
							<div class="col-lg-6">
									<label class="control-label">No KTP <span class="text-danger">*</span></label>
									<input type="text" id="ktp" name="ktp"  required="required" class="form-control">
							</div>
							<div class="col-lg-6">
									<label class="control-label">NPWP <span class="text-danger">*</span></label>
									<input type="text" id="npwp" name="npwp" placeholder="99.999.999.9-999.999" required="required" class="form-control">

								</div>
						</div>
						<div class="form-group row">

							<div class="col-lg-6">
									<label class="control-label">Tanggal Lahir <span class="text-danger">*</span></label>
									<input type="text" id="tgl_1" name="tgl_lahir" value="2020-01-01" required="required" class="form-control">

								</div>
						</div>



						<div class="card card-custom">
							<div class="card-header">
								<div class="card-title">
									<h3 class="card-label">Alamat
									<small>Sesuai KTP</small></h3>
								</div>
							</div>
							<div class="card-body">
								<div class="form-group row">
									<div class="col-lg-6">
											<label class="control-label">Jalan <span class="text-danger"></span></label>
											<input type="text" id="jalan" name="jalan" class="form-control">
									</div>
									<div class="col-lg-6">
											<label class="control-label">Kode Pos <span class="text-danger">*</span></label>
											<input type="text" id="kode_pos" name="kode_pos"  class="form-control">

										</div>
								</div>
								<div class="form-group row">
									<div class="col-lg-6">
											<label class="control-label">Propinsi <span class="text-danger"></span></label>
											<select name="propinsi" onchange="getval(this)"  id="propinsi"class="form-control" required="required">
													<option value="">Pilih Provinsi</option>
													<?php foreach ($propinsi as $row2) :?>
														<option value="<?php echo $row2['ID_Propinsi'] ;?>"> - <?php echo $row2['Nama'] ;?></option>
													<?php endforeach ;?>
											</select>
										</div>
									<div class="col-lg-6">
											<label class="control-label">Kabupaten <span class="text-danger">*</span></label>
											<select name="kabupaten" id="kabupaten"  class="form-control" required="required">
													<option value="">Pilih Kabupaten</option>

											</select>
										</div>
								</div>
							</div>
						</div>



						<div class="form-group row">
							<div class="col-lg-6">
								<label class="control-label">Upload KTP <span class="text-danger">*</span></label>
								<input class="file-ktp" name="file_ktp" type="file" data-preview-file-type="text">
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
								<label class="control-label">Upload NPWP <span class="text-danger">*</span></label>
								<input class="file-npwp" name="file_npwp" type="file" data-preview-file-type="text">
								<span class="help-block">
									Accepted formats: pdf, zip. Max file size 20Mb
								</span>
								<div class="progress" style="display:none;">
									<div id="progress-bar-2" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
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
								<i class="flaticon-file-1 text-primary"></i>
							</span>
							<h3 class="card-label">Edit Pengurus</h3>
						</div>
					</div>

					<?php echo form_open_multipart('pengurus/update/', 'class="form-horizontal form-validate-jquery" id="form-upload-2"');?>
					<input type="hidden" id="id_edit" name="id" class="form-control">
						<div class="card-body">
							<div class="form-group row">
								<div class="col-lg-12">
										<label class="control-label">Nama <span class="text-danger"></span></label>
										<input type="text" id="nama_pengurus_edit" name="nama_pengurus" class="form-control">
								</div>

							</div>
						<div class="form-group row">
							<div class="col-lg-6">
									<label class="control-label">Tempat Lahir <span class="text-danger">*</span></label>
									<input type="text" id="tempat_lahir_edit" name="tempat_lahir" required="required" class="form-control">
							</div>
							<div class="col-lg-6">
									<label class="control-label">Status Jabatan <span class="text-danger">*</span></label>
									<select name="status_jabatan" id="status_jabatan_edit" class="form-control" required="required">
											<option value="">Pilih Status Jabatan</option>
											<?php foreach ($jabatan as $row9) :?>
												<option value="<?php echo $row9['id_jabatan'] ;?>"> - <?php echo $row9['Nama_Jabatan'] ;?></option>
											<?php endforeach ;?>

									</select>
								</div>
						</div>
						<div class="form-group row">
							<div class="col-lg-6">
									<label class="control-label">No KTP <span class="text-danger">*</span></label>
									<input type="text" id="ktp_edit" name="ktp"  required="required" class="form-control">
							</div>
							<div class="col-lg-6">
									<label class="control-label">NPWP <span class="text-danger">*</span></label>
									<input type="text" id="npwp_edit" name="npwp" placeholder="99.999.999.9-999.999" required="required" class="form-control">

								</div>
						</div>
						<div class="form-group row">

							<div class="col-lg-6">
									<label class="control-label">Tanggal Lahir <span class="text-danger">*</span></label>
									<input type="text" id="tgl_1_edit" name="tgl_lahir" value="2020-01-01" required="required" class="form-control">

								</div>
						</div>



						<div class="card card-custom">
							<div class="card-header">
								<div class="card-title">
									<h3 class="card-label">Alamat
									<small>Sesuai KTP</small></h3>
								</div>
							</div>
							<div class="card-body">
								<div class="form-group row">
									<div class="col-lg-6">
											<label class="control-label">Jalan <span class="text-danger"></span></label>
											<input type="text" id="jalan_edit" name="jalan" class="form-control">
									</div>
									<div class="col-lg-6">
											<label class="control-label">Kode Pos <span class="text-danger">*</span></label>
											<input type="text" id="kode_pos_edit" name="kode_pos"  class="form-control">

										</div>
								</div>
								<div class="form-group row">
									<div class="col-lg-6">
											<label class="control-label">Propinsi <span class="text-danger"></span></label>
											<select name="propinsi" onchange="getval(this)"  id="propinsi_edit"class="form-control" required="required">
													<option value="">Pilih Provinsi</option>
													<?php foreach ($propinsi as $row2) :?>
														<option value="<?php echo $row2['ID_Propinsi'] ;?>"> - <?php echo $row2['Nama'] ;?></option>
													<?php endforeach ;?>
											</select>
										</div>
									<div class="col-lg-6">
											<label class="control-label">Kabupaten <span class="text-danger">*</span></label>
											<select name="kabupaten" id="kabupaten_edit"  class="form-control" required="required">
												<?php foreach ($kabupaten as $row_kab) :?>
													<option value="<?php echo $row_kab['ID_Kabupaten'] ;?>"> - <?php echo $row_kab['Nama'] ;?></option>

												<?php endforeach ;?>
											</select>
										</div>
								</div>
							</div>
						</div>



						<div class="form-group row">
							<div class="col-lg-6">
								<label class="control-label">Upload KTP <span class="text-danger">*</span></label>
								<input class="file-ktpedit" name="file_ktp" type="file" data-preview-file-type="text">
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
								<label class="control-label">Upload NPWP <span class="text-danger">*</span></label>
								<input class="file-npwpedit" name="file_npwp" type="file" data-preview-file-type="text">
								<span class="help-block">
									Accepted formats: pdf, zip. Max file size 20Mb
								</span>
								<div class="progress" style="display:none;">
									<div id="progress-bar-2" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
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
					url : "<?php echo base_url('pengurus/search_pengurus'); ?>",
					type : "POST",
					data : {id : sub,},
					success : function(data) {

						response = jQuery.parseJSON(data);
						record=response.record;
						$("#nama_pengurus_edit").val(record[0].nama);
						$("#tempat_lahir_edit").val(record[0].alamat);
						$("#status_jabatan_edit").val(record[0].id_jabatan).attr("selected","selected");
						$("#ktp_edit").val(record[0].no_ktp);
						$("#npwp_edit").val(record[0].npwp);
						$("#jabatan_bu_edit").val(record[0].jabatan_bu);
						$("#tgl_1_edit").val(record[0].tgl_lahir);
					//	$("#pjbu").val(record[0].Nama);
						$("#jalan_edit").val(record[0].tempat_lahir);
						$("#kode_pos_edit").val(record[0].kodepos);
						$("#propinsi_edit").val(record[0].id_propinsi).attr("selected","selected");
						$("#kabupaten_edit").val(record[0].id_kabupaten).attr("selected","selected");
						$("#jenjang_edit").val(record[0].id_jenjang);
						$("#ijazah_edit").val(record[0].no_ijazah);

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

function getval(sel)
{
	document.getElementById("kabupaten").options.length = 0;

	$.ajax({
			url : "<?php echo base_url('pengurus/kabupaten'); ?>",
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

function getval2(sel)
{

	$.ajax({
			url : "<?php echo base_url('ajax/get_pengurus'); ?>",
			type : "POST",
			data : {id_personal : sel.value,},
			success : function(data) {

				response = jQuery.parseJSON(data);
				console.log( JSON.parse(data) );
				pengurus=response.record;
				if(pengurus.length!=0){
					new PNotify({
							title: 'Notification',
							text: 'Pengurus ini sudah terdaftar di badan usaha lain',
							addclass: 'bg-warning'
					});
				}

				},
				error: function(xhr, status, error) {
					var err = eval("(" + xhr.responseText + ")");
					alert(err.Message);
				}
		});
}
</script>
<script type="text/javascript">
	$(".file-ktp").fileinput({
		maxFileSize: 20000,
    allowedFileExtensions: ['jpg', 'png', 'pdf'],
    showUpload: false,
    dropZoneEnabled: false
	});
	$(".file-npwp").fileinput({
		maxFileSize: 20000,
    allowedFileExtensions: ['jpg', 'png', 'pdf'],
    showUpload: false,
    dropZoneEnabled: false
	});
	$(".file-pjbu").fileinput({
		maxFileSize: 20000,
    allowedFileExtensions: ['jpg', 'png', 'pdf'],
    showUpload: false,
    dropZoneEnabled: false
	});
	$(".file-pns").fileinput({
		maxFileSize: 20000,
    allowedFileExtensions: ['jpg', 'png', 'pdf'],
    showUpload: false,
    dropZoneEnabled: false
	});
	$(".file-riwayat").fileinput({
		maxFileSize: 20000,
    allowedFileExtensions: ['jpg', 'png', 'pdf'],
    showUpload: false,
    dropZoneEnabled: false
	});

	var submitCounter = 0;
	$(function () {
		var inputFile = $('input[name=file_npwp]');
		var uploadURI = $('#form-upload-1').attr('action');
		var progressBar = $('#progress-bar-1');
		var progressBar2 = $('#progress-bar-2');
		var progressBar3 = $('#progress-bar-3');
		var progressBar4 = $('#progress-bar-4');
		var progressBar5 = $('#progress-bar-5');


		$("form#form-upload-1").submit(function () {
			submitCounter++;
		var n1=document.querySelector('#nama_pengurus').value;
		var n2=document.querySelector('#ktp').value;
		var n3=document.querySelector('#propinsi').value;
		var n4=document.querySelector('#kabupaten').value;
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
															window.location.replace("<?php echo base_url('pengurus');?>");
														}
														else {
															window.location.replace("<?php echo base_url('pengurus');?>");

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
											toastr["warning"]("This is can be clicked only once.", "Notification");

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

<script type="text/javascript">
	$(".file-ktpedit").fileinput({
		maxFileSize: 20000,
    allowedFileExtensions: ['jpg', 'png', 'pdf'],
    showUpload: false,
    dropZoneEnabled: false
	});
	$(".file-npwpedit").fileinput({
		maxFileSize: 20000,
    allowedFileExtensions: ['jpg', 'png', 'pdf'],
    showUpload: false,
    dropZoneEnabled: false
	});
	$(".file-pjbuedit").fileinput({
		maxFileSize: 20000,
    allowedFileExtensions: ['jpg', 'png', 'pdf'],
    showUpload: false,
    dropZoneEnabled: false
	});
	$(".file-pnsedit").fileinput({
		maxFileSize: 20000,
    allowedFileExtensions: ['jpg', 'png', 'pdf'],
    showUpload: false,
    dropZoneEnabled: false
	});
	$(".file-riwayatedit").fileinput({
		maxFileSize: 20000,
    allowedFileExtensions: ['jpg', 'png', 'pdf'],
    showUpload: false,
    dropZoneEnabled: false
	});

	var submitCounter = 0;
	$(function () {
		var inputFile = $('input[name=file_npwp]');
		var uploadURI = $('#form-upload-2').attr('action');
		var progressBar = $('#progress-bar-1');
		var progressBar2 = $('#progress-bar-2');
		var progressBar3 = $('#progress-bar-3');
		var progressBar4 = $('#progress-bar-4');
		var progressBar5 = $('#progress-bar-5');


		$("form#form-upload-2").submit(function () {
			submitCounter++;
		event.preventDefault();

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
															window.location.replace("<?php echo base_url('pengurus');?>");
														}
														else {
															window.location.replace("<?php echo base_url('pengurus');?>");

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
