<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Survailen extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('bu/Bu_model');
    $this->load->model('tk/Tenaga_kerja_model');
    $this->load->library(array('form_validation'));
    $this->load->library('Template');
    $this->load->helper('Ssl');
  }
  function list_asesor()
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    } elseif ($this->ion_auth->admin_pusat() or $this->ion_auth->pelaksana() or $this->ion_auth->pelaksana()) {
      $data = $this->Bu_model->list_invoice();
      $record = array();
      foreach ($data as $row) {
        $penilaian = '';
        $asesor = '';
        $asesor1 = '';
        $asesor2 = '';
        $check_penilaian = $this->Bu_model->get_penilaian($row['NIB'], $row['tgl_permohonan']);
        for ($i = 0; $i < count($check_penilaian); $i++) {
          if ($i == 0) {
            $counter = $check_penilaian[$i]['id_asesor'];
            $asesor = $check_penilaian[$i]['Nama'];
            $asesor1 = $check_penilaian[$i]['Nama'];
            if ($check_penilaian[$i]['hasil_akhir'] == '1') {
              $x = "Sesuai";
            } else {
              $x = "Tidak Sesuai";
            }
            $penilaian = $x;
          } else {
            if ($counter != $check_penilaian[$i]['id_asesor']) {
              $asesor2 = $check_penilaian[$i]['Nama'];
              $counter = $check_penilaian[$i]['id_asesor'];
              $asesor = $asesor . ', ' . $check_penilaian[$i]['Nama'];
              if ($check_penilaian[$i]['hasil_akhir'] == '0' and $penilaian == 'Sesuai') {

                $x = "Tidak Sesuai";
              }
              $penilaian = $x;
            } else {

              if ($check_penilaian[$i]['hasil_akhir'] == '0' and $penilaian == 'Sesuai') {
                $x = "Tidak Sesuai";
              }
              $penilaian = $x;
            }
          }
        }

        $datax = array(
          'asesor' => $asesor,
          'asesor1' => $asesor1,
          'asesor2' => $asesor2,
          'penilaian' => $penilaian,
          'tgl_penunjukan_asesor' => $check_penilaian[0]['tglupdate'],
          'tgl_evaluator' => $row['tgl_evaluator'],
          'tgl_biaya' => $row['tgl_biaya'],
          'id_izin' => $row['id_izin'],
          'nama_pemproses' => $row['nama_pemproses'],
          'pilihan' => $row['pilihan'],
          'file_pembayaran' => $row['file_pembayaran'],
          'nama_propinsi' => $row['nama_propinsi'],
          'nama_asosiasi' => $row['nama_asosiasi'],
          'biaya_lsbu' => $biaya_new2,
          'status_0' => $row['status_0'],
          'concat_sub' => $row['concat_sub'],
          'concat_klasifikasi' => $row['concat_klasifikasi'],
          'concat_kualifikasi' => $row['concat_kualifikasi'],
          'nama' => $row['nama'],
          'NIB' => $row['NIB'],
          'tgl_permohonan' => $row['tgl_permohonan'],
          'propinsi' => $row['concat_sub'],
          'tahun' => $row['tahun'],
          'status_1' => $row['status_1'],
          'status_2' => $row['status_2'],
          'status_3' => $row['status_3'],
          'stat' => $status,
          'count' => $count
        );
        array_push($record, $datax);
      }
      $this->data = array(
        'record' => $record,
        'propinsi' => $this->Bu_model->provinsi(),


      );
      $this->template->load('menu/menu', 'survailen/list_asesor_list', $this->data);
    } else {
      $this->session->set_flashdata('title', 'Warning');
      $this->session->set_flashdata('text', 'Anda tidak memiliki akses');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
  }
  function list_asesor2()
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    } elseif ($this->ion_auth->admin_pusat() or $this->ion_auth->pelaksana() or $this->ion_auth->pelaksana()) {
      $data = $this->Bu_model->list_invoice2();

      $this->data = array(
        'record' => $data


      );
      $this->template->load('menu/menu', 'survailen/list_asesor_list_2', $this->data);
    } else {
      $this->session->set_flashdata('title', 'Warning');
      $this->session->set_flashdata('text', 'Anda tidak memiliki akses');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
  }
  function get_permohonan_detail_perubahan()
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
    $post = $this->input->post();
    $id_izin = $this->security->xss_clean(trim($post['id_izin']));
    $record = $this->Bu_model->token_api_siki();
    $token = $record[0]['token'];
    $url = "https://siki.pu.go.id/siki-api/v1/permohonan-perubahan-sbu/" . $id_izin;

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    //curl_setopt($curl, CURLOPT_POSTFIELDS, $data);post
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      "Content-type: application/json",
      "token: $token"
    ));
    $json_response = curl_exec($curl);
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    $responses = json_decode($json_response, true);
    curl_close($curl);
    if ($status != 200) {
      die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
      $response = array(
        'result' => 2,


      );
    } else {
      $rexc = $this->Bu_model->get_email($id_izin);
      $sub_klasifikasix = $rexc[0]['sub_klasifikasi'];
      $NIB = $rexc[0]['NIB'];
      $data = array(
        'hasil_akhir' => '2',

      );
      $table = "lsbu_survailen_penilaian_tinjauan";
      $where = array(
        'NIB' => $NIB
      );
      $this->Bu_model->update_edit($where, $table, $data);

      $data2 = array(
        'status' => '103',

      );
      $table2 = "lsbu_permohonan_masuk_perubahan";
      $where2 = array(
        'id_izin' => $id_izin
      );
      $this->Bu_model->update_edit($where2, $table2, $data2);

      if (!empty($responses['badan_usaha'])) {

        $responses_administrasi = $responses['badan_usaha'];
        $bentuk_usaha = $responses_administrasi['bentuk_badan_usaha'];
        $id_propinsi = $responses_administrasi['id_provinsi'];
        $id_kabupaten = $responses_administrasi['id_kabupaten_kota'];
        $jabatan_pimpinan = $responses_administrasi['jabatan_pimpinan'];
        if ($responses_administrasi['jenis_badan_usaha'] == '') {
          $klas_jenis = '1';
        } else {
          $klas_jenis = $responses_administrasi['jenis_badan_usaha'];
        }
        $jenis_badan_usaha = $klas_jenis;
        $nama = str_replace("'", '', $responses_administrasi['nama_badan_usaha']);

        $map = $responses_administrasi['map'];
        $email_pic = $responses_administrasi['creator'];
        $nib = str_replace(' ', '', $responses_administrasi['nib']);


        $nama_pimpinan = $responses_administrasi['nama_pimpinan'];
        $minisite_name = $responses_administrasi['minisite_name'];
        $alamat = str_replace("'", '', $responses_administrasi['alamat_badan_usaha']);
        $kodepos = $responses_administrasi['kode_pos_badan_usaha'];
        $telepon = $responses_administrasi['telepon_badan_usaha'];
        $hp = $responses_administrasi['hp_badan_usaha'];
        $fax = $responses_administrasi['faksimili_badan_usaha'];
        $email = $responses_administrasi['email_badan_usaha'];
        $web = $responses_administrasi['website_badan_usaha'];
        $updated_izin = $responses_administrasi['updated'];
        $tgl_didirikan = $responses_administrasi['tgl_didirikan'];
        $rekening = $responses_administrasi['rekening_badan_usaha'];
        $jenis_usaha = $responses_administrasi['jenis_usaha'];
        $npwp = $responses_administrasi['npwp_badan_usaha'];
        $file_nib = $responses_administrasi['file_nib'];
        $file_npwp = $responses_administrasi['file_npwp'];
        $sptjm = $responses_administrasi['sptjm'];
        $created = $responses_administrasi['created'];
        $creator = $responses_administrasi['creator'];
        $updated = $responses_administrasi['updated'];
        $select = "REPLACE INTO lsbu_bu_izin_perubahan (
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
        $where = "";
        $this->Bu_model->delete_opr($select, $where);
      }

      if (!empty($responses['neraca'])) {
        foreach ($responses['neraca'] as $row_neraca) {
          $tahun = $row_neraca['tahun'];
          $aset_lain_lain = $row_neraca['aset_lain_lain'];
          $aset_lancar = $row_neraca['aset_lancar'];
          $aset_tdk_lancar = $row_neraca['aset_tdk_lancar'];
          $kewajiban_lancar = $row_neraca['kewajiban_lancar'];
          $kewajiban_tdk_lancar = $row_neraca['kewajiban_tdk_lancar'];
          $total_aset = $row_neraca['total_aset'];
          $total_modal = $row_neraca['total_modal'];
          $totalekuitas = $row_neraca['totalekuitas'];
          $totalkewajiban = $row_neraca['totalkewajiban'];
          $totalkewajiban_ekuitas = $row_neraca['total_kewajiban_ekuitas'];
          $file_doc_a = $row_neraca['file_doc_a'];
          $file_doc_b = $row_neraca['file_doc_b'];
          $created = $row_neraca['created'];
          $creator = $row_neraca['creator'];
          $updated = $row_neraca['updated'];

          $select_neraca = "REPLACE INTO lsbu_keuangan_neraca_2_izin_perubahan(
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
          $where = "";
          $this->Bu_model->delete_opr($select_neraca, $where);
        }
      }

      if (!empty($responses['permohonan_registrasi'])) {

        foreach ($responses['permohonan_registrasi'] as $row_registrasi) {
          $sub_klasifikasi = $row_registrasi['id_sub_klasifikasi'];
          //$this->Bu_model->update_perbaikan2($nib,$sub_klasifikasi);


          $asosiasi = $row_registrasi['asosiasi'];
          $id_klasifikasi = $row_registrasi['id_klasifikasi'];
          $id_sub_klasifikasi = $row_registrasi['id_sub_klasifikasi'];
          $kualifikasi = $row_registrasi['kualifikasi'];
          $nomor_kbli = $row_registrasi['nomor_kbli'];
          $jenis_usaha = $row_registrasi['jenis_usaha'];
          $sifat_usaha = $row_registrasi['sifat_usaha'];
          $user_email = preg_replace("/'/", '', $row_registrasi['user_email']);
          $user_hp = $row_registrasi['user_hp'];
          $user_name = preg_replace("/'/", '', $row_registrasi['user_name']);

          $updated = $row_registrasi['updated'];
          $creator = $row_registrasi['creator'];
          $created = $row_registrasi['created'];



          $select_registrasi = "INSERT IGNORE INTO lsbu_registrasi_izin_perubahan(
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
          $where = "";
          $this->Bu_model->delete_opr($select_registrasi, $where);
          //$this->Bu_model->insert_permohonan_perubahan($nib,$tgl_permohonan,$id_propinsi,$id_izin);


        }
      }


      if (!empty($responses['pemegang_saham'])) {

        foreach ($responses['pemegang_saham'] as $row_saham) {
          $txt = $row_saham['alamat'];
          $alamat2 = preg_replace("/'/", '', $txt);
          $alamat = preg_replace("/", '', $alamat2);
          $id_kabupaten_kota = $row_saham['id_kabupaten_kota'];
          $id_provinsi = $row_saham['id_provinsi'];
          $jenis_saham = $row_saham['jenis_saham'];
          $jumlah_saham = $row_saham['jumlah_saham'];
          $modal_dasar = $row_saham['modal_dasar'];
          $modal_disetor = $row_saham['modal_disetor'];
          $namax = $row_saham['nama'];
          $nama = preg_replace("/'/", '', $namax);
          $nilaisatuan_saham = $row_saham['nilaisatuan_saham'];
          $no_akte = $row_saham['no_akte'];
          $no_ktp = $row_saham['no_ktp'];
          $npwp = preg_replace("/'/", '', $row_saham['npwp']);
          $file_doc = $row_saham['file_doc'];
          $file_ktp = $row_saham['file_ktp'];
          $file_npwp = $row_saham['file_npwp'];
          $created = $row_saham['created'];
          $creator = $row_saham['creator'];
          $updated = $row_saham['updated'];
          $select_saham = "REPLACE INTO lsbu_keuangan_saham_izin_perubahan(
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
          $where = "";
          $this->Bu_model->delete_opr($select_saham, $where);
        }
      }
      if (!empty($responses['peralatan'])) {
        foreach ($responses['peralatan'] as $row_peralatan) {
          $harga = $row_peralatan['harga'];
          $jenis = $row_peralatan['jenis'];

          $hasil_pemeriksaan_pengujian = $row_peralatan['hasil_pemeriksaan_pengujian'];
          $jenis_bukti_kepemilikan = $row_peralatan['jenis_bukti_kepemilikan'];
          $kab_kota = $row_peralatan['kab_kota'];
          $kapasitas_hasil_uji = $row_peralatan['kapasitas_hasil_uji'];
          $model_type = $row_peralatan['model_type'];
          $memiliki_peralatan = $row_peralatan['memiliki_peralatan'];
          $nomor_registrasi_peralatan = $row_peralatan['nomor_registrasi_peralatan'];
          $provinsi = $row_peralatan['provinsi'];
          $subvarian = $row_peralatan['subvarian'];
          $tahun_pembuatan = $row_peralatan['tahun_pembuatan'];
          $unit_satuan_kapasitas = $row_peralatan['unit_satuan_kapasitas'];

          $kapasitas = $row_peralatan['kapasitas'];
          $kepemilikan_peralatan = $row_peralatan['kepemilikan_peralatan'];
          $keterangan = $row_peralatan['keterangan'];
          $kondisi = $row_peralatan['kondisi'];
          $lokasi = $row_peralatan['lokasi'];
          $merek = $row_peralatan['merek'];
          $seq = $row_peralatan['seq'];
          $tahun = $row_peralatan['tahun'];
          $tipe = $row_peralatan['tipe'];
          $file_doc_a = $row_peralatan['file_doc_a'];

          $foto_plat_nama = $row_peralatan['foto_plat_nama'];
          $foto_tampak_depan_peralatan = $row_peralatan['foto_tampak_depan_peralatan'];
          $foto_tampak_samping_peralatan = $row_peralatan['foto_tampak_samping_peralatan'];



          $created = $row_peralatan['created'];
          $creator = $row_peralatan['creator'];
          $updated = $row_peralatan['updated'];
          $select_peralatan = "REPLACE INTO lsbu_peralatan_izin_perubahan(
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
          $where = "";
          $this->Bu_model->delete_opr($select_peralatan, $where);
        }
      }
      if (!empty($responses['pengurus'])) {

        foreach ($responses['pengurus'] as $row_pengurus) {
          $txt = $row_pengurus['alamat'];
          $alamat2 = preg_replace("/'/", '', $txt);
          $alamat = preg_replace("/", '', $alamat2);

          $bukan_asn = $row_pengurus['bukan_asn'];
          $email = $row_pengurus['email'];
          $hp_a = $row_pengurus['hp_a'];
          $hp_b = $row_pengurus['hp_b'];
          $jabatan = $row_pengurus['jabatan'];
          $namax = $row_pengurus['nama'];
          $nama = preg_replace("/'/", '', $namax);
          $no_akte = $row_pengurus['no_akte'];
          $noktp = preg_replace("/'/", '', $row_pengurus['noktp']);

          $pjbu = $row_pengurus['pjbu'];
          $tgllahir = $row_pengurus['tgllahir'];
          $npwp = preg_replace("/'/", '', $row_pengurus['npwp']);
          $foto = $row_pengurus['foto'];
          $ktp_img = $row_pengurus['ktp_img'];
          $npwp_img = $row_pengurus['npwp_img'];
          $loa = $row_pengurus['letter_of_appointment'];
          $created = $row_pengurus['created'];
          $creator = $row_pengurus['creator'];
          $updated = $row_pengurus['updated'];
          $select_pengurus = "REPLACE INTO lsbu_pengurus_izin_perubahan(
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
          $where = "";
          $this->Bu_model->delete_opr($select_pengurus, $where);
        }
      }

      if (!empty($responses['penjualan_tahunan'])) {
        foreach ($responses['penjualan_tahunan'] as $row_pengalaman) {

          $nomor_kontrak = $row_pengalaman['no_kontrak'];
          $nama_pengalaman = preg_replace("/'/", '', $row_pengalaman['nama_proyek']);
          $nilai_kontrak = $row_pengalaman['nilai_proyek'];

          $email_instansi = $row_pengalaman['email_instansi_pemberi_tugas'];
          $jabatan_pemberi_tugas = str_replace("'", '', $row_pengalaman['jabatan_pemberi_tugas']);
          $lokasi_pekerjaan = $row_pengalaman['lokasi_pekerjaan'];

          $nama_instansi_pemberi_tugas = preg_replace("/'/", '', $row_pengalaman['nama_instansi_pemberi_tugas']);
          $nama_pemberi_tugas = preg_replace("/'/", '', $row_pengalaman['nama_pemberi_tugas']);

          $nilai_kontrak_adendum = $row_pengalaman['nilai_kontrak_adendum'];
          $nilai_kontrak_sesuai_porsi = $row_pengalaman['nilai_kontrak_sesuai_porsi'];
          $no_telp_instansi_pemberi_tugas = str_replace("'", '', $row_pengalaman['no_telp_instansi_pemberi_tugas']);
          $nomor_registrasi_pengalaman = $row_pengalaman['nomor_registrasi_pengalaman'];
          $pemberi_tugas = $row_pengalaman['pemberi_tugas'];
          $presentase_porsi = $row_pengalaman['presentase_porsi'];
          $status_kso = $row_pengalaman['status_kso'];
          $sumber_dana = $row_pengalaman['sumber_dana'];
          $tgl_bast = $row_pengalaman['tgl_bast'];


          $no_bast = $row_pengalaman['no_bast'];
          $no_nkpk = $row_pengalaman['no_nkpk'];
          $pemilik_proyek = $row_pengalaman['pemilik_proyek'];
          $spesifik_pekerjaan = $row_pengalaman['spesifik_pekerjaan'];
          $sub_klasifikasi = $row_pengalaman['sub_klasifikasi'];
          $tahun = $row_pengalaman['tahun'];
          $tgl_kontrak = $row_pengalaman['tgl_kontrak'];
          $tgl_mulai = $row_pengalaman['tgl_mulai'];
          $tgl_selesai = $row_pengalaman['tgl_selesai'];
          $doc_1 = $row_pengalaman['file_doc_a'];
          $doc_2 = $row_pengalaman['file_doc_b'];

          $file_bash = $row_pengalaman['file_bast'];
          $file_boq_rab_mpu = $row_pengalaman['file_boq_rab_mpu'];
          $file_kontrak_dengan_pemberi_tugas = $row_pengalaman['file_kontrak_dengan_pemberi_tugas'];

          $created = $row_pengalaman['created'];
          $creator = $row_pengalaman['creator'];
          $updated = $row_pengalaman['updated'];
          $select_pengalaman = "REPLACE INTO lsbu_pengalaman_izin_perubahan(
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
          $where = "";
          $this->Bu_model->delete_opr($select_pengalaman, $where);
        }
      }
      if (!empty($responses['pjbu'])) {
        foreach ($responses['pjbu'] as $row_pjbu) {
          $alamat = $row_pjbu['alamat'];
          $email = $row_pjbu['email'];
          $hp = $row_pjbu['hp'];
          $jabatan = $row_pjbu['jabatan'];

          $nama = preg_replace("/'/", '', $row_pjbu['nama']);
          $nik = $row_pjbu['nik'];
          $npwp = $row_pjbu['npwp'];
          $stk = $row_pjbu['stk'];
          $tgl_lahir = $row_pjbu['tgl_lahir'];
          $file_ktp = $row_pjbu['file_ktp'];
          $file_npwp = $row_pjbu['file_npwp'];
          $foto = $row_pjbu['foto'];
          $updated = $row_pjbu['updated'];
          $creator = $row_pjbu['creator'];
          $created = $row_pjbu['created'];
          $select_registrasi = "REPLACE INTO lsbu_pjbu_izin_perubahan(
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
          $where = "";
          $this->Bu_model->delete_opr($select_registrasi, $where);
        }
      }
      if (!empty($responses['pjskbu'])) {
        foreach ($responses['pjskbu'] as $row_pjskbu) {
          $id_sub_klasifikasi_pjsk = $row_pjskbu['id_sub_klasifikasi_pjsk'];
          $jenis_tenaga = $row_pjskbu['jenis_tenaga'];
          $jenjang_skk = $row_pjskbu['jenjang_skk'];
          $klasifikasi = $row_pjskbu['klasifikasi'];

          $klasifikasi_acpe_aa = $row_pjskbu['klasifikasi_acpe_aa'];
          $nomor_registrasi_acpe_aa = $row_pjskbu['nomor_registrasi_acpe_aa'];
          $klasifikasi_skk = $row_pjskbu['klasifikasi_skk'];
          $kualifikasi_skk = $row_pjskbu['kualifikasi_skk'];
          $tanggal_terbit_skk = $row_pjskbu['tanggal_terbit_skk'];



          $nama = preg_replace("/'/", '', $row_pjskbu['nama']);

          $nik = $row_pjskbu['nik'];
          $noreg_skk = preg_replace("/'/", '', $row_pjskbu['noreg_skk']);
          $npwp = $row_pjskbu['npwp'];
          $sub_klasifikasi = $row_pjskbu['sub_klasifikasi'];
          $ijazah = $row_pjskbu['ijazah'];
          $file_skk = $row_pjskbu['file_skk'];
          $file_spt = $row_pjskbu['file_spt'];
          $updated = $row_pjskbu['updated'];
          $created = $row_pjskbu['created'];
          $creator = $row_pjskbu['creator'];
          $select_pjskbu = "REPLACE INTO lsbu_pjskbu_izin_perubahan(
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
          ijazah,
          skk,
          spt,
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
            '$ijazah',
            '$file_skk',
            '$file_spt',
            '$updated',
            '$creator',
            '$created'
          )";
          $where = "";
          $this->Bu_model->delete_opr($select_pjskbu, $where);
        }
      }
      if (!empty($responses['pjtbu'])) {
        foreach ($responses['pjtbu'] as $row_pjtbu) {
          $alamat = $row_pjtbu['alamat'];
          $jenjang_skk = $row_pjtbu['jenjang_skk'];
          $nama = preg_replace("/'/", '', $row_pjtbu['nama']);


          $klasifikasi = $row_pjtbu['klasifikasi'];
          $klasifikasi_acpe_aa = $row_pjtbu['klasifikasi_acpe_aa'];
          $kualifikasi_skk = $row_pjtbu['kualifikasi_skk'];
          $nomor_registrasi_acpe_aa = $row_pjtbu['nomor_registrasi_acpe_aa'];
          $tanggal_terbit_skk = $row_pjtbu['tanggal_terbit_skk'];

          $nik = $row_pjtbu['nik'];
          $noreg_skk = $row_pjtbu['noreg_skk'];
          $npwp = $row_pjtbu['npwp'];
          $sub_klasifikasi = $row_pjtbu['sub_klasifikasi'];
          $ijazah = $row_pjtbu['ijazah'];
          $file_skk = $row_pjtbu['file_skk'];
          $file_spt = $row_pjtbu['file_spt'];
          $updated = $row_pjskbu['updated'];
          $created = $row_pjskbu['created'];
          $creator = $row_pjskbu['creator'];
          $select_pjtbu = "REPLACE INTO lsbu_pjtbu_izin_perubahan(
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
          ijazah,
          skk,
          spt,
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
            '$ijazah',
            '$file_skk',
            '$file_spt',
            '$updated',
            '$created',
            '$creator'
          )";
          $where = "";
          $this->Bu_model->delete_opr($select_pjtbu, $where);
        }
      }

      if (!empty($responses['smap'])) {
        foreach ($responses['smap'] as $smap) {
          $dokumen_smap = $smap['dokumen_smap'];
          $iso_37001 = $smap['iso_37001'];
          $surat_pernyataan = $smap['surat_pernyataan'];
          $file_surat_pernyataan = $smap['file_surat_pernyataan'];
          $sertifikat_iso = $smap['sertifikat_iso'];
          $created = $smap['created'];
          $creator = $smap['creator'];
          $updated = $smap['updated'];
          $select_smap = "REPLACE INTO lsbu_smap_izin_perubahan(
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
          $where = "";
          $this->Bu_model->delete_opr($select_smap, $where);
        }
      }

      if (!empty($responses['akte'])) {
        foreach ($responses['akte'] as $akte) {
          $no = $akte['no'];

          $no_sk = preg_replace("/'/", '', $akte['nomor_pengesahan_sk_kumham']);
          $jenis = $akte['jenis'];

          $nama_notaris = preg_replace("/'/", '', $akte['nama_notaris']);
          $alamat_notaris2 = stripslashes($akte['alamat_notaris']);
          $alamat_notaris = preg_replace("/'/", '', $alamat_notaris2);

          $hargasatuan = $akte['hargasatuan'];
          $id_kabupaten_notaris = $akte['id_kabupaten_notaris'];
          $id_provinsi_notaris = $akte['id_provinsi_notaris'];
          $modaldasar = $akte['modaldasar'];
          $modalsetor = $akte['modalsetor'];
          $nilaisaham = $akte['nilaisaham'];
          $maksudtujuan = $akte['maksudtujuan'];
          $tgl_akte = $akte['tgl_akte'];
          $file_doc = $akte['file_doc'];
          $file_ktp = $akte['file_ktp'];
          $file_npwp = $akte['file_npwp'];
          $created = $akte['created'];
          $creator = $akte['creator'];
          $updated = $akte['updated'];
          $select_akte = "REPLACE INTO lsbu_akte_izin_perubahan(
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
          $where = "";
          $this->Bu_model->delete_opr($select_akte, $where);
        }
      }
      $response = array(
        'results' => $responses,
        'badan_usaha' => $responses['badan_usaha']['nama_badan_usaha'],

        'result' => 1
      );
    }


    echo json_encode($response);
  }
  function list_permohonan_perbaikan()
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
    //$this->get_permohonan_perubahan();
    $data = $this->Bu_model->list_permohonan_masuk_survailen();
    $record = array();
    foreach ($data as $row) {
      if ($row['tgl_penilaian'] != '') {
        if ($row['tgl_perubahan'] >= $row['tgl_penilaian']) {
          $datax = array(
            'status' => $row['status'],
            'tgl_perubahan' => $row['tgl_perubahan'],
            'hasil_akhir' => $row['hasil_akhir'],
            'tgl_penilaian' => $row['tgl_penilaian'],
            'id_klasifikasi' => $row['id_klasifikasi'],
            'id_sub_klasifikasi' => $row['id_sub_klasifikasi'],
            'kualifikasi' => $row['kualifikasi'],
            'nama' => $row['nama'],
            'tgl_permohonan' => $row['tgl_permohonan'],
            'id_izin' => $row['id_izin'],
            'NIB' => $row['NIB'],
          );
          array_push($record, $datax);
        }
      }
    }
    $this->data = array(
      'record' => $record,

    );
    $this->template->load('menu/menu', 'permohonan_masuk_survailen', $this->data);
  }
  function get_permohonan_perubahan()
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
    $record = $this->Bu_model->token_api_siki();
    $token = $record[0]['token'];
    $url = "https://siki.pu.go.id/siki-api/v1/permohonan-sbu";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    //curl_setopt($curl, CURLOPT_POSTFIELDS, $data);post
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      "Content-type: application/json",
      "token: $token"
    ));
    $json_response = curl_exec($curl);
    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    if ($status != 200) {
      //die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
      $response = "Failed " . $json_response;
    } else {

      curl_close($curl);
      $responses = json_decode($json_response, true);
      foreach ($responses['data'] as $row) {
        if ($row['status'] == '102') {


          $nib = "'" . $row['nib'] . "'";
          $id_izin = "'" . $row['id_izin'] . "'";
          $create = "'" . $row['created_at'] . "'";
          $updates = "'" . $row['updated_at'] . "'";
          $status = "'" . $row['status'] . "'";
          $check = $this->Bu_model->get_permohonan_masuk_perubahan($row['id_izin']);
          if (empty($check)) {
            $select = "INSERT IGNORE INTO lsbu_permohonan_masuk_perubahan (nib,id_izin,tgl_create_izin,tgl_update_izin,status) VALUE ($nib,$id_izin,$create,$updates,$status)";
            $where = "";
            $this->Bu_model->delete_opr($select, $where);
          } else {
            $select = "REPLACE INTO lsbu_permohonan_masuk_perubahan (nib,id_izin,id_sub_klasifikasi,tgl_permohonan,tgl_create_izin,tgl_update_izin,status) SELECT $nib,$id_izin,id_sub_klasifikasi,NULL,$create,$updates,$status FROM lsbu_permohonan_masuk_perubahan";
            $where = "WHERE id_izin=$id_izin";
            $this->Bu_model->delete_opr($select, $where);
          }
        }
      }
      $response = "Success";
    }


    return $response;
  }
  function dokumen_survailen($id1, $id2)
  {

    $this->load->library('pdfgenerator');
    $nib = decrypt_url($id1);
    $klasifikasi = $this->Bu_model->klasifikasi_kualifikasi_cetak($nib);
    $id_user = $this->session->userdata('id_user');
    $penilaian = $this->Bu_model->get_penilaian_survailen_tinjauan($nib);
    $bulan =  date("m", strtotime($penilaian[0]['Log']));
    $tahun =  date("Y", strtotime($penilaian[0]['Log']));
    $day =  date("d", strtotime($penilaian[0]['Log']));
    $this->data = array(
      'id1' => $id1,
      'klasifikasi' => $klasifikasi,
      'biodata' => $this->Bu_model->biodata_opr($nib),
      'penilaian' => $penilaian,
      'bulan' => $this->getBulan($bulan),
      'tahun' => $tahun,
      'day' => $day
    );
    $html = $this->load->view('survailen/cetak_penilaian', $this->data, true);
    $filename = 'report_' . time();
    //$this->load->view('sertifikasi/berita_acara_tim_pemutus',$data);

    $this->pdfgenerator->generate($html, $filename, true, 'A4', 'landscape');
  }
  function dokumen_surat_tugas($id1, $id2)
  {

    $this->load->library('pdfgenerator');

    $nib = decrypt_url($id1);
    $record = $this->Bu_model->get_penunjukan_survailen_tinjauan($nib);
    $bulan =  date("m", strtotime($record[0]['tgl_penunjukan']));
    $tahun =  date("Y", strtotime($record[0]['tgl_penunjukan']));
    $day =  date("d", strtotime($record[0]['tgl_penunjukan']));
    $bulan_romawi = $this->getBulanrw($bulan);
    $panjang = strlen($rec[0]['no_urut']);
    $jumlah = 5 - $panjang;
    $nol = '';
    for ($i = 0; $i < $jumlah; $i++) {
      $nol = $nol . '0';
    }
    $no_surat = $nol . $record[0]['no_urut'] . "/Survailen-LSBU GI/" . $bulan_romawi . '/' . $tahun;
    $this->data = array(
      'record' => $record,
      'no_surat' => $no_surat,
      'bulan' => $this->getBulan($bulan),
      'tahun' => $tahun,
      'day' => $day,
      'biodata' => $this->Bu_model->biodata_opr($nib)

    );

    $html = $this->load->view('survailen/surat_tugas', $this->data, true);
    $filename = 'report_' . time();
    //print_r($this->data);
    $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
  }
  function cetak_penilaian_tinjauan($id1)
  {

    $this->load->library('pdfgenerator');
    $nib = decrypt_url($id1);
    $klasifikasi = $this->Bu_model->klasifikasi_kualifikasi_cetak($nib);
    $id_user = $this->session->userdata('id_user');
    $penilaian = $this->Bu_model->get_penilaian_survailen_tinjauan($nib);
    $bulan =  date("m", strtotime($penilaian[0]['Log']));
    $tahun =  date("Y", strtotime($penilaian[0]['Log']));
    $day =  date("d", strtotime($penilaian[0]['Log']));
    $this->data = array(
      'id1' => $id1,
      'asesor' => $this->Bu_model->get_asesor_survailen_tinjauan($nib),
      'klasifikasi' => $klasifikasi,
      'biodata' => $this->Bu_model->biodata_opr($nib),
      'penilaian' => $penilaian,
      'bulan' => $this->getBulan($bulan),
      'tahun' => $tahun,
      'day' => $day
    );
    $html = $this->load->view('survailen/cetak_penilaian', $this->data, true);
    $filename = 'report_' . time();
    //$this->load->view('sertifikasi/berita_acara_tim_pemutus',$data);

    $this->pdfgenerator->generate($html, $filename, true, 'A3', 'landscape');
  }
  function cetak_tindak_lanjut($id1)
  {

    $this->load->library('pdfgenerator');
    $nib = decrypt_url($id1);
    $klasifikasi = $this->Bu_model->klasifikasi_kualifikasi_cetak($nib);
    $id_user = $this->session->userdata('id_user');
    $penilaian = $this->Bu_model->get_penilaian_survailen_tinjauan($nib);
    $bulan =  date("m", strtotime($penilaian[0]['Log']));
    $tahun =  date("Y", strtotime($penilaian[0]['Log']));
    $day =  date("d", strtotime($penilaian[0]['Log']));
    $this->data = array(
      'id1' => $id1,
      'klasifikasi' => $klasifikasi,
      'biodata' => $this->Bu_model->biodata_opr($nib),
      'penilaian' => $penilaian,
      'bulan' => $this->getBulan($bulan),
      'tahun' => $tahun,
      'day' => $day
    );
    $html = $this->load->view('survailen/cetak_tindak_lanjut', $this->data, true);
    $filename = 'report_' . time();
    //$this->load->view('sertifikasi/berita_acara_tim_pemutus',$data);

    $this->pdfgenerator->generate($html, $filename, true, 'A4', 'landscape');
  }
  function insert_penilaian_perbaikan()
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
    $post = $this->input->post();
    $id1 = $this->security->xss_clean(trim($post['id1']));
    $nib = decrypt_url($id1);
    $date = encrypt_url(date("Y-m-d"));
    $id_user = $this->session->userdata('id_user');
    $tgl_pelaksanaan = $this->security->xss_clean(trim($post['tgl_pelaksanaan']));
    $tempat_pelaksanaan = $this->security->xss_clean(trim($post['tempat_pelaksanaan']));
    $ketidaksesuaian = $this->security->xss_clean(trim($post['ketidaksesuaian']));
    $referensi = $this->security->xss_clean(trim($post['referensi']));
    $rencana_perbaikan = $this->security->xss_clean(trim($post['rencana_perbaikan']));
    $tgl_selesai = $this->security->xss_clean(trim($post['tgl_selesai']));
    $jenis_temuan = $this->security->xss_clean(trim($post['jenis_temuan']));
    $hasil_akhir = $this->security->xss_clean(trim($post['hasil_akhir']));
    $record = $this->Bu_model->get_penilaian_survailen_tinjauan_perbaikan($nib);
    $select = "REPLACE INTO lsbu_survailen_penilaian_tinjauan_perbaikan (NIB,id_asesor,tgl_pelaksanaan,tempat_pelaksanaan,ketidaksesuaian,referensi,rencana_perbaikan,tgl_selesai,jenis_temuan,hasil_akhir)VALUES ('$nib','$id_user','$tgl_pelaksanaan','$tempat_pelaksanaan','$ketidaksesuaian','$referensi','$rencana_perbaikan','$tgl_selesai','$jenis_temuan','$hasil_akhir')";
    $where = "";
    $this->Bu_model->delete_opr($select, $where);
    $biodata = $this->Bu_model->biodata_opr($nib);
    $klasifikasi = $this->Bu_model->klasifikasi_kualifikasi_opr2_terbit($nib);
    $recsx = $this->Bu_model->get_permohonan_masuk_perubahan_survailen_perbaikan($nib);

    if ($hasil_akhir == '1') {
      foreach ($recsx as $row) {
        $id_izin = $row['id_izin'];
        $record = $this->Bu_model->token_api_siki();
        $token = $record[0]['token'];


        $url = "https://siki.pu.go.id/siki-api/v1/qr-sbu/$id_izin";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        //curl_setopt($curl, CURLOPT_POSTFIELDS, $data);post
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
          "Content-type: application/json",
          "token: $token"
        ));

        $json_response = curl_exec($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $responses = json_decode($json_response, true);
        if ($status != 200) {
          //die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
          $response = array(
            'result' => $responses['message'],


          );
        }

        $url = "https://siki.pu.go.id/siki-api/v1/pencatatan-sbu/$id_izin";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
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
        if ($status != 200) {
          // redirect('sertifikasi/gagal_cetak', 'refresh');
          //die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
          //
          //   $data="Failed";

          $response = array(
            'result' => $responses['message'],


          );
        } else {
          $data_awal = array(
            'status' => '50'
          );
          $where_awal = array(
            'id_izin' => $id_izin
          );
          $table_awal = "lsbu_permohonan_masuk_perubahan";
          $this->Bu_model->update_edit($where_awal, $table_awal, $data_awal);
        }
      }
    } else {
      foreach ($recsx as $row) {
        $id_izin = $row['id_izin'];
        $record = $this->Bu_model->token_api_siki();
        $token = $record[0]['token'];
        $url = "https://siki.pu.go.id/siki-api/v1/permohonan-sbu/$id_izin";
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
          "Content-type: application/json",
          "token: $token"
        ));

        curl_setopt($curl, CURLOPT_POSTFIELDS, '{
            "kd_status":"90",
            "keterangan":"Permohonan Ditolak"
        }');
        $json_response = curl_exec($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $data_awal = array(
          'status' => '90'
        );
        $where_awal = array(
          'id_izin' => $id_izin
        );
        $table_awal = "lsbu_permohonan_masuk_perubahan";
        $this->Bu_model->update_edit($where_awal, $table_awal, $data_awal);
      }
    }


    $this->load->config('email');
    $this->load->library('email');
    $from = $this->config->item('smtp_user');
    $message = $this->notif_email2($id1, $date);
    $this->email->from('info@lsbugapeknas.com', 'LSBU GAPEKNAS');
    $this->email->to($biodata[0]['email']);
    $this->email->set_newline("\r\n");
    $this->email->cc("mail.lsbugapeknas@gmail.com, ccgapeknas@gmail.com");
    $this->email->subject('Survailen LSBU GAPEKNAS');
    $this->email->message($message);
    if (empty($record)) {
      $this->email->send();
    }


    $this->session->set_flashdata('title', 'Submit Berhasil');
    $this->session->set_flashdata('text', 'Data penilaian berhasil disimpan');
    $this->session->set_flashdata('class', "success");
    redirect('survailen/list_tinjauan_permohonan_verifikator/', 'refresh');
  }
  function nib_enc($id1)
  {
    echo encrypt_url($id1);
  }
  function coba_send_email()
  {
    $id1 = "WHhlQy9HWGt0ZjlDZG51bkNCQXFUdz09";
    $date = "Tk13VnV6NXBKcTVZOUxhR1JMbGgyQT09";
    $this->load->config('email');
    $this->load->library('email');
    $from = $this->config->item('smtp_user');
    $message = $this->notif_email2($id1, $date);
    $this->email->from('info@lsbugapeknas.com', 'LSBU GAPEKNAS');
    $this->email->to("yagihagiyansyah@gmail.com");
    $this->email->cc("mail.lsbugapeknas@gmail.com, ccgapeknas@gmail.com");
    $this->email->subject('Survailen LSBU GAPEKNAS');
    $this->email->message($message);

    $this->email->set_newline("\r\n");
    $this->email->set_crlf("\r\n");

    if (!$this->email->send()) {
      // Print error detail
      echo "<pre>" . $this->email->print_debugger() . "</pre>";
      // atau kalau mau stop eksekusi:
      // show_error($this->email->print_debugger());
    } else {
      echo "Email berhasil dikirim";
    }
  }
  function insert_penilaian()
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
    $post = $this->input->post();
    $id1 = $this->security->xss_clean(trim($post['id1']));
    $nib = decrypt_url($id1);
    $date = encrypt_url(date("Y-m-d"));
    $id_user = $this->session->userdata('id_user');
    $tgl_pelaksanaan = $this->security->xss_clean(trim($post['tgl_pelaksanaan']));
    $tempat_pelaksanaan = $this->security->xss_clean(trim($post['tempat_pelaksanaan']));
    $ketidaksesuaian = $this->security->xss_clean(trim($post['ketidaksesuaian']));
    $referensi = $this->security->xss_clean(trim($post['referensi']));
    $rencana_perbaikan = $this->security->xss_clean(trim($post['rencana_perbaikan']));
    $tgl_selesai = $this->security->xss_clean(trim($post['tgl_selesai']));
    $jenis_temuan = $this->security->xss_clean(trim($post['jenis_temuan']));
    $hasil_akhir = $this->security->xss_clean(trim($post['hasil_akhir']));
    $record = $this->Bu_model->get_penilaian_survailen_tinjauan($nib);
    $select = "REPLACE INTO lsbu_survailen_penilaian_tinjauan (NIB,id_asesor,tgl_pelaksanaan,tempat_pelaksanaan,ketidaksesuaian,referensi,rencana_perbaikan,tgl_selesai,jenis_temuan,hasil_akhir)VALUES ('$nib','$id_user','$tgl_pelaksanaan','$tempat_pelaksanaan','$ketidaksesuaian','$referensi','$rencana_perbaikan','$tgl_selesai','$jenis_temuan','$hasil_akhir')";
    $where = "";
    $this->Bu_model->delete_opr($select, $where);
    $biodata = $this->Bu_model->biodata_opr($nib);
    $klasifikasi = $this->Bu_model->klasifikasi_kualifikasi_opr2_terbit($nib);
    $this->load->config('email');
    $this->load->library('email');
    $from = $this->config->item('smtp_user');
    $message = $this->notif_email2($id1, $date);
    $this->email->from('info@lsbugapeknas.com', 'LSBU GAPEKNAS');
    $this->email->set_newline("\r\n");
    $this->email->to($biodata[0]['email']);
    //$this->email->cc($klasifikasi[0]['user_email']);
    $this->email->cc("mail.lsbugapeknas@gmail.com, ccgapeknas@gmail.com");
    $this->email->subject('Survailen LSBU GAPEKNAS');
    $this->email->message($message);
    if (empty($record)) {
      $this->email->send();
    }


    $this->session->set_flashdata('title', 'Submit Berhasil');
    $this->session->set_flashdata('text', 'Data penilaian berhasil disimpan');
    $this->session->set_flashdata('class', "success");
    redirect('survailen/list_tinjauan_permohonan_verifikator/', 'refresh');
  }
  function tinjau_permohonan($id1)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    } elseif ($this->ion_auth->admin_pusat() or $this->ion_auth->pelaksana() or $this->ion_auth->pelaksana()) {

      $nib = decrypt_url($id1);
      //$data = $this->check_pjt_pjsk($id1, $id2);
      $this->data = array(
        'biodata' => $this->Bu_model->biodata_opr($nib),
        'biodata_perubahan' => $this->Bu_model->biodata_opr_izin_survailen($nib),
        'pengurus' => $this->Bu_model->pengurus_opr($nib),
        'pengurus_perubahan' => array(),
        'penjualan_tahunan' => $this->Bu_model->pengalaman_opr($nib),
        'penjualan_tahunan_perubahan' => $this->Bu_model->pengalaman_opr_izin_survailen($nib),
        'akte' => $this->Bu_model->akte_opr($nib),
        'akte_perubahan' => $this->Bu_model->akte_opr_izin_survailen($nib),
        'smap' => $this->Bu_model->smap_opr($nib),
        'smap_perubahan' => $this->Bu_model->smap_opr_izin_survailen($nib),
        'neraca' => $this->Bu_model->neraca_ski($nib),
        'neraca_perubahan' => $this->Bu_model->neraca_ski_izin_survailen($nib),

        'pemegang_saham' => $this->Bu_model->pemegang_saham_opr($nib),
        'pemegang_saham_perubahan' => array(),

        'pjbu' => $this->Bu_model->pjbu_opr($nib),
        'pjbu_perubahan' => $this->Bu_model->pjbu_opr_izin_survailen($nib),

        'pjskbu' => $this->Bu_model->pjskbu_opr($nib),
        'pjskbu_perubahan' => $this->Bu_model->pjskbu_opr_izin_survailen($nib),

        'pjtbu' => $this->Bu_model->pjtbu_opr($nib),
        'pjtbu_perubahan' => $this->Bu_model->pjtbu_opr_izin_survailen($nib),

        'peralatan' => $this->Bu_model->peralatan_opr($nib),
        'peralatan_perubahan' => $this->Bu_model->peralatan_opr_izin_survailen($nib),

        'kepemilikan_peralatan' => $this->Bu_model->kepemilikan_peralatan_opr($nib),
        'data_check' => $data,
        'klasifikasi' => $this->Bu_model->klasifikasi_kualifikasi_opr2_terbit($nib),
        'id1' => $id1,
        'penilaian' => $this->Bu_model->get_penilaian_survailen_tinjauan($nib),

      );
      $this->template->load('menu/menu', 'survailen/tinjau_permohonan', $this->data);
    } else {
      $this->session->set_flashdata('title', 'Warning');
      $this->session->set_flashdata('text', 'Anda tidak memiliki akses');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
  }
  function tinjau_permohonan_perbaikan($id1)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    } elseif ($this->ion_auth->admin_pusat() or $this->ion_auth->pelaksana() or $this->ion_auth->pelaksana()) {

      $nib = decrypt_url($id1);
      //$data = $this->check_pjt_pjsk($id1, $id2);
      $this->data = array(
        'biodata' => $this->Bu_model->biodata_opr($nib),
        'biodata_perubahan' => $this->Bu_model->biodata_opr_izin_survailen($nib),
        'pengurus' => $this->Bu_model->pengurus_opr($nib),
        'pengurus_perubahan' => array(),
        'penjualan_tahunan' => $this->Bu_model->pengalaman_opr($nib),
        'penjualan_tahunan_perubahan' => $this->Bu_model->pengalaman_opr_izin_survailen($nib),
        'akte' => $this->Bu_model->akte_opr($nib),
        'akte_perubahan' => $this->Bu_model->akte_opr_izin_survailen($nib),
        'smap' => $this->Bu_model->smap_opr($nib),
        'smap_perubahan' => $this->Bu_model->smap_opr_izin_survailen($nib),
        'neraca' => $this->Bu_model->neraca_ski($nib),
        'neraca_perubahan' => $this->Bu_model->neraca_ski_izin_survailen($nib),

        'pemegang_saham' => $this->Bu_model->pemegang_saham_opr($nib),
        'pemegang_saham_perubahan' => array(),

        'pjbu' => $this->Bu_model->pjbu_opr($nib),
        'pjbu_perubahan' => $this->Bu_model->pjbu_opr_izin_survailen($nib),

        'pjskbu' => $this->Bu_model->pjskbu_opr($nib),
        'pjskbu_perubahan' => $this->Bu_model->pjskbu_opr_izin_survailen($nib),

        'pjtbu' => $this->Bu_model->pjtbu_opr($nib),
        'pjtbu_perubahan' => $this->Bu_model->pjtbu_opr_izin_survailen($nib),

        'peralatan' => $this->Bu_model->peralatan_opr($nib),
        'peralatan_perubahan' => $this->Bu_model->peralatan_opr_izin_survailen($nib),

        'kepemilikan_peralatan' => $this->Bu_model->kepemilikan_peralatan_opr($nib),
        'data_check' => $data,
        'klasifikasi' => $this->Bu_model->klasifikasi_kualifikasi_opr2_terbit($nib),
        'id1' => $id1,
        'penilaian' => $this->Bu_model->get_penilaian_survailen_tinjauan($nib),

      );
      $this->template->load('menu/menu', 'survailen/tinjau_permohonan_perbaikan', $this->data);
    } else {
      $this->session->set_flashdata('title', 'Warning');
      $this->session->set_flashdata('text', 'Anda tidak memiliki akses');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
  }
  function list_tinjauan_permohonan_verifikator()
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    } elseif ($this->ion_auth->admin_pusat() or $this->ion_auth->pelaksana() or $this->ion_auth->pelaksana()) {
      $data = $this->Bu_model->list_verifikasi_survailen_verifikator();
      $data2 = $this->Bu_model->list_verifikasi_survailen_verifikator_perbaikan();
      $record = array();
      foreach ($data as $row) {

        $biaya_count = substr_count($row['concat_klasifikasi'], "PB");
        $biaya_kurang = (5302.5 * $biaya_count);
        $biaya_new = $row['biaya_lsbu'] - $biaya_kurang;

        //==========
        $str = $row['concat_sub'];
        $pattern = "/(PL003|PL005|PL006|PL007|PL008)/i";
        if (preg_match_all($pattern, $str, $matches)) {
          $biaya_count2 = count($matches[0]);
          $biaya_kurang2 = (5302.5 * $biaya_count2);
          $biaya_new2 = $biaya_new - $biaya_kurang2;
        } else {
          $biaya_new2 = $biaya_new;
        }



        $count = "1";

        $date = strtotime(date('Y-m-d'));
        $date2 = strtotime($row['status_0'] . "+1 days");

        $yourdatetime = date('H:i:s');
        $timestamp = strtotime($yourdatetime);
        $jam = date('H', $timestamp);

        if ($row['pilihan'] == '1') {
          $count = "2";
        }

        $data_asesor = $this->Bu_model->get_asesor_survailen_tinjauan($row['NIB']);

        $datax = array(
          'asesor1' => $data_asesor[0]['Nama'],
          'asesor2' => $data_asesor[1]['Nama'],
          'asesor3' => $data_asesor[2]['Nama'],

          'pilihan' => '1',
          'file_pembayaran' => $row['file_pembayaran'],
          'nama_propinsi' => $row['nama_propinsi'],
          'nama_asosiasi' => $row['nama_asosiasi'],
          'biaya_lsbu' => $biaya_new2,
          'status_0' => $row['status_0'],
          'concat_sub' => $row['concat_sub'],
          'concat_klasifikasi' => $row['concat_klasifikasi'],
          'concat_kualifikasi' => $row['concat_kualifikasi'],
          'nama' => $row['nama'],
          'NIB' => $row['NIB'],
          'tgl_permohonan' => $row['tgl_permohonan'],
          'propinsi' => $row['concat_sub'],
          'tahun' => $row['tahun'],
          'status_1' => $row['status_1'],
          'status_2' => $row['status_2'],
          'status_3' => $row['status_3'],
          'stat' => $status,
          'count' => $count,
        );
        array_push($record, $datax);
      }
      foreach ($data2 as $row) {

        $biaya_count = substr_count($row['concat_klasifikasi'], "PB");
        $biaya_kurang = (5302.5 * $biaya_count);
        $biaya_new = $row['biaya_lsbu'] - $biaya_kurang;

        //==========
        $str = $row['concat_sub'];
        $pattern = "/(PL003|PL005|PL006|PL007|PL008)/i";
        if (preg_match_all($pattern, $str, $matches)) {
          $biaya_count2 = count($matches[0]);
          $biaya_kurang2 = (5302.5 * $biaya_count2);
          $biaya_new2 = $biaya_new - $biaya_kurang2;
        } else {
          $biaya_new2 = $biaya_new;
        }



        $count = "1";

        $date = strtotime(date('Y-m-d'));
        $date2 = strtotime($row['status_0'] . "+1 days");

        $yourdatetime = date('H:i:s');
        $timestamp = strtotime($yourdatetime);
        $jam = date('H', $timestamp);

        if ($row['pilihan'] == '1') {
          $count = "2";
        }

        $data_asesor = $this->Bu_model->get_asesor_survailen_tinjauan($row['NIB']);

        $datax = array(
          'asesor1' => $data_asesor[0]['Nama'],
          'asesor2' => $data_asesor[1]['Nama'],
          'asesor3' => $data_asesor[2]['Nama'],

          'pilihan' => '2',
          'file_pembayaran' => $row['file_pembayaran'],
          'nama_propinsi' => $row['nama_propinsi'],
          'nama_asosiasi' => $row['nama_asosiasi'],
          'biaya_lsbu' => $biaya_new2,
          'status_0' => $row['status_0'],
          'concat_sub' => $row['concat_sub'],
          'concat_klasifikasi' => $row['concat_klasifikasi'],
          'concat_kualifikasi' => $row['concat_kualifikasi'],
          'nama' => $row['nama'],
          'NIB' => $row['NIB'],
          'tgl_permohonan' => $row['tgl_permohonan'],
          'propinsi' => $row['concat_sub'],
          'tahun' => $row['tahun'],
          'status_1' => $row['status_1'],
          'status_2' => $row['status_2'],
          'status_3' => $row['status_3'],
          'stat' => $status,
          'count' => $count,
        );
        array_push($record, $datax);
      }
      $this->data = array(
        'record' => $record,
        'propinsi' => $this->Bu_model->provinsi(),


      );
      $this->template->load('menu/menu', 'survailen/list_tinjauan_permohonan_verifikator', $this->data);
    } else {
      $this->session->set_flashdata('title', 'Warning');
      $this->session->set_flashdata('text', 'Anda tidak memiliki akses');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
  }
  function list_evaluator_tinjauan()
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    } elseif ($this->ion_auth->admin_pusat() or $this->ion_auth->pelaksana() or $this->ion_auth->pelaksana()) {
      $data = $this->Bu_model->list_evaluator_survailen();
      $record = array();
      foreach ($data as $row) {

        $biaya_count = substr_count($row['concat_klasifikasi'], "PB");
        $biaya_kurang = (5302.5 * $biaya_count);
        $biaya_new = $row['biaya_lsbu'] - $biaya_kurang;

        //==========
        $str = $row['concat_sub'];
        $pattern = "/(PL003|PL005|PL006|PL007|PL008)/i";
        if (preg_match_all($pattern, $str, $matches)) {
          $biaya_count2 = count($matches[0]);
          $biaya_kurang2 = (5302.5 * $biaya_count2);
          $biaya_new2 = $biaya_new - $biaya_kurang2;
        } else {
          $biaya_new2 = $biaya_new;
        }



        $count = "1";

        $date = strtotime(date('Y-m-d'));
        $date2 = strtotime($row['status_0'] . "+1 days");

        $yourdatetime = date('H:i:s');
        $timestamp = strtotime($yourdatetime);
        $jam = date('H', $timestamp);

        if ($row['pilihan'] == '1') {
          $count = "2";
        }

        $data_asesor = $this->Bu_model->get_asesor_survailen_tinjauan($row['NIB']);

        $datax = array(
          'asesor1' => $data_asesor[0]['Nama'],
          'asesor2' => $data_asesor[1]['Nama'],
          'asesor3' => $data_asesor[2]['Nama'],

          'pilihan' => $row['hasil_akhir'],
          'file_pembayaran' => $row['file_pembayaran'],
          'nama_propinsi' => $row['nama_propinsi'],
          'nama_asosiasi' => $row['nama_asosiasi'],
          'biaya_lsbu' => $biaya_new2,

          'concat_sub' => $row['concat_sub'],
          'concat_klasifikasi' => $row['concat_klasifikasi'],
          'concat_kualifikasi' => $row['concat_kualifikasi'],
          'nama' => $row['nama'],
          'NIB' => $row['NIB'],
          'tgl_permohonan' => $row['tgl_permohonan'],
          'propinsi' => $row['concat_sub'],

          'stat' => $status,
          'count' => $count,
        );
        array_push($record, $datax);
      }
      $this->data = array(
        'record' => $record,
        'propinsi' => $this->Bu_model->provinsi(),


      );
      $this->template->load('menu/menu', 'survailen/list_tinjauan_evaluator', $this->data);
    } else {
      $this->session->set_flashdata('title', 'Warning');
      $this->session->set_flashdata('text', 'Anda tidak memiliki akses');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
  }
  function list_tinjauan_permohonan()
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    } elseif ($this->ion_auth->admin_pusat() or $this->ion_auth->pelaksana()) {
      // $data = $this->Bu_model->list_verifikasi_survailen();
      $record = array();
      // foreach ($data as $row) {

      //   $biaya_count = substr_count($row['concat_klasifikasi'], "PB");
      //   $biaya_kurang = (5302.5 * $biaya_count);
      //   $biaya_new = $row['biaya_lsbu'] - $biaya_kurang;

      //   //==========
      //   $str = $row['concat_sub'];
      //   $pattern = "/(PL003|PL005|PL006|PL007|PL008)/i";
      //   if (preg_match_all($pattern, $str, $matches)) {
      //     $biaya_count2 = count($matches[0]);
      //     $biaya_kurang2 = (5302.5 * $biaya_count2);
      //     $biaya_new2 = $biaya_new - $biaya_kurang2;
      //   } else {
      //     $biaya_new2 = $biaya_new;
      //   }



      //   $count = "1";

      //     $date = strtotime(date('Y-m-d'));
      //     $date2 = strtotime($row['status_0'] . "+1 days");

      //     $yourdatetime = date('H:i:s');
      //     $timestamp = strtotime($yourdatetime);
      //     $jam = date('H', $timestamp);

      //     if ($row['pilihan'] == '1') {
      //       $count = "2";
      //     }


      //     $datax = array(
      //       'pilihan' => $row['pilihan'],
      //       'file_pembayaran' => $row['file_pembayaran'],
      //       'nama_propinsi' => $row['nama_propinsi'],
      //       'nama_asosiasi' => $row['nama_asosiasi'],
      //       'biaya_lsbu' => $biaya_new2,
      //       'status_0' => $row['status_0'],
      //       'concat_sub' => $row['concat_sub'],
      //       'concat_klasifikasi' => $row['concat_klasifikasi'],
      //       'concat_kualifikasi' => $row['concat_kualifikasi'],
      //       'nama' => $row['nama'],
      //       'NIB' => $row['NIB'],
      //       'tgl_permohonan' => $row['tgl_permohonan'],
      //       'propinsi' => $row['concat_sub'],
      //       'tahun' => $row['tahun'],
      //       'status_1' => $row['status_1'],
      //       'status_2' => $row['status_2'],
      //       'status_3' => $row['status_3'],
      //       'stat' => $status,
      //       'count' => $count
      //     );
      //     array_push($record, $datax);

      // }
      $this->data = array(
        'record' => $record,
        'propinsi' => $this->Bu_model->provinsi(),


      );
      $this->template->load('menu/menu', 'survailen/list_tinjauan_permohonan', $this->data);
    } else {
      $this->session->set_flashdata('title', 'Warning');
      $this->session->set_flashdata('text', 'Anda tidak memiliki akses');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
  }
  function get_search()
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
    $post = $this->input->post();
    $tgl_1 = $this->security->xss_clean(trim($post['tgl_1']));
    $tgl_2 = $this->security->xss_clean(trim($post['tgl_2']));
    $propinsi = $this->security->xss_clean(trim($post['propinsi']));

    $kualifikasi = $this->security->xss_clean(trim($post['kualifikasi']));
    $asosiasi = $this->security->xss_clean(trim($post['asosiasi']));
    $limit = $this->security->xss_clean(trim($post['limit']));
    $data = $this->Bu_model->list_verifikasi_survailen($tgl_1, $tgl_2, $propinsi, $kualifikasi, $asosiasi, $limit);
    // $data=$this->Bu_model->list_verifikasi_survailen();
    $record = array();
    foreach ($data as $row) {

      $biaya_count = substr_count($row['concat_klasifikasi'], "PB");
      $biaya_kurang = (5302.5 * $biaya_count);
      $biaya_new = $row['biaya_lsbu'] - $biaya_kurang;

      //==========
      $str = $row['concat_sub'];
      $pattern = "/(PL003|PL005|PL006|PL007|PL008)/i";
      if (preg_match_all($pattern, $str, $matches)) {
        $biaya_count2 = count($matches[0]);
        $biaya_kurang2 = (5302.5 * $biaya_count2);
        $biaya_new2 = $biaya_new - $biaya_kurang2;
      } else {
        $biaya_new2 = $biaya_new;
      }



      $count = "1";

      $date = strtotime(date('Y-m-d'));
      $date2 = strtotime($row['status_0'] . "+1 days");

      $yourdatetime = date('H:i:s');
      $timestamp = strtotime($yourdatetime);
      $jam = date('H', $timestamp);

      if ($row['pilihan'] == '1') {
        $count = "2";
      }
      $data_asesor = $this->Bu_model->get_asesor_survailen_tinjauan($row['NIB']);


      $datax = array(
        'asesor1' => $data_asesor[0]['Nama'],
        'asesor2' => $data_asesor[1]['Nama'],
        'asesor3' => $data_asesor[2]['Nama'],

        'pilihan' => $row['pilihan'],
        'file_pembayaran' => $row['file_pembayaran'],
        'nama_propinsi' => $row['nama_propinsi'],
        'nama_asosiasi' => $row['nama_asosiasi'],
        'biaya_lsbu' => $biaya_new2,
        'status_0' => $row['status_0'],
        'concat_sub' => $row['concat_sub'],
        'concat_klasifikasi' => $row['concat_klasifikasi'],
        'concat_kualifikasi' => $row['concat_kualifikasi'],
        'nama' => $row['nama'],
        'NIB' => $row['NIB'],
        'tgl_permohonan' => $row['tgl_permohonan'],
        'propinsi' => $row['concat_sub'],
        'tahun' => $row['tahun'],
        'status_1' => $row['status_1'],
        'status_2' => $row['status_2'],
        'status_3' => $row['status_3'],
        'stat' => $status,
        'count' => $count,
        'nib_dec' => base_url("survailen/tinjau_permohonan/" . encrypt_url($row['NIB']))
      );
      array_push($record, $datax);
    }
    $data_record = array(
      'record' => $record,
      'data' => $data,
      'tgl1' => $tgl_1,
      'propinsi' => $propinsi,
      'kualifikasi' => $kualifikasi,
      'asosiasi' => $asosiasi,
      'limit' => $limit

    );
    echo json_encode($data_record);
  }
  function update_perbaikan()
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
    $post = $this->input->post();
    $id_izin = $this->security->xss_clean(trim($post['id_izin']));

    $comment = $this->security->xss_clean(trim($post['comment']));

    $recs = $this->Bu_model->get_email($id_izin);
    $email = $recs[0]['user_email'];
    $subject = "SURVAILEN LSBU GAPEKNAS";
    $pre_header = "Data perlu diperbaiki";
    $this->send($email, $subject, $comment, $pre_header);

    $data = array(
      'tgl_penilaian' => date("Y-m-d"),
      'user_penilaian' => $this->session->userdata('id_user'),
      'keputusan' => '0',
      'comment' => $comment,
    );
    $table = "lsbu_survailen_permohonan";
    $where = array(
      'id_izin' => $id_izin
    );
    $this->Bu_model->update_edit($where, $table, $data);
    $response = array(
      'result' => 1
    );

    echo json_encode($response);
  }
  function send($tujuan, $subject, $isi_email, $pre_header)
  {
    $this->load->config('email');
    $this->load->library('email');
    $from = $this->config->item('smtp_user');
    $message = $this->notif_email($isi_email, $pre_header);
    $this->email->from('info@lsbugapeknas.com', 'LSBU GAPEKNAS');
    $this->email->set_newline("\r\n");
    $this->email->to($tujuan);
    $this->email->cc("mail.lsbugapeknas@gmail.com, ccgapeknas@gmail.com");
    $this->email->subject($subject);
    $this->email->message($message);

    if ($this->email->send()) {
      return "Success";
    } else {
      return "Failed";
    }
    //$this->load->view('template_email');
  }
  function insert_penunjukan_tinjauan()
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $id_user = $this->session->userdata('id_user');
    $post = $this->input->post();
    $asesor1 = $this->security->xss_clean(trim($post['asesor1']));
    $asesor2 = $this->security->xss_clean(trim($post['asesor2']));
    $asesor3 = $this->security->xss_clean(trim($post['asesor3']));

    $nib = $this->security->xss_clean(trim($post['nib']));
    $tgl_pelaksanaan = $this->security->xss_clean(trim($post['tgl_pelaksanaan']));
    $array = explode(',', $nib);
    // $sessionarray = array(
    //   'id_izin' => $id_izin,

    // );
    // $this->session->set_userdata($sessionarray);

    for ($i = 0; $i < count($array); $i++) {
      $select2 = "SELECT no_urut FROM lsbu_survailen_penunjukan_tinjauan ORDER BY LENGTH(no_urut) DESC, no_urut DESC LIMIT 1";
      $where2 = "";
      $record2 = $this->Bu_model->searching($select2, $where2);
      $nomer_urut = $record2[0]['no_urut'] + 1;
      $table = "lsbu_survailen_penunjukan_tinjauan";
      if ($asesor1 != '') {
        $data = array(
          'no_urut' => $nomer_urut,
          'NIB' => $array[$i],
          'id_asesor' => $asesor1,
          'surat_tugas' => $tgl_pelaksanaan
        );
        $this->Bu_model->insert_sad($table, $data);
      }
      if ($asesor2 != '') {
        $data = array(
          'no_urut' => $nomer_urut,
          'NIB' => $array[$i],
          'id_asesor' => $asesor2,
          'surat_tugas' => $tgl_pelaksanaan
        );
        $this->Bu_model->insert_sad($table, $data);
      }
      if ($asesor3 != '') {

        $data = array(
          'no_urut' => $nomer_urut,
          'NIB' => $array[$i],
          'id_asesor' => $asesor3,
          'surat_tugas' => $tgl_pelaksanaan
        );
        $this->Bu_model->insert_sad($table, $data);
      }
    }

    $response = array(
      'asesor1' => $asesor1,
      'asesor2' => $asesor2,
      'asesor3' => $asesor3,
      'nib' => $nib
    );

    echo json_encode($response);
  }
  function insert_penunjukan_tinjauan_perbaikan()
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $id_user = $this->session->userdata('id_user');
    $post = $this->input->post();
    $asesor1 = $this->security->xss_clean(trim($post['asesor1']));
    $asesor2 = $this->security->xss_clean(trim($post['asesor2']));
    $asesor3 = $this->security->xss_clean(trim($post['asesor3']));

    $nib = $this->security->xss_clean(trim($post['nib']));
    $array = explode(',', $nib);
    // $sessionarray = array(
    //   'id_izin' => $id_izin,

    // );
    // $this->session->set_userdata($sessionarray);

    for ($i = 0; $i < count($array); $i++) {
      $select2 = "SELECT no_urut FROM lsbu_survailen_penunjukan_tinjauan_perbaikan ORDER BY LENGTH(no_urut) DESC, no_urut DESC LIMIT 1";
      $where2 = "";
      $record2 = $this->Bu_model->searching($select2, $where2);
      $nomer_urut = $record2[0]['no_urut'] + 1;
      $table = "lsbu_survailen_penunjukan_tinjauan_perbaikan";
      if ($asesor1 != '') {
        $data = array(
          'no_urut' => $nomer_urut,
          'NIB' => $array[$i],
          'id_asesor' => $asesor1,
        );
        $this->Bu_model->insert_sad($table, $data);
      }
      if ($asesor2 != '') {
        $data = array(
          'no_urut' => $nomer_urut,
          'NIB' => $array[$i],
          'id_asesor' => $asesor2,
        );
        $this->Bu_model->insert_sad($table, $data);
      }
      if ($asesor3 != '') {

        $data = array(
          'no_urut' => $nomer_urut,
          'NIB' => $array[$i],
          'id_asesor' => $asesor3,
        );
        $this->Bu_model->insert_sad($table, $data);
      }
    }

    $response = array(
      'asesor1' => $asesor1,
      'asesor2' => $asesor2,
      'asesor3' => $asesor3,
      'nib' => $nib
    );

    echo json_encode($response);
  }
  function insert_penunjukan()
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $id_user = $this->session->userdata('id_user');
    $post = $this->input->post();
    $asesor1 = $this->security->xss_clean(trim($post['asesor1']));
    $asesor2 = $this->security->xss_clean(trim($post['asesor2']));
    $asesor3 = $this->security->xss_clean(trim($post['asesor3']));

    $nib = $this->security->xss_clean(trim($post['nib']));
    $id_izin = $this->security->xss_clean(trim($post['id_izin']));
    $sessionarray = array(
      'id_izin' => $id_izin,

    );
    $this->session->set_userdata($sessionarray);
    $table = "lsbu_survailen_permohonan";
    $data = array(
      'tgl_penunjukan' => date("Y-m-d"),
      'user_penunjukan' => $id_user,
      'asesor_1' => $asesor1,
      'asesor_2' => $asesor2,
      'asesor_3' => $asesor3,
    );
    $where = array(
      'id_izin' => $id_izin
    );
    $this->Bu_model->update_edit($where, $table, $data);
    $table = "lsbu_survailen_penunjukan";
    if ($asesor1 != '') {
      $data = array(
        'id_izin' => $id_izin,
        'id_asesor' => $asesor1,
      );
      $record = $this->Bu_model->insert_sad($table, $data);
    }
    if ($asesor2 != '') {
      $data = array(
        'id_izin' => $id_izin,
        'id_asesor' => $asesor2,
      );
      $record = $this->Bu_model->insert_sad($table, $data);
    }
    if ($asesor3 != '') {
      $data = array(
        'id_izin' => $id_izin,
        'id_asesor' => $asesor3,
      );
      $record = $this->Bu_model->insert_sad($table, $data);
    }
    $response = array(
      'asesor1' => $asesor1,
      'asesor2' => $asesor2,
      'asesor3' => $asesor3,
      'id_izin' => $id_izin
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
    $tgl_permohonan = $this->security->xss_clean(trim($post['tgl_permohonan']));
    $record = array();
    $sessionarray = array(
      'id_izin' => $nib,

    );
    $this->session->set_userdata($sessionarray);
    $rec = $this->Bu_model->get_kualifikasi_bu($nib, $tgl_permohonan);
    if ($rec[0]['2_asesor'] != '') {
      $data = array(
        'kualifikasi' => $rec[0]['2_asesor'],
        'value' => '2'
      );
      array_push($record, $data);
    }
    if ($rec[0]['1_asesor'] != '') {
      $dataz = array(
        'kualifikasi' => $rec[0]['1_asesor'],
        'value' => '1'
      );
      array_push($record, $dataz);
    }

    $response = array(
      'record' => $record,
    );

    echo json_encode($response);
  }
  function submit_permohonan()
  {
    if (!$this->ion_auth->ceklogin2_survailen()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
    $post = $this->input->post();
    $id_izin = $this->security->xss_clean(trim($post['id_izin']));
    $nib = $this->security->xss_clean(trim($post['nib']));
    $select2 = "SELECT no_urut FROM lsbu_survailen_permohonan ORDER BY LENGTH(no_urut) DESC, no_urut DESC LIMIT 1";
    $where2 = "";
    $record2 = $this->Bu_model->searching($select2, $where2);
    $nomer_urut = $record2[0]['no_urut'] + 1;
    $permohonanx = $this->Bu_model->get_permohonan_survailen($id_izin);
    if (empty($permohonanx)) {
      $data = array(
        'id_izin' => $id_izin,
        'tgl_permohonan' => date("Y-m-d"),
        'no_urut' => $nomer_urut
      );
      $this->Bu_model->insert_survailen($id_izin, $nomer_urut);
    } else {
      $data = array(
        'tgl_penunjukan' => '0000-00-00',
        'user_penunjukan' => NULL,
        'tgl_penilaian' => '0000-00-00',
        'user_penilaian' => NULL,
        'asesor_1' => NULL,
        'asesor_2' => NULL,
        'asesor_3' => NULL,
        'keputusan' => NULL
      );
      $where = array(
        'id_izin' => $id_izin
      );
      $table = "lsbu_survailen_permohonan";
      $this->Bu_model->update_edit($where, $table, $data);
    }

    $recponses = array(
      'record' => "Success",
    );
    echo json_encode($recponses);
  }
  function insert_administrasi()
  {
    if (!$this->ion_auth->ceklogin2_survailen()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
    $post = $this->input->post();
    $id_izin = $this->security->xss_clean(trim($post['id_izin']));
    $nib = $this->security->xss_clean(trim($post['nibx']));
    $sub_klasifikasi = $this->security->xss_clean(trim($post['sub_klasifikasi']));
    $asosiasi_input = $this->security->xss_clean(trim($post['nama_asosiasi']));

    $id1 = encrypt_url($nib);
    $id2 = encrypt_url($sub_klasifikasi);

    $table_upload = 'survailen_bu';
    $upload = NULL;
    $uploadx = NULL;
    $uploadxc = NULL;
    if ($_FILES['file_ss']['name']) {
      $this->load->library('upload');
      $id_user = $this->session->userdata('id_user');
      $nmfile = date("Y-m-d") . md5($id_user . date("h:i:sa"));
      $config['upload_path'] = './assets/bukti/badan_usaha/10_kta_asosiasi';
      $config['allowed_types'] = 'pdf|jpg|jpeg|png';
      $config['overwrite'] = TRUE;
      $config['file_name'] = $nmfile;
      $this->upload->initialize($config);
      if ($this->upload->do_upload('file_ss')) {
        $gbr = $this->upload->data();
        $filename = $gbr['file_name'];
        $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
        $alamat = "./assets/bukti/badan_usaha/10_kta_asosiasi/";

        $upload = $gbr['file_name'];
      }
    }
    if ($_FILES['file_kantor']['name']) {
      $this->load->library('upload');
      $id_user = $this->session->userdata('id_user');
      $nmfile = date("Y-m-d") . md5($id_user . date("h:i:sa"));
      $configx['upload_path'] = './assets/bukti/badan_usaha/11_surat_keterangan_domisili';
      $configx['allowed_types'] = 'pdf|jpg|jpeg|png';
      $configx['overwrite'] = TRUE;
      $configx['file_name'] = $nmfile;
      $this->upload->initialize($configx);
      if ($this->upload->do_upload('file_kantor')) {
        $gbr = $this->upload->data();
        $filename = $gbr['file_name'];
        $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
        $alamat = "./assets/bukti/badan_usaha/11_surat_keterangan_domisili";

        $uploadx = $gbr['file_name'];
      }
    }
    if ($_FILES['file_asosiasi']['name']) {
      $this->load->library('upload');
      $id_user = $this->session->userdata('id_user');
      $nmfile = date("Y-m-d") . md5($id_user . date("h:i:sa"));
      $configx['upload_path'] = './assets/bukti/badan_usaha/9_npwp_perusahaan';
      $configx['allowed_types'] = 'pdf|jpg|jpeg|png';
      $configx['overwrite'] = TRUE;
      $configx['file_name'] = $nmfile;
      $this->upload->initialize($configx);
      if ($this->upload->do_upload('file_asosiasi')) {
        $gbr = $this->upload->data();
        $filename = $gbr['file_name'];
        $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
        $alamat = "./assets/bukti/badan_usaha/9_npwp_perusahaan";

        $uploadxc = $gbr['file_name'];
      }
    }
    if (!empty($upload)) {

      $gedung = $this->security->xss_clean(trim($post['gedung']));
      $select_smap = "REPLACE INTO survailen_bu(
      NIB,
      id_izin,
      file_ss,
      gedung,
      file_gedung,
      file_asosiasi,
      asosiasi)
      VALUES(
        '$nib',
        '$id_izin',
        '$upload',
        '$gedung',
        '$uploadx',
        '$uploadxc',
        '$asosiasi_input'
      )";
      $where = "";
      $this->Bu_model->delete_opr($select_smap, $where);

      $this->session->set_flashdata('title', 'Success');
      $this->session->set_flashdata('text', 'Administrasi Berhasil Diinput');
      $this->session->set_flashdata('class', "success");
      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('result' => 1)));
      redirect('survailen/proses/' . $id1 . "/" . $id2, 'refresh');
    } else {
      $this->session->set_flashdata('title', 'Failed');
      $this->session->set_flashdata('text', 'File Gagal Di Upload');
      $this->session->set_flashdata('class', "error");
      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('result' => 1)));
      redirect('survailen/proses/' . $id1 . "/" . $id2, 'refresh');
    }
  }
  function insert_akte()
  {
    if (!$this->ion_auth->ceklogin2_survailen()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
    $post = $this->input->post();
    $id_izin = $this->security->xss_clean(trim($post['id_izin']));


    $nib = $this->security->xss_clean(trim($post['nibx']));
    $sub_klasifikasi = $this->security->xss_clean(trim($post['sub_klasifikasi']));
    $id1 = encrypt_url($nib);
    $id2 = encrypt_url($sub_klasifikasi);

    $table_upload = 'survailen_akte';
    $upload = NULL;
    $uploadx = NULL;


    if ($_FILES['file_akte']['name']) {
      $this->load->library('upload');
      $id_user = $this->session->userdata('id_user');
      $nmfile = date("Y-m-d") . md5($id_user . date("h:i:sa"));
      $config['upload_path'] = './assets/bukti/badan_usaha/13_izin_bagi_penanam_modal';
      $config['allowed_types'] = 'pdf|jpg|jpeg|png';
      $config['overwrite'] = TRUE;
      $config['file_name'] = $nmfile;
      $this->upload->initialize($config);
      if ($this->upload->do_upload('file_akte')) {
        $gbr = $this->upload->data();
        $filename = $gbr['file_name'];
        $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
        $alamat = "./assets/bukti/badan_usaha/13_izin_bagi_penanam_modal/";

        $upload = $gbr['file_name'];
      }
    }
    if (!empty($upload)) {

      $no_akte = $this->security->xss_clean(trim($post['no_akte']));
      $tgl_akte = $this->security->xss_clean(trim($post['tgl_akte']));
      $nama_notaris = $this->security->xss_clean(trim($post['nama_notaris']));
      $no_pengesahan = $this->security->xss_clean(trim($post['no_pengesahan']));
      $modal_dasar = $this->security->xss_clean(trim($post['modal_dasar']));
      $modal_disetor = $this->security->xss_clean(trim($post['modal_disetor']));

      $select_smap = "REPLACE INTO survailen_akte(
      id_izin,
      no_akte,
      tgl_akte,
      nama_notaris,
      no_pengesahan_kumham,
      modal_dasar,
      modal_disetor,
      file_akte)
      VALUES(
        '$id_izin',
        '$no_akte',
        '$tgl_akte',
        '$nama_notaris',
        '$no_pengesahan',
        '$modal_dasar',
        '$modal_disetor',
        '$upload'
      )";
      $where = "";
      $this->Bu_model->delete_opr($select_smap, $where);

      $this->session->set_flashdata('title', 'Success');
      $this->session->set_flashdata('text', 'Akte Berhasil Diinput');
      $this->session->set_flashdata('class', "success");
      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('result' => 1)));
      redirect('survailen/proses/' . $id1 . "/" . $id2, 'refresh');
    } else {
      $this->session->set_flashdata('title', 'Failed');
      $this->session->set_flashdata('text', 'File Gagal Di Upload');
      $this->session->set_flashdata('class', "error");
      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('result' => 1)));
      redirect('survailen/proses/' . $id1 . "/" . $id2, 'refresh');
    }
  }
  function insert_peralatan()
  {
    if (!$this->ion_auth->ceklogin2_survailen()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
    $post = $this->input->post();
    $id_izin = $this->security->xss_clean(trim($post['id_izin']));


    $nib = $this->security->xss_clean(trim($post['nibx']));
    $sub_klasifikasi = $this->security->xss_clean(trim($post['sub_klasifikasi']));
    $id1 = encrypt_url($nib);
    $id2 = encrypt_url($sub_klasifikasi);



    $nama_peralatan = $this->security->xss_clean(trim($post['nama_peralatan']));
    $noreg_simpk = $this->security->xss_clean(trim($post['noreg_simpk']));
    $milik_sendiri = $this->security->xss_clean(trim($post['milik_sendiri']));

    $select_smap = "REPLACE INTO survailen_peralatan(
      id_izin,
      nama_peralatan,
      noreg_peralatan,
      kepemilikan)
      VALUES(
        '$id_izin',
        '$nama_peralatan',
        '$noreg_simpk',
        '$milik_sendiri'
      )";
    $where = "";
    $this->Bu_model->delete_opr($select_smap, $where);

    $this->session->set_flashdata('title', 'Success');
    $this->session->set_flashdata('text', 'Peralatan Berhasil Diinput');
    $this->session->set_flashdata('class', "success");
    $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode(array('result' => 1)));
    redirect('survailen/proses/' . $id1 . "/" . $id2, 'refresh');
  }
  function insert_pjtbu()
  {
    if (!$this->ion_auth->ceklogin2_survailen()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
    $post = $this->input->post();
    $id_izin = $this->security->xss_clean(trim($post['id_izin']));


    $nib = $this->security->xss_clean(trim($post['nibx']));
    $sub_klasifikasi = $this->security->xss_clean(trim($post['sub_klasifikasi']));
    $id1 = encrypt_url($nib);
    $id2 = encrypt_url($sub_klasifikasi);

    $table_upload = 'survailen_pjtbu';
    $upload = NULL;
    $uploadx = NULL;

    if ($_FILES['file_skk_pjt']['name']) {
      $this->load->library('upload');
      $id_user = $this->session->userdata('id_user');
      $nmfile = date("Y-m-d") . md5($id_user . date("h:i:sa"));
      $config['upload_path'] = './assets/bukti/badan_usaha/15_npwp_pengurus';
      $config['allowed_types'] = 'pdf|jpg|jpeg|png';
      $config['overwrite'] = TRUE;
      $config['file_name'] = $nmfile;
      $this->upload->initialize($config);
      if ($this->upload->do_upload('file_skk_pjt')) {
        $gbr = $this->upload->data();
        $filename = $gbr['file_name'];
        $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
        $alamat = "./assets/bukti/badan_usaha/15_npwp_pengurus/";

        $upload = $gbr['file_name'];
      }
    }
    if ($_FILES['file_skk_sk']['name']) {
      $this->load->library('upload');
      $id_user = $this->session->userdata('id_user');
      $nmfile = date("Y-m-d") . md5($id_user . date("h:i:sa"));
      $config['upload_path'] = './assets/bukti/badan_usaha/16_riwayat_hidup_pengurus';
      $config['allowed_types'] = 'pdf|jpg|jpeg|png';
      $config['overwrite'] = TRUE;
      $config['file_name'] = $nmfile;
      $this->upload->initialize($config);
      if ($this->upload->do_upload('file_skk_sk')) {
        $gbr = $this->upload->data();
        $filename = $gbr['file_name'];
        $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
        $alamat = "./assets/bukti/badan_usaha/16_riwayat_hidup_pengurus/";

        $uploadx = $gbr['file_name'];
      }
    }
    if (!empty($upload)) {

      $masa_berlaku = $this->security->xss_clean(trim($post['masa_berlaku']));


      $select_smap = "REPLACE INTO survailen_pjtbu(
      id_izin,
      masa_berlaku,
      file_sertifikat,
      file_sk_perubahan)
      VALUES(
        '$id_izin',
        '$masa_berlaku',
        '$upload',
        '$uploadx'
      )";
      $where = "";
      $this->Bu_model->delete_opr($select_smap, $where);

      $this->session->set_flashdata('title', 'Success');
      $this->session->set_flashdata('text', 'PJTBU Berhasil Diinput');
      $this->session->set_flashdata('class', "success");
      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('result' => 1)));
      redirect('survailen/proses/' . $id1 . "/" . $id2, 'refresh');
    } else {
      $this->session->set_flashdata('title', 'Failed');
      $this->session->set_flashdata('text', 'File Gagal Di Upload');
      $this->session->set_flashdata('class', "error");
      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('result' => 1)));
      redirect('survailen/proses/' . $id1 . "/" . $id2, 'refresh');
    }
  }
  function insert_pjskbu()
  {
    if (!$this->ion_auth->ceklogin2_survailen()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
    $post = $this->input->post();
    $id_izin = $this->security->xss_clean(trim($post['id_izin']));


    $nib = $this->security->xss_clean(trim($post['nibx']));
    $sub_klasifikasi = $this->security->xss_clean(trim($post['sub_klasifikasi']));
    $id1 = encrypt_url($nib);
    $id2 = encrypt_url($sub_klasifikasi);

    $table_upload = 'survailen_pjskbu';
    $upload = NULL;
    $uploadx = NULL;

    if ($_FILES['file_skk_pjsk']['name']) {
      $this->load->library('upload');
      $id_user = $this->session->userdata('id_user');
      $nmfile = date("Y-m-d") . md5($id_user . date("h:i:sa"));
      $config['upload_path'] = './assets/bukti/badan_usaha/17_pernyataan_bukan_pns_pengurus';
      $config['allowed_types'] = 'pdf|jpg|jpeg|png';
      $config['overwrite'] = TRUE;
      $config['file_name'] = $nmfile;
      $this->upload->initialize($config);
      if ($this->upload->do_upload('file_skk_pjsk')) {
        $gbr = $this->upload->data();
        $filename = $gbr['file_name'];
        $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
        $alamat = "./assets/bukti/badan_usaha/17_pernyataan_bukan_pns_pengurus/";

        $upload = $gbr['file_name'];
      }
    }
    if ($_FILES['file_skk_sk_pjskbu']['name']) {
      $this->load->library('upload');
      $id_user = $this->session->userdata('id_user');
      $nmfile = date("Y-m-d") . md5($id_user . date("h:i:sa"));
      $config['upload_path'] = './assets/bukti/badan_usaha/18_photo_pjbu_pengurus';
      $config['allowed_types'] = 'pdf|jpg|jpeg|png';
      $config['overwrite'] = TRUE;
      $config['file_name'] = $nmfile;
      $this->upload->initialize($config);
      if ($this->upload->do_upload('file_skk_sk_pjskbu')) {
        $gbr = $this->upload->data();
        $filename = $gbr['file_name'];
        $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
        $alamat = "./assets/bukti/badan_usaha/18_photo_pjbu_pengurus/";

        $uploadx = $gbr['file_name'];
      }
    }
    if (!empty($upload)) {

      $masa_berlaku = $this->security->xss_clean(trim($post['masa_berlaku']));


      $select_smap = "REPLACE INTO survailen_pjskbu(
      id_izin,
      masa_berlaku,
      file_sertifikat,
      file_sk_perubahan)
      VALUES(
        '$id_izin',
        '$masa_berlaku',
        '$upload',
        '$uploadx'
      )";
      $where = "";
      $this->Bu_model->delete_opr($select_smap, $where);

      $this->session->set_flashdata('title', 'Success');
      $this->session->set_flashdata('text', 'PJSKBU Berhasil Diinput');
      $this->session->set_flashdata('class', "success");
      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('result' => 1)));
      redirect('survailen/proses/' . $id1 . "/" . $id2, 'refresh');
    } else {
      $this->session->set_flashdata('title', 'Failed');
      $this->session->set_flashdata('text', 'File Gagal Di Upload');
      $this->session->set_flashdata('class', "error");
      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('result' => 1)));
      redirect('survailen/proses/' . $id1 . "/" . $id2, 'refresh');
    }
  }
  function insert_neraca()
  {
    if (!$this->ion_auth->ceklogin2_survailen()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
    $post = $this->input->post();
    $id_izin = $this->security->xss_clean(trim($post['id_izin']));


    $nib = $this->security->xss_clean(trim($post['nibx']));
    $sub_klasifikasi = $this->security->xss_clean(trim($post['sub_klasifikasi']));
    $id1 = encrypt_url($nib);
    $id2 = encrypt_url($sub_klasifikasi);

    $table_upload = 'survailen_neraca';
    $upload = NULL;
    $uploadx = NULL;

    if ($_FILES['file_neraca']['name']) {
      $this->load->library('upload');
      $id_user = $this->session->userdata('id_user');
      $nmfile = date("Y-m-d") . md5($id_user . date("h:i:sa"));
      $config['upload_path'] = './assets/bukti/badan_usaha/14_ktp_pengurus';
      $config['allowed_types'] = 'pdf|jpg|jpeg|png';
      $config['overwrite'] = TRUE;
      $config['file_name'] = $nmfile;
      $this->upload->initialize($config);
      if ($this->upload->do_upload('file_neraca')) {
        $gbr = $this->upload->data();
        $filename = $gbr['file_name'];
        $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
        $alamat = "./assets/bukti/badan_usaha/14_ktp_pengurus/";

        $upload = $gbr['file_name'];
      }
    }
    if (!empty($upload)) {
      $tahun = $this->security->xss_clean(trim($post['tahun']));
      $ekuitas = $this->security->xss_clean(trim($post['ekuitas']));
      $aset = $this->security->xss_clean(trim($post['aset']));
      $modal_dasar = $this->security->xss_clean(trim($post['modal_dasar']));
      $kewajiban = $this->security->xss_clean(trim($post['kewajiban']));
      $select_smap = "REPLACE INTO survailen_neraca(
      id_izin,
      tahun,
      ekuitas,
      aset,
      modal_dasar,
      kewajiban,
      file_neraca)
      VALUES(
        '$id_izin',
        '$tahun',
        '$ekuitas',
        '$aset',
        '$modal_dasar',
        '$kewajiban',
        '$upload'
      )";
      $where = "";
      $this->Bu_model->delete_opr($select_smap, $where);

      $this->session->set_flashdata('title', 'Success');
      $this->session->set_flashdata('text', 'Neraca Berhasil Diinput');
      $this->session->set_flashdata('class', "success");
      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('result' => 1)));
      redirect('survailen/proses/' . $id1 . "/" . $id2, 'refresh');
    } else {
      $this->session->set_flashdata('title', 'Failed');
      $this->session->set_flashdata('text', 'File Gagal Di Upload');
      $this->session->set_flashdata('class', "error");
      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('result' => 1)));
      redirect('survailen/proses/' . $id1 . "/" . $id2, 'refresh');
    }
  }
  function insert_penjualan_tahunan()
  {
    if (!$this->ion_auth->ceklogin2_survailen()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
    $post = $this->input->post();
    $id_izin = $this->security->xss_clean(trim($post['id_izin']));


    $nib = $this->security->xss_clean(trim($post['nibx']));
    $sub_klasifikasi = $this->security->xss_clean(trim($post['sub_klasifikasi']));
    $id1 = encrypt_url($nib);
    $id2 = encrypt_url($sub_klasifikasi);

    $table_upload = 'survailen_pengalaman';
    $upload = NULL;
    $uploadx = NULL;

    if ($_FILES['file_kontrak']['name']) {
      $this->load->library('upload');
      $id_user = $this->session->userdata('id_user');
      $nmfile = date("Y-m-d") . md5($id_user . date("h:i:sa"));
      $config['upload_path'] = './assets/bukti/badan_usaha/32_pengalaman_bu';
      $config['allowed_types'] = 'pdf|jpg|jpeg|png';
      $config['overwrite'] = TRUE;
      $config['file_name'] = $nmfile;
      $this->upload->initialize($config);
      if ($this->upload->do_upload('file_kontrak')) {
        $gbr = $this->upload->data();
        $filename = $gbr['file_name'];
        $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
        $alamat = "./assets/bukti/badan_usaha/32_pengalaman_bu/";

        $upload = $gbr['file_name'];
      }
    }
    if ($_FILES['file_bast']['name']) {
      $this->load->library('upload');
      $id_user = $this->session->userdata('id_user');
      $nmfile = date("Y-m-d") . md5($id_user . date("h:i:sa"));
      $config['upload_path'] = './assets/bukti/badan_usaha/36_surat_pernyataan_pecah_kontrak';
      $config['allowed_types'] = 'pdf|jpg|jpeg|png';
      $config['overwrite'] = TRUE;
      $config['file_name'] = $nmfile;
      $this->upload->initialize($config);
      if ($this->upload->do_upload('file_bast')) {
        $gbr = $this->upload->data();
        $filename = $gbr['file_name'];
        $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
        $alamat = "./assets/bukti/badan_usaha/36_surat_pernyataan_pecah_kontrak/";

        $uploadx = $gbr['file_name'];
      }
    }
    if (!empty($upload)) {
      $nama_paket = $this->security->xss_clean(trim($post['nama_paket']));
      $no_kontrak = $this->security->xss_clean(trim($post['no_kontrak']));
      $nilai_kontrak = $this->security->xss_clean(trim($post['nilai_kontrak']));
      $lokasi_pekerjaan = $this->security->xss_clean(trim($post['lokasi_pekerjaan']));
      $noreg_simpan = $this->security->xss_clean(trim($post['noreg_simpan']));
      $tgl_mulai = $this->security->xss_clean(trim($post['tgl_mulai']));
      $tgl_selesai = $this->security->xss_clean(trim($post['tgl_selesai']));
      $tgl_bast = $this->security->xss_clean(trim($post['tgl_bast']));
      $select_pengalaman = "REPLACE INTO survailen_pengalaman(
      id_izin,
      nama_paket,
      no_kontrak,
      nilai_kontrak,
      lokasi_pekerjaan,
      noreg_simpan,
      tgl_mulai,
      tgl_selesai,
      tgl_bast,
      foto_kontrak,
      foto_bast)
      VALUES(
        '$id_izin',
        '$nama_paket',
        '$no_kontrak',
        '$nilai_kontrak',
        '$lokasi_pekerjaan',
        '$noreg_simpan',
        '$tgl_mulai',
        '$tgl_selesai',
        '$tgl_bast',
        '$upload',
        '$uploadx'
      )";
      $where = "";
      $this->Bu_model->delete_opr($select_pengalaman, $where);

      $this->session->set_flashdata('title', 'Success');
      $this->session->set_flashdata('text', 'Pengalaman Berhasil Diinput');
      $this->session->set_flashdata('class', "success");
      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('result' => 1)));
      redirect('survailen/proses/' . $id1 . "/" . $id2, 'refresh');
    } else {
      $this->session->set_flashdata('title', 'Failed');
      $this->session->set_flashdata('text', 'File Gagal Di Upload');
      $this->session->set_flashdata('class', "error");
      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('result' => 1)));
      redirect('survailen/proses/' . $id1 . "/" . $id2, 'refresh');
    }
  }
  function insert_smap()
  {
    if (!$this->ion_auth->ceklogin2_survailen()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
    $post = $this->input->post();
    $id_izin = $this->security->xss_clean(trim($post['id_izin']));


    $nib = $this->security->xss_clean(trim($post['nibx']));
    $sub_klasifikasi = $this->security->xss_clean(trim($post['sub_klasifikasi']));
    $id1 = encrypt_url($nib);
    $id2 = encrypt_url($sub_klasifikasi);

    $table_upload = 'survailen_neraca';
    $upload = NULL;
    $uploadx = NULL;

    if ($_FILES['file_smap']['name']) {
      $this->load->library('upload');
      $id_user = $this->session->userdata('id_user');
      $nmfile = date("Y-m-d") . md5($id_user . date("h:i:sa"));
      $config['upload_path'] = './assets/bukti/badan_usaha/1_bukti_berita_acara_verifikasi';
      $config['allowed_types'] = 'pdf|jpg|jpeg|png';
      $config['overwrite'] = TRUE;
      $config['file_name'] = $nmfile;
      $this->upload->initialize($config);
      if ($this->upload->do_upload('file_smap')) {
        $gbr = $this->upload->data();
        $filename = $gbr['file_name'];
        $file_ext = pathinfo($filename, PATHINFO_EXTENSION);
        $alamat = "./assets/bukti/badan_usaha/1_bukti_berita_acara_verifikasi/";

        $upload = $gbr['file_name'];
      }
    }
    if (!empty($upload)) {

      $select_smap = "REPLACE INTO survailen_smap(
      id_izin,
      file_smap)
      VALUES(
        '$id_izin',
        '$upload'
      )";
      $where = "";
      $this->Bu_model->delete_opr($select_smap, $where);

      $this->session->set_flashdata('title', 'Success');
      $this->session->set_flashdata('text', 'SMAP Berhasil Diinput');
      $this->session->set_flashdata('class', "success");
      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('result' => 1)));
      redirect('survailen/proses/' . $id1 . "/" . $id2, 'refresh');
    } else {
      $this->session->set_flashdata('title', 'Failed');
      $this->session->set_flashdata('text', 'File Gagal Di Upload');
      $this->session->set_flashdata('class', "error");
      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('result' => 1)));
      redirect('survailen/proses/' . $id1 . "/" . $id2, 'refresh');
    }
  }
  function pilih_verifikator()
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
      'record' => $this->Bu_model->pilih_verifikator($nama)
    );

    echo json_encode($response);
  }
  function surat_tugas_tinjauan($nib)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
    $this->load->library('pdfgenerator');


    $record = $this->Bu_model->get_penunjukan_survailen_tinjauan($nib);
    $bulan =  date("m", strtotime($record[0]['tgl_penunjukan']));
    $tahun =  date("Y", strtotime($record[0]['tgl_penunjukan']));
    $day =  date("d", strtotime($record[0]['tgl_penunjukan']));
    $bulan_romawi = $this->getBulanrw($bulan);
    $panjang = strlen($rec[0]['no_urut']);
    $jumlah = 5 - $panjang;
    $nol = '';
    for ($i = 0; $i < $jumlah; $i++) {
      $nol = $nol . '0';
    }
    $no_surat = $nol . $record[0]['no_urut'] . "/Survailen-LSBU GI/" . $bulan_romawi . '/' . $tahun;
    $this->data = array(
      'record' => $record,
      'no_surat' => $no_surat,
      'bulan' => $this->getBulan($bulan),
      'tahun' => $tahun,
      'day' => $day,
      'biodata' => $this->Bu_model->biodata_opr($nib)

    );

    $html = $this->load->view('survailen/surat_tugas', $this->data, true);
    $filename = 'report_' . time();
    //print_r($this->data);
    $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
  }
  function surat_tugas()
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    } elseif ($this->ion_auth->admin_pusat() or $this->ion_auth->pelaksana() or $this->ion_auth->koordinator_sertifikasi()) {
      $this->load->library('pdfgenerator');

      $id_izin = $this->session->userdata('id_izin');
      $record = $this->Bu_model->get_penunjukan_survailen($id_izin);
      $bulan =  date("m", strtotime($record[0]['tgl_penunjukan']));
      $tahun =  date("Y", strtotime($record[0]['tgl_penunjukan']));
      $day =  date("d", strtotime($record[0]['tgl_penunjukan']));
      $bulan_romawi = $this->getBulanrw($bulan);
      $panjang = strlen($rec[0]['no_urut']);
      $jumlah = 5 - $panjang;
      $nol = '';
      for ($i = 0; $i < $jumlah; $i++) {
        $nol = $nol . '0';
      }
      $no_surat = $nol . $record[0]['no_urut'] . "/Survailen-LSBU GI/" . $bulan_romawi . '/' . $tahun;
      $this->data = array(
        'record' => $record,
        'no_surat' => $no_surat,
        'bulan' => $this->getBulan($bulan),
        'tahun' => $tahun,
        'day' => $day,
        'biodata' => $this->Bu_model->biodata_opr_sur($id_izin)

      );

      $html = $this->load->view('survailen/surat_tugas', $this->data, true);
      $filename = 'report_' . time();
      //print_r($this->data);
      $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
    } else {
      $this->session->set_flashdata('title', 'Warning');
      $this->session->set_flashdata('text', 'Anda tidak memiliki akses');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
  }
  function list_penunjukan_asesor()
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    } elseif ($this->ion_auth->admin_pusat() or $this->ion_auth->pelaksana() or $this->ion_auth->koordinator_sertifikasi()) {


      $record = $this->Bu_model->list_survailen_asesor();
      $datax = array();
      foreach ($record as $row) {
        $data_asesor = $this->Bu_model->get_asesor_survailen2($row['id_izin']);
        $date = date("Y-m-d");
        $x = new DateTime(substr($row['tgl_permohonan'], 0, 10));
        $y = new DateTime($date);
        $perbedaan = $x->diff($y);
        $data = array(
          'id_izin' => $row['id_izin'],
          'nama' => $row['nama'],
          'NIB' => $row['NIB'],
          'tgl_permohonan' => $row['tgl_permohonan'],
          'id_izin' => $row['NIB'],
          'concat_sub' => $row['concat_sub'],
          'concat_kualifikasi' => $row['concat_kualifikasi'],
          'tgl_permohonan' => $row['tgl_permohonan'],
          'id_izin' => $row['id_izin'],
          'asesor1' => $data_asesor[0]['Nama'],
          'asesor2' => $data_asesor[1]['Nama'],
          'asesor3' => $data_asesor[2]['Nama'],
          'username1' => $data_asesor[0]['Username'],
          'username2' => $data_asesor[1]['Username'],
          'username3' => $data_asesor[2]['Username'],
          'perbedaan' => $perbedaan->d
        );
        array_push($datax, $data);
      }
      $this->data = array(
        'record' => $datax,

      );
      //print_r($datax);
      $this->template->load('menu/menu', 'survailen/list_penunjukan_asesor_survailen', $this->data);
    } else {
      $this->session->set_flashdata('title', 'Warning');
      $this->session->set_flashdata('text', 'Anda tidak memiliki akses');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
  }
  function list_evaluator_asesor()
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    } elseif ($this->ion_auth->admin_pusat() or $this->ion_auth->pelaksana() or $this->ion_auth->koordinator_sertifikasi()) {


      $record = $this->Bu_model->list_survailen_asesor_evaluator();
      $datax = array();
      foreach ($record as $row) {
        $data_asesor = $this->Bu_model->get_asesor_survailen2($row['id_izin']);
        $data = array(
          'id_izin' => $row['id_izin'],
          'nama' => $row['nama'],
          'NIB' => $row['NIB'],
          'concat_sub' => $row['concat_sub'],
          'concat_kualifikasi' => $row['concat_kualifikasi'],
          'tgl_permohonan' => $row['tgl_permohonan'],
          'id_izin' => $row['id_izin'],
          'asesor1' => $data_asesor[0]['Nama'],
          'asesor2' => $data_asesor[1]['Nama'],
          'asesor3' => $data_asesor[2]['Nama'],
          'username1' => $data_asesor[0]['Username'],
          'username2' => $data_asesor[1]['Username'],
          'username3' => $data_asesor[2]['Username'],
        );
        array_push($datax, $data);
      }

      $this->data = array(
        'record' => $datax,

      );

      $this->template->load('menu/menu', 'survailen/list_evaluator_asesor_survailen', $this->data);
    } else {
      $this->session->set_flashdata('title', 'Warning');
      $this->session->set_flashdata('text', 'Anda tidak memiliki akses');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
  }

  function signup()
  {
    $post = $this->input->post();
    $nib = $this->security->xss_clean(trim($post['nib']));

    $klasifikasi = $this->Bu_model->klasifikasi_kualifikasi_opr2_terbit($nib);
    if (!empty($klasifikasi)) {
      $biodata = $this->Bu_model->biodata_opr($nib);
      $email = $klasifikasi[0]['user_email'];
      //$email = "yagihagiyansyah@gmail.com";
      $password = $this->generatePassword(8);
      $password_hash = substr(md5($password), -6);
      $this->send_user($email, $nib, $password);
      $data = array(
        'Username' => $nib,
        'Password' => $password_hash,
        'Nama' => $biodata[0]['nama'],
        'Email' => $email,
        'level' => '11',
        'status_aktif' => '1',
      );

      $tabel = 'user_survailen';
      //echo $email;
      $this->Bu_model->insert_sad($tabel, $data);
      $this->session->set_flashdata('title', 'Success');
      $this->session->set_flashdata('text', 'User sudah dikirim ke email ' . $email);
      $this->session->set_flashdata('class', "success");
      redirect('survailen', 'refresh');
    } else {
      $this->session->set_flashdata('title', 'Failed');
      $this->session->set_flashdata('text', 'SBU anda tidak terdeteksi, mohon hubungi PIC');
      $this->session->set_flashdata('class', "warning");
      redirect('survailen', 'refresh');
    }
  }
  function send_user($tujuan, $username, $password)
  {

    $this->load->config('email');
    $this->load->library('email');
    $from = $this->config->item('smtp_user');
    $message = $this->notif_email3($username, $password);
    $this->email->set_newline("\r\n");
    $this->email->from('info@lsbugapeknas.com', 'LSBU GAPEKNAS');
    $this->email->to($tujuan);
    $this->email->subject('Username Survailen');
    $this->email->message($message);

    if ($this->email->send()) {
      return "Success";
    } else {
      return "Failed";
    }
  }
  function send_bulk_email()
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
    $record = $this->Bu_model->get_email_survailen();
    foreach ($record as $row) {
      $this->send_survailen($row['email']);
      $this->Bu_model->update_survailen_email($row['NIB']);
    }
    echo "Done";
  }

  function send_bulk_email_pemenuhan()
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
    $record = $this->Bu_model->get_email_pemenuhan();
    foreach ($record as $row) {
      $this->send_pemenuhan($row['email']);
      $this->Bu_model->update_pemenuhan_email($row['email']);
    }
    echo "Done";
  }
  function send_survailen($email)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
    $this->load->config('email');
    $this->load->library('email');

    $message = $this->notif_email_coba();
    // $message="<b>aaaa</b>";
    $this->email->set_newline("\r\n");
    $this->email->from('survailen@lsbugapeknas.com', 'LSBU GAPEKNAS');
    $this->email->to($email);
    $this->email->subject('Permintaan Pengisian Data Surveilans Sertifikasi Badan Usaha');
    $this->email->message($message);

    if ($this->email->send()) {
      return "Success";
    } else {
      return "Failed";
    }
  }
  function send_pemenuhan($email)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
    $this->load->config('email');
    $this->load->library('email');

    $message = $this->notif_email_pemenuhan();
    // $message="<b>aaaa</b>";
    $this->email->set_newline("\r\n");
    $this->email->from('survailen@lsbugapeknas.com', 'LSBU GAPEKNAS');
    $this->email->to($email);
    $this->email->subject('Permintaan Pemenuhan Persyarata Sertifikasi Badan Usaha');
    $this->email->message($message);

    if ($this->email->send()) {
      return "Success";
    } else {
      return "Failed";
    }
  }
  function send_coba()
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
    $this->load->config('email');
    $this->load->library('email');

    $message = $this->notif_email_pemenuhan();
    // $message="<b>aaaa</b>";
    $this->email->set_newline("\r\n");
    $this->email->from('survailen@lsbugapeknas.com', 'LSBU GAPEKNAS');
    $this->email->to('yagihagiyansyah@gmail.com');

    $this->email->subject('Permintaan Pemenuhan Persyarata Sertifikasi Badan Usaha');
    $this->email->message($message);

    if ($this->email->send()) {
      echo 'berhasil';
    } else {
      show_error($this->email->print_debugger());
    }
  }


  public function index()
  {
    if ($this->ion_auth->ceklogin2_survailen()) {
      $this->data['profil'] = $this->ion_auth->datalogin_survailen();
      $this->data['title'] = $this->session->flashdata('title');
      $this->data['text'] = $this->session->flashdata('text');
      $this->data['class'] = $this->session->flashdata('class');
      $id_user = $this->session->userdata('id_user');
      $pw = $this->session->userdata('pw');

      if ($this->ion_auth->survailen()) {
        redirect('survailen/dashboard', 'refresh');
      } else {

        $this->keluar();
      }
    } else {


      if (isset($_POST) && !empty($_POST)) {

        $status = "TRUE";
        /*
			$recaptcha = $this->input->post('g-recaptcha-response');

			if(!empty($recaptcha))
			{*/



        $pw = $this->security->xss_clean(trim($this->input->post('password')));
        $username = $this->security->xss_clean(trim($this->input->post('username')));
        $password = substr(md5($pw), -6);

        if ($this->session->userdata('logged_in') === FALSE) {
          //delete session
          $this->User_model->deleteSession_survailen($this->session->userdata('id_user'));
        }


        $session = $this->User_model->getSession_survailen($username);
        /*if ($session == NULL)
					{*/
        if ($this->User_model->login_survailen($username, $password)) {

          if (!empty($this->input->post('forces_login'))) {
            $this->User_model->deleteSession_survailen($this->session->userdata('id_user'));
          } else {
            if ($session != NULL) {
              $title = "Login Gagal";
              $text = "User Sedang digunakan / online";
              $class = "warning";
              $status = "FALSE";
            }
          }
          $status = $this->User_model->select_survailen($username, $password);
          if ($status->status_aktif == 1) {
            $sessionarray = array(
              'id_user' => $status->Username,
              'username' => $status->Username,
              'pw' => $pw,
              'email' => $status->Email,
              'id_propinsi' => $status->Id_propinsi,
              'level' => $status->level,
              'nama' => $status->Nama,
              'login' => TRUE,
              'id_login' => session_id()
            );
            $this->session->set_userdata($sessionarray);

            $title = "Login Sukses";
            $text = 'Selamat Datang ' . $status->Nama;
            $class = "success";
            $status = "TRUE";
            //Successfull login
            $u_data = array(
              'Id_User' => $username,
              'is_logged_in' => true,
            );
            //Create session of current user
            $this->session->set_userdata($u_data);
            //Fetch new session id
            $Id_Session = session_id();
            //Map new session Id with UserId and destroy previous mapped sessionId
            $this->User_model->setSession_survailen($username, $Id_Session, $u_data);
            //Creeate session logged_in
            $this->session->set_userdata('logged_in', TRUE);

            //redirect('','refresh');
          } else {
            $title = "Login Gagal";
            $text = "Maaf User Anda Belum Aktif";
            $class = "warning";
            $status = "FALSE";
          }
        } else {
          $title = "Login Gagal";
          $text = "Username dan Password salah, Silahkan Ulangi Lagi";
          $class = "warning";
          $status = "FALSE";
        }
        /*}
					else {
							$this->session->set_flashdata('title','Login Gagal');
							$this->session->set_flashdata('text','User Sedang digunakan / online');
							$this->session->set_flashdata('class', "bg-warning");
							redirect('index.php/login','refresh');
					}*/



        /*
			}
			else {
				$this->session->set_flashdata('title','Login Gagal');
				$this->session->set_flashdata('text','Anda Harus Verifikasi Captcha');
				$this->session->set_flashdata('class','bg-warning');
				redirect('index.php/login','refresh');
			}*/
        $data = array(
          'title' => $title,
          'text' => $text,
          'class' => $class,
          'status' => $status
        );

        echo json_encode($data);
      } else {
        $this->data['title'] = $this->session->flashdata('title');
        $this->data['text'] = $this->session->flashdata('text');
        $this->data['class'] = $this->session->flashdata('class');
        $this->load->view('survailen/login', $this->data);
      }
    }
  }
  function proses($id1, $id2)
  {
    if (!$this->ion_auth->ceklogin2_survailen()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }

    $nib = decrypt_url($id1);
    $sub_klasifikasi = decrypt_url($id2);
    $klasifikasi = $this->Bu_model->klasifikasi_kualifikasi_oprx_sub_klasifikasi($nib, $sub_klasifikasi);
    $permohonanx = $this->Bu_model->get_permohonan_survailen($klasifikasi[0]['id_izin']);
    if (!empty($permohonanx)) {
      if ($permohonanx[0]['keputusan'] == '0') {
        $permohonan = array();
      } else {
        $permohonan = $permohonanx;
      }
    } else {
      $permohonan = array();
    }
    $this->data = array(
      'klasifikasi' => $klasifikasi,
      'biodata' => $this->Bu_model->biodata_opr($nib),
      'neraca' => $this->Bu_model->neraca_ski($nib),
      'pjbu' => $this->Bu_model->pjbu_opr($nib),
      'pjtbu' => $this->Bu_model->pjtbu_opr($nib),
      'pjskbu' => $this->Bu_model->pjskbu_opr_sub($nib, $sub_klasifikasi),
      'smap' => $this->Bu_model->smap_opr_sub($nib, $sub_klasifikasi),
      'akte' => $this->Bu_model->akte_opr($nib),
      'penjualan_tahunan' => $this->Bu_model->pengalaman_opr_izin2($nib, $klasifikasi[0]['id_izin']),
      'penjualan_tahunan_survailen' => $this->Bu_model->pengalaman_survailen($klasifikasi[0]['id_izin']),
      'akte_survailen' => $this->Bu_model->akte_survailen($klasifikasi[0]['id_izin']),
      'administrasi_survailen' => $this->Bu_model->administrasi_survailen($klasifikasi[0]['id_izin']),
      'pjtbu_survailen' => $this->Bu_model->pjtbu_survailen($klasifikasi[0]['id_izin']),
      'pjskbu_survailen' => $this->Bu_model->pjskbu_survailen($klasifikasi[0]['id_izin']),
      'neraca_survailen' => $this->Bu_model->neraca_survailen($klasifikasi[0]['id_izin']),
      'peralatan_survailen' => $this->Bu_model->peralatan_survailen($klasifikasi[0]['id_izin']),
      'smap_survailen' => $this->Bu_model->smap_survailen($klasifikasi[0]['id_izin']),
      'permohonan' => $permohonan,
      'penjualan_tahunan' => $this->Bu_model->pengalaman_opr_izin2($nib, $klasifikasi[0]['id_izin']),
    );
    $this->template->load('menu/menu_survailen', 'survailen/proses', $this->data);
  }
  function proses_perbaikan($id1, $id2)
  {
    if (!$this->ion_auth->ceklogin2_survailen()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }

    $nib = decrypt_url($id1);
    $sub_klasifikasi = decrypt_url($id2);
    $klasifikasi = $this->Bu_model->klasifikasi_kualifikasi_oprx_sub_klasifikasi($nib, $sub_klasifikasi);
    $permohonanx = $this->Bu_model->get_permohonan_survailen($klasifikasi[0]['id_izin']);
    if (!empty($permohonanx)) {
      if ($permohonanx[0]['keputusan'] == '0') {
        $permohonan = array();
      } else {
        $permohonan = $permohonanx;
      }
    } else {
      $permohonan = array();
    }
    $this->data = array(
      'klasifikasi' => $klasifikasi,
      'biodata' => $this->Bu_model->biodata_opr($nib),
      'neraca' => $this->Bu_model->neraca_ski($nib),
      'pjbu' => $this->Bu_model->pjbu_opr($nib),
      'pjtbu' => $this->Bu_model->pjtbu_opr($nib),
      'pjskbu' => $this->Bu_model->pjskbu_opr_sub($nib, $sub_klasifikasi),
      'smap' => $this->Bu_model->smap_opr_sub($nib, $sub_klasifikasi),
      'akte' => $this->Bu_model->akte_opr($nib),
      'penjualan_tahunan' => $this->Bu_model->pengalaman_opr_izin2($nib, $klasifikasi[0]['id_izin']),
      'penjualan_tahunan_survailen' => $this->Bu_model->pengalaman_survailen($klasifikasi[0]['id_izin']),
      'akte_survailen' => $this->Bu_model->akte_survailen($klasifikasi[0]['id_izin']),
      'administrasi_survailen' => $this->Bu_model->administrasi_survailen($klasifikasi[0]['id_izin']),
      'pjtbu_survailen' => $this->Bu_model->pjtbu_survailen($klasifikasi[0]['id_izin']),
      'pjskbu_survailen' => $this->Bu_model->pjskbu_survailen($klasifikasi[0]['id_izin']),
      'neraca_survailen' => $this->Bu_model->neraca_survailen($klasifikasi[0]['id_izin']),
      'peralatan_survailen' => $this->Bu_model->peralatan_survailen($klasifikasi[0]['id_izin']),
      'smap_survailen' => $this->Bu_model->smap_survailen($klasifikasi[0]['id_izin']),
      'permohonan' => $permohonan,
      'penjualan_tahunan' => $this->Bu_model->pengalaman_opr_izin2($nib, $klasifikasi[0]['id_izin']),
    );
    $this->template->load('menu/menu_survailen', 'survailen/proses_perbaikan', $this->data);
  }
  function cetak_penilaian($id1, $id2)
  {

    $this->load->library('pdfgenerator');
    $nib = decrypt_url($id1);
    $sub_klasifikasi = decrypt_url($id2);
    $klasifikasi = $this->Bu_model->klasifikasi_kualifikasi_oprx_sub_klasifikasi($nib, $sub_klasifikasi);
    $id_user = $this->session->userdata('id_user');
    $penilaian = $this->Bu_model->get_penilaian_survailen($nib, $sub_klasifikasi, $id_user);
    $bulan =  date("m", strtotime($penilaian[0]['Log']));
    $tahun =  date("Y", strtotime($penilaian[0]['Log']));
    $day =  date("d", strtotime($penilaian[0]['Log']));
    $this->data = array(
      'id1' => $id1,
      'id2' => $id2,
      'klasifikasi' => $klasifikasi,
      'biodata' => $this->Bu_model->biodata_opr($nib),
      'penilaian' => $penilaian,
      'bulan' => $this->getBulan($bulan),
      'tahun' => $tahun,
      'day' => $day
    );
    $html = $this->load->view('survailen/cetak_penilaian', $this->data, true);
    $filename = 'report_' . time();
    //$this->load->view('sertifikasi/berita_acara_tim_pemutus',$data);

    $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
  }
  function cetak_keputusan($id_izin)
  {

    $this->load->library('pdfgenerator');
    $klasifikasi = $this->Bu_model->klasifikasi_kualifikasi_oprx_izin($id1);

    $penilaian = $this->Bu_model->get_penilaian_survailen_2($id_izin);
    $bulan =  date("m", strtotime($penilaian[0]['Log']));
    $tahun =  date("Y", strtotime($penilaian[0]['Log']));
    $day =  date("d", strtotime($penilaian[0]['Log']));
    $this->data = array(
      'id1' => $id1,
      'id2' => $id2,
      'klasifikasi' => $klasifikasi,
      'biodata' => $this->Bu_model->biodata_opr($klasifikasi[0]['NIB']),
      'penilaian' => $penilaian,
      'bulan' => $this->getBulan($bulan),
      'tahun' => $tahun,
      'day' => $day
    );
    $html = $this->load->view('survailen/cetak_penilaian', $this->data, true);
    $filename = 'report_' . time();
    //$this->load->view('sertifikasi/berita_acara_tim_pemutus',$data);

    $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
  }

  function cetak_penilaian_asesor($id1, $id2, $id3)
  {

    $this->load->library('pdfgenerator');
    $sub_klasifikasi = decrypt_url($id2);
    $id_user = decrypt_url($id3);
    $klasifikasi = $this->Bu_model->klasifikasi_kualifikasi_oprx_izin($id1);
    $this->data = array(
      'id1' => $id1,
      'id2' => $id2,
      'klasifikasi' => $klasifikasi,
      'biodata' => $this->Bu_model->biodata_opr($klasifikasi[0]['NIB']),
      'penilaian' => $this->Bu_model->get_penilaian_survailen($klasifikasi[0]['NIB'], $sub_klasifikasi, $id_user),
    );
    $html = $this->load->view('survailen/cetak_penilaian', $this->data, true);
    $filename = 'report_' . time();
    //$this->load->view('sertifikasi/berita_acara_tim_pemutus',$data);

    $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
  }
  function abu($id1, $id2)
  {

    $id_user = $this->session->userdata('id_user');

    $nib = decrypt_url($id1);
    $sub_klasifikasi = decrypt_url($id2);
    $klasifikasi = $this->Bu_model->klasifikasi_kualifikasi_oprx_sub_klasifikasi($nib, $sub_klasifikasi);
    $this->data = array(
      'id1' => $id1,
      'id2' => $id2,
      'klasifikasi' => $klasifikasi,
      'biodata' => $this->Bu_model->biodata_opr($nib),
      'neraca' => $this->Bu_model->neraca_ski($nib),
      'pjbu' => $this->Bu_model->pjbu_opr($nib),
      'pjtbu' => $this->Bu_model->pjtbu_opr($nib),
      'pjskbu' => $this->Bu_model->pjskbu_opr_sub($nib, $sub_klasifikasi),
      'smap' => $this->Bu_model->smap_opr_sub($nib, $sub_klasifikasi),
      'akte' => $this->Bu_model->akte_opr($nib),
      'akte_survailen' => $this->Bu_model->akte_survailen($klasifikasi[0]['id_izin']),
      'administrasi_survailen' => $this->Bu_model->administrasi_survailen($klasifikasi[0]['id_izin']),
      'pjtbu_survailen' => $this->Bu_model->pjtbu_survailen($klasifikasi[0]['id_izin']),
      'pjskbu_survailen' => $this->Bu_model->pjskbu_survailen($klasifikasi[0]['id_izin']),
      'neraca_survailen' => $this->Bu_model->neraca_survailen($klasifikasi[0]['id_izin']),
      'penjualan_tahunan_survailen' => $this->Bu_model->pengalaman_survailen($klasifikasi[0]['id_izin']),
      'penjualan_tahunan' => $this->Bu_model->pengalaman_opr_izin2($nib, $klasifikasi[0]['id_izin']),

      'peralatan_survailen' => $this->Bu_model->peralatan_survailen($klasifikasi[0]['id_izin']),
      'smap_survailen' => $this->Bu_model->smap_survailen($klasifikasi[0]['id_izin']),
      'penilaian' => $this->Bu_model->get_penilaian_survailen($nib, $sub_klasifikasi, $id_user),

      'penjualan_tahunan' => $this->Bu_model->pengalaman_opr_izin2($nib, $klasifikasi[0]['id_izin']),
    );
    $this->template->load('menu/menu_survailen', 'survailen/abu', $this->data);
  }

  function insert_asesor()
  {
    $post = $this->input->post();
    $id1 = $this->security->xss_clean(trim($post['id1']));
    $id2 = $this->security->xss_clean(trim($post['id2']));
    $nib = decrypt_url($id1);
    $sub_klasifikasi = decrypt_url($id2);
    $klasifikasi = $this->Bu_model->klasifikasi_kualifikasi_oprx_sub_klasifikasi($nib, $sub_klasifikasi);
    $id_izin = $klasifikasi[0]['id_izin'];
    $id_user = $this->session->userdata('id_user');
    $tgl_pelaksanaan = $this->security->xss_clean(trim($post['tgl_pelaksanaan']));
    $tempat_pelaksanaan = $this->security->xss_clean(trim($post['tempat_pelaksanaan']));
    $ketidaksesuaian = $this->security->xss_clean(trim($post['ketidaksesuaian']));
    $referensi = $this->security->xss_clean(trim($post['referensi']));
    $rencana_perbaikan = $this->security->xss_clean(trim($post['rencana_perbaikan']));
    $tgl_selesai = $this->security->xss_clean(trim($post['tgl_selesai']));
    $jenis_temuan = $this->security->xss_clean(trim($post['jenis_temuan']));
    $select = "REPLACE INTO lsbu_survailen_penilaian (NIB,id_izin,id_sub_klasifikasi,id_asesor,tgl_pelaksanaan,tempat_pelaksanaan,ketidaksesuaian,referensi,rencana_perbaikan,tgl_selesai,jenis_temuan)VALUES ('$nib','$id_izin','$sub_klasifikasi','$id_user','$tgl_pelaksanaan','$tempat_pelaksanaan','$ketidaksesuaian','$referensi','$rencana_perbaikan','$tgl_selesai','$jenis_temuan')";
    $where = "";
    $this->Bu_model->delete_opr($select, $where);
    redirect('survailen/cetak_penilaian/' . $id1 . '/' . $id2, 'refresh');
  }

  function tinjauan_permohonan($id1, $id2)
  {


    $nib = decrypt_url($id1);
    $sub_klasifikasi = decrypt_url($id2);

    $klasifikasi = $this->Bu_model->klasifikasi_kualifikasi_oprx_sub_klasifikasi($nib, $sub_klasifikasi);
    $this->data = array(
      'klasifikasi' => $klasifikasi,
      'biodata' => $this->Bu_model->biodata_opr($nib),
      'neraca' => $this->Bu_model->neraca_ski($nib),
      'pjbu' => $this->Bu_model->pjbu_opr($nib),
      'pjtbu' => $this->Bu_model->pjtbu_opr($nib),
      'pjskbu' => $this->Bu_model->pjskbu_opr_sub($nib, $sub_klasifikasi),
      'smap' => $this->Bu_model->smap_opr_sub($nib, $sub_klasifikasi),
      'akte' => $this->Bu_model->akte_opr($nib),
      'akte_survailen' => $this->Bu_model->akte_survailen($klasifikasi[0]['id_izin']),
      'administrasi_survailen' => $this->Bu_model->administrasi_survailen($klasifikasi[0]['id_izin']),
      'pjtbu_survailen' => $this->Bu_model->pjtbu_survailen($klasifikasi[0]['id_izin']),
      'pjskbu_survailen' => $this->Bu_model->pjskbu_survailen($klasifikasi[0]['id_izin']),
      'neraca_survailen' => $this->Bu_model->neraca_survailen($klasifikasi[0]['id_izin']),

      'peralatan_survailen' => $this->Bu_model->peralatan_survailen($klasifikasi[0]['id_izin']),
      'smap_survailen' => $this->Bu_model->smap_survailen($klasifikasi[0]['id_izin']),

      'penjualan_tahunan' => $this->Bu_model->pengalaman_opr_izin2($nib, $klasifikasi[0]['id_izin']),
    );
    $this->template->load('menu/menu_survailen', 'survailen/tinjauan_permohonan', $this->data);
  }
  function dashboard()
  {
    if (!$this->ion_auth->ceklogin2_survailen()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
    $nib = $this->session->userdata('id_user');
    $klasifikasi = $this->Bu_model->list_survailen_terbit($nib);
    $this->data = array(
      'record' => $klasifikasi
    );
    $this->template->load('menu/menu_survailen', 'survailen/dashboard2', $this->data);
  }


  function pemantauan()
  {
    $select = "SELECT propinsi, COUNT(*) AS jumlah_data
    FROM lsbu_survailen
    GROUP BY propinsi;";
    $where = "";
    $this->data = array(
      'record' => $this->Bu_model->searching($select, $where),
    );
    $this->template->load('menu/menu', 'survailen/dashboard', $this->data);
  }

  function kegiatan($id1)
  {
    $propinsi = decrypt_url($id1);
    $select = "SELECT *
    FROM lsbu_survailen_kegiatan";
    $where = "WHERE id_propinsi='propinsi'";
    $this->data = array(
      'record' => $this->Bu_model->searching($select, $where),
    );
    $this->template->load('menu/menu', 'survailen/kegiatan', $this->data);
  }
  function generatePassword($length = 12)
  {
    // Define characters to be used in the password
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_';

    // Get the total number of characters
    $charLength = strlen($characters);

    // Initialize the password variable
    $password = '';

    // Generate random password
    for ($i = 0; $i < $length; $i++) {
      $password .= $characters[rand(0, $charLength - 1)];
    }

    return $password;
  }
  function notif_email3($username, $password)
  {
    $html = '
  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Email Notification</title>
    <style type="text/css">

    * {
      margin:0;
      padding:0;
      font-family: Helvetica, Arial, sans-serif;
    }

    img {
      max-width: 100%;
      outline: none;
      text-decoration: none;
      -ms-interpolation-mode: bicubic;
    }

    .image-fix {
      display:block;
    }

    .collapse {
      margin:0;
      padding:0;
    }

    body {
      -webkit-font-smoothing:antialiased;
      -webkit-text-size-adjust:none;
      width: 100%!important;
      height: 100%;
      text-align: center;
      color: #747474;
      background-color: #ffffff;
    }

    h1,h2,h3,h4,h5,h6 {
      font-family: Helvetica, Arial, sans-serif;
      line-height: 1.1;
    }

    h1 small, h2 small, h3 small, h4 small, h5 small, h6 small {
      font-size: 60%;
      line-height: 0;
      text-transform: none;
    }

    h1 {
      font-weight:200;
      font-size: 44px;
    }

    h2 {
      font-weight:200;
      font-size: 32px;
      margin-bottom: 14px;
    }

    h3 {
      font-weight:500;
      font-size: 27px;
    }

    h4 {
      font-weight:500;
      font-size: 23px;
    }

    h5 {
      font-weight:900;
      font-size: 17px;
    }

    h6 {
      font-weight:900;
      font-size: 14px;
      text-transform: uppercase;
    }

    .collapse {
      margin:0!important;
    }

    td, div {
      font-family: Helvetica, Arial, sans-serif;
      text-align: center;
    }

    p, ul {
      margin-bottom: 10px;
      font-weight: normal;
      font-size:14px;
      line-height:1.6;
    }

    p.lead {
      font-size:17px;
    }

    p.last {
      margin-bottom:0px;
    }

    ul li {
      margin-left:5px;
      list-style-position: inside;
    }

    a {
      color: #747474;
      text-decoration: none;
    }

    a img {
      border: none;
    }

    .head-wrap {
      width: 100%;
      margin: 0 auto;
      background-color: #f9f8f8;
      border-bottom: 1px solid #d8d8d8;
    }

    .head-wrap * {
      margin: 0;
      padding: 0;
    }

    .header-background {
      background: repeat-x url(https://www.filepicker.io/api/file/wUGKTIOZTDqV2oJx5NCh) left bottom;
    }

    .header {
      height: 42px;
    }

    .header .content {
      padding: 0;
    }

    .header .brand {
      font-size: 16px;
      line-height: 42px;
      font-weight: bold;
    }

    .header .brand a {
      color: #464646;
    }

    .body-wrap {
      width: 505px;
      margin: 0 auto;
      background-color: #ffffff;
    }

    .soapbox .soapbox-title {
      font-size: 21px;
      color: #464646;
      padding-top: 35px;
    }

    .content .status-container.single .status-padding {
      width: 10px;
    }

    .content .status {
      width: 90%;
    }

    .content .status-container.single .status {
      width: 300px;
    }

    .status {
      border-collapse: collapse;
      margin-left: 15px;
      color: #656565;
    }

    .status .status-cell {
      border: 1px solid #b3b3b3;
      height: 50px;
    }

    .status .status-cell.success,
    .status .status-cell.active {
      height: 65px;
    }

    .status .status-cell.success {
      background: #f2ffeb;
      color: #51da42;
    }

    .status .status-cell.success .status-title {
      font-size: 15px;
    }

    .status .status-cell.active {
      background: #fffde0;
      width: 135px;
    }

    .status .status-title {
      font-size: 16px;
      font-weight: bold;
      line-height: 23px;
    }

    .status .status-image {
      vertical-align: text-bottom;
    }

    .body .body-padded,
    .body .body-padding {
      padding-top: 34px;
    }

    .body .body-padding {
      width: 41px;
    }

    .body-padded,
    .body-title {
      text-align: left;
    }

    .body .body-title {
      font-weight: bold;
      font-size: 17px;
      color: #464646;
    }

    .body .body-text .body-text-cell {
      text-align: left;
      font-size: 14px;
      line-height: 1.6;
      padding: 9px 0 17px;
    }

    .body .body-text-cell a {
      color: #464646;
      text-decoration: underline;
    }

    .body .body-signature-block .body-signature-cell {
      padding: 25px 0 30px;
      text-align: left;
    }

    .body .body-signature {
      font-family: "Comic Sans MS", Textile, cursive;
      font-weight: bold;
    }

    .footer-wrap {
      width: 100%;
      margin: 0 auto;
      clear: both !important;
      background-color: #e5e5e5;
      border-top: 1px solid #b3b3b3;
      font-size: 12px;
      color: #656565;
      line-height: 30px;
    }

    .footer-wrap .container {
      padding: 14px 0;
    }

    .footer-wrap .container .content {
      padding: 0;
    }

    .footer-wrap .container .footer-lead {
      font-size: 14px;
    }

    .footer-wrap .container .footer-lead a {
      font-size: 14px;
      font-weight: bold;
      color: #535353;
    }

    .footer-wrap .container a {
      font-size: 12px;
      color: #656565;
    }

    .footer-wrap .container a.last {
      margin-right: 0;
    }

    .footer-wrap .footer-group {
      display: inline-block;
    }

    .container {
      display: block !important;
      max-width: 705px !important;
      clear: both !important;
    }

    .content {
      padding: 0;
      max-width: 505px;
      margin: 0 auto;
      display: block;
    }

    .content table {
      width: 100%;
    }


    .clear {
      display: block;
      clear: both;
    }

    table.full-width-gmail-android {
      width: 100% !important;
    }

    </style>

    <style type="text/css" media="only screen">

    @media only screen {

      table[class*="head-wrap"],
      table[class*="body-wrap"],
      table[class*="footer-wrap"] {
        width: 100% !important;
      }

      td[class*="container"] {
        margin: 0 auto !important;
      }

    }

    @media only screen and (max-width: 505px) {

      *[class*="w320"] {
        width: 320px !important;
      }

      table[class="soapbox"] td[class*="soapbox-title"],
      table[class="body"] td[class*="body-padded"] {
        padding-top: 24px;
      }
    }
    </style>
  </head>

  <body bgcolor="#ffffff">

    <div align="center">
      <table class="head-wrap w320 full-width-gmail-android" bgcolor="#f9f8f8" cellpadding="0" cellspacing="0" border="0">
        <tr>
          <td background="https://www.filepicker.io/api/file/UOesoVZTFObSHCgUDygC" bgcolor="#ffffff" width="100%" height="8" valign="top">
            <!--[if gte mso 9]>
            <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="mso-width-percent:1000;height:8px;">
              <v:fill type="tile" src="https://www.filepicker.io/api/file/UOesoVZTFObSHCgUDygC" color="#ffffff" />
              <v:textbox inset="0,0,0,0">
            <![endif]-->
            <div height="8">
            </div>
            <!--[if gte mso 9]>
              </v:textbox>
            </v:rect>
            <![endif]-->
          </td>
        </tr>
        <tr class="header-background">
          <td class="header container" align="center">
            <div class="content">
              <span class="brand">
                <a href="#">

                </a>
              </span>
            </div>
          </td>
        </tr>
      </table>

      <table class="body-wrap w320">
        <tr>
          <td></td>
          <td class="container">
            <div class="content">
              <table cellspacing="0">
                <tr>
                  <td>
                    <table class="soapbox">
                      <tr>
                        <td class="soapbox-title">User Survailen GAPEKNAS</td>
                      </tr>
                    </table>
                    <table class="body">
                      <tr>
                        <td class="body-padding"></td>
                        <td class="body-padded">
                          <div class="body-title">Hi There,</div>
                          <table class="body-text">
                            <tr>
                              <td class="body-text-cell">
                                Kepada Yth<br>
                                Pimpinan Badan Usaha<br>
                                di Tempat<br>
                                <br>
                                Sehubung dengan pemenuhan Survailen Badan Usaha<br>
                                <br>
                                Terlampir User Login untuk Pemenuhan Survailen Badan Usaha<br>
                                Username : ' . $username . '<br>
                                Password : ' . $password . '<br><br>
                                Demikian kami sampaikan atas perhatiannya kami ucapkan terimakasih
                              </td>
                            </tr>
                          </table>

                          <table class="body-signature-block">
                            <tr>
                              <td class="body-signature-cell">
                                <p>Terimakasih.</p>

                              </td>
                            </tr>
                          </table>
                        </td>
                        <td class="body-padding"></td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </div>
          </td>
          <td></td>
        </tr>
      </table>

      <div class="footer" style="clear: both; Margin-top: 10px; text-align: center; width: 100%; ">
        <table bgcolor="#e5e5e5" role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; ">
          <tr>
          <td style="padding-bottom:25px;padding-top:22px;width:100%;padding-right:0px;padding-left:0px;">
          <div align="center" style="line-height:10px"><img alt="Image" src="' . base_url('assets/media/logos/Logo_gapeknas.png') . '" style=" border: 0; width: 150px; max-width: 3000px;" title="Image" width="80"/></div>
          </td>
          </tr>
          <tr>
          <td class="content-block" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
            <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">GAPEKNAS - PT LSBU GAPEKNAS INFRASTRUKTUR</span>
            <br>
            <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">Ruko Graha Mas Pemuda Blok AD No. 21 Jl. Pemuda, Rawamangun</span>
            <br>
            <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">Jakarta Timur</span>
          </td>
          </tr>

        </table>
      </div>

    </div>

  </body>
  </html>
  ';
    return $html;
  }
  function notif_email_coba()
  {
    $html = '
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width" />
      <title>Email Notification</title>
      <style type="text/css">
  
      * {
        margin:0;
        padding:0;
        font-family: Helvetica, Arial, sans-serif;
      }
  
      img {
        max-width: 100%;
        outline: none;
        text-decoration: none;
        -ms-interpolation-mode: bicubic;
      }
  
      .image-fix {
        display:block;
      }
  
      .collapse {
        margin:0;
        padding:0;
      }
  
      body {
        -webkit-font-smoothing:antialiased;
        -webkit-text-size-adjust:none;
        width: 100%!important;
        height: 100%;
        text-align: center;
        color: #747474;
        background-color: #ffffff;
      }
  
      h1,h2,h3,h4,h5,h6 {
        font-family: Helvetica, Arial, sans-serif;
        line-height: 1.1;
      }
  
      h1 small, h2 small, h3 small, h4 small, h5 small, h6 small {
        font-size: 60%;
        line-height: 0;
        text-transform: none;
      }
  
      h1 {
        font-weight:200;
        font-size: 44px;
      }
  
      h2 {
        font-weight:200;
        font-size: 32px;
        margin-bottom: 14px;
      }
  
      h3 {
        font-weight:500;
        font-size: 27px;
      }
  
      h4 {
        font-weight:500;
        font-size: 23px;
      }
  
      h5 {
        font-weight:900;
        font-size: 17px;
      }
  
      h6 {
        font-weight:900;
        font-size: 14px;
        text-transform: uppercase;
      }
  
      .collapse {
        margin:0!important;
      }
  
      td, div {
        font-family: Helvetica, Arial, sans-serif;
        text-align: center;
      }
  
      p, ul {
        margin-bottom: 10px;
        font-weight: normal;
        font-size:14px;
        line-height:1.6;
      }
  
      p.lead {
        font-size:17px;
      }
  
      p.last {
        margin-bottom:0px;
      }
  
      ul li {
        margin-left:5px;
        list-style-position: inside;
      }
  
      a {
        color: #747474;
        text-decoration: none;
      }
  
      a img {
        border: none;
      }
  
      .head-wrap {
        width: 100%;
        margin: 0 auto;
        background-color: #f9f8f8;
        border-bottom: 1px solid #d8d8d8;
      }
  
      .head-wrap * {
        margin: 0;
        padding: 0;
      }
  
      .header-background {
        background: repeat-x url(https://www.filepicker.io/api/file/wUGKTIOZTDqV2oJx5NCh) left bottom;
      }
  
      .header {
        height: 42px;
      }
  
      .header .content {
        padding: 0;
      }
  
      .header .brand {
        font-size: 16px;
        line-height: 42px;
        font-weight: bold;
      }
  
      .header .brand a {
        color: #464646;
      }
  
      .body-wrap {
        width: 505px;
        margin: 0 auto;
        background-color: #ffffff;
      }
  
      .soapbox .soapbox-title {
        font-size: 21px;
        color: #464646;
        padding-top: 35px;
      }
  
      .content .status-container.single .status-padding {
        width: 80px;
      }
  
      .content .status {
        width: 90%;
      }
  
      .content .status-container.single .status {
        width: 300px;
      }
  
      .status {
        border-collapse: collapse;
        margin-left: 15px;
        color: #656565;
      }
  
      .status .status-cell {
        border: 1px solid #b3b3b3;
        height: 50px;
      }
  
      .status .status-cell.success,
      .status .status-cell.active {
        height: 65px;
      }
  
      .status .status-cell.success {
        background: #f2ffeb;
        color: #51da42;
      }
  
      .status .status-cell.success .status-title {
        font-size: 15px;
      }
  
      .status .status-cell.active {
        background: #fffde0;
        width: 135px;
      }
  
      .status .status-title {
        font-size: 16px;
        font-weight: bold;
        line-height: 23px;
      }
  
      .status .status-image {
        vertical-align: text-bottom;
      }
  
      .body .body-padded,
      .body .body-padding {
        padding-top: 34px;
      }
  
      .body .body-padding {
        width: 41px;
      }
  
      .body-padded,
      .body-title {
        text-align: left;
      }
  
      .body .body-title {
        font-weight: bold;
        font-size: 17px;
        color: #464646;
      }
  
      .body .body-text .body-text-cell {
        text-align: left;
        font-size: 14px;
        line-height: 1.6;
        padding: 9px 0 17px;
      }
  
      .body .body-text-cell a {
        color: #464646;
        text-decoration: underline;
      }
  
      .body .body-signature-block .body-signature-cell {
        padding: 25px 0 30px;
        text-align: left;
      }
  
      .body .body-signature {
        font-family: "Comic Sans MS", Textile, cursive;
        font-weight: bold;
      }
  
      .footer-wrap {
        width: 100%;
        margin: 0 auto;
        clear: both !important;
        background-color: #e5e5e5;
        border-top: 1px solid #b3b3b3;
        font-size: 12px;
        color: #656565;
        line-height: 30px;
      }
  
      .footer-wrap .container {
        padding: 14px 0;
      }
  
      .footer-wrap .container .content {
        padding: 0;
      }
  
      .footer-wrap .container .footer-lead {
        font-size: 14px;
      }
  
      .footer-wrap .container .footer-lead a {
        font-size: 14px;
        font-weight: bold;
        color: #535353;
      }
  
      .footer-wrap .container a {
        font-size: 12px;
        color: #656565;
      }
  
      .footer-wrap .container a.last {
        margin-right: 0;
      }
  
      .footer-wrap .footer-group {
        display: inline-block;
      }
  
      .container {
        display: block !important;
        max-width: 705px !important;
        clear: both !important;
      }
  
      .content {
        padding: 0;
        max-width: 600px;
        margin: 0 auto;
        display: block;
      }
  
      .content table {
        width: 100%;
      }
  
  
      .clear {
        display: block;
        clear: both;
      }
  
      table.full-width-gmail-android {
        width: 100% !important;
      }
  
      </style>
  
      <style type="text/css" media="only screen">
  
      @media only screen {
  
        table[class*="head-wrap"],
        table[class*="body-wrap"],
        table[class*="footer-wrap"] {
          width: 100% !important;
        }
  
        td[class*="container"] {
          margin: 0 auto !important;
        }
  
      }
  
      @media only screen and (max-width: 505px) {
  
        *[class*="w320"] {
          width: 320px !important;
        }
  
        table[class="soapbox"] td[class*="soapbox-title"],
        table[class="body"] td[class*="body-padded"] {
          padding-top: 24px;
        }
      }
      </style>
    </head>
  
    <body bgcolor="#ffffff">
  
      <div align="center">
        <table class="head-wrap w320 full-width-gmail-android" bgcolor="#f9f8f8" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <td background="https://www.filepicker.io/api/file/UOesoVZTFObSHCgUDygC" bgcolor="#ffffff" width="100%" height="8" valign="top">
              <!--[if gte mso 9]>
              <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="mso-width-percent:1000;height:8px;">
                <v:fill type="tile" src="https://www.filepicker.io/api/file/UOesoVZTFObSHCgUDygC" color="#ffffff" />
                <v:textbox inset="0,0,0,0">
              <![endif]-->
              <div height="8">
              </div>
              <!--[if gte mso 9]>
                </v:textbox>
              </v:rect>
              <![endif]-->
            </td>
          </tr>
          <tr class="header-background">
            <td class="header container" align="center">
              <div class="content">
                <span class="brand">
                  <a href="#">
  
                  </a>
                </span>
              </div>
            </td>
          </tr>
        </table>
  
        <table class="body-wrap w320">
          <tr>
            <td></td>
            <td class="container">
              <div class="content">
                <table cellspacing="0">
                  <tr>
                    <td>
                      <table class="soapbox">
                        <tr>
                          <td class="soapbox-title">Permintaan Pengisian Data Surveilans Sertifikasi Badan Usaha</td>
                        </tr>
                      </table>
                      <table class="body">
                        <tr>
                          <td class="body-padding"></td>
                          <td class="body-padded">
                            <div class="body-title">Kepada Yth<br>
                            Pimpinan Badan Usaha<br>
                            di Tempat<br></div>
                            <table class="body-text">
                              <tr>
                                <td class="body-text-cell">
                                  
                                  
                                  Semoga email ini menemui Anda dalam keadaan baik.<br>
                                  <br>
                                  Kami ingin memberitahukan bahwa kami akan melakukan program survailen terhadap badan usaha pemilik Sertifikat Badan Usaha (SBU) yang sudah terbit terhitung satu tahun. 
                                  Surveilans ini bertujuan untuk memperoleh pemahaman yang 
                                  lebih mendalam tentang status sertifikasi badan usaha dan memastikan kepatuhan terhadap standar yang berlaku<br>
                                  <br>
                                  <br>
                                  Untuk melaksanakan surveilans ini, kami memerlukan kerjasama dari Anda dalam mengisi formulir surveilans 
                                  yang telah kami siapkan. Data yang diberikan akan diolah secara rahasia 
                                  dan hanya akan digunakan untuk kepentingan evaluasi sertifikasi badan usaha.
                                  <br>
                                  <br>
                                  Silakan mengakses melalui tautan berikut <a href="https://sertifikasi.lsbugapeknas.com/survailen" target="_blank"> click here</a> untuk mendaftar dan mendapatkan username password lalu mengisi formulir didalamnya
                                  <br>
                                  Kami meminta Anda untuk mengisi formulir dengan cermat dan menyediakan informasi yang akurat.<br>
                                  Jika Anda mengalami kendala atau memiliki pertanyaan terkait pengisian formulir, jangan ragu untuk menghubungi kami melalui 0812-88888-315(WA Only), pt.lsbugapeknas21@gmail.com.<br><br>
                                  Terima kasih atas kerjasama Anda dalam menjalani surveilans sertifikasi ini. Kontribusi Anda sangat berarti untuk memastikan keberlanjutan standar kualitas dan kepatuhan dalam bisnis Anda.

                                </td>
                              </tr>
                            </table>
  
                            <table class="body-signature-block">
                              <tr>
                                <td class="body-signature-cell">
                                  <p>Terimakasih.</p>
  
                                </td>
                              </tr>
                            </table>
                          </td>
                          <td class="body-padding"></td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </div>
            </td>
            <td></td>
          </tr>
        </table>
  
        <div class="footer" style="clear: both; Margin-top: 10px; text-align: center; width: 100%; ">
          <table bgcolor="#e5e5e5" role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; ">
            <tr>
            <td style="padding-bottom:25px;padding-top:22px;width:100%;padding-right:0px;padding-left:0px;">
            <div align="center" style="line-height:10px"><img alt="Image" src="' . base_url('assets/media/logos/Logo_gapeknas.png') . '" style=" border: 0; width: 150px; max-width: 3000px;" title="Image" width="80"/></div>
            </td>
            </tr>
            <tr>
            <td class="content-block" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
              <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">GAPEKNAS - PT LSBU GAPEKNAS INFRASTRUKTUR</span>
              <br>
              <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">Ruko Graha Mas Pemuda Blok AD No. 21 Jl. Pemuda, Rawamangun</span>
              <br>
              <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">Jakarta Timur</span>
            </td>
            </tr>
  
          </table>
        </div>
  
      </div>
  
    </body>
    </html>
    ';
    return $html;
  }
  function notif_email_pemenuhan()
  {
    $html = '
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width" />
      <title>Email Notification</title>
      <style type="text/css">
  
      * {
        margin:0;
        padding:0;
        font-family: Helvetica, Arial, sans-serif;
      }
  
      img {
        max-width: 100%;
        outline: none;
        text-decoration: none;
        -ms-interpolation-mode: bicubic;
      }
  
      .image-fix {
        display:block;
      }
  
      .collapse {
        margin:0;
        padding:0;
      }
  
      body {
        -webkit-font-smoothing:antialiased;
        -webkit-text-size-adjust:none;
        width: 100%!important;
        height: 100%;
        text-align: center;
        color: #747474;
        background-color: #ffffff;
      }
  
      h1,h2,h3,h4,h5,h6 {
        font-family: Helvetica, Arial, sans-serif;
        line-height: 1.1;
      }
  
      h1 small, h2 small, h3 small, h4 small, h5 small, h6 small {
        font-size: 60%;
        line-height: 0;
        text-transform: none;
      }
  
      h1 {
        font-weight:200;
        font-size: 44px;
      }
  
      h2 {
        font-weight:200;
        font-size: 32px;
        margin-bottom: 14px;
      }
  
      h3 {
        font-weight:500;
        font-size: 27px;
      }
  
      h4 {
        font-weight:500;
        font-size: 23px;
      }
  
      h5 {
        font-weight:900;
        font-size: 17px;
      }
  
      h6 {
        font-weight:900;
        font-size: 14px;
        text-transform: uppercase;
      }
  
      .collapse {
        margin:0!important;
      }
  
      td, div {
        font-family: Helvetica, Arial, sans-serif;
        text-align: center;
      }
  
      p, ul {
        margin-bottom: 10px;
        font-weight: normal;
        font-size:14px;
        line-height:1.6;
      }
  
      p.lead {
        font-size:17px;
      }
  
      p.last {
        margin-bottom:0px;
      }
  
      ul li {
        margin-left:5px;
        list-style-position: inside;
      }
  
      a {
        color: #747474;
        text-decoration: none;
      }
  
      a img {
        border: none;
      }
  
      .head-wrap {
        width: 100%;
        margin: 0 auto;
        background-color: #f9f8f8;
        border-bottom: 1px solid #d8d8d8;
      }
  
      .head-wrap * {
        margin: 0;
        padding: 0;
      }
  
      .header-background {
        background: repeat-x url(https://www.filepicker.io/api/file/wUGKTIOZTDqV2oJx5NCh) left bottom;
      }
  
      .header {
        height: 42px;
      }
  
      .header .content {
        padding: 0;
      }
  
      .header .brand {
        font-size: 16px;
        line-height: 42px;
        font-weight: bold;
      }
  
      .header .brand a {
        color: #464646;
      }
  
      .body-wrap {
        width: 505px;
        margin: 0 auto;
        background-color: #ffffff;
      }
  
      .soapbox .soapbox-title {
        font-size: 21px;
        color: #464646;
        padding-top: 35px;
      }
  
      .content .status-container.single .status-padding {
        width: 80px;
      }
  
      .content .status {
        width: 90%;
      }
  
      .content .status-container.single .status {
        width: 300px;
      }
  
      .status {
        border-collapse: collapse;
        margin-left: 15px;
        color: #656565;
      }
  
      .status .status-cell {
        border: 1px solid #b3b3b3;
        height: 50px;
      }
  
      .status .status-cell.success,
      .status .status-cell.active {
        height: 65px;
      }
  
      .status .status-cell.success {
        background: #f2ffeb;
        color: #51da42;
      }
  
      .status .status-cell.success .status-title {
        font-size: 15px;
      }
  
      .status .status-cell.active {
        background: #fffde0;
        width: 135px;
      }
  
      .status .status-title {
        font-size: 16px;
        font-weight: bold;
        line-height: 23px;
      }
  
      .status .status-image {
        vertical-align: text-bottom;
      }
  
      .body .body-padded,
      .body .body-padding {
        padding-top: 34px;
      }
  
      .body .body-padding {
        width: 41px;
      }
  
      .body-padded,
      .body-title {
        text-align: left;
      }
  
      .body .body-title {
        font-weight: bold;
        font-size: 17px;
        color: #464646;
      }
  
      .body .body-text .body-text-cell {
        text-align: left;
        font-size: 14px;
        line-height: 1.6;
        padding: 9px 0 17px;
      }
  
      .body .body-text-cell a {
        color: #464646;
        text-decoration: underline;
      }
  
      .body .body-signature-block .body-signature-cell {
        padding: 25px 0 30px;
        text-align: left;
      }
  
      .body .body-signature {
        font-family: "Comic Sans MS", Textile, cursive;
        font-weight: bold;
      }
  
      .footer-wrap {
        width: 100%;
        margin: 0 auto;
        clear: both !important;
        background-color: #e5e5e5;
        border-top: 1px solid #b3b3b3;
        font-size: 12px;
        color: #656565;
        line-height: 30px;
      }
  
      .footer-wrap .container {
        padding: 14px 0;
      }
  
      .footer-wrap .container .content {
        padding: 0;
      }
  
      .footer-wrap .container .footer-lead {
        font-size: 14px;
      }
  
      .footer-wrap .container .footer-lead a {
        font-size: 14px;
        font-weight: bold;
        color: #535353;
      }
  
      .footer-wrap .container a {
        font-size: 12px;
        color: #656565;
      }
  
      .footer-wrap .container a.last {
        margin-right: 0;
      }
  
      .footer-wrap .footer-group {
        display: inline-block;
      }
  
      .container {
        display: block !important;
        max-width: 705px !important;
        clear: both !important;
      }
  
      .content {
        padding: 0;
        max-width: 600px;
        margin: 0 auto;
        display: block;
      }
  
      .content table {
        width: 100%;
      }
  
  
      .clear {
        display: block;
        clear: both;
      }
  
      table.full-width-gmail-android {
        width: 100% !important;
      }
  
      </style>
  
      <style type="text/css" media="only screen">
  
      @media only screen {
  
        table[class*="head-wrap"],
        table[class*="body-wrap"],
        table[class*="footer-wrap"] {
          width: 100% !important;
        }
  
        td[class*="container"] {
          margin: 0 auto !important;
        }
  
      }
  
      @media only screen and (max-width: 505px) {
  
        *[class*="w320"] {
          width: 320px !important;
        }
  
        table[class="soapbox"] td[class*="soapbox-title"],
        table[class="body"] td[class*="body-padded"] {
          padding-top: 24px;
        }
      }
      </style>
    </head>
  
    <body bgcolor="#ffffff">
  
      <div align="center">
        <table class="head-wrap w320 full-width-gmail-android" bgcolor="#f9f8f8" cellpadding="0" cellspacing="0" border="0">
          <tr>
            <td background="https://www.filepicker.io/api/file/UOesoVZTFObSHCgUDygC" bgcolor="#ffffff" width="100%" height="8" valign="top">
              <!--[if gte mso 9]>
              <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="mso-width-percent:1000;height:8px;">
                <v:fill type="tile" src="https://www.filepicker.io/api/file/UOesoVZTFObSHCgUDygC" color="#ffffff" />
                <v:textbox inset="0,0,0,0">
              <![endif]-->
              <div height="8">
              </div>
              <!--[if gte mso 9]>
                </v:textbox>
              </v:rect>
              <![endif]-->
            </td>
          </tr>
          <tr class="header-background">
            <td class="header container" align="center">
              <div class="content">
                <span class="brand">
                  <a href="#">
  
                  </a>
                </span>
              </div>
            </td>
          </tr>
        </table>
  
        <table class="body-wrap w320">
          <tr>
            <td></td>
            <td class="container">
              <div class="content">
                <table cellspacing="0">
                  <tr>
                    <td>
                      <table class="soapbox">
                        <tr>
                          <td class="soapbox-title">Permintaan Untuk Pemenuhan Persyarata Sertifikasi Badan Usaha</td>
                        </tr>
                      </table>
                      <table class="body">
                        <tr>
                          <td class="body-padding"></td>
                          <td class="body-padded">
                            <div class="body-title">Kepada Yth<br>
                            Pimpinan Badan Usaha<br>
                            di Tempat<br></div>
                            <table class="body-text">
                              <tr>
                                <td class="body-text-cell">
                               
https://lpjk.pu.go.id/laporan-lpjk/ketidaksesuaian-persyaratan (cek disini)<br><br>
                                  
                                  
Dengan hormat,<br>

Sehubungan dengan kewajiban pemenuhan dokumen Sistem Manajemen Anti Penyuapan (SMAP) serta kelengkapan peralatan sebagaimana diatur dalam ketentuan peraturan perundang-undangan dan pedoman sertifikasi Badan Usaha, bersama ini kami sampaikan bahwa:<br>

Badan Usaha Saudara diminta untuk segera melengkapi:<br>

1. Dokumen penerapan SMAP yang sesuai standar; dan<br>

2. Peralatan yang menjadi persyaratan teknis operasional,<br>

dalam jangka waktu paling lambat 14 (empat belas) hari kalender sejak tanggal surat ini.<br>

Apabila hingga batas waktu yang telah ditentukan Badan Usaha tidak memenuhi kelengkapan tersebut, maka dengan sangat menyesal kami akan menindaklanjuti dengan pencabutan Sertifikat Badan Usaha sesuai ketentuan yang berlaku.<br>

Demikian pemberitahuan ini kami sampaikan untuk menjadi perhatian dan segera ditindaklanjuti. Atas kerja sama dan perhatiannya, kami ucapkan terima kasih.<br>

Hormat kami,<br>
                                </td>
                              </tr>
                            </table>
  
                            <table class="body-signature-block">
                              <tr>
                                <td class="body-signature-cell">
                                  <p>Terimakasih.</p>
  
                                </td>
                              </tr>
                            </table>
                          </td>
                          <td class="body-padding"></td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </div>
            </td>
            <td></td>
          </tr>
        </table>
  
        <div class="footer" style="clear: both; Margin-top: 10px; text-align: center; width: 100%; ">
          <table bgcolor="#e5e5e5" role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; ">
            <tr>
            <td style="padding-bottom:25px;padding-top:22px;width:100%;padding-right:0px;padding-left:0px;">
            <div align="center" style="line-height:10px"><img alt="Image" src="' . base_url('assets/media/logos/Logo_gapeknas.png') . '" style=" border: 0; width: 150px; max-width: 3000px;" title="Image" width="80"/></div>
            </td>
            </tr>
            <tr>
            <td class="content-block" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
              <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">GAPEKNAS - PT LSBU GAPEKNAS INFRASTRUKTUR</span>
              <br>
              <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">Ruko Graha Mas Pemuda Blok AD No. 21 Jl. Pemuda, Rawamangun</span>
              <br>
              <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">Jakarta Timur</span>
            </td>
            </tr>
  
          </table>
        </div>
  
      </div>
  
    </body>
    </html>
    ';
    return $html;
  }
  function notif_email($isi_email)
  {
    $html = '
      <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml">
      <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width" />
        <title>Email Notification</title>
        <style type="text/css">

        * {
          margin:0;
          padding:0;
          font-family: Helvetica, Arial, sans-serif;
        }

        img {
          max-width: 100%;
          outline: none;
          text-decoration: none;
          -ms-interpolation-mode: bicubic;
        }

        .image-fix {
          display:block;
        }

        .collapse {
          margin:0;
          padding:0;
        }

        body {
          -webkit-font-smoothing:antialiased;
          -webkit-text-size-adjust:none;
          width: 100%!important;
          height: 100%;
          text-align: center;
          color: #747474;
          background-color: #ffffff;
        }

        h1,h2,h3,h4,h5,h6 {
          font-family: Helvetica, Arial, sans-serif;
          line-height: 1.1;
        }

        h1 small, h2 small, h3 small, h4 small, h5 small, h6 small {
          font-size: 60%;
          line-height: 0;
          text-transform: none;
        }

        h1 {
          font-weight:200;
          font-size: 44px;
        }

        h2 {
          font-weight:200;
          font-size: 32px;
          margin-bottom: 14px;
        }

        h3 {
          font-weight:500;
          font-size: 27px;
        }

        h4 {
          font-weight:500;
          font-size: 23px;
        }

        h5 {
          font-weight:900;
          font-size: 17px;
        }

        h6 {
          font-weight:900;
          font-size: 14px;
          text-transform: uppercase;
        }

        .collapse {
          margin:0!important;
        }

        td, div {
          font-family: Helvetica, Arial, sans-serif;
          text-align: center;
        }

        p, ul {
          margin-bottom: 10px;
          font-weight: normal;
          font-size:14px;
          line-height:1.6;
        }

        p.lead {
          font-size:17px;
        }

        p.last {
          margin-bottom:0px;
        }

        ul li {
          margin-left:5px;
          list-style-position: inside;
        }

        a {
          color: #747474;
          text-decoration: none;
        }

        a img {
          border: none;
        }

        .head-wrap {
          width: 100%;
          margin: 0 auto;
          background-color: #f9f8f8;
          border-bottom: 1px solid #d8d8d8;
        }

        .head-wrap * {
          margin: 0;
          padding: 0;
        }

        .header-background {
          background: repeat-x url(https://www.filepicker.io/api/file/wUGKTIOZTDqV2oJx5NCh) left bottom;
        }

        .header {
          height: 42px;
        }

        .header .content {
          padding: 0;
        }

        .header .brand {
          font-size: 16px;
          line-height: 42px;
          font-weight: bold;
        }

        .header .brand a {
          color: #464646;
        }

        .body-wrap {
          width: 505px;
          margin: 0 auto;
          background-color: #ffffff;
        }

        .soapbox .soapbox-title {
          font-size: 21px;
          color: #464646;
          padding-top: 35px;
        }

        .content .status-container.single .status-padding {
          width: 80px;
        }

        .content .status {
          width: 90%;
        }

        .content .status-container.single .status {
          width: 300px;
        }

        .status {
          border-collapse: collapse;
          margin-left: 15px;
          color: #656565;
        }

        .status .status-cell {
          border: 1px solid #b3b3b3;
          height: 50px;
        }

        .status .status-cell.success,
        .status .status-cell.active {
          height: 65px;
        }

        .status .status-cell.success {
          background: #f2ffeb;
          color: #51da42;
        }

        .status .status-cell.success .status-title {
          font-size: 15px;
        }

        .status .status-cell.active {
          background: #fffde0;
          width: 135px;
        }

        .status .status-title {
          font-size: 16px;
          font-weight: bold;
          line-height: 23px;
        }

        .status .status-image {
          vertical-align: text-bottom;
        }

        .body .body-padded,
        .body .body-padding {
          padding-top: 34px;
        }

        .body .body-padding {
          width: 41px;
        }

        .body-padded,
        .body-title {
          text-align: left;
        }

        .body .body-title {
          font-weight: bold;
          font-size: 17px;
          color: #464646;
        }

        .body .body-text .body-text-cell {
          text-align: left;
          font-size: 14px;
          line-height: 1.6;
          padding: 9px 0 17px;
        }

        .body .body-text-cell a {
          color: #464646;
          text-decoration: underline;
        }

        .body .body-signature-block .body-signature-cell {
          padding: 25px 0 30px;
          text-align: left;
        }

        .body .body-signature {
          font-family: "Comic Sans MS", Textile, cursive;
          font-weight: bold;
        }

        .footer-wrap {
          width: 100%;
          margin: 0 auto;
          clear: both !important;
          background-color: #e5e5e5;
          border-top: 1px solid #b3b3b3;
          font-size: 12px;
          color: #656565;
          line-height: 30px;
        }

        .footer-wrap .container {
          padding: 14px 0;
        }

        .footer-wrap .container .content {
          padding: 0;
        }

        .footer-wrap .container .footer-lead {
          font-size: 14px;
        }

        .footer-wrap .container .footer-lead a {
          font-size: 14px;
          font-weight: bold;
          color: #535353;
        }

        .footer-wrap .container a {
          font-size: 12px;
          color: #656565;
        }

        .footer-wrap .container a.last {
          margin-right: 0;
        }

        .footer-wrap .footer-group {
          display: inline-block;
        }

        .container {
          display: block !important;
          max-width: 505px !important;
          clear: both !important;
        }

        .content {
          padding: 0;
          max-width: 505px;
          margin: 0 auto;
          display: block;
        }

        .content table {
          width: 100%;
        }


        .clear {
          display: block;
          clear: both;
        }

        table.full-width-gmail-android {
          width: 100% !important;
        }

        </style>

        <style type="text/css" media="only screen">

        @media only screen {

          table[class*="head-wrap"],
          table[class*="body-wrap"],
          table[class*="footer-wrap"] {
            width: 100% !important;
          }

          td[class*="container"] {
            margin: 0 auto !important;
          }

        }

        @media only screen and (max-width: 505px) {

          *[class*="w320"] {
            width: 320px !important;
          }

          table[class="soapbox"] td[class*="soapbox-title"],
          table[class="body"] td[class*="body-padded"] {
            padding-top: 24px;
          }
        }
        </style>
      </head>

      <body bgcolor="#ffffff">

        <div align="center">
          <table class="head-wrap w320 full-width-gmail-android" bgcolor="#f9f8f8" cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td background="https://www.filepicker.io/api/file/UOesoVZTFObSHCgUDygC" bgcolor="#ffffff" width="100%" height="8" valign="top">
                <!--[if gte mso 9]>
                <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="mso-width-percent:1000;height:8px;">
                  <v:fill type="tile" src="https://www.filepicker.io/api/file/UOesoVZTFObSHCgUDygC" color="#ffffff" />
                  <v:textbox inset="0,0,0,0">
                <![endif]-->
                <div height="8">
                </div>
                <!--[if gte mso 9]>
                  </v:textbox>
                </v:rect>
                <![endif]-->
              </td>
            </tr>
            <tr class="header-background">
              <td class="header container" align="center">
                <div class="content">
                  <span class="brand">
                    <a href="#">

                    </a>
                  </span>
                </div>
              </td>
            </tr>
          </table>

          <table class="body-wrap w320">
            <tr>
              <td></td>
              <td class="container">
                <div class="content">
                  <table cellspacing="0">
                    <tr>
                      <td>
                        <table class="soapbox">
                          <tr>
                            <td class="soapbox-title">Permohonan Survailen Anda Masih Terdapat Kekurangan Berkas</td>
                          </tr>
                        </table>
                        <table class="body">
                          <tr>
                            <td class="body-padding"></td>
                            <td class="body-padded">
                              <div class="body-title">Hi There,</div>
                              <table class="body-text">
                                <tr>
                                  <td class="body-text-cell">
                                    Data permohonan anda masih terdapat kekurangan sebagai berikut :
                                  </td>
                                </tr>
                              </table>
                              <table class="body-text">
                                <tr>
                                  <td class="body-text-cell">
                                    ' . $isi_email . '
                                  </td>
                                </tr>
                              </table>
                              <table class="body-signature-block">
                                <tr>
                                  <td class="body-signature-cell">
                                    <p>Data kekurangan di atas adalah data berkas permohonan yang harus anda perbaiki di Aplikasi Survailen LSBU GAPEKNAS.</p>

                                  </td>
                                </tr>
                              </table>
                            </td>
                            <td class="body-padding"></td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>
              </td>
              <td></td>
            </tr>
          </table>

          <div class="footer" style="clear: both; Margin-top: 10px; text-align: center; width: 100%; ">
            <table bgcolor="#e5e5e5" role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; ">
              <tr>
              <td style="padding-bottom:25px;padding-top:22px;width:100%;padding-right:0px;padding-left:0px;">
              <div align="center" style="line-height:10px"><img alt="Image" src="' . base_url('assets/media/logos/Logo_gapeknas.png') . '" style=" border: 0; width: 150px; max-width: 3000px;" title="Image" width="80"/></div>
              </td>
              </tr>
              <tr>
              <td class="content-block" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
                <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">GAPEKNAS - PT LSBU GAPEKNAS INFRASTRUKTUR</span>
                <br>
                <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">Ruko Graha Mas Pemuda Blok AD No. 21 Jl. Pemuda, Rawamangun</span>
                <br>
                <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">Jakarta Timur</span>
              </td>
              </tr>

            </table>
          </div>

        </div>

      </body>
      </html>
      ';
    return $html;
  }
  function getBulanrw($blnrw)
  {
    switch ($blnrw) {
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


  function getBulan($bln)
  {
    switch ($bln) {
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

  function notif_email2($nib, $tgl_permohonan)
  {
    $html = '
      <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
      <html xmlns="http://www.w3.org/1999/xhtml">
      <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width" />
        <title>Email Notification</title>
        <style type="text/css">

        * {
          margin:0;
          padding:0;
          font-family: Helvetica, Arial, sans-serif;
        }

        img {
          max-width: 100%;
          outline: none;
          text-decoration: none;
          -ms-interpolation-mode: bicubic;
        }

        .image-fix {
          display:block;
        }

        .collapse {
          margin:0;
          padding:0;
        }

        body {
          -webkit-font-smoothing:antialiased;
          -webkit-text-size-adjust:none;
          width: 100%!important;
          height: 100%;
          text-align: center;
          color: #747474;
          background-color: #ffffff;
        }

        h1,h2,h3,h4,h5,h6 {
          font-family: Helvetica, Arial, sans-serif;
          line-height: 1.1;
        }

        h1 small, h2 small, h3 small, h4 small, h5 small, h6 small {
          font-size: 60%;
          line-height: 0;
          text-transform: none;
        }

        h1 {
          font-weight:200;
          font-size: 44px;
        }

        h2 {
          font-weight:200;
          font-size: 32px;
          margin-bottom: 14px;
        }

        h3 {
          font-weight:500;
          font-size: 27px;
        }

        h4 {
          font-weight:500;
          font-size: 23px;
        }

        h5 {
          font-weight:900;
          font-size: 17px;
        }

        h6 {
          font-weight:900;
          font-size: 14px;
          text-transform: uppercase;
        }

        .collapse {
          margin:0!important;
        }

        td, div {
          font-family: Helvetica, Arial, sans-serif;
          text-align: center;
        }

        p, ul {
          margin-bottom: 10px;
          font-weight: normal;
          font-size:14px;
          line-height:1.6;
        }

        p.lead {
          font-size:17px;
        }

        p.last {
          margin-bottom:0px;
        }

        ul li {
          margin-left:5px;
          list-style-position: inside;
        }

        a {
          color: #747474;
          text-decoration: none;
        }

        a img {
          border: none;
        }

        .head-wrap {
          width: 100%;
          margin: 0 auto;
          background-color: #f9f8f8;
          border-bottom: 1px solid #d8d8d8;
        }

        .head-wrap * {
          margin: 0;
          padding: 0;
        }

        .header-background {
          background: repeat-x url(https://www.filepicker.io/api/file/wUGKTIOZTDqV2oJx5NCh) left bottom;
        }

        .header {
          height: 42px;
        }

        .header .content {
          padding: 0;
        }

        .header .brand {
          font-size: 16px;
          line-height: 42px;
          font-weight: bold;
        }

        .header .brand a {
          color: #464646;
        }

        .body-wrap {
          width: 505px;
          margin: 0 auto;
          background-color: #ffffff;
        }

        .soapbox .soapbox-title {
          font-size: 21px;
          color: #464646;
          padding-top: 35px;
        }

        .content .status-container.single .status-padding {
          width: 80px;
        }

        .content .status {
          width: 90%;
        }

        .content .status-container.single .status {
          width: 300px;
        }

        .status {
          border-collapse: collapse;
          margin-left: 15px;
          color: #656565;
        }

        .status .status-cell {
          border: 1px solid #b3b3b3;
          height: 50px;
        }

        .status .status-cell.success,
        .status .status-cell.active {
          height: 65px;
        }

        .status .status-cell.success {
          background: #f2ffeb;
          color: #51da42;
        }

        .status .status-cell.success .status-title {
          font-size: 15px;
        }

        .status .status-cell.active {
          background: #fffde0;
          width: 135px;
        }

        .status .status-title {
          font-size: 16px;
          font-weight: bold;
          line-height: 23px;
        }

        .status .status-image {
          vertical-align: text-bottom;
        }

        .body .body-padded,
        .body .body-padding {
          padding-top: 34px;
        }

        .body .body-padding {
          width: 41px;
        }

        .body-padded,
        .body-title {
          text-align: left;
        }

        .body .body-title {
          font-weight: bold;
          font-size: 17px;
          color: #464646;
        }

        .body .body-text .body-text-cell {
          text-align: left;
          font-size: 14px;
          line-height: 1.6;
          padding: 9px 0 17px;
        }

        .body .body-text-cell a {
          color: #464646;
          text-decoration: underline;
        }

        .body .body-signature-block .body-signature-cell {
          padding: 25px 0 30px;
          text-align: left;
        }

        .body .body-signature {
          font-family: "Comic Sans MS", Textile, cursive;
          font-weight: bold;
        }

        .footer-wrap {
          width: 100%;
          margin: 0 auto;
          clear: both !important;
          background-color: #e5e5e5;
          border-top: 1px solid #b3b3b3;
          font-size: 12px;
          color: #656565;
          line-height: 30px;
        }

        .footer-wrap .container {
          padding: 14px 0;
        }

        .footer-wrap .container .content {
          padding: 0;
        }

        .footer-wrap .container .footer-lead {
          font-size: 14px;
        }

        .footer-wrap .container .footer-lead a {
          font-size: 14px;
          font-weight: bold;
          color: #535353;
        }

        .footer-wrap .container a {
          font-size: 12px;
          color: #656565;
        }

        .footer-wrap .container a.last {
          margin-right: 0;
        }

        .footer-wrap .footer-group {
          display: inline-block;
        }

        .container {
          display: block !important;
          max-width: 505px !important;
          clear: both !important;
        }

        .content {
          padding: 0;
          max-width: 505px;
          margin: 0 auto;
          display: block;
        }

        .content table {
          width: 100%;
        }


        .clear {
          display: block;
          clear: both;
        }

        table.full-width-gmail-android {
          width: 100% !important;
        }

        </style>

        <style type="text/css" media="only screen">

        @media only screen {

          table[class*="head-wrap"],
          table[class*="body-wrap"],
          table[class*="footer-wrap"] {
            width: 100% !important;
          }

          td[class*="container"] {
            margin: 0 auto !important;
          }

        }

        @media only screen and (max-width: 505px) {

          *[class*="w320"] {
            width: 320px !important;
          }

          table[class="soapbox"] td[class*="soapbox-title"],
          table[class="body"] td[class*="body-padded"] {
            padding-top: 24px;
          }
        }
        </style>
      </head>

      <body bgcolor="#ffffff">

        <div align="center">
          <table class="head-wrap w320 full-width-gmail-android" bgcolor="#f9f8f8" cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td background="https://www.filepicker.io/api/file/UOesoVZTFObSHCgUDygC" bgcolor="#ffffff" width="100%" height="8" valign="top">
                <!--[if gte mso 9]>
                <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="mso-width-percent:1000;height:8px;">
                  <v:fill type="tile" src="https://www.filepicker.io/api/file/UOesoVZTFObSHCgUDygC" color="#ffffff" />
                  <v:textbox inset="0,0,0,0">
                <![endif]-->
                <div height="8">
                </div>
                <!--[if gte mso 9]>
                  </v:textbox>
                </v:rect>
                <![endif]-->
              </td>
            </tr>
            <tr class="header-background">
              <td class="header container" align="center">
                <div class="content">
                  <span class="brand">
                    <a href="#">

                    </a>
                  </span>
                </div>
              </td>
            </tr>
          </table>

          <table class="body-wrap w320">
            <tr>
              <td></td>
              <td class="container">
                <div class="content">
                  <table cellspacing="0">
                    <tr>
                      <td>
                        <table class="soapbox">
                          <tr>
                            <td class="soapbox-title">Permohonan Survailen Badan Usaha</td>
                          </tr>
                        </table>
                        <table class="body">
                          <tr>
                            <td class="body-padding"></td>
                            <td class="body-padded">
                              <div class="body-title">
                              	
                              Kepada Yth<br>
                              Pimpinan Badan Usaha<br>
                              di Tempat
                              </div>
                              <table class="body-text">
                                <tr>
                                  <td class="body-text-cell">
                                    Kami ingin memberitahukan bahwa kami sedang melakukan program survailen terhadap badan usaha pemilik Sertifikat Badan Usaha (SBU) yang sudah terbit terhitung satu tahun. Surveilans ini bertujuan untuk memperoleh pemahaman yang lebih mendalam tentang status sertifikasi badan usaha dan memastikan kepatuhan terhadap standar yang berlaku

                                    <br>
                                    <br>
                                    Untuk melaksanakan surveilans ini, kami memerlukan kerjasama dari Anda dalam memperbaiki data permohonan yang telah kami lakukan pemeriksaan. Data yang diberikan akan diolah secara rahasia dan hanya akan digunakan untuk kepentingan evaluasi sertifikasi badan usaha.
                                    <br>
                                    <br>
                                    Silakan mengakses dokumen perbaikan survailen melalui tautan berikut :
                                  
                                    </td>
                                </tr>
                              </table>
                              <div><!--[if mso]>
                                <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="#" style="height:38px;v-text-anchor:middle;width:230px;" arcsize="11%" strokecolor="#407429" fill="t">
                                  <v:fill type="tile" src="https://www.filepicker.io/api/file/N8GiNGsmT6mK6ORk00S7" color="#41CC00" />
                                  <w:anchorlock/>
                                  <center style="color:#ffffff;font-family:sans-serif;font-size:17px;font-weight:bold;">Review Account Settings</center>
                                </v:roundrect>
                              <![endif]--><a href="' . base_url('survailen/dokumen_survailen/' . $nib . '/' . $tgl_permohonan) . '"
                              style="background-color:#E52121;border:1px solid #E52121;border-radius:4px;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:17px;font-weight:bold;line-height:38px;text-align:center;text-decoration:none;width:230px;-webkit-text-size-adjust:none;mso-hide:all;">Click Me!</a></div>
                              <table class="body-signature-block">
                                <tr>
                                  <td class="body-signature-cell">
                                    <p>Tombol di atas berisikan hasil survailen badan usaha anda. Jika Anda mengalami kendala atau memiliki pertanyaan terkait pengisian formulir, jangan ragu untuk menghubungi kami.
                                    
                                    <br>
                                    Terima kasih atas kerjasama Anda dalam menjalani surveilans sertifikasi ini. Kontribusi Anda sangat berarti untuk memastikan keberlanjutan standar kualitas dan kepatuhan dalam bisnis Anda.</p>

                                  </td>
                                </tr>
                              </table>
                            </td>
                            <td class="body-padding"></td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </div>
              </td>
              <td></td>
            </tr>
          </table>

          <div class="footer" style="clear: both; Margin-top: 10px; text-align: center; width: 100%; ">
            <table bgcolor="#e5e5e5" role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; ">
              <tr>
              <td style="padding-bottom:25px;padding-top:22px;width:100%;padding-right:0px;padding-left:0px;">
              <div align="center" style="line-height:10px"><img alt="Image" src="' . base_url('assets/media/logos/Logo_gapeknas.png') . '" style=" border: 0; width: 150px; max-width: 3000px;" title="Image" width="80"/></div>
              </td>
              </tr>
              <tr>
              <td class="content-block" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
                <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">GAPEKNAS - PT LSBU GAPEKNAS INFRASTRUKTUR</span>
                <br>
                <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">Ruko Graha Mas Pemuda Blok AD No. 21 Jl. Pemuda, Rawamangun</span>
                <br>
                <span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">Jakarta Timur</span>
              </td>
              </tr>

            </table>
          </div>

        </div>

      </body>
      </html>
      ';
    return $html;
  }
}
