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
  .berita_acara_right {
            margin-right: 0px;
            margin-top: 0px;
            float: right;
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
            font-size: 15px;
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
         .center {
    text-align: center;
    font-family: DejaVu Sans, sans-serif; /* font aman untuk PDF */
    font-size: 14px;
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
        .col-1-60-table {
            width: 60%;
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
         .logo {
            float: left;

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
      HASIL CEK KELENGKAPAN, VERIFIKASI DAN VALIDASI <br>
      DOKUMEN PENJUALAN TAHUNAN BADAN USAHA (FTP 01)


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

<br>
<br>
<?php
			
							
								if(!empty($penilaian_ftp01)){
									foreach($penilaian_ftp01 as $row_ceklis){
	 							  $count+=1;
	 							  for ($i=0; $i < count($penilaian_ftp01); $i++) {
	 							    if($row_ceklis['id']==$penilaian_ftp01[$i]['id']){
	 							      ${"data_kelengkapan".$row_ceklis['id']}=$row_ceklis['kelengkapan'];
									  ${"data_verifikasi".$row_ceklis['id']}=$row_ceklis['verifikasi'];
	 							      ${"data_validasi".$row_ceklis['id']}=$row_ceklis['validasi'];
	 							      ${"data_keterangan".$row_ceklis['id']}=$row_ceklis['keterangan'];
	 							    }
	 							  }
	 							}
								}
							  ;?>


  <section class="items">
  <!-- Header Baris 1 -->
  <div class="row">
    <div class="col-1-5-table" rowspan="2"><div class="center">No.</div></div>
    <div class="col-1-30-table" rowspan="2"><div class="center">Persyaratan</div></div>
    <div class="col-1-30-table" colspan="6"><div class="center">Dokumen</div></div>
    <div class="col-1-20-table" rowspan="2"><div class="center">Keterangan</div></div>
  </div>
    <div class="row">
   
   <div class="col-1-10-table" colspan="2"><div class="center">Kelengkapan</div></div>
     <div class="col-1-10-table" colspan="2"><div class="center">Verifikasi</div></div>
      <div class="col-1-10-table" colspan="2"><div class="center">Validasi</div></div>
  
  </div>

  <!-- Header Baris 2 -->
  <div class="row">
    <div class="col-1-5-table"></div>
    <div class="col-1-30-table"></div>
    <div class="col-1-5-table"><div class="center">Ada</div></div>
    <div class="col-1-5-table"><div class="center">Tidak Ada</div></div>
    <div class="col-1-5-table"><div class="center">Ada</div></div>
    <div class="col-1-5-table"><div class="center">Tidak Ada</div></div>
    <div class="col-1-5-table"><div class="center">Valid</div></div>
    <div class="col-1-5-table"><div class="center">Tidak Valid</div></div>
    <div class="col-1-5-table"></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center">1</div></div>
    <div class="col-1-30-table"><div class="center">2</div></div>
    <div class="col-1-5-table"><div class="center">3</div></div>
    <div class="col-1-5-table"><div class="center">4</div></div>
    <div class="col-1-5-table"><div class="center">5</div></div>
    <div class="col-1-5-table"><div class="center">6</div></div>
    <div class="col-1-5-table"><div class="center">7</div></div>
    <div class="col-1-5-table"><div class="center">8</div></div>
    <div class="col-1-20-table"><div class="center">9</div></div>
  </div>

  <!-- Baris Data -->
  <div class="row">
    <div class="col-1-5-table"><div class="center">1</div></div>
    <div class="col-1-30-table"><div class="left">DOKUMEN PEROLEHAN PENJUALAN TAHUNAN BADAN USAHA</div></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-20-table"></div>
  </div>
   <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Penilaian terhadap jenis pekerjaan dan bukti perolehannya</div></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-20-table"></div>
  </div>
  <?php $count=1 ;?>
  <?php foreach($penjualan_tahunan as $row_penjualan_tahunan):?>
  <?php $id_pengalaman=$row_penjualan_tahunan['nomor_registrasi_pengalaman'] ;?> 

  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Rekaman Kontrak <?= $count ;?></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_1"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_1"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_1"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_1"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_1"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_1"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?= ${"data_keterangan" . $id_pengalaman . "_1"};?></div>
  </div>
   <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Nomor Registrasi Pengalaman: <b><?=$row_penjualan_tahunan['nomor_registrasi_pengalaman']?></b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_2"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_2"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_2"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_2"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_2"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_2"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?= ${"data_keterangan" . $id_pengalaman . "_2"};?></div>
  </div>
   <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Nama paket pekerjaan: <b><?=$row_penjualan_tahunan['nama_pengalaman']?></b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_3"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_3"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_3"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_3"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_3"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_3"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?= ${"data_keterangan" . $id_pengalaman . "_3"};?></div>
  </div>
   <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Sumber dana: <b><?=$row_penjualan_tahunan['sumber_dana']?></b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_4"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_4"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_4"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_4"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_4"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_4"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?= ${"data_keterangan" . $id_pengalaman . "_4"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Lokasi pekerjaan: <b><?=$row_penjualan_tahunan['lokasi_pekerjaan']?></b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_5"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_5"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_5"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_5"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_5"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_5"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?= ${"data_keterangan" . $id_pengalaman . "_5"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Pemberi Tugas: <b><?=$row_penjualan_tahunan['pemberi_tugas']?></b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_6"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_6"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_6"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_6"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_6"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_6"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?= ${"data_keterangan" . $id_pengalaman . "_6"};?></div>
  </div>
   <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Nama Instansi Pemberi Tugas: <b><?=$row_penjualan_tahunan['nama_instansi_pemberi_tugas']?></b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_7"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_7"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_7"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_7"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_7"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_7"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?= ${"data_keterangan" . $id_pengalaman . "_7"};?></div>
  </div>
    <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Alamat Instansi Pemberi Tugas: <b><?=$row_penjualan_tahunan['alamat_pemberi_tugas']?></b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_8"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_8"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_8"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_8"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_8"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_8"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?= ${"data_keterangan" . $id_pengalaman . "_8"};?></div>
  </div>
     <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">No Telp Instansi Pemberi Tugas: <b><?=$row_penjualan_tahunan['no_telp_instansi_pemberi_tugas']?></b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_9"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_9"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_9"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_9"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_9"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_9"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?= ${"data_keterangan" . $id_pengalaman . "_9"};?></div>
  </div>
   <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Email Instansi Pemberi Tugas: <b><?=$row_penjualan_tahunan['email_instansi']?></b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_10"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_10"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_10"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_10"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_10"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_10"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?= ${"data_keterangan" . $id_pengalaman . "_10"};?></div>
  </div>
   <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Nama Pemberi Tugas: <b><?=$row_penjualan_tahunan['nama_pemberi_tugas']?></b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_11"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_11"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_11"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_11"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_11"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_11"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?= ${"data_keterangan" . $id_pengalaman . "_11"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Jabatan Pemberi Tugas: <b><?=$row_penjualan_tahunan['jabatan_pemberi_tugas']?></b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_12"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_12"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_12"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_12"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_12"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_12"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?= ${"data_keterangan" . $id_pengalaman . "_12"};?></div>
  </div>
    <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">No Kontrak: <b><?=$row_penjualan_tahunan['nomor_kontrak']?></b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_13"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_13"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_13"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_13"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_13"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_13"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?= ${"data_keterangan" . $id_pengalaman . "_13"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Tanggal Kontrak: <b><?=$row_penjualan_tahunan['tgl_kontrak']?></b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_14"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_14"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_14"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_14"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_14"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_14"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?= ${"data_keterangan" . $id_pengalaman . "_14"};?></div>
  </div>
    <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Nilai Kontrak:Rp. <b><?=number_format($row_pengalaman['nilai_kontrak'],0,",",".") ;?></b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_15"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_15"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_15"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_15"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_15"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_15"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?= ${"data_keterangan" . $id_pengalaman . "_15"};?></div>
  </div>
    <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Nilai Kontrak (setelah addendum):Rp. <b><?=number_format($row_pengalaman['nilai_kontrak_adendum'],0,",",".") ;?></b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_16"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_16"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_16"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_16"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_16"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_16"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?= ${"data_keterangan" . $id_pengalaman . "_16"};?></div>
  </div>
    <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Status KSO: <b><?=$row_penjualan_tahunan['status_kso']?></b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_17"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_17"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_17"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_17"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_17"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_17"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?= ${"data_keterangan" . $id_pengalaman . "_17"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Presentase Porsi: <b><?=$row_penjualan_tahunan['presentase_porsi']?></b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_18"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_18"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_18"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_18"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_18"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_18"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?= ${"data_keterangan" . $id_pengalaman . "_18"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Nilai Kontrak sesuai Porsi:Rp. <b><?=number_format($row_pengalaman['nilai_kontrak_sesuai_porsi'],0,",",".") ;?></b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_19"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_19"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_19"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_19"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_19"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_19"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?= ${"data_keterangan" . $id_pengalaman . "_19"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">No BA Serah Terima: <b><?=$row_penjualan_tahunan['no_bash']?></b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_20"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_20"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_20"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_20"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_20"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_20"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?= ${"data_keterangan" . $id_pengalaman . "_20"};?></div>
  </div>
    <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Tanggal BA Serah Terima: <b><?=$row_penjualan_tahunan['tgl_bash']?></b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_21"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pengalaman . "_21"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_21"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pengalaman . "_21"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_21"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pengalaman . "_21"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?= ${"data_keterangan" . $id_pengalaman . "_21"};?></div>
  </div>
  <?php $count+=1 ;?>
  <?php endforeach ;?>
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
        <strong><?=$catatan_ftp01[0]['catatan'];?></strong>
      </div>
    </div>

  

    <!-- Kolom Kanan (TTD) -->
    <div class="col-1-20-table" style="border: 1px solid black;">
       <div class="center">
          Asesor 1

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
