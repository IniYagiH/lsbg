<link href="<?=base_url('assets/fileinput/css/fileinput.css') ;?>" media="all" rel="stylesheet" type="text/css"/>
<link href="<?=base_url('assets/fileinput/themes/explorer-fas/theme.css') ;?>" media="all" rel="stylesheet" type="text/css"/>
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


?>

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
  <!--begin::Subheader-->
  <div class="subheader py-2 py-lg-12 subheader-transparent" id="kt_subheader">
    <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
      <!--begin::Info-->
      <div class="d-flex align-items-center flex-wrap mr-1">
        <!--begin::Heading-->
        <div class="d-flex flex-column">
          <!--begin::Title-->
          <h2 class="text-white font-weight-bold my-2 mr-5">Neraca</h2>
          <!--end::Title-->
          <!--begin::Breadcrumb-->
          <div class="d-flex align-items-center font-weight-bold my-2">
            <!--begin::Item-->
            <a href="#" class="opacity-75 hover-opacity-100">
              <i class="flaticon2-shelter text-white icon-1x"></i>
            </a>
            <!--end::Item-->
            <!--begin::Item-->
            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
            <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Badan Usaha</a>
            <!--end::Item-->
            <!--begin::Item-->
            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
            <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Neraca</a>
            <!--end::Item-->
          </div>
          <!--end::Breadcrumb-->
        </div>
        <!--end::Heading-->
      </div>

    </div>
  </div>

  <div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
			<div class="card card-custom card-sticky">
				<div class="card-header">
					<div class="card-title">
						<h1 class="card-label">Nama :
						<i class="mr-2"></i>
						<small class=""> <?php echo $this->session->userdata('nama'); ?></small></h3>
						<h1 class="card-label">NPWP :
						<i class="mr-2"></i>
						<small class=""> <?php echo $this->session->userdata('npwp'); ?></small></h3>

					</div>

				</div>
				<div class="card-body">
					<div class="card-title">
            <span class="card-icon">
              <i class="flaticon-file-1 text-primary"></i>
            </span>
            <h3 class="card-label">Edit Neraca</h3>

          </div>
				</div>
			</div>
      <!--begin::Card-->
      <div class="card card-custom gutter-b">
        <div class="card-header">
          <div class="card-title">
            <span class="card-icon">
              <i class="flaticon-file-1 text-primary"></i>
            </span>
            <h3 class="card-label">Input Neraca</h3>
          </div>
        </div>

        <?php echo form_open_multipart('keuangan/update_neraca/', 'class="form-horizontal form-validate-jquery" id="form-upload-1"');?>

					<div class="card-body">
						<div class="form-group row">
							<div class="col-lg-12">
									<label class="control-label">Tahun <span class="text-danger"></span></label>
									<input type="text" id="tahun" name="tahun" required="required" value="<?php echo $neraca[0]['Tahun'] ?>" class="form-control">

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
											<input type="text" id="kas_bank" name="kas_bank" onchange="jumlah1()" value="<?php echo $neraca[0]['KasBank'] ?>" oninput="setFormat('kas_bank')" required="required" class="form-control">

										</div>
			            <div class="col-lg-6">
			                <label class="control-label">1. Utang Usaha <span class="text-danger">*</span></label>
											<input type="hidden" name="fff" value="<?php echo encrypt_url($neraca[0]['Tahun']);  ?>" class="form-control">
											<input type="text"  id="utang_usaha" onchange="jumlah2()" value="<?php echo $neraca[0]['UtangUsaha'] ?>"  oninput="setFormat('utang_usaha')" name="utang_usaha" class="form-control">
										</div>
			          </div>
								<div class="form-group row">
			            <div class="col-lg-6">
			                <label class="control-label">2. Piutang Usaha <span class="text-danger"></span></label>
											<input type="text" id="piutang_usaha" onchange="jumlah1()" oninput="setFormat('piutang_usaha')" name="piutang_usaha" value="<?php echo $neraca[0]['PiutangUsaha'] ?>" required="required" class="form-control">

										</div>
			            <div class="col-lg-6">
			                <label class="control-label">2. Utang Bank <span class="text-danger">*</span></label>
											<input type="text"  id="utang_bank" onchange="jumlah2()" oninput="setFormat('utang_bank')" name="utang_bank" value="<?php echo $neraca[0]['UtangBank'] ?>" class="form-control">

										</div>
			          </div>
								<div class="form-group row">
			            <div class="col-lg-6">
			                <label class="control-label">3. Persediaan <span class="text-danger"></span></label>
											<input type="text" id="persediaan" onchange="jumlah1()" oninput="setFormat('persediaan')" name="persediaan" value="<?php echo $neraca[0]['Persediaan'] ?>" required="required" class="form-control">

										</div>
			            <div class="col-lg-6">
			                <label class="control-label">3. Uang Muka <span class="text-danger">*</span></label>
											<input type="text"  id="uang_muka" onchange="jumlah2()" oninput="setFormat('uang_muka')" name="uang_muka" value="<?php echo $neraca[0]['UangMuka'] ?>" class="form-control">

										</div>
			          </div>
								<div class="form-group row">
			            <div class="col-lg-6">
			                <label class="control-label">4. Piutang Pajak <span class="text-danger"></span></label>
											<input type="text" id="piutang_pajak" onchange="jumlah1()" oninput="setFormat('piutang_pajak')" name="piutang_pajak" value="<?php echo $neraca[0]['PiutangPajak'] ?>" required="required" class="form-control">

										</div>
			            <div class="col-lg-6">
			                <label class="control-label">4. Utang Pajak <span class="text-danger">*</span></label>
											<input type="text"  id="utang_pajak" onchange="jumlah2()" oninput="setFormat('utang_pajak')" name="utang_pajak" value="<?php echo $neraca[0]['UtangPajak'] ?>" class="form-control">

										</div>
			          </div>
								<div class="form-group row">
			            <div class="col-lg-6">
			                <label class="control-label">5. Biaya Bayar Dimuka <span class="text-danger"></span></label>
											<input type="text" id="bayar_dimuka" onchange="jumlah1()" oninput="setFormat('bayar_dimuka')" name="bayar_dimuka" required="required" value="<?php echo $neraca[0]['BiayaDimuka'] ?>" class="form-control">

										</div>
			            <div class="col-lg-6">
			                <label class="control-label">5. Biaya Masih Harus Dibayar <span class="text-danger">*</span></label>
											<input type="text" id="harus_dibayar" onchange="jumlah2()" oninput="setFormat('harus_dibayar')" name="harus_dibayar" value="<?php echo $neraca[0]['BiayaMasihDibayar'] ?>" class="form-control">

										</div>
			          </div>
								<div class="form-group row">
			            <div class="col-lg-6">
			                <label class="control-label">6. Pekerjaan Dalam Proses <span class="text-danger"></span></label>
											<input type="text" id="dlm_proses" onchange="jumlah1()" oninput="setFormat('dlm_proses')" name="dlm_proses" required="required" value="<?php echo $neraca[0]['WIP'] ?>" class="form-control">

										</div>
			            <div class="col-lg-6">
			                <label class="control-label">6. Utang Jangka Panjang Jatuh Tempo <span class="text-danger">*</span></label>
											<input type="text" id="jatuh_tempo" onchange="jumlah2()" oninput="setFormat('jatuh_tempo')" name="jatuh_tempo"  class="form-control" value="<?php echo $neraca[0]['UtangJPJT'] ?>">

										</div>
			          </div>
								<div class="form-group row">
			            <div class="col-lg-6">
			                <label class="control-label">7. Total Aktiva Lancar Lainnya <span class="text-danger"></span></label>
											<input type="text" id="aktiva_lainnya" onchange="jumlah1()" oninput="setFormat('aktiva_lainnya')" name="aktiva_lainnya" value="<?php echo $neraca[0]['AktivaLancarLainnya'] ?>" required="required" class="form-control">

										</div>
			            <div class="col-lg-6">
			                <label class="control-label">7. Total Utang Lancar Lainnya <span class="text-danger">*</span></label>
											<input type="text"  id="utang_lainnya" onchange="jumlah2()" oninput="setFormat('utang_lainnya')" name="utang_lainnya"  class="form-control" value="<?php echo $neraca[0]['UtangLain'] ?>">

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
											<input type="text" id="peralatan_proyek" onchange="jumlah3()" oninput="setFormat('peralatan_proyek')" name="peralatan_proyek" value="<?php echo $neraca[0]['Peralatan'] ?>" required="required" class="form-control">
			            </div>
			            <div class="col-lg-6">
										<label class="control-label">1. Utang Bank <span class="text-danger">*</span></label>
										<input type="text"  id="utang_bank_jp" onchange="jumlah4()" oninput="setFormat('utang_bank_jp')" name="utang_bank_jp" value="<?php echo $neraca[0]['UtangBankJP'] ?>" class="form-control">

										</div>
			          </div>
								<div class="form-group row">
			            <div class="col-lg-6">
			                <label class="control-label">2. Inventaris Kantor <span class="text-danger">*</span></label>
											<input type="text" id="inventaris_kantor" onchange="jumlah3()" oninput="setFormat('inventaris_kantor')" name="inventaris_kantor" value="<?php echo $neraca[0]['Inventaris'] ?>" required="required" class="form-control">
			            </div>
			            <div class="col-lg-6">
										<label class="control-label">2. Total Utang JP Lainnya <span class="text-danger">*</span></label>
										<input type="text"  id="total_utang_jp" onchange="jumlah4()" oninput="setFormat('total_utang_jp')" name="total_utang_jp" value="<?php echo $neraca[0]['UtangLainJP'] ?>" class="form-control">

										</div>
			          </div>
								<div class="form-group row">
			            <div class="col-lg-6">
			                <label class="control-label">3. Peralatan Lainnya <span class="text-danger">*</span></label>
											<input type="text" id="peralatan_lainnya" onchange="jumlah3()" oninput="setFormat('peralatan_lainnya')" name="peralatan_lainnya" value="<?php echo $neraca[0]['PeralatanLain'] ?>" required="required" class="form-control">
			            </div>
			            <div class="col-lg-6">

										</div>
			          </div>
								<div class="form-group row">
			            <div class="col-lg-6">
			                <label class="control-label">4. Total Aktiva Tetap Lainnya <span class="text-danger">*</span></label>
											<input type="text" id="aktiva_tetap_lainnya" onchange="jumlah3()" oninput="setFormat('aktiva_tetap_lainnya')" name="aktiva_tetap_lainnya" value="<?php echo $neraca[0]['AktivaTetapLainnya'] ?>" required="required" class="form-control">
			            </div>
			            <div class="col-lg-6">

										</div>
			          </div>
								<div class="form-group row">
			            <div class="col-lg-6">
			                <label class="control-label">5. Akumulasi Penyusutan <span class="text-danger">*</span></label>
											<input type="text" id="akumulasi_penyusutan" onchange="jumlah3()" oninput="setFormat('akumulasi_penyusutan')" name="akumulasi_penyusutan" value="<?php echo $neraca[0]['AkumulasiPenyusutan'] ?>" required="required" class="form-control">
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
										<h3 class="card-label">III Aktiva Lainnya
										<small></small></h3>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="card-title">
										<h3 class="card-label">III Modal
										<small></small></h3>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="form-group row">
									<div class="col-lg-6">
											<label class="control-label">1. Aktiva Lainnya <span class="text-danger">*</span></label>
											<input type="text" id="aktiva_lainnya_2" onchange="jumlah6()" oninput="setFormat('aktiva_lainnya_2')" name="aktiva_lainnya_2" value="<?php echo $neraca[0]['AktivaLain'] ?>" required="required" class="form-control">
									</div>
									<div class="col-lg-6">
										<label class="control-label">1. Modal Disetor <span class="text-danger">*</span></label>
										<input type="text"  id="modal_disetor" onchange="jumlah5()" oninput="setFormat('modal_disetor')" name="modal_disetor" value="<?php echo $neraca[0]['ModalDisetor'] ?>" class="form-control">

										</div>
								</div>
								<div class="form-group row">
									<div class="col-lg-6">
									</div>
									<div class="col-lg-6">
										<label class="control-label">2. Selisih Revaluasi Aktiva Tetap <span class="text-danger">*</span></label>
										<input type="text"  id="selisih_revaluasi" onchange="jumlah5()" oninput="setFormat('selisih_revaluasi')" name="selisih_revaluasi" value="<?php echo $neraca[0]['SelisihRevaluasi'] ?>" class="form-control">

										</div>
								</div>
								<div class="form-group row">
									<div class="col-lg-6">
									</div>
									<div class="col-lg-6">
										<label class="control-label">3. Laba Ditahan <span class="text-danger">*</span></label>
										<input type="text"  id="laba" onchange="jumlah5()" oninput="setFormat('laba')" value="<?php echo $neraca[0]['LabaDitahan'] ?>" name="laba" class="form-control">

										</div>
								</div>
								<div class="form-group row">
									<div class="col-lg-6">
									</div>
									<div class="col-lg-6">
										<label class="control-label">4. Total Modal Lainnya <span class="text-danger">*</span></label>
										<input type="text"  id="modal_lainnya" onchange="jumlah5()" oninput="setFormat('modal_lainnya')" name="modal_lainnya" value="<?php echo $neraca[0]['modallain'] ?>" class="form-control">

										</div>
								</div>
								<div class="form-group row">
									<div class="col-lg-6">

									</div>
									<div class="col-lg-6">
										<label class="control-label">Jumlah Modal <span class="text-danger">*</span></label>
										<input type="text" readonly="TRUE" value="0" id="jumlah_modal" name="jumlah_modal" value="0" class="form-control">

										</div>
								</div>
							</div>
						</div>
						<div class="card card-custom">
							<div class="card-header">
								<div class="col-lg-6">
									<div class="card-title">
										<h3 class="card-label">Total Aktiva I + II + III
										<small></small></h3>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="card-title">
										<h3 class="card-label">Total Kewajiban & Modal I + II + III
										<small></small></h3>
									</div>
								</div>
							</div>
							<div class="card-body">
								<div class="form-group row">
									<div class="col-lg-6">
										<label class="control-label">Total I + II + III <span class="text-danger">*</span></label>
										<input type="text" readonly="TRUE"  id="total_aktiva_semua" name="total_aktiva_semua" value="0" class="form-control">

									</div>
									<div class="col-lg-6">
										<label class="control-label">Total I + II + III <span class="text-danger">*</span></label>
										<input type="text" readonly="TRUE" id="total_kewajiban_semua" name="total_kewajiban_semua" value="0" class="form-control">

										</div>
								</div>
							</div>
						</div>










					<div class="form-group row">
						<div class="col-lg-6">
							<label class="control-label">Upload Persyaratan Neraca <span class="text-danger">*</span></label>
							<input class="file-akuntan" name="file_akuntan" type="file" data-preview-file-type="text">
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
							<label class="control-label">Upload Persyaratan Neraca <span class="text-danger">*</span></label>
							<input class="file-neraca" name="file_neraca" type="file" data-preview-file-type="text">
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
					<?php if(empty($akte_pendirian)) :?>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button type="reset" class="btn btn-secondary">Cancel</button>
          </div>
					<?php endif ;?>
        	<?php echo form_close() ;?>
      </div>
    </div>
  </div>
	<div class="modal fade" id="modal_history" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeXl" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modal Title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i aria-hidden="true" class="ki ki-close"></i>
					</button>
				</div>
				<div class="modal-body">
					<?php $counter_neraca=0 ;?>
					<div class="accordion accordion-toggle-arrow" id="accordionExample1">
						<?php if(!empty($neraca)) :?>
							<?php foreach ($neraca as $row_neraca) :?>
								<?php $counter_neraca+=1 ;?>
				    <div class="card">
				        <div class="card-header">
				            <div class="card-title collapsed" data-toggle="collapse" data-target="#data-pengalaman-<?php echo $counter_neraca ;?>">
				                <?php echo $row_neraca['Tahun'] ;?>
				            </div>
				        </div>
				        <div id="data-pengalaman-<?php echo $counter_neraca ;?>" class="collapse show" data-parent="#accordionExample1">
				            <div class="card-body">
											<a href="<?php echo base_url('keuangan/edit_neraca/'.encrypt_url($row_neraca['Tahun'])) ;?>" target="_blank" type="button"  class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="flaticon-edit-1" ></i></b> Edit</a>
											<a href="<?php echo base_url('keuangan/delete_neraca/'.encrypt_url($row_neraca['Tahun'])) ;?>" target="_blank" type="button"    class="open-delete btn btn-danger btn-labeled btn-rounded" ><b><i class="flaticon-delete-1" ></i></b> Delete</a>

											<div class="table-responsive">
											 <table class="table table-lg">
												 <thead>
													 <tr>
														 <th>Data</th>
														 <th>Description</th>
													 </tr>
												 </thead>
												 <tbody>
	 												<tr>
	 													<td>1. Kas Bank</td>
	 													<td><span class="text-primary"><?php echo $row_neraca['KasBank'] ;?></span></td>
	 												</tr>
	 												<tr>
	 													<td>2. Piutang Usaha</td>
	 													<td><span class="text-primary"><?php echo $row_neraca['Tahun'] ;?></span></td>
	 												</tr>
	 												<tr>
	 													<td>3. Persediaan</td>
	 													<td><span class="text-primary"><?php echo $row_neraca['Persediaan'] ;?></span></td>
	 												</tr>
	 												<tr>
	 													<td>4. Piutang Pajak</td>
	 													<td><span class="text-primary"><?php echo $row_neraca['PiutangPajak'] ;?></span></td>
	 												</tr>
	 												<tr>
	 													<td>5. Biaya Bayar Dimuka</td>
	 													<td><span class="text-primary"><?php echo $row_neraca['BiayaDimuka'] ;?></span></td>
	 												</tr>
	 												<tr>
	 													<td>6. Pekerjaan Dalam Proses</td>
	 													<td><span class="text-primary"></span></td>
	 												</tr>
	 												<tr>
	 													<td>7. Total Aktiva Lancar Lainnya</td>
	 													<td><span class="text-primary"><?php echo $row_neraca['AktivaLancarLainnya'] ;?></span></td>
	 												</tr>
	 												<tr>
	 													<td>1. Utang Usaha</td>
	 													<td><span class="text-primary"><?php echo $row_neraca['UtangUsaha'] ;?></span></td>
	 												</tr>
	 												<tr>
	 													<td>2. Utang Bank</td>
	 													<td><span class="text-primary"><?php echo $row_neraca['UtangBank'] ;?></span></td>
	 												</tr>
	 												<tr>
	 													<td>3. Uang Muka</td>
	 													<td><span class="text-primary"><?php echo $row_neraca['UangMuka'] ;?></span></td>
	 												</tr>
	 												<tr>
	 													<td>4. Utang Pajak</td>
	 													<td><span class="text-primary"><?php echo $row_neraca['UtangPajak'] ;?></span></td>
	 												</tr>
	 												<tr>
	 													<td>5. Biaya Masih Harus Dibayar</td>
	 													<td><span class="text-primary"><?php echo $row_neraca['BiayaMasihDibayar'] ;?></span></td>
	 												</tr>
	 												<tr>
	 													<td>6. Utang Jangka Panjang Jatuh Tempo</td>
	 													<td><span class="text-primary"><?php echo $row_neraca['UtangJPJT'] ;?></span></td>
	 												</tr>
	 												<tr>
	 													<td>7. Total Utang Lancar Lainnya</td>
	 													<td><span class="text-primary"><?php echo $row_neraca['UtangLain'] ;?></span></td>
	 												</tr>
	 												<tr>
	 													<td>Peralatan Proyek</td>
	 													<td><span class="text-primary"><?php echo $row_neraca['Peralatan'] ;?></span></td>
	 												</tr>
	 												<tr>
	 													<td>Inventaris Kantor</td>
	 													<td><span class="text-primary"><?php echo $row_neraca['Inventaris'] ;?></span></td>
	 												</tr>
	 												<tr>
	 													<td>Peralatan Lainnya</td>
	 													<td><span class="text-primary"><?php echo $row_neraca['PeralatanLain'] ;?></span></td>
	 												</tr>
	 												<tr>
	 													<td>Total Aktiva Tetap Lainnya</td>
	 													<td><span class="text-primary"><?php echo $row_neraca['AktivaTetapLainnya'] ;?></span></td>
	 												</tr>
	 												<tr>
	 													<td>Akumulasi Penyusutan</td>
	 													<td><span class="text-primary"><?php echo $row_neraca['AkumulasiPenyusutan'] ;?></span></td>
	 												</tr>

	 												<tr>
	 													<td>Total Utang JP Lainnya</td>
	 													<td><span class="text-primary"><?php echo $row_neraca['UtangLainJP'] ;?></span></td>
	 												</tr>
	 												<tr>
	 													<td>Aktiva Lainnya</td>
	 													<td><span class="text-primary"><?php echo $row_neraca['AktivaLain'] ;?></span></td>
	 												</tr>
	 												<tr>
	 													<td>Modal Disetor</td>
	 													<td><span class="text-primary"><?php echo $row_neraca['ModalDisetor'] ;?></span></td>
	 												</tr>
	 												<tr>
	 													<td>Selisih Revaluasi Aktiva Tetap</td>
	 													<td><span class="text-primary"><?php echo $row_neraca['SelisihRevaluasi'] ;?></span></td>
	 												</tr>
	 												<tr>
	 													<td>Laba Ditahan</td>
	 													<td><span class="text-primary"><?php echo $row_neraca['LabaDitahan'] ;?></span></td>
	 												</tr>



	 											</tbody>
											 </table>
										 </div>
				            </div>
				        </div>
				    </div>
					<?php endforeach;endif;?>


	</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

</div>
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

	$(".file-akuntan").fileinput({
		maxFileSize: 20000,
		allowedFileExtensions: ['jpg', 'png', 'gif'],
		showUpload: false,
		dropZoneEnabled: false
	});
	$(".file-neraca").fileinput({
		maxFileSize: 20000,
		allowedFileExtensions: ['jpg', 'png', 'gif'],
		showUpload: false,
		dropZoneEnabled: false
	});
	var submitCounter = 0;
	$(function () {
		var inputFile = $('input[name=file_neraca]');
		var uploadURI = $('#form-upload-1').attr('action');
		var progressBar = $('#progress-bar-1');
		var progressBar2 = $('#progress-bar-2');

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
