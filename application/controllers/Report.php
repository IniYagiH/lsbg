<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Report extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('bu/Bu_model');
    $this->load->model('tk/Tenaga_kerja_model');
    $this->load->helper(array('url','html','file','form','security'));
    $this->load->library(array('ion_auth','form_validation','Template'));
    $this->load->helper('Ssl');
  }
  function tt_verifikasi($tgl_permohonan)
   {
     if (!$this->ion_auth->ceklogin())
     {
       $this->session->set_flashdata('title','Login Gagal');
       $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
       $this->session->set_flashdata('class', "warning");
       redirect('login', 'refresh');
     }elseif($this->ion_auth->asosiasi_bu_pusat() OR $this->ion_auth->asosiasi_bu_propinsi() OR $this->ion_auth->bapel_propinsi() OR $this->ion_auth->usbu_propinsi() OR $this->ion_auth->usbu_pusat() OR $this->ion_auth->bapelpusat()){

     $id_bu=$this->session->userdata('id_bu');
     $prop="09";
     if($prop=="00"){
       $prop="09";
     }
     $propinsi=$this->Bu_model->provinsi_search($prop);
     $this->load->library('pdfgenerator');
     $tgl_dec = decrypt_url($tgl_permohonan);
     $tgl=substr($tgl_dec,0,10);
     $asosiasi=substr($tgl_dec,10,10);
      $data=array(
        'bu'=>$this->Bu_model->report_bu_administrasi($id_bu,$asosiasi,$tgl),
        'propinsi'=>$propinsi
      );
      $html = $this->load->view('report/tt_verifikasi_bu', $data, true);
      $filename = 'report_'.time();
      $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
      //$this->load->view('report/tt_bapel_bu',$data);
    }else{
      $this->session->set_flashdata('title','Warning');
      $this->session->set_flashdata('text','Anda tidak memiliki akses');
      $this->session->set_flashdata('class', "warning");
      redirect('login','refresh');
    }
   }
   function tt_verifikasi_ceklis($tgl_permohonan)
   {
     if (!$this->ion_auth->ceklogin())
     {
       $this->session->set_flashdata('title','Login Gagal');
       $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
       $this->session->set_flashdata('class', "warning");
       redirect('login', 'refresh');
     }elseif($this->ion_auth->asosiasi_bu_pusat() OR $this->ion_auth->asosiasi_bu_propinsi() OR $this->ion_auth->bapel_propinsi() OR $this->ion_auth->usbu_propinsi() OR $this->ion_auth->usbu_pusat() OR $this->ion_auth->bapelpusat()){

     $id_bu=$this->session->userdata('id_bu');
     $this->load->library('pdfgenerator');
     $id_pds=3;
     $tgl_dec = decrypt_url($tgl_permohonan);
     $tgl=substr($tgl_dec,0,10);
     $asosiasi=substr($tgl_dec,10,10);
     $id_status="0";
     $record=$this->Bu_model->cek($id_bu,$tgl,$id_status,$asosiasi);
     $tgl_vv=$record[0]['Tgl_proses'];
     $data=array(
        'tgl'=>$tgl_vv,
        'bu'=>$this->Bu_model->report_bu_administrasi($id_bu,$asosiasi,$tgl),
        'ceklis'=>$this->Bu_model->report_bu_ceklis($id_bu,$id_pds,$asosiasi,$tgl)
      );
      $html = $this->load->view('report/tt_verifikasi_bu_ceklis', $data, true);
      $filename = 'report_'.time();
      $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
      //$this->load->view('report/tt_bapel_bu',$data);
    }else{
      $this->session->set_flashdata('title','Warning');
      $this->session->set_flashdata('text','Anda tidak memiliki akses');
      $this->session->set_flashdata('class', "warning");
      redirect('login','refresh');
    }
   }
  function vva($tgl)
  {
    if (!$this->ion_auth->ceklogin())
    {
      $this->session->set_flashdata('title','Login Gagal');
      $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
      $this->session->set_flashdata('class', "warning");
      redirect('login', 'refresh');
    }elseif($this->ion_auth->asosiasi_bu_pusat() OR $this->ion_auth->asosiasi_bu_propinsi() OR $this->ion_auth->bapel_propinsi() OR $this->ion_auth->usbu_propinsi() OR $this->ion_auth->usbu_pusat() OR $this->ion_auth->bapelpusat()){

    $id_bu=$this->session->userdata('id_bu');
    $this->load->library('pdfgenerator');
    $id_pds=1;
    $tgl_dec = decrypt_url($tgl);
    $asosiasi = substr($tgl_dec,10,10);
    $tgl_permohonan = substr($tgl_dec,0,10);

    $data=array(
       'bu'=>$this->Bu_model->report_bu_administrasi($id_bu,$asosiasi,$tgl_permohonan),
       'ceklis'=>$this->Bu_model->report_bu_ceklis($id_bu,$id_pds,$asosiasi,$tgl_permohonan)
     );
     $html = $this->load->view('report/bu_ceklis_vva', $data, true);
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

}
?>
