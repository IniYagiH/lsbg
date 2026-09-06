<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Klasifikasi_kualifikasi extends CI_Controller
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
	function cek_klasifikasi_kualifikasi(){
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
		$select="SELECT * FROM lsbu_registrasi";
		$where="WHERE NIB='$nib' AND id_sub_klasifikasi='$id'";
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
	function kualifikasi(){
		$post = $this->input->post();
		$id_klasifikasi=$post['id_sub_klasifikasi'];
		$select="SELECT * FROM lsbu_klasifikasi_sub_kbli";
		$where="WHERE id_sub_klasifikasi='$id_klasifikasi'";
		$record=$this->Bu_model->searching($select,$where);
		$response = array(
										'record' =>$record
									);

				echo json_encode($response);
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
	  $klasifikasi_today=array();
		$propinsi=$this->Bu_model->provinsi();
		$this->data = array(
			'propinsi'=>$propinsi,
	    'klasifikasi_bu'=>$this->Bu_model->klasifikasi_bu_2020_sifat_usaha($sifat_usaha),
	    'record'=>$this->Bu_model->klasifikasi_kualifikasi_opr2($nib),
	    'klasifikasi_today'=>$klasifikasi_today
    );
    $this->template->load('menu/menu','bu/klasifikasi_kualifikasi', $this->data);
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
	  //$kualifikasi=$this->security->xss_clean(trim($post['kualifikasi']));
	  //$status_upload=$this->security->xss_clean(trim($post['qwe']));
	  //$kualf=$post['kualifikasi'];/*





	    $upload_10=NULL;
	    if($_FILES['file_kta']['name'])
	    {
	      $this->load->library('upload');
	      $id_user=$this->session->userdata('id_user');
	  $nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	      $config10['upload_path'] = './assets/bukti/badan_usaha/10_kta_asosiasi';
	      $config10['allowed_types'] = 'pdf|jpg|jpeg|png';
	      $config10['overwrite'] = TRUE;
	      $config10['file_name'] = $nmfile;
	      $this->upload->initialize($config10);
	      if($this->upload->do_upload('file_kta')){
	        $gbr = $this->upload->data();
	        $filename=$gbr['file_name'];
	        $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	        $alamat="./assets/bukti/badan_usaha/10_kta_asosiasi/";

	        $upload_10=$gbr['file_name'];
	      }
	    }else{
	      $upload_10="NULL";
	    }


	    $upload_3=NULL;
	    if($_FILES['file_pengantar']['name'])
	    {
	      $this->load->library('upload');
	      $id_user=$this->session->userdata('id_user');
	  $nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	      $config3['upload_path'] = './assets/bukti/badan_usaha/3_surat_pengantar_permohonan_subklas';
	      $config3['allowed_types'] = 'pdf|jpg|jpeg|png';
	      $config3['overwrite'] = TRUE;
	      $config3['file_name'] = $nmfile;
	      $this->upload->initialize($config3);
	      if($this->upload->do_upload('file_pengantar')){
	        $gbr = $this->upload->data();
	        $filename=$gbr['file_name'];
	        $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	        $alamat="./assets/bukti/badan_usaha/3_surat_pengantar_permohonan_subklas/";

	        $upload_3=$gbr['file_name'];
	      }
	    }else{
	      $upload_3="NULL";
	    }

	    $upload_4=NULL;
	    if($_FILES['file_permohonan']['name'])
	    {
	      $this->load->library('upload');
	      $id_user=$this->session->userdata('id_user');
	  $nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	      $config4['upload_path'] = './assets/bukti/badan_usaha/4_surat_permohonan_klasifikasi';
	      $config4['allowed_types'] = 'pdf|jpg|jpeg|png';
	      $config4['overwrite'] = TRUE;
	      $config4['file_name'] = $nmfile;
	      $this->upload->initialize($config4);
	      if($this->upload->do_upload('file_permohonan')){
	        $gbr = $this->upload->data();
	        $filename=$gbr['file_name'];
	        $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	        $alamat="./assets/bukti/badan_usaha/4_surat_permohonan_klasifikasi/";

	        $upload_4=$gbr['file_name'];
	      }
	    }else{
	      $upload_4="NULL";
	    }
	    $upload_5=NULL;
	    if($_FILES['file_pernyataan']['name'])
	    {
	      $this->load->library('upload');
	      $id_user=$this->session->userdata('id_user');
	  $nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	      $config5['upload_path'] = './assets/bukti/badan_usaha/5_surat_pernyataan_badan_usaha';
	      $config5['allowed_types'] = 'pdf|jpg|jpeg|png';
	      $config5['overwrite'] = TRUE;
	      $config5['file_name'] = $nmfile;
	      $this->upload->initialize($config5);
	      if($this->upload->do_upload('file_pernyataan')){
	        $gbr = $this->upload->data();
	        $filename=$gbr['file_name'];
	        $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	        $alamat="./assets/bukti/badan_usaha/5_surat_pernyataan_badan_usaha/";

	        $upload_5=$gbr['file_name'];
	      }
	    }else{
	      $upload_5="NULL";
	    }
	    $upload_12=NULL;
	    if($_FILES['file_photocopy']['name'])
	    {
	      $this->load->library('upload');
	      $id_user=$this->session->userdata('id_user');
	  $nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
	      $config12['upload_path'] = './assets/bukti/badan_usaha/12_photo_copy_sbu';
	      $config12['allowed_types'] = 'pdf|jpg|jpeg|png';
	      $config12['overwrite'] = TRUE;
	      $config12['file_name'] = $nmfile;
	      $this->upload->initialize($config12);
	      if($this->upload->do_upload('file_photocopy')){
	        $gbr = $this->upload->data();
	        $filename=$gbr['file_name'];
	        $file_ext = pathinfo($filename,PATHINFO_EXTENSION);
	        $alamat="./assets/bukti/badan_usaha/12_photo_copy_sbu/";

	        $upload_12=$gbr['file_name'];
	      }
	    }else{
	      $upload_12="NULL";
	    }


	  if (!empty($upload_3) AND !empty($upload_4) AND !empty($upload_5) AND !empty($upload_12) )
	  {
	  $data=array(
	    'NIB'=>$this->session->userdata('id_user'),
	    'id_klasifikasi'=>$this->security->xss_clean(trim($post['klasifikasi'])),
	    'id_sub_klasifikasi'=>$this->security->xss_clean(trim($post['sub_klasifikasi'])),
	    'kualifikasi'=>$this->security->xss_clean(trim($post['kualifikasi'])),
	    'no_ba_asosiasi'=>$this->security->xss_clean(trim($post['no_ba'])),
			'user_pemohon'=>$this->session->userdata('id_user'),
			'id_permohonan'=>$this->security->xss_clean(trim($post['jenis_permohonan'])),
	    'tgl_permohonan'=>date("Y-m-d"),
	    'propinsi'=>'09',

	    'persyaratan_3'=>$upload_3,
	    'persyaratan_4'=>$upload_4,
	    'persyaratan_5'=>$upload_5,
	    'persyaratan_12'=>$upload_12,
	    'persyaratan_10'=>$upload_10
	  );

	      $table='lsbu_registrasi';
	      $insert=$this->Bu_model->insert_sad($table,$data);

	      if($insert=="Success"){
	        $this->session->set_flashdata('title','Success');
	        $this->session->set_flashdata('text','Data Klasifikasi Kualifikasi Berhasil Di Input');
	        $this->session->set_flashdata('class', "success");
	        redirect('badan_usaha/klasifikasi_kualifikasi', 'refresh');
	      }else{
	        $this->session->set_flashdata('title','Failed');
	        $this->session->set_flashdata('text','Data Klasifikasi Kualifikasi Gagal Di Input');
	        $this->session->set_flashdata('class', "error");
	        redirect('badan_usaha/klasifikasi_kualifikasi', 'refresh');

	      }
	    }else{
	      $this->session->set_flashdata('title','Failed');
	      $this->session->set_flashdata('text','Persyaratan Gagal Diupload');
	      $this->session->set_flashdata('class', "error");
	      redirect('badan_usaha/klasifikasi_kualifikasi','refresh');
	    }

	}else{
		$this->session->set_flashdata('title','Warning');
		$this->session->set_flashdata('text','Anda tidak memiliki akses');
		$this->session->set_flashdata('class', "warning");
		redirect('login','refresh');
	}

	}

	function simulasi(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->badan_usaha()){

	  $post = $this->input->post();
	  $kualifikasi=$this->security->xss_clean(trim($post['kualifikasi']));
	  $klasifikasi=$this->security->xss_clean(trim($post['klasifikasi']));
	  $sub_klasifikasi=$this->security->xss_clean(trim($post['sub_klasifikasi']));
	  $id_bu=$this->session->userdata('id_bu');

	  $record_kb=$this->Bu_model->kd($id_bu);
	  $status="FALSE";

	  $now_date=intval(date("m"));

	  $status_simulasi="FALSE";
	  $tahun=null;
	  $count=0;

	  if($now_date>1){
	    $x=date("Y");
	    $now=$x-1;
	    $ago=$now-1;
	    foreach ($record_kb as $row) {
	      if($row['Tahun']==$x){
	        $status="TRUE";
	      }elseif($row['Tahun']==$now){
	        $status="TRUE";
	      }elseif($row['Tahun']==$ago){
	        $status="TRUE";
	      }
	      $count=$count+1;
	      if($count==2){
	        break;
	      }
	    }
	  }else{
	    $x=date("Y");
	    $now=$x-1;
	    $ago=$now-1;
	    foreach ($record_kb as $row) {
	      if($row['Tahun']==$x){
	        $status="TRUE";
	      }elseif($row['Tahun']==$now){
	        $status="TRUE";
	      }elseif($row['Tahun']==$ago){
	        $status="TRUE";
	      }
	      $count=$count+1;
	      if($count==2){
	        break;
	      }
	    }
	  }
	  $record_email=$this->Bu_model->email($id_bu);
	if($status!="TRUE"){
	    $title="Simulasi Gagal";
	    $text="Tidak Memiliki Neraca 2 Tahun Terakhir";
	    $class="error";
	    $kb=null;
	    $record_kualifikasi=null;
	  }else{
	    $tahun=$record_kb[0]['Tahun'];
	    $id=$this->Bu_model->jenis_usaha_kbli($id_bu);
	    //Check Kekayaan Bersih
	    if($id[0]['ID_Jenis_BU_kbli']=="0" OR $id[0]['ID_Jenis_BU_kbli']=="5"){
	      $kb=$this->kontraktor($record_kb,$kualifikasi);
	      $record_kualifikasi=$kb;
	    }else{
	      $kb=$this->konsultan($record_kb,$kualifikasi);
	      $record_kualifikasi=$kb;
	    }

	    //Check Sub Klasifikasi
	    if($kb['permohonan_kb']=="TRUE"){

	      $max_year=date("Y");
	      $min_year=$max_year-10;
	      $min_year_4thn=$max_year-4;
	      $index=$this->Bu_model->index();
	      $rata2=$index[0]['rata_rata'];
	      $record_pengalaman=$this->Bu_model->pengalaman_simulasi($id_bu,$sub_klasifikasi,$max_year,$min_year,$rata2);
	      $record_pengalaman_4thn=$this->Bu_model->pengalaman_simulasi($id_bu,$sub_klasifikasi,$max_year,$min_year_4thn,$rata2);

	      if($id[0]['ID_Jenis_BU_kbli']=="0" OR $id[0]['ID_Jenis_BU_kbli']=="5"){
	        $pengalaman=$this->pengalaman_kontraktor($record_pengalaman,$kualifikasi,$kb);
	        $record_kualifikasi=$pengalaman;
	      }else{
	        $pengalaman=$this->pengalaman_konsultan($record_pengalaman,$record_pengalaman_4thn,$kualifikasi,$kb);
	        $record_kualifikasi=$pengalaman;
	      }
	      //Check PJK

	      if($pengalaman['permohonan_pengalaman']=="TRUE"){
	        $record_pjk_ahli=$this->Bu_model->pjk_ahli($id_bu,$klasifikasi);
	        $record_pjk_trampil=$this->Bu_model->pjk_trampil($id_bu,$klasifikasi);
	        $record_pjt_ahli=$this->Bu_model->pjt_ahli($id_bu);
	        $record_pjt_ahli_tetap=$this->Bu_model->pjt_ahli_tetap($id_bu);
	        $record_pjt_trampil=$this->Bu_model->pjt_trampil($id_bu);
	        $record_pjbu=$this->Bu_model->pjbu($id_bu);

	        if($id[0]['ID_Jenis_BU_kbli']=="0" OR $id[0]['ID_Jenis_BU_kbli']=="5"){
	          $pjk=$this->pjk_kontraktor($record_pjk_ahli,$record_pjk_trampil,$record_pjt_ahli,$record_pjt_trampil,$record_pjbu,$pengalaman,$kualifikasi,$klasifikasi);
	          $record_kualifikasi=$pjk;
	        }else{
	          $pjk=$this->pjk_konsultan($record_pjk_ahli,$record_pjk_trampil,$record_pjt_ahli,$record_pjt_trampil,$record_pjbu,$pengalaman,$kualifikasi);
	          $record_kualifikasi=$pjk;
	        }

	        if($pjk['permohonan_pjk']=="TRUE"){

	          if($id[0]['ID_Jenis_BU_kbli']=="0" OR $id[0]['ID_Jenis_BU_kbli']=="5"){
	            $pjt=$this->pjt_kontraktor($record_pjt_ahli,$record_pjt_trampil,$record_pjbu,$pjk,$kualifikasi);
	            $record_kualifikasi=$pjt;
	          }else{
	            $pjt=$this->pjt_konsultan($record_pjk_ahli,$record_pjk_trampil,$record_pjt_ahli,$record_pjt_trampil,$record_pjbu,$pjk,$kualifikasi);
	            $record_kualifikasi=$pjt;
	          }

	          if($pjt['permohonan_pjt']=="TRUE"){

	            if($id[0]['ID_Jenis_BU_kbli']=="0" OR $id[0]['ID_Jenis_BU_kbli']=="5"){
	              $pjbu=$this->pjbu_kontraktor($record_pjk_ahli,$record_pjk_trampil,$record_pjt_ahli,$record_pjt_trampil,$record_pjbu,$pjt,$kualifikasi);
	              $record_kualifikasi=$pjbu;
	            }else{
	              $pjbu=$this->pjbu_konsultan($record_pjk_ahli,$record_pjk_trampil,$record_pjt_ahli,$record_pjt_trampil,$record_pjbu,$pjt,$kualifikasi);
	              $record_kualifikasi=$pjbu;
	            }
	            if($pjbu['permohonan_pjbu']=="TRUE"){
	              $status_simulasi="TRUE";
	              $title="Simulasi Berhasil";
	              $text="Permohonan kualifikasi memenuhi seluruh persyaratan";
	              $class="success";
	            }else{
	              $status_simulasi="FALSE";
	              $title="Simulasi Berhasil";
	              $text="Permohonan kualifikasi Tidak Memenuhi Syarat PJBU";
	              $class="success";
	            }


	            if($id[0]['ID_Jenis_BU_kbli']!="0" AND $id[0]['ID_Jenis_BU_kbli']!="5" AND $pjbu['permohonan_pjbu']=="TRUE"){
	              $ta_tetap=$this->ta_tetap_konsultan($record_pjk_ahli,$record_pjk_trampil,$record_pjt_ahli_tetap,$record_pjt_ahli,$record_pjt_trampil,$record_pjbu,$pjbu,$kualifikasi);
	              $record_kualifikasi=$ta_tetap;
	              if($ta_tetap['permohonan_ta_tetap']=="TRUE"){
	                $title="Simulasi Berhasil";
	                $text="Permohonan kualifikasi memenuhi seluruh persyaratan";
	                $class="success";
	              }else{
	                $status_simulasi="FALSE";
	                $title="Simulasi Berhasil";
	                $text="Permohonan kualifikasi tidak memenuhi  syarat TA tetap";
	                $class="error";
	              }
	            }

	          }else{
	            $title="Simulasi Berhasil";
	            $text="Permohonan kualifikasi tidak memenuhi  syarat PJT";
	            $class="error";
	          }

	        }else{
	          $title="Simulasi Berhasil";
	          $text="Permohonan kualifikasi tidak memenuhi  syarat PJK";
	          $class="error";
	        }

	      }else{
	        $title="Simulasi Berhasil";
	        $text="Permohonan kualifikasi tidak memenuhi  syarat pengalaman";
	        $class="error";
	      }



	    }else{
	      $title="Simulasi Berhasil";
	      $text="Permohonan kualifikasi tidak memenuhi  syarat Kekayaan bersih";
	      $class="error";
	    }


	  }
	  $data_klasifikasi=array();
	  $sessionarray=array();
	  for($i=0;$i<17;$i++){
	    if(!empty($record_kualifikasi[$i])){
	      $data_klasifikasi[$i]=$record_kualifikasi[$i];
	      $data=$record_kualifikasi[$i]['value'];
	      $sessionarray['k'.$data]=$data;
	    }
	  }

	  $sessionarray['status_simulasi']=$status_simulasi;
	  $this->delete_session_simulasi();
	  $this->session->set_userdata($sessionarray);

	  $response = array(
	                  'tahun'=>$tahun,
	                  'status_simulasi'=>$status_simulasi,
	                  'record'=>$data_klasifikasi,
	                  'record2'=>$sessionarray,

	                  'record_kualifikasi'=>$record_kualifikasi,
	                  'kualifikasi'=>$kualifikasi,
	                  'klasifikasi'=>$klasifikasi,
	                  'pengalaman'=>$pengalaman,
	                  'pengalaman_4th'=>$record_pengalaman_4thn,

	                  'pjk'=>$pjk,
											/*
	                  'pjt'=>$pjt,
	                  'pjk_ahli'=>$record_pjk_ahli,
	                  'pjk_trampil'=>$record_pjk_trampil,
	                  'pjt_ahli'=>$record_pjt_ahli,
	                  'pjt_trampil'=>$record_pjt_trampil,
	                  'pjbu'=>$pjbu,
	                  'ta_tetap'=>$record_pjt_ahli_tetap,
	                  'record_pjbu'=>$record_pjbu,
	                  */
	                  'tgl_sekarang'=>$now_date,
	                  'title'=>$title,
	                  'text'=>$text,
	                  'class'=>$class
	                );

	      echo json_encode($response);
			}else{
				$this->session->set_flashdata('title','Warning');
				$this->session->set_flashdata('text','Anda tidak memiliki akses');
				$this->session->set_flashdata('class', "warning");
				redirect('login','refresh');
			}
	}
	function delete_session_simulasi(){
	  $this->session->unset_userdata('k14');
	  $this->session->unset_userdata('k13');
	  $this->session->unset_userdata('k12');
	  $this->session->unset_userdata('k11');
	  $this->session->unset_userdata('k10');
	  $this->session->unset_userdata('k9');
	  $this->session->unset_userdata('k8');
	  $this->session->unset_userdata('k7');
	  $this->session->unset_userdata('k6');
	  $this->session->unset_userdata('k5');
	  $this->session->unset_userdata('k4');
	  $this->session->unset_userdata('k3');
	  $this->session->unset_userdata('k2');
	  $this->session->unset_userdata('k1');

	}
	function kontraktor($record_kb,$kualifikasi){
	  $kb=$record_kb[0]['ModalDisetor']+$record_kb[0]['SelisihRevaluasi']+$record_kb[0]['modallain'];
	  if($record_kb[0]['labaditahan_minus']=='1'){
	    $kb2=$kb-$record_kb[0]['LabaDitahan'];
	  }else{
	    $kb2=$kb+$record_kb[0]['LabaDitahan'];
	  }
	  $data=array(
	    'kb'=>$kb2,
	    'P'=>'P'
	  );
	  $permohonan="FALSE";
	  if($kualifikasi==7){$permohonan="TRUE";}
	  $data[7]=array('kualifikasi'=>'P','value'=>7);
	  for($i=0;$i<7;$i++){
	    if($i==0){
	      $batas=50000000;
	      if($kb2>=$batas){
	        $data['B2']="B2";
	        if($kualifikasi==14){$permohonan="TRUE";}
	      }else{

	        if($kualifikasi==14){$permohonan="FALSE";}
	      }
	    }elseif($i==1){
	      $batas2=10000000;
	      if($kb2>=$batas2){
	        $data['B1']="B1";
	        if($kualifikasi==13){$permohonan="TRUE";}
	      }else{

	        if($kualifikasi==13){$permohonan="FALSE";}
	      }
	    }elseif($i==2){
	      $batas3=2000000;
	      if($kb2>=$batas3){
	        $data['M2']="M2";
	        if($kualifikasi==12){$permohonan="TRUE";}
	      }else{

	        if($kualifikasi==12){$permohonan="FALSE";}
	      }
	    }elseif($i==3){
	      $batas4=500000;
	      if($kb2>=$batas4){
	        $data['M1']="M1";
	        if($kualifikasi==11){$permohonan="TRUE";}
	      }else{

	        if($kualifikasi==11){$permohonan="FALSE";}
	      }
	    }elseif($i==4){
	      $batas5=350000;

	      if($kb2>=$batas5){
	        $data['K3']="K3";
	        if($kualifikasi==10){$permohonan="TRUE";}
	      }else{

	        if($kualifikasi==10){$permohonan="FALSE";}
	      }
	    }elseif($i==5){
	      $batas7=200000;
	      if($kb2>=$batas7){
	        $data['K2']="K2";
	        if($kualifikasi==9){$permohonan="TRUE";}
	      }else{

	        if($kualifikasi==9){$permohonan="FALSE";}
	      }
	    }elseif($i==6){
	      $batas9=50000;
	      if($kb2>=$batas9){
	        $data['K1']="K1";
	        if($kualifikasi==8){$permohonan="TRUE";}
	      }else{

	        if($kualifikasi==8){$permohonan="FALSE";}
	      }
	    }

	  }
	  $data['permohonan_kb']=$permohonan;
	  return $data;
	}
	function konsultan($record_kb,$kualifikasi){
	  $kb=$record_kb[0]['ModalDisetor']+$record_kb[0]['SelisihRevaluasi']+$record_kb[0]['modallain'];
	  if($record_kb[0]['labaditahan_minus']=='1'){
	    $kb2=$kb-$record_kb[0]['LabaDitahan'];
	  }else{
	    $kb2=$kb+$record_kb[0]['LabaDitahan'];
	  }
	  $data=array(
	    'kb'=>$kb2,
	    'P'=>'P'
	  );
	  $permohonan="FALSE";
	  if($kualifikasi==1){$permohonan="TRUE";}
	  for($i=0;$i<5;$i++){
	    if($i==0){
	      $batas=500000;
	      if($kb2>=$batas){
	        $data['B']="B";
	        if($kualifikasi==6){$permohonan="TRUE";}
	      }
	    }elseif($i==1){
	      $batas=300000;
	      if($kb2>=$batas){
	        $data['M2']="M2";
	        if($kualifikasi==5){$permohonan="TRUE";}
	      }
	    }elseif($i==2){
	      $batas=150000;
	      if($kb2>=$batas){
	        $data['M1']="M1";
	        if($kualifikasi==4){$permohonan="TRUE";}
	      }
	    }elseif($i==3){
	      $batas=100000;
	      if($kb2>=$batas){
	        $data['K2']="K2";
	        if($kualifikasi==3){$permohonan="TRUE";}
	      }
	    }elseif($i==4){
	      $batas=50000;
	      if($kb2>=$batas){
	        $data['K1']="K1";
	        if($kualifikasi==2){$permohonan="TRUE";}
	      }
	    }
	  }
	  $data['permohonan_kb']=$permohonan;
	  return $data;
	}

	function pjbu_konsultan($record_pjk_ahli,$record_pjk_trampil,$record_pjt_ahli,$record_pjt_trampil,$record_pjbu,$pjt,$kualifikasi){
	  $permohonan="FALSE";
	  $B="TRUE";
	  $M2="TRUE";
	  $M1="TRUE";
	  $K2="TRUE";
	  $K1="TRUE";
	  if(!empty($record_pjbu)){
	    $pjbu=$record_pjbu[0]['No_KTP'];
	  }else{
	    $pjbu="";
	  }
	  $data=array(
	    'P'=>"P"
	  );
	  if($kualifikasi==1){$permohonan="TRUE";}
	  $data[5]=array('kualifikasi'=>'P','value'=>1);
	  for($i=0;$i<5;$i++){
	    if($i==0){
	      if(!empty($pjt[$i])){
	        if($pjbu!=""){
	          //PJBU != pjk_ahli
	          if(!empty($record_pjk_ahli)){
	            foreach($record_pjk_ahli as $row){
	              if($row['id_personal']==$pjbu){
	                $B="FALSE";
	                break;
	              }
	            }
	          }
	          //PJBU != pjk_trampil
	          if(!empty($record_pjk_trampil)){
	            foreach($record_pjk_trampil as $row2){
	              if($row2['id_personal']==$pjbu){
	                $B="FALSE";
	                break;
	              }
	            }
	          }
	          //PJBU != PJT Ahli
	          if(!empty($record_pjt_ahli)){
	            foreach($record_pjt_ahli as $row3){
	              if($row3['id_personal']==$pjbu){
	                $B="FALSE";
	                break;
	              }
	            }
	          }
	          //PJBU != PJT TRAMPIL
	          if(!empty($record_pjt_trampil)){
	            foreach($record_pjt_trampil as $row4){
	              if($row4['id_personal']==$pjbu){
	                $B="FALSE";
	                break;
	              }
	            }
	          }

	          if($B=="TRUE"){
	            $data['B']="B";
	            $data[$i]=array('kualifikasi'=>'B','value'=>6);
	            if($kualifikasi==6){$permohonan="TRUE";}
	          }
	        }
	      }
	    }elseif($i==1){
	      if(!empty($pjt[$i])){
	        if($pjbu!=""){
	          $data['M2']="M2";
	          $data[$i]=array('kualifikasi'=>'M2','value'=>5);
	          if($kualifikasi==5){$permohonan="TRUE";}
	        }
	      }
	    }elseif($i==2){
	      if(!empty($pjt[$i])){
	        if($pjbu!=""){
	          $data['M1']="M1";
	          $data[$i]=array('kualifikasi'=>'M1','value'=>4);
	          if($kualifikasi==4){$permohonan="TRUE";}
	        }
	      }
	    }elseif($i==3){
	      if(!empty($pjt[$i])){
	        if($pjbu!=""){
	          $data['K2']="K2";
	          $data[$i]=array('kualifikasi'=>'K2','value'=>3);
	          if($kualifikasi==3){$permohonan="TRUE";}
	        }
	      }


	    }elseif($i==4){
	      if(!empty($pjt[$i])){
	        if($pjbu!=""){
	          $data['K1']="K1";
	          $data[$i]=array('kualifikasi'=>'K1','value'=>2);
	          if($kualifikasi==2){$permohonan="TRUE";}
	        }
	      }
	    }
	  }
	  $data['permohonan_pjbu']=$permohonan;
	  return $data;
	}

	function pjbu_kontraktor($record_pjk_ahli,$record_pjk_trampil,$record_pjt_ahli,$record_pjt_trampil,$record_pjbu,$pjt,$kualifikasi){
	  $permohonan="FALSE";
	  $B2="TRUE";
	  $B1="TRUE";
	  $M2="TRUE";
	  $M1="TRUE";
	  $K3="TRUE";
	  $K2="TRUE";
	  $K1="TRUE";
	  if(!empty($record_pjbu)){
	    $pjbu=$record_pjbu[0]['No_KTP'];
	  }else{
	    $pjbu="";
	  }
	  $data=array(
	    'P'=>"P"
	  );
	  if($kualifikasi==7){$permohonan="TRUE";}
	  $data[7]=array('kualifikasi'=>'P','value'=>7);
	  for($i=0;$i<8;$i++){
	    if($i==0){
	      if(!empty($pjt[$i])){
	        if($pjbu!=""){
	          //PJBU != pjk_ahli
	          if(!empty($record_pjk_ahli)){
	            foreach($record_pjk_ahli as $row){
	              if($row['id_personal']==$pjbu){
	                $B2="FALSE";
	                break;
	              }
	            }
	          }
	          //PJBU != pjk_trampil
	          if(!empty($record_pjk_trampil)){
	            foreach($record_pjk_trampil as $row2){
	              if($row2['id_personal']==$pjbu){
	                $B2="FALSE";
	                break;
	              }
	            }
	          }
	          //PJBU != PJT Ahli
	          if(!empty($record_pjt_ahli)){
	            foreach($record_pjt_ahli as $row3){
	              if($row3['id_personal']==$pjbu){
	                $B2="FALSE";
	                break;
	              }
	            }
	          }
	          //PJBU != PJT TRAMPIL
	          if(!empty($record_pjt_trampil)){
	            foreach($record_pjt_trampil as $row4){
	              if($row4['id_personal']==$pjbu){
	                $B2="FALSE";
	                break;
	              }
	            }
	          }

	          if($B2=="TRUE"){
	            $data['B2']="B2";
	            $data[$i]=array('kualifikasi'=>'B2','value'=>14);
	            if($kualifikasi==14){$permohonan="TRUE";}
	          }
	        }
	      }
	    }elseif($i==1){
	      if(!empty($pjt[$i])){
	        if($pjbu!=""){
	          //PJBU != pjk_ahli
	          if(!empty($record_pjk_ahli)){
	            foreach($record_pjk_ahli as $row){
	              if($row['id_personal']==$pjbu){
	                $B1="FALSE";
	                break;
	              }
	            }
	          }
	          //PJBU != pjk_trampil
	          if(!empty($record_pjk_trampil)){
	            foreach($record_pjk_trampil as $row2){
	              if($row2['id_personal']==$pjbu){
	                $B1="FALSE";
	                break;
	              }
	            }
	          }
	          //PJBU != PJT Ahli
	          if(!empty($record_pjt_ahli)){
	            foreach($record_pjt_ahli as $row3){
	              if($row3['id_personal']==$pjbu){
	                $B1="FALSE";
	                break;
	              }
	            }
	          }
	          //PJBU != PJT TRAMPIL
	          if(!empty($record_pjt_trampil)){
	            foreach($record_pjt_trampil as $row4){
	              if($row4['id_personal']==$pjbu){
	                $B1="FALSE";
	                break;
	              }
	            }
	          }

	          if($B1=="TRUE"){
	            $data['B1']="B1";
	            $data[$i]=array('kualifikasi'=>'B1','value'=>13);
	            if($kualifikasi==13){$permohonan="TRUE";}
	          }
	        }
	      }
	    }elseif($i==2){
	      if(!empty($pjt[$i])){
	        if($pjbu!=""){
	          //PJBU != pjk_ahli
	          if(!empty($record_pjk_ahli)){
	            foreach($record_pjk_ahli as $row){
	              if($row['id_personal']==$pjbu){
	                $M2="FALSE";
	                break;
	              }
	            }
	          }
	          //PJBU != pjk_trampil
	          if(!empty($record_pjk_trampil)){
	            foreach($record_pjk_trampil as $row2){
	              if($row2['id_personal']==$pjbu){
	                $M2="FALSE";
	                break;
	              }
	            }
	          }
	          //PJBU != PJT Ahli
	          if(!empty($record_pjt_ahli)){
	            foreach($record_pjt_ahli as $row3){
	              if($row3['id_personal']==$pjbu){
	                $M2="FALSE";
	                break;
	              }
	            }
	          }
	          //PJBU != PJT TRAMPIL
	          if(!empty($record_pjt_trampil)){
	            foreach($record_pjt_trampil as $row4){
	              if($row4['id_personal']==$pjbu){
	                $M2="FALSE";
	                break;
	              }
	            }
	          }

	          if($M2=="TRUE"){
	            $data['M2']="M2";
	            $data[$i]=array('kualifikasi'=>'M2','value'=>12);
	            if($kualifikasi==12){$permohonan="TRUE";}
	          }
	        }
	      }
	    }elseif($i==3){
	      if(!empty($pjt[$i])){
	        if($pjbu!=""){
	          //PJBU != pjk_ahli
	          if(!empty($record_pjk_ahli)){
	            foreach($record_pjk_ahli as $row){
	              if($row['id_personal']==$pjbu){
	                $M1="FALSE";
	                break;
	              }
	            }
	          }
	          //PJBU != pjk_trampil
	          if(!empty($record_pjk_trampil)){
	            foreach($record_pjk_trampil as $row2){
	              if($row2['id_personal']==$pjbu){
	                $M1="FALSE";
	                break;
	              }
	            }
	          }
	          //PJBU != PJT Ahli
	          if(!empty($record_pjt_ahli)){
	            foreach($record_pjt_ahli as $row3){
	              if($row3['id_personal']==$pjbu){
	                $M1="FALSE";
	                break;
	              }
	            }
	          }
	          //PJBU != PJT TRAMPIL
	          if(!empty($record_pjt_trampil)){
	            foreach($record_pjt_trampil as $row4){
	              if($row4['id_personal']==$pjbu){
	                $M1="FALSE";
	                break;
	              }
	            }
	          }

	          if($M2=="TRUE"){
	            $data['M1']="M1";
	            $data[$i]=array('kualifikasi'=>'M1','value'=>11);
	            if($kualifikasi==11){$permohonan="TRUE";}
	          }
	        }
	      }
	    }elseif($i==4){
	      if(!empty($pjt[$i])){
	        if($pjbu!=""){
	          $data['K3']="K3";
	          $data[$i]=array('kualifikasi'=>'K3','value'=>10);
	          if($kualifikasi==10){$permohonan="TRUE";}
	        }
	      }
	    }elseif($i==5){
	      if(!empty($pjt[$i])){
	        if($pjbu!=""){
	          $data['K2']="K2";
	          $data[$i]=array('kualifikasi'=>'K2','value'=>9);
	          if($kualifikasi==9){$permohonan="TRUE";}
	        }
	      }
	    }elseif($i==6){
	      if(!empty($pjt[$i])){
	        if($pjbu!=""){
	          $data['K1']="K1";
	          $data[$i]=array('kualifikasi'=>'K1','value'=>8);
	          if($kualifikasi==8){$permohonan="TRUE";}
	        }
	      }
	    }
	  }
	  $data['permohonan_pjbu']=$permohonan;
	  return $data;

	}

	function pjt_konsultan($record_pjk_ahli,$record_pjk_trampil,$record_pjt_ahli,$record_pjt_trampil,$record_pjbu,$pjk,$kualifikasi){
	  $permohonan="FALSE";
	  $B="TRUE";
	  if(!empty($record_pjbu)){
	    $pjbu=$record_pjbu[0]['No_KTP'];
	  }else{
	    $pjbu="";
	  }
	  $data['P']="P";
	  if($kualifikasi==1){$permohonan="TRUE";}
	  $data[5]=array('kualifikasi'=>'P','value'=>1);
	  for($i=0;$i<5;$i++){
	    if($i==0){
	      if(!empty($pjk['B'])){
	        if(!empty($record_pjt_ahli)){

	          if(!empty($record_pjk_ahli)){
	            foreach($record_pjk_ahli as $row){
	              if($row['id_personal']==$record_pjt_ahli[0]['id_personal']){
	                $B="FALSE";
	              }
	            }
	          }

	          if($B!="FALSE"){
	            foreach ($record_pjt_ahli as $row) {
	                if($row['ID_Kualifikasi']<=2){
	                  $data['B']="B";
	                  $data[$i]=array('kualifikasi'=>'B','value'=>6);
	                  if($kualifikasi==6){$permohonan="TRUE";}
	                  break;
	                }
	            }
	          }

	        }
	      }
	    }elseif($i==1){
	      if(!empty($pjk['M2'])){
	        if(!empty($record_pjt_ahli)){
	          foreach ($record_pjt_ahli as $row) {
	              if($row['ID_Kualifikasi']<=2){
	                $data['M2']="M2";
	                $data[$i]=array('kualifikasi'=>'M2','value'=>5);
	                if($kualifikasi==5){$permohonan="TRUE";}
	                break;
	              }
	          }
	        }
	      }
	    }elseif($i==2){
	      if(!empty($pjk['M1'])){
	        if(!empty($record_pjt_ahli)){
	          foreach ($record_pjt_ahli as $row) {
	              if($row['ID_Kualifikasi']<=2){
	                $data['M1']="M1";
	                $data[$i]=array('kualifikasi'=>'M1','value'=>4);
	                if($kualifikasi==4){$permohonan="TRUE";}
	                break;
	              }
	          }
	        }
	      }
	    }elseif($i==3){
	      if(!empty($pjk['K2'])){
	        if(!empty($record_pjt_ahli)){
	          foreach ($record_pjt_ahli as $row) {
	              if($row['ID_Kualifikasi']<=3){
	                $data['K2']="K2";
	                $data[$i]=array('kualifikasi'=>'K2','value'=>3);
	                if($kualifikasi==3){$permohonan="TRUE";}
	                break;
	              }
	          }
	        }
	      }
	    }elseif($i==4){
	    if(!empty($pjk['K1'])){
	        if(!empty($record_pjt_ahli)){
	          foreach ($record_pjt_ahli as $row) {
	              if($row['ID_Kualifikasi']<='3'){
	                $data['K1']="K1";
	                $data[$i]=array('kualifikasi'=>'K1','value'=>2);
	                if($kualifikasi==2){$permohonan="TRUE";}
	                break;
	              }
	         }
	        }
	      }
	    }
	  }
	  $data['permohonan_pjt']=$permohonan;
	  return $data;
	}

	function pjt_kontraktor($record_pjt_ahli,$record_pjt_trampil,$record_pjbu,$pjk,$kualifikasi){
	  $permohonan="FALSE";
	  for($i=0;$i<8;$i++){
	    if($i==0){
	      if(!empty($pjk['B2'])){
	        if(!empty($record_pjt_ahli)){
	          foreach ($record_pjt_ahli as $row) {
	              if($row['ID_Kualifikasi']<=2){
	                $data['B2']="B2";
	                $data[$i]=array('kualifikasi'=>'K1','value'=>8);
	                if($kualifikasi==14){$permohonan="TRUE";}
	                break;
	              }
	          }
	        }
	      }
	    }elseif($i==1){
	      if(!empty($pjk['B1'])){
	        if(!empty($record_pjt_ahli)){
	          foreach ($record_pjt_ahli as $row) {
	              if($row['ID_Kualifikasi']<=2){
	                $data['B1']="B1";
	                $data[$i]=array('kualifikasi'=>'B1','value'=>13);
	                if($kualifikasi==13){$permohonan="TRUE";}
	                break;
	              }
	          }
	        }
	      }
	    }elseif($i==2){
	      if(!empty($pjk['M2'])){
	        if(!empty($record_pjt_ahli)){
	          foreach ($record_pjt_ahli as $row) {
	              if($row['ID_Kualifikasi']<=2){
	                $data['M2']="M2";$data[$i]=array('kualifikasi'=>'M2','value'=>12);
	                if($kualifikasi==12){$permohonan="TRUE";}
	                break;
	              }
	          }
	        }
	      }
	    }elseif($i==3){
	      if(!empty($pjk['M1'])){
	        if(!empty($record_pjt_ahli)){
	          foreach ($record_pjt_ahli as $row) {
	              if($row['ID_Kualifikasi']<=3){
	                $data['M1']="M1";
	                $data[$i]=array('kualifikasi'=>'M1','value'=>11);
	                if($kualifikasi==11){$permohonan="TRUE";}
	                break;
	              }
	          }
	        }
	      }
	    }elseif($i==4){
	      if(!empty($pjk['K3'])){
	        if(!empty($record_pjt_ahli)){
	          $data['K3']="K3";
	          $data[$i]=array('kualifikasi'=>'K3','value'=>10);
	          if($kualifikasi==10){$permohonan="TRUE";}
	        }elseif(!empty($record_pjt_trampil)){
	          foreach ($record_pjt_trampil as $row) {
	              if($row['ID_Kualifikasi']==1){
	                $data['K3']="K3";
	                $data[$i]=array('kualifikasi'=>'K3','value'=>10);
	                if($kualifikasi==10){$permohonan="TRUE";}
	                break;
	              }
	          }
	        }
	      }
	    }elseif($i==5){
	      if(!empty($pjk['K2'])){
	        if(!empty($record_pjt_ahli)){
	          $data['K2']="K2";
	          $data[$i]=array('kualifikasi'=>'K2','value'=>9);
	          if($kualifikasi==9){$permohonan="TRUE";}
	        }elseif(!empty($record_pjt_trampil)){
	          foreach ($record_pjt_trampil as $row) {
	              if($row['ID_Kualifikasi']<=2){
	                $data['K2']="K2";
	                $data[$i]=array('kualifikasi'=>'K2','value'=>9);
	                if($kualifikasi==9){$permohonan="TRUE";}
	                break;
	              }
	          }
	        }
	      }
	    }elseif($i==6){
	      if(!empty($pjk['K1'])){
	        if(!empty($record_pjt_ahli)){
	          $data['K1']="K1";
	          $data[$i]=array('kualifikasi'=>'K1','value'=>8);
	          if($kualifikasi==8){$permohonan="TRUE";}
	        }elseif(!empty($record_pjt_trampil)){
	          foreach ($record_pjt_trampil as $row) {
	              if($row['ID_Kualifikasi']<=3){
	                $data['K2']="K2";
	                $data[$i]=array('kualifikasi'=>'K1','value'=>8);
	                if($kualifikasi==8){$permohonan="TRUE";}
	                break;
	              }
	          }
	        }
	      }
	    }elseif($i==7){
	      if(!empty($pjk['P'])){
	        if(!empty($record_pjt_ahli)){
	          $data['P']="P";
	          $data[$i]=array('kualifikasi'=>'P','value'=>7);
	          if($kualifikasi==7){$permohonan="TRUE";}
	        }elseif(!empty($record_pjt_trampil)){
	          foreach ($record_pjt_trampil as $row) {
	              if($row['ID_Kualifikasi']==1){
	                $data['P']="P";
	                $data[$i]=array('kualifikasi'=>'P','value'=>7);
	                if($kualifikasi==7){$permohonan="TRUE";}
	                break;
	              }
	          }
	        }
	      }
	    }
	  }
	  $data['permohonan_pjt']=$permohonan;
	  return $data;
	}

	function ta_tetap_konsultan($record_pjk_ahli,$record_pjk_trampil,$record_pjt_ahli_tetap,$record_pjt_ahli,$record_pjt_trampil,$record_pjbu,$pjbu_2,$kualifikasi){
	  $permohonan="FALSE";
	  if(!empty($record_pjbu)){
	    $pjbu=$record_pjbu[0]['No_KTP'];
	  }else{
	    $pjbu="";
	  }
	  if(!empty($record_pjt_ahli)){
	    $pjt=$record_pjt_ahli[0]['id_personal'];
	  }elseif(!empty($record_pjt_trampil)){
	    $pjt=$record_pjt_trampil[0]['id_personal'];
	  }else{
	    $pjt='';
	  }
	  for($i=0;$i<6;$i++){
	    if($i==0){
	      if(!empty($pjbu_2['B'])){
	        //PJK AHLI
	        if(!empty($record_pjt_ahli_tetap)){
	          foreach ($record_pjt_ahli_tetap as $row) {
	            //11(PJT,PJK,PJBU terpisah)
	            if($row['id_personal']!=$pjbu AND $row['id_personal']!=$pjt){
	              //12(Pjk Minimal memiliki sertifikat Madya)
	              if($row['ID_Kualifikasi']<=2){
	                $data['B']="B";
	                $data[$i]=array('kualifikasi'=>'B','value'=>6);
	                if($kualifikasi==6){$permohonan="TRUE";}
	                break;
	              }
	            }
	          }
	        }
	      }
	    }elseif($i==1){
	      if(!empty($pjbu_2['M2'])){
	        //PJK AHLI
	        if(!empty($record_pjt_ahli_tetap)){
	          foreach ($record_pjt_ahli_tetap as $row) {
	            //11(PJT,PJK,PJBU terpisah)
	            if($row['id_personal']!=$pjbu AND $row['id_personal']!=$pjt){
	              //12(Pjk Minimal memiliki sertifikat Madya)
	              if($row['ID_Kualifikasi']<=2){
	                $data['M2']="M2";
	                $data[$i]=array('kualifikasi'=>'M2','value'=>5);
	                if($kualifikasi==5){$permohonan="TRUE";}
	                break;
	              }
	            }
	          }
	        }
	      }
	    }elseif($i==2){
	      if(!empty($pjbu_2['M1'])){
	        //PJK AHLI
	        if(!empty($record_pjt_ahli_tetap)){
	          foreach ($record_pjt_ahli_tetap as $row) {
	              //12(Pjk Minimal memiliki sertifikat Madya)
	              if($row['ID_Kualifikasi']<=2){
	                $data['M1']="M1";
	                $data[$i]=array('kualifikasi'=>'M1','value'=>4);
	                if($kualifikasi==4){$permohonan="TRUE";}
	                break;
	              }
	          }
	        }
	      }
	    }elseif($i==3){
	      if(!empty($pjbu_2['K2'])){
	        //PJK AHLI
	        if(!empty($record_pjt_ahli_tetap)){
	          foreach ($record_pjt_ahli_tetap as $row) {
	              //12(Pjk Minimal memiliki sertifikat Madya)
	              if($row['ID_Kualifikasi']<=3){
	                $data['K2']="K2";
	                $data[$i]=array('kualifikasi'=>'K2','value'=>3);
	                if($kualifikasi==3){$permohonan="TRUE";}
	                break;
	              }
	          }
	        }
	      }
	    }elseif($i==4){
	      if(!empty($pjbu_2['K1'])){
	        //PJK AHLI
	        if(!empty($record_pjt_ahli_tetap)){
	          foreach ($record_pjt_ahli_tetap as $row) {
	              //12(Pjk Minimal memiliki sertifikat Madya)
	              if($row['ID_Kualifikasi']<=3){
	                $data['K1']="K1";
	                $data[$i]=array('kualifikasi'=>'K1','value'=>2);
	                if($kualifikasi==2){$permohonan="TRUE";}
	                break;
	              }
	          }
	        }
	      }
	    }elseif($i==5){
	      if(!empty($pjbu_2['P'])){
	        //PJK AHLI
	        if(!empty($record_pjk_ahli)){
	          foreach ($record_pjk_ahli as $row) {
	              //12(Pjk Minimal memiliki sertifikat Madya)
	              if($row['ID_Kualifikasi']<=2){
	                $data['P']="P";
	                $data[$i]=array('kualifikasi'=>'P','value'=>1);
	                if($kualifikasi==1){$permohonan="TRUE";}
	                break;
	              }
	          }
	        }
	      }
	    }
	  }
	  $data['permohonan_ta_tetap']=$permohonan;
	  return $data;
	}

	function pjk_konsultan($record_pjk_ahli,$record_pjk_trampil,$record_pjt_ahli,$record_pjt_trampil,$record_pjbu,$pengalaman,$kualifikasi){
	  $permohonan="FALSE";
	  if(!empty($record_pjbu)){
	    $pjbu=$record_pjbu[0]['No_KTP'];
	  }else{
	    $pjbu="";
	  }
	  if(!empty($record_pjt_ahli)){
	    $pjt=$record_pjt_ahli[0]['id_personal'];
	  }elseif(!empty($record_pjt_trampil)){
	    $pjt=$record_pjt_trampil[0]['id_personal'];
	  }else{
	    $pjt='';
	  }

	  $data=array(
	    'P'=>"P"
	  );
	  if($kualifikasi==1){$permohonan="TRUE";}
	  $data[5]=array('kualifikasi'=>'P','value'=>1);
	  for($i=0;$i<5;$i++){
	    if($i==0){
	      if(!empty($pengalaman[$i])){
	        //PJK AHLI
	        if(!empty($record_pjk_ahli)){
	          foreach ($record_pjk_ahli as $row) {
	            //11(PJT,PJK,PJBU terpisah)
	            if($row['id_personal']!=$pjbu AND $row['id_personal']!=$pjt){
	              //12(Pjk Minimal memiliki sertifikat Madya)
	              if($row['ID_Kualifikasi']<=2){
	                $data['B']="B";
	                $data[$i]=array('kualifikasi'=>'B','value'=>6);
	                if($kualifikasi==6){$permohonan="TRUE";}
	                break;
	              }
	            }
	          }
	        }
	      }
	    }elseif($i==1){
	      if(!empty($pengalaman[$i])){
	        if(!empty($record_pjk_ahli)){
	          foreach ($record_pjk_ahli as $row) {
	            //12(Pjk Minimal memiliki sertifikat Madya)
	            if($row['ID_Kualifikasi']<=2){
	              $data['M2']="M2";
	              $data[$i]=array('kualifikasi'=>'M2','value'=>5);
	              if($kualifikasi==5){$permohonan="TRUE";}
	              break;
	            }
	          }
	        }
	      }
	    }elseif($i==2){
	      if(!empty($pengalaman[$i])){
	        if(!empty($record_pjk_ahli)){
	          foreach ($record_pjk_ahli as $row) {
	            //12(Pjk Minimal memiliki sertifikat Madya)
	            if($row['ID_Kualifikasi']<=2){
	              $data['M1']="M1";
	              $data[$i]=array('kualifikasi'=>'M1','value'=>4);
	              if($kualifikasi==4){$permohonan="TRUE";}
	              break;
	            }
	          }
	        }
	      }
	    }elseif($i==3){
	      if(!empty($pengalaman[$i])){
	        if(!empty($record_pjk_ahli)){
	          foreach ($record_pjk_ahli as $row) {
	            //12(Pjk Minimal memiliki sertifikat Madya)
	            if($row['ID_Kualifikasi']<=3){
	              $data['K2']="K2";
	              $data[$i]=array('kualifikasi'=>'K2','value'=>3);
	              if($kualifikasi==3){$permohonan="TRUE";}
	              break;
	            }
	          }
	        }
	      }
	    }elseif($i==4){
	      if(!empty($pengalaman[$i])){
	        if(!empty($record_pjk_ahli)){
	          foreach ($record_pjk_ahli as $row) {
	            //12(Pjk Minimal memiliki sertifikat Madya)
	            if($row['ID_Kualifikasi']<=3){
	              $data['K1']="K1";
	              $data[$i]=array('kualifikasi'=>'K1','value'=>2);
	              if($kualifikasi==2){$permohonan="TRUE";}
	              break;
	            }
	          }
	        }
	      }
	    }
	  }
	  $data['permohonan_pjk']=$permohonan;
	  return $data;
	}

	function pjk_kontraktor($record_pjk_ahli,$record_pjk_trampil,$record_pjt_ahli,$record_pjt_trampil,$record_pjbu,$pengalaman,$kualifikasi,$klasifikasi){
	  $permohonan="FALSE";
	  if(!empty($record_pjbu)){
	    $pjbu=$record_pjbu[0]['No_KTP'];
	  }else{
	    $pjbu="";
	  }
	  $data=array(
	    'P'=>"P"
	  );
	  if($kualifikasi==7){$permohonan="TRUE";}
	  $data[7]=array('kualifikasi'=>'P','value'=>7);
	  for($i=0;$i<7;$i++){
	    if($i==0){
	      if(!empty($pengalaman[$i])){
	        //PJK AHLI
	        if(!empty($record_pjk_ahli)){
	          foreach ($record_pjk_ahli as $row) {
	            //11(PJT,PJK,PJBU terpisah)
	            if($row['id_personal']!=$pjbu AND $row['id_personal']!=$record_pjt_ahli[0]['id_personal']){
	              //12(PJT tidak boleh merangkap)
	              if($klasifikasi=='MK0' OR $klasifikasi=='EL0'){
	                if($row['ID_Kualifikasi']<='2'){
	                  $data['B2']="B2";
	                  $data[$i]=array('kualifikasi'=>'B2','value'=>14);
	                  if($kualifikasi==14){$permohonan="TRUE";}
	                  break;
	                }
	              }

	              if($row['id_klasifikasi_pjk2']=="" || $row['id_klasifikasi_pjk1']==$row['id_klasifikasi_pjk2']){
	                //12(Pjk Minimal memiliki sertifikat setara PJT)
	                if($row['ID_Kualifikasi']<='2'){
	                  $data['B2']="B2";
	                  $data[$i]=array('kualifikasi'=>'B2','value'=>14);
	                  if($kualifikasi==14){$permohonan="TRUE";}
	                  break;
	                }
	              }
	            }
	          }
	        }
	      }
	    }elseif($i==1){
	      if(!empty($pengalaman[$i])){
	        if(!empty($record_pjk_ahli)){
	          foreach ($record_pjk_ahli as $row) {
	            //9(PJT,PJK,PJBU terpisah)
	            if($row['id_personal']!=$pjbu AND $row['id_personal']!=$record_pjt_ahli[0]['id_personal']){
	              //10(PJT tidak boleh merangkap)
	              if($klasifikasi=='MK0' OR $klasifikasi=='EL0'){
	                if($row['ID_Kualifikasi']<='2'){
	                  $data['B1']="B1";
	                  $data[$i]=array('kualifikasi'=>'B1','value'=>13);
	                  if($kualifikasi==13){$permohonan="TRUE";}
	                  break;
	                }
	              }


	              if($row['id_klasifikasi_pjk2']=="" || $row['id_klasifikasi_pjk1']==$row['id_klasifikasi_pjk2']){
	                //10(Pjk Minimal memiliki sertifikat setara PJT)
	                if($row['ID_Kualifikasi']<='2'){
	                  $data['B1']="B1";
	                  $data[$i]=array('kualifikasi'=>'B1','value'=>13);
	                  if($kualifikasi==13){$permohonan="TRUE";}
	                  break;
	                }
	              }
	            }
	          }
	        }
	      }
	    }elseif($i==2){
	      if(!empty($pengalaman[$i])){
	        if(!empty($record_pjk_ahli)){
	          foreach ($record_pjk_ahli as $row){
	            //7(PJT,PJK,PJBU terpisah)
	            if($row['id_personal']!=$pjbu AND $row['id_personal']!=$record_pjt_ahli[0]['id_personal']){
	              //8(Pjk Minimal memiliki sertifikat setara PJT)
	              if($row['ID_Kualifikasi']<='3'){
	                $data['M2']="M2";
	                $data[$i]=array('kualifikasi'=>'M2','value'=>12);
	                if($kualifikasi==12){$permohonan="TRUE";}
	                break;
	              }
	            }
	          }
	        }
	      }
	    }elseif($i==3){
	      if(!empty($pengalaman[$i])){
	        if(!empty($record_pjk_ahli)){
	          foreach ($record_pjk_ahli as $row){
	            //4(PJT,PJK,PJBU terpisah)
	            if($row['id_personal']!=$pjbu AND $row['id_personal']!=$record_pjt_ahli[0]['id_personal']){
	              //5(Pjk Minimal memiliki sertifikat setara PJT)
	              if($row['ID_Kualifikasi']<='3'){
	                $data['M1']="M1";
	                $data[$i]=array('kualifikasi'=>'M1','value'=>11);
	                if($kualifikasi==11){$permohonan="TRUE";}
	                break;
	              }
	            }
	          }
	        }
	      }
	    }elseif($i==4){
	      if(!empty($pengalaman[$i])){
	        if(!empty($record_pjk_ahli) || !empty($record_pjk_trampil)){
	          $data['K3']="K3";
	          $data[$i]=array('kualifikasi'=>'K3','value'=>10);
	          if($kualifikasi==10){$permohonan="TRUE";}
	        }
	      }
	    }elseif($i==5){
	      if(!empty($pengalaman[$i])){
	        if(!empty($record_pjk_ahli) || !empty($record_pjk_trampil)){
	          $data['K2']="K2";
	          $data[$i]=array('kualifikasi'=>'K2','value'=>9);
	          if($kualifikasi==9){$permohonan="TRUE";}
	        }
	      }
	    }elseif($i==6){

	      if(!empty($pengalaman[$i])){
	        if(!empty($record_pjk_ahli) || !empty($record_pjk_trampil)){
	          $data['K1']="K1";
	          $data[$i]=array('kualifikasi'=>'K1','value'=>8);
	          if($kualifikasi==8){$permohonan="TRUE";}
	        }
	      }
	    }
	  }
	  $data['permohonan_pjk']=$permohonan;
	  return $data;
	}

	function pengalaman_konsultan($record_pengalaman,$record_pengalaman_4thn,$kualifikasi,$kb){
	  $jumlah=0;
	  $jumlah_4thn=0;
	  $terbesar=0;
	  foreach($record_pengalaman as $row){
	    $jumlah=$row['Nilai_Kontrak']+$jumlah;
	    if($row['Nilai_Kontrak']>$terbesar){
	      $terbesar=$row['Nilai_Kontrak'];
	    }
	  }
	  foreach($record_pengalaman_4thn as $row2){
	    $jumlah_4thn=$row2['Nilai_Kontrak']+$jumlah_4thn;
	  }
	  $permohonan="FALSE";
	  $data=array(
	    'terbesar'=>$terbesar,
	    'akumulasi'=>$jumlah,
	    'akumulasi_4thn'=>$jumlah_4thn,
	    'P'=>"P"
	  );
	  if($kualifikasi==1){$permohonan="TRUE";}
	  $data[5]=array('kualifikasi'=>'P','value'=>1);
	  if($kualifikasi==2){$permohonan="TRUE";}
	  $data[4]=array('kualifikasi'=>'K1','value'=>2);
	  for($i=0;$i<4;$i++){
	    if($i==0){
	      $batas_akumulasi=2500000;
	      if(!empty($kb['B'])){
	        if($jumlah>$batas_akumulasi){
	          $data['B']="B";
	          $data[$i]=array('kualifikasi'=>'B','value'=>6);
	          if($kualifikasi==6){$permohonan="TRUE";}
	        }
	      }
	    }elseif($i==1){
	      $batas_akumulasi=1500000;
	      if(!empty($kb['M2'])){
	        if($jumlah>$batas_akumulasi){
	          $data['M2']="M2";
	          $data[$i]=array('kualifikasi'=>'M2','value'=>5);
	          if($kualifikasi==5){$permohonan="TRUE";}
	        }
	      }
	    }elseif($i==2){
	      $batas_akumulasi=750000;
	      if(!empty($kb['M1'])){
	          if(!empty($record_pengalaman)){
	            if($jumlah>$batas_akumulasi){
	              $data['M1']="M1";
	              $data[$i]=array('kualifikasi'=>'M1','value'=>4);
	              if($kualifikasi==4){$permohonan="TRUE";}
	            }
	          }else{
	            $data['M1']="M1";
	            $data[$i]=array('kualifikasi'=>'M1','value'=>4);
	            if($kualifikasi==4){$permohonan="TRUE";}
	          }


	      }
	    }elseif($i==3){
	      $batas_akumulasi=500000;
	      if(!empty($kb['K2'])){
	        if($jumlah_4thn>$batas_akumulasi){
	          $data['K2']="K2";
	          $data[$i]=array('kualifikasi'=>'K2','value'=>3);
	          if($kualifikasi==3){$permohonan="TRUE";}
	        }
	      }
	    }
	  }
	  $data['permohonan_pengalaman']=$permohonan;
	  return $data;

	}

	function pengalaman_kontraktor($record_pengalaman,$kualifikasi,$kb){
	  $jumlah=0;
	  $terbesar=0;
	  foreach($record_pengalaman as $row){
	    $jumlah=$row['Nilai_Kontrak']+$jumlah;
	    if($row['Nilai_Kontrak']>$terbesar){
	      $terbesar=$row['Nilai_Kontrak'];
	    }
	  }
	  $permohonan="FALSE";
	  $data=array(
	    'terbesar'=>$terbesar,
	    'akumulasi'=>$jumlah,
	    'P'=>"P"
	  );

	  $data[7]=array('kualifikasi'=>'P','value'=>7);
	  if($kualifikasi==7){$permohonan="TRUE";}
	  $data[6]=array('kualifikasi'=>'K1','value'=>8);
	  if($kualifikasi==8){$permohonan="TRUE";}

	  for($i=0;$i<6;$i++){
	    if($i==0){
	      $batas_akumulasi=250000000;
	      $batas_tertinggi=83330000;
	        if(!empty($kb['B2'])){
	          if($terbesar>$batas_tertinggi || $jumlah>$batas_akumulasi){
	            $data['B2']="B2";
	            $data[$i]=array('kualifikasi'=>'B2','value'=>14);
	            if($kualifikasi==14){$permohonan="TRUE";}

	          }else{

	            if($kualifikasi==14){$permohonan="FALSE";}
	          }
	        }
	    }elseif($i==1){
	      $batas_akumulasi=50000000;
	      $batas_tertinggi=16660000;
	      if(!empty($kb['B1'])){
	        if($terbesar>$batas_tertinggi || $jumlah>$batas_akumulasi){
	          $data['B1']="B1";
	          $data[$i]=array('kualifikasi'=>'B1','value'=>13);
	          if($kualifikasi==13){$permohonan="TRUE";}
	        }else{

	          if($kualifikasi==13){$permohonan="FALSE";}
	        }
	      }
	    }elseif($i==2){
	      $batas_akumulasi=10000000;
	      $batas_tertinggi=3330000;
	      if(!empty($kb['M2'])){
	        if($terbesar>$batas_tertinggi || $jumlah>$batas_akumulasi){
	          $data['M2']="M2";
	          $data[$i]=array('kualifikasi'=>'M2','value'=>12);
	          if($kualifikasi==12){$permohonan="TRUE";}
	        }else{

	          if($kualifikasi==12){$permohonan="FALSE";}
	        }
	      }
	    }elseif($i==3){
	      $batas_akumulasi=2500000;
	      $batas_tertinggi=833000;
	      if(!empty($kb['M1'])){

	          $data['M1']="M1";
	          $data[$i]=array('kualifikasi'=>'M1','value'=>11);
	          if($kualifikasi==11){$permohonan="TRUE";}




	      }
	    }elseif($i==4){
	      $batas_akumulasi=1750000;
	      if(!empty($kb['K3'])){
	        if($jumlah>$batas_akumulasi){
	          $data['K3']="K3";
	          $data[$i]=array('kualifikasi'=>'K3','value'=>10);
	          if($kualifikasi==10){$permohonan="TRUE";}
	        }else{

	          if($kualifikasi==10){$permohonan="FALSE";}
	        }
	      }
	    }elseif($i==5){
	      $batas_akumulasi=1000000;
	      if(!empty($kb['K2'])){
	        if($jumlah>$batas_akumulasi){
	          $data['K2']="K2";
	          $data[$i]=array('kualifikasi'=>'K2','value'=>9);
	          if($kualifikasi==9){$permohonan="TRUE";}
	        }else{

	          if($kualifikasi==9){$permohonan="FALSE";}
	        }
	      }
	    }


	  }
	  $data['permohonan_pengalaman']=$permohonan;
	  return $data;
	}
	function check_simulasi($kualifikasi){
	  $id_bu=$this->session->userdata('id_bu');
	  $status_simulasi=$this->session->userdata('status_simulasi');
	  $status="FALSE";
	  if($status_simulasi=="TRUE"){
	  $id=$this->Bu_model->jenis_usaha_kbli($id_bu);

	  if($id[0]['ID_Jenis_BU_kbli']=="0" OR $id[0]['ID_Jenis_BU_kbli']=="5"){
	    if(!empty($this->session->userdata('k14'))){
	      if($this->session->userdata('k14')==$kualifikasi){
	        $status="TRUE";
	      }
	    }
	    if(!empty($this->session->userdata('k13'))){
	      if($this->session->userdata('k13')==$kualifikasi){
	        $status="TRUE";
	      }
	    }
	    if(!empty($this->session->userdata('k12'))){
	      if($this->session->userdata('k12')==$kualifikasi){
	        $status="TRUE";
	      }
	    }
	    if(!empty($this->session->userdata('k11'))){
	      if($this->session->userdata('k11')==$kualifikasi){
	        $status="TRUE";
	      }
	    }

	    if(!empty($this->session->userdata('k10'))){
	      if($this->session->userdata('k10')==$kualifikasi){
	        $status="TRUE";
	      }
	    }
	    if(!empty($this->session->userdata('k9'))){
	      if($this->session->userdata('k9')==$kualifikasi){
	        $status="TRUE";
	      }
	    }
	    if(!empty($this->session->userdata('k8'))){
	      if($this->session->userdata('k8')==$kualifikasi){
	        $status="TRUE";
	      }
	    }
	    if(!empty($this->session->userdata('k7'))){
	      if($this->session->userdata('k7')==$kualifikasi){
	        $status="TRUE";
	      }
	    }
	  }else{
	    if(!empty($this->session->userdata('k6'))){
	      if($this->session->userdata('k6')==$kualifikasi){
	        $status="TRUE";
	      }
	    }
	    if(!empty($this->session->userdata('k5'))){
	      if($this->session->userdata('k5')==$kualifikasi){
	        $status="TRUE";
	      }
	    }

	    if(!empty($this->session->userdata('k4'))){
	      if($this->session->userdata('k4')==$kualifikasi){
	        $status="TRUE";
	      }
	    }
	    if(!empty($this->session->userdata('k3'))){
	      if($this->session->userdata('k3')==$kualifikasi){
	        $status="TRUE";
	      }
	    }
	    if(!empty($this->session->userdata('k2'))){
	      if($this->session->userdata('k2')==$kualifikasi){
	        $status="TRUE";
	      }
	    }
	    if(!empty($this->session->userdata('k1'))){
	      if($this->session->userdata('k1')==$kualifikasi){
	        $status="TRUE";
	      }
	    }
	  }
	}

	  if($status=="TRUE"){
	    return true;
	  }else{
	    $table="siki_record";
	    $data=array(
	      'id_user'=>$this->session->userdata('id_user'),
	      'keterangan'=>'Merubah hasil simulasi secara ilegal',
	      'tanggal'=>date("Y-m-d_H:i:sa")
	    );
	    $this->Bu_model->insert($table,$data);
	  }
	}

}
