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
<body>
  <section class="items">

      <!-- your favorite templating/data-binding library would come in handy here to generate these rows dynamically !-->
      <div class="row">
        <div class="col-1-20 ">
          <div class="logo">
          <?php
                  $path = base_url('assets/media/logos/Logo_gapeknas.png');
                  $type = pathinfo($path, PATHINFO_EXTENSION);
                  $ch = curl_init();

                    curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
                    curl_setopt($ch, CURLOPT_HEADER, 0);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                    curl_setopt($ch, CURLOPT_URL, $path);
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);       

                    $data = curl_exec($ch);
                    
                  $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                   ;?>
              <img src="<?=$base64 ;?>" style="margin-top:10px;border: 1px; max-height: 190px; max-width: 120px; ">

          </div>
        </div>
        <div class="col-1-50 ">
          <div class="kop_surat">
            <b style="font-size:30px;">PT LSBU GAPEKNAS INFRASTRUKTUR</b><br>
            Ruko Graha Mas Pemuda Blok AD No. 21 Jl. Pemuda, Rawamangun, Jakarta Timur<br>
            Telp: (021) 4711 796, Fax: (021) 4711 860.  <br>
Email pt.lsbugapeknas21@gmail.com  </div>
        </div>
        <div class="col-1-20 ">
        <?php
                  $path = base_url('assets/media/logos/Logo_kan.png');
                  $type = pathinfo($path, PATHINFO_EXTENSION);
                  $ch = curl_init();

                    curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
                    curl_setopt($ch, CURLOPT_HEADER, 0);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                    curl_setopt($ch, CURLOPT_URL, $path);
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);       

                    $data = curl_exec($ch);
                    
                  $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                   ;?>


              <img src="<?=$base64 ;?>" style="margin-top:10px;border: 1px; max-height: 190px; max-width: 110px; ">

        </div>

      </div>

  </section>
  <br>
  <br>
  <hr>
  <div class="center">
    HASIL CEK KELENGKAPAN, VERIFIKASI DAN VALIDASI DOKUMEN BADAN USAHA
    <br>
    PEKERJAAN KONSTRUKSI

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
      ${"data_ceklis".$row_ceklis['id']."_2"}=$row_ceklis['ceklis_2'];

      ${"data_comment".$row_ceklis['id']}=$row_ceklis['comment'];
      ${"data_deksripsi".$row_ceklis['id']}=$row_ceklis['Deskripsi'];
    }
  }
} ;?>


<section class="items">
    <div class="row">
        <div class="col-1-10">
          Nama Badan Usaha
        </div>
        <div class="col-1-10">
          : <b><?= $biodata[0]['nama'] ;?></b>
        </div>

    </div>
    <div class="row">
        <div class="col-1-10">
          Alamat
        </div>
        <div class="col-1-10">
          : <b><?= $biodata[0]['alamat_bu'] ;?></b>
        </div>

    </div>
    <div class="row">
        <div class="col-1-10">
          Telepon
        </div>
        <div class="col-1-10">
          : <b><?= $biodata[0]['telepon'] ;?></b>
        </div>

    </div>
    <div class="row">
        <div class="col-1-10">
          Propinsi
        </div>
        <div class="col-1-10">
          : <b><?= $biodata[0]['id_propinsi'] ;?></b>
        </div>

    </div>
    <div class="row">
        <div class="col-1-10">
          No. Registrasi Kualifikasi
        </div>
        <div class="col-1-10">
          : <b>-</b>
        </div>

    </div>
    <div class="row">
        <div class="col-1-10">
          Tanggal Permohonan
        </div>
        <div class="col-1-10">
          : <b><?php echo $tgl ;?></b>
        </div>

    </div>
    <div class="row">
        <div class="col-1-10">
          Proses
        </div>
        <div class="col-1-10">
          : <b>Baru</b>
        </div>

    </div>
    <div class="row">
        <div class="col-1-10">
          Sifat Usaha
        </div>
        <div class="col-1-10">
          : <b></b>
        </div>

    </div>




</section>


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
          Kelengkapan
        </div>
      </div>
      <div class="col-1-5">
        <div class="center">
         
        </div>
      </div>
      <div class="col-1-5">
        <div class="center">
          Verifikasi
        </div>
      </div>
      <div class="col-1-5">
        <div class="center">
          
        </div>
      </div>
      <div class="col-1-5">
        <div class="center">
          Validasi
        </div>
      </div>
      <div class="col-1-5">
        <div class="center">
          
        </div>
      </div>

      <div class="col-1-40">
        <div class="center">
         
        </div>
      </div>



  </div>
  <div class="row">
    <div class="col-1-5-table">
      <div class="center">
        No
      </div>
    </div>

      <div class="col-1-40-table">
        <div class="center">
          Data
        </div>
      </div>
      <div class="col-1-5-table">
        <div class="center">
          Ada
        </div>
      </div>
      <div class="col-1-5-table">
        <div class="center">
          Tidak Ada
        </div>
      </div>
      <div class="col-1-5-table">
        <div class="center">
          Ada
        </div>
      </div>
      <div class="col-1-5-table">
        <div class="center">
          Tidak Ada
        </div>
      </div>
      <div class="col-1-5-table">
        <div class="center">
          Valid
        </div>
      </div>
      <div class="col-1-5-table">
        <div class="center">
          Tidak Valid
        </div>
      </div>

      <div class="col-1-40-table">
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


      <div class="col-1-5-table">
        <div class="center">
          <?php if($data_ceklis80_2=="1"){
            echo 'V';
          } ?>


      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
          <?php if($data_ceklis80_2=="0"){
            echo 'V';
          } ?>


      </div>

      </div>
      <div class="col-1-40-table">
      Lamp. PP No. 05 Thn. 2021
      dan Lamp 1A Permen PUPR No. 6 Thn 2021 <?= $data_comment80 ;?>

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
          V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">
      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>
      <div class="col-1-5-table">
      <div class="center">
      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
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
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">
        
      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">
      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
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
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">
      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">
      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
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
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">
      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">
      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
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
        Bentuk Usaha : <?= $biodata[0]['bentuk_usaha'] ;?>
      </div>

      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">
      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>
      <div class="col-1-5-table">
        <div class="center">
          
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">
      V
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
        Jenis Usaha : <?= $biodata[0]['jenis_usaha'] ;?>
      </div>

      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">
      
      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>
      <div class="col-1-5-table">
        <div class="center">
        
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">
      V
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
        Surat Pernyataan Tanggung Jawab Mutlak
      </div>

      <div class="col-1-5-table">
        <div class="center">
          <?php if($data_ceklis23=="1"){
            echo 'V';
          }?>
        </div>
      </div>
      <div class="col-1-5-table">
        <div class="center">
          <?php if($data_ceklis23=="0"){
            echo 'V';
          }?>
        </div>
      </div>
      <div class="col-1-5-table">
        <div class="center">
          <?php if($data_ceklis23=="1"){
            echo 'V';
          }?>
        </div>
      </div>
      <div class="col-1-5-table">
        <div class="center">
          <?php if($data_ceklis23=="0"){
            echo 'V';
          }?>
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis23_2=="1"){
          echo 'V';
        } ?>
      </div>

      </div>
      <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis23_2=="0"){
          echo 'V';
        }?>
      </div>

      </div>
      <div class="col-1-40-table">
        <?= $data_comment23;?>

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


      <div class="col-1-5-table">
        <div class="center">
          <?php if($data_ceklis90_2=="1"){
            echo 'V';
          } ?>


      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
          <?php if($data_ceklis90_2=="0"){
            echo 'V';
          } ?>


      </div>

      </div>
      <div class="col-1-40-table">
        <?= $data_comment90 ;?>

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
V
          </div>
        </div>

        <div class="col-1-5-table">
        <div class="center">

        </div>

        </div>
        <div class="col-1-5-table">
          <div class="center">
          V
          </div>
        </div>

        <div class="col-1-5-table">
        <div class="center">

        </div>

        </div>
        <div class="col-1-5-table">
          <div class="center">
          V
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
          V
          </div>
        </div>

        <div class="col-1-5-table">
        <div class="center">

        </div>

        </div>
        <div class="col-1-5-table">
          <div class="center">
          V
          </div>
        </div>

        <div class="col-1-5-table">
        <div class="center">

        </div>

        </div>
        <div class="col-1-5-table">
          <div class="center">
          V
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
          V
          </div>
        </div>

        <div class="col-1-5-table">
        <div class="center">

        </div>

        </div>
        <div class="col-1-5-table">
          <div class="center">
          V
          </div>
        </div>

        <div class="col-1-5-table">
        <div class="center">

        </div>

        </div>
        <div class="col-1-5-table">
          <div class="center">
          V
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
          Nomor KBLI : <?= $row_klasifikasi['nomor_kbli'] ;?>
        </div>

        <div class="col-1-5-table">
          <div class="center">
          V
          </div>
        </div>

        <div class="col-1-5-table">
        <div class="center">

        </div>

        </div>
        <div class="col-1-5-table">
          <div class="center">
          V
          </div>
        </div>

        <div class="col-1-5-table">
        <div class="center">

        </div>

        </div>
        <div class="col-1-5-table">
          <div class="center">
          V
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
          Sifat : <?= $row_klasifikasi['sifat_badanusaha'] ;?>
        </div>

        <div class="col-1-5-table">
          <div class="center">
          V
          </div>
        </div>

        <div class="col-1-5-table">
        <div class="center">

        </div>

        </div>
        <div class="col-1-5-table">
          <div class="center">
          V
          </div>
        </div>

        <div class="col-1-5-table">
        <div class="center">

        </div>

        </div>
        <div class="col-1-5-table">
          <div class="center">
          V
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
        AKTE NOTARIS BADAN USAHA
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

      <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis83_2=="1"){
          echo 'V';
        } ?>
      </div>

      </div>
      <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis83_2=="0"){
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
        File SK Kumham
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

      <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis11_2=="1"){
          echo 'V';
        } ?>
      </div>

      </div>
      <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis11_2=="0"){
          echo 'V';
        } ?>
      </div>

      </div>
      <div class="col-1-40-table">


      </div>
  </div>
  <?php $v=0 ;?>
  <?php foreach($akte as $row_akte) :?>
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
        Nomor : <?= $row_akte['no'] ;?>
      </div>

      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
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
        Jenis Akte : <?= $row_akte['jenis'] ;?>
      </div>

      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
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
        No SK Kumham : <?=$row_akte['no_sk_kumham'];?>
      </div>

      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
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
        Tanggal Akte : <?= $row_akte['tgl_akte'] ;?>
      </div>

      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>
      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">
      V
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
        Notaris : <?= $row_akte['nama_notaris'] ;?>
      </div>

      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
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
        Maksud Tujuan : <?= $row_akte['maksudtujuan'] ;?>
      </div>

      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>
      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">
      V
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
        Modal Dasar : <?= $row_akte['modaldasar'] ;?>
      </div>

      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>
      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">
      V
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
        Modal Disetor : <?= $row_akte['modalsetor'] ;?>
      </div>

      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>
      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">
      V
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
          10.
        </div>
      </div>

      <div class="col-1-40-table">
        NPWP : <?= $biodata[0]['npwp'] ;?>
      </div>

      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>
      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">
      V
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
          11.
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

      <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis81_2=="1"){
          echo 'V';
        } ?>
      </div>

      </div>
      <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis81_2=="0"){
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
        <?= $row_pengurus['jabatan_bu']; ?>
      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
      </div>
      </div>


      <div class="col-1-5-table">
        <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
      </div>
      </div>


      <div class="col-1-5-table">
        <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
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
        V
      </div>
      </div>


      <div class="col-1-5-table">
        <div class="center">


      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
      </div>
      </div>
      <div class="col-1-5-table">
        <div class="center">


      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
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
        V
      </div>
      </div>


      <div class="col-1-5-table">
        <div class="center">
          
      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
      </div>
      </div>
      <div class="col-1-5-table">
        <div class="center">


      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
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
        Rekaman NPWP : <?= $row_pengurus['npwp']; ?>
      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
      </div>
      </div>


      <div class="col-1-5-table">
        <div class="center">
      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">

      </div>
      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
      </div>
      </div>


      <div class="col-1-5-table">
        <div class="center">

      </div>

      </div>
      <div class="col-1-15-table">

      </div>
  </div>


<?php endforeach; ?>
<div class="row">

    <div class="col-1-5-table">
      <div class="center">
        12.
      </div>
    </div>

    <div class="col-1-40-table">
      <div class="center">
        PJBU
      </div>
    </div>

    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis85=="1"){
          echo 'V';
        } ?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis85=="0"){
          echo 'V';
        } ?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis85=="1"){
          echo 'V';
        } ?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis85=="0"){
          echo 'V';
        } ?>
      </div>
    </div>

    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis85_2=="1"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis85_2=="0"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-40-table">
    Permen 6 tahun 2021 dan Permen No. 8
    Tahun 2022 <?=$data_comment85;?>

    </div>
</div>
<div class="row">

    <div class="col-1-5-table">
      <div class="center">

      </div>
    </div>

    <div class="col-1-40-table">

        File Foto

    </div>

    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis20=="1"){
          echo 'V';
        } ?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis20=="0"){
          echo 'V';
        } ?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis20=="1"){
          echo 'V';
        } ?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis20=="0"){
          echo 'V';
        } ?>
      </div>
    </div>

    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis20_2=="1"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis20_2=="0"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-40-table">
      <?=$data_comment20;?>

    </div>
</div>
<div class="row">

    <div class="col-1-5-table">
      <div class="center">

      </div>
    </div>

    <div class="col-1-40-table">

        Nama : <?= $pjbu[0]['nama'] ;?>

    </div>

    <div class="col-1-5-table">
      <div class="center">
      V
      </div>
    </div>

    <div class="col-1-5-table">
    <div class="center">

    </div>

    </div>
    <div class="col-1-5-table">
      <div class="center">
      V
      </div>
    </div>

    <div class="col-1-5-table">
    <div class="center">

    </div>

    </div>
    <div class="col-1-5-table">
      <div class="center">
      V
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

        Jabatan : <?= $pjbu[0]['jabatan'] ;?>

    </div>

    <div class="col-1-5-table">
      <div class="center">
      V
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">

      </div>
    </div>

    <div class="col-1-5-table">
    <div class="center">
    V
    </div>

    </div>

    <div class="col-1-5-table">
    <div class="center">

    </div>

    </div>
    <div class="col-1-5-table">
      <div class="center">
      V
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

        NIK : <?= $pjbu[0]['nik'] ;?>

    </div>

    <div class="col-1-5-table">
      <div class="center">
      V
      </div>
    </div>

    <div class="col-1-5-table">
    <div class="center">

    </div>

    </div>
    <div class="col-1-5-table">
      <div class="center">
      V
      </div>
    </div>

    <div class="col-1-5-table">
    <div class="center">

    </div>

    </div>
    <div class="col-1-5-table">
      <div class="center">
      V
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

        NPWP : <?= $pjbu[0]['npwp'] ;?>

    </div>

    <div class="col-1-5-table">
      <div class="center">
      V
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">

      </div>
    </div>

    <div class="col-1-5-table">
    <div class="center">
    V
    </div>

    </div>

    <div class="col-1-5-table">
    <div class="center">

    </div>

    </div>
    <div class="col-1-5-table">
      <div class="center">
      V
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

        Alamat : <?= $pjbu[0]['alamat'] ;?>

    </div>

    <div class="col-1-5-table">
      <div class="center">
      V
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">

      </div>
    </div>

    <div class="col-1-5-table">
    <div class="center">
    V
    </div>

    </div>

    <div class="col-1-5-table">
    <div class="center">

    </div>

    </div>
    <div class="col-1-5-table">
      <div class="center">
      V
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
      <div class="center">
        PJTBU
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

    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis88_2=="1"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis88_2=="0"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-40-table">
    Permen 6 tahun 2021 dan Permen No. 8
    Tahun 2022 <?=$data_comment88;?>

    </div>
</div>
<?php $v=0; ?>
<?php foreach($pjtbu as $row_pjtbu): ?>
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

        Nama : <?= $pjtbu[0]['nama'] ;?>

    </div>

    <div class="col-1-5-table">
      <div class="center">
      V
      </div>
    </div>

    <div class="col-1-5-table">
    <div class="center">

    </div>

    </div>
    <div class="col-1-5-table">
      <div class="center">
      V
      </div>
    </div>

    <div class="col-1-5-table">
    <div class="center">

    </div>

    </div>
    <div class="col-1-5-table">
      <div class="center">
      V
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

        Jenjang SKK : <?= $pjtbu[0]['jenjang_skk'] ;?>

    </div>

    <div class="col-1-5-table">
      <div class="center">
      V
      </div>
    </div>

    <div class="col-1-5-table">
    <div class="center">

    </div>

    </div>
    <div class="col-1-5-table">
      <div class="center">
      V
      </div>
    </div>

    <div class="col-1-5-table">
    <div class="center">

    </div>

    </div>
    <div class="col-1-5-table">
      <div class="center">
      V
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

        NIK : <?= $pjtbu[0]['nik'] ;?>

    </div>

    <div class="col-1-5-table">
      <div class="center">
      V
      </div>
    </div>

    <div class="col-1-5-table">
    <div class="center">

    </div>

    </div>
    <div class="col-1-5-table">
      <div class="center">
      V
      </div>
    </div>

    <div class="col-1-5-table">
    <div class="center">

    </div>

    </div>
    <div class="col-1-5-table">
      <div class="center">
      V
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

        Noreg SKK : <?= $pjtbu[0]['noreg_skk'] ;?>

    </div>

    <div class="col-1-5-table">
      <div class="center">
      V
      </div>
    </div>

    <div class="col-1-5-table">
    <div class="center">

    </div>

    </div>
    <div class="col-1-5-table">
      <div class="center">
      V
      </div>
    </div>

    <div class="col-1-5-table">
    <div class="center">

    </div>

    </div>
    <div class="col-1-5-table">
      <div class="center">
      V
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

        Sub Klasifikasi : <?= $pjtbu[0]['sub_klasifikasi'] ;?>

    </div>

    <div class="col-1-5-table">
      <div class="center">
      V
      </div>
    </div>

    <div class="col-1-5-table">
    <div class="center">

    </div>

    </div>
    <div class="col-1-5-table">
      <div class="center">
      V
      </div>
    </div>

    <div class="col-1-5-table">
    <div class="center">

    </div>

    </div>
    <div class="col-1-5-table">
      <div class="center">
      V
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

        Klasifikasi ACPE AA : <?= $row_pjtbu['klasifikasi_acpe_aa']; ?>

    </div>

    <div class="col-1-5-table">
      <div class="center">
      V
      </div>
    </div>

    <div class="col-1-5-table">
    <div class="center">

    </div>

    </div>
    <div class="col-1-5-table">
      <div class="center">
      V
      </div>
    </div>

    <div class="col-1-5-table">
    <div class="center">

    </div>

    </div>
    <div class="col-1-5-table">
      <div class="center">
      V
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

        Noreg ACPE AA : <?= $row_pjtbu['nomor_registrasi_acpe_aa']; ?>

    </div>

    <div class="col-1-5-table">
      <div class="center">
      V
      </div>
    </div>

    <div class="col-1-5-table">
    <div class="center">

    </div>

    </div>
    
    <div class="col-1-5-table">
      <div class="center">
      V
      </div>
    </div>

    <div class="col-1-5-table">
    <div class="center">

    </div>

    </div>
    <div class="col-1-5-table">
      <div class="center">
      V
      </div>
    </div>

    <div class="col-1-5-table">
    <div class="center">

    </div>

    </div>
    <div class="col-1-40-table">


    </div>
</div>
<?php endforeach ?>
<div class="row">

    <div class="col-1-5-table">
      <div class="center">
        14.
      </div>
    </div>

    <div class="col-1-40-table">
      <div class="center">
        PJSKBU
      </div>
    </div>

    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis77=="1"){
          echo 'V';
        } ?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis77=="0"){
          echo 'V';
        } ?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis77=="1"){
          echo 'V';
        } ?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis77=="0"){
          echo 'V';
        } ?>
      </div>
    </div>

    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis77_2=="1"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis77_2=="0"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-40-table">
    Permen 6 tahun 2021 dan Permen No. 8
    Tahun 2022 <?=$data_comment77;?>

    </div>
</div>
<?php $v=0 ;?>
<?php foreach($pjskbu as $row_pjskbu) :?>
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
        Nama : <?= $row_pjskbu['nama']; ?>


      </div>

      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
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

        Jenis Tenaga Kerja : <?= $row_pjskbu['jenis_tenaga']; ?>

      </div>

      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
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

        Jenjang : <?= $row_pjskbu['jenjang_skk']; ?>

      </div>

      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
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

        Klasifikasi : <?= $row_pjskbu['klasifikasi']; ?>

      </div>

      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
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

        Sub Klasifikasi : <?= $row_pjskbu['sub_klasifikasi']; ?>

      </div>

      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
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

        NIK : <?= $row_pjskbu['nik']; ?>

      </div>

      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
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

        Noreg SKK : <?= $row_pjskbu['noreg_skk']; ?>

      </div>

      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
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

        Klasifikasi ACPE AA : <?= $row_pjskbu['klasifikasi_acpe_aa']; ?>

      </div>

      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
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

        Noreg ACPE AA : <?= $row_pjskbu['nomor_registrasi_acpe_aa']; ?>

      </div>

      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
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

        NPWP : <?= $row_pjskbu['npwp']; ?>

      </div>

      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
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
        15.
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

    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis86_2=="1"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis86_2=="0"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-40-table">
      <?=$data_comment86 ;?>

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
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
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
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
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
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
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
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
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
        No Akte : <?= $row_saham['no_akte'] ;?>

      </div>

      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
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
        16.
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

    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis87_2=="1"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis87_2=="0"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-40-table">
    Permen No. 8 Tahun 2022  <?=$data_comment87 ;?>

    </div>
</div>
<div class="row">

    <div class="col-1-5-table">
      <div class="center">

      </div>
    </div>

    <div class="col-1-40-table">
      File Neraca

    </div>

    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis16=="1"){
          echo 'V';
        }?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis16=="0"){
          echo 'V';
        }?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis16=="1"){
          echo 'V';
        }?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis16=="0"){
          echo 'V';
        }?>
      </div>
    </div>

    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis16_2=="1"){
        echo 'V';
      }?>
    </div>

    </div>
    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis16_2=="0"){
        echo 'V';
      }?>
    </div>

    </div>
    <div class="col-1-40-table">
      <?=$data_comment16 ;?>

    </div>
</div>
<div class="row">

    <div class="col-1-5-table">
      <div class="center">

      </div>
    </div>

    <div class="col-1-40-table">
      Laporan Audit Akuntan Publik

    </div>

    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis17=="1"){
          echo 'V';
        }?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis17=="0"){
          echo 'V';
        }?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis17=="1"){
          echo 'V';
        }?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis17=="0"){
          echo 'V';
        }?>
      </div>
    </div>

    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis17_2=="1"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis17_2=="0"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-40-table">
      <?=$data_comment17 ;?>

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
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
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
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
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
        Aktiva Tidak Lancar : <?= $row_neraca['aktiva_tdk_lancar']; ?>

      </div>

      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
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
        Aktiva Lain-lain : <?= $row_neraca['aktiva_lain_lain']; ?>

      </div>

      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
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
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
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
        Kewajiban tidak lancar : <?= $row_neraca['kewajiban_tdk_lancar']; ?>

      </div>

      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
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
        Ekuitas : <?= $row_neraca['total_ekuitas']; ?>

      </div>

      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
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
        Total Modal : <?= $row_neraca['total_modal']; ?>

      </div>

      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
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
        Total Kewajiban : <?= $row_neraca['total_kewajiban']; ?>

      </div>

      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
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
        Total Kewajiban Ekuitas : <?= $row_neraca['total_kewajiban_ekuitas']; ?>

      </div>

      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">
        V
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
        Total Aset : <?= $row_neraca['total_aset']; ?>

      </div>

      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>
      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

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

    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis82_2=="1"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis82_2=="0"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-40-table">
    PP 5 Thn 2021 Pasal 85, 86 & 90  dan
    Lamp Permen PUPR No. 6 Thn 2021 <?= $data_comment82 ;?>

    </div>
</div>
<div class="row">

    <div class="col-1-5-table">
      <div class="center">

      </div>
    </div>

    <div class="col-1-40-table">

        File BASH

    </div>

    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis24=="1"){
          echo 'V';
        } ?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis24=="0"){
          echo 'V';
        } ?>
      </div>
    </div>
    
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis24=="1"){
          echo 'V';
        } ?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis24=="0"){
          echo 'V';
        } ?>
      </div>
    </div>

    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis24_2=="1"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis24_2=="0"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-40-table">
      <?= $data_comment24 ;?>

    </div>
</div>
<div class="row">

    <div class="col-1-5-table">
      <div class="center">

      </div>
    </div>

    <div class="col-1-40-table">

        File BOQ RAB MPU

    </div>

    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis25=="1"){
          echo 'V';
        } ?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis25=="0"){
          echo 'V';
        } ?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis25=="1"){
          echo 'V';
        } ?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis25=="0"){
          echo 'V';
        } ?>
      </div>
    </div>

    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis25_2=="1"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis25_2=="0"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-40-table">
      <?= $data_comment25 ;?>

    </div>
</div>
<div class="row">

    <div class="col-1-5-table">
      <div class="center">

      </div>
    </div>

    <div class="col-1-40-table">

        File Kontrak Dengan Pemberi Tugas

    </div>

    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis26=="1"){
          echo 'V';
        } ?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis26=="0"){
          echo 'V';
        } ?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis26=="1"){
          echo 'V';
        } ?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis26=="0"){
          echo 'V';
        } ?>
      </div>
    </div>

    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis26_2=="1"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis26_2=="0"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-40-table">
      <?= $data_comment26 ;?>

    </div>
</div>
<?php $v=0 ;?>
<?php foreach ($penjualan_tahunan as $row_pengalaman):?>
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
      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

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
      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

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
      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

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
        Sub Klasifikasi   : <?= $row_pengalaman['id_sub_klasifikasi']; ?>

      </div>

      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

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
        Pemilik Proyek : <?= $row_pengalaman['pemilik_proyek']; ?>

      </div>

      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>
      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

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

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

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
        Jabata Pemberi Tugas  : <?= $row_pengalaman['jabatan_pemberi_tugas']; ?>

      </div>

      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

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
        Lokasi Pekerjaan  : <?= $row_pengalaman['lokasi_pekerjaan']; ?>

      </div>

      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>
      <div class="col-1-5-table">
        <div class="center">

        </div>
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
        Nama Instansi Pemberi Tugas  : <?= $row_pengalaman['nama_instansi_pemberi_tugas']; ?>

      </div>

      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>
      <div class="col-1-5-table">
        <div class="center">

        </div>
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
        Nilai Kontrak Adendum  : <?= $row_pengalaman['nilai_kontrak_adendum']; ?>

      </div>

      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

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
        Nilai Kontrak Sesuai Porsi  : <?= $row_pengalaman['nilai_kontrak_sesuai_porsi']; ?>

      </div>

      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

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
        Presentase Porsi  : <?= $row_pengalaman['presentase_porsi']; ?>

      </div>

      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>
      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

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
        Status KSO  : <?= $row_pengalaman['status_kso']; ?>

      </div>

      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>
      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

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

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

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

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

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
        Spesifik Pekerjaan : <?= $row_pengalaman['spesifik_pekerjaan']; ?>

      </div>
      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>

      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

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

    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis89_2=="1"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis89_2=="0"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-40-table">
    PP No 5 tahun 2021 Pasal 85 & 95  dan
    Lampiran 1A PERMEN PUPR No 6 tahun 2021 <?= $data_comment89 ;?>

    </div>
</div>
<div class="row">

    <div class="col-1-5-table">
      <div class="center">

      </div>
    </div>

    <div class="col-1-40-table">
      Kepemilikan Peralatan

    </div>

    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis21=="1"){
          echo 'V';
        } ?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis21=="0"){
          echo 'V';
        } ?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis21=="1"){
          echo 'V';
        } ?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis21=="0"){
          echo 'V';
        } ?>
      </div>
    </div>

    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis21_2=="1"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis21_2=="0"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-40-table">
      <?= $data_comment21 ;?>

    </div>
</div>
<div class="row">

    <div class="col-1-5-table">
      <div class="center">

      </div>
    </div>

    <div class="col-1-40-table">
      Foto Plat Nama
    </div>

    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis27=="1"){
          echo 'V';
        } ?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis27=="0"){
          echo 'V';
        } ?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis27=="1"){
          echo 'V';
        } ?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis27=="0"){
          echo 'V';
        } ?>
      </div>
    </div>

    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis27_2=="1"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis27_2=="0"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-40-table">
      <?= $data_comment27 ;?>

    </div>
</div>
<div class="row">

    <div class="col-1-5-table">
      <div class="center">

      </div>
    </div>

    <div class="col-1-40-table">
    Foto Nampak Depan
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

    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis28_2=="1"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis28_2=="0"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-40-table">
      <?= $data_comment28 ;?>

    </div>
</div>
<div class="row">

    <div class="col-1-5-table">
      <div class="center">

      </div>
    </div>

    <div class="col-1-40-table">
      Foto Nampak Samping
    </div>

    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis29=="1"){
          echo 'V';
        } ?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis29=="0"){
          echo 'V';
        } ?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis29=="1"){
          echo 'V';
        } ?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis29=="0"){
          echo 'V';
        } ?>
      </div>
    </div>

    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis29_2=="1"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis29_2=="0"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-40-table">
      <?= $data_comment29 ;?>

    </div>
</div>
<div class="row">

    <div class="col-1-5-table">
      <div class="center">

      </div>
    </div>

    <div class="col-1-40-table">
      Hasil Pemeriksaan Pengujian
    </div>

    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis36=="1"){
          echo 'V';
        } ?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis36=="0"){
          echo 'V';
        } ?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis36=="1"){
          echo 'V';
        } ?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis36=="0"){
          echo 'V';
        } ?>
      </div>
    </div>

    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis36_2=="1"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis36_2=="0"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-40-table">
      <?= $data_comment36 ;?>

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
      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

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
        Jenis Bukti Kepemilikan : <?= $row_peralatan['jenis_bukti_kepemilikan']; ?>

      </div>

      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

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

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

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
        Model Type : <?= $row_peralatan['model_type']; ?>

      </div>

      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>
      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

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
        Memiliki Peralatan : <?= $row_peralatan['memiliki_peralatan']; ?>

      </div>

      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>
      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

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
        Nomor Registrasi Peralatan : <?= $row_peralatan['nomor_registrasi_peralatan']; ?>

      </div>

      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

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
        Sub Varian : <?= $row_peralatan['subvarian']; ?>

      </div>

      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>
      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

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
        Kab Kota : <?= $row_peralatan['kab_kota']; ?>

      </div>

      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>
      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

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

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

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

      <div class="col-1-5-table">
      <div class="center">

      </div>

      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

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
      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>

      <div class="col-1-5-table">
      <div class="center">

      </div>

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
      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>
      <div class="col-1-5-table">
        <div class="center">

        </div>
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
        20.
      </div>
    </div>

    <div class="col-1-40-table">
      <div class="center">
        DATA SMAP
      </div>
    </div>

    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis78=="1"){
          echo 'V';
        } ?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis78=="0"){
          echo 'V';
        } ?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis78=="1"){
          echo 'V';
        } ?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis78=="0"){
          echo 'V';
        } ?>
      </div>
    </div>

    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis78_2=="1"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis78_2=="0"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-40-table">
    SK Dirjen 144 Tahun 2022 <?= $data_comment78 ;?>

    </div>
</div>
<div class="row">

    <div class="col-1-5-table">
      <div class="center">

      </div>
    </div>

    <div class="col-1-40-table">
      Dokumen SMAP

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

    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis5_2=="1"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis5_2=="0"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-40-table">
      <?= $data_comment5 ;?>

    </div>
</div>
<div class="row">

    <div class="col-1-5-table">
      <div class="center">

      </div>
    </div>

    <div class="col-1-40-table">

        Sertifikat ISO

    </div>

    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis34=="1"){
          echo 'V';
        } ?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis34=="0"){
          echo 'V';
        } ?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis34=="1"){
          echo 'V';
        } ?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis34=="0"){
          echo 'V';
        } ?>
      </div>
    </div>

    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis34_2=="1"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis34_2=="0"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-40-table">
      <?= $data_comment34 ;?>

    </div>
</div>
<div class="row">

    <div class="col-1-5-table">
      <div class="center">

      </div>
    </div>

    <div class="col-1-40-table">

        File Surat Pernyataan

    </div>

    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis35=="1"){
          echo 'V';
        } ?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis35=="0"){
          echo 'V';
        } ?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis35=="1"){
          echo 'V';
        } ?>
      </div>
    </div>
    <div class="col-1-5-table">
      <div class="center">
        <?php if($data_ceklis35=="0"){
          echo 'V';
        } ?>
      </div>
    </div>

    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis35_2=="1"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-5-table">
    <div class="center">
      <?php if($data_ceklis35_2=="0"){
        echo 'V';
      } ?>
    </div>

    </div>
    <div class="col-1-40-table">
      <?= $data_comment35 ;?>

    </div>
</div>
</section>
<hr>
<div class="center">
  PENILAIAN PERMOHONAN


</div>
<hr>

<section class="items">

  <div class="row">
    <div class="col-1-5">
      <div class="center">
        No
      </div>
    </div>

      <div class="col-1-40">
        <div class="center">
          Uraian
        </div>
      </div>

      <div class="col-1-40">
        <div class="center">
          Penilaian
        </div>
      </div>



  </div>
  <div class="row">

      <div class="col-1-5-table">
        <div class="center">
          1
        </div>
      </div>

      <div class="col-1-40-table">
        Data Administrasi

      </div>



      <div class="col-1-40-table">
        <div class="center">
        <?php if($data_ceklis91=="1"){
          echo 'VALID';
        }else{
          echo 'TIDAK VALID';
        } ?>
        </div>
      </div>
  </div>
  <div class="row">

      <div class="col-1-5-table">
        <div class="center">
          2
        </div>
      </div>

      <div class="col-1-40-table">
        Data Pengurus dan Tenaga Kerja

      </div>



      <div class="col-1-40-table">
        <div class="center">
        <?php if($data_ceklis92=="1"){
          echo 'VALID';
        }else{
          echo 'TIDAK VALID';
        } ?>
        </div>
      </div>
  </div>
  <div class="row">

      <div class="col-1-5-table">
        <div class="center">
          3
        </div>
      </div>

      <div class="col-1-40-table">
        Data Keuangan

      </div>



      <div class="col-1-40-table">
        <div class="center">
        <?php if($data_ceklis93=="1"){
          echo 'VALID';
        }else{
          echo 'TIDAK VALID';
        } ?>
        </div>
      </div>
  </div>
  <div class="row">

      <div class="col-1-5-table">
        <div class="center">
          4
        </div>
      </div>

      <div class="col-1-40-table">
        Data Pekerjaan (Penjualan)

      </div>



      <div class="col-1-40-table">
        <div class="center">
        <?php if($data_ceklis94=="1"){
          echo 'VALID';
        }else{
          echo 'TIDAK VALID';
        } ?>
          </div>
      </div>
  </div>
  <div class="row">

      <div class="col-1-5-table">
        <div class="center">
          5
        </div>
      </div>

      <div class="col-1-40-table">
        Data Peralatan Utama Badan Usaha

      </div>



      <div class="col-1-40-table">
        <div class="center">
        <?php if($data_ceklis95=="1"){
          echo 'VALID';
        }else{
          echo 'TIDAK VALID';
        } ?>
        </div>
      </div>
  </div>
 
  <div class="row">

      <div class="col-1-5-table">
        <div class="center">
          6
        </div>
      </div>

      <div class="col-1-40-table">
        Data SMAP

      </div>



      <div class="col-1-40-table">
        <div class="center">
        <?php if($data_ceklis97=="1"){
          echo 'VALID';
        }else{
          echo 'TIDAK VALID';
        } ?>
        </div>
      </div>
  </div>
  <?php $no=8;?>
  <?php foreach($data_penilaian as $row_penilaian) :?>
    <div class="row">

        <div class="col-1-5-table">
          <div class="center">
            <?= $no ;?>
          </div>
        </div>

        <div class="col-1-40-table">
          <?= $row_penilaian['deskripsi_subklasifikasi']." / ".$row_penilaian['id_sub_klasifikasi']."-".$row_penilaian['kualifikasi']." / ".$row_penilaian['nomor_kbli'] ;?>

        </div>



        <div class="col-1-40-table">
          <div class="center">
          <?php if($row_penilaian['hasil_akhir']=="1"){
            echo 'DITERIMA';
          }else{
            echo 'DITOLAK';
          } ?>
          </div>
        </div>
          <?php $no+=1 ;?>
    </div>

  <?php endforeach ?>
  <div class="row">

      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>

      <div class="col-1-40-table">
        <b><i>
        REKOMENDASI ASESOR
      </i>
        </b>
      </div>



      <div class="col-1-40-table">
        <div class="center">
          <b><i>
        <?php if($data_ceklis95=="1"){
          echo 'LOLOS';
        }else{
          echo 'TIDAK LOLOS';
        } ?>
      </i>
      </b>
        </div>
      </div>
  </div>
  <div class="row">

      <div class="col-1-5-table">
        <div class="center">

        </div>
      </div>

      <div class="col-1-40-table">
        CATATAN

      </div>



      <div class="col-1-40-table">
        <?= $data_comment91;?>

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
      

          <?php 
            $path = base_url("assets/assets2/".$asesor[0]['id_asesor'].".png");
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $ch = curl_init();

              curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
              curl_setopt($ch, CURLOPT_HEADER, 0);
              curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
              curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
              curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
              curl_setopt($ch, CURLOPT_URL, $path);
              curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);       

              $data = curl_exec($ch);
              curl_close($ch);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
            

            
            
            ;?>
            <img src="<?=$base64 ;?>" style="margin-top:10px;border: 1px; max-height: 190px; max-width: 120px; ">  
<br>

      
      <?= $asesor[0]['Nama']; ?>
      <br>
      (...................................)
      <br>

    </div>
   







  </div>


</section>

