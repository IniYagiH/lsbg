<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inbox extends CI_Controller{
public function __construct(){
  parent::__construct();
  $this->load->model('bu/Bu_model');
  $this->load->helper(array('url','html','file','form','security'));
  $this->load->library(array('ion_auth','form_validation','Template'));
  $this->load->helper('Ssl');
}
function dokumen_penilaian2($id1,$id2){
  $this->data=array();
  $this->load->view('empat_nol_empat',$this->data);

}
function dokumen_pemutus($nib_dec, $tgl_dec)
{
 
    $nib = decrypt_url($nib_dec);
    $tgl_permohonan = decrypt_url($tgl_dec);
    $tanggal = date('Y-m-d');
    $hari   = date('l', microtime($tanggal));
    $record = $this->Bu_model->berita_acara($nib, $tgl_permohonan);
    $record_klasifikasi = $this->Bu_model->klasifikasi_kualifikasi_opr_penilaian($nib, $tgl_permohonan);
    $data_nilai = array();
    $this->load->library('pdfgenerator');
    $hari_indonesia = array(
      'Monday'  => 'Senin',
      'Tuesday'  => 'Selasa',
      'Wednesday' => 'Rabu',
      'Thursday' => 'Kamis',
      'Friday' => 'Jumat',
      'Saturday' => 'Sabtu',
      'Sunday' => 'Minggu'
    );
    $i = 0;
    for ($x = 0; $x < count($record_klasifikasi); $x++) {
      if (count($data_nilai) == 0) {
        $data_nilai[$i] = array(
          'id_sub_klasifikasi' => $record_klasifikasi[$x]['id_sub_klasifikasi'],
          'count' => 0,
          'hasil_akhir' => 'TRUE',
          'nomor_kbli' => $record_klasifikasi[$x]['nomor_kbli'],
          'deskripsi_subklasifikasi' => $record_klasifikasi[$x]['deskripsi_subklasifikasi'],
        );
        foreach ($record as $row) {
          if ($record_klasifikasi[$x]['id_sub_klasifikasi'] == $row['id_sub_klasifikasi']) {
            $data_nilai[$i]['count'] = $data_nilai[$i]['count'] + 1;
            $data_nilai[$i]['pemenuhan_penjualan_tahunan'] = $row['pemenuhan_penjualan_tahunan'];
            $data_nilai[$i]['pemenuhan_peralatan'] = $row['pemenuhan_peralatan'];
            $data_nilai[$i]['pemenuhan_smm'] = $row['pemenuhan_smm'];
            $data_nilai[$i]['pemenuhan_smap'] = $row['pemenuhan_smap'];
            $data_nilai[$i]['tk'] = $row['tk'];
            $data_nilai[$i]['aset'] = $row['aset'];
            $data_nilai[$i]['peralatan'] = $row['peralatan'];
            $data_nilai[$i]['penjualan_tahunan'] = $row['penjualan_tahunan'];
            $data_nilai[$i]['smm'] = $row['smm'];
            $data_nilai[$i]['smap'] = $row['smap'];
            $data_nilai[$i]['kualifikasi'] = $row['kualifikasi'];
            $data_nilai[$i]['id_klasifikasi'] = $row['id_klasifikasi'];
            $data_nilai[$i]['pemutus'] = $row['pemutus'];
            $data_nilai[$i]['keputusan_asesor'] = $row['hasil_akhir'];
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
          'nomor_kbli' => $record_klasifikasi[$x]['nomor_kbli'],
          'deskripsi_subklasifikasi' => $record_klasifikasi[$x]['deskripsi_subklasifikasi'],
        );
        foreach ($record as $row) {
          if ($record_klasifikasi[$x]['id_sub_klasifikasi'] == $row['id_sub_klasifikasi']) {
            $data_nilai[$i]['count'] = $data_nilai[$i]['count'] + 1;
            $data_nilai[$i]['pemenuhan_penjualan_tahunan'] = $row['pemenuhan_penjualan_tahunan'];
            $data_nilai[$i]['pemenuhan_peralatan'] = $row['pemenuhan_peralatan'];
            $data_nilai[$i]['pemenuhan_smm'] = $row['pemenuhan_smm'];
            $data_nilai[$i]['pemenuhan_smap'] = $row['pemenuhan_smap'];
            $data_nilai[$i]['tk'] = $row['tk'];
            $data_nilai[$i]['aset'] = $row['aset'];
            $data_nilai[$i]['peralatan'] = $row['peralatan'];
            $data_nilai[$i]['penjualan_tahunan'] = $row['penjualan_tahunan'];
            $data_nilai[$i]['smm'] = $row['smm'];
            $data_nilai[$i]['smap'] = $row['smap'];
            $data_nilai[$i]['pemutus'] = $row['pemutus'];
            $data_nilai[$i]['kualifikasi'] = $row['kualifikasi'];
            $data_nilai[$i]['id_klasifikasi'] = $row['id_klasifikasi'];
            $data_nilai[$i]['keputusan_asesor'] = $row['hasil_akhir'];
            if ($row['pemutus'] == 0) {
              $data_nilai[$i]['hasil_akhir'] = 'FALSE';
            }
          }
        }
      }
    }
    $rec = $this->Bu_model->check_permohonan($nib, $tgl_permohonan);
    $bulan = $month = date("m", strtotime($tgl_permohonan));
    $tahun = $month = date("Y", strtotime($tgl_permohonan));
    $bulan_romawi = $this->getBulanrw($bulan);
    $panjang = strlen($rec[0]['no_urut']);
    $jumlah = 5 - $panjang;
    $nol = '';
    for ($i = 0; $i < $jumlah; $i++) {
      $nol = $nol . '0';
    }
    $no_surat = $nol . $rec[0]['no_urut'] . '/GAPEKNAS/KKT/' . $bulan_romawi . '/' . $tahun;
    $reco2 = $this->Bu_model->get_surat_tugas($nib, $tgl_permohonan);
    $surat_tugas = $reco2[0]['no_surat'];
    $data = array(
      'surat_tugas' => $surat_tugas,
      'no_surat' => $no_surat,
      'bulan' => $this->getBulan(date("m")),
      'hari' => $hari_indonesia[$hari],
      'record2' => $record,
      'record' => $data_nilai,
      'biodata' => $this->Bu_model->biodata_opr($nib),
      'komite' => $this->Bu_model->get_komite_teknis($nib, $tgl_permohonan)
    );


    $html = $this->load->view('sertifikasi/berita_acara_tim_pemutus', $data, true);
    $filename = 'report_' . time();
    //$this->load->view('sertifikasi/berita_acara_tim_pemutus',$data);

    $this->pdfgenerator->generate($html, $filename, true, 'A3', 'landscape');
  
}
function dokumen_evaluator($id1, $id2)
{
   $tgl = decrypt_url($id2);
    $nib = decrypt_url($id1);
    $this->load->library('pdfgenerator');
    $data = array(
      'asesor' => $this->Bu_model->cek_pilih_asesor2($nib, $tgl),
      'biodata' => $this->Bu_model->biodata_opr($nib),
      'record' => $this->Bu_model->berita_acara2($nib, $tgl),
    );
    $html = $this->load->view('sertifikasi/berita_acara', $data, true);
    $filename = 'report_' . time();

    $this->pdfgenerator->generate($html, $filename, true, 'A3', 'landscape');
    //$this->load->view('report/tt_asosiasi_bu_ceklis',$data);

}
function dokumen_tinjauan($id1, $id2)
  {

      $tgl = decrypt_url($id2);
      $nib = decrypt_url($id1);
      $status = "1";
      $record = $this->Bu_model->get_ceklis($nib, $tgl, $status);
      $this->load->library('pdfgenerator');
      $this->data = array(
        'ceklis' => $record,
        'tgl' => $tgl,
        'biodata' => $this->Bu_model->biodata_opr($nib),
        'pengurus' => $this->Bu_model->pengurus_opr($nib),
        'penjualan_tahunan' => $this->Bu_model->pengalaman_opr($nib),
        'akte' => $this->Bu_model->akte_opr($nib),
        'smm' => $this->Bu_model->smm_opr($nib),
        'smap' => $this->Bu_model->smap_opr($nib),
        'sk_kehakiman' => $this->Bu_model->sk_kehakiman_opr($nib),
        'neraca' => $this->Bu_model->neraca_ski($nib),
        'pemegang_saham' => $this->Bu_model->pemegang_saham_opr($nib),
        'pjbu' => $this->Bu_model->pjbu_opr($nib),
        'pjskbu' => $this->Bu_model->pjskbu_opr($nib),
        'pjtbu' => $this->Bu_model->pjtbu_opr($nib),
        'peralatan' => $this->Bu_model->peralatan_opr($nib),
        'klasifikasi' => $this->Bu_model->klasifikasi_kualifikasi_opr($nib, $tgl),
        'nib_dec' => $id1,
        'tgl_dec' => $id2,
      );
      $html = $this->load->view('sertifikasi/verifikasi_ceklis', $this->data, true);
      $filename = 'Tinjauan_Permohonan_' . $nib;
      $this->pdfgenerator->generate($html, $filename, true, 'A3', 'portrait');
      //$this->load->view('sertifikasi/verifikasi_ceklis',$this->data);

   
  }
function dokumen_invoice($nib_dec, $tgl_permohonan)
{
  
    $tgl = decrypt_url($tgl_permohonan);
    $nib = decrypt_url($nib_dec);
    $check = $this->Bu_model->check_permohonan($nib, $tgl);
    if (!empty($check)) {
      if ($check[0]['qr_sps'] == '') {
        $this->create_qr2_new($nib_dec, $tgl_permohonan);
      }
      $rec = $this->Bu_model->biodata_opr($nib);
      $record = $this->Bu_model->klasifikasi_kualifikasi_biaya_sertifikasi($nib, $tgl);
      $bulan = date("m", strtotime($record[0]['status_1']));
      $tahun = date("Y", strtotime($record[0]['status_1']));
      $bulan_romawi = $this->getBulanrw($bulan);
      $panjang = strlen($record[0]['no_urut']);
      $jumlah = 5 - $panjang;
      $nol = '';
      for ($i = 0; $i < $jumlah; $i++) {
        $nol = $nol . '0';
      }
      $nomor_urut = $nol . $record[0]['no_urut'] . '/INVOICE/' . $bulan_romawi . '/' . $tahun;
      $this->data = array(
        'tgl_dec' => $tgl_permohonan,
        'tgl' => $tgl,
        'biodata' => $rec,

        'qr_sps' => $record[0]['qr_sps'],
        'tahun' => $tahun,
        'klasifikasi' => $record,
        'bulan_huruf' => $this->getBulan($bulan),
        'tanggal' => date("d", strtotime($record[0]['status_1'])),
        'bulan_romawi' => $bulan_romawi,
        'no_urut' => $nomor_urut
      );

      $this->load->library('pdfgenerator');
      $html = $this->load->view('report/invoice', $this->data, true);

      //print_r($record);
      $filename = 'Invoice-' . $nib;
      $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
    } else {
      $this->session->set_flashdata('title', 'Warning');
      $this->session->set_flashdata('text', 'Link Salah');
      $this->session->set_flashdata('class', "warning");
      redirect('error', 'refresh');
    }
  
}
function create_qr2_new($nib_dec, $tgl_dec)
{

  $this->load->library('ciqrcode');
  $config['cacheable']    = true; //boolean, the default is true
  $config['cachedir']     = './assets/sertifikat/'; //string, the default is application/cache/
  $config['errorlog']     = './assets/sertifikat/'; //string, the default is application/logs/
  $config['imagedir']     = './assets/sertifikat/qrcodex/'; //direktori penyimpanan qr code
  $config['quality']      = true; //boolean, the default is true
  $config['size']         = '1024'; //interger, the default is 1024
  $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
  $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
  $this->ciqrcode->initialize($config);
  $image_name = $nib_dec . '_' . $tgl_dec . '.jpg';
  $params['data'] = base_url('Digital_signature/validasi_esign/'); //data yang akan di jadikan QR CODE
  $params['level'] = 'H'; //H=High
  $params['size'] = 10;
  $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
  $this->ciqrcode->generate($params);

  $qr1 = $image_name;
  $nib = decrypt_url($nib_dec);
  $tgl_permohonan = decrypt_url($tgl_dec);
  $data = array(
    'qr_sps' => $qr1

  );
  $where = array(
    'NIB' => $nib,
    'tgl_permohonan' => $tgl_permohonan
  );

  $table = "lsbu_registrasi_history";
  $insert = $this->Bu_model->update_edit($where, $table, $data);
}
function dokumen_keuangan($id1, $id2, $id3)
{

    $tgl = decrypt_url($id2);
    $nib = decrypt_url($id1);
    $id_asesor = decrypt_url($id3);
    $status = "1";
    $record = $this->Bu_model->get_ceklis_asesor($nib, $tgl, $id_asesor);
    $this->load->library('pdfgenerator');
    $this->data = array(
      'asesor' => $this->Bu_model->cek_pilih_asesor2($nib, $tgl),
      'ceklis' => $record,
      'tgl' => $tgl,
      'neraca_asesor' => $this->Bu_model->neraca_asesor($nib, $tgl, $id_asesor),
      'biodata' => $this->Bu_model->biodata_opr($nib),
      'neraca' => $this->Bu_model->neraca_ski($nib),
      'pemegang_saham' => $this->Bu_model->pemegang_saham_opr($nib),
      'nib_dec' => $id1,
      'tgl_dec' => $id2,
    );
    $html = $this->load->view('sertifikasi/asesor_ceklis_keuangan', $this->data, true);
    $filename = 'report_' . time();

    $this->pdfgenerator->generate($html, $filename, true, 'A3', 'portrait');
    //$this->load->view('sertifikasi/verifikasi_ceklis',$this->data);


}
function dokumen_tenaga_kerja($id1, $id2, $id3)
{

    $tgl = decrypt_url($id2);
    $nib = decrypt_url($id1);
    $id_asesor = decrypt_url($id3);
    $status = "1";
    $record = $this->Bu_model->get_ceklis_asesor($nib, $tgl, $id_asesor);


    $this->load->library('pdfgenerator');
    $this->data = array(
      'asesor' => $this->Bu_model->cek_pilih_asesor2($nib, $tgl),

      'ceklis' => $record,
      'tgl' => $tgl,
      'biodata' => $this->Bu_model->biodata_opr($nib),
      'pjbu' => $this->Bu_model->pjbu_opr($nib),
      'pjskbu' => $this->Bu_model->pjskbu_opr($nib),
      'pjtbu' => $this->Bu_model->pjtbu_opr($nib),
      'nib_dec' => $id1,
      'tgl_dec' => $id2,
    );
    $html = $this->load->view('sertifikasi/asesor_ceklis_tenaga_kerja', $this->data, true);
    $filename = 'report_' . time();

    $this->pdfgenerator->generate($html, $filename, true, 'A3', 'portrait');
    //$this->load->view('sertifikasi/verifikasi_ceklis',$this->data);


}
function dokumen_smap($id1, $id2, $id3)
{
  
    $tgl = decrypt_url($id2);
    $nib = decrypt_url($id1);
    $id_asesor = decrypt_url($id3);
    $status = "1";
    $record = $this->Bu_model->get_ceklis_asesor($nib, $tgl, $id_asesor);
    $this->load->library('pdfgenerator');
    $this->data = array(
      'asesor' => $this->Bu_model->cek_pilih_asesor2($nib, $tgl),
      'ceklis' => $record,
      'tgl' => $tgl,
      'biodata' => $this->Bu_model->biodata_opr($nib),
      'smap_asesor' => $this->Bu_model->smap_asesor($nib, $tgl, $id_asesor),
      'nib_dec' => $id1,
      'tgl_dec' => $id2,
    );
    $html = $this->load->view('sertifikasi/asesor_ceklis_smap', $this->data, true);
    $filename = 'report_' . time();

    $this->pdfgenerator->generate($html, $filename, true, 'A3', 'portrait');
    //$this->load->view('sertifikasi/verifikasi_ceklis',$this->data);

  
}
function dokumen_peralatan($id1, $id2, $id3)
{
  
    $tgl = decrypt_url($id2);
    $nib = decrypt_url($id1);
    $id_asesor = decrypt_url($id3);
    $status = "1";
    $record = $this->Bu_model->get_ceklis_asesor($nib, $tgl, $id_asesor);


    $this->load->library('pdfgenerator');
    $this->data = array(
      'asesor' => $this->Bu_model->cek_pilih_asesor2($nib, $tgl),

      'ceklis' => $record,
      'tgl' => $tgl,
      'biodata' => $this->Bu_model->biodata_opr($nib),
      'peralatan' => $this->Bu_model->peralatan_opr($nib),
      'nib_dec' => $id1,
      'tgl_dec' => $id2,
    );
    $html = $this->load->view('sertifikasi/asesor_ceklis_peralatan', $this->data, true);
    $filename = 'report_' . time();

    $this->pdfgenerator->generate($html, $filename, true, 'A3', 'portrait');
    //$this->load->view('sertifikasi/verifikasi_ceklis',$this->data);


}
function dokumen_penjualan_tahunan($id1, $id2, $id3)
{

    $tgl = decrypt_url($id2);
    $nib = decrypt_url($id1);
    $id_asesor = decrypt_url($id3);
    $status = "1";
    $record = $this->Bu_model->get_ceklis_asesor($nib, $tgl, $id_asesor);
    $this->load->library('pdfgenerator');
    $this->data = array(
      'asesor' => $this->Bu_model->cek_pilih_asesor2($nib, $tgl),
      'ceklis' => $record,
      'tgl' => $tgl,
      'biodata' => $this->Bu_model->biodata_opr($nib),
      'penjualan_tahunan' => $this->Bu_model->pengalaman_opr($nib),
      'nib_dec' => $id1,
      'tgl_dec' => $id2,
    );
    $html = $this->load->view('sertifikasi/asesor_ceklis_penjualan_tahunan', $this->data, true);
    $filename = 'report_' . time();

    $this->pdfgenerator->generate($html, $filename, true, 'A3', 'landscape');
    //$this->load->view('sertifikasi/verifikasi_ceklis',$this->data);


}
function dokumen_penilaian($id1,$id2){

  
      $tgl = decrypt_url($id2);
      $nib = decrypt_url($id1);
     
      $id_asesor = decrypt_url($id3);
      $status = "1";
      $record = $this->Bu_model->get_ceklis_asesor($nib, $tgl, $id_asesor);
      $rec = $this->Bu_model->check_penunjukan($nib, $tgl, $id_asesor);
      $stat = "FALSE";
      foreach ($rec as $row) {
        if ($row['status'] == '1') {
          $stat = 'TRUE';
        }
      }
      if ($stat == 'TRUE') {
        $klasifikasi = $this->Bu_model->klasifikasi_kualifikasi_opr($nib, $tgl);
      } else {
        $klasifikasi = $this->Bu_model->klasifikasi_kualifikasi_opr_menengah_besar($nib, $tgl);
      }
      $this->load->library('pdfgenerator');
      $this->data = array(
        'ceklis' => $record,
        'tgl' => $tgl,
        'asesor' => $this->Bu_model->cek_pilih_asesor2($nib, $tgl),
        'biodata' => $this->Bu_model->biodata_opr($nib),
        'pengurus' => $this->Bu_model->pengurus_opr($nib),
        'penjualan_tahunan' => $this->Bu_model->pengalaman_opr($nib),
        'akte' => $this->Bu_model->akte_opr($nib),
        'smm' => $this->Bu_model->smm_opr($nib),
        'smap' => $this->Bu_model->smap_opr($nib),
        'neraca' => $this->Bu_model->neraca_ski($nib),
        'pemegang_saham' => $this->Bu_model->pemegang_saham_opr($nib),
        'pjbu' => $this->Bu_model->pjbu_opr($nib),
        'pjskbu' => $this->Bu_model->pjskbu_opr($nib),
        'pjtbu' => $this->Bu_model->pjtbu_opr($nib),
        'peralatan' => $this->Bu_model->peralatan_opr($nib),
        'klasifikasi' => $klasifikasi,
        'nib_dec' => $id1,
        'tgl_dec' => $id2,
        'data_penilaian' => $this->Bu_model->berita_acara_penilaian($nib, $tgl, $id_asesor)

      );
      $html = $this->load->view('sertifikasi/asesor_ceklis2', $this->data, true);
      $filename = 'report_' . time();

      $this->pdfgenerator->generate($html, $filename, true, 'A3', 'landscape');
      //$this->load->view('sertifikasi/verifikasi_ceklis',$this->data);

  
}
function dokumen_surat_tugas2($id1,$id2){
  $this->data=array();
  $this->load->view('empat_nol_empat',$this->data);
}
function dokumen_surat_tugas($id1, $id2)
  {
  
      $this->load->library('pdfgenerator');
      $nib = decrypt_url($id1);
      $id_user = $this->session->userdata('id_user');
      $tgl_permohonan = decrypt_url($id2);
      $data_xxc = $this->Bu_model->cek_pilih_asesor2($nib, $tgl_permohonan);
      $bulan_romawi = $this->getBulanrw(substr($data_xxc[0]['tglupdate'], 5, 2));
      $bulan_huruf = $this->getBulan(substr($data_xxc[0]['tglupdate'], 5, 2));
      $tahunxx = substr($data_xxc[0]['tglupdate'], 0, 4);
      $id_propinsi2 = '09';
      $reco2 = $this->Bu_model->get_surat_tugas($nib, $tgl_permohonan);
      if (empty($reco2)) {
        $rec = $this->Bu_model->check_permohonan($nib, $tgl_permohonan);
        $bulan = $month = date("m", strtotime($tgl_permohonan));
        $tahun = $month = date("Y", strtotime($tgl_permohonan));
        $bulan_romawi = $this->getBulanrw($bulan);
        $panjang = strlen($rec[0]['no_urut']);
        $jumlah = 5 - $panjang;
        $nol = '';
        for ($i = 0; $i < $jumlah; $i++) {
          $nol = $nol . '0';
        }
        $no_surat = $nol . $rec[0]['no_urut'] . '/SPA/' . $bulan_romawi . '/' . $tahun;
        $table = 'lsbu_surat_penunjukan';
        $filenamex = 'surat_tugas_' . $nol . $rec[0]['no_urut'] . 'SPA_' . $bulan_romawi . '_' . $tahun;
        $data = array(
          'no_surat' => $no_surat,
          'tgl_permohonan' => $tgl_permohonan,
          'NIB' => $nib,
          'id_user' => $id_user,
          'file' => $filenamex . '.pdf',
          'tgl_cetak' => $data_xxc[0]['tglupdate']
        );
        $record = $this->Bu_model->insert_sad($table, $data);
        $recordx = $this->Bu_model->biodata_opr($nib);
        $datax = array(
          'bulan' => $bulan_huruf,
          'bu' => $recordx,
          'no_surat' => $no_surat,
          'tgl_permohonan' => $tgl_permohonan,
          'asesor' => $this->Bu_model->cek_pilih_asesor2($nib, $tgl_permohonan),
          'tahun' => $tahunxx,
          'tgl' => substr($data_xxc[0]['tglupdate'], 8, 2)

        );

        $html = $this->load->view('sertifikasi/surat_tugas_bu_cetak', $datax, true);

        $this->pdfgenerator->save($html, $filenamex, 'A4', 'portrait');
      } else {
        $no_surat = $reco2[0]['no_surat'];
      }






      $record = $this->Bu_model->biodata_opr($nib);

      $data = array(
        'klasifikasi'=>$this->Bu_model->klasifikasi_kualifikasi_opr($nib, $tgl_permohonan),
        'bulan' => $bulan_huruf,
        'bu' => $record,
        'no_surat' => $no_surat,
        'tgl_permohonan' => $tgl_permohonan,
        'asesor' => $this->Bu_model->cek_pilih_asesor2($nib, $tgl_permohonan),
        'tahun' => $tahunxx,
        'tgl' => substr($data_xxc[0]['tglupdate'], 8, 2)
      );

      $html = $this->load->view('sertifikasi/surat_tugas_bu_cetak', $data, true);
      $filename = 'report_' . time();

      $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');

      //$this->load->view('sertifikasi/surat_tugas_bu',$data);
   
  }
  function dokumen_surat_tugas_pemutus($id1, $id2)
  {
  
      $this->load->library('pdfgenerator');
      $nib = decrypt_url($id1);
      $id_user = $this->session->userdata('id_user');
      $tgl_permohonan = decrypt_url($id2);
      $data_xxc = $this->Bu_model->get_komite_teknis($nib, $tgl_permohonan);
      $bulan_romawi = $this->getBulanrw(substr($data_xxc[0]['Log'], 5, 2));
      $bulan_huruf = $this->getBulan(substr($data_xxc[0]['Log'], 5, 2));
      $tahunxx = substr($data_xxc[0]['Log'], 0, 4);
      $id_propinsi2 = '09';
      $rec=$this->Bu_model->check_permohonan($nib, $tgl_permohonan);
      $panjang = strlen($rec[0]['no_urut']);
        $jumlah = 5 - $panjang;
        $nol = '';
        for ($i = 0; $i < $jumlah; $i++) {
          $nol = $nol . '0';
        }
        $no_surat = $nol . $rec[0]['no_urut'] . '/STP-LSBU-GI/' . $bulan_romawi . '/' . $tahunxx;






      $record = $this->Bu_model->biodata_opr($nib);

      $data = array(
        'no_surat'=>$no_surat,
        'bulan' => $bulan_huruf,
        'bu' => $record,
        'no_surat' => $no_surat,
        'tgl_permohonan' => $tgl_permohonan,
        'pemutus' => $data_xxc,
        'tahun' => $tahunxx,
        'tgl' => substr($data_xxc[0]['Log'], 8, 2)
      );

      $html = $this->load->view('sertifikasi/surat_tugas_pemutus_cetak', $data, true);
      $filename = 'report_' . time();

      $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');

      //$this->load->view('sertifikasi/surat_tugas_bu',$data);
   
  }
function dokumen_resume2($id1,$id2){
  $this->data=array();
  $this->load->view('empat_nol_empat',$this->data);
}
function dokumen_resume($id1, $id2)
  {
    
      $tgl = decrypt_url($id2);
      $nib = decrypt_url($id1);
      $this->load->library('pdfgenerator');
      $data = array(
        'asesor' => $this->Bu_model->cek_pilih_asesor2($nib, $tgl),
        'biodata' => $this->Bu_model->biodata_opr($nib),
        'record' => $this->Bu_model->berita_acara2($nib, $tgl),
      );
      $html = $this->load->view('sertifikasi/berita_acara', $data, true);
      $filename = 'report_' . time();

      $this->pdfgenerator->generate($html, $filename, true, 'A3', 'landscape');
      //$this->load->view('report/tt_asosiasi_bu_ceklis',$data);
    
  }
function message_bu($id1){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->badan_usaha()){
    $id=decrypt_url($id1);
    $nib=$this->session->userdata('id_user');
    $this->data=array(
      'biodata'=>$this->Bu_model->biodata_opr($nib),
      'message'=>$this->Bu_model->get_message($id),
      'jumlah'=>$this->Bu_model->get_total_records(),
			'jumlah_message'=>$this->Bu_model->get_total_records_message(),
    );

  $this->template->load('menu/menu','bu/message_bu', $this->data);
}else{
  $this->session->set_flashdata('title','Warning');
  $this->session->set_flashdata('text','Anda tidak memiliki akses');
  $this->session->set_flashdata('class', "warning");
  redirect('login','refresh');
}
}
  function pph_omset_bu($id){
    if (!$this->ion_auth->ceklogin())
    {
      $this->session->set_flashdata('title','Login Gagal');
      $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }elseif($this->ion_auth->badan_usaha()){

    $id_record=decrypt_url($id);
    $this->Bu_model->read_mail($id_record);
    $sessionarray=array(
      'id_record'=>$id_record
    );
    $this->session->set_userdata($sessionarray);
    $record=$this->Bu_model->get_mail($id_record);

    $this->data = array(
      'record'=>$record
    );

    $this->template->load('menu/menu','bu/revisi/pph_omset_bu', $this->data);
  }else{
    $this->session->set_flashdata('title','Warning');
    $this->session->set_flashdata('text','Anda tidak memiliki akses');
    $this->session->set_flashdata('class', "warning");
    redirect('login','refresh');
  }
  }

  function update_pph_omset_bu(){
    if (!$this->ion_auth->ceklogin())
    {
      $this->session->set_flashdata('title','Login Gagal');
      $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }elseif($this->ion_auth->badan_usaha()){

    $post = $this->input->post();
    $id_record=decrypt_url($post['fff']);
    $record=$this->Bu_model->get_mail($id_record);

    $id_upload=$record[0]['ID_UPLOAD'];
    if($_FILES['file_upload']['name'])
    {
      $this->load->library('upload');
      $id_user=$this->session->userdata('id_user');
$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));

        $config['upload_path'] = './assets/bukti/badan_usaha/22_spt_2_tahun_terakhir';
        $alamat="./assets/bukti/badan_usaha/22_spt_2_tahun_terakhir/";
        $url=base_url()."assets/bukti/badan_usaha/22_spt_2_tahun_terakhir/";

      $config['allowed_types'] = 'pdf|jpg|jpeg|png';
      $config['overwrite'] = TRUE;
      $config['file_name'] = $nmfile;
      $this->upload->initialize($config);
      if($this->upload->do_upload('file_upload')){
        $gbr = $this->upload->data();
        $filename=$gbr['file_name'];
        $file_ext = pathinfo($filename,PATHINFO_EXTENSION);

        $upload_revisi=$gbr['file_name'];

          $select="UPDATE bu_keuangan_pendapatan SET persyaratan='$upload_revisi'";

        $id_bu=$record[0]['ID_BU'];
        $where="WHERE ID_BU='$id_bu'";

        $result=$this->Bu_model->update($select,$where);
        $result2=$this->Bu_model->update_sad($select,$where);
        if($result=="Success" AND $result2=="Success"){
          $this->Bu_model->revisi($id_record);
          $this->session->set_flashdata('title','Success');
          $this->session->set_flashdata('text','Data'.$record[0]['Deskripsi'].'Berhasil Di Perbarui');
          $this->session->set_flashdata('class', "success");
          $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode(array('result' => 1)));
        }else{
          $this->session->set_flashdata('title','Failed');
          $this->session->set_flashdata('text','Data'.$record[0]['Deskripsi'].'Gagal Di Perbaiki');
          $this->session->set_flashdata('class', "error");
          $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode(array('result' => 1)));
        }
      }else{
        $this->session->set_flashdata('title','Failed');
        $this->session->set_flashdata('text','Data'.$record[0]['Deskripsi'].'Gagal Di Upload');
        $this->session->set_flashdata('class', "error");
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('result' => 1)));
      }
    }
  }else{
    $this->session->set_flashdata('title','Warning');
    $this->session->set_flashdata('text','Anda tidak memiliki akses');
    $this->session->set_flashdata('class', "warning");
    redirect('login','refresh');
  }
  }

  function pemegang_saham_bu($id){
    if (!$this->ion_auth->ceklogin())
    {
      $this->session->set_flashdata('title','Login Gagal');
      $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }elseif($this->ion_auth->badan_usaha()){

    $id_record=decrypt_url($id);
    $this->Bu_model->read_mail($id_record);
    $sessionarray=array(
      'id_record'=>$id_record
    );
    $this->session->set_userdata($sessionarray);
    $record=$this->Bu_model->get_mail($id_record);

    $this->data = array(
      'record'=>$record
    );

    $this->template->load('menu/menu','bu/revisi/pemegang_saham_bu', $this->data);
  }else{
    $this->session->set_flashdata('title','Warning');
    $this->session->set_flashdata('text','Anda tidak memiliki akses');
    $this->session->set_flashdata('class', "warning");
    redirect('login','refresh');
  }
  }

  function update_pemegang_saham_bu(){
    if (!$this->ion_auth->ceklogin())
    {
      $this->session->set_flashdata('title','Login Gagal');
      $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }elseif($this->ion_auth->badan_usaha()){

    $post = $this->input->post();
    $id_record=decrypt_url($post['fff']);
    $record=$this->Bu_model->get_mail($id_record);

    $id_upload=$record[0]['ID_UPLOAD'];
    if($_FILES['file_upload']['name'])
    {
      $this->load->library('upload');
      $id_user=$this->session->userdata('id_user');
$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));

        $config['upload_path'] = './assets/bukti/badan_usaha/bukti_pemegang_saham';
        $alamat="./assets/bukti/badan_usaha/bukti_pemegang_saham/";
        $url=base_url()."assets/bukti/badan_usaha/bukti_pemegang_saham/";

      $config['allowed_types'] = 'pdf|jpg|jpeg|png';
      $config['overwrite'] = TRUE;
      $config['file_name'] = $nmfile;
      $this->upload->initialize($config);
      if($this->upload->do_upload('file_upload')){
        $gbr = $this->upload->data();
        $filename=$gbr['file_name'];
        $file_ext = pathinfo($filename,PATHINFO_EXTENSION);

        $upload_revisi=$gbr['file_name'];

          $select="UPDATE bu_keuangan_saham SET persyaratan='$upload_revisi'";

        $id_bu=$record[0]['ID_BU'];
        $id_saham=$record[0]['Option1'];
        $where="WHERE ID_BU='$id_bu' AND ID_Pemilik_Saham='$id_saham'";

        $result=$this->Bu_model->update($select,$where);
        $result2=$this->Bu_model->update_sad($select,$where);
        if($result=="Success" AND $result2=="Success"){
          $this->Bu_model->revisi($id_record);
          $this->session->set_flashdata('title','Success');
          $this->session->set_flashdata('text','Data'.$record[0]['Deskripsi'].'Berhasil Di Perbarui');
          $this->session->set_flashdata('class', "success");
          $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode(array('result' => 1)));
        }else{
          $this->session->set_flashdata('title','Failed');
          $this->session->set_flashdata('text','Data'.$record[0]['Deskripsi'].'Gagal Di Perbaiki');
          $this->session->set_flashdata('class', "error");
          $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode(array('result' => 1)));
        }
      }else{
        $this->session->set_flashdata('title','Failed');
        $this->session->set_flashdata('text','Data'.$record[0]['Deskripsi'].'Gagal Di Upload');
        $this->session->set_flashdata('class', "error");
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('result' => 1)));
      }
    }
  }else{
    $this->session->set_flashdata('title','Warning');
    $this->session->set_flashdata('text','Anda tidak memiliki akses');
    $this->session->set_flashdata('class', "warning");
    redirect('login','refresh');
  }
  }
  function akte_perubahan_bu($id){
    if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->badan_usaha()){

    $id_record=decrypt_url($id);
    $this->Bu_model->read_mail($id_record);
    $sessionarray=array(
      'id_record'=>$id_record
    );
    $this->session->set_userdata($sessionarray);
    $record=$this->Bu_model->get_mail($id_record);

    $this->data = array(
      'record'=>$record
    );

    $this->template->load('menu/menu','bu/revisi/akte_perubahan_bu', $this->data);
  }else{
    $this->session->set_flashdata('title','Warning');
    $this->session->set_flashdata('text','Anda tidak memiliki akses');
    $this->session->set_flashdata('class', "warning");
    redirect('login','refresh');
  }
  }

  function update_akte_perubahan_bu(){
    if (!$this->ion_auth->ceklogin())
    {
      $this->session->set_flashdata('title','Login Gagal');
      $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }elseif($this->ion_auth->badan_usaha()){

    $post = $this->input->post();
    $id_record=decrypt_url($post['fff']);
    $record=$this->Bu_model->get_mail($id_record);

    $id_upload=$record[0]['ID_UPLOAD'];
    if($_FILES['file_upload']['name'])
    {
      $this->load->library('upload');
      $id_user=$this->session->userdata('id_user');
      $nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));

        $config['upload_path'] = './assets/bukti/badan_usaha/8_akte_perubahan';
        $alamat="./assets/bukti/badan_usaha/8_akte_perubahan/";
        $url=base_url()."assets/bukti/badan_usaha/8_akte_perubahan/";

      $config['allowed_types'] = 'pdf|jpg|jpeg|png';
      $config['overwrite'] = TRUE;
      $config['file_name'] = $nmfile;
      $this->upload->initialize($config);
      if($this->upload->do_upload('file_upload')){
        $gbr = $this->upload->data();
        $filename=$gbr['file_name'];
        $file_ext = pathinfo($filename,PATHINFO_EXTENSION);

        $upload_revisi=$gbr['file_name'];

          $select="UPDATE bu_akte_perubahan SET persyaratan='$upload_revisi'";

        $id_bu=$record[0]['ID_BU'];
        $tgl=$record[0]['Option2'];
        $nomer=$record[0]['Option1'];
        $where="WHERE ID_BU='$id_bu' AND Tanggal='$tgl' AND Nomer='$nomer'";

        $result=$this->Bu_model->update($select,$where);
        $result2=$this->Bu_model->update_sad($select,$where);
        if($result=="Success" AND $result2=="Success"){
          $this->Bu_model->revisi($id_record);
          $this->session->set_flashdata('title','Success');
          $this->session->set_flashdata('text','Data'.$record[0]['Deskripsi'].'Berhasil Di Perbarui');
          $this->session->set_flashdata('class', "success");
          $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode(array('result' => 1)));
        }else{
          $this->session->set_flashdata('title','Failed');
          $this->session->set_flashdata('text','Data'.$record[0]['Deskripsi'].'Gagal Di Perbaiki');
          $this->session->set_flashdata('class', "error");
          $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode(array('result' => 1)));
        }
      }else{
        $this->session->set_flashdata('title','Failed');
        $this->session->set_flashdata('text','Data'.$record[0]['Deskripsi'].'Gagal Di Upload');
        $this->session->set_flashdata('class', "error");
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('result' => 1)));
      }
    }
  }else{
    $this->session->set_flashdata('title','Warning');
    $this->session->set_flashdata('text','Anda tidak memiliki akses');
    $this->session->set_flashdata('class', "warning");
    redirect('login','refresh');
  }
  }
function akte_pendirian_bu($id){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->badan_usaha()){

  $post = $this->input->post();
  $id_record=decrypt_url($id);
  $record=$this->Bu_model->get_mail($id_record);
  $sessionarray=array(
    'id_record'=>$id_record
  );
  $this->session->set_userdata($sessionarray);
  $record=$this->Bu_model->get_mail($id_record);

  $this->data = array(
    'record'=>$record
  );

  $this->template->load('menu/menu','bu/revisi/akte_pendirian_bu', $this->data);
}else{
  $this->session->set_flashdata('title','Warning');
  $this->session->set_flashdata('text','Anda tidak memiliki akses');
  $this->session->set_flashdata('class', "warning");
  redirect('login','refresh');
}
}

function update_akte_pendirian_bu(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->badan_usaha()){

  $post = $this->input->post();
  $id_record=decrypt_url($post['fff']);
  $record=$this->Bu_model->get_mail($id_record);

  $id_upload=$record[0]['ID_UPLOAD'];
  if($_FILES['file_upload']['name'])
  {
    $this->load->library('upload');
    $id_user=$this->session->userdata('id_user');
    $nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));

      $config['upload_path'] = './assets/bukti/badan_usaha/7_akte_pendirian';
      $alamat="./assets/bukti/badan_usaha/7_akte_pendirian/";
      $url=base_url()."assets/bukti/badan_usaha/7_akte_pendirian/";

    $config['allowed_types'] = 'pdf|jpg|jpeg|png';
    $config['overwrite'] = TRUE;
    $config['file_name'] = $nmfile;
    $this->upload->initialize($config);
    if($this->upload->do_upload('file_upload')){
      $gbr = $this->upload->data();
      $filename=$gbr['file_name'];
      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);

      $upload_revisi=$gbr['file_name'];

        $select="UPDATE bu_akte_pendirian SET persyaratan='$upload_revisi'";

      $id_bu=$record[0]['ID_BU'];
      $where="WHERE ID_BU='$id_bu'";

      $result=$this->Bu_model->update($select,$where);
      $result2=$this->Bu_model->update_sad($select,$where);
      if($result=="Success" AND $result2=="Success"){
        $this->Bu_model->revisi($id_record);
        $this->session->set_flashdata('title','Success');
        $this->session->set_flashdata('text','Data'.$record[0]['Deskripsi'].'Berhasil Di Perbarui');
        $this->session->set_flashdata('class', "success");
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('result' => 1)));
      }else{
        $this->session->set_flashdata('title','Failed');
        $this->session->set_flashdata('text','Data'.$record[0]['Deskripsi'].'Gagal Di Perbaiki');
        $this->session->set_flashdata('class', "error");
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('result' => 1)));
      }
    }else{
      $this->session->set_flashdata('title','Failed');
      $this->session->set_flashdata('text','Data'.$record[0]['Deskripsi'].'Gagal Di Upload');
      $this->session->set_flashdata('class', "error");
      $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode(array('result' => 1)));
    }
  }
}else{
  $this->session->set_flashdata('title','Warning');
  $this->session->set_flashdata('text','Anda tidak memiliki akses');
  $this->session->set_flashdata('class', "warning");
  redirect('login','refresh');
}
}
function neraca_bu($id){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->badan_usaha()){

  $id_record=decrypt_url($id);
  $this->Bu_model->read_mail($id_record);
  $sessionarray=array(
    'id_record'=>$id_record
  );
  $this->session->set_userdata($sessionarray);
  $record=$this->Bu_model->get_mail($id_record);

  $this->data = array(
    'record'=>$record
  );

  $this->template->load('menu/menu','bu/revisi/neraca_bu', $this->data);
}else{
  $this->session->set_flashdata('title','Warning');
  $this->session->set_flashdata('text','Anda tidak memiliki akses');
  $this->session->set_flashdata('class', "warning");
  redirect('login','refresh');
}
}

function update_neraca_bu(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->badan_usaha()){

  $post = $this->input->post();
  $id_record=decrypt_url($post['fff']);
  $record=$this->Bu_model->get_mail($id_record);

  $id_upload=$record[0]['ID_UPLOAD'];
  if($_FILES['file_upload']['name'])
  {
    $this->load->library('upload');
    $id_user=$this->session->userdata('id_user');
$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
    if($id_upload=="20"){
      $config['upload_path'] = './assets/bukti/badan_usaha/20_neraca_bu';
      $alamat="./assets/bukti/badan_usaha/20_neraca_bu/";
      $url=base_url()."assets/bukti/badan_usaha/20_neraca_bu/";
    }elseif($id_upload=="21"){
      $config['upload_path'] = './assets/bukti/badan_usaha/21_laporan_akuntan_publik';
      $alamat="./assets/bukti/badan_usaha/21_laporan_akuntan_publik/";
      $url=base_url()."assets/bukti/badan_usaha/21_laporan_akuntan_publik/";
    }
    $config['allowed_types'] = 'pdf|jpg|jpeg|png';
    $config['overwrite'] = TRUE;
    $config['file_name'] = $nmfile;
    $this->upload->initialize($config);
    if($this->upload->do_upload('file_upload')){
      $gbr = $this->upload->data();
      $filename=$gbr['file_name'];
      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);

      $upload_revisi=$gbr['file_name'];
      if($id_upload=="20"){
        $select="UPDATE bu_keuangan_neraca SET persyaratan_20='$upload_revisi'";
      }elseif($id_upload=="21"){
        $select="UPDATE bu_keuangan_neraca SET persyaratan_21='$upload_revisi'";
      }
      $id_bu=$record[0]['ID_BU'];
      $tahun=$record[0]['Option1'];
      $where="WHERE ID_BU='$id_bu' AND Tahun='$tahun'";

      $result=$this->Bu_model->update($select,$where);
      $result2=$this->Bu_model->update_sad($select,$where);
      if($result=="Success" AND $result2=="Success"){
        $this->Bu_model->revisi($id_record);
        $this->session->set_flashdata('title','Success');
        $this->session->set_flashdata('text','Data'.$record[0]['Deskripsi'].'Berhasil Di Perbarui');
        $this->session->set_flashdata('class', "success");
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('result' => 1)));
      }else{
        $this->session->set_flashdata('title','Failed');
        $this->session->set_flashdata('text','Data'.$record[0]['Deskripsi'].'Gagal Di Perbaiki');
        $this->session->set_flashdata('class', "error");
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('result' => 1)));
      }
    }else{
      $this->session->set_flashdata('title','Failed');
      $this->session->set_flashdata('text','Data'.$record[0]['Deskripsi'].'Gagal Di Upload');
      $this->session->set_flashdata('class', "error");
      $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode(array('result' => 1)));
    }
  }
}else{
  $this->session->set_flashdata('title','Warning');
  $this->session->set_flashdata('text','Anda tidak memiliki akses');
  $this->session->set_flashdata('class', "warning");
  redirect('login','refresh');
}
}
function klasifikasi_kualifikasi_bu($id){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->badan_usaha()){

  $id_record=decrypt_url($id);
  $this->Bu_model->read_mail($id_record);
  $sessionarray=array(
    'id_record'=>$id_record
  );
  $this->session->set_userdata($sessionarray);
  $record=$this->Bu_model->get_mail($id_record);

  $this->data = array(
    'record'=>$record
  );

  $this->template->load('menu/menu','bu/revisi/klasifikasi_kualifikasi', $this->data);
}else{
  $this->session->set_flashdata('title','Warning');
  $this->session->set_flashdata('text','Anda tidak memiliki akses');
  $this->session->set_flashdata('class', "warning");
  redirect('login','refresh');
}
}

function update_klasifikasi_kualifikasi(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->badan_usaha()){

  $post = $this->input->post();
  $id_record=decrypt_url($post['fff']);
  $record=$this->Bu_model->get_mail($id_record);

  $id_upload=$record[0]['ID_UPLOAD'];
  if($_FILES['file_upload']['name'])
  {
    $this->load->library('upload');
    $id_user=$this->session->userdata('id_user');
$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
    if($id_upload=="1"){
      $config['upload_path'] = './assets/bukti/badan_usaha/1_bukti_berita_acara_verifikasi';
      $alamat="./assets/bukti/badan_usaha/1_bukti_berita_acara_verifikasi/";
      $url=base_url()."assets/bukti/badan_usaha/1_bukti_berita_acara_verifikasi/";
    }elseif($id_upload=="2"){
      $config['upload_path'] = './assets/bukti/badan_usaha/2_formulir_permohonan_sbu';
      $alamat="./assets/bukti/badan_usaha/2_formulir_permohonan_sbu/";
      $url=base_url()."assets/bukti/badan_usaha/2_formulir_permohonan_sbu/";
    }elseif($id_upload=="3"){
      $config['upload_path'] = './assets/bukti/badan_usaha/3_surat_pengantar_permohonan_subklas';
      $alamat="./assets/bukti/badan_usaha/3_surat_pengantar_permohonan_subklas/";
      $url=base_url()."assets/bukti/badan_usaha/3_surat_pengantar_permohonan_subklas/";
    }elseif($id_upload=="4"){
      $config['upload_path'] = './assets/bukti/badan_usaha/4_surat_permohonan_klasifikasi';
      $alamat="./assets/bukti/badan_usaha/4_surat_permohonan_klasifikasi/";
      $url=base_url()."assets/bukti/badan_usaha/4_surat_permohonan_klasifikasi/";
    }elseif($id_upload=="5"){
      $config['upload_path'] = './assets/bukti/badan_usaha/5_surat_pernyataan_badan_usaha';
      $alamat="./assets/bukti/badan_usaha/5_surat_pernyataan_badan_usaha/";
      $url=base_url()."assets/bukti/badan_usaha/5_surat_pernyataan_badan_usaha/";
    }elseif($id_upload=="12"){
      $config['upload_path'] = './assets/bukti/badan_usaha/12_photo_copy_sbu';
      $alamat="./assets/bukti/badan_usaha/12_photo_copy_sbu/";
      $url=base_url()."assets/bukti/badan_usaha/12_photo_copy_sbu/";
    }elseif($id_upload=="10"){
      $config['upload_path'] = './assets/bukti/badan_usaha/10_kta_asosiasi';
      $alamat="./assets/bukti/badan_usaha/10_kta_asosiasi/";
      $url=base_url()."assets/bukti/badan_usaha/10_kta_asosiasi/";
    }
    $config['allowed_types'] = 'xls|xlsx|pdf|jpg|jpeg|png';
    $config['overwrite'] = TRUE;
    $config['file_name'] = $nmfile;
    $this->upload->initialize($config);
    if($this->upload->do_upload('file_upload')){
      $gbr = $this->upload->data();
      $filename=$gbr['file_name'];
      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);

      $upload_revisi=$gbr['file_name'];
      if($id_upload=="1"){
        $select="UPDATE bu_registrasi_kbli SET persyaratan_1='$upload_revisi'";
      }elseif($id_upload=="2"){
        $select="UPDATE bu_registrasi_kbli SET persyaratan_2='$upload_revisi'";
      }elseif($id_upload=="3"){
        $select="UPDATE bu_registrasi_kbli SET persyaratan_3='$upload_revisi'";
      }elseif($id_upload=="4"){
        $select="UPDATE bu_registrasi_kbli SET persyaratan_4='$upload_revisi'";
      }elseif($id_upload=="5"){
        $select="UPDATE bu_registrasi_kbli SET persyaratan_5='$upload_revisi'";
      }elseif($id_upload=="12"){
        $select="UPDATE bu_registrasi_kbli SET persyaratan_12='$upload_revisi'";
      }elseif($id_upload=="10"){
        $select="UPDATE bu_registrasi_kbli SET persyaratan_10='$upload_revisi'";
      }
      $id_bu=$record[0]['ID_BU'];
      $id_sub=$record[0]['Option1'];
      $where="WHERE ID_Bu='$id_bu' AND id_sub_klasifikasi_kbli='$id_sub'";

      $result=$this->Bu_model->update($select,$where);
      $result2=$this->Bu_model->update_sad($select,$where);
      if($result=="Success" AND $result2=="Success"){
        $this->Bu_model->revisi($id_record);
        $this->session->set_flashdata('title','Success');
        $this->session->set_flashdata('text','Data'.$record[0]['Deskripsi'].'Berhasil Di Perbarui');
        $this->session->set_flashdata('class', "success");
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('result' => 1)));
      }else{
        $this->session->set_flashdata('title','Failed');
        $this->session->set_flashdata('text','Data'.$record[0]['Deskripsi'].'Gagal Di Perbaiki');
        $this->session->set_flashdata('class', "error");
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('result' => 1)));
      }
    }else{
      $this->session->set_flashdata('title','Failed');
      $this->session->set_flashdata('text','Data'.$record[0]['Deskripsi'].'Gagal Di Upload');
      $this->session->set_flashdata('class', "error");
      $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode(array('result' => 1)));
    }
  }
}else{
  $this->session->set_flashdata('title','Warning');
  $this->session->set_flashdata('text','Anda tidak memiliki akses');
  $this->session->set_flashdata('class', "warning");
  redirect('login','refresh');
}
}
function tk_bu($id){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->badan_usaha()){

  $id_record=decrypt_url($id);
  $this->Bu_model->read_mail($id_record);
  $sessionarray=array(
    'id_record'=>$id_record
  );
  $this->session->set_userdata($sessionarray);
  $record=$this->Bu_model->get_mail($id_record);

  $this->data = array(
    'record'=>$record
  );

  $this->template->load('menu/menu','bu/revisi/tk_bu', $this->data);
}else{
  $this->session->set_flashdata('title','Warning');
  $this->session->set_flashdata('text','Anda tidak memiliki akses');
  $this->session->set_flashdata('class', "warning");
  redirect('login','refresh');
}
}

function update_tk_bu(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->badan_usaha()){

  $post = $this->input->post();
  $id_record=decrypt_url($post['fff']);
  $record=$this->Bu_model->get_mail($id_record);

  $id_upload=$record[0]['ID_UPLOAD'];
  if($_FILES['file_upload']['name'])
  {
    $this->load->library('upload');
    $id_user=$this->session->userdata('id_user');
$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
    if($id_upload=="23"){
      $config['upload_path'] = './assets/bukti/badan_usaha/23_photo_copy_ska_tk';
      $alamat="./assets/bukti/badan_usaha/23_photo_copy_ska_tk/";
      $url=base_url()."assets/bukti/badan_usaha/23_photo_copy_ska_tk/";
    }elseif($id_upload=="24"){
      $config['upload_path'] = './assets/bukti/badan_usaha/24_ktp_tk';
      $alamat="./assets/bukti/badan_usaha/24_ktp_tk/";
      $url=base_url()."assets/bukti/badan_usaha/24_ktp_tk/";
    }elseif($id_upload=="25"){
      $config['upload_path'] = './assets/bukti/badan_usaha/25_ijazah_tk';
      $alamat="./assets/bukti/badan_usaha/25_ijazah_tk/";
      $url=base_url()."assets/bukti/badan_usaha/25_ijazah_tk/";
    }elseif($id_upload=="26"){
      $config['upload_path'] = './assets/bukti/badan_usaha/26_npwp_tk';
      $alamat="./assets/bukti/badan_usaha/26_npwp_tk/";
      $url=base_url()."assets/bukti/badan_usaha/26_npwp_tk/";
    }elseif($id_upload=="27"){
      $config['upload_path'] = './assets/bukti/badan_usaha/27_riwayat_hidup_tk';
      $alamat="./assets/bukti/badan_usaha/27_riwayat_hidup_tk/";
      $url=base_url()."assets/bukti/badan_usaha/27_riwayat_hidup_tk/";
    }
    $config['allowed_types'] = 'pdf|jpg|jpeg|png';
    $config['overwrite'] = TRUE;
    $config['file_name'] = $nmfile;
    $this->upload->initialize($config);
    if($this->upload->do_upload('file_upload')){
      $gbr = $this->upload->data();
      $filename=$gbr['file_name'];
      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);

      $upload_revisi=$gbr['file_name'];
      if($id_upload=="23"){
        $select="UPDATE bu_tenaga_kerja_kbli SET persyaratan_23='$upload_revisi'";
      }elseif($id_upload=="24"){
        $select="UPDATE bu_tenaga_kerja_kbli SET persyaratan_24='$upload_revisi'";
      }elseif($id_upload=="25"){
        $select="UPDATE bu_tenaga_kerja_kbli SET persyaratan_25='$upload_revisi'";
      }elseif($id_upload=="26"){
        $select="UPDATE bu_tenaga_kerja_kbli SET persyaratan_26='$upload_revisi'";
      }elseif($id_upload=="27"){
        $select="UPDATE bu_tenaga_kerja_kbli SET persyaratan_27='$upload_revisi'";
      }
      $id_bu=$record[0]['ID_BU'];
      $noreg=$record[0]['Option1'];
      $where="WHERE ID_Bu='$id_bu' AND Noreg='$noreg'";

      $result=$this->Bu_model->update($select,$where);
      $result2=$this->Bu_model->update_sad($select,$where);
      if($result=="Success" AND $result2=="Success"){
        $this->Bu_model->revisi($id_record);
        $this->session->set_flashdata('title','Success');
        $this->session->set_flashdata('text','Data'.$record[0]['Deskripsi'].'Berhasil Di Perbarui');
        $this->session->set_flashdata('class', "success");
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('result' => 1)));
      }else{
        $this->session->set_flashdata('title','Failed');
        $this->session->set_flashdata('text','Data'.$record[0]['Deskripsi'].'Gagal Di Perbaiki');
        $this->session->set_flashdata('class', "error");
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('result' => 1)));
      }
    }else{
      $this->session->set_flashdata('title','Failed');
      $this->session->set_flashdata('text','Data'.$record[0]['Deskripsi'].'Gagal Di Upload');
      $this->session->set_flashdata('class', "error");
      $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode(array('result' => 1)));
    }
  }
}else{
  $this->session->set_flashdata('title','Warning');
  $this->session->set_flashdata('text','Anda tidak memiliki akses');
  $this->session->set_flashdata('class', "warning");
  redirect('login','refresh');
}
}
function pengurus_bu($id){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->badan_usaha()){

  $id_record=decrypt_url($id);
  $this->Bu_model->read_mail($id_record);
  $sessionarray=array(
    'id_record'=>$id_record
  );
  $this->session->set_userdata($sessionarray);
  $record=$this->Bu_model->get_mail($id_record);

  $this->data = array(
    'record'=>$record
  );

  $this->template->load('menu/menu','bu/revisi/pengurus_bu', $this->data);
}else{
  $this->session->set_flashdata('title','Warning');
  $this->session->set_flashdata('text','Anda tidak memiliki akses');
  $this->session->set_flashdata('class', "warning");
  redirect('login','refresh');
}
}

function update_pengurus_bu(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->badan_usaha()){


  $post = $this->input->post();

  $id_record=decrypt_url($post['fff']);
  $record=$this->Bu_model->get_mail($id_record);


  $id_upload=$record[0]['ID_UPLOAD'];
  if($_FILES['file_upload']['name'])
  {
    $this->load->library('upload');
    $id_user=$this->session->userdata('id_user');
    $nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
    if($id_upload=="14"){
      $config['upload_path'] = './assets/bukti/badan_usaha/14_ktp_pengurus';
      $alamat="./assets/bukti/badan_usaha/14_ktp_pengurus/";
      $url=base_url()."assets/bukti/badan_usaha/14_ktp_pengurus/";
    }elseif($id_upload=="15"){
      $config['upload_path'] = './assets/bukti/badan_usaha/15_npwp_pengurus';
      $alamat="./assets/bukti/badan_usaha/15_npwp_pengurus/";
      $url=base_url()."assets/bukti/badan_usaha/15_npwp_pengurus/";
    }elseif($id_upload=="16"){
      $config['upload_path'] = './assets/bukti/badan_usaha/16_riwayat_hidup_pengurus';
      $alamat="./assets/bukti/badan_usaha/16_riwayat_hidup_pengurus/";
      $url=base_url()."assets/bukti/badan_usaha/16_riwayat_hidup_pengurus/";
    }elseif($id_upload=="17"){
      $config['upload_path'] = './assets/bukti/badan_usaha/17_pernyataan_bukan_pns_pengurus';
      $alamat="./assets/bukti/badan_usaha/17_pernyataan_bukan_pns_pengurus/";
      $url=base_url()."assets/bukti/badan_usaha/17_pernyataan_bukan_pns_pengurus/";
    }elseif($id_upload=="18"){
      $config['upload_path'] = './assets/bukti/badan_usaha/18_photo_pjbu_pengurus';
      $alamat="./assets/bukti/badan_usaha/18_photo_pjbu_pengurus/";
      $url=base_url()."assets/bukti/badan_usaha/18_photo_pjbu_pengurus/";
    }
    $config['allowed_types'] = 'pdf|jpg|jpeg|png';
    $config['overwrite'] = TRUE;
    $config['file_name'] = $nmfile;
    $this->upload->initialize($config);
    if($this->upload->do_upload('file_upload')){
      $gbr = $this->upload->data();
      $filename=$gbr['file_name'];
      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
      $upload_revisi=$gbr['file_name'];
      if($id_upload=="14"){
        $select="UPDATE bu_pengurus SET persyaratan_14='$upload_revisi'";
      }elseif($id_upload=="15"){
        $select="UPDATE bu_pengurus SET persyaratan_15='$upload_revisi'";
      }elseif($id_upload=="16"){
        $select="UPDATE bu_pengurus SET persyaratan_16='$upload_revisi'";
      }elseif($id_upload=="17"){
        $select="UPDATE bu_pengurus SET persyaratan_17='$upload_revisi'";
      }elseif($id_upload=="18"){
        $select="UPDATE bu_pengurus SET persyaratan_18='$upload_revisi'";
      }
      $id_bu=$record[0]['ID_BU'];
      $id_pengurus=$record[0]['Option1'];
      $where="WHERE ID_BU='$id_bu' AND id_pengurus='$id_pengurus'";

      $result=$this->Bu_model->update($select,$where);
      $result2=$this->Bu_model->update_sad($select,$where);
      if($result=="Success" AND $result2="Success"){
        $this->Bu_model->revisi($id_record);
        $this->session->set_flashdata('title','Success');
        $this->session->set_flashdata('text','Data'.$record[0]['Deskripsi'].'Berhasil Di Perbarui');
        $this->session->set_flashdata('class', "success");
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('result' => 1)));
      }else{
        $this->session->set_flashdata('title','Failed');
        $this->session->set_flashdata('text','Data'.$record[0]['Deskripsi'].'Gagal Di Perbaiki');
        $this->session->set_flashdata('class', "error");
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('result' => 1)));
      }
    }else{
      $this->session->set_flashdata('title','Failed');
      $this->session->set_flashdata('text','Data'.$record[0]['Deskripsi'].'Gagal Di Upload');
      $this->session->set_flashdata('class', "error");
      $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode(array('result' => 1)));
    }
  }
}else{
  $this->session->set_flashdata('title','Warning');
  $this->session->set_flashdata('text','Anda tidak memiliki akses');
  $this->session->set_flashdata('class', "warning");
  redirect('login','refresh');
}
}
function pengalaman_bu($id){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->badan_usaha()){

  $id_record=decrypt_url($id);
  $this->Bu_model->read_mail($id_record);
  $sessionarray=array(
    'id_record'=>$id_record
  );
  $this->session->set_userdata($sessionarray);
  $record=$this->Bu_model->get_mail($id_record);

  $this->data = array(
    'record'=>$record
  );

  $this->template->load('menu/menu','bu/revisi/pengalaman_bu', $this->data);
}else{
  $this->session->set_flashdata('title','Warning');
  $this->session->set_flashdata('text','Anda tidak memiliki akses');
  $this->session->set_flashdata('class', "warning");
  redirect('login','refresh');
}
}
function update_pengalaman_bu(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->badan_usaha()){

  $post = $this->input->post();
  $id_record=decrypt_url($post['fff']);
  $record=$this->Bu_model->get_mail($id_record);

  $id_upload=$record[0]['ID_UPLOAD'];
  if($_FILES['file_upload']['name'])
  {
    $this->load->library('upload');
    $id_user=$this->session->userdata('id_user');
$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
    if($id_upload=="32"){
      $config['upload_path'] = './assets/bukti/badan_usaha/32_pengalaman_bu';
      $alamat="./assets/badan_usaha/32_pengalaman_bu/";
      $url=base_url()."assets/bukti/badan_usaha/32_pengalaman_bu/";
    }elseif($id_upload=="34"){
      $config['upload_path'] = './assets/bukti/badan_usaha/34_rekaman_pho';
      $alamat="./assets/bukti/badan_usaha/34_rekaman_pho/";
      $url=base_url()."assets/bukti/badan_usaha/34_rekaman_pho/";
    }elseif($id_upload=="35"){
      $config['upload_path'] = './assets/bukti/badan_usaha/35_faktur_pajak_ppn';
      $alamat="./assets/bukti/badan_usaha/35_faktur_pajak_ppn/";
      $url=base_url()."assets/bukti/badan_usaha/35_faktur_pajak_ppn/";
    }elseif($id_upload=="36"){
      $config['upload_path'] = './assets/bukti/badan_usaha/36_surat_pernyataan_pecah_kontrak';
      $alamat="./assets/bukti/badan_usaha/36_surat_pernyataan_pecah_kontrak/";
      $url=base_url()."assets/bukti/badan_usaha/36_surat_pernyataan_pecah_kontrak/";
    }
    $config['allowed_types'] = 'pdf|jpg|jpeg|png';
    $config['overwrite'] = TRUE;
    $config['file_name'] = $nmfile;
    $this->upload->initialize($config);
    if($this->upload->do_upload('file_upload')){
      $gbr = $this->upload->data();
      $filename=$gbr['file_name'];
      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);

      $upload_revisi=$gbr['file_name'];
      if($id_upload=="32"){
        $select="UPDATE bu_pengalaman_kbli SET persyaratan_32='$upload_revisi'";
      }elseif($id_upload=="34"){
        $select="UPDATE bu_pengalaman_kbli SET persyaratan_34='$upload_revisi'";
      }elseif($id_upload=="35"){
        $select="UPDATE bu_pengalaman_kbli SET persyaratan_35='$upload_revisi'";
      }elseif($id_upload=="36"){
        $select="UPDATE bu_pengalaman_kbli SET persyaratan_36='$upload_revisi'";
      }
      $id_bu=$record[0]['ID_BU'];
      $nomor_kontrak=$record[0]['Option1'];
      $id_sub_klasifikasi=$record[0]['Option2'];
      $where="WHERE ID_BU='$id_bu' AND Nomor_Kontrak='$nomor_kontrak' AND ID_Sub_Klasifikasi_kbli='$id_sub_klasifikasi'";

      $result=$this->Bu_model->update($select,$where);
      $result2=$this->Bu_model->update_sad($select,$where);
      if($result=="Success" AND $result2=="Success"){
        $this->Bu_model->revisi($id_record);
        $this->session->set_flashdata('title','Success');
        $this->session->set_flashdata('text','Data'.$record[0]['Deskripsi'].'Berhasil Di Perbarui');
        $this->session->set_flashdata('class', "success");
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('result' => 1)));
      }else{
        $this->session->set_flashdata('title','Failed');
        $this->session->set_flashdata('text','Data'.$record[0]['Deskripsi'].'Gagal Di Perbaiki');
        $this->session->set_flashdata('class', "error");
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('result' => 1)));
      }
    }else{
      $this->session->set_flashdata('title','Failed');
      $this->session->set_flashdata('text','Data'.$record[0]['Deskripsi'].'Gagal Di Upload');
      $this->session->set_flashdata('class', "error");
      $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode(array('result' => 1)));
    }
  }
}else{
  $this->session->set_flashdata('title','Warning');
  $this->session->set_flashdata('text','Anda tidak memiliki akses');
  $this->session->set_flashdata('class', "warning");
  redirect('login','refresh');
}
}

function administrasi_bu($id){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->badan_usaha()){

  $id_record=decrypt_url($id);
  $this->Bu_model->read_mail($id_record);
  $sessionarray=array(
    'id_record'=>$id_record
  );
  $this->session->set_userdata($sessionarray);
  $record=$this->Bu_model->get_mail($id_record);

  $this->data = array(
    'record'=>$record
  );

  $this->template->load('menu/menu','bu/revisi/administrasi_bu', $this->data);
}else{
  $this->session->set_flashdata('title','Warning');
  $this->session->set_flashdata('text','Anda tidak memiliki akses');
  $this->session->set_flashdata('class', "warning");
  redirect('login','refresh');
}
}
function update_administrasi_bu(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }elseif($this->ion_auth->badan_usaha()){

  $post = $this->input->post();
  $id_record=decrypt_url($post['fff']);
  $record=$this->Bu_model->get_mail($id_record);

  $id_upload=$record[0]['ID_UPLOAD'];
  if($_FILES['file_upload']['name'])
  {
    $this->load->library('upload');
    $id_user=$this->session->userdata('id_user');
$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
    if($id_upload=="9"){
      $config['upload_path'] = './assets/bukti/badan_usaha/9_npwp_perusahaan';
      $alamat="./assets/bukti/badan_usaha/9_npwp_perusahaan/";
      $url=base_url()."assets/bukti/badan_usaha/9_npwp_perusahaan/";
    }elseif($id_upload=="10"){
      $config['upload_path'] = './assets/bukti/badan_usaha/10_kta_asosiasi';
      $alamat="./assets/bukti/badan_usaha/10_kta_asosiasi/";
      $url=base_url()."assets/bukti/badan_usaha/10_kta_asosiasi/";
    }elseif($id_upload=="11"){
      $config['upload_path'] = './assets/bukti/badan_usaha/11_surat_keterangan_domisili';
      $alamat="./assets/bukti/badan_usaha/11_surat_keterangan_domisili/";
      $url=base_url()."assets/bukti/badan_usaha/11_surat_keterangan_domisili/";
    }elseif($id_upload=="13"){
      $config['upload_path'] = './assets/bukti/badan_usaha/13_izin_bagi_penanam_modal';
      $alamat="./assets/bukti/badan_usaha/13_izin_bagi_penanam_modal/";
      $url=base_url()."assets/bukti/badan_usaha/13_izin_bagi_penanam_modal/";
    }elseif($id_upload=="37"){
      $config['upload_path'] = './assets/bukti/badan_usaha/37_formulir_isian_data_peralatan';
      $alamat="./assets/bukti/badan_usaha/37_formulir_isian_data_peralatan/";
      $url=base_url()."assets/bukti/badan_usaha/37_formulir_isian_data_peralatan/";
    }elseif($id_upload=="39"){
      $config['upload_path'] = './assets/bukti/badan_usaha/39_sertifikat_iso';
      $alamat="./assets/bukti/badan_usaha/39_sertifikat_iso/";
      $url=base_url()."assets/bukti/badan_usaha/39_sertifikat_iso/";
    }
    $config['allowed_types'] = 'pdf|jpg|jpeg|png';
    $config['overwrite'] = TRUE;
    $config['file_name'] = $nmfile;
    $this->upload->initialize($config);
    if($this->upload->do_upload('file_upload')){
      $gbr = $this->upload->data();
      $filename=$gbr['file_name'];
      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);

      $upload_revisi=$gbr['file_name'];
      if($id_upload=="9"){
        $select="UPDATE bu SET persyaratan_9='$upload_revisi'";
      }elseif($id_upload=="10"){
        $select="UPDATE bu SET persyaratan_10='$upload_revisi'";
      }elseif($id_upload=="11"){
        $select="UPDATE bu SET persyaratan_11='$upload_revisi'";
      }elseif($id_upload=="13"){
        $select="UPDATE bu SET persyaratan_13='$upload_revisi'";
      }elseif($id_upload=="37"){
        $select="UPDATE bu SET persyaratan_37='$upload_revisi'";
      }elseif($id_upload=="39"){
        $select="UPDATE bu SET persyaratan_39='$upload_revisi'";
      }
      $id_bu=$record[0]['ID_BU'];
      $where="WHERE ID_BU='$id_bu'";
      $result=$this->Bu_model->update($select,$where);
      $result2=$this->Bu_model->update_sad($select,$where);
      if($result=="Success" AND $result2=="Success"){
        $this->Bu_model->revisi($id_record);
        $this->session->set_flashdata('title','Success');
        $this->session->set_flashdata('text','Data'.$record[0]['Deskripsi'].'Berhasil Di Perbarui');
        $this->session->set_flashdata('class', "success");
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('result' => 1)));
      }else{
        $this->session->set_flashdata('title','Failed');
        $this->session->set_flashdata('text','Data'.$record[0]['Deskripsi'].'Gagal Di Perbaiki');
        $this->session->set_flashdata('class', "error");
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode(array('result' => 1)));
      }
    }else{
      $this->session->set_flashdata('title','Failed');
      $this->session->set_flashdata('text','Data'.$record[0]['Deskripsi'].'Gagal Di Upload');
      $this->session->set_flashdata('class', "error");
      $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode(array('result' => 1)));
    }
  }
}else{
  $this->session->set_flashdata('title','Warning');
  $this->session->set_flashdata('text','Anda tidak memiliki akses');
  $this->session->set_flashdata('class', "warning");
  redirect('login','refresh');
}
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
}
?>
