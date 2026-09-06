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
  <!--
  <section class="items">

      <div class="row">
          <div class="col-1-10 ">
            <div class="logo">
                <img src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/ski/assets/media/logos/Logo_ski_2.png';?>"  height="130" width="110" >


            </div>
          </div>
      </div>




  </section>
-->



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


      Jakarta, <?= date("d").' '.$bulan.' '.date("Y") ;?>
      <br>
      Kepada Yth<br>
      Ketua LPJK<br>
      Di Jakarta<br>
      <br>
      <br>
      Hal : Penerbitan Sertifikasi<br>
      <br>
      <br>
      Dengan Hormat,<br>
      <br>
      Bersama ini kami sampaikan penerbitan sertifikasi badan usaha dari LSBU GAPEKNAS INFRASTRUKTUR. <br>
      <section class="items">
      <div class="row">
          <div class="col-1-10">
            1. Nama Badan Usaha :
          </div>
          <div class="col-1-10">
            : <?=$biodata[0]['nama'];?>
          </div>


      </div>

        <div class="row">
            <div class="col-1-10">
              2. Alamat Badan Usaha
            </div>
            <div class="col-1-10">
              : <?=$biodata[0]['alamat_bu'];?>
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
              Permohonan
            </div>
          </div>

          <div class="col-1-10-table">
            <div class="center">
              Klasifikasi
            </div>
          </div>


        <div class="col-1-10-table">
          <div class="center">
            Sub Klasifikasi
          </div>
        </div>


      <div class="col-1-10-table">
        <div class="center">
          Kualifikasi
        </div>
      </div>


    <div class="col-1-10-table">
      <div class="center">
        Kode
      </div>
    </div>



      </div>
      <?php $i=0 ;?>
      <?php foreach($record as $row) :?>
        <?php $i+=1 ;?>

      <div class="row">
          <div class="col-1-5-table">
            <div class="center">
              <?=$i ;?>
            </div>

          </div>
          <div class="col-1-10-table">
            <div class="center">
            BARU

            </div>
          </div>
          <div class="col-1-10-table">
            <div class="center">
            <?=$row['id_klasifikasi'] ;?>

            </div>
          </div>
          <div class="col-1-10-table">
            <div class="center">
            <?=$row['id_sub_klasifikasi'] ;?>

            </div>
          </div>
          <div class="col-1-10-table">
            <div class="center">
            <?=$row['kualifikasi'] ;?>

            </div>
          </div>
          <div class="col-1-10-table">
            <div class="center">
            <?=$row['id_sub_klasifikasi'] ;?>

            </div>
          </div>



      </div>

    <?php endforeach ;?>


    </section>
    <br>
    <br>
    Atas perhatian dan kerjasamanya kami ucapkan terima kasih.<br>
    <br>
    Hormat kami<br>
    Ketua Pelaksana LSBU GAPEKNAS INFRASTRUKTUR<br>
    <br>
    <br>
    <br>
    <br>
    <br>
    Roland TM Siahaan, ST., MBA

</body>
</html>
