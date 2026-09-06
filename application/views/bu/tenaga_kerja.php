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
							<a href="" class="text-dark">Tenaga Kerja</a>
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
						<h3 class="card-label">Data Tenaga Kerja</h3>
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
								<th>Nomor Registrasi</th>
								<th>Nama</th>
								<th>KTP</th>
								<th>Tanggal Lahir</th>
								<th>Kodepos</th>
								<th>Pendidikan Akhir</th>
								<th>No. Ijazah</th>
								<th>Tahun Lulus</th>
								<th>NPWP </th>
								<th>Alamat</th>
								<th>Sub Bidang</th>
								<th>Jenis Tenaga Kerja</th>
								<th>Kualifikasi</th>
								<th>PJTBU</th>
								<th>PJSKBU</th>
								<th>Sub Klasifikasi PJSKBU</th>
								<th>PJBU</th>
								<th>File Surat Pernyataan bukan pegawai negri sipil, Bukan TNI atau Kepolisian RI</th>
								<th>File Rekaman SKK (Sertifikat Kompetensi Kerja)</th>

							</tr>

							</tr>
						</thead>
						<tbody>
							<?php foreach($record as $row) :?>
							<tr>
								<td></td>
								<td>
									<div class="d-flex align-items-center mr-3" data-inbox="actions">
										<label class="checkbox checkbox-outline checkbox-outline-2x checkbox-dark mr-3">
											<input type="checkbox" name="<?= $row['noreg'] ;?>" class="call-checkbox"/>
											<span></span>
										</label>

									</div>

								</td>
								<td><?= $row['noreg'] ;?></td>
								<td><?= $row['nama'] ;?></td>
								<td><?= $row['no_ktp'] ;?></td>
								<td><?= $row['tgl_lahir'] ;?></td>
								<td><?= $row['kodepos'] ;?></td>
								<td><?= $row['pendidikan_akhir'] ;?></td>
								<td><?= $row['no_ijazah'] ;?></td>
								<td><?= $row['thn_lulus'] ;?></td>
								<td><?= $row['npwp'] ;?></td>
								<td><?= $row['alamat'] ;?></td>
								<td><?= $row['id_sub_bidang'] ;?></td>
								<td><?= $row['tenaga_kerja'] ;?></td>
								<td><?= $row['id_kualifikasi'] ;?></td>
								<td><?php if($row['pjt']=='1'){echo "PJTBU";} ;?></td>
								<td><?php if($row['pjsk']=='1'){echo "PJSKBU";} ;?></td>
								<td><?= $row['id_sub_klasifikasi_pjsk1'] ;?></td>
								<td><?php if($row['pjbu']=='1'){echo "PJBU";} ;?></td>

								<td><a href="<?=base_url('get_file/get_bu_28/'.$row['persyaratan_28']) ;?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>
								<td><a href="<?=base_url('get_file/get_bu_23/'.$row['persyaratan_23']) ;?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>



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
							<h3 class="card-label"><span class="text-danger">Detele Tenaga Kerja</span></h3>
						</div>
					</div><?php echo form_open_multipart('tenaga_kerja/delete/', 'class="form-horizontal form-validate-jquery"');?>
					<div class="card-body">
						<input type="hidden" id='id_delete' name='id' class="form-control" />

						<div class="form-group row">
							<div class="col-lg-8">
									<label class="control-label">Noreg <span class="text-danger">*</span></label>
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
							<h3 class="card-label">Input Tenaga Kerja</h3>
						</div>
					</div>

	        <?php echo form_open_multipart('tenaga_kerja/insert/', 'class="form-horizontal form-validate-jquery" id="form-upload-1"');?>
	          <div class="card-body">
							<input type="hidden" id="condition" name="condition" class="form-control">
							<input type="hidden" id="condition_klasifikasi" name="condition" value="ahli" class="form-control">
	          <div class="form-group row">


	            <div class="col-lg-4">
								<label class="control-label">Nomor Registrasi <span class="text-danger">*</span></label>
	                <input type="text" id="nomor_registrasi"  name="nomor_registrasi" required="required" class="form-control">
	            </div>
							<div class="col-lg-4">
	                <label class="control-label">Bidang <span class="text-danger">*</span></label>
									<select name="klasifikasi" onchange="getval(this)" id="klasifikasi" class="form-control">
											<option value="">Pilih Bidang</option>
											<?php foreach ($klasifikasi as $row_ahli) :?>
												<option value="<?php echo $row_ahli['ID_Bidang_Profesi'] ;?>"><?php echo $row_ahli['ID_Bidang_Profesi'] ;?> - <?php echo $row_ahli['Deskripsi'] ;?></option>
											<?php endforeach ;?>
									</select>
								</div>
							<div class="col-lg-4">
								<label class="control-label">Sub Bidang <span class="text-danger">*</span></label>

								<div class="input-group file-caption-main">
								  <span class="file-caption-icon"></span>
									<select name="sub_klasifikasi" id="sub_klasifikasi" class="form-control" >
											<option value="">Pilih Sub Bidang</option>

									</select>

								<div class="input-group-btn input-group-append">
								      <button type="button" disabled id="get_value" class="btn btn-dark btn-file"><i class="glyphicon glyphicon-folder-open"></i>&nbsp;  <span class="hidden-xs">Searching </span></button>
								    </div>
								</div>

	            </div>

							<div class="col-12 col-form-label">
								<div class="radio-inline">
									<label class="radio radio-outline radio-success">
									<input type="radio" id="ta" value="ta" class="Checkbox" name="radios15" checked="checked" />
									<span></span>Tenaga Ahli</label>
									<label class="radio radio-outline radio-success">
									<input type="radio" id="tt" value="tt" class="Checkbox" name="radios15"  />
									<span></span>Tenaga Terampil</label>
									<div class="col-lg-3">
									<select  name="propinsi" id="propinsi" class="form-control" style="visibility: hidden">
											<option value="">Pilih Provinsi</option>
											<?php foreach ($propinsi as $row2) :?>
												<option value="<?php echo $row2['ID_Propinsi'] ;?>"> - <?php echo $row2['Nama'] ;?></option>
											<?php endforeach ;?>
									</select>
								</div>
								</div>
								<span class="form-text text-muted">Pilih salah satu jenis tenaga kerja untuk mencari (ketika memilih tenaga terampil harus memilih propinsi tenaga kerja)</span>
							</div>
	          </div>
	          <div class="form-group row">
	            <div class="col-lg-6">
	                <label class="control-label">Nomer Registrasi <span class="text-danger">*</span></label>
									<input type="text"  id="noreg" name="noreg" required="required" class="form-control">

	            </div>
	            <div class="col-lg-6">
	                <label class="control-label">Nama <span class="text-danger">*</span></label>
									<input type="text"  id="nama" name="nama"  class="form-control">

	            </div>
	          </div>
	          <div class="form-group row">
	            <div class="col-lg-6">
	                <label class="control-label">KTP <span class="text-danger">*</span></label>
									<input type="text"  id="ktps" name="ktps" class="form-control">
	            </div>
	            <div class="col-lg-6">

	            </div>
	          </div>
	          <div class="form-group row">
	            <div class="col-lg-6">
	                <label class="control-label">Tanggal Lahir <span class="text-danger">*</span></label>
									<input type="text" name="tgl_lahir" class="form-control" id="anytime-month-numeric" value="2018-01-01">

	            </div>
	            <div class="col-lg-6">

	            </div>
	          </div>
	          <div class="form-group row">
	            <div class="col-lg-6">
	                <label class="control-label">Kode Pos <span class="text-danger">*</span></label>
									<input type="text"  id="kode_pos" name="kode_pos"  class="form-control">

	            </div>
	            <div class="col-lg-6">
	                <label class="control-label">Pendidikan Akhir <span class="text-danger">*</span></label>
									<input type="text"  id="pendidikan_akhir" name="pendidikan_akhir"  class="form-control">

	            </div>
	          </div>
	          <div class="form-group row">
	            <div class="col-lg-6">
	                <label class="control-label">No Ijazah <span class="text-danger"></span></label>
									<input type="text"  id="no_ijazah" name="no_ijazah"  class="form-control">
									<!--
									<select name="no_ijazah" disabled="true" id="no_ijazah" class="form-control">

									</select>-->
	            </div>
	            <div class="col-lg-6">

	            </div>
	          </div>
	          <div class="form-group row">
	            <div class="col-lg-6">
	                <label class="control-label">Tahun Lulus <span class="text-danger">*</span></label>
									<input type="text"  id="tahun_lulus" name="tahun_lulus" class="form-control">

	            </div>
	            <div class="col-lg-6">

	            </div>
	          </div>
	          <div class="form-group row">
	            <div class="col-lg-6">
	                <label class="control-label">NPWP <span class="text-danger">*</span></label>
									<input type="text"  id="npwp" name="npwp"class="form-control">

	            </div>
	            <div class="col-lg-6">

	            </div>
	          </div>
	          <div class="form-group row">
	            <div class="col-lg-6">
	                <label class="control-label">Alamat <span class="text-danger">*</span></label>
									<input type="text"  id="alamat" name="alamat" class="form-control">

	            </div>
	            <div class="col-lg-6">

	            </div>
	          </div>


						<div class="form-group row">
	            <div class="col-lg-6">
								<label class="control-label">Kualifikasi <span class="text-danger">*</span></label>
								<input type="text"  id="kualifikasi" name="kualifikasi" class="form-control">

	            </div>
	          </div>

						<div class="card card-custom">
							<div class="card-header">
								<div class="col-lg-4">
									<div class="card-title">
										<h3 class="card-label">Penanggung Badan Usaha
										<small></small></h3>
									</div>
								</div>
								<div class="col-lg-4">
									<div class="card-title">
										<h3 class="card-label">Penanggung Jawab Teknik
										<small></small></h3>
									</div>
								</div>

								<div class="col-lg-4">
									<div class="card-title">
										<h3 class="card-label">Penanggung Jawab Sub Klasifikasi
										<small></small></h3>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="form-group row">
									<div class="col-lg-4">
										<?php if(empty($cek)) :?>
										<label class="control-label">PJBU <span class="text-danger"></span></label>


											<div class="checkbox-inline">
											<label class="checkbox checkbox-lg">
											<input type="checkbox" name="PJBU" value="1" />
											<span> </span>Checklis untuk membuat tk menjadi pjbu</label>

										</div>
										<?php endif ;?>


									</div>
									<div class="col-lg-4">
										<?php if(empty($cek_pjt)) :?>
										<label class="control-label">PJT <span class="text-danger"></span></label>


											<div class="checkbox-inline">
											<label class="checkbox checkbox-lg">
											<input type="checkbox" name="PJT" value="1" />
											<span> </span>Checklis untuk membuat tk menjadi pjt</label>

			            	</div>
										<?php endif ;?>


									</div>

									<div class="col-lg-4">
										<label class="control-label">PJSK <span class="text-danger"></span></label>

										<div class="checkbox-inline">
											<label class="checkbox checkbox-lg">
											<input type="checkbox" id="ta_tetap" name="ta_tetap" value="1" />
											<span> </span>Checklis untuk membuat tk menjadi pjsk</label>
			            	</div>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-lg-4">

									</div>
									<div class="col-lg-4">

									</div>

									<div class="col-lg-4">
										<select name="sub_klasifikasi_tetap" id="subklas1" disabled="true" class="form-control" required="required">
												<option value="">Pilih Sub Klasifikasi</option>
												<?php foreach ($sub_klasifikasi as $row_sub_klasifikasi) :?>
													<option value="<?php echo $row_sub_klasifikasi['id_sub_klasifikasi'] ;?>"><?php echo $row_sub_klasifikasi['id_sub_klasifikasi'].' - '.$row_sub_klasifikasi['deskripsi_subklasifikasi'] ;?></option>
												<?php endforeach ;?>
										</select>
									</div>
								</div>


							</div>
						</div>

						<div class="form-group row">
							<div class="col-lg-6">
	              <label class="control-label">Upload Surat Pernyataan bukan pegawai negri sipil, Bukan TNI atau Kepolisian RI <span class="text-danger">*</span></label>
	              <input class="file-riwayat" id="file_riwayat"  name="file_riwayat" type="file" data-preview-file-type="text">
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
								<label class="control-label">Upload Rekaman SKK (Sertifikat Kompetensi Kerja) <span class="text-danger">*</span></label>
								<input class="file-1" id="file_sertifikat" name="file_sertifikat" type="file" data-preview-file-type="text">
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
							<h3 class="card-label">Edit Tenaga Kerja</h3>
						</div>
					</div>

	        <?php echo form_open_multipart('tenaga_kerja/update/', 'class="form-horizontal form-validate-jquery" id="form-upload-2"');?>
	          <div class="card-body">
							<input type="hidden"  id="id" name="id" class="form-control">


							<div class="form-group row">
								<div class="col-lg-6">
										<label class="control-label">Bidang <span class="text-danger">*</span></label>
										<input type="text"  id="bidang_edit" name="klasifikasi" readonly class="form-control">

								</div>
								<div class="col-lg-6">
										<label class="control-label">Sub Bidang <span class="text-danger">*</span></label>
										<input type="text"  id="sub_bidang_edit" name="sub_klasifikasi" readonly  class="form-control">

								</div>
							</div>


	          <div class="form-group row">
	            <div class="col-lg-6">
	                <label class="control-label">Nomer Registrasi <span class="text-danger">*</span></label>
									<input type="text"  id="noreg_edit" name="noreg" required="required" class="form-control">

	            </div>
	            <div class="col-lg-6">
	                <label class="control-label">Nama <span class="text-danger">*</span></label>
									<input type="text"  id="nama_edit" name="nama"  class="form-control">

	            </div>
	          </div>
	          <div class="form-group row">
	            <div class="col-lg-6">
	                <label class="control-label">KTP <span class="text-danger">*</span></label>
									<input type="text"  id="ktps_edit" name="ktps" class="form-control">
	            </div>
	            <div class="col-lg-6">

	            </div>
	          </div>
	          <div class="form-group row">
	            <div class="col-lg-6">
	                <label class="control-label">Tanggal Lahir <span class="text-danger">*</span></label>
									<input type="text" name="tgl_lahir" class="form-control" id="tgl_edit" value="2018-01-01">

	            </div>
	            <div class="col-lg-6">

	            </div>
	          </div>
	          <div class="form-group row">
	            <div class="col-lg-6">
	                <label class="control-label">Kode Pos <span class="text-danger">*</span></label>
									<input type="text"  id="kode_pos_edit" name="kode_pos"  class="form-control">

	            </div>
	            <div class="col-lg-6">
	                <label class="control-label">Pendidikan Akhir <span class="text-danger">*</span></label>
									<input type="text"  id="pendidikan_akhir_edit" name="pendidikan_akhir"  class="form-control">

	            </div>
	          </div>
	          <div class="form-group row">
	            <div class="col-lg-6">
	                <label class="control-label">No Ijazah <span class="text-danger">*</span></label>
									<input type="text"  id="no_ijazah_edit" name="no_ijazah"  class="form-control">
									<!--
									<select name="no_ijazah" disabled="true" id="no_ijazah" class="form-control">

									</select>-->
	            </div>
	            <div class="col-lg-6">

	            </div>
	          </div>
	          <div class="form-group row">
	            <div class="col-lg-6">
	                <label class="control-label">Tahun Lulus <span class="text-danger">*</span></label>
									<input type="text"  id="tahun_lulus_edit" name="tahun_lulus" class="form-control">

	            </div>
	            <div class="col-lg-6">

	            </div>
	          </div>
	          <div class="form-group row">
	            <div class="col-lg-6">
	                <label class="control-label">NPWP <span class="text-danger">*</span></label>
									<input type="text"  id="npwp_edit" name="npwp"class="form-control">

	            </div>
	            <div class="col-lg-6">

	            </div>
	          </div>
	          <div class="form-group row">
	            <div class="col-lg-6">
	                <label class="control-label">Alamat <span class="text-danger">*</span></label>
									<input type="text"  id="alamat_edit" name="alamat" class="form-control">

	            </div>
	            <div class="col-lg-6">

	            </div>
	          </div>


						<div class="form-group row">
	            <div class="col-lg-6">
								<label class="control-label">Kualifikasi <span class="text-danger">*</span></label>
								<input type="text"  id="kualifikasi_edit" name="kualifikasi" class="form-control">

	            </div>
	          </div>

						<div class="card card-custom">
							<div class="card-header">
								<div class="col-lg-6">
									<div class="card-title">
										<h3 class="card-label">Penanggung Jawab Teknik
										<small></small></h3>
									</div>
								</div>

								<div class="col-lg-6">
									<div class="card-title">
										<h3 class="card-label">Tenaga Ahli Tetap
										<small></small></h3>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="form-group row">
									<div class="col-lg-4">
										<label class="control-label">PJBU <span class="text-danger"></span></label>


											<div class="checkbox-inline" id="row_pjbu_edit">
											<label class="checkbox checkbox-lg">
											<input type="checkbox" id="pjbu_edit" name="PJBU" value="1" />
											<span> </span>Checklis untuk membuat tk menjadi pjbu</label>

										</div>


									</div>
									<div class="col-lg-4">
										<label class="control-label">PJT <span class="text-danger"></span></label>


											<div class="checkbox-inline" id="row_pjt_edit">
											<label class="checkbox checkbox-lg">
											<input type="checkbox" name="PJT" id="pjt_edit" value="1" />
											<span> </span>Checklis untuk membuat tk menjadi pjt</label>

			            	</div>


									</div>

									<div class="col-lg-4">
										<label class="control-label">PJSK <span class="text-danger"></span></label>

										<div class="checkbox-inline">
											<label class="checkbox checkbox-lg">
											<input type="checkbox" id="ta_tetap_edit" name="ta_tetap" value="1" />
											<span> </span>Checklis untuk membuat tk menjadi pjsk tetap</label>
			            	</div>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-lg-4">

									</div>
									<div class="col-lg-4">

									</div>

									<div class="col-lg-4">
										<select name="sub_klasifikasi_tetap" id="subklas1_edit"  class="form-control" required="required">
												<option value="">Pilih Sub Klasifikasi</option>
												<?php foreach ($sub_klasifikasi as $row_sub_klasifikasi) :?>
													<option value="<?php echo $row_sub_klasifikasi['id_sub_klasifikasi'] ;?>"><?php echo $row_sub_klasifikasi['id_sub_klasifikasi'].' - '.$row_sub_klasifikasi['deskripsi_subklasifikasi'] ;?></option>
												<?php endforeach ;?>
										</select>
									</div>
								</div>



							</div>
						</div>

						<div class="form-group row">
							<div class="col-lg-6">
	              <label class="control-label">Upload Surat Pernyataan bukan pegawai negri sipil, Bukan TNI atau Kepolisian RI <span class="text-danger">*</span></label>
	              <input class="file-riwayat" id="file_riwayat"  name="file_riwayat" type="file" data-preview-file-type="text">
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
								<label class="control-label">Upload Rekaman SKK (Sertifikat Kompetensi Kerja) <span class="text-danger">*</span></label>
								<input class="file-1" id="file_sertifikat" name="file_sertifikat" type="file" data-preview-file-type="text">
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
		$(".modal-body #nama_delete").val(coba2);
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
				url : "<?php echo base_url('tenaga_kerja/cek_tenaga_kerja'); ?>",
				type : "POST",
				data : {id : sub,},
				success : function(data) {

					response = jQuery.parseJSON(data);
					record=response.record;
					pjbu=response.pjbu;
					pjt=response.pjt;
					$("#id").val(record[0].noreg);
					$("#bidang_edit").val(record[0].id_bidang);
					$("#sub_bidang_edit").val(record[0].id_sub_bidang);
					$("#noreg_edit").val(record[0].noreg);
					$("#nama_edit").val(record[0].nama);
					$("#ktps_edit").val(record[0].id_personal);
					$("#tgl_edit").val(record[0].tgl_lahir);
					$("#kode_pos_edit").val(record[0].kodepos);

					$("#pendidikan_akhir_edit").val(record[0].pendidikan_akhir);
					$("#no_ijazah_edit").val(record[0].no_ijazah);

					$("#npwp_edit").val(record[0].npwp);
					$("#alamat_edit").val(record[0].alamat);
					$("#kualifikasi_edit").val(record[0].id_kualifikasi);
					if( pjt.length === 0 ) {

						document.querySelector('#row_pjt_edit').style.display='';
						document.getElementById("pjt_edit").checked = false;
					}else{
						if(pjt[0].noreg==sub){
							document.querySelector('#row_pjt_edit').style.display='';
							document.getElementById("pjt_edit").checked = true;
						}else{
							document.querySelector('#row_pjt_edit').style.display='none';
							document.getElementById("pjt_edit").checked = false;
						}

					}

					if(record[0].pjsk=='1'){
						$("#ta_tetap_edit").prop("checked", true);
					}else{
						$("#ta_tetap_edit").prop("checked", false);

					}
					if( pjbu.length === 0 ) {

						document.querySelector('#row_pjbu_edit').style.display='';
						document.getElementById("pjbu_edit").checked = false;
					}else{
						if(pjbu[0].noreg==sub){
							document.querySelector('#row_pjbu_edit').style.display='';
							document.getElementById("pjbu_edit").checked = true;
						}else{
							document.querySelector('#row_pjbu_edit').style.display='none';
							document.getElementById("pjbu_edit").checked = false;
						}

					}

					$("#klas1_edit").val(record[0].id_klasifikasi_pjk1).attr("selected","selected");
					$("#subklas1_edit").val(record[0].id_sub_klasifikasi_pjsk1).attr("selected","selected");
					$("#klas2_edit").val(record[0].id_klasifikasi_pjk2).attr("selected","selected");
					$("#subklas2_edit").val(record[0].id_sub_klasifikasi_pjsk2).attr("selected","selected");


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
 $("#get_value").click(function () {
	 var noreg_value=document.querySelector('#nomor_registrasi').value;
	 var klasifikasi_value=document.querySelector('#klasifikasi').value;
	 var sub_klasifikasi_value=document.querySelector('#sub_klasifikasi').value;
	 var checkbox = document.querySelector('.Checkbox:checked').value;

	 if(checkbox=="tt"){
		 var propinsi=$('#propinsi').val();
	 }else{
		 var propinsi="";
	 }

	 if(noreg_value=="" || klasifikasi_value=="" || sub_klasifikasi_value==""){
		 toastr["warning"]("Mohon isi Field Nomer Registrasi, Klasifikasi dan Sub Klasifikasi  untuk mencari data", "Data Invalid");


	 }else{
		 $.ajax({
			 url : "<?php echo base_url('tenaga_kerja/cek_noreg'); ?>",
			 type : "POST",
			 data : {noreg:noreg_value,
			 klasifikasi : klasifikasi_value,
			 sub_klasifikasi : sub_klasifikasi_value,
			 option:checkbox,
			 propinsi_value:propinsi},
			 success : function(data) {
				 response = jQuery.parseJSON(data);
				 if(response.rec.length==0){
					 toastr["error"]("Data Tenaga Kerja tidak ditemukan", "Data Tidak Ditemukan");


				 }else if(response.record2!=0){
					 toastr["warning"]('Data Tenaga Kerja Sudah Terdaftar Di Badan Usaha '+response.nama+' Dengan NPWP '+response.npwp+' dan berada di propinsi '+response.propinsi, "Failed");

					 $("#noreg").val('');
					 $("#nama").val('');
					 $("#ktps").val('');
					 $("#anytime-month-numeric").val('2018-01-01');
					 $("#kodepos").val('');


					 $("#tahun_lulus").val('');
					 $("#npwp").val('');
					 $("#alamat").val('');
					 $("#sub_bidang").val('');
					 $("#jenis_tk").val('');
				 }else{
					 if(response.cek_habis.length==0){
						 toastr["warning"]("Sertifikat Tenaga Kerja Sudah Habis Masa Berlaku", "Failed");

					 }else{
						 toastr["success"]("Data Tenaga Kerja ditemukan", "Success");


						 $("#kualifikasi").val(response.record[0].id_Kualifikasi_profesi);
						 $("#noreg").val(noreg_value);
						 $("#nama").val(response.record[0].Nama);
						 $("#ktps").val(response.record[0].ID_Personal);
						 $("#anytime-month-numeric").val(response.record[0].Tgl_lahir);
						 $("#kodepos").val(response.record[0].Kodepos);
						 document.getElementById("no_ijazah").options.length = 0;
						 id_kabupaten=response.pendidikan;
						 document.querySelector('#no_ijazah').removeAttribute('disabled');
						 $.each(id_kabupaten, function(i, option) {
							 if(option.Jenjang=='1'){
								 var jenjang='Di bawah SMU';
							 }else if(option.Jenjang=='2'){
								 var jenjang='SMU atau sederajat';
							 }else if(option.Jenjang=='3'){
								 var jenjang='D1/D2/D3 atau sederajat';
							 }else if(option.Jenjang=='4'){
								 var jenjang='S1';
							 }else if(option.Jenjang=='5'){
								 var jenjang='S2';
							 }else if(option.Jenjang=='6'){
								 var jenjang='S3';
							 }
							 var $option = $("<option>", {text: option.No_Ijazah+' - '+jenjang, value: option.No_Ijazah});
							 $option.appendTo("#no_ijazah");
						 });
						 $("#tahun_lulus").val(response.record[0].Tahun);
						 $("#npwp").val(response.record[0].npwp);
						 $("#alamat").val(response.record[0].Alamat1);
						 $("#sub_bidang").val(response.record[0].id_sub_bidang);
						 $("#jenis_tk").val(response.record[0].tenaga_k);
					 }


				 }
				 console.log( JSON.parse(data));
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
	$("#tt").click(function () {
		document.querySelector('#propinsi').removeAttribute('style');
		document.getElementById("klasifikasi").options.length = 0;
		$("#condition_klasifikasi").val("trampil");
		$.ajax({
				url : "<?php echo base_url('tenaga_kerja/klasifikasi_trampil'); ?>",
				type : "POST",
				data : {},
				success : function(data) {

					response = jQuery.parseJSON(data);

					console.log( JSON.parse(data) );
					klasifikasi=response.record;

					$.each(klasifikasi, function(i, option) {
						var $option = $("<option>", {text:option.ID_Bidang_Profesi+' '+'-'+' '+option.Deskripsi, value: option.ID_Bidang_Profesi});
						$option.appendTo("#klasifikasi");
					});
					},
					error: function(xhr, status, error) {
						var err = eval("(" + xhr.responseText + ")");
						alert(err.Message);
					}
			});
		});
	$("#ta").click(function () {
		document.querySelector('#propinsi').style.visibility = 'hidden';
		document.getElementById("klasifikasi").options.length = 0;
		$("#condition_klasifikasi").val("ahli");
		$.ajax({
				url : "<?php echo base_url('tenaga_kerja/klasifikasi_ahli'); ?>",
				type : "POST",
				data : {},
				success : function(data) {

					response = jQuery.parseJSON(data);

					console.log( JSON.parse(data) );
					klasifikasi=response.record;

					$.each(klasifikasi, function(i, option) {
						var $option = $("<option>", {text:option.ID_Bidang_Profesi+' '+'-'+' '+option.Deskripsi, value: option.ID_Bidang_Profesi});
						$option.appendTo("#klasifikasi");
					});
					},
					error: function(xhr, status, error) {
						var err = eval("(" + xhr.responseText + ")");
						alert(err.Message);
					}
			});
		});

		$("#pjk").click(function () {
			var check = document.getElementById("pjk");
			if(check.checked==false){
				document.querySelector('#klas1').setAttribute('disabled','true');
				document.querySelector('#klas2').setAttribute('disabled','true');
			}else{
				document.querySelector('#klas1').removeAttribute('disabled');
				document.querySelector('#klas2').removeAttribute('disabled');


			}
		});
		$("#ta_tetap").click(function () {
			var check = document.getElementById("ta_tetap");
			if(check.checked==false){
				document.querySelector('#subklas1').setAttribute('disabled','true');
				document.querySelector('#subklas2').setAttribute('disabled','true');
			}else{
				document.querySelector('#subklas1').removeAttribute('disabled');
				document.querySelector('#subklas2').removeAttribute('disabled');


			}
		});
</script>
<script>

function getval(sel)
{
	document.getElementById("sub_klasifikasi").options.length = 0;
	var category=document.getElementById("condition_klasifikasi").value;

	$.ajax({
			url : "<?php echo base_url('tenaga_kerja/sub_klasifikasi_search'); ?>",
			type : "POST",
			data : {id_klasifikasi : sel.value,
							category_tk:category,},
			success : function(data) {

				response = jQuery.parseJSON(data);

				console.log( JSON.parse(data) );
				sub_klasifikasi=response.record;

				if(response.category=='ahli'){
					$.each(sub_klasifikasi, function(i, option) {
						var $option = $("<option>", {text: option.ID_Sub_Bidang_Keahlian+'-'+option.Deskripsi, value: option.ID_Sub_Bidang_Keahlian});
						$option.appendTo("#sub_klasifikasi");
					});
				}else if(response.category=='trampil'){
					$.each(sub_klasifikasi, function(i, option) {
						var $option = $("<option>", {text: option.ID_Sub_Bidang_Ketrampilan+'-'+option.Deskripsi, value: option.ID_Sub_Bidang_Ketrampilan});
						$option.appendTo("#sub_klasifikasi");
					});
				}


				},
				error: function(xhr, status, error) {
					var err = eval("(" + xhr.responseText + ")");
					alert(err.Message);
				}
		});
}

function getklasifikasi_tetap(sel)
{
	document.getElementById("sub_klasifikasi_tetap").options.length = 0;
	$.ajax({
			url : "<?php echo base_url('tenaga_kerja/sub_klasifikasi_search_bu'); ?>",
			type : "POST",
			data : {id_klasifikasi : sel.value,},
			success : function(data) {
				response = jQuery.parseJSON(data);
				console.log( JSON.parse(data) );
				sub_klasifikasi=response.record;
					$.each(sub_klasifikasi, function(i, option) {
						var $option = $("<option>", {text: option.id_sub_klasifikasi+'-'+option.Deskripsi, value: option.id_sub_klasifikasi});
						$option.appendTo("#sub_klasifikasi_tetap");
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
	$(".file-ktp").fileinput({
		maxFileSize: 20000,
    allowedFileExtensions: ['jpg', 'png', 'pdf'],
    showUpload: false,
    dropZoneEnabled: false
	});
	$(".file-ijazah").fileinput({
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
	$(".file-riwayat").fileinput({
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
		var progressBar2 = $('#progress-bar-2');


		$("form#form-upload-1").submit(function () {
			submitCounter++;
			event.preventDefault();

										// make sure there is file to upload

										if (document.getElementById("file_riwayat").files.length != 0 && document.getElementById("file_sertifikat").files.length != 0) {
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
															window.location.replace("<?php echo base_url('tenaga_kerja');?>");
														}
														else {
															window.location.replace("<?php echo base_url('tenaga_kerja');?>");

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


																				}
																				else {
																					progressBar.text(percentComplete + '%');
																					progressBar2.text(percentComplete + '%');

																				}
																				progressBar.css({width: percentComplete + "%"});
																				progressBar2.css({width: percentComplete + "%"});


																		}
																		;
																}, false);
														return xhr;
													}
												});
										}else{
											toastr["warning"]("Submit button can be clicked only once", "Notification");


									}
										}

								});
								$("form#form-upload-2").submit(function () {
									submitCounter++;
									event.preventDefault();

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
																					window.location.replace("<?php echo base_url('tenaga_kerja');?>");
																				}
																				else {
																					window.location.replace("<?php echo base_url('tenaga_kerja');?>");

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


																										}
																										else {
																											progressBar.text(percentComplete + '%');
																											progressBar2.text(percentComplete + '%');

																										}
																										progressBar.css({width: percentComplete + "%"});
																										progressBar2.css({width: percentComplete + "%"});


																								}
																								;
																						}, false);
																				return xhr;
																			}
																		});
																}else{
																	toastr["warning"]("Submit button can be clicked only once", "Notification");


															}


														});
		$('body').on('change.bs.fileinput', function (e) {
			$('.progress').hide();
			progressBar.text("0%");
			progressBar.css({width: "0%"});
		});
	});

</script>
