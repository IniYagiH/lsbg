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
	echo script_tag('assets/usbu.js');
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
          <h2 class="text-white font-weight-bold my-2 mr-5">VV Awal</h2>
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
            <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">VV Awal</a>
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
						<h3 class="card-label">Verifikasi & Validasi Awal</h3>


					</div>

				</div>

				<div class="card-body">
					<?php if(!empty($cek)):?>
						<a href="<?php echo base_url('report/vva/'.$tgl) ;?>" target="_blank" type="button" name="submit"  style="float: right" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-printer" ></i></b> Cetak VV</a>
					<?php endif ;?>					<br>
					<br>
					<br>
					<div class="example mb-10">
						<input type="hidden" id="base_url" value="<?php echo base_url('badan_usaha/asosiasi_upload') ;?>" >

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
								<li class="nav-item">
									<a class="nav-link" id="contact-tab-1" data-toggle="tab" href="#tenaga_kerja" aria-controls="contact">
										<span class="nav-icon">
											<i class="flaticon2-rocket-1"></i>
										</span>
										<span class="nav-text">Tenaga Kerja</span>
									</a>
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
							<?php echo form_open_multipart(base_url('sertifikasi/ceklis_vva'), 'method="POST"');?>

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
												<input type="hidden" id="tgl" name="tgl" value="<?php echo $tgl ;?>">
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
														<!--5-->
														<div class="row">
															<div class="col-md-3">
																<div class="content-group-lg">
																	<h6 class="text-semibold">#5</h6>
																	<p class="content-group">Isian Data Peralatan</p>
																</div>
															</div>

															<div class="col-md-1">
																<font class="text-semibold" style="font-size: 12px;">Switch in</font>
																<span class="switch switch-outline switch-icon switch-primary">

																	<label>
																		<input type="checkbox" checked="checked" id="checkbox_37" value="1" onclick="javascript:checkbox37()" name="checkbox_37" />
																		<span></span>
																	</label>
																</span>

															</div>
															<div class="col-md-2">
																<br>
																<a href="<?php echo base_url('get_file/get_bu_37/').$biodata[0]['persyaratan_37'] ;?>" target="_blank" type="button" name="btn_cek_37"  style="float: right" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
															</div>
																<div class="col-md-6">
																	<br>
																	<div class="input-group file-caption-main">
																		<span class="file-caption-icon"></span>
																		<input type="text" id="comment_37" name="comment_37"   class="form-control" disabled="disabled" placeholder="Comment...">


																	<div class="input-group-btn input-group-append">
																		<button type="button" onclick="javascript:get37()" id="get_37"  disabled="disabled" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
																			</div>
																	</div>
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
														<td><span class="text-primary"><?php echo $biodata[0]['Nama'] ;?></span></td>

													</tr>
													<tr>
														<td>ID Badan Usaha</td>
														<td><span class="text-primary"><?php echo $biodata[0]['ID_BU'] ;?></span></td>

													</tr>
													<tr>
														<td>Bentuk Usaha</td>
														<td><span class="text-primary"><?php echo $biodata[0]['id_bentuk_usaha'] ;?></span></td>

													</tr>
													<tr>
														<td>Jenis Usaha KBLI</td>
														<td><span class="text-primary"><?php echo $biodata[0]['ID_Jenis_BU_kbli'] ;?></span></td>

													</tr>
													<tr>
														<td>Kategori Badan Usaha</td>
														<td><span class="text-primary"><?php echo $biodata[0]['ID_Bentuk_BU'] ;?></span></td>

													</tr>
													<tr>
														<td>Pimpinan Badan Usaha</td>
														<td><span class="text-primary"></span></td>

													</tr>
													<tr>
														<td>Alamat Domisili Hukum</td>
														<td><span class="text-primary"><?php echo $biodata[0]['Alamat'] ;?></span></td>
													</tr>
													<tr>
														<td>Propinsi Registrasi</td>
														<td><span class="text-primary"><?php echo $biodata[0]['ID_Propinsi'] ;?></span></td>
													</tr>
													<tr>
														<td>Kabupaten/Kota</td>
														<td><span class="text-primary"><?php echo $biodata[0]['ID_Kabupaten'] ;?></span></td>
													</tr>
													<tr>
														<td>Telepon</td>
														<td><span class="text-primary"><?php echo $biodata[0]['Telepon'] ;?></span></td>
													</tr>
													<tr>
														<td>Faximili</td>
														<td><span class="text-primary"><?php echo $biodata[0]['Fax'] ;?></span></td>
													</tr>
													<tr>
														<td>Kodepos</td>
														<td><span class="text-primary"><?php echo $biodata[0]['Kodepos'] ;?></span></td>
													</tr>
													<tr>
														<td>Email</td>
														<td><span class="text-primary"><?php echo $biodata[0]['Email'] ;?></span></td>
													</tr>
													<tr>
														<td>Website</td>
														<td><span class="text-primary"><?php echo $biodata[0]['Website'] ;?></span></td>
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
																		 <option data-text="<?php echo $row_pengurus2['Nama'] ;?>" value="<?php echo $row_pengurus2['id_pengurus'] ;?>"><?php echo $row_pengurus2['Nama'] ;?></option>
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


										<div class="accordion accordion-toggle-arrow" id="accordionExample1">

												<?php foreach ($pengurus as $row_pengurus) :?>
													<?php $counter_pengurus+=1 ;?>
											<div class="card">
													<div class="card-header">
															<div class="card-title collapsed" data-toggle="collapse" data-target="#data-pengurus-<?php echo $counter_pengurus ;?>">
																<?= $row_pengurus['Nama'] ?>
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
																				<td><span class="text-primary"><?php echo $row_pengurus['Nama'] ?></span></td>


																			</tr>
																			<tr>
																				<td>No KTP</td>
																				<td><span class="text-primary"><?php echo $row_pengurus['No_KTP'] ?></span></td>
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
																				<td><span class="text-primary"><?php echo $row_pengurus['Tempat_Lahir'] ?></span></td>
																			</tr>
																			<tr>
																				<td>Tanggal Lahir</td>
																				<td><span class="text-primary"><?php echo $row_pengurus['Tgl_Lahir'] ?></span></td>
																			</tr>
																			<tr>
																				<td>Jabatan BU</td>
																				<td><span class="text-primary"><?php echo $row_pengurus['Jabatan_BU'] ?></span></td>
																			</tr>
																			<tr>
																				<td>Jalan</td>
																				<td><span class="text-primary"><?php echo $row_pengurus['Alamat'] ?></span></td>
																			</tr>
																			<tr>
																				<td>Kodepos</td>
																				<td><span class="text-primary"><?php echo $row_pengurus['Kodepos'] ?></span></td>
																			</tr>
																			<tr>
																				<td>Propinsi</td>
																				<td><span class="text-primary"><?php echo $row_pengurus['ID_Propinsi'] ?></span></td>
																			</tr>
																			<tr>
																				<td>Kabupaten</td>
																				<td><span class="text-primary"><?php echo $row_pengurus['ID_Kabupaten_Alamat'] ?></span></td>
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
																	 <option value="<?php echo $row_pengalaman2['Nomor_Kontrak'] ;?>"><?php echo $row_pengalaman2['Nomor_Kontrak'] ;?></option>
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
																	 <option value="<?php echo $row_pengalaman2['ID_Sub_Klasifikasi_kbli'] ;?>"><?php echo $row_pengalaman2['ID_Sub_Klasifikasi_kbli'] ;?></option>
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
									<div class="accordion accordion-toggle-arrow" id="accordionExample1">

											<?php foreach ($pengalaman as $row_pengalaman) :?>
												<?php $counter_pengalaman+=1 ;?>
										<div class="card">
												<div class="card-header">
														<div class="card-title collapsed" data-toggle="collapse" data-target="#data-pengalaman-<?php echo $counter_pengalaman ;?>">
															<?php echo $row_pengalaman['Nama_Paket'] ;?>
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
																			<td><span class="text-primary"><?php echo $row_pengalaman['Nama_Paket'] ;?></span></td>
																		</tr>
																		<tr>
																			<td>No Kontrak</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['Nomor_Kontrak'] ;?></span></td>
																		</tr>
																		<tr>
																			<td>Nilai Kontrak</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['Nilai_Kontrak'] ;?></span></td>
																		</tr>
																		<tr>
																			<td>Propinsi</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['ID_Propinsi'] ;?></span></td>
																		</tr>

																		<tr>
																			<td>Nomor BA Serah Terima</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['Nomor_BA_Serah_Terima'] ;?></span></td>
																		</tr>
																		<tr>
																			<td>Asosiasi</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['ID_Asosiasi_BU'] ;?></span></td>
																		</tr>
																		<tr>
																			<td>Pemberi Tugas</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['Pemberi_Tugas'] ;?></span></td>
																		</tr>
																		<tr>
																			<td>Tahun</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['Tahun'] ;?></span></td>
																		</tr>
																		<tr>
																			<td>ID Sumber Dana</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['ID_Sumber_Dana'] ;?></span></td>
																		</tr>
																		<tr>
																			<td>Klasifikasi</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['ID_Klasifikasi'] ;?></span></td>
																		</tr>
																		<tr>
																			<td>Sub Klasifikasi</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['ID_Sub_Klasifikasi_kbli'] ;?></span></td>
																		</tr>
																		<tr>
																			<td>Tgl Kontrak</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['Tgl_Kontrak'] ;?></span></td>
																		</tr>
																		<tr>
																			<td>Tgl Mulai</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['Tgl_Mulai'] ;?></span></td>
																		</tr>
																		<tr>
																			<td>Tgl Selesai</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['Tgl_Selesai'] ;?></span></td>
																		</tr>
																		<tr>
																			<td>Tgl Terima</td>
																			<td><span class="text-primary"><?php echo $row_pengalaman['Tgl_Selesai'] ;?></span></td>
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
															<td><span class="text-primary"><?php echo $akte_pendirian[0]['No_Akte_Pendirian'] ;?></span></td>
														</tr>
														<tr>
															<td>Nama Notaris</td>
															<td><span class="text-primary"><?php echo $akte_pendirian[0]['Nama_Notaris'] ;?></span></td>
														</tr>
														<tr>
															<td>Alamat</td>
															<td><span class="text-primary"><?php echo $akte_pendirian[0]['Alamat'] ;?></span></td>
														</tr>
														<tr>
															<td>Tanggal Akte</td>
															<td><span class="text-primary"><?php echo $akte_pendirian[0]['Tgl_Akte_Pendirian'] ;?></span></td>
														</tr>
														<tr>
															<td>Propinsi Registrasi</td>
															<td><span class="text-primary"><?php echo $akte_pendirian[0]['Propinsi_Akte_Pendirian'] ;?></span></td>
														</tr>
														<tr>
															<td>Kabupaten / Kota</td>
															<td><span class="text-primary"><?php echo $akte_pendirian[0]['Kabupaten_Akte_Pendirian'] ;?></span></td>
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
															<td><span class="text-primary"></span></td>
														</tr>
														<tr>
															<td>Tanggal Menteri</td>
															<td><span class="text-primary"><?php echo $akte_pendirian[0]['Tgl_Pengesahan_Menteri'] ;?></span></td>
														</tr>
														<tr>
															<td>Pengadilan Negeri</td>
															<td><span class="text-primary"><?php echo $akte_pendirian[0]['No_Pengesahan_Menteri'] ;?></span></td>
														</tr>
														<tr>
															<td>Tanggal Pengadilan Negeri</td>
															<td><span class="text-primary"><?php echo $akte_pendirian[0]['Tgl_Pengesahan_PN'] ;?></span></td>
														</tr>
														<tr>
															<td>Lembar Negara</td>
															<td><span class="text-primary"><?php echo $akte_pendirian[0]['No_Pengesahan_LN'] ;?></span></td>
														</tr>
														<tr>
															<td>Tanggal Lembar Negara</td>
															<td><span class="text-primary"><?php echo $akte_pendirian[0]['Tgl_Pengesahan_LN'] ;?></span></td>
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

																					 <option value="<?php echo $row_perubahan2['Nomer'] ;?>"><?php echo $row_perubahan2['Nomer'] ;?></option>
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
																					 <option value="<?php echo $row_perubahan3['Tanggal'] ;?>"><?php echo $row_perubahan3['Tanggal'] ;?></option>
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
																<?php echo $row_perubahan['Tanggal'] ;?>
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
																				<td>Nomor Akte</td>
																				<td><span class="text-primary"><?php echo $row_perubahan['Nomer'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Nama Notaris</td>
																				<td><span class="text-primary"><?php echo $row_perubahan['Nama_Notaris'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Alamat</td>
																				<td><span class="text-primary"><?php echo $row_perubahan['Alamat'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Tanggal Akte</td>
																				<td><span class="text-primary"><?php echo $row_perubahan['Tanggal'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Propinsi Registrasi</td>
																				<td><span class="text-primary"><?php echo $row_perubahan['propinsi'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Kabupaten / Kota</td>
																				<td><span class="text-primary"><?php echo $row_perubahan['Kabupaten'] ;?></span></td>
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
																				<td><span class="text-primary"><?php echo $row_perubahan['No_Pengesahan_Menteri'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Tanggal Menteri</td>
																				<td><span class="text-primary"><?php echo $row_perubahan['Tgl_Pengesahan_Menteri'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Pengadilan Negeri</td>
																				<td><span class="text-primary"><?php echo $row_perubahan['No_Pengesahan_PN'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Tanggal Pengadilan Negeri</td>
																				<td><span class="text-primary"><?php echo $row_perubahan['Tgl_Pengesahan_PN'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Lembar Negara</td>
																				<td><span class="text-primary"><?php echo $row_perubahan['No_Pengesahan_LN'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Tanggal Lembar Negara</td>
																				<td><span class="text-primary"><?php echo $row_perubahan['Tgl_Pengesahan_LN'] ;?></span></td>
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
														<td><span class="text-primary"><?php echo $pph_omset[0]['Tahun_SPT1'] ;?></span></td>
													</tr>
													<tr>
														<td>Pembayaran Kewajiban Pajak</td>
														<td><span class="text-primary"><?php echo $pph_omset[0]['SPT1'] ;?></span></td>
													</tr>
													<tr>
														<td>SPT PPH th 2</td>
														<td><span class="text-primary"><?php echo $pph_omset[0]['Tahun_SPT2'] ;?></span></td>
													</tr>
													<tr>
														<td>Pembayaran Kewajiban Pajak</td>
														<td><span class="text-primary"><?php echo $pph_omset[0]['SPT2'] ;?></span></td>
													</tr>
													<tr>
														<td>Omset th 1</td>
														<td><span class="text-primary"><?php echo $pph_omset[0]['Tahun_Omset1'] ;?></span></td>
													</tr>
													<tr>
														<td>Omset</td>
														<td><span class="text-primary"><?php echo $pph_omset[0]['Omset1'] ;?></span></td>
													</tr>
													<tr>
														<td>Omset th 2</td>
														<td><span class="text-primary"><?php echo $pph_omset[0]['Tahun_Omset2'] ;?></span></td>
													</tr>
													<tr>
														<td>Omset</td>
														<td><span class="text-primary"><?php echo $pph_omset[0]['Omset2'] ;?></span></td>
													</tr>
													<tr>
														<td>Omset th 3</td>
														<td><span class="text-primary"><?php echo $pph_omset[0]['Tahun_Omset3'] ;?></span></td>
													</tr>
													<tr>
														<td>Omset</td>
														<td><span class="text-primary"><?php echo $pph_omset[0]['Omset3'] ;?></span></td>
													</tr>
													<tr>
														<td>Omset th 4</td>
														<td><span class="text-primary"><?php echo $pph_omset[0]['Tahun_Omset4'] ;?></span></td>
													</tr>
													<tr>
														<td>Omset</td>
														<td><span class="text-primary"><?php echo $pph_omset[0]['Omset4'] ;?></span></td>
													</tr>
													<tr>
														<td>Omset th 5</td>
														<td><span class="text-primary"><?php echo $pph_omset[0]['Tahun_Omset5'] ;?></span></td>
													</tr>
													<tr>
														<td>TOmset</td>
														<td><span class="text-primary"><?php echo $pph_omset[0]['Omset5'] ;?></span></td>
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
																					 <option value="<?php echo $row_saham2['ID_Pemilik_Saham'] ;?>"><?php echo $row_saham2['nama_pemilik'] ;?></option>
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
																	<input type="checkbox" checked="checked" id="checkbox_41" value="1" onclick="javascript:checkbox41()" name="checkbox_36" />
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
																		<a href="<?php echo base_url('get_file/get_bu_41/').$row_pengalaman['persyaratan_36'] ;?>" target="_blank" type="button" name="btn_cek_36"  style="float: left" class=" btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
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
																				<td><span class="text-primary"><?php echo $row_saham['Jumlah_Lembar'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Nilai Satuan Per-lembar</td>
																				<td><span class="text-primary"><?php echo $row_saham['Nilai_Per_Lembar'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Total Modal Yang Ditetapkan</td>
																				<td><span class="text-primary"><?php echo $row_saham['Modal_Dasar'] ;?></span></td>
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
																<p class="content-group">Laporan Akutan Publik untuk M1,M2 dan B</p>
															</div>
														</div>

														<div class="col-md-1">
															<font class="text-semibold" style="font-size: 12px;">Switch in</font>
															<span class="switch switch-outline switch-icon switch-primary">

																<label>
																	<input type="checkbox" checked="checked" id="checkbox_21" value="1" onclick="javascript:checkbox21()" name="checkbox_21" />
																	<span></span>
																</label>
															</span>

														</div>

															<div class="col-md-8">
																<br>
																<div class="input-group file-caption-main">
																	<span class="file-caption-icon"></span>
																	<input type="text" id="comment_21" name="comment_21"   class="form-control" disabled="disabled" placeholder="Comment...">


																<div class="input-group-btn input-group-append">
																	<button type="button" onclick="javascript:get21()" id="get_21"  disabled="disabled" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
																		</div>
																</div>
															</div>
													</div>
													<!--#2-->
													<div class="row">
														<div class="col-md-3">
															<div class="content-group-lg">
																<h6 class="text-semibold">#1</h6>
																<p class="content-group">Neraca BU bermaterai 2 tahun terakhir</p>
															</div>
														</div>

														<div class="col-md-1">
															<font class="text-semibold" style="font-size: 12px;">Switch in</font>
															<span class="switch switch-outline switch-icon switch-primary">

																<label>
																	<input type="checkbox" checked="checked" id="checkbox_20" value="1" onclick="javascript:checkbox20()" name="checkbox_20" />
																	<span></span>
																</label>
															</span>

														</div>

															<div class="col-md-8">
																<br>
																<div class="input-group file-caption-main">
																	<span class="file-caption-icon"></span>
																	<input type="text" id="comment_20" name="comment_20"   class="form-control" disabled="disabled" placeholder="Comment...">


																<div class="input-group-btn input-group-append">
																	<button type="button" onclick="javascript:get20()" id="get_20"  disabled="disabled" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
																		</div>
																</div>
															</div>
													</div>
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
																			<p class="content-group">Laporan Akutan Publik untuk M1,M2 dan B</p>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<br>
																		<a href="<?php echo base_url('get_file/get_bu_21/').$row_neraca['persyaratan_21'] ;?>" target="_blank" type="button" name="btn_cek_36"  style="float: left" class=" btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																	</div>


																<!--#2-->

																<div class="col-md-2">
																	<div class="content-group-lg">
																		<h6 class="text-semibold">#2</h6>
																		<p class="content-group">Neraca BU bermaterai 2 tahun terakhir</p>
																	</div>
																</div>


																<div class="col-md-4">
																	<br>
																	<a href="<?php echo base_url('get_file/get_bu_20/').$row_neraca['persyaratan_20'] ;?>" target="_blank" type="button" name="btn_cek_36"  style="float: left" class=" btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
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
																				<td>1. Kas Bank</td>
																				<td><span class="text-primary"><?php echo $row_neraca['KasBank'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>2. Piutang Usaha</td>
																				<td><span class="text-primary"><?php echo $row_neraca['PiutangUsaha'] ;?></span></td>
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
																				 <option value="<?php echo $row_tk2['Noreg'] ;?>"><?php echo $row_tk2['nama'] ;?></option>
																			<?php endforeach ;?>
																		 </select>
																		 <footer class="blockquote-footer">
																			 Pilih Tenaga Kerja
																		 </footer>

																</div>

															</div>
													</div>

													<!--#1-->
													<div class="row">
														<div class="col-md-3">
															<div class="content-group-lg">
																<h6 class="text-semibold">#1</h6>
																<p class="content-group">NPWP Tenaga Kerja</p>
															</div>
														</div>

														<div class="col-md-1">
															<font class="text-semibold" style="font-size: 12px;">Switch in</font>
															<span class="switch switch-outline switch-icon switch-primary">

																<label>
																	<input type="checkbox" checked="checked" id="checkbox_26" value="1" onclick="javascript:checkbox26()" name="checkbox_26" />
																	<span></span>
																</label>
															</span>

														</div>

															<div class="col-md-8">
																<br>
																<div class="input-group file-caption-main">
																	<span class="file-caption-icon"></span>
																	<input type="text" id="comment_26" name="comment_26"   class="form-control" disabled="disabled" placeholder="Comment...">


																<div class="input-group-btn input-group-append">
																	<button type="button" onclick="javascript:get26()" id="get_26"  disabled="disabled" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
																		</div>
																</div>
															</div>
													</div>
													<!--#2-->
													<div class="row">
														<div class="col-md-3">
															<div class="content-group-lg">
																<h6 class="text-semibold">#2</h6>
																<p class="content-group">Ijazah Tenaga Kerja</p>
															</div>
														</div>

														<div class="col-md-1">
															<font class="text-semibold" style="font-size: 12px;">Switch in</font>
															<span class="switch switch-outline switch-icon switch-primary">

																<label>
																	<input type="checkbox" checked="checked" id="checkbox_26" value="1" onclick="javascript:checkbox26()" name="checkbox_26" />
																	<span></span>
																</label>
															</span>

														</div>

															<div class="col-md-8">
																<br>
																<div class="input-group file-caption-main">
																	<span class="file-caption-icon"></span>
																	<input type="text" id="comment_26" name="comment_26"   class="form-control" disabled="disabled" placeholder="Comment...">


																<div class="input-group-btn input-group-append">
																	<button type="button" onclick="javascript:get26()" id="get_26"  disabled="disabled" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
																		</div>
																</div>
															</div>
													</div>
													<!--#3-->
													<div class="row">
														<div class="col-md-3">
															<div class="content-group-lg">
																<h6 class="text-semibold">#3</h6>
																<p class="content-group">KTP Tenaga Kerja</p>
															</div>
														</div>

														<div class="col-md-1">
															<font class="text-semibold" style="font-size: 12px;">Switch in</font>
															<span class="switch switch-outline switch-icon switch-primary">

																<label>
																	<input type="checkbox" checked="checked" id="checkbox_24" value="1" onclick="javascript:checkbox24()" name="checkbox_24" />
																	<span></span>
																</label>
															</span>

														</div>

															<div class="col-md-8">
																<br>
																<div class="input-group file-caption-main">
																	<span class="file-caption-icon"></span>
																	<input type="text" id="comment_24" name="comment_24"   class="form-control" disabled="disabled" placeholder="Comment...">


																<div class="input-group-btn input-group-append">
																	<button type="button" onclick="javascript:get24()" id="get_24"  disabled="disabled" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
																		</div>
																</div>
															</div>
													</div>
													<!--#3-->
													<div class="row">
														<div class="col-md-3">
															<div class="content-group-lg">
																<h6 class="text-semibold">#4</h6>
																<p class="content-group">Riwayat Hidup Tenaga Kerja</p>
															</div>
														</div>

														<div class="col-md-1">
															<font class="text-semibold" style="font-size: 12px;">Switch in</font>
															<span class="switch switch-outline switch-icon switch-primary">

																<label>
																	<input type="checkbox" checked="checked" id="checkbox_27" value="1" onclick="javascript:checkbox27()" name="checkbox_27" />
																	<span></span>
																</label>
															</span>

														</div>

															<div class="col-md-8">
																<br>
																<div class="input-group file-caption-main">
																	<span class="file-caption-icon"></span>
																	<input type="text" id="comment_27" name="comment_27"   class="form-control" disabled="disabled" placeholder="Comment...">


																<div class="input-group-btn input-group-append">
																	<button type="button" onclick="javascript:get27()" id="get_27"  disabled="disabled" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
																		</div>
																</div>
															</div>
													</div>
													<!--#3-->
													<div class="row">
														<div class="col-md-3">
															<div class="content-group-lg">
																<h6 class="text-semibold">#5</h6>
																<p class="content-group">SKA / SKT</p>
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
																<div class="row">
																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#1</h6>
																			<p class="content-group">NPWP Tenaga Kerja</p>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<br>
																		<a href="<?php echo base_url('get_file/get_bu_26/').$row_tk['persyaratan_26'] ;?>" target="_blank" type="button" name="btn_cek_26"  style="float: left" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																	</div>


																<!--#2-->

																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#2</h6>
																			<p class="content-group">Ijazah Tenaga Kerja</p>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<br>
																		<a href="<?php echo base_url('get_file/get_bu_25/').$row_tk['persyaratan_25'] ;?>" target="_blank" type="button" name="btn_cek_25"  style="float: left" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																	</div>

																</div>
																<!--#3-->
																<div class="row">
																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#3</h6>
																			<p class="content-group">KTP Tenaga Kerja</p>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<br>
																		<a href="<?php echo base_url('get_file/get_bu_24/').$row_tk['persyaratan_24'] ;?>" target="_blank" type="button" name="btn_cek_24"  style="float: left" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																	</div>


																<!--#4-->

																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#4</h6>
																			<p class="content-group">Riwayat Hidup Tenaga Kerja</p>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<br>
																		<a href="<?php echo base_url('get_file/get_bu_27/').$row_tk['persyaratan_27'] ;?>" target="_blank" type="button" name="btn_cek_27"  style="float: left" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																	</div>

																</div>
																<!--#5-->
																<div class="row">
																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#5</h6>
																			<p class="content-group">SKA / SKT</p>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<br>
																		<a href="<?php echo base_url('get_file/get_bu_23/').$row_tk['persyaratan_23'] ;?>" target="_blank" type="button" name="btn_cek_23"  style="float: left" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
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
																				<td><span class="text-primary"><?php echo $row_tk['Noreg'] ;?></span></td>
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
																				<td><span class="text-primary"><?php echo $row_tk['Pend_Akhir'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>No. Ijazah</td>
																				<td><span class="text-primary"><?php echo $row_tk['no_ijazah'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Tahun Lulus</td>
																				<td><span class="text-primary"><?php echo $row_tk['Thn_Lulus'] ;?></span></td>
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
																				<td><span class="text-primary"><?php echo $row_tk['ID_Sub_Bidang_Klasifikasi'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Jenis Tenaga Kerja</td>
																				<td><span class="text-primary"><?php echo $row_tk['Tenaga_kerja'] ;?></span></td>
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

																				 <option value="<?php echo $row_klasifikasi2['id_sub_klasifikasi_kbli'] ;?>"><?php echo $row_klasifikasi2['id_sub_klasifikasi_kbli'] ;?></option>
																			<?php endforeach ;?>
																		 </select>
																		 <footer class="blockquote-footer">
																			 Pilih ID Klasifikasi
																		 </footer>


																</div>

															</div>
													</div>

													<!--#1-->
													<div class="row">
														<div class="col-md-3">
															<div class="content-group-lg">
																<h6 class="text-semibold">#1</h6>
																<p class="content-group">Formulir Permohonan & BA VV awal</p>
															</div>
														</div>

														<div class="col-md-1">
															<font class="text-semibold" style="font-size: 12px;">Switch in</font>
															<span class="switch switch-outline switch-icon switch-primary">

																<label>
																	<input type="checkbox" checked="checked" id="checkbox_1" value="1" onclick="javascript:checkbox1()" name="checkbox_1" />
																	<span></span>
																</label>
															</span>

														</div>

															<div class="col-md-8">
																<br>
																<div class="input-group file-caption-main">
																	<span class="file-caption-icon"></span>
																	<input type="text" id="comment_1" name="comment_1"   class="form-control" disabled="disabled" placeholder="Comment...">


																<div class="input-group-btn input-group-append">
																	<button type="button" onclick="javascript:get1()" id="get_1"  disabled="disabled" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
																		</div>
																</div>
															</div>
													</div>
													<!--#2-->
													<div class="row">
														<div class="col-md-3">
															<div class="content-group-lg">
																<h6 class="text-semibold">#2</h6>
																<p class="content-group">Hasil Verifikasi Validasi awal</p>
															</div>
														</div>

														<div class="col-md-1">
															<font class="text-semibold" style="font-size: 12px;">Switch in</font>
															<span class="switch switch-outline switch-icon switch-primary">

																<label>
																	<input type="checkbox" checked="checked" id="checkbox_2" value="1" onclick="javascript:checkbox2()" name="checkbox_2" />
																	<span></span>
																</label>
															</span>

														</div>

															<div class="col-md-8">
																<br>
																<div class="input-group file-caption-main">
																	<span class="file-caption-icon"></span>
																	<input type="text" id="comment_2" name="comment_2"   class="form-control" disabled="disabled" placeholder="Comment...">


																<div class="input-group-btn input-group-append">
																	<button type="button" onclick="javascript:get2()" id="get_2"  disabled="disabled" class="btn btn-primary btn-ladda btn-ladda-spinner" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Submit</span></button>
																		</div>
																</div>
															</div>
													</div>
													<!--#3-->
													<div class="row">
														<div class="col-md-3">
															<div class="content-group-lg">
																<h6 class="text-semibold">#3</h6>
																<p class="content-group">Surat Pengantar Permohonan Subklasifikasi & Subkualifikasi</p>
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
																<h6 class="text-semibold">#4</h6>
																<p class="content-group">Surat Permohonan Klasifikasi dan Kualifikasi Konversi</p>
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
																<h6 class="text-semibold">#5</h6>
																<p class="content-group">Surat Pernyataan Badan Usaha</p>
															</div>
														</div>

														<div class="col-md-1">
															<font class="text-semibold" style="font-size: 12px;">Switch in</font>
															<span class="switch switch-outline switch-icon switch-primary">

																<label>
																	<input type="checkbox" checked="checked" id="checkbox_5" value="1" onclick="javascript:checkbox5()" name="checkbox_4" />
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
																<h6 class="text-semibold">#6</h6>
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
																<h6 class="text-semibold">#7</h6>
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
										<div class="accordion accordion-toggle-arrow" id="accordionExample1">

												<?php foreach ($klasifikasi as $row_klasifikasi) :?>
													<?php $counter_klasifikasi+=1 ;?>
											<div class="card">
													<div class="card-header">
															<div class="card-title collapsed" data-toggle="collapse" data-target="#data-klasifikasi-<?php echo $counter_klasifikasi ;?>">
																<?php echo $row_klasifikasi['id_sub_klasifikasi_kbli'] ;?>
															</div>
													</div>
													<div id="data-klasifikasi-<?php echo $counter_klasifikasi ;?>" class="collapse show" data-parent="#accordionExample1">

															<div class="card-body">
																<div class="row">
																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#1</h6>
																			<p class="content-group">Surat Pengantar Permohonan Subklasifikasi Kualifikasi & BA VV awal</p>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<br>
																		<a href="<?php echo base_url('get_file/get_bu_1/').$row_klasifikasi['persyaratan_1'] ;?>" target="_blank" type="button" name="btn_cek"  style="float: left" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																	</div>


																<!--#2-->

																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#2</h6>
																			<p class="content-group">Hasil Verifikasi Validasi awal</p>
																		</div>
																	</div>


																	<div class="col-md-4">
																		<br>
																		<a href="<?php echo base_url('get_file/get_bu_2/').$row_klasifikasi['persyaratan_2'] ;?>" target="_blank" type="button" name="btn_cek_2"  style="float: left" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a>
																	</div>

																</div>


																<!--#3-->
																<div class="row">
																	<div class="col-md-2">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#3</h6>
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
																			<h6 class="text-semibold">#4</h6>
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
																			<h6 class="text-semibold">#5</h6>
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
																		 <h6 class="text-semibold">#6</h6>
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
																		 <h6 class="text-semibold">#7</h6>
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
																	<a href="<?php echo base_url('badan_usaha/edit_klasifikasi/'.encrypt_url($row_klasifikasi['id_sub_klasifikasi_kbli'])) ;?>" target="_blank" type="button" name="edit_klasifikasi"  style="float: middle" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class=" icon-pencil" ></i></b> Edit Klasifikasi</a>
																	<a href="<?php echo base_url('badan_usaha/delete_klasifikasi/'.encrypt_url($row_klasifikasi['id_sub_klasifikasi_kbli'])) ;?>" target="_blank" type="button" name="edit_klasifikasi"  style="float: middle" class="open-delete btn btn-danger btn-labeled btn-rounded" ><b><i class=" icon-trash" ></i></b> Delete Klasifikasi</a>


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
																				<td><span class="text-primary"><?php echo $row_klasifikasi['Tahun'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Klasifikasi</td>
																				<td><span class="text-primary"><?php echo $row_klasifikasi['id_klasifikasi_kbli'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Sub Klasifikasi</td>
																				<td><span class="text-primary"><?php echo $row_klasifikasi['id_sub_klasifikasi_kbli'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Kualifikasi</td>
																				<td><span class="text-primary"><?php echo $row_klasifikasi['kualifikasi_kbli'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>No BA Asosiasi</td>
																				<td><span class="text-primary"><?php echo $row_klasifikasi['No_BA_Asosiasi'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Asosiasi</td>
																				<td><span class="text-primary"><?php echo $row_klasifikasi['ID_Asosiasi_BU'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Propinsi Registrasi</td>
																				<td><span class="text-primary"><?php echo $row_klasifikasi['Propinsi'] ;?></span></td>
																			</tr>
																			<tr>
																				<td>Jenis Permohonan</td>
																				<td><span class="text-primary"><?php echo $row_klasifikasi['id_unit_sertifikasi'] ;?></span></td>
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
					<?php if(empty($cek)): ?>
						<button  target="_blank" type="submit" name="submit"  style="float: right" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-paperplane" ></i></b> Submit</button>
					<?php endif; ?>
					<?php echo form_close() ;?>
				</div>
			</div>
    </div>
  </div>
</div>
