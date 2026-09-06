<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('bu/Bu_model');
		$this->load->helper(array('url','html','file','form','security'));
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->model('User_model');
	}


	public function index()
	{
		if ($this->ion_auth->ceklogin2())
		{
			$this->data['profil'] = $this->ion_auth->datalogin();
  		$this->data['title'] = $this->session->flashdata('title');
			$this->data['text'] = $this->session->flashdata('text');
			$this->data['class'] = $this->session->flashdata('class');
			$id_user=$this->session->userdata('id_user');
			$pw=$this->session->userdata('pw');

				if($this->ion_auth->admin_pusat() OR $this->ion_auth->admin_rekomendasi() OR $this->ion_auth->admin_get() OR $this->ion_auth->admin_cabut() OR $this->ion_auth->pelaksana() OR $this->ion_auth->koordinator_keuangan() OR $this->ion_auth->koordinator_sertifikasi() OR $this->ion_auth->pemutus() OR $this->ion_auth->finance() OR $this->ion_auth->the()){
					redirect('dashboard/dashboard2','refresh');
				}elseif($this->ion_auth->badan_usaha()){
					redirect('dashboard_bu','refresh');
				}elseif($this->ion_auth->asesor()){
					redirect('dashboard_asesor','refresh');
				}
				elseif($this->ion_auth->mitra()){
					redirect('mitra','refresh');
				}else{

					$this->keluar();
				}



		}else{

		$this->form_validation->set_rules('username','Username','required|trim|xss_clean');
		$this->form_validation->set_rules('password','Password','required|trim|xss_clean');
		if (isset($_POST) && !empty($_POST))
		{
			$status="TRUE";
			/*
			$recaptcha = $this->input->post('g-recaptcha-response');

			if(!empty($recaptcha))
			{*/

				if($this->form_validation->run() === true)
				{
					$pw=$this->input->post('password');
					$username = $this->input->post('username');
					$password = substr(md5($this->input->post('password')),-6);

					if ($this->session->userdata('logged_in') === FALSE)
					{
					  	//delete session
						$this->User_model->deleteSession($this->session->userdata('id_user'));
					}

					$session = $this->User_model->getSession($username);
					/*if ($session == NULL)
					{*/
						if ($this->User_model->login($username,$password))
						{
							if(!empty($this->input->post('forces_login'))){
								$this->User_model->deleteSession($this->session->userdata('id_user'));
							}else{
								if($session != NULL){
									$title="Login Gagal";
									$text="User Sedang digunakan / online";
									$class="warning";
									$status="FALSE";
								}
							}
							$status = $this->User_model->select($username,$password);
							if($status->status_aktif == 1)
							{
								$sessionarray = array(
									'id_user' => $status->Username,
									'username' => $status->Username,
									'pw'=>$pw,
									'email' => $status->Email,
									'id_propinsi' => $status->Id_propinsi,
									'level' => $status->level,
									'nama' => $status->Nama,
									'login' => TRUE,
									'id_login'=>session_id()
								);
								$this->session->set_userdata($sessionarray);

								$title="Login Sukses";
								$text='Selamat Datang '.$status->Nama;
								$class="success";
								$status="TRUE";
								//Successfull login
								$u_data = array('Id_User' => $username,
												'is_logged_in' => true,
								 );
								//Create session of current user
								$this->session->set_userdata($u_data);
								//Fetch new session id
								$Id_Session = session_id();
								//Map new session Id with UserId and destroy previous mapped sessionId
								$this->User_model->setSession($username, $Id_Session, $u_data);
								//Creeate session logged_in
								$this->session->set_userdata('logged_in', TRUE);

								//redirect('','refresh');
							}
							else {
								$title="Login Gagal";
								$text="Maaf User Anda Belum Aktif";
								$class="warning";
								$status="FALSE";

							}

						}
						else {
							$title="Login Gagal";
							$text="Username dan Password salah, Silahkan Ulangi Lagi";
							$class="warning";
							$status="FALSE";

						}
					/*}
					else {
							$this->session->set_flashdata('title','Login Gagal');
							$this->session->set_flashdata('text','User Sedang digunakan / online');
							$this->session->set_flashdata('class', "bg-warning");
							redirect('index.php/login','refresh');
					}*/

				}
				else {
					$this->session->set_flashdata('title','Validasi Gagal');
					$this->session->set_flashdata('text','Username / Password Tidak Boleh Kosong');
					$this->session->set_flashdata('class','bg-warning');
					redirect('index.php/login','refresh');
				}

				/*
			}
			else {
				$this->session->set_flashdata('title','Login Gagal');
				$this->session->set_flashdata('text','Anda Harus Verifikasi Captcha');
				$this->session->set_flashdata('class','bg-warning');
				redirect('index.php/login','refresh');
			}*/

			$data=array(
				'title'=>$title,
				'text'=>$text,
				'class'=>$class,
				'status'=>$status
			);

		      echo json_encode($data);
		}else{
			$this->data['title'] = $this->session->flashdata('title');
			$this->data['text'] = $this->session->flashdata('text');
			$this->data['class'] = $this->session->flashdata('class');
			$this->load->view('login',$this->data);
		}


	}
}
public function sdaseawdsa()
{
	if ($this->ion_auth->ceklogin2())
	{
		$this->data['profil'] = $this->ion_auth->datalogin();
		$this->data['title'] = $this->session->flashdata('title');
		$this->data['text'] = $this->session->flashdata('text');
		$this->data['class'] = $this->session->flashdata('class');
		$id_user=$this->session->userdata('id_user');
		$pw=$this->session->userdata('pw');

			if($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana() OR $this->ion_auth->koordinator_keuangan() OR $this->ion_auth->koordinator_sertifikasi() OR $this->ion_auth->pemutus()){
				redirect('dashboard','refresh');
			}elseif($this->ion_auth->badan_usaha()){
				redirect('dashboard_bu','refresh');
			}elseif($this->ion_auth->asesor()){
				redirect('dashboard_asesor','refresh');
			}else{

				$this->keluar();
			}



	}else{

	$this->form_validation->set_rules('username','Username','required|trim|xss_clean');
	$this->form_validation->set_rules('password','Password','required|trim|xss_clean');
	if (isset($_POST) && !empty($_POST))
	{
		$status="TRUE";
		/*
		$recaptcha = $this->input->post('g-recaptcha-response');

		if(!empty($recaptcha))
		{*/

			if($this->form_validation->run() === true)
			{
				$pw=$this->input->post('password');
				$username = $this->input->post('username');
				$password = substr(md5($this->input->post('password')),-6);

				if ($this->session->userdata('logged_in') === FALSE)
				{
						//delete session
					$this->User_model->deleteSession($this->session->userdata('id_user'));
				}

				$session = $this->User_model->getSession($username);
				/*if ($session == NULL)
				{*/
					if ($this->User_model->login($username,$password))
					{
						if(!empty($this->input->post('forces_login'))){
							$this->User_model->deleteSession($this->session->userdata('id_user'));
						}else{
							if($session != NULL){
								$title="Login Gagal";
								$text="User Sedang digunakan / online";
								$class="warning";
								$status="FALSE";
							}
						}
						$status = $this->User_model->select($username,$password);
						if($status->status_aktif == 1)
						{
							$sessionarray = array(
								'id_user' => $status->Username,
								'username' => $status->Username,
								'pw'=>$pw,
								'email' => $status->Email,
								'id_propinsi' => $status->Id_propinsi,
								'level' => $status->level,
								'nama' => $status->Nama,
								'login' => TRUE,
								'id_login'=>session_id()
							);
							$this->session->set_userdata($sessionarray);

							$title="Login Sukses";
							$text='Selamat Datang '.$status->Nama;
							$class="success";
							$status="TRUE";
							//Successfull login
							$u_data = array('Id_User' => $username,
											'is_logged_in' => true,
							 );
							//Create session of current user
							$this->session->set_userdata($u_data);
							//Fetch new session id
							$Id_Session = session_id();
							//Map new session Id with UserId and destroy previous mapped sessionId
							$this->User_model->setSession($username, $Id_Session, $u_data);
							//Creeate session logged_in
							$this->session->set_userdata('logged_in', TRUE);

							//redirect('','refresh');
						}
						else {
							$title="Login Gagal";
							$text="Maaf User Anda Belum Aktif";
							$class="warning";
							$status="FALSE";

						}

					}
					else {
						$title="Login Gagal";
						$text="Username dan Password salah, Silahkan Ulangi Lagi";
						$class="warning";
						$status="FALSE";

					}
				/*}
				else {
						$this->session->set_flashdata('title','Login Gagal');
						$this->session->set_flashdata('text','User Sedang digunakan / online');
						$this->session->set_flashdata('class', "bg-warning");
						redirect('index.php/login','refresh');
				}*/

			}
			else {
				$this->session->set_flashdata('title','Validasi Gagal');
				$this->session->set_flashdata('text','Username / Password Tidak Boleh Kosong');
				$this->session->set_flashdata('class','bg-warning');
				redirect('index.php/login','refresh');
			}

			/*
		}
		else {
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Harus Verifikasi Captcha');
			$this->session->set_flashdata('class','bg-warning');
			redirect('index.php/login','refresh');
		}*/

		$data=array(
			'title'=>$title,
			'text'=>$text,
			'class'=>$class,
			'status'=>$status
		);

				echo json_encode($data);
	}else{
		$this->data['title'] = $this->session->flashdata('title');
		$this->data['text'] = $this->session->flashdata('text');
		$this->data['class'] = $this->session->flashdata('class');
		$this->load->view('cobax',$this->data);
	}


}
}

	public function keluar()
	{
		//delete session
		$this->User_model->deleteSession($this->session->userdata('id_user'));
        $this->session->sess_destroy();
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('id_propinsi');
		$this->session->unset_userdata('id_asosiasi');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('turun_status');
		$this->session->unset_userdata('jenis_asosiasi');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('login');
		$this->session->unset_userdata('id_login');
		$this->session->unset_userdata('id_bu');
		$this->session->set_flashdata('title','Logout Berhasil');
		$this->session->set_flashdata('text','Silahkan Datang Kembali');
		$this->session->set_flashdata('class', "bg-info");
		redirect('login','refresh');
	}
	public function keluar_survailen()
	{
		//delete session
		$this->User_model->deleteSession($this->session->userdata('id_user'));
        $this->session->sess_destroy();
		$this->session->unset_userdata('id_user');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('id_propinsi');
		$this->session->unset_userdata('id_asosiasi');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('turun_status');
		$this->session->unset_userdata('jenis_asosiasi');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('login');
		$this->session->unset_userdata('id_login');
		$this->session->unset_userdata('id_bu');
		$this->session->set_flashdata('title','Logout Berhasil');
		$this->session->set_flashdata('text','Silahkan Datang Kembali');
		$this->session->set_flashdata('class', "bg-info");
		redirect('survailen','refresh');
	}
}
