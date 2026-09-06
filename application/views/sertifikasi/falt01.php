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
            font-size: 15px;
            
            margin-top: -50px;

            text-align:center;
            float: center;
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
        .col-1-60-table {
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
  <br>
<hr>
  <section class="items">
    <div class="center">
      HASIL CEK KELENGKAPAN, VERIFIKASI DAN VALIDASI KEMAMPUAN PENYEDIAAN PERALATAN KONSTRUKSI BADAN USAHA <br> (FALT 01)
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
          : <?=$klasifikasi[0]['klasifikasi'];?>, <?=$klasifikasi[0]['id_klasifikasi'];?>
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
          : <?=$klasifikasi[0]['nama_jenis_usaha'];?>
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
			
							
								if(!empty($penilaian_falt01)){
									foreach($penilaian_falt01 as $row_ceklis){
	 							  $count+=1;
	 							  for ($i=0; $i < count($penilaian_falt01); $i++) {
	 							    if($row_ceklis['id']==$penilaian_falt01[$i]['id']){
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
  <div class="row">
    <div class="col-1-5-table"><div class="center">I</div></div>
    <div class="col-1-30-table"><div class="left">Permohonan Sertifikasi Badan Usaha / Data Elektonik<br> <a href="<?=$biodata[0]['sptjm'];?>" target="_blank" ><i>link dokumen</i></a></div></div>
      <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-20-table"></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center">II</div></div>
    <div class="col-1-30-table"><div class="left">Dokumen Kemampuan Dalam Penyediaan Peralatan Konstruksi Badan Usaha/ Data Elektronik</div></div>
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
    <div class="col-1-30-table"><div class="left">A. Jenis Peralatan, Bukti Kepemilikan dan Bukti sewa Peralatan Konstruksi</div></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-20-table"></div>
  </div>
  <?php foreach($peralatan as $row_peralatan) :?>
			<?php $id_perlatan=$row_peralatan['nomor_registrasi_peralatan'] ;?>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Nama Peralatan Utama: <b> <?=$row_peralatan['subvarian'];?> </b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_perlatan . "_2"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_perlatan . "_2"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_perlatan . "_2"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_perlatan . "_2"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_perlatan . "_2"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_perlatan . "_2"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan" . $id_perlatan . "_2"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Nomor Registrasi Peralatan: <b> <?=$row_peralatan['nomor_registrasi_peralatan'];?> </b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_perlatan . "_3"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_perlatan . "_3"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_perlatan . "_3"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_perlatan . "_3"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_perlatan . "_3"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_perlatan . "_3"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan" . $id_perlatan . "_3"};?></div>
  </div>
   <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Jenis/Macam/Subvarian/Peralatan Utama: <b> <?=$row_peralatan['tipe_peralatan'];?> </b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_perlatan . "_4"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_perlatan . "_4"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_perlatan . "_4"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_perlatan . "_4"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_perlatan . "_4"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_perlatan . "_4"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan" . $id_perlatan . "_4"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Merk & Nomor seri peralatan: <b> <?=$row_peralatan['merek'];?> </b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_perlatan . "_5"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_perlatan . "_5"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_perlatan . "_5"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_perlatan . "_5"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_perlatan . "_5"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_perlatan . "_5"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan" . $id_perlatan . "_5"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Model/Type: <b> <?=$row_peralatan['model_type'];?> </b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_perlatan . "_6"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_perlatan . "_6"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_perlatan . "_6"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_perlatan . "_6"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_perlatan . "_6"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_perlatan . "_6"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan" . $id_perlatan . "_6"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Kapasitas Sesuai Spesifikasi Produsen : <b> <?=$row_peralatan['kapasitas'];?> </b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_perlatan . "_7"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_perlatan . "_7"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_perlatan . "_7"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_perlatan . "_7"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_perlatan . "_7"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_perlatan . "_7"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan" . $id_perlatan . "_7"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Kapasitas Sesuai Hasil Pengujian : <b> <?=$row_peralatan['kapasitas_hasil_uji'];?> </b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_perlatan . "_8"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_perlatan . "_8"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_perlatan . "_8"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_perlatan . "_8"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_perlatan . "_8"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_perlatan . "_8"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan" . $id_perlatan . "_8"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Unit/Satuan Kapasitas sesuai dengan
satuan pada dokumen hasil pengujian/pemeriksaan : <b> <?=$row_peralatan['kapasitas_hasil_uji'];?> </b>
</div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_perlatan . "_9"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_perlatan . "_9"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_perlatan . "_9"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_perlatan . "_9"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_perlatan . "_9"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_perlatan . "_9"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan" . $id_perlatan . "_9"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Tahun Pembuatan: <b> <?=$row_peralatan['tahun'];?> </b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_perlatan . "_10"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_perlatan . "_10"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_perlatan . "_10"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_perlatan . "_10"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_perlatan . "_10"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_perlatan . "_10"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan" . $id_perlatan . "_10"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Tahun Pembelian</div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_perlatan . "_11"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_perlatan . "_11"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_perlatan . "_11"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_perlatan . "_11"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_perlatan . "_11"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_perlatan . "_11"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan" . $id_perlatan . "_11"};?></div>
  </div>
   <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Provinsi Lokasi: <b> <?=$row_peralatan['lokasi'];?> </b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_perlatan . "_12"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_perlatan . "_12"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_perlatan . "_12"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_perlatan . "_12"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_perlatan . "_12"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_perlatan . "_12"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan" . $id_perlatan . "_12"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Kabupaten/Kota Lokasi: <b> <?=$row_peralatan['kab_kota'];?> </b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_perlatan . "_13"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_perlatan . "_13"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_perlatan . "_13"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_perlatan . "_13"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_perlatan . "_13"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_perlatan . "_13"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan" . $id_perlatan . "_13"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Jenis Bukti Kepemilikan: <b> <?=$row_peralatan['jenis_bukti_kepemilikan'];?> </b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_perlatan . "_14"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_perlatan . "_14"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_perlatan . "_14"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_perlatan . "_14"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_perlatan . "_14"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_perlatan . "_14"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan" . $id_perlatan . "_14"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center">B</div></div>
    <div class="col-1-30-table"><div class="left">Surat Pernyataan Pemenuhan Komitmen Kepemilikan Peralatan Konstruks (dilampirkan dalam dokumen permohonan)
<br> <a href="<?=$row_peralatan['surat_pernyataan'];?>" target="_blank" ><i>link dokumen</i></a>
</div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_perlatan . "_15"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_perlatan . "_15"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_perlatan . "_15"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_perlatan . "_15"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_perlatan . "_15"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_perlatan . "_15"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan" . $id_perlatan . "_15"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">C. 	Surat Pernyataan Pemenuhan Komitmen Penyewaan Peralatan Konstruksidilampirkan dalam dokumen permohonan)
<br> <a href="<?=$row_peralatan['surat_pernyataan'];?>" target="_blank" ><i>link dokumen</i></a>					
</div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_perlatan . "_16"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_perlatan . "_16"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_perlatan . "_16"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_perlatan . "_16"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_perlatan . "_16"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_perlatan . "_16"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan" . $id_perlatan . "_16"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">D. Surat Perjanjian Sewa
(dilampirkan dalam dokumen permohonan) 
</div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_perlatan . "_17"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_perlatan . "_17"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_perlatan . "_17"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_perlatan . "_17"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_perlatan . "_17"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_perlatan . "_17"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan" . $id_perlatan . "_17"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Tanggal Sewa</div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_perlatan . "_18"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_perlatan . "_18"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_perlatan . "_18"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_perlatan . "_18"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_perlatan . "_18"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_perlatan . "_18"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan" . $id_perlatan . "_18"};?></div>
  </div>
 
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Lokasi Kerja</div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_perlatan . "_19"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_perlatan . "_19"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_perlatan . "_19"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_perlatan . "_19"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_perlatan . "_19"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_perlatan . "_19"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan" . $id_perlatan . "_19"};?></div>
  </div>
   <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Harga Sewa</div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_perlatan . "_20"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_perlatan . "_20"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_perlatan . "_20"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_perlatan . "_20"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_perlatan . "_20"}=='1') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_perlatan . "_20"}=='0') :?><div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan" . $id_perlatan . "_20"};?></div>
  </div>
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
        <strong><?=$catatan_falt01[0]['catatan'];?></strong>
      </div>
    </div>

  

    <!-- Kolom Kanan (TTD) -->
    <div class="col-1-20-table" style="border: 1px solid black;">
      <div class="center">
        <br>
        <br>
                         <?php
$user=$this->Bu_model->get_user($penilaian_falt01[0]['asesor']);
$path = base_url("assets/bukti/ttd/".$user[0]['Username'].".png");
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
             
                     <img src="<?=$base64 ;?>" style=";border: 1px; max-height: 90px;">
                     <br>
                     <?=$user[0]['Nama'];?>
      </div>
    </div>
  </div>
</section>
</html>
