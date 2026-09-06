<link href="<?=base_url('assets/fileinput/css/fileinput.css') ;?>" media="all" rel="stylesheet" type="text/css"/>
<link href="<?=base_url('assets/fileinput/themes/explorer-fas/theme.css') ;?>" media="all" rel="stylesheet" type="text/css"/>
<link href="<?=base_url('assets/plugins/custom/datatables/datatables.bundle.css') ;?>" rel="stylesheet" type="text/css" />

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
					<h2 class="d-flex align-items-center text-dark font-weight-bold my-1 mr-3">Permohonan</h2>
					<!--end::Page Title-->
					<!--begin::Breadcrumb-->
					<ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
						<li class="breadcrumb-item text-muted">
							<a href="" class="text-muted">Badan Usaha</a>
						</li>
						<li class="breadcrumb-item text-muted">
							<a href="" class="text-muted">Keuangan Pemegang Saham</a>
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
							<i class="flaticon-file-1 text-dark"></i>
						</span>
						<h3 class="card-label">Data Pemegang Saham</h3>
					</div>
					<div class="card-toolbar">
						<a data-toggle="modal" data-target="#modal_delete" id="delete_data" class="btn btn-light-danger font-weight-bolder mr-2">
						<i class="la la-trash"></i>Delete Data</a>

						<a data-toggle="modal" data-target="#modal_edit" id="edit" class="btn btn-light-dark font-weight-bolder mr-2">
						<i class="la la-edit"></i>Edit Data</a>

						<a data-toggle="modal" data-target="#modal_input" class="btn btn-dark font-weight-bolder">
						<i class="la la-plus"></i>Tambah Data</a>
					</div>
				</div>
				<div class="card-body">
					<!--begin: Datatable-->
					<table class="table table-separate table-head-custom collapsed" id="kt_datatable2">
						<thead>
							<tr>
								<th>Detail</th>
								<th>Pilih Data</th>
								<th>Nama Pemilik Saham</th>
								<th>No KTP</th>
								<th>Alamat</th>
								<th>Propinsi</th>
								<th>Kabupaten/Kota</th>
								<th>Kode Pos</th>
								<th>Jenis Saham</th>
								<th>Jumlah Saham</th>
								<th>Nilai Satuan Lembar </th>
								<th>Modal Dasar</th>

								<th>File Persyaratan Pemegang Saham</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($record as $row) :?>
							<tr>
								<td></td>
								<td>
									<div class="d-flex align-items-center mr-3" data-inbox="actions">
										<label class="checkbox checkbox-outline checkbox-outline-2x checkbox-dark mr-3">
											<input type="checkbox" name="<?= $row['id_saham'] ;?>" value="<?= $row['nama_pemilik'] ;?>"class="call-checkbox"/>
											<span></span>
										</label>

									</div>

								</td>
								<td><?= $row['nama_pemilik'] ;?></td>
								<td><?= $row['no_ktp'] ;?></td>
								<td><?= $row['alamat'] ;?></td>
								<td><?= $row['id_propinsi'] ;?></td>
								<td><?= $row['id_kabupaten'] ;?></td>
								<td><?= $row['kd_pos'] ;?></td>
								<td><?= $row['jenis_saham'] ;?></td>
								<td><?= $row['jumlah_lembar'] ;?></td>
								<td><?= $row['nilai_perlembar'] ;?></td>
								<td><?= $row['modal_dasar'] ;?></td>

								<td><a href="<?=base_url('get_file/get_bu_saham/'.$row['persyaratan']) ;?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>
							</tr>
						<?php endforeach ;?>

						</tfoot>
					</table>
					<!--end: Datatable-->
				</div>
			</div>



    </div>
  </div>

</div>
<div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeXl" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">

			<div class="modal-body">
				<div class="card card-custom gutter-b">
					<div class="card-header">
						<div class="card-title">
							<span class="card-icon">
								<i class="flaticon-file-1 text-dark"></i>
							</span>
							<h3 class="card-label"><span class="text-danger">Detele Pengurus</span></h3>
						</div>
					</div><?php echo form_open_multipart('keuangan/delete_pemegang_saham/', 'class="form-horizontal form-validate-jquery"');?>
					<div class="card-body">
						<input type="hidden" id='id_delete' name='id' class="form-control" />

						<div class="form-group row">
							<div class="col-lg-8">
									<label class="control-label">Nama Pemegang Saham <span class="text-danger">*</span></label>
									<input type="text"   id='nama_delete'  name="nama" readonly class="form-control">
							</div>

						</div>

					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" id="submit" class="btn btn-danger mr-2">Delete</button>

				<button type="button" class="btn btn-light-dark font-weight-bold" data-dismiss="modal">Close</button>
			</div>
				<?php echo form_close() ;?>
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
								<i class="flaticon-file-1 text-dark"></i>
							</span>
							<h3 class="card-label">Input Pemegang Saham</h3>
						</div>
					</div>

	        <?php echo form_open_multipart('keuangan/insert_saham/', 'class="form-horizontal form-validate-jquery" id="form-upload-1"');?>
	          <div class="card-body">

	          <div class="form-group row">
	            <div class="col-lg-12">
	                <label class="control-label">Nama Pemilik Saham <span class="text-danger">*</span></label>
									<input type="text"  id="pemilik_saham" name="pemilik_saham" required="required" class="form-control">
	            </div>

	          </div>
						<div class="form-group row">
	            <div class="col-lg-6">
	                <label class="control-label">No KTP <span class="text-danger">*</span></label>
									<input type="text"  id="ktp" name="ktp" required="required" class="form-control">

								 </div>
	            <div class="col-lg-6">
	                <label class="control-label">Alamat <span class="text-danger">*</span></label>
									<input type="text"  id="alamat" name="alamat" class="form-control">

								</div>
	          </div>
						<div class="form-group row">
	            <div class="col-lg-6">
	                <label class="control-label">Propinsi <span class="text-danger"></span></label>
									<select name="propinsi" onchange="getval(this)" id="propinsi"class="form-control" required="required">
											<option value="">Pilih Provinsi</option>
											<?php foreach ($propinsi as $row2) :?>
												<option value="<?php echo $row2['ID_Propinsi'] ;?>"> - <?php echo $row2['Nama'] ;?></option>
											<?php endforeach ;?>
									</select>
								</div>
	            <div class="col-lg-6">
	                <label class="control-label">Kabupaten/Kota <span class="text-danger">*</span></label>
									<select name="kabupaten" id="kabupaten" class="form-control" required="required">
											<option value="">Pilih Kabupaten</option>
									</select>
								</div>
	          </div>
						<div class="form-group row">
	            <div class="col-lg-6">
	                <label class="control-label">Kode Pos <span class="text-danger"></span></label>
									<input type="text" id="kode_pos" name="kodepos" class="form-control" placeholder="55555">

								</div>
	            <div class="col-lg-6">
	                <label class="control-label">Jenis Saham <span class="text-danger">*</span></label>
									<input type="text"  id="jenis_saham" name="jenis_saham" class="form-control">

								</div>
	          </div>
						<div class="form-group row">
	            <div class="col-lg-6">
	                <label class="control-label">Jumlah Saham <span class="text-danger"></span></label>
									<input type="text" id="jumlah_lembar" onchange="jumlah1()" oninput="setFormat('jumlah_lembar')" name="jumlah_lembar" class="form-control">

								</div>
	            <div class="col-lg-6">
	                <label class="control-label">Nilai Satuan Lembar <span class="text-danger">*</span></label>
									<input type="text"  id="nilai_saham" onchange="jumlah1()" oninput="setFormat('nilai_saham')" name="nilai_saham" class="form-control">

								</div>
	          </div>
						<div class="form-group row">
	            <div class="col-lg-6">
	                <label class="control-label">Total Modal Yang DItetapkan <span class="text-danger"></span></label>
									<input type="text" readonly="readonly" id="total_modal" name="total_modal" class="form-control" >

								</div>
	            <div class="col-lg-6">

								</div>
	          </div>






						<div class="form-group row">
							<div class="col-lg-6">
								<label class="control-label">Upload Persyaratan Pemegang Saham <span class="text-danger">*</span></label>
								<input class="file-1" name="upload_persyaratan" type="file" data-preview-file-type="text">
								<span class="help-block">
									Accepted formats: pdf, zip. Max file size 20Mb
								</span>
								<div class="progress" style="display:none;">
									<div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
										20%
									</div>
								</div>
							</div>
	            <div class="col-lg-6">

	            </div>
	          </div>



	          </div>




	      </div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-dark mr-2">Submit</button>

				<button type="button" class="btn btn-light-dark font-weight-bold" data-dismiss="modal">Close</button>
			</div>
			<?php echo form_close() ;?>
		</div>
	</div>
	</div>

	<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeXl" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
			<div class="modal-content">

				<div class="modal-body">
					<div class="card card-custom gutter-b">
						<div class="card-header">
							<div class="card-title">
								<span class="card-icon">
									<i class="flaticon-file-1 text-dark"></i>
								</span>
								<h3 class="card-label">Edit Pemegang Saham</h3>
							</div>
						</div>

		        <?php echo form_open_multipart('keuangan/update_saham/', 'class="form-horizontal form-validate-jquery" id="form-upload-2"');?>
		          <div class="card-body">
								<input type="hidden"  id="id_edit" name="id" required="required" class="form-control">

		          <div class="form-group row">
		            <div class="col-lg-12">
		                <label class="control-label">Nama Pemilik Saham <span class="text-danger">*</span></label>
										<input type="text"  id="pemilik_saham_edit" name="pemilik_saham" required="required" class="form-control">
		            </div>

		          </div>
							<div class="form-group row">
		            <div class="col-lg-6">
		                <label class="control-label">No KTP <span class="text-danger">*</span></label>
										<input type="text"  id="ktp_edit" name="ktp" required="required" class="form-control">

									 </div>
		            <div class="col-lg-6">
		                <label class="control-label">Alamat <span class="text-danger">*</span></label>
										<input type="text"  id="alamat_edit" name="alamat" class="form-control">

									</div>
		          </div>
							<div class="form-group row">
		            <div class="col-lg-6">
		                <label class="control-label">Propinsi <span class="text-danger"></span></label>
										<select name="propinsi" onchange="getval(this)" id="propinsi_edit"class="form-control" required="required">
												<option value="">Pilih Provinsi</option>
												<?php foreach ($propinsi as $row2) :?>
													<option value="<?php echo $row2['ID_Propinsi'] ;?>"> - <?php echo $row2['Nama'] ;?></option>
												<?php endforeach ;?>
										</select>
									</div>
		            <div class="col-lg-6">
		                <label class="control-label">Kabupaten/Kota <span class="text-danger">*</span></label>
										<select name="kabupaten"   id="kabupaten_edit" class="form-control" required="required">
												<option value="">Pilih Kabupaten</option>
												<?php foreach ($kabupaten as $row_kab) :?>
													<option value="<?php echo $row_kab['ID_Kabupaten'] ;?>"> - <?php echo $row_kab['Nama'] ;?></option>
												<?php endforeach ;?>
										</select>
									</div>
		          </div>
							<div class="form-group row">
		            <div class="col-lg-6">
		                <label class="control-label">Kode Pos <span class="text-danger"></span></label>
										<input type="text" id="kode_pos_edit" name="kodepos" class="form-control" placeholder="55555">

									</div>
		            <div class="col-lg-6">
		                <label class="control-label">Jenis Saham <span class="text-danger">*</span></label>
										<input type="text"  id="jenis_saham_edit" name="jenis_saham" class="form-control">

									</div>
		          </div>
							<div class="form-group row">
		            <div class="col-lg-6">
		                <label class="control-label">Jumlah Saham <span class="text-danger"></span></label>
										<input type="text" id="jumlah_lembar_edit" onchange="jumlah1()" oninput="setFormat('jumlah_lembar')" name="jumlah_lembar" class="form-control">

									</div>
		            <div class="col-lg-6">
		                <label class="control-label">Nilai Satuan Lembar <span class="text-danger">*</span></label>
										<input type="text"  id="nilai_saham_edit" onchange="jumlah1()" oninput="setFormat('nilai_saham')" name="nilai_saham" class="form-control">

									</div>
		          </div>







							<div class="form-group row">
								<div class="col-lg-6">
									<label class="control-label">Upload Persyaratan Pemegang Saham <span class="text-danger">*</span></label>
									<input class="file-1" name="upload_persyaratan" type="file" data-preview-file-type="text">
									<span class="help-block">
										Accepted formats: pdf, zip. Max file size 20Mb
									</span>
									<div class="progress" style="display:none;">
										<div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
											20%
										</div>
									</div>
								</div>
		            <div class="col-lg-6">

		            </div>
		          </div>



		          </div>



		      </div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-dark mr-2">Submit</button>

					<button type="button" class="btn btn-light-dark font-weight-bold" data-dismiss="modal">Close</button>
				</div>
				<?php echo form_close() ;?>
			</div>
		</div>
		</div>

		<script type="text/javascript">
		$("#delete_data").click(function () {
			var oTable = $('#kt_datatable2').dataTable();
			var rowcollection = oTable.$(".call-checkbox:checked", {"page": "all"});
			var value = [];
			var sub = [];
			var coba=[];
			var coba2=[];
			var coba3=[];
			var coba4=[];
			counterx=0;
			counter=0;
			counter1=0;
			rowcollection.each(function(index,elem){
				counterx=counterx+1;
				sub = elem.name;
				value = elem.value;
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
				if(coba3.length>0){
					if(coba3[counter1]!=value){
						counter1=counter1+1;
						coba3[counter1]=value;
						coba4[counter1]="'"+value+"'";
					}
				}else{
					coba3[counter1]=value;
					coba4[counter1]="'"+value+"'";
				}
			});
			if(counterx==0){
				toastr["warning"]("Anda belum memilih data yang ingin diedit, silahkan memilih data terlebih dahulu", "Notification");
				$("#modal_edit").modal('hide');
			}else{
				$(".modal-body #id_delete").val(coba2);
				$(".modal-body #nama_delete").val(coba4);
			}


		});

			$("#edit").click(function () {
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
					counter=counter+1;
				});
				if(counter==2){
					toastr["warning"]("Tidak dapat edit 2 data sekaligus, Mohon memilih salah satu.", "Notification");
					$("#modal_edit").modal('hide');
				}else if(counter==0){
					toastr["warning"]("Anda belum memilih data yang ingin diedit, silahkan memilih data terlebih dahulu", "Notification");
					$("#modal_edit").modal('hide');
				}else{
					$(".modal-body #id_edit").val(sub);
					$.ajax({
							url : "<?php echo base_url('keuangan/cek_saham'); ?>",
							type : "POST",
							data : {id : sub,},
							success : function(data) {

								response = jQuery.parseJSON(data);
								record=response.record;
								$("#pemilik_saham_edit").val(record[0].nama_pemilik);
								$("#ktp_edit").val(record[0].no_ktp);
								$("#alamat_edit").val(record[0].alamat);
								$("#propinsi_edit").val(record[0].id_propinsi).attr("selected","selected");
								$("#kabupaten_edit").val(record[0].id_kabupaten).attr("selected","selected");
								$("#kode_pos_edit").val(record[0].kd_pos);
								$("#jenis_saham_edit").val(record[0].jenis_saham);
								$("#jumlah_lembar_edit").val(record[0].jumlah_lembar);

								$("#nilai_saham_edit").val(record[0].nilai_perlembar);


								},
								error: function(xhr, status, error) {
									var err = eval("(" + xhr.responseText + ")");
									alert(err.Message);
								}
						});
				}


			});
		</script>
<script>

 function setFormat(id) {

 if (document.getElementById(id).value != "") {
	 document.getElementById(id).value = parseFloat(document.getElementById(id).value.replace(/\./g, ""))
		 .toString()
		 .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
	 }else{
		 document.getElementById(id).value="0";
	 }
 }

 function jumlah1(){
	 var cek11=document.querySelector('#jumlah_lembar').value;
	 if(cek11==""){cek11="0";}
	 var jumlah_lembar=cek11.replace(/\./g,'');
	 var cek21=document.querySelector('#nilai_saham').value;
	 if(cek21==""){cek21="0";}
	 var nilai_saham=cek21.replace(/\./g,'');


	 var jumlah = parseInt(jumlah_lembar,10) * parseInt(nilai_saham,10);
	 $("#total_modal").val(jumlah);
	 setFormat('total_modal');
 }
</script>
<script>

function getval(sel)
{
	document.getElementById("kabupaten").options.length = 0;

	$.ajax({
			url : "<?php echo base_url('keuangan/kabupaten'); ?>",
			type : "POST",
			data : {id_propinsi : sel.value,},
			success : function(data) {

				response = jQuery.parseJSON(data);
				csrfHash = response.csrfHash;

				console.log( JSON.parse(data) );
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


<script type="text/javascript">

	$(".file-1").fileinput({
		maxFileSize: 20000,
		allowedFileExtensions: ['jpg', 'png', 'pdf'],
		showUpload: false,
		dropZoneEnabled: false
	});
	var submitCounter = 0;
	$(function () {
		var inputFile = $('input[name=upload_persyaratan]');
		var uploadURI = $('#form-upload-1').attr('action');
		var uploadURI2 = $('#form-upload-2').attr('action');
		var progressBar = $('#progress-bar-1');

		$("form#form-upload-1").submit(function () {
			submitCounter++;
			event.preventDefault();
			var fileToUpload = inputFile[0].files[0];
										// make sure there is file to upload

										if (fileToUpload != 'undefined') {
										if (submitCounter < 2) {
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
															window.location.replace("<?php echo base_url('keuangan/pemegang_saham');?>");
														}
														else {
															window.location.replace("<?php echo base_url('keuangan/pemegang_saham');?>");

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
											toastr["warning"]("Submit button can be clicked only once.", "Notification");


									}
										}

								});
								$("form#form-upload-2").submit(function () {
									submitCounter++;
									event.preventDefault();
									var fileToUpload = inputFile[0].files[0];
																// make sure there is file to upload


																if (submitCounter < 2) {
																		// provide the form data
																		// that would be sent to sever through ajax
																		var formData = new FormData($(this)[0]);
																		// now upload the file using $.ajax
																		$.ajax({
																			url: uploadURI2,
																			type: 'post',
																			data: formData,
																			processData: false,
																			contentType: false,
																			success: function (data) {
																				if (data.result == '1') {
																					window.location.replace("<?php echo base_url('keuangan/pemegang_saham');?>");
																				}
																				else {
																					window.location.replace("<?php echo base_url('keuangan/pemegang_saham');?>");

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
																	toastr["warning"]("Submit button can be clicked only once.", "Notification");


															}

														});
		$('body').on('change.bs.fileinput', function (e) {
			$('.progress').hide();
			progressBar.text("0%");
			progressBar.css({width: "0%"});
		});
	});


</script>
