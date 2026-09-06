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
<div class="d-flex flex-row flex-column-fluid container">
	<!--begin::Subheader-->
	<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
		<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
			<!--begin::Subheader-->
			<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
				<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
					<!--begin::Info-->
					<div class="d-flex align-items-center flex-wrap mr-1">
						<!--begin::Page Heading-->
						<div class="d-flex align-items-baseline flex-wrap mr-5">
							<!--begin::Page Title-->
							<h5 class="text-dark font-weight-bold my-1 mr-5">Lembar Penilaian Asesor</h5>
							<!--end::Page Title-->
							<!--begin::Breadcrumb-->
							<ul
								class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
								<li class="breadcrumb-item text-muted">
									<a href="" class="text-muted">Penilaian</a>
								</li>
								<li class="breadcrumb-item text-muted">
									<a href="" class="text-muted">Skema 37 </a>
								</li>

							</ul>
							<!--end::Breadcrumb-->
						</div>
						<!--end::Page Heading-->
					</div>
				</div>
			</div>
			<div class="main d-flex flex-column flex-row-fluid">

				<div class="card card-custom gutter-b">
					<div class="card-body">
						<div class="row">
							
							<div class="col-xl-12">
								<!--begin::List Widget 1-->
								<div class="card card-custom card-stretch gutter-b">
											<!--begin::Header-->
											<div class="card-header border-0 py-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label font-weight-bolder text-dark">FORM PENJUALAN TAHUNAN</span>
													<span class="text-muted mt-3 font-weight-bold font-size-sm"></span>
												</h3>
												<div class="card-toolbar">
													
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-0 pb-3">
												<!--begin::Table-->
												<div class="table-responsive">
													<table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
														<thead>
															<tr class="text-uppercase">
																<th style="min-width: 100px" class="pl-7">
																	<span class="text-dark-75">Nama FORM</span>
																</th>
																<th style="min-width: 250px">Detail Form</th>
																
																<th style="min-width: 150px">Tanggal Penilaian</th>
																<th style="min-width: 130px">status</th>
																<th style="min-width: 120px">Lembar Penilaian</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td class="pl-0 py-8">
																	<div class="d-flex align-items-center">
																		
																		<div>
																			<a href="<?=base_url('sertifikasi/penilaian_ftp01/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">FTP-01</a>
																			<span class="text-muted font-weight-bold d-block"></span>
																		</div>
																	</div>
																</td>
																<td>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Kelengkapan, Verifikasi Dan Validasi Dokumen Penjualan Tahunan Badan Usaha</span>
																	<span class="text-muted font-weight-bold"></span>
																</td>
																
																<td>
																	<?php if(empty($ftp01)) :?>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">00-00-0000</span>
																	<span class="text-muted font-weight-bold">Belum Dinilai</span>
																	<?php else :?>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?=$ftp01[0]['log'];?></span>
																	<span class="text-muted font-weight-bold">Sudah Dinilai</span>
																	<?php endif ;?>
																</td>
																<td>
																	<?php if(empty($ftp01)) :?>
																	<span class="label label-lg label-light-danger label-inline">Belum_Penilaian</span>
																	<?php else :?>
																		<span class="label label-lg label-light-primary label-inline">Penilaian</span>
																	<?php endif ;?>
																</td>
																<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/penilaian_ftp01/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																	<?php if(empty($ftp01)) :?>	
																	<span class="svg-icon svg-icon-md svg-icon-danger">
																		<?php else :?>
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																			<?php endif ;?>
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<polygon points="0 0 24 0 24 24 0 24" />
																					<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																					<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
																</td>
															</tr>
															<tr>
																<td class="pl-0 py-8">
																	<div class="d-flex align-items-center">
																		
																		<div>
																			<a href="<?=base_url('sertifikasi/penilaian_ftp02/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">FTP-02</a>
																			<span class="text-muted font-weight-bold d-block"></span>
																		</div>
																	</div>
																</td>
																<td>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Evaluasi Penilaian Penjualan Tahunan</span>
																	<span class="text-muted font-weight-bold"></span>
																</td>
															<td>
																	<?php if(empty($ftp02)) :?>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">00-00-0000</span>
																	<span class="text-muted font-weight-bold">Belum Dinilai</span>
																	<?php else :?>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?=$ftp02[0]['log'];?></span>
																	<span class="text-muted font-weight-bold">Sudah Dinilai</span>
																	<?php endif ;?>
																</td>
																<td>
																	<?php if(empty($ftp02)) :?>
																	<span class="label label-lg label-light-danger label-inline">Belum_Penilaian</span>
																	<?php else :?>
																		<span class="label label-lg label-light-primary label-inline">Penilaian</span>
																	<?php endif ;?>
																</td>
																<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/penilaian_ftp02/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																	<?php if(empty($ftp02)) :?>	
																	<span class="svg-icon svg-icon-md svg-icon-danger">
																	<?php else :?>
																		<span class="svg-icon svg-icon-md svg-icon-primary">
																	<?php endif ;?>
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<polygon points="0 0 24 0 24 24 0 24" />
																					<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																					<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
																</td>
															</tr>
															<tr>
																<td class="pl-0 py-8">
																	<div class="d-flex align-items-center">
																		
																		<div>
																			<a href="<?=base_url('sertifikasi/penilaian_ftp03/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">FTP-03</a>
																			<span class="text-muted font-weight-bold d-block"></span>
																		</div>
																	</div>
																</td>
																<td>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Rekomendasi Hasil Penilaian Penjualan Tahunan</span>
																	<span class="text-muted font-weight-bold"></span>
																</td>
																<td>
																	<?php if(empty($ftp03)) :?>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">00-00-0000</span>
																	<span class="text-muted font-weight-bold">Belum Dinilai</span>
																	<?php else :?>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?=$ftp03[0]['log'];?></span>
																	<span class="text-muted font-weight-bold">Sudah Dinilai</span>
																	<?php endif ;?>
																</td>
																<td>
																	<?php if(empty($ftp03)) :?>
																	<span class="label label-lg label-light-danger label-inline">Belum_Penilaian</span>
																	<?php else :?>
																		<span class="label label-lg label-light-primary label-inline">Penilaian</span>
																	<?php endif ;?>
																</td>
																<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/penilaian_ftp03/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																	<?php if(empty($ftp03)) :?>	
																	<span class="svg-icon svg-icon-md svg-icon-danger">
																		<?php else :?>
																		<span class="svg-icon svg-icon-md svg-icon-primary">
																	<?php endif ;?>
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<polygon points="0 0 24 0 24 24 0 24" />
																					<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																					<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
																</td>
															</tr>
															
														</tbody>
													</table>
												</div>
												<!--end::Table-->
											</div>
											<!--end::Body-->
										</div>
								<!--end::List Widget 1-->
							</div>
							<div class="col-xl-12">
								<!--begin::List Widget 1-->
								<div class="card card-custom card-stretch gutter-b">
											<!--begin::Header-->
											<div class="card-header border-0 py-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label font-weight-bolder text-dark">FORM KEMAMPUAN KEUANGAN</span>
													<span class="text-muted mt-3 font-weight-bold font-size-sm"></span>
												</h3>
												<div class="card-toolbar">
													
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-0 pb-3">
												<!--begin::Table-->
												<div class="table-responsive">
													<table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
														<thead>
															<tr class="text-uppercase">
																<th style="min-width: 100px" class="pl-7">
																	<span class="text-dark-75">Nama FORM</span>
																</th>
																<th style="min-width: 250px">Detail Form</th>
																
																<th style="min-width: 150px">Tanggal Penilaian</th>
																<th style="min-width: 130px">status</th>
																<th style="min-width: 120px">Lembar Penilaian</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td class="pl-0 py-8">
																	<div class="d-flex align-items-center">
																		
																		<div>
																			<a href="<?=base_url('sertifikasi/penilaian_fkk01/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">FKK-01</a>
																			<span class="text-muted font-weight-bold d-block"></span>
																		</div>
																	</div>
																</td>
																<td>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Kelengkapan, Verifikasi Dan Validasi Dokumen Kemampuan Keuangan Badan Usaha</span>
																	<span class="text-muted font-weight-bold"></span>
																</td>
																<td>
																	<?php if(empty($fkk01)) :?>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">00-00-0000</span>
																	<span class="text-muted font-weight-bold">Belum Dinilai</span>
																	<?php else :?>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?=$fkk01[0]['log'];?></span>
																	<span class="text-muted font-weight-bold">Sudah Dinilai</span>
																	<?php endif ;?>
																</td>
																<td>
																	<?php if(empty($fkk01)) :?>
																	<span class="label label-lg label-light-danger label-inline">Belum_Penilaian</span>
																	<?php else :?>
																		<span class="label label-lg label-light-primary label-inline">Penilaian</span>
																	<?php endif ;?>
																</td>
																<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/penilaian_fkk01/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																	<?php if(empty($fkk01)) :?>	
																	<span class="svg-icon svg-icon-md svg-icon-danger">
																		<?php else :?>
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																	<?php endif ;?>
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<polygon points="0 0 24 0 24 24 0 24" />
																					<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																					<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
																</td>
															</tr>
															<tr>
																<td class="pl-0 py-8">
																	<div class="d-flex align-items-center">
																		
																		<div>
																			<a href="<?=base_url('sertifikasi/penilaian_fkk02/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">FKK-02</a>
																			<span class="text-muted font-weight-bold d-block"></span>
																		</div>
																	</div>
																</td>
																<td>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Penilaian Kemampuan Keuangan Badan Usaha Bersifat Spesialis</span>
																	<span class="text-muted font-weight-bold"></span>
																</td>
															<td>
																	<?php if(empty($fkk02)) :?>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">00-00-0000</span>
																	<span class="text-muted font-weight-bold">Belum Dinilai</span>
																	<?php else :?>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?=$fkk02[0]['log'];?></span>
																	<span class="text-muted font-weight-bold">Sudah Dinilai</span>
																	<?php endif ;?>
																</td>
																<td>
																	<?php if(empty($fkk02)) :?>
																	<span class="label label-lg label-light-danger label-inline">Belum_Penilaian</span>
																	<?php else :?>
																		<span class="label label-lg label-light-primary label-inline">Penilaian</span>
																	<?php endif ;?>
																</td>
																<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/penilaian_fkk02/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																	<?php if(empty($fkk02)) :?>	
																	<span class="svg-icon svg-icon-md svg-icon-danger">
																		<?php else :?>
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																	<?php endif ;?>
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<polygon points="0 0 24 0 24 24 0 24" />
																					<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																					<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
																</td>
															</tr>
															<tr>
																<td class="pl-0 py-8">
																	<div class="d-flex align-items-center">
																		
																		<div>
																			<a href="<?=base_url('sertifikasi/penilaian_fkk03/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">FKK-03</a>
																			<span class="text-muted font-weight-bold d-block"></span>
																		</div>
																	</div>
																</td>
																<td>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Penilaian Kemampuan Keuangan Badan Usaha Bersifat Umum</span>
																	<span class="text-muted font-weight-bold"></span>
																</td>
																<td>
																	<?php if(empty($fkk03)) :?>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">00-00-0000</span>
																	<span class="text-muted font-weight-bold">Belum Dinilai</span>
																	<?php else :?>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?=$fkk03[0]['log'];?></span>
																	<span class="text-muted font-weight-bold">Sudah Dinilai</span>
																	<?php endif ;?>
																</td>
																<td>
																	<?php if(empty($fkk03)) :?>
																	<span class="label label-lg label-light-danger label-inline">Belum_Penilaian</span>
																	<?php else :?>
																		<span class="label label-lg label-light-primary label-inline">Penilaian</span>
																	<?php endif ;?>
																</td>
																<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/penilaian_fkk03/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																	<?php if(empty($fkk03)) :?>	
																	<span class="svg-icon svg-icon-md svg-icon-danger">
																			<?php else :?>
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																	<?php endif ;?>
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<polygon points="0 0 24 0 24 24 0 24" />
																					<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																					<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
																</td>
															</tr>
															<tr>
																<td class="pl-0 py-8">
																	<div class="d-flex align-items-center">
																		
																		<div>
																			<a href="<?=base_url('sertifikasi/penilaian_fkk04/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">FKK-04</a>
																			<span class="text-muted font-weight-bold d-block"></span>
																		</div>
																	</div>
																</td>
																<td>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Rekomendasi Penilaian Kemampuan Keuangan</span>
																	<span class="text-muted font-weight-bold"></span>
																</td>
																<td>
																	<?php if(empty($fkk04)) :?>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">00-00-0000</span>
																	<span class="text-muted font-weight-bold">Belum Dinilai</span>
																	<?php else :?>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?=$fkk04[0]['log'];?></span>
																	<span class="text-muted font-weight-bold">Sudah Dinilai</span>
																	<?php endif ;?>
																</td>
																<td>
																	<?php if(empty($fkk04)) :?>
																	<span class="label label-lg label-light-danger label-inline">Belum_Penilaian</span>
																	<?php else :?>
																		<span class="label label-lg label-light-primary label-inline">Penilaian</span>
																	<?php endif ;?>
																</td>
																<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/penilaian_fkk04/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																		<?php if(empty($fkk04)) :?>	
																	<span class="svg-icon svg-icon-md svg-icon-danger">
																			<?php else :?>
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																	<?php endif ;?>
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<polygon points="0 0 24 0 24 24 0 24" />
																					<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																					<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
																</td>
															</tr>
															
														</tbody>
													</table>
												</div>
												<!--end::Table-->
											</div>
											<!--end::Body-->
										</div>
								<!--end::List Widget 1-->
							</div>
							<div class="col-xl-12">
								<!--begin::List Widget 1-->
								<div class="card card-custom card-stretch gutter-b">
											<!--begin::Header-->
											<div class="card-header border-0 py-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label font-weight-bolder text-dark">FORM KETERSEDIAAN TENAGA KERJA</span>
													<span class="text-muted mt-3 font-weight-bold font-size-sm"></span>
												</h3>
												<div class="card-toolbar">
													
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-0 pb-3">
												<!--begin::Table-->
												<div class="table-responsive">
													<table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
														<thead>
															<tr class="text-uppercase">
																<th style="min-width: 100px" class="pl-7">
																	<span class="text-dark-75">Nama FORM</span>
																</th>
																<th style="min-width: 250px">Detail Form</th>
																
																<th style="min-width: 150px">Tanggal Penilaian</th>
																<th style="min-width: 130px">status</th>
																<th style="min-width: 120px">Lembar Penilaian</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td class="pl-0 py-8">
																	<div class="d-flex align-items-center">
																		
																		<div>
																			<a href="<?=base_url('sertifikasi/penilaian_ftkk01/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">FTKK-01</a>
																			<span class="text-muted font-weight-bold d-block"></span>
																		</div>
																	</div>
																</td>
																<td>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Kelengkapan, Verifikasi Dan Validasi Dokumen Ketersediaan Tenaga Kerja Badan Usaha Konstruksi</span>
																	<span class="text-muted font-weight-bold"></span>
																</td>
																<td>
																	<?php if(empty($ftkk01)) :?>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">00-00-0000</span>
																	<span class="text-muted font-weight-bold">Belum Dinilai</span>
																	<?php else :?>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?=$ftkk01[0]['log'];?></span>
																	<span class="text-muted font-weight-bold">Sudah Dinilai</span>
																	<?php endif ;?>
																</td>
																<td>
																	<?php if(empty($ftkk01)) :?>
																	<span class="label label-lg label-light-danger label-inline">Belum_Penilaian</span>
																	<?php else :?>
																		<span class="label label-lg label-light-primary label-inline">Penilaian</span>
																	<?php endif ;?>
																</td>
																<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/penilaian_ftkk01/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																	<?php if(empty($ftkk01)) :?>	
																	<span class="svg-icon svg-icon-md svg-icon-danger">
																			<?php else :?>
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																	<?php endif ;?>
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<polygon points="0 0 24 0 24 24 0 24" />
																					<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																					<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
																</td>
															</tr>
															<tr>
																<td class="pl-0 py-8">
																	<div class="d-flex align-items-center">
																		
																		<div>
																			<a href="<?=base_url('sertifikasi/penilaian_ftkk02/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">FTKK-02</a>
																			<span class="text-muted font-weight-bold d-block"></span>
																		</div>
																	</div>
																</td>
																<td>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Evaluasi Penilaian Ketersediaan Tenaga Kerja Badan Usaha Jasa Konstruks</span>
																	<span class="text-muted font-weight-bold"></span>
																</td>
																<td>
																	<?php if(empty($ftkk02)) :?>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">00-00-0000</span>
																	<span class="text-muted font-weight-bold">Belum Dinilai</span>
																	<?php else :?>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?=$ftkk02[0]['log'];?></span>
																	<span class="text-muted font-weight-bold">Sudah Dinilai</span>
																	<?php endif ;?>
																</td>
																<td>
																	<?php if(empty($ftkk02)) :?>
																	<span class="label label-lg label-light-danger label-inline">Belum_Penilaian</span>
																	<?php else :?>
																	<span class="label label-lg label-light-primary label-inline">Penilaian</span>
																	<?php endif ;?>
																</td>
																<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/penilaian_ftkk02/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																	<?php if(empty($ftkk02)) :?>	
																	<span class="svg-icon svg-icon-md svg-icon-danger">
																			<?php else :?>
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																	<?php endif ;?>
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<polygon points="0 0 24 0 24 24 0 24" />
																					<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																					<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
																</td>
															</tr>
															<tr>
																<td class="pl-0 py-8">
																	<div class="d-flex align-items-center">
																		
																		<div>
																			<a href="<?=base_url('sertifikasi/penilaian_ftkk03/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">FTKK-03</a>
																			<span class="text-muted font-weight-bold d-block"></span>
																		</div>
																	</div>
																</td>
																<td>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Rekomendasi Hasil Penilaian Ketersediaan Tenaga Kerja Badan Usaha Konstruksi</span>
																	<span class="text-muted font-weight-bold"></span>
																</td>
																<td>
																	<?php if(empty($ftkk03)) :?>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">00-00-0000</span>
																	<span class="text-muted font-weight-bold">Belum Dinilai</span>
																	<?php else :?>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?=$ftkk03[0]['log'];?></span>
																	<span class="text-muted font-weight-bold">Sudah Dinilai</span>
																	<?php endif ;?>
																</td>
																<td>
																	<?php if(empty($ftkk03)) :?>
																	<span class="label label-lg label-light-danger label-inline">Belum_Penilaian</span>
																	<?php else :?>
																	<span class="label label-lg label-light-primary label-inline">Penilaian</span>
																	<?php endif ;?>
																</td>
																<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/penilaian_ftkk03/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																	<?php if(empty($ftkk03)) :?>	
																	<span class="svg-icon svg-icon-md svg-icon-danger">
																		<?php else :?>
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																	<?php endif ;?>
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<polygon points="0 0 24 0 24 24 0 24" />
																					<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																					<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
																</td>
															</tr>
														
															
														</tbody>
													</table>
												</div>
												<!--end::Table-->
											</div>
											<!--end::Body-->
										</div>
								<!--end::List Widget 1-->
							</div>
							<div class="col-xl-12">
								<!--begin::List Widget 1-->
								<div class="card card-custom card-stretch gutter-b">
											<!--begin::Header-->
											<div class="card-header border-0 py-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label font-weight-bolder text-dark">FORM SMAP</span>
													<span class="text-muted mt-3 font-weight-bold font-size-sm"></span>
												</h3>
												<div class="card-toolbar">
													
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-0 pb-3">
												<!--begin::Table-->
												<div class="table-responsive">
													<table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
														<thead>
															<tr class="text-uppercase">
																<th style="min-width: 100px" class="pl-7">
																	<span class="text-dark-75">Nama FORM</span>
																</th>
																<th style="min-width: 250px">Detail Form</th>
															
																<th style="min-width: 150px">Tanggal Penilaian</th>
																<th style="min-width: 130px">status</th>
																<th style="min-width: 120px">Lembar Penilaian</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td class="pl-0 py-8">
																	<div class="d-flex align-items-center">
																		
																		<div>
																			<a href="<?=base_url('sertifikasi/penilaian_fsmap01/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">FSMAP-01</a>
																			<span class="text-muted font-weight-bold d-block"></span>
																		</div>
																	</div>
																</td>
																<td>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Verifikasi Dan Validasi Sertifikat ISO 37001-2016 Badan Usaha Jasa Konstruksi</span>
																	<span class="text-muted font-weight-bold"></span>
																</td>
																<td>
																	<?php if(empty($fsmap01)) :?>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">00-00-0000</span>
																	<span class="text-muted font-weight-bold">Belum Dinilai</span>
																	<?php else :?>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?=$fsmap01[0]['log'];?></span>
																	<span class="text-muted font-weight-bold">Sudah Dinilai</span>
																	<?php endif ;?>
																</td>
																<td>
																	<?php if(empty($fsmap01)) :?>
																	<span class="label label-lg label-light-danger label-inline">Belum_Penilaian</span>
																	<?php else :?>
																	<span class="label label-lg label-light-primary label-inline">Penilaian</span>
																	<?php endif ;?>
																</td>
																<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/penilaian_fsmap01/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																	<?php if(empty($fsmap01)) :?>
																	<span class="svg-icon svg-icon-md svg-icon-danger">
																		<?php else :?>
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																	<?php endif ;?>
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<polygon points="0 0 24 0 24 24 0 24" />
																					<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																					<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
																</td>
															</tr>
															<tr>
																<td class="pl-0 py-8">
																	<div class="d-flex align-items-center">
																		
																		<div>
																			<a href="<?=base_url('sertifikasi/penilaian_fsmap02/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">FSMAP-02</a>
																			<span class="text-muted font-weight-bold d-block"></span>
																		</div>
																	</div>
																</td>
																<td>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Verifikasi Dan Validasi Dokumen Penerapan SMAP Badan Usaha Jasa Konstruksi Yang Berupa Lembar Konfirmasi Pancek KPK</span>
																	<span class="text-muted font-weight-bold"></span>
																</td>
																<td>
																	<?php if(empty($fsmap02)) :?>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">00-00-0000</span>
																	<span class="text-muted font-weight-bold">Belum Dinilai</span>
																	<?php else :?>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?=$fsmap02[0]['log'];?></span>
																	<span class="text-muted font-weight-bold">Sudah Dinilai</span>
																	<?php endif ;?>
																</td>
																<td>
																	<?php if(empty($fsmap02)) :?>
																	<span class="label label-lg label-light-danger label-inline">Belum_Penilaian</span>
																	<?php else :?>
																	<span class="label label-lg label-light-primary label-inline">Penilaian</span>
																	<?php endif ;?>
																</td>
																<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/penilaian_fsmap02/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																	<?php if(empty($fsmap02)) :?>	
																	<span class="svg-icon svg-icon-md svg-icon-danger">
																	<?php else :?>
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																	<?php endif ;?>
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<polygon points="0 0 24 0 24 24 0 24" />
																					<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																					<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
																</td>
															</tr>
															<tr>
																<td class="pl-0 py-8">
																	<div class="d-flex align-items-center">
																		
																		<div>
																			<a href="<?=base_url('sertifikasi/penilaian_fsmap03/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">FSMAP-03</a>
																			<span class="text-muted font-weight-bold d-block"></span>
																		</div>
																	</div>
																</td>
																<td>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Verifikasi Dan Validasi Dokumen Penerapan SMAP Badan Usaha Jasa Konstruksi Yang Berupa Dokumen Penerapan Sesuai Permen PUPR No 8 Tahun 2022</span>
																	<span class="text-muted font-weight-bold"></span>
																</td>
																<td>
																	<?php if(empty($fsmap03)) :?>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">00-00-0000</span>
																	<span class="text-muted font-weight-bold">Belum Dinilai</span>
																	<?php else :?>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?=$fsmap03[0]['log'];?></span>
																	<span class="text-muted font-weight-bold">Sudah Dinilai</span>
																	<?php endif ;?>
																</td>
																<td>
																	<?php if(empty($fsmap03)) :?>
																	<span class="label label-lg label-light-danger label-inline">Belum_Penilaian</span>
																	<?php else :?>
																	<span class="label label-lg label-light-primary label-inline">Penilaian</span>
																	<?php endif ;?>
																</td>
																<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/penilaian_fsmap03/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																		<span class="svg-icon svg-icon-md svg-icon-danger">
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<polygon points="0 0 24 0 24 24 0 24" />
																					<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																					<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
																</td>
															</tr>
															<tr>
																<td class="pl-0 py-8">
																	<div class="d-flex align-items-center">
																		
																		<div>
																			<a href="<?=base_url('sertifikasi/penilaian_fsmap04/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">FSMAP-04</a>
																			<span class="text-muted font-weight-bold d-block"></span>
																		</div>
																	</div>
																</td>
																<td>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Verifikasi Dan Validasi Surat Pernyataan Memenuhi Dokumen SMAP Badan Usaha Jasa Konstruksi</span>
																	<span class="text-muted font-weight-bold"></span>
																</td>
																<td>
																	<?php if(empty($fsmap04)) :?>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">00-00-0000</span>
																	<span class="text-muted font-weight-bold">Belum Dinilai</span>
																	<?php else :?>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?=$fsmap04[0]['log'];?></span>
																	<span class="text-muted font-weight-bold">Sudah Dinilai</span>
																	<?php endif ;?>
																</td>
																<td>
																	<?php if(empty($fsmap04)) :?>
																	<span class="label label-lg label-light-danger label-inline">Belum_Penilaian</span>
																	<?php else :?>
																	<span class="label label-lg label-light-primary label-inline">Penilaian</span>
																	<?php endif ;?>
																</td>
																<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/penilaian_fsmap04/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																	<?php if(empty($fsmap01)) :?>	
																	<span class="svg-icon svg-icon-md svg-icon-danger">
																	<?php else :?>
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																	<?php endif ;?>
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<polygon points="0 0 24 0 24 24 0 24" />
																					<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																					<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
																</td>
															</tr>
														<tr>
																<td class="pl-0 py-8">
																	<div class="d-flex align-items-center">
																		
																		<div>
																			<a href="<?=base_url('sertifikasi/penilaian_fsmap05/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">FSMAP-05</a>
																			<span class="text-muted font-weight-bold d-block"></span>
																		</div>
																	</div>
																</td>
																<td>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Formulir Penilaian dan Rekomendasi Kesesuaian Dokumen Penerapan SMAP Badan Usaha Jasa Konstruksi</span>
																	<span class="text-muted font-weight-bold"></span>
																</td>
																<td>
																	<?php if(empty($fsmap05)) :?>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">00-00-0000</span>
																	<span class="text-muted font-weight-bold">Belum Dinilai</span>
																	<?php else :?>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?=$fsmap05[0]['log'];?></span>
																	<span class="text-muted font-weight-bold">Sudah Dinilai</span>
																	<?php endif ;?>
																</td>
																<td>
																	<?php if(empty($fsmap05)) :?>
																	<span class="label label-lg label-light-danger label-inline">Belum_Penilaian</span>
																	<?php else :?>
																	<span class="label label-lg label-light-primary label-inline">Penilaian</span>
																	<?php endif ;?>
																</td>
																<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/penilaian_fsmap05/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																	<?php if(empty($fsmap05)) :?>	
																	<span class="svg-icon svg-icon-md svg-icon-danger">
																	<?php else :?>
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																	<?php endif ;?>
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<polygon points="0 0 24 0 24 24 0 24" />
																					<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																					<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
																</td>
															</tr>
															
														</tbody>
													</table>
												</div>
												<!--end::Table-->
											</div>
											<!--end::Body-->
										</div>
								<!--end::List Widget 1-->
							</div>
								<div class="col-xl-12">
								<!--begin::List Widget 1-->
								<div class="card card-custom card-stretch gutter-b">
											<!--begin::Header-->
											<div class="card-header border-0 py-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label font-weight-bolder text-dark">FORM KEMAMPUAN PENYEDIAAN PERALATAN</span>
													<span class="text-muted mt-3 font-weight-bold font-size-sm"></span>
												</h3>
												<div class="card-toolbar">
													
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-0 pb-3">
												<!--begin::Table-->
												<div class="table-responsive">
													<table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
														<thead>
															<tr class="text-uppercase">
																<th style="min-width: 100px" class="pl-7">
																	<span class="text-dark-75">Nama FORM</span>
																</th>
																<th style="min-width: 250px">Detail Form</th>
																
																<th style="min-width: 150px">Tanggal Penilaian</th>
																<th style="min-width: 130px">status</th>
																<th style="min-width: 120px">Lembar Penilaian</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td class="pl-0 py-8">
																	<div class="d-flex align-items-center">
																		
																		<div>
																			<a href="<?=base_url('sertifikasi/penilaian_falt01/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">FALT-01</a>
																			<span class="text-muted font-weight-bold d-block"></span>
																		</div>
																	</div>
																</td>
																<td>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Kelengkapan, Verifikasi Dan Validasi Kemampuan Penyediaan Peralatan Konstruksi Badan Usaha</span>
																	<span class="text-muted font-weight-bold"></span>
																</td>
																
															<td>
																<?php if(empty($falt01)) :?>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">00-00-0000</span>
																	<span class="text-muted font-weight-bold">Belum Dinilai</span>
																	<?php else :?>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?=$falt01[0]['log'];?></span>
																	<span class="text-muted font-weight-bold">Sudah Dinilai</span>
																	<?php endif ;?>
																	</td>
																
																<td>
																	
																	<?php if(empty($falt01)) :?>
																	<span class="label label-lg label-light-danger label-inline">Belum_Penilaian</span>
																	<?php else :?>
																	<span class="label label-lg label-light-primary label-inline">Penilaian</span>
																	<?php endif ;?>
																</td>
															
																<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/penilaian_falt01/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																		<?php if(empty($falt01)) :?>
																<span class="svg-icon svg-icon-md svg-icon-danger">
																	<?php else :?>
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																	<?php endif ;?>	
																	
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<polygon points="0 0 24 0 24 24 0 24" />
																					<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																					<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
																</td>
															</tr>
															<tr>
																<td class="pl-0 py-8">
																	<div class="d-flex align-items-center">
																		
																		<div>
																			<a href="<?=base_url('sertifikasi/penilaian_falt02/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">FALT-02</a>
																			<span class="text-muted font-weight-bold d-block"></span>
																		</div>
																	</div>
																</td>
																<td>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Hasil Evaluasi Penilaian Kemampuan Penyediaan Peralatan Konstruksi Badan Usaha</span>
																	<span class="text-muted font-weight-bold"></span>
																</td>
																<td>
																<?php if(empty($falt02)) :?>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">00-00-0000</span>
																	<span class="text-muted font-weight-bold">Belum Dinilai</span>
																	<?php else :?>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?=$falt02[0]['log'];?></span>
																	<span class="text-muted font-weight-bold">Sudah Dinilai</span>
																	<?php endif ;?>
																	</td>
																<td>
																	<?php if(empty($falt02)) :?>
																	<span class="label label-lg label-light-danger label-inline">Belum_Penilaian</span>
																	<?php else :?>
																	<span class="label label-lg label-light-primary label-inline">Penilaian</span>
																	<?php endif ;?>
																</td>
																<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/penilaian_falt02/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																			<?php if(empty($falt02)) :?>
																<span class="svg-icon svg-icon-md svg-icon-danger">
																	<?php else :?>
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																	<?php endif ;?>	
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<polygon points="0 0 24 0 24 24 0 24" />
																					<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																					<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
																</td>
															</tr>
															<tr>
																<td class="pl-0 py-8">
																	<div class="d-flex align-items-center">
																		
																		<div>
																			<a href="<?=base_url('sertifikasi/penilaian_falt03/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">FALT-03</a>
																			<span class="text-muted font-weight-bold d-block"></span>
																		</div>
																	</div>
																</td>
																<td>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Rekomendasi Hasil Evaluasi Penilaian Kemampuan Penyediaan Peralatan Badan Usaha Konstruksi</span>
																	<span class="text-muted font-weight-bold"></span>
																</td>
																<td>
																<?php if(empty($falt03)) :?>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">00-00-0000</span>
																	<span class="text-muted font-weight-bold">Belum Dinilai</span>
																	<?php else :?>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?=$falt03[0]['log'];?></span>
																	<span class="text-muted font-weight-bold">Sudah Dinilai</span>
																	<?php endif ;?>
																</td>
																<td>
																		<?php if(empty($falt03)) :?>
																	<span class="label label-lg label-light-danger label-inline">Belum_Penilaian</span>
																	<?php else :?>
																	<span class="label label-lg label-light-primary label-inline">Penilaian</span>
																	<?php endif ;?>
																</td>
																<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/penilaian_falt03/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																			<?php if(empty($falt03)) :?>
																<span class="svg-icon svg-icon-md svg-icon-danger">
																	<?php else :?>
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																	<?php endif ;?>	
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<polygon points="0 0 24 0 24 24 0 24" />
																					<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																					<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
																</td>
															</tr>
															
														
															
														</tbody>
													</table>
												</div>
												<!--end::Table-->
											</div>
											<!--end::Body-->
										</div>
								<!--end::List Widget 1-->
							</div>
                            <div class="col-xl-12">
								<!--begin::List Widget 1-->
								<div class="card card-custom card-stretch gutter-b">
											<!--begin::Header-->
											<div class="card-header border-0 py-5">
												<h3 class="card-title align-items-start flex-column">
													<span class="card-label font-weight-bolder text-dark">FORM REKOMENDASI</span>
													<span class="text-muted mt-3 font-weight-bold font-size-sm"></span>
												</h3>
												<div class="card-toolbar">
													
												</div>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
											<div class="card-body pt-0 pb-3">
												<!--begin::Table-->
												<div class="table-responsive">
													<table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
														<thead>
															<tr class="text-uppercase">
																<th style="min-width: 100px" class="pl-7">
																	<span class="text-dark-75">Nama FORM</span>
																</th>
																<th style="min-width: 250px">Detail Form</th>
																
																<th style="min-width: 150px">Tanggal Penilaian</th>
																<th style="min-width: 130px">status</th>
																<th style="min-width: 120px">Lembar Penilaian</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td class="pl-0 py-8">
																	<div class="d-flex align-items-center">
																		
																		<div>
																			<a href="<?=base_url('sertifikasi/penilaian_frpkp/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">FRPKP</a>
																			<span class="text-muted font-weight-bold d-block"></span>
																		</div>
																	</div>
																</td>
																<td>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Rekomendasi Hasil Penilaian Kesesuaian Kemampuan Badan Usaha Jasa Konstruksi</span>
																	<span class="text-muted font-weight-bold"></span>
																</td>
																<td>
																	<?php if(empty($frpkp)) :?>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">00-00-0000</span>
																	<span class="text-muted font-weight-bold">Belum Dinilai</span>
																	<?php else :?>
																		<span class="text-dark-75 font-weight-bolder d-block font-size-lg"><?=$frpkp[0]['log'];?></span>
																	<span class="text-muted font-weight-bold">Sudah Dinilai</span>
																	<?php endif ;?>
																</td>
																<td>
																	<?php if(empty($frpkp)) :?>
																	<span class="label label-lg label-light-danger label-inline">Belum_Penilaian</span>
																	<?php else :?>
																	<span class="label label-lg label-light-primary label-inline">Penilaian</span>
																	<?php endif ;?>
																</td>
																<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/penilaian_frpkp/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																	<?php if(empty($frpkp)) :?>	
																	<span class="svg-icon svg-icon-md svg-icon-danger">
																	<?php else :?>
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																	<?php endif ;?>
																			<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
																			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																				<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																					<polygon points="0 0 24 0 24 24 0 24" />
																					<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
																					<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
																				</g>
																			</svg>
																			<!--end::Svg Icon-->
																		</span>
																	</a>
																</td>
															</tr>
														
														   
															
														</tbody>
													</table>
												</div>
												<!--end::Table-->
											</div>
											<!--end::Body-->
										</div>
								<!--end::List Widget 1-->
							</div>
						
						</div>
						
					</div>
				</div>


			</div>
		</div>
	</div>


</div>