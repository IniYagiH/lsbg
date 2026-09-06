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
  echo script_tag('assets/js/pages/crud/datatables/data-sources/ajax-server-side.js');
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
          <h2 class="text-white font-weight-bold my-2 mr-5">Headers Examples</h2>
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
            <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Crud</a>
            <!--end::Item-->
            <!--begin::Item-->
            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
            <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Datatables.net</a>
            <!--end::Item-->
            <!--begin::Item-->
            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
            <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Basic</a>
            <!--end::Item-->
            <!--begin::Item-->
            <span class="label label-dot label-sm bg-white opacity-75 mx-3"></span>
            <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Complex Headers</a>
            <!--end::Item-->
          </div>
          <!--end::Breadcrumb-->
        </div>
        <!--end::Heading-->
      </div>
      <!--end::Info-->
      <!--begin::Toolbar-->
      <div class="d-flex align-items-center">
        <!--begin::Button-->
        <a href="#" class="btn btn-transparent-white font-weight-bold py-3 px-6 mr-2">Reports</a>
        <!--end::Button-->
        <!--begin::Dropdown-->
        <div class="dropdown dropdown-inline ml-2" data-toggle="tooltip" title="Quick actions" data-placement="top">
          <a href="#" class="btn btn-white font-weight-bold py-3 px-6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</a>
          <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
            <!--begin::Navigation-->
            <ul class="navi navi-hover py-5">
              <li class="navi-item">
                <a href="#" class="navi-link">
                  <span class="navi-icon">
                    <i class="flaticon2-drop"></i>
                  </span>
                  <span class="navi-text">New Group</span>
                </a>
              </li>
              <li class="navi-item">
                <a href="#" class="navi-link">
                  <span class="navi-icon">
                    <i class="flaticon2-list-3"></i>
                  </span>
                  <span class="navi-text">Contacts</span>
                </a>
              </li>
              <li class="navi-item">
                <a href="#" class="navi-link">
                  <span class="navi-icon">
                    <i class="flaticon2-rocket-1"></i>
                  </span>
                  <span class="navi-text">Groups</span>
                  <span class="navi-link-badge">
                    <span class="label label-light-primary label-inline font-weight-bold">new</span>
                  </span>
                </a>
              </li>
              <li class="navi-item">
                <a href="#" class="navi-link">
                  <span class="navi-icon">
                    <i class="flaticon2-bell-2"></i>
                  </span>
                  <span class="navi-text">Calls</span>
                </a>
              </li>
              <li class="navi-item">
                <a href="#" class="navi-link">
                  <span class="navi-icon">
                    <i class="flaticon2-gear"></i>
                  </span>
                  <span class="navi-text">Settings</span>
                </a>
              </li>
              <li class="navi-separator my-3"></li>
              <li class="navi-item">
                <a href="#" class="navi-link">
                  <span class="navi-icon">
                    <i class="flaticon2-magnifier-tool"></i>
                  </span>
                  <span class="navi-text">Help</span>
                </a>
              </li>
              <li class="navi-item">
                <a href="#" class="navi-link">
                  <span class="navi-icon">
                    <i class="flaticon2-bell-2"></i>
                  </span>
                  <span class="navi-text">Privacy</span>
                  <span class="navi-link-badge">
                    <span class="label label-light-danger label-rounded font-weight-bold">5</span>
                  </span>
                </a>
              </li>
            </ul>
            <!--end::Navigation-->
          </div>
        </div>
        <!--end::Dropdown-->
      </div>
      <!--end::Toolbar-->
    </div>
  </div>
  <!--end::Subheader-->
  <!--begin::Entry-->
  <div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
      <!--begin::Notice-->
      <div class="alert alert-custom alert-white alert-shadow gutter-b" role="alert">
        <div class="alert-icon">
          <span class="svg-icon svg-icon-primary svg-icon-xl">
            <!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
              <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24" />
                <path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3" />
                <path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero" />
              </g>
            </svg>
            <!--end::Svg Icon-->
          </span>
        </div>
        <div class="alert-text">DataTables fully supports colspan and rowspan in the table's header, assigning the required order listeners to the TH element suitable for that column.
        <br />For more info see
        <a class="font-weight-bold" href="https://datatables.net/" target="_blank">the official home</a>of the plugin.</div>
      </div>
      <!--end::Notice-->
      <!--begin::Card-->
      <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
          <div class="card-title">
            <h3 class="card-label">Complex Header
            <span class="d-block text-muted pt-2 font-size-sm">advance header options</span></h3>
          </div>

        </div>
        <div class="card-body">
          <div class="mb-7">
            <div class="row align-items-center">
              <div class="col-lg-9 col-xl-8">
                <div class="row align-items-center">
                  <div class="col-md-4 my-2 my-md-0">
                    <div class="input-icon">
                      <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
                      <span>
                        <i class="flaticon2-search-1 text-muted"></i>
                      </span>
                    </div>
                  </div>
                  <div class="col-md-4 my-2 my-md-0">
                    <div class="d-flex align-items-center">
                      <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                      <select class="form-control" >
                        <option value="">All</option>
                        <option value="1">Pending</option>
                        <option value="2">Delivered</option>
                        <option value="3">Canceled</option>
                        <option value="4">Success</option>
                        <option value="5">Info</option>
                        <option value="6">Danger</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-4 my-2 my-md-0">
                    <div class="d-flex align-items-center">
                      <label class="mr-3 mb-0 d-none d-md-block">Type:</label>
                      <select class="form-control" >
                        <option value="">All</option>
                        <option value="1">Online</option>
                        <option value="2">Retail</option>
                        <option value="3">Direct</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                <button onclick="javascript:submit()" class="btn btn-light-primary px-6 font-weight-bold">Search</button>
              </div>
            </div>
          </div>
          <!--begin: Datatable-->
          <table class="table table-bordered table-hover table-checkable mt-10" id="kt_datatable2">
            <thead>
              <tr>
                <th colspan="2">Order Information</th>
                <th colspan="3">Shipping Information</th>
                <th colspan="3">Agent Information</th>

              </tr>
              <tr>
                <th>IDBU</th>
                <th>id_klasifkasi</th>
                <th>id_sub_klasifikasi</th>
                <th>id_asosiasi</th>
                <th>kualifikasi</th>
                <th>username</th>
                <th>tgl_proses</th>
                <th>tgl_permohonan</th>
                <th>propinsi</th>

                <th>Actions</th>
              </tr>
            </thead>













          </table>
          <!--end: Datatable-->
        </div>
      </div>
      <!--end::Card-->
    </div>
    <!--end::Container-->
  </div>
  <!--end::Entry-->
</div>
<button  id="submitx" onclick="javascript:submitx()" style="display: none;" class="btn btn-light-primary px-6 font-weight-bold"></button>

<input type="hidden" id="pages" value="0" class="form-control">
<input type="hidden" id="med" value="default" class="form-control">


<script type="text/javascript">

        var counterx=0;
      function submit(){
      toastr["info"]("Mohon Tunggu...", "Notification");


      var tgl_permohonan_value2= 'tgl';


                jQuery.ajax({
        url : "<?= base_url('ajax/search_permohonan_bux')?>",
        type : "POST",
        data : {tgl_permohonan:tgl_permohonan_value2},
          success : function(data) {
          response = jQuery.parseJSON(data);
          var table = $('#kt_datatable2').DataTable();
          //$('#kt_datatable2').DataTable().rows().clear().draw();
          table.destroy();
          $('#kt_datatable2').empty();
          counterx=0;


          var array=response.data;
          var count=1;
          toastr["success"]("Data didapat", "Notification");
          /*
          array.forEach(function(element) {



            table.row.add( [
              element.ID_BU,
              element.id_klasifikasi_kbli,
              element.id_sub_klasifikasi_kbli,
              element.ID_Asosiasi_BU,
              element.kualifikasi_kbli,
              element.User_name,
              element.Tgl_proses,
              element.tgl_permohonan,
              element.Propinsi,

              ] )
              .draw();
              count+=1;

          });*/


        },
        error: function(xhr, status, error) {
          var err = eval("(" + xhr.responseText + ")");
          alert(err.Message);
        }
      });



      }
      function submitx(){


        var table = $('#kt_datatable2').DataTable();

  			var limit_value = document.querySelector('#pages').value;
        var pages=parseInt(limit_value);
        console.log(pages);
  			table.page(pages).draw('page');
}

</script>
