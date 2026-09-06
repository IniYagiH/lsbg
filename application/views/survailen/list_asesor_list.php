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
              <a href="" class="text-muted">Admin</a>
            </li>
            <li class="breadcrumb-item text-muted">
              <a href="" class="text-muted">Evaluator Permohonan</a>
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
            <h3 class="card-label">Evaluator Survailen
              <span class="d-block text-muted pt-2 font-size-sm">Daftar Keseluruhan Permohonan Untuk Dilakukan Evaluasi Survailen
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
          <a data-toggle="modal" id="penunjukan" data-target="#modal_input"
              class="btn btn-light-dark font-weight-bolder">
              <i class="la la-map-pin"></i>Tunjuk Asesor</a>
          
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
                <th>Nama Badan Usaha</th>
                <th>NIB</th>
                <th>ID Izin</th>
                <th>Sub Klasifikasi</th>
                <th>Kualifikasi</th>
                <th>Tgl Permohonan</th>
          
                <th>Tgl Terbit</th>
                <th>FILE PEMBAYARAN</th>
                <th>FILE TINJAUAN</th>
                <th>FILE ASESOR</th>
              </tr>
            </thead>

            <tbody>
              <?php if(!empty($record)) :?>
              <?php foreach($record as $row) :?>
              <tr>
                <td></td>
                <td>
                  <?php if($row['stat']=='1') :?>
                    <a href="" data-todo='{"id":<?=$row['NIB'];?>,"tgl_permohonan":"<?=$row['tgl_permohonan'];?>"}' data-toggle="modal" class="open-revisi" data-target="#modal_revisi"></i><span class="text-danger"><?=$row['nama'];?></a>
                  <?php elseif($row['stat']=='2') :?>
                    <a href="" data-todo='{"id":<?=$row['NIB'];?>,"tgl_permohonan":"<?=$row['tgl_permohonan'];?>"}' data-toggle="modal" class="open-revisi" data-target="#modal_revisi"></i><span class="text-success"><?=$row['nama'];?></a>
                  <?php else :?>
                    <?=$row['nama'];?>
                  <?php endif ;?>
                </td>
                <td><?=$row['NIB'];?></td>
                <td><?=$row['id_izin'];?></td>
                <td><?=$row['concat_sub'];?></td>
                <td><?=$row['concat_kualifikasi'];?></td>
                
                <td><?=$row['tgl_permohonan'];?></td>
               

            
                <td><?=$row['status_2'];?></td>
                <td><?=base_url('get_file/get_bu_49/'.$row['file_pembayaran'])?></td>

                <td><?=base_url('inbox/dokumen_tinjauan/'.encrypt_url($row['NIB']).'/'.encrypt_url($row['tgl_permohonan']))?></td>
                <td><?=base_url('inbox/dokumen_penilaian/'.encrypt_url($row['NIB']).'/'.encrypt_url($row['tgl_permohonan']))?></td>

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
<div class="modal fade" id="modal_input" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeXl"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <div class="card card-custom gutter-b">
          <div class="card-header">
            <div class="card-title">
              <span class="card-icon">
                <i class="flaticon-file-1 text-danger"></i>
              </span>
              <h3 class="card-label">Penjukan Asesor</h3>

            </div>
          </div>
          <div class="card-body">


            <div class="form-group row">
              <div class="col-lg-12">
                <label class="control-label">NIB <span class="text-danger"></span></label>
                <input type="text" id="nib" name="nib" readonly class="form-control">
              </div>

            </div>
            <div class="form-group row">
              <!-- <div class="col-lg-6">
                <label class="control-label">Pilih Kualifikasi <span class="text-danger"></span></label>
                <select id="kualifikasi" onchange="getval(this)" class="form-control" required="required">
                  <option value="">Pilih Kualifikasi</option>

                </select>
              </div> -->
              <div class="col-lg-6">
                <label class="control-label"> Petunjuk Penunjukan Asesor : </label>
                <span class="text-danger">"Asesor 1 harus Asesor LSBU, Asesor 2 & 3 Bisa ditunjuk Asesor LSBU Atau
                  Verifikator LSBU"</span>
              </div>

            </div>

            <div class="table-responsive">
              <table class="table table-lg">
                <thead>
                  <tr>
                    <th>Data</th>
                    <th>Nama Asesor</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Asesor 1</td>
                    <td>

                      <div class="form-group">

                        <div class="input-group file-caption-main">
                          <span class="file-caption-icon"></span>
                          <input type="text" id="asesor1" name="asesor1" class="form-control">
                          <div id="style1" style='display:none;'>
                            <select id="asesor11" class="form-control">
                            </select>
                          </div>
                          <div id="style11" style='display:'';'>
                            <div class="form-control-feedback">
                              <i class="icon-search4 text-muted text-size-base"></i>
                            </div>
                          </div>
                          <div class="input-group-btn input-group-append">
                            <button type="submit" id="get_value" class="btn btn-danger btn-file"><i
                                class="glyphicon glyphicon-folder-open"></i>&nbsp; <span class="hidden-xs">Searching
                              </span></button>
                            <button type="submit" id="get_value2" style='display:none;'
                              class="btn btn-warning btn-file"><i class="glyphicon glyphicon-folder-open"></i>&nbsp;
                              <span class="hidden-xs">Back </span></button>



                          </div>
                        </div>

                      </div>
                    </td>

                  </tr>
                  <tr>
                    <td>Asesor 2</td>
                    <td>


                      <div class="form-group">

                        <div class="input-group file-caption-main">
                          <span class="file-caption-icon"></span>
                          <input type="text" id="asesor2" name="asesor1" class="form-control">
                          <div id="style2" style='display:none;'>
                            <select id="asesor22" class="form-control">
                            </select>
                          </div>
                          <div id="style22" style='display:'';'>
                            <div class="form-control-feedback">
                              <i class="icon-search4 text-muted text-size-base"></i>
                            </div>
                          </div>
                          <div class="input-group-btn input-group-append">
                            <button type="submit" id="get_values" class="btn btn-danger btn-file"><i
                                class="glyphicon glyphicon-folder-open"></i>&nbsp; <span class="hidden-xs">Searching
                              </span></button>
                            <button type="submit" id="get_values2" style='display:none;'
                              class="btn btn-warning btn-file"><i class="glyphicon glyphicon-folder-open"></i>&nbsp;
                              <span class="hidden-xs">Back </span></button>



                          </div>
                        </div>

                      </div>

                    </td>
                  <tr>
                    <td>Asesor 3</td>
                    <td>


                      <div class="form-group">

                        <div class="input-group file-caption-main">
                          <span class="file-caption-icon"></span>
                          <input type="text" id="asesor3" name="asesor3" class="form-control">
                          <div id="style3" style='display:none;'>
                            <select id="asesor33" class="form-control">
                            </select>
                          </div>
                          <div id="style33" style='display:'';'>
                            <div class="form-control-feedback">
                              <i class="icon-search4 text-muted text-size-base"></i>
                            </div>
                          </div>
                          <div class="input-group-btn input-group-append">
                            <button type="submit" id="get_valuesx" class="btn btn-danger btn-file"><i
                                class="glyphicon glyphicon-folder-open"></i>&nbsp; <span class="hidden-xs">Searching
                              </span></button>
                            <button type="submit" id="get_values3" style='display:none;'
                              class="btn btn-warning btn-file"><i class="glyphicon glyphicon-folder-open"></i>&nbsp;
                              <span class="hidden-xs">Back </span></button>



                          </div>
                        </div>

                      </div>

                    </td>
                  </tr>




                </tbody>
              </table>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" style='display:none;' class="btn btn-dark btn-ladda btn-ladda-spinner" id="send"
              data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Kirim Email Surat
                Tugas</span></button>

            <!-- <button type="button" class="btn btn-danger btn-ladda btn-ladda-spinner" id="delete" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Delete Asesor 1</span></button>
            <button type="button" class="btn btn-danger btn-ladda btn-ladda-spinner" id="delete2" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Delete Asesor 2</span></button>
            <button type="button" class="btn btn-danger btn-ladda btn-ladda-spinner" id="delete3" data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Delete Asesor 3</span></button> -->
                  <div id="surat_tugas">

                  </div>
            <!-- <a href="<?php echo base_url('survailen/surat_tugas_tinjauan/'); ?>" target="_blank" type="button"
              name="submit" class="btn btn-info btn-ladda btn-ladda-spinner" data-spinner-color="#333"
              data-style="zoom-in"><span class="ladda-label">Surat Tugas</span></a> -->
            <button type="button" class="btn btn-danger btn-ladda btn-ladda-spinner" id="submit"
              data-spinner-color="#333" data-style="zoom-in"><span class="ladda-label">Simpan</span></button>
            <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross"></i> Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>

$("#submit").click(function() {
    var cek1 = document.querySelector('#asesor11').value;
    if (cek1 != '') {
      var asesor1_value = document.querySelector('#asesor11').value;
    } else {
      var asesor1_value = '';
    }
    var cek2 = document.querySelector('#asesor22').value;
    if (cek2 != '') {
      var asesor2_value = document.querySelector('#asesor22').value;
    } else {
      var asesor2_value = '';
    }
    var cek3 = document.querySelector('#asesor33').value;
    if (cek3 != '') {
      var asesor3_value = document.querySelector('#asesor33').value;
    } else {
      var asesor2_value = '';
    }


    var cek11 = document.querySelector('#asesor11').value;
    var cek22 = document.querySelector('#asesor22').value;
    var cek33 = document.querySelector('#asesor33').value;
    var nib_value = document.querySelector('#nib').value;
    var counter1 = 0;
    var counter2 = 0;
    var counter3 = 0;
    $.ajax({
      url: "<?php echo base_url('survailen/insert_penunjukan_tinjauan_perbaikan'); ?>",
      type: "POST",
      data: {
        asesor1: asesor1_value,
        asesor2: asesor2_value,
        asesor3: asesor3_value,
        nib: nib_value
      },
      success: function(data) {
        response = jQuery.parseJSON(data);
        record = response.record;
        console.log(JSON.parse(data));

        if (record != '') {
          if (asesor1_value != '') {
            document.getElementById('get_value2').disabled = true;
            document.getElementById('asesor11').disabled = true;
            document.querySelector('#asesor1').value = '';
            counter1 = 1;

            toastr["success"]("Asesor 1 Berhasil Ditunjuk", "Notification");
            // document.querySelector('#delete').style.display = '';
          }
          if (asesor2_value != '') {
            document.getElementById('get_values2').disabled = true;
            document.getElementById('asesor22').disabled = true;
            document.querySelector('#asesor2').value = '';
            // document.querySelector('#delete2').style.display = '';
            counter2 = 1;

            toastr["success"]("Asesor 2 Berhasil Ditunjuk", "Notification");
          }
          if (asesor3_value != '') {
            document.getElementById('get_values3').disabled = true;
            document.getElementById('asesor33').disabled = true;
            document.querySelector('#asesor3').value = '';
            // document.querySelector('#delete3').style.display = '';
            counter3 = 1;

            toastr["success"]("Asesor 3 Berhasil Ditunjuk", "Notification");
          }

          // if (cek11 != '' && cek22 != '') {
          //   document.querySelector('#delete2').style.display = '';
          //   document.querySelector('#delete').style.display = '';
          //   document.querySelector('#submit').style.display = 'none';
          //   document.querySelector('#submit2').style.display = '';
          //   document.querySelector('#send').style.display = '';
          // }

        } else {

        }


      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });



  });

$("#get_value").click(function() {
    var nama_asesor = document.querySelector('#asesor1').value;

    $.ajax({
      url: "<?php echo base_url('sertifikasi/pilih_asesor'); ?>",
      type: "POST",
      data: {
        nama: nama_asesor,
      },
      success: function(data) {

        response = jQuery.parseJSON(data);
        document.querySelector('#asesor1').type = 'hidden';
        document.querySelector('#style1').style.display = '';
        document.querySelector('#style11').style.display = 'none';
        document.querySelector('#get_value').style.display = 'none';
        document.querySelector('#get_value2').style.display = '';
        console.log(JSON.parse(data));
        id_asesor = response.record;

        $.each(id_asesor, function(i, option) {
          var $option = $("<option>", {
            text: option.Nama + ' - ' + option.nama_propinsi,
            value: option.Username
          });
          $option.appendTo(".modal-body #asesor11");

        });
        if (id_asesor.length > 0) {
          toastr["info"]("Asesor Ditemukan", "Notification");

        } else {
          toastr["warning"]("Asesor Tidak Ditemukan", "Notification");

        }

      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  });

  $("#get_value2").click(function() {
    document.querySelector('#asesor1').type = 'text';
    document.querySelector('#style1').style.display = 'none';
    document.querySelector('#style11').style.display = '';
    document.querySelector('#get_value').style.display = '';
    document.querySelector('#get_value2').style.display = 'none';
    document.getElementById("asesor11").options.length = 0;

  });
</script>

<!-- Asesor 2-->

<script>
  $("#get_values").click(function() {
    var nama_asesor = document.querySelector('#asesor2').value;

    $.ajax({
      url: "<?php echo base_url('sertifikasi/pilih_asesor'); ?>",
      type: "POST",
      data: {
        nama: nama_asesor,
      },
      success: function(data) {

        response = jQuery.parseJSON(data);
        document.querySelector('#asesor2').type = 'hidden';
        document.querySelector('#style2').style.display = '';
        document.querySelector('#style22').style.display = 'none';
        document.querySelector('#get_values').style.display = 'none';
        document.querySelector('#get_values2').style.display = '';
        console.log(JSON.parse(data));
        id_asesor = response.record;

        $.each(id_asesor, function(i, option) {
          var $option = $("<option>", {
            text: option.Nama + ' (ASESOR) - ' + option.nama_propinsi,
            value: option.Username
          });
          $option.appendTo(".modal-body #asesor22");
        });
        if (id_asesor.length > 0) {

          toastr["info"]("Asesor Ditemukan", "Notification");
        } else {
          toastr["warning"]("Asesor Tidak Ditemukan", "Notification");

        }
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });

    $.ajax({
      url: "<?php echo base_url('survailen/pilih_verifikator'); ?>",
      type: "POST",
      data: {
        nama: nama_asesor,
      },
      success: function(data) {

        response = jQuery.parseJSON(data);

        console.log(JSON.parse(data));
        id_asesor = response.record;

        $.each(id_asesor, function(i, option) {
          var $option = $("<option>", {
            text: option.Nama + ' (VERIFIKATOR) - ' + option.nama_propinsi,
            value: option.Username
          });
          $option.appendTo(".modal-body #asesor22");
        });
        if (id_asesor.length > 0) {

          toastr["info"]("Verifikator Ditemukan", "Notification");
        } else {
          toastr["warning"]("Verifikator Tidak Ditemukan", "Notification");

        }
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  });

  $("#get_values2").click(function() {
    document.querySelector('#asesor2').type = 'text';
    document.querySelector('#style2').style.display = 'none';
    document.querySelector('#style22').style.display = '';
    document.querySelector('#get_values').style.display = '';
    document.querySelector('#get_values2').style.display = 'none';
    document.getElementById("asesor22").options.length = 0;
  });
</script>
<script>
  $("#get_valuesx").click(function() {
    var nama_asesor = document.querySelector('#asesor3').value;

    $.ajax({
      url: "<?php echo base_url('sertifikasi/pilih_asesor'); ?>",
      type: "POST",
      data: {
        nama: nama_asesor,
      },
      success: function(data) {

        response = jQuery.parseJSON(data);
        document.querySelector('#asesor3').type = 'hidden';
        document.querySelector('#style3').style.display = '';
        document.querySelector('#style33').style.display = 'none';
        document.querySelector('#get_valuesx').style.display = 'none';
        document.querySelector('#get_values3').style.display = '';
        console.log(JSON.parse(data));
        id_asesor = response.record;

        $.each(id_asesor, function(i, option) {
          var $option = $("<option>", {
            text: option.Nama + ' (ASESOR) - ' + option.nama_propinsi,
            value: option.Username
          });
          $option.appendTo(".modal-body #asesor33");
        });
        if (id_asesor.length > 0) {

          toastr["info"]("Asesor Ditemukan", "Notification");
        } else {
          toastr["warning"]("Asesor Tidak Ditemukan", "Notification");

        }
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });

    $.ajax({
      url: "<?php echo base_url('survailen/pilih_verifikator'); ?>",
      type: "POST",
      data: {
        nama: nama_asesor,
      },
      success: function(data) {

        response = jQuery.parseJSON(data);

        console.log(JSON.parse(data));
        id_asesor = response.record;

        $.each(id_asesor, function(i, option) {
          var $option = $("<option>", {
            text: option.Nama + ' (VERIFIKATOR) - ' + option.nama_propinsi,
            value: option.Username
          });
          $option.appendTo(".modal-body #asesor33");
        });
        if (id_asesor.length > 0) {

          toastr["info"]("Verifikator Ditemukan", "Notification");
        } else {
          toastr["warning"]("Verifikator Tidak Ditemukan", "Notification");

        }
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });
  });

  $("#get_values3").click(function() {
    document.querySelector('#asesor3').type = 'text';
    document.querySelector('#style3').style.display = 'none';
    document.querySelector('#style33').style.display = '';
    document.querySelector('#get_valuesx').style.display = '';
    document.querySelector('#get_values3').style.display = 'none';
    document.getElementById("asesor33").options.length = 0;
  });
</script>
<script>
  $("#penunjukan").click(function () {
    var oTable = $('#kt_datatable2').dataTable();
    var rowcollection = oTable.$(".call-checkbox:checked", {
      "page": "all"
    });
    //document.getElementById("kualifikasi").options.length = 0;
    var value = [];
    var sub = [];
    var coba = [];
    var coba2 = [];
    var coba3 = [];
    var coba4 = [];
    counter = 0;
    counter1 = 0;
    document.querySelector('#asesor1').value = '';
    document.querySelector('#asesor2').value = '';
    document.querySelector('#asesor3').value = '';

    document.querySelector('#asesor1').removeAttribute('disabled');
    document.querySelector('#get_value').removeAttribute('disabled');
    document.querySelector('#asesor2').removeAttribute('disabled');
    document.querySelector('#get_values').removeAttribute('disabled');
    document.querySelector('#asesor3').removeAttribute('disabled');
    document.querySelector('#get_valuesx').removeAttribute('disabled');
    // document.querySelector('#submit').style.display = '';
    // document.querySelector('#delete').style.display = 'none';
    //document.querySelector('#delete2').style.display = 'none';
    //document.querySelector('#submit2').style.display = 'none';
    //document.querySelector('#delete3').style.display = 'none';
    //document.querySelector('#submit3').style.display = 'none';
    document.querySelector('#send').style.display = 'none';
    $('#surat_tugas').html('');
    rowcollection.each(function (index, elem) {

      sub = elem.name;
      value = elem.value;
      if (coba.length > 0) {
        if (coba[counter] != sub) {
          counter = counter + 1;
          coba[counter] = sub;
          coba2[counter] = "'" + sub + "'";
        }
      } else {
        coba[counter] = sub;
        coba2[counter] = "'" + sub + "'";
      }
      if (coba3.length > 0) {
        if (coba3[counter1] != value) {
          counter1 = counter1 + 1;
          coba3[counter1] = value;
          coba4[counter1] = "'" + value + "'";
        }
      } else {
        coba3[counter1] = value;
        coba4[counter1] = "'" + value + "'";
      }
      document.getElementById('surat_tugas').innerHTML +='<a href="https://sertifikasi.lsbugapeknas.com/survailen/surat_tugas_tinjauan/'+sub+'" target="_blank" type="button"name="submit" class="btn btn-info btn-ladda btn-ladda-spinner" data-spinner-color="#333"data-style="zoom-in"><span class="ladda-label">Surat Tugas '+sub+'</span></a>&nbsp;&nbsp;&nbsp;'
    });
    $(".modal-body #nib").val(coba);



  });
</script>
