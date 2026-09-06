<link href="<?=base_url('assets/fileinput/css/fileinput.css') ;?>" media="all" rel="stylesheet" type="text/css" />
<link href="<?=base_url('assets/fileinput/themes/explorer-fas/theme.css') ;?>" media="all" rel="stylesheet"
	type="text/css" />

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



						<a href="<?= base_url('survailen/cetak_penilaian_tinjauan/'.$id1) ;?>" target="_blank"
							class="btn btn-dark font-weight-bolder">
							<i class="la la-plus"></i>Cetak Penilaian</a>

					</div>

				</div>

				<div class="card-body">

					<div class="row">
						<div class="col-md-6">
							<br>
							<div class="card card-custom bgi-no-repeat gutter-b"
								style="height: 100px; background-color: #663259; background-position: calc(100% + 0.5rem) 100%; background-size: 75% auto; background-image: url(<?=base_url();?>assets/media/svg/patterns/taieri.svg)">
								<!--begin::Body-->
								<div class="card-body d-flex align-items-center">
									<div>

										<h3 class="text-white font-weight-bolder line-height-lg mb-5">Checking PJT &
											PJSK</h3>
										<a href='#' data-toggle="modal" data-target="#exampleModal" id="tombol_cek"
											class="btn btn-success font-weight-bold px-6 py-3">Check</a>
									</div>
								</div>
								<!--end::Body-->
							</div>

						</div>
						<div class="col-md-6">
							<br>

						</div>
					</div>
					<br>
					<div class="example mb-10">
						<input type="hidden" id="base_url"
							value="<?php echo base_url('sertifikasi/permintaan_revisi') ;?>">

						<div class="example-preview">
							<ul class="nav nav-pills" id="myTab1" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="profile-tab-1" data-toggle="tab"
										href="#klasifikasi_kualifikasi" aria-controls="profile">
										<span class="nav-icon active">
											<i class="flaticon2-open-text-book"></i>
										</span>
										<span class="nav-text">Klasifikasi</span>
									</a>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
										aria-haspopup="true" aria-expanded="false">
										<span class="nav-icon">
											<i class="flaticon2-rocket-1"></i>
										</span>
										<span class="nav-text">Administrasi</span>
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item " data-toggle="tab"
											href="#administrasi">Administrasi</a>
										<a class="dropdown-item" data-toggle="tab" href="#pengurus">Pengurus</a>
										<a class="dropdown-item" data-toggle="tab" href="#akte">Akte</a>

									</div>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="contact-tab-1" data-toggle="tab" href="#pengalaman"
										aria-controls="contact">
										<span class="nav-icon">
											<i class="flaticon2-rocket-1"></i>
										</span>
										<span class="nav-text">Penjualan Tahunan</span>
									</a>
								</li>

								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
										aria-haspopup="true" aria-expanded="false">
										<span class="nav-icon">
											<i class="flaticon2-rocket-1"></i>
										</span>
										<span class="nav-text">Kemampuan Keuangan</span>
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" data-toggle="tab" href="#pemegang_saham">Pemegang
											Saham</a>
										<a class="dropdown-item" data-toggle="tab" href="#neraca">Neraca</a>

									</div>
								</li>

								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
										aria-haspopup="true" aria-expanded="false">
										<span class="nav-icon">
											<i class="flaticon2-rocket-1"></i>
										</span>
										<span class="nav-text">Tenaga Kerja</span>
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" data-toggle="tab" href="#pjbu">PJBU</a>
										<a class="dropdown-item" data-toggle="tab" href="#pjtbu">PJTBU</a>
										<a class="dropdown-item" data-toggle="tab" href="#pjskbu">PJSKBU</a>


									</div>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
										aria-haspopup="true" aria-expanded="false">
										<span class="nav-icon">
											<i class="flaticon2-rocket-1"></i>
										</span>
										<span class="nav-text">Peralatan</span>
									</a>
									<div class="dropdown-menu dropdown-menu-right">

										<a class="dropdown-item" data-toggle="tab" href="#peralatan">Peralatan</a>
										<a class="dropdown-item" data-toggle="tab"
											href="#kepemilikan_peralatan">Kepemilikan Peralatan</a>

									</div>
								</li>

								<li class="nav-item">
									<a class="nav-link" id="contact-tab-1" data-toggle="tab" href="#smap"
										aria-controls="contact">
										<span class="nav-icon">
											<i class="flaticon2-rocket-1"></i>
										</span>
										<span class="nav-text">SMAP</span>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="contact-tab-1" data-toggle="tab" href="#submit_final"
										aria-controls="contact">
										<span class="nav-icon">
											<i class="flaticon2-rocket-1"></i>
										</span>
										<span class="nav-text">Pemantauan Tindak Lanjut Surveilan</span>
									</a>
								</li>

							</ul>

							<div class="tab-content mt-5" id="myTabContent1">
								<div class="tab-pane fade" id="submit_final" role="tabpanel"
									aria-labelledby="home-tab-1">

									<div class="col-md-12">
										<div class="panel panel-flat panel-collapsed">
											<div class="panel-heading">
												<h5 class="panel-title">Penilaian Survailen</h5>
												<div class="heading-elements">

												</div>
											</div>


										</div>
									</div>
									<input type="hidden" id="count_nomer" value="0">
									<div class="col-md-12">
										<div class="table-responsive">
											<?php echo form_open_multipart(base_url('survailen/insert_penilaian'), 'method="POST"');?>
											<table class="table table-lg">
												<thead>
													<tr>
														<th>Point Penilaian</th>
														<th>Penilaian Asesor</th>

													</tr>
												</thead>
												<tbody>
													<tr>
														<td>#Tgl Pelaksanaan </td>
														<td>
															<div class="input-group file-caption-main">
																<span class="file-caption-icon"></span>
																<input id="tgl_1" type="text" name="tgl_pelaksanaan"
																	class="form-control form-control-solid"
																	value="<?=date("Y-m-d")?>">

															</div>
														</td>

													</tr>
													<input type="hidden" name="id1" value="<?php echo $id1 ;?>">
													<input type="hidden" name="id2" value="<?php echo $id2 ;?>">
													<tr>
														<td>#Tempat Pelaksanaan </td>
														<td>
															<div class="input-group file-caption-main">
																<span class="file-caption-icon"></span>
																<input type="text" name="tempat_pelaksanaan"
																	class="form-control form-control-solid"
																	value="<?php echo $biodata[0]['id_propinsi'] ;?>">

															</div>
														</td>

													</tr>
													<tr>
														<td>#Ketidaksesuaian <br>(Dirulis secara jekas, terukur dan
															tidak mengambang)</td>
														<td>
															<div class="input-group file-caption-main">
																<span class="file-caption-icon"></span>
																<textarea name="ketidaksesuaian" id="ketidaksesuaian"
																	class="form-control form-control-solid"
																	rows="5"> <?=$penilaian[0]['ketidaksesuaian']?></textarea>


															</div>
														</td>

													</tr>
													<tr>
														<td>#Referensi</td>
														<td>
															<div class="input-group file-caption-main">
																<span class="file-caption-icon"></span>
																<textarea name="referensi"
																	class="form-control form-control-solid" rows="5">
																		PERATURAN MENTERI PUPR NOMOR 08 TAHUN 2022; 
																		KEPUTUSAN DIRJEN BINA KONSTRUKSI NOMOR 144 TAHUN 2022; 
																		SKEMA SERTIFIKASI </textarea>


															</div>
														</td>

													</tr>
													<tr>
														<td>#Rencana Perbaikan</td>
														<td>
															<div class="input-group file-caption-main">
																<span class="file-caption-icon"></span>
																<textarea name="rencana_perbaikan" id="rencana_perbaikan"
																	class="form-control form-control-solid"
																	rows="5">3 BULAN </textarea>


															</div>
														</td>

													</tr>
													<tr>
														<td>#Tgl Selesai</td>

														<td>
															<div class="input-group file-caption-main">
																<span class="file-caption-icon"></span>
																<input id="tgl_2" type="text" name="tgl_selesai"
																	class="form-control form-control-solid"
																	value="<?=date("Y-m-d")?>">

															</div>
														</td>

													</tr>
													<tr>
														<td>#Jenis Temuan</td>
														<td>
															<div class="input-group file-caption-main">
															<select name="jenis_temuan" id="jenis_temuan"
																	class="form-control h-auto form-control-solid py-4 px-8"
																	required="required" onchange="getval(this)">
																	<option value="-">Pilih Jenis Termuan</option>
																	<option value="1">Sesuai</option>
																	<option value="0">Tidak Sesuai</option>

																</select>

															</div>
														</td>

													</tr>
													<tr>
														<td>#Hasil Akhir </td>
														<td>
															<div class="input-group file-caption-main">
																<select name="hasil_akhir" id="hasil_akhir"
																	class="form-control h-auto form-control-solid py-4 px-8"
																	required="required">
																	<option value="1">Sesuai</option>
																	<option value="0">Perlu Perbaikan</option>

																</select>

															</div>
														</td>

													</tr>
													<tr>
														<td>#Hasil Perbaikan/Tindak Lanjut </td>
														<td>
															<div class="input-group file-caption-main">
																<select name="hasil_akhir"
																	class="form-control h-auto form-control-solid py-4 px-8"
																	required="required" onchange="getval2(this)">
																	<option value="-">Pilih Hasil Perbaikan</option>
																	<option value="1">Memenuhi</option>
																	<option value="0">Tidak Memenuhi</option>

																</select>

															</div>
														</td>

													</tr>
													





												</tbody>
											</table>
											<button target="_blank" type="submit" name="submit" style="float: right"
												class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
														class="icon-paperplane"></i></b>
												Submit Penilaian</button>

											<?php echo form_close() ;?>
										</div>
									</div>
								</div>
								<?php $counter_pengurus=0;
								$counter_pengalaman=0;
								$counter_akte=0;
								$counter_sk=0;
								$counter_pjskbu=0;
								$counter_pjtbu=0;
								$counter_peralatan=0;
								$counter_saham=0;
								$counter_neraca=0;
								$counter_tk=0;
								$counter_klasifikasi=0;
								$counter_kepemilikan_peralatan=0;?>
								<div class="tab-pane fade" id="administrasi" role="tabpanel"
									aria-labelledby="home-tab-1">
									<?php if(!empty($biodata)) :?>
									<div class="col-md-12">
										<div class="panel panel-flat panel-collapsed">
											<div class="panel-heading">
												<h5 class="panel-title">Personalia</h5>
												<div class="heading-elements">

												</div>
											</div>

											<div class="panel-body">
												<!--
														<div class="row">
															<div class="col-md-3">
																<div class="content-group-lg">
																	<h6 class="text-semibold">#1</h6>
																	<p class="content-group">File NIB</p>
																</div>
															</div>

															<div class="col-md-1">
																<font class="text-semibold" style="font-size: 11px;">Tidak/Ada</font>
																<span class="switch switch-outline switch-icon switch-primary">

																	<label>
																		<input type="checkbox" checked="checked" id="checkbox_1" value="1" onclick="javascript:checkbox1()" name="checkbox_1" />
																		<span></span>
																	</label>
																</span>

															</div>
															<div class="col-md-2">
																<br>
																<a href="<?= $biodata[0]['file_nib'] ;?>" target="_blank" type="button" name="btn_cek_13"  style="float: right" class="open-delete btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
															</div>
																<div class="col-md-6">
																	<br>
																	<div class="input-group file-caption-main">
																		<span class="file-caption-icon"></span>
																		<input type="text" id="comment_1" name="comment_1"   class="form-control" disabled="disabled" placeholder="Comment...">


																	<div class="input-group-btn input-group-append">
																		<button type="button" onclick="javascript:get1()" id="get_1"  disabled="disabled" class="btn btn-dark btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
																			</div>
																	</div>
																</div>
														</div>

														<div class="row">
															<div class="col-md-3">
																<div class="content-group-lg">
																	<h6 class="text-semibold">#2</h6>
																	<p class="content-group">NPWP Perusahaan</p>
																</div>
															</div>

															<div class="col-md-1">
																<font class="text-semibold" style="font-size: 11px;">Tidak/Ada</font>
																<span class="switch switch-outline switch-icon switch-primary">

																	<label>
																		<input type="checkbox" checked="checked" id="checkbox_2" value="1" onclick="javascript:checkbox2()" name="checkbox_2" />
																		<span></span>
																	</label>
																</span>

															</div>
															<div class="col-md-2">
																<br>
																<a href="<?= $biodata[0]['file_npwp'] ;?>" target="_blank" type="button" name="btn_cek_11"  style="float: right" class="open-delete btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
															</div>
																<div class="col-md-6">
																	<br>
																	<div class="input-group file-caption-main">
																		<span class="file-caption-icon"></span>
																		<input type="text" id="comment_2" name="comment_2"   class="form-control" disabled="disabled" placeholder="Comment...">


																	<div class="input-group-btn input-group-append">
																		<button type="button" onclick="javascript:get2()" id="get_2"  disabled="disabled" class="btn btn-dark btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
																	</div>
																	</div>
																</div>
														</div>-->





											</div>
										</div>
									</div>

									<hr>
									<br>
									<div class="row">
										<div class="col-md-6">
											<div class="card card-custom bg-info">
												<div class="card-header border-0">
													<div class="card-title">
														<span class="card-icon">
															<i class="flaticon2-chat-1 text-white"></i>
														</span>
														<h3 class="card-label text-white">KEANGGOTAAN ASOSIASI</h3>
													</div>

												</div>
												<div class="separator separator-solid separator-white opacity-20">

												</div>
												<div class="card-header border-0">
													<div class="card-title">
														<span class="card-icon">
															<i class="flaticon2-chat-1 text-white"></i>
														</span>
														<select onchange="javascript:check_anggota(this)"
															id="penilaian_anggota" class="form-control">

															<option value="1">KTA Asosiasi Berlaku</option>
															<option value="2">KTA Asosiasi Habis masa berlaku</option>
														</select>


													</div>




												</div>
												<div class="card bg-info">
													<div class="table-responsive bg-info">

														<table class="table table-lg bg-info">
															<thead>
																<tr>
																	<th><textarea id="keanggotaan_asosiasi"
																			class="form-control form-control-solid"
																			rows="5"></textarea></th>
																	<th><button type="button" onclick="submit_anggota()"
																			name="btn_cek_11" style="float: right"
																			class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																					class="icon-file-check"></i></b>
																			Submit</button></th>

																</tr>
															</thead>
														</table>
													</div>
												</div>





											</div>
											<br>
											<hr>
											<div class="card">
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
																<td>SPTJM</td>
																<td><a <?php if($biodata[0]['sptjm']!='') :?>href="<?= $biodata[0]['sptjm'] ;?>"
																		<?php else :?>href="<?= base_url('not_found') ;?>"
																		<?php endif ;?> target="_blank" type="button"
																		name="btn_cek_11" style="float: right"
																		class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																				class="icon-file-check"></i></b>
																		Softcopy</a>
																</td>

															</tr>
															<tr>
																<td>Nama Badan Usaha</td>
																<td><span
																		class="text-dark"><?php echo $biodata[0]['nama'] ;?></span>
																</td>

															</tr>
															<tr>
																<td>NIB</td>
																<td><span
																		class="text-dark"><?php echo $biodata[0]['NIB'] ;?></span>
																</td>

															</tr>
															<tr>
																<td>NPWP</td>
																<td><span
																		class="text-dark"><?php echo $biodata[0]['npwp'] ;?></span>
																</td>

															</tr>
															<tr>
																<td>Bentuk Usaha</td>
																<td><span
																		class="text-dark"><?php echo $biodata[0]['bentuk_usaha'] ;?></span>
																</td>

															</tr>

															<tr>
																<td>Klasifikasi Jenis Usaha</td>
																<td><span
																		class="text-dark"><?php echo $biodata[0]['jenis_usaha'] ;?></span>
																</td>
															</tr>
															<tr>
																<td>Alamat Domisili Hukum</td>
																<td><span
																		class="text-dark"><?php echo $biodata[0]['alamat_bu'] ;?></span>
																</td>
															</tr>



															<tr>
															<tr>
																<td>Propinsi</td>
																<td><span
																		class="text-dark"><?php echo $biodata[0]['id_propinsi'] ;?></span>
																</td>
															</tr>
															<tr>
																<td>Kabupaten/Kota</td>
																<td><span
																		class="text-dark"><?php echo $biodata[0]['id_kabupaten'] ;?></span>
																</td>
															</tr>
															<tr>
																<td>Telepon</td>
																<td><span
																		class="text-dark"><?php echo $biodata[0]['telepon'] ;?></span>
																</td>
															</tr>
															<tr>
																<td>Hp</td>
																<td><span
																		class="text-dark"><?php echo $biodata[0]['hp'] ;?></span>
																</td>
															</tr>

															<tr>
																<td>Kodepos</td>
																<td><span
																		class="text-dark"><?php echo $biodata[0]['kodepos'] ;?></span>
																</td>
															</tr>
															<tr>
																<td>Email</td>
																<td><span
																		class="text-dark"><?php echo $biodata[0]['email'] ;?></span>
																</td>
															</tr>
															<input type="hidden" name="email"
																value="<?=$klasifikasi[0]['user_email'] ;?>">


															<tr>
																<td>Website</td>
																<td><span
																		class="text-dark"><?php echo $biodata[0]['web'] ;?></span>
																</td>
															</tr>



														</tbody>
													</table>
												</div>
											</div>
										</div>
										<?php if(!empty($biodata_perubahan)) :?>
										<div class="col-md-6">
											<div class="accordion accordion-toggle-arrow" id="accordionExample1">

												<?php foreach ($biodata_perubahan as $row_biodata) :?>
												<?php $counter_pengurus+=1 ;?>
												<div class="card">
													<div class="card-header">
														<div class="card-title collapsed" data-toggle="collapse"
															data-target="#data-pengurus-<?php echo $counter_pengurus ;?>">
															<?= $row_biodata['id_izin'].'-'.$row_biodata['id_sub_klasifikasi'].'-'.$row_biodata['kualifikasi'] ?>
														</div>
													</div>
													<div id="data-pengurus-<?php echo $counter_pengurus ;?>"
														class="collapse show" data-parent="#accordionExample1">
														<div class="card-body">
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
																			<td>SPTJM</td>
																			<td><a <?php if($row_biodata['sptjm']!='') :?>href="<?= $row_biodata['sptjm'] ;?>"
																					<?php else :?>href="<?= base_url('not_found') ;?>"
																					<?php endif ;?> target="_blank"
																					type="button" name="btn_cek_11"
																					style="float: right"
																					class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																							class="icon-file-check"></i></b>
																					Softcopy</a>
																			</td>

																		</tr>
																		<tr>
																			<td>Nama Badan Usaha</td>
																			<td><span
																					class="text-dark"><?php echo $row_biodata['nama'] ;?></span>
																			</td>

																		</tr>
																		<tr>
																			<td>NIB</td>
																			<td><span
																					class="text-dark"><?php echo $row_biodata['NIB'] ;?></span>
																			</td>

																		</tr>
																		<tr>
																			<td>NPWP</td>
																			<td><span
																					class="text-dark"><?php echo $row_biodata['npwp'] ;?></span>
																			</td>

																		</tr>
																		<tr>
																			<td>Bentuk Usaha</td>
																			<td><span
																					class="text-dark"><?php echo $row_biodata['bentuk_usaha'] ;?></span>
																			</td>

																		</tr>

																		<tr>
																			<td>Klasifikasi Jenis Usaha</td>
																			<td><span
																					class="text-dark"><?php echo $row_biodata['jenis_usaha'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Alamat Domisili Hukum</td>
																			<td><span
																					class="text-dark"><?php echo $row_biodata['alamat_bu'] ;?></span>
																			</td>
																		</tr>



																		<tr>
																		<tr>
																			<td>Propinsi</td>
																			<td><span
																					class="text-dark"><?php echo $row_biodata['id_propinsi'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Kabupaten/Kota</td>
																			<td><span
																					class="text-dark"><?php echo $row_biodata['id_kabupaten'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Telepon</td>
																			<td><span
																					class="text-dark"><?php echo $row_biodata['telepon'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Hp</td>
																			<td><span
																					class="text-dark"><?php echo $row_biodata['hp'] ;?></span>
																			</td>
																		</tr>

																		<tr>
																			<td>Kodepos</td>
																			<td><span
																					class="text-dark"><?php echo $row_biodata['kodepos'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Email</td>
																			<td><span
																					class="text-dark"><?php echo $row_biodata['email'] ;?></span>
																			</td>
																		</tr>
																		<input type="hidden" name="email"
																			value="<?=$klasifikasi[0]['user_email'] ;?>">


																		<tr>
																			<td>Website</td>
																			<td><span
																					class="text-dark"><?php echo $biodata[0]['web'] ;?></span>
																			</td>
																		</tr>



																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
												<hr>
												<?php endforeach;?>


											</div>

										</div>
										<?php endif ;?>
									</div>
									<?php endif ;?>
								</div>

								<div class="tab-pane fade show" id="smap" role="tabpanel" aria-labelledby="home-tab-1">

									<div class="col-md-12">
										<div class="panel panel-flat panel-collapsed">
											<div class="panel-heading">
												<h5 class="panel-title">SMAP</h5>
												<div class="heading-elements">

												</div>
											</div>


										</div>
									</div>
									<hr>
									<br>



									<div class="row">
										<?php if(!empty($smap)) :?>



										<div class="col-md-6">
											<div class="card card-custom bg-info">
												<div class="card-header border-0">
													<div class="card-title">
														<span class="card-icon">
															<i class="flaticon2-chat-1 text-white"></i>
														</span>
														<h3 class="card-label text-white">PEMENUHAN PENERAPAN SMAP</h3>
													</div>

												</div>
												<div class="separator separator-solid separator-white opacity-20"></div>
												<div class="card-body text-white">Sudah/Belum Pemenuhan Penerapan SMAP
													(melalui pancek KPK atau ISO 37001:2016)</div>
												<div class="card-header border-0">
													<div class="card-title">
														<span class="card-icon">
															<i class="flaticon2-chat-1 text-white"></i>
														</span>
														<select onchange="javascript:check_smap(this)"
															id="penilaian_smap" class="form-control">

															<option value="1">Sudah</option>
															<option value="2">Belum Pemenuhan Penerapan SMAP (melalui
																pancek KPK atau ISO 37001:2016)</option>
														</select>
													</div>

												</div>
												<div class="card bg-info">
													<div class="table-responsive bg-info">

														<table class="table table-lg bg-info">
															<thead>
																<tr>
																	<th><textarea id="smap_check"
																			class="form-control form-control-solid"
																			rows="5"></textarea></th>
																	<th><button type="button" onclick="submit_smap()"
																			name="btn_cek_11" style="float: right"
																			class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																					class="icon-file-check"></i></b>
																			Submit</button></th>

																</tr>
															</thead>
														</table>
													</div>
												</div>
											</div>
											<br>
											<hr>
											<div class="card">
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
																<td>File SMAP </td>
																<td><a <?php if($smap[0]['file_surat_pernyataan']!='') :?>href="<?= $smap[0]['file_surat_pernyataan'] ;?>"
																		<?php else :?>href="<?= base_url('not_found') ;?>"
																		<?php endif ;?> target="_blank" type="button"
																		name="btn_cek_35" style="float: left"
																		class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																				class="icon-file-check"></i></b> Surat
																		Pernyataan</a>

																	<a <?php if($smap[0]['sertifikat_iso']!='') :?>href="<?= $smap[0]['sertifikat_iso'] ;?>"
																		<?php else :?>href="<?= base_url('not_found') ;?>"
																		<?php endif ;?> target="_blank" type="button"
																		name="btn_cek_13" style="float: right"
																		class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																				class="icon-file-check"></i></b>
																		Sertifikat </a>
																</td>
															</tr>
															<tr>
																<td>Nomor Sertifikat</td>
																<td><span
																		class="text-dark"><?php echo $smap[0]['nomor_sertifikat'] ;?></span>
																</td>

															</tr>
															<tr>
																<td>Tipe Dokumen SMAP</td>
																<td><span
																		class="text-dark"><?php echo $smap[0]['persyaratan_smap'] ;?></span>
																</td>

															</tr>




														</tbody>
													</table>
												</div>
											</div>
										</div>
										<?php endif ;?>
										<?php if(!empty($smap_perubahan)) :?>
										<div class="col-md-6">
											<div class="accordion accordion-toggle-arrow" id="accordionExample1">

												<?php foreach ($smap_perubahan as $row_smap) :?>
												<?php $counter_pengurus+=1 ;?>
												<div class="card">
													<div class="card-header">
														<div class="card-title collapsed" data-toggle="collapse"
															data-target="#data-pengurus-<?php echo $counter_pengurus ;?>">
															<?= $row_smap['id_izin'].'-'.$row_smap['id_sub_klasifikasi'].'-'.$row_smap['kualifikasi'] ?>
														</div>
													</div>
													<div id="data-pengurus-<?php echo $counter_pengurus ;?>"
														class="collapse show" data-parent="#accordionExample1">
														<div class="card-body">
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
																			<td>File SMAP </td>
																			<td><a href="<?=$row_smap['file_surat_pernyataan'] ;?>"
																					target="_blank" type="button"
																					name="btn_cek_13"
																					style="float: right"
																					class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																							class="icon-file-check"></i></b>
																					Softcopy</a>
																			</td>
																		</tr>
																		<tr>
																			<td>Nomor Sertifikat</td>
																			<td><span
																					class="text-dark"><?php echo $row_smap['nomor_sertifikat'] ;?></span>
																			</td>

																		</tr>
																		<tr>
																			<td>Tipe Dokumen SMAP</td>
																			<td><span
																					class="text-dark"><?php echo $row_smap['persyaratan_smap'] ;?></span>
																			</td>

																		</tr>




																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
												<hr>
												<?php endforeach;?>


											</div>

										</div>

										<?php endif ;?>
									</div>
								</div>



								<div class="tab-pane fade" id="pengurus" role="tabpanel"
									aria-labelledby="profile-tab-1">

									<!--<div class="row">
											<div class="col-md-4">
												<div class="content-group-lg">
													<h6 class="text-semibold">#</h6>
													<p class="content-group">SELECT</p>
												</div>
											</div>


												<div class="col-md-8">
													<br>

														<div class="form-group">


																<select name="nama_pengurus" id="id_pengurus" class="form-control">
																	<?php foreach ($pengurus as $row_pengurus2) :?>
																		 <option data-text="<?php echo $row_pengurus2['nama'] ;?>" value="<?php echo $row_pengurus2['nama'] ;?>"><?php echo $row_pengurus2['nama'] ;?></option>
																	<?php endforeach ;?>
																 </select>
																 <input type="hidden" id="nama_pengurus" >
																 <footer class="blockquote-footer">
																 Pilih Nama Pengurus
																</footer>


														</div>

												</div>
										</div>-->


									<!--
										<div class="row">
											<div class="col-md-3">
												<div class="content-group-lg">
													<h6 class="text-semibold">#1</h6>
													<p class="content-group">KTP Pengurus</p>
												</div>
											</div>

											<div class="col-md-1">
												<font class="text-semibold" style="font-size: 11px;">Tidak/Ada</font>
												<span class="switch switch-outline switch-icon switch-primary">

													<label>
														<input type="checkbox" checked="checked" id="checkbox_6" value="1" onclick="javascript:checkbox6()" name="checkbox_6" />
														<span></span>
													</label>
												</span>

											</div>

												<div class="col-md-8">
													<br>
													<div class="input-group file-caption-main">
														<span class="file-caption-icon"></span>
														<input type="text" id="comment_6" name="comment_6"   class="form-control" disabled="disabled" placeholder="Comment...">


													<div class="input-group-btn input-group-append">
														<button type="button" onclick="javascript:get6()" id="get_6"  disabled="disabled" class="btn btn-dark btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
															</div>
													</div>
												</div>
										</div>

										<div class="row">
											<div class="col-md-3">
												<div class="content-group-lg">
													<h6 class="text-semibold">#2</h6>
													<p class="content-group">NPWP</p>
												</div>
											</div>

											<div class="col-md-1">
												<font class="text-semibold" style="font-size: 11px;">Tidak/Ada</font>
												<span class="switch switch-outline switch-icon switch-primary">

													<label>
														<input type="checkbox" checked="checked" id="checkbox_7" value="1" onclick="javascript:checkbox7()" name="checkbox_7" />
														<span></span>
													</label>
												</span>

											</div>

												<div class="col-md-8">
													<br>
													<div class="input-group file-caption-main">
														<span class="file-caption-icon"></span>
														<input type="text" id="comment_7" name="comment_7"   class="form-control" disabled="disabled" placeholder="Comment...">


													<div class="input-group-btn input-group-append">
														<button type="button" onclick="javascript:get7()" id="get_7"  disabled="disabled" class="btn btn-dark btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
															</div>
													</div>
												</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<div class="content-group-lg">
													<h6 class="text-semibold">#3</h6>
													<p class="content-group">FOTO</p>
												</div>
											</div>

											<div class="col-md-1">
												<font class="text-semibold" style="font-size: 11px;">Tidak/Ada</font>
												<span class="switch switch-outline switch-icon switch-primary">

													<label>
														<input type="checkbox" checked="checked" id="checkbox_8" value="1" onclick="javascript:checkbox8()" name="checkbox_8" />
														<span></span>
													</label>
												</span>

											</div>

												<div class="col-md-8">
													<br>
													<div class="input-group file-caption-main">
														<span class="file-caption-icon"></span>
														<input type="text" id="comment_8" name="comment_8"   class="form-control" disabled="disabled" placeholder="Comment...">


													<div class="input-group-btn input-group-append">
														<button type="button" onclick="javascript:get8()" id="get_8"  disabled="disabled" class="btn btn-dark btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
															</div>
													</div>
												</div>
										</div>
									-->
									<hr>

									<hr>
									<div class="row">
										<div class="col-md-6">
											<?php if(!empty($pengurus)) :?>
											<div class="accordion accordion-toggle-arrow" id="accordionExample1">

												<?php foreach ($pengurus as $row_pengurus) :?>
												<?php $counter_pengurus+=1 ;?>
												<div class="card">
													<div class="card-header">
														<div class="card-title collapsed" data-toggle="collapse"
															data-target="#data-pengurus-<?php echo $counter_pengurus ;?>">
															<?= $row_pengurus['nama'] ?>
														</div>
													</div>
													<div id="data-pengurus-<?php echo $counter_pengurus ;?>"
														class="collapse show" data-parent="#accordionExample1">
														<div class="card-body">

															<!--
																<div class="row">
																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#1</h6>
																			<p class="content-group">KTP Pengurus</p>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<br>
																		<a href="<?=$row_pengurus['persyaratan_ktp_img'];?>" target="_blank" type="button" name="btn_cek_14"  style="float: left" class="open-delete btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																	</div>
																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#2</h6>
																			<p class="content-group">NPWP</p>
																		</div>
																	</div>

																	<div class="col-md-4">
																		<br>
																		<a href="<?=$row_pengurus['persyaratan_npwp_img'];?>" target="_blank" type="button" name="btn_cek_15"  style="float: left" class="open-delete btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																	</div>





																</div>
																<div class="row">
																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#3</h6>
																			<p class="content-group">Foto Pengurus</p>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<br>
																		<a href="<?=$row_pengurus['persyaratan_foto'];?>" target="_blank" type="button" name="btn_cek_14"  style="float: left" class="open-delete btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																	</div>






																</div>-->


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
																			<td>Nama Pengurus</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengurus['nama'] ?></span>
																			</td>


																		</tr>
																		<tr>
																			<td>PJBU</td>
																			<td><span
																					class="text-dark"><?php if($row_pengurus['pjbu']=='1'){echo "PJBU";}else{echo "-";}  ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>No KTP</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengurus['no_ktp'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>NPWP</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengurus['npwp'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>No Akte</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengurus['no_akte'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Jabatan</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengurus['jabatan_bu'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Alamat</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengurus['alamat'] ?></span>
																			</td>
																		</tr>

																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
												<hr>
												<?php endforeach;?>


											</div>
											<?php endif ;?>
										</div>
										<div class="col-md-6">
											<?php $counter_pengurus=0 ;?>
											<?php if(!empty($pengurus_perubahan)) :?>
											<div class="accordion accordion-toggle-arrow" id="accordionExample1">

												<?php foreach ($pengurus_perubahan as $row_pengurus) :?>
												<?php $counter_pengurus+=1 ;?>
												<div class="card">
													<div class="card-header">
														<div class="card-title collapsed" data-toggle="collapse"
															data-target="#data-pengurus-perubahan-<?php echo $counter_pengurus ;?>">
															<?= $row_pengurus['nama'].'-'.$row_pengurus['id_izin'].'-'.$row_pengurus['id_sub_klasifikasi'].'-'.$row_pengurus['kualifikasi'] ?>
														</div>
													</div>
													<div id="data-pengurus-perubahan-<?php echo $counter_pengurus ;?>"
														class="collapse show" data-parent="#accordionExample1">
														<div class="card-body">

															<!--
                          <div class="row">
                            <div class="col-md-2">
                              <div class="content-group-lg">
                                <h6 class="text-semibold">#1</h6>
                                <p class="content-group">KTP Pengurus</p>
                              </div>
                            </div>


                            <div class="col-md-4">
                              <br>
                              <a href="<?=$row_pengurus['persyaratan_ktp_img'];?>" target="_blank" type="button" name="btn_cek_14"  style="float: left" class="open-delete btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
                            </div>
                            <div class="col-md-2">
                              <div class="content-group-lg">
                                <h6 class="text-semibold">#2</h6>
                                <p class="content-group">NPWP</p>
                              </div>
                            </div>

                            <div class="col-md-4">
                              <br>
                              <a href="<?=$row_pengurus['persyaratan_npwp_img'];?>" target="_blank" type="button" name="btn_cek_15"  style="float: left" class="open-delete btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
                            </div>





                          </div>
                          <div class="row">
                            <div class="col-md-2">
                              <div class="content-group-lg">
                                <h6 class="text-semibold">#3</h6>
                                <p class="content-group">Foto Pengurus</p>
                              </div>
                            </div>


                            <div class="col-md-4">
                              <br>
                              <a href="<?=$row_pengurus['persyaratan_foto'];?>" target="_blank" type="button" name="btn_cek_14"  style="float: left" class="open-delete btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
                            </div>






                          </div>-->


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
																			<td>Nama Pengurus</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengurus['nama'] ?></span>
																			</td>


																		</tr>
																		<tr>
																			<td>PJBU</td>
																			<td><span
																					class="text-dark"><?php if($row_pengurus['pjbu']=='1'){echo "PJBU";}else{echo "-";}  ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>No KTP</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengurus['no_ktp'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>NPWP</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengurus['npwp'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>No Akte</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengurus['no_akte'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Jabatan</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengurus['jabatan_bu'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Alamat</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengurus['alamat'] ?></span>
																			</td>
																		</tr>

																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
												<hr>
												<?php endforeach;?>


											</div>
											<?php endif ;?>
										</div>
									</div>
								</div>
								<input type="hidden" id="email_bu" name="tgl_dec" value="<?php echo $tgl_dec ;?>">
								<input type="hidden" id="alamat_bu" name="nib_dec" value="<?php echo $nib_dec ;?>">
								<div class="tab-pane fade" id="pengalaman" role="tabpanel"
									aria-labelledby="contact-tab-1">


									<!--
									<div class="row">
										<div class="col-md-3">
											<div class="content-group-lg">
												<h6 class="text-semibold">#1</h6>
												<p class="content-group">Doc 1</p>
											</div>
										</div>

										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 11px;">Tidak/Ada</font>
											<span class="switch switch-outline switch-icon switch-primary">

												<label>
													<input type="checkbox" checked="checked" id="checkbox_9" value="1" onclick="javascript:checkbox9()" name="checkbox_9" />
													<span></span>
												</label>
											</span>

										</div>

											<div class="col-md-8">
												<br>
												<div class="input-group file-caption-main">
													<span class="file-caption-icon"></span>
													<input type="text" id="comment_9" name="comment_9"   class="form-control" disabled="disabled" placeholder="Comment...">


												<div class="input-group-btn input-group-append">
													<button type="button" onclick="javascript:get9()" id="get_9"  disabled="disabled" class="btn btn-dark btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
														</div>
												</div>
											</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<div class="content-group-lg">
												<h6 class="text-semibold">#2</h6>
												<p class="content-group">Doc 2</p>
											</div>
										</div>

										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 11px;">Tidak/Ada</font>
											<span class="switch switch-outline switch-icon switch-primary">

												<label>
													<input type="checkbox" checked="checked" id="checkbox_10" value="1" onclick="javascript:checkbox10()" name="checkbox_10" />
													<span></span>
												</label>
											</span>

										</div>

											<div class="col-md-8">
												<br>
												<div class="input-group file-caption-main">
													<span class="file-caption-icon"></span>
													<input type="text" id="comment_10" name="comment_10"   class="form-control" disabled="disabled" placeholder="Comment...">


												<div class="input-group-btn input-group-append">
													<button type="button" onclick="javascript:get10()" id="get_10"  disabled="disabled" class="btn btn-dark btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
														</div>
												</div>
											</div>
									</div>-->


									<input type="hidden" id="id_izin_dex" name="id_izin_dex"
										value="<?php echo $id_izin ;?>">
									<hr>
									<div class="row">
										<div class="col-md-6">
											<div class="card card-custom bg-info">
												<div class="card-header border-0">
													<div class="card-title">
														<span class="card-icon">
															<i class="flaticon2-chat-1 text-white"></i>
														</span>
														<h3 class="card-label text-white">PENJUALAN TAHUNAN</h3>
													</div>

												</div>
												<div class="separator separator-solid separator-white opacity-20"></div>
												<div class="card-header border-0">
													<div class="card-title">
														<span class="card-icon">
															<i class="flaticon2-chat-1 text-white"></i>
														</span>
														<select onchange="javascript:check_penjualan(this)"
															id="penilaian_penjualan" class="form-control">

															<option value="1">Dokumen Terbaca</option>
															<option value="2">Belum Terbaca pada esimpan</option>
															<option value="3">Penjualan tahunan di
																https://simpan.pu.go.id</option>
														</select>
													</div>

												</div>
												<div class="card bg-info">
													<div class="table-responsive bg-info">

														<table class="table table-lg bg-info">
															<thead>
																<tr>
																	<th><textarea id="penjualan_tahunan_check"
																			class="form-control form-control-solid"
																			rows="5"></textarea></th>
																	<th><button type="button"
																			onclick="submit_penjualan_tahunan()"
																			name="btn_cek_11" style="float: right"
																			class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																					class="icon-file-check"></i></b>
																			Submit</button></th>

																</tr>
															</thead>
														</table>
													</div>



												</div>
											</div>
											<br>
											<hr>
											<?php if(!empty($penjualan_tahunan)) :?>
											<div class="accordion accordion-toggle-arrow" id="accordionExample1">

												<?php foreach ($penjualan_tahunan as $row_pengalaman) :?>
												<?php $counter_pengalaman+=1 ;?>
												<div class="card">
													<div class="card-header">
														<div class="card-title collapsed" data-toggle="collapse"
															data-target="#data-pengalaman-<?php echo $counter_pengalaman ;?>">
															<?php echo $row_pengalaman['nama_pengalaman'].'-'.$row_pengalaman['id_izin'].'-'.$row_pengalaman['id_sub_klasifikasi'].'-'.$row_pengalaman['kualifikasi'] ;?>
														</div>
													</div>
													<div id="data-pengalaman-<?php echo $counter_pengalaman ;?>"
														class="collapse show" data-parent="#accordionExample1">

														<div class="card-body">

															<!--
															<div class="row">
																<div class="col-md-2">
																	<div class="content-group-lg">
																		<h6 class="text-semibold">#1</h6>
																		<p class="content-group">Doc 1</p>
																	</div>
																</div>


																<div class="col-md-4">
																	<br>
																	<a href="<?=$row_pengalaman['file_doc_a'] ;?>" target="_blank" type="button" name="btn_cek_36"  style="float: left" class=" btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																</div>



																<div class="col-md-2">
																	<div class="content-group-lg">
																		<h6 class="text-semibold">#2</h6>
																		<p class="content-group">Doc 2</p>
																	</div>
																</div>


																<div class="col-md-4">
																	<br>
																	<a href="<?=$row_pengalaman['file_doc_b'] ;?>" target="_blank" type="button" name="btn_cek_35"  style="float: left" class=" btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																</div>

															</div>
														-->
															<div class="row">
																<div class="col-md-2">
																	<div class="content-group-lg">
																		<h6 class="text-semibold">#1</h6>
																		<p class="content-group">File BAST</p>
																	</div>
																</div>


																<div class="col-md-4">
																	<br>
																	<a <?php if($row_pengalaman['file_bash']!='') :?>href="<?= $row_pengalaman['file_bash'] ;?>"
																		<?php else :?>href="<?= base_url('not_found') ;?>"
																		<?php endif ;?> target="_blank" type="button"
																		name="btn_cek_36" style="float: left"
																		class=" btn btn-dark btn-labeled btn-rounded"><b><i
																				class="icon-file-check"></i></b>
																		Softcopy</a>
																</div>


																<!--#2-->

																<div class="col-md-2">
																	<div class="content-group-lg">
																		<h6 class="text-semibold">#2</h6>
																		<p class="content-group">File BOQ RAB MPU</p>
																	</div>
																</div>


																<div class="col-md-4">
																	<br>
																	<a <?php if($row_pengalaman['file_boq_rab_mpu']!='') :?>href="<?= $row_pengalaman['file_boq_rab_mpu'] ;?>"
																		<?php else :?>href="<?= base_url('not_found') ;?>"
																		<?php endif ;?> target="_blank" type="button"
																		name="btn_cek_35" style="float: left"
																		class=" btn btn-dark btn-labeled btn-rounded"><b><i
																				class="icon-file-check"></i></b>
																		Softcopy</a>
																</div>

															</div>
															<div class="row">
																<div class="col-md-2">
																	<div class="content-group-lg">
																		<h6 class="text-semibold">#3</h6>
																		<p class="content-group">File Kontrak Dengan
																			Pemberi Tugas</p>
																	</div>
																</div>


																<div class="col-md-4">
																	<br>
																	<a <?php if($row_pengalaman['file_kontrak_dengan_pemberi_tugas']!='') :?>href="<?= $row_pengalaman['file_kontrak_dengan_pemberi_tugas'] ;?>"
																		<?php else :?>href="<?= base_url('not_found') ;?>"
																		<?php endif ;?> target="_blank" type="button"
																		name="btn_cek_36" style="float: left"
																		class=" btn btn-dark btn-labeled btn-rounded"><b><i
																				class="icon-file-check"></i></b>
																		Softcopy</a>
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
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['nama_pengalaman'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>No Kontrak</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['nomor_kontrak'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Nilai Kontrak</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['nilai_kontrak'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Email Instansi</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['email_instansi'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Jabatan Pemberi Tugas</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['jabatan_pemberi_tugas'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Lokasi Pekerjaan</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['lokasi_pekerjaan'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Nama Instansi Pemberi Tugas</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['nama_instansi_pemberi_tugas'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Nama Pemberi Tugas</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['nama_pemberi_tugas'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Nilai Kontrak Adendum</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['nilai_kontrak_adendum'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Nilai Kontrak Sesuai Porsi</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['nilai_kontrak_sesuai_porsi'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>No Telfon Pemberi Tugas</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['no_telp_instansi_pemberi_tugas'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Nomor Registrasi Pengalaman</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['nomor_registrasi_pengalaman'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Pemberi Tugas</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['pemberi_tugas'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Presentase Porsi</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['presentase_porsi'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Status KSO</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['status_kso'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Sumber Dana</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['sumber_dana'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Sub Klasifikasi</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['id_sub_klasifikasi'] ;?></span>
																			</td>
																		</tr>

																		<tr>
																			<td>Pemilik Proyek</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['pemilik_proyek'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Tahun</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['tahun'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Spesifik Pekerjaan</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['spesifik_pekerjaan'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>No BASH</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['no_bash'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>No NKPK</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['no_nkpk'] ;?></span>
																			</td>
																		</tr>

																		<tr>
																			<td>Tgl Kontrak</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['tgl_kontrak'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Tgl BAST</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['tgl_bast'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Tgl Mulai</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['tgl_mulai'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Tgl Selesai</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['tgl_selesai'] ;?></span>
																			</td>
																		</tr>


																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
												<hr>
												<?php endforeach;?>


											</div>
											<?php endif ;?>
										</div>
										<div class="col-md-6">

											<?php if(!empty($penjualan_tahunan_perubahan)) :?>
											<div class="accordion accordion-toggle-arrow" id="accordionExample1">

												<?php foreach ($penjualan_tahunan_perubahan as $row_pengalaman) :?>
												<?php $counter_pengalaman+=1 ;?>
												<div class="card">
													<div class="card-header">
														<div class="card-title collapsed" data-toggle="collapse"
															data-target="#data-pengalaman-perubahan-<?php echo $counter_pengalaman ;?>">
															<?php echo $row_pengalaman['nama_pengalaman'].'-'.$row_pengalaman['id_izin'].'-'.$row_pengalaman['id_sub_klasifikasi'] ;?>
														</div>
													</div>
													<div id="data-pengalaman-perubahan-<?php echo $counter_pengalaman ;?>"
														class="collapse show" data-parent="#accordionExample1">

														<div class="card-body">

															<!--
                          <div class="row">
                            <div class="col-md-2">
                              <div class="content-group-lg">
                                <h6 class="text-semibold">#1</h6>
                                <p class="content-group">Doc 1</p>
                              </div>
                            </div>


                            <div class="col-md-4">
                              <br>
                              <a href="<?=$row_pengalaman['file_doc_a'] ;?>" target="_blank" type="button" name="btn_cek_36"  style="float: left" class=" btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
                            </div>



                            <div class="col-md-2">
                              <div class="content-group-lg">
                                <h6 class="text-semibold">#2</h6>
                                <p class="content-group">Doc 2</p>
                              </div>
                            </div>


                            <div class="col-md-4">
                              <br>
                              <a href="<?=$row_pengalaman['file_doc_b'] ;?>" target="_blank" type="button" name="btn_cek_35"  style="float: left" class=" btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
                            </div>

                          </div>
                        -->
															<div class="row">
																<div class="col-md-2">
																	<div class="content-group-lg">
																		<h6 class="text-semibold">#3</h6>
																		<p class="content-group">File BAST</p>
																	</div>
																</div>


																<div class="col-md-4">
																	<br>
																	<a <?php if($row_pengalaman['file_bash']!='') :?>href="<?= $row_pengalaman['file_bash'] ;?>"
																		<?php else :?>href="<?= base_url('not_found') ;?>"
																		<?php endif ;?> target="_blank" type="button"
																		name="btn_cek_36" style="float: left"
																		class=" btn btn-dark btn-labeled btn-rounded"><b><i
																				class="icon-file-check"></i></b>
																		Softcopy</a>
																</div>


																<!--#2-->

																<div class="col-md-2">
																	<div class="content-group-lg">
																		<h6 class="text-semibold">#4</h6>
																		<p class="content-group">File BOQ RAB MPU</p>
																	</div>
																</div>


																<div class="col-md-4">
																	<br>
																	<a <?php if($row_pengalaman['file_boq_rab_mpu']!='') :?>href="<?= $row_pengalaman['file_boq_rab_mpu'] ;?>"
																		<?php else :?>href="<?= base_url('not_found') ;?>"
																		<?php endif ;?> target="_blank" type="button"
																		name="btn_cek_35" style="float: left"
																		class=" btn btn-dark btn-labeled btn-rounded"><b><i
																				class="icon-file-check"></i></b>
																		Softcopy</a>
																</div>

															</div>
															<div class="row">
																<div class="col-md-2">
																	<div class="content-group-lg">
																		<h6 class="text-semibold">#5</h6>
																		<p class="content-group">File Kontrak Dengan
																			Pemberi Tugas</p>
																	</div>
																</div>


																<div class="col-md-4">
																	<br>
																	<a <?php if($row_pengalaman['file_kontrak_dengan_pemberi_tugas']!='') :?>href="<?= $row_pengalaman['file_kontrak_dengan_pemberi_tugas'] ;?>"
																		<?php else :?>href="<?= base_url('not_found') ;?>"
																		<?php endif ;?> target="_blank" type="button"
																		name="btn_cek_36" style="float: left"
																		class=" btn btn-dark btn-labeled btn-rounded"><b><i
																				class="icon-file-check"></i></b>
																		Softcopy</a>
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
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['nama_pengalaman'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>No Kontrak</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['nomor_kontrak'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Nilai Kontrak</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['nilai_kontrak'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Email Instansi</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['email_instansi'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Jabatan Pemberi Tugas</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['jabatan_pemberi_tugas'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Lokasi Pekerjaan</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['lokasi_pekerjaan'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Nama Instansi Pemberi Tugas</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['nama_instansi_pemberi_tugas'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Nama Pemberi Tugas</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['nama_pemberi_tugas'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Nilai Kontrak Adendum</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['nilai_kontrak_adendum'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Nilai Kontrak Sesuai Porsi</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['nilai_kontrak_sesuai_porsi'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>No Telfon Pemberi Tugas</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['no_telp_instansi_pemberi_tugas'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Nomor Registrasi Pengalaman</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['nomor_registrasi_pengalaman'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Pemberi Tugas</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['pemberi_tugas'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Presentase Porsi</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['presentase_porsi'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Status KSO</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['status_kso'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Sumber Dana</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['sumber_dana'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Sub Klasifikasi</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['id_sub_klasifikasi'] ;?></span>
																			</td>
																		</tr>

																		<tr>
																			<td>Pemilik Proyek</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['pemilik_proyek'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Tahun</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['tahun'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Spesifik Pekerjaan</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['spesifik_pekerjaan'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>No BASH</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['no_bash'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>No NKPK</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['no_nkpk'] ;?></span>
																			</td>
																		</tr>

																		<tr>
																			<td>Tgl Kontrak</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['tgl_kontrak'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Tgl BAST</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['tgl_bast'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Tgl Mulai</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['tgl_mulai'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Tgl Selesai</td>
																			<td><span
																					class="text-dark"><?php echo $row_pengalaman['tgl_selesai'] ;?></span>
																			</td>
																		</tr>


																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
												<hr>
												<?php endforeach;?>


											</div>
											<?php endif ;?>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="akte" role="tabpanel" aria-labelledby="home-tab-1">

									<div class="col-md-12">
										<!-- Pemegang Saham toggles -->
										<div class="panel panel-flat panel-collapsed">
											<div class="panel-heading">
												<h5 class="panel-title">Akte</h5>
												<div class="heading-elements">

												</div>
											</div>
											<div class="panel-body">


												<!--#1-->

												<!--
													<div class="row">
														<div class="col-md-3">
															<div class="content-group-lg">
																<h6 class="text-semibold">#2</h6>
																<p class="content-group">File KTP</p>
															</div>
														</div>

														<div class="col-md-1">
															<font class="text-semibold" style="font-size: 11px;">Tidak/Ada</font>
															<span class="switch switch-outline switch-icon switch-primary">

																<label>
																	<input type="checkbox" checked="checked" id="checkbox_32" value="1" onclick="javascript:checkbox32()" name="checkbox_32" />
																	<span></span>
																</label>
															</span>

														</div>

															<div class="col-md-8">
																<br>
																<div class="input-group file-caption-main">
																	<span class="file-caption-icon"></span>
																	<input type="text" id="comment_32" name="comment_32"   class="form-control" disabled="disabled" placeholder="Comment...">


																<div class="input-group-btn input-group-append">
																	<button type="button" onclick="javascript:get32()" id="get_32"  disabled="disabled" class="btn btn-dark btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
																		</div>
																</div>
															</div>
													</div>
													<div class="row">
														<div class="col-md-3">
															<div class="content-group-lg">
																<h6 class="text-semibold">#3</h6>
																<p class="content-group">File NPWP</p>
															</div>
														</div>

														<div class="col-md-1">
															<font class="text-semibold" style="font-size: 11px;">Tidak/Ada</font>
															<span class="switch switch-outline switch-icon switch-primary">

																<label>
																	<input type="checkbox" checked="checked" id="checkbox_33" value="1" onclick="javascript:checkbox33()" name="checkbox_33" />
																	<span></span>
																</label>
															</span>

														</div>

															<div class="col-md-8">
																<br>
																<div class="input-group file-caption-main">
																	<span class="file-caption-icon"></span>
																	<input type="text" id="comment_33" name="comment_33"   class="form-control" disabled="disabled" placeholder="Comment...">


																<div class="input-group-btn input-group-append">
																	<button type="button" onclick="javascript:get33()" id="get_33"  disabled="disabled" class="btn btn-dark btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
																		</div>
																</div>
															</div>
													</div>-->

											</div>
										</div>
									</div>
									<hr>

									<hr>
									<?php if(!empty($akte)) :?>
									<div class="row">
										<div class="col-md-6">
											<div class="accordion accordion-toggle-arrow" id="accordionExample1">
												<input type="hidden" value="<?php echo $tgl ;?>" class="switchery"
													name="tgl">

												<?php foreach ($akte as $row_akte) :?>
												<?php $counter_akte+=1 ;?>
												<div class="card">
													<div class="card-header">
														<div class="card-title collapsed" data-toggle="collapse"
															data-target="#data-akte-<?php echo $counter_akte ;?>">
															<?php echo $row_akte['no'] ;?>
														</div>
													</div>
													<div id="data-akte-<?php echo $counter_akte ;?>"
														class="collapse show" data-parent="#accordionExample1">

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
																	<a <?php if($row_akte['file_doc']!='') :?>href="<?= $row_akte['file_doc'] ;?>"
																		<?php else :?>href="<?= base_url('not_found') ;?>"
																		<?php endif ;?> target="_blank" type="button"
																		name="btn_cek_36" style="float: left"
																		class=" btn btn-dark btn-labeled btn-rounded"><b><i
																				class="icon-file-check"></i></b>
																		Softcopy</a>
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
																		<a href="<?=$row_akte['file_ktp'] ;?>" target="_blank" type="button" name="btn_cek_36"  style="float: left" class=" btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
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
																		<a href="<?=$row_akte['file_npwp'] ;?>" target="_blank" type="button" name="btn_cek_36"  style="float: left" class=" btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
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
																			<td><span
																					class="text-dark"><?=$row_akte['no'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>No SK Kumham</td>
																			<td><span
																					class="text-dark"><?=$row_akte['no_sk_kumham'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Jenis Akte</td>
																			<td><span class="text-dark">
																					<?php if($row_akte['jenis']=='01'){
																					echo "Pendirian";
																				}elseif($row_akte['jenis']=='02'){
																					echo "Perubahan";
																				}elseif($row_akte['jenis']=='06'){
																					echo "Kontrak";
																				}elseif($row_akte['jenis']=='07'){
																					echo "Pendirian";
																				}elseif($row_akte['jenis']=='09'){
																					echo "SK Penetapan";
																				}elseif($row_akte['jenis']=='10'){
																					echo "Akta Liquiditas";
																				}elseif($row_akte['jenis']=='11'){
																					echo "Akta Merger";
																				}elseif($row_akte['jenis']=='12'){
																					echo "Akta Pembubaran";
																				} ;?></span></td>
																		</tr>
																		<tr>
																			<td>Nama Notaris</td>
																			<td><span
																					class="text-dark"><?=$row_akte['nama_notaris'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Alamat Notaris</td>
																			<td><span
																					class="text-dark"><?=$row_akte['alamat_notaris'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Propinsi Notaris</td>
																			<td><span
																					class="text-dark"><?=$row_akte['id_provinsi_notaris'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Kabupaten Notaris</td>
																			<td><span
																					class="text-dark"><?=$row_akte['id_kabupaten_notaris'] ;?></span>
																			</td>
																		</tr>

																		<tr>
																			<td>Modal Dasar</td>
																			<td><span
																					class="text-dark"><?=$row_akte['modaldasar'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Modal Disetor</td>
																			<td><span
																					class="text-dark"><?=$row_akte['modalsetor'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Nilai Satuan Saham</td>
																			<td><span
																					class="text-dark"><?=$row_akte['hargasatuan'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Nilai Saham</td>
																			<td><span
																					class="text-dark"><?=$row_akte['nilaisaham'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Tgl Akte</td>
																			<td><span
																					class="text-dark"><?=$row_akte['tgl_akte'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Maksud dan Tujuan</td>
																			<td><span
																					class="text-dark"><?=$row_akte['maksudtujuan'] ;?></span>
																			</td>
																		</tr>





																	</tbody>
																</table>
															</div>


														</div>
													</div>
												</div>
												<hr>
												<?php endforeach;?>


											</div>

										</div>
										<?php endif ;?>
										<div class="col-md-6">
											<div class="accordion accordion-toggle-arrow" id="accordionExample1">
												<input type="hidden" value="<?php echo $tgl ;?>" class="switchery"
													name="tgl">

												<?php foreach ($akte_perubahan as $row_akte) :?>
												<?php $counter_akte+=1 ;?>
												<div class="card">
													<div class="card-header">
														<div class="card-title collapsed" data-toggle="collapse"
															data-target="#data-akte-perubahan-<?php echo $counter_akte ;?>">
															<?php echo $row_akte['no'].'-'.$row_akte['id_izin'].'-'.$row_akte['id_sub_klasifikasi'].'-'.$row_akte['kualifikasi'] ;?>
														</div>
													</div>
													<div id="data-akte-perubahan-<?php echo $counter_akte ;?>"
														class="collapse show" data-parent="#accordionExample1">

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
																	<a <?php if($row_akte['file_doc']!='') :?>href="<?= $row_akte['file_doc'] ;?>"
																		<?php else :?>href="<?= base_url('not_found') ;?>"
																		<?php endif ;?> target="_blank" type="button"
																		name="btn_cek_36" style="float: left"
																		class=" btn btn-dark btn-labeled btn-rounded"><b><i
																				class="icon-file-check"></i></b>
																		Softcopy</a>
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
                            <a href="<?=$row_akte['file_ktp'] ;?>" target="_blank" type="button" name="btn_cek_36"  style="float: left" class=" btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
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
                            <a href="<?=$row_akte['file_npwp'] ;?>" target="_blank" type="button" name="btn_cek_36"  style="float: left" class=" btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
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
																			<td><span
																					class="text-dark"><?=$row_akte['no'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>No SK Kumham</td>
																			<td><span
																					class="text-dark"><?=$row_akte['no_sk_kumham'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Jenis Akte</td>
																			<td><span class="text-dark">
																					<?php if($row_akte['jenis']=='01'){
                                  echo "Pendirian";
                                }elseif($row_akte['jenis']=='02'){
                                  echo "Perubahan";
                                }elseif($row_akte['jenis']=='06'){
                                  echo "Kontrak";
                                }elseif($row_akte['jenis']=='07'){
                                  echo "Pendirian";
                                }elseif($row_akte['jenis']=='09'){
                                  echo "SK Penetapan";
                                }elseif($row_akte['jenis']=='10'){
                                  echo "Akta Liquiditas";
                                }elseif($row_akte['jenis']=='11'){
                                  echo "Akta Merger";
                                }elseif($row_akte['jenis']=='12'){
                                  echo "Akta Pembubaran";
                                } ;?></span></td>
																		</tr>
																		<tr>
																			<td>Nama Notaris</td>
																			<td><span
																					class="text-dark"><?=$row_akte['nama_notaris'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Alamat Notaris</td>
																			<td><span
																					class="text-dark"><?=$row_akte['alamat_notaris'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Propinsi Notaris</td>
																			<td><span
																					class="text-dark"><?=$row_akte['id_provinsi_notaris'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Kabupaten Notaris</td>
																			<td><span
																					class="text-dark"><?=$row_akte['id_kabupaten_notaris'] ;?></span>
																			</td>
																		</tr>

																		<tr>
																			<td>Modal Dasar</td>
																			<td><span
																					class="text-dark"><?=$row_akte['modaldasar'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Modal Disetor</td>
																			<td><span
																					class="text-dark"><?=$row_akte['modalsetor'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Nilai Satuan Saham</td>
																			<td><span
																					class="text-dark"><?=$row_akte['hargasatuan'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Nilai Saham</td>
																			<td><span
																					class="text-dark"><?=$row_akte['nilaisaham'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Tgl Akte</td>
																			<td><span
																					class="text-dark"><?=$row_akte['tgl_akte'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Maksud dan Tujuan</td>
																			<td><span
																					class="text-dark"><?=$row_akte['maksudtujuan'] ;?></span>
																			</td>
																		</tr>





																	</tbody>
																</table>
															</div>


														</div>
													</div>
												</div>
												<hr>
												<?php endforeach;?>


											</div>

										</div>
									</div>
								</div>



								<div class="tab-pane fade" id="pemegang_saham" role="tabpanel"
									aria-labelledby="home-tab-1">

									<div class="col-md-12">
										<!-- Pemegang Saham toggles -->
										<div class="panel panel-flat panel-collapsed">
											<div class="panel-heading">
												<h5 class="panel-title">Pemegang Saham</h5>
												<div class="heading-elements">

												</div>
											</div>
											<div class="panel-body">
												<!--
													<div class="row">
														<div class="col-md-5">
															<div class="content-group-lg">
																<h6 class="text-semibold">#</h6>
																<p class="content-group">SELECT</p>
															</div>
														</div>



															<div class="col-md-7">
																<br>

																	<div class="form-group">


																			<select name="id_pemilik_saham" id="id_pemilik_saham" class="form-control">
																				<?php foreach ($pemegang_saham as $row_saham2) :?>
																					 <option value="<?php echo $row_saham2['nama_pemilik'] ;?>"><?php echo $row_saham2['nama_pemilik'] ;?></option>
																				<?php endforeach ;?>
																			 </select>
																			 <input type="hidden" id="nama_saham" >
																			 <footer class="blockquote-footer">
																				 Pilih Nama Pemilik Saham
																			 </footer>


																	</div>

															</div>
													</div>
												-->
												<!--#1-->
												<!--<div class="row">
														<div class="col-md-3">
															<div class="content-group-lg">
																<h6 class="text-semibold">#1</h6>
																<p class="content-group">KTP</p>
															</div>
														</div>

														<div class="col-md-1">
															<font class="text-semibold" style="font-size: 11px;">Tidak/Ada</font>
															<span class="switch switch-outline switch-icon switch-primary">

																<label>
																	<input type="checkbox" checked="checked" id="checkbox_13" value="1" onclick="javascript:checkbox13()" name="checkbox_13" />
																	<span></span>
																</label>
															</span>

														</div>

															<div class="col-md-8">
																<br>
																<div class="input-group file-caption-main">
																	<span class="file-caption-icon"></span>
																	<input type="text" id="comment_13" name="comment_13"   class="form-control" disabled="disabled" placeholder="Comment...">


																<div class="input-group-btn input-group-append">
																	<button type="button" onclick="javascript:get13()" id="get_13"  disabled="disabled" class="btn btn-dark btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
																		</div>
																</div>
															</div>
													</div>
													<div class="row">
														<div class="col-md-3">
															<div class="content-group-lg">
																<h6 class="text-semibold">#2</h6>
																<p class="content-group">NPWP</p>
															</div>
														</div>

														<div class="col-md-1">
															<font class="text-semibold" style="font-size: 11px;">Tidak/Ada</font>
															<span class="switch switch-outline switch-icon switch-primary">

																<label>
																	<input type="checkbox" checked="checked" id="checkbox_14" value="1" onclick="javascript:checkbox14()" name="checkbox_14" />
																	<span></span>
																</label>
															</span>

														</div>

															<div class="col-md-8">
																<br>
																<div class="input-group file-caption-main">
																	<span class="file-caption-icon"></span>
																	<input type="text" id="comment_14" name="comment_14"   class="form-control" disabled="disabled" placeholder="Comment...">


																<div class="input-group-btn input-group-append">
																	<button type="button" onclick="javascript:get14()" id="get_14"  disabled="disabled" class="btn btn-dark btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
																		</div>
																</div>
															</div>
													</div>
													<div class="row">
														<div class="col-md-3">
															<div class="content-group-lg">
																<h6 class="text-semibold">#3</h6>
																<p class="content-group">Doc 3</p>
															</div>
														</div>

														<div class="col-md-1">
															<font class="text-semibold" style="font-size: 11px;">Tidak/Ada</font>
															<span class="switch switch-outline switch-icon switch-primary">

																<label>
																	<input type="checkbox" checked="checked" id="checkbox_15" value="1" onclick="javascript:checkbox15()" name="checkbox_15" />
																	<span></span>
																</label>
															</span>

														</div>

															<div class="col-md-8">
																<br>
																<div class="input-group file-caption-main">
																	<span class="file-caption-icon"></span>
																	<input type="text" id="comment_15" name="comment_15"   class="form-control" disabled="disabled" placeholder="Comment...">


																<div class="input-group-btn input-group-append">
																	<button type="button" onclick="javascript:get15()" id="get_15"  disabled="disabled" class="btn btn-dark btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
																		</div>
																</div>
															</div>
													</div>-->
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-md-2">
											<div class="content-group-lg">
												<h6 class="text-semibold"><span class="text-danger">#CEKLIS</span></h6>
												<p class="content-group"><span class="text-danger">Keuangan Pemegang
														Saham</span></p>
											</div>
										</div>

										<div class="col-md-2">
											<font class="text-semibold" style="font-size: 12px;">Tidak/Lengkap</font>
											<span class="switch switch-outline switch-icon switch-danger">

												<label>
													<input type="checkbox" checked="checked" id="checkbox_86" value="1"
														name="checkbox_86" />
													<span></span>
												</label>
											</span>

										</div>

										<div class="col-md-8">
											<br>
											<div class="input-group file-caption-main">
												<span class="file-caption-icon"></span>
												<input type="text" id="comment_86" name="comment_86"
													class="form-control" placeholder="Comment...">
												<div class="input-group-btn input-group-append">
													<button type="button" onclick="javascript:get86()" id="get_86"
														class="btn btn-dark btn-ladda btn-ladda-spinner"
														data-spinner-color="#333" data-style="zoom-in"><span
															class="ladda-label">Submit</span></button>
												</div>
											</div>
										</div>
									</div>
									<hr>
									<?php if(!empty($pemegang_saham)) :?>
									<div class="row">
										<div class="col-md-6">
											<div class="accordion accordion-toggle-arrow" id="accordionExample1">
												<input type="hidden" value="<?php echo $tgl ;?>" class="switchery"
													name="tgl">

												<?php foreach ($pemegang_saham as $row_saham) :?>
												<?php $counter_saham+=1 ;?>
												<div class="card">
													<div class="card-header">
														<div class="card-title collapsed" data-toggle="collapse"
															data-target="#data-saham-<?php echo $counter_saham ;?>">
															<?php echo $row_saham['nama_pemilik'] ;?>
														</div>
													</div>
													<div id="data-saham-<?php echo $counter_saham ;?>"
														class="collapse show" data-parent="#accordionExample1">

														<div class="card-body">
															<!--#1-->
															<div class="row">
																<div class="col-md-2">
																	<div class="content-group-lg">
																		<h6 class="text-semibold">#1</h6>
																		<p class="content-group">KTP</p>
																	</div>
																</div>


																<div class="col-md-4">
																	<br>
																	<a <?php if($row_saham['persyaratan_ktp']!='') :?>href="<?= $row_saham['persyaratan_ktp'] ;?>"
																		<?php else :?>href="<?= base_url('not_found') ;?>"
																		<?php endif ;?> target="_blank" type="button"
																		name="btn_cek_36" style="float: left"
																		class=" btn btn-dark btn-labeled btn-rounded"><b><i
																				class="icon-file-check"></i></b>
																		Softcopy</a>
																</div>


																<!--#2-->
																<div class="col-md-2">
																	<div class="content-group-lg">
																		<h6 class="text-semibold">#2</h6>
																		<p class="content-group">NPWP</p>
																	</div>
																</div>


																<div class="col-md-4">
																	<br>
																	<a <?php if($row_saham['persyaratan_npwp']!='') :?>href="<?= $row_saham['persyaratan_npwp'] ;?>"
																		<?php else :?>href="<?= base_url('not_found') ;?>"
																		<?php endif ;?> target="_blank" type="button"
																		name="btn_cek_36" style="float: left"
																		class=" btn btn-dark btn-labeled btn-rounded"><b><i
																				class="icon-file-check"></i></b>
																		Softcopy</a>
																</div>

															</div>
															<div class="row">
																<div class="col-md-2">
																	<div class="content-group-lg">
																		<h6 class="text-semibold">#3</h6>
																		<p class="content-group">Doc 3</p>
																	</div>
																</div>


																<div class="col-md-4">
																	<br>
																	<a <?php if($row_saham['persyaratan_doc']!='') :?>href="<?= $row_saham['persyaratan_doc'] ;?>"
																		<?php else :?>href="<?= base_url('not_found') ;?>"
																		<?php endif ;?> target="_blank" type="button"
																		name="btn_cek_36" style="float: left"
																		class=" btn btn-dark btn-labeled btn-rounded"><b><i
																				class="icon-file-check"></i></b>
																		Softcopy</a>
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
																			<td>Nama Pemilik Saham</td>
																			<td><span
																					class="text-dark"><?php echo $row_saham['nama_pemilik'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>No KTP</td>
																			<td><span
																					class="text-dark"><?php echo $row_saham['no_ktp'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>NPWP</td>
																			<td><span
																					class="text-dark"><?php echo $row_saham['npwp'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Alamat</td>
																			<td><span
																					class="text-dark"><?php echo $row_saham['alamat'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Propinsi</td>
																			<td><span
																					class="text-dark"><?php echo $row_saham['id_propinsi'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Kabupaten</td>
																			<td><span
																					class="text-dark"><?php echo $row_saham['id_kabupaten'] ;?></span>
																			</td>
																		</tr>

																		<tr>
																			<td>Jenis Saham</td>
																			<td><span
																					class="text-dark"><?php echo $row_saham['jenis_saham'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Jumlah Saham</td>
																			<td><span
																					class="text-dark"><?php echo $row_saham['jumlah_lembar'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Nilai Satuan Per-lembar</td>
																			<td><span
																					class="text-dark"><?php echo $row_saham['nilai_perlembar'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Modal Dasar</td>
																			<td><span
																					class="text-dark"><?php echo $row_saham['modal_dasar'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Modal Disetor</td>
																			<td><span
																					class="text-dark"><?php echo $row_saham['modal_disetor'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>No Akte</td>
																			<td><span
																					class="text-dark"><?php echo $row_saham['no_akte'] ;?></span>
																			</td>
																		</tr>



																	</tbody>
																</table>
															</div>


														</div>
													</div>
												</div>
												<hr>
												<?php endforeach;?>
											</div>
										</div>
										<div class="col-md-6">
											<div class="accordion accordion-toggle-arrow" id="accordionExample1">
												<input type="hidden" value="<?php echo $tgl ;?>" class="switchery"
													name="tgl">

												<?php foreach ($pemegang_saham_perubahan as $row_saham) :?>
												<?php $counter_saham+=1 ;?>
												<div class="card">
													<div class="card-header">
														<div class="card-title collapsed" data-toggle="collapse"
															data-target="#data-saham-perubahan-<?php echo $counter_saham ;?>">
															<?php echo $row_saham['nama_pemilik'] ;?>
														</div>
													</div>
													<div id="data-saham-perubahan-<?php echo $counter_saham ;?>"
														class="collapse show" data-parent="#accordionExample1">

														<div class="card-body">
															<!--#1-->
															<div class="row">
																<div class="col-md-2">
																	<div class="content-group-lg">
																		<h6 class="text-semibold">#1</h6>
																		<p class="content-group">KTP</p>
																	</div>
																</div>


																<div class="col-md-4">
																	<br>
																	<a <?php if($row_saham['persyaratan_ktp']!='') :?>href="<?= $row_saham['persyaratan_ktp'] ;?>"
																		<?php else :?>href="<?= base_url('not_found') ;?>"
																		<?php endif ;?> target="_blank" type="button"
																		name="btn_cek_36" style="float: left"
																		class=" btn btn-dark btn-labeled btn-rounded"><b><i
																				class="icon-file-check"></i></b>
																		Softcopy</a>
																</div>


																<!--#2-->
																<div class="col-md-2">
																	<div class="content-group-lg">
																		<h6 class="text-semibold">#2</h6>
																		<p class="content-group">NPWP</p>
																	</div>
																</div>


																<div class="col-md-4">
																	<br>
																	<a <?php if($row_saham['persyaratan_npwp']!='') :?>href="<?= $row_saham['persyaratan_npwp'] ;?>"
																		<?php else :?>href="<?= base_url('not_found') ;?>"
																		<?php endif ;?> target="_blank" type="button"
																		name="btn_cek_36" style="float: left"
																		class=" btn btn-dark btn-labeled btn-rounded"><b><i
																				class="icon-file-check"></i></b>
																		Softcopy</a>
																</div>

															</div>
															<div class="row">
																<div class="col-md-2">
																	<div class="content-group-lg">
																		<h6 class="text-semibold">#3</h6>
																		<p class="content-group">Doc 3</p>
																	</div>
																</div>


																<div class="col-md-4">
																	<br>
																	<a <?php if($row_saham['persyaratan_doc']!='') :?>href="<?= $row_saham['persyaratan_doc'] ;?>"
																		<?php else :?>href="<?= base_url('not_found') ;?>"
																		<?php endif ;?> target="_blank" type="button"
																		name="btn_cek_36" style="float: left"
																		class=" btn btn-dark btn-labeled btn-rounded"><b><i
																				class="icon-file-check"></i></b>
																		Softcopy</a>
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
																			<td>Nama Pemilik Saham</td>
																			<td><span
																					class="text-dark"><?php echo $row_saham['nama_pemilik'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>No KTP</td>
																			<td><span
																					class="text-dark"><?php echo $row_saham['no_ktp'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>NPWP</td>
																			<td><span
																					class="text-dark"><?php echo $row_saham['npwp'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Alamat</td>
																			<td><span
																					class="text-dark"><?php echo $row_saham['alamat'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Propinsi</td>
																			<td><span
																					class="text-dark"><?php echo $row_saham['id_propinsi'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Kabupaten</td>
																			<td><span
																					class="text-dark"><?php echo $row_saham['id_kabupaten'] ;?></span>
																			</td>
																		</tr>

																		<tr>
																			<td>Jenis Saham</td>
																			<td><span
																					class="text-dark"><?php echo $row_saham['jenis_saham'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Jumlah Saham</td>
																			<td><span
																					class="text-dark"><?php echo $row_saham['jumlah_lembar'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Nilai Satuan Per-lembar</td>
																			<td><span
																					class="text-dark"><?php echo $row_saham['nilai_perlembar'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Modal Dasar</td>
																			<td><span
																					class="text-dark"><?php echo $row_saham['modal_dasar'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Modal Disetor</td>
																			<td><span
																					class="text-dark"><?php echo $row_saham['modal_disetor'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>No Akte</td>
																			<td><span
																					class="text-dark"><?php echo $row_saham['no_akte'] ;?></span>
																			</td>
																		</tr>



																	</tbody>
																</table>
															</div>


														</div>
													</div>
												</div>
												<hr>
												<?php endforeach;?>
											</div>
										</div>
									</div>
									<?php endif ;?>
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





											</div>
										</div>
									</div>
									<hr>

									<hr>
									<?php if(!empty($neraca)) :?>
									<div class="row">
										<div class="col-md-6">
											<div class="card card-custom bg-info">
												<div class="card-header border-0">
													<div class="card-title">
														<span class="card-icon">
															<i class="flaticon2-chat-1 text-white"></i>
														</span>
														<h3 class="card-label text-white">KEMAMPUAN KEUANGAN M, B, dan
															Spesialis</h3>
													</div>

												</div>
												<div class="separator separator-solid separator-white opacity-20"></div>

												<div class="card-header border-0">
													<div class="card-title">
														<span class="card-icon">
															<i class="flaticon2-chat-1 text-white"></i>
														</span>
														<select onchange="javascript:check_keuangan(this)"
															id="penilaian_keuangan" class="form-control">

															<option value="1">Sudah Terdaftar</option>
															<option value="2">Belum terdaftar Barcode KAP atas Laporan
																Audit Akuntan Publik tidak terdaftar di
																https://pelita-api.kemenkeu.go.id/</option>
														</select>
													</div>

												</div>
												<div class="card bg-info">
													<div class="table-responsive bg-info">

														<table class="table table-lg bg-info">
															<thead>
																<tr>
																	<th><textarea id="keuangan_check"
																			class="form-control form-control-solid"
																			rows="5"></textarea></th>
																	<th><button type="button"
																			onclick="submit_keuangan()"
																			name="btn_cek_11" style="float: right"
																			class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																					class="icon-file-check"></i></b>
																			Submit</button></th>

																</tr>
															</thead>
														</table>
													</div>
												</div>
											</div>
											<br>
											<hr>
											<div class="accordion accordion-toggle-arrow" id="accordionExample1">
												<input type="hidden" value="<?php echo $tgl ;?>" class="switchery"
													name="tgl">

												<?php foreach ($neraca as $row_neraca) :?>
												<?php $counter_neraca+=1 ;?>
												<div class="card">
													<div class="card-header">
														<div class="card-title collapsed" data-toggle="collapse"
															data-target="#data-neraca-<?php echo $counter_neraca ;?>">
															<?php echo $row_neraca['Tahun'] ;?>
														</div>
													</div>
													<div id="data-neraca-<?php echo $counter_neraca ;?>"
														class="collapse show" data-parent="#accordionExample1">

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
																	<a <?php if($row_neraca['persyaratan_doc1']!='') :?>href="<?= $row_neraca['persyaratan_doc1'] ;?>"
																		<?php else :?>href="<?= base_url('not_found') ;?>"
																		<?php endif ;?> target="_blank" type="button"
																		name="btn_cek_36" style="float: left"
																		class=" btn btn-dark btn-labeled btn-rounded"><b><i
																				class="icon-file-check"></i></b>
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
																	<a <?php if($row_neraca['persyaratan_doc2']!='') :?>href="<?= $row_neraca['persyaratan_doc2'] ;?>"
																		<?php else :?>href="<?= base_url('not_found') ;?>"
																		<?php endif ;?> target="_blank" type="button"
																		name="btn_cek_36" style="float: left"
																		class=" btn btn-dark btn-labeled btn-rounded"><b><i
																				class="icon-file-check"></i></b>
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
																			<td><span
																					class="text-dark"><?=$row_neraca['Tahun'] ;?></span>
																			</td>
																		</tr>

																		<tr>
																			<td>Aktiva Lancar</td>
																			<td><span
																					class="text-dark"><?=$row_neraca['aktiva_lancar'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Aktiva Tidak Lancar</td>
																			<td><span
																					class="text-dark"><?=$row_neraca['aktiva_tdk_lancar'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Aktiva Lain-lain</td>
																			<td><span
																					class="text-dark"><?=$row_neraca['aktiva_lain_lain'] ;?></span>
																			</td>
																		</tr>

																		<tr>
																			<td>Kewajiban lancar</td>
																			<td><span
																					class="text-dark"><?=$row_neraca['kewajiban_lancar'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Kewajiban tidak lancar</td>
																			<td><span
																					class="text-dark"><?=$row_neraca['kewajiban_tdk_lancar'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Ekuitas</td>
																			<td><span
																					class="text-dark"><?=$row_neraca['total_ekuitas'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Total Modal</td>
																			<td><span
																					class="text-dark"><?=$row_neraca['total_modal'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Total Kewajiban Ekuitas</td>
																			<td><span
																					class="text-dark"><?=$row_neraca['total_kewajiban_ekuitas'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Total Kewajiban</td>
																			<td><span
																					class="text-dark"><?=$row_neraca['total_kewajiban'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Total Aset</td>
																			<td><span
																					class="text-dark"><?=$row_neraca['total_aset'] ;?></span>
																			</td>
																		</tr>




																	</tbody>
																</table>
															</div>


														</div>
													</div>
												</div>
												<hr>
												<?php endforeach;?>
											</div>
										</div>
										<div class="col-md-6">
											<div class="accordion accordion-toggle-arrow" id="accordionExample1">
												<input type="hidden" value="<?php echo $tgl ;?>" class="switchery"
													name="tgl">

												<?php foreach ($neraca_perubahan as $row_neraca) :?>
												<?php $counter_neraca+=1 ;?>
												<div class="card">
													<div class="card-header">
														<div class="card-title collapsed" data-toggle="collapse"
															data-target="#data-neraca-perubahan-<?php echo $counter_neraca ;?>">
															<?php echo $row_neraca['Tahun'] ;?>
														</div>
													</div>
													<div id="data-neraca-perubahan-<?php echo $counter_neraca ;?>"
														class="collapse show" data-parent="#accordionExample1">

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
																	<a <?php if($row_neraca['persyaratan_doc1']!='') :?>href="<?= $row_neraca['persyaratan_doc1'] ;?>"
																		<?php else :?>href="<?= base_url('not_found') ;?>"
																		<?php endif ;?> target="_blank" type="button"
																		name="btn_cek_36" style="float: left"
																		class=" btn btn-dark btn-labeled btn-rounded"><b><i
																				class="icon-file-check"></i></b>
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
																	<a <?php if($row_neraca['persyaratan_doc2']!='') :?>href="<?= $row_neraca['persyaratan_doc2'] ;?>"
																		<?php else :?>href="<?= base_url('not_found') ;?>"
																		<?php endif ;?> target="_blank" type="button"
																		name="btn_cek_36" style="float: left"
																		class=" btn btn-dark btn-labeled btn-rounded"><b><i
																				class="icon-file-check"></i></b>
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
																			<td><span
																					class="text-dark"><?=$row_neraca['Tahun'] ;?></span>
																			</td>
																		</tr>

																		<tr>
																			<td>Aktiva Lancar</td>
																			<td><span
																					class="text-dark"><?=$row_neraca['aktiva_lancar'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Aktiva Tidak Lancar</td>
																			<td><span
																					class="text-dark"><?=$row_neraca['aktiva_tdk_lancar'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Aktiva Lain-lain</td>
																			<td><span
																					class="text-dark"><?=$row_neraca['aktiva_lain_lain'] ;?></span>
																			</td>
																		</tr>

																		<tr>
																			<td>Kewajiban lancar</td>
																			<td><span
																					class="text-dark"><?=$row_neraca['kewajiban_lancar'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Kewajiban tidak lancar</td>
																			<td><span
																					class="text-dark"><?=$row_neraca['kewajiban_tdk_lancar'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Ekuitas</td>
																			<td><span
																					class="text-dark"><?=$row_neraca['total_ekuitas'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Total Modal</td>
																			<td><span
																					class="text-dark"><?=$row_neraca['total_modal'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Total Kewajiban Ekuitas</td>
																			<td><span
																					class="text-dark"><?=$row_neraca['total_kewajiban_ekuitas'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Total Kewajiban</td>
																			<td><span
																					class="text-dark"><?=$row_neraca['total_kewajiban'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Total Aset</td>
																			<td><span
																					class="text-dark"><?=$row_neraca['total_aset'] ;?></span>
																			</td>
																		</tr>




																	</tbody>
																</table>
															</div>


														</div>
													</div>
												</div>
												<hr>
												<?php endforeach;?>
											</div>
										</div>
									</div>
									<?php endif ;?>
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
												<!--
														<div class="row">
															<div class="col-md-3">
																<div class="content-group-lg">
																	<h6 class="text-semibold">#1</h6>
																	<p class="content-group">KTP</p>
																</div>
															</div>

															<div class="col-md-1">
																<font class="text-semibold" style="font-size: 11px;">Tidak/Ada</font>
																<span class="switch switch-outline switch-icon switch-primary">

																	<label>
																		<input type="checkbox" checked="checked" id="checkbox_18" value="1" onclick="javascript:checkbox18()" name="checkbox_18" />
																		<span></span>
																	</label>
																</span>

															</div>
															<div class="col-md-2">
																<br>
																<a href="<?=$pjbu[0]['file_ktp'] ;?>" target="_blank" type="button" name="btn_cek_13"  style="float: right" class="open-delete btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
															</div>
																<div class="col-md-6">
																	<br>
																	<div class="input-group file-caption-main">
																		<span class="file-caption-icon"></span>
																		<input type="text" id="comment_18" name="comment_18"   class="form-control" disabled="disabled" placeholder="Comment...">


																	<div class="input-group-btn input-group-append">
																		<button type="button" onclick="javascript:get_18()" id="get_18"  disabled="disabled" class="btn btn-dark btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
																			</div>
																	</div>
																</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<div class="content-group-lg">
																	<h6 class="text-semibold">#2</h6>
																	<p class="content-group">NPWP</p>
																</div>
															</div>

															<div class="col-md-1">
																<font class="text-semibold" style="font-size: 11px;">Tidak/Ada</font>
																<span class="switch switch-outline switch-icon switch-primary">

																	<label>
																		<input type="checkbox" checked="checked" id="checkbox_19" value="1" onclick="javascript:checkbox19()" name="checkbox_19" />
																		<span></span>
																	</label>
																</span>

															</div>
															<div class="col-md-2">
																<br>
																<a href="<?=$pjbu[0]['file_npwp'] ;?>" target="_blank" type="button" name="btn_cek_13"  style="float: right" class="open-delete btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
															</div>
																<div class="col-md-6">
																	<br>
																	<div class="input-group file-caption-main">
																		<span class="file-caption-icon"></span>
																		<input type="text" id="comment_19" name="comment_19"   class="form-control" disabled="disabled" placeholder="Comment...">


																	<div class="input-group-btn input-group-append">
																		<button type="button" onclick="javascript:get_19()" id="get_19"  disabled="disabled" class="btn btn-dark btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
																			</div>
																	</div>
																</div>
														</div>-->





											</div>
										</div>
									</div>
									<hr>

									<hr>
									<?php if(!empty($pjbu)) :?>
									<div class="row">
										<div class="col-md-6">
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
															<td>Foto</td>
															<td><a href="<?=$pjbu[0]['foto'] ;?>" target="_blank"
																	type="button" name="btn_cek_13" style="float: right"
																	class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																			class="icon-file-check"></i></b>
																	Softcopy</a>
															</td>
														</tr>
														<tr>
															<td>Nama</td>
															<td><span
																	class="text-dark"><?php echo $pjbu[0]['nama'] ;?></span>
															</td>
														</tr>
														<tr>
															<td>Jabatan</td>
															<td><span
																	class="text-dark"><?php echo $pjbu[0]['jabatan'] ;?></span>
															</td>
														</tr>
														<tr>
															<td>Alamat</td>
															<td><span
																	class="text-dark"><?php echo $pjbu[0]['alamat'] ;?></span>
															</td>
														</tr>
														<tr>
															<td>Email</td>
															<td><span
																	class="text-dark"><?php echo $pjbu[0]['email'] ;?></span>
															</td>
														</tr>
														<tr>
															<td>HP</td>
															<td><span
																	class="text-dark"><?php echo $pjbu[0]['hp'] ;?></span>
															</td>
														</tr>
														<tr>
															<td>NIK</td>
															<td><span
																	class="text-dark"><?php echo $pjbu[0]['nik'] ;?></span>
															</td>
														</tr>
														<tr>
															<td>NPWP</td>
															<td><span
																	class="text-dark"><?php echo $pjbu[0]['npwp'] ;?></span>
															</td>
														</tr>
														<tr>
															<td>STK</td>
															<td><span
																	class="text-dark"><?php echo $pjbu[0]['stk'] ;?></span>
															</td>
														</tr>
														<tr>
															<td>Tgl Lahir</td>
															<td><span
																	class="text-dark"><?php echo $pjbu[0]['tgl_lahir'] ;?></span>
															</td>
														</tr>





													</tbody>
												</table>
											</div>
										</div>
										<div class="col-md-6">
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
															<td>Foto</td>
															<td><a href="<?=$pjbu_perubahan[0]['foto'] ;?>"
																	target="_blank" type="button" name="btn_cek_13"
																	style="float: right"
																	class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																			class="icon-file-check"></i></b>
																	Softcopy</a>
															</td>
														</tr>
														<tr>
															<td>Nama</td>
															<td><span
																	class="text-dark"><?php echo $pjbu_perubahan[0]['nama'] ;?></span>
															</td>
														</tr>
														<tr>
															<td>Jabatan</td>
															<td><span
																	class="text-dark"><?php echo $pjbu_perubahan[0]['jabatan'] ;?></span>
															</td>
														</tr>
														<tr>
															<td>Alamat</td>
															<td><span
																	class="text-dark"><?php echo $pjbu_perubahan[0]['alamat'] ;?></span>
															</td>
														</tr>
														<tr>
															<td>Email</td>
															<td><span
																	class="text-dark"><?php echo $pjbu_perubahan[0]['email'] ;?></span>
															</td>
														</tr>
														<tr>
															<td>HP</td>
															<td><span
																	class="text-dark"><?php echo $pjbu_perubahan[0]['hp'] ;?></span>
															</td>
														</tr>
														<tr>
															<td>NIK</td>
															<td><span
																	class="text-dark"><?php echo $pjbu_perubahan[0]['nik'] ;?></span>
															</td>
														</tr>
														<tr>
															<td>NPWP</td>
															<td><span
																	class="text-dark"><?php echo $pjbu_perubahan[0]['npwp'] ;?></span>
															</td>
														</tr>
														<tr>
															<td>STK</td>
															<td><span
																	class="text-dark"><?php echo $pjbu_perubahan[0]['stk'] ;?></span>
															</td>
														</tr>
														<tr>
															<td>Tgl Lahir</td>
															<td><span
																	class="text-dark"><?php echo $pjbu_perubahan[0]['tgl_lahir'] ;?></span>
															</td>
														</tr>





													</tbody>
												</table>
											</div>
										</div>


									</div>

									<?php endif ;?>
								</div>
								<div class="tab-pane fade" id="pjtbu" role="tabpanel" aria-labelledby="home-tab-1">

									<div class="col-md-12">
										<div class="panel panel-flat panel-collapsed">
											<div class="panel-heading">
												<h5 class="panel-title">PJTBU</h5>
												<div class="heading-elements">

												</div>
											</div>
											<div class="panel-body">
												<!--#1-->





											</div>
										</div>
									</div>

									<hr>
									<hr>
									<?php if(!empty($pjtbu)) :?>
									<div class="row">
										<div class="col-md-6">
											<div class="card card-custom bg-info">
												<div class="card-header border-0">
													<div class="card-title">
														<span class="card-icon">
															<i class="flaticon2-chat-1 text-white"></i>
														</span>
														<h3 class="card-label text-white">PJTBU</h3>
													</div>

												</div>
												<div class="separator separator-solid separator-white opacity-20"></div>
												<div class="card-body text-white">SKK/SKA masih berlaku / PJT : SKK/SKA
													sudah habis masa berlaku</div>

												<div class="card-header border-0">
													<div class="card-title">
														<span class="card-icon">
															<i class="flaticon2-chat-1 text-white"></i>
														</span>
														<select onchange="javascript:check_pjtx(this)"
															id="penilaian_pjt" class="form-control">

															<option value="1">SKK/SKA masih berlaku</option>
															<option value="2">SKK/SKA sudah habis masa berlaku</option>
														</select>
													</div>

												</div>
												<div class="card bg-info">
													<div class="table-responsive bg-info">

														<table class="table table-lg bg-info">
															<thead>
																<tr>
																	<th><textarea id="pjtbu_check"
																			class="form-control form-control-solid"
																			rows="5"></textarea></th>
																	<th><button type="button" onclick="submit_pjtbux()"
																			name="btn_cek_11" style="float: right"
																			class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																					class="icon-file-check"></i></b>
																			Submit</button></th>

																</tr>
															</thead>
														</table>
													</div>
												</div>
											</div>
											<br>
											<hr>
											<div class="accordion accordion-toggle-arrow" id="accordionExample1">

												<?php foreach ($pjtbu as $row_pjtbu) :?>
												<?php $counter_pjtbu+=1 ;?>
												<div class="card">
													<div class="card-header">
														<div class="card-title collapsed" data-toggle="collapse"
															data-target="#data-pjtbu-<?php echo $counter_pjtbu ;?>">
															<?= $row_pjtbu['sub_klasifikasi'].' - '.$row_pjtbu['nama'] ?>
														</div>
													</div>
													<div id="data-pjtbu-<?php echo $counter_pjtbu ;?>"
														class="collapse show" data-parent="#accordionExample1">
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
																		<a <?php if($row_pjtbu['skk']!='') :?>href="<?= $row_pjtbu['skk'] ;?>"
																			<?php else :?>href="<?= base_url('not_found') ;?>"
																			<?php endif ;?> target="_blank"
																			type="button" name="btn_cek_11"
																			style="float: right"
																			class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																					class="icon-file-check"></i></b>
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
																		<a <?php if($row_pjtbu['ijazah']!='') :?>href="<?= $row_pjtbu['ijazah'] ;?>"
																			<?php else :?>href="<?= base_url('not_found') ;?>"
																			<?php endif ;?> target="_blank"
																			type="button" name="btn_cek_11"
																			style="float: right"
																			class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																					class="icon-file-check"></i></b>
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
																		<a <?php if($row_pjtbu['spt']!='') :?>href="<?= $row_pjtbu['spt'] ;?>"
																			<?php else :?>href="<?= base_url('not_found') ;?>"
																			<?php endif ;?> target="_blank"
																			type="button" name="btn_cek_11"
																			style="float: right"
																			class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																					class="icon-file-check"></i></b>
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
																			<td><span
																					class="text-dark"><?php echo $row_pjtbu['nama'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Klasifikasi ACPE AA</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjtbu['klasifikasi_acpe_aa'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Noreg ACPE AA</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjtbu['nomor_registrasi_acpe_aa'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Klasifikasi skk</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjtbu['klasifikasi_skk'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Kualifikasi SKK</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjtbu['kualifikasi_skk'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Tanggal Terbit SKK</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjtbu['tanggal_terbit_skk'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Jenjang SKK</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjtbu['jenjang_skk'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Alamat</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjtbu['alamat'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Noreg SKK</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjtbu['noreg_skk'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Klasifikasi</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjtbu['klasifikasi'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Sub Klasifikasi</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjtbu['sub_klasifikasi'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>NIK</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjtbu['nik'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>NPWP</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjtbu['npwp'] ;?></span>
																			</td>
																		</tr>






																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
												<hr>
												<?php endforeach;?>
											</div>


										</div>
										<div class="col-md-6">
											<div class="accordion accordion-toggle-arrow" id="accordionExample1">

												<?php foreach ($pjtbu_perubahan as $row_pjtbu) :?>
												<?php $counter_pjtbu+=1 ;?>
												<div class="card">
													<div class="card-header">
														<div class="card-title collapsed" data-toggle="collapse"
															data-target="#data-pjtbu-perubahan-<?php echo $counter_pjtbu ;?>">
															<?= $row_pjtbu['nama'].'-'.$row_pjtbu['id_izin'].' - '.$row_pjtbu['sub_klasifikasi'].' - '.$row_pjtbu['kualifikasi']; ?>
														</div>
													</div>
													<div id="data-pjtbu-perubahan-<?php echo $counter_pjtbu ;?>"
														class="collapse show" data-parent="#accordionExample1">
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
																		<a <?php if($row_pjtbu['skk']!='') :?>href="<?= $row_pjtbu['skk'] ;?>"
																			<?php else :?>href="<?= base_url('not_found') ;?>"
																			<?php endif ;?> target="_blank"
																			type="button" name="btn_cek_11"
																			style="float: right"
																			class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																					class="icon-file-check"></i></b>
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
																		<a <?php if($row_pjtbu['ijazah']!='') :?>href="<?= $row_pjtbu['ijazah'] ;?>"
																			<?php else :?>href="<?= base_url('not_found') ;?>"
																			<?php endif ;?> target="_blank"
																			type="button" name="btn_cek_11"
																			style="float: right"
																			class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																					class="icon-file-check"></i></b>
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
																		<a <?php if($row_pjtbu['spt']!='') :?>href="<?= $row_pjtbu['spt'] ;?>"
																			<?php else :?>href="<?= base_url('not_found') ;?>"
																			<?php endif ;?> target="_blank"
																			type="button" name="btn_cek_11"
																			style="float: right"
																			class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																					class="icon-file-check"></i></b>
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
																			<td><span
																					class="text-dark"><?php echo $row_pjtbu['nama'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Klasifikasi ACPE AA</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjtbu['klasifikasi_acpe_aa'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Noreg ACPE AA</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjtbu['nomor_registrasi_acpe_aa'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Klasifikasi skk</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjtbu['klasifikasi_skk'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Kualifikasi SKK</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjtbu['kualifikasi_skk'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Tanggal Terbit SKK</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjtbu['tanggal_terbit_skk'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Jenjang SKK</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjtbu['jenjang_skk'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Alamat</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjtbu['alamat'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Noreg SKK</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjtbu['noreg_skk'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Klasifikasi</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjtbu['klasifikasi'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Sub Klasifikasi</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjtbu['sub_klasifikasi'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>NIK</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjtbu['nik'] ;?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>NPWP</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjtbu['npwp'] ;?></span>
																			</td>
																		</tr>






																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
												<hr>
												<?php endforeach;?>
											</div>


										</div>
									</div>
									<?php endif ;?>
								</div>
								<div class="tab-pane fade" id="pjskbu" role="tabpanel" aria-labelledby="profile-tab-1">

									<div class="col-md-12">
										<div class="panel panel-flat panel-collapsed">
											<div class="panel-heading">
												<h5 class="panel-title">PJSKBU</h5>
												<div class="heading-elements">

												</div>
											</div>
											<div class="panel-body">
												<!--#1-->





											</div>
										</div>
									</div>
									<hr>

									<hr>
									<?php if(!empty($pjskbu)) :?>
									<div class="row">
										<div class="col-md-6">
											<div class="card card-custom bg-info">
												<div class="card-header border-0">
													<div class="card-title">
														<span class="card-icon">
															<i class="flaticon2-chat-1 text-white"></i>
														</span>
														<h3 class="card-label text-white">PJSKBU</h3>
													</div>

												</div>
												<div class="separator separator-solid separator-white opacity-20"></div>
												<div class="card-header border-0">
													<div class="card-title">
														<span class="card-icon">
															<i class="flaticon2-chat-1 text-white"></i>
														</span>
														<select onchange="javascript:check_pjskx(this)"
															id="penilaian_pjsk" class="form-control">

															<option value="1">SKK/SKA masih berlaku</option>
															<option value="2">SKK/SKA sudah habis masa berlaku</option>
														</select>
													</div>

												</div>
												<div class="card bg-info">
													<div class="table-responsive bg-info">

														<table class="table table-lg bg-info">
															<thead>
																<tr>
																	<th><textarea id="pjskbu_check"
																			class="form-control form-control-solid"
																			rows="5"></textarea></th>
																	<th><button type="button" onclick="submit_pjskbux()"
																			name="btn_cek_11" style="float: right"
																			class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																					class="icon-file-check"></i></b>
																			Submit</button></th>

																</tr>
															</thead>
														</table>
													</div>
												</div>
											</div>
											<br>
											<hr>
											<div class="accordion accordion-toggle-arrow" id="accordionExample1">

												<?php foreach ($pjskbu as $row_pjskbu) :?>
												<?php $counter_pjskbu+=1 ;?>
												<div class="card">
													<div class="card-header">
														<div class="card-title collapsed" data-toggle="collapse"
															data-target="#data-pjskbu-<?php echo $counter_pjskbu ;?>">
															<?= $row_pjskbu['id_sub_klasifikasi_pjsk'].' - '.$row_pjskbu['nama'] ?>
														</div>
													</div>
													<div id="data-pjskbu-<?php echo $counter_pjskbu ;?>"
														class="collapse show" data-parent="#accordionExample1">
														<div class="card-body">


															<div class="table-responsive">
																<div class="row">
																	<div class="col-md-3">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#1</h6>
																			<p class="content-group">File SKK</p>
																		</div>
																	</div>


																	<div class="col-md-3">
																		<br>
																		<a <?php if($row_pjskbu['skk']!='') :?>href="<?= $row_pjskbu['skk'] ;?>"
																			<?php else :?>href="<?= base_url('not_found') ;?>"
																			<?php endif ;?> target="_blank"
																			type="button" name="btn_cek_11"
																			style="float: right"
																			class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																					class="icon-file-check"></i></b>
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
																		<a <?php if($row_pjskbu['ijazah']!='') :?>href="<?= $row_pjskbu['ijazah'] ;?>"
																			<?php else :?>href="<?= base_url('not_found') ;?>"
																			<?php endif ;?> target="_blank"
																			type="button" name="btn_cek_11"
																			style="float: right"
																			class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																					class="icon-file-check"></i></b>
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
																		<a <?php if($row_pjskbu['spt']!='') :?>href="<?= $row_pjskbu['spt'] ;?>"
																			<?php else :?>href="<?= base_url('not_found') ;?>"
																			<?php endif ;?> target="_blank"
																			type="button" name="btn_cek_11"
																			style="float: right"
																			class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																					class="icon-file-check"></i></b>
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
																			<td><span
																					class="text-dark"><?php echo $row_pjskbu['nama'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Klasifikasi</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjskbu['klasifikasi'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Sub Klasifikasi</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjskbu['sub_klasifikasi'] ?></span>
																			</td>
																		</tr>

																		<tr>
																			<td>Jenis Tenaga Kerja</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjskbu['jenis_tenaga'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Jenjang SKK</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjskbu['jenjang_skk'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Klasifikasi ACPE AA</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjskbu['klasifikasi_acpe_aa'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Noreg ACPE AA</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjskbu['nomor_registrasi_acpe_aa'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Klasifikasi_skk</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjskbu['klasifikasi_skk'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Kualifikasi SKK</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjskbu['kualifikasi_skk'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Tanggal Terbit SKK</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjskbu['tanggal_terbit_skk'] ?></span>
																			</td>
																		</tr>

																		<tr>
																			<td>NIK</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjskbu['nik'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Noreg</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjskbu['noreg_skk'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>NPWP</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjskbu['npwp'] ?></span>
																			</td>
																		</tr>

																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
												<hr>
												<?php endforeach;?>
											</div>
										</div>
										<div class="col-md-6">
											<div class="accordion accordion-toggle-arrow" id="accordionExample1">

												<?php foreach ($pjskbu_perubahan as $row_pjskbu) :?>
												<?php $counter_pjskbu+=1 ;?>
												<div class="card">
													<div class="card-header">
														<div class="card-title collapsed" data-toggle="collapse"
															data-target="#data-pjskbu-perubahan-<?php echo $counter_pjskbu ;?>">
															<?= $row_pjskbu['nama'].'  '.$row_pjskbu['id_izin'].' - '.$row_pjskbu['id_sub_klasifikasi'].' - '.$row_pjskbu['kualifikasi']; ?>
														</div>
													</div>
													<div id="data-pjskbu-perubahan-<?php echo $counter_pjskbu ;?>"
														class="collapse show" data-parent="#accordionExample1">
														<div class="card-body">


															<div class="table-responsive">
																<div class="row">
																	<div class="col-md-3">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#1</h6>
																			<p class="content-group">File SKK</p>
																		</div>
																	</div>


																	<div class="col-md-3">
																		<br>
																		<a <?php if($row_pjskbu['skk']!='') :?>href="<?= $row_pjskbu['skk'] ;?>"
																			<?php else :?>href="<?= base_url('not_found') ;?>"
																			<?php endif ;?> target="_blank"
																			type="button" name="btn_cek_11"
																			style="float: right"
																			class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																					class="icon-file-check"></i></b>
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
																		<a <?php if($row_pjskbu['ijazah']!='') :?>href="<?= $row_pjskbu['ijazah'] ;?>"
																			<?php else :?>href="<?= base_url('not_found') ;?>"
																			<?php endif ;?> target="_blank"
																			type="button" name="btn_cek_11"
																			style="float: right"
																			class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																					class="icon-file-check"></i></b>
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
																		<a <?php if($row_pjskbu['spt']!='') :?>href="<?= $row_pjskbu['spt'] ;?>"
																			<?php else :?>href="<?= base_url('not_found') ;?>"
																			<?php endif ;?> target="_blank"
																			type="button" name="btn_cek_11"
																			style="float: right"
																			class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																					class="icon-file-check"></i></b>
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
																			<td><span
																					class="text-dark"><?php echo $row_pjskbu['nama'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Klasifikasi</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjskbu['klasifikasi'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Sub Klasifikasi</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjskbu['sub_klasifikasi'] ?></span>
																			</td>
																		</tr>

																		<tr>
																			<td>Jenis Tenaga Kerja</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjskbu['jenis_tenaga'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Jenjang SKK</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjskbu['jenjang_skk'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Klasifikasi ACPE AA</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjskbu['klasifikasi_acpe_aa'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Noreg ACPE AA</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjskbu['nomor_registrasi_acpe_aa'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Klasifikasi_skk</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjskbu['klasifikasi_skk'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Kualifikasi SKK</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjskbu['kualifikasi_skk'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Tanggal Terbit SKK</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjskbu['tanggal_terbit_skk'] ?></span>
																			</td>
																		</tr>

																		<tr>
																			<td>NIK</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjskbu['nik'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>Noreg</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjskbu['noreg_skk'] ?></span>
																			</td>
																		</tr>
																		<tr>
																			<td>NPWP</td>
																			<td><span
																					class="text-dark"><?php echo $row_pjskbu['npwp'] ?></span>
																			</td>
																		</tr>

																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
												<hr>
												<?php endforeach;?>
											</div>
										</div>
									</div>
									<?php endif ;?>
								</div>
								<div class="tab-pane fade" id="peralatan" role="tabpanel"
									aria-labelledby="profile-tab-1">

									<div class="col-md-12">
										<div class="panel panel-flat panel-collapsed">
											<div class="panel-heading">
												<h5 class="panel-title">PERALATAN</h5>
												<div class="heading-elements">

												</div>
											</div>


										</div>
									</div>

									<hr>
									<div class="row">
										<div class="col-md-6">
											<div class="card card-custom bg-info">
												<div class="card-header border-0">
													<div class="card-title">
														<span class="card-icon">
															<i class="flaticon2-chat-1 text-white"></i>
														</span>
														<h3 class="card-label text-white">KEPEMILIKAN PERALATAN</h3>
													</div>

												</div>
												<div class="separator separator-solid separator-white opacity-20"></div>
												<div class="card-header border-0">
													<div class="card-title">
														<span class="card-icon">
															<i class="flaticon2-chat-1 text-white"></i>
														</span>
														<select onchange="javascript:check_peralatan(this)"
															id="penilaian_peralatan" class="form-control">

															<option value="1">Sudah</option>
															<option value="2">Belum Melengkapi Pemenuhan peralatan atau
																Penginputan pemenuhan peralatan di
																https://simpk.pu.go.id/</option>
														</select>
													</div>

												</div>
												<div class="card bg-info">
													<div class="table-responsive bg-info">

														<table class="table table-lg bg-info">
															<thead>
																<tr>
																	<th><textarea id="peralatan_check"
																			class="form-control form-control-solid"
																			rows="5"></textarea></th>
																	<th><button type="button"
																			onclick="submit_peralatan()"
																			name="btn_cek_11" style="float: right"
																			class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																					class="icon-file-check"></i></b>
																			Submit</button></th>

																</tr>
															</thead>
														</table>
													</div>
												</div>
											</div>
											<br>
											<hr>
											<div class="card">
												<?php if(!empty($peralatan)) :?>
												<div class="accordion accordion-toggle-arrow" id="accordionExample1">

													<?php foreach ($peralatan as $row_peralatan) :?>
													<?php $counter_peralatan+=1 ;?>
													<div class="card">
														<div class="card-header">
															<div class="card-title collapsed" data-toggle="collapse"
																data-target="#data-peralatan-<?php echo $counter_peralatan ;?>">
																<?= $row_peralatan['sub_klasifikasi'].' - '.$row_peralatan['jenis_peralatan'] ?>
															</div>
														</div>
														<div id="data-peralatan-<?php echo $counter_peralatan ;?>"
															class="collapse show" data-parent="#accordionExample1">
															<div class="card-body">

																<!--#3-->
																<div class="row">
																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#1</h6>
																			<p class="content-group">Kepemilikan
																				Peralatan</p>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<br>
																		<a <?php if($row_peralatan['kepemilikan_peralatan']!='') :?>href="<?= $row_peralatan['kepemilikan_peralatan'] ;?>"
																			<?php else :?>href="<?= base_url('not_found') ;?>"
																			<?php endif ;?> target="_blank"
																			type="button" name="btn_cek_14"
																			style="float: left"
																			class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																					class="icon-file-check"></i></b>
																			Softcopy</a>
																	</div>
																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#2</h6>
																			<p class="content-group">Foto Plat Nama</p>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<br>
																		<a <?php if($row_peralatan['foto_plat_nama']!='') :?>href="<?= $row_peralatan['foto_plat_nama'] ;?>"
																			<?php else :?>href="<?= base_url('not_found') ;?>"
																			<?php endif ;?> target="_blank"
																			type="button" name="btn_cek_14"
																			style="float: left"
																			class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																					class="icon-file-check"></i></b>
																			Softcopy</a>
																	</div>



																	<!--#4-->


																</div>
																<div class="row">
																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#3</h6>
																			<p class="content-group">Foto Nampak Depan
																			</p>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<br>
																		<a <?php if($row_peralatan['foto_tampak_depan_peralatan']!='') :?>href="<?= $row_peralatan['foto_tampak_depan_peralatan'] ;?>"
																			<?php else :?>href="<?= base_url('not_found') ;?>"
																			<?php endif ;?> target="_blank"
																			type="button" name="btn_cek_14"
																			style="float: left"
																			class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																					class="icon-file-check"></i></b>
																			Softcopy</a>
																	</div>
																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#4</h6>
																			<p class="content-group">Foto Nampak Samping
																			</p>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<br>
																		<a <?php if($row_peralatan['foto_tampak_samping_peralatan']!='') :?>href="<?= $row_peralatan['foto_tampak_samping_peralatan'] ;?>"
																			<?php else :?>href="<?= base_url('not_found') ;?>"
																			<?php endif ;?> target="_blank"
																			type="button" name="btn_cek_14"
																			style="float: left"
																			class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																					class="icon-file-check"></i></b>
																			Softcopy</a>
																	</div>



																	<!--#4-->


																</div>
																<div class="row">
																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#5</h6>
																			<p class="content-group">Hasil Pemeriksaan
																				Pengujian</p>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<br>
																		<a <?php if($row_peralatan['hasil_pemeriksaan_pengujian']!='') :?>href="<?= $row_peralatan['hasil_pemeriksaan_pengujian'] ;?>"
																			<?php else :?>href="<?= base_url('not_found') ;?>"
																			<?php endif ;?> target="_blank"
																			type="button" name="btn_cek_14"
																			style="float: left"
																			class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																					class="icon-file-check"></i></b>
																			Softcopy</a>
																	</div>




																	<!--#4-->


																</div>

																<!--#5-->

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
																				<td>Jenis Peralatan</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['jenis_peralatan'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Hasil Pemeriksaan Pengujian</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['hasil_pemeriksaan_pengujian'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Jenis Bukti Kepemilikan</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['jenis_bukti_kepemilikan'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Kab Kota</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['kab_kota'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Kapasitas Hasil Uji</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['kapasitas_hasil_uji'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Model Type</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['model_type'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Memiliki Peralatan</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['memiliki_peralatan'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Nomor Registrasi Peralatan</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['nomor_registrasi_peralatan'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Provinsi</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['provinsi'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Sub Varian</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['subvarian'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Tahun Pembuatan</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['tahun_pembuatan'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Unit Satuan Kapasitas</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['unit_satuan_kapasitas'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Tipe Peralatan</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['tipe_peralatan'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Tahun Pembuatan</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['tahun_pembuatan'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Kapasitas</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['kapasitas'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Kondisi</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['kondisi'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Harga</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['harga'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Merek</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['merek'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>SEQ</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['seq'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Lokasi</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['lokasi'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Kepemilikan</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['kepemilikan_peralatan'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Keterangan</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['keterangan'] ?></span>
																				</td>
																			</tr>




																		</tbody>
																	</table>
																</div>
															</div>
														</div>
													</div>
													<hr>
													<?php endforeach;?>


												</div>
												<?php endif ;?>
											</div>
										</div>
										<div class="col-md-6">
											<div class="card">
												<?php if(!empty($peralatan_perubahan)) :?>
												<div class="accordion accordion-toggle-arrow" id="accordionExample1">

													<?php foreach ($peralatan_perubahan as $row_peralatan) :?>
													<?php $counter_peralatan+=1 ;?>
													<div class="card">
														<div class="card-header">
															<div class="card-title collapsed" data-toggle="collapse"
																data-target="#data-peralatan-<?php echo $counter_peralatan ;?>">
																<?= $row_peralatan['jenis_peralatan'].' - '.$row_peralatan['id_izin'].' - '.$row_peralatan['sub_klasifikasi'].' - '.$row_peralatan['kualifikasi']; ?>
															</div>
														</div>
														<div id="data-peralatan-<?php echo $counter_peralatan ;?>"
															class="collapse show" data-parent="#accordionExample1">
															<div class="card-body">

																<!--#3-->
																<div class="row">
																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#1</h6>
																			<p class="content-group">Kepemilikan
																				Peralatan</p>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<br>
																		<a <?php if($row_peralatan['kepemilikan_peralatan']!='') :?>href="<?= $row_peralatan['kepemilikan_peralatan'] ;?>"
																			<?php else :?>href="<?= base_url('not_found') ;?>"
																			<?php endif ;?> target="_blank"
																			type="button" name="btn_cek_14"
																			style="float: left"
																			class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																					class="icon-file-check"></i></b>
																			Softcopy</a>
																	</div>
																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#2</h6>
																			<p class="content-group">Foto Plat Nama</p>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<br>
																		<a <?php if($row_peralatan['foto_plat_nama']!='') :?>href="<?= $row_peralatan['foto_plat_nama'] ;?>"
																			<?php else :?>href="<?= base_url('not_found') ;?>"
																			<?php endif ;?> target="_blank"
																			type="button" name="btn_cek_14"
																			style="float: left"
																			class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																					class="icon-file-check"></i></b>
																			Softcopy</a>
																	</div>



																	<!--#4-->


																</div>
																<div class="row">
																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#3</h6>
																			<p class="content-group">Foto Nampak Depan
																			</p>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<br>
																		<a <?php if($row_peralatan['foto_tampak_depan_peralatan']!='') :?>href="<?= $row_peralatan['foto_tampak_depan_peralatan'] ;?>"
																			<?php else :?>href="<?= base_url('not_found') ;?>"
																			<?php endif ;?> target="_blank"
																			type="button" name="btn_cek_14"
																			style="float: left"
																			class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																					class="icon-file-check"></i></b>
																			Softcopy</a>
																	</div>
																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#4</h6>
																			<p class="content-group">Foto Nampak Samping
																			</p>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<br>
																		<a <?php if($row_peralatan['foto_tampak_samping_peralatan']!='') :?>href="<?= $row_peralatan['foto_tampak_samping_peralatan'] ;?>"
																			<?php else :?>href="<?= base_url('not_found') ;?>"
																			<?php endif ;?> target="_blank"
																			type="button" name="btn_cek_14"
																			style="float: left"
																			class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																					class="icon-file-check"></i></b>
																			Softcopy</a>
																	</div>



																	<!--#4-->


																</div>
																<div class="row">
																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#5</h6>
																			<p class="content-group">Hasil Pemeriksaan
																				Pengujian</p>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<br>
																		<a <?php if($row_peralatan['hasil_pemeriksaan_pengujian']!='') :?>href="<?= $row_peralatan['hasil_pemeriksaan_pengujian'] ;?>"
																			<?php else :?>href="<?= base_url('not_found') ;?>"
																			<?php endif ;?> target="_blank"
																			type="button" name="btn_cek_14"
																			style="float: left"
																			class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																					class="icon-file-check"></i></b>
																			Softcopy</a>
																	</div>




																	<!--#4-->


																</div>

																<!--#5-->

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
																				<td>Jenis Peralatan</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['jenis_peralatan'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Hasil Pemeriksaan Pengujian</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['hasil_pemeriksaan_pengujian'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Jenis Bukti Kepemilikan</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['jenis_bukti_kepemilikan'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Kab Kota</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['kab_kota'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Kapasitas Hasil Uji</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['kapasitas_hasil_uji'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Model Type</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['model_type'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Memiliki Peralatan</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['memiliki_peralatan'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Nomor Registrasi Peralatan</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['nomor_registrasi_peralatan'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Provinsi</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['provinsi'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Sub Varian</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['subvarian'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Tahun Pembuatan</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['tahun_pembuatan'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Unit Satuan Kapasitas</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['unit_satuan_kapasitas'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Tipe Peralatan</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['tipe_peralatan'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Tahun Pembuatan</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['tahun_pembuatan'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Kapasitas</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['kapasitas'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Kondisi</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['kondisi'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Harga</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['harga'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Merek</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['merek'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>SEQ</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['seq'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Lokasi</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['lokasi'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Kepemilikan</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['kepemilikan_peralatan'] ?></span>
																				</td>
																			</tr>
																			<tr>
																				<td>Keterangan</td>
																				<td><span
																						class="text-dark"><?php echo $row_peralatan['keterangan'] ?></span>
																				</td>
																			</tr>




																		</tbody>
																	</table>
																</div>
															</div>
														</div>
													</div>
													<hr>
													<?php endforeach;?>


												</div>
												<?php endif ;?>
											</div>
										</div>

									</div>




								</div>






								<div class="tab-pane fade" id="kepemilikan_peralatan" role="tabpanel"
									aria-labelledby="profile-tab-1">





									<div class="row">
										<div class="col-md-3">
											<div class="content-group-lg">
												<h6 class="text-semibold">#1</h6>
												<p class="content-group">Surat Pernyataan</p>
											</div>
										</div>

										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 11px;">Tidak/Ada</font>
											<span class="switch switch-outline switch-icon switch-primary">

												<label>
													<input type="checkbox" checked="checked" id="checkbox_37" value="1"
														onclick="javascript:checkbox37()" name="checkbox_37" />
													<span></span>
												</label>
											</span>

										</div>

										<div class="col-md-8">
											<br>
											<div class="input-group file-caption-main">
												<span class="file-caption-icon"></span>
												<input type="text" id="comment_37" name="comment_37"
													class="form-control" disabled="disabled" placeholder="Comment...">


												<div class="input-group-btn input-group-append">
													<button type="button" onclick="javascript:get37()" id="get_37"
														disabled="disabled"
														class="btn btn-dark btn-ladda btn-ladda-spinner"
														data-spinner-color="#333" data-style="zoom-in"><span
															class="ladda-label">Submit</span></button>
												</div>
											</div>
										</div>
									</div>







									<hr>

									<?php if(!empty($kepemilikan_peralatan)) :?>
									<div class="accordion accordion-toggle-arrow" id="accordionExample1">

										<?php foreach ($kepemilikan_peralatan as $row_kepemilikan_peralatan) :?>
										<?php $counter_kepemilikan_peralatan+=1 ;?>
										<div class="card">
											<div class="card-header">
												<div class="card-title collapsed" data-toggle="collapse"
													data-target="#data-peralatan-<?php echo $counter_kepemilikan_peralatan ;?>">
													<?= $row_kepemilikan_peralatan['sub_klasifikasi'] ?>
												</div>
											</div>
											<div id="data-peralatan-<?php echo $counter_kepemilikan_peralatan ;?>"
												class="collapse show" data-parent="#accordionExample1">
												<div class="card-body">

													<!--#3-->
													<div class="row">
														<div class="col-md-2">
															<div class="content-group-lg">
																<h6 class="text-semibold">#1</h6>
																<p class="content-group">Surat Pernyataan</p>
															</div>
														</div>


														<div class="col-md-4">
															<br>
															<a <?php if($row_kepemilikan_peralatan['surat_pernyataan']!='') :?>href="<?= $row_kepemilikan_peralatan['surat_pernyataan'] ;?>"
																<?php else :?>href="<?= base_url('not_found') ;?>"
																<?php endif ;?> target="_blank" type="button"
																name="btn_cek_14" style="float: left"
																class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																		class="icon-file-check"></i></b> Softcopy</a>
														</div>




														<!--#4-->


													</div>



													<!--#5-->

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
																	<td>Kepemilikan Peralatan</td>
																	<td><span
																			class="text-dark"><?php echo $row_kepemilikan_peralatan['memiliki_peralatan'] ?></span>
																	</td>
																</tr>




															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
										<hr>
										<?php endforeach;?>


									</div>
									<?php endif ;?>
								</div>

								<div class="tab-pane fade show active" id="klasifikasi_kualifikasi" role="tabpanel"
									aria-labelledby="home-tab-1">
									<?php if(!empty($klasifikasi)) :?>
									<div class="col-md-12">
										<!-- Pemegang Saham toggles -->
										<div class="panel panel-flat panel-collapsed">
											<div class="panel-heading">
												<h5 class="panel-title">Klasifikasi & Kualifikasi</h5>
												<div class="heading-elements">

												</div>
											</div>

										</div>
									</div>
									<hr>
									<div class="accordion accordion-toggle-arrow" id="accordionExample1">

										<?php foreach ($klasifikasi as $row_klasifikasi) :?>
										<?php $counter_klasifikasi+=1 ;?>
										<div class="card">
											<div class="card-header">
												<div class="card-title collapsed" data-toggle="collapse"
													data-target="#data-klasifikasi-<?php echo $counter_klasifikasi ;?>">
													<?php echo $row_klasifikasi['id_sub_klasifikasi'].' - '.$row_klasifikasi['id_izin'] ;?>
												</div>
											</div>
											<div id="data-klasifikasi-<?php echo $counter_klasifikasi ;?>"
												class="collapse show" data-parent="#accordionExample1">

												<div class="card-body">
													<div class="row">
														<div class="col-md-2">
															<div class="content-group-lg">
																<h6 class="text-semibold">#</h6>
																<p class="content-group">Pengecekan SKA SKT PJT Per-sub
																	klasifikasi</p>
															</div>
														</div>


														<div class="col-md-4">
															<br>
															<a onclick="javascript:check_pjt(this)"
																name="<?= $row_klasifikasi['id_izin'] ;?>"
																data-toggle="modal" data-target="#modal_pjt"
																class="btn btn-outline-dark mr-3">
																<i class="flaticon-file"></i>Check</a>
														</div>
														<div class="col-md-2">
															<div class="content-group-lg">
																<h6 class="text-semibold">#</h6>
																<p class="content-group">Pengecekan SKA SKT PJSK Per-sub
																	klasifikasi</p>
															</div>
														</div>


														<div class="col-md-4">
															<br>
															<a onclick="javascript:check_pjsk(this)"
																name="<?= $row_klasifikasi['id_izin'] ;?>"
																data-toggle="modal" data-target="#modal_pjsk"
																class="btn btn-outline-dark mr-3">
																<i class="flaticon-file"></i>Check</a>
														</div>




														<!--#4-->


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
																	<td>Asosiasi</td>
																	<td><span
																			class="text-dark"><?php echo $row_klasifikasi['asosiasi'].' - '.$row_klasifikasi['nama_asosiasi'] ;?></span>
																	</td>
																</tr>
																<tr>
																	<td>Klasifikasi</td>
																	<td><span
																			class="text-dark"><?php echo $row_klasifikasi['id_klasifikasi'] ;?></span>
																	</td>
																</tr>
																<tr>
																	<td>Sub Klasifikasi</td>
																	<td><span
																			class="text-dark"><?php echo $row_klasifikasi['id_sub_klasifikasi'] ;?></span>
																	</td>
																</tr>
																<tr>
																	<td>Kualifikasi</td>
																	<td><span
																			class="text-dark"><?php echo $row_klasifikasi['kualifikasi'] ;?></span>
																	</td>
																</tr>
																<tr>
																	<td>Permohonan</td>
																	<td><span
																			class="text-dark"><?php echo $row_klasifikasi['id_permohonan'] ;?></span>
																	</td>
																</tr>

																<tr>
																	<td>Nomor KBLI</td>
																	<td><span
																			class="text-dark"><?php echo $row_klasifikasi['nomor_kbli'] ;?></span>
																	</td>
																</tr>
																<tr>
																	<td>Jenis Usaha</td>
																	<td><span
																			class="text-dark"><?php echo $row_klasifikasi['jenis_usaha'] ;?></span>
																	</td>
																</tr>
																<tr>
																	<td>Sifat Badan Usaha</td>
																	<td><span
																			class="text-dark"><?php echo $row_klasifikasi['nama_sifat'] ;?></span>
																	</td>
																</tr>
																<tr>
																	<td>User Email</td>
																	<td><span
																			class="text-dark"><?php echo $row_klasifikasi['user_email'] ;?></span>
																	</td>
																</tr>
																<tr>
																	<td>User HP</td>
																	<td><span
																			class="text-dark"><?php echo $row_klasifikasi['user_hp'] ;?></span>
																	</td>
																</tr>





															</tbody>
														</table>
													</div>


												</div>
											</div>
										</div>
										<hr>
										<?php endforeach;?>


									</div>
									<?php endif ;?>
								</div>




							</div>
						</div>


					</div>




				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">

	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="card-header card-header-right ribbon ribbon-clip ribbon-left">
				<div class="ribbon-target" style="top: 12px;font-size: 20px;">
					<?php if($data_check['status']=='FALSE') :?>
					<span class="ribbon-inner bg-warning"></span>BELUM SESUAI
					<?php else: ?>
					<span class="ribbon-inner bg-info"></span>SESUAI
					<?php endif ;?>
				</div>
				<h3 class="card-title">


					<h5 class="modal-title" id="exampleModalLabel">Pengecekan PJT & PJSK Sudah Terpakai<br><span
							class="text-danger">Seluruh Tenaga Kerja Tidak Boleh terdaftar di BUJK lain jika ingin lolos
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
								<td><?=$data_check['data_pjt'][0]['nama_tk']?></td>
								<td><span class="text-dark"><?=$data_check['data_pjt'][0]['nama_bujk']?></span></td>
								<td><span class="text-dark"><?=$data_check['data_pjt'][0]['npwp_bujk']?></span></td>
								<?php if($data_check['data_pjt'][0]['status']=='FALSE') :?>
								<td><span class="label label-lg label-danger label-pill label-inline mr-2">Terdaftar Di
										BUJK Lain</span>
									<!-- <a  onclick="javascript:kembalikan_permohonan(this)" name="<?= $nib_dec ;?>" id="<?=$tgl_dec;?>" class="btn btn-outline-danger btn-sm mr-3">
												<i class="la la-trash"></i>Kembalikan Berkas</a></td> -->
									<?php else :?>
								<td><span class="label label-lg label-info label-pill label-inline mr-2">Memenuhi</span>
								</td>

								<?php endif ;?>
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
							<?php foreach ($data_check['data_pjsk'] as $pjsk) :?>
							<tr>
								<td><?=$pjsk['nama_tk']?></td>

								<td><span class="text-dark"><?=$pjsk['sub_klasifikasi']?></span></td>
								<td><span class="text-dark"><?=$pjsk['nama_bujk']?></span></td>
								<td><span class="text-dark"><?=$pjsk['npwp_bujk']?></span></td>
								<?php if($pjsk['status']=='FALSE') :?>
								<td><span class="label label-lg label-danger label-pill label-inline mr-2">Terdaftar Di
										BUJK Lain</span>
									<!-- <a disabled onclick="javascript:kembalikan(this)" name="<?= $pjsk['id_izin'] ;?>" id="<?=$pjsk['sub_klasifikasi']?>" class="btn btn-outline-danger btn-sm mr-3">
															<i class="la la-trash"></i>Kembalikan Berkas</a> -->
								</td>
								<?php else :?>
								<td><span class="label label-lg label-info label-pill label-inline mr-2">Memenuhi</span>
								</td>

								<?php endif ;?>
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
							<?php foreach ($data_check['data_pjbu'] as $pjbux) :?>
							<tr>
								<td><?=$pjbux['nama_tk']?></td>
								<td><span class="text-dark"><?=$pjbux['nik_tk']?></span></td>
								<td><span class="text-dark"><?=$pjbux['sub_klasifikasi']?></span></td>

								<td><span class="text-dark"><?=$pjbux['nama_bujkx']?></span></td>

								<?php if($pjbux['status']=='FALSE') :?>
								<td><span class="label label-lg label-danger label-pill label-inline mr-2">Terdaftar Di
										BUJK Lain</span>
									<!-- <a disabled onclick="javascript:kembalikan(this)" name="<?= $pjsk['id_izin'] ;?>" id="<?=$pjsk['sub_klasifikasi']?>" class="btn btn-outline-danger btn-sm mr-3">
															<i class="la la-trash"></i>Kembalikan Berkas</a> -->
								</td>
								<?php else :?>
								<td><span class="label label-lg label-info label-pill label-inline mr-2">Memenuhi</span>
								</td>

								<?php endif ;?>
								<?php endforeach; ?>
							</tr>






						</tbody>
					</table>
				</div>




				</tbody>
				</table>
				< </div> <div class="modal-footer">
					<button type="button" class="btn btn-light-dark font-weight-bold"
						data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modal_pjt" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeLg"
	aria-hidden="true">
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
<div class="modal fade" id="modal_pjsk" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeLg"
	aria-hidden="true">
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
	function getval(sel)
	{
		if(sel.value=="1"){
			document.querySelector('#tgl_2').value='-';
			document.querySelector('#rencana_perbaikan').value='-';
			$("#hasil_akhir").val("1");
		}
	}
	function getval2(sel)
	{
		if(sel.value=="1"){
			
			$("#hasil_akhir").val("1");
			$("#jenis_temuan").val("1");
		}
	}
	function check_anggota(sel) {
		var e = document.getElementById("penilaian_anggota");
		var value = e.value;
		console.log(value);
		if (value == '2') {
			document.getElementById("keanggotaan_asosiasi").value += "KTA Asosiasi Habis masa berlaku <br>\n";
		}



	}

	function submit_anggota() {
		var e = document.getElementById("keanggotaan_asosiasi");
		var value = e.value;
		console.log(value);
		var count2 = document.getElementById("count_nomer");
		var count = parseInt(count2.value, 10);
		count+=1;
		document.getElementById("count_nomer").value=count;
		document.getElementById("ketidaksesuaian").value += count+". Penilaian Keanggotaan Asosiasi : " + value + " <br>\n";


		Swal.fire({
			icon: "success",
			title: "Peilaian Berhasil Disubmit pada Inputan Ketidak Sesuaian",
			showConfirmButton: false,
			timer: 1500
		});

	}

	function check_penjualan(sel) {
		var e = document.getElementById("penilaian_penjualan");
		var value = e.value;
		var text = e.options[e.selectedIndex].text;
		console.log(value);
		if (value != '1') {
			document.getElementById("penjualan_tahunan_check").value += text;

		}


	}

	function submit_penjualan_tahunan() {
		var e = document.getElementById("penjualan_tahunan_check");
		var value = e.value;
		console.log(value);
		var count2 = document.getElementById("count_nomer");
		var count = parseInt(count2.value, 10);
		count+=1;
		document.getElementById("count_nomer").value=count;
		document.getElementById("ketidaksesuaian").value += count+". Penilaian Penjualan Tahunan : " + value + " <br>\n";
		Swal.fire({
			icon: "success",
			title: "Peilaian Berhasil Disubmit pada Inputan Ketidak Sesuaian",
			showConfirmButton: false,
			timer: 1500
		});
	}

	function check_keuangan(sel) {
		var e = document.getElementById("penilaian_keuangan");
		var value = e.value;
		var text = e.options[e.selectedIndex].text;
		console.log(value);
		if (value != '1') {
			document.getElementById("keuangan_check").value += text;

		}
	}

	function submit_keuangan() {
		var e = document.getElementById("keuangan_check");
		var value = e.value;
		console.log(value);
		var count2 = document.getElementById("count_nomer");
		var count = parseInt(count2.value, 10);
		count+=1;
		document.getElementById("count_nomer").value=count;
		document.getElementById("ketidaksesuaian").value += count+". Penilaian Keuangan : " + value + " <br>\n";
		Swal.fire({
			icon: "success",
			title: "Peilaian Berhasil Disubmit pada Inputan Ketidak Sesuaian",
			showConfirmButton: false,
			timer: 1500
		});
	}

	function check_pjtx(sel) {
		var e = document.getElementById("penilaian_pjt");
		var value = e.value;
		var text = e.options[e.selectedIndex].text;
		console.log(value);
		if (value != '1') {
			document.getElementById("pjtbu_check").value += text;

		}
	}

	function submit_pjtbux() {
		var e = document.getElementById("pjtbu_check");
		var value = e.value;
		console.log(value);
		var count2 = document.getElementById("count_nomer");
		var count = parseInt(count2.value, 10);
		count+=1;
		document.getElementById("count_nomer").value=count;
		document.getElementById("ketidaksesuaian").value += count+". Penilaian PJTBU : " + value + " <br>\n";
		Swal.fire({
			icon: "success",
			title: "Peilaian Berhasil Disubmit pada Inputan Ketidak Sesuaian",
			showConfirmButton: false,
			timer: 1500
		});
	}

	function check_pjskx(sel) {
		var e = document.getElementById("penilaian_pjsk");
		var value = e.value;
		var text = e.options[e.selectedIndex].text;
		console.log(value);
		if (value != '1') {
			document.getElementById("pjskbu_check").value += text;

		}


	}

	function submit_pjskbux() {
		var e = document.getElementById("pjskbu_check");
		var value = e.value;
		console.log(value);
		var count2 = document.getElementById("count_nomer");
		var count = parseInt(count2.value, 10);
		count+=1;
		document.getElementById("count_nomer").value=count;
		document.getElementById("ketidaksesuaian").value += count+". Penilaian PJSKBU : " + value + " <br>\n";
		Swal.fire({
			icon: "success",
			title: "Peilaian Berhasil Disubmit pada Inputan Ketidak Sesuaian",
			showConfirmButton: false,
			timer: 1500
		});
	}

	function check_peralatan(sel) {
		var e = document.getElementById("penilaian_peralatan");
		var value = e.value;
		var text = e.options[e.selectedIndex].text;
		console.log(value);
		if (value != '1') {
			document.getElementById("peralatan_check").value += text;

		}


	}

	function submit_peralatan() {
		var e = document.getElementById("peralatan_check");
		var value = e.value;
		console.log(value);
		var count2 = document.getElementById("count_nomer");
		var count = parseInt(count2.value, 10);
		count+=1;
		document.getElementById("count_nomer").value=count;
		document.getElementById("ketidaksesuaian").value += count+". Penilaian Peralatan : " + value + " <br>\n";
		Swal.fire({
			icon: "success",
			title: "Peilaian Berhasil Disubmit pada Inputan Ketidak Sesuaian",
			showConfirmButton: false,
			timer: 1500
		});
	}

	function check_smap(sel) {
		var e = document.getElementById("penilaian_smap");
		var value = e.value;
		var text = e.options[e.selectedIndex].text;
		console.log(value);
		if (value != '1') {
			document.getElementById("smap_check").value += text;

		}


	}

	function submit_smap() {
		var e = document.getElementById("smap_check");
		var value = e.value;
		console.log(value);
		var count2 = document.getElementById("count_nomer");
		var count = parseInt(count2.value, 10);
		count+=1;
		document.getElementById("count_nomer").value=count;
		document.getElementById("ketidaksesuaian").value += count+". Penilaian SMAP : " + value + " <br>\n";
		Swal.fire({
			icon: "success",
			title: "Peilaian Berhasil Disubmit pada Inputan Ketidak Sesuaian",
			showConfirmButton: false,
			timer: 1500
		});
	}
	$(document).ready(function () {
		$("form").bind("keypress", function (e) {
			if (e.keyCode == 13) {
				return false;
			}
		});
	});
	$('#tgl_1').datepicker({
		format: 'yyyy-mm-dd'
	}).on('hide', function (event) {
		event.preventDefault();
		event.stopPropagation();
	});
	$('#tgl_2').datepicker({
		format: 'yyyy-mm-dd'
	}).on('hide', function (event) {
		event.preventDefault();
		event.stopPropagation();
	});
	$(document).keyup(function (event) {
		if (event.key == "Enter") {
			alert('Silahkan Gunakan Tombol!');
		}
	});
</script>
<script type="text/javascript">
	var cek = '<?=$data_check['
	status '];?>';

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
			url: "<?= base_url('sertifikasi/get_pjsk_asesor')?>",
			type: "POST",
			data: {
				id_izin: id_izin_value,
			},
			success: function (data) {
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
				if (typeof array != "undefined" && array != null && array.length != null && array.length > 0) {

					array.forEach(function (element) {

						element.ska.forEach(function (elementx) {
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

					array2.forEach(function (element) {

						element.skt.forEach(function (elementx) {
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
			error: function (xhr, status, error) {
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
			url: "<?= base_url('sertifikasi/get_pjt_asesor')?>",
			type: "POST",
			data: {
				id_izin: id_izin_value,
			},
			success: function (data) {
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
				if (typeof array != "undefined" && array != null && array.length != null && array.length > 0) {
					array.forEach(function (element) {
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
					array2.forEach(function (element) {
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
			error: function (xhr, status, error) {
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
		}).then(function (result) {
			if (result.value) {
				Swal.fire({
					title: "Mohon Tunggu!",
					text: "Sedang Berjalan",
					onOpen: function () {
						Swal.showLoading();

					}
				});
				jQuery.ajax({
					url: "<?= base_url('sertifikasi/pengembalian_berkas_izin')?>",
					type: "POST",
					data: {
						id_izin: id_izin_value,
						id_sub_klasifikasi: sub_klasifikasi_value
					},
					success: function (data) {
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
								"<?= base_url('sertifikasi/list_tinjauan_permohonan');?>");

						}

					},
					error: function (xhr, status, error) {
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
		}).then(function (result) {
			if (result.value) {
				Swal.fire({
					title: "Mohon Tunggu!",
					text: "Sedang Berjalan",
					onOpen: function () {
						Swal.showLoading();

					}
				});
				jQuery.ajax({
					url: "<?= base_url('sertifikasi/pengembalian_berkas_permohonan')?>",
					type: "POST",
					data: {
						nib: nib_value,
						tgl_permohonan: tgl_value
					},
					success: function (data) {
						response = jQuery.parseJSON(data);
						Swal.fire(
							'Success',
							'Data permohonan berhasil dikembalikan!',
							'success'
						);

						window.location.replace(
							"<?= base_url('sertifikasi/list_tinjauan_permohonan');?>");
					},
					error: function (xhr, status, error) {
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

		Swal.fire({
			title: "Anda ingin mem-verifikasi PERUBAHAN ?",
			text: "Proses akan menyatakan lolos mengenerate QR dan cetak Sertifikat Perubahan",
			icon: "warning",
			showCancelButton: true,
			confirmButtonText: "YA !",
			cancelButtonText: "No, Batalkan!",
			reverseButtons: true
		}).then(function (result) {
			if (result.value) {
				Swal.fire({
					title: "Mohon Tunggu!",
					text: "Sedang Berjalan",
					onOpen: function () {
						Swal.showLoading();

					}
				});
				var id_izin_value = document.querySelector('#id_izin_dex').value;
				$.ajax({
					url: "<?php echo base_url('sertifikasi/insert_verifikasi_perubahan'); ?>",
					type: "POST",
					data: {
						id_izin: id_izin_value,
					},
					success: function (data) {
						response = jQuery.parseJSON(data);

						console.log(response);
						if (response.result == 1) {
							Swal.fire({

								icon: "success",
								title: "Berhasil submit perubahan",
								showConfirmButton: false,
								timer: 1500
							});
						} else {
							Swal.fire({

								icon: "error",
								title: response.result,
								showConfirmButton: false,
								timer: 1500
							});
						}


					},
					error: function (xhr, status, error) {
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
		$(function () {
			toastr["success"]("Link berhasi di copy", "Success")


		});
	}
</script>