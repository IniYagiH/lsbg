<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>Result</title>
  <style media="screen">
    body {
      font-family: 'Segoe UI', 'Microsoft Sans Serif', sans-serif;
    }


    header:before,
    header:after {
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
      padding-top: 30px;
    }

    .center {
      text-align: center;
    }

    .left {
      text-align: left;
      padding-top: -15px;
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
      font-family: 'Segoe UI', 'Microsoft Sans Serif', sans-serif;
    }

    header:before,
    header:after {
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

    .kop_surat {
      font-size: 17px;
      margin-left: 0px;

      text-align: left;
      float: left;
    }

    .col-1-90 {
      width: 90%;
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


          <img src="<?=$base64 ;?>" style="margin-top:10px;border: 1px;  max-width: 110px; ">

        </div>
      </div>
      <div class="col-1-90 ">
        <br>
        <br>
        <div class="kop_surat">
          <b>PT LSBU GAPEKNAS INFRASTRUKTUR</b><br>
          Ruko Graha Mas Pemuda Blok AD No. 21 Jl. Pemuda, Rawamangun, Jakarta Timur<br>
          Telp: (021) 4711 796, Fax: (021) 4711 860. <br>
          Email pt.lsbugapeknas21@gmail.com
        </div>
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
  <hr>

  <div class="center-pds">
    <br>
    <br>
    <br>
    <br>
    SURAT TUGAS PEMUTUS<p>
      <br>
      Nomor : <?= $no_surat ;?>
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

  <section class="items">
    <div class="row">
      <div class="col-1-10">
        Dengan ini memberikan tugas kepada
      </div>
      <div class="col-1-10">

      </div>

    </div>
   
    <div class="row">
      <div class="col-1-10">
        Nama Pemutus - 1 
      </div>
      <div class="col-1-10">
        : <?php echo $pemutus[0]['komite_1'] ;?>
      </div>

    </div>
    <div class="row">
      <div class="col-1-10">
        Nama Pemutus - 2
      </div>
      <div class="col-1-10">
        : <?php echo $pemutus[0]['komite_2'] ;?>
      </div>

    </div>
    <div class="row">
      <div class="col-1-10">
        Nama Pemutus - 3 
      </div>
      <div class="col-1-10">
        : <?php echo $pemutus[0]['komite_3'] ;?>
      </div>

    </div>




  </section>
  <section class="items">
    <div class="row">
      <div class="col-1-20">
      untuk melaksanakan Tinjauan hasil penilaian kelayakan dan Pemutusan Sertifikasi terhadap dokumen permohoman badan usaha jasa konstruksi sebagai berikut :<p>
      </div>
    </div>
  </section>

  <section class="items">

    <div class="row">
      <div class="col-1-10">
        <div class="left">
          1. Nama Badan Usaha
        </div>
      </div>
      <div class="col-1-10">
        <div class="left">
          : <?php echo $bu[0]['nama'] ;?>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-1-10">
        <div class="left">
          2. NPWP Badan Usaha
        </div>
      </div>
      <div class="col-1-10">
        <div class="left">
          : <?php echo $bu[0]['npwp'] ;?>
        </div>
      </div>

    </div>
    <div class="row">
      <div class="col-1-10">
        <div class="left">
          3. Tanggal Permohonan
        </div>
      </div>
      <div class="col-1-10">
        <div class="left">
          : <?php echo $tgl_permohonan ;?>
        </div>
      </div>

    </div>
    <div class="row">
      <div class="col-1-10">
        <div class="left">
          4. Jenis Badan Usaha
        </div>
      </div>
      <div class="col-1-10">
        <div class="left">
          : <?php echo $bu[0]['jenis_usaha'] ;?>
        </div>
      </div>

    </div>
    <div class="row">
      <div class="col-1-10">
        <div class="left">
          5. Alamat Badan Usaha
        </div>
      </div>
      <div class="col-1-10">
        <div class="left">
          : <?php echo $bu[0]['alamat_bu'] ;?>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="col-1-10">
        <div class="left">
          6. Propinsi Badan Usaha
        </div>
      </div>
      <div class="col-1-10">
        <div class="left">
          : <?php echo $bu[0]['id_propinsi'] ;?>
        </div>
      </div>
    </div>
  








  </section>
  <div class="center-pds">
    <br>
    <br>
    Dengan, Surat Tugas ini kami keluarkan untuk dilaksanakan dengan penuh bertanggungjawab,
    <br>
    <?php echo 'Jakarta'.', '.$tgl.' '.$bulan.' '.$tahun ;?>
    <div>

      <section class="items">

        <div class="row">
       
            <?php if(substr($pemutus[0]['komite_1'],0,3) == 'APR'){
              $id_pemutus1='ABULSBUGI10001.jpeg';
            }else if(substr($pemutus[0]['komite_1'],0,3) == 'MAT'){
              $id_pemutus1='ABULSBUGI10002.jpeg';
            }else if(substr($pemutus[0]['komite_1'],0,3) == 'DIM'){
              $id_pemutus1='ABULSBUGI10003.jpeg';
            }else if(substr($pemutus[0]['komite_1'],0,3) == 'UNT'){
              $id_pemutus1='ABULSBUGI10018.jpeg';
            }else if(substr($pemutus[0]['komite_1'],0,3) == 'YOH'){
              $id_pemutus1='ABULSBUGI10017.jpeg';
            }else if(substr($pemutus[0]['komite_1'],0,3) == 'DEV'){
              $id_pemutus1='ABULSBUGI10014.jpeg';
            } ;?>
          <div class="col-1-15">
            Pemutus - 1
          </div>
          <?php if(substr($pemutus[0]['komite_2'],0,3) == 'APR'){
              $id_pemutus2='ABULSBUGI10001.jpeg';
            }else if(substr($pemutus[0]['komite_2'],0,3) == 'MAT'){
              $id_pemutus2='ABULSBUGI10002.jpeg';
            }else if(substr($pemutus[0]['komite_2'],0,3) == 'DIM'){
              $id_pemutus2='ABULSBUGI10003.jpeg';
            }else if(substr($pemutus[0]['komite_2'],0,3) == 'UNT'){
              $id_pemutus2='ABULSBUGI10018.jpeg';
            }else if(substr($pemutus[0]['komite_2'],0,3) == 'YOH'){
              $id_pemutus2='ABULSBUGI10017.jpeg';
            }else if(substr($pemutus[0]['komite_2'],0,3) == 'DEV'){
              $id_pemutus2='ABULSBUGI10014.jpeg';
            } ;?>
          <div class="col-1-5">
            Pemutus - 2
          </div>
          <?php if(substr($pemutus[0]['komite_3'],0,3) == 'APR'){
              $id_pemutus3='ABULSBUGI10001.jpeg';
            }else if(substr($pemutus[0]['komite_3'],0,3) == 'MAT'){
              $id_pemutus3='ABULSBUGI10002.jpeg';
            }else if(substr($pemutus[0]['komite_3'],0,3) == 'DIM'){
              $id_pemutus3='ABULSBUGI10003.jpeg';
            }else if(substr($pemutus[0]['komite_3'],0,3) == 'UNT'){
              $id_pemutus3='ABULSBUGI10018.jpeg';
            }else if(substr($pemutus[0]['komite_3'],0,3) == 'YOH'){
              $id_pemutus3='ABULSBUGI10017.jpeg';
            }else if(substr($pemutus[0]['komite_3'],0,3) == 'DEV'){
              $id_pemutus3='ABULSBUGI10014.jpeg';
            } ;?>
          <div class="col-1-5">
            Pemutus - 3
          </div>
     



       



        </div>

        <div class="row">
        
          <div class="col-1-15-table">

          <br>
        <br>


        <?php
                  // $path = base_url('assets/sertifikat/qrcodex/'.$qr_sps); sementara karena masalah server GCP
                  $path = base_url("assets/assets2/".$id_pemutus1);
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
        <br>
            <?php echo $pemutus[0]['komite_1'] ;?>
          </div>
          <div class="col-1-15-table">

<br>
<br>


<?php
        // $path = base_url('assets/sertifikat/qrcodex/'.$qr_sps); sementara karena masalah server GCP
        $path = base_url("assets/assets2/".$id_pemutus2);
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
<br>
  <?php echo $pemutus[0]['komite_2'] ;?>
</div>
<div class="col-1-15-table">

<br>
<br>


<?php
        // $path = base_url('assets/sertifikat/qrcodex/'.$qr_sps); sementara karena masalah server GCP
        $path = base_url("assets/assets2/".$id_pemutus3);
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
<br>
  <?php echo $pemutus[0]['komite_3'] ;?>
</div>

        
        

          




        </div>

        <br>
        <br>
        <br>
        <div class="row">
        <div class="col-1-15">
          
          </div>
        <div class="col-1-15">
            Yang Memberi Tugas
          </div>
        </div>
        <div class="row">
        <div class="col-1-15">
        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
          </div>
        <div class="col-1-15-table">
          <?php
                  // $path = base_url('assets/sertifikat/qrcodex/'.$qr_sps); sementara karena masalah server GCP
                  $path = base_url("assets/assets2/leo.jpeg");
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
        <img src="<?=$base64 ;?>" style="margin-top:10px;border: 1px; max-height: 190px; max-width: 120px; ">  <br>
        Leonasi D Wiranta, SE
            <br>
            Koordinator Sertifikasi

          </div>
        </div>
      </section>



</body>

</html>