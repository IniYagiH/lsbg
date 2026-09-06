<?php
echo script_tag('assets/js/plugins/notifications/pnotify.min.js');
echo script_tag('assets/js/plugins/buttons/spin.min.js');
echo script_tag('assets/js/plugins/tables/datatables/datatables.min.js');
echo script_tag('assets/js/plugins/forms/selects/select2.min.js');
echo script_tag('assets/js/plugins/forms/validation/validate.min.js');
echo script_tag('assets/js/pages/form_validation.js');
echo script_tag('assets/js/plugins/forms/selects/bootstrap_multiselect.js');
echo script_tag('assets/js/plugins/forms/inputs/touchspin.min.js');
echo script_tag('assets/js/plugins/forms/styling/switch.min.js');
echo script_tag('assets/js/plugins/forms/styling/switchery.min.js');
echo script_tag('assets/js/plugins/forms/styling/uniform.min.js');
echo script_tag('assets/js/plugins/buttons/ladda.min.js');
echo script_tag('assets/js/plugins/tables/datatables/extensions/select.min.js');
echo script_tag('assets/js/plugins/tables/datatables/extensions/buttons.min.js');
echo script_tag('assets/js/pages/datatables_extension_select.js');
echo script_tag('assets/js/pages/components_buttons.js');
echo script_tag('assets/js/pages/components_notifications_pnotify.js');
echo script_tag('assets/js/plugins/forms/inputs/formatter.min.js');
echo script_tag('js/pages/components_popups.js');
echo script_tag('fileinput.js');
?>
<style>
.checkbox-switchery .switchery{
position:relative;
float:right;
left:5px;
}
.checkbox-switchery label, label.checkbox-switchery{
margin-left: 323px;

}
</style>
<script type="text/javascript">
$(document).ready(function(){
  jQuery.event.special.touchstart = {
    setup: function( _, ns, handle ){
      if ( ns.includes("noPreventDefault") ) {
        this.addEventListener("touchstart", handle, { passive: false });
      } else {
        this.addEventListener("touchstart", handle, { passive: true });
      }
    }
  };

});
</script>
<!-- Page header -->
<div class="page-header">
  <div class="page-header-content">
    <div class="page-title">
      <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Badan Usaha</h4>
      <ul class="breadcrumb breadcrumb-caret position-right">
        <li><a href="<?php echo base_url('Badan_usaha/') ;?>">Badan Usaha</a></li>
        <li class="active">Upload Pengalaman</li>


      </ul>

    </div>

    <div class="heading-elements">
      <div class="heading-btn-group">
        <!-- Disini Sisi kirinya -->
      </div>
    </div>
  </div>
</div>
<!-- /page header -->
<!-- Page container -->
<div class="page-container">

  <!-- Page content -->
  <div class="page-content">

    <!-- Main content -->
    <div class="content-wrapper">



      <!-- Form validation -->

        <div class="row">
          <div class="col-md-12">
            <!-- Server OPR -->
            <div class="panel panel-flat">
              <div class="panel-heading">
                <h5 class="panel-title">Verifikasi Validasi User</h5>
                <button id="get_value_download" type="button"  name="btn_download" disabled="TRUE" data-toggle="modal" data-target="#modal_upload" style="float: right"  class="btn btn-primary btn-labeled btn-rounded"><b><i class="icon-cloud-download2" ></i></b> Process</button>

              </div>
              <table id="example" class="table datatable-select-basic">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama LSBU</th>
                    <th>Nama Asosiasi</th>
                    <th>Email</th>
                    <th>Hp</th>
                    <th>NIB</th>
                    <th>NIK</th>
                    <th>Persyaratan NIB</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(!empty($record)):?>
      							<?php foreach($record as $row) :?>
                  <tr>

                    <td class="server-operational"><input type="radio" name="<?php echo($row['Email']) ;?>"  class="call-checkbox" value="" /></td>
                    <td><?php echo($row['Nama']) ;?></td>
                    <td><?php echo($row['nama_asosiasi']) ;?></td>
                    <td><?php echo($row['Email']) ;?></td>
                    <td><?php echo($row['Hp']) ;?></td>
                    <td><?php echo($row['NIB']) ;?></td>
                    <td><?php echo($row['NIK']) ;?></td>
                    <td><a href="<?php echo base_url('assets/bukti/registrasi/nib/').$row['Persyaratan_nib'] ;?>" target="_blank" type="button" name="btn_cek_13"  style="float: right" class="open-delete btn btn-primary btn-labeled btn-rounded" ><b><i class="icon-file-check" ></i></b> Softcopy</a></td>


                  </tr>
                <?php endforeach; ?>
              <?php endif ;?>
                </tbody>
              </table>
            </div>
          </div>
        </div>




        <!--Modal Upload-->
        <div id="modal_upload" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h5 class="modal-title"><i class="icon-menu7"></i> &nbsp;VV User<span class="label label-primary"></span></h5>
              </div>
              <div class="modal-body">

                <?php echo form_open_multipart(base_url('dashboard_sekretariat/insert_user'), 'method="POST"');?>
                <h6 class="text-semibold"><i class="icon-library2 position-left" ></i> Email</h6>
                <div class="input-group">
                  <span class="input-group-addon bg-primary"><i class="icon-lock2"></i></span>
                  <input type="text"  class="form-control" id="email" name="email" readonly>
                  <span class="input-group-addon bg-primary"><i class="icon-library2"></i></span>
                </div>

              </div>
              <div class="modal-footer">
                <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross"></i> Close</button>

                <button type="submit" name="btn_upload" class="btn btn-success btn-labeled btn-rounded  btn-loading" data-loading-text="<i class='icon-spinner4 spinner'></i> <span>Sending...</span>"><b><i class="icon-cloud-upload2"></i></b> Send Email</button>
                <?php echo form_close() ;?>
              </div>
            </div>
          </div>
        </div>
        <!--/Modal Upload-->

    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).on("click", ".server-operational", function () {
    var download= document.querySelector('#get_value_download');
    download.removeAttribute('disabled');
  });
</script>


<script type="text/javascript">
	var tbl;
	$(document).ready(function (){
		tbl = $('#example').DataTable({
			retrieve: true,
			paging: false
		});
	});

	$("#get_value_download").click(function () {
    var oTable = $('#example').dataTable();
		var rowcollection = oTable.$(".call-checkbox:checked", {"page": "all"});
		var value = [];
		var sub = [];
    var coba=[];
    var coba2=[];
    counter=0;
		rowcollection.each(function(index,elem){
			value.push($(elem).val());

			sub = elem.name;
      console.log(sub);

		});
    $(".modal-body #email").val(sub);



	});
</script>
