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
      <div class="col-1-90 ">
        <div class="kop_surat">
          <b style="font-size:30px;">PT LSBU GAPEKNAS INFRASTRUKTUR</b><br>
          Ruko Graha Mas Pemuda Blok AD No. 21 Jl. Pemuda, Rawamangun, Jakarta Timur<br>
            Telp: (021) 4711 796, Fax: (021) 4711 860.  <br>
Email pt.lsbugapeknas21@gmail.com </div>
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
<body>
  <br>
  <br>
  <br>
  <br>
<hr>
  <section class="items">

      <!-- your favorite templating/data-binding library would come in handy here to generate these rows dynamically !-->
      <div class="row">

            <div class="center">
              <!--
                <img src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/gapenri/assets/media/logos/Logo_ski_2.png';?>"  height="130" width="110" >
              -->



            <br>
            <div class="center">
              <b>RANGKUMAN LEMBAR PENILAIAN</b> <br><?= strtoupper($biodata[0]['nama']) ;?>
                      </div>
            </div>



      </div>




  </section>






  <br>
  <br>
  <br>
  <br>
Hasil Penilaian Kelayakan Badan Usaha
<section class="items">


  <div class="row">
      <div class="col-1-5-table">
        <div class="center">
          No
        </div>
      </div>

      <div class="col-1-10-table">
        <div class="center">
          Klasifikasi/ Subklasifikasi/ Kode KBLI
        </div>
      </div>

      <div class="col-1-10-table">
        <div class="center">
          Verifikasi & Validasi Dokumen BU
        </div>
      </div>
      <div class="col-1-10-table">
        <div class="center">
          Penjualan Tahunan
        </div>
      </div>
      <div class="col-1-10-table">
        <div class="center">
          Ketersediaan Aset
        </div>
      </div>
      <div class="col-1-10-table">
        <div class="center">
           Ketersediaan Tenaga Kerja
        </div>
      </div>

      <div class="col-1-10-table">
        <div class="center">
           Kemampuan menyediakan Peralatan
        </div>
      </div>
     

      <div class="col-1-10-table">
        <div class="center">
           Komitmen Penyelenggaraan Sistem Manajemen Anti Penyuapan (SMAP)
        </div>
      </div>
      <div class="col-1-10-table">
        <div class="center">
          Permohonan Badan Usaha
        </div>
      </div>
      <div class="col-1-10-table">
        <div class="center">
          ABU
        </div>
      </div>

      <div class="col-1-10-table">
        <div class="center">
          Usulan ABU
        </div>
      </div>


  </div>
  <?php $i=0 ;?>
  <?php foreach($record as $row) :?>
    <?php $i+=1 ;?>

  <div class="row">
      <div class="col-1-5-table">
        <div class="center">
          <?=$i ;?>
        </div>

      </div>

      <div class="col-1-10-table">

        <?=$row['id_klasifikasi'].'/'.$row['id_sub_klasifikasi'].'/'.$row['deskripsi_subklasifikasi'].'/'.$row['nomor_kbli'] ;?>


      </div>
    
      <div class="col-1-10-table">
        <div class="center">
        SESUAI

        </div>
      </div>
      <div class="col-1-10-table">
        <div class="center">
          <?php if($row['penjualan_tahunan']=='1'){
            echo "SESUAI";
          }else{
            echo "TIDAK SESUAI";
          } ;?>

        </div>
      </div>
      <div class="col-1-10-table">
        <div class="center">
          <?php if($row['aset']=='1'){
            echo "SESUAI";
          }else{
            echo "TIDAK SESUAI";
          } ;?>

        </div>
      </div>
      <div class="col-1-10-table">
        <div class="center">
          <?php if($row['tk']=='1'){
            echo "SESUAI";
          }else{
            echo "TIDAK SESUAI";
          } ;?>

        </div>
      </div>

      <div class="col-1-10-table">
        <div class="center">
          <?php if($row['peralatan']=='1'){
            echo "SESUAI";
          }else{
            echo "TIDAK SESUAI";
          } ;?>

        </div>
      </div>
    
      <div class="col-1-10-table">
        <div class="center">
          <?php if($row['smap']=='1'){
            echo "SESUAI";
          }else{
            echo "TIDAK SESUAI";
          } ;?>


        </div>
      </div>
      <div class="col-1-10-table">
        <div class="center">
          BARU

        </div>
      </div>
      <div class="col-1-10-table">
        <div class="center">
          <?= $row['Nama'] ;?>

        </div>
      </div>

      <div class="col-1-10-table">
        <div class="center">
        <?php if($row['hasil_akhir']=='1'){
          echo "MEMENUHI";
        }else{
          echo "TIDAK MEMENUHI";
        } ;?>

        </div>
      </div>



  </div>

<?php endforeach ;?>


</section>
<section class="items">

  <div class="row">



      <div class="col-1-30">
      <!--Ketua Pelaksana-->
      </div>
      <div class="col-1-15">

      </div>
      <div class="col-1-10">
        <!--Asesor 1-->
      </div>

      <div class="col-1-15">

      </div>

      <div class="col-1-30">
        <!--Asesor 2-->

      </div>



  </div>

  <div class="row">




      <div class="col-1-10">
      </div>
      <div class="col-1-20-table">
        <div class="center">
        Asesor I
        <br>
        


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
          <?=$asesor[0]['Nama'];?><br>
          (..........................)
        </div>
      </div>
      <div class="col-1-20-table">
        <div class="center">
        Asesor II
        <br>
        


          <?php 
            $path = base_url("assets/assets2/".$asesor[1]['id_asesor'].".png");
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
          <?=$asesor[1]['Nama'];?><br>
          (..........................)
        </div>
      </div>
      



  </div>
</section>


</body>
</html>
