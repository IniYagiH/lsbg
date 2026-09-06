<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Registrasi_kta extends CI_Controller{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('bu/Bu_model');
    $this->load->model('tk/Tenaga_kerja_model');
    $this->load->helper(array('url','html','file','form','security'));
    $this->load->library(array('form_validation','Template'));
    $this->load->helper('Ssl');
  }
  function index(){
    $data=array(
      'propinsi'=>$this->Bu_model->provinsi(),
      'klasifikasi'=>$this->Bu_model->sub_klasifikasi_bu_2020()
    );
    $this->load->view('registrasi_kta',$data);
  }
  function kabupaten(){

    $post = $this->input->post();
    $id_propinsi=$post['id_propinsi'];
    $select="SELECT ID_Kabupaten,Nama FROM kabupaten";
    $where="WHERE ID_Propinsi='$id_propinsi'";
    $record=$this->Bu_model->searching($select,$where);
    $response = array(
                    'record' =>$record
                  );

        echo json_encode($response);

  }
  function signup(){
	  $post = $this->input->post();

	  $upload_9=NULL;
	  if($_FILES['file_ktp']['name'])
	  {
	    $this->load->library('upload');
	    $id_user=$this->session->userdata('id_user');
	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	    $config['upload_path'] = './assets/bukti/registrasi_kta';
	    $config['allowed_types'] = 'pdf|jpg|jpeg|png';
	    $config['overwrite'] = TRUE;
	    $config['file_name'] = $nmfile;
	    $this->upload->initialize($config);
	    if($this->upload->do_upload('file_ktp')){
	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);

	      $upload_9=$gbr['file_name'];
	    }
	  }else{
	    $upload_9="NULL";
	  }

	      $data=array(
	        'nama'=>$this->security->xss_clean(trim($post['nama'])),
					'npwp'=>$this->security->xss_clean(trim($post['npwp'])),
					'pjbu'=>$this->security->xss_clean(trim($post['pjbu'])),
          'alamat'=>$this->security->xss_clean(trim($post['alamat'])),
					'propinsi'=>$this->security->xss_clean(trim($post['propinsi'])),
					'kabupaten'=>$this->security->xss_clean(trim($post['kabupaten'])),
          'email'=>$this->security->xss_clean(trim($post['email'])),
          'telepon'=>$this->security->xss_clean(trim($post['telepon'])),
          'fax'=>$this->security->xss_clean(trim($post['fax'])),
          'kodepos'=>$this->security->xss_clean(trim($post['kodepos'])),
          'sub_klas'=>$this->security->xss_clean(trim($post['sub_klas'])),
	        'persyaratan'=>$upload_9,
	      );
	      $table='registrasi_kta';
	      $insert=$this->Bu_model->insert_sad($table,$data);
	      if($insert=="Success"){

	        $this->output
	        ->set_content_type('application/json')
	        ->set_output(json_encode(array('result' => 1)));
	      }else{

	        $this->output
	        ->set_content_type('application/json')
	        ->set_output(json_encode(array('result' => 1)));

	      }


	}
}
