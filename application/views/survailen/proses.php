<link href="<?= base_url('assets/fileinput/css/fileinput.css'); ?>" media="all" rel="stylesheet" type="text/css" />
<link href="<?= base_url('assets/fileinput/themes/explorer-fas/theme.css'); ?>" media="all" rel="stylesheet" type="text/css" />

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
echo script_tag('assets/js/mask.js');
echo script_tag('assets/bootstrap-datepicker.min.js');
echo script_tag('assets/lsbu.js');

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
							<a href="" class="text-dark">Pelaksana</a>
						</li>
						<li class="breadcrumb-item text-muted">
							<a href="" class="text-dark">Tinjauan Permohonan</a>
						</li>

					</ul>
					<!--end::Breadcrumb-->
				</div>
				<!--end::Page Heading-->
			</div>

		</div>
	</div>

	<div class="d-flex flex-column-fluid">
		<div class="container">
			<div class="card card-custom gutter-b">
				<div class="card-header">
					<div class="card-title">
						<h3 class="card-label">Tinjauan Permohonan</h3>


					</div>
					<div class="card-toolbar">



						<!--
						<a href="<?= base_url('sertifikasi/verifikasi_permohonan/' . $nib_dec . '/' . $tgl_dec); ?>" target="_blank" class="btn btn-dark font-weight-bolder">
						<i class="la la-plus"></i>Verifikasi</a>
					-->
					</div>

				</div>

				<div class="card-body">
					<div class="d-flex align-items-center flex-wrap mt-8">
						<!--begin::Item-->
						<div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
							<span class="mr-4">
								<i class="flaticon-bell display-4 text-muted font-weight-bold"></i>
							</span>
							<div class="d-flex flex-column text-dark-75">
								<span class="font-weight-bolder font-size-sm">ID IZIN</span>
								<span class="font-weight-bolder font-size-h5">
									<span class="text-dark-50 font-weight-bold"></span><?= $klasifikasi[0]['id_izin'] ?></span>
							</div>
						</div>
						<!--end::Item-->
						<!--begin::Item-->
						<div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
							<span class="mr-4">
								<i class="flaticon-confetti display-4 text-muted font-weight-bold"></i>
							</span>
							<div class="d-flex flex-column text-dark-75">
								<span class="font-weight-bolder font-size-sm">Kode KBLI</span>
								<span class="font-weight-bolder font-size-h5">
									<span class="text-dark-50 font-weight-bold"></span><?= $klasifikasi[0]['nomor_kbli'] ?></span>
							</div>
						</div>
						<!--end::Item-->
						<!--begin::Item-->
						<div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
							<span class="mr-4">
								<i class="flaticon-pie-chart display-4 text-muted font-weight-bold"></i>
							</span>
							<div class="d-flex flex-column text-dark-75">
								<span class="font-weight-bolder font-size-sm">Sub Klasifikasi</span>
								<span class="font-weight-bolder font-size-h5">
									<span class="text-dark-50 font-weight-bold"></span><?= $klasifikasi[0]['id_sub_klasifikasi'] ?></span>
							</div>
						</div>
						<!--end::Item-->


					</div>

					<br>
					<div class="example mb-10">
						<input type="hidden" id="base_url" value="<?php echo base_url('sertifikasi/permintaan_revisi'); ?>">

						<div class="example-preview">
							<ul class="nav nav-pills" id="myTab1" role="tablist">

								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle active" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
										<?php if (empty($administrasi_survailen)) : ?>
											<span class="nav-icon">
												<i class="flaticon2-rocket-1"></i>
											</span>
										<?php else : ?>
											<span class="nav-icon">
												<i class="flaticon2-checkmark text-success"></i>
											</span>
										<?php endif; ?>
										<span class="nav-text">Administrasi</span>
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item " data-toggle="tab" href="#administrasi">Administrasi</a>



									</div>
								</li>
								<!-- <li class="nav-item">
									<a class="nav-link" id="contact-tab-1" data-toggle="tab" href="#pengalaman"
										aria-controls="contact">
										<span class="nav-icon">
											<i class="flaticon2-rocket-1"></i>
										</span>
										<span class="nav-text">Penjualan Tahunan</span>
									</a>
								</li> -->
								<li class="nav-item">
									<a class="nav-link" id="contact-tab-1" data-toggle="tab" href="#akte" aria-controls="contact">
										<?php if (empty($akte_survailen)) : ?>
											<span class="nav-icon">
												<i class="flaticon2-rocket-1"></i>
											</span>
										<?php else : ?>
											<span class="nav-icon">
												<i class="flaticon2-checkmark text-success"></i>
											</span>
										<?php endif; ?>
										<span class="nav-text">Akte</span>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="contact-tab-1" data-toggle="tab" href="#penjualan_tahunan" aria-controls="contact">
										<?php if (empty($penjualan_tahunan_survailen)) : ?>
											<span class="nav-icon">
												<i class="flaticon2-rocket-1"></i>
											</span>
										<?php else : ?>
											<span class="nav-icon">
												<i class="flaticon2-checkmark text-success"></i>
											</span>
										<?php endif; ?>
										<span class="nav-text">Penjualan Tahunan</span>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="contact-tab-1" data-toggle="tab" href="#neraca" aria-controls="contact">
										<?php if (empty($neraca_survailen)) : ?>
											<span class="nav-icon">
												<i class="flaticon2-rocket-1"></i>
											</span>
										<?php else : ?>
											<span class="nav-icon">
												<i class="flaticon2-checkmark text-success"></i>
											</span>
										<?php endif; ?>
										<span class="nav-text">Neraca</span>
									</a>
								</li>

								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
										<?php if (empty($pjtbu_survailen) or empty($pjskbu_survailen)) : ?>
											<span class="nav-icon">
												<i class="flaticon2-rocket-1"></i>
											</span>
										<?php else : ?>
											<span class="nav-icon">
												<i class="flaticon2-checkmark text-success"></i>
											</span>
										<?php endif; ?>
										<span class="nav-text">Tenaga Kerja</span>
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" data-toggle="tab" href="#pjbu">PJBU</a>
										<a class="dropdown-item" data-toggle="tab" href="#pjtbu">PJTBU</a>
										<a class="dropdown-item" data-toggle="tab" href="#pjskbu">PJSKBU</a>


									</div>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="contact-tab-1" data-toggle="tab" href="#peralatan" aria-controls="contact">
										<?php if (empty($peralatan_survailen)) : ?>
											<span class="nav-icon">
												<i class="flaticon2-rocket-1"></i>
											</span>
										<?php else : ?>
											<span class="nav-icon">
												<i class="flaticon2-checkmark text-success"></i>
											</span>
										<?php endif; ?>
										<span class="nav-text">Peralatan</span>
									</a>
								</li>

								<li class="nav-item">
									<a class="nav-link" id="contact-tab-1" data-toggle="tab" href="#smap" aria-controls="contact">
										<?php if (empty($smap_survailen)) : ?>
											<span class="nav-icon">
												<i class="flaticon2-rocket-1"></i>
											</span>
										<?php else : ?>
											<span class="nav-icon">
												<i class="flaticon2-checkmark text-success"></i>
											</span>
										<?php endif; ?>
										<span class="nav-text">SMAP</span>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="contact-tab-1" data-toggle="tab" href="#submit_final" aria-controls="contact">

										<span class="nav-icon">
											<i class="flaticon2-send-1"></i>
										</span>

										<span class="nav-text">Ajukan Permohonan Survailen</span>
									</a>
								</li>

							</ul>



							<div class="tab-content mt-5" id="myTabContent1">
								<div class="tab-pane fade show active" id="administrasi" role="tabpanel" aria-labelledby="home-tab-1">
									<?php if (!empty($biodata)) : ?>
										<div class="col-md-12">
											<div class="panel panel-flat panel-collapsed">
												<div class="panel-heading">
													<h5 class="panel-title">Infomasi Data Badan Usaha</h5>
													<div class="heading-elements">

													</div>
												</div>
												<?php echo form_open_multipart(base_url('survailen/insert_administrasi'), 'class="form-horizontal form-validate-jquery"  id="form-upload-1"'); ?>
												<div class="panel-body">
													<div class="row">
														<div class="col-md-4">
															<div class="content-group-lg">
																<h6 class="text-semibold">#Upload File SS</h6>
																<p class="content-group">Upload File Sertifikat Standar *
																</p>
															</div>
														</div>
														<div class="col-md-4">
															<div class="content-group-lg">
																<h6 class="text-semibold">#Gedung Kantor</h6>
																<p class="content-group">Apakah Gedung Kantor Milik Sendiri
																	/ Sewa?</p>
															</div>
														</div>
														<div class="col-md-4">
															<div class="content-group-lg">
																<h6 class="text-semibold">#Upload Gedung</h6>
																<p class="content-group">Upload Gedung Tampak Depan *</p>
															</div>
														</div>



													</div>
													<div class="row">
														<div class="col-lg-4">
															<input class="file-ss" id="file_ss" name="file_ss" type="file" required="required" data-preview-file-type="text">
															<span class="help-block">
																Accepted formats: pdf, zip. Max file size 20Mb
															</span>
															<div class="progress" style="display:none;">
																<div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
																	20%
																</div>
															</div>
														</div>
														<div class="col-lg-4">
															<select class="form-control" name="gedung" id="exampleSelect1">
																<option value='1'>Milik Sendiri</option>
																<option value='2'>Sewa</option>

															</select>
														</div>
														<div class="col-lg-4">
															<input class="file-kantor" id="file_kantor" name="file_kantor" type="file" required="required" data-preview-file-type="text">
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
													<?php if (!empty($administrasi_survailen)) : ?>
														<br>
														<br>
														<div class="row">
															<div class="col-md-4">
																<a href="<?= base_url('get_file/survailen_ss/' . $administrasi_survailen[0]['file_ss']); ?>" target="_blank" class="btn btn-success font-weight-bold mr-2">
																	<i class="flaticon-upload"></i> Softcopy File Sertifikat
																	Standar Survailen
																</a>
															</div>

															<div class="col-md-4">

															</div>
															<div class="col-md-4">
																<a href="<?= base_url('get_file/survailen_gedung/' . $administrasi_survailen[0]['file_gedung']); ?>" target="_blank" class="btn btn-success font-weight-bold mr-2">
																	<i class="flaticon-upload"></i> Softcopy File Gedung Tampak
																	Depan Survailen
																</a>
															</div>



														</div>
													<?php endif; ?>
													<hr>
													<br>
													<div class="row">
														<div class="col-md-4">
															<div class="content-group-lg">
																<h6 class="text-semibold">#Upload File KTA</h6>
																<p class="content-group">Upload File KTA Asosiasi *
																</p>
															</div>
														</div>
														<div class="col-md-4">
															<div class="content-group-lg">
																<h6 class="text-semibold">#Asosiasi</h6>
																<p class="content-group">Nama Asosiasi</p>
															</div>
														</div>
														



													</div>
													<div class="row">
														<div class="col-lg-4">
															<input class="file-asosiasi" id="file_asosiasi" name="file_asosiasi" type="file" required="required" data-preview-file-type="text">
															<span class="help-block">
																Accepted formats: pdf, zip. Max file size 20Mb
															</span>
															<div class="progress" style="display:none;">
																<div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
																	20%
																</div>
															</div>
														</div>
														<div class="col-lg-4">
														<input type="input" name="nama_asosiasi" <?php if (!empty($administrasi_survailen)) : ?>value="<?=$administrasi_survailen[0]['asosiasi'];?>"<?php endif ;?> class="form-control">
														</div>
														
													</div>
													<?php if (!empty($administrasi_survailen)) : ?>
														<br>
														<br>
														<div class="row">
															<div class="col-md-4">
																<a href="<?= base_url('get_file/survailen_asosiasi/' . $administrasi_survailen[0]['file_asosiasi']); ?>" target="_blank" class="btn btn-success font-weight-bold mr-2">
																	<i class="flaticon-upload"></i> Softcopy File Sertifikat
																	Standar Survailen
																</a>
															</div>

															<div class="col-md-4">

															</div>
															



														</div>
													<?php endif; ?>






												</div>



											</div>
										</div>
										<hr>



										<div class="col-md-12">
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
															<td>Nama Badan Usaha</td>
															<td>
																<input name="id_izin" type="hidden" value="<?= $klasifikasi[0]['id_izin'] ?>">
																<input name="nibx" type="hidden" value="<?= $biodata[0]['NIB']; ?>">
																<input name="sub_klasifikasi" type="hidden" value="<?= $klasifikasi[0]['id_sub_klasifikasi'] ?>">
																<span class="text-dark"><?= $biodata[0]['nama']; ?></span>

																

															</td>

														</tr>
														<tr>
															<td>NIB</td>
															<td>
												
																<span class="text-dark"><?= $biodata[0]['NIB']; ?></span>
															</td>

														</tr>
														<tr>
															<td>NPWP</td>
															<td>
															<span class="text-dark"><?= $biodata[0]['npwp']; ?></span>
										
															</td>

														</tr>
														<tr>
															<td>Alamat Domisili Hukum</td>
															<td>
															<span class="text-dark"><?= $biodata[0]['alamat_bu']; ?></span>
												
															</td>
														</tr>
														<tr>
															<td>Telepon</td>
															<td>
															<span class="text-dark"><?= $biodata[0]['telepon']; ?></span>
														
															</td>
														</tr>

														<tr>
															<td>Email</td>
															<td>
															<span class="text-dark"><?= $biodata[0]['email']; ?></span>
													
															</td>
														</tr>
														<input type="hidden" name="email" value="<?= $klasifikasi[0]['user_email']; ?>">


														<tr>
															<td>Website</td>
															<td>
															<span class="text-dark"><?= $biodata[0]['web']; ?></span>
												
															</td>
														</tr>



													</tbody>
												</table>
											</div>
											
												<?php if(empty($permohonan)) :?>
													<button type="submit" style="float: right" class="open-delete btn btn-dark btn-labeled btn-rounded"><b></i></b>Save
												Administrasi</button>
																			<?php else :?>
																				<a type="button" disabled class="btn btn-info font-weight-bolder my-1"> Permoohnan Sudah Tersubmit </a>		
																	<?php endif ;?>


											<?php echo form_close(); ?>
											<br>
											<br>
										</div>

									<?php endif; ?>
								</div>
								<input  type="hidden" id="id_izinxc" value="<?= $klasifikasi[0]['id_izin'] ?>">
												<input type="hidden" id="nibxc" value="<?= $biodata[0]['NIB']; ?>">
												
								<div class="tab-pane fade show" id="smap" role="tabpanel" aria-labelledby="home-tab-1">

									<div class="col-md-12">
										<div class="panel panel-flat panel-collapsed">
											<div class="panel-heading">
												<h5 class="panel-title">Infomasi Data SMAP</h5><br>


												<div class="heading-elements">

												</div>
											</div>

											<div class="panel-body">
												<!--#1-->
												<div class="row">
													<div class="col-md-12">
														<div class="content-group-lg">
															<h6 class="text-semibold">#Upload File SMAP</h6>
															<p class="content-group">Sesuai dengan komitmen pemenuhan
																penerapan Sistem Manajemen Anti Penyapan (SMAP) paling
																lambat 1 (satu) tahun setelah SBU diterbikan</p>
														</div>
													</div>



												</div>
												<?php echo form_open_multipart('survailen/insert_smap/', 'class="form-horizontal form-validate-jquery" enctype="multipart/form-data" id="form-upload-6'); ?>
												<input name="id_izin" type="hidden" value="<?= $klasifikasi[0]['id_izin'] ?>">
												<input name="nibx" type="hidden" value="<?= $biodata[0]['NIB']; ?>">
												<input name="sub_klasifikasi" type="hidden" value="<?= $klasifikasi[0]['id_sub_klasifikasi'] ?>">

												<div class="form-group row">

													<div class="col-lg-5">
														<input class="file-smap" id="file_smap" name="file_smap" type="file" required="required" data-preview-file-type="text">
														<span class="help-block">
															Accepted formats: pdf, zip. Max file size 20Mb
														</span>
														<div class="progress" style="display:none;">
															<div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
																20%
															</div>
														</div>
													</div>
													<?php if (!empty($smap_survailen)) : ?>
														<br>
														<br>
														<div class="col-lg-3">
															<a href="<?= base_url('get_file/survailen_smap/' . $smap_survailen[0]['file_smap']); ?>" target="_blank" class="btn btn-success font-weight-bold mr-2">
																<i class="flaticon-upload"></i> Softcopy SMAP Survailen
															</a>
														</div>
													<?php endif; ?>

												</div>
												
													<?php if(empty($permohonan)) :?>
														<button type="submit" style="float: right" class="open-delete btn btn-dark btn-labeled btn-rounded"><b></i></b>Save
													SMAP</button>
																			<?php else :?>
																				<a type="button" disabled class="btn btn-info font-weight-bolder my-1"> Permoohnan Sudah Tersubmit </a>		
																	<?php endif ;?>
												<br>
												<br>
												<?php echo form_close(); ?>




											</div>
										</div>
									</div>
									<hr>





								</div>

								<?php $counter_pengurus = 0;
								$counter_pengalaman = 0;
								$counter_akte = 0;
								$counter_sk = 0;
								$counter_pjskbu = 0;
								$counter_pjtbu = 0;
								$counter_peralatan = 0;
								$counter_saham = 0;
								$counter_neraca = 0;
								$counter_tk = 0;
								$counter_klasifikasi = 0;
								$counter_kepemilikan_peralatan = 0; ?>


								<input type="hidden" id="email_bu" name="tgl_dec" value="<?php echo $tgl_dec; ?>">
								<input type="hidden" id="alamat_bu" name="nib_dec" value="<?php echo $nib_dec; ?>">

								<div class="tab-pane fade" id="akte" role="tabpanel" aria-labelledby="home-tab-1">

									<div class="col-md-12">
										<!-- Pemegang Saham toggles -->
										<div class="panel panel-flat panel-collapsed">
											<div class="panel-heading">
												<h5 class="panel-title">Infomasi Akte Badan Usaha</h5>
												<div class="heading-elements">

												</div>
											</div>
											<div class="panel-body">
												<div class="row">
												<div class="col-md-4">
														<div class="content-group-lg">
															<h6 class="text-semibold">#Akte Terbaru</h6>
															<p class="content-group">Apakah Ada AKte Perubahan Terbaru?
															</p>
														</div>
													</div>
												
													

												</div>
												<div class="row">
												<?php if(empty($permohonan)) :?>
													<div class="col-md-4">
														<select class="form-control" onchange="getval(this)" id="exampleSelect1">
															<option value="tidak">Tidak Ada</option>
															<option value="ada">Ada</option>

														</select>
													</div>
													<?php else :?>
														<a type="button" disabled class="btn btn-info font-weight-bolder my-1"> Permoohnan Sudah Tersubmit </a>		
											<?php endif ;?>
													
													<div class="col-md-4">
														<div id="display_akte" style="display:none;">
															<button data-toggle="modal" data-target="#modal_upload_akte" type="button" class="btn btn-warning font-weight-bolder ml-sm-auto my-1">Tambah
																Data Akte Terbaru</button>
														</div>
													</div>

												</div>
												<!--#1-->



											</div>
										</div>
									</div>
									<hr>

									<hr>
									<?php if (!empty($akte_survailen)) : ?>
										<div class="accordion accordion-toggle-arrow" id="accordionExample1">
											<input type="hidden" value="<?php echo $tgl; ?>" class="switchery" name="tgl">

											<?php foreach ($akte_survailen as $row_akte) : ?>
												<?php $counter_akte += 1; ?>
												<div class="card">
													<div class="card-header">
														<div class="card-title collapsed" data-toggle="collapse" data-target="#data-akte-<?php echo $counter_akte; ?>">
															<?php echo $row_akte['no_akte']; ?> (Data Survailen)
														</div>
													</div>
													<div id="data-akte-<?php echo $counter_akte; ?>" class="collapse show" data-parent="#accordionExample1">

														<div class="card-body">
															<!--#1-->
															<div class="row">
																<div class="col-md-2">
																	<div class="content-group-lg">
																		<h6 class="text-semibold">#1</h6>
																		<p class="content-group">File Akte</p>
																	</div>
																</div>


																<div class="col-md-4">
																	<br>
																	<a href="<?= base_url('get_file/survailen_akte/' . $row_akte['file_akte']); ?>" target="_blank" class="btn btn-success font-weight-bold mr-2">
																		<i class="flaticon-upload"></i> Softcopy Akte Survailen
																	</a>
																</div>
																<div class="col-md-4">
																	<a type="button" style="float: right" class="btn btn-primary mr-3"><b></i></b><i class="flaticon2-trash"></i>Delete Data Akte</a>
																</div>



															</div>

															<hr>
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
																			<td>No Akte</td>
																			<td><span class="text-dark"><?= $row_akte['no_akte']; ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>No SK Kumham</td>
																			<td><span class="text-dark"><?= $row_akte['no_pengesahan_kumham']; ?></span>
																			</td>
																		</tr>

																		<tr>
																			<td>Nama Notaris</td>
																			<td><span class="text-dark"><?= $row_akte['nama_notaris']; ?></span>
																			</td>
																		</tr>


																		<tr>
																			<td>Tgl Akte</td>
																			<td><span class="text-dark"><?= $row_akte['tgl_akte']; ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Modal Dasar</td>
																			<td><span class="text-dark"><?= $row_akte['maksudtujuan']; ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Modal Disetor</td>
																			<td><span class="text-dark"><?= $row_akte['maksudtujuan']; ?></span>
																			</td>
																		</tr>





																	</tbody>
																</table>
															</div>


														</div>
													</div>
												</div>
												<hr>
											<?php endforeach; ?>


										</div>
									<?php endif; ?>
									<hr>
									<?php if (!empty($akte)) : ?>
										<div class="accordion accordion-toggle-arrow" id="accordionExample1">
											<input type="hidden" value="<?php echo $tgl; ?>" class="switchery" name="tgl">

											<?php foreach ($akte as $row_akte) : ?>
												<?php $counter_akte += 1; ?>
												<div class="card">
													<div class="card-header">
														<div class="card-title collapsed" data-toggle="collapse" data-target="#data-akte-<?php echo $counter_akte; ?>">
															<?php echo $row_akte['no']; ?> (Data Permohonan SBU)
														</div>
													</div>
													<div id="data-akte-<?php echo $counter_akte; ?>" class="collapse show" data-parent="#accordionExample1">

														<div class="card-body">
															<!--#1-->
															<div class="row">
																<div class="col-md-2">
																	<div class="content-group-lg">
																		<h6 class="text-semibold">#1</h6>
																		<p class="content-group">File SK Kumham</p>
																	</div>
																</div>


																<div class="col-md-4">
																	<br>
																	<a <?php if ($row_akte['file_doc'] != '') : ?>href="<?= $row_akte['file_doc']; ?>" <?php else : ?>href="<?= base_url('not_found'); ?>" <?php endif; ?> target="_blank" type="button" name="btn_cek_36" style="float: left" class=" btn btn-dark btn-labeled btn-rounded"><b><i class="icon-file-check"></i></b> Softcopy</a>
																</div>
																<!--
																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#2</h6>
																			<p class="content-group">File KTP</p>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<br>
																		<a href="<?= $row_akte['file_ktp']; ?>" target="_blank" type="button" name="btn_cek_36"  style="float: left" class=" btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																	</div>
																-->

																<!--#2-->


															</div>
															<!--
																<div class="row">
																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#3</h6>
																			<p class="content-group">File NPWP</p>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<br>
																		<a href="<?= $row_akte['file_npwp']; ?>" target="_blank" type="button" name="btn_cek_36"  style="float: left" class=" btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																	</div>






																</div>
															-->
															<hr>
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
																			<td>No Akte</td>
																			<td><span class="text-dark"><?= $row_akte['no']; ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>No SK Kumham</td>
																			<td><span class="text-dark"><?= $row_akte['no_sk_kumham']; ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Jenis Akte</td>
																			<td><span class="text-dark">
																					<?php if ($row_akte['jenis'] == '01') {
																						echo "Pendirian";
																					} elseif ($row_akte['jenis'] == '02') {
																						echo "Perubahan";
																					} elseif ($row_akte['jenis'] == '06') {
																						echo "Kontrak";
																					} elseif ($row_akte['jenis'] == '07') {
																						echo "Pendirian";
																					} elseif ($row_akte['jenis'] == '09') {
																						echo "SK Penetapan";
																					} elseif ($row_akte['jenis'] == '10') {
																						echo "Akta Liquiditas";
																					} elseif ($row_akte['jenis'] == '11') {
																						echo "Akta Merger";
																					} elseif ($row_akte['jenis'] == '12') {
																						echo "Akta Pembubaran";
																					}; ?></span></td>
																		</tr>
																		<tr>
																			<td>Nama Notaris</td>
																			<td><span class="text-dark"><?= $row_akte['nama_notaris']; ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Alamat Notaris</td>
																			<td><span class="text-dark"><?= $row_akte['alamat_notaris']; ?></span>
																			</td>
																		</tr>

																		<tr>
																			<td>Tgl Akte</td>
																			<td><span class="text-dark"><?= $row_akte['tgl_akte']; ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Maksud dan Tujuan</td>
																			<td><span class="text-dark"><?= $row_akte['maksudtujuan']; ?></span>
																			</td>
																		</tr>





																	</tbody>
																</table>
															</div>


														</div>
													</div>
												</div>
												<hr>
											<?php endforeach; ?>


										</div>
									<?php endif; ?>
								</div>

								<div class="modal fade" id="modal_upload_akte" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeXl" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">

											<div class="modal-body">
												<div class="card card-custom gutter-b">
													<div class="card-header">
														<div class="card-title">
															<span class="card-icon">
																<i class="flaticon-file-1 text-primary"></i>
															</span>
															<h3 class="card-label"><span class="text-primary">Tambah
																	Data Akte Terbaru</span></h3>
														</div>
													</div>
													<?php echo form_open_multipart('survailen/insert_akte/', 'class="form-horizontal form-validate-jquery" enctype="multipart/form-data" id="form-upload-2'); ?>
													<div class="card-body">
														<input name="id_izin" type="hidden" value="<?= $klasifikasi[0]['id_izin'] ?>">
														<input name="nibx" type="hidden" value="<?= $biodata[0]['NIB']; ?>">
														<input name="sub_klasifikasi" type="hidden" value="<?= $klasifikasi[0]['id_sub_klasifikasi'] ?>">

														<div class="form-group row">

															<div class="col-lg-12">
																<label>No Akte
																	<span class="text-danger">*</span></label>
																<input type="input" name="no_akte" class="form-control" placeholder="Nomor Akte">
																<label>Tanggal Akte
																	<span class="text-danger">*</span></label>
																<input type="input" name="tgl_akte" class="form-control">
																<label>Nama Notaris
																	<span class="text-danger">*</span></label>
																<input type="input" name="nama_notaris" class="form-control">
																<label>No Pengesahan SK Kumham
																	<span class="text-danger">*</span></label>
																<input type="input" name="no_pengesahan" class="form-control">
																<label>Modal Dasar Sesuai Akte
																	<span class="text-danger"></span></label>
																<input type="input" name="modal_dasar" class="form-control">
																<label>Modal Disetor Sesuai Akte
																	<span class="text-danger"></span></label>
																<input type="input" name="modal_disetor" class="form-control">


																<label class="control-label">Upload Akte<span class="text-danger">*</span></label>
																<input class="file-akte" id="file_akte" name="file_akte" type="file" data-preview-file-type="text">
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
												<button type="submit" id="submit2" class="btn btn-primary mr-2">Upload</button>

												<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
											</div>
											<?php echo form_close(); ?>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="penjualan_tahunan" role="tabpanel" aria-labelledby="home-tab-1">
									<div class="col-md-12">
										<!-- Pemegang Saham toggles -->
										<div class="panel panel-flat panel-collapsed">
											<div class="panel-heading">
												<h5 class="panel-title">Penjualan Tahunan</h5>
												<div class="heading-elements">

												</div>
											</div>
											<div class="panel-body">

												<div class="row">

													<div class="col-md-4">

														
															<?php if(empty($permohonan)) :?>
																<button data-toggle="modal" data-target="#modal_upload_penjualan_tahunan" type="button" class="btn btn-warning font-weight-bolder ml-sm-auto my-1">Tambah
															Data Penjualan Tahunan</button>
																			<?php else :?>
																				<a type="button" disabled class="btn btn-info font-weight-bolder my-1"> Permoohnan Sudah Tersubmit </a>		
																	<?php endif ;?>

													</div>

												</div>
												<div class="modal fade" id="modal_upload_penjualan_tahunan" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeXl" aria-hidden="true">
													<div class="modal-dialog modal-dialog-centered" role="document">
														<div class="modal-content">

															<div class="modal-body">
																<div class="card card-custom gutter-b">
																	<div class="card-header">
																		<div class="card-title">
																			<span class="card-icon">
																				<i class="flaticon-file-1 text-primary"></i>
																			</span>
																			<h3 class="card-label"><span class="text-primary">Tambah
																					Data Penjualan Tahunan</span></h3>
																		</div>
																	</div>
																	<?php echo form_open_multipart('survailen/insert_penjualan_tahunan/', 'class="form-horizontal form-validate-jquery" enctype="multipart/form-data" id="form-upload-3'); ?>
																	<div class="card-body">
																		<input name="id_izin" type="hidden" value="<?= $klasifikasi[0]['id_izin'] ?>">
																		<input name="nibx" type="hidden" value="<?= $biodata[0]['NIB']; ?>">
																		<input name="sub_klasifikasi" type="hidden" value="<?= $klasifikasi[0]['id_sub_klasifikasi'] ?>">

																		<div class="form-group row">

																			<div class="col-lg-12">
																				<label>Nama Paket Pekerjaan
																					<span class="text-danger">*</span></label>
																				<input type="input" name="nama_paket" class="form-control">
																				<label>No Kontrak
																					<span class="text-danger">*</span></label>
																				<input type="input" name="no_kontrak" class="form-control">
																				<label>Nilai Kontrak
																					<span class="text-danger">*</span></label>
																				<input type="input" name="nilai_kontrak" class="form-control">
																				<label>Lokasi Pekerjaan
																					<span class="text-danger">*</span></label>
																				<input type="input" name="lokasi_pekerjaan" class="form-control">
																				<label>Nomor Registrasi SIMPAN
																					<span class="text-danger"></span></label>
																				<input type="input" name="noreg_simpan" class="form-control">
																				<label>Tgl Mulai
																					<span class="text-danger"></span></label>
																				<input type="input" name="tgl_mulai" class="form-control">
																				<label>Tgl Selesai
																					<span class="text-danger"></span></label>
																				<input type="input" name="tgl_selesai" class="form-control">
																				<label>Tgl BAST
																					<span class="text-danger"></span></label>
																				<input type="input" name="tgl_bast" class="form-control">



																				<label class="control-label">Upload Foto Kontrak Asli<span class="text-danger">*</span></label>
																				<input class="file-neraca" id="file_kontrak" name="file_kontrak" type="file" required="required" data-preview-file-type="text">
																				<span class="help-block">
																					Accepted formats: pdf, zip. Max file size
																					20Mb
																				</span>
																				<div class="progress" style="display:none;">
																					<div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
																						20%
																					</div>
																				</div>
																				<label class="control-label">Upload Foto BAST<span class="text-danger">*</span></label>
																				<input class="file-neraca" id="file_bast" name="file_bast" type="file" required="required" data-preview-file-type="text">
																				<span class="help-block">
																					Accepted formats: pdf, zip. Max file size
																					20Mb
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
																<button type="submit" id="submit2" class="btn btn-primary mr-2">Upload</button>

																<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
															</div>
															<?php echo form_close(); ?>
														</div>
													</div>
												</div>
												<?php if (!empty($penjualan_tahunan_survailen)) : ?>
													<div class="accordion accordion-toggle-arrow" id="accordionExample1">

														<?php foreach ($penjualan_tahunan_survailen as $row_pengalaman) : ?>
															<?php $counter_pengalaman += 1; ?>
															<div class="card">
																<div class="card-header">
																	<div class="card-title collapsed" data-toggle="collapse" data-target="#data-pengalaman-<?php echo $counter_pengalaman; ?>">
																		<?php echo  $row_pengalaman['nama_paket'] . '(Data Survailen)'; ?>
																	</div>
																</div>
																<div id="data-pengalaman-<?php echo $counter_pengalaman; ?>" class="collapse show" data-parent="#accordionExample1">

																	<div class="card-body">


																		<div class="row">



																			<div class="col-md-4">
																				<br>

																				<a href="<?= base_url('get_file/survailen_kontrak/' . $row_pengalaman['foto_kontrak']); ?>" target="_blank" class="btn btn-success font-weight-bold mr-2">
																					<i class="flaticon-upload"></i> Softcopy Foto Kontrak
																				</a>
																			</div>


																			<!--#2-->




																			<div class="col-md-4">
																				<br>

																				<a href="<?= base_url('get_file/survailen_bast/' . $row_pengalaman['foto_bast']); ?>" target="_blank" class="btn btn-success font-weight-bold mr-2">
																					<i class="flaticon-upload"></i> Softcopy Foto BAST
																				</a>
																			</div>

																			<div class="col-md-4">
																				<br>
																				<a type="button" style="float: right" class="btn btn-primary mr-3"><b></i></b><i class="flaticon2-trash"></i>Delete Data Pengalaman</a>
																			</div>

																		</div>



																		<hr>


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
																						<td>Nama Paket</td>
																						<td><span class="text-dark"><?php echo $row_pengalaman['nama_paket']; ?></span>
																						</td>
																					</tr>
																					<tr>
																						<td>No Kontrak</td>
																						<td><span class="text-dark"><?php echo $row_pengalaman['no_kontrak']; ?></span>
																						</td>
																					</tr>
																					<tr>
																						<td>Nilai Kontrak</td>
																						<td><span class="text-dark"><?php echo $row_pengalaman['nilai_kontrak']; ?></span>
																						</td>
																					</tr>


																					<tr>
																						<td>Lokasi Pekerjaan</td>
																						<td><span class="text-dark"><?php echo $row_pengalaman['lokasi_pekerjaan']; ?></span>
																						</td>
																					</tr>
																					<tr>
																						<td>Nomor Registrasi Pengalaman</td>
																						<td><span class="text-dark"><?php echo $row_pengalaman['noreg_simpan']; ?></span>
																						</td>
																					</tr>
																					<tr>
																						<td>Tgl BAST</td>
																						<td><span class="text-dark"><?php echo $row_pengalaman['tgl_bast']; ?></span>
																						</td>
																					</tr>
																					<tr>
																						<td>Tgl Mulai</td>
																						<td><span class="text-dark"><?php echo $row_pengalaman['tgl_mulai']; ?></span>
																						</td>
																					</tr>
																					<tr>
																						<td>Tgl Selesai</td>
																						<td><span class="text-dark"><?php echo $row_pengalaman['tgl_selesai']; ?></span>
																						</td>
																					</tr>


																				</tbody>
																			</table>
																		</div>
																	</div>
																</div>
															</div>
															<hr>
														<?php endforeach; ?>


													</div>
												<?php endif; ?>

												<?php if (!empty($penjualan_tahunan)) : ?>
													<div class="accordion accordion-toggle-arrow" id="accordionExample1">

														<?php foreach ($penjualan_tahunan as $row_pengalaman) : ?>
															<?php $counter_pengalaman += 1; ?>
															<div class="card">
																<div class="card-header">
																	<div class="card-title collapsed" data-toggle="collapse" data-target="#data-pengalaman-<?php echo $counter_pengalaman; ?>">
																		<?php echo $row_pengalaman['id_sub_klasifikasi'] . '-' . $row_pengalaman['nama_pengalaman'] . '(Data Permohonan)'; ?>
																	</div>
																</div>
																<div id="data-pengalaman-<?php echo $counter_pengalaman; ?>" class="collapse show" data-parent="#accordionExample1">

																	<div class="card-body">


																		<div class="row">
																			<div class="col-md-2">
																				<div class="content-group-lg">
																					<h6 class="text-semibold">#1</h6>
																					<p class="content-group">File BAST</p>
																				</div>
																			</div>


																			<div class="col-md-4">
																				<br>
																				<a <?php if ($row_pengalaman['file_bash'] != '') : ?>href="<?= $row_pengalaman['file_bash']; ?>" <?php else : ?>href="<?= base_url('not_found'); ?>" <?php endif; ?> target="_blank" type="button" name="btn_cek_36" style="float: left" class=" btn btn-dark btn-labeled btn-rounded"><b><i class="icon-file-check"></i></b> Softcopy</a>
																			</div>


																			<!--#2-->

																			<div class="col-md-2">
																				<div class="content-group-lg">
																					<h6 class="text-semibold">#42</h6>
																					<p class="content-group">File BOQ RAB MPU</p>
																				</div>
																			</div>


																			<div class="col-md-4">
																				<br>
																				<a <?php if ($row_pengalaman['file_boq_rab_mpu'] != '') : ?>href="<?= $row_pengalaman['file_boq_rab_mpu']; ?>" <?php else : ?>href="<?= base_url('not_found'); ?>" <?php endif; ?> target="_blank" type="button" name="btn_cek_35" style="float: left" class=" btn btn-dark btn-labeled btn-rounded"><b><i class="icon-file-check"></i></b> Softcopy</a>
																			</div>

																		</div>
																		<div class="row">
																			<div class="col-md-2">
																				<div class="content-group-lg">
																					<h6 class="text-semibold">#3</h6>
																					<p class="content-group">File Kontrak Dengan Pemberi
																						Tugas</p>
																				</div>
																			</div>


																			<div class="col-md-4">
																				<br>
																				<a <?php if ($row_pengalaman['file_kontrak_dengan_pemberi_tugas'] != '') : ?>href="<?= $row_pengalaman['file_kontrak_dengan_pemberi_tugas']; ?>" <?php else : ?>href="<?= base_url('not_found'); ?>" <?php endif; ?> target="_blank" type="button" name="btn_cek_36" style="float: left" class=" btn btn-dark btn-labeled btn-rounded"><b><i class="icon-file-check"></i></b> Softcopy</a>
																			</div>




																		</div>


																		<hr>


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
																						<td>Nama Paket</td>
																						<td><span class="text-dark"><?php echo $row_pengalaman['nama_pengalaman']; ?></span>
																						</td>
																					</tr>
																					<tr>
																						<td>No Kontrak</td>
																						<td><span class="text-dark"><?php echo $row_pengalaman['nomor_kontrak']; ?></span>
																						</td>
																					</tr>
																					<tr>
																						<td>Nilai Kontrak</td>
																						<td><span class="text-dark"><?php echo $row_pengalaman['nilai_kontrak']; ?></span>
																						</td>
																					</tr>
																					<tr>
																						<td>Email Instansi</td>
																						<td><span class="text-dark"><?php echo $row_pengalaman['email_instansi']; ?></span>
																						</td>
																					</tr>
																					<tr>
																						<td>Jabatan Pemberi Tugas</td>
																						<td><span class="text-dark"><?php echo $row_pengalaman['jabatan_pemberi_tugas']; ?></span>
																						</td>
																					</tr>
																					<tr>
																						<td>Lokasi Pekerjaan</td>
																						<td><span class="text-dark"><?php echo $row_pengalaman['lokasi_pekerjaan']; ?></span>
																						</td>
																					</tr>
																					<tr>
																						<td>Nama Instansi Pemberi Tugas</td>
																						<td><span class="text-dark"><?php echo $row_pengalaman['nama_instansi_pemberi_tugas']; ?></span>
																						</td>
																					</tr>
																					<tr>
																						<td>Nama Pemberi Tugas</td>
																						<td><span class="text-dark"><?php echo $row_pengalaman['nama_pemberi_tugas']; ?></span>
																						</td>
																					</tr>
																					<tr>
																						<td>Nilai Kontrak Adendum</td>
																						<td><span class="text-dark"><?php echo $row_pengalaman['nilai_kontrak_adendum']; ?></span>
																						</td>
																					</tr>
																					<tr>
																						<td>Nilai Kontrak Sesuai Porsi</td>
																						<td><span class="text-dark"><?php echo $row_pengalaman['nilai_kontrak_sesuai_porsi']; ?></span>
																						</td>
																					</tr>
																					<tr>
																						<td>No Telfon Pemberi Tugas</td>
																						<td><span class="text-dark"><?php echo $row_pengalaman['no_telp_instansi_pemberi_tugas']; ?></span>
																						</td>
																					</tr>
																					<tr>
																						<td>Nomor Registrasi Pengalaman</td>
																						<td><span class="text-dark"><?php echo $row_pengalaman['nomor_registrasi_pengalaman']; ?></span>
																						</td>
																					</tr>
																					<tr>
																						<td>Pemberi Tugas</td>
																						<td><span class="text-dark"><?php echo $row_pengalaman['pemberi_tugas']; ?></span>
																						</td>
																					</tr>
																					<tr>
																						<td>Presentase Porsi</td>
																						<td><span class="text-dark"><?php echo $row_pengalaman['presentase_porsi']; ?></span>
																						</td>
																					</tr>
																					<tr>
																						<td>Status KSO</td>
																						<td><span class="text-dark"><?php echo $row_pengalaman['status_kso']; ?></span>
																						</td>
																					</tr>
																					<tr>
																						<td>Sumber Dana</td>
																						<td><span class="text-dark"><?php echo $row_pengalaman['sumber_dana']; ?></span>
																						</td>
																					</tr>
																					<tr>
																						<td>Sub Klasifikasi</td>
																						<td><span class="text-dark"><?php echo $row_pengalaman['id_sub_klasifikasi']; ?></span>
																						</td>
																					</tr>

																					<tr>
																						<td>Pemilik Proyek</td>
																						<td><span class="text-dark"><?php echo $row_pengalaman['pemilik_proyek']; ?></span>
																						</td>
																					</tr>
																					<tr>
																						<td>Tahun</td>
																						<td><span class="text-dark"><?php echo $row_pengalaman['tahun']; ?></span>
																						</td>
																					</tr>
																					<tr>
																						<td>Spesifik Pekerjaan</td>
																						<td><span class="text-dark"><?php echo $row_pengalaman['spesifik_pekerjaan']; ?></span>
																						</td>
																					</tr>
																					<tr>
																						<td>No BASH</td>
																						<td><span class="text-dark"><?php echo $row_pengalaman['no_bash']; ?></span>
																						</td>
																					</tr>
																					<tr>
																						<td>No NKPK</td>
																						<td><span class="text-dark"><?php echo $row_pengalaman['no_nkpk']; ?></span>
																						</td>
																					</tr>

																					<tr>
																						<td>Tgl Kontrak</td>
																						<td><span class="text-dark"><?php echo $row_pengalaman['tgl_kontrak']; ?></span>
																						</td>
																					</tr>
																					<tr>
																						<td>Tgl BAST</td>
																						<td><span class="text-dark"><?php echo $row_pengalaman['tgl_bast']; ?></span>
																						</td>
																					</tr>
																					<tr>
																						<td>Tgl Mulai</td>
																						<td><span class="text-dark"><?php echo $row_pengalaman['tgl_mulai']; ?></span>
																						</td>
																					</tr>
																					<tr>
																						<td>Tgl Selesai</td>
																						<td><span class="text-dark"><?php echo $row_pengalaman['tgl_selesai']; ?></span>
																						</td>
																					</tr>


																				</tbody>
																			</table>
																		</div>
																	</div>
																</div>
															</div>
															<hr>
														<?php endforeach; ?>


													</div>
												<?php endif; ?>



											</div>
										</div>
									</div>
								</div>

								<div class="tab-pane fade" id="neraca" role="tabpanel" aria-labelledby="home-tab-1">

									<div class="col-md-12">
										<!-- Pemegang Saham toggles -->
										<div class="panel panel-flat panel-collapsed">
											<div class="panel-heading">
												<h5 class="panel-title">Neraca</h5>
												<div class="heading-elements">

												</div>
											</div>
											<div class="panel-body">
												<div class="row">
													<div class="col-md-4">
														<div class="content-group-lg">
															<h6 class="text-semibold">#Neraca Terbaru</h6>
															<p class="content-group">Apakah Ada Data Neraca Terbaru?
															</p>
														</div>
													</div>

												</div>
												<div class="row">
													
													<?php if(empty($permohonan)) :?>
														<div class="col-md-4">
														<select class="form-control" onchange="getval_neraca(this)" id="exampleSelect1">
															<option value="tidak">Tidak Ada</option>
															<option value="ada">Ada</option>

														</select>
													</div>
																			<?php else :?>
																				<a type="button" disabled class="btn btn-info font-weight-bolder my-1"> Permoohnan Sudah Tersubmit </a>		
																	<?php endif ;?>
													<div class="col-md-4">
														<div id="display_neraca" style="display:none;">
															<button data-toggle="modal" data-target="#modal_upload_neraca" type="button" class="btn btn-warning font-weight-bolder ml-sm-auto my-1">Tambah
																Data Neraca Terbaru</button>
														</div>
													</div>

												</div>



											</div>
										</div>
										<div class="modal fade" id="modal_upload_neraca" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeXl" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered" role="document">
												<div class="modal-content">

													<div class="modal-body">
														<div class="card card-custom gutter-b">
															<div class="card-header">
																<div class="card-title">
																	<span class="card-icon">
																		<i class="flaticon-file-1 text-primary"></i>
																	</span>
																	<h3 class="card-label"><span class="text-primary">Tambah
																			Data Neraca Terbaru</span></h3>
																</div>
															</div>
															<?php echo form_open_multipart('survailen/insert_neraca/', 'class="form-horizontal form-validate-jquery" enctype="multipart/form-data" id="form-upload-3'); ?>
															<div class="card-body">
																<input name="id_izin" type="hidden" value="<?= $klasifikasi[0]['id_izin'] ?>">
																<input name="nibx" type="hidden" value="<?= $biodata[0]['NIB']; ?>">
																<input name="sub_klasifikasi" type="hidden" value="<?= $klasifikasi[0]['id_sub_klasifikasi'] ?>">

																<div class="form-group row">

																	<div class="col-lg-12">
																		<label>Tahun
																			<span class="text-danger">*</span></label>
																		<input type="input" name="tahun" class="form-control" placeholder="Tahun Neraca">
																		<label>Total Ekuitas
																			<span class="text-danger">*</span></label>
																		<input type="input" name="ekuitas" class="form-control">
																		<label>Total Aset
																			<span class="text-danger">*</span></label>
																		<input type="input" name="aset" class="form-control">
																		<label>Total Modal Dasar
																			<span class="text-danger">*</span></label>
																		<input type="input" name="modal_dasar" class="form-control">
																		<label>Total Kewajiban
																			<span class="text-danger"></span></label>
																		<input type="input" name="kewajiban" class="form-control">



																		<label class="control-label">Upload Neraca<span class="text-danger">*</span></label>
																		<input class="file-neraca" id="file_neraca" name="file_neraca" type="file" required="required" data-preview-file-type="text">
																		<span class="help-block">
																			Accepted formats: pdf, zip. Max file size
																			20Mb
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
														<button type="submit" id="submit2" class="btn btn-primary mr-2">Upload</button>

														<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
													</div>
													<?php echo form_close(); ?>
												</div>
											</div>
										</div>
										<hr>
										<?php if (!empty($neraca_survailen)) : ?>
											<div class="accordion accordion-toggle-arrow" id="accordionExample1">
												<input type="hidden" value="<?php echo $tgl; ?>" class="switchery" name="tgl">

												<?php foreach ($neraca_survailen as $row_neraca) : ?>
													<?php $counter_neraca += 1; ?>
													<div class="card">
														<div class="card-header">
															<div class="card-title collapsed" data-toggle="collapse" data-target="#data-neraca-<?php echo $counter_neraca; ?>">
																<?php echo $row_neraca['tahun']; ?> (Data Survailen)
															</div>
														</div>
														<div id="data-neraca-<?php echo $counter_neraca; ?>" class="collapse show" data-parent="#accordionExample1">

															<div class="card-body">
																<!--#1-->
																<div class="row">
																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#1</h6>
																			<p class="content-group">File Neraca</p>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<br>

																		<a href="<?= base_url('get_file/survailen_neraca/' . $row_neraca['file_neraca']); ?>" target="_blank" class="btn btn-success font-weight-bold mr-2">
																			<i class="flaticon-upload"></i> Softcopy Neraca
																		</a>
																	</div>
																	<div class="col-md-4">
																		<br>
																		<a type="button" style="float: right" class="btn btn-primary mr-3"><b></i></b><i class="flaticon2-trash"></i>Delete Data Neraca</a>
																	</div>









																</div>

																<hr>
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
																				<td>Tahun</td>
																				<td><span class="text-dark"><?= $row_neraca['tahun']; ?></span>
																				</td>
																			</tr>

																			<tr>
																				<td>Total Ekuitas</td>
																				<td><span class="text-dark"><?= $row_neraca['ekuitas']; ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Total Aset</td>
																				<td><span class="text-dark"><?= $row_neraca['aset']; ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Modal Dasar</td>
																				<td><span class="text-dark"><?= $row_neraca['modal_dasar']; ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Total Kewajiban</td>
																				<td><span class="text-dark"><?= $row_neraca['modal_dasar']; ?></span>
																				</td>
																			</tr>






																		</tbody>
																	</table>
																</div>


															</div>
														</div>
													</div>
													<hr>
												<?php endforeach; ?>


											</div>
										<?php endif; ?>
										<hr>
										<?php if (!empty($neraca)) : ?>
											<div class="accordion accordion-toggle-arrow" id="accordionExample1">
												<input type="hidden" value="<?php echo $tgl; ?>" class="switchery" name="tgl">

												<?php foreach ($neraca as $row_neraca) : ?>
													<?php $counter_neraca += 1; ?>
													<div class="card">
														<div class="card-header">
															<div class="card-title collapsed" data-toggle="collapse" data-target="#data-neraca-<?php echo $counter_neraca; ?>">
																<?php echo $row_neraca['Tahun']; ?> (Data Permohonan)
															</div>
														</div>
														<div id="data-neraca-<?php echo $counter_neraca; ?>" class="collapse show" data-parent="#accordionExample1">

															<div class="card-body">
																<!--#1-->
																<div class="row">
																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#1</h6>
																			<p class="content-group">Doc 1</p>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<br>
																		<a <?php if ($row_neraca['persyaratan_doc1'] != '') : ?>href="<?= $row_neraca['persyaratan_doc1']; ?>" <?php else : ?>href="<?= base_url('not_found'); ?>" <?php endif; ?> target="_blank" type="button" name="btn_cek_36" style="float: left" class=" btn btn-dark btn-labeled btn-rounded"><b><i class="icon-file-check"></i></b>
																			Softcopy</a>
																	</div>
																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#2</h6>
																			<p class="content-group">Doc 2</p>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<br>
																		<a <?php if ($row_neraca['persyaratan_doc2'] != '') : ?>href="<?= $row_neraca['persyaratan_doc2']; ?>" <?php else : ?>href="<?= base_url('not_found'); ?>" <?php endif; ?> target="_blank" type="button" name="btn_cek_36" style="float: left" class=" btn btn-dark btn-labeled btn-rounded"><b><i class="icon-file-check"></i></b>
																			Softcopy</a>
																	</div>


																	<!--#2-->


																</div>

																<hr>
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
																				<td>Tahun</td>
																				<td><span class="text-dark"><?= $row_neraca['Tahun']; ?></span>
																				</td>
																			</tr>

																			<tr>
																				<td>Aktiva Lancar</td>
																				<td><span class="text-dark"><?= $row_neraca['aktiva_lancar']; ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Aktiva Tidak Lancar</td>
																				<td><span class="text-dark"><?= $row_neraca['aktiva_tdk_lancar']; ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Aktiva Lain-lain</td>
																				<td><span class="text-dark"><?= $row_neraca['aktiva_lain_lain']; ?></span>
																				</td>
																			</tr>

																			<tr>
																				<td>Kewajiban lancar</td>
																				<td><span class="text-dark"><?= $row_neraca['kewajiban_lancar']; ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Kewajiban tidak lancar</td>
																				<td><span class="text-dark"><?= $row_neraca['kewajiban_tdk_lancar']; ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Ekuitas</td>
																				<td><span class="text-dark"><?= $row_neraca['total_ekuitas']; ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Total Modal</td>
																				<td><span class="text-dark"><?= $row_neraca['total_modal']; ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Total Kewajiban Ekuitas</td>
																				<td><span class="text-dark"><?= $row_neraca['total_kewajiban_ekuitas']; ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Total Kewajiban</td>
																				<td><span class="text-dark"><?= $row_neraca['total_kewajiban']; ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Total Aset</td>
																				<td><span class="text-dark"><?= $row_neraca['total_aset']; ?></span>
																				</td>
																			</tr>




																		</tbody>
																	</table>
																</div>


															</div>
														</div>
													</div>
													<hr>
												<?php endforeach; ?>


											</div>
										<?php endif; ?>
									</div>
								</div>
								<div class="tab-pane fade" id="pjbu" role="tabpanel" aria-labelledby="home-tab-1">

									<div class="col-md-12">
										<div class="panel panel-flat panel-collapsed">
											<div class="panel-heading">
												<h5 class="panel-title">PJBU</h5>
												<div class="heading-elements">

												</div>
											</div>
											<div class="panel-body">






											</div>
										</div>
									</div>
									<hr>

									<hr>
									<?php if (!empty($pjbu)) : ?>
										<div class="col-md-12">
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
															<td>Nama</td>
															<td>

																<div class="input-group file-caption-main">
																	<span class="file-caption-icon"></span>
																	<input type="text" name="nama_pjbu" class="form-control form-control-solid" value="<?php echo $pjbu[0]['nama']; ?>">

																</div>
															</td>
														</tr>

														<tr>
															<td>NIK</td>
															<td>
																<div class="input-group file-caption-main">
																	<span class="file-caption-icon"></span>
																	<input type="text" name="nik_pjbu" class="form-control form-control-solid" value="<?php echo $pjbu[0]['nik']; ?>">

																</div>
															</td>
														</tr>
														<tr>
															<td>NPWP</td>
															<td>

																<div class="input-group file-caption-main">
																	<span class="file-caption-icon"></span>
																	<input type="text" name="npwp_pjbu" class="form-control form-control-solid" value="<?php echo $pjbu[0]['npwp']; ?>">

																</div>
															</td>
														</tr>






													</tbody>
												</table>
											</div>
										</div>



									<?php endif; ?>
								</div>
								<div class="tab-pane fade" id="pjtbu" role="tabpanel" aria-labelledby="home-tab-1">

									<div class="col-md-12">
										<div class="panel panel-flat panel-collapsed">
											<div class="panel-heading">
												<h5 class="panel-title">PJTBU</h5>
												<div class="heading-elements">

												</div>
											</div>
											<?php echo form_open_multipart('survailen/insert_pjtbu/', 'class="form-horizontal form-validate-jquery" enctype="multipart/form-data" id="form-upload-4'); ?>

											<div class="panel-body">
												<!--#1-->
												<div class="row">
													<div class="col-md-4">
														<div class="content-group-lg">
															<h6 class="text-semibold">#Upload Foto Sertifikat PJTBU
															</h6>
															<p class="content-group">Upload Foto SKK/SKA/SKT PJTBU
															</p>
														</div>
													</div>

													<div class="col-md-4">
														<div class="content-group-lg">
															<h6 class="text-semibold">#Upload Foto Pernyataan</h6>
															<p class="content-group">Surat Foto Pernyataan Keterikatan</p>
														</div>
													</div>
													<div class="col-md-4">
														<div class="content-group-lg">
															<h6 class="text-semibold">#Tgl Masa Berlaku</h6>
															<p class="content-group">Tgl Habisnya Masa Berlaku Sertifikat</p>
														</div>
													</div>

													<input name="id_izin" type="hidden" value="<?= $klasifikasi[0]['id_izin'] ?>">
													<input name="nibx" type="hidden" value="<?= $biodata[0]['NIB']; ?>">
													<input name="sub_klasifikasi" type="hidden" value="<?= $klasifikasi[0]['id_sub_klasifikasi'] ?>">

												</div>
												<div class="row">
													<div class="col-lg-4">
														<input class="file-skk_pjt" id="file_skk_pjt" name="file_skk_pjt" type="file" required="required" data-preview-file-type="text">
														<span class="help-block">
															Accepted formats: pdf, zip. Max file size 20Mb
														</span>
														<div class="progress" style="display:none;">
															<div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
																20%
															</div>
														</div>
													</div>

													<div class="col-lg-4">
														<input class="file-skk_pjt_sk" id="file_skk_sk" name="file_skk_sk" type="file" required="required" data-preview-file-type="text">
														<span class="help-block">
															Accepted formats: pdf, zip. Max file size 20Mb
														</span>
														<div class="progress" style="display:none;">
															<div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
																20%
															</div>
														</div>
													</div>
													<div class="col-lg-4">
														<input type="text" name="masa_berlaku_pjtbu" class="form-control form-control-solid" value="">
													</div>
												</div>
												<?php if (!empty($pjtbu_survailen)) : ?>
													<br>
													<br>
													<div class="row">
														<div class="col-md-4">
															<a href="<?= base_url('get_file/survailen_pjt_skk/' . $pjtbu_survailen[0]['file_sertifikat']); ?>" target="_blank" class="btn btn-success font-weight-bold mr-2">
																<i class="flaticon-upload"></i> Softcopy File
																SKK/SKA/SKT Survailen
															</a>
														</div>

														<div class="col-md-4">
															<a href="<?= base_url('get_file/survailen_pjt_pernyataan/' . $pjtbu_survailen[0]['file_sk_perubahan']); ?>" target="_blank" class="btn btn-success font-weight-bold mr-2">
																<i class="flaticon-upload"></i> Softcopy Foto Surat pernyataan Keterikatan
															</a>
														</div>
														<div class="col-md-4">

														</div>



													</div>
												<?php endif; ?>

												
													<?php if(empty($permohonan)) :?>
														<button type="submit" style="float: right" class="open-delete btn btn-dark btn-labeled btn-rounded"><b></i></b>Save
													PJTBU</button>
																			<?php else :?>
																				<a type="button" disabled class="btn btn-info font-weight-bolder my-1"> Permoohnan Sudah Tersubmit </a>		
																	<?php endif ;?>
												<br>
												<br>
											</div>
											<?php echo form_close(); ?>
										</div>
									</div>

									<hr>
									<hr>
									<?php if (!empty($pjtbu)) : ?>
										<div class="accordion accordion-toggle-arrow" id="accordionExample1">

											<?php foreach ($pjtbu as $row_pjtbu) : ?>
												<?php $counter_pjtbu += 1; ?>
												<div class="card">
													<div class="card-header">
														<div class="card-title collapsed" data-toggle="collapse" data-target="#data-pjtbu-<?php echo $counter_pjtbu; ?>">
															<?= $row_pjtbu['sub_klasifikasi'] . ' - ' . $row_pjtbu['nama'] ?>
															(Data Permohonan SBU)
														</div>
													</div>
													<div id="data-pjtbu-<?php echo $counter_pjtbu; ?>" class="collapse show" data-parent="#accordionExample1">
														<div class="card-body">


															<div class="table-responsive">
																<div class="row">
																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#1</h6>
																			<p class="content-group">File SKK</p>
																		</div>
																	</div>


																	<div class="col-md-2">
																		<br>
																		<a <?php if ($row_pjtbu['skk'] != '') : ?>href="<?= $row_pjtbu['skk']; ?>" <?php else : ?>href="<?= base_url('not_found'); ?>" <?php endif; ?> target="_blank" type="button" name="btn_cek_11" style="float: right" class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i class="icon-file-check"></i></b>
																			Softcopy</a>
																	</div>
																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#2</h6>
																			<p class="content-group">File Ijazah</p>
																		</div>
																	</div>


																	<div class="col-md-2">
																		<br>
																		<a <?php if ($row_pjtbu['ijazah'] != '') : ?>href="<?= $row_pjtbu['ijazah']; ?>" <?php else : ?>href="<?= base_url('not_found'); ?>" <?php endif; ?> target="_blank" type="button" name="btn_cek_11" style="float: right" class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i class="icon-file-check"></i></b>
																			Softcopy</a>
																	</div>
																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#3</h6>
																			<p class="content-group">File SPT</p>
																		</div>
																	</div>


																	<div class="col-md-2">
																		<br>
																		<a <?php if ($row_pjtbu['spt'] != '') : ?>href="<?= $row_pjtbu['spt']; ?>" <?php else : ?>href="<?= base_url('not_found'); ?>" <?php endif; ?> target="_blank" type="button" name="btn_cek_11" style="float: right" class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i class="icon-file-check"></i></b>
																			Softcopy</a>
																	</div>


																</div>
																<table class="table table-lg">
																	<thead>
																		<tr>
																			<th>Data</th>
																			<th>Description</th>
																		</tr>
																	</thead>
																	<tbody>
																		<tr>
																			<td>Nama</td>
																			<td><span class="text-dark"><?php echo $row_pjtbu['nama']; ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Klasifikasi ACPE AA</td>
																			<td><span class="text-dark"><?php echo $row_pjtbu['klasifikasi_acpe_aa'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Noreg ACPE AA</td>
																			<td><span class="text-dark"><?php echo $row_pjtbu['nomor_registrasi_acpe_aa'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Klasifikasi skk</td>
																			<td><span class="text-dark"><?php echo $row_pjtbu['klasifikasi_skk'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Kualifikasi SKK</td>
																			<td><span class="text-dark"><?php echo $row_pjtbu['kualifikasi_skk'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Tanggal Terbit SKK</td>
																			<td><span class="text-dark"><?php echo $row_pjtbu['tanggal_terbit_skk'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Jenjang SKK</td>
																			<td><span class="text-dark"><?php echo $row_pjtbu['jenjang_skk']; ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Alamat</td>
																			<td><span class="text-dark"><?php echo $row_pjtbu['alamat']; ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Noreg SKK</td>
																			<td><span class="text-dark"><?php echo $row_pjtbu['noreg_skk']; ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Klasifikasi</td>
																			<td><span class="text-dark"><?php echo $row_pjtbu['klasifikasi'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Sub Klasifikasi</td>
																			<td><span class="text-dark"><?php echo $row_pjtbu['sub_klasifikasi']; ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>NIK</td>
																			<td><span class="text-dark"><?php echo $row_pjtbu['nik']; ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>NPWP</td>
																			<td><span class="text-dark"><?php echo $row_pjtbu['npwp']; ?></span>
																			</td>
																		</tr>






																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
												<hr>
											<?php endforeach; ?>
										</div>




									<?php endif; ?>
								</div>
								<div class="tab-pane fade" id="pjskbu" role="tabpanel" aria-labelledby="profile-tab-1">

									<div class="col-md-12">
										<div class="panel panel-flat panel-collapsed">
											<div class="panel-heading">
												<h5 class="panel-title">PJSKBU</h5>
												<div class="heading-elements">

												</div>
											</div>
											<?php echo form_open_multipart('survailen/insert_pjskbu/', 'class="form-horizontal form-validate-jquery" enctype="multipart/form-data" id="form-upload-5'); ?>


											<div class="panel-body">
												<!--#1-->

												<div class="row">
													<div class="col-md-4">
														<div class="content-group-lg">
															<h6 class="text-semibold">#Upload Foto Sertifikat PJSKBU
															</h6>
															<p class="content-group">Upload Foto SKK/SKA/SKT PJSKBU
															</p>
														</div>
													</div>

													<div class="col-md-4">
														<div class="content-group-lg">
															<h6 class="text-semibold">#Upload Foto Pernyataan</h6>
															<p class="content-group">Upload Foto Surat Pernyataan Keterikatan</p>
														</div>
													</div>
													<div class="col-md-4">

														<div class="content-group-lg">
															<h6 class="text-semibold">#Tgl Masa Berlaku</h6>
															<p class="content-group">Tgl Habisnya Masa Berlaku Sertifikat</p>
														</div>
													</div>

													<input name="id_izin" type="hidden" value="<?= $klasifikasi[0]['id_izin'] ?>">
													<input name="nibx" type="hidden" value="<?= $biodata[0]['NIB']; ?>">
													<input name="sub_klasifikasi" type="hidden" value="<?= $klasifikasi[0]['id_sub_klasifikasi'] ?>">

												</div>
												<div class="row">
													<div class="col-lg-4">
														<input class="file-skk_pjsk" id="file_skk_pjsk" name="file_skk_pjsk" type="file" required="required" data-preview-file-type="text">
														<span class="help-block">
															Accepted formats: pdf, zip. Max file size 20Mb
														</span>
														<div class="progress" style="display:none;">
															<div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
																20%
															</div>
														</div>
													</div>

													<div class="col-lg-4">
														<input class="file-skk_pjsk_sk" id="file_skk_sk_pjskbu" name="file_skk_sk_pjskbu" type="file" required="required" data-preview-file-type="text">
														<span class="help-block">
															Accepted formats: pdf, zip. Max file size 20Mb
														</span>
														<div class="progress" style="display:none;">
															<div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
																20%
															</div>
														</div>
													</div>
													<div class="col-lg-4">
														<input type="text" name="masa_berlaku_pjtbu" class="form-control form-control-solid" value="">
													</div>
												</div>
												<?php if (!empty($pjskbu_survailen)) : ?>
													<br>
													<br>
													<div class="row">
														<div class="col-md-4">
															<a href="<?= base_url('get_file/survailen_pjsk_skk/' . $pjskbu_survailen[0]['file_sertifikat']); ?>" target="_blank" class="btn btn-success font-weight-bold mr-2">
																<i class="flaticon-upload"></i> Softcopy File
																SKK/SKA/SKT Survailen
															</a>
														</div>

														<div class="col-md-4">
															<a href="<?= base_url('get_file/survailen_pjsk_pernyataan/' . $pjskbu_survailen[0]['file_sk_perubahan']); ?>" target="_blank" class="btn btn-success font-weight-bold mr-2">
																<i class="flaticon-upload"></i> Softcopy File SK
																Perubahan Survailen
															</a>
														</div>
														<div class="col-md-4">

														</div>



													</div>
												<?php endif; ?>
												
													<?php if(empty($permohonan)) :?>
														<button type="submit" style="float: right" class="open-delete btn btn-dark btn-labeled btn-rounded"><b></i></b>Save
													PJSKBU</button>
																			<?php else :?>
																				<a type="button" disabled class="btn btn-info font-weight-bolder my-1"> Permoohnan Sudah Tersubmit </a>		
																	<?php endif ;?>
												<br>
												<br>


											</div>
											<?php echo form_close(); ?>
										</div>
									</div>
									<hr>
									<hr>
									<?php if (!empty($pjskbu)) : ?>
										<div class="accordion accordion-toggle-arrow" id="accordionExample1">

											<?php foreach ($pjskbu as $row_pjskbu) : ?>
												<?php $counter_pjskbu += 1; ?>
												<div class="card">
													<div class="card-header">
														<div class="card-title collapsed" data-toggle="collapse" data-target="#data-pjskbu-<?php echo $counter_pjskbu; ?>">
															<?= $row_pjskbu['id_sub_klasifikasi_pjsk'] . ' - ' . $row_pjskbu['nama'] ?>
															(Data Permohonan SBU)
														</div>
													</div>
													<div id="data-pjskbu-<?php echo $counter_pjskbu; ?>" class="collapse show" data-parent="#accordionExample1">


														<div class="card-body">
															<div class="row">
																<div class="col-md-3">
																	<div class="content-group-lg">
																		<h6 class="text-semibold">#1</h6>
																		<p class="content-group">File SKK</p>
																	</div>
																</div>


																<div class="col-md-3">
																	<br>
																	<a <?php if ($row_pjskbu['skk'] != '') : ?>href="<?= $row_pjskbu['skk']; ?>" <?php else : ?>href="<?= base_url('not_found'); ?>" <?php endif; ?> target="_blank" type="button" name="btn_cek_11" style="float: right" class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i class="icon-file-check"></i></b>
																		Softcopy</a>
																</div>
																<div class="col-md-3">
																	<div class="content-group-lg">
																		<h6 class="text-semibold">#2</h6>
																		<p class="content-group">File Ijazah</p>
																	</div>
																</div>


																<div class="col-md-3">
																	<br>
																	<a <?php if ($row_pjskbu['ijazah'] != '') : ?>href="<?= $row_pjskbu['ijazah']; ?>" <?php else : ?>href="<?= base_url('not_found'); ?>" <?php endif; ?> target="_blank" type="button" name="btn_cek_11" style="float: right" class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i class="icon-file-check"></i></b>
																		Softcopy</a>
																</div>

															</div>
															<div class="row">
																<div class="col-md-3">
																	<div class="content-group-lg">
																		<h6 class="text-semibold">#3</h6>
																		<p class="content-group">File SPT</p>
																	</div>
																</div>


																<div class="col-md-3">
																	<br>
																	<a <?php if ($row_pjskbu['spt'] != '') : ?>href="<?= $row_pjskbu['spt']; ?>" <?php else : ?>href="<?= base_url('not_found'); ?>" <?php endif; ?> target="_blank" type="button" name="btn_cek_11" style="float: right" class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i class="icon-file-check"></i></b>
																		Softcopy</a>
																</div>


															</div>

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
																			<td>Nama</td>
																			<td><span class="text-dark"><?php echo $row_pjskbu['nama'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Klasifikasi</td>
																			<td><span class="text-dark"><?php echo $row_pjskbu['klasifikasi'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Sub Klasifikasi</td>
																			<td><span class="text-dark"><?php echo $row_pjskbu['sub_klasifikasi'] ?></span>
																			</td>
																		</tr>

																		<tr>
																			<td>Jenis Tenaga Kerja</td>
																			<td><span class="text-dark"><?php echo $row_pjskbu['jenis_tenaga'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Jenjang SKK</td>
																			<td><span class="text-dark"><?php echo $row_pjskbu['jenjang_skk'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Klasifikasi ACPE AA</td>
																			<td><span class="text-dark"><?php echo $row_pjskbu['klasifikasi_acpe_aa'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Noreg ACPE AA</td>
																			<td><span class="text-dark"><?php echo $row_pjskbu['nomor_registrasi_acpe_aa'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Klasifikasi_skk</td>
																			<td><span class="text-dark"><?php echo $row_pjskbu['klasifikasi_skk'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Kualifikasi SKK</td>
																			<td><span class="text-dark"><?php echo $row_pjskbu['kualifikasi_skk'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Tanggal Terbit SKK</td>
																			<td><span class="text-dark"><?php echo $row_pjskbu['tanggal_terbit_skk'] ?></span>
																			</td>
																		</tr>

																		<tr>
																			<td>NIK</td>
																			<td><span class="text-dark"><?php echo $row_pjskbu['nik'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Noreg</td>
																			<td><span class="text-dark"><?php echo $row_pjskbu['noreg_skk'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>NPWP</td>
																			<td><span class="text-dark"><?php echo $row_pjskbu['npwp'] ?></span>
																			</td>
																		</tr>

																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
												<hr>
											<?php endforeach; ?>


										</div>
									<?php endif; ?>
								</div>
								<div class="tab-pane fade" id="peralatan" role="tabpanel" aria-labelledby="profile-tab-1">

									<div class="col-md-12">
										<div class="content-group-lg">
											<h6 class="text-semibold">#Data Peralatan</h6>
											<p class="content-group">Sesuai dengan komitmen pemenuhan Peralatan
												Konstruksi paling lambat 30 hari (milik sendiri) atau bukti sewa
												selama
												1 (satu) tahun sejak SBU diterbitkan dan telah didaftarkan pada
												SIMPK Melalui <a href="https://simpk.pu.go.id/panduan/read/panduan-pendaftaran-aku" target="_blank"> Pendaftaran Peralatan </a>
											</p>
										</div>
									</div>
									<button data-toggle="modal" data-target="#modal_peralatan" type="button" class="btn btn-warning font-weight-bolder ml-sm-auto my-1">Tambah
															Data  Peralatan</button>
															<div class="modal fade" id="modal_peralatan" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeXl" aria-hidden="true">
													<div class="modal-dialog modal-dialog-centered" role="document">
														<div class="modal-content">

															<div class="modal-body">
																<div class="card card-custom gutter-b">
																	<div class="card-header">
																		<div class="card-title">
																			<span class="card-icon">
																				<i class="flaticon-file-1 text-primary"></i>
																			</span>
																			<h3 class="card-label"><span class="text-primary">Tambah
																					Data Peralatan</span></h3>
																		</div>
																	</div>
																	<?php echo form_open_multipart('survailen/insert_peralatan/'); ?>
																	<div class="card-body">
																		<input name="id_izin" type="hidden" value="<?= $klasifikasi[0]['id_izin'] ?>">
																		<input name="nibx" type="hidden" value="<?= $biodata[0]['NIB']; ?>">
																		<input name="sub_klasifikasi" type="hidden" value="<?= $klasifikasi[0]['id_sub_klasifikasi'] ?>">

																		<div class="form-group row">

																			<div class="col-lg-12">
																				<label>Nama Peralatan
																					<span class="text-danger">*</span></label>
																				<input type="input" name="nama_peralatan" class="form-control">
																				<label>No Registrasi SIMPK
																					<span class="text-danger">*</span></label>
																				<input type="input" name="noreg_simpk" class="form-control">
																				<label>Kepemilikans
																					<span class="text-danger">*</span></label>
																					<select class="form-control" name="milik_sendiri" id="exampleSelect1">
																					<option value='1'>Milik Sendiri</option>
																					<option value='2'>Sewa</option>

																				</select>
																			</div>

																		</div>

																	</div>
																</div>
															</div>
															<div class="modal-footer">
																<button type="submit" id="submit2" class="btn btn-primary mr-2">Submit</button>

																<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
															</div>
															<?php echo form_close(); ?>
														</div>
													</div>
												</div>

									
									
										
									<br>
									<br>
									
									<?php if (!empty($peralatan_survailen)) : ?>
													<div class="accordion accordion-toggle-arrow" id="accordionExample1">

														<?php foreach ($peralatan_survailen as $row_peralatan) : ?>
															<?php $counter_pengalaman += 1; ?>
															<div class="card">
																<div class="card-header">
																	<div class="card-title collapsed" data-toggle="collapse" data-target="#data-pengalaman-<?php echo $counter_pengalaman; ?>">
																		<?php echo  $row_peralatan['nama_peralatan'] . '(Data Survailen)'; ?>
																	</div>
																</div>
																<div id="data-pengalaman-<?php echo $counter_pengalaman; ?>" class="collapse show" data-parent="#accordionExample1">

																	<div class="card-body">


																		<div class="row">

																			<div class="col-md-4">
																				<br>
																				<a type="button" style="float: right" class="btn btn-primary mr-3"><b></i></b><i class="flaticon2-trash"></i>Delete Data Peralatan</a>
																			</div>

																		</div>



																		<hr>


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
																						<td>Nama Peralatan</td>
																						<td><span class="text-dark"><?php echo $row_peralatan['nama_peralatan']; ?></span>
																						</td>
																					</tr>
																					<tr>
																						<td>No Registrasi SIMPK</td>
																						<td><span class="text-dark"><?php echo $row_peralatan['noreg_peralatan']; ?></span>
																						</td>
																					</tr>
																					<tr>
																						<td>Kepemilikan</td>
																						<td><span class="text-dark"><?php if($row_peralatan['kepemilikan']=='1'){
																							echo "Milik Sendiri";
																						}else{
																							echo "Sewa";
																						} ; ?></span>
																						</td>
																					</tr>


																					


																				</tbody>
																			</table>
																		</div>
																	</div>
																</div>
															</div>
															<hr>
														<?php endforeach; ?>


													</div>
												<?php endif; ?>









								</div>








								<div class="tab-pane fade show" id="submit_final" role="tabpanel" aria-labelledby="home-tab-1">

									<div class="col-md-12">
										<div class="panel panel-flat panel-collapsed">
											<div class="panel-heading">
												<h5 class="panel-title">Submit Final</h5>
												<div class="heading-elements">

												</div>
											</div>

											<div class="panel-body">
												<div class="row justify-content-center border-top py-8 px-8 py-md-28 px-md-0">

													<div class="col-md-6">
														<!--begin::Mixed Widget 10-->
														<div class="card card-custom gutter-b" style="height: 150px">
															<!--begin::Body-->
															<div class="card-body d-flex align-items-center justify-content-between flex-wrap">
																<div class="mr-2">
																	<h3 class="font-weight-bolder">Submit Pengajuan
																		Survailen</h3>
																	<div class="text-dark-50 font-size-lg mt-2">
																		Dengan Meng-klik tombol dibawah akan
																		mengirim pengajuan Data SUrvailen anda ke
																		LSBU GAPEKNAS untuk di Tinjau</div>
																</div>
																		<?php if(empty($permohonan)) :?>
																<a type="button" onclick="javascript:submit(this)" class="btn btn-dark font-weight-bolder my-1">Submit
																	Pengajuan</a>
																			<?php else :?>
																				<a type="button" disabled class="btn btn-info font-weight-bolder my-1"> Permoohnan Sudah Tersubmit </a>		
																	<?php endif ;?>
															</div>
															<!--end::Body-->
														</div>
														<!--end::Mixed Widget 10-->
													</div>



												</div>





											</div>
										</div>
									</div>
								</div>


							</div>
						</div>


					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="card-header card-header-right ribbon ribbon-clip ribbon-left">
				<div class="ribbon-target" style="top: 12px;font-size: 20px;">
					<?php if ($data_check['status'] == 'FALSE') : ?>
						<span class="ribbon-inner bg-warning"></span>BELUM SESUAI
					<?php else : ?>
						<span class="ribbon-inner bg-info"></span>SESUAI
					<?php endif; ?>
				</div>
				<h3 class="card-title">


					<h5 class="modal-title" id="exampleModalLabel">Pengecekan PJT & PJSK Sudah Terpakai<br><span class="text-danger">Seluruh Tenaga Kerja Tidak Boleh terdaftar di BUJK lain jika ingin
							lolos
							tinjauan permohonan</span></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i aria-hidden="true" class="ki ki-close"></i>
					</button>

				</h3>
			</div>

			<div class="modal-body">
				<div class="row">
					<table class="table table-lg">
						<thead>
							<tr>
								<th>Nama PJT</th>
								<th>Nama BUJK Terdaftar</th>
								<th>NPWP BUJK Terdaftar</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>

							<tr>
								<td><?= $data_check['data_pjt'][0]['nama_tk'] ?></td>
								<td><span class="text-dark"><?= $data_check['data_pjt'][0]['nama_bujk'] ?></span></td>
								<td><span class="text-dark"><?= $data_check['data_pjt'][0]['npwp_bujk'] ?></span></td>
								<?php if ($data_check['data_pjt'][0]['status'] == 'FALSE') : ?>
									<td><span class="label label-lg label-danger label-pill label-inline mr-2">Terdaftar
											Di
											BUJK Lain</span>
										<!-- <a  onclick="javascript:kembalikan_permohonan(this)" name="<?= $nib_dec; ?>" id="<?= $tgl_dec; ?>" class="btn btn-outline-danger btn-sm mr-3">
												<i class="la la-trash"></i>Kembalikan Berkas</a></td> -->
									<?php else : ?>
									<td><span class="label label-lg label-info label-pill label-inline mr-2">Memenuhi</span>
									</td>

								<?php endif; ?>
							</tr>
				</div>
				<hr>
				<div class="row">

					<table class="table table-lg">
						<thead>
							<tr>
								<th>Nama PJSK</th>

								<th>Sub Klasifikasi</th>
								<th>Nama BUJK Terdaftar</th>
								<th>NPWP BUJK Terdaftar</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($data_check['data_pjsk'] as $pjsk) : ?>
								<tr>
									<td><?= $pjsk['nama_tk'] ?></td>

									<td><span class="text-dark"><?= $pjsk['sub_klasifikasi'] ?></span></td>
									<td><span class="text-dark"><?= $pjsk['nama_bujk'] ?></span></td>
									<td><span class="text-dark"><?= $pjsk['npwp_bujk'] ?></span></td>
									<?php if ($pjsk['status'] == 'FALSE') : ?>
										<td><span class="label label-lg label-danger label-pill label-inline mr-2">Terdaftar
												Di
												BUJK Lain</span>
											<!-- <a disabled onclick="javascript:kembalikan(this)" name="<?= $pjsk['id_izin']; ?>" id="<?= $pjsk['sub_klasifikasi'] ?>" class="btn btn-outline-danger btn-sm mr-3">
															<i class="la la-trash"></i>Kembalikan Berkas</a> -->
										</td>
									<?php else : ?>
										<td><span class="label label-lg label-info label-pill label-inline mr-2">Memenuhi</span>
										</td>

									<?php endif; ?>
								<?php endforeach; ?>
								</tr>






						</tbody>
					</table>
				</div>

				<div class="row">

					<table class="table table-lg">
						<thead>
							<tr>
								<th>Nama PJBU</th>
								<th>NIK PJBU</th>
								<th>Sub Klasifikasi</th>

								<th>Nama BUJK Terdaftar</th>

								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($data_check['data_pjbu'] as $pjbux) : ?>
								<tr>
									<td><?= $pjbux['nama_tk'] ?></td>
									<td><span class="text-dark"><?= $pjbux['nik_tk'] ?></span></td>
									<td><span class="text-dark"><?= $pjbux['sub_klasifikasi'] ?></span></td>

									<td><span class="text-dark"><?= $pjbux['nama_bujkx'] ?></span></td>

									<?php if ($pjbux['status'] == 'FALSE') : ?>
										<td><span class="label label-lg label-danger label-pill label-inline mr-2">Terdaftar
												Di
												BUJK Lain</span>
											<!-- <a disabled onclick="javascript:kembalikan(this)" name="<?= $pjsk['id_izin']; ?>" id="<?= $pjsk['sub_klasifikasi'] ?>" class="btn btn-outline-danger btn-sm mr-3">
															<i class="la la-trash"></i>Kembalikan Berkas</a> -->
										</td>
									<?php else : ?>
										<td><span class="label label-lg label-info label-pill label-inline mr-2">Memenuhi</span>
										</td>

									<?php endif; ?>
								<?php endforeach; ?>
								</tr>






						</tbody>
					</table>
				</div>




				</tbody>
				</table>
				< </div>
					<div class="modal-footer">
						<button type="button" class="btn btn-light-dark font-weight-bold" data-dismiss="modal">Close</button>

					</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal_pjt" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeLg" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">

				<div class="modal-body">
					<div class="example example-basic">
						<div class="example-preview">
							<!--begin::Timeline-->
							<div class="table-responsive">


								<table class="table table-lg">
									<thead>
										<tr>
											<th>Nama PJT</th>
											<th>NIK PJT</th>
											<th>Nama BUJK</th>
											<th>NPWP BUJK</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="nama"></td>
											<td class="nik"><span class="text-dark"></span></td>
											<td class="nbu"><span class="text-dark"></span></td>
											<td class="npwp"><span class="text-dark"></span></td>
										</tr>






									</tbody>
								</table>
								<hr>

								<table class="table table-lg" id="pjt_ska">
									<h6 class="text-semibold"><span class="text-dark">Data SKA</span></h6>
									<thead>
										<tr>
											<th>Sub Bidang</th>
											<th>Noreg</th>
											<th>Kualifikasi</th>
											<th>Tgl Habis</th>
											<th>Link Sertifikat Digital</th>
										</tr>
									</thead>
									<tbody>







									</tbody>
								</table>
								<table class="table table-lg" id="pjt_skt">
									<h6 class="text-semibold"><span class="text-dark">Data SKT</span></h6>
									<thead>
										<tr>
											<th>Sub Bidang</th>
											<th>Noreg</th>
											<th>Kualifikasi</th>
											<th>Tgl Habis</th>
											<th>Link Sertifikat Digital</th>
										</tr>
									</thead>
									<tbody>







									</tbody>
								</table>
							</div>
							<!--end::Timeline-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal_pjsk" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeLg" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">

				<div class="modal-body">
					<div class="example example-basic">
						<div class="example-preview">
							<!--begin::Timeline-->
							<div class="table-responsive">
								<table class="table table-lg">
									<thead>
										<tr>
											<th>Nama PJSK</th>
											<th>NIK PJSK</th>
											<th>Nama BUJK</th>
											<th>NPWP BUJK</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="nama_pjsk"></td>
											<td class="nik_pjsk"><span class="text-dark"></span></td>
											<td class="nbu_pjsk"><span class="text-dark"></span></td>
											<td class="npwp_pjsk"><span class="text-dark"></span></td>
										</tr>






									</tbody>
								</table>
								<hr>

								<table class="table table-lg" id="pjsk_ska">
									<h6 class="text-semibold"><span class="text-dark">Data SKA</span></h6>
									<thead>
										<tr>
											<th>Nama</th>
											<th>NIK</th>
											<th>Sub Bidang</th>
											<th>Noreg</th>
											<th>Kualifikasi</th>
											<th>Tgl Habis</th>
											<th>Link Sertifikat Digital</th>
										</tr>
									</thead>
									<tbody>







									</tbody>
								</table>
								<table class="table table-lg" id="pjsk_skt">
									<h6 class="text-semibold"><span class="text-dark">Data SKT</span></h6>
									<thead>
										<tr>
											<th>Nama</th>
											<th>NIK</th>
											<th>Sub Bidang</th>
											<th>Noreg</th>
											<th>Kualifikasi</th>
											<th>Tgl Habis</th>
											<th>Link Sertifikat Digital</th>
										</tr>
									</thead>
									<tbody>







									</tbody>
								</table>
							</div>
							<!--end::Timeline-->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(".file-skk_pjt").fileinput({
			maxFileSize: 20000,
			allowedFileExtensions: ['jpg', 'png', 'pdf'],
			showUpload: false,
			dropZoneEnabled: false
		});
		$(".file-skk_pjt_sk").fileinput({
			maxFileSize: 20000,
			allowedFileExtensions: ['jpg', 'png', 'pdf'],
			showUpload: false,
			dropZoneEnabled: false
		});

		$(".file-skk_pjsk").fileinput({
			maxFileSize: 20000,
			allowedFileExtensions: ['jpg', 'png', 'pdf'],
			showUpload: false,
			dropZoneEnabled: false
		});
		$(".file-skk_pjsk_sk").fileinput({
			maxFileSize: 20000,
			allowedFileExtensions: ['jpg', 'png', 'pdf'],
			showUpload: false,
			dropZoneEnabled: false
		});
		$(".file-kantor").fileinput({
			maxFileSize: 20000,
			allowedFileExtensions: ['jpg', 'png', 'pdf'],
			showUpload: false,
			dropZoneEnabled: false
		});

		$(document).keyup(function(event) {
			if (event.key == "Enter") {
				alert('Silahkan Gunakan Tombol!');
			}
		});
	</script>
	<script type="text/javascript">
		$(".file-smap").fileinput({
			maxFileSize: 20000,
			allowedFileExtensions: ['jpg', 'png', 'pdf'],
			showUpload: false,
			dropZoneEnabled: false
		});

		$(".file-ss").fileinput({
			maxFileSize: 20000,
			allowedFileExtensions: ['jpg', 'png', 'pdf'],
			showUpload: false,
			dropZoneEnabled: false
		});
		$(".file-asosiasi").fileinput({
			maxFileSize: 20000,
			allowedFileExtensions: ['jpg', 'png', 'pdf'],
			showUpload: false,
			dropZoneEnabled: false
		});
		var submitCounter = 0;
		$(function() {
			var uploadURI = $('#form-upload-1').attr('action');
			var progressBar = $('#progress-bar-1');

			$("form#form-upload-1").submit(function() {





				// make sure there is file to upload
				if (document.getElementById("file_ss").files.length != 0 && document.getElementById(
						"file_kantor").files.length != 0) {
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
							success: function(data) {

							},
							xhr: function() {
								var xhr = new XMLHttpRequest();
								xhr.upload.addEventListener("progress", function(event) {
									if (event.lengthComputable) {
										var percentComplete = Math.round((event.loaded /
											event.total) * 100);
										// console.log(percentComplete);

										$('.progress').show();
										if (percentComplete >= 97) {
											progressBar.text('- Harap Tunggu -');
										} else {
											progressBar.text(percentComplete + '%');
										}
										progressBar.css({
											width: percentComplete + "%"
										});
									};
								}, false);
								return xhr;
							}
						});
					} else {
						toastr["warning"]("This is can be clicked only once.", "Notification");


					}
				} else {
					toastr["warning"]("File * Harus dilampirkan", "Notification");
				}

			});
			$('body').on('change.bs.fileinput', function(e) {
				$('.progress').hide();
				progressBar.text("0%");
				progressBar.css({
					width: "0%"
				});
			});
		});
	</script>
	<script type="text/javascript">
		$(".file-akte").fileinput({
			maxFileSize: 20000,
			allowedFileExtensions: ['jpg', 'png', 'pdf'],
			showUpload: false,
			dropZoneEnabled: false
		});


		var submitCounter = 0;
		$(function() {
			var uploadURI = $('#form-upload-2').attr('action');
			var progressBar = $('#progress-bar-2');

			$("form#form-upload-2").submit(function() {





				// make sure there is file to upload
				if (document.getElementById("file_akte").files.length != 0) {
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
							success: function(data) {

							},
							xhr: function() {
								var xhr = new XMLHttpRequest();
								xhr.upload.addEventListener("progress", function(event) {
									if (event.lengthComputable) {
										var percentComplete = Math.round((event.loaded /
											event.total) * 100);
										// console.log(percentComplete);

										$('.progress').show();
										if (percentComplete >= 97) {
											progressBar.text('- Harap Tunggu -');
										} else {
											progressBar.text(percentComplete + '%');
										}
										progressBar.css({
											width: percentComplete + "%"
										});
									};
								}, false);
								return xhr;
							}
						});
					} else {
						toastr["warning"]("This is can be clicked only once.", "Notification");


					}
				} else {
					toastr["warning"]("File * Harus dilampirkan", "Notification");
				}

			});
			$('body').on('change.bs.fileinput', function(e) {
				$('.progress').hide();
				progressBar.text("0%");
				progressBar.css({
					width: "0%"
				});
			});
		});
	</script>
	<script type="text/javascript">
		$(".file-neraca").fileinput({
			maxFileSize: 20000,
			allowedFileExtensions: ['jpg', 'png', 'pdf'],
			showUpload: false,
			dropZoneEnabled: false
		});


		var submitCounter = 0;
		$(function() {
			var uploadURI = $('#form-upload-3').attr('action');
			var progressBar = $('#progress-bar-3');

			$("form#form-upload-3").submit(function() {





				// make sure there is file to upload
				if (document.getElementById("file_neraca").files.length != 0) {
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
							success: function(data) {

							},
							xhr: function() {
								var xhr = new XMLHttpRequest();
								xhr.upload.addEventListener("progress", function(event) {
									if (event.lengthComputable) {
										var percentComplete = Math.round((event.loaded /
											event.total) * 100);
										// console.log(percentComplete);

										$('.progress').show();
										if (percentComplete >= 97) {
											progressBar.text('- Harap Tunggu -');
										} else {
											progressBar.text(percentComplete + '%');
										}
										progressBar.css({
											width: percentComplete + "%"
										});
									};
								}, false);
								return xhr;
							}
						});
					} else {
						toastr["warning"]("This is can be clicked only once.", "Notification");


					}
				} else {
					toastr["warning"]("File * Harus dilampirkan", "Notification");
				}

			});
			$('body').on('change.bs.fileinput', function(e) {
				$('.progress').hide();
				progressBar.text("0%");
				progressBar.css({
					width: "0%"
				});
			});
		});
	</script>
	<script type="text/javascript">
		var submitCounter = 0;
		$(function() {
			var uploadURI = $('#form-upload-4').attr('action');
			var progressBar = $('#progress-bar-4');

			$("form#form-upload-4").submit(function() {





				// make sure there is file to upload
				if (document.getElementById("file_skk_sk").files.length != 0 && document.getElementById(
						"file_skk_sk").files.length != 0 && document.getElementById("file_skk_pjtbu").files
					.length != 0) {
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
							success: function(data) {

							},
							xhr: function() {
								var xhr = new XMLHttpRequest();
								xhr.upload.addEventListener("progress", function(event) {
									if (event.lengthComputable) {
										var percentComplete = Math.round((event.loaded /
											event.total) * 100);
										// console.log(percentComplete);

										$('.progress').show();
										if (percentComplete >= 97) {
											progressBar.text('- Harap Tunggu -');
										} else {
											progressBar.text(percentComplete + '%');
										}
										progressBar.css({
											width: percentComplete + "%"
										});
									};
								}, false);
								return xhr;
							}
						});
					} else {
						toastr["warning"]("This is can be clicked only once.", "Notification");


					}
				} else {
					toastr["warning"]("File * Harus dilampirkan", "Notification");
				}

			});
			$('body').on('change.bs.fileinput', function(e) {
				$('.progress').hide();
				progressBar.text("0%");
				progressBar.css({
					width: "0%"
				});
			});
		});
	</script>
	<script type="text/javascript">
		var submitCounter = 0;
		$(function() {
			var uploadURI = $('#form-upload-5').attr('action');
			var progressBar = $('#progress-bar-5');

			$("form#form-upload-5").submit(function() {





				// make sure there is file to upload
				if (document.getElementById("file_skk_pjsk").files.length != 0 && document.getElementById(
						"file_skk_sk_pjskbu").files.length != 0 && document.getElementById("file_skk_pjtbu")
					.files.length != 0) {
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
							success: function(data) {

							},
							xhr: function() {
								var xhr = new XMLHttpRequest();
								xhr.upload.addEventListener("progress", function(event) {
									if (event.lengthComputable) {
										var percentComplete = Math.round((event.loaded /
											event.total) * 100);
										// console.log(percentComplete);

										$('.progress').show();
										if (percentComplete >= 97) {
											progressBar.text('- Harap Tunggu -');
										} else {
											progressBar.text(percentComplete + '%');
										}
										progressBar.css({
											width: percentComplete + "%"
										});
									};
								}, false);
								return xhr;
							}
						});
					} else {
						toastr["warning"]("This is can be clicked only once.", "Notification");


					}
				} else {
					toastr["warning"]("File * Harus dilampirkan", "Notification");
				}

			});
			$('body').on('change.bs.fileinput', function(e) {
				$('.progress').hide();
				progressBar.text("0%");
				progressBar.css({
					width: "0%"
				});
			});
		});
	</script>
	<script type="text/javascript">
		var submitCounter = 0;
		$(function() {
			var uploadURI = $('#form-upload-6').attr('action');
			var progressBar = $('#progress-bar-6');

			$("form#form-upload-6").submit(function() {





				// make sure there is file to upload
				if (document.getElementById("file_smap").files.length != 0) {
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
							success: function(data) {

							},
							xhr: function() {
								var xhr = new XMLHttpRequest();
								xhr.upload.addEventListener("progress", function(event) {
									if (event.lengthComputable) {
										var percentComplete = Math.round((event.loaded /
											event.total) * 100);
										// console.log(percentComplete);

										$('.progress').show();
										if (percentComplete >= 97) {
											progressBar.text('- Harap Tunggu -');
										} else {
											progressBar.text(percentComplete + '%');
										}
										progressBar.css({
											width: percentComplete + "%"
										});
									};
								}, false);
								return xhr;
							}
						});
					} else {
						toastr["warning"]("This is can be clicked only once.", "Notification");


					}
				} else {
					toastr["warning"]("File * Harus dilampirkan", "Notification");
				}

			});
			$('body').on('change.bs.fileinput', function(e) {
				$('.progress').hide();
				progressBar.text("0%");
				progressBar.css({
					width: "0%"
				});
			});
		});
	</script>
	<script type="text/javascript">
		function getval(sel) {
			const divHide = document.getElementById("display_akte");
			console.log('aa');
			if (sel.value == 'ada') {
				divHide.style.display = 'block';
			} else {
				divHide.style.display = 'none';
			}
		}

		function getval_neraca(sel) {
			const divHide = document.getElementById("display_neraca");
			console.log('aa');
			if (sel.value == 'ada') {
				divHide.style.display = 'block';
			} else {
				divHide.style.display = 'none';
			}
		}


		var cek = '<?= $data_check['
		status ']; ?>';

		function myFunction() {
			document.getElementById("tombol_cek").click();
		}
		// $(document).ready( function () {
		//
		// 	if(cek=='FALSE'){
		// 		myFunction();
		// 	}
		//
		// });
		function check_pjsk(sel) {
			//$('#timeline').html('');
			var id_izin_value = sel.name;
			var counter = 1;
			var counter2 = 1;
			jQuery.ajax({
				url: "<?= base_url('sertifikasi/get_pjsk_asesor') ?>",
				type: "POST",
				data: {
					id_izin: id_izin_value,
				},
				success: function(data) {
					response = jQuery.parseJSON(data);
					record = response.responses_data;
					record2 = record.data;
					record3 = record2[0].badan_usaha;
					console.log(record2);

					document.getElementsByClassName("nama_pjsk")[0].textContent = record2.nama;
					document.getElementsByClassName("nik_pjsk")[0].textContent = record2.nik;
					document.getElementsByClassName("nbu_pjsk")[0].textContent = record3.nama_badan_usaha;
					document.getElementsByClassName("npwp_pjsk")[0].textContent = record3.npwp_badan_usaha;
					var table = document.getElementById("pjsk_ska");
					while (table.rows.length > 1) {
						table.deleteRow(1);
					}
					var array = record2;
					if (typeof array != "undefined" && array != null && array.length != null && array.length >
						0) {

						array.forEach(function(element) {

							element.ska.forEach(function(elementx) {
								var row = table.insertRow(counter);
								var cell1 = row.insertCell(0);
								var cell2 = row.insertCell(1);
								var cell3 = row.insertCell(2);
								var cell4 = row.insertCell(3);
								var cell5 = row.insertCell(4);
								var cell6 = row.insertCell(5);
								var cell7 = row.insertCell(6);

								counter += 1;
								cell1.innerHTML = element.nama;
								cell2.innerHTML = element.nik;
								cell3.innerHTML = elementx.id_sub_bidang;
								cell4.innerHTML = elementx.no_reg;
								cell5.innerHTML = elementx.id_Kualifikasi_profesi;
								cell6.innerHTML = elementx.tgl_habis;
								cell7.innerHTML = elementx.link_sertifikat_digital;
							});
						});
					}
					var table2 = document.getElementById("pjsk_skt");
					while (table2.rows.length > 1) {
						table2.deleteRow(1);
					}
					var array2 = record2;
					if (typeof array2 != "undefined" && array2 != null && array2.length != null && array2.length >
						0) {

						array2.forEach(function(element) {

							element.skt.forEach(function(elementx) {
								var row2 = table2.insertRow(counter2);
								var cell1 = row2.insertCell(0);
								var cell2 = row2.insertCell(1);
								var cell3 = row2.insertCell(2);
								var cell4 = row2.insertCell(3);
								var cell5 = row2.insertCell(4);
								var cell6 = row2.insertCell(5);
								var cell7 = row2.insertCell(6);

								counter += 1;
								cell1.innerHTML = element.nama;
								cell2.innerHTML = element.nik;
								cell3.innerHTML = elementx.id_sub_bidang;
								cell4.innerHTML = elementx.no_reg;
								cell5.innerHTML = elementx.id_Kualifikasi_profesi;
								cell6.innerHTML = elementx.tgl_habis;
								cell7.innerHTML = elementx.link_sertifikat_digital;
							});
						});
					}




				},
				error: function(xhr, status, error) {
					var err = eval("(" + xhr.responseText + ")");
					alert(err.Message);
				}
			});
		}

		function check_pjt(sel) {
			//$('#timeline').html('');
			var id_izin_value = sel.name;
			var counter = 1;
			var counter2 = 1;
			jQuery.ajax({
				url: "<?= base_url('sertifikasi/get_pjt_asesor') ?>",
				type: "POST",
				data: {
					id_izin: id_izin_value,
				},
				success: function(data) {
					response = jQuery.parseJSON(data);
					record = response.responses_data;
					record2 = record.data;
					record3 = record2.badan_usaha;
					console.log(response.responses_data);

					document.getElementsByClassName("nama")[0].textContent = record2.nama;
					document.getElementsByClassName("nik")[0].textContent = record2.nik;
					document.getElementsByClassName("nbu")[0].textContent = record3.nama_badan_usaha;
					document.getElementsByClassName("npwp")[0].textContent = record3.npwp_badan_usaha;
					var table = document.getElementById("pjt_ska");
					while (table.rows.length > 1) {
						table.deleteRow(1);
					}
					var array = record2.ska;
					if (typeof array != "undefined" && array != null && array.length != null && array.length >
						0) {
						array.forEach(function(element) {
							var row = table.insertRow(counter);
							var cell1 = row.insertCell(0);
							var cell2 = row.insertCell(1);
							var cell3 = row.insertCell(2);
							var cell4 = row.insertCell(3);
							var cell5 = row.insertCell(4);

							counter += 1;
							cell1.innerHTML = element.id_sub_bidang;
							cell2.innerHTML = element.no_reg;
							cell3.innerHTML = element.id_Kualifikasi_profesi;
							cell4.innerHTML = element.tgl_habis;
							cell5.innerHTML = element.link_sertifikat_digital;

						});
					}

					var table2 = document.getElementById("pjt_skt");
					while (table2.rows.length > 1) {
						table2.deleteRow(1);
					}
					var array2 = record2.skt;
					if (typeof array2 != "undefined" && array2 != null && array.length != null && array2.length >
						0) {
						array2.forEach(function(element) {
							var row2 = table2.insertRow(counter2);
							var cell1 = row2.insertCell(0);
							var cell2 = row2.insertCell(1);
							var cell3 = row2.insertCell(2);
							var cell4 = row2.insertCell(3);
							var cell5 = row2.insertCell(4);

							counter += 1;
							cell1.innerHTML = element.id_sub_bidang;
							cell2.innerHTML = element.no_reg;
							cell3.innerHTML = element.id_Kualifikasi_profesi;
							cell4.innerHTML = element.tgl_habis;
							cell5.innerHTML = element.link_sertifikat_digital;

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
	<script>
		function kembalikan(sel) {
			var id_izin_value = sel.name;
			var sub_klasifikasi_value = sel.id;
			Swal.fire({
				title: "Anda ingin mengembalikan berkas " + sub_klasifikasi_value + " ?",
				text: "Proses akan mengembalikan berkas dan mengirimkan notifikasi bahwa permohonan " +
					sub_klasifikasi_value + " dikembalikan karena PJSK sudah dipakai BUJK lain",
				icon: "warning",
				showCancelButton: true,
				confirmButtonText: "YA !",
				cancelButtonText: "No, Batalkan!",
				reverseButtons: true
			}).then(function(result) {
				if (result.value) {
					Swal.fire({
						title: "Mohon Tunggu!",
						text: "Sedang Berjalan",
						onOpen: function() {
							Swal.showLoading();

						}
					});
					jQuery.ajax({
						url: "<?= base_url('sertifikasi/pengembalian_berkas_izin') ?>",
						type: "POST",
						data: {
							id_izin: id_izin_value,
							id_sub_klasifikasi: sub_klasifikasi_value
						},
						success: function(data) {
							response = jQuery.parseJSON(data);
							Swal.fire(
								'Success',
								'Data permohonan berhasil dikembalikan!',
								'success'
							);
							console.log(response);
							if (response.status == 'FALSE') {
								window.location.reload();
							} else {
								window.location.replace(
									"<?= base_url('sertifikasi/list_tinjauan_permohonan'); ?>");

							}

						},
						error: function(xhr, status, error) {
							var err = eval("(" + xhr.responseText + ")");
							alert(err.Message);
						}
					});


				} else if (result.dismiss === "cancel") {
					Swal.fire(
						"Cancelled",
						"Pengembalian Berkas di batalkan :)",
						"error"
					)
				}
			});
		}

		function kembalikan_permohonan(sel) {
			var nib_value = sel.name;
			var tgl_value = sel.id;
			Swal.fire({
				title: "Anda ingin mengembalikan berkas permohonan ?",
				text: "Proses akan mengembalikan berkas dan mengirimkan notifikasi bahwa permohonan dikembalikan karena PJTBU sudah dipakai BUJK lain",
				icon: "warning",
				showCancelButton: true,
				confirmButtonText: "YA !",
				cancelButtonText: "No, Batalkan!",
				reverseButtons: true
			}).then(function(result) {
				if (result.value) {
					Swal.fire({
						title: "Mohon Tunggu!",
						text: "Sedang Berjalan",
						onOpen: function() {
							Swal.showLoading();

						}
					});
					jQuery.ajax({
						url: "<?= base_url('sertifikasi/pengembalian_berkas_permohonan') ?>",
						type: "POST",
						data: {
							nib: nib_value,
							tgl_permohonan: tgl_value
						},
						success: function(data) {
							response = jQuery.parseJSON(data);
							Swal.fire(
								'Success',
								'Data Survailen Berhasil Dikirim!',
								'success'
							);
							location.reload();

						},
						error: function(xhr, status, error) {
							var err = eval("(" + xhr.responseText + ")");
							alert(err.Message);
						}
					});


				} else if (result.dismiss === "cancel") {
					Swal.fire(
						"Cancelled",
						"Pengembalian Berkas di batalkan :)",
						"error"
					)
				}
			});
		}

		function submit(sel) {
			var id_izin_value = document.getElementById("id_izinxc").value;
			var nib_value = document.getElementById("nibxc").value;


			Swal.fire({
				title: "Anda ingin mengajukan permohonan Survailen ?",
				text: "Proses akan mengirim pengajuan Data Survailen anda ke LSBU GAPEKNAS untuk di Tinjau!",
				icon: "warning",
				showCancelButton: true,
				confirmButtonText: "YA !",
				cancelButtonText: "No, Batalkan!",
				reverseButtons: true
			}).then(function(result) {
				if (result.value) {
					Swal.fire({
						title: "Mohon Tunggu!",
						text: "Sedang Berjalan",
						onOpen: function() {
							Swal.showLoading();

						}
					});
					jQuery.ajax({
						url: "<?= base_url('survailen/submit_permohonan') ?>",
						type: "POST",
						data: {
							nib: nib_value,
							id_izin: id_izin_value
						},
						success: function(data) {
							response = jQuery.parseJSON(data);
							console.log(response);
							Swal.fire(
								'Success',
								'Data Survailen Berhasil Dikirim!',
								'success'
							);
							location.reload();

						},
						error: function(xhr, status, error) {
							var err = eval("(" + xhr.responseText + ")");
							alert(err.Message);
						}
					});


				} else if (result.dismiss === "cancel") {
					Swal.fire(
						"Cancelled",
						"Verifikasi di batalkan :)",
						"error"
					)
				}
			});


		}

		function copy() {
			var copyText = document.getElementById("copy");

			/* Select the text field */
			copyText.select();
			copyText.setSelectionRange(0, 99999); /* For mobile devices */

			/* Copy the text inside the text field */
			navigator.clipboard.writeText(copyText.value);
			$(function() {
				toastr["success"]("Link berhasi di copy", "Success")


			});
		}
	</script>