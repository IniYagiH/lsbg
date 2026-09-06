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
      <div class="d-flex align-items-center flex-wrap mr-1">
        <!--begin::Heading-->
        <div class="d-flex flex-column">
          <!--begin::Title-->
          <h2 class="text-white font-weight-bold my-2 mr-5">Neraca</h2>
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
            <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Neraca</a>
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
						<h3 class="card-label">Data Keuangan Neraca</h3>
					</div>
					<div class="card-toolbar">
						<a data-toggle="modal" data-target="#modal_delete" id="delete_data" class="btn btn-light-danger font-weight-bolder mr-2">
						<i class="la la-trash"></i>Delete Data</a>

						<a data-toggle="modal" data-target="#modal_edit" id="edit" class="btn btn-light-primary font-weight-bolder mr-2">
						<i class="la la-edit"></i>Edit Data</a>

						<a data-toggle="modal" data-target="#modal_input" class="btn btn-primary font-weight-bolder">
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
								<th>Tahun</th>
								<th>Opini KAP</th>
								<th>Aktiva Lancar</th>
								<th>Aktiva Tetap</th>
								<th>Kewajiban lancar</th>
								<th>Kewajiban tidak lancar</th>
								<th>Ekuitas</th>
								<th>Modal Dasar Badan Usaha</th>
								<th>Modal Disetor Badan Usaha</th>
								<th>Laporan Arus Kas</th>
								<th>Laporan Laba Rugi</th>
								<th>Laporan Perubahan Ekuitas</th>
								<th>Catatan Atas Laporan Keuangan</th>
								<th>File Laporan Badan Usaha 2 tahun terakhir (Audit KAP)</th>

							</tr>
						</thead>
						<tbody>
							<?php foreach($record as $row) :?>
							<tr>
								<td></td>
								<td>
									<div class="d-flex align-items-center mr-3" data-inbox="actions">
										<label class="checkbox checkbox-outline checkbox-outline-2x checkbox-primary mr-3">
											<input type="checkbox" name="<?= $row['Tahun'] ;?>" class="call-checkbox"/>
											<span></span>
										</label>

									</div>

								</td>
								<td><?= $row['Tahun'] ;?></td>
								<td><?= $row['opini_kap'] ;?></td>
								<td><?= $row['aktiva_lancar'] ;?></td>
								<td><?= $row['aktiva_tetap'] ;?></td>
								<td><?= $row['kewajiban_lancar'] ;?></td>
								<td><?= $row['kewajiban_tidak_lancar'] ;?></td>

								<td><?= $row['ekuitas'] ;?></td>
								<td><?= $row['modal_dasar'] ;?></td>
								<td><?= $row['modal_disetor'] ;?></td>
								<td><?= $row['laporan_arus_kas'] ;?></td>
								<td><?= $row['laporan_labar_rugi'] ;?></td>
								<td><?= $row['laporan_perubahan_ekuitas'] ;?></td>
								<td><?= $row['catatan_laporan_keuangan'] ;?></td>
								<td><a href="<?=base_url('get_file/get_bu_neraca_ski/'.$row['persyaratan']) ;?>" target="_blank" class="btn btn-outline-success btn-sm mr-3"><i class="flaticon-doc"></i>Lihat File</a></td>


							</tr>
						<?php endforeach ;?>

						</tfoot>
					</table>
					<!--end: Datatable-->
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
									<i class="flaticon-file-1 text-primary"></i>
								</span>
								<h3 class="card-label"><span class="text-danger">Detele Neraca</span></h3>
							</div>
						</div><?php echo form_open_multipart('keuangan/delete_neraca/', 'class="form-horizontal form-validate-jquery"');?>
						<div class="card-body">
							<input type="hidden" id='id_delete' name='id' class="form-control" />

							<div class="form-group row">
								<div class="col-lg-8">
										<label class="control-label">Tahun <span class="text-danger">*</span></label>
										<input type="text"   id='nama_delete'  name="nama" readonly class="form-control">
								</div>

							</div>

						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" id="submit" class="btn btn-danger mr-2">Delete</button>

					<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
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
		              <i class="flaticon-file-1 text-primary"></i>
		            </span>
		            <h3 class="card-label">Input Neraca</h3>
		          </div>
		        </div>

		        <?php echo form_open_multipart('keuangan/insert_neraca_ski/', 'class="form-horizontal form-validate-jquery" id="form-upload-1"');?>

							<div class="card-body">
								<div class="form-group row">
									<div class="col-lg-12">
											<label class="control-label">Tahun <span class="text-danger"></span></label>
											<input type="text" id="tahun"  name="tahun" required="required" class="form-control">

										</div>

								</div>
								<div class="card card-custom">

									<div class="card-body">
										<div class="form-group row">
					            <div class="col-lg-6">
					                <label class="control-label">Opini KAP <span class="text-danger"></span></label>
													<input type="text" id="opini_kap"  name="opini_kap" oninput="setFormat('opini_kap')" value="0" required="required" class="form-control">

												</div>
					            <div class="col-lg-6">
												<label class="control-label">Ekuitas <span class="text-danger"></span></label>
												<input type="text" id="ekuitas"  name="ekuitas" oninput="setFormat('ekuitas')" value="0" required="required" class="form-control">

												</div>
					          </div>
										<div class="form-group row">
					            <div class="col-lg-6">
												<label class="control-label">Aktiva Lancar <span class="text-danger">*</span></label>
												<input type="text"  id="aktiva_lancar"  oninput="setFormat('aktiva_lancar')" value="0" name="aktiva_lancar" class="form-control">

												</div>
					            <div class="col-lg-6">
												<label class="control-label">Aktiva Tetap <span class="text-danger">*</span></label>
												<input type="text"  id="aktiva_tetap"  oninput="setFormat('aktiva_tetap')" value="0" name="aktiva_tetap" class="form-control">

												</div>
					          </div>
										<div class="form-group row">
					            <div class="col-lg-6">
					                <label class="control-label">Kewajiban lancar <span class="text-danger"></span></label>
													<input type="text" id="kewajiban_lancar" oninput="setFormat('kewajiban_lancar')" value="0" name="kewajiban_lancar" required="required" class="form-control">

												</div>
					            <div class="col-lg-6">
					                <label class="control-label">Kewajiban tidak lancar <span class="text-danger">*</span></label>
													<input type="text"  id="kewajiban_tdk_lancar" oninput="setFormat('kewajiban_tdk_lancar')" value="0" name="kewajiban_tdk_lancar" class="form-control">

												</div>
					          </div>
										<div class="form-group row">
					            <div class="col-lg-6">
					                <label class="control-label">Modal Dasar Badan Usaha <span class="text-danger"></span></label>
													<input type="text" id="modal_dasar" oninput="setFormat('modal_dasar')" value="0" name="modal_dasar" required="required" class="form-control">

												</div>
					            <div class="col-lg-6">
					                <label class="control-label">Modal Disetor Badan Usaha <span class="text-danger">*</span></label>
													<input type="text"  id="modal_disetor" oninput="setFormat('modal_disetor')" value="0" name="modal_disetor" class="form-control">

												</div>
					          </div>
										<div class="form-group row">
					            <div class="col-lg-6">
					                <label class="control-label">Laporan Arus Kas <span class="text-danger"></span></label>
													<input type="text" id="laporan_arus_kas" oninput="setFormat('laporan_arus_kas')" value="0" name="laporan_arus_kas" required="required" class="form-control">

												</div>
					            <div class="col-lg-6">
					                <label class="control-label">Laporan Laba Rugi <span class="text-danger">*</span></label>
													<input type="text" id="laporan_laba_rugi" oninput="setFormat('laporan_laba_rugi')" value="0" name="laporan_laba_rugi" class="form-control">

												</div>
					          </div>
										<div class="form-group row">
					            <div class="col-lg-6">
					                <label class="control-label">Laporan Perubahan Ekuitas <span class="text-danger"></span></label>
													<input type="text" id="laporan_perubahan_ekuitas" oninput="setFormat('laporan_perubahan_ekuitas')" name="laporan_perubahan_ekuitas" value="0" required="required" class="form-control">

												</div>
					            <div class="col-lg-6">
					                <label class="control-label">Catatan Atas Laporan Keuangan <span class="text-danger">*</span></label>
													<input type="text" id="catatan_atas_laporan_keuangan" oninput="setFormat('catatan_atas_laporan_keuangan')" name="catatan_atas_laporan_keuangan" value="0" class="form-control">

												</div>
					          </div>



									</div>
								</div>

							<div class="form-group row">
								<div class="col-lg-6">
									<label class="control-label">Upload Laporan Badan Usaha 2 tahun terakhir (Audit KAP) <span class="text-danger">*</span></label>
									<input class="file-kap" name="file_kap" type="file" data-preview-file-type="text">
									<span class="help-block">
										Accepted formats: pdf, zip. Max file size 20Mb
									</span>
									<div class="progress" style="display:none;">
										<div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
											20%
										</div>
									</div>
								</div>

		          </div>



		          </div>


		      </div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary mr-2">Submit</button>

					<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
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
									<i class="flaticon-file-1 text-primary"></i>
								</span>
								<h3 class="card-label">Input Neraca</h3>
							</div>
						</div>

						<?php echo form_open_multipart('keuangan/update_neraca_ski/', 'class="form-horizontal form-validate-jquery" id="form-upload-2"');?>
						<input type="hidden" id="id_edit"  name="id" required="required" class="form-control">

							<div class="card-body">
								<div class="form-group row">
									<div class="col-lg-12">
											<label class="control-label">Tahun <span class="text-danger"></span></label>
											<input type="text" id="tahun_edit"  name="tahun" required="required" class="form-control">

										</div>

								</div>
								<div class="card card-custom">

									<div class="card-body">
										<div class="form-group row">
											<div class="col-lg-6">
													<label class="control-label">Opini KAP <span class="text-danger"></span></label>
													<input type="text" id="opini_kap_edit"  name="opini_kap" oninput="setFormat('opini_kap')" value="0" required="required" class="form-control">

												</div>
											<div class="col-lg-6">
												<label class="control-label">Ekuitas <span class="text-danger"></span></label>
												<input type="text" id="ekuitas_edit"  name="ekuitas" oninput="setFormat('ekuitas')" value="0" required="required" class="form-control">

												</div>
										</div>
										<div class="form-group row">
											<div class="col-lg-6">
												<label class="control-label">Aktiva Lancar <span class="text-danger">*</span></label>
												<input type="text"  id="aktiva_lancar_edit"  oninput="setFormat('aktiva_lancar')" value="0" name="aktiva_lancar" class="form-control">

												</div>
											<div class="col-lg-6">
												<label class="control-label">Aktiva Tetap <span class="text-danger">*</span></label>
												<input type="text"  id="aktiva_tetap_edit"  oninput="setFormat('aktiva_tetap')" value="0" name="aktiva_tetap" class="form-control">

												</div>
										</div>
										<div class="form-group row">
											<div class="col-lg-6">
													<label class="control-label">Kewajiban lancar <span class="text-danger"></span></label>
													<input type="text" id="kewajiban_lancar_edit" oninput="setFormat('kewajiban_lancar')" value="0" name="kewajiban_lancar" required="required" class="form-control">

												</div>
											<div class="col-lg-6">
													<label class="control-label">Kewajiban tidak lancar <span class="text-danger">*</span></label>
													<input type="text"  id="kewajiban_tdk_lancar_edit" oninput="setFormat('kewajiban_tdk_lancar')" value="0" name="kewajiban_tdk_lancar" class="form-control">

												</div>
										</div>
										<div class="form-group row">
											<div class="col-lg-6">
													<label class="control-label">Modal Dasar Badan Usaha <span class="text-danger"></span></label>
													<input type="text" id="modal_dasar_edit" oninput="setFormat('modal_dasar')" value="0" name="modal_dasar" required="required" class="form-control">

												</div>
											<div class="col-lg-6">
													<label class="control-label">Modal Disetor Badan Usaha <span class="text-danger">*</span></label>
													<input type="text"  id="modal_disetor" oninput="setFormat('modal_disetor')" value="0" name="modal_disetor" class="form-control">

												</div>
										</div>
										<div class="form-group row">
											<div class="col-lg-6">
													<label class="control-label">Laporan Arus Kas <span class="text-danger"></span></label>
													<input type="text" id="laporan_arus_kas_edit" oninput="setFormat('laporan_arus_kas')" value="0" name="laporan_arus_kas" required="required" class="form-control">

												</div>
											<div class="col-lg-6">
													<label class="control-label">Laporan Laba Rugi <span class="text-danger">*</span></label>
													<input type="text" id="laporan_laba_rugi_edit" oninput="setFormat('laporan_laba_rugi')" value="0" name="laporan_laba_rugi" class="form-control">

												</div>
										</div>
										<div class="form-group row">
											<div class="col-lg-6">
													<label class="control-label">Laporan Perubahan Ekuitas <span class="text-danger"></span></label>
													<input type="text" id="laporan_perubahan_ekuitas_edit" oninput="setFormat('laporan_perubahan_ekuitas')" name="laporan_perubahan_ekuitas" value="0" required="required" class="form-control">

												</div>
											<div class="col-lg-6">
													<label class="control-label">Catatan Atas Laporan Keuangan <span class="text-danger">*</span></label>
													<input type="text" id="catatan_atas_laporan_keuangan_edit" oninput="setFormat('catatan_atas_laporan_keuangan')" name="catatan_atas_laporan_keuangan" value="0" class="form-control">

												</div>
										</div>



									</div>
								</div>

							<div class="form-group row">
								<div class="col-lg-6">
									<label class="control-label">Upload Laporan Badan Usaha 2 tahun terakhir (Audit KAP) <span class="text-danger">*</span></label>
									<input class="file-kap" name="file_kap" type="file" data-preview-file-type="text">
									<span class="help-block">
										Accepted formats: pdf, zip. Max file size 20Mb
									</span>
									<div class="progress" style="display:none;">
										<div id="progress-bar-1" class="progress-bar progress-bar-success progress-bar-striped active " role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 30%;">
											20%
										</div>
									</div>
								</div>

							</div>



							</div>


					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary mr-2">Submit</button>

					<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
				</div>
					<?php echo form_close() ;?>
			</div>
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
		$(".modal-body #nama_delete").val(coba2);
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
					url : "<?php echo base_url('keuangan/cek_neraca_ski'); ?>",
					type : "POST",
					data : {id : sub,},
					success : function(data) {

						response = jQuery.parseJSON(data);
						record=response.record;
						$("#id_edit").val(record[0].Tahun);
						$("#tahun_edit").val(record[0].Tahun);
						$("#opini_kap_edit").val(record[0].opini_kap);
						$("#ekuitas_edit").val(record[0].aktiva_lancar);
						$("#aktiva_lancar_edit").val(record[0].aktiva_tetap);
						$("#aktiva_tetap_edit").val(record[0].kewajiban_lancar);
						$("#kewajiban_lancar_edit").val(record[0].kewajiban_tidak_lancar);
						$("#kewajiban_tdk_lancar_edit").val(record[0].ekuitas);
						$("#modal_dasar_edit").val(record[0].modal_dasar);

						$("#modal_disetor").val(record[0].modal_disetor);
						$("#laporan_arus_kas_edit").val(record[0].laporan_arus_kas);
						$("#laporan_laba_rugi_edit").val(record[0].laporan_labar_rugi);
						$("#laporan_perubahan_ekuitas_edit").val(record[0].laporan_perubahan_ekuitas);
						$("#catatan_atas_laporan_keuangan_edit").val(record[0].catatan_laporan_keuangan);





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
</script>



<script type="text/javascript">

	$(".file-kap").fileinput({
		maxFileSize: 20000,
		allowedFileExtensions: ['jpg', 'png', 'pdf'],
		showUpload: false,
		dropZoneEnabled: false
	});

	var submitCounter = 0;
	$(function () {
		var inputFile = $('input[name=file_kap]');
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
															window.location.replace("<?php echo base_url('keuangan/neraca_ski');?>");
														}
														else {
															window.location.replace("<?php echo base_url('keuangan/neraca_ski');?>");

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

																if (fileToUpload != 'undefined') {
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
																					window.location.replace("<?php echo base_url('keuangan/neraca_ski');?>");
																				}
																				else {
																					window.location.replace("<?php echo base_url('keuangan/neraca_ski');?>");

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
		$('body').on('change.bs.fileinput', function (e) {
			$('.progress').hide();
			progressBar.text("0%");
			progressBar.css({width: "0%"});
		});
	});


</script>
