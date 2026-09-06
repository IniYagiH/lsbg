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


	<div class="d-flex flex-column-fluid">
		<div class="container">
			<div class="card card-custom gutter-b">

				
				<div class="card-header">
					<div class="card-title">
						<h3 class="card-label">Cetakan Penilaian</h3>


					</div>
					<div class="card-toolbar">

					</div>
				</div>
				<div class="card-header">

					<div class="card-toolbar">


				
						<a href="<?= base_url('sertifikasi/falt02/'.$nib_dec.'/'.$tgl_dec.'/'.$user_dec) ;?>"
							target="_blank" style="margin:5px;" class="btn btn-warning font-weight-bolder">
							<i class="flaticon2-cup"></i>FTP02</a>
						


					</div>
				</div>
				
				<div class="card-body">
					<br>
					<div class="example mb-11">
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
								<li class="nav-item">
									<a class="nav-link" id="contact-tab-1" data-toggle="tab" href="#klasifikasi_cetak"
										aria-controls="contact">
										<span class="nav-icon">
											<i class="flaticon2-file text-danger"></i>
										</span>
										<span class="nav-text">Klasifikasi Cetak</span>
									</a>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
										aria-haspopup="true" aria-expanded="false">
										<span class="nav-icon">
											<i class="flaticon-home"></i>
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
									<a class="nav-link" id="contact-tab-1" data-toggle="tab" href="#penilaian"
										aria-controls="contact">
										<span class="nav-icon">
											<i class="flaticon2-notepad text-danger"></i>
										</span>
										<span class="nav-text">Penilaian</span>
									</a>
								</li>




							</ul>
							

							<div class="tab-content mt-5" id="myTabContent1">
							<div class="tab-pane fade show" id="klasifikasi_cetak" role="tabpanel"
									aria-labelledby="home-tab-1">









									<div class="card card-custom">
										<div class="card-header border-0 bg-primary">
											<div class="card-title">
												<span class="card-icon">
													<i class="flaticon2-chat-1 text-white"></i>
												</span>
												<h3 class="card-label text-white">Check Sub Klas Cetak</h3>
											</div>

										</div>
										<div class="separator separator-solid opacity-20"></div>
										<div class="card-body">
											<div class="table-responsive">


												<table class="table table-lg">
													<thead>
														<tr>
															<th>Sub Klasifikasi</th>
															<th>Kualifikasi</th>
															<th>Check Tinjauan</th>

														</tr>
													</thead>
													<tbody>
														<?php foreach($klasifikasi_cetak as $row_klas) :?>

														<tr>
															<td><br><?=$row_klas['id_sub_klasifikasi'];?></td>
															<td><br><?=$row_klas['kualifikasi'];?></td>




															<td>
																<a href="<?= base_url('sertifikasi/tinjauan_permohonan_izin/'.$row_klas['id_izin']) ;?>"
																	target="_blank" type="button" name="btn_cek_36"
																	style="float: left"
																	class=" btn btn-dark btn-labeled btn-rounded"><b><i
																			class="icon-file-check"></i></b> Cek
																	Tinjauan</a>

															</td>

														</tr>
														<?php endforeach ;?>





													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>	
							<div class="tab-pane fade" id="administrasi" role="tabpanel"
									aria-labelledby="home-tab-1">
									<?php if(!empty($biodata)) :?>
									<div class="col-md-12">
										<div class="panel panel-flat panel-collapsed">
											<div class="panel-heading">
												<h5 class="panel-title">Verifikasi & Validasi Personalia </h5>
												<div class="heading-elements">

												</div>
											</div>

											<div class="panel-body">

												<!--3-->
												<div class="row">
													<div class="col-md-3">
														<div class="content-group-lg">
															<h6 class="text-semibold">#1</h6>
															<p class="content-group">Surat Pernyataan Tanggung Jawab
																Mutlak</p>
														</div>
													</div>
													<div class="col-md-2">
														<br>
														<a <?php if($biodata[0]['sptjm']!='') :?>href="<?= $biodata[0]['sptjm'] ;?>"
															<?php else :?>href="<?= base_url('not_found') ;?>"
															<?php endif ;?> target="_blank" type="button"
															name="btn_cek_11" style="float: right"
															class="open-delete btn btn-primary btn-labeled btn-rounded"><b><i
																	class="icon-file-check"></i></b> Softcopy</a>
													</div>

													
												
													
											
												</div>




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
																class="text-dark"><?php echo $biodata[0]['klasifikasi_jenis_usaha'] ;?></span>
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
									<?php endif ;?>
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
								<div class="tab-pane fade" id="peralatan" role="tabpanel"
									aria-labelledby="profile-tab-1">

									<legend>Peralatan</legend>

									
									<hr>
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
																<p class="content-group">Kepemilikan Peralatan</p>
															</div>
														</div>


														<div class="col-md-4">
															<br>
															<a <?php if($row_peralatan['kepemilikan_peralatan']!='') :?>href="<?= $row_peralatan['kepemilikan_peralatan'] ;?>"
																<?php else :?>href="<?= base_url('not_found') ;?>"
																<?php endif ;?> target="_blank" type="button"
																name="btn_cek_14" style="float: left"
																class="open-delete btn btn-primary btn-labeled btn-rounded"><b><i
																		class="icon-file-check"></i></b> Softcopy</a>
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
																<?php endif ;?> target="_blank" type="button"
																name="btn_cek_14" style="float: left"
																class="open-delete btn btn-primary btn-labeled btn-rounded"><b><i
																		class="icon-file-check"></i></b> Softcopy</a>
														</div>


														<!--#4-->


													</div>
													<div class="row">
														<div class="col-md-2">
															<div class="content-group-lg">
																<h6 class="text-semibold">#3</h6>
																<p class="content-group">Foto Nampak Depan</p>
															</div>
														</div>


														<div class="col-md-4">
															<br>
															<a <?php if($row_peralatan['foto_tampak_depan_peralatan']!='') :?>href="<?= $row_peralatan['foto_tampak_depan_peralatan'] ;?>"
																<?php else :?>href="<?= base_url('not_found') ;?>"
																<?php endif ;?> target="_blank" type="button"
																name="btn_cek_14" style="float: left"
																class="open-delete btn btn-primary btn-labeled btn-rounded"><b><i
																		class="icon-file-check"></i></b> Softcopy</a>
														</div>
														<div class="col-md-2">
															<div class="content-group-lg">
																<h6 class="text-semibold">#4</h6>
																<p class="content-group">Foto Nampak Samping</p>
															</div>
														</div>


														<div class="col-md-4">
															<br>
															<a <?php if($row_peralatan['foto_tampak_samping_peralatan']!='') :?>href="<?= $row_peralatan['foto_tampak_samping_peralatan'] ;?>"
																<?php else :?>href="<?= base_url('not_found') ;?>"
																<?php endif ;?> target="_blank" type="button"
																name="btn_cek_14" style="float: left"
																class="open-delete btn btn-primary btn-labeled btn-rounded"><b><i
																		class="icon-file-check"></i></b> Softcopy</a>
														</div>



														<!--#4-->


													</div>
													<div class="row">
														<div class="col-md-2">
															<div class="content-group-lg">
																<h6 class="text-semibold">#5</h6>
																<p class="content-group">Hasil Pemeriksaan Pengujian</p>
															</div>
														</div>


														<div class="col-md-4">
															<br>
															<a <?php if($row_peralatan['hasil_pemeriksaan_pengujian']!='') :?>href="<?= $row_peralatan['hasil_pemeriksaan_pengujian'] ;?>"
																<?php else :?>href="<?= base_url('not_found') ;?>"
																<?php endif ;?> target="_blank" type="button"
																name="btn_cek_14" style="float: left"
																class="open-delete btn btn-primary btn-labeled btn-rounded"><b><i
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
																	<th>Chechkils</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>Jenis Peralatan</td>
																	<td><span
																			class="text-primary"><?php echo $row_peralatan['jenis_peralatan'] ?></span>
																	</td>
																
																</tr>


																<tr>
																	<td>Kab Kota</td>
																	<td><span
																			class="text-primary"><?php echo $row_peralatan['kab_kota'] ?></span>
																	</td>
																	
																</tr>
																<tr>
																	<td>Kapasitas Hasil Uji</td>
																	<td><span
																			class="text-primary"><?php echo $row_peralatan['kapasitas_hasil_uji'] ?></span>
																	</td>
																	
																</tr>
																<tr>
																	<td>Model Type</td>
																	<td><span
																			class="text-primary"><?php echo $row_peralatan['model_type'] ?></span>
																	</td>
																
																</tr>
																<tr>
																	<td>Memiliki Peralatan</td>
																	<td><span
																			class="text-primary"><?php echo $row_peralatan['memiliki_peralatan'] ?></span>
																	</td>
																	
																</tr>
																<tr>
																	<td>Nomor Registrasi Peralatan</td>
																	<td><span
																			class="text-primary"><?php echo $row_peralatan['nomor_registrasi_peralatan'] ?></span>
																	</td>
																
																</tr>
																<tr>
																	<td>Provinsi</td>
																	<td><span
																			class="text-primary"><?php echo $row_peralatan['provinsi'] ?></span>
																	</td>
																	
																</tr>
																<tr>
																	<td>Sub Varian</td>
																	<td><span
																			class="text-primary"><?php echo $row_peralatan['subvarian'] ?></span>
																	</td>
																	
																</tr>
																<tr>
																	<td>Tahun Pembuatan</td>
																	<td><span
																			class="text-primary"><?php echo $row_peralatan['tahun_pembuatan'] ?></span>
																	</td>
																	
																</tr>
																<tr>
																	<td>Unit Satuan Kapasitas</td>
																	<td><span
																			class="text-primary"><?php echo $row_peralatan['unit_satuan_kapasitas'] ?></span>
																	</td>
																
																</tr>
																<tr>
																	<td>Tipe Peralatan</td>
																	<td><span
																			class="text-primary"><?php echo $row_peralatan['tipe_peralatan'] ?></span>
																	</td>
																
																</tr>
																<tr>
																	<td>Tahun Pembuatan</td>
																	<td><span
																			class="text-primary"><?php echo $row_peralatan['tahun_pembuatan'] ?></span>
																	</td>
																	
																</tr>
																<tr>
																	<td>Kapasitas</td>
																	<td><span
																			class="text-primary"><?php echo $row_peralatan['kapasitas'] ?></span>
																	</td>
																
																</tr>
																<tr>
																	<td>Kondisi</td>
																	<td><span
																			class="text-primary"><?php echo $row_peralatan['kondisi'] ?></span>
																	</td>
																	
																</tr>
																<tr>
																	<td>Harga</td>
																	<td><span
																			class="text-primary"><?php echo $row_peralatan['harga'] ?></span>
																	</td>
																
																</tr>
																<tr>
																	<td>Merek</td>
																	<td><span
																			class="text-primary"><?php echo $row_peralatan['merek'] ?></span>
																	</td>
																</tr>
																<tr>
																	<td>SEQ</td>
																	<td><span
																			class="text-primary"><?php echo $row_peralatan['seq'] ?></span>
																	</td>
																	
																</tr>
																<tr>
																	<td>Lokasi</td>
																	<td><span
																			class="text-primary"><?php echo $row_peralatan['lokasi'] ?></span>
																	</td>
																	
																</tr>

																<tr>
																	<td>Keterangan</td>
																	<td><span
																			class="text-primary"><?php echo $row_peralatan['keterangan'] ?></span>
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
								<div class="tab-pane fade" id="kepemilikan_peralatan" role="tabpanel"
									aria-labelledby="profile-tab-1">












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
																class="open-delete btn btn-primary btn-labeled btn-rounded"><b><i
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
																			class="text-primary"><?php echo $row_kepemilikan_peralatan['memiliki_peralatan'] ?></span>
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
<div class="tab-pane fade" id="pengurus" role="tabpanel"
									aria-labelledby="profile-tab-1">

									<legend>Pengurus</legend>

									<!--
										<div class="row">
											<div class="col-md-3">
												<div class="content-group-lg">
													<h6 class="text-semibold">#1</h6>
													<p class="content-group">KTP Pengurus</p>
												</div>
											</div>

											<div class="col-md-1">
												<font class="text-semibold" style="font-size: 10px;">Tidak/Ada</font>
												<span class="switch switch-outline switch-icon switch-primary">

													<label>
														<input type="checkbox" <?php if(!empty($ceklis)):?> <?php if($data_ceklis6=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_6" value="1" onclick="javascript:checkbox6()" name="checkbox_6" />
														<span></span>
													</label>
												</span>

											</div>
											<div class="col-md-1">
												<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
												<span class="switch switch-outline switch-icon switch-dark">

													<label>
														<input type="checkbox" <?php if(!empty($ceklis_2)):?> <?php if($data_ceklis6_2=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_6_2" value="1" onclick="javascript:checkbox6_2()" name="checkbox_6_2" />
														<span></span>
													</label>
												</span>

											</div>

												<div class="col-md-7">
													<br>
													<div class="input-group file-caption-main">
														<span class="file-caption-icon"></span>
														<input type="text" id="comment_6" name="comment_6"   class="form-control" <?php if(!empty($ceklis)):?> value="<?=$data_comment6;?>"<?php else :?> disabled="disabled" <?php endif ;?> placeholder="Comment...">



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
												<font class="text-semibold" style="font-size: 10px;">Tidak/Ada</font>
												<span class="switch switch-outline switch-icon switch-primary">

													<label>
														<input type="checkbox" <?php if(!empty($ceklis)):?> <?php if($data_ceklis7=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_7" value="1" onclick="javascript:checkbox7()" name="checkbox_7" />
														<span></span>
													</label>
												</span>

											</div>
											<div class="col-md-1">
												<font class="text-semibold" style="font-size: 10px;">Tdak/Valid</font>
												<span class="switch switch-outline switch-icon switch-dark">

													<label>
														<input type="checkbox" <?php if(!empty($ceklis_2)):?> <?php if($data_ceklis7_2=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_7_2" value="1" onclick="javascript:checkbox7()" name="checkbox_7_2" />
														<span></span>
													</label>
												</span>

											</div>

												<div class="col-md-7">
													<br>
													<div class="input-group file-caption-main">
														<span class="file-caption-icon"></span>
														<input type="text" id="comment_7" name="comment_7"   class="form-control" <?php if(!empty($ceklis)):?> value="<?=$data_comment7;?>"<?php else :?> disabled="disabled" <?php endif ;?>placeholder="Comment...">



													</div>
												</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<div class="content-group-lg">
													<h6 class="text-semibold">#3</h6>
													<p class="content-group">Foto Pengurus</p>
												</div>
											</div>

											<div class="col-md-1">
												<font class="text-semibold" style="font-size: 10px;">Tidak/Ada</font>
												<span class="switch switch-outline switch-icon switch-primary">

													<label>
														<input type="checkbox" <?php if(!empty($ceklis)):?> <?php if($data_ceklis8=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_8" value="1" onclick="javascript:checkbox8()" name="checkbox_8" />
														<span></span>
													</label>
												</span>

											</div>
											<div class="col-md-1">
												<font class="text-semibold" style="font-size: 10px;">Tdak/Valid</font>
												<span class="switch switch-outline switch-icon switch-dark">

													<label>
														<input type="checkbox" <?php if(!empty($ceklis_2)):?> <?php if($data_ceklis8_2=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_8_2" value="1" onclick="javascript:checkbox8()" name="checkbox_8_2" />
														<span></span>
													</label>
												</span>

											</div>

												<div class="col-md-7">
													<br>
													<div class="input-group file-caption-main">
														<span class="file-caption-icon"></span>
														<input type="text" id="comment_8" name="comment_8"   class="form-control" <?php if(!empty($ceklis)):?> value="<?=$data_comment8;?>"<?php else :?> disabled="disabled" <?php endif ;?>placeholder="Comment...">



													</div>
												</div>
										</div>
									-->
									<hr>
									
									<?php if(!empty($pengurus)) :?>
									<div class="accordion accordion-toggle-arrow" id="accordionExample1">

										<?php foreach ($pengurus as $row_pengurus) :?>
										<?php $counter_pengurus+=1 ;
													$nik=$row_pengurus['no_ktp'];
													for($i=0;$i<count($pengurus_asesor);$i++){
														if($nik==$pengurus_asesor[$i]['NIK']){
															$counx=$i;
															break;
														}
													}

													?>
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
																		<a href="<?=$row_pengurus['persyaratan_ktp_img'];?>" target="_blank" type="button" name="btn_cek_14"  style="float: left" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																	</div>




																</div>

																<div class="row">
																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#2</h6>
																			<p class="content-group">NPWP</p>
																		</div>
																	</div>

																	<div class="col-md-4">
																		<br>
																		<a href="<?=$row_pengurus['persyaratan_npwp_img'];?>" target="_blank" type="button" name="btn_cek_15"  style="float: left" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
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
																		<a href="<?=$row_pengurus['persyaratan_foto'];?>" target="_blank" type="button" name="btn_cek_14"  style="float: left" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
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
																	<td>Bukan ASN</td>
																	<td><span
																			class="text-dark"><?php echo $row_pengurus['bukan_asn'] ?></span>
																	</td>
																	
																</tr>
																<tr>
																	<td>Jabatan</td>
																	<td><span
																			class="text-dark"><?php echo $row_pengurus['jabatan_bu'] ?></span>
																	</td>
																	
																</tr>

																<tr>
																	<td>Tanggal Lahir</td>
																	<td><span
																			class="text-dark"><?php echo $row_pengurus['tgl_lahir'] ?></span>
																	</td>
																	
																</tr>

																<tr>
																	<td>Alamat</td>
																	<td><span
																			class="text-dark"><?php echo $row_pengurus['alamat'] ?></span>
																	</td>
																	
																</tr>
																<tr>
																	<td>Email</td>
																	<td><span
																			class="text-dark"><?php echo $row_pengurus['email'] ?></span>
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
								<div class="tab-pane fade" id="akte" role="tabpanel" aria-labelledby="home-tab-1">

									<div class="col-md-12">
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
 															 <font class="text-semibold" style="font-size: 10px;">Tidak/Ada</font>
 															 <span class="switch switch-outline switch-icon switch-primary">

 																 <label>
 																	 <input type="checkbox" <?php if(!empty($ceklis)):?> <?php if($data_ceklis32=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_32" value="1" onclick="javascript:checkbox32()" name="checkbox_32" />
 																	 <span></span>
 																 </label>
 															 </span>

 														 </div>
															<div class="col-md-1">
																<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
																<span class="switch switch-outline switch-icon switch-dark">

																	<label>
																		<input type="checkbox" <?php if(!empty($ceklis_2)):?> <?php if($data_ceklis32_2=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_32_2" value="1" onclick="javascript:checkbox32()" name="checkbox_32_2" />
																		<span></span>
																	</label>
																</span>

															</div>

														    <div class="col-md-7">
														      <br>
														      <div class="input-group file-caption-main">
														        <span class="file-caption-icon"></span>
														        <input type="text" id="comment_32" name="comment_32" <?php if(!empty($ceklis)):?> value="<?=$data_comment32;?>"<?php else :?> disabled="disabled" <?php endif ;?> class="form-control" disabled="disabled" placeholder="Comment...">



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
																<font class="text-semibold" style="font-size: 10px;">Tidak/Ada</font>
																<span class="switch switch-outline switch-icon switch-primary">

																	<label>
																		<input type="checkbox" <?php if(!empty($ceklis)):?> <?php if($data_ceklis32=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_32" value="1" onclick="javascript:checkbox32()" name="checkbox_32" />
																		<span></span>
																	</label>
																</span>

															</div>
														  <div class="col-md-1">
														    <font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
														    <span class="switch switch-outline switch-icon switch-dark">

														      <label>
														        <input type="checkbox"  <?php if(!empty($ceklis_2)):?> <?php if($data_ceklis33_2=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?>id="checkbox_33_2" value="1" onclick="javascript:checkbox33()" name="checkbox_33_2" />
														        <span></span>
														      </label>
														    </span>

														  </div>

														    <div class="col-md-7">
														      <br>
														      <div class="input-group file-caption-main">
														        <span class="file-caption-icon"></span>
														        <input type="text" id="comment_33" name="comment_33" <?php if(!empty($ceklis)):?> value="<?=$data_comment33;?>"<?php else :?> disabled="disabled" <?php endif ;?> class="form-control" disabled="disabled" placeholder="Comment...">



														      </div>
														    </div>
														</div>
													-->




											</div>
										</div>
									</div>
									<hr>
									
									<hr>
									<?php if(!empty($akte)) :?>
									<div class="accordion accordion-toggle-arrow" id="accordionExample1">
										<input type="hidden" value="<?php echo $tgl ;?>" class="switchery" name="tgl">

										<?php foreach ($akte as $row_akte) :?>
										<?php $counter_akte+=1 ;
													$no=$row_akte['no'];
													$no_sk_kum=$row_akte['no_sk_kumham'];
													for ($i=0; $i < count($akte_asesor); $i++) {
														if($no==$akte_asesor[$i]['no'] AND $no_sk_kum=$akte_asesor[$i]['no_sk_kumham']){
															$couna=$i;
															break;
														}
													}
													?>
										<div class="card">
											<div class="card-header">
												<div class="card-title collapsed" data-toggle="collapse"
													data-target="#data-akte-<?php echo $counter_akte ;?>">
													<?php echo $row_akte['no'] ;?>
												</div>
											</div>
											<div id="data-akte-<?php echo $counter_akte ;?>" class="collapse show"
												data-parent="#accordionExample1">

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
																class=" btn btn-primary btn-labeled btn-rounded"><b><i
																		class="icon-file-check"></i></b> Softcopy</a>
														</div>


														<!--#2-->
														<!--
																<div class="col-md-2">
																	<div class="content-group-lg">
																		<h6 class="text-semibold">#2</h6>
																		<p class="content-group">File KTP</p>
																	</div>
																</div>


																<div class="col-md-4">
																	<br>
																	<a href="<?=$row_akte['file_ktp'] ;?>" target="_blank" type="button" name="btn_cek_36"  style="float: left" class=" btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																</div>-->

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
																		<a href="<?=$row_akte['file_npwp'] ;?>" target="_blank" type="button" name="btn_cek_36"  style="float: left" class=" btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																	</div>





																</div>-->
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
																<?php $no_sk_kumham2= str_replace(' ', '', $row_akte['no_sk_kumham']);
																				$no_sk_kumham=preg_replace('/[^A-Za-z0-9\-]/', '', $no_sk_kumham2);;?>
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
																	<td><span class="text-dark">>Rp.
																			<?=number_format($row_akte['modaldasar'],0,",",".") ;?></span>
																	</td>
																	
																</tr>
																<tr>
																	<td>Modal Disetor</td>
																	<td><span class="text-dark">Rp.
																			<?=number_format($row_akte['modalsetor'],0,",",".") ;?></span>
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



									<?php endif ;?>
								</div>
								<input type="hidden" id="email_bu" name="tgl_dec" value="<?php echo $tgl_dec ;?>">
								<input type="hidden" id="alamat_bu" name="nib_dec" value="<?php echo $nib_dec ;?>">

								











								<div class="tab-pane fade show active" id="klasifikasi_kualifikasi" role="tabpanel"
									aria-labelledby="home-tab-1">
									<?php if(!empty($klasifikasi)) :?>
									<div class="col-md-12">
										<!-- Pemegang Saham toggles -->
										<div class="panel panel-flat panel-collapsed">
											<div class="panel-heading">
												<h5 class="panel-title">Validasi Klasifikasi & Kualifikasi</h5>
												<div class="heading-elements">

												</div>
											</div>
											<div class="panel-body">



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
													<?php echo $row_klasifikasi['id_sub_klasifikasi'].' - '.$row_klasifikasi['deskripsi_subklasifikasi'] ;?>
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
																class="btn btn-outline-primary mr-3">
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
																class="btn btn-outline-primary mr-3">
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
																			class="text-primary"><?php echo $row_klasifikasi['asosiasi'].' - '.$row_klasifikasi['nama_asosiasi'] ;?></span>
																	</td>
																</tr>
																<tr>
																	<td>Klasifikasi</td>
																	<td><span
																			class="text-primary"><?php echo $row_klasifikasi['id_klasifikasi'] ;?></span>
																	</td>
																</tr>
																<tr>
																	<td>Sub Klasifikasi</td>
																	<td><span
																			class="text-primary"><?php echo $row_klasifikasi['id_sub_klasifikasi'] ;?></span>
																	</td>
																	
																</tr>
																<tr>
																	<td>Kualifikasi</td>
																	<td><span
																			class="text-primary"><?php echo $row_klasifikasi['kualifikasi'] ;?></span>
																	</td>
																	
																</tr>
																<tr>
																	<td>Permohonan</td>
																	<td><span
																			class="text-primary"><?php echo $row_klasifikasi['id_permohonan'] ;?></span>
																	</td>
																</tr>

																<tr>
																	<td>Nomor KBLI</td>
																	<td><span
																			class="text-primary"><?php echo $row_klasifikasi['nomor_kbli'] ;?></span>
																	</td>
																	
																	
																</tr>
																<tr>
																	<td>Jenis Usaha</td>
																	<td><span
																			class="text-primary"><?php echo $row_klasifikasi['jenis_usaha'] ;?></span>
																	</td>
																</tr>
																<tr>
																	<td>Sifat Badan Usaha</td>
																	<td><span
																			class="text-primary"><?php echo $row_klasifikasi['nama_sifat'] ;?></span>
																	</td>
																</tr>
																<tr>
																	<td>User Email</td>
																	<td><span
																			class="text-primary"><?php echo $row_klasifikasi['user_email'] ;?></span>
																	</td>
																</tr>
																<tr>
																	<td>User HP</td>
																	<td><span
																			class="text-primary"><?php echo $row_klasifikasi['user_hp'] ;?></span>
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

								<div class="tab-pane fade" id="penilaian" role="tabpanel" aria-labelledby="home-tab-1">
								  
							<?php echo form_open_multipart(base_url('sertifikasi/insert_penilaian_falt02'), 'method="POST"');?>

<table style="width:100%; border-collapse:collapse; font-family:Arial, sans-serif; font-size:13px;" border="1">
    <!-- Baris Header 1 -->
    <tr style="text-align:center; font-weight:bold; background:#fce9c8;">
        <td rowspan="2">No</td>
        <td rowspan="2">Jenis / Macam / Peratan Utama *</td>
        <td rowspan="2">Lokasi sekarang<br>(Kabupaten, Kota, Propinsi)</td>
        <td rowspan="2">Tahun Pembuatan / Pembelian</td>
        <td rowspan="2">Kapasitas atau Output pada saat ini</td>
        <td rowspan="2">Merk, Type, Nomor Seri peralatan</td>
        <td rowspan="2">Keadaan (baik / rusak) atau disetarakan dengan (%)</td>
        <td rowspan="2">Bukti Kepemilikan sesuai Permen PUPR No. 8 Tahun 2022</td>
        <td rowspan="2">Tercatat di SDPK</td>
        <td colspan="2">Pernyataan Badan Usaha</td>
        <td rowspan="2">Bukti Surat perjanjian Sewa</td>
		<td rowspan="2">Rekomendasi Kelayakan</td>
    </tr>
    <!-- Baris Header 2 -->
    <tr style="text-align:center; font-weight:bold; background:#fce9c8;">
        <td>Milik</td>
        <td>Sewa</td>
    </tr>
    <!-- Baris Indeks Kolom -->
    <tr style="text-align:center; font-weight:bold;">
        <td>(1)</td>
        <td>(2)</td>
        <td>(3)</td>
        <td>(4)</td>
        <td>(5)</td>
        <td>(6)</td>
        <td>(7)</td>
        <td>(8)</td>
        <td>(9)</td>
        <td>(10)</td>
        <td>(11)</td>
        <td>(12)</td>
		<td>(13)</td>
    </tr>

	<?php
			
							
								if(!empty($penilaian_falt02)){
									foreach($penilaian_falt02 as $row_ceklis){
	 							  $count+=1;
	 							  for ($i=0; $i < count($penilaian_falt02); $i++) {
	 							    if($row_ceklis['id']==$penilaian_falt02[$i]['id']){
	 							      ${"data_tercatat".$row_ceklis['id']}=$row_ceklis['tercatat'];
									  ${"data_pernyataan".$row_ceklis['id']}=$row_ceklis['pernyataan'];
	 							      ${"data_bukti".$row_ceklis['id']}=$row_ceklis['bukti'];
									  ${"data_rekomendasi".$row_ceklis['id']}=$row_ceklis['rekomendasi'];
	 							    }
	 							  }
	 							}
								}
							  ;?>	
		<input type="hidden" name="id_izin" value="<?=$klasifikasi[0]['id_izin'];?>">
		<input type="hidden" value="<?php echo $nib_dec ;?>" name="id1">
		<input type="hidden" value="<?php echo $tgl_dec ;?>" name="id2">
		<input type="hidden" value="<?php echo $user_dec ;?>" name="id3">
    <!-- Baris Data -->
	 <?php $count=1 ;?>
	 <?php foreach($peralatan as $row_peralatan) :?>
		<?php $id_peralatan=$row_peralatan['nomor_registrasi_peralatan'] ;?>
    <tr>
        <td style="text-align:center;">1)</td>
        <td><?=$row_peralatan['subvarian']?></td>
        <td><?=$row_peralatan['provinsi']?></td>
        <td><?=$row_peralatan['tahun']?></td>
        <td><?=$row_peralatan['kapasitas']?></td>
       	<td><?=$row_peralatan['merek']?></td>
        <td><?=$row_peralatan['kapasitas_hasil_uji']?></td>
        <td><?=$row_peralatan['jenis_bukti_kepemilikan']?></td>
        <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?=${'data_tercatat'.$id_peralatan};?>" name="<?=$id_peralatan;?>tercatat" class="form-control">
				</div></td>
        <td style="text-align:center;">
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(${'data_pernyataan'.$id_peralatan}=="1") :?> checked="checked" <?php endif ;?> name="<?=$id_peralatan;?>radio1" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
        <td style="text-align:center;">
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${'data_pernyataan'.$id_peralatan}=="0") :?> checked="checked" <?php endif ;?> name="<?=$id_peralatan;?>radio1" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
        <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text"  value="<?=${'data_bukti'.$id_peralatan};?>" name="<?=$id_peralatan;?>bukti" class="form-control">
				</div></td>
				    <td style="text-align:center;">
													<div class="center">
														<select class="form-control" name="<?=$id_peralatan;?>rekomendasi" required="required">
															<option <?php if(${'data_rekomendasi'.$id_peralatan}=='1'):?>selected <?php endif ;?> value="1">SESUAI</option>
															<option <?php if(${'data_rekomendasi'.$id_peralatan}=='0'):?>selected <?php endif ;?> value="0">TIDAK SESUAI</option>
														</select>

													</div>
												</td>
    </tr>
    <?php $count+=1 ;?>
	<?php endforeach ;?>
</table>
									<hr>
									<div class="row">


										<div class="input-group file-caption-main">
											<span class="file-caption-icon"></span>
											<textarea id="comment_res" name="catatan_falt02"
												class="form-control form-control-solid" rows="5"
												placeholder="Catatan resuma...">
												<?php if(!empty($catatan_falt02)) :?>
												<?=$catatan_falt02[0]['catatan'];?>	
												<?php else :?>
1. Berdasarkan Keputusan DJBK No. 37 Tahun 2025 
2. Persyaratan pemenuhan kemampuan penyediaan peralatan konstruksi kualifikasi <?=$klasifikasi[0]['kualifikasi'] ;?> memiliki peralatan utama paling sedikit 3 per subklasifikasinya 
3. Peralatan tidak sedang digunakan pada Subklasifikasi lain (ya / tidak) (hapus yang tidak diperlukan) 
Hasil pemeriksaan berdasar rekaman SBU yang dimiliki: data dari API 
4. Peralatan tidak sedang digunakan oleh badan usaha lain (ya / tidak) (hapus yang tidak diperlukan) Hasil pemeriksaan berdasar rekaman SBU di LPJK: data dari API 
5. Kesesuaian Jenis peralatan/subvarian memenuhi persyaratan subklasifikasi SESUAI / TIDAK SESUAI (hapus yang tidak diperlukan) 
6. Badan Usaha <?=$bu[0]['nama'] ;?> pada: Subklasifikasi <?=$klasifikasi[0]['deskripsi_subklasifikasi'] ;?> Kode Subklasifikasi <?=$klasifikasi[0]['id_sub_klasifikasi'] ;?> Kualifikasi <?=$klasifikasi[0]['kualifikasi'] ;?> memiliki ..... (.....) (isi angka dan bilangan sesuai jumlah alat yang disampaikan) peralatan utama, maka dinyatakan SESUAI / TIDAK SESUAI (hapus yang tidak diperlukan)
<?php endif ;?>
    
											</textarea>

										</div>

									</div>
								
								<br>
								<br>
								<button type="submit" name="submit" style="float: right" class="open-delete btn btn-primary btn-labeled btn-rounded"><b><i class="icon-paperplane"></i></b> Submit Penilaian FALT02</button>

					<?php echo form_close() ;?>	
					
								<br>
								<br>
							
								</div>


							</div>
						</div>


					</div>

				
				</div>
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
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="nama"></td>
										<td class="nik"><span class="text-primary"></span></td>
									</tr>






								</tbody>
							</table>
							<hr>

							<table class="table table-lg" id="pjt_ska">
								<h6 class="text-semibold"><span class="text-primary">Data SKA</span></h6>
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
								<h6 class="text-semibold"><span class="text-primary">Data SKT</span></h6>
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

							<table class="table table-lg" id="pjsk_ska">
								<h6 class="text-semibold"><span class="text-primary">Data SKA</span></h6>
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
								<h6 class="text-semibold"><span class="text-primary">Data SKT</span></h6>
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

<ul class="sticky-toolbar nav flex-column pl-2 pr-2 pt-3 pb-3 mt-4">
	<!--begin::Item-->

	<!--end::Item-->
	<!--begin::Item-->
	<li class="nav-item mb-2" data-toggle="tooltip" title="Cetak Penilaian ABU Lain" data-placement="left">
		<a class="btn btn-sm btn-icon btn-bg-light btn-icon-primary btn-hover-primary"
			href="<?= base_url('sertifikasi/cetak_penilaian_asesor/'.$nib_dec.'/'.$tgl_dec.'/'.encrypt_url($asesor_2)) ;?>"
			target="_blank">
			<i class="flaticon-file"></i>
		</a>
	</li>
	<li class="nav-item mb-2" data-toggle="tooltip" title="Cetak SMM ABU Lain" data-placement="left">
		<a class="btn btn-sm btn-icon btn-bg-light btn-icon-info btn-hover-info"
			href="<?= base_url('sertifikasi/cetak_smm/'.$nib_dec.'/'.$tgl_dec.'/'.encrypt_url($asesor_2)) ;?>"
			target="_blank">
			<i class="flaticon2-crisp-icons"></i>
		</a>
	</li>
	<li class="nav-item mb-2" data-toggle="tooltip" title="Cetak SMAP ABU Lain" data-placement="left">
		<a class="btn btn-sm btn-icon btn-bg-light btn-icon-info btn-hover-info"
			href="<?= base_url('sertifikasi/cetak_smap/'.$nib_dec.'/'.$tgl_dec.'/'.encrypt_url($asesor_2)) ;?>"
			target="_blank">
			<i class="flaticon2-crisp-icons"></i>
		</a>
	</li>
	<!--end::Item-->
	<!--begin::Item-->
	<li class="nav-item mb-2" data-toggle="tooltip" title="Cetak Keuangan ABU Lain" data-placement="left">
		<a class="btn btn-sm btn-icon btn-bg-light btn-icon-warning btn-hover-warning"
			href="<?= base_url('sertifikasi/cetak_keuangan/'.$nib_dec.'/'.$tgl_dec.'/'.encrypt_url($asesor_2)) ;?>"
			target="_blank">
			<i class="flaticon2-chart"></i>
		</a>
	</li>
	<!--end::Item-->
	<!--begin::Item-->
	<li class="nav-item" id="kt_sticky_toolbar_chat_toggler" data-toggle="tooltip"
		title="Cetak Penjualan Tahunan ABU Lain" data-placement="left">
		<a class="btn btn-sm btn-icon btn-bg-light btn-icon-warning btn-hover-warning"
			href="<?= base_url('sertifikasi/cetak_penjualan_tahunan_asesor/'.$nib_dec.'/'.$tgl_dec.'/'.encrypt_url($asesor_2)) ;?>"
			target="_blank">
			<i class="flaticon2-cup"></i>
		</a>
	</li>
	<li class="nav-item" id="kt_sticky_toolbar_chat_toggler" data-toggle="tooltip" title="Cetak Peralatan ABU Lain"
		data-placement="left">
		<a class="btn btn-sm btn-icon btn-bg-light btn-icon-danger btn-hover-danger"
			href="<?= base_url('sertifikasi/cetak_peralatan_asesor/'.$nib_dec.'/'.$tgl_dec.'/'.encrypt_url($asesor_2)) ;?>"
			target="_blank">
			<i class="flaticon2-lorry"></i>
		</a>
	</li>
	<li class="nav-item" id="kt_sticky_toolbar_chat_toggler" data-toggle="tooltip" title="Cetak SDM ABU Lain"
		data-placement="left">
		<a class="btn btn-sm btn-icon btn-bg-light btn-icon-success btn-hover-success"
			href="<?= base_url('sertifikasi/cetak_tk_asesor/'.$nib_dec.'/'.$tgl_dec.'/'.encrypt_url($asesor_2)) ;?>"
			data-toggle="modal" data-target="#kt_chat_modal">
			<i class="flaticon-customer"></i>
		</a>
	</li>
	<!--end::Item-->
</ul>

<script type="text/javascript">
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
				console.log(record2);
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
				console.log(response.responses_data);

				document.getElementsByClassName("nama")[0].textContent = record2.nama;
				document.getElementsByClassName("nik")[0].textContent = record2.nik;
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