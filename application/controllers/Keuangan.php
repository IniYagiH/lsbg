<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan extends CI_Controller
{
	public function __construct()
	{ 
		parent::__construct();
		$this->load->database();
		$this->load->model('bu/Bu_model');
		$this->load->helper(array('url','html','file','form','security'));
		$this->load->library(array('ion_auth','form_validation','Template'));
		$this->load->model('User_model');
		$this->load->helper('Ssl');
	}
	function delete_pph_omset(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->badan_usaha()){
		$post = $this->input->post();
		$nib=$this->session->userdata('id_user');
		$rec=$this->Bu_model->detele_pph_omset($nib);
		if($rec=='Success'){
			$this->session->set_flashdata('title','Success');
			$this->session->set_flashdata('text','Data berhasil dihapus');
			$this->session->set_flashdata('class', "success");
			redirect('keuangan/pph_omset','refresh');
		}else{
			$this->session->set_flashdata('title','Failed');
			$this->session->set_flashdata('text','Data gagal dihapus');
			$this->session->set_flashdata('class', "warning");
			redirect('keuangan/pph_omset','refresh');
		}
		}else{
			$this->session->set_flashdata('title','Warning');
			$this->session->set_flashdata('text','Anda tidak memiliki akses');
			$this->session->set_flashdata('class', "warning");
			redirect('login','refresh');
		}
	}
	function delete_pemegang_saham(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->badan_usaha()){
		$post = $this->input->post();
		$nib=$this->session->userdata('id_user');
		$id=$this->security->xss_clean(trim($post['id']));
		$rec=$this->Bu_model->detele_pemegang_saham($nib,$id);
		if($rec=='Success'){
			$this->session->set_flashdata('title','Success');
			$this->session->set_flashdata('text','Data berhasil dihapus');
			$this->session->set_flashdata('class', "success");
			redirect('keuangan/pemegang_saham','refresh');
		}else{
			$this->session->set_flashdata('title','Failed');
			$this->session->set_flashdata('text','Data gagal dihapus');
			$this->session->set_flashdata('class', "warning");
			redirect('keuangan/pemegang_saham','refresh');
		}
		}else{
			$this->session->set_flashdata('title','Warning');
			$this->session->set_flashdata('text','Anda tidak memiliki akses');
			$this->session->set_flashdata('class', "warning");
			redirect('login','refresh');
		}
	}
	function delete_neraca(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->badan_usaha()){
		$post = $this->input->post();
		$nib=$this->session->userdata('id_user');
		$id=$this->security->xss_clean(trim($post['id']));
		$rec=$this->Bu_model->detele_neraca($nib,$id);
		if($rec=='Success'){
			$this->session->set_flashdata('title','Success');
			$this->session->set_flashdata('text','Data berhasil dihapus');
			$this->session->set_flashdata('class', "success");
			redirect('keuangan/neraca_ski','refresh');
		}else{
			$this->session->set_flashdata('title','Failed');
			$this->session->set_flashdata('text','Data gagal dihapus');
			$this->session->set_flashdata('class', "warning");
			redirect('keuangan/neraca_ski','refresh');
		}
		}else{
			$this->session->set_flashdata('title','Warning');
			$this->session->set_flashdata('text','Anda tidak memiliki akses');
			$this->session->set_flashdata('class', "warning");
			redirect('login','refresh');
		}
	}
	function delete_neraca_ski(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->badan_usaha()){
		$post = $this->input->post();
		$nib=$this->session->userdata('id_user');
		$id=$this->security->xss_clean(trim($post['id']));
		$rec=$this->Bu_model->detele_neraca_ski($nib,$id);
		if($rec=='Success'){
			$this->session->set_flashdata('title','Success');
			$this->session->set_flashdata('text','Data berhasil dihapus');
			$this->session->set_flashdata('class', "success");
			redirect('keuangan/neraca_ski','refresh');
		}else{
			$this->session->set_flashdata('title','Failed');
			$this->session->set_flashdata('text','Data gagal dihapus');
			$this->session->set_flashdata('class', "warning");
			redirect('keuangan/neraca_ski','refresh');
		}
		}else{
			$this->session->set_flashdata('title','Warning');
			$this->session->set_flashdata('text','Anda tidak memiliki akses');
			$this->session->set_flashdata('class', "warning");
			redirect('login','refresh');
		}
	}
	function cek_neraca(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->badan_usaha() OR $this->ion_auth->admin_pusat()){
			$nib=$this->session->userdata('id_user');
		$post = $this->input->post();
		$id=$post['id'];

		$select="SELECT * FROM lsbu_keuangan_neraca";
		$where="WHERE NIB='$nib' AND Tahun='$id'";
		$record=$this->Bu_model->searching($select,$where);
		$response = array(
										'record' =>$record
									);

				echo json_encode($response);
			}else{
				$this->session->set_flashdata('title','Warning');
				$this->session->set_flashdata('text','Anda tidak memiliki akses');
				$this->session->set_flashdata('class', "warning");
				redirect('login','refresh');
			}
	}
	function cek_neraca_ski(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->badan_usaha()){
			$nib=$this->session->userdata('id_user');
		$post = $this->input->post();
		$id=$post['id'];

		$select="SELECT * FROM lsbu_keuangan_neraca_2";
		$where="WHERE NIB='$nib' AND Tahun='$id'";
		$record=$this->Bu_model->searching($select,$where);
		$response = array(
										'record' =>$record
									);

				echo json_encode($response);
			}else{
				$this->session->set_flashdata('title','Warning');
				$this->session->set_flashdata('text','Anda tidak memiliki akses');
				$this->session->set_flashdata('class', "warning");
				redirect('login','refresh');
			}
	}
	function cek_pph_omset(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->badan_usaha() OR $this->ion_auth->admin_pusat()){
			$nib=$this->session->userdata('id_user');
		$post = $this->input->post();
		$select="SELECT * FROM lsbu_keuangan_pendapatan";
		$where="WHERE NIB='$nib'";
		$record=$this->Bu_model->searching($select,$where);
		$response = array(
										'record' =>$record
									);

				echo json_encode($response);
			}else{
				$this->session->set_flashdata('title','Warning');
				$this->session->set_flashdata('text','Anda tidak memiliki akses');
				$this->session->set_flashdata('class', "warning");
				redirect('login','refresh');
			}
	}
	function cek_saham(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->badan_usaha() OR $this->ion_auth->admin_pusat()){
			$nib=$this->session->userdata('id_user');
		$post = $this->input->post();
		$id=$post['id'];
		$select="SELECT * FROM lsbu_keuangan_saham";
		$where="WHERE NIB='$nib' AND id_saham='$id'";
		$record=$this->Bu_model->searching($select,$where);
		$response = array(
										'record' =>$record
									);

				echo json_encode($response);
			}else{
				$this->session->set_flashdata('title','Warning');
				$this->session->set_flashdata('text','Anda tidak memiliki akses');
				$this->session->set_flashdata('class', "warning");
				redirect('login','refresh');
			}
	}
  function pph_omset(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->badan_usaha()){

		$nib=$this->session->userdata('id_user');

		$propinsi=$this->Bu_model->provinsi();
    $this->data = array(
			'propinsi'=>$propinsi,
	    'record'=>$this->Bu_model->pph_omset($nib),
    );
    $this->template->load('menu/menu','bu/pph_omset', $this->data);
	}else{
		$this->session->set_flashdata('title','Warning');
		$this->session->set_flashdata('text','Anda tidak memiliki akses');
		$this->session->set_flashdata('class', "warning");
		redirect('login','refresh');
	}
	}
	function edit_pph_omset(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->badan_usaha()){

	  $id_bu=$this->session->userdata('id_bu');

	    $propinsi=$this->Bu_model->provinsi();


	  $this->data = array(
	    'propinsi'=>$propinsi,
	    'asosiasi'=>$this->Bu_model->asosiasi(),
	    'klasifikasi'=>$this->Bu_model->klasifikasi(),
	    'pph_omset'=>$this->Bu_model->pph_omset($id_bu),
	  );
	  $this->template->load('menu/menu','bu/edit_pph_omset', $this->data);
	}else{
		$this->session->set_flashdata('title','Warning');
		$this->session->set_flashdata('text','Anda tidak memiliki akses');
		$this->session->set_flashdata('class', "warning");
		redirect('login','refresh');
	}
	}
	function update_pph_omset(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->badan_usaha()){

	  $post = $this->input->post();
	  $nib=$this->session->userdata('id_user');
	  $data=array(
			'thn_spt1'=>$this->security->xss_clean(trim($post['thn_1'])),
			'thn_spt2'=>$this->security->xss_clean(trim($post['thn_2'])),
			'spt1'=>$this->security->xss_clean(trim($post['pajak_1'])),
			'spt2'=>$this->security->xss_clean(trim($post['pajak_2'])),
			'thn_omset1'=>$this->security->xss_clean(trim($post['thn_1_omset'])),
			'thn_omset2'=>$this->security->xss_clean(trim($post['thn_2_omset'])),
			'thn_omset3'=>$this->security->xss_clean(trim($post['thn_3_omset'])),
			'thn_omset4'=>$this->security->xss_clean(trim($post['thn_4_omset'])),
			'thn_omset5'=>$this->security->xss_clean(trim($post['thn_5_omset'])),
			'omset1'=>$this->security->xss_clean(trim($post['omset_1'])),
			'omset2'=>$this->security->xss_clean(trim($post['omset_2'])),
			'omset3'=>$this->security->xss_clean(trim($post['omset_3'])),
			'omset4'=>$this->security->xss_clean(trim($post['omset_4'])),
			'omset5'=>$this->security->xss_clean(trim($post['omset_5'])),
			'id_user'=>$this->session->userdata('id_user'),

	  );

	  $this->load->library('upload');
	  $id_user=$this->session->userdata('id_user');
	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	  $config['upload_path'] = './assets/bukti/badan_usaha/22_spt_2_tahun_terakhir';
	  $config['allowed_types'] = 'pdf|zip|rar|png|jpg|jpeg';
	  $config['overwrite'] = TRUE;
	  $config['file_name'] = $nmfile;
	  $this->upload->initialize($config);

	  if($_FILES['upload_persyaratan']['name'])
	  {
	    if ($this->upload->do_upload('upload_persyaratan'))
	    {

	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	      $alamat="./assets/bukti/badan_usaha/22_spt_2_tahun_terakhir/";

	      $upload_22=$gbr['file_name'];

	      $data_la=array(
	        'persyaratan'=>$upload_22
	      );
	      $table='bu_keuangan_pendapatan';
	      $where_lap=array(
	        'NIB'=>$nib
	      );
	      $this->Bu_model->update_edit($where_la,$table,$data_la);
	    }else{
	      $this->session->set_flashdata('title','Failed');
	      $this->session->set_flashdata('text','Persyaratan Gagal Diupload');
	      $this->session->set_flashdata('class', "error");
	      $this->output
	      ->set_content_type('application/json')
	      ->set_output(json_encode(array('result' => 2)));
	    }
	  }
	    $table='lsbu_keuangan_pendapatan';
	    $where_lap=array(
	      'NIB'=>$nib
	    );
			if (!empty($_POST)){
	    $insert=$this->Bu_model->update_edit($where_lap,$table,$data);
			}
	    if($insert=="Success"){
	      $this->session->set_flashdata('title','Success');
	      $this->session->set_flashdata('text','PPH & Omset Berhasil Di Input');
	      $this->session->set_flashdata('class', "bg-primary");
	      $this->output
	      ->set_content_type('application/json')
	      ->set_output(json_encode(array('result' => 1)));
	    }else{
	      $this->session->set_flashdata('title','Failed');
	      $this->session->set_flashdata('text','PPH & Omset Gagal Di Input');
	      $this->session->set_flashdata('class', "error");
	      $this->output
	      ->set_content_type('application/json')
	      ->set_output(json_encode(array('result' => 1)));
	    }
		}else{
			$this->session->set_flashdata('title','Warning');
			$this->session->set_flashdata('text','Anda tidak memiliki akses');
			$this->session->set_flashdata('class', "warning");
			redirect('login','refresh');
		}
	}
	function insert_pph_omset(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->badan_usaha()){

	  $post = $this->input->post();


	  $this->load->library('upload');
	  $id_user="coba";
	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	  $config['upload_path'] = './assets/bukti/badan_usaha/22_spt_2_tahun_terakhir';
	  $config['allowed_types'] = 'pdf|zip|rar|png|jpg|jpeg';
	  $config['overwrite'] = TRUE;
	  $config['file_name'] = $nmfile;
	  $this->upload->initialize($config);

	  if($_FILES['upload_persyaratan']['name'])
	  {
	    if ($this->upload->do_upload('upload_persyaratan'))
	    {

	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	      $alamat="./assets/bukti/badan_usaha/22_spt_2_tahun_terakhir/";
	      if($file_ext=='png' OR $file_ext=='jpg' OR $file_ext=='jpeg'){
	        $this->watermarkImages($alamat,$filename);
	      }
	      $url=base_url()."assets/bukti/badan_usaha/22_spt_2_tahun_terakhir/".date("Y-m-d H:i:s");
	      $data=array(
	        'NIB'=>$this->session->userdata('id_user'),
	        'thn_spt1'=>$this->security->xss_clean(trim($post['thn_1'])),
	        'thn_spt2'=>$this->security->xss_clean(trim($post['thn_2'])),
	        'spt1'=>$this->security->xss_clean(trim($post['pajak_1'])),
	        'spt2'=>$this->security->xss_clean(trim($post['pajak_2'])),
	        'thn_omset'=>$this->security->xss_clean(trim($post['thn_1_omset'])),
	        'thn_omset'=>$this->security->xss_clean(trim($post['thn_2_omset'])),
	        'thn_omset'=>$this->security->xss_clean(trim($post['thn_3_omset'])),
	        'thn_omset'=>$this->security->xss_clean(trim($post['thn_4_omset'])),
					'thn_omset'=>$this->security->xss_clean(trim($post['thn_5_omset'])),
	        'omset1'=>$this->security->xss_clean(trim($post['omset_1'])),
	        'omset2'=>$this->security->xss_clean(trim($post['omset_2'])),
	        'omset3'=>$this->security->xss_clean(trim($post['omset_3'])),
	        'omset4'=>$this->security->xss_clean(trim($post['omset_4'])),
					'omset5'=>$this->security->xss_clean(trim($post['omset_5'])),
	        'id_user'=>$this->session->userdata('id_user'),
	        'persyaratan'=>$gbr['file_name']
	      );


	      $table='lsbu_keuangan_pendapatan';
	      $insert=$this->Bu_model->insert_sad($table,$data);
	      if($insert=="Success"){
	        $this->session->set_flashdata('title','Success');
	        $this->session->set_flashdata('text','PPH & Omset Berhasil Di Input');
	        $this->session->set_flashdata('class', "success");
	        $this->output
	        ->set_content_type('application/json')
	        ->set_output(json_encode(array('result' => 1)));
	      }else{
	        $this->session->set_flashdata('title','Failed');
	        $this->session->set_flashdata('text','PPH & Omset Gagal Di Input');
	        $this->session->set_flashdata('class', "error");
	        $this->output
	        ->set_content_type('application/json')
	        ->set_output(json_encode(array('result' => 1)));
	      }
	    }else{
	      $this->session->set_flashdata('title','Failed');
	      $this->session->set_flashdata('text','Persyaratan Gagal Diupload');
	      $this->session->set_flashdata('class', "error");
	      $this->output
	      ->set_content_type('application/json')
	      ->set_output(json_encode(array('result' => 2)));
	    }
	  }else{
	    $this->session->set_flashdata('title','Failed');
	    $this->session->set_flashdata('text','Persyaratan Gagal Diupload');
	    $this->session->set_flashdata('class', "error");
	    $this->output
	    ->set_content_type('application/json')
	    ->set_output(json_encode(array('result' => 3)));
	  }
	}else{
		$this->session->set_flashdata('title','Warning');
		$this->session->set_flashdata('text','Anda tidak memiliki akses');
		$this->session->set_flashdata('class', "warning");
		redirect('login','refresh');
	}
	}
	function pemegang_saham(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->badan_usaha()){

		$nib=$this->session->userdata('id_user');
		$propinsi=$this->Bu_model->provinsi();
				$kabupaten=$this->Bu_model->kabupaten();
		$this->data = array(
			'propinsi'=>$propinsi,
			'kabupaten'=>$kabupaten,
			'record'=>$this->Bu_model->pemegang_saham_opr($nib),
		);
		$this->template->load('menu/menu','bu/pemegang_saham', $this->data);
	}else{
		$this->session->set_flashdata('title','Warning');
		$this->session->set_flashdata('text','Anda tidak memiliki akses');
		$this->session->set_flashdata('class', "warning");
		redirect('login','refresh');
	}
	}
	function edit_pemegang_saham($id){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->badan_usaha()){

	  $id_saham=decrypt_url($id);
	  $id_bu=$this->session->userdata('id_bu');

	    $propinsi=$this->Bu_model->provinsi();


	  $this->data = array(
	    'id'=>$id,
	    'propinsi'=>$propinsi,
	    'asosiasi'=>$this->Bu_model->asosiasi(),
	    'klasifikasi'=>$this->Bu_model->klasifikasi(),
	    'saham'=>$this->Bu_model->saham_search($id_bu,$id_saham),
	  );
	  $this->template->load('menu/menu','bu/edit_pemegang_saham', $this->data);
	}else{
		$this->session->set_flashdata('title','Warning');
		$this->session->set_flashdata('text','Anda tidak memiliki akses');
		$this->session->set_flashdata('class', "warning");
		redirect('login','refresh');
	}
	}
	function update_saham(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->badan_usaha()){

	  $post = $this->input->post();
	  $nib=$this->session->userdata('id_user');
	  $id=$this->security->xss_clean(trim($post['id']));
		$this->load->library('upload');
		$id_user="coba";
	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
		$config['upload_path'] = './assets/bukti/badan_usaha/bukti_pemegang_saham';
		$config['allowed_types'] = 'pdf|zip|rar|jpeg|png|jpg';
		$config['overwrite'] = TRUE;
		$config['file_name'] = $nmfile;
		$this->upload->initialize($config);
		if($_FILES['upload_persyaratan']['name'])
	  {
	    if ($this->upload->do_upload('upload_persyaratan'))
	    {
 	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	      $alamat="./assets/bukti/badan_usaha/bukti_pemegang_saham/";

	      $upload=$gbr['file_name'];
	      $data_npwp=array(
	        'persyaratan'=>$upload
	      );
	      $table='lsbu_keuangan_saham';
	      $where_npwp=array(
	        'NIB'=>$nib,
	        'id_saham'=>$id
	      );
	      $this->Bu_model->update_edit($where_npwp,$table,$data_npwp);
	    }else{
	      $this->session->set_flashdata('title','Failed');
	      $this->session->set_flashdata('text','Persyaratan Gagal Diupload');
	      $this->session->set_flashdata('class', "error");
	      $this->output
	      ->set_content_type('application/json')
	      ->set_output(json_encode(array('result' => 2)));
	    }
	  }else{
	    $upload="NULL";
	  }
	  $data=array(
			'nama_pemilik'=>$this->security->xss_clean(trim($post['pemilik_saham'])),
			'no_ktp'=>$this->security->xss_clean(trim($post['ktp'])),
			'alamat'=>$this->security->xss_clean(trim($post['alamat'])),
			'id_propinsi'=>$this->security->xss_clean(trim($post['propinsi'])),
			'id_kabupaten'=>$this->security->xss_clean(trim($post['kabupaten'])),
			'kd_pos'=>$this->security->xss_clean(trim($post['kodepos'])),
			'jenis_saham'=>$this->security->xss_clean(trim($post['jenis_saham'])),
			'jumlah_lembar'=>str_replace('.', '', $this->security->xss_clean(trim($post['jumlah_lembar']))),
			'nilai_perlembar'=>str_replace('.', '', $this->security->xss_clean(trim($post['nilai_saham']))),
			'modal_dasar'=>str_replace('.', '', $this->security->xss_clean(trim($post['total_modal']))),
			'modal_disetor'=>'',
			'id_user'=>$this->session->userdata('id_user'),
	  );





	  $table='lsbu_keuangan_saham';
	  $where_npwp=array(
	    'NIB'=>$nib,
	    'id_saham'=>$id
	  );

	  $table='lsbu_keuangan_saham';
	  $insert=$this->Bu_model->update_edit($where_npwp,$table,$data);

	  if($insert=="Success"){
	    $this->session->set_flashdata('title','Success');
	    $this->session->set_flashdata('text','Pemegang Saham Berhasil Di Update');
	    $this->session->set_flashdata('class', "success");
	    $this->output
	    ->set_content_type('application/json')
	    ->set_output(json_encode(array('result' => 1)));
			redirect('keuangan/pemegang_saham','refresh');
		}else{
	    $this->session->set_flashdata('title','Failed');
	    $this->session->set_flashdata('text','Pemegang Saham Gagal Di Update');
	    $this->session->set_flashdata('class', "error");
	    $this->output
	    ->set_content_type('application/json')
	    ->set_output(json_encode(array('result' => 1)));
			redirect('keuangan/pemegang_saham','refresh');
	  }
	}else{
		$this->session->set_flashdata('title','Warning');
		$this->session->set_flashdata('text','Anda tidak memiliki akses');
		$this->session->set_flashdata('class', "warning");
		redirect('login','refresh');
	}
	}
	function insert_saham(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->badan_usaha()){

	  $post = $this->input->post();
	  $url=base_url()."assets/bukti/badan_usaha/bukti_pemegang_saham/".date("Y-m-d H:i:s");


	  $this->load->library('upload');
	  $id_user="coba";
	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	  $config['upload_path'] = './assets/bukti/badan_usaha/bukti_pemegang_saham';
	  $config['allowed_types'] = 'pdf|zip|rar|jpeg|png|jpg';
	  $config['overwrite'] = TRUE;
	  $config['file_name'] = $nmfile;
	  $this->upload->initialize($config);

	  if($_FILES['upload_persyaratan']['name'])
	  {
	    if ($this->upload->do_upload('upload_persyaratan'))
	    {

	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	      $alamat="./assets/bukti/badan_usaha/bukti_pemegang_saham/";


	      $data=array(
	        'NIB'=>$this->session->userdata('id_user'),
	        'nama_pemilik'=>$this->security->xss_clean(trim($post['pemilik_saham'])),
	        'no_ktp'=>$this->security->xss_clean(trim($post['ktp'])),
	        'alamat'=>$this->security->xss_clean(trim($post['alamat'])),
	        'id_propinsi'=>$this->security->xss_clean(trim($post['propinsi'])),
	        'id_kabupaten'=>$this->security->xss_clean(trim($post['kabupaten'])),
	        'kd_pos'=>$this->security->xss_clean(trim($post['kodepos'])),
	        'jenis_saham'=>$this->security->xss_clean(trim($post['jenis_saham'])),
	        'jumlah_lembar'=>str_replace('.', '', $this->security->xss_clean(trim($post['jumlah_lembar']))),
	        'nilai_perlembar'=>str_replace('.', '', $this->security->xss_clean(trim($post['nilai_saham']))),
	        'modal_dasar'=>str_replace('.', '', $this->security->xss_clean(trim($post['total_modal']))),
	        'modal_disetor'=>'',
	        'id_user'=>$this->session->userdata('id_user'),
	        'persyaratan'=>$gbr['file_name']
	      );

	      $table='lsbu_keuangan_saham';
	      $insert=$this->Bu_model->insert_sad($table,$data);
	      if($insert=="Success"){
	        $this->session->set_flashdata('title','Success');
	        $this->session->set_flashdata('text','Pemegang Saham Berhasil Di Input');
	        $this->session->set_flashdata('class', "success");
	        $this->output
	        ->set_content_type('application/json')
	        ->set_output(json_encode(array('result' => 1)));
	      }else{
	        $this->session->set_flashdata('title','Failed');
	        $this->session->set_flashdata('text','Pemegang Saham Gagal Di Input');
	        $this->session->set_flashdata('class', "error");
	        $this->output
	        ->set_content_type('application/json')
	        ->set_output(json_encode(array('result' => 1)));
	      }
	    }else{
	      $this->session->set_flashdata('title','Failed');
	      $this->session->set_flashdata('text','Persyaratan Gagal Diupload');
	      $this->session->set_flashdata('class', "error");
	      $this->output
	      ->set_content_type('application/json')
	      ->set_output(json_encode(array('result' => 2)));
	    }
	  }else{
	    $this->session->set_flashdata('title','Failed');
	    $this->session->set_flashdata('text','Persyaratan Gagal Diupload');
	    $this->session->set_flashdata('class', "error");
	    $this->output
	    ->set_content_type('application/json')
	    ->set_output(json_encode(array('result' => 3)));
	  }
	}else{
		$this->session->set_flashdata('title','Warning');
		$this->session->set_flashdata('text','Anda tidak memiliki akses');
		$this->session->set_flashdata('class', "warning");
		redirect('login','refresh');
	}
	}
	function neraca(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->badan_usaha()){

		$id_bu=$this->session->userdata('id_user');

		$propinsi=$this->Bu_model->provinsi();
		$this->data = array(
			'propinsi'=>$propinsi,
			'record'=>$this->Bu_model->neraca($id_bu),
		);
		$this->template->load('menu/menu','bu/neraca', $this->data);
	}else{
		$this->session->set_flashdata('title','Warning');
		$this->session->set_flashdata('text','Anda tidak memiliki akses');
		$this->session->set_flashdata('class', "warning");
		redirect('login','refresh');
	}
	}
	function neraca_ski(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->badan_usaha()){

		$nib=$this->session->userdata('id_user');

		$propinsi=$this->Bu_model->provinsi();
		$this->data = array(
			'propinsi'=>$propinsi,
			'record'=>$this->Bu_model->neraca_ski($nib),
		);
		$this->template->load('menu/menu','bu/neraca_ski', $this->data);
	}else{
		$this->session->set_flashdata('title','Warning');
		$this->session->set_flashdata('text','Anda tidak memiliki akses');
		$this->session->set_flashdata('class', "warning");
		redirect('login','refresh');
	}
	}
	function edit_neraca($id){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->badan_usaha()){


	      $propinsi=$this->Bu_model->provinsi();

	  $tahun=decrypt_url($id);
	  $id_bu=$this->session->userdata('id_bu');
	  $this->data = array(
	    'propinsi'=>$propinsi,
	    'asosiasi'=>$this->Bu_model->asosiasi(),
	    'klasifikasi'=>$this->Bu_model->klasifikasi(),
	    'neraca'=>$this->Bu_model->neraca_search($id_bu,$tahun),
	  );
	  $this->template->load('menu/menu','bu/edit_neraca', $this->data);
	}else{
		$this->session->set_flashdata('title','Warning');
		$this->session->set_flashdata('text','Anda tidak memiliki akses');
		$this->session->set_flashdata('class', "warning");
		redirect('login','refresh');
	}
	}
	function update_neraca(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->badan_usaha()){

		$post = $this->input->post();
		$id=$this->security->xss_clean(trim($post['id']));
		$nib=$this->session->userdata('id_user');
		$upload_20=NULL;
		if($_FILES['file_neraca']['name'])
		{
			$this->load->library('upload');
			$id_user=$this->session->userdata('id_user');
	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
			$config20['upload_path'] = './assets/bukti/badan_usaha/20_neraca_bu';
			$config20['allowed_types'] = 'pdf|jpg|jpeg|png';
			$config20['overwrite'] = TRUE;
			$config20['file_name'] = $nmfile;
			$this->upload->initialize($config20);
			if($this->upload->do_upload('file_neraca')){
				$gbr = $this->upload->data();
				$filename=$gbr['file_name'];
				$file_ext = pathinfo($filename,PATHINFO_EXTENSION);
				$alamat="./assets/bukti/badan_usaha/20_neraca_bu/";
				if($file_ext=='png' OR $file_ext=='jpg' OR $file_ext=='jpeg'){
					$this->watermarkImages($alamat,$filename);
				}
				$upload_20=$gbr['file_name'];
				$data_la=array(
					'persyaratan_20'=>$upload_20
				);
				$table='lsbu_keuangan_neraca';
				$where_lap=array(
					'NIB'=>$nib,
					'Tahun'=>$id
				);
				$this->Bu_model->update_edit($where_lap,$table,$data_la);
			}
		}else{
			$upload_20="NULL";
		}

		$upload_21=NULL;
		if($_FILES['file_akuntan']['name'])
		{
			$this->load->library('upload');
			$id_user=$this->session->userdata('id_user');
	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
			$config21['upload_path'] = './assets/bukti/badan_usaha/21_laporan_akuntan_publik';
			$config21['allowed_types'] = 'pdf|jpg|jpeg|png';
			$config21['overwrite'] = TRUE;
			$config21['file_name'] = $nmfile;
			$this->upload->initialize($config21);
			if($this->upload->do_upload('file_akuntan')){
				$gbr = $this->upload->data();
				$filename=$gbr['file_name'];
				$file_ext = pathinfo($filename,PATHINFO_EXTENSION);
				$alamat="./assets/bukti/badan_usaha/21_laporan_akuntan_publik/";
				if($file_ext=='png' OR $file_ext=='jpg' OR $file_ext=='jpeg'){
					$this->watermarkImages($alamat,$filename);
				}
				$upload_21=$gbr['file_name'];
				$data_lap=array(
					'persyaratan_21'=>$upload_21
				);
				$table='lsbu_keuangan_neraca';
				$where_lap=array(
					'NIB'=>$nib,
					'Tahun'=>$id
				);
				$this->Bu_model->update_edit($where_lap,$table,$data_lap);
			}
		}else{
			$upload_21="NULL";
		}





			if (!empty($upload_20) AND !empty($upload_21))
			{
				if(isset($_POST['laba_ditahan_cekbox'])){
					$laba_ditahan_minus=1;
				}else{
					$laba_ditahan_minus=0;
				}
				$data=array(
					'Tahun'=>$idis->security->xss_clean(trim($post['tahun'])),
					'KasBank'=>str_replace('.', '', $this->security->xss_clean(trim($post['kas_bank']))),
					'PiutangUsaha'=>str_replace('.', '', $this->security->xss_clean(trim($post['piutang_usaha']))),
					'Persediaan'=>str_replace('.', '', $this->security->xss_clean(trim($post['persediaan']))),
					'PiutangPajak'=>str_replace('.', '', $this->security->xss_clean(trim($post['piutang_pajak']))),
					'BiayaDimuka'=>str_replace('.', '', $this->security->xss_clean(trim($post['bayar_dimuka']))),
					'WIP'=>str_replace('.', '', $this->security->xss_clean(trim($post['dlm_proses']))),
					'AktivaLancarLainnya'=>str_replace('.', '', $this->security->xss_clean(trim($post['aktiva_lainnya']))),
					'Peralatan'=>str_replace('.', '', $this->security->xss_clean(trim($post['peralatan_proyek']))),
					'Inventaris'=>str_replace('.', '', $this->security->xss_clean(trim($post['inventaris_kantor']))),
					'PeralatanLain'=>str_replace('.', '', $this->security->xss_clean(trim($post['peralatan_lainnya']))),
					'AkumulasiPenyusutan'=>str_replace('.', '', $this->security->xss_clean(trim($post['akumulasi_penyusutan']))),
					'Asset_tanah_bangunan'=>'',
					'AktivaTetapLainnya'=>str_replace('.', '', $this->security->xss_clean(trim($post['aktiva_tetap_lainnya']))),
					'AktivaLain'=>str_replace('.', '', $this->security->xss_clean(trim($post['aktiva_lainnya_2']))),
					'UtangUsaha'=>str_replace('.', '', $this->security->xss_clean(trim($post['utang_usaha']))),
					'UtangBank'=>str_replace('.', '', $this->security->xss_clean(trim($post['utang_bank']))),
					'UangMuka'=>str_replace('.', '', $this->security->xss_clean(trim($post['uang_muka']))),
					'UtangPajak'=>str_replace('.', '', $this->security->xss_clean(trim($post['utang_pajak']))),
					'BiayaMasihDibayar'=>str_replace('.', '', $this->security->xss_clean(trim($post['harus_dibayar']))),
					'UtangJPJT'=>str_replace('.', '', $this->security->xss_clean(trim($post['jatuh_tempo']))),
					'UtangLain'=>str_replace('.', '', $this->security->xss_clean(trim($post['utang_lainnya']))),
					'UtangBankJP'=>str_replace('.', '', $this->security->xss_clean(trim($post['utang_bank_jp']))),
					'UtangLainJP'=>str_replace('.', '', $this->security->xss_clean(trim($post['total_utang_jp']))),
					'ModalDisetor'=>str_replace('.', '', $this->security->xss_clean(trim($post['modal_disetor']))),
					'SelisihRevaluasi'=>str_replace('.', '', $this->security->xss_clean(trim($post['selisih_revaluasi']))),
					'LabaDitahan'=>str_replace('.', '', $this->security->xss_clean(trim($post['laba']))),
					'modallain'=>str_replace('.', '', $this->security->xss_clean(trim($post['modal_lainnya']))),
					'id_user'=>$this->session->userdata('id_user'),
					'labaditahan_minus'=>$laba_ditahan_minus,
				);

				$table='lsbu_keuangan_neraca';
				$where_lap=array(
					'NIB'=>$nib,
					'Tahun'=>$id
				);
				$insert=$this->Bu_model->update_edit($where_lap,$table,$data);
				if($insert=="Success"){
					$this->session->set_flashdata('title','Success');
					$this->session->set_flashdata('text','Neraca Berhasil Di Update');
					$this->session->set_flashdata('class', "error");
					$this->output
					->set_content_type('application/json')
					->set_output(json_encode(array('result' => 1)));
				}else{
					$this->session->set_flashdata('title','Failed');
					$this->session->set_flashdata('text','Neraca Gagal Di Update');
					$this->session->set_flashdata('class', "error");
					$this->output
					->set_content_type('application/json')
					->set_output(json_encode(array('result' => 1)));
				}

			}else{
				$this->session->set_flashdata('title','Failed');
				$this->session->set_flashdata('text','Persyaratan Gagal Diupload');
				$this->session->set_flashdata('class', "error");
				$this->output
				->set_content_type('application/json')
				->set_output(json_encode(array('result' => 2)));
			}
		}else{
			$this->session->set_flashdata('title','Warning');
			$this->session->set_flashdata('text','Anda tidak memiliki akses');
			$this->session->set_flashdata('class', "warning");
			redirect('login','refresh');
		}
	}
	function update_neraca_ski(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->badan_usaha()){

	  $post = $this->input->post();
	  $id=$this->security->xss_clean(trim($post['id']));
	  $nib=$this->session->userdata('id_user');
		$upload_20=NULL;
		if($_FILES['file_kap']['name'])
		{
			$this->load->library('upload');
			$id_user="coba";
	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
			$config20['upload_path'] = './assets/bukti/badan_usaha/kap';
			$config20['allowed_types'] = 'pdf|jpg|jpeg|png';
			$config20['overwrite'] = TRUE;
			$config20['file_name'] = $nmfile;
			$this->upload->initialize($config20);
			if($this->upload->do_upload('file_kap')){
				$gbr = $this->upload->data();
				$filename=$gbr['file_name'];
				$file_ext = pathinfo($filename,PATHINFO_EXTENSION);
				$alamat="./assets/bukti/badan_usaha/kap/";
				$upload_20=$gbr['file_name'];
				$data_lap=array(
	        'persyaratan'=>$upload_20
	      );
	      $table='lsbu_keuangan_neraca_2';
	      $where_lap=array(
	        'NIB'=>$nib,
	        'Tahun'=>$id
	      );
	      $this->Bu_model->update_edit($where_lap,$table,$data_lap);
			}
		}


	      $data=array(
					'Tahun'=>$this->security->xss_clean(trim($post['tahun'])),
					'opini_kap'=>str_replace('.', '', $this->security->xss_clean(trim($post['opini_kap']))),
					'aktiva_lancar'=>str_replace('.', '', $this->security->xss_clean(trim($post['aktiva_lancar']))),
					'aktiva_tetap'=>str_replace('.', '', $this->security->xss_clean(trim($post['aktiva_tetap']))),
					'kewajiban_lancar'=>str_replace('.', '', $this->security->xss_clean(trim($post['kewajiban_lancar']))),
					'kewajiban_tidak_lancar'=>str_replace('.', '', $this->security->xss_clean(trim($post['kewajiban_tdk_lancar']))),
					'ekuitas'=>str_replace('.', '', $this->security->xss_clean(trim($post['ekuitas']))),
					'modal_dasar'=>str_replace('.', '', $this->security->xss_clean(trim($post['modal_dasar']))),
					'modal_disetor'=>str_replace('.', '', $this->security->xss_clean(trim($post['modal_disetor']))),
					'laporan_arus_kas'=>str_replace('.', '', $this->security->xss_clean(trim($post['laporan_arus_kas']))),
					'laporan_labar_rugi'=>str_replace('.', '', $this->security->xss_clean(trim($post['laporan_laba_rugi']))),
					'laporan_perubahan_ekuitas'=>str_replace('.', '', $this->security->xss_clean(trim($post['laporan_perubahan_ekuitas']))),
					'catatan_laporan_keuangan'=>str_replace('.', '', $this->security->xss_clean(trim($post['catatan_atas_laporan_keuangan']))),
	      );

	      $table='lsbu_keuangan_neraca_2';
	      $where_lap=array(
	        'NIB'=>$nib,
	        'Tahun'=>$id
	      );
	      $insert=$this->Bu_model->update_edit($where_lap,$table,$data);
	      if($insert=="Success"){
	        $this->session->set_flashdata('title','Success');
	        $this->session->set_flashdata('text','Neraca Berhasil Di Update');
	        $this->session->set_flashdata('class', "error");
	        $this->output
	        ->set_content_type('application/json')
	        ->set_output(json_encode(array('result' => 1)));
	      }else{
	        $this->session->set_flashdata('title','Failed');
	        $this->session->set_flashdata('text','Neraca Gagal Di Update');
	        $this->session->set_flashdata('class', "error");
	        $this->output
	        ->set_content_type('application/json')
	        ->set_output(json_encode(array('result' => 1)));
	      }

		}else{
			$this->session->set_flashdata('title','Warning');
			$this->session->set_flashdata('text','Anda tidak memiliki akses');
			$this->session->set_flashdata('class', "warning");
			redirect('login','refresh');
		}
	}
	function insert_neraca(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->badan_usaha()){

	  $post = $this->input->post();
	  $upload_20=NULL;
	  if($_FILES['file_neraca']['name'])
	  {
	    $this->load->library('upload');
	    $id_user="coba";
	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	    $config20['upload_path'] = './assets/bukti/badan_usaha/20_neraca_bu';
	    $config20['allowed_types'] = 'pdf|jpg|jpeg|png';
	    $config20['overwrite'] = TRUE;
	    $config20['file_name'] = $nmfile;
	    $this->upload->initialize($config20);
	    if($this->upload->do_upload('file_neraca')){
	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	      $alamat="./assets/bukti/badan_usaha/20_neraca_bu/";
	      $upload_20=$gbr['file_name'];
	    }
	  }else{
	    $upload_20="NULL";
	  }

	  $upload_21=NULL;
	  if($_FILES['file_akuntan']['name'])
	  {
	    $this->load->library('upload');
	    $id_user=$this->session->userdata('id_user');
	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	    $config21['upload_path'] = './assets/bukti/badan_usaha/21_laporan_akuntan_publik';
	    $config21['allowed_types'] = 'pdf|jpg|jpeg|png';
	    $config21['overwrite'] = TRUE;
	    $config21['file_name'] = $nmfile;
	    $this->upload->initialize($config21);
	    if($this->upload->do_upload('file_akuntan')){
	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	      $alamat="./assets/bukti/badan_usaha/21_laporan_akuntan_publik/";

	      $upload_21=$gbr['file_name'];
	    }
	  }else{
	    $upload_21="NULL";
	  }





	    if (!empty($upload_20) AND !empty($upload_21))
	    {
	      if(isset($_POST['laba_ditahan_cekbox'])){
	        $laba_ditahan_minus=1;
	      }else{
	        $laba_ditahan_minus=0;
	      }
	      $data=array(
	        'NIB'=>$this->session->userdata('id_user'),
	        'Tahun'=>$idis->security->xss_clean(trim($post['tahun'])),
	        'KasBank'=>str_replace('.', '', $this->security->xss_clean(trim($post['kas_bank']))),
	        'PiutangUsaha'=>str_replace('.', '', $this->security->xss_clean(trim($post['piutang_usaha']))),
	        'Persediaan'=>str_replace('.', '', $this->security->xss_clean(trim($post['persediaan']))),
	        'PiutangPajak'=>str_replace('.', '', $this->security->xss_clean(trim($post['piutang_pajak']))),
	        'BiayaDimuka'=>str_replace('.', '', $this->security->xss_clean(trim($post['bayar_dimuka']))),
	        'WIP'=>str_replace('.', '', $this->security->xss_clean(trim($post['dlm_proses']))),
	        'AktivaLancarLainnya'=>str_replace('.', '', $this->security->xss_clean(trim($post['aktiva_lainnya']))),
	        'Peralatan'=>str_replace('.', '', $this->security->xss_clean(trim($post['peralatan_proyek']))),
	        'Inventaris'=>str_replace('.', '', $this->security->xss_clean(trim($post['inventaris_kantor']))),
	        'PeralatanLain'=>str_replace('.', '', $this->security->xss_clean(trim($post['peralatan_lainnya']))),
	        'AkumulasiPenyusutan'=>str_replace('.', '', $this->security->xss_clean(trim($post['akumulasi_penyusutan']))),
	        'Asset_tanah_bangunan'=>'',
	        'AktivaTetapLainnya'=>str_replace('.', '', $this->security->xss_clean(trim($post['aktiva_tetap_lainnya']))),
	        'AktivaLain'=>str_replace('.', '', $this->security->xss_clean(trim($post['aktiva_lainnya_2']))),
	        'UtangUsaha'=>str_replace('.', '', $this->security->xss_clean(trim($post['utang_usaha']))),
	        'UtangBank'=>str_replace('.', '', $this->security->xss_clean(trim($post['utang_bank']))),
	        'UangMuka'=>str_replace('.', '', $this->security->xss_clean(trim($post['uang_muka']))),
	        'UtangPajak'=>str_replace('.', '', $this->security->xss_clean(trim($post['utang_pajak']))),
	        'BiayaMasihDibayar'=>str_replace('.', '', $this->security->xss_clean(trim($post['harus_dibayar']))),
	        'UtangJPJT'=>str_replace('.', '', $this->security->xss_clean(trim($post['jatuh_tempo']))),
	        'UtangLain'=>str_replace('.', '', $this->security->xss_clean(trim($post['utang_lainnya']))),
	        'UtangBankJP'=>str_replace('.', '', $this->security->xss_clean(trim($post['utang_bank_jp']))),
	        'UtangLainJP'=>str_replace('.', '', $this->security->xss_clean(trim($post['total_utang_jp']))),
	        'ModalDisetor'=>str_replace('.', '', $this->security->xss_clean(trim($post['modal_disetor']))),
	        'SelisihRevaluasi'=>str_replace('.', '', $this->security->xss_clean(trim($post['selisih_revaluasi']))),
	        'LabaDitahan'=>str_replace('.', '', $this->security->xss_clean(trim($post['laba']))),
	        'modallain'=>str_replace('.', '', $this->security->xss_clean(trim($post['modal_lainnya']))),
	        'id_user'=>"coba",
	        'labaditahan_minus'=>$laba_ditahan_minus,
	        'persyaratan_20'=>$upload_20,
	        'persyaratan_21'=>$upload_21,
	      );
	      $table='lsbu_keuangan_neraca';

	      $insert=$this->Bu_model->insert_sad($table,$data);
	      if($insert=="Success"){
	        $this->session->set_flashdata('title','Success');
	        $this->session->set_flashdata('text','Neraca Berhasil Di Input');
	        $this->session->set_flashdata('class', "success");
	        $this->output
	        ->set_content_type('application/json')
	        ->set_output(json_encode(array('result' => 1)));
	      }else{
	        $this->session->set_flashdata('title','Failed');
	        $this->session->set_flashdata('text','Neraca Gagal Di Input');
	        $this->session->set_flashdata('class', "error");
	        $this->output
	        ->set_content_type('application/json')
	        ->set_output(json_encode(array('result' => 1)));
	      }

	    }else{
	      $this->session->set_flashdata('title','Failed');
	      $this->session->set_flashdata('text','Persyaratan Gagal Diupload');
	      $this->session->set_flashdata('class', "error");
	      $this->output
	      ->set_content_type('application/json')
	      ->set_output(json_encode(array('result' => 2)));
	    }
		}else{
			$this->session->set_flashdata('title','Warning');
			$this->session->set_flashdata('text','Anda tidak memiliki akses');
			$this->session->set_flashdata('class', "warning");
			redirect('login','refresh');
		}
	}
	function insert_neraca_ski(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->badan_usaha()){

		$post = $this->input->post();
		$upload_20=NULL;
		if($_FILES['file_kap']['name'])
		{
			$this->load->library('upload');
			$id_user="coba";
	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
			$config20['upload_path'] = './assets/bukti/badan_usaha/kap';
			$config20['allowed_types'] = 'pdf|jpg|jpeg|png';
			$config20['overwrite'] = TRUE;
			$config20['file_name'] = $nmfile;
			$this->upload->initialize($config20);
			if($this->upload->do_upload('file_kap')){
				$gbr = $this->upload->data();
				$filename=$gbr['file_name'];
				$file_ext = pathinfo($filename,PATHINFO_EXTENSION);
				$alamat="./assets/bukti/badan_usaha/kap/";
				$upload_20=$gbr['file_name'];
			}
		}else{
			$upload_20="NULL";
		}






			if (!empty($upload_20))
			{

				$data=array(
					'NIB'=>$this->session->userdata('id_user'),
					'Tahun'=>$this->security->xss_clean(trim($post['tahun'])),
					'opini_kap'=>str_replace('.', '', $this->security->xss_clean(trim($post['opini_kap']))),
					'aktiva_lancar'=>str_replace('.', '', $this->security->xss_clean(trim($post['aktiva_lancar']))),
					'aktiva_tetap'=>str_replace('.', '', $this->security->xss_clean(trim($post['aktiva_tetap']))),
					'kewajiban_lancar'=>str_replace('.', '', $this->security->xss_clean(trim($post['kewajiban_lancar']))),
					'kewajiban_tidak_lancar'=>str_replace('.', '', $this->security->xss_clean(trim($post['kewajiban_tdk_lancar']))),
					'ekuitas'=>str_replace('.', '', $this->security->xss_clean(trim($post['ekuitas']))),
					'modal_dasar'=>str_replace('.', '', $this->security->xss_clean(trim($post['modal_dasar']))),
					'modal_disetor'=>str_replace('.', '', $this->security->xss_clean(trim($post['modal_disetor']))),
					'laporan_arus_kas'=>str_replace('.', '', $this->security->xss_clean(trim($post['laporan_arus_kas']))),
					'laporan_labar_rugi'=>str_replace('.', '', $this->security->xss_clean(trim($post['laporan_laba_rugi']))),
					'laporan_perubahan_ekuitas'=>str_replace('.', '', $this->security->xss_clean(trim($post['laporan_perubahan_ekuitas']))),
					'catatan_laporan_keuangan'=>str_replace('.', '', $this->security->xss_clean(trim($post['catatan_atas_laporan_keuangan']))),
					'persyaratan'=>$upload_20,
				);
				$table='lsbu_keuangan_neraca_2';

				$insert=$this->Bu_model->insert_sad($table,$data);
				if($insert=="Success"){
					$this->session->set_flashdata('title','Success');
					$this->session->set_flashdata('text','Neraca Berhasil Di Input');
					$this->session->set_flashdata('class', "success");
					$this->output
					->set_content_type('application/json')
					->set_output(json_encode(array('result' => 1)));
				}else{
					$this->session->set_flashdata('title','Failed');
					$this->session->set_flashdata('text','Neraca Gagal Di Input');
					$this->session->set_flashdata('class', "error");
					$this->output
					->set_content_type('application/json')
					->set_output(json_encode(array('result' => 1)));
				}

			}else{
				$this->session->set_flashdata('title','Failed');
				$this->session->set_flashdata('text','Persyaratan Gagal Diupload');
				$this->session->set_flashdata('class', "error");
				$this->output
				->set_content_type('application/json')
				->set_output(json_encode(array('result' => 2)));
			}
		}else{
			$this->session->set_flashdata('title','Warning');
			$this->session->set_flashdata('text','Anda tidak memiliki akses');
			$this->session->set_flashdata('class', "warning");
			redirect('login','refresh');
		}
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

}
