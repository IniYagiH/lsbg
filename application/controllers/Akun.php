<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller
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
	function insert_pemutus(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat()){

		$post = $this->input->post();

				$data=array(
					'Username'=>$this->security->xss_clean(trim($post['username'])),
					'Password'=>substr(md5($this->input->post('password')),-6),
					'Nama'=>$this->security->xss_clean(trim($post['nama'])),
					'Email'=>$this->security->xss_clean(trim($post['email'])),
					'level'=>'6',
					'status_aktif'=>'1',

				);
				$table='user';
				$insert=$this->Bu_model->insert_sad($table,$data);
				if($insert=="Success"){
					$this->session->set_flashdata('title','Success');
					$this->session->set_flashdata('text','Pemutus Berhasil Di Input');
					$this->session->set_flashdata('class', "success");

					redirect('akun/pemutus', 'refresh');
				}else{
					$this->session->set_flashdata('title','Failed');
					$this->session->set_flashdata('text','Pemutus Gagal Di Input');
					$this->session->set_flashdata('class', "error");

					redirect('akun/pemutus', 'refresh');
				}

			}else{
				$this->session->set_flashdata('title','Warning');
				$this->session->set_flashdata('text','Anda tidak memiliki akses');
				$this->session->set_flashdata('class', "warning");
				redirect('login','refresh');
			}
	}
	function insert_pelaksana(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){

		$post = $this->input->post();

				$data=array(
					'Username'=>$this->security->xss_clean(trim($post['username'])),
					'Password'=>substr(md5($this->input->post('password')),-6),
					'Nama'=>$this->security->xss_clean(trim($post['nama'])),
					'Email'=>$this->security->xss_clean(trim($post['email'])),
					'Id_propinsi'=>$this->security->xss_clean(trim($post['propinsi'])),
					'level'=>'2',
					'status_aktif'=>'1',

				);
				$table='user';
				$insert=$this->Bu_model->insert_sad($table,$data);
				if($insert=="Success"){
					$this->session->set_flashdata('title','Success');
					$this->session->set_flashdata('text','Biodata Berhasil Di Input');
					$this->session->set_flashdata('class', "success");

					redirect('akun/pelaksana', 'refresh');
				}else{
					$this->session->set_flashdata('title','Failed');
					$this->session->set_flashdata('text','Biodata Gagal Di Input');
					$this->session->set_flashdata('class', "error");

					redirect('akun/pelaksana', 'refresh');
				}

			}else{
				$this->session->set_flashdata('title','Warning');
				$this->session->set_flashdata('text','Anda tidak memiliki akses');
				$this->session->set_flashdata('class', "warning");
				redirect('login','refresh');
			}
	}
	function insert_keuangan(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){

		$post = $this->input->post();

				$data=array(
					'Username'=>$this->security->xss_clean(trim($post['username'])),
					'Password'=>substr(md5($this->input->post('password')),-6),
					'Nama'=>$this->security->xss_clean(trim($post['nama'])),
					'Email'=>$this->security->xss_clean(trim($post['email'])),
					'Id_propinsi'=>'00',
					'level'=>'4',
					'status_aktif'=>'1',

				);
				$table='user';
				$insert=$this->Bu_model->insert_sad($table,$data);
				if($insert=="Success"){
					$this->session->set_flashdata('title','Success');
					$this->session->set_flashdata('text','Biodata Berhasil Di Input');
					$this->session->set_flashdata('class', "success");

					redirect('akun/koordinator_keuangan', 'refresh');
				}else{
					$this->session->set_flashdata('title','Failed');
					$this->session->set_flashdata('text','Biodata Gagal Di Input');
					$this->session->set_flashdata('class', "error");

					redirect('akun/koordinator_keuangan', 'refresh');
				}

			}else{
				$this->session->set_flashdata('title','Warning');
				$this->session->set_flashdata('text','Anda tidak memiliki akses');
				$this->session->set_flashdata('class', "warning");
				redirect('login','refresh');
			}
	}
	function verifikasi_mitra(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat()){

		$post = $this->input->post();
		$nik=$this->security->xss_clean(trim($post['nik']));
		$email=$this->security->xss_clean(trim($post['email']));
		$record=$this->Bu_model->get_mitra();
		$mitra=$this->Bu_model->get_mitra2($nik);
		$jumlah=count($record)+1;
		$username="mitra_".$jumlah;
		$password=$this->randomPassword();

		$this->load->config('email');
		$this->load->library('email');
		$from = $this->config->item('smtp_user');
		$message = $this->notif_email_mitra($username,$password,$mitra[0]['nama']);
		$this->email->from('info@lsbugapeknas.com', 'LSBU GAPEKNAS');
		$this->email->to($email);
		$this->email->subject('Akun Mitra');
		$this->email->message($message);

		if ($this->email->send()) {
			$data2=array(
				'Username'=>$username,
				'Password'=>$password,
			);
			$where=array(
				'nik'=>$nik
			);
			$table="user_mitra";
			$this->Bu_model->update_edit($where,$table,$data2);
			$data=array(
				'Username'=>$username,
				'Password'=>substr(md5($password),-6),
				'Nama'=>$mitra[0]['nama'],
				'Email'=>$mitra[0]['email'],
				'Id_propinsi'=>$mitra[0]['propinsi'],
				'level'=>'9',
				'status_aktif'=>'1',

			);
			$table='user';
			$insert=$this->Bu_model->insert_sad($table,$data);
				$response=array(
					'result'=>1
				);
		} else {
			$response=array(
				'result'=>2
			);
		}

		echo json_encode($response);


			}else{
				$this->session->set_flashdata('title','Warning');
				$this->session->set_flashdata('text','Anda tidak memiliki akses');
				$this->session->set_flashdata('class', "warning");
				redirect('login','refresh');
			}
	}
	function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
	function insert_sertifikasi(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat()){

		$post = $this->input->post();

				$data=array(
					'Username'=>$this->security->xss_clean(trim($post['username'])),
					'Password'=>substr(md5($this->input->post('password')),-6),
					'Nama'=>$this->security->xss_clean(trim($post['nama'])),
					'Email'=>$this->security->xss_clean(trim($post['email'])),
					'Id_propinsi'=>'00',
					'level'=>'5',
					'status_aktif'=>'1',

				);
				$table='user';
				$insert=$this->Bu_model->insert_sad($table,$data);
				if($insert=="Success"){
					$this->session->set_flashdata('title','Success');
					$this->session->set_flashdata('text','Biodata Berhasil Di Input');
					$this->session->set_flashdata('class', "success");

					redirect('akun/koordinator_sertifikasi', 'refresh');
				}else{
					$this->session->set_flashdata('title','Failed');
					$this->session->set_flashdata('text','Biodata Gagal Di Input');
					$this->session->set_flashdata('class', "error");

					redirect('akun/koordinator_sertifikasi', 'refresh');
				}

			}else{
				$this->session->set_flashdata('title','Warning');
				$this->session->set_flashdata('text','Anda tidak memiliki akses');
				$this->session->set_flashdata('class', "warning");
				redirect('login','refresh');
			}
	}
	function delete_sertifikasi(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat()){

		$post = $this->input->post();
		$username=$this->security->xss_clean(trim($post['username']));

				$insert=$this->Bu_model->delete_user($username);
				if($insert=="Success"){
					$this->session->set_flashdata('title','Success');
					$this->session->set_flashdata('text','Akun Berhasil Didelete');
					$this->session->set_flashdata('class', "success");

					redirect('akun/koordinator_sertifikasi', 'refresh');
				}else{
					$this->session->set_flashdata('title','Failed');
					$this->session->set_flashdata('text','Akun Gagal Didelete');
					$this->session->set_flashdata('class', "error");

					redirect('akun/koordinator_sertifikasi', 'refresh');
				}

			}else{
				$this->session->set_flashdata('title','Warning');
				$this->session->set_flashdata('text','Anda tidak memiliki akses');
				$this->session->set_flashdata('class', "warning");
				redirect('login','refresh');
			}
	}
	function delete_pemutus(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat()){

		$post = $this->input->post();
		$username=$this->security->xss_clean(trim($post['username']));

				$insert=$this->Bu_model->delete_user($username);
				if($insert=="Success"){
					$this->session->set_flashdata('title','Success');
					$this->session->set_flashdata('text','Akun Berhasil Didelete');
					$this->session->set_flashdata('class', "success");

					redirect('akun/pemutus', 'refresh');
				}else{
					$this->session->set_flashdata('title','Failed');
					$this->session->set_flashdata('text','Akun Gagal Didelete');
					$this->session->set_flashdata('class', "error");

					redirect('akun/pemutus', 'refresh');
				}

			}else{
				$this->session->set_flashdata('title','Warning');
				$this->session->set_flashdata('text','Anda tidak memiliki akses');
				$this->session->set_flashdata('class', "warning");
				redirect('login','refresh');
			}
	}
	function delete_keuangan(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat()){

		$post = $this->input->post();
		$username=$this->security->xss_clean(trim($post['username']));

				$insert=$this->Bu_model->delete_user($username);
				if($insert=="Success"){
					$this->session->set_flashdata('title','Success');
					$this->session->set_flashdata('text','Akun Berhasil Didelete');
					$this->session->set_flashdata('class', "success");

					redirect('akun/koordinator_keuangan', 'refresh');
				}else{
					$this->session->set_flashdata('title','Failed');
					$this->session->set_flashdata('text','Akun Gagal Didelete');
					$this->session->set_flashdata('class', "error");

					redirect('akun/koordinator_keuangan', 'refresh');
				}

			}else{
				$this->session->set_flashdata('title','Warning');
				$this->session->set_flashdata('text','Anda tidak memiliki akses');
				$this->session->set_flashdata('class', "warning");
				redirect('login','refresh');
			}
	}
	function delete_asesor(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat()){

		$post = $this->input->post();
		$username=$this->security->xss_clean(trim($post['username']));

				$insert=$this->Bu_model->delete_user($username);
				if($insert=="Success"){
					$this->session->set_flashdata('title','Success');
					$this->session->set_flashdata('text','Akun Berhasil Didelete');
					$this->session->set_flashdata('class', "success");

					redirect('akun/asesor', 'refresh');
				}else{
					$this->session->set_flashdata('title','Failed');
					$this->session->set_flashdata('text','Akun Gagal Didelete');
					$this->session->set_flashdata('class', "error");

					redirect('akun/asesor', 'refresh');
				}

			}else{
				$this->session->set_flashdata('title','Warning');
				$this->session->set_flashdata('text','Anda tidak memiliki akses');
				$this->session->set_flashdata('class', "warning");
				redirect('login','refresh');
			}
	}

	function delete_pelaksana(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat()){

		$post = $this->input->post();
		$username=$this->security->xss_clean(trim($post['username']));

				$insert=$this->Bu_model->delete_user($username);
				if($insert=="Success"){
					$this->session->set_flashdata('title','Success');
					$this->session->set_flashdata('text','Akun Berhasil Didelete');
					$this->session->set_flashdata('class', "success");

					redirect('akun/pelaksana', 'refresh');
				}else{
					$this->session->set_flashdata('title','Failed');
					$this->session->set_flashdata('text','Akun Gagal Didelete');
					$this->session->set_flashdata('class', "error");

					redirect('akun/pelaksana', 'refresh');
				}

			}else{
				$this->session->set_flashdata('title','Warning');
				$this->session->set_flashdata('text','Anda tidak memiliki akses');
				$this->session->set_flashdata('class', "warning");
				redirect('login','refresh');
			}
	}
	function insert_asesor(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){

		$post = $this->input->post();

				$data=array(
					'Username'=>$this->security->xss_clean(trim($post['username'])),
					'Password'=>substr(md5($this->input->post('password')),-6),
					'Nama'=>$this->security->xss_clean(trim($post['nama'])),
					'Email'=>$this->security->xss_clean(trim($post['email'])),
					'Id_propinsi'=>$this->security->xss_clean(trim($post['propinsi'])),
					'level'=>'3',
					'status_aktif'=>'1',

				);
				$table='user';
				$insert=$this->Bu_model->insert_sad($table,$data);
				if($insert=="Success"){
					$this->session->set_flashdata('title','Success');
					$this->session->set_flashdata('text','Biodata Berhasil Di Input');
					$this->session->set_flashdata('class', "success");

					redirect('akun/asesor', 'refresh');
				}else{
					$this->session->set_flashdata('title','Failed');
					$this->session->set_flashdata('text','Biodata Gagal Di Input');
					$this->session->set_flashdata('class', "error");

					redirect('akun/asesor', 'refresh');
				}

			}else{
				$this->session->set_flashdata('title','Warning');
				$this->session->set_flashdata('text','Anda tidak memiliki akses');
				$this->session->set_flashdata('class', "warning");
				redirect('login','refresh');
			}
	}
	function update_asesor(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){

		$post = $this->input->post();
				$password=$this->security->xss_clean(trim($post['password']));
				$where=array(
					'Username'=>$this->security->xss_clean(trim($post['id']))
				);
				$data=array(

					'Password'=>substr(md5($password),-6),
					'Nama'=>$this->security->xss_clean(trim($post['nama'])),
					'Email'=>$this->security->xss_clean(trim($post['email'])),

				);
				$table='user';
				if($password!=''){
					$insert=$this->Bu_model->update_edit($where,$table,$data);
					if($insert=="Success"){
						$this->session->set_flashdata('title','Success');
						$this->session->set_flashdata('text','Asesor Berhasil Di Update');
						$this->session->set_flashdata('class', "success");

						redirect('akun/asesor', 'refresh');
					}else{
						$this->session->set_flashdata('title','Failed');
						$this->session->set_flashdata('text','Asesor Gagal Di Update');
						$this->session->set_flashdata('class', "error");

						redirect('akun/asesor', 'refresh');
					}
				}else{
					$this->session->set_flashdata('title','Warning');
					$this->session->set_flashdata('text','Password Tidak Boleh Kosong');
					$this->session->set_flashdata('class', "warning");
					redirect('akun/asesor','refresh');
				}


			}else{
				$this->session->set_flashdata('title','Warning');
				$this->session->set_flashdata('text','Anda tidak memiliki akses');
				$this->session->set_flashdata('class', "warning");
				redirect('login','refresh');
			}
	}
	function search_asesor(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){

		$post = $this->input->post();
		$id=$this->security->xss_clean(trim($post['id']));
				$data=array(
					'record'=>$this->Bu_model->search_asesor($id),

				);
				echo json_encode($data);
			}else{
				$this->session->set_flashdata('title','Warning');
				$this->session->set_flashdata('text','Anda tidak memiliki akses');
				$this->session->set_flashdata('class', "warning");
				redirect('login','refresh');
			}
	}
	function search_mitra(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){

		$post = $this->input->post();
		$id=$this->security->xss_clean(trim($post['nik']));
				$data=array(
					'record'=>$this->Bu_model->search_mitra($id),

				);
				echo json_encode($data);
			}else{
				$this->session->set_flashdata('title','Warning');
				$this->session->set_flashdata('text','Anda tidak memiliki akses');
				$this->session->set_flashdata('class', "warning");
				redirect('login','refresh');
			}
	}

  function pelaksana(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana() OR $this->ion_auth->badan_usaha()){
		$propinsi=$this->Bu_model->provinsi();
		$kabupaten=$this->Bu_model->kabupaten();
    $this->data = array(
			'record'=>$this->Bu_model->get_user_pelaksana(),
			'propinsi'=>$propinsi,
			'kabupaten'=>$kabupaten,
    );
    $this->template->load('menu/menu','akun/pelaksana', $this->data);
	}else{
		$this->session->set_flashdata('title','Warning');
		$this->session->set_flashdata('text','Anda tidak memiliki akses');
		$this->session->set_flashdata('class', "warning");
		redirect('login','refresh');
	}
	}
	function pemutus(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){
		$propinsi=$this->Bu_model->provinsi();
		$kabupaten=$this->Bu_model->kabupaten();
		$this->data = array(
			'record'=>$this->Bu_model->get_user_pemutus(),
			'propinsi'=>$propinsi,
			'kabupaten'=>$kabupaten,
		);
		$this->template->load('menu/menu','akun/pemutus', $this->data);
	}else{
		$this->session->set_flashdata('title','Warning');
		$this->session->set_flashdata('text','Anda tidak memiliki akses');
		$this->session->set_flashdata('class', "warning");
		redirect('login','refresh');
	}
	}
	function koordinator_keuangan(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana() OR $this->ion_auth->badan_usaha()){
		$propinsi=$this->Bu_model->provinsi();
		$kabupaten=$this->Bu_model->kabupaten();
		$this->data = array(
			'record'=>$this->Bu_model->get_user_keuangan(),
			'propinsi'=>$propinsi,
			'kabupaten'=>$kabupaten,
		);
		$this->template->load('menu/menu','akun/koordinator_keuangan', $this->data);
	}else{
		$this->session->set_flashdata('title','Warning');
		$this->session->set_flashdata('text','Anda tidak memiliki akses');
		$this->session->set_flashdata('class', "warning");
		redirect('login','refresh');
	}
	}
	function koordinator_sertifikasi(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana() OR $this->ion_auth->badan_usaha()){
		$propinsi=$this->Bu_model->provinsi();
		$kabupaten=$this->Bu_model->kabupaten();
		$this->data = array(
			'record'=>$this->Bu_model->get_user_sertifikasi(),
			'propinsi'=>$propinsi,
			'kabupaten'=>$kabupaten,
		);
		$this->template->load('menu/menu','akun/koordinator_sertifikasi', $this->data);
	}else{
		$this->session->set_flashdata('title','Warning');
		$this->session->set_flashdata('text','Anda tidak memiliki akses');
		$this->session->set_flashdata('class', "warning");
		redirect('login','refresh');
	}
	}

	function asesor(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana()){
		$propinsi=$this->Bu_model->provinsi();
		$kabupaten=$this->Bu_model->kabupaten();
		$this->data = array(
			'record'=>$this->Bu_model->get_user_asesor(),
			'propinsi'=>$propinsi,
			'kabupaten'=>$kabupaten,
		);
		$this->template->load('menu/menu','akun/asesor', $this->data);
	}else{
		$this->session->set_flashdata('title','Warning');
		$this->session->set_flashdata('text','Anda tidak memiliki akses');
		$this->session->set_flashdata('class', "warning");
		redirect('login','refresh');
	}
	}
	function mitra(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat()){
		$propinsi=$this->Bu_model->provinsi();
		$kabupaten=$this->Bu_model->kabupaten();
		$this->data = array(
			'record'=>$this->Bu_model->get_user_mitra(),
			'propinsi'=>$propinsi,
			'kabupaten'=>$kabupaten,
		);
		$this->template->load('menu/menu','akun/mitra', $this->data);
	}else{
		$this->session->set_flashdata('title','Warning');
		$this->session->set_flashdata('text','Anda tidak memiliki akses');
		$this->session->set_flashdata('class', "warning");
		redirect('login','refresh');
	}
	}
	function notif_email_mitra($username,$password,$nama){
	$html= '
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width" />
		<title>Email Notification</title>
		<style type="text/css">

		* {
			margin:0;
			padding:0;
			font-family: Helvetica, Arial, sans-serif;
		}

		img {
			max-width: 100%;
			outline: none;
			text-decoration: none;
			-ms-interpolation-mode: bicubic;
		}

		.image-fix {
			display:block;
		}

		.collapse {
			margin:0;
			padding:0;
		}

		body {
			-webkit-font-smoothing:antialiased;
			-webkit-text-size-adjust:none;
			width: 100%!important;
			height: 100%;
			text-align: center;
			color: #747474;
			background-color: #ffffff;
		}

		h1,h2,h3,h4,h5,h6 {
			font-family: Helvetica, Arial, sans-serif;
			line-height: 1.1;
		}

		h1 small, h2 small, h3 small, h4 small, h5 small, h6 small {
			font-size: 60%;
			line-height: 0;
			text-transform: none;
		}

		h1 {
			font-weight:200;
			font-size: 44px;
		}

		h2 {
			font-weight:200;
			font-size: 32px;
			margin-bottom: 14px;
		}

		h3 {
			font-weight:500;
			font-size: 27px;
		}

		h4 {
			font-weight:500;
			font-size: 23px;
		}

		h5 {
			font-weight:900;
			font-size: 17px;
		}

		h6 {
			font-weight:900;
			font-size: 14px;
			text-transform: uppercase;
		}

		.collapse {
			margin:0!important;
		}

		td, div {
			font-family: Helvetica, Arial, sans-serif;
			text-align: center;
		}

		p, ul {
			margin-bottom: 10px;
			font-weight: normal;
			font-size:14px;
			line-height:1.6;
		}

		p.lead {
			font-size:17px;
		}

		p.last {
			margin-bottom:0px;
		}

		ul li {
			margin-left:5px;
			list-style-position: inside;
		}

		a {
			color: #747474;
			text-decoration: none;
		}

		a img {
			border: none;
		}

		.head-wrap {
			width: 100%;
			margin: 0 auto;
			background-color: #f9f8f8;
			border-bottom: 1px solid #d8d8d8;
		}

		.head-wrap * {
			margin: 0;
			padding: 0;
		}

		.header-background {
			background: repeat-x url(https://www.filepicker.io/api/file/wUGKTIOZTDqV2oJx5NCh) left bottom;
		}

		.header {
			height: 42px;
		}

		.header .content {
			padding: 0;
		}

		.header .brand {
			font-size: 16px;
			line-height: 42px;
			font-weight: bold;
		}

		.header .brand a {
			color: #464646;
		}

		.body-wrap {
			width: 505px;
			margin: 0 auto;
			background-color: #ffffff;
		}

		.soapbox .soapbox-title {
			font-size: 21px;
			color: #464646;
			padding-top: 35px;
		}

		.content .status-container.single .status-padding {
			width: 80px;
		}

		.content .status {
			width: 90%;
		}

		.content .status-container.single .status {
			width: 300px;
		}

		.status {
			border-collapse: collapse;
			margin-left: 15px;
			color: #656565;
		}

		.status .status-cell {
			border: 1px solid #b3b3b3;
			height: 50px;
		}

		.status .status-cell.success,
		.status .status-cell.active {
			height: 65px;
		}

		.status .status-cell.success {
			background: #f2ffeb;
			color: #51da42;
		}

		.status .status-cell.success .status-title {
			font-size: 15px;
		}

		.status .status-cell.active {
			background: #fffde0;
			width: 135px;
		}

		.status .status-title {
			font-size: 16px;
			font-weight: bold;
			line-height: 23px;
		}

		.status .status-image {
			vertical-align: text-bottom;
		}

		.body .body-padded,
		.body .body-padding {
			padding-top: 34px;
		}

		.body .body-padding {
			width: 41px;
		}

		.body-padded,
		.body-title {
			text-align: left;
		}

		.body .body-title {
			font-weight: bold;
			font-size: 17px;
			color: #464646;
		}

		.body .body-text .body-text-cell {
			text-align: left;
			font-size: 14px;
			line-height: 1.6;
			padding: 9px 0 17px;
		}

		.body .body-text-cell a {
			color: #464646;
			text-decoration: underline;
		}

		.body .body-signature-block .body-signature-cell {
			padding: 25px 0 30px;
			text-align: left;
		}

		.body .body-signature {
			font-family: "Comic Sans MS", Textile, cursive;
			font-weight: bold;
		}

		.footer-wrap {
			width: 100%;
			margin: 0 auto;
			clear: both !important;
			background-color: #e5e5e5;
			border-top: 1px solid #b3b3b3;
			font-size: 12px;
			color: #656565;
			line-height: 30px;
		}

		.footer-wrap .container {
			padding: 14px 0;
		}

		.footer-wrap .container .content {
			padding: 0;
		}

		.footer-wrap .container .footer-lead {
			font-size: 14px;
		}

		.footer-wrap .container .footer-lead a {
			font-size: 14px;
			font-weight: bold;
			color: #535353;
		}

		.footer-wrap .container a {
			font-size: 12px;
			color: #656565;
		}

		.footer-wrap .container a.last {
			margin-right: 0;
		}

		.footer-wrap .footer-group {
			display: inline-block;
		}

		.container {
			display: block !important;
			max-width: 505px !important;
			clear: both !important;
		}

		.content {
			padding: 0;
			max-width: 505px;
			margin: 0 auto;
			display: block;
		}

		.content table {
			width: 100%;
		}


		.clear {
			display: block;
			clear: both;
		}

		table.full-width-gmail-android {
			width: 100% !important;
		}

		</style>

		<style type="text/css" media="only screen">

		@media only screen {

			table[class*="head-wrap"],
			table[class*="body-wrap"],
			table[class*="footer-wrap"] {
				width: 100% !important;
			}

			td[class*="container"] {
				margin: 0 auto !important;
			}

		}

		@media only screen and (max-width: 505px) {

			*[class*="w320"] {
				width: 320px !important;
			}

			table[class="soapbox"] td[class*="soapbox-title"],
			table[class="body"] td[class*="body-padded"] {
				padding-top: 24px;
			}
		}
		</style>
	</head>

	<body bgcolor="#ffffff">

		<div align="center">
			<table class="head-wrap w320 full-width-gmail-android" bgcolor="#f9f8f8" cellpadding="0" cellspacing="0" border="0">
				<tr>
					<td background="https://www.filepicker.io/api/file/UOesoVZTFObSHCgUDygC" bgcolor="#ffffff" width="100%" height="8" valign="top">
						<!--[if gte mso 9]>
						<v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="mso-width-percent:1000;height:8px;">
							<v:fill type="tile" src="https://www.filepicker.io/api/file/UOesoVZTFObSHCgUDygC" color="#ffffff" />
							<v:textbox inset="0,0,0,0">
						<![endif]-->
						<div height="8">
						</div>
						<!--[if gte mso 9]>
							</v:textbox>
						</v:rect>
						<![endif]-->
					</td>
				</tr>
				<tr class="header-background">
					<td class="header container" align="center">
						<div class="content">
							<span class="brand">
								<a href="#">

								</a>
							</span>
						</div>
					</td>
				</tr>
			</table>

			<table class="body-wrap w320">
				<tr>
					<td></td>
					<td class="container">
						<div class="content">
							<table cellspacing="0">
								<tr>
									<td>
										<table class="soapbox">
											<tr>
												<td class="soapbox-title">Akun Mitra </td>
											</tr>
										</table>
										<table class="body">
											<tr>
												<td class="body-padding"></td>
												<td class="body-padded">
													<div class="body-title">Hi There,</div>
													<table class="body-text">
														<tr>
															<td class="body-text-cell">
																Pendataran akun Mitra '.$nama.' sudah disetujui berikut username dan password anda untuk masuk kedalam sistem :<br><br>
																Username : '.$username.'<br>
																Password : '.$password.'
															</td>
														</tr>
													</table>
													<div><!--[if mso]>
														<v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="#" style="height:38px;v-text-anchor:middle;width:230px;" arcsize="11%" strokecolor="#407429" fill="t">
															<v:fill type="tile" src="https://www.filepicker.io/api/file/N8GiNGsmT6mK6ORk00S7" color="#41CC00" />
															<w:anchorlock/>
															<center style="color:#ffffff;font-family:sans-serif;font-size:17px;font-weight:bold;">Review Account Settings</center>
														</v:roundrect>
													<![endif]--></div>
													<table class="body-signature-block">
														<tr>
															<td class="body-signature-cell">
																<p>Akun anda bisa dipakai di laman <b>https://sertifikasi.lsbugapeknas.com/</b></p>

															</td>
														</tr>
													</table>
												</td>
												<td class="body-padding"></td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
						</div>
					</td>
					<td></td>
				</tr>
			</table>

			<div class="footer" style="clear: both; Margin-top: 10px; text-align: center; width: 100%; ">
				<table bgcolor="#e5e5e5" role="presentation" border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%; ">
					<tr>
					<td style="padding-bottom:25px;padding-top:22px;width:100%;padding-right:0px;padding-left:0px;">
					<div align="center" style="line-height:10px"><img alt="Image" src="'.base_url('assets/media/logos/Logo_gapeknas.png').'" style=" border: 0; width: 150px; max-width: 3000px;" title="Image" width="80"/></div>
					</td>
					</tr>
					<tr>
					<td class="content-block" style="font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; font-size: 12px; color: #999999; text-align: center;">
						<span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">GAPEKNAS - PT LSBU GAPEKNAS INFRASTRUKTUR</span>
						<br>
						<span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">Ruko Graha Mas Pemuda Blok AD No. 21 Jl. Pemuda, Rawamangun</span>
						<br>
						<span class="apple-link" style="color: #999999; font-size: 12px; text-align: center;">Jakarta Timur</span>
					</td>
					</tr>

				</table>
			</div>

		</div>

	</body>
	</html>
	';
	return $html;
	}

}
