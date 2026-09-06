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
<hr>
  <section class="items">
    <div class="center">
     FORMULIR PENILAIAN KEMAMPUAN KEUANGAN BADAN USAHA BERSIFAT UMUM
     <br> (FKK 03)
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
<?php
$total_saham=0;
 foreach($pemegang_saham as $row_saham){
      $total_saham+=$row_saham['modal_disetor'];


} ;?>

<section class="items">
  <!-- Judul -->
  <div class="row">
    <div class="col-1-40-table" colspan="6">
      <div class="center"><strong>BADAN USAHA BERSIFAT UMUM</strong></div>
    </div>
  </div>

  <!-- Baris Modal Perusahaan -->
  <div class="row">
    <div class="col-1-10-table" rowspan="2"><div class="center">Modal Perusahaan</div></div>
    <div class="col-1-10-table" colspan="2"><div class="center">Dasar</div></div>
    <div class="col-1-10-table" colspan="2"><div class="center">Disetor</div></div>
    <div class="col-1-10-table" rowspan="2"><div class="center">%</div></div>
  </div>
  <div class="row">
    <div class="col-1-10-table"><div class="center">Rp.</div></div>
    <div class="col-1-10-table">&nbsp;</div>
    <div class="col-1-10-table"><div class="center">Rp.</div></div>
    <div class="col-1-10-table">&nbsp;</div>
  </div>

  <!-- Header Pemilik Saham -->
  <div class="row">
    <div class="col-1-10-table"><div class="center">Pemilik Saham</div></div>
    <div class="col-1-10-table"><div class="center">Jumlah</div></div>
    <div class="col-1-10-table"><div class="center">Nilai (Rp)</div></div>
    <div class="col-1-10-table"><div class="center">Total (Rp)</div></div>
    <div class="col-1-10-table"><div class="center">%</div></div>
    <div class="col-1-10-table">&nbsp;</div>
  </div>
	<?php
							  $count=0;
								if(!empty($penilaian_fkk03)){
									foreach($penilaian_fkk03 as $row_ceklis){
	 							  $count+=1;
	 							  for ($i=0; $i < count($penilaian_fkk03); $i++) {
	 							    if($row_ceklis['nik']==$penilaian_fkk03[$i]['nik']){
	 							      ${"data_jumlah".$row_ceklis['nik']}=$row_ceklis['jumlah'];
									  ${"data_nilai".$row_ceklis['nik']}=$row_ceklis['nilai'];
	 							      ${"data_total".$row_ceklis['nik']}=$row_ceklis['total'];
	 							      ${"data_persen".$row_ceklis['nik']}=$row_ceklis['persen'];
									  ${"data_ekuitas".$row_ceklis['nik']}=$row_ceklis['ekuitas'];
	 							    }
	 							  }
	 							}
								}
							
							  ;?>
  <?php $count=1 ;?>
  <?php foreach($pemegang_saham as $row_saham) :?>
  <?php $id_sahamx=$row_saham['no_ktp'] ;?>

  <div class="row">
    <div class="col-1-10-table"><?= $row_saham['nama_pemilik'] ;?></div>
    <div class="col-1-10-table"><?=${"data_jumlah" . $id_sahamx};?></div>
    <div class="col-1-10-table"><?=${"data_nilai" . $id_sahamx};?></div>
    <div class="col-1-10-table"><?=${"data_total" . $id_sahamx};?></div>
    <div class="col-1-10-table"><?=${"data_persen" . $id_sahamx};?></div>
    <div class="col-1-10-table"></div>
  </div>
  <?php endforeach ;?>


  <!-- Total Saham -->
  <div class="row">
    <div class="col-1-30-table" colspan="3"><strong>Total saham</strong></div>
    <div class="col-1-30-table" colspan="3"><div class="center"><strong>
      <?php if($klasifikasi[0]['Kualifikasi']=="K"){
													echo "Kecil";
												}elseif($klasifikasi[0]['Kualifikasi']=="M"){
													echo "Menengah";
												}elseif($klasifikasi[0]['Kualifikasi']=="B"){
													echo "besar";
												} ;?>
    </strong></div></div>
  </div>

  <!-- Total Ekuitas -->
  <div class="row">
    <div class="col-1-10-table"><strong>Total Ekuitas</strong></div>
    <div class="col-1-30-table" colspan="2"><strong><?=${"data_ekuitas" . $id_sahamx}?></strong></div>
    <div class="col-1-10-table" colspan="3">&nbsp;</div>
  </div>
</section>

<!-- CATATAN LSBU -->
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
        <strong><?=$catatan_fkk03[0]['catatan'];?></strong>
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
