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


						<a href="<?= base_url('sertifikasi/cetak_keuangan/'.$nib_dec.'/'.$tgl_dec.'/'.$user_dec) ;?>"
							target="_blank" style="margin:5px;" class="btn btn-warning font-weight-bolder">
							<i class="flaticon2-chart"></i>FKK01</a>
						


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
														<input type="checkbox" <?php if(!empty($ceklis)):?> <?php if($data_ceklis6=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_6" value="1" checked="checked" onclick="javascript:checkbox6()" name="checkbox_6" />
														<span></span>
													</label>
												</span>

											</div>
											<div class="col-md-1">
												<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
												<span class="switch switch-outline switch-icon switch-dark">

													<label>
														<input type="checkbox" <?php if(!empty($ceklis_2)):?> <?php if($data_ceklis6_2=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_6_2" value="1" checked="checked" onclick="javascript:checkbox6_2()" name="checkbox_6_2" />
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
														<input type="checkbox" <?php if(!empty($ceklis)):?> <?php if($data_ceklis7=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_7" value="1" checked="checked" onclick="javascript:checkbox7()" name="checkbox_7" />
														<span></span>
													</label>
												</span>

											</div>
											<div class="col-md-1">
												<font class="text-semibold" style="font-size: 10px;">Tdak/Valid</font>
												<span class="switch switch-outline switch-icon switch-dark">

													<label>
														<input type="checkbox" <?php if(!empty($ceklis_2)):?> <?php if($data_ceklis7_2=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_7_2" value="1" checked="checked" onclick="javascript:checkbox7()" name="checkbox_7_2" />
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
														<input type="checkbox" <?php if(!empty($ceklis)):?> <?php if($data_ceklis8=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_8" value="1" checked="checked" onclick="javascript:checkbox8()" name="checkbox_8" />
														<span></span>
													</label>
												</span>

											</div>
											<div class="col-md-1">
												<font class="text-semibold" style="font-size: 10px;">Tdak/Valid</font>
												<span class="switch switch-outline switch-icon switch-dark">

													<label>
														<input type="checkbox" <?php if(!empty($ceklis_2)):?> <?php if($data_ceklis8_2=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_8_2" value="1" checked="checked" onclick="javascript:checkbox8()" name="checkbox_8_2" />
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
 																	 <input type="checkbox" <?php if(!empty($ceklis)):?> <?php if($data_ceklis32=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_32" value="1" checked="checked" onclick="javascript:checkbox32()" name="checkbox_32" />
 																	 <span></span>
 																 </label>
 															 </span>

 														 </div>
															<div class="col-md-1">
																<font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
																<span class="switch switch-outline switch-icon switch-dark">

																	<label>
																		<input type="checkbox" <?php if(!empty($ceklis_2)):?> <?php if($data_ceklis32_2=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_32_2" value="1" checked="checked" onclick="javascript:checkbox32()" name="checkbox_32_2" />
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
																		<input type="checkbox" <?php if(!empty($ceklis)):?> <?php if($data_ceklis32=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?> id="checkbox_32" value="1" checked="checked" onclick="javascript:checkbox32()" name="checkbox_32" />
																		<span></span>
																	</label>
																</span>

															</div>
														  <div class="col-md-1">
														    <font class="text-semibold" style="font-size: 10px;">Tidak/Valid</font>
														    <span class="switch switch-outline switch-icon switch-dark">

														      <label>
														        <input type="checkbox"  <?php if(!empty($ceklis_2)):?> <?php if($data_ceklis33_2=='1') :?>checked="checked"<?php else :?><?php endif ;?> <?php else :?> checked="checked"<?php endif ;?>id="checkbox_33_2" value="1" checked="checked" onclick="javascript:checkbox33()" name="checkbox_33_2" />
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
							<?php echo form_open_multipart(base_url('sertifikasi/insert_penilaian_fkk01'), 'method="POST"');?>
	
								<section class="items">
    <table style="width:100%; border-collapse:collapse; font-family:Arial, sans-serif; font-size:13px;" border="1">
        <!-- Header baris 1 -->
        <tr style="text-align:center; font-weight:bold; background:#fce9c8;">
            <td rowspan="2">No.</td>
            <td rowspan="2">PERSYARATAN</td>
            <td colspan="2">KELENGKAPAN</td>
            <td colspan="2">VERIFIKASI</td>
            <td colspan="2">VALIDASI</td>
            <td colspan="2">KETERANGAN</td>
        </tr>
		 <tr style="text-align:center; font-weight:bold; background:#fce9c8;">
            <td>Ada</td>
            <td>Tidak Ada</td>
            <td>Ada</td>
            <td>Tidak Ada</td>
            <td>Valid</td>
            <td>Tidak Valid</td>
            <td>Keterangan</td>
        </tr>
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
        </tr>
		<input type="hidden" value="<?php echo $nib_dec ;?>" name="id1">
		<input type="hidden" value="<?php echo $tgl_dec ;?>" name="id2">
		<input type="hidden" value="<?php echo $user_dec ;?>" name="id3">
		<?php
							  $count=0;
								if(!empty($penilaian_fkk01)){
									foreach($penilaian_fkk01 as $row_ceklis){
	 							  $count+=1;
	 							  for ($i=0; $i < count($penilaian_fkk01); $i++) {
	 							    if($row_ceklis['id']==$penilaian_fkk01[$i]['id']){
	 							      ${"data_kelengkapan".$row_ceklis['id']}=$row_ceklis['kelengkapan'];
									  ${"data_verifikasi".$row_ceklis['id']}=$row_ceklis['verifikasi'];
	 							      ${"data_validasi".$row_ceklis['id']}=$row_ceklis['validasi'];
	 							      ${"data_keterangan".$row_ceklis['id']}=$row_ceklis['keterangan'];
	 							    }
	 							  }
	 							}
								}
							  ;?>
							  
		<tr>
            <td style="text-align:center;">1.</td>
            <td>
				 KBLI :<b><?=$klasifikasi[0]['nomor_kbli'];?></b>
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" checked="checked"  name="radios1" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_kelengkapan1=='0') :?> checked="checked" <?php endif ;?>  name="radios1" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" checked="checked" name="radioss1" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi1=='0') :?> checked="checked" <?php endif ;?>  name="radioss1" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" checked="checked" name="radiosss1" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi1=='0') :?> checked="checked" <?php endif ;?>  name="radiosss1" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
          
           <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?=$data_keterangan1?>" name="keterangan1" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;">1.</td>
            <td>
	
				
					Klasifikasi :<?=$klasifikasi[0]['id_klasifikasi'];?>
			
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_kelengkapan2=='1') :?> checked="checked" <?php endif ;?> name="radios2" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_kelengkapan2=='0') :?> checked="checked" <?php endif ;?>  name="radios2" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_verifikasi2=='1') :?> checked="checked" <?php endif ;?> name="radioss2" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi2=='0') :?> checked="checked" <?php endif ;?>  name="radioss2" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_validasi2=='1') :?> checked="checked" <?php endif ;?> name="radiosss2" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi2=='0') :?> checked="checked" <?php endif ;?>  name="radiosss2" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?=$data_keterangan2?>" name="keterangan2" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
		
					Sub Klasifikasi :<?=$klasifikasi[0]['id_sub_klasifikasi'];?>
				
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_kelengkapan3=='1') :?> checked="checked" <?php endif ;?> name="radios3" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_kelengkapan3=='0') :?> checked="checked" <?php endif ;?>  name="radios3" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_verifikasi3=='1') :?> checked="checked" <?php endif ;?> name="radioss3" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi3=='0') :?> checked="checked" <?php endif ;?>  name="radioss3" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_validasi3=='1') :?> checked="checked" <?php endif ;?> name="radiosss3" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi3=='0') :?> checked="checked" <?php endif ;?>  name="radiosss3" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
           <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?=$data_keterangan3?>" name="keterangan3" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;">2.</td>
            <td>
			<div class="row">
				<div class="col-md-12">
					Informasi Badan Usaha 
				</div>
			
			</div>
			</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
		<tr>
            <td style="text-align:center;">a.</td>
            <td>
			<div class="row">
				<div class="col-md-12">
					Inputan data Informasi Badan Usaha 
				</div>
			
			</div>
			</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
					Nama Badan Usaha :<b><?=$biodata[0]['nama'];?></b>
			
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_kelengkapan4=='1') :?> checked="checked" <?php endif ;?> name="radios4" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_kelengkapan4=='0') :?> checked="checked" <?php endif ;?>  name="radios4" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_verifikasi4=='1') :?> checked="checked" <?php endif ;?> name="radioss4" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi4=='0') :?> checked="checked" <?php endif ;?>  name="radioss4" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_validasi4=='1') :?> checked="checked" <?php endif ;?> name="radiosss4" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi4=='0') :?> checked="checked" <?php endif ;?>  name="radiosss4" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
          <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?=$data_keterangan4?>" name="keterangan4" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
					2. Bentuk Badan Usaha :<b><?=$biodata[0]['bentuk_usaha'];?></b>
			
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_kelengkapan5=='1') :?> checked="checked" <?php endif ;?> name="radios5" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_kelengkapan5=='0') :?> checked="checked" <?php endif ;?>  name="radios5" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_verifikasi5=='1') :?> checked="checked" <?php endif ;?> name="radioss5" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi5=='0') :?> checked="checked" <?php endif ;?>  name="radioss5" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_validasi5=='1') :?> checked="checked" <?php endif ;?> name="radiosss5" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi5=='0') :?> checked="checked" <?php endif ;?>  name="radiosss5" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?=$data_keterangan5?>" name="keterangan5" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
					3. Jenis Badan Usaha :<b><?=$biodata[0]['jenis_usaha'];?></b>
			
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_kelengkapan6=='1') :?> checked="checked" <?php endif ;?> name="radios6" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_kelengkapan6=='0') :?> checked="checked" <?php endif ;?>  name="radios6" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_verifikasi6=='1') :?> checked="checked" <?php endif ;?> name="radioss6" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi6=='0') :?> checked="checked" <?php endif ;?>  name="radioss6" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_validasi6=='1') :?> checked="checked" <?php endif ;?> name="radiosss6" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi6=='0') :?> checked="checked" <?php endif ;?>  name="radiosss6" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
           <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?=$data_keterangan6?>" name="keterangan6" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
					4. Alamat Badan Usaha :<b><?=$biodata[0]['alamat'];?></b>
			
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_kelengkapan7=='1') :?> checked="checked" <?php endif ;?> name="radios7" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_kelengkapan7=='0') :?> checked="checked" <?php endif ;?>  name="radios7" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_verifikasi7=='1') :?> checked="checked" <?php endif ;?> name="radioss7" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi7=='0') :?> checked="checked" <?php endif ;?>  name="radioss7" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_validasi7=='1') :?> checked="checked" <?php endif ;?> name="radiosss7" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi7=='0') :?> checked="checked" <?php endif ;?>  name="radiosss7" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
           <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?=$data_keterangan7?>" name="keterangan7" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
					5. Keluarahan :<b></b>
			
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_kelengkapan8=='1') :?> checked="checked" <?php endif ;?> name="radios8" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_kelengkapan8=='0') :?> checked="checked" <?php endif ;?>  name="radios8" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_verifikasi8=='1') :?> checked="checked" <?php endif ;?> name="radioss8" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi8=='0') :?> checked="checked" <?php endif ;?>  name="radioss8" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_validasi8=='1') :?> checked="checked" <?php endif ;?> name="radiosss8" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi8=='0') :?> checked="checked" <?php endif ;?>  name="radiosss8" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
          <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?=$data_keterangan8?>" name="keterangan1" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
					6. Kecamatan :<b><?=$biodata[0]['bentuk_usaha'];?></b>
			
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_kelengkapan9=='1') :?> checked="checked" <?php endif ;?> name="radios9" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_kelengkapan9=='0') :?> checked="checked" <?php endif ;?>  name="radios9" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_verifikasi9=='1') :?> checked="checked" <?php endif ;?> name="radioss9" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi9=='0') :?> checked="checked" <?php endif ;?>  name="radioss9" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_validasi9=='1') :?> checked="checked" <?php endif ;?> name="radiosss9" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi9=='0') :?> checked="checked" <?php endif ;?>  name="radiosss9" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
           <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?=$data_keterangan9?>" name="keterangan9" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
					7. Kabupaten/Kota :<b><?=$biodata[0]['id_kabupaten'];?></b>
			
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_kelengkapan10=='1') :?> checked="checked" <?php endif ;?> name="radios10" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_kelengkapan10=='0') :?> checked="checked" <?php endif ;?>  name="radios10" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_verifikasi10=='1') :?> checked="checked" <?php endif ;?> name="radioss10" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi10=='0') :?> checked="checked" <?php endif ;?>  name="radioss10" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_validasi10=='1') :?> checked="checked" <?php endif ;?> name="radiosss10" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi10=='0') :?> checked="checked" <?php endif ;?>  name="radiosss10" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?=$data_keterangan10?>" name="keterangan10" class="form-control" placeholder="Isian Asesor...">
					<input type="hidden" name="id_izin" value="<?=$klasifikasi[0]['id_izin'];?>">

				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
					8. Provinsi :<b><?=$biodata[0]['id_propinsi'];?></b>
			
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_kelengkapan11=='1') :?> checked="checked" <?php endif ;?> name="radios11" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_kelengkapan11=='0') :?> checked="checked" <?php endif ;?>  name="radios11" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_verifikasi11=='1') :?> checked="checked" <?php endif ;?> name="radioss11" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi11=='0') :?> checked="checked" <?php endif ;?>  name="radioss11" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_validasi11=='1') :?> checked="checked" <?php endif ;?> name="radiosss11" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi11=='0') :?> checked="checked" <?php endif ;?>  name="radiosss11" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?=$data_keterangan11?>" name="keterangan11" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
					9. Kode Pos :<b><?=$biodata[0]['kodepos'];?></b>
			
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_kelengkapan12=='1') :?> checked="checked" <?php endif ;?> name="radios12" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_kelengkapan12=='0') :?> checked="checked" <?php endif ;?>  name="radios12" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_verifikasi12=='1') :?> checked="checked" <?php endif ;?> name="radioss12" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi12=='0') :?> checked="checked" <?php endif ;?>  name="radioss12" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_validasi12=='1') :?> checked="checked" <?php endif ;?> name="radiosss12" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi12=='0') :?> checked="checked" <?php endif ;?>  name="radiosss12" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?=$data_keterangan12?>" name="keterangan12" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
					10. Website :<b><?=$biodata[0]['website'];?></b>
			
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> checked="checked"  name="radios12b" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_kelengkapan13=='0') :?> checked="checked" <?php endif ;?>  name="radios12b" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_verifikasi13=='1') :?> checked="checked" <?php endif ;?> name="radioss12b" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_kelengkapan13=='0') :?> checked="checked" <?php endif ;?>  name="radioss12b" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_validasi13=='1') :?> checked="checked" <?php endif ;?> name="radiosss12b" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_kelengkapan13=='0') :?> checked="checked" <?php endif ;?>  name="radiosss12b" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
         <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?=$data_keterangan13?>" name="keterangan12b" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
					11. Email Badan Usaha :<b><?=$biodata[0]['email'];?></b>
			
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_kelengkapan13=='1') :?> checked="checked" <?php endif ;?> name="radios13" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_kelengkapan13=='0') :?> checked="checked" <?php endif ;?>  name="radios13" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_verifikasi13=='1') :?> checked="checked" <?php endif ;?> name="radioss13" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_kelengkapan13=='0') :?> checked="checked" <?php endif ;?>  name="radioss13" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_validasi13=='1') :?> checked="checked" <?php endif ;?> name="radiosss13" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_kelengkapan13=='0') :?> checked="checked" <?php endif ;?>  name="radiosss13" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
           <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?=$data_keterangan13?>" name="keterangan13" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
					12. Nomor Telepon Badan usaha :<b><?=$biodata[0]['telepon'];?></b>
			
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_kelengkapan14=='1') :?> checked="checked" <?php endif ;?> name="radios14" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_kelengkapan14=='0') :?> checked="checked" <?php endif ;?>  name="radios14" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_verifikasi14=='1') :?> checked="checked" <?php endif ;?> name="radioss14" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi14=='0') :?> checked="checked" <?php endif ;?>  name="radioss14" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_validasi14=='1') :?> checked="checked" <?php endif ;?> name="radiosss14" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi14=='0') :?> checked="checked" <?php endif ;?>  name="radiosss14" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?=$data_keterangan14?>" name="keterangan14" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
					13. Nomor HP Badan Usaha :<b><?=$biodata[0]['hp'];?></b>
			
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_kelengkapan15=='1') :?> checked="checked" <?php endif ;?> name="radios15" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_kelengkapan15=='0') :?> checked="checked" <?php endif ;?>  name="radios15" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_verifikasi15=='1') :?> checked="checked" <?php endif ;?> name="radioss15" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi15=='0') :?> checked="checked" <?php endif ;?>  name="radioss15" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_validasi15=='1') :?> checked="checked" <?php endif ;?> name="radiosss15" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi15=='0') :?> checked="checked" <?php endif ;?>  name="radiosss15" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
             <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?=$data_keterangan15?>" name="keterangan15" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
					14. NPWP Badan Usaha :<b><?=$biodata[0]['bentuk_usaha'];?></b>
			
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_kelengkapan16=='1') :?> checked="checked" <?php endif ;?> name="radios16" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_kelengkapan16=='0') :?> checked="checked" <?php endif ;?>  name="radios16" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_verifikasi16=='1') :?> checked="checked" <?php endif ;?> name="radioss16" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi16=='0') :?> checked="checked" <?php endif ;?>  name="radioss16" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_validasi16=='1') :?> checked="checked" <?php endif ;?> name="radiosss16" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi16=='0') :?> checked="checked" <?php endif ;?>  name="radiosss16" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?=$data_keterangan16?>" name="keterangan16" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
					15. nomor Induk Berusaha (NIB) :<b><?=$biodata[0]['NIB'];?></b>
			
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_kelengkapan17=='1') :?> checked="checked" <?php endif ;?> name="radios17" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_kelengkapan17=='0') :?> checked="checked" <?php endif ;?>  name="radios17" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_verifikasi17=='1') :?> checked="checked" <?php endif ;?> name="radioss17" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi17=='0') :?> checked="checked" <?php endif ;?>  name="radioss17" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_validasi17=='1') :?> checked="checked" <?php endif ;?> name="radiosss17" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi17=='0') :?> checked="checked" <?php endif ;?>  name="radiosss17" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?=$data_keterangan17?>" name="keterangan17" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;">b.</td>
            <td>
			<div class="row">
				<div class="col-md-12">
					Dokumen Upload Informasi Badan Usaha
				</div>
			
			</div>
			</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
					Surat Pernyataan Tanggung Jawab Mutlak 
			
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_kelengkapan18=='1') :?> checked="checked" <?php endif ;?> name="radios18" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_kelengkapan18=='0') :?> checked="checked" <?php endif ;?>  name="radios18" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_verifikasi18=='1') :?> checked="checked" <?php endif ;?> name="radioss18" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi18=='0') :?> checked="checked" <?php endif ;?>  name="radioss18" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_validasi18=='1') :?> checked="checked" <?php endif ;?> name="radiosss18" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi18=='0') :?> checked="checked" <?php endif ;?>  name="radiosss18" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?=$data_keterangan18?>" name="keterangan18" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;">b.</td>
            <td>
			<div class="row">
				<div class="col-md-12">
					Dokumen Upload Informasi Badan Usaha
				</div>
			
			</div>
			</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
			<div class="row">
				<div class="col-md-12">
					Inputan Informasi Pemegang Saham
				</div>
			
			</div>
			</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
		 <?php $count=1 ;?>
	
					 <?php
			
							
								if(!empty($penilaian_fkk01_saham)){
									foreach($penilaian_fkk01_saham as $row_ceklis){
	 							  $count+=1;
	 							  for ($i=0; $i < count($penilaian_fkk01_saham); $i++) {
	 							    if($row_ceklis['id']==$penilaian_fkk01_saham[$i]['id']){
	 							      ${"data_kelengkapan_saham".$row_ceklis['id']}=$row_ceklis['kelengkapan'];
									  ${"data_verifikasi_saham".$row_ceklis['id']}=$row_ceklis['verifikasi'];
	 							      ${"data_validasi_saham".$row_ceklis['id']}=$row_ceklis['validasi'];
	 							      ${"data_keterangan_saham".$row_ceklis['id']}=$row_ceklis['keterangan'];
	 							    }
	 							  }
	 							}
								}
							  ;?>		
  		<?php foreach ($pemegang_saham as $row_saham) :?>
			<?php $id_sahamx=$row_saham['no_ktp'] ;?>

				
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
					<?= $count ;?>. Nama : <b><?=$row_saham['nama_pemilik'] ;?><a/b>
			
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_kelengkapan_saham" . $id_sahamx . "_19"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radios19" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_kelengkapan_saham" . $id_sahamx . "_19"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radios19" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_verifikasi_saham" . $id_sahamx . "_19"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radioss19" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi_saham" . $id_sahamx . "_19"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radioss19" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_validasi_saham" . $id_sahamx . "_19"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radiosss19" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_validasi_saham" . $id_sahamx . "_19"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radiosss19" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?= ${'data_keterangan_saham' . $id_sahamx . '_19'} ;?>" name="<?=$row_saham['no_ktp'] ;?>keterangan19" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
					 No. KTP/KITAS : <b><?=$row_saham['no_ktp'] ;?></b>
			
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_kelengkapan_saham" . $id_sahamx . "_20"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radios20" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_kelengkapan_saham" . $id_sahamx . "_20"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radios20" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_verifikasi_saham" . $id_sahamx . "_20"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radioss20" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi_saham" . $id_sahamx . "_20"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radioss20" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_validasi_saham" . $id_sahamx . "_20"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radiosss20" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_validasi_saham" . $id_sahamx . "_20"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radiosss20" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?= ${'data_keterangan_saham' . $id_sahamx . '_20'} ;?>" name="<?=$row_saham['no_ktp'] ;?>keterangan20" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
					 Kabupaten/Kota : <b><?=$row_saham['id_kabupaten'] ;?></b>
			
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_kelengkapan_saham" . $id_sahamx . "_21"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radios21" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_kelengkapan_saham" . $id_sahamx . "_21"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radios21" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_verifikasi_saham" . $id_sahamx . "_21"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radioss21" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi_saham" . $id_sahamx . "_21"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radioss21" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_validasi_saham" . $id_sahamx . "_21"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radiosss21" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_validasi_saham" . $id_sahamx . "_21"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radiosss21" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
             <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?= ${'data_keterangan_saham' . $id_sahamx . '_21'} ;?>" name="<?=$row_saham['no_ktp'] ;?>keterangan21" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
					 Provinsi : <b><?=$row_saham['id_propinsi'] ;?></b>
			
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_kelengkapan_saham" . $id_sahamx . "_22"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radios22" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_kelengkapan_saham" . $id_sahamx . "_22"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radios22" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_verifikasi_saham" . $id_sahamx . "_22"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radioss22" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi_saham" . $id_sahamx . "_22"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radioss22" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_validasi_saham" . $id_sahamx . "_22"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radiosss22" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_validasi_saham" . $id_sahamx . "_22"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radiosss22" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
             <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?= ${'data_keterangan_saham' . $id_sahamx . '_22'} ;?>" name="<?=$row_saham['no_ktp'] ;?>keterangan22" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
					 Jumlah Saham : <b><?=$row_saham['jumlah_lembar'] ;?></b>
			
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_kelengkapan_saham" . $id_sahamx . "_23"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radios23" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_kelengkapan_saham" . $id_sahamx . "_23"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radios23" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_verifikasi_saham" . $id_sahamx . "_23"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radioss23" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi_saham" . $id_sahamx . "_23"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radioss23" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_validasi_saham" . $id_sahamx . "_23"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radiosss23" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_validasi_saham" . $id_sahamx . "_23"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radiosss23" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?= ${'data_keterangan_saham' . $id_sahamx . '_23'} ;?>" name="<?=$row_saham['no_ktp'] ;?>keterangan23" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
					Nilai Satuan Saham : <b><?=$row_saham['nilai_perlembar'] ;?></b>
			
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_kelengkapan_saham" . $id_sahamx . "_24"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radios24" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_kelengkapan_saham" . $id_sahamx . "_24"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radios24" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_verifikasi_saham" . $id_sahamx . "_24"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radioss24" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi_saham" . $id_sahamx . "_24"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radioss24" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_validasi_saham" . $id_sahamx . "_24"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radiosss24" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_validasi_saham" . $id_sahamx . "_24"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radiosss24" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
           <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?= ${'data_keterangan_saham' . $id_sahamx . '_24'} ;?>" name="<?=$row_saham['no_ktp'] ;?>keterangan24" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
					Modal Disetor : Rp. <b><?=number_format($row_saham['modal_disetor'],0,",",".") ;?>
			
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_kelengkapan_saham" . $id_sahamx . "_25"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radios25" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_kelengkapan_saham" . $id_sahamx . "_25"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radios25" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_verifikasi_saham" . $id_sahamx . "_25"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radioss25" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi_saham" . $id_sahamx . "_25"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radioss25" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_validasi_saham" . $id_sahamx . "_25"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radiosss25" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_validasi_saham" . $id_sahamx . "_25"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$row_saham['no_ktp'] ;?>radiosss25" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?= ${'data_keterangan_saham' . $id_sahamx . '_25'} ;?>" name="<?=$row_saham['no_ktp'] ;?>keterangan25" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<?php $count+=1 ;?>
  		<?php endforeach ;?>
		<tr>
            <td style="text-align:center;">4.</td>
            <td>
			<div class="row">
				<div class="col-md-12">
					Informasi Neraca
				</div>
			
			</div>
			</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
			<div class="row">
				<div class="col-md-12">
					a. Data Inputan Infromasi Neraca
				</div>
			
			</div>
			</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
		 <?php
			
							
								if(!empty($penilaian_fkk01_neraca)){
									foreach($penilaian_fkk01_neraca as $row_ceklis){
	 							  $count+=1;
	 							  for ($i=0; $i < count($penilaian_fkk01_neraca); $i++) {
	 							    if($row_ceklis['id']==$penilaian_fkk01_neraca[$i]['id']){
	 							      ${"data_kelengkapan_neraca".$row_ceklis['id']}=$row_ceklis['kelengkapan'];
									  ${"data_verifikasi_neraca".$row_ceklis['id']}=$row_ceklis['verifikasi'];
	 							      ${"data_validasi_neraca".$row_ceklis['id']}=$row_ceklis['validasi'];
	 							      ${"data_keterangan_neraca".$row_ceklis['id']}=$row_ceklis['keterangan'];
	 							    }
	 							  }
	 							}
								}
							  ;?>
		 <?php foreach($neraca as $row_neraca) :?>
			<?php $id_sahamx=$row_neraca['Tahun'];?>
		<tr>
            <td style="text-align:center;"></td>
            <td>1. Tahun : <b><?=$row_neraca['Tahun'] ;?></b>
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_26"}=='1') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radios26" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_26"}=='0') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radios26" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_verifikasi_neraca" . $id_sahamx . "_26"}=='1') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radioss26" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi_neraca" . $id_sahamx . "_26"}=='0') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radioss26" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_validasi_neraca" . $id_sahamx . "_26"}=='1') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radiosss26" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_validasi_neraca" . $id_sahamx . "_26"}=='0') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radiosss26" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td> <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text"value="<?=${"data_keterangan_neraca" . $id_sahamx . "_26"}?>" name="<?=$row_neraca['Tahun'] ;?>keterangan26" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>2. Aset Lancar Rp. <b><?=number_format($row_neraca['aktiva_lancar'],0,",",".") ;?></b>
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_27"}=='1') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radios27" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_27"}=='0') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radios27" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_verifikasi_neraca" . $id_sahamx . "_27"}=='1') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radioss27" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi_neraca" . $id_sahamx . "_27"}=='0') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radioss27" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_validasi_neraca" . $id_sahamx . "_27"}=='1') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radiosss27" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_validasi_neraca" . $id_sahamx . "_27"}=='0') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radiosss27" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
             <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text"value="<?=${"data_keterangan_neraca" . $id_sahamx . "_27"}?>" name="<?=$row_neraca['Tahun'] ;?>keterangan27" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>3. Aset Tidak Lancar Rp. <b><?=number_format($row_neraca['aktiva_tdk_lancar'],0,",",".") ;?></b>
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_28"}=='1') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radios28" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0"  <?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_28"}=='0') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radios28" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_verifikasi_neraca" . $id_sahamx . "_28"}=='1') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radioss28" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi_neraca" . $id_sahamx . "_28"}=='0') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radioss28" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_validasi_neraca" . $id_sahamx . "_28"}=='1') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radiosss28" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_validasi_neraca" . $id_sahamx . "_28"}=='0') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radiosss28" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text"value="<?=${"data_keterangan_neraca" . $id_sahamx . "_28"}?>" name="<?=$row_neraca['Tahun'] ;?>keterangan28" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>4. Aset Lain-lain Rp. <b><?=number_format($row_neraca['aktiva_lain_lain'],0,",",".") ;?></b>
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_29"}=='1') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radios29" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_29"}=='0') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radios29" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_verifikasi_neraca" . $id_sahamx . "_29"}=='1') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radioss29" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi_neraca" . $id_sahamx . "_29"}=='0') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radioss29" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_validasi_neraca" . $id_sahamx . "_29"}=='1') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radiosss29" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_validasi_neraca" . $id_sahamx . "_29"}=='0') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radiosss29" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text"value="<?=${"data_keterangan_neraca" . $id_sahamx . "_29"}?>" name="<?=$row_neraca['Tahun'] ;?>keterangan29" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>5. Total Aset Rp. <b><?=number_format($row_neraca['total_aset'],0,",",".") ;?></b>
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_30"}=='1') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radios30" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_30"}=='0') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radios30" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_verifikasi_neraca" . $id_sahamx . "_30"}=='1') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radioss30" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi_neraca" . $id_sahamx . "_30"}=='0') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radioss30" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_validasi_neraca" . $id_sahamx . "_30"}=='1') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radiosss30" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_validasi_neraca" . $id_sahamx . "_30"}=='0') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radiosss30" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
             <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text"value="<?=${"data_keterangan_neraca" . $id_sahamx . "_30"}?>" name="<?=$row_neraca['Tahun'] ;?>keterangan30" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>6. Kewajiban Lancar Rp. <b><?=number_format($row_neraca['kewajiban_lancar'],0,",",".") ;?></b>
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_31"}=='1') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radios31" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_31"}=='0') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radios31" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_verifikasi_neraca" . $id_sahamx . "_31"}=='1') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radioss31" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi_neraca" . $id_sahamx . "_31"}=='0') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radioss31" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_validasi_neraca" . $id_sahamx . "_31"}=='1') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radiosss31" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_validasi_neraca" . $id_sahamx . "_31"}=='0') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radiosss31" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text"value="<?=${"data_keterangan_neraca" . $id_sahamx . "_31"}?>" name="<?=$row_neraca['Tahun'] ;?>keterangan31" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>7. Kewajiban Tidak Lancar Rp. <b><?=number_format($row_neraca['kewajiban_tdk_lancar'],0,",",".") ;?></b>
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_32"}=='1') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radios32" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_32"}=='0') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radios32" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_verifikasi_neraca" . $id_sahamx . "_32"}=='1') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radioss32" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi_neraca" . $id_sahamx . "_32"}=='0') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radioss32" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_validasi_neraca" . $id_sahamx . "_32"}=='1') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radiosss32" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_validasi_neraca" . $id_sahamx . "_32"}=='0') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radiosss32" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text"value="<?=${"data_keterangan_neraca" . $id_sahamx . "_32"}?>" name="<?=$row_neraca['Tahun'] ;?>keterangan32" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>8. Total Kewajiban Rp. <b><?=number_format($row_neraca['total_kewajiban'],0,",",".") ;?></b>
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_33"}=='1') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radios33" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_33"}=='0') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radios33" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_verifikasi_neraca" . $id_sahamx . "_33"}=='1') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radioss33" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi_neraca" . $id_sahamx . "_33"}=='0') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radioss33" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_validasi_neraca" . $id_sahamx . "_33"}=='1') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radiosss33" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_validasi_neraca" . $id_sahamx . "_33"}=='0') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radiosss33" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
             <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text"value="<?=${"data_keterangan_neraca" . $id_sahamx . "_33"}?>" name="<?=$row_neraca['Tahun'] ;?>keterangan33" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>9. Total Ekuitas Rp. <b><?=number_format($row_neraca['total_ekuitas'],0,",",".") ;?></b>
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_34"}=='1') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radios34" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_34"}=='0') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radios34" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_verifikasi_neraca" . $id_sahamx . "_34"}=='1') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radioss34" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi_neraca" . $id_sahamx . "_34"}=='0') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radioss34" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_validasi_neraca" . $id_sahamx . "_34"}=='1') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radiosss34" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_validasi_neraca" . $id_sahamx . "_34"}=='0') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radiosss34" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text"value="<?=${"data_keterangan_neraca" . $id_sahamx . "_34"}?>" name="<?=$row_neraca['Tahun'] ;?>keterangan34" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>10. Total Kewajiban dan Ekuitas Rp. <b><?=number_format($row_neraca['total_kewajiban_ekuitas'],0,",",".") ;?></b>
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_35"}=='1') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radios35" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_35"}=='0') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radios35" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_verifikasi_neraca" . $id_sahamx . "_35"}=='1') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radioss35" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi_neraca" . $id_sahamx . "_35"}=='0') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radioss35" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_validasi_neraca" . $id_sahamx . "_35"}=='1') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radiosss35" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi_neraca" . $id_sahamx . "_35"}=='0') :?>checked="checked"<?php endif ;?> name="<?=$row_neraca['Tahun'] ;?>radiosss35" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?=${"data_keterangan_neraca" . $id_sahamx . "_35"}?>" name="<?=$row_neraca['Tahun'] ;?>keterangan35" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		 <?php endforeach ;?>
		 <tr>
            <td style="text-align:center;">5</td>
            <td>
			<div class="row">
				<div class="col-md-12">
					b. Dokumen Upload Informasi Neraca
				</div>
			
			</div>
			</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
		 <tr>
            <td style="text-align:center;">5</td>
            <td>
			<div class="row">
				<div class="col-md-12">
					Laporan Neraca Badan Usaha
				</div>
			
			</div>
			</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>a) Nilai Ekuitas Neraca Tahun 1 <?=$neraca[0]['Tahun']?> : Rp. <b><?=number_format($neraca[0]['totalekuitas'],0,",",".") ;?></b>
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_kelengkapan36=='1') :?> checked="checked" <?php endif ;?> name="radios36" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_kelengkapan36=='0') :?> checked="checked" <?php endif ;?>  name="radios36" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_verifikasi36=='1') :?> checked="checked" <?php endif ;?> name="radioss36" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi36=='0') :?> checked="checked" <?php endif ;?>  name="radioss36" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_validasi36=='1') :?> checked="checked" <?php endif ;?> name="radiosss36" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi36=='0') :?> checked="checked" <?php endif ;?>  name="radiosss36" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
             <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?=$data_keterangan36?>" name="keterangan36" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>b) Nilai Ekuitas Neraca Tahun 2 <?=$neraca[1]['Tahun']?> : Rp. <b><?=number_format($neraca[1]['totalekuitas'],0,",",".") ;?></b>
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_kelengkapan37=='1') :?> checked="checked" <?php endif ;?> name="radios37" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_kelengkapan37=='0') :?> checked="checked" <?php endif ;?>  name="radios37" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_verifikasi37=='1') :?> checked="checked" <?php endif ;?> name="radioss37" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi37=='0') :?> checked="checked" <?php endif ;?>  name="radioss37" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_validasi37=='1') :?> checked="checked" <?php endif ;?> name="radiosss37" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi37=='0') :?> checked="checked" <?php endif ;?>  name="radiosss37" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?=$data_keterangan37?>" name="keterangan37" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>Laporan Audit Kantor Akuntan Publik(Kualifikasi Menengah & Besar)
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_kelengkapan38=='1') :?> checked="checked" <?php endif ;?> name="radios38" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_kelengkapan38=='0') :?> checked="checked" <?php endif ;?>  name="radios38" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_verifikasi38=='1') :?> checked="checked" <?php endif ;?> name="radioss38" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi38=='0') :?> checked="checked" <?php endif ;?>  name="radioss38" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_validasi38=='1') :?> checked="checked" <?php endif ;?> name="radiosss38" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi38=='0') :?> checked="checked" <?php endif ;?>  name="radiosss38" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?=$data_keterangan38?>" name="keterangan38" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>1) Opini
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_kelengkapan39=='1') :?> checked="checked" <?php endif ;?> name="radios39" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_kelengkapan39=='0') :?> checked="checked" <?php endif ;?>  name="radios39" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_verifikasi39=='1') :?> checked="checked" <?php endif ;?> name="radioss39" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi39=='0') :?> checked="checked" <?php endif ;?>  name="radioss39" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_validasi39=='1') :?> checked="checked" <?php endif ;?> name="radiosss39" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi39=='0') :?> checked="checked" <?php endif ;?>  name="radiosss39" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
           <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?=$data_keterangan39?>" name="keterangan39" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>2) NERACA (Laporan Posisi Keuangan)
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_kelengkapan40=='1') :?> checked="checked" <?php endif ;?> name="radios40" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_kelengkapan40=='0') :?> checked="checked" <?php endif ;?>  name="radios40" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_verifikasi40=='1') :?> checked="checked" <?php endif ;?> name="radioss40" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi40=='0') :?> checked="checked" <?php endif ;?>  name="radioss40" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_validasi40=='1') :?> checked="checked" <?php endif ;?> name="radiosss40" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi40=='0') :?> checked="checked" <?php endif ;?>  name="radiosss40" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
             <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?=$data_keterangan40?>" name="keterangan40" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
  <div style="display: flex; align-items: center; gap: 10px;">
    <span>a). Nilai Total Ekuitas Neraca Tahun</span>
    <input type="text" 
           value="<?=$data_keterangan45?>" 
           name="keterangan45" 
           class="form-control" 
           placeholder="(diisi berdasar LAI) Rp. (diisi berdasar LAI)">
  </div>
</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_kelengkapan45=='1') :?> checked="checked" <?php endif ;?> name="radios45" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_kelengkapan45=='0') :?> checked="checked" <?php endif ;?>  name="radios45" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_verifikasi45=='1') :?> checked="checked" <?php endif ;?> name="radioss45" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi45=='0') :?> checked="checked" <?php endif ;?>  name="radioss45" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_validasi45=='1') :?> checked="checked" <?php endif ;?> name="radiosss45" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi45=='0') :?> checked="checked" <?php endif ;?>  name="radiosss45" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
             <td style="text-align:center;">
					
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
          <td>
			<div style="display: flex; align-items: center; gap: 10px;">
				<span>b). Nilai Total Ekuitas Neraca Tahun</span>
				<input type="text" 
					value="<?=$data_keterangan46?>" 
					name="keterangan46" 
					class="form-control" 
					placeholder="(diisi berdasar LAI) Rp. (diisi berdasar LAI)">
			</div>
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_kelengkapan46=='1') :?> checked="checked" <?php endif ;?> name="radios46" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_kelengkapan46=='0') :?> checked="checked" <?php endif ;?>  name="radios46" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_verifikasi46=='1') :?> checked="checked" <?php endif ;?> name="radioss46" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi46=='0') :?> checked="checked" <?php endif ;?>  name="radioss46" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_validasi46=='1') :?> checked="checked" <?php endif ;?> name="radiosss46" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi46=='0') :?> checked="checked" <?php endif ;?>  name="radiosss46" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
             <td style="text-align:center;">
					
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>3) Laporan Arus Kas
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_kelengkapan41=='1') :?> checked="checked" <?php endif ;?> name="radios41" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_kelengkapan41=='0') :?> checked="checked" <?php endif ;?>  name="radios41" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_verifikasi41=='1') :?> checked="checked" <?php endif ;?> name="radioss41" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi41=='0') :?> checked="checked" <?php endif ;?>  name="radioss41" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_validasi41=='1') :?> checked="checked" <?php endif ;?> name="radiosss41" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi41=='0') :?> checked="checked" <?php endif ;?>  name="radiosss41" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
             <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?=$data_keterangan41?>" name="keterangan41" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>4) Laporan Laba Rugi
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_kelengkapan42=='1') :?> checked="checked" <?php endif ;?> name="radios42" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_kelengkapan42=='0') :?> checked="checked" <?php endif ;?>  name="radios42" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_verifikasi42=='1') :?> checked="checked" <?php endif ;?> name="radioss42" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi42=='0') :?> checked="checked" <?php endif ;?>  name="radioss42" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_validasi42=='1') :?> checked="checked" <?php endif ;?> name="radiosss42" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi42=='0') :?> checked="checked" <?php endif ;?>  name="radiosss42" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
             <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?=$data_keterangan42?>" name="keterangan42" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>5) Laporan Perubahan Ekuitas
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_kelengkapan43=='1') :?> checked="checked" <?php endif ;?> name="radios43" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_kelengkapan43=='0') :?> checked="checked" <?php endif ;?>  name="radios43" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_verifikasi43=='1') :?> checked="checked" <?php endif ;?> name="radioss43" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi43=='0') :?> checked="checked" <?php endif ;?>  name="radioss43" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_validasi43=='1') :?> checked="checked" <?php endif ;?> name="radiosss43" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi43=='0') :?> checked="checked" <?php endif ;?>  name="radiosss43" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
             <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?=$data_keterangan43?>" name="keterangan43" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>6) Catatan Atas Laporan Keuangan
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_kelengkapan44=='1') :?> checked="checked" <?php endif ;?> name="radios44" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_kelengkapan44=='0') :?> checked="checked" <?php endif ;?>  name="radios44" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_verifikasi44=='1') :?> checked="checked" <?php endif ;?> name="radioss44" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi44=='0') :?> checked="checked" <?php endif ;?>  name="radioss44" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="1" <?php if(empty($penilaian_fkk01)) :?>checked="checked"<?php endif ;?> <?php if($data_validasi44=='1') :?> checked="checked" <?php endif ;?> name="radiosss44" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if($data_verifikasi44=='0') :?> checked="checked" <?php endif ;?> name="radiosss44" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
             <td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?=$data_keterangan44?>" name="keterangan44" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
        </tr>
	
		</table>
		<hr>
		<hr>
		<hr>
		<div class="row">


										<div class="input-group file-caption-main">
											<span class="file-caption-icon"></span>
											<textarea  name="catatan_fkk01"
												class="form-control form-control-solid" rows="5"
												placeholder="Catatan resuma..."><?php if(!empty($catatan_fkk01)) :?>
													<?=$catatan_fkk01[0]['catatan'];?>
													<?php else:?>
Catatan :
1.	Berdasarkan Ketentuan Keputusan DJBK No. ……………………  (diisi peraturan yang berlaku)
2.	Untuk Laporan Keuangan diaudit oleh Akuntan Publik: 
a.	Nama Akuntan Publik ............. (diisi berdasar LAI) (valid/tidak valid) (hapus yang tidak diperlukan)
b.	Pencantuman kode QR.   (valid/tidak valid) (hapus yang tidak diperlukan)
3.	Data inputan neraca sama/ tidak sama (hapus yang tidak diperlukan)
 dengan laporan keuangan KAP (untuk kualifikasi Besar dan Menengah)
4.	Data - data yang TIDAK VALID, antara lain :
(diambil dari kolom validasi)
5.	Hasil CEK KELENGKAPAN, VERIFIKASI DAN VALIDASI  
 Dokumen permohonan BUJK <?=$biodata[0]['nama'];?>  : SESUAI / TIDAK SESUAI  (hapus yang tidak diperlukan)
<?php endif ;?>
      </textarea>

										</div>

									</div>
									<br>
								<br>
								<button type="submit" name="submit" style="float: right" class="open-delete btn btn-primary btn-labeled btn-rounded"><b><i class="icon-paperplane"></i></b> Submit Penilaian FKK01</button>

					<?php echo form_close() ;?>	
					
								<br>
								<br>
		</section>
		
								
							
								
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