<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Result</title>
    <style media="screen">
        body {
            font-family: 'Segoe UI','Microsoft Sans Serif',sans-serif;
        }

        div.page_break + div.page_break{
            page-break-before: always;
        }
        header:before, header:after {
            content: " ";
            display: table;
        }
        .berita_acara_right {
            margin-right: 0px;
            margin-top: 0px;
            float: right;
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
          font-size: 25px;
          margin-left: -30px;
          margin-top: -15px;

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
        .left2 {
          text-align: left;
        }
        .right {
          text-align: right;
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
            color:#1C1C1C;

        }
        .itemsz {
            clear: both;
            display: table;
            padding-left: 200px;
            color:#1C1C1C;
            float: right;

        }
        .items2 {
            clear: both;
            display: table;
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

        }
        .col-1-40-table {
            width: 40%;
            border: 1px solid black;

        }
        .col-1-50-table {
            width: 50%;
            border: 1px solid black;

        }
        .col-1-80-table {
            width: 80%;
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
        .items2 {
            clear: both;
            display: table;
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
    <div class="row">

      <div class="col-1-10 ">
        <div class="logo">

          <?php


          $path = base_url('assets/media/logos/Logo_lsi.png');
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
            <img src="<?=$base64 ;?>" style="margin-top:-20px;margin-left:-30px;border: 1px; max-height: 100px;float: left">

        </div>
      </div>
      <div class="col-1-90 ">
        <div class="kop_surat">

          <div style="font-size: 17px;color:#000000" >
            Gedung Annex INKINDO<br>
            Jl. Bendungan Hilir No. 29, Jakarta Pusat 10210<br>
            Telp : 021 5738577<br>
            Email : lsi@lembagasertifikasiinkindo.net<br>
            Website : http://lembagasertifikasiinkindo.net/<br>
          </div>
        </div>
      </div>


    </div>


  </section>
  <br>
  <br>
  <br>
  <br>
  <hr>
  <div class="center">
    Rekomendasi Hasil Penilaian Kesesuaian Badan Usaha Jasa Konsultansi Konstruksi

  </div>
  <section class="items">

    <div class="row">
        <div class="col-1-10">
          1. Tgl Penilaian
        </div>
        <div class="col-1-10">
           Asesor 1 : <b><?= $data_penilaian[0]['tgl_penilaian'] ;?></b> /
           Asesor 2 : <b><?= $data_penilaian[1]['tgl_penilaian'] ;?></b>
        </div>

    </div>
      <div class="row">
          <div class="col-1-10">
            2. Nama Badan Usaha
          </div>
          <div class="col-1-10">
            : <b><?= $biodata[0]['nama'] ;?></b>
          </div>

      </div>
      <div class="row">
          <div class="col-1-10">
            3. Bentuk Usaha
          </div>
          <div class="col-1-10">
            : <b><?= $biodata[0]['bentuk_usaha'] ;?></b>
          </div>

      </div>
      <div class="row">
          <div class="col-1-10">
            4. Jenis Usaha
          </div>
          <div class="col-1-10">
            : <b><?php if($biodata[0]['klasifikasi_jenis_usaha']=='1'){
              echo "BUJKN";
            }elseif($biodata[0]['klasifikasi_jenis_usaha']=='2'){
              echo "BUJK PMA";
            }elseif($biodata[0]['klasifikasi_jenis_usaha']=='3'){
              echo "BUJK ASING";
            }   ;?></b>
          </div>

      </div>
      <div class="row">
          <div class="col-1-10">
            5. Provinsi
          </div>
          <div class="col-1-10">
            : <b><?= $biodata[0]['id_propinsi'] ;?></b>
          </div>

      </div>
      <div class="row">
          <div class="col-1-10">
            6. Asosiasi
          </div>
          <div class="col-1-10">
            : <b><?= $klasifikasi[0]['asosiasi'] ;?></b>
          </div>

      </div>
      <div class="row">
          <div class="col-1-10">
            7. Sub Klasifikasi
          </div>
          <div class="col-1-10">
            : <b><?php echo $tgl.' / '.$data_penilaian[0]['deskripsi_subklasifikasi'].' / '.$data_penilaian[0]['kualifikasi'] ;?></b>
          </div>

      </div>
      <div class="row">
          <div class="col-1-10">
            8. ID Izin
          </div>
          <div class="col-1-10">
          : <b><?= $klasifikasi[0]['id_izin'] ;?></b>
          </div>

      </div>
      <div class="row">
          <div class="col-1-10">
            9. Kualifikasi
          </div>
          <div class="col-1-10">
          : <b><?= $klasifikasi[0]['kualifikasi'] ;?></b>
          </div>

      </div>
      <div class="row">
          <div class="col-1-10">
            Sifat Usaha
          </div>
          <div class="col-1-10">
            : <b><?php if($klasifikasi[0]['sifat_badanusaha']=='2'){echo "Spesialis";}else{echo "Umum";}?></b>
          </div>

      </div>




  </section>


  <?php
    $count=0;
    if(!empty($neraca_asesor)){
      foreach($neraca_asesor as $row_keuangan){
      $count+=1;
      for ($i=0; $i < count($neraca_asesor); $i++) {
        if($row_keuangan['id']==$neraca_asesor[$i]['id']){
          ${"data_keuangan".$row_keuangan['id']}=$row_keuangan['checklist'];
          ${"data_keuangan_comment".$row_keuangan['id']}=$row_keuangan['comment'];
        }
      }
    }
    }
    ;?>
    <?php
      $count=0;
      if(!empty($pjtbu_asesor)){
        foreach($pjtbu_asesor as $row_pjtbu){
        $count+=1;
        for ($i=0; $i < count($pjtbu_asesor); $i++) {
          if($row_pjtbu['id']==$pjtbu_asesor[$i]['id']){
            ${"data_pjtbu".$row_pjtbu['id']}=$row_pjtbu['checklist'];
            ${"data_pjtbu_comment".$row_pjtbu['id']}=$row_pjtbu['comment'];
          }
        }
      }
      }
      ;?>
      <?php
        $count=0;
        if(!empty($pjskbu_asesor)){
          foreach($pjskbu_asesor as $row_pjskbu){
          $count+=1;
          for ($i=0; $i < count($pjskbu_asesor); $i++) {
            if($row_pjskbu['id']==$pjskbu_asesor[$i]['id'] AND $row_pjskbu['sub_klasifikasi']==$pjskbu_asesor[$i]['sub_klasifikasi']){
              ${"data_pjskbu".$row_pjskbu['id']."_".$row_pjskbu['sub_klasifikasi']}=$row_pjskbu['checklist'];
              ${"data_pjskbu_comment".$row_pjskbu['id']."_".$row_pjskbu['sub_klasifikasi']}=$row_pjskbu['comment'];

            }
          }
        }
        }
        ;?>
    <?php
      $count=0;
      if(!empty($ceklis)){
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
      }
      }
      ;?>
      <?php
        $count=0;
       foreach($biodata_penjualan as $row_penjualan){
        $count+=1;
        $id_clean2 = preg_replace('/[^\p{L}\p{N}\s]/u', '', $row_penjualan['id_pengalaman']);
        $id_clean=substr($id_clean2,0,4);
        for ($i=0; $i < count($biodata_penjualan); $i++) {
          if($row_penjualan['id']==$biodata_penjualan[$i]['id'] AND $row_penjualan['id_sub_klasifikasi']==$biodata_penjualan[$i]['id_sub_klasifikasi'] AND $row_penjualan['nomor_kontrak']==$biodata_penjualan[$i]['nomor_kontrak']){
            ${"data_penjualan_".$row_penjualan['id'].$id_clean}=$row_penjualan['checklist'];
            ${"comment_penjualan_".$row_penjualan['id'].$id_clean}=$row_penjualan['comment'];

          }
        }
      } ;?>
      <section class="items">
        <div class="row" >

            <div class="col-1-5-table" style="border-bottom: none;border-right: none;background-color:#BCBCBC;">
              <div class="center" >
              <b>1.</b>
              </div>
            </div>

            <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;background-color:#BCBCBC;">

                <b>Kemampuan Keuangan</b>


            </div>
            <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-right: none;background-color:#BCBCBC;">
            </div>
            <div class="col-1-15-table"style="border-bottom: none;border-right: none;background-color:#BCBCBC;">
              Checklist
            </div>
            <div class="col-1-15-table"style="border-bottom: none;background-color:#BCBCBC;">
              Catatan
            </div>

          </div>
          <?php if($klasifikasi[0]['sifat_badanusaha']=='2') :?>
          <div class="row">

            <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;">

            </div>

              <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                <section class="items2">

                <div class="row">
                  <div class="col-1-50">
                    b. Spesialis
                  </div>
                  <div class="col-1-50">

                  </div>
                </div>
              </section>


              </div>
              <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                <section class="items2">
                  <div class="row">
                    <div class="col-1-20">
                      1. Nilai Asset
                    </div>
                    <div class="col-1-20">
                       : Rp. <?= number_format(($neraca_asesor_nilai[0]['nilai_ekuitas']), 2, '.', ',');?>
                       <?php $jumlah_ekuitas=$neraca_asesor_nilai[0]['nilai_ekuitas'] ;?>
                    </div>

                  </div>
                </section>


              </div>
              <div class="col-1-15-table"style="border-bottom: none;border-right: none;border-top: none;">
                <i><b>
                  <?php if($data_keuangan2=='1'){
                    echo "OK";
                  }else{
                    echo "Tidak";
                  } ;?>

                </b></i>
              </div>
              <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                <?=$data_keuangan_comment2;?>
              </div>
            </div>
            <div class="row">

              <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

              </div>

                <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                  <section class="items2">

                  <div class="row">
                    <div class="col-1-50">

                    </div>
                    <div class="col-1-50">

                    </div>
                  </div>
                </section>


                </div>
                <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                  <section class="items2">
                    <div class="row">
                      <div class="col-1-20">
                        2. Neraca
                      </div>
                      <div class="col-1-20">

                      </div>

                    </div>
                  </section>


                </div>
                <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                  <i><b>
                    <?php if($data_keuangan3=='1'){
                      echo "OK";
                    }else{
                      echo "Tidak";
                    } ;?>

                  </b></i>
                </div>
                <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                  <?=$data_keuangan_comment3;?>
                </div>
              </div>
              <div class="row">

                <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                </div>

                  <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                    <section class="items2">

                    <div class="row">
                      <div class="col-1-50">

                      </div>
                      <div class="col-1-50">

                      </div>
                    </div>
                  </section>


                  </div>
                  <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                    <section class="items2">
                      <div class="row">
                        <div class="col-1-20">
                          3. Modal disetor
                        </div>
                        <div class="col-1-20">

                        </div>

                      </div>
                    </section>


                  </div>
                  <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                    <i><b>
                      <?php if($data_keuangan4=='1'){
                        echo "OK";
                      }else{
                        echo "Tidak";
                      } ;?>

                    </b></i>
                  </div>
                  <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                    <?=$data_keuangan_comment4;?>
                  </div>
                </div>
                <div class="row">

                  <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                  </div>

                    <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                      <section class="items2">

                      <div class="row">
                        <div class="col-1-50">

                        </div>
                        <div class="col-1-50">

                        </div>
                      </div>
                    </section>


                    </div>
                    <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                      <section class="items2">
                        <div class="row">
                          <div class="col-1-20">
                            4. KAP ( > 250 Jt)
                          </div>
                          <div class="col-1-20">

                          </div>

                        </div>
                      </section>


                    </div>
                    <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">

                    </div>
                    <div class="col-1-15-table"style="border-bottom: none;border-top: none;">

                    </div>
                  </div>
                  <div class="row">

                    <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                    </div>

                      <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                        <section class="items2">

                        <div class="row">
                          <div class="col-1-50">

                          </div>
                          <div class="col-1-50">

                          </div>
                        </div>
                      </section>


                      </div>
                      <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                        <section class="items2">
                          <div class="row">
                            <div class="col-1-20">

                            </div>
                            <div class="col-1-20">
                              a) Kelengkapan Laporan KAP
                            </div>

                          </div>
                        </section>


                      </div>
                      <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                        <i><b>
                          <?php if($data_keuangan5=='1'){
                            echo "OK";
                          }else{
                            echo "Tidak";
                          } ;?>

                        </b></i>
                      </div>
                      <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                        <?=$data_keuangan_comment5;?>
                      </div>
                    </div>
                  <div class="row">

                    <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                    </div>

                      <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                        <section class="items2">

                        <div class="row">
                          <div class="col-1-50">

                          </div>
                          <div class="col-1-50">

                          </div>
                        </div>
                      </section>


                      </div>
                      <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                        <section class="items2">
                          <div class="row">
                            <div class="col-1-20">

                            </div>
                            <div class="col-1-20">
                              b) KAP Terintegrasi KEMENKEU
                            </div>

                          </div>
                        </section>


                      </div>
                      <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                        <i><b>
                          <?php if($data_keuangan6=='1'){
                            echo "OK";
                          }else{
                            echo "Tidak";
                          } ;?>

                        </b></i>
                      </div>
                      <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                        <?=$data_keuangan_comment6;?>
                      </div>
                    </div>
                    <div class="row">

                      <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                      </div>

                        <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                          <section class="items2">

                          <div class="row">
                            <div class="col-1-50">

                            </div>
                            <div class="col-1-50">

                            </div>
                          </div>
                        </section>


                        </div>
                        <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                          <section class="items2">
                            <div class="row">
                              <div class="col-1-20">

                              </div>
                              <div class="col-1-20">
                                c) QR Code
                              </div>

                            </div>
                          </section>


                        </div>
                        <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                          <i><b>
                            <?php if($data_keuangan7=='1'){
                              echo "OK";
                            }else{
                              echo "Tidak";
                            } ;?>

                          </b></i>
                        </div>
                        <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                          <?=$data_keuangan_comment7;?>
                        </div>
                      </div>
                    <?php endif ;?>
                    <?php if($klasifikasi[0]['sifat_badanusaha']=='1') :?>
                    <div class="row">

                      <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;">

                      </div>

                        <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                          <section class="items2">

                          <div class="row">
                            <div class="col-1-50">
                              a. Umum
                            </div>
                            <div class="col-1-50">

                            </div>
                          </div>
                        </section>


                        </div>
                        <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                          <section class="items2">
                            <div class="row">
                              <div class="col-1-20">
                                1. Nilai Ekuitas (Umum)
                              </div>
                              <div class="col-1-20">
                                 : Rp. <?= number_format(($neraca_asesor_nilai[0]['nilai_ekuitas']), 2, '.', ',');?>
                                 <?php $jumlah_ekuitas=$neraca_asesor_nilai[0]['nilai_ekuitas'] ;?>
                              </div>

                            </div>
                          </section>


                        </div>
                        <div class="col-1-15-table"style="border-bottom: none;border-right: none;border-top: none;">
                          <i><b>
                            <?php if($data_keuangan1=='1'){
                              echo "OK";
                            }else{
                              echo "Tidak";
                            } ;?>

                          </b></i>
                        </div>
                        <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                          <?=$data_keuangan_comment1;?>
                        </div>
                      </div>
                      <div class="row">

                        <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                        </div>

                          <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                            <section class="items2">

                            <div class="row">
                              <div class="col-1-50">

                              </div>
                              <div class="col-1-50">

                              </div>
                            </div>
                          </section>


                          </div>
                          <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                            <section class="items2">
                              <div class="row">
                                <div class="col-1-20">
                                  2. Neraca
                                </div>
                                <div class="col-1-20">

                                </div>

                              </div>
                            </section>


                          </div>
                          <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                            <i><b>
                              <?php if($data_keuangan3=='1'){
                                echo "OK";
                              }else{
                                echo "Tidak";
                              } ;?>

                            </b></i>
                          </div>
                          <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                            <?=$data_keuangan_comment3;?>
                          </div>
                        </div>
                        <div class="row">

                          <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                          </div>

                            <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                              <section class="items2">

                              <div class="row">
                                <div class="col-1-50">

                                </div>
                                <div class="col-1-50">

                                </div>
                              </div>
                            </section>


                            </div>
                            <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                              <section class="items2">
                                <div class="row">
                                  <div class="col-1-20">
                                    3. Modal disetor
                                  </div>
                                  <div class="col-1-20">

                                  </div>

                                </div>
                              </section>


                            </div>
                            <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                              <i><b>
                                <?php if($data_keuangan4=='1'){
                                  echo "OK";
                                }else{
                                  echo "Tidak";
                                } ;?>

                              </b></i>
                            </div>
                            <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                              <?=$data_keuangan_comment4;?>
                            </div>
                          </div>
                          <div class="row">

                            <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                            </div>

                              <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                <section class="items2">

                                <div class="row">
                                  <div class="col-1-50">

                                  </div>
                                  <div class="col-1-50">

                                  </div>
                                </div>
                              </section>


                              </div>
                              <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                <section class="items2">
                                  <div class="row">
                                    <div class="col-1-20">
                                      4. KAP (M & B)
                                    </div>
                                    <div class="col-1-20">

                                    </div>

                                  </div>
                                </section>


                              </div>
                              <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">

                              </div>
                              <div class="col-1-15-table"style="border-bottom: none;border-top: none;">

                              </div>
                            </div>
                            <div class="row">

                              <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                              </div>

                                <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                  <section class="items2">

                                  <div class="row">
                                    <div class="col-1-50">

                                    </div>
                                    <div class="col-1-50">

                                    </div>
                                  </div>
                                </section>


                                </div>
                                <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                  <section class="items2">
                                    <div class="row">
                                      <div class="col-1-20">

                                      </div>
                                      <div class="col-1-20">
                                        a) Kelengkapan Laporan KAP
                                      </div>

                                    </div>
                                  </section>


                                </div>
                                <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                  <i><b>
                                    <?php if($data_keuangan5=='1'){
                                      echo "OK";
                                    }else{
                                      echo "Tidak";
                                    } ;?>

                                  </b></i>
                                </div>
                                <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                  <?=$data_keuangan_comment5;?>
                                </div>
                              </div>
                            <div class="row">

                              <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                              </div>

                                <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                  <section class="items2">

                                  <div class="row">
                                    <div class="col-1-50">

                                    </div>
                                    <div class="col-1-50">

                                    </div>
                                  </div>
                                </section>


                                </div>
                                <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                  <section class="items2">
                                    <div class="row">
                                      <div class="col-1-20">

                                      </div>
                                      <div class="col-1-20">
                                        b) KAP Terintegrasi KEMENKEU
                                      </div>

                                    </div>
                                  </section>


                                </div>
                                <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                  <i><b>
                                    <?php if($data_keuangan6=='1'){
                                      echo "OK";
                                    }else{
                                      echo "Tidak";
                                    } ;?>

                                  </b></i>
                                </div>
                                <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                  <?=$data_keuangan_comment6;?>
                                </div>
                              </div>
                              <div class="row">

                                <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                </div>

                                  <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                    <section class="items2">

                                    <div class="row">
                                      <div class="col-1-50">

                                      </div>
                                      <div class="col-1-50">

                                      </div>
                                    </div>
                                  </section>


                                  </div>
                                  <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                    <section class="items2">
                                      <div class="row">
                                        <div class="col-1-20">

                                        </div>
                                        <div class="col-1-20">
                                          c) QR Code
                                        </div>

                                      </div>
                                    </section>


                                  </div>
                                  <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                    <i><b>
                                      <?php if($data_keuangan7=='1'){
                                        echo "OK";
                                      }else{
                                        echo "Tidak";
                                      } ;?>

                                    </b></i>
                                  </div>
                                  <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                    <?=$data_keuangan_comment7;?>
                                  </div>
                                </div>
                              <?php endif ;?>
                              <div class="row">

                                <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                </div>

                                  <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                    <section class="items2">

                                    <div class="row">
                                      <div class="col-1-50">

                                      </div>
                                      <div class="col-1-50">

                                      </div>
                                    </div>
                                  </section>


                                  </div>
                                  <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                    <section class="items2">
                                      <div class="row">
                                        <div class="col-1-20">
                                          <b>SUB PENILAIAN</b>
                                        </div>
                                        <div class="col-1-20">

                                        </div>

                                      </div>
                                    </section>


                                  </div>
                                  <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                    <i><b>
                                      <?php if($neraca_asesor[0]['checklist_resume']=='1'){
                                        echo "SESUAI";
                                      }else{
                                        echo "TIDAK SESUAI";
                                      } ;?>

                                    </b></i>
                                  </div>
                                  <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                    <?=$neraca_asesor[0]['comment_resume'];?>
                                  </div>
                                </div>
                                <div class="row" >

                                    <div class="col-1-5-table" style="border-bottom: none;border-right: none;background-color:#BCBCBC;">
                                      <div class="center" >
                                      <b>2.</b>
                                      </div>
                                    </div>

                                    <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-right: none;border-left: none;background-color:#BCBCBC;">

                                        <b>Ketersediaan Tenaga Kerja</b>


                                    </div>
                                    <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-right: none;background-color:#BCBCBC;">
                                    </div>
                                    <div class="col-1-10-table"style="border-bottom: none;border-right: none;background-color:#BCBCBC;">
                                      Checklist
                                    </div>
                                    <div class="col-1-30-table"style="border-bottom: none;background-color:#BCBCBC;">
                                      Catatan
                                    </div>

                                  </div>
                                  <div class="row">

                                    <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                    </div>

                                      <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                        <section class="items2">

                                        <div class="row">
                                          <div class="col-1-50">
                                            a.
                                          </div>
                                          <div class="col-1-50">
                                            PJBU
                                          </div>
                                        </div>
                                      </section>


                                      </div>
                                      <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                        <section class="items2">
                                          <div class="row">
                                            <div class="col-1-20">
                                              1. Nama
                                            </div>
                                            <div class="col-1-20">
                                                : <?=$pjbu[0]['nama'];?>
                                            </div>

                                          </div>
                                        </section>


                                      </div>
                                      <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                        <i><b>
                                          <?php if($pjbu_asesor[0]['checklist']=='1'){
                                            echo "OK";
                                          }else{
                                            echo "Tidak";
                                          } ;?>

                                        </b></i>
                                      </div>
                                      <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                        <?=$pjbu_asesor[0]['comment'];?>
                                      </div>
                                    </div>
                                    <div class="row">

                                      <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                      </div>

                                        <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                          <section class="items2">

                                          <div class="row">
                                            <div class="col-1-50">

                                            </div>
                                            <div class="col-1-50">

                                            </div>
                                          </div>
                                        </section>


                                        </div>
                                        <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                          <section class="items2">
                                            <div class="row">
                                              <div class="col-1-20">
                                                2. NIK
                                              </div>
                                              <div class="col-1-20">
                                                  : <?=$pjbu[0]['nik'];?>
                                              </div>

                                            </div>
                                          </section>


                                        </div>
                                        <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                          <i><b>
                                            <?php if($pjbu_asesor[1]['checklist']=='1'){
                                              echo "OK";
                                            }else{
                                              echo "Tidak";
                                            } ;?>

                                          </b></i>
                                        </div>
                                        <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                          <?=$pjbu_asesor[1]['comment'];?>
                                        </div>
                                      </div>
                                      <div class="row">

                                        <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                        </div>

                                          <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                            <section class="items2">

                                            <div class="row">
                                              <div class="col-1-50">

                                              </div>
                                              <div class="col-1-50">

                                              </div>
                                            </div>
                                          </section>


                                          </div>
                                          <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                            <section class="items2">
                                              <div class="row">
                                                <div class="col-1-20">
                                                  3. NPWP
                                                </div>
                                                <div class="col-1-20">
                                                    : <?=$pjbu[0]['npwp'];?>
                                                </div>

                                              </div>
                                            </section>


                                          </div>
                                          <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                            <i><b>
                                              <?php if($pjbu_asesor[2]['checklist']=='1'){
                                                echo "OK";
                                              }else{
                                                echo "Tidak";
                                              } ;?>

                                            </b></i>
                                          </div>
                                          <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                              <?=$pjbu_asesor[2]['comment'];?>
                                          </div>
                                        </div>
                                        <div class="row">

                                          <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                          </div>

                                            <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                              <section class="items2">

                                              <div class="row">
                                                <div class="col-1-50">

                                                </div>
                                                <div class="col-1-50">

                                                </div>
                                              </div>
                                            </section>


                                            </div>
                                            <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                              <section class="items2">
                                                <div class="row">
                                                  <div class="col-1-20">
                                                    <b>SUB PENILAIAN PJBU</b>
                                                  </div>
                                                  <div class="col-1-20">

                                                  </div>

                                                </div>
                                              </section>


                                            </div>
                                            <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                              <i><b>
                                                <?php if($pjbu_asesor[0]['checklist_resume']=="1"){
                                                  echo "SESUAI";
                                                }else{
                                                  echo "TIDAK SESUAI";
                                                } ;?>

                                              </b></i>
                                            </div>
                                            <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                <?=$pjbu_asesor[0]['comment_resume'];?>
                                            </div>
                                          </div>
                                        <div class="row">

                                          <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                          </div>

                                            <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                              <section class="items2">

                                              <div class="row">
                                                <div class="col-1-50">
                                                  b.
                                                </div>
                                                <div class="col-1-50">
                                                  PJTBU
                                                </div>
                                              </div>
                                            </section>


                                            </div>
                                            <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                              <section class="items2">
                                                <div class="row">
                                                  <div class="col-1-20">
                                                    1. Nama
                                                  </div>
                                                  <div class="col-1-20">
                                                      : <?=$pjtbu[0]['nama'];?>
                                                  </div>

                                                </div>
                                              </section>


                                            </div>
                                            <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                              <i><b>
                                                <?php if($data_pjtbu4=='1'){
                                                  echo "OK";
                                                }else{
                                                  echo "Tidak";
                                                } ;?>

                                              </b></i>
                                            </div>
                                            <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                              <?=$data_pjtbu_comment4;?>
                                            </div>
                                          </div>
                                          <div class="row">

                                            <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                            </div>

                                              <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                <section class="items2">

                                                <div class="row">
                                                  <div class="col-1-50">

                                                  </div>
                                                  <div class="col-1-50">

                                                  </div>
                                                </div>
                                              </section>


                                              </div>
                                              <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                <section class="items2">
                                                  <div class="row">
                                                    <div class="col-1-20">
                                                      2. NIK
                                                    </div>
                                                    <div class="col-1-20">
                                                        : <?=$pjtbu[0]['nik'];?>
                                                    </div>

                                                  </div>
                                                </section>


                                              </div>
                                              <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                                <i><b>
                                                  <?php if($data_pjtbu5=='1'){
                                                    echo "OK";
                                                  }else{
                                                    echo "Tidak";
                                                  } ;?>

                                                </b></i>
                                              </div>
                                              <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                <?=$data_pjtbu_comment5;?>
                                              </div>
                                            </div>
                                            <div class="row">

                                              <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                              </div>

                                                <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                  <section class="items2">

                                                  <div class="row">
                                                    <div class="col-1-50">

                                                    </div>
                                                    <div class="col-1-50">

                                                    </div>
                                                  </div>
                                                </section>


                                                </div>
                                                <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                  <section class="items2">
                                                    <div class="row">
                                                      <div class="col-1-20">
                                                        3. No. Registrasi SKK
                                                      </div>
                                                      <div class="col-1-20">
                                                          : <?=$pjtbu[0]['noreg_skk'];?>
                                                      </div>

                                                    </div>
                                                  </section>


                                                </div>
                                                <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                                  <i><b>
                                                    <?php if($data_pjtbu6=='1'){
                                                      echo "OK";
                                                    }else{
                                                      echo "Tidak";
                                                    } ;?>

                                                  </b></i>
                                                </div>
                                                <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                  <?=$data_pjtbu_comment6;?>
                                                </div>
                                              </div>
                                              <div class="row">

                                                <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                                </div>

                                                  <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                    <section class="items2">

                                                    <div class="row">
                                                      <div class="col-1-50">

                                                      </div>
                                                      <div class="col-1-50">

                                                      </div>
                                                    </div>
                                                  </section>


                                                  </div>
                                                  <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                    <section class="items2">
                                                      <div class="row">
                                                        <div class="col-1-20">
                                                          4. Jenjang
                                                        </div>
                                                        <div class="col-1-20">
                                                            : <?=$pjtbu[0]['jenjang_skk'];?>
                                                        </div>

                                                      </div>
                                                    </section>


                                                  </div>
                                                  <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                                    <i><b>
                                                      <?php if($data_pjtbu1=='1'){
                                                        echo "OK";
                                                      }else{
                                                        echo "Tidak";
                                                      } ;?>

                                                    </b></i>
                                                  </div>
                                                  <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                    <?=$data_pjtbu_comment1;?>
                                                  </div>
                                                </div>
                                                <div class="row">

                                                  <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                                  </div>

                                                    <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                      <section class="items2">

                                                      <div class="row">
                                                        <div class="col-1-50">

                                                        </div>
                                                        <div class="col-1-50">

                                                        </div>
                                                      </div>
                                                    </section>


                                                    </div>
                                                    <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                      <section class="items2">
                                                        <div class="row">
                                                          <div class="col-1-20">
                                                            5. Klasifikasi SKK
                                                          </div>
                                                          <div class="col-1-20">
                                                              : <?=$pjtbu_asesor[0]['klasifikasi_skk'];?>
                                                          </div>

                                                        </div>
                                                      </section>


                                                    </div>
                                                    <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                                      <i><b>
                                                        <?php if($data_pjtbu3=='1'){
                                                          echo "OK";
                                                        }else{
                                                          echo "Tidak";
                                                        } ;?>

                                                      </b></i>
                                                    </div>
                                                    <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                      <?=$data_pjtbu_comment3;?>
                                                    </div>
                                                  </div>
                                                  <div class="row">

                                                    <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                                    </div>

                                                      <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                        <section class="items2">

                                                        <div class="row">
                                                          <div class="col-1-50">

                                                          </div>
                                                          <div class="col-1-50">

                                                          </div>
                                                        </div>
                                                      </section>


                                                      </div>
                                                      <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                        <section class="items2">
                                                          <div class="row">
                                                            <div class="col-1-20">
                                                              6. Sub Klasifikasi SKK
                                                            </div>
                                                            <div class="col-1-20">
                                                                : <?=$pjtbu_asesor[0]['sub_klasifikasi_skk'];?>
                                                            </div>

                                                          </div>
                                                        </section>


                                                      </div>
                                                      <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                                        <i><b>
                                                          <?php if($data_pjtbu2=='1'){
                                                            echo "OK";
                                                          }else{
                                                            echo "Tidak";
                                                          } ;?>

                                                        </b></i>
                                                      </div>
                                                      <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                        <?=$data_pjtbu_comment2;?>
                                                      </div>
                                                    </div>
                                                    <div class="row">

                                                      <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                                      </div>

                                                        <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                          <section class="items2">

                                                          <div class="row">
                                                            <div class="col-1-50">

                                                            </div>
                                                            <div class="col-1-50">

                                                            </div>
                                                          </div>
                                                        </section>


                                                        </div>
                                                        <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                          <section class="items2">
                                                            <div class="row">
                                                              <div class="col-1-20">
                                                                7. Tangga Terbit SKK
                                                              </div>
                                                              <div class="col-1-20">
                                                                  : <?=$pjtbu[0]['tanggal_terbit_skk'];?>
                                                              </div>

                                                            </div>
                                                          </section>


                                                        </div>
                                                        <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                                          <i><b>
                                                            <?php if($data_pjtbu7=='1'){
                                                              echo "OK";
                                                            }else{
                                                              echo "Tidak";
                                                            } ;?>

                                                          </b></i>
                                                        </div>
                                                        <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                          <?=$data_pjtbu_comment7;?>
                                                        </div>
                                                      </div>
                                                      <div class="row">

                                                        <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                                        </div>

                                                          <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                            <section class="items2">

                                                            <div class="row">
                                                              <div class="col-1-50">

                                                              </div>
                                                              <div class="col-1-50">

                                                              </div>
                                                            </div>
                                                          </section>


                                                          </div>
                                                          <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                            <section class="items2">
                                                              <div class="row">
                                                                <div class="col-1-20">
                                                                  8. Noreg SKK
                                                                </div>
                                                                <div class="col-1-20">
                                                                    : <?=$pjtbu[0]['noreg_skk'];?>
                                                                </div>

                                                              </div>
                                                            </section>


                                                          </div>
                                                          <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                                            <i><b>
                                                              <?php if($data_pjtbu6=='1'){
                                                                echo "OK";
                                                              }else{
                                                                echo "Tidak";
                                                              } ;?>

                                                            </b></i>
                                                          </div>
                                                          <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                            <?=$data_pjtbu_comment6;?>
                                                          </div>
                                                        </div>
                                                        <div class="row">

                                                          <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                                          </div>

                                                            <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                              <section class="items2">

                                                              <div class="row">
                                                                <div class="col-1-50">

                                                                </div>
                                                                <div class="col-1-50">

                                                                </div>
                                                              </div>
                                                            </section>


                                                            </div>
                                                            <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                              <section class="items2">
                                                                <div class="row">
                                                                  <div class="col-1-20">
                                                                    9. Klasifikasi ACPE AA
                                                                  </div>
                                                                  <div class="col-1-20">
                                                                      : <?=$pjtbu[0]['klasifikasi_acpe_aa'];?>
                                                                  </div>

                                                                </div>
                                                              </section>


                                                            </div>
                                                            <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                                              <i><b>
                                                                <?php if($data_pjtbu9=='1'){
                                                                  echo "OK";
                                                                }else{
                                                                  echo "Tidak";
                                                                } ;?>

                                                              </b></i>
                                                            </div>
                                                            <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                              <?=$data_pjtbu_comment9;?>
                                                            </div>
                                                          </div>
                                                          <div class="row">

                                                            <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                                            </div>

                                                              <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                <section class="items2">

                                                                <div class="row">
                                                                  <div class="col-1-50">

                                                                  </div>
                                                                  <div class="col-1-50">

                                                                  </div>
                                                                </div>
                                                              </section>


                                                              </div>
                                                              <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                <section class="items2">
                                                                  <div class="row">
                                                                    <div class="col-1-20">
                                                                      10. Noreg ACPE AA
                                                                    </div>
                                                                    <div class="col-1-20">
                                                                        : <?=$pjtbu[0]['nomor_registrasi_acpe_aa'];?>
                                                                    </div>

                                                                  </div>
                                                                </section>


                                                              </div>
                                                              <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                                                <i><b>
                                                                  <?php if($data_pjtbu10=='1'){
                                                                    echo "OK";
                                                                  }else{
                                                                    echo "Tidak";
                                                                  } ;?>

                                                                </b></i>
                                                              </div>
                                                              <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                                <?=$data_pjtbu_comment10;?>
                                                              </div>
                                                            </div>
                                                            <div class="row">

                                                              <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                                              </div>

                                                                <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                  <section class="items2">

                                                                  <div class="row">
                                                                    <div class="col-1-50">

                                                                    </div>
                                                                    <div class="col-1-50">

                                                                    </div>
                                                                  </div>
                                                                </section>


                                                                </div>
                                                                <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                  <section class="items2">
                                                                    <div class="row">
                                                                      <div class="col-1-20">
                                                                        11. File SKK
                                                                      </div>
                                                                      <div class="col-1-20">

                                                                      </div>

                                                                    </div>
                                                                  </section>


                                                                </div>
                                                                <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                                                  <i><b>
                                                                    <?php if($data_pjtbu11=='1'){
                                                                      echo "OK";
                                                                    }else{
                                                                      echo "Tidak";
                                                                    } ;?>

                                                                  </b></i>
                                                                </div>
                                                                <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                                  <?=$data_pjtbu_comment11;?>
                                                                </div>
                                                              </div>
                                                              <div class="row">

                                                                <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                                                </div>

                                                                  <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                    <section class="items2">

                                                                    <div class="row">
                                                                      <div class="col-1-50">

                                                                      </div>
                                                                      <div class="col-1-50">

                                                                      </div>
                                                                    </div>
                                                                  </section>


                                                                  </div>
                                                                  <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                    <section class="items2">
                                                                      <div class="row">
                                                                        <div class="col-1-20">
                                                                          12. File SPT
                                                                        </div>
                                                                        <div class="col-1-20">

                                                                        </div>

                                                                      </div>
                                                                    </section>


                                                                  </div>
                                                                  <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                                                    <i><b>
                                                                      <?php if($data_pjtbu13=='1'){
                                                                        echo "OK";
                                                                      }else{
                                                                        echo "Tidak";
                                                                      } ;?>

                                                                    </b></i>
                                                                  </div>
                                                                  <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                                    <?=$data_pjtbu_comment13;?>
                                                                  </div>
                                                                </div>
                                                                <div class="row">

                                                                  <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                                                  </div>

                                                                    <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                      <section class="items2">

                                                                      <div class="row">
                                                                        <div class="col-1-50">

                                                                        </div>
                                                                        <div class="col-1-50">

                                                                        </div>
                                                                      </div>
                                                                    </section>


                                                                    </div>
                                                                    <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                      <section class="items2">
                                                                        <div class="row">
                                                                          <div class="col-1-20">
                                                                            13. File Ijazah
                                                                          </div>
                                                                          <div class="col-1-20">

                                                                          </div>

                                                                        </div>
                                                                      </section>


                                                                    </div>
                                                                    <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                                                      <i><b>
                                                                        <?php if($data_pjtbu12=='1'){
                                                                          echo "OK";
                                                                        }else{
                                                                          echo "Tidak";
                                                                        } ;?>

                                                                      </b></i>
                                                                    </div>
                                                                    <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                                      <?=$data_pjtbu_comment12;?>
                                                                    </div>
                                                                  </div>
                                                                  <div class="row">

                                                                    <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                                                    </div>

                                                                      <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                        <section class="items2">

                                                                        <div class="row">
                                                                          <div class="col-1-50">

                                                                          </div>
                                                                          <div class="col-1-50">

                                                                          </div>
                                                                        </div>
                                                                      </section>


                                                                      </div>
                                                                      <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                        <section class="items2">
                                                                          <div class="row">
                                                                            <div class="col-1-20">
                                                                              14. Nama Sekolah
                                                                            </div>
                                                                            <div class="col-1-20">

                                                                            </div>

                                                                          </div>
                                                                        </section>


                                                                      </div>
                                                                      <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                                                        <i><b>
                                                                          <?php if($data_pjtbu14=='1'){
                                                                            echo "OK";
                                                                          }else{
                                                                            echo "Tidak";
                                                                          } ;?>

                                                                        </b></i>
                                                                      </div>
                                                                      <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                                        <?=$data_pjtbu_comment14;?>
                                                                      </div>
                                                                    </div>
                                                                    <div class="row">

                                                                      <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                                                      </div>

                                                                        <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                          <section class="items2">

                                                                          <div class="row">
                                                                            <div class="col-1-50">

                                                                            </div>
                                                                            <div class="col-1-50">

                                                                            </div>
                                                                          </div>
                                                                        </section>


                                                                        </div>
                                                                        <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                          <section class="items2">
                                                                            <div class="row">
                                                                              <div class="col-1-20">
                                                                                15. Nomor Ijazah
                                                                              </div>
                                                                              <div class="col-1-20">

                                                                              </div>

                                                                            </div>
                                                                          </section>


                                                                        </div>
                                                                        <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                                                          <i><b>
                                                                            <?php if($data_pjtbu15=='1'){
                                                                              echo "OK";
                                                                            }else{
                                                                              echo "Tidak";
                                                                            } ;?>

                                                                          </b></i>
                                                                        </div>
                                                                        <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                                          <?=$data_pjtbu_comment15;?>
                                                                        </div>
                                                                      </div>
                                                                      <div class="row">

                                                                        <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                                                        </div>

                                                                          <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                            <section class="items2">

                                                                            <div class="row">
                                                                              <div class="col-1-50">

                                                                              </div>
                                                                              <div class="col-1-50">

                                                                              </div>
                                                                            </div>
                                                                          </section>


                                                                          </div>
                                                                          <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                            <section class="items2">
                                                                              <div class="row">
                                                                                <div class="col-1-20">
                                                                                  16. Jenjang Pendidikan
                                                                                </div>
                                                                                <div class="col-1-20">

                                                                                </div>

                                                                              </div>
                                                                            </section>


                                                                          </div>
                                                                          <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                                                            <i><b>
                                                                              <?php if($data_pjtbu16=='1'){
                                                                                echo "OK";
                                                                              }else{
                                                                                echo "Tidak";
                                                                              } ;?>

                                                                            </b></i>
                                                                          </div>
                                                                          <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                                            <?=$data_pjtbu_comment16;?>
                                                                          </div>
                                                                        </div>
                                                      <div class="row">

                                                        <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                                        </div>

                                                          <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                            <section class="items2">

                                                            <div class="row">
                                                              <div class="col-1-50">

                                                              </div>
                                                              <div class="col-1-50">

                                                              </div>
                                                            </div>
                                                          </section>


                                                          </div>
                                                          <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                            <section class="items2">
                                                              <div class="row">
                                                                <div class="col-1-20">
                                                                  <b>SUB PENILAIAN PJTBU</b>
                                                                </div>
                                                                <div class="col-1-20">

                                                                </div>

                                                              </div>
                                                            </section>


                                                          </div>
                                                          <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                                            <i><b>
                                                              <?php if($pjtbu_asesor[0]['checklist_resume']=="1"){
                                                                echo "SESUAI";
                                                              }else{
                                                                echo "TIDAK SESUAI";
                                                              } ;?>

                                                            </b></i>
                                                          </div>
                                                          <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                              <?=$pjtbu_asesor[0]['comment_resume'];?>
                                                          </div>
                                                        </div>
                                                      <?php $v=0; ?>
                                                      <?php if(!empty($pjskbu)) :?>
                                                        <?php foreach($pjskbu as $row_pjsk) :?>
                                                          <?php $v+=1; ?>
                                                          <div class="row">

                                                            <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                                            </div>

                                                              <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                <section class="items2">

                                                                <div class="row">
                                                                  <div class="col-1-50">
                                                                    <?php if($v==1) :?><b> c.</b><?php endif;?>
                                                                  </div>
                                                                  <div class="col-1-50">
                                                                    <?php if($v==1) :?>  <b> PJSKBU</b><?php endif;?>
                                                                  </div>
                                                                </div>
                                                              </section>


                                                              </div>
                                                              <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                <section class="items2">
                                                                  <div class="row">
                                                                    <div class="col-1-20">
                                                                      1. Nama
                                                                    </div>
                                                                    <div class="col-1-20">
                                                                        : <?=$row_pjsk['nama'];?>
                                                                    </div>

                                                                  </div>
                                                                </section>


                                                              </div>
                                                              <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                                                <i><b>
                                                                  <?php if(${"data_pjskbu4_".$row_pjsk['id_sub_klasifikasi_pjsk']}=='1'){
                                                                    echo "OK";
                                                                  }else{
                                                                    echo "Tidak";
                                                                  } ;?>

                                                                </b></i>
                                                              </div>
                                                              <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                                <?=${"data_pjskbu_comment4_".$row_pjsk['id_sub_klasifikasi_pjsk']};?>
                                                              </div>
                                                            </div>
                                                            <div class="row">

                                                              <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                                              </div>

                                                                <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                  <section class="items2">

                                                                  <div class="row">
                                                                    <div class="col-1-50">
                                                                    </div>
                                                                    <div class="col-1-50">
                                                                    </div>
                                                                  </div>
                                                                </section>


                                                                </div>
                                                                <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                  <section class="items2">
                                                                    <div class="row">
                                                                      <div class="col-1-20">
                                                                        2. NIK
                                                                      </div>
                                                                      <div class="col-1-20">
                                                                          : <?=$row_pjsk['nik'];?>
                                                                      </div>

                                                                    </div>
                                                                  </section>


                                                                </div>
                                                                <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                                                  <i><b>
                                                                    <?php if(${"data_pjskbu6_".$row_pjsk['id_sub_klasifikasi_pjsk']}=='1'){
                                                                      echo "OK";
                                                                    }else{
                                                                      echo "Tidak";
                                                                    } ;?>

                                                                  </b></i>
                                                                </div>
                                                                <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                                  <?=${"data_pjskbu_comment6_".$row_pjsk['id_sub_klasifikasi_pjsk']};?>
                                                                </div>
                                                              </div>
                                                              <div class="row">

                                                                <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                                                </div>

                                                                  <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                    <section class="items2">

                                                                    <div class="row">
                                                                      <div class="col-1-50">
                                                                      </div>
                                                                      <div class="col-1-50">
                                                                      </div>
                                                                    </div>
                                                                  </section>


                                                                  </div>
                                                                  <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                    <section class="items2">
                                                                      <div class="row">
                                                                        <div class="col-1-20">
                                                                          3. No. Registrasi SKK
                                                                        </div>
                                                                        <div class="col-1-20">
                                                                            : <?=$row_pjsk['noreg_skk'];?>
                                                                        </div>

                                                                      </div>
                                                                    </section>


                                                                  </div>
                                                                  <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                                                    <i><b>
                                                                      <?php if(${"data_pjskbu7_".$row_pjsk['id_sub_klasifikasi_pjsk']}=='1'){
                                                                        echo "OK";
                                                                      }else{
                                                                        echo "Tidak";
                                                                      } ;?>

                                                                    </b></i>
                                                                  </div>
                                                                  <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                                    <?=${"data_pjskbu_comment7_".$row_pjsk['id_sub_klasifikasi_pjsk']};?>
                                                                  </div>
                                                                </div>
                                                                <div class="row">

                                                                  <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                                                  </div>

                                                                    <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                      <section class="items2">

                                                                      <div class="row">
                                                                        <div class="col-1-50">
                                                                        </div>
                                                                        <div class="col-1-50">
                                                                        </div>
                                                                      </div>
                                                                    </section>


                                                                    </div>
                                                                    <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                      <section class="items2">
                                                                        <div class="row">
                                                                          <div class="col-1-20">
                                                                            4. Jenjang
                                                                          </div>
                                                                          <div class="col-1-20">
                                                                              : <?=$row_pjsk['jenjang_skk'];?>
                                                                          </div>

                                                                        </div>
                                                                      </section>


                                                                    </div>
                                                                    <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                                                      <i><b>
                                                                        <?php if(${"data_pjskbu1_".$row_pjsk['id_sub_klasifikasi_pjsk']}=='1'){
                                                                          echo "OK";
                                                                        }else{
                                                                          echo "Tidak";
                                                                        } ;?>

                                                                      </b></i>
                                                                    </div>
                                                                    <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                                      <?=${"data_pjskbu_comment1_".$row_pjsk['id_sub_klasifikasi_pjsk']};?>
                                                                    </div>
                                                                  </div>
                                                                  <div class="row">

                                                                    <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                                                    </div>

                                                                      <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                        <section class="items2">

                                                                        <div class="row">
                                                                          <div class="col-1-50">
                                                                          </div>
                                                                          <div class="col-1-50">
                                                                          </div>
                                                                        </div>
                                                                      </section>


                                                                      </div>
                                                                      <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                        <section class="items2">
                                                                          <div class="row">
                                                                            <div class="col-1-20">
                                                                              5. Klasifikasi SKK
                                                                            </div>
                                                                            <div class="col-1-20">
                                                                                : <?=$pjskbu_asesor[0]['klasifikasi_skk'];?>
                                                                            </div>

                                                                          </div>
                                                                        </section>


                                                                      </div>
                                                                      <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                                                        <i><b>
                                                                          <?php if(${"data_pjskbu2_".$row_pjsk['id_sub_klasifikasi_pjsk']}=='1'){
                                                                            echo "OK";
                                                                          }else{
                                                                            echo "Tidak";
                                                                          } ;?>

                                                                        </b></i>
                                                                      </div>
                                                                      <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                                        <?=${"data_pjskbu_comment2_".$row_pjsk['id_sub_klasifikasi_pjsk']};?>
                                                                      </div>
                                                                    </div>
                                                                    <div class="row">

                                                                      <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                                                      </div>

                                                                        <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                          <section class="items2">

                                                                          <div class="row">
                                                                            <div class="col-1-50">
                                                                            </div>
                                                                            <div class="col-1-50">
                                                                            </div>
                                                                          </div>
                                                                        </section>


                                                                        </div>
                                                                        <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                          <section class="items2">
                                                                            <div class="row">
                                                                              <div class="col-1-20">
                                                                                6. Sub Klasifikasi SKK
                                                                              </div>
                                                                              <div class="col-1-20">
                                                                                  : <?=$pjskbu_asesor[0]['sub_klasifikasi_skk'];?>
                                                                              </div>

                                                                            </div>
                                                                          </section>


                                                                        </div>
                                                                        <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                                                          <i><b>
                                                                            <?php if(${"data_pjskbu3_".$row_pjsk['id_sub_klasifikasi_pjsk']}=='1'){
                                                                              echo "OK";
                                                                            }else{
                                                                              echo "Tidak";
                                                                            } ;?>

                                                                          </b></i>
                                                                        </div>
                                                                        <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                                          <?=${"data_pjskbu_comment3_".$row_pjsk['id_sub_klasifikasi_pjsk']};?>
                                                                        </div>
                                                                      </div>
                                                                      <div class="row">

                                                                        <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                                                        </div>

                                                                          <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                            <section class="items2">

                                                                            <div class="row">
                                                                              <div class="col-1-50">
                                                                              </div>
                                                                              <div class="col-1-50">
                                                                              </div>
                                                                            </div>
                                                                          </section>


                                                                          </div>
                                                                          <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                            <section class="items2">
                                                                              <div class="row">
                                                                                <div class="col-1-20">
                                                                                  7. Tanggal Terbit SKK
                                                                                </div>
                                                                                <div class="col-1-20">
                                                                                    : <?=$row_pjsk['tanggal_terbit_skk'];?>
                                                                                </div>

                                                                              </div>
                                                                            </section>


                                                                          </div>
                                                                          <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                                                            <i><b>
                                                                              <?php if(${"data_pjskbu5_".$row_pjsk['id_sub_klasifikasi_pjsk']}=='1'){
                                                                                echo "OK";
                                                                              }else{
                                                                                echo "Tidak";
                                                                              } ;?>

                                                                            </b></i>
                                                                          </div>
                                                                          <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                                          <?=${"data_pjskbu_comment5_".$row_pjsk['id_sub_klasifikasi_pjsk']};?>
                                                                          </div>
                                                                        </div>
                                                                        <div class="row">

                                                                          <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                                                          </div>

                                                                            <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                              <section class="items2">

                                                                              <div class="row">
                                                                                <div class="col-1-50">
                                                                                </div>
                                                                                <div class="col-1-50">
                                                                                </div>
                                                                              </div>
                                                                            </section>


                                                                            </div>
                                                                            <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                              <section class="items2">
                                                                                <div class="row">
                                                                                  <div class="col-1-20">
                                                                                    8. Noreg SKK
                                                                                  </div>
                                                                                  <div class="col-1-20">
                                                                                      : <?=$row_pjsk['noreg_skk'];?>
                                                                                  </div>

                                                                                </div>
                                                                              </section>


                                                                            </div>
                                                                            <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                                                              <i><b>
                                                                                <?php if(${"data_pjskbu7_".$row_pjsk['id_sub_klasifikasi_pjsk']}=='1'){
                                                                                  echo "OK";
                                                                                }else{
                                                                                  echo "Tidak";
                                                                                } ;?>

                                                                              </b></i>
                                                                            </div>
                                                                            <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                                            <?=${"data_pjskbu_comment7_".$row_pjsk['id_sub_klasifikasi_pjsk']};?>
                                                                            </div>
                                                                          </div>
                                                                          <div class="row">

                                                                            <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                                                            </div>

                                                                              <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                                <section class="items2">

                                                                                <div class="row">
                                                                                  <div class="col-1-50">
                                                                                  </div>
                                                                                  <div class="col-1-50">
                                                                                  </div>
                                                                                </div>
                                                                              </section>


                                                                              </div>
                                                                              <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                                <section class="items2">
                                                                                  <div class="row">
                                                                                    <div class="col-1-20">
                                                                                      9. Klasifikasi ACPE AA
                                                                                    </div>
                                                                                    <div class="col-1-20">
                                                                                        : <?=$row_pjsk['klasifikasi_acpe_aa'];?>
                                                                                    </div>

                                                                                  </div>
                                                                                </section>


                                                                              </div>
                                                                              <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                                                                <i><b>
                                                                                  <?php if(${"data_pjskbu9_".$row_pjsk['id_sub_klasifikasi_pjsk']}=='1'){
                                                                                    echo "OK";
                                                                                  }else{
                                                                                    echo "Tidak";
                                                                                  } ;?>

                                                                                </b></i>
                                                                              </div>
                                                                              <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                                              <?=${"data_pjskbu_comment9_".$row_pjsk['id_sub_klasifikasi_pjsk']};?>
                                                                              </div>
                                                                            </div>
                                                                            <div class="row">

                                                                              <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                                                              </div>

                                                                                <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                                  <section class="items2">

                                                                                  <div class="row">
                                                                                    <div class="col-1-50">
                                                                                    </div>
                                                                                    <div class="col-1-50">
                                                                                    </div>
                                                                                  </div>
                                                                                </section>


                                                                                </div>
                                                                                <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                                  <section class="items2">
                                                                                    <div class="row">
                                                                                      <div class="col-1-20">
                                                                                        10. Noreg ACPE AA
                                                                                      </div>
                                                                                      <div class="col-1-20">
                                                                                          : <?=$row_pjsk['nomor_registrasi_acpe_aa'];?>
                                                                                      </div>

                                                                                    </div>
                                                                                  </section>


                                                                                </div>
                                                                                <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                                                                  <i><b>
                                                                                    <?php if(${"data_pjskbu10_".$row_pjsk['id_sub_klasifikasi_pjsk']}=='1'){
                                                                                      echo "OK";
                                                                                    }else{
                                                                                      echo "Tidak";
                                                                                    } ;?>

                                                                                  </b></i>
                                                                                </div>
                                                                                <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                                                <?=${"data_pjskbu_comment10_".$row_pjsk['id_sub_klasifikasi_pjsk']};?>
                                                                                </div>
                                                                              </div>
                                                                              <div class="row">

                                                                                <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                                                                </div>

                                                                                  <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                                    <section class="items2">

                                                                                    <div class="row">
                                                                                      <div class="col-1-50">
                                                                                      </div>
                                                                                      <div class="col-1-50">
                                                                                      </div>
                                                                                    </div>
                                                                                  </section>


                                                                                  </div>
                                                                                  <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                                    <section class="items2">
                                                                                      <div class="row">
                                                                                        <div class="col-1-20">
                                                                                          11. File SKK
                                                                                        </div>
                                                                                        <div class="col-1-20">

                                                                                        </div>

                                                                                      </div>
                                                                                    </section>


                                                                                  </div>
                                                                                  <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                                                                    <i><b>
                                                                                      <?php if(${"data_pjskbu11_".$row_pjsk['id_sub_klasifikasi_pjsk']}=='1'){
                                                                                        echo "OK";
                                                                                      }else{
                                                                                        echo "Tidak";
                                                                                      } ;?>

                                                                                    </b></i>
                                                                                  </div>
                                                                                  <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                                                  <?=${"data_pjskbu_comment11_".$row_pjsk['id_sub_klasifikasi_pjsk']};?>
                                                                                  </div>
                                                                                </div>
                                                                                <div class="row">

                                                                                  <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                                                                  </div>

                                                                                    <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                                      <section class="items2">

                                                                                      <div class="row">
                                                                                        <div class="col-1-50">
                                                                                        </div>
                                                                                        <div class="col-1-50">
                                                                                        </div>
                                                                                      </div>
                                                                                    </section>


                                                                                    </div>
                                                                                    <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                                      <section class="items2">
                                                                                        <div class="row">
                                                                                          <div class="col-1-20">
                                                                                            12. File SPT
                                                                                          </div>
                                                                                          <div class="col-1-20">

                                                                                          </div>

                                                                                        </div>
                                                                                      </section>


                                                                                    </div>
                                                                                    <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                                                                      <i><b>
                                                                                        <?php if(${"data_pjskbu14_".$row_pjsk['id_sub_klasifikasi_pjsk']}=='1'){
                                                                                          echo "OK";
                                                                                        }else{
                                                                                          echo "Tidak";
                                                                                        } ;?>

                                                                                      </b></i>
                                                                                    </div>
                                                                                    <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                                                    <?=${"data_pjskbu_comment14_".$row_pjsk['id_sub_klasifikasi_pjsk']};?>
                                                                                    </div>
                                                                                  </div>
                                                                                  <div class="row">

                                                                                    <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                                                                    </div>

                                                                                      <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                                        <section class="items2">

                                                                                        <div class="row">
                                                                                          <div class="col-1-50">
                                                                                          </div>
                                                                                          <div class="col-1-50">
                                                                                          </div>
                                                                                        </div>
                                                                                      </section>


                                                                                      </div>
                                                                                      <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                                        <section class="items2">
                                                                                          <div class="row">
                                                                                            <div class="col-1-20">
                                                                                              13. File Ijazah
                                                                                            </div>
                                                                                            <div class="col-1-20">
                                                                                            </div>

                                                                                          </div>
                                                                                        </section>


                                                                                      </div>
                                                                                      <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                                                                        <i><b>
                                                                                          <?php if(${"data_pjskbu12_".$row_pjsk['id_sub_klasifikasi_pjsk']}=='1'){
                                                                                            echo "OK";
                                                                                          }else{
                                                                                            echo "Tidak";
                                                                                          } ;?>

                                                                                        </b></i>
                                                                                      </div>
                                                                                      <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                                                      <?=${"data_pjskbu_comment12_".$row_pjsk['id_sub_klasifikasi_pjsk']};?>
                                                                                      </div>
                                                                                    </div>
                                                                                    <div class="row">

                                                                                      <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                                                                      </div>

                                                                                        <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                                          <section class="items2">

                                                                                          <div class="row">
                                                                                            <div class="col-1-50">
                                                                                            </div>
                                                                                            <div class="col-1-50">
                                                                                            </div>
                                                                                          </div>
                                                                                        </section>


                                                                                        </div>
                                                                                        <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                                          <section class="items2">
                                                                                            <div class="row">
                                                                                              <div class="col-1-20">
                                                                                                14. Nama Sekolah
                                                                                              </div>
                                                                                              <div class="col-1-20">

                                                                                              </div>

                                                                                            </div>
                                                                                          </section>


                                                                                        </div>
                                                                                        <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                                                                          <i><b>
                                                                                            <?php if(${"data_pjskbu14_".$row_pjsk['id_sub_klasifikasi_pjsk']}=='1'){
                                                                                              echo "OK";
                                                                                            }else{
                                                                                              echo "Tidak";
                                                                                            } ;?>

                                                                                          </b></i>
                                                                                        </div>
                                                                                        <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                                                        <?=${"data_pjskbu_comment14_".$row_pjsk['id_sub_klasifikasi_pjsk']};?>
                                                                                        </div>
                                                                                      </div>
                                                                                      <div class="row">

                                                                                        <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                                                                        </div>

                                                                                          <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                                            <section class="items2">

                                                                                            <div class="row">
                                                                                              <div class="col-1-50">
                                                                                              </div>
                                                                                              <div class="col-1-50">
                                                                                              </div>
                                                                                            </div>
                                                                                          </section>


                                                                                          </div>
                                                                                          <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                                            <section class="items2">
                                                                                              <div class="row">
                                                                                                <div class="col-1-20">
                                                                                                  15. Nomor Ijazah
                                                                                                </div>
                                                                                                <div class="col-1-20">

                                                                                                </div>

                                                                                              </div>
                                                                                            </section>


                                                                                          </div>
                                                                                          <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                                                                            <i><b>
                                                                                              <?php if(${"data_pjskbu15_".$row_pjsk['id_sub_klasifikasi_pjsk']}=='1'){
                                                                                                echo "OK";
                                                                                              }else{
                                                                                                echo "Tidak";
                                                                                              } ;?>

                                                                                            </b></i>
                                                                                          </div>
                                                                                          <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                                                          <?=${"data_pjskbu_comment15_".$row_pjsk['id_sub_klasifikasi_pjsk']};?>
                                                                                          </div>
                                                                                        </div>
                                                                                        <div class="row">

                                                                                          <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                                                                          </div>

                                                                                            <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                                              <section class="items2">

                                                                                              <div class="row">
                                                                                                <div class="col-1-50">
                                                                                                </div>
                                                                                                <div class="col-1-50">
                                                                                                </div>
                                                                                              </div>
                                                                                            </section>


                                                                                            </div>
                                                                                            <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                                              <section class="items2">
                                                                                                <div class="row">
                                                                                                  <div class="col-1-20">
                                                                                                    16. Jenjang Pendidikan
                                                                                                  </div>
                                                                                                  <div class="col-1-20">

                                                                                                  </div>

                                                                                                </div>
                                                                                              </section>


                                                                                            </div>
                                                                                            <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                                                                              <i><b>
                                                                                                <?php if(${"data_pjskbu16_".$row_pjsk['id_sub_klasifikasi_pjsk']}=='1'){
                                                                                                  echo "OK";
                                                                                                }else{
                                                                                                  echo "Tidak";
                                                                                                } ;?>

                                                                                              </b></i>
                                                                                            </div>
                                                                                            <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                                                            <?=${"data_pjskbu_comment16_".$row_pjsk['id_sub_klasifikasi_pjsk']};?>
                                                                                            </div>
                                                                                          </div>
                                                      <?php endforeach ;?>
                                                    <?php endif ;?>
                                                    <div class="row">

                                                      <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;border-top: none;">

                                                      </div>

                                                        <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                          <section class="items2">

                                                          <div class="row">
                                                            <div class="col-1-50">

                                                            </div>
                                                            <div class="col-1-50">

                                                            </div>
                                                          </div>
                                                        </section>


                                                        </div>
                                                        <div class="col-1-40-table"style="text-align: left;border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                          <section class="items2">
                                                            <div class="row">
                                                              <div class="col-1-20">
                                                                <b>SUB PENILAIAN PJSKBU</b>
                                                              </div>
                                                              <div class="col-1-20">

                                                              </div>

                                                            </div>
                                                          </section>


                                                        </div>
                                                        <div class="col-1-15-table"style="border-bottom: none;border-top: none;border-right: none;">
                                                          <i><b>
                                                            <?php if($pjskbu_asesor[0]['checklist_resume']=="1"){
                                                              echo "SESUAI";
                                                            }else{
                                                              echo "TIDAK SESUAI";
                                                            } ;?>

                                                          </b></i>
                                                        </div>
                                                        <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                            <?=$pjskbu_asesor[0]['comment_resume'];?>
                                                        </div>
                                                      </div>

                                                      <div class="row" >

                                                          <div class="col-1-5-table" style="border-bottom: none;border-right: none;background-color:#BCBCBC;">
                                                            <div class="center" >
                                                            <b>3.</b>
                                                            </div>
                                                          </div>

                                                          <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-right: none;border-left: none;background-color:#BCBCBC;">

                                                              <b>Penjualan Tahunan</b>


                                                          </div>
                                                          <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-right: none;background-color:#BCBCBC;">
                                                          </div>
                                                          <div class="col-1-15-table"style="border-bottom: none;border-right: none;background-color:#BCBCBC;">
                                                            Checklist
                                                          </div>
                                                          <div class="col-1-15-table"style="border-bottom: none;background-color:#BCBCBC;">
                                                            Catatan
                                                          </div>

                                                        </div>
                                                        <?php if(!empty($penjualan_tahunan)) :?>
                                                          <?php foreach ($penjualan_tahunan as $row_pengalaman) :?>

                                                        <div class="row">

                                                          <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;">

                                                          </div>

                                                            <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                              <section class="items2">

                                                              <div class="row">
                                                                <div class="col-1-50">
                                                                  a. Data Inputan Penjualan Tahunan
                                                                </div>
                                                                <div class="col-1-50">

                                                                </div>
                                                              </div>
                                                            </section>


                                                            </div>
                                                            <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                              <section class="items2">
                                                                <div class="row">
                                                                  <div class="col-1-20">
                                                                    1. Nama Paket Pekerjaan
                                                                  </div>
                                                                  <div class="col-1-20">
                                                                     : <?=$row_pengalaman['nama_pengalaman'];?>
                                                                  </div>

                                                                </div>
                                                              </section>


                                                            </div>
                                                            <div class="col-1-15-table"style="border-bottom: none;border-right: none;border-top: none;">
                                                              <i><b>


                                                              </b></i>
                                                            </div>
                                                            <div class="col-1-15-table"style="border-bottom: none;border-top: none;">

                                                            </div>
                                                          </div>
                                                          <div class="row">

                                                            <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;">

                                                            </div>

                                                              <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                <section class="items2">

                                                                <div class="row">
                                                                  <div class="col-1-50">

                                                                  </div>
                                                                  <div class="col-1-50">

                                                                  </div>
                                                                </div>
                                                              </section>


                                                              </div>
                                                              <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                <section class="items2">
                                                                  <div class="row">
                                                                    <div class="col-1-20">
                                                                      2. No. Kontrak
                                                                    </div>
                                                                    <div class="col-1-20">
                                                                       : <?=$row_pengalaman['nomor_kontrak'];?>
                                                                    </div>

                                                                  </div>
                                                                </section>


                                                              </div>
                                                              <div class="col-1-15-table"style="border-bottom: none;border-right: none;border-top: none;">
                                                                <i><b>


                                                                </b></i>
                                                              </div>
                                                              <div class="col-1-15-table"style="border-bottom: none;border-top: none;">

                                                              </div>
                                                            </div>
                                                            <div class="row">

                                                              <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;">

                                                              </div>

                                                                <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                  <section class="items2">

                                                                  <div class="row">
                                                                    <div class="col-1-50">

                                                                    </div>
                                                                    <div class="col-1-50">

                                                                    </div>
                                                                  </div>
                                                                </section>


                                                                </div>
                                                                <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                  <section class="items2">
                                                                    <div class="row">
                                                                      <div class="col-1-20">
                                                                        3. Tanggal Kontrak
                                                                      </div>
                                                                      <div class="col-1-20">
                                                                         : <?=$row_pengalaman['tgl_kontrak'];?>
                                                                      </div>

                                                                    </div>
                                                                  </section>


                                                                </div>
                                                                <div class="col-1-15-table"style="border-bottom: none;border-right: none;border-top: none;">
                                                                  <i><b>


                                                                  </b></i>
                                                                </div>
                                                                <div class="col-1-15-table"style="border-bottom: none;border-top: none;">

                                                                </div>
                                                              </div>
                                                              <div class="row">

                                                                <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;">

                                                                </div>

                                                                  <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                    <section class="items2">

                                                                    <div class="row">
                                                                      <div class="col-1-50">

                                                                      </div>
                                                                      <div class="col-1-50">

                                                                      </div>
                                                                    </div>
                                                                  </section>


                                                                  </div>
                                                                  <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                    <section class="items2">
                                                                      <div class="row">
                                                                        <div class="col-1-20">
                                                                          4. Nilai Kontrak
                                                                        </div>
                                                                        <div class="col-1-20">
                                                                           : Rp. <?=number_format($row_pengalaman['nilai_kontrak'],0,",",".") ;?>
                                                                        </div>

                                                                      </div>
                                                                    </section>


                                                                  </div>
                                                                  <div class="col-1-15-table"style="border-bottom: none;border-right: none;border-top: none;">
                                                                    <i><b>


                                                                    </b></i>
                                                                  </div>
                                                                  <div class="col-1-15-table"style="border-bottom: none;border-top: none;">

                                                                  </div>
                                                                </div>
                                                                <div class="row">

                                                                  <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;">

                                                                  </div>

                                                                    <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                      <section class="items2">

                                                                      <div class="row">
                                                                        <div class="col-1-50">

                                                                        </div>
                                                                        <div class="col-1-50">

                                                                        </div>
                                                                      </div>
                                                                    </section>


                                                                    </div>
                                                                    <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                      <section class="items2">
                                                                        <div class="row">
                                                                          <div class="col-1-20">
                                                                            5. No. BAST
                                                                          </div>
                                                                          <div class="col-1-20">
                                                                             : Rp. <?=$row_pengalaman['no_bash'] ;?>
                                                                          </div>

                                                                        </div>
                                                                      </section>


                                                                    </div>
                                                                    <div class="col-1-15-table"style="border-bottom: none;border-right: none;border-top: none;">
                                                                      <i><b>


                                                                      </b></i>
                                                                    </div>
                                                                    <div class="col-1-15-table"style="border-bottom: none;border-top: none;">

                                                                    </div>
                                                                  </div>
                                                                  <div class="row">

                                                                    <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;">

                                                                    </div>

                                                                      <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                        <section class="items2">

                                                                        <div class="row">
                                                                          <div class="col-1-50">

                                                                          </div>
                                                                          <div class="col-1-50">

                                                                          </div>
                                                                        </div>
                                                                      </section>


                                                                      </div>
                                                                      <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                        <section class="items2">
                                                                          <div class="row">
                                                                            <div class="col-1-20">
                                                                              6. Tanggal BAST
                                                                            </div>
                                                                            <div class="col-1-20">
                                                                               :  <?=$row_pengalaman['tgl_bast'] ;?>
                                                                            </div>

                                                                          </div>
                                                                        </section>


                                                                      </div>
                                                                      <div class="col-1-15-table"style="border-bottom: none;border-right: none;border-top: none;">
                                                                        <i><b>


                                                                        </b></i>
                                                                      </div>
                                                                      <div class="col-1-15-table"style="border-bottom: none;border-top: none;">

                                                                      </div>
                                                                    </div>
                                                                    <div class="row">

                                                                      <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;">

                                                                      </div>

                                                                        <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                          <section class="items2">

                                                                          <div class="row">
                                                                            <div class="col-1-50">

                                                                            </div>
                                                                            <div class="col-1-50">

                                                                            </div>
                                                                          </div>
                                                                        </section>


                                                                        </div>
                                                                        <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                          <section class="items2">
                                                                            <div class="row">
                                                                              <div class="col-1-20">
                                                                                7. Nilai Kontrak (Setelah Addendum)
                                                                              </div>
                                                                              <div class="col-1-20">
                                                                                 : Rp. <?=number_format($row_pengalaman['nilai_kontrak_adendum'],0,",",".") ;?>
                                                                              </div>

                                                                            </div>
                                                                          </section>


                                                                        </div>
                                                                        <div class="col-1-15-table"style="border-bottom: none;border-right: none;border-top: none;">
                                                                          <i><b>


                                                                          </b></i>
                                                                        </div>
                                                                        <div class="col-1-15-table"style="border-bottom: none;border-top: none;">

                                                                        </div>
                                                                      </div>
                                                                      <div class="row">

                                                                        <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;">

                                                                        </div>

                                                                          <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                            <section class="items2">

                                                                            <div class="row">
                                                                              <div class="col-1-50">

                                                                              </div>
                                                                              <div class="col-1-50">

                                                                              </div>
                                                                            </div>
                                                                          </section>


                                                                          </div>
                                                                          <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                            <section class="items2">
                                                                              <div class="row">
                                                                                <div class="col-1-20">
                                                                                  8. Porsi KSO
                                                                                </div>
                                                                                <div class="col-1-20">
                                                                                   : <?=$row_pengalaman['status_kso'];?>
                                                                                </div>

                                                                              </div>
                                                                            </section>


                                                                          </div>
                                                                          <div class="col-1-15-table"style="border-bottom: none;border-right: none;border-top: none;">
                                                                            <i><b>


                                                                            </b></i>
                                                                          </div>
                                                                          <div class="col-1-15-table"style="border-bottom: none;border-top: none;">

                                                                          </div>
                                                                        </div>
                                                                        <div class="row">

                                                                          <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;">

                                                                          </div>

                                                                            <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                              <section class="items2">

                                                                              <div class="row">
                                                                                <div class="col-1-50">

                                                                                </div>
                                                                                <div class="col-1-50">

                                                                                </div>
                                                                              </div>
                                                                            </section>


                                                                            </div>
                                                                            <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                              <section class="items2">
                                                                                <div class="row">
                                                                                  <div class="col-1-20">
                                                                                    9. Nilai Kontrak Sesuai Porsi
                                                                                  </div>
                                                                                  <div class="col-1-20">
                                                                                     : Rp. <?=number_format($row_pengalaman['nilai_kontrak_sesuai_porsi'],0,",",".") ;?>
                                                                                  </div>

                                                                                </div>
                                                                              </section>


                                                                            </div>
                                                                            <div class="col-1-15-table"style="border-bottom: none;border-right: none;border-top: none;">
                                                                              <i><b>


                                                                              </b></i>
                                                                            </div>
                                                                            <div class="col-1-15-table"style="border-bottom: none;border-top: none;">

                                                                            </div>
                                                                          </div>
                                                                          <?php $counter_pengalaman+=1;
                                                                          $id_clean2 = preg_replace('/[^\p{L}\p{N}\s]/u', '', $row_pengalaman['nomor_kontrak']);
                                                                          $id_clean=substr($id_clean2,0,4);

                                                                          ;?>
                                                                          <div class="row">

                                                                            <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;">

                                                                            </div>

                                                                              <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                                <section class="items2">

                                                                                <div class="row">
                                                                                  <div class="col-1-50">
                                                                                    b. Penilaian Penjualan Tahunan
                                                                                  </div>
                                                                                  <div class="col-1-50">

                                                                                  </div>
                                                                                </div>
                                                                              </section>


                                                                              </div>


                                                                              <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                                <section class="items2">
                                                                                  <div class="row">
                                                                                    <div class="col-1-20">
                                                                                      1. Kesesuaian Ruang Lingkup
                                                                                    </div>
                                                                                    <div class="col-1-20">

                                                                                    </div>

                                                                                  </div>
                                                                                </section>


                                                                              </div>
                                                                              <div class="col-1-15-table"style="border-bottom: none;border-right: none;border-top: none;">
                                                                                <i><b>
                                                                                  <?php if(${"data_penjualan_1".$id_clean}=='1'){
                                                                                    echo "OK";
                                                                                  }else{
                                                                                    echo "Tidak";
                                                                                  } ;?>

                                                                                </b></i>
                                                                              </div>
                                                                              <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                                                <?=${"comment_penjualan_1".$id_clean};?>
                                                                              </div>
                                                                            </div>
                                                                            <div class="row">

                                                                              <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;">

                                                                              </div>

                                                                                <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                                  <section class="items2">

                                                                                  <div class="row">
                                                                                    <div class="col-1-50">

                                                                                    </div>
                                                                                    <div class="col-1-50">

                                                                                    </div>
                                                                                  </div>
                                                                                </section>


                                                                                </div>


                                                                                <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                                  <section class="items2">
                                                                                    <div class="row">
                                                                                      <div class="col-1-20">
                                                                                        2. Kesesuaian Nilai Kontrak
                                                                                      </div>
                                                                                      <div class="col-1-20">

                                                                                      </div>

                                                                                    </div>
                                                                                  </section>


                                                                                </div>
                                                                                <div class="col-1-15-table"style="border-bottom: none;border-right: none;border-top: none;">
                                                                                  <i><b>
                                                                                    <?php if(${"data_penjualan_2".$id_clean}=='1'){
                                                                                      echo "OK";
                                                                                    }else{
                                                                                      echo "Tidak";
                                                                                    } ;?>

                                                                                  </b></i>
                                                                                </div>
                                                                                <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                                                  <?=${"comment_penjualan_2".$id_clean};?>
                                                                                </div>
                                                                              </div>
                                                                              <div class="row">

                                                                                <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;">

                                                                                </div>

                                                                                  <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                                    <section class="items2">

                                                                                    <div class="row">
                                                                                      <div class="col-1-50">

                                                                                      </div>
                                                                                      <div class="col-1-50">

                                                                                      </div>
                                                                                    </div>
                                                                                  </section>


                                                                                  </div>


                                                                                  <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                                    <section class="items2">
                                                                                      <div class="row">
                                                                                        <div class="col-1-20">
                                                                                          3. Kesesuaian Tanggal Kontrak
                                                                                        </div>
                                                                                        <div class="col-1-20">

                                                                                        </div>

                                                                                      </div>
                                                                                    </section>


                                                                                  </div>
                                                                                  <div class="col-1-15-table"style="border-bottom: none;border-right: none;border-top: none;">
                                                                                    <i><b>
                                                                                      <?php if(${"data_penjualan_3".$id_clean}=='1'){
                                                                                        echo "OK";
                                                                                      }else{
                                                                                        echo "Tidak";
                                                                                      } ;?>

                                                                                    </b></i>
                                                                                  </div>
                                                                                  <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                                                    <?=${"comment_penjualan_3".$id_clean};?>
                                                                                  </div>
                                                                                </div>
                                                                                <div class="row">

                                                                                  <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;">

                                                                                  </div>

                                                                                    <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                                      <section class="items2">

                                                                                      <div class="row">
                                                                                        <div class="col-1-50">

                                                                                        </div>
                                                                                        <div class="col-1-50">

                                                                                        </div>
                                                                                      </div>
                                                                                    </section>


                                                                                    </div>


                                                                                    <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                                      <section class="items2">
                                                                                        <div class="row">
                                                                                          <div class="col-1-20">
                                                                                            4. Kesesuaian BAST dengan Kontrak
                                                                                          </div>
                                                                                          <div class="col-1-20">

                                                                                          </div>

                                                                                        </div>
                                                                                      </section>


                                                                                    </div>
                                                                                    <div class="col-1-15-table"style="border-bottom: none;border-right: none;border-top: none;">
                                                                                      <i><b>
                                                                                        <?php if(${"data_penjualan_4".$id_clean}=='1'){
                                                                                          echo "OK";
                                                                                        }else{
                                                                                          echo "Tidak";
                                                                                        } ;?>

                                                                                      </b></i>
                                                                                    </div>
                                                                                    <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                                                      <?=${"comment_penjualan_4".$id_clean};?>
                                                                                    </div>
                                                                                  </div>
                                                                                  <div class="row">

                                                                                    <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;">

                                                                                    </div>

                                                                                      <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                                        <section class="items2">

                                                                                        <div class="row">
                                                                                          <div class="col-1-50">

                                                                                          </div>
                                                                                          <div class="col-1-50">

                                                                                          </div>
                                                                                        </div>
                                                                                      </section>


                                                                                      </div>


                                                                                      <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                                        <section class="items2">
                                                                                          <div class="row">
                                                                                            <div class="col-1-20">
                                                                                              5. Kesesuaian Tanggal BAST
                                                                                            </div>
                                                                                            <div class="col-1-20">

                                                                                            </div>

                                                                                          </div>
                                                                                        </section>


                                                                                      </div>
                                                                                      <div class="col-1-15-table"style="border-bottom: none;border-right: none;border-top: none;">
                                                                                        <i><b>
                                                                                          <?php if(${"data_penjualan_5".$id_clean}=='1'){
                                                                                            echo "OK";
                                                                                          }else{
                                                                                            echo "Tidak";
                                                                                          } ;?>

                                                                                        </b></i>
                                                                                      </div>
                                                                                      <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                                                        <?=${"comment_penjualan_5".$id_clean};?>
                                                                                      </div>
                                                                                    </div>
                                                                                    <div class="row">

                                                                                      <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;">

                                                                                      </div>

                                                                                        <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                                          <section class="items2">

                                                                                          <div class="row">
                                                                                            <div class="col-1-50">

                                                                                            </div>
                                                                                            <div class="col-1-50">

                                                                                            </div>
                                                                                          </div>
                                                                                        </section>


                                                                                        </div>


                                                                                        <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                                          <section class="items2">
                                                                                            <div class="row">
                                                                                              <div class="col-1-20">
                                                                                                6. Kesesuaian Kontrak KSO
                                                                                              </div>
                                                                                              <div class="col-1-20">

                                                                                              </div>

                                                                                            </div>
                                                                                          </section>


                                                                                        </div>
                                                                                        <div class="col-1-15-table"style="border-bottom: none;border-right: none;border-top: none;">
                                                                                          <i><b>
                                                                                            <?php if(${"data_penjualan_6".$id_clean}=='1'){
                                                                                              echo "OK";
                                                                                            }else{
                                                                                              echo "Tidak";
                                                                                            } ;?>

                                                                                          </b></i>
                                                                                        </div>
                                                                                        <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                                                          <?=${"comment_penjualan_6".$id_clean};?>
                                                                                        </div>
                                                                                      </div>
                                                                                      <div class="row">

                                                                                        <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;">

                                                                                        </div>

                                                                                          <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                                            <section class="items2">

                                                                                            <div class="row">
                                                                                              <div class="col-1-50">

                                                                                              </div>
                                                                                              <div class="col-1-50">

                                                                                              </div>
                                                                                            </div>
                                                                                          </section>


                                                                                          </div>


                                                                                          <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                                            <section class="items2">
                                                                                              <div class="row">
                                                                                                <div class="col-1-20">
                                                                                                  7. Kesesuaian BOQ RAB MPU
                                                                                                </div>
                                                                                                <div class="col-1-20">

                                                                                                </div>

                                                                                              </div>
                                                                                            </section>


                                                                                          </div>
                                                                                          <div class="col-1-15-table"style="border-bottom: none;border-right: none;border-top: none;">
                                                                                            <i><b>
                                                                                              <?php if(${"data_penjualan_7".$id_clean}=='1'){
                                                                                                echo "OK";
                                                                                              }else{
                                                                                                echo "Tidak";
                                                                                              } ;?>

                                                                                            </b></i>
                                                                                          </div>
                                                                                          <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                                                            <?=${"comment_penjualan_7".$id_clean};?>
                                                                                          </div>
                                                                                        </div>
                                                                                        <div class="row">

                                                                                          <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;">

                                                                                          </div>

                                                                                            <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                                              <section class="items2">

                                                                                              <div class="row">
                                                                                                <div class="col-1-50">

                                                                                                </div>
                                                                                                <div class="col-1-50">

                                                                                                </div>
                                                                                              </div>
                                                                                            </section>


                                                                                            </div>


                                                                                            <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                                              <section class="items2">
                                                                                                <div class="row">
                                                                                                  <div class="col-1-20">
                                                                                                    8. Kesesuaian Addendum
                                                                                                  </div>
                                                                                                  <div class="col-1-20">

                                                                                                  </div>

                                                                                                </div>
                                                                                              </section>


                                                                                            </div>
                                                                                            <div class="col-1-15-table"style="border-bottom: none;border-right: none;border-top: none;">
                                                                                              <i><b>
                                                                                                <?php if(${"data_penjualan_8".$id_clean}=='1'){
                                                                                                  echo "OK";
                                                                                                }else{
                                                                                                  echo "Tidak";
                                                                                                } ;?>

                                                                                              </b></i>
                                                                                            </div>
                                                                                            <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                                                              <?=${"comment_penjualan_8".$id_clean};?>
                                                                                            </div>
                                                                                          </div>
                                                                                          <div class="row">

                                                                                            <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;">

                                                                                            </div>

                                                                                              <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                                                <section class="items2">

                                                                                                <div class="row">
                                                                                                  <div class="col-1-50">

                                                                                                  </div>
                                                                                                  <div class="col-1-50">

                                                                                                  </div>
                                                                                                </div>
                                                                                              </section>


                                                                                              </div>


                                                                                              <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                                                <section class="items2">
                                                                                                  <div class="row">
                                                                                                    <div class="col-1-20">
                                                                                                      9. Validasi Kontrak (Kontrak Pemerintah dan swasta)
                                                                                                    </div>
                                                                                                    <div class="col-1-20">

                                                                                                    </div>

                                                                                                  </div>
                                                                                                </section>


                                                                                              </div>
                                                                                              <div class="col-1-15-table"style="border-bottom: none;border-right: none;border-top: none;">
                                                                                                <i><b>
                                                                                                  <?php if(${"data_penjualan_9".$id_clean}=='1'){
                                                                                                    echo "OK";
                                                                                                  }else{
                                                                                                    echo "Tidak";
                                                                                                  } ;?>

                                                                                                </b></i>
                                                                                              </div>
                                                                                              <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                                                                <?=${"comment_penjualan_9".$id_clean};?>
                                                                                              </div>
                                                                                            </div>

                                                                        <?php endforeach ;?>
                                                                      <?php endif ;?>
                                                                      <div class="row">

                                                                        <div class="col-1-5-table" style="border-top: none;border-right: none;;border-bottom: none;">

                                                                        </div>

                                                                          <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                            <section class="items2">

                                                                            <div class="row">
                                                                              <div class="col-1-50">

                                                                              </div>
                                                                              <div class="col-1-50">

                                                                              </div>
                                                                            </div>
                                                                          </section>


                                                                          </div>


                                                                          <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-top: none;border-right: none;">
                                                                            <section class="items2">
                                                                              <div class="row">
                                                                                <div class="col-1-20">
                                                                                  <b>SUB PENILAIAN</b>
                                                                                </div>
                                                                                <div class="col-1-20">

                                                                                </div>

                                                                              </div>
                                                                            </section>


                                                                          </div>
                                                                          <div class="col-1-15-table"style="border-bottom: none;border-right: none;border-top: none;">
                                                                            <i><b>
                                                                            <?php
                                                                            if($data_penilaian[0]['penjualan_tahunan']=='1'){
                                                                              echo "SESUAI";
                                                                            }else{
                                                                              echo "TIDAK SESUAI";
                                                                            }
                                                                             ;?>

                                                                            </b></i>
                                                                          </div>
                                                                          <div class="col-1-15-table"style="text-align: left;border-bottom: none;border-top: none;">
                                                                            <?=$biodata_penjualan[0]['comment_resume'] ;?>
                                                                          </div>
                                                                        </div>

                                                                        <div class="row" >

                                                                            <div class="col-1-5-table" style="border-bottom: none;border-right: none;background-color:#BCBCBC;">
                                                                              <div class="center" >
                                                                              <b>4. </b>
                                                                              </div>
                                                                            </div>

                                                                            <div class="col-1-15-table" style="border-bottom: none;border-right: none;border-right: none;border-left: none;background-color:#BCBCBC;">

                                                                                <b>SMAP</b>


                                                                            </div>
                                                                            <div class="col-1-40-table"style="border-bottom: none;border-left: none;border-right: none;background-color:#BCBCBC;">
                                                                              <?php if($asesor_smap[0]['dokumen']=='1'){
                                                                                echo "Surat Pernyataan Komitmen";
                                                                              }else if($asesor_smap[0]['dokumen']=='2'){
                                                                                echo "Sertifikat ISO 37001-2016";
                                                                              }elseif($asesor_smap[0]['dokumen']=='3'){
                                                                                echo "Dokumen Penyelenggaraan";

                                                                              };?>
                                                                              :<i><b>
                                                                                <?=$asesor_smm[0]['comment'] ;?>

                                                                              </b></i>
                                                                            </div>
                                                                            <div class="col-1-15-table"style="border-bottom: none;border-right: none;background-color:#BCBCBC;">
                                                                              <i><b>
                                                                                <?php if($asesor_smap[0]['checklist']=='1'){
                                                                                  echo "OK";
                                                                                }else{
                                                                                  echo "Tidak";
                                                                                } ;?>

                                                                              </b></i>
                                                                            </div>
                                                                            <div class="col-1-15-table"style="border-bottom: none;background-color:#BCBCBC;">
                                                                              <?=$data_comment78;?>
                                                                            </div>

                                                                          </div>
                                                                          <div class="row">

                                                                            <div class="col-1-5-table" style="border-top: none;border-right: none;">

                                                                            </div>

                                                                              <div class="col-1-15-table" style="border-right: none;border-right: none;border-left: none;border-top: none;">

                                                                                <section class="items2">

                                                                                <div class="row">
                                                                                  <div class="col-1-50">

                                                                                  </div>
                                                                                  <div class="col-1-50">

                                                                                  </div>
                                                                                </div>
                                                                              </section>


                                                                              </div>


                                                                              <div class="col-1-40-table"style="border-left: none;border-top: none;border-right: none;">
                                                                                <section class="items2">
                                                                                  <div class="row">
                                                                                    <div class="col-1-20">
                                                                                      <b>SUB PENILAIAN</b>
                                                                                    </div>
                                                                                    <div class="col-1-20">

                                                                                    </div>

                                                                                  </div>
                                                                                </section>


                                                                              </div>
                                                                              <div class="col-1-15-table"style="border-right: none;border-top: none;">
                                                                                <i><b>
                                                                                <?php
                                                                                if($asesor_smap[0]['checklist_resume']=='1'){
                                                                                  echo "SESUAI";
                                                                                }else{
                                                                                  echo "TIDAK SESUAI";
                                                                                }
                                                                                 ;?>

                                                                                </b></i>
                                                                              </div>
                                                                              <div class="col-1-15-table"style="text-align: left;border-top: none;">
                                                                                <?=$asesor_smap[0]['comment_resume'] ;?>
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

                                                                                <div class="col-1-20-table">
                                                                                  <div class="center">
                                                                                    Deskripsi
                                                                                    </div>
                                                                                </div>

                                                                                <div class="col-1-10-table">
                                                                                  <div class="center">
                                                                                    SMAP
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-1-10-table">
                                                                                  <div class="center">
                                                                                    Tenaga Kerja
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-1-10-table">
                                                                                  <div class="center">
                                                                                    Kemampuan Keuangan
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-1-10-table">
                                                                                  <div class="center">
                                                                                    Penjualan Tahunan
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-1-10-table">
                                                                                  <div class="center">
                                                                                    Hasil Akhir
                                                                                  </div>
                                                                                </div>

                                                                            </div>
                                                                            <?php $count=0; ?>
                                                                            <?php foreach($data_penilaian as $row_penilaian) :?>
                                                                              <?php $count+=1; ?>
                                                                            <div class="row">

                                                                                <div class="col-1-5-table">
                                                                                  <div class="center" >
                                                                                  <?= $count ;?>
                                                                                  </div>
                                                                                </div>

                                                                                <div class="col-1-20-table">

                                                                                  <?= $row_penilaian['deskripsi_subklasifikasi']." / ".$row_penilaian['id_sub_klasifikasi']."-".$row_penilaian['kualifikasi']." / ".$row_penilaian['nomor_kbli'] ;?>



                                                                                </div>

                                                                                <div class="col-1-10-table">
                                                                                  <b>
                                                                                    <?php if($row_penilaian['smap']=="1"){
                                                                                      echo 'SESUAI';
                                                                                    }else{
                                                                                      echo 'TIDAK SESUAI';
                                                                                    } ?>

                                                                                  </b>

                                                                                </div>
                                                                                <div class="col-1-10-table">
                                                                                  <b>
                                                                                    <?php if($row_penilaian['tk']=="1"){
                                                                                      echo 'SESUAI';
                                                                                    }else{
                                                                                      echo 'TIDAK SESUAI';
                                                                                    } ?>

                                                                                  </b>

                                                                                </div>
                                                                                <div class="col-1-10-table">
                                                                                  <b>
                                                                                    <?php if($row_penilaian['aset']=="1"){
                                                                                      echo 'SESUAI';
                                                                                    }else{
                                                                                      echo 'TIDAK SESUAI';
                                                                                    } ?>

                                                                                  </b>

                                                                                </div>
                                                                                <div class="col-1-10-table">
                                                                                  <b>
                                                                                    <?php if($row_penilaian['penjualan_tahunan']=="1"){
                                                                                      echo 'SESUAI';
                                                                                    }else{
                                                                                      echo 'TIDAK SESUAI';
                                                                                    } ?>

                                                                                  </b>

                                                                                </div>
                                                                                <div class="col-1-10-table">
                                                                                  <b>
                                                                                    <?php if($row_penilaian['hasil_akhir']=="1"){
                                                                                      echo 'MEMENUHI';
                                                                                    }else{
                                                                                      echo 'TIDAK MEMENUHI';
                                                                                    } ?>

                                                                                  </b>

                                                                                </div>
                                                                            </div>
                                                                            <?php endforeach ?>

                                                                            </section>
                                                                            <section class="items">

                                                                              <div class="row">



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




                                                                                  <div class="col-1-10">
                                                                                  </div>
                                                                                  <div class="col-1-15-table">
                                                                                    <div class="center">
                                                                                      Asesor 1
                                                                                        <br>
                                                                                      <img src="<?=$asesor[0]['persyaratan'] ;?>" style=";border: 1px; max-height: 110px;">
                                                                                        <br>
                                                                                      <?=$asesor[0]['Nama'] ;?>
                                                                                      <br>

                                                                                    </div>
                                                                                  </div>
                                                                                  <div class="col-1-10">
                                                                                  </div>
                                                                                  <?php if($asesor[1]['Nama']!='') :?>
                                                                                  <div class="col-1-10-table">
                                                                                    <div class="center">
                                                                                      Asesor 2
                                                                                      <br>
                                                                                      <img src="<?=$asesor[1]['persyaratan'] ;?>" style=";border: 1px; max-height: 110px;">
                                                                                        <br>
                                                                                    <?=$asesor[1]['Nama'] ;?>
                                                                                    <br>

                                                                                  </div>



                                                                              </div>
                                                                            <?php endif ;?>
                                                                              <div class="col-1-10">
                                                                              </div>


                                                                            </section>
    <section class="items" >

                <div style="position: fixed;
                            bottom: -60px;
                            height: 50px;

                            color: black;
                            text-align: right;
                            line-height: 35px;">
      <b>LSI/P04-FR9 Rev. 0 </b></div>


    </section>
