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
        <!--begin::Heading-->
        <div class="d-flex flex-column">
          <!--begin::Title-->
          <h2 class="text-white font-weight-bold my-2 mr-5">VV User</h2>
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
            <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Verikasi User</a>
            <!--end::Item-->
          </div>
          <!--end::Breadcrumb-->
        </div>
        <!--end::Heading-->
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
						<h3 class="card-label">Verifikasi User</h3>
					</div>
					<div class="card-toolbar">

						<a data-toggle="modal" id="acc" data-target="#modal_input" class="btn btn-primary font-weight-bolder">
						<i class="la la-plus"></i>Terima User</a>
					</div>
				</div>
				<div class="card-body">
					<!--begin: Datatable-->
					<table class="table table-separate table-head-custom collapsed" id="kt_datatable2">
						<thead>
							<tr>

								<th>Pilih Data</th>
								<th>Username</th>
								<th>Nama </th>
								<th>Email</th>
								<th>NIB</th>
								<th>Propinsi</th>
								<th>File NIB</th>

							</tr>
						</thead>
						<tbody>
							<?php foreach($record as $row) :?>
							<tr>

								<td>
									<div class="d-flex align-items-center mr-3" data-inbox="actions">
										<label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary mr-3">
											<input type="checkbox" name="<?= $row['Username'] ;?>" class="call-checkbox"/>
											<span></span>
										</label>

									</div>

								</td>
								<td><?= $row['Username'] ;?></td>
								<td><?= $row['Nama'] ;?></td>
								<td><?= $row['Email'] ;?></td>
								<td><?= $row['NIB'] ;?></td>
								<td><?= $row['Id_propinsi'] ;?></td>

								<td><a href="<?=base_url('get_file/get_bu_nib/'.$row['persyaratan_nib']) ;?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>


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

<div class="modal fade" id="modal_input" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeXl" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">

			<div class="modal-body">
				<div class="card card-custom gutter-b">
					<div class="card-header">
						<div class="card-title">
							<span class="card-icon">
								<i class="flaticon-file-1 text-primary"></i>
							</span>
							<h3 class="card-label">Input Administrasi</h3>
						</div>
					</div>

					<?php echo form_open_multipart('dashboard/acc_user/', 'class="form-horizontal form-validate-jquery" id="form-upload-1"');?>
						<div class="card-body">

						<div class="form-group row">
							<div class="col-lg-8">
									<label class="control-label">Username <span class="text-danger">*</span></label>
									<input type="text" id='username' name='username' class="form-control" />
							</div>

						</div>










						</div>


				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" id="submit" class="btn btn-primary mr-2">Submit</button>

				<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
			</div>
				<?php echo form_close() ;?>
		</div>
	</div>
</div>


<script type="text/javascript">


	$("#acc").click(function () {
    var oTable = $('#kt_datatable2').dataTable();
		var rowcollection = oTable.$(".call-checkbox:checked", {"page": "all"});
		var value = [];
		var sub = [];
    var coba=[];
    var coba2=[];
    counter=0;
		rowcollection.each(function(index,elem){
			value.push($(elem).val());
			sub = elem.name;
			if(coba.length>0){
				if(coba[counter]!=sub){
					counter=counter+1;
					coba[counter]=sub;
					coba2[counter]="'"+sub+"'";
				}
			}else{
				coba[counter]=sub;
				coba2[counter]="'"+sub+"'";
			}
		});
		$(".modal-body #username").val(coba2);


	});
</script>

<script>

function getval(sel)
{
	document.getElementById("kabupaten").options.length = 0;

	$.ajax({
			url : "<?php echo base_url('administrasi/kabupaten'); ?>",
			type : "POST",
			data : {id_propinsi : sel.value,},
			success : function(data) {

				response = jQuery.parseJSON(data);
				csrfHash = response.csrfHash;

				//console.log( JSON.parse(data) );
				id_kabupaten=response.record;

				$.each(id_kabupaten, function(i, option) {
					var $option = $("<option>", {text: option.Nama, value: option.ID_Kabupaten});
					$option.appendTo("#kabupaten");
				});
				},
				error: function(xhr, status, error) {
					var err = eval("(" + xhr.responseText + ")");
					alert(err.Message);
				}
		});
}
</script>
<script>

	$('#npwp').inputmask({
            mask: '99.999.999.9-999.999',
            definitions: {
                A: {
                    validator: "[A-Za-z0-9 ]"
                },
            },
        });




</script>
<script type="text/javascript">
	$(".file-npwp").fileinput({
    maxFileSize: 20000,
    allowedFileExtensions: ['jpg', 'png', 'pdf'],
    showUpload: false,
    dropZoneEnabled: false
	});
	$(".file-domisili").fileinput({
		maxFileSize: 20000,
    allowedFileExtensions: ['jpg', 'png', 'pdf'],
    showUpload: false,
    dropZoneEnabled: false
	});
	$(".file-penanam").fileinput({
		maxFileSize: 20000,
    allowedFileExtensions: ['jpg', 'png', 'pdf'],
    showUpload: false,
    dropZoneEnabled: false
	});
	$(".file-iso").fileinput({
		maxFileSize: 20000,
    allowedFileExtensions: ['jpg', 'png', 'pdf'],
    showUpload: false,
    dropZoneEnabled: false
	});
	$(".file-peralatan").fileinput({
		maxFileSize: 20000,
    allowedFileExtensions: ['jpg', 'png', 'pdf'],
    showUpload: false,
    dropZoneEnabled: false
	});

	var submitCounter = 0;
	$(function () {
		var uploadURI = $('#form-upload-1').attr('action');
		var progressBar = $('#progress-bar-1');

		$("form#form-upload-1").submit(function () {

		var n1=document.querySelector('#nama_bu').value;
		var n2=document.querySelector('#bentuk_bu').value;
		var n3=document.querySelector('#jenis_bu').value;
		var n4=document.querySelector('#alamat').value;
		var n5=document.querySelector('#kategori_bu').value;
		var n6=document.querySelector('#propinsi').value;
		var n7=document.querySelector('#kabupaten').value;
		var n8=document.querySelector('#telepon').value;
		var n9=document.querySelector('#email').value;
			event.preventDefault();

										if(n1!='' && n2!='' && n3!='' && n4!='' && n5!='' && n7!='' && n6!='' && n8!='' && n9!=''){



											// make sure there is file to upload
											if (document.getElementById("file_npwp").files.length != 0 && document.getElementById("file_domisili").files.length != 0) {
											if (submitCounter < 2) {
												submitCounter++;
													// provide the form data
													// that would be sent to sever through ajax
													var formData = new FormData($(this)[0]);
													// now upload the file using $.ajax
													$.ajax({
														url: uploadURI,
														type: 'post',
														data: formData,
														processData: false,
														contentType: false,
														success: function (data) {
															if (data.result == '1') {
																window.location.replace("<?php echo base_url('administrasi');?>");
															}
															else {
																window.location.replace("<?php echo base_url('administrasi');?>");

															}
														},
														xhr: function () {
															var xhr = new XMLHttpRequest();
															xhr.upload.addEventListener("progress", function (event) {
																if (event.lengthComputable) {
																	var percentComplete = Math.round((event.loaded / event.total) * 100);
																					// console.log(percentComplete);

																					$('.progress').show();
																					if(percentComplete >= 97)
																					{
																						progressBar.text('- Harap Tunggu -');
																					}
																					else {
																						progressBar.text(percentComplete + '%');
																					}
																					progressBar.css({width: percentComplete + "%"});
																			}
																			;
																	}, false);
															return xhr;
														}
													});
											}else{
												toastr["warning"]("This is can be clicked only once.", "Notification");


										}




											}else{
												toastr["warning"]("File * Harus dilampirkan", "Notification");


										}
									}else{
										toastr["warning"]("Data * Harus diisi", "Notification");

									}
								});
		$('body').on('change.bs.fileinput', function (e) {
			$('.progress').hide();
			progressBar.text("0%");
			progressBar.css({width: "0%"});
		});
	});

</script>
