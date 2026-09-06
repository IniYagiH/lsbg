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
        .col-1-10-table { width: 10%; border: 1px solid black; text-align: center; }
.col-1-15-table { width: 15%; border: 1px solid black; text-align: center; }
.col-1-20-table { width: 20%; border: 1px solid black; text-align: center; }
.col-1-30-table { width: 30%; border: 1px solid black; text-align: center; }
.col-1-5-table  { width: 5%;  border: 1px solid black; text-align: center; }
.col-1-50-table { width: 100%; border: 1px solid black; padding: 6px; }
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
THEP-01<br>
FORMULIR HASIL PELAKSANAAN TINJAUAN HASIL EVALUASI/PENILAIAN KEMAMPUAN
BADAN USAHA JASA KONSTRUKSI

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
          <?php
          $nib=$klasifikasi[0]['NIB'];
          $tgl_perm=$klasifikasi[0]['tgl_permohonan'];
          $data=$this->Bu_model->check_permohonan($nib,$tgl_perm);?>
          : <?=date("d-M-Y", strtotime($data[0]['status_0']));?>
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
     <div class="row">
        <div class="col-1-10">
          Nama Asesor 1
        </div>
        <div class="col-1-10">
          : <?=$asesor[0]['Nama'];?>
        </div>


    </div>
    <?php if(count($asesor)==2) :?>
    <div class="row">
        <div class="col-1-10">
          Nama Asesor 2
        </div>
        <div class="col-1-10">
          : <?=$asesor[1]['Nama'];?>
        </div>


    </div>
    <?php endif ;?>
    <div class="row">
        <div class="col-1-10">
          Tanggal Pelaksanaan Evaluasi oleh Asesor 1
        </div>
        <div class="col-1-10">
          : <?=$asesor[0]['tgl_penunjukan']." s.d ".$penilaian_frpkp_1[0]['tgl_penilaian'];?>
        </div>


    </div>
     <?php if(count($asesor)==2) :?>
    <div class="row">
         <div class="col-1-10">
          Tanggal Pelaksanaan Evaluasi oleh Asesor 2
        </div>
        <div class="col-1-10">
          : <?=$asesor[0]['tgl_penunjukan']." s.d ".$penilaian_frpkp_2[0]['tgl_penilaian'];?>
        </div>


    </div>
    <?php endif ;?>

  </section>
   <b3 style="font-size:20px; font-weight:bold; color:#2e64a7; background:#f0f0f0; padding:8px 12px; border-radius:6px; display:inline-block;"><?=$asesor[0]['Nama']; ?></b3>

<section class="items">
  <!-- Header Baris 1 -->
    <div class="row">
      <div class="col-1-5-table" style="background-color: #2e64a7;color: #fff;" rowspan="1"><div class="center">No.</div></div>
      <div class="col-1-30-table" style="background-color: #2e64a7;color: #fff;" rowspan="1"><div class="left">Item Penilaian</div></div>
      <div class="col-1-30-table" style="background-color: #2e64a7;color: #fff;" colspan="1"><div class="left">Persyaratan</div></div>
      <div class="col-1-10-table" style="background-color: #2e64a7;color: #fff;" colspan="1"><div class="center">Keputusan Asesor</div></div>
      <div class="col-1-30-table" style="background-color: #2e64a7;color: #fff;" colspan="1"><div class="center">Catatan Pelaksana Tinjauan Hasil Evaluasi</div></div>

    </div>
  
    <div class="row">
        <div class="col-1-5-table"style="background-color: #f7fbffff;"><div class="center">1</div></div>
        <div class="col-1-30-table" style="background-color: #f7fbffff;"><div class="left">Penilaian Penjualan Tahunan Badan Usaha</div></div>
        <div class="col-1-30-table"style="background-color: #f7fbffff;"><div class="center"></div></div>
        <div class="col-1-10-table"style="background-color: #f7fbffff;"><div class="center"><?php if($penilaian_frpkp_1[0]['penjualan_tahunan']=='1'){
          echo "MEMENUHI";
        }else{
          echo "TIDAK MEMENUHI";
        } ;?></div></div>
        <div class="col-1-30-table"><div class="left"><b><?=$penilaian_fthep[0]['catatan_penjualan_tahunan']?></b></div></div>

      </div>
      <div class="row">
        <div class="col-1-5-table"><div class="center"></div></div>
        <div class="col-1-30-table" ><div class="left">Nilai Penjualan Tahunan : <b><?=$penilaian_frpkp_1[0]['nilai_penjualan_tahunan'];?></b></div></div>
        <div class="col-1-30-table"><div class="left"><?=$penilaian_frpkp_1[0]['persyaratan_penjualan_tahunan'];?></div></div>
        <div class="col-1-10-table"><div class="center"></div></div>
        <div class="col-1-30-table"><div class="center"></div></div>
      </div>
       <div class="row">
        <div class="col-1-5-table"><div class="center">2.</div></div>
        <div class="col-1-30-table" ><div class="left">Melakukan Penilaian Kemampuan Keuangan Badan Usaha</b></div></div>
        <div class="col-1-30-table"><div class="left"></div></div>
        <div class="col-1-10-table"><div class="center"><?php if($penilaian_frpkp_1[0]['aset']=='1'){
          echo "MEMENUHI";
        }else{
          echo "TIDAK MEMENUHI";
        } ;?></div></div>
                <div class="col-1-30-table"><div class="left"><b><?=$penilaian_fthep[0]['catatan_aset']?></b></div></div>

      </div>
      <div class="row">
        <div class="col-1-5-table"><div class="left"></div></div>
        <div class="col-1-30-table" ><div class="left">Nilai Kemampuan Keuangan : <b><?=$penilaian_frpkp_1[0]['nilai_kemampuan_keuangan'];?></b></div></div>
        <div class="col-1-30-table"><div class="left"><?=$penilaian_frpkp_1[0]['persyaratan_keuangan'];?></div></div>
        <div class="col-1-10-table"><div class="center"></div></div>
        <div class="col-1-30-table"><div class="center"></div></div>
      </div>
      <div class="row">
        <div class="col-1-5-table"><div class="center">3.</div></div>
        <div class="col-1-30-table" ><div class="left">Kenilaian Ketersediaan Tenaga Kerja Konstruksi Badan Usaha</div></div>
        <div class="col-1-30-table"><div class="left"></div></div>
        <div class="col-1-10-table"><div class="center"><?php if($penilaian_frpkp_1[0]['tk']=='1'){
          echo "MEMENUHI";
        }else{
          echo "TIDAK MEMENUHI";
        } ;?></div></div>
                <div class="col-1-30-table"><div class="left"><b><?=$penilaian_fthep[0]['catatan_tk']?></b></div></div>

      </div>
       <div class="row">
        <div class="col-1-5-table"><div class="center">A.</div></div>
        <div class="col-1-30-table" ><div class="left">Nama PJBU   : <b><?=$pjbu[0]['nama'];?></b></div></div>
        <div class="col-1-30-table"><div class="left"></div></div>
        <div class="col-1-10-table"><div class="center"></div></div>
        <div class="col-1-30-table"><div class="center"></div></div>
      </div>
       <div class="row">
        <div class="col-1-5-table"><div class="center">B.</div></div>
        <div class="col-1-30-table" ><div class="left">Nama PJTBU   : <b><?=$pjtbu[0]['nama'];?></b></div></div>
        <div class="col-1-30-table"><div class="left"></div></div>
        <div class="col-1-10-table"><div class="center"></div></div>
        <div class="col-1-30-table"><div class="center"></div></div>
      </div>
       <div class="row">
        <div class="col-1-5-table"><div class="left"></div></div>
        <div class="col-1-30-table" ><div class="left">Sub Klasifikasi : <b><?=$pjtbu[0]['sub_klasifikasi'];?></b></div></div>
        <div class="col-1-30-table"><div class="left"><b><?=$penilaian_frpkp_1[0]['sub_klas_pjtbu'];?></b></div></div>
        <div class="col-1-10-table"><div class="center"></div></div>
        <div class="col-1-30-table"><div class="center"></div></div>
      </div>
       <div class="row">
        <div class="col-1-5-table"><div class="left"></div></div>
        <div class="col-1-30-table" ><div class="left">Jenjang : <b><?=$pjtbu[0]['jenjang_skk'];?></b></div></div>
        <div class="col-1-30-table"><div class="left"><b><?=$penilaian_frpkp_1[0]['jenjang_pjtbu'];?></b></div></div>
        <div class="col-1-10-table"><div class="center"></div></div>
        <div class="col-1-30-table"><div class="center"></div></div>
      </div>
      <div class="row">
        <div class="col-1-5-table"><div class="center">C.</div></div>
        <div class="col-1-30-table" ><div class="left">Nama PJSKBU   : <b><?=$pjskbu[0]['nama'];?></b></div></div>
        <div class="col-1-30-table"><div class="left"></div></div>
        <div class="col-1-10-table"><div class="center"></div></div>
        <div class="col-1-30-table"><div class="center"></div></div>
      </div>
       <div class="row">
        <div class="col-1-5-table"><div class="left"></div></div>
        <div class="col-1-30-table" ><div class="left">Sub Klasifikasi : <b><?=$pjskbu[0]['sub_klasifikasi'];?></b></div></div>
        <div class="col-1-30-table"><div class="left"><b><?=$penilaian_frpkp_1[0]['sub_klas_pjskbu'];?></b></div></div>
        <div class="col-1-10-table"><div class="center"></div></div>
        <div class="col-1-30-table"><div class="center"></div></div>
      </div>
      <div class="row">
        <div class="col-1-5-table"><div class="left"></div></div>
        <div class="col-1-30-table" ><div class="left">Jenjang : <b><?=$pjskbu[0]['jenjang_skk'];?></b></div></div>
        <div class="col-1-30-table"><div class="left"><b><?=$penilaian_frpkp_1[0]['jenjang_pjskbu'];?></b></div></div>
        <div class="col-1-10-table"><div class="center"></div></div>
        <div class="col-1-30-table"><div class="center"></div></div>
      </div>
       <div class="row">
        <div class="col-1-5-table"><div class="center">4.</div></div>
        <div class="col-1-30-table" ><div class="left">Penilaian Kemampuan dalam Penyediaan Peralatan Konstruksi Badan Usaha</div></div>
        <div class="col-1-30-table"><div class="left"></div></div>
        <div class="col-1-10-table"><div class="center">MEMENUHI</div></div>
        <div class="col-1-30-table"><div class="left"><b><?=$penilaian_fthep[0]['catatan_peralatan']?></b></div></div>
      </div>
      <div class="row">
        <div class="col-1-5-table"><div class="center">A.</div></div>
        <div class="col-1-30-table" ><div class="left">Kepemilikan/Sewa</div></div>
        <div class="col-1-30-table"><div class="left"></div></div>
        <div class="col-1-10-table"><div class="center"></div></div>
        <div class="col-1-30-table"><div class="center"></div></div>
      </div>
       <div class="row">
        <div class="col-1-5-table"><div class="left"></div></div>
        <div class="col-1-30-table" ><div class="left">Jumlah Peralatan yang disampaikan <?=count($peralatan);?> Buah</div></div>
        <div class="col-1-30-table"><div class="left"><?=count($peralatan) ?> Buah</div></div>
        <div class="col-1-10-table"><div class="center"></div></div>
        <div class="col-1-30-table"><div class="center"></div></div>
      </div>
      
      <div class="row">
        <div class="col-1-5-table"><div class="left"></div></div>
        <div class="col-1-30-table" ><div class="left">Rincian:</div></div>
        <div class="col-1-30-table"><div class="left"></div></div>
        <div class="col-1-10-table"><div class="center"></div></div>
        <div class="col-1-30-table"><div class="center"></div></div>
      </div>
      <?php foreach($peralatan as $row_peralatan) :?>
        <div class="row">
        <div class="col-1-5-table"><div class="left"></div></div>
        <div class="col-1-30-table" ><div class="left">Nama Peralatan Utama: <b><?=$row_peralatan['subvarian']?></b></div></div>
        <div class="col-1-30-table"><div class="left"></div></div>
        <div class="col-1-10-table"><div class="center"></div></div>
        <div class="col-1-30-table"><div class="center"></div></div>
      </div>
        <div class="row">
        <div class="col-1-5-table"><div class="left"></div></div>
        <div class="col-1-30-table" ><div class="left">Nomor Registrasi Peralatan: <b><?=$row_peralatan['nomor_registrasi_peralatan']?></b></div></div>
        <div class="col-1-30-table"><div class="left"></div></div>
        <div class="col-1-10-table"><div class="center"></div></div>
        <div class="col-1-30-table"><div class="center"></div></div>
      </div>
      <?php  endforeach;?>
     <div class="row">
        <div class="col-1-5-table"><div class="center">B.</div></div>
        <div class="col-1-30-table" ><div class="left">Komitemen: <b><?=$penilaian_fthep[0]['komitmen_sewa'];?></b></div></div>
        <div class="col-1-30-table"><div class="left"></div></div>
        <div class="col-1-10-table"><div class="center"></div></div>
        <div class="col-1-30-table"><div class="center"></div></div>
      </div>
       <div class="row">
        <div class="col-1-5-table"><div class="center">5.</div></div>
        <div class="col-1-30-table" ><div class="left">Penilaian Komitmen penyelenggaraan SMAP Badan Usaha</div></div>
        <div class="col-1-30-table"><div class="left"></div></div>
        <div class="col-1-10-table"><div class="center"><?php if($penilaian_frpkp_1[0]['smap']=='1'){
          echo "MEMENUHI";
        }else{
          echo "TIDAK MEMENUHI";
        } ;?></div></div>
                <div class="col-1-30-table"><div class="left"><b><?=$penilaian_fthep[0]['catatan_smap']?></b></div></div>

      </div>
      <div class="row">
        <div class="col-1-5-table"><div class="center"></div></div>
        <div class="col-1-30-table" ><div class="left">1. Bagi yang menyampaikan Sertifikat ISO37001:2016<br>
        a. Nomor Sertifikat: <b><?=$penilaian_frpkp_1[0]['no_sertifikat_smap'];?></b><br>b. Penerbit: <b><?=$penilaian_frpkp_1[0]['penerbit_smap'];?></b>
      </div></div>
        <div class="col-1-30-table"><div class="left"></div></div>
        <div class="col-1-10-table"><div class="center"></div></div>
        <div class="col-1-30-table"><div class="center"></div></div>
      </div>
      <div class="row">
        <div class="col-1-5-table"><div class="center"></div></div>
        <div class="col-1-30-table" ><div class="left">2. Bagi yang menyampaikan dokumen penerapan SMAPbr>
        a. Nilai Penerapan SMAP dari PANCEK: <b><?=$penilaian_frpkp_1[0]['nilai_pancek'];?></b><br>b.  Pemenuhan Dokumen SMAP: <b><?=$penilaian_frpkp_1[0]['pemenuhan_dokumen_smap'];?></b>
      </div></div>
        <div class="col-1-30-table"><div class="left">- Nilai penerapan SMAP paling sedikit 70%<br>
- Pemenuhan dokumen perencanaan SMAP dan
dokumen rekaman pelaksanan SMAP</div></div>
        <div class="col-1-10-table"><div class="center"></div></div>
        <div class="col-1-30-table"><div class="center"></div></div>
      </div>
      <div class="row">
        <div class="col-1-5-table"><div class="center"></div></div>
        <div class="col-1-30-table" ><div class="left">3. Bagi yang menyampakan Pernyataan Memenuhi
Dokumen SMAP<br>
- Akan memenuhi dokumen SMAP paling lambat <?=$penilaian_frpkp_1[0]['tahun_smap'];?></div></div>
        <div class="col-1-30-table"><div class="left">1 (satu) tahun untuk badan usaha kecil atau<br>
2 (dua) tahun untuk badan usaha menengah atau<br>
3 (tiga) tahun untuk badan usaha besar</div></div>
        <div class="col-1-10-table"><div class="center"></div></div>
        <div class="col-1-30-table"><div class="center"></div></div>
      </div>
</section>
<?php if(count($asesor)==2) :?>
   <b3 style="font-size:20px; font-weight:bold; color:#2e64a7; background:#f0f0f0; padding:8px 12px; border-radius:6px; display:inline-block;"><?=$asesor[1]['Nama']; ?></b3>

<section class="items">
  <!-- Header Baris 1 -->
    <div class="row">
      <div class="col-1-5-table" style="background-color: #2e64a7;color: #fff;" rowspan="1"><div class="center">No.</div></div>
      <div class="col-1-30-table" style="background-color: #2e64a7;color: #fff;" rowspan="1"><div class="left">Item Penilaian</div></div>
      <div class="col-1-30-table" style="background-color: #2e64a7;color: #fff;" colspan="1"><div class="left">Persyaratan</div></div>
      <div class="col-1-10-table" style="background-color: #2e64a7;color: #fff;" colspan="1"><div class="center">Keputusan Asesor</div></div>
      <div class="col-1-30-table" style="background-color: #2e64a7;color: #fff;" colspan="1"><div class="center">Catatan Pelaksana Tinjauan Hasil Evaluasi</div></div>

    </div>
  
    <div class="row">
        <div class="col-1-5-table"style="background-color: #f7fbffff;"><div class="center">1</div></div>
        <div class="col-1-30-table" style="background-color: #f7fbffff;"><div class="left">Penilaian Penjualan Tahunan Badan Usaha</div></div>
        <div class="col-1-30-table"style="background-color: #f7fbffff;"><div class="center"></div></div>
        <div class="col-1-10-table"style="background-color: #f7fbffff;"><div class="center"><?php if($penilaian_frpkp_2[0]['penjualan_tahunan']=='1'){
          echo "MEMENUHI";
        }else{
          echo "TIDAK MEMENUHI";
        } ;?></div></div>
        <div class="col-1-30-table"><div class="left"><b><?=$penilaian_fthep[0]['catatan_penjualan_tahunan']?></b></div></div>

      </div>
      <div class="row">
        <div class="col-1-5-table"><div class="center"></div></div>
        <div class="col-1-30-table" ><div class="left">Nilai Penjualan Tahunan : <b><?=$penilaian_frpkp_2[0]['nilai_penjualan_tahunan'];?></b></div></div>
        <div class="col-1-30-table"><div class="left"><?=$penilaian_frpkp_2[0]['persyaratan_penjualan_tahunan'];?></div></div>
        <div class="col-1-10-table"><div class="center"></div></div>
        <div class="col-1-30-table"><div class="center"></div></div>
       </div>
       <div class="row">
        <div class="col-1-5-table"><div class="center">2.</div></div>
        <div class="col-1-30-table" ><div class="left">Melakukan Penilaian Kemampuan Keuangan Badan Usaha</b></div></div>
        <div class="col-1-30-table"><div class="left"></div></div>
        <div class="col-1-10-table"><div class="center"><?php if($penilaian_frpkp_2[0]['aset']=='1'){
          echo "MEMENUHI";
        }else{
          echo "TIDAK MEMENUHI";
        } ;?></div></div>
                <div class="col-1-30-table"><div class="left"><b><?=$penilaian_fthep[0]['catatan_aset']?></b></div></div>

      </div>
      <div class="row">
        <div class="col-1-5-table"><div class="left"></div></div>
        <div class="col-1-30-table" ><div class="left">Nilai Kemampuan Keuangan : <b><?=$penilaian_frpkp_2[0]['nilai_kemampuan_keuangan'];?></b></div></div>
        <div class="col-1-30-table"><div class="left"><?=$penilaian_frpkp_2[0]['persyaratan_keuangan'];?></div></div>
        <div class="col-1-10-table"><div class="center"></div></div>
        <div class="col-1-30-table"><div class="center"></div></div>
      </div>
      <div class="row">
        <div class="col-1-5-table"><div class="center">3.</div></div>
        <div class="col-1-30-table" ><div class="left">Kenilaian Ketersediaan Tenaga Kerja Konstruksi Badan Usaha</div></div>
        <div class="col-1-30-table"><div class="left"></div></div>
        <div class="col-1-10-table"><div class="center"><?php if($penilaian_frpkp_2[0]['tk']=='1'){
          echo "MEMENUHI";
        }else{
          echo "TIDAK MEMENUHI";
        } ;?></div></div>
                <div class="col-1-30-table"><div class="left"><b><?=$penilaian_fthep[0]['catatan_tk']?></b></div></div>

      </div>
       <div class="row">
        <div class="col-1-5-table"><div class="center">A.</div></div>
        <div class="col-1-30-table" ><div class="left">Nama PJBU   : <b><?=$pjbu[0]['nama'];?></b></div></div>
        <div class="col-1-30-table"><div class="left"></div></div>
        <div class="col-1-10-table"><div class="center"></div></div>
        <div class="col-1-30-table"><div class="center"></div></div>
      </div>
       <div class="row">
        <div class="col-1-5-table"><div class="center">B.</div></div>
        <div class="col-1-30-table" ><div class="left">Nama PJTBU   : <b><?=$pjtbu[0]['nama'];?></b></div></div>
        <div class="col-1-30-table"><div class="left"></div></div>
        <div class="col-1-10-table"><div class="center"></div></div>
        <div class="col-1-30-table"><div class="center"></div></div>
      </div>
       <div class="row">
        <div class="col-1-5-table"><div class="left"></div></div>
        <div class="col-1-30-table" ><div class="left">Sub Klasifikasi : <b><?=$pjtbu[0]['sub_klasifikasi'];?></b></div></div>
        <div class="col-1-30-table"><div class="left"><b><?=$penilaian_frpkp_2[0]['sub_klas_pjtbu'];?></b></div></div>
        <div class="col-1-10-table"><div class="center"></div></div>
        <div class="col-1-30-table"><div class="center"></div></div>
      </div>
       <div class="row">
        <div class="col-1-5-table"><div class="left"></div></div>
        <div class="col-1-30-table" ><div class="left">Jenjang : <b><?=$pjtbu[0]['jenjang_skk'];?></b></div></div>
        <div class="col-1-30-table"><div class="left"><b><?=$penilaian_frpkp_2[0]['jenjang_pjtbu'];?></b></div></div>
        <div class="col-1-10-table"><div class="center"></div></div>
        <div class="col-1-30-table"><div class="center"></div></div>
      </div>
      <div class="row">
        <div class="col-1-5-table"><div class="center">C.</div></div>
        <div class="col-1-30-table" ><div class="left">Nama PJSKBU   : <b><?=$pjskbu[0]['nama'];?></b></div></div>
        <div class="col-1-30-table"><div class="left"></div></div>
        <div class="col-1-10-table"><div class="center"></div></div>
        <div class="col-1-30-table"><div class="center"></div></div>
      </div>
       <div class="row">
        <div class="col-1-5-table"><div class="left"></div></div>
        <div class="col-1-30-table" ><div class="left">Sub Klasifikasi : <b><?=$pjskbu[0]['sub_klasifikasi'];?></b></div></div>
        <div class="col-1-30-table"><div class="left"><b><?=$penilaian_frpkp_2[0]['sub_klas_pjskbu'];?></b></div></div>
        <div class="col-1-10-table"><div class="center"></div></div>
        <div class="col-1-30-table"><div class="center"></div></div>
      </div>
      <div class="row">
        <div class="col-1-5-table"><div class="left"></div></div>
        <div class="col-1-30-table" ><div class="left">Jenjang : <b><?=$pjskbu[0]['jenjang_skk'];?></b></div></div>
        <div class="col-1-30-table"><div class="left"><b><?=$penilaian_frpkp_2[0]['jenjang_pjskbu'];?></b></div></div>
        <div class="col-1-10-table"><div class="center"></div></div>
        <div class="col-1-30-table"><div class="center"></div></div>
      </div>
       <div class="row">
        <div class="col-1-5-table"><div class="center">4.</div></div>
        <div class="col-1-30-table" ><div class="left">Penilaian Kemampuan dalam Penyediaan Peralatan Konstruksi Badan Usaha</div></div>
        <div class="col-1-30-table"><div class="left"></div></div>
        <div class="col-1-10-table"><div class="center">MEMENUHI</div></div>
        <div class="col-1-30-table"><div class="left"><b><?=$penilaian_fthep[0]['catatan_peralatan']?></b></div></div>
      </div>
      <div class="row">
        <div class="col-1-5-table"><div class="center">A.</div></div>
        <div class="col-1-30-table" ><div class="left">Kepemilikan/Sewa</div></div>
        <div class="col-1-30-table"><div class="left"></div></div>
        <div class="col-1-10-table"><div class="center"></div></div>
        <div class="col-1-30-table"><div class="center"></div></div>
      </div>
       <div class="row">
        <div class="col-1-5-table"><div class="left"></div></div>
        <div class="col-1-30-table" ><div class="left">Jumlah Peralatan yang disampaikan <?=count($peralatan);?> Buah</div></div>
        <div class="col-1-30-table"><div class="left"><?=count($peralatan) ?> Buah</div></div>
        <div class="col-1-10-table"><div class="center"></div></div>
        <div class="col-1-30-table"><div class="center"></div></div>
      </div>
      
      <div class="row">
        <div class="col-1-5-table"><div class="left"></div></div>
        <div class="col-1-30-table" ><div class="left">Rincian:</div></div>
        <div class="col-1-30-table"><div class="left"></div></div>
        <div class="col-1-10-table"><div class="center"></div></div>
        <div class="col-1-30-table"><div class="center"></div></div>
      </div>
      <?php foreach($peralatan as $row_peralatan) :?>
        <div class="row">
        <div class="col-1-5-table"><div class="left"></div></div>
        <div class="col-1-30-table" ><div class="left">Nama Peralatan Utama: <b><?=$row_peralatan['subvarian']?></b></div></div>
        <div class="col-1-30-table"><div class="left"></div></div>
        <div class="col-1-10-table"><div class="center"></div></div>
        <div class="col-1-30-table"><div class="center"></div></div>
      </div>
        <div class="row">
        <div class="col-1-5-table"><div class="left"></div></div>
        <div class="col-1-30-table" ><div class="left">Nomor Registrasi Peralatan: <b><?=$row_peralatan['nomor_registrasi_peralatan']?></b></div></div>
        <div class="col-1-30-table"><div class="left"></div></div>
        <div class="col-1-10-table"><div class="center"></div></div>
        <div class="col-1-30-table"><div class="center"></div></div>
      </div>
      <?php  endforeach;?>
     <div class="row">
        <div class="col-1-5-table"><div class="center">B.</div></div>
        <div class="col-1-30-table" ><div class="left">Komitemen: <b><?=$penilaian_fthep[0]['komitmen_sewa'];?></b></div></div>
        <div class="col-1-30-table"><div class="left"></div></div>
        <div class="col-1-10-table"><div class="center"></div></div>
        <div class="col-1-30-table"><div class="center"></div></div>
      </div>
       <div class="row">
        <div class="col-1-5-table"><div class="center">5.</div></div>
        <div class="col-1-30-table" ><div class="left">Penilaian Komitmen penyelenggaraan SMAP Badan Usaha</div></div>
        <div class="col-1-30-table"><div class="left"></div></div>
        <div class="col-1-10-table"><div class="center"><?php if($penilaian_frpkp_2[0]['smap']=='1'){
          echo "MEMENUHI";
        }else{
          echo "TIDAK MEMENUHI";
        } ;?></div></div>
                <div class="col-1-30-table"><div class="left"><b><?=$penilaian_fthep[0]['catatan_smap']?></b></div></div>

      </div>
      <div class="row">
        <div class="col-1-5-table"><div class="center"></div></div>
        <div class="col-1-30-table" ><div class="left">1. Bagi yang menyampaikan Sertifikat ISO37001:2016<br>
        a. Nomor Sertifikat: <b><?=$penilaian_frpkp_2[0]['no_sertifikat_smap'];?></b><br>b. Penerbit: <b><?=$penilaian_frpkp_2[0]['penerbit_smap'];?></b>
      </div></div>
        <div class="col-1-30-table"><div class="left"></div></div>
        <div class="col-1-10-table"><div class="center"></div></div>
        <div class="col-1-30-table"><div class="center"></div></div>
      </div>
      <div class="row">
        <div class="col-1-5-table"><div class="center"></div></div>
        <div class="col-1-30-table" ><div class="left">2. Bagi yang menyampaikan dokumen penerapan SMAPbr>
        a. Nilai Penerapan SMAP dari PANCEK: <b><?=$penilaian_frpkp_2[0]['nilai_pancek'];?></b><br>b.  Pemenuhan Dokumen SMAP: <b><?=$penilaian_frpkp_2[0]['pemenuhan_dokumen_smap'];?></b>
      </div></div>
        <div class="col-1-30-table"><div class="left">- Nilai penerapan SMAP paling sedikit 70%<br>
- Pemenuhan dokumen perencanaan SMAP dan
dokumen rekaman pelaksanan SMAP</div></div>
        <div class="col-1-10-table"><div class="center"></div></div>
        <div class="col-1-30-table"><div class="center"></div></div>
      </div>
      <div class="row">
        <div class="col-1-5-table"><div class="center"></div></div>
        <div class="col-1-30-table" ><div class="left">3. Bagi yang menyampakan Pernyataan Memenuhi
Dokumen SMAP<br>
- Akan memenuhi dokumen SMAP paling lambat <?=$penilaian_frpkp_2[0]['tahun_smap'];?></div></div>
        <div class="col-1-30-table"><div class="left">1 (satu) tahun untuk badan usaha besar atau<br>
2 (dua) tahun untuk badan usaha menengah atau<br>
3 (tiga) tahun untuk badan usaha kecil</div></div>
        <div class="col-1-10-table"><div class="center"></div></div>
        <div class="col-1-30-table"><div class="center"></div></div>
      </div>
</section>
<?php endif;?>
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
        <strong><?=$penilaian_fthep[0]['comment'];?></strong>
      </div>
    </div>

  

    <!-- Kolom Kanan (TTD) -->
    <div class="col-1-20-table" style="border: 1px solid black;">
      <div class="center">
        <?=$tanggal.'-'.$bulan.'-'.$tahun;?><br>
          Pelaksana Tinjauan Hasil <br>Evaluasi/Penilaian <br>
<?php $user=$this->Bu_model->get_user($penilaian_fthep[0]['id_asesor']) ;
        $nama=$this->Bu_model->get_user_nama_asesor($user[0]['Nama']);

?>
          <br>
   
             <?php
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

              <img src="<?=$base64 ;?>" style=";border: 1px; max-height: 110px;">
              <br>
            <?php echo $user[0]['Nama'];?>

        </div>
    </div>
  </div>
</section>
</html>

