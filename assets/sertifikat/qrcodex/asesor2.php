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
	echo script_tag('assets/js/mask.js');
	echo script_tag('assets/bootstrap-datepicker.min.js');
?>

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
  <!--begin::Subheader-->
	<div class="subheader py-2 py-lg-12 subheader-transparent" id="kt_subheader">
		<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
			<!--begin::Info-->
			<div class="d-flex align-items-center flex-wrap mr-1">
				<!--begin::Mobile Toggle-->
				<button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none" id="kt_subheader_mobile_toggle">
					<span></span>
				</button>
				<!--end::Mobile Toggle-->
				<!--begin::Heading-->
				<div class="d-flex flex-column">
					<!--begin::Title-->
					<h2 class="text-white font-weight-bold my-2 mr-5">Asesor</h2>
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
						<a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Penilaian</a>
						<!--end::Item-->
						<!--begin::Item-->
						<span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
						<a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Permohonan</a>
						<!--end::Item-->
					</div>
					<!--end::Breadcrumb-->
				</div>
				<!--end::Heading-->
			</div>
			<!--end::Info-->

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
									<h3 class="card-label"></h3>


								</div>
								<div class="card-toolbar">

								</div>
							</div>
							<div class="card-header">

							<div class="card-toolbar">
								<a  href="<?= base_url('sertifikasi/cetak_penilaian_asesor_baru/'.$nib_dec.'/'.$tgl_dec.'/'.$user_dec) ;?>" target="_blank" class="btn btn-dark font-weight-bolder">
								<i class="flaticon-file"></i>Penilaian Asesor</a>

								<a  href="<?= base_url('sertifikasi/berita_acara_asesor/'.$nib_dec.'/'.$tgl_dec.'/'.$user_dec) ;?>" target="_blank" style="margin:5px;" class="btn btn-dark font-weight-bolder">
								<i class="flaticon2-crisp-icons"></i>BA Asesor</a>

								<?php if($cek[0]['comment_asesor']!='') :?>
								<a onclick="javascript:myFunction()" class="btn btn-info font-weight-bolder">
								<i class="flaticon-mail"></i>Pesan Evaluator</a>
								<?php endif ;?>



							</div>
							</div>
					<?php endif ;?>

					</div>
				</div>

				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<br>
							<div class="card card-custom bgi-no-repeat gutter-b" style="height: 100px; background-color: #663259; background-position: calc(100% + 0.5rem) 100%; background-size: 75% auto; background-image: url(<?=base_url();?>assets/media/svg/patterns/taieri.svg)">
								<!--begin::Body-->
								<div class="card-body d-flex align-items-center">
									<div>

										<h3 class="text-white font-weight-bolder line-height-lg mb-5">Checking PJT, PJSK, & PJBU</h3>
										<a href='#' data-toggle="modal" data-target="#exampleModal" id="tombol_cek" class="btn btn-success font-weight-bold px-6 py-3">Check</a>
									</div>
								</div>
								<!--end::Body-->
							</div>

						</div>
						<div class="col-md-6">

						</div>
					</div>
					<br>
					<div class="example mb-10">
						<input type="hidden" id="base_url" value="<?php echo base_url('sertifikasi/permintaan_revisi') ;?>" >

						<div class="example-preview">
							<ul class="nav nav-pills" id="myTab1" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="profile-tab-1" data-toggle="tab" href="#klasifikasi_kualifikasi" aria-controls="profile">
										<span class="nav-icon active">
											<i class="flaticon2-open-text-book"></i>
										</span>
										<span class="nav-text">Klasifikasi</span>
									</a>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
										<span class="nav-icon">
											<i class="flaticon-home"></i>
										</span>
										<span class="nav-text">Administrasi</span>
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item " data-toggle="tab" href="#administrasi">Administrasi</a>
										<a class="dropdown-item" data-toggle="tab" href="#pengurus">Pengurus</a>
										<a class="dropdown-item" data-toggle="tab" href="#akte">Akte</a>

									</div>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="contact-tab-1" data-toggle="tab" href="#pengalaman" aria-controls="contact">
										<span class="nav-icon danger">
											<i class="flaticon2-gear text-danger"></i>
										</span>
										<span class="nav-text">Penjualan Tahunan</span>
									</a>
								</li>

								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
										<span class="nav-icon">
											<i class="flaticon2-list text-danger"></i>
										</span>
										<span class="nav-text">Kemampuan Keuangan</span>
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" data-toggle="tab" href="#pemegang_saham">Pemegang Saham</a>
										<a class="dropdown-item" data-toggle="tab" href="#neraca">Data Keuangan</a>

									</div>
								</li>

								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
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


								<li class="nav-item">
									<a class="nav-link" id="contact-tab-1" data-toggle="tab" href="#smap" aria-controls="contact">
										<span class="nav-icon">
											<i class="flaticon2-file text-danger"></i>
										</span>
										<span class="nav-text">SMAP</span>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="contact-tab-1" data-toggle="tab" href="#klasifikasi_cetak" aria-controls="contact">
										<span class="nav-icon">
											<i class="flaticon2-file text-danger"></i>
										</span>
										<span class="nav-text">Klasifikasi Cetak</span>
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

								<?php echo form_open_multipart(base_url('sertifikasi/insert_asesor_baru'), 'method="POST"');?>

								<div class="tab-content mt-5" id="myTabContent1">
									<div class="tab-pane fade" id="administrasi" role="tabpanel" aria-labelledby="home-tab-1">
										<?php if(!empty($biodata)) :?>
											<div class="col-md-12">
												<div class="panel panel-flat panel-collapsed">
													<div class="panel-heading">
														<h5 class="panel-title">Verifikasi & Validasi Personalia </h5>
														<div class="heading-elements">

																		</div>
													</div>
													<?php foreach ($biodata as $row_biodata)  :?>
														<?php if($row_biodata['sub_klasifikasi']==$sub_klasifikasi) :?>
														<div class="panel-body" >

															<!--3-->
															<div class="row">
																<div class="col-md-3">
																	<div class="content-group-lg">
																		<h6 class="text-semibold">#1</h6>
																		<p class="content-group">Surat Pernyataan Tanggung Jawab Mutlak</p>
																	</div>
																</div>


																<div class="col-md-2">
																	<br>
																	<a <?php if($row_biodata['sptjm']!='') :?>href="<?= $row_biodata['sptjm'] ;?>"<?php else :?>href="<?= base_url('not_found') ;?>"<?php endif ;?> target="_blank" type="button" name="btn_cek_11"  style="float: right" class="open-delete btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
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
															<td><span class="text-dark"><?php echo $row_biodata['nama'] ;?></span></td>

														</tr>
														<tr>
															<td>NIB</td>
															<td><span class="text-dark"><?php echo $row_biodata['NIB'] ;?></span></td>

														</tr>
														<tr>
															<td>NPWP</td>
															<td><span class="text-dark"><?php echo $row_biodata['npwp'] ;?></span></td>

														</tr>
														<tr>
															<td>Bentuk Usaha</td>
															<td><span class="text-dark"><?php echo $row_biodata['bentuk_usaha'] ;?></span></td>

														</tr>

														<tr>
															<td>Klasifikasi Jenis Usaha</td>
															<td><span class="text-dark"><?php echo $row_biodata['klasifikasi_jenis_usaha'] ;?></span></td>
														</tr>
														<tr>
															<td>Alamat Domisili Hukum</td>
															<td><span class="text-dark"><?php echo $row_biodata['alamat_bu'] ;?></span></td>
														</tr>



														<tr>
															<tr>
																<td>Propinsi</td>
																<td><span class="text-dark"><?php echo $row_biodata['id_propinsi'] ;?></span></td>
															</tr>
															<tr>
															<td>Kabupaten/Kota</td>
															<td><span class="text-dark"><?php echo $row_biodata['id_kabupaten'] ;?></span></td>
														</tr>
														<tr>
															<td>Telepon</td>
															<td><span class="text-dark"><?php echo $row_biodata['telepon'] ;?></span></td>
														</tr>
														<tr>
															<td>Hp</td>
															<td><span class="text-dark"><?php echo $row_biodata['hp'] ;?></span></td>
														</tr>

														<tr>
															<td>Kodepos</td>
															<td><span class="text-dark"><?php echo $row_biodata['kodepos'] ;?></span></td>
														</tr>
														<tr>
															<td>Email</td>
															<td><span class="text-dark"><?php echo $row_biodata['email'] ;?></span></td>
														</tr>
														<input type="hidden" name="email" value="<?=$klasifikasi[0]['user_email'] ;?>" >


														<tr>
															<td>Website</td>
															<td><span class="text-dark"><?php echo $row_biodata['web'] ;?></span></td>
														</tr>



													</tbody>
												</table>
											</div>
										</div>
									<?php endif ;?>
								<?php endforeach ;?>
										<?php endif ;?>
									</div>

									<div class="tab-pane fade show" id="smm" role="tabpanel" aria-labelledby="home-tab-1">
										<?php if(!empty($smm)) :?>
											<?php foreach ($smm as $row_smm) :?>
												<?php if($row_smm['sub_klasifikasi']==$sub_klasifikasi) :?>
											<div class="col-md-12">
												<div class="panel panel-flat panel-collapsed">
													<div class="panel-heading">
														<h5 class="panel-title">SMM</h5>
														<div class="heading-elements">

																		</div>
													</div>

														<div class="panel-body" >


															<!--2-->

															<!--3-->
															<div class="row">
																<div class="col-md-2">
																	<div class="content-group-lg">
																		<h6 class="text-semibold">#1</h6>
																		<p class="content-group">File Surat Pernyataan/Sertifikat ISO/Dokumen SMM</p>
																	</div>
																</div>


																<div class="col-md-4">
																	<br>
																	<a <?php if($row_smm['file_surat_pernyataan']!='') :?>href="<?= $row_smm['file_surat_pernyataan'] ;?>"<?php else :?>href="<?= base_url('not_found') ;?>"<?php endif ;?> target="_blank" type="button" name="btn_cek_11"  style="float: right" class="open-delete btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																</div>




															</div>





														</div>
												</div>
											</div>
											<hr>


											<div class="row">
												<div class="col-md-3">
													<div class="content-group-lg">
														<h6 class="text-semibold"><span class="text-danger">#</span></h6>
														<p class="content-group"><span class="text-danger">Comment SMM</span></p>
													</div>
												</div>




													<div class="col-md-9">
														<br>
														<div class="input-group file-caption-main">
															<span class="file-caption-icon"></span>
															<textarea id="comment_79" name="comment_79"   class="form-control form-control-solid" rows="5"><?php if(!empty($ceklis)){echo $data_comment79;}?> </textarea>



														</div>
													</div>
											</div>
											<hr>
											<div class="row">
												<div class="col-md-4">
													<br>

															<select name="tipe_smm"  id="tipe_smm" class="form-control">
																	<option value="" >Pilih Tipe Berkas SMM</option>
																	<option value="1" <?php if(!empty($asesor_smm)){if($asesor_smm[0]['dokumen']=='1'){echo "selected";}}?>>Surat Pernyataan Komitmen</option>
																	<option value="2" <?php if(!empty($asesor_smm)){if($asesor_smm[0]['dokumen']=='2'){echo "selected";}}?>>Sertifikat ISO 9000-2015</option>
																	<option value="3" <?php if(!empty($asesor_smm)){if($asesor_smm[0]['dokumen']=='3'){echo "selected";}}?>>Dokumen Penyelenggaraan</option>
															</select>

												</div>
												<div class="col-md-4">
													<br>

													<div class="input-group file-caption-main">
														<span class="file-caption-icon"></span>
														<input type="text" name="comment_smm" <?php if(!empty($asesor_smm)):?>value="<?=$asesor_smm[0]['comment'];?>"<?php endif ;?>  class="form-control form-control-solid"  placeholder="Tanggal dan Tahun Dokumen...">

													</div>

												</div>



													<div class="col-md-4">


															<span class="file-caption-icon"></span>
															<font class="text-semibold" style="font-size: 10px;">Tidak / Sesuai </font>
														<span class="switch switch-outline switch-icon switch-primary">

															<label>

																<input type="checkbox" onclick="javascript:check_smm(this)" <?php if(!empty($asesor_smm)):?> <?php if($asesor_smm[0]['checklist']=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked" <?php endif ;?> id="checkbox_smm_1" value="1"  name="checkbox_smm_asesor" />
																<span></span>
															</label>
														</span>


													</div>










												</div>
											<hr>


									<?php endif ;?>
								<?php endforeach ;?>
									<?php endif ;?>
									</div>
									<div class="tab-pane fade show" id="smap" role="tabpanel" aria-labelledby="home-tab-1">
										<?php if(!empty($smap)) :?>
											<?php foreach ($smap as $row_smap) :?>
												<?php if($row_smap['sub_klasifikasi']==$sub_klasifikasi) :?>
											<div class="col-md-12">
												<div class="panel panel-flat panel-collapsed">
													<div class="panel-heading">
														<h5 class="panel-title">SMAP</h5>
														<div class="heading-elements">

																		</div>
													</div>


														<div class="panel-body" >
															<!--#1-->
															<div class="row">
																<div class="col-md-2">
																	<div class="content-group-lg">
																		<h6 class="text-semibold">#1</h6>
																		<p class="content-group">Dokumen SMAP/Sertifikat ISO/File Surat Pernyataan</p>
																	</div>
																</div>

																<div class="col-md-4">
																	<br>
																	<a <?php if($row_smap['file_surat_pernyataan']!='') :?>href="<?= $row_smap['file_surat_pernyataan'] ;?>"<?php else :?>href="<?= base_url('not_found') ;?>"<?php endif ;?> target="_blank" type="button" name="btn_cek_13"  style="float: right" class="open-delete btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																</div>


															</div>




														</div>
												</div>
											</div>
											<hr>



											<hr>
											<div class="row">
												<div class="col-md-4">
													<br>

															<select name="tipe_smap"  id="tipe_smap" class="form-control">
																	<option value="">Pilih Tipe Berkas SMAP</option>
																	<option value="1" <?php if(!empty($asesor_smap)){if($asesor_smap[0]['dokumen']=='1'){echo "selected";}}?>>Surat Pernyataan Komitmen</option>
																	<option value="2" <?php if(!empty($asesor_smap)){if($asesor_smap[0]['dokumen']=='2'){echo "selected";}}?>>Sertifikat ISO 37001-2016</option>
																	<option value="3" <?php if(!empty($asesor_smap)){if($asesor_smap[0]['dokumen']=='3'){echo "selected";}}?>>Dokumen Penyelenggaraan</option>
															</select>

												</div>
												<div class="col-md-4">
													<br>

													<div class="input-group file-caption-main">
														<span class="file-caption-icon"></span>
														<input type="text" name="comment_smm" <?php if(!empty($asesor_smm)):?>value="<?=$asesor_smm[0]['comment'];?>"<?php endif ;?>  class="form-control form-control-solid"  placeholder="Tanggal dan Tahun Dokumen...">

													</div>

												</div>


												<div class="col-md-4">


														<span class="file-caption-icon"></span>
														<font class="text-semibold" style="font-size: 10px;">Tidak / Sesuai</font>
													<span class="switch switch-outline switch-icon switch-primary">

														<label>

															<input type="checkbox" onclick="javascript:check_smap(this)" <?php if(!empty($asesor_smap)):?> <?php if($asesor_smap[0]['checklist']=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked" <?php endif ;?> id="checkbox_smap_1" value="1"  name="checkbox_smap_asesor" />
															<span></span>
														</label>
													</span>


												</div>










												</div>
											<hr>


									<?php endif ;?>
								<?php endforeach ;?>
									<?php endif ;?>
									<div class="card card-custom">
										<div class="card-header border-0 bg-primary">
											<div class="card-title">
												<span class="card-icon">
													<i class="flaticon2-chat-1 text-white"></i>
												</span>
												<h3 class="card-label text-white">Resume Penilaian SMAP</h3>
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

															<th>SMAP</th>
															<th>Comment Resume SMAP</th>

														</tr>
													</thead>
													<tbody>
														<?php foreach($klasifikasi as $row_klas) :?>

														<tr>
															<td><br><?=$row_klas['id_sub_klasifikasi'];?></td>
															<td><br><?=$row_klas['kualifikasi'];?></td>



															<td>
																<font class="text-semibold" style="font-size: 10px;">Tidak/Lolos</font>
																<span class="switch switch-outline switch-icon switch-dark">

																	<label>
																		<input type="checkbox" value="1" id="checkbox_lolos_smap"  <?php if($asesor_smap[0]['checklist_resume']=="1") :?>checked="checked"<?php endif ;?>  name="checkbox_lolos_smap"  />
																		<span></span>
																	</label>
																</span>
															</td>
															<td>
																<div class="row">


																		<div class="input-group file-caption-main">
																			<span class="file-caption-icon"></span>
																			<textarea id="comment_resume_smap" name="comment_resume_smap" class="form-control form-control-solid" rows="5" placeholder="Catatan resuma..."><?php if(!empty($ceklis)){echo $asesor_smap[0]['comment_resume'];}?></textarea>

																		</div>

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
									<div class="tab-pane fade show" id="klasifikasi_cetak" role="tabpanel" aria-labelledby="home-tab-1">









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
																<a href="<?= base_url('sertifikasi/tinjauan_permohonan_izin/'.$row_klas['id_izin']) ;?>" target="_blank" type="button" name="btn_cek_36"  style="float: left" class=" btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Cek Tinjauan</a>

															</td>

														</tr>
													<?php endforeach ;?>





													</tbody>
												</table>
											</div>
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

									<div class="tab-pane fade" id="pengurus" role="tabpanel" aria-labelledby="profile-tab-1">

											<legend>Data Pengurus</legend>


											<hr>
											<?php if(!empty($pengurus)) :?>
											<div class="accordion accordion-toggle-arrow" id="accordionExample1">

													<?php foreach ($pengurus as $row_pengurus) :?>
														<?php $counter_pengurus+=1 ;?>
												<div class="card">
														<div class="card-header">
																<div class="card-title collapsed" data-toggle="collapse" data-target="#data-pengurus-<?php echo $counter_pengurus ;?>">
																	<?= $row_pengurus['nama'] ?>
																</div>
														</div>
														<div id="data-pengurus-<?php echo $counter_pengurus ;?>" class="collapse show" data-parent="#accordionExample1">
																<div class="card-body">
																	<div class="row">
																		<div class="col-md-3">
																			<div class="content-group-lg">
																				<h6 class="text-semibold">#1</h6>
																				<p class="content-group">Lette of Appointment</p>
																			</div>
																		</div>

																		<div class="col-md-2">
																			<br>
																			<a <?php if($row_pengurus['persyaratan_loa']!='') :?>href="<?= $row_pengurus['persyaratan_loa'] ;?>"<?php else :?>href="<?= base_url('not_found') ;?>"<?php endif ;?> target="_blank" type="button" name="btn_cek_13"  style="float: right" class="open-delete btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
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
																					<td>Nama Pengurus</td>
																					<td><span class="text-dark"><?php echo $row_pengurus['nama'] ?></span></td>


																				</tr>
																				<tr>
																					<td>PJBU</td>
																					<td><span class="text-dark"><?php if($row_pengurus['pjbu']=='1'){echo "PJBU";}else{echo "-";}  ?></span></td>
																				</tr>
																				<tr>
																					<td>No KTP</td>
																					<td><span class="text-dark"><?php echo $row_pengurus['no_ktp'] ?></span></td>
																				</tr>
																				<tr>
																					<td>NPWP</td>
																					<td><span class="text-dark"><?php echo $row_pengurus['npwp'] ?></span></td>
																				</tr>
																				<tr>
																					<td>No Akte</td>
																					<td><span class="text-dark"><?php echo $row_pengurus['no_akte'] ?></span></td>
																				</tr>
																				<tr>
																					<td>Bukan ASN</td>
																					<td><span class="text-dark"><?php echo $row_pengurus['bukan_asn'] ?></span></td>
																				</tr>
																				<tr>
																					<td>Jabatan</td>
																					<td><span class="text-dark"><?php echo $row_pengurus['jabatan_bu'] ?></span></td>
																				</tr>

																				<tr>
																					<td>Tanggal Lahir</td>
																					<td><span class="text-dark"><?php echo $row_pengurus['tgl_lahir'] ?></span></td>
																				</tr>

																				<tr>
																					<td>Alamat</td>
																					<td><span class="text-dark"><?php echo $row_pengurus['alamat'] ?></span></td>
																				</tr>
																				<tr>
																					<td>Email</td>
																					<td><span class="text-dark"><?php echo $row_pengurus['email'] ?></span></td>
																				</tr>
																				<tr>
																					<td>HP 1</td>
																					<td><span class="text-dark"><?php echo $row_pengurus['hp_a'] ?></span></td>
																				</tr>
																				<tr>
																					<td>HP 2</td>
																					<td><span class="text-dark"><?php echo $row_pengurus['hp_b'] ?></span></td>
																				</tr>
																				<tr>
																					<td>HP 2</td>
																					<td><span class="text-dark"><?php echo $row_pengurus['hp_b'] ?></span></td>
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
									<input type="hidden" name="id_izin" value="<?=$klasifikasi[0]['id_izin'] ;?>" >
									<div class="tab-pane fade" id="pengalaman" role="tabpanel" aria-labelledby="contact-tab-1">

										<legend>Pengalaman</legend>



										<?php
											$count=0;
										 foreach($biodata_penjualan as $row_penjualan){
											$count+=1;
											$id_clean3 = preg_replace('/[^\p{L}\p{N}\s]/u', '', $row_penjualan['id_pengalaman']);
											$id_clean2 = preg_replace('/\s+/', '', $id_clean3);
											$id_clean=substr($id_clean2,0,4);
											for ($i=0; $i < count($biodata_penjualan); $i++) {
												if($row_penjualan['id']==$biodata_penjualan[$i]['id'] AND $row_penjualan['id_sub_klasifikasi']==$biodata_penjualan[$i]['id_sub_klasifikasi'] AND $row_penjualan['nomor_kontrak']==$biodata_penjualan[$i]['nomor_kontrak']){
													${"data_penjualan_".$row_penjualan['id'].$id_clean}=$row_penjualan['checklist'];
													${"comment_penjualan_".$row_penjualan['id'].$id_clean}=$row_penjualan['comment'];

												}
											}
										} ;?>


										<?php if(!empty($penjualan_tahunan)) :?>
										<div class="accordion accordion-toggle-arrow" id="accordionExample1">

												<?php foreach ($penjualan_tahunan as $row_pengalaman) :?>
													<?php if($row_pengalaman['id_izin']==$klasifikasi[0]['id_izin']) :?>
													<?php $counter_pengalaman+=1;
													$id_clean3 = preg_replace('/[^\p{L}\p{N}\s]/u', '', $row_pengalaman['nomor_kontrak']);
													$id_clean2 = preg_replace('/\s+/', '', $id_clean3);
													$id_clean=substr($id_clean2,0,4);

													;?>

											<div class="card">
													<div class="card-header">
															<div class="card-title collapsed" data-toggle="collapse" data-target="#data-pengalaman-<?php echo $counter_pengalaman ;?>">
																<?php echo $row_pengalaman['id_sub_klasifikasi'].'-'.$row_pengalaman['nama_pengalaman'] ;?>
															</div>
													</div>
													<div id="data-pengalaman-<?php echo $counter_pengalaman ;?>" class="collapse show" data-parent="#accordionExample1">

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
																		<a <?php if($row_pengalaman['file_bash']!='') :?>href="<?= $row_pengalaman['file_bash'] ;?>"<?php else :?>href="<?= base_url('not_found') ;?>"<?php endif ;?> target="_blank" type="button" name="btn_cek_36"  style="float: left" class=" btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
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
																		<a <?php if($row_pengalaman['file_boq_rab_mpu']!='') :?>href="<?= $row_pengalaman['file_boq_rab_mpu'] ;?>"<?php else :?>href="<?= base_url('not_found') ;?>"<?php endif ;?> target="_blank" type="button" name="btn_cek_35"  style="float: left" class=" btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																	</div>

																</div>
																<div class="row">
																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#3</h6>
																			<p class="content-group">File Kontrak Dengan Pemberi Tugas</p>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<br>
																		<a <?php if($row_pengalaman['file_kontrak_dengan_pemberi_tugas']!='') :?>href="<?= $row_pengalaman['file_kontrak_dengan_pemberi_tugas'] ;?>"<?php else :?>href="<?= base_url('not_found') ;?>"<?php endif ;?> target="_blank" type="button" name="btn_cek_36"  style="float: left" class=" btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																	</div>




																</div>
																<hr>



																<hr>
																<div class="row">
																	<div class="col-md-3">
																		<div class="content-group-lg">
																			<h6 class="text-semibold"><span class="text-primary">#1</span></h6>
																			<p class="content-group"><span class="text-dark">Kesesuaian Ruang Lingkup </span></p>
																		</div>
																	</div>

																		<div class="col-md-1">


																				<font class="text-semibold" style="font-size: 10px;">Tidak / Ok</font>
																				<br>
																			<span class="switch switch-outline switch-icon switch-primary">

																				<label>
																					<input type="checkbox" <?php if(!empty($biodata_penjualan)):?> <?php if(${"data_penjualan_1".$id_clean}=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_penjualan_1" value="1"  name="checkbox_penjualan_1<?=$id_clean;?>" />
																					<span></span>
																				</label>
																			</span>




																		</div>




																			<div class="col-md-8">
																				<br>
																				<div class="input-group file-caption-main">
																					<span class="file-caption-icon"></span>
																					<input type="text" name="comment_penjualan_1<?=$id_clean;?>" id="comment_penjualan_1"  <?php if(!empty($biodata_penjualan)):?> value="<?=${"comment_penjualan_1".$id_clean};?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">

																				</div>
																			</div>
																</div>
																<div class="row">
																	<div class="col-md-3">
																		<div class="content-group-lg">
																			<h6 class="text-semibold"><span class="text-primary">#2</span></h6>
																			<p class="content-group"><span class="text-dark">Kesesuaian  nilai Kontrak  </span></p>
																		</div>
																	</div>

																		<div class="col-md-1">


																				<font class="text-semibold" style="font-size: 10px;">Tidak / Ok</font>
																				<br>
																			<span class="switch switch-outline switch-icon switch-primary">

																				<label>
																					<input type="checkbox" <?php if(!empty($biodata_penjualan)):?> <?php if(${"data_penjualan_2".$id_clean}=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_penjualan_2" value="1"  name="checkbox_penjualan_2<?=$id_clean;?>" />
																					<span></span>
																				</label>
																			</span>




																		</div>




																			<div class="col-md-8">
																				<br>
																				<div class="input-group file-caption-main">
																					<span class="file-caption-icon"></span>
																					<input type="text" name="comment_penjualan_2<?=$id_clean;?>" id="comment_penjualan_2"  <?php if(!empty($biodata_penjualan)):?> value="<?=${"comment_penjualan_2".$id_clean};?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">

																				</div>
																			</div>
																</div>
																<div class="row">
																	<div class="col-md-3">
																		<div class="content-group-lg">
																			<h6 class="text-semibold"><span class="text-primary">#3</span></h6>
																			<p class="content-group"><span class="text-dark">Kesesuaian Tanggal Kontrak  </span></p>
																		</div>
																	</div>

																		<div class="col-md-1">


																				<font class="text-semibold" style="font-size: 10px;">Tidak / Ok</font>
																				<br>
																			<span class="switch switch-outline switch-icon switch-primary">

																				<label>
																					<input type="checkbox" <?php if(!empty($biodata_penjualan)):?> <?php if(${"data_penjualan_3".$id_clean}=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_penjualan_3" value="1"  name="checkbox_penjualan_3<?=$id_clean;?>" />
																					<span></span>
																				</label>
																			</span>




																		</div>




																			<div class="col-md-8">
																				<br>
																				<div class="input-group file-caption-main">
																					<span class="file-caption-icon"></span>
																					<input type="text" name="comment_penjualan_3<?=$id_clean;?>" id="comment_penjualan_3"  <?php if(!empty($biodata_penjualan)):?> value="<?=${"comment_penjualan_3".$id_clean};?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">

																				</div>
																			</div>
																</div>
																<div class="row">
																	<div class="col-md-3">
																		<div class="content-group-lg">
																			<h6 class="text-semibold"><span class="text-primary">#4</span></h6>
																			<p class="content-group"><span class="text-dark">Kesesuaian BAST dengan Kontrak  </span></p>
																		</div>
																	</div>

																		<div class="col-md-1">


																				<font class="text-semibold" style="font-size: 10px;">Tidak / Ok</font>
																				<br>
																			<span class="switch switch-outline switch-icon switch-primary">

																				<label>
																					<input type="checkbox" <?php if(!empty($biodata_penjualan)):?> <?php if(${"data_penjualan_4".$id_clean}=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_penjualan_4" value="1"  name="checkbox_penjualan_4<?=$id_clean;?>" />
																					<span></span>
																				</label>
																			</span>




																		</div>




																			<div class="col-md-8">
																				<br>
																				<div class="input-group file-caption-main">
																					<span class="file-caption-icon"></span>
																					<input type="text" name="comment_penjualan_4<?=$id_clean;?>" id="comment_penjualan_4"  <?php if(!empty($biodata_penjualan)):?> value="<?=${"comment_penjualan_4".$id_clean};?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">

																				</div>
																			</div>
																</div>
																<div class="row">
																	<div class="col-md-3">
																		<div class="content-group-lg">
																			<h6 class="text-semibold"><span class="text-primary">#5</span></h6>
																			<p class="content-group"><span class="text-dark">Kesesuaian tanggal BAST  </span></p>
																		</div>
																	</div>

																		<div class="col-md-1">


																				<font class="text-semibold" style="font-size: 10px;">Tidak / Ok</font>
																				<br>
																			<span class="switch switch-outline switch-icon switch-primary">

																				<label>
																					<input type="checkbox" <?php if(!empty($biodata_penjualan)):?> <?php if(${"data_penjualan_5".$id_clean}=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_penjualan_5" value="1"  name="checkbox_penjualan_5<?=$id_clean;?>" />
																					<span></span>
																				</label>
																			</span>




																		</div>




																			<div class="col-md-8">
																				<br>
																				<div class="input-group file-caption-main">
																					<span class="file-caption-icon"></span>
																					<input type="text" name="comment_penjualan_5<?=$id_clean;?>" id="comment_penjualan_5"  <?php if(!empty($biodata_penjualan)):?> value="<?=${"comment_penjualan_5".$id_clean};?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">

																				</div>
																			</div>
																</div>
																<div class="row">
																	<div class="col-md-3">
																		<div class="content-group-lg">
																			<h6 class="text-semibold"><span class="text-primary">#6</span></h6>
																			<p class="content-group"><span class="text-dark">Kesesuaian Kontrak KSO  </span></p>
																		</div>
																	</div>

																		<div class="col-md-1">


																				<font class="text-semibold" style="font-size: 10px;">Tidak / Ok</font>
																				<br>
																			<span class="switch switch-outline switch-icon switch-primary">

																				<label>
																					<input type="checkbox" <?php if(!empty($biodata_penjualan)):?> <?php if(${"data_penjualan_6".$id_clean}=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_penjualan_6" value="1"  name="checkbox_penjualan_6<?=$id_clean;?>" />
																					<span></span>
																				</label>
																			</span>




																		</div>




																			<div class="col-md-8">
																				<br>
																				<div class="input-group file-caption-main">
																					<span class="file-caption-icon"></span>
																					<input type="text" name="comment_penjualan_6<?=$id_clean;?>" id="comment_penjualan_6"  <?php if(!empty($biodata_penjualan)):?> value="<?=${"comment_penjualan_6".$id_clean};?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">

																				</div>
																			</div>
																</div>
																<div class="row">
																	<div class="col-md-3">
																		<div class="content-group-lg">
																			<h6 class="text-semibold"><span class="text-primary">#7</span></h6>
																			<p class="content-group"><span class="text-dark">Kesesuaian BOQ RAB MPU  </span></p>
																		</div>
																	</div>

																		<div class="col-md-1">


																				<font class="text-semibold" style="font-size: 10px;">Tidak / Ok</font>
																				<br>
																			<span class="switch switch-outline switch-icon switch-primary">

																				<label>
																					<input type="checkbox" <?php if(!empty($biodata_penjualan)):?> <?php if(${"data_penjualan_7".$id_clean}=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_penjualan_7" value="1"  name="checkbox_penjualan_7<?=$id_clean;?>" />
																					<span></span>
																				</label>
																			</span>




																		</div>




																			<div class="col-md-8">
																				<br>
																				<div class="input-group file-caption-main">
																					<span class="file-caption-icon"></span>
																					<input type="text" name="comment_penjualan_7<?=$id_clean;?>" id="comment_penjualan_7"  <?php if(!empty($biodata_penjualan)):?> value="<?=${"comment_penjualan_7".$id_clean};?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">

																				</div>
																			</div>
																</div>
																<div class="row">
																	<div class="col-md-3">
																		<div class="content-group-lg">
																			<h6 class="text-semibold"><span class="text-primary">#8</span></h6>
																			<p class="content-group"><span class="text-dark">Kesesuaian Addendum  </span></p>
																		</div>
																	</div>

																		<div class="col-md-1">


																				<font class="text-semibold" style="font-size: 10px;">Tidak / Ok</font>
																				<br>
																			<span class="switch switch-outline switch-icon switch-primary">

																				<label>
																					<input type="checkbox" <?php if(!empty($biodata_penjualan)):?> <?php if(${"data_penjualan_8".$id_clean}=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_penjualan_8" value="1"  name="checkbox_penjualan_8<?=$id_clean;?>" />
																					<span></span>
																				</label>
																			</span>




																		</div>




																			<div class="col-md-8">
																				<br>
																				<div class="input-group file-caption-main">
																					<span class="file-caption-icon"></span>
																					<input type="text" name="comment_penjualan_8<?=$id_clean;?>" id="comment_penjualan_8"  <?php if(!empty($biodata_penjualan)):?> value="<?=${"comment_penjualan_8".$id_clean};?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">

																				</div>
																			</div>
																</div>
																<div class="row">
																	<div class="col-md-3">
																		<div class="content-group-lg">
																			<h6 class="text-semibold"><span class="text-primary">#9</span></h6>
																			<p class="content-group"><span class="text-dark"> Validasi Kontrak </span></p>
																		</div>
																	</div>

																		<div class="col-md-1">


																				<font class="text-semibold" style="font-size: 10px;">Tidak / Ok</font>
																				<br>
																			<span class="switch switch-outline switch-icon switch-primary">

																				<label>
																					<input type="checkbox" <?php if(!empty($biodata_penjualan)):?> <?php if(${"data_penjualan_9".$id_clean}=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_penjualan_9" value="1"  name="checkbox_penjualan_9<?=$id_clean;?>" />
																					<span></span>
																				</label>
																			</span>




																		</div>




																			<div class="col-md-8">
																				<br>
																				<div class="input-group file-caption-main">
																					<span class="file-caption-icon"></span>
																					<input type="text" name="comment_penjualan_9<?=$id_clean;?>" id="comment_penjualan_9"  <?php if(!empty($biodata_penjualan)):?> value="<?=${"comment_penjualan_9".$id_clean};?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">

																				</div>
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
																				<td><span class="text-dark"><?php echo $row_pengalaman['nama_pengalaman'] ;?></span></td>

																			</tr>
																			<tr>
																				<td>No Kontrak</td>
																				<td><span class="text-dark"><?php echo $row_pengalaman['nomor_kontrak'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Nilai Kontrak</td>
																				<td><span class="text-dark">Rp. <?=number_format($row_pengalaman['nilai_kontrak'],0,",",".") ;?></span></td>

																			</tr>
																			<tr>
																				<td>Nilai Kontrak Sesuai Porsi</td>
																				<td><span class="text-dark">Rp. <?=number_format($row_pengalaman['nilai_kontrak_sesuai_porsi'],0,",",".") ;?></span></td>


																			</tr>
																			<tr>
																				<td>Tgl BAST</td>
																				<td><span class="text-dark"><?php echo $row_pengalaman['tgl_bast'] ;?></span></td>

																			</tr>
																			<tr>
																				<td>BAST</td>
																				<td></span></td>

																			</tr>
																			<tr>
																				<td>BOQ RAB MPU</td>
																				<td></span></td>

																			</tr>
																			</tr>
																			<tr>
																				<td>Email Instansi</td>
																				<td><span class="text-dark"><?php echo $row_pengalaman['email_instansi'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Jabatan Pemberi Tugas</td>
																				<td><span class="text-dark"><?php echo $row_pengalaman['jabatan_pemberi_tugas'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Lokasi Pekerjaan</td>
																				<td><span class="text-dark"><?php echo $row_pengalaman['lokasi_pekerjaan'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Nama Instansi Pemberi Tugas</td>
																				<td><span class="text-dark"><?php echo $row_pengalaman['nama_instansi_pemberi_tugas'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Nama Pemberi Tugas</td>
																				<td><span class="text-dark"><?php echo $row_pengalaman['nama_pemberi_tugas'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Nilai Kontrak Adendum</td>
																				<td><span class="text-dark">Rp. <?=number_format($row_pengalaman['nilai_kontrak_adendum'],0,",",".") ;?></span></td>

																			</tr>

																			<tr>
																				<td>No Telfon Pemberi Tugas</td>
																				<td><span class="text-dark"><?php echo $row_pengalaman['no_telp_instansi_pemberi_tugas'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Nomor Registrasi Pengalaman</td>
																				<td><span class="text-dark"><?php echo $row_pengalaman['nomor_registrasi_pengalaman'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Pemberi Tugas</td>
																				<td><span class="text-dark"><?php echo $row_pengalaman['pemberi_tugas'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Presentase Porsi</td>
																				<td><span class="text-dark"><?php echo $row_pengalaman['presentase_porsi'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Status KSO</td>
																				<td><span class="text-dark"><?php echo $row_pengalaman['status_kso'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Sumber Dana</td>
																				<td><span class="text-dark"><?php echo $row_pengalaman['sumber_dana'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Sub Klasifikasi</td>
																				<td><span class="text-dark"><?php echo $row_pengalaman['id_sub_klasifikasi'] ;?></span></td>
																			</tr>

																			<tr>
																				<td>Pemilik Proyek</td>
																				<td><span class="text-dark"><?php echo $row_pengalaman['pemilik_proyek'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Tahun</td>
																				<td><span class="text-dark"><?php echo $row_pengalaman['tahun'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Spesifik Pekerjaan</td>
																				<td><span class="text-dark"><?php echo $row_pengalaman['spesifik_pekerjaan'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>No BAST</td>
																				<td><span class="text-dark"><?php echo $row_pengalaman['no_bash'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>No NKPK</td>
																				<td><span class="text-dark"><?php echo $row_pengalaman['no_nkpk'] ;?></span></td>
																			</tr>

																			<tr>
																				<td>Tgl Kontrak</td>
																				<td><span class="text-dark"><?php echo $row_pengalaman['tgl_kontrak'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Tgl Mulai</td>
																				<td><span class="text-dark"><?php echo $row_pengalaman['tgl_mulai'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Tgl Selesai</td>
																				<td><span class="text-dark"><?php echo $row_pengalaman['tgl_selesai'] ;?></span></td>
																			</tr>


																		</tbody>
																	</table>
																</div>
															</div>
													</div>
											</div>
											<hr>
											<?php endif ;?>
										<?php endforeach;?>


									</div>
										<?php endif ;?>
										<div class="card card-custom">
											<div class="card-header border-0 bg-primary">
												<div class="card-title">
													<span class="card-icon">
														<i class="flaticon2-chat-1 text-white"></i>
													</span>
													<h3 class="card-label text-white">Resume Penlaian Penjualan Tahunan</h3>
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

																<th>Penjualan Tahunan</th>
																<th>Comment Resume Penjualan Tahunan</th>

															</tr>
														</thead>
														<tbody>
															<?php foreach($klasifikasi as $row_klas) :?>

															<tr>
																<td><br><?=$row_klas['id_sub_klasifikasi'];?></td>
																<td><br><?=$row_klas['kualifikasi'];?></td>



																<td>
																	<font class="text-semibold" style="font-size: 10px;">Tidak/Lolos</font>
																	<span class="switch switch-outline switch-icon switch-dark">

																		<label>
																			<input type="checkbox" value="1" id="checkbox_lolos_penjualan"  <?php if($penilaian[0]['penjualan_tahunan']=='1') :?>checked="checked"<?php endif ;?>  name="checkbox_lolos_penjualan<?=$row_klas['id_sub_klasifikasi'];?>"  />
																			<span></span>
																		</label>
																	</span>
																</td>
																<td>
																	<div class="row">


																			<div class="input-group file-caption-main">
																				<span class="file-caption-icon"></span>
																				<textarea id="comment_resume_penjualan_tahunan" name="comment_resume_penjualan_tahunan" class="form-control form-control-solid" rows="5" placeholder="Catatan resuma..."><?php if(!empty($ceklis)){echo $biodata_penjualan[0]['comment_resume'];}?></textarea>

																			</div>

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


									<div class="tab-pane fade" id="akte" role="tabpanel" aria-labelledby="home-tab-1">

											<div class="col-md-12">
												<div class="panel panel-flat panel-collapsed">
													<div class="panel-heading">
														<h5 class="panel-title">Data Akte</h5>
														<div class="heading-elements">

																		</div>
													</div>
														<div class="panel-body" >






														</div>
												</div>
											</div>

											<hr>
											<?php if(!empty($akte)) :?>
											<div class="accordion accordion-toggle-arrow" id="accordionExample1">
												<input type="hidden"  value="<?php echo $tgl ;?>" class="switchery" name="tgl">

													<?php foreach ($akte as $row_akte) :?>
														<?php if($row_akte['sub_klasifikasi']==$sub_klasifikasi) :?>
														<?php $counter_akte+=1 ;?>
												<div class="card">
														<div class="card-header">
																<div class="card-title collapsed" data-toggle="collapse" data-target="#data-akte-<?php echo $counter_akte ;?>">
																	<?php echo $row_akte['no'] ;?>
																</div>
														</div>
														<div id="data-akte-<?php echo $counter_akte ;?>" class="collapse show" data-parent="#accordionExample1">

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
																			<a <?php if($row_akte['file_doc']!='') :?>href="<?= $row_akte['file_doc'] ;?>"<?php else :?>href="<?= base_url('not_found') ;?>"<?php endif ;?> target="_blank" type="button" name="btn_cek_36"  style="float: left" class=" btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
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
																					<td><span class="text-dark"><?=$row_akte['no'] ;?></span></td>
																				</tr>
																				<tr>
																					<td>No SK Kumham</td>
																					<td><span class="text-dark"><?=$row_akte['no_sk_kumham'] ;?></span></td>
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
																					<td><span class="text-dark"><?=$row_akte['nama_notaris'] ;?></span></td>
																				</tr>
																				<tr>
																					<td>Alamat Notaris</td>
																					<td><span class="text-dark"><?=$row_akte['alamat_notaris'] ;?></span></td>
																				</tr>
																				<tr>
																					<td>Propinsi Notaris</td>
																					<td><span class="text-dark"><?=$row_akte['id_provinsi_notaris'] ;?></span></td>
																				</tr>
																				<tr>
																					<td>Kabupaten Notaris</td>
																					<td><span class="text-dark"><?=$row_akte['id_kabupaten_notaris'] ;?></span></td>
																				</tr>

																				<tr>
																					<td>Modal Dasar</td>
																					<td><span class="text-dark">>Rp. <?=number_format($row_akte['modaldasar'],0,",",".") ;?></span></td>
																				</tr>
																				<tr>
																					<td>Modal Disetor</td>
																					<td><span class="text-dark">Rp. <?=number_format($row_akte['modalsetor'],0,",",".") ;?></span></td>
																				</tr>
																				<tr>
																					<td>Nilai Satuan Saham</td>
																					<td><span class="text-dark"><?=$row_akte['hargasatuan'] ;?></span></td>
																				</tr>
																				<tr>
																					<td>Nilai Saham</td>
																					<td><span class="text-dark"><?=$row_akte['nilaisaham'] ;?></span></td>
																				</tr>
																				<tr>
																					<td>Tgl Akte</td>
																					<td><span class="text-dark"><?=$row_akte['tgl_akte'] ;?></span></td>
																				</tr>
																				<tr>
																					<td>Maksud dan Tujuan</td>
																					<td><span class="text-dark"><?=$row_akte['maksudtujuan'] ;?></span></td>
																				</tr>





																			</tbody>
																		</table>
																	</div>


																</div>
														</div>
												</div>
												<hr>
												<?php endif ;?>
											<?php endforeach;?>


										</div>



										<?php endif ;?>
									</div>

									<div class="tab-pane fade" id="pemegang_saham" role="tabpanel" aria-labelledby="home-tab-1">

											<div class="col-md-12">
												<!-- Pemegang Saham toggles -->
												<div class="panel panel-flat panel-collapsed">
													<div class="panel-heading">
														<h5 class="panel-title">Data Pemegang Saham</h5>
														<div class="heading-elements">

																		</div>
													</div>
													<div class="panel-body" >



													</div>
												</div>
											</div>
											<hr>

											<hr>
											<?php if(!empty($pemegang_saham)) :?>
											<div class="accordion accordion-toggle-arrow" id="accordionExample1">
												<input type="hidden"  value="<?php echo $tgl ;?>" class="switchery" name="tgl">

													<?php foreach ($pemegang_saham as $row_saham) :?>
														<?php $counter_saham+=1 ;?>
												<div class="card">
														<div class="card-header">
																<div class="card-title collapsed" data-toggle="collapse" data-target="#data-saham-<?php echo $counter_saham ;?>">
																	<?php echo $row_saham['nama_pemilik'] ;?>
																</div>
														</div>
														<div id="data-saham-<?php echo $counter_saham ;?>" class="collapse show" data-parent="#accordionExample1">

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
																					<td><span class="text-dark"><?php echo $row_saham['nama_pemilik'] ;?></span></td>
																				</tr>
																				<tr>
																					<td>No KTP</td>
																					<td><span class="text-dark"><?php echo $row_saham['no_ktp'] ;?></span></td>
																				</tr>
																				<tr>
																					<td>NPWP</td>
																					<td><span class="text-dark"><?php echo $row_saham['npwp'] ;?></span></td>
																				</tr>
																				<tr>
																					<td>Alamat</td>
																					<td><span class="text-dark"><?php echo $row_saham['alamat'] ;?></span></td>
																				</tr>
																				<tr>
																					<td>Propinsi</td>
																					<td><span class="text-dark"><?php echo $row_saham['id_propinsi'] ;?></span></td>
																				</tr>
																				<tr>
																					<td>Kabupaten</td>
																					<td><span class="text-dark"><?php echo $row_saham['id_kabupaten'] ;?></span></td>
																				</tr>

																				<tr>
																					<td>Jenis Saham</td>
																					<td><span class="text-dark"><?php echo $row_saham['jenis_saham'] ;?></span></td>
																				</tr>
																				<tr>
																					<td>Jumlah Saham</td>
																					<td><span class="text-dark"><?php echo $row_saham['jumlah_lembar'] ;?></span></td>
																				</tr>
																				<tr>
																					<td>Nilai Satuan Per-lembar</td>
																					<td><span class="text-dark"><?php echo $row_saham['nilai_perlembar'] ;?></span></td>
																				</tr>
																				<tr>
																					<td>Modal Dasar</td>
																					<td><span class="text-dark">Rp. <?=number_format($row_saham['modal_dasar'],0,",",".")  ;?></span></td>
																				</tr>
																				<tr>
																					<td>Modal Disetor</td>
																					<td><span class="text-dark">Rp. <?=number_format($row_saham['modal_disetor'],0,",",".")  ;?></span></td>
																				</tr>
																				<tr>
																					<td>No Akte</td>
																					<td><span class="text-dark"><?php echo $row_saham['no_akte'] ;?></span></td>
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
									<?php
										$count=0;
									 foreach($neraca_asesor as $row_keuangan){

												${"data_keuangan_".$row_keuangan['id']}=$row_keuangan['checklist'];
												${"data_keuangan_".$row_keuangan['id'].'_comment'}=$row_keuangan['comment'];


									} ;?>
									<div class="tab-pane fade" id="neraca" role="tabpanel" aria-labelledby="home-tab-1">

											<div class="col-md-12">
												<!-- Pemegang Saham toggles -->
												<div class="panel panel-flat panel-collapsed">
													<div class="panel-heading">
														<h5 class="panel-title">Data Neraca</h5>
														<div class="heading-elements">

																		</div>
													</div>
													<div class="panel-body" >




													</div>
												</div>
											</div>
											<hr>
											<div class="row">
												<div class="col-md-3">
													<div class="content-group-lg">
														<h6 class="text-semibold"><span class="text-primary">#1</span></h6>
														<p class="content-group"><span class="text-dark">Nilai Ekuitas Setelah Penilaian</span></p>
													</div>
												</div>




													<div class="col-md-3">
														<br>
														<div class="input-group file-caption-main">
															<span class="file-caption-icon"></span>
															<input type="text" id="ekuitas_setelah_penilaian" name="ekuitas_setelah_penilaian" oninput="setFormat('ekuitas_setelah_penilaian')" <?php if(!empty($neraca_asesor_nilai)):?> value="<?=number_format($neraca_asesor_nilai[0]['nilai_ekuitas'],0,",",".");?>" <?php endif ;?> class="form-control form-control-solid"  placeholder="Masukan Nilai Ekuitas...">

														</div>
													</div>
													<div class="col-md-1">


															<font class="text-semibold" style="font-size: 10px;">Tidak / Ok</font>
															<br>
														<span class="switch switch-outline switch-icon switch-primary">

															<label>
																<input type="checkbox" <?php if(!empty($neraca_asesor)):?> <?php if(${"data_keuangan_1"}=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_keuangan_1" value="1"  name="keuangan_1" />
																<span></span>
															</label>
														</span>




													</div>




														<div class="col-md-5">
															<br>
															<div class="input-group file-caption-main">
																<span class="file-caption-icon"></span>
																<input type="text" name="comment_neraca_1" id="comment_neraca_1"  <?php if(!empty($neraca_asesor)):?> value="<?=${"data_keuangan_1_comment"};?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">

															</div>
														</div>
											</div>
											<div class="row">
												<div class="col-md-3">
													<div class="content-group-lg">
														<h6 class="text-semibold"><span class="text-primary">#2</span></h6>
														<p class="content-group"><span class="text-dark">Nilai Aset Setelah Penilaian</span></p>
													</div>
												</div>




												<div class="col-md-3">
													<br>
													<div class="input-group file-caption-main">
														<span class="file-caption-icon"></span>
														<input type="text" name="aset_setelah_penilaian" id="aset_setelah_penilaian" oninput="setFormat('aset_setelah_penilaian')" <?php if(!empty($neraca_asesor_nilai)):?> value="<?=number_format($neraca_asesor_nilai[0]['nilai_aset'],0,",",".");?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Masukan Nilai Aset...">

													</div>
												</div>
												<div class="col-md-1">


														<font class="text-semibold" style="font-size: 10px;">Tidak / Ok</font>
														<br>
													<span class="switch switch-outline switch-icon switch-primary">

														<label>
															<input type="checkbox" <?php if(!empty($neraca_asesor)):?> <?php if(${"data_keuangan_2"}=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_keuangan_2" value="1"  name="keuangan_2" />
															<span></span>
														</label>
													</span>




												</div>




													<div class="col-md-5">
														<br>
														<div class="input-group file-caption-main">
															<span class="file-caption-icon"></span>
															<input type="text" name="comment_neraca_2" id="comment_neraca_2"  <?php if(!empty($neraca_asesor)):?> value="<?=${"data_keuangan_2_comment"};?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">

														</div>
													</div>
											</div>

											<div class="row">
												<div class="col-md-3">
													<div class="content-group-lg">
														<h6 class="text-semibold"><span class="text-primary">#3</span></h6>
														<p class="content-group"><span class="text-dark">Neraca</span></p>
													</div>
												</div>




												<div class="col-md-3">

												</div>
												<div class="col-md-1">


														<font class="text-semibold" style="font-size: 10px;">Tidak / Ok</font>
														<br>
													<span class="switch switch-outline switch-icon switch-primary">

														<label>
															<input type="checkbox" <?php if(!empty($neraca_asesor)):?> <?php if(${"data_keuangan_3"}=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_keuangan_3" value="1"  name="keuangan_3" />
															<span></span>
														</label>
													</span>




												</div>




													<div class="col-md-5">
														<br>
														<div class="input-group file-caption-main">
															<span class="file-caption-icon"></span>
															<input type="text" name="comment_neraca_3" id="comment_neraca_3"  <?php if(!empty($neraca_asesor)):?> value="<?=${"data_keuangan_3_comment"};?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">

														</div>
													</div>
											</div>
											<div class="row">
												<div class="col-md-3">
													<div class="content-group-lg">
														<h6 class="text-semibold"><span class="text-primary">#4</span></h6>
														<p class="content-group"><span class="text-dark">Modal Disetor</span></p>
													</div>
												</div>




												<div class="col-md-3">

												</div>
												<div class="col-md-1">


														<font class="text-semibold" style="font-size: 10px;">Tidak / Ok</font>
														<br>
													<span class="switch switch-outline switch-icon switch-primary">

														<label>
															<input type="checkbox" <?php if(!empty($neraca_asesor)):?> <?php if(${"data_keuangan_4"}=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_keuangan_4" value="1"  name="keuangan_4" />
															<span></span>
														</label>
													</span>




												</div>




													<div class="col-md-5">
														<br>
														<div class="input-group file-caption-main">
															<span class="file-caption-icon"></span>
															<input type="text" name="comment_neraca_4" id="comment_neraca_4"  <?php if(!empty($neraca_asesor)):?> value="<?=${"data_keuangan_4_comment"};?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">

														</div>
													</div>
											</div>
											<div class="row">
												<div class="col-md-3">
													<div class="content-group-lg">
														<h6 class="text-semibold"><span class="text-primary">#5</span></h6>
														<p class="content-group"><span class="text-dark">KAP M & B</span></p>
													</div>
												</div>




												<div class="col-md-3">

														<div class="content-group-lg">
															<h6 class="text-semibold"><span class="text-primary">A) </span></h6>
															<p class="content-group"><span class="text-dark">Kelengkapan Laporan KAP </span></p>
														</div>

												</div>
												<div class="col-md-1">


														<font class="text-semibold" style="font-size: 10px;">Tidak / Ok</font>
														<br>
													<span class="switch switch-outline switch-icon switch-primary">

														<label>
															<input type="checkbox" <?php if(!empty($neraca_asesor)):?> <?php if(${"data_keuangan_5"}=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_keuangan_5" value="1"  name="keuangan_5" />
															<span></span>
														</label>
													</span>




												</div>




													<div class="col-md-5">
														<br>
														<div class="input-group file-caption-main">
															<span class="file-caption-icon"></span>
															<input type="text" name="comment_neraca_5" id="comment_neraca_5"  <?php if(!empty($neraca_asesor)):?> value="<?=${"data_keuangan_5_comment"};?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">

														</div>
													</div>
											</div>
											<div class="row">
												<div class="col-md-3">

												</div>




												<div class="col-md-3">

														<div class="content-group-lg">
															<h6 class="text-semibold"><span class="text-primary">B) </span></h6>
															<p class="content-group"><span class="text-dark">KAP terregistrasi KEMENKU </span></p>
															</div>
												</div>
												<div class="col-md-1">


														<font class="text-semibold" style="font-size: 10px;">Tidak / Ok</font>
														<br>
													<span class="switch switch-outline switch-icon switch-primary">

														<label>
															<input type="checkbox" <?php if(!empty($neraca_asesor)):?> <?php if(${"data_keuangan_6"}=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_keuangan_6" value="1"  name="keuangan_6" />
															<span></span>
														</label>
													</span>




												</div>




													<div class="col-md-5">
														<br>
														<div class="input-group file-caption-main">
															<span class="file-caption-icon"></span>
															<input type="text" name="comment_neraca_6" id="comment_neraca_6"  <?php if(!empty($neraca_asesor)):?> value="<?=${"data_keuangan_6_comment"};?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">

														</div>
													</div>
											</div>
											<div class="row">
												<div class="col-md-3">

												</div>




												<div class="col-md-3">

														<div class="content-group-lg">
															<h6 class="text-semibold"><span class="text-primary">C) </span></h6>
															<p class="content-group"><span class="text-dark">QRCode </span></p>
														</div>
												</div>
												<div class="col-md-1">


														<font class="text-semibold" style="font-size: 10px;">Tidak / Ok</font>
														<br>
													<span class="switch switch-outline switch-icon switch-primary">

														<label>
															<input type="checkbox" <?php if(!empty($neraca_asesor)):?> <?php if(${"data_keuangan_7"}=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_keuangan_7" value="1"  name="keuangan_7" />
															<span></span>
														</label>
													</span>




												</div>




													<div class="col-md-5">
														<br>
														<div class="input-group file-caption-main">
															<span class="file-caption-icon"></span>
															<input type="text" name="comment_neraca_7" id="comment_neraca_7"  <?php if(!empty($neraca_asesor)):?> value="<?=${"data_keuangan_7_comment"};?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">

														</div>
													</div>
											</div>
											<hr>


											<?php
												$count=0;
											 foreach($neraca_asesor as $row_keuangan){
												$count+=1;
												for ($i=0; $i < count($neraca_asesor); $i++) {
													if($row_keuangan['id']==$neraca_asesor[$i]['id'] AND $row_keuangan['tahun']==$neraca_asesor[$i]['tahun']){
														${"data_keuangan_".$row_keuangan['id']."_".$row_keuangan['tahun']}=$row_keuangan['checklist'];

													}
												}
											} ;?>

											<hr>
											<?php if(!empty($neraca)) :?>
											<div class="accordion accordion-toggle-arrow" id="accordionExample1">
												<input type="hidden"  value="<?php echo $tgl ;?>" class="switchery" name="tgl">

													<?php foreach ($neraca as $row_neraca) :?>
														<?php if($row_neraca['sub_klasifikasi']==$sub_klasifikasi) :?>

														<?php $counter_neraca+=1 ;?>
												<div class="card">
														<div class="card-header">
																<div class="card-title collapsed" data-toggle="collapse" data-target="#data-neraca-<?php echo $counter_neraca ;?>">
																	<?php echo $row_neraca['Tahun'] ;?>
																</div>
														</div>
														<div id="data-neraca-<?php echo $counter_neraca ;?>" class="collapse show" data-parent="#accordionExample1">

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
																			<a <?php if($row_neraca['persyaratan_doc1']!='') :?>href="<?= $row_neraca['persyaratan_doc1'] ;?>"<?php else :?>href="<?= base_url('not_found') ;?>"<?php endif ;?> target="_blank" type="button" name="btn_cek_36"  style="float: left" class=" btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																		</div>
																		<div class="col-md-2">
																			<div class="content-group-lg">
																				<h6 class="text-semibold">#2</h6>
																				<p class="content-group">Laporan Audit Akuntan Publik</p>
																			</div>
																		</div>


																		<div class="col-md-4">
																			<br>
																			<a <?php if($row_neraca['persyaratan_doc2']!='') :?>href="<?= $row_neraca['persyaratan_doc2'] ;?>"<?php else :?>href="<?= base_url('not_found') ;?>"<?php endif ;?> target="_blank" type="button" name="btn_cek_36"  style="float: left" class=" btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
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
																					<td><span class="text-dark"><?=$row_neraca['Tahun'] ;?></span></td>
																					<td></td>
																				</tr>
																				<tr>
																					<td>Nilai Ekuitas</td>
																					<td><span class="text-dark">Rp. <?=number_format($row_neraca['total_ekuitas'],0,",",".") ;?></span></td>

																				</tr>

																				<tr>
																					<td>Total Aset</td>
																					<td><span class="text-dark">Rp. <?=number_format($row_neraca['total_aset'],0,",",".") ;?></span></td>

																				</tr>

																				<tr>
																					<td>Laporan Audit KAP </td>
																					<td><span class="text-dark">(M,B & Spesialis)</span></td>

																				</tr>

																				<tr>
																					<td>Aktiva Lancar</td>
																					<td><span class="text-dark">Rp. <?=number_format($row_neraca['aktiva_lancar'],0,",",".")  ;?></span></td>
																				</tr>
																				<tr>
																					<td>Aktiva Tidak Lancar</td>
																					<td><span class="text-dark">Rp. <?=number_format($row_neraca['aktiva_tdk_lancar'],0,",",".")  ;?></span></td>
																				</tr>
																				<tr>
																					<td>Aktiva Lain-lain</td>
																					<td><span class="text-dark">Rp. <?=number_format($row_neraca['aktiva_lain_lain'],0,",",".")  ;?></span></td>
																				</tr>

																				<tr>
																					<td>Kewajiban lancar</td>
																					<td><span class="text-dark">Rp. <?=number_format($row_neraca['kewajiban_lancar'],0,",",".")  ;?></span></td>
																				</tr>
																				<tr>
																					<td>Kewajiban tidak lancar</td>
																					<td><span class="text-dark">Rp. <?=number_format($row_neraca['kewajiban_tdk_lancar'],0,",",".")  ;?></span></td>
																				</tr>


																				<tr>
																					<td>Total Kewajiban Ekuitas</td>
																					<td><span class="text-dark">Rp. <?=number_format($row_neraca['total_kewajiban_ekuitas'],0,",",".")  ;?></span></td>
																				</tr>
																				<tr>
																					<td>Total Kewajiban</td>
																					<td><span class="text-dark">Rp. <?=number_format($row_neraca['total_kewajiban'],0,",",".")  ;?></span></td>
																				</tr>





																			</tbody>
																		</table>
																	</div>


																</div>
														</div>
												</div>
												<hr>
												<?php endif ;?>
											<?php endforeach;?>


										</div>
										<?php endif ;?>
										<div class="card card-custom">
											<div class="card-header border-0 bg-primary">
												<div class="card-title">
													<span class="card-icon">
														<i class="flaticon2-chat-1 text-white"></i>
													</span>
													<h3 class="card-label text-white">Resume Penlaian Keuangan</h3>
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

																<th>Keuangan</th>
																<th>Comment Resume Keuangan</th>

															</tr>
														</thead>
														<tbody>
															<?php foreach($klasifikasi as $row_klas) :?>

															<tr>
																<td><br><?=$row_klas['id_sub_klasifikasi'];?></td>
																<td><br><?=$row_klas['kualifikasi'];?></td>



																<td>
																	<font class="text-semibold" style="font-size: 10px;">Tidak/Lolos</font>
																	<span class="switch switch-outline switch-icon switch-dark">

																		<label>
																			<input type="checkbox" value="1" id="checkbox_lolos_keuangan"  <?php if($penilaian[0]['aset']=='1') :?>checked="checked"<?php endif ;?>  name="checkbox_lolos_keuangan<?=$row_klas['id_sub_klasifikasi'];?>"  />
																			<span></span>
																		</label>
																	</span>
																</td>
																<td>
																	<div class="row">


																			<div class="input-group file-caption-main">
																				<span class="file-caption-icon"></span>
																				<textarea id="comment_resume_keuangan" name="comment_resume_keuangan" class="form-control form-control-solid" rows="5" placeholder="Catatan resuma..."><?php if(!empty($ceklis)){echo $neraca_asesor[0]['comment_resume'];}?></textarea>

																			</div>

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
									<div class="tab-pane fade" id="pjbu" role="tabpanel" aria-labelledby="home-tab-1">

											<div class="col-md-12">
												<div class="panel panel-flat panel-collapsed">
													<div class="panel-heading">
														<h5 class="panel-title">PJBU</h5>
														<div class="heading-elements">

																		</div>
													</div>
														<div class="panel-body" >
															<?php if(!empty($pjbu)) :?>
																<?php foreach ($pjbu as $row_pjbu) :?>
																	<?php if($row_pjbu['sub_klasifikasi']==$sub_klasifikasi) :?>
															<div class="row">
																<div class="col-md-3">
																	<div class="content-group-lg">
																		<h6 class="text-semibold">#1</h6>
																		<p class="content-group">Foto</p>
																	</div>
																</div>


																<div class="col-md-2">
																	<br>
																	<a href="<?=$row_pjbu['foto'] ;?>" target="_blank" type="button" name="btn_cek_13"  style="float: right" class="open-delete btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
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
																<th>Checklist</th>
																<th>Comment</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td>Nama</td>
																<td><span class="text-dark"><?php echo $row_pjbu['nama'] ;?></span></td>
																<td>
																	<font class="text-semibold" style="font-size: 10px;">Tidak / Ok</font>
																<span class="switch switch-outline switch-icon switch-primary">

																	<label>

																		<input type="checkbox"  onclick="javascript:check_tk(this)" <?php if(!empty($pjbu_asesor)):?> <?php if($pjbu_asesor[0]['checklist']=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_pjbu_1" value="1"  name="checkbox_pjbu_1" />
																		<span></span>
																	</label>
																</span>
															</td>
															<td>
																<input type="text" name="comment_pjbu_1" id="comment_pjbu_1"  <?php if(!empty($pjbu_asesor)):?> value="<?=$pjbu_asesor[0]['comment'];?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">

															</td>
															</tr>


															<tr>
																<td>NIK</td>
																<td><span class="text-dark"><?php echo $row_pjbu['nik'] ;?></span></td>
																<td>
																	<font class="text-semibold" style="font-size: 10px;">Tidak / Ok</font>
																<span class="switch switch-outline switch-icon switch-primary">

																	<label>

																		<input type="checkbox"  onclick="javascript:check_tk(this)" <?php if(!empty($pjbu_asesor)):?> <?php if($pjbu_asesor[1]['checklist']=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_pjbu_2" value="1"  name="checkbox_pjbu_2" />
																		<span></span>
																	</label>
																</span>
															</td>
															<td>
																<input type="text" name="comment_pjbu_2" id="comment_pjbu_2"  <?php if(!empty($pjbu_asesor)):?> value="<?=$pjbu_asesor[1]['comment'];?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">

															</td>
															</tr>
															<tr>
																<td>NPWP</td>
																<td><span class="text-dark"><?php echo $row_pjbu['npwp'] ;?></span></td>
																<td>
																	<font class="text-semibold" style="font-size: 10px;">Tidak / Ok</font>
																<span class="switch switch-outline switch-icon switch-primary">

																	<label>

																		<input type="checkbox"  onclick="javascript:check_tk(this)" <?php if(!empty($pjbu_asesor)):?> <?php if($pjbu_asesor[2]['checklist']=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_pjbu_3" value="1"  name="checkbox_pjbu_3" />
																		<span></span>
																	</label>
																</span>
															</td>
															<td>
																<input type="text" name="comment_pjbu_3" id="comment_pjbu_3"  <?php if(!empty($pjbu_asesor)):?> value="<?=$pjbu_asesor[2]['comment'];?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">

															</td>
															</tr>






														</tbody>
													</table>
												</div>
											</div>
										<?php endif ;?>
										<?php endforeach ;?>

										<?php endif ;?>
										<div class="card card-custom">
											<div class="card-header border-0 bg-primary">
												<div class="card-title">
													<span class="card-icon">
														<i class="flaticon2-chat-1 text-white"></i>
													</span>
													<h3 class="card-label text-white">Resume Penlaian Tenaga Kerja</h3>
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

																<th>Tenaga Kerja</th>
																<th>Comment Resume Tenaga Kerja</th>

															</tr>
														</thead>
														<tbody>
															<?php foreach($klasifikasi as $row_klas) :?>

															<tr>
																<td><br><?=$row_klas['id_sub_klasifikasi'];?></td>
																<td><br><?=$row_klas['kualifikasi'];?></td>



																<td>
																	<font class="text-semibold" style="font-size: 10px;">Tidak/Lolos</font>
																	<span class="switch switch-outline switch-icon switch-dark">

																		<label>
																			<input type="checkbox" value="1" id="checkbox_lolos_tk"  <?php if($pjbu_asesor[0]['checklist_resume']=="1") :?>checked="checked"<?php endif ;?>  name="checkbox_lolos_tk_pjbu"  />
																			<span></span>
																		</label>
																	</span>
																</td>
																<td>
																	<div class="row">


																			<div class="input-group file-caption-main">
																				<span class="file-caption-icon"></span>
																				<textarea id="comment_resume_tk_pjbu" name="comment_resume_tk_pjbu" class="form-control form-control-solid" rows="5" placeholder="Catatan resuma..."><?php if(!empty($ceklis)){echo $pjbu_asesor[0]['comment_resume'];}?></textarea>

																			</div>

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
									<div class="tab-pane fade" id="pjtbu" role="tabpanel" aria-labelledby="home-tab-1">

											<div class="col-md-12">
												<div class="panel panel-flat panel-collapsed">
													<div class="panel-heading">
														<h5 class="panel-title">PJTBU</h5>
														<div class="heading-elements">

																		</div>
													</div>
														<div class="panel-body" >
															<!--#1-->

															<?php foreach ($klasifikasi as $row_klasifikasi) :?>

															<div class="row">
																<div class="col-md-2">
																	<div class="content-group-lg">
																		<h6 class="text-semibold">#</h6>
																		<p class="content-group">Pengecekan SKK PJT Per-sub klasifikasi</p>
																	</div>
																</div>


																<div class="col-md-4">
																	<br>
																	<a onclick="javascript:check_pjt(this)" name="<?= $row_klasifikasi['id_izin'] ;?>" data-toggle="modal" data-target="#modal_pjt" class="btn btn-outline-dark mr-3">
																		<i class="flaticon-file"></i>Check</a>
																</div>





															<!--#4-->


															</div>


													<?php endforeach ;?>



														</div>
												</div>
											</div>
											<hr>


											<?php
												$count=0;
											 foreach($pjtbu_asesor as $row_pjtbux){
												$count+=1;
												for ($i=0; $i < count($pjtbu_asesor); $i++) {
													if($row_pjtbux['id']==$pjtbu_asesor[$i]['id']){
														${"data_pjtbu_".$row_pjtbux['id']}=$row_pjtbux['checklist'];
														${"data_pjtbu_".$row_pjtbux['id']."_comment"}=$row_pjtbux['comment'];
													}
												}
											} ;?>
											<hr>
											<?php if(!empty($pjtbu)) :?>
											<div class="accordion accordion-toggle-arrow" id="accordionExample1">

													<?php foreach ($pjtbu as $row_pjtbu) :?>
														<?php if($row_pjtbu['sub_klasifikasi_pjtbu']==$sub_klasifikasi) :?>

														<?php $counter_pjtbu+=1 ;?>
												<div class="card">
														<div class="card-header">
																<div class="card-title collapsed" data-toggle="collapse" data-target="#data-pjtbu-<?php echo $counter_pjtbu ;?>">
																	<?= $row_pjtbu['sub_klasifikasi'].' - '.$row_pjtbu['nama'] ?>
																</div>
														</div>
														<div id="data-pjtbu-<?php echo $counter_pjtbu ;?>" class="collapse show" data-parent="#accordionExample1">
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
																				<a <?php if($row_pjtbu['skk']!='') :?>href="<?= $row_pjskbu['skk'] ;?>"<?php else :?>href="<?= base_url('not_found') ;?>"<?php endif ;?> target="_blank" type="button" name="btn_cek_11"  style="float: right" class="open-delete btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																			</div>
																			<div class="col-md-2">
																				<div class="content-group-lg">
																					<h6 class="text-semibold">#2</h6>
																					<p class="content-group">File Ijazah</p>
																				</div>
																			</div>


																			<div class="col-md-2">
																				<br>
																				<a <?php if($row_pjtbu['ijazah']!='') :?>href="<?= $row_pjskbu['ijazah'] ;?>"<?php else :?>href="<?= base_url('not_found') ;?>"<?php endif ;?> target="_blank" type="button" name="btn_cek_11"  style="float: right" class="open-delete btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																			</div>
																			<div class="col-md-2">
																			 <div class="content-group-lg">
																				 <h6 class="text-semibold">#3</h6>
																				 <p class="content-group">File SPT</p>
																			 </div>
																		 </div>


																		 <div class="col-md-2">
																			 <br>
																			 <a <?php if($row_pjtbu['spt']!='') :?>href="<?= $row_pjskbu['spt'] ;?>"<?php else :?>href="<?= base_url('not_found') ;?>"<?php endif ;?> target="_blank" type="button" name="btn_cek_11"  style="float: right" class="open-delete btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																		 </div>


																		</div>
																		<table class="table table-lg">
																			<thead>
																				<tr>
																					<th>Data</th>
																					<th>Description</th>
																					<th>Checklist</th>
																					<th>Comment</th>
																				</tr>
																			</thead>
																			<tbody>
																				<tr>
																					<td>Nama</td>
																					<td><span class="text-dark"><?php echo $row_pjtbu['nama'] ;?></span></td>
																					<td>
																						<font class="text-semibold" style="font-size: 10px;">Tidak / Sesuai</font>
																					<span class="switch switch-outline switch-icon switch-primary">

																						<label>

																							<input type="checkbox" onclick="javascript:check_tk(this)" <?php if(!empty($pjtbu_asesor)):?> <?php if($data_pjtbu_4=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_pjtbu_4" value="1"  name="checkbox_pjtbu_4" />
																							<span></span>
																						</label>
																					</span>
																				</td>
																				<td>
																					<input type="text" name="comment_pjtbu_4" id="comment_pjtbu_4"  <?php if(!empty($pjtbu_asesor)):?> value="<?=$data_pjtbu_4_comment;?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">

																				</td>
																				</tr>
																				<tr>
																					<td>Jenjang SKK</td>
																					<td><span class="text-dark"><?php echo $row_pjtbu['jenjang_skk'] ;?></span></td>
																					<td>
																						<font class="text-semibold" style="font-size: 10px;">Tidak / Sesuai</font>
																					<span class="switch switch-outline switch-icon switch-primary">

																						<label>

																							<input type="checkbox" onclick="javascript:check_tk(this)" <?php if(!empty($pjtbu_asesor)):?> <?php if($data_pjtbu_1=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_pjtbu_1" value="1"  name="checkbox_pjtbu_1" />
																							<span></span>
																						</label>
																					</span>
																				</td>
																				<td>
																					<input type="text" name="comment_pjtbu_1" id="comment_pjtbu_1"  <?php if(!empty($pjtbu_asesor)):?> value="<?=$data_pjtbu_1_comment;?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">

																				</td>
																				</tr>

																				<tr>
																					<td>Klasifikasi SKK<br>
																					<span class="text-danger"><?php echo $row_pjtbu['klasifikasi_skk'] ;?></span></td>
																					<td>

																							<br>
																							<div class="input-group file-caption-main">
																								<span class="file-caption-icon"></span>
																								<!-- <input type="text" name="klasifikasi_asesor_pjtbu" <?php if(!empty($pjtbu_asesor)):?>value="<?=$pjtbu_asesor[0]['klasifikasi_skk'];?>"<?php endif ;?>  class="form-control form-control-solid"  placeholder="Masukan Klasifikasi..."> -->
																								<select name="klasifikasi_asesor_pjtbu" onchange="getval(this)" id="klasifikasi" class="form-control">
																										<option value="">Pilih Klasifikasi</option>
																										<?php foreach ($lsp_subklasifikasi as $row_klasifikasi) :?>
																											<option <?php if($pjtbu_asesor[0]['klasifikasi_skk']==$row_klasifikasi['id_klasifikasi']):?> selected <?php endif ;?> value="<?php echo $row_klasifikasi['id_klasifikasi'] ;?>"><?php echo $row_klasifikasi['id_klasifikasi'] ;?></option>
																										<?php endforeach ;?>
																								</select>
																							</div>
																							<br>
																					</td>
																					<td>
																						<font class="text-semibold" style="font-size: 10px;">Tidak / Sesuai</font>
																					<span class="switch switch-outline switch-icon switch-primary">

																						<label>

																							<input type="checkbox" onclick="javascript:check_tk(this)" <?php if(!empty($pjtbu_asesor)):?> <?php if($data_pjtbu_3=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_pjtbu_3" value="1"  name="checkbox_pjtbu_3" />
																							<span></span>
																						</label>
																					</span>
																				</td>
																				<td>
																					<input type="text" name="comment_pjtbu_3" id="comment_pjtbu_3"  <?php if(!empty($pjtbu_asesor)):?> value="<?=$data_pjtbu_3_comment;?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">

																				</td>
																				</tr>
																				<tr>
																					<td>Sub Klasifikasi SKK<br>
																					<span class="text-danger"><?php echo $row_pjtbu['sub_klasifikasi'] ;?></span></td>
																					<td>

																							<br>
																							<div class="input-group file-caption-main">
																								<span class="file-caption-icon"></span>
																								<!-- <input type="text" name="sub_klasifikasi_asesor_pjtbu"<?php if(!empty($pjtbu_asesor)):?>value="<?=$pjtbu_asesor[0]['sub_klasifikasi_skk'];?>"<?php endif ;?>  class="form-control form-control-solid"  placeholder="Masukan Sub Klasifikasi..."> -->
																								<select name="sub_klasifikasi_asesor_pjtbu" id="subklasifikasi" class="form-control">
																										<option value="">Pilih Klasifikasi</option>
																										<?php foreach ($lsp_subklasifikasi_all as $row_klasifikasi) :?>
																											<option <?php if($pjtbu_asesor[0]['sub_klasifikasi_skk']==$row_klasifikasi['subklasifikasi']):?> selected <?php endif ;?> value="<?php echo $row_klasifikasi['subklasifikasi'] ;?>"><?php echo $row_klasifikasi['subklasifikasi'] ;?></option>
																										<?php endforeach ;?>
																								</select>
																							</div>
																							<br>

																					</td>

																					<td>
																						<font class="text-semibold" style="font-size: 10px;">Tidak / Sesuai</font>
																					<span class="switch switch-outline switch-icon switch-primary">

																						<label>

																							<input type="checkbox" onclick="javascript:check_tk(this)" <?php if(!empty($pjtbu_asesor)):?> <?php if($data_pjtbu_2=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_pjtbu_2" value="1"  name="checkbox_pjtbu_2" />
																							<span></span>
																						</label>
																					</span>
																				</td>
																				<td>
																					<input type="text" name="comment_pjtbu_2" id="comment_pjtbu_2"  <?php if(!empty($pjtbu_asesor)):?> value="<?=$data_pjtbu_2_comment;?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">

																				</td>
																				</tr>
																				<tr>
																					<td>NIK</td>
																					<td><span class="text-dark"><?php echo $row_pjtbu['nik'] ;?></span></td>
																					<td>
																						<font class="text-semibold" style="font-size: 10px;">Tidak / Sesuai</font>
																					<span class="switch switch-outline switch-icon switch-primary">

																						<label>

																							<input type="checkbox" onclick="javascript:check_tk(this)" <?php if(!empty($pjtbu_asesor)):?> <?php if($data_pjtbu_5=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_pjtbu_5" value="1"  name="checkbox_pjtbu_5" />
																							<span></span>
																						</label>
																					</span>
																				</td>
																				<td>
																					<input type="text" name="comment_pjtbu_5" id="comment_pjtbu_5"  <?php if(!empty($pjtbu_asesor)):?> value="<?=$data_pjtbu_5_comment;?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">

																				</td>
																				</tr>
																				<tr>
																					<td>Noreg skk</td>
																					<td><span class="text-dark"><?php echo $row_pjtbu['noreg_skk'] ?></span></td>
																					<td>
																						<font class="text-semibold" style="font-size: 10px;">Tidak / Sesuai</font>
																					<span class="switch switch-outline switch-icon switch-primary">

																						<label>

																							<input type="checkbox" onclick="javascript:check_tk(this)" <?php if(!empty($pjtbu_asesor)):?> <?php if($data_pjtbu_6=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_pjtbu_6" value="1"  name="checkbox_pjtbu_6" />
																							<span></span>
																						</label>
																					</span>
																				</td>
																				<td>
																					<input type="text" name="comment_pjtbu_6" id="comment_pjtbu_6"  <?php if(!empty($pjtbu_asesor)):?> value="<?=$data_pjtbu_6_comment;?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">

																				</td>
																				</tr>
																				<tr>
																					<td>Tanggal Terbit SKK</td>
																					<td><span class="text-dark"><?php echo $row_pjtbu['tanggal_terbit_skk'] ?></span></td>
																					<td>
																						<font class="text-semibold" style="font-size: 10px;">Tidak / Sesuai</font>
																					<span class="switch switch-outline switch-icon switch-primary">

																						<label>

																							<input type="checkbox" onclick="javascript:check_tk(this)" <?php if(!empty($pjtbu_asesor)):?> <?php if($data_pjtbu_7=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_pjtbu_7" value="1"  name="checkbox_pjtbu_7" />
																							<span></span>
																						</label>
																					</span>
																				</td>
																				<td>
																					<input type="text" name="comment_pjtbu_7" id="comment_pjtbu_7"  <?php if(!empty($pjtbu_asesor)):?> value="<?=$data_pjtbu_7_comment;?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">

																				</td>
																				</tr>
																				<tr>
																					<td>NPWP</td>
																					<td><span class="text-dark"><?php echo $row_pjtbu['npwp'] ;?></span></td>
																					<td>
																						<font class="text-semibold" style="font-size: 10px;">Tidak / Sesuai</font>
																					<span class="switch switch-outline switch-icon switch-primary">

																						<label>

																							<input type="checkbox" onclick="javascript:check_tk(this)" <?php if(!empty($pjtbu_asesor)):?> <?php if($data_pjtbu_8=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_pjtbu_8" value="1"  name="checkbox_pjtbu_8" />
																							<span></span>
																						</label>
																					</span>
																				</td>
																				<td>
																					<input type="text" name="comment_pjtbu_8" id="comment_pjtbu_8"  <?php if(!empty($pjtbu_asesor)):?> value="<?=$data_pjtbu_8_comment;?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">

																				</td>
																				</tr>
                                        <tr>
																					<td>Klasifikasi ACPE AA</td>
																					<td><span class="text-dark"><?php echo $row_pjtbu['klasifikasi_acpe_aa'] ?></span></td>
                                          <td>
																						<font class="text-semibold" style="font-size: 10px;">Tidak / Sesuai</font>
																					<span class="switch switch-outline switch-icon switch-primary">

																						<label>

																							<input type="checkbox" onclick="javascript:check_tk(this)" checked="checked" <?php if(!empty($pjtbu_asesor)):?> <?php if($data_pjtbu_9=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_pjtbu_9" value="1"  name="checkbox_pjtbu_9" />
																							<span></span>
																						</label>
																					</span>
																				</td>
																				<td>
																					<input type="text" name="comment_pjtbu_9" id="comment_pjtbu_9"  <?php if(!empty($pjtbu_asesor)):?> value="<?=$data_pjtbu_9_comment;?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">

																				</td>
                                        </tr>
																				<tr>
																					<td>Noreg ACPE AA</td>
																					<td><span class="text-dark"><?php echo $row_pjtbu['nomor_registrasi_acpe_aa'] ?></span></td>
                                          <td>
																						<font class="text-semibold" style="font-size: 10px;">Tidak / Sesuai</font>
																					<span class="switch switch-outline switch-icon switch-primary">

																						<label>

																							<input type="checkbox" onclick="javascript:check_tk(this)" checked="checked" <?php if(!empty($pjtbu_asesor)):?> <?php if($data_pjtbu_10=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_pjtbu_10" value="1"  name="checkbox_pjtbu_10" />
																							<span></span>
																						</label>
																					</span>
																				</td>
																				<td>
																					<input type="text" name="comment_pjtbu_10" id="comment_pjtbu_10"  <?php if(!empty($pjtbu_asesor)):?> value="<?=$data_pjtbu_10_comment;?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">

																				</td>
                                        </tr>

																				<tr>
																					<td>Kualifikasi SKK</td>
																					<td><span class="text-dark"><?php echo $row_pjtbu['kualifikasi_skk'] ?></span></td>
																				</tr>

																			</tbody>
																		</table>
																	</div>
																</div>
														</div>
												</div>
												<hr>
													<?php endif ;?>
											<?php endforeach;?>
											</div>



										<?php endif ;?>
										<div class="card card-custom">
											<div class="card-header border-0 bg-primary">
												<div class="card-title">
													<span class="card-icon">
														<i class="flaticon2-chat-1 text-white"></i>
													</span>
													<h3 class="card-label text-white">Resume Penlaian Tenaga Kerja</h3>
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

																<th>Tenaga Kerja</th>
																<th>Comment Resume Tenaga Kerja</th>

															</tr>
														</thead>
														<tbody>
															<?php foreach($klasifikasi as $row_klas) :?>

															<tr>
																<td><br><?=$row_klas['id_sub_klasifikasi'];?></td>
																<td><br><?=$row_klas['kualifikasi'];?></td>



																<td>
																	<font class="text-semibold" style="font-size: 10px;">Tidak/Lolos</font>
																	<span class="switch switch-outline switch-icon switch-dark">

																		<label>
																			<input type="checkbox" value="1" id="checkbox_lolos_tk"  <?php if($pjtbu_asesor[0]['checklist_resume']=="1") :?>checked="checked"<?php endif ;?>  name="checkbox_lolos_tk_pjtbu"  />
																			<span></span>
																		</label>
																	</span>
																</td>
																<td>
																	<div class="row">


																			<div class="input-group file-caption-main">
																				<span class="file-caption-icon"></span>
																				<textarea id="comment_resume_tk_pjtbu" name="comment_resume_tk_pjtbu" class="form-control form-control-solid" rows="5" placeholder="Catatan resuma..."><?php if(!empty($ceklis)){echo $pjtbu_asesor[0]['comment_resume'];}?></textarea>

																			</div>

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
									<div class="tab-pane fade" id="pjskbu" role="tabpanel" aria-labelledby="profile-tab-1">

											<div class="col-md-12">
												<div class="panel panel-flat panel-collapsed">
													<div class="panel-heading">
														<h5 class="panel-title">PJSKBU</h5>
														<div class="heading-elements">

																		</div>
													</div>
														<div class="panel-body" >
															<!--#1-->
															<?php foreach ($klasifikasi as $row_klasifikasi) :?>


															<div class="row">

																<div class="col-md-2">
																	<div class="content-group-lg">
																		<h6 class="text-semibold">#</h6>
																		<p class="content-group">Pengecekan SKK PJSK Per-sub klasifikasi</p>
																	</div>
																</div>


																<div class="col-md-4">
																	<br>
																	<a onclick="javascript:check_pjsk(this)" name="<?= $row_klasifikasi['id_izin'] ;?>" data-toggle="modal" data-target="#modal_pjsk" class="btn btn-outline-dark mr-3">
																		<i class="flaticon-file"></i>Check</a>
																</div>




															<!--#4-->


															</div>


															<?php endforeach ;?>




														</div>
												</div>
											</div>
											<hr>


											<?php
												$count=0;
											 foreach($pjskbu_asesor as $row_pjskbux){
												$count+=1;
												for ($i=0; $i < count($pjskbu_asesor); $i++) {
													if($row_pjskbux['id']==$pjskbu_asesor[$i]['id'] AND $row_pjskbux['sub_klasifikasi']==$pjskbu_asesor[$i]['sub_klasifikasi']){
														${"data_pjskbu_".$row_pjskbux['id']."_".$row_pjskbux['sub_klasifikasi']}=$row_pjskbux['checklist'];
														${"data_pjskbu_".$row_pjskbux['id']."_comment"}=$row_pjskbux['comment'];

													}
												}
											} ;?>
											<hr>
											<?php if(!empty($pjskbu)) :?>
											<div class="accordion accordion-toggle-arrow" id="accordionExample1">

													<?php foreach ($pjskbu as $row_pjskbu) :?>
														<?php $counter_pjskbu+=1 ;?>
												<div class="card">
														<div class="card-header">
																<div class="card-title collapsed" data-toggle="collapse" data-target="#data-pjskbu-<?php echo $counter_pjskbu ;?>">
																	<?= $row_pjskbu['id_sub_klasifikasi_pjsk'].' - '.$row_pjskbu['nama'] ?>
																</div>
														</div>
														<div id="data-pjskbu-<?php echo $counter_pjskbu ;?>" class="collapse show" data-parent="#accordionExample1">
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
																				<a <?php if($row_pjskbu['skk']!='') :?>href="<?= $row_pjskbu['skk'] ;?>"<?php else :?>href="<?= base_url('not_found') ;?>"<?php endif ;?> target="_blank" type="button" name="btn_cek_11"  style="float: right" class="open-delete btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																			</div>
																			<div class="col-md-2">
																				<div class="content-group-lg">
																					<h6 class="text-semibold">#2</h6>
																					<p class="content-group">File Ijazah</p>
																				</div>
																			</div>


																			<div class="col-md-2">
																				<br>
																				<a <?php if($row_pjskbu['ijazah']!='') :?>href="<?= $row_pjskbu['ijazah'] ;?>"<?php else :?>href="<?= base_url('not_found') ;?>"<?php endif ;?> target="_blank" type="button" name="btn_cek_11"  style="float: right" class="open-delete btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																			</div>
																			<div class="col-md-2">
																				<div class="content-group-lg">
																					<h6 class="text-semibold">#3</h6>
																					<p class="content-group">File SPT</p>
																				</div>
																			</div>


																			<div class="col-md-2">
																				<br>
																				<a <?php if($row_pjskbu['spt']!='') :?>href="<?= $row_pjskbu['spt'] ;?>"<?php else :?>href="<?= base_url('not_found') ;?>"<?php endif ;?> target="_blank" type="button" name="btn_cek_11"  style="float: right" class="open-delete btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																			</div>

																		</div>
																		<table class="table table-lg">
																			<thead>
																				<tr>
																					<th>Data</th>
																					<th>Description</th>
																					<th>Checklist</th>
																					<th>Comment</th>
																				</tr>
																			</thead>
																			<tbody>
																				<tr>
																					<td>Nama</td>
																					<td><span class="text-dark"><?php echo $row_pjskbu['nama'] ?></span></td>
																					<td>
																						<font class="text-semibold" style="font-size: 10px;">Tidak / Sesuai</font>
																					<span class="switch switch-outline switch-icon switch-primary">

																						<label>

																							<input type="checkbox" onclick="javascript:check_tk(this)" <?php if(!empty($pjskbu_asesor)):?> <?php if(${"data_pjskbu_4_".$row_pjskbu['id_sub_klasifikasi_pjsk']}=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_pjskbu_4" value="1"  name="checkbox_pjskbu_4" />
																							<span></span>
																						</label>
																					</span>
																				</td>
																				<td>
																					<input type="text" name="comment_pjskbu_4" id="comment_pjskbu_4"  <?php if(!empty($pjskbu_asesor)):?> value="<?=$data_pjskbu_4_comment;?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">

																				</td>
																				</tr>
																				<tr>
																					<td>Jenjang SKK</td>
																					<td><span class="text-dark"><?php echo $row_pjskbu['jenjang_skk'] ?></span></td>
																					<td>
																						<font class="text-semibold"  style="font-size: 10px;">Tidak / Sesuai</font>
																					<span class="switch switch-outline switch-icon switch-primary">

																						<label>

																							<input type="checkbox" onclick="javascript:check_tk(this)" <?php if(!empty($pjskbu_asesor)):?> <?php if(${"data_pjskbu_1_".$row_pjskbu['id_sub_klasifikasi_pjsk']}=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_pjskbu_1" value="1"  name="checkbox_pjskbu_1" />
																							<span></span>
																						</label>
																					</span>
																				</td>
																				<td>
																					<input type="text" name="comment_pjskbu_1" id="comment_pjskbu_1"  <?php if(!empty($pjskbu_asesor)):?> value="<?=$data_pjskbu_1_comment;?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">

																				</td>
																				</tr>
																				<tr>
																					<td>Klasifikasi SKK<br><span class="text-dark"><?php echo $row_pjskbu['klasifikasi']; ?></span></td>
																					<td>

																							<br>
																							<div class="input-group file-caption-main">
																								<span class="file-caption-icon"></span>
																								<!-- <input type="text" name="klasifikasi_asesor_pjskbu" <?php if(!empty($pjskbu_asesor)):?>value="<?=$pjskbu_asesor[0]['klasifikasi_skk'];?>"<?php endif ;?> class="form-control form-control-solid"  placeholder="Masukan Klasifikasi..."> -->
																								<select name="klasifikasi_asesor_pjskbu" onchange="getval2(this)" id="klasifikasi" class="form-control">
																										<option value="">Pilih Klasifikasi</option>
																										<?php foreach ($lsp_subklasifikasi as $row_klasifikasi) :?>
																											<option <?php if($pjskbu_asesor[0]['klasifikasi_skk']==$row_klasifikasi['id_klasifikasi']):?> selected <?php endif ;?> value="<?php echo $row_klasifikasi['id_klasifikasi'] ;?>"><?php echo $row_klasifikasi['id_klasifikasi'] ;?></option>
																										<?php endforeach ;?>
																								</select>
																							</div>
																							<br>
																					</td>
																					<td>
																						<font class="text-semibold" style="font-size: 10px;">Tidak / Sesuai</font>
																					<span class="switch switch-outline switch-icon switch-primary">

																						<label>

																							<input type="checkbox" onclick="javascript:check_tk(this)" <?php if(!empty($pjskbu_asesor)):?> <?php if(${"data_pjskbu_2_".$row_pjskbu['id_sub_klasifikasi_pjsk']}=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_pjskbu_2" value="1"  name="checkbox_pjskbu_2" />
																							<span></span>
																						</label>
																					</span>
																				</td>
																					<td>
																				<input type="text" name="comment_pjskbu_2" id="comment_pjskbu_2"  <?php if(!empty($pjskbu_asesor)):?> value="<?=$data_pjskbu_2_comment;?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">
																			</td>
																				</tr>
																				<tr>
																					<td>Sub Klasifikasi SKK<br><span class="text-danger"><?php echo $row_pjskbu['sub_klasifikasi'] ?></span></td>
																					<td>
																						<br>
																						<div class="input-group file-caption-main">
																							<span class="file-caption-icon"></span>
																							<!-- <input type="text" name="sub_klasifikasi_asesor_pjskbu" <?php if(!empty($pjskbu_asesor)):?>value="<?=$pjskbu_asesor[0]['sub_klasifikasi_skk'];?>"<?php endif ;?> class="form-control form-control-solid"  placeholder="Masukan Sub Klasifikasi..."> -->
																							<select name="sub_klasifikasi_asesor_pjskbu" id="subklasifikasi2" class="form-control">
																									<option value="">Pilih Klasifikasi</option>
																									<?php foreach ($lsp_subklasifikasi_all as $row_klasifikasi) :?>
																										<option <?php if($pjskbu_asesor[0]['sub_klasifikasi_skk']==$row_klasifikasi['subklasifikasi']):?> selected <?php endif ;?> value="<?php echo $row_klasifikasi['subklasifikasi'] ;?>"><?php echo $row_klasifikasi['subklasifikasi'] ;?></option>
																									<?php endforeach ;?>
																							</select>
																						</div>
																						<br>
																					</td>
																					<td>
																						<font class="text-semibold" style="font-size: 10px;">Tidak / Sesuai</font>
																					<span class="switch switch-outline switch-icon switch-primary">

																						<label>

																							<input type="checkbox" onclick="javascript:check_tk(this)" <?php if(!empty($pjskbu_asesor)):?> <?php if(${"data_pjskbu_3_".$row_pjskbu['id_sub_klasifikasi_pjsk']}=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_pjskbu_3" value="1"  name="checkbox_pjskbu_3" />
																							<span></span>
																						</label>
																					</span>
																				</td>
																					<td>
																				<input type="text" name="comment_pjskbu_3" id="comment_pjskbu_3"  <?php if(!empty($pjskbu_asesor)):?> value="<?=$data_pjskbu_3_comment;?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">
																			</td>
																				</tr>








																				<tr>
																					<td>Tanggal Terbit SKK</td>
																					<td><span class="text-dark"><?php echo $row_pjskbu['tanggal_terbit_skk'] ?></span></td>

																				<td>
																					<font class="text-semibold" style="font-size: 10px;">Tidak / Sesuai</font>
																				<span class="switch switch-outline switch-icon switch-primary">

																					<label>

																						<input type="checkbox" onclick="javascript:check_tk(this)" <?php if(!empty($pjskbu_asesor)):?> <?php if(${"data_pjskbu_5_".$row_pjskbu['id_sub_klasifikasi_pjsk']}=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_pjskbu_5" value="1"  name="checkbox_pjskbu_5" />
																						<span></span>
																					</label>
																				</span>
																			</td>
																				<td>
																			<input type="text" name="comment_pjskbu_5" id="comment_pjskbu_5"  <?php if(!empty($pjskbu_asesor)):?> value="<?=$data_pjskbu_5_comment;?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">
																		</td>
																		</tr>
																				<tr>
																					<td>NIK</td>
																					<td><span class="text-dark"><?php echo $row_pjskbu['nik'] ?></span></td>
																					<td>
																						<font class="text-semibold" style="font-size: 10px;">Tidak / Sesuai</font>
																					<span class="switch switch-outline switch-icon switch-primary">

																						<label>

																							<input type="checkbox" onclick="javascript:check_tk(this)" <?php if(!empty($pjskbu_asesor)):?> <?php if(${"data_pjskbu_6_".$row_pjskbu['id_sub_klasifikasi_pjsk']}=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_pjskbu_6" value="1"  name="checkbox_pjskbu_6" />
																							<span></span>
																						</label>
																					</span>
																				</td>
																					<td>
																				<input type="text" name="comment_pjskbu_6" id="comment_pjskbu_6"  <?php if(!empty($pjskbu_asesor)):?> value="<?=$data_pjskbu_6_comment;?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">
																			</td>
																				</tr>
																				<tr>
																					<td>Noreg</td>
																					<td><span class="text-dark"><?php echo $row_pjskbu['noreg_skk'] ?></span></td>
																					<td>
																						<font class="text-semibold" style="font-size: 10px;">Tidak / Sesuai</font>
																					<span class="switch switch-outline switch-icon switch-primary">

																						<label>

																							<input type="checkbox" onclick="javascript:check_tk(this)" <?php if(!empty($pjskbu_asesor)):?> <?php if(${"data_pjskbu_7_".$row_pjskbu['id_sub_klasifikasi_pjsk']}=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_pjskbu_7" value="1"  name="checkbox_pjskbu_7" />
																							<span></span>
																						</label>
																					</span>
																				</td>
																					<td>
																				<input type="text" name="comment_pjskbu_7" id="comment_pjskbu_7"  <?php if(!empty($pjskbu_asesor)):?> value="<?=$data_pjskbu_7_comment;?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">
																			</td>
																				</tr>
																				<tr>
																					<td>NPWP</td>
																					<td><span class="text-dark"><?php echo $row_pjskbu['npwp'] ?></span></td>
																					<td>
																						<font class="text-semibold" style="font-size: 10px;">Tidak / Sesuai</font>
																					<span class="switch switch-outline switch-icon switch-primary">

																						<label>

																							<input type="checkbox" onclick="javascript:check_tk(this)" <?php if(!empty($pjskbu_asesor)):?> <?php if(${"data_pjskbu_8_".$row_pjskbu['id_sub_klasifikasi_pjsk']}=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_pjskbu_8" value="1"  name="checkbox_pjskbu_8" />
																							<span></span>
																						</label>
																					</span>
																				</td>
																					<td>
																				<input type="text" name="comment_pjskbu_8" id="comment_pjskbu_8"  <?php if(!empty($pjskbu_asesor)):?> value="<?=$data_pjskbu_8_comment;?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">
																			</td>
																				</tr>
                                        <tr>
                                          <td>Klasifikasi ACPE AA</td>
                                          <td><span class="text-dark"><?php echo $row_pjskbu['klasifikasi_acpe_aa'] ?></span></td>
                                          <td>
                                            <font class="text-semibold" style="font-size: 10px;">Tidak / Sesuai</font>
                                          <span class="switch switch-outline switch-icon switch-primary">

                                            <label>

                                              <input type="checkbox" onclick="javascript:check_tk(this)" checked="checked" <?php if(!empty($pjtbu_asesor)):?> <?php if(${"data_pjskbu_9_".$row_pjskbu['id_sub_klasifikasi_pjsk']}=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_pjtbu_9" value="1"  name="checkbox_pjtbu_9" />
                                              <span></span>
                                            </label>
                                          </span>
                                        </td>
                                        <td>
                                          <input type="text" name="comment_pjskbu_9" id="comment_pjskbu_9"  <?php if(!empty($pjtbu_asesor)):?> value="<?=$data_pjskbu_9_comment;?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">

                                        </td>
                                        </tr>
                                        <tr>
                                          <td>Noreg ACPE AA</td>
                                          <td><span class="text-dark"><?php echo $row_pjskbu['nomor_registrasi_acpe_aa'] ?></span></td>
                                          <td>
                                            <font class="text-semibold" style="font-size: 10px;">Tidak / Sesuai</font>
                                          <span class="switch switch-outline switch-icon switch-primary">

                                            <label>

                                              <input type="checkbox" onclick="javascript:check_tk(this)" checked="checked" <?php if(!empty($pjtbu_asesor)):?> <?php if(${"data_pjskbu_10_".$row_pjskbu['id_sub_klasifikasi_pjsk']}=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_pjtbu_10" value="1"  name="checkbox_pjtbu_10" />
                                              <span></span>
                                            </label>
                                          </span>
                                        </td>
                                        <td>
                                          <input type="text" name="comment_pjskbu_10" id="comment_pjskbu_10"  <?php if(!empty($pjtbu_asesor)):?> value="<?=$data_pjskbu_10_comment;?>" <?php endif ;?>  class="form-control form-control-solid"  placeholder="Comment...">

                                        </td>
                                        </tr>
																				<tr>
																					<td>Kualifikasi SKK</td>
																					<td><span class="text-dark"><?php echo $row_pjskbu['kualifikasi_skk'] ?></span></td>
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
										<div class="card card-custom">
											<div class="card-header border-0 bg-primary">
												<div class="card-title">
													<span class="card-icon">
														<i class="flaticon2-chat-1 text-white"></i>
													</span>
													<h3 class="card-label text-white">Resume Penlaian Tenaga Kerja</h3>
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

																<th>Tenaga Kerja</th>
																<th>Comment Resume Tenaga Kerja</th>

															</tr>
														</thead>
														<tbody>
															<?php foreach($klasifikasi as $row_klas) :?>

															<tr>
																<td><br><?=$row_klas['id_sub_klasifikasi'];?></td>
																<td><br><?=$row_klas['kualifikasi'];?></td>



																<td>
																	<font class="text-semibold" style="font-size: 10px;">Tidak/Lolos</font>
																	<span class="switch switch-outline switch-icon switch-dark">

																		<label>
																			<input type="checkbox" value="1" id="checkbox_lolos_tk"  <?php if($pjskbu_asesor[0]['checklist_resume']=="1") :?>checked="checked"<?php endif ;?>  name="checkbox_lolos_tk_pjskbu"  />
																			<span></span>
																		</label>
																	</span>
																</td>
																<td>
																	<div class="row">


																			<div class="input-group file-caption-main">
																				<span class="file-caption-icon"></span>
																				<textarea id="comment_resume_tk" name="comment_resume_tk_pjskbu" class="form-control form-control-solid" rows="5" placeholder="Catatan resuma..."><?php if(!empty($ceklis)){echo $pjskbu_asesor[0]['comment_resume'];}?></textarea>

																			</div>

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

									<div class="tab-pane fade show active" id="klasifikasi_kualifikasi" role="tabpanel" aria-labelledby="home-tab-1">
										<?php if(!empty($klasifikasi)) :?>
											<div class="col-md-12">
												<!-- Pemegang Saham toggles -->
												<div class="panel panel-flat panel-collapsed">
													<div class="panel-heading">
														<h5 class="panel-title">Data Klasifikasi & Kualifikasi</h5>
														<div class="heading-elements">

																		</div>
													</div>
													<div class="panel-body" >



													</div>
												</div>
											</div>
											<br>
											<hr>
											<br>
											<div class="accordion accordion-toggle-arrow" id="accordionExample1">

													<?php foreach ($klasifikasi as $row_klasifikasi) :?>
														<?php $counter_klasifikasi+=1 ;?>
												<div class="card">
														<div class="card-header">
																<div class="card-title collapsed" data-toggle="collapse" data-target="#data-klasifikasi-<?php echo $counter_klasifikasi ;?>">
																	<?php echo $row_klasifikasi['id_sub_klasifikasi'].' - '.$row_klasifikasi['deskripsi_subklasifikasi'] ;?>
																</div>
														</div>
														<div id="data-klasifikasi-<?php echo $counter_klasifikasi ;?>" class="collapse show" data-parent="#accordionExample1">

																<div class="card-body">



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
																					<td><span class="text-dark"><?php echo $row_klasifikasi['asosiasi'].' - '.$row_klasifikasi['nama_asosiasi'] ;?></span></td>
																				</tr>

																				<tr>
																					<td>Sub Klasifikasi</td>
																					<td><span class="text-dark"><?php echo $row_klasifikasi['id_sub_klasifikasi'] ;?></span></td>
																				</tr>
																				<tr>
																					<td>Kualifikasi</td>
																					<td><span class="text-dark"><?php echo $row_klasifikasi['kualifikasi'] ;?></span></td>
																				</tr>
																				<tr>
																					<td>Permohonan</td>
																					<td><span class="text-dark">Baru></span></td>
																				</tr>

																				<tr>
																					<td>Nomor KBLI</td>
																					<td><span class="text-dark"><?php echo $row_klasifikasi['nomor_kbli'] ;?></span></td>
																				</tr>
																				<!-- <tr>
																					<td>Jenis Usaha</td>
																					<td><span class="text-dark"><?php echo $row_klasifikasi['nama_jenis_usaha'] ;?></span></td>
																				</tr> -->
																				<tr>
																					<td>Sifat Badan Usaha</td>
																					<td><span class="text-dark"><?php echo $row_klasifikasi['nama_sifat'] ;?></span></td>
																				</tr>
																				<tr>
																					<td>User Email</td>
																					<td><span class="text-dark"><?php echo $row_klasifikasi['user_email'] ;?></span></td>
																				</tr>
																				<tr>
																					<td>User HP</td>
																					<td><span class="text-dark"><?php echo $row_klasifikasi['user_hp'] ;?></span></td>
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
									<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

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


																<h5 class="modal-title" id="exampleModalLabel">Pengecekan PJT & PJSK Sudah Terpakai<br><span class="text-danger">Seluruh Tenaga Kerja Tidak Boleh terdaftar di BUJK lain jika ingin lolos tinjauan permohonan</span></h5>
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
																		<th>NIK PJT</th>
																		<th>Nama BUJK Terdaftar</th>

																		<th>Status</th>
																	</tr>
																</thead>
																<tbody>

																	<tr>
																		<td><?=$data_check['data_pjt'][0]['nama_tk']?></td>
																		<td><span class="text-dark"><?=$data_check['data_pjt'][0]['nik_tk']?></span></td>

																		<td><span class="text-dark"><?=$data_check['data_pjt'][0]['nama_bujk']?></span></td>
																		<?php if($data_check['data_pjt'][0]['status']=='FALSE') :?>
																			<td><span class="label label-lg label-danger label-pill label-inline mr-2">Terdaftar Di BUJK Lain</span>
																			<!-- <a  onclick="javascript:kembalikan_permohonan(this)" name="<?= $nib_dec ;?>" id="<?=$tgl_dec;?>" class="btn btn-outline-danger btn-sm mr-3">
																				<i class="la la-trash"></i>Kembalikan Berkas</a></td> -->
																		<?php else :?>
																			<td><span class="label label-lg label-info label-pill label-inline mr-2">Memenuhi</span></td>

																		<?php endif ;?>
																	</tr>
																</div>
																	<hr>
																	<div class="row">

																	<table class="table table-lg">
																		<thead>
																			<tr>
																				<th>Nama PJSK</th>
																				<th>NIK PJSK</th>
																				<th>Sub Klasifikasi</th>
																				<th>Nama BUJK Terdaftar</th>
																				<th>Status</th>
																			</tr>
																		</thead>
																		<tbody>
																			<?php foreach ($data_check['data_pjsk'] as $pjsk) :?>
																			<tr>
																				<td><?=$pjsk['nama_tk']?></td>
																				<td><span class="text-dark"><?=$pjsk['nik_tk']?></span></td>

																				<td><span class="text-dark"><?=$pjsk['sub_klasifikasi']?></span></td>
																				<td><span class="text-dark"><?=$pjsk['nama_bujk']?></span></td>
																				<?php if($pjsk['status']=='FALSE') :?>
																					<td><span class="label label-lg label-danger label-pill label-inline mr-2">Terdaftar Di BUJK Lain</span>
																						<!-- <a disabled onclick="javascript:kembalikan(this)" name="<?= $pjsk['id_izin'] ;?>" id="<?=$pjsk['sub_klasifikasi']?>" class="btn btn-outline-danger btn-sm mr-3">
																							<i class="la la-trash"></i>Kembalikan Berkas</a> -->
																					</td>
																				<?php else :?>
																					<td><span class="label label-lg label-info label-pill label-inline mr-2">Memenuhi</span></td>

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
																				<td><span class="text-dark"><?=$pjbux['nama_bujk']?></span></td>
																				<?php if($pjbux['status']=='FALSE') :?>
																					<td><span class="label label-lg label-danger label-pill label-inline mr-2">Terdaftar Di BUJK Lain</span>
																						<!-- <a disabled onclick="javascript:kembalikan(this)" name="<?= $pjsk['id_izin'] ;?>" id="<?=$pjsk['sub_klasifikasi']?>" class="btn btn-outline-danger btn-sm mr-3">
																							<i class="la la-trash"></i>Kembalikan Berkas</a> -->
																					</td>
																				<?php else :?>
																					<td><span class="label label-lg label-info label-pill label-inline mr-2">Memenuhi</span></td>

																				<?php endif ;?>
																			<?php endforeach; ?>
																			</tr>






																		</tbody>
																	</table>
																	</div>




																</tbody>
															</table>
															<
														</div>
														<div class="modal-footer">
																<button type="button" class="btn btn-light-dark font-weight-bold" data-dismiss="modal">Close</button>

														</div>
												</div>
										</div>
								</div>



								</div>
							</div>


						</div>
						<?php if(!empty($cek_final) OR empty($penilaian)): ?>
							<button  target="_blank" type="submit" name="submit"  style="float: left" class="open-delete btn btn-success btn-labeled btn-rounded" ><b><i class="icon-paperplane" ></i></b>Simpan</button>
						<?php endif; ?>
						<?php echo form_close() ;?>
						<?php if(!empty($cek_final)): ?>
							<?php echo form_open_multipart(base_url('sertifikasi/insert_final_asesor'), 'method="POST"');?>
							<input type="hidden"  name="tgl_decx" value="<?php echo $tgl_dec ;?>">
							<input type="hidden"  name="id_izinx" value="<?php echo $klasifikasi[0]['id_izin'] ;?>">
							<input type="hidden"  name="nib_decx" value="<?php echo $nib_dec ;?>">
							<a onclick="javascript:submit(this)" type="button" name="submit"  style="float: right" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b></i></b> Submit Final</a>

							<button id="submits" style="display:none;" target="_blank" type="submit" name="submit"  style="float: right" class="open-delete btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-paperplane" ></i></b> Submit</button>
							<?php echo form_close() ;?>
						<?php endif; ?>

					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal_pjt" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeLg" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">

				<div class="modal-body" >
					<div class="example example-basic">
						<div class="example-preview">
							<!--begin::Timeline-->
							<div class="table-responsive">


								<table class="table table-lg">
									<thead>
										<tr>
											<th>Nama PJT</th>
											<th>NIK PJT</th>
                      <th>NIK-Email</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="nama"></td>
											<td class="nik"><span class="text-dark"></span></td>
                      <td class="tenaga_kerja"><span class="text-dark"></span></td>
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

				<div class="modal-body" >
					<div class="example example-basic">
						<div class="example-preview">
							<!--begin::Timeline-->
							<div class="table-responsive">
								<hr>
								<table class="table table-lg" id="pjsk_skk">
									<h6 class="text-semibold"><span class="text-dark">Data SKK</span></h6>
									<thead>
										<tr>
											<th>ID Jabatan Kerja</th>
											<th>Jenjang</th>
											<th>Noreg</th>
											<th>Ditetapkan</th>
											<th>Masa Berlaku Sampai</th>
                      <th>NIK-Email</th>
										</tr>
									</thead>
									<tbody>







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
                      <th>NIK-Email</th>
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
                      <th>NIK-Email</th>
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
			<a class="btn btn-sm btn-icon btn-bg-light btn-icon-dark btn-hover-dark" href="<?= base_url('sertifikasi/cetak_penilaian_asesor/'.$nib_dec.'/'.$tgl_dec.'/'.encrypt_url($asesor_2)) ;?>" target="_blank">
				<i class="flaticon-file"></i>
			</a>
		</li>

		<!--end::Item-->
	</ul>
	<script>
	function submit(sel) {
		var status="TRUE";
		if(document.getElementById("comment_resume_penjualan_tahunan").value.length == 0){
			status="FALSE";
		}
		if(document.getElementById("comment_resume_keuangan").value.length == 0 || document.getElementById("comment_neraca_1").value.length == 0 || document.getElementById("comment_neraca_2").value.length == 0 || document.getElementById("comment_neraca_3").value.length == 0 || document.getElementById("comment_neraca_4").value.length == 0 || document.getElementById("comment_neraca_5").value.length == 0 || document.getElementById("comment_neraca_6").value.length == 0 || document.getElementById("comment_neraca_7").value.length == 0){
			status="FALSE";
		}

		if(document.getElementById("comment_pjbu_1").value.length == 0 || document.getElementById("comment_pjbu_2").value.length == 0 || document.getElementById("comment_pjbu_3").value.length == 0 || document.getElementById("comment_resume_tk_pjbu").value.length == 0){
			status="FALSE";
		}

		if(document.getElementById("comment_pjtbu_4").value.length == 0 || document.getElementById("comment_pjtbu_1").value.length == 0 || document.getElementById("comment_pjtbu_3").value.length == 0 || document.getElementById("comment_pjtbu_2").value.length == 0 || document.getElementById("comment_pjtbu_5").value.length == 0 || document.getElementById("comment_pjtbu_6").value.length == 0 ||  document.getElementById("comment_pjtbu_8").value.length == 0 || document.getElementById("comment_pjtbu_7").value.length == 0 || document.getElementById("comment_pjtbu_9").value.length == 0 ||document.getElementById("comment_pjtbu_10").value.length == 0 ||document.getElementById("comment_resume_tk_pjtbu").value.length == 0){
			status="FALSE";
		}



		if(status=="TRUE"){


			Swal.fire({
						title: "Anda ingin mengirim final penilaian ke Kosertifikasi ?",
						text: "Proses akan memberitahu Kosertifikasi bahwa penilaian anda sudah final!",
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
						 document.getElementById("submits").click();

						} else if (result.dismiss === "cancel") {
								Swal.fire(
										"Cancelled",
										"Verifikasi di batalkan :)",
										"error"
								)
						}
				});
			}else{
				Swal.fire(
						"Data Comment Tidak Boleh Kosong",
						"Anda harus mengisi seluruh komen pada lembar kerja asesor",
						"error"
				)
			}

	}
	function getval(sel)
	{
		document.getElementById("subklasifikasi").options.length = 0;

		$.ajax({
				url : "<?php echo base_url('sertifikasi/sub_klasifikasi'); ?>",
				type : "POST",
				data : {id_klasifikasi : sel.value,},
				success : function(data) {

					response = jQuery.parseJSON(data);
					csrfHash = response.csrfHash;

					//console.log( JSON.parse(data) );
					id_kabupaten=response.record;

					$.each(id_kabupaten, function(i, option) {
						var $option = $("<option>", {text: option.subklasifikasi, value: option.subklasfikasi});
						$option.appendTo("#subklasifikasi");
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
		document.getElementById("subklasifikasi2").options.length = 0;

		$.ajax({
				url : "<?php echo base_url('sertifikasi/sub_klasifikasi'); ?>",
				type : "POST",
				data : {id_klasifikasi : sel.value,},
				success : function(data) {

					response = jQuery.parseJSON(data);
					csrfHash = response.csrfHash;

					//console.log( JSON.parse(data) );
					id_kabupaten=response.record;

					$.each(id_kabupaten, function(i, option) {
						var $option = $("<option>", {text: option.subklasifikasi, value: option.subklasfikasi});
						$option.appendTo("#subklasifikasi2");
					});
					},
					error: function(xhr, status, error) {
						var err = eval("(" + xhr.responseText + ")");
						alert(err.Message);
					}
			});
	}
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
	function check_neraca(sel) {
		var c1="FALSE";
		var c2="FALSE";
		var c3="FALSE";
		if (document.getElementById('checkbox_keuangan_1').checked) {
			c1="TRUE";
    }
		if (document.getElementById('checkbox_keuangan_2').checked) {
			c2="TRUE";
    }
		if (document.getElementById('checkbox_keuangan_3').checked) {
			c3="TRUE";
    }
		 if(c1=="TRUE" && c2=="TRUE" && c3=="TRUE"){
			 document.getElementById('checkbox_lolos_keuangan').setAttribute('checked', 'checked');
		 }else{
			 document.getElementById('checkbox_lolos_keuangan').removeAttribute('checked');

		 }
	}
	function check_smm(sel) {
		var c1="FALSE";

		if (document.getElementById('checkbox_smm_1').checked) {
			c1="TRUE";
		}

		 if(c1=="TRUE"){
			 document.getElementById('checkbox_lolos_smm').setAttribute('checked', 'checked');
		 }else{
			 document.getElementById('checkbox_lolos_smm').removeAttribute('checked');

		 }
	}
	function check_smap(sel) {
		var c1="FALSE";

		if (document.getElementById('checkbox_smap_1').checked) {
			c1="TRUE";
		}

		 if(c1=="TRUE"){
			 document.getElementById('checkbox_lolos_smap').setAttribute('checked', 'checked');
		 }else{
			 document.getElementById('checkbox_lolos_smap').removeAttribute('checked');

		 }
	}
	function check_penjualan(sel) {
		var c1="FALSE";
		var c2="FALSE";
		var c3="FALSE";
		var c4="FALSE";
		if (document.getElementById('checkbox_penjualan_1').checked) {
			c1="TRUE";
		}
		if (document.getElementById('checkbox_penjualan_2').checked) {
			c2="TRUE";
		}
		if (document.getElementById('checkbox_penjualan_3').checked) {
			c3="TRUE";
		}
		if (document.getElementById('checkbox_penjualan_4').checked) {
			c4="TRUE";
		}

		 if(c1=="TRUE" && c2=="TRUE" && c3=="TRUE" && c4=="TRUE"){
			 document.getElementById('checkbox_lolos_pengalaman').setAttribute('checked', 'checked');
		 }else{
			 document.getElementById('checkbox_lolos_pengalaman').removeAttribute('checked');

		 }
	}
	function check_tk(sel) {
		var c1="FALSE";
		var c2="FALSE";
		var c3="FALSE";
		var c4="FALSE";
		var c5="FALSE";
		var c6="FALSE";
		var c7="FALSE";
		if (document.getElementById('checkbox_pjbu_1').checked) {
			c1="TRUE";
		}
		if (document.getElementById('checkbox_pjtbu_1').checked) {
			c2="TRUE";
		}
		if (document.getElementById('checkbox_pjtbu_2').checked) {
			c3="TRUE";
		}
		if (document.getElementById('checkbox_pjtbu_3').checked) {
			c4="TRUE";
		}
		if (document.getElementById('checkbox_pjskbu_1').checked) {
			c5="TRUE";
		}
		if (document.getElementById('checkbox_pjskbu_2').checked) {
			c6="TRUE";
		}
		if (document.getElementById('checkbox_pjskbu_3').checked) {
			c7="TRUE";
		}

		 if(c1=="TRUE" && c2=="TRUE" && c3=="TRUE" && c4=="TRUE" && c5=="TRUE" && c6=="TRUE" && c7=="TRUE"){
			 document.getElementById('checkbox_lolos_tk').setAttribute('checked', 'checked');
		 }else{
			 document.getElementById('checkbox_lolos_tk').removeAttribute('checked');

		 }
	}
	<?php $pesan1=trim(preg_replace('/\s\s+/', ' ', $cek[0]['comment_asesor']));
	$pesan= str_replace(array("\r", "\n"), '', $pesan1);
	?>
	var cek="<?=$pesan;?>";
	function myFunction() {
		Swal.fire({
			title: 'Berkas dikembalikan oleh evaluator',
			text: cek,
			showClass: {
				popup: 'animate__animated animate__fadeInDown'
			},
			hideClass: {
				popup: 'animate__animated animate__fadeOutUp'
			}
		})
	}

	function check_pjsk(sel) {
	  //$('#timeline').html('');
	  var id_izin_value=sel.name;
	  var counter=1;
	  var counter2=1;
		var counter3=1;
	  jQuery.ajax({
	    url : "<?= base_url('sertifikasi/get_pjsk_asesor')?>",
	    type : "POST",
	    data : {id_izin:id_izin_value,},
	      success : function(data) {
	      response = jQuery.parseJSON(data);
	      record=response.responses_data;
	      record2=record.data;
	      record3=record2[0].badan_usaha;
	      console.log(response);

	      var table = document.getElementById("pjsk_ska");
	      while(table.rows.length > 1) {
	        table.deleteRow(1);
	      }
	      var array=record2;
	      if(typeof array != "undefined" && array != null && array.length != null && array.length > 0){

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
            var cell8 = row.insertCell(7);

	          counter+=1;
	          cell1.innerHTML = element.nama;
	          cell2.innerHTML = element.nik;
	          cell3.innerHTML = elementx.id_sub_bidang;
	          cell4.innerHTML = elementx.no_reg;
	          cell5.innerHTML = elementx.id_Kualifikasi_profesi;
	          cell6.innerHTML = elementx.tgl_habis;
	          cell7.innerHTML = '<a href="'+elementx.link_sertifikat_digital+'" target="_blank" type="button"  style="float: left" class=" btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b>Sertifikat</a>';
            cell8.innerHTML = element.nik+'-'+element.email;
            });
	        });
	      }
	      var table2 = document.getElementById("pjsk_skt");
	      while(table2.rows.length > 1) {
	        table2.deleteRow(1);
	      }
	      var array2=record2;
	      if(typeof array2 != "undefined" && array2 != null && array2.length != null && array2.length > 0){

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
            var cell8 = row2.insertCell(7);
	          counter+=1;
	          cell1.innerHTML = element.nama;
	          cell2.innerHTML = element.nik;
	          cell3.innerHTML = elementx.id_sub_bidang;
	          cell4.innerHTML = elementx.no_reg;
	          cell5.innerHTML = elementx.id_Kualifikasi_profesi;
	          cell6.innerHTML = elementx.tgl_habis;
	          cell7.innerHTML = '<a href="'+elementx.link_sertifikat_digital+'" target="_blank" type="button"  style="float: left" class=" btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b>Sertifikat</a>';
            cell8.innerHTML = element.nik+'-'+element.email;
            });
	        });
	      }

				var table3 = document.getElementById("pjsk_skk");
			 while(table3.rows.length > 1) {
				 table3.deleteRow(1);
			 }
			 var array3=record2[0].skk;
			 if(typeof array3 != "undefined" && array3 != null && array3.length != null && array3.length > 0){
				 array3.forEach(function(elementy) {
					 var row3 = table3.insertRow(counter3);
					 var cell1 = row3.insertCell(0);
					 var cell2 = row3.insertCell(1);
					 var cell3 = row3.insertCell(2);
					 var cell4 = row3.insertCell(3);
					 var cell5 = row3.insertCell(4);
           var cell6 = row3.insertCell(5);
					 counter+=1;
					 cell1.innerHTML = elementy.id_jabatan_kerja;
					 cell2.innerHTML = elementy.jenjang;
					 cell3.innerHTML = elementy.nomor_registrasi;
					 cell4.innerHTML = elementy.tanggal_ditetapkan;
					 cell5.innerHTML = elementy.tanggal_masa_berlaku;
           cell6.innerHTML = elementy.nik+'-'+elementy.email;
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
		var id_izin_value=sel.name;
		var counter=1;
		var counter2=1;
		jQuery.ajax({
			url : "<?= base_url('sertifikasi/get_pjt_asesor')?>",
			type : "POST",
			data : {id_izin:id_izin_value,},
				success : function(data) {
				response = jQuery.parseJSON(data);
				record=response.responses_data;
				record2=record.data;
				console.log(response.responses_data);

				document.getElementsByClassName("nama")[0].textContent = record2.nama;
				document.getElementsByClassName("nik")[0].textContent = record2.nik;
        document.getElementsByClassName("tenaga_kerja")[0].textContent = record2.nik+'-'+record2.email;

				var table = document.getElementById("pjt_ska");
				while(table.rows.length > 1) {
					table.deleteRow(1);
				}
				var array=record2.ska;
				if(typeof array != "undefined" && array != null && array.length != null && array.length > 0){
					array.forEach(function(element) {
						var row = table.insertRow(counter);
						var cell1 = row.insertCell(0);
						var cell2 = row.insertCell(1);
						var cell3 = row.insertCell(2);
						var cell4 = row.insertCell(3);
						var cell5 = row.insertCell(4);

						counter+=1;
						cell1.innerHTML = element.id_sub_bidang;
						cell2.innerHTML = element.no_reg;
						cell3.innerHTML = element.id_Kualifikasi_profesi;
						cell4.innerHTML = element.tgl_habis;
						cell5.innerHTML = '<a href="'+element.link_sertifikat_digital+'" target="_blank" type="button"  style="float: left" class=" btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b>Sertifikat</a>';

					});
				}

				var table2 = document.getElementById("pjt_skt");
				while(table2.rows.length > 1) {
					table2.deleteRow(1);
				}
				var array2=record2.skt;
				if(typeof array2 != "undefined" && array2 != null && array.length != null && array2.length > 0){
					array2.forEach(function(element) {
						var row2 = table2.insertRow(counter2);
						var cell1 = row2.insertCell(0);
						var cell2 = row2.insertCell(1);
						var cell3 = row2.insertCell(2);
						var cell4 = row2.insertCell(3);
						var cell5 = row2.insertCell(4);

						counter+=1;
						cell1.innerHTML = element.id_sub_bidang;
						cell2.innerHTML = element.no_reg;
						cell3.innerHTML = element.id_Kualifikasi_profesi;
						cell4.innerHTML = element.tgl_habis;
						cell5.innerHTML = '<a href="'+element.link_sertifikat_digital+'" target="_blank" type="button"  style="float: left" class=" btn btn-dark btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b>Sertifikat</a>';

					})
				}




			},
			error: function(xhr, status, error) {
				var err = eval("(" + xhr.responseText + ")");
				alert(err.Message);
			}
		});
	}
	</script>
