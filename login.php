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
	function get_email(){
		$post = $this->input->post();
		$email=$this->security->xss_clean(trim($post['email']));
		$record=$this->Bu_model->get_email_lisensi($email);
		$response = array(
										'record' =>$record,
									);

				echo json_encode($response);
	}
	function insert_regis(){

	  $post = $this->input->post();

	  $upload_15=NULL;
	  if($_FILES['file_nib']['name'])
	  {
	    $this->load->library('upload');
	    $id_user=$this->session->userdata('id_user');
			$nmfile = date("Y-m-d H:i:s").md5($id_user);
	    $config15['upload_path'] = './assets/bukti/registrasi/nib';
	    $config15['allowed_types'] = 'pdf|jpg|jpeg|png';
	    $config15['overwrite'] = TRUE;
	    $config15['file_name'] = $nmfile;
	    $this->upload->initialize($config15);
	    if($this->upload->do_upload('file_nib')){
	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	      $alamat="./assets/bukti/registrasi";

	      $upload_15=$gbr['file_name'];
	    }
	  }else{
	    $upload_15="NULL";
	  }




	    if (!empty($upload_15))
	    {

				$status=$this->security->xss_clean(trim($post['cond']));
	      if($status!='FALSE'){
	        $data=array(
	          'Nama'=>$this->security->xss_clean(trim($post['nama'])),
	          'Email'=>$this->security->xss_clean(trim($post['email'])),
	          'Hp'=>$this->security->xss_clean(trim($post['hp'])),
	          'Asosiasi'=>$this->security->xss_clean(trim($post['asosiasi'])),
						'NIB'=>$this->security->xss_clean(trim($post['nib'])),
						'NIK'=>$this->security->xss_clean(trim($post['nik'])),
						'Level'=>'1',
	          'Persyaratan_nib'=>$upload_15
	        );

	        $table='user_lisensi';
	        $insert=$this->Bu_model->insert($table,$data);
	        if($insert=="Success"){
	          $this->session->set_flashdata('title','Success');
	          $this->session->set_flashdata('text','Data Berhasil Di Input');
	          $this->session->set_flashdata('class', "bg-primary");
	          $this->output
	          ->set_content_type('application/json')
	          ->set_output(json_encode(array('result' => 1)));
						redirect('login', 'refresh');
	        }else{
	          $this->session->set_flashdata('title','Failed');
	          $this->session->set_flashdata('text','Data Gagal Di Input');
	          $this->session->set_flashdata('class', "bg-danger");
	          $this->output
	          ->set_content_type('application/json')
	          ->set_output(json_encode(array('result' => 1)));
						redirect('login', 'refresh');
	        }
	      }else{
	        $this->session->set_flashdata('title','Failed');
	        $this->session->set_flashdata('text','Ilegal action');
	        $this->session->set_flashdata('class', "bg-danger");
	        $this->output
	        ->set_content_type('application/json')
	        ->set_output(json_encode(array('result' => 1)));
					redirect('login', 'refresh');
	      }


	    }else{
	      $this->session->set_flashdata('title','Failed');
	      $this->session->set_flashdata('text','Persyaratan Gagal Diupload');
	      $this->session->set_flashdata('class', "bg-danger");
	      $this->output
	      ->set_content_type('application/json')
	      ->set_output(json_encode(array('result' => 2)));
				redirect('login', 'refresh');
	    }

	}

	public function index()
	{
		if ($this->ion_auth->ceklogin())
		{
			$this->data['profil'] = $this->ion_auth->datalogin();
  		$this->data['title'] = $this->session->flashdata('title');
			$this->data['text'] = $this->session->flashdata('text');
			$this->data['class'] = $this->session->flashdata('class');
			$id_user=$this->session->userdata('id_user');
			$pw=$this->session->userdata('pw');


				if($this->ion_auth->sekertariat_1() OR $this->ion_auth->sekertariat_2()){
					redirect('dashboard_sekretariat','refresh');
				}elseif($this->ion_auth->auditor()){
					redirect('dashboard_auditor','refresh');
				}elseif($this->ion_auth->asosiasi()){
					redirect('dashboard_asosiasi','refresh');
				}else{

					$this->keluar();
				}



		}else{


		$this->data['header'] = 'LPJK - Lembaga Pengembangan Jasa Konstruksi';
		$this->data['username'] = array(
			'class' => 'form-control',
			'type' => 'text',
			'placeholder' => 'Username',
			'name' => 'username',
			'autocomplete'=>'off'
		);
		$this->data['password'] = array(
			'class' => 'form-control',
			'type' => 'password',
			'placeholder' => 'Password',
			'name' => 'password'
		);

		$this->data['button'] = array(
			'class' => 'btn btn-primary btn-block',
			'name' => 'login',
			'type' => 'submit',
			'content' => "Login <i class='icon-circle-right2 position-right'></i>",

		);

		$this->data['checkbox'] = array(
			'class' => 'switchery',
			'name' => 'login',
			'type' => 'checkbox'


		);

		$this->form_validation->set_rules('username','Username','required|trim|xss_clean');
		$this->form_validation->set_rules('password','Password','required|trim|xss_clean');
		if (isset($_POST) && !empty($_POST))
		{
			$recaptcha = $this->input->post('g-recaptcha-response');

			if(!empty($recaptcha))
			{

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
									$this->session->set_flashdata('title','Login Gagal');
									$this->session->set_flashdata('text','User Sedang digunakan / online');
									$this->session->set_flashdata('class', "bg-warning");
									redirect('index.php/login','refresh');
								}
							}
							$status = $this->User_model->select($username,$password);
							if($status->Username != '')
							{
								$sessionarray = array(
									'id_user' => $status->Username,

									'nama' => $status->Nama,
									'pw'=>$pw,
									'hp' => $status->Hp,
									'email' => $status->Email,
									'level' => $status->Level,
									'asosiasi' => $status->Asosiasi,
									'login' => TRUE,
									'id_login'=>session_id()
								);

								$this->session->set_userdata($sessionarray);
								$this->session->set_flashdata('title','Login Sukses');
								$this->session->set_flashdata('text','Selamat Datang');
								$this->session->set_flashdata('class', "bg-success ");

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

								redirect('','refresh');
							}
							else {
								$this->session->set_flashdata('title','Failed');
								$this->session->set_flashdata('text','Login gagal');
								$this->session->set_flashdata('class', "bg-warning");
								redirect('index.php/login','refresh');
							}

						}
						else {
							$this->session->set_flashdata('title','Login Gagal');
							$this->session->set_flashdata('text','Username dan Password salah, Silahkan Ulangi Lagi');
							$this->session->set_flashdata('class', "bg-warning");
							redirect('index.php/login','refresh');
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


			}
			else {
				$this->session->set_flashdata('title','Login Gagal');
				$this->session->set_flashdata('text','Anda Harus Verifikasi Captcha');
				$this->session->set_flashdata('class','bg-warning');
				redirect('index.php/login','refresh');
			}


		}

		$this->data['title'] = $this->session->flashdata('title');
		$this->data['text'] = $this->session->flashdata('text');
		$this->data['class'] = $this->session->flashdata('class');
		$this->data['asosiasi'] = $this->Bu_model->asosiasi_akreditasi();
		$this->load->view('login',$this->data);
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
}
