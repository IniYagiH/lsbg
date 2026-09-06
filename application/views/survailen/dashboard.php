<link href="<?=base_url('assets/fileinput/css/fileinput.css') ;?>" media="all" rel="stylesheet" type="text/css"/>
<link href="<?=base_url('assets/fileinput/themes/explorer-fas/theme.css') ;?>" media="all" rel="stylesheet" type="text/css"/>
<link href="<?=base_url('assets/plugins/custom/datatables/datatables.bundle.css') ;?>" rel="stylesheet" type="text/css" />

<?php
  echo script_tag('assets/jquery.-3.6.0.min.js');

	echo script_tag('assets/fileinput/fileinput2.js');
  echo script_tag('assets/fileinput/js/plugins/piexif.js');
  echo script_tag('assets/fileinput/js/plugins/sortable.js');
  echo script_tag('assets/fileinput/js/locales/fr.js');
  echo script_tag('assets/fileinput/js/locales/es.js');
  echo script_tag('assets/fileinput/themes/fas/theme.js');
  echo script_tag('assets/fileinput/themes/explorer-fas/theme.js');
  echo script_tag('assets/fileinput/js/plugins/piexif.js');
	echo script_tag('assets/js/mask.js');
  echo script_tag('assets/js/pages/crud/datatables/extensions/responsive.js');
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
          <h2 class="d-flex align-items-center text-dark font-weight-bold my-1 mr-3">Dashboard</h2>
          <!--end::Page Title-->
          <!--begin::Breadcrumb-->
          <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
            <li class="breadcrumb-item text-muted">
              <a href="" class="text-muted">Pelaksana</a>
            </li>
            <li class="breadcrumb-item text-muted">
              <a href="" class="text-muted">Dashboard</a>
            </li>

          </ul>
          <!--end::Breadcrumb-->
        </div>
        <!--end::Page Heading-->
      </div>

    </div>
  </div>
  <!--end::Subheader-->
  <!--begin::Entry-->
  <div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
      <!--begin::Inbox-->
      <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
          <div class="card-title">
            <h3 class="card-label">Permohonan Penerbitan Sertifikasi
              <span class="d-block text-muted pt-2 font-size-sm">Daftar Keseluruhan Permohonan Untuk Dilakukan
                Penerbitan Sertifikasi</span></h3>
          </div>

        </div>
        <div class="card-body">

        <table class="table table-bordered table-hover table-checkable mt-10" id="kt_datatable2">
            <thead>
              <tr>
                <th colspan="4">Survailen</th>
                <th colspan="4">Proses</th>


              </tr>
              <tr>
        
                <th>Propinsi</th>
                <th>Jumlah BU</th>
                <th>Belum Survailen</th>
                <th>Proses Penilaian</th>
                <th>Sudah Survailen</th>
                <th>Jumlah Batch</th>
                <th>Proses Data</th>
              </tr>
            </thead>
            <tbody>

              <?php if(!empty($record)) :?>
              <?php foreach($record as $row) :?>
              <tr>
             
               

                <td><?=$row['propinsi'];?></td>
                <td><?=$row['jumlah_data'];?></td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>
                <a href="<?=base_url('survailen/kegiatan/'.encrypt_url($row['propinsi']));?>" target="_blank" class="btn btn-outline-info pulse pulse-info mr-5">
                
                <i class="flaticon2-poll-symbol"><span class="pulse-ring"></span></i>
                 Proses Data
             </a>

           
                </td>
             



                
              </tr>
            <?php endforeach ;?>
          <?php endif ;?>












            </tbody>
          </table>
        </div>
        <!--end::Compose-->
      </div>
      <!--end::Container-->
    </div>
    <!--end::Entry-->
  </div>