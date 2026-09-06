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
        .berita_acara_right {
            margin-right: 0px;
            margin-top: 0px;
            float: right;
        }
        .berita_acara {
            font-size: 20px;
            margin-right: 0px;
            margin-top: 0px;
            float: left;
        }
        .kop_surat {
            font-size: 15px;
            margin-left: 30px;
            margin-top: 15px;
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
            text-align: center;
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
            font-family: DejaVu Sans, sans-serif; /* font aman untuk PDF */
            font-size: 14px;
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
    

</section>


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
                    curl_close($ch);
                  $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
                   ;?>
          <img src="<?=$base64 ;?>" style="margin-top:10px;border: 1px; max-height: 190px; max-width: 120px; ">

        </div>
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

    </div>

  </section>
<hr>
  <section class="items">
    <div class="center">
     FORMULIR VERIFIKASI DAN VALIDASI SERTIFIKAT ISO 37001-2016 BADAN USAHA JASA KONSTRUKSI<br> (FSMAP 01)
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
          Asosiasi
        </div>
        <div class="col-1-10">
          : <?=$klasifikasi[0]['nama_asosiasi'];?>
        </div>


    </div>
    <div class="row">
        <div class="col-1-10">
          Klasifikasi, Kode
        </div>
        <div class="col-1-10">
          : <?=$klasifikasi[0]['deskripsi_klasifikasi'];?>, <?=$klasifikasi[0]['id_klasifikasi'];?>
        </div>


    </div>
     <div class="row">
        <div class="col-1-10">
          Subklasifikasi, Kode
        </div>
        <div class="col-1-10">
          : <?=$klasifikasi[0]['deskripsi_subklasifikasi'];?>, <?=$klasifikasi[0]['id_sub_klasifikasi'];?>
        </div>


    </div>
     <div class="row">
        <div class="col-1-10">
          Kualifikasi
        </div>
        <div class="col-1-10">
          : <?=$klasifikasi[0]['kualifikasi'];?>
        </div>


    </div>
    
     <div class="row">
        <div class="col-1-10">
          Jenis Usaha
        </div>
        <div class="col-1-10">
          : <?=$klasifikasi[0]['deskripsi_jenis'];?>
        </div>


    </div>
     <div class="row">
        <div class="col-1-10">
          Sifat Usaha
        </div>
        <div class="col-1-10">
          : <?=$klasifikasi[0]['nama_sifat'];?>
        </div>


    </div>
     <div class="row">
        <div class="col-1-10">
          Tgl Permohonan
        </div>
        <div class="col-1-10">
          : <?=$klasifikasi[0]['tgl_permohonan'];?>
        </div>


    </div>
     <div class="row">
        <div class="col-1-10">
          Jenis Permohonan
        </div>
        <div class="col-1-10">
          : <?php if($klasifikasi[0]['perpanjangan']=='1'){
            echo "Perpanjangan";
          }else{
            echo "Baru";
          } ;?>
        </div>


    </div>
    




  </section>

<?php
			
							
								if(!empty($penilaian_fsmap01)){
									foreach($penilaian_fsmap01 as $row_ceklis){
	 							  $count+=1;
	 							  for ($i=0; $i < count($penilaian_fsmap01); $i++) {
	 							    if($row_ceklis['id']==$penilaian_fsmap01[$i]['id']){
	 							      ${"data_kelengkapan_".$row_ceklis['id']}=$row_ceklis['kelengkapan'];
									  ${"data_verifikasi_".$row_ceklis['id']}=$row_ceklis['verifikasi'];
	 							      ${"data_validasi_".$row_ceklis['id']}=$row_ceklis['validasi'];
	 							      ${"data_keterangan_".$row_ceklis['id']}=$row_ceklis['keterangan'];
									  ${"data_item_".$row_ceklis['id']}=$row_ceklis['item'];
	 							    }
	 							  }
	 							}
								}
							  ;?>

<section class="items">
  <!-- Header 1 -->
  <div class="row">
    <div class="col-1-5-table"><div class="center">No.</div></div>
    <div class="col-1-30-table"><div class="center">ITEM</div></div>
    <div class="col-1-5-table" colspan="2"><div class="center">KELENGKAPAN</div></div>
    <div class="col-1-5-table" colspan="2"><div class="center">VERIFIKASI</div></div>
    <div class="col-1-5-table" colspan="2"><div class="center">VALIDASI</div></div>
    <div class="col-1-5-table" colspan="1"><div class="center">KETERANGAN</div></div>
  </div>

  <!-- Header 2 (Subkolom) -->
  <div class="row">
    <div class="col-1-5-table"><div class="center">(1)</div></div>
    <div class="col-1-30-table"><div class="center">(2)</div></div>
    <div class="col-1-5-table"><div class="center">(3)<br> Ada</div></div>
    <div class="col-1-5-table"><div class="center">(4)<br> Tidak Ada</div></div>
    <div class="col-1-5-table"><div class="center">(5)<br> Ada</div></div>
    <div class="col-1-5-table"><div class="center">(6)<br> Tidak Ada</div></div>
    <div class="col-1-5-table"><div class="center">(7)<br> Valid</div></div>
    <div class="col-1-5-table"><div class="center">(8)<br> Tidak Valid</div></div>
    <div class="col-1-5-table"><div class="center">(9)<br> Rekomendasi</div></div>
  </div>

  <!-- Baris Data 1 -->
  <div class="row">
    <div class="col-1-5-table"><div class="center">1.</div></div>
    <div class="col-1-30-table">Jenis Sertifikat : <?=${"data_item_1"};?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan_1=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan_1=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi_1=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi_1=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi_1=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi_1=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_keterangan_1=='1') :?>SESUAI<?php else :?>TIDAK SESUAI<?php endif ;?></div>
  </div>

  <!-- Baris Data 2 -->
  <div class="row">
    <div class="col-1-5-table"><div class="center">2.</div></div>
    <div class="col-1-30-table">Penerbit : <?=${"data_item_2"};?></div>
   <div class="col-1-5-table"><?php if($data_kelengkapan_2=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan_2=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi_2=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi_2=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi_2=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi_2=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_keterangan_2=='1') :?>SESUAI<?php else :?>TIDAK SESUAI<?php endif ;?></div>
  
  </div>

  <!-- Baris Data 3 -->
  <div class="row">
    <div class="col-1-5-table"><div class="center">3.</div></div>
    <div class="col-1-30-table">Tahun Terbit : <?=${"data_item_3"};?></div>
   <div class="col-1-5-table"><?php if($data_kelengkapan_3=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan_3=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi_3=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi_3=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi_3=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi_3=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_keterangan_3=='1') :?>SESUAI<?php else :?>TIDAK SESUAI<?php endif ;?></div>
  </div>

  <!-- Baris Data 4 -->
  <div class="row">
    <div class="col-1-5-table"><div class="center">4.</div></div>
    <div class="col-1-30-table">Masa Berlaku :<?=${"data_item_4"};?></div>
   <div class="col-1-5-table"><?php if($data_kelengkapan_4=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan_4=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi_4=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi_4=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi_4=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi_4=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_keterangan_4=='1') :?>SESUAI<?php else :?>TIDAK SESUAI<?php endif ;?></div>
  
  </div>
</section>
  <section class="items">
  <!-- Baris 1: Catatan atas -->
  <div class="row">
    <div class="col-1-60-table" colspan="2">
      <div class="center"><strong><strong>Lembaga Sertifikasi Badan Usaha (LSBU)</strong></div>
    </div>
  </div>

  <!-- Baris 2: Tiga kolom -->
  <div class="row">
    <!-- Kolom Kiri -->
    <div class="col-1-60-table" style="border: 1px solid black;">
      <div class="left">
        <strong><?=$catatan_fsmap01[0]['catatan'];?></strong>
      </div>
    </div>

  

    <!-- Kolom Kanan (TTD) -->
    <div class="col-1-20-table" style="border: 1px solid black;">
       <div class="center">
          Asesor 

          <br>
          <img src="<?=$asesor[0]['persyaratan'] ;?>" style=";border: 1px; max-height: 110px;">

          <br>
          <?=$asesor[0]['Nama'] ;?>
          <br>

        </div>
    </div>
  </div>
</section>
</html>
