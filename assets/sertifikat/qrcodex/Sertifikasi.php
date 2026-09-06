<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sertifikasi extends CI_Controller{
public function __construct(){
  parent::__construct();
  $this->load->model('bu/Bu_model');
  $this->load->model('tk/Tenaga_kerja_model');
  $this->load->library(array('form_validation'));
  $this->load->library('Template');
  $this->load->helper('Ssl');
}
function get_permohonan_detail_perubahan(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }
  $post = $this->input->post();
  $id_izin=$this->security->xss_clean(trim($post['id_izin']));
  $record=$this->Bu_model->token_api_siki();
  $token=$record[0]['token'];
  $url = "https://siki.pu.go.id/siki-api/v1/permohonan-perubahan-sbu/".$id_izin;

  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
  curl_setopt($curl, CURLOPT_HEADER, false);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  //curl_setopt($curl, CURLOPT_POSTFIELDS, $data);post
  curl_setopt($curl, CURLOPT_HTTPHEADER,array(
    "Content-type: application/json",
    "token: $token"
  ));
  $json_response = curl_exec($curl);
  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  $responses = json_decode($json_response, true);
  curl_close($curl);
  if ( $status != 200) {
      die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
      $response = array(
                      'result'=>2,


                    );

  }else{

    if(!empty($responses['permohonan_registrasi'])){

      foreach($responses['permohonan_registrasi'] as $row_registrasi){
        $sub_klasifikasix=$row_registrasi['id_sub_klasifikasi'];
      }
    }else{
      $sub_klasifikasix="-";
    }
    $tgl_permohonan=date("Y-m-d");
    $this->Bu_model->insert_permohonan_perubahan($tgl_permohonan,$id_izin);

    if(!empty($responses['badan_usaha'])){

      $responses_administrasi=$responses['badan_usaha'];
      $bentuk_usaha=$responses_administrasi['bentuk_badan_usaha'];
      $id_propinsi=$responses_administrasi['id_provinsi'];
      $id_kabupaten=$responses_administrasi['id_kabupaten_kota'];
      $jabatan_pimpinan=$responses_administrasi['jabatan_pimpinan'];
      if($responses_administrasi['jenis_badan_usaha']==''){
        $klas_jenis='1';
      }else{
          $klas_jenis=$responses_administrasi['jenis_badan_usaha'];
      }
      $jenis_badan_usaha=$klas_jenis;
      $nama=str_replace("'", '', $responses_administrasi['nama_badan_usaha']);

      $map=$responses_administrasi['map'];
      $email_pic=$responses_administrasi['creator'];
      $nib=$responses_administrasi['nib'];


      $nama_pimpinan=$responses_administrasi['nama_pimpinan'];
      $minisite_name=$responses_administrasi['minisite_name'];
      $alamat=str_replace("'", '', $responses_administrasi['alamat_badan_usaha']);
      $kodepos=$responses_administrasi['kode_pos_badan_usaha'];
      $telepon=$responses_administrasi['telepon_badan_usaha'];
      $hp=$responses_administrasi['hp_badan_usaha'];
      $fax=$responses_administrasi['faksimili_badan_usaha'];
      $email=$responses_administrasi['email_badan_usaha'];
      $web=$responses_administrasi['website_badan_usaha'];
      $updated_izin=$responses_administrasi['updated'];
      $tgl_didirikan=$responses_administrasi['tgl_didirikan'];
      $rekening=$responses_administrasi['rekening_badan_usaha'];
      $jenis_usaha=$responses_administrasi['jenis_usaha'];
      $npwp=$responses_administrasi['npwp_badan_usaha'];
      $file_nib=$responses_administrasi['file_nib'];
      $file_npwp=$responses_administrasi['file_npwp'];
      $sptjm=$responses_administrasi['sptjm'];
      $created=$responses_administrasi['created'];
      $creator=$responses_administrasi['creator'];
      $updated=$responses_administrasi['updated'];
      $select="REPLACE INTO lsbu_bu_izin_perubahan (
        id_izin,
        NIB,
        sub_klasifikasi,
        id_propinsi,
        id_kabupaten,
        nama,
        klasifikasi_jenis_usaha,
        bentuk_usaha,
        jenis_usaha,
        nama_pimpinan,
        jabatan_pimpinan,
        map,
        minisite_name,
        tgl_didirikan,
        rekening,
        alamat_bu,
        kodepos,
        telepon,
        hp,
        fax,
        email,
        email_pic,
        web,
        npwp,
        sptjm,
        file_nib,
        file_npwp,
        created,
        creator,
        updated)
      VALUES (
        '$id_izin',
        '$nib',
        '$sub_klasifikasix',
        '$id_propinsi',
        '$id_kabupaten',
        '$nama',
        '$jenis_badan_usaha',
        '$bentuk_usaha',
        '$jenis_usaha',
        '$nama_pimpinan',
        '$jabatan_pimpinan',
        '$map',
        '$minisite_name',
        '$tgl_didirikan',
        '$rekening',
        '$alamat',
        '$kodepos',
        '$telepon',
        '$hp',
        '$fax',
        '$email',
        '$email_pic',
        '$web',
        '$npwp',
        '$sptjm',
        '$file_nib',
        '$file_npwp',
        '$created',
        '$creator',
        '$updated'

      )";
      $where="";
      $this->Bu_model->delete_opr($select,$where);
    }

    if(!empty($responses['neraca'])){
      foreach($responses['neraca'] as $row_neraca){
        $tahun=$row_neraca['tahun'];
        $aset_lain_lain=$row_neraca['aset_lain_lain'];
        $aset_lancar=$row_neraca['aset_lancar'];
        $aset_tdk_lancar=$row_neraca['aset_tdk_lancar'];
        $kewajiban_lancar=$row_neraca['kewajiban_lancar'];
        $kewajiban_tdk_lancar=$row_neraca['kewajiban_tdk_lancar'];
        $total_aset=$row_neraca['total_aset'];
        $total_modal=$row_neraca['total_modal'];
        $totalekuitas=$row_neraca['totalekuitas'];
        $totalkewajiban=$row_neraca['totalkewajiban'];
        $totalkewajiban_ekuitas=$row_neraca['total_kewajiban_ekuitas'];
        $file_doc_a=$row_neraca['file_doc_a'];
        $file_doc_b=$row_neraca['file_doc_b'];
        $created=$row_neraca['created'];
        $creator=$row_neraca['creator'];
        $updated=$row_neraca['updated'];

        $select_neraca="REPLACE INTO lsbu_keuangan_neraca_2_izin_perubahan(
          id_izin,
          NIB,
          Tahun,
          sub_klasifikasi,
          aktiva_lancar,
          aktiva_tdk_lancar,
          aktiva_lain_lain,
          total_aset,
          kewajiban_lancar,
          kewajiban_tdk_lancar,
          total_kewajiban_ekuitas,
          total_modal,
          total_kewajiban,
          total_ekuitas,
          persyaratan_doc1,
          persyaratan_doc2,
          created,
          creator,
          updated)
          VALUES (
            '$id_izin',
            '$nib',
            '$tahun',
            '$sub_klasifikasix',
            '$aset_lancar',
            '$aset_tdk_lancar',
            '$aset_lain_lain',
            '$total_aset',
            '$kewajiban_lancar',
            '$kewajiban_tdk_lancar',
            '$totalkewajiban_ekuitas',
            '$total_modal',
            '$totalkewajiban',
            '$totalekuitas',
            '$file_doc_a',
            '$file_doc_b',
            '$created',
            '$creator',
            '$updated'
          )";
          $where="";
          $this->Bu_model->delete_opr($select_neraca,$where);
      }
    }

    if(!empty($responses['permohonan_registrasi'])){

      foreach($responses['permohonan_registrasi'] as $row_registrasi){
        $sub_klasifikasi=$row_registrasi['id_sub_klasifikasi'];
        //$this->Bu_model->update_perbaikan2($nib,$sub_klasifikasi);


        $asosiasi=$row_registrasi['asosiasi'];
        $id_klasifikasi=$row_registrasi['id_klasifikasi'];
        $id_sub_klasifikasi=$row_registrasi['id_sub_klasifikasi'];
        $kualifikasi=$row_registrasi['kualifikasi'];
        $nomor_kbli=$row_registrasi['nomor_kbli'];
        $jenis_usaha=$row_registrasi['jenis_usaha'];
        $sifat_usaha=$row_registrasi['sifat_usaha'];
        $user_email=preg_replace("/'/", '', $row_registrasi['user_email']);
        $user_hp=$row_registrasi['user_hp'];
        $user_name=preg_replace("/'/", '', $row_registrasi['user_name']);

        $updated=$row_registrasi['updated'];
        $creator=$row_registrasi['creator'];
        $created=$row_registrasi['created'];



        $select_registrasi="INSERT IGNORE INTO lsbu_registrasi_izin_perubahan(
          NIB,
          id_klasifikasi,
          id_sub_klasifikasi,
          kualifikasi,
          asosiasi,
          user_pemohon,
          tgl_permohonan,
          nomor_kbli,
          jenis_usaha,
          sifat_badanusaha,
          id_izin,
          user_email,
          user_hp,
          created,
          creator,
          updated
        )
          VALUES (
            '$nib',
            '$id_klasifikasi',
            '$id_sub_klasifikasi',
            '$kualifikasi',
            '$asosiasi',
            '$user_name',
            '$tgl_permohonan',
            '$nomor_kbli',
            '$jenis_usaha',
            '$sifat_usaha',
            '$id_izin',
            '$user_email',
            '$user_hp',
            '$created',
            '$creator',
            '$updated'
          )";
          $where="";
          $this->Bu_model->delete_opr($select_registrasi,$where);
          //$this->Bu_model->insert_permohonan_perubahan($nib,$tgl_permohonan,$id_propinsi,$id_izin);


      }
    }


    if(!empty($responses['pemegang_saham'])){

      foreach($responses['pemegang_saham'] as $row_saham){
        $txt=$row_saham['alamat'];
        $alamat2=preg_replace("/'/", '', $txt);
        $alamat=preg_replace("/", '', $alamat2);
        $id_kabupaten_kota=$row_saham['id_kabupaten_kota'];
        $id_provinsi=$row_saham['id_provinsi'];
        $jenis_saham=$row_saham['jenis_saham'];
        $jumlah_saham=$row_saham['jumlah_saham'];
        $modal_dasar=$row_saham['modal_dasar'];
        $modal_disetor=$row_saham['modal_disetor'];
        $namax=$row_saham['nama'];
        $nama=preg_replace("/'/", '', $namax);
        $nilaisatuan_saham=$row_saham['nilaisatuan_saham'];
        $no_akte=$row_saham['no_akte'];
        $no_ktp=$row_saham['no_ktp'];
        $npwp=$row_saham['npwp'];
        $file_doc=$row_saham['file_doc'];
        $file_ktp=$row_saham['file_ktp'];
        $file_npwp=$row_saham['file_npwp'];
        $created=$row_saham['created'];
        $creator=$row_saham['creator'];
        $updated=$row_saham['updated'];
        $select_saham="REPLACE INTO lsbu_keuangan_saham_izin_perubahan(
          id_izin,
          NIB,
          nama_pemilik,
          no_ktp,
          alamat,
          id_propinsi,
          id_kabupaten,
          jenis_saham,
          jumlah_lembar,
          nilai_perlembar,
          modal_dasar,
          modal_disetor,
          no_akte,
          npwp,
          persyaratan_doc,
          persyaratan_ktp,
          persyaratan_npwp,
          created,
          creator,
          updated)
          VALUES(
            '$id_izin',
            '$nib',
            '$nama',
            '$no_ktp',
            '$alamat',
            '$id_provinsi',
            '$id_kabupaten_kota',
            '$jenis_saham',
            '$jumlah_saham',
            '$nilaisatuan_saham',
            '$modal_dasar',
            '$modal_disetor',
            '$no_akte',
            '$npwp',
            '$file_doc',
            '$file_ktp',
            '$file_npwp',
            '$created',
            '$creator',
            '$updated'
          )";
          $where="";
          $this->Bu_model->delete_opr($select_saham,$where);
      }
    }
    if(!empty($responses['pengurus'])){

      foreach($responses['pengurus'] as $row_pengurus){
        $txt=$row_pengurus['alamat'];
        $alamat2=preg_replace("/'/", '', $txt);
        $alamat=preg_replace("/", '', $alamat2);

        $bukan_asn=$row_pengurus['bukan_asn'];
        $email=$row_pengurus['email'];
        $hp_a=$row_pengurus['hp_a'];
        $hp_b=$row_pengurus['hp_b'];
        $jabatan=$row_pengurus['jabatan'];
        $namax=$row_pengurus['nama'];
        $nama=preg_replace("/'/", '', $namax);
        $no_akte=$row_pengurus['no_akte'];
        $noktp=$row_pengurus['noktp'];
        $pjbu=$row_pengurus['pjbu'];
        $tgllahir=$row_pengurus['tgllahir'];
        $npwp=$row_pengurus['npwp'];
        $foto=$row_pengurus['foto'];
        $ktp_img=$row_pengurus['ktp_img'];
        $npwp_img=$row_pengurus['npwp_img'];
        $loa=$row_pengurus['letter_of_appointment'];
        $created=$row_pengurus['created'];
        $creator=$row_pengurus['creator'];
        $updated=$row_pengurus['updated'];
        $select_pengurus="REPLACE INTO lsbu_pengurus_izin_perubahan(
          id_izin,
          no_ktp,
          NIB,
          nama,
          alamat,
          email,
          hp_a,
          hp_b,
          jabatan_bu,
          pjbu,
          tgl_lahir,
          no_akte,
          bukan_asn,
          npwp,
          persyaratan_foto,
          persyaratan_ktp_img,
          persyaratan_npwp_img,
          persyaratan_loa,
          created,
          creator,
          updated)
          VALUES (
          '$id_izin',
          '$noktp',
          '$nib',
          '$nama',
          '$alamat',
          '$email',
          '$hp_a',
          '$hp_b',
          '$jabatan',
          '$pjbu',
          '$tgllahir',
          '$no_akte',
          '$bukan_asn',
          '$npwp',
          '$foto',
          '$ktp_img',
          '$npwp_img',
          '$loa',
          '$created',
          '$creator',
          '$updated'
        )";
        $where="";
        $this->Bu_model->delete_opr($select_pengurus,$where);

      }
    }

    if(!empty($responses['penjualan_tahunan'])){
      foreach($responses['penjualan_tahunan'] as $row_pengalaman){

        $nomor_kontrak=$row_pengalaman['no_kontrak'];
        $nama_pengalaman=preg_replace("/'/", '', $row_pengalaman['nama_proyek']);
        $nilai_kontrak=$row_pengalaman['nilai_proyek'];

        $email_instansi=$row_pengalaman['email_instansi_pemberi_tugas'];
        $jabatan_pemberi_tugas=$row_pengalaman['jabatan_pemberi_tugas'];
        $lokasi_pekerjaan=$row_pengalaman['lokasi_pekerjaan'];

        $nama_instansi_pemberi_tugas=preg_replace("/'/", '', $row_pengalaman['nama_instansi_pemberi_tugas']);
        $nama_pemberi_tugas=preg_replace("/'/", '', $row_pengalaman['nama_pemberi_tugas']);

        $nilai_kontrak_adendum=$row_pengalaman['nilai_kontrak_adendum'];
        $nilai_kontrak_sesuai_porsi=$row_pengalaman['nilai_kontrak_sesuai_porsi'];
        $no_telp_instansi_pemberi_tugas=$row_pengalaman['no_telp_instansi_pemberi_tugas'];
        $nomor_registrasi_pengalaman=$row_pengalaman['nomor_registrasi_pengalaman'];
        $pemberi_tugas=$row_pengalaman['pemberi_tugas'];
        $presentase_porsi=$row_pengalaman['presentase_porsi'];
        $status_kso=$row_pengalaman['status_kso'];
        $sumber_dana=$row_pengalaman['sumber_dana'];
        $tgl_bast=$row_pengalaman['tgl_bast'];


        $no_bast=$row_pengalaman['no_bast'];
        $no_nkpk=$row_pengalaman['no_nkpk'];
        $pemilik_proyek=$row_pengalaman['pemilik_proyek'];
        $spesifik_pekerjaan=$row_pengalaman['spesifik_pekerjaan'];
        $sub_klasifikasi=$row_pengalaman['sub_klasifikasi'];
        $tahun=$row_pengalaman['tahun'];
        $tgl_kontrak=$row_pengalaman['tgl_kontrak'];
        $tgl_mulai=$row_pengalaman['tgl_mulai'];
        $tgl_selesai=$row_pengalaman['tgl_selesai'];
        $doc_1=$row_pengalaman['file_doc_a'];
        $doc_2=$row_pengalaman['file_doc_b'];

        $file_bash=$row_pengalaman['file_bast'];
        $file_boq_rab_mpu=$row_pengalaman['file_boq_rab_mpu'];
        $file_kontrak_dengan_pemberi_tugas=$row_pengalaman['file_kontrak_dengan_pemberi_tugas'];

        $created=$row_pengalaman['created'];
        $creator=$row_pengalaman['creator'];
        $updated=$row_pengalaman['updated'];
        $select_pengalaman="REPLACE INTO lsbu_pengalaman_izin_perubahan(
          NIB,
          nomor_kontrak,
          id_izin,
          nama_pengalaman,
          nilai_kontrak,
          email_instansi,
          jabatan_pemberi_tugas,
          lokasi_pekerjaan,
          nama_instansi_pemberi_tugas,
          nama_pemberi_tugas,
          nilai_kontrak_adendum,
          nilai_kontrak_sesuai_porsi,
          no_telp_instansi_pemberi_tugas,
          nomor_registrasi_pengalaman,
          pemberi_tugas,
          presentase_porsi,
          status_kso,
          sumber_dana,

          id_sub_klasifikasi,
          no_bash,
          no_nkpk,
          pemilik_proyek,
          spesifik_pekerjaan,
          tahun,
          tgl_bast,
          tgl_kontrak,
          tgl_mulai,
          tgl_selesai,
          file_doc_a,
          file_doc_b,
          file_bash,
          file_boq_rab_mpu,
          file_kontrak_dengan_pemberi_tugas,
          created,
          creator,
          updated)
          VALUES (
          '$nib',
          '$nomor_kontrak',
          '$id_izin',
          '$nama_pengalaman',
          '$nilai_kontrak',
          '$email_instansi',
          '$jabatan_pemberi_tugas',
          '$lokasi_pekerjaan',
          '$nama_instansi_pemberi_tugas',
          '$nama_pemberi_tugas',
          '$nilai_kontrak_adendum',
          '$nilai_kontrak_sesuai_porsi',
          '$no_telp_instansi_pemberi_tugas',
          '$nomor_registrasi_pengalaman',
          '$pemberi_tugas',
          '$presentase_porsi',
          '$status_kso',
          '$sumber_dana',
          '$id_sub_klasifikasi',
          '$no_bast',
          '$no_nkpk',
          '$pemilik_proyek',
          '$spesifik_pekerjaan',
          '$tahun',
          '$tgl_bast',
          '$tgl_kontrak',
          '$tgl_mulai',
          '$tgl_selesai',
          '$doc_1',
          '$doc_2',
          '$file_bash',
          '$file_boq_rab_mpu',
          '$file_kontrak_dengan_pemberi_tugas',
          '$created',
          '$creator',
          '$updated'
        )";
        $where="";
        $this->Bu_model->delete_opr($select_pengalaman,$where);
      }
    }
    if(!empty($responses['pjbu'])){
      foreach($responses['pjbu'] as $row_pjbu){
        $alamat=$row_pjbu['alamat'];
        $email=$row_pjbu['email'];
        $hp=$row_pjbu['hp'];
        $jabatan=$row_pjbu['jabatan'];

        $nama=preg_replace("/'/", '', $row_pjbu['nama']);
        $nik=$row_pjbu['nik'];
        $npwp=$row_pjbu['npwp'];
        $stk=$row_pjbu['stk'];
        $tgl_lahir=$row_pjbu['tgl_lahir'];
        $file_ktp=$row_pjbu['file_ktp'];
        $file_npwp=$row_pjbu['file_npwp'];
        $foto=$row_pjbu['foto'];
        $updated=$row_pjbu['updated'];
        $creator=$row_pjbu['creator'];
        $created=$row_pjbu['created'];
        $select_registrasi="REPLACE INTO lsbu_pjbu_izin_perubahan(
          id_izin,
          NIB,
          sub_klasifikasi,
          alamat,
          email,
          hp,
          jabatan,
          nama,
          nik,
          npwp,
          stk,
          tgl_lahir,
          file_ktp,
          file_npwp,
          foto,
          created,
          creator,
          updated
        ) VALUES(
          '$id_izin',
          '$nib',
          '$sub_klasifikasix',
          '$alamat',
          '$email',
          '$hp',
          '$jabatan',
          '$nama',
          '$nik',
          '$npwp',
          '$stk',
          '$tgl_lahir',
          '$file_ktp',
          '$file_npwp',
          '$foto',
          '$created',
          '$creator',
          '$updated'
        )";
        $where="";
        $this->Bu_model->delete_opr($select_registrasi,$where);
      }
    }
    if(!empty($responses['pjskbu'])){
      foreach($responses['pjskbu'] as $row_pjskbu){
        $id_sub_klasifikasi_pjsk=$row_pjskbu['id_sub_klasifikasi_pjsk'];
        $jenis_tenaga=$row_pjskbu['jenis_tenaga'];
        $jenjang_skk=$row_pjskbu['jenjang_skk'];
        $klasifikasi=$row_pjskbu['klasifikasi'];

        $klasifikasi_acpe_aa=$row_pjskbu['klasifikasi_acpe_aa'];
        $nomor_registrasi_acpe_aa=$row_pjskbu['nomor_registrasi_acpe_aa'];
        $klasifikasi_skk=$row_pjskbu['klasifikasi_skk'];
        $kualifikasi_skk=$row_pjskbu['kualifikasi_skk'];
        $tanggal_terbit_skk=$row_pjskbu['tanggal_terbit_skk'];



        $nama=preg_replace("/'/", '', $row_pjskbu['nama']);

        $nik=$row_pjskbu['nik'];
        $noreg_skk=preg_replace("/'/", '', $row_pjskbu['noreg_skk']);
        $npwp=$row_pjskbu['npwp'];
        $sub_klasifikasi=$row_pjskbu['sub_klasifikasi'];
        $updated=$row_pjskbu['updated'];
        $created=$row_pjskbu['created'];
        $creator=$row_pjskbu['creator'];
        $select_pjskbu="REPLACE INTO lsbu_pjskbu_izin_perubahan(
          id_izin,
          NIB,
          id_sub_klasifikasi_pjsk,
          jenis_tenaga,
          jenjang_skk,
          klasifikasi,
          klasifikasi_acpe_aa,
          nomor_registrasi_acpe_aa,
          klasifikasi_skk,
          kualifikasi_skk,
          tanggal_terbit_skk,

          nama,
          nik,
          noreg_skk,
          npwp,
          sub_klasifikasi,
          updated,
          creator,
          created)
          VALUES (
            '$id_izin',
            '$nib',
            '$sub_klasifikasix',
            '$jenis_tenaga',
            '$jenjang_skk',
            '$klasifikasi',
            '$klasifikasi_acpe_aa',
            '$nomor_registrasi_acpe_aa',
            '$klasifikasi_skk',
            '$kualifikasi_skk',
            '$tanggal_terbit_skk',
            '$nama',
            '$nik',
            '$noreg_skk',
            '$npwp',
            '$sub_klasifikasi',
            '$updated',
            '$creator',
            '$created'
          )";
          $where="";
          $this->Bu_model->delete_opr($select_pjskbu,$where);
      }
    }
    if(!empty($responses['pjtbu'])){
      foreach($responses['pjtbu'] as $row_pjtbu){
        $alamat=$row_pjtbu['alamat'];
        $jenjang_skk=$row_pjtbu['jenjang_skk'];
        $nama=preg_replace("/'/", '', $row_pjtbu['nama']);


        $klasifikasi=$row_pjtbu['klasifikasi'];
        $klasifikasi_acpe_aa=$row_pjtbu['klasifikasi_acpe_aa'];
        $kualifikasi_skk=$row_pjtbu['kualifikasi_skk'];
        $nomor_registrasi_acpe_aa=$row_pjtbu['nomor_registrasi_acpe_aa'];
        $tanggal_terbit_skk=$row_pjtbu['tanggal_terbit_skk'];

        $nik=$row_pjtbu['nik'];
        $noreg_skk=$row_pjtbu['noreg_skk'];
        $npwp=$row_pjtbu['npwp'];
        $sub_klasifikasi=$row_pjtbu['sub_klasifikasi'];
        $updated=$row_pjskbu['updated'];
        $created=$row_pjskbu['created'];
        $creator=$row_pjskbu['creator'];
        $select_pjtbu="REPLACE INTO lsbu_pjtbu_izin_perubahan(
          id_izin,
          NIB,
          sub_klasifikasi_pjtbu,
          alamat,
          jenjang_skk,
          nama,
          klasifikasi,
          klasifikasi_acpe_aa,
          klasifikasi_skk,
          kualifikasi_skk,
          nomor_registrasi_acpe_aa,
          tanggal_terbit_skk,
          nik,
          noreg_skk,
          npwp,
          sub_klasifikasi,
          updated,
          created,
          creator)
          VALUES (
            '$id_izin',
            '$nib',
            '$sub_klasifikasix',
            '$alamat',
            '$jenjang_skk',
            '$nama',
            '$klasifikasi',
            '$klasifikasi_acpe_aa',
            '$klasifikasi_skk',
            '$kualifikasi_skk',
            '$nomor_registrasi_acpe_aa',
            '$tanggal_terbit_skk',
            '$nik',
            '$noreg_skk',
            '$npwp',
            '$sub_klasifikasi',
            '$updated',
            '$created',
            '$creator'
          )";
          $where="";
          $this->Bu_model->delete_opr($select_pjtbu,$where);
      }
    }

    if(!empty($responses['smap'])){
      foreach($responses['smap'] as $smap){
        $dokumen_smap=$smap['dokumen_smap'];
        $iso_37001=$smap['iso_37001'];
        $surat_pernyataan=$smap['surat_pernyataan'];
        $file_surat_pernyataan=$smap['file_surat_pernyataan'];
        $sertifikat_iso=$smap['sertifikat_iso'];
        $created=$smap['created'];
        $creator=$smap['creator'];
        $updated=$smap['updated'];
        $select_smap="REPLACE INTO lsbu_smap_izin_perubahan(
          id_izin,
          NIB,
          sub_klasifikasi,
          nomor_sertifikat,
          surat_pernyataan,
          file_surat_pernyataan,
          persyaratan_smap,
          sertifikat_iso,
          created,
          creator,
          updated)
          VALUES(
            '$id_izin',
            '$nib',
            '$sub_klasifikasix',
            '$iso_37001',
            '$surat_pernyataan',
            '$file_surat_pernyataan',
            '$dokumen_smap',
            '$sertifikat_iso',
            '$created',
            '$creator',
            '$updated'
          )";
          $where="";
          $this->Bu_model->delete_opr($select_smap,$where);
      }
    }

    if(!empty($responses['akte'])){
      foreach($responses['akte'] as $akte){
        $no=$akte['no'];

        $no_sk=preg_replace("/'/", '', $akte['nomor_pengesahan_sk_kumham']);
        $jenis=$akte['jenis'];

        $nama_notaris=preg_replace("/'/", '', $akte['nama_notaris']);
        $alamat_notaris2=stripslashes($akte['alamat_notaris']);
        $alamat_notaris=preg_replace("/'/", '', $alamat_notaris2);

        $hargasatuan=$akte['hargasatuan'];
        $id_kabupaten_notaris=$akte['id_kabupaten_notaris'];
        $id_provinsi_notaris=$akte['id_provinsi_notaris'];
        $modaldasar=$akte['modaldasar'];
        $modalsetor=$akte['modalsetor'];
        $nilaisaham=$akte['nilaisaham'];
        $maksudtujuan=$akte['maksudtujuan'];
        $tgl_akte=$akte['tgl_akte'];
        $file_doc=$akte['file_doc'];
        $file_ktp=$akte['file_ktp'];
        $file_npwp=$akte['file_npwp'];
        $created=$akte['created'];
        $creator=$akte['creator'];
        $updated=$akte['updated'];
        $select_akte="REPLACE INTO lsbu_akte_izin_perubahan(
            id_izin,
          NIB,
          sub_klasifikasi,
          no,
          no_sk_kumham,
          jenis,
          nama_notaris,
          alamat_notaris,
          hargasatuan,
          id_kabupaten_notaris,
          id_provinsi_notaris,
          modaldasar,
          modalsetor,
          nilaisaham,
          tgl_akte,
          maksudtujuan,
          file_doc,
          file_ktp,
          file_npwp,
          created,
          creator,
          updated)
          VALUES(
            '$id_izin',
            '$nib',
            '$sub_klasifikasix',
            '$no',
            '$no_sk',
            '$jenis',
            '$nama_notaris',
            '$alamat_notaris',
            '$hargasatuan',
            '$id_kabupaten_notaris',
            '$id_provinsi_notaris',
            '$modaldasar',
            '$modalsetor',
            '$nilaisaham',
            '$tgl_akte',
            '$maksudtujuan',
            '$file_doc',
            '$file_ktp',
            '$file_npwp',
            '$created',
            '$creator',
            '$updated'
          )";
          $where="";
          $this->Bu_model->delete_opr($select_akte,$where);
      }
    }
    $response = array(
                    'results'=>$responses,
                    'badan_usaha'=>$responses['badan_usaha']['nama_badan_usaha'],

                    'result'=>1
                  );
  }


      echo json_encode($response);
}
function post_status_90_perubahan(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }
  $post = $this->input->post();
  $id_izin = $this->security->xss_clean(trim($post['id_izin']));
  $reason=$this->security->xss_clean(trim($post['comment_penolakan']));

  $record=$this->Bu_model->token_api_siki();
  $token=$record[0]['token'];
  $id_user=$this->session->userdata('id_user');
  $upload=NULL;
  if($_FILES['file_tolak']['name'])
  {
    $this->load->library('upload');
    $id_user=$this->session->userdata('id_user');
    $nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
    $config['upload_path'] = './assets/bukti/badan_usaha/bukti_penolakan';
    $config['allowed_types'] = 'pdf|jpg|jpeg|png';
    $config['overwrite'] = TRUE;
    $config['file_name'] = $nmfile;
    $this->upload->initialize($config);
    if($this->upload->do_upload('file_tolak')){
      $gbr = $this->upload->data();
      $filename=$gbr['file_name'];
      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
      $alamat="./assets/bukti/badan_usaha/bukti_penolakan/";

      $upload=$gbr['file_name'];
    }
  }

  $url = "https://siki.pu.go.id/siki-api/v1/permohonan-sbu/$id_izin";
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_HTTPHEADER,array(
    "Content-type: application/json",
    "token: $token"
  ));

  curl_setopt($curl, CURLOPT_POSTFIELDS, '{
      "kd_status":"90",
      "keterangan":"Permohonan Ditolak"
  }');

  $json_response = curl_exec($curl);
  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  if ( $status != 200) {
    //die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));

      $data=2;
	     $this->session->set_flashdata('title','Failed');
      $this->session->set_flashdata('text','Tolak Permohonan gagal dilakukan');
      $this->session->set_flashdata('class', "error");

  }else{
    $data_awal=array(
      'status'=>'90'
    );
    $where_awal=array(
      'id_izin'=>$id_izin
    );
    $table_awal="lsbu_permohonan_masuk_perubahan";
    $this->Bu_model->update_edit($where_awal,$table_awal,$data_awal);

      $this->Bu_model->delete_permohonan_izin_perubahan($id_izin);



    $data=1;
	  $this->session->set_flashdata('title','Success');
    $this->session->set_flashdata('text','Penolakan Permohonan Berhasil dilakukan');
    $this->session->set_flashdata('class', "success");
  }
  curl_close($curl);

  $response = array(
                 'status'=>$data,

               );

     echo json_encode($response);

}
function list_tinjauan_permohonan_perubahan(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->admin_pusat()){
  $data=$this->Bu_model->list_verifikasi_perubahan();
  $record=array();
  foreach ($data as $row) {
      $status="0";

      $nama="";

    $datax=array(
        'nama_tunjuk'=>$nama,
      'file_pembayaran'=>$row['file_pembayaran'],
      'id_izin'=>$row['id_izin'],
      'verifikator'=>$row['verifikator_nama'],
      'biaya'=>$row['biaya'],
      'status_0'=>$row['status_0'],
      'id_sub_klasifikasi'=>$row['id_sub_klasifikasi'],
      'id_klasifikasi'=>$row['id_klasifikasi'],
      'kualifikasi'=>$row['kualifikasi'],
      'nama'=>$row['nama'],
      'NIB'=>$row['NIB'],
      'tgl_permohonan'=>$row['tgl_permohonan'],
      'propinsi'=>$row['id_sub_klasifikasi'],
      'tahun'=>$row['tahun'],
      'status_1'=>$row['status_1'],
      'status_2'=>$row['status_2'],
      'status_3'=>$row['status_3'],
      'stat'=>$status,
    );
    array_push($record,$datax);

  }

  $this->data = array(
    'record'=>$record,

  );

  $this->template->load('menu/menu','sertifikasi/list_verifikasi_perubahan', $this->data);
}else{
  $this->session->set_flashdata('title','Warning');
  $this->session->set_flashdata('text','Anda tidak memiliki akses');
  $this->session->set_flashdata('class', "warning");
  redirect('login','refresh');
}
}
function list_cabut(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }
  $data=$this->Bu_model->list_cabut();

  $this->data = array(
    'record'=>$data,

  );
  $this->template->load('menu/menu','sertifikasi/list_pencabutan', $this->data);

}
function post_status_cabut(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }
  $post = $this->input->post();
  $nib = $this->security->xss_clean(trim($post['nib']));
  $id_izin = $this->security->xss_clean(trim($post['id_izin']));
  $reason=$this->security->xss_clean(trim($post['comment_penolakan']));

  $record=$this->Bu_model->token_api_siki();
  $token=$record[0]['token'];
  $id_user=$this->session->userdata('id_user');
  $upload=NULL;
  if($_FILES['file_tolak']['name'])
  {
    $this->load->library('upload');
    $id_user=$this->session->userdata('id_user');
    $nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
    $config['upload_path'] = './assets/bukti/badan_usaha/bukti_pembatalan';
    $config['allowed_types'] = 'pdf|jpg|jpeg|png';
    $config['overwrite'] = TRUE;
    $config['file_name'] = $nmfile;
    $this->upload->initialize($config);
    if($this->upload->do_upload('file_tolak')){
      $gbr = $this->upload->data();
      $filename=$gbr['file_name'];
      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
      $alamat="./assets/bukti/badan_usaha/bukti_penolakan/";

      $upload=$gbr['file_name'];
    }
  }
  //STATUS 70
  $url = "https://siki.pu.go.id/siki-api/v1/permohonan-sbu/$id_izin";
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_HTTPHEADER,array(
    "Content-type: application/json",
    "token: $token"
  ));

  curl_setopt($curl, CURLOPT_POSTFIELDS, '{
      "kd_status":"70",
      "keterangan":"Permohonan Dibekukan"
  }');

  $json_response = curl_exec($curl);
  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  if ( $status != 200) {
    //die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
    $data=2;
  }else{
    //curl_close($curl);
  }
  //STATUS 91

  $url = "https://siki.pu.go.id/siki-api/v1/permohonan-sbu/$id_izin";
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_HTTPHEADER,array(
    "Content-type: application/json",
    "token: $token"
  ));

  $postData = [ "kd_status" => "91",
    "keterangan" => $reason
];
  curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($postData));

  $json_response = curl_exec($curl);
  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  if ( $status != 200) {
    die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));

      $data=2;
	     $this->session->set_flashdata('title','Failed');
      $this->session->set_flashdata('text','Cabut Permohonan gagal dilakukan');
      $this->session->set_flashdata('class', "error");

  }else{
    $data_awal=array(
      'status'=>'91'
    );
    $where_awal=array(
      'id_izin'=>$id_izin
    );
    $table_awal="lsbu_permohonan_masuk";
    $this->Bu_model->update_edit($where_awal,$table_awal,$data_awal);
    $this->Bu_model->delete_pengalaman($nib,$id_izin);
    $this->Bu_model->delete_peralatan($nib,$id_izin);
    $select = "INSERT IGNORE INTO lsbu_registrasi_hapus(NIB,id_klasifikasi,id_sub_klasifikasi,kualifikasi,asosiasi,user_pemohon,id_permohonan,tgl_permohonan,nomor_kbli,sifat_badanusaha,user_email,user_hp,created,creator,updated,Log,user_hapus) SELECT NIB,id_klasifikasi,id_sub_klasifikasi,kualifikasi,asosiasi,user_pemohon,id_permohonan,tgl_permohonan,nomor_kbli,sifat_badanusaha,user_email,user_hp,created,creator,updated,Log,'$id_user' FROM lsbu_registrasi";
    $where = "WHERE NIB='$nib' AND id_izin='$id_izin'";

    $insert=$this->Bu_model->delete_opr($select,$where);
    $record=$this->Bu_model->get_permohonan_masuk_2_nib_izin($nib,$id_izin);


    $bu=$this->Bu_model->biodata_opr($nib);
    $email=$bu[0]['email_pic'];
    $subject="Pencabutan SBU";
    $pre_header="Pencabutan SBU";
    //$this->send($email,$subject,$reason,$pre_header);
    $this->Bu_model->delete_permohonan_izin($nib,$id_izin);



    $data=1;
	  $this->session->set_flashdata('title','Success');
    $this->session->set_flashdata('text','Pencabutan SBU Berhasil dilakukan');
    $this->session->set_flashdata('class', "success");
  }
  curl_close($curl);

  $response = array(
                 'status'=>$data,

               );

     echo json_encode($response);

}
function post_status_92(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }
  $post = $this->input->post();
  $nib = $this->security->xss_clean(trim($post['nib']));
  $id_izin = $this->security->xss_clean(trim($post['id_izin']));
  $reason=$this->security->xss_clean(trim($post['comment_penolakan']));

  $record=$this->Bu_model->token_api_siki();
  $token=$record[0]['token'];
  $id_user=$this->session->userdata('id_user');
  $upload=NULL;
  if($_FILES['file_tolak']['name'])
  {
    $this->load->library('upload');
    $id_user=$this->session->userdata('id_user');
    $nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
    $config['upload_path'] = './assets/bukti/badan_usaha/bukti_pembatalan';
    $config['allowed_types'] = 'pdf|jpg|jpeg|png';
    $config['overwrite'] = TRUE;
    $config['file_name'] = $nmfile;
    $this->upload->initialize($config);
    if($this->upload->do_upload('file_tolak')){
      $gbr = $this->upload->data();
      $filename=$gbr['file_name'];
      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
      $alamat="./assets/bukti/badan_usaha/bukti_penolakan/";

      $upload=$gbr['file_name'];
    }
  }

  $url = "https://siki.pu.go.id/siki-api/v1/permohonan-sbu/$id_izin";
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_HTTPHEADER,array(
    "Content-type: application/json",
    "token: $token"
  ));

  $postData = [ "kd_status" => "92",
    "keterangan" => $reason
];
  curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($postData));

  $json_response = curl_exec($curl);
  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  if ( $status != 200) {
    die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));

      $data=2;
	     $this->session->set_flashdata('title','Failed');
      $this->session->set_flashdata('text','Tolak Permohonan gagal dilakukan');
      $this->session->set_flashdata('class', "error");

  }else{
    $data_awal=array(
      'status'=>'92'
    );
    $where_awal=array(
      'id_izin'=>$id_izin
    );
    $table_awal="lsbu_permohonan_masuk";
    $this->Bu_model->update_edit($where_awal,$table_awal,$data_awal);
    $this->Bu_model->delete_pengalaman($nib,$id_izin);
    $this->Bu_model->delete_peralatan($nib,$id_izin);
    $select = "INSERT IGNORE INTO lsbu_registrasi_hapus(NIB,id_klasifikasi,id_sub_klasifikasi,kualifikasi,asosiasi,user_pemohon,id_permohonan,tgl_permohonan,nomor_kbli,sifat_badanusaha,user_email,user_hp,created,creator,updated,Log,user_hapus) SELECT NIB,id_klasifikasi,id_sub_klasifikasi,kualifikasi,asosiasi,user_pemohon,id_permohonan,tgl_permohonan,nomor_kbli,sifat_badanusaha,user_email,user_hp,created,creator,updated,Log,'$id_user' FROM lsbu_registrasi";
    $where = "WHERE NIB='$nib' AND id_izin='$id_izin'";

    $insert=$this->Bu_model->delete_opr($select,$where);
    $record=$this->Bu_model->get_permohonan_masuk_2_nib_izin($nib,$id_izin);


    $bu=$this->Bu_model->biodata_opr($nib);
    $email=$bu[0]['email_pic'];
    $subject="Pembatalan Permohonan";
    $pre_header="Permohonan Dibatalkan";
    //$this->send($email,$subject,$reason,$pre_header);
    $this->Bu_model->delete_permohonan_izin($nib,$id_izin);



    $data=1;
	  $this->session->set_flashdata('title','Success');
    $this->session->set_flashdata('text','Pembatalan Permohonan Berhasil dilakukan');
    $this->session->set_flashdata('class', "success");
  }
  curl_close($curl);

  $response = array(
                 'status'=>$data,

               );

     echo json_encode($response);

}
function list_pembatalan(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }

  $this->data = array(
    'record'=>$this->Bu_model->list_pembatalan()

  );
  // print_r($this->data);
  $this->template->load('menu/menu','sertifikasi/list_pembatalan', $this->data);

}
function get_file_sbu(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }
  $post = $this->input->post();
  $nib=$this->security->xss_clean(trim($post['nib']));
  $tgl_permohonan=$this->security->xss_clean(trim($post['tgl_permohonan']));
  $recordx=$this->Bu_model->token_api_siki();
  $token=$recordx[0]['token'];
  $record=$this->Bu_model->get_permohonan_masuk_sub($nib,$tgl_permohonan);
  $data_get=array();
  foreach($record as $row){
   $id_izin=$row['id_izin'];
   $sub_klas=$row['id_sub_klasifikasi'];
   $url = "https://siki.pu.go.id/siki-api/v1/file-izin/".$id_izin;
   $curl = curl_init($url);
   curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
   curl_setopt($curl, CURLOPT_HEADER, false);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   //curl_setopt($curl, CURLOPT_POSTFIELDS, $data);post
   curl_setopt($curl, CURLOPT_HTTPHEADER,array(
     "Content-type: application/json",
     "token: $token"
   ));
   $json_response = curl_exec($curl);
   $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
   $responses = json_decode($json_response, true);
   curl_close($curl);
   if ( $status != 200) {

   }else{
     $data_x=array(
       'id_izin'=>$id_izin,
       'sub_klas'=>$sub_klas,
       'responses'=>$responses,

     );
     array_push($data_get,$data_x);
   }
  }
  echo json_encode($data_get);

}
function download_sbu($file){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }
  $record=$this->Bu_model->token_api_siki();
  $token=$record[0]['token'];
  $url = "https://siki.pu.go.id/siki-api/v1/file-izin/download/".$file;

  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
  curl_setopt($curl, CURLOPT_HEADER, false);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  //curl_setopt($curl, CURLOPT_POSTFIELDS, $data);post
  curl_setopt($curl, CURLOPT_HTTPHEADER,array(
    "Content-type: application/pdf",
    "token: $token"
  ));
  $json_response = curl_exec($curl);
  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  $responses = json_decode($json_response, true);
  curl_close($curl);
  if ( $status != 200) {
      die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
      $response = array(
                      'result'=>2,


                    );

  }else{
    $response = array(
                    'result'=>1,
                    'responses_data'=>$responses

                  );
  }
  header('Content-type: application/pdf');
        echo $json_response;
}
function pengembalian_berkas_permohonan(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){

  $post = $this->input->post();
  $nib_dec=$this->security->xss_clean(trim($post['nib']));
  $tgl_dec=$this->security->xss_clean(trim($post['tgl_permohonan']));
  $nib=decrypt_url($nib);
  $tgl_permohonan=decrypt_url($tgl_dec);
  $reason="Permohonan Sertifikasi dengan NIB : ".$nib." Dikembalikan untuk diperbaiki oleh pemohon, adapun detail kekurangannya sebagai berikut : <br><br>1. PJTBU sudah dipakai BUJK lain mohon untuk diganti";


  $upload=NULL;

  $select = "INSERT IGNORE INTO lsbu_registrasi_history_hapus(NIB,tgl_permohonan,propinsi,tahun,status_0,status_1,status_2,status_3,user_status_1,user_status_2,user_status_3,file_pembayaran,file_perjanjian,tgl_penghapusan,reason,bukti_hapus) SELECT NIB,tgl_permohonan,propinsi,tahun,status_0,status_1,status_2,status_3,user_status_1,user_status_2,user_status_3,file_pembayaran,file_perjanjian,now(),'$reason','$upload' FROM lsbu_registrasi_history";
  $where = "WHERE NIB='$nib' AND tgl_permohonan='$tgl_permohonan'";
  $insert=$this->Bu_model->delete_opr($select,$where);

  $select = "INSERT IGNORE INTO lsbu_registrasi_hapus(NIB,id_klasifikasi,id_sub_klasifikasi,kualifikasi,asosiasi,user_pemohon,id_permohonan,tgl_permohonan,nomor_kbli,sifat_badanusaha,user_email,user_hp,created,creator,updated,Log) SELECT NIB,id_klasifikasi,id_sub_klasifikasi,kualifikasi,asosiasi,user_pemohon,id_permohonan,tgl_permohonan,nomor_kbli,sifat_badanusaha,user_email,user_hp,created,creator,updated,Log FROM lsbu_registrasi";
  $where = "WHERE NIB='$nib' AND tgl_permohonan='$tgl_permohonan'";
  $insert=$this->Bu_model->delete_opr($select,$where);

  $select = "INSERT IGNORE INTO lsbu_ceklis_hapus(NIB,tgl_permohonan,status,id,ceklis,comment,Log) SELECT NIB,tgl_permohonan,status,id,ceklis,comment,Log FROM lsbu_ceklis";
  $where = "WHERE NIB='$nib' AND tgl_permohonan='$tgl_permohonan'";
  $insert=$this->Bu_model->delete_opr($select,$where);

  $select2 = "INSERT IGNORE INTO lsbu_asesor_penilaian_hapus(NIB,tgl_permohonan,id_sub_klasifikasi,id_asesor,id_klasifikasi,id_sub_klasifikasi,kualifikasi,hasil_akhir,pemutus,kd,comment,tgl_penilaian,tgl_hapus,reason,bukti_hapus) SELECT NIB,tgl_permohonan,id_sub_klasifikasi,id_asesor,id_klasifikasi,id_sub_klasifikasi,kualifikasi,hasil_akhir,pemutus,kd,comment,tgl_penilaian,now(),'$reason','$upload' FROM lsbu_asesor_penilaian";
  $where2 = "WHERE NIB='$nib' AND tgl_permohonan='$tgl_permohonan'";
  //$insert2=$this->Bu_model->delete_opr($select2,$where2);

  $select3 = "INSERT IGNORE INTO lsbu_ceklis_asesor_hapus(NIB,tgl_permohonan,id_sub_klasifikasi,id_asesor,id,ceklis,comment,Log,tgl_hapus,reason,bukti_hapus) SELECT NIB,tgl_permohonan,id_sub_klasifikasi,id_asesor,id,ceklis,comment,Log,now(),'$reason','$upload' FROM lsbu_ceklis_asesor";
  $where3 = "WHERE NIB='$nib' AND tgl_permohonan='$tgl_permohonan'";
  //$insert3=$this->Bu_model->delete_opr($select3,$where3);

  $select4 = "INSERT IGNORE INTO lsbu_asesor_penunjukan_hapus(NIB,id_asesor,tgl_permohonan,status,username,tglupdate,tgl_hapus,reason,bukti_hapus) SELECT NIB,id_asesor,tgl_permohonan,status,username,tglupdate,now(),'$reason','$upload' FROM lsbu_asesor_penunjukan";
  $where4 = "WHERE NIB='$nib' AND tgl_permohonan='$tgl_permohonan'";
  //$insert4=$this->Bu_model->delete_opr($select4,$where4);

  $nib_dec=encrypt_url($nib);
  $tgl_permohonan_dec=encrypt_url($tgl_permohonan);
  $record=$this->Bu_model->klasifikasi_kualifikasi_opr($nib,$tgl_permohonan);
  $email=$record[0]['user_email'];
  $subject="Perbaikan data";
  $pre_header="Data perlu diperbaiki";
  $send=$this->send($email,$subject,$reason,$pre_header);
  if($send=="Success"){
    $this->post_status_11($nib_dec,$tgl_permohonan_dec,$reason);
        $this->Bu_model->delete_permohonan($nib,$tgl_permohonan);
        $this->Bu_model->delete_permohonan_registrasi($nib,$tgl_permohonan);

        $this->Bu_model->delete_ceklis($nib,$tgl_permohonan);
        $this->Bu_model->update_perbaikan($nib,$sub_klasifikasi);

        $this->session->set_flashdata('title','Success');
        $this->session->set_flashdata('text','Permohonan berhasil ditolak');
        $this->session->set_flashdata('class', "success");
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('result' => 1)));
        //redirect('sertifikasi/list_tinjauan_permohonan','refresh');
        //$this->Bu_model->delete_penilaian($nib,$tgl_permohonan);
        //$this->Bu_model->delete_ceklis_penilaian($nib,$tgl_permohonan);
        //$this->Bu_model->delete_penunjukan($nib,$tgl_permohonan);
  }



}
}
function pengembalian_berkas_izin(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }
  $post = $this->input->post();
  $id_izin=$this->security->xss_clean(trim($post['id_izin']));
  $record=$this->Bu_model->token_api_siki();
  $token=$record[0]['token'];
  $record=$this->Bu_model->get_permohonan_masuk_3($id_izin);
  $nib=$record[0]['nib'];
  $sub_klasifikasi=$record[0]['id_sub_klasifikasi'];
  $tgl_permohonan=$record[0]['tgl_permohonan'];
  $data_awal=array(
    'status'=>'11',
    'id_sub_klasifikasi'=>NULL,
    'tgl_permohonan'=>NULL
  );
  $where_awal=array(
    'id_izin'=>$id_izin
  );
  $table_awal="lsbu_permohonan_masuk";

  $this->Bu_model->update_edit($where_awal,$table_awal,$data_awal);
  $record2=$this->Bu_model->get_permohonan_masuk_2($nib,$tgl_permohonan);

  if(count($record2)==1){
    $statux="TRUE";
    $id_user=$this->session->userdata('id_user');
    $reason="PJSK BELUM SESUAI";
    $select = "INSERT IGNORE INTO lsbu_registrasi_history_hapus(NIB,tgl_permohonan,propinsi,tahun,status_0,status_1,status_2,status_3,user_status_1,user_status_2,user_status_3,file_pembayaran,file_perjanjian,tgl_penghapusan,reason,bukti_hapus,user_hapus) SELECT NIB,tgl_permohonan,propinsi,tahun,status_0,status_1,status_2,status_3,user_status_1,user_status_2,user_status_3,file_pembayaran,file_perjanjian,now(),'$reason','','$id_user' FROM lsbu_registrasi_history";
    $where = "WHERE NIB='$nib' AND tgl_permohonan='$tgl_permohonan'";
    $insert=$this->Bu_model->delete_opr($select,$where);
    $this->Bu_model->delete_permohonan_izin2($id_izin);
    $this->Bu_model->delete_permohonan($nib,$tgl_permohonan);
  }else{
    $statux="FALSE";
    $this->Bu_model->delete_permohonan_izin2($id_izin);
  }
  //$get=$this->Bu_model->get_email($id_izin);
  //$email=$get[0]['user_email'];
  $email="yagihagiyansyah99@gmail.com";
  $subject="Perbaikan data";
  $pre_header="Data perlu diperbaiki";
  $reason="Permohonan Sertifikasi dengan NIB : ".$nib." Dikembalikan untuk diperbaiki oleh pemohon, adapun detail kekurangannya sebagai berikut : <br><br>1. PJSK untuk Sub Klasifikasi ".$sub_klasifikasi." sudah dipakai BUJK lain mohon untuk diganti";
  $this->send($email,$subject,$reason,$pre_header);
  // $id_izin=$row['id_izin'];
  // $this->Bu_model->delete_pengalaman2($id_izin);
  // $this->Bu_model->delete_peralatan2($nib,$id_izin);
  // $url = "https://siki.pu.go.id/siki-api/v1/permohonan-sbu/$id_izin";
  // $curl = curl_init($url);
  // curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
  // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
  // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
  // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  // curl_setopt($curl, CURLOPT_HTTPHEADER,array(
  //   "Content-type: application/json",
  //   "token: $token"
  // ));
  //
  // $postData = [ "kd_status" => "11",
  //   "keterangan" => $ket
  // ];
  // curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($postData));
  //
  // $json_response = curl_exec($curl);
  // $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  // if ( $status != 200) {
  //   //die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
  //   $data="Failed";
  // }else{
  //   $data="Success";
  // }
  // curl_close($curl);

  $recponses=array(
    'record'=>"Success",
    'status'=>$statux
  );
  echo json_encode($recponses);
}
function post_status_90(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }
  $post = $this->input->post();
  $nib = $this->security->xss_clean(trim($post['nib']));
  $tgl_permohonan = $this->security->xss_clean(trim($post['tgl_permohonan']));
  $id_izin = $this->security->xss_clean(trim($post['id_izin']));
  $reason=$this->security->xss_clean(trim($post['comment_penolakan']));

  $record=$this->Bu_model->token_api_siki();
  $token=$record[0]['token'];
  $id_user=$this->session->userdata('id_user');
  $upload=NULL;
  if($_FILES['file_tolak']['name'])
  {
    $this->load->library('upload');
    $id_user=$this->session->userdata('id_user');
    $nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
    $config['upload_path'] = './assets/bukti/badan_usaha/bukti_penolakan';
    $config['allowed_types'] = 'pdf|jpg|jpeg|png';
    $config['overwrite'] = TRUE;
    $config['file_name'] = $nmfile;
    $this->upload->initialize($config);
    if($this->upload->do_upload('file_tolak')){
      $gbr = $this->upload->data();
      $filename=$gbr['file_name'];
      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
      $alamat="./assets/bukti/badan_usaha/bukti_penolakan/";

      $upload=$gbr['file_name'];
    }
  }

  $url = "https://siki.pu.go.id/siki-api/v1/permohonan-sbu/$id_izin";
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_HTTPHEADER,array(
    "Content-type: application/json",
    "token: $token"
  ));

  curl_setopt($curl, CURLOPT_POSTFIELDS, '{
      "kd_status":"90",
      "keterangan":"Permohonan Ditolak"
  }');

  $json_response = curl_exec($curl);
  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  if ( $status != 200) {
    //die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));

      $data=2;
	$this->session->set_flashdata('title','Failed');
      $this->session->set_flashdata('text','Tolak Permohonan gagal dilakukan');
      $this->session->set_flashdata('class', "error");

  }else{
    $data_awal=array(
      'status'=>'90'
    );
    $where_awal=array(
      'id_izin'=>$id_izin
    );
    $table_awal="lsbu_permohonan_masuk";
    $this->Bu_model->update_edit($where_awal,$table_awal,$data_awal);
    $this->Bu_model->delete_pengalaman($nib,$id_izin);
    $this->Bu_model->delete_peralatan($nib,$id_izin);
    $select = "INSERT IGNORE INTO lsbu_registrasi_hapus(NIB,id_klasifikasi,id_sub_klasifikasi,kualifikasi,asosiasi,user_pemohon,id_permohonan,tgl_permohonan,nomor_kbli,sifat_badanusaha,user_email,user_hp,created,creator,updated,Log,user_hapus) SELECT NIB,id_klasifikasi,id_sub_klasifikasi,kualifikasi,asosiasi,user_pemohon,id_permohonan,tgl_permohonan,nomor_kbli,sifat_badanusaha,user_email,user_hp,created,creator,updated,Log,'$id_user' FROM lsbu_registrasi";
    $where = "WHERE NIB='$nib' AND id_izin='$id_izin'";

    $insert=$this->Bu_model->delete_opr($select,$where);
    $record=$this->Bu_model->get_permohonan_masuk_2($nib,$tgl_permohonan);
    $email=$record[0]['user_email'];
    $subject="Penolakan Permohonan";
    $pre_header="Permohonan Ditolak";
    $send=$this->send($email,$subject,$reason,$pre_header);

    if(count($record)==1){
      $select = "INSERT IGNORE INTO lsbu_registrasi_history_hapus(NIB,tgl_permohonan,propinsi,tahun,status_0,status_1,status_2,status_3,user_status_1,user_status_2,user_status_3,file_pembayaran,file_perjanjian,tgl_penghapusan,reason,bukti_hapus,user_hapus) SELECT NIB,tgl_permohonan,propinsi,tahun,status_0,status_1,status_2,status_3,user_status_1,user_status_2,user_status_3,file_pembayaran,file_perjanjian,now(),'$reason','$upload','$id_user' FROM lsbu_registrasi_history";
      $where = "WHERE NIB='$nib' AND tgl_permohonan='$tgl_permohonan'";
      $insert=$this->Bu_model->delete_opr($select,$where);
      $this->Bu_model->delete_permohonan_izin($nib,$id_izin);
      $this->Bu_model->delete_permohonan_registrasi($nib,$tgl_permohonan);
    }else{
      $this->Bu_model->delete_permohonan_izin($nib,$id_izin);
    }

    $data=1;
	$this->session->set_flashdata('title','Success');
    $this->session->set_flashdata('text','Penolakan Permohonan Berhasil dilakukan');
    $this->session->set_flashdata('class', "success");
  }
  curl_close($curl);

  $response = array(
                 'status'=>$data,

               );

     echo json_encode($response);

}
function list_tolak(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }
  $data=$this->Bu_model->list_tolak();
  $record=array();
  foreach ($data as $row) {
    $get=$this->Bu_model->get_revisi($row['NIB'],$row['tgl_permohonan']);
    if(empty($get)){
      $status="0";
    }else{
      foreach($get as $row_revisi){
        if($row_revisi['status']=='0'){
          $status="1";
          break;
        }else{
          $status="2";
        }
      }
    }
    $datax=array(
      'tgl_permohonan_banding'=>$row['tgl_permohonan_banding'],
      'biaya_lsbu'=>$row['biaya_lsbu'],
      'id_izin'=>$row['id_izin'],
      'tgl_create_izin'=>$row['tgl_create_izin'],
      'status_0'=>$row['status_0'],
      'concat_sub'=>$row['concat_sub'],
      'concat_klasifikasi'=>$row['concat_klasifikasi'],
      'concat_kualifikasi'=>$row['concat_kualifikasi'],
      'id_sub_klasifikasi'=>$row['id_sub_klasifikasi'],
      'nama'=>$row['nama'],
      'NIB'=>$row['NIB'],
      'tgl_permohonan'=>$row['tgl_permohonan'],
      'propinsi'=>$row['concat_sub'],
      'tahun'=>$row['tahun'],
      'status_1'=>$row['status_1'],
      'status_2'=>$row['status_2'],
      'status_3'=>$row['status_3'],
      'stat'=>$status,
    );
    array_push($record,$datax);
  }
  $this->data = array(
    'record'=>$record,

  );
  $this->template->load('menu/menu','sertifikasi/list_tolak', $this->data);

}

function send_verifikasi_email($tujuan,$nib,$tgl_permohonan){
  $this->load->config('email');
  $this->load->library('email');
  $from = $this->config->item('smtp_user');

  $message = $this->notif_email2($nib,$tgl_permohonan);
  $this->email->from('info@sertifikasikontraktor.com', 'LSBU SKI');
  $this->email->to($tujuan);
  $list = array('info@sertifikasikontraktor.com', 'lsbu.ptski@gmail.com');
  $this->email->cc($list);
  $this->email->subject('Pemberitahuan Sertifikasi');
  $this->email->message($message);

  if ($this->email->send()) {
      return "Success";
  } else {
      return "Failed";
  }
}
function send_email_penunjukan(){
  $nib=$this->session->userdata('nib');
  $sub_klasifikasi=$this->session->userdata('sub_klasifikasi');
  $record=$this->Bu_model->get_detail_penunjukan($nib,$sub_klasifikasi);
  $this->load->config('email');
  $this->load->library('email');
  if(!empty($record)){
    foreach ($record as $row) {

      $from = $this->config->item('smtp_user');
      $isi_email="Anda telah ditunjuk sebagai asesor untuk permohonan badan usaha Dengan NIB : ".$nib."<br> Mohon untuk segera login kedalam sistem LSBU untuk melakukan asesment.<br> Berikut Surat Tugas Anda :";
      $link=base_url('get_file/get_surat_tugas/'.$row['file']);
      $pre_header="Surat Tugas";
      $message = $this->notif_email_tombol_asesor($isi_email,$link,$pre_header);
      $this->email->from('info@sertifikasikontraktor.com', 'LSBU SKI');
      $this->email->to($row['Email']);
      $list = array('info@sertifikasikontraktor.com', 'lsbu.ptski@gmail.com');
      $this->email->cc($list);
      $this->email->subject('Surat Tugas');
      $this->email->message($message);
      $this->email->send();
      $response = array(
                     'result'=>1,

                   );

    }
  }else{
    $response = array(
                   'result'=>2,

                 );
  }
  echo json_encode($response);
}

function send_verifikasi_pembayaran($tujuan){
  $this->load->config('email');
  $this->load->library('email');
  $from = $this->config->item('smtp_user');
  $message = $this->notif_email3();
  $this->email->from('info@sertifikasikontraktor.com', 'LSBU SKI');
  $this->email->to($tujuan);
  $list = array('info@sertifikasikontraktor.com', 'lsbu.ptski@gmail.com');
  $this->email->cc($list);
  $this->email->subject('Pemberitahuan Sertifikasi');
  $this->email->message($message);

  if ($this->email->send()) {
      return "Success";
  } else {
      return "Failed";
  }
}
function send($tujuan,$subject,$isi_email,$pre_header) {
      $this->load->config('email');
      $this->load->library('email');
      $from = $this->config->item('smtp_user');
      $message = $this->notif_email($isi_email,$pre_header);
      $this->email->from('info@sertifikasikontraktor.com', 'LSBU SKI');
      $this->email->to($tujuan);
      $list = array('info@sertifikasikontraktor.com', 'lsbu.ptski@gmail.com');
      $this->email->cc($list);
      $this->email->subject($subject);
      $this->email->message($message);

      if ($this->email->send()) {
          return "Success";
      } else {
          return "Failed";
      }
      //$this->load->view('template_email');
  }

  function send_tombol($tujuan,$subject,$isi_email,$pre_header,$link) {
        $this->load->config('email');
        $this->load->library('email');
        $from = $this->config->item('smtp_user');
        $message = $this->notif_email($isi_email,$pre_header,$link);
        $this->email->from('info@sertifikasikontraktor.com', 'LSBU SKI');
        $this->email->to($tujuan);
        $list = array('info@sertifikasikontraktor.com', 'lsbu.ptski@gmail.com');
        $this->email->cc($list);
        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            return "Success";
        } else {
            return "Failed";
        }
        //$this->load->view('template_email');
    }
function verifikasi_pembayaran(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){
  $post = $this->input->post();
  $sub_klasifikasi = $this->security->xss_clean(trim($post['tgl_permohonan']));
  $nib = $this->security->xss_clean(trim($post['nib']));
  $record=$this->Bu_model->token_api_siki();
  $token=$record[0]['token'];
  $record2=$this->Bu_model->get_izin_registrasi($nib,$sub_klasifikasi);
  $id_izin=$record2[0]['id_izin'];
  $url = "https://siki.pu.go.id/siki-api/v1/permohonan-sbu/$id_izin";
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_HTTPHEADER,array(
    "Content-type: application/json",
    "token: $token"
  ));

  curl_setopt($curl, CURLOPT_POSTFIELDS, '{
      "kd_status":"31",
      "keterangan":"Pembayaran Diverifikasi"
  }');

  $json_response = curl_exec($curl);
  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  $status=200;
  if ( $status != 200) {
      //die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));

      $response = array(
                     'result'=>2,

                   );



  }else{
    $klasifikasi=$this->Bu_model->klasifikasi_kualifikasi_opr($nib,$sub_klasifikasi);
    $this->Bu_model->verifikasi_pembayaran_update($nib,$sub_klasifikasi);
    $tujuan=$klasifikasi[0]['user_email'];
    $this->send_verifikasi_pembayaran($tujuan);
    $data_awal=array(
      'status'=>'31'
    );
    $where_awal=array(
      'nib'=>$nib,
      'id_sub_klasifikasi'=>$sub_klasifikasi
    );
    $table_awal="lsbu_permohonan_masuk";
    $this->Bu_model->update_edit($where_awal,$table_awal,$data_awal);
    $response = array(
                   'result'=>1,

                 );

  }
  curl_close($curl);




     echo json_encode($response);
   }else{
     $this->session->set_flashdata('title','Warning');
     $this->session->set_flashdata('text','Anda tidak memiliki akses');
     $this->session->set_flashdata('class', "warning");
     redirect('login','refresh');
   }
}
function post_status_11($nib_dec,$tgl_dec,$ket){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }
  $nib=decrypt_url($nib_dec);
  $sub_klasifikasi=decrypt_url($tgl_dec);
  $record=$this->Bu_model->token_api_siki();
  $token=$record[0]['token'];
  $record2=$this->Bu_model->get_izin_registrasi($nib,$sub_klasifikasi);
  $id_izin=$record2[0]['id_izin'];
  $data_awal=array(
    'status'=>'11'
  );
  $where_awal=array(
    'id_izin'=>$id_izin,
  );
  $table_awal="lsbu_permohonan_masuk";

  $this->Bu_model->update_edit($where_awal,$table_awal,$data_awal);



  $this->Bu_model->delete_pengalaman($nib,$id_izin);
  $this->Bu_model->delete_peralatan($nib,$id_izin);
  $this->Bu_model->delete_kepemilikan_peralatan($nib,$sub_klasifikasi);
  $this->Bu_model->delete_pjskbu($nib,$sub_klasifikasi);
  $url = "https://siki.pu.go.id/siki-api/v1/permohonan-sbu/$id_izin";
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_HTTPHEADER,array(
    "Content-type: application/json",
    "token: $token"
  ));
  $postData = [ "kd_status" => "11",
    "keterangan" => $ket
];
  curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($postData));

  $json_response = curl_exec($curl);
  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  if ( $status != 200) {
    //die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
    $data="Failed";
  }else{
    $data="Success";
  }
  curl_close($curl);



}
function post_status_10($nib_dec,$tgl_dec){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }
  $sub_klasifikasi = decrypt_url($tgl_dec);
  $nib = decrypt_url($nib_dec);
  $record=$this->Bu_model->token_api_siki();
  $token=$record[0]['token'];
  $record2=$this->Bu_model->get_izin_registrasi($nib,$sub_klasifikasi);
  $id_izin=$record2[0]['id_izin'];

  $url = "https://siki.pu.go.id/siki-api/v1/permohonan-sbu/$id_izin";
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_HTTPHEADER,array(
    "Content-type: application/json",
    "token: $token"
  ));

  curl_setopt($curl, CURLOPT_POSTFIELDS, '{
      "kd_status":"10",
      "keterangan":"Verifikasi Lolos"
  }');

  $json_response = curl_exec($curl);
  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  if ( $status != 200) {
    die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));

      $data="Failed";


  }else{



    $data="Success";

  }
  curl_close($curl);


return $data;
}
function post_status_verifikasi_20($id_izin){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }
  $record=$this->Bu_model->token_api_siki();
  $token=$record[0]['token'];
  $rec=$this->Bu_model->get_notif_20($id_izin);
  if(empty($rec)){
    $url = "https://siki.pu.go.id/siki-api/v1/permohonan-sbu/$id_izin";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER,array(
      "Content-type: application/json",
      "token: $token"
    ));

    curl_setopt($curl, CURLOPT_POSTFIELDS, '{
        "kd_status":"20",
        "keterangan":"Validasi"
    }');

    $json_response = curl_exec($curl);
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    if ( $status != 200) {
      //die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));

        return "Failed";


    }else{



      return "Success";

    }
  }


}
function create_qr(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }
  $post = $this->input->post();
  $nib=$this->security->xss_clean(trim($post['nib']));
  $sub_klasifikasi=$this->security->xss_clean(trim($post['tgl_permohonan']));

  $record=$this->Bu_model->token_api_siki();
  $token=$record[0]['token'];
  $record2=$this->Bu_model->get_izin_registrasi($nib,$sub_klasifikasi);
  $id_izin=$record2[0]['id_izin'];

  $url = "https://siki.pu.go.id/siki-api/v1/qr-sbu/$id_izin";
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
  curl_setopt($curl, CURLOPT_HEADER, false);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  //curl_setopt($curl, CURLOPT_POSTFIELDS, $data);post
  curl_setopt($curl, CURLOPT_HTTPHEADER,array(
    "Content-type: application/json",
    "token: $token"
  ));

  $json_response = curl_exec($curl);
  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  $responses = json_decode($json_response, true);
  if ( $status != 200) {
    die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
    $response = array(
                    'result'=>2,


                  );

  }else{

    $response = array(
                    'response'=>$responses,
                    'result'=>1,

                  );
    $responses['qr'];
    $this->Bu_model->update_qr($nib,$id_izin,$responses['qr']);
  }
  curl_close($curl);

echo json_encode($response);
}
function get_permohonan(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }
  $record=$this->Bu_model->token_api_siki();
  $token=$record[0]['token'];
  $url = "https://siki.pu.go.id/siki-api/v1/permohonan-sbu";

  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
  curl_setopt($curl, CURLOPT_HEADER, false);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  //curl_setopt($curl, CURLOPT_POSTFIELDS, $data);post
  curl_setopt($curl, CURLOPT_HTTPHEADER,array(
    "Content-type: application/json",
    "token: $token"
  ));
  $json_response = curl_exec($curl);
  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  if ( $status != 200) {
      //die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
      $response = array(
                      'result'=>2,


                    );

  }else{

    curl_close($curl);
    $responses = json_decode($json_response, true);
    foreach($responses['data'] as $row){
      $nib=$row['nib'];
      $id_izin="'".$row['id_izin']."'";
      $create="'".$row['created_at']."'";
      $updates="'".$row['updated_at']."'";
      $select="INSERT IGNORE INTO lsbu_permohonan_masuk (nib,id_izin,tgl_create_izin,tgl_update_izin) VALUE ($nib,$id_izin,$create,$updates)";
      $where="";
      $this->Bu_model->delete_opr($select,$where);
    }
    $response = array(
                    'result'=>1,
                  );
  }


      echo json_encode($response);
}
function list_pembayaran(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){
  $data=$this->Bu_model->list_biaya_pembayaran();
  $record=array();
  foreach ($data as $row) {
    $get=$this->Bu_model->get_revisi($row['NIB'],$row['id_sub_klasifikasi']);
    if(empty($get)){
      $status="0";
    }else{
      foreach($get as $row_revisi){
        if($row_revisi['status']=='0'){
          $status="1";
          break;
        }else{
          $status="2";
        }
      }
    }
    $datax=array(
      'file_pembayaran'=>$row['file_pembayaran'],
      'file_perjanjian'=>$row['file_perjanjian'],
      'biaya'=>$row['biaya'],
      'status_0'=>$row['status_0'],
      'id_sub_klasifikasi'=>$row['id_sub_klasifikasi'],
      'id_klasifikasi'=>$row['id_klasifikasi'],
      'kualifikasi'=>$row['kualifikasi'],
      'nama'=>$row['nama'],
      'NIB'=>$row['NIB'],
      'tgl_permohonan'=>$row['tgl_permohonan'],
      'propinsi'=>$row['id_sub_klasifikasi'],
      'tahun'=>$row['tahun'],
      'status_1'=>$row['status_1'],
      'status_2'=>$row['status_2'],
      'status_3'=>$row['status_3'],
      'stat'=>$status,
    );
    array_push($record,$datax);
  }
  $this->data = array(
    'record'=>$record,

  );
  $this->template->load('menu/menu','sertifikasi/list_pembayaran', $this->data);
}else{
  $this->session->set_flashdata('title','Warning');
  $this->session->set_flashdata('text','Anda tidak memiliki akses');
  $this->session->set_flashdata('class', "warning");
  redirect('login','refresh');
}
}
function get_pjt_asesor(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }
  $post = $this->input->post();
  $id_izin=$this->security->xss_clean(trim($post['id_izin']));
  $record=$this->Bu_model->token_api_siki();
  $token=$record[0]['token'];
  $url = "https://siki.pu.go.id/siki-api/v2/pjt-ska-skt/".$id_izin;

  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
  curl_setopt($curl, CURLOPT_HEADER, false);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  //curl_setopt($curl, CURLOPT_POSTFIELDS, $data);post
  curl_setopt($curl, CURLOPT_HTTPHEADER,array(
    "Content-type: application/json",
    "token: $token"
  ));
  $json_response = curl_exec($curl);
  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  $responses = json_decode($json_response, true);
  curl_close($curl);
  if ( $status != 200) {
      die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
      $response = array(
                      'result'=>2,


                    );

  }else{
    $response = array(
                    'result'=>1,
                    'responses_data'=>$responses

                  );
  }
  echo json_encode($response);

}
function get_pjsk_asesor(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }
  $post = $this->input->post();
  $id_izin=$this->security->xss_clean(trim($post['id_izin']));
  $record=$this->Bu_model->token_api_siki();
  $token=$record[0]['token'];
  $url = "https://siki.pu.go.id/siki-api/v2/pjsk-ska-skt/".$id_izin;

  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
  curl_setopt($curl, CURLOPT_HEADER, false);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  //curl_setopt($curl, CURLOPT_POSTFIELDS, $data);post
  curl_setopt($curl, CURLOPT_HTTPHEADER,array(
    "Content-type: application/json",
    "token: $token"
  ));
  $json_response = curl_exec($curl);
  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  $responses = json_decode($json_response, true);
  curl_close($curl);
  if ( $status != 200) {
      die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
      $response = array(
                      'result'=>2,


                    );

  }else{
    $response = array(
                    'result'=>1,
                    'responses_data'=>$responses

                  );
  }
  echo json_encode($response);

}
function get_permohonan_detail(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }
  $post = $this->input->post();
  $id_izin=$this->security->xss_clean(trim($post['id_izin']));
  $record=$this->Bu_model->token_api_siki();
  $token=$record[0]['token'];
  $url = "https://siki.pu.go.id/siki-api/v1/permohonan-sbu/".$id_izin;

  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
  curl_setopt($curl, CURLOPT_HEADER, false);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  //curl_setopt($curl, CURLOPT_POSTFIELDS, $data);post
  curl_setopt($curl, CURLOPT_HTTPHEADER,array(
    "Content-type: application/json",
    "token: $token"
  ));
  $json_response = curl_exec($curl);
  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  $responses = json_decode($json_response, true);
  curl_close($curl);
  if ( $status != 200) {
      die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
      $response = array(
                      'result'=>2,


                    );

  }else{
    if(!empty($responses['permohonan_registrasi'])){

      foreach($responses['permohonan_registrasi'] as $row_registrasi){
        $sub_klasifikasi=$row_registrasi['id_sub_klasifikasi'];
      }
    }
    if(!empty($responses['badan_usaha'])){
      $responses_administrasi=$responses['badan_usaha'];
      $bentuk_usaha=$responses_administrasi['bentuk_badan_usaha'];
      $id_propinsi=$responses_administrasi['id_provinsi'];
			$id_kabupaten=$responses_administrasi['id_kabupaten_kota'];
      $jabatan_pimpinan=$responses_administrasi['jabatan_pimpinan'];
      $jenis_badan_usaha=$responses_administrasi['jenis_badan_usaha'];
      $nama=$responses_administrasi['nama_badan_usaha'];
      $map=$responses_administrasi['map'];
      $email_pic=$responses_administrasi['creator'];
      $nib=$responses_administrasi['nib'];
      $nama_pimpinan=$responses_administrasi['nama_pimpinan'];
      $minisite_name=$responses_administrasi['minisite_name'];
      $alamat=str_replace("'", '', $responses_administrasi['alamat_badan_usaha']);
			$kodepos=$responses_administrasi['kode_pos_badan_usaha'];
      $telepon=$responses_administrasi['telepon_badan_usaha'];
      $hp=$responses_administrasi['hp_badan_usaha'];
			$fax=$responses_administrasi['faksimili_badan_usaha'];
			$email=$responses_administrasi['email_badan_usaha'];
			$web=$responses_administrasi['website_badan_usaha'];
      $updated_izin=$responses_administrasi['updated'];
      $tgl_didirikan=$responses_administrasi['tgl_didirikan'];
      $rekening=$responses_administrasi['rekening_badan_usaha'];
      $jenis_usaha=$responses_administrasi['jenis_usaha'];
			$npwp=$responses_administrasi['npwp_badan_usaha'];
      $file_nib=$responses_administrasi['file_nib'];
      $file_npwp=$responses_administrasi['file_npwp'];
      $sptjm=$responses_administrasi['sptjm'];
      $created=$responses_administrasi['created'];
      $creator=$responses_administrasi['creator'];
      $updated=$responses_administrasi['updated'];
      $select="REPLACE INTO lsbu_bu (
        NIB,
        sub_klasifikasi,
        id_propinsi,
        id_kabupaten,
        nama,
        klasifikasi_jenis_usaha,
        bentuk_usaha,
        jenis_usaha,
        nama_pimpinan,
        jabatan_pimpinan,
        map,
        minisite_name,
        tgl_didirikan,
        rekening,
        alamat_bu,
        kodepos,
        telepon,
        hp,
        fax,
        email,
        email_pic,
        web,
        npwp,
        sptjm,
        file_nib,
        file_npwp,
        created,
        creator,
        updated)
			VALUES (
        '$nib',
        '$sub_klasifikasi',
        '$id_propinsi',
        '$id_kabupaten',
        '$nama',
        '$jenis_badan_usaha',
        '$bentuk_usaha',
        '$jenis_usaha',
        '$nama_pimpinan',
        '$jabatan_pimpinan',
        '$map',
        '$minisite_name',
        '$tgl_didirikan',
        '$rekening',
        '$alamat',
        '$kodepos',
        '$telepon',
        '$hp',
        '$fax',
        '$email',
        '$email_pic',
        '$web',
        '$npwp',
        '$sptjm',
        '$file_nib',
        '$file_npwp',
        '$created',
        '$creator',
        '$updated'

      )";
			$where="";
			$this->Bu_model->delete_opr($select,$where);
    }

    if(!empty($responses['neraca'])){
      $this->Bu_model->delete_neraca($nib);
      foreach($responses['neraca'] as $row_neraca){
        $tahun=$row_neraca['tahun'];
        $aset_lain_lain=$row_neraca['aset_lain_lain'];
        $aset_lancar=$row_neraca['aset_lancar'];
        $aset_tdk_lancar=$row_neraca['aset_tdk_lancar'];
        $kewajiban_lancar=$row_neraca['kewajiban_lancar'];
        $kewajiban_tdk_lancar=$row_neraca['kewajiban_tdk_lancar'];
        $total_aset=$row_neraca['total_aset'];
        $total_modal=$row_neraca['total_modal'];
        $totalekuitas=$row_neraca['totalekuitas'];
        $totalkewajiban=$row_neraca['totalkewajiban'];
        $totalkewajiban_ekuitas=$row_neraca['total_kewajiban_ekuitas'];
        $file_doc_a=$row_neraca['file_doc_a'];
        $file_doc_b=$row_neraca['file_doc_b'];
        $created=$row_neraca['created'];
        $creator=$row_neraca['creator'];
        $updated=$row_neraca['updated'];

        $select_neraca="REPLACE INTO lsbu_keuangan_neraca_2(
          NIB,
          Tahun,
          aktiva_lancar,
          aktiva_tdk_lancar,
          aktiva_lain_lain,
          total_aset,
          kewajiban_lancar,
          kewajiban_tdk_lancar,
          total_kewajiban_ekuitas,
          total_modal,
          total_kewajiban,
          total_ekuitas,
          persyaratan_doc1,
          persyaratan_doc2,
          created,
          creator,
          updated)
          VALUES (
            '$nib',
            '$tahun',
            '$aset_lancar',
            '$aset_tdk_lancar',
            '$aset_lain_lain',
            '$total_aset',
            '$kewajiban_lancar',
            '$kewajiban_tdk_lancar',
            '$totalkewajiban_ekuitas',
            '$total_modal',
            '$totalkewajiban',
            '$totalekuitas',
            '$file_doc_a',
            '$file_doc_b',
            '$created',
            '$creator',
            '$updated'
          )";
          $where="";
    			$this->Bu_model->delete_opr($select_neraca,$where);
      }
    }
    if(!empty($responses['pemegang_saham'])){
      $this->Bu_model->delete_pemegang_saham($nib);
      foreach($responses['pemegang_saham'] as $row_saham){
        $alamat=$row_saham['alamat'];
        $id_kabupaten_kota=$row_saham['id_kabupaten_kota'];
        $id_provinsi=$row_saham['id_provinsi'];
        $alamat=$row_saham['alamat'];
        $jenis_saham=$row_saham['jenis_saham'];
        $jumlah_saham=$row_saham['jumlah_saham'];
        $modal_dasar=$row_saham['modal_dasar'];
        $modal_disetor=$row_saham['modal_disetor'];
        $nama=$row_saham['nama'];
        $nilaisatuan_saham=$row_saham['nilaisatuan_saham'];
        $no_akte=$row_saham['no_akte'];
        $no_ktp=$row_saham['no_ktp'];
        $npwp=$row_saham['npwp'];
        $file_doc=$row_saham['file_doc'];
        $file_ktp=$row_saham['file_ktp'];
        $file_npwp=$row_saham['file_npwp'];
        $created=$row_saham['created'];
        $creator=$row_saham['creator'];
        $updated=$row_saham['updated'];
        $select_saham="REPLACE INTO lsbu_keuangan_saham(
          NIB,
          nama_pemilik,
          no_ktp,
          alamat,
          id_propinsi,
          id_kabupaten,
          jenis_saham,
          jumlah_lembar,
          nilai_perlembar,
          modal_dasar,
          modal_disetor,
          no_akte,
          npwp,
          persyaratan_doc,
          persyaratan_ktp,
          persyaratan_npwp,
          created,
          creator,
          updated)
          VALUES(
            '$nib',
            '$nama',
            '$no_ktp',
            '$alamat',
            '$id_provinsi',
            '$id_kabupaten_kota',
            '$jenis_saham',
            '$jumlah_saham',
            '$nilaisatuan_saham',
            '$modal_dasar',
            '$modal_disetor',
            '$no_akte',
            '$npwp',
            '$file_doc',
            '$file_ktp',
            '$file_npwp',
            '$created',
            '$creator',
            '$updated'
          )";
          $where="";
    			$this->Bu_model->delete_opr($select_saham,$where);
      }
    }
    if(!empty($responses['pengurus'])){
      $this->Bu_model->delete_pengurus($nib);
      foreach($responses['pengurus'] as $row_pengurus){
        $alamat=str_replace("'", '', $row_pengurus['alamat']);
        $bukan_asn=$row_pengurus['bukan_asn'];
        $email=$row_pengurus['email'];
        $hp_a=$row_pengurus['hp_a'];
        $hp_b=$row_pengurus['hp_b'];
        $jabatan=$row_pengurus['jabatan'];
        $nama=$row_pengurus['nama'];
        $no_akte=$row_pengurus['no_akte'];
        $noktp=$row_pengurus['noktp'];
        $pjbu=$row_pengurus['pjbu'];
        $tgllahir=$row_pengurus['tgllahir'];
        $npwp=$row_pengurus['npwp'];
        $foto=$row_pengurus['foto'];
        $ktp_img=$row_pengurus['ktp_img'];
        $npwp_img=$row_pengurus['npwp_img'];
        $created=$row_pengurus['created'];
        $creator=$row_pengurus['creator'];
        $updated=$row_pengurus['updated'];
        $select_pengurus="REPLACE INTO lsbu_pengurus(
          no_ktp,
          NIB,
          nama,
          alamat,
          email,
          hp_a,
          hp_b,
          jabatan_bu,
          pjbu,
          tgl_lahir,
          no_akte,
          bukan_asn,
          npwp,
          persyaratan_foto,
          persyaratan_ktp_img,
          persyaratan_npwp_img,
          created,
          creator,
          updated)
          VALUES (
          '$noktp',
          '$nib',
          '$nama',
          '$alamat',
          '$email',
          '$hp_a',
          '$hp_b',
          '$jabatan',
          '$pjbu',
          '$tgllahir',
          '$no_akte',
          '$bukan_asn',
          '$npwp',
          '$foto',
          '$ktp_img',
          '$npwp_img',
          '$created',
          '$creator',
          '$updated'
        )";
        $where="";
        $this->Bu_model->delete_opr($select_pengurus,$where);

      }
    }
    if(!empty($responses['permohonan_registrasi'])){

      foreach($responses['permohonan_registrasi'] as $row_registrasi){
        $sub_klasifikasi=$row_registrasi['id_sub_klasifikasi'];



        $asosiasi=$row_registrasi['asosiasi'];
        $id_klasifikasi=$row_registrasi['id_klasifikasi'];
        $id_sub_klasifikasi=$row_registrasi['id_sub_klasifikasi'];
        $kualifikasi=$row_registrasi['kualifikasi'];
        $nomor_kbli=$row_registrasi['nomor_kbli'];
        $jenis_usaha=$row_registrasi['jenis_usaha'];
        $sifat_usaha=$row_registrasi['sifat_usaha'];
        $user_email=$row_registrasi['user_email'];
        $user_hp=$row_registrasi['user_hp'];
        $user_name=$row_registrasi['user_name'];
        $updated=$row_registrasi['updated'];
        $creator=$row_registrasi['creator'];
        $created=$row_registrasi['created'];
        $tgl_permohonan=date("Y-m-d");
        $year=date("Y");
        //$this->Bu_model->insert_permohonan($nib,$tgl_permohonan,$id_sub_klasifikasi);
        $select_registrasi2="INSERT IGNORE INTO lsbu_registrasi_history(
          NIB,
          tgl_permohonan,
          sub_klasifikasi,
          propinsi,
          tahun,
          status_0,
          status_1,
          status_2,
          status_3,
          user_status_0,
          user_status_1,
          user_status_2,
          user_status_3
        )
          VALUES (
            '$nib',
            '$tgl_permohonan',
            '$id_sub_klasifikasi',
            '09',
            '$year',
            '$tgl_permohonan',
            '0000-00-00',
            '0000-00-00',
            '0000-00-00',
            '$nib',
            '',
            '',
            ''
          )";
          $where2="";
          $this->Bu_model->delete_opr($select_registrasi2,$where2);


        $data_update=array(
          'id_sub_klasifikasi'=>$row_registrasi['id_sub_klasifikasi'],
          'tgl_permohonan'=>$tgl_permohonan
        );
        $where_update=array(
          'id_izin'=>$id_izin
        );
        $table_update="lsbu_permohonan_masuk";
        $this->Bu_model->update_edit($where_update,$table_update,$data_update);
        $this->post_status_verifikasi_20($id_izin);

        $data_awal=array(
          'status'=>'20'
        );
        $where_awal=array(
          'id_izin'=>$id_izin
        );
        $table_awal="lsbu_permohonan_masuk";

        $this->Bu_model->update_edit($where_awal,$table_awal,$data_awal);
        $id_user=$this->session->userdata('id_user');
        $select_registrasi="INSERT IGNORE INTO lsbu_registrasi(
          NIB,
          id_klasifikasi,
          id_sub_klasifikasi,
          kualifikasi,
          asosiasi,
          user_pemohon,
          tgl_permohonan,
          nomor_kbli,
          jenis_usaha,
          sifat_badanusaha,
          id_izin,
          user_email,
          user_hp,
          created,
          creator,
          updated,
          user_get
        )
          VALUES (
            '$nib',
            '$id_klasifikasi',
            '$id_sub_klasifikasi',
            '$kualifikasi',
            '$asosiasi',
            '$user_name',
            '$tgl_permohonan',
            '$nomor_kbli',
            '$jenis_usaha',
            '$sifat_usaha',
            '$id_izin',
            '$user_email',
            '$user_hp',
            '$created',
            '$creator',
            '$updated',
            '$id_user'
          )";
          $where="";
          $this->Bu_model->delete_opr($select_registrasi,$where);


      }
    }
    if(!empty($responses['kepemilikan_peralatan'])){
      foreach($responses['kepemilikan_peralatan'] as $row_peralatan_kepemilikan){
        $updated=$row_peralatan_kepemilikan['updated'];
        $created=$row_peralatan_kepemilikan['created'];
        $creator=$row_peralatan_kepemilikan['creator'];
        $memiliki_peralatan=$row_peralatan_kepemilikan['memiliki_peralatan'];
        $surat_pernyataan=$row_peralatan_kepemilikan['surat_pernyataan'];
        $select_peralatan="REPLACE INTO lsbu_kepemilikan_peralatan(
          nib,
          sub_klasifikasi,
          id_izin,
          memiliki_peralatan,
          surat_pernyataan,
          created,
          creator,
          updated)
          VALUES (
            '$nib',
            '$id_sub_klasifikasi',
            '$id_izin',
            '$memiliki_peralatan',
            '$surat_pernyataan',
            '$created',
            '$creator',
            '$updated'
          )";
          $where="";
          $this->Bu_model->delete_opr($select_peralatan,$where);
      }
    }
    if(!empty($responses['penjualan_tahunan'])){
      foreach($responses['penjualan_tahunan'] as $row_pengalaman){

        $nomor_kontrak=$row_pengalaman['no_kontrak'];

        $nama_pengalaman=str_replace("'", '', $row_pengalaman['nama_proyek']);

        $nilai_kontrak=$row_pengalaman['nilai_proyek'];

        $email_instansi=$row_pengalaman['email_instansi_pemberi_tugas'];
        $jabatan_pemberi_tugas=$row_pengalaman['jabatan_pemberi_tugas'];
        $lokasi_pekerjaan=$row_pengalaman['lokasi_pekerjaan'];
        $nama_instansi_pemberi_tugas=$row_pengalaman['nama_instansi_pemberi_tugas'];
        $nama_pemberi_tugas=$row_pengalaman['nama_pemberi_tugas'];
        $nilai_kontrak_adendum=$row_pengalaman['nilai_kontrak_adendum'];
        $nilai_kontrak_sesuai_porsi=$row_pengalaman['nilai_kontrak_sesuai_porsi'];
        $no_telp_instansi_pemberi_tugas=str_replace("'", '', $row_pengalaman['no_telp_instansi_pemberi_tugas']);
        $nomor_registrasi_pengalaman=$row_pengalaman['nomor_registrasi_pengalaman'];
        $pemberi_tugas=$row_pengalaman['pemberi_tugas'];
        $presentase_porsi=$row_pengalaman['presentase_porsi'];
        $status_kso=$row_pengalaman['status_kso'];
        $sumber_dana=$row_pengalaman['sumber_dana'];
        $tgl_bast=$row_pengalaman['tgl_bast'];


        $no_bast=$row_pengalaman['no_bast'];
        $no_nkpk=$row_pengalaman['no_nkpk'];
        $pemilik_proyek=$row_pengalaman['pemilik_proyek'];
        $spesifik_pekerjaan=$row_pengalaman['spesifik_pekerjaan'];
        $sub_klasifikasi=$row_pengalaman['sub_klasifikasi'];
        $tahun=$row_pengalaman['tahun'];
        $tgl_kontrak=$row_pengalaman['tgl_kontrak'];
        $tgl_mulai=$row_pengalaman['tgl_mulai'];
        $tgl_selesai=$row_pengalaman['tgl_selesai'];
        $doc_1=$row_pengalaman['file_doc_a'];
        $doc_2=$row_pengalaman['file_doc_b'];

        $file_bash=$row_pengalaman['file_bast'];
        $file_boq_rab_mpu=$row_pengalaman['file_boq_rab_mpu'];
        $file_kontrak_dengan_pemberi_tugas=$row_pengalaman['file_kontrak_dengan_pemberi_tugas'];

        $created=$row_pengalaman['created'];
        $creator=$row_pengalaman['creator'];
        $updated=$row_pengalaman['updated'];
        $select_pengalaman="REPLACE INTO lsbu_pengalaman(
          NIB,
          nomor_kontrak,
          id_izin,
          nama_pengalaman,
          nilai_kontrak,
          email_instansi,
          jabatan_pemberi_tugas,
          lokasi_pekerjaan,
          nama_instansi_pemberi_tugas,
          nama_pemberi_tugas,
          nilai_kontrak_adendum,
          nilai_kontrak_sesuai_porsi,
          no_telp_instansi_pemberi_tugas,
          nomor_registrasi_pengalaman,
          pemberi_tugas,
          presentase_porsi,
          status_kso,
          sumber_dana,

          id_sub_klasifikasi,
          no_bash,
          no_nkpk,
          pemilik_proyek,
          spesifik_pekerjaan,
          tahun,
          tgl_bast,
          tgl_kontrak,
          tgl_mulai,
          tgl_selesai,
          file_doc_a,
          file_doc_b,
          file_bash,
          file_boq_rab_mpu,
          file_kontrak_dengan_pemberi_tugas,
          created,
          creator,
          updated)
          VALUES (
          '$nib',
          '$nomor_kontrak',
          '$id_izin',
          '$nama_pengalaman',
          '$nilai_kontrak',
          '$email_instansi',
          '$jabatan_pemberi_tugas',
          '$lokasi_pekerjaan',
          '$nama_instansi_pemberi_tugas',
          '$nama_pemberi_tugas',
          '$nilai_kontrak_adendum',
          '$nilai_kontrak_sesuai_porsi',
          '$no_telp_instansi_pemberi_tugas',
          '$nomor_registrasi_pengalaman',
          '$pemberi_tugas',
          '$presentase_porsi',
          '$status_kso',
          '$sumber_dana',
          '$id_sub_klasifikasi',
          '$no_bast',
          '$no_nkpk',
          '$pemilik_proyek',
          '$spesifik_pekerjaan',
          '$tahun',
          '$tgl_bast',
          '$tgl_kontrak',
          '$tgl_mulai',
          '$tgl_selesai',
          '$doc_1',
          '$doc_2',
          '$file_bash',
          '$file_boq_rab_mpu',
          '$file_kontrak_dengan_pemberi_tugas',
          '$created',
          '$creator',
          '$updated'
        )";
        $where="";
        $this->Bu_model->delete_opr($select_pengalaman,$where);
      }
    }
    if(!empty($responses['peralatan'])){
      foreach($responses['peralatan'] as $row_peralatan){
        $harga=$row_peralatan['harga'];
        $jenis=$row_peralatan['jenis'];

        $hasil_pemeriksaan_pengujian=$row_peralatan['hasil_pemeriksaan_pengujian'];
        $jenis_bukti_kepemilikan=$row_peralatan['jenis_bukti_kepemilikan'];
        $kab_kota=$row_peralatan['kab_kota'];
        $kapasitas_hasil_uji=$row_peralatan['kapasitas_hasil_uji'];
        $model_type=$row_peralatan['model_type'];
        $memiliki_peralatan=$row_peralatan['memiliki_peralatan'];
        $nomor_registrasi_peralatan=$row_peralatan['nomor_registrasi_peralatan'];
        $provinsi=$row_peralatan['provinsi'];
        $subvarian=$row_peralatan['subvarian'];
        $tahun_pembuatan=$row_peralatan['tahun_pembuatan'];
        $unit_satuan_kapasitas=$row_peralatan['unit_satuan_kapasitas'];

        $kapasitas=$row_peralatan['kapasitas'];
        $kepemilikan_peralatan=$row_peralatan['kepemilikan_peralatan'];
        $keterangan=$row_peralatan['keterangan'];
        $kondisi=$row_peralatan['kondisi'];
        $lokasi=$row_peralatan['lokasi'];
        $merek=$row_peralatan['merek'];
        $seq=$row_peralatan['seq'];
        $tahun=$row_peralatan['tahun'];
        $tipe=$row_peralatan['tipe'];
        $file_doc_a=$row_peralatan['file_doc_a'];

        $foto_plat_nama=$row_peralatan['foto_plat_nama'];
        $foto_tampak_depan_peralatan=$row_peralatan['foto_tampak_depan_peralatan'];
        $foto_tampak_samping_peralatan=$row_peralatan['foto_tampak_samping_peralatan'];



        $created=$row_peralatan['created'];
        $creator=$row_peralatan['creator'];
        $updated=$row_peralatan['updated'];
        $select_peralatan="REPLACE INTO lsbu_peralatan(
          nib,
          id_izin,
          jenis_peralatan,

          jenis_bukti_kepemilikan,
          kab_kota,
          kapasitas_hasil_uji,
          model_type,
          memiliki_peralatan,
          nomor_registrasi_peralatan,
          provinsi,
          subvarian,
          tahun_pembuatan,
          unit_satuan_kapasitas,
          tipe_peralatan,
          tahun,
          kapasitas,
          kondisi,
          harga,
          merek,
          seq,
          lokasi,

          keterangan,
          sub_klasifikasi,
          kepemilikan_peralatan,
          hasil_pemeriksaan_pengujian,
          persyaratan,
          foto_plat_nama,
          foto_tampak_depan_peralatan,
          foto_tampak_samping_peralatan,

          created,
          creator,
          updated)
          VALUES (
            '$nib',
            '$id_izin',
            '$jenis',
            '$jenis_bukti_kepemilikan',
            '$kab_kota',
            '$kapasitas_hasil_uji',
            '$model_type',
            '$memiliki_peralatan',
            '$nomor_registrasi_peralatan',
            '$provinsi',
            '$subvarian',
            '$tahun_pembuatan',
            '$unit_satuan_kapasitas',
            '$tipe',
            '$tahun',
            '$kapasitas',
            '$kondisi',
            '$harga',
            '$merek',
            '$seq',
            '$lokasi',

            '$keterangan',
            '$id_sub_klasifikasi',
            '$kepemilikan_peralatan',
            '$hasil_pemeriksaan_pengujian',
            '$file_doc_a',
            '$foto_plat_nama',
            '$foto_tampak_depan_peralatan',
            '$foto_tampak_samping_peralatan',
            '$created',
            '$creator',
            '$updated'
          )";
          $where="";
          $this->Bu_model->delete_opr($select_peralatan,$where);

      }
    }

    if(!empty($responses['pjbu'])){
      foreach($responses['pjbu'] as $row_pjbu){
        $alamat=$row_pjbu['alamat'];
        $email=$row_pjbu['email'];
        $hp=$row_pjbu['hp'];
        $jabatan=$row_pjbu['jabatan'];
        $nama=$row_pjbu['nama'];
        $nik=$row_pjbu['nik'];
        $npwp=$row_pjbu['npwp'];
        $stk=$row_pjbu['stk'];
        $tgl_lahir=$row_pjbu['tgl_lahir'];
        $file_ktp=$row_pjbu['file_ktp'];
        $file_npwp=$row_pjbu['file_npwp'];
        $foto=$row_pjbu['foto'];
        $updated=$row_pjbu['updated'];
        $creator=$row_pjbu['creator'];
        $created=$row_pjbu['created'];
        $select_registrasi="REPLACE INTO lsbu_pjbu(
          NIB,
          alamat,
          email,
          hp,
          jabatan,
          nama,
          nik,
          npwp,
          stk,
          tgl_lahir,
          file_ktp,
          file_npwp,
          foto,
          created,
          creator,
          updated
        ) VALUES(
          '$nib',
          '$alamat',
          '$email',
          '$hp',
          '$jabatan',
          '$nama',
          '$nik',
          '$npwp',
          '$stk',
          '$tgl_lahir',
          '$file_ktp',
          '$file_npwp',
          '$foto',
          '$created',
          '$creator',
          '$updated'
        )";
        $where="";
        $this->Bu_model->delete_opr($select_registrasi,$where);
      }
    }
    if(!empty($responses['pjskbu'])){
      foreach($responses['pjskbu'] as $row_pjskbu){
        $id_sub_klasifikasi_pjsk=$row_pjskbu['id_sub_klasifikasi_pjsk'];
        $jenis_tenaga=$row_pjskbu['jenis_tenaga'];
        $jenjang_skk=$row_pjskbu['jenjang_skk'];
        $klasifikasi=$row_pjskbu['klasifikasi'];

        $klasifikasi_acpe_aa=$row_pjskbu['klasifikasi_acpe_aa'];
        $nomor_registrasi_acpe_aa=$row_pjskbu['nomor_registrasi_acpe_aa'];
        $klasifikasi_skk=$row_pjskbu['klasifikasi_skk'];
        $kualifikasi_skk=$row_pjskbu['kualifikasi_skk'];
        $tanggal_terbit_skk=$row_pjskbu['tanggal_terbit_skk'];



        $nama=str_replace("'", '', $row_pjskbu['nama']);
        $nik=$row_pjskbu['nik'];
        $noreg_skk=$row_pjskbu['noreg_skk'];
        $npwp=$row_pjskbu['npwp'];
        $sub_klasifikasi=$row_pjskbu['sub_klasifikasi'];
        $updated=$row_pjskbu['updated'];
        $created=$row_pjskbu['created'];
        $creator=$row_pjskbu['creator'];
        $select_pjskbu="REPLACE INTO lsbu_pjskbu(
          NIB,
          id_sub_klasifikasi_pjsk,
          jenis_tenaga,
          jenjang_skk,
          klasifikasi,
          klasifikasi_acpe_aa,
          nomor_registrasi_acpe_aa,
          klasifikasi_skk,
          kualifikasi_skk,
          tanggal_terbit_skk,

          nama,
          nik,
          noreg_skk,
          npwp,
          sub_klasifikasi,
          updated,
          creator,
          created)
          VALUES (
            '$nib',
            '$id_sub_klasifikasi_pjsk',
            '$jenis_tenaga',
            '$jenjang_skk',
            '$klasifikasi',
            '$klasifikasi_acpe_aa',
            '$nomor_registrasi_acpe_aa',
            '$klasifikasi_skk',
            '$kualifikasi_skk',
            '$tanggal_terbit_skk',
            '$nama',
            '$nik',
            '$noreg_skk',
            '$npwp',
            '$sub_klasifikasi',
            '$updated',
            '$creator',
            '$created'
          )";
          $where="";
          $this->Bu_model->delete_opr($select_pjskbu,$where);
      }
    }
    if(!empty($responses['pjtbu'])){
      foreach($responses['pjtbu'] as $row_pjtbu){
        $alamat=$row_pjtbu['alamat'];
        $jenjang_skk=$row_pjtbu['jenjang_skk'];
        $nama=$row_pjtbu['nama'];

        $klasifikasi=$row_pjtbu['klasifikasi'];
        $klasifikasi_acpe_aa=$row_pjtbu['klasifikasi_acpe_aa'];
        $kualifikasi_skk=$row_pjtbu['kualifikasi_skk'];
        $nomor_registrasi_acpe_aa=$row_pjtbu['nomor_registrasi_acpe_aa'];
        $tanggal_terbit_skk=$row_pjtbu['tanggal_terbit_skk'];

        $nik=$row_pjtbu['nik'];
        $noreg_skk=$row_pjtbu['noreg_skk'];
        $npwp=$row_pjtbu['npwp'];
        $sub_klasifikasi=$row_pjtbu['sub_klasifikasi'];
        $updated=$row_pjskbu['updated'];
        $created=$row_pjskbu['created'];
        $creator=$row_pjskbu['creator'];
        $select_pjtbu="REPLACE INTO lsbu_pjtbu(
          NIB,
          id_sub_klasifikasi,
          alamat,
          jenjang_skk,
          nama,
          klasifikasi,
          klasifikasi_acpe_aa,
          klasifikasi_skk,
          kualifikasi_skk,
          nomor_registrasi_acpe_aa,
          tanggal_terbit_skk,
          nik,
          noreg_skk,
          npwp,
          sub_klasifikasi,
          updated,
          created,
          creator)
          VALUES (
            '$nib',
            '$id_sub_klasifikasi',
            '$alamat',
            '$jenjang_skk',
            '$nama',
            '$klasifikasi',
            '$klasifikasi_acpe_aa',
            '$klasifikasi_skk',
            '$kualifikasi_skk',
            '$nomor_registrasi_acpe_aa',
            '$tanggal_terbit_skk',
            '$nik',
            '$noreg_skk',
            '$npwp',
            '$sub_klasifikasi',
            '$updated',
            '$created',
            '$creator'
          )";
          $where="";
          $this->Bu_model->delete_opr($select_pjtbu,$where);
      }
    }

    if(!empty($responses['smap'])){
      foreach($responses['smap'] as $smap){
        $dokumen_smap=$smap['dokumen_smap'];
        $iso_37001=$smap['iso_37001'];
        $surat_pernyataan=$smap['surat_pernyataan'];
        $file_surat_pernyataan=$smap['file_surat_pernyataan'];
        $sertifikat_iso=$smap['sertifikat_iso'];
        $created=$smap['created'];
        $creator=$smap['creator'];
        $updated=$smap['updated'];
        $select_smap="REPLACE INTO lsbu_smap(
          NIB,
          nomor_sertifikat,
          surat_pernyataan,
          file_surat_pernyataan,
          persyaratan_smap,
          sertifikat_iso,
          created,
          creator,
          updated)
          VALUES(
            '$nib',
            '$iso_37001',
            '$surat_pernyataan',
            '$file_surat_pernyataan',
            '$dokumen_smap',
            '$sertifikat_iso',
            '$created',
            '$creator',
            '$updated'
          )";
          $where="";
          $this->Bu_model->delete_opr($select_smap,$where);
      }
    }
    if(!empty($responses['smm'])){
      foreach($responses['smm'] as $smm){
        $dokumen_smm=$smm['dokumen_smm'];
        $dokumen_pendukung=$smm['dokumen_pendukung'];
        $file_surat_pernyataan=$smm['file_surat_pernyataan'];
        $iso_9001=$smm['iso_9001'];
        $surat_pernyataan=$smm['surat_pernyataan'];
        $sertifikat_iso=$smm['sertifikat_iso'];
        $created=$smm['created'];
        $creator=$smm['creator'];
        $updated=$smm['updated'];
        $select_smm="REPLACE INTO lsbu_smm(
          NIB,
          nomor_sertifikat,
          surat_pernyataan,
          dokumen_pendukung,
          dokumen_smm,
          file_surat_pernyataan,
          sertifikat_iso,
          created,
          creator,
          updated)
          VALUES(
            '$nib',
            '$iso_9001',
            '$surat_pernyataan',
            '$dokumen_pendukung',
            '$dokumen_smm',
            '$file_surat_pernyataan',
            '$sertifikat_iso',
            '$created',
            '$creator',
            '$updated'
          )";
          $where="";
          $this->Bu_model->delete_opr($select_smm,$where);
      }
    }
    if(!empty($responses['akte'])){
      foreach($responses['akte'] as $akte){
        $no=$akte['no'];
        $no_sk=str_replace("'", '', $akte['nomor_pengesahan_sk_kumham']);

        $jenis=$akte['jenis'];
        $nama_notaris=$akte['nama_notaris'];
        $alamat_notaris2=stripslashes($akte['alamat_notaris']);
        $alamat_notaris=preg_replace("/'/", '', $alamat_notaris2);
        $hargasatuan=$akte['hargasatuan'];
        $id_kabupaten_notaris=$akte['id_kabupaten_notaris'];
        $id_provinsi_notaris=$akte['id_provinsi_notaris'];
        $modaldasar=$akte['modaldasar'];
        $modalsetor=$akte['modalsetor'];
        $nilaisaham=$akte['nilaisaham'];
        $maksudtujuan=$akte['maksudtujuan'];
        $tgl_akte=$akte['tgl_akte'];
        $file_doc=$akte['file_doc'];
        $file_ktp=$akte['file_ktp'];
        $file_npwp=$akte['file_npwp'];
        $created=$akte['created'];
        $creator=$akte['creator'];
        $updated=$akte['updated'];
        $select_akte="REPLACE INTO lsbu_akte(
          NIB,
          no,
          no_sk_kumham,
          jenis,
          nama_notaris,
          alamat_notaris,
          hargasatuan,
          id_kabupaten_notaris,
          id_provinsi_notaris,
          modaldasar,
          modalsetor,
          nilaisaham,
          tgl_akte,
          maksudtujuan,
          file_doc,
          file_ktp,
          file_npwp,
          created,
          creator,
          updated)
          VALUES(
            '$nib',
            '$no',
            '$no_sk',
            '$jenis',
            '$nama_notaris',
            '$alamat_notaris',
            '$hargasatuan',
            '$id_kabupaten_notaris',
            '$id_provinsi_notaris',
            '$modaldasar',
            '$modalsetor',
            '$nilaisaham',
            '$tgl_akte',
            '$maksudtujuan',
            '$file_doc',
            '$file_ktp',
            '$file_npwp',
            '$created',
            '$creator',
            '$updated'
          )";
          $where="";
          $this->Bu_model->delete_opr($select_akte,$where);
      }
    }
    $response = array(
                    'results'=>$responses,
                    'badan_usaha'=>$responses['badan_usaha']['nama_badan_usaha'],
                    'result'=>1
                  );
  }


      echo json_encode($response);
}
function get_subklasi(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }
  $post = $this->input->post();
  $nib=$this->security->xss_clean(trim($post['nib']));
  $sub_klasifikasi=$this->security->xss_clean(trim($post['tgl_permohonan']));
  $data_tinjau=$this->Bu_model->get_tinjau($nib,$sub_klasifikasi);
  $data=array(
    'record'=>$this->Bu_model->get_klasi($nib,$sub_klasifikasi),
    'asesor'=>$this->Bu_model->cek_pilih_asesorx($nib,$sub_klasifikasi),
    'list_tinjau'=>$this->Bu_model->get_tinjau2($data_tinjau[0]['user_status_1'])
  );
  echo json_encode($data);
}
function get_abu(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }
  $record=$this->Bu_model->token_api_siki();
  $token=$record[0]['token'];
  $url = "https://siki.pu.go.id/siki-api/v1/asesor-lsbu";

  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
  curl_setopt($curl, CURLOPT_HEADER, false);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  //curl_setopt($curl, CURLOPT_POSTFIELDS, $data);post
  curl_setopt($curl, CURLOPT_HTTPHEADER,array(
    "Content-type: application/json",
    "token: $token"
  ));
  $json_response = curl_exec($curl);
  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  if ( $status != 200) {
      die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
      $response = array(
                      'result'=>2,


                    );

  }else{
    curl_close($curl);
    $responses = json_decode($json_response, true);
    foreach($responses['data'] as $row){
      $id_asesor="'".$row['id_asesor']."'";
      $nama="'".$row['nama']."'";
      $nik="'".$row['nik']."'";
      $email="'".$row['email']."'";
      $select="REPLACE INTO user (Username,Password,Nama,Email,NIB,level) VALUE ($id_asesor,'801fc3',$nama,$email,$nik,'3')";
      $where="";
      $this->Bu_model->delete_opr($select,$where);
    }
    $response = array(
                    'result'=>1,


                  );
  }
  echo json_encode($response);
}
function get_simpk(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }


  $url= "http://mpk.binakonstruksi.pu.go.id/api/sdpk/kodefikasi";
  $nib=$this->session->userdata('id_user');
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
  curl_setopt($curl, CURLOPT_HEADER, false);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_HTTPHEADER,array("Content-type: application/json"));
  $json_response = curl_exec($curl);
  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  if ( $status != 200) {
      //die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
      $response = array(
                      'result'=>2,


                    );


  }else{
    $this->Bu_model->delete_master_peralatan();
    curl_close($curl);
    $responses = json_decode($json_response, true);
    foreach($responses as $row){
      $data=array(
        "kode"=>$row['kode'],
        "subvarian"=>$row['subvarian'],
        "varian"=>$row['varian'],
        "jenis"=>$row['jenis']
      );
      $tabel="lsbu_master_peralatan";
      $this->Bu_model->insert_sad($tabel,$data);
    }
    $response = array(
                    'result'=>1,


                  );
  }


      echo json_encode($response);
}

function get_api_lpjk(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }


  $url = "https://siki.pu.go.id/siki-api/login";
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_HTTPHEADER,array("Content-type: application/json"));
  curl_setopt($curl, CURLOPT_POSTFIELDS, '{
      "email":"lsbu.ptski@gmail.com",
      "password":"mpxJ@ZUmL"
  }');

  $json_response = curl_exec($curl);
  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  if ( $status != 200) {
      die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
      $response = array(
                      'result'=>2,


                    );
  }else{
    $this->Bu_model->delete_master_api();
    curl_close($curl);
    $responses = json_decode($json_response, true);
    //print_r($responses);

      $data=array(
        "username"=>$responses['username'],
        "email"=>$responses['email'],
        "token"=>$responses['token']
      );
      $tabel="lsbu_master_api";
      $this->Bu_model->insert_sad($tabel,$data);

    $response = array(
                    'result'=>1,


                  );
  }


      echo json_encode($response);
}





function list_banding(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){
  $data=$this->Bu_model->list_banding();
  $record=array();
  foreach ($data as $row) {
    $get=$this->Bu_model->get_revisi($row['NIB'],$row['tgl_permohonan']);
    if(empty($get)){
      $status="0";
    }else{
      foreach($get as $row_revisi){
        if($row_revisi['status']=='0'){
          $status="1";
          break;
        }else{
          $status="2";
        }
      }
    }
    $datax=array(
      'file_pembayaran'=>$row['file_pembayaran'],
      'biaya_lsbu'=>$row['biaya_lsbu'],
      'status_0'=>$row['status_0'],
      'concat_sub'=>$row['concat_sub'],
      'concat_klasifikasi'=>$row['concat_klasifikasi'],
      'concat_kualifikasi'=>$row['concat_kualifikasi'],
      'nama'=>$row['nama'],
      'NIB'=>$row['NIB'],
      'tgl_permohonan'=>$row['tgl_permohonan'],
      'propinsi'=>$row['concat_sub'],
      'tahun'=>$row['tahun'],
      'status_1'=>$row['status_1'],
      'status_2'=>$row['status_2'],
      'status_3'=>$row['status_3'],
      'stat'=>$status,
      'persyaratan'=>$row['persyaratan'],
    );
    array_push($record,$datax);
  }
  $this->data = array(
    'record'=>$record,

  );
  $this->template->load('menu/menu','sertifikasi/list_banding', $this->data);
}else{
  $this->session->set_flashdata('title','Warning');
  $this->session->set_flashdata('text','Anda tidak memiliki akses');
  $this->session->set_flashdata('class', "warning");
  redirect('login','refresh');
}
}
function banding($tgl_permohonan){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->badan_usaha()){
    $tgl = decrypt_url($tgl_permohonan);
    $nib=$this->session->userdata('id_user');
    $this->data = array(
      'tgl'=>$tgl_permohonan,
      'biodata'=>$this->Bu_model->biodata_opr($nib),
    );
    $this->template->load('menu/menu','sertifikasi/banding', $this->data);
  }else{
    $this->session->set_flashdata('title','Warning');
    $this->session->set_flashdata('text','Anda tidak memiliki akses');
    $this->session->set_flashdata('class', "warning");
    redirect('login','refresh');
  }
}
function turun_status_validasi(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){
    $post = $this->input->post();
    $nib=$this->security->xss_clean(trim($post['nib']));
    $tgl_permohonan=$this->security->xss_clean(trim($post['tgl_permohonan']));
    $data=array(
      'status_1'=>'0000-00-00',
      'user_status_1'=>''
    );

    $where=array(
      'NIB'=>$nib,
      'tgl_permohonan'=>$tgl_permohonan
    );
    $table="lsbu_registrasi_history";
    $this->Bu_model->delete_ceklis_verifikasi($nib,$tgl_permohonan);
    $this->Bu_model->update_edit($where,$table,$data);
    $this->output
    ->set_content_type('application/json')
    ->set_output(json_encode(array('result' => 1)));
  }
}
function turun_status_penunjukan(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){
    $post = $this->input->post();
    $nib=$this->security->xss_clean(trim($post['nib']));
    $tgl_permohonan=$this->security->xss_clean(trim($post['tgl_permohonan']));
    $data=array(
      'status_2'=>'0000-00-00',
      'user_status_2'=>''
    );

    $where=array(
      'NIB'=>$nib,
      'tgl_permohonan'=>$tgl_permohonan
    );
    $table="lsbu_registrasi_history";
    $this->Bu_model->delete_ceklis_validasi($nib,$tgl_permohonan);

    $this->Bu_model->update_edit($where,$table,$data);
    $this->output
    ->set_content_type('application/json')
    ->set_output(json_encode(array('result' => 1)));
  }
}
function turun_status_berita_acara(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){
    $post = $this->input->post();
    $nib=$this->security->xss_clean(trim($post['nib']));
    $tgl_permohonan=$this->security->xss_clean(trim($post['tgl_permohonan']));

    $table="lsbu_registrasi_history";
    $this->Bu_model->delete_penilaian($nib,$tgl_permohonan);
    $this->Bu_model->delete_ceklis_penilaian($nib,$tgl_permohonan);
    $this->Bu_model->delete_penunjukan($nib,$tgl_permohonan);
    $this->output
    ->set_content_type('application/json')
    ->set_output(json_encode(array('result' => 1)));
  }
}
function turun_status_tanda_terima(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){
    $post = $this->input->post();
    $nib=$this->security->xss_clean(trim($post['nib']));
    $tgl_permohonan=$this->security->xss_clean(trim($post['tgl_permohonan']));
    $data=array(
      'status_3'=>'0000-00-00',
      'user_status_3'=>''
    );
    $data2=array(
      'pemutus'=>'',
    );
    $where=array(
      'NIB'=>$nib,
      'tgl_permohonan'=>$tgl_permohonan
    );
    $table="lsbu_registrasi_history";
    $table2="lsbu_asesor_penilian";
    $this->Bu_model->update_edit($where,$table,$data);
    $this->Bu_model->update_edit($where,$table2,$data2);
    $this->output
    ->set_content_type('application/json')
    ->set_output(json_encode(array('result' => 1)));
  }
}

function perbaikan_kbli(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }
  $post = $this->input->post();
  $id_izin=$this->security->xss_clean(trim($post['id_izin']));
  $record=$this->Bu_model->token_api_siki();
  $token=$record[0]['token'];
  $url = "https://siki.pu.go.id/siki-api/v1/perbaikan-sbu/kbli";

  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_HTTPHEADER,array(
    "Content-type: application/json",
    "token: $token"
  ));

  $postData = [
    "id_izin" => $id_izin
];
  curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($postData));
  $json_response = curl_exec($curl);
  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  $responses = json_decode($json_response, true);
  curl_close($curl);
  if ( $status != 200) {
      //die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
      $response = array(
                      'result'=>2,


                    );

  }else{
    $table="lsbu_perbaikan_kbli";
    $data=array('status'=>'1');
    $where=array('id_izin'=>$id_izin);
    $this->Bu_model->update_edit($where,$table,$data);
    $response = array(
                    'result'=>1,


                  );
  }
  echo json_encode($response);
}

function tolak_permohonan(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){

  $post = $this->input->post();
  $nib=$this->security->xss_clean(trim($post['nib']));
  $sub_klasifikasi=$this->security->xss_clean(trim($post['tgl_permohonan']));
  $reason=$this->security->xss_clean(trim($post['comment_penolakan']));
  $id_user=$this->session->userdata('id_user');
  $upload=NULL;
  if($_FILES['file_tolak']['name'])
  {
    $this->load->library('upload');
    $id_user=$this->session->userdata('id_user');
    $nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
    $config['upload_path'] = './assets/bukti/badan_usaha/bukti_penolakan';
    $config['allowed_types'] = 'pdf|jpg|jpeg|png';
    $config['overwrite'] = TRUE;
    $config['file_name'] = $nmfile;
    $this->upload->initialize($config);
    if($this->upload->do_upload('file_tolak')){
      $gbr = $this->upload->data();
      $filename=$gbr['file_name'];
      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
      $alamat="./assets/bukti/badan_usaha/bukti_penolakan/";

      $upload=$gbr['file_name'];
    }
  }
  $select = "INSERT IGNORE INTO lsbu_registrasi_history_hapus(NIB,tgl_permohonan,sub_klasifikasi,propinsi,tahun,status_0,status_1,status_2,status_3,user_status_1,user_status_2,user_status_3,file_pembayaran,file_perjanjian,tgl_penghapusan,reason,bukti_hapus,user_hapus) SELECT NIB,tgl_permohonan,sub_klasifikasi,propinsi,tahun,status_0,status_1,status_2,status_3,user_status_1,user_status_2,user_status_3,file_pembayaran,file_perjanjian,now(),'$reason','$upload','$id_user' FROM lsbu_registrasi_history";
  $where = "WHERE NIB='$nib' AND sub_klasifikasi='$sub_klasifikasi'";
  $insert=$this->Bu_model->delete_opr($select,$where);

  $select = "INSERT IGNORE INTO lsbu_registrasi_hapus(NIB,id_klasifikasi,id_sub_klasifikasi,kualifikasi,asosiasi,user_pemohon,id_permohonan,tgl_permohonan,nomor_kbli,sifat_badanusaha,user_email,user_hp,created,creator,updated,Log) SELECT NIB,id_klasifikasi,id_sub_klasifikasi,kualifikasi,asosiasi,user_pemohon,id_permohonan,tgl_permohonan,nomor_kbli,sifat_badanusaha,user_email,user_hp,created,creator,updated,Log FROM lsbu_registrasi";
  $where = "WHERE NIB='$nib' AND id_sub_klasifikasi='$sub_klasifikasi'";
  $insert=$this->Bu_model->delete_opr($select,$where);

  $select = "INSERT IGNORE INTO lsbu_ceklis_hapus(NIB,tgl_permohonan,sub_klasifikasi,status,id,ceklis,comment,Log) SELECT NIB,tgl_permohonan,sub_klasifikasi,status,id,ceklis,comment,Log FROM lsbu_ceklis";
  $where = "WHERE NIB='$nib' AND sub_klasifikasi='$sub_klasifikasi'";
  $insert=$this->Bu_model->delete_opr($select,$where);

  $select2 = "INSERT IGNORE INTO lsbu_asesor_penilaian_hapus(NIB,tgl_permohonan,id_sub_klasifikasi,id_asesor,id_klasifikasi,id_sub_klasifikasi,kualifikasi,hasil_akhir,pemutus,kd,comment,tgl_penilaian,tgl_hapus,reason,bukti_hapus) SELECT NIB,tgl_permohonan,id_sub_klasifikasi,id_asesor,id_klasifikasi,id_sub_klasifikasi,kualifikasi,hasil_akhir,pemutus,kd,comment,tgl_penilaian,now(),'$reason','$upload' FROM lsbu_asesor_penilaian";
  $where2 = "WHERE NIB='$nib' AND tgl_permohonan='$sub_klasifikasi'";
  //$insert2=$this->Bu_model->delete_opr($select2,$where2);

  $select3 = "INSERT IGNORE INTO lsbu_ceklis_asesor_hapus(NIB,tgl_permohonan,id_sub_klasifikasi,id_asesor,id,ceklis,comment,Log,tgl_hapus,reason,bukti_hapus) SELECT NIB,tgl_permohonan,id_sub_klasifikasi,id_asesor,id,ceklis,comment,Log,now(),'$reason','$upload' FROM lsbu_ceklis_asesor";
  $where3 = "WHERE NIB='$nib' AND tgl_permohonan='$sub_klasifikasi'";
  //$insert3=$this->Bu_model->delete_opr($select3,$where3);

  $select4 = "INSERT IGNORE INTO lsbu_asesor_penunjukan_hapus(NIB,id_asesor,tgl_permohonan,status,username,tglupdate,tgl_hapus,reason,bukti_hapus) SELECT NIB,id_asesor,tgl_permohonan,status,username,tglupdate,now(),'$reason','$upload' FROM lsbu_asesor_penunjukan";
  $where4 = "WHERE NIB='$nib' AND tgl_permohonan='$sub_klasifikasi'";
  //$insert4=$this->Bu_model->delete_opr($select4,$where4);

  $nib_dec=encrypt_url($nib);
  $sub_klasifikasi_dec=encrypt_url($sub_klasifikasi);
  $record=$this->Bu_model->klasifikasi_kualifikasi_opr($nib,$sub_klasifikasi);
  $email=$record[0]['user_email'];
  $subject="Perbaikan data";
  $pre_header="Data perlu diperbaiki";
  $send=$this->send($email,$subject,$reason,$pre_header);
  if($send=="Success"){
    $this->post_status_11($nib_dec,$sub_klasifikasi_dec,$reason);
        $this->Bu_model->delete_permohonan($nib,$sub_klasifikasi);
        $this->Bu_model->delete_permohonan_registrasi($nib,$sub_klasifikasi);

        $this->Bu_model->delete_ceklis($nib,$sub_klasifikasi);
        $this->Bu_model->update_perbaikan($nib,$sub_klasifikasi);
        $this->session->set_flashdata('title','Success');
        $this->session->set_flashdata('text','Permohonan berhasil dikembalikan');
        $this->session->set_flashdata('class', "success");
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('result' => 1)));
        //redirect('sertifikasi/list_tinjauan_permohonan','refresh');
        //$this->Bu_model->delete_penilaian($nib,$tgl_permohonan);
        //$this->Bu_model->delete_ceklis_penilaian($nib,$tgl_permohonan);
        //$this->Bu_model->delete_penunjukan($nib,$tgl_permohonan);
  }else{
    $this->session->set_flashdata('title','Failed');
    $this->session->set_flashdata('text',$send);
    $this->session->set_flashdata('class', "success");
    $this->output
    ->set_content_type('application/json')
    ->set_output(json_encode(array('result' => 2)));
    print_r($send);
  }



}
}

function insert_pembayaran(){
  $post = $this->input->post();
  $id1=$this->security->xss_clean(trim($post['tgl_permohonan']));
  $sub_klasifikasi=decrypt_url($id1);
  $id2=$this->security->xss_clean(trim($post['nib']));
  $nib=decrypt_url($id2);
  $check=$this->Bu_model->get_izin_registrasi($nib,$sub_klasifikasi);
  if(!empty($check)){


  $table_upload='bu_persyaratan';
  $upload=NULL;
  $uploadx=NULL;
  if($_FILES['file_pembayaran']['name'])
  {
    $this->load->library('upload');
    $id_user=$this->session->userdata('id_user');
    $nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
    $config['upload_path'] = './assets/bukti/badan_usaha/bukti_pembayaran';
    $config['allowed_types'] = 'pdf|jpg|jpeg|png';
    $config['overwrite'] = TRUE;
    $config['file_name'] = $nmfile;
    $this->upload->initialize($config);
    if($this->upload->do_upload('file_pembayaran')){
      $gbr = $this->upload->data();
      $filename=$gbr['file_name'];
      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
      $alamat="./assets/bukti/badan_usaha/file_pembayaran/";

      $upload=$gbr['file_name'];
    }
  }
  if($_FILES['file_perjanjian']['name'])
  {
    $this->load->library('upload');
    $id_user=$this->session->userdata('id_user');
    $nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
    $configx['upload_path'] = './assets/bukti/badan_usaha/bukti_perjanjian';
    $configx['allowed_types'] = 'pdf|jpg|jpeg|png';
    $configx['overwrite'] = TRUE;
    $configx['file_name'] = $nmfile;
    $this->upload->initialize($configx);
    if($this->upload->do_upload('file_perjanjian')){
      $gbr = $this->upload->data();
      $filename=$gbr['file_name'];
      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
      $alamat="./assets/bukti/badan_usaha/bukti_perjanjian/";

      $uploadx=$gbr['file_name'];
    }
  }
  if(!empty($upload)){

    $data=array(
      'file_pembayaran'=>$upload,
      'file_perjanjian'=>$uploadx
    );
    $where=array(
      'NIB'=> $nib,
      'sub_klasifikasi'=>$sub_klasifikasi
    );
    $table="lsbu_registrasi_history";
    $insert=$this->Bu_model->update_edit($where,$table,$data);
    if($insert=="Success"){
      $record=$this->Bu_model->token_api_siki();
      $token=$record[0]['token'];
      $id_izin=$check[0]['id_izin'];

      $url = "https://siki.pu.go.id/siki-api/v1/permohonan-sbu/$id_izin";
      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_HTTPHEADER,array(
        "Content-type: application/json",
        "token: $token"
      ));

      curl_setopt($curl, CURLOPT_POSTFIELDS, '{
          "kd_status":"30",
          "keterangan":"Verifikasi Pembayaran"
      }');

      $json_response = curl_exec($curl);
      $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
      if ( $status != 200) {
          //die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));

          $response = array(
                         'result'=>2,

                       );



      }else{
        $data_awal=array(
          'status'=>'30'
        );
        $where_awal=array(
          'nib'=>$nib,
          'id_sub_klasifikasi'=>$sub_klasifikasi
        );
        $table_awal="lsbu_permohonan_masuk";
        $this->Bu_model->update_edit($where_awal,$table_awal,$data_awal);

        $response = array(
                       'result'=>1,

                     );
      }


      $this->session->set_flashdata('title','Success');
      $this->session->set_flashdata('text','Pembayaran Berhasil Di Input');
      $this->session->set_flashdata('class', "success");
      $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode(array('result' => 1)));
      redirect('sertifikasi/biaya_sertifikasi/'.$id2."/".$id1,'refresh');

    }else{
      $this->session->set_flashdata('title','Failed');
      $this->session->set_flashdata('text','Pembayaran Gagal Di Input');
      $this->session->set_flashdata('class', "error");
      $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode(array('result' => 1)));
      redirect('sertifikasi/biaya_sertifikasi/'.$id2."/".$id1,'refresh');
    }
  }else{
    $this->session->set_flashdata('title','Failed');
    $this->session->set_flashdata('text','Pembayaran Gagal Di Upload');
    $this->session->set_flashdata('class', "error");
    $this->output
    ->set_content_type('application/json')
    ->set_output(json_encode(array('result' => 1)));
    redirect('sertifikasi/biaya_sertifikasi/'.$id2."/".$id1,'refresh');
  }
}
}
function cetak_tim_pemutus()
{
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){
    $nib_dec=$this->session->userdata('nib_dec');
    $tgl_dec=$this->session->userdata('tgl_dec');
    $nib=decrypt_url($nib_dec);
    $tgl_permohonan=decrypt_url($tgl_dec);
    $tanggal = date('Y-m-d');
    $hari   = date('l', microtime($tanggal));
    $this->load->library('pdfgenerator');
    $rec=$this->Bu_model->check_permohonan($nib,$tgl_permohonan);
    $panjang=strlen($rec[0]['no_urut']);
    $jumlah=5-$panjang;
    $bulan=$month = date("m",strtotime($tanggal));
    $tahun=$month = date("Y",strtotime($tanggal));
    $bulan_romawi=$this->getBulanrw($bulan);
    $nol='';
    for($i=0;$i<$jumlah;$i++){
      $nol=$nol.'0';
    }
    $no_surat=$nol.$rec[0]['no_urut'].'/SKP/'.$bulan_romawi.'/'.$tahun;

    $hari_indonesia = array('Monday'  => 'Senin',
     'Tuesday'  => 'Selasa',
     'Wednesday' => 'Rabu',
     'Thursday' => 'Kamis',
     'Friday' => 'Jumat',
     'Saturday' => 'Sabtu',
     'Sunday' => 'Minggu');
    $data=array(
      'no_surat'=>$no_surat,
      'bulan'=>$this->getBulan(date("m")),
      'hari'=>$hari_indonesia[$hari],
       'record'=>$this->Bu_model->berita_acara($nib,$tgl_permohonan),
       'biodata'=>$this->Bu_model->biodata_opr($nib),
       'pengurus'=>$this->Bu_model->pengurus_opr($nib),
       'komite'=>$this->Bu_model->get_komite_teknis($nib,$tgl_permohonan)

     );

    $html = $this->load->view('sertifikasi/berita_acara_tim_pemutus', $data, true);
    $filename = 'report_'.time();
    //$this->load->view('sertifikasi/berita_acara_tim_pemutus',$data);

    $this->pdfgenerator->generate($html, $filename, true, 'A3', 'portrait');
  }
}
function hasil_tim_pemutus($nib_dec,$tgl_dec)
{
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){

    $nib=decrypt_url($nib_dec);
    $tgl_permohonan=decrypt_url($tgl_dec);
    $tanggal = date('Y-m-d');
    $this->load->library('pdfgenerator');
    $rec=$this->Bu_model->check_permohonan($nib,$tgl_permohonan);
    $hari  = date('l', strtotime($rec[0]['status_2']));
    $bulan_cetak=date("m",strtotime($rec[0]['status_2']));
    $bulan_bulan_cetak_romawi=$this->getBulan($bulan_cetak);
    $tgl_cetak=date("d",strtotime($rec[0]['status_2']));
    $tahun_cetak=date("Y",strtotime($rec[0]['status_2']));
    $panjang=strlen($rec[0]['no_urut']);
    $jumlah=5-$panjang;
    $bulan=$month = date("m",strtotime($tanggal));
    $tahun=$month = date("Y",strtotime($tanggal));
    $bulan_romawi=$this->getBulanrw($bulan);
    $nol='';
    for($i=0;$i<$jumlah;$i++){
      $nol=$nol.'0';
    }
    $no_surat=$nol.$rec[0]['no_urut'].'/BA-SKP/'.$bulan_romawi.'/'.$tahun;

    $hari_indonesia = array('Monday'  => 'Senin',
     'Tuesday'  => 'Selasa',
     'Wednesday' => 'Rabu',
     'Thursday' => 'Kamis',
     'Friday' => 'Jumat',
     'Saturday' => 'Sabtu',
     'Sunday' => 'Minggu');
    $data=array(
      'bulan_cetak'=>$bulan_bulan_cetak_romawi,
      'tgl_cetak'=>$tgl_cetak,
      'tahun_cetak'=>$tahun_cetak,
      'no_surat'=>$no_surat,
      'bulan'=>$this->getBulan(date("m")),
      'hari'=>$hari_indonesia[$hari],
       'record'=>$this->Bu_model->berita_acara($nib,$tgl_permohonan),
       'biodata'=>$this->Bu_model->biodata_opr($nib),
       'pengurus'=>$this->Bu_model->pjbu_opr($nib),
       'komite'=>$this->Bu_model->get_komite_teknis($nib,$tgl_permohonan)

     );

    $html = $this->load->view('sertifikasi/berita_acara_tim_pemutus', $data, true);
    $filename = 'report_'.time();
    //$this->load->view('sertifikasi/berita_acara_tim_pemutus',$data);

    $this->pdfgenerator->generate($html, $filename, true, 'A3', 'landscape');
  }
}
function post_penunjukan($nib,$tgl_permohonan,$record){
  $tgl_perm=$record[0]['tgl_permohonan'];
  $rec=$this->Bu_model->check_permohonan($nib,$tgl_permohonan);
  $bulan=$month = date("m",strtotime($tgl_perm));
  $tahun=$month = date("Y",strtotime($tgl_perm));

  $bulan_romawi=$this->getBulanrw($bulan);
  $panjang=strlen($rec[0]['no_urut']);
  $jumlah=5-$panjang;
  $nol='';
  for($i=0;$i<$jumlah;$i++){
    $nol=$nol.'0';
  }
  $no_surat=$nol.$rec[0]['no_urut'].'/SPA/'.$bulan_romawi.'/'.$tahun;
  $record_permohonan=$this->Bu_model->check_penunjukan_post($nib,$tgl_permohonan);
  $asesor1=$record_permohonan[0]['id_asesor'];
  $asesor2=$record_permohonan[1]['id_asesor'];


  $record_2=$this->Bu_model->token_api_siki();
  $token=$record_2[0]['token'];
  foreach($record as $row){
    $id_izin=$row['id_izin'];


  $url = "https://siki.pu.go.id/siki-api/v1/asesor-lsbu-penugasan/$id_izin";
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_HTTPHEADER,array(
    "Content-type: application/json",
    "token: $token"
  ));

  $postData = [ "nomor_surat_tugas" => "$no_surat",
    "id_asesor_1" => "$asesor1",
    "id_asesor_2" => "$asesor2"
];
  curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($postData));

  $json_response = curl_exec($curl);
  $responses = json_decode($json_response, true);
  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  if ( $status != 200) {
    // die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
    $data="Failed";
  }else{

    $data="Success";
  }
  curl_close($curl);
}




}
function post_penilaian($nib,$tgl_permohonan,$record){
  $id_izin=$record[0]['id_izin'];
  $record_penilaian=$this->Bu_model->berita_acara2($nib,$tgl_permohonan);

  $record_2=$this->Bu_model->token_api_siki();
  $token=$record_2[0]['token'];
  foreach ($record_penilaian as $row) {
    $penjualan_tahunan=$row['penjualan_tahunan'];
    $peralatan=$row['peralatan'];
    $smap=$row['smap'];
    $smm=$row['smm'];
    $tk=$row['tk'];
    $aset=$row['aset'];
    $id_asesor=$row['id_asesor'];

    $url = "https://siki.pu.go.id/siki-api/v1/asesor-lsbu-penilaian/$id_izin";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER,array(
      "Content-type: application/json",
      "token: $token"
    ));

    $postData = [ "id_asesor" => "$id_asesor",
      "penjualan_tahunan" => "$penjualan_tahunan",
      "keuangan" => "$aset",
      "tenaga_kerja" => "$tk",
      "peralatan" => "$peralatan",
      "smm" => "$smm",
      "smap" => "$smap",
      "catatan" =>"."
    ];
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($postData));

    $json_response = curl_exec($curl);
    $responses = json_decode($json_response, true);
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    if ($status != 200) {
       //die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
      $data="Failed";
    }else{
      $data="Success";
    }
    curl_close($curl);

  }

}
function insert_pemutus()
{
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){
    $id_user=$this->session->userdata('id_user');
    $post = $this->input->post();
    $nib = $this->security->xss_clean(trim($post['nib']));
    $sub_klasifikasi = $this->security->xss_clean(trim($post['tgl_permohonan']));
    $komite_1 = $this->security->xss_clean(trim($post['teknis_1']));

    $komite_2 = $this->security->xss_clean(trim($post['teknis_2']));

    $komite_3 = $this->security->xss_clean(trim($post['teknis_3']));

    $nib_dec=encrypt_url($nib);
    $tgl_dec=encrypt_url($sub_klasifikasi);
    $sessionarrayx = array(
      'nib_dec' => $nib_dec,
      'tgl_dec' => $tgl_dec,
    );
    $this->session->set_userdata($sessionarrayx);
    $record=$this->Bu_model->get_klasi($nib,$sub_klasifikasi);

    $this->post_penunjukan($nib,$sub_klasifikasi,$record);
    $this->post_penilaian($nib,$sub_klasifikasi,$record);



    $rec=$this->Bu_model->check_permohonan($nib,$sub_klasifikasi);
    $tgl_perm=$rec[0]['tgl_permohonan'];
    $bulan=$month = date("m",strtotime($tgl_perm));
    $tahun=$month = date("Y",strtotime($tgl_perm));

    $bulan_romawi=$this->getBulanrw($bulan);
    $panjang=strlen($rec[0]['no_urut']);
    $jumlah=5-$panjang;
    $nol='';
    for($i=0;$i<$jumlah;$i++){
      $nol=$nol.'0';
    }
    $no_surat_evaluator=$nol.$rec[0]['no_urut'].'/SPK/'.$bulan_romawi.'/'.$tahun;
    $no_surat_pemutus=$nol.$rec[0]['no_urut'].'/SPK/'.$bulan_romawi.'/'.$tahun;
    $komite_nama=$komite_1a.', '.$komite_2.', '.$komite_3;
    $recordv=$this->Bu_model->token_api_siki();
    $token=$recordv[0]['token'];
    foreach ($record as $row) {
      $id_izin=$row['id_izin'];
      $hasil=$this->security->xss_clean(trim($post['result'.$row['id_sub_klasifikasi']]));
      $peralatan=$this->security->xss_clean(trim($post['peralatan'.$row['id_sub_klasifikasi']]));
      $penjualan_tahunan=$this->security->xss_clean(trim($post['penjualan_tahunan'.$row['id_sub_klasifikasi']]));
      $smm=$this->security->xss_clean(trim($post['smm'.$row['id_sub_klasifikasi']]));
      $smap=$this->security->xss_clean(trim($post['smap'.$row['id_sub_klasifikasi']]));

      //EVALUATOR
      $url = "https://siki.pu.go.id/siki-api/v1/lsbu-evaluasi-rekomendasi/$id_izin";
      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_HTTPHEADER,array(
        "Content-type: application/json",
        "token: $token"
      ));

      $postData = [ "nomor_surat_tugas" => "$no_surat_evaluator",
        "nama_anggota_tim_evaluasi" => "$komite_nama",
        "hasil_evaluasi" => "$hasil",
        "catatan" => "."
      ];
      curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($postData));

      $json_response = curl_exec($curl);
      $responses = json_decode($json_response, true);
      $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
      if ($status != 200) {
         die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));

        $data="Failed";
      }else{
        $data="Success";
      }
      curl_close($curl);
      //PEMUTUS
      $url = "https://siki.pu.go.id/siki-api/v1/pemutus-lsbu-keputusan/$id_izin";
      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_HTTPHEADER,array(
        "Content-type: application/json",
        "token: $token"
      ));

      $postData = [ "nomor_surat_tugas" => "$no_surat_pemutus",
        "nama_anggota_tim_pemutus" => "$komite_nama",
        "keputusan" => "$hasil",
        "catatan" => "."
      ];
      curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($postData));

      $json_response = curl_exec($curl);
      $responses = json_decode($json_response, true);
      $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
      if ($status != 200) {
        // die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));

        $data="Failed";
      }else{
        $data="Success";
      }
      curl_close($curl);


        $data=array(
          'pemutus'=>$hasil,
          'pemenuhan_peralatan'=>$peralatan,
          'pemenuhan_penjualan_tahunan'=>$penjualan_tahunan,
          'pemenuhan_smm'=>$smm,
          'pemenuhan_smap'=>$smap
        );
      $where=array(
        'NIB'=>$nib,
        'id_sub_klasifikasi'=>$row['id_sub_klasifikasi']
      );
      $table="lsbu_asesor_penilaian";
      $this->Bu_model->update_edit($where,$table,$data);

    }
    $this->Bu_model->pemutus_update($nib,$sub_klasifikasi);
    $select="REPLACE INTO lsbu_komite_teknis (NIB,tgl_permohonan,sub_klasifikasi,komite_1,komite_2,komite_3) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$komite_1','$komite_2','$komite_3')";
    $where="";
    $this->Bu_model->delete_opr($select,$where);

     $response = array(
 										'status'=>1,

 									);

 				echo json_encode($response);


  }

}
function cetak_rekomendasi($id1,$id2)
{
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){
    $id_user=$this->session->userdata('id_user');
    $post = $this->input->post();
    $nib = decrypt_url($id1);
    $tgl_permohonan = decrypt_url($id2);


    $tanggal = date('Y-m-d');
    $hari   = date('l', microtime($tanggal));
    $record=$this->Bu_model->berita_acara2($nib,$tgl_permohonan);
    $record_klasifikasi=$this->Bu_model->klasifikasi_kualifikasi_opr_penilaian($nib,$tgl_permohonan);
    $data_nilai=array();
    $hari_indonesia = array('Monday'  => 'Senin',
   'Tuesday'  => 'Selasa',
   'Wednesday' => 'Rabu',
   'Thursday' => 'Kamis',
   'Friday' => 'Jumat',
   'Saturday' => 'Sabtu',
   'Sunday' => 'Minggu');
   $i = 0;
   for ($x = 0; $x < count($record_klasifikasi); $x++) {
     if (count($data_nilai) == 0) {
       $data_nilai[$i] = array(
         'id_sub_klasifikasi' => $record_klasifikasi[$x]['id_sub_klasifikasi'],
         'count' => 0,
         'hasil_akhir' => 'TRUE',
         'nomor_kbli'=>$record_klasifikasi[$x]['nomor_kbli'],
         'deskripsi_subklasifikasi'=>$record_klasifikasi[$x]['deskripsi_subklasifikasi'],
         'id_izin'=>$record_klasifikasi[$x]['id_izin'],
         'id_klasifikasi'=>$record_klasifikasi[$x]['id_klasifikasi'],
         'kualifikasi'=>$record_klasifikasi[$x]['kualifikasi'],
         'id_permohonan'=>$record_klasifikasi[$x]['id_permohonan'],
       );
       foreach ($record as $row) {
         if ($record_klasifikasi[$x]['id_sub_klasifikasi'] == $row['id_sub_klasifikasi']) {
           $data_nilai[$i]['count'] = $data_nilai[$i]['count'] + 1;
           if ($row['pemutus'] == 0) {
             $data_nilai[$i]['hasil_akhir'] = 'FALSE';
           }
         }
       }
     } else {
       $i = $i + 1;
       $data_nilai[$i] = array(
         'id_sub_klasifikasi' => $record_klasifikasi[$x]['id_sub_klasifikasi'],
         'count' => 0,
         'hasil_akhir' => 'TRUE',
         'nomor_kbli'=>$record_klasifikasi[$x]['nomor_kbli'],
         'deskripsi_subklasifikasi'=>$record_klasifikasi[$x]['deskripsi_subklasifikasi'],
         'id_izin'=>$record_klasifikasi[$x]['id_izin'],
         'id_klasifikasi'=>$record_klasifikasi[$x]['id_klasifikasi'],
         'kualifikasi'=>$record_klasifikasi[$x]['kualifikasi'],
         'id_permohonan'=>$record_klasifikasi[$x]['id_permohonan'],

       );
       foreach ($record as $row) {
         if ($record_klasifikasi[$x]['id_sub_klasifikasi'] == $row['id_sub_klasifikasi']) {
           $data_nilai[$i]['count'] = $data_nilai[$i]['count'] + 1;
           if ($row['hasil_akhir'] == 0) {
             $data_nilai[$i]['hasil_akhir'] = 'FALSE';
           }
         }
       }
     }
   }
    $this->load->library('pdfgenerator');

    $data_x=array(
        'bulan'=>$this->getBulan(date("m")),
        'hari'=>$hari_indonesia[$hari],
        'record2'=>$record,
        'record'=>$data_nilai,
        'biodata'=>$this->Bu_model->biodata_opr($nib),
        'pengurus'=>$this->Bu_model->pjbu_opr($nib),
     );
     $record_token=$this->Bu_model->token_api_siki();
     $token=$record_token[0]['token'];


     foreach($data_nilai as $row_final){
       if($row_final['hasil_akhir']=="TRUE"){
         $id_sub_klasifikasi=$row_final['id_sub_klasifikasi'];

         foreach ($record as $rows){
           if($rows['id_sub_klasifikasi']==$id_sub_klasifikasi){

             $penjualan_tahunan=$rows['pemenuhan_penjualan_tahunan'];
             $peralatan=$rows['pemenuhan_peralatan'];
             $smm=$rows['pemenuhan_smm'];
             $smap=$rows['pemenuhan_smap'];
             break;
           }
         }


         $id_izin=$row_final['id_izin'];

         $url = "https://siki.pu.go.id/siki-api/v1/pencatatan-sbu/$id_izin";
         $curl = curl_init($url);
         curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
         curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
         curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
         curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
         curl_setopt($curl, CURLOPT_HTTPHEADER,array(
           "Content-type: application/json",
           "token: $token"
         ));

         curl_setopt($curl, CURLOPT_POSTFIELDS, '{
           "file_lampiran":{
                "kelengkapan_peralatan":"'.$peralatan.'",
                "laporan_kegiatan_usaha_tahunan":"'.$penjualan_tahunan.'",
                "sistem_manajemen_mutu":"'.$smm.'",
                "sistem_manajemen_anti_penyuapan":"'.$smap.'"
            }
         }');

         $json_response = curl_exec($curl);
         $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
         if ( $status != 200) {
           die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));

             $data="Failed";


         }else{



           $data="Success";

         }

       }
     }
     $data_awal=array(
       'status'=>'50'
     );
     $where_awal=array(
       'nib'=>$nib,
       'tgl_permohonan'=>$tgl_permohonan
     );
     $table_awal="lsbu_permohonan_masuk";

     $this->Bu_model->update_edit($where_awal,$table_awal,$data_awal);
     $this->Bu_model->rekomendasi_update($nib,$tgl_permohonan);
     $html = $this->load->view('sertifikasi/rekomendasi', $data_x, true);
     $filename = 'report_'.time();
     //$this->load->view('sertifikasi/rekomendasi',$data_x);

     $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
  }

}
function berita_acara_asesor($id1,$id2,$id3)
{
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->asesor()){
    $tgl = decrypt_url($id2);
    $nib= decrypt_url($id1);
    $id_asesor=decrypt_url($id3);
  $this->load->library('pdfgenerator');
  $data=array(
    'asesor'=>$this->Bu_model->cek_pilih_asesor3($nib,$tgl,$id_asesor),
    'biodata'=>$this->Bu_model->biodata_opr($nib,$tgl),
    'record'=>$this->Bu_model->berita_acara3($nib,$tgl,$id_asesor),
   );
   $html = $this->load->view('sertifikasi/berita_acara_asesor', $data, true);
   $filename = 'report_'.time();
   $this->pdfgenerator->generate($html, $filename, true, 'A3', 'landscape');
   //$this->load->view('report/tt_asosiasi_bu_ceklis',$data);
 }else{
  $this->session->set_flashdata('title','Warning');
  $this->session->set_flashdata('text','Anda tidak memiliki akses');
  $this->session->set_flashdata('class', "warning");
  redirect('login','refresh');
}
}
function cetak_penilaian_asesor($id1,$id2,$id3){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->asesor()){
    $sub_klasifikasi = decrypt_url($id2);
    $nib= decrypt_url($id1);
    $id_asesor= decrypt_url($id3);
    $status="1";
    $record=$this->Bu_model->get_ceklis_asesor($nib,$sub_klasifikasi,$id_asesor);
    $rec=$this->Bu_model->check_penunjukan($nib,$sub_klasifikasi,$id_asesor);
    $stat="FALSE";
    foreach ($rec as $row) {
      if($row['status']=='1'){
        $stat='TRUE';
      }
    }
    if($stat=='TRUE'){
      $klasifikasi=$this->Bu_model->klasifikasi_kualifikasi_opr($nib,$sub_klasifikasi);
    }else{
      $klasifikasi=$this->Bu_model->klasifikasi_kualifikasi_opr_menengah_besar($nib,$sub_klasifikasi);

    }
    $this->load->library('pdfgenerator');
    $this->data = array(
      'ceklis'=>$record,
      'tgl'=>$tgl,
      'pjbu_asesor'=>$this->Bu_model->pjbu_asesor($nib,$sub_klasifikasi,$id_asesor),
      'pjskbu_asesor'=>$this->Bu_model->pjskbu_asesor($nib,$sub_klasifikasi,$id_asesor),
      'pjtbu_asesor'=>$this->Bu_model->pjtbu_asesor($nib,$sub_klasifikasi,$id_asesor),
      'biodata_penjualan'=>$this->Bu_model->asesor_penjualan_tahunan($nib,$sub_klasifikasi,$id_asesor),
      'administrasi_asesor'=>$this->Bu_model->administrasi_asesor($nib,$sub_klasifikasi,$id_asesor),
      'pengurus_asesor'=>$this->Bu_model->pengurus_asesor($nib,$sub_klasifikasi,$id_asesor),
      'saham_asesor'=>$this->Bu_model->saham_asesor($nib,$sub_klasifikasi,$id_asesor),
      'akte_asesor'=>$this->Bu_model->akte_asesor($nib,$sub_klasifikasi,$id_asesor),
      'asesor'=>$this->Bu_model->cek_pilih_asesor2($nib,$sub_klasifikasi),
      'biodata'=>$this->Bu_model->biodata_opr($nib),
      'pengurus'=>$this->Bu_model->pengurus_opr($nib),
      'penjualan_tahunan'=>$this->Bu_model->pengalaman_opr($nib,$sub_klasifikasi),
      'akte'=>$this->Bu_model->akte_opr($nib),
      'smm'=>$this->Bu_model->smm_opr($nib),
      'smap'=>$this->Bu_model->smap_opr($nib),
      'keuangan_asesor'=>$this->Bu_model->neraca_keuangan($nib,$sub_klasifikasi,$id_asesor),
      'sk_kehakiman'=>$this->Bu_model->sk_kehakiman_opr($nib),
      'neraca'=>$this->Bu_model->neraca_ski($nib),
      'neraca_asesor'=>$this->Bu_model->neraca_asesor($nib,$sub_klasifikasi,$id_asesor),
      'smm_asesor'=>$this->Bu_model->smm_asesor($nib,$sub_klasifikasi,$id_asesor),
      'smap_asesor'=>$this->Bu_model->smap_asesor($nib,$sub_klasifikasi,$id_asesor),
      'pemegang_saham'=>$this->Bu_model->pemegang_saham_opr($nib),
      'pjbu'=>$this->Bu_model->pjbu_opr($nib),
      'pjskbu'=>$this->Bu_model->pjskbu_opr($nib,$sub_klasifikasi),
      'pjtbu'=>$this->Bu_model->pjtbu_opr($nib,$sub_klasifikasi),
      'peralatan'=>$this->Bu_model->peralatan_opr($nib,$sub_klasifikasi),
      'klasifikasi'=>$klasifikasi,
      'nib_dec'=>$id1,
      'tgl_dec'=>$id2,
      'data_penilaian'=>$this->Bu_model->berita_acara_penilaian($nib,$sub_klasifikasi,$id_asesor)

    );
    $html = $this->load->view('sertifikasi/asesor_ceklis_2', $this->data, true);
    $filename = 'report_'.time();

    $this->pdfgenerator->generate($html, $filename, true, 'A3', 'landscape');
    //$this->load->view('sertifikasi/asesor_ceklis',$this->data);

  }else{
    $this->session->set_flashdata('title','Warning');
    $this->session->set_flashdata('text','Anda tidak memiliki akses');
    $this->session->set_flashdata('class', "warning");
    redirect('login','refresh');
  }
}
function cetak_penilaian_asesor2($id1,$id2,$id3){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->asesor()){
    $sub_klasifikasi = decrypt_url($id2);
    $nib= decrypt_url($id1);
    $id_asesor= decrypt_url($id3);
    $status="1";
    $record=$this->Bu_model->get_ceklis_asesor($nib,$sub_klasifikasi,$id_asesor);
    $rec=$this->Bu_model->check_penunjukan($nib,$sub_klasifikasi,$id_asesor);
    $stat="FALSE";
    foreach ($rec as $row) {
      if($row['status']=='1'){
        $stat='TRUE';
      }
    }
    if($stat=='TRUE'){
      $klasifikasi=$this->Bu_model->klasifikasi_kualifikasi_opr($nib,$sub_klasifikasi);
    }else{
      $klasifikasi=$this->Bu_model->klasifikasi_kualifikasi_opr_menengah_besar($nib,$sub_klasifikasi);

    }
    $this->load->library('pdfgenerator');
    $this->data = array(
      'ceklis'=>$record,
      'tgl'=>$tgl,
      'asesor'=>$this->Bu_model->cek_pilih_asesor2($nib,$sub_klasifikasi),
      'biodata'=>$this->Bu_model->biodata_opr($nib),
      'pengurus'=>$this->Bu_model->pengurus_opr($nib),
      'penjualan_tahunan'=>$this->Bu_model->pengalaman_opr($nib,$sub_klasifikasi),
      'akte'=>$this->Bu_model->akte_opr($nib),
      'smm'=>$this->Bu_model->smm_opr($nib),
      'smap'=>$this->Bu_model->smap_opr($nib),
      'sk_kehakiman'=>$this->Bu_model->sk_kehakiman_opr($nib),
      'neraca'=>$this->Bu_model->neraca_ski($nib),
      'neraca_asesor'=>$this->Bu_model->neraca_asesor($nib,$sub_klasifikasi,$id_asesor),
      'smm_asesor'=>$this->Bu_model->smm_asesor($nib,$sub_klasifikasi,$id_asesor),
      'smap_asesor'=>$this->Bu_model->smap_asesor($nib,$sub_klasifikasi,$id_asesor),
      'pemegang_saham'=>$this->Bu_model->pemegang_saham_opr($nib),
      'pjbu'=>$this->Bu_model->pjbu_opr($nib),
      'pjskbu'=>$this->Bu_model->pjskbu_opr($nib,$sub_klasifikasi),
      'pjtbu'=>$this->Bu_model->pjtbu_opr($nib,$sub_klasifikasi),
      'peralatan'=>$this->Bu_model->peralatan_opr($nib,$sub_klasifikasi),
      'klasifikasi'=>$klasifikasi,
      'nib_dec'=>$id1,
      'tgl_dec'=>$id2,
      'data_penilaian'=>$this->Bu_model->berita_acara_penilaian($nib,$sub_klasifikasi,$id_asesor)

    );
    $html = $this->load->view('sertifikasi/asesor_ceklis', $this->data, true);
    $filename = 'report_'.time();

    $this->pdfgenerator->generate($html, $filename, true, 'A3', 'landscape');
    //$this->load->view('sertifikasi/asesor_ceklis',$this->data);

  }else{
    $this->session->set_flashdata('title','Warning');
    $this->session->set_flashdata('text','Anda tidak memiliki akses');
    $this->session->set_flashdata('class', "warning");
    redirect('login','refresh');
  }
}
function cetak_pengurus_asesor($id1,$id2,$id3){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->asesor()){
    $tgl = decrypt_url($id2);
    $nib= decrypt_url($id1);
    $id_asesor= decrypt_url($id3);
    $status="1";
    $record=$this->Bu_model->get_ceklis_asesor($nib,$tgl,$id_asesor);
    $rec=$this->Bu_model->check_penunjukan($nib,$tgl,$id_asesor);
    $stat="FALSE";
    foreach ($rec as $row) {
      if($row['status']=='1'){
        $stat='TRUE';
      }
    }

    $this->load->library('pdfgenerator');
    $this->data = array(
      'ceklis'=>$record,
      'tgl'=>$tgl,
      'biodata'=>$this->Bu_model->biodata_opr($nib),
      'pengurus'=>$this->Bu_model->pengurus_opr($nib),

      'nib_dec'=>$id1,
      'tgl_dec'=>$id2,
    );
    $html = $this->load->view('sertifikasi/asesor_ceklis_pengurus', $this->data, true);
    $filename = 'report_'.time();

    $this->pdfgenerator->generate($html, $filename, true, 'A3', 'portrait');
    //$this->load->view('sertifikasi/verifikasi_ceklis',$this->data);

  }else{
    $this->session->set_flashdata('title','Warning');
    $this->session->set_flashdata('text','Anda tidak memiliki akses');
    $this->session->set_flashdata('class', "warning");
    redirect('login','refresh');
  }
}
function cetak_tk_asesor($id1,$id2,$id3){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->asesor() OR $this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){
    $sub_klasifikasi = decrypt_url($id2);
    $nib= decrypt_url($id1);
    $id_asesor= decrypt_url($id3);
    $status="1";
    $record=$this->Bu_model->get_ceklis_asesor($nib,$sub_klasifikasi,$id_asesor);


    $this->load->library('pdfgenerator');
    $this->data = array(
      'asesor'=>$this->Bu_model->cek_pilih_asesor2($nib,$sub_klasifikasi),

      'ceklis'=>$record,
      'tgl'=>$tgl,
      'biodata'=>$this->Bu_model->biodata_opr($nib),
      'pjbu'=>$this->Bu_model->pjbu_opr($nib),
      'pjskbu'=>$this->Bu_model->pjskbu_opr($nib,$sub_klasifikasi),
      'pjtbu'=>$this->Bu_model->pjtbu_opr($nib,$sub_klasifikasi),
      'asesor_pjtbu'=>$this->Bu_model->pjtbu_asesor($nib,$sub_klasifikasi,$id_asesor),
      'asesor_pjskbu'=>$this->Bu_model->pjskbu_asesor($nib,$sub_klasifikasi,$id_asesor),
      'nib_dec'=>$id1,
      'tgl_dec'=>$id2,
    );
    $html = $this->load->view('sertifikasi/asesor_ceklis_tenaga_kerja', $this->data, true);
    $filename = 'report_'.time();

    $this->pdfgenerator->generate($html, $filename, true, 'A3', 'landscape');
    //$this->load->view('sertifikasi/verifikasi_ceklis',$this->data);

  }else{
    $this->session->set_flashdata('title','Warning');
    $this->session->set_flashdata('text','Anda tidak memiliki akses');
    $this->session->set_flashdata('class', "warning");
    redirect('login','refresh');
  }
}

function cetak_peralatan_asesor($id1,$id2,$id3){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->asesor() OR $this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){
    $sub_klasifikasi = decrypt_url($id2);
    $nib= decrypt_url($id1);
    $id_asesor= decrypt_url($id3);
    $status="1";
    $record=$this->Bu_model->get_ceklis_asesor($nib,$sub_klasifikasi,$id_asesor);


    $this->load->library('pdfgenerator');
    $this->data = array(
      'asesor'=>$this->Bu_model->cek_pilih_asesor2($nib,$sub_klasifikasi),

      'ceklis'=>$record,
      'tgl'=>$tgl,
      'biodata'=>$this->Bu_model->biodata_opr($nib),
      'peralatan'=>$this->Bu_model->peralatan_opr($nib,$sub_klasifikasi),
      'nib_dec'=>$id1,
      'tgl_dec'=>$id2,
    );
    $html = $this->load->view('sertifikasi/asesor_ceklis_peralatan', $this->data, true);
    $filename = 'report_'.time();

    $this->pdfgenerator->generate($html, $filename, true, 'A3', 'landscape');
    //$this->load->view('sertifikasi/verifikasi_ceklis',$this->data);

  }else{
    $this->session->set_flashdata('title','Warning');
    $this->session->set_flashdata('text','Anda tidak memiliki akses');
    $this->session->set_flashdata('class', "warning");
    redirect('login','refresh');
  }
}
function cetak_penjualan_tahunan_asesor($id1,$id2,$id3){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->asesor() OR $this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){
    $sub_klasifikasi = decrypt_url($id2);
    $nib= decrypt_url($id1);
    $id_asesor= decrypt_url($id3);
    $status="1";
    $record=$this->Bu_model->get_ceklis_asesor($nib,$sub_klasifikasi,$id_asesor);
    $this->load->library('pdfgenerator');
    $this->data = array(
      'asesor'=>$this->Bu_model->cek_pilih_asesor2($nib,$sub_klasifikasi),
      'ceklis'=>$record,
      'tgl'=>$tgl,
      'biodata'=>$this->Bu_model->biodata_opr($nib),
      'penjualan_tahunan'=>$this->Bu_model->pengalaman_opr($nib,$sub_klasifikasi),
      'nib_dec'=>$id1,
      'tgl_dec'=>$id2,
    );
    $html = $this->load->view('sertifikasi/asesor_ceklis_penjualan_tahunan', $this->data, true);
    $filename = 'report_'.time();

    $this->pdfgenerator->generate($html, $filename, true, 'A3', 'landscape');
    //$this->load->view('sertifikasi/verifikasi_ceklis',$this->data);

  }else{
    $this->session->set_flashdata('title','Warning');
    $this->session->set_flashdata('text','Anda tidak memiliki akses');
    $this->session->set_flashdata('class', "warning");
    redirect('login','refresh');
  }
}
function cetak_keuangan($id1,$id2,$id3){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->asesor() OR $this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){
    $sub_klasifikasi = decrypt_url($id2);
    $nib= decrypt_url($id1);
    $id_asesor= decrypt_url($id3);
    $status="1";
    $record=$this->Bu_model->get_ceklis_asesor($nib,$sub_klasifikasi,$id_asesor);
    $this->load->library('pdfgenerator');
    $this->data = array(
      'asesor'=>$this->Bu_model->cek_pilih_asesor2($nib,$sub_klasifikasi),
      'ceklis'=>$record,
      'tgl'=>$tgl,
      'neraca_asesor'=>$this->Bu_model->neraca_asesor($nib,$sub_klasifikasi,$id_asesor),
      'biodata'=>$this->Bu_model->biodata_opr($nib),
      'neraca'=>$this->Bu_model->neraca_ski($nib),
      'pemegang_saham'=>$this->Bu_model->pemegang_saham_opr($nib),
      'nib_dec'=>$id1,
      'tgl_dec'=>$id2,
    );
    $html = $this->load->view('sertifikasi/asesor_ceklis_keuangan', $this->data, true);
    $filename = 'report_'.time();

    $this->pdfgenerator->generate($html, $filename, true, 'A3', 'landscape');
    //$this->load->view('sertifikasi/verifikasi_ceklis',$this->data);

  }else{
    $this->session->set_flashdata('title','Warning');
    $this->session->set_flashdata('text','Anda tidak memiliki akses');
    $this->session->set_flashdata('class', "warning");
    redirect('login','refresh');
  }
}
function cetak_smm($id1,$id2,$id3){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->asesor() OR $this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){
    $sub_klasifikasi = decrypt_url($id2);
    $nib= decrypt_url($id1);
    $id_asesor= decrypt_url($id3);
    $status="1";
    $record=$this->Bu_model->get_ceklis_asesor($nib,$sub_klasifikasi,$id_asesor);
    $this->load->library('pdfgenerator');
    $this->data = array(
      'asesor'=>$this->Bu_model->cek_pilih_asesor2($nib,$sub_klasifikasi),
      'ceklis'=>$record,
      'tgl'=>$tgl,
      'biodata'=>$this->Bu_model->biodata_opr($nib),
      'smm_asesor'=>$this->Bu_model->smm_asesor($nib,$sub_klasifikasi,$id_asesor),
      'nib_dec'=>$id1,
      'tgl_dec'=>$id2,
    );
    $html = $this->load->view('sertifikasi/asesor_ceklis_smm', $this->data, true);
    $filename = 'report_'.time();

    $this->pdfgenerator->generate($html, $filename, true, 'A3', 'landscape');
    //$this->load->view('sertifikasi/verifikasi_ceklis',$this->data);

  }else{
    $this->session->set_flashdata('title','Warning');
    $this->session->set_flashdata('text','Anda tidak memiliki akses');
    $this->session->set_flashdata('class', "warning");
    redirect('login','refresh');
  }
}
function cetak_smap($id1,$id2,$id3){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->asesor() OR $this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){
    $sub_klasifikasi = decrypt_url($id2);
    $nib= decrypt_url($id1);
    $id_asesor= decrypt_url($id3);
    $status="1";
    $record=$this->Bu_model->get_ceklis_asesor($nib,$sub_klasifikasi,$id_asesor);
    $this->load->library('pdfgenerator');
    $this->data = array(
      'asesor'=>$this->Bu_model->cek_pilih_asesor2($nib,$sub_klasifikasi),
      'ceklis'=>$record,
      'tgl'=>$tgl,
      'biodata'=>$this->Bu_model->biodata_opr($nib),
      'smap_asesor'=>$this->Bu_model->smap_asesor($nib,$sub_klasifikasi,$id_asesor),
      'nib_dec'=>$id1,
      'tgl_dec'=>$id2,
    );
    $html = $this->load->view('sertifikasi/asesor_ceklis_smap', $this->data, true);
    $filename = 'report_'.time();

    $this->pdfgenerator->generate($html, $filename, true, 'A3', 'landscape');
    //$this->load->view('sertifikasi/verifikasi_ceklis',$this->data);

  }else{
    $this->session->set_flashdata('title','Warning');
    $this->session->set_flashdata('text','Anda tidak memiliki akses');
    $this->session->set_flashdata('class', "warning");
    redirect('login','refresh');
  }
}

function cetak_asesor($id1,$id2,$id3){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){
    $tgl = decrypt_url($id2);
    $nib= decrypt_url($id1);
    $id_asesor= decrypt_url($id3);
    $status="1";
    $record=$this->Bu_model->get_ceklis_asesor($nib,$tgl,$id_asesor);
    $rec=$this->Bu_model->check_penunjukan($nib,$tgl,$id_asesor);
    $stat="FALSE";
    foreach ($rec as $row) {
      if($row['status']=='1'){
        $stat='TRUE';
      }
    }
    if($stat=='TRUE'){
      $klasifikasi=$this->Bu_model->klasifikasi_kualifikasi_opr($nib,$tgl);
    }else{
      $klasifikasi=$this->Bu_model->klasifikasi_kualifikasi_opr_menengah_besar($nib,$tgl);

    }
    $this->load->library('pdfgenerator');
    $this->data = array(
      'ceklis'=>$record,
      'tgl'=>$tgl,
      'asesor'=>$this->Bu_model->cek_pilih_asesor2($nib,$tgl),
      'biodata'=>$this->Bu_model->biodata_opr($nib),
      'pengurus'=>$this->Bu_model->pengurus_opr($nib),
      'penjualan_tahunan'=>$this->Bu_model->pengalaman_opr($nib,$tgl),
      'akte'=>$this->Bu_model->akte_opr($nib),
      'smm'=>$this->Bu_model->smm_opr($nib),
      'smap'=>$this->Bu_model->smap_opr($nib),
      'neraca'=>$this->Bu_model->neraca_ski($nib),
      'pemegang_saham'=>$this->Bu_model->pemegang_saham_opr($nib),
      'pjbu'=>$this->Bu_model->pjbu_opr($nib),
      'pjskbu'=>$this->Bu_model->pjskbu_opr($nib,$tgl),
      'pjtbu'=>$this->Bu_model->pjtbu_opr($nib,$tgl),
      'peralatan'=>$this->Bu_model->peralatan_opr($nib,$tgl),
      'kepemilikan_peralatan'=>$this->Bu_model->kepemilikan_peralatan_opr($nib,$tgl),

      'klasifikasi'=>$klasifikasi,
      'nib_dec'=>$id1,
      'tgl_dec'=>$id2,
      'data_penilaian'=>$this->Bu_model->berita_acara_penilaian($nib,$tgl,$id_asesor)

    );
    $html = $this->load->view('sertifikasi/asesor_ceklis2', $this->data, true);
    $filename = 'report_'.time();

    $this->pdfgenerator->generate($html, $filename, true, 'A3', 'landscape');
    //$this->load->view('sertifikasi/verifikasi_ceklis',$this->data);

  }else{
    $this->session->set_flashdata('title','Warning');
    $this->session->set_flashdata('text','Anda tidak memiliki akses');
    $this->session->set_flashdata('class', "warning");
    redirect('login','refresh');
  }
}function insert_asesor()
{
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->asesor()){
  $id_user=$this->session->userdata('id_user');
  $post = $this->input->post();
  $tgl_dec = $this->security->xss_clean(trim($post['tgl_dec']));
  $nib_dec = $this->security->xss_clean(trim($post['nib_dec']));
  $sub_klasifikasi = decrypt_url($tgl_dec);
  $nib = decrypt_url($nib_dec);
  $table_ceklis="lsbu_ceklis_asesor";
  //administrasi
  if(isset($_POST['checkbox_80'])){
    $checkbox_administrasi="1";
  }else{
    $checkbox_administrasi="0";
  }
  if(isset($_POST['checkbox_80_2'])){
    $checkbox_administrasi_2="1";
  }else{
    $checkbox_administrasi_2="0";
  }
  if(isset($_POST['comment_80'])){
    $comment_administrasi=$this->security->xss_clean(trim($post['comment_80']));
  }else{
    $comment_administrasi="";
  }

  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','80','$checkbox_administrasi','$checkbox_administrasi_2','$comment_administrasi')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //pengurus
  if(isset($_POST['checkbox_81'])){
    $checkbox_pengurus="1";
  }else{
    $checkbox_pengurus="0";
  }
  if(isset($_POST['checkbox_81_2'])){
    $checkbox_pengurus_2="1";
  }else{
    $checkbox_pengurus_2="0";
  }
  if(isset($_POST['comment_81'])){
    $comment_pengurus=$this->security->xss_clean(trim($post['comment_81']));
  }else{
    $comment_pengurus="";
  }

  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','81','$checkbox_pengurus','$checkbox_pengurus_2','$comment_pengurus')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //pengalaman
  if(isset($_POST['checkbox_82'])){
    $checkbox_pengalaman="1";
  }else{
    $checkbox_pengalaman="0";
  }
  if(isset($_POST['checkbox_82_2'])){
    $checkbox_pengalaman_2="1";
  }else{
    $checkbox_pengalaman_2="0";
  }
  if(isset($_POST['comment_82'])){
    $comment_pengalaman=$this->security->xss_clean(trim($post['comment_82']));
  }else{
    $comment_pengalaman="";
  }

  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','82','$checkbox_pengalaman','$checkbox_pengalaman_2','$comment_pengalaman')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //akte_pendirian
  if(isset($_POST['checkbox_83'])){
    $checkbox_pendirian="1";
  }else{
    $checkbox_pendirian="0";
  }
  if(isset($_POST['checkbox_83_2'])){
    $checkbox_pendirian_2="1";
  }else{
    $checkbox_pendirian_2="0";
  }
  if(isset($_POST['comment_83'])){
    $comment_pendirian=$this->security->xss_clean(trim($post['comment_83']));
  }else{
    $comment_pendirian="";
  }

  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','83','$checkbox_pendirian','$checkbox_pendirian_2','$comment_pendirian')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);


  //pph_omset
  if(isset($_POST['checkbox_85'])){
    $checkbox_omset="1";
  }else{
    $checkbox_omset="0";
  }
  if(isset($_POST['checkbox_85_2'])){
    $checkbox_omset_2="1";
  }else{
    $checkbox_omset_2="0";
  }
  if(isset($_POST['comment_85'])){
    $comment_omset=$this->security->xss_clean(trim($post['comment_85']));
  }else{
    $comment_omset="";
  }

  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','85','$checkbox_omset','$checkbox_omset_2','$comment_omset')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //pemegang_saham
  if(isset($_POST['checkbox_86'])){
    $checkbox_saham="1";
  }else{
    $checkbox_saham="0";
  }
  if(isset($_POST['checkbox_86_2'])){
    $checkbox_saham_2="1";
  }else{
    $checkbox_saham_2="0";
  }
  if(isset($_POST['comment_86'])){
    $comment_saham=$this->security->xss_clean(trim($post['comment_86']));
  }else{
    $comment_saham="";
  }

  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','86','$checkbox_saham','$checkbox_saham_2','$comment_saham')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //ceraca
  if(isset($_POST['checkbox_87'])){
    $checkbox_neraca="1";
  }else{
    $checkbox_neraca="0";
  }
  if(isset($_POST['checkbox_87_2'])){
    $checkbox_neraca_2="1";
  }else{
    $checkbox_neraca_2="0";
  }
  if(isset($_POST['comment_87'])){
    $comment_neraca=$this->security->xss_clean(trim($post['comment_87']));
  }else{
    $comment_neraca="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','87','$checkbox_neraca','$checkbox_neraca_2','$comment_neraca')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //ceraca
  //tenaga Kerja
  if(isset($_POST['checkbox_88'])){
    $checkbox_tk="1";
  }else{
    $checkbox_tk="0";
  }
  if(isset($_POST['checkbox_88_2'])){
    $checkbox_tk_2="1";
  }else{
    $checkbox_tk_2="0";
  }
  if(isset($_POST['comment_88'])){
    $comment_tk=$this->security->xss_clean(trim($post['comment_88']));
  }else{
    $comment_tk="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','88','$checkbox_tk','$checkbox_tk_2','$comment_tk')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //peralatan
  if(isset($_POST['checkbox_89'])){
    $checkbox_peralatan="1";
  }else{
    $checkbox_peralatan="0";
  }
  if(isset($_POST['checkbox_89_2'])){
    $checkbox_peralatan_2="1";
  }else{
    $checkbox_peralatan_2="0";
  }
  if(isset($_POST['comment_89'])){
    $comment_peralatan1=$this->security->xss_clean(trim($post['comment_89']));
  }else{
    $comment_peralatan1="";
  }

  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','89','$checkbox_peralatan','$checkbox_peralatan_2','$comment_peralatan1')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //klasifikasi
  if(isset($_POST['checkbox_90'])){
    $checkbox_klasifikasi="1";
  }else{
    $checkbox_klasifikasi="0";
  }
  if(isset($_POST['checkbox_90_2'])){
    $checkbox_klasifikasi_2="1";
  }else{
    $checkbox_klasifikasi_2="0";
  }
  if(isset($_POST['comment_90'])){
    $comment_klas=$this->security->xss_clean(trim($post['comment_90']));
  }else{
    $comment_klas="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','90','$checkbox_klasifikasi','$checkbox_klasifikasi_2','$comment_klas')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //77
  if(isset($_POST['checkbox_77'])){
    $checkbox_77="1";
  }else{
    $checkbox_77="0";
  }
  if(isset($_POST['checkbox_77_2'])){
    $checkbox_77_2="1";
  }else{
    $checkbox_77_2="0";
  }
  if(isset($_POST['comment_77'])){
    $comment_77=$this->security->xss_clean(trim($post['comment_77']));
  }else{
    $comment_77="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','77','$checkbox_77','$checkbox_77_2','$comment_77')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //78
  if(isset($_POST['checkbox_78'])){
    $checkbox_78="1";
  }else{
    $checkbox_78="0";
  }
  if(isset($_POST['checkbox_78_2'])){
    $checkbox_78_2="1";
  }else{
    $checkbox_78_2="0";
  }
  if(isset($_POST['comment_78'])){
    $comment_78=$this->security->xss_clean(trim($post['comment_78']));
  }else{
    $comment_78="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','78','$checkbox_78','$checkbox_78_2','$comment_78')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //79
  if(isset($_POST['checkbox_79'])){
    $checkbox_79="1";
  }else{
    $checkbox_79="0";
  }
  if(isset($_POST['checkbox_79_2'])){
    $checkbox_79_2="1";
  }else{
    $checkbox_79_2="0";
  }
  if(isset($_POST['comment_79'])){
    $comment_79=$this->security->xss_clean(trim($post['comment_79']));
  }else{
    $comment_79="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','79','$checkbox_79','$checkbox_79_2','$comment_79')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //1
  if(isset($_POST['checkbox_1'])){
    $checkbox_1="1";
  }else{
    $checkbox_1="0";
  }
  if(isset($_POST['checkbox_1_2'])){
    $checkbox_1_2="1";
  }else{
    $checkbox_1_2="0";
  }
  if(isset($_POST['comment_1'])){
    $comment_1=$this->security->xss_clean(trim($post['comment_1']));
  }else{
    $comment_1="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','1','$checkbox_1','$checkbox_1_2','$comment_1')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //2
  if(isset($_POST['checkbox_2'])){
    $checkbox_2="1";
  }else{
    $checkbox_2="0";
  }
  if(isset($_POST['checkbox_2_2'])){
    $checkbox_2_2="1";
  }else{
    $checkbox_2_2="0";
  }
  if(isset($_POST['comment_2'])){
    $comment_2=$this->security->xss_clean(trim($post['comment_2']));
  }else{
    $comment_2="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','2','$checkbox_2','$checkbox_2_2','$comment_2')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //1
  if(isset($_POST['checkbox_23'])){
    $checkbox_23="1";
  }else{
    $checkbox_23="0";
  }
  if(isset($_POST['checkbox_23_2'])){
    $checkbox_23_2="1";
  }else{
    $checkbox_23_2="0";
  }
  if(isset($_POST['comment_23'])){
    $comment_23=$this->security->xss_clean(trim($post['comment_23']));
  }else{
    $comment_23="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','23','$checkbox_23','$checkbox_23_2','$comment_23')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);

  //24
  if(isset($_POST['checkbox_24'])){
    $checkbox_24="1";
  }else{
    $checkbox_24="0";
  }
  if(isset($_POST['checkbox_24_2'])){
    $checkbox_24_2="1";
  }else{
    $checkbox_24_2="0";
  }
  if(isset($_POST['comment_24'])){
    $comment_24=$this->security->xss_clean(trim($post['comment_24']));
  }else{
    $comment_24="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','24','$checkbox_24','$checkbox_24_2','$comment_24')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //25
  if(isset($_POST['checkbox_25'])){
    $checkbox_25="1";
  }else{
    $checkbox_25="0";
  }
  if(isset($_POST['checkbox_25_2'])){
    $checkbox_25_2="1";
  }else{
    $checkbox_25_2="0";
  }
  if(isset($_POST['comment_25'])){
    $comment_25=$this->security->xss_clean(trim($post['comment_25']));
  }else{
    $comment_25="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','25','$checkbox_25','$checkbox_25_2','$comment_25')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //26
  if(isset($_POST['checkbox_26'])){
    $checkbox_26="1";
  }else{
    $checkbox_26="0";
  }
  if(isset($_POST['checkbox_26_2'])){
    $checkbox_26_2="1";
  }else{
    $checkbox_26_2="0";
  }
  if(isset($_POST['comment_26'])){
    $comment_26=$this->security->xss_clean(trim($post['comment_26']));
  }else{
    $comment_26="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','26','$checkbox_26','$checkbox_26_2','$comment_26')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //27
  if(isset($_POST['checkbox_27'])){
    $checkbox_27="1";
  }else{
    $checkbox_27="0";
  }
  if(isset($_POST['checkbox_27_2'])){
    $checkbox_27_2="1";
  }else{
    $checkbox_27_2="0";
  }
  if(isset($_POST['comment_27'])){
    $comment_27=$this->security->xss_clean(trim($post['comment_27']));
  }else{
    $comment_27="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','27','$checkbox_27','$checkbox_27_2','$comment_27')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //28
  if(isset($_POST['checkbox_28'])){
    $checkbox_28="1";
  }else{
    $checkbox_28="0";
  }
  if(isset($_POST['checkbox_28_2'])){
    $checkbox_28_2="1";
  }else{
    $checkbox_28_2="0";
  }
  if(isset($_POST['comment_28'])){
    $comment_28=$this->security->xss_clean(trim($post['comment_28']));
  }else{
    $comment_28="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','28','$checkbox_28','$checkbox_28_2','$comment_28')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //29
  if(isset($_POST['checkbox_29'])){
    $checkbox_29="1";
  }else{
    $checkbox_29="0";
  }
  if(isset($_POST['checkbox_29_2'])){
    $checkbox_29_2="1";
  }else{
    $checkbox_29_2="0";
  }
  if(isset($_POST['comment_29'])){
    $comment_29=$this->security->xss_clean(trim($post['comment_29']));
  }else{
    $comment_29="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','29','$checkbox_29','$checkbox_29_2','$comment_29')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //30
  if(isset($_POST['checkbox_30'])){
    $checkbox_30="1";
  }else{
    $checkbox_30="0";
  }
  if(isset($_POST['checkbox_30_2'])){
    $checkbox_30_2="1";
  }else{
    $checkbox_30_2="0";
  }
  if(isset($_POST['comment_30'])){
    $comment_30=$this->security->xss_clean(trim($post['comment_30']));
  }else{
    $comment_30="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','30','$checkbox_30','$checkbox_30_2','$comment_30')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //31
  if(isset($_POST['checkbox_31'])){
    $checkbox_31="1";
  }else{
    $checkbox_31="0";
  }
  if(isset($_POST['checkbox_31_2'])){
    $checkbox_31_2="1";
  }else{
    $checkbox_31_2="0";
  }
  if(isset($_POST['comment_31'])){
    $comment_31=$this->security->xss_clean(trim($post['comment_31']));
  }else{
    $comment_31="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','31','$checkbox_31','$checkbox_31_2','$comment_31')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //32
  if(isset($_POST['checkbox_32'])){
    $checkbox_32="1";
  }else{
    $checkbox_32="0";
  }
  if(isset($_POST['checkbox_32_2'])){
    $checkbox_32_2="1";
  }else{
    $checkbox_32_2="0";
  }
  if(isset($_POST['comment_32'])){
    $comment_32=$this->security->xss_clean(trim($post['comment_32']));
  }else{
    $comment_32="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','32','$checkbox_32','$checkbox_32_2','$comment_32')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //33
  if(isset($_POST['checkbox_33'])){
    $checkbox_33="1";
  }else{
    $checkbox_33="0";
  }
  if(isset($_POST['checkbox_33_2'])){
    $checkbox_33_2="1";
  }else{
    $checkbox_33_2="0";
  }
  if(isset($_POST['comment_33'])){
    $comment_33=$this->security->xss_clean(trim($post['comment_33']));
  }else{
    $comment_33="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','33','$checkbox_33','$checkbox_33_2','$comment_33')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //34
  if(isset($_POST['checkbox_34'])){
    $checkbox_34="1";
  }else{
    $checkbox_34="0";
  }
  if(isset($_POST['checkbox_34_2'])){
    $checkbox_34_2="1";
  }else{
    $checkbox_34_2="0";
  }
  if(isset($_POST['comment_34'])){
    $comment_34=$this->security->xss_clean(trim($post['comment_34']));
  }else{
    $comment_34="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','34','$checkbox_34','$checkbox_34_2','$comment_34')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //35
  if(isset($_POST['checkbox_35'])){
    $checkbox_35="1";
  }else{
    $checkbox_35="0";
  }
  if(isset($_POST['checkbox_35_2'])){
    $checkbox_35_2="1";
  }else{
    $checkbox_35_2="0";
  }
  if(isset($_POST['comment_35'])){
    $comment_35=$this->security->xss_clean(trim($post['comment_35']));
  }else{
    $comment_35="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','35','$checkbox_35','$checkbox_35_2','$comment_35')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //36
  if(isset($_POST['checkbox_36'])){
    $checkbox_36="1";
  }else{
    $checkbox_36="0";
  }
  if(isset($_POST['checkbox_36_2'])){
    $checkbox_36_2="1";
  }else{
    $checkbox_36_2="0";
  }
  if(isset($_POST['comment_36'])){
    $comment_36=$this->security->xss_clean(trim($post['comment_36']));
  }else{
    $comment_36="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','36','$checkbox_36','$checkbox_36_2','$comment_36')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //37
  if(isset($_POST['checkbox_37'])){
    $checkbox_37="1";
  }else{

    $checkbox_37="0";
  }
  if(isset($_POST['checkbox_37_2'])){
    $checkbox_37_2="1";
  }else{
    $checkbox_37_2="0";
  }
  if(isset($_POST['comment_37'])){
    $comment_37=$this->security->xss_clean(trim($post['comment_37']));
  }else{
    $comment_37="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','37','$checkbox_37','$checkbox_37_2','$comment_37')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //3
  if(isset($_POST['checkbox_3'])){
    $checkbox_3="1";
  }else{
    $checkbox_3="0";
  }
  if(isset($_POST['checkbox_3_2'])){
    $checkbox_3_2="1";
  }else{
    $checkbox_3_2="0";
  }
  if(isset($_POST['comment_3'])){
    $comment_3=$this->security->xss_clean(trim($post['comment_3']));
  }else{
    $comment_3="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','3','$checkbox_3','$checkbox_3_2','$comment_3')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //4
  if(isset($_POST['checkbox_4'])){
    $checkbox_4="1";
  }else{
    $checkbox_4="0";
  }
  if(isset($_POST['checkbox_4_2'])){
    $checkbox_4_2="1";
  }else{
    $checkbox_4_2="0";
  }
  if(isset($_POST['comment_4'])){
    $comment_4=$this->security->xss_clean(trim($post['comment_4']));
  }else{
    $comment_4="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','4','$checkbox_4','$checkbox_4_2','$comment_4')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //5
  if(isset($_POST['checkbox_5'])){
    $checkbox_5="1";
  }else{
    $checkbox_5="0";
  }
  if(isset($_POST['checkbox_5_2'])){
    $checkbox_5_2="1";
  }else{
    $checkbox_5_2="0";
  }
  if(isset($_POST['comment_5'])){
    $comment_5=$this->security->xss_clean(trim($post['comment_5']));
  }else{
    $comment_5="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','5','$checkbox_5','$checkbox_5_2','$comment_5')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //6
  if(isset($_POST['checkbox_6'])){
    $checkbox_6="1";
  }else{
    $checkbox_6="0";
  }
  if(isset($_POST['checkbox_6_2'])){
    $checkbox_6_2="1";
  }else{
    $checkbox_6_2="0";
  }
  if(isset($_POST['comment_6'])){
    $comment_6=$this->security->xss_clean(trim($post['comment_6']));
  }else{
    $comment_6="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','6','$checkbox_6','$checkbox_6_2','$comment_6')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //7
  if(isset($_POST['checkbox_7'])){
    $checkbox_7="1";
  }else{
    $checkbox_7="0";
  }
  if(isset($_POST['checkbox_7_2'])){
    $checkbox_7_2="1";
  }else{
    $checkbox_7_2="0";
  }
  if(isset($_POST['comment_7'])){
    $comment_7=$this->security->xss_clean(trim($post['comment_7']));
  }else{
    $comment_7="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','7','$checkbox_7','$checkbox_7_2','$comment_7')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //8
  if(isset($_POST['checkbox_8'])){
    $checkbox_8="1";
  }else{
    $checkbox_8="0";
  }
  if(isset($_POST['checkbox_8_2'])){
    $checkbox_8_2="1";
  }else{
    $checkbox_8_2="0";
  }
  if(isset($_POST['comment_8'])){
    $comment_8=$this->security->xss_clean(trim($post['comment_8']));
  }else{
    $comment_8="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','8','$checkbox_8','$checkbox_8_2','$comment_8')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //9
  if(isset($_POST['checkbox_9'])){
    $checkbox_9="1";
  }else{
    $checkbox_9="0";
  }
  if(isset($_POST['checkbox_9_2'])){
    $checkbox_9_2="1";
  }else{
    $checkbox_9_2="0";
  }
  if(isset($_POST['comment_9'])){
    $comment_9=$this->security->xss_clean(trim($post['comment_9']));
  }else{
    $comment_9="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','9','$checkbox_9','$checkbox_9_2','$comment_9')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //10
  if(isset($_POST['checkbox_10'])){
    $checkbox_10="1";
  }else{
    $checkbox_10="0";
  }
  if(isset($_POST['checkbox_10_2'])){
    $checkbox_10_2="1";
  }else{
    $checkbox_10_2="0";
  }
  if(isset($_POST['comment_10'])){
    $comment_10=$this->security->xss_clean(trim($post['comment_10']));
  }else{
    $comment_10="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','10','$checkbox_10','$checkbox_10_2','$comment_10')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //11
  if(isset($_POST['checkbox_11'])){
    $checkbox_11="1";
  }else{
    $checkbox_11="0";
  }
  if(isset($_POST['checkbox_11_2'])){
    $checkbox_11_2="1";
  }else{
    $checkbox_11_2="0";
  }
  if(isset($_POST['comment_11'])){
    $comment_11=$this->security->xss_clean(trim($post['comment_11']));
  }else{
    $comment_11="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','11','$checkbox_11','$checkbox_11_2','$comment_11')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);

  //13
  if(isset($_POST['checkbox_13'])){
    $checkbox_13="1";
  }else{
    $checkbox_13="0";
  }
  if(isset($_POST['checkbox_13_2'])){
    $checkbox_13_2="1";
  }else{
    $checkbox_13_2="0";
  }
  if(isset($_POST['comment_13'])){
    $comment_13=$this->security->xss_clean(trim($post['comment_13']));
  }else{
    $comment_13="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','13','$checkbox_13','$checkbox_13_2','$comment_13')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //14
  if(isset($_POST['checkbox_14'])){
    $checkbox_14="1";
  }else{
    $checkbox_14="0";
  }
  if(isset($_POST['checkbox_14_2'])){
    $checkbox_14_2="1";
  }else{
    $checkbox_14_2="0";
  }
  if(isset($_POST['comment_14'])){
    $comment_14=$this->security->xss_clean(trim($post['comment_14']));
  }else{
    $comment_14="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','14','$checkbox_14','$checkbox_14_2','$comment_14')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //15
  if(isset($_POST['checkbox_15'])){
    $checkbox_15="1";
  }else{
    $checkbox_15="0";
  }
  if(isset($_POST['checkbox_15_2'])){
    $checkbox_15_2="1";
  }else{
    $checkbox_15_2="0";
  }
  if(isset($_POST['comment_15'])){
    $comment_15=$this->security->xss_clean(trim($post['comment_15']));
  }else{
    $comment_15="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','15','$checkbox_15','$checkbox_15_2','$comment_15')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //16
  if(isset($_POST['checkbox_16'])){
    $checkbox_16="1";
  }else{
    $checkbox_16="0";
  }
  if(isset($_POST['checkbox_16_2'])){
    $checkbox_16_2="1";
  }else{
    $checkbox_16_2="0";
  }
  if(isset($_POST['comment_16'])){
    $comment_16=$this->security->xss_clean(trim($post['comment_16']));
  }else{
    $comment_16="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','16','$checkbox_16','$checkbox_16_2','$comment_16')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //17
  if(isset($_POST['checkbox_17'])){
    $checkbox_17="1";
  }else{
    $checkbox_17="0";
  }
  if(isset($_POST['checkbox_17_2'])){
    $checkbox_17_2="1";
  }else{
    $checkbox_17_2="0";
  }
  if(isset($_POST['comment_17'])){
    $comment_17=$this->security->xss_clean(trim($post['comment_17']));
  }else{
    $comment_17="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','17','$checkbox_17','$checkbox_17_2','$comment_17')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //18
  if(isset($_POST['checkbox_18'])){
    $checkbox_18="1";
  }else{
    $checkbox_18="0";
  }
  if(isset($_POST['checkbox_18_2'])){
    $checkbox_18_2="1";
  }else{
    $checkbox_18_2="0";
  }
  if(isset($_POST['comment_18'])){
    $comment_18=$this->security->xss_clean(trim($post['comment_18']));
  }else{
    $comment_18="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','18','$checkbox_18','$checkbox_18_2','$comment_18')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //19
  if(isset($_POST['checkbox_19'])){
    $checkbox_19="1";
  }else{
    $checkbox_19="0";
  }
  if(isset($_POST['checkbox_19_2'])){
    $checkbox_19_2="1";
  }else{
    $checkbox_19_2="0";
  }
  if(isset($_POST['comment_19'])){
    $comment_19=$this->security->xss_clean(trim($post['comment_19']));
  }else{
    $comment_19="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','19','$checkbox_19','$checkbox_19_2','$comment_19')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //20
  if(isset($_POST['checkbox_20'])){
    $checkbox_20="1";
  }else{
    $checkbox_20="0";
  }
  if(isset($_POST['checkbox_20_2'])){
    $checkbox_20_2="1";
  }else{
    $checkbox_20_2="0";
  }
  if(isset($_POST['comment_20'])){
    $comment_20=$this->security->xss_clean(trim($post['comment_20']));
  }else{
    $comment_20="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','20','$checkbox_20','$checkbox_20_2','$comment_20')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //21
  if(isset($_POST['checkbox_21'])){
    $checkbox_21="1";
  }else{
    $checkbox_21="0";
  }
  if(isset($_POST['checkbox_21_2'])){
    $checkbox_21_2="1";
  }else{
    $checkbox_21_2="0";
  }
  if(isset($_POST['comment_21'])){
    $comment_21=$this->security->xss_clean(trim($post['comment_21']));
  }else{
    $comment_21="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','21','$checkbox_21','$checkbox_21_2','$comment_21')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //91
  if(isset($_POST['checkbox_91'])){
    $checkbox_91="1";
  }else{
    $checkbox_91="0";
  }
  if(isset($_POST['checkbox_91_2'])){
    $checkbox_91_2="1";
  }else{
    $checkbox_91_2="0";
  }
  if(isset($_POST['comment_91'])){
    $comment_91=$this->security->xss_clean(trim($post['comment_91']));
  }else{
    $comment_91="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','91','$checkbox_91','$checkbox_91_2','$comment_91')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //92
  if(isset($_POST['checkbox_92'])){
    $checkbox_92="1";
  }else{
    $checkbox_92="0";
  }
  if(isset($_POST['checkbox_92_2'])){
    $checkbox_92_2="1";
  }else{
    $checkbox_92_2="0";
  }
  if(isset($_POST['comment_92'])){
    $comment_92=$this->security->xss_clean(trim($post['comment_92']));
  }else{
    $comment_92="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','92','$checkbox_92','$checkbox_92_2','$comment_92')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //93
  if(isset($_POST['checkbox_93'])){
    $checkbox_93="1";
  }else{
    $checkbox_93="0";
  }
  if(isset($_POST['checkbox_93_2'])){
    $checkbox_93_2="1";
  }else{
    $checkbox_93_2="0";
  }
  if(isset($_POST['comment_93'])){
    $comment_93=$this->security->xss_clean(trim($post['comment_93']));
  }else{
    $comment_93="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','93','$checkbox_93','$checkbox_93_2','$comment_93')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //94
  if(isset($_POST['checkbox_94'])){
    $checkbox_94="1";
  }else{
    $checkbox_94="0";
  }
  if(isset($_POST['checkbox_94_2'])){
    $checkbox_94_2="1";
  }else{
    $checkbox_94_2="0";
  }
  if(isset($_POST['comment_94'])){
    $comment_94=$this->security->xss_clean(trim($post['comment_94']));
  }else{
    $comment_94="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','94','$checkbox_94','$checkbox_94_2','$comment_94')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //95
  if(isset($_POST['checkbox_95'])){
    $checkbox_95="1";
  }else{
    $checkbox_95="0";
  }
  if(isset($_POST['checkbox_95_2'])){
    $checkbox_95_2="1";
  }else{
    $checkbox_95_2="0";
  }
  if(isset($_POST['comment_95'])){
    $comment_95=$this->security->xss_clean(trim($post['comment_95']));
  }else{
    $comment_95="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','95','$checkbox_95','$checkbox_95_2','$comment_95')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //96
  if(isset($_POST['checkbox_96'])){
    $checkbox_96="1";
  }else{
    $checkbox_96="0";
  }
  if(isset($_POST['checkbox_96_2'])){
    $checkbox_96_2="1";
  }else{
    $checkbox_96_2="0";
  }
  if(isset($_POST['comment_96'])){
    $comment_96=$this->security->xss_clean(trim($post['comment_96']));
  }else{
    $comment_96="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','96','$checkbox_96','$checkbox_96_2','$comment_96')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //97
  if(isset($_POST['checkbox_97'])){
    $checkbox_97="1";
  }else{
    $checkbox_97="0";
  }
  if(isset($_POST['checkbox_97_2'])){
    $checkbox_97_2="1";
  }else{
    $checkbox_97_2="0";
  }
  if(isset($_POST['comment_97'])){
    $comment_97=$this->security->xss_clean(trim($post['comment_97']));
  }else{
    $comment_97="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','97','$checkbox_97','$checkbox_97_2','$comment_97')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //99
  if(isset($_POST['checkbox_99'])){
    $checkbox_99="1";
  }else{
    $checkbox_99="0";
  }
  if(isset($_POST['checkbox_99_2'])){
    $checkbox_99_2="1";
  }else{
    $checkbox_99_2="0";
  }
  if(isset($_POST['comment_99'])){
    $comment_99=$this->security->xss_clean(trim($post['comment_99']));
  }else{
    $comment_99="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','99','$checkbox_99','$checkbox_99_2','$comment_99')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);


  $id_asesor=$this->session->userdata('id_user');
  $rec=$this->Bu_model->check_penunjukan($nib,$sub_klasifikasi,$id_asesor);

  $stat="FALSE";
  foreach ($rec as $row) {
    if($row['status']=='1'){
      $stat='TRUE';
    }
  }
  if($stat=='TRUE'){
    $record=$this->Bu_model->klasifikasi_kualifikasi_opr($nib,$sub_klasifikasi);
  }else{
    $record=$this->Bu_model->klasifikasi_kualifikasi_opr_menengah_besar($nib,$sub_klasifikasi);

  }
  foreach ($record as $row) {
    $sub_klas=$row['id_sub_klasifikasi'];
    $klasifikasi=$row['id_klasifikasi'];
    $kualifikasi=$row['kualifikasi'];
    $id_user=$this->session->userdata('id_user');
    if(isset($_POST['checkbox_lolos'.$sub_klas])){
      $checkbox="1";
    }else{
      $checkbox="0";
    }
    if(isset($_POST['comment_lolos'.$sub_klas])){
      $comment=$this->security->xss_clean(trim($post['comment_lolos'.$sub_klas]));
    }else{
      $comment="";
    }
    $select="REPLACE INTO lsbu_asesor_penilaian (NIB,tgl_permohonan,id_asesor,id_klasifikasi,id_sub_klasifikasi,kualifikasi,hasil_akhir,kd,aset,tk,peralatan,penjualan_tahunan,smm,smap,comment) VALUES ('$nib','$tgl_permohonan','$id_user','$klasifikasi','$sub_klas','$kualifikasi',$checkbox,'0',$checkbox_93,$checkbox_92,$checkbox_95,$checkbox_94,$checkbox_96,$checkbox_97,'$comment')";
    $where="";
    $insert=$this->Bu_model->delete_opr($select,$where);
  }
  $modal_dasar_neraca=$this->security->xss_clean(trim($post['modal_dasar_neraca']));
  $modal_setor_neraca=$this->security->xss_clean(trim($post['modal_setor_neraca']));
  $modal_disetor_neraca=$this->security->xss_clean(trim($post['modal_disetor_neraca']));
  $presentase_neraca=$this->security->xss_clean(trim($post['persentase_neraca']));
  $select_neraca="REPLACE INTO lsbu_asesor_neraca (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,modal_dasar,modal_disetor,presentase,modal_setor) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','$modal_dasar_neraca','$modal_disetor_neraca','$presentase_neraca','$modal_setor_neraca')";
  $where="";
  $this->Bu_model->delete_opr($select_neraca,$where);
  $iso_smm_asesor=$this->security->xss_clean(trim($post['iso_smm_asesor']));
  $dokumen_smm_asesor=$this->security->xss_clean(trim($post['dokumen_smm_asesor']));
  $pernyataan_smm_asesor=$this->security->xss_clean(trim($post['pernyataan_smm_asesor']));
  $select_smm="REPLACE INTO lsbu_asesor_smm (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,iso,dokumen,pernyataan) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','$iso_smm_asesor','$dokumen_smm_asesor','$pernyataan_smm_asesor')";
  $where="";
  $this->Bu_model->delete_opr($select_smm,$where);
  $iso_smap_asesor=$this->security->xss_clean(trim($post['iso_smap_asesor']));
  $dokumen_smap_asesor=$this->security->xss_clean(trim($post['dokumen_smap_asesor']));
  $pernyataan_smap_asesor=$this->security->xss_clean(trim($post['pernyataan_smap_asesor']));
  $select_smap="REPLACE INTO lsbu_asesor_smap (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,iso,dokumen,pernyataan) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','$iso_smap_asesor','$dokumen_smap_asesor','$pernyataan_smap_asesor')";
  $where="";
  $this->Bu_model->delete_opr($select_smap,$where);
  if($insert=="Success"){
    $this->session->set_flashdata('title','Success');
    $this->session->set_flashdata('text','Penilaian Berhasil Diinput');
    $this->session->set_flashdata('class', "success");
    redirect('sertifikasi/asesor/'.$nib_dec.'/'.$tgl_dec.'/'.encrypt_url($id_user),'refresh');
  }else{
    $this->session->set_flashdata('title','Failed');
    $this->session->set_flashdata('text','Penilaian Gagl Diinput');
    $this->session->set_flashdata('class', "error");
    redirect('sertifikasi/asesor/'.$nib_dec.'/'.$tgl_dec.'/'.encrypt_url($id_user),'refresh');
  }

}else{
  $this->session->set_flashdata('title','Warning');
  $this->session->set_flashdata('text','Anda Tidak Memiliki Akses!');
  $this->session->set_flashdata('class', "warning");
  redirect('login', 'refresh');
}

}
function insert_asesor_2()
{
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->asesor()){
  $id_user=$this->session->userdata('id_user');
  $post = $this->input->post();
  $tgl_dec = $this->security->xss_clean(trim($post['tgl_dec']));
  $nib_dec = $this->security->xss_clean(trim($post['nib_dec']));
  $sub_klasifikasi = decrypt_url($tgl_dec);
  $nib = decrypt_url($nib_dec);
  $rc=$record=$this->Bu_model->klasifikasi_kualifikasi_opr($nib,$sub_klasifikasi);
  $tgl_permohonan=$rc[0]['tgl_permohonan'];
  $table_ceklis="lsbu_ceklis_asesor";
  //administrasi
  if(isset($_POST['checkbox_80'])){
    $checkbox_administrasi="1";
  }else{
    $checkbox_administrasi="0";
  }
  if(isset($_POST['checkbox_80_2'])){
    $checkbox_administrasi_2="1";
  }else{
    $checkbox_administrasi_2="0";
  }
  if(isset($_POST['comment_80'])){
    $comment_administrasi=$this->security->xss_clean(trim($post['comment_80']));
  }else{
    $comment_administrasi="";
  }

  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','80','$checkbox_administrasi','$checkbox_administrasi_2','$comment_administrasi')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //pengurus
  if(isset($_POST['checkbox_81'])){
    $checkbox_pengurus="1";
  }else{
    $checkbox_pengurus="0";
  }
  if(isset($_POST['checkbox_81_2'])){
    $checkbox_pengurus_2="1";
  }else{
    $checkbox_pengurus_2="0";
  }
  if(isset($_POST['comment_81'])){
    $comment_pengurus=$this->security->xss_clean(trim($post['comment_81']));
  }else{
    $comment_pengurus="";
  }

  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','81','$checkbox_pengurus','$checkbox_pengurus_2','$comment_pengurus')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //pengalaman
  if(isset($_POST['checkbox_82'])){
    $checkbox_pengalaman="1";
  }else{
    $checkbox_pengalaman="0";
  }
  if(isset($_POST['checkbox_82_2'])){
    $checkbox_pengalaman_2="1";
  }else{
    $checkbox_pengalaman_2="0";
  }
  if(isset($_POST['comment_82'])){
    $comment_pengalaman=$this->security->xss_clean(trim($post['comment_82']));
  }else{
    $comment_pengalaman="";
  }

  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','82','$checkbox_pengalaman','$checkbox_pengalaman_2','$comment_pengalaman')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //akte_pendirian
  if(isset($_POST['checkbox_83'])){
    $checkbox_pendirian="1";
  }else{
    $checkbox_pendirian="0";
  }
  if(isset($_POST['checkbox_83_2'])){
    $checkbox_pendirian_2="1";
  }else{
    $checkbox_pendirian_2="0";
  }
  if(isset($_POST['comment_83'])){
    $comment_pendirian=$this->security->xss_clean(trim($post['comment_83']));
  }else{
    $comment_pendirian="";
  }

  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','83','$checkbox_pendirian','$checkbox_pendirian_2','$comment_pendirian')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);


  //pph_omset
  if(isset($_POST['checkbox_85'])){
    $checkbox_omset="1";
  }else{
    $checkbox_omset="0";
  }
  if(isset($_POST['checkbox_85_2'])){
    $checkbox_omset_2="1";
  }else{
    $checkbox_omset_2="0";
  }
  if(isset($_POST['comment_85'])){
    $comment_omset=$this->security->xss_clean(trim($post['comment_85']));
  }else{
    $comment_omset="";
  }

  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','85','$checkbox_omset','$checkbox_omset_2','$comment_omset')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //pemegang_saham
  if(isset($_POST['checkbox_86'])){
    $checkbox_saham="1";
  }else{
    $checkbox_saham="0";
  }
  if(isset($_POST['checkbox_86_2'])){
    $checkbox_saham_2="1";
  }else{
    $checkbox_saham_2="0";
  }
  if(isset($_POST['comment_86'])){
    $comment_saham=$this->security->xss_clean(trim($post['comment_86']));
  }else{
    $comment_saham="";
  }

  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','86','$checkbox_saham','$checkbox_saham_2','$comment_saham')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //ceraca
  if(isset($_POST['checkbox_87'])){
    $checkbox_neraca="1";
  }else{
    $checkbox_neraca="0";
  }
  if(isset($_POST['checkbox_87_2'])){
    $checkbox_neraca_2="1";
  }else{
    $checkbox_neraca_2="0";
  }
  if(isset($_POST['comment_87'])){
    $comment_neraca=$this->security->xss_clean(trim($post['comment_87']));
  }else{
    $comment_neraca="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','87','$checkbox_neraca','$checkbox_neraca_2','$comment_neraca')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //ceraca
  //tenaga Kerja
  if(isset($_POST['checkbox_88'])){
    $checkbox_tk="1";
  }else{
    $checkbox_tk="0";
  }
  if(isset($_POST['checkbox_88_2'])){
    $checkbox_tk_2="1";
  }else{
    $checkbox_tk_2="0";
  }
  if(isset($_POST['comment_88'])){
    $comment_tk=$this->security->xss_clean(trim($post['comment_88']));
  }else{
    $comment_tk="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','88','$checkbox_tk','$checkbox_tk_2','$comment_tk')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //peralatan
  if(isset($_POST['checkbox_89'])){
    $checkbox_peralatan="1";
  }else{
    $checkbox_peralatan="0";
  }
  if(isset($_POST['checkbox_89_2'])){
    $checkbox_peralatan_2="1";
  }else{
    $checkbox_peralatan_2="0";
  }
  if(isset($_POST['comment_89'])){
    $comment_peralatan1=$this->security->xss_clean(trim($post['comment_89']));
  }else{
    $comment_peralatan1="";
  }

  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','89','$checkbox_peralatan','$checkbox_peralatan_2','$comment_peralatan1')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //klasifikasi
  if(isset($_POST['checkbox_90'])){
    $checkbox_klasifikasi="1";
  }else{
    $checkbox_klasifikasi="0";
  }
  if(isset($_POST['checkbox_90_2'])){
    $checkbox_klasifikasi_2="1";
  }else{
    $checkbox_klasifikasi_2="0";
  }
  if(isset($_POST['comment_90'])){
    $comment_klas=$this->security->xss_clean(trim($post['comment_90']));
  }else{
    $comment_klas="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','90','$checkbox_klasifikasi','$checkbox_klasifikasi_2','$comment_klas')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //77
  if(isset($_POST['checkbox_77'])){
    $checkbox_77="1";
  }else{
    $checkbox_77="0";
  }
  if(isset($_POST['checkbox_77_2'])){
    $checkbox_77_2="1";
  }else{
    $checkbox_77_2="0";
  }
  if(isset($_POST['comment_77'])){
    $comment_77=$this->security->xss_clean(trim($post['comment_77']));
  }else{
    $comment_77="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','77','$checkbox_77','$checkbox_77_2','$comment_77')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //78
  if(isset($_POST['checkbox_78'])){
    $checkbox_78="1";
  }else{
    $checkbox_78="0";
  }
  if(isset($_POST['checkbox_78_2'])){
    $checkbox_78_2="1";
  }else{
    $checkbox_78_2="0";
  }
  if(isset($_POST['comment_78'])){
    $comment_78=$this->security->xss_clean(trim($post['comment_78']));
  }else{
    $comment_78="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','78','$checkbox_78','$checkbox_78_2','$comment_78')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //79
  if(isset($_POST['checkbox_79'])){
    $checkbox_79="1";
  }else{
    $checkbox_79="0";
  }
  if(isset($_POST['checkbox_79_2'])){
    $checkbox_79_2="1";
  }else{
    $checkbox_79_2="0";
  }
  if(isset($_POST['comment_79'])){
    $comment_79=$this->security->xss_clean(trim($post['comment_79']));
  }else{
    $comment_79="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','79','$checkbox_79','$checkbox_79_2','$comment_79')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //1
  if(isset($_POST['checkbox_1'])){
    $checkbox_1="1";
  }else{
    $checkbox_1="0";
  }
  if(isset($_POST['checkbox_1_2'])){
    $checkbox_1_2="1";
  }else{
    $checkbox_1_2="0";
  }
  if(isset($_POST['comment_1'])){
    $comment_1=$this->security->xss_clean(trim($post['comment_1']));
  }else{
    $comment_1="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','1','$checkbox_1','$checkbox_1_2','$comment_1')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //2
  if(isset($_POST['checkbox_2'])){
    $checkbox_2="1";
  }else{
    $checkbox_2="0";
  }
  if(isset($_POST['checkbox_2_2'])){
    $checkbox_2_2="1";
  }else{
    $checkbox_2_2="0";
  }
  if(isset($_POST['comment_2'])){
    $comment_2=$this->security->xss_clean(trim($post['comment_2']));
  }else{
    $comment_2="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','2','$checkbox_2','$checkbox_2_2','$comment_2')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //1
  if(isset($_POST['checkbox_23'])){
    $checkbox_23="1";
  }else{
    $checkbox_23="0";
  }
  if(isset($_POST['checkbox_23_2'])){
    $checkbox_23_2="1";
  }else{
    $checkbox_23_2="0";
  }
  if(isset($_POST['comment_23'])){
    $comment_23=$this->security->xss_clean(trim($post['comment_23']));
  }else{
    $comment_23="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','23','$checkbox_23','$checkbox_23_2','$comment_23')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);

  //24
  if(isset($_POST['checkbox_24'])){
    $checkbox_24="1";
  }else{
    $checkbox_24="0";
  }
  if(isset($_POST['checkbox_24_2'])){
    $checkbox_24_2="1";
  }else{
    $checkbox_24_2="0";
  }
  if(isset($_POST['comment_24'])){
    $comment_24=$this->security->xss_clean(trim($post['comment_24']));
  }else{
    $comment_24="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','24','$checkbox_24','$checkbox_24_2','$comment_24')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //25
  if(isset($_POST['checkbox_25'])){
    $checkbox_25="1";
  }else{
    $checkbox_25="0";
  }
  if(isset($_POST['checkbox_25_2'])){
    $checkbox_25_2="1";
  }else{
    $checkbox_25_2="0";
  }
  if(isset($_POST['comment_25'])){
    $comment_25=$this->security->xss_clean(trim($post['comment_25']));
  }else{
    $comment_25="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','25','$checkbox_25','$checkbox_25_2','$comment_25')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //26
  if(isset($_POST['checkbox_26'])){
    $checkbox_26="1";
  }else{
    $checkbox_26="0";
  }
  if(isset($_POST['checkbox_26_2'])){
    $checkbox_26_2="1";
  }else{
    $checkbox_26_2="0";
  }
  if(isset($_POST['comment_26'])){
    $comment_26=$this->security->xss_clean(trim($post['comment_26']));
  }else{
    $comment_26="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','26','$checkbox_26','$checkbox_26_2','$comment_26')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //27
  if(isset($_POST['checkbox_27'])){
    $checkbox_27="1";
  }else{
    $checkbox_27="0";
  }
  if(isset($_POST['checkbox_27_2'])){
    $checkbox_27_2="1";
  }else{
    $checkbox_27_2="0";
  }
  if(isset($_POST['comment_27'])){
    $comment_27=$this->security->xss_clean(trim($post['comment_27']));
  }else{
    $comment_27="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','27','$checkbox_27','$checkbox_27_2','$comment_27')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //28
  if(isset($_POST['checkbox_28'])){
    $checkbox_28="1";
  }else{
    $checkbox_28="0";
  }
  if(isset($_POST['checkbox_28_2'])){
    $checkbox_28_2="1";
  }else{
    $checkbox_28_2="0";
  }
  if(isset($_POST['comment_28'])){
    $comment_28=$this->security->xss_clean(trim($post['comment_28']));
  }else{
    $comment_28="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','28','$checkbox_28','$checkbox_28_2','$comment_28')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //29
  if(isset($_POST['checkbox_29'])){
    $checkbox_29="1";
  }else{
    $checkbox_29="0";
  }
  if(isset($_POST['checkbox_29_2'])){
    $checkbox_29_2="1";
  }else{
    $checkbox_29_2="0";
  }
  if(isset($_POST['comment_29'])){
    $comment_29=$this->security->xss_clean(trim($post['comment_29']));
  }else{
    $comment_29="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','29','$checkbox_29','$checkbox_29_2','$comment_29')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //30
  if(isset($_POST['checkbox_30'])){
    $checkbox_30="1";
  }else{
    $checkbox_30="0";
  }
  if(isset($_POST['checkbox_30_2'])){
    $checkbox_30_2="1";
  }else{
    $checkbox_30_2="0";
  }
  if(isset($_POST['comment_30'])){
    $comment_30=$this->security->xss_clean(trim($post['comment_30']));
  }else{
    $comment_30="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','30','$checkbox_30','$checkbox_30_2','$comment_30')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //31
  if(isset($_POST['checkbox_31'])){
    $checkbox_31="1";
  }else{
    $checkbox_31="0";
  }
  if(isset($_POST['checkbox_31_2'])){
    $checkbox_31_2="1";
  }else{
    $checkbox_31_2="0";
  }
  if(isset($_POST['comment_31'])){
    $comment_31=$this->security->xss_clean(trim($post['comment_31']));
  }else{
    $comment_31="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','31','$checkbox_31','$checkbox_31_2','$comment_31')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //32
  if(isset($_POST['checkbox_32'])){
    $checkbox_32="1";
  }else{
    $checkbox_32="0";
  }
  if(isset($_POST['checkbox_32_2'])){
    $checkbox_32_2="1";
  }else{
    $checkbox_32_2="0";
  }
  if(isset($_POST['comment_32'])){
    $comment_32=$this->security->xss_clean(trim($post['comment_32']));
  }else{
    $comment_32="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','32','$checkbox_32','$checkbox_32_2','$comment_32')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //33
  if(isset($_POST['checkbox_33'])){
    $checkbox_33="1";
  }else{
    $checkbox_33="0";
  }
  if(isset($_POST['checkbox_33_2'])){
    $checkbox_33_2="1";
  }else{
    $checkbox_33_2="0";
  }
  if(isset($_POST['comment_33'])){
    $comment_33=$this->security->xss_clean(trim($post['comment_33']));
  }else{
    $comment_33="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','33','$checkbox_33','$checkbox_33_2','$comment_33')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //34
  if(isset($_POST['checkbox_34'])){
    $checkbox_34="1";
  }else{
    $checkbox_34="0";
  }
  if(isset($_POST['checkbox_34_2'])){
    $checkbox_34_2="1";
  }else{
    $checkbox_34_2="0";
  }
  if(isset($_POST['comment_34'])){
    $comment_34=$this->security->xss_clean(trim($post['comment_34']));
  }else{
    $comment_34="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','34','$checkbox_34','$checkbox_34_2','$comment_34')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //35
  if(isset($_POST['checkbox_35'])){
    $checkbox_35="1";
  }else{
    $checkbox_35="0";
  }
  if(isset($_POST['checkbox_35_2'])){
    $checkbox_35_2="1";
  }else{
    $checkbox_35_2="0";
  }
  if(isset($_POST['comment_35'])){
    $comment_35=$this->security->xss_clean(trim($post['comment_35']));
  }else{
    $comment_35="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','35','$checkbox_35','$checkbox_35_2','$comment_35')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //36
  if(isset($_POST['checkbox_36'])){
    $checkbox_36="1";
  }else{
    $checkbox_36="0";
  }
  if(isset($_POST['checkbox_36_2'])){
    $checkbox_36_2="1";
  }else{
    $checkbox_36_2="0";
  }
  if(isset($_POST['comment_36'])){
    $comment_36=$this->security->xss_clean(trim($post['comment_36']));
  }else{
    $comment_36="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','36','$checkbox_36','$checkbox_36_2','$comment_36')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //37
  if(isset($_POST['checkbox_37'])){
    $checkbox_37="1";
  }else{

    $checkbox_37="0";
  }
  if(isset($_POST['checkbox_37_2'])){
    $checkbox_37_2="1";
  }else{
    $checkbox_37_2="0";
  }
  if(isset($_POST['comment_37'])){
    $comment_37=$this->security->xss_clean(trim($post['comment_37']));
  }else{
    $comment_37="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','37','$checkbox_37','$checkbox_37_2','$comment_37')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //3
  if(isset($_POST['checkbox_3'])){
    $checkbox_3="1";
  }else{
    $checkbox_3="0";
  }
  if(isset($_POST['checkbox_3_2'])){
    $checkbox_3_2="1";
  }else{
    $checkbox_3_2="0";
  }
  if(isset($_POST['comment_3'])){
    $comment_3=$this->security->xss_clean(trim($post['comment_3']));
  }else{
    $comment_3="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','3','$checkbox_3','$checkbox_3_2','$comment_3')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //4
  if(isset($_POST['checkbox_4'])){
    $checkbox_4="1";
  }else{
    $checkbox_4="0";
  }
  if(isset($_POST['checkbox_4_2'])){
    $checkbox_4_2="1";
  }else{
    $checkbox_4_2="0";
  }
  if(isset($_POST['comment_4'])){
    $comment_4=$this->security->xss_clean(trim($post['comment_4']));
  }else{
    $comment_4="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','4','$checkbox_4','$checkbox_4_2','$comment_4')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //5
  if(isset($_POST['checkbox_5'])){
    $checkbox_5="1";
  }else{
    $checkbox_5="0";
  }
  if(isset($_POST['checkbox_5_2'])){
    $checkbox_5_2="1";
  }else{
    $checkbox_5_2="0";
  }
  if(isset($_POST['comment_5'])){
    $comment_5=$this->security->xss_clean(trim($post['comment_5']));
  }else{
    $comment_5="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','5','$checkbox_5','$checkbox_5_2','$comment_5')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //6
  if(isset($_POST['checkbox_6'])){
    $checkbox_6="1";
  }else{
    $checkbox_6="0";
  }
  if(isset($_POST['checkbox_6_2'])){
    $checkbox_6_2="1";
  }else{
    $checkbox_6_2="0";
  }
  if(isset($_POST['comment_6'])){
    $comment_6=$this->security->xss_clean(trim($post['comment_6']));
  }else{
    $comment_6="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','6','$checkbox_6','$checkbox_6_2','$comment_6')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //7
  if(isset($_POST['checkbox_7'])){
    $checkbox_7="1";
  }else{
    $checkbox_7="0";
  }
  if(isset($_POST['checkbox_7_2'])){
    $checkbox_7_2="1";
  }else{
    $checkbox_7_2="0";
  }
  if(isset($_POST['comment_7'])){
    $comment_7=$this->security->xss_clean(trim($post['comment_7']));
  }else{
    $comment_7="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','7','$checkbox_7','$checkbox_7_2','$comment_7')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //8
  if(isset($_POST['checkbox_8'])){
    $checkbox_8="1";
  }else{
    $checkbox_8="0";
  }
  if(isset($_POST['checkbox_8_2'])){
    $checkbox_8_2="1";
  }else{
    $checkbox_8_2="0";
  }
  if(isset($_POST['comment_8'])){
    $comment_8=$this->security->xss_clean(trim($post['comment_8']));
  }else{
    $comment_8="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','8','$checkbox_8','$checkbox_8_2','$comment_8')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //9
  if(isset($_POST['checkbox_9'])){
    $checkbox_9="1";
  }else{
    $checkbox_9="0";
  }
  if(isset($_POST['checkbox_9_2'])){
    $checkbox_9_2="1";
  }else{
    $checkbox_9_2="0";
  }
  if(isset($_POST['comment_9'])){
    $comment_9=$this->security->xss_clean(trim($post['comment_9']));
  }else{
    $comment_9="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','9','$checkbox_9','$checkbox_9_2','$comment_9')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //10
  if(isset($_POST['checkbox_10'])){
    $checkbox_10="1";
  }else{
    $checkbox_10="0";
  }
  if(isset($_POST['checkbox_10_2'])){
    $checkbox_10_2="1";
  }else{
    $checkbox_10_2="0";
  }
  if(isset($_POST['comment_10'])){
    $comment_10=$this->security->xss_clean(trim($post['comment_10']));
  }else{
    $comment_10="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','10','$checkbox_10','$checkbox_10_2','$comment_10')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //11
  if(isset($_POST['checkbox_11'])){
    $checkbox_11="1";
  }else{
    $checkbox_11="0";
  }
  if(isset($_POST['checkbox_11_2'])){
    $checkbox_11_2="1";
  }else{
    $checkbox_11_2="0";
  }
  if(isset($_POST['comment_11'])){
    $comment_11=$this->security->xss_clean(trim($post['comment_11']));
  }else{
    $comment_11="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','11','$checkbox_11','$checkbox_11_2','$comment_11')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);

  //13
  if(isset($_POST['checkbox_13'])){
    $checkbox_13="1";
  }else{
    $checkbox_13="0";
  }
  if(isset($_POST['checkbox_13_2'])){
    $checkbox_13_2="1";
  }else{
    $checkbox_13_2="0";
  }
  if(isset($_POST['comment_13'])){
    $comment_13=$this->security->xss_clean(trim($post['comment_13']));
  }else{
    $comment_13="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','13','$checkbox_13','$checkbox_13_2','$comment_13')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //14
  if(isset($_POST['checkbox_14'])){
    $checkbox_14="1";
  }else{
    $checkbox_14="0";
  }
  if(isset($_POST['checkbox_14_2'])){
    $checkbox_14_2="1";
  }else{
    $checkbox_14_2="0";
  }
  if(isset($_POST['comment_14'])){
    $comment_14=$this->security->xss_clean(trim($post['comment_14']));
  }else{
    $comment_14="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','14','$checkbox_14','$checkbox_14_2','$comment_14')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //15
  if(isset($_POST['checkbox_15'])){
    $checkbox_15="1";
  }else{
    $checkbox_15="0";
  }
  if(isset($_POST['checkbox_15_2'])){
    $checkbox_15_2="1";
  }else{
    $checkbox_15_2="0";
  }
  if(isset($_POST['comment_15'])){
    $comment_15=$this->security->xss_clean(trim($post['comment_15']));
  }else{
    $comment_15="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','15','$checkbox_15','$checkbox_15_2','$comment_15')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //16
  if(isset($_POST['checkbox_16'])){
    $checkbox_16="1";
  }else{
    $checkbox_16="0";
  }
  if(isset($_POST['checkbox_16_2'])){
    $checkbox_16_2="1";
  }else{
    $checkbox_16_2="0";
  }
  if(isset($_POST['comment_16'])){
    $comment_16=$this->security->xss_clean(trim($post['comment_16']));
  }else{
    $comment_16="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','16','$checkbox_16','$checkbox_16_2','$comment_16')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //17
  if(isset($_POST['checkbox_17'])){
    $checkbox_17="1";
  }else{
    $checkbox_17="0";
  }
  if(isset($_POST['checkbox_17_2'])){
    $checkbox_17_2="1";
  }else{
    $checkbox_17_2="0";
  }
  if(isset($_POST['comment_17'])){
    $comment_17=$this->security->xss_clean(trim($post['comment_17']));
  }else{
    $comment_17="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','17','$checkbox_17','$checkbox_17_2','$comment_17')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //18
  if(isset($_POST['checkbox_18'])){
    $checkbox_18="1";
  }else{
    $checkbox_18="0";
  }
  if(isset($_POST['checkbox_18_2'])){
    $checkbox_18_2="1";
  }else{
    $checkbox_18_2="0";
  }
  if(isset($_POST['comment_18'])){
    $comment_18=$this->security->xss_clean(trim($post['comment_18']));
  }else{
    $comment_18="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','18','$checkbox_18','$checkbox_18_2','$comment_18')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //19
  if(isset($_POST['checkbox_19'])){
    $checkbox_19="1";
  }else{
    $checkbox_19="0";
  }
  if(isset($_POST['checkbox_19_2'])){
    $checkbox_19_2="1";
  }else{
    $checkbox_19_2="0";
  }
  if(isset($_POST['comment_19'])){
    $comment_19=$this->security->xss_clean(trim($post['comment_19']));
  }else{
    $comment_19="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','19','$checkbox_19','$checkbox_19_2','$comment_19')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //20
  if(isset($_POST['checkbox_20'])){
    $checkbox_20="1";
  }else{
    $checkbox_20="0";
  }
  if(isset($_POST['checkbox_20_2'])){
    $checkbox_20_2="1";
  }else{
    $checkbox_20_2="0";
  }
  if(isset($_POST['comment_20'])){
    $comment_20=$this->security->xss_clean(trim($post['comment_20']));
  }else{
    $comment_20="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','20','$checkbox_20','$checkbox_20_2','$comment_20')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //21
  if(isset($_POST['checkbox_21'])){
    $checkbox_21="1";
  }else{
    $checkbox_21="0";
  }
  if(isset($_POST['checkbox_21_2'])){
    $checkbox_21_2="1";
  }else{
    $checkbox_21_2="0";
  }
  if(isset($_POST['comment_21'])){
    $comment_21=$this->security->xss_clean(trim($post['comment_21']));
  }else{
    $comment_21="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','21','$checkbox_21','$checkbox_21_2','$comment_21')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //91
  if(isset($_POST['checkbox_91'])){
    $checkbox_91="1";
  }else{
    $checkbox_91="0";
  }
  if(isset($_POST['checkbox_91_2'])){
    $checkbox_91_2="1";
  }else{
    $checkbox_91_2="0";
  }
  if(isset($_POST['comment_91'])){
    $comment_91=$this->security->xss_clean(trim($post['comment_91']));
  }else{
    $comment_91="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','91','$checkbox_91','$checkbox_91_2','$comment_91')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //92
  if(isset($_POST['checkbox_92'])){
    $checkbox_92="1";
  }else{
    $checkbox_92="0";
  }
  if(isset($_POST['checkbox_92_2'])){
    $checkbox_92_2="1";
  }else{
    $checkbox_92_2="0";
  }
  if(isset($_POST['comment_92'])){
    $comment_92=$this->security->xss_clean(trim($post['comment_92']));
  }else{
    $comment_92="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','92','$checkbox_92','$checkbox_92_2','$comment_92')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //93
  if(isset($_POST['checkbox_93'])){
    $checkbox_93="1";
  }else{
    $checkbox_93="0";
  }
  if(isset($_POST['checkbox_93_2'])){
    $checkbox_93_2="1";
  }else{
    $checkbox_93_2="0";
  }
  if(isset($_POST['comment_93'])){
    $comment_93=$this->security->xss_clean(trim($post['comment_93']));
  }else{
    $comment_93="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','93','$checkbox_93','$checkbox_93_2','$comment_93')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //94
  if(isset($_POST['checkbox_94'])){
    $checkbox_94="1";
  }else{
    $checkbox_94="0";
  }
  if(isset($_POST['checkbox_94_2'])){
    $checkbox_94_2="1";
  }else{
    $checkbox_94_2="0";
  }
  if(isset($_POST['comment_94'])){
    $comment_94=$this->security->xss_clean(trim($post['comment_94']));
  }else{
    $comment_94="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','94','$checkbox_94','$checkbox_94_2','$comment_94')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //95
  if(isset($_POST['checkbox_95'])){
    $checkbox_95="1";
  }else{
    $checkbox_95="0";
  }
  if(isset($_POST['checkbox_95_2'])){
    $checkbox_95_2="1";
  }else{
    $checkbox_95_2="0";
  }
  if(isset($_POST['comment_95'])){
    $comment_95=$this->security->xss_clean(trim($post['comment_95']));
  }else{
    $comment_95="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','95','$checkbox_95','$checkbox_95_2','$comment_95')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //96
  if(isset($_POST['checkbox_96'])){
    $checkbox_96="1";
  }else{
    $checkbox_96="0";
  }
  if(isset($_POST['checkbox_96_2'])){
    $checkbox_96_2="1";
  }else{
    $checkbox_96_2="0";
  }
  if(isset($_POST['comment_96'])){
    $comment_96=$this->security->xss_clean(trim($post['comment_96']));
  }else{
    $comment_96="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','96','$checkbox_96','$checkbox_96_2','$comment_96')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //97
  if(isset($_POST['checkbox_97'])){
    $checkbox_97="1";
  }else{
    $checkbox_97="0";
  }
  if(isset($_POST['checkbox_97_2'])){
    $checkbox_97_2="1";
  }else{
    $checkbox_97_2="0";
  }
  if(isset($_POST['comment_97'])){
    $comment_97=$this->security->xss_clean(trim($post['comment_97']));
  }else{
    $comment_97="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','97','$checkbox_97','$checkbox_97_2','$comment_97')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);
  //99
  if(isset($_POST['checkbox_99'])){
    $checkbox_99="1";
  }else{
    $checkbox_99="0";
  }
  if(isset($_POST['checkbox_99_2'])){
    $checkbox_99_2="1";
  }else{
    $checkbox_99_2="0";
  }
  if(isset($_POST['comment_99'])){
    $comment_99=$this->security->xss_clean(trim($post['comment_99']));
  }else{
    $comment_99="";
  }
  $select="REPLACE INTO lsbu_ceklis_asesor (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,ceklis,ceklis_2,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','99','$checkbox_99','$checkbox_99_2','$comment_99')";
  $where="";
  $this->Bu_model->delete_opr($select,$where);


  $id_asesor=$this->session->userdata('id_user');
  $rec=$this->Bu_model->check_penunjukan($nib,$sub_klasifikasi,$id_asesor);

  $stat="FALSE";
  foreach ($rec as $row) {
    if($row['status']=='1'){
      $stat='TRUE';
    }
  }
  if($stat=='TRUE'){
    $record=$this->Bu_model->klasifikasi_kualifikasi_opr($nib,$sub_klasifikasi);
  }else{
    $record=$this->Bu_model->klasifikasi_kualifikasi_opr_menengah_besar($nib,$sub_klasifikasi);

  }
  foreach ($record as $row) {
    $sub_klas=$row['id_sub_klasifikasi'];
    $klasifikasi=$row['id_klasifikasi'];
    $kualifikasi=$row['kualifikasi'];
    $id_user=$this->session->userdata('id_user');
    if(isset($_POST['checkbox_lolos'.$sub_klas])){
      $checkbox="1";
    }else{
      $checkbox="0";
    }
    if(isset($_POST['comment_lolos'.$sub_klas])){
      $comment=$this->security->xss_clean(trim($post['comment_lolos'.$sub_klas]));
    }else{
      $comment="";
    }
    $select="REPLACE INTO lsbu_asesor_penilaian (NIB,tgl_permohonan,id_asesor,id_klasifikasi,id_sub_klasifikasi,kualifikasi,hasil_akhir,kd,aset,tk,peralatan,penjualan_tahunan,smm,smap,comment) VALUES ('$nib','$tgl_permohonan','$id_user','$klasifikasi','$sub_klas','$kualifikasi',$checkbox,'0',$checkbox_93,$checkbox_92,$checkbox_95,$checkbox_94,$checkbox_96,$checkbox_97,'$comment')";
    $where="";
    $insert=$this->Bu_model->delete_opr($select,$where);
  }
  $modal_dasar_neraca=$this->security->xss_clean(trim($post['modal_dasar_neraca']));
  $modal_setor_neraca=$this->security->xss_clean(trim($post['modal_setor_neraca']));
  $modal_disetor_neraca=$this->security->xss_clean(trim($post['modal_disetor_neraca']));
  $presentase_neraca=$this->security->xss_clean(trim($post['persentase_neraca']));
  $select_neraca="REPLACE INTO lsbu_asesor_neraca (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,modal_dasar,modal_disetor,presentase,modal_setor) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','$modal_dasar_neraca','$modal_disetor_neraca','$presentase_neraca','$modal_setor_neraca')";
  $where="";
  $this->Bu_model->delete_opr($select_neraca,$where);
  $iso_smm_asesor=$this->security->xss_clean(trim($post['iso_smm_asesor']));
  $dokumen_smm_asesor=$this->security->xss_clean(trim($post['dokumen_smm_asesor']));
  $pernyataan_smm_asesor=$this->security->xss_clean(trim($post['pernyataan_smm_asesor']));
  $select_smm="REPLACE INTO lsbu_asesor_smm (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,iso,dokumen,pernyataan) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','$iso_smm_asesor','$dokumen_smm_asesor','$pernyataan_smm_asesor')";
  $where="";
  $this->Bu_model->delete_opr($select_smm,$where);
  $iso_smap_asesor=$this->security->xss_clean(trim($post['iso_smap_asesor']));
  $dokumen_smap_asesor=$this->security->xss_clean(trim($post['dokumen_smap_asesor']));
  $pernyataan_smap_asesor=$this->security->xss_clean(trim($post['pernyataan_smap_asesor']));
  $select_smap="REPLACE INTO lsbu_asesor_smap (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,iso,dokumen,pernyataan) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','$iso_smap_asesor','$dokumen_smap_asesor','$pernyataan_smap_asesor')";
  $where="";
  $this->Bu_model->delete_opr($select_smap,$where);
  $tgl_permohonan2x=$record[0]['tgl_permohonan'];

  $record_penjualan=$this->Bu_model->pengalaman_opr_sub($nib,$sub_klasifikasi);
  $count=0;
  //------ Penjualan Tahunan Ceklis
  foreach ($record_penjualan as $row_penjualan) {
    $id_izin_penjualan=$row_penjualan['id_izin'];
    $id_izin_sub_str=substr($id_izin_penjualan,2);
    $id_sub_klasifikasi_penjualan=$row_penjualan['id_sub_klasifikasi'];
    if(isset($_POST['penjualan_1_'.$id_izin_sub_str.'_'.$row_penjualan['id_sub_klasifikasi']])){
      $data1="1";
    }else{
      $data1="0";
    }
    if(isset($_POST["penjualan_2_".$id_izin_sub_str.'_'.$row_penjualan['id_sub_klasifikasi']])){
      $data2="1";
    }else{
      $data2="0";
    }

    if(isset($_POST["penjualan_3_".$id_izin_sub_str.'_'.$row_penjualan['id_sub_klasifikasi']])){
      $data3="1";
    }else{
      $data3="0";
    }

    if(isset($_POST["penjualan_4_".$id_izin_sub_str.'_'.$row_penjualan['id_sub_klasifikasi']])){
      $data4="1";
    }else{
      $data4="0";
    }
    if(isset($_POST["penjualan_5_".$id_izin_sub_str.'_'.$row_penjualan['id_sub_klasifikasi']])){
      $data5="1";
    }else{
      $data5="0";
    }
    if(isset($_POST["penjualan_6_".$id_izin_sub_str.'_'.$row_penjualan['id_sub_klasifikasi']])){
      $data6="1";
    }else{
      $data6="0";
    }
    if(isset($_POST["penjualan_7_".$id_izin_sub_str.'_'.$row_penjualan['id_sub_klasifikasi']])){
      $data7="1";
    }else{
      $data7="0";
    }
    if(isset($_POST["penjualan_8_".$id_izin_sub_str.'_'.$row_penjualan['id_sub_klasifikasi']])){
      $data8="1";
    }else{
      $data8="0";
    }
    if(isset($_POST["penjualan_9_".$id_izin_sub_str.'_'.$row_penjualan['id_sub_klasifikasi']])){
      $data9="1";
    }else{
      $data9="0";
    }
    if(isset($_POST["penjualan_10_".$id_izin_sub_str.'_'.$row_penjualan['id_sub_klasifikasi']])){
      $data10="1";
    }else{
      $data10="0";
    }
    if(isset($_POST["penjualan_11_".$id_izin_sub_str.'_'.$row_penjualan['id_sub_klasifikasi']])){
      $data11="1";
    }else{
      $data11="0";
    }
    if(isset($_POST["penjualan_12_".$id_izin_sub_str.'_'.$row_penjualan['id_sub_klasifikasi']])){
      $data12="1";
    }else{
      $data12="0";
    }
    if(isset($_POST["penjualan_13_".$id_izin_sub_str.'_'.$row_penjualan['id_sub_klasifikasi']])){
      $data13="1";
    }else{
      $data13="0";
    }
    if(isset($_POST["penjualan_14_".$id_izin_sub_str.'_'.$row_penjualan['id_sub_klasifikasi']])){
      $data14="1";
    }else{
      $data14="0";
    }
    if(isset($_POST["penjualan_15_".$id_izin_sub_str.'_'.$row_penjualan['id_sub_klasifikasi']])){
      $data15="1";
    }else{
      $data15="0";
    }
    if(isset($_POST["penjualan_16_".$id_izin_sub_str.'_'.$row_penjualan['id_sub_klasifikasi']])){
      $data16="1";
    }else{
      $data16="0";
    }
    if(isset($_POST["penjualan_17_".$id_izin_sub_str.'_'.$row_penjualan['id_sub_klasifikasi']])){
      $data17="1";
    }else{
      $data17="0";
    }
    if(isset($_POST["penjualan_18_".$id_izin_sub_str.'_'.$row_penjualan['id_sub_klasifikasi']])){
      $data18="1";
    }else{
      $data18="0";
    }
    if(isset($_POST["penjualan_19_".$id_izin_sub_str.'_'.$row_penjualan['id_sub_klasifikasi']])){
      $data19="1";
    }else{
      $data19="0";
    }
    if(isset($_POST["penjualan_20_".$id_izin_sub_str.'_'.$row_penjualan['id_sub_klasifikasi']])){
      $data20="1";
    }else{
      $data20="0";
    }
    if(isset($_POST["penjualan_21_".$id_izin_sub_str.'_'.$row_penjualan['id_sub_klasifikasi']])){
      $data21="1";
    }else{
      $data21="0";
    }
    if(isset($_POST["penjualan_22_".$id_izin_sub_str.'_'.$row_penjualan['id_sub_klasifikasi']])){
      $data22="1";
    }else{
      $data22="0";
    }
    if(isset($_POST["penjualan_23_".$id_izin_sub_str.'_'.$row_penjualan['id_sub_klasifikasi']])){
      $data23="1";
    }else{
      $data23="0";
    }
    if(isset($_POST["penjualan_24_".$id_izin_sub_str.'_'.$row_penjualan['id_sub_klasifikasi']])){
      $data24="1";
    }else{
      $data24="0";
    }
    if(isset($_POST["penjualan_25_".$id_izin_sub_str.'_'.$row_penjualan['id_sub_klasifikasi']])){
      $data25="1";
    }else{
      $data25="0";
    }
    if(isset($_POST["penjualan_26_".$id_izin_sub_str.'_'.$row_penjualan['id_sub_klasifikasi']])){
      $data26="1";
    }else{
      $data26="0";
    }
    if(isset($_POST["penjualan_27_".$id_izin_sub_str.'_'.$row_penjualan['id_sub_klasifikasi']])){
      $data27="1";
    }else{
      $data27="0";
    }


    $comment_pjskbu=$this->security->xss_clean(trim($post['penjualan_comment_'.$id_izin_sub_str.'_'.$row_penjualan['id_sub_klasifikasi']]));

    $select_penjualan1="REPLACE INTO lsbu_asesor_penjualan_tahunan (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id_izin,id_sub_klasifikasi,id,checklist,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','$id_izin_penjualan','$id_sub_klasifikasi_penjualan','1','$data1','$comment_pjskbu')";
    $where="";
    $this->Bu_model->delete_opr($select_penjualan1,$where);


    $select_penjualan2="REPLACE INTO lsbu_asesor_penjualan_tahunan (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id_izin,id_sub_klasifikasi,id,checklist,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','$id_izin_penjualan','$id_sub_klasifikasi_penjualan','2','$data2','$comment_pjskbu')";
    $where="";
    $this->Bu_model->delete_opr($select_penjualan2,$where);


    $select_penjualan3="REPLACE INTO lsbu_asesor_penjualan_tahunan (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id_izin,id_sub_klasifikasi,id,checklist,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','$id_izin_penjualan','$id_sub_klasifikasi_penjualan','3','$data3','$comment_pjskbu')";
    $where="";
    $this->Bu_model->delete_opr($select_penjualan3,$where);


    $select_penjualan4="REPLACE INTO lsbu_asesor_penjualan_tahunan (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id_izin,id_sub_klasifikasi,id,checklist,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','$id_izin_penjualan','$id_sub_klasifikasi_penjualan','4','$data4','$comment_pjskbu')";
    $where="";
    $this->Bu_model->delete_opr($select_penjualan4,$where);

    $select_penjualan5="REPLACE INTO lsbu_asesor_penjualan_tahunan (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id_izin,id_sub_klasifikasi,id,checklist,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','$id_izin_penjualan','$id_sub_klasifikasi_penjualan','5','$data5','$comment_pjskbu')";
    $where="";
    $this->Bu_model->delete_opr($select_penjualan5,$where);

    $select_penjualan6="REPLACE INTO lsbu_asesor_penjualan_tahunan (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id_izin,id_sub_klasifikasi,id,checklist,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','$id_izin_penjualan','$id_sub_klasifikasi_penjualan','6','$data6','$comment_pjskbu')";
    $where="";
    $this->Bu_model->delete_opr($select_penjualan6,$where);

    $select_penjualan7="REPLACE INTO lsbu_asesor_penjualan_tahunan (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id_izin,id_sub_klasifikasi,id,checklist,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','$id_izin_penjualan','$id_sub_klasifikasi_penjualan','7','$data7','$comment_pjskbu')";
    $where="";
    $this->Bu_model->delete_opr($select_penjualan7,$where);

    $select_penjualan8="REPLACE INTO lsbu_asesor_penjualan_tahunan (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id_izin,id_sub_klasifikasi,id,checklist,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','$id_izin_penjualan','$id_sub_klasifikasi_penjualan','8','$data8','$comment_pjskbu')";
    $where="";
    $this->Bu_model->delete_opr($select_penjualan8,$where);

    $select_penjualan9="REPLACE INTO lsbu_asesor_penjualan_tahunan (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id_izin,id_sub_klasifikasi,id,checklist,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','$id_izin_penjualan','$id_sub_klasifikasi_penjualan','9','$data9','$comment_pjskbu')";
    $where="";
    $this->Bu_model->delete_opr($select_penjualan9,$where);

    $select_penjualan10="REPLACE INTO lsbu_asesor_penjualan_tahunan (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id_izin,id_sub_klasifikasi,id,checklist,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','$id_izin_penjualan','$id_sub_klasifikasi_penjualan','10','$data10','$comment_pjskbu')";
    $where="";
    $this->Bu_model->delete_opr($select_penjualan10,$where);

    $select_penjualan11="REPLACE INTO lsbu_asesor_penjualan_tahunan (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id_izin,id_sub_klasifikasi,id,checklist,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','$id_izin_penjualan','$id_sub_klasifikasi_penjualan','11','$data11','$comment_pjskbu')";
    $where="";
    $this->Bu_model->delete_opr($select_penjualan11,$where);

    $select_penjualan12="REPLACE INTO lsbu_asesor_penjualan_tahunan (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id_izin,id_sub_klasifikasi,id,checklist,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','$id_izin_penjualan','$id_sub_klasifikasi_penjualan','12','$data12','$comment_pjskbu')";
    $where="";
    $this->Bu_model->delete_opr($select_penjualan12,$where);

    $select_penjualan13="REPLACE INTO lsbu_asesor_penjualan_tahunan (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id_izin,id_sub_klasifikasi,id,checklist,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','$id_izin_penjualan','$id_sub_klasifikasi_penjualan','13','$data13','$comment_pjskbu')";
    $where="";
    $this->Bu_model->delete_opr($select_penjualan13,$where);

    $select_penjualan14="REPLACE INTO lsbu_asesor_penjualan_tahunan (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id_izin,id_sub_klasifikasi,id,checklist,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','$id_izin_penjualan','$id_sub_klasifikasi_penjualan','14','$data14','$comment_pjskbu')";
    $where="";
    $this->Bu_model->delete_opr($select_penjualan14,$where);

    $select_penjualan15="REPLACE INTO lsbu_asesor_penjualan_tahunan (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id_izin,id_sub_klasifikasi,id,checklist,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','$id_izin_penjualan','$id_sub_klasifikasi_penjualan','15','$data15','$comment_pjskbu')";
    $where="";
    $this->Bu_model->delete_opr($select_penjualan15,$where);

    $select_penjualan16="REPLACE INTO lsbu_asesor_penjualan_tahunan (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id_izin,id_sub_klasifikasi,id,checklist,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','$id_izin_penjualan','$id_sub_klasifikasi_penjualan','16','$data16','$comment_pjskbu')";
    $where="";
    $this->Bu_model->delete_opr($select_penjualan16,$where);

    $select_penjualan17="REPLACE INTO lsbu_asesor_penjualan_tahunan (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id_izin,id_sub_klasifikasi,id,checklist,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','$id_izin_penjualan','$id_sub_klasifikasi_penjualan','17','$data17','$comment_pjskbu')";
    $where="";
    $this->Bu_model->delete_opr($select_penjualan17,$where);

    $select_penjualan18="REPLACE INTO lsbu_asesor_penjualan_tahunan (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id_izin,id_sub_klasifikasi,id,checklist,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','$id_izin_penjualan','$id_sub_klasifikasi_penjualan','18','$data18','$comment_pjskbu')";
    $where="";
    $this->Bu_model->delete_opr($select_penjualan18,$where);

    $select_penjualan19="REPLACE INTO lsbu_asesor_penjualan_tahunan (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id_izin,id_sub_klasifikasi,id,checklist,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','$id_izin_penjualan','$id_sub_klasifikasi_penjualan','19','$data19','$comment_pjskbu')";
    $where="";
    $this->Bu_model->delete_opr($select_penjualan19,$where);

    $select_penjualan20="REPLACE INTO lsbu_asesor_penjualan_tahunan (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id_izin,id_sub_klasifikasi,id,checklist,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','$id_izin_penjualan','$id_sub_klasifikasi_penjualan','20','$data20','$comment_pjskbu')";
    $where="";
    $this->Bu_model->delete_opr($select_penjualan20,$where);

    $select_penjualan21="REPLACE INTO lsbu_asesor_penjualan_tahunan (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id_izin,id_sub_klasifikasi,id,checklist,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','$id_izin_penjualan','$id_sub_klasifikasi_penjualan','21','$data21','$comment_pjskbu')";
    $where="";
    $this->Bu_model->delete_opr($select_penjualan21,$where);

    $select_penjualan22="REPLACE INTO lsbu_asesor_penjualan_tahunan (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id_izin,id_sub_klasifikasi,id,checklist,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','$id_izin_penjualan','$id_sub_klasifikasi_penjualan','22','$data22','$comment_pjskbu')";
    $where="";
    $this->Bu_model->delete_opr($select_penjualan22,$where);

    $select_penjualan23="REPLACE INTO lsbu_asesor_penjualan_tahunan (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id_izin,id_sub_klasifikasi,id,checklist,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','$id_izin_penjualan','$id_sub_klasifikasi_penjualan','23','$data23','$comment_pjskbu')";
    $where="";
    $this->Bu_model->delete_opr($select_penjualan23,$where);

    $select_penjualan24="REPLACE INTO lsbu_asesor_penjualan_tahunan (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id_izin,id_sub_klasifikasi,id,checklist,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','$id_izin_penjualan','$id_sub_klasifikasi_penjualan','24','$data24','$comment_pjskbu')";
    $where="";
    $this->Bu_model->delete_opr($select_penjualan24,$where);

    $select_penjualan25="REPLACE INTO lsbu_asesor_penjualan_tahunan (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id_izin,id_sub_klasifikasi,id,checklist,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','$id_izin_penjualan','$id_sub_klasifikasi_penjualan','25','$data25','$comment_pjskbu')";
    $where="";
    $this->Bu_model->delete_opr($select_penjualan25,$where);

    $select_penjualan26="REPLACE INTO lsbu_asesor_penjualan_tahunan (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id_izin,id_sub_klasifikasi,id,checklist,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','$id_izin_penjualan','$id_sub_klasifikasi_penjualan','26','$data26','$comment_pjskbu')";
    $where="";
    $this->Bu_model->delete_opr($select_penjualan26,$where);

    $select_penjualan27="REPLACE INTO lsbu_asesor_penjualan_tahunan (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id_izin,id_sub_klasifikasi,id,checklist,comment) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','$id_izin_penjualan','$id_sub_klasifikasi_penjualan','27','$data27','$comment_pjskbu')";
    $where="";
    $this->Bu_model->delete_opr($select_penjualan27,$where);
  }

  //---------Neraca CEKLIS
  $data_neraca=$this->Bu_model->neraca_ski($nib);
  foreach ($data_neraca as $row_neraca) {
    $tahun=$row_neraca['Tahun'];


    if(isset($_POST['keuangan_1_'.$tahun])){
      $data_neraca1="1";
    }else{
      $data_neraca1="0";
    }

    if(isset($_POST['keuangan_2_'.$tahun])){
      $data_neraca2="1";
    }else{
      $data_neraca2="0";
    }
    if(isset($_POST['keuangan_3_'.$tahun])){
      $data_neraca3="1";
    }else{
      $data_neraca3="0";
    }
    if(isset($_POST['keuangan_4_'.$tahun])){
      $data_neraca4="1";
    }else{
      $data_neraca4="0";
    }
    if(isset($_POST['keuangan_5_'.$tahun])){
      $data_neraca5="1";
    }else{
      $data_neraca5="0";
    }
    if(isset($_POST['keuangan_6_'.$tahun])){
      $data_neraca6="1";
    }else{
      $data_neraca6="0";
    }
    if(isset($_POST['keuangan_7_'.$tahun])){
      $data_neraca7="1";
    }else{
      $data_neraca7="0";
    }
    if(isset($_POST['keuangan_8_'.$tahun])){
      $data_neraca8="1";
    }else{
      $data_neraca8="0";
    }
    if(isset($_POST['keuangan_9_'.$tahun])){
      $data_neraca9="1";
    }else{
      $data_neraca9="0";
    }
    if(isset($_POST['keuangan_10_'.$tahun])){
      $data_neraca10="1";
    }else{
      $data_neraca10="0";
    }
    if(isset($_POST['keuangan_11_'.$tahun])){
      $data_neraca11="1";
    }else{
      $data_neraca11="0";
    }

    $select_keuangan1="REPLACE INTO lsbu_asesor_keuangan (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,tahun,id,checklist) VALUES ('$nib','$tgl_permohonan2x','$sub_klasifikasi','$id_user','$tahun','1','$data_neraca1')";
    $where="";
    $this->Bu_model->delete_opr($select_keuangan1,$where);

    $select_keuangan2="REPLACE INTO lsbu_asesor_keuangan (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,tahun,id,checklist) VALUES ('$nib','$tgl_permohonan2x','$sub_klasifikasi','$id_user','$tahun','2','$data_neraca2')";
    $where="";
    $this->Bu_model->delete_opr($select_keuangan2,$where);

    $select_keuangan3="REPLACE INTO lsbu_asesor_keuangan (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,tahun,id,checklist) VALUES ('$nib','$tgl_permohonan2x','$sub_klasifikasi','$id_user','$tahun','3','$data_neraca3')";
    $where="";
    $this->Bu_model->delete_opr($select_keuangan3,$where);

    $select_keuangan4="REPLACE INTO lsbu_asesor_keuangan (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,tahun,id,checklist) VALUES ('$nib','$tgl_permohonan2x','$sub_klasifikasi','$id_user','$tahun','4','$data_neraca4')";
    $where="";
    $this->Bu_model->delete_opr($select_keuangan4,$where);

    $select_keuangan5="REPLACE INTO lsbu_asesor_keuangan (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,tahun,id,checklist) VALUES ('$nib','$tgl_permohonan2x','$sub_klasifikasi','$id_user','$tahun','5','$data_neraca5')";
    $where="";
    $this->Bu_model->delete_opr($select_keuangan5,$where);

    $select_keuangan6="REPLACE INTO lsbu_asesor_keuangan (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,tahun,id,checklist) VALUES ('$nib','$tgl_permohonan2x','$sub_klasifikasi','$id_user','$tahun','6','$data_neraca6')";
    $where="";
    $this->Bu_model->delete_opr($select_keuangan6,$where);

    $select_keuangan7="REPLACE INTO lsbu_asesor_keuangan (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,tahun,id,checklist) VALUES ('$nib','$tgl_permohonan2x','$sub_klasifikasi','$id_user','$tahun','7','$data_neraca7')";
    $where="";
    $this->Bu_model->delete_opr($select_keuangan7,$where);

    $select_keuangan8="REPLACE INTO lsbu_asesor_keuangan (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,tahun,id,checklist) VALUES ('$nib','$tgl_permohonan2x','$sub_klasifikasi','$id_user','$tahun','8','$data_neraca8')";
    $where="";
    $this->Bu_model->delete_opr($select_keuangan8,$where);

    $select_keuangan9="REPLACE INTO lsbu_asesor_keuangan (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,tahun,id,checklist) VALUES ('$nib','$tgl_permohonan2x','$sub_klasifikasi','$id_user','$tahun','9','$data_neraca9')";
    $where="";
    $this->Bu_model->delete_opr($select_keuangan9,$where);

    $select_keuangan10="REPLACE INTO lsbu_asesor_keuangan (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,tahun,id,checklist) VALUES ('$nib','$tgl_permohonan2x','$sub_klasifikasi','$id_user','$tahun','10','$data_neraca10')";
    $where="";
    $this->Bu_model->delete_opr($select_keuangan10,$where);

    $select_keuangan11="REPLACE INTO lsbu_asesor_keuangan (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,tahun,id,checklist) VALUES ('$nib','$tgl_permohonan2x','$sub_klasifikasi','$id_user','$tahun','11','$data_neraca11')";
    $where="";
    $this->Bu_model->delete_opr($select_keuangan11,$where);




  }
  //----------pjbu
  if(isset($_POST['checkbox_pjbu_1'])){
    $data_pjbu1="1";
  }else{
    $data_pjbu1="0";
  }
  $select_pjbu1="REPLACE INTO lsbu_asesor_pjbu (NIB,tgl_permohonan,sub_klasifikasi,id,id_asesor,checklist) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','1','$id_user','$data_pjbu1')";
  $where="";
  $this->Bu_model->delete_opr($select_pjbu1,$where);

  if(isset($_POST['checkbox_pjbu_2'])){
    $data_pjbu2="1";
  }else{
    $data_pjbu2="0";
  }
  $select_pjbu2="REPLACE INTO lsbu_asesor_pjbu (NIB,tgl_permohonan,sub_klasifikasi,id,id_asesor,checklist) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','2','$id_user','$data_pjbu2')";
  $where="";
  $this->Bu_model->delete_opr($select_pjbu2,$where);
  if(isset($_POST['checkbox_pjbu_3'])){
    $data_pjbu3="1";
  }else{
    $data_pjbu3="0";
  }
  $select_pjbu3="REPLACE INTO lsbu_asesor_pjbu (NIB,tgl_permohonan,sub_klasifikasi,id,id_asesor,checklist) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','3','$id_user','$data_pjbu3')";
  $where="";
  $this->Bu_model->delete_opr($select_pjbu3,$where);
  //--------PJTBU
  if(isset($_POST['checkbox_pjtbu_1'])){
    $data_pjtbu1="1";
  }else{
    $data_pjtbu1="0";
  }
  if(isset($_POST['checkbox_pjtbu_2'])){
    $data_pjtbu2="1";
  }else{
    $data_pjtbu2="0";
  }
  if(isset($_POST['checkbox_pjtbu_3'])){
    $data_pjtbu3="1";
  }else{
    $data_pjtbu3="0";
  }
  if(isset($_POST['checkbox_pjtbu_4'])){
    $data_pjtbu4="1";
  }else{
    $data_pjtbu4="0";
  }
  if(isset($_POST['checkbox_pjtbu_5'])){
    $data_pjtbu5="1";
  }else{
    $data_pjtbu5="0";
  }
  if(isset($_POST['checkbox_pjtbu_6'])){
    $data_pjtbu6="1";
  }else{
    $data_pjtbu6="0";
  }
  if(isset($_POST['checkbox_pjtbu_7'])){
    $data_pjtbu7="1";
  }else{
    $data_pjtbu7="0";
  }
  if(isset($_POST['checkbox_pjtbu_8'])){
    $data_pjtbu8="1";
  }else{
    $data_pjtbu8="0";
  }
  if(isset($_POST['checkbox_pjtbu_9'])){
    $data_pjtbu9="1";
  }else{
    $data_pjtbu9="0";
  }
  if(isset($_POST['checkbox_pjtbu_10'])){
    $data_pjtbu10="1";
  }else{
    $data_pjtbu10="0";
  }
  if(isset($_POST['checkbox_pjtbu_11'])){
    $data_pjtbu11="1";
  }else{
    $data_pjtbu11="0";
  }
  if(isset($_POST['checkbox_pjtbu_12'])){
    $data_pjtbu12="1";
  }else{
    $data_pjtbu12="0";
  }
  $klasifikasi_pjt_skk = $this->security->xss_clean($post['klasifikasi_asesor_pjtbu']);
  $sub_klasifikasi_pjt_skk = $this->security->xss_clean($post['sub_klasifikasi_asesor_pjtbu']);
  $select_pjtbu1="REPLACE INTO lsbu_asesor_pjtbu (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,checklist,klasifikasi_skk,sub_klasifikasi_skk) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','1','$data_pjtbu1','$klasifikasi_pjt_skk','$sub_klasifikasi_pjt_skk')";
  $where="";
  $this->Bu_model->delete_opr($select_pjtbu1,$where);

  $select_pjtbu2="REPLACE INTO lsbu_asesor_pjtbu (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,checklist,klasifikasi_skk,sub_klasifikasi_skk) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','2','$data_pjtbu2','$klasifikasi_pjt_skk','$sub_klasifikasi_pjt_skk')";
  $where="";
  $this->Bu_model->delete_opr($select_pjtbu2,$where);

  $select_pjtbu3="REPLACE INTO lsbu_asesor_pjtbu (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,checklist,klasifikasi_skk,sub_klasifikasi_skk) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','3','$data_pjtbu3','$klasifikasi_pjt_skk','$sub_klasifikasi_pjt_skk')";
  $where="";
  $this->Bu_model->delete_opr($select_pjtbu3,$where);

  $select_pjtbu4="REPLACE INTO lsbu_asesor_pjtbu (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,checklist,klasifikasi_skk,sub_klasifikasi_skk) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','4','$data_pjtbu4','$klasifikasi_pjt_skk','$sub_klasifikasi_pjt_skk')";
  $where="";
  $this->Bu_model->delete_opr($select_pjtbu4,$where);

  $select_pjtbu5="REPLACE INTO lsbu_asesor_pjtbu (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,checklist,klasifikasi_skk,sub_klasifikasi_skk) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','5','$data_pjtbu5','$klasifikasi_pjt_skk','$sub_klasifikasi_pjt_skk')";
  $where="";
  $this->Bu_model->delete_opr($select_pjtbu5,$where);


  $select_pjtbu6="REPLACE INTO lsbu_asesor_pjtbu (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,checklist,klasifikasi_skk,sub_klasifikasi_skk) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','6','$data_pjtbu6','$klasifikasi_pjt_skk','$sub_klasifikasi_pjt_skk')";
  $where="";
  $this->Bu_model->delete_opr($select_pjtbu6,$where);


  $select_pjtbu7="REPLACE INTO lsbu_asesor_pjtbu (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,checklist,klasifikasi_skk,sub_klasifikasi_skk) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','7','$data_pjtbu7','$klasifikasi_pjt_skk','$sub_klasifikasi_pjt_skk')";
  $where="";
  $this->Bu_model->delete_opr($select_pjtbu7,$where);


  $select_pjtbu8="REPLACE INTO lsbu_asesor_pjtbu (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,checklist,klasifikasi_skk,sub_klasifikasi_skk) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','8','$data_pjtbu8','$klasifikasi_pjt_skk','$sub_klasifikasi_pjt_skk')";
  $where="";
  $this->Bu_model->delete_opr($select_pjtbu8,$where);


  $select_pjtbu9="REPLACE INTO lsbu_asesor_pjtbu (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,checklist,klasifikasi_skk,sub_klasifikasi_skk) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','9','$data_pjtbu9','$klasifikasi_pjt_skk','$sub_klasifikasi_pjt_skk')";
  $where="";
  $this->Bu_model->delete_opr($select_pjtbu9,$where);


  $select_pjtbu10="REPLACE INTO lsbu_asesor_pjtbu (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,checklist,klasifikasi_skk,sub_klasifikasi_skk) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','10','$data_pjtbu10','$klasifikasi_pjt_skk','$sub_klasifikasi_pjt_skk')";
  $where="";
  $this->Bu_model->delete_opr($select_pjtbu10,$where);


  $select_pjtbu11="REPLACE INTO lsbu_asesor_pjtbu (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,checklist,klasifikasi_skk,sub_klasifikasi_skk) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','11','$data_pjtbu11','$klasifikasi_pjt_skk','$sub_klasifikasi_pjt_skk')";
  $where="";
  $this->Bu_model->delete_opr($select_pjtbu11,$where);


  $select_pjtbu12="REPLACE INTO lsbu_asesor_pjtbu (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,checklist,klasifikasi_skk,sub_klasifikasi_skk) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','12','$data_pjtbu12','$klasifikasi_pjt_skk','$sub_klasifikasi_pjt_skk')";
  $where="";
  $this->Bu_model->delete_opr($select_pjtbu12,$where);


  //---------PJSKBU
  $record_pjsk=$this->Bu_model->pjskbu_opr_sub($nib,$sub_klasifikasi);
  foreach ($record_pjsk as $row_pjsk) {
    $sub_klas=$row_pjsk['id_sub_klasifikasi_pjsk'];
    if(isset($_POST['pjskbu_1_'.$sub_klas])){
      $data_pjsbu1="1";
    }else{
      $data_pjsbu1="0";
    }
    if(isset($_POST['pjskbu_2_'.$sub_klas])){
      $data_pjsbu2="1";
    }else{
      $data_pjsbu2="0";
    }
    if(isset($_POST['pjskbu_3_'.$sub_klas])){
      $data_pjsbu3="1";
    }else{
      $data_pjsbu3="0";
    }
    if(isset($_POST['pjskbu_4_'.$sub_klas])){
      $data_pjsbu4="1";
    }else{
      $data_pjsbu4="0";
    }
    if(isset($_POST['pjskbu_5_'.$sub_klas])){
      $data_pjsbu5="1";
    }else{
      $data_pjsbu5="0";
    }
    if(isset($_POST['pjskbu_6_'.$sub_klas])){
      $data_pjsbu6="1";
    }else{
      $data_pjsbu6="0";
    }
    if(isset($_POST['pjskbu_7_'.$sub_klas])){
      $data_pjsbu7="1";
    }else{
      $data_pjsbu7="0";
    }
    if(isset($_POST['pjskbu_8_'.$sub_klas])){
      $data_pjsbu8="1";
    }else{
      $data_pjsbu8="0";
    }
    if(isset($_POST['pjskbu_9_'.$sub_klas])){
      $data_pjsbu9="1";
    }else{
      $data_pjsbu9="0";
    }
    if(isset($_POST['pjskbu_10_'.$sub_klas])){
      $data_pjsbu10="1";
    }else{
      $data_pjsbu10="0";
    }
    $klasifikasi_pjskbu_skk = $this->security->xss_clean($post['klasifikasi_asesor_pjskbu']);
    $sub_klasifikasi_pjskbu_skk = $this->security->xss_clean($post['sub_klasifikasi_asesor_pjskbu']);
    $comment_pjskbu=$this->security->xss_clean(trim($post['pjskbu_comment_'.$sub_klas]));
    $select_pjsbu1="REPLACE INTO lsbu_asesor_pjskbu (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,checklist,comment,klasifikasi_skk,sub_klasifikasi_skk) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','1','$data_pjsbu1','$comment_pjskbu','$klasifikasi_pjskbu_skk','$sub_klasifikasi_pjskbu_skk')";
    $where="";
    $this->Bu_model->delete_opr($select_pjsbu1,$where);
    $select_pjsbu2="REPLACE INTO lsbu_asesor_pjskbu (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,checklist,comment,klasifikasi_skk,sub_klasifikasi_skk) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','2','$data_pjsbu2','$comment_pjskbu','$klasifikasi_pjskbu_skk','$sub_klasifikasi_pjskbu_skk')";
    $where="";
    $this->Bu_model->delete_opr($select_pjsbu2,$where);
    $select_pjsbu3="REPLACE INTO lsbu_asesor_pjskbu (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,checklist,comment,klasifikasi_skk,sub_klasifikasi_skk) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','3','$data_pjsbu3','$comment_pjskbu','$klasifikasi_pjskbu_skk','$sub_klasifikasi_pjskbu_skk')";
    $where="";
    $this->Bu_model->delete_opr($select_pjsbu3,$where);
    $select_pjsbu4="REPLACE INTO lsbu_asesor_pjskbu (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,checklist,comment,klasifikasi_skk,sub_klasifikasi_skk) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','4','$data_pjsbu4','$comment_pjskbu','$klasifikasi_pjskbu_skk','$sub_klasifikasi_pjskbu_skk')";
    $where="";
    $this->Bu_model->delete_opr($select_pjsbu4,$where);
    $select_pjsbu5="REPLACE INTO lsbu_asesor_pjskbu (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,checklist,comment,klasifikasi_skk,sub_klasifikasi_skk) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','5','$data_pjsbu5','$comment_pjskbu','$klasifikasi_pjskbu_skk','$sub_klasifikasi_pjskbu_skk')";
    $where="";
    $this->Bu_model->delete_opr($select_pjsbu5,$where);
    $select_pjsbu6="REPLACE INTO lsbu_asesor_pjskbu (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,checklist,comment,klasifikasi_skk,sub_klasifikasi_skk) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','6','$data_pjsbu6','$comment_pjskbu','$klasifikasi_pjskbu_skk','$sub_klasifikasi_pjskbu_skk')";
    $where="";
    $this->Bu_model->delete_opr($select_pjsbu6,$where);
    $select_pjsbu7="REPLACE INTO lsbu_asesor_pjskbu (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,checklist,comment,klasifikasi_skk,sub_klasifikasi_skk) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','7','$data_pjsbu7','$comment_pjskbu','$klasifikasi_pjskbu_skk','$sub_klasifikasi_pjskbu_skk')";
    $where="";
    $this->Bu_model->delete_opr($select_pjsbu7,$where);
    $select_pjsbu8="REPLACE INTO lsbu_asesor_pjskbu (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,checklist,comment,klasifikasi_skk,sub_klasifikasi_skk) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','8','$data_pjsbu8','$comment_pjskbu','$klasifikasi_pjskbu_skk','$sub_klasifikasi_pjskbu_skk')";
    $where="";
    $this->Bu_model->delete_opr($select_pjsbu8,$where);
    $select_pjsbu9="REPLACE INTO lsbu_asesor_pjskbu (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,checklist,comment,klasifikasi_skk,sub_klasifikasi_skk) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','9','$data_pjsbu9','$comment_pjskbu','$klasifikasi_pjskbu_skk','$sub_klasifikasi_pjskbu_skk')";
    $where="";
    $this->Bu_model->delete_opr($select_pjsbu9,$where);
    $select_pjsbu10="REPLACE INTO lsbu_asesor_pjskbu (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,id,checklist,comment,klasifikasi_skk,sub_klasifikasi_skk) VALUES ('$nib','$tgl_permohonan','$sub_klasifikasi','$id_user','10','$data_pjsbu10','$comment_pjskbu','$klasifikasi_pjskbu_skk','$sub_klasifikasi_pjskbu_skk')";
    $where="";
    $this->Bu_model->delete_opr($select_pjsbu10,$where);
  }
  //========administrasi
  if(isset($_POST['checkbox_administrasi_1'])){
    $data_administrasi_1="1";
  }else{
    $data_administrasi_1="0";
  }
  if(isset($_POST['checkbox_administrasi_2'])){
    $data_administrasi_2="1";
  }else{
    $data_administrasi_2="0";
  }
  if(isset($_POST['checkbox_administrasi_3'])){
    $data_administrasi_3="1";
  }else{
    $data_administrasi_3="0";
  }
  if(isset($_POST['checkbox_administrasi_4'])){
    $data_administrasi_4="1";
  }else{
    $data_administrasi_4="0";
  }
  if(isset($_POST['checkbox_administrasi_5'])){
    $data_administrasi_5="1";
  }else{
    $data_administrasi_5="0";
  }
  if(isset($_POST['checkbox_administrasi_6'])){
    $data_administrasi_6="1";
  }else{
    $data_administrasi_6="0";
  }
  if(isset($_POST['checkbox_administrasi_7'])){
    $data_administrasi_7="1";
  }else{
    $data_administrasi_7="0";
  }
  if(isset($_POST['checkbox_administrasi_8'])){
    $data_administrasi_8="1";
  }else{
    $data_administrasi_8="0";
  }
  if(isset($_POST['checkbox_administrasi_9'])){
    $data_administrasi_9="1";
  }else{
    $data_administrasi_9="0";
  }
  if(isset($_POST['checkbox_administrasi_10'])){
    $data_administrasi_10="1";
  }else{
    $data_administrasi_10="0";
  }
  if(isset($_POST['checkbox_administrasi_11'])){
    $data_administrasi_11="1";
  }else{
    $data_administrasi_11="0";
  }
  if(isset($_POST['checkbox_administrasi_12'])){
    $data_administrasi_12="1";
  }else{
    $data_administrasi_12="0";
  }
  if(isset($_POST['checkbox_administrasi_13'])){
    $data_administrasi_13="1";
  }else{
    $data_administrasi_13="0";
  }

  $comment_administrasi=$this->security->xss_clean(trim($post['administrasi_comment']));
  $select_administrasi="REPLACE INTO lsbu_asesor_administrasi (NIB,tgl_permohonan,sub_klasifikasi,id_asesor,checklis_1,checklis_2,checklis_3,checklis_4,checklis_5,checklis_6,checklis_7,checklis_8,checklis_9,checklis_10,checklis_11,checklis_12,checklis_13,comment) VALUES ('$nib','$tgl_permohonan2x','$sub_klasifikasi','$id_user','$data_administrasi_1','$data_administrasi_2','$data_administrasi_3','$data_administrasi_4','$data_administrasi_5','$data_administrasi_6','$data_administrasi_7','$data_administrasi_8','$data_administrasi_9','$data_administrasi_10','$data_administrasi_11','$data_administrasi_12','$data_administrasi_13','$comment_administrasi')";
  $where="";
  $this->Bu_model->delete_opr($select_administrasi,$where);
  //=====pengurus
  $record_pengurus=$this->Bu_model->pengurus_opr($nib);
  $comment_pengurus=$this->security->xss_clean(trim($post['pengurus_comment']));
  foreach ($record_pengurus as $row_pengurus) {
    $nik=$row_pengurus['no_ktp'];
    if(isset($_POST['checkbox_pengurus_1_'.$nik])){
      $data_pengurus_1="1";
    }else{
      $data_pengurus_1="0";
    }
    if(isset($_POST['checkbox_pengurus_2_'.$nik])){
      $data_pengurus_2="1";
    }else{
      $data_pengurus_2="0";
    }
    if(isset($_POST['checkbox_pengurus_3_'.$nik])){
      $data_pengurus_3="1";
    }else{
      $data_pengurus_3="0";
    }
    if(isset($_POST['checkbox_pengurus_4_'.$nik])){
      $data_pengurus_4="1";
    }else{
      $data_pengurus_4="0";
    }
    if(isset($_POST['checkbox_pengurus_5_'.$nik])){
      $data_pengurus_5="1";
    }else{
      $data_pengurus_5="0";
    }
    if(isset($_POST['checkbox_pengurus_6_'.$nik])){
      $data_pengurus_6="1";
    }else{
      $data_pengurus_6="0";
    }
    if(isset($_POST['checkbox_pengurus_7_'.$nik])){
      $data_pengurus_7="1";
    }else{
      $data_pengurus_7="0";
    }
    if(isset($_POST['checkbox_pengurus_8_'.$nik])){
      $data_pengurus_8="1";
    }else{
      $data_pengurus_8="0";
    }
    if(isset($_POST['checkbox_pengurus_9_'.$nik])){
      $data_pengurus_9="1";
    }else{
      $data_pengurus_9="0";
    }
    if(isset($_POST['checkbox_pengurus_10_'.$nik])){
      $data_pengurus_10="1";
    }else{
      $data_pengurus_10="0";
    }
    if(isset($_POST['checkbox_pengurus_11_'.$nik])){
      $data_pengurus_11="1";
    }else{
      $data_pengurus_11="0";
    }
    if(isset($_POST['checkbox_pengurus_12_'.$nik])){
      $data_pengurus_12="1";
    }else{
      $data_pengurus_12="0";
    }
    if(isset($_POST['checkbox_pengurus_13_'.$nik])){
      $data_pengurus_13="1";
    }else{
      $data_pengurus_13="0";
    }

    $select_pengurus="REPLACE INTO lsbu_asesor_pengurus (NIB,tgl_permohonan,sub_klasifikasi,NIK,id_asesor,checklis_1,checklis_2,checklis_3,checklis_4,checklis_5,checklis_6,checklis_7,checklis_8,checklis_9,checklis_10,checklis_11,checklis_12,checklis_13,comment) VALUES ('$nib','$tgl_permohonan2x','$sub_klasifikasi','$nik','$id_user','$data_pengurus_1','$data_pengurus_2','$data_pengurus_3','$data_pengurus_4','$data_pengurus_5','$data_pengurus_6','$data_pengurus_7','$data_pengurus_8','$data_pengurus_9','$data_pengurus_10','$data_pengurus_11','$data_pengurus_12','$data_pengurus_13','$comment_pengurus')";
    $where="";
    $this->Bu_model->delete_opr($select_pengurus,$where);

  }
  //Akte
  $record_akte=$this->Bu_model->akte_opr($nib);
  foreach ($record_akte as $row_akte) {
    $no=$row_akte['no'];
    $no_sk_kumham_asli=$row_akte['no_sk_kumham'];
    $no_sk_kumham2=str_replace(' ', '', $row_akte['no_sk_kumham']);
    $no_sk_kumham=preg_replace('/[^A-Za-z0-9\-]/', '', $no_sk_kumham2);
    if(isset($_POST['checkbox_akte_1_'.$no.'_'.$no_sk_kumham])){
      $data_akte_1="1";
    }else{
      $data_akte_1="0";
    }
    if(isset($_POST['checkbox_akte_2_'.$no.'_'.$no_sk_kumham])){
      $data_akte_2="1";
    }else{
      $data_akte_2="0";
    }
    if(isset($_POST['checkbox_akte_3_'.$no.'_'.$no_sk_kumham])){
      $data_akte_3="1";
    }else{
      $data_akte_3="0";
    }
    if(isset($_POST['checkbox_akte_4_'.$no.'_'.$no_sk_kumham])){
      $data_akte_4="1";
    }else{
      $data_akte_4="0";
    }
    if(isset($_POST['checkbox_akte_5_'.$no.'_'.$no_sk_kumham])){
      $data_akte_5="1";
    }else{
      $data_akte_5="0";
    }
    if(isset($_POST['checkbox_akte_6_'.$no.'_'.$no_sk_kumham])){
      $data_akte_6="1";
    }else{
      $data_akte_6="0";
    }
    if(isset($_POST['checkbox_akte_7_'.$no.'_'.$no_sk_kumham])){
      $data_akte_7="1";
    }else{
      $data_akte_7="0";
    }
    if(isset($_POST['checkbox_akte_8_'.$no.'_'.$no_sk_kumham])){
      $data_akte_8="1";
    }else{
      $data_akte_8="0";
    }
    if(isset($_POST['checkbox_akte_9_'.$no.'_'.$no_sk_kumham])){
      $data_akte_9="1";
    }else{
      $data_akte_9="0";
    }
    if(isset($_POST['checkbox_akte_10_'.$no.'_'.$no_sk_kumham])){
      $data_akte_10="1";
    }else{
      $data_akte_10="0";
    }
    if(isset($_POST['checkbox_akte_11_'.$no.'_'.$no_sk_kumham])){
      $data_akte_11="1";
    }else{
      $data_akte_11="0";
    }
    if(isset($_POST['checkbox_akte_12_'.$no.'_'.$no_sk_kumham])){
      $data_akte_12="1";
    }else{
      $data_akte_12="0";
    }
    if(isset($_POST['checkbox_akte_13_'.$no.'_'.$no_sk_kumham])){
      $data_akte_13="1";
    }else{
      $data_akte_13="0";
    }
    $select_akte="REPLACE INTO lsbu_asesor_akte (NIB,tgl_permohonan,sub_klasifikasi,no,no_sk_kumham,id_asesor,checklis_1,checklis_2,checklis_3,checklis_4,checklis_5,checklis_6,checklis_7,checklis_8,checklis_9,checklis_10,checklis_11,checklis_12,checklis_13) VALUES ('$nib','$tgl_permohonan2x','$sub_klasifikasi','$no','$no_sk_kumham_asli','$id_user','$data_akte_1','$data_akte_2','$data_akte_3','$data_akte_4','$data_akte_5','$data_akte_6','$data_akte_7','$data_akte_8','$data_akte_9','$data_akte_10','$data_akte_11','$data_akte_12','$data_akte_13')";
    $where="";
    $this->Bu_model->delete_opr($select_akte,$where);
  }
  //Saham
  $record_saham=$this->Bu_model->pemegang_saham_opr($nib);
  foreach ($record_saham as $row_saham) {
    $nama_pemilik_asli=$row_saham['nama_pemilik'];
    $nama_pemilik2= str_replace(' ', '', $row_saham['nama_pemilik']);
    $nama_pemilik=preg_replace('/[^A-Za-z0-9\-]/', '', $nama_pemilik2);
    if(isset($_POST['checkbox_saham_1_'.$nama_pemilik])){
      $data_saham_1="1";
    }else{
      $data_saham_1="0";
    }
    if(isset($_POST['checkbox_saham_2_'.$nama_pemilik])){
      $data_saham_2="1";
    }else{
      $data_saham_2="0";
    }
    if(isset($_POST['checkbox_saham_3_'.$nama_pemilik])){
      $data_saham_3="1";
    }else{
      $data_saham_3="0";
    }
    if(isset($_POST['checkbox_saham_4_'.$nama_pemilik])){
      $data_saham_4="1";
    }else{
      $data_saham_4="0";
    }
    if(isset($_POST['checkbox_saham_5_'.$nama_pemilik])){
      $data_saham_5="1";
    }else{
      $data_saham_5="0";
    }
    if(isset($_POST['checkbox_saham_6_'.$nama_pemilik])){
      $data_saham_6="1";
    }else{
      $data_saham_6="0";
    }
    if(isset($_POST['checkbox_saham_7_'.$nama_pemilik])){
      $data_saham_7="1";
    }else{
      $data_saham_7="0";
    }
    if(isset($_POST['checkbox_saham_8_'.$nama_pemilik])){
      $data_saham_8="1";
    }else{
      $data_saham_8="0";
    }
    if(isset($_POST['checkbox_saham_9_'.$nama_pemilik])){
      $data_saham_9="1";
    }else{
      $data_saham_9="0";
    }
    if(isset($_POST['checkbox_saham_10_'.$nama_pemilik])){
      $data_saham_10="1";
    }else{
      $data_saham_10="0";
    }
    if(isset($_POST['checkbox_saham_11_'.$nama_pemilik])){
      $data_saham_11="1";
    }else{
      $data_saham_11="0";
    }
    $select_saham="REPLACE INTO lsbu_asesor_saham (NIB,tgl_permohonan,sub_klasifikasi,nama_pemilik,id_asesor,checklis_1,checklis_2,checklis_3,checklis_4,checklis_5,checklis_6,checklis_7,checklis_8,checklis_9,checklis_10,checklis_11) VALUES ('$nib','$tgl_permohonan2x','$sub_klasifikasi','$nama_pemilik_asli','$id_user','$data_saham_1','$data_saham_2','$data_saham_3','$data_saham_4','$data_saham_5','$data_saham_6','$data_saham_7','$data_saham_8','$data_saham_9','$data_saham_10','$data_saham_11')";
    $where="";
    $this->Bu_model->delete_opr($select_saham,$where);

  }
  if($insert=="Success"){
    $this->session->set_flashdata('title','Success');
    $this->session->set_flashdata('text','Penilaian Berhasil Diinput');
    $this->session->set_flashdata('class', "success");
    redirect('sertifikasi/asesor/'.$nib_dec.'/'.$tgl_dec.'/'.encrypt_url($id_user),'refresh');
  }else{
    $this->session->set_flashdata('title','Failed');
    $this->session->set_flashdata('text','Penilaian Gagl Diinput');
    $this->session->set_flashdata('class', "error");
    redirect('sertifikasi/asesor/'.$nib_dec.'/'.$tgl_dec.'/'.encrypt_url($id_user),'refresh');
  }

}else{
  $this->session->set_flashdata('title','Warning');
  $this->session->set_flashdata('text','Anda Tidak Memiliki Akses!');
  $this->session->set_flashdata('class', "warning");
  redirect('login', 'refresh');
}

}
function cetak_verifikasi($id1,$id2){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){
    $sub_klasifikasi = decrypt_url($id2);
    $nib= decrypt_url($id1);
    $check_permohonan=$this->Bu_model->check_permohonan_sub($nib,$sub_klasifikasi);
    $id_user=$check_permohonan[0]['user_status_1'];
    $get_user=$this->Bu_model->get_user($id_user);
    $status="1";
    $record=$this->Bu_model->get_ceklis($nib,$sub_klasifikasi,$status);
    $this->load->library('pdfgenerator');
    $this->data = array(
      'nama_pemeriksa'=>$get_user[0]['Nama'],
      'ceklis'=>$record,
      'tgl'=>$sub_klasifikasi,
      'biodata'=>$this->Bu_model->biodata_opr($nib),
      'pengurus'=>$this->Bu_model->pengurus_opr($nib),
      'penjualan_tahunan'=>$this->Bu_model->pengalaman_opr($nib,$sub_klasifikasi),
      'akte'=>$this->Bu_model->akte_opr($nib),
      'smm'=>$this->Bu_model->smm_opr($nib),
      'smap'=>$this->Bu_model->smap_opr($nib),
      'sk_kehakiman'=>$this->Bu_model->sk_kehakiman_opr($nib),
      'neraca'=>$this->Bu_model->neraca_ski($nib),
      'pemegang_saham'=>$this->Bu_model->pemegang_saham_opr($nib),
      'pjbu'=>$this->Bu_model->pjbu_opr($nib),
      'pjskbu'=>$this->Bu_model->pjskbu_opr($nib,$sub_klasifikasi),
      'pjtbu'=>$this->Bu_model->pjtbu_opr($nib,$sub_klasifikasi),
      'peralatan'=>$this->Bu_model->peralatan_opr($nib,$sub_klasifikasi),
      'kepemilikan_peralatan'=>$this->Bu_model->kepemilikan_peralatan_opr($nib,$sub_klasifikasi),

      'klasifikasi'=>$this->Bu_model->klasifikasi_kualifikasi_opr($nib,$sub_klasifikasi),
      'nib_dec'=>$id1,
      'tgl_dec'=>$id2,
    );
    $html = $this->load->view('sertifikasi/verifikasi_ceklis', $this->data, true);
    $filename = 'Tinjauan_Permohonan_'.$nib;
    $this->pdfgenerator->generate($html, $filename, true, 'A3', 'portrait');
    //$this->load->view('sertifikasi/verifikasi_ceklis',$this->data);

  }else{
    $this->session->set_flashdata('title','Warning');
    $this->session->set_flashdata('text','Anda tidak memiliki akses');
    $this->session->set_flashdata('class', "warning");
    redirect('login','refresh');
  }
}
function cetak_verifikasi_bu($id1,$id2){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->badan_usaha()){
    $tgl = decrypt_url($id2);
    $nib= decrypt_url($id1);
    $status="1";
    $record=$this->Bu_model->get_ceklis($nib,$tgl,$status);
    $this->load->library('pdfgenerator');
    $this->data = array(
      'ceklis'=>$record,
      'tgl'=>$tgl,
      'biodata'=>$this->Bu_model->biodata_opr($nib),
      'pengurus'=>$this->Bu_model->pengurus_opr($nib),
      'pengalaman'=>$this->Bu_model->pengalaman_opr($nib),
      'akte_pendirian'=>$this->Bu_model->akte_pendirian_opr($nib),
      'akte_perubahan'=>$this->Bu_model->akte_perubahan_opr($nib),
      'pph_omset'=>$this->Bu_model->pph_omset($nib),
      'neraca'=>$this->Bu_model->neraca_ski($nib),
      'pemegang_saham'=>$this->Bu_model->pemegang_saham_opr($nib),
      'tenaga_kerja'=>$this->Bu_model->tenaga_kerja_opr($nib),
      'peralatan'=>$this->Bu_model->peralatan_opr($nib),
      'klasifikasi'=>$this->Bu_model->klasifikasi_kualifikasi_opr($nib,$tgl),
      'nib_dec'=>$id1,
      'tgl_dec'=>$id2,
    );
    $html = $this->load->view('sertifikasi/verifikasi_ceklis', $this->data, true);
    $filename = 'report_'.time();
    $this->pdfgenerator->generate($html, $filename, true, 'A3', 'portrait');
    //$this->load->view('sertifikasi/verifikasi_ceklis',$this->data);

  }else{
    $this->session->set_flashdata('title','Warning');
    $this->session->set_flashdata('text','Anda tidak memiliki akses');
    $this->session->set_flashdata('class', "warning");
    redirect('login','refresh');
  }
}

function cetak_validasi($id1,$id2){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){
    $tgl = decrypt_url($id2);
    $nib= decrypt_url($id1);
    $status="2";
    $record=$this->Bu_model->get_ceklis($nib,$tgl,$status);
    $this->load->library('pdfgenerator');
    $this->data = array(
      'ceklis'=>$record,
      'tgl'=>$tgl,
      'biodata'=>$this->Bu_model->biodata_opr($nib),
      'pengurus'=>$this->Bu_model->pengurus_opr($nib),
      'pengalaman'=>$this->Bu_model->pengalaman_opr($nib),
      'akte_pendirian'=>$this->Bu_model->akte_pendirian_opr($nib),
      'akte_perubahan'=>$this->Bu_model->akte_perubahan_opr($nib),
      'pph_omset'=>$this->Bu_model->pph_omset($nib),
      'neraca'=>$this->Bu_model->neraca_ski($nib),
      'pemegang_saham'=>$this->Bu_model->pemegang_saham_opr($nib),
      'tenaga_kerja'=>$this->Bu_model->tenaga_kerja_opr($nib),
      'peralatan'=>$this->Bu_model->peralatan_opr($nib),
      'klasifikasi'=>$this->Bu_model->klasifikasi_kualifikasi_opr($nib,$tgl),
      'nib_dec'=>$id1,
      'tgl_dec'=>$id2,
    );
    $html = $this->load->view('sertifikasi/validasi_ceklis', $this->data, true);
    $filename = 'report_'.time();
    $this->pdfgenerator->generate($html, $filename, true, 'A3', 'portrait');
    //$this->load->view('sertifikasi/verifikasi_ceklis',$this->data);

  }else{
    $this->session->set_flashdata('title','Warning');
    $this->session->set_flashdata('text','Anda tidak memiliki akses');
    $this->session->set_flashdata('class', "warning");
    redirect('login','refresh');
  }
}


function surat_tugas()
{
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){
  $this->load->library('pdfgenerator');
  $nib=$this->session->userdata('nib');
  $id_user=$this->session->userdata('id_user');
  $sub_klasifikasi=$this->session->userdata('sub_klasifikasi');
  $bulan_romawi=$this->getBulanrw(date("m"));
  $bulan_huruf=$this->getBulan(date("m"));
  $tahun=date("Y-m-d");
  $id_propinsi2='09';
  $reco2=$this->Bu_model->get_surat_tugas($nib,$sub_klasifikasi);
  $rec=$this->Bu_model->check_permohonan($nib,$sub_klasifikasi);
  if(empty($reco2)){

    $bulan=$month = date("m",strtotime($tahun));
    $tahun=$month = date("Y",strtotime($tahun));
    $bulan_romawi=$this->getBulanrw($bulan);
    $panjang=strlen($rec[0]['no_urut']);
    $jumlah=5-$panjang;
    $nol='';
    for($i=0;$i<$jumlah;$i++){
      $nol=$nol.'0';
    }
    $no_surat=$nol.$rec[0]['no_urut'].'/SPA/'.$bulan_romawi.'/'.$tahun;
    $table='lsbu_surat_penunjukan';
    $filenamex = 'surat_tugas_'.$nol.$rec[0]['no_urut'].'SPA_'.$bulan_romawi.'_'.$tahun;
    $nomer_perjanjian=$nol.$rec[0]['no_urut'].'/SPS/'.$bulan_romawi.'/'.$tahun;

    $data=array(
      'no_surat'=>$no_surat,
      'tgl_permohonan'=>date("Y-m-d"),
      'sub_klasifikasi'=>$sub_klasifikasi,
      'NIB'=>$nib,
      'id_user'=>$id_user,
      'file'=>$filenamex.'.pdf',
      'tgl_cetak'=>date("Y-m-d H:i:s")
    );
    $record=$this->Bu_model->insert_sad($table,$data);
    $recordx=$this->Bu_model->biodata_opr($nib);
    $datax=array(
      'bulan'=>$bulan_huruf,
      'bu'=>$recordx,
      'izin'=>$this->Bu_model->get_izin_registrasi($nib,$sub_klasifikasi),
      'history'=>$this->Bu_model->check_permohonan($nib,$sub_klasifikasi),
      'perjanjian'=>$nomer_perjanjian,
      'no_surat'=>$no_surat,
      'tgl_permohonan'=>$tahun,
      'asesor'=>$this->Bu_model->cek_pilih_asesor2($nib,$sub_klasifikasi)

     );

     $html = $this->load->view('sertifikasi/surat_tugas_bu', $datax, true);

    $this->pdfgenerator->save($html, $filenamex, 'A4', 'portrait');
  }else{
    $no_surat=$reco2[0]['no_surat'];
    $bulan=$month = date("m",strtotime($tahun));
    $tahun=$month = date("Y",strtotime($tahun));
    $bulan_romawi=$this->getBulanrw($bulan);
    $panjang=strlen($rec[0]['no_urut']);
    $jumlah=5-$panjang;
    $nol='';
    for($i=0;$i<$jumlah;$i++){
      $nol=$nol.'0';
    }
    $nomer_perjanjian=$nol.$rec[0]['no_urut'].'/SPS/'.$bulan_romawi.'/'.$tahun;
  }






  $record=$this->Bu_model->biodata_opr($nib);

  $data=array(
    'bulan'=>$bulan_huruf,
    'izin'=>$this->Bu_model->get_izin_registrasi($nib,$sub_klasifikasi),
    'history'=>$this->Bu_model->check_permohonan($nib,$sub_klasifikasi),
    'perjanjian'=>$nomer_perjanjian,
    'bu'=>$record,
    'no_surat'=>$no_surat,
    'tgl_permohonan'=>$tahun,
    'asesor'=>$this->Bu_model->cek_pilih_asesor2($nib,$sub_klasifikasi)

   );

   $html = $this->load->view('sertifikasi/surat_tugas_bu', $data, true);
   $filename = 'Surat_Tugas_'.$no_surat;

   $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');

   //$this->load->view('sertifikasi/surat_tugas_bu',$data);
 }else{
   $this->session->set_flashdata('title','Warning');
   $this->session->set_flashdata('text','Anda tidak memiliki akses');
   $this->session->set_flashdata('class', "warning");
   redirect('login','refresh');
 }
}
function delete_penunjukan_bu()
{
  if (!$this->ion_auth->ceklogin()) {
    $this->session->set_flashdata('title', 'Login Gagal');
    $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "bg-warning");
    redirect('index.php/login', 'refresh');
  }
  $post = $this->input->post();
  $id_asesor=$this->security->xss_clean(trim($post['nama']));
  $nib = $this->session->userdata('nib');
  $sub_klasifikasi = $this->session->userdata('sub_klasifikasi');
  $delete = $this->Bu_model->delete_nilai_bu($nib, $sub_klasifikasi,$id_asesor);
  $response = array(
    'status' => $delete,
  );

  echo json_encode($response);
}
function insert_penunjukan(){
  if (!$this->ion_auth->ceklogin()) {
    $this->session->set_flashdata('title', 'Login Gagal');
    $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "bg-warning");
    redirect('index.php/login', 'refresh');
  }
  $id_user=$this->session->userdata('id_user');
    $post = $this->input->post();
    $asesor1=$this->security->xss_clean(trim($post['asesor1']));
    $asesor2=$this->security->xss_clean(trim($post['asesor2']));
    $status=$this->security->xss_clean(trim($post['status']));
    $nib=$this->session->userdata('nib');
    $sub_klasifikasi=$this->session->userdata('sub_klasifikasi');
    $table="lsbu_asesor_penunjukan";
    $record='';
    $rec=$this->Bu_model->cek_pilih_asesor($nib,$sub_klasifikasi,$status);
    if(count($rec)!=2){
      if($asesor1!=''){
        $data=array(
          'NIB'=>$nib,
          'id_asesor'=>$asesor1,
          'tgl_permohonan'=>date("Y-m-d"),
          'sub_klasifikasi'=>$sub_klasifikasi,
          'status'=>$status,
          'username'=>$id_user,
          'tglupdate'=>date("Y-m-d h:i:sa"),
        );
        $record=$this->Bu_model->insert_sad($table,$data);
      }

      if($asesor2!=''){
        $data2=array(
          'NIB'=>$nib,
          'id_asesor'=>$asesor2,
          'tgl_permohonan'=>date("Y-m-d"),
          'sub_klasifikasi'=>$sub_klasifikasi,
          'status'=>$status,
          'username'=>$id_user,
          'tglupdate'=>date("Y-m-d h:i:sa"),
        );
        $record=$this->Bu_model->insert_sad($table,$data2);

      }
    }




    $response = array(
                    'asesor1'=>$asesor1,
                    'asesor2'=>$asesor2
                  );

        echo json_encode($response);


}
function pilih_asesor()
{
  if (!$this->ion_auth->ceklogin()) {
    $this->session->set_flashdata('title', 'Login Gagal');
    $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "bg-warning");
    redirect('index.php/login', 'refresh');
  }
  $post = $this->input->post();
  $nama = $this->security->xss_clean(trim($post['nama']));
  $response = array(
    'record' => $this->Bu_model->pilih_asesor($nama)
  );

  echo json_encode($response);
}
function cek_asesor_penunjukan()
{
  if (!$this->ion_auth->ceklogin()) {
    $this->session->set_flashdata('title', 'Login Gagal');
    $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "bg-warning");
    redirect('index.php/login', 'refresh');
  }
  $post = $this->input->post();
  $nib = $this->security->xss_clean(trim($post['nib']));
  $sub_klasifikasi = $this->security->xss_clean(trim($post['tgl_permohonan']));
  $status2 = $this->security->xss_clean(trim($post['kualifikasi']));
  if($status2=='2'){
    $status1='1';
  }else{
    $status1='2';
  }
  $rec = $this->Bu_model->check_nilai($nib, $sub_klasifikasi);
  $sessionarray = array(
    'nib' => $nib,
    'sub_klasifikasi' => $sub_klasifikasi,
  );
  $this->session->set_userdata($sessionarray);
  if (empty($rec)) {
    $status = "TRUE";
  } else {
    $status = "FALSE";
  }
  $response = array(
    'status' => $status2,
    'record' => $this->Bu_model->cek_pilih_asesor($nib, $sub_klasifikasi,$status2),
    'record2'=> $this->Bu_model->cek_pilih_asesor($nib, $sub_klasifikasi,$status1)
  );

  echo json_encode($response);
}
function get_revisi_data()
{
  if (!$this->ion_auth->ceklogin()) {
    $this->session->set_flashdata('title', 'Login Gagal');
    $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "bg-warning");
    redirect('index.php/login', 'refresh');
  }
  $post = $this->input->post();
  $nib = $this->security->xss_clean(trim($post['nib']));
  $sub_klasifikasi = $this->security->xss_clean(trim($post['tgl_permohonan']));
  $record=$this->Bu_model->get_revisi_2($nib,$sub_klasifikasi);

  $response = array(
    'record' => $record,

  );

  echo json_encode($response);
}
function get_qr()
{
  if (!$this->ion_auth->ceklogin()) {
    $this->session->set_flashdata('title', 'Login Gagal');
    $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "bg-warning");
    redirect('index.php/login', 'refresh');
  }
  $post = $this->input->post();
  $nib = $this->security->xss_clean(trim($post['nib']));
  $tgl_permohonan = $this->security->xss_clean(trim($post['tgl_permohonan']));
  $record=$this->Bu_model->get_qr($nib,$tgl_permohonan);

  $response = array(
    'record' => $record,

  );

  echo json_encode($response);
}
function get_revisi_data2()
{
  if (!$this->ion_auth->ceklogin()) {
    $this->session->set_flashdata('title', 'Login Gagal');
    $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "bg-warning");
    redirect('index.php/login', 'refresh');
  }
  $post = $this->input->post();
  $nib = $this->security->xss_clean(trim($post['nib']));
  $tgl_permohonan = $this->security->xss_clean(trim($post['tgl_permohonan']));
  $record=$this->Bu_model->get_revisi_3($nib,$tgl_permohonan);

  $response = array(
    'record' => $record,

  );

  echo json_encode($response);
}
function permintaan_revisi()
{
  if (!$this->ion_auth->ceklogin()) {
    $this->session->set_flashdata('title', 'Login Gagal');
    $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "bg-warning");
    redirect('index.php/login', 'refresh');
  }
  $post = $this->input->post();
  $comment = $this->security->xss_clean(trim($post['comment']));
  $id_upload = $this->security->xss_clean(trim($post['id_upload']));
  $option1 = $this->security->xss_clean(trim($post['option1']));;
  $option2 = $this->security->xss_clean(trim($post['option2']));;
  $alamat = $this->security->xss_clean(trim($post['alamat']));
  $nib = decrypt_url($alamat);
  $id_user = $this->session->userdata('id_user');
  $id_asosiasi = $this->security->xss_clean(trim($post['asosiasi']));
  $sub_klasifikasi = decrypt_url($id_asosiasi);

  $data = array(
    'NIB' => $nib,
    'pds' => '1',
    'tgl_permohonan'=>'0000-00-00',
    'sub_klasifikasi'=>$sub_klasifikasi,
    'id_upload' => $id_upload,
    'id_user' => $id_user,
    'tgl_record' => date("Y-m-d_G:i:sa"),
    'ket' => $comment,
    'option1' => $option1,
    'option2' => $option2
  );
  $table = "lsbu_pds_history";
  $record = $this->Bu_model->insert_sad($table, $data);

  $response = array(
    'record' => $record,

  );

  echo json_encode($response);
}
function get_kualifikasi()
{
  if (!$this->ion_auth->ceklogin()) {
    $this->session->set_flashdata('title', 'Login Gagal');
    $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "bg-warning");
    redirect('index.php/login', 'refresh');
  }
  $post = $this->input->post();
  $nib = $this->security->xss_clean(trim($post['nib']));
  $sub_klasifikasi = $this->security->xss_clean(trim($post['tgl_permohonan']));
  $record=array();
  $rec=$this->Bu_model->get_kualifikasi_bu($nib,$sub_klasifikasi);
  if($rec[0]['2_asesor']!=''){
    $data=array(
      'kualifikasi'=>$rec[0]['2_asesor'],
      'value'=>'2'
    );
    array_push($record,$data);
  }
  if($rec[0]['1_asesor']!=''){
    $dataz=array(
      'kualifikasi'=>$rec[0]['1_asesor'],
      'value'=>'1'
    );
    array_push($record,$dataz);
  }

  $response = array(
    'record' => $record,
  );

  echo json_encode($response);
}
function berita_acara($id1,$id2)
{
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){
    $tgl = decrypt_url($id2);
    $nib= decrypt_url($id1);
  $this->load->library('pdfgenerator');
  $data=array(
     'record'=>$this->Bu_model->berita_acara2($nib,$tgl),
   );
   $html = $this->load->view('sertifikasi/berita_acara', $data, true);
   $filename = 'report_'.time();

   $this->pdfgenerator->generate($html, $filename, true, 'A3', 'landscape');
   //$this->load->view('report/tt_asosiasi_bu_ceklis',$data);
 }else{
  $this->session->set_flashdata('title','Warning');
  $this->session->set_flashdata('text','Anda tidak memiliki akses');
  $this->session->set_flashdata('class', "warning");
  redirect('login','refresh');
}
}
function ba_asesor($id1,$id2,$id3)
{
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){
    $tgl = decrypt_url($id2);
    $nib= decrypt_url($id1);
    $id_asesor= decrypt_url($id3);
  $this->load->library('pdfgenerator');
  $data=array(
     'record'=>$this->Bu_model->berita_acara3($nib,$tgl,$id_asesor),
     'klasifikasi'=>$this->Bu_model->klasifikasi_kualifikasi_oprx($nib,$tgl),
   );
   $html = $this->load->view('sertifikasi/ba_asesor', $data, true);
   $filename = 'report_'.time();

   $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
   //$this->load->view('report/tt_asosiasi_bu_ceklis',$data);
 }else{
  $this->session->set_flashdata('title','Warning');
  $this->session->set_flashdata('text','Anda tidak memiliki akses');
  $this->session->set_flashdata('class', "warning");
  redirect('login','refresh');
}
}


function list_tinjauan_permohonan(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana() OR $this->ion_auth->asesor()){
  $data=$this->Bu_model->list_verifikasi();
  $record=array();
  foreach ($data as $row) {
    $get=$this->Bu_model->get_revisix($row['NIB']);
    if(empty($get)){
      $status="0";
    }else{
      foreach($get as $row_revisi){
        if($row_revisi['status']=='1'){
          $che=$this->Bu_model->get_hapus_registrasix($row['NIB'],$row['id_sub_klasifikasi']);
          if(!empty($che)){
            $status="2";
            break;
          }else{
            $status="1";
            break;
          }

        }else{
          $status="1";
        }
      }
    }
    $get_tunjuk=$this->Bu_model->get_tunjuk_tinjauan($row['NIB'],$row['id_sub_klasifikasi']);
    if(!empty($get_tunjuk)){
      $nama_tunjuk=$get_tunjuk['0']['verifikator'];
    }else{
      $nama_tujuk="";
    }
    $get_user=$this->Bu_model->get_user($nama_tunjuk);
    $nama=$get_user[0]['Nama'];
    if($status!='2'){
    $datax=array(
        'nama_tunjuk'=>$nama,
      'file_pembayaran'=>$row['file_pembayaran'],
      'id_izin'=>$row['id_izin'],
      'verifikator'=>$row['verifikator_nama'],
      'biaya'=>$row['biaya'],
      'status_0'=>$row['status_0'],
      'id_sub_klasifikasi'=>$row['id_sub_klasifikasi'],
      'id_klasifikasi'=>$row['id_klasifikasi'],
      'kualifikasi'=>$row['kualifikasi'],
      'nama'=>$row['nama'],
      'NIB'=>$row['NIB'],
      'tgl_permohonan'=>$row['tgl_permohonan'],
      'propinsi'=>$row['id_sub_klasifikasi'],
      'tahun'=>$row['tahun'],
      'status_1'=>$row['status_1'],
      'status_2'=>$row['status_2'],
      'status_3'=>$row['status_3'],
      'stat'=>$status,
    );
    array_push($record,$datax);
  }
  }
  if($this->ion_auth->pelaksana()){
    $datax=$this->Bu_model->list_verifikasi_konfirmasi();
    foreach ($datax as $row) {
      $nama_tunjuk="";
      $status="0";
      $nama_tunjuk=$this->session->userdata('id_user');
      $get_user=$this->Bu_model->get_user($nama_tunjuk);
      $nama=$get_user[0]['Nama'];



        $dataxy=array(
          'nama_tunjuk'=>$nama,
        'file_pembayaran'=>$row['file_pembayaran'],
        'id_izin'=>$row['id_izin'],
        'verifikator'=>$row['verifikator_nama'],
        'biaya'=>$row['biaya'],
        'status_0'=>$row['status_0'],
        'id_sub_klasifikasi'=>$row['id_sub_klasifikasi'],
        'id_klasifikasi'=>$row['id_klasifikasi'],
        'kualifikasi'=>$row['kualifikasi'],
        'nama'=>$row['nama'],
        'NIB'=>$row['NIB'],
        'tgl_permohonan'=>$row['tgl_permohonan'],
        'propinsi'=>$row['id_sub_klasifikasi'],
        'tahun'=>$row['tahun'],
        'status_1'=>$row['status_1'],
        'status_2'=>$row['status_2'],
        'status_3'=>$row['status_3'],
        'stat'=>$status,
        );
        array_push($record,$dataxy);
      }
  }
  $this->data = array(
    'record'=>$record,

  );

  $this->template->load('menu/menu','sertifikasi/list_verifikasi', $this->data);
}else{
  $this->session->set_flashdata('title','Warning');
  $this->session->set_flashdata('text','Anda tidak memiliki akses');
  $this->session->set_flashdata('class', "warning");
  redirect('login','refresh');
}
}
function get_pelaksana()
{
  if (!$this->ion_auth->ceklogin()) {
    $this->session->set_flashdata('title', 'Login Gagal');
    $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "bg-warning");
    redirect('index.php/login', 'refresh');
  }
  $post = $this->input->post();

  $nib=$this->security->xss_clean(trim($post['tgl_permohonan']));
  $tgl=$this->security->xss_clean(trim($post['nib']));
  $record=$this->Bu_model->get_user_pelaksana();
  $data=array();
  if(empty($data)){
    $verifikator=array();
  }else{
    $verifikator=$this->Bu_model->get_user($data[0]['verifikator']);

  }
  $response = array(
    'record' => $record,
    'verifikator'=>$verifikator,
    'nib_dec'=>encrypt_url($nib),
    'tgl_dec'=>encrypt_url($tgl),
    'nib'=>$nib,
    'tgl'=>$tgl

  );

  echo json_encode($response);
}
function tunjuk_verifikatorxx()
{
  if (!$this->ion_auth->ceklogin()) {
    $this->session->set_flashdata('title', 'Login Gagal');
    $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "bg-warning");
    redirect('index.php/login', 'refresh');
  }
  $post = $this->input->post();
  $nib = $this->security->xss_clean(trim($post['nib']));
  $tgl_permohonan = $this->security->xss_clean(trim($post['tgl_permohonan']));
  $verifikator = $this->security->xss_clean(trim($post['param']));
  $table="lsbu_tunjuk_verifikator";
  $data=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>date('Y-m-d'),
    'sub_klasifikasi'=>$tgl_permohonan,
    'verifikator'=>$verifikator,
    'tgl_tunjuk'=>date("Y-m-d H:i:s")
  );
  $this->Bu_model->insert($table,$data);

  //$this->send_konfirmasi_verifikator($nib,$tgl_permohonan,$verifikator);


  $this->session->set_flashdata('title', 'Success');
  $this->session->set_flashdata('text', 'Konfirmasi Ke Verifikator berhasil dikirim');
  $this->session->set_flashdata('class', "success");
  redirect('sertifikasi/list_tinjauan_permohonan', 'refresh');
}
function list_tinjauan_permohonan_perbaikan(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana() OR $this->ion_auth->asesor()){
  $data=$this->Bu_model->list_verifikasi();
  $record=array();
  foreach ($data as $row) {
    $get=$this->Bu_model->get_revisix($row['NIB']);
    if(empty($get)){
      $status="0";
    }else{
      foreach($get as $row_revisi){
        if($row_revisi['status']=='1'){
          $che=$this->Bu_model->get_hapus_registrasix($row['NIB'],$row['id_sub_klasifikasi']);
          if(!empty($che)){
            $status="2";
            break;
          }else{
            $status="1";
            break;
          }

        }else{
          $status="1";
        }
      }
    }
    $get_tunjuk=$this->Bu_model->get_tunjuk_tinjauan($row['NIB'],$row['id_sub_klasifikasi']);
    if(!empty($get_tunjuk)){
      $nama_tunjuk=$get_tunjuk['0']['verifikator'];
    }else{
      $nama_tujuk="";
    }
    $get_user=$this->Bu_model->get_user($nama_tunjuk);
    $nama=$get_user[0]['Nama'];
    if($status=='2'){
    $datax=array(
      'nama_tunjuk'=>$nama,
      'file_pembayaran'=>$row['file_pembayaran'],
      'id_izin'=>$row['id_izin'],
      'verifikator'=>$row['verifikator_nama'],
      'biaya'=>$row['biaya'],
      'status_0'=>$row['status_0'],
      'id_sub_klasifikasi'=>$row['id_sub_klasifikasi'],
      'id_klasifikasi'=>$row['id_klasifikasi'],
      'kualifikasi'=>$row['kualifikasi'],
      'nama'=>$row['nama'],
      'NIB'=>$row['NIB'],
      'tgl_permohonan'=>$row['tgl_permohonan'],
      'propinsi'=>$row['id_sub_klasifikasi'],
      'tahun'=>$row['tahun'],
      'status_1'=>$row['status_1'],
      'status_2'=>$row['status_2'],
      'status_3'=>$row['status_3'],
      'stat'=>$status,
    );
    array_push($record,$datax);
  }
  }
  if($this->ion_auth->pelaksana()){
    $datax=$this->Bu_model->list_verifikasi_konfirmasi();
    foreach ($datax as $row) {
      $nama_tunjuk="";
      $status="0";
      $nama_tunjuk=$this->session->userdata('id_user');
      $get_user=$this->Bu_model->get_user($nama_tunjuk);
      $nama=$get_user[0]['Nama'];



        $dataxy=array(
          'nama_tunjuk'=>$nama,
        'file_pembayaran'=>$row['file_pembayaran'],
        'id_izin'=>$row['id_izin'],
        'verifikator'=>$row['verifikator_nama'],
        'biaya'=>$row['biaya'],
        'status_0'=>$row['status_0'],
        'id_sub_klasifikasi'=>$row['id_sub_klasifikasi'],
        'id_klasifikasi'=>$row['id_klasifikasi'],
        'kualifikasi'=>$row['kualifikasi'],
        'nama'=>$row['nama'],
        'NIB'=>$row['NIB'],
        'tgl_permohonan'=>$row['tgl_permohonan'],
        'propinsi'=>$row['id_sub_klasifikasi'],
        'tahun'=>$row['tahun'],
        'status_1'=>$row['status_1'],
        'status_2'=>$row['status_2'],
        'status_3'=>$row['status_3'],
        'stat'=>$status,
        );
        array_push($record,$dataxy);
      }
  }
  $this->data = array(
    'record'=>$record,

  );

  $this->template->load('menu/menu','sertifikasi/list_verifikasi', $this->data);
}else{
  $this->session->set_flashdata('title','Warning');
  $this->session->set_flashdata('text','Anda tidak memiliki akses');
  $this->session->set_flashdata('class', "warning");
  redirect('login','refresh');
}
}
function konfirmasi_yes($id1,$id2,$id3){
  $nib=decrypt_url($id1);
  $tgl_permohonan=decrypt_url($id2);
  $verifikator=decrypt_url($id3);
  $data=array(
    'verifikator'=>$verifikator,
    'tgl_tunjuk'=>date("Y-m-d")
  );
  $where=array(
    'NIB'=> $nib,
    'sub_klasifikasi'=>$tgl_permohonan
  );
  $table="lsbu_registrasi_history";
  $this->Bu_model->update_edit($where,$table,$data);
  // $data=array(
  //   'verifikator'=>$verifikator,
  // );
  // $where=array(
  //   'NIB'=> $nib,
  //   'tgl_permohonan'=>$tgl_permohonan
  // );
  // $table="lsbu_permohonan_masuk";
  // $this->Bu_model->update_edit($where,$table,$data);

  //========
  $data2=array(
    'status'=>'1',
  );
  $where2=array(
    'NIB'=> $nib,
    'sub_klasifikasi'=>$tgl_permohonan
  );
  $table2="lsbu_tunjuk_verifikator";
  $this->Bu_model->update_edit($where2,$table2,$data2);

  // $this->create_surat_verifikator($nib,$tgl_permohonan,$verifikator);
  // $this->send_email_verifikatorxx($nib,$tgl_permohonan);
  $this->session->set_flashdata('title', 'Success');
  $this->session->set_flashdata('text', 'Verifikator Berkasi Ditunjuk');
  $this->session->set_flashdata('class', "success");
  redirect('sertifikasi/konfirmasi_verifikator/'.$id1.'/'.$id2.'/'.$id3, 'refresh');

}
function konfirmasi_verifikator($id1,$id2,$id3){
  $nib=decrypt_url($id1);
  $tgl_permohonan=decrypt_url($id2);
  $verifikator=decrypt_url($id3);
  $this->data=array(
    'bu'=>$this->Bu_model->biodata_opr($nib),
    'klasifikasi'=>$this->Bu_model->klasifikasi_kualifikasi_oprx($nib,$tgl_permohonan),
    'id3'=>$id3,
    'id1'=>$id1,
    'id2'=>$id2
  );
  $this->load->view('konfirmasi_verifikator',$this->data);
}
function list_tanda_terima(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){
  $data=$this->Bu_model->list_tanda_terima();
  $record=array();
  foreach ($data as $row) {
    $get=$this->Bu_model->get_revisi($row['NIB'],$row['tgl_permohonan']);
    if(empty($get)){
      $status="0";
    }else{
      foreach($get as $row_revisi){
        if($row_revisi['status']=='0'){
          $status="1";
          break;
        }else{
          $status="2";
        }
      }
    }
    $rec=$this->Bu_model->get_penilaian($row['NIB'],$row['id_sub_klasifikasi']);

    $datax=array(
      'asesor1'=>$rec[0]['id_asesor'],
      'asesor2'=>$rec[1]['id_asesor'],
      'qr'=>$row['qr'],
      'biaya'=>$row['biaya'],
      'file_perjanjian'=>$row['file_perjanjian'],
      'file_invoice'=>$row['file_invoice'],
      'file_pembayaran'=>$row['file_pembayaran'],
      'status_0'=>$row['status_0'],
      'id_sub_klasifikasi'=>$row['id_sub_klasifikasi'],
      'id_klasifikasi'=>$row['id_klasifikasi'],
      'kualifikasi'=>$row['kualifikasi'],
      'nama'=>$row['nama'],
      'NIB'=>$row['NIB'],
      'tgl_permohonan'=>$row['tgl_permohonan'],
      'propinsi'=>$row['id_sub_klasifikasi'],
      'tahun'=>$row['tahun'],
      'status_1'=>$row['status_1'],
      'status_2'=>$row['status_2'],
      'status_3'=>$row['status_3'],
      'stat'=>$status,
    );
    array_push($record,$datax);
  }
  $this->data = array(
    'record'=>$record,

  );
  $this->template->load('menu/menu','sertifikasi/list_tanda_terima', $this->data);
}else{
  $this->session->set_flashdata('title','Warning');
  $this->session->set_flashdata('text','Anda tidak memiliki akses');
  $this->session->set_flashdata('class', "warning");
  redirect('login','refresh');
}
}
function list_tanda_terima_perubahan(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){
  $data=$this->Bu_model->list_tanda_terima_perubahan();
  $record=array();
  foreach ($data as $row) {

      $status="0";


    $datax=array(

      'biaya'=>$row['biaya'],
      'file_perjanjian'=>$row['file_perjanjian'],
      'file_invoice'=>$row['file_invoice'],
      'file_pembayaran'=>$row['file_pembayaran'],
      'status_0'=>$row['status_0'],
      'id_sub_klasifikasi'=>$row['id_sub_klasifikasi'],
      'id_klasifikasi'=>$row['id_klasifikasi'],
      'kualifikasi'=>$row['kualifikasi'],
      'nama'=>$row['nama'],
      'NIB'=>$row['NIB'],
      'tgl_permohonan'=>$row['tgl_permohonan'],
      'propinsi'=>$row['id_sub_klasifikasi'],
      'tahun'=>$row['tahun'],
      'status_1'=>$row['status_1'],
      'status_2'=>$row['status_2'],
      'status_3'=>$row['status_3'],
      'stat'=>$status,
    );
    array_push($record,$datax);
  }
  $this->data = array(
    'record'=>$record,

  );
  $this->template->load('menu/menu','sertifikasi/list_tanda_terima_perubahan', $this->data);
}else{
  $this->session->set_flashdata('title','Warning');
  $this->session->set_flashdata('text','Anda tidak memiliki akses');
  $this->session->set_flashdata('class', "warning");
  redirect('login','refresh');
}
}
function list_validasi(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){

    $data=$this->Bu_model->list_validasi();
    $record=array();
    foreach ($data as $row) {
      $get=$this->Bu_model->get_revisi($row['NIB'],$row['tgl_permohonan']);
      if(empty($get)){
        $status="0";
      }else{
        foreach($get as $row_revisi){
          if($row_revisi['status']=='0'){
            $status="1";
            break;
          }else{
            $status="2";
          }
        }
      }
      $datax=array(
        'file_pembayaran'=>$row['file_pembayaran'],
        'biaya_lsbu'=>$row['biaya_lsbu'],
        'status_0'=>$row['status_0'],
        'concat_sub'=>$row['concat_sub'],
        'concat_klasifikasi'=>$row['concat_klasifikasi'],
        'concat_kualifikasi'=>$row['concat_kualifikasi'],
        'nama'=>$row['nama'],
        'NIB'=>$row['NIB'],
        'tgl_permohonan'=>$row['tgl_permohonan'],
        'propinsi'=>$row['concat_sub'],
        'tahun'=>$row['tahun'],
        'status_1'=>$row['status_1'],
        'status_2'=>$row['status_2'],
        'status_3'=>$row['status_3'],
        'status_4'=>$row['status_4'],
        'stat'=>$status,
      );
      array_push($record,$datax);
    }
    $this->data = array(
      'record'=>$record,

    );
  $this->template->load('menu/menu','sertifikasi/list_validasi', $this->data);
}else{
  $this->session->set_flashdata('title','Warning');
  $this->session->set_flashdata('text','Anda tidak memiliki akses');
  $this->session->set_flashdata('class', "warning");
  redirect('login','refresh');
}
}
function list_berita_acara(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){

        $data=$this->Bu_model->list_berita_acara();
        $record=array();

        foreach ($data as $row) {
          $penilaian='';
          $asesor='';
          $asesor1='';
          $asesor2='';
          $get=$this->Bu_model->get_revisi($row['NIB'],$row['id_sub_klasifikasi']);
          if(empty($get)){
            $status="0";
          }else{
            foreach($get as $row_revisi){
              if($row_revisi['status']=='0'){
                $status="1";
                break;
              }else{
                $status="2";
              }
            }
          }
          $check_penilaian=$this->Bu_model->get_penilaian($row['NIB'],$row['id_sub_klasifikasi']);
          for ($i=0; $i < count($check_penilaian) ; $i++) {
            if($i==0){
              $counter=$check_penilaian[$i]['id_asesor'];
              $asesor=$check_penilaian[$i]['Nama'];
              $asesor1=$check_penilaian[$i]['id_asesor'];
              if($check_penilaian[$i]['hasil_akhir']=='1'){
                $x="Sesuai";
              }else{
                $x="Tidak Sesuai";
              }
              $penilaian=$x;
            }else{
              if($counter!=$check_penilaian[$i]['id_asesor']){
                $asesor2=$check_penilaian[$i]['id_asesor'];
                $counter=$check_penilaian[$i]['id_asesor'];
                $asesor=$asesor.', '.$check_penilaian[$i]['Nama'];
                if($check_penilaian[$i]['hasil_akhir']=='0' AND $penilaian=='Sesuai'){

                  $x="Tidak Sesuai";
                }
                $penilaian=$x;
              }else{

                if($check_penilaian[$i]['hasil_akhir']=='0' AND $penilaian=='Sesuai'){
                  $x="Tidak Sesuai";
                }
                $penilaian=$x;
              }
            }

          }

          $datax=array(
            'asesor'=>$asesor,
            'asesor1'=>$asesor1,
            'asesor2'=>$asesor2,
            'penilaian'=>$penilaian,
            'file_pembayaran'=>$row['file_pembayaran'],
            'file_perjanjian'=>$row['file_perjanjian'],
            'biaya'=>$row['biaya'],
            'status_0'=>$row['status_0'],
            'id_sub_klasifikasi'=>$row['id_sub_klasifikasi'],
            'id_klasifikasi'=>$row['id_klasifikasi'],
            'kualifikasi'=>$row['kualifikasi'],
            'nama'=>$row['nama'],
            'NIB'=>$row['NIB'],
            'tgl_permohonan'=>$row['tgl_permohonan'],
            'propinsi'=>$row['id_sub_klasifikasi'],
            'tahun'=>$row['tahun'],
            'status_1'=>$row['status_1'],
            'status_2'=>$row['status_2'],
            'status_3'=>$row['status_3'],
            'stat'=>$status,
          );
          array_push($record,$datax);
        }
        $this->data = array(
          'record'=>$record,

        );

  $this->template->load('menu/menu','sertifikasi/list_berita_acara', $this->data);
}else{
  $this->session->set_flashdata('title','Warning');
  $this->session->set_flashdata('text','Anda tidak memiliki akses');
  $this->session->set_flashdata('class', "warning");
  redirect('login','refresh');
}
}
function list_penunjukan_asesor(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){

        $data=$this->Bu_model->list_penunjukan_asesor();
        $record=array();
        foreach ($data as $row) {
          $get=$this->Bu_model->get_revisi($row['NIB'],$row['tgl_permohonan']);
          if(empty($get)){
            $status="0";
          }else{
            foreach($get as $row_revisi){
              if($row_revisi['status']=='0'){
                $status="1";
                break;
              }else{
                $status="2";
              }
            }
          }
          $datax=array(
            'biaya'=>$row['biaya'],
            'status_0'=>$row['status_0'],
            'id_sub_klasifikasi'=>$row['id_sub_klasifikasi'],
            'id_klasifikasi'=>$row['id_klasifikasi'],
            'kualifikasi'=>$row['kualifikasi'],
            'nama'=>$row['nama'],
            'NIB'=>$row['NIB'],
            'tgl_permohonan'=>$row['tgl_permohonan'],
            'propinsi'=>$row['kualifikasi'],
            'tahun'=>$row['tahun'],
            'status_1'=>$row['status_1'],
            'status_2'=>$row['status_2'],
            'status_3'=>$row['status_3'],
            'stat'=>$status,
            'file_pembayaran'=>$row['file_pembayaran'],
            'file_perjanjian'=>$row['file_perjanjian'],
          );
          array_push($record,$datax);
        }
        $this->data = array(
          'record'=>$record,

        );

  $this->template->load('menu/menu','sertifikasi/list_penunjukan_asesor', $this->data);
}else{
  $this->session->set_flashdata('title','Warning');
  $this->session->set_flashdata('text','Anda tidak memiliki akses');
  $this->session->set_flashdata('class', "warning");
  redirect('login','refresh');
}
}

function permohonan($tgl_permohonan){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->badan_usaha()){
    $tgl = decrypt_url($tgl_permohonan);
    $nib=$this->session->userdata('id_user');
    $this->data = array(
      'tgl'=>$tgl_permohonan,
      'biodata'=>$this->Bu_model->biodata_opr($nib),
      'pengurus'=>$this->Bu_model->pengurus_opr($nib),
      'pengalaman'=>$this->Bu_model->pengalaman_opr($nib),
      'akte_pendirian'=>$this->Bu_model->akte_pendirian_opr($nib),
      'akte_perubahan'=>$this->Bu_model->akte_perubahan_opr($nib),
      'pph_omset'=>$this->Bu_model->pph_omset($nib),
      'neraca'=>$this->Bu_model->neraca_ski($nib),
      'pemegang_saham'=>$this->Bu_model->pemegang_saham_opr($nib),
      'tenaga_kerja'=>$this->Bu_model->tenaga_kerja_opr($nib),
      'peralatan'=>$this->Bu_model->peralatan_opr($nib),
      'klasifikasi'=>$this->Bu_model->klasifikasi_kualifikasi_opr($nib,$tgl),
      'cek'=>$this->Bu_model->cek_status_0($nib,$tgl)
    );
    $this->template->load('menu/menu','sertifikasi/permohonan', $this->data);
  }else{
    $this->session->set_flashdata('title','Warning');
    $this->session->set_flashdata('text','Anda tidak memiliki akses');
    $this->session->set_flashdata('class', "warning");
    redirect('login','refresh');
  }
}
function get_invoice($id1,$id2){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){
    $tgl = decrypt_url($id2);
    $nib = decrypt_url($id1);
    $rec=$this->Bu_model->biodata_opr($nib);
    $record=$this->Bu_model->klasifikasi_kualifikasi_biaya_sertifikasi($nib,$tgl);

    $this->data = array(
      //'tgl_dec'=>$tgl_permohonan,
      'tgl'=>$tgl,
      'biodata'=>$rec,
      'klasifikasi'=>$record,
    );
    $this->template->load('menu/menu','sertifikasi/get_biaya', $this->data);
  }else{
    $this->session->set_flashdata('title','Warning');
    $this->session->set_flashdata('text','Anda tidak memiliki akses');
    $this->session->set_flashdata('class', "warning");
    redirect('login','refresh');
  }
}

function biaya_sertifikasi($nib_dec=NULL,$tgl_permohonan=NULL){
  $nib = decrypt_url($nib_dec);
  $sub_klasifikasi = decrypt_url($tgl_permohonan);
  $check=$this->Bu_model->check_permohonan($nib,$sub_klasifikasi);
  if(!empty($check)){
    $rec=$this->Bu_model->biodata_opr($nib);
    $record=$this->Bu_model->klasifikasi_kualifikasi_biaya_sertifikasi_2($nib,$sub_klasifikasi);

    $this->data = array(
      'tgl_dec'=>$tgl_permohonan,
      'nib_dec'=>$nib_dec,
      'tgl'=>$tgl,
      'biodata'=>$rec,
      'klasifikasi'=>$record,
    );
    $this->load->view('sertifikasi/biaya_sertifikasi',$this->data);
  }else{
    $this->session->set_flashdata('title','Warning');
    $this->session->set_flashdata('text','Link Salah');
    $this->session->set_flashdata('class', "warning");
    redirect('error','refresh');
  }
}
function upload_surat_perjanjian(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){
  $post = $this->input->post();
  $sub_klasifikasi=$this->security->xss_clean(trim($post['tgl_permohonan']));
  $nib=$this->security->xss_clean(trim($post['nib']));

  $upload=NULL;
  if($_FILES['file_perjanjian']['name'])
  {
    $this->load->library('upload');
    $id_user=$this->session->userdata('id_user');
    $nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
    $config['upload_path'] = './assets/bukti/badan_usaha/bukti_perjanjian';
    $config['allowed_types'] = 'pdf|jpg|jpeg|png';
    $config['overwrite'] = TRUE;
    $config['file_name'] = $nmfile;
    $this->upload->initialize($config);
    if($this->upload->do_upload('file_perjanjian')){
      $gbr = $this->upload->data();
      $filename=$gbr['file_name'];
      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
      $alamat="./assets/bukti/badan_usaha/bukti_perjanjian/";

      $upload=$gbr['file_name'];
    }
  }

  if(!empty($upload)){

    $data=array(
      'file_perjanjian'=>$upload,
    );
    $where=array(
      'NIB'=> $nib,
      'sub_klasifikasi'=>$sub_klasifikasi
    );
    $table="lsbu_registrasi_history";
    $insert=$this->Bu_model->update_edit($where,$table,$data);
    if($insert=="Success"){

      $this->session->set_flashdata('title','Success');
      $this->session->set_flashdata('text','Perjanjian Berhasil di Upload');
      $this->session->set_flashdata('class', "success");
      $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode(array('result' => 1)));
      redirect('sertifikasi/list_pembayaran/','refresh');

    }else{
      $this->session->set_flashdata('title','Failed');
      $this->session->set_flashdata('text','Perjanjian Gagal di Upload');
      $this->session->set_flashdata('class', "success");
      $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode(array('result' => 1)));
      redirect('sertifikasi/list_pembayaran/','refresh');
    }



    }else{
      $this->session->set_flashdata('title','Failed');
      $this->session->set_flashdata('text','Perjanjian Gagal Di Input');
      $this->session->set_flashdata('class', "error");
      $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode(array('result' => 1)));
      redirect('sertifikasi/list_pembayaran/','refresh');
    }
  }else{
    $this->session->set_flashdata('title','Warning');
    $this->session->set_flashdata('text','Anda tidak memiliki akses');
    $this->session->set_flashdata('class', "warning");
    redirect('login','refresh');
  }

}
function insert_invoice(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){
  $post = $this->input->post();
  $id2=$this->security->xss_clean(trim($post['tgl_permohonan']));
  $id1=$this->security->xss_clean(trim($post['nib']));
  $sub_klasifikasi=decrypt_url($id2);
  $nib=decrypt_url($id1);

  $upload=NULL;
  if($_FILES['file_invoice']['name'])
  {
    $this->load->library('upload');
    $id_user=$this->session->userdata('id_user');
    $nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
    $config['upload_path'] = './assets/bukti/badan_usaha/bukti_invoice';
    $config['allowed_types'] = 'pdf|jpg|jpeg|png';
    $config['overwrite'] = TRUE;
    $config['file_name'] = $nmfile;
    $this->upload->initialize($config);
    if($this->upload->do_upload('file_invoice')){
      $gbr = $this->upload->data();
      $filename=$gbr['file_name'];
      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
      $alamat="./assets/bukti/badan_usaha/bukti_invoice/";

      $upload=$gbr['file_name'];
    }
  }

  if(!empty($upload)){

    $data=array(
      'file_invoice'=>$upload,
    );
    $where=array(
      'NIB'=> $nib,
      'sub_klasifikasi'=>$sub_klasifikasi
    );
    $table="lsbu_registrasi_history";
    $insert=$this->Bu_model->update_edit($where,$table,$data);
    if($insert=="Success"){

      $this->session->set_flashdata('title','Success');
      $this->session->set_flashdata('text','Invoice Berhasil di Upload');
      $this->session->set_flashdata('class', "success");
      $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode(array('result' => 1)));
      redirect('sertifikasi/tinjauan_permohonan/'.$id1."/".$id2,'refresh');

    }else{
      $this->session->set_flashdata('title','Failed');
      $this->session->set_flashdata('text','Invoice Gagal di Upload');
      $this->session->set_flashdata('class', "success");
      $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode(array('result' => 1)));
      redirect('sertifikasi/tinjauan_permohonan/'.$id1."/".$id2,'refresh');
    }



    }else{
      $this->session->set_flashdata('title','Failed');
      $this->session->set_flashdata('text','Pembayaran Gagal Di Input');
      $this->session->set_flashdata('class', "error");
      $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode(array('result' => 1)));
      redirect('sertifikasi/biaya_sertifikasi/'.$id2."/".$id1,'refresh');
    }
  }else{
    $this->session->set_flashdata('title','Warning');
    $this->session->set_flashdata('text','Anda tidak memiliki akses');
    $this->session->set_flashdata('class', "warning");
    redirect('login','refresh');
  }

}

function biaya($tgl_permohonan){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->badan_usaha()){
    $tgl = decrypt_url($tgl_permohonan);
    $nib=$this->session->userdata('id_user');
    $rec=$this->Bu_model->biodata_opr($nib);
    if($rec[0]['klasifikasi_jenis_usaha']=='BUJK' OR $rec[0]['klasifikasi_jenis_usaha']=='BUJK PMA'){
      $record=$this->Bu_model->klasifikasi_kualifikasi_opr_biaya_bujkn($nib,$tgl);
    }else{
      $record=$this->Bu_model->klasifikasi_kualifikasi_opr_biaya_bujka($nib,$tgl);

    }
    $this->data = array(
      'tgl_dec'=>$tgl_permohonan,
      'tgl'=>$tgl,
      'biodata'=>$rec,
      'klasifikasi'=>$record,
    );

    $this->template->load('menu/menu','sertifikasi/biaya', $this->data);
  }else{
    $this->session->set_flashdata('title','Warning');
    $this->session->set_flashdata('text','Anda tidak memiliki akses');
    $this->session->set_flashdata('class', "warning");
    redirect('login','refresh');
  }
}
function print_invoice($nib_dec,$sub_dec){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){
    $sub_klasifikasi = decrypt_url($sub_dec);
    $nib=decrypt_url($nib_dec);
    $check=$this->Bu_model->check_permohonan_sub($nib,$sub_klasifikasi);
    $cek_nomer=$this->Bu_model->cek_nomer();

    $nomer_urut=$cek_nomer[0]['nomer_urut']+1;
    if(!empty($check)){
    $rec=$this->Bu_model->biodata_opr($nib);
      $record=$this->Bu_model->klasifikasi_kualifikasi_biaya_sertifikasi_2($nib,$sub_klasifikasi);
      $tgl=date("Y-m-d");
      $bulan=$month = date("m",strtotime($tgl));
      $tahun=$month = date("Y",strtotime($tgl));
      $bulan_romawi=$this->getBulanrw($bulan);
      $panjang=strlen($record[0]['no_urut']);
      $jumlah=5-$panjang;
      $nol='';
      for($i=0;$i<$jumlah;$i++){
        $nol=$nol.'0';
      }
      $nomor_urut=$nol.$nomer_urut.'/INV-SBUJK/SKI/'.$bulan_romawi.'/'.$tahun;
      $this->data = array(
        'tgl_dec'=>$sub_dec,
        'tgl'=>$sub_klasifikasi,
        'biodata'=>$rec,
        'klasifikasi'=>$record,
        'bulan_romawi'=>$bulan_romawi,
        'no_urut'=>$nomor_urut
      );

    $this->load->library('pdfgenerator');
     $html = $this->load->view('report/invoice', $this->data, true);
     $filename = 'Invoice-'.$nib;

     $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
   }else{
     $this->session->set_flashdata('title','Warning');
     $this->session->set_flashdata('text','Link Salah');
     $this->session->set_flashdata('class', "warning");
     redirect('error','refresh');
   }
 }else{
   $this->session->set_flashdata('title','Warning');
   $this->session->set_flashdata('text','Anda tidak memiliki akses');
   $this->session->set_flashdata('class', "warning");
   redirect('login','refresh');
 }
}

function print_perjanjian($nib_dec,$tgl_permohonan){

    $sub_klasifikasi = decrypt_url($tgl_permohonan);
    $nib=decrypt_url($nib_dec);
    $check=$this->Bu_model->check_permohonan($nib,$sub_klasifikasi);
    if(!empty($check)){
    $rec=$this->Bu_model->biodata_opr($nib);
    $record=$this->Bu_model->klasifikasi_kualifikasi_biaya_sertifikasi_2($nib,$sub_klasifikasi);
    $tanggal = date('Y-m-d');
    $hari   = date('l', microtime($tanggal));
    $this->load->library('pdfgenerator');
    $hari_indonesia = array('Monday'  => 'Senin',
     'Tuesday'  => 'Selasa',
     'Wednesday' => 'Rabu',
     'Thursday' => 'Kamis',
     'Friday' => 'Jumat',
     'Saturday' => 'Sabtu',
     'Sunday' => 'Minggu');
     $bulan=$month = date("m",strtotime($tanggal));
     $tahun=$month = date("Y",strtotime($tanggal));
     $bulan_romawi=$this->getBulanrw($bulan);
     $panjang=strlen($record[0]['no_urut']);
     $jumlah=5-$panjang;
     $nol='';
     for($i=0;$i<$jumlah;$i++){
       $nol=$nol.'0';
     }
     $nomor_urut=$nol.$record[0]['no_urut'].'/SPS/'.$bulan_romawi.'/'.$tahun;
    $this->data = array(
      'bulan'=>$this->getBulan(date("m")),
      'hari'=>$hari_indonesia[$hari],
      'tgl_dec'=>$tgl_permohonan,
      'tgl'=>$tgl,
      'biodata'=>$rec,
      'klasifikasi'=>$record,
      'klasifikasi2'=>$this->Bu_model->klasifikasi_kualifikasi_opr($nib,$sub_klasifikasi),
      'pjbu'=>$this->Bu_model->pjbu_opr($nib),
      'no_urut'=>$nomor_urut
    );

    $this->load->library('pdfgenerator');
     $html = $this->load->view('report/surat_perjanjian', $this->data, true);
     $filename = 'SPS_'.$nomor_urut;
     //$this->load->view('report/surat_perjanjian', $this->data);
     $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
   }else{
     $this->session->set_flashdata('title','Warning');
     $this->session->set_flashdata('text','Link Salah');
     $this->session->set_flashdata('class', "warning");
     redirect('error','refresh');
   }
}

function ceklis_tanda_terima($tgl)
{

  $id_bu=$this->session->userdata('id_bu');
  $id_user=$this->session->userdata('id_user');
  $post = $this->input->post();
  $tgl_dec = decrypt_url($tgl);
  $id_asosiasi = substr($tgl_dec,10,10);
  $tgl_permohonan = substr($tgl_dec,0,10);
  $id_status='2';
  $id_status2='3';
  $record=$this->Bu_model->cek($id_bu,$tgl_permohonan,$id_status,$id_asosiasi);
  $record2=$this->Bu_model->cek($id_bu,$tgl_permohonan,$id_status2,$id_asosiasi);
  if(count($record)==count($record2)){
    $cek=$this->Bu_model->cek($id_bu,$tgl_permohonan,$id_status,$id_asosiasi);
  }else{
    $status3='7';
    $cek=$this->Bu_model->cek($id_bu,$tgl_permohonan,$id_status3,$id_asosiasi);
  }

  if(empty($cek)){

  $default2 = $this->load->database('default2', TRUE);
  $database2=$default2->database;
  $database=$this->db->database;
  $select="INSERT IGNORE INTO bu_registrasi_history_kbli(ID_BU,id_klasifikasi_kbli,id_sub_klasifikasi,id_sub_klasifikasi_kbli,ID_Asosiasi_BU,Kualifikasi,kualifikasi_kbli,Tahun,id_status,catatan,User_name,Tgl_proses,tgl_permohonan,Propinsi,indexs) SELECT ID_BU,id_klasifikasi_kbli,id_sub_klasifikasi,id_sub_klasifikasi_kbli,ID_Asosiasi_BU,Kualifikasi,kualifikasi_kbli,Tahun,'3','','$id_user',now(),Tgl_permohonan,Propinsi,'' FROM bu_registrasi_kbli";
  $where="WHERE ID_BU='$id_bu' AND Tgl_permohonan='$tgl_permohonan' AND ID_Asosiasi_BU='$id_asosiasi'";
  $select2="INSERT IGNORE INTO $database.bu_registrasi_history_kbli(ID_BU,id_klasifikasi_kbli,id_sub_klasifikasi,id_sub_klasifikasi_kbli,ID_Asosiasi_BU,Kualifikasi,kualifikasi_kbli,Tahun,id_status,catatan,User_name,Tgl_proses,tgl_permohonan,Propinsi,indexs) SELECT ID_BU,id_klasifikasi_kbli,id_sub_klasifikasi,id_sub_klasifikasi_kbli,ID_Asosiasi_BU,Kualifikasi,kualifikasi_kbli,Tahun,'3','','$id_user',now(),Tgl_permohonan,Propinsi,'' FROM $database2.bu_registrasi_kbli";
  $insert=$this->Bu_model->inserts_sad($select,$where);
  $insert2=$this->Bu_model->inserts($select2,$where);
  if($insert=="Success" AND $insert2=="Success"){
    $id_pds='6';
    $record_prov=$this->Bu_model->permohonan_propinsi($id_bu,$id_asosiasi,$tgl_permohonan);
    foreach($record_prov as $rec){
      if(substr($rec['kualifikasi_kbli'],0,1)=='B'){
        $propinsi_lpjk='00';
        $propinsi_asosiasi=$record_prov[0]['Propinsi'];
        break;
      }else{
        $propinsi_lpjk=$record_prov[0]['Propinsi'];
        $propinsi_asosiasi=$record_prov[0]['Propinsi'];
      }
    }
    $query=$this->Bupds_model->get_id_group($id_bu,$tgl_permohonan,$id_asosiasi);
    $id_group=$query[0]['ID_GROUP'];
    $data_status=array(
      'Status'=>3
    );
    $table='bu_pds_group';
    $where=array(
      'ID_GROUP'=>$id_group
    );
    $this->Bu_model->update_edit($where,$table,$data_status);
    $nama=$this->Bu_model->biodata_opr($id_bu);
    $nama_bu=$nama[0]['Nama'];
    $npwp=$nama[0]['NPWP'];

    $id_asosiasi_lpjk=$this->session->userdata('id_asosiasi');

    $aso=$this->Bu_model->asosiasi_search($id_asosiasi);
    $aso_lpjk=$this->Bu_model->asosiasi_search($id_asosiasi_lpjk);

    $text="Notifikasi Telah Di lakukan Penaikan Status Oleh LPJK";
    $text_lpjk="Notifikasi Permohonan Penaikan Status di LPJK";

    $status="3";
    $status_lpjk="4";

    $notifasosiasi=$this->notif_asosiasi($npwp,$nama_bu,$aso[0]['Nama'],$tgl_permohonan,$text,$status);
    $notiflpjk=$this->notif_lpjk($npwp,$nama_bu,$aso_lpjk[0]['Nama'],$tgl_permohonan,$text_lpjk,$status_lpjk);
    if($propinsi_lpjk=='00'){
      $pds='2';
    }else{
      $pds='1';
    }
    $data=array(
      'ID_GROUP'=>$id_group,
      'ID_PDS'=>$pds,
      'ID_ASOSIASI'=>$id_asosiasi,
      'ID_PROPINSI'=>$propinsi_asosiasi,
      'Tgl_Record'=>date("Y-m-d H:i:sa"),
      'Id_Sender'=>$this->session->userdata('id_user'),
      'Id_Receive'=>'',
      'Subject'=>$text,
      'Text'=>$notifasosiasi

    );
    $table='bu_pds_mail';
    $insert=$this->Bu_model->insert($table,$data);

    $datalpjk=array(
      'ID_GROUP'=>$id_group,
      'ID_PDS'=>'3',
      'ID_ASOSIASI'=>$id_asosiasi,
      'ID_PROPINSI'=>$propinsi_lpjk,
      'Tgl_Record'=>date("Y-m-d H:i:sa"),
      'Id_Sender'=>$this->session->userdata('id_user'),
      'Id_Receive'=>'',
      'Subject'=>$text_lpjk,
      'Text'=>$notiflpjk

    );
    $table='bu_pds_mail';
    $insertlpjk=$this->Bu_model->insert($table,$datalpjk);


    $this->session->set_flashdata('title','Success');
    $this->session->set_flashdata('text','Tanda Terima (Status 3) Berhasil Dibuat');
    $this->session->set_flashdata('class', "bg-success");
    redirect('sertifikasi/tt_status_3/'.$tgl,'refresh');
  }else{
    $this->session->set_flashdata('title','Failed');
    $this->session->set_flashdata('text','Tanda Terima (Status 3) Gagal DIbuat');
    $this->session->set_flashdata('class', "bg-danger");
    redirect('sertifikasi/tt_status_3/'.$tgl,'refresh');
  }



}else{
  redirect('sertifikasi/tt_status_3/'.$tgl,'refresh');
}
}
function tt_status_3($tgl_permohonan)
{

  $id_bu=$this->session->userdata('id_bu');
  $this->load->library('pdfgenerator');
  $tgl_dec = decrypt_url($tgl_permohonan);
  $tgl=substr($tgl_dec,0,10);
  $asosiasi=substr($tgl_dec,10,10);
   $data=array(
     'bu'=>$this->Bu_model->report_bu_administrasi($id_bu,$asosiasi,$tgl),
   );
   $html = $this->load->view('report/tt_bapel_3', $data, true);
   $filename = 'report_'.time();
   $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
   //$this->load->view('report/tt_bapel_bu',$data);
}
function tgl_terima(){

    $id_bu=$this->session->userdata('id_bu');
    $record=$this->Bu_model->tanggal_permohonan_terima($id_bu);
    $count='TRUE';
    if($this->ion_auth->ketualpjkprov()){
      foreach ($record as $row) {
        if($row['kualifikasi_kbli']=='B' OR $row['kualifikasi_kbli']=='B1' OR $row['kualifikasi_kbli']=='B2'){
          $count='FALSE';
          break;
        }
      }
      if($count=='FALSE'){
        $record=array();
      }
    }
    $this->data = array(
      'tgl_permohonan'=>$record
    );
    $this->template->load('menu/menu','sertifikasi/tgl_terima', $this->data);


}


function insert_verifikasi()
{
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){


  $id_user=$this->session->userdata('id_user');
  $post = $this->input->post();
  $tgl_dec = $this->security->xss_clean(trim($post['tgl_dec']));
  $nib_dec = $this->security->xss_clean(trim($post['nib_dec']));
  $email = $this->security->xss_clean(trim($post['email']));
  $sub_klasifikasi = decrypt_url($tgl_dec);
  $nib = decrypt_url($nib_dec);
  $table_ceklis="lsbu_ceklis";
  $date=date("Y-m-d");
  //administrasi
  if(isset($_POST['checkbox_80'])){
    $checkbox_administrasi="1";
  }else{
    $checkbox_administrasi="0";
  }
  if(isset($_POST['comment_80'])){
    $comment_administrasi=$this->security->xss_clean(trim($post['comment_80']));
  }else{
    $comment_administrasi="";
  }

  $data_admin=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
    'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'80',
    'ceklis'=>$checkbox_administrasi,
    'comment'=>$comment_administrasi
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_admin);
  //pengurus
  if(isset($_POST['checkbox_81'])){
    $checkbox_pengurus="1";
  }else{
    $checkbox_pengurus="0";
  }
  if(isset($_POST['comment_81'])){
    $comment_pengurus=$this->security->xss_clean(trim($post['comment_81']));
  }else{
    $comment_pengurus="";
  }
  $data_pengurus=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'81',
    'ceklis'=>$checkbox_pengurus,
    'comment'=>$comment_pengurus
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_pengurus);
  //pengalaman
  if(isset($_POST['checkbox_82'])){
    $checkbox_pengalaman="1";
  }else{
    $checkbox_pengalaman="0";
  }
  if(isset($_POST['comment_82'])){
    $comment_pengalaman=$this->security->xss_clean(trim($post['comment_82']));
  }else{
    $comment_pengalaman="";
  }
  $data_pengalaman=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'82',
    'ceklis'=>$checkbox_pengalaman,
    'comment'=>$comment_pengalaman
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_pengalaman);
  //akte_pendirian
  if(isset($_POST['checkbox_83'])){
    $checkbox_pendirian="1";
  }else{
    $checkbox_pendirian="0";
  }
  if(isset($_POST['comment_83'])){
    $comment_pendirian=$this->security->xss_clean(trim($post['comment_83']));
  }else{
    $comment_pendirian="";
  }
  $data_pendirian=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'83',
    'ceklis'=>$checkbox_pendirian,
    'comment'=>$comment_pendirian
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_pendirian);
  //pph_omset
  if(isset($_POST['checkbox_85'])){
    $checkbox_omset="1";
  }else{
    $checkbox_omset="0";
  }
  if(isset($_POST['comment_85'])){
    $comment_omset=$this->security->xss_clean(trim($post['comment_85']));
  }else{
    $comment_omset="";
  }
  $data_omset=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
      'id'=>'85',
    'ceklis'=>$checkbox_omset,
    'comment'=>$comment_omset
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_omset);
  //pemegang_saham
  if(isset($_POST['checkbox_86'])){
    $checkbox_saham="1";
  }else{
    $checkbox_saham="0";
  }
  if(isset($_POST['comment_86'])){
    $comment_saham=$this->security->xss_clean(trim($post['comment_86']));
  }else{
    $comment_saham="";
  }
  $data_saham=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'86',
    'ceklis'=>$checkbox_saham,
    'comment'=>$comment_saham
  );

  $this->Bu_model->insert_sad($table_ceklis,$data_saham);
  //ceraca
  if(isset($_POST['checkbox_87'])){
    $checkbox_neraca="1";
  }else{
    $checkbox_neraca="0";
  }
  if(isset($_POST['comment_87'])){
    $comment_neraca=$this->security->xss_clean(trim($post['comment_87']));
  }else{
    $comment_neraca="";
  }
  $data_neraca=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'87',
    'ceklis'=>$checkbox_neraca,
    'comment'=>$comment_neraca
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_neraca);
  //tenaga Kerja
  if(isset($_POST['checkbox_88'])){
    $checkbox_tk="1";
  }else{
    $checkbox_tk="0";
  }
  if(isset($_POST['comment_88'])){
    $comment_tk=$this->security->xss_clean(trim($post['comment_88']));
  }else{
    $comment_tk="";
  }
  $data_tk=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'88',
    'ceklis'=>$checkbox_tk,
    'comment'=>$comment_tk
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_tk);
  //peralatan
  if(isset($_POST['checkbox_89'])){
    $checkbox_peralatan="1";
  }else{
    $checkbox_peralatan="0";
  }
  if(isset($_POST['comment_89'])){
    $comment_peralatan1=$this->security->xss_clean(trim($post['comment_89']));
  }else{
    $comment_peralatan1="";
  }
  $data_peralatan=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'89',
    'ceklis'=>$checkbox_peralatan,
    'comment'=>$comment_peralatan1
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_peralatan);
  //klasifikasi
  if(isset($_POST['checkbox_90'])){
    $checkbox_klasifikasi="1";
  }else{
    $checkbox_klasifikasi="0";
  }
  if(isset($_POST['comment_90'])){
    $comment_klas=$this->security->xss_clean(trim($post['comment_90']));
  }else{
    $comment_klas="";
  }
  $data_klasifikasi=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'90',
    'ceklis'=>$checkbox_klasifikasi,
    'comment'=>$comment_klas
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_klasifikasi);
  //pjskbu
  if(isset($_POST['checkbox_77'])){
    $checkbox_77="1";
  }else{
    $checkbox_77="0";
  }
  if(isset($_POST['comment_77'])){
    $comment_77=$this->security->xss_clean(trim($post['comment_77']));
  }else{
    $comment_77="";
  }
  $data_77=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'77',
    'ceklis'=>$checkbox_77,
    'comment'=>$comment_77
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_77);
  //smap
  if(isset($_POST['checkbox_78'])){
    $checkbox_78="1";
  }else{
    $checkbox_78="0";
  }
  if(isset($_POST['comment_78'])){
    $comment_78=$this->security->xss_clean(trim($post['comment_78']));
  }else{
    $comment_78="";
  }
  $data_78=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'78',
    'ceklis'=>$checkbox_78,
    'comment'=>$comment_78
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_78);
  //smm
  if(isset($_POST['checkbox_79'])){
    $checkbox_79="1";
  }else{
    $checkbox_79="0";
  }
  if(isset($_POST['comment_79'])){
    $comment_79=$this->security->xss_clean(trim($post['comment_79']));
  }else{
    $comment_79="";
  }
  $data_79=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'79',
    'ceklis'=>$checkbox_79,
    'comment'=>$comment_klas
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_79);
  //1
  if(isset($_POST['checkbox_1'])){
    $checkbox_1="1";
  }else{
    $checkbox_1="0";
  }
  if(isset($_POST['comment_1'])){
    $comment_1=$this->security->xss_clean(trim($post['comment_1']));
  }else{
    $comment_1="";
  }
  $data_1=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'1',
    'ceklis'=>$checkbox_1,
    'comment'=>$comment_1
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_1);
  //24
  if(isset($_POST['checkbox_24'])){
    $checkbox_24="1";
  }else{
    $checkbox_24="0";
  }
  if(isset($_POST['comment_24'])){
    $comment_24=$this->security->xss_clean(trim($post['comment_24']));
  }else{
    $comment_24="";
  }
  $data_24=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'24',
    'ceklis'=>$checkbox_24,
    'comment'=>$comment_24
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_24);
  //25
  if(isset($_POST['checkbox_25'])){
    $checkbox_25="1";
  }else{
    $checkbox_25="0";
  }
  if(isset($_POST['comment_25'])){
    $comment_25=$this->security->xss_clean(trim($post['comment_25']));
  }else{
    $comment_25="";
  }
  $data_25=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'25',
    'ceklis'=>$checkbox_25,
    'comment'=>$comment_25
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_25);
  //26
  if(isset($_POST['checkbox_26'])){
    $checkbox_26="1";
  }else{
    $checkbox_26="0";
  }
  if(isset($_POST['comment_26'])){
    $comment_26=$this->security->xss_clean(trim($post['comment_26']));
  }else{
    $comment_26="";
  }
  $data_26=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'26',
    'ceklis'=>$checkbox_26,
    'comment'=>$comment_26
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_26);
  //27
  if(isset($_POST['checkbox_27'])){
    $checkbox_27="1";
  }else{
    $checkbox_27="0";
  }
  if(isset($_POST['comment_27'])){
    $comment_27=$this->security->xss_clean(trim($post['comment_27']));
  }else{
    $comment_27="";
  }
  $data_27=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'27',
    'ceklis'=>$checkbox_27,
    'comment'=>$comment_27
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_27);
  //28
  if(isset($_POST['checkbox_28'])){
    $checkbox_28="1";
  }else{
    $checkbox_28="0";
  }
  if(isset($_POST['comment_27'])){
    $comment_28=$this->security->xss_clean(trim($post['comment_28']));
  }else{
    $comment_28="";
  }
  $data_28=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'28',
    'ceklis'=>$checkbox_28,
    'comment'=>$comment_28
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_28);
  //29
  if(isset($_POST['checkbox_29'])){
    $checkbox_29="1";
  }else{
    $checkbox_29="0";
  }
  if(isset($_POST['comment_29'])){
    $comment_29=$this->security->xss_clean(trim($post['comment_29']));
  }else{
    $comment_29="";
  }
  $data_29=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'29',
    'ceklis'=>$checkbox_29,
    'comment'=>$comment_29
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_29);
  //30
  if(isset($_POST['checkbox_30'])){
    $checkbox_30="1";
  }else{
    $checkbox_30="0";
  }
  if(isset($_POST['comment_30'])){
    $comment_30=$this->security->xss_clean(trim($post['comment_30']));
  }else{
    $comment_30="";
  }
  $data_30=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'30',
    'ceklis'=>$checkbox_30,
    'comment'=>$comment_30
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_30);
  //31
  if(isset($_POST['checkbox_31'])){
    $checkbox_31="1";
  }else{
    $checkbox_31="0";
  }
  if(isset($_POST['comment_31'])){
    $comment_31=$this->security->xss_clean(trim($post['comment_31']));
  }else{
    $comment_31="";
  }
  $data_31=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'31',
    'ceklis'=>$checkbox_31,
    'comment'=>$comment_31
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_31);
  //32
  if(isset($_POST['checkbox_32'])){
    $checkbox_32="1";
  }else{
    $checkbox_32="0";
  }
  if(isset($_POST['comment_32'])){
    $comment_32=$this->security->xss_clean(trim($post['comment_32']));
  }else{
    $comment_32="";
  }
  $data_32=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'32',
    'ceklis'=>$checkbox_32,
    'comment'=>$comment_32
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_32);
  //33
  if(isset($_POST['checkbox_33'])){
    $checkbox_33="1";
  }else{
    $checkbox_33="0";
  }
  if(isset($_POST['comment_33'])){
    $comment_33=$this->security->xss_clean(trim($post['comment_33']));
  }else{
    $comment_33="";
  }
  $data_33=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'33',
    'ceklis'=>$checkbox_33,
    'comment'=>$comment_33
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_33);
  //34
  if(isset($_POST['checkbox_34'])){
    $checkbox_34="1";
  }else{
    $checkbox_34="0";
  }
  if(isset($_POST['comment_34'])){
    $comment_34=$this->security->xss_clean(trim($post['comment_34']));
  }else{
    $comment_34="";
  }
  $data_34=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'34',
    'ceklis'=>$checkbox_34,
    'comment'=>$comment_34
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_34);
  //35
  if(isset($_POST['checkbox_35'])){
    $checkbox_35="1";
  }else{
    $checkbox_35="0";
  }
  if(isset($_POST['comment_35'])){
    $comment_35=$this->security->xss_clean(trim($post['comment_35']));
  }else{
    $comment_35="";
  }
  $data_35=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'35',
    'ceklis'=>$checkbox_35,
    'comment'=>$comment_35
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_35);
  //36
  if(isset($_POST['checkbox_36'])){
    $checkbox_36="1";
  }else{
    $checkbox_36="0";
  }
  if(isset($_POST['comment_36'])){
    $comment_36=$this->security->xss_clean(trim($post['comment_36']));
  }else{
    $comment_36="";
  }
  $data_36=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'36',
    'ceklis'=>$checkbox_36,
    'comment'=>$comment_36
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_36);
  //2
  if(isset($_POST['checkbox_2'])){
    $checkbox_2="1";
  }else{
    $checkbox_2="0";
  }
  if(isset($_POST['comment_2'])){
    $comment_2=$this->security->xss_clean(trim($post['comment_2']));
  }else{
    $comment_2="";
  }
  $data_2=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'2',
    'ceklis'=>$checkbox_2,
    'comment'=>$comment_2
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_2);
  //3
  if(isset($_POST['checkbox_3'])){
    $checkbox_3="1";
  }else{
    $checkbox_3="0";
  }
  if(isset($_POST['comment_3'])){
    $comment_3=$this->security->xss_clean(trim($post['comment_3']));
  }else{
    $comment_3="";
  }
  $data_3=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'3',
    'ceklis'=>$checkbox_3,
    'comment'=>$comment_3
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_3);
  //23
  if(isset($_POST['checkbox_23'])){
    $checkbox_23="1";
  }else{
    $checkbox_23="0";
  }
  if(isset($_POST['comment_23'])){
    $comment_23=$this->security->xss_clean(trim($post['comment_23']));
  }else{
    $comment_23="";
  }
  $data_23=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'23',
    'ceklis'=>$checkbox_23,
    'comment'=>$comment_23
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_23);
  //4
  if(isset($_POST['checkbox_4'])){
    $checkbox_4="1";
  }else{
    $checkbox_4="0";
  }
  if(isset($_POST['comment_4'])){
    $comment_4=$this->security->xss_clean(trim($post['comment_4']));
  }else{
    $comment_4="";
  }
  $data_4=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'4',
    'ceklis'=>$checkbox_4,
    'comment'=>$comment_4
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_4);
  //5
  if(isset($_POST['checkbox_5'])){
    $checkbox_5="1";
  }else{
    $checkbox_5="0";
  }
  if(isset($_POST['comment_5'])){
    $comment_5=$this->security->xss_clean(trim($post['comment_5']));
  }else{
    $comment_5="";
  }
  $data_5=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'5',
    'ceklis'=>$checkbox_5,
    'comment'=>$comment_5
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_5);
  //6
  if(isset($_POST['checkbox_6'])){
    $checkbox_6="1";
  }else{
    $checkbox_6="0";
  }
  if(isset($_POST['comment_6'])){
    $comment_6=$this->security->xss_clean(trim($post['comment_6']));
  }else{
    $comment_6="";
  }
  $data_6=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'6',
    'ceklis'=>$checkbox_6,
    'comment'=>$comment_6
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_6);
  //7
  if(isset($_POST['checkbox_7'])){
    $checkbox_7="1";
  }else{
    $checkbox_7="0";
  }
  if(isset($_POST['comment_7'])){
    $comment_7=$this->security->xss_clean(trim($post['comment_7']));
  }else{
    $comment_7="";
  }
  $data_7=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'7',
    'ceklis'=>$checkbox_7,
    'comment'=>$comment_7
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_7);
  //8
  if(isset($_POST['checkbox_8'])){
    $checkbox_8="1";
  }else{
    $checkbox_8="0";
  }
  if(isset($_POST['comment_8'])){
    $comment_8=$this->security->xss_clean(trim($post['comment_8']));
  }else{
    $comment_8="";
  }
  $data_8=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'8',
    'ceklis'=>$checkbox_8,
    'comment'=>$comment_8
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_8);
  //9
  if(isset($_POST['checkbox_9'])){
    $checkbox_9="1";
  }else{
    $checkbox_9="0";
  }
  if(isset($_POST['comment_9'])){
    $comment_9=$this->security->xss_clean(trim($post['comment_9']));
  }else{
    $comment_9="";
  }
  $data_9=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'9',
    'ceklis'=>$checkbox_9,
    'comment'=>$comment_9
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_9);
  //10
  if(isset($_POST['checkbox_10'])){
    $checkbox_10="1";
  }else{
    $checkbox_10="0";
  }
  if(isset($_POST['comment_10'])){
    $comment_10=$this->security->xss_clean(trim($post['comment_10']));
  }else{
    $comment_10="";
  }
  $data_10=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'10',
    'ceklis'=>$checkbox_10,
    'comment'=>$comment_10
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_10);
  //11
  if(isset($_POST['checkbox_11'])){
    $checkbox_11="1";
  }else{
    $checkbox_11="0";
  }
  if(isset($_POST['comment_11'])){
    $comment_11=$this->security->xss_clean(trim($post['comment_11']));
  }else{
    $comment_11="";
  }
  $data_11=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'11',
    'ceklis'=>$checkbox_11,
    'comment'=>$comment_11
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_11);

  //13
  if(isset($_POST['checkbox_13'])){
    $checkbox_13="1";
  }else{
    $checkbox_13="0";
  }
  if(isset($_POST['comment_13'])){
    $comment_13=$this->security->xss_clean(trim($post['comment_13']));
  }else{
    $comment_13="";
  }
  $data_13=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'13',
    'ceklis'=>$checkbox_13,
    'comment'=>$comment_13
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_13);
  //14
  if(isset($_POST['checkbox_14'])){
    $checkbox_14="1";
  }else{
    $checkbox_14="0";
  }
  if(isset($_POST['comment_14'])){
    $comment_14=$this->security->xss_clean(trim($post['comment_14']));
  }else{
    $comment_14="";
  }
  $data_14=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'14',
    'ceklis'=>$checkbox_14,
    'comment'=>$comment_14
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_14);
  //15
  if(isset($_POST['checkbox_15'])){
    $checkbox_15="1";
  }else{
    $checkbox_15="0";
  }
  if(isset($_POST['comment_15'])){
    $comment_15=$this->security->xss_clean(trim($post['comment_15']));
  }else{
    $comment_15="";
  }
  $data_15=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'15',
    'ceklis'=>$checkbox_15,
    'comment'=>$comment_15
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_15);
  //16
  if(isset($_POST['checkbox_16'])){
    $checkbox_16="1";
  }else{
    $checkbox_16="0";
  }
  if(isset($_POST['comment_16'])){
    $comment_16=$this->security->xss_clean(trim($post['comment_16']));
  }else{
    $comment_16="";
  }
  $data_16=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'16',
    'ceklis'=>$checkbox_16,
    'comment'=>$comment_16
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_16);
  //17
  if(isset($_POST['checkbox_17'])){
    $checkbox_17="1";
  }else{
    $checkbox_17="0";
  }
  if(isset($_POST['comment_17'])){
    $comment_17=$this->security->xss_clean(trim($post['comment_17']));
  }else{
    $comment_17="";
  }
  $data_17=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'17',
    'ceklis'=>$checkbox_17,
    'comment'=>$comment_17
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_17);
  //18
  if(isset($_POST['checkbox_18'])){
    $checkbox_18="1";
  }else{
    $checkbox_18="0";
  }
  if(isset($_POST['comment_18'])){
    $comment_18=$this->security->xss_clean(trim($post['comment_18']));
  }else{
    $comment_18="";
  }
  $data_18=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'18',
    'ceklis'=>$checkbox_18,
    'comment'=>$comment_18
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_18);
  //19
  if(isset($_POST['checkbox_19'])){
    $checkbox_19="1";
  }else{
    $checkbox_19="0";
  }
  if(isset($_POST['comment_19'])){
    $comment_19=$this->security->xss_clean(trim($post['comment_19']));
  }else{
    $comment_19="";
  }
  $data_19=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'19',
    'ceklis'=>$checkbox_19,
    'comment'=>$comment_19
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_19);
  //20
  if(isset($_POST['checkbox_20'])){
    $checkbox_20="1";
  }else{
    $checkbox_20="0";
  }
  if(isset($_POST['comment_20'])){
    $comment_20=$this->security->xss_clean(trim($post['comment_20']));
  }else{
    $comment_20="";
  }
  $data_20=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'20',
    'ceklis'=>$checkbox_20,
    'comment'=>$comment_20
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_20);
  //21
  if(isset($_POST['checkbox_21'])){
    $checkbox_21="1";
  }else{
    $checkbox_21="0";
  }
  if(isset($_POST['comment_21'])){
    $comment_21=$this->security->xss_clean(trim($post['comment_21']));
  }else{
    $comment_21="";
  }
  $data_21=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$date,
'sub_klasifikasi'=>$sub_klasifikasi,
    'status'=>'1',
    'id'=>'21',
    'ceklis'=>$checkbox_21,
    'comment'=>$comment_21
  );
  $this->Bu_model->insert_sad($table_ceklis,$data_21);


    $insert=$this->post_status_10($nib_dec,$tgl_dec);
  if($insert=="Success"){
    $tujuan=$email;

    $record=$this->send_verifikasi_email($tujuan,$nib_dec,$tgl_dec);
    $data_awal=array(
      'status'=>'10'
    );
    $where_awal=array(
      'nib'=>$nib,
      'id_sub_klasifikasi'=>$sub_klasifikasi
    );
    $table_awal="lsbu_permohonan_masuk";
    $cek_nomer=$this->Bu_model->cek_nomer();

    $nomer_urut=$cek_nomer[0]['nomer_urut']+1;

    $this->Bu_model->update_edit($where_awal,$table_awal,$data_awal);
    $this->Bu_model->verifikasi_update($nib,$sub_klasifikasi,$nomer_urut);
    $this->session->set_flashdata('title','Verifikasi Success');
    $this->session->set_flashdata('text','Data Berhasil Di Verifikasi');
    $this->session->set_flashdata('class', "success");
    redirect('sertifikasi/tinjauan_permohonan/'.$nib_dec.'/'.$tgl_dec,'refresh');
  }else{
    $this->Bu_model->delete_ceklis($nib,$sub_klasifikasi);
    $this->session->set_flashdata('title','Verifikasi Failed');
    $this->session->set_flashdata('text','Data Gagal Di Verifikasi');
    $this->session->set_flashdata('class', "error");
    redirect('sertifikasi/tinjauan_permohonan/'.$nib_dec.'/'.$tgl_dec,'refresh');
  }
}else{
  $this->session->set_flashdata('title','Warning');
  $this->session->set_flashdata('text','Anda Tidak Memiliki Akses');
  $this->session->set_flashdata('class', "warning");
  redirect('login', 'refresh');
}



}
function insert_permohonan()
{

  $nib=$this->session->userdata('id_user');
  $id_user=$this->session->userdata('id_user');
  $post = $this->input->post();
  $tgl = $this->security->xss_clean(trim($post['tgl']));
  $tgl_permohonan = decrypt_url($tgl);
  $data=array(
    'NIB'=>$nib,
    'tgl_permohonan'=>$tgl_permohonan,
    'propinsi'=>'09',
    'tahun'=>date("Y"),
    'status_0'=>date("Y-m-d"),
    'status_1'=>"0000-00-00",
    'status_2'=>"0000-00-00",
    'status_3'=>"0000-00-00",
    'user_status_0'=>$nib,
    'user_status_1'=>"",
    'user_status_2'=>"",
    'user_status_3'=>"",

  );
  $table='lsbu_registrasi_history';

  $insert=$this->Bu_model->insert_sad($table,$data);
  if($insert=='Success'){
    $this->session->set_flashdata('title','Submit Success');
    $this->session->set_flashdata('text','Data Berhasil Di Submit');
    $this->session->set_flashdata('class', "success");
    redirect('sertifikasi/permohonan/'.$tgl,'refresh');
  }else{
    $this->session->set_flashdata('title','Submit Failed');
    $this->session->set_flashdata('text','Data Gagal Di Submit');
    $this->session->set_flashdata('class', "warning");
    redirect('sertifikasi/permohonan/'.$tgl,'refresh');
  }


}

function persetujuan_pusat(){

    $post = $this->input->post();
    $default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
    $id_bu = $this->security->xss_clean(trim($post['id_bu']));
    $asosiasi="002";
    $tgl_permohonan = $this->security->xss_clean(trim($post['tgl_permohonan']));
    $id_user='coba';
    $select="INSERT IGNORE INTO bu_registrasi_history_kbli(ID_BU,id_klasifikasi_kbli,id_sub_klasifikasi,id_sub_klasifikasi_kbli,ID_Asosiasi_BU,Kualifikasi,kualifikasi_kbli,Tahun,id_status,catatan,User_name,Tgl_proses,tgl_permohonan,Propinsi,indexs) SELECT ID_BU,id_klasifikasi_kbli,id_sub_klasifikasi,id_sub_klasifikasi_kbli,ID_Asosiasi_BU,Kualifikasi,kualifikasi_kbli,Tahun,'99','','$id_user',now(),Tgl_permohonan,Propinsi,'' FROM bu_registrasi_kbli";
    $where="WHERE ID_BU='$id_bu' AND Tgl_permohonan='$tgl_permohonan' AND ID_Asosiasi_BU='$asosiasi'";


    $select2="INSERT IGNORE INTO $database.bu_registrasi_history_kbli(ID_BU,id_klasifikasi_kbli,id_sub_klasifikasi,id_sub_klasifikasi_kbli,ID_Asosiasi_BU,Kualifikasi,kualifikasi_kbli,Tahun,id_status,catatan,User_name,Tgl_proses,tgl_permohonan,Propinsi,indexs) SELECT ID_BU,id_klasifikasi_kbli,id_sub_klasifikasi,id_sub_klasifikasi_kbli,ID_Asosiasi_BU,Kualifikasi,kualifikasi_kbli,Tahun,'99','','$id_user',now(),Tgl_permohonan,Propinsi,'' FROM $database2.bu_registrasi_kbli";
    $insert=$this->Bu_model->inserts_sad($select,$where);
    $insert2=$this->Bu_model->inserts($select2,$where);
    if($insert=="Success" AND $insert2=="Success"){
      $id_pds='1';

      $record_bill=$this->get_bill($id_bu,$asosiasi,$tgl_permohonan);
      $record_prov=$this->Bu_model->permohonan_propinsi($id_bu,$asosiasi,$tgl_permohonan);
      foreach($record_prov as $rec){
        if(substr($rec['kualifikasi_kbli'],0,1)=='B'){
          $propinsi_lpjk='00';
          $propinsi_asosiasi=$record_prov[0]['Propinsi'];
          break;
        }else{
          $propinsi_lpjk=$record_prov[0]['Propinsi'];
          $propinsi_asosiasi=$record_prov[0]['Propinsi'];
        }
      }


      $tagihan=0;
      foreach($record_bill as $row_bill){
        $tagihan=$tagihan+$row_bill['Bill'];
      }


      $this->Bupds_model->pds_create_group($id_bu,$tgl_permohonan,$asosiasi,$tagihan);
      $query=$this->Bupds_model->get_id_group($id_bu,$tgl_permohonan,$asosiasi);
      $id_group=$query[0]['ID_GROUP'];

      $data_status=array(
        'Status'=>99
      );
      $table='bu_pds_group';
      $where=array(
        'ID_GROUP'=>$id_group
      );
      $this->Bu_model->update_edit($where,$table,$data_status);
      $nama=$this->Bu_model->biodata_opr($id_bu);
      $nama_bu=$nama[0]['Nama'];
      $npwp=$nama[0]['NPWP'];


      $id_asosiasi_lpjk=$this->session->userdata('id_asosiasi');

      $aso=$this->Bu_model->asosiasi_search($asosiasi);
      $aso_lpjk=$this->Bu_model->asosiasi_search($id_asosiasi_lpjk);

      $text="Notifikasi Telah Di lakukan Penaikan Status Oleh Asosiasi Pusat";
      $text_lpjk="Notifikasi Permohonan Penaikan Status di LPJK";

      $status="99";
      $status_lpjk="0";

      $notifasosiasi=$this->notif_asosiasi($npwp,$nama_bu,$aso[0]['Nama'],$tgl_permohonan,$text,$status);
      $notiflpjk=$this->notif_lpjk($npwp,$nama_bu,$aso_lpjk[0]['Nama'],$tgl_permohonan,$text_lpjk,$status_lpjk);
      if($propinsi_lpjk=='00'){
        $pds='2';
      }else{
        $pds='1';
      }
      $data=array(
        'ID_GROUP'=>$id_group,
        'ID_PDS'=>$pds,
        'ID_ASOSIASI'=>$asosiasi,
        'ID_PROPINSI'=>$propinsi_asosiasi,
        'Tgl_Record'=>date("Y-m-d H:i:s"),
        'Id_Sender'=>$this->session->userdata('id_user'),
        'Id_Receive'=>'',
        'Subject'=>$text,
        'Text'=>$notifasosiasi

      );
      $table='bu_pds_mail';
      $insert=$this->Bu_model->insert($table,$data);

      $datalpjk=array(
        'ID_GROUP'=>$id_group,
        'ID_PDS'=>'3',
        'ID_ASOSIASI'=>$asosiasi,
        'ID_PROPINSI'=>$propinsi_lpjk,
        'Tgl_Record'=>date("Y-m-d H:i:s"),
        'Id_Sender'=>$this->session->userdata('id_user'),
        'Id_Receive'=>'',
        'Subject'=>$text_lpjk,
        'Text'=>$notiflpjk

      );
      $table='bu_pds_mail';
      $insertlpjk=$this->Bu_model->insert($table,$datalpjk);


      $this->session->set_flashdata('title','Persetujuan Success');
      $this->session->set_flashdata('text','Data Berhasil Di Setujui');
      $this->session->set_flashdata('class', "success");
      redirect('sertifikasi/persetujuan','refresh');

    }else{
      $this->session->set_flashdata('title','Persetujuan Failed');
      $this->session->set_flashdata('text','Data Gagal Di Setujui');
      $this->session->set_flashdata('class', "error");
      redirect('sertifikasi/persetujuan','refresh');
    }


}
function sub_klas(){
  $post = $this->input->post();
  $id_bu=$this->security->xss_clean(trim($post['id_bu_value']));
  $tgl_permohonan=$this->security->xss_clean(trim($post['tgl_permohonan_value']));
  $asosiasi='002';
  $record=$this->Bu_model->cek_sub($id_bu,$tgl_permohonan,$asosiasi);
  $response = array(
                  'id_record'=>$record,
                  'status'=>$record
                );

      echo json_encode($response);
}
function persetujuan(){
    $ass='002';

      $prop='09';

      $propinsi=$this->Bu_model->provinsi();
      $asosiasi=$this->Bu_model->asosiasi_search($ass);

    if($ass=='000'){
      $now=date("Y-m-d");
      $where="WHERE b.id_status IS NULL AND a.ID_Asosiasi_BU IN ('000','001') AND c.ID_BU=a.ID_BU AND d.id_unit_sertifikasi<>0 AND a.Tgl_permohonan BETWEEN '2020-12-01' AND '$now' GROUP BY a.id_bu,a.tgl_permohonan ORDER BY a.Tgl_permohonan ASC";

    }else{
      $where="WHERE b.id_status IS NULL AND a.ID_Asosiasi_BU='$ass' AND c.ID_BU=a.ID_BU AND d.id_unit_sertifikasi<>0 GROUP BY a.id_bu,a.tgl_permohonan ORDER BY a.Tgl_permohonan ASC";

    }
    $select="SELECT c.NPWP,a.Tgl_permohonan,c.Nama,c.id_bu FROM bu_registrasi_kbli AS a LEFT JOIN bu_registrasi_history_kbli AS b ON a.id_sub_klasifikasi_kbli=b.id_sub_klasifikasi_kbli AND a.ID_BU=b.ID_BU AND a.ID_Asosiasi_BU=b.ID_Asosiasi_BU LEFT JOIN bu_registrasi_kbli AS d ON a.id_sub_klasifikasi_kbli=d.id_sub_klasifikasi_kbli AND a.ID_BU=d.ID_BU AND a.ID_Asosiasi_BU=d.ID_Asosiasi_BU,bu AS c";
    $record=$this->Bu_model->searching_sad($select,$where);

  $this->data = array(
    'propinsi'=>$propinsi,
    'asosiasi'=>$asosiasi,
    'record'=>$record
  );
  $this->template->load('menu/menu','sertifikasi/persetujuan_pusat', $this->data);

}

function tgl_vva(){

  $id_bu=$this->session->userdata('id_bu');
  $id_asosiasi='002';
  $this->data = array(
    'tgl_permohonan'=>$this->Bu_model->tanggal_upload($id_bu,$id_asosiasi)
  );
  $this->template->load('menu/menu','sertifikasi/tgl_vva', $this->data);
}
function tgl_verifikasi(){

    $id_bu=$this->session->userdata('id_bu');
    $record=$this->Bu_model->tanggal_permohonan($id_bu);
    $count='TRUE';

    $this->data = array(
      'tgl_permohonan'=>$record
    );
    $this->template->load('menu/menu','sertifikasi/tgl_verifikasi', $this->data);

  }
  function tgl_validasi(){

      $id_bu=$this->session->userdata('id_bu');
      $record=$this->Bu_model->tanggal_permohonan_usbu($id_bu);
      $count='TRUE';

      $this->data = array(
        'tgl_permohonan'=>$record
      );
      $this->template->load('menu/menu','sertifikasi/tgl_validasi', $this->data);


  }
  function tgl_permohonan(){

      $nib=$this->session->userdata('id_user');
      $record=$this->Bu_model->tanggal_permohonan($nib);


      $this->data = array(
        'tgl_permohonan'=>$record
      );
      $this->template->load('menu/menu','sertifikasi/tgl_permohonan', $this->data);


  }
  function tgl_biaya(){

      $nib=$this->session->userdata('id_user');
      $record=$this->Bu_model->tanggal_permohonan_biaya($nib);

      $this->data = array(
        'tgl_permohonan'=>$record
      );
      $this->template->load('menu/menu','sertifikasi/tgl_biaya', $this->data);


  }
function vva($tgl_permohonan){

  $id_bu=$this->session->userdata('id_bu');
  $tgl_dec = decrypt_url($tgl_permohonan);
  $tgl=substr($tgl_dec,0,10);
  $id_asosiasi=substr($tgl_dec,10,10);
  $this->data = array(
    'tgl'=>$tgl_permohonan,
    'cek'=>$this->Bu_model->cek_3($id_bu,$id_asosiasi,$tgl),
    'biodata'=>$this->Bu_model->biodata($id_bu),
    'pengurus'=>$this->Bu_model->pengurus($id_bu),
    'pengalaman'=>$this->Bu_model->pengalaman($id_bu),
    'akte_pendirian'=>$this->Bu_model->akte_pendirian($id_bu),
    'akte_perubahan'=>$this->Bu_model->akte_perubahan($id_bu),
    'pph_omset'=>$this->Bu_model->pph_omset($id_bu),
    'neraca'=>$this->Bu_model->neraca($id_bu),
    'pemegang_saham'=>$this->Bu_model->pemegang_saham($id_bu),
    'tenaga_kerja'=>$this->Bu_model->tenaga_kerja($id_bu),
    'klasifikasi'=>$this->Bu_model->klasifikasi_kualifikasi2_sad($id_bu,$tgl,$id_asosiasi)
  );
  $this->template->load('menu/menu','sertifikasi/vva', $this->data);

}
function check_pjt_pjsk($nib_dec,$sub_dec){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }
  $sub_klasifikasi = decrypt_url($sub_dec);
  $nib = decrypt_url($nib_dec);
  $biodata=$this->Bu_model->biodata_opr($nib);
  $npwp=$biodata[0]['npwp'];
  $nama=$biodata[0]['nama'];
  $record=$this->Bu_model->token_api_siki();
  $token=$record[0]['token'];
  $record2=$this->Bu_model->get_izin_registrasi($nib,$sub_klasifikasi);
  $status_lolos="TRUE";
  $data_pjt=array();
  $data_pjsk=array();
  $data_pjbu=array();
  $id_izin=$record2[0]['id_izin'];
  $sub_klas=$record2[0]['id_sub_klasifikasi'];
  //check pjt
  $url = "https://siki.pu.go.id/siki-api/v2/pjt-ska-skt/".$id_izin;
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
  curl_setopt($curl, CURLOPT_HEADER, false);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  //curl_setopt($curl, CURLOPT_POSTFIELDS, $data);post
  curl_setopt($curl, CURLOPT_HTTPHEADER,array(
    "Content-type: application/json",
    "token: $token"
  ));
  $json_response = curl_exec($curl);
  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  $responses_pjt = json_decode($json_response, true);
  curl_close($curl);
  if ( $status != 200) {

  }else{
    $nama_tk=$responses_pjt['data']['nama'];
    $nik_tk=$responses_pjt['data']['nik'];
    $status_pjt="TRUE";
    $nama_bujk_pjt="";
    foreach ($responses_pjt['data']['badan_usaha'] as $row_pjt) {
      $npwp_banding=$row_pjt['npwp_badan_usaha'];
      $nama_banding=$row_pjt['nama_badan_usaha'];
      $npwp_clean_pjt=str_replace('.', '', $npwp_banding);
      $npwp_clean_npwp_clean_pjt2=str_replace('-', '', $npwp_clean_pjt);
      if($npwp!=$npwp_clean_npwp_clean_pjt2 AND $npwp_clean_npwp_clean_pjt2!=''){
        $status_pjt="FALSE";
        $status_lolos="FALSE";
      }
      if($row_pjt['pjt']=='1'){
        $rangkap=" [ PJT ]";
      }elseif($row_pjt['pjbu']=='1'){
        $rangkap=" [ PJBU ]";
      }elseif($row_pjt['pjsk']=='1'){
        $rangkap=" [ PJSK ]";
      }elseif($row_pjt['pjsk']=='1'){
        $rangkap=" [ pjk ]";
      }
      if($nama_bujk_pjt==""){
        $nama_bujk_pjt.="<b>".$row_pjt['nama_badan_usaha']."</b>".$rangkap;
      }else{
        $nama_bujk_pjt.=", "."<b>".$row_pjt['nama_badan_usaha']."</b>".$rangkap;

      }

    }
    $data_x=array(
      'nama_bujk'=>$nama_bujk_pjt,
      'npwp_bujk'=>$npwp_clean_npwp_clean_pjt2,
      'nama_tk'=>$nama_tk,
      'nik_tk'=>$nik_tk,
      'status'=>$status_pjt
    );
    array_push($data_pjt,$data_x);
    // $npwp_banding=$responses_pjt['data']['badan_usaha'][0]['npwp_badan_usaha'];
    // $nama_banding=$responses_pjt['data']['badan_usaha'][0]['nama_badan_usaha'];
    // $npwp_clean_pjt=str_replace('.', '', $npwp_banding);
    // $npwp_clean_npwp_clean_pjt2=str_replace('-', '', $npwp_clean_pjt);
    //
    // if($npwp!=$npwp_clean_npwp_clean_pjt2 AND $npwp_clean_npwp_clean_pjt2!=''){
    //   $status_pjt="FALSE";
    //   $status_lolos="FALSE";
    // }else{
    //   $status_pjt="TRUE";
    // }
    // $data_x=array(
    //   'nama_bujk'=>$nama_banding,
    //   'npwp_bujk'=>$npwp_clean_npwp_clean_pjt2,
    //   'nama_tk'=>$nama_tk,
    //   'nik_tk'=>$nik_tk,
    //   'status'=>$status_pjt
    // );
    // array_push($data_pjt,$data_x);
  }


  //Check PJSKBU
  $url = "https://siki.pu.go.id/siki-api/v2/pjsk-ska-skt/".$id_izin;

  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
  curl_setopt($curl, CURLOPT_HEADER, false);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  //curl_setopt($curl, CURLOPT_POSTFIELDS, $data);post
  curl_setopt($curl, CURLOPT_HTTPHEADER,array(
    "Content-type: application/json",
    "token: $token"
  ));
  $json_response = curl_exec($curl);
  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  $responses_pjsk = json_decode($json_response, true);
  curl_close($curl);
  if ( $status != 200) {


  }else{
    foreach($responses_pjsk['data'] as $pjsk_bu){

      $npwp_banding= $pjsk_bu['badan_usaha'][0]['npwp_badan_usaha'];
      $npwp_clean=str_replace('.', '', $npwp_banding);
      $npwp_clean2=str_replace('-', '', $npwp_clean);
      if($npwp!=$npwp_clean2 AND $npwp_clean2!=''){
        $status_pjsk="FALSE";
        $status_lolos="FALSE";
      }else{
        $status_pjsk="TRUE";
      }

      $data_y=array(
        'nama_bujk'=>$pjsk_bu['badan_usaha'][0]['nama_badan_usaha'],
        'npwp_bujk'=>$npwp_clean2,
        'nama_tk'=>$pjsk_bu['nama'],
        'nik_tk'=>$pjsk_bu['nik'],
        'sub_klasifikasi'=>$sub_klas,
        'id_izin'=>$id_izin,
        'status'=>$status_pjsk
      );
      array_push($data_pjsk,$data_y);
    }

  }
  //CEK PJBU
  $url = "https://siki.pu.go.id/siki-api/v1/pjbu-cek/".$id_izin;

  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
  curl_setopt($curl, CURLOPT_HEADER, false);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  //curl_setopt($curl, CURLOPT_POSTFIELDS, $data);post
  curl_setopt($curl, CURLOPT_HTTPHEADER,array(
    "Content-type: application/json",
    "token: $token"
  ));
  $json_response = curl_exec($curl);
  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  $responses_pjbu = json_decode($json_response, true);
  curl_close($curl);
  if ( $status != 200) {


  }else{



      $npwp_banding= $responses_pjbu['data']['badan_usaha']['npwp_badan_usaha'];
      $npwp_clean=str_replace('.', '', $npwp_banding);
      $npwp_clean2=str_replace('-', '', $npwp_clean);
      if($npwp!=$npwp_clean2 AND $npwp_clean2!=''){
        $status_pjbu="FALSE";
        $status_lolos="FALSE";
      }else{
        $status_pjbu="TRUE";
      }

      $data_m=array(
        'nama_bujkx'=>$responses_pjbu['data']['badan_usaha']['nama_badan_usaha'],
        'npwp_bujk'=>$npwp_clean2,
        'nama_tk'=>$responses_pjbu['data']['nama'],
        'nik_tk'=>$responses_pjbu['data']['nik'],
        'sub_klasifikasi'=>$sub_klas,
        'id_izin'=>$id_izin,
        'status'=>$status_pjbu
      );
      array_push($data_pjbu,$data_m);


  }

$respon=array(
  'data_pjt'=>$data_pjt,
  'data_pjsk'=>$data_pjsk,
  'status'=>$status_lolos,
  'data_pjbu'=>$data_pjbu
);
return $respon;
}
function ketidakberpihakan_verifikator($id1,$id2){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->pelaksana()){
    $sub_klasifikasi = decrypt_url($id2);
    $nib= decrypt_url($id1);
    $id_user=$this->session->userdata('id_user');
    $this->data=array(
      'biodata'=>$this->Bu_model->biodata_opr2($nib,$sub_klasifikasi),
      'klasifikasi'=>$this->Bu_model->klasifikasi_kualifikasi_opr($nib,$sub_klasifikasi),
      'id1'=>$id1,
      'id2'=>$id2,
      'bulan'=>$this->getBulan(date("m")),
      'record'=>$this->Bu_model->get_profile($id_user)
    );
    $this->load->view('sertifikasi/fakta_integritas_verifikator', $this->data);
  }else{
    $this->session->set_flashdata('title','Warning');
    $this->session->set_flashdata('text','Anda tidak memiliki akses');
    $this->session->set_flashdata('class', "warning");
    redirect('login','refresh');
  }
}
function insert_signature_verifikator(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }
  $post = $this->input->post();
  $id1=$this->security->xss_clean(trim($post['id1']));
  $id2=$this->security->xss_clean(trim($post['id2']));
  $sub_klasifikasi = decrypt_url($id2);
  $nib= decrypt_url($id1);
  $signature=$post['signature'];
  $data_awal=array(
    'ttd_verifikator'=>$signature,
    'tgl_ttd_verifikator'=>date("Y-m-d H:i:sa")
  );
  $where_awal=array(
    'NIB'=>$nib,
    'sub_klasifikasi'=>$sub_klasifikasi
  );
  $table_awal="lsbu_registrasi_history";
  $this->Bu_model->update_edit($where_awal,$table_awal,$data_awal);
  $this->session->set_flashdata('title','Notification');
  $this->session->set_flashdata('text','Surat Pernyataan Ketidakberpihakan berhasil di tandatangani');
  $this->session->set_flashdata('class', "success");
  redirect('sertifikasi/tinjauan_permohonan/'.$id1.'/'.$id2, 'refresh');
}
function tinjauan_permohonan($id1,$id2){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana() OR $this->ion_auth->asesor()){
    $sub_klasifikasi = decrypt_url($id2);
    $nib= decrypt_url($id1);
    if($this->ion_auth->pelaksana()){
      $permohonan=$this->Bu_model->check_permohonan($nib,$sub_klasifikasi);
      if($permohonan[0]['ttd_verifikator']==''){
        redirect('sertifikasi/ketidakberpihakan_verifikator/'.$id1.'/'.$id2, 'refresh');
      }
    }
    $data=$this->check_pjt_pjsk($id1,$id2);
    $this->data = array(
      'tgl'=>$sub_klasifikasi,
      'biodata'=>$this->Bu_model->biodata_opr2($nib,$sub_klasifikasi),
      'pengurus'=>$this->Bu_model->pengurus_opr($nib),
      'penjualan_tahunan'=>$this->Bu_model->pengalaman_opr($nib,$sub_klasifikasi),
      'akte'=>$this->Bu_model->akte_opr($nib),
      'smm'=>$this->Bu_model->smm_opr($nib),
      'smap'=>$this->Bu_model->smap_opr($nib),
      'neraca'=>$this->Bu_model->neraca_ski($nib),
      'data_check'=>$data,
      'pemegang_saham'=>$this->Bu_model->pemegang_saham_opr($nib),
      'pjbu'=>$this->Bu_model->pjbu_opr($nib),
      'pjskbu'=>$this->Bu_model->pjskbu_opr($nib,$sub_klasifikasi),
      'pjtbu'=>$this->Bu_model->pjtbu_opr($nib,$sub_klasifikasi),
      'peralatan'=>$this->Bu_model->peralatan_opr($nib,$sub_klasifikasi),
      'kepemilikan_peralatan'=>$this->Bu_model->kepemilikan_peralatan_opr($nib,$sub_klasifikasi),

      'klasifikasi'=>$this->Bu_model->klasifikasi_kualifikasi_opr($nib,$sub_klasifikasi),
      'nib_dec'=>$id1,
      'tgl_dec'=>$id2,
      'cek'=>$this->Bu_model->cek_status_1($nib,$sub_klasifikasi)
    );
    $this->template->load('menu/menu','sertifikasi/verifikasi', $this->data);
  }else{
    $this->session->set_flashdata('title','Warning');
    $this->session->set_flashdata('text','Anda tidak memiliki akses');
    $this->session->set_flashdata('class', "warning");
    redirect('login','refresh');
  }
}
function insert_verifikasi_perubahan(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }
  $post = $this->input->post();
  $id_izin=$this->security->xss_clean(trim($post['id_izin']));
  $record=$this->Bu_model->token_api_siki();
  $token=$record[0]['token'];


  $url = "https://siki.pu.go.id/siki-api/v1/qr-sbu/$id_izin";
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
  curl_setopt($curl, CURLOPT_HEADER, false);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  //curl_setopt($curl, CURLOPT_POSTFIELDS, $data);post
  curl_setopt($curl, CURLOPT_HTTPHEADER,array(
    "Content-type: application/json",
    "token: $token"
  ));

  $json_response = curl_exec($curl);
  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  $responses = json_decode($json_response, true);
  if ( $status != 200) {
    die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
    $response = array(
                    'result'=>$responses['message'],


                  );

  }else{
    $url = "https://siki.pu.go.id/siki-api/v1/pencatatan-sbu/$id_izin";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER,array(
      "Content-type: application/json",
      "token: $token"
    ));

    curl_setopt($curl, CURLOPT_POSTFIELDS, '{
      "file_lampiran":{
           "kelengkapan_peralatan":"1",
           "laporan_kegiatan_usaha_tahunan":"1",
           "sistem_manajemen_mutu":"1",
           "sistem_manajemen_anti_penyuapan":"1"
       }
    }');

    $json_response = curl_exec($curl);
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    if ( $status != 200) {
      // redirect('sertifikasi/gagal_cetak', 'refresh');
      die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
      //
      //   $data="Failed";

      $response = array(
                      'result'=>$responses['message'],


                    );
    }else{
      $data_awal=array(
        'status'=>'50'
      );
      $where_awal=array(
        'id_izin'=>$id_izin
      );
      $table_awal="lsbu_permohonan_masuk_perubahan";
      $this->Bu_model->update_edit($where_awal,$table_awal,$data_awal);

      $responses['qr'];
      $this->Bu_model->update_qr_perubahan($id_izin,$responses['qr']);


      $response = array(
                      'response'=>$responses,
                      'result'=>1,

                    );

    }


  }
  curl_close($curl);


echo json_encode($response);
}
function tinjauan_permohonan_perubahan($id1,$id2,$id_izin){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana() OR $this->ion_auth->asesor()){
    $sub_klasifikasi = decrypt_url($id2);
    $nib= decrypt_url($id1);
    $data=$this->check_pjt_pjsk($id1,$id2);
    $this->data = array(
      'tgl'=>$sub_klasifikasi,
      'biodata'=>$this->Bu_model->biodata_opr2($nib,$sub_klasifikasi),
      'pengurus'=>$this->Bu_model->pengurus_opr($nib),
      'penjualan_tahunan'=>$this->Bu_model->pengalaman_opr($nib,$sub_klasifikasi),
      'akte'=>$this->Bu_model->akte_opr($nib),
      'smm'=>$this->Bu_model->smm_opr($nib),
      'smap'=>$this->Bu_model->smap_opr($nib),
      'neraca'=>$this->Bu_model->neraca_ski($nib),
      'data_check'=>$data,
      'pemegang_saham'=>$this->Bu_model->pemegang_saham_opr($nib),
      'pjbu'=>$this->Bu_model->pjbu_opr($nib),
      'pjskbu'=>$this->Bu_model->pjskbu_opr($nib,$sub_klasifikasi),
      'pjtbu'=>$this->Bu_model->pjtbu_opr($nib,$sub_klasifikasi),
      'peralatan'=>$this->Bu_model->peralatan_opr($nib,$sub_klasifikasi),
      'kepemilikan_peralatan'=>$this->Bu_model->kepemilikan_peralatan_opr($nib,$sub_klasifikasi),
      'biodata_perubahan'=>$this->Bu_model->biodata_opr_izin_perubhan($id_izin),
      'pengurus_perubahan'=>$this->Bu_model->pengurus_opr_izin_perubahan($id_izin),
      'akte_perubahan'=>$this->Bu_model->akte_opr_izin_perubahan($id_izin),
      'smap_perubahan'=>$this->Bu_model->smap_opr_izin_perubahan($id_izin),
      'neraca_perubahan'=>$this->Bu_model->neraca_ski_izin_perubahan($id_izin),
      'pemegang_saham_perubahan'=>$this->Bu_model->pemegang_saham_opr_izin_perubahan($id_izin),
      'pjbu_perubahan'=>$this->Bu_model->pjbu_opr_izin_perubahan($id_izin),
      'pjskbu_perubahan'=>$this->Bu_model->pjskbu_opr_izin_perubahan($id_izin),
      'pjtbu_perubahan'=>$this->Bu_model->pjtbu_opr_izin_perubahan($id_izin),
      'klasifikasi_perubahan'=>$this->Bu_model->klasifikasi_kualifikasi_oprx_izin_perubahan($id_izin),
      'klasifikasi'=>$this->Bu_model->klasifikasi_kualifikasi_opr($nib,$sub_klasifikasi),
      'nib_dec'=>$id1,
      'tgl_dec'=>$id2,
      'cek'=>$this->Bu_model->cek_status_1($nib,$sub_klasifikasi),
      'id_izin'=>$id_izin
    );
    $this->template->load('menu/menu','sertifikasi/verifikasi_perubahan', $this->data);
  }else{
    $this->session->set_flashdata('title','Warning');
    $this->session->set_flashdata('text','Anda tidak memiliki akses');
    $this->session->set_flashdata('class', "warning");
    redirect('login','refresh');
  }
}

function asesor_2($id1,$id2,$id3){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana() OR $this->ion_auth->asesor()){
    $sub_klasifikasi = decrypt_url($id2);
    $nib= decrypt_url($id1);
    $id_asesor= decrypt_url($id3);
    $rec=$this->Bu_model->check_penunjukan($nib,$sub_klasifikasi,$id_asesor);
    if(empty($rec)){
      $this->session->set_flashdata('title','Failed');
      $this->session->set_flashdata('text','Anda Tidak Memiliki Akses untuk penilaian ini');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
    $stat="FALSE";
    foreach ($rec as $row) {
      if($row['status']=='1'){
        $stat='TRUE';
      }
    }
    if($stat=='TRUE'){
      $klasifikasi=$this->Bu_model->klasifikasi_kualifikasi_opr($nib,$sub_klasifikasi);
    }else{
      $klasifikasi=$this->Bu_model->klasifikasi_kualifikasi_opr_menengah_besar($nib,$sub_klasifikasi);
    }

    $record=$this->Bu_model->get_ceklis_asesor($nib,$sub_klasifikasi,$id_asesor);
    $record_penilaian=$this->Bu_model->get_penilaian_asesor($nib,$sub_klasifikasi,$id_asesor);
    $rec_penunjukan=$this->Bu_model->get_detail_penunjukan2($nib,$sub_klasifikasi,$id_asesor);
    $asesor_2=$rec_penunjukan[0]['id_asesor'];
    $this->data = array(
      'asesor_2'=>$asesor_2,
      'penilaian'=>$record_penilaian,
      'ceklis'=>$record,
      'ceklis_2'=>$record,
      'tgl'=>$sub_klasifikasi,
      'biodata'=>$this->Bu_model->biodata_opr2($nib,$sub_klasifikasi),
      'pengurus'=>$this->Bu_model->pengurus_opr($nib),
      'penjualan_tahunan'=>$this->Bu_model->pengalaman_opr($nib,$sub_klasifikasi),
      'akte'=>$this->Bu_model->akte_opr($nib),
      'smm'=>$this->Bu_model->smm_opr($nib),
      'smm_asesor'=>$this->Bu_model->smm_asesor($nib,$sub_klasifikasi,$id_asesor),
      'smap'=>$this->Bu_model->smap_opr($nib),
      'smap_asesor'=>$this->Bu_model->smap_asesor($nib,$sub_klasifikasi,$id_asesor),
      'sk_kehakiman'=>$this->Bu_model->sk_kehakiman_opr($nib),
      'neraca'=>$this->Bu_model->neraca_ski($nib),
      'keuangan_asesor'=>$this->Bu_model->neraca_keuangan($nib,$sub_klasifikasi,$id_asesor),
      'neraca_asesor'=>$this->Bu_model->neraca_asesor($nib,$sub_klasifikasi,$id_asesor),
      'pemegang_saham'=>$this->Bu_model->pemegang_saham_opr($nib),
      'pjbu'=>$this->Bu_model->pjbu_opr($nib),
      'pjskbu'=>$this->Bu_model->pjskbu_opr($nib,$sub_klasifikasi),
      'pjtbu'=>$this->Bu_model->pjtbu_opr($nib,$sub_klasifikasi),
      'peralatan'=>$this->Bu_model->peralatan_opr($nib,$sub_klasifikasi),
      'kepemilikan_peralatan'=>$this->Bu_model->kepemilikan_peralatan_opr($nib,$sub_klasifikasi),

      'klasifikasi'=>$klasifikasi,
      'nib_dec'=>$id1,
      'tgl_dec'=>$id2,
      'user_dec'=>$id3
    );
    $this->template->load('menu/menu','sertifikasi/asesor', $this->data);
  }else{
    $this->session->set_flashdata('title','Warning');
    $this->session->set_flashdata('text','Anda tidak memiliki akses');
    $this->session->set_flashdata('class', "warning");
    redirect('login','refresh');
  }
}
function cetak_fakta_integritas_verifikator($id1,$id2){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }
  $sub_klasifikasi = decrypt_url($id2);
  $nib= decrypt_url($id1);
  $permohonan=$this->Bu_model->check_permohonan($nib,$sub_klasifikasi);
  if($permohonan[0]['ttd_verifikator']==''){
    if($permohonan[0]['verifikator']!=''){
      $id_user=$permohonan[0]['verifikator'];
    }else{
      $id_user=$permohonan[0]['user_status_1'];
    }
    $record=$this->Bu_model->get_profile($id_user);
    $path = base_url('assets/bukti/ttd/'.$record[0]['ttd']);
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $arrContextOptions=array(
      "ssl"=>array(
          "verify_peer"=>false,
          "verify_peer_name"=>false,
      ),
    );
    $data = file_get_contents($path, false, stream_context_create($arrContextOptions));
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
  }else{
    $id_user=$permohonan[0]['verifikator'];
    $record=$this->Bu_model->get_profile($id_user);
    $base64=$permohonan[0]['ttd_verifikator'];
  }
  $this->data=array(
    'biodata'=>$this->Bu_model->biodata_opr2($nib,$sub_klasifikasi),
    'klasifikasi'=>$this->Bu_model->klasifikasi_kualifikasi_opr($nib,$sub_klasifikasi),
    'id1'=>$id1,
    'id2'=>$id2,
    'bulan'=>$this->getBulan(substr($permohonan[0]['status_1'],5,2)),
    'tgl'=>substr($permohonan[0]['status_1'],8,2),
    'tahun'=>substr($permohonan[0]['status_1'],0,4),
    'bulan'=>$this->getBulan(date("m")),
    'base64'=>$base64,
    'record'=>$record
  );
  $this->load->view('sertifikasi/fakta_integritas_cetak_verifikator', $this->data);
}
function insert_signature(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }
  $post = $this->input->post();
  $id1=$this->security->xss_clean(trim($post['id1']));
  $id2=$this->security->xss_clean(trim($post['id2']));
  $id3=$this->security->xss_clean(trim($post['id3']));
  $tgl = decrypt_url($id2);
  $nib= decrypt_url($id1);
  $id_asesor=decrypt_url($id3);
  $signature=$post['signature'];
  $data=array(
    'NIB'=>$nib,
    'sub_klasifikasi'=>$tgl,
    'id_asesor'=>$id_asesor,
    'persyaratan'=>$signature
  );

  $tabel='lsbu_fakta_integritas';
  $this->Bu_model->insert_sad($tabel,$data);
  $this->session->set_flashdata('title','Notification');
  $this->session->set_flashdata('text','Surat Pernyataan Ketidakberpihakan berhasil di tandatangani');
  $this->session->set_flashdata('class', "success");
  redirect('sertifikasi/asesor/'.$id1.'/'.$id2.'/'.$id3, 'refresh');
}
function fakta_integritas($id1,$id2,$id3){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->asesor()){
    $tgl = decrypt_url($id2);
    $nib= decrypt_url($id1);
    $id_asesor= decrypt_url($id3);
    $this->data=array(
      'biodata'=>$this->Bu_model->biodata_opr2($nib,$sub_klasifikasi),
      'klasifikasi'=>$this->Bu_model->klasifikasi_kualifikasi_opr($nib,$tgl),

      'id1'=>$id1,
      'id2'=>$id2,
      'id3'=>$id3,
      'bulan'=>$this->getBulan(date("m")),
      'record'=>$this->Bu_model->get_profile($id_asesor)
    );
    $this->load->view('sertifikasi/fakta_integritas', $this->data);

  }else{
    $this->session->set_flashdata('title','Warning');
    $this->session->set_flashdata('text','Anda tidak memiliki akses');
    $this->session->set_flashdata('class', "warning");
    redirect('login','refresh');
  }
}
function asesor($id1,$id2,$id3){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana() OR $this->ion_auth->asesor()){
    $sub_klasifikasi = decrypt_url($id2);
    $nib= decrypt_url($id1);
    $id_asesor= decrypt_url($id3);
    $check=$this->Bu_model->check_fakte_integritas($nib,$sub_klasifikasi,$id_asesor);
    $rec=$this->Bu_model->check_penunjukan($nib,$sub_klasifikasi,$id_asesor);
    if(empty($rec)){
      $this->session->set_flashdata('title','Failed');
      $this->session->set_flashdata('text','Anda Tidak Memiliki Akses untuk penilaian ini');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
    if(empty($check)){
      $this->session->set_flashdata('title','Info');
      $this->session->set_flashdata('text','Anda Harus menandatangani Fakta Integritas terlebih dahulu');
      $this->session->set_flashdata('class', "info");
      redirect('sertifikasi/fakta_integritas/'.$id1.'/'.$id2.'/'.$id3, 'refresh');
    }
    $stat="FALSE";
    foreach ($rec as $row) {
      if($row['status']=='1'){
        $stat='TRUE';
      }
    }
    if($stat=='TRUE'){
      $klasifikasi=$this->Bu_model->klasifikasi_kualifikasi_opr($nib,$sub_klasifikasi);
    }else{
      $klasifikasi=$this->Bu_model->klasifikasi_kualifikasi_opr_menengah_besar($nib,$sub_klasifikasi);
    }

    $record=$this->Bu_model->get_ceklis_asesor($nib,$sub_klasifikasi,$id_asesor);
    $record_penilaian=$this->Bu_model->get_penilaian_asesor($nib,$sub_klasifikasi,$id_asesor);
    $rec_penunjukan=$this->Bu_model->get_detail_penunjukan2($nib,$sub_klasifikasi,$id_asesor);
    $asesor_2=$rec_penunjukan[0]['id_asesor'];
    $this->data = array(
      'asesor_2'=>$asesor_2,
      'penilaian'=>$record_penilaian,
      'ceklis'=>$record,
      'ceklis_2'=>$record,
      'tgl'=>$sub_klasifikasi,
      'pjbu_asesor'=>$this->Bu_model->pjbu_asesor($nib,$sub_klasifikasi,$id_asesor),
      'pjskbu_asesor'=>$this->Bu_model->pjskbu_asesor($nib,$sub_klasifikasi,$id_asesor),
      'pjtbu_asesor'=>$this->Bu_model->pjtbu_asesor($nib,$sub_klasifikasi,$id_asesor),
      'biodata_penjualan'=>$this->Bu_model->asesor_penjualan_tahunan($nib,$sub_klasifikasi,$id_asesor),
      'administrasi_asesor'=>$this->Bu_model->administrasi_asesor($nib,$sub_klasifikasi,$id_asesor),
      'pengurus_asesor'=>$this->Bu_model->pengurus_asesor($nib,$sub_klasifikasi,$id_asesor),
      'saham_asesor'=>$this->Bu_model->saham_asesor($nib,$sub_klasifikasi,$id_asesor),
      'akte_asesor'=>$this->Bu_model->akte_asesor($nib,$sub_klasifikasi,$id_asesor),
      'biodata'=>$this->Bu_model->biodata_opr2($nib,$sub_klasifikasi),
      'pengurus'=>$this->Bu_model->pengurus_opr($nib),
      'penjualan_tahunan'=>$this->Bu_model->pengalaman_opr($nib,$sub_klasifikasi),
      'keuangan_asesor'=>$this->Bu_model->neraca_keuangan($nib,$sub_klasifikasi,$id_asesor),
      'akte'=>$this->Bu_model->akte_opr($nib),
      'smm'=>$this->Bu_model->smm_opr($nib),
      'smm_asesor'=>$this->Bu_model->smm_asesor($nib,$sub_klasifikasi,$id_asesor),
      'smap'=>$this->Bu_model->smap_opr($nib),
      'smap_asesor'=>$this->Bu_model->smap_asesor($nib,$sub_klasifikasi,$id_asesor),
      'sk_kehakiman'=>$this->Bu_model->sk_kehakiman_opr($nib),
      'neraca'=>$this->Bu_model->neraca_ski($nib),
      'neraca_asesor'=>$this->Bu_model->neraca_asesor($nib,$sub_klasifikasi,$id_asesor),
      'pemegang_saham'=>$this->Bu_model->pemegang_saham_opr($nib),
      'pjbu'=>$this->Bu_model->pjbu_opr($nib),
      'pjskbu'=>$this->Bu_model->pjskbu_opr($nib,$sub_klasifikasi),
      'pjtbu'=>$this->Bu_model->pjtbu_opr($nib,$sub_klasifikasi),
      'peralatan'=>$this->Bu_model->peralatan_opr($nib,$sub_klasifikasi),
      'kepemilikan_peralatan'=>$this->Bu_model->kepemilikan_peralatan_opr($nib,$sub_klasifikasi),

      'klasifikasi'=>$klasifikasi,
      'nib_dec'=>$id1,
      'tgl_dec'=>$id2,
      'user_dec'=>$id3
    );
    $this->template->load('menu/menu','sertifikasi/asesor_2', $this->data);
  }else{
    $this->session->set_flashdata('title','Warning');
    $this->session->set_flashdata('text','Anda tidak memiliki akses');
    $this->session->set_flashdata('class', "warning");
    redirect('login','refresh');
  }
}
function validasi($id1,$id2){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){
    $tgl = decrypt_url($id2);
    $nib= decrypt_url($id1);
    $this->data = array(
      'tgl'=>$tgl,
      'nib_dec'=>$id1,
      'tgl_dec'=>$id2,
      'biodata'=>$this->Bu_model->biodata_opr($nib),
      'pengurus'=>$this->Bu_model->pengurus_opr($nib),
      'pengalaman'=>$this->Bu_model->pengalaman_opr($nib),
      'akte_pendirian'=>$this->Bu_model->akte_pendirian_opr($nib),
      'akte_perubahan'=>$this->Bu_model->akte_perubahan_opr($nib),
      'pph_omset'=>$this->Bu_model->pph_omset($nib),
      'neraca'=>$this->Bu_model->neraca_ski($nib),
      'pemegang_saham'=>$this->Bu_model->pemegang_saham_opr($nib),
      'tenaga_kerja'=>$this->Bu_model->tenaga_kerja_opr($nib),
      'peralatan'=>$this->Bu_model->peralatan_opr($nib),
      'klasifikasi'=>$this->Bu_model->klasifikasi_kualifikasi_opr($nib,$tgl),
      'cek'=>$this->Bu_model->cek_status_2($nib,$tgl)
    );
    $this->template->load('menu/menu','sertifikasi/validasi', $this->data);
  }else{
    $this->session->set_flashdata('title','Warning');
    $this->session->set_flashdata('text','Anda tidak memiliki akses');
    $this->session->set_flashdata('class', "warning");
    redirect('login','refresh');
  }
}
function get_bill($id_bu,$asosiasi,$tgl){

  $record_get=$this->Bu_model->get_jenis($id_bu);
  $id_jenis_bu_kbli=$record_get[0]['ID_Jenis_BU_kbli'];
  $id_bentuk_bu=$record_get[0]['ID_Bentuk_BU'];
  if ($id_jenis_bu_kbli == '0'){
      $id_jenis = 'BU0';
  }
  elseif($id_jenis_bu_kbli == '5'){
      $id_jenis = 'BU5';
  }
  else{
      $id_jenis = 'BU1';
  }

  if($id_bentuk_bu=='3'){
      $id_asing = '1';
  }
  else{
      $id_asing = '0';
  }

  $record=$this->Bu_model->get_bill($id_bu,$asosiasi,$tgl,$id_jenis,$id_asing);
  return $record;


}


function getBulan($bln){
      switch ($bln){
        case 1:
          return "Januari";
          break;
        case 2:
          return "Februari";
          break;
        case 3:
          return "Maret";
          break;
        case 4:
          return "April";
          break;
        case 5:
          return "Mei";
          break;
        case 6:
          return "Juni";
          break;
        case 7:
          return "Juli";
          break;
        case 8:
          return "Agustus";
          break;
        case 9:
          return "September";
          break;
        case 10:
          return "Oktober";
          break;
        case 11:
          return "November";
          break;
        case 12:
          return "Desember";
          break;
      }
    }
function getBulanrw($blnrw){
        switch ($blnrw){
          case 1:
            return "I";
            break;

          case 2:
            return "II";
            break;

          case 3:
            return "III";
            break;

          case 4:
            return "IV";
            break;
          case 5:
            return "V";
            break;

          case 6:
            return "VI";
            break;

          case 7:
            return "VII";
            break;

          case 8:
            return "VIII";
            break;

          case 9:
            return "IX";
            break;

          case 10:
            return "X";
            break;

          case 11:
            return "XI";
            break;

          case 12:
            return "XII";
            break;

        }

      }


      function notif_email_tombol($isi_email,$link,$pre_header){
        $html='
        <!doctype html>
        <html>
        <head>
        <meta name="viewport" content="width=device-width">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Simple Transactional Email</title>
        <style>
        /* -------------------------------------
        INLINED WITH htmlemail.io/inline
        ------------------------------------- */
        /* -------------------------------------
        RESPONSIVE AND MOBILE FRIENDLY STYLES
        ------------------------------------- */
        @media only screen and (max-width: 620px) {
        table[class=body] h1 {
        font-size: 28px !important;
        margin-bottom: 10px !important;
        }
        table[class=body] p,
            table[class=body] ul,
            table[class=body] ol,
            table[class=body] td,
            table[class=body] span,
            table[class=body] a {
        font-size: 16px !important;
        }
        table[class=body] .wrapper,
            table[class=body] .article {
        padding: 10px !important;
        }
        table[class=body] .content {
        padding: 0 !important;
        }
        table[class=body] .container {
        padding: 0 !important;
        width: 100% !important;
        }
        table[class=body] .main {
        border-left-width: 0 !important;
        border-radius: 0 !important;
        border-right-width: 0 !important;
        }
        table[class=body] .btn table {
        width: 100% !important;
        }
        table[class=body] .btn a {
        width: 100% !important;
        }
        table[class=body] .img-responsive {
        height: auto !important;
        max-width: 100% !important;
        width: auto !important;
        }
        }

        /* -------------------------------------
        PRESERVE THESE STYLES IN THE HEAD
        ------------------------------------- */
        @media all {
        .ExternalClass {
        width: 100%;
        }
        .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
        line-height: 100%;
        }
        .apple-link a {
        color: inherit !important;
        font-family: inherit !important;
        font-size: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
        text-decoration: none !important;
        }
        #MessageViewBody a {
        color: inherit;
        text-decoration: none;
        font-size: inherit;
        font-family: inherit;
        font-weight: inherit;
        line-height: inherit;
        }
        .btn-primary table td:hover {
        background-color: #34495e !important;
        }
        .btn-primary a:hover {
        background-color: #34495e !important;
        border-color: #34495e !important;
        }
        }
        </style>
        </head>
        <body class="" style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
        <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">'.$pre_header.'</span>
        <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;">
        <tr>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
        <td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;">
          <div class="content" style="box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;">

            <!-- START CENTERED WHITE CONTAINER -->
            <table role="presentation" class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
                  <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                    <tr>
                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Yth<br>
                        Bapak/Ibu<br>
                        <br>
                        Terima kasih atas kepercayaannya melakukan permohonan SBU kepada PT Sertifikasi Kontraktor Indonesia (SKI) <br>,</p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">'.$isi_email.'</p>
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; box-sizing: border-box;">
                          <tbody>
                            <tr>
                              <td align="left" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;">
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
                                  <tbody>
                                    <tr>
                                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; background-color: #3498db; border-radius: 5px; text-align: center;"> <a href="'.$link.'" target="_blank" style="display: inline-block; color: #ffffff; background-color: #3498db; border: solid 1px #3498db; border-radius: 5px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize; border-color: #3498db;">Click Here!</a> </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Terima Kasih </p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>

            <!-- START FOOTER -->
            <div class="footer" style="clear: both; Margin-top: 10px; text-align: center; width: 100%;">
              <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                <tr>
                <td style="padding-bottom:25px;padding-top:22px;width:100%;padding-right:0px;padding-left:0px;">
                <div align="center" style="line-height:10px"><img alt="Im an image" src="https://ski.sertifikasikontraktor.com/assets/media/logos/Logo_ski_2.png" style="display: block; height: auto; border: 0; width: 149px; max-width: 100%;" title="Im an image" width="149"/></div>
                </td>
                </tr>
                <tr>
                  <td class="content-block" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
                    <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">Wijaya Grand Centre Blok D-1 Lt. 3, Jl. Darmawangsa Raya No. 2 Jakarta Selatan</span>

                  </td>
                </tr>

              </table>
            </div>
            <!-- END FOOTER -->

          <!-- END CENTERED WHITE CONTAINER -->
          </div>
        </td>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
        </tr>
        </table>
        </body>
        </html>

        ';
        return $html;
      }
      function notif_email_tombol_asesor($isi_email,$link,$pre_header){
        $html='
        <!doctype html>
        <html>
        <head>
        <meta name="viewport" content="width=device-width">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Simple Transactional Email</title>
        <style>
        /* -------------------------------------
        INLINED WITH htmlemail.io/inline
        ------------------------------------- */
        /* -------------------------------------
        RESPONSIVE AND MOBILE FRIENDLY STYLES
        ------------------------------------- */
        @media only screen and (max-width: 620px) {
        table[class=body] h1 {
        font-size: 28px !important;
        margin-bottom: 10px !important;
        }
        table[class=body] p,
            table[class=body] ul,
            table[class=body] ol,
            table[class=body] td,
            table[class=body] span,
            table[class=body] a {
        font-size: 16px !important;
        }
        table[class=body] .wrapper,
            table[class=body] .article {
        padding: 10px !important;
        }
        table[class=body] .content {
        padding: 0 !important;
        }
        table[class=body] .container {
        padding: 0 !important;
        width: 100% !important;
        }
        table[class=body] .main {
        border-left-width: 0 !important;
        border-radius: 0 !important;
        border-right-width: 0 !important;
        }
        table[class=body] .btn table {
        width: 100% !important;
        }
        table[class=body] .btn a {
        width: 100% !important;
        }
        table[class=body] .img-responsive {
        height: auto !important;
        max-width: 100% !important;
        width: auto !important;
        }
        }

        /* -------------------------------------
        PRESERVE THESE STYLES IN THE HEAD
        ------------------------------------- */
        @media all {
        .ExternalClass {
        width: 100%;
        }
        .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
        line-height: 100%;
        }
        .apple-link a {
        color: inherit !important;
        font-family: inherit !important;
        font-size: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
        text-decoration: none !important;
        }
        #MessageViewBody a {
        color: inherit;
        text-decoration: none;
        font-size: inherit;
        font-family: inherit;
        font-weight: inherit;
        line-height: inherit;
        }
        .btn-primary table td:hover {
        background-color: #34495e !important;
        }
        .btn-primary a:hover {
        background-color: #34495e !important;
        border-color: #34495e !important;
        }
        }
        </style>
        </head>
        <body class="" style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
        <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">'.$pre_header.'</span>
        <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;">
        <tr>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
        <td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;">
          <div class="content" style="box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;">

            <!-- START CENTERED WHITE CONTAINER -->
            <table role="presentation" class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
                  <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                    <tr>
                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Yth<br>
                        Bapak/Ibu<br>
                        <br>
                        Surat Tugas Asesor PT Sertifikasi Kontraktor Indonesia (SKI) <br>,</p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">'.$isi_email.'</p>
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; box-sizing: border-box;">
                          <tbody>
                            <tr>
                              <td align="left" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;">
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
                                  <tbody>
                                    <tr>
                                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; background-color: #3498db; border-radius: 5px; text-align: center;"> <a href="'.$link.'" target="_blank" style="display: inline-block; color: #ffffff; background-color: #3498db; border: solid 1px #3498db; border-radius: 5px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize; border-color: #3498db;">Click Here!</a> </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Terima Kasih </p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>

            <!-- START FOOTER -->
            <div class="footer" style="clear: both; Margin-top: 10px; text-align: center; width: 100%;">
              <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                <tr>
                <td style="padding-bottom:25px;padding-top:22px;width:100%;padding-right:0px;padding-left:0px;">
                <div align="center" style="line-height:10px"><img alt="Im an image" src="https://ski.sertifikasikontraktor.com/assets/media/logos/Logo_ski_2.png" style="display: block; height: auto; border: 0; width: 149px; max-width: 100%;" title="Im an image" width="149"/></div>
                </td>
                </tr>
                <tr>
                  <td class="content-block" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
                    <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">Wijaya Grand Centre Blok D-1 Lt. 3, Jl. Darmawangsa Raya No. 2 Jakarta Selatan</span>

                  </td>
                </tr>

              </table>
            </div>
            <!-- END FOOTER -->

          <!-- END CENTERED WHITE CONTAINER -->
          </div>
        </td>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
        </tr>
        </table>
        </body>
        </html>

        ';
        return $html;
      }
      function notif_email($isi_email,$pre_header){
        $html='
        <!doctype html>
        <html>
        <head>
        <meta name="viewport" content="width=device-width">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Simple Transactional Email</title>
        <style>
        /* -------------------------------------
        INLINED WITH htmlemail.io/inline
        ------------------------------------- */
        /* -------------------------------------
        RESPONSIVE AND MOBILE FRIENDLY STYLES
        ------------------------------------- */
        @media only screen and (max-width: 620px) {
        table[class=body] h1 {
        font-size: 28px !important;
        margin-bottom: 10px !important;
        }
        table[class=body] p,
            table[class=body] ul,
            table[class=body] ol,
            table[class=body] td,
            table[class=body] span,
            table[class=body] a {
        font-size: 16px !important;
        }
        table[class=body] .wrapper,
            table[class=body] .article {
        padding: 10px !important;
        }
        table[class=body] .content {
        padding: 0 !important;
        }
        table[class=body] .container {
        padding: 0 !important;
        width: 100% !important;
        }
        table[class=body] .main {
        border-left-width: 0 !important;
        border-radius: 0 !important;
        border-right-width: 0 !important;
        }
        table[class=body] .btn table {
        width: 100% !important;
        }
        table[class=body] .btn a {
        width: 100% !important;
        }
        table[class=body] .img-responsive {
        height: auto !important;
        max-width: 100% !important;
        width: auto !important;
        }
        }

        /* -------------------------------------
        PRESERVE THESE STYLES IN THE HEAD
        ------------------------------------- */
        @media all {
        .ExternalClass {
        width: 100%;
        }
        .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
        line-height: 100%;
        }
        .apple-link a {
        color: inherit !important;
        font-family: inherit !important;
        font-size: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
        text-decoration: none !important;
        }
        #MessageViewBody a {
        color: inherit;
        text-decoration: none;
        font-size: inherit;
        font-family: inherit;
        font-weight: inherit;
        line-height: inherit;
        }
        .btn-primary table td:hover {
        background-color: #34495e !important;
        }
        .btn-primary a:hover {
        background-color: #34495e !important;
        border-color: #34495e !important;
        }
        }
        </style>
        </head>
        <body class="" style="background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
        <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">'.$pre_header.'</span>
        <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;">
        <tr>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
        <td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;">
          <div class="content" style="box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;">

            <!-- START CENTERED WHITE CONTAINER -->
            <table role="presentation" class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
                  <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                    <tr>
                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Yth<br>
                          Bapak/Ibu<br>
                          <br>
                          Terima kasih atas kepercayaannya melakukan permohonan SBU kepada PT Sertifikasi Kontraktor Indonesia (SKI) ,<br></p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">'.$isi_email.'</p>


                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">Terima Kasih.</p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>

            <!-- START FOOTER -->
            <div class="footer" style="clear: both; Margin-top: 10px; text-align: center; width: 100%;">
              <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                <tr>
                <td style="padding-bottom:25px;padding-top:22px;width:100%;padding-right:0px;padding-left:0px;">
                <div align="center" style="line-height:10px"><img alt="Im an image" src="https://ski.sertifikasikontraktor.com/assets/media/logos/Logo_ski_2.png" style="display: block; height: auto; border: 0; width: 149px; max-width: 100%;" title="Im an image" width="149"/></div>
                </td>
                </tr>
                <tr>
                  <td class="content-block" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
                    <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">Wijaya Grand Centre Blok D-1 Lt. 3, Jl. Darmawangsa Raya No. 2 Jakarta Selatan</span>

                  </td>
                </tr>

              </table>
            </div>
            <!-- END FOOTER -->

          <!-- END CENTERED WHITE CONTAINER -->
          </div>
        </td>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
        </tr>
        </table>
        </body>
        </html>

        ';
        return $html;
      }
      function notif_email2($nib,$tgl_permohonan){
        $html='
        <!doctype html>
        <html>
        <head>
        <meta name="viewport" content="width=device-width">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Simple Transactional Email</title>
        <style>
        /* -------------------------------------
        INLINED WITH htmlemail.io/inline
        ------------------------------------- */
        /* -------------------------------------
        RESPONSIVE AND MOBILE FRIENDLY STYLES
        ------------------------------------- */
        @media only screen and (max-width: 620px) {
        table[class=body] h1 {
        font-size: 28px !important;
        margin-bottom: 10px !important;
        }
        table[class=body] p,
            table[class=body] ul,
            table[class=body] ol,
            table[class=body] td,
            table[class=body] span,
            table[class=body] a {
        font-size: 16px !important;
        }
        table[class=body] .wrapper,
            table[class=body] .article {
        padding: 10px !important;
        }
        table[class=body] .content {
        padding: 0 !important;
        }
        table[class=body] .container {
        padding: 0 !important;
        width: 100% !important;
        }
        table[class=body] .main {
        border-left-width: 0 !important;
        border-radius: 0 !important;
        border-right-width: 0 !important;
        }
        table[class=body] .btn table {
        width: 100% !important;
        }
        table[class=body] .btn a {
        width: 100% !important;
        }
        table[class=body] .img-responsive {
        height: auto !important;
        max-width: 100% !important;
        width: auto !important;
        }
        }

        /* -------------------------------------
        PRESERVE THESE STYLES IN THE HEAD
        ------------------------------------- */
        @media all {
        .ExternalClass {
        width: 100%;
        }
        .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
        line-height: 100%;
        }
        .apple-link a {
        color: inherit !important;
        font-family: inherit !important;
        font-size: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
        text-decoration: none !important;
        }
        #MessageViewBody a {
        color: inherit;
        text-decoration: none;
        font-size: inherit;
        font-family: inherit;
        font-weight: inherit;
        line-height: inherit;
        }
        .btn-primary table td:hover {
        background-color: #34495e !important;
        }
        .btn-primary a:hover {
        background-color: #34495e !important;
        border-color: #34495e !important;
        }
        }
        </style>
        </head>
        <body class="" style="background-color: #FFFFFF; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
        <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">Pemberitahuan Tinjauan Permohonan</span>
        <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;">
        <tr>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
        <td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;">
          <div class="content" style="box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;">

            <!-- START CENTERED WHITE CONTAINER -->
            <table role="presentation" class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">

                  <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                    <tr>

                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                        <div style="font-family:  sans-serif">
                          <div style="font-size: 12px; font-family:  sans-serif; mso-line-height-alt: 14.399999999999999px; color: #555555; line-height: 1.2;">
                            <p style="margin: 0; font-size: 14px;"><strong><span style="font-size:46px;"><span style="color:#3d3bee;font-size:46px;">Notification</span>!</span></strong></p>
                          </div>
                        </div>
                        <div style="font-family: sans-serif">
                        <div style="font-size: 12px; mso-line-height-alt: 18px; color: #555555; line-height: 1.5; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;">
                        <p style="margin: 0; font-size: 12px;"><strong><span style="font-size:20px;">Permohonan anda sudah lolos tahapan tinjauan permohonan!</span></strong></p>
                        </div>
                        </div>
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; box-sizing: border-box;">
                          <tbody>
                            <tr>
                              <td align="center" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;">
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
                                  <tbody>
                                    <td style="padding-bottom:25px;padding-top:22px;width:100%;padding-right:0px;padding-left:0px;">
                                    <div align="center" style="line-height:10px"><img alt="Im an image" src="https://d1oco4z2z1fhwp.cloudfront.net/templates/default/271/illo.png" style="display: block; height: auto; border: 0; max-width: 100%;" title="Im an image" width="500"/></div>
                                    </td>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <div style="font-family: sans-serif">
                        <div style="font-size: 12px; mso-line-height-alt: 18px; color: #555555; line-height: 1.5; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;">
                        <p style="margin: 0; font-size: 12px;"><strong><span style="font-size:15px;">
                        Yth<br>
                        Bapak/Ibu<br>
                        <br>
                        Terima kasih atas kepercayaannya melakukan permohonan SBU kepada PT Sertifikasi Kontraktor Indonesia (SKI)<br>
                        <br,br>
                        Anda bisa menuju proses selanjutnya yaitu Proses Upload Pembayaran & Perjanjian sertifikasi. <br>Informasi invoice, perjanjian sertifikasi, dan halaman upload Pembayaran & Perjanjian sertifikasi bisa di akses melalui:</span></strong></p>
                        </div>
                        </div>
                        <br>
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; box-sizing: border-box;">
                          <tbody>
                            <tr>
                              <td align="center" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;">
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
                                  <tbody>
                                    <tr>
                                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top; background-color: #3498db; border-radius: 5px; text-align: center;"> <a href="'.base_url('sertifikasi/biaya_sertifikasi/'.$nib.'/'.$tgl_permohonan).'" target="_blank" style="display: inline-block; color: #ffffff; background-color: #3498db; border: solid 1px #3498db; border-radius: 5px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize; border-color: #3498db;">Click Me!</a> </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>

                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>

            <!-- START FOOTER -->
            <div class="footer" style="clear: both; Margin-top: 10px; text-align: center; width: 100%;">
              <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                <tr>
                <td style="padding-bottom:25px;padding-top:22px;width:100%;padding-right:0px;padding-left:0px;">
                <div align="center" style="line-height:10px"><img alt="Im an image" src="https://ski.sertifikasikontraktor.com/assets/media/logos/Logo_ski_2.png" style="display: block; height: auto; border: 0; width: 149px; max-width: 100%;" title="Im an image" width="149"/></div>
                </td>
                </tr>
                <tr>
                  <td class="content-block" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
                    <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">Wijaya Grand Centre Blok D-1 Lt. 3, Jl. Darmawangsa Raya No. 2 Jakarta Selatan</span>

                  </td>
                </tr>

              </table>
            </div>
            <!-- END FOOTER -->

          <!-- END CENTERED WHITE CONTAINER -->
          </div>
        </td>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
        </tr>
        </table>
        </body>
        </html>

        ';
        return $html;
      }

      function notif_email3(){
        $html='

        <!doctype html>
        <html>
        <head>
        <meta name="viewport" content="width=device-width">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Simple Transactional Email</title>
        <style>
        /* -------------------------------------
        INLINED WITH htmlemail.io/inline
        ------------------------------------- */
        /* -------------------------------------
        RESPONSIVE AND MOBILE FRIENDLY STYLES
        ------------------------------------- */
        @media only screen and (max-width: 620px) {
        table[class=body] h1 {
        font-size: 28px !important;
        margin-bottom: 10px !important;
        }
        table[class=body] p,
            table[class=body] ul,
            table[class=body] ol,
            table[class=body] td,
            table[class=body] span,
            table[class=body] a {
        font-size: 16px !important;
        }
        table[class=body] .wrapper,
            table[class=body] .article {
        padding: 10px !important;
        }
        table[class=body] .content {
        padding: 0 !important;
        }
        table[class=body] .container {
        padding: 0 !important;
        width: 100% !important;
        }
        table[class=body] .main {
        border-left-width: 0 !important;
        border-radius: 0 !important;
        border-right-width: 0 !important;
        }
        table[class=body] .btn table {
        width: 100% !important;
        }
        table[class=body] .btn a {
        width: 100% !important;
        }
        table[class=body] .img-responsive {
        height: auto !important;
        max-width: 100% !important;
        width: auto !important;
        }
        }

        /* -------------------------------------
        PRESERVE THESE STYLES IN THE HEAD
        ------------------------------------- */
        @media all {
        .ExternalClass {
        width: 100%;
        }
        .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
        line-height: 100%;
        }
        .apple-link a {
        color: inherit !important;
        font-family: inherit !important;
        font-size: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
        text-decoration: none !important;
        }
        #MessageViewBody a {
        color: inherit;
        text-decoration: none;
        font-size: inherit;
        font-family: inherit;
        font-weight: inherit;
        line-height: inherit;
        }
        .btn-primary table td:hover {
        background-color: #34495e !important;
        }
        .btn-primary a:hover {
        background-color: #34495e !important;
        border-color: #34495e !important;
        }
        }
        </style>
        </head>
        <body class="" style="background-color: #FFFFFF; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;">
        <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">Pemberitahuan Tinjauan Permohonan</span>
        <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background-color: #f6f6f6;">
        <tr>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
        <td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; Margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;">
          <div class="content" style="box-sizing: border-box; display: block; Margin: 0 auto; max-width: 580px; padding: 10px;">

            <!-- START CENTERED WHITE CONTAINER -->
            <table role="presentation" class="main" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; background: #ffffff; border-radius: 3px;">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">

                  <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                    <tr>

                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                        <div style="font-family:  sans-serif">
                          <div style="font-size: 12px; font-family:  sans-serif; mso-line-height-alt: 14.399999999999999px; color: #555555; line-height: 1.2;">
                            <p style="margin: 0; font-size: 14px;"><strong><span style="font-size:46px;"><span style="color:#3d3bee;font-size:46px;">Notification</span>!</span></strong></p>
                          </div>
                        </div>
                        <div style="font-family: sans-serif">
                        <div style="font-size: 12px; mso-line-height-alt: 18px; color: #555555; line-height: 1.5; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;">
                        <p style="margin: 0; font-size: 12px;"><strong><span style="font-size:20px;">

                        Pembayaran permohonan sertifikasi anda telah diverifikasi!</span></strong></p>
                        </div>
                        </div>
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; box-sizing: border-box;">
                          <tbody>
                            <tr>
                              <td align="center" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;">
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;">
                                  <tbody>
                                    <td style="padding-bottom:25px;padding-top:22px;width:100%;padding-right:0px;padding-left:0px;">
                                    <div align="center" style="line-height:10px"><img alt="Im an image" src="https://ski.sertifikasikontraktor.com/assets/media/svg/humans/login-visual-1.png" style="display: block; height: auto; border: 0; max-width: 100%;" title="Im an image" width="500"/></div>
                                    </td>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <div style="font-family: sans-serif">
                        <div style="font-size: 12px; mso-line-height-alt: 18px; color: #555555; line-height: 1.5; font-family: Open Sans, Helvetica Neue, Helvetica, Arial, sans-serif;">
                        <p style="margin: 0; font-size: 12px;"><strong><span style="font-size:15px;">
                        Yth<br>
                        Bapak/Ibu<br>
                        <br>
                        Terima kasih atas kepercayaannya melakukan permohonan SBU kepada PT Sertifikasi Kontraktor Indonesia (SKI)<br>
                        <br>

                        Proses selanjutnya akan dilakukan penilaian terhadap permohonan sertifikasi anda<br><br>Hormat kami,<br>
                        PT Sertifikasi Kontraktor Indonesia
                        </span></strong></p>
                        </div>
                        </div>
                        <br>


                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>

            <!-- START FOOTER -->
            <div class="footer" style="clear: both; Margin-top: 10px; text-align: center; width: 100%;">
              <table role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;">
                <tr>
                <td style="padding-bottom:25px;padding-top:22px;width:100%;padding-right:0px;padding-left:0px;">
                <div align="center" style="line-height:10px"><img alt="Im an image" src="https://ski.sertifikasikontraktor.com/assets/media/logos/Logo_ski_2.png" style="display: block; height: auto; border: 0; width: 149px; max-width: 100%;" title="Im an image" width="149"/></div>
                </td>
                </tr>
                <tr>
                  <td class="content-block" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
                    <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">Wijaya Grand Centre Blok D-1 Lt. 3, Jl. Darmawangsa Raya No. 2 Jakarta Selatan</span>

                  </td>
                </tr>

              </table>
            </div>
            <!-- END FOOTER -->

          <!-- END CENTERED WHITE CONTAINER -->
          </div>
        </td>
        <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
        </tr>
        </table>
        </body>
        </html>
        ';
        return $html;
      }
}
?>
