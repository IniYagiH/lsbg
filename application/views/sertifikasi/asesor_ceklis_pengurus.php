<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Result</title>
    <style media="screen">
        body {
            font-family: 'Segoe UI','Microsoft Sans Serif',sans-serif;
        }


        header:before, header:after {
            content: " ";
            display: table;
        }

        header:after {
            clear: both;
        }

        .berita_acara {
            font-size: 20px;
            margin-right: 0px;
            margin-top: 0px;
            float: left;
        }

        .logo {
            float: left;

        }

        .from {
            float: left;
        }

        .to {
            float: right;
        }
        .center-pds {
          text-align: center;
          padding-top: -30px;
        }
        .left-pds {
          text-align: left;
          padding-top: -15px;
          padding-left: 29px;
        }
        .footer-pds {
          text-align: left;
          padding-top: 50px;
          padding-left: 29px;
        }
        .center {
          text-align: center;
        }
        .left {
          text-align: left;
          padding-top: -15px;
          padding-left: 15px;
        }

        .fromto {
            border-style: solid;
            border-width: 1px;
            border-color: #e8e5e5;
            border-radius: 5px;
            margin: 20px;
            min-width: 200px;
        }

        .fromtocontent {
            margin: 10px;
            margin-right: 15px;
        }

        .panel {
            background-color: #e8e5e5;
            padding: 7px;
        }

        .items {
            clear: both;
            display: table;
            padding: 20px;
        }

        /* Factor out common styles for all of the "col-" classes.*/
        div[class^="col-"] {
            display: table-cell;
            padding: 7px;
        }

        /*for clarity name column styles by the percentage of width */
        .col-1-10 {
            width: 10%;
        }
        .col-1-5 {
            width: 5%;
        }
        .col-1-20 {
            width: 20%;


        }
        .col-1-30 {
            width: 30%;

        }
        .col-1-40 {
            width: 40%;

        }

        .col-1-10-table {
            width: 10%;
            border: 1px solid black;
        }
        .col-1-5-table {
            width: 5%;
            border: 1px solid black;
        }
        .col-1-20-table {
            width: 20%;
            border: 1px solid black;

        }
        .col-1-15-table {
            width: 15%;
            border: 1px solid black;
            text-align: center;

        }
        .col-1-30-table {
            width: 30%;
            border: 1px solid black;
            text-align: center;

        }
        .col-1-40-table {
            width: 40%;
            border: 1px solid black;

        }
        .col-1-50-table {
            width: 50%;
            border: 1px solid black;

        }

        .col-1-52 {
            width: 52%;
        }

        .row {
            display: table-row;
            page-break-inside: avoid;
        }

    </style>

    <!-- These styles are exactly like the screen styles except they use points (pt) as units
        of measure instead of pixels (px) -->
    <style media="print">
        body {
            font-family: 'Segoe UI','Microsoft Sans Serif',sans-serif;
        }

        header:before, header:after {
            content: " ";
            display: table;
        }

        header:after {
            clear: both;
        }

        .berita_acara {
            font-size: 30pt;
            margin-right: 30pt;
            margin-top: 30pt;
            float: right;
        }

        .logo {
            float: left;
        }

        .from {
            float: left;
        }

        .to {
            float: right;
        }

        .fromto {
            border-style: solid;
            border-width: 1pt;
            border-color: #e8e5e5;
            border-radius: 5pt;
            margin: 20pt;
            min-width: 200pt;
        }

        .fromtocontent {
            margin: 10pt;
            margin-right: 15pt;
        }

        .panel {
            background-color: #e8e5e5;
            padding: 7pt;
        }

        .items {
            clear: both;
            display: table;
            padding: 20pt;
        }

        div[class^="col-"] {
            display: table-cell;
            padding: 7pt;
        }

        .col-1-10 {
            width: 10%;
        }

        .col-1-52 {
            width: 52%;
        }
        .col-1-20 {
            width: 20%;
        }
        .col-1-30 {
            width: 30%;
        }

        .row {
            display: table-row;
            page-break-inside: avoid;
        }
    </style>

</head>
<body>
  <div class="center">
    LEMBAR PENILAIAN PENGURUS

  </div>
  <section class="items">

    <div class="row">
        <div class="col-1-10">
          Nama Badan Usaha :
        </div>
        <div class="col-1-10">
          : <?=$biodata[0]['nama'];?>
        </div>


    </div>

      <div class="row">
          <div class="col-1-10">
            Jenis Usaha
          </div>
          <div class="col-1-10">
            : <?=$biodata[0]['jenis_usaha'];?>
          </div>

      </div>
      <div class="row">
        <div class="col-1-10">
          Sifat Usaha
        </div>
        <div class="col-1-10">
          : <?=$biodata[0]['sifat_usaha'];?>
        </div>

      </div>


  </section>


<?php
  $count=0;
 foreach($ceklis as $row_ceklis){
  $count+=1;
  for ($i=0; $i < count($ceklis); $i++) {
    if($row_ceklis['id']==$ceklis[$i]['id']){
      ${"data_ceklis".$row_ceklis['id']}=$row_ceklis['ceklis'];
      ${"data_ceklis".$row_ceklis['id']."_2"}=$row_ceklis['ceklis_2'];

      ${"data_comment".$row_ceklis['id']}=$row_ceklis['comment'];
      ${"data_deksripsi".$row_ceklis['id']}=$row_ceklis['Deskripsi'];
    }
  }
} ;?>





    <section class="items">

      <div class="row">
        <div class="col-1-5">
          <div class="center">
            No
          </div>
        </div>

          <div class="col-1-5">
            <div class="center">
              Nama
            </div>
          </div>
          <div class="col-1-5">
            <div class="center">
              Alamat/Kota
            </div>
          </div>
          <div class="col-1-5">
            <div class="center">
              NPWP
            </div>
          </div>

          <div class="col-1-5">
            <div class="center">
              No KTP/Passport
            </div>
          </div>
          <div class="col-1-5">
            <div class="center">
              Jabatan
            </div>
          </div>



      </div>
      <?php $v=0; ?>

      <?php foreach($pengurus as $row_pengurus): ?>
      <?php $v+=1; ?>

      <div class="row">

          <div class="col-1-5-table">
            <div class="center">
              <?= $v ;?>
            </div>
          </div>

          <div class="col-1-10-table">

              <?= $row_pengurus['nama'] ;?>

          </div>

          <div class="col-1-20-table">
              <?= $row_pengurus['alamat'] ;?>
          </div>

          <div class="col-1-15-table">
          <?= $row_pengurus['npwp'] ;?>

          </div>
          <div class="col-1-10-table">
            <?= $row_pengurus['no_ktp'] ;?>

          </div>
          <div class="col-1-5-table">
            <div class="center">
              <?= $row_pengurus['id_jabatan'] ;?>
          </div>
          </div>
      </div>

  <?php endforeach ;?>



    </section>
    <section class="items">

      <div class="row">
        <div class="col-1-5">
          <div class="center">
            No
          </div>
        </div>

          <div class="col-1-5">
            <div class="center">
              Verifikasi
            </div>
          </div>
          <div class="col-1-5">
            <div class="center">
              Validasi
            </div>
          </div>
          <div class="col-1-5">
            <div class="center">
              Catatan
            </div>
          </div>





      </div>


      <div class="row">

          <div class="col-1-5-table">
            <div class="center">
              #
            </div>
          </div>

          <div class="col-1-5-table">
            <div class="center">
              <?php if($data_ceklis81=="1"){
                echo 'Ada';
              }else{
                echo "Tidak Ada";
              } ?>
            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">
            <?php if($data_ceklis81_2=="1"){
              echo 'Valid';
            }else{
              echo "Tidak Valid";
            } ?>
          </div>
          </div>

          <div class="col-1-40-table">
            <?=$data_comment81;?>

          </div>

      </div>





    </section>

    <section class="items">
      <div class="row">
        <div class="col-1-30">
          <div class="center">
            ASESOR
          </div>
        </div>

      </div>

      <div class="row">
        <div class="col-1-15-table">

          <br>
          <br>
          <br>
          <br>
          <?= $this->session->userdata('nama'); ?>
          <br>
          (...................................)
          <br>

        </div>







      </div>

  </section>
</body>
</html>
