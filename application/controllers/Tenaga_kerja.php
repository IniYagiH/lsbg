<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tenaga_kerja extends CI_Controller
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
		$rec=$this->Bu_model->detele_tenaga_kerja($nib,$id);
		if($rec=='Success'){
			$this->session->set_flashdata('title','Success');
			$this->session->set_flashdata('text','Data berhasil dihapus');
			$this->session->set_flashdata('class', "success");
			redirect('tenaga_kerja','refresh');
		}else{
			$this->session->set_flashdata('title','Failed');
			$this->session->set_flashdata('text','Data gagal dihapus');
			$this->session->set_flashdata('class', "warning");
			redirect('tenaga_kerja','refresh');
		}
		}else{
			$this->session->set_flashdata('title','Warning');
			$this->session->set_flashdata('text','Anda tidak memiliki akses');
			$this->session->set_flashdata('class', "warning");
			redirect('login','refresh');
		}
	}
	function cek_tenaga_kerja(){
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
		$select="SELECT * FROM lsbu_tenaga_kerja";
		$where="WHERE noreg='$id' AND NIB='$nib'";
		$record=$this->Bu_model->searching($select,$where);
		$response = array(
										'pjbu'=>$this->Bu_model->cek_pjbu($nib),
										'pjt'=>$this->Bu_model->cek_pjt($nib),
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
		$id=$this->Bu_model->biodata_search($nib);
		if($id[0]['sifat_usaha']=="1"){
			$sifat_usaha="1";
		}else{
			$sifat_usaha="2";
		}
		$propinsi=$this->Bu_model->provinsi();
    $this->data = array(
			'cek'=>$this->Bu_model->cek_pjbu($nib),
			'cek_pjt'=>$this->Bu_model->cek_pjt($nib),
	    'propinsi'=>$propinsi,
	    'klasifikasi'=>$this->Bu_model->klasifikasi_tk_ahli(),
	    'klasifikasi_bu'=>$this->Bu_model->klasifikasi_bu_2020_sifat_usaha($sifat_usaha),
	    'sub_klasifikasi'=>$this->Bu_model->sub_klasifikasi_bu_2020_sifat_usaha($sifat_usaha),
	    'record'=>$this->Bu_model->tenaga_kerja_opr($nib),
    );
    $this->template->load('menu/menu','bu/tenaga_kerja', $this->data);
	}else{
		$this->session->set_flashdata('title','Warning');
		$this->session->set_flashdata('text','Anda tidak memiliki akses');
		$this->session->set_flashdata('class', "warning");
		redirect('login','refresh');
	}
	}
	function edit_tenaga_kerja($id,$id2){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->badan_usaha()){

    $id_bu=$this->session->userdata('id_bu');
	    $noreg=decrypt_url($id);
	    $sub=decrypt_url($id2);

	    $tenaga_kerja=$this->Bu_model->tenaga_kerja_search($id_bu,$noreg);
	    if($tenaga_kerja[0]['Tenaga_kerja']=='AHLI'){
	      $sub_bidang=$this->Bu_model->tenaga_kerja_sub_bidang($noreg);

	    }else{
	      $id_personal=$tenaga_kerja[0]['id_personal'];
	      $sub_bidang=$this->Bu_model->tenaga_kerja_sub_bidang_trampil($noreg,$id_personal);

	    }
	    if(empty($sub_bidang)){
	      $this->session->set_flashdata('title','Info');
	      $this->session->set_flashdata('text','Tenaga kerja ini sudah tidak memiliki sertifikat yang aktif sehingga tidak bisa melakukan edit, mohon untuk memperbarui sertifikat tenaga kerja ini terlebih dahulu');
	      $this->session->set_flashdata('class', "bg-warning");
	      $status='FALSE';
	    }else{
	      $status='TRUE';
	    }
	    $this->data = array(
	      'klasifikasi'=>$this->Bu_model->klasifikasi_tk_ahli(),
	      'klasifikasi_bu'=>$this->Bu_model->klasifikasi_bu(),
	      'sub_klasifikasi'=>$this->Bu_model->klasifikasi_bu_sub(),
	      'decr'=>$id,
	      'tenaga_kerja'=>$tenaga_kerja,
	      'sub_bidang'=>$sub_bidang,
	      'status'=>$status
	    );

	    $this->template->load('menu/menu','bu/edit_tenaga_kerja', $this->data);
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
	  $noreg=$this->security->xss_clean(trim($post['id']));

	  $nib=$this->session->userdata('id_user');
	  $upload_23=NULL;
	  if($_FILES['file_sertifikat']['name'])
	  {
	    $this->load->library('upload');
	    $id_user=$this->session->userdata('id_user');
	    $nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	    $config23['upload_path'] = './assets/bukti/badan_usaha/23_photo_copy_ska_tk';
	    $config23['allowed_types'] = 'pdf|jpg|jpeg|png';
	    $config23['overwrite'] = TRUE;
	    $config23['file_name'] = $nmfile;
	    $this->upload->initialize($config23);
	    if($this->upload->do_upload('file_sertifikat')){
	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	      $alamat="./assets/bukti/badan_usaha/23_photo_copy_ska_tk/";

	      $upload_23=$gbr['file_name'];
	      $data_23=array(
	        'persyaratan_23'=>$upload_23
	      );
	      $table='bu_tenaga_kerja_kbli';
	      $where=array(
	        'NIB'=>$nib,
	        'noreg'=>$noreg
	      );
	      $this->Bu_model->update_edit($where,$table,$data_23);

	    }
	  }else{
	    $upload_23="NULL";
	  }



	  $upload_28=NULL;
	  if($_FILES['file_riwayat']['name'])
	  {
	    $this->load->library('upload');
	    $id_user=$this->session->userdata('id_user');
	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	    $config28['upload_path'] = './assets/bukti/badan_usaha/28_pernyataan_bukan_pns';
	    $config28['allowed_types'] = 'pdf|jpg|jpeg|png';
	    $config28['overwrite'] = TRUE;
	    $config28['file_name'] = $nmfile;
	    $this->upload->initialize($config28);
	    if($this->upload->do_upload('file_riwayat')){
	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	      $alamat="./assets/bukti/badan_usaha/28_pernyataan_bukan_pns/";

	      $upload_28=$gbr['file_name'];
	      $data_28=array(
	        'persyaratan_28'=>$upload_28
	      );
	      $table='bu_tenaga_kerja_kbli';
	      $where=array(
	        'NIB'=>$nib,
	        'noreg'=>$noreg
	      );
	      $this->Bu_model->update_edit($where,$table,$data_28);
	    }
	  }else{
	    $upload_28="NULL";
	  }






	      if(isset($_POST['PJT'])){
	        $pjt=1;
	      }else{
	        $pjt=0;
	      }
				if(isset($_POST['PJBU'])){
				 $pjbu=1;
			 }else{
				 $pjbu=0;
			 }
	      if(isset($_POST['PJK'])){
	        $pjk=1;
	        $klas1="";
	        $klas2="";
	      }else{
	        $pjk=0;
	        $klas1='';
	        $klas2='';
	      }
	      if(isset($_POST['ta_tetap'])){
	        $pjsk=1;
	        $tatetap1=$this->security->xss_clean(trim($post['sub_klasifikasi_tetap']));
	        $tatetap2="";
	      }else{
	        $pjsk=0;
	        $tatetap1='';
	        $tatetap2='';
	      }



	      $data=array(
	        'nama'=>$this->security->xss_clean(trim($post['nama'])),
	        'tgl_lahir'=>$this->security->xss_clean(trim($post['tgl_lahir'])),
	        'no_ktp'=>$this->security->xss_clean(trim($post['ktps'])),
	        'alamat'=>$this->security->xss_clean(trim($post['alamat'])),
	        'kodepos'=>$this->security->xss_clean(trim($post['kode_pos'])),
	        'pendidikan_akhir'=>$this->security->xss_clean(trim($post['pendidikan_akhir'])),
	        'no_ijazah'=>$this->security->xss_clean(trim($post['no_ijazah'])),
	        'id_bidang'=>$this->security->xss_clean(trim($post['klasifikasi'])),
					'id_sub_bidang'=>$this->security->xss_clean(trim($post['sub_klasifikasi'])),
	        'id_kualifikasi'=>$this->security->xss_clean(trim($post['kualifikasi'])),
	        'pjt'=>$pjt,

	        'pjsk'=>$pjsk,
	        'noreg'=>$this->security->xss_clean(trim($post['noreg'])),
	        'thn_lulus'=>$this->security->xss_clean(trim($post['tahun_lulus'])),

	        'id_sub_klasifikasi_pjsk1'=>$tatetap1,
	        'id_sub_klasifikasi_pjsk2'=>$tatetap2,
					'pjbu'=>$pjbu,
	        'npwp'=>$this->security->xss_clean(trim($post['npwp'])),
	      );
	      $table='lsbu_tenaga_kerja';
	      $where=array(
	        'NIB'=>$nib,
	        'noreg'=>$noreg
	      );
	      $insert=$this->Bu_model->update_edit($where,$table,$data);
	      if($insert=="Success"){
	        $this->session->set_flashdata('title','Success');
	        $this->session->set_flashdata('text','Tenaga Kerja Berhasil Di Update');
	        $this->session->set_flashdata('class', "success");
	        redirect('badan_usaha/tenaga_kerja', 'refresh');
	      }else{
	        $this->session->set_flashdata('title','Failed');
	        $this->session->set_flashdata('text','Tenaga Kerja Gagal Di Update');
	        $this->session->set_flashdata('class', "error");
	        redirect('badan_usaha/tenaga_kerja', 'refresh');
	      }

		}else{
			$this->session->set_flashdata('title','Warning');
			$this->session->set_flashdata('text','Anda tidak memiliki akses');
			$this->session->set_flashdata('class', "warning");
			redirect('login','refresh');
		}
	}

	function sub_klasifikasi_search(){
	  $post = $this->input->post();
	  $id_klasifikasi=$post['id_klasifikasi'];
	  $category=$post['category_tk'];
	  if($category=="ahli"){
	    $select="SELECT * FROM sub_bidang_keahlian_kbli";
	    $where="WHERE ID_Keahlian='$id_klasifikasi' AND aktif='1'";
	  }elseif($category=="trampil"){
	    $select="SELECT * FROM sub_bidang_ketrampilan";
	    $where="WHERE ID_Ketrampilan='$id_klasifikasi'";
	  }
	  $record=$this->Bu_model->searching($select,$where);
	  $response = array(
	                  'record' =>$record,
	                  'category'=>$category
	                );

	      echo json_encode($response);
	}
	function sub_klasifikasi_search_bu(){
	  $post = $this->input->post();
	  $id_klasifikasi=$post['id_klasifikasi'];

	    $select="SELECT * FROM bu_klasifikasi_sub_kbli";
	    $where="WHERE id_klasifikasi='$id_klasifikasi'";
	  $record=$this->Bu_model->searching($select,$where);
	  $response = array(
	                  'record' =>$record
	                );

	      echo json_encode($response);
	}
	function klasifikasi_trampil(){
	  $record=$this->Bu_model->klasifikasi_tk_trampil();
	  $response = array(
	                  'record' =>$record
	                );

	      echo json_encode($response);
	}
	function klasifikasi_ahli(){
	  $record=$this->Bu_model->klasifikasi_tk_ahli();
	  $response = array(
	                  'record' =>$record
	                );

	      echo json_encode($response);
	}
	function cek_noreg(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->badan_usaha()){

	  $post = $this->input->post();
	  $noreg=$post['noreg'];
	  $option=$post['option'];
	  $sub_klasifikasi=$post['sub_klasifikasi'];
	  $propinsi=$post['propinsi_value'];
	  $nama_value=null;
	  $npwp=null;
	  $propinsi2=null;
	  $cek_habis=null;

	  if($option=="ta"){
	    $record=$this->Bu_model->tenaga_ahli($noreg,$sub_klasifikasi);
	    $rec=$record;
	    if(!empty($record)){
	      $cek_habis=$this->Bu_model->cek_habis_ta($record[0]['ID_Personal'],$sub_klasifikasi);
	    }


	    $tenaga_kerja="AHLI";
	  }elseif($option=="tt"){
	    $record=$this->Bu_model->tenaga_terampil($noreg,$propinsi,$sub_klasifikasi);
	    $rec=$record;
	    if(!empty($record)){
	      $cek_habis=$this->Bu_model->cek_habis_tt($record[0]['ID_Personal'],$sub_klasifikasi);
	    }
	    $tenaga_kerja="TRAMPIL";
	  }
	  if(!empty($record)){
	    foreach ($record as $key) {
	      $personal=$key['ID_Personal'];
	    }
	  }else{
	    $personal=null;
	  }
	  $record[0]['tenaga_k']=$tenaga_kerja;

	  $select1="SELECT count(*),id_bu FROM bu_ambil_ta_kbli";
	  $select2="SELECT count(*),id_bu FROM bu_ambil_tt";
	  $where="WHERE id_personal='$personal'";
	  $b=$this->Bu_model->searching($select1,$where);
	  $a=$this->Bu_model->searching($select2,$where);
	  if($a[0]['count(*)']==0 AND $b[0]['count(*)']==0){
	    $record2=0;
	  }else{
	    if($a[0]['count(*)']!=0){
	      $id_bu=$a[0]['id_bu'];
	    }else{
	      $id_bu=$b[0]['id_bu'];
	    }

	    $nama=$this->Bu_model->get_inform_noreg($id_bu);
	    $record2=1;
	    if(!empty($nama)){
	      $nama_value=$nama[0]['Nama'];
	      $npwp=$nama[0]['NPWP'];
	      $propinsi2=$nama[0]['nama_propinsi'];
	    }else{
	      $nama_value=null;
	      $npwp=null;
	      $propinsi2=null;
	    }

	  }

	  if($personal!=null){
	    $pendidikan=$this->Bu_model->pendidikan_get_tk($personal);
	  }else{
	    $pendidikan=array();
	  }

	  $response = array(
	                  'cek_habis'=>$cek_habis,
	                  'record' =>$record,
	                  'record2'=>$record2,
	                  'nama'=>$nama_value,
	                  'propinsi'=>$propinsi2,
	                  'npwp'=>$npwp,
	                  'rec'=>$rec,
	                  'pendidikan'=>$pendidikan

	                );

	      echo json_encode($response);
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
	  $upload_23=NULL;
	  if($_FILES['file_sertifikat']['name'])
	  {
	    $this->load->library('upload');
	    $id_user=$this->session->userdata('id_user');
	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	    $config23['upload_path'] = './assets/bukti/badan_usaha/23_photo_copy_ska_tk';
	    $config23['allowed_types'] = 'pdf|jpg|jpeg|png';
	    $config23['overwrite'] = TRUE;
	    $config23['file_name'] = $nmfile;
	    $this->upload->initialize($config23);
	    if($this->upload->do_upload('file_sertifikat')){
	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	      $alamat="./assets/bukti/badan_usaha/23_photo_copy_ska_tk/";

	      $upload_23=$gbr['file_name'];
	    }
	  }else{
	    $upload_23="NULL";
	  }






	  $upload_28=NULL;
	  if($_FILES['file_riwayat']['name'])
	  {
	    $this->load->library('upload');
	    $id_user=$this->session->userdata('id_user');
	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	    $config28['upload_path'] = './assets/bukti/badan_usaha/28_pernyataan_bukan_pns';
	    $config28['allowed_types'] = 'pdf|jpg|jpeg|png';
	    $config28['overwrite'] = TRUE;
	    $config28['file_name'] = $nmfile;
	    $this->upload->initialize($config28);
	    if($this->upload->do_upload('file_riwayat')){
	      $gbr = $this->upload->data();
	      $filename=$gbr['file_name'];
	      $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	      $alamat="./assets/bukti/badan_usaha/28_pernyataan_bukan_pns/";

	      $upload_28=$gbr['file_name'];
	    }
	  }else{
	    $upload_28="NULL";
	  }

	  $jenis_tk=$this->security->xss_clean(trim($post['radios15']));

	  $id_user=$this->session->userdata('id_user');



	    if (!empty($upload_23) AND !empty($upload_28) )
	    {

	      if(isset($_POST['PJT'])){
	        $pjt=1;
	      }else{
	        $pjt=0;
	      }
				if(isset($_POST['PJBU'])){
	        $pjbu=1;
	      }else{
	        $pjbu=0;
	      }

	        $pjk=0;
	        $klas1='';
	        $klas2='';

	      if(isset($_POST['ta_tetap'])){
	        $pjsk=1;
	        $tatetap1=$this->security->xss_clean(trim($post['sub_klasifikasi_tetap']));
	        $tatetap2='';
	      }else{
	        $pjsk=0;
	        $tatetap1='';
	        $tatetap2='';
	      }



	      $data=array(
	        'id_personal'=>$this->security->xss_clean(trim($post['ktps'])),
	        'NIB'=>$this->session->userdata('id_user'),
	        'nama'=>$this->security->xss_clean(trim($post['nama'])),
	        'tgl_lahir'=>$this->security->xss_clean(trim($post['tgl_lahir'])),
	        'no_ktp'=>$this->security->xss_clean(trim($post['ktps'])),
	        'alamat'=>$this->security->xss_clean(trim($post['alamat'])),
	        'kodepos'=>$this->security->xss_clean(trim($post['kode_pos'])),
	        'pendidikan_akhir'=>$this->security->xss_clean(trim($post['pendidikan_akhir'])),
	        'no_ijazah'=>$this->security->xss_clean(trim($post['no_ijazah'])),
	        'id_bidang'=>$this->security->xss_clean(trim($post['klasifikasi'])),
					'id_sub_bidang'=>$this->security->xss_clean(trim($post['sub_klasifikasi'])),
	        'id_kualifikasi'=>$this->security->xss_clean(trim($post['kualifikasi'])),
	        'pjt'=>$pjt,

	        'pjsk'=>$pjsk,
	        'tenaga_kerja'=>$this->security->xss_clean(trim($post['radios15'])),
	        'noreg'=>$this->security->xss_clean(trim($post['nomor_registrasi'])),
	        'thn_lulus'=>$this->security->xss_clean(trim($post['tahun_lulus'])),

	        'id_sub_klasifikasi_pjsk1'=>$tatetap1,
	        'id_sub_klasifikasi_pjsk2'=>$tatetap2,
					'pjbu'=>$pjbu,
	        'npwp'=>$this->security->xss_clean(trim($post['npwp'])),
	        'persyaratan_23'=>$upload_23,
	        'persyaratan_28'=>$upload_28,

	      );
	      $table='lsbu_tenaga_kerja';
	      $insert=$this->Bu_model->insert_sad($table,$data);
	      if($insert=="Success"){
	        $this->session->set_flashdata('title','Success');
	        $this->session->set_flashdata('text','Tenaga Kerja Berhasil Di Input');
	        $this->session->set_flashdata('class', "success");
	        redirect('tenaga_kerja', 'refresh');
	      }else{
	        $this->session->set_flashdata('title','Failed');
	        $this->session->set_flashdata('text','Tenaga Kerja Gagal Di Input');
	        $this->session->set_flashdata('class', "error");
	        redirect('tenaga_kerja', 'refresh');
	      }
	    }else{
	      $this->session->set_flashdata('title','Failed');
	      $this->session->set_flashdata('text','Persyaratan Gagal Diupload');
	      $this->session->set_flashdata('class', "error");
	      redirect('tenaga_kerja', 'refresh');
	    }
		}else{
			$this->session->set_flashdata('title','Warning');
			$this->session->set_flashdata('text','Anda tidak memiliki akses');
			$this->session->set_flashdata('class', "warning");
			redirect('login','refresh');
		}
	}

}
