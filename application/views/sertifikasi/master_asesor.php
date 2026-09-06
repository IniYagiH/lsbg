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
	echo script_tag('assets/bootstrap-datepicker.min.js');
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
							<a href="" class="text-muted">Admin</a>
						</li>
						<li class="breadcrumb-item text-muted">
							<a href="" class="text-muted">Master Asesor</a>
						</li>

					</ul>
					<!--end::Breadcrumb-->
				</div>
				<!--end::Page Heading-->
			</div>

		</div>
	</div>

  <div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
			<div class="card card-custom">
				<div class="card-header">
					<div class="card-title">
						<span class="card-icon">
							<i class="flaticon-file-1 text-primary"></i>
						</span>
						<h3 class="card-label">Data ABU</h3>
					</div>

					<div class="card-toolbar">


						<a onclick="javascript:get_abu(this)" class="btn btn-danger font-weight-bolder">
						<i class="la la-plus"></i>Get Data ABU</a>
						<!--end::Button-->
					</div>
				</div>
				<div class="card-body">
					<!--begin: Datatable-->
					<table class="table table-separate table-head-custom collapsed" id="kt_datatable2">
						<thead>
							<tr>
								<th>Username</th>
								<th>Nama</th>
								<th>Email</th>
								<th>NIK</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($asesor as $row) :?>
							<tr>
								<td><?= $row['Username'] ;?></td>
								<td><?= $row['Nama'] ;?></td>
								<td><?= $row['Email'] ;?></td>
								<td><?= $row['NIB'] ;?></td>
							</tr>
						<?php endforeach ;?>

						</tfoot>
					</table>
					<!--end: Datatable-->
				</div>
			</div>

      <!--begin::Card-->

    </div>
  </div>

</div>
<script>

function refresh() {
        window .location.reload();
    }
function get_abu(sel) {
  Swal.fire({
        title: "Anda ingin Memperbarui data ABU?",
        text: "Setelah mengambil data, password asesor akan tereset kembali menjadi default!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "YA !",
        cancelButtonText: "No, Batalkan!",
        reverseButtons: true
    }).then(function(result) {
        if (result.value) {
					Swal.fire({
						 title: "Mohon Tunggu!",
						 text: "Sedang Berjalan",
						 onOpen: function() {
								 Swal.showLoading();

						 }
				 });
          $.ajax({
              url : "<?php echo base_url('sertifikasi/get_abu'); ?>",
              type : "POST",
              data : {nib : 'aa'},
              success : function(data) {
                response = jQuery.parseJSON(data);
								if(response.result==1){
									Swal.fire({

				              icon: "success",
				              title: "Import ABU berhasil",
				              showConfirmButton: false,
				              timer: 1500
				          });
								}else{
									Swal.fire({

				              icon: "error",
				              title: "Import ABU gagal",
				              showConfirmButton: false,
				              timer: 1500
				          });
								}

			          window.setInterval('refresh()', 1500);
                },
                error: function(xhr, status, error) {
                  var err = eval("(" + xhr.responseText + ")");
                  alert(err.Message);
                }
            });

            // result.dismiss can be "cancel", "overlay",
            // "close", and "timer"
        } else if (result.dismiss === "cancel") {
            Swal.fire(
                "Cancelled",
                "Data batal di Import :)",
                "error"
            )
        }
    });
}
</script>
