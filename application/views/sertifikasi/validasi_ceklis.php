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
    PT SERTIFIKASI KONTRAKTOR INDONESIA
    <br>
    VALIDASI PERMOHONAN SERTIFIKASI

  </div>



<!--
    <div class="fromto from">
        <div class="panel">Result:</div>
        <div class="fromtocontent">
            <span>NPWP: xxxx-xx-x-x-x</span><br />
            <span>ID BU: 1311553388</span><br />
            <span>NAMA BADAN USAHA:CV. MAWAR</span><br />
        </div>
    </div>
-->
<?php
  $count=0;
 foreach($ceklis as $row_ceklis){
  $count+=1;
  for ($i=0; $i < count($ceklis); $i++) {
    if($row_ceklis['id']==$ceklis[$i]['id']){
      ${"data_ceklis".$row_ceklis['id']}=$row_ceklis['ceklis'];
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

          <div class="col-1-40">
            <div class="center">
              Data
            </div>
          </div>
          <div class="col-1-5">
            <div class="center">
              Ada
            </div>
          </div>
          <div class="col-1-5">
            <div class="center">
              Tidak Ada
            </div>
          </div>
          <div class="col-1-40">
            <div class="center">
              Keterangan
            </div>
          </div>



      </div>

      <div class="row">

          <div class="col-1-5-table">

          </div>

          <div class="col-1-40-table">
            <div class="center">
              DATA PERUSAHAAN
            </div>
          </div>
          <div class="col-1-5-table">
            <div class="center">
              <?php if($data_ceklis80=="1"){
                echo 'V';
              } ?>


          </div>
          </div>


          <div class="col-1-5-table">
            <div class="center">
              <?php if($data_ceklis80=="0"){
                echo 'V';
              } ?>


          </div>

          </div>
          <div class="col-1-40-table">
            <?= $data_comment80 ;?>

          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            1.
          </div>

          <div class="col-1-40-table">
            Nama Badan Usaha : <?= $biodata[0]['nama'] ;?>
          </div>

          <div class="col-1-5-table">
            <div class="center">
            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">
          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            2.
          </div>

          <div class="col-1-40-table">
            Alamat : <?= $biodata[0]['alamat_bu'] ;?>
          </div>

          <div class="col-1-5-table">
            <div class="center">
            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">
          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            3.
          </div>

          <div class="col-1-40-table">
            Email : <?= $biodata[0]['email'] ;?>
          </div>

          <div class="col-1-5-table">
            <div class="center">
            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">
          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">

          </div>

          <div class="col-1-40-table">
            Email PIC : <?= $biodata[0]['email_pic'] ;?>
          </div>

          <div class="col-1-5-table">
            <div class="center">
            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">
          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            4.
          </div>

          <div class="col-1-40-table">
            Telepon Badan Usaha : <?= $biodata[0]['telepon'] ;?>
          </div>

          <div class="col-1-5-table">
            <div class="center">
            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">
          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">

          </div>

          <div class="col-1-40-table">
            Telepon PIC : <?= $biodata[0]['telepon'] ;?>
          </div>

          <div class="col-1-5-table">
            <div class="center">
            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">
          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">

          </div>

          <div class="col-1-40-table">
            File NPWP
          </div>

          <div class="col-1-5-table">
            <div class="center">
              <?php if($data_ceklis9=="1"){
                echo 'V';
              } ?>
            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">
            <?php if($data_ceklis9=="0"){
              echo 'V';
            } ?>
          </div>

          </div>
          <div class="col-1-40-table">
            <?= $data_comment9;?>

          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">

          </div>

          <div class="col-1-40-table">
            File Izin Bagi Penanam Modal dari BKPM yang berlaku (Bagi PMA)
          </div>

          <div class="col-1-5-table">
            <div class="center">
              <?php if($data_ceklis13=="1"){
                echo 'V';
              } ?>
            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">
            <?php if($data_ceklis13=="0"){
              echo 'V';
            } ?>
          </div>

          </div>
          <div class="col-1-40-table">
            <?= $data_comment13;?>

          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">

          </div>

          <div class="col-1-40-table">
            File Keterangan Domisili
          </div>

          <div class="col-1-5-table">
            <div class="center">
              <?php if($data_ceklis11=="1"){
                echo 'V';
              } ?>
            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">
            <?php if($data_ceklis11=="0"){
              echo 'V';
            } ?>
          </div>

          </div>
          <div class="col-1-40-table">
            <?= $data_comment11;?>

          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">

          </div>

          <div class="col-1-40-table">
            File Sertifikat ISO 9001 - 2015
          </div>

          <div class="col-1-5-table">
            <div class="center">
              <?php if($data_ceklis39=="1"){
                echo 'V';
              } ?>
            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">
            <?php if($data_ceklis39=="0"){
              echo 'V';
            } ?>
          </div>

          </div>
          <div class="col-1-40-table">
            <?= $data_comment39;?>

          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">

          </div>

          <div class="col-1-40-table">
            File Keterangan Domisili
          </div>

          <div class="col-1-5-table">
            <div class="center">
              <?php if($data_ceklis11=="1"){
                echo 'V';
              } ?>
            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">
            <?php if($data_ceklis11=="0"){
              echo 'V';
            } ?>
          </div>

          </div>
          <div class="col-1-40-table">
            <?= $data_comment11;?>

          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">
            5.
            </div>
          </div>

          <div class="col-1-40-table">
            <div class="center">
              DATA PERMOHONAN
            </div>
          </div>
          <div class="col-1-5-table">
            <div class="center">
              <?php if($data_ceklis90=="1"){
                echo 'V';
              } ?>


          </div>
          </div>


          <div class="col-1-5-table">
            <div class="center">
              <?php if($data_ceklis90=="0"){
                echo 'V';
              } ?>


          </div>

          </div>
          <div class="col-1-40-table">
            <?= $data_comment90 ;?>

          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">

          </div>

          <div class="col-1-40-table">
            File Photo Copy SBU (Semua yang dimiliki) /SBU Asli
          </div>

          <div class="col-1-5-table">
            <div class="center">
              <?php if($data_ceklis12=="1"){
                echo 'V';
              } ?>
            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">
            <?php if($data_ceklis12=="0"){
              echo 'V';
            } ?>
          </div>

          </div>
          <div class="col-1-40-table">
            <?= $data_comment12;?>

          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">

          </div>

          <div class="col-1-40-table">
            File Surat Pernyataan Badan Usaha
          </div>

          <div class="col-1-5-table">
            <div class="center">
              <?php if($data_ceklis5=="1"){
                echo 'V';
              } ?>
            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">
            <?php if($data_ceklis5=="0"){
              echo 'V';
            } ?>
          </div>

          </div>
          <div class="col-1-40-table">
            <?= $data_comment5;?>

          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">

          </div>

          <div class="col-1-40-table">
            File Formulir Permohonan SBU & Formulir Administrasi dan SDM
          </div>

          <div class="col-1-5-table">
            <div class="center">
              <?php if($data_ceklis3=="1"){
                echo 'V';
              } ?>
            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">
            <?php if($data_ceklis3=="0"){
              echo 'V';
            } ?>
          </div>

          </div>
          <div class="col-1-40-table">
            <?= $data_comment3;?>

          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">

          </div>

          <div class="col-1-40-table">
            File Surat Permohonan Klasifikasi dan Kualifikasi
          </div>

          <div class="col-1-5-table">
            <div class="center">
              <?php if($data_ceklis4=="1"){
                echo 'V';
              } ?>
            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">
            <?php if($data_ceklis4=="0"){
              echo 'V';
            } ?>
          </div>

          </div>
          <div class="col-1-40-table">
            <?= $data_comment4;?>

          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">

          </div>

          <div class="col-1-40-table">
            File KTA Asosiasi
          </div>

          <div class="col-1-5-table">
            <div class="center">
              <?php if($data_ceklis10=="1"){
                echo 'V';
              } ?>
            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">
            <?php if($data_ceklis10=="0"){
              echo 'V';
            } ?>
          </div>

          </div>
          <div class="col-1-40-table">
            <?= $data_comment10;?>

          </div>
      </div>
      <?php $v=0;?>
      <?php foreach($klasifikasi as $row_klasifikasi):?>
        <?php $v+=1 ?>
        <div class="row">

            <div class="col-1-5-table">
              <?php if($v==1){echo '6 a';}
              elseif($v==2){echo 'b';}
              elseif($v==3){echo 'c';}
              elseif($v==4){echo 'd';}
              elseif($v==5){echo 'e';}
              elseif($v==6){echo 'f';}
              elseif($v==7){echo 'g';}
              elseif($v==8){echo 'h';}
              elseif($v==9){echo 'i';}
              elseif($v==10){echo 'j';}
              elseif($v==11){echo 'k';}
              elseif($v==12){echo 'l';}
              elseif($v==13){echo 'm';}
              elseif($v==14){echo 'n';}
              elseif($v==15){echo 'o';}
              elseif($v==16){echo 'p';}
              elseif($v==17){echo 'q';}
              elseif($v==18){echo 'r';}
              elseif($v==19){echo 's';}
              elseif($v==20){echo 't';}
              elseif($v==21){echo 'u';}
              elseif($v==22){echo 'v';}
              elseif($v==23){echo 'w';}
              elseif($v==24){echo 'x';}
              elseif($v==25){echo 'y';}
              elseif($v==26){echo 'z';}
              ?>
            </div>

            <div class="col-1-40-table">
              Klasifikasi : <?= $row_klasifikasi['id_klasifikasi'] ;?>
            </div>

            <div class="col-1-5-table">
              <div class="center">

              </div>
            </div>

            <div class="col-1-5-table">
            <div class="center">

            </div>

            </div>
            <div class="col-1-40-table">


            </div>
        </div>
        <div class="row">

            <div class="col-1-5-table">

            </div>

            <div class="col-1-40-table">
              Sub Klasifikasi : <?= $row_klasifikasi['id_sub_klasifikasi'] ;?>
            </div>

            <div class="col-1-5-table">
              <div class="center">

              </div>
            </div>

            <div class="col-1-5-table">
            <div class="center">

            </div>

            </div>
            <div class="col-1-40-table">


            </div>
        </div>
        <div class="row">

            <div class="col-1-5-table">

            </div>

            <div class="col-1-40-table">
              Kualifikasi : <?= $row_klasifikasi['kualifikasi'] ;?>
            </div>

            <div class="col-1-5-table">
              <div class="center">

              </div>
            </div>

            <div class="col-1-5-table">
            <div class="center">

            </div>

            </div>
            <div class="col-1-40-table">


            </div>
        </div>

      <?php endforeach ;?>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">
              7.
            </div>
          </div>

          <div class="col-1-40-table">
            <div class="center">
            AKTE NOTARIS PENDIRIAN BADAN USAHA
          </div>
          </div>

          <div class="col-1-5-table">
            <div class="center">
              <?php if($data_ceklis83=="1"){
                echo 'V';
              } ?>
            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">
            <?php if($data_ceklis83=="0"){
              echo 'V';
            } ?>
          </div>

          </div>
          <div class="col-1-40-table">
            <?= $data_comment83;?>

          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Nomor : <?= $akte_pendirian[0]['nomer_akte'] ;?>
          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Tanggal Akte : <?= $akte_pendirian[0]['tgl_akte'] ;?>
          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Notaris : <?= $akte_pendirian[0]['nama_notaris'] ;?>
          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">
              8.
            </div>
          </div>

          <div class="col-1-40-table">
            File Surat Keputusan Menteri Hukum dan HAM
          </div>

          <div class="col-1-5-table">
            <div class="center">
              <?php if($data_ceklis55=="1"){
                echo 'V';
              } ?>
            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">
            <?php if($data_ceklis55=="0"){
              echo 'V';
            } ?>
          </div>

          </div>
          <div class="col-1-40-table">
            <?=$data_comment55 ;?>

          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Nomor Menteri Kehakiman dan HAM : <?= $akte_pendirian[0]['no_pm'] ;?>
          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Tanggal Mentri : <?= $akte_pendirian[0]['tgl_pm'] ;?>
          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            File Persyaratan Akte Pendirian
          </div>

          <div class="col-1-5-table">
            <div class="center">
              <?php if($data_ceklis7=="1"){
                echo 'V';
              } ?>
            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">
            <?php if($data_ceklis55=="0"){
              echo 'V';
            } ?>
          </div>

          </div>
          <div class="col-1-40-table">
            <?=$data_comment55 ;?>

          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">
              9.
            </div>
          </div>

          <div class="col-1-40-table">
            <div class="center">
            AKTE PERUBAHAN
            </div>
          </div>

          <div class="col-1-5-table">
            <div class="center">
              <?php if($data_ceklis84=="1"){
                echo 'V';
              } ?>
            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">
            <?php if($data_ceklis84=="0"){
              echo 'V';
            } ?>
          </div>

          </div>
          <div class="col-1-40-table">
            <?=$data_comment84 ;?>

          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Surat Keputusan Menteri Hukum dan HAM
          </div>

          <div class="col-1-5-table">
            <div class="center">
              <?php if($data_ceklis56=="1"){
                echo 'V';
              } ?>
            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">
            <?php if($data_ceklis56=="0"){
              echo 'V';
            } ?>
          </div>

          </div>
          <div class="col-1-40-table">
              <?=$data_comment56 ;?>

          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            File Akte Pendirian
          </div>

          <div class="col-1-5-table">
            <div class="center">
              <?php if($data_ceklis8=="1"){
                echo 'V';
              } ?>
            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">
            <?php if($data_ceklis8=="0"){
              echo 'V';
            } ?>
          </div>

          </div>
          <div class="col-1-40-table">
              <?=$data_comment8 ;?>

          </div>
      </div>
      <?php $v=0 ;?>
      <?php foreach($akte_perubahan as $row_perubahan) :?>
        <?php $v+=1 ;?>
        <div class="row">

            <div class="col-1-5-table">
              <div class="center">
                <?php if($v==1){echo 'a';}
                elseif($v==2){echo 'b';}
                elseif($v==3){echo 'c';}
                elseif($v==4){echo 'd';}
                elseif($v==5){echo 'e';}
                elseif($v==6){echo 'f';}
                elseif($v==7){echo 'g';}
                elseif($v==8){echo 'h';}
                elseif($v==9){echo 'i';}
                elseif($v==10){echo 'j';}
                elseif($v==11){echo 'k';}
                elseif($v==12){echo 'l';}
                elseif($v==13){echo 'm';}
                elseif($v==14){echo 'n';}
                elseif($v==15){echo 'o';}
                elseif($v==16){echo 'p';}
                elseif($v==17){echo 'q';}
                elseif($v==18){echo 'r';}
                elseif($v==19){echo 's';}
                elseif($v==20){echo 't';}
                elseif($v==21){echo 'u';}
                elseif($v==22){echo 'v';}
                elseif($v==23){echo 'w';}
                elseif($v==24){echo 'x';}
                elseif($v==25){echo 'y';}
                elseif($v==26){echo 'z';}
                ?>
              </div>
            </div>

            <div class="col-1-40-table">
              Nomor Akte : <?=$row_perubahan['nomer_akte'];?>
            </div>

            <div class="col-1-5-table">
              <div class="center">

              </div>
            </div>

            <div class="col-1-5-table">
            <div class="center">

            </div>

            </div>
            <div class="col-1-40-table">

            </div>
        </div>
        <div class="row">

            <div class="col-1-5-table">
              <div class="center">

              </div>
            </div>

            <div class="col-1-40-table">
              Tanggal Akte : <?=$row_perubahan['tgl_akte'];?>
            </div>

            <div class="col-1-5-table">
              <div class="center">

              </div>
            </div>

            <div class="col-1-5-table">
            <div class="center">

            </div>

            </div>
            <div class="col-1-40-table">


            </div>
        </div>
        <div class="row">

            <div class="col-1-5-table">
              <div class="center">

              </div>
            </div>

            <div class="col-1-40-table">
              Notaris : <?=$row_perubahan['nama_notaris'];?>
            </div>

            <div class="col-1-5-table">
              <div class="center">

              </div>
            </div>

            <div class="col-1-5-table">
            <div class="center">

            </div>

            </div>
            <div class="col-1-40-table">


            </div>
        </div>
        <div class="row">

            <div class="col-1-5-table">
              <div class="center">

              </div>
            </div>

            <div class="col-1-40-table">
              Perubahan Tentang : <?=$row_perubahan['perubahan'];?>
            </div>

            <div class="col-1-5-table">
              <div class="center">

              </div>
            </div>

            <div class="col-1-5-table">
            <div class="center">

            </div>

            </div>
            <div class="col-1-40-table">


            </div>
        </div>
        <div class="row">

            <div class="col-1-5-table">
              <div class="center">

              </div>
            </div>

            <div class="col-1-40-table">
              Modal Dasar : <?=$row_perubahan['modal_dasar'];?>
            </div>

            <div class="col-1-5-table">
              <div class="center">

              </div>
            </div>

            <div class="col-1-5-table">
            <div class="center">

            </div>

            </div>
            <div class="col-1-40-table">


            </div>
        </div>
      <?php endforeach ;?>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">
              11.
            </div>
          </div>

          <div class="col-1-40-table">
            Surat Penerimaan pemberitahuan perubahan data perseroan (pemberitahuan)
          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">
              12.
            </div>
          </div>

          <div class="col-1-40-table">
            NIB : <?= decrypt_url($nib_dec) ;?>
          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">
              13.
            </div>
          </div>

          <div class="col-1-40-table">
            NPWP : <?= $biodata[0]['npwp'] ;?>
          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">
              14.
            </div>
          </div>

          <div class="col-1-40-table">
            <div class="center">
              DATA PENGURUS
            </div>
          </div>

          <div class="col-1-5-table">
            <div class="center">
              <?php if($data_ceklis81=="1"){
                echo 'V';
              } ?>
            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">
            <?php if($data_ceklis81=="0"){
              echo 'V';
            } ?>
          </div>

          </div>
          <div class="col-1-40-table">
            <?=$data_comment81;?>

          </div>
      </div>
      <?php $v=0; ?>
      <?php foreach($pengurus as $row_pengurus): ?>
        <?php $v+=1; ?>
      <div class="row">

          <div class="col-1-5-table">
            <?php if($v==1){echo 'a';}
            elseif($v==2){echo 'b';}
            elseif($v==3){echo 'c';}
            elseif($v==4){echo 'd';}
            elseif($v==5){echo 'e';}
            elseif($v==6){echo 'f';}
            elseif($v==7){echo 'g';}
            elseif($v==8){echo 'h';}
            elseif($v==9){echo 'i';}
            elseif($v==10){echo 'j';}
            elseif($v==11){echo 'k';}
            elseif($v==12){echo 'l';}
            elseif($v==13){echo 'm';}
            elseif($v==14){echo 'n';}
            elseif($v==15){echo 'o';}
            elseif($v==16){echo 'p';}
            elseif($v==17){echo 'q';}
            elseif($v==18){echo 'r';}
            elseif($v==19){echo 's';}
            elseif($v==20){echo 't';}
            elseif($v==21){echo 'u';}
            elseif($v==22){echo 'v';}
            elseif($v==23){echo 'w';}
            elseif($v==24){echo 'x';}
            elseif($v==25){echo 'y';}
            elseif($v==26){echo 'z';}
            ?>
          </div>

          <div class="col-1-40-table">
            <?= $row_pengurus['id_jabatan']; ?>
          </div>
          <div class="col-1-5-table">
            <div class="center">

          </div>
          </div>


          <div class="col-1-5-table">
            <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">

          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">

          </div>

          <div class="col-1-40-table">
            Nama : <?= $row_pengurus['nama']; ?>
          </div>
          <div class="col-1-5-table">
            <div class="center">

          </div>
          </div>


          <div class="col-1-5-table">
            <div class="center">


          </div>

          </div>
          <div class="col-1-40-table">

          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">

          </div>

          <div class="col-1-40-table">
            Rekaman KTP/Kitas/Pasport : <?= $row_pengurus['no_ktp']; ?>
          </div>
          <div class="col-1-5-table">
            <div class="center">
          </div>
          </div>


          <div class="col-1-5-table">
            <div class="center">
          </div>

          </div>
          <div class="col-1-40-table">

          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">

          </div>

          <div class="col-1-40-table">
            Rekaman NPWP : <?= $row_pengurus['no_ktp']; ?>
          </div>
          <div class="col-1-5-table">
            <div class="center">
          </div>
          </div>


          <div class="col-1-5-table">
            <div class="center">
          </div>

          </div>
          <div class="col-1-15-table">

          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">

          </div>

          <div class="col-1-40-table">
            PJBU : <?php if($row_pengurus['pjbu']=='1'){echo "PJBU";}else{echo "";} ; ?>
          </div>
          <div class="col-1-5-table">
            <div class="center">
          </div>
          </div>


          <div class="col-1-5-table">
            <div class="center">
          </div>

          </div>
          <div class="col-1-40-table">

          </div>
      </div>

    <?php endforeach; ?>
    <div class="row">

        <div class="col-1-5-table">
          <div class="center">
            15.
          </div>
        </div>

        <div class="col-1-40-table">
          <div class="center">
            DATA TENAGA KERJA
          </div>
        </div>

        <div class="col-1-5-table">
          <div class="center">
            <?php if($data_ceklis88=="1"){
              echo 'V';
            } ?>
          </div>
        </div>

        <div class="col-1-5-table">
        <div class="center">
          <?php if($data_ceklis88=="0"){
            echo 'V';
          } ?>
        </div>

        </div>
        <div class="col-1-40-table">
          <?=$data_comment88;?>

        </div>
    </div>
    <div class="row">

        <div class="col-1-5-table">
          <div class="center">

          </div>
        </div>

        <div class="col-1-40-table">

            File Surat Pernyataan bukan pegawai negri sipil, Bukan TNI atau Kepolisian RI

        </div>

        <div class="col-1-5-table">
          <div class="center">
            <?php if($data_ceklis28=="1"){
              echo 'V';
            } ?>
          </div>
        </div>

        <div class="col-1-5-table">
        <div class="center">
          <?php if($data_ceklis28=="0"){
            echo 'V';
          } ?>
        </div>

        </div>
        <div class="col-1-40-table">
          <?=$data_comment28;?>

        </div>
    </div>
    <div class="row">

        <div class="col-1-5-table">
          <div class="center">

          </div>
        </div>

        <div class="col-1-40-table">

            File Rekaman SKK (Sertifikat Kompetensi Kerja

        </div>

        <div class="col-1-5-table">
          <div class="center">
            <?php if($data_ceklis23=="1"){
              echo 'V';
            } ?>
          </div>
        </div>

        <div class="col-1-5-table">
        <div class="center">
          <?php if($data_ceklis23=="0"){
            echo 'V';
          } ?>
        </div>

        </div>
        <div class="col-1-40-table">
          <?=$data_comment23;?>

        </div>
    </div>
    <?php $v=0 ;?>
    <?php foreach($tenaga_kerja as $row_tk) :?>
      <?php $v+=1; ?>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">
              <?php if($v==1){echo 'a';}
              elseif($v==2){echo 'b';}
              elseif($v==3){echo 'c';}
              elseif($v==4){echo 'd';}
              elseif($v==5){echo 'e';}
              elseif($v==6){echo 'f';}
              elseif($v==7){echo 'g';}
              elseif($v==8){echo 'h';}
              elseif($v==9){echo 'i';}
              elseif($v==10){echo 'j';}
              elseif($v==11){echo 'k';}
              elseif($v==12){echo 'l';}
              elseif($v==13){echo 'm';}
              elseif($v==14){echo 'n';}
              elseif($v==15){echo 'o';}
              elseif($v==16){echo 'p';}
              elseif($v==17){echo 'q';}
              elseif($v==18){echo 'r';}
              elseif($v==19){echo 's';}
              elseif($v==20){echo 't';}
              elseif($v==21){echo 'u';}
              elseif($v==22){echo 'v';}
              elseif($v==23){echo 'w';}
              elseif($v==24){echo 'x';}
              elseif($v==25){echo 'y';}
              elseif($v==26){echo 'z';}
              ?>
            </div>
          </div>

          <div class="col-1-40-table">

              <?php if($row_tk['pjt']=='1'){
                echo " - Penangung Jawab Teknik Badan Usaha (PJTBU) - ";
              } ;?>
              <?php if($row_tk['pjk']=='1'){
                echo " - Penanggungjawab Klasifikasi Badan Usaha (PJKBU) - ";
              } ;?>
              <?php if($row_tk['pjsk']=='1'){
                echo " - Penanggungjawab Subklasifikasi Badan Usaha (PJSKBU) - ";
              } ;?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">

              Nama : <?=$row_tk['nama'] ;?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">

              No. Registrasi SKK   : <?= $row_tk['noreg'] ;?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">

              Kualifikasi SKK   : <?= $row_tk['id_kualifikasi'] ;?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">

              Klasifikasi SKK     : <?= $row_tk['id_bidang'] ;?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">

              SubKlasifikasi SKK     : <?= $row_tk['id_sub_bidang'] ;?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
    <?php endforeach;?>
    <div class="row">

        <div class="col-1-5-table">
          <div class="center">
            16.
          </div>
        </div>

        <div class="col-1-40-table">
          <div class="center">
              DATA KEUANGAN PEMEGANG SAHAM
          </div>
        </div>

        <div class="col-1-5-table">
          <div class="center">
            <?php if($data_ceklis86=="1"){
              echo 'V';
            } ?>
          </div>
        </div>

        <div class="col-1-5-table">
        <div class="center">
          <?php if($data_ceklis86=="0"){
            echo 'V';
          } ?>
        </div>

        </div>
        <div class="col-1-40-table">
          <?=$data_comment86 ;?>

        </div>
    </div>
    <div class="row">

        <div class="col-1-5-table">
          <div class="center">

          </div>
        </div>

        <div class="col-1-40-table">

              File Persyaratan Pemegang Saham

        </div>

        <div class="col-1-5-table">
          <div class="center">
            <?php if($data_ceklis41=="1"){
              echo 'V';
            } ?>
          </div>
        </div>

        <div class="col-1-5-table">
        <div class="center">
          <?php if($data_ceklis41=="0"){
            echo 'V';
          } ?>
        </div>

        </div>
        <div class="col-1-40-table">
          <?=$data_comment41 ;?>

        </div>
    </div>
    <?php $v=0 ;?>
    <?php foreach($pemegang_saham as $row_saham) :?>
      <?php $v+=1; ?>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">
              <?php if($v==1){echo 'a';}
              elseif($v==2){echo 'b';}
              elseif($v==3){echo 'c';}
              elseif($v==4){echo 'd';}
              elseif($v==5){echo 'e';}
              elseif($v==6){echo 'f';}
              elseif($v==7){echo 'g';}
              elseif($v==8){echo 'h';}
              elseif($v==9){echo 'i';}
              elseif($v==10){echo 'j';}
              elseif($v==11){echo 'k';}
              elseif($v==12){echo 'l';}
              elseif($v==13){echo 'm';}
              elseif($v==14){echo 'n';}
              elseif($v==15){echo 'o';}
              elseif($v==16){echo 'p';}
              elseif($v==17){echo 'q';}
              elseif($v==18){echo 'r';}
              elseif($v==19){echo 's';}
              elseif($v==20){echo 't';}
              elseif($v==21){echo 'u';}
              elseif($v==22){echo 'v';}
              elseif($v==23){echo 'w';}
              elseif($v==24){echo 'x';}
              elseif($v==25){echo 'y';}
              elseif($v==26){echo 'z';}
              ?>
            </div>
          </div>

          <div class="col-1-40-table">
            Nama : <?= $row_saham['nama_pemilik']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Jumlah lembar saham : <?= $row_saham['jumlah_lembar']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Nilai per lembaar saham : <?= $row_saham['nilai_perlembar']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Nilai total saham : <?= $row_saham['nilai_perlembar']*$row_saham['jumlah_lembar']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Persentase kepemilikan saham :

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
    <?php endforeach ;?>
    <div class="row">

        <div class="col-1-5-table">
          <div class="center">
            17.
          </div>
        </div>

        <div class="col-1-40-table">
          <div class="center">
              DATA KEUANGAN NERACA
          </div>
        </div>

        <div class="col-1-5-table">
          <div class="center">
            <?php if($data_ceklis87=="1"){
              echo 'V';
            } ?>
          </div>
        </div>

        <div class="col-1-5-table">
        <div class="center">
          <?php if($data_ceklis87=="0"){
            echo 'V';
          } ?>
        </div>

        </div>
        <div class="col-1-40-table">
          <?=$data_comment87 ;?>

        </div>
    </div>
    <div class="row">

        <div class="col-1-5-table">
          <div class="center">

          </div>
        </div>

        <div class="col-1-40-table">
          File Laporan Badan Usaha 2 tahun terakhir (Audit KAP)

        </div>

        <div class="col-1-5-table">
          <div class="center">
            <?php if($data_ceklis57=="1"){
              echo 'V';
            } ?>
          </div>
        </div>

        <div class="col-1-5-table">
        <div class="center">
          <?php if($data_ceklis57=="0"){
            echo 'V';
          } ?>
        </div>

        </div>
        <div class="col-1-40-table">
          <?=$data_comment57 ;?>

        </div>
    </div>
    <?php $v=0 ;?>
    <?php foreach ($neraca as $row_neraca):?>
      <?php $v+=1 ;?>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">
              <?php if($v==1){echo 'a';}
              elseif($v==2){echo 'b';}
              elseif($v==3){echo 'c';}
              elseif($v==4){echo 'd';}
              elseif($v==5){echo 'e';}
              elseif($v==6){echo 'f';}
              elseif($v==7){echo 'g';}
              elseif($v==8){echo 'h';}
              elseif($v==9){echo 'i';}
              elseif($v==10){echo 'j';}
              elseif($v==11){echo 'k';}
              elseif($v==12){echo 'l';}
              elseif($v==13){echo 'm';}
              elseif($v==14){echo 'n';}
              elseif($v==15){echo 'o';}
              elseif($v==16){echo 'p';}
              elseif($v==17){echo 'q';}
              elseif($v==18){echo 'r';}
              elseif($v==19){echo 's';}
              elseif($v==20){echo 't';}
              elseif($v==21){echo 'u';}
              elseif($v==22){echo 'v';}
              elseif($v==23){echo 'w';}
              elseif($v==24){echo 'x';}
              elseif($v==25){echo 'y';}
              elseif($v==26){echo 'z';}
              ?>
            </div>
          </div>

          <div class="col-1-40-table">
            Tahun : <?= $row_neraca['Tahun']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Opini : <?= $row_neraca['opini_kap']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Aktiva Lancar : <?= $row_neraca['aktiva_lancar']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Aktiva Tetap : <?= $row_neraca['aktiva_tetap']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Kewajiban lancar : <?= $row_neraca['kewajiban_lancar']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Kewajiban tidak lancar : <?= $row_neraca['kewajiban_tidak_lancar']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Ekuitas : <?= $row_neraca['ekuitas']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Modal Dasar : <?= $row_neraca['modal_dasar']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Modal Disetor : <?= $row_neraca['modal_disetor']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Laporan Arus Kas : <?= $row_neraca['laporan_arus_kas']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Laporan Laba Rugi : <?= $row_neraca['laporan_labar_rugi']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Laporan Perubahan Ekuitas : <?= $row_neraca['laporan_perubahan_ekuitas']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Catatan Atas Laporan Keuangan : <?= $row_neraca['catatan_laporan_keuangan']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
    <?php endforeach ;?>
    <div class="row">

        <div class="col-1-5-table">
          <div class="center">
            18.
          </div>
        </div>

        <div class="col-1-40-table">
          <div class="center">
            PEKERJAAN YANG TELAH DILAKSANAKAN
          </div>
        </div>

        <div class="col-1-5-table">
          <div class="center">
            <?php if($data_ceklis82=="1"){
              echo 'V';
            } ?>
          </div>
        </div>

        <div class="col-1-5-table">
        <div class="center">
          <?php if($data_ceklis82=="0"){
            echo 'V';
          } ?>
        </div>

        </div>
        <div class="col-1-40-table">
          <?= $data_comment82 ;?>

        </div>
    </div>
    <?php $v=0 ;?>
    <?php foreach ($pengalaman as $row_pengalaman):?>
      <?php $v+=1 ;?>

      <div class="row">

          <div class="col-1-5-table">
            <div class="center">
              <?php if($v==1){echo 'a';}
              elseif($v==2){echo 'b';}
              elseif($v==3){echo 'c';}
              elseif($v==4){echo 'd';}
              elseif($v==5){echo 'e';}
              elseif($v==6){echo 'f';}
              elseif($v==7){echo 'g';}
              elseif($v==8){echo 'h';}
              elseif($v==9){echo 'i';}
              elseif($v==10){echo 'j';}
              elseif($v==11){echo 'k';}
              elseif($v==12){echo 'l';}
              elseif($v==13){echo 'm';}
              elseif($v==14){echo 'n';}
              elseif($v==15){echo 'o';}
              elseif($v==16){echo 'p';}
              elseif($v==17){echo 'q';}
              elseif($v==18){echo 'r';}
              elseif($v==19){echo 's';}
              elseif($v==20){echo 't';}
              elseif($v==21){echo 'u';}
              elseif($v==22){echo 'v';}
              elseif($v==23){echo 'w';}
              elseif($v==24){echo 'x';}
              elseif($v==25){echo 'y';}
              elseif($v==26){echo 'z';}
              ?>
            </div>
          </div>

          <div class="col-1-40-table">
            Nomor kontrak : <?= $row_pengalaman['nomor_kontrak']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Nama Paket Pekerjaan  : <?= $row_pengalaman['nama_pengalaman']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Tanggal Kontrak   : <?= $row_pengalaman['tgl_kontrak']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Lokasi Pekerjaan   : <?= $row_pengalaman['id_propinsi']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Pemberi Kerja : <?= $row_pengalaman['pemberi_tugas']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Nilai Kontrak : <?= $row_pengalaman['nilai_kontrak']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Mulai Pekerjaan : <?= $row_pengalaman['tgl_mulai']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Waktu Selesai Pekerjaan : <?= $row_pengalaman['tgl_selesai']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Cara pembayaran : <?= $row_pengalaman['id_sumber_dana']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            No. Addendum Kontrak : <?= $row_pengalaman['no_addendum_kontrak']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Tanggak Addendum Kontrak : <?= $row_pengalaman['tgl_addendum_kontrak']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Nilai Kontrak Addendum : <?= $row_pengalaman['nilai_addendum_kontrak']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Cidera janji, keterlambatan : <?= $row_pengalaman['cidera_janji']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Penyelesaian perselisihan : <?= $row_pengalaman['perselisihan']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Rencana Anggaran Biaya : <?= $row_pengalaman['anggaran_biaya']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Partner KSO/JO : <?= $row_pengalaman['partner']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Nama subkontrak : <?= $row_pengalaman['nama_sub_kontrak']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Nilai Kontrak : <?= $row_pengalaman['nilai_sub_kontrak']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Nomor PHO/BAST Pekerjaan  : <?= $row_pengalaman['nomor_pho']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Tanggal Serah Terima PHO : <?= $row_pengalaman['tgl_pho']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Nomor FHO/BAST Pekerjaan : <?= $row_pengalaman['nomor_fho']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Tanggal Serah Terima FHO : <?= $row_pengalaman['tgl_fho']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
    <?php endforeach ;?>
    <div class="row">

        <div class="col-1-5-table">
          <div class="center">
            19.
          </div>
        </div>

        <div class="col-1-40-table">
          <div class="center">
            DATA PERALATAN UTAMA BADAN USAHA
          </div>
        </div>

        <div class="col-1-5-table">
          <div class="center">
            <?php if($data_ceklis89=="1"){
              echo 'V';
            } ?>
          </div>
        </div>

        <div class="col-1-5-table">
        <div class="center">
          <?php if($data_ceklis89=="0"){
            echo 'V';
          } ?>
        </div>

        </div>
        <div class="col-1-40-table">
          <?= $data_comment89 ;?>

        </div>
    </div>
    <div class="row">

        <div class="col-1-5-table">
          <div class="center">

          </div>
        </div>

        <div class="col-1-40-table">
          Surat kepemilikan atau pernyataan kepemilikan

        </div>

        <div class="col-1-5-table">
          <div class="center">
            <?php if($data_ceklis58=="1"){
              echo 'V';
            } ?>
          </div>
        </div>

        <div class="col-1-5-table">
        <div class="center">
          <?php if($data_ceklis58=="1"){
            echo 'V';
          } ?>
        </div>

        </div>
        <div class="col-1-40-table">
          <?= $data_comment58 ;?>

        </div>
    </div>
    <?php $v=0; ?>
    <?php foreach($peralatan as $row_peralatan) :?>
      <?php $v+=1; ?>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">
              <?php if($v==1){echo 'a';}
              elseif($v==2){echo 'b';}
              elseif($v==3){echo 'c';}
              elseif($v==4){echo 'd';}
              elseif($v==5){echo 'e';}
              elseif($v==6){echo 'f';}
              elseif($v==7){echo 'g';}
              elseif($v==8){echo 'h';}
              elseif($v==9){echo 'i';}
              elseif($v==10){echo 'j';}
              elseif($v==11){echo 'k';}
              elseif($v==12){echo 'l';}
              elseif($v==13){echo 'm';}
              elseif($v==14){echo 'n';}
              elseif($v==15){echo 'o';}
              elseif($v==16){echo 'p';}
              elseif($v==17){echo 'q';}
              elseif($v==18){echo 'r';}
              elseif($v==19){echo 's';}
              elseif($v==20){echo 't';}
              elseif($v==21){echo 'u';}
              elseif($v==22){echo 'v';}
              elseif($v==23){echo 'w';}
              elseif($v==24){echo 'x';}
              elseif($v==25){echo 'y';}
              elseif($v==26){echo 'z';}
              ?>
            </div>
          </div>

          <div class="col-1-40-table">
            Jenis/Macam/Peratan Utama   : <?= $row_peralatan['jenis_peralatan']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Tipe Peralatan : <?= $row_peralatan['tipe_peralatan']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Jumlah unit : <?= $row_peralatan['kapasitas']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Tahun Pembuatan : <?= $row_peralatan['tahun_pembuatan']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Keadaan (baik / rusak) atau di setarakan dengan (%)  : <?= $row_peralatan['kondisi']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Taksiran Harga Sekarang  (1000 x Rp.)  : <?= $row_peralatan['harga']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-40-table">
            Lokasi sekarang  (Provinsi)   : <?= $row_peralatan['propinsi']; ?>

          </div>

          <div class="col-1-5-table">
            <div class="center">

            </div>
          </div>

          <div class="col-1-5-table">
          <div class="center">

          </div>

          </div>
          <div class="col-1-40-table">


          </div>
      </div>
    <?php endforeach ;?>
    </section>
    <section class="items">
      <div class="row">
        <div class="col-1-30">
          <div class="center">
            Pemeriksa Kelengkapan
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
