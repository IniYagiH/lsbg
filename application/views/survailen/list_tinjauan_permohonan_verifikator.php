<link href="<?=base_url('assets/fileinput/css/fileinput.css') ;?>" media="all" rel="stylesheet" type="text/css" />
<link href="<?=base_url('assets/fileinput/themes/explorer-fas/theme.css') ;?>" media="all" rel="stylesheet"
  type="text/css" />
<link href="<?=base_url('assets/plugins/custom/datatables/datatables.bundle.css') ;?>" rel="stylesheet"
  type="text/css" />

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
  echo script_tag('assets/js/pages/features/custom/spinners.js');
echo script_tag('assets/bootstrap-datepicker.min.js');
echo script_tag('assets/js/pages/crud/datatables/extensions/responsive3.js');

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
          <h2 class="d-flex align-items-center text-dark font-weight-bold my-1 mr-3">Sertifikasi</h2>
          <!--end::Page Title-->
          <!--begin::Breadcrumb-->
          <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
            <li class="breadcrumb-item text-muted">
              <a href="" class="text-muted">Pelaksana</a>
            </li>
            <li class="breadcrumb-item text-muted">
              <a href="" class="text-muted">Tinjauan Permohonan</a>
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
      <!--begin::Notice-->

      <!--end::Notice-->
      <!--begin::Card-->
      <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
          <div class="card-title">
            <h3 class="card-label">Tinjauan Permohonan Survailen
              <span class="d-block text-muted pt-2 font-size-sm">Daftar Keseluruhan Permohonan Untuk Dilakukan Tinjauan Survailen
                Permohonan</span></h3>
          </div>
      

        </div>
        
      </div>
      <!--begin: Datatable-->
      <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
          <div class="card-title">
         
          </div>
          <div class="card-toolbar">

          
          </div>

        </div>
        <div class="card-body">
          <div class="mb-12">
            <table class="table table-bordered table-hover table-checkable mt-10" id="kt_datatable2">
              <thead>
                <tr>
                  <th colspan="3">Data Badan Usaha</th>
                  <th colspan="4">Permohonan</th>

                  <th colspan="4">Status Permohonan</th>

                </tr>
                <tr>
                  <th>Detail Data</th>
                  <th>Nama_Badan_Usaha</th>
                  <th>NIB</th>
                  <th>Permohonan</th>
                  <th>Sub Klasifikasi</th>
                  <th>Kualifikasi</th>
                  <th>Asesor</th>
                  <th>Propinsi</th>
                  <th>Asosiasi</th>

                  <th>Surat Tugas</th>
                  <th>Actions</th>
                </tr>
              </thead>

              <tbody>
                <?php if(!empty($record)) :?>
              <?php foreach($record as $row) :?>
              <tr>
                <td></td>
                <td>
            
                    <?=$row['nama'];?>
                 
                </td>
                <td><?=$row['NIB'];?></td>
                <td><?php if($row['pilihan']=='1') :?>
                  <a type="button" id="<?=$row['NIB'];?>" name="<?=$row['tgl_permohonan'];?>" onclick="javascript:get_permohonan_detail(this)" class="pulse pulse-info"><span class="label label-info label-inline mr-2">Baru<span class="pulse-ring"></span> </span></a>
                <?php else :?>
                  <a type="button" id="<?=$row['NIB'];?>" name="<?=$row['tgl_permohonan'];?>" onclick="javascript:get_permohonan_detail(this)"class="pulse pulse-danger"><span class="label label-danger label-inline mr-2">Perbaikan<span class="pulse-ring"></span> </span></a>
                <?php endif ;?>


                </td>
                <td><?=$row['concat_sub'];?></td>
                <td><?=$row['concat_kualifikasi'];?></td>
              
                <td><?=$row['asesor1'].', '.$row['asesor2'].', '.$row['asesor3'];?></td>
           
                <td><?=$row['nama_propinsi'];?></td>
                <td><?=$row['nama_asosiasi'];?></td>
                <td><a
                    href="<?=base_url('survailen/surat_tugas_tinjauan/'.$row['NIB']);?>"
                    target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat
                    File</a></td>


                <td>
                  <div class="dropdown dropdown-inline">
    								<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">
    	                                <i class="la la-cog"></i>
    	                            </a>
    							  	<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
    									<ul class="nav nav-hoverable flex-column">
                          <?php if($row['pilihan']=='1') :?>
                            <li class="nav-item"><a class="nav-link" target="_blank" href="<?= base_url("survailen/tinjau_permohonan/".encrypt_url($row['NIB'])) ;?>"><i class="nav-icon la la-chalkboard-teacher"></i><span class="nav-text">Tinjau Permohonan</span></a></li>

                            <?php else :?>
                              <li class="nav-item"><a class="nav-link" target="_blank" href="<?= base_url("survailen/tinjau_permohonan_perbaikan/".encrypt_url($row['NIB'])) ;?>"><i class="nav-icon la la-chalkboard-teacher"></i><span class="nav-text">Tinjau Permohonan</span></a></li>

                              <?php endif ;?>

                    </ul>
    							  	</div>
    							</div>

    						
                </td>
              </tr>
            <?php endforeach ;?>
          <?php endif ;?>












              </tbody>
            </table>
          </div>
        </div>
        <!--end: Datatable-->
      </div>
      <!--end::Card-->
    </div>
    <!--end::Container-->
  </div>
  <!--end::Entry-->
</div>

