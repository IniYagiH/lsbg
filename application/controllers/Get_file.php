<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Get_file extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('bu/Bu_model');
    $this->load->model('tk/Tenaga_kerja_model');
    $this->load->model('tk/Tkpds_model');
    $this->load->helper(array('url', 'html', 'file', 'form', 'security', 'download'));
    $this->load->library(array('form_validation', 'Template'));
    $this->load->helper('Ssl');
  }
  function survailen_pjsk_pernyataan($filename)
  {

    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $img = fopen('./assets/bukti/badan_usaha/18_photo_pjbu_pengurus/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {
        $path = base_url() . 'assets/bukti/badan_usaha/18_photo_pjbu_pengurus/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/badan_usaha/18_photo_pjbu_pengurus/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function survailen_asosiasi($filename)
  {

    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $img = fopen('./assets/bukti/badan_usaha/9_npwp_perusahaan/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {
        $path = base_url() . 'assets/bukti/badan_usaha/9_npwp_perusahaan/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/badan_usaha/9_npwp_perusahaan/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function survailen_smap($filename)
  {

    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $img = fopen('./assets/bukti/badan_usaha/1_bukti_berita_acara_verifikasi/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {
        $path = base_url() . 'assets/bukti/badan_usaha/1_bukti_berita_acara_verifikasi/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/badan_usaha/1_bukti_berita_acara_verifikasi/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function survailen_pjsk_skk($filename)
  {

    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $img = fopen('./assets/bukti/badan_usaha/17_pernyataan_bukan_pns_pengurus/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {
        $path = base_url() . 'assets/bukti/badan_usaha/17_pernyataan_bukan_pns_pengurus/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/badan_usaha/17_pernyataan_bukan_pns_pengurus/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function survailen_pjt_pernyataan($filename)
  {

    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $img = fopen('./assets/bukti/badan_usaha/16_riwayat_hidup_pengurus/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {
        $path = base_url() . 'assets/bukti/badan_usaha/16_riwayat_hidup_pengurus/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/badan_usaha/16_riwayat_hidup_pengurus/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function survailen_pjt_skk($filename)
  {

    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $img = fopen('./assets/bukti/badan_usaha/15_npwp_pengurus/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {
        $path = base_url() . 'assets/bukti/badan_usaha/15_npwp_pengurus/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/badan_usaha/15_npwp_pengurus/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function survailen_neraca($filename)
  {

    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $img = fopen('./assets/bukti/badan_usaha/14_ktp_pengurus/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {
        $path = base_url() . 'assets/bukti/badan_usaha/14_ktp_pengurus/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/badan_usaha/14_ktp_pengurus/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function survailen_bast($filename)
  {

    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $img = fopen('./assets/bukti/badan_usaha/36_surat_pernyataan_pecah_kontrak/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {
        $path = base_url() . 'assets/bukti/badan_usaha/36_surat_pernyataan_pecah_kontrak/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/badan_usaha/36_surat_pernyataan_pecah_kontrak/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function survailen_kontrak($filename)
  {

    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $img = fopen('./assets/bukti/badan_usaha/32_pengalaman_bu/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {
        $path = base_url() . 'assets/bukti/badan_usaha/32_pengalaman_bu/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/badan_usaha/32_pengalaman_bu/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function survailen_akte($filename)
  {

    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $img = fopen('./assets/bukti/badan_usaha/13_izin_bagi_penanam_modal/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {
        $path = base_url() . 'assets/bukti/badan_usaha/13_izin_bagi_penanam_modal/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/badan_usaha/13_izin_bagi_penanam_modal/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function survailen_gedung($filename)
  {

    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $img = fopen('./assets/bukti/badan_usaha/11_surat_keterangan_domisili/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {
        $path = base_url() . 'assets/bukti/badan_usaha/11_surat_keterangan_domisili/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/badan_usaha/11_surat_keterangan_domisili/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function survailen_ss($filename)
  {

    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $img = fopen('./assets/bukti/badan_usaha/10_kta_asosiasi/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {
        $path = base_url() . 'assets/bukti/badan_usaha/10_kta_asosiasi/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/badan_usaha/10_kta_asosiasi/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_invoice_sertifikasi($filename)
  {

    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $img = fopen('./assets/bukti/badan_usaha/bukti_invoice/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {
        $path = base_url() . 'assets/bukti/badan_usaha/bukti_invoice/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/badan_usaha/bukti_invoice/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_invoice($id1, $id2)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }
    $nib = decrypt_url($id1);
    $tgl_permohonan = decrypt_url($id2);
    $rec = $this->Bu_model->cek_status_0($nib, $tgl_permohonan);
    $filename = $rec[0]['file_invoice'];
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $img = fopen('./assets/bukti/badan_usaha/bukti_invoice/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {
        $path = base_url() . 'assets/bukti/badan_usaha/bukti_invoice/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/badan_usaha/bukti_invoice/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_surat_tugas($id1)
  {
    

    $record = $this->Bu_model->get_detail_penunjukan($nib, $tgl_permohonan);
    $filename = $id1;
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));


    $img = fopen('./assets/bukti/surat_tugas/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {
        $path = base_url() . 'assets/bukti/surat_tugas/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/surat_tugas/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_bu_nib($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));


    $img = fopen('./assets/bukti/registrasi/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {
        header('Content-Type: application/pdf');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/registrasi/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_bu_neraca_ski($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));


    $img = fopen('./assets/bukti/badan_usaha/kap/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {
        header('Content-Type: application/pdf');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/badan_usaha/kap/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_user_surat($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));


    $img = fopen('/home/sikinew/bukti/user/surat_pernyataan_2020/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {
        header('Content-Type: application/pdf');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = '/home/sikinew/bukti/user/surat_pernyataan_2020/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_user_ktp($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));


    $img = fopen('/home/sikinew/bukti/user/ktp/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {
        header('Content-Type: application/pdf');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = '/home/sikinew/bukti/user/ktp/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_user_foto($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));


    $img = fopen('/home/sikinew/bukti/user/foto/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {
        header('Content-Type: application/pdf');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = '/home/sikinew/bukti/user/foto/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }

  function get_bu_49($filename = NULL)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $tgl_file = substr($filename, 0, 10);

    $img = fopen('./assets/bukti/badan_usaha/bukti_pembayaran/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {

        $path = base_url() . 'assets/bukti/badan_usaha/bukti_pembayaran/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {
        $path = './assets/bukti/badan_usaha/bukti_pembayaran/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_bu_perjanjian($filename = NULL)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $tgl_file = substr($filename, 0, 10);

    $img = fopen('./assets/bukti/badan_usaha/bukti_perjanjian/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {

        $path = base_url() . 'assets/bukti/badan_usaha/bukti_perjanjian/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {
        $path = './assets/bukti/badan_usaha/bukti_perjanjian/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }


  function get_bu_13($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $bates = '2020-11-01';
    $tgl_file = substr($filename, 0, 10);
    $x = strtotime($bates);
    $y = strtotime($tgl_file);
    $img = fopen('./assets/bukti/badan_usaha/13_izin_bagi_penanam_modal/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {

        $path = base_url() . 'assets/bukti/badan_usaha/13_izin_bagi_penanam_modal/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {
        $path = './assets/bukti/badan_usaha/13_izin_bagi_penanam_modal/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_bu_11($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $img = fopen('./assets/bukti/badan_usaha/11_surat_keterangan_domisili/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {

        $path = base_url() . 'assets/bukti/badan_usaha/11_surat_keterangan_domisili/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {
        $path = './assets/bukti/badan_usaha/11_surat_keterangan_domisili/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_bu_9($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $img = fopen('./assets/bukti/badan_usaha/9_npwp_perusahaan/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {

        $path = base_url() . 'assets/bukti/badan_usaha/9_npwp_perusahaan/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {
        $path = './assets/bukti/badan_usaha/9_npwp_perusahaan/' . $filename;


        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_bu_39($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $img = fopen('./assets/bukti/badan_usaha/39_sertifikat_iso/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {

        $path = base_url() . 'assets/bukti/badan_usaha/9_npwp_perusahaan/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {
        if ($y < $x) {
          $path = './assets/bukti/badan_usaha/39_sertifikat_iso/' . $filename;
        } else {
          $path = '/home/sikinew/bukti/badan_usaha/39_sertifikat_iso/' . $filename;
        }
        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_bu_37($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $img = fopen('./assets/bukti/badan_usaha/37_formulir_isian_data_peralatan/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {

        $path = base_url() . 'assets/bukti/badan_usaha/9_npwp_perusahaan/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {
        $path = './assets/bukti/badan_usaha/37_formulir_isian_data_peralatan/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_bu_16($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $img = fopen('./assets/bukti/badan_usaha/16_riwayat_hidup_pengurus/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {

        $path = base_url() . 'assets/bukti/badan_usaha/16_riwayat_hidup_pengurus/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/badan_usaha/16_riwayat_hidup_pengurus/' . $filename;


        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }

  function get_bu_17($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $img = fopen('./assets/bukti/badan_usaha/17_pernyataan_bukan_pns_pengurus/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {

        $path = base_url() . 'assets/bukti/badan_usaha/17_pernyataan_bukan_pns_pengurus/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {
        $path = './assets/bukti/badan_usaha/17_pernyataan_bukan_pns_pengurus/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }

  function get_bu_14($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $img = fopen('./assets/bukti/badan_usaha/14_ktp_pengurus/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {

        $path = base_url() . 'assets/bukti/badan_usaha/14_ktp_pengurus/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/badan_usaha/14_ktp_pengurus/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }

  function get_bu_18($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $img = fopen('./assets/bukti/badan_usaha/18_photo_pjbu_pengurus/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {

        $path = base_url() . 'assets/bukti/badan_usaha/14_ktp_pengurus/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {
        $path = './assets/bukti/badan_usaha/18_photo_pjbu_pengurus/' . $filename;


        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_bu_15($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $img = fopen('./assets/bukti/badan_usaha/15_npwp_pengurus/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {

        $path = base_url() . 'assets/bukti/badan_usaha/15_npwp_pengurus/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/badan_usaha/15_npwp_pengurus/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_bu_36($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $bates = '2020-11-01';
    $tgl_file = substr($filename, 0, 10);
    $x = strtotime($bates);
    $y = strtotime($tgl_file);
    //if($y < $x){
    $img = fopen('./assets/bukti/badan_usaha/36_surat_pernyataan_pecah_kontrak/' . $filename, 'r');
    /*}else{
    $img = fopen('/home/sikinew/bukti/badan_usaha/36_surat_pernyataan_pecah_kontrak/'.$filename, 'r');
  }*/
    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {
        $bates2 = '2020-11-24';
        $tgl_file = substr($filename, 0, 10);
        $a = strtotime($bates2);
        $b = strtotime($tgl_file);
        //if($b < $a){
        $path = base_url() . 'assets/bukti/badan_usaha/36_surat_pernyataan_pecah_kontrak/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
        /*}else{
            header('Content-Type: application/pdf');
            echo fpassthru($img);
exit;
}*/
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/badan_usaha/36_surat_pernyataan_pecah_kontrak/' . $filename;


        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_bu_35($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $bates = '2020-11-01';
    $tgl_file = substr($filename, 0, 10);
    $x = strtotime($bates);
    $y = strtotime($tgl_file);

    $img = fopen('./assets/bukti/badan_usaha/35_faktur_pajak_ppn/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {

        $path = base_url() . 'assets/bukti/badan_usaha/35_faktur_pajak_ppn/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {
        $path = './assets/bukti/badan_usaha/35_faktur_pajak_ppn/' . $filename;


        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_bu_34($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $img = fopen('./assets/bukti/badan_usaha/34_rekaman_pho/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {

        $path = base_url() . 'assets/bukti/badan_usaha/34_rekaman_pho/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/badan_usaha/34_rekaman_pho/' . $filename;


        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_bu_32($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $img = fopen('./assets/bukti/badan_usaha/32_pengalaman_bu/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {

        $path = base_url() . 'assets/bukti/badan_usaha/32_pengalaman_bu/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {
        if ($y < $x) {
          $path = './assets/bukti/badan_usaha/32_pengalaman_bu/' . $filename;
        } else {
          $path = '/home/sikinew/bukti/badan_usaha/32_pengalaman_bu/' . $filename;
        }
        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_bu_7($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $bates = '2020-11-01';
    $tgl_file = substr($filename, 0, 10);
    $x = strtotime($bates);
    $y = strtotime($tgl_file);
    //if($y < $x){
    $img = fopen('./assets/bukti/badan_usaha/7_akte_pendirian/' . $filename, 'r');
    /*}else{
    $img = fopen('/home/sikinew/bukti/badan_usaha/7_akte_pendirian/'.$filename, 'r');
  }*/
    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {
        $bates2 = '2020-11-24';
        $tgl_file = substr($filename, 0, 10);
        $a = strtotime($bates2);
        $b = strtotime($tgl_file);
        //if($b < $a){
        $path = base_url() . 'assets/bukti/badan_usaha/7_akte_pendirian/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
        /*  }else{
            header('Content-Type: application/pdf');
            echo fpassthru($img);
exit;
}*/
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {
        if ($y < $x) {
          $path = './assets/bukti/badan_usaha/7_akte_pendirian/' . $filename;
        } else {
          $path = '/home/sikinew/bukti/badan_usaha/7_akte_pendirian/' . $filename;
        }
        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_bu_8($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $bates = '2020-11-01';
    $tgl_file = substr($filename, 0, 10);
    $x = strtotime($bates);
    $y = strtotime($tgl_file);
    //if($y < $x){
    $img = fopen('./assets/bukti/badan_usaha/8_akte_perubahan/' . $filename, 'r');
    /*  }else{
    $img = fopen('/home/sikinew/bukti/badan_usaha/8_akte_perubahan/'.$filename, 'r');
  }*/
    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {
        $bates2 = '2020-11-24';
        $tgl_file = substr($filename, 0, 10);
        $a = strtotime($bates2);
        $b = strtotime($tgl_file);
        //  if($b < $a){
        $path = base_url() . 'assets/bukti/badan_usaha/8_akte_perubahan/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
        /*}else{
            header('Content-Type: application/pdf');
            echo fpassthru($img);
exit;
}*/
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {
        if ($y < $x) {
          $path = './assets/bukti/badan_usaha/8_akte_perubahan/' . $filename;
        } else {
          $path = '/home/sikinew/bukti/badan_usaha/8_akte_perubahan/' . $filename;
        }
        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_bu_22($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $img = fopen('./assets/bukti/badan_usaha/22_spt_2_tahun_terakhir/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {

        $path = base_url() . 'assets/bukti/badan_usaha/22_spt_2_tahun_terakhir/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {
        $path = './assets/bukti/badan_usaha/22_spt_2_tahun_terakhir/' . $filename;


        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_bu_saham($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $img = fopen('./assets/bukti/badan_usaha/bukti_pemegang_saham/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {

        $path = base_url() . 'assets/bukti/badan_usaha/bukti_pemegang_saham/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/badan_usaha/bukti_pemegang_saham/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_bu_21($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
    $bates = '2020-11-01';
    $tgl_file = substr($filename, 0, 10);
    $x = strtotime($bates);
    $y = strtotime($tgl_file);
    //if($y < $x){
    $img = fopen('./assets/bukti/badan_usaha/21_laporan_akuntan_publik/' . $filename, 'r');
    /*}else{
    $img = fopen('/home/sikinew/bukti/badan_usaha/21_laporan_akuntan_publik/'.$filename, 'r');
  }*/
    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {
        $bates2 = '2020-11-24';
        $tgl_file = substr($filename, 0, 10);
        $a = strtotime($bates2);
        $b = strtotime($tgl_file);
        //if($b < $a){
        $path = base_url() . 'assets/bukti/badan_usaha/21_laporan_akuntan_publik/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
        /*}else{
            header('Content-Type: application/pdf');
            echo fpassthru($img);
exit;
}*/
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {
        if ($y < $x) {
          $path = './assets/bukti/badan_usaha/21_laporan_akuntan_publik/' . $filename;
        } else {
          $path = '/home/sikinew/bukti/badan_usaha/21_laporan_akuntan_publik/' . $filename;
        }
        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_bu_20($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $img = fopen('./assets/bukti/badan_usaha/20_neraca_bu/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {

        $path = base_url() . 'assets/bukti/badan_usaha/20_neraca_bu/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/badan_usaha/20_neraca_bu/' . $filename;


        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_bu_26($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $img = fopen('./assets/bukti/badan_usaha/26_npwp_tk/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {

        $path = base_url() . 'assets/bukti/badan_usaha/26_npwp_tk/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {
        $path = './assets/bukti/badan_usaha/26_npwp_tk/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_bu_25($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $img = fopen('./assets/bukti/badan_usaha/25_ijazah_tk/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {

        $path = base_url() . 'assets/bukti/badan_usaha/25_ijazah_tk/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/badan_usaha/25_ijazah_tk/' . $filename;


        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_bu_24($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $img = fopen('./assets/bukti/badan_usaha/24_ktp_tk/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {

        $path = base_url() . 'assets/bukti/badan_usaha/24_ktp_tk/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {
        if ($y < $x) {
          $path = './assets/bukti/badan_usaha/24_ktp_tk/' . $filename;
        } else {
          $path = '/home/sikinew/bukti/badan_usaha/24_ktp_tk/' . $filename;
        }
        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_bu_27($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $img = fopen('./assets/bukti/badan_usaha/27_riwayat_hidup_tk/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {

        $path = base_url() . 'assets/bukti/badan_usaha/27_riwayat_hidup_tk/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/badan_usaha/27_riwayat_hidup_tk/' . $filename;


        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_bu_23($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $img = fopen('./assets/bukti/badan_usaha/23_photo_copy_ska_tk/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {
        $bates2 = '2020-11-24';

        $path = base_url() . 'assets/bukti/badan_usaha/23_photo_copy_ska_tk/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/badan_usaha/23_photo_copy_ska_tk/' . $filename;


        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_bu_1($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $img = fopen('./assets/bukti/badan_usaha/1_bukti_berita_acara_verifikasi/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {

        $path = base_url() . 'assets/bukti/badan_usaha/1_bukti_berita_acara_verifikasi/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/badan_usaha/1_bukti_berita_acara_verifikasi/' . $filename;


        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_bu_2($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $img = fopen('./assets/bukti/badan_usaha/2_formulir_permohonan_sbu/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {

        $path = base_url() . 'assets/bukti/badan_usaha/2_formulir_permohonan_sbu/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/badan_usaha/2_formulir_permohonan_sbu/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_bu_3($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $img = fopen('./assets/bukti/badan_usaha/3_surat_pengantar_permohonan_subklas/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {

        $path = base_url() . 'assets/bukti/badan_usaha/3_surat_pengantar_permohonan_subklas/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/badan_usaha/3_surat_pengantar_permohonan_subklas/' . $filename;


        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_bu_4($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $img = fopen('./assets/bukti/badan_usaha/4_surat_permohonan_klasifikasi/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {

        $path = base_url() . 'assets/bukti/badan_usaha/4_surat_permohonan_klasifikasi/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/badan_usaha/4_surat_permohonan_klasifikasi/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_bu_5($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $img = fopen('./assets/bukti/badan_usaha/5_surat_pernyataan_badan_usaha/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {

        $path = base_url() . 'assets/bukti/badan_usaha/5_surat_pernyataan_badan_usaha/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/badan_usaha/5_surat_pernyataan_badan_usaha/' . $filename;


        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_bu_12($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $img = fopen('./assets/bukti/badan_usaha/12_photo_copy_sbu/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {

        $path = base_url() . 'assets/bukti/badan_usaha/12_photo_copy_sbu/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/badan_usaha/12_photo_copy_sbu/' . $filename;


        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_bu_10($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $img = fopen('./assets/bukti/badan_usaha/10_kta_asosiasi/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {

        $path = base_url() . 'assets/bukti/badan_usaha/10_kta_asosiasi/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/badan_usaha/10_kta_asosiasi/' . $filename;


        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_bu_50($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $img = fopen('./assets/bukti/badan_usaha/50_rekaman_izin/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {

        $path = base_url() . 'assets/bukti/badan_usaha/50_rekaman_izin/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/badan_usaha/50_rekaman_izin/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_bu_52($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $img = fopen('./assets/bukti/badan_usaha/52_izin_pu/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {

        $path = base_url() . 'assets/bukti/badan_usaha/52_izin_pu/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {
        $path = './assets/bukti/badan_usaha/52_izin_pu/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_bu_51($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $img = fopen('./assets/bukti/badan_usaha/51_surat_rekomendasi/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {

        $path = base_url() . 'assets/bukti/badan_usaha/51_surat_rekomendasi/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/badan_usaha/51_surat_rekomendasi/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_bu_53($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $img = fopen('./assets/bukti/badan_usaha/53_penunjukan/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {

        $path = base_url() . 'assets/bukti/badan_usaha/53_penunjukan/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/badan_usaha/53_penunjukan/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_bu_54($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $img = fopen('./assets/bukti/badan_usaha/54_menjabat/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {

        $path = base_url() . 'assets/bukti/badan_usaha/54_menjabat/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/badan_usaha/54_menjabat/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_bu_59($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $img = fopen('./assets/bukti/badan_usaha/59_manajement_mutu/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {

        $path = base_url() . 'assets/bukti/badan_usaha/59_manajement_mutu/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/badan_usaha/59_manajement_mutu/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_bu_60($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $img = fopen('./assets/bukti/badan_usaha/60_anti_penyuapan/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {

        $path = base_url() . 'assets/bukti/badan_usaha/60_anti_penyuapan/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/badan_usaha/60_anti_penyuapan/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
  function get_registrasi($filename)
  {
    if (!$this->ion_auth->ceklogin()) {
      $this->session->set_flashdata('title', 'Login Gagal');
      $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "bg-warning");
      redirect('index.php/login', 'refresh');
    }
    $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    $img = fopen('./assets/bukti/registrasi/' . $filename, 'r');

    if ($img) {
      if ($file_ext == 'jpeg') {
        header('Content-Type: image/jpeg');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'pdf') {

        $path = base_url() . 'assets/bukti/registrasi/' . $filename;
        echo "<object data='" . $path . "'type='application/pdf'width='100%'height='100%'></object>";
      } elseif ($file_ext == 'png') {
        header('Content-Type: image/png');
        echo fpassthru($img);
        exit;
      } elseif ($file_ext == 'jpg') {
        header('Content-Type: image/jpg');
        echo fpassthru($img);
        exit;
      } else {

        $path = './assets/bukti/registrasi/' . $filename;

        $data =  file_get_contents($path);

        force_download($filename, $data);
      }
    } else {
      $this->load->view('error');
    }
  }
}
