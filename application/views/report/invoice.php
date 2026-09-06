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
        .kop_surat {
            font-size: 17px;
            margin-right: 0px;

            text-align:left;
            float: left;
        }
        .col-1-90 {
            width: 90%;
        }
        .berita_acara {
            font-size: 17px;
            margin-right: 0px;
            margin-top: 0px;
            float: left;
        }
        .berita_acara_kecil {
            font-size: 14px;
            margin-right: 0px;
            margin-top: 0px;
            float: left;
        }
        .berita_acara_right {
            margin-right: 0px;
            margin-top: 0px;
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
        .right {
          text-align: right;
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
        .itemsz {
            clear: both;
            display: table;
            padding: 5px;
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
        .row-right {
            display: table-row;
            page-break-inside: avoid;
            float: right;
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
            <b>PT LSBU GAPEKNAS INFRASTRUKTUR</b><br>
            Ruko Graha Mas Pemuda Blok AD No. 21 Jl. Pemuda, Rawamangun, Jakarta Timur<br>
            Telp: (021) 4711 796, Fax: (021) 4711 860.  <br>
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
  <br>
  <br>
  <br>

  <hr>
  <section class="items">

      <!-- your favorite templating/data-binding library would come in handy here to generate these rows dynamically !-->
      <div class="row">


            <div class="berita_acara">
              Kepada Yth
              <br>
              <?php echo $biodata[0]['nama']  ;?>
              <br>
              <?php echo $biodata[0]['alamat_bu']  ;?>
            </div>




      </div>

  </section>
  <section>


    <div class="berita_acara_right">
      Jakarta, <?=$tanggal.' '.$bulan_huruf.' '.$tahun;?><br>
      <?= "No Invoice :".$no_urut   ;?>
    </div>



  </section>



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
        <div class="col-1-5">
          <div class="center">
            No
          </div>
        </div>

          <div class="col-1-30">
            <div class="center">
              Keterangan
            </div>
          </div>

          <div class="col-1-5">
            <div class="center">
              Jumlah
            </div>
          </div>




      </div>
      <?php $no=1; ?>
      <?php $biaya=0; ?>
      <?php foreach($klasifikasi as $row): ?>

      <div class="row">

          <div class="col-1-5-table">
            <?php echo $no ?>
          </div>

          <div class="col-1-50-table">
            <div class="center">
              <?php echo $row['id_klasifikasi'].' / '.$row['id_sub_klasifikasi'].' / '.$row['kualifikasi'].' / BARU'; ?>
            </div>
          </div>


          <div class="col-1-50-table">
            <?php $klasifikasi=substr($row['id_sub_klasifikasi'],0,2) ;?>
            <?php if($klasifikasi=='PB' OR $row['id_sub_klasifikasi']=='PL003'OR $row['id_sub_klasifikasi']=='PL005'OR $row['id_sub_klasifikasi']=='PL006'OR $row['id_sub_klasifikasi']=='PL007'OR $row['id_sub_klasifikasi']=='PL008') :?>
              Rp.2,257,500.00
              <?php $biaya+=2257.5; ?>
            <?php else :?>
            Rp.<?= number_format(($row['biaya']*1000), 2, '.', ',');?>
            <?php $biaya+=$row['biaya']; ?>
          <?php endif ;?>


          </div>




      </div>
      <?php $no=$no+1; ?>
    <?php endforeach; ?>
    <div class="row">

        <div class="col-1-5">

        </div>

        <div class="col-1-50">
          <div class="right">
          Total
          </div>
        </div>


        <div class="col-1-50-table">

            Rp.<?= number_format(($biaya*1000), 2, '.', ',');?>

        </div>




    </div>
    </section>
    <!--<section class="items">

      <div class="row">
          <div class="col-1-10">
            Terbilang
          </div>
          <div class="col-1-10">
            : <b></b>
          </div>

      </div>




    </section>-->
    <section class="items">

        <!-- your favorite templating/data-binding library would come in handy here to generate these rows dynamically !-->
        <div class="row">


              <div class="berita_acara">
                Pembayaran ditransfer ke:
                <br>
                <br>
                BANK BRI<br>
                0320-01-001796-30-9<br>
                A/N:PT. LSBU GAPEKNAS INFRASTRUKTUR<br>

              </div>




        </div>




    </section>


    <div class="berita_acara_right">
      <em>PT<br>
        LSBU GAPEKNAS</em>
        <br>
        <br>
       


              

            <?php
                  // $path = base_url('assets/sertifikat/qrcodex/'.$qr_sps); sementara karena masalah server GCP
                  $path = base_url('assets/media/logos/esign.png');
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
        Ketua Pelaksana

      
    </div>


</body>
</html>
