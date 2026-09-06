<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengalaman extends CI_Controller
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
		$id=$this->security->xss_clean(trim($post['sub']));
		$id2=$this->security->xss_clean(trim($post['id2']));
		$rec=$this->Bu_model->detele_pengalaman($nib,$id,$id2);
		if($rec=='Success'){
			$this->session->set_flashdata('title','Success');
			$this->session->set_flashdata('text','Data berhasil dihapus');
			$this->session->set_flashdata('class', "success");
			redirect('pengalaman','refresh');
		}else{
			$this->session->set_flashdata('title','Failed');
			$this->session->set_flashdata('text','Data gagal dihapus');
			$this->session->set_flashdata('class', "warning");
			redirect('pengalaman','refresh');
		}
		}else{
			$this->session->set_flashdata('title','Warning');
			$this->session->set_flashdata('text','Anda tidak memiliki akses');
			$this->session->set_flashdata('class', "warning");
			redirect('login','refresh');
		}
	}

	function search_pengalaman(){
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
		$select="SELECT * FROM lsbu_pengalaman";
		$where="WHERE nomor_kontrak='$id' AND NIB='$nib'";
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

		$nib=$this->session->userdata('id_user');

		$propinsi=$this->Bu_model->provinsi();
    $kabupaten=$this->Bu_model->kabupaten();
		$id=$this->Bu_model->biodata_search($nib);
		if($id[0]['sifat_usaha']=="1"){
			$sifat_usaha="1";
		}else{
			$sifat_usaha="2";
		}
		$this->data = array(
	    'propinsi'=>$propinsi,
	    'klasifikasi'=>$this->Bu_model->klasifikasi_bu_2020_sifat_usaha($sifat_usaha),
	    'sumber_dana'=>$this->Bu_model->sumber_dana(),
	    'status_kontrak'=>$this->Bu_model->status_kontrak(),
	    'record'=>$this->Bu_model->pengalaman_opr($nib),
	  );
    $this->template->load('menu/menu','bu/pengalaman', $this->data);
	}else{
		$this->session->set_flashdata('title','Warning');
		$this->session->set_flashdata('text','Anda tidak memiliki akses');
		$this->session->set_flashdata('class', "warning");
		redirect('login','refresh');
	}
	}

	function edit_pengalaman($id2,$id3){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->badan_usaha()){

	    $id_bu=$this->session->userdata('id_bu');

	      $propinsi=$this->Bu_model->provinsi();
	      $kabupaten=$this->Bu_model->kabupaten();

	    $id=$this->Bu_model->jenis_usaha_kbli($id_bu);
	    if($id[0]['ID_Jenis_BU_kbli']=="0" OR $id[0]['ID_Jenis_BU_kbli']=="5"){
	      $jenis_klasifikasi="0";
	    }else{
	      $jenis_klasifikasi="1";
	    }

	  $sub_klas=decrypt_url($id2);
	  $nilai_kontrak=decrypt_url($id3);
	  $id_bu=$this->session->userdata('id_bu');
	  $this->data = array(
	    'id'=>$id2,
	    'id2'=>$id3,
	    'propinsi'=>$propinsi,
	    'asosiasi'=>$this->Bu_model->asosiasi(),
	    'klasifikasi'=>$this->Bu_model->klasifikasi_bu_2($jenis_klasifikasi),
	    'sumber_dana'=>$this->Bu_model->sumber_dana(),
	    'status_kontrak'=>$this->Bu_model->status_kontrak(),
	    'pengalaman'=>$this->Bu_model->pengalaman_search($id_bu,$nilai_kontrak,$sub_klas),
	  );
	  $this->template->load('menu/menu','bu/edit_pengalaman', $this->data);
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
		}elseif( $this->ion_auth->badan_usaha()){

	  $post = $this->input->post();
	  $nib=$this->session->userdata('id_user');
		$nilai_kontrak=$this->security->xss_clean(trim($post['nilai_kontrak']));
		$sub_klas=$this->security->xss_clean(trim($post['sub_klasifikasi']));
	  $upload_32=NULL;
	  if($_FILES['file_rekaman']['name'])
	  {
	    $this->load->library('upload');
	    $id_user=$this->session->userdata('id_user');
	    $nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	    $config32['upload_path'] = './assets/bukti/badan_usaha/32_pengalaman_bu';
	    $config32['allowed_types'] = 'pdf|jpg|jpeg|png';
	    $config32['overwrite'] = TRUE;
	    $config32['file_name'] = $nmfile;
	    $this->upload->initialize($config32);
	    if($this->upload->do_upload('file_rekaman')){
	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	      $alamat="./assets/bukti/badan_usaha/32_pengalaman_bu/";

	      $upload_32=$gbr['file_name'];
	      $data_peng=array(
	        'persyaratan_32'=>$upload_32
	      );
	      $table='lsbu_pengalaman';
	      $where_peng=array(
	        'NIB'=>$nib,
	        'id_sub_klasifikasi'=>$sub_klas,
	        'nilai_kontrak'=>$nilai_kontrak
	      );
	      $this->Bu_model->update_edit($where_peng,$table,$data_peng);

	    }
	  }else{
	    $upload_32="NULL";
	  }

	  //----------------------------------

	  $upload_34=NULL;
	  if($_FILES['file_pho']['name'])
	  {
	    $this->load->library('upload');
	    $id_user=$this->session->userdata('id_user');
	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	    $config34['upload_path'] = './assets/bukti/badan_usaha/34_rekaman_pho';
	    $config34['allowed_types'] = 'pdf|jpg|jpeg|png';
	    $config34['overwrite'] = TRUE;
	    $config34['file_name'] = $nmfile;
	    $this->upload->initialize($config34);
	    if($this->upload->do_upload('file_pho')){
	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	      $alamat="./assets/bukti/badan_usaha/34_rekaman_pho/";

	      $upload_34=$gbr['file_name'];
	      $data_rek=array(
	        'persyaratan_34'=>$upload_34
	      );
	      $table='lsbu_pengalaman';
	      $where_rek=array(
	        'NIB'=>$nib,
	        'id_sub_klasifikasi'=>$sub_klas,
	        'nilai_kontrak'=>$nilai_kontrak
	      );
	      $this->Bu_model->update_edit($where_rek,$table,$data_rek);

	    }
	  }else{
	    $upload_34="NULL";
	  }

	  $upload_35=NULL;
	  if($_FILES['file_pajak']['name'])
	  {
	    $this->load->library('upload');
	    $id_user=$this->session->userdata('id_user');
	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	    $config35['upload_path'] = './assets/bukti/badan_usaha/35_faktur_pajak_ppn';
	    $config35['allowed_types'] = 'pdf|jpg|jpeg|png';
	    $config35['overwrite'] = TRUE;
	    $config35['file_name'] = $nmfile;
	    $this->upload->initialize($config35);
	    if($this->upload->do_upload('file_pajak')){
	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	      $alamat="./assets/bukti/badan_usaha/35_faktur_pajak_ppn/";

	      $upload_35=$gbr['file_name'];
	      $data_fak=array(
	        'persyaratan_35'=>$upload_35
	      );
	      $table='lsbu_pengalaman';
	      $where_fak=array(
	        'NIB'=>$nib,
	        'id_sub_klasifikasi'=>$sub_klas,
	        'nilai_kontrak'=>$nilai_kontrak
	      );
	      $this->Bu_model->update_edit($where_fak,$table,$data_fak);

	    }
	  }else{
	    $upload_35="NULL";
	  }

	  $upload_36=NULL;
	  if($_FILES['file_kontrak']['name'])
	  {
	    $this->load->library('upload');
	    $id_user=$this->session->userdata('id_user');
	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	    $config36['upload_path'] = './assets/bukti/badan_usaha/36_surat_pernyataan_pecah_kontrak';
	    $config36['allowed_types'] = 'pdf|jpg|jpeg|png';
	    $config36['overwrite'] = TRUE;
	    $config36['file_name'] = $nmfile;
	    $this->upload->initialize($config36);
	    if($this->upload->do_upload('file_kontrak')){
	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	      $alamat="./assets/bukti/badan_usaha/36_surat_pernyataan_pecah_kontrak/";

	      $upload_36=$gbr['file_name'];
	      $data_sur=array(
	        'persyaratan_36'=>$upload_36
	      );
	      $table='lsbu_pengalaman';
	      $where_sur=array(
	        'NIB'=>$nib,
	        'id_sub_klasifikasi'=>$sub_klas,
	        'nilai_kontrak'=>$nilai_kontrak
	      );
	      $this->Bu_model->update_edit($where_sur,$table,$data_sur);

	    }
	  }else{
	    $upload_36="NULL";
	  }

	    if (!empty($upload_32) AND !empty($upload_34) AND !empty($upload_35) AND !empty($upload_36))
	    {
	        $data=array(
	          'nomor_kontrak'=>$this->security->xss_clean(trim($post['nomer_kontrak'])),
	          'nama_pengalaman'=>$this->security->xss_clean(trim($post['nama_paket'])),

	          'id_klasifikasi'=>$this->security->xss_clean(trim($post['klasifikasi'])),
	          'id_sub_klasifikasi'=>$this->security->xss_clean(trim($post['sub_klasifikasi'])),
	          'nilai_kontrak'=>str_replace('.', '', $this->security->xss_clean(trim($post['nilai_kontrak']))),
	          'id_status_kontrak'=>$this->security->xss_clean(trim($post['status_kontrak'])),
	          'nomor_ba_serah_terima'=>$this->security->xss_clean(trim($post['nomor_ba'])),
	          'tgl_ba_serah_terima'=>$this->security->xss_clean(trim($post['tgl_terima'])),
	          'tgl_kontrak'=>$this->security->xss_clean(trim($post['tgl_kontrak'])),
	          'tgl_mulai'=>$this->security->xss_clean(trim($post['tgl_mulai'])),
	          'tgl_selesai'=>$this->security->xss_clean(trim($post['tgl_selesai'])),
	          'tahun'=>$this->security->xss_clean(trim($post['tahun'])),
	          'pemberi_tugas'=>$this->security->xss_clean(trim($post['pemberi_tugas'])),
	          'id_propinsi'=>$this->security->xss_clean(trim($post['propinsi'])),
	          'id_sumber_dana'=>$this->security->xss_clean(trim($post['sumber_dana'])),
						'no_addendum_kontrak'=>$this->security->xss_clean(trim($post['addendum_kontrak'])),
 					 'tgl_addendum_kontrak'=>$this->security->xss_clean(trim($post['tgl_addendum_kontrak'])),
 					 'nilai_addendum_kontrak'=>$this->security->xss_clean(trim($post['nilai_addendum_kontrak'])),
 					 'cidera_janji'=>$this->security->xss_clean(trim($post['cidera_janji'])),
 					 'perselisihan'=>$this->security->xss_clean(trim($post['perselisihan'])),
 					 'anggaran_biaya'=>$this->security->xss_clean(trim($post['anggaran_biaya'])),
 					 'partner'=>$this->security->xss_clean(trim($post['partner'])),
 					 'nama_sub_kontrak'=>$this->security->xss_clean(trim($post['nama_sub_kontrak'])),
 					 'nilai_sub_kontrak'=>$this->security->xss_clean(trim($post['nilai_sub_kontrak'])),
 					 'nomor_pho'=>$this->security->xss_clean(trim($post['nomor_pho'])),
 					 'tgl_pho'=>$this->security->xss_clean(trim($post['tgl_pho'])),
 					 'nomor_fho'=>$this->security->xss_clean(trim($post['nomor_fho'])),
 					 'tgl_fho'=>$this->security->xss_clean(trim($post['tgl_fho'])),
	          'id_user'=>$this->session->userdata('id_user'),
	          'kunci'=>'',
	        );
	        $where_sur=array(
	          'NIB'=>$nib,
	          'id_sub_klasifikasi'=>$sub_klas,
	          'nilai_kontrak'=>$nilai_kontrak
	        );
	        $table='lsbu_pengalaman';
	        $insert=$this->Bu_model->update_edit($where_sur,$table,$data);

	      if($insert=="Success"){
	        $this->session->set_flashdata('title','Success');
	        $this->session->set_flashdata('text','Pengalaman Berhasil Di Input');
	        $this->session->set_flashdata('class', "success");
	        $this->output
	        ->set_content_type('application/json')
	        ->set_output(json_encode(array('result' => 1)));
	      }else{
	        $this->session->set_flashdata('title','Failed');
	        $this->session->set_flashdata('text','Pengalaman Gagal Di Input');
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

	  $upload_32=NULL;
	  if($_FILES['file_rekaman']['name'])
	  {
	    $this->load->library('upload');
	    $id_user="coba";
	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	    $config32['upload_path'] = './assets/bukti/badan_usaha/32_pengalaman_bu';
	    $config32['allowed_types'] = 'pdf|jpg|jpeg|png';
	    $config32['overwrite'] = TRUE;
	    $config32['file_name'] = $nmfile;
	    $this->upload->initialize($config32);
	    if($this->upload->do_upload('file_rekaman')){
	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	      $alamat="./assets/bukti/badan_usaha/32_pengalaman_bu/";

	      $upload_32=$gbr['file_name'];

	    }
	  }else{
	    $upload_32="NULL";
	  }

	  //----------------------------------

	  $upload_34=NULL;
	  if($_FILES['file_pho']['name'])
	  {
	    $this->load->library('upload');
	    $id_user="coba";
	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	    $config34['upload_path'] = './assets/bukti/badan_usaha/34_rekaman_pho';
	    $config34['allowed_types'] = 'pdf|jpg|jpeg|png';
	    $config34['overwrite'] = TRUE;
	    $config34['file_name'] = $nmfile;
	    $this->upload->initialize($config34);
	    if($this->upload->do_upload('file_pho')){
	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	      $alamat="./assets/bukti/badan_usaha/34_rekaman_pho/";

	      $upload_34=$gbr['file_name'];
	    }
	  }else{
	    $upload_34="NULL";
	  }

	  $upload_35=NULL;
	  if($_FILES['file_pajak']['name'])
	  {
	    $this->load->library('upload');
	    $id_user="coba";
	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	    $config35['upload_path'] = './assets/bukti/badan_usaha/35_faktur_pajak_ppn';
	    $config35['allowed_types'] = 'pdf|jpg|jpeg|png';
	    $config35['overwrite'] = TRUE;
	    $config35['file_name'] = $nmfile;
	    $this->upload->initialize($config35);
	    if($this->upload->do_upload('file_pajak')){
	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	      $alamat="./assets/bukti/badan_usaha/35_faktur_pajak_ppn/";

	      $upload_35=$gbr['file_name'];
	    }
	  }else{
	    $upload_35="NULL";
	  }

	  $upload_36=NULL;
	  if($_FILES['file_kontrak']['name'])
	  {
	    $this->load->library('upload');
	    $id_user="coba";
	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	    $config36['upload_path'] = './assets/bukti/badan_usaha/36_surat_pernyataan_pecah_kontrak';
	    $config36['allowed_types'] = 'pdf|jpg|jpeg|png';
	    $config36['overwrite'] = TRUE;
	    $config36['file_name'] = $nmfile;
	    $this->upload->initialize($config36);
	    if($this->upload->do_upload('file_kontrak')){
	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	      $alamat="./assets/bukti/badan_usaha/36_surat_pernyataan_pecah_kontrak/";

	      $upload_36=$gbr['file_name'];
	    }
	  }else{
	    $upload_36="NULL";
	  }

	    if (!empty($upload_32) AND !empty($upload_34) AND !empty($upload_35) AND !empty($upload_36))
	    {
	        $data=array(
	          'NIB'=>$this->session->userdata('id_user'),
	          'nomor_kontrak'=>$this->security->xss_clean(trim($post['nomer_kontrak'])),
	          'nama_pengalaman'=>$this->security->xss_clean(trim($post['nama_paket'])),

	          'id_klasifikasi'=>$this->security->xss_clean(trim($post['klasifikasi'])),
	          'id_sub_klasifikasi'=>$this->security->xss_clean(trim($post['sub_klasifikasi'])),
	          'nilai_kontrak'=>str_replace('.', '', $this->security->xss_clean(trim($post['nilai_kontrak']))),
	          'id_status_kontrak'=>$this->security->xss_clean(trim($post['status_kontrak'])),
	          'nomor_ba_serah_terima'=>$this->security->xss_clean(trim($post['nomor_ba'])),
	          'tgl_ba_serah_terima'=>$this->security->xss_clean(trim($post['tgl_terima'])),
	          'tgl_kontrak'=>$this->security->xss_clean(trim($post['tgl_kontrak'])),
	          'tgl_mulai'=>$this->security->xss_clean(trim($post['tgl_mulai'])),
	          'tgl_selesai'=>$this->security->xss_clean(trim($post['tgl_selesai'])),
	          'tahun'=>$this->security->xss_clean(trim($post['tahun'])),
	          'pemberi_tugas'=>$this->security->xss_clean(trim($post['pemberi_tugas'])),
	          'id_propinsi'=>$this->security->xss_clean(trim($post['propinsi'])),
	          'id_sumber_dana'=>$this->security->xss_clean(trim($post['sumber_dana'])),
						'no_addendum_kontrak'=>$this->security->xss_clean(trim($post['addendum_kontrak'])),
 					 'tgl_addendum_kontrak'=>$this->security->xss_clean(trim($post['tgl_addendum_kontrak'])),
 					 'nilai_addendum_kontrak'=>$this->security->xss_clean(trim($post['nilai_addendum_kontrak'])),
 					 'cidera_janji'=>$this->security->xss_clean(trim($post['cidera_janji'])),
 					 'perselisihan'=>$this->security->xss_clean(trim($post['perselisihan'])),
 					 'anggaran_biaya'=>$this->security->xss_clean(trim($post['anggaran_biaya'])),
 					 'partner'=>$this->security->xss_clean(trim($post['partner'])),
 					 'nama_sub_kontrak'=>$this->security->xss_clean(trim($post['nama_sub_kontrak'])),
 					 'nilai_sub_kontrak'=>$this->security->xss_clean(trim($post['nilai_sub_kontrak'])),
 					 'nomor_pho'=>$this->security->xss_clean(trim($post['nomor_pho'])),
 					 'tgl_pho'=>$this->security->xss_clean(trim($post['tgl_pho'])),
 					 'nomor_fho'=>$this->security->xss_clean(trim($post['nomor_fho'])),
 					 'tgl_fho'=>$this->security->xss_clean(trim($post['tgl_fho'])),
 					 'id_user'=>$this->session->userdata('id_user'),
	          'kunci'=>'',
	          'persyaratan_32'=>$upload_32,
	          'persyaratan_34'=>$upload_34,
	          'persyaratan_35'=>$upload_35,
	          'persyaratan_36'=>$upload_36,
	        );

	      $table='lsbu_pengalaman';
	      $insert=$this->Bu_model->insert_sad($table,$data);
	      if($insert=="Success"){
	        $this->session->set_flashdata('title','Success');
	        $this->session->set_flashdata('text','Pengalaman Berhasil Di Input');
	        $this->session->set_flashdata('class', "success");
	        $this->output
	        ->set_content_type('application/json')
	        ->set_output(json_encode(array('result' => 1)));
						redirect('pengalaman','refresh');
	      }else{
	        $this->session->set_flashdata('title','Failed');
	        $this->session->set_flashdata('text','Pengalaman Gagal Di Input');
	        $this->session->set_flashdata('class', "error");
	        $this->output
	        ->set_content_type('application/json')
	        ->set_output(json_encode(array('result' => 1)));
					redirect('pengalaman','refresh');

	      }
	    }else{
	      $this->session->set_flashdata('title','Failed');
	      $this->session->set_flashdata('text','Persyaratan Gagal Diupload');
	      $this->session->set_flashdata('class', "bg-danger");
	      $this->output
	      ->set_content_type('application/json')
	      ->set_output(json_encode(array('result' => 2)));
				redirect('pengalaman','refresh');

	    }
		}else{
			$this->session->set_flashdata('title','Warning');
			$this->session->set_flashdata('text','Anda tidak memiliki akses');
			$this->session->set_flashdata('class', "warning");
			redirect('login','refresh');
		}
	}

	function sub_klasifikasi(){
		$post = $this->input->post();
		$id_klasifikasi=$post['id_klasifikasi'];
		$select="SELECT * FROM lsbu_klasifikasi_sub_kbli";
		$where="WHERE klasifikasi='$id_klasifikasi'";
		$record=$this->Bu_model->searching($select,$where);
		$response = array(
										'record' =>$record
									);

				echo json_encode($response);
	}

}
