<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Risalah Rapat</title>
  <style>
    body {
      font-family: "Times New Roman", Times, serif;
      margin: 40px;
    }
    .title {
      text-align: center;
      font-weight: bold;
      text-transform: uppercase;
    }
    .subtitle {
      text-align: center;
      margin-bottom: 30px;
    }
    .section {
      margin-bottom: 15px;
    }
    .label {
      display: inline-block;
      width: 100px;
      vertical-align: top;
    }
    .indent {
      margin-left: 20px;
    }
    .signature {
        font-size: 15px;
    text-align: right;
      margin-top: 30px;
      width: 100%;
      border-collapse: collapse;
    }
    .signature .block {
      text-align: center;
      width: 45%;
    }
    .footer-signature {
      display: flex;
      justify-content: space-between;
      margin-top: 70px;
    }
    .footer-signature .block {
      width: 45%;
      text-align: center;
    }
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 20px;
      padding-bottom: -150px;
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
      font-size: 13px;
    }

    .company-info p {
      margin: 4px 0;
      font-size: 15px;
    }
    .right-logo {
    text-align: right;
      width: 150;
    }
    .kan-code {
      font-size: 10px;
      text-align: right;
      margin-top: -10px;
    }

  </style>
</head>

<body>
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
  <div class="title">RISALAH RAPAT<br>
  TINJAUAN HASIL PENILAIAN<br>
  DAN KEPUTUSAN SERTIFIKASI</div>

  <div class="section">
    <div>
        <br>
      <span class="label">Nomor</span>: <?=$no_surat;?> &nbsp;&nbsp;&nbsp;&nbsp; Jakarta, tgl <?=$tgl;?> bln <?=$bulan;?> <?=$tahun;?>
    </div>
    <div>
      <span class="label">Lampiran</span>: 
      <ol class="indent">
        <li>Hasil Rapat Tinjauan Penilaian</li>
        <li>Hasil Rapat Keputusan Sertifikasi</li>
      </ol>
    </div>
  </div>

  <div class="section">
    <strong>Kepada :</strong><br>
    <strong>Ketua Pelaksana</strong><br>
    LSBU Gapeknas Infrastruktur<br>
    di – Jakarta
  </div>

  <div class="section">
    <strong>Perihal</strong>: Laporan Hasil Tinjauan Penilaian dan Keputusan Sertifikasi <?=$biodata[0]['Nama'];?>
  </div>

  <div class="section">
    Setelah melalui proses pembahasan dalam Rapat Tinjauan Hasil Penilaian dan Keputusan Sertifikasi yang kami selenggarakan pada:
    <br><br>
    Tanggal : <?=$tgl;?> <?=$bulan;?> <?=$tahun;?><br>
    Jam : <br>
    Tempat : Ruang Rapat LSBU GI
  </div>

  <div class="section">
    atas Dokumen Permohonan Sertifikasi <?=$biodata[0]['Nama'];?> maka bersama ini kami sampaikan Risalah Rapat yang telah dilaksanakan oleh Pemutus sesuai hasil rapat Tinjauan Hasil Penilaian dan Keputusan Sertifikasi pada Tanggal <?=$tgl;?> <?=$bulan;?> <?=$tahun;?> No. <?=$no_surat;?><br>
    Adapun hasil rapat tersebut sebagaimana terlampir.<br><br>
    Demikian mohon menjadikan periksa.
  </div>

  <div class="col-1-20">
      <table class="signature">
        <tr>
            <td colspan="2" class="section-label">Pemutus 1:</td>
            <td colspan="2" class="section-label">Pemutus 2:</td>
            <td colspan="2" class="section-label">Pemutus 3:</td>
            <td colspan="2" class="section-label">Peninjau:</td>
        </tr>
        <tr>
            <td colspan="2" class="section-label">
            <?php $nama=$this->Bu_model->get_user_nama_asesor($komite[0]['komite_1']);
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
              
            <img src="<?=$base64 ;?>" style="margin-top:10px;border: 1px; max-height: 190px; max-width: 120px; ">  
            <br>
            <?=$komite[0]['komite_1']?></td>

            
            <td colspan="2" class="section-label">
            <?php $nama=$this->Bu_model->get_user_nama_asesor($komite[0]['komite_2']);
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
              
            <img src="<?=$base64 ;?>" style="margin-top:10px;border: 1px; max-height: 190px; max-width: 120px; ">  
            <br>
            <?=$komite[0]['komite_2']?></td>
            
            <td colspan="2" class="section-label">
            <?php $nama=$this->Bu_model->get_user_nama_asesor($komite[0]['komite_3']);
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
              
            <img src="<?=$base64 ;?>" style="margin-top:10px;border: 1px; max-height: 190px; max-width: 120px; ">  
            <br>
            <?=$komite[0]['komite_3']?></td>


            <td colspan="2" class="section-label">
              <?php $nama=$this->Bu_model->get_user_nama_asesor($komite[0]['komite_1']);
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
            <img src="<?=$base64 ;?>" style="margin-top:10px;border: 1px; max-height: 190px; max-width: 120px; ">  
  
            <br><?=$komite[0]['komite_1']?></td>
        </tr>
        <tr>
            <td colspan="2" class="section-label"><br><br><br><br></td>
            <td colspan="2" class="section-label"><br><br><br><br></td>
        </tr>
        <tr>
            <td colspan="2" class="section-label">Kepala Urusan Sertifikasi</td>
            <td colspan="2" class="section-label">Koordinator Sertifikasi</td>
        </tr>
        <tr>
            <td colspan="2" class="section-label">
            <?php $path = base_url("assets/assets2/Josua.png");
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
            <br>Josua Nikolas</td>
            <td colspan="2" class="section-label"> <?php
                  // $path = base_url('assets/sertifikat/qrcodex/'.$qr_sps); sementara karena masalah server GCP
                  $path = base_url("assets/assets2/leo_2.png");
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
       <br>  Leonasi D Wiranta, SE</td>
        </tr>
      </table>
    </div>

  

</body>
</html>
