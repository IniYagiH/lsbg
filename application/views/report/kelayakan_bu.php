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
        .kop_surat {
            font-size: 25px;
            margin-right: 0px;

            text-align:center;
            float: left;
        }
        .col-1-90 {
            width: 90%;
        }
        .berita_acara {
            font-size: 20px;
            margin-right: 0px;
            margin-top: 0px;
            float: left;
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
        <div class="col-1-10 ">
          <div class="logo">

              <img src="<?= base_url('assets/media/logos/logo_lsbu.png') ;?>" style="margin-top:-20px;border: 1px; max-height: 190px; max-width: 120px; ">

          </div>
        </div>
        <div class="col-1-90 ">
          <div class="kop_surat">
            <b>PT. BINA MITRA RANCANGBANGUN</b><br>
            <div style="font-size: 13px;">
              Grand Duren Tiga Office Building, Blok A Lantai4  Jl.Duren Tiga Raya No.9 Jakarta 12760<br> Telp. /Fax : 021-26962968  -  Email:  admin@ptbmr.co.id  -  Website:  www.ptbmr.co.id
            </div>
          </div>
        </div>

      </div>

  </section>
  <br>
  <br>
  <br>

  <hr>
  <section class="items">

      <!-- your favorite templating/data-binding library would come in handy here to generate these rows dynamically !-->
      <div class="row">


          <div class="col-1-52">
            <div class="berita_acara">
              BERITA ACARA KELAYAKAN
                <br>
              DATA PERMOHONAN REGISTRASI DAN SERTIFIKASI
              <br>
              BADAN USAHA JASA PELAKSANA KONSTRUKSI

            </div>
          </div>


      </div>




  </section>



<!--
    <div class="fromto from">
        <div class="panel">Result:</div>
        <div class="fromtocontent">
            <span>NPWP: xxxx-xx-x-x-x</span><br />
            <span>ID BU: 1311553388</span><br />
            <span>NAMA BADAN USAHA:CV. MAWAR</span><br />
        </div>
    </div>
-->

    <section class="items">

        <div class="row">
            <div class="col-1-10">
              1. Nama Asosiasi :
            </div>
            <div class="col-1-10">
              : <?php echo $bu[0]['nama_asosiasi'] ;?>
            </div>


        </div>
        <div class="row">
            <div class="col-1-10">
              2. NPWP
            </div>
            <div class="col-1-10">
              : <b><?php echo $bu[0]['NPWP'] ;?></b>
            </div>

        </div>


    </section>
    <div class="left-pds">
      Berdasarkan data badan usaha yang disampaikan maka kami Asesor merekomendasikan bahwa adan usaha ini dapat diberikan klasifikasi dan kualifikasi sebagai berikut:
    </div>
    <section class="items">

        <div class="row">
            <div class="col-1-10">
              1. Nama Badan Usaha
            </div>
            <div class="col-1-10">
              : <b><?php echo $bu[0]['Nama'] ;?></b>
            </div>


        </div>

        <div class="row">
            <div class="col-1-10">
              2. Alamat Badan Usaha
            </div>
            <div class="col-1-10">
              : <?php echo $bu[0]['Alamat'] ;?>
            </div>

        </div>
        <div class="row">
          <div class="col-1-10">
            3. Tanggal Permohonan
          </div>
          <div class="col-1-10">
            : <?php echo $bu[0]['Tgl_permohonan'] ;?>
          </div>

        </div>
        <div class="row">
          <div class="col-1-10">
            4. Propinsi
          </div>
          <div class="col-1-10">
            : <?php echo $bu[0]['ID_Propinsi'] ;?>
          </div>

        </div>

    </section>
    <section class="items">


      <div class="row">
          <div class="col-1-5-table">
            <div class="center">
              No
            </div>
          </div>
          <div class="col-1-10-table">
            <div class="center">
              Subklasifikasi
            </div>
          </div>
          <div class="col-1-5-table">
            <div class="center">
              Evaluasi Administrasi
            </div>

          </div>
          <div class="col-1-5-table">
            <div class="center">
              Evaluasi Pengurus
            </div>

          </div>
          <div class="col-1-5-table">
            <div class="center">
              Kelengkapan Permohonan
            </div>

          </div>
          <div class="col-1-5-table">
            <div class="center">
              VV Dokumen
            </div>

          </div>
          <div class="col-1-5-table">
            <div class="center">
              Evaluasi Pengalaman
            </div>

          </div>
          <div class="col-1-5-table">
            <div class="center">
              Evaluasi Keuangan
            </div>

          </div>

          <div class="col-1-5-table">
            <div class="center">
              Evaluasi SDM
            </div>

          </div>
          <div class="col-1-5-table">
            <div class="center">
              Kualifikasi
            </div>

          </div>
          <div class="col-1-10-table">
            <div class="center">
              Keputusan Asesor
            </div>

          </div>
          <div class="col-1-5-table">
            <div class="center">
              Tahun KD
            </div>

          </div>
          <div class="col-1-5-table">
            <div class="center">
              Nilai KD
            </div>

          </div>
          <div class="col-1-20-table">
            <div class="center">
              Catatan Asesor
            </div>

          </div>
      </div>
        <?php $i=1 ;?>
        <?php foreach($record as $row) :?>
      <div class="row">
          <div class="col-1-5-table">
            <div class="center">
              <?php echo $i ;?>
            </div>

          </div>

          <div class="col-1-10-table">
            <div class="center">
            <?php echo $row['id_sub_klasifikasi'] ;
            if($row['id_unit_sertifikasi']=='1'){
              echo '[BR]';
            }elseif($row['id_unit_sertifikasi']=='2'){
              echo '[PP]';
            }else{
              echo '[PB]';
            }?>

            </div>
          </div>
          <div class="col-1-5-table">
            <div class="center">

            <?php if($row['administrasi']=='1'){
              echo 'Sesuai';
            }else{
              echo 'Tidak Sesuai';
            } ;?>
            </div>
          </div>
          <div class="col-1-5-table">
            <div class="center">

            <?php if($row['pengurus']=='1'){
              echo 'Sesuai';
            }else{
              echo 'Tidak Sesuai';
            } ;?>
            </div>
          </div>
          <div class="col-1-5-table">
            <div class="center">

            <?php if($row['kelengkapan']=='1'){
              echo 'Sesuai';
            }else{
              echo 'Tidak Sesuai';
            } ;?>
            </div>
          </div>
          <div class="col-1-5-table">
            <div class="center">

            <?php if($row['dokumen_vv']=='1'){
              echo 'Sesuai';
            }else{
              echo 'Tidak Sesuai';
            } ;?>
            </div>
          </div>
          <div class="col-1-5-table">
            <div class="center">

            <?php if($row['pengalaman']=='1'){
              echo 'Sesuai';
            }else{
              echo 'Tidak Sesuai';
            } ;?>
            </div>
          </div>
          <div class="col-1-5-table">
            <div class="center">

            <?php if($row['keuangan']=='1'){
              echo 'Sesuai';
            }else{
              echo 'Tidak Sesuai';
            } ;?>
            </div>
          </div>

          <div class="col-1-5-table">
            <div class="center">

            <?php if($row['SDM']=='1'){
              echo 'Sesuai';
            }else{
              echo 'Tidak Sesuai';
            } ;?>
            </div>
          </div>
          <div class="col-1-5-table">
            <div class="center">
            <?php echo $row['kualifikasi'] ;?>

            </div>
          </div>
          <div class="col-1-10-table">
            <div class="center">
            <?php if($row['hasil_akhir']=='1'){
              echo 'Diterima';
            }else{
              echo 'Ditolak';
            } ;?>
            </div>
          </div>
          <div class="col-1-5-table">
            <div class="center">
            <?php echo $row['th_kd'] ;?>
            </div>
          </div>
          <div class="col-1-5-table">
            <div class="center">
            <?php echo $row['nilai_kd'] ;?>
            </div>
          </div>
          <div class="col-1-20-table">
            <?php echo $row['Berita_Acara'] ;?>
          </div>
      </div>
      <?php $i=$i+1 ;?>
    <?php endforeach ;?>


    </section>
    <section class="items">

      <div class="row">
        <div class="col-1-30">
          Demikian Berita Acara Pemeriksaan berkas sertifikat ini dibuat

        </div>
        <div class="col-1-15">

        </div>

          <div class="col-1-30">
          <!--Ketua Pelaksana-->
          </div>
          <div class="col-1-15">

          </div>
          <div class="col-1-10">
            <!--Asesor 1-->
          </div>

          <div class="col-1-15">

          </div>

          <div class="col-1-30">
            <!--Asesor 2-->

          </div>



      </div>

      <div class="row">
        <div class="col-1-15">
          <br>
          <br>
          Keterangan:<br>
          S: Sesuai<br>
          TS: Tidak Sesuai<br>
          BR: Registrasi Baru<br>
          PB: Registrasi Perubahan<br>
          PP: Registrasi Perpanjangan
        </div>
        <div class="col-1-10">
        </div>

          <div class="col-1-15-table">
            <div class="center">
              PELAKSANA SERTIFIKASI BADAN USAHA
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              (..........................)
            </div>
          </div>

          <div class="col-1-10">
          </div>
          <div class="col-1-15-table">
            <div class="center">
              Asesor 1
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              (..........................)
            </div>
          </div>
          <div class="col-1-10">
          </div>

          <div class="col-1-10-table">
            <div class="center">
              Asesor 2
              <br>
              <br>
              <br>
              <br>
              <br>
              <br>
              (..........................)
            </div>
          </div>



      </div>
    </section>

</body>
</html>
