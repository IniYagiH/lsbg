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
        .col-1-50-table {
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
              <b>TINJAUAN HASIL PENILAIAN </b> <br>Sertifikasi Badan Usaha Jasa Konstruksi
                      </div>
            </div>



      </div>




  </section>






  <br>
  <br>

1.	Data Badan Usaha
<section class="items">


  <div class="row">
      <div class="col-1-5-table">
       
        Nama Badan Usaha
      
      </div>

      <div class="col-1-50-table">
       
        <?= $biodata[0]['nama'] ;?>
       
      </div>
  </div>
  <div class="row">
      <div class="col-1-5-table">
     
        Alamat
     
      </div>

      <div class="col-1-50-table">
     
        <?= $biodata[0]['alamat_bu'] ;?>
     
      </div>
  </div>
  <div class="row">
      <div class="col-1-5-table">
     
        Kontak Penghubung / Jabatan
     
      </div>

      <div class="col-1-50-table">
     
      </div>
  </div>
  <div class="row">
      <div class="col-1-5-table">
    
        No. Tlp / Fax
 
      </div>

      <div class="col-1-50-table">
     
        <?= $biodata[0]['telepon'] ;?>
    
      </div>
  </div>
  <div class="row">
      <div class="col-1-5-table">
   
        Email

      </div>

      <div class="col-1-50-table">
    
        <?= $biodata[0]['email'] ;?>

      </div>
  </div>
  <div class="row">
      <div class="col-1-5-table">
  
        Website
 
      </div>

      <div class="col-1-50-table">

        <?= $biodata[0]['web'] ;?>
    
      </div>
  </div>
  <div class="row">
      <div class="col-1-5-table">
  
        NPWP

      </div>

      <div class="col-1-50-table">
  
        <?= $biodata[0]['npwp'] ;?>
     
      </div>
  </div>
  <div class="row">
      <div class="col-1-5-table">
 
        NIB

      </div>

      <div class="col-1-50-table">
      
        <?= $biodata[0]['NIB'] ;?>
    
      </div>
  </div>
  <div class="row">
      <div class="col-1-5-table">
    
        Jenis Permohonan
   
      </div>

      <div class="col-1-50-table">
       
        Baru
      
      </div>
  </div>

  


</section>

2.	Profil Penilaian
<section class="items">


  <div class="row">
      <div class="col-1-5-table">
  
        Standar (Skema)
   
      </div>

      <div class="col-1-50-table">
      SK Dirjen<br>
      Skema LSBU GAPEKNAS INFRASTRUKTUR
      </div>
  </div>
  <div class="row">
      <div class="col-1-5-table">
     
        Tim Asesor
   
      </div>

      <div class="col-1-50-table">
 
        

      </div>
  </div>
  <div class="row">
      <div class="col-1-5-table">
       
        Nama ABU-1 
   
      </div>

      <div class="col-1-50-table">
 
        <?=$record[0]['Nama'];?>
   
      </div>
  </div>
  <div class="row">
      <div class="col-1-5-table">
   
        Nama ABU-2 

      </div>

      <div class="col-1-50-table">
    
        <?=$record[1]['Nama'];?>
  
      </div>
  </div>
  <div class="row">
      <div class="col-1-5-table">
  
        Informasi Pelaksanaan Penilaian

      </div>

      <div class="col-1-50-table">
      
      </div>
  </div>
  <div class="row">
      <div class="col-1-5-table">
      
        Lokasi

      </div>

      <div class="col-1-50-table">
       
      </div>
  </div>
  <div class="row">
      <div class="col-1-5-table">

        Tanggal Penilaian 

      </div>

      <div class="col-1-50-table">
      
      </div>
  </div>
  <div class="row">
      <div class="col-1-5-table">
 
        Durasi Penilaian

      </div>

      <div class="col-1-50-table">
        
      </div>
  </div>
  
</section>

3.	Permohonan Klasifikasi, Subklasifikasi dan Kualifikasi
<section class="items">


  <div class="row">
      <div class="col-1-5-table">
 
        No

      </div>

      <div class="col-1-10-table">
     
        Klasifikasi

      </div>
      <div class="col-1-10-table">
  
        Sub Klasifikasi
  
      </div>
      <div class="col-1-10-table">
   
        Kode KBLI
  
      </div>
      <div class="col-1-10-table">
   
        Kode Subklasifikasi
   
      </div>
      <div class="col-1-10-table">
  
        Kualifikasi
 
      </div>
  </div>
  <?php $no=1 ;?>
  <?php foreach($record as $row) :?>
    <div class="row">
      <div class="col-1-5-table">
 
        <?=$no?>
   
      </div>

      <div class="col-1-10-table">
      
        <?=$row['id_klasifikasi'];?>
     
      </div>
      <div class="col-1-10-table">
      
        <?=$row['deskripsi_subklasifikasi'];?>
     
      </div>
      <div class="col-1-10-table">
      
        <?=$row['nomor_kbli'];?>
   
      </div>
      <div class="col-1-10-table">
   
        <?=$row['id_sub_klasifikasi'];?>
  
      </div>
      <div class="col-1-10-table">
     
        <?=$row['kualifikasi'];?>
    
      </div>
  </div>
  <?php $no+=1; ?>
  <?php endforeach ;?>
  </section>
  4.	Tinjauan Hasil Penilaian Berdasarkan Rekomendasi Asesor
<section class="items">


  <div class="row">
      <div class="col-1-5-table">
        No
      </div>

      <div class="col-1-10-table">
        Kriteria 
      </div>
      <div class="col-1-10-table">
        Subklasifikasi 
      </div>
      <div class="col-1-10-table">
        Kualifikasi 
      </div>
      <div class="col-1-10-table">
        Kode KBLI 
      </div>
      <div class="col-1-10-table">
        Memenuhi
      </div>
      <div class="col-1-10-table">
       Tidak Memenuhi
      </div>
      <div class="col-1-10-table">
       Keterangan
      </div>
  </div>
  <div class="row">
      <div class="col-1-5-table">
        1.
      </div>

      <div class="col-1-10-table">
        Penjualan Tahunan
      </div>
      <div class="col-1-10-table">
        <?php foreach($record as $row){
            echo $row['id_sub_klasifikasi'].'<br>';
        } ;?>
      </div>
      <div class="col-1-10-table">
      <?php foreach($record as $row){
            echo $row['kualifikasi'].'<br>';
        } ;?>
      </div>
      <div class="col-1-10-table">
      <?php foreach($record as $row){
            echo $row['nomor_kbli'].'<br>';
        } ;?>
      </div>
      <div class="col-1-10-table">
        V
      </div>
      <div class="col-1-10-table">
       
      </div>
      <div class="col-1-10-table">
       
      </div>
  </div>
  <div class="row">
      <div class="col-1-5-table">
        2.
      </div>

      <div class="col-1-10-table">
        Kemampuan Keuangan
      </div>
      <div class="col-1-10-table">
        <?php foreach($record as $row){
            echo $row['id_sub_klasifikasi'].'<br>';
        } ;?>
      </div>
      <div class="col-1-10-table">
      <?php foreach($record as $row){
            echo $row['kualifikasi'].'<br>';
        } ;?>
      </div>
      <div class="col-1-10-table">
      <?php foreach($record as $row){
            echo $row['nomor_kbli'].'<br>';
        } ;?>
      </div>
      <div class="col-1-10-table">
        V
      </div>
      <div class="col-1-10-table">
       
      </div>
      <div class="col-1-10-table">
       
      </div>
  </div>
  <div class="row">
      <div class="col-1-5-table">
        3.
      </div>

      <div class="col-1-10-table">
        Ketersediaan Tenaga Kerja Konstruksi
      </div>
      <div class="col-1-10-table">
        <?php foreach($record as $row){
            echo $row['id_sub_klasifikasi'].'<br>';
        } ;?>
      </div>
      <div class="col-1-10-table">
      <?php foreach($record as $row){
            echo $row['kualifikasi'].'<br>';
        } ;?>
      </div>
      <div class="col-1-10-table">
      <?php foreach($record as $row){
            echo $row['nomor_kbli'].'<br>';
        } ;?>
      </div>
      <div class="col-1-10-table">
        V
      </div>
      <div class="col-1-10-table">
       
      </div>
      <div class="col-1-10-table">
       
      </div>
  </div>
  <div class="row">
      <div class="col-1-5-table">
        4.
      </div>

      <div class="col-1-10-table">
        Kemampuan dalam Penyediaan Peralatan
      </div>
      <div class="col-1-10-table">
        <?php foreach($record as $row){
            echo $row['id_sub_klasifikasi'].'<br>';
        } ;?>
      </div>
      <div class="col-1-10-table">
      <?php foreach($record as $row){
            echo $row['kualifikasi'].'<br>';
        } ;?>
      </div>
      <div class="col-1-10-table">
      <?php foreach($record as $row){
            echo $row['nomor_kbli'].'<br>';
        } ;?>
      </div>
      <div class="col-1-10-table">
        V
      </div>
      <div class="col-1-10-table">
       
      </div>
      <div class="col-1-10-table">
       
      </div>
  </div>

  <div class="row">
      <div class="col-1-5-table">
       5.
      </div>

      <div class="col-1-10-table">
        Sistem Manajemen Anti Penyuapan
      </div>
      <div class="col-1-10-table">
        <?php foreach($record as $row){
            echo $row['id_sub_klasifikasi'].'<br>';
        } ;?>
      </div>
      <div class="col-1-10-table">
      <?php foreach($record as $row){
            echo $row['kualifikasi'].'<br>';
        } ;?>
      </div>
      <div class="col-1-10-table">
      <?php foreach($record as $row){
            echo $row['nomor_kbli'].'<br>';
        } ;?>
      </div>
      <div class="col-1-10-table">
        V
      </div>
      <div class="col-1-10-table">
       
      </div>
      <div class="col-1-10-table">
       
      </div>
  </div>

  </section>
  5.	Rekomedasi Hasil Tinjauan Penilaian 
<section class="items">


  <div class="row">
      <div class="col-1-5-table">
        No
      </div>
      <div class="col-1-10-table">
        Klasifikasi
      </div>
      <div class="col-1-10-table">
        Subklasifikasi
      </div>
      <div class="col-1-10-table">
        Kode KBLI
      </div>
      <div class="col-1-10-table">
        Memenuhi
      </div>
      <div class="col-1-10-table">
        Tidak Memenuhi
      </div>
      <div class="col-1-10-table">
        Keterangan
      </div>
  </div>
  <?php $no=1 ;?>
  <?php foreach($record as $row) :?>
    <div class="row">
      <div class="col-1-5-table">
        <?=$no;?>
      </div>
      <div class="col-1-10-table">
      <?=$row['id_klasifikasi'];?>
      </div>
      <div class="col-1-10-table">
      <?=$row['id_sub_klasifikasi'].'-'.$row['deskripsi_subklasifikasi'];?>
      </div>
      <div class="col-1-10-table">
      <?=$row['nomor_kbli'];?>
      </div>
      <div class="col-1-10-table">
        Memenuhi
      </div>
      <div class="col-1-10-table">
      
      </div>
      <div class="col-1-10-table">
      
      </div>
  </div>
  <?php $no+=1; ?>
  <?php endforeach ;?>
</section>

6.	Tindakan Perbaikan Hasil Tinjauan Penilaian
<section class="items">


  <div class="row">
    <div class="col-1-5-table">
        No
     </div>
     <div class="col-1-10-table">
        Dokumen Yang Diperbaiki
     </div>
     <div class="col-1-10-table">
        Standar
     </div>
     <div class="col-1-10-table">
        Penanggungjawab
     </div>
  </div>
  <div class="row">
    <div class="col-1-5-table">
        1
     </div>
     <div class="col-1-10-table">
        Penjualan Tahunan
     </div>
     <div class="col-1-10-table">
        
     </div>
     <div class="col-1-10-table">
        
     </div>
  </div>
  <div class="row">
    <div class="col-1-5-table">
        2
     </div>
     <div class="col-1-10-table">
        Kemampuan Keuangan
     </div>
     <div class="col-1-10-table">
        
     </div>
     <div class="col-1-10-table">
        
     </div>
  </div>
  <div class="row">
    <div class="col-1-5-table">
        3
     </div>
     <div class="col-1-10-table">
        Kemampuan Keuangan
     </div>
     <div class="col-1-10-table">
        
     </div>
     <div class="col-1-10-table">
        
     </div>
  </div>
  <div class="row">
    <div class="col-1-5-table">
        4
     </div>
     <div class="col-1-10-table">
        Tenaga Kerja
     </div>
     <div class="col-1-10-table">
        
     </div>
     <div class="col-1-10-table">
        
     </div>
  </div>
  <div class="row">
    <div class="col-1-5-table">
        5
     </div>
     <div class="col-1-10-table">
        Peralatan
     </div>
     <div class="col-1-10-table">
        
     </div>
     <div class="col-1-10-table">
        
     </div>
  </div>
  <div class="row">
    <div class="col-1-5-table">
        6
     </div>
     <div class="col-1-10-table">
        SMAP
     </div>
     <div class="col-1-10-table">
        
     </div>
     <div class="col-1-10-table">
        
     </div>
  </div>
</section>
7.	Hasil Tinjauan Penilaian
<section class="items">
  <div class="row">
    <div class="col-1-10-table">
        Hasil Tinajauan Penilaian
     </div>
     <div class="col-1-5-table">
        :
     </div>
     <div class="col-1-10-table">
        V Sesuai
     </div>
    
  </div>
</section>
<section class="items">
  <div class="row">
  <div class="col-1-10">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

</div>
    <div class="col-1-10-table">
        Tanggal
     </div>
     <div class="col-1-10-table">
        <?= date("d-m-Y", strtotime($record[0]['tgl_penilaian']));;?>
     </div>
        <div class="col-1-10-table">
       
     </div>
        <div class="col-1-10-table">
       
     </div>
     <div class="col-1-10-table">
       
     </div>
    
  </div>
  <div class="row">
  <div class="col-1-10">
        
        </div>
    <div class="col-1-10-table">
        Tanda Tangan
     </div>
     <div class="col-1-10-table">
     <?php $nama=$this->Bu_model->get_user_nama_asesor($komite[0]['komite_1']);
$path = base_url("assets/assets2/".$nama[0]['Username'].".png");
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
      <div class="col-1-10-table">
     <?php $nama=$this->Bu_model->get_user_nama_asesor($komite[0]['komite_2']);
$path = base_url("assets/assets2/".$nama[0]['Username'].".png");
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
      <div class="col-1-10-table">
     <?php $nama=$this->Bu_model->get_user_nama_asesor($komite[0]['komite_3']);
$path = base_url("assets/assets2/".$nama[0]['Username'].".png");
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
     <div class="col-1-10-table">
      <?php $nama=$this->Bu_model->get_user_nama_asesor($komite[0]['komite_1']);
$path = base_url("assets/assets2/".$nama[0]['Username'].".png");
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
  <div class="row">
  <div class="col-1-10">
        
        </div>
    <div class="col-1-10-table">
        Nama
     </div>
     <div class="col-1-10-table">
        <br>
        <?=$komite[0]['komite_1'];?>
        <br>
        Pemutus 1
     </div>
       <div class="col-1-10-table">
        <br>
        <?=$komite[0]['komite_2'];?>
        <br>
        Pemutus 2
     </div>
       <div class="col-1-10-table">
        <br>
        <?=$komite[0]['komite_3'];?>
        <br>
        Pemutus 3
     </div>
     <div class="col-1-10-table">
     <br>
     <?=$komite[0]['komite_1'];?>
     <br>
     Peninjau
     </div>
    
  </div>
</section>
<section class="items">
    <div class="row">
          <div class="col-1-30">
            
          </div>
          <div class="col-1-30">
            
            </div>
            <div class="col-1-30">
            
            </div>
    </div>
    <div class="row">
          <div class="col-1-30">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        </div>
          <div class="col-1-30">
          <?php
                  // $path = base_url('assets/sertifikat/qrcodex/'.$qr_sps); sementara karena masalah server GCP
                  $path = base_url("assets/assets2/leo_2.png");
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
        <img src="<?=$base64 ;?>" style="margin-top:10px;border: 1px; max-height: 120px; max-width: 120px; ">
 <br>
          Leonasi D Wiranta, SE
            <br>
            Koordinator Sertifikasi 
            </div>
            <div class="col-1-30">
          <?php
                  // $path = base_url('assets/sertifikat/qrcodex/'.$qr_sps); sementara karena masalah server GCP
                  $path = base_url("assets/assets2/Josua.png");
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
        <img src="<?=$base64 ;?>" style="margin-top:10px;border: 1px; max-height: 220px; max-width: 220px; ">
 <br>
 <br>
 Josua Nikolas
            <br>
            Kepala Urusan Sertifikasi
            </div>
            
    </div>
    </section>

</body>
</html>
