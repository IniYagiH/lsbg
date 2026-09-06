<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Administrasi extends CI_Controller
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
			'sifat_usaha'=>$this->Bu_model->sifat_usaha(),
			'jenis_usaha'=>$this->Bu_model->jenis_usaha(),
			'klasifikasi_jenis_usaha'=>$this->Bu_model->klasifikasi_jenis_usaha(),
			'propinsi'=>$propinsi,
			'kabupaten'=>$kabupaten,
			'record'=>$this->Bu_model->biodata_opr($id_bu)
    );
    $this->template->load('menu/menu','bu/administrasi', $this->data);
	}else{
		$this->session->set_flashdata('title','Warning');
		$this->session->set_flashdata('text','Anda tidak memiliki akses');
		$this->session->set_flashdata('class', "warning");
		redirect('login','refresh');
	}
	}



	function delete(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->badan_usaha()){
		$nib=$this->session->userdata('id_user');
		$rec=$this->Bu_model->detele_administrasi($nib);
		if($rec=='Success'){
			$this->session->set_flashdata('title','Success');
			$this->session->set_flashdata('text','Data berhasil dihapus');
			$this->session->set_flashdata('class', "success");
			redirect('administrasi','refresh');
		}else{
			$this->session->set_flashdata('title','Failed');
			$this->session->set_flashdata('text','Data gagal dihapus');
			$this->session->set_flashdata('class', "warning");
			redirect('administrasi','refresh');
		}
		}else{
			$this->session->set_flashdata('title','Warning');
			$this->session->set_flashdata('text','Anda tidak memiliki akses');
			$this->session->set_flashdata('class', "warning");
			redirect('login','refresh');
		}
	}
	function edit_administrasi(){
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

	  $status='99';
	$this->data = array(
	  'cek'=>$this->Bu_model->cek_2($id_bu,$status),
	  'bentuk_usaha'=>$this->Bu_model->bentuk_usaha(),
	  'jenis_usaha'=>$this->Bu_model->jenis_usaha(),
	  'kategory_bu'=>$this->Bu_model->kategori_bu(),
	  'propinsi'=>$propinsi,
	  'kabupaten'=>$kabupaten,
	  'biodata'=>$this->Bu_model->biodata($id_bu)
	);
	  $this->template->load('menu/menu','bu/edit_administrasi', $this->data);
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



	  $url=base_url()."assets/bukti/badan_usaha/bukti_biodata/".date("Y-m-d_h:i:sa");
	  $table_upload='bu_persyaratan';
	  $upload_9=NULL;
	  if($_FILES['file_npwp']['name'])
	  {
	    $this->load->library('upload');
	    $id_user=$this->session->userdata('id_user');
	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	    $config['upload_path'] = './assets/bukti/badan_usaha/9_npwp_perusahaan';
	    $config['allowed_types'] = 'pdf|jpg|jpeg|png';
	    $config['overwrite'] = TRUE;
	    $config['file_name'] = $nmfile;
	    $this->upload->initialize($config);
	    if($this->upload->do_upload('file_npwp')){
	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	      $alamat="./assets/bukti/badan_usaha/9_npwp_perusahaan/";
	      if($file_ext=='png' OR $file_ext=='jpg' OR $file_ext=='jpeg'){
	        $this->watermarkImages($alamat,$filename);
	      }/*elseif($file_ext=='pdf'){
	        $alamat2='/assets/bukti/badan_usaha/9_npwp_perusahaan/';
	        $this->watermarkPdf($alamat2,$filename);
	      }*/
	      $upload_9=$gbr['file_name'];
	    }
	  }else{
	    $upload_9="NULL";
	  }



	  $upload_11=NULL;
	  if($_FILES['file_domisili']['name'])
	  {
	    $this->load->library('upload');
	    $id_user=$this->session->userdata('id_user');
	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	    $config11['upload_path'] = './assets/bukti/badan_usaha/11_surat_keterangan_domisili';
	    $config11['allowed_types'] = 'pdf|jpg|jpeg|png';
	    $config11['overwrite'] = TRUE;
	    $config11['file_name'] = $nmfile;
	    $this->upload->initialize($config11);
	    if($this->upload->do_upload('file_domisili')){
	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	      $alamat="./assets/bukti/badan_usaha/11_surat_keterangan_domisili/";
	      if($file_ext=='png' OR $file_ext=='jpg' OR $file_ext=='jpeg'){
	        $this->watermarkImages($alamat,$filename);
	      }/*elseif($file_ext=='pdf'){
	        $alamat2='/assets/bukti/badan_usaha/11_surat_keterangan_domisili/';
	        $this->watermarkPdf($alamat2,$filename);
	      }*/
	      $upload_11=$gbr['file_name'];
	    }
	  }else{
	    $upload_11="NULL";
	  }
	  $upload_13=NULL;
	  if($_FILES['file_penanam']['name'])
	  {
	    $this->load->library('upload');
	    $id_user=$this->session->userdata('id_user');
	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	    $config13['upload_path'] = './assets/bukti/badan_usaha/13_izin_bagi_penanam_modal';
	    $config13['allowed_types'] = 'pdf|jpg|jpeg|png';
	    $config13['overwrite'] = TRUE;
	    $config13['file_name'] = $nmfile;
	    $this->upload->initialize($config13);
	    if($this->upload->do_upload('file_penanam')){
	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	      $alamat="./assets/bukti/badan_usaha/13_izin_bagi_penanam_modal/";
	      if($file_ext=='png' OR $file_ext=='jpg' OR $file_ext=='jpeg'){
	        $this->watermarkImages($alamat,$filename);
	      }/*elseif($file_ext=='pdf'){
	        $alamat2='/assets/bukti/badan_usaha/13_izin_bagi_penanam_modal/';
	        $this->watermarkPdf($alamat2,$filename);
	      }*/
	      $upload_13=$gbr['file_name'];
	    }
	  }else{
	    $upload_13="NULL";
	  }


	  $upload_39=NULL;
	  if($_FILES['file_iso']['name'])
	  {
	    $this->load->library('upload');
	    $id_user=$this->session->userdata('id_user');
			$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	    $config39['upload_path'] = './assets/bukti/badan_usaha/39_sertifikat_iso';
	    $config39['allowed_types'] = 'pdf|jpg|jpeg|png';
	    $config39['overwrite'] = TRUE;
	    $config39['file_name'] = $nmfile;
	    $this->upload->initialize($config39);
	    if($this->upload->do_upload('file_iso')){
	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	      $alamat="./assets/bukti/badan_usaha/39_sertifikat_iso/";
	      if($file_ext=='png' OR $file_ext=='jpg' OR $file_ext=='jpeg'){
	        $this->watermarkImages($alamat,$filename);
	      }/*elseif($file_ext=='pdf'){
	        $alamat2='/assets/bukti/badan_usaha/39_sertifikat_iso/';
	        $this->watermarkPdf($alamat2,$filename);
	      }*/
	      $upload_39=$gbr['file_name'];
	    }
	  }else{
	    $upload_39="NULL";
	  }
		$upload_59=NULL;
	  if($_FILES['file_mutu']['name'])
	  {
	    $this->load->library('upload');
	    $id_user=$this->session->userdata('id_user');
			$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	    $config59['upload_path'] = './assets/bukti/badan_usaha/59_manajement_mutu';
	    $config59['allowed_types'] = 'pdf|jpg|jpeg|png';
	    $config59['overwrite'] = TRUE;
	    $config59['file_name'] = $nmfile;
	    $this->upload->initialize($config59);
	    if($this->upload->do_upload('file_mutu')){
	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	      $alamat="./assets/bukti/badan_usaha/59_manajement_mutu/";

	      $upload_59=$gbr['file_name'];
	    }
	  }else{
	    $upload_59="NULL";
	  }
		$upload_60=NULL;
	  if($_FILES['file_penyuapan']['name'])
	  {
	    $this->load->library('upload');
	    $id_user=$this->session->userdata('id_user');
			$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	    $config60['upload_path'] = './assets/bukti/badan_usaha/60_anti_penyuapan';
	    $config60['allowed_types'] = 'pdf|jpg|jpeg|png';
	    $config60['overwrite'] = TRUE;
	    $config60['file_name'] = $nmfile;
	    $this->upload->initialize($config60);
	    if($this->upload->do_upload('file_penyuapan')){
	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	      $alamat="./assets/bukti/badan_usaha/60_anti_penyuapan/";

	      $upload_60=$gbr['file_name'];
	    }
	  }else{
	    $upload_60="NULL";
	  }
		$nib=$this->session->userdata('id_user');

	        $sessionarray=array(
	          'nib'=>$nib,

	        );
	        $this->session->set_userdata($sessionarray);
	      $data=array(
	        'NIB'=>$nib,
	        'id_propinsi'=>$this->security->xss_clean(trim($post['propinsi'])),
					'id_kabupaten'=>$this->security->xss_clean(trim($post['kabupaten'])),
	        'nama'=>$this->security->xss_clean(trim($post['nama_bu'])),
					'klasifikasi_jenis_usaha'=>$this->security->xss_clean(trim($post['klasifikasi_jenis_usaha'])),
					'jenis_usaha'=>$this->security->xss_clean(trim($post['jenis_bu'])),
					'sifat_usaha'=>$this->security->xss_clean(trim($post['sifat_usaha'])),

					'alamat_bu'=>$this->security->xss_clean(trim($post['alamat'])),
	        'kodepos'=>$this->security->xss_clean(trim($post['kodepos'])),
	        'telepon'=>$this->security->xss_clean(trim($post['telepon'])),
	        'fax'=>$this->security->xss_clean(trim($post['faximili'])),
	        'email'=>$this->security->xss_clean(trim($post['email'])),
					'email_pic'=>$this->security->xss_clean(trim($post['email_pic'])),
	        'web'=>$this->security->xss_clean(trim($post['url'])),
	        'npwp'=>$this->security->xss_clean(trim($post['npwp'])),
	        'tgl_update'=>date("Y-m-d"),
	        'Username'=>$nib,
	        'negara_id'=>'ID',
	        'persyaratan_9'=>$upload_9,
	        'persyaratan_11'=>$upload_11,
	        'persyaratan_13'=>$upload_13,
	        'persyaratan_39'=>$upload_39,
					'persyaratan_59'=>$upload_59,
					'persyaratan_60'=>$upload_60,
	      );
	      $table='lsbu_bu';
	      $insert=$this->Bu_model->insert_sad($table,$data);
	      if($insert=="Success"){
	        $this->session->set_flashdata('title','Success');
	        $this->session->set_flashdata('text','Biodata Berhasil Di Input');
	        $this->session->set_flashdata('class', "success");
	        $this->output
	        ->set_content_type('application/json')
	        ->set_output(json_encode(array('result' => 1)));
					redirect('administrasi', 'refresh');
	      }else{
	        $this->session->set_flashdata('title','Failed');
	        $this->session->set_flashdata('text','Biodata Gagal Di Input');
	        $this->session->set_flashdata('class', "error");
	        $this->output
	        ->set_content_type('application/json')
	        ->set_output(json_encode(array('result' => 1)));
					redirect('administrasi', 'refresh');
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
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->badan_usaha()){

	  $post = $this->input->post();
	  $nib=$this->session->userdata('id_user');
	  //$kekayaan_bu=$this->security->xss_clean(trim($post['kekayaan_bu']));
	  //$modal_dasar=$this->security->xss_clean(trim($post['modal_dasar']));
	  $url=base_url()."assets/bukti/badan_usaha/bukti_biodata/".date("Y-m-d_h:i:sa");
	  $table_upload='lsbu_bu';
	  $upload_9=NULL;
	  if($_FILES['file_npwp']['name'])
	  {
	    $this->load->library('upload');
	    $id_user=$this->session->userdata('id_user');
	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	    $config['upload_path'] = './assets/bukti/badan_usaha/9_npwp_perusahaan';
	    $config['allowed_types'] = 'pdf|jpg|jpeg|png';
	    $config['overwrite'] = TRUE;
	    $config['file_name'] = $nmfile;
	    $this->upload->initialize($config);
	    if($this->upload->do_upload('file_npwp')){
	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	      $alamat="./assets/bukti/badan_usaha/9_npwp_perusahaan/";

	      $upload_9=$gbr['file_name'];
	      $data_npwp=array(
	        'persyaratan_9'=>$upload_9
	      );
	      $table='lsbu_bu';
	      $where_npwp=array(
	        'NIB'=>$nib
	      );
	      $this->Bu_model->update_edit($where_npwp,$table,$data_npwp);
	    }
	  }else{
	    $upload_9="NULL";
	  }


	  $upload_11=NULL;
	  if($_FILES['file_domisili']['name'])
	  {
	    $this->load->library('upload');
	    $id_user=$this->session->userdata('id_user');
	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	    $config11['upload_path'] = './assets/bukti/badan_usaha/11_surat_keterangan_domisili';
	    $config11['allowed_types'] = 'pdf|jpg|jpeg|png';
	    $config11['overwrite'] = TRUE;
	    $config11['file_name'] = $nmfile;
	    $this->upload->initialize($config11);
	    if($this->upload->do_upload('file_domisili')){
	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	      $alamat="./assets/bukti/badan_usaha/11_surat_keterangan_domisili/";

	      $upload_11=$gbr['file_name'];
	      $data_dom=array(
	        'persyaratan_11'=>$upload_11
	      );
	      $table='lsbu_bu';
	      $where_dom=array(
	        'NIB'=>$nib
	      );
	      $this->Bu_model->update_edit($where_dom,$table,$data_dom);
	    }
	  }else{
	    $upload_11="NULL";
	  }
	  $upload_13=NULL;
	  if($_FILES['file_penanam']['name'])
	  {
	    $this->load->library('upload');
	    $id_user=$this->session->userdata('id_user');
	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	    $config13['upload_path'] = './assets/bukti/badan_usaha/13_izin_bagi_penanam_modal';
	    $config13['allowed_types'] = 'pdf|jpg|jpeg|png';
	    $config13['overwrite'] = TRUE;
	    $config13['file_name'] = $nmfile;
	    $this->upload->initialize($config13);
	    if($this->upload->do_upload('file_penanam')){
	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	      $alamat="./assets/bukti/badan_usaha/13_izin_bagi_penanam_modal/";

	      $upload_13=$gbr['file_name'];
	      $data_mod=array(
	        'persyaratan_13'=>$upload_13
	      );
	      $table='lsbu_bu';
	      $where_mod=array(
	        'NIB'=>$nib
	      );
	      $this->Bu_model->update_edit($where_dom,$table,$data_mod);
	    }
	  }else{
	    $upload_13="NULL";
	  }

	  $upload_39=NULL;
	  if($_FILES['file_iso']['name'])
	  {
	    $this->load->library('upload');
	    $id_user=$this->session->userdata('id_user');
	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	    $config39['upload_path'] = './assets/bukti/badan_usaha/39_sertifikat_iso';
	    $config39['allowed_types'] = 'pdf|jpg|jpeg|png';
	    $config39['overwrite'] = TRUE;
	    $config39['file_name'] = $nmfile;
	    $this->upload->initialize($config39);
	    if($this->upload->do_upload('file_iso')){
	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	      $alamat="./assets/bukti/badan_usaha/39_sertifikat_iso/";

	      $upload_39=$gbr['file_name'];
	      $data_iso=array(
	        'persyaratan_39'=>$upload_39
	      );
	      $table='lsbu_bu';
	      $where_iso=array(
	        'NIB'=>$nib
	      );

	      $this->Bu_model->update_edit($where_iso,$table,$data_iso);
	    }
	  }else{
	    $upload_39="NULL";
	  }
		$upload_59=NULL;
	  if($_FILES['file_mutu']['name'])
	  {
	    $this->load->library('upload');
	    $id_user=$this->session->userdata('id_user');
			$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	    $config59['upload_path'] = './assets/bukti/badan_usaha/59_manajement_mutu';
	    $config59['allowed_types'] = 'pdf|jpg|jpeg|png';
	    $config59['overwrite'] = TRUE;
	    $config59['file_name'] = $nmfile;
	    $this->upload->initialize($config59);
	    if($this->upload->do_upload('file_mutu')){
	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	      $alamat="./assets/bukti/badan_usaha/59_manajement_mutu/";

	      $upload_59=$gbr['file_name'];
				$data_mutu=array(
	        'persyaratan_59'=>$upload_59
	      );
	      $table='lsbu_bu';
	      $where_mutu=array(
	        'NIB'=>$nib
	      );

	      $this->Bu_model->update_edit($where_mutu,$table,$data_mutu);
	    }
	  }else{
	    $upload_59="NULL";
	  }
		$upload_60=NULL;
	  if($_FILES['file_penyuapan']['name'])
	  {
	    $this->load->library('upload');
	    $id_user=$this->session->userdata('id_user');
			$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	    $config60['upload_path'] = './assets/bukti/badan_usaha/60_anti_penyuapan';
	    $config60['allowed_types'] = 'pdf|jpg|jpeg|png';
	    $config60['overwrite'] = TRUE;
	    $config60['file_name'] = $nmfile;
	    $this->upload->initialize($config60);
	    if($this->upload->do_upload('file_penyuapan')){
	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	      $alamat="./assets/bukti/badan_usaha/60_anti_penyuapan/";

	      $upload_60=$gbr['file_name'];
				$data_penyuapan=array(
	        'persyaratan_60'=>$upload_60
	      );
	      $table='lsbu_bu';
	      $where_penyuapan=array(
	        'NIB'=>$nib
	      );

	      $this->Bu_model->update_edit($where_penyuapan,$table,$data_penyuapan);
	    }
	  }else{
	    $upload_60="NULL";
	  }

	      $data=array(
				'id_propinsi'=>$this->security->xss_clean(trim($post['propinsi'])),
 				 'id_kabupaten'=>$this->security->xss_clean(trim($post['kabupaten'])),
 				 'nama'=>$this->security->xss_clean(trim($post['nama_bu'])),
 				 'klasifikasi_jenis_usaha'=>$this->security->xss_clean(trim($post['klasifikasi_jenis_usaha'])),
 				 'jenis_usaha'=>$this->security->xss_clean(trim($post['jenis_bu'])),
 				 'sifat_usaha'=>$this->security->xss_clean(trim($post['sifat_usaha'])),

 				 'alamat_bu'=>$this->security->xss_clean(trim($post['alamat'])),
 				 'kodepos'=>$this->security->xss_clean(trim($post['kodepos'])),
 				 'telepon'=>$this->security->xss_clean(trim($post['telepon'])),
 				 'fax'=>$this->security->xss_clean(trim($post['faximili'])),
 				 'email'=>$this->security->xss_clean(trim($post['email'])),
				 'email_pic'=>$this->security->xss_clean(trim($post['email_pic'])),
 				 'web'=>$this->security->xss_clean(trim($post['url'])),
 				 'npwp'=>$this->security->xss_clean(trim($post['npwp'])),
 				 'tgl_update'=>date("Y-m-d"),
 				 'Username'=>$nib,
 				 'negara_id'=>'ID',
	      );
	      $table='lsbu_bu';
	      $where=array(
	        'NIB'=>$nib
	      );
	      $insert_sad=$this->Bu_model->update_edit($where,$table,$data);
	      if($insert_sad=="Success"){
	        $this->session->set_flashdata('title','Success');
	        $this->session->set_flashdata('text','Biodata Berhasil Di Input');
	        $this->session->set_flashdata('class', "success");
	        $this->output
	        ->set_content_type('application/json')
	        ->set_output(json_encode(array('result' => 1)));
					redirect('administrasi', 'refresh');

	      }else{
	        $this->session->set_flashdata('title','Failed');
	        $this->session->set_flashdata('text','Biodata Gagal Di Input');
	        $this->session->set_flashdata('class', "error");
	        $this->output
	        ->set_content_type('application/json')
	        ->set_output(json_encode(array('result' => 1)));
					redirect('administrasi', 'refresh');

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
