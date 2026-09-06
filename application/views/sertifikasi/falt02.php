<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Daftar Peralatan Badan Usaha</title>
    <style media="screen">
        body {
            font-family: 'Segoe UI','Microsoft Sans Serif',sans-serif;
        }

        .items {
            display: table;
            width: 100%;
            padding: 20px;
        }
         .kop_surat {
            font-size: 15px;
            margin-left: 30px;
            margin-top: 15px;
            text-align:left;
            float: left;
        }
.berita_acara_right {
            margin-right: 0px;
            margin-top: 0px;
            float: right;
        }
        div[class^="col-"] {
            display: table-cell;
            padding: 7px;
        }

        .row {
            display: table-row;
            page-break-inside: avoid;
        }

        .col-1-5-table {
            width: 5%;
            border: 1px solid black;
            text-align: center;
        }

        .col-1-10-table {
            width: 10%;
            border: 1px solid black;
            text-align: center;
        }

        .col-1-15-table {
            width: 15%;
            border: 1px solid black;
            text-align: center;
        }

        .col-1-20-table {
            width: 20%;
            border: 1px solid black;
        }
        
        .col-1-60-table {
            width: 60%;
            border: 1px solid black;
        }

        .col-1-30-table {
            width: 30%;
            border: 1px solid black;
        }

        .center {
            text-align: center;
        }

        .left {
            text-align: left;
            padding-left: 5px;
        }

        .footer {
            margin-top: 20px;
        }

        .footer-left {
            float: left;
            width: 70%;
            text-align: left;
        }

        .footer-right {
            float: right;
            width: 20%;
            text-align: center;
        }

        .small-text {
            font-size: 12px;
        }
    </style>
</head>
<body>
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
      HASIL CEK KELENGKAPAN, VERIFIKASI DAN VALIDASI KEMAMPUAN PENYEDIAAN PERALATAN KONSTRUKSI BADAN USAHA <br> (FALT 01)
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
			
							
								if(!empty($penilaian_falt02)){
									foreach($penilaian_falt02 as $row_ceklis){
	 							  $count+=1;
	 							  for ($i=0; $i < count($penilaian_falt02); $i++) {
	 							    if($row_ceklis['id']==$penilaian_falt02[$i]['id']){
	 							      ${"data_tercatat".$row_ceklis['id']}=$row_ceklis['tercatat'];
									  ${"data_pernyataan".$row_ceklis['id']}=$row_ceklis['pernyataan'];
	 							      ${"data_bukti".$row_ceklis['id']}=$row_ceklis['bukti'];
                      ${"data_rekomendasi".$row_ceklis['id']}=$row_ceklis['rekomendasi'];
	 							    }
	 							  }
	 							}
								}
							  ;?>	
    <section class="items">
        <!-- Header row with merged cells -->
        <div class="row">
            <div class="col-1-5-table"><div class="center">No</div></div>
            <div class="col-1-20-table"><div class="center">Jenis / Macam / Peralatan Utama *)</div></div>
            <div class="col-1-20-table"><div class="center">Lokasi sekarang (Kabupaten, Kota, Propinsi)</div></div>
            <div class="col-1-10-table"><div class="center">Tahun Pembuatan Pembelian</div></div>
            <div class="col-1-10-table"><div class="center">Kapasitas atau Output pada saat ini</div></div>
            <div class="col-1-20-table"><div class="center">Merk, Type, Nomor Seri peralatan</div></div>
            <div class="col-1-10-table"><div class="center">Keadaan (baik / rusak) atau di setarakan dengan (%)</div></div>
            <div class="col-1-10-table"><div class="center">Bukti kepemilikan sesuai Permen PUPR No. 8 Tahun 2022</div></div>
            <div class="col-1-10-table"><div class="center">Tercatat di SDPK</div></div>
            <div class="col-1-10-table"><div class="center">Pernyataan Badan Usaha</div></div>
            <div class="col-1-10-table"><div class="center">Bukti Surat perjanjian Sewa</div></div>
            <div class="col-1-10-table"><div class="center">Rekomendasi</div></div>
        </div>

        <!-- Column numbers row -->
        <div class="row">
            <div class="col-1-5-table"><div class="center">1</div></div>
            <div class="col-1-20-table"><div class="center">2</div></div>
            <div class="col-1-20-table"><div class="center">3</div></div>
            <div class="col-1-10-table"><div class="center">4</div></div>
            <div class="col-1-10-table"><div class="center">5</div></div>
            <div class="col-1-20-table"><div class="center">6</div></div>
            <div class="col-1-10-table"><div class="center">7</div></div>
            <div class="col-1-10-table"><div class="center">8</div></div>
            <div class="col-1-10-table"><div class="center">9</div></div>
            <div class="col-1-10-table"><div class="center">10</div></div>
            <div class="col-1-10-table"><div class="center">11</div></div>
            <div class="col-1-10-table"><div class="center">12</div></div>
        </div>
 <?php $count=1 ;?>
	 <?php foreach($peralatan as $row_peralatan) :?>
		<?php $id_peralatan=$row_peralatan['nomor_registrasi_peralatan'] ;?>
    
        <div class="row">
            <div class="col-1-5-table"><div class="center"><?=$count;?>)</div></div>
            <div class="col-1-20-table"><div class="left"><?=$row_peralatan['subvarian']?></div></div>
            <div class="col-1-20-table"><div class="left"><?=$row_peralatan['provinsi']?></div></div>
            <div class="col-1-10-table"><div class="left"><?=$row_peralatan['tahun']?></div></div>
            <div class="col-1-10-table"><div class="left"><?=$row_peralatan['kapasitas']?></div></div>
            <div class="col-1-10-table"><div class="left"></div><?=$row_peralatan['merek']?></div>
            <div class="col-1-20-table"><div class="left"><?=$row_peralatan['kapasitas_hasil_uji']?></div></div>
            <div class="col-1-10-table"><div class="left"><?=$row_peralatan['jenis_bukti_kepemilikan']?></div></div>
            <div class="col-1-10-table"><div class="left"><?=${'data_tercatat'.$id_peralatan};?></div></div>
            <div class="col-1-10-table"><div class="left"><?php if(${'data_pernyataan'.$id_peralatan}=='1'){echo "Milik";}else{echo "Sewa";}?></div></div>
            <div class="col-1-10-table"><div class="left"><?=${'data_bukti'.$id_peralatan};?></div></div>
                        <div class="col-1-10-table"><div class="left"><?php if(${'data_rekomendasi'.$id_peralatan}=='1'){echo "SESUAI";}else{echo"TIDAK SESUAI";};?></div></div>

        </div>
        <?php $count+=1 ;?>
        <?php endforeach ;?>

      
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
        <strong><?=$catatan_falt02[0]['catatan'];?></strong>
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
</body>
</html>