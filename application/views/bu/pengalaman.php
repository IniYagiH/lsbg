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
					<h2 class="d-flex align-items-center text-dark font-weight-bold my-1 mr-3">Permohonan</h2>
					<!--end::Page Title-->
					<!--begin::Breadcrumb-->
					<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
						<li class="breadcrumb-item text-muted">
							<a href="" class="text-dark">Badan Usaha</a>
						</li>
						<li class="breadcrumb-item text-muted">
							<a href="" class="text-dark">Penjualan Tahunan</a>
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
						<h3 class="card-label">Data Penjualan Tahunan</h3>
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
								<th>Nama Paket</th>
								<th>Nilai Kontrak</th>
								<th>Status Kontrak</th>
								<th>Nomor Kontrak</th>
								<th>Propinsi</th>
								<th>Nomor BA Serah Terima</th>
								<th>Pemberi Tugas</th>
								<th>Tahun</th>
								<th>Sumber Dana </th>
								<th>Klasifikasi</th>
								<th>Sub Klasifikasi</th>
								<th>Tanggal Kontrak</th>
								<th>Tanggal Mulai </th>
								<th>Tanggal Selesai </th>
								<th>Tanggal Terima </th>
								<th>No Addendum Kontrak</th>
								<th>Tgl Addendum Kontrak</th>
								<th>Nilai Addendum Kontrak</th>

								<th>Partner KSO/JO</th>
								<th>Nama Sub Kontrak</th>
								<th>Nilai Sub Kontrak</th>
								<th>Nomor PHO/BASH Pekerjaan</th>
								<th>Tanggal Serah Terima PHO</th>
								<th>Nomor FHO/BASH Pekerjaan</th>
								<th>Tanggal Serah Terima FHO</th>
								<th>File Surat Pernyataan Pecah Kontrak & Formulir Pengalaman</th>
								<th>File Faktur Pajak Pertambahan Nilai</th>
								<th>File PHO</th>
								<th>File Rekaman Kontrak</th>

							</tr>
						</thead>
						<tbody>
							<?php foreach($record as $row) :?>
							<tr>
								<td></td>
								<td>
									<div class="d-flex align-items-center mr-3" data-inbox="actions">
										<label class="checkbox checkbox-outline checkbox-outline-2x checkbox-dark mr-3">
											<input type="checkbox" id="<?= $row['nilai_kontrak'] ;?>" value="<?= $row['id_sub_klasifikasi'] ;?>" name="<?= $row['nomor_kontrak'] ;?>" class="call-checkbox"/>
											<span></span>
										</label>

									</div>

								</td>
								<td><?= $row['nama_pengalaman'] ;?></td>
								<td><?= $row['nilai_kontrak'] ;?></td>
								<td></td>
								<td><?= $row['nomor_kontrak'] ;?></td>
								<td><?= $row['id_propinsi'] ;?></td>
								<td><?= $row['nomor_ba_serah_terima'] ;?></td>
								<td><?= $row['pemberi_tugas'] ;?></td>
								<td><?= $row['tahun'] ;?></td>
								<td><?= $row['id_sumber_dana'] ;?></td>
								<td><?= $row['id_klasifikasi'] ;?></td>
								<td><?= $row['id_sub_klasifikasi'] ;?></td>
								<td><?= $row['tgl_kontrak'] ;?></td>
								<td><?= $row['tgl_mulai'] ;?></td>
								<td><?= $row['tgl_selesai'] ;?></td>
								<td><?= $row['tgl_ba_serah_terima'] ;?></td>
								<td><?= $row['no_addendum_kontrak'] ;?></td>
								<td><?= $row['tgl_addendum_kontrak'] ;?></td>
								<td><?= $row['nilai_addendum_kontrak'] ;?></td>

								<td><?= $row['partner'] ;?></td>
								<td><?= $row['nama_sub_kontrak'] ;?></td>
								<td><?= $row['nilai_sub_kontrak'] ;?></td>
								<td><?= $row['nomor_pho'] ;?></td>
								<td><?= $row['tgl_pho'] ;?></td>
								<td><?= $row['nomor_fho'] ;?></td>
								<td><?= $row['tgl_fho'] ;?></td>


								<td><a href="<?=base_url('get_file/get_bu_36/'.$row['persyaratan_36']) ;?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>
								<td><a href="<?=base_url('get_file/get_bu_35/'.$row['persyaratan_35']) ;?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>
								<td><a href="<?=base_url('get_file/get_bu_34/'.$row['persyaratan_34']) ;?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>
								<td><a href="<?=base_url('get_file/get_bu_32/'.$row['persyaratan_32']) ;?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>
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
							<h3 class="card-label"><span class="text-danger">Detele Pengurus</span></h3>
						</div>
					</div><?php echo form_open_multipart('pengalaman/delete/', 'class="form-horizontal form-validate-jquery"');?>
					<div class="card-body">
						<input type="hidden" id='id_delete' name='id' class="form-control" />
						<input type="hidden" id='id2_delete' name='id2' class="form-control" />
						<div class="form-group row">
							<div class="col-lg-8">
									<label class="control-label">Klasifikasi <span class="text-danger">*</span></label>
									<input type="text"   id='nama_delete'  name="sub" readonly class="form-control">
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


				<!--begin::Card-->
				<div class="card card-custom gutter-b">
					<div class="card-header">
						<div class="card-title">
							<span class="card-icon">
								<i class="flaticon-file-1 text-dark"></i>
							</span>
							<h3 class="card-label">Input Pengalaman</h3>
						</div>
					</div>

					<?php echo form_open_multipart('pengalaman/insert/', 'class="form-horizontal form-validate-jquery" id="form-upload-1"');?>
						<div class="card-body">

						<div class="form-group row">
							<div class="col-lg-6">
									<label class="control-label">Nama Paket <span class="text-danger">*</span></label>
									<input type="text" id="nama_paket" name="nama_paket" required="required" class="form-control">
							</div>
							<div class="col-lg-6">
									<label class="control-label">Nilai Kontrak <span class="text-danger">*</span></label>
									<input type="text" id="nilai_kontrak" name="nilai_kontrak" required="required" class="form-control">

								</div>
						</div>
						<div class="form-group row">
							<div class="col-lg-6">
									<label class="control-label">Status Kontrak <span class="text-danger">*</span></label>
									<select name="status_kontrak"  id="status_kontrak"class="form-control" required="required">
											<option value="">Pilih Status Kontrak</option>
											<?php foreach ($status_kontrak as $row_statuskontrak) :?>
												<option value="<?php echo $row_statuskontrak['id_status_kontrak'] ;?>"> - <?php echo $row_statuskontrak['nm_status_kontrak'] ;?></option>
											<?php endforeach ;?>
									</select>
								 </div>
							<div class="col-lg-6">
									<label class="control-label">Nomor Kontrak <span class="text-danger">*</span></label>
									<input type="text" id="nomer_kontrak" name="nomer_kontrak" required="required" class="form-control">

								</div>
						</div>
						<div class="form-group row">
							<div class="col-lg-6">
									<label class="control-label">Lokasi Pekerjaan <span class="text-danger"></span></label>
									<select name="propinsi"  id="propinsi"class="form-control" required="required">
											<option value="">Pilih Provinsi</option>
											<?php foreach ($propinsi as $row2) :?>
												<option value="<?php echo $row2['ID_Propinsi'] ;?>"> - <?php echo $row2['Nama'] ;?></option>
											<?php endforeach ;?>
									</select>
								</div>
								<div class="col-lg-6">
										<label class="control-label">Nomor BA Serah Terima <span class="text-danger">*</span></label>
										<input type="text" id="nomor_ba_edit" name="nomor_ba" required="required" class="form-control">

									</div>

						</div>
						<div class="form-group row">

							<div class="col-lg-6">
									<label class="control-label">Pemberi Kerja <span class="text-danger">*</span></label>
									<input type="text" id="pemberi_tugas" name="pemberi_tugas" required="required" class="form-control">

								</div>
						</div>

						<div class="form-group row">
							<div class="col-lg-6">
									<label class="control-label">Tahun <span class="text-danger"></span></label>
									<input type="text" id="tahun" name="tahun" required="required" class="form-control">

								</div>
							<div class="col-lg-6">
									<label class="control-label">Cara pembayaran <span class="text-danger">*</span></label>
									<select name="sumber_dana" class="form-control" required="required">
											<option value="">Pilih Sumber Dana</option>
											<?php foreach ($sumber_dana as $row5) :?>
												<option value="<?php echo $row5['ID_Sumber_Dana'] ;?>"> - <?php echo $row5['Deskripsi'] ;?></option>
											<?php endforeach ;?>
									</select>
								</div>
						</div>
						<div class="card card-custom">
							<div class="card-header">
								<div class="card-title">
									<h3 class="card-label">KBLI / CPC
									<small></small></h3>
								</div>
							</div>
							<div class="card-body">
								<div class="form-group row">
									<div class="col-lg-6">
											<label class="control-label">Klasifikasi <span class="text-danger"></span></label>
											<select name="klasifikasi" onchange="getval(this)" id="klasifikasi" class="form-control">
												<option value="">Pilih Klasifikasi</option>
												<?php foreach ($klasifikasi as $row_klasifikasi) :?>
													<option value="<?php echo $row_klasifikasi['klasifikasi'] ;?>"><?php echo $row_klasifikasi['klasifikasi'] ;?></option>
												<?php endforeach ;?>>
											</select>
										</div>
									<div class="col-lg-6">
											<label class="control-label">Sub Klasifikasi <span class="text-danger">*</span></label>
											<select name="sub_klasifikasi" id="sub_klasifikasi" class="form-control" required="required">
													<option value="">Pilih Sub Klasifikasi</option>

											</select>
										</div>
								</div>

							</div>
						</div>

						<div class="card card-custom">
							<div class="card-header">
								<div class="card-title">
									<h3 class="card-label">Tanggal
									<small>Sesuai Kontrak</small></h3>
								</div>
							</div>
							<div class="card-body">
								<div class="form-group row">
									<div class="col-lg-3">
										<label class="control-label">Tanggal Kontrak <span class="text-danger"></span></label>
										<input type="text" autocomplete="off" id="tgl_1" name="tgl_kontrak" required="required" class="form-control">

									</div>
									<div class="col-lg-3">
										<label class="control-label">Tanggal Mulai <span class="text-danger"></span></label>
										<input type="text" autocomplete="off" id="tgl_2" name="tgl_mulai" required="required" class="form-control">

									</div>
									<div class="col-lg-3">
										<label class="control-label">Tanggal Selesai <span class="text-danger"></span></label>
										<input type="text" autocomplete="off" id="tgl_3" name="tgl_selesai" required="required" class="form-control">

									</div>
									<div class="col-lg-3">
										<label class="control-label">Tanggal Terima <span class="text-danger"></span></label>
										<input type="text" autocomplete="off" id="tgl_4" name="tgl_terima" required="required" class="form-control">

									</div>

								</div>

							</div>
						</div>
						<div class="card card-custom">
							<div class="card-header">
								<div class="card-title">
									<h3 class="card-label">Addendum Kontrak
									<small></small></h3>
								</div>
							</div>
							<div class="card-body">
								<div class="form-group row">

									<div class="col-lg-6">
											<label class="control-label">No Addendum Kontrak <span class="text-danger">*</span></label>
											<input type="text" id="addendum_kontrak" name="addendum_kontrak" required="required" class="form-control">

									</div>
									<div class="col-lg-6">
												<label class="control-label">Tgl Addendum Kontrak <span class="text-danger">*</span></label>
												<input type="text" id="tgl_addendum_kontrak" name="tgl_addendum_kontrak" required="required" class="form-control">

									</div>

								</div>
								<div class="form-group row">

									<div class="col-lg-6">
											<label class="control-label">Nilai Addendum Kontrak <span class="text-danger">*</span></label>
											<input type="text" id="nilai_addendum_kontrak" name="nilai_addendum_kontrak" required="required" class="form-control">

									</div>


								</div>

							</div>
						</div>

						<div class="form-group row">


							<div class="col-lg-6">
										<label class="control-label">Partner KSO/JO <span class="text-danger">*</span></label>
										<input type="text" id="partner" name="partner" required="required" class="form-control">

							</div>

						</div>
						<div class="form-group row">

							<div class="col-lg-6">
									<label class="control-label">Nama Sub Kontrak <span class="text-danger">*</span></label>
									<input type="text" id="nama_sub_kontrak" name="nama_sub_kontrak" required="required" class="form-control">

							</div>
							<div class="col-lg-6">
										<label class="control-label">Nilai Sub Kontrak <span class="text-danger">*</span></label>
										<input type="text" id="nilai_sub_kontrak" name="nilai_sub_kontrak" required="required" class="form-control">

							</div>

						</div>
						<div class="card card-custom">
							<div class="card-header">
								<div class="card-title">
									<h3 class="card-label">PHO /FBO / BASH
									<small>Sesuai Kontrak</small></h3>
								</div>
							</div>
							<div class="card-body">

									<div class="form-group row">

										<div class="col-lg-6">
												<label class="control-label">Nomor PHO/BASH Pekerjaan <span class="text-danger">*</span></label>
												<input type="text" id="nomor_pho" name="nomor_pho" required="required" class="form-control">

										</div>
										<div class="col-lg-6">
													<label class="control-label">Tanggal Serah Terima PHO <span class="text-danger">*</span></label>
													<input type="text" id="tgl_pho" name="tgl_pho" required="required" class="form-control">

										</div>

									</div>
									<div class="form-group row">

										<div class="col-lg-6">
												<label class="control-label">Nomor FHO/BASH Pekerjaan <span class="text-danger">*</span></label>
												<input type="text" id="nomor_fho" name="nomor_fho" required="required" class="form-control">

										</div>
										<div class="col-lg-6">
													<label class="control-label">Tanggal Serah Terima FHO <span class="text-danger">*</span></label>
													<input type="text" id="tgl_fho" name="tgl_fho" required="required" class="form-control">

										</div>

									</div>

									<div class="form-group row">
										<div class="col-lg-6">
											<label class="control-label">Upload Surat Pernyataan Pecah Kontrak & Formulir Pengalaman <span class="text-danger">*</span></label>
											<input class="file-kontrak" name="file_kontrak" type="file" data-preview-file-type="text">
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
											<label class="control-label">Upload Faktur Pajak Pertambahan Nilai <span class="text-danger">*</span></label>
											<input class="file-pajak"  name="file_pajak" type="file" data-preview-file-type="text">
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
									<div class="form-group row">
										<div class="col-lg-6">
											<label class="control-label">Upload PHO <span class="text-danger">*</span></label>
											<input class="file-pho" name="file_pho" type="file" data-preview-file-type="text">
											<span class="help-block">
												Accepted formats: pdf, zip. Max file size 20Mb
											</span>
											<div class="progress" style="display:none;">
												<div id="progress-bar-3" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
													20%
												</div>
											</div>

										</div>
										<div class="col-lg-6">
											<label class="control-label">Upload Rekaman Kontrak <span class="text-danger">*</span></label>
											<input class="file-1"  name="file_rekaman" type="file" data-preview-file-type="text">
											<span class="help-block">
												Accepted formats: pdf, zip. Max file size 20Mb
											</span>
											<div class="progress" style="display:none;">
												<div id="progress-bar-4" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
													20%
												</div>
											</div>
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


				<!--begin::Card-->
				<div class="card card-custom gutter-b">
					<div class="card-header">
						<div class="card-title">
							<span class="card-icon">
								<i class="flaticon-file-1 text-dark"></i>
							</span>
							<h3 class="card-label">Edit Pengalaman</h3>
						</div>
					</div>

					<?php echo form_open_multipart('pengalaman/update/', 'class="form-horizontal form-validate-jquery" id="form-upload-2"');?>
						<div class="card-body">
							<input type="hidden" id="id_edit" name="id" required="required" class="form-control">

						<div class="form-group row">
							<div class="col-lg-6">
									<label class="control-label">Nama Paket <span class="text-danger">*</span></label>
									<input type="text" id="nama_paket_edit" name="nama_paket" required="required" class="form-control">
							</div>
							<div class="col-lg-6">
									<label class="control-label">Nilai Kontrak <span class="text-danger">*</span></label>
									<input type="text" id="nilai_kontrak_edit" name="nilai_kontrak" required="required" class="form-control">

								</div>
						</div>
						<div class="form-group row">
							<div class="col-lg-6">
									<label class="control-label">Status Kontrak <span class="text-danger">*</span></label>
									<select name="status_kontrak"  id="status_kontrak_edit"class="form-control" required="required">
											<option value="">Pilih Status Kontrak</option>
											<?php foreach ($status_kontrak as $row_statuskontrak) :?>
												<option value="<?php echo $row_statuskontrak['id_status_kontrak'] ;?>"> - <?php echo $row_statuskontrak['nm_status_kontrak'] ;?></option>
											<?php endforeach ;?>
									</select>
								 </div>
							<div class="col-lg-6">
									<label class="control-label">Nomor Kontrak <span class="text-danger">*</span></label>
									<input type="text" id="nomer_kontrak_edit" name="nomer_kontrak" required="required" class="form-control">

								</div>
						</div>
						<div class="form-group row">
							<div class="col-lg-6">
									<label class="control-label">Propinsi <span class="text-danger"></span></label>
									<select name="propinsi"  id="propinsi_edit"class="form-control" required="required">
											<option value="">Pilih Provinsi</option>
											<?php foreach ($propinsi as $row2) :?>
												<option value="<?php echo $row2['ID_Propinsi'] ;?>"> - <?php echo $row2['Nama'] ;?></option>
											<?php endforeach ;?>
									</select>
								</div>
							<div class="col-lg-6">
									<label class="control-label">Nomor BA Serah Terima <span class="text-danger">*</span></label>
									<input type="text" id="nomor_ba_edit" name="nomor_ba" required="required" class="form-control">

								</div>
						</div>
						<div class="form-group row">

							<div class="col-lg-6">
									<label class="control-label">Pemberi Tugas <span class="text-danger">*</span></label>
									<input type="text" id="pemberi_tugas_edit" name="pemberi_tugas" required="required" class="form-control">

								</div>
						</div>

						<div class="form-group row">
							<div class="col-lg-6">
									<label class="control-label">Tahun <span class="text-danger"></span></label>
									<input type="text" id="tahun_edit" name="tahun" required="required" class="form-control">

								</div>
							<div class="col-lg-6">
									<label class="control-label">Sumber Dana <span class="text-danger">*</span></label>
									<select name="sumber_dana" id="sumber_dana_edit" class="form-control" required="required">
											<option value="">Pilih Sumber Dana</option>
											<?php foreach ($sumber_dana as $row5) :?>
												<option value="<?php echo $row5['ID_Sumber_Dana'] ;?>"> - <?php echo $row5['Deskripsi'] ;?></option>
											<?php endforeach ;?>
									</select>
								</div>
						</div>
						<div class="card card-custom">
							<div class="card-header">
								<div class="card-title">
									<h3 class="card-label">KBLI / CPC
									<small></small></h3>
								</div>
							</div>
							<div class="card-body">
								<div class="form-group row">
									<div class="col-lg-6">
											<label class="control-label">Klasifikasi <span class="text-danger"></span></label>
											<select name="klasifikasi" onchange="getval2(this)" id="klasifikasi_edit" class="form-control">
												<option value="">Pilih Klasifikasi</option>
												<?php foreach ($klasifikasi as $row_klasifikasi) :?>
													<option value="<?php echo $row_klasifikasi['klasifikasi'] ;?>"><?php echo $row_klasifikasi['klasifikasi'] ;?></option>
												<?php endforeach ;?>>
											</select>
										</div>
									<div class="col-lg-6">
											<label class="control-label">Sub Klasifikasi <span class="text-danger">*</span></label>
											<select name="sub_klasifikasi" id="sub_klasifikasi_edit" class="form-control" required="required">
													<option value="">Pilih Sub Klasifikasi</option>

											</select>
										</div>
								</div>

							</div>
						</div>

						<div class="card card-custom">
							<div class="card-header">
								<div class="card-title">
									<h3 class="card-label">Tanggal
									<small>Sesuai Kontrak</small></h3>
								</div>
							</div>
							<div class="card-body">
								<div class="form-group row">
									<div class="col-lg-3">
										<label class="control-label">Tanggal Kontrak <span class="text-danger"></span></label>
										<input type="text" autocomplete="off" id="tgl_1_edit" name="tgl_kontrak" required="required" class="form-control">

									</div>
									<div class="col-lg-3">
										<label class="control-label">Tanggal Mulai <span class="text-danger"></span></label>
										<input type="text" autocomplete="off" id="tgl_2_edit" name="tgl_mulai" required="required" class="form-control">

									</div>
									<div class="col-lg-3">
										<label class="control-label">Tanggal Selesai <span class="text-danger"></span></label>
										<input type="text" autocomplete="off" id="tgl_3_edit" name="tgl_selesai" required="required" class="form-control">

									</div>
									<div class="col-lg-3">
										<label class="control-label">Tanggal Terima <span class="text-danger"></span></label>
										<input type="text" autocomplete="off" id="tgl_4_edit" name="tgl_terima" required="required" class="form-control">

									</div>

								</div>

							</div>
						</div>
						<div class="card card-custom">
							<div class="card-header">
								<div class="card-title">
									<h3 class="card-label">Addendum Kontrak
									<small></small></h3>
								</div>
							</div>
							<div class="card-body">
								<div class="form-group row">

									<div class="col-lg-6">
											<label class="control-label">No Addendum Kontrak <span class="text-danger">*</span></label>
											<input type="text" id="addendum_kontrak_edit" name="addendum_kontrak" required="required" class="form-control">

									</div>
									<div class="col-lg-6">
												<label class="control-label">Tgl Addendum Kontrak <span class="text-danger">*</span></label>
												<input type="text" id="tgl_addendum_kontrak_edit" name="tgl_addendum_kontrak" required="required" class="form-control">

									</div>

								</div>
								<div class="form-group row">

									<div class="col-lg-6">
											<label class="control-label">Nilai Addendum Kontrak <span class="text-danger">*</span></label>
											<input type="text" id="nilai_addendum_kontrak_edit" name="nilai_addendum_kontrak" required="required" class="form-control">

									</div>


								</div>

							</div>
						</div>

						<div class="form-group row">

							<div class="col-lg-6">
										<label class="control-label">Partner KSO/JO <span class="text-danger">*</span></label>
										<input type="text" id="partner_edit" name="partner" required="required" class="form-control">

							</div>

						</div>
						<div class="form-group row">

							<div class="col-lg-6">
									<label class="control-label">Nama Sub Kontrak <span class="text-danger">*</span></label>
									<input type="text" id="nama_sub_kontrak_edit" name="nama_sub_kontrak" required="required" class="form-control">

							</div>
							<div class="col-lg-6">
										<label class="control-label">Nilai Sub Kontrak <span class="text-danger">*</span></label>
										<input type="text" id="nilai_sub_kontrak_edit" name="nilai_sub_kontrak" required="required" class="form-control">

							</div>

						</div>
						<div class="card card-custom">
							<div class="card-header">
								<div class="card-title">
									<h3 class="card-label">PHO /FBO / BASH
									<small>Sesuai Kontrak</small></h3>
								</div>
							</div>
							<div class="card-body">

									<div class="form-group row">

										<div class="col-lg-6">
												<label class="control-label">Nomor PHO/BASH Pekerjaan <span class="text-danger">*</span></label>
												<input type="text" id="nomor_pho_edit" name="nomor_pho" required="required" class="form-control">

										</div>
										<div class="col-lg-6">
													<label class="control-label">Tanggal Serah Terima PHO <span class="text-danger">*</span></label>
													<input type="text" id="tgl_pho_edit" name="tgl_pho" required="required" class="form-control">

										</div>

									</div>
									<div class="form-group row">

										<div class="col-lg-6">
												<label class="control-label">Nomor FHO/BASH Pekerjaan <span class="text-danger">*</span></label>
												<input type="text" id="nomor_fho_edit" name="nomor_fho" required="required" class="form-control">

										</div>
										<div class="col-lg-6">
													<label class="control-label">Tanggal Serah Terima FHO <span class="text-danger">*</span></label>
													<input type="text" id="tgl_fho_edit" name="tgl_fho" required="required" class="form-control">

										</div>

									</div>
								</div>
								</div>


						<div class="form-group row">
							<div class="col-lg-6">
								<label class="control-label">Upload Surat Pernyataan Pecah Kontrak & Formulir Pengalaman <span class="text-danger">*</span></label>
								<input class="file-kontrak" name="file_kontrak" type="file" data-preview-file-type="text">
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
								<label class="control-label">Upload Faktur Pajak Pertambahan Nilai <span class="text-danger">*</span></label>
								<input class="file-pajak"  name="file_pajak" type="file" data-preview-file-type="text">
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
						<div class="form-group row">
							<div class="col-lg-6">
								<label class="control-label">Upload PHO <span class="text-danger">*</span></label>
								<input class="file-pho" name="file_pho" type="file" data-preview-file-type="text">
								<span class="help-block">
									Accepted formats: pdf, zip. Max file size 20Mb
								</span>
								<div class="progress" style="display:none;">
									<div id="progress-bar-3" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
										20%
									</div>
								</div>

							</div>
							<div class="col-lg-6">
								<label class="control-label">Upload Rekaman Kontrak <span class="text-danger">*</span></label>
								<input class="file-1"  name="file_rekaman" type="file" data-preview-file-type="text">
								<span class="help-block">
									Accepted formats: pdf, zip. Max file size 20Mb
								</span>
								<div class="progress" style="display:none;">
									<div id="progress-bar-4" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
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
				<?php echo form_close() ;?>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
$("#delete_data").click(function () {
	var oTable = $('#kt_datatable2').dataTable();
	var rowcollection = oTable.$(".call-checkbox:checked", {"page": "all"});
	var value = [];
	var sub = [];
	var id = [];
	var coba=[];
	var coba2=[];
	var coba3=[];
	var coba4=[];
	var coba5=[];
	var coba6=[];
	counterx=0;
	counter=0;
	counter1=0;
	counter2=0;
	rowcollection.each(function(index,elem){
		counterx=counterx+1;
		sub = elem.name;
		value = elem.value;
		id = elem.id;
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
		if(coba5.length>0){
			if(coba5[counter2]!=id){
				counter2=counter2+1;
				coba5[counter2]=id;
				coba6[counter2]="'"+id+"'";
			}
		}else{
			coba5[counter2]=id;
			coba6[counter2]="'"+id+"'";
		}
	});
	if(counterx==0){
		toastr["warning"]("Anda belum memilih data yang ingin diedit, silahkan memilih data terlebih dahulu", "Notification");
		$("#modal_edit").modal('hide');
	}else{
		$(".modal-body #id_delete").val(coba2);
		$(".modal-body #nama_delete").val(coba4);
		$(".modal-body #id2_delete").val(coba6);
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
						$("#addendum_kontrak_edit").val(record[0].no_addendum_kontrak);
						$("#tgl_addendum_kontrak_edit").val(record[0].tgl_addendum_kontrak);
						$("#nilai_addendum_kontrak_edit").val(record[0].nilai_addendum_kontrak);
						$("#cidera_janji_edit").val(record[0].cidera_janji);
						$("#perselisihan_edit").val(record[0].perselisihan);
						$("#anggaran_biaya_edit").val(record[0].anggaran_biaya);
						$("#partner_edit").val(record[0].partner);
						$("#nama_sub_kontrak_edit").val(record[0].nama_sub_kontrak);
						$("#nilai_sub_kontrak_edit").val(record[0].nilai_sub_kontrak);
						$("#nomor_pho_edit").val(record[0].nomor_pho);
						$("#tgl_pho_edit").val(record[0].tgl_pho);
						$("#nomor_fho_edit").val(record[0].nomor_fho);
						$("#tgl_fho_edit").val(record[0].tgl_fho);
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
		var uploadURI2 = $('#form-upload-2').attr('action');
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


								$("form#form-upload-2").submit(function () {
									submitCounter++;

									event.preventDefault();


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



														});
		$('body').on('change.bs.fileinput', function (e) {
			$('.progress').hide();
			progressBar.text("0%");
			progressBar.css({width: "0%"});
		});
	});

</script>
