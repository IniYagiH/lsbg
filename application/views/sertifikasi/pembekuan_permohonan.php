<link href="<?= base_url('assets/fileinput/css/fileinput.css'); ?>" media="all" rel="stylesheet" type="text/css" />
<link href="<?= base_url('assets/fileinput/themes/explorer-fas/theme.css'); ?>" media="all" rel="stylesheet" type="text/css" />
<link href="<?= base_url('assets/plugins/custom/datatables/datatables.bundle.css'); ?>" rel="stylesheet" type="text/css" />

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
      <div class="d-flex align-items-center mr-1">
        <!--begin::Page Heading-->
        <div class="d-flex align-items-baseline flex-wrap mr-5">
          <!--begin::Page Title-->
          <h2 class="d-flex align-items-center text-dark font-weight-bold my-1 mr-3">Permohonan</h2>
          <!--end::Page Title-->
          <!--begin::Breadcrumb-->
          <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
            <li class="breadcrumb-item text-muted">
              <a href="" class="text-dark">Pelaksana</a>
            </li>
            <li class="breadcrumb-item text-muted">
              <a href="" class="text-dark">List Pembekuan Berkas</a>
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
            <h3 class="card-label">Pembekuan Permohonan
              <span class="d-block text-muted pt-2 font-size-sm">Searching Data Pencabutan</span>
            </h3>
          </div>
          <div class="card-toolbar">

            <!--end::Button-->
          </div>
        </div>

        <div class="card-body">
          <div class="form-group">

            <div class="input-group">
              <input type="text" id="input" class="form-control" placeholder="Search for..." />
              <div class="input-group-append">
                <button class="btn btn-primary" id="submit" type="button">SEARCHING</button>
              </div>
            </div>
            <div class="form-group row">

              <div class="col-12 col-form-label">
                <div class="radio-inline">
                  <label class="radio radio-success">
                    <input type="radio" name="option" value="1" checked />
                    <span></span>ID Izin</label>
                  <label class="radio radio-success">
                    <input type="radio" name="option" value="2" />
                    <span></span>NIB</label>
                  <label class="radio radio-success">
                    <input type="radio" name="option" value="3" />
                    <span></span>Nama</label>
                </div>
                <span class="form-text text-muted">Pilih Tipe Pencarian</span>
              </div>
            </div>
          </div>
          <!--begin: Datatable-->
          <table class="table table-bordered table-hover table-checkable mt-10" id="kt_datatable2">
            <thead>
              <tr>
                <th colspan="3">Data Badan Usaha</th>
                <th colspan="4">Permohonan</th>


              </tr>
              <tr>

                <th>NIB</th>
                <th>Pembekuan</th>
                <th>Beku Pemenuhan</th>
                <th>IdIzin</th>
                <th>NamaBadanUsaha</th>
                <th>Sub Klasifikasi</th>
                <th>Tgl Permohonan</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <!-- <?php if (!empty($record)) : ?>
              <?php foreach ($record as $row) : ?>
              <tr>
                <td>

                    <?= $row['NIB']; ?>

                </td>
                <td>

                    <a id="<?= $row['NIB']; ?>" name="<?= $row['id_izin']; ?>" target="<?= $row['tgl_permohonan']; ?>" onclick="javascript:tolak_permohonan(this)" data-toggle="modal" data-target="#modal_tolak" class="btn btn-icon btn-light-danger pulse pulse-danger mr-5">
                        <i class="flaticon2-trash"></i>
                        <span class="pulse-ring"></span>
                    </a>

                </td>
                <td><?= $row['id_izin']; ?></td>
                <td>

                    <?= $row['nama']; ?>

                </td>

                <td><?= $row['id_sub_klasifikasi']; ?></td>
                <td><?= $row['tgl_permohonan']; ?></td>
                <td>
                  <div class="dropdown dropdown-inline">
    								<a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">
    	                                <i class="la la-cog"></i>
    	                            </a>
    							  	<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
    									<ul class="nav nav-hoverable flex-column">
                        <li class="nav-item"><a class="nav-link" target="_blank" href="<?= base_url("sertifikasi/tinjauan_permohonan_izin/" . encrypt_url($row['NIB']) . '/' . encrypt_url($row['tgl_permohonan']) . '/' . $row['id_izin']); ?>"><i class="nav-icon la la-chalkboard-teacher"></i><span class="nav-text">Tinjau Permohonan</span></a></li>

                    </ul>
    							  	</div>
    							</div>


                </td>


              </tr>
            <?php endforeach; ?>
          <?php endif; ?> -->



            </tbody>
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
<div class="modal fade" id="modal_tolakx" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeLg" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">


      <div class="modal-body">
        <div class="card card-custom gutter-b">
          <div class="card-header">
            <div class="card-title">
              <span class="card-icon">
                <i class="flaticon-file-1 text-primary"></i>
              </span>
              <h3 class="card-label"><span class="text-danger">Pembekuan Pemenuhan</span></h3>
            </div>
          </div>
          <?php echo form_open_multipart('sertifikasi/post_status_beku_pemenuhan/', 'class="form-horizontal form-validate-jquery" id="form-upload-x"'); ?>

          <hr>
          <div class="form-group row">
            <div class="col-lg-6">
              <label class="control-label">NIB <span class="text-danger"></span></label>
              <input type="text" id="nib_tolakx" name="nib" readonly class="form-control">
            </div>
            <div class="col-lg-6">
              <label class="control-label">Tgl Permohonan <span class="text-danger"></span></label>
              <input type="text" id="tgl_permohonan_tolakx" name="tgl_permohonan" readonly class="form-control">

            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-12">
              <label class="control-label">ID Izin <span class="text-danger"></span></label>
              <input type="text" id="id_izin_tolakx" name="id_izin" readonly class="form-control">
            </div>

          </div>
          <div class="form-group row">
            <div class="col-lg-12">
              <label class="control-label">Alasan Penolakan <span class="text-danger"></span></label>
              <div class="input-group file-caption-main">
                <span class="file-caption-icon"></span>
                <textarea id="comment_tolakx" name="comment_penolakan" class="form-control form-control-solid" rows="5"> </textarea>


              </div>
            </div>

          </div>
          <div class="form-group row">

            <div class="col-lg-12">
              <label class="control-label">Bukti Penolakan <span class="text-danger"></span></label>
              <input class="file-tolak" id="file_tolak" name="file_tolak" type="file" data-preview-file-type="text">
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
      <div class="modal-footer">
        <button type="submit" id="submit" class="btn btn-primary mr-2">Submit</button>

        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
<div class="modal fade" id="modal_tolak" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeLg" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">


      <div class="modal-body">
        <div class="card card-custom gutter-b">
          <div class="card-header">
            <div class="card-title">
              <span class="card-icon">
                <i class="flaticon-file-1 text-primary"></i>
              </span>
              <h3 class="card-label"><span class="text-danger">Pembekuan SBU</span></h3>
            </div>
          </div>
          <?php echo form_open_multipart('sertifikasi/post_status_beku/', 'class="form-horizontal form-validate-jquery" id="form-upload-1"'); ?>

          <hr>
          <div class="form-group row">
            <div class="col-lg-6">
              <label class="control-label">NIB <span class="text-danger"></span></label>
              <input type="text" id="nib_tolak" name="nib" readonly class="form-control">
            </div>
            <div class="col-lg-6">
              <label class="control-label">Tgl Permohonan <span class="text-danger"></span></label>
              <input type="text" id="tgl_permohonan_tolak" name="tgl_permohonan" readonly class="form-control">

            </div>
          </div>
          <div class="form-group row">
            <div class="col-lg-12">
              <label class="control-label">ID Izin <span class="text-danger"></span></label>
              <input type="text" id="id_izin_tolak" name="id_izin" readonly class="form-control">
            </div>

          </div>
          <div class="form-group row">
            <div class="col-lg-12">
              <label class="control-label">Alasan Penolakan <span class="text-danger"></span></label>
              <div class="input-group file-caption-main">
                <span class="file-caption-icon"></span>
                <textarea id="comment_tolak" name="comment_penolakan" class="form-control form-control-solid" rows="5"><?php if (!empty($ceklis)) {
                                                                                                                          echo $data_comment80;
                                                                                                                        } ?> </textarea>


              </div>
            </div>

          </div>
          <div class="form-group row">

            <div class="col-lg-12">
              <label class="control-label">Bukti Penolakan <span class="text-danger"></span></label>
              <input class="file-tolak" id="file_tolak" name="file_tolak" type="file" data-preview-file-type="text">
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
      <div class="modal-footer">
        <button type="submit" id="submit" class="btn btn-primary mr-2">Submit</button>

        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>

<script>
  $('#submit').click(function() {
    var options = $('input[name="option"]:checked').val();
    var input_value = $('#input').val();

    jQuery.ajax({
      url: "<?= base_url('sertifikasi/search_beku') ?>",
      type: "POST",
      data: {
        input: input_value,
        option: options
      },
      success: function(data) {
        response = jQuery.parseJSON(data);
        var table = $('#kt_datatable2').DataTable();
        table.clear().draw();

        var array = response.record;
        console.log(array);
        // table.columns(0).header().to$().text('id_izin');
        // table.columns(1).header().to$().text('nama_bujk');
        // table.columns(2).header().to$().text('nama_propinsi');
        // table.columns(3).header().to$().text('NIB');
        // table.columns(4).header().to$().text('nama_jenis');
        // table.columns(5).header().to$().text('id_sub_klasifikasi');
        array.forEach(function(element) {

          var status = '<a id="' + element.NIB + '" name="' + element.id_izin + '" target="' + element.tgl_permohonan + '" onclick="javascript:tolak_permohonan(this)" data-toggle="modal" data-target="#modal_tolak" class="btn btn-icon btn-light-danger pulse pulse-danger mr-5"><i class="flaticon2-trash"></i><span class="pulse-ring"></span></a>';
          var statusx = '<a id="' + element.NIB + '" name="' + element.id_izin + '" target="' + element.tgl_permohonan + '" onclick="javascript:tolak_permohonanx(this)" data-toggle="modal" data-target="#modal_tolakx" class="btn btn-icon btn-light-info pulse pulse-info mr-5"><i class="flaticon2-trash"></i><span class="pulse-ring"></span></a>';

          var status2 = '<div class="dropdown dropdown-inline"><a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown"><i class="la la-cog"></i></a> <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right"><ul class="nav nav-hoverable flex-column"><li class="nav-item"><a class="nav-link" target="_blank" href="https://sertifikasi.lsbugapeknas.com/sertifikasi/tinjauan_permohonan_izin/' + element.nib_dec + '/' + element.tgl_dec + '/' + element.id_izin + '"><i class="nav-icon la la-chalkboard-teacher"></i><span class="nav-text">Tinjau Permohonan</span></a></li></ul></div></div>'

          var rowNode = table
            .row.add([element.NIB, status, statusx, element.id_izin, element.nama, element.id_sub_klasifikasi, element.tgl_permohonan, status2])
            .draw()
            .node();
          $(rowNode)
            .css('color', 'black')
            .animate({
              color: 'black'
            });
        });
      },
      error: function(xhr, status, error) {
        var err = eval("(" + xhr.responseText + ")");
        alert(err.Message);
      }
    });

  });

  function refresh() {
    window.location.reload();
  }

  function tolak_permohonan(sel) {
    document.getElementById('comment_tolak').value = '';
    $("#nib_tolak").val(sel.id);
    $("#tgl_permohonan_tolak").val(sel.target);
    $("#id_izin_tolak").val(sel.name);
    var nib_value = sel.id;
    var tgl_permohonan_value = sel.target;
    document.getElementById('comment_tolak').value += "Permohonan SBU Bapak/Ibu dengan NIB : " + nib_value + ' Kami Bekukan ';

  }

  function tolak_permohonanx(sel) {
    document.getElementById('comment_tolakx').value = '';
    $("#nib_tolakx").val(sel.id);
    $("#tgl_permohonan_tolakx").val(sel.target);
    $("#id_izin_tolakx").val(sel.name);
    var nib_value = sel.id;
    var tgl_permohonan_value = sel.target;
    document.getElementById('comment_tolakx').value += "Permohonan SBU Bapak/Ibu dengan NIB : " + nib_value + ' Kami Bekukan ';

  }
</script>
<script type="text/javascript">
  $(".file-tolak").fileinput({
    maxFileSize: 20000,
    allowedFileExtensions: ['jpg', 'png', 'pdf'],
    showUpload: false,
    dropZoneEnabled: false
  });


  var submitCounter = 0;
  $(function() {
    var uploadURI = $('#form-upload-1').attr('action');
    var progressBar = $('#progress-bar-1');

    $("form#form-upload-1").submit(function() {

      event.preventDefault();




      // make sure there is file to upload
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
          success: function(data) {
            if (data.result == '1') {
              submitCounter = 0;
              toastr["success"]("Pencabutan Permohonan Berhasil dilakukan", "Success");
            } else {
              submitCounter = 0;
              toastr["success"]("Pencabutan Permohonan Berhasil dilakukan", "Success");

            }
          },
          xhr: function() {
            var xhr = new XMLHttpRequest();
            xhr.upload.addEventListener("progress", function(event) {
              if (event.lengthComputable) {
                var percentComplete = Math.round((event.loaded / event.total) * 100);
                // console.log(percentComplete);

                $('.progress').show();
                if (percentComplete >= 97) {
                  progressBar.text('- Harap Tunggu -');
                } else {
                  progressBar.text(percentComplete + '%');
                }
                progressBar.css({
                  width: percentComplete + "%"
                });
              };
            }, false);
            return xhr;
          }
        });
      } else {
        toastr["warning"]("This is can be clicked only once.", "Notification");


      }




    });
    $('body').on('change.bs.fileinput', function(e) {
      $('.progress').hide();
      progressBar.text("0%");
      progressBar.css({
        width: "0%"
      });
    });
  });
</script>