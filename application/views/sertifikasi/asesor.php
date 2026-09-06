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
							<a href="" class="text-dark">Asesor</a>
						</li>
						<li class="breadcrumb-item text-muted">
							<a href="" class="text-dark">Penilaian Asesor</a>
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
						<h3 class="card-label"></h3>


					</div>
					<div class="card-toolbar">
						<?php if(!empty($ceklis)) :?>
						<div class="card-header">
							<div class="card-title">
								<h3 class="card-label">Cetakan Penilaian</h3>


							</div>
							<div class="card-toolbar">

							</div>
						</div>
						<div class="card-header">

							<div class="card-toolbar">
								<a href="<?= base_url('sertifikasi/cetak_penilaian_asesor/'.$nib_dec.'/'.$tgl_dec.'/'.$user_dec) ;?>"
									target="_blank" class="btn btn-dark font-weight-bolder">
									<i class="flaticon-file"></i>Penilaian Asesor</a>
								<a href="<?= base_url('sertifikasi/cetak_penjualan_tahunan_asesor/'.$nib_dec.'/'.$tgl_dec.'/'.$user_dec) ;?>"
									target="_blank" style="margin:5px;" class="btn btn-dark font-weight-bolder">
									<i class="flaticon2-cup"></i>Penjualan Tahunan</a>
								<a href="<?= base_url('sertifikasi/cetak_keuangan/'.$nib_dec.'/'.$tgl_dec.'/'.$user_dec) ;?>"
									target="_blank" style="margin:5px;" class="btn btn-dark font-weight-bolder">
									<i class="flaticon2-chart"></i>Keuangan</a>
								<a href="<?= base_url('sertifikasi/cetak_tk_asesor/'.$nib_dec.'/'.$tgl_dec.'/'.$user_dec) ;?>"
									target="_blank" style="margin:5px;" class="btn btn-dark font-weight-bolder">
									<i class="flaticon-customer"></i>Tenaga Kerja</a>

								<a href="<?= base_url('sertifikasi/cetak_peralatan_asesor/'.$nib_dec.'/'.$tgl_dec.'/'.$user_dec) ;?>"
									target="_blank" style="margin:5px;" class="btn btn-dark font-weight-bolder">
									<i class="flaticon2-lorry"></i>Peralatan</a>
								<a href="<?= base_url('sertifikasi/cetak_smap/'.$nib_dec.'/'.$tgl_dec.'/'.$user_dec) ;?>"
									target="_blank" style="margin:5px;" class="btn btn-dark font-weight-bolder">
									<i class="flaticon2-crisp-icons"></i>SMAP</a>
								
								<a href="<?= base_url('sertifikasi/berita_acara_asesor/'.$nib_dec.'/'.$tgl_dec.'/'.$user_dec) ;?>"
									target="_blank" style="margin:5px;" class="btn btn-dark font-weight-bolder">
									<i class="flaticon2-crisp-icons"></i>BA Asesor</a>





							</div>
						</div>
						<?php endif ;?>

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
									<a class="nav-link" id="contact-tab-1" data-toggle="tab" href="#penilaian"
										aria-controls="contact">
										<span class="nav-icon">
											<i class="flaticon2-rocket-1"></i>
										</span>
										<span class="nav-text">Penilaian</span>
									</a>
								</li>




							</ul>
							<?php
							  $count=0;
								if(!empty($ceklis)){
									foreach($ceklis as $row_ceklis){
	 							  $count+=1;
	 							  for ($i=0; $i < count($ceklis); $i++) {
	 							    if($row_ceklis['id']==$ceklis[$i]['id']){
	 							      ${"data_ceklis".$row_ceklis['id']}=$row_ceklis['ceklis'];
											${"data_ceklis".$row_ceklis['id']."_2"}=$row_ceklis['ceklis_2'];
	 							      ${"data_comment".$row_ceklis['id']}=$row_ceklis['comment'];
	 							      ${"data_deksripsi".$row_ceklis['id']}=$row_ceklis['Deskripsi'];
	 							    }
	 							  }
	 							}
								}
							  ;?>
							<?php echo form_open_multipart(base_url('sertifikasi/insert_asesor'), 'method="POST"');?>

							<div class="tab-content mt-5" id="myTabContent1">
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
												<!--
															<div class="row">
																<div class="col-md-3">
																	<div class="content-group-lg">
																		<h6 class="text-semibold">#1</h6>
																		<p class="content-group">File NIB</p>
																	</div>
																</div>

																<div class="col-md-1">
																	<font class="text-semibold" style="font-size: 10px;">Tidak/Ada</font>
																	<span class="switch switch-outline switch-icon switch-dark">

																		<label>
																			<input type="checkbox"  <?php if(!empty($ceklis)):?> <?php if($data_ceklis1=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?>id="checkbox_1" value="1" onclick="javascript:checkbox1()" name="checkbox_1" />
																			<span></span>
																		</label>
																	</span>

																</div>
																<div class="col-md-1">
																	<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
																	<span class="switch switch-outline switch-icon switch-dark">

																		<label>
																			<input type="checkbox"  <?php if(!empty($ceklis_2)):?> <?php if($data_ceklis1_2=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?>id="checkbox_1_2" value="1" onclick="javascript:checkbox1()" name="checkbox_1_2" />
																			<span></span>
																		</label>
																	</span>

																</div>
																<div class="col-md-2">
																	<br>
																	<a href="<?= $biodata[0]['file_nib'] ;?>" target="_blank" type="button" name="btn_cek_13"  style="float: right" class="open-delete btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																</div>
																	<div class="col-md-5">
																		<br>
																		<div class="input-group file-caption-main">
																			<span class="file-caption-icon"></span>
																			<input type="text" id="comment_1" name="comment_1" <?php if(!empty($ceklis)):?> value="<?=$data_comment1;?>"<?php else :?> disabled="disabled" <?php endif ;?>  class="form-control" placeholder="Comment...">



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
																	<font class="text-semibold" style="font-size: 10px;">Tidak/Ada</font>
																	<span class="switch switch-outline switch-icon switch-dark">

																		<label>
																			<input type="checkbox" <?php if(!empty($ceklis)):?> <?php if($data_ceklis2=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_2" value="1" onclick="javascript:checkbox2()" name="checkbox_2" />
																			<span></span>
																		</label>
																	</span>

																</div>
																<div class="col-md-1">
																	<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
																	<span class="switch switch-outline switch-icon switch-dark">

																		<label>
																			<input type="checkbox" <?php if(!empty($ceklis_2)):?> <?php if($data_ceklis2_2=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_2_2" value="1" onclick="javascript:checkbox2()" name="checkbox_2_2" />
																			<span></span>
																		</label>
																	</span>

																</div>
																<div class="col-md-2">
																	<br>
																	<a href="<?= $biodata[0]['file_npwp'] ;?>" target="_blank" type="button" name="btn_cek_11"  style="float: right" class="open-delete btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																</div>
																	<div class="col-md-5">
																		<br>
																		<div class="input-group file-caption-main">
																			<span class="file-caption-icon"></span>
																			<input type="text" id="comment_2" name="comment_2"   class="form-control" <?php if(!empty($ceklis)):?> value="<?=$data_comment2;?>"<?php else :?> disabled="disabled" <?php endif ;?> placeholder="Comment...">



																		</div>
																	</div>
															</div>-->
												<!--3-->
												<div class="row">
													<div class="col-md-2">
														<div class="content-group-lg">
															<h6 class="text-semibold">#1</h6>
															<p class="content-group">Surat Pernyataan Tanggung Jawab
																Mutlak</p>
														</div>
													</div>

													<div class="col-md-1">
														<font class="text-semibold" style="font-size: 11px;">Tidak/Ada
														</font>
														<span class="switch switch-outline switch-icon switch-dark">

															<label>
																<input type="checkbox" <?php if(!empty($ceklis)):?>
																	<?php if($data_ceklis23=='1') :?>checked="checked"
																	<?php else :?><?php endif ;?> <?php else :?>
																	checked="checked" <?php endif ;?> id="checkbox_23"
																	value="1" onclick="javascript:checkbox23()"
																	name="checkbox_23" />
																<span></span>
															</label>
														</span>

													</div>
													
													<div class="col-md-">
														<font class="text-semibold" style="font-size: 10px;">Tidak/Valid
														</font>
														<span class="switch switch-outline switch-icon switch-dark">

															<label>
																<input type="checkbox" <?php if(!empty($ceklis_2)):?>
																	<?php if($data_ceklis23_2=='1') :?>checked="checked"
																	<?php else :?><?php endif ;?> <?php else :?>
																	checked="checked" <?php endif ;?> id="checkbox_3_23"
																	value="1" onclick="javascript:checkbox23()"
																	name="checkbox_23_3" />
																<span></span>
															</label>
														</span>

													</div>
													<div class="col-md-1">
														<font class="text-semibold" style="font-size: 10px;">Tidak/Valid
														</font>
														<span class="switch switch-outline switch-icon switch-dark">

															<label>
																<input type="checkbox" <?php if(!empty($ceklis_2)):?>
																	<?php if($data_ceklis23_2=='1') :?>checked="checked"
																	<?php else :?><?php endif ;?> <?php else :?>
																	checked="checked" <?php endif ;?> id="checkbox_2_23"
																	value="1" onclick="javascript:checkbox23()"
																	name="checkbox_23_2" />
																<span></span>
															</label>
														</span>

													</div>
													<div class="col-md-2">
														<br>
														<a <?php if($biodata[0]['sptjm']!='') :?>href="<?= $biodata[0]['sptjm'] ;?>"
															<?php else :?>href="<?= base_url('not_found') ;?>"
															<?php endif ;?> target="_blank" type="button"
															name="btn_cek_11" style="float: right"
															class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																	class="icon-file-check"></i></b> Softcopy</a>
													</div>
													<div class="col-md-5">
														<br>
														<div class="input-group file-caption-main">
															<span class="file-caption-icon"></span>
															<input type="text" id="comment_23" name="comment_23"
																class="form-control" <?php if(!empty($ceklis)):?>
																value="<?=$data_comment23;?>" <?php endif ;?>
																placeholder="Comment...">



														</div>
													</div>
												</div>




											</div>
										</div>
									</div>
									<hr>


									<div class="row">
										<div class="col-md-2">
											<div class="content-group-lg">
												<h6 class="text-semibold"><span class="text-danger">#CATATAN
														PENILAIAN</span></h6>
												<p class="content-group"><span class="text-danger">Administrasi</span>
												</p>
											</div>
										</div>

										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Ada</font>
											<span class="switch switch-outline switch-icon switch-danger">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis)):?>
														<?php if($data_ceklis80=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_80" value="1" name="checkbox_80" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis80_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_80_3" value="1"
														name="checkbox_80_3" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis80_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_80_2" value="1"
														name="checkbox_80_2" />
													<span></span>
												</label>
											</span>

										</div>

										<div class="col-md-7">
											<br>
											<div class="input-group file-caption-main">
												<span class="file-caption-icon"></span>
												<textarea id="comment_80" name="comment_80"
													class="form-control form-control-solid"
													rows="5"><?php if(!empty($ceklis)){echo $data_comment80;}?> </textarea>


											</div>
										</div>
									</div>
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

								<div class="tab-pane fade show" id="smm" role="tabpanel" aria-labelledby="home-tab-1">

									<div class="col-md-12">
										<div class="panel panel-flat panel-collapsed">
											<div class="panel-heading">
												<h5 class="panel-title">SMM</h5>
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
																		<p class="content-group">Dokumen Pendukung</p>
																	</div>
																</div>

																<div class="col-md-1">
																	<font class="text-semibold" style="font-size: 10px;">Tidak/Ada</font>
																	<span class="switch switch-outline switch-icon switch-dark">

																		<label>
																			<input type="checkbox" <?php if(!empty($ceklis)):?> <?php if($data_ceklis3=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_3" value="1" onclick="javascript:checkbox3()" name="checkbox_3" />
																			<span></span>
																		</label>
																	</span>

																</div>
																<div class="col-md-1">
																	<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
																	<span class="switch switch-outline switch-icon switch-dark">

																		<label>
																			<input type="checkbox"  <?php if(!empty($ceklis_2)):?> <?php if($data_ceklis3_2=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?>id="checkbox_3_2" value="1" onclick="javascript:checkbox1()" name="checkbox_3_2" />
																			<span></span>
																		</label>
																	</span>

																</div>
																<div class="col-md-2">
																	<br>
																	<a href="<?= $smm[0]['dokumen_pendukung'] ;?>" target="_blank" type="button" name="btn_cek_13"  style="float: right" class="open-delete btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																</div>
																	<div class="col-md-5">
																		<br>
																		<div class="input-group file-caption-main">
																			<span class="file-caption-icon"></span>
																			<input type="text" id="comment_3" name="comment_3" <?php if(!empty($ceklis)):?> value="<?=$data_comment3;?>"<?php else :?> disabled="disabled" <?php endif ;?>  class="form-control" disabled="disabled" placeholder="Comment...">



																		</div>
																	</div>
															</div>-->
												<!--2-->

												<!--3-->
												<div class="row">
													<div class="col-md-3">
														<div class="content-group-lg">
															<h6 class="text-semibold">#1</h6>
															<p class="content-group">Dokumen SMM</p>
														</div>
													</div>

													<div class="col-md-1">
														<font class="text-semibold" style="font-size: 10px;">Tidak/Ada
														</font>
														<span class="switch switch-outline switch-icon switch-dark">

															<label>
																<input type="checkbox" <?php if(!empty($ceklis)):?>
																	<?php if($data_ceklis4=='1') :?>checked="checked"
																	<?php else :?><?php endif ;?> <?php else :?>
																	checked="checked" <?php endif ;?> id="checkbox_4"
																	value="1" onclick="javascript:checkbox4()"
																	name="checkbox_4" />
																<span></span>
															</label>
														</span>

													</div>
													<div class="col-md-1">
														<font class="text-semibold" style="font-size: 10px;">Tidak/Valid
														</font>
														<span class="switch switch-outline switch-icon switch-dark">

															<label>
																<input type="checkbox" <?php if(!empty($ceklis_2)):?>
																	<?php if($data_ceklis4_2=='1') :?>checked="checked"
																	<?php else :?><?php endif ;?> <?php else :?>
																	checked="checked" <?php endif ;?>id="checkbox_4_2"
																	value="1" onclick="javascript:checkbox4()"
																	name="checkbox_4_2" />
																<span></span>
															</label>
														</span>

													</div>
													<div class="col-md-2">
														<br>
														<a <?php if($smm[0]['file_surat_pernyataan']!='') :?>href="<?= $smm[0]['file_surat_pernyataan'] ;?>"
															<?php else :?>href="<?= base_url('not_found') ;?>"
															<?php endif ;?> target="_blank" type="button"
															name="btn_cek_11" style="float: right"
															class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																	class="icon-file-check"></i></b> Softcopy</a>
													</div>
													<div class="col-md-5">
														<br>
														<div class="input-group file-caption-main">
															<span class="file-caption-icon"></span>
															<input type="text" id="comment_4" name="comment_4"
																<?php if(!empty($ceklis)):?>
																value="<?=$data_comment4;?>" <?php endif ;?>
																class="form-control" placeholder="Comment...">



														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-3">
														<div class="content-group-lg">
															<h6 class="text-semibold">#2</h6>
															<p class="content-group">File Surat Pernyataan</p>
														</div>
													</div>

													<div class="col-md-1">
														<font class="text-semibold" style="font-size: 10px;">Tidak/Ada
														</font>
														<span class="switch switch-outline switch-icon switch-dark">

															<label>
																<input type="checkbox" <?php if(!empty($ceklis)):?>
																	<?php if($data_ceklis30=='1') :?>checked="checked"
																	<?php else :?><?php endif ;?> <?php else :?>
																	checked="checked" <?php endif ;?> id="checkbox_30"
																	value="1" onclick="javascript:checkbox30()"
																	name="checkbox_30" />
																<span></span>
															</label>
														</span>

													</div>
													<div class="col-md-1">
														<font class="text-semibold" style="font-size: 10px;">Tidak/Valid
														</font>
														<span class="switch switch-outline switch-icon switch-dark">

															<label>
																<input type="checkbox" <?php if(!empty($ceklis_2)):?>
																	<?php if($data_ceklis30_2=='1') :?>checked="checked"
																	<?php else :?><?php endif ;?> <?php else :?>
																	checked="checked" <?php endif ;?>id="checkbox_30_2"
																	value="1" onclick="javascript:checkbox30()"
																	name="checkbox_30_2" />
																<span></span>
															</label>
														</span>

													</div>
													<div class="col-md-2">
														<br>
														<a <?php if($smm[0]['file_surat_pernyataan']!='') :?>href="<?= $smm[0]['file_surat_pernyataan'] ;?>"
															<?php else :?>href="<?= base_url('not_found') ;?>"
															<?php endif ;?> target="_blank" type="button"
															name="btn_cek_11" style="float: right"
															class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																	class="icon-file-check"></i></b> Softcopy</a>
													</div>
													<div class="col-md-5">
														<br>
														<div class="input-group file-caption-main">
															<span class="file-caption-icon"></span>
															<input type="text" id="comment_30" name="comment_30"
																<?php if(!empty($ceklis)):?>
																value="<?=$data_comment30;?>" <?php endif ;?>
																class="form-control" placeholder="Comment...">



														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-3">
														<div class="content-group-lg">
															<h6 class="text-semibold">#3</h6>
															<p class="content-group">Sertifikat ISO - SMM</p>
														</div>
													</div>

													<div class="col-md-1">
														<font class="text-semibold" style="font-size: 10px;">Tidak/Ada
														</font>
														<span class="switch switch-outline switch-icon switch-dark">

															<label>
																<input type="checkbox" <?php if(!empty($ceklis)):?>
																	<?php if($data_ceklis31=='1') :?>checked="checked"
																	<?php else :?><?php endif ;?> <?php else :?>
																	checked="checked" <?php endif ;?> id="checkbox_31"
																	value="1" onclick="javascript:checkbox31()"
																	name="checkbox_31" />
																<span></span>
															</label>
														</span>

													</div>
													<div class="col-md-1">
														<font class="text-semibold" style="font-size: 10px;">Tidak/Valid
														</font>
														<span class="switch switch-outline switch-icon switch-dark">

															<label>
																<input type="checkbox" <?php if(!empty($ceklis_2)):?>
																	<?php if($data_ceklis31_2=='1') :?>checked="checked"
																	<?php else :?><?php endif ;?> <?php else :?>
																	checked="checked" <?php endif ;?>id="checkbox_31_2"
																	value="1" onclick="javascript:checkbox31()"
																	name="checkbox_31_2" />
																<span></span>
															</label>
														</span>

													</div>
													<div class="col-md-2">
														<br>
														<a <?php if($smm[0]['sertifikat_iso']!='') :?>href="<?= $smm[0]['sertifikat_iso'] ;?>"
															<?php else :?>href="<?= base_url('not_found') ;?>"
															<?php endif ;?> target="_blank" type="button"
															name="btn_cek_11" style="float: right"
															class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																	class="icon-file-check"></i></b> Softcopy</a>
													</div>
													<div class="col-md-5">
														<br>
														<div class="input-group file-caption-main">
															<span class="file-caption-icon"></span>
															<input type="text" id="comment_31" name="comment_31"
																<?php if(!empty($ceklis)):?>
																value="<?=$data_comment31;?>" <?php endif ;?>
																class="form-control" placeholder="Comment...">



														</div>
													</div>
												</div>




											</div>
										</div>
									</div>
									<hr>


									<div class="row">
										<div class="col-md-3">
											<div class="content-group-lg">
												<h6 class="text-semibold"><span class="text-danger">#CEKLIS</span></h6>
												<p class="content-group"><span class="text-danger">SMM</span></p>
											</div>
										</div>

										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Ada</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis)):?>
														<?php if($data_ceklis79=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_79" value="1"
														onclick="javascript:checkbox79()" name="checkbox_79" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis79_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_79_2" value="1"
														name="checkbox_79_2" />
													<span></span>
												</label>
											</span>

										</div>

										<div class="col-md-7">
											<br>
											<div class="input-group file-caption-main">
												<span class="file-caption-icon"></span>
												<textarea id="comment_79" name="comment_79"
													class="form-control form-control-solid"
													rows="5"><?php if(!empty($ceklis)){echo $data_comment79;}?> </textarea>



											</div>
										</div>
									</div>
									<hr>

									<hr>
									<?php if(!empty($smm)) :?>
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
																class="text-dark"><?php echo $smm[0]['nomor_sertifikat'] ;?></span>
														</td>

													</tr>
													<tr>
														<td>Tipe Dokumen</td>
														<td><span
																class="text-dark"><?php echo $smm[0]['dokumen_smm'] ;?></span>
														</td>

													</tr>




												</tbody>
											</table>
										</div>
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

											<div class="panel-body">
												<!--#1-->
												<div class="row">
													<div class="col-md-3">
														<div class="content-group-lg">
															<h6 class="text-semibold">#1</h6>
															<p class="content-group">Dokumen SMAP</p>
														</div>
													</div>

													<div class="col-md-1">
														<font class="text-semibold" style="font-size: 11px;">Tidak/Ada
														</font>
														<span class="switch switch-outline switch-icon switch-primary">

															<label>
																<input type="checkbox" checked="checked" id="checkbox_5"
																	value="1" onclick="javascript:checkbox5()"
																	name="checkbox_5" />
																<span></span>
															</label>
														</span>

													</div>

													<div class="col-md-8">
														<br>
														<div class="input-group file-caption-main">
															<span class="file-caption-icon"></span>
															<input type="text" id="comment_5" name="comment_5"
																class="form-control" disabled="disabled"
																placeholder="Comment...">


															<div class="input-group-btn input-group-append">
																<button type="button" onclick="javascript:get5()"
																	id="get_5" disabled="disabled"
																	class="btn btn-dark btn-ladda btn-ladda-spinner"
																	data-spinner-color="#333" data-style="zoom-in"><span
																		class="ladda-label">Submit</span></button>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-3">
														<div class="content-group-lg">
															<h6 class="text-semibold">#2</h6>
															<p class="content-group">Sertifikat ISO</p>
														</div>
													</div>

													<div class="col-md-1">
														<font class="text-semibold" style="font-size: 11px;">Tidak/Ada
														</font>
														<span class="switch switch-outline switch-icon switch-primary">

															<label>
																<input type="checkbox" checked="checked"
																	id="checkbox_34" value="1"
																	onclick="javascript:checkbox34()"
																	name="checkbox_34" />
																<span></span>
															</label>
														</span>

													</div>

													<div class="col-md-8">
														<br>
														<div class="input-group file-caption-main">
															<span class="file-caption-icon"></span>
															<input type="text" id="comment_34" name="comment_34"
																class="form-control" disabled="disabled"
																placeholder="Comment...">


															<div class="input-group-btn input-group-append">
																<button type="button" onclick="javascript:get34()"
																	id="get_34" disabled="disabled"
																	class="btn btn-dark btn-ladda btn-ladda-spinner"
																	data-spinner-color="#333" data-style="zoom-in"><span
																		class="ladda-label">Submit</span></button>
															</div>
														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-3">
														<div class="content-group-lg">
															<h6 class="text-semibold">#3</h6>
															<p class="content-group">File Surat Pernyataan</p>
														</div>
													</div>

													<div class="col-md-1">
														<font class="text-semibold" style="font-size: 11px;">Tidak/Ada
														</font>
														<span class="switch switch-outline switch-icon switch-primary">

															<label>
																<input type="checkbox" checked="checked"
																	id="checkbox_35" value="1"
																	onclick="javascript:checkbox35()"
																	name="checkbox_35" />
																<span></span>
															</label>
														</span>

													</div>

													<div class="col-md-8">
														<br>
														<div class="input-group file-caption-main">
															<span class="file-caption-icon"></span>
															<input type="text" id="comment_35" name="comment_35"
																class="form-control" disabled="disabled"
																placeholder="Comment...">


															<div class="input-group-btn input-group-append">
																<button type="button" onclick="javascript:get35()"
																	id="get_35" disabled="disabled"
																	class="btn btn-dark btn-ladda btn-ladda-spinner"
																	data-spinner-color="#333" data-style="zoom-in"><span
																		class="ladda-label">Submit</span></button>
															</div>
														</div>
													</div>
												</div>




											</div>
										</div>
									</div>
									<hr>


									<div class="row">
                                        <div class="col-md-2">
                                            <div class="content-group-lg">
                                                <h6 class="text-semibold"><span class="text-danger">#CEKLIS</span></h6>
                                                <p class="content-group"><span class="text-danger">SMAP</span></p>
                                            </div>
                                        </div>

                                        <div class="col-md-1">
                                            <font class="text-semibold" style="font-size: 10px;">Tidak/Ada</font>
                                            <span class="switch switch-outline switch-icon switch-danger">

                                                <label>
                                                    <input type="checkbox" <?php if(!empty($ceklis)):?>
                                                        <?php if($data_ceklis78=='1') :?>checked="checked"
                                                        <?php else :?><?php endif ;?> <?php else :?> checked="checked"
                                                        <?php endif ;?> id="checkbox_78" value="1" name="checkbox_78" />
                                                    <span></span>
                                                </label>
                                            </span>

                                        </div>
										<div class="col-md-1">
                                            <font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
                                            <span class="switch switch-outline switch-icon switch-dark">

                                                <label>
                                                    <input type="checkbox" <?php if(!empty($ceklis_2)):?>
                                                        <?php if($data_ceklis78_2=='1') :?>checked="checked"
                                                        <?php else :?><?php endif ;?> <?php else :?> checked="checked"
                                                        <?php endif ;?> id="checkbox_78_3" value="1"
                                                        name="checkbox_78_3" />
                                                    <span></span>
                                                </label>
                                            </span>

                                        </div>
                                        <div class="col-md-1">
                                            <font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
                                            <span class="switch switch-outline switch-icon switch-dark">

                                                <label>
                                                    <input type="checkbox" <?php if(!empty($ceklis_2)):?>
                                                        <?php if($data_ceklis78_2=='1') :?>checked="checked"
                                                        <?php else :?><?php endif ;?> <?php else :?> checked="checked"
                                                        <?php endif ;?> id="checkbox_78_2" value="1"
                                                        name="checkbox_78_2" />
                                                    <span></span>
                                                </label>
                                            </span>

                                        </div>

                                        <div class="col-md-7">
                                            <br>
                                            <div class="input-group file-caption-main">
                                                <span class="file-caption-icon"></span>
                                                <textarea id="comment_78" name="comment_78"
                                                    class="form-control form-control-solid"
                                                    rows="5"><?php if(!empty($ceklis)){echo $data_comment78;}?> </textarea>



                                            </div>
                                        </div>
                                    </div>
									<?php if(!empty($smap)) :?>
									<div class="accordion accordion-toggle-arrow" id="accordionExample1">

										<?php foreach ($smap as $row_smap) :?>
										<?php $counter_pengalaman+=1 ;?>
										<div class="card">
											<div class="card-header">
												<div class="card-title collapsed" data-toggle="collapse"
													data-target="#data-smap-<?php echo $counter_pengalaman ;?>">
													<?php echo $row_smap['id_sub_klasifikasi'] ;?>
												</div>
											</div>
											<div id="data-smap-<?php echo $counter_pengalaman ;?>" class="collapse show"
												data-parent="#accordionExample1">

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
																<p class="content-group">File Dokumen SMAP</p>
															</div>
														</div>


														<div class="col-md-4">
															<br>
															<a <?php if($row_smap['file_surat_pernyataan']!='') :?>href="<?= $row_smap['file_surat_pernyataan'] ;?>"
																<?php else :?>href="<?= base_url('not_found') ;?>"
																<?php endif ;?> target="_blank" type="button"
																name="btn_cek_13" style="float: right"
																class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																		class="icon-file-check"></i></b> Softcopy</a>
														</div>


														<!--#2-->

														<div class="col-md-2">
															<div class="content-group-lg">
																<h6 class="text-semibold">#2</h6>
																<p class="content-group">Sertifikat ISO</p>
															</div>
														</div>


														<div class="col-md-4">
															<br>
															<a <?php if($row_smap['sertifikat_iso']!='') :?>href="<?= $row_smap['sertifikat_iso'] ;?>"
																<?php else :?>href="<?= base_url('not_found') ;?>"
																<?php endif ;?> target="_blank" type="button"
																name="btn_cek_13" style="float: right"
																class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																		class="icon-file-check"></i></b> Softcopy</a>
														</div>

													</div>
													<div class="row">
														<div class="col-md-2">
															<div class="content-group-lg">
																<h6 class="text-semibold">#3</h6>
																<p class="content-group">File Surat Pernyataan</p>
															</div>
														</div>


														<div class="col-md-4">
															<br>
															<a <?php if($row_smap['file_surat_pernyataan']!='') :?>href="<?= $row_smap['file_surat_pernyataan'] ;?>"
																<?php else :?>href="<?= base_url('not_found') ;?>"
																<?php endif ;?> target="_blank" type="button"
																name="btn_cek_35" style="float: right"
																class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
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
										</div>
										<hr>
										<?php endforeach;?>


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
													<span class="switch switch-outline switch-icon switch-dark">

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
													<span class="switch switch-outline switch-icon switch-dark">

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
													<span class="switch switch-outline switch-icon switch-dark">

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
									<div class="row">
										<div class="col-md-2">
											<div class="content-group-lg">
												<h6 class="text-semibold"><span class="text-danger">#CATATAN
														PENILAIAN</span></h6>
												<p class="content-group"><span class="text-danger">Pengurus</span></p>
											</div>
										</div>

										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Ada</font>
											<span class="switch switch-outline switch-icon switch-danger">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis)):?>
														<?php if($data_ceklis81=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_81" value="1" name="checkbox_81" />
													<span></span>

												</label>
											</span>

										</div>
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis81_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_81_3" value="1"
														name="checkbox_81_3" />
													<span></span>

												</label>
											</span>

										</div>
										
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis81_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_81_2" value="1"
														name="checkbox_81_2" />
													<span></span>

												</label>
											</span>

										</div>

										<div class="col-md-7">
											<br>
											<div class="input-group file-caption-main">
												<span class="file-caption-icon"></span>
												<textarea id="comment_81" name="comment_81"
													class="form-control form-control-solid"
													rows="5"><?php if(!empty($ceklis)){echo $data_comment81;}?></textarea>



											</div>
										</div>
									</div>
									<hr>
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
																<tr>
																	<td>HP 1</td>
																	<td><span
																			class="text-dark"><?php echo $row_pengurus['hp_a'] ?></span>
																	</td>
																</tr>
																<tr>
																	<td>HP 2</td>
																	<td><span
																			class="text-dark"><?php echo $row_pengurus['hp_b'] ?></span>
																	</td>
																</tr>
																<tr>
																	<td>HP 2</td>
																	<td><span
																			class="text-dark"><?php echo $row_pengurus['hp_b'] ?></span>
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
								<div class="tab-pane fade" id="pengalaman" role="tabpanel"
									aria-labelledby="contact-tab-1">

									<legend>Pengalaman</legend>
									<!--
										<div class="row">
											<div class="col-md-3">
												<div class="content-group-lg">
													<h6 class="text-semibold">#1</h6>
													<p class="content-group">Doc 1</p>
												</div>
											</div>

											<div class="col-md-1">
												<font class="text-semibold" style="font-size: 10px;">Tidak/Ada</font>
												<span class="switch switch-outline switch-icon switch-dark">

													<label>
														<input type="checkbox" <?php if(!empty($ceklis)):?> <?php if($data_ceklis9=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_9" value="1" onclick="javascript:checkbox9()" name="checkbox_9" />
														<span></span>
													</label>
												</span>

											</div>
											<div class="col-md-1">
												<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
												<span class="switch switch-outline switch-icon switch-dark">

													<label>
														<input type="checkbox" <?php if(!empty($ceklis_2)):?> <?php if($data_ceklis9_2=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_9_2" value="1" onclick="javascript:checkbox9()" name="checkbox_9_2" />
														<span></span>
													</label>
												</span>

											</div>

												<div class="col-md-7">
													<br>
													<div class="input-group file-caption-main">
														<span class="file-caption-icon"></span>
														<input type="text" id="comment_9" name="comment_9"   class="form-control" <?php if(!empty($ceklis)):?> value="<?=$data_comment9;?>"<?php else :?> disabled="disabled" <?php endif ;?> placeholder="Comment...">



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
												<font class="text-semibold" style="font-size: 10px;">Tidak/Ada</font>
												<span class="switch switch-outline switch-icon switch-dark">

													<label>
														<input type="checkbox" <?php if(!empty($ceklis)):?> <?php if($data_ceklis10=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_10" value="1" onclick="javascript:checkbox10()" name="checkbox_10" />
														<span></span>
													</label>
												</span>

											</div>
											<div class="col-md-1">
												<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
												<span class="switch switch-outline switch-icon switch-dark">

													<label>
														<input type="checkbox" <?php if(!empty($ceklis_2)):?> <?php if($data_ceklis10_2=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_10_2" value="1" onclick="javascript:checkbox10()" name="checkbox_10_2" />
														<span></span>
													</label>
												</span>

											</div>

												<div class="col-md-7">
													<br>
													<div class="input-group file-caption-main">
														<span class="file-caption-icon"></span>
														<input type="text" id="comment_10" name="comment_10"   class="form-control" <?php if(!empty($ceklis)):?> value="<?=$data_comment10;?>"<?php else :?> disabled="disabled" <?php endif ;?>placeholder="Comment...">


													</div>
												</div>
										</div>-->
									<div class="row">
										<div class="col-md-2">
											<div class="content-group-lg">
												<h6 class="text-semibold">#1</h6>
												<p class="content-group">File BAST</p>
											</div>
										</div>

										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Ada</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis)):?>
														<?php if($data_ceklis24=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_24" value="1"
														onclick="javascript:checkbox24()" name="checkbox_24" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis24_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?>id="checkbox_24_3" value="1" name="checkbox_24_3" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis24_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?>id="checkbox_24_2" value="1"
														onclick="javascript:checkbox24()" name="checkbox_24_2" />
													<span></span>
												</label>
											</span>

										</div>

										<div class="col-md-7">
											<br>
											<div class="input-group file-caption-main">
												<span class="file-caption-icon"></span>
												<input type="text" id="comment_24" name="comment_24"
													<?php if(!empty($ceklis)):?> value="<?=$data_comment24;?>"
													<?php endif ;?> class="form-control" placeholder="Comment...">



											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-2">
											<div class="content-group-lg">
												<h6 class="text-semibold">#2</h6>
												<p class="content-group">File BAQ RAB MPU</p>
											</div>
										</div>

										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Ada</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis)):?>
														<?php if($data_ceklis25=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_25" value="1"
														onclick="javascript:checkbox25()" name="checkbox_25" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis25_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?>id="checkbox_25_3" value="1" name="checkbox_25_3" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis25_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?>id="checkbox_25_2" value="1"
														onclick="javascript:checkbox25()" name="checkbox_25_2" />
													<span></span>
												</label>
											</span>

										</div>

										<div class="col-md-7">
											<br>
											<div class="input-group file-caption-main">
												<span class="file-caption-icon"></span>
												<input type="text" id="comment_25" name="comment_25"
													<?php if(!empty($ceklis)):?> value="<?=$data_comment25;?>"
													<?php endif ;?> class="form-control" placeholder="Comment...">



											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-2">
											<div class="content-group-lg">
												<h6 class="text-semibold">#3</h6>
												<p class="content-group">File Kontrak Dengan Pemberi Tugas</p>
											</div>
										</div>

										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Ada</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis)):?>
														<?php if($data_ceklis26=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_26" value="1"
														onclick="javascript:checkbox26()" name="checkbox_26" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis26_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?>id="checkbox_26_3" value="1" name="checkbox_26_3" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis26_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?>id="checkbox_26_2" value="1"
														onclick="javascript:checkbox26()" name="checkbox_26_2" />
													<span></span>
												</label>
											</span>

										</div>

										<div class="col-md-7">
											<br>
											<div class="input-group file-caption-main">
												<span class="file-caption-icon"></span>
												<input type="text" id="comment_26" name="comment_26"
													<?php if(!empty($ceklis)):?> value="<?=$data_comment26;?>"
													<?php endif ;?> class="form-control" placeholder="Comment...">



											</div>
										</div>
									</div>

									<hr>
									<div class="row">
										<div class="col-md-2">
											<div class="content-group-lg">
												<h6 class="text-semibold"><span class="text-danger">#CATATAN
														PENILAIAN</span></h6>
												<p class="content-group"><span class="text-danger">Pengalaman</span></p>
											</div>
										</div>

										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Ada</font>
											<span class="switch switch-outline switch-icon switch-danger">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis)):?>
														<?php if($data_ceklis82=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_82" value="1" name="checkbox_82" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis82_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_82_3" value="1"
														name="checkbox_82_3" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis82_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_82_2" value="1"
														name="checkbox_82_2" />
													<span></span>
												</label>
											</span>

										</div>

										<div class="col-md-7">
											<br>
											<div class="input-group file-caption-main">
												<span class="file-caption-icon"></span>
												<textarea id="comment_82" name="comment_82"
													class="form-control form-control-solid"
													rows="5"><?php if(!empty($ceklis)){echo $data_comment82;}?></textarea>

											</div>
										</div>
									</div>
									<hr>
									<?php if(!empty($penjualan_tahunan)) :?>
									<div class="accordion accordion-toggle-arrow" id="accordionExample1">

										<?php foreach ($penjualan_tahunan as $row_pengalaman) :?>
										<?php $counter_pengalaman+=1 ;?>
										<div class="card">
											<div class="card-header">
												<div class="card-title collapsed" data-toggle="collapse"
													data-target="#data-pengalaman-<?php echo $counter_pengalaman ;?>">
													<?php echo $row_pengalaman['id_sub_klasifikasi'].'-'.$row_pengalaman['nama_pengalaman'] ;?>
												</div>
											</div>
											<div id="data-pengalaman-<?php echo $counter_pengalaman ;?>"
												class="collapse show" data-parent="#accordionExample1">

												<div class="card-body">
													<!--#1-->
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

																</div>-->
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
																		class="icon-file-check"></i></b> Softcopy</a>
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
																		class="icon-file-check"></i></b> Softcopy</a>
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
															<a <?php if($row_pengalaman['file_kontrak_dengan_pemberi_tugas']!='') :?>href="<?= $row_pengalaman['file_kontrak_dengan_pemberi_tugas'] ;?>"
																<?php else :?>href="<?= base_url('not_found') ;?>"
																<?php endif ;?> target="_blank" type="button"
																name="btn_cek_36" style="float: left"
																class=" btn btn-dark btn-labeled btn-rounded"><b><i
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
												<div class="row">
													<div class="col-md-2">
														<div class="content-group-lg">
															<h6 class="text-semibold">#1</h6>
															<p class="content-group">File SK Kumham</p>
														</div>
													</div>

													<div class="col-md-1">
														<font class="text-semibold" style="font-size: 10px;">Tidak/Ada
														</font>
														<span class="switch switch-outline switch-icon switch-dark">

															<label>
																<input type="checkbox" <?php if(!empty($ceklis)):?>
																	<?php if($data_ceklis11=='1') :?>checked="checked"
																	<?php else :?><?php endif ;?> <?php else :?>
																	checked="checked" <?php endif ;?> id="checkbox_11"
																	value="1" onclick="javascript:checkbox11()"
																	name="checkbox_11" />
																<span></span>
															</label>
														</span>

													</div>
													<div class="col-md-1">
														<font class="text-semibold" style="font-size: 10px;">Tidak/Valid
														</font>
														<span class="switch switch-outline switch-icon switch-dark">

															<label>
																<input type="checkbox" <?php if(!empty($ceklis_2)):?>
																	<?php if($data_ceklis11_2=='1') :?>checked="checked"
																	<?php else :?><?php endif ;?> <?php else :?>
																	checked="checked" <?php endif ;?> id="checkbox_11_3"
																	name="checkbox_11_3" />
																<span></span>
															</label>
														</span>

													</div>
													<div class="col-md-1">
														<font class="text-semibold" style="font-size: 10px;">Tidak/Valid
														</font>
														<span class="switch switch-outline switch-icon switch-dark">

															<label>
																<input type="checkbox" <?php if(!empty($ceklis_2)):?>
																	<?php if($data_ceklis11_2=='1') :?>checked="checked"
																	<?php else :?><?php endif ;?> <?php else :?>
																	checked="checked" <?php endif ;?> id="checkbox_11_2"
																	value="1" onclick="javascript:checkbox11()"
																	name="checkbox_11_2" />
																<span></span>
															</label>
														</span>

													</div>

													<div class="col-md-7">
														<br>
														<div class="input-group file-caption-main">
															<span class="file-caption-icon"></span>
															<input type="text" id="comment_11" name="comment_11"
																class="form-control" <?php if(!empty($ceklis)):?>
																value="<?=$data_comment11;?>" <?php endif ;?>
																placeholder="Comment...">



														</div>
													</div>
												</div>
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
																 <span class="switch switch-outline switch-icon switch-dark">

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
																	<span class="switch switch-outline switch-icon switch-dark">

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
									<div class="row">
										<div class="col-md-2">
											<div class="content-group-lg">
												<h6 class="text-semibold"><span class="text-danger">#CATATAN
														PENILAIAN</span></h6>
												<p class="content-group"><span class="text-danger">SK Kumham</span></p>
											</div>
										</div>

										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Ada</font>
											<span class="switch switch-outline switch-icon switch-danger">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis)):?>
														<?php if($data_ceklis83=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_83" value="1" name="checkbox_83" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis83_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_83_3" value="1"
														name="checkbox_83_3" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis83_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_83_2" value="1"
														name="checkbox_83_2" />
													<span></span>
												</label>
											</span>

										</div>

										<div class="col-md-7">
											<br>
											<div class="input-group file-caption-main">
												<span class="file-caption-icon"></span>
												<textarea id="comment_83" name="comment_83"
													class="form-control form-control-solid"
													rows="5"><?php if(!empty($ceklis)){echo $data_comment83;}?></textarea>

											</div>
										</div>
									</div>
									<hr>
									<?php if(!empty($akte)) :?>
									<div class="accordion accordion-toggle-arrow" id="accordionExample1">
										<input type="hidden" value="<?php echo $tgl ;?>" class="switchery" name="tgl">

										<?php foreach ($akte as $row_akte) :?>
										<?php $counter_akte+=1 ;?>
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
																class=" btn btn-dark btn-labeled btn-rounded"><b><i
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
																		<a href="<?=$row_akte['file_ktp'] ;?>" target="_blank" type="button" name="btn_cek_36"  style="float: left" class=" btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
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
																			<a href="<?=$row_akte['file_npwp'] ;?>" target="_blank" type="button" name="btn_cek_36"  style="float: left" class=" btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
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
																<span class="switch switch-outline switch-icon switch-dark">

																	<label>
																		<input type="checkbox" <?php if(!empty($ceklis)):?> <?php if($data_ceklis13=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_13" value="1" onclick="javascript:checkbox13()" name="checkbox_13" />
																		<span></span>
																	</label>
																</span>

															</div>
															<div class="col-md-1">
																<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
																<span class="switch switch-outline switch-icon switch-dark">

																	<label>
																		<input type="checkbox" <?php if(!empty($ceklis_2)):?> <?php if($data_ceklis13_2=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_13_2" value="1" onclick="javascript:checkbox13()" name="checkbox_13_2" />
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
																<span class="switch switch-outline switch-icon switch-dark">

																	<label>
																		<input type="checkbox" <?php if(!empty($ceklis)):?> <?php if($data_ceklis14=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_14" value="1" onclick="javascript:checkbox14()" name="checkbox_14" />
																		<span></span>
																	</label>
																</span>

															</div>
															<div class="col-md-1">
																<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
																<span class="switch switch-outline switch-icon switch-dark">

																	<label>
																		<input type="checkbox"  <?php if(!empty($ceklis_2)):?> <?php if($data_ceklis14_2=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?>id="checkbox_14_2" value="1" onclick="javascript:checkbox14()" name="checkbox_14_2" />
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
																<span class="switch switch-outline switch-icon switch-dark">

																	<label>
																		<input type="checkbox" <?php if(!empty($ceklis)):?> <?php if($data_ceklis15=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_15" value="1" onclick="javascript:checkbox15()" name="checkbox_15" />
																		<span></span>
																	</label>
																</span>

															</div>
															<div class="col-md-1">
																<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
																<span class="switch switch-outline switch-icon switch-dark">

																	<label>
																		<input type="checkbox"  <?php if(!empty($ceklis_2)):?> <?php if($data_ceklis15_2=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?>id="checkbox_15_2" value="1" onclick="javascript:checkbox15()" name="checkbox_15_2" />
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
									<div class="row">
										<div class="col-md-2">
											<div class="content-group-lg">
												<h6 class="text-semibold"><span class="text-danger">#CATATAN
														PENILAIAN</span></h6>
												<p class="content-group"><span class="text-danger">Keuangan Pemegang
														Saham</span></p>
											</div>
										</div>

										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Ada</font>
											<span class="switch switch-outline switch-icon switch-danger">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis)):?>
														<?php if($data_ceklis86=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_86" value="1" name="checkbox_86" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis86_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_86_3" value="1"
														name="checkbox_86_3" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis86_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_86_2" value="1"
														name="checkbox_86_2" />
													<span></span>
												</label>
											</span>

										</div>

										<div class="col-md-7">
											<br>
											<div class="input-group file-caption-main">
												<span class="file-caption-icon"></span>
												<textarea id="comment_86" name="comment_86"
													class="form-control form-control-solid"
													rows="5"><?php if(!empty($ceklis)){echo $data_comment86;}?></textarea>

											</div>
										</div>
									</div>
									<hr>
									<?php if(!empty($pemegang_saham)) :?>
									<div class="accordion accordion-toggle-arrow" id="accordionExample1">
										<input type="hidden" value="<?php echo $tgl ;?>" class="switchery" name="tgl">

										<?php foreach ($pemegang_saham as $row_saham) :?>
										<?php $counter_saham+=1 ;?>
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
																			<a href="<?=$row_saham['persyaratan_ktp'] ;?>" target="_blank" type="button" name="btn_cek_36"  style="float: left" class=" btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																		</div>



																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#2</h6>
																			<p class="content-group">NPWP</p>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<br>
																		<a href="<?=$row_saham['persyaratan_npwp'] ;?>" target="_blank" type="button" name="btn_cek_36"  style="float: left" class=" btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
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
																			<a href="<?=$row_saham['persyaratan_doc'] ;?>" target="_blank" type="button" name="btn_cek_36"  style="float: left" class=" btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
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



												<!--#1-->
												<div class="row">
													<div class="col-md-2">
														<div class="content-group-lg">
															<h6 class="text-semibold">#1</h6>
															<p class="content-group">File Neraca</p>
														</div>
													</div>

													<div class="col-md-1">
														<font class="text-semibold" style="font-size: 10px;">Tidak/Ada
														</font>
														<span class="switch switch-outline switch-icon switch-dark">

															<label>
																<input type="checkbox" <?php if(!empty($ceklis)):?>
																	<?php if($data_ceklis16=='1') :?>checked="checked"
																	<?php else :?><?php endif ;?> <?php else :?>
																	checked="checked" <?php endif ;?> id="checkbox_16"
																	value="1" onclick="javascript:checkbox16()"
																	name="checkbox_16" />
																<span></span>
															</label>
														</span>

													</div>
													<div class="col-md-1">
														<font class="text-semibold" style="font-size: 10px;">Tidak/Valid
														</font>
														<span class="switch switch-outline switch-icon switch-dark">

															<label>
																<input type="checkbox" <?php if(!empty($ceklis_2)):?>
																	<?php if($data_ceklis16_2=='1') :?>checked="checked"
																	<?php else :?><?php endif ;?> <?php else :?>
																	checked="checked" <?php endif ;?> id="checkbox_16_3"
																	name="checkbox_16_3" />
																<span></span>
															</label>
														</span>

													</div>
													<div class="col-md-1">
														<font class="text-semibold" style="font-size: 10px;">Tidak/Valid
														</font>
														<span class="switch switch-outline switch-icon switch-dark">

															<label>
																<input type="checkbox" <?php if(!empty($ceklis_2)):?>
																	<?php if($data_ceklis16_2=='1') :?>checked="checked"
																	<?php else :?><?php endif ;?> <?php else :?>
																	checked="checked" <?php endif ;?> id="checkbox_16_2"
																	value="1" onclick="javascript:checkbox16()"
																	name="checkbox_16_2" />
																<span></span>
															</label>
														</span>

													</div>

													<div class="col-md-7">
														<br>
														<div class="input-group file-caption-main">
															<span class="file-caption-icon"></span>
															<input type="text" id="comment_16" name="comment_16"
																class="form-control" <?php if(!empty($ceklis)):?>
																value="<?=$data_comment16;?>" <?php endif ;?>
																placeholder="Comment...">


														</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-2">
														<div class="content-group-lg">
															<h6 class="text-semibold">#2</h6>
															<p class="content-group">Laporan Audit Akuntan Publik</p>
														</div>
													</div>

													<div class="col-md-1">
														<font class="text-semibold" style="font-size: 10px;">Tidak/Ada
														</font>
														<span class="switch switch-outline switch-icon switch-dark">

															<label>
																<input type="checkbox" <?php if(!empty($ceklis)):?>
																	<?php if($data_ceklis17=='1') :?>checked="checked"
																	<?php else :?><?php endif ;?> <?php else :?>
																	checked="checked" <?php endif ;?> id="checkbox_17"
																	value="1" onclick="javascript:checkbox17()"
																	name="checkbox_17" />
																<span></span>
															</label>
														</span>

													</div>
													<div class="col-md-1">
														<font class="text-semibold" style="font-size: 10px;">Tidak/Valid
														</font>
														<span class="switch switch-outline switch-icon switch-dark">

															<label>
																<input type="checkbox" <?php if(!empty($ceklis_2)):?>
																	<?php if($data_ceklis17_2=='1') :?>checked="checked"
																	<?php else :?><?php endif ;?> <?php else :?>
																	checked="checked" <?php endif ;?> id="checkbox_17_3"
																	name="checkbox_17_3" />
																<span></span>
															</label>
														</span>

													</div>
													<div class="col-md-1">
														<font class="text-semibold" style="font-size: 10px;">Tidak/Valid
														</font>
														<span class="switch switch-outline switch-icon switch-dark">

															<label>
																<input type="checkbox" <?php if(!empty($ceklis_2)):?>
																	<?php if($data_ceklis17_2=='1') :?>checked="checked"
																	<?php else :?><?php endif ;?> <?php else :?>
																	checked="checked" <?php endif ;?> id="checkbox_17_2"
																	value="1" onclick="javascript:checkbox17()"
																	name="checkbox_17_2" />
																<span></span>
															</label>
														</span>

													</div>

													<div class="col-md-7">
														<br>
														<div class="input-group file-caption-main">
															<span class="file-caption-icon"></span>
															<input type="text" id="comment_17" name="comment_17"
																class="form-control" <?php if(!empty($ceklis)):?>
																value="<?=$data_comment17;?>" <?php endif ;?>
																placeholder="Comment...">


														</div>
													</div>
												</div>

											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-md-3">
											<div class="content-group-lg">
												<h6 class="text-semibold"><span class="text-danger">#CATATAN
														PENILAIAN</span></h6>
												<p class="content-group"><span class="text-danger">Keuangan
														Neraca</span></p>
											</div>
										</div>

										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Ada</font>
											<span class="switch switch-outline switch-icon switch-danger">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis)):?>
														<?php if($data_ceklis87=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_87" value="1" name="checkbox_87" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis87_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_87_2" value="1"
														name="checkbox_87_2" />
													<span></span>
												</label>
											</span>

										</div>

										<div class="col-md-7">
											<br>
											<div class="input-group file-caption-main">
												<span class="file-caption-icon"></span>
												<textarea id="comment_87" name="comment_87"
													class="form-control form-control-solid"
													rows="5"><?php if(!empty($ceklis)){echo $data_comment87;}?></textarea>

											</div>
										</div>
									</div>
									<hr>


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
																class=" btn btn-dark btn-labeled btn-rounded"><b><i
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
																class=" btn btn-dark btn-labeled btn-rounded"><b><i
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
																	<span class="switch switch-outline switch-icon switch-dark">

																		<label>
																			<input type="checkbox" <?php if(!empty($ceklis)):?> <?php if($data_ceklis18=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_18" value="1" onclick="javascript:checkbox18()" name="checkbox_18" />
																			<span></span>
																		</label>
																	</span>

																</div>
																<div class="col-md-1">
																	<font class="text-semibold" style="font-size: 10px;">Tidak/Ada</font>
																	<span class="switch switch-outline switch-icon switch-dark">

																		<label>
																			<input type="checkbox" <?php if(!empty($ceklis)):?> <?php if($data_ceklis18=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_18" value="1" onclick="javascript:checkbox18()" name="checkbox_18" />
																			<span></span>
																		</label>
																	</span>

																</div>
																<div class="col-md-2">
																	<br>
																	<a href="<?=$pjbu[0]['file_ktp'] ;?>" target="_blank" type="button" name="btn_cek_13"  style="float: right" class="open-delete btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
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
																	<span class="switch switch-outline switch-icon switch-dark">

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
																	<a href="<?=$pjbu[0]['file_npwp'] ;?>" target="_blank" type="button" name="btn_cek_13"  style="float: right" class="open-delete btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
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
													<div class="col-md-2">
														<div class="content-group-lg">
															<h6 class="text-semibold">#1</h6>
															<p class="content-group">Foto</p>
														</div>
													</div>

													<div class="col-md-1">
														<font class="text-semibold" style="font-size: 10px;">Tidak/Ada
														</font>
														<span class="switch switch-outline switch-icon switch-dark">

															<label>
																<input type="checkbox" <?php if(!empty($ceklis)):?>
																	<?php if($data_ceklis20=='1') :?>checked="checked"
																	<?php else :?><?php endif ;?> <?php else :?>
																	checked="checked" <?php endif ;?> id="checkbox_20"
																	value="1" onclick="javascript:checkbox20()"
																	name="checkbox_20" />
																<span></span>
															</label>
														</span>

													</div>
													<div class="col-md-1">
														<font class="text-semibold" style="font-size: 10px;">Tidak/Valid
														</font>
														<span class="switch switch-outline switch-icon switch-dark">

															<label>
																<input type="checkbox" <?php if(!empty($ceklis_2)):?>
																	<?php if($data_ceklis20_2=='1') :?>checked="checked"
																	<?php else :?><?php endif ;?> <?php else :?>
																	checked="checked" <?php endif ;?>id="checkbox_20_3"
																	name="checkbox_20_3" />
																<span></span>
															</label>
														</span>

													</div>
													<div class="col-md-1">
														<font class="text-semibold" style="font-size: 10px;">Tidak/Valid
														</font>
														<span class="switch switch-outline switch-icon switch-dark">

															<label>
																<input type="checkbox" <?php if(!empty($ceklis_2)):?>
																	<?php if($data_ceklis20_2=='1') :?>checked="checked"
																	<?php else :?><?php endif ;?> <?php else :?>
																	checked="checked" <?php endif ;?>id="checkbox_20_2"
																	value="1" onclick="javascript:checkbox20()"
																	name="checkbox_20_2" />
																<span></span>
															</label>
														</span>

													</div>
													<div class="col-md-2">
														<br>
														<a href="<?=$pjbu[0]['foto'] ;?>" target="_blank" type="button"
															name="btn_cek_13" style="float: right"
															class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																	class="icon-file-check"></i></b> Softcopy</a>
													</div>
													<div class="col-md-5">
														<br>
														<div class="input-group file-caption-main">
															<span class="file-caption-icon"></span>
															<input type="text" id="comment_20" name="comment_20"
																class="form-control" placeholder="Comment...">


														</div>
													</div>
												</div>




											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-md-3">
											<div class="content-group-lg">
												<h6 class="text-semibold"><span class="text-danger">#CEKLIS</span></h6>
												<p class="content-group"><span class="text-danger">PJBU</span></p>
											</div>
										</div>

										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Ada</font>
											<span class="switch switch-outline switch-icon switch-danger">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis)):?>
														<?php if($data_ceklis85=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_85" value="1" name="checkbox_85" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis85_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_85_2" value="1"
														name="checkbox_85_2" />
													<span></span>
												</label>
											</span>

										</div>

										<div class="col-md-7">
											<br>
											<div class="input-group file-caption-main">
												<span class="file-caption-icon"></span>
												<textarea id="comment_85" name="comment_85"
													class="form-control form-control-solid"
													rows="5"><?php if(!empty($ceklis)){echo $data_comment85;}?> </textarea>

											</div>
										</div>
									</div>
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
														<td><span class="text-dark"><?php echo $pjbu[0]['hp'] ;?></span>
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
									<div class="row">
										<div class="col-md-2">
											<div class="content-group-lg">
												<h6 class="text-semibold"><span class="text-danger">#CEKLIS</span></h6>
												<p class="content-group"><span class="text-danger">PJTBU</span></p>
											</div>
										</div>

										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Ada</font>
											<span class="switch switch-outline switch-icon switch-danger">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis)):?>
														<?php if($data_ceklis88=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_88" value="1" name="checkbox_88" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis88_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_88_3" value="1"
														name="checkbox_88_3" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis88_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_88_2" value="1"
														name="checkbox_88_2" />
													<span></span>
												</label>
											</span>

										</div>

										<div class="col-md-7">
											<br>
											<div class="input-group file-caption-main">
												<span class="file-caption-icon"></span>
												<textarea id="comment_88" name="comment_88"
													class="form-control form-control-solid"
													rows="5"><?php if(!empty($ceklis)){echo $data_comment88;}?> </textarea>

											</div>
										</div>
									</div>
									<hr>
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
																	<td>Sub Klasifikasi SKK</td>
																	<td><span
																			class="text-dark"><?php echo $row_pjtbu['sub_klasifikasi'] ;?></span>
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
									<div class="row">
										<div class="col-md-2">
											<div class="content-group-lg">
												<h6 class="text-semibold"><span class="text-danger">#CEKLIS</span></h6>
												<p class="content-group"><span class="text-danger">PJSKBU</span></p>
											</div>
										</div>

										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Ada</font>
											<span class="switch switch-outline switch-icon switch-danger">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis)):?>
														<?php if($data_ceklis77=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_77" value="1" name="checkbox_77" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis77_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_77_3" value="1"
														name="checkbox_77_3" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis77_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_77_2" value="1"
														name="checkbox_77_2" />
													<span></span>
												</label>
											</span>

										</div>

										<div class="col-md-6">
											<br>
											<div class="input-group file-caption-main">
												<span class="file-caption-icon"></span>
												<textarea id="comment_77" name="comment_77"
													class="form-control form-control-solid"
													rows="5"><?php if(!empty($ceklis)){echo $data_comment77;}?> </textarea>



											</div>
										</div>
									</div>
									<hr>
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
																<?php endif ;?> target="_blank" type="button"
																name="btn_cek_11" style="float: right"
																class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																		class="icon-file-check"></i></b> Softcopy</a>
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
																<?php endif ;?> target="_blank" type="button"
																name="btn_cek_11" style="float: right"
																class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																		class="icon-file-check"></i></b> Softcopy</a>
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
																<?php endif ;?> target="_blank" type="button"
																name="btn_cek_11" style="float: right"
																class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
																		class="icon-file-check"></i></b> Softcopy</a>
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
																			class="text-dark"><?php echo $row_pjskbu['id_sub_klasifikasi_pjsk'] ?></span>
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
									<?php endif ;?>
								</div>


								<div class="tab-pane fade" id="peralatan" role="tabpanel"
									aria-labelledby="profile-tab-1">

									<legend>Peralatan</legend>



									<div class="row">
										<div class="col-md-2">
											<div class="content-group-lg">
												<h6 class="text-semibold">#1</h6>
												<p class="content-group">Kepemilikan Peralatan</p>
											</div>
										</div>

										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Ada</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis)):?>
														<?php if($data_ceklis21=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_21" value="1"
														onclick="javascript:checkbox21()" name="checkbox_21" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis21_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?>id="checkbox_21_3" value="1" name="checkbox_21_3" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis21_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?>id="checkbox_21_2" value="1"
														onclick="javascript:checkbox21()" name="checkbox_21_2" />
													<span></span>
												</label>
											</span>

										</div>

										<div class="col-md-7">
											<br>
											<div class="input-group file-caption-main">
												<span class="file-caption-icon"></span>
												<input type="text" id="comment_21" name="comment_21"
													class="form-control" placeholder="Comment...">



											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-2">
											<div class="content-group-lg">
												<h6 class="text-semibold">#2</h6>
												<p class="content-group">Foto Plat Nama</p>
											</div>
										</div>

										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Ada</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis)):?>
														<?php if($data_ceklis27=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_27" value="1"
														onclick="javascript:checkbox27()" name="checkbox_27" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis27_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?>id="checkbox_27_3" value="1"name="checkbox_27_3" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis27_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?>id="checkbox_27_2" value="1"
														onclick="javascript:checkbox27()" name="checkbox_27_2" />
													<span></span>
												</label>
											</span>

										</div>

										<div class="col-md-7">
											<br>
											<div class="input-group file-caption-main">
												<span class="file-caption-icon"></span>
												<input type="text" id="comment_27" name="comment_27"
													<?php if(!empty($ceklis)):?> value="<?=$data_comment27;?>"
													<?php endif ;?> class="form-control" placeholder="Comment...">



											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-2">
											<div class="content-group-lg">
												<h6 class="text-semibold">#3</h6>
												<p class="content-group">Foto Nampak Depan</p>
											</div>
										</div>

										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Ada</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis)):?>
														<?php if($data_ceklis28=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_28" value="1"
														onclick="javascript:checkbox28()" name="checkbox_28" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis28_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?>id="checkbox_28_3" value="1" name="checkbox_28_3" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis28_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?>id="checkbox_28_2" value="1"
														onclick="javascript:checkbox28()" name="checkbox_28_2" />
													<span></span>
												</label>
											</span>

										</div>

										<div class="col-md-7">
											<br>
											<div class="input-group file-caption-main">
												<span class="file-caption-icon"></span>
												<input type="text" id="comment_28" name="comment_28"
													<?php if(!empty($ceklis)):?> value="<?=$data_comment28;?>"
													<?php endif ;?> class="form-control" placeholder="Comment...">



											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-2">
											<div class="content-group-lg">
												<h6 class="text-semibold">#4</h6>
												<p class="content-group">Foto Nampak Samping</p>
											</div>
										</div>

										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Ada</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis)):?>
														<?php if($data_ceklis29=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_29" value="1"
														onclick="javascript:checkbox29()" name="checkbox_29" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis29_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?>id="checkbox_29_3" value="1" name="checkbox_29_3" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis29_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?>id="checkbox_29_2" value="1"
														onclick="javascript:checkbox29()" name="checkbox_29_2" />
													<span></span>
												</label>
											</span>

										</div>

										<div class="col-md-7">
											<br>
											<div class="input-group file-caption-main">
												<span class="file-caption-icon"></span>
												<input type="text" id="comment_29" name="comment_29"
													<?php if(!empty($ceklis)):?> value="<?=$data_comment29;?>"
													<?php endif ;?> class="form-control" placeholder="Comment...">



											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-2">
											<div class="content-group-lg">
												<h6 class="text-semibold">#5</h6>
												<p class="content-group">Hasil Pemeriksaan Pengujian</p>
											</div>
										</div>

										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Ada</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis)):?>
														<?php if($data_ceklis36=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_36" value="1"
														onclick="javascript:checkbox36()" name="checkbox_36" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis36_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?>id="checkbox_36_3" value="1" name="checkbox_36_3" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis36_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?>id="checkbox_36_2" value="1"
														onclick="javascript:checkbox36()" name="checkbox_36_2" />
													<span></span>
												</label>
											</span>

										</div>

										<div class="col-md-7">
											<br>
											<div class="input-group file-caption-main">
												<span class="file-caption-icon"></span>
												<input type="text" id="comment_36" name="comment_36"
													<?php if(!empty($ceklis)):?> value="<?=$data_comment36;?>"
													<?php endif ;?> class="form-control" placeholder="Comment...">



											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-md-2">
											<div class="content-group-lg">
												<h6 class="text-semibold"><span class="text-danger">#CEKLIS</span></h6>
												<p class="content-group"><span class="text-danger">Peralatan</span></p>
											</div>
										</div>

										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Ada</font>
											<span class="switch switch-outline switch-icon switch-danger">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis)):?>
														<?php if($data_ceklis89=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_89" value="1" name="checkbox_89" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis89_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_89_3" value="1"
														name="checkbox_89_3" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis89_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_89_2" value="1"
														name="checkbox_89_2" />
													<span></span>
												</label>
											</span>

										</div>

										<div class="col-md-7">
											<br>
											<div class="input-group file-caption-main">
												<span class="file-caption-icon"></span>
												<textarea id="comment_89" name="comment_89"
													class="form-control form-control-solid"
													rows="5"><?php if(!empty($ceklis)){echo $data_comment89;}?> </textarea>



											</div>
										</div>
									</div>
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
																class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
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
																class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
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
																class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
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
																class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i
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


								<div class="tab-pane fade" id="kepemilikan_peralatan" role="tabpanel"
									aria-labelledby="profile-tab-1">





									<div class="row">
										<div class="col-md-2">
											<div class="content-group-lg">
												<h6 class="text-semibold">#1</h6>
												<p class="content-group">Surat Pernyataan Kepemilikan Peralatan</p>
											</div>
										</div>

										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Ada</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis)):?>
														<?php if($data_ceklis37=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_37" value="1"
														onclick="javascript:checkbox37()" name="checkbox_37" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis37_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?>id="checkbox_37_3" value="1" name="checkbox_37_3" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis37_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?>id="checkbox_37_2" value="1"
														onclick="javascript:checkbox37()" name="checkbox_37_2" />
													<span></span>
												</label>
											</span>

										</div>

										<div class="col-md-7">
											<br>
											<div class="input-group file-caption-main">
												<span class="file-caption-icon"></span>
												<input type="text" id="comment_37" name="comment_37"
													<?php if(!empty($ceklis)):?> value="<?=$data_comment37;?>"
													<?php endif ;?> class="form-control" placeholder="Comment...">



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
												<h5 class="panel-title">Validasi Klasifikasi & Kualifikasi</h5>
												<div class="heading-elements">

												</div>
											</div>
											<div class="panel-body">



											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-md-2">
											<div class="content-group-lg">
												<h6 class="text-semibold"><span class="text-danger">#CATATAN
														PENILAIAN</span></h6>
												<p class="content-group"><span class="text-danger">Klasifikasi
														Kualifikasi</span></p>
											</div>
										</div>

										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Ada</font>
											<span class="switch switch-outline switch-icon switch-danger">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis)):?>
														<?php if($data_ceklis90=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_90" value="1" name="checkbox_90" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis90_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_90_3" value="1"
														name="checkbox_90_3" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis_2)):?>
														<?php if($data_ceklis90_2=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_90_2" value="1"
														name="checkbox_90_2" />
													<span></span>
												</label>
											</span>

										</div>

										<div class="col-md-7">
											<br>
											<div class="input-group file-caption-main">
												<span class="file-caption-icon"></span>
												<textarea id="comment_90" name="comment_90"
													class="form-control form-control-solid"
													rows="5"><?php if(!empty($ceklis)){echo $data_comment90;}?></textarea>

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
																			class="text-dark"><?php echo $row_klasifikasi['nama_jenis_usaha'] ;?></span>
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
								<div class="tab-pane fade" id="penilaian" role="tabpanel" aria-labelledby="home-tab-1">
									<div class="row">
										<div class="col-md-3">
											<div class="content-group-lg">
												<h6 class="text-semibold">#RESUMA PENILAIAN DAN REKOMENDASI</h6>
												<p class="content-group">Data Administrasi</p>
											</div>
										</div>

										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis)):?>
														<?php if($data_ceklis91=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_91" value="1" name="checkbox_91" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-3">
											<div class="content-group-lg">
												<h6 class="text-semibold"></h6>
												<p class="content-group">Data SMM</p>
											</div>
										</div>

										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis)):?>
														<?php if($data_ceklis96=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_96" value="1" name="checkbox_96" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-3">
											<div class="content-group-lg">
												<h6 class="text-semibold"></h6>
												<p class="content-group">Data SMAP</p>
											</div>
										</div>

										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis)):?>
														<?php if($data_ceklis97=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_97" value="1" name="checkbox_97" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-3">
											<div class="content-group-lg">
												<h6 class="text-semibold"></h6>
												<p class="content-group">Data Pengurus dan Tenaga Kerja</p>
											</div>
										</div>

										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis)):?>
														<?php if($data_ceklis92=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_92" value="1" name="checkbox_92" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-3">
											<div class="content-group-lg">
												<h6 class="text-semibold"></h6>
												<p class="content-group">Data Keuangan</p>
											</div>
										</div>

										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis)):?>
														<?php if($data_ceklis93=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_93" value="1" name="checkbox_93" />
													<span></span>
												</label>
											</span>

										</div>


									</div>
									<div class="row">
										<div class="col-md-3">
											<div class="content-group-lg">
												<h6 class="text-semibold"></h6>
												<p class="content-group">Data Pekerjaan (Penjualan)</p>
											</div>
										</div>

										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis)):?>
														<?php if($data_ceklis94=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_94" value="1" name="checkbox_94" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-3">
											<div class="content-group-lg">
												<h6 class="text-semibold"></h6>
												<p class="content-group">Data Peralatan Utama Badan Usaha</p>
											</div>
										</div>

										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
											<span class="switch switch-outline switch-icon switch-dark">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis)):?>
														<?php if($data_ceklis95=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_95" value="1" name="checkbox_95" />
													<span></span>
												</label>
											</span>

										</div>
										<div class="col-md-3">
											<div class="content-group-lg">
												<h6 class="text-semibold"><span class="text-danger">#REKOMENDASI
														ASESOR</span></h6>
												<p class="content-group"><span class="text-danger">Hasil Akhir
														Rekomendasi Permohonan</span></p>
											</div>
										</div>

										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 10px;">Tidak/Lolos</font>
											<span class="switch switch-outline switch-icon switch-danger">

												<label>
													<input type="checkbox" <?php if(!empty($ceklis)):?>
														<?php if($data_ceklis99=='1') :?>checked="checked"
														<?php else :?><?php endif ;?> <?php else :?> checked="checked"
														<?php endif ;?> id="checkbox_99" value="1" name="checkbox_99" />
													<span></span>
												</label>
											</span>

										</div>




									</div>
									<hr>
									<div class="row">


										<div class="input-group file-caption-main">
											<span class="file-caption-icon"></span>
											<textarea id="comment_res" name="comment_res"
												class="form-control form-control-solid" rows="5"
												placeholder="Catatan resuma..."><?php if(!empty($ceklis)){echo $data_comment91;}?></textarea>

										</div>

									</div>
									<hr>
									<?php
											$count=0;
											if(!empty($penilaian)){
												foreach($penilaian as $row_penilaian){
												$count+=1;
												for ($i=0; $i < count($penilaian); $i++) {
													if($row_penilaian['id_sub_klasifikasi']==$penilaian[$i]['id_sub_klasifikasi']){
														${"data_ceklis".$row_penilaian['id_sub_klasifikasi']}=$row_penilaian['hasil_akhir'];
														${"data_comment".$row_penilaian['id_sub_klasifikasi']}=$row_penilaian['comment'];
													}
												}
											}
											}
											;?>
									<div class="table-responsive">


										<table class="table table-lg">
											<thead>
												<tr>
													<th>Klasifikasi</th>
													<th>Sub Klasifikasi</th>
													<th>Kualifikasi</th>
													<th>Kemampuan Dasar</th>
													<th>Hasil Akhir</th>
													<th><span class="text-danger">Slide ke kiri utk tidak lolos dan
															slide ke kanan untuk lolos</span></th>

												</tr>
											</thead>
											<tbody>
												<?php foreach($klasifikasi as $row_klas) :?>

												<tr>
													<td><?=$row_klas['id_klasifikasi'];?></td>
													<td><?=$row_klas['id_sub_klasifikasi'];?></td>
													<td><?=$row_klas['kualifikasi'];?></td>
													<td>-</td>
													<td>
														<font class="text-semibold" style="font-size: 10px;">Tidak/Lolos
														</font>
														<span class="switch switch-outline switch-icon switch-danger">

															<label>
																<input type="checkbox" value="1"
																	<?php if(!empty($penilaian)):?>
																	<?php if(${"data_ceklis".$row_klas['id_sub_klasifikasi']}=='1') :?>checked="checked"
																	<?php else :?><?php endif ;?> <?php else :?>
																	checked="checked" <?php endif ;?>
																	name="checkbox_lolos<?=$row_klas['id_sub_klasifikasi'];?>" />
																<span></span>
															</label>
														</span>
													</td>
													<td>
														<div class="input-group file-caption-main">
															<span class="file-caption-icon"></span>
															<input type="text"
																name="comment_lolos<?=$row_klas['id_sub_klasifikasi'];?>"
																<?php if(!empty($penilaian)):?>
																value="<?=${"data_comment".$row_klas['id_sub_klasifikasi']};?>"
																<?php endif ;?> class="form-control"
																placeholder="Catatan">



														</div>
													</td>


												</tr>
												<?php endforeach ;?>





											</tbody>
										</table>
									</div>
								</div>


							</div>
						</div>


					</div>

					<button target="_blank" type="submit" name="submit" style="float: right"
						class="open-delete btn btn-dark btn-labeled btn-rounded"><b><i class="icon-paperplane"></i></b>
						Submit</button>

					<?php echo form_close() ;?>
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
										<td class="nik"><span class="text-dark"></span></td>
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

<ul class="sticky-toolbar nav flex-column pl-2 pr-2 pt-3 pb-3 mt-4">
	<!--begin::Item-->

	<!--end::Item-->
	<!--begin::Item-->
	<li class="nav-item mb-2" data-toggle="tooltip" title="Cetak Penilaian ABU Lain" data-placement="left">
		<a class="btn btn-sm btn-icon btn-bg-light btn-icon-dark btn-hover-dark"
			href="<?= base_url('sertifikasi/cetak_penilaian_asesor/'.$nib_dec.'/'.$tgl_dec.'/'.encrypt_url($asesor_2)) ;?>"
			target="_blank">
			<i class="flaticon-file"></i>
		</a>
	</li>
	<li class="nav-item mb-2" data-toggle="tooltip" title="Cetak SMM ABU Lain" data-placement="left">
		<a class="btn btn-sm btn-icon btn-bg-light btn-icon-dark btn-hover-dark"
			href="<?= base_url('sertifikasi/cetak_smm/'.$nib_dec.'/'.$tgl_dec.'/'.encrypt_url($asesor_2)) ;?>"
			target="_blank">
			<i class="flaticon2-crisp-icons"></i>
		</a>
	</li>
	<li class="nav-item mb-2" data-toggle="tooltip" title="Cetak SMAP ABU Lain" data-placement="left">
		<a class="btn btn-sm btn-icon btn-bg-light btn-icon-dark btn-hover-dark"
			href="<?= base_url('sertifikasi/cetak_smap/'.$nib_dec.'/'.$tgl_dec.'/'.encrypt_url($asesor_2)) ;?>"
			target="_blank">
			<i class="flaticon2-crisp-icons"></i>
		</a>
	</li>
	<!--end::Item-->
	<!--begin::Item-->
	<li class="nav-item mb-2" data-toggle="tooltip" title="Cetak Keuangan ABU Lain" data-placement="left">
		<a class="btn btn-sm btn-icon btn-bg-light btn-icon-dark btn-hover-dark"
			href="<?= base_url('sertifikasi/cetak_keuangan/'.$nib_dec.'/'.$tgl_dec.'/'.encrypt_url($asesor_2)) ;?>"
			target="_blank">
			<i class="flaticon2-chart"></i>
		</a>
	</li>
	<!--end::Item-->
	<!--begin::Item-->
	<li class="nav-item" id="kt_sticky_toolbar_chat_toggler" data-toggle="tooltip"
		title="Cetak Penjualan Tahunan ABU Lain" data-placement="left">
		<a class="btn btn-sm btn-icon btn-bg-light btn-icon-dark btn-hover-dark"
			href="<?= base_url('sertifikasi/cetak_penjualan_tahunan_asesor/'.$nib_dec.'/'.$tgl_dec.'/'.encrypt_url($asesor_2)) ;?>"
			target="_blank">
			<i class="flaticon2-cup"></i>
		</a>
	</li>
	<li class="nav-item" id="kt_sticky_toolbar_chat_toggler" data-toggle="tooltip" title="Cetak Peralatan ABU Lain"
		data-placement="left">
		<a class="btn btn-sm btn-icon btn-bg-light btn-icon-dark btn-hover-dark"
			href="<?= base_url('sertifikasi/cetak_peralatan_asesor/'.$nib_dec.'/'.$tgl_dec.'/'.encrypt_url($asesor_2)) ;?>"
			target="_blank">
			<i class="flaticon2-lorry"></i>
		</a>
	</li>
	<li class="nav-item" id="kt_sticky_toolbar_chat_toggler" data-toggle="tooltip" title="Cetak SDM ABU Lain"
		data-placement="left">
		<a class="btn btn-sm btn-icon btn-bg-light btn-icon-dark btn-hover-dark"
			href="<?= base_url('sertifikasi/cetak_tk_asesor/'.$nib_dec.'/'.$tgl_dec.'/'.encrypt_url($asesor_2)) ;?>">
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