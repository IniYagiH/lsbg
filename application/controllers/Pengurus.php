<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengurus extends CI_Controller
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
	function delete(){
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
		$rec=$this->Bu_model->detele_pengurus($nib,$id);
		if($rec=='Success'){
			$this->session->set_flashdata('title','Success');
			$this->session->set_flashdata('text','Data berhasil dihapus');
			$this->session->set_flashdata('class', "success");
			redirect('pengurus','refresh');
		}else{
			$this->session->set_flashdata('title','Failed');
			$this->session->set_flashdata('text','Data gagal dihapus');
			$this->session->set_flashdata('class', "warning");
			redirect('pengurus','refresh');
		}
		}else{
			$this->session->set_flashdata('title','Warning');
			$this->session->set_flashdata('text','Anda tidak memiliki akses');
			$this->session->set_flashdata('class', "warning");
			redirect('login','refresh');
		}
	}
	function search_pengurus(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}
	  $post = $this->input->post();
	  $id=$post['id'];
		$nib=$this->session->userdata('id_user');

	  $record=$this->Bu_model->pengurus_search($nib,$id);
	  $response = array(
										'pjbu'=>$this->Bu_model->cek_pjbu($nib),
	                  'record' =>$record,

	                );

	      echo json_encode($response,JSON_PRETTY_PRINT);
	}
	function cek_pjbu(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}
		$post = $this->input->post();
		$nib=$this->session->userdata('id_user');

		$record=$this->Bu_model->cek_pjbu($nib);
		$response = array(

										'record' =>$record,

									);

				echo json_encode($response,JSON_PRETTY_PRINT);
	}

  function index(){
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
			'jabatan_bu'=>$this->Bu_model->jabatan_bu(),
			'record'=>$this->Bu_model->pengurus_opr($nib),
		);
    $this->template->load('menu/menu','bu/pengurus', $this->data);
	}else{
		$this->session->set_flashdata('title','Warning');
		$this->session->set_flashdata('text','Anda tidak memiliki akses');
		$this->session->set_flashdata('class', "warning");
		redirect('login','refresh');
	}
	}


	function update(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->badan_usaha()){

	  $post = $this->input->post();
	  $id_pengurus=$this->security->xss_clean(trim($post['id']));
	  $upload_14=NULL;
	  $nib=$this->session->userdata('id_user');
	  if($_FILES['file_ktp']['name'])
	  {
	    $this->load->library('upload');
	    $id_user=$this->session->userdata('id_user');
	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	    $config14['upload_path'] = './assets/bukti/badan_usaha/14_ktp_pengurus';
	    $config14['allowed_types'] = 'pdf|jpg|jpeg|png';
	    $config14['overwrite'] = TRUE;
	    $config14['file_name'] = $nmfile;
	    $this->upload->initialize($config14);
	    if($this->upload->do_upload('file_ktp')){
	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	      $alamat="./assets/bukti/badan_usaha/14_ktp_pengurus/";

	      $upload_14=$gbr['file_name'];
	      $data_ktp=array(
	        'persyaratan_14'=>$upload_14
	      );
	      $table='lsbu_pengurus';
	      $where_ktp=array(
	        'NIB'=>$nib,
	        'id_pengurus'=>$id_pengurus
	      );
	    $this->Bu_model->update_edit($where_ktp,$table,$data_ktp);

	    }
	  }else{
	    $upload_14="NULL";
	  }
	  $upload_15=NULL;
	  if($_FILES['file_npwp']['name'])
	  {
	    $this->load->library('upload');
	    $id_user=$this->session->userdata('id_user');
	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	    $config15['upload_path'] = './assets/bukti/badan_usaha/15_npwp_pengurus';
	    $config15['allowed_types'] = 'pdf|jpg|jpeg|png';
	    $config15['overwrite'] = TRUE;
	    $config15['file_name'] = $nmfile;
	    $this->upload->initialize($config15);
	    if($this->upload->do_upload('file_npwp')){
	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	      $alamat="./assets/bukti/badan_usaha/15_npwp_pengurus/";

	      $upload_15=$gbr['file_name'];
	      $data_npwp=array(
	        'persyaratan_15'=>$upload_15
	      );
	      $table='lsbu_pengurus';
	      $where_npwp=array(
	        'NIB'=>$nib,
	        'id_pengurus'=>$id_pengurus
	      );
	    $this->Bu_model->update_edit($where_npwp,$table,$data_npwp);


	    }
	  }else{
	    $upload_15="NULL";
	  }



	    if (!empty($upload_14) AND !empty($upload_15))
	    {

	      $data=array(
					'no_ktp'=>$this->security->xss_clean(trim($post['ktp'])),
					'nama'=>$this->security->xss_clean(trim($post['nama_pengurus'])),
					'alamat'=>$this->security->xss_clean(trim($post['jalan'])),
					'kodepos'=>$this->security->xss_clean(trim($post['kode_pos'])),

					'id_jabatan'=>$this->security->xss_clean(trim($post['status_jabatan'])),
					'tgl_lahir'=>$this->security->xss_clean(trim($post['tgl_lahir'])),
					'tempat_lahir'=>$this->security->xss_clean(trim($post['tempat_lahir'])),
					'id_kabupaten'=>$this->security->xss_clean(trim($post['kabupaten'])),

					'id_propinsi'=>$this->security->xss_clean(trim($post['propinsi'])),
					'username'=>$nib,
					'tgl_update'=>date("Y-m-d"),
					'npwp'=>$this->security->xss_clean(trim($post['npwp'])),
	      );

	      $table='lsbu_pengurus';
	      $where_pj=array(
	        'NIB'=>$nib,
	        'id_pengurus'=>$id_pengurus
	      );
	    $inserts=$this->Bu_model->update_edit($where_pj,$table,$data);
	      if($inserts=="Success"){
	        $this->session->set_flashdata('title','Success');
	        $this->session->set_flashdata('text','Pengurus Berhasil Di Update');
	        $this->session->set_flashdata('class', "success");
	        $this->output
	        ->set_content_type('application/json')
	        ->set_output(json_encode(array('result' => 1)));
	      }else{
	        $this->session->set_flashdata('title','Failed');
	        $this->session->set_flashdata('text','Pengurus Gagal Di Update');
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
	function insert(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->badan_usaha()){

	  $post = $this->input->post();

	  $upload_14=NULL;
	  if($_FILES['file_ktp']['name'])
	  {
	    $this->load->library('upload');
	    $id_user="coba";
	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	    $config14['upload_path'] = './assets/bukti/badan_usaha/14_ktp_pengurus';
	    $config14['allowed_types'] = 'pdf|jpg|jpeg|png';
	    $config14['overwrite'] = TRUE;
	    $config14['file_name'] = $nmfile;
	    $this->upload->initialize($config14);
	    if($this->upload->do_upload('file_ktp')){
	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);

	      $upload_14=$gbr['file_name'];
	    }
	  }else{
	    $upload_14="NULL";
	  }
	  $upload_15=NULL;
	  if($_FILES['file_npwp']['name'])
	  {
	    $this->load->library('upload');
	    $id_user="coba";
	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	    $config15['upload_path'] = './assets/bukti/badan_usaha/15_npwp_pengurus';
	    $config15['allowed_types'] = 'pdf|jpg|jpeg|png';
	    $config15['overwrite'] = TRUE;
	    $config15['file_name'] = $nmfile;
	    $this->upload->initialize($config15);
	    if($this->upload->do_upload('file_npwp')){
	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	      $alamat="./assets/bukti/badan_usaha/15_npwp_pengurus/";

	      $upload_15=$gbr['file_name'];
	    }
	  }else{
	    $upload_15="NULL";
	  }






	    if (!empty($upload_14) AND !empty($upload_15))
	    {
				/*
	      if(isset($_POST['pjbu'])){
	        $pjbu='1';
	      }else{
	        $pjbu='';
	      }
	      if($pjbu=='1'){
	        $id_personal=$this->security->xss_clean(trim($post['ktp']));
	        $recor=$this->Bu_model->search_pjbu($id_personal);
	        if(!empty($recor)){
	          $status="FALSE";
	          $nam_bu=$recor[0]['Nama'];
	        }else{
	          $status="TRUE";
	        }
	      }else{
	        $status="TRUE";
	      }*/
	      $gelar_depan=$this->security->xss_clean(trim($post['gelar_depan']));
	      $nama=$this->security->xss_clean(trim($post['nama_pengurus']));
	      $gelar_belakang=$this->security->xss_clean(trim($post['gelar_belakang']));
	      if($gelar_depan==''){
	        if($gelar_belakang==''){
	          $nama_pengurus=$nama;
	        }else{
	          $nama_pengurus=$nama.' '.$gelar_belakang;
	        }
	      }elseif($gelar_belakang==''){
	        if($gelar_depan==''){
	          $nama_pengurus=$nama;
	        }else{
	          $nama_pengurus=$gelar_depan.' '.$nama;
	        }
	      }else{
	        $nama_pengurus=$gelar_depan.' '.$nama.' '.$gelar_belakang;
	      }



	        $data=array(
	          'no_ktp'=>$this->security->xss_clean(trim($post['ktp'])),
	          'NIB'=>$this->session->userdata('id_user'),
	          'nama'=>$nama_pengurus,
	          'alamat'=>$this->security->xss_clean(trim($post['jalan'])),
	          'kodepos'=>$this->security->xss_clean(trim($post['kode_pos'])),

	          'id_jabatan'=>$this->security->xss_clean(trim($post['status_jabatan'])),
	          'tgl_lahir'=>$this->security->xss_clean(trim($post['tgl_lahir'])),
	          'tempat_lahir'=>$this->security->xss_clean(trim($post['tempat_lahir'])),
						'id_kabupaten'=>$this->security->xss_clean(trim($post['kabupaten'])),

	          'id_propinsi'=>$this->security->xss_clean(trim($post['propinsi'])),
	          'username'=>"coba",
	          'tgl_update'=>date("Y-m-d"),
	          'npwp'=>$this->security->xss_clean(trim($post['npwp'])),
	          'persyaratan_14'=>$upload_14,
	          'persyaratan_15'=>$upload_15,

	        );

	        $table='lsbu_pengurus';
	        $insert=$this->Bu_model->insert_sad($table,$data);
	        if($insert=="Success"){
	          $this->session->set_flashdata('title','Success');
	          $this->session->set_flashdata('text','Pengurus Berhasil Di Input');
	          $this->session->set_flashdata('class', "success");
	          $this->output
	          ->set_content_type('application/json')
	          ->set_output(json_encode(array('result' => 1)));
	        }else{
	          $this->session->set_flashdata('title','Failed');
	          $this->session->set_flashdata('text','Pengurus Gagal Di Input');
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
