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
      <div class="d-flex align-items-center flex-wrap mr-1">
        <!--begin::Mobile Toggle-->
        <button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none" id="kt_subheader_mobile_toggle">
          <span></span>
        </button>
        <!--end::Mobile Toggle-->
        <!--begin::Heading-->

        <!--end::Heading-->
      </div>
      <!--end::Info-->

    </div>

  </div>
  <!--end::Subheader-->
  <!--begin::Entry-->
  <div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
    <div class="row">

      <div class="col-xl-4">
        <div class="card card-custom bgi-no-repeat gutter-b" style="height: 175px; background-color: #663259; background-position: calc(100% + 0.5rem) 100%; background-size: 100% auto; background-image: url(<?= base_url(); ?>assets/media/svg/patterns/taieri.svg)">
          <!--begin::Body-->
          <div class="card-body d-flex align-items-center">
            <div>
              <h3 class="text-white font-weight-bolder line-height-lg mb-5">Import Data Mitra
              <br /></h3>
              <a href='<?= base_url('mitra/import') ;?>' class="btn btn-success font-weight-bold px-6 py-3">Import Data</a>
            </div>
          </div>
          <!--end::Body-->
        </div>
      </div>
      <div class="col-xl-4">
        <div class="card card-custom wave  wave-animate-slow wave-success mb-8 mb-lg-0">
          <div class="card-body">
            <div class="card-body d-flex align-items-center">
              <!--begin::Icon-->
              <div class="mr-6">
                <span class="svg-icon svg-icon-success svg-icon-4x">
                  <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Sketch.svg-->
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                      <rect x="0" y="0" width="24" height="24" />
                      <polygon fill="#000000" opacity="0.3" points="5 3 19 3 23 8 1 8" />
                      <polygon fill="#000000" points="23 8 12 20 1 8" />
                    </g>
                  </svg>
                  <!--end::Svg Icon-->
                </span>
              </div>
              <!--end::Icon-->
              <!--begin::Content-->
              <div class="d-flex flex-column">
                <a href="#" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">User Guide</a>
                <div class="text-dark-75">Petunjuk Penggunaan Aplikasi</div>
              </div>
              <!--end::Content-->
            </div>
          </div>
        </div>
      </div>


    </div>

    </div>
    <!--end::Container-->

  </div>
  <!--end::Entry-->
  <div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
      <!--begin::Invoice-->
      <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
          <!--begin::Notice-->

          <!--end::Notice-->
          <!--begin::Card-->
          <div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
              <div class="card-title">
                <h3 class="card-label">Pemantauan Status Sertifikasi
                <span class="d-block text-muted pt-2 font-size-sm">Daftar Keseluruhan Permohonan Sertifikasi</span></h3>
              </div>

            </div>
            <div class="card-body">

              <!--begin: Datatable-->
              <table class="table table-bordered table-hover table-checkable mt-10" id="kt_datatable2">
                <thead>
                  <tr>
                    <th colspan="3">Data Badan Usaha</th>
                    <th colspan="4">Permohonan</th>

                    <th colspan="4">Status Permohonan</th>

                  </tr>
                  <tr>

                    <th>ID Izin</th>
                    <th>Nama Badan Usaha</th>
                    <th>Propinsi</th>
                    <th>NIB</th>
                    <th>Bentuk</th>
                    <th>Jenis</th>

                    <th>Sub Klas - Kualifikasi</th>
                    <th>Status</th>
                    <th>Actions</th>

                  </tr>
                </thead>
                <tbody>
                  <?php $count=0 ;?>
                  <?php if(!empty($record)) :?>
                  <?php foreach($record as $row) :?>
                    <?php $count+=1 ;?>
                  <tr>

                    <td><?=$row['id_izin'];?></td>
                    <td>

                        <?=$row['nama_bujk'];?>

                    </td>
                    <td><?=$row['nama_propinsi'];?></td>
                    <td><?=$row['NIB'];?></td>
                    <td><?=$row['bentuk_nama'];?></td>
                    <td><?=$row['nama_jenis'];?></td>

                    <td><?=$row['id_sub_klasifikasi'].'-'.$row['kualifikasi'];?></td>
                    <td>
                      <?php if($row['status']=='20') :?>
                        <a type="button" id="<?=$row['id_izin'];?>" onclick="javascript:cek_detail(this)" class="pulse pulse-black"><span class="label label-black label-inline mr-2"><?=$row['stat'];?><span class="pulse-ring"></span> </span></a>

                      <?php elseif($row['status']=='10') :?>
                        <a type="button" id="<?=$row['id_izin'];?>" onclick="javascript:cek_detail(this)" class="pulse pulse-warning"><span class="label label-warning label-inline mr-2"><?=$row['stat'];?><span class="pulse-ring"></span> </span></a>

                      <?php elseif($row['status']=='30') :?>
                        <a type="button" id="<?=$row['id_izin'];?>" onclick="javascript:cek_detail(this)" class="pulse pulse-info"><span class="label label-warning label-inline mr-2"><?=$row['stat'];?><span class="pulse-ring"></span> </span></a>
                      <?php elseif($row['status']=='31') :?>
                        <a type="button" id="<?=$row['id_izin'];?>" onclick="javascript:cek_detail(this)" class="pulse pulse-success"><span class="label label-success label-inline mr-2"><?=$row['stat'];?><span class="pulse-ring"></span> </span></a>

                      <?php elseif($row['status']=='11') :?>
                        <a type="button" id="<?=$row['id_izin'];?>" onclick="javascript:cek_detail(this)" class="pulse pulse-danger"><span class="label label-danger label-inline mr-2"><?=$row['stat'];?><span class="pulse-ring"></span> </span></a>

                      <?php elseif($row['status']=='50') :?>
                        <a type="button" id="<?=$row['id_izin'];?>" onclick="javascript:cek_detail(this)" class="pulse pulse-success"><span class="label label-success label-inline mr-2"><?=$row['stat'];?><span class="pulse-ring"></span> </span></a>

                      <?php elseif($row['status']=='90') :?>
                        <a type="button" id="<?=$row['id_izin'];?>" onclick="javascript:cek_detail(this)" class="pulse pulse-danger"><span class="label label-danger label-inline mr-2"><?=$row['stat'];?><span class="pulse-ring"></span> </span></a>
                      <?php elseif($row['status']=='92') :?>
                        <a type="button" id="<?=$row['id_izin'];?>" onclick="javascript:cek_detail(this)" class="pulse pulse-danger"><span class="label label-info label-inline mr-2"><?=$row['stat'];?><span class="pulse-ring"></span> </span></a>
                      <?php elseif($row['status']=='91') :?>
                        <a type="button" id="<?=$row['id_izin'];?>" onclick="javascript:cek_detail(this)" class="pulse pulse-danger"><span class="label label-info label-inline mr-2"><?=$row['stat'];?><span class="pulse-ring"></span> </span></a>

                      <?php else :?>
                        -
                      <?php endif ;?>


                  </td>
                  <td>
                    <div class="dropdown dropdown-inline">
                      <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">
                                        <i class="la la-cog"></i>
                                    </a>
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <ul class="nav nav-hoverable flex-column">
                          <li class="nav-item"><a class="nav-link" target="_blank" href="<?= base_url("sertifikasi/tinjauan_permohonan_izin/".encrypt_url($row['NIB']).'/'.encrypt_url($row['id_sub_klasifikasi']).'/'.$row['id_izin']) ;?>"><i class="nav-icon la la-chalkboard-teacher"></i><span class="nav-text">Tinjau Permohonan</span></a></li>

                      </ul>
                        </div>
                    </div>


                  </td>


                  </tr>
                <?php endforeach ;?>
              <?php endif ;?>












                </tbody>
              </table>
              <!--end: Datatable-->
            </div>
          </div>
          <!--end::Card-->
        </div>
        <!--end::Container-->
      </div>
      <!--end::Invoice-->
    </div>
    <!--end::Container-->
  </div>
</div>
<div class="modal fade" id="modal_revisi" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeLg" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body" >
        <div class="example example-basic">
          <div class="example-preview">
            <!--begin::Timeline-->
            <div class="timeline timeline-1">
              <div class="timeline-sep bg-primary-opacity-20"></div>
              <div id='timeline'>

              </div>





            </div>
            <!--end::Timeline-->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">

    function cek_detail(sel) {
      $('#modal_revisi').modal('show');
      var id_izin_value=sel.id;
      $('#timeline').html('');

      $.ajax({
          url : "<?php echo base_url('mitra/get_detail_permohonan'); ?>",
          type : "POST",
          data : {id_izin : id_izin_value,},
          success : function(data) {
            response = jQuery.parseJSON(data);
            console.log(response);
            status_20=response.data_20;
            status_10=response.data_10;
            status_30=response.data_30;
            status_11=response.data_11;
            status_31=response.data_31;
            status_50=response.data_50;
            status_90=response.data_90;
            var counter=0;
            if(status_20!='FALSE'){
              const d = new Date(status_20);
              let day = d.getDay();
              if(day==1){hari='Senin';}else if(day==2){hari='Selasa';}else if(day==3){hari='Rabu';}else if(day==4){hari='Kamis';}else if(day==5){hari='Jumat';}else if(day==6){hari='Sabtu';}else if(day==7){hari='Minggu';}
              document.getElementById('timeline').innerHTML +='<div class="timeline-item"><div class="timeline-label">'+hari+'</div><div class="timeline-badge"><i class="text-primary">20</i></div><div class="timeline-content text-muted font-weight-normal">Data masuk : '+status_20+'</div></div>';
            }
            if(status_11!='FALSE'){

              const d = new Date(status_11[0]['tgl_record']);
              let day = d.getDay();

              if(day==1){hari='Senin';}else if(day==2){hari='Selasa';}else if(day==3){hari='Rabu';}else if(day==4){hari='Kamis';}else if(day==5){hari='Jumat';}else if(day==6){hari='Sabtu';}else{hari='Minggu';}
              var counter=0;
              var counterx=0;
              var kalimat='';
              status_11.forEach(function(index,elem,arr){
                counterx+=1;
                if(arr[counter].status=='1'){
                  kalimat+=counterx+'. '+arr[counter].upload_deskripsi+' : "'+arr[counter].ket+'"<span class="label label-rounded label-primary mr-2">V</span><br>';
                }else{
                  kalimat+=counterx+'. '+arr[counter].upload_deskripsi+' : "'+arr[counter].ket+'"<span class="label label-rounded label-danger mr-2">X</span><br>';

                }

                counter+=1;
              });

              document.getElementById('timeline').innerHTML +='<div class="timeline-item"><div class="timeline-label">'+hari+'-'+status_11[0]['tgl_record']+'</div><div class="timeline-badge"><i class="text-danger">11</i></div><div class="timeline-content text-dark font-weight-normal">Permintaan Revisi Berkas<br> : '+kalimat+'</div></div>';
            }
            if(status_10!='FALSE'){
              const d = new Date(status_10);
              let day = d.getDay();
              if(day==1){hari='Senin';}else if(day==2){hari='Selasa';}else if(day==3){hari='Rabu';}else if(day==4){hari='Kamis';}else if(day==5){hari='Jumat';}else if(day==6){hari='Sabtu';}else if(day==7){hari='Minggu';}
              document.getElementById('timeline').innerHTML +='<div class="timeline-item"><div class="timeline-label">'+hari+'</div><div class="timeline-badge"><i class="text-primary">10</i></div><div class="timeline-content text-muted font-weight-normal">Lolos tijauan permohonan : '+status_10+'</div></div>';
            }
            if(status_30!='FALSE'){
              const d = new Date(status_30);
              let day = d.getDay();
              if(day==1){hari='Senin';}else if(day==2){hari='Selasa';}else if(day==3){hari='Rabu';}else if(day==4){hari='Kamis';}else if(day==5){hari='Jumat';}else if(day==6){hari='Sabtu';}else if(day==7){hari='Minggu';}
              document.getElementById('timeline').innerHTML +='<div class="timeline-item"><div class="timeline-label">'+hari+'</div><div class="timeline-badge"><i class="text-primary">30</i></div><div class="timeline-content text-muted font-weight-normal">BUJK Upload Bukti : '+status_30+'</div></div>';
            }

            if(status_31!='FALSE'){
              const d = new Date(status_31);
              let day = d.getDay();
              if(day==1){hari='Senin';}else if(day==2){hari='Selasa';}else if(day==3){hari='Rabu';}else if(day==4){hari='Kamis';}else if(day==5){hari='Jumat';}else if(day==6){hari='Sabtu';}else if(day==7){hari='Minggu';}
              document.getElementById('timeline').innerHTML +='<div class="timeline-item"><div class="timeline-label">'+hari+'</div><div class="timeline-badge"><i class="text-primary">31</i></div><div class="timeline-content text-muted font-weight-normal">Pembayaran diverifikasi : '+status_31+'</div></div>';
            }
            if(status_50!='FALSE'){
              const d = new Date(status_50);
              let day = d.getDay();
              if(day==1){hari='Senin';}else if(day==2){hari='Selasa';}else if(day==3){hari='Rabu';}else if(day==4){hari='Kamis';}else if(day==5){hari='Jumat';}else if(day==6){hari='Sabtu';}else if(day==7){hari='Minggu';}
              document.getElementById('timeline').innerHTML +='<div class="timeline-item"><div class="timeline-label">'+hari+'</div><div class="timeline-badge"><i class="text-primary">50</i></div><div class="timeline-content text-muted font-weight-normal">Terbit Sertifikat : '+status_50+'</div></div>';
            }
            if(status_90!='FALSE'){
              const d = new Date(status_90);
              let day = d.getDay();
              if(day==1){hari='Senin';}else if(day==2){hari='Selasa';}else if(day==3){hari='Rabu';}else if(day==4){hari='Kamis';}else if(day==5){hari='Jumat';}else if(day==6){hari='Sabtu';}else if(day==7){hari='Minggu';}
              document.getElementById('timeline').innerHTML +='<div class="timeline-item"><div class="timeline-label">'+hari+'</div><div class="timeline-badge"><i class="text-danger">90</i></div><div class="timeline-content text-muted font-weight-normal">Ditolak : '+status_90+'</div></div>';
            }


            },
            error: function(xhr, status, error) {
              var err = eval("(" + xhr.responseText + ")");
              alert(err.Message);
            }
        });
    }
    </script>
