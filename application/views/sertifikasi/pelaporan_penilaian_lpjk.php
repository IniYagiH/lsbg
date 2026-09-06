
<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 11 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../../">
		<meta charset="utf-8" />
		<title>Aplikasi LSBU GAPEKNAS</title>
		<meta name="description" content="Login page example" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<link rel="canonical" href="https://keenthemes.com/metronic" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="<?=base_url();?>assets/css/pages/login/classic/login-4.css" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="<?=base_url();?>assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?=base_url();?>assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
		<link href="<?=base_url();?>assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="<?=base_url();?>assets/media/logos/serbu.jpg" />
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" style="background-image: url(<?=base_url();?>assets/media/bg/bg-10.jpg)" class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
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
							<h5 class="text-dark font-weight-bold my-1 mr-5">PELAPORAN ASESOR LSBU GAPEKNAS TELAH MELAKUKAN ASSESMENT BADAN USAHA <i><?= $biodata[0]['nama'] ?></i> </h5>
							<!--end::Page Title-->
							<!--begin::Breadcrumb-->
							<ul
								class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
							<li class="breadcrumb-item text-muted">
									<a href="" class="text-muted"> <?=$klasifikasi[0]['id_izin'].' / '.$klasifikasi[0]['id_sub_klasifikasi'].' / '.$klasifikasi[0]['kualifikasi'];?></a>
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
																
																
																<th style="min-width: 120px">Form Asesor 1</th>
																<?php if(count($asesor)==2) :?>
																<th style="min-width: 120px">Form Asesor 2</th>
																<?php endif ;?>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td class="pl-0 py-8">
																	<div class="d-flex align-items-center">
																		
																		<div>
																			<a href="" target="_blank" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">FTP-01</a>
																			<span class="text-muted font-weight-bold d-block"></span>
																		</div>
																	</div>
																</td>
																<td>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Kelengkapan, Verifikasi Dan Validasi Dokumen Penjualan Tahunan Badan Usaha</span>
																	<span class="text-muted font-weight-bold"></span>
																</td>
																
																
																
																<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/ftp01_cetak/'.$id1.'/'.$id2.'/'.encrypt_url($asesor[0]['id_asesor'])) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																		
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
																<?php if(count($asesor)==2) :?>
																	<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/ftp01_cetak/'.$id1.'/'.$id2.'/'.encrypt_url($asesor[1]['id_asesor'])) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																		
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
																<?php endif ;?>
															</tr>
															<tr>
																<td class="pl-0 py-8">
																	<div class="d-flex align-items-center">
																		
																		<div>
																			<a href="" target="_blank" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">FTP-02</a>
																			<span class="text-muted font-weight-bold d-block"></span>
																		</div>
																	</div>
																</td>
																<td>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Evaluasi Penilaian Penjualan Tahunan</span>
																	<span class="text-muted font-weight-bold"></span>
																</td>
															
																
																	<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/ftp02_cetak/'.$id1.'/'.$id2.'/'.encrypt_url($asesor[0]['id_asesor'])) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																		
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
																<?php if(count($asesor)==2) :?>
																	<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/ftp02_cetak/'.$id1.'/'.$id2.'/'.encrypt_url($asesor[1]['id_asesor'])) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																		
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
																<?php endif ;?>
															</tr>
															<tr>
																<td class="pl-0 py-8">
																	<div class="d-flex align-items-center">
																		
																		<div>
																			<a href="" target="_blank" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">FTP-03</a>
																			<span class="text-muted font-weight-bold d-block"></span>
																		</div>
																	</div>
																</td>
																<td>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Rekomendasi Hasil Penilaian Penjualan Tahunan</span>
																	<span class="text-muted font-weight-bold"></span>
																</td>
																
																
																	<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/ftp03_cetak/'.$id1.'/'.$id2.'/'.encrypt_url($asesor[0]['id_asesor'])) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																		
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
																<?php if(count($asesor)==2) :?>
																	<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/ftp03_cetak/'.$id1.'/'.$id2.'/'.encrypt_url($asesor[1]['id_asesor'])) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																		
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
																<?php endif ;?>
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
																<th style="min-width: 120px">Form Asesor 1</th>
																<?php if(count($asesor)==2) :?>
																<th style="min-width: 120px">Form Asesor 2</th>
																<?php endif ;?>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td class="pl-0 py-8">
																	<div class="d-flex align-items-center">
																		
																		<div>
																			<a href="" target="_blank" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">FKK-01</a>
																			<span class="text-muted font-weight-bold d-block"></span>
																		</div>
																	</div>
																</td>
																<td>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Kelengkapan, Verifikasi Dan Validasi Dokumen Kemampuan Keuangan Badan Usaha</span>
																	<span class="text-muted font-weight-bold"></span>
																</td>
															
																
																	<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/fkk01_cetak/'.$id1.'/'.$id2.'/'.encrypt_url($asesor[0]['id_asesor'])) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																		
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
																<?php if(count($asesor)==2) :?>
																	<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/fkk01_cetak/'.$id1.'/'.$id2.'/'.encrypt_url($asesor[1]['id_asesor'])) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																		
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
																<?php endif ;?>
															</tr>
															<tr>
																<td class="pl-0 py-8">
																	<div class="d-flex align-items-center">
																		
																		<div>
																			<a href="" target="_blank" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">FKK-02</a>
																			<span class="text-muted font-weight-bold d-block"></span>
																		</div>
																	</div>
																</td>
																<td>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Penilaian Kemampuan Keuangan Badan Usaha Bersifat Spesialis</span>
																	<span class="text-muted font-weight-bold"></span>
																</td>
															
																
																	<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/fkk02_cetak/'.$id1.'/'.$id2.'/'.encrypt_url($asesor[0]['id_asesor'])) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																		
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
																<?php if(count($asesor)==2) :?>
																	<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/fkk02_cetak/'.$id1.'/'.$id2.'/'.encrypt_url($asesor[1]['id_asesor'])) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																		
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
																<?php endif ;?>
															</tr>
															<tr>
																<td class="pl-0 py-8">
																	<div class="d-flex align-items-center">
																		
																		<div>
																			<a href="" target="_blank" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">FKK-03</a>
																			<span class="text-muted font-weight-bold d-block"></span>
																		</div>
																	</div>
																</td>
																<td>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Penilaian Kemampuan Keuangan Badan Usaha Bersifat Umum</span>
																	<span class="text-muted font-weight-bold"></span>
																</td>
																
																
																	<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/fkk03_cetak/'.$id1.'/'.$id2.'/'.encrypt_url($asesor[0]['id_asesor'])) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																		
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
																<?php if(count($asesor)==2) :?>
																	<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/fkk03_cetak/'.$id1.'/'.$id2.'/'.encrypt_url($asesor[1]['id_asesor'])) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																		
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
																<?php endif ;?>
															</tr>
															<tr>
																<td class="pl-0 py-8">
																	<div class="d-flex align-items-center">
																		
																		<div>
																			<a href="" target="_blank" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">FKK-04</a>
																			<span class="text-muted font-weight-bold d-block"></span>
																		</div>
																	</div>
																</td>
																<td>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Rekomendasi Penilaian Kemampuan Keuangan</span>
																	<span class="text-muted font-weight-bold"></span>
																</td>
																
																	<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/fkk04_cetak/'.$id1.'/'.$id2.'/'.encrypt_url($asesor[0]['id_asesor'])) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																		
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
																<?php if(count($asesor)==2) :?>
																	<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/fkk04_cetak/'.$id1.'/'.$id2.'/'.encrypt_url($asesor[1]['id_asesor'])) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																		
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
																<?php endif ;?>
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
																
																<th style="min-width: 120px">Form Asesor 1</th>
																<?php if(count($asesor)==2) :?>
																<th style="min-width: 120px">Form Asesor 2</th>
																<?php endif ;?>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td class="pl-0 py-8">
																	<div class="d-flex align-items-center">
																		
																		<div>
																			<a href="" target="_blank" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">FTKK-01</a>
																			<span class="text-muted font-weight-bold d-block"></span>
																		</div>
																	</div>
																</td>
																<td>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Kelengkapan, Verifikasi Dan Validasi Dokumen Ketersediaan Tenaga Kerja Badan Usaha Konstruksi</span>
																	<span class="text-muted font-weight-bold"></span>
																</td>
																
																<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/ftkk01_cetak/'.$id1.'/'.$id2.'/'.encrypt_url($asesor[0]['id_asesor'])) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																		
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
																<?php if(count($asesor)==2) :?>
																	<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/ftkk01_cetak/'.$id1.'/'.$id2.'/'.encrypt_url($asesor[1]['id_asesor'])) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																		
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
																<?php endif ;?>
															</tr>
															<tr>
																<td class="pl-0 py-8">
																	<div class="d-flex align-items-center">
																		
																		<div>
																			<a href="" target="_blank" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">FTKK-02</a>
																			<span class="text-muted font-weight-bold d-block"></span>
																		</div>
																	</div>
																</td>
																<td>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Evaluasi Penilaian Ketersediaan Tenaga Kerja Badan Usaha Jasa Konstruks</span>
																	<span class="text-muted font-weight-bold"></span>
																</td>
																
																<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/ftkk02_cetak/'.$id1.'/'.$id2.'/'.encrypt_url($asesor[0]['id_asesor'])) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																		
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
																<?php if(count($asesor)==2) :?>
																	<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/ftkk02_cetak/'.$id1.'/'.$id2.'/'.encrypt_url($asesor[1]['id_asesor'])) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																		
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
																<?php endif ;?>
															</tr>
															<tr>
																<td class="pl-0 py-8">
																	<div class="d-flex align-items-center">
																		
																		<div>
																			<a href="<?=base_url('sertifikasi/ftkk03_cetak/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">FTKK-03</a>
																			<span class="text-muted font-weight-bold d-block"></span>
																		</div>
																	</div>
																</td>
																<td>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Rekomendasi Hasil Penilaian Ketersediaan Tenaga Kerja Badan Usaha Konstruksi</span>
																	<span class="text-muted font-weight-bold"></span>
																</td>
																
																<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/ftkk03_cetak/'.$id1.'/'.$id2.'/'.encrypt_url($asesor[0]['id_asesor'])) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																		
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
																<?php if(count($asesor)==2) :?>
																	<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/ftkk01_cetak/'.$id1.'/'.$id2.'/'.encrypt_url($asesor[1]['id_asesor'])) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																		
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
																<?php endif ;?>
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
															
																<th style="min-width: 120px">Form Asesor 1</th>
																<?php if(count($asesor)==2) :?>
																<th style="min-width: 120px">Form Asesor 2</th>
																<?php endif ;?>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td class="pl-0 py-8">
																	<div class="d-flex align-items-center">
																		
																		<div>
																			<a href="" target="_blank" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">FSMAP-01</a>
																			<span class="text-muted font-weight-bold d-block"></span>
																		</div>
																	</div>
																</td>
																<td>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Verifikasi Dan Validasi Sertifikat ISO 37001-2016 Badan Usaha Jasa Konstruksi</span>
																	<span class="text-muted font-weight-bold"></span>
																</td>
																
																<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/fsmap01_cetak/'.$id1.'/'.$id2.'/'.encrypt_url($asesor[0]['id_asesor'])) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																		
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
																<?php if(count($asesor)==2) :?>
																	<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/fsmap01_cetak/'.$id1.'/'.$id2.'/'.encrypt_url($asesor[1]['id_asesor'])) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																		
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
																<?php endif ;?>
															</tr>
															<tr>
																<td class="pl-0 py-8">
																	<div class="d-flex align-items-center">
																		
																		<div>
																			<a href="" target="_blank" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">FSMAP-02</a>
																			<span class="text-muted font-weight-bold d-block"></span>
																		</div>
																	</div>
																</td>
																<td>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Verifikasi Dan Validasi Dokumen Penerapan SMAP Badan Usaha Jasa Konstruksi Yang Berupa Lembar Konfirmasi Pancek KPK</span>
																	<span class="text-muted font-weight-bold"></span>
																</td>
																
																<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/fsmap02_cetak/'.$id1.'/'.$id2.'/'.encrypt_url($asesor[0]['id_asesor'])) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																		
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
																<?php if(count($asesor)==2) :?>
																	<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/fsmap02_cetak/'.$id1.'/'.$id2.'/'.encrypt_url($asesor[1]['id_asesor'])) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																		
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
																<?php endif ;?>
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
																
															<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/fsmap03_cetak/'.$id1.'/'.$id2.'/'.encrypt_url($asesor[0]['id_asesor'])) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																		
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
																<?php if(count($asesor)==2) :?>
																	<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/fsmap03_cetak/'.$id1.'/'.$id2.'/'.encrypt_url($asesor[1]['id_asesor'])) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																		
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
																<?php endif ;?>
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
																
																<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/fsmap04_cetak/'.$id1.'/'.$id2.'/'.encrypt_url($asesor[0]['id_asesor'])) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																		
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
																<?php if(count($asesor)==2) :?>
																	<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/fsmap04_cetak/'.$id1.'/'.$id2.'/'.encrypt_url($asesor[1]['id_asesor'])) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																		
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
																<?php endif ;?>
															</tr>
														<tr>
																<td class="pl-0 py-8">
																	<div class="d-flex align-items-center">
																		
																		<div>
																			<a href="<?=base_url('sertifikasi/fsmap05_cetak/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">FSMAP-05</a>
																			<span class="text-muted font-weight-bold d-block"></span>
																		</div>
																	</div>
																</td>
																<td>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Formulir Penilaian dan Rekomendasi Kesesuaian Dokumen Penerapan SMAP Badan Usaha Jasa Konstruksi</span>
																	<span class="text-muted font-weight-bold"></span>
																</td>
																
																<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/fsmap05_cetak/'.$id1.'/'.$id2.'/'.encrypt_url($asesor[0]['id_asesor'])) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																		
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
																<?php if(count($asesor)==2) :?>
																	<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/fsmap05_cetak/'.$id1.'/'.$id2.'/'.encrypt_url($asesor[1]['id_asesor'])) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																		
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
																<?php endif ;?>
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
																	<th style="min-width: 120px">Form Asesor 1</th>
																<?php if(count($asesor)==2) :?>
																<th style="min-width: 120px">Form Asesor 2</th>
																<?php endif ;?>
															</tr>
														</thead>
														<tbody>
															<tr>
																<td class="pl-0 py-8">
																	<div class="d-flex align-items-center">
																		
																		<div>
																			<a href="<?=base_url('sertifikasi/falt01_cetak/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">FALT-01</a>
																			<span class="text-muted font-weight-bold d-block"></span>
																		</div>
																	</div>
																</td>
																<td>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Verifikasi Dan Validasi Kemampuan Penyediaan Peralatan Konstruksi Badan Usaha</span>
																	<span class="text-muted font-weight-bold"></span>
																</td>
																
																<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/falt01_cetak/'.$id1.'/'.$id2.'/'.encrypt_url($asesor[0]['id_asesor'])) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																		
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
																<?php if(count($asesor)==2) :?>
																	<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/falt01_cetak/'.$id1.'/'.$id2.'/'.encrypt_url($asesor[1]['id_asesor'])) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																		
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
																<?php endif ;?>
															</tr>
															<tr>
																<td class="pl-0 py-8">
																	<div class="d-flex align-items-center">
																		
																		<div>
																			<a href="<?=base_url('sertifikasi/falt02_cetak/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">FALT-02</a>
																			<span class="text-muted font-weight-bold d-block"></span>
																		</div>
																	</div>
																</td>
																<td>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Hasil Evaluasi Penilaian Kemampuan Penyediaan Peralatan Konstruksi Badan Usaha</span>
																	<span class="text-muted font-weight-bold"></span>
																</td>
																
																<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/falt02_cetak/'.$id1.'/'.$id2.'/'.encrypt_url($asesor[0]['id_asesor'])) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																		
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
																<?php if(count($asesor)==2) :?>
																	<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/falt02_cetak/'.$id1.'/'.$id2.'/'.encrypt_url($asesor[1]['id_asesor'])) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																		
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
																<?php endif ;?>
															</tr>
															<tr>
																<td class="pl-0 py-8">
																	<div class="d-flex align-items-center">
																		
																		<div>
																			<a href="<?=base_url('sertifikasi/falt03_cetak/'.$id1.'/'.$id2.'/'.$id3) ;?>" target="_blank" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">FALT-02</a>
																			<span class="text-muted font-weight-bold d-block"></span>
																		</div>
																	</div>
																</td>
																<td>
																	<span class="text-dark-75 font-weight-bolder d-block font-size-lg">Rekomendasi Hasil Evaluasi Penilaian Kemampuan Penyediaan Peralatan Badan Usaha Konstruksi</span>
																	<span class="text-muted font-weight-bold"></span>
																</td>
																
																<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/falt03_cetak/'.$id1.'/'.$id2.'/'.encrypt_url($asesor[0]['id_asesor'])) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																		
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
																<?php if(count($asesor)==2) :?>
																	<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/falt03_cetak/'.$id1.'/'.$id2.'/'.encrypt_url($asesor[1]['id_asesor'])) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																		
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
																<?php endif ;?>
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
																	<th style="min-width: 120px">Form Asesor 1</th>
																<?php if(count($asesor)==2) :?>
																<th style="min-width: 120px">Form Asesor 2</th>
																<?php endif ;?>
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
																
																<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/frpkp_cetak/'.$id1.'/'.$id2.'/'.encrypt_url($asesor[0]['id_asesor'])) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																		
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
																<?php if(count($asesor)==2) :?>
																	<td class="text-center pr-0">
																	
																	<a href="<?=base_url('sertifikasi/frpkp_cetak/'.$id1.'/'.$id2.'/'.encrypt_url($asesor[1]['id_asesor'])) ;?>" target="_blank" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																
																	<span class="svg-icon svg-icon-md svg-icon-primary">
																		
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
																<?php endif ;?>
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
			<!--end::Login-->
		</div>
		<!--end::Main-->
		<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<?php
		echo script_tag('assets/plugins/global/plugins.bundle.js');
		echo script_tag('assets/plugins/custom/prismjs/prismjs.bundle.js');
		echo script_tag('assets/js/scripts.bundle.js');
		echo script_tag('assets/js/pages/custom/login/login-general.js');
		echo script_tag('assets/fileinput/fileinput2.js');

		?>

		<!--end::Page Scripts-->
	</body>
	<script type="text/javascript">
			$(function () {
				toastr["<?php echo $this->session->flashdata('class'); ?>"]("<?php echo $this->session->flashdata('text'); ?>", "<?php echo $this->session->flashdata('title'); ?>")


			});
	</script>
	<!--end::Body-->
</html>
