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
        .berita_acara_right {
            margin-right: 0px;
            margin-top: 0px;
            float: right;
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
HASIL CEK KELENGKAPAN, VERIFIKASI DAN VALIDASI DOKUMEN KETERSEDIAAN TENAGA KERJA BADAN USAHA KONSTRUKSI<br> (FTKK 01)
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
    <div class="col-1-5-table"><div class="center">1.</div></div>
    <div class="col-1-30-table"><div class="left">Permohonan Sertifikasi Badan Usaha<br> <a href="<?=$biodata[0]['sptjm'];?>" target="_blank" ><i>link dokumen</i></a></div></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-20-table"></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center">2.</div></div>
    <div class="col-1-30-table"><div class="left">Formulir Data Isian Tenaga Kerja Konstruksi</div></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-20-table"></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center">a. </div></div>
    <div class="col-1-30-table"><div class="left">Penanggung Jawan Badan Usaha (PJBU)</div></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-20-table"></div>
  </div>
   <?php
			if(!empty($penilaian_ftkk01)){
									foreach($penilaian_ftkk01 as $row_ceklis){
	 							  $count+=1;
	 							  for ($i=0; $i < count($penilaian_ftkk01); $i++) {
	 							    if($row_ceklis['id']==$penilaian_ftkk01[$i]['id']){
	 							      ${"data_kelengkapan".$row_ceklis['id']}=$row_ceklis['kelengkapan'];
									  ${"data_verifikasi".$row_ceklis['id']}=$row_ceklis['verifikasi'];
	 							      ${"data_validasi".$row_ceklis['id']}=$row_ceklis['validasi'];
	 							      ${"data_keterangan".$row_ceklis['id']}=$row_ceklis['keterangan'];
	 							    }
	 							  }
	 							}
								}
							  ;?>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Nomor NIK/KTP:<b><?=$pjbu[0]['nik'];?></b></div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan90=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan90=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi90=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi90=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi90=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi90=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan90;?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Nama:<b><?=$pjbu[0]['nama'];?></b></div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan91=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan91=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi91=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi91=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi91=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi91=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan91;?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Nomor NPWP:<b><?=$pjbu[0]['npwp'];?></b></div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan92=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan92=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi92=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi92=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi92=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi92=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan92;?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">	Surat Pernyataan Tanggung Jawab mutlak<br> <a href="<?=$biodata[0]['sptjm'];?>" target="_blank" ><i>link dokumen</i></a></div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan93=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan93=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi93=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi93=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi93=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi93=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan93;?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center">b. </div></div>
    <div class="col-1-30-table"><div class="left">Penanggung Jawab Teknik Badan Usaha(PJTBU)</div></div>
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
    <div class="col-1-30-table"><div class="left">NIK/No KTP: <b><?= $pjtbu[0]['nik'];?></b></div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan2=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan2=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi2=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi2=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi2=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi2=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan2;?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Nama: <b><?= $pjtbu[0]['nama'];?></b></div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan3=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan3=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi3=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi3=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi3=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi3=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan3;?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Nomor NPWP : <b><?= $pjtbu[0]['npwp'];?></b></div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan4=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan4=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi4=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi4=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi4=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi4=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan4;?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Nomor Registrasi SKK: <b><?= $pjtbu[0]['noreg_skk'];?></b></div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan5=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan5=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi5=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi5=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi5=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi5=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan5;?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Klasifikasi SKK: <b><?= $pjtbu[0]['klasifikasi_skk'];?></b></div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan6=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan6=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi6=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi6=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi6=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi6=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan6;?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Subklasifikasi SKK: <b><?= $pjtbu[0]['sub_klasifikasi'];?></b></div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan7=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan7=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi7=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi7=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi7=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi7=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan7;?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Kualifikasi SKK: <b><?= $pjtbu[0]['kualifikasi_skk'];?></b></div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan8=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan8=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi8=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi8=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi8=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi8=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan8;?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Jenjang: <b><?= $pjtbu[0]['jenjang_skk'];?></b></div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan9=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan9=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi9=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi9=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi9=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi9=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan9;?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Tanggal Terbit SKK: <b><?= $pjtbu[0]['tanggal_terbit_skk'];?></b></div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan11=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan11=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi11=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi11=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi11=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi11=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan11;?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">No Registrasi ACPE/AA: <b><?= $pjtbu[0]['nomor_registrasi_acpe_aa'];?></b></div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan12=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan12=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi12=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi12=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi12=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi12=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan12;?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Klasifikasi ACPE/AA: <b><?= $pjtbu[0]['klasifikasi_acpe_aa'];?></b></div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan13=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan13=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi13=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi13=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi13=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi13=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan13;?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Surat Tanggung jawab Mutlak<br> <a href="<?=$biodata[0]['sptjm'];?>" target="_blank" ><i>link dokumen</i></a></div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan14=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan14=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi14=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi14=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi14=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi14=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan14;?></div>
  </div>
    <div class="row">
    <div class="col-1-5-table"><div class="center">c.</div></div>
    <div class="col-1-30-table"><div class="left"> Penanggung Jawab Sub Klasifikasi Badan Usaha(PJSKBU)</div></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-20-table"></div>
  </div>
  <?php foreach($pjskbu as $row_pjskbu) :?>
			<?php $id_pjbu=$row_pjskbu['nik'] ;?>
      <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">NIK/KTP: <b><?= $row_pjskbu['nik'];?></b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pjbu. "_16"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pjbu. "_16"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pjbu. "_16"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pjbu. "_16"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pjbu. "_16"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pjbu. "_16"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan" . $id_pjbu. "_16"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Nama: <b><?= $row_pjskbu['nama'];?></b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pjbu. "_17"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pjbu. "_17"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pjbu. "_17"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pjbu. "_17"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pjbu. "_17"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pjbu. "_17"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan" . $id_pjbu. "_17"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Nomor NPWP : <b><?= $row_pjskbu['npwp'];?></b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pjbu. "_18"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pjbu. "_18"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pjbu. "_18"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pjbu. "_18"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pjbu. "_18"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pjbu. "_18"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan" . $id_pjbu. "_18"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Nomor Registrasi SKK : <b><?= $row_pjskbu['noreg_skk'];?></b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pjbu. "_19"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pjbu. "_19"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pjbu. "_19"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pjbu. "_19"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pjbu. "_19"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pjbu. "_19"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan" . $id_pjbu. "_19"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Klasifikasi SKK : <b><?= $row_pjskbu['klasifikasi_skk'];?></b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pjbu. "_20"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pjbu. "_20"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pjbu. "_20"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pjbu. "_20"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pjbu. "_20"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pjbu. "_20"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan" . $id_pjbu. "_20"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Subklasifikasi SKK : <b><?= $row_pjskbu['sub_klasifikasi'];?></b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pjbu. "_21"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pjbu. "_21"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pjbu. "_21"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pjbu. "_21"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pjbu. "_21"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pjbu. "_21"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan" . $id_pjbu. "_21"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Kualifikasi SKK : <b><?= $row_pjskbu['kualifikasi_skk'];?></b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pjbu. "_22"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pjbu. "_22"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pjbu. "_22"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pjbu. "_22"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pjbu. "_22"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pjbu. "_22"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan" . $id_pjbu. "_22"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Jenjang : <b><?= $row_pjskbu['jenjang_skk'];?></b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pjbu. "_23"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pjbu. "_23"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pjbu. "_23"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pjbu. "_23"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pjbu. "_23"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pjbu. "_23"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan" . $id_pjbu. "_23"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Tanggal Terbit SKK : <b><?= $row_pjskbu['tanggal_terbit_skk'];?></b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pjbu. "_25"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pjbu. "_25"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pjbu. "_25"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pjbu. "_25"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pjbu. "_25"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pjbu. "_25"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan" . $id_pjbu. "_25"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">No Registrasi ACPE/AA : <b><?= $row_pjskbu['nomor_registrasi_acpe_aa'];?></b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pjbu. "_26"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pjbu. "_26"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pjbu. "_26"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pjbu. "_26"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pjbu. "_26"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pjbu. "_26"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan" . $id_pjbu. "_26"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Klasifikasi ACPE/AA : <b><?= $row_pjskbu['klasifikasi_acpe_aa'];?></b></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pjbu. "_27"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pjbu. "_27"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pjbu. "_27"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pjbu. "_27"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pjbu. "_27"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pjbu. "_27"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan" . $id_pjbu. "_27"};?></div>
  </div>
   <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Surat Tanggung Jawab Mutlak<br> <a href="<?=$biodata[0]['sptjm'];?>" target="_blank" ><i>link dokumen</i></a></div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pjbu. "_28"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan" . $id_pjbu. "_28"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pjbu. "_28"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi" . $id_pjbu. "_28"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pjbu. "_28"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi" . $id_pjbu. "_28"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan" . $id_pjbu. "_28"};?></div>
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
        <strong><?=$catatan_ftkk01[0]['catatan'];?></strong>
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
