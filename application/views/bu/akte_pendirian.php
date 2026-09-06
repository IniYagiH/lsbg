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
							<a href="" class="text-muted">Akte Pendirian</a>
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
						<h3 class="card-label">Data Akte Pendirian</h3>
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
								<th>Nomor Akte</th>
								<th>Nama Notaris</th>
								<th>Alamat Notaris</th>
								<th>Tanggal Akte</th>
								<th>Propinsi Notaris</th>
								<th>Kabupaten/Kota</th>
								<th>Nama Pengurus</th>
								<th>Status Jabatan</th>
								<th>Nomor Menteri Kehakiman dan HAM </th>
								<th>Tanggal Mentri</th>
								<th>Nomor Pengadilan Negeri</th>
								<th>Tanggal Pengadilan Negeri </th>
								<th>Nomor Lembar Negara </th>
								<th>Tanggal Lembar Negara </th>
								<th>File Persyaratan Akte Pendirian</th>
								<th>File Surat Keputusan Menteri Hukum dan HAM </th>
								<th></th>


							</tr>
						</thead>
						<tbody>
							<?php if(!empty($record)) :?>
							<?php foreach($record as $row) :?>
							<tr>
								<td></td>
								<td>
									<div class="d-flex align-items-center mr-3" data-inbox="actions">
										<label class="checkbox checkbox-outline checkbox-outline-2x checkbox-dark mr-3">
											<input type="checkbox" name="<?= $row['nomer_akte'] ;?>" class="call-checkbox"/>
											<span></span>
										</label>

									</div>

								</td>
								<td><?= $row['nomer_akte'] ;?></td>
								<td><?= $row['nama_notaris'] ;?></td>
								<td><?= $row['alamat'] ;?></td>
								<td><?= $row['tgl_akte'] ;?></td>
								<td><?= $row['propinsi_akte'] ;?></td>
								<td><?= $row['kabupaten_akte'] ;?></td>
								<td><?= $row['nama_pengurus'] ;?></td>
								<td><?= $row['id_jabatan'] ;?></td>
								<td><?= $row['no_pm'] ;?></td>
								<td><?= $row['tgl_pm'] ;?></td>
								<td><?= $row['no_pn'] ;?></td>
								<td><?= $row['tgl_pn'] ;?></td>
								<td><?= $row['no_ln'] ;?></td>
								<td><?= $row['tgl_ln'] ;?></td>

								<td><a href="<?=base_url('get_file/get_bu_7/'.$row['persyaratan']) ;?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>
								<td><a href="<?=base_url('get_file/get_bu_55/'.$row['persyaratan_55']) ;?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>

								<td></td>
							</tr>
						<?php endforeach ;?>
					<?php endif ;?>
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
					</div><?php echo form_open_multipart('akte/delete_pendirian/', 'class="form-horizontal form-validate-jquery"');?>
					<div class="card-body">
						<div class="form-group row">
							<div class="col-lg-8">
									<label class="control-label">NIB <span class="text-danger">*</span></label>
									<input type="text"   id='nama_delete'  value="<?= $this->session->userdata('id_user') ;?>" readonly class="form-control">
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
							<h3 class="card-label">Input Akte Pendirian</h3>
						</div>
					</div>

	        <?php echo form_open_multipart('akte/insert_pendirian/', 'class="form-horizontal form-validate-jquery" id="form-upload-1"');?>
	          <div class="card-body">

	          <div class="form-group row">
	            <div class="col-lg-6">
	                <label class="control-label">Nomor Akte <span class="text-danger">*</span></label>
									<input type="text"  id="nomor_akte" name="nomor_akte" required="required" class="form-control" >
	            </div>
	            <div class="col-lg-6">
	                <label class="control-label">Nama Notaris <span class="text-danger">*</span></label>
									<input type="text"  id="nama_notaris" name="nama_notaris" required="required" class="form-control">

								</div>
	          </div>
						<div class="form-group row">
	            <div class="col-lg-6">
	                <label class="control-label">Alamat Notaris <span class="text-danger">*</span></label>
									<input type="text"  id="alamat" name="alamat" class="form-control">

								 </div>
	            <div class="col-lg-6">
	                <label class="control-label">Tanggal Akte <span class="text-danger">*</span></label>
									<input type="text"  name="tgl_akte" class="form-control" id="tgl_1" >

								</div>
	          </div>
						<div class="form-group row">
	            <div class="col-lg-6">
	                <label class="control-label">Propinsi Notaris <span class="text-danger"></span></label>

										<select name="propinsi" onchange="getval(this)" id="propinsi"class="form-control" required="required">
											<option value="">Pilih Provinsi</option>
											<?php foreach ($propinsi as $row2) :?>
											<option value="<?php echo $row2['ID_Propinsi'] ;?>"> - <?php echo $row2['Nama'] ;?></option>
											<?php endforeach ;?>
										</select>


								</div>
	            <div class="col-lg-6">
	                <label class="control-label">Kabupaten/Kota <span class="text-danger">*</span></label>
									<select name="kabupaten"  id="kabupaten" class="form-control" required="required">
											<option value="">Pilih Kabupaten</option>
									</select>
								</div>
	          </div>
						<div class="form-group row">
	            <div class="col-lg-6">
	                <label class="control-label">Nama Pengurus <span class="text-danger"></span></label>
									<input type="text"  id="nama_pengurus" name="nama_pengurus" class="form-control">

								</div>
	            <div class="col-lg-6">
	                <label class="control-label">Id Jabatan <span class="text-danger">*</span></label>

										<select name="id_jabatan" id="status_jabatan" class="form-control" required="required">
												<option value="">Pilih Status Jabatan</option>
												<?php foreach ($jabatan as $row9) :?>
												<option value="<?php echo $row9['id_jabatan'] ;?>"> - <?php echo $row9['Nama_Jabatan'] ;?></option>
												<?php endforeach ;?>
										</select>


								</div>
	          </div>


						<div class="card card-custom">
							<div class="card-header">
								<div class="card-title">
									<h3 class="card-label">Nomor Pengesahan
									<small>Sesuai Akte</small></h3>
								</div>
							</div>
							<div class="card-body">
								<div class="form-group row">
			            <div class="col-lg-6">
			                <label class="control-label">Menteri Kehakiman dan HAM <span class="text-danger"></span></label>
											<input type="text" id="mentri" name="mentri" class="form-control">

										</div>
			            <div class="col-lg-6">
			                <label class="control-label">Tanggal Mentri <span class="text-danger">*</span></label>
											<input type="text" name="tgl_mentri"  class="form-control" id="tgl_2">

										</div>
			          </div>
								<div class="form-group row">
			            <div class="col-lg-6">
			                <label class="control-label">Pengadilan Negeri <span class="text-danger"></span></label>
											<input type="text" id="pengadilan_negeri" name="pengadilan_negeri" class="form-control">

										</div>
			            <div class="col-lg-6">
			                <label class="control-label">Tanggal Pengadilan Negeri <span class="text-danger">*</span></label>
											<input type="text"  name="tgl_pn" class="form-control" id="tgl_3">

										</div>
			          </div>
								<div class="form-group row">
			            <div class="col-lg-6">
			                <label class="control-label">Lembar Negara <span class="text-danger"></span></label>
											<input type="text"  id="lembar_negara" name="lembar_negara" class="form-control">

										</div>
			            <div class="col-lg-6">
			                <label class="control-label">Tanggal Lembar Negara <span class="text-danger">*</span></label>
											<input type="text"  name="tgl_ln" class="form-control" id="tgl_4" >

										</div>
			          </div>

							</div>
						</div>



						<div class="form-group row">
							<div class="col-lg-6">
								<label class="control-label">Upload Persyaratan Akte Pendirian <span class="text-danger">*</span></label>
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
								<label class="control-label">Upload Surat Keputusan Menteri Hukum dan HAM  <span class="text-danger">*</span></label>
								<input class="file-2" name="upload_ham" type="file" data-preview-file-type="text">
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
								<i class="flaticon-file-1 text-dark"></i>
							</span>
							<h3 class="card-label">Edit Akte Pendirian</h3>
						</div>
					</div>

	        <?php echo form_open_multipart('akte/update_pendirian/', 'class="form-horizontal form-validate-jquery" id="form-upload-2"');?>
	          <div class="card-body">

	          <div class="form-group row">
	            <div class="col-lg-6">
	                <label class="control-label">Nomor Akte <span class="text-danger">*</span></label>
									<input type="text" id="nomor_akte_edit" name="nomor_akte" required="required" class="form-control" >
	            </div>
	            <div class="col-lg-6">
	                <label class="control-label">Nama Notaris <span class="text-danger">*</span></label>
									<input type="text"  id="nama_notaris_edit" name="nama_notaris" required="required" class="form-control">

								</div>
	          </div>
						<div class="form-group row">
	            <div class="col-lg-6">
	                <label class="control-label">Alamat Notaris <span class="text-danger">*</span></label>
									<input type="text" id="alamat_edit" name="alamat" class="form-control">

								 </div>
	            <div class="col-lg-6">
	                <label class="control-label">Tanggal Akte <span class="text-danger">*</span></label>
									<input type="text"  name="tgl_akte" class="form-control" id="tgl_1_edit" >

								</div>
	          </div>
						<div class="form-group row">
	            <div class="col-lg-6">
	                <label class="control-label">Propinsi Notaris <span class="text-danger"></span></label>


										<select name="propinsi" onchange="getval(this)" id="propinsi_edit"class="form-control" required="required">
											<option value="">Pilih Provinsi</option>
											<?php foreach ($propinsi as $row2) :?>
											<option value="<?php echo $row2['ID_Propinsi'] ;?>"> - <?php echo $row2['Nama'] ;?></option>
											<?php endforeach ;?>
										</select>

								</div>
	            <div class="col-lg-6">
	                <label class="control-label">Kabupaten/Kota <span class="text-danger">*</span></label>
									<select name="kabupaten"   id="kabupaten_edit" class="form-control" required="required">
											<option value="">Pilih Kabupaten</option>
											<?php foreach ($kabupaten as $row_kab) :?>
												<option value="<?php echo $row_kab['ID_Kabupaten'] ;?>"> - <?php echo $row_kab['Nama'] ;?></option>
											<?php endforeach ;?>
									</select>
								</div>
	          </div>
						<div class="form-group row">
	            <div class="col-lg-6">
	                <label class="control-label">Nama Pengurus <span class="text-danger"></span></label>
									<input type="text"  id="nama_pengurus_edit" name="nama_pengurus" class="form-control">

								</div>
	            <div class="col-lg-6">
	                <label class="control-label">Id Jabatan <span class="text-danger">*</span></label>


										<select name="id_jabatan" id="status_jabatan_edit" class="form-control" required="required">
												<option value="">Pilih Status Jabatan</option>
												<?php foreach ($jabatan as $row9) :?>
												<option value="<?php echo $row9['id_jabatan'] ;?>"> - <?php echo $row9['Nama_Jabatan'] ;?></option>
												<?php endforeach ;?>
										</select>

								</div>
	          </div>


						<div class="card card-custom">
							<div class="card-header">
								<div class="card-title">
									<h3 class="card-label">Nomor Pengesahan
									<small>Sesuai Akte</small></h3>
								</div>
							</div>
							<div class="card-body">
								<div class="form-group row">
			            <div class="col-lg-6">
			                <label class="control-label">Menteri Kehakiman dan HAM <span class="text-danger"></span></label>
											<input type="text"   id="mentri_edit" name="mentri" class="form-control">

										</div>
			            <div class="col-lg-6">
			                <label class="control-label">Tanggal Mentri <span class="text-danger">*</span></label>
											<input type="text"  name="tgl_mentri"  class="form-control" id="tgl_2_edit">

										</div>
			          </div>
								<div class="form-group row">
			            <div class="col-lg-6">
			                <label class="control-label">Pengadilan Negeri <span class="text-danger"></span></label>
											<input type="text" id="pengadilan_negeri_edit" name="pengadilan_negeri" class="form-control">

										</div>
			            <div class="col-lg-6">
			                <label class="control-label">Tanggal Pengadilan Negeri <span class="text-danger">*</span></label>
											<input type="text"  name="tgl_pn" class="form-control" id="tgl_3_edit">

										</div>
			          </div>
								<div class="form-group row">
			            <div class="col-lg-6">
			                <label class="control-label">Lembar Negara <span class="text-danger"></span></label>
											<input type="text"   id="lembar_negara_edit" name="lembar_negara" class="form-control">

										</div>
			            <div class="col-lg-6">
			                <label class="control-label">Tanggal Lembar Negara <span class="text-danger">*</span></label>
											<input type="text"  name="tgl_ln" class="form-control" id="tgl_4_edit" >

										</div>
			          </div>

							</div>
						</div>



						<div class="form-group row">
							<div class="col-lg-6">
								<label class="control-label">Upload Persyaratan Akte Pendirian <span class="text-danger">*</span></label>
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
 								<label class="control-label">Upload Surat Keputusan Menteri Hukum dan HAM  <span class="text-danger">*</span></label>
 								<input class="file-2" name="upload_ham" type="file" data-preview-file-type="text">
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
					url : "<?php echo base_url('akte/cek_pendirian'); ?>",
					type : "POST",
					data : {id : sub,},
					success : function(data) {

						response = jQuery.parseJSON(data);
						record=response.record;
						$("#nomor_akte_edit").val(record[0].nomer_akte);
						$("#nama_notaris_edit").val(record[0].nama_notaris);
						$("#alamat_edit").val(record[0].alamat);
						$("#tgl_1_edit").val(record[0].tgl_akte);
						$("#propinsi_edit").val(record[0].propinsi_akte).attr("selected","selected");
						$("#kabupaten_edit").val(record[0].kabupaten_akte).attr("selected","selected");
						$("#nama_pengurus_edit").val(record[0].nama_pengurus);
						$("#status_jabatan_edit").val(record[0].id_jabatan).attr("selected","selected");

						$("#mentri_edit").val(record[0].no_pm);
						$("#tgl_2_edit").val(record[0].tgl_pm);
						$("#pengadilan_negeri_edit").val(record[0].no_pn);
						$("#tgl_3_edit").val(record[0].tgl_pn);
						$("#lembar_negara_edit").val(record[0].no_ln);
						$("#tgl_4_edit").val(record[0].tgl_ln);


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
	document.getElementById("kabupaten").options.length = 0;

	$.ajax({
			url : "<?php echo base_url('akte/kabupaten'); ?>",
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
		allowedFileExtensions: ['jpg', 'png', 'pdf'],
		showUpload: false,
		dropZoneEnabled: false
	});
	$(".file-2").fileinput({
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
		var n1=document.querySelector('#nomor_akte').value;
		var n2=document.querySelector('#nama_notaris').value;
		var n3=document.querySelector('#propinsi').value;
		var n4=document.querySelector('#status_jabatan').value;
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
															window.location.replace("<?php echo base_url('akte/pendirian');?>");
														}
														else {
															window.location.replace("<?php echo base_url('akte/pendirian');?>");

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
											toastr["warning"]("ISubmit button can be clicked only once.", "Notification");

								 }
										}


									}else{
										toastr["warning"]("Isian * Harus diisi", "Notification");

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
																					window.location.replace("<?php echo base_url('akte/pendirian');?>");
																				}
																				else {
																					window.location.replace("<?php echo base_url('akte/pendirian');?>");

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
																	toastr["warning"]("ISubmit button can be clicked only once.", "Notification");

														 }




														});
		$('body').on('change.bs.fileinput', function (e) {
			$('.progress').hide();
			progressBar.text("0%");
			progressBar.css({width: "0%"});
		});
	});


</script>
