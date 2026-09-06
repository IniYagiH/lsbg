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

      <div class="card card-custom position-relative overflow-hidden">
        <div class="row justify-content-center py-8 px-8 py-md-30 px-md-0">
          <div class="col-md-9">
            <div class="row pb-26">
              <div class="col-md-4 border-right-md pr-md-10 py-md-10">

                <div class="text-dark-50 font-size-lg font-weight-bold mb-3">Verifikasi dan Validasi Awal</div>
                <div class="font-size-lg font-weight-bold mb-10"> Pilih Tanggal Permohonan untuk Badan Usaha
                <br><a href=""><?= $this->session->userdata('nama'); ?></a>
                <br /><a href=""><?= $this->session->userdata('npwp'); ?></div>

              </div>
              <div class="col-md-8 py-10 pl-md-10">
                <div class="content-group">
                <div class="list-group">
                  <?php foreach($tgl_permohonan as $row): ?>

                  <a href="<?php echo base_url('sertifikasi/verifikasi/'.encrypt_url($row['Tgl_permohonan'].$row['ID_Asosiasi_BU'])) ;?>" class="list-group-item ">
                <div class="bg-primary rounded d-flex align-items-center justify-content-between text-white max-w-600px position-relative ml-auto p-7">
                  <!--begin::Shape-->

                  <div class="position-absolute opacity-30 top-0 right-0">
                    <span class="svg-icon svg-icon-2x svg-logo-white svg-icon-flip">
                      <!--begin::Svg Icon | path:assets/media/svg/shapes/abstract-8.svg-->
                      <svg xmlns="" width="176" height="165" viewBox="0 0 176 165" fill="none">
                        <g clip-path="url(#clip0)">
                          <path d="M-10.001 135.168C-10.001 151.643 3.87924 165.001 20.9985 165.001C38.1196 165.001 51.998 151.643 51.998 135.168C51.998 118.691 38.1196 105.335 20.9985 105.335C3.87924 105.335 -10.001 118.691 -10.001 135.168Z" fill="#AD84FF" />
                          <path d="M28.749 64.3117C28.749 78.7296 40.8927 90.4163 55.8745 90.4163C70.8563 90.4163 83 78.7296 83 64.3117C83 49.8954 70.8563 38.207 55.8745 38.207C40.8927 38.207 28.749 49.8954 28.749 64.3117Z" fill="#AD84FF" />
                          <path d="M82.9996 120.249C82.9996 144.964 103.819 165 129.501 165C155.181 165 176 144.964 176 120.249C176 95.5342 155.181 75.5 129.501 75.5C103.819 75.5 82.9996 95.5342 82.9996 120.249Z" fill="#AD84FF" />
                          <path d="M98.4976 23.2928C98.4976 43.8887 115.848 60.5856 137.249 60.5856C158.65 60.5856 176 43.8887 176 23.2928C176 2.69692 158.65 -14 137.249 -14C115.848 -14 98.4976 2.69692 98.4976 23.2928Z" fill="#AD84FF" />
                          <path d="M-10.0011 8.37466C-10.0011 20.7322 0.409554 30.7493 13.2503 30.7493C26.0911 30.7493 36.5 20.7322 36.5 8.37466C36.5 -3.98287 26.0911 -14 13.2503 -14C0.409554 -14 -10.0011 -3.98287 -10.0011 8.37466Z" fill="#AD84FF" />
                          <path d="M-2.24881 82.9565C-2.24881 87.0757 1.22081 90.4147 5.50108 90.4147C9.78135 90.4147 13.251 87.0757 13.251 82.9565C13.251 78.839 9.78135 75.5 5.50108 75.5C1.22081 75.5 -2.24881 78.839 -2.24881 82.9565Z" fill="#AD84FF" />
                          <path d="M55.8744 12.1044C55.8744 18.2841 61.0788 23.2926 67.5001 23.2926C73.9196 23.2926 79.124 18.2841 79.124 12.1044C79.124 5.92653 73.9196 0.917969 67.5001 0.917969C61.0788 0.917969 55.8744 5.92653 55.8744 12.1044Z" fill="#AD84FF" />
                        </g>
                      </svg>
                      <!--end::Svg Icon-->
                    </span>
                  </div>
                  <!--end::Shape-->

                  <div class="font-weight-boldest font-size-h5"><?= $row['Tgl_permohonan']; ?></div>
                  <div class="text-right d-flex flex-column">
                    <span class="font-weight-boldest font-size-h3 line-height-sm"><?= $row['Nama']; ?></span>
                    <span class="font-size-sm"><?= $row['concat_sub']; ?></span>
                  </div>


                </div>
                </a>
                <br>
                <?php endforeach; ?>
                </div>
              </div>
              </div>
            </div>

        <div class="col-lg-6">

        </div>


        </div>
          </div>
        </div>
    </div>
  </div>
</div>
