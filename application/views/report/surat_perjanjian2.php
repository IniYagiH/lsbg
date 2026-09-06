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
        .col-1-80 {
            width: 80%;
        }
        .berita_acara {
            font-size: 17px;
            margin-right: 0px;
            margin-top: 0px;
            text-align: center;
        }
        .berita_acara2 {
            font-size: 16px;
            margin-right: 0px;
            margin-top: -20px;
            text-align: center;
        }
        .berita_acara_right {
            margin-right: 0px;
            margin-top: 0px;
            float: right;
        }
        .berita_acara_left {
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
        .itemsz {
            clear: both;
            display: table;
            padding-left: 20px;
            padding-top: 20px;
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
        .row-right {
            display: table-row;
            page-break-inside: avoid;
            float: right;
        }
    </style>

</head>

<body>
  <section class="items">

      <!-- your favorite templating/data-binding library would come in handy here to generate these rows dynamically !-->
      <div class="row">
        <div class="col-1-10 ">
          <div class="logo">
            <?php


            $path = base_url('assets/media/logos/Logo_gapeknas.png');
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
              <img src="<?=$base64 ;?>" style="margin-top:10px;border: 1px; max-height: 190px; max-width: 120px; ">

          </div>
        </div>
        <div class="col-1-90 ">
          <div class="kop_surat">
            <b>PT LSBU GAPEKNAS INFRASTRUKTUR</b><br>
            <div style="font-size: 15px;">
Ruko Graha Mas Pemuda Blok AD No. 21 Jl. Pemuda, Rawamangun, Jakarta Timur            </div>
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


            <div class="berita_acara">

              SURAT PERJANJIAN SERTIFIKASI
              <br>

              NOMOR: <?= $no_urut ;?>

              <br>



            </div>




      </div>




  </section>


  
    <section class="items">
      <div class="row">
          <div class="col-1-10">
          Perjanjian ini dibuat pada hari <?= $hari ;?> tanggal <?= date("d") ;?> bulan <?= $bulan ;?> tahun <?= date("Y") ;?> oleh dan antara :
          </div>


      </div>
    </section>
    <section class="items">

      <div class="row">
      <div class="col-1-5">
            1. 
          </div>
          <div class="col-1-50">
             <b><?= $pjbu[0]['nama'] ;?></b>, dalam hal ini bertindak dalam kedudukannya selaku <b>PJBU</b> BUJK berkedudukan di Jalan <?= $biodata[0]['alamat_bu'];?> untuk selanjutnya disebut <b>Pihak Kedua</b>, dan: 
          
            </div>
      </div>
      <div class="row">
      <div class="col-1-5">
            2.
          </div>
          <div class="col-1-50">
          <b>Ronald Togu, ST., MBA.,</b> bertindak dalam kedudukannya selaku LSBU, berkedudukan di Ruko Graha Mas Pemuda Blok AD No. 21 Jl. Pemuda, Rawamangun, Jakarta Timur, untuk selanjutnya disebut <b>Pihak Pertama.</b>          </div>
      </div>
    </section>
    <section class="items">
      <div class="row">
              <div class="berita_acara">
        
                <b>MENGINGAT</b>
              </div>
        </div>
    </section>
    <section class="items">
      <div class="row">
          <div class="col-1-5">
            -
          </div>
          <div class="col-1-50">
            BAHWA Pihak Pertama adalah Lembaga Independen yang merupakan Lembaga Sertifikasi Badan Usaha Jasa Konstruksi yang berwenang memberikan jasa Sertifikasi Badan Usaha Jasa Konstruksi berdasarkan Surat Keputusan Ketua Lembaga Pengembangan Jasa Konstruksi Kementerian Pekerjaan Umum dan Perumahan Rakyat Republik Indonesia Nomor 10/LisensiLSBU/LPJK/XI/2021 Tentang Lisensi terhadap LSBU PT. LSBU GAPEKNAS INFRASTRUKTUR.           </div>
      </div>
      <div class="row">
          <div class="col-1-5">
            -
          </div>
          <div class="col-1-50">
            BAHWA Pihak Kedua adalah pihak yang memerlukan dan berkehendak untuk menggunakan jasa Pihak Pertama, untuk mendapatkan Sertifikat Badan Usaha Jasa Konstruksi, dari Pihak Pertama.           </div>
      </div>
      <div class="row">
          <div class="col-1-5">
            -
          </div>
          <div class="col-1-50">
          	Maka berdasarkan pertimbangan-pertimbangan tersebut di atas, para pihak mengadakan Perjanjian Kerja dengan syarat-syarat dan kondisi-kondisi sebagai berikut:          </div>
      </div>
    </section>

    <section class="items">
        <div class="row">
            <div class="berita_acara2">
                <b>
                  Pasal 1<br> RUANG LINGKUP PEMBERIAN JASA


                </b>
              </div>
        </div>
    </section>
    <section class="items">


      <div class="row">
          <div class="col-1-5">
            1.
          </div>
          <div class="col-1-50">
            Atas permintaan <b>PIHAK KEDUA</b>, <b>PIHAK PERTAMA</b> dengan ini sepakat untuk melakukan jasa sertifikasi BUJK <b>PIHAK KEDUA</b> berdasarkan Surat permohonan Sertifikasi, guna memperoleh Sertifkat Badan Usaha Jasa Konstruksi berdasarkan syarat-syarat dan kondisi-kondisi sebagaimana diatur dalam Surat Perjanjijan Sertifikasi ini;
          </div>
      </div>
      <div class="row">
          <div class="col-1-5">
            2.
          </div>
          <div class="col-1-50">
            <b>PIHAK PERTAMA</b> akan menggunakan tenaga Asesor Badan Usaha yang berkaulitas, memiliki sertifikat Asesor Badan usaha dan kompeten, independen dan dijamin dapat menjaga kerahasiaan <b>PIHAK KEDUA</b>, dalam melaksanakan Jasa Sertifiaksi badan Usaha Jasa Konstruksi;
         </div>
      </div>
      <div class="row">
          <div class="col-1-5">
            3.
          </div>
          <div class="col-1-50">
            <b>PIHAK PERTAMA</b> akan melaksanakan evaluasi/penilaian kesesuaian pada sistem usaha jasa konstruksi berdasarkan permohonan sertifikasi dari <b>PIHAK KEDUA</b>, sesuai dengan prosedur yang telah ditetapkan oleh PT. LSBU GAPEKNAS INFRASTRUKTUR
         </div>
      </div>
      <div class="row">
          <div class="col-1-5">
            4.
          </div>
          <div class="col-1-50">
            <b>Tinjauan Permohonan Sertifikasi</b> akan dilakukan <b>PIHAK PERTAMA</b>, setelah <b>PIHAK PERTAMA</b> menerima kelengkapan dokumen <b>PIHAK KEDUA</b>, dan telah memenuhi kecukupan dokumen, kemudian akan dilanjutkan dengan tahap evaluasi dan penilaian kesesuaian oleh <b>PIHAK PERTAMA</b>;
         </div>
      </div>
      <div class="row">
          <div class="col-1-5">
            5.
          </div>
          <div class="col-1-50">
            Tahap Evaluasi dan Penilaian Kesesuaian dilakukan oleh <b>PIHAK PERTAMA</b> setelah <b>PIHAK KEDUA</b> menandatangani perjanjian ini.
          </div>
      </div>
    </section>
    <section class="items">
        <div class="row">
            <div class="berita_acara2">
                <b>
                  Pasal 2<br> KEWAJIBAN PARA PIHAK


                </b>
              </div>
        </div>
    </section>
    <section class="items">
      <div class="row">
          <div class="col-1-50">
          <b>1.	Kewajiban PIHAK PERTAMA adalah</b>
          </div>

      </div>
      <div class="row">

          <div class="col-1-50">
            a.&nbsp;&nbsp;&nbsp;&nbsp;Menyediakan Asesor Badan Usaha yang sesuai kompetensi, independen dan tidak bersikap memihak dalam melaksanakan tugasnya;
            <br>
            b.&nbsp;&nbsp;&nbsp;&nbsp;Menjamin setiap Asesor Badan Usaha yang ditugaskan dapat menjaga kerahasiaan seluruh data dan tidak mengungkapkan informasi kepada pihak lain, kecuali atas persetujuan PIHAK KEDUA;
            <br>
            c.&nbsp;&nbsp;&nbsp;&nbsp;Menerbitkan Sertifikat
            <br>
            d.&nbsp;&nbsp;&nbsp;&nbsp;Mengembalikan dokumen sertifikasi apablia <b>PIHAK KEDUA</b> dibekukan, dicabut atau dihentikan sertifikasinya;
            <br>
            e.&nbsp;&nbsp;&nbsp;&nbsp;Menyelesaikan proses penanganan keluhan dan banding;

          </div>
      </div>
      <div class="row">
          <div class="col-1-50">
            2.	Berkewajiban <b>PIHAK KEDUA</b> adalah :
          </div>

      </div>
      <div class="row">

          <div class="col-1-50">
            a.&nbsp;&nbsp;&nbsp;&nbsp;Memenuhi semua  persyaratan sertifikasi sesuai dengan yang ditetapkan oleh <b>PIHAK PERTAMA</b>
            <br>
            b.&nbsp;&nbsp;&nbsp;&nbsp;Memenuhi semua persyaratan kesesuaian berdasarkan Persyaratan pada Skema Sertifikasi :
            <br>
            c.&nbsp;&nbsp;&nbsp;&nbsp;Memberi akses informasi dan fasilitas yang diperlukan oleh <b>PIHAK PERTAMA</b> dalam pelaksanaan sertifikasi, evaluasi dan surveilen serta penyelidikan terhadap pengaduan atau partisipasi masyarakat jika diperlukan;
            <br>
            d.&nbsp;&nbsp;&nbsp;&nbsp;Memberitahukan kepada <b>PIHAK PERTAMA</b> mengenai perubahan organisasi dan manajemen, legalitas, sistem mutu, atau perubahan apapun yang dapat mempengaruhi kemampuannya untuk memenuhi standar persyaratan sertifikasi;
            <br>
            e.&nbsp;&nbsp;&nbsp;&nbsp;Menghentikan penggunaan iklan yang berisi referensi apapun, apabila terjadi pembekuan, pencabutan atau penghentian sertifikasi;
            <br>
            f.&nbsp;&nbsp;&nbsp;&nbsp;Menjaga reputasi <b>PIHAK PERTAMA</b> dengan menggunakan sertifikat yang diterbitkan oleh <b>PIHAK PERTAMA</b> sesuai aturannya dan tidak membuat pernyataan yang menyesatkan atau tidak sah terkait dengan hasil sertifikasi;
            <br>
            g.&nbsp;&nbsp;&nbsp;&nbsp;Memberitahu <b>PIHAK PERTAMA</b> apabila memberikan salinan dokumen sertifikasi secara keseluruhan atau sebagian kepada pihak lain;
            <br>
            h.&nbsp;&nbsp;&nbsp;&nbsp;Memelihara rekaman seluruh keluhan yang berkaitan dengan pemenuhan persyaratan sertifikasi termasuk tindakan yang diambil untuk menyelesaikan keluhan dan meberikan kepada <b>PIHAK PERTAMA</b> jika diperlukan.

          </div>
      </div>

    </section>
    <section class="items">
        <div class="row">
            <div class="berita_acara2">
                <b>
                  Pasal 3<br> SERTIFIKASI


                </b>
              </div>
        </div>
    </section>

    <section class="items">

      <div class="row">
          <div class="col-1-5">
            1.
          </div>
          <div class="col-1-50">
            Pelaksanaan Sertifikasi dilakukan <b>PIHAK PERTAMA</b>, setelah <b>PIHAK KEDUA</b> memenuhi persyaratan sertifiaksi
          </div>
      </div>
      <div class="row">
          <div class="col-1-5">
            2.
          </div>
          <div class="col-1-50">
            Sertifikasi Badan Usaha Jasa Konstruksi hanya akan diberikan kepada <b>PIHAK KEDUA</b>, bilamana berdasarkan hasil evaluasi/ penilaian kesesuaian yang dilakukan oleh <b>PIHAK PERTAMA</b> ternyata bahwa kemampuan usaha yang dimiliki oleh <b>PIHAK KEDUA</b> telah memenuhi kesesuaian dengan kelayakan kemampuan usaha;
          </div>
      </div>
      <div class="row">
          <div class="col-1-5">
            3.
          </div>
          <div class="col-1-50">
            Sertifikat tidak akan diberikan kepada <b>PIHAK KEDUA</b>, bilamana berdasarkan hasil evaluasi/penilaian kesesuaian <b>PIHAK PERTAMA</b>, ternyata bahwa kemampuan usaha yang dimiliki oleh <b>PIHAK KEDUA</b> tidak bersesuaian dengan kriteria penilaian.
          </div>
      </div>

    </section>
    <section class="items">
        <div class="row">
            <div class="berita_acara2">
                <b>
                  Pasal 4<br> MASA BERLAKU SERTIFIKAT
                </b>
              </div>
        </div>
    </section>
    <section class="items">

      <div class="row">
          <div class="col-1-5">
            1.
          </div>
          <div class="col-1-50">
	           Sertifikat berlaku untuk jangka waktu <b>3 (tiga) tahun</b> terhitung sejak tanggal diterbitkan;
          </div>
      </div>
      <div class="row">
          <div class="col-1-5">
            2.
          </div>
          <div class="col-1-50">
            <b>PIHAK KEDUA</b> dapat mengajukan sertifikasi ulang kepada PIHAK PERTAMA, 2 (dua) bulan sebelum masa berlaku sertifikat habis
          </div>
      </div>

    </section>
    <section class="items">
        <div class="row">
            <div class="berita_acara2">
                <b>
                  Pasal 5<br> Surveilen
                </b>
              </div>
        </div>
    </section>
    <section class="items">

      <div class="row">
          <div class="col-1-5">
            1.
          </div>
          <div class="col-1-50">
            <b>PIHAK PERTAMA</b> dapat melakukan pengawasan insidental ke lokasi PIHAK KEDUA selama masa berlakunya sertifikat;
          </div>
      </div>
      <div class="row">
          <div class="col-1-5">
            2.
          </div>
          <div class="col-1-50">
            Jika saat pengawasan insidental dilakukan, ditemukan ketidaksesuaian pada pemenuhan persyaratan sertifikasi, maka <b>PIHAK PERTAMA</b> akan meberikan kesempatan kepada <b>PIHAK KEDUA</b> untuk memperbaikinya;
          </div>
      </div>
      <div class="row">
          <div class="col-1-5">
            3.
          </div>
          <div class="col-1-50">
            Bilamana <b>PIHAK KEDUA</b> tidak juga memperbaiki ketidaksesuaian sebagaimana jangka waktu yang telah disepakati, <b>PIHAK PERTAMA</b> akan mengenakan sanksi beruapa pembekuan Sertifikat yang telah diberikan oleh <b>PIHAK PERTAMA</b> kepada <b>PIHAK KEDUA</b>;
          </div>
      </div>
      <div class="row">
          <div class="col-1-5">
            4.
          </div>
          <div class="col-1-50">
            Bilaman ternyata bahwa <b>PIHAK KEDUA</b> tidak juga melakukan perbaikan  dalam batasan waktu yang diberikan, maka <b>PIHAK PERTAMA</b> akan mencabut sertifikat yang diberikan kepada <b>PIHAK KEDUA</b>;
          </div>
      </div>
      <div class="row">
          <div class="col-1-5">
            5.
          </div>
          <div class="col-1-50">
            <b>PIHAK PERTAMA</b> akan memberi kesempatan kepada <b>PIHAK KEDUA</b> untuk menunda jadwal pengawasan berkala jika terjadi keadaan yang bersifat Force Major.          </div>
      </div>
    </section>
    <section class="items">
        <div class="row">
            <div class="berita_acara2">
                <b>
                  Pasal 6<br> PEMBIAYAAN DAN CARA PEMBAYARAN
                </b>
              </div>
        </div>
    </section>
    <section class="items">

      <div class="row">
          <div class="col-1-5">
            1.
          </div>
          <div class="col-1-50">
            Untuk setiap permohonan sertifikasi, <b>PIHAK KEDUA</b> dikenakan biaya sebesar:
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
              Klasifikasi
            </div>
          </div>
          <div class="col-1-30-table">
            <div class="center">
              Sub Klasifikasi
            </div>
          </div>
          <div class="col-1-10-table">
            <div class="center">
              kode KBLI
            </div>
          </div>
          <div class="col-1-10-table">
            <div class="center">
              Kualifikasi
            </div>
          </div>
          <div class="col-1-10-table">
            <div class="center">
              Biaya
            </div>
          </div>
      </div>
      <div class="row">

          <div class="col-1-5-table">
            <div class="center">
              1
            </div>
          </div>
          <div class="col-1-10-table">
            <div class="center">
              2
            </div>
          </div>
          <div class="col-1-30-table">
            <div class="center">
              3
            </div>
          </div>
          <div class="col-1-10-table">
            <div class="center">
              4
            </div>
          </div>
          <div class="col-1-10-table">
            <div class="center">
              5
            </div>
          </div>
          <div class="col-1-10-table">
            <div class="center">
              6
            </div>
          </div>
      </div>
      <?php $no=1; ?>

      <?php foreach($klasifikasi as $row): ?>

        <div class="row">

            <div class="col-1-5-table">
              <div class="center">
                <?=$no;?>
              </div>
            </div>
            <div class="col-1-10-table">
              <div class="center">
                <?=$row['id_klasifikasi'];?>
              </div>
            </div>
            <div class="col-1-30-table">

                <?=$row['id_sub_klasifikasi'].' - '.$row['deskripsi_subklasifikasi'];?>

            </div>
            <div class="col-1-10-table">
              <div class="center">
                <?=$row['nomor_kbli'];?>
              </div>
            </div>
            <div class="col-1-10-table">
              <div class="center">
                <?=$row['kualifikasi'];?>
              </div>
            </div>
            <div class="col-1-10-table">
              <div class="center">
                <?php $klasifikasi=substr($row['id_sub_klasifikasi'],0,2) ;?>
                <?php if($klasifikasi=='PB' OR $row['id_sub_klasifikasi']=='PL003'OR $row['id_sub_klasifikasi']=='PL005'OR $row['id_sub_klasifikasi']=='PL006'OR $row['id_sub_klasifikasi']=='PL007'OR $row['id_sub_klasifikasi']=='PL008') :?>
                  Rp.2,257,500.00
                <?php else :?>
                Rp.<?= number_format(($row['biaya']*1000), 2, '.', ',');?>
              <?php endif ;?>
              </div>
            </div>
        </div>
      <?php $no=$no+1; ?>
    <?php endforeach; ?>
    </section>
    <section class="items">

      <div class="row">
          <div class="col-1-5">
            2.
          </div>
          <div class="col-1-50">
            Biaya sertifikasi sebagaimana disebut diatas pada ayat 1 merupakan nilai bersih yang diterima oleh <b>PIHAK PERTAMA</b>, dan <b>PIHAK KEDUA</b> tidak berhak memotong Pajak Jasa Sertifikasi. Untuk itu <b>PIHAK PERTAMA</b> akan menunjukan bukti potong dari Kantor Pelayanan Pajak Pulogadung;
          </div>
      </div>
      <div class="row">
          <div class="col-1-5">
            3.
          </div>
          <div class="col-1-50">
            Sebelum pelaskanaan evaluasi/penilaian kesesuaian, <b>PIHAK KEDUA</b> harus melunasi biaya sertifikasi dalam waktu 7 (tujuh) hari kerja sejak data dinyatakan lengkap;
          </div>
      </div>
      <div class="row">
          <div class="col-1-5">
            4.
          </div>
          <div class="col-1-50">
            <b>PIHAK PERTAMA</b> harus melakukan penilaian kesesuaian paling lambat 15 (lima belas) hari kerja setelah <b>PIHAK KEDUA</b> membayar biaya sertifikasi.
          </div>
      </div>
      <div class="row">
          <div class="col-1-5">
            5.
          </div>
          <div class="col-1-50">
            Biaya Akomodasi dan Transportasi (termasuk makan dan kebutuhan selama surveilen) ditanggung oleh <b>PIHAK KEDUA</b>. Dan apabila biaya tersebut direimburse oleh <b>PIHAK PERTAMA</b> kepada <b>PIHAK KEDUA</b>, maka wajib disertakan bukti-bukti asli.
          </div>
      </div>
      <div class="row">
          <div class="col-1-5">
            6.
          </div>
          <div class="col-1-50">
            Apabila dilakukan pengawasan insidental/surveilen biaya pengawasan dibebankan kepada PIHAK KEDUA. Biaya pengawasan mencakup biaya surveilen, akomodasi, dan Transportasi;
          </div>
      </div>
      
      <div class="row">
          <div class="col-1-5">
            7.
          </div>
          <div class="col-1-50">
            Keseluruhan biaya sertifikasi dibayarkan oleh pihak kedua sebelum dilakukan proses sertifikasi: A/n PT. LSBU GAPEKNAS INFRASTRUKTUR, Bank BRI, No. Rek : 0320-01-001796-30-9
          </div>
      </div>
    </section>

    <section class="items">
        <div class="row">
            <div class="berita_acara2">
                <b>
                  Pasal 7<br>
JAMINAN SERTIFIKASI DAN KERAHASIAAN



                </b>
              </div>
        </div>
    </section>
    <section class="items">


      <div class="row">
          <div class="col-1-10">
            1.
          </div>
          <div class="col-1-50">
            Dalam melakukan jasa sertifikasi sebagaimana dimaksud dalam perjanjian ini, <b>PIHAK PERTAMA</b> tidak memberikan jaminan bahwa <b>PIHAK KEDUA</b> akan berhasil memperoleh Sertifikat Badan Usaha Jasa Konstruksi. Sertifikat akan diberikan apabila <b>PIHAK KEDUA</b> telah memenuhi persyaratan administrasi maupun pemenuhan persyaratan sertifikasi yang ditetapkan;
          </div>
      </div>
      <div class="row">
          <div class="col-1-10">
            2.
          </div>
          <div class="col-1-50">
            <b>PIHAK PERTAMA</b> menjamin segala kerahasiaan sertifikasi yang dilakukan terhadap <b>PIHAK KEDUA</b> dari pihak manapun, kecuali kepada otoritas kompeten PT. LSBU GAPEKNAS INFRASTRUKTUR Jasa Konstruksi sesuai persyaratan.

          </div>
      </div>

    </section>
    <section class="items">
        <div class="row">
            <div class="berita_acara2">
                <b>
                  Pasal 8 <br>LIABILITAS

                </b>
              </div>
        </div>
    </section>
    <section class="items">
      <div class="row">
          <div class="col-1-10">
            1.
          </div>
          <div class="col-1-50">
          <b>Pihak Pertama</b> memberikan jaminan kerugian yang timbul akibat evaluasi/penilaian kesesuaian, seperti kecerobohan yang dilakukan oleh Asesor Badan Usaha <b>Pihak Pertama</b> selama berada di lokasi <b>Pihak Kedua</b> atau karena kelalaian, maka Pihak Pertama akan membayar kerugian maksimal sebesar biaya sertifikasi yang telah dibayarkan oleh <b>Pihak Kedua</b> kepada <b>Pihak Pertama</b>;            </div>
      </div>
      <div class="row">
          <div class="col-1-10">
            2.
          </div>
          <div class="col-1-50">
          Bilamana terjadi perselisihan, kedua belah pihak sepakat untuk menyelesaikannya sebagaimana tercantum pada Pasal 10 Perjanjian ini.
          </div>
      </div>


    </section>
    <section class="items">
        <div class="row">
            <div class="berita_acara2">
                <b>
                  Pasal 9<br>
                  PEMAKAIAN SERTIFIKAT


                </b>
              </div>
        </div>
    </section>
    <section class="items">
      <div class="row">
          <div class="col-1-10">
            1.
          </div>
          <div class="col-1-50">
            <b>PIHAK KEDUA</b> wajib setelah memperoleh Sertifikat, mempertahankan dan memelihara persyaratan sertifikasi sesuai dengan Pedoman Penerapannya;
          </div>
      </div>
      <div class="row">
          <div class="col-1-10">
            2.
          </div>
          <div class="col-1-50">
            Dalam penggunaan sertifikat oleh <b>PIHAK KEDUA</b> tidak diperkenankan membuat pernyataan yang menyesatkan orang berkenaan dengan pelaksanaan sertifikasi.
          </div>
      </div>


    </section>
    <section class="items">
        <div class="row">
            <div class="berita_acara2">
                <b>
                  Pasal 10<br>
                  PERSELISIHAN


                </b>
              </div>
        </div>
    </section>
    <section class="items">
      <div class="row">
          <div class="col-1-10">
            1.
          </div>
          <div class="col-1-50">
            Semua sengketa yang timbul dari atau berkenaan dengan perjanjian sertifikasi ini yang tidak dapat diselesaikan secara damai dalam waktu 30 hari setelah sengketa ini diberitahukan secara tertulis oleh pihak yang satu kepada pihak lainnya, akan diselesaikan dalam tingkat pertama dan terakhir menurut peraturan prosedur Badan Arbitrase Nasional Indonesia (BANI) oleh arbiter-arbiter yang ditunjuk menurut peraturan tersebut. Biaya Arbitrase tersebut dipikul bersama secara proporsional oleh masing-masing Pihak.
          </div>
      </div>
    </section>
    <section class="items">
        <div class="row">
            <div class="berita_acara2">
                <b>
                  Pasal 11<br>
                  LAIN-LAIN

                </b>
              </div>
        </div>
    </section>
    <section class="items">
      <div class="row">
          <div class="col-1-10">
            1.
          </div>
          <div class="col-1-50">
            Hal-hal yang belum diatur dalam perjanjian ini, apabila dipandang perlu akan diatur kemudian melalui kesepakatan;
          </div>
      </div>
      <div class="row">
          <div class="col-1-10">
            2.
          </div>
          <div class="col-1-50">
            Perjanjian ini berlaku sejak tanggal ditandatangani oleh kedua belah pihak.
          </div>
      </div>
    </section>



    <section class="items">

      <div class="row">

          <div class="col-1-50">
            <div class="center">


            </div>
          </div>
          <div class="col-1-50">
            <div class="center">


            </div>
          </div>





      </div>




    </section>
    <section class="items">
      <div class="row">
          <div class="berita_acara2">
            Jakarta, <?= date("d")." ".$bulan." ".date("Y") ;?>
          </div>

      </div>
    </section>
    <section class="items">
      <div class="row">
        <div class="berita_acara_left">
       
          PIHAK PERTAMA,
          <br>
          <br>
          
          <?php


        $path = base_url('assets/sertifikat/qrcodex/'.$qr_sps);
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
          <img src="<?=$base64 ;?>" style="margin-top:10px;border: 1px; max-height: 190px; max-width: 120px; ">
          <br>
          <br>
          Ronald Togu, ST., MBA 
          
        </div>
        <div class="berita_acara_right">
          PIHAK KEDUA,
          <br>
          <br>

          <br>
          <br>
          <br>
          Materai & Stampel
          <br>
          <br>
          <br>
          (............................)
          <br>
          PERWAKILAN BUJK
        </div>

      </div>
    </section>

</body>
</html>
