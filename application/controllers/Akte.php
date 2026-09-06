<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Akte extends CI_Controller
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
	function delete_pendirian(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->badan_usaha()){
		$post = $this->input->post();
		$nib=$this->session->userdata('id_user');
		$rec=$this->Bu_model->detele_akte_pendirian($nib);
		if($rec=='Success'){
			$this->session->set_flashdata('title','Success');
			$this->session->set_flashdata('text','Data berhasil dihapus');
			$this->session->set_flashdata('class', "success");
			redirect('akte/pendirian','refresh');
		}else{
			$this->session->set_flashdata('title','Failed');
			$this->session->set_flashdata('text','Data gagal dihapus');
			$this->session->set_flashdata('class', "warning");
			redirect('akte/pendirian','refresh');
		}
		}else{
			$this->session->set_flashdata('title','Warning');
			$this->session->set_flashdata('text','Anda tidak memiliki akses');
			$this->session->set_flashdata('class', "warning");
			redirect('login','refresh');
		}
	}
	function delete_perubahan(){
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
		$rec=$this->Bu_model->detele_akte_perubahan($nib,$id);
		if($rec=='Success'){
			$this->session->set_flashdata('title','Success');
			$this->session->set_flashdata('text','Data berhasil dihapus');
			$this->session->set_flashdata('class', "success");
			redirect('akte/perubahan','refresh');
		}else{
			$this->session->set_flashdata('title','Failed');
			$this->session->set_flashdata('text','Data gagal dihapus');
			$this->session->set_flashdata('class', "warning");
			redirect('akte/perubahan','refresh');
		}
		}else{
			$this->session->set_flashdata('title','Warning');
			$this->session->set_flashdata('text','Anda tidak memiliki akses');
			$this->session->set_flashdata('class', "warning");
			redirect('login','refresh');
		}
	}
	function cek_pendirian(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->badan_usaha() OR $this->ion_auth->admin_pusat()){

		$post = $this->input->post();
		$id=$post['id'];
		$nib=$this->session->userdata('id_user');
		$select="SELECT * FROM lsbu_akte_pendirian";
		$where="WHERE nomer_akte='$id' AND NIB='$nib'";
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
	function cek_perubahan(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->badan_usaha() OR $this->ion_auth->admin_pusat()){

		$post = $this->input->post();
		$id=$post['id'];
		$nib=$this->session->userdata('id_user');
		$select="SELECT * FROM lsbu_akte_perubahan";
		$where="WHERE nomer_akte='$id' AND NIB='$nib'";
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
	function index(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->badan_usaha()){

		$id_bu=$this->session->userdata('id_user');

		$propinsi=$this->Bu_model->provinsi();
    $kabupaten=$this->Bu_model->kabupaten();
    $this->data = array(
			'propinsi'=>$propinsi,
	    'jabatan'=>$this->Bu_model->jabatan(),
	    'klasifikasi'=>$this->Bu_model->klasifikasi(),
	    'record'=>$this->Bu_model->akte_pendirian_opr($id_bu),

    );
    $this->template->load('menu/menu','bu/akte_pendirian', $this->data);
	}else{
		$this->session->set_flashdata('title','Warning');
		$this->session->set_flashdata('text','Anda tidak memiliki akses');
		$this->session->set_flashdata('class', "warning");
		redirect('login','refresh');
	}
	}

	function update_perubahan(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->badan_usaha()){

	  $post = $this->input->post();
	  $nib=$this->session->userdata('id_user');
	  $nomer_akte=$this->security->xss_clean(trim($post['id']));

	  $this->load->library('upload');
	  $id_user=$this->session->userdata('id_user');

		$upload_56=NULL;
	 if($_FILES['upload_ham']['name'])
	 {
		 $this->load->library('upload');
		 $id_user=$this->session->userdata('id_user');
		$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
		 $config56['upload_path'] = './assets/bukti/badan_usaha/56_ham_perubahan';
		 $config56['allowed_types'] = 'pdf|jpg|jpeg|png';
		 $config56['overwrite'] = TRUE;
		 $config56['file_name'] = $nmfile;
		 $this->upload->initialize($config56);
		 if($this->upload->do_upload('upload_ham')){
			 $gbr = $this->upload->data();
			 $filename=$gbr['file_name'];
			 $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
			 $alamat="./assets/bukti/badan_usaha/56_ham_perubahan/";

			 $upload_56=$gbr['file_name'];
			 $data_dom=array(
				 'persyaratan_56'=>$upload_56
			 );
			 $table='bu_akte_perubahan';
			 $where_dom=array(
				 'NIB'=>$nib,
				 'nomer_akte'=>$nomer_akte
			 );
			 $this->Bu_model->update_edit($where_dom,$table,$data_dom);
		 }
	 }

	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	  $config['upload_path'] = './assets/bukti/badan_usaha/8_akte_perubahan';
	  $config['allowed_types'] = 'pdf|jpg|jpeg|png|zip|rar';
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
	      $alamat="./assets/bukti/badan_usaha/8_akte_perubahan/";
	      if($file_ext=='png' OR $file_ext=='jpg' OR $file_ext=='jpeg'){
	        $this->watermarkImages($alamat,$filename);
	      }
	      $data_dom=array(
	        'persyaratan'=>$gbr['file_name']
	      );
	      $table='bu_akte_perubahan';
	      $where_dom=array(
	        'NIB'=>$nib,
	        'nomer_akte'=>$nomer_akte
	      );
	      $this->Bu_model->update_edit($where_dom,$table,$data_dom);

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
	  $where_dom=array(
	    'NIB'=>$nib,
	    'nomer_akte'=>$nomer_akte
	  );
	  $table='lsbu_akte_perubahan';
	  $data=array(
			'nomer_akte'=>$this->security->xss_clean(trim($post['nomor_akte'])),
			'nama_notaris'=>$this->security->xss_clean(trim($post['nama_notaris'])),
			'alamat'=>$this->security->xss_clean(trim($post['alamat'])),
			'tgl_akte'=>$this->security->xss_clean(trim($post['tgl_akte'])),
			'nama_pengurus'=>$this->security->xss_clean(trim($post['nama_pengurus'])),
			'id_jabatan'=>$this->security->xss_clean(trim($post['id_jabatan'])),
			'kabupaten_akte'=>$this->security->xss_clean(trim($post['kabupaten'])),
			'propinsi_akte'=>$this->security->xss_clean(trim($post['propinsi'])),
			'no_pm'=>$this->security->xss_clean(trim($post['mentri'])),
			'tgl_pm'=>$this->security->xss_clean(trim($post['tgl_mentri'])),
			'no_pn'=>$this->security->xss_clean(trim($post['pengadilan_negeri'])),
			'tgl_pn'=>$this->security->xss_clean(trim($post['tgl_pn'])),
			'no_ln'=>$this->security->xss_clean(trim($post['lembar_negara'])),
			'tgl_ln'=>$this->security->xss_clean(trim($post['tgl_ln'])),
			'perubahan'=>$this->security->xss_clean(trim($post['perubahan'])),
			'modal_dasar'=>$this->security->xss_clean(trim($post['modal_dasar'])),
	  );
	  $table='lsbu_akte_perubahan';
		if (!empty($_POST)){
	  $insert=$this->Bu_model->update_edit($where_dom,$table,$data);
		}
	  if($insert=="Success"){
	    $this->session->set_flashdata('title','Success');
	    $this->session->set_flashdata('text','Akte Pendirian Berhasil Di Update');
	    $this->session->set_flashdata('class', "success");
	    $this->output
	    ->set_content_type('application/json')
	    ->set_output(json_encode(array('result' => 1)));
	  }else{
	    $this->session->set_flashdata('title','Failed');
	    $this->session->set_flashdata('text','Akte Pendirian Gagal Di Update');
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
	function update_pendirian(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->badan_usaha()){

	  $post = $this->input->post();
	  $nib=$this->session->userdata('id_user');

	  $this->load->library('upload');
	  $id_user=$this->session->userdata('id_user');
		$upload_55=NULL;
	 if($_FILES['upload_ham']['name'])
	 {
		 $this->load->library('upload');
		 $id_user=$this->session->userdata('id_user');
		$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
		 $config55['upload_path'] = './assets/bukti/badan_usaha/55_ham';
		 $config55['allowed_types'] = 'pdf|jpg|jpeg|png';
		 $config55['overwrite'] = TRUE;
		 $config55['file_name'] = $nmfile;
		 $this->upload->initialize($config55);
		 if($this->upload->do_upload('upload_ham')){
			 $gbr = $this->upload->data();
			 $filename=$gbr['file_name'];
			 $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
			 $alamat="./assets/bukti/badan_usaha/55_ham/";

			 $upload_55=$gbr['file_name'];
			 $data_dom=array(
				 'persyaratan_55'=>$upload_55
			 );
			 $table='lsbu_akte_pendirian';
			 $where_dom=array(
				 'NIB'=>$nib
			 );
			 $this->Bu_model->update_edit($where_dom,$table,$data_dom);
		 }
	 }
	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	  $config['upload_path'] = './assets/bukti/badan_usaha/7_akte_pendirian';
	  $config['allowed_types'] = 'pdf|jpg|jpeg|png|zip|rar';
	  $config['overwrite'] = TRUE;
	  $config['file_name'] = $nmfile;
	  $this->upload->initialize($config);
		$filename=NULL;
	  if($_FILES['upload_persyaratan']['name'])
	  {
	    if ($this->upload->do_upload('upload_persyaratan'))
	    {
	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	      $alamat="./assets/bukti/badan_usaha/7_akte_pendirian/";
	      if($file_ext=='png' OR $file_ext=='jpg' OR $file_ext=='jpeg'){
	        $this->watermarkImages($alamat,$filename);
	      }
	      $data_dom=array(
	        'persyaratan'=>$gbr['file_name']
	      );
	      $table='lsbu_akte_pendirian';
	      $where_dom=array(
	        'NIB'=>$nib
	      );
	      $this->Bu_model->update_edit($where_dom,$table,$data_dom);

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
		if (!empty($_POST)){
	  $where_dom=array(
	    'NIB'=>$nib
	  );
	  $table='lsbu_akte_pendirian';
	  $data=array(
			'nomer_akte'=>$this->security->xss_clean(trim($post['nomor_akte'])),
			'nama_notaris'=>$this->security->xss_clean(trim($post['nama_notaris'])),
			'alamat'=>$this->security->xss_clean(trim($post['alamat'])),
			'tgl_akte'=>$this->security->xss_clean(trim($post['tgl_akte'])),
			'nama_pengurus'=>$this->security->xss_clean(trim($post['nama_pengurus'])),
			'id_jabatan'=>$this->security->xss_clean(trim($post['id_jabatan'])),
			'kabupaten_akte'=>$this->security->xss_clean(trim($post['kabupaten'])),
			'propinsi_akte'=>$this->security->xss_clean(trim($post['propinsi'])),
			'no_pm'=>$this->security->xss_clean(trim($post['mentri'])),
			'tgl_pm'=>$this->security->xss_clean(trim($post['tgl_mentri'])),
			'no_pn'=>$this->security->xss_clean(trim($post['pengadilan_negeri'])),
			'tgl_pn'=>$this->security->xss_clean(trim($post['tgl_pn'])),
			'no_ln'=>$this->security->xss_clean(trim($post['lembar_negara'])),
			'tgl_ln'=>$this->security->xss_clean(trim($post['tgl_ln'])),
	  );
	  $table='lsbu_akte_pendirian';

		  $insert=$this->Bu_model->update_edit($where_dom,$table,$data);
		}

	  if($insert=="Success"){
	    $this->session->set_flashdata('title','Success');
	    $this->session->set_flashdata('text','Akte Pendirian Berhasil Di Update');
	    $this->session->set_flashdata('class', "success");
	    $this->output
	    ->set_content_type('application/json')
	    ->set_output(json_encode(array('result' => $filename)));
	  }else{
	    $this->session->set_flashdata('title','Failed');
	    $this->session->set_flashdata('text','Akte Pendirian Gagal Di Update');
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
  function pendirian(){
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
	    'jabatan'=>$this->Bu_model->jabatan(),
	    'record'=>$this->Bu_model->akte_pendirian_opr($nib),

    );
    $this->template->load('menu/menu','bu/akte_pendirian', $this->data);
	}else{
		$this->session->set_flashdata('title','Warning');
		$this->session->set_flashdata('text','Anda tidak memiliki akses');
		$this->session->set_flashdata('class', "warning");
		redirect('login','refresh');
	}
	}
	function perubahan(){
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
				'jabatan'=>$this->Bu_model->jabatan(),
				'record'=>$this->Bu_model->akte_perubahan_opr($nib),
		);
		$this->template->load('menu/menu','bu/akte_perubahan', $this->data);
	}else{
		$this->session->set_flashdata('title','Warning');
		$this->session->set_flashdata('text','Anda tidak memiliki akses');
		$this->session->set_flashdata('class', "warning");
		redirect('login','refresh');
	}
	}
	function kabupaten(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->badan_usaha()){

	  $post = $this->input->post();
	  $id_propinsi=$post['id_propinsi'];
	  $select="SELECT ID_Kabupaten,Nama FROM kabupaten";
	  $where="WHERE ID_Propinsi='$id_propinsi'";
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
	function insert_pendirian(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->badan_usaha()){

	  $post = $this->input->post();


	  $this->load->library('upload');
	  $id_user=$this->session->userdata('id_user');
		$upload_55=NULL;
	 if($_FILES['upload_ham']['name'])
	 {
		 $this->load->library('upload');
		 $id_user=$this->session->userdata('id_user');
 	 	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
		 $config55['upload_path'] = './assets/bukti/badan_usaha/55_ham';
		 $config55['allowed_types'] = 'pdf|jpg|jpeg|png';
		 $config55['overwrite'] = TRUE;
		 $config55['file_name'] = $nmfile;
		 $this->upload->initialize($config55);
		 if($this->upload->do_upload('upload_ham')){
			 $gbr = $this->upload->data();
			 $filename=$gbr['file_name'];
			 $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
			 $alamat="./assets/bukti/badan_usaha/55_ham/";

			 $upload_55=$gbr['file_name'];
		 }
	 }else{
		 $upload_55="NULL";
	 }




		$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	  $config['upload_path'] = './assets/bukti/badan_usaha/7_akte_pendirian';
	  $config['allowed_types'] = 'pdf|jpg|jpeg|png|zip|rar';
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
	      $alamat="./assets/bukti/badan_usaha/7_akte_pendirian";

	      $data=array(
	        'NIB'=>$this->session->userdata('id_user'),
	        'nomer_akte'=>$this->security->xss_clean(trim($post['nomor_akte'])),
	        'nama_notaris'=>$this->security->xss_clean(trim($post['nama_notaris'])),
	        'alamat'=>$this->security->xss_clean(trim($post['alamat'])),
	        'tgl_akte'=>$this->security->xss_clean(trim($post['tgl_akte'])),
	        'nama_pengurus'=>$this->security->xss_clean(trim($post['nama_pengurus'])),
	        'id_jabatan'=>$this->security->xss_clean(trim($post['id_jabatan'])),
	        'kabupaten_akte'=>$this->security->xss_clean(trim($post['kabupaten'])),
	        'propinsi_akte'=>$this->security->xss_clean(trim($post['propinsi'])),
	        'no_pm'=>$this->security->xss_clean(trim($post['mentri'])),
	        'tgl_pm'=>$this->security->xss_clean(trim($post['tgl_mentri'])),
	        'no_pn'=>$this->security->xss_clean(trim($post['pengadilan_negeri'])),
	        'tgl_pn'=>$this->security->xss_clean(trim($post['tgl_pn'])),
	        'no_ln'=>$this->security->xss_clean(trim($post['lembar_negara'])),
	        'tgl_ln'=>$this->security->xss_clean(trim($post['tgl_ln'])),
	        'persyaratan'=>$gbr['file_name'],
					'persyaratan_55'=>$upload_55
	      );
	      $table='lsbu_akte_pendirian';
	      $insert=$this->Bu_model->insert_sad($table,$data);
	      if($insert=="Success"){
	        $this->session->set_flashdata('title','Success');
	        $this->session->set_flashdata('text','Akte Pendirian Berhasil Di Input');
	        $this->session->set_flashdata('class', "success");
					$this->output
		      ->set_content_type('application/json')
		      ->set_output(json_encode(array('result' => 0)));
	      }else{
	        $this->session->set_flashdata('title','Failed');
	        $this->session->set_flashdata('text','Akte Pendirian Gagal Di Input');
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

	function insert_perubahan(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->badan_usaha()){

	  $post = $this->input->post();


	  $this->load->library('upload');
	  $id_user=$this->session->userdata('id_user');
		$upload_56=NULL;
	 if($_FILES['upload_ham']['name'])
	 {
		 $this->load->library('upload');
		 $id_user=$this->session->userdata('id_user');
		$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
		 $config56['upload_path'] = './assets/bukti/badan_usaha/56_ham_perubahan';
		 $config56['allowed_types'] = 'pdf|jpg|jpeg|png';
		 $config56['overwrite'] = TRUE;
		 $config56['file_name'] = $nmfile;
		 $this->upload->initialize($config56);
		 if($this->upload->do_upload('upload_ham')){
			 $gbr = $this->upload->data();
			 $filename=$gbr['file_name'];
			 $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
			 $alamat="./assets/bukti/badan_usaha/56_ham_perubahan/";

			 $upload_56=$gbr['file_name'];
		 }
	 }else{
		 $upload_56="NULL";
	 }
	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	  $config['upload_path'] = './assets/bukti/badan_usaha/8_akte_perubahan';
	  $config['allowed_types'] = 'pdf|jpg|jpeg|png|zip|rar';
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
	      $alamat="./assets/bukti/badan_usaha/8_akte_perubahan";


	      $data=array(
					'NIB'=>$this->session->userdata('id_user'),
	        'nomer_akte'=>$this->security->xss_clean(trim($post['nomor_akte'])),
	        'nama_notaris'=>$this->security->xss_clean(trim($post['nama_notaris'])),
	        'alamat'=>$this->security->xss_clean(trim($post['alamat'])),
	        'tgl_akte'=>$this->security->xss_clean(trim($post['tgl_akte'])),
	        'nama_pengurus'=>$this->security->xss_clean(trim($post['nama_pengurus'])),
	        'id_jabatan'=>$this->security->xss_clean(trim($post['id_jabatan'])),
	        'kabupaten_akte'=>$this->security->xss_clean(trim($post['kabupaten'])),
	        'propinsi_akte'=>$this->security->xss_clean(trim($post['propinsi'])),
	        'no_pm'=>$this->security->xss_clean(trim($post['mentri'])),
	        'tgl_pm'=>$this->security->xss_clean(trim($post['tgl_mentri'])),
	        'no_pn'=>$this->security->xss_clean(trim($post['pengadilan_negeri'])),
	        'tgl_pn'=>$this->security->xss_clean(trim($post['tgl_pn'])),
	        'no_ln'=>$this->security->xss_clean(trim($post['lembar_negara'])),
	        'tgl_ln'=>$this->security->xss_clean(trim($post['tgl_ln'])),
					'perubahan'=>$this->security->xss_clean(trim($post['perubahan'])),
					'modal_dasar'=>$this->security->xss_clean(trim($post['modal_dasar'])),
					'persyaratan'=>$gbr['file_name'],
					'persyaratan_56'=>$upload_56,
	      );


	      $table='lsbu_akte_perubahan';
	      $insert=$this->Bu_model->insert_sad($table,$data);
	      if($insert=="Success"){
	        $this->session->set_flashdata('title','Success');
	        $this->session->set_flashdata('text','Akte Perubahan Berhasil Di Input');
	        $this->session->set_flashdata('class', "success");
	        $this->output
	        ->set_content_type('application/json')
	        ->set_output(json_encode(array('result' => 1)));
	      }else{
	        $this->session->set_flashdata('title','Failed');
	        $this->session->set_flashdata('text','Akte Perubahan Gagal Di Input');
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

}
