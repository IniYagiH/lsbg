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


						<a href="<?= base_url('sertifikasi/frpkp/'.$nib_dec.'/'.$tgl_dec.'/'.$user_dec) ;?>"
							target="_blank" style="margin:5px;" class="btn btn-warning font-weight-bolder">
							<i class="flaticon2-cup"></i>FRKP</a>



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
											<i class="flaticon2-list text-danger"></i>
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
											<i class="flaticon2-avatar text-danger"></i>
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
									<a class="nav-link" id="contact-tab-1" data-toggle="tab" href="#penilaian"
										aria-controls="contact">
										<span class="nav-icon">
											<i class="flaticon2-notepad text-danger"></i>
										</span>
										<span class="nav-text">Penilaian</span>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="contact-tab-1" data-toggle="tab" href="#smap"
										aria-controls="contact">
										<span class="nav-icon">
											<i class="flaticon2-notepad text-danger"></i>
										</span>
										<span class="nav-text">SMAP</span>
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
								<div class="tab-pane fade show" id="smap" role="tabpanel" aria-labelledby="home-tab-1">

									<div class="col-md-12">
										<div class="panel panel-flat panel-collapsed">
											<div class="panel-heading">
												<h5 class="panel-title">SMAP</h5>
												<div class="heading-elements">

												</div>
											</div>

											<div class="panel-body">
												<!--#1-->
												<div class="row">
													<div class="col-md-3">
														<div class="content-group-lg">
															<h6 class="text-semibold">#1</h6>
															<p class="content-group">Dokumen SMAP</p>
														</div>
													</div>

												
													
													<div class="col-md-2">
														<br>
														<a <?php if($smap[0]['persyaratan_smap']!='') :?>href="<?= $smap[0]['persyaratan_smap'] ;?>"
															<?php else :?>href="<?= base_url('not_found') ;?>"
															<?php endif ;?> target="_blank" type="button"
															name="btn_cek_13" style="float: right"
															class="open-delete btn btn-primary btn-labeled btn-rounded"><b><i
																	class="icon-file-check"></i></b> Softcopy</a>
													</div>
													
												</div>
												<div class="row">
													<div class="col-md-3">
														<div class="content-group-lg">
															<h6 class="text-semibold">#2</h6>
															<p class="content-group">Sertifikat ISO</p>
														</div>
													</div>

												
													
													<div class="col-md-2">
														<br>
														<a <?php if($smap[0]['sertifikat_iso']!='') :?>href="<?= $smap[0]['sertifikat_iso'] ;?>"
															<?php else :?>href="<?= base_url('not_found') ;?>"
															<?php endif ;?> target="_blank" type="button"
															name="btn_cek_11" style="float: right"
															class="open-delete btn btn-primary btn-labeled btn-rounded"><b><i
																	class="icon-file-check"></i></b> Softcopy</a>
													</div>
													
												</div>
												<div class="row">
													<div class="col-md-3">
														<div class="content-group-lg">
															<h6 class="text-semibold">#3</h6>
															<p class="content-group">File Surat Pernyataan</p>
														</div>
													</div>

													
													
													<div class="col-md-2">
														<br>
														<a <?php if($smap[0]['file_surat_pernyataan']!='') :?>href="<?= $smap[0]['file_surat_pernyataan'] ;?>"
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


									
									<hr>
									
									<hr>
									<?php if(!empty($smap)) :?>
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
														<td>Nomor Sertifikat</td>
														<td><span
																class="text-primary"><?php echo $smap[0]['nomor_sertifikat'] ;?></span>
														</td>

													</tr>
													<tr>
														<td>Surat Pernyataan</td>
														<td><span
																class="text-primary"><?php echo $smap[0]['surat_pernyataan'] ;?></span>
														</td>

													</tr>




												</tbody>
											</table>
										</div>
									</div>
									<?php endif ;?>
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
														<div class="col-md-3">
															<div class="content-group-lg">
																<h6 class="text-semibold">#1</h6>
																<p class="content-group">KTP</p>
															</div>
														</div>

														<div class="col-md-1">
															<font class="text-semibold" style="font-size: 10px;">Tidak/Ada</font>
															<span class="switch switch-outline switch-icon switch-primary">

																<label>
																	<input type="checkbox" <?php if(!empty($ceklis)):?> <?php if($data_ceklis13=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_13" value="1" checked="checked" onclick="javascript:checkbox13()" name="checkbox_13" />
																	<span></span>
																</label>
															</span>

														</div>
														<div class="col-md-1">
															<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
															<span class="switch switch-outline switch-icon switch-dark">

																<label>
																	<input type="checkbox" <?php if(!empty($ceklis_2)):?> <?php if($data_ceklis13_2=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_13_2" value="1" checked="checked" onclick="javascript:checkbox13()" name="checkbox_13_2" />
																	<span></span>
																</label>
															</span>

														</div>

															<div class="col-md-7">
																<br>
																<div class="input-group file-caption-main">
																	<span class="file-caption-icon"></span>
																	<input type="text" id="comment_13" name="comment_13"   class="form-control" <?php if(!empty($ceklis)):?> value="<?=$data_comment13;?>"<?php else :?> disabled="disabled" <?php endif ;?> placeholder="Comment...">


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
																	<input type="checkbox" <?php if(!empty($ceklis)):?> <?php if($data_ceklis14=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_14" value="1" checked="checked" onclick="javascript:checkbox14()" name="checkbox_14" />
																	<span></span>
																</label>
															</span>

														</div>
														<div class="col-md-1">
															<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
															<span class="switch switch-outline switch-icon switch-dark">

																<label>
																	<input type="checkbox"  <?php if(!empty($ceklis_2)):?> <?php if($data_ceklis14_2=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?>id="checkbox_14_2" value="1" checked="checked" onclick="javascript:checkbox14()" name="checkbox_14_2" />
																	<span></span>
																</label>
															</span>

														</div>

															<div class="col-md-7">
																<br>
																<div class="input-group file-caption-main">
																	<span class="file-caption-icon"></span>
																	<input type="text" id="comment_14" name="comment_14"   class="form-control" disabled="disabled" placeholder="Comment...">


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
															<font class="text-semibold" style="font-size: 10px;">Tidak/Ada</font>
															<span class="switch switch-outline switch-icon switch-primary">

																<label>
																	<input type="checkbox" <?php if(!empty($ceklis)):?> <?php if($data_ceklis15=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_15" value="1" checked="checked" onclick="javascript:checkbox15()" name="checkbox_15" />
																	<span></span>
																</label>
															</span>

														</div>
														<div class="col-md-1">
															<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
															<span class="switch switch-outline switch-icon switch-dark">

																<label>
																	<input type="checkbox"  <?php if(!empty($ceklis_2)):?> <?php if($data_ceklis15_2=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?>id="checkbox_15_2" value="1" checked="checked" onclick="javascript:checkbox15()" name="checkbox_15_2" />
																	<span></span>
																</label>
															</span>

														</div>

															<div class="col-md-7">
																<br>
																<div class="input-group file-caption-main">
																	<span class="file-caption-icon"></span>
																	<input type="text" id="comment_15" name="comment_15"   class="form-control" disabled="disabled" placeholder="Comment...">


																</div>
															</div>
													</div>-->
											</div>
										</div>
									</div>
									<hr>
								
									<hr>
									<?php if(!empty($pemegang_saham)) :?>
									<div class="accordion accordion-toggle-arrow" id="accordionExample1">
										<input type="hidden" value="<?php echo $tgl ;?>" class="switchery" name="tgl">

										<?php foreach ($pemegang_saham as $row_saham) :?>
										
										<?php $counter_saham+=1 ;
													$pemilik_sahamx=$row_saham['nama_pemilik'];
													for ($i=0; $i < count($saham_asesor); $i++) {
														if($pemilik_sahamx==$saham_asesor[$i]['nama_pemilik']){
															$counm=$i;
															break;
														}
													}
													?>
										<div class="card">
											<div class="card-header">
												<div class="card-title collapsed" data-toggle="collapse"
													data-target="#data-saham-<?php echo $counter_saham ;?>">
													<?php echo $row_saham['nama_pemilik'] ;?>
												</div>
											</div>
											<div id="data-saham-<?php echo $counter_saham ;?>" class="collapse show"
												data-parent="#accordionExample1">

												<div class="card-body">
													<!--#1-->
													<!--
																<div class="row">
																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#1</h6>
																			<p class="content-group">KTP</p>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<br>
																		<a href="<?=$row_saham['persyaratan_ktp'] ;?>" target="_blank" type="button" name="btn_cek_36"  style="float: left" class=" btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																	</div>



																<div class="col-md-2">
																	<div class="content-group-lg">
																		<h6 class="text-semibold">#2</h6>
																		<p class="content-group">NPWP</p>
																	</div>
																</div>


																<div class="col-md-4">
																	<br>
																	<a href="<?=$row_saham['persyaratan_npwp'] ;?>" target="_blank" type="button" name="btn_cek_36"  style="float: left" class=" btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
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
																		<a href="<?=$row_saham['persyaratan_doc'] ;?>" target="_blank" type="button" name="btn_cek_36"  style="float: left" class=" btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
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
																<?php $nama_pemilik2= str_replace(' ', '', $row_saham['nama_pemilik']);
																				$nama_pemilik=preg_replace('/[^A-Za-z0-9\-]/', '', $nama_pemilik2);;?>
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
																	<td><span class="text-dark">Rp.
																			<?=number_format($row_saham['modal_dasar'],0,",",".")  ;?></span>
																	</td>
																	
																</tr>
																<tr>
																	<td>Modal Disetor</td>
																	<td><span class="text-dark">Rp.
																			<?=number_format($row_saham['modal_disetor'],0,",",".")  ;?></span>
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
									<input type="hidden" name="modal_dasar_neraca" class="form-control"
										<?php if(!empty($neraca_asesor)):?>
										value="<?=$neraca_asesor[0]['modal_dasar'];?>" <?php endif ;?>
										placeholder="Isian Asesor...">
									<input type="hidden" name="modal_setor_neraca" class="form-control"
										<?php if(!empty($neraca_asesor)):?>
										value="<?=$neraca_asesor[0]['modal_setor'];?>" <?php endif ;?>
										placeholder="Isian Asesor...">

									
									<?php

											$count=0;
										 foreach($keuangan_asesor as $row_keuangan){
											$count+=1;
											for ($i=0; $i < count($keuangan_asesor); $i++) {
												if($row_keuangan['id']==$keuangan_asesor[$i]['id'] AND $row_keuangan['tahun']==$keuangan_asesor[$i]['tahun']){
													${"data_keuangan_".$row_keuangan['id']."_".$row_keuangan['tahun']}=$row_keuangan['checklist'];

												}
											}
										} ;?>
									<hr>
									<?php if(!empty($neraca)) :?>
									<div class="accordion accordion-toggle-arrow" id="accordionExample1">
										<input type="hidden" value="<?php echo $tgl ;?>" class="switchery" name="tgl">

										<?php foreach ($neraca as $row_neraca) :?>
										<?php $counter_neraca+=1 ;?>
										<div class="card">
											<div class="card-header">
												<div class="card-title collapsed" data-toggle="collapse"
													data-target="#data-neraca-<?php echo $counter_neraca ;?>">
													<?php echo $row_neraca['Tahun'] ;?>
												</div>
											</div>
											<div id="data-neraca-<?php echo $counter_neraca ;?>" class="collapse show"
												data-parent="#accordionExample1">

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
															<a <?php if($row_neraca['persyaratan_doc1']!='') :?>href="<?= $row_neraca['persyaratan_doc1'] ;?>"
																<?php else :?>href="<?= base_url('not_found') ;?>"
																<?php endif ;?> target="_blank" type="button"
																name="btn_cek_36" style="float: left"
																class=" btn btn-primary btn-labeled btn-rounded"><b><i
																		class="icon-file-check"></i></b> Softcopy</a>
														</div>
														<div class="col-md-2">
															<div class="content-group-lg">
																<h6 class="text-semibold">#2</h6>
																<p class="content-group">Laporan Audit Akuntan Publik
																</p>
															</div>
														</div>


														<div class="col-md-4">
															<br>
															<a <?php if($row_neraca['persyaratan_doc2']!='') :?>href="<?= $row_neraca['persyaratan_doc2'] ;?>"
																<?php else :?>href="<?= base_url('not_found') ;?>"
																<?php endif ;?> target="_blank" type="button"
																name="btn_cek_36" style="float: left"
																class=" btn btn-primary btn-labeled btn-rounded"><b><i
																		class="icon-file-check"></i></b> Softcopy</a>
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
																	<td><span
																			class="text-dark"><?=$row_neraca['Tahun'] ;?></span>
																	</td>
																	
																</tr>
																<tr>
																	<td>Nilai Ekuitas</td>
																	<td><span class="text-dark">Rp.
																			<?=number_format($row_neraca['total_ekuitas'],0,",",".") ;?></span>
																	</td>
																	
																</tr>

																<tr>
																	<td>Total Aset</td>
																	<td><span class="text-dark">Rp.
																			<?=number_format($row_neraca['total_aset'],0,",",".") ;?></span>
																	</td>
																	
																</tr>

																<tr>
																	<td>Laporan Audit KAP </td>
																	<td><span class="text-dark">(M,B & Spesialis)</span>
																	</td>
																</tr>

																<tr>
																	<td>Aktiva Lancar</td>
																	<td><span class="text-dark">Rp.
																			<?=number_format($row_neraca['aktiva_lancar'],0,",",".")  ;?></span>
																	</td>
																	
																</tr>
																<tr>
																	<td>Aktiva Tidak Lancar</td>
																	<td><span class="text-dark">Rp.
																			<?=number_format($row_neraca['aktiva_tdk_lancar'],0,",",".")  ;?></span>
																	</td>
																
																</tr>
																<tr>
																	<td>Aktiva Lain-lain</td>
																	<td><span class="text-dark">Rp.
																			<?=number_format($row_neraca['aktiva_lain_lain'],0,",",".")  ;?></span>
																	</td>
																	
																</tr>

																<tr>
																	<td>Kewajiban lancar</td>
																	<td><span class="text-dark">Rp.
																			<?=number_format($row_neraca['kewajiban_lancar'],0,",",".")  ;?></span>
																	</td>
																	
																</tr>
																<tr>
																	<td>Kewajiban tidak lancar</td>
																	<td><span class="text-dark">Rp.
																			<?=number_format($row_neraca['kewajiban_tdk_lancar'],0,",",".")  ;?></span>
																	</td>
																	
																</tr>

																<tr>
																	<td>Total Modal</td>
																	<td><span class="text-dark">Rp.
																			<?=number_format($row_neraca['total_modal'],0,",",".")  ;?></span>
																	</td>
																
																</tr>
																<tr>
																	<td>Total Kewajiban Ekuitas</td>
																	<td><span class="text-dark">Rp.
																			<?=number_format($row_neraca['total_kewajiban_ekuitas'],0,",",".")  ;?></span>
																	</td>
																	
																</tr>
																<tr>
																	<td>Total Kewajiban</td>
																	<td><span class="text-dark">Rp.
																			<?=number_format($row_neraca['total_kewajiban'],0,",",".")  ;?></span>
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
									<div class="tab-pane fade" id="pjbu" role="tabpanel" aria-labelledby="home-tab-1">

									<div class="col-md-12">
										<div class="panel panel-flat panel-collapsed">
											<div class="panel-heading">
												<h5 class="panel-title">PJBU</h5>
												<div class="heading-elements">

												</div>
											</div>
											<div class="panel-body">
												<!--#1-->
												<!--
														<div class="row">
															<div class="col-md-3">
																<div class="content-group-lg">
																	<h6 class="text-semibold">#1</h6>
																	<p class="content-group">KTP</p>
																</div>
															</div>

															<div class="col-md-1">
																<font class="text-semibold" style="font-size: 10px;">Tidak/Ada</font>
																<span class="switch switch-outline switch-icon switch-primary">

																	<label>
																		<input type="checkbox" <?php if(!empty($ceklis)):?> <?php if($data_ceklis18=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_18" value="1" onclick="javascript:checkbox18()" name="checkbox_18" />
																		<span></span>
																	</label>
																</span>

															</div>
															<div class="col-md-1">
																<font class="text-semibold" style="font-size: 10px;">Tidak/Ada</font>
																<span class="switch switch-outline switch-icon switch-primary">

																	<label>
																		<input type="checkbox" <?php if(!empty($ceklis)):?> <?php if($data_ceklis18=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_18" value="1" onclick="javascript:checkbox18()" name="checkbox_18" />
																		<span></span>
																	</label>
																</span>

															</div>
															<div class="col-md-2">
																<br>
																<a href="<?=$pjbu[0]['file_ktp'] ;?>" target="_blank" type="button" name="btn_cek_13"  style="float: right" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
															</div>
																<div class="col-md-5">
																	<br>
																	<div class="input-group file-caption-main">
																		<span class="file-caption-icon"></span>
																		<input type="text" id="comment_18" name="comment_18"   class="form-control" disabled="disabled" placeholder="Comment...">


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
																		<input type="checkbox" <?php if(!empty($ceklis)):?> <?php if($data_ceklis19=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_19" value="1" onclick="javascript:checkbox19()" name="checkbox_19" />
																		<span></span>
																	</label>
																</span>

															</div>
															<div class="col-md-1">
																<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
																<span class="switch switch-outline switch-icon switch-dark">

																	<label>
																		<input type="checkbox"  <?php if(!empty($ceklis_2)):?> <?php if($data_ceklis19_2=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?>id="checkbox_19_2" value="1" onclick="javascript:checkbox19()" name="checkbox_19_2" />
																		<span></span>
																	</label>
																</span>

															</div>
															<div class="col-md-2">
																<br>
																<a href="<?=$pjbu[0]['file_npwp'] ;?>" target="_blank" type="button" name="btn_cek_13"  style="float: right" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
															</div>
																<div class="col-md-5">
																	<br>
																	<div class="input-group file-caption-main">
																		<span class="file-caption-icon"></span>
																		<input type="text" id="comment_19" name="comment_19"   class="form-control" disabled="disabled" placeholder="Comment...">


																	</div>
																</div>
														</div>-->
												<div class="row">
													<div class="col-md-3">
														<div class="content-group-lg">
															<h6 class="text-semibold">#1</h6>
															<p class="content-group">Foto</p>
														</div>
													</div>

												
												
													<div class="col-md-2">
														<br>
														<a href="<?=$pjbu[0]['foto'] ;?>" target="_blank" type="button"
															name="btn_cek_13" style="float: right"
															class="open-delete btn btn-primary btn-labeled btn-rounded"><b><i
																	class="icon-file-check"></i></b> Softcopy</a>
													</div>
													<div class="col-md-5">
														<br>
														<div class="input-group file-caption-main">
															<span class="file-caption-icon"></span>
															<input type="text" id="comment_20" name="comment_20"
																class="form-control" disabled="disabled"
																placeholder="Comment...">


														</div>
													</div>
												</div>




											</div>
										</div>
									</div>
									<hr>
								
									<hr>
									<?php if(!empty($pjbu)) :?>
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
														<td><span
																class="text-dark"><?php echo $pjbu[0]['nama'] ;?></span>
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






												</tbody>
											</table>
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
									<?php
											$count=0;
										 foreach($pjtbu_asesor as $row_pjtbux){
											$count+=1;
											for ($i=0; $i < count($pjtbu_asesor); $i++) {
												if($row_pjtbux['id']==$pjtbu_asesor[$i]['id']){
													${"data_pjtbu_".$row_pjtbux['id']}=$row_pjtbux['checklist'];

												}
											}
										} ;?>
									<?php if(!empty($pjtbu)) :?>
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
											<div id="data-pjtbu-<?php echo $counter_pjtbu ;?>" class="collapse show"
												data-parent="#accordionExample1">
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
																	<?php endif ;?> target="_blank" type="button"
																	name="btn_cek_11" style="float: right"
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
																	<?php endif ;?> target="_blank" type="button"
																	name="btn_cek_11" style="float: right"
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
																	<?php endif ;?> target="_blank" type="button"
																	name="btn_cek_11" style="float: right"
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
																	<td>Jenjang SKK</td>
																	<td><span
																			class="text-dark"><?php echo $row_pjtbu['jenjang_skk'] ;?></span>
																	</td>
																	
																</tr>

																<tr>
																	<td>Klasifikasi SKK<br>
																		<span
																			class="text-danger"><?php echo $row_pjtbu['klasifikasi_skk'] ;?></span>
																	</td>
																	
																</tr>
																<tr>
																	<td>Sub Klasifikasi SKK<br>
																		<span
																			class="text-danger"><?php echo $row_pjtbu['sub_klasifikasi'] ;?></span>
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
																	<td>Noreg skk</td>
																	<td><span
																			class="text-dark"><?php echo $row_pjtbu['noreg_skk'] ?></span>
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
																	<td>Alamat</td>
																	<td><span
																			class="text-dark"><?php echo $row_pjtbu['alamat'] ;?></span>
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
									<?php
											$count=0;
										 foreach($pjskbu_asesor as $row_pjskbux){
											$count+=1;
											for ($i=0; $i < count($pjskbu_asesor); $i++) {
												if($row_pjskbux['id']==$pjskbu_asesor[$i]['id'] AND $row_pjskbux['sub_klasifikasi']==$pjskbu_asesor[$i]['sub_klasifikasi']){
													${"data_pjskbu_".$row_pjskbux['id']."_".$row_pjskbux['sub_klasifikasi']}=$row_pjskbux['checklist'];
													${"data_pjskbu_comment_".$row_pjskbux['sub_klasifikasi']}=$row_pjskbux['comment'];

												}
											}
										} ;?>
									<?php if(!empty($pjskbu)) :?>
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
											<div id="data-pjskbu-<?php echo $counter_pjskbu ;?>" class="collapse show"
												data-parent="#accordionExample1">
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
																<a <?php if($row_pjskbu['skk']!='') :?>href="<?= $row_pjskbu['skk'] ;?>"
																	<?php else :?>href="<?= base_url('not_found') ;?>"
																	<?php endif ;?> target="_blank" type="button"
																	name="btn_cek_11" style="float: right"
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
																<a <?php if($row_pjskbu['ijazah']!='') :?>href="<?= $row_pjskbu['ijazah'] ;?>"
																	<?php else :?>href="<?= base_url('not_found') ;?>"
																	<?php endif ;?> target="_blank" type="button"
																	name="btn_cek_11" style="float: right"
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
																<a <?php if($row_pjskbu['spt']!='') :?>href="<?= $row_pjskbu['spt'] ;?>"
																	<?php else :?>href="<?= base_url('not_found') ;?>"
																	<?php endif ;?> target="_blank" type="button"
																	name="btn_cek_11" style="float: right"
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
																	<td>Jenjang SKK</td>
																	<td><span
																			class="text-dark"><?php echo $row_pjskbu['jenjang_skk'] ?></span>
																	</td>
																	
																</tr>
																<tr>
																	<td>Klasifikasi SKK<br><span
																			class="text-dark"><?php echo $row_pjskbu['klasifikasi']; ?></span>
																	</td>
																	
																</tr>
																<tr>
																	<td>Sub Klasifikasi SKK<br><span
																			class="text-danger"><?php echo $row_pjskbu['sub_klasifikasi'] ?></span>
																	</td>
																	
																</tr>
																<tr>
																	<td>Sub Klasifikasi yang Diajukan</td>
																	<td><span
																			class="text-dark"><?php echo $row_pjskbu['id_sub_klasifikasi_pjsk']; ?></span>
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
								<div class="tab-pane fade" id="penilaian" role="tabpanel" aria-labelledby="home-tab-1">
									<?php echo form_open_multipart(base_url('sertifikasi/insert_penilaian_frpkp'), 'method="POST"');?>
									<input type="hidden" name="id_izin" value="<?=$klasifikasi[0]['id_izin'];?>">
									<input type="hidden" value="<?php echo $nib_dec ;?>" name="id1">
									<input type="hidden" value="<?php echo $tgl_dec ;?>" name="id2">
									<input type="hidden" value="<?php echo $user_dec ;?>" name="id3">


									<style>
										:root {
											--border: #2f4e7b;
											--header: #2e64a7;
											--subrow: #e8f1ff;
										}


										table {
											width: 100%;
											border-collapse: collapse;
											table-layout: fixed;
											font-size: 13px;
										}

										colgroup col:nth-child(1) {
											width: 42px;
										}

										/* No */
										colgroup col:nth-child(2) {
											width: auto;
										}

										/* Item Penilaian */
										colgroup col:nth-child(3) {
											width: 320px;
										}

										/* Persyaratan */
										colgroup col:nth-child(4) {
											width: 150px;
										}

										/* Keputusan */
										colgroup col:nth-child(5) {
											width: 180px;
										}

										/* Catatan */

										th,
										td {
											border: 1px solid var(--border);
											padding: 8px 10px;
											vertical-align: top;
											word-wrap: break-word;
										}

										thead th {
											background: var(--header);
											color: #fff;
											text-align: center;
											font-weight: 700;
										}

										/* nomor kolom */
										.no {
											text-align: center;
										}

										/* baris utama (judul item) */
										.item-title {
											background: #f4f7ff;
											font-weight: 700;
										}

										/* baris sub-item (detail & nilai) */
										.sub {
											background: var(--subrow);
										}

										/* teks keputusan */
										.keputusan {
											text-align: center;
											white-space: pre-line;
											/* agar “Memenuhi/ Tidak Memenuhi” tampil bertumpuk */
											font-weight: 600;
										}

										/* “indent” untuk label di kolom Item pada baris sub */
										.indent {
											display: inline-block;
											padding-left: 18px;
										}

										/* tampilan cetak rapi */
										@media print {
											body {
												margin: 0;
											}

											table {
												font-size: 12px;
											}
										}
									</style>
									</head>

									<body>

										<table>
											<colgroup>
												<col>
												<col>
												<col>
												<col>
											</colgroup>

											<thead>
												<tr>
													<th>No</th>
													<th>Item Penilaian</th>
													<th>Persyaratan</th>
													<th>Keputusan Asesor</th>
												</tr>
											</thead>

											<tbody>
												<!-- ====== Baris 1 ====== -->
												<tr>
													<td class="no" rowspan="2">1</td>
													<td class="item-title">Penilaian Penjualan Tahunan Badan Usaha</td>
													<td class="item-title">
														<div class="center"><select class="form-control" name="persyaratan_penjualan_tahunan"
																required="required">
	<option  value="Kualifikasi K :  < Rp. 2.500.000.000">Kualifikasi K :  < Rp. 2.500.000.000</option>
																<option  value="Kualifikasi M : >= Rp. 2.500.000.000">Kualifikasi M : >= Rp. 2.500.000.000</option>
																<option  value="Kualifikasi B : >= Rp. 50.000.000.000 (BUJKN/BUJK PMA)">Kualifikasi B : >= Rp. 50.000.000.000 (BUJKN/BUJK PMA)</option>
																<option  value="Kualifikasi B : >= Rp. 100.000.000.0000 (BUJKA)">Kualifikasi B : >= Rp. 100.000.000.0000 (BUJKA)</option>
																<option  value="Spesialis :  < Rp. 2.500.000.000">Spesialis :  < Rp. 2.500.000.000</option>
															</select>
														</div>
														
													</td>
													<td class="keputusan" rowspan="2">
														<div class="center">
															<select class="form-control" name="checkbox_penjualan_tahunan"
																required="required">
																<option <?php if($penilaian_frpkp[0]['penjualan_tahunan']=='1') :?>selected<?php endif ;?> value="1">MEMENUHI</option>
																<option <?php if($penilaian_frpkp[0]['penjualan_tahunan']=='0') :?>selected<?php endif ;?> value="0">TIDAK MEMENUHI</option>
															</select>

														</div>
													</td>
													
												</tr>
												<tr class="sub">
													<td>
														<div style="display: flex; align-items: center; gap: 8px;">
															<label for="hasil">Nilai Penjualan Tahunan :</label>
															<input type="text" id="hasil" value="<?=$penilaian_frpkp[0]['nilai_penjualan_tahunan'];?>" name="nilai_penjualan_tahunan" class="form-control" placeholder="Isian Asesor...">
														</div>
													</td>
													
												</tr>

												<!-- ====== Baris 2 ====== -->
												<tr>
													<td class="no" rowspan="2">2</td>
													<td class="item-title">Melakukan Penilaian Kemampuan Keuangan Badan
														Usaha</td>
													<td class="item-title">
														<div class="center"><select class="form-control" name="persyaratan_keuangan"
																required="required">
<option  value="Kualifikasi K  : >= Rp. 300.000.000"> Kualifikasi K  : >= Rp. 300.000.000</option>
																<option  value="Kualifikasi M : >= Rp. 2.000.000.000"> Kualifikasi M : >= Rp. 2.000.000.000</option>
																<option  value="Kualifikasi B : >= Rp. 25.000.000.000 (BUJKN/BUJK PMA)"> Kualifikasi B : >= Rp. 25.000.000.000 (BUJKN/BUJK PMA)</option>
																<option  value="Kualifikasi B : >= Rp. 35.000.000.000 (BUJKA)"> Kualifikasi B : >= Rp. 35.000.000.000 (BUJKA)</option>
<option  value="Spesialis : >= Rp. 75.000.000"> Spesialis : >= Rp. 75.000.000</option>
<option  value="Spesialis : >= Rp. 5.000.000.000"> Spesialis : >= Rp. 5.000.000.000</option>

															</select>
														</div>
													</td>
													<td class="keputusan" rowspan="2">
														<div class="center">
															<select class="form-control" name="checkbox_keuangan"
																required="required">
																<option <?php if($penilaian_frpkp[0]['aset']=='1') :?>selected<?php endif ;?> value="1">MEMENUHI</option>
																<option <?php if($penilaian_frpkp[0]['aset']=='0') :?>selected<?php endif ;?> value="0">TIDAK MEMENUHI</option>
															</select>

														</div>
													</td>
												
												</tr>
												<tr class="sub">
												
													<td>
														<div style="display: flex; align-items: center; gap: 8px;">
															<label for="hasil">Nilai Kemampuan Keuangan :</label>
															<input type="text" id="hasil" value="<?=$penilaian_frpkp[0]['nilai_kemampuan_keuangan'];?>" name="nilai_keuangan" class="form-control" placeholder="Isian Asesor...">
														</div>
													</td>
													
												</tr>

												<!-- ====== Baris 3 ====== -->
												<tr>
													<td class="no">3</td>
													<td class="item-title">Penilaian Ketersediaan Tenaga Kerja
														Konstruksi Badan Usaha</td>
													<td class="item-title"></td>
													<td class="keputusan">
														<div class="center">
															<select class="form-control" name="checkbox_tk"
																required="required">
																<option <?php if($penilaian_frpkp[0]['tk']=='1') :?>selected<?php endif ;?> value="1">MEMENUHI</option>
																<option <?php if($penilaian_frpkp[0]['tk']=='0') :?>selected<?php endif ;?> value="0">TIDAK MEMENUHI</option>
															</select>

														</div>
													</td>
													
												</tr>
												<tr>
													<td class="no">A</td>
													<td class="item-title">Nama PJBU : <?=$pjbu[0]['nama'];?></td>
													<td class="item-title"></td>
													<td class="keputusan"></td>
										
												</tr>
												<tr>
													<td class="no">B</td>
													<td class="item-title">Nama PJTBU : <?=$pjtbu[0]['nama'];?></td>
													<td class="item-title"></td>
													<td class="keputusan"></td>
											
												</tr>
												<tr>
													<td class="no"></td>
													<td class="item-title">Sub Klasifikasi : <?=$pjtbu[0]['sub_klasifikasi'];?></td>
													<td>
														<div style="display: flex; align-items: center; gap: 8px;">
														
															<input type="text"  value="<?=$penilaian_frpkp[0]['sub_klas_pjtbu'];?>" id="hasil" name="sub_klas_pjtbu" class="form-control" placeholder="Persyaratan Sub Klasifikasi...">
														</div>
													</td>
													<td class="keputusan"></td>
											
												</tr>
												<tr>
													<td class="no"></td>
													<td class="item-title">Jenjang : <?=$pjtbu[0]['jenjang_skk'];?></td>
													<td>
														<div style="display: flex; align-items: center; gap: 8px;">
														
															<input type="text"  value="<?=$penilaian_frpkp[0]['jenjang_pjtbu'];?>" id="hasil" name="jenjang_pjtbu" class="form-control" placeholder="Persyaratan Jenjang...">
														</div>
													</td>
													<td class="keputusan"></td>
												
												</tr>
												<tr>
													<td class="no">C</td>
													<td class="item-title">Nama PJSKBU : <?=$pjskbu[0]['nama'];?></td>
													<td class="item-title"></td>
													<td class="keputusan"></td>
													
												</tr>
												<tr>
													<td class="no"></td>
													<td class="item-title">Sub Klasifikasi : <?=$pjskbu[0]['sub_klasifikasi'];?></td>
													<td>
														<div style="display: flex; align-items: center; gap: 8px;">
															
															<input type="text" id="hasil"  value="<?=$penilaian_frpkp[0]['sub_klas_pjskbu'];?>" name="sub_klas_pjskbu" class="form-control" placeholder="Persyaratan Sub Klasifikasi...">
														</div>
													</td>
													<td class="keputusan"></td>
												
												</tr>
												<tr>
													<td class="no"></td>
													<td class="item-title">Jenjang : <?=$pjskbu[0]['jenjang_skk'];?></td>
													<td>
														<div style="display: flex; align-items: center; gap: 8px;">
														
															<input type="text" id="hasil"  value="<?=$penilaian_frpkp[0]['jenjang_pjskbu'];?>" name="jenjang_pjskbu" class="form-control" placeholder="Persyaratan Jenjang...">
														</div>
													</td>
													<td class="keputusan"></td>
												
												</tr>
												<tr>
													<td class="no">4</td>
													<td class="item-title">Penilaian Kemampuan dalam Penyediaan
														Peralatan Konstruksi Badan Usaha </td>
													<td class="item-title"></td>
													<td class="keputusan">
														<div class="center">
															<select class="form-control" name="checkbox_peralatan"
																required="required">
																<option <?php if($penilaian_frpkp[0]['peralatan']=='1') :?>selected<?php endif ;?> value="1">MEMENUHI</option>
																<option <?php if($penilaian_frpkp[0]['peralatan']=='0') :?>selected<?php endif ;?> value="0">TIDAK MEMENUHI</option>
															</select>

														</div>
													</td>
											
												</tr>
												<tr>
													<td class="no">A</td>
													<td class="item-title">Kepemilikan/Sewa </td>
													<td class="item-title"></td>
													<td class="keputusan"></td>
												
												</tr>
												<tr>
													<td class="no"></td>
													<td class="item-title">Jumlah Peralatan yang disampaikan <?=count($peralatan) ?> Buah
													</td>
													<td class="item-title"><?=count($peralatan) ?> Buah</td>
													<td class="keputusan"></td>
											
												</tr>
												<tr>
													<td class="no"></td>
													<td class="item-title">Rincian: </td>
													<td class="item-title"></td>
													<td class="keputusan"></td>
												
												</tr>
												<?php foreach($peralatan as $row_peralatan) :?>
												<tr>
													<td class="no"></td>
													<td class="item-title">Nama Peralatan Utama: <?=$row_peralatan['subvarian']?></td>
													<td class="item-title"></td>
													<td class="keputusan"></td>
												
												</tr>
												<tr>
													<td class="no"></td>
													<td class="item-title">Nomor Registrasi Peralatan: <?=$row_peralatan['nomor_registrasi_peralatan']?></td>
													<td class="item-title"></td>
													<td class="keputusan"></td>
												
												</tr>
												<?php endforeach ;?>
												
												<tr>
													<td class="no">B</td>
													
													<td>
														<div style="display: flex; align-items: center; gap: 8px;">
															<label for="hasil">Komitmen:</label>
															<input type="text" id="hasil" value="<?=$penilaian_frpkp[0]['komitmen_sewa'];?>" name="komitmen_peralatan" class="form-control" placeholder="Sewa/Milik">
														</div>
													</td>
													<td class="item-title"></td>
													<td class="keputusan"></td>
												
												</tr>
												<tr>
													<td class="no">5</td>
													<td class="item-title">Penilaian Komitmen penyelenggaraan SMAP Badan
														Usaha</td>
													<td class="item-title"></td>
													<td class="keputusan">
														<div class="center">
															<select class="form-control" name="checkbox_smap"
																required="required">
																<option <?php if($penilaian_frpkp[0]['smap']=='1') :?>selected<?php endif ;?> value="1">MEMENUHI</option>
																<option <?php if($penilaian_frpkp[0]['smap']=='0') :?>selected<?php endif ;?> value="0">TIDAK MEMENUHI</option>
															</select>

														</div>
													</td>
													
												</tr>
											
												<tr>
													<td class="no"></td>
													<td class="item-title">
														1. Bagi yang menyampaikan Sertifikat ISO37001:2016<br>
														<div style="display: flex; align-items: center; gap: 8px;">
															<label for="hasil">a.Nomor_Sertifikat:</label>
															<input type="text" id="hasil" value="<?=$penilaian_frpkp[0]['no_sertifikat_smap'];?>" name="nomor_sertifikat_iso" class="form-control" placeholder="Nomor Sertifikat ISO">
														</div><br>
														<div style="display: flex; align-items: center; gap: 8px;">
															<label for="hasil">b.Penerbit:</label>
															<input type="text" id="hasil" value="<?=$penilaian_frpkp[0]['penerbit_smap'];?>" name="penerbit_iso" class="form-control" placeholder="Penerbit ISO">
														</div><br>
													</td>
													
													<td class="keputusan"><div style="display: flex; align-items: center; gap: 8px;">
															
															<input type="text" id="hasil" name="hasil" class="form-control" placeholder="Penerbit ISO">
														</div></td>
													<td></td>
												
													
												</tr>
												<tr>
													<td class="no"></td>
													<td class="item-title">
														2. Bagi yang menyampaikan dokumen penerapan
														SMAP<br>
														
														<div style="display: flex; align-items: center; gap: 8px;">
															<label for="hasil">- Nilai Penerapan SMAP dari PANCEK</label>
															<input type="text" id="hasil" value="<?=$penilaian_frpkp[0]['nilai_pancek'];?>" name="nilai_pancek" class="form-control" placeholder="Nilai Pancek...">
														</div><br>
														
														<div style="display: flex; align-items: center; gap: 8px;">
															<label for="hasil">- Pemenuhan Dokumen SMAP</label>
															<input type="text" id="pemenuhan_dokumen_smap" value="<?=$penilaian_frpkp[0]['pemenuhan_dokumen_smap'];?>" name="hasil" class="form-control" placeholder="Pemenuhan...">
														</div><br>

													</td>
													<td class="item-title">
														- Nilai penerapan SMAP paling sedikit 70%<br>
														- Pemenuhan dokumen perencanaan SMAP dan<br>
														dokumen rekaman pelaksanan SMAP <br>
													</td>
													<td class="keputusan"></td>
													
												</tr>
												<tr>
													<td class="no"></td>
													<td class="item-title">

														3. Bagi yang menyampakan Pernyataan Memenuhi<br>
														Dokumen SMAP<br>
														<div style="display: flex; align-items: center; gap: 8px;">
															<label for="hasil">- Akan memenuhi dokumen SMAP paling lambat</label>
														  <input type="text" id="tahun_smap" value="<?=$penilaian_frpkp[0]['tahun_smap'];?>" name="tahun_smap" class="form-control" placeholder="... Tahun">
														</div>
<br>
													</td>
													<td class="item-title">
													1 (satu) tahun untuk 
badan usaha Besar atau<br>
2 (dua) tahun untuk 
badan usaha menengah 
/Spesialis atau<br>
3 (tiga) tahun untuk badan 
usaha Kecil

													</td>
													<td class="keputusan">
														
													</td>
													
												</tr>


											</tbody>
										</table>
	<div class="row">
											<div class="input-group file-caption-main">
												<span class="file-caption-icon"></span>
												<textarea id="comment_res" name="catatan_frpkp"
													class="form-control form-control-solid" rows="5"
													placeholder="Catatan resuma...">
			<?php if(!empty($penilaian_frpkp)) :?>
			<?=$penilaian_frpkp[0]['comment'];?>
			<?php else :?>
				REKOMENDASI
Seluruh persyaratan Badan Usaha dinyatakan MEMENUHI/TIDAK
MEMENUHI (hapus yang tidak diperlukan)
			<?php endif ;?>
      </textarea>

											</div>



										</div>


										<br>
										<br>
										<button type="submit" name="submit" style="float: right"
											class="open-delete btn btn-primary btn-labeled btn-rounded"><b><i
													class="icon-paperplane"></i></b> Submit Penilaian FRPKP</button>

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
					if (typeof array != "undefined" && array != null && array.length != null && array.length >
						0) {

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
					if (typeof array != "undefined" && array != null && array.length != null && array.length >
						0) {
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