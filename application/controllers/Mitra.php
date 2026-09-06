<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mitra extends CI_Controller
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
		}elseif($this->ion_auth->mitra()){
			$id_user=$this->session->userdata('id_user');
		$data=$this->Bu_model->list_pemantauan($id_user);
		$record=array();
		foreach ($data as $row) {
			if($row['status']=='20'){
				$deskripsi_status="Tinjauan";
			}elseif($row['status']=='10'){
				$deskripsi_status="Pembayaran";
			}elseif($row['status']=='30'){
				$deskripsi_status="Pembayaran";
			}elseif($row['status']=='31'){
				$deskripsi_status="Penilaian";
			}elseif($row['status']=='50'){
				$deskripsi_status="Terbit";
			}elseif($row['status']=='11'){
				$deskripsi_status="Dikembalikan";
			}elseif($row['status']=='90'){
				$deskripsi_status="Ditolak";
			}elseif($row['status']=='92'){
				$deskripsi_status="Dibatalkan";
			}elseif($row['status']=='91'){
				$deskripsi_status="Docabut";
			}
			else{
				$deskripsi_status="-";
			}
			$datax=array(
				'nama_bujk'=>$row['nama_bujk'],
				'nama_jenis'=>$row['nama_jenis'],
				'bentuk_nama'=>$row['bentuk_nama'],
				'status'=>$row['status'],
				'NIB'=>$row['NIB'],
				'id_izin'=>$row['id_izin'],
				'nama_propinsi'=>$row['nama_propinsi'],
				'id_sub_klasifikasi'=>$row['id_sub_klasifikasi'],
				'kualifikasi'=>$row['kualifikasi'],
				'stat'=>$deskripsi_status,
			);
			array_push($record,$datax);
		}
		$this->data = array(
			'record'=>$record,
		);
		$this->template->load('menu/menu','mitra', $this->data);

		}else{	$this->session->set_flashdata('title','Warning');
			$this->session->set_flashdata('text','Anda tidak memiliki akses');
			$this->session->set_flashdata('class', "warning");
			redirect('login','refresh');
		}
}
function import(){
	if (!$this->ion_auth->ceklogin())
	{
		$this->session->set_flashdata('title','Login Gagal');
		$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
		$this->session->set_flashdata('class', "warning");
		redirect('login', 'refresh');
	}
	$nib=$this->session->userdata('id_user');
	$this->data = array(
		'record'=>$this->Bu_model->get_user($nib)

	);
	$this->template->load('menu/menu','mitra/import', $this->data);

}
function cek(){
	if (!$this->ion_auth->ceklogin())
	{
		$this->session->set_flashdata('title','Login Gagal');
		$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
		$this->session->set_flashdata('class', "warning");
		redirect('login', 'refresh');
	}

	$post = $this->input->post();
	$nib=$this->security->xss_clean(trim($post['nib']));
	$record=$this->Bu_model->get_nib_mitra($nib);
	$id_user=$this->session->userdata('id_user');
	if(empty($record)){
		$status="200";
		$data=array(
			'Username'=>$id_user,
			'NIB'=>$nib,
		);
		$table='mitra_nib';
		$insert=$this->Bu_model->insert_sad($table,$data);
	}else{
		$status="201";
	}
	$response = array(

									'status'=>$status,


								);

			echo json_encode($response);
}
function get_detail_permohonan(){
  if (!$this->ion_auth->ceklogin())
  {
    $this->session->set_flashdata('title','Login Gagal');
    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
    $this->session->set_flashdata('class', "warning");
    redirect('login', 'refresh');
  }
  $post = $this->input->post();
  $id_izin=$this->security->xss_clean(trim($post['id_izin']));
  $record=$this->Bu_model->get_permohonan_masuk_3($id_izin);
  $nib=$record[0]['nib'];
  $sub_klasifikasi=$record[0]['id_sub_klasifikasi'];
	$tgl_permohonan=$record[0]['tgl_permohonan'];

  $data_status_90=$this->Bu_model->get_90_2($id_izin);
  if(empty($data_status_90)){

      $data_status_20=$this->Bu_model->get_20($nib,$sub_klasifikasi,$id_izin);
      if(!empty($data_status_20)){
        $data_20=$data_status_20[0]['status_0'];
      }else{
        $data_20="FALSE";
      }

      $data_status_10=$this->Bu_model->get_10($nib,$sub_klasifikasi,$id_izin);
      if(!empty($data_status_10)){
        $data_10=$data_status_10[0]['status_1'];
      }else{
        $data_10="FALSE";
      }

      $data_status_30=$this->Bu_model->get_30($nib,$sub_klasifikasi,$id_izin);
      if(!empty($data_status_30)){
        $data=$data_status_30[0]['file_perjanjian'];
        $data_30=substr($data,0,10);
      }else{
        $data_30="FALSE";
      }

      $data_status_11=$this->Bu_model->get_11($nib,$tgl_permohonan);
      if(!empty($data_status_11)){
        $data_11=$data_status_11;
      }else{
        $data_11="FALSE";
      }

      $data_status_31=$this->Bu_model->get_31($nib,$sub_klasifikasi,$id_izin);
      if(!empty($data_status_31)){
        $data_31=$data_status_31[0]['tgl_biaya'];
      }else{
        $data_31="FALSE";
      }
      $data_status_50=$this->Bu_model->get_50($nib,$sub_klasifikasi,$id_izin);
      if(!empty($data_status_50)){
        $data_50=$data_status_50[0]['status_2'];
      }else{
        $data_50="FALSE";
      }
      $data_90="FALSE";
  }else{
		$data_status_11=$this->Bu_model->get_11($nib,$sub_klasifikasi);
		if(!empty($data_status_11)){
			$data_11=$data_status_11;
		}else{
			$data_11="FALSE";
		}
		$data_20="FALSE";
		$data_10="FALSE";
		$data_30="FALSE";
		$data_31="FALSE";
		$data_50="FALSE";
		$data_90="FALSE";
  }

  $data_record=array(
    'data_20'=>$data_20,
    'data_10'=>$data_10,
    'data_30'=>$data_30,
    'data_11'=>$data_11,
    'data_31'=>$data_31,
    'data_50'=>$data_50,
    'data_90'=>$data_90,
  );
  echo json_encode($data_record);
}





}
?>
