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
     HASIL CEK KELENGKAPAN, VERIFIKASI DAN VALIDASI DOKUMEN KEMAMPUAN KEUANGAN BADAN USAHA
     <br>(FKK01)
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


<?php
$total_saham=0;
 foreach($pemegang_saham as $row_saham){
      $total_saham+=$row_saham['modal_disetor'];


} ;?>


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
    <div class="col-1-30-table"><div class="left">Permohonan Sertifikasi Badan Usaha</div></div>
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
    <div class="col-1-30-table"><div class="left">KBLI : <b><?=$klasifikasi[0]['nomor_kbli'];?></b> </div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan1=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan1=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi1=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi1=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi1=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi1=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan1;?></div>
  </div>
       <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Klasifikasi : <b><?=$klasifikasi[0]['id_klasifikasi'];?></b>&nbsp;&nbsp;Kualifikasi : <b><?=$klasifikasi[0]['kualifikasi'];?></b> </div></div>
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
    <div class="col-1-30-table"><div class="left">Sub Klasifikasi : <b><?=$klasifikasi[0]['id_sub_klasifikasi'];?></b>&nbsp;&nbsp;Kualifikasi : <b><?=$klasifikasi[0]['kualifikasi'];?></b> </div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan3=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan3=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi3=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi3=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi3=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi3=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"></div>
  </div>
    <div class="row">
    <div class="col-1-5-table"><div class="center">2</div></div>
    <div class="col-1-30-table"><div class="left">Informasi Badan Usaha</div></div>
      <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-20-table"></div>
  </div>
    <div class="row">
    <div class="col-1-5-table"><div class="center">a.</div></div>
    <div class="col-1-30-table"><div class="left">Inputan data Informasi Badan Usaha</div></div>
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
    <div class="col-1-30-table"><div class="left">1. Nama Badan Usaha : <b><?=$biodata[0]['nama'];?></b></div></div>
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
    <div class="col-1-30-table"><div class="left">2. Bentuk Badan Usaha : <b><?=$biodata[0]['bentuk_usaha'];?></b></div></div>
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
    <div class="col-1-30-table"><div class="left">3. Jenis Badan Usaha : <b><?=$klasifikasi[0]['deskripsi_jenis'];?></b></div></div>
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
    <div class="col-1-30-table"><div class="left">4. Alamat Badan Usaha : <b><?=$biodata[0]['alamat'];?></b></div></div>
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
    <div class="col-1-30-table"><div class="left">5. Kelurahan : <b></b></div></div>
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
    <div class="col-1-30-table"><div class="left">6. Kecamatan : <b></b></div></div>
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
    <div class="col-1-30-table"><div class="left">7. Kabupaten/Kota : <b><?=$biodata[0]['id_kabupaten'];?></b></div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan10=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan10=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi10=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi10=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi10=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi10=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan10;?></div>
  </div>
          <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">8. Provinsi : <b><?=$biodata[0]['id_propinsi'];?></b></div></div>
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
    <div class="col-1-30-table"><div class="left">9. Kode Pos : <b><?=$biodata[0]['kodepos'];?></b></div></div>
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
    <div class="col-1-30-table"><div class="left">10. Website : <b><?=$biodata[0]['website'];?></b></div></div>
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
    <div class="col-1-30-table"><div class="left">11. Email Badan Usaha : <b><?=$biodata[0]['email'];?></b></div></div>
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
    <div class="col-1-30-table"><div class="left">12. Nomor Telepon Badan Usaha : <b><?=$biodata[0]['telepon'];?></b></div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan14=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan14=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi14=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi14=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi14=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi14=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan14;?></div>
  </div>
          <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">13. Nomor HP Badan Usaha : <b><?=$biodata[0]['hp'];?></b></div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan15=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan15=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi15=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi15=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi15=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi15=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan15;?></div>
  </div>
          <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">14. NPWP Badan Usaha : <b><?=$biodata[0]['npwp'];?></b></div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan16=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan16=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi16=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi16=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi16=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi16=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan16;?></div>
  </div>
          <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">15. Nomor Induk Berusaha(NIB) : <b><?=$biodata[0]['NIB'];?></b></div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan17=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan17=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi17=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi17=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi17=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi17=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan17;?></div> 
  </div>
          <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">b. Dokumen Upload Informasi Badan Usaha : <b></b></div></div>
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
    <div class="col-1-30-table"><div class="left"><b></b>Surat Pernyataan Tanggung Jawab Mutlak  </b> <br> <a href="<?=$biodata[0]['sptjm'];?>" target="_blank" ><i>link dokumen</i></a></div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan18=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan18=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi18=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi18=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi18=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi18=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan18;?></div>
  </div>
    <div class="row">
    <div class="col-1-5-table"><div class="center">3</div></div>
    <div class="col-1-30-table"><div class="left">Informasi Pemegang Saham</div></div>
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
    <div class="col-1-30-table"><div class="left">Inputan Informasi Pemegang Saham</div></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-20-table"></div>
  </div>
  <?php
			
							
								if(!empty($penilaian_fkk01_saham)){
									foreach($penilaian_fkk01_saham as $row_ceklis){
	 							  $count+=1;
	 							  for ($i=0; $i < count($penilaian_fkk01_saham); $i++) {
	 							    if($row_ceklis['id']==$penilaian_fkk01_saham[$i]['id']){
	 							      ${"data_kelengkapan_saham".$row_ceklis['id']}=$row_ceklis['kelengkapan'];
									    ${"data_verifikasi_saham".$row_ceklis['id']}=$row_ceklis['verifikasi'];
	 							      ${"data_validasi_saham".$row_ceklis['id']}=$row_ceklis['validasi'];
	 							      ${"data_keterangan_saham".$row_ceklis['id']}=$row_ceklis['keterangan'];
	 							    }
	 							  }
	 							}
								}
							  ;?>
  <?php $count=1 ;?>
  <?php foreach ($pemegang_saham as $row_saham) :?>
  <?php $id_sahamx=$row_saham['no_ktp'] ;?>

     <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left"><?= $count ;?>. Nama : <b><?=$row_saham['nama_pemilik'] ;?></b> </div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan_saham" . $id_sahamx . "_19"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan_saham" . $id_sahamx . "_19"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi_saham" . $id_sahamx . "_19"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi_saham" . $id_sahamx . "_19"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi_saham" . $id_sahamx . "_19"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi_saham" . $id_sahamx . "_19"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan_saham" . $id_sahamx . "_19"};?></div>
  </div>
   <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left"> No. KTP/KITAS : <b><?=$row_saham['no_ktp'] ;?></b> </div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan_saham" . $id_sahamx . "_20"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan_saham" . $id_sahamx . "_20"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi_saham" . $id_sahamx . "_20"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi_saham" . $id_sahamx . "_20"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi_saham" . $id_sahamx . "_20"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi_saham" . $id_sahamx . "_20"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan_saham" . $id_sahamx . "_20"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left"> Kabupaten/Kota : <b><?=$row_saham['id_kabupaten'] ;?></b> </div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan_saham" . $id_sahamx . "_21"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan_saham" . $id_sahamx . "_21"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi_saham" . $id_sahamx . "_21"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi_saham" . $id_sahamx . "_21"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi_saham" . $id_sahamx . "_21"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi_saham" . $id_sahamx . "_21"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan_saham" . $id_sahamx . "_21"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left"> Provinsi : <b><?=$row_saham['id_propinsi'] ;?></b> </div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan_saham" . $id_sahamx . "_22"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan_saham" . $id_sahamx . "_22"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi_saham" . $id_sahamx . "_22"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi_saham" . $id_sahamx . "_22"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi_saham" . $id_sahamx . "_22"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi_saham" . $id_sahamx . "_22"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan_saham" . $id_sahamx . "_22"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left"> Jumlah Saham : <b><?=$row_saham['jumlah_lembar'] ;?></b> </div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan_saham" . $id_sahamx . "_23"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan_saham" . $id_sahamx . "_23"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi_saham" . $id_sahamx . "_23"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi_saham" . $id_sahamx . "_23"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi_saham" . $id_sahamx . "_23"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi_saham" . $id_sahamx . "_23"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan_saham" . $id_sahamx . "_23"};?></div>
  </div>
    <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left"> Nilai Satuan Saham : <b><?=$row_saham['nilai_perlembar'] ;?></b> </div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan_saham" . $id_sahamx . "_24"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan_saham" . $id_sahamx . "_24"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi_saham" . $id_sahamx . "_24"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi_saham" . $id_sahamx . "_24"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi_saham" . $id_sahamx . "_24"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi_saham" . $id_sahamx . "_24"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan_saham" . $id_sahamx . "_24"};?></div>
  </div>
     <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left"> Modal Disetor : Rp. <b><?=number_format($row_saham['modal_disetor'],0,",",".") ;?></b> </div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan_saham" . $id_sahamx . "_25"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan_saham" . $id_sahamx . "_25"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi_saham" . $id_sahamx . "_25"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi_saham" . $id_sahamx . "_25"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi_saham" . $id_sahamx . "_25"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi_saham" . $id_sahamx . "_25"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan_saham" . $id_sahamx . "_25"};?></div>
  </div>
  <?php $count+=1 ;?>
  <?php endforeach ;?>
      <div class="row">
    <div class="col-1-5-table"><div class="center">4</div></div>
    <div class="col-1-30-table"><div class="left"> Informasi Neraca </div></div>
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
    <div class="col-1-30-table"><div class="left"> a. Data Inputan Infromasi Neraca </div></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-5-table"></div>
    <div class="col-1-20-table"></div>
  </div>
   <?php
			
							
								if(!empty($penilaian_fkk01_neraca)){
									foreach($penilaian_fkk01_neraca as $row_ceklis){
	 							  $count+=1;
	 							  for ($i=0; $i < count($penilaian_fkk01_neraca); $i++) {
	 							    if($row_ceklis['id']==$penilaian_fkk01_neraca[$i]['id']){
	 							      ${"data_kelengkapan_neraca".$row_ceklis['id']}=$row_ceklis['kelengkapan'];
									  ${"data_verifikasi_neraca".$row_ceklis['id']}=$row_ceklis['verifikasi'];
	 							      ${"data_validasi_neraca".$row_ceklis['id']}=$row_ceklis['validasi'];
	 							      ${"data_keterangan_neraca".$row_ceklis['id']}=$row_ceklis['keterangan'];
	 							    }
	 							  }
	 							}
								}
							  ;?>
    <?php foreach($neraca as $row_neraca) :?>
      			<?php $id_sahamx=$row_neraca['Tahun'];?>

         <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left"> 1. Tahun : <b><?=$row_neraca['Tahun'] ;?></b> </div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_26"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_26"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi_neraca" . $id_sahamx . "_26"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi_neraca" . $id_sahamx . "_26"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi_neraca" . $id_sahamx . "_26"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi_neraca" . $id_sahamx . "_26"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan_neraca" . $id_sahamx . "_26"};?></div>
  </div>
           <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left"> 2. Aset Lancar Rp. <b><?=number_format($row_neraca['aktiva_lancar'],0,",",".") ;?></b> </div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_27"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_27"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi_neraca" . $id_sahamx . "_27"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi_neraca" . $id_sahamx . "_27"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi_neraca" . $id_sahamx . "_27"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi_neraca" . $id_sahamx . "_27"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan_neraca" . $id_sahamx . "_27"};?></div>
  </div>
  
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left"> 3. Aset Tidak Lancar Rp. <b><?=number_format($row_neraca['aktiva_tdk_lancar'],0,",",".") ;?></b> </div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_28"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_28"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi_neraca" . $id_sahamx . "_28"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi_neraca" . $id_sahamx . "_28"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi_neraca" . $id_sahamx . "_28"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi_neraca" . $id_sahamx . "_28"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan_neraca" . $id_sahamx . "_28"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left"> 4. Aset Lain-lain Rp. <b><?=number_format($row_neraca['aktiva_lain_lain'],0,",",".") ;?></b> </div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_29"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_29"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi_neraca" . $id_sahamx . "_29"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi_neraca" . $id_sahamx . "_29"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi_neraca" . $id_sahamx . "_29"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi_neraca" . $id_sahamx . "_29"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan_neraca" . $id_sahamx . "_29"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left"> 5. Total Aset Rp. <b><?=number_format($row_neraca['total_aset'],0,",",".") ;?></b> </div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_30"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_30"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi_neraca" . $id_sahamx . "_30"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi_neraca" . $id_sahamx . "_30"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi_neraca" . $id_sahamx . "_30"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi_neraca" . $id_sahamx . "_30"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan_neraca" . $id_sahamx . "_30"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left"> 6. Kewajiban Lancar Rp. <b><?=number_format($row_neraca['kewajiban_lancar'],0,",",".") ;?></b> </div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_31"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_31"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi_neraca" . $id_sahamx . "_31"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi_neraca" . $id_sahamx . "_31"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi_neraca" . $id_sahamx . "_31"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi_neraca" . $id_sahamx . "_31"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan_neraca" . $id_sahamx . "_31"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left"> 7. Kewajiban Tidak Lancar Rp. <b><?=number_format($row_neraca['kewajiban_tdk_lancar'],0,",",".") ;?></b> </div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_32"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_32"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi_neraca" . $id_sahamx . "_32"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi_neraca" . $id_sahamx . "_32"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi_neraca" . $id_sahamx . "_32"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi_neraca" . $id_sahamx . "_32"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan_neraca" . $id_sahamx . "_32"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left"> 8. Total Kewajiban Rp. <b><?=number_format($row_neraca['total_kewajiban'],0,",",".") ;?></b> </div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_33"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_33"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi_neraca" . $id_sahamx . "_33"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi_neraca" . $id_sahamx . "_33"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi_neraca" . $id_sahamx . "_33"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi_neraca" . $id_sahamx . "_33"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan_neraca" . $id_sahamx . "_33"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left"> 9. Total Ekuitas Rp. <b><?=number_format($row_neraca['total_kewajiban'],0,",",".") ;?></b> </div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_34"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_34"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi_neraca" . $id_sahamx . "_34"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi_neraca" . $id_sahamx . "_34"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi_neraca" . $id_sahamx . "_34"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi_neraca" . $id_sahamx . "_34"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan_neraca" . $id_sahamx . "_34"};?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left"> 10. Total Kewajiban dan Ekuitas Rp. <b><?=number_format($row_neraca['total_kewajiban_ekuitas'],0,",",".") ;?></b> </div></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_35"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_kelengkapan_neraca" . $id_sahamx . "_35"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi_neraca" . $id_sahamx . "_35"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_verifikasi_neraca" . $id_sahamx . "_35"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi_neraca" . $id_sahamx . "_35"}=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if(${"data_validasi_neraca" . $id_sahamx . "_35"}=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=${"data_keterangan_neraca" . $id_sahamx . "_35"};?></div>
  </div>
   
  <?php endforeach ;?>
  
  <div class="row">
    <div class="col-1-5-table"><div class="center">5</div></div>
    <div class="col-1-30-table"><div class="left">b. Dokumen Upload Informasi Neraca</div></div>
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
    <div class="col-1-30-table"><div class="left">Laporan Neraca Badan Usaha <br>Tahun ke-1 : <a href="<?=$neraca[0]['persyaratan_doc1'];?>" target="_blank"><i>link dokumen</i></a><br>Tahun ke-2 : <a href="<?=$neraca[1]['persyaratan_doc1'];?>" target="_blank" ><i>link dokumen</i></a></div> </div>
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
    <div class="col-1-30-table"><div class="left">a) Nilai Ekuitas Neraca Tahun 1 <?=$neraca[0]['Tahun']?> : Rp. <b><?=number_format($neraca[0]['totalekuitas'],0,",",".") ;?></b></div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan36=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan36=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi36=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi36=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi36=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi36=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan36;?></div>
  </div>
       <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">b) Nilai Ekuitas Neraca Tahun 2 <?=$neraca[1]['Tahun']?> : Rp. <b><?=number_format($neraca[1]['totalekuitas'],0,",",".") ;?></b></div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan37=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan37=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi37=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi37=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi37=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi37=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan37;?></div>
  </div>
   <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">Laporan Audit Kantor Akuntan Publik(Kualifikasi Menengah & Besar)</div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan38=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan38=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi38=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi38=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi38=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi38=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan38;?></div>
  </div>
  <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">1) Opini</div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan39=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan39=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi39=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi39=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi39=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi39=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan39;?></div>
  </div>
   <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">2) NERACA (Laporan Posisi Keuangan)</div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan40=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan40=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi40=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi40=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi40=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi40=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan40;?></div>
  </div>
   <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">a) Opini Nilai Total Ekuitas Neraca Tahun <?=$data_keterangan45;?></div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan45=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan45=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi45=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi45=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi45=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi45=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan45;?></div>
  </div>
   <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">b) Nilai Total Ekuitas Neraca Tahun <?=$data_keterangan46;?></div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan46=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan46=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi46=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi46=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi46=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi46=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan46;?></div>
  </div>
   <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">3) Laporan Arus Kas</div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan41=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan41=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi41=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi41=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi41=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi41=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan41;?></div>
  </div>
   <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">4) Laporan Laba Rugi</div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan42=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan42=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi42=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi42=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi42=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi42=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan42;?></div>
  </div>
   <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">5) Laporan Perubahan Ekuitas</div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan43=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan43=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi43=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi43=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi43=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi43=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan43;?></div>
  </div>
   <div class="row">
    <div class="col-1-5-table"><div class="center"></div></div>
    <div class="col-1-30-table"><div class="left">6) Catatan Atas Laporan Keuangan</div></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan44=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_kelengkapan44=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi44=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_verifikasi44=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi44=='1') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-5-table"><?php if($data_validasi44=='0') :?> <div class="center">&#10004; </div><?php endif ;?></div>
    <div class="col-1-20-table"><?=$data_keterangan44;?></div>
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
        <strong><?=$catatan_fkk01[0]['catatan'];?></strong>
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
