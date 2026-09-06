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
        .kop_surat {
            font-size: 25px;
            margin-left: 0px;

            text-align:left;
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
        <div class="col-1-10 ">
        
            
              <?php
                  // $path = base_url('assets/sertifikat/qrcodex/'.$qr_sps); sementara karena masalah server GCP
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
                    curl_close($ch);
                  $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                   ;?>
              <img src="<?=$base64 ;?>" style="margin-top:10px;border: 1px; max-height: 190px; max-width: 100px; ">

       
        </div>
        <div class="col-1-50 ">
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

  PEMANTAUAN TINDAK LANJUT TEMUAN SURVAILAN BUJK <p>
    
  </div>

<!-- <section class="items">
      <div class="row">
          <div class="col-1-40">
            Sesuai dengan rencana Survailen LSBU GAPEKNAS Infrastruktur, yang akan dilaksanakan pada tgl .... maka sesuai dengan hasil keputusan Rapat Manajemen LSBU GAPEKNAS Infrastruktur yang diselenggarakan pada tanggal .... dengan ini Direktur LSBU GAPEKNAS Infrastruktur menugasakan
          </div>
      </div>
    </section> -->
    <section class="items">
    <div class="row">
            
            <div class="col-1-20">
            Hasil Survailen BUJK 
            </div>
            <div class="col-1-40">
              
            </div>

        </div>
     
        
        <div class="row">
           
            <div class="col-1-20">
            Nama Badan Usaha Jasa Konstruksi (BUJK):
            </div>
            <div class="col-1-40">
              : <b><?=$biodata[0]['nama'];?></b>
            </div>

        </div>
        <div class="row">
           
            <div class="col-1-20">
            NIB
            </div>
            <div class="col-1-40">
              : <b><?=$biodata[0]['NIB'];?></b>
            </div>

        </div>
       
        
        
        



    </section>
    <section class="items">
      <div class="row">
        <div class="col-1-5-table">
            <div class="center">
              No
            </div>
          
        </div>
        <div class="col-1-20-table">
            <div class="center">
            Id izin/Subklasifikasi
            </div>
       
        </div>
        <div class="col-1-20-table">
            <div class="center">
            Bukti Pemenuhan
(ditulis secara jelas, terukur dan tidak mengambang)

            </div>
         
        </div>
        <div class="col-1-20-table">
            <div class="center">
              Referensi 
            </div>
         
        </div>
        <div class="col-1-20-table">
            <div class="center">
            Hasil Perbaikan/
Tindak Lanjut

            </div>
          
        </div>
        
        <div class="col-1-20-table">
            <div class="center">
             Jenis Temuan
            </div>
          
        </div>
        <div class="col-1-20-table">
            <div class="center">
             Hasil Akhir
            </div>
          
        </div>
      </div>
      <div class="row">
        <div class="col-1-5-table">
            <div class="center">
              1
            </div>
          
        </div>
        <div class="col-1-20-table">
            <div class="center">
              2
            </div>
       
        </div>
        <div class="col-1-40-table">
            <div class="center">
              3
            </div>
         
        </div>
        <div class="col-1-20-table">
            <div class="center">
              4
            </div>
         
        </div>
       
        <div class="col-1-5-table">
            <div class="center">
              5
            </div>
          
        </div>
        <div class="col-1-5-table">
            <div class="center">
            6
            </div>
          
        </div>
        <div class="col-1-5-table">
            <div class="center">
            7
            </div>
          
        </div>
      </div>
      <div class="row">
        <div class="col-1-5-table">
            <div class="center">
              1.
            </div>
          
        </div>
        <div class="col-1-20-table">
            
              <?=$klasifikasi[0]['id_izin'].' / '.$klasifikasi[0]['id_sub_klasifikasi'];?>
           
       
        </div>
        <div class="col-1-40-table" style="font-size: 12px;">
        <?=$penilaian[0]['ketidaksesuaian'];?>
         
        </div>
        <div class="col-1-20-table">
        <?=$penilaian[0]['referensi'];?>
         
        </div>
        <div class="col-1-5-table">
            
        <?php if($penilaian[0]['rencana_perbaikan']=='1'){
          echo "MEMENUHI";
        }else{
          echo "TIDAK MEMENUHI";
        };?>
        </div>
       
        <div class="col-1-5-table">
        <?php if($penilaian[0]['jenis_temuan']=='1'){
          echo "SESUAI";
        }else{
          echo "TIDAK SESUAI";
        };?>
          
        </div>
        <div class="col-1-5-table">
        <?php if($penilaian[0]['jenis_temuan']=='1'){
          echo "Rekomendasi Kelayakan";
        }else{
          echo "Pembekuan dan pencabutan";
        };?>
          
        </div>
      </div>
      
    </section>
  
    <section class="items">
      <div class="row">
        <div class="col-1-10">
            <div class="center">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
        </div>
        <div class="col-1-30">
            <div class="center">
            
            </div>
        </div>
        <div class="col-1-30">
        <div class="center">
            Dibuat Oleh:
            </div>
        </div>
        <div class="col-1-30">
        <div class="center">
             Diketahui Oleh:
             </div>
        </div>
      </div>
      <div class="row">
        <div class="col-1-10">
        </div>
        <div class="col-1-30">
        
            Tanggal
          
        </div>
        <div class="col-1-30">
           
            :<?php echo $day . '-' . $bulan . '-' . $tahun; ?>
            
        </div>
        <div class="col-1-30">
            <div class="center">
             
            </div>
        </div>
      </div>
      <div class="row">
      <div class="col-1-10">
      </div>
        <div class="col-1-30">
            
            Bagian/ Jabatan
            
        </div>
        <div class="col-1-30">
            <div class="center">
            :<b>Koordinator Manajemen Mutu</b>
            </div>
        </div>
        <div class="col-1-30">
            <div class="center">
            <b>Ketua Pelaksana</b>
            </div>
        </div>
      </div>
     
      <div class="row">
      <div class="col-1-10">
      </div>
        <div class="col-1-30">
           
            Nama
        
        </div>
        <div class="col-1-30">
            <div class="center">
            :<b>Astini Primaningtyas</b>
            </div>
        </div>
        <div class="col-1-30">
            <div class="center">
            <b>Roland Togu, ST., MBA</b>
            </div>
        </div>
      </div>
      <div class="row">
      <div class="col-1-10">
      </div>
        <div class="col-1-30">
           
            Tanda Tangan
          
        </div>
        <div class="col-1-30">
            <div class="center">
             <?php
                  // $path = base_url('assets/sertifikat/qrcodex/'.$qr_sps); sementara karena masalah server GCP
                  $path = base_url('assets/media/astini.png');
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
          
            </div>
        </div>
        <div class="col-1-30">
            <div class="center">
            <?php
                  // $path = base_url('assets/sertifikat/qrcodex/'.$qr_sps); sementara karena masalah server GCP
                  $path = base_url('assets/media/roland.png');
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
          
            </div>
        </div>
      </div>
      </section>
  
    
  
   

    



</body>
</html>

