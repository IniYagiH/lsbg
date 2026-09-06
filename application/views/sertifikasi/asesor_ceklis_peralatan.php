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
        .berita_acara_right {
            margin-right: 0px;
            margin-top: 0px;
            float: right;
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
        .row_right {
            display: table-row;
            page-break-inside: avoid;
            float: right;
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
        Telp: (021) 4711 796, Fax: (021) 4711 860. <br>
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
    <div class="center">
      LEMBAR PENILAIAN KEMAMPUAN DALAM PENYEDIAAN PERALATAN UTAMA BADAN USAHA

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
          NPWP
        </div>
        <div class="col-1-10">
          : <?=$biodata[0]['npwp'];?>
        </div>


    </div>
    <div class="row">
        <div class="col-1-10">
          Bentuk Usaha
        </div>
        <div class="col-1-10">
          : <?=$biodata[0]['bentuk_usaha'];?>
        </div>


    </div>
    <div class="row">
        <div class="col-1-10">
          Jenis Usaha
        </div>
        <div class="col-1-10">
          : <?=$biodata[0]['klasifikasi_jenis_usaha'];?>
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



<?php foreach ($peralatan as $row_peralatan) :?>
<b><?=$row_peralatan['sub_klasifikasi'] ;?></b>
    <section class="items">

      <div class="row">
        <div class="col-1-5-table">
          <div class="center">
            No
          </div>
        </div>

          <div class="col-1-10-table">
            <div class="center">
              Jenis / Macam / Peralatan Utama
            </div>
          </div>
          <div class="col-1-10-table">
            <div class="center">
              Lokasi Sekarang
            </div>
          </div>
          <div class="col-1-10-table">
            <div class="center">
              Kapasitas atau Output
            </div>
          </div>
          <div class="col-1-10-table">
            <div class="center">
              Merk, Type dan Nomor Seri
            </div>
          </div>
          <div class="col-1-10-table">
            <div class="center">
              Keadaan (Baik/Rusak)
            </div>
          </div>
          <div class="col-1-10-table">
            <div class="center">
              Taksiran Harga Sekarang
            </div>
          </div>
          <div class="col-1-10-table">
            <div class="center">
              Nomor Pencatatan di SDPK
            </div>
          </div>


      </div>


      <?php for($i=0;$i<count($peralatan);$i++): ?>

        <?php if($row_peralatan['sub_klasifikasi']==$peralatan[$i]['sub_klasifikasi']) :?>
      <div class="row">
        <div class="col-1-5-table">
          <div class="center">
            <?=$i+1;?>
          </div>
        </div>

          <div class="col-1-10-table">
            <div class="center">
              <?=$peralatan[$i]['jenis_peralatan'];?>
            </div>
          </div>
          <div class="col-1-10-table">
            <div class="center">
              <?=$peralatan[$i]['kab_kota'];?>
            </div>
          </div>
          <div class="col-1-10-table">
            <div class="center">
              <?=$peralatan[$i]['kapasitas_hasil_uji'];?>
            </div>
          </div>
          <div class="col-1-10-table">
            <div class="center">
              <?=$peralatan[$i]['model_type'];?>
            </div>
          </div>
          <div class="col-1-10-table">
            <div class="center">
              <?=$peralatan[$i]['kondisi'];?>
            </div>
          </div>
          <div class="col-1-10-table">
            <div class="center">
              <?=$peralatan[$i]['harga'];?>
            </div>
          </div>
          <div class="col-1-10-table">
            <div class="center">
              <?=$peralatan[$i]['nomor_registrasi_peralatan'];?>
            </div>
          </div>


      </div>
    <?php endif ;?>
  <?php endfor ;?>



    </section>
<?php endforeach ;?>



</body>
<section class="items">
  <div class="row">

      <div class="col-1-5-table">
        <div class="center">
          1
        </div>
      </div>

      <div class="col-1-40-table">
        Kepemilikan Peralatan

      </div>



      <div class="col-1-40-table">
        <div class="center">
        <?php if($data_ceklis21=="1"){
          echo 'ADA';
        }else{
          echo 'TIDAK ADA';
        } ?>
        <?php if($data_ceklis21_2=="1"){
          echo ' & VALID';
        }else{
          echo 'TIDAK VALID';
        } ?>
        </div>
      </div>
  </div>
  <div class="row">

      <div class="col-1-5-table">
        <div class="center">
          2
        </div>
      </div>

      <div class="col-1-40-table">
        Foto Plat Nama

      </div>



      <div class="col-1-40-table">
        <div class="center">
        <?php if($data_ceklis27=="1"){
          echo 'ADA';
        }else{
          echo 'TIDAK ADA';
        } ?>
        <?php if($data_ceklis27_2=="1"){
          echo ' & VALID';
        }else{
          echo 'TIDAK VALID';
        } ?>
        </div>
      </div>
  </div>
  <div class="row">

      <div class="col-1-5-table">
        <div class="center">
          3
        </div>
      </div>

      <div class="col-1-40-table">
        Foto Nampak Depan

      </div>



      <div class="col-1-40-table">
        <div class="center">
        <?php if($data_ceklis28=="1"){
          echo 'ADA';
        }else{
          echo 'TIDAK ADA';
        } ?>
        <?php if($data_ceklis28_2=="1"){
          echo ' & VALID';
        }else{
          echo 'TIDAK VALID';
        } ?>
        </div>
      </div>
  </div>
  <div class="row">

      <div class="col-1-5-table">
        <div class="center">
          4
        </div>
      </div>

      <div class="col-1-40-table">
        Foto Nampak Samping

      </div>



      <div class="col-1-40-table">
        <div class="center">
        <?php if($data_ceklis29=="1"){
          echo 'ADA';
        }else{
          echo 'TIDAK ADA';
        } ?>
        <?php if($data_ceklis29_2=="1"){
          echo ' & VALID';
        }else{
          echo 'TIDAK VALID';
        } ?>
        </div>
      </div>
  </div>
  <div class="row">

      <div class="col-1-5-table">
        <div class="center">
          5
        </div>
      </div>

      <div class="col-1-40-table">
        Hasil Pemeriksaan Pengujian

      </div>



      <div class="col-1-40-table">
        <div class="center">

        <?php if($data_ceklis36=="1"){
          echo 'ADA';
        }else{
          echo 'TIDAK ADA';
        } ?>
        <?php if($data_ceklis36_2=="1"){
          echo ' & VALID';
        }else{
          echo 'TIDAK VALID';
        } ?>

        </div>
      </div>
  </div>
  <div class="row">

      <div class="col-1-5-table">
        <div class="center">
          6
        </div>
      </div>

      <div class="col-1-40-table">
        Rekomendasi Kelayakan Peralatan

      </div>



      <div class="col-1-40-table">
        <b><i>
        <div class="center">
        <?php if($data_ceklis95=="1"){
          echo 'VALID';
        }else{
          echo 'TIDAK VALID';
        } ?>
        </b></i>
        </div>
      </div>
  </div>
  <div class="row">

      <div class="col-1-5-table">
        <div class="center">
          7
        </div>
      </div>

      <div class="col-1-40-table">
        Catatan Tentang Data Peralatan

      </div>



      <div class="col-1-40-table">
        <div class="center">
        <?=$data_comment89; ?>
        </div>
      </div>
  </div>
</section>
<section class="items">

  <div class="row">

    <div class="col-1-30">
      <div class="center">
        ABU I
      </div>
    </div>
    <div class="col-1-30">
      <div class="center">
        ABU II
      </div>
    </div>

  </div>

  <div class="row">

    <div class="col-1-15-table">

      <div class="logo">

          <img src="<?= $asesor[0]['persyaratan']; ;?>" style="border: 1px; max-height: 190px; max-width: 160px; ">

      </div>
      <?= $asesor[0]['Nama']; ?>
      <br>
      (...................................)
      <br>

    </div>
    <div class="col-1-15-table">

      <div class="logo">

          <img src="<?= $asesor[1]['persyaratan']; ;?>" style="border: 1px; max-height: 190px; max-width: 160px; ">

      </div>
      <?= $asesor[1]['Nama']; ?>
      <br>
      (...................................)
      <br>

    </div>







  </div>


</section>
</html>
