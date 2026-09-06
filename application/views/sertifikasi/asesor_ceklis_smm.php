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
        .kop_surat {
            font-size: 20px;
            margin-left: 30px;
            margin-top: 15px;
            text-align:left;
            float: left;
        }
        .col-1-90 {
            width: 90%;
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
<section class="items">

    <!-- your favorite templating/data-binding library would come in handy here to generate these rows dynamically !-->
    <div class="row">
      <div class="col-1-10 ">
        <div class="logo">
          <?php


          $path = base_url('assets/media/logos/Logo_gapeknas.png');
          $type = pathinfo($path, PATHINFO_EXTENSION);
          $arrContextOptions=array(
            "ssl"=>array(
                "verify_peer"=>false,
                "verify_peer_name"=>false,
            ),
          );
          $data = file_get_contents($path, false, stream_context_create($arrContextOptions));
          $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
           ;?>
            <img src="<?=$base64 ;?>" style="margin-top:10px;border: 1px; max-height: 190px; max-width: 120px; ">

        </div>
      </div>
      <div class="col-1-90 ">
        <div class="kop_surat">
          <b style="font-size:30px;">PT LSBU GAPEKNAS INFRASTRUKTUR</b><br>
          Ruko Graha Mas Pemuda Blok AD No. 21 Jl. Pemuda, Rawamangun, Jakarta Timur
        </div>
      </div>

    </div>

</section>


<body>
  <br>
  <br>
  <br>
  <br>
<hr>
  <section class="items">
    <div class="center">
      PENILAIAN DAN REKOMENDASI KESESUAIAN DOKUMEN SMM BADAN USAHA

    </div>





  </section>
  <section class="items">

    <div class="row">
        <div class="col-1-10">
          Nama Badan Usaha
        </div>
        <div class="col-1-10">
          : <?=$biodata[0]['nama'];?>
        </div>


    </div>
    <div class="row">
        <div class="col-1-10">
          NIB
        </div>
        <div class="col-1-10">
          : <?=$biodata[0]['NIB'];?>
        </div>


    </div>
    <div class="row">
        <div class="col-1-10">
          NPWP
        </div>
        <div class="col-1-10">
          : <?=$biodata[0]['npwp'];?>
        </div>


    </div>
    <div class="row">
        <div class="col-1-10">
          Bentuk Usaha
        </div>
        <div class="col-1-10">
          : <?=$biodata[0]['bentuk_usaha'];?>
        </div>


    </div>
    <div class="row">
        <div class="col-1-10">
          Jenis Usaha
        </div>
        <div class="col-1-10">
          : <?=$biodata[0]['klasifikasi_jenis_usaha'];?>
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
        <div class="col-1-5-table">
          <div class="center">
            No
          </div>
        </div>

          <div class="col-1-20-table">
            <div class="center">
              ISO 900L2015<br>
              (Nama Lembaga Sertifikasi, Nomor, dan Tanggal)
            </div>
          </div>
          <div class="col-1-20-table">
            <div class="center">
              DOKUMEN SMM<br>
              (Nomor dan Tanggal)
            </div>
          </div>
          <div class="col-1-20-table">
            <div class="center">
              SURAT PERNYATAAN BADAN USAHA<br>
              (Nomor dan Tanggal)
            </div>
          </div>
          <div class="col-1-10-table">
            <div class="center">
              REKOMENDASI
            </div>
          </div>

      </div>
      <div class="row">
        <div class="col-1-5-table">
          <div class="center">
            #
          </div>
        </div>

          <div class="col-1-20-table">
            <?=$smm_asesor[0]['iso'];?>
          </div>
          <div class="col-1-20-table">
            <?=$smm_asesor[0]['dokumen'];?>
          </div>
          <div class="col-1-20-table">
            <?=$smm_asesor[0]['pernyataan'];?>
          </div>
          <div class="col-1-10-table">
            <div class="center">
            <?php if($data_ceklis96=="1"){
              echo 'SESUAI';
            }else{
              echo 'TIDAK SESUAI';
            } ?>
            </b></i>
            </div>
          </div>

      </div>



    </section>




</body>

<section class="items">
  <div class="row">
    <div class="col-1-40">
      <div class="center">
        Catatan SMM
      </div>
    </div>
    <div class="col-1-30">
      <div class="center">
        ABU I
      </div>
    </div>
    <div class="col-1-30">
      <div class="center">
        ABU II
      </div>
    </div>

  </div>

  <div class="row">
    <div class="col-1-40-table">
      <?=$data_comment79;?>

    </div>
    <div class="col-1-15-table">

      <div class="logo">

          <img src="<?= $asesor[0]['persyaratan']; ;?>" style="border: 1px; max-height: 190px; max-width: 160px; ">

      </div>
      <?= $asesor[0]['Nama']; ?>
      <br>
      (...................................)
      <br>

    </div>
    <div class="col-1-15-table">

      <div class="logo">

          <img src="<?= $asesor[1]['persyaratan']; ;?>" style="border: 1px; max-height: 190px; max-width: 160px; ">

      </div>
      <?= $asesor[1]['Nama']; ?>
      <br>
      (...................................)
      <br>

    </div>







  </div>


</section>
</html>
