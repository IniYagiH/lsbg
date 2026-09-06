<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Form Jadwal Surveilan (SRV.09-05) </title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }
    .row {
            display: table-row;
            page-break-inside: avoid;
        }

    th, td {
      border: 1px solid #333;
      text-align: center;
      padding: 5px;
    }

    th[colspan] {
      background-color: #ccc;
    }
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px;
      padding-bottom: -150px;
    }

    .right-logo {
    text-align: right;
      width: 150;
    }
    .left-logo {
        text-align: left;
      width: 150;
    }

    .company-info {
      text-align: center;
      flex-grow: 1;
      margin: 0 20px;
    }

    .company-info h2 {
      margin: 0;
      font-size: 16px;
    }

    .company-info p {
      margin: 4px 0;
      font-size: 20px;
    }

    .kan-code {
      font-size: 10px;
      text-align: right;
      margin-top: -10px;
    }

    .check {
      color: red;
      font-weight: bold;
    }
    .logo {
            float: left;
        }
    .items {
            clear: both;
            display: table;
            padding: 20pt;
        }
        .itemsx {
            clear: both;
            display: table;
            padding: 20pt;
            padding-top: -50pt;
        }
        .row {
            display: table-row;
            page-break-inside: avoid;
        }
        .center {
          text-align: center;
        }
        
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
        .col-1-90 {
            width: 90%;
        }
        .col-1-50 {
            width: 50%;
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
        .logos {
      display: flex;
      flex-direction: column;
      align-items: flex-end;
      gap: 5px;
    }
    .signature {
        font-size: 15px;
    text-align: right;
      margin-top: 30px;
      width: 100%;
      border-collapse: collapse;
    }

    .signature td {
      padding: 6px;
      border: 1px solid black;
      vertical-align: top;
    }

    .section-label {
      font-weight: bold;
    }
        
  </style>
</head>
<div class="header">
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
  <img src="<?=$base64 ;?>" alt="Logo LSBU" class="left-logo">
  
  <div class="company-info">
    <p><strong>PT LSBU GAPEKNAS INFRASTRUKTUR</strong></p>
    <p>Ruko Graha Mas Pemuda Blok AD No. 21 Jl. Pemuda, Rawamangun, Jakarta Timur</p>
    <p>Telp: (021) 4711 796, Fax: (021) 4711 860.</p>
    <p>Email pt.lsbugapeknas21@gmail.com</p>
  </div>
  
  <div>
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
                   
    
    <div class="kan-code"><img src="<?=$base64 ;?>" alt="Logo KAN" class="right-logo"></div>
  </div>
</div>
<hr>
<section class="itemsx">

<!-- your favorite templating/data-binding library would come in handy here to generate these rows dynamically !-->
<div class="row">

      <div class="center">
        <!--
          <img src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/gapenri/assets/media/logos/Logo_ski_2.png';?>"  height="130" width="110" >
        -->



      <br>
      <div class="center">
        <b>JADWAL SURVAILEN BADAN USAHA JASA KONSTRUKSI (BUJK)</b>
                </div>
      </div>



</div>




</section>
<br>
  <br>
<body>

<table>
<tr>
    <th rowspan="2">No</th>
    <th rowspan="2">NAMA BUJK</th>
    <th rowspan="2">NIB</th>
    <th rowspan="2">PROPINSI</th>
    <th rowspan="2">TIM SURVAILEN</th>

    <!-- Monthly Headers -->
    <!-- Repeat for all months -->
    <th class="header-month" colspan="4">Januari</th>
    <th class="header-month" colspan="4">Februari</th>
    <th class="header-month" colspan="4">Maret</th>
    <th class="header-month" colspan="4">April</th>
    <th class="header-month" colspan="4">Mei</th>
    <th class="header-month" colspan="4">Juni</th>
    <th class="header-month" colspan="4">Juli</th>
    <th class="header-month" colspan="4">Agustus</th>
    <th class="header-month" colspan="4">September</th>
    <th class="header-month" colspan="4">Oktober</th>
    <th class="header-month" colspan="4">November</th>
    <th class="header-month" colspan="4">Desember</th>

    <th rowspan="2">KETERANGAN</th>
  </tr>
  <tr>
    <th>1</th><th>2</th><th>3</th><th>4</th>
    <th>1</th><th>2</th><th>3</th><th>4</th>
    <th>1</th><th>2</th><th>3</th><th>4</th>
    <th>1</th><th>2</th><th>3</th><th>4</th>
    <th>1</th><th>2</th><th>3</th><th>4</th>
    <th>1</th><th>2</th><th>3</th><th>4</th>
    <th>1</th><th>2</th><th>3</th><th>4</th>
    <th>1</th><th>2</th><th>3</th><th>4</th>
    <th>1</th><th>2</th><th>3</th><th>4</th>
    <th>1</th><th>2</th><th>3</th><th>4</th>
    <th>1</th><th>2</th><th>3</th><th>4</th>
    <th>1</th><th>2</th><th>3</th><th>4</th>
  </tr>
  <!-- Row with check marks -->
   <?php $no=1 ;?>
<?php foreach($record as $row):?>
  <tr>
  <td><?=$no?></td>
  <td><?=$row['nama'];?></td>
  <td><?=$row['NIB'];?></td>
  <td><?=$row['nama_propinsi'];?></td>
  <td><?=$row['asesor1'].', '.$row['asesor2'].', '.$row['asesor3'];?></td>

    <td><?php if($row['bulan']=='1'){
        if($row['tgl']=='1'){
            echo"V";
        }
    };?></td>
    <td><?php if($row['bulan']=='1'){
        if($row['tgl']=='2'){
            echo"V";
        }
    };?></td>
    <td><?php if($row['bulan']=='1'){
        if($row['tgl']=='3'){
            echo"V";
        }
    };?></td>
    <td><?php if($row['bulan']=='1'){
        if($row['tgl']=='4'){
            echo"V";
        }
    };?></td>

    <td><?php if($row['bulan']=='2'){
        if($row['tgl']=='1'){
            echo"V";
        }
    };?></td>
    <td><?php if($row['bulan']=='2'){
        if($row['tgl']=='2'){
            echo"V";
        }
    };?></td>
    <td><?php if($row['bulan']=='2'){
        if($row['tgl']=='3'){
            echo"V";
        }
    };?></td>
    <td><?php if($row['bulan']=='2'){
        if($row['tgl']=='4'){
            echo"V";
        }
    };?></td>

    <td><?php if($row['bulan']=='3'){
        if($row['tgl']=='1'){
            echo"V";
        }
    };?></td>
    <td><?php if($row['bulan']=='3'){
        if($row['tgl']=='2'){
            echo"V";
        }
    };?></td>
    <td><?php if($row['bulan']=='3'){
        if($row['tgl']=='3'){
            echo"V";
        }
    };?></td>
    <td><?php if($row['bulan']=='3'){
        if($row['tgl']=='4'){
            echo"V";
        }
    };?></td>

    <td><?php if($row['bulan']=='4'){
        if($row['tgl']=='1'){
            echo"V";
        }
    };?></td>
    <td><?php if($row['bulan']=='4'){
        if($row['tgl']=='2'){
            echo"V";
        }
    };?></td>
    <td><?php if($row['bulan']=='4'){
        if($row['tgl']=='3'){
            echo"V";
        }
    };?></td>
    <td><?php if($row['bulan']=='4'){
        if($row['tgl']=='4'){
            echo"V";
        }
    };?></td>

    <td><?php if($row['bulan']=='5'){
        if($row['tgl']=='1'){
            echo"V";
        }
    };?></td>
    <td><?php if($row['bulan']=='5'){
        if($row['tgl']=='2'){
            echo"V";
        }
    };?></td>
    <td><?php if($row['bulan']=='5'){
        if($row['tgl']=='3'){
            echo"V";
        }
    };?></td>
    <td><?php if($row['bulan']=='5'){
        if($row['tgl']=='4'){
            echo"V";
        }
    };?></td>

    <td><?php if($row['bulan']=='6'){
        if($row['tgl']=='1'){
            echo"V";
        }
    };?></td>
    <td><?php if($row['bulan']=='6'){
        if($row['tgl']=='2'){
            echo"V";
        }
    };?></td>
    <td><?php if($row['bulan']=='6'){
        if($row['tgl']=='3'){
            echo"V";
        }
    };?></td>
    <td><?php if($row['bulan']=='6'){
        if($row['tgl']=='1'){
            echo"V";
        }
    };?></td>

    <td><?php if($row['bulan']=='7'){
        if($row['tgl']=='1'){
            echo"V";
        }
    };?></td>
    <td><?php if($row['bulan']=='7'){
        if($row['tgl']=='2'){
            echo"V";
        }
    };?></td>
    <td><?php if($row['bulan']=='7'){
        if($row['tgl']=='3'){
            echo"V";
        }
    };?></td>
    <td><?php if($row['bulan']=='7'){
        if($row['tgl']=='4'){
            echo"V";
        }
    };?></td>

    <td><?php if($row['bulan']=='8'){
        if($row['tgl']=='1'){
            echo"V";
        }
    };?></td>
    <td><?php if($row['bulan']=='8'){
        if($row['tgl']=='2'){
            echo"V";
        }
    };?></td>
    <td><?php if($row['bulan']=='8'){
        if($row['tgl']=='3'){
            echo"V";
        }
    };?></td>
    <td><?php if($row['bulan']=='8'){
        if($row['tgl']=='4'){
            echo"V";
        }
    };?></td>

    <td><?php if($row['bulan']=='9'){
        if($row['tgl']=='1'){
            echo"V";
        }
    };?></td>
    <td><?php if($row['bulan']=='9'){
        if($row['tgl']=='2'){
            echo"V";
        }
    };?></td>
    <td><?php if($row['bulan']=='9'){
        if($row['tgl']=='3'){
            echo"V";
        }
    };?></td>
    <td><?php if($row['bulan']=='9'){
        if($row['tgl']=='4'){
            echo"V";
        }
    };?></td>

    <td><?php if($row['bulan']=='10'){
        if($row['tgl']=='1'){
            echo"V";
        }
    };?></td>
    <td><?php if($row['bulan']=='10'){
        if($row['tgl']=='2'){
            echo"V";
        }
    };?></td>
    <td><?php if($row['bulan']=='10'){
        if($row['tgl']=='3'){
            echo"V";
        }
    };?></td>
    <td><?php if($row['bulan']=='10'){
        if($row['tgl']=='4'){
            echo"V";
        }
    };?></td>

    <td><?php if($row['bulan']=='11'){
        if($row['tgl']=='1'){
            echo"V";
        }
    };?></td>
    <td><?php if($row['bulan']=='11'){
        if($row['tgl']=='2'){
            echo"V";
        }
    };?></td>
    <td><?php if($row['bulan']=='11'){
        if($row['tgl']=='3'){
            echo"V";
        }
    };?></td>
    <td><?php if($row['bulan']=='11'){
        if($row['tgl']=='4'){
            echo"V";
        }
    };?></td>
    
    <td><?php if($row['bulan']=='12'){
        if($row['tgl']=='1'){
            echo"V";
        }
    };?></td>
    <td><?php if($row['bulan']=='12'){
        if($row['tgl']=='2'){
            echo"V";
        }
    };?></td>
    <td><?php if($row['bulan']=='12'){
        if($row['tgl']=='3'){
            echo"V";
        }
    };?></td>
    <td><?php if($row['bulan']=='12'){
        if($row['tgl']=='4'){
            echo"V";
        }
    };?></td>
    
    <td></td>
  </tr>
  <?php $no+=1 ;?>
  <?php endforeach ;?>
</table>


<!-- your favorite templating/data-binding library would come in handy here to generate these rows dynamically !-->


    <div class="kan-code">

    <div class="col-1-20">
      <table class="signature">
        <tr>
            <td colspan="2" class="section-label">Dibuat Oleh:</td>
            <td colspan="2" class="section-label">Diketahui Oleh:</td>
        </tr>
        <tr>
            <td>Tanggal</td><td><?=date('d-m-Y');?></td>
            <td></td><td></td>
        </tr>
        <tr>
            <td>Jabatan</td><td>Koordinator Manajemen Mutu</td>
            <td>Jabatan</td><td>Ketua Pelaksana</td>
        </tr>
        <tr>
            <td>Nama</td><td><b>Astini Primaningtyas</b></td>
            <td>Nama</td><td>Roland Togu, ST., MBA</td>
        </tr>
        <tr>
            <td>Tanda Tangan</td><td><?php
                  // $path = base_url('assets/sertifikat/qrcodex/'.$qr_sps); sementara karena masalah server GCP
                  $path = base_url('assets/media/astini.png');
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
          
</td>
            <td>Tanda Tangan</td><td><?php
                  // $path = base_url('assets/sertifikat/qrcodex/'.$qr_sps); sementara karena masalah server GCP
                  $path = base_url('assets/media/roland.png');
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
          </td>
        </tr>
        </table>
        </div>
      


      </div>











</body>
</html>
