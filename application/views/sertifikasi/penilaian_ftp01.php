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
<style>
.radio {
  display: flex;
  align-items: center;
  cursor: pointer;
  position: relative;
}

/* sembunyikan input tapi tetap fokusable */
.radio input[type="radio"] {
  position: absolute;
  opacity: 0;
  width: 0;
  height: 0;
}

/* lingkaran luar */
.radio span.custom-radio {
  display: inline-block;
  width: 18px;
  height: 18px;
  border-radius: 50%;
  border: 2px solid #cfcfcf;
  background: #fff;
  margin-left: 5px;
  position: relative;
  transition: all 0.15s ease;
}

/* efek klik (warna hijau + bayangan lembut) */
.radio input.radio-hijau:checked ~ span.custom-radio {
  border-color: green;
  background: green;
  box-shadow: 0 0 0 4px rgba(0,128,0,0.12);
}

/* titik putih di tengah */
.radio input.radio-hijau:checked ~ span.custom-radio::after {
  content: "";
  position: absolute;
  top: 50%;
  left: 50%;
  width: 6px;
  height: 6px;
  background: #fff;
  border-radius: 50%;
  transform: translate(-50%, -50%);
}
</style>
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


					<a href="<?= base_url('sertifikasi/cetak_penjualan_tahunan_asesor/'.$nib_dec.'/'.$tgl_dec.'/'.$user_dec) ;?>"
							target="_blank" style="margin:5px;" class="btn btn-warning font-weight-bolder">
							<i class="flaticon2-cup"></i>FTP01</a>
					


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


								<li class="nav-item">
									<a class="nav-link" id="contact-tab-1" data-toggle="tab" href="#pengalaman"
										aria-controls="contact">
										<span class="nav-icon danger">
											<i class="flaticon2-gear text-danger"></i>
										</span>
										<span class="nav-text">Penjualan Tahunan</span>
									</a>
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
											<span class="switch switch-outline switch-icon switch-primary">

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
											<span class="switch switch-outline switch-icon switch-primary">

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
									

								
									<hr>
									<?php
										$count=0;
									 foreach($biodata_penjualan as $row_penjualan){
										$count+=1;
										for ($i=0; $i < count($biodata_penjualan); $i++) {
											if($row_penjualan['id']==$biodata_penjualan[$i]['id'] AND $row_penjualan['id_sub_klasifikasi']==$biodata_penjualan[$i]['id_sub_klasifikasi']){
												${"data_penjualan_".$row_penjualan['id']."_".substr($row_penjualan['id_izin'],2)."_".$row_penjualan['id_sub_klasifikasi']}=$row_penjualan['checklist'];
												${"data_comment_".substr($row_penjualan['id_izin'],2)."_".$row_penjualan['id_sub_klasifikasi']}=$row_penjualan['comment'];

											}
										}
									} ;?>
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
																	<a href="<?=$row_pengalaman['file_doc_a'] ;?>" target="_blank" type="button" name="btn_cek_36"  style="float: left" class=" btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																</div>




																<div class="col-md-2">
																	<div class="content-group-lg">
																		<h6 class="text-semibold">#2</h6>
																		<p class="content-group">Doc 2</p>
																	</div>
																</div>


																<div class="col-md-4">
																	<br>
																	<a href="<?=$row_pengalaman['file_doc_b'] ;?>" target="_blank" type="button" name="btn_cek_35"  style="float: left" class=" btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																</div>

															</div>-->
													<div class="row">
														<div class="col-md-2">
															<div class="content-group-lg">
																<h6 class="text-semibold">#1</h6>
																<p class="content-group">File Bash</p>
															</div>
														</div>


														<div class="col-md-4">
															<br>
															<a <?php if($row_pengalaman['file_bash']!='') :?>href="<?= $row_pengalaman['file_bash'] ;?>"
																<?php else :?>href="<?= base_url('not_found') ;?>"
																<?php endif ;?> target="_blank" type="button"
																name="btn_cek_36" style="float: left"
																class=" btn btn-primary btn-labeled btn-rounded"><b><i
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
																class=" btn btn-primary btn-labeled btn-rounded"><b><i
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
																	<td><span class="text-dark">Rp.
																			<?=number_format($row_pengalaman['nilai_kontrak'],0,",",".") ;?></span>
																	</td>
																</tr>
																<tr>
																	<td>Nilai Kontrak Sesuai Porsi</td>
																	<td><span class="text-dark">Rp.
																			<?=number_format($row_pengalaman['nilai_kontrak_sesuai_porsi'],0,",",".") ;?></span>
																	</td>

																
																</tr>
																<tr>
																	<td>Tgl BAST</td>
																	<td><span
																			class="text-dark"><?php echo $row_pengalaman['tgl_bast'] ;?></span>
																	</td>
																	
																</tr>
																<tr>
																	<td>BAST</td>
																	<td></span></td>
																	
																</tr>
																<tr>
																	<td>BOQ RAB MPU</td>
																	<td></span></td>
																
																
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
																	<td><span class="text-dark">Rp.
																			<?=number_format($row_pengalaman['nilai_kontrak_adendum'],0,",",".") ;?></span>
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
																	<td>No BAST</td>
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
						<?php echo form_open_multipart(base_url('sertifikasi/insert_penilaian_ftp01'), 'method="POST"');?>

								<section class="items">
    <table style="width:100%; border-collapse:collapse; font-family:Arial, sans-serif; font-size:13px;" border="1">
        <!-- Header baris 1 -->
        <tr style="text-align:center; font-weight:bold; background:#fce9c8;">
            <td rowspan="2">No.</td>
            <td rowspan="2">PERSYARATAN</td>
            <td colspan="2">KELENGKAPAN</td>
            <td colspan="2">VERIFIKASI</td>
            <td colspan="2">VALIDASI</td>
            <td colspan="1">KETERANGAN</td>
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
		<tr>
            <td style="text-align:center;">1.</td>
            <td>
		
					DOKUMEN PEROLEHAN PENJUALAN TAHUNAN BADAN USAHA
				
			</td>
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
			
					Penilaian terhadap jenis pekerjaan dan bukti perolehannya
				
			</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
			<td></td>
       
        </tr>
		 <?php
			
							
								if(!empty($penilaian_ftp01)){
									foreach($penilaian_ftp01 as $row_ceklis){
	 							  $count+=1;
	 							  for ($i=0; $i < count($penilaian_ftp01); $i++) {
	 							    if($row_ceklis['id']==$penilaian_ftp01[$i]['id']){
	 							      ${"data_kelengkapan".$row_ceklis['id']}=$row_ceklis['kelengkapan'];
									  ${"data_verifikasi".$row_ceklis['id']}=$row_ceklis['verifikasi'];
	 							      ${"data_validasi".$row_ceklis['id']}=$row_ceklis['validasi'];
	 							      ${"data_keterangan".$row_ceklis['id']}=$row_ceklis['keterangan'];
	 							    }
	 							  }
	 							}
								}
							  ;?>	
		 <?php $count=1 ;?>
		<?php foreach($penjualan_tahunan as $row_penjualan_tahunan):?>
			<?php $id_pengalaman=$row_penjualan_tahunan['nomor_registrasi_pengalaman'] ;?> 
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
					Rekaman Kontrak <b><?= $count ;?></b>
			
			
		
			</td>
            <td>
			<div class="form-group" style="display:flex; justify-content:center; align-items:center; height:50px;">
				<div class="radio-inline">
					<label class="radio">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?>  <?php if(${"data_kelengkapan" . $id_pengalaman . "_1"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios1" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_kelengkapan" . $id_pengalaman . "_1"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios1" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_verifikasi" . $id_pengalaman . "_1"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss1" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi" . $id_pengalaman . "_1"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss1" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_validasi" . $id_pengalaman . "_1"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss1" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_validasi" . $id_pengalaman . "_1"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss1" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
           
				<td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?= ${'data_keterangan' . $id_pengalaman . '_1'} ;?>" name="<?=$id_pengalaman;?>keterangan1" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
           
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
					Nomor Registrasi Pengalaman: <b><?=$row_penjualan_tahunan['nomor_registrasi_pengalaman']?></b>
			
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_kelengkapan" . $id_pengalaman . "_1"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios2" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_kelengkapan" . $id_pengalaman . "_2"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios2" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_verifikasi" . $id_pengalaman . "_2"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss2" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi" . $id_pengalaman . "_2"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss2" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_validasi" . $id_pengalaman . "_2"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss2" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_validasi" . $id_pengalaman . "_2"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss2" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
           
				<td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?= ${'data_keterangan' . $id_pengalaman . '_2'} ;?>" name="<?=$id_pengalaman;?>keterangan2" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
           
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
			Nama paket pekerjaan: <b><?=$row_penjualan_tahunan['nama_pengalaman']?></b>			
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_kelengkapan" . $id_pengalaman . "_3"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios3" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_kelengkapan" . $id_pengalaman . "_3"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios3" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_verifikasi" . $id_pengalaman . "_3"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss3" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi" . $id_pengalaman . "_3"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss3" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_validasi" . $id_pengalaman . "_3"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss3" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_validasi" . $id_pengalaman . "_3"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss3" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
           
				<td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?= ${'data_keterangan' . $id_pengalaman . '_3'} ;?>" name="<?=$id_pengalaman;?>keterangan3" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
           
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
			Sumber dana: <b><?=$row_penjualan_tahunan['sumber_dana']?></b>			
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_kelengkapan" . $id_pengalaman . "_4"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios4" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_kelengkapan" . $id_pengalaman . "_4"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios4" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_verifikasi" . $id_pengalaman . "_4"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss4" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi" . $id_pengalaman . "_4"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss4" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_validasi" . $id_pengalaman . "_4"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss4" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_validasi" . $id_pengalaman . "_4"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss4" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
           
				<td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?= ${'data_keterangan' . $id_pengalaman . '_4'} ;?>" name="<?=$id_pengalaman;?>keterangan4"  class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
           
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
			Lokasi Pekerjaan: <b><?=$row_penjualan_tahunan['lokasi_pekerjaan']?></b>		
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_kelengkapan" . $id_pengalaman . "_5"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios5" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_kelengkapan" . $id_pengalaman . "_5"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios5" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_verifikasi" . $id_pengalaman . "_5"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss5" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi" . $id_pengalaman . "_5"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss5" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_validasi" . $id_pengalaman . "_5"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss5" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_validasi" . $id_pengalaman . "_5"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss5" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
           
				<td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?= ${'data_keterangan' . $id_pengalaman . '_5'} ;?>" name="<?=$id_pengalaman;?>keterangan5" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
           
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
			Pemberi Tugas: <b><?=$row_penjualan_tahunan['pemberi_tugas']?></b>		
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_kelengkapan" . $id_pengalaman . "_6"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios6" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_kelengkapan" . $id_pengalaman . "_6"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios6" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_verifikasi" . $id_pengalaman . "_6"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss6" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi" . $id_pengalaman . "_6"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss6" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_validasi" . $id_pengalaman . "_6"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss6" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_validasi" . $id_pengalaman . "_6"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss6" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
           
				<td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?= ${'data_keterangan' . $id_pengalaman . '_6'} ;?>" name="<?=$id_pengalaman;?>keterangan6" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
           
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
			Nama Instansi Pemberi Tugas: <b><?=$row_penjualan_tahunan['nama_instansi_pemberi_tugas']?></b>		
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_kelengkapan" . $id_pengalaman . "_7"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios7" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_kelengkapan" . $id_pengalaman . "_7"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios7" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_verifikasi" . $id_pengalaman . "_7"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss7" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi" . $id_pengalaman . "_7"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss7" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_validasi" . $id_pengalaman . "_7"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss7" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_validasi" . $id_pengalaman . "_7"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss7" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
           
				<td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?= ${'data_keterangan' . $id_pengalaman . '_7'} ;?>" name="<?=$id_pengalaman;?>keterangan7" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
           
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
			Alamat Instansi Pemberi Tugas: <b><?=$row_penjualan_tahunan['alamat_pemberi_tugas']?></b>		
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_kelengkapan" . $id_pengalaman . "_8"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios8" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_kelengkapan" . $id_pengalaman . "_8"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios8" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_verifikasi" . $id_pengalaman . "_8"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss8" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi" . $id_pengalaman . "_8"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss8" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_validasi" . $id_pengalaman . "_8"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss8" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_validasi" . $id_pengalaman . "_8"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss8" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
           
				<td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?= ${'data_keterangan' . $id_pengalaman . '_8'} ;?>" name="<?=$id_pengalaman;?>keterangan8" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
           
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
			No Telp Instansi Pemberi Tugas: <b><?=$row_penjualan_tahunan['no_telp_instansi_pemberi_tugas']?></b>		
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_kelengkapan" . $id_pengalaman . "_9"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios9" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_kelengkapan" . $id_pengalaman . "_9"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios9" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_verifikasi" . $id_pengalaman . "_9"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss9" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi" . $id_pengalaman . "_9"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss9" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_validasi" . $id_pengalaman . "_9"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss9" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_validasi" . $id_pengalaman . "_9"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss9" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
           
				<td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?= ${'data_keterangan' . $id_pengalaman . '_9'} ;?>" name="<?=$id_pengalaman;?>keterangan9" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
           
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
			Email Instansi Pemberi Tugas: <b><?=$row_penjualan_tahunan['email_instansi']?></b>		
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_kelengkapan" . $id_pengalaman . "_10"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios10" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_kelengkapan" . $id_pengalaman . "_10"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios10" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_verifikasi" . $id_pengalaman . "_10"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss10" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi" . $id_pengalaman . "_10"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss10" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_validasi" . $id_pengalaman . "_10"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss10" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_validasi" . $id_pengalaman . "_10"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss10" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
           
				<td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?= ${'data_keterangan' . $id_pengalaman . '_10'} ;?>" name="<?=$id_pengalaman;?>keterangan10" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
           
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
			Nama Pemberi Tugas: <b><?=$row_penjualan_tahunan['nama_pemberi_tugas']?></b>		
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_kelengkapan" . $id_pengalaman . "_11"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios11" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_kelengkapan" . $id_pengalaman . "_11"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios11" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_verifikasi" . $id_pengalaman . "_11"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss11" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi" . $id_pengalaman . "_11"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss11" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_validasi" . $id_pengalaman . "_11"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss11" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_validasi" . $id_pengalaman . "_11"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss11" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
           
				<td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?= ${'data_keterangan' . $id_pengalaman . '_11'} ;?>" name="<?=$id_pengalaman;?>keterangan11" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
           
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
			Jabatan Pemberi Tugas: <b><?=$row_penjualan_tahunan['jabatan_pemberi_tugas']?></b>		
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_kelengkapan" . $id_pengalaman . "_12"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios12" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_kelengkapan" . $id_pengalaman . "_12"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios12" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_verifikasi" . $id_pengalaman . "_12"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss12" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi" . $id_pengalaman . "_12"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss12" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_validasi" . $id_pengalaman . "_12"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss12" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_validasi" . $id_pengalaman . "_12"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss12" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
           
				<td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?= ${'data_keterangan' . $id_pengalaman . '_12'} ;?>" name="<?=$id_pengalaman;?>keterangan12" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
           
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
			No Kontrak: <b><?=$row_penjualan_tahunan['nomor_kontrak']?></b>		
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_kelengkapan" . $id_pengalaman . "_13"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios13" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_kelengkapan" . $id_pengalaman . "_13"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios13" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_verifikasi" . $id_pengalaman . "_13"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss13" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi" . $id_pengalaman . "_13"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss13" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_validasi" . $id_pengalaman . "_13"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss13" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_validasi" . $id_pengalaman . "_13"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss13" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
           
				<td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?= ${'data_keterangan' . $id_pengalaman . '_13'} ;?>" name="<?=$id_pengalaman;?>keterangan13" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
           
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
			Tanggal Kontrak: <b><?=$row_penjualan_tahunan['tgl_kontrak']?></b>		
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_kelengkapan" . $id_pengalaman . "_14"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios14" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_kelengkapan" . $id_pengalaman . "_14"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios14" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_verifikasi" . $id_pengalaman . "_14"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss14" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi" . $id_pengalaman . "_14"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss14" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_validasi" . $id_pengalaman . "_14"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss14" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_validasi" . $id_pengalaman . "_14"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss14" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
           
				<td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?= ${'data_keterangan' . $id_pengalaman . '_14'} ;?>" name="<?=$id_pengalaman;?>keterangan14" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
           
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
			Nilai Kontrak: <b><?=$row_penjualan_tahunan['nilai_kontrak']?></b>		
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_kelengkapan" . $id_pengalaman . "_15"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios15" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_kelengkapan" . $id_pengalaman . "_15"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios15" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_verifikasi" . $id_pengalaman . "_15"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss15" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi" . $id_pengalaman . "_15"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss15" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_validasi" . $id_pengalaman . "_15"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss15" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_validasi" . $id_pengalaman . "_15"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss15" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
           
				<td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?= ${'data_keterangan' . $id_pengalaman . '_15'} ;?>" name="<?=$id_pengalaman;?>keterangan15" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
           
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
			Nilai Kontrak (setelah addendum): <b><?=$row_penjualan_tahunan['nilai_kontrak_adendum']?></b>		
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_kelengkapan" . $id_pengalaman . "_16"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios16" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_kelengkapan" . $id_pengalaman . "_16"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios16" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_verifikasi" . $id_pengalaman . "_16"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss16" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi" . $id_pengalaman . "_16"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss16" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_validasi" . $id_pengalaman . "_16"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss16" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_validasi" . $id_pengalaman . "_16"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss16" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
           
				<td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?= ${'data_keterangan' . $id_pengalaman . '_16'} ;?>" name="<?=$id_pengalaman;?>keterangan16" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
           
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
			Status KSO: <b><?=$row_penjualan_tahunan['status_kso']?></b>		
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_kelengkapan" . $id_pengalaman . "_17"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios17" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_kelengkapan" . $id_pengalaman . "_17"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios17" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_verifikasi" . $id_pengalaman . "_17"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss17" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi" . $id_pengalaman . "_17"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss17" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_validasi" . $id_pengalaman . "_17"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss17" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_validasi" . $id_pengalaman . "_17"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss17" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
           
				<td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?= ${'data_keterangan' . $id_pengalaman . '_17'} ;?>" name="<?=$id_pengalaman;?>keterangan17" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
           
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
			Presentase Porsi: <b><?=$row_penjualan_tahunan['presentase_porsi']?></b>		
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_kelengkapan" . $id_pengalaman . "_18"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios18" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_kelengkapan" . $id_pengalaman . "_18"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios18" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_verifikasi" . $id_pengalaman . "_18"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss18" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi" . $id_pengalaman . "_18"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss18" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_validasi" . $id_pengalaman . "_18"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss18" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_validasi" . $id_pengalaman . "_18"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss18" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
           
				<td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?= ${'data_keterangan' . $id_pengalaman . '_18'} ;?>" name="<?=$id_pengalaman;?>keterangan18" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
           
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
			Nilai Kontrak sesuai Porsi: <b><?=$row_penjualan_tahunan['nilai_kontrak_sesuai_porsi']?></b>		
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_kelengkapan" . $id_pengalaman . "_19"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios19" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_kelengkapan" . $id_pengalaman . "_19"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios19" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_verifikasi" . $id_pengalaman . "_19"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss19" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi" . $id_pengalaman . "_19"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss19" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_validasi" . $id_pengalaman . "_19"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss19" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_validasi" . $id_pengalaman . "_19"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss19" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
           
				<td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?= ${'data_keterangan' . $id_pengalaman . '_19'} ;?>" name="<?=$id_pengalaman;?>keterangan19" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
           
        </tr>
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
			No BA Serah Terima: <b><?=$row_penjualan_tahunan['no_bash']?></b>		
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_kelengkapan" . $id_pengalaman . "_20"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios20" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_kelengkapan" . $id_pengalaman . "_20"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios20" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_verifikasi" . $id_pengalaman . "_20"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss20" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi" . $id_pengalaman . "_20"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss20" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_validasi" . $id_pengalaman . "_20"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss20" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_validasi" . $id_pengalaman . "_20"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss20" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
           
				<td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?= ${'data_keterangan' . $id_pengalaman . '_20'} ;?>" name="<?=$id_pengalaman;?>keterangan20" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
           
        </tr>
		
		<tr>
            <td style="text-align:center;"></td>
            <td>
	
				
			Tanggal BA Serah Terima: <b><?=$row_penjualan_tahunan['tgl_bash']?></b>		
			
		
			</td>
            <td>
			<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_kelengkapan" . $id_pengalaman . "_21"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios21" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_kelengkapan" . $id_pengalaman . "_21"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radios21" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_verifikasi" . $id_pengalaman . "_21"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss21" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div>
			</td>
		<input type="hidden" name="id_izin" value="<?=$klasifikasi[0]['id_izin'];?>">

			<input type="hidden" value="<?php echo $nib_dec ;?>" name="id1">
		<input type="hidden" value="<?php echo $tgl_dec ;?>" name="id2">
		<input type="hidden" value="<?php echo $user_dec ;?>" name="id3">
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_verifikasi" . $id_pengalaman . "_21"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radioss21" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
            <td><div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" class="radio-hijau" value="1" <?php if(empty($penilaian_ftp01)) :?>checked="checked"<?php endif ;?> <?php if(${"data_validasi" . $id_pengalaman . "_21"}=='1') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss21" />
						<span class="custom-radio"></span>
					</label>
				</div>
			</div></td>
            <td>
				<div class="form-group" style="display: flex; justify-content: center; align-items: center; height: 50px;">
				<div class="radio-inline">
					<label class="radio" style="display: flex; align-items: center;">
						<input type="radio" value="0" <?php if(${"data_validasi" . $id_pengalaman . "_21"}=='0') :?> checked="checked"<?php endif ;?> name="<?=$id_pengalaman;?>radiosss21" />
						<span style="margin-left: 5px;"></span>
					</label>
				</div>
			</div>
			</td>
           
				<td style="text-align:center;">
					<div class="input-group file-caption-main">
					<span class="file-caption-icon"></span>
					<input type="text" value="<?= ${'data_keterangan' . $id_pengalaman . '_21'} ;?>" name="<?=$id_pengalaman;?>keterangan21" class="form-control" placeholder="Isian Asesor...">
				</div>
			
			</td>
           
        </tr>
		<?php $count+=1 ;?>
			<?php endforeach ;?>
		</table>
			
		</section>
					<br>
<hr>
<br>
<!-- CATATAN LSBU -->
<section class="items">
  <!-- Judul -->
  <div class="row">
    <div class="col-1-40-table" colspan="2">
      <div class="center"><strong>Comment Penilaian Kesuaian Asesor</strong></div>
    </div>
  </div>

  <!-- Catatan dan TTD -->
  <div class="row">
	<div class="input-group file-caption-main">
		<span class="file-caption-icon"></span>
		<textarea id="comment_res" name="catatan_ftp01"class="form-control form-control-solid" rows="5"placeholder="Catatan resuma...">
			<?php if(!empty($catatan_ftp01)) :?>
			<?=$catatan_ftp01[0]['catatan'] ;?>
			<?php else :?>
		Catatan :

1.	nilai kontrak diisi dengan nilai proyek yang merupakan hasil perkalian nilai kontrak terakhir dengan porsi pekerjaan utama/major item sesuai subklasifikasi yang dimohonkan

2.	Semuanya belum pernah digunakan untuk Subklasifikasi lain :  Ya / Tidak (hapus yang tidak diperlukan) 

3.	Semuanya Dari penjualan tahunan 9 tahun terakhir  :  Ya / Tidak (hapus yang tidak diperlukan

4.	Secara keseluruhan Hasil CEK KELENGKAPAN, VERIFIKASI DAN VALIDASI Dokumen ................... : SESUAI / TIDAK SESUAI  (hapus yang tidak diperlukan)

5.	Permohonan kualifikasi M dan B wajib dipenuhi dengan pengalaman yang diperoleh sesuai lingkup SBU

6.	Catatan Lain :
<?php endif ;?>
      </textarea>

	</div>
   

  
  </div>

<br>
								<br>
								<button type="submit" name="submit" style="float: right" class="open-delete btn btn-primary btn-labeled btn-rounded"><b><i class="icon-paperplane"></i></b> Submit Penilaian FTP01</button>

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