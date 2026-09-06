<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller{
public function __construct(){
  parent::__construct();
  $this->load->model('bu/Bu_model');
  $this->load->model('tk/Tenaga_kerja_model');
  $this->load->library(array('form_validation'));
  $this->load->library('Template');
}

function search_permohonan_bu(){
  $post = $this->input->post();
  $limit=$post['limit'];
  $start_index=$limit*10;
  $limit_per_page = 10;

  $record=$this->Bu_model->search_permohonan_bu($limit_per_page, $start_index);
  $response = array(
                  'recordsTotal'=>300,
                  'recordsFiltered'=>300,
                  'data' =>$record,
                  'start'=>$start_index

                );

      echo json_encode($response,JSON_PRETTY_PRINT);
}
function search_permohonan_bux(){
  $post = $this->input->post();
  $limit=$post['tgl_permohonan'];
  $start_index=100;
  $limit_per_page = 10;

  $record=$this->Bu_model->search_permohonan_bu($limit_per_page, $start_index);
  $response = array(
                  'recordsTotal'=>300,
                  'recordsFiltered'=>300,
                  'data' =>$record,
                  'start'=>$start_index

                );

      echo json_encode($response);
}


function sub_klasifikasi(){
  $post = $this->input->post();
  $id_klasifikasi=$post['id_klasifikasi'];
  $select="SELECT id_sub_klasifikasi,Deskripsi FROM bu_klasifikasi_sub_kbli";
  $where="WHERE id_klasifikasi='$id_klasifikasi' AND flag='1'";
  $record=$this->Bu_model->searching($select,$where);
  $response = array(
                  'record' =>$record
                );

      echo json_encode($response);
}

function klasifikasi(){
  $post = $this->input->post();
  $jenis=$post['jenis'];
  if($jenis=='0' OR $jenis=='5'){
    $jenis_klasifikasi='0';
  }else{
    $jenis_klasifikasi='1';
  }
  $select="SELECT ID_Klasifikasi,Deskripsi FROM bu_klasifikasi_kbli";
  $where="WHERE jenis_klasifikasi='$jenis_klasifikasi'";
  $record=$this->Bu_model->searching($select,$where);
  $response = array(
                  'record' =>$record
                );

      echo json_encode($response);
}
}
?>
