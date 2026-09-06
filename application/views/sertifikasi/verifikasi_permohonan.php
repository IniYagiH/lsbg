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
	<?php echo form_open_multipart(base_url('sertifikasi/insert_verifikasi_ceklis'), 'method="POST"');?>

  <div class="d-flex flex-column-fluid">
    <div class="container">
			<div class="card card-custom gutter-b">
				<div class="card-header">
					<div class="card-title">
						<h3 class="card-label">Verifikasi Permohonan</h3>


					</div>
					<div class="card-toolbar">

						<a href="<?= base_url('sertifikasi/verifikasi_permohonan/'.$nib_dec.'/'.$tgl_dec) ;?>" target="_blank" class="btn btn-primary font-weight-bolder">
						<i class="la la-plus"></i>Verifikasi</a>

					</div>
				</div>

				<div class="card-body">
					<br>
					<div class="example mb-10" id="div1">
						<input type="hidden" id="base_url" value="<?php echo base_url('sertifikasi/permintaan_revisi') ;?>" >

						<div class="example-preview">
							<ul class="nav nav-pills" id="myTab1" role="tablist">

								<li class="nav-item">
									<a class="nav-link active" id="profile-tab-1" data-toggle="tab" href="#pengurus" aria-controls="profile">
										<span class="nav-icon">
											<i class="flaticon2-layers-1"></i>
										</span>
										<span class="nav-text">Pengurus</span>
									</a>
								</li>




							</ul>


							<div class="tab-content mt-5" id="myTabContent1">
								<?php $counter_pengurus=0;
								$counter_pengalaman=0;
								$counter_perubahan=0;
								$counter_saham=0;
								$counter_neraca=0;
								$counter_tk=0;
								$counter_klasifikasi=0;?>

								<div class="tab-pane show active" id="pengurus" role="tabpanel" aria-labelledby="profile-tab-1">
									<?php if(!empty($pengurus)) :?>



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
														<input type="checkbox" checked="checked" value="1" name="checkbox_16" />
														<span></span>
													</label>
												</span>

											</div>

												<div class="col-md-8">
													<br>
													<div class="input-group file-caption-main">
														<span class="file-caption-icon"></span>
														<input type="text" id="comment_16" name="comment_16"   class="form-control" placeholder="Comment...">



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
														<input type="checkbox" checked="checked" id="checkbox_17" value="1" name="checkbox_17" />
														<span></span>
													</label>
												</span>

											</div>

												<div class="col-md-8">
													<br>
													<div class="input-group file-caption-main">
														<span class="file-caption-icon"></span>
														<input type="text" id="comment_17" name="comment_17"   class="form-control"  placeholder="Comment...">



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
														<input type="checkbox" checked="checked" id="checkbox_14" value="1"  name="checkbox_14" />
														<span></span>
													</label>
												</span>

											</div>

												<div class="col-md-8">
													<br>
													<div class="input-group file-caption-main">
														<span class="file-caption-icon"></span>
														<input type="text" id="comment_14" name="comment_14"   class="form-control" placeholder="Comment...">



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
														<input type="checkbox" checked="checked" id="checkbox_18" value="1"  name="checkbox_18" />
														<span></span>
													</label>
												</span>

											</div>

												<div class="col-md-8">
													<br>
													<div class="input-group file-caption-main">
														<span class="file-caption-icon"></span>
														<input type="text" id="comment_18" name="comment_18"   class="form-control"  placeholder="Comment...">



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
														<input type="checkbox" checked="checked" id="checkbox_15" value="1" name="checkbox_15" />
														<span></span>
													</label>
												</span>

											</div>

												<div class="col-md-8">
													<br>
													<div class="input-group file-caption-main">
														<span class="file-caption-icon"></span>
														<input type="text" id="comment_15" name="comment_15"   class="form-control"  placeholder="Comment...">



													</div>
												</div>
										</div>

										<hr>


										<div class="accordion accordion-toggle-arrow" id="accordionExample1">
											<input type="hidden" name="id1" value="<?= $nib_dec;?>" class="form-control">
											<input type="hidden" name="id2" value="<?= $tgl_dec;?>" class="form-control">
												<?php foreach ($pengurus as $row_pengurus) :?>
													<?php $counter_pengurus+=1 ;?>
											<div class="card" id="div1x">
													<div class="card-header">
															<div class="card-title collapsed" data-toggle="collapse" data-target="#data-pengurus-<?php echo $counter_pengurus ;?>">
																<?= $row_pengurus['nama'] ?>
															</div>
													</div>
													<div id="data-pengurus-<?php echo $counter_pengurus ;?>" class="collapse show" data-parent="#accordionExample1">
															<div class="card-body">
																<hr>
																<div class="row">
																	<div class="col-md-3">
																		<div class="content-group-lg">
																			<h6 class="text-semibold">#CEKLIS</h6>
																			<p class="content-group"><?=$row_pengurus['nama'].'-'.$row_pengurus['id_jabatan'] ?></p>
																		</div>
																	</div>

																	<div class="col-md-1">
																		<font class="text-semibold" style="font-size: 12px;">Switch in</font>
																		<span class="switch switch-outline switch-icon switch-primary">

																			<label>
																				<input type="checkbox" checked="checked" id="checkbox<?= $row_pengurus['id_pengurus'] ?>" value="1" name="checkbox<?= $row_pengurus['id_pengurus'] ?>" />
																				<span></span>
																			</label>
																		</span>

																	</div>

																		<div class="col-md-8">
																			<br>
																			<div class="input-group file-caption-main">
																				<span class="file-caption-icon"></span>
																				<input type="text" oninput="set_value('comment<?= $row_pengurus['id_pengurus'] ?>')" id="comment<?= $row_pengurus['id_pengurus'] ?>" name="comment<?= $row_pengurus['id_pengurus'] ?>"   class="form-control"  placeholder="Comment...">



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




							</div>
						</div>


					</div>
					<button id="submit" type="button" name="submit"  style="float: right" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-paperplane" ></i></b> Submit</button>
					<textarea  id="div2" name="div2" rows="10" cols="180"></textarea>
					<?php echo form_close() ;?>


				</div>
			</div>
    </div>
  </div>
</div>

<script>
$('#submit').on('click', function() {
    var MyDiv1 = document.getElementById('accordionExample1');
     var MyDiv2 = document.getElementById('div2');
		 var data1=MyDiv1.innerHTML;

		 var data2=MyDiv1.innerText;
		 var data3=MyDiv1.textContent;
     MyDiv2.value =data1;
  });
</script>
<script>

	function set_value(id) {
		var value=document.getElementById(id).value;
		document.getElementById(id).innerHTML='value="'+value+'"' ;

	}
</script>
