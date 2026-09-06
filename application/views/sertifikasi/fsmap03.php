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
     FORMULIR VERIFIKASI DAN VALIDASI DOKUMEN PENERAPAN SMAP

BADAN USAHA JASA KONSTRUKSI YANG BERUPA DOKUMEN PENERAPAN SESUAI PERMEN PUPR NO 8 TAHUN 2022<br>
(FSMAP-03)
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
								if(!empty($penilaian_fkk01)){
                    foreach($penilaian_fkk01 as $row_ceklis){
                    $count+=1;
                    for ($i=0; $i < count($penilaian_fkk01); $i++) {
                      if($row_ceklis['id']==$penilaian_fkk01[$i]['id']){
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
    <div class="col-1-5-table"><div class="center">I</div></div>
    <div class="col-1-30-table"><div class="left">DOKUMEN PERENCANAAN SMAP</div></div>
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
    <div class="col-1-30-table"><div class="left">Pedoman SMAP</div></div>
     <div class="col-1-5-table"><?php if($data_kelengkapan1=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan1=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi91=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi1=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi1=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi1=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan1;?></div>
  </div>
   <div class="row">
    <div class="col-1-5-table"><div class="center">1.</div></div>
    <div class="col-1-30-table"><div class="left"><b>Kebijakan anti penyuapan (Klausul 5.2)*</b></div></div>
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
    <div class="col-1-30-table"><div class="left"> Contoh Dokumen : 
				 <br>- Komitmen Anti Penyuapan dan/atau; 
				 <br>- Kebijakan Anti Penyuapan</div></div>
     <div class="col-1-5-table"><?php if($data_kelengkapan2=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan2=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi92=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi2=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi2=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi2=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan2;?></div>
  </div>
   <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left"><b>Identifikasi risiko (Klausul 4.5)*</b></div></div>
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
    <div class="col-1-30-table"><div class="left">	 Contoh Dokumen : 
				 <br>- Hasil Identifikasi risiko/ Penilaian risiko penyuapan<br>
				 - Rekaman Pakta Integritas/ Komitmen Anti Penyuapan Rekan Bisnis
			</div></div>
     <div class="col-1-5-table"><?php if($data_kelengkapan3=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan3=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi93=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi3=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi3=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi3=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan3;?></div>
  </div>
   <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left"><b>Memahami organisasi, dan konteksnya (Klausul 4.1)*</b></div></div>
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
    <div class="col-1-30-table"><div class="left">	Contoh Dokumen :<br>
- Identifikasi Isu Internal dan Eksternal, atau;<br>
- Pedoman Anti Penyuapan yang memuat lampiran Identifikasi Isu Internal dan Eksternal<br>
- Struktur Organisasi, Tugas, Tanggungjawab dan Wewenang</div></div>
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
    <div class="col-1-30-table"><div class="left"><b>Sasaran anti penyuapan dan perencanaan untuk mencapainya (Kalusul 6.2)*</b></div></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-20-table"></div>
  </div>
   <div class="row">
    <div class="col-1-5-table"><div class="center">4.</div></div>
    <div class="col-1-30-table"><div class="left">Contoh Dokumen : <br>- Sasaran Anti Penyuapan, atau <br>- Pedoman Anti Penyuapan yang memuat lampiran Sasaran Anti Penyuapan</div></div>
   <div class="col-1-5-table"><?php if($data_kelengkapan5=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan5=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi5=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi5=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi5=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi5=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan5;?></div>
  </div>
   <div class="row">
    <div class="col-1-5-table"><div class="center">5. </div></div>
    <div class="col-1-30-table"><div class="left"><b>Sumber daya, Struktur organisasi, dan Pertanggungjawaban (Klausul 7.1)*</b></div></div>
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
    <div class="col-1-30-table"><div class="left">Contoh Dokumen : <br>- Struktur Organisasi dan Tugas Wewenang yang diberi tugas mengelola manajemen anti penyuapan, atau <br>- Pedoman Anti Penyuapan yang memuat lampiran Struktur Organisasi, Tugas, Tanggungjawab dan Wewenang yang diberi tugas mengelola manajemen anti penyuapan.</div></div>
     <div class="col-1-5-table"><?php if($data_kelengkapan6=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan6=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi6=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi6=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi6=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi6=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan6;?></div>
  </div>
   <div class="row">
    <div class="col-1-5-table"><div class="center">6.</div></div>
    <div class="col-1-30-table"><div class="left"><b>Kompetensi, Pelatihan, dan Kepedulian (Klausul 7.2 dan 7.3)*</b></div></div>
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
    <div class="col-1-30-table"><div class="left">Contoh Dokumen : <br>- Prosedur Pengelolaan Personel atau Rekrutmen Personel <br>- Prosedur Pelatihan Personel <br>- Kompetensi Personil yang diberi tugas mengelola anti penyuapan</div></div>
     <div class="col-1-5-table"><?php if($data_kelengkapan7=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan7=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi7=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi7=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi7=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi7=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan7;?></div>
  </div>
   <div class="row">
    <div class="col-1-5-table"><div class="center">7.</div></div>
    <div class="col-1-30-table"><div class="left"><b>Komunikasi, Partisipasi, dan Konsultasi (Klausul 7.4)*</b></div></div>
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
    <div class="col-1-30-table"><div class="left">Contoh Dokumen : <br>- Pedoman Anti Penyuapan yang memuat lampiran Tabel Sarana Komunikasi, atau Prosedur Komunikasi, Partisipasi dan Konsultasi</div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan9=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan9=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi9=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi9=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi9=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi9=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan9;?></div>
  </div>
   <div class="row">
    <div class="col-1-5-table"><div class="center">8.</div></div>
    <div class="col-1-30-table"><div class="left">				<b>Dokumentasi (Klausul 7.5)*</b>
</div></div>
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
    <div class="col-1-30-table"><div class="left">				Contoh Dokumen : <br>- Prosedur Pengendalian Informasi Terdokumentasi
</div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan10=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan10=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi10=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi10=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi10=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi10=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan10;?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center">9.</div></div>
    <div class="col-1-30-table"><div class="left"><b>Pengendalian Dokumen (Klausul 7.5.3)*</b></div></div>
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
    <div class="col-1-30-table"><div class="left">				Contoh Dokumen : <br>- Prosedur Pengendalian Informasi Terdokumentasi
</div></div>
     <div class="col-1-5-table"><?php if($data_kelengkapan11=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan11=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi11=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi11=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi11=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi11=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan11;?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center">10.</div></div>
    <div class="col-1-30-table"><div class="left"><b>Pengendalian Operasional (Klausul 8.1)*</b></div></div>
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
    <div class="col-1-30-table"><div class="left">Contoh Dokumen : - Pedoman Anti Penyuapan yang memuat Pengendalian Operasional, atau - Prosedur Operasional</div></div>
     <div class="col-1-5-table"><?php if($data_kelengkapan12=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan12=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi12=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi12=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi12=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi12=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan12;?></div>
  </div>

  <div class="row">
    <div class="col-1-5-table"><div class="center">11.</div></div>
    <div class="col-1-30-table"><div class="left">				<b>Mengelola ketidakcukupan pengendalian anti-penyuapan (Klausul 8.8)*</b>
</div></div>
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
    <div class="col-1-30-table"><div class="left">				Contoh Dokumen : <br>- Formulir Uji Kelayakan, atau <br>- Formulir Tindakan Perbaikan
</div></div>
        <div class="col-1-5-table"><?php if($data_kelengkapan13=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan13=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi13=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi13=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi13=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi13=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan13;?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center">12.</div></div>
    <div class="col-1-30-table"><div class="left"><b>Pengukuran dan Pemantauan (Klausul 9.1)*</b></div></div>
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
    <div class="col-1-30-table"><div class="left">				Contoh Dokumen : <br> Prosedur Pemantauan Dan Pengukuran (termasuk laporan pengaduan
</div></div>
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
    <div class="col-1-30-table"><div class="left">				Contoh Dokumen : <br>- Prosedur Tinjauan Fungsi Kepatuhan / FKAP
</div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan14=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan14=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi14=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi14=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi14=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi14=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan14;?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center">14.</div></div>
    <div class="col-1-30-table"><div class="left">				Pengendalian informasi terdokumentasi (Klausul 7.5.3)*
</div></div>
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
    <div class="col-1-30-table"><div class="left">				Contoh Dokumen : <br>- Prosedur Informasi Terdokumentasi
</div></div>
       <div class="col-1-5-table"><?php if($data_kelengkapan15=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan15=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi15=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi15=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi15=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi15=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan15;?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center">15.</div></div>
    <div class="col-1-30-table"><div class="left"><b>Audit Internal (Klausul 9.2)*</b></div></div>
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
    <div class="col-1-30-table"><div class="left">				Contoh Dokumen : <br>- Prosedur Audit Internal/Internal Audit
</div></div>
        <div class="col-1-5-table"><?php if($data_kelengkapan16=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan16=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi16=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi16=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi16=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi16=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan16;?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center">16.</div></div>
    <div class="col-1-30-table"><div class="left"><b>Tinjauan Manajemen (Klausul 9.3)*</b></div></div>
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
    <div class="col-1-30-table"><div class="left">				Contoh Dokumen : <br>- Prosedur Tinjauan Manajemen
</div></div>
        <div class="col-1-5-table"><?php if($data_kelengkapan17=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan17=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi17=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi17=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi17=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi17=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan17;?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center">II.</div></div>
    <div class="col-1-30-table"><div class="left"><b>DOKUMEN REKAMAN PELAKSANAAN SMAP</b></div></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-20-table"></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center">1.</div></div>
    <div class="col-1-30-table"><div class="left"><b>DOKUMEN REKAMAN PELAKSANAAN SMAP</b></div></div>
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
    <div class="col-1-30-table"><div class="left">				Contoh Dokumen : <br>- Kebijakan Anti Penyuapan <br>- Sasaran Anti Penyuapan <br>- Tabel Komunikasi <br>- Struktur Organisasi, Tugas, Tanggungjawab dan Wewenang yang diberi tugas mengelola manajemen anti penyuapan.
</div></div>
       <div class="col-1-5-table"><?php if($data_kelengkapan18=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan18=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi18=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi18=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi18=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi18=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan18;?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center">2.</div></div>
    <div class="col-1-30-table"><div class="left"><b>Komitmen anti penyuapan (Klausul 8.6)*</b></div></div>
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
    <div class="col-1-30-table"><div class="left">				Contoh Dokumen : <br> Rekaman Pakta Integritas/Komitmen Anti Penyuapan Rekan Bisnis
</div></div>
     <div class="col-1-5-table"><?php if($data_kelengkapan19=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan19=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi19=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi19=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi19=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi19=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan19;?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center">3.</div></div>
    <div class="col-1-30-table"><div class="left"><b>Penilaian risiko penyuapan (Klausul 4.5)*</b></div></div>
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
    <div class="col-1-30-table"><div class="left">				Contoh Dokumen : <br>- Rekaman Analisa dan Penilaian Resiko
</div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan20=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan20=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi20=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi20=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi20=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi20=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan20;?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center">4.</div></div>
    <div class="col-1-30-table"><div class="left"><b>Informasi terdokumentasi (Klausul 7.5)*</b></div></div>
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
    <div class="col-1-30-table"><div class="left">				Contoh Dokumen : <br>- Daftar Induk Dokumen/Rekaman <br>- Daftar Distribusi Dokumen <br>- Tanda terima distribusi dokumen <br>- Berita Acara Pemusnahan Dokumen
</div></div>
       <div class="col-1-5-table"><?php if($data_kelengkapan21=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan21=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi21=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi21=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi21=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi21=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan21;?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center">5.</div></div>
    <div class="col-1-30-table"><div class="left">				<b>Pemantauan, pengukuran, analisis, dan evaluasi (Klausul 9.1)*</b>
</div></div>
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
    <div class="col-1-30-table"><div class="left">				Contoh Dokumen : <br>- Laporan Suap & pungli (termasuk laporan pengaduan) <br>- Analisa Pelaporan Suap & pungli
</div></div>
       <div class="col-1-5-table"><?php if($data_kelengkapan22=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan22=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi22=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi22=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi22=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi22=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan22;?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center">6.</div></div>
    <div class="col-1-30-table"><div class="left">				<b>Laporan hasil audit internal (Klasul 9.2)*</b>
</div></div>
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
    <div class="col-1-30-table"><div class="left">				Contoh Dokumen : <br>- Surat Penunjukan Auditor (tidak diisi) (tidak diisi) (tidak diisi) (tidak diisi) (tidak diisi) (tidak diisi)
<br>- Program Audit Internal <br>- Jadwal & Rencana Audit Internal <br>- Undangan Audit Internal <br> Daftar Hadir Audit Internal <br>- Check List/Daftar Periksa Audit Internal <br> Laporan Ketidaksesuaian <br>- Laporan Audit Internal
</div></div>
       <div class="col-1-5-table"><?php if($data_kelengkapan23=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan23=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi23=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi23=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi23=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi23=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan23;?></div>
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
        <strong><?=$catatan_fsmap03[0]['catatan'];?></strong>
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
