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
        .col-1-80-table {
            width: 80%;
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
FR TKS 08-05<br>
BERITA ACARA HASIL KEPUTUSAN KOMITE PENGAMBILAN KEPUTUSAN<br>
Nomor:   <?= $no_surat ; ?> 
<br><br>
HASIL PENETAPAN KEPUTUSAN<br>
Pada tanggal <?=$tanggal;?> Bulan <?=$bulan;?> tahun <?=$tahun;?>, telah dilaksanakan Rapat Komite Pemutus atas penilaian Badan Usaha yang diajukan sebagai pemenuhan Sertifikat Badan Usaha sebagai berikut:



    </div>
  </section>
<section class="items" style="
    width: 50%;
    margin: 0 auto;
">

    <div class="row">
        <div class="col-1-5-table">No</div>
        <div class="col-1-10-table">Nama Komite Pengambilan Keputusan</div>
        <div class="col-1-10-table">Jabatan</div>
    </div>

    <div class="row">
        <div class="col-1-5-table">1.</div>
        <div class="col-1-10-table">
          <?php $user=$this->Bu_model->get_user($komite[0]['id_komite']); ?>
          <?= $user[0]['Nama'] ?>
        </div>
        <div class="col-1-10-table">Ketua Pemutus</div>
    </div>

    <div class="row">
        <div class="col-1-5-table">2.</div>
        <div class="col-1-10-table">
          <?php $user=$this->Bu_model->get_user($komite[1]['id_komite']); ?>
          <?= $user[0]['Nama'] ?>
        </div>
        <div class="col-1-10-table">Pemutus</div>
    </div>

    <div class="row">
        <div class="col-1-5-table">3.</div>
        <div class="col-1-10-table">
          <?php $user=$this->Bu_model->get_user($komite[2]['id_komite']); ?>
          <?= $user[0]['Nama'] ?>
        </div>
        <div class="col-1-10-table">Pemutus</div>
    </div>

</section>

    <section class="items">
 <div class="row">
    <div class="col-1-80-table" colspan="2">
      <div class="center"><strong><strong>ITEM</strong></div>
    </div>
     <div class="col-1-20-table" colspan="1">
      <div class="center"><strong><strong>Hasil Penilaian komite Teknis</strong></div>
    </div>
  </div>
    <div class="row">
        <div class="col-1-10-table">
          Nama Badan Usaha
        </div>
        <div class="col-1-10-table">
          : <?=$biodata[0]['nama'];?>
        </div>
        <div class="col-1-10-table">
          MEMENUHI
        </div>


    </div>
    <div class="row">
        <div class="col-1-10-table">
          NIB
        </div>
        <div class="col-1-10-table">
          : <?=$biodata[0]['NIB'];?>
        </div>
        <div class="col-1-10-table">
           MEMENUHI
        </div>

    </div>
     <div class="row">
        <div class="col-1-10-table">
          Asosiasi
        </div>
        <div class="col-1-10-table">
          : <?=$klasifikasi[0]['nama_asosiasi'];?>
        </div>
        <div class="col-1-10-table">
           MEMENUHI
        </div>

    </div>
    <div class="row">
        <div class="col-1-10-table">
          Klasifikasi, Kode
        </div>
        <div class="col-1-10-table">
          : <?=$klasifikasi[0]['deskripsi_klasifikasi'];?>, <?=$klasifikasi[0]['id_klasifikasi'];?>
        </div>
        <div class="col-1-10-table">
           MEMENUHI
        </div>

    </div>
     <div class="row">
        <div class="col-1-10-table">
          Subklasifikasi, Kode
        </div>
        <div class="col-1-10-table">
          : <?=$klasifikasi[0]['deskripsi_subklasifikasi'];?>, <?=$klasifikasi[0]['id_sub_klasifikasi'];?>
        </div>
        <div class="col-1-10-table">
           MEMENUHI
        </div>

    </div>
     <div class="row">
        <div class="col-1-10-table">
          Kualifikasi
        </div>
        <div class="col-1-10-table">
          : <?=$klasifikasi[0]['kualifikasi'];?>
        </div>
        <div class="col-1-10-table">
           MEMENUHI
        </div>

    </div>
    
     <div class="row">
        <div class="col-1-10-table">
          Jenis Usaha
        </div>
        <div class="col-1-10-table">
          : <?=$klasifikasi[0]['deskripsi_jenis'];?>
        </div>
        <div class="col-1-10-table">
           MEMENUHI
        </div>

    </div>
     <div class="row">
        <div class="col-1-10-table">
          Sifat Usaha
        </div>
        <div class="col-1-10-table">
          : <?=$klasifikasi[0]['nama_sifat'];?>
        </div>
        <div class="col-1-10-table">
           MEMENUHI
        </div>

    </div>
      <div class="row">
        <div class="col-1-10-table">
          Tgl Permohonan
        </div>
        <div class="col-1-10-table">
          <?php
          $nib=$klasifikasi[0]['NIB'];
          $tgl_perm=$klasifikasi[0]['tgl_permohonan'];
          $data=$this->Bu_model->check_permohonan($nib,$tgl_perm);?>
          : <?=date("d-M-Y", strtotime($data[0]['status_0']));?>
        </div>
        <div class="col-1-10-table">
           MEMENUHI
        </div>

    </div>
     <div class="row">
        <div class="col-1-10-table">
          Jenis Permohonan
        </div>
       <div class="col-1-10-table">
          : <?php if($klasifikasi[0]['perpanjangan']=='1'){
            echo "Perpanjangan";
          }else{
            echo "Baru";
          } ;?>
        </div>
        <div class="col-1-10-table">
           MEMENUHI
        </div>

    </div>
    <?php $user_tinjauan=$this->Bu_model->get_user($tinjauan[0]['user_status_1']) ;?>
     <div class="row">
        <div class="col-1-10-table">
          Nama Peninjau Permohonan
        </div>
       <div class="col-1-10-table">
          : <?=$user_tinjauan[0]['Nama'];?>
        </div>
        <div class="col-1-10-table">
           MEMENUHI
        </div>

    </div>
    <div class="row">
        <div class="col-1-10-table">
          Tanggal Pelaksanaan Tinjauan Permohonan
        </div>
       <div class="col-1-10-table">
          : <?=date("d-M-Y", strtotime($data[0]['status_0']));?>
        </div>
        <div class="col-1-10-table">
           MEMENUHI
        </div>

    </div>
     <div class="row">
        <div class="col-1-10-table">
          Nama Asesor 1
        </div>
        <div class="col-1-10-table">
          : <?=$asesor[0]['Nama'];?>
        </div>
        <div class="col-1-10-table">
           MEMENUHI
        </div>

    </div>
    <?php if(count($asesor)==2) :?>
    <div class="row">
        <div class="col-1-10-table">
          Nama Asesor 2
        </div>
        <div class="col-1-10-table">
          : <?=$asesor[1]['Nama'];?>
        </div>
        <div class="col-1-10-table">
           MEMENUHI
        </div>

    </div>
    <?php endif ;?>
    <div class="row">
        <div class="col-1-10-table">
           Tanggal Pelaksana Tinjauan Hasil Evaluasi Oleh Asesor 1
        </div>
        <div class="col-1-10-table">
          : <?=$asesor[0]['tgl_penunjukan']." s.d ".$penilaian_frpkp_1[0]['tgl_penilaian'];?>
        </div>
        <div class="col-1-10-table">
           MEMENUHI
        </div>

    </div>
<?php if(count($asesor)==2) :?>
     <div class="row">
        <div class="col-1-10-table">
           Tanggal Pelaksana Tinjauan Hasil Evaluasi Oleh Asesor 2
        </div>
        <div class="col-1-10-table">
          : <?=$asesor[0]['tgl_penunjukan']." s.d ".$penilaian_frpkp_2[0]['tgl_penilaian'];?>
        </div>
        <div class="col-1-10-table">
           MEMENUHI
        </div>

    </div>
    <?php endif ;?>
    
    <div class="row">
        <div class="col-1-10-table">
          Nama Pelaksana Tinjauan Hasil Evaluasi
        </div>
        <div class="col-1-10-table">
          <?php $data_fthep=$this->Bu_model->get_user($penilaian_fthep[0]['id_asesor']) ;?>
          : <?=$data_fthep[0]['Nama'];?>
        </div>
        <div class="col-1-10-table">
           MEMENUHI
        </div>

    </div>
    <div class="row">
        <div class="col-1-10-table">
          Tanggal Pelaksanaan Tinjauan Hasil Evaluasi / Penilaian Kesesuaian
        </div>
        <div class="col-1-10-table">
          
          : <?=$penilaian_fthep[0]['tgl_penilaian'];?>
        </div>
        <div class="col-1-10-table">
           MEMENUHI
        </div>

    </div>
    
  </section>
    <section class="items">
    <div class="center">
  Rekomendasi hasil peniaian badan usaha dinyatakan DISETUJUI<br>
Demikian berita acara ini dibuat dengan sebenar-benarnya untuk dapat dipergunakan sebagaimana mestinya.<br>

<?="Jakarta, ".$tanggal.'-'.$bulan.'-'.$tahun;?><br>

    </div>
  </section>


 <section class="items"  style="
    width: 50%;
    margin: 0 auto;
">
  <!-- Baris 1: Catatan atas -->


  <!-- Baris 2: Tiga kolom -->
  <div class="row">
    <!-- Kolom Kiri -->

    <!-- Kolom Kanan (TTD) -->
    <div class="col-1-20-table" style="border: 1px solid black;">
      <div class="center">
        
          Pemutus 1 
          <?php $user=$this->Bu_model->get_user($komite[0]['id_komite']) ;?>
          <?php $data=$this->Bu_model->get_user_nama_asesor($user[0]['Nama']) ;?>

          <br>
        <?php
                  $path = base_url('assets/assets2/'.$data[0]['Username'].".png");
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
    <div class="col-1-20-table" style="border: 1px solid black;">
      <div class="center">
       
          Pemutus 2 
          <?php $user=$this->Bu_model->get_user($komite[1]['id_komite']) ;?>
          <?php $data=$this->Bu_model->get_user_nama_asesor($user[0]['Nama']) ;?>
          <br>
        <?php
                  $path = base_url('assets/assets2/'.$data[0]['Username'].".png");
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
    <div class="col-1-20-table" style="border: 1px solid black;">
      <div class="center">
        
          Pemutus 3
          <?php $user=$this->Bu_model->get_user($komite[2]['id_komite']) ;?>
          
          <?php $data=$this->Bu_model->get_user_nama_asesor($user[0]['Nama']) ;?>
          <br>
        <?php
                  $path = base_url('assets/assets2/'.$data[0]['Username'].".png");
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

