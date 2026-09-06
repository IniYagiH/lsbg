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
							<a href="" class="text-dark">Administrasi</a>
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
						<h3 class="card-label">Input Administrasi</h3>
					</div>
					<div class="card-toolbar">
						<a data-toggle="modal" data-target="#modal_delete" id="delete_data" class="btn btn-light-danger font-weight-bolder mr-2">
						<i class="la la-trash"></i>Delete Data</a>

						<a data-toggle="modal" data-target="#modal_edit" id="edit" class="btn btn-light-dark font-weight-bolder mr-2">
						<i class="la la-edit"></i>Edit Data</a>
						<?php if(empty($record)) :?>
						<a data-toggle="modal" data-target="#modal_input"  class="btn btn-dark font-weight-bolder">
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
								<th>NIB</th>
								<th>Nama Badan Usaha</th>
								<th>NPWP</th>
								<th>Email</th>
								<th>Email PIC</th>

								<th>Jenis Usaha</th>
								<th>Alamat Domisili Hukum</th>
								<th>Klasifikasi Jenis Usaha</th>
								<th>Propinsi Registrasi </th>
								<th>Kabupaten/Kota</th>
								<th>Telepon </th>
								<th>Faximili </th>
								<th>Kode Pos</th>
								<th>Website</th>
								<th>File NPWP</th>
								<th>File Izin Bagi Penanam Modal dari BKPM yang berlaku (Bagi PMA)</th>


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
								<td><?= $row['NIB'] ;?></td>
								<td><?= $row['nama'] ;?></td>
								<td><?= $row['npwp'] ;?></td>
								<td><?= $row['email'] ;?></td>
								<td><?= $row['email_pic'] ;?></td>

								<td><?= $row['jenis_usaha'] ;?></td>
								<td><?= $row['alamat_bu'] ;?></td>
								<td><?= $row['klasifikasi_jenis_usaha'] ;?></td>
								<td><?= $row['id_propinsi'] ;?></td>
								<td><?= $row['id_kabupaten'] ;?></td>
								<td><?= $row['telepon'] ;?></td>
								<td><?= $row['fax'] ;?></td>
								<td><?= $row['kodepos'] ;?></td>
								<td><?= $row['web'] ;?></td>
								<td><a href="<?=base_url('get_file/get_bu_9/'.$row['persyaratan_9']) ;?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>
								<td><a href="<?=base_url('get_file/get_bu_13/'.$row['persyaratan_13']) ;?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>


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
							<h3 class="card-label"><span class="text-danger">Detele Administrasi</span></h3>
						</div>
					</div><?php echo form_open_multipart('administrasi/delete/', 'class="form-horizontal form-validate-jquery" id="form-upload-1"');?>
					<div class="card-body">
						<div class="form-group row">
							<div class="col-lg-8">
									<label class="control-label">NIB <span class="text-danger">*</span></label>
									<input type="text" id='nib_delete' name='nib' class="form-control" <?php if($this->ion_auth->badan_usaha()) :?>value="<?= $this->session->userdata('id_user'); ;?>" readonly<?php endif ;?> />
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
							<h3 class="card-label">Input Administrasi</h3>
						</div>
					</div>

					<?php echo form_open_multipart('administrasi/insert/', 'class="form-horizontal form-validate-jquery" id="form-upload-1"');?>
						<div class="card-body">

						<div class="form-group row">
							<div class="col-lg-8">
									<label class="control-label">NIB <span class="text-danger">*</span></label>
									<input type="text" id='nib' name='nib' class="form-control" <?php if($this->ion_auth->badan_usaha()) :?>value="<?= $this->session->userdata('id_user'); ;?>" readonly<?php endif ;?> />
							</div>

						</div>
						<div class="form-group row">
							<div class="col-lg-6">
									<label class="control-label">Nama Badan Usaha <span class="text-danger">*</span></label>
									<input type="text"   id="nama_bu" name="nama_bu" required="required" class="form-control">
							</div>
							<div class="col-lg-6">
									<label class="control-label">NPWP <span class="text-danger">*</span></label>
									<input type="text"   id='npwp'  name="npwp" placeholder="99.999.999.9-999.999" required="required" class="form-control">
							</div>
						</div>
						<div class="form-group row">

							<div class="col-lg-6">
									<label class="control-label">Jenis Usaha <span class="text-danger">*</span></label>
									<select name="jenis_bu" id="jenis_bu"   class="form-control" required="required">
											<option value="1" selected>Pekerjaan Konstruksi</option>
									</select>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-lg-6">
									<label class="control-label">Alamat Domisili Hukum <span class="text-danger">*</span></label>
									<input type="text"   id="alamat" name="alamat" required="required" class="form-control">
							</div>
							<div class="col-lg-6">
									<label class="control-label">Klasifikasi Jenis Usaha <span class="text-danger">*</span></label>
									<select name="klasifikasi_jenis_usaha" id="klasifikasi_jenis_usaha"   class="form-control" required="required">
											<option value="">Pilih Klasifikasi Jenis Usaha</option>
											<?php foreach ($klasifikasi_jenis_usaha as $rowz) :?>
												<option value="<?php echo $rowz['id_klasifikasi_jenis_usaha'] ;?>"><?php echo $rowz['id_klasifikasi_jenis_usaha'] ;?> - <?php echo $rowz['Nama'] ;?></option>
											<?php endforeach ;?>
									</select>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-lg-6">
									<label class="control-label">Propinsi Registrasi <span class="text-danger">*</span></label>
									<select name="propinsi" onchange="getval(this)"   id="propinsi"class="form-control" required="required">
											<option value="">Pilih Provinsi</option>
											<?php foreach ($propinsi as $row2) :?>
												<option value="<?php echo $row2['ID_Propinsi'] ;?>"> - <?php echo $row2['Nama'] ;?></option>
											<?php endforeach ;?>
									</select>
							</div>
							<div class="col-lg-6">
									<label class="control-label">Kabupaten/Kota <span class="text-danger">*</span></label>
									<select name="kabupaten"   id="kabupaten" class="form-control" required="required">
											<option value="">Pilih Kabupaten</option>
											<?php foreach ($kabupaten as $row_kab) :?>
												<option value="<?php echo $row_kab['ID_Kabupaten'] ;?>"> - <?php echo $row_kab['Nama'] ;?></option>
											<?php endforeach ;?>
									</select>
							</div>
						</div>
						<div class="form-group row">

							<div class="col-lg-6">
									<label class="control-label">Telepon <span class="text-danger">*</span></label>
									<input type="text"   id="telepon" name="telepon" class="form-control" required="required"  placeholder="Enter phone number">

							</div>
							<div class="col-lg-6">
									<label class="control-label">Email PIC <span class="text-danger">*</span></label>
									<input type="text"   id="email_pic" name="email_pic" class="form-control" required="required"  placeholder="Email PIC">
							</div>
						</div>

						<div class="form-group row">
							<div class="col-lg-6">
									<label class="control-label">Faximili <span class="text-danger">*</span></label>
									<input type="text"   id="fax" name="faximili"  class="form-control">

							</div>
							<div class="col-lg-6">
									<label class="control-label">Email <span class="text-danger">*</span></label>
									<input type="email"   id="email" name="email" class="form-control" id="email" required="required" placeholder="lsbu@gmail.com">

							</div>
						</div>
						<div class="form-group row">
							<div class="col-lg-6">
									<label class="control-label">Kode Pos <span class="text-danger">*</span></label>
									<input type="text"   id="kode_pos" name="kodepos" class="form-control" placeholder="55555">

							</div>
							<div class="col-lg-6">
									<label class="control-label">Website <span class="text-danger">*</span></label>
									<input type="text"   id="url" name="url" class="form-control" placeholder="http://lpjk.net">

							</div>
						</div>
						<div class="form-group row">

							<div class="col-lg-6">
								<label class="control-label">NPWP <span class="text-danger">*</span></label>
								<input class="file-npwp" id="file_npwp" name="file_npwp" type="file" required="required" data-preview-file-type="text">
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
								<label class="control-label">Upload Izin Bagi Penanam Modal dari BKPM yang berlaku (Bagi PMA) <span class="text-danger">*</span></label>
								<input class="file-penanam" name="file_penanam" type="file" data-preview-file-type="text">
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
							<h3 class="card-label">Edit Administrasi</h3>
						</div>
					</div>

					<?php echo form_open_multipart('administrasi/update/', 'class="form-horizontal form-validate-jquery" id="form-upload-1"');?>
						<div class="card-body">

						<div class="form-group row">
							<div class="col-lg-8">
									<label class="control-label">NIB <span class="text-danger">*</span></label>
									<input type="text" id='nib_edit' name='nib' class="form-control" <?php if($this->ion_auth->badan_usaha()) :?>value="<?= $this->session->userdata('id_user'); ;?>" readonly<?php endif ;?> />
							</div>

						</div>
						<div class="form-group row">
							<div class="col-lg-6">
									<label class="control-label">Nama Badan Usaha <span class="text-danger">*</span></label>
									<input type="text"   id="nama_bu_edit" name="nama_bu" required="required" class="form-control">
							</div>
							<div class="col-lg-6">
									<label class="control-label">NPWP <span class="text-danger">*</span></label>
									<input type="text"   id='npwp_edit'  name="npwp" placeholder="99.999.999.9-999.999" required="required" class="form-control">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-lg-6">
									<label class="control-label">Sifat Usaha <span class="text-danger">*</span></label>
									<select name="sifat_usaha" id="sifat_usaha_edit"   class="form-control" required="required">
											<option value="">Pilih Sifat Usahaa</option>
											<?php foreach ($sifat_usaha as $row) :?>
												<option value="<?php echo $row['id_sifat_usaha'] ;?>"><?php echo $row['id_sifat_usaha'] ;?> - <?php echo $row['Nama'] ;?></option>
											<?php endforeach ;?>
									</select>
							</div>
							<div class="col-lg-6">
									<label class="control-label">Jenis Usaha <span class="text-danger">*</span></label>
									<select name="jenis_bu" id="jenis_bu_edit"   class="form-control" required="required">
											<option value="2" selected>Pekerjaan Konstruksi Terintegrasi</option>

									</select>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-lg-6">
									<label class="control-label">Alamat Domisili Hukum <span class="text-danger">*</span></label>
									<input type="text"   id="alamat_edit" name="alamat" required="required" class="form-control">
							</div>
							<div class="col-lg-6">
									<label class="control-label">Klasifikasi Jenis Usaha <span class="text-danger">*</span></label>
									<select name="klasifikasi_jenis_usaha" id="klasifikasi_jenis_usaha_edit"   class="form-control" required="required">
											<option value="">Pilih Klasifikasi Jenis Usaha</option>
											<?php foreach ($klasifikasi_jenis_usaha as $rowz) :?>
												<option value="<?php echo $rowz['id_klasifikasi_jenis_usaha'] ;?>"><?php echo $rowz['id_klasifikasi_jenis_usaha'] ;?> - <?php echo $rowz['Nama'] ;?></option>
											<?php endforeach ;?>
									</select>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-lg-6">
									<label class="control-label">Propinsi Registrasi <span class="text-danger">*</span></label>
									<select name="propinsi" onchange="getval(this)"   id="propinsi_edit"class="form-control" required="required">
											<option value="">Pilih Provinsi</option>
											<?php foreach ($propinsi as $row2) :?>
												<option value="<?php echo $row2['ID_Propinsi'] ;?>"> - <?php echo $row2['Nama'] ;?></option>
											<?php endforeach ;?>
									</select>
							</div>
							<div class="col-lg-6">
									<label class="control-label">Pimpinan Badan Usaha <span class="text-danger">*</span></label>
									<input type="text"   id="pimpinan_bu_edit" name="pimpinan_bu" class="form-control">

							</div>
						</div>
						<div class="form-group row">
							<div class="col-lg-6">
									<label class="control-label">Kabupaten/Kota <span class="text-danger">*</span></label>
									<select name="kabupaten"   id="kabupaten_edit" class="form-control" required="required">
											<option value="">Pilih Kabupaten</option>
											<?php foreach ($kabupaten as $row_kab) :?>
												<option value="<?php echo $row_kab['ID_Kabupaten'] ;?>"> - <?php echo $row_kab['Nama'] ;?></option>
											<?php endforeach ;?>
									</select>
							</div>
							<div class="col-lg-6">
									<label class="control-label">Telepon <span class="text-danger">*</span></label>
									<input type="text"   id="telepon_edit" name="telepon" class="form-control" required="required"  placeholder="Enter phone number">

							</div>
							<div class="col-lg-6">
									<label class="control-label">Email PIC <span class="text-danger">*</span></label>
									<input type="text"   id="email_pic_edit" name="email_pic" class="form-control" required="required"  placeholder="Email PIC">

							</div>
						</div>

						<div class="form-group row">
							<div class="col-lg-6">
									<label class="control-label">Faximili <span class="text-danger">*</span></label>
									<input type="text"   id="fax_edit" name="faximili"  class="form-control">

							</div>
							<div class="col-lg-6">
									<label class="control-label">Email <span class="text-danger">*</span></label>
									<input type="email"   id="email_edit" name="email" class="form-control" id="email" required="required" placeholder="Siki@lpjk.com">

							</div>
						</div>
						<div class="form-group row">
							<div class="col-lg-6">
									<label class="control-label">Kode Pos <span class="text-danger">*</span></label>
									<input type="text"   id="kode_pos_edit" name="kodepos" class="form-control" placeholder="55555">

							</div>
							<div class="col-lg-6">
									<label class="control-label">Website <span class="text-danger">*</span></label>
									<input type="text"   id="url_edit" name="url" class="form-control" placeholder="http://lpjk.net">

							</div>
						</div>
						<div class="form-group row">

							<div class="col-lg-6">
								<label class="control-label">NPWP <span class="text-danger">*</span></label>
								<input class="file-npwp" id="file_npwp" name="file_npwp" type="file"  data-preview-file-type="text">
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
								<label class="control-label">Upload Izin Bagi Penanam Modal dari BKPM yang berlaku (Bagi PMA) <span class="text-danger">*</span></label>
								<input class="file-penanam" name="file_penanam" type="file" data-preview-file-type="text">
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
					url : "<?php echo base_url('administrasi/cek_nib'); ?>",
					type : "POST",
					data : {id : sub,},
					success : function(data) {

						response = jQuery.parseJSON(data);
						record=response.record;
						$("#nib_edit").val(record[0].NIB);
						$("#nama_bu_edit").val(record[0].nama);
						$("#npwp_edit").val(record[0].npwp);
						$("#sifat_usaha_edit").val(record[0].sifat_usaha).attr("selected","selected");
						$("#jenis_bu_edit").val(record[0].jenis_usaha).attr("selected","selected");
						$("#alamat_edit").val(record[0].alamat_bu);
						$("#klasifikasi_jenis_usaha_edit").val(record[0].klasifikasi_jenis_usaha).attr("selected","selected");
						$("#propinsi_edit").val(record[0].id_propinsi).attr("selected","selected");
						$("#kabupaten_edit").val(record[0].id_kabupaten).attr("selected","selected");
						$("#telepon_edit").val(record[0].telepon);
						$("#fax_edit").val(record[0].fax);
						$("#kode_pos_edit").val(record[0].kodepos);
						$("#url_edit").val(record[0].web);

						$("#email_edit").val(record[0].email);
						$("#email_pic_edit").val(record[0].email_pic);
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
	document.getElementById("kabupaten").options.length = 0;

	$.ajax({
			url : "<?php echo base_url('administrasi/kabupaten'); ?>",
			type : "POST",
			data : {id_propinsi : sel.value,},
			success : function(data) {

				response = jQuery.parseJSON(data);
				csrfHash = response.csrfHash;

				//console.log( JSON.parse(data) );
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
<script>

	$('#npwp').inputmask({
            mask: '99.999.999.9-999.999',
            definitions: {
                A: {
                    validator: "[A-Za-z0-9 ]"
                },
            },
        });




</script>
<script type="text/javascript">
	$(".file-npwp").fileinput({
    maxFileSize: 20000,
    allowedFileExtensions: ['jpg', 'png', 'pdf'],
    showUpload: false,
    dropZoneEnabled: false
	});
	$(".file-domisili").fileinput({
		maxFileSize: 20000,
    allowedFileExtensions: ['jpg', 'png', 'pdf'],
    showUpload: false,
    dropZoneEnabled: false
	});
	$(".file-penanam").fileinput({
		maxFileSize: 20000,
    allowedFileExtensions: ['jpg', 'png', 'pdf'],
    showUpload: false,
    dropZoneEnabled: false
	});
	$(".file-iso").fileinput({
		maxFileSize: 20000,
    allowedFileExtensions: ['jpg', 'png', 'pdf'],
    showUpload: false,
    dropZoneEnabled: false
	});



	var submitCounter = 0;
	$(function () {
		var uploadURI = $('#form-upload-1').attr('action');
		var progressBar = $('#progress-bar-1');

		$("form#form-upload-1").submit(function () {

		var n1=document.querySelector('#nama_bu').value;
		var n2=document.querySelector('#bentuk_bu').value;
		var n3=document.querySelector('#jenis_bu').value;
		var n4=document.querySelector('#alamat').value;
		var n5=document.querySelector('#kategori_bu').value;
		var n6=document.querySelector('#propinsi').value;
		var n7=document.querySelector('#kabupaten').value;
		var n8=document.querySelector('#telepon').value;
		var n9=document.querySelector('#email').value;
		var n10=document.querySelector('#email_pic').value;
			event.preventDefault();

										if(n1!='' && n2!='' && n3!='' && n4!='' && n5!='' && n7!='' && n6!='' && n8!='' && n9!='' && n10!=''){



											// make sure there is file to upload
											if (document.getElementById("file_npwp").files.length != 0) {
											if (submitCounter < 2) {
												submitCounter++;
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
																window.location.replace("<?php echo base_url('administrasi');?>");
															}
															else {
																window.location.replace("<?php echo base_url('administrasi');?>");

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




											}else{
												toastr["warning"]("File * Harus dilampirkan", "Notification");


										}
									}else{
										toastr["warning"]("Data * Harus diisi", "Notification");

									}
								});
		$('body').on('change.bs.fileinput', function (e) {
			$('.progress').hide();
			progressBar.text("0%");
			progressBar.css({width: "0%"});
		});
	});

</script>
