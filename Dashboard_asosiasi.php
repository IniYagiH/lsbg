<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_asosiasi extends CI_Controller{
public function __construct(){
  parent::__construct();
  $this->load->model('Kegiatan_model');
  $this->load->model('bu/Bu_model');
  $this->load->model('tk/Tenaga_kerja_model');
  $this->load->library(array('Excel'));
  $this->load->helper(array('url','html','file','form','security'));
  $this->load->library(array('ion_auth','form_validation','Template','pagination'));
  $this->load->helper('Ssl');
}
function insert_mail(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "bg-warning");
    redirect('index.php/login', 'refresh');
  }
    $post = $this->input->post();
    $cont=htmlspecialchars($post['text_name']);
    $content=$post['text_name'];
    $this->load->helper('htmlpurifier');
    $clean_html = html_purify($content);
    $data=array(
      'ASOSIASI'=>$this->session->userdata('asosiasi'),
      'TGL_RECORD'=>date("Y-m-d H:i:s"),
      'ID_PDS'=>'4',
      'Id_Sender'=>$this->session->userdata('id_user'),
      'Id_Receive'=>'',
      'Subject'=>$this->security->xss_clean(trim($post['subject'])),
      'Text'=>$clean_html

    );
    $table='lisensi_mail';
    $insert=$this->Bu_model->insert($table,$data);
    if($insert=="Success"){
      $this->session->set_flashdata('title','Success');
      $this->session->set_flashdata('text','Mail Berhasil di Kirim');
      $this->session->set_flashdata('class', "bg-primary");
      redirect('dashboard_asosiasi/write_mail', 'refresh');
    }else{
      $this->session->set_flashdata('title','Failed');
      $this->session->set_flashdata('text','Mail Gagal di Kirim');
      $this->session->set_flashdata('class', "bg-danger");
      redirect('dashboard_asosiasi/write_mail', 'refresh');
    }



}
public function write_mail(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "bg-warning");
    redirect('index.php/login', 'refresh');
  }else if($this->ion_auth->asosiasi())
  {
    $asosiasi=$this->session->userdata('asosiasi');

    $this->data = array(
      'record'=>'a'
    );
    $this->template->load('menu/menu','asosiasi/write_mail', $this->data);
  }else{
    redirect('dashboard','refresh');
  }
}
function index(){
  if (!$this->ion_auth->ceklogin2())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "bg-warning");
    redirect('index.php/login', 'refresh');
  }else if($this->ion_auth->asosiasi())
  {
      $limit_per_page = 10;
      $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
      $total_records = 100;

      if ($total_records > 0)
      {
          // get current page records
          $config['display_pages'] = FALSE;
          $config['base_url'] = base_url() . 'dashboard_asosiasi/index';
          $config['total_rows'] = $total_records;
          $config['per_page'] = $limit_per_page;
          $config["uri_segment"] = 3;
          $config['full_tag_open'] = '<div class="pagination">';
          $config['full_tag_close'] = '</div>';

          $config['first_link'] = '<button type="button" class="btn btn-default btn-icon"><i class="icon-move-left"></i></button>';
          $config['first_tag_open'] = '<span class="firstlink">';
          $config['first_tag_close'] = '</span>';

          $config['last_link'] = '<button type="button" class="btn btn-default btn-icon"><i class="icon-move-right"></i></button>';
          $config['last_tag_open'] = '<span class="lastlink">';
          $config['last_tag_close'] = '</span>';

          $config['next_link'] = '<button type="button" class="btn btn-default btn-icon"><i class="icon-arrow-right13"></i></button>';
          $config['next_tag_open'] = '<span class="nextlink">';
          $config['next_tag_close'] = '</span>';

          $config['prev_link'] = '<button type="button" class="btn btn-default btn-icon"><i class="icon-arrow-left12"></i></button>';
          $config['prev_tag_open'] = '<span class="prevlink">';
          $config['prev_tag_close'] = '</span>';

          $config['cur_tag_open'] = '<span class="curlink">';
          $config['cur_tag_close'] = '</span>';

          $config['num_tag_open'] = '<span class="numlink">';
          $config['num_tag_close'] = '</span>';
          $this->pagination->initialize($config);

          // build paging links


      }
      $history=$this->Bu_model->get_current_page_records_asosiasi($limit_per_page, $start_index);
      $id_user=$this->session->userdata('id_user');
      $this->data = array(
        'links'=>$this->pagination->create_links(),
        'history'=>$history
      );
      $this->template->load('menu/menu','asosiasi/dashboard', $this->data);
}else{
  redirect('index.php/login', 'refresh');
}
}
function message(){
  if (!$this->ion_auth->ceklogin2())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "bg-warning");
    redirect('index.php/login', 'refresh');
  }else if($this->ion_auth->asosiasi())
  {
      $limit_per_page = 10;
      $start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
      $total_records = 100;

      if ($total_records > 0)
      {
          // get current page records
          $config['display_pages'] = FALSE;
          $config['base_url'] = base_url() . 'dashboard_asosiasi/index';
          $config['total_rows'] = $total_records;
          $config['per_page'] = $limit_per_page;
          $config["uri_segment"] = 3;
          $config['full_tag_open'] = '<div class="pagination">';
          $config['full_tag_close'] = '</div>';

          $config['first_link'] = '<button type="button" class="btn btn-default btn-icon"><i class="icon-move-left"></i></button>';
          $config['first_tag_open'] = '<span class="firstlink">';
          $config['first_tag_close'] = '</span>';

          $config['last_link'] = '<button type="button" class="btn btn-default btn-icon"><i class="icon-move-right"></i></button>';
          $config['last_tag_open'] = '<span class="lastlink">';
          $config['last_tag_close'] = '</span>';

          $config['next_link'] = '<button type="button" class="btn btn-default btn-icon"><i class="icon-arrow-right13"></i></button>';
          $config['next_tag_open'] = '<span class="nextlink">';
          $config['next_tag_close'] = '</span>';

          $config['prev_link'] = '<button type="button" class="btn btn-default btn-icon"><i class="icon-arrow-left12"></i></button>';
          $config['prev_tag_open'] = '<span class="prevlink">';
          $config['prev_tag_close'] = '</span>';

          $config['cur_tag_open'] = '<span class="curlink">';
          $config['cur_tag_close'] = '</span>';

          $config['num_tag_open'] = '<span class="numlink">';
          $config['num_tag_close'] = '</span>';
          $this->pagination->initialize($config);

          // build paging links


      }
      $history=$this->Bu_model->get_current_page_records_asosiasi_message($limit_per_page, $start_index);
      $id_user=$this->session->userdata('id_user');
      $this->data = array(
        'links'=>$this->pagination->create_links(),
        'history'=>$history
      );
      $this->template->load('menu/menu','asosiasi/message', $this->data);
}else{
  redirect('index.php/login', 'refresh');
}
}
}
?>
