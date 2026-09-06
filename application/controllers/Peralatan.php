<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Peralatan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('bu/Bu_model');
		$this->load->helper(array('url','html','file','form','security'));
		$this->load->library(array('ion_auth','form_validation','Template'));
		$this->load->model('User_model');
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
		$rec=$this->Bu_model->detele_peralatan($nib,$id);
		if($rec=='Success'){
			$this->session->set_flashdata('title','Success');
			$this->session->set_flashdata('text','Data berhasil dihapus');
			$this->session->set_flashdata('class', "success");
			redirect('peralatan','refresh');
		}else{
			$this->session->set_flashdata('title','Failed');
			$this->session->set_flashdata('text','Data gagal dihapus');
			$this->session->set_flashdata('class', "warning");
			redirect('peralatan','refresh');
		}
		}else{
			$this->session->set_flashdata('title','Warning');
			$this->session->set_flashdata('text','Anda tidak memiliki akses');
			$this->session->set_flashdata('class', "warning");
			redirect('login','refresh');
		}
	}
	function search_peralatan(){
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
		$select="SELECT * FROM lsbu_peralatan";
		$where="WHERE id='$id' AND NIB='$nib'";
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
	function tipe(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->badan_usaha() OR $this->ion_auth->admin_pusat()){

	  $post = $this->input->post();
	  $tipe=$post['id_jenis'];
	  $response = array(
	                  'record' =>$this->Bu_model->get_tipe_peralatan($tipe)
	                );

	      echo json_encode($response);
			}else{
				$this->session->set_flashdata('title','Warning');
				$this->session->set_flashdata('text','Anda tidak memiliki akses');
				$this->session->set_flashdata('class', "warning");
				redirect('login','refresh');
			}


}
function sub_tipe(){
	if (!$this->ion_auth->ceklogin())
	{
		$this->session->set_flashdata('title','Login Gagal');
		$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
		$this->session->set_flashdata('class', "warning");
		redirect('login', 'refresh');
	}elseif($this->ion_auth->badan_usaha() OR $this->ion_auth->admin_pusat()){

	$post = $this->input->post();
	$tipe=$post['id_tipe'];
	$response = array(
									'record' =>$this->Bu_model->get_sub_tipe_peralatan($tipe)
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
		$nib=$this->session->userdata('id_user');
		$propinsi=$this->Bu_model->provinsi();
		$kabupaten=$this->Bu_model->kabupaten();
    $this->data = array(
			'propinsi'=>$propinsi,
			'kabupaten'=>$kabupaten,
			'record'=>$this->Bu_model->peralatan($nib),
			'peralatan'=>$this->Bu_model->get_peralatan_master_jenis(),
			'peralatan_tipe'=>$this->Bu_model->get_peralatan_master_tipe(),
			'peralatan_sub_tipe'=>$this->Bu_model->get_peralatan_master_sub_tipe()

    );
    $this->template->load('menu/menu','bu/peralatan', $this->data);
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
			$nib=$this->session->userdata('id_user');
	  $post = $this->input->post();
	  if($_FILES['file_pemilik']['name'])
	  {
	    $this->load->library('upload');
	    $id_user=$this->session->userdata('id_user');
	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	    $config['upload_path'] = './assets/bukti/badan_usaha/peralatan';
	    $config['allowed_types'] = 'pdf|jpg|jpeg|png';
	    $config['overwrite'] = TRUE;
	    $config['file_name'] = $nmfile;
	    $this->upload->initialize($config);
	    if($this->upload->do_upload('file_pemilik')){
	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	      $alamat="./assets/bukti/badan_usaha/peralatan/";

	      $upload_9=$gbr['file_name'];
	    }
	  }else{
	    $upload_9="NULL";
	  }

	      $data=array(
	        'NIB'=>$nib,
	        'jenis_peralatan'=>$this->security->xss_clean(trim($post['jenis'])),
					'tipe_peralatan'=>$this->security->xss_clean(trim($post['tipe'])),
					'sub_tipe_peralatan'=>$this->security->xss_clean(trim($post['sub_tipe'])),
					'tahun_pembuatan'=>$this->security->xss_clean(trim($post['tahun'])),
					'kapasitas'=>$this->security->xss_clean(trim($post['kapasitas'])),
					'kondisi'=>$this->security->xss_clean(trim($post['kondisi'])),
					'harga'=>$this->security->xss_clean(trim($post['harga'])),

					'propinsi'=>$this->security->xss_clean(trim($post['propinsi'])),
	        'persyaratan'=>$upload_9,

	      );
	      $table='lsbu_peralatan';
	      $insert=$this->Bu_model->insert_sad($table,$data);
	      if($insert=="Success"){
	        $this->session->set_flashdata('title','Success');
	        $this->session->set_flashdata('text','Biodata Berhasil Di Input');
	        $this->session->set_flashdata('class', "success");
	        $this->output
	        ->set_content_type('application/json')
	        ->set_output(json_encode(array('result' => 1)));
	      }else{
	        $this->session->set_flashdata('title','Failed');
	        $this->session->set_flashdata('text','Biodata Gagal Di Input');
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
	function update(){
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

	  $upload_9=NULL;
	  if($_FILES['file_pemilik']['name'])
	  {
	    $this->load->library('upload');
	    $id_user=$this->session->userdata('id_user');
	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	    $config['upload_path'] = './assets/bukti/badan_usaha/peralatan';
	    $config['allowed_types'] = 'pdf|jpg|jpeg|png';
	    $config['overwrite'] = TRUE;
	    $config['file_name'] = $nmfile;
	    $this->upload->initialize($config);
	    if($this->upload->do_upload('file_pemilik')){
	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	      $alamat="./assets/bukti/badan_usaha/peralatan/";

	      $upload_9=$gbr['file_name'];
	      $data_npwp=array(
	        'persyaratan'=>$upload_9
	      );
	      $table='lsbu_peralatan';
	      $where_npwp=array(
	        'NIB'=>$nib,
					'id'=>$id
	      );
	      $this->Bu_model->update_edit($where_npwp,$table,$data_npwp);
	    }
	  }



	      $data=array(
					'jenis_peralatan'=>$this->security->xss_clean(trim($post['jenis'])),
					'tipe_peralatan'=>$this->security->xss_clean(trim($post['tipe'])),
					'sub_tipe_peralatan'=>$this->security->xss_clean(trim($post['sub_tipe'])),
					'tahun_pembuatan'=>$this->security->xss_clean(trim($post['tahun'])),
					'kapasitas'=>$this->security->xss_clean(trim($post['kapasitas'])),
					'kondisi'=>$this->security->xss_clean(trim($post['kondisi'])),
					'harga'=>$this->security->xss_clean(trim($post['harga'])),
 				 'propinsi'=>$this->security->xss_clean(trim($post['propinsi'])),
	      );
	      $table='lsbu_peralatan';
	      $where=array(
	        'NIB'=>$nib,
					'id'=>$id
	      );
	      $insert_sad=$this->Bu_model->update_edit($where,$table,$data);
	      if($insert_sad=="Success"){
	        $this->session->set_flashdata('title','Success');
	        $this->session->set_flashdata('text','Biodata Berhasil Di Input');
	        $this->session->set_flashdata('class', "success");
	        $this->output
	        ->set_content_type('application/json')
	        ->set_output(json_encode(array('result' => 1)));

	      }else{
	        $this->session->set_flashdata('title','Failed');
	        $this->session->set_flashdata('text','Biodata Gagal Di Input');
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
	function cek_nib(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->badan_usaha() OR $this->ion_auth->admin_pusat()){

	  $post = $this->input->post();

	  $nib=$this->security->xss_clean(trim($post['id']));
		$select="SELECT * FROM lsbu_bu";
		$where="WHERE NIB='$nib'";
		$record=$this->Bu_model->searching($select,$where);

	  $response = array(
	                  'record' =>$record,
	                );

	      echo json_encode($response);
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
		}elseif($this->ion_auth->badan_usaha() OR $this->ion_auth->admin_pusat()){

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

}
