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
          <h2 class="text-white font-weight-bold my-2 mr-5">Sertifikasi</h2>
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
            <a href="" class="text-white text-hover-white opacity-75 hover-opacity-100">Persetujuan Pusat</a>
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
  <div class="card card-custom gutter-b">
    <div class="card-header flex-wrap py-3">
      <div class="card-title">
        <h3 class="card-label">Operasional
        <span class="d-block text-muted pt-2 font-size-sm">Data di server operasional</span></h3>

      </div>


    </div>

    <div class="card-body">
      <button id="get_value_download" disabled class="btn btn-success font-weight-bold btn-pill" data-toggle="modal" data-target="#modal_download" style="float: right"><i class="flaticon2-arrow-down"></i>Download</button>

      <!--begin: Datatable-->
      <table class="table table-bordered table-checkable" id="kt_datatable_costume">
        <thead>
          <tr>
            <th id="all">#</th>
            <th>NPWP</th>
            <th>TANGGAL PERMOHONAN</th>
            <th>NAMA</th>
            <th>ID BU</th>
            <th> </th>

          </tr>
        </thead>
        <tbody>
          <?php if(!empty($record)): ?>
           <?php foreach ($record as $row ): ?>
           <tr>
             <td class="server-opr"><input type="radio" name="stacked-radio-left" class="styled" id="<?php echo $row['Tgl_permohonan'] ;?>" value="<?php echo $row['id_bu'] ;?>"></td>
             <td><?php echo $row['NPWP'] ;?></td>
             <td><?php echo $row['Tgl_permohonan'];?></td>
             <td><?php echo $row['Nama'] ;?></td>
             <td><?php echo $row['id_bu'] ;?></td>
             <td></td>


           </tr>
           <?php endforeach ;?>
           <?php endif ;?>


        </tbody>
      </table>
      <!--end: Datatable-->
    </div>
  </div>
</div>
</div>

<br>




</div>
<div class="modal fade" id="modal_download" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeLg" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Download Pengalaman</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<i aria-hidden="true" class="ki ki-close"></i>
				</button>
			</div>
			<div class="modal-body">
        <?php echo form_open_multipart(base_url('sertifikasi/persetujuan_pusat'), 'method="POST"');?>
        <h6 class="text-semibold"><i class="icon-library2 position-left" ></i> Tanggal Permohonan</h6>
        <div class="input-group">
          <span class="input-group-addon bg-primary"><i class="icon-lock2"></i></span>
          <input type="text"  class="form-control" id="tanggal_permohonan" name="tgl_permohonan" readonly>

          <span class="input-group-addon bg-primary"><i class="icon-library2"></i></span>
        </div>
        <h6 class="text-semibold"><i class="icon-library2 position-left" ></i> ID BU</h6>
        <div class="input-group">
          <span class="input-group-addon bg-primary"><i class="icon-lock2"></i></span>
          <input type="text"  class="form-control" id="id_bu" name="id_bu" readonly>

          <span class="input-group-addon bg-primary"><i class="icon-library2"></i></span>
        </div>

        <h6 class="text-semibold"><i class="icon-library2 position-left" ></i> ID Sub Klasifikasi</h6>
        <div class="input-group">
          <span class="input-group-addon bg-primary"><i class="icon-lock2"></i></span>
          <input type="text"  class="form-control" id="id_sub_klas" name="id_sub_klas" readonly>

          <span class="input-group-addon bg-primary"><i class="icon-library2"></i></span>
        </div>
			</div>
			<div class="modal-footer">
        <button type="submit" name="btn_upload"  class="btn btn-primary btn-labeled btn-rounded  btn-loading" data-loading-text="<i class='icon-spinner4 spinner'></i> <span>Sumbited</span>"><b><i class="flaticon-paper-plane"></i></b> Submit</button>

				<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
			</div>
        <?php echo form_close() ;?>
		</div>
	</div>
</div>

<script type="text/javascript">
  $(document).on("click", ".server-opr", function () {
    var download= document.querySelector('#get_value_download');
    download.removeAttribute('disabled');
  });

</script>

<script type="text/javascript">


	$("#get_value_download").click(function () {

		var oTable = $('#kt_datatable_costume').dataTable();
		var rowcollection = oTable.$(".styled:checked", {"page": "all"});
		var tgl_permohonan = [];
		var id_bu = [];

		rowcollection.each(function(index,elem){
			tgl_permohonan=elem.id;
			id_bu = elem.value;

		});
		$(".modal-body #tanggal_permohonan").val(tgl_permohonan);
		$(".modal-body #id_bu").val(id_bu);

		$.ajax({
          url : "<?php echo base_url('sertifikasi/sub_klas'); ?>",
          type : "POST",
          data : {id_bu_value : id_bu,
          tgl_permohonan_value : tgl_permohonan},
          success : function(data) {
            response = jQuery.parseJSON(data);
            id_status=response.id_record;
            var value = [];
            var sub = [];
            var coba=[];
            var coba2=[];
            counter=0;
            $.each(id_status, function(i, option) {

              sub = option.id_sub_klasifikasi_kbli;
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
            $(".modal-body #id_sub_klas").val(coba2);



            console.log( JSON.parse(data) );
          },
          error: function(xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            alert(err.Message);
          }
      });

	});
</script>
<script type="text/javascript">


	$("#all").click(function () {

      $(".server-operational .call-checkbox").attr("checked", "true");
      var download= document.querySelector('#get_value_download');
      download.removeAttribute('disabled');


	});

</script>
