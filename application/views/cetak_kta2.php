<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <title>Result</title>
    <style media="screen">
        @font-face {
            font-family: Amasis;
            src: url(//db.onlinewebfonts.com/c/152b8603575e32d08abebfd7396eab55?family=Amasis+MT+Std);
        }

        .wrapper {
            padding-left: 25px;
            padding-right: 25px;
            padding-top: 60px;
            padding-bottom: 0px;
        }

        .container {
            line-height: 18px;
        }

        .title {
            text-align: center;
            padding: 5px;
            padding-top: 15px;
            font-weight: bold;
            font-size: 14pt;
            margin-bottom: 0px;
            font-family: 'Britannic Bold';
        }

        .tengah {
            text-align: center;
            padding: 5px;
            padding-top: 15px;
            font-size: 12pt;
            margin-bottom: 0px;
            /*font-family: 'Britannic Bold';*/
        }

        .images-pupr {
            width: 60px;
            padding-left: 80px;
            padding-top: 80px;
        }

        .tulisan-pupr {
            font-size: 11pt;
        }

        .tengah_kecil {
            text-align: center;
            padding: 5px;
            padding-top: 15px;
            font-size: 12pt;
            margin-bottom: 0px;
            /*font-family: 'Britannic Bold';*/
        }

        .tengah_kecil_2 {
            text-align: center;
            padding: 5px;
            font-size: 12pt;
            margin-bottom: 0px;
            /*font-family: 'Britannic Bold';*/
        }

        .content {
            font-family: 'Arial';
            font-size: 12pt;
        }

        .content .x1 {
            font-family: 'Arial';
            font-size: 12pt;
            float: center;
        }

        .content table {
            width: 100%;
            padding-top: 10px;
            font-family: 'Arial';
            font-size: 12pt;
            border-spacing: 0px;
        }

        /* .content div {} */
        .content .x1 .x2 {
            width: 25%;
        }

        .content .x1 .x3 {
            padding: 0 5px;
            width: 1%;
        }

        .content .x1 .x4 {
            font-weight: bold;
            width: 74%;
        }

        .content .x1 .x10 {
            width: 74%;
        }

        .content .x1 .x5 {
            width: 25%;
        }

        .content .x1 .x7 {
            width: 24%;
        }

        .content .x1 .x8 {
            width: 34%;
        }

        .content .x1 .x9 {
            width: 15%;
        }

        .klasifikasi {
            width: 600px;
            padding: 5px;
            margin: 0 auto;
            text-align: center;
            border: 1px solid black;
        }

        .klasifikasi .x1 {
            font-style: italic;
        }

        .klasifikasi .x2 {
            font-weight: bold;
        }

        .no-registrasi {
            width: 600px;
            padding: 2px;
            margin: 5px auto;
            text-align: center;
            border: 1px solid black;
        }

        .no-registrasi .x1 {
            font-style: italic;
        }

        .no-registrasi .x2 {
            font-weight: bold;
            /*margin-top: 5px;*/
        }

        .penetapan {
            text-align: center;
            /* font-family: Arial; */
            font-family: 'Arial';
            font-size: 12pt;
            padding-top: 25px;
            /* font-size: 16px; */
        }

        .penetapan_atas {
            text-align: center;
            /* font-family: Arial; */
            font-size: 12pt;
            /* font-size: 16px; */
            padding-top: 10px;
        }

        /* .penetapan .x1 {} */
        /* .penetapan .x2 {} */
        .penetapan .x2 .x1 {
            font-weight: bold;
        }

        .penetapan .x2 .x2 {
            font-weight: bold;
            margin-top: 80px;
        }

        /* .penetapan .x3 {} */
        .keterangan {
            font-size: 9pt;
        }

        .content2 {
            font-family: 'Arial';
            font-size: 12pt;
            padding-top: 200px;
            padding-left: 15px;
        }
    </style>
</head>

<body style="background-image: url('https://kta.gapeknas.id/assets/sertifikat/LEMBAR_KTA_GAPEKNAS_001.png');background-position: top left;background-repeat: no-repeat;background-image-resize: 4;background-image-resolution: from-image;">
   <!-- <body > -->
    <div class="wrapper">
        <div class="container">
            <table class="penetapan_atas" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td align="center" valign="top" width="80%">
                        <table class="penetapan_atas" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td align="center" valign="middle" width="100%"> <img
                                        src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/assets/sertifikat/GAPEKNAS_LOGO.png';?>"
                                        width="235" style="padding-top:20px;padding-left: 150px"> </td>
                            </tr>
                        </table>
                    </td>
                    <td align="left" valign="middle" width="20%" style="padding-top:-10px;"> <img
                            src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/assets/sertifikat/ISO-9001.jpg';?>" width="90"
                            height="70" style="padding-top:-10px;padding-right:-20px" ;> </td>
                </tr>
            </table>
            <table class="penetapan_atas" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td align="center" valign="top" width="100%">
                        <table class="penetapan_atas" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td align="center" valign="middle" width="100%">
                                    <div
                                        style="                            padding-top: 0px;                            font-size: 30px;                            font-family: 'Britannic Bold';">
                                        <b><u>KARTU TANDA ANGGOTA</u></b> </div> <br>
                                    <div
                                        style="                            font-size: 13;                            font-family: 'Arial';">
                                        <b>No. : <?=$record[0]['noreg_full'];?></b> </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table width="100%" cellpadding="0" cellspacing="0"
                style="border-spacing: 13px;padding-left:10px;font-family: 'Arial';font-size: 13pt;">
                <!-- <table class="penetapan" cellpadding="5" cellspacing="1" width="100%"> -->
                <tr>
                    <td class="x2" width="27%" style="padding-top: 0px;">Nama Badan Usaha</td>
                    <td class="x4" width="73%" style="padding-top: 0px;" align=" left">: <?=$record[0]['nama'];?></td>
                </tr>
                <tr>
                    <td class="x2" width="20%" style="padding-top: 0px;">Alamat</td>
                    <td class="x4" width="80%" style="padding-top: 0px;" align=" left">: <?=$record[0]['alamat'];?></td>
                </tr>
                <tr>
                    <td class="x2" width="20%" style="padding-top: 0px;">Kabupaten/Kota</td>
                    <td class="x4" width="80%" style="padding-top: 0px;" align=" left">:
                        <?=$record[0]['nama_kabupaten'];?></td>
                </tr>
                <tr>
                    <td class="x2" width="20%" style="padding-top: 0px;">Provinsi</td>
                    <td class="x4" width="80%" style="padding-top: 0px;" align=" left">:
                        <?=$record[0]['nama_propinsi'];?></td>
                </tr>
                <tr>
                    <td class="x2" width="20%" style="padding-top: 0px;">Kode Pos</td>
                    <td class="x4" width="50%" style="padding-top: 0px;" align=" left">: <?=$record[0]['kodepos'];?>
                    </td>
                </tr>
                <tr>
                    <td class="x2" width="20%" style="padding-top: 0px;">Nomor Telepon</td>
                    <td class="x4" width="80%" style="padding-top: 0px;" align=" left">: <?=$record[0]['no_telp'];?>
                    </td>
                </tr>
                <tr>
                    <td class="x2" width="20%" style="padding-top: 0px;">Email</td>
                    <td class="x4" width="80%" style="padding-top: 0px;" align=" left">: <?=$record[0]['email'];?></td>
                </tr>
                <tr>
                    <td class="x2" width="20%" style="padding-top: 0px;">Penanggung Jawab</td>
                    <td class="x4" width="80%" style="padding-top: 0px;" align=" left">: <?=$record[0]['nama_pjbu'];?>
                    </td>
                </tr>
                <tr>
                    <td class="x2" width="20%" style="padding-top: 0px;">NPWP</td>
                    <td class="x4" width="80%" style="padding-top: 0px;" align=" left">: <?=$record[0]['npwp'];?></td>
                </tr>
                <tr>
                    <td class="x2" width="20%" style="padding-top: 0px;">Kualifikasi</td>
                    <td class="x4" width="80%" style="padding-top: 0px;" align=" left">: <?php if($record[0]['kualifikasi']=='K'){
                        echo "KECIL";
                    }elseif($record[0]['kualifikasi']=='M'){
                        echo "MENENGAH";
                    }elseif($record[0]['kualifikasi']=='B'){
                        echo "BESAR";
                    }else{
                        echo $record[0]['kualifikasi'];
                    };?>
                    </td>
                </tr>
            </table>
            <table class="penetapan" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td align="center" valign="top" width="30%"> </td>
                    <td align="center" valign="top" width="70%">
                        <table width="100%" cellpadding="0" cellspacing="0"
                            style="border-spacing: 0px;font-family: 'Arial';font-size: 13pt;">
                            <!-- <table class="penetapan" cellpadding="5" cellspacing="1" width="100%"> -->
                            <tr>
                                <td class="x2" width="100%" style="padding-top: 0px;">Dikeluarkan Oleh:</td>
                            </tr>
                            <tr>
                                <td class="x2" width="100%" style="padding-top: 0px;"><b>Dewan Pimpinan Pusat
                                        GAPEKNAS</b></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table class="penetapan" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td align="center" valign="top" width="10%">
                        <table class="penetapan" cellpadding="0" cellspacing="0" width="100%"
                            style="padding-left:60px;padding-top:20px">
                            <tr>
                                <td align="left" valign="middle" width="50%"> <img
                                        src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/assets/bukti/kta/foto/'.$record[0]['foto'];?>"
                                        style="border: 1px solid; width: 150px;"> </td>
                            </tr>
                        </table>
                    </td>
                    <td align="center" valign="top" width="90%">
                        <table width="100%" cellpadding="0" cellspacing="0"
                            style="border-spacing: 0px;font-family: 'Arial';font-size: 13pt;padding-top:20px">
                            <tr>
                                <td align="center" valign="middle" width="40%"> <img
                                        src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/assets/sertifikat/qrcodex/1/'.$record[0]['qr_1'];?>"
                                        style=" max-height: 170px; max-width: 100px;"> <br><b><u>Ricky Conrad Siahaan,
                                            ST</b></u> <br>Ketua Umum </td>
                                <td align="center" valign="middle" width="60%"> <img
                                        src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/assets/sertifikat/qrcodex/2/'.$record[0]['qr_2'];?>"
                                        style=" max-height: 170px; max-width: 100px;"> <br><b><u>R. Bima Bhakti
                                            Nusantara, SH., Mh</b></u> <br>Sekretaris Jendral </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table> <br> <br>
            <table class="penetapan" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td align="center" valign="top" width="100%" style="border-spacing: 0px;padding-top:-25px;">
                        <table width="100%" cellpadding="0" cellspacing="0"
                            style="border-spacing: 0px;font-family: 'Arial';font-size: 16px;">
                            <!-- <table class="penetapan" cellpadding="5" cellspacing="1" width="100%"> -->
                            <tr>
                                <td class="x2" width="100%" style="padding-top: 0px;">Disahkan Tanggal
                                    <?=substr($record[0]['tgl_cetak'],8,2);?> - <?=$bulan;?> -
                                    <?=substr($record[0]['tgl_cetak'],0,4);?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table class="penetapan" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td align="center" valign="top" width="100%">
                        <table width="100%" cellpadding="0" cellspacing="0"
                            style="border-spacing: 0px;font-family: 'Arial';font-size: 13pt;padding-top:15px">
                            <tr>
                                <td align="center" valign="middle" width="12%"> <img
                                        src="<?php echo $_SERVER["DOCUMENT_ROOT"].'/assets/sertifikat/qrcodex/3/'.$record[0]['qr_3'];?>"
                                        style=" max-height: 170px; max-width: 100px;"> <br> </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table> <br> <br>
            <table class="penetapan" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                    <td align="center" valign="top" width="50%">
                        <table width="100%" cellpadding="0" cellspacing="0"
                            style="border-spacing: 0px;font-family: 'Arial';font-size: 14px;padding-top:-15px">
                            <!-- <table class="penetapan" cellpadding="5" cellspacing="1" width="100%"> -->
                            <tr>
                                <td class="x2" width="100%" style="padding-top: 0px;"><b>Kartu Tanda Anggota ini berlaku
                                        sampai dengan Tgl. <?=$tgl_habis;?> Bulan <?=$bulan_habis;?> Tahun
                                        <?=$tahun_habis;?></b></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>