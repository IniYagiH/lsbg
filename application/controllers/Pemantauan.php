<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemantauan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->model('bu/Bu_model');
    $this->load->helper(array('url','html','file','form','security'));
    $this->load->library(array('ion_auth','form_validation','Template','pagination'));
    $this->load->model('User_model');
    	$this->load->library(array('Excel'));
    $this->load->helper('Ssl');
  }
  function survailen_jadwal(){
    $this->load->library('pdfgenerator');
    $post = $this->input->post();
    $limit = $this->security->xss_clean(trim($post['limit']));

    $tahunx = $this->security->xss_clean(trim($post['tahun']));
    $tahun=$tahunx.'-12-31';
    $tahun_awal=$tahunx.'-01-01';
    $data=$this->Bu_model->list_evaluator_survailen_jadwal($tahun_awal,$tahun,$limit);
    $record = array();
    foreach ($data as $row) {
      $data_asesor=$this->Bu_model->get_asesor_survailen_tinjauan($row['NIB']);
      $tgl=substr($row['tgl_pelaksanaan'],8,2);
      $tgl_bulan=floor($tgl/7+1);
      if($tgl_bulan==5){
        $tgl_bulan=4;
      }
      
      $datax = array(
        'tgl'=>$tgl_bulan,
        'bulan'=>substr($row['tgl_pelaksanaan'],5,2),
        'asesor1'=>$data_asesor[0]['Nama'],
        'asesor2'=>$data_asesor[1]['Nama'],
        'asesor3'=>$data_asesor[2]['Nama'],
        'nama_propinsi' => $row['nama_propinsi'],

        'concat_sub' => $row['concat_sub'],
        'concat_klasifikasi' => $row['concat_klasifikasi'],
        'concat_kualifikasi' => $row['concat_kualifikasi'],
        'nama' => $row['nama'],
        'NIB' => $row['NIB'],
        'tgl_permohonan' => $row['tgl_permohonan'],
      );
      array_push($record, $datax);
    }
    $this->data = array(
      'record'=>$record,
    );
    $html = $this->load->view('survailen_jadwal', $this->data , true);
    $filename = 'report_' . time();

    $this->pdfgenerator->generate($html, $filename, true, 'A2', 'landscape');

  }
  function dafsad(){

    $data=$this->Bu_model->list_pemantauan();

    $record=array();
    foreach ($data as $row) {
      if($row['status']=='20'){
        $deskripsi_status="Tinjauan";
      }elseif($row['status']=='10'){
        $deskripsi_status="Pembayaran";
      }elseif($row['status']=='30'){
        $deskripsi_status="Pembayaran";
      }elseif($row['status']=='31'){
        $deskripsi_status="Penilaian";
      }elseif($row['status']=='50'){
        $deskripsi_status="Terbit";
      }elseif($row['status']=='11'){
        $deskripsi_status="Dikembalikan";
      }elseif($row['status']=='90'){
        $deskripsi_status="Ditolak";
      }elseif($row['status']=='92'){
        $deskripsi_status="Dibatalkan";
      }elseif($row['status']=='91'){
        $deskripsi_status="Dicabut";
      }else{
        $deskripsi_status="-";
      }

      $datax=array(
        'nama_bujk'=>$row['nama_bujk'],
        'nama_jenis'=>$row['nama_jenis'],
        'bentuk_nama'=>$row['bentuk_nama'],
        'status'=>$row['status'],
        'NIB'=>$row['NIB'],
        'id_izin'=>$row['id_izin'],
        'nama_propinsi'=>$row['nama_propinsi'],
        'id_sub_klasifikasi'=>$row['id_sub_klasifikasi'],
        'kualifikasi'=>$row['kualifikasi'],
        'stat'=>$deskripsi_status,
      );
      array_push($record,$datax);
    }
    $this->data = array(
      'record'=>$record,

    );
    $this->load->view('pemantauan',$this->data);

  }
  function list_survailen(){

    $data=array();

    $this->data = array(
      'record'=>$data,

    );
    $this->template->load('menu/menu', 'pemantauan_survailen', $this->data);

    

  }
  function search(){
    $post = $this->input->post();
    $input=$this->security->xss_clean(trim($post['input']));
    $option=$this->security->xss_clean(trim($post['option']));

    $data=array(
      'record'=>$this->Bu_model->get_search_pemantauan($input,$option)
    );
    echo json_encode($data);
  }
  function index(){
    $this->data = array(
      'record'=>array(),

    );
    $this->load->view('pemantauan2',$this->data);
  }
}
