<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
	function permohonan_masuk_perubahan(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}
		$this->get_permohonan_perubahan();
		$data=$this->Bu_model->list_permohonan_masuk_perubahan();
		$record=array();
		foreach ($data as $row) {
				$status="1";
			$datax=array(
				'tgl_permohonan_banding'=>$row['tgl_permohonan_banding'],
				'biaya_lsbu'=>$row['biaya_lsbu'],
				'id_izin'=>$row['id_izin'],
				'tgl_create_izin'=>$row['tgl_create_izin'],
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
				'stat'=>$status,
			);
			array_push($record,$datax);
		}
		$this->data = array(
			'record'=>$record,

		);
		$this->template->load('menu/menu','permohonan_masuk_perubahan', $this->data);

	}
	function list_survailen(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}
		$record2=$this->Bu_model->list_survailen();
		$record=array();
		foreach($record2 as $row){
			$get=$this->Bu_model->get_asesor_survailen($row['id']);
			$datax=array(
				'id'=>$row['id'],
				'NIB'=>$row['NIB'],
				'nama'=>$row['nama'],
				'alamat'=>$row['alamat'],
				'propinsi'=>$row['propinsi'],
				'id_izin'=>$row['id_izin'],
				'email'=>$row['email'],
				'npwp'=>$row['npwp'],
				'sub_klasifikasi'=>$row['sub_klasifikasi'],
				'kualifikasi'=>$row['kualifikasi'],
				'nama_asosiasi'=>$row['nama_asosiasi'],
				'nomor_kbli'=>$row['nomor_kbli'],
				'telepon'=>$row['telepon'],
				'tgl_terbit'=>$row['tgl_terbit'],
				'asesor1'=>$get[0]['Nama'],
				'asesor2'=>$get[1]['Nama'],
			);
			array_push($record,$datax);
		}
		$this->data = array(
			'record'=>$record,

		);
		$this->template->load('menu/menu','list_survailen', $this->data);

	}
	function insert_penunjukan_survailen(){
		if (!$this->ion_auth->ceklogin()) {
		  $this->session->set_flashdata('title', 'Login Gagal');
		  $this->session->set_flashdata('text', 'Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
		  $this->session->set_flashdata('class', "bg-warning");
		  redirect('index.php/login', 'refresh');
		}
		$id_user=$this->session->userdata('id_user');
		  $post = $this->input->post();
		  $asesor1=$this->security->xss_clean(trim($post['asesor1']));
		  $asesor2=$this->security->xss_clean(trim($post['asesor2']));
		  $id_izin=$this->security->xss_clean(trim($post['id_izin']));
		  $cek_id=$this->Bu_model->cek_id_survailen($id_izin);
		  $table="lsbu_survailen_penunjukan";
		
			if($asesor1!=''){
			  $data=array(
				'id'=>$cek_id[0]['id'],
				'id_asesor'=>$asesor1,

			  );
			  $record=$this->Bu_model->insert_sad($table,$data);
			}
	  
			if($asesor2!=''){
			  $data2=array(
				'id'=>$cek_id[0]['id'],
				'id_asesor'=>$asesor2,
	
			  );
			  $record=$this->Bu_model->insert_sad($table,$data2);
	  
			}
		  
		
	  
	  
	  
	  
		  $response = array(
						  'asesor1'=>$asesor1,
						  'asesor2'=>$asesor2
						);
	  
			  echo json_encode($response);
	  
	  
	  }
	function permohonan_masuk_asesment(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}
		$this->get_permohonan_perubahan_asesment();
		$data=$this->Bu_model->list_permohonan_masuk_asesment();
		$record=array();
		foreach ($data as $row) {
			$get=$this->Bu_model->get_revisi($row['NIB'],$row['tgl_permohonan']);
			if(empty($get)){
				$status="0";
			}else{
				foreach($get as $row_revisi){
					if($row_revisi['status']=='0'){
						$status="1";
						break;
					}else{
						$status="2";
					}
				}
			}
			$datax=array(
				'tgl_permohonan_banding'=>$row['tgl_permohonan_banding'],
				'biaya_lsbu'=>$row['biaya_lsbu'],
				'id_izin'=>$row['id_izin'],
				'tgl_create_izin'=>$row['tgl_create_izin'],
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
				'stat'=>$status,
			);
			array_push($record,$datax);
		}
		$this->data = array(
			'record'=>$record,

		);
		$this->template->load('menu/menu','permohonan_masukxy_asesment', $this->data);

	}
	
	function get_permohonan_perubahan_asesment(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}
		$record=$this->Bu_model->token_api_siki();
		$token=$record[0]['token'];
		$url = "https://siki.pu.go.id/siki-api/v1/permohonan-sbu";

		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		//curl_setopt($curl, CURLOPT_POSTFIELDS, $data);post
		curl_setopt($curl, CURLOPT_HTTPHEADER,array(
			"Content-type: application/json",
			"token: $token"
		));
		$json_response = curl_exec($curl);
		$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		if ( $status != 200) {
				//die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
				$response = "Failed ".$json_response;


		}else{

			curl_close($curl);
			$responses = json_decode($json_response, true);
			foreach($responses['data'] as $row){
				if($row['status']=='101'){


				$nib="'".$row['nib']."'";
				$id_izin="'".$row['id_izin']."'";
				$create="'".$row['created_at']."'";
				$updates="'".$row['updated_at']."'";
				$status="'".$row['status']."'";
				$select="REPLACE INTO lsbu_permohonan_masuk (nib,id_izin,tgl_create_izin,tgl_update_izin,status) VALUE ($nib,$id_izin,$create,$updates,'101')";
				$where="";
				$this->Bu_model->delete_opr($select,$where);


			}
		}
			$response = "Success";
		}


				return $response;
	}
	function get_permohonan_perubahan(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}
		$record=$this->Bu_model->token_api_siki();
		$token=$record[0]['token'];
		$url = "https://siki.pu.go.id/siki-api/v1/permohonan-sbu";

		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		//curl_setopt($curl, CURLOPT_POSTFIELDS, $data);post
		curl_setopt($curl, CURLOPT_HTTPHEADER,array(
			"Content-type: application/json",
			"token: $token"
		));
		$json_response = curl_exec($curl);
		$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		if ( $status != 200) {
				//die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
				$response = "Failed ".$json_response;


		}else{

			curl_close($curl);
			$responses = json_decode($json_response, true);
			foreach($responses['data'] as $row){
				if($row['status']=='102'){


				$nib="'".$row['nib']."'";
				$id_izin="'".$row['id_izin']."'";
				$create="'".$row['created_at']."'";
				$updates="'".$row['updated_at']."'";
				$status="'".$row['status']."'";
				$check=$this->Bu_model->get_permohonan_masuk_perubahan($row['id_izin']);
				if(empty($check)){
					$select="INSERT IGNORE INTO lsbu_permohonan_masuk_perubahan (nib,id_izin,tgl_create_izin,tgl_update_izin,status) VALUE ($nib,$id_izin,$create,$updates,$status)";
					$where="";
					$this->Bu_model->delete_opr($select,$where);
				}else{
					if($check[0]['status']!='103'){
						$select="REPLACE INTO lsbu_permohonan_masuk_perubahan (nib,id_izin,id_sub_klasifikasi,tgl_permohonan,tgl_create_izin,tgl_update_izin,status) SELECT $nib,$id_izin,id_sub_klasifikasi,NULL,$create,$updates,$status FROM lsbu_permohonan_masuk_perubahan";
						$where="WHERE id_izin=$id_izin";
						$this->Bu_model->delete_opr($select,$where);
					}
					
				}


			}
		}
			$response = "Success";
		}


				return $response;
	}
	function perbaikan_kbli(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}
		$this->get_perbaikan();
		$this->data = array(
			'record'=>$this->Bu_model->list_perbaikan(),

		);
		$this->template->load('menu/menu','perbaikan_kbli', $this->data);

	}
	function get_perbaikan(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}
		$record=$this->Bu_model->token_api_siki();
		$token=$record[0]['token'];
		$url = "https://siki.pu.go.id/siki-api/v1/perbaikan-sbu/kbli";

		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		//curl_setopt($curl, CURLOPT_POSTFIELDS, $data);post
		curl_setopt($curl, CURLOPT_HTTPHEADER,array(
			"Content-type: application/json",
			"token: $token"
		));
		$json_response = curl_exec($curl);
		$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		if ( $status != 200) {
				//die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
				$response = "Failed ".$json_response;


		}else{

			curl_close($curl);
			$responses = json_decode($json_response, true);
			foreach($responses['data'] as $row){
				$id_izin="'".$row['id_izin']."'";
				$kbli="'".$row['kbli']."'";
				$kbli_perbaikan="'".$row['kbli_perbaikan']."'";
				$created_at="'".$row['created_at']."'";
				$update_at="'".$row['updated_at']."'";
				$select="REPLACE INTO lsbu_perbaikan_kbli (id_izin,kbli,kbli_perbaikan,create_at,update_at) VALUE ($id_izin,$kbli,$kbli_perbaikan,$created_at,$update_at)";
				$where="";
				$this->Bu_model->delete_opr($select,$where);
			}
			$response = "Success";
		}


				return $response;
	}
	function update_password(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat()  OR $this->ion_auth->finance() OR $this->ion_auth->pelaksana() OR $this->ion_auth->koordinator_keuangan() OR $this->ion_auth->koordinator_sertifikasi()){

				$post = $this->input->post();
				$password=$this->security->xss_clean(trim($post['password']));
				$where=array(
					'Username'=>$this->security->xss_clean(trim($post['id']))
				);
				$data=array(
					'Password'=>substr(md5($password),-6),
				);
				$table='user';
				if($password!=''){
					$insert=$this->Bu_model->update_edit($where,$table,$data);
					if($insert=="Success"){
						$this->session->set_flashdata('title','Success');
						$this->session->set_flashdata('text','Password Berhasil Di Update');
						$this->session->set_flashdata('class', "success");
						redirect('dashboard/profile', 'refresh');
					}else{
						$this->session->set_flashdata('title','Failed');
						$this->session->set_flashdata('text','Password Gagal Di Update');
						$this->session->set_flashdata('class', "error");
						redirect('dashboard/profile', 'refresh');
					}
				}else{
					$this->session->set_flashdata('title','Warning');
					$this->session->set_flashdata('text','Password Tidak Boleh Kosong');
					$this->session->set_flashdata('class', "warning");
					redirect('dashboard/profile','refresh');
				}


			}else{
				$this->session->set_flashdata('title','Warning');
				$this->session->set_flashdata('text','Anda tidak memiliki akses');
				$this->session->set_flashdata('class', "warning");
				redirect('login','refresh');
			}
	}

	function profile(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}
		$id_user=$this->session->userdata('id_user');
		$this->data=array(
			'record'=>$this->Bu_model->get_profile($id_user)
		);
		$this->template->load('menu/menu','profile', $this->data);
	}
	function biaya(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}
		$id_user=$this->session->userdata('id_user');
		$this->data=array(
			'record'=>$this->Bu_model->get_biaya()
		);
		$this->template->load('menu/menu','biaya', $this->data);
	}
	function update_profile(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}
		$id_user=$this->session->userdata('id_user');
		$post = $this->input->post();
		$email=$this->security->xss_clean(trim($post['email']));
		$nama=$this->security->xss_clean(trim($post['nama']));
		$data=array(
			'Email'=>$email,
			'Nama'=>$nama
		);
		$where=array(
			'Username'=>$id_user
		);
		$table="user";
		$insert_sad=$this->Bu_model->update_edit($where,$table,$data);
		echo json_encode(array('result' => 1));
	}

	function get_detail_asesor(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana() OR $this->ion_auth->koordinator_keuangan() OR $this->ion_auth->koordinator_sertifikasi()){
			$post = $this->input->post();
			$id_asesor=$this->security->xss_clean(trim($post['id_asesor']));
			$nib=$this->security->xss_clean(trim($post['nib']));
			$tgl_awal=$this->security->xss_clean(trim($post['tgl_1']));
			$tgl_akhir=$this->security->xss_clean(trim($post['tgl_2']));
			$response=array(
				'record'=>$this->Bu_model->search_asesor_detail($id_asesor,$nib,$tgl_awal,$tgl_akhir)
			);
			echo json_encode($response);
		}
	}
		function detail_asesor($id){
			if (!$this->ion_auth->ceklogin())
			{
				$this->session->set_flashdata('title','Login Gagal');
				$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
				$this->session->set_flashdata('class', "warning");
				redirect('login', 'refresh');
			}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana() OR $this->ion_auth->koordinator_keuangan() OR $this->ion_auth->koordinator_sertifikasi()){
				$id_asesor=decrypt_url($id);
				$this->data=array(
					'id_asesor'=>$id_asesor
				);
				$this->template->load('menu/menu','detail_asesor', $this->data);

			}
		}


	function data_permohonan(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->finance() OR $this->ion_auth->pelaksana() OR $this->ion_auth->koordinator_keuangan() OR $this->ion_auth->koordinator_sertifikasi()){
			$now=date('m');
			$tahun_0=date('Y');
			$bulan_1=date('m', strtotime(date('Y-m')." -1 month"));
			$tahun_1=date('Y', strtotime(date('Y-m')." -1 month"));
			$bulan_2=date('m', strtotime(date('Y-m')." -2 month"));
			$tahun_2=date('Y', strtotime(date('Y-m')." -2 month"));
			$bulan_3=date('m', strtotime(date('Y-m')." -3 month"));
			$tahun_3=date('Y', strtotime(date('Y-m')." -3 month"));
			$bulan_4=date('m', strtotime(date('Y-m')." -4 month"));
			$tahun_4=date('Y', strtotime(date('Y-m')." -4 month"));
			$bulan_5=date('m', strtotime(date('Y-m')." -5 month"));
			$tahun_5=date('Y', strtotime(date('Y-m')." -5 month"));
			$bulan_6=date('m', strtotime(date('Y-m')." -6 month"));
			$tahun_6=date('Y', strtotime(date('Y-m')." -6 month"));
			$array_bulan=array(
				'bulan_0'=>$this->getBulan($now)."-".$tahun_0,
				'bulan_1'=>$this->getBulan($bulan_1)."-".$tahun_1,
				'bulan_2'=>$this->getBulan($bulan_2)."-".$tahun_2,
				'bulan_3'=>$this->getBulan($bulan_3)."-".$tahun_3,
				'bulan_4'=>$this->getBulan($bulan_4)."-".$tahun_4,
				'bulan_5'=>$this->getBulan($bulan_5)."-".$tahun_5,
			);
			$data_0_awal=date("Y-m")."-01";
			$data_0_akhir="";
			$data_1_awal=date('Y-m-d', strtotime(date('Y-m')." -1 month"));
			$data_2_awal=date('Y-m-d', strtotime(date('Y-m')." -2 month"));
			$data_3_awal=date('Y-m-d', strtotime(date('Y-m')." -3 month"));
			$data_4_awal=date('Y-m-d', strtotime(date('Y-m')." -4 month"));
			$data_5_awal=date('Y-m-d', strtotime(date('Y-m')." -5 month"));
			$bulan_0_data=$this->Bu_model->get_jumlah_permohonan($data_0_awal,$data_0_akhir);
			$bulan_1_data=$this->Bu_model->get_jumlah_permohonan($data_1_awal,$data_0_awal);
			$bulan_2_data=$this->Bu_model->get_jumlah_permohonan($data_2_awal,$data_1_awal);
			$bulan_3_data=$this->Bu_model->get_jumlah_permohonan($data_3_awal,$data_2_awal);
			$bulan_4_data=$this->Bu_model->get_jumlah_permohonan($data_4_awal,$data_3_awal);
			$bulan_5_data=$this->Bu_model->get_jumlah_permohonan($data_5_awal,$data_4_awal);
			$array_permohonan=array(
				'bulan_0'=>$bulan_0_data[0]['jumlah'],
				'bulan_1'=>$bulan_1_data[0]['jumlah'],
				'bulan_2'=>$bulan_2_data[0]['jumlah'],
				'bulan_3'=>$bulan_3_data[0]['jumlah'],
				'bulan_4'=>$bulan_4_data[0]['jumlah'],
				'bulan_5'=>$bulan_5_data[0]['jumlah'],
			);
			$response=array(
				'bulan'=>$array_bulan,
				'value'=>$array_permohonan
			);
			echo json_encode($response);
		}
	}
	function data_biaya(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana() OR $this->ion_auth->koordinator_keuangan() OR $this->ion_auth->koordinator_sertifikasi()){
			$now=date('m');
			$tahun_0=date('Y');
			$bulan_1=date('m', strtotime(date('Y-m')." -1 month"));
			$tahun_1=date('Y', strtotime(date('Y-m')." -1 month"));
			$bulan_2=date('m', strtotime(date('Y-m')." -2 month"));
			$tahun_2=date('Y', strtotime(date('Y-m')." -2 month"));
			$bulan_3=date('m', strtotime(date('Y-m')." -3 month"));
			$tahun_3=date('Y', strtotime(date('Y-m')." -3 month"));
			$bulan_4=date('m', strtotime(date('Y-m')." -4 month"));
			$tahun_4=date('Y', strtotime(date('Y-m')." -4 month"));
			$bulan_5=date('m', strtotime(date('Y-m')." -5 month"));
			$tahun_5=date('Y', strtotime(date('Y-m')." -5 month"));
			$bulan_6=date('m', strtotime(date('Y-m')." -6 month"));
			$tahun_6=date('Y', strtotime(date('Y-m')." -6 month"));
			$array_bulan=array(
				'bulan_0'=>$this->getBulan($now)."-".$tahun_0,
				'bulan_1'=>$this->getBulan($bulan_1)."-".$tahun_1,
				'bulan_2'=>$this->getBulan($bulan_2)."-".$tahun_2,
				'bulan_3'=>$this->getBulan($bulan_3)."-".$tahun_3,
				'bulan_4'=>$this->getBulan($bulan_4)."-".$tahun_4,
				'bulan_5'=>$this->getBulan($bulan_5)."-".$tahun_5,
			);
			$data_0_awal=date("Y-m")."-01";
			$data_0_akhir="";
			$data_1_awal=date('Y-m-d', strtotime(date('Y-m')." -1 month"));
			$data_2_awal=date('Y-m-d', strtotime(date('Y-m')." -2 month"));
			$data_3_awal=date('Y-m-d', strtotime(date('Y-m')." -3 month"));
			$data_4_awal=date('Y-m-d', strtotime(date('Y-m')." -4 month"));
			$data_5_awal=date('Y-m-d', strtotime(date('Y-m')." -5 month"));
			$bulan_0_data=$this->Bu_model->get_jumlah_biaya($data_0_awal,$data_0_akhir);
			$bulan_1_data=$this->Bu_model->get_jumlah_biaya($data_1_awal,$data_0_awal);
			$bulan_2_data=$this->Bu_model->get_jumlah_biaya($data_2_awal,$data_1_awal);
			$bulan_3_data=$this->Bu_model->get_jumlah_biaya($data_3_awal,$data_2_awal);
			$bulan_4_data=$this->Bu_model->get_jumlah_biaya($data_4_awal,$data_3_awal);
			$bulan_5_data=$this->Bu_model->get_jumlah_biaya($data_5_awal,$data_4_awal);
			if(!empty($bulan_0_data)){
				$bulan0x=$bulan_0_data[0]['biaya_lsbu']*1000;
			}else{
				$bulan0x=0;
			}
			if(!empty($bulan_1_data)){
				$bulan1x=$bulan_1_data[0]['biaya_lsbu']*1000;
			}else{
				$bulan1x=0;
			}
			if(!empty($bulan_2_data)){
				$bulan2x=$bulan_2_data[0]['biaya_lsbu']*1000;
			}else{
				$bulan2x=0;
			}
			if(!empty($bulan_3_data)){
				$bulan3x=$bulan_3_data[0]['biaya_lsbu']*1000;
			}else{
				$bulan3x=0;
			}
			if(!empty($bulan_4_data)){
				$bulan4x=$bulan_4_data[0]['biaya_lsbu']*1000;
			}else{
				$bulan4x=0;
			}
			if(!empty($bulan_5_data)){
				$bulan5x=$bulan_5_data[0]['biaya_lsbu']*1000;
			}else{
				$bulan5x=0;
			}
			$array_permohonan=array(
				'bulan_0'=>$bulan0x,
				'bulan_1'=>$bulan1x,
				'bulan_2'=>$bulan2x,
				'bulan_3'=>$bulan3x,
				'bulan_4'=>$bulan4x,
				'bulan_5'=>$bulan5x,
			);
			$response=array(
				'bulan'=>$array_bulan,
				'value'=>$array_permohonan
			);
			echo json_encode($response);
		}
	}

	function master_api(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana() OR $this->ion_auth->koordinator_keuangan() OR $this->ion_auth->koordinator_sertifikasi()){


		$this->data = array(
			'api'=>$this->Bu_model->get_api_master(),

		);
		$this->template->load('menu/menu','sertifikasi/master_api', $this->data);
	}else{
		$this->session->set_flashdata('title','Warning');
		$this->session->set_flashdata('text','Anda tidak memiliki akses');
		$this->session->set_flashdata('class', "warning");
		redirect('login','refresh');
	}
	}


	function master_peralatan(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana() OR $this->ion_auth->koordinator_keuangan() OR $this->ion_auth->koordinator_sertifikasi() OR $this->ion_auth->badan_usaha()){


		$this->data = array(
			'peralatan'=>$this->Bu_model->get_peralatan_master(),

		);
		$this->template->load('menu/menu','sertifikasi/master_peralatan', $this->data);
	}else{
		$this->session->set_flashdata('title','Warning');
		$this->session->set_flashdata('text','Anda tidak memiliki akses');
		$this->session->set_flashdata('class', "warning");
		redirect('login','refresh');
	}
	}
	function master_asesor(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana() OR $this->ion_auth->koordinator_keuangan() OR $this->ion_auth->koordinator_sertifikasi() OR $this->ion_auth->badan_usaha()){


		$this->data = array(
			'asesor'=>$this->Bu_model->get_master_asesor(),
		);
		$this->template->load('menu/menu','sertifikasi/master_asesor', $this->data);
	}else{
		$this->session->set_flashdata('title','Warning');
		$this->session->set_flashdata('text','Anda tidak memiliki akses');
		$this->session->set_flashdata('class', "warning");
		redirect('login','refresh');
	}
	}
	function acc_user(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana() OR $this->ion_auth->koordinator_keuangan() OR $this->ion_auth->koordinator_sertifikasi() OR $this->ion_auth->badan_usaha()){
			$post = $this->input->post();
		  $id=$this->security->xss_clean(trim($post['username']));
			$select="UPDATE user SET status_aktif='1'";
			$where="WHERE Username IN ($id)";
			$record=$this->Bu_model->update($select,$where);
			if($record=='Success'){
				$this->session->set_flashdata('title','Notification');
				$this->session->set_flashdata('text','Data Berhasil Diinput');
				$this->session->set_flashdata('class', "success");
				redirect('dashboard/vv_user','refresh');
			}else{
				$this->session->set_flashdata('title','Warning');
				$this->session->set_flashdata('text','Data Gagal Diinput');
				$this->session->set_flashdata('class', "warning");
				redirect('dashboard/vv_user','refresh');
			}

		}
	}
	function vv_user(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana() OR $this->ion_auth->koordinator_keuangan() OR $this->ion_auth->koordinator_sertifikasi() OR $this->ion_auth->badan_usaha()){
		$id_bu=$this->session->userdata('id_user');
		$propinsi=$this->Bu_model->provinsi();
		$kabupaten=$this->Bu_model->kabupaten();
		$this->data = array(
			'record'=>$this->Bu_model->vv_user()
		);
		$this->template->load('menu/menu','vv_user', $this->data);
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
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->pelaksana() OR $this->ion_auth->koordinator_keuangan() OR $this->ion_auth->koordinator_sertifikasi()OR $this->ion_auth->pemutus()){

		$history=array();
		$asesor=$this->Bu_model->get_asesi();
    $this->data = array(
			'asesor'=>$asesor,
			'history'=>$history
    );
    $this->template->load('menu/menu','dashboard', $this->data);
	}else{
		$this->session->set_flashdata('title','Warning');
		$this->session->set_flashdata('text','Anda tidak memiliki akses');
		$this->session->set_flashdata('class', "warning");
		redirect('login','refresh');
	}
	}
	function dashboard2(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->admin_rekomendasi() OR $this->ion_auth->admin_get() OR $this->ion_auth->admin_cabut() OR $this->ion_auth->pelaksana() OR $this->ion_auth->koordinator_keuangan() OR $this->ion_auth->koordinator_sertifikasi()OR $this->ion_auth->pemutus()OR $this->ion_auth->finance()OR $this->ion_auth->the()){
			$tgl_now=date('Y-m-d');
			$tgl_perm=date('Y-m-d');
			$tgl_awal=date('Y-m-d',strtotime($tgl_perm . "-7 days"));
			$tgl_now2=$tgl_now.' 23:59:59';
			$tgl_awal2=$tgl_awal.' 00:00:01';
			// $this->data = array(
			// 	'permohonan_masuk'=>$this->Bu_model->get_permohonan_masuk_7($tgl_awal2,$tgl_now2),
			// 	'permohonan_tinjauan'=>$this->Bu_model->get_permohonan_tinjauan_7($tgl_awal,$tgl_now),
			// 	'permohonan_tinjauan_hapus'=>$this->Bu_model->get_permohonan_tinjauan_7_hapus($tgl_awal,$tgl_now),
			// 	'permohonan_cetak'=>$this->Bu_model->get_permohonan_cetak_7($tgl_awal,$tgl_now),
			// );
			$this->data = array(
				'permohonan_masuk'=>array(),
				'permohonan_tinjauan'=>array(),
				'permohonan_tinjauan_hapus'=>array(),
				'permohonan_cetak'=>array(),
			);

			$this->template->load('menu/menu','dashboard2', $this->data);
	}else{
		$this->session->set_flashdata('title','Warning');
		$this->session->set_flashdata('text','Anda tidak memiliki akses');
		$this->session->set_flashdata('class', "warning");
		redirect('login','refresh');
	}
	}
		function get_permohonan(){
	  if (!$this->ion_auth->ceklogin())
	  {
	    $this->session->set_flashdata('title','Login Gagal');
	    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
	    $this->session->set_flashdata('class', "warning");
	    redirect('login', 'refresh');
	  }
	  $record=$this->Bu_model->token_api_siki();
	  $token=$record[0]['token'];
	  $url = "https://siki.pu.go.id/siki-api/v1/permohonan-sbu";

	  $curl = curl_init($url);
	  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
	  curl_setopt($curl, CURLOPT_HEADER, false);
	  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	  //curl_setopt($curl, CURLOPT_POSTFIELDS, $data);post
	  curl_setopt($curl, CURLOPT_HTTPHEADER,array(
	    "Content-type: application/json",
	    "token: $token"
	  ));
	  $json_response = curl_exec($curl);
	  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	  if ( $status != 200) {
	      //die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
	      $response = "Failed ".$json_response;


	  }else{

	    curl_close($curl);
	    $responses = json_decode($json_response, true);
	    foreach($responses['data'] as $row){
			if($row['status']!='101' AND $row['status']!='102' AND $row['status']!='103'){
				if($row['updated_at']>='2024-05-01 03:59:19'){
					$nib="'".$row['nib']."'";
					$id_izin="'".$row['id_izin']."'";
					$create="'".$row['created_at']."'";
					$updates="'".$row['updated_at']."'";
					$select="REPLACE INTO lsbu_permohonan_masuk (nib,id_izin,tgl_create_izin,tgl_update_izin) VALUE ($nib,$id_izin,$create,$updates)";
					$where="";
					$this->Bu_model->delete_opr($select,$where);
				}
			}
		}
	    $response = "Success";
	  }


	      return $response;
	}
	function get_permohonan_perpanjangan(){
	  if (!$this->ion_auth->ceklogin())
	  {
	    $this->session->set_flashdata('title','Login Gagal');
	    $this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
	    $this->session->set_flashdata('class', "warning");
	    redirect('login', 'refresh');
	  }
	  $record=$this->Bu_model->token_api_siki();
	  $token=$record[0]['token'];
	  $url = "https://siki.pu.go.id/siki-api/v1/permohonan-sbu";

	  $curl = curl_init($url);
	  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
	  curl_setopt($curl, CURLOPT_HEADER, false);
	  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	  //curl_setopt($curl, CURLOPT_POSTFIELDS, $data);post
	  curl_setopt($curl, CURLOPT_HTTPHEADER,array(
	    "Content-type: application/json",
	    "token: $token"
	  ));
	  $json_response = curl_exec($curl);
	  $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	  if ( $status != 200) {
	      //die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
	      $response = "Failed ".$json_response;


	  }else{

	    curl_close($curl);
	    $responses = json_decode($json_response, true);
	    foreach($responses['data'] as $row){
			if($row['status']=='103'){
				if($row['updated_at']>='2024-05-01 03:59:19'){
					$nib="'".$row['nib']."'";
					$id_izin="'".$row['id_izin']."'";
					$create="'".$row['created_at']."'";
					$updates="'".$row['updated_at']."'";
					$select="REPLACE INTO lsbu_permohonan_masuk (nib,id_izin,tgl_create_izin,tgl_update_izin,status,perpanjangan) VALUE ($nib,$id_izin,$create,$updates,'103','1')";
					$where="";
					$this->Bu_model->delete_opr($select,$where);
				}
			}
		}
	    $response = "Success";
	  }


	      return $response;
	}
	function permohonan_masuk2(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}if ($this->ion_auth->admin_pusat() OR $this->ion_auth->admin_get() OR $this->ion_auth->finance())
		{


		$this->get_permohonan();
		$data=$this->Bu_model->list_permohonan_masuk();
	  $record=array();
	  foreach ($data as $row) {
	    $get=$this->Bu_model->get_revisi($row['NIB'],$row['tgl_permohonan']);
	    if(empty($get)){
	      $status="0";
	    }else{
	      foreach($get as $row_revisi){
	        if($row_revisi['status']=='0'){
	          $status="1";
	          break;
	        }else{
	          $status="2";
	        }
	      }
	    }
	    $datax=array(
				'tgl_permohonan_banding'=>$row['tgl_permohonan_banding'],
				'biaya_lsbu'=>$row['biaya_lsbu'],
				'id_izin'=>$row['id_izin'],
				'tgl_create_izin'=>$row['tgl_create_izin'],
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
	      'stat'=>$status,
	    );
	    array_push($record,$datax);
	  }
	  $this->data = array(
	    'record'=>$record,

	  );
		$this->template->load('menu/menu','permohonan_masuk2', $this->data);
	}else{
		redirect('login', 'refresh');
	}
	}
	function permohonan_masukxy(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}
		$this->get_permohonan();
		$data=$this->Bu_model->list_permohonan_masuk();
		$record=array();
		foreach ($data as $row) {
			$get=$this->Bu_model->get_revisi($row['NIB'],$row['tgl_permohonan']);
			if(empty($get)){
				$status="0";
			}else{
				foreach($get as $row_revisi){
					if($row_revisi['status']=='0'){
						$status="1";
						break;
					}else{
						$status="2";
					}
				}
			}
			$datax=array(
				'tgl_permohonan_banding'=>$row['tgl_permohonan_banding'],
				'biaya_lsbu'=>$row['biaya_lsbu'],
				'id_izin'=>$row['id_izin'],
				'tgl_create_izin'=>$row['tgl_create_izin'],
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
				'stat'=>$status,
			);
			array_push($record,$datax);
		}
		$this->data = array(
			'record'=>$record,

		);
		$this->template->load('menu/menu','permohonan_masukx', $this->data);

	}
	function permohonan_masuk_perpanjangan(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}
		$this->get_permohonan_perpanjangan();
		$data=$this->Bu_model->list_permohonan_masuk_perpanjangan();
		$record=array();
		foreach ($data as $row) {
			$get=$this->Bu_model->get_revisi($row['NIB'],$row['tgl_permohonan']);
			if(empty($get)){
				$status="0";
			}else{
				foreach($get as $row_revisi){
					if($row_revisi['status']=='0'){
						$status="1";
						break;
					}else{
						$status="2";
					}
				}
			}
			$datax=array(
				'tgl_permohonan_banding'=>$row['tgl_permohonan_banding'],
				'biaya_lsbu'=>$row['biaya_lsbu'],
				'id_izin'=>$row['id_izin'],
				'tgl_create_izin'=>$row['tgl_create_izin'],
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
				'status'=>$row['status'],
				'stat'=>$status,
			);
			array_push($record,$datax);
		}
		$this->data = array(
			'record'=>$record,

		);
		$this->template->load('menu/menu','permohonan_masuk_perpanjangan', $this->data);

	}
	function permohonan_masuk(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}
		$this->get_permohonan();
		$data=$this->Bu_model->list_permohonan_masuk();
		$record=array();
		foreach ($data as $row) {
			$get=$this->Bu_model->get_revisi($row['NIB'],$row['tgl_permohonan']);
			if(empty($get)){
				$status="0";
			}else{
				foreach($get as $row_revisi){
					if($row_revisi['status']=='0'){
						$status="1";
						break;
					}else{
						$status="2";
					}
				}
			}
			$datax=array(
				'tgl_permohonan_banding'=>$row['tgl_permohonan_banding'],
				'biaya_lsbu'=>$row['biaya_lsbu'],
				'id_izin'=>$row['id_izin'],
				'tgl_create_izin'=>$row['tgl_create_izin'],
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
				'stat'=>$status,
			);
			array_push($record,$datax);
		}
		$this->data = array(
			'record'=>$record,

		);
		$this->template->load('menu/menu','permohonan_masukxy', $this->data);

	}
	function getBulan($bln){
	      switch ($bln){
	        case 1:
	          return "Januari";
	          break;
	        case 2:
	          return "Februari";
	          break;
	        case 3:
	          return "Maret";
	          break;
	        case 4:
	          return "April";
	          break;
	        case 5:
	          return "Mei";
	          break;
	        case 6:
	          return "Juni";
	          break;
	        case 7:
	          return "Juli";
	          break;
	        case 8:
	          return "Agustus";
	          break;
	        case 9:
	          return "September";
	          break;
	        case 10:
	          return "Oktober";
	          break;
	        case 11:
	          return "November";
	          break;
	        case 12:
	          return "Desember";
	          break;
	      }
	    }

}
?>

