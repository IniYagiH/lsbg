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
							<a href="" class="text-dark">Modal</a>
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
						<h3 class="card-label">Data Modal</h3>
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
								<th>1. Kas Bank</th>
								<th>2. Piutang Usaha</th>
								<th>3. Persediaan</th>
								<th>4. Piutang Pajak</th>
								<th>5. Biaya Bayar Dimuka</th>
								<th>6. Pekerjaan Dalam Proses</th>
								<th>7. Total Aktiva Lancar Lainnya</th>
								<th>1. Utang Usaha</th>
								<th>2. Utang Bank </th>
								<th>3. Uang Muka</th>
								<th>4. Utang Pajak</th>
								<th>5. Biaya Masih Harus Dibayar</th>
								<th>6. Utang Jangka Panjang Jatuh Tempo</th>
								<th>7. Total Utang Lancar Lainnya</th>
								<th>Peralatan Proyek</th>
								<th>Inventaris Kantor</th>
								<th>Peralatan Lainnya</th>
								<th>Total Aktiva Tetap Lainnya</th>
								<th>Akumulasi Penyusutan</th>
								<th>Total Utang JP Lainnya</th>
								<th>Modal Dasar</th>
								<th>Modal Disetor</th>
								<th>Jumlah Lembar Saham</th>
								<th>Nilai Per-Lembar Saham</th>
								<th>File Tabel Neraca </th>
								<th>File Laporan KAP</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($record as $row) :?>
							<tr>
								<td></td>
								<td>
									<div class="d-flex align-items-center mr-3" data-inbox="actions">
										<label class="checkbox checkbox-outline checkbox-outline-2x checkbox-dark mr-3">
											<input type="checkbox" name="<?= $row['Tahun'] ;?>" class="call-checkbox"/>
											<span></span>
										</label>

									</div>

								</td>
								<td><?= $row['KasBank'] ;?></td>
								<td><?= $row['PiutangUsaha'] ;?></td>
								<td><?= $row['Persediaan'] ;?></td>
								<td><?= $row['PiutangPajak'] ;?></td>
								<td><?= $row['BiayaDimuka'] ;?></td>
								<td><?= $row['WIP'] ;?></td>
								<td><?= $row['AktivaLancarLainnya'] ;?></td>
								<td><?= $row['UtangUsaha'] ;?></td>
								<td><?= $row['UtangBank'] ;?></td>
								<td><?= $row['UangMuka'] ;?></td>
								<td><?= $row['UtangPajak'] ;?></td>
								<td><?= $row['BiayaMasihDibayar'] ;?></td>
								<td><?= $row['UtangJPJT'] ;?></td>
								<td><?= $row['UtangLain'] ;?></td>
								<td><?= $row['Peralatan'] ;?></td>
								<td><?= $row['Inventaris'] ;?></td>
								<td><?= $row['PeralatanLain'] ;?></td>
								<td><?= $row['AktivaTetapLainnya'] ;?></td>
								<td><?= $row['AkumulasiPenyusutan'] ;?></td>
								<td><?= $row['UtangLainJP'] ;?></td>
								<td><?= $row['modal_dasar'] ;?></td>
								<td><?= $row['modal_disetor'] ;?></td>
								<td><?= $row['jumlah_lembar'] ;?></td>
								<td><?= $row['nilai_lembar'] ;?></td>
								<td><a href="<?=base_url('get_file/get_bu_20/'.$row['persyaratan_20']) ;?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>
								<td><a href="<?=base_url('get_file/get_bu_21/'.$row['persyaratan_21']) ;?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>


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
		            <h3 class="card-label">Input Modal</h3>
		          </div>
		        </div>

		        <?php echo form_open_multipart('keuangan/insert_neraca/', 'class="form-horizontal form-validate-jquery" id="form-upload-1"');?>

							<div class="card-body">
								<div class="form-group row">
									<div class="col-lg-12">
											<label class="control-label">Tahun <span class="text-danger"></span></label>
											<input type="text" id="tahun"  name="tahun" required="required" class="form-control">

										</div>

								</div>
								<div class="card card-custom">
									<div class="card-header">
										<div class="col-lg-6">
											<div class="card-title">
												<h3 class="card-label">I Aktiva Lancar
												<small></small></h3>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="card-title">
												<h3 class="card-label">I Kewajiban Lancar
												<small></small></h3>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="form-group row">
					            <div class="col-lg-6">
					                <label class="control-label">1. Kas dan Bank <span class="text-danger"></span></label>
													<input type="text" id="kas_bank"  name="kas_bank" onchange="jumlah1()" oninput="setFormat('kas_bank')" value="0" required="required" class="form-control">

												</div>
					            <div class="col-lg-6">
					                <label class="control-label">1. Utang Usaha <span class="text-danger">*</span></label>
													<input type="text"  id="utang_usaha" onchange="jumlah2()"  oninput="setFormat('utang_usaha')" value="0" name="utang_usaha" class="form-control">

												</div>
					          </div>
										<div class="form-group row">
					            <div class="col-lg-6">
					                <label class="control-label">2. Piutang Usaha <span class="text-danger"></span></label>
													<input type="text" id="piutang_usaha" onchange="jumlah1()" oninput="setFormat('piutang_usaha')" value="0" name="piutang_usaha" required="required" class="form-control">

												</div>
					            <div class="col-lg-6">
					                <label class="control-label">2. Utang Bank <span class="text-danger">*</span></label>
													<input type="text"  id="utang_bank" onchange="jumlah2()" oninput="setFormat('utang_bank')" value="0" name="utang_bank" class="form-control">

												</div>
					          </div>
										<div class="form-group row">
					            <div class="col-lg-6">
					                <label class="control-label">3. Persediaan <span class="text-danger"></span></label>
													<input type="text" id="persediaan" onchange="jumlah1()" oninput="setFormat('persediaan')" value="0" name="persediaan" required="required" class="form-control">

												</div>
					            <div class="col-lg-6">
					                <label class="control-label">3. Uang Muka <span class="text-danger">*</span></label>
													<input type="text"  id="uang_muka" onchange="jumlah2()" oninput="setFormat('uang_muka')" value="0" name="uang_muka" class="form-control">

												</div>
					          </div>
										<div class="form-group row">
					            <div class="col-lg-6">
					                <label class="control-label">4. Piutang Pajak <span class="text-danger"></span></label>
													<input type="text" id="piutang_pajak" onchange="jumlah1()" oninput="setFormat('piutang_pajak')" value="0" name="piutang_pajak" required="required" class="form-control">

												</div>
					            <div class="col-lg-6">
					                <label class="control-label">4. Utang Pajak <span class="text-danger">*</span></label>
													<input type="text"  id="utang_pajak" onchange="jumlah2()" oninput="setFormat('utang_pajak')" value="0" name="utang_pajak" class="form-control">

												</div>
					          </div>
										<div class="form-group row">
					            <div class="col-lg-6">
					                <label class="control-label">5. Biaya Bayar Dimuka <span class="text-danger"></span></label>
													<input type="text" id="bayar_dimuka" onchange="jumlah1()" oninput="setFormat('bayar_dimuka')" value="0" name="bayar_dimuka" required="required" class="form-control">

												</div>
					            <div class="col-lg-6">
					                <label class="control-label">5. Biaya Masih Harus Dibayar <span class="text-danger">*</span></label>
													<input type="text" id="harus_dibayar" onchange="jumlah2()" oninput="setFormat('harus_dibayar')" value="0" name="harus_dibayar" class="form-control">

												</div>
					          </div>
										<div class="form-group row">
					            <div class="col-lg-6">
					                <label class="control-label">6. Pekerjaan Dalam Proses <span class="text-danger"></span></label>
													<input type="text" id="dlm_proses" onchange="jumlah1()" oninput="setFormat('dlm_proses')" name="dlm_proses" value="0" required="required" class="form-control">

												</div>
					            <div class="col-lg-6">
					                <label class="control-label">6. Utang Jangka Panjang Jatuh Tempo <span class="text-danger">*</span></label>
													<input type="text" id="jatuh_tempo" onchange="jumlah2()" oninput="setFormat('jatuh_tempo')" name="jatuh_tempo" value="0" class="form-control">

												</div>
					          </div>
										<div class="form-group row">
					            <div class="col-lg-6">
					                <label class="control-label">7. Total Aktiva Lancar Lainnya <span class="text-danger"></span></label>
													<input type="text" id="aktiva_lainnya" onchange="jumlah1()" oninput="setFormat('aktiva_lainnya')"  name="aktiva_lainnya" required="required" value="0" class="form-control">

												</div>
					            <div class="col-lg-6">
					                <label class="control-label">7. Total Utang Lancar Lainnya <span class="text-danger">*</span></label>
													<input type="text"  id="utang_lainnya" onchange="jumlah2()" oninput="setFormat('utang_lainnya')" name="utang_lainnya" value="0" class="form-control">

												</div>
					          </div>
										<div class="form-group row">
					            <div class="col-lg-6">
					                <label class="control-label">Jumlah Aktiva Lancar <span class="text-danger"></span></label>
													<input type="text" readonly="TRUE" value="0" id="jumlah_aktiva" name="jumlah_aktiva" value="0" class="form-control">

												</div>
					            <div class="col-lg-6">
					                <label class="control-label">Jumlah Utang Lancar<span class="text-danger">*</span></label>
													<input type="text" readonly="TRUE" value="0" id="jumlah_utang" name="jumlah_utang" class="form-control">

												</div>
					          </div>

									</div>
								</div>
								<div class="card card-custom">
									<div class="card-header">
										<div class="col-lg-6">
											<div class="card-title">
												<h3 class="card-label">II Aktiva Tetap
												<small></small></h3>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="card-title">
												<h3 class="card-label">II Kewajiban Jangka Panjang
												<small></small></h3>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="form-group row">
					            <div class="col-lg-6">
					                <label class="control-label">1. Peralatan Proyek <span class="text-danger">*</span></label>
													<input type="text" id="peralatan_proyek" onchange="jumlah3()" oninput="setFormat('peralatan_proyek')" name="peralatan_proyek" required="required" value="0" class="form-control">
					            </div>
					            <div class="col-lg-6">
												<label class="control-label">1. Utang Bank <span class="text-danger">*</span></label>
												<input type="text"  id="utang_bank_jp" onchange="jumlah4()" oninput="setFormat('utang_bank_jp')" name="utang_bank_jp" value="0" class="form-control">

												</div>
					          </div>
										<div class="form-group row">
					            <div class="col-lg-6">
					                <label class="control-label">2. Inventaris Kantor <span class="text-danger">*</span></label>
													<input type="text" id="inventaris_kantor" onchange="jumlah3()" oninput="setFormat('inventaris_kantor')" name="inventaris_kantor" required="required" value="0" class="form-control">
					            </div>
					            <div class="col-lg-6">
												<label class="control-label">2. Total Utang JP Lainnya <span class="text-danger">*</span></label>
												<input type="text"  id="total_utang_jp" onchange="jumlah4()" oninput="setFormat('total_utang_jp')" name="total_utang_jp" value="0" class="form-control">

												</div>
					          </div>
										<div class="form-group row">
					            <div class="col-lg-6">
					                <label class="control-label">3. Peralatan Lainnya <span class="text-danger">*</span></label>
													<input type="text" id="peralatan_lainnya" onchange="jumlah3()" oninput="setFormat('peralatan_lainnya')" name="peralatan_lainnya" required="required" value="0" class="form-control">
					            </div>
					            <div class="col-lg-6">

												</div>
					          </div>
										<div class="form-group row">
					            <div class="col-lg-6">
					                <label class="control-label">4. Total Aktiva Tetap Lainnya <span class="text-danger">*</span></label>
													<input type="text" id="aktiva_tetap_lainnya" onchange="jumlah3()" oninput="setFormat('aktiva_tetap_lainnya')" name="aktiva_tetap_lainnya" required="required" value="0" class="form-control">
					            </div>
					            <div class="col-lg-6">

												</div>
					          </div>
										<div class="form-group row">
					            <div class="col-lg-6">
					                <label class="control-label">5. Akumulasi Penyusutan <span class="text-danger">*</span></label>
													<input type="text" id="akumulasi_penyusutan" onchange="jumlah3()" oninput="setFormat('akumulasi_penyusutan')" name="akumulasi_penyusutan" required="required" value="0" class="form-control">
					            </div>
					            <div class="col-lg-6">

												</div>
					          </div>
										<div class="form-group row">
					            <div class="col-lg-6">
					                <label class="control-label">Jumlah Aktiva Tetap <span class="text-danger">*</span></label>
													<input type="text" readonly="TRUE" value="0" id="jumlah_aktiva_tetap" name="jumlah_aktiva_tetap" value="0" class="form-control">
					            </div>
					            <div class="col-lg-6">
												<label class="control-label">Jumlah Kewajiban Jangka Panjang <span class="text-danger">*</span></label>
												<input type="text" readonly="TRUE" value="0" id="jumlah_kewajiban" name="jumlah_kewajiban" value="0" class="form-control">

												</div>
					          </div>
									</div>
								</div>


								<div class="card card-custom">
									<div class="card-header">
										<div class="col-lg-6">
											<div class="card-title">
												<h3 class="card-label">Modal
												<small></small></h3>
											</div>
										</div>

									</div>
										<div class="card-body">
								<div class="form-group row">
									<div class="col-lg-6">
											<label class="control-label">Modal Dasar <span class="text-danger"></span></label>
											<input type="text" id="modal_dasar" oninput="setFormat('modal_dasar')"  name="modal_dasar" required="required" class="form-control">

									</div>
									<div class="col-lg-6">
											<label class="control-label">Modal Disetor <span class="text-danger"></span></label>
											<input type="text" id="modal_disetor" oninput="setFormat('modal_disetor')"  name="modal_disetor" required="required" class="form-control">

									</div>

								</div>
								<div class="form-group row">
									<div class="col-lg-6">
											<label class="control-label">Jumlah Lembar Saham <span class="text-danger"></span></label>
											<input type="text" id="jumlah_saham" oninput="setFormat('jumlah_saham')" name="jumlah_saham" required="required" class="form-control">

									</div>
									<div class="col-lg-6">
											<label class="control-label">Nilai Per-Lembar Saham <span class="text-danger"></span></label>
											<input type="text" id="nilai_saham" oninput="setFormat('nilai_saham')" name="nilai_saham" required="required" class="form-control">

									</div>
									</div>
								</div>
								</div>
								<div class="card card-custom">
									<div class="card-header">
										<div class="col-lg-6">
											<div class="card-title">
												<h3 class="card-label">Ekuitas
												<small></small></h3>
											</div>
										</div>

									</div>
										<div class="card-body">

								<div class="form-group row">

									<div class="col-lg-6">
											<label class="control-label">Ekuitas <span class="text-danger"></span></label>
											<input type="text" id="ekuitas" oninput="setFormat('ekuitas')" name="ekuitas" required="required" class="form-control">

									</div>
									</div>
								</div>
								</div>


							<div class="form-group row">

								<div class="col-lg-6">
									<label class="control-label">Upload Tabel Neraca <span class="text-danger">*</span></label>
									<input class="file-neraca" name="file_neraca" type="file" data-preview-file-type="text">
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
									<label class="control-label">Upload Laporan KAP <span class="text-danger">*</span></label>
									<input class="file-kap" name="file_kap" type="file" data-preview-file-type="text">
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
		            <h3 class="card-label">Input Modal</h3>
		          </div>
		        </div>

		        <?php echo form_open_multipart('keuangan/update_neraca/', 'class="form-horizontal form-validate-jquery" id="form-upload-1-edit"');?>

							<div class="card-body">
								<div class="form-group row">
									<div class="col-lg-12">
											<label class="control-label">Tahun <span class="text-danger"></span></label>
											<input type="text" id="tahun_edit"  name="tahun" required="required" class="form-control">

										</div>

								</div>
								<div class="card card-custom">
									<div class="card-header">
										<div class="col-lg-6">
											<div class="card-title">
												<h3 class="card-label">I Aktiva Lancar
												<small></small></h3>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="card-title">
												<h3 class="card-label">I Kewajiban Lancar
												<small></small></h3>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="form-group row">
					            <div class="col-lg-6">
					                <label class="control-label">1. Kas dan Bank <span class="text-danger"></span></label>
													<input type="text" id="kas_bank_edit"  name="kas_bank" onchange="jumlah1()" oninput="setFormat('kas_bank')" value="0" required="required" class="form-control">

												</div>
					            <div class="col-lg-6">
					                <label class="control-label">1. Utang Usaha <span class="text-danger">*</span></label>
													<input type="text"  id="utang_usaha_edit" onchange="jumlah2()"  oninput="setFormat('utang_usaha')" value="0" name="utang_usaha" class="form-control">

												</div>
					          </div>
										<div class="form-group row">
					            <div class="col-lg-6">
					                <label class="control-label">2. Piutang Usaha <span class="text-danger"></span></label>
													<input type="text" id="piutang_usaha_edit" onchange="jumlah1()" oninput="setFormat('piutang_usaha')" value="0" name="piutang_usaha" required="required" class="form-control">

												</div>
					            <div class="col-lg-6">
					                <label class="control-label">2. Utang Bank <span class="text-danger">*</span></label>
													<input type="text"  id="utang_bank_edit" onchange="jumlah2()" oninput="setFormat('utang_bank')" value="0" name="utang_bank" class="form-control">

												</div>
					          </div>
										<div class="form-group row">
					            <div class="col-lg-6">
					                <label class="control-label">3. Persediaan <span class="text-danger"></span></label>
													<input type="text" id="persediaan_edit" onchange="jumlah1()" oninput="setFormat('persediaan')" value="0" name="persediaan" required="required" class="form-control">

												</div>
					            <div class="col-lg-6">
					                <label class="control-label">3. Uang Muka <span class="text-danger">*</span></label>
													<input type="text"  id="uang_muka_edit" onchange="jumlah2()" oninput="setFormat('uang_muka')" value="0" name="uang_muka" class="form-control">

												</div>
					          </div>
										<div class="form-group row">
					            <div class="col-lg-6">
					                <label class="control-label">4. Piutang Pajak <span class="text-danger"></span></label>
													<input type="text" id="piutang_pajak_edit" onchange="jumlah1()" oninput="setFormat('piutang_pajak')" value="0" name="piutang_pajak" required="required" class="form-control">

												</div>
					            <div class="col-lg-6">
					                <label class="control-label">4. Utang Pajak <span class="text-danger">*</span></label>
													<input type="text"  id="utang_pajak_edit" onchange="jumlah2()" oninput="setFormat('utang_pajak')" value="0" name="utang_pajak" class="form-control">

												</div>
					          </div>
										<div class="form-group row">
					            <div class="col-lg-6">
					                <label class="control-label">5. Biaya Bayar Dimuka <span class="text-danger"></span></label>
													<input type="text" id="bayar_dimuka_edit" onchange="jumlah1()" oninput="setFormat('bayar_dimuka')" value="0" name="bayar_dimuka" required="required" class="form-control">

												</div>
					            <div class="col-lg-6">
					                <label class="control-label">5. Biaya Masih Harus Dibayar <span class="text-danger">*</span></label>
													<input type="text" id="harus_dibayar_edit" onchange="jumlah2()" oninput="setFormat('harus_dibayar')" value="0" name="harus_dibayar" class="form-control">

												</div>
					          </div>
										<div class="form-group row">
					            <div class="col-lg-6">
					                <label class="control-label">6. Pekerjaan Dalam Proses <span class="text-danger"></span></label>
													<input type="text" id="dlm_proses_edit" onchange="jumlah1()" oninput="setFormat('dlm_proses')" name="dlm_proses" value="0" required="required" class="form-control">

												</div>
					            <div class="col-lg-6">
					                <label class="control-label">6. Utang Jangka Panjang Jatuh Tempo <span class="text-danger">*</span></label>
													<input type="text" id="jatuh_tempo_edit" onchange="jumlah2()" oninput="setFormat('jatuh_tempo')" name="jatuh_tempo" value="0" class="form-control">

												</div>
					          </div>
										<div class="form-group row">
					            <div class="col-lg-6">
					                <label class="control-label">7. Total Aktiva Lancar Lainnya <span class="text-danger"></span></label>
													<input type="text" id="aktiva_lainnya_edit" onchange="jumlah1()" oninput="setFormat('aktiva_lainnya')"  name="aktiva_lainnya" required="required" value="0" class="form-control">

												</div>
					            <div class="col-lg-6">
					                <label class="control-label">7. Total Utang Lancar Lainnya <span class="text-danger">*</span></label>
													<input type="text"  id="utang_lainnya_edit" onchange="jumlah2()" oninput="setFormat('utang_lainnya')" name="utang_lainnya" value="0" class="form-control">

												</div>
					          </div>
										<div class="form-group row">
					            <div class="col-lg-6">
					                <label class="control-label">Jumlah Aktiva Lancar <span class="text-danger"></span></label>
													<input type="text" readonly="TRUE" value="0" id="jumlah_aktiva_edit" name="jumlah_aktiva" value="0" class="form-control">

												</div>
					            <div class="col-lg-6">
					                <label class="control-label">Jumlah Utang Lancar<span class="text-danger">*</span></label>
													<input type="text" readonly="TRUE" value="0" id="jumlah_utang_edit" name="jumlah_utang" class="form-control">

												</div>
					          </div>

									</div>
								</div>
								<div class="card card-custom">
									<div class="card-header">
										<div class="col-lg-6">
											<div class="card-title">
												<h3 class="card-label">II Aktiva Tetap
												<small></small></h3>
											</div>
										</div>
										<div class="col-lg-6">
											<div class="card-title">
												<h3 class="card-label">II Kewajiban Jangka Panjang
												<small></small></h3>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="form-group row">
					            <div class="col-lg-6">
					                <label class="control-label">1. Peralatan Proyek <span class="text-danger">*</span></label>
													<input type="text" id="peralatan_proyek_edit" onchange="jumlah3()" oninput="setFormat('peralatan_proyek')" name="peralatan_proyek" required="required" value="0" class="form-control">
					            </div>
					            <div class="col-lg-6">
												<label class="control-label">1. Utang Bank <span class="text-danger">*</span></label>
												<input type="text"  id="utang_bank_jp_edit" onchange="jumlah4()" oninput="setFormat('utang_bank_jp')" name="utang_bank_jp" value="0" class="form-control">

												</div>
					          </div>
										<div class="form-group row">
					            <div class="col-lg-6">
					                <label class="control-label">2. Inventaris Kantor <span class="text-danger">*</span></label>
													<input type="text" id="inventaris_kantor_edit" onchange="jumlah3()" oninput="setFormat('inventaris_kantor')" name="inventaris_kantor" required="required" value="0" class="form-control">
					            </div>
					            <div class="col-lg-6">
												<label class="control-label">2. Total Utang JP Lainnya <span class="text-danger">*</span></label>
												<input type="text"  id="total_utang_jp_edit" onchange="jumlah4()" oninput="setFormat('total_utang_jp')" name="total_utang_jp" value="0" class="form-control">

												</div>
					          </div>
										<div class="form-group row">
					            <div class="col-lg-6">
					                <label class="control-label">3. Peralatan Lainnya <span class="text-danger">*</span></label>
													<input type="text" id="peralatan_lainnya_edit" onchange="jumlah3()" oninput="setFormat('peralatan_lainnya')" name="peralatan_lainnya" required="required" value="0" class="form-control">
					            </div>
					            <div class="col-lg-6">

												</div>
					          </div>
										<div class="form-group row">
					            <div class="col-lg-6">
					                <label class="control-label">4. Total Aktiva Tetap Lainnya <span class="text-danger">*</span></label>
													<input type="text" id="aktiva_tetap_lainnya_edit" onchange="jumlah3()" oninput="setFormat('aktiva_tetap_lainnya')" name="aktiva_tetap_lainnya" required="required" value="0" class="form-control">
					            </div>
					            <div class="col-lg-6">

												</div>
					          </div>
										<div class="form-group row">
					            <div class="col-lg-6">
					                <label class="control-label">5. Akumulasi Penyusutan <span class="text-danger">*</span></label>
													<input type="text" id="akumulasi_penyusutan_edit" onchange="jumlah3()" oninput="setFormat('akumulasi_penyusutan')" name="akumulasi_penyusutan" required="required" value="0" class="form-control">
					            </div>
					            <div class="col-lg-6">

												</div>
					          </div>
										<div class="form-group row">
					            <div class="col-lg-6">
					                <label class="control-label">Jumlah Aktiva Tetap <span class="text-danger">*</span></label>
													<input type="text" readonly="TRUE" value="0" id="jumlah_aktiva_tetap_edit" name="jumlah_aktiva_tetap" value="0" class="form-control">
					            </div>
					            <div class="col-lg-6">
												<label class="control-label">Jumlah Kewajiban Jangka Panjang <span class="text-danger">*</span></label>
												<input type="text" readonly="TRUE" value="0" id="jumlah_kewajiban_edit" name="jumlah_kewajiban" value="0" class="form-control">

												</div>
					          </div>
									</div>
								</div>


								<div class="card card-custom">
									<div class="card-header">
										<div class="col-lg-6">
											<div class="card-title">
												<h3 class="card-label">Modal
												<small></small></h3>
											</div>
										</div>

									</div>
										<div class="card-body">
								<div class="form-group row">
									<div class="col-lg-6">
											<label class="control-label">Modal Dasar <span class="text-danger"></span></label>
											<input type="text" id="modal_dasar_edit" oninput="setFormat('modal_dasar')"  name="modal_dasar" required="required" class="form-control">

									</div>
									<div class="col-lg-6">
											<label class="control-label">Modal Disetor <span class="text-danger"></span></label>
											<input type="text" id="modal_disetor_edit" oninput="setFormat('modal_disetor')"  name="modal_disetor" required="required" class="form-control">

									</div>

								</div>
								<div class="form-group row">
									<div class="col-lg-6">
											<label class="control-label">Jumlah Lembar Saham <span class="text-danger"></span></label>
											<input type="text" id="jumlah_saham_edit" oninput="setFormat('jumlah_saham')" name="jumlah_saham" required="required" class="form-control">

									</div>
									<div class="col-lg-6">
											<label class="control-label">Nilai Per-Lembar Saham <span class="text-danger"></span></label>
											<input type="text" id="nilai_saham_edit" oninput="setFormat('nilai_saham')" name="nilai_saham" required="required" class="form-control">

									</div>
									</div>
								</div>
								</div>
								<div class="card card-custom">
									<div class="card-header">
										<div class="col-lg-6">
											<div class="card-title">
												<h3 class="card-label">Ekuitas
												<small></small></h3>
											</div>
										</div>

									</div>
										<div class="card-body">

								<div class="form-group row">

									<div class="col-lg-6">
											<label class="control-label">Ekuitas <span class="text-danger"></span></label>
											<input type="text" id="ekuitas_edit" oninput="setFormat('ekuitas')" name="ekuitas" required="required" class="form-control">

									</div>
									</div>
								</div>
								</div>


							<div class="form-group row">

								<div class="col-lg-6">
									<label class="control-label">Upload Tabel Neraca <span class="text-danger">*</span></label>
									<input class="file-neraca" name="file_neraca" type="file" data-preview-file-type="text">
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
									<label class="control-label">Upload Laporan KAP <span class="text-danger">*</span></label>
									<input class="file-kap" name="file_kap" type="file" data-preview-file-type="text">
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
						$("#modal_dasar_edit").val(record[0].modal_dasar);
						$("#modal_disetor_edit").val(record[0].modal_disetor);
						$("#jumlah_saham_edit").val(record[0].jumlah_lembar);
						$("#nilai_saham_edit").val(record[0].nilai_lembar);
						$("#ekuitas_edit").val(record[0].ekuitas);




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
<script>
function jumlah6(){
	var cek11=document.querySelector('#aktiva_lainnya_2').value;
	if(cek11==""){cek11="0";}
	var aktiva_lainnya_2=cek11.replace(/\./g,'');
	var cek21=document.querySelector('#jumlah_aktiva_tetap').value;
	if(cek21==""){cek21="0";}
	var jumlah_aktiva_tetap=cek21.replace(/\./g,'');
	var cek31=document.querySelector('#jumlah_aktiva').value;
	if(cek31==""){cek31="0";}
	var jumlah_aktiva=cek31.replace(/\./g,'');


	var jumlah = parseInt(aktiva_lainnya_2,10) + parseInt(jumlah_aktiva_tetap,10) + parseInt(jumlah_aktiva,10);
	$("#total_aktiva_semua").val(jumlah);
	setFormat('total_aktiva_semua');
}

function jumlah1() {
	var cek1=document.querySelector('#kas_bank').value;
	if(cek1==""){cek1="0";}
	var kas_bank=cek1.replace(/\./g,'');
	var cek2=document.querySelector('#piutang_usaha').value;
	if(cek2==""){cek2="0";}
	var piutang_usaha=cek2.replace(/\./g,'');
	var cek3=document.querySelector('#persediaan').value;
	if(cek3==""){cek3="0";}
	var persediaan=cek3.replace(/\./g,'');
	var cek4=document.querySelector('#piutang_pajak').value;
	if(cek4==""){cek4="0";}
	var piutang_pajak=cek4.replace(/\./g,'');
	var cek5=document.querySelector('#bayar_dimuka').value;
	if(cek5==""){cek5="0";}
	var bayar_dimuka=cek5.replace(/\./g,'');
	var cek6=document.querySelector('#dlm_proses').value;
	if(cek6==""){cek6="0";}
	var dlm_proses=cek6.replace(/\./g,'');
	var cek7=document.querySelector('#aktiva_lainnya').value;
	if(cek7==""){cek7="0";}
	var activa_lainnya=cek7.replace(/\./g,'');

	var jumlah = parseInt(kas_bank,10) + parseInt(piutang_usaha,10)+ parseInt(persediaan,10) + parseInt(piutang_pajak,10) + parseInt(bayar_dimuka,10) + parseInt(dlm_proses,10) + parseInt(activa_lainnya,10);

	$("#jumlah_aktiva").val(jumlah);
	setFormat('jumlah_aktiva');

	var cek11=document.querySelector('#aktiva_lainnya_2').value;
	if(cek11==""){cek11="0";}
	var aktiva_lainnya_2=cek11.replace(/\./g,'');
	var cek21=document.querySelector('#jumlah_aktiva_tetap').value;
	if(cek21==""){cek21="0";}
	var jumlah_aktiva_tetap=cek21.replace(/\./g,'');
	var cek31=document.querySelector('#jumlah_aktiva').value;
	if(cek31==""){cek31="0";}
	var jumlah_aktiva=cek31.replace(/\./g,'');


	var jumlah = parseInt(aktiva_lainnya_2,10) + parseInt(jumlah_aktiva_tetap,10) + parseInt(jumlah_aktiva,10);
	$("#total_aktiva_semua").val(jumlah);
	setFormat('total_aktiva_semua');
}


function jumlah2(){
	var cek1=document.querySelector('#utang_usaha').value;
	if(cek1==""){cek1="0";}
	var utang_usaha=cek1.replace(/\./g,'');
	var cek2=document.querySelector('#utang_bank').value;
	if(cek2==""){cek2="0";}
	var utang_bank=cek2.replace(/\./g,'');
	var cek3=document.querySelector('#uang_muka').value;
	if(cek3==""){cek3="0";}
	var uang_muka=cek3.replace(/\./g,'');
	var cek4=document.querySelector('#utang_pajak').value;
	if(cek4==""){cek4="0";}
	var utang_pajak=cek4.replace(/\./g,'');
	var cek5=document.querySelector('#harus_dibayar').value;
	if(cek5==""){cek5="0";}
	var harus_bayar=cek5.replace(/\./g,'');
	var cek6=document.querySelector('#jatuh_tempo').value;
	if(cek6==""){cek6="0";}
	var jatuh_tempo=cek6.replace(/\./g,'');
	var cek7=document.querySelector('#utang_lainnya').value;
	if(cek7==""){cek7="0";}
	var utang_lainnya=cek7.replace(/\./g,'');

	var jumlah = parseInt(utang_usaha,10) + parseInt(utang_bank,10)+ parseInt(uang_muka,10) + parseInt(utang_pajak,10) + parseInt(harus_bayar,10) + parseInt(jatuh_tempo,10) + parseInt(utang_lainnya,10);
	$("#jumlah_utang").val(jumlah);
	setFormat('jumlah_utang');

	var cek11=document.querySelector('#jumlah_modal').value;
	if(cek11==""){cek11="0";}
	var jumlah_modal=cek11.replace(/\./g,'');
	var cek21=document.querySelector('#jumlah_kewajiban').value;
	if(cek21==""){cek21="0";}
	var jumlah_kewajiban=cek21.replace(/\./g,'');
	var cek31=document.querySelector('#jumlah_utang').value;
	if(cek31==""){cek31="0";}
	var jumlah_utang=cek31.replace(/\./g,'');


	var jumlah = parseInt(jumlah_modal,10) + parseInt(jumlah_kewajiban,10) + parseInt(jumlah_utang,10);
	$("#total_kewajiban_semua").val(jumlah);
	setFormat('total_kewajiban_semua');
}


function jumlah3(){
	var cek1=document.querySelector('#peralatan_proyek').value;
	if(cek1==""){cek1="0";}
	var peralatan_proyek=cek1.replace(/\./g,'');
	var cek2=document.querySelector('#inventaris_kantor').value;
	if(cek2==""){cek2="0";}
	var inventaris_kantor=cek2.replace(/\./g,'');
	var cek3=document.querySelector('#peralatan_lainnya').value;
	if(cek3==""){cek3="0";}
	var peralatan_lainnya=cek3.replace(/\./g,'');
	var cek4=document.querySelector('#aktiva_tetap_lainnya').value;
	if(cek4==""){cek4="0";}
	var aktiva_lainnya=cek4.replace(/\./g,'');
	var cek5=document.querySelector('#akumulasi_penyusutan').value;
	if(cek5==""){cek5="0";}
	var akumulasi_penyusutan=cek5.replace(/\./g,'');


	var jumlah = parseInt(peralatan_proyek,10) + parseInt(inventaris_kantor,10)+ parseInt(peralatan_lainnya,10) + parseInt(aktiva_lainnya,10) + parseInt(akumulasi_penyusutan,10);
	$("#jumlah_aktiva_tetap").val(jumlah);
	setFormat('jumlah_aktiva_tetap');
	var cek11=document.querySelector('#aktiva_lainnya_2').value;
	if(cek11==""){cek11="0";}
	var aktiva_lainnya_2=cek11.replace(/\./g,'');
	var cek21=document.querySelector('#jumlah_aktiva_tetap').value;
	if(cek21==""){cek21="0";}
	var jumlah_aktiva_tetap=cek21.replace(/\./g,'');
	var cek31=document.querySelector('#jumlah_aktiva').value;
	if(cek31==""){cek31="0";}
	var jumlah_aktiva=cek31.replace(/\./g,'');


	var jumlah = parseInt(aktiva_lainnya_2,10) + parseInt(jumlah_aktiva_tetap,10) + parseInt(jumlah_aktiva,10);
	$("#total_aktiva_semua").val(jumlah);
	setFormat('total_aktiva_semua');
}

function jumlah4(){
	var cek1=document.querySelector('#utang_bank_jp').value;
	if(cek1==""){cek1="0";}
	var utang_bank=cek1.replace(/\./g,'');
	var cek2=document.querySelector('#total_utang_jp').value;
	if(cek2==""){cek2="0";}
	var total_uang_jp=cek2.replace(/\./g,'');
	var jumlah = parseInt(utang_bank,10) + parseInt(total_uang_jp,10);
	$("#jumlah_kewajiban").val(jumlah);
	setFormat('jumlah_kewajiban');

	var cek11=document.querySelector('#jumlah_modal').value;
	if(cek11==""){cek11="0";}
	var jumlah_modal=cek11.replace(/\./g,'');
	var cek21=document.querySelector('#jumlah_kewajiban').value;
	if(cek21==""){cek21="0";}
	var jumlah_kewajiban=cek21.replace(/\./g,'');
	var cek31=document.querySelector('#jumlah_utang').value;
	if(cek31==""){cek31="0";}
	var jumlah_utang=cek31.replace(/\./g,'');


	var jumlah = parseInt(jumlah_modal,10) + parseInt(jumlah_kewajiban,10) + parseInt(jumlah_utang,10);
	$("#total_kewajiban_semua").val(jumlah);
	setFormat('total_kewajiban_semua');
}

function jumlah5(){
	var cek1=document.querySelector('#modal_disetor').value;
	if(cek1==""){cek1="0";}
	var modal_disetor=cek1.replace(/\./g,'');
	var cek2=document.querySelector('#selisih_revaluasi').value;
	if(cek2==""){cek2="0";}
	var selisih_revaluasi=cek2.replace(/\./g,'');
	var cek3=document.querySelector('#laba').value;
	if(cek3==""){cek3="0";}
	var laba_ditahan=cek3.replace(/\./g,'');
	var cek4=document.querySelector('#modal_lainnya').value;
	if(cek4==""){cek4="0";}
	var modal_lain=cek4.replace(/\./g,'');
	var jumlah = parseInt(modal_disetor,10) + parseInt(selisih_revaluasi,10) + parseInt(laba_ditahan,10) + parseInt(modal_lain,10);
	$("#jumlah_modal").val(jumlah);
	setFormat('jumlah_modal');
		var cek11=document.querySelector('#jumlah_modal').value;
		if(cek11==""){cek11="0";}
		var jumlah_modal=cek11.replace(/\./g,'');
		var cek21=document.querySelector('#jumlah_kewajiban').value;
		if(cek21==""){cek21="0";}
		var jumlah_kewajiban=cek21.replace(/\./g,'');
		var cek31=document.querySelector('#jumlah_utang').value;
		if(cek31==""){cek31="0";}
		var jumlah_utang=cek31.replace(/\./g,'');


		var jumlah = parseInt(jumlah_modal,10) + parseInt(jumlah_kewajiban,10) + parseInt(jumlah_utang,10);
		$("#total_kewajiban_semua").val(jumlah);
		setFormat('total_kewajiban_semua');

		var cek0=document.querySelector('#modal_disetor').value;
		if(cek0==""){cek0="0";}
		var modal_disetor=cek0.replace(/\./g,'');
		var cek00=document.querySelector('#laba').value;
		if(cek00==""){cek00="0";}
		var laba=cek00.replace(/\./g,'');
		var cek000=document.querySelector('#selisih_revaluasi').value;
		if(cek000==""){cek000="0";}
		var selisih_revaluasi=cek000.replace(/\./g,'');
		var cek0000=document.querySelector('#modal_lainnya').value;
		if(cek0000==""){cek0000="0";}
		var modal_lain=cek0000.replace(/\./g,'');
		var checkedValue = document.querySelector('#laba_ditahan_checkbox:checked');
		var jumlah4 = parseInt(modal_disetor,10) + parseInt(selisih_revaluasi,10) + parseInt(modal_lain,10);
		if(checkedValue!=null){
			var jumlah2= parseInt(jumlah4,10) - parseInt(laba,10);
		}else{
			var jumlah2= parseInt(jumlah4,10) + parseInt(laba,10);
		}
		$("#jumlah_modal").val(jumlah2);
			setFormat('jumlah_modal');
		$("#kekayaan_bersih").val(jumlah2);
		setFormat('kekayaan_bersih');
}








</script>



<script type="text/javascript">

	$(".file-kap").fileinput({
		maxFileSize: 20000,
		allowedFileExtensions: ['jpg', 'png', 'pdf'],
		showUpload: false,
		dropZoneEnabled: false
	});
	$(".file-neraca").fileinput({
		maxFileSize: 20000,
		allowedFileExtensions: ['jpg', 'png', 'pdf'],
		showUpload: false,
		dropZoneEnabled: false
	});
	var submitCounter = 0;
	$(function () {
		var inputFile = $('input[name=file_neraca]');
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
															window.location.replace("<?php echo base_url('keuangan/neraca');?>");
														}
														else {
															window.location.replace("<?php echo base_url('keuangan/neraca');?>");

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
