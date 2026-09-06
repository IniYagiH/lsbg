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
	echo script_tag('assets/lsbu.js');
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
          <h2 class="text-white font-weight-bold my-2 mr-5">Tinjauan Permohonan</h2>
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
            <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Tinjauan Permohonan</a>
            <!--end::Item-->
          </div>
          <!--end::Breadcrumb-->
        </div>
        <!--end::Heading-->
      </div>

    </div>
  </div>

  <div class="d-flex flex-column-fluid">
    <div class="container">
			<div class="card card-custom gutter-b">
				<div class="card-header">
					<div class="card-title">
						<h3 class="card-label">Validasi Permohonan</h3>


					</div>
					<div class="card-toolbar">
						<!--
						<a href="<?= base_url('sertifikasi/verifikasi_permohonan/'.$nib_dec.'/'.$tgl_dec) ;?>" target="_blank" class="btn btn-primary font-weight-bolder">
						<i class="la la-plus"></i>Verifikasi</a>
					-->
					</div>
				</div>

				<div class="card-body">
					<br>
					<div class="example mb-10">
						<input type="hidden" id="base_url" value="<?php echo base_url('sertifikasi/permintaan_revisi') ;?>" >

						<div class="example-preview">
							<ul class="nav nav-pills" id="myTab1" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="home-tab-1" data-toggle="tab" href="#administrasi">
										<span class="nav-icon">
											<i class="flaticon2-chat-1"></i>
										</span>
										<span class="nav-text">Administrasi</span>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="profile-tab-1" data-toggle="tab" href="#pengurus" aria-controls="profile">
										<span class="nav-icon">
											<i class="flaticon2-layers-1"></i>
										</span>
										<span class="nav-text">Pengurus</span>
									</a>
								</li>

								<li class="nav-item">
									<a class="nav-link" id="contact-tab-1" data-toggle="tab" href="#pengalaman" aria-controls="contact">
										<span class="nav-icon">
											<i class="flaticon2-rocket-1"></i>
										</span>
										<span class="nav-text">Pengalaman</span>
									</a>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
										<span class="nav-icon">
											<i class="flaticon2-rocket-1"></i>
										</span>
										<span class="nav-text">Akte</span>
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" data-toggle="tab" href="#akte_pendirian">Akte Pendirian</a>
										<a class="dropdown-item" data-toggle="tab" href="#akte_perubahan">Akte Perubahan</a>

									</div>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
										<span class="nav-icon">
											<i class="flaticon2-rocket-1"></i>
										</span>
										<span class="nav-text">Keuangan</span>
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" data-toggle="tab" href="#pph_omset">PPH dan Omset</a>
										<a class="dropdown-item" data-toggle="tab" href="#pemegang_saham">Pemegang Saham</a>
										<a class="dropdown-item" data-toggle="tab" href="#neraca">Neraca</a>

									</div>
								</li>

								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
										<span class="nav-icon">
											<i class="flaticon2-rocket-1"></i>
										</span>
										<span class="nav-text">Unit Kerja</span>
									</a>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" data-toggle="tab" href="#tenaga_kerja">Tenaga Kerja</a>
										<a class="dropdown-item" data-toggle="tab" href="#peralatan">Peralatan</a>
									</div>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="contact-tab-1" data-toggle="tab" href="#klasifikasi_kualifikasi" aria-controls="contact">
										<span class="nav-icon">
											<i class="flaticon2-rocket-1"></i>
										</span>
										<span class="nav-text">Klasifikasi</span>
									</a>
								</li>

							</ul>
							<?php if(!empty($cek)) :?>
							<?php echo form_open_multipart(base_url('sertifikasi/insert_validasi'), 'method="POST"');?>
						<?php endif ;?>
							<div class="tab-content mt-5" id="myTabContent1">
								<div class="tab-pane fade show active" id="administrasi" role="tabpanel" aria-labelledby="home-tab-1">
									<?php if(!empty($biodata)) :?>
										<div class="col-md-12">
											<div class="panel panel-flat panel-collapsed">
												<div class="panel-heading">
													<h5 class="panel-title">Personalia</h5>
													<div class="heading-elements">

																	</div>
												</div>

													<div class="panel-body" >
														<!--#1-->
														<div class="row">
															<div class="col-md-3">
																<div class="content-group-lg">
																	<h6 class="text-semibold">#1</h6>
																	<p class="content-group">Izin Bagi Penanam Modal dari BKPM yang terbaru (Bagi PMA)</p>
																</div>
															</div>

															<div class="col-md-1">
																<font class="text-semibold" style="font-size: 12px;">Switch in</font>
																<span class="switch switch-outline switch-icon switch-primary">

																	<label>
																		<input type="checkbox" checked="checked" id="checkbox_13" value="1" onclick="javascript:checkbox13()" name="checkbox_13" />
																		<span></span>
																	</label>
																</span>

															</div>
															<div class="col-md-2">
																<br>
																<a href="<?php echo base_url('get_file/get_bu_13/').$biodata[0]['persyaratan_13'] ;?>" target="_blank" type="button" name="btn_cek_13"  style="float: right" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
															</div>
																<div class="col-md-6">
																	<br>
																	<div class="input-group file-caption-main">
																		<span class="file-caption-icon"></span>
																		<input type="text" id="comment_13" name="comment_13"   class="form-control" disabled="disabled" placeholder="Comment...">


																	<div class="input-group-btn input-group-append">
																		<button type="button" onclick="javascript:get13()" id="get_13"  disabled="disabled" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
																			</div>
																	</div>
																</div>
														</div>
														<!--2-->
														<div class="row">
															<div class="col-md-3">
																<div class="content-group-lg">
																	<h6 class="text-semibold">#2</h6>
																	<p class="content-group">Surat Keterangan Domisili atau SITU yang masih berlaku</p>
																</div>
															</div>

															<div class="col-md-1">
																<font class="text-semibold" style="font-size: 12px;">Switch in</font>
																<span class="switch switch-outline switch-icon switch-primary">

																	<label>
																		<input type="checkbox" checked="checked" id="checkbox_11" value="1" onclick="javascript:checkbox11()" name="checkbox_11" />
																		<span></span>
																	</label>
																</span>

															</div>
															<div class="col-md-2">
																<br>
																<a href="<?php echo base_url('get_file/get_bu_11/').$biodata[0]['persyaratan_11'] ;?>" target="_blank" type="button" name="btn_cek_11"  style="float: right" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
															</div>
																<div class="col-md-6">
																	<br>
																	<div class="input-group file-caption-main">
																		<span class="file-caption-icon"></span>
																		<input type="text" id="comment_11" name="comment_11"   class="form-control" disabled="disabled" placeholder="Comment...">


																	<div class="input-group-btn input-group-append">
																		<button type="button" onclick="javascript:get11()" id="get_11"  disabled="disabled" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
																			</div>
																	</div>
																</div>
														</div>
														<!--3-->
														<div class="row">
															<div class="col-md-3">
																<div class="content-group-lg">
																	<h6 class="text-semibold">#3</h6>
																	<p class="content-group">NPWP Perusahaan</p>
																</div>
															</div>

															<div class="col-md-1">
																<font class="text-semibold" style="font-size: 12px;">Switch in</font>
																<span class="switch switch-outline switch-icon switch-primary">

																	<label>
																		<input type="checkbox" checked="checked" id="checkbox_9" value="1" onclick="javascript:checkbox9()" name="checkbox_9" />
																		<span></span>
																	</label>
																</span>

															</div>
															<div class="col-md-2">
																<br>
																<a href="<?php echo base_url('get_file/get_bu_9/').$biodata[0]['persyaratan_9'] ;?>" target="_blank" type="button" name="btn_cek_11"  style="float: right" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
															</div>
																<div class="col-md-6">
																	<br>
																	<div class="input-group file-caption-main">
																		<span class="file-caption-icon"></span>
																		<input type="text" id="comment_9" name="comment_9"   class="form-control" disabled="disabled" placeholder="Comment...">


																	<div class="input-group-btn input-group-append">
																		<button type="button" onclick="javascript:get9()" id="get_9"  disabled="disabled" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
																			</div>
																	</div>
																</div>
														</div>
														<!--4-->
														<div class="row">
															<div class="col-md-3">
																<div class="content-group-lg">
																	<h6 class="text-semibold">#4</h6>
																	<p class="content-group">Sertifikat ISO 9001 - 2008</p>
																</div>
															</div>

															<div class="col-md-1">
																<font class="text-semibold" style="font-size: 12px;">Switch in</font>
																<span class="switch switch-outline switch-icon switch-primary">

																	<label>
																		<input type="checkbox" checked="checked" id="checkbox_39" value="1" onclick="javascript:checkbox39()" name="checkbox_39" />
																		<span></span>
																	</label>
																</span>

															</div>
															<div class="col-md-2">
																<br>
																<a href="<?php echo base_url('get_file/get_bu_39/').$biodata[0]['persyaratan_39'] ;?>" target="_blank" type="button" name="btn_cek_39"  style="float: right" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
															</div>
																<div class="col-md-6">
																	<br>
																	<div class="input-group file-caption-main">
																		<span class="file-caption-icon"></span>
																		<input type="text" id="comment_39" name="comment_39"   class="form-control" disabled="disabled" placeholder="Comment...">


																	<div class="input-group-btn input-group-append">
																		<button type="button" onclick="javascript:get39()" id="get_39"  disabled="disabled" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
																			</div>
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
													<p class="content-group"><span class="text-danger">Administrasi</span></p>
												</div>
											</div>

											<div class="col-md-1">
												<font class="text-semibold" style="font-size: 11px;">Tidak/Ada</font>
												<span class="switch switch-outline switch-icon switch-danger">

													<label>
														<input type="checkbox" checked="checked" id="checkbox_administrasi" value="1" name="checkbox_administrasi" />
														<span></span>
													</label>
												</span>

											</div>

												<div class="col-md-8">
													<br>
													<div class="input-group file-caption-main">
														<span class="file-caption-icon"></span>
														<input type="text"  id="comment_administrasi" name="comment_administrasi"   class="form-control"  placeholder="Comment...">



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
														<td><span class="text-primary"><?php echo $biodata[0]['nama'] ;?></span></td>

													</tr>
													<tr>
														<td>NIB</td>
														<td><span class="text-primary"><?php echo $biodata[0]['NIB'] ;?></span></td>

													</tr>
													<tr>
														<td>Sifat Usaha</td>
														<td><span class="text-primary"><?php echo $biodata[0]['sifat_usaha'] ;?></span></td>

													</tr>
													<tr>
														<td>Jenis Usaha</td>
														<td><span class="text-primary"><?php echo $biodata[0]['jenis_usaha'] ;?></span></td>

													</tr>
													<tr>
														<td>Klasifikasi Jenis Usaha</td>
														<td><span class="text-primary"><?php echo $biodata[0]['klasifikasi_jenis_usaha'] ;?></span></td>

													</tr>

													<tr>
														<td>Alamat Domisili Hukum</td>
														<td><span class="text-primary"><?php echo $biodata[0]['alamat_bu'] ;?></span></td>
													</tr>
													<tr>
														<td>Propinsi Registrasi</td>
														<td><span class="text-primary"><?php echo $biodata[0]['id_propinsi'] ;?></span></td>
													</tr>
													<tr>
														<td>Kabupaten/Kota</td>
														<td><span class="text-primary"><?php echo $biodata[0]['id_kabupaten'] ;?></span></td>
													</tr>
													<tr>
														<td>Telepon</td>
														<td><span class="text-primary"><?php echo $biodata[0]['telepon'] ;?></span></td>
													</tr>
													<tr>
														<td>Faximili</td>
														<td><span class="text-primary"><?php echo $biodata[0]['fax'] ;?></span></td>
													</tr>
													<tr>
														<td>Kodepos</td>
														<td><span class="text-primary"><?php echo $biodata[0]['kodepos'] ;?></span></td>
													</tr>
													<tr>
														<td>Email</td>
														<td><span class="text-primary"><?php echo $biodata[0]['email'] ;?></span></td>
													</tr>
													<tr>
														<td>Website</td>
														<td><span class="text-primary"><?php echo $biodata[0]['web'] ;?></span></td>
													</tr>


												</tbody>
											</table>
										</div>
									</div>
									<?php endif ;?>
								</div>
								<?php $counter_pengurus=0;
								$counter_pengalaman=0;
								$counter_perubahan=0;
								$counter_saham=0;
								$counter_neraca=0;
								$counter_tk=0;
								$counter_klasifikasi=0;?>

								<div class="tab-pane fade" id="pengurus" role="tabpanel" aria-labelledby="profile-tab-1">
									<?php if(!empty($pengurus)) :?>
										<div class="row">
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
																		 <option data-text="<?php echo $row_pengurus2['nama'] ;?>" value="<?php echo $row_pengurus2['id_pengurus'] ;?>"><?php echo $row_pengurus2['nama'] ;?></option>
																	<?php endforeach ;?>
																 </select>
																 <input type="hidden" id="nama_pengurus" >
																 <footer class="blockquote-footer">
																 Pilih Nama Pengurus
																</footer>


														</div>

												</div>
										</div>


										<div class="row">
											<div class="col-md-3">
												<div class="content-group-lg">
													<h6 class="text-semibold">#1</h6>
													<p class="content-group">Riwayat Hidup</p>
												</div>
											</div>

											<div class="col-md-1">
												<font class="text-semibold" style="font-size: 12px;">Switch in</font>
												<span class="switch switch-outline switch-icon switch-primary">

													<label>
														<input type="checkbox" checked="checked" id="checkbox_16" value="1" onclick="javascript:checkbox16()" name="checkbox_16" />
														<span></span>
													</label>
												</span>

											</div>

												<div class="col-md-8">
													<br>
													<div class="input-group file-caption-main">
														<span class="file-caption-icon"></span>
														<input type="text" id="comment_16" name="comment_16"   class="form-control" disabled="disabled" placeholder="Comment...">


													<div class="input-group-btn input-group-append">
														<button type="button" onclick="javascript:get16()" id="get_16"  disabled="disabled" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
															</div>
													</div>
												</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<div class="content-group-lg">
													<h6 class="text-semibold">#2</h6>
													<p class="content-group">Pernyataan Bukan PNS,TNI/POLRI</p>
												</div>
											</div>

											<div class="col-md-1">
												<font class="text-semibold" style="font-size: 12px;">Switch in</font>
												<span class="switch switch-outline switch-icon switch-primary">

													<label>
														<input type="checkbox" checked="checked" id="checkbox_17" value="1" onclick="javascript:checkbox17()" name="checkbox_17" />
														<span></span>
													</label>
												</span>

											</div>

												<div class="col-md-8">
													<br>
													<div class="input-group file-caption-main">
														<span class="file-caption-icon"></span>
														<input type="text" id="comment_17" name="comment_17"   class="form-control" disabled="disabled" placeholder="Comment...">


													<div class="input-group-btn input-group-append">
														<button type="button" onclick="javascript:get17()" id="get_17"  disabled="disabled" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
															</div>
													</div>
												</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<div class="content-group-lg">
													<h6 class="text-semibold">#3</h6>
													<p class="content-group">KTP Pengurus</p>
												</div>
											</div>

											<div class="col-md-1">
												<font class="text-semibold" style="font-size: 12px;">Switch in</font>
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
														<button type="button" onclick="javascript:get14()" id="get_14"  disabled="disabled" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
															</div>
													</div>
												</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<div class="content-group-lg">
													<h6 class="text-semibold">#4</h6>
													<p class="content-group">Photo PJBU</p>
												</div>
											</div>

											<div class="col-md-1">
												<font class="text-semibold" style="font-size: 12px;">Switch in</font>
												<span class="switch switch-outline switch-icon switch-primary">

													<label>
														<input type="checkbox" checked="checked" id="checkbox_18" value="1" onclick="javascript:checkbox18()" name="checkbox_18" />
														<span></span>
													</label>
												</span>

											</div>

												<div class="col-md-8">
													<br>
													<div class="input-group file-caption-main">
														<span class="file-caption-icon"></span>
														<input type="text" id="comment_18" name="comment_18"   class="form-control" disabled="disabled" placeholder="Comment...">


													<div class="input-group-btn input-group-append">
														<button type="button" onclick="javascript:get18()" id="get_18"  disabled="disabled" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
															</div>
													</div>
												</div>
										</div>
										<div class="row">
											<div class="col-md-3">
												<div class="content-group-lg">
													<h6 class="text-semibold">#5</h6>
													<p class="content-group">NPWP</p>
												</div>
											</div>

											<div class="col-md-1">
												<font class="text-semibold" style="font-size: 12px;">Switch in</font>
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
														<button type="button" onclick="javascript:get15()" id="get_15"  disabled="disabled" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
															</div>
													</div>
												</div>
										</div>

										<hr>
										<div class="row">
											<div class="col-md-3">
												<div class="content-group-lg">
													<h6 class="text-semibold"><span class="text-danger">#CEKLIS</span></h6>
													<p class="content-group"><span class="text-danger">Pengurus</span></p>
												</div>
											</div>

											<div class="col-md-1">
												<font class="text-semibold" style="font-size: 11px;">Tidak/Ada</font>
												<span class="switch switch-outline switch-icon switch-danger">

													<label>
														<input type="checkbox" checked="checked" id="checkbox_pengurus" value="1" name="checkbox_pengurus" />
														<span></span>
													</label>
												</span>

											</div>

												<div class="col-md-8">
													<br>
													<div class="input-group file-caption-main">
														<span class="file-caption-icon"></span>
														<input type="text"  id="comment_pengurus" name="comment_pengurus"  class="form-control"  placeholder="Comment...">



													</div>
												</div>
										</div>
										<hr>

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
																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#1</h6>
																			<p class="content-group">Riwayat Hidup</p>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<br>
																		<a href="<?php echo base_url('get_file/get_bu_16/').$row_pengurus['persyaratan_16'] ;?>" target="_blank" type="button" name="btn_cek_16"  style="float: left" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																	</div>


																<!--#2-->

																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#2</h6>
																			<p class="content-group">Pernyataan Bukan PNS,TNI/POLRI</p>
																		</div>
																	</div>


																	<div class="col-md-3">
																		<br>
																		<a href="<?php echo base_url('get_file/get_bu_17/').$row_pengurus['persyaratan_17'] ;?>" target="_blank" type="button" name="btn_cek_17"  style="float: left" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																	</div>

																</div>
																<!--#3-->
																<div class="row">
																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#3</h6>
																			<p class="content-group">KTP Pengurus</p>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<br>
																		<a href="<?php echo base_url('get_file/get_bu_14/').$row_pengurus['persyaratan_14'] ;?>" target="_blank" type="button" name="btn_cek_14"  style="float: left" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																	</div>


																<!--#4-->

																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#4</h6>
																			<p class="content-group">Photo PJBU</p>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<br>
																		<a href="<?php echo base_url('get_file/get_bu_18/').$row_pengurus['persyaratan_18'] ;?>" target="_blank" type="button" name="btn_cek_18"  style="float: left" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																	</div>

																</div>
																<!--#5-->
																<div class="row">
																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#5</h6>
																			<p class="content-group">NPWP</p>
																		</div>
																	</div>

																	<div class="col-md-4">
																		<br>
																		<a href="<?php echo base_url('get_file/get_bu_15/').$row_pengurus['persyaratan_15'] ;?>" target="_blank" type="button" name="btn_cek_15"  style="float: left" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
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
																				<td><span class="text-primary"><?php echo $row_pengurus['nama'] ?></span></td>


																			</tr>
																			<tr>
																				<td>No KTP</td>
																				<td><span class="text-primary"><?php echo $row_pengurus['no_ktp'] ?></span></td>
																			</tr>
																			<tr>
																				<td>NPWP</td>
																				<td><span class="text-primary"><?php echo $row_pengurus['npwp'] ?></span></td>
																			</tr>
																			<tr>
																				<td>Status Jabatan</td>
																				<td><span class="text-primary"><?php echo $row_pengurus['id_jabatan'] ?></span></td>
																			</tr>
																			<tr>
																				<td>Tempat Lahir</td>
																				<td><span class="text-primary"><?php echo $row_pengurus['tempat_lahir'] ?></span></td>
																			</tr>
																			<tr>
																				<td>Tanggal Lahir</td>
																				<td><span class="text-primary"><?php echo $row_pengurus['tgl_lahir'] ?></span></td>
																			</tr>
																			<tr>
																				<td>Jabatan BU</td>
																				<td><span class="text-primary"><?php echo $row_pengurus['jabatan_bu'] ?></span></td>
																			</tr>
																			<tr>
																				<td>Jalan</td>
																				<td><span class="text-primary"><?php echo $row_pengurus['alamat'] ?></span></td>
																			</tr>
																			<tr>
																				<td>Kodepos</td>
																				<td><span class="text-primary"><?php echo $row_pengurus['kodepos'] ?></span></td>
																			</tr>
																			<tr>
																				<td>Propinsi</td>
																				<td><span class="text-primary"><?php echo $row_pengurus['id_propinsi'] ?></span></td>
																			</tr>
																			<tr>
																				<td>Kabupaten</td>
																				<td><span class="text-primary"><?php echo $row_pengurus['id_kabupaten'] ?></span></td>
																			</tr>
																			<tr>
																				<td>Pendidikan Terakhir</td>
																				<td><span class="text-primary"></span></td>
																			</tr>
																			<tr>
																				<td>No Ijazah</td>
																				<td><span class="text-primary"><?php echo $row_pengurus['no_ijazah'] ?></span></td>
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
								<div class="tab-pane fade" id="pengalaman" role="tabpanel" aria-labelledby="contact-tab-1">
									<div class="row">
										<div class="col-md-5">
											<div class="content-group-lg">
												<h6 class="text-semibold">#</h6>
												<p class="content-group">SELECT</p>
											</div>
										</div>



											<div class="col-md-4">
												<br>

													<div class="form-group">


															<select name="nama_paket" id="nomor_kontrak" class="form-control">
																<?php foreach ($pengalaman as $row_pengalaman2) :?>
																	 <option value="<?php echo $row_pengalaman2['nomor_kontrak'] ;?>"><?php echo $row_pengalaman2['nomor_kontrak'] ;?></option>
																<?php endforeach ;?>
															 </select>
															 <footer class="blockquote-footer">
																Pilih Nomor Kontrak
															 </footer>

													</div>

											</div>
											<div class="col-md-3">
												<br>

													<div class="form-group">


															<select name="id_sub_pengalaman" id="id_sub_pengalaman" class="form-control">
																<?php foreach ($pengalaman as $row_pengalaman2) :?>
																	 <option value="<?php echo $row_pengalaman2['id_sub_klasifikasi'] ;?>"><?php echo $row_pengalaman2['id_sub_klasifikasi'] ;?></option>
																<?php endforeach ;?>
															 </select>
															 <footer class="blockquote-footer">
																 Pilih ID Sub Klasifikasi
															 </footer>

													</div>

											</div>
									</div>

									<div class="row">
										<div class="col-md-3">
											<div class="content-group-lg">
												<h6 class="text-semibold">#1</h6>
												<p class="content-group">Surat Pernyataan Pecah Kontrak</p>
											</div>
										</div>

										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 12px;">Switch in</font>
											<span class="switch switch-outline switch-icon switch-primary">

												<label>
													<input type="checkbox" checked="checked" id="checkbox_36" value="1" onclick="javascript:checkbox36()" name="checkbox_36" />
													<span></span>
												</label>
											</span>

										</div>

											<div class="col-md-8">
												<br>
												<div class="input-group file-caption-main">
													<span class="file-caption-icon"></span>
													<input type="text" id="comment_36" name="comment_36"   class="form-control" disabled="disabled" placeholder="Comment...">


												<div class="input-group-btn input-group-append">
													<button type="button" onclick="javascript:get36()" id="get_36"  disabled="disabled" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
														</div>
												</div>
											</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<div class="content-group-lg">
												<h6 class="text-semibold">#2</h6>
												<p class="content-group">Faktur Pajak Pertambahan Nilai/PPN</p>
											</div>
										</div>

										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 12px;">Switch in</font>
											<span class="switch switch-outline switch-icon switch-primary">

												<label>
													<input type="checkbox" checked="checked" id="checkbox_35" value="1" onclick="javascript:checkbox35()" name="checkbox_35" />
													<span></span>
												</label>
											</span>

										</div>
										<input type="hidden" id="email_bu" name="tgl_dec" value="<?php echo $tgl_dec ;?>">
										<input type="hidden" id="alamat_bu" name="nib_dec" value="<?php echo $nib_dec ;?>">
											<div class="col-md-8">
												<br>
												<div class="input-group file-caption-main">
													<span class="file-caption-icon"></span>
													<input type="text" id="comment_35" name="comment_35"   class="form-control" disabled="disabled" placeholder="Comment...">


												<div class="input-group-btn input-group-append">
													<button type="button" onclick="javascript:get35()" id="get_35"  disabled="disabled" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
														</div>
												</div>
											</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<div class="content-group-lg">
												<h6 class="text-semibold">#3</h6>
												<p class="content-group">PHO</p>
											</div>
										</div>

										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 12px;">Switch in</font>
											<span class="switch switch-outline switch-icon switch-primary">

												<label>
													<input type="checkbox" checked="checked" id="checkbox_34" value="1" onclick="javascript:checkbox34()" name="checkbox_34" />
													<span></span>
												</label>
											</span>

										</div>

											<div class="col-md-8">
												<br>
												<div class="input-group file-caption-main">
													<span class="file-caption-icon"></span>
													<input type="text" id="comment_34" name="comment_34"   class="form-control" disabled="disabled" placeholder="Comment...">


												<div class="input-group-btn input-group-append">
													<button type="button" onclick="javascript:get34()" id="get_34"  disabled="disabled" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
														</div>
												</div>
											</div>
									</div>
									<div class="row">
										<div class="col-md-3">
											<div class="content-group-lg">
												<h6 class="text-semibold">#4</h6>
												<p class="content-group">Rekaman Kontrak</p>
											</div>
										</div>

										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 12px;">Switch in</font>
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
													<button type="button" onclick="javascript:get32()" id="get_32"  disabled="disabled" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
														</div>
												</div>
											</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-md-3">
											<div class="content-group-lg">
												<h6 class="text-semibold"><span class="text-danger">#CEKLIS</span></h6>
												<p class="content-group"><span class="text-danger">Pengalaman</span></p>
											</div>
										</div>

										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 11px;">Tidak/Ada</font>
											<span class="switch switch-outline switch-icon switch-danger">

												<label>
													<input type="checkbox" checked="checked" id="checkbox_pengalaman" value="1" name="checkbox_pengalaman" />
													<span></span>
												</label>
											</span>

										</div>

											<div class="col-md-8">
												<br>
												<div class="input-group file-caption-main">
													<span class="file-caption-icon"></span>
													<input type="text"  id="comment_pengalaman" name="comment_pengalaman"  class="form-control"  placeholder="Comment...">

												</div>
											</div>
									</div>
									<hr>

									<div class="accordion accordion-toggle-arrow" id="accordionExample1">

											<?php foreach ($pengalaman as $row_pengalaman) :?>
												<?php $counter_pengalaman+=1 ;?>
										<div class="card">
												<div class="card-header">
														<div class="card-title collapsed" data-toggle="collapse" data-target="#data-pengalaman-<?php echo $counter_pengalaman ;?>">
															<?php echo $row_pengalaman['nama_pengalaman'] ;?>
														</div>
												</div>
												<div id="data-pengalaman-<?php echo $counter_pengalaman ;?>" class="collapse show" data-parent="#accordionExample1">

														<div class="card-body">
															<!--#1-->
															<div class="row">
																<div class="col-md-2">
																	<div class="content-group-lg">
																		<h6 class="text-semibold">#1</h6>
																		<p class="content-group">Surat Pernyataan Pecah Kontrak</p>
																	</div>
																</div>


																<div class="col-md-4">
																	<br>
																	<a href="<?php echo base_url('get_file/get_bu_36/').$row_pengalaman['persyaratan_36'] ;?>" target="_blank" type="button" name="btn_cek_36"  style="float: left" class=" btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																</div>


															<!--#2-->

																<div class="col-md-2">
																	<div class="content-group-lg">
																		<h6 class="text-semibold">#2</h6>
																		<p class="content-group">Faktur Pajak Pertambahan Nilai/PPN</p>
																	</div>
																</div>


																<div class="col-md-4">
																	<br>
																	<a href="<?php echo base_url('get_file/get_bu_35/').$row_pengalaman['persyaratan_35'] ;?>" target="_blank" type="button" name="btn_cek_35"  style="float: left" class=" btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																</div>

															</div>
															<!--#3-->
															<div class="row">
																<div class="col-md-2">
																	<div class="content-group-lg">
																		<h6 class="text-semibold">#3</h6>
																		<p class="content-group">PHO</p>
																	</div>
																</div>


																<div class="col-md-4">
																	<br>
																	<a href="<?php echo base_url('get_file/get_bu_34/').$row_pengalaman['persyaratan_34'] ;?>" target="_blank" type="button" name="btn_cek_34"  style="float: left" class=" btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																</div>


															<!--#4-->

																<div class="col-md-2">
																	<div class="content-group-lg">
																		<h6 class="text-semibold">#4</h6>
																		<p class="content-group">Rekaman Kontrak</p>
																	</div>
																</div>


																<div class="col-md-2">
																	<br>
																	<a href="<?php echo base_url('get_file/get_bu_32/').$row_pengalaman['persyaratan_32'] ;?>" target="_blank" type="button" name="btn_cek_32"  style="float: left" class=" btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
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
																			<td><span class="text-primary"><?php echo $row_pengalaman['nama_pengalaman'] ;?></span></td>
																		</tr>
																		<tr>
																			<td>No Kontrak</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['nomor_kontrak'] ;?></span></td>
																		</tr>
																		<tr>
																			<td>Nilai Kontrak</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['nilai_kontrak'] ;?></span></td>
																		</tr>
																		<tr>
																			<td>Propinsi</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['id_propinsi'] ;?></span></td>
																		</tr>

																		<tr>
																			<td>Nomor BA Serah Terima</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['nomor_ba_serah_terima'] ;?></span></td>
																		</tr>

																		<tr>
																			<td>Pemberi Tugas</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['pemberi_tugas'] ;?></span></td>
																		</tr>
																		<tr>
																			<td>Tahun</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['tahun'] ;?></span></td>
																		</tr>
																		<tr>
																			<td>ID Sumber Dana</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['id_sumber_dana'] ;?></span></td>
																		</tr>
																		<tr>
																			<td>Klasifikasi</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['id_klasifikasi'] ;?></span></td>
																		</tr>
																		<tr>
																			<td>Sub Klasifikasi</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['id_sub_klasifikasi'] ;?></span></td>
																		</tr>
																		<tr>
																			<td>Tgl Kontrak</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['tgl_kontrak'] ;?></span></td>
																		</tr>
																		<tr>
																			<td>Tgl Mulai</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['tgl_mulai'] ;?></span></td>
																		</tr>
																		<tr>
																			<td>Tgl Selesai</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['tgl_selesai'] ;?></span></td>
																		</tr>
																		<tr>
																			<td>Tgl Terima</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['tgl_ba_serah_terima'] ;?></span></td>
																		</tr>
																		<tr>
																			<td>No Addendum Kontrak</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['no_addendum_kontrak'] ;?></span></td>
																		</tr>
																		<tr>
																			<td>Tgl Addendum Kontrak</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['tgl_addendum_kontrak'] ;?></span></td>
																		</tr>
																		<tr>
																			<td>Nilai Addendum Kontrak</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['nilai_addendum_kontrak'] ;?></span></td>
																		</tr>
																		<tr>
																			<td>Cidera Janji, keterlambatan</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['cidera_janji'] ;?></span></td>
																		</tr>
																		<tr>
																			<td>Penyelesaian Perselisihan</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['perselisihan'] ;?></span></td>
																		</tr><tr>
																			<td>Rencana Anggaran Biaya</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['anggaran_biaya'] ;?></span></td>
																		</tr>
																		<tr>
																			<td>Partner KSO/JO</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['partner'] ;?></span></td>
																		</tr>
																		<tr>
																			<td>Nama Sub Kontrak</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['nama_sub_kontrak'] ;?></span></td>
																		</tr>
																		<tr>
																			<td>Nilai Sub Kontrak</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['nilai_sub_kontrak'] ;?></span></td>
																		</tr>
																		<tr>
																			<td>Nomor PHO/BASH Pekerjaan</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['nomor_pho'] ;?></span></td>
																		</tr>
																		<tr>
																			<td>Tanggal Serah Terima PHO</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['tgl_pho'] ;?></span></td>
																		</tr>
																		<tr>
																			<td>Nomor FHO/BASH Pekerjaan</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['nomor_fho'] ;?></span></td>
																		</tr>
																		<tr>
																			<td>Tanggal Serah Terima FHO</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['tgl_fho'] ;?></span></td>
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


								<div class="tab-pane fade" id="akte_pendirian" role="tabpanel" aria-labelledby="home-tab-1">
									<?php if(!empty($akte_pendirian)) :?>
										<div class="col-md-12">
											<div class="panel panel-flat panel-collapsed">
												<div class="panel-heading">
													<h5 class="panel-title">Akte Pendirian</h5>
													<div class="heading-elements">

																	</div>
												</div>
													<div class="panel-body" >
														<!--#1-->
														<div class="row">
															<div class="col-md-3">
																<div class="content-group-lg">
																	<h6 class="text-semibold">#1</h6>
																	<p class="content-group">Akte Pendirian</p>
																</div>
															</div>

															<div class="col-md-1">
																<font class="text-semibold" style="font-size: 12px;">Switch in</font>
																<span class="switch switch-outline switch-icon switch-primary">

																	<label>
																		<input type="checkbox" checked="checked" id="checkbox_7" value="1" onclick="javascript:checkbox7()" name="checkbox_7" />
																		<span></span>
																	</label>
																</span>

															</div>
															<div class="col-md-2">
																<br>
																<a href="<?php echo base_url('get_file/get_bu_7/').$akte_pendirian[0]['persyaratan'] ;?>" target="_blank" type="button" name="btn_cek_13"  style="float: right" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
															</div>
																<div class="col-md-6">
																	<br>
																	<div class="input-group file-caption-main">
																		<span class="file-caption-icon"></span>
																		<input type="text" id="comment_7" name="comment_7"   class="form-control" disabled="disabled" placeholder="Comment...">


																	<div class="input-group-btn input-group-append">
																		<button type="button" onclick="javascript:get7()" id="get_7"  disabled="disabled" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
																			</div>
																	</div>
																</div>
														</div>
														<div class="row">
															<div class="col-md-3">
																<div class="content-group-lg">
																	<h6 class="text-semibold">#2</h6>
																	<p class="content-group">Surat Keputusan Menteri Hukum dan HAM </p>
																</div>
															</div>

															<div class="col-md-1">
																<font class="text-semibold" style="font-size: 12px;">Switch in</font>
																<span class="switch switch-outline switch-icon switch-primary">

																	<label>
																		<input type="checkbox" checked="checked" id="checkbox_55" value="1" onclick="javascript:checkbox55()" name="checkbox_55" />
																		<span></span>
																	</label>
																</span>

															</div>
															<div class="col-md-2">
																<br>
																<a href="<?php echo base_url('get_file/get_bu_55/').$akte_pendirian[0]['persyaratan_55'] ;?>" target="_blank" type="button" name="btn_cek_13"  style="float: right" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
															</div>
																<div class="col-md-6">
																	<br>
																	<div class="input-group file-caption-main">
																		<span class="file-caption-icon"></span>
																		<input type="text" id="comment_55" name="comment_55"   class="form-control" disabled="disabled" placeholder="Comment...">


																	<div class="input-group-btn input-group-append">
																		<button type="button" onclick="javascript:get55()" id="get_55"  disabled="disabled" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
																			</div>
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
													<p class="content-group"><span class="text-danger">Akte Pendirian</span></p>
												</div>
											</div>

											<div class="col-md-1">
												<font class="text-semibold" style="font-size: 11px;">Tidak/Ada</font>
												<span class="switch switch-outline switch-icon switch-danger">

													<label>
														<input type="checkbox" checked="checked" id="checkbox_pendirian" value="1" name="checkbox_pendirian" />
														<span></span>
													</label>
												</span>

											</div>

												<div class="col-md-8">
													<br>
													<div class="input-group file-caption-main">
														<span class="file-caption-icon"></span>
														<input type="text"  id="comment_pendirian" name="comment_pendirian"  class="form-control"  placeholder="Comment...">

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
															<td>Nomor Akte</td>
															<td><span class="text-primary"><?php echo $akte_pendirian[0]['nomer_akte'] ;?></span></td>
														</tr>
														<tr>
															<td>Nama Notaris</td>
															<td><span class="text-primary"><?php echo $akte_pendirian[0]['nama_notaris'] ;?></span></td>
														</tr>
														<tr>
															<td>Alamat</td>
															<td><span class="text-primary"><?php echo $akte_pendirian[0]['alamat'] ;?></span></td>
														</tr>
														<tr>
															<td>Tanggal Akte</td>
															<td><span class="text-primary"><?php echo $akte_pendirian[0]['tgl_akte'] ;?></span></td>
														</tr>
														<tr>
															<td>Propinsi Registrasi</td>
															<td><span class="text-primary"><?php echo $akte_pendirian[0]['propinsi_akte'] ;?></span></td>
														</tr>
														<tr>
															<td>Kabupaten / Kota</td>
															<td><span class="text-primary"><?php echo $akte_pendirian[0]['kabupaten_akte'] ;?></span></td>
														</tr>
														<tr>
															<td>Nama Pengurus</td>
															<td><span class="text-primary"><?php echo $akte_pendirian[0]['nama_pengurus'] ;?></span></td>
														</tr>
														<tr>
															<td>Id Jabatan</td>
															<td><span class="text-primary"><?php echo $akte_pendirian[0]['id_jabatan'] ;?></span></td>
														</tr>
														<tr>
															<td>Menteri Kehakiman & HAM</td>
															<td><span class="text-primary"><?php echo $akte_pendirian[0]['no_pm'] ;?></span></td>
														</tr>
														<tr>
															<td>Tanggal Menteri</td>
															<td><span class="text-primary"><?php echo $akte_pendirian[0]['tgl_pm'] ;?></span></td>
														</tr>
														<tr>
															<td>Pengadilan Negeri</td>
															<td><span class="text-primary"><?php echo $akte_pendirian[0]['no_pn'] ;?></span></td>
														</tr>
														<tr>
															<td>Tanggal Pengadilan Negeri</td>
															<td><span class="text-primary"><?php echo $akte_pendirian[0]['tgl_pn'] ;?></span></td>
														</tr>
														<tr>
															<td>Lembar Negara</td>
															<td><span class="text-primary"><?php echo $akte_pendirian[0]['no_ln'] ;?></span></td>
														</tr>
														<tr>
															<td>Tanggal Lembar Negara</td>
															<td><span class="text-primary"><?php echo $akte_pendirian[0]['tgl_ln'] ;?></span></td>
														</tr>


													</tbody>
												</table>
											</div>
										</div>



									<?php endif ;?>
								</div>

								<div class="tab-pane fade" id="akte_perubahan" role="tabpanel" aria-labelledby="home-tab-1">
									<?php if(!empty($akte_perubahan)) :?>
										<div class="col-md-12">
											<!-- Akte Perubahan toggles -->
											<div class="panel panel-flat panel-collapsed">
												<div class="panel-heading">
													<h5 class="panel-title">Akte Perubahan</h5>
													<div class="heading-elements">

																	</div>
												</div>
												<div class="panel-body">

													<div class="row">
														<div class="col-md-5">
															<div class="content-group-lg">
																<h6 class="text-semibold">#</h6>
																<p class="content-group">SELECT</p>
															</div>
														</div>



															<div class="col-md-4">
																<br>

																	<div class="form-group">


																			<select name="nomer" id="nomer" class="form-control">
																				<?php foreach ($akte_perubahan as $row_perubahan2) :?>

																					 <option value="<?php echo $row_perubahan2['nomer_akte'] ;?>"><?php echo $row_perubahan2['nomer_akte'] ;?></option>
																				<?php endforeach ;?>
																			 </select>
																			 <footer class="blockquote-footer">
																				Pilih Nomor Akte
																			 </footer>

																	</div>

															</div>
															<div class="col-md-3">
																<br>

																	<div class="form-group">


																			<select name="tgl_akte" id="tgl_akte" class="form-control">

																				<?php foreach ($akte_perubahan as $row_perubahan3) :?>
																					 <option value="<?php echo $row_perubahan3['tgl_akte'] ;?>"><?php echo $row_perubahan3['tgl_akte'] ;?></option>
																				<?php endforeach ;?>
																			 </select>
																			 <footer class="blockquote-footer">
																				Pilih Tanggal Akte
																			 </footer>

																	</div>

															</div>
													</div>


													<div class="row">
														<div class="col-md-3">
															<div class="content-group-lg">
																<h6 class="text-semibold">#1</h6>
																<p class="content-group">Akte Perubahan</p>
															</div>
														</div>

														<div class="col-md-1">
															<font class="text-semibold" style="font-size: 12px;">Switch in</font>
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
																	<button type="button" onclick="javascript:get8()" id="get_8"  disabled="disabled" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
																		</div>
																</div>
															</div>
													</div>
													<div class="row">
														<div class="col-md-3">
															<div class="content-group-lg">
																<h6 class="text-semibold">#2</h6>
																<p class="content-group">Surat Keputusan Menteri Hukum dan HAM </p>
															</div>
														</div>

														<div class="col-md-1">
															<font class="text-semibold" style="font-size: 12px;">Switch in</font>
															<span class="switch switch-outline switch-icon switch-primary">

																<label>
																	<input type="checkbox" checked="checked" id="checkbox_56" value="1" onclick="javascript:checkbox56()" name="checkbox_56" />
																	<span></span>
																</label>
															</span>

														</div>

															<div class="col-md-8">
																<br>
																<div class="input-group file-caption-main">
																	<span class="file-caption-icon"></span>
																	<input type="text" id="comment_56" name="comment_56"   class="form-control" disabled="disabled" placeholder="Comment...">


																<div class="input-group-btn input-group-append">
																	<button type="button" onclick="javascript:get56()" id="get_56"  disabled="disabled" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
																		</div>
																</div>
															</div>
													</div>
												</div>
											</div>
										</div>
										<hr>
										<div class="accordion accordion-toggle-arrow" id="accordionExample1">

												<?php foreach ($akte_perubahan as $row_perubahan) :?>
													<?php $counter_perubahan+=1 ;?>
											<div class="card">
													<div class="card-header">
															<div class="card-title collapsed" data-toggle="collapse" data-target="#data-perubahan-<?php echo $counter_perubahan ;?>">
																<?php echo $row_perubahan['tgl_akte'] ;?>
															</div>
													</div>
													<div id="data-perubahan-<?php echo $counter_perubahan ;?>" class="collapse show" data-parent="#accordionExample1">

															<div class="card-body">
																<!--#1-->
																<div class="row">
																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#1</h6>
																			<p class="content-group">Akte Perubahan</p>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<br>
																		<a href="<?php echo base_url('get_file/get_bu_8/').$row_perubahan['persyaratan'] ;?>" target="_blank" type="button" name="btn_cek_36"  style="float: left" class=" btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																	</div>


																<!--#2-->

																<div class="col-md-2">
																	<div class="content-group-lg">
																		<h6 class="text-semibold">#2</h6>
																		<p class="content-group">Surat Keputusan Menteri Hukum dan HAM</p>
																	</div>
																</div>
																<div class="col-md-4">
																	<br>
																	<a href="<?php echo base_url('get_file/get_bu_56/').$row_perubahan['persyaratan_56'] ;?>" target="_blank" type="button" name="btn_cek_36"  style="float: left" class=" btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																</div>
																</div>
																<hr>
																<div class="row">
																	<div class="col-md-3">
																		<div class="content-group-lg">
																			<h6 class="text-semibold"><span class="text-danger">#CEKLIS</span></h6>
																			<p class="content-group"><span class="text-danger">Akte Perubahan</span></p>
																		</div>
																	</div>

																	<div class="col-md-1">
																		<font class="text-semibold" style="font-size: 11px;">Tidak/Ada</font>
																		<span class="switch switch-outline switch-icon switch-danger">

																			<label>
																				<input type="checkbox" checked="checked" id="checkbox_perubahan" value="1" name="checkbox_perubahan" />
																				<span></span>
																			</label>
																		</span>

																	</div>

																		<div class="col-md-8">
																			<br>
																			<div class="input-group file-caption-main">
																				<span class="file-caption-icon"></span>
																				<input type="text"  id="comment_perubahan" name="comment_perubahan"  class="form-control"  placeholder="Comment...">

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
																				<td>Nomor Akte</td>
																				<td><span class="text-primary"><?php echo $row_perubahan['nomer_akte'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Nama Notaris</td>
																				<td><span class="text-primary"><?php echo $row_perubahan['nama_notaris'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Alamat</td>
																				<td><span class="text-primary"><?php echo $row_perubahan['alamat'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Tanggal Akte</td>
																				<td><span class="text-primary"><?php echo $row_perubahan['tgl_akte'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Propinsi Registrasi</td>
																				<td><span class="text-primary"><?php echo $row_perubahan['propinsi_akte'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Kabupaten / Kota</td>
																				<td><span class="text-primary"><?php echo $row_perubahan['kabupaten_akte'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Nama Pengurus</td>
																				<td><span class="text-primary"><?php echo $row_perubahan['nama_pengurus'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Id Jabatan</td>
																				<td><span class="text-primary"><?php echo $row_perubahan['id_jabatan'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Menteri Kehakiman & HAM</td>
																				<td><span class="text-primary"><?php echo $row_perubahan['no_pm'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Tanggal Menteri</td>
																				<td><span class="text-primary"><?php echo $row_perubahan['tgl_pm'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Pengadilan Negeri</td>
																				<td><span class="text-primary"><?php echo $row_perubahan['no_pn'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Tanggal Pengadilan Negeri</td>
																				<td><span class="text-primary"><?php echo $row_perubahan['tgl_pn'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Lembar Negara</td>
																				<td><span class="text-primary"><?php echo $row_perubahan['no_ln'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Tanggal Lembar Negara</td>
																				<td><span class="text-primary"><?php echo $row_perubahan['tgl_ln'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Perubahan Tentang</td>
																				<td><span class="text-primary"><?php echo $row_perubahan['perubahan'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Modal Dasar</td>
																				<td><span class="text-primary"><?php echo $row_perubahan['modal_dasar'] ;?></span></td>
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

									<?php endif; ?>
								</div>
								<div class="tab-pane fade" id="pph_omset" role="tabpanel" aria-labelledby="home-tab-1">
									<?php if(!empty($pph_omset)) :?>

									<div class="col-md-12">
										<div class="panel panel-flat panel-collapsed">
											<div class="panel-heading">
												<h5 class="panel-title">PPH & OMSET</h5>
												<div class="heading-elements">

																</div>
											</div>
												<div class="panel-body" >
													<!--#1-->
													<div class="row">
														<div class="col-md-3">
															<div class="content-group-lg">
																<h6 class="text-semibold">#1</h6>
																<p class="content-group">SPT 2 th terakhir</p>
															</div>
														</div>

														<div class="col-md-1">
															<font class="text-semibold" style="font-size: 12px;">Switch in</font>
															<span class="switch switch-outline switch-icon switch-primary">

																<label>
																	<input type="checkbox" checked="checked" id="checkbox_22" value="1" onclick="javascript:checkbox22()" name="checkbox_22" />
																	<span></span>
																</label>
															</span>

														</div>
														<div class="col-md-2">
															<br>
															<a href="<?php echo base_url('get_file/get_bu_2/').$pph_omset[0]['persyaratan'] ;?>" target="_blank" type="button" name="btn_cek_22"  style="float: right" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
														</div>
															<div class="col-md-6">
																<br>
																<div class="input-group file-caption-main">
																	<span class="file-caption-icon"></span>
																	<input type="text" id="comment_22" name="comment_22"   class="form-control" disabled="disabled" placeholder="Comment...">


																<div class="input-group-btn input-group-append">
																	<button type="button" onclick="javascript:get22()" id="get_22"  disabled="disabled" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
																		</div>
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
												<p class="content-group"><span class="text-danger">Keuangan Omset</span></p>
											</div>
										</div>

										<div class="col-md-1">
											<font class="text-semibold" style="font-size: 11px;">Tidak/Ada</font>
											<span class="switch switch-outline switch-icon switch-danger">

												<label>
													<input type="checkbox" checked="checked" id="checkbox_omset" value="1" name="checkbox_omset" />
													<span></span>
												</label>
											</span>

										</div>

											<div class="col-md-8">
												<br>
												<div class="input-group file-caption-main">
													<span class="file-caption-icon"></span>
													<input type="text"  id="comment_omset" name="comment_omset"  class="form-control"  placeholder="Comment...">

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
														<td>SPT PPH th 1</td>
														<td><span class="text-primary"><?php echo $pph_omset[0]['thn_spt1'] ;?></span></td>
													</tr>
													<tr>
														<td>Pembayaran Kewajiban Pajak</td>
														<td><span class="text-primary"><?php echo $pph_omset[0]['spt1'] ;?></span></td>
													</tr>
													<tr>
														<td>SPT PPH th 2</td>
														<td><span class="text-primary"><?php echo $pph_omset[0]['thn_spt2'] ;?></span></td>
													</tr>
													<tr>
														<td>Pembayaran Kewajiban Pajak</td>
														<td><span class="text-primary"><?php echo $pph_omset[0]['spt1'] ;?></span></td>
													</tr>
													<tr>
														<td>Omset th 1</td>
														<td><span class="text-primary"><?php echo $pph_omset[0]['thn_omset1'] ;?></span></td>
													</tr>
													<tr>
														<td>Omset</td>
														<td><span class="text-primary"><?php echo $pph_omset[0]['omset1'] ;?></span></td>
													</tr>
													<tr>
														<td>Omset th 2</td>
														<td><span class="text-primary"><?php echo $pph_omset[0]['thn_omset2'] ;?></span></td>
													</tr>
													<tr>
														<td>Omset</td>
														<td><span class="text-primary"><?php echo $pph_omset[0]['omset2'] ;?></span></td>
													</tr>
													<tr>
														<td>Omset th 3</td>
														<td><span class="text-primary"><?php echo $pph_omset[0]['thn_omset3'] ;?></span></td>
													</tr>
													<tr>
														<td>Omset</td>
														<td><span class="text-primary"><?php echo $pph_omset[0]['omset3'] ;?></span></td>
													</tr>
													<tr>
														<td>Omset th 4</td>
														<td><span class="text-primary"><?php echo $pph_omset[0]['thn_omset4'] ;?></span></td>
													</tr>
													<tr>
														<td>Omset</td>
														<td><span class="text-primary"><?php echo $pph_omset[0]['omset4'] ;?></span></td>
													</tr>
													<tr>
														<td>Omset th 5</td>
														<td><span class="text-primary"><?php echo $pph_omset[0]['thn_omset5'] ;?></span></td>
													</tr>
													<tr>
														<td>TOmset</td>
														<td><span class="text-primary"><?php echo $pph_omset[0]['omset5'] ;?></span></td>
													</tr>


												</tbody>
											</table>
										</div>
									</div>
								<?php endif ;?>
								</div>
								<div class="tab-pane fade" id="pemegang_saham" role="tabpanel" aria-labelledby="home-tab-1">
									<?php if(!empty($pemegang_saham)) :?>
										<div class="col-md-12">
											<!-- Pemegang Saham toggles -->
											<div class="panel panel-flat panel-collapsed">
												<div class="panel-heading">
													<h5 class="panel-title">Pemegang Saham</h5>
													<div class="heading-elements">

																	</div>
												</div>
												<div class="panel-body" >

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
																					 <option value="<?php echo $row_saham2['id_saham'] ;?>"><?php echo $row_saham2['nama_pemilik'] ;?></option>
																				<?php endforeach ;?>
																			 </select>
																			 <input type="hidden" id="nama_saham" >
																			 <footer class="blockquote-footer">
																				 Pilih Nama Pemilik Saham
																			 </footer>


																	</div>

															</div>
													</div>

													<!--#1-->
													<div class="row">
														<div class="col-md-3">
															<div class="content-group-lg">
																<h6 class="text-semibold">#1</h6>
																<p class="content-group">Bukti Pemegang Saham</p>
															</div>
														</div>

														<div class="col-md-1">
															<font class="text-semibold" style="font-size: 12px;">Switch in</font>
															<span class="switch switch-outline switch-icon switch-primary">

																<label>
																	<input type="checkbox" checked="checked" id="checkbox_41" value="1" onclick="javascript:checkbox41()" name="checkbox_41" />
																	<span></span>
																</label>
															</span>

														</div>

															<div class="col-md-8">
																<br>
																<div class="input-group file-caption-main">
																	<span class="file-caption-icon"></span>
																	<input type="text" id="comment_41" name="comment_41"   class="form-control" disabled="disabled" placeholder="Comment...">


																<div class="input-group-btn input-group-append">
																	<button type="button" onclick="javascript:get41()" id="get_41"  disabled="disabled" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
																		</div>
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
													<p class="content-group"><span class="text-danger">Keuangan Pemegang Saham</span></p>
												</div>
											</div>

											<div class="col-md-1">
												<font class="text-semibold" style="font-size: 11px;">Tidak/Ada</font>
												<span class="switch switch-outline switch-icon switch-danger">

													<label>
														<input type="checkbox" checked="checked" id="checkbox_saham" value="1" name="checkbox_saham" />
														<span></span>
													</label>
												</span>

											</div>

												<div class="col-md-8">
													<br>
													<div class="input-group file-caption-main">
														<span class="file-caption-icon"></span>
														<input type="text"  id="comment_saham" name="comment_saham"  class="form-control"  placeholder="Comment...">

													</div>
												</div>
										</div>
										<hr>
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
																<div class="row">
																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#1</h6>
																			<p class="content-group">Bukti Pemegang Saham</p>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<br>
																		<a href="<?php echo base_url('get_file/get_bu_41/').$row_saham['persyaratan'] ;?>" target="_blank" type="button" name="btn_cek_36"  style="float: left" class=" btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																	</div>


																<!--#2-->

																	<div class="col-md-2">

																	</div>


																	<div class="col-md-4">
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
																				<td><span class="text-primary"><?php echo $row_saham['nama_pemilik'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>No KTP</td>
																				<td><span class="text-primary"><?php echo $row_saham['no_ktp'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Alamat</td>
																				<td><span class="text-primary"><?php echo $row_saham['alamat'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Propinsi</td>
																				<td><span class="text-primary"><?php echo $row_saham['id_propinsi'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Kabupaten</td>
																				<td><span class="text-primary"><?php echo $row_saham['id_kabupaten'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Kodepos</td>
																				<td><span class="text-primary"><?php echo $row_saham['kd_pos'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Jenis Saham</td>
																				<td><span class="text-primary"><?php echo $row_saham['jenis_saham'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Jumlah Saham</td>
																				<td><span class="text-primary"><?php echo $row_saham['jumlah_lembar'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Nilai Satuan Per-lembar</td>
																				<td><span class="text-primary"><?php echo $row_saham['nilai_perlembar'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Total Modal Yang Ditetapkan</td>
																				<td><span class="text-primary"><?php echo $row_saham['modal_dasar'] ;?></span></td>
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
									<?php if(!empty($neraca)) :?>
										<div class="col-md-12">
											<!-- Pemegang Saham toggles -->
											<div class="panel panel-flat panel-collapsed">
												<div class="panel-heading">
													<h5 class="panel-title">Neraca</h5>
													<div class="heading-elements">

																	</div>
												</div>
												<div class="panel-body" >

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


																		<select name="tahun" id="tahun" class="form-control">
																			<?php foreach ($neraca as $row_neraca2) :?>
																				 <option value="<?php echo $row_neraca2['Tahun'] ;?>"><?php echo $row_neraca2['Tahun'] ;?></option>
																			<?php endforeach ;?>
																		 </select>
																		 <footer class="blockquote-footer">
																			 Pilih Tahun Neraca
																		 </footer>


																</div>

															</div>
													</div>

													<!--#1-->
													<div class="row">
														<div class="col-md-3">
															<div class="content-group-lg">
																<h6 class="text-semibold">#1</h6>
																<p class="content-group">Laporan Badan Usaha 2 tahun terakhir (Audit KAP)</p>
															</div>
														</div>

														<div class="col-md-1">
															<font class="text-semibold" style="font-size: 12px;">Switch in</font>
															<span class="switch switch-outline switch-icon switch-primary">

																<label>
																	<input type="checkbox" checked="checked" id="checkbox_57" value="1" onclick="javascript:checkbox57()" name="checkbox_57" />
																	<span></span>
																</label>
															</span>

														</div>

															<div class="col-md-8">
																<br>
																<div class="input-group file-caption-main">
																	<span class="file-caption-icon"></span>
																	<input type="text" id="comment_57" name="comment_57"   class="form-control" disabled="disabled" placeholder="Comment...">


																<div class="input-group-btn input-group-append">
																	<button type="button" onclick="javascript:get57()" id="get_57"  disabled="disabled" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
																		</div>
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
													<p class="content-group"><span class="text-danger">Keuangan Neraca</span></p>
												</div>
											</div>

											<div class="col-md-1">
												<font class="text-semibold" style="font-size: 11px;">Tidak/Ada</font>
												<span class="switch switch-outline switch-icon switch-danger">

													<label>
														<input type="checkbox" checked="checked" id="checkbox_neraca" value="1" name="checkbox_neraca" />
														<span></span>
													</label>
												</span>

											</div>

												<div class="col-md-8">
													<br>
													<div class="input-group file-caption-main">
														<span class="file-caption-icon"></span>
														<input type="text"  id="comment_neraca" name="comment_neraca"  class="form-control"  placeholder="Comment...">

													</div>
												</div>
										</div>
										<hr>
										<div class="accordion accordion-toggle-arrow" id="accordionExample1">
											<input type="hidden"  value="<?php echo $tgl ;?>" class="switchery" name="tgl">

												<?php foreach ($neraca as $row_neraca) :?>
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
																			<p class="content-group">Laporan Badan Usaha 2 tahun terakhir (Audit KAP)</p>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<br>
																		<a href="<?php echo base_url('get_file/get_bu_neraca_ski/').$row_neraca['persyaratan'] ;?>" target="_blank" type="button" name="btn_cek_36"  style="float: left" class=" btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
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
																				<td>Opini KAP</td>
																				<td><span class="text-primary"><?=$row_neraca['opini_kap'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Aktiva Lancar</td>
																				<td><span class="text-primary"><?=$row_neraca['aktiva_lancar'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Aktiva Tetap</td>
																				<td><span class="text-primary"><?=$row_neraca['aktiva_tetap'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Kewajiban lancar</td>
																				<td><span class="text-primary"><?=$row_neraca['kewajiban_lancar'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Kewajiban tidak lancar</td>
																				<td><span class="text-primary"><?=$row_neraca['kewajiban_tidak_lancar'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Ekuitas</td>
																				<td><span class="text-primary"><?=$row_neraca['ekuitas'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Modal Dasar Badan Usaha</td>
																				<td><span class="text-primary"><?=$row_neraca['modal_dasar'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Modal Disetor Badan Usaha</td>
																				<td><span class="text-primary"><?=$row_neraca['modal_disetor'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Laporan Arus Kas</td>
																				<td><span class="text-primary"><?=$row_neraca['laporan_arus_kas'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Laporan Laba Rugi</td>
																				<td><span class="text-primary"><?=$row_neraca['laporan_labar_rugi'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Laporan Perubahan Ekuitas</td>
																				<td><span class="text-primary"><?=$row_neraca['laporan_perubahan_ekuitas'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Catatan Atas Laporan Keuanga</td>
																				<td><span class="text-primary"><?=$row_neraca['catatan_laporan_keuangan'] ;?></span></td>
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
								<div class="tab-pane fade" id="tenaga_kerja" role="tabpanel" aria-labelledby="home-tab-1">
									<?php if(!empty($tenaga_kerja)) :?>
										<div class="col-md-12">
											<!-- Pemegang Saham toggles -->
											<div class="panel panel-flat panel-collapsed">
												<div class="panel-heading">
													<h5 class="panel-title">Tenaga Kerja BU</h5>
													<div class="heading-elements">

																	</div>
												</div>
												<div class="panel-body" >

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


																		<select name="noreg" id="noreg" class="form-control">
																			<?php foreach ($tenaga_kerja as $row_tk2) :?>
																				 <option value="<?php echo $row_tk2['noreg'] ;?>"><?php echo $row_tk2['nama'] ;?></option>
																			<?php endforeach ;?>
																		 </select>
																		 <footer class="blockquote-footer">
																			 Pilih Tenaga Kerja
																		 </footer>

																</div>

															</div>
													</div>


													<!--#2-->


													<!--#3-->

													<!--#3-->
													<div class="row">
														<div class="col-md-3">
															<div class="content-group-lg">
																<h6 class="text-semibold">#1</h6>
																<p class="content-group">Rekaman SKK (Sertifikat Kompetensi Kerja)</p>
															</div>
														</div>

														<div class="col-md-1">
															<font class="text-semibold" style="font-size: 12px;">Switch in</font>
															<span class="switch switch-outline switch-icon switch-primary">

																<label>
																	<input type="checkbox" checked="checked" id="checkbox_23" value="1" onclick="javascript:checkbox23()" name="checkbox_23" />
																	<span></span>
																</label>
															</span>

														</div>

															<div class="col-md-8">
																<br>
																<div class="input-group file-caption-main">
																	<span class="file-caption-icon"></span>
																	<input type="text" id="comment_23" name="comment_23"   class="form-control" disabled="disabled" placeholder="Comment...">


																<div class="input-group-btn input-group-append">
																	<button type="button" onclick="javascript:get23()" id="get_23"  disabled="disabled" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
																		</div>
																</div>
															</div>
													</div>
													<div class="row">
														<div class="col-md-3">
															<div class="content-group-lg">
																<h6 class="text-semibold">#2</h6>
																<p class="content-group">Surat Pernyataan bukan pegawai negri sipil, Bukan TNI atau Kepolisian RI</p>
															</div>
														</div>

														<div class="col-md-1">
															<font class="text-semibold" style="font-size: 12px;">Switch in</font>
															<span class="switch switch-outline switch-icon switch-primary">

																<label>
																	<input type="checkbox" checked="checked" id="checkbox_28" value="1" onclick="javascript:checkbox28()" name="checkbox_28" />
																	<span></span>
																</label>
															</span>

														</div>

															<div class="col-md-8">
																<br>
																<div class="input-group file-caption-main">
																	<span class="file-caption-icon"></span>
																	<input type="text" id="comment_28" name="comment_28"   class="form-control" disabled="disabled" placeholder="Comment...">


																<div class="input-group-btn input-group-append">
																	<button type="button" onclick="javascript:get28()" id="get_28"  disabled="disabled" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
																		</div>
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
													<p class="content-group"><span class="text-danger">Tenaga Kerja</span></p>
												</div>
											</div>

											<div class="col-md-1">
												<font class="text-semibold" style="font-size: 11px;">Tidak/Ada</font>
												<span class="switch switch-outline switch-icon switch-danger">

													<label>
														<input type="checkbox" checked="checked" id="checkbox_tk" value="1" name="checkbox_tk" />
														<span></span>
													</label>
												</span>

											</div>

												<div class="col-md-8">
													<br>
													<div class="input-group file-caption-main">
														<span class="file-caption-icon"></span>
														<input type="text"  id="comment_tk1" name="comment_tk1"  class="form-control"  placeholder="Comment...">

													</div>
												</div>
										</div>
										<hr>
										<div class="accordion accordion-toggle-arrow" id="accordionExample1">

												<?php foreach ($tenaga_kerja as $row_tk) :?>
													<?php $counter_tk+=1 ;?>
											<div class="card">
													<div class="card-header">
															<div class="card-title collapsed" data-toggle="collapse" data-target="#data-tk-<?php echo $counter_tk ;?>">
																<?php echo $row_tk['nama'] ;?>
															</div>
													</div>
													<div id="data-tk-<?php echo $counter_tk ;?>" class="collapse show" data-parent="#accordionExample1">

															<div class="card-body">
																<!--#1-->

																<!--#3-->

																<!--#5-->
																<div class="row">
																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#1</h6>
																			<p class="content-group">Rekaman SKK (Sertifikat Kompetensi Kerja)</p>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<br>
																		<a href="<?php echo base_url('get_file/get_bu_23/').$row_tk['persyaratan_23'] ;?>" target="_blank" type="button" name="btn_cek_23"  style="float: left" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																	</div>

																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#2</h6>
																			<p class="content-group">Surat Pernyataan bukan pegawai negri sipil, Bukan TNI atau Kepolisian RI</p>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<br>
																		<a href="<?php echo base_url('get_file/get_bu_28/').$row_tk['persyaratan_28'] ;?>" target="_blank" type="button" name="btn_cek_23"  style="float: left" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
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
																				<td>Nomor Registrasi</td>
																				<td><span class="text-primary"><?php echo $row_tk['noreg'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Nama</td>
																				<td><span class="text-primary"><?php echo $row_tk['nama'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>KTP</td>
																				<td><span class="text-primary"><?php echo $row_tk['no_ktp'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Tanggal Lahir</td>
																				<td><span class="text-primary"><?php echo $row_tk['tgl_lahir'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Kodepos</td>
																				<td><span class="text-primary"><?php echo $row_tk['kodepos'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Pendidikan Akhir</td>
																				<td><span class="text-primary"><?php echo $row_tk['pendidikan_akhir'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>No. Ijazah</td>
																				<td><span class="text-primary"><?php echo $row_tk['no_ijazah'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Tahun Lulus</td>
																				<td><span class="text-primary"><?php echo $row_tk['thn_lulus'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>NPWP</td>
																				<td><span class="text-primary"><?php echo $row_tk['npwp'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Alamat</td>
																				<td><span class="text-primary"><?php echo $row_tk['alamat'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Sub Bidang</td>
																				<td><span class="text-primary"><?php echo $row_tk['id_sub_bidang'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Jenis Tenaga Kerja</td>
																				<td><span class="text-primary"><?php echo $row_tk['tenaga_kerja'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Kualifikasi</td>
																				<td><span class="text-primary"><?php echo $row_tk['id_kualifikasi'] ;?></span></td>
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


								<div class="tab-pane fade" id="peralatan" role="tabpanel" aria-labelledby="home-tab-1">
									<?php if(!empty($peralatan)) :?>
										<div class="col-md-12">
											<div class="panel panel-flat panel-collapsed">
												<div class="panel-heading">
													<h5 class="panel-title">Akte Pendirian</h5>
													<div class="heading-elements">

																	</div>
												</div>
													<div class="panel-body" >
														<!--#1-->
														<div class="row">
															<div class="col-md-3">
																<div class="content-group-lg">
																	<h6 class="text-semibold">#1</h6>
																	<p class="content-group">Surat Kepemilikan</p>
																</div>
															</div>

															<div class="col-md-1">
																<font class="text-semibold" style="font-size: 12px;">Switch in</font>
																<span class="switch switch-outline switch-icon switch-primary">

																	<label>
																		<input type="checkbox" checked="checked" id="checkbox_58" value="1" onclick="javascript:checkbox58()" name="checkbox_58" />
																		<span></span>
																	</label>
																</span>

															</div>
															<div class="col-md-2">
																<br>
																<a href="<?php echo base_url('get_file/get_bu_peralatan/').$peralatan[0]['persyaratan'] ;?>" target="_blank" type="button" name="btn_cek_13"  style="float: right" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
															</div>
																<div class="col-md-6">
																	<br>
																	<div class="input-group file-caption-main">
																		<span class="file-caption-icon"></span>
																		<input type="text" id="comment_58" name="comment_58"   class="form-control" disabled="disabled" placeholder="Comment...">


																	<div class="input-group-btn input-group-append">
																		<button type="button" onclick="javascript:get_58()" id="get_58"  disabled="disabled" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
																			</div>
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
													<p class="content-group"><span class="text-danger">Peralatan</span></p>
												</div>
											</div>

											<div class="col-md-1">
												<font class="text-semibold" style="font-size: 11px;">Tidak/Ada</font>
												<span class="switch switch-outline switch-icon switch-danger">

													<label>
														<input type="checkbox" checked="checked" id="checkbox_peralatan" value="1" name="checkbox_peralatan" />
														<span></span>
													</label>
												</span>

											</div>

												<div class="col-md-8">
													<br>
													<div class="input-group file-caption-main">
														<span class="file-caption-icon"></span>
														<input type="text"  id="comment_peralatan1" name="comment_peralatan1"  class="form-control"  placeholder="Comment...">

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
															<td>Jenis Peralatan</td>
															<td><span class="text-primary"><?php echo $peralatan[0]['jenis_peralatan'] ;?></span></td>
														</tr>
														<tr>
															<td>Tipe Peralatan</td>
															<td><span class="text-primary"><?php echo $peralatan[0]['tipe_peralatan'] ;?></span></td>
														</tr>
														<tr>
															<td>Tahun Pembuatan</td>
															<td><span class="text-primary"><?php echo $peralatan[0]['tahun_pembuatan'] ;?></span></td>
														</tr>
														<tr>
															<td>Kapasitas</td>
															<td><span class="text-primary"><?php echo $peralatan[0]['kapasitas'] ;?></span></td>
														</tr>
														<tr>
															<td>Kondisi %</td>
															<td><span class="text-primary"><?php echo $peralatan[0]['kondisi'] ;?></span></td>
														</tr>
														<tr>
															<td>Harga</td>
															<td><span class="text-primary"><?php echo $peralatan[0]['harga'] ;?></span></td>
														</tr>
														<tr>
															<td>Propinsi</td>
															<td><span class="text-primary"><?php echo $peralatan[0]['propinsi'] ;?></span></td>
														</tr>



													</tbody>
												</table>
											</div>
										</div>



									<?php endif ;?>
								</div>



								<div class="tab-pane fade" id="klasifikasi_kualifikasi" role="tabpanel" aria-labelledby="home-tab-1">
									<?php if(!empty($klasifikasi)) :?>
										<div class="col-md-12">
											<!-- Pemegang Saham toggles -->
											<div class="panel panel-flat panel-collapsed">
												<div class="panel-heading">
													<h5 class="panel-title">Validasi Klasifikasi & Kualifikasi</h5>
													<div class="heading-elements">

																	</div>
												</div>
												<div class="panel-body" >

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


																		<select name="nomer" id="sub_klas" class="form-control">
																			<?php foreach ($klasifikasi as $row_klasifikasi2) :?>

																				 <option value="<?php echo $row_klasifikasi2['id_sub_klasifikasi'] ;?>"><?php echo $row_klasifikasi2['id_sub_klasifikasi'] ;?></option>
																			<?php endforeach ;?>
																		 </select>
																		 <footer class="blockquote-footer">
																			 Pilih ID Klasifikasi
																		 </footer>


																</div>

															</div>
													</div>


													<!--#2-->

													<!--#3-->
													<div class="row">
														<div class="col-md-3">
															<div class="content-group-lg">
																<h6 class="text-semibold">#1</h6>
																<p class="content-group">Formulir Permohonan SBU & Formulir Administrasi dan SDM</p>
															</div>
														</div>

														<div class="col-md-1">
															<font class="text-semibold" style="font-size: 12px;">Switch in</font>
															<span class="switch switch-outline switch-icon switch-primary">

																<label>
																	<input type="checkbox" checked="checked" id="checkbox_3" value="1" onclick="javascript:checkbox3()" name="checkbox_3" />
																	<span></span>
																</label>
															</span>

														</div>

															<div class="col-md-8">
																<br>
																<div class="input-group file-caption-main">
																	<span class="file-caption-icon"></span>
																	<input type="text" id="comment_3" name="comment_3"   class="form-control" disabled="disabled" placeholder="Comment...">


																<div class="input-group-btn input-group-append">
																	<button type="button" onclick="javascript:get3()" id="get_3"  disabled="disabled" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
																		</div>
																</div>
															</div>
													</div>
													<!--#4-->
													<div class="row">
														<div class="col-md-3">
															<div class="content-group-lg">
																<h6 class="text-semibold">#2</h6>
																<p class="content-group">Surat Permohonan Klasifikasi dan Kualifikasi</p>
															</div>
														</div>

														<div class="col-md-1">
															<font class="text-semibold" style="font-size: 12px;">Switch in</font>
															<span class="switch switch-outline switch-icon switch-primary">

																<label>
																	<input type="checkbox" checked="checked" id="checkbox_4" value="1" onclick="javascript:checkbox4()" name="checkbox_4" />
																	<span></span>
																</label>
															</span>

														</div>

															<div class="col-md-8">
																<br>
																<div class="input-group file-caption-main">
																	<span class="file-caption-icon"></span>
																	<input type="text" id="comment_4" name="comment_4"   class="form-control" disabled="disabled" placeholder="Comment...">


																<div class="input-group-btn input-group-append">
																	<button type="button" onclick="javascript:get4()" id="get_4"  disabled="disabled" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
																		</div>
																</div>
															</div>
													</div>
													<!--#5-->
													<div class="row">
														<div class="col-md-3">
															<div class="content-group-lg">
																<h6 class="text-semibold">#3</h6>
																<p class="content-group">Surat Pernyataan Badan Usaha</p>
															</div>
														</div>

														<div class="col-md-1">
															<font class="text-semibold" style="font-size: 12px;">Switch in</font>
															<span class="switch switch-outline switch-icon switch-primary">

																<label>
																	<input type="checkbox" checked="checked" id="checkbox_5" value="1" onclick="javascript:checkbox5()" name="checkbox_5" />
																	<span></span>
																</label>
															</span>

														</div>

															<div class="col-md-8">
																<br>
																<div class="input-group file-caption-main">
																	<span class="file-caption-icon"></span>
																	<input type="text" id="comment_5" name="comment_5"   class="form-control" disabled="disabled" placeholder="Comment...">


																<div class="input-group-btn input-group-append">
																	<button type="button" onclick="javascript:get5()" id="get_5"  disabled="disabled" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
																		</div>
																</div>
															</div>
													</div>
													<!--#5-->
													<div class="row">
														<div class="col-md-3">
															<div class="content-group-lg">
																<h6 class="text-semibold">#4</h6>
																<p class="content-group">Photo Copy SBU (Semua yang dimiliki) /SBU Asli</p>
															</div>
														</div>

														<div class="col-md-1">
															<font class="text-semibold" style="font-size: 12px;">Switch in</font>
															<span class="switch switch-outline switch-icon switch-primary">

																<label>
																	<input type="checkbox" checked="checked" id="checkbox_12" value="1" onclick="javascript:checkbox12()" name="checkbox_12" />
																	<span></span>
																</label>
															</span>

														</div>

															<div class="col-md-8">
																<br>
																<div class="input-group file-caption-main">
																	<span class="file-caption-icon"></span>
																	<input type="text" id="comment_12" name="comment_12"   class="form-control" disabled="disabled" placeholder="Comment...">


																<div class="input-group-btn input-group-append">
																	<button type="button" onclick="javascript:get12()" id="get_12"  disabled="disabled" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
																		</div>
																</div>
															</div>
													</div>
													<!--#7-->
													<div class="row">
														<div class="col-md-3">
															<div class="content-group-lg">
																<h6 class="text-semibold">#5</h6>
																<p class="content-group">KTA Asosiasi</p>
															</div>
														</div>

														<div class="col-md-1">
															<font class="text-semibold" style="font-size: 12px;">Switch in</font>
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
																	<button type="button" onclick="javascript:get10()" id="get_10"  disabled="disabled" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
																		</div>
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
													<p class="content-group"><span class="text-danger">Klasifikasi Kualifikasi</span></p>
												</div>
											</div>

											<div class="col-md-1">
												<font class="text-semibold" style="font-size: 11px;">Tidak/Ada</font>
												<span class="switch switch-outline switch-icon switch-danger">

													<label>
														<input type="checkbox" checked="checked" id="checkbox_klas" value="1" name="checkbox_klas" />
														<span></span>
													</label>
												</span>

											</div>

												<div class="col-md-8">
													<br>
													<div class="input-group file-caption-main">
														<span class="file-caption-icon"></span>
														<input type="text"  id="comment_klas" name="comment_klas"  class="form-control"  placeholder="Comment...">

													</div>
												</div>
										</div>
										<hr>
										<div class="accordion accordion-toggle-arrow" id="accordionExample1">

												<?php foreach ($klasifikasi as $row_klasifikasi) :?>
													<?php $counter_klasifikasi+=1 ;?>
											<div class="card">
													<div class="card-header">
															<div class="card-title collapsed" data-toggle="collapse" data-target="#data-klasifikasi-<?php echo $counter_klasifikasi ;?>">
																<?php echo $row_klasifikasi['id_sub_klasifikasi'] ;?>
															</div>
													</div>
													<div id="data-klasifikasi-<?php echo $counter_klasifikasi ;?>" class="collapse show" data-parent="#accordionExample1">

															<div class="card-body">



																<!--#3-->
																<div class="row">
																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#1</h6>
																			<p class="content-group">Formulir Permohonan SBU & Formulir Administrasi dan SDM</p>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<br>
																		<a href="<?php echo base_url('get_file/get_bu_3/').$row_klasifikasi['persyaratan_3'] ;?>" target="_blank" type="button" name="btn_cek_3"  style="float: left" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																	</div>



																<!--#4-->

																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#2</h6>
																			<p class="content-group">Surat Permohonan Klasifikasi dan Kualifikasi Konversi</p>
																		</div>
																	</div>

																	<div class="col-md-4">
																		<br>
																		<a href="<?php echo base_url('get_file/get_bu_4/').$row_klasifikasi['persyaratan_4'] ;?>" target="_blank" type="button" name="btn_cek_4"  style="float: left" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																	</div>

																</div>

																<!--#5-->
																<div class="row">
																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#3</h6>
																			<p class="content-group">Surat Pernyataan Badan Usaha</p>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<br>
																		<a href="<?php echo base_url('get_file/get_bu_5/').$row_klasifikasi['persyaratan_5'] ;?>" target="_blank" type="button" name="btn_cek_5"  style="float: left" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																	</div>


																<!--#6-->

																 <div class="col-md-2">
																	 <div class="content-group-lg">
																		 <h6 class="text-semibold">#4</h6>
																		 <p class="content-group">Photo Copy SBU (Semua yang dimiliki) /SBU Asli</p>
																	 </div>
																 </div>


																 <div class="col-md-4">
																	 <br>
																	 <a href="<?php echo base_url('get_file/get_bu_12/').$row_klasifikasi['persyaratan_12'] ;?>" target="_blank" type="button" name="btn_cek_12"  style="float: left" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																 </div>

															 </div>

															 <!--#7-->
															 <div class="row">
																 <div class="col-md-2">
																	 <div class="content-group-lg">
																		 <h6 class="text-semibold">#5</h6>
																		 <p class="content-group">KTA Asosiasi</p>
																	 </div>
																 </div>


																 <div class="col-md-4">
																	 <br>
																	 <a href="<?php echo base_url('get_file/get_bu_10/').$row_klasifikasi['persyaratan_10'] ;?>" target="_blank" type="button" name="btn_cek_5"  style="float: left" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
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
																				<td><span class="text-primary"><?php echo $row_klasifikasi['tahun'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Klasifikasi</td>
																				<td><span class="text-primary"><?php echo $row_klasifikasi['id_klasifikasi'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Sub Klasifikasi</td>
																				<td><span class="text-primary"><?php echo $row_klasifikasi['id_sub_klasifikasi'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Kualifikasi</td>
																				<td><span class="text-primary"><?php echo $row_klasifikasi['kualifikasi'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>No BA Asosiasi</td>
																				<td><span class="text-primary"><?php echo $row_klasifikasi['no_ba_asosiasi'] ;?></span></td>
																			</tr>

																			<tr>
																				<td>Propinsi Registrasi</td>
																				<td><span class="text-primary"><?php echo $row_klasifikasi['propinsi'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Jenis Permohonan</td>
																				<td><span class="text-primary"><?php if($row_klasifikasi['id_permohonan']=='1'){
																					echo "Baru";
																				}elseif($row_klasifikasi['id_permohonan']=='2'){
																					echo "Perpanjangan";
																				}else{
																					echo "Perubahan";
																				} ;?></span></td>
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
					<?php if(!empty($cek)): ?>
						<button  target="_blank" type="submit" name="submit"  style="float: right" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-paperplane" ></i></b> Submit</button>
					<?php endif; ?>
					<?php echo form_close() ;?>
				</div>
			</div>
    </div>
  </div>
</div>
