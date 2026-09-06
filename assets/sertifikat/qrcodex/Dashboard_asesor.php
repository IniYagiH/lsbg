<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_asesor extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('bu/Bu_model');
		$this->load->helper(array('url','html','file','form','security'));
		$this->load->library(array('ion_auth','form_validation','Template','pagination'));
		$this->load->model('User_model');
		$this->load->helper('Ssl');
	}


	function index(){
	  if (!$this->ion_auth->ceklogin())
	  {
	    $this->session->set_flashdata('title','Login Gagal');
	    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
	    $this->session->set_flashdata('class', "warning");
	    redirect('login', 'refresh');
	  }elseif($this->ion_auth->asesor()){
	  $data=$this->Bu_model->list_record_asesor();
		$id_user=$this->session->userdata('id_user');

	  $record=array();
		foreach ($data as $row) {
			$status='0';
			if($row['id_asesor']!=NULL){
				$status='1';
			}
			if($row['final']=='0'){
				$status='2';
			}
			if($row['final']=='1'){
				$status='3';
			}
			if($row['comment_asesor']!=NULL AND $row['final']=='0'){
				$status='4';
			}

			if($row['comment_asesor']!=NULL AND $row['final']=='1'){
				$status='5';
			}

			$datax=array(
				'tgl_penilaian'=>$row['tgl_penilaian'],
				'final'=>$row['final'],
				'nama_propinsi'=>$row['nama_propinsi'],
				'bentuk_usaha'=>$row['bentuk_usaha'],
				'tglupdate'=>$row['tglupdate'],
				'jenis_usaha'=>$row['jenis_usaha'],
				'biaya_lsbu'=>$row['biaya_lsbu'],
				'status_0'=>$row['status_0'],
				'concat_sub'=>$row['id_sub_klasifikasi'],
				'concat_klasifikasi'=>$row['id_klasifikasi'],
				'concat_kualifikasi'=>$row['kualifikasi'],
				'nama'=>$row['nama'],
				'NIB'=>$row['NIB'],
				'tgl_permohonan'=>$row['tgl_permohonan'],
				'propinsi'=>$row['concat_sub'],
				'tahun'=>$row['tahun'],
				'status_1'=>$row['status_1'],
				'status_2'=>$row['status_2'],
				'status_3'=>$row['status_3'],
				'status'=>$status,
				'file_pembayaran'=>$row['file_pembayaran'],
				'file_perjanjian'=>$row['file_perjanjian'],
				'user'=>$id_user
			);

				array_push($record,$datax);


		}


	  $this->data = array(
	    'record'=>$record,

	  );
	  $this->template->load('menu/menu','dashboard_asesor', $this->data);
	}else{
	  $this->session->set_flashdata('title','Warning');
	  $this->session->set_flashdata('text','Anda tidak memiliki akses');
	  $this->session->set_flashdata('class', "warning");
	  redirect('login','refresh');
	}
	}

	function selesai(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->asesor()){
		$data=$this->Bu_model->list_record_asesor_selesai();
		$id_user=$this->session->userdata('id_user');

		$record=array();
		foreach ($data as $row) {
			$status='0';
			if($row['id_asesor']!=NULL){
				$status='1';
			}
			if($row['final']=='0'){
				$status='2';
			}
			if($row['final']=='1'){
				$status='3';
			}
			if($row['comment_asesor']!=NULL AND $row['final']=='0'){
				$status='4';
			}

			if($row['comment_asesor']!=NULL AND $row['final']=='1'){
				$status='5';
			}

			$datax=array(
				'tgl_penilaian'=>$row['tgl_penilaian'],
				'final'=>$row['final'],
				'nama_propinsi'=>$row['nama_propinsi'],
				'bentuk_usaha'=>$row['bentuk_usaha'],
				'tglupdate'=>$row['tglupdate'],
				'jenis_usaha'=>$row['jenis_usaha'],
				'biaya_lsbu'=>$row['biaya_lsbu'],
				'status_0'=>$row['status_0'],
				'concat_sub'=>$row['concat_sub'],
				'concat_klasifikasi'=>$row['concat_klasifikasi'],
				'concat_kualifikasi'=>$row['concat_kualifikasi'],
				'nama'=>$row['nama'],
				'NIB'=>$row['NIB'],
				'tgl_permohonan'=>$row['tgl_permohonan'],
				'propinsi'=>$row['concat_sub'],
				'tahun'=>$row['tahun'],
				'status_1'=>$row['status_1'],
				'status_2'=>$row['status_2'],
				'status_3'=>$row['status_3'],
				'status'=>$status,
				'file_pembayaran'=>$row['file_pembayaran'],
				'file_perjanjian'=>$row['file_perjanjian'],
				'user'=>$id_user
			);

				array_push($record,$datax);


		}


		$this->data = array(
			'record'=>$record,

		);
		$this->template->load('menu/menu','dashboard_asesor_selesai', $this->data);
	}else{
		$this->session->set_flashdata('title','Warning');
		$this->session->set_flashdata('text','Anda tidak memiliki akses');
		$this->session->set_flashdata('class', "warning");
		redirect('login','refresh');
	}
	}

	function search(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->asesor()){
		$data=$this->Bu_model->list_search();
		$id_user=$this->session->userdata('id_user');

		$record=array();
		foreach ($data as $row) {
			$status='0';
			if($row['id_asesor']!=NULL){
				$status='1';
			}
			if($row['final']=='0'){
				$status='2';
			}
			if($row['final']=='1'){
				$status='3';
			}
			if($row['comment_asesor']!=NULL AND $row['final']=='0'){
				$status='4';
			}

			if($row['comment_asesor']!=NULL AND $row['final']=='1'){
				$status='5';
			}

			$datax=array(
				'tgl_penilaian'=>$row['tgl_penilaian'],
				'final'=>$row['final'],
				'nama_propinsi'=>$row['nama_propinsi'],
				'bentuk_usaha'=>$row['bentuk_usaha'],
				'tglupdate'=>$row['tglupdate'],
				'jenis_usaha'=>$row['jenis_usaha'],
				'biaya_lsbu'=>$row['biaya_lsbu'],
				'status_0'=>$row['status_0'],
				'concat_sub'=>$row['concat_sub'],
				'concat_klasifikasi'=>$row['concat_klasifikasi'],
				'concat_kualifikasi'=>$row['concat_kualifikasi'],
				'nama'=>$row['nama'],
				'NIB'=>$row['NIB'],
				'tgl_permohonan'=>$row['tgl_permohonan'],
				'propinsi'=>$row['concat_sub'],
				'tahun'=>$row['tahun'],
				'status_1'=>$row['status_1'],
				'status_2'=>$row['status_2'],
				'status_3'=>$row['status_3'],
				'status'=>$status,
				'file_pembayaran'=>$row['file_pembayaran'],
				'file_perjanjian'=>$row['file_perjanjian'],
				'user'=>$id_user
			);

				array_push($record,$datax);


		}


		$this->data = array(
			'record'=>$record,

		);
		$this->template->load('menu/menu','dashboard_asesor_search', $this->data);
	}else{
		$this->session->set_flashdata('title','Warning');
		$this->session->set_flashdata('text','Anda tidak memiliki akses');
		$this->session->set_flashdata('class', "warning");
		redirect('login','refresh');
	}
	}


}
?>
