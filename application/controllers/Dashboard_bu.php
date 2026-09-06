<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_bu extends CI_Controller
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
	function insert_banding(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->admin_pusat() OR $this->ion_auth->badan_usaha()){

		$post = $this->input->post();
		$upload_61=NULL;
		$tgl_permohonan=decrypt_url($this->security->xss_clean(trim($post['tgl_permohonan'])));

		if($_FILES['file']['name'])
		{
			$this->load->library('upload');
			$id_user=$this->session->userdata('id_user');
	$nmfile = date("Y-m-d").md5($id_user.date("h:i:sa"));
			$config['upload_path'] = './assets/bukti/badan_usaha/banding';
			$config['allowed_types'] = 'pdf|jpg|jpeg|png';
			$config['overwrite'] = TRUE;
			$config['file_name'] = $nmfile;
			$this->upload->initialize($config);
			if($this->upload->do_upload('file')){
				$gbr = $this->upload->data();
				$filename=$gbr['file_name'];
				$file_ext = pathinfo($filename,PATHINFO_EXTENSION);
				$alamat="./assets/bukti/badan_usaha/62_iso/";

				$upload_61=$gbr['file_name'];
			}
		}else{
			$upload_61="NULL";
		}

		$nib=$this->session->userdata('id_user');
				$select="REPLACE INTO lsbu_banding (NIB,tgl_permohonan,persyaratan)
				VALUES ('$nib','$tgl_permohonan','$upload_61')";
				$where="";
				$insert=$this->Bu_model->delete_opr($select,$where);

				if($insert=="Success"){

					$response = array(
													'result'=>1,


												);
				}else{

					$response = array(
													'result'=>0,


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
	function cek_siki(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}

		$post = $this->input->post();
		$npwp=$this->security->xss_clean(trim($post['npwp']));
		$counter="FALSE";
		$url_administrasi = "https://dev.siki.pu.go.id/siki-api/v1/badan-usaha/000.774.458.5-724.000";
		//$url_administrasi = "https://dev.siki.pu.go.id/siki-api/v1/badan-usaha/".$npwp;
		$nib=$this->session->userdata('id_user');
		$curl = curl_init($url_administrasi);
		curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		//curl_setopt($curl, CURLOPT_POSTFIELDS, $data);post
		curl_setopt($curl, CURLOPT_HTTPHEADER,array(
			"Content-type: application/json",
			"token: 45389bbe49bda920aaa4fa3b5c860efa72a869de5242fd420f575fa8b68fb51d71e1e4e036d41bf1"
		));
		$json_response = curl_exec($curl);
		$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		if ( $status != 200 AND $status != 404) {
				die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
		}
		curl_close($curl);
		$responses_administrasi = json_decode($json_response, true);
		if(!empty($responses_administrasi['data'])){
			$counter="TRUE";
			$id_propinsi=$responses_administrasi['data']['ID_Propinsi'];
			$id_kabupaten=$responses_administrasi['data']['ID_Kabupaten'];
			$nama=$responses_administrasi['data']['Nama'];
			$alamat=$responses_administrasi['data']['Alamat'];
			$kodepos=$responses_administrasi['data']['Kodepos'];
			$telepon=$responses_administrasi['data']['Telepon'];
			$fax=$responses_administrasi['data']['Fax'];
			$email=$responses_administrasi['data']['Email'];
			$web=$responses_administrasi['data']['Website'];
			$npwp=$responses_administrasi['data']['NPWP'];
			$tgl_update=date("Y-m-d");
			$username=$this->session->userdata('id_user');
			//$file=$responses_administrasi['data']['file_domisili'];
			//9

			$file9=$responses_administrasi['data']['file_npwp'];
			$filex="https://dev.siki.pu.go.id/sertifikasi/assets/bukti/badan_usaha/10_kta_asosiasi/2019-11-062a98b9ebbbbaabed06776043bc2a696e.jpg";
			$file = new SplFileInfo($file9);
			$ext_9  = $file->getExtension();
			$name_file_9=date("Y-m-d").md5($nib.date("h:i:sa"))."_SIKI.".$ext_9;
			$image9 = file_get_contents($file9);
			if($image9){
				file_put_contents('./assets/bukti/badan_usaha/9_npwp_perusahaan/'.$name_file_9, $image9);
			}else{
				$name_file_9="NULL";
			}
			//11
			$file11=$responses_administrasi['data']['file_domisili'];
			$file = new SplFileInfo($file11);
			$ext_11  = $file->getExtension();
			$name_file_11=date("Y-m-d").md5($nib.date("h:i:sa"))."_SIKI.".$ext_11;

			$image11 = file_get_contents($file11);
			if($image11){
				file_put_contents('./assets/bukti/badan_usaha/11_surat_keterangan_domisili/'.$name_file_11, $image11);
			}else{
				$name_file_11="NULL";
			}

			//13
			$file13=$responses_administrasi['data']['file_izin_pu'];
			$file = new SplFileInfo($file13);
			$ext_13  = $file->getExtension();
			$name_file_13=date("Y-m-d").md5($nib.date("h:i:sa"))."_SIKI.".$ext_13;

			$image13 = file_get_contents($file13);
			if($image13){
				file_put_contents('./assets/bukti/badan_usaha/13_izin_bagi_penanam_modal/'.$name_file_13, $image13);
			}else{
				$name_file_13="NULL";
			}
			//39
			$file39=$responses_administrasi['data']['file_iso'];
			$file = new SplFileInfo($file39);
			$ext_39  = $file->getExtension();
			$name_file_39=date("Y-m-d").md5($nib.date("h:i:sa"))."_SIKI.".$ext_39;

			$image39 = file_get_contents($file39);
			if($image39){
				file_put_contents('./assets/bukti/badan_usaha/39_sertifikat_iso/'.$name_file_39, $image39);
			}else{
				$name_file_39="NULL";
			}

			$select="REPLACE INTO lsbu_bu (NIB,id_propinsi,id_kabupaten,nama,alamat_bu,kodepos,telepon,fax,email,web,npwp,tgl_update,Username,persyaratan_9,persyaratan_11,persyaratan_13,persyaratan_39)
			VALUES ('$nib','$id_propinsi','$id_kabupaten','$nama','$alamat','$kodepos','$telepon','$fax','$email','$web','$npwp','$tgl_update','$username','$name_file_9','$name_file_11','$name_file_13','$name_file_39')";
			$where="";
			$this->Bu_model->delete_opr($select,$where);
		}
		$responses_pendirian='';
		$responses_perubahan='';
		$responses_pengurus='';
		$responses_pengalaman='';
		$responses_saham='';
		$responses_neraca='';
		$responses_tenaga_kerja='';
		if($counter=="TRUE"){
			//Akte Pendirian========================
			$url_pendirian = "https://dev.siki.pu.go.id/siki-api/v1/badan-usaha/000.774.458.5-724.000/akte-pendirian";
			//$url_administrasi = "https://dev.siki.pu.go.id/siki-api/v1/badan-usaha/".$npwp."/akte-pendirian";
			$nib=$this->session->userdata('id_user');
			$curl = curl_init($url_pendirian);
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
			curl_setopt($curl, CURLOPT_HEADER, false);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_HTTPHEADER,array("Content-type: application/json",'token: 45389bbe49bda920aaa4fa3b5c860efa72a869de5242fd420f575fa8b68fb51d71e1e4e036d41bf1'));
			$json_response = curl_exec($curl);
			$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
			if ( $status != 200 AND $status != 404) {
					die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
			}
			curl_close($curl);
			$responses_pendirian = json_decode($json_response, true);
			if(!empty($responses_pendirian['data'])){
				$nomer_akte=$responses_pendirian['data']['No_Akte_Pendirian'];
				$nama_notaris=$responses_pendirian['data']['Nama_Notaris'];
				$alamat=$responses_pendirian['data']['Alamat'];
				$tgl_akte=$responses_pendirian['data']['Tgl_Akte_Pendirian'];
				$nama_pengurus=$responses_pendirian['data']['nama_pengurus'];
				$id_jabatan=$responses_pendirian['data']['id_jabatan'];
				$kabupaten_akte=$responses_pendirian['data']['Kabupaten_Akte_Pendirian'];
				$propinsi_akte=$responses_pendirian['data']['Propinsi_Akte_Pendirian'];
				$no_pm=$responses_pendirian['data']['No_Pengesahan_Mentri'];
				$tgl_pm=$responses_pendirian['data']['Tgl_Pengesahan_Menteri'];
				$no_pn=$responses_pendirian['data']['No_Pengesahan_PN'];
				$tgn_pn=$responses_pendirian['data']['Tgl_Pengesahan_PN'];
				$no_ln=$responses_pendirian['data']['No_Pengesahan_LN'];
				$tgl_ln=$responses_pendirian['data']['Tgl_Pengesahan_LN'];
				//7
				$file7=$responses_pendirian['data']['file_akte'];
				$file = new SplFileInfo($file7);
				$ext_7  = $file->getExtension();
				$name_file_7=date("Y-m-d").md5($nib.date("h:i:sa"))."_SIKI.".$ext_7;

				$image7 = file_get_contents($file7);
				if($image7){
					file_put_contents('./assets/bukti/badan_usaha/7_akte_pendirian/'.$name_file_7, $image7);
				}else{
					$name_file_7="NULL";
				}
				$select="REPLACE INTO lsbu_akte_pendirian (NIB,nomer_akte,nama_notaris,alamat,tgl_akte,nama_pengurus,
				id_jabatan,kabupaten_akte,propinsi_akte,no_pm,tgl_pm,no_pn,tgl_pn,no_ln,tgl_ln,persyaratan)
				VALUES ('$nib','$nomer_akte','$nama_notaris','$alamat','$tgl_akte','$nama_pengurus','$id_jabatan','$kabupaten_akte',
					'$propinsi_akte','$no_pm','$tgl_pm','$no_pn','$tgn_pn','$no_ln','$tgl_ln','$name_file_7')";
				$where="";
				$this->Bu_model->delete_opr($select,$where);
			}

			//Akte Perubahan========================
			$url_perubahan = "https://dev.siki.pu.go.id/siki-api/v1/badan-usaha/000.774.458.5-724.000/akte-perubahan";
			//$url_administrasi = "https://dev.siki.pu.go.id/siki-api/v1/badan-usaha/".$npwp."/akte-pendirian";
			$nib=$this->session->userdata('id_user');
			$curl = curl_init($url_perubahan);
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
			curl_setopt($curl, CURLOPT_HEADER, false);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_HTTPHEADER,array("Content-type: application/json",'token: 45389bbe49bda920aaa4fa3b5c860efa72a869de5242fd420f575fa8b68fb51d71e1e4e036d41bf1'));
			$json_response = curl_exec($curl);
			$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
			if ( $status != 200 AND $status != 404) {
					die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
			}
			curl_close($curl);
			$responses_perubahan = json_decode($json_response, true);
			if(!empty($responses_perubahan['data'])){
				foreach($responses_perubahan['data'] as $row_perubahan){
					$nomer_akte=$row_perubahan['Nomer'];
					$nama_notaris=$row_perubahan['Nama_Notaris'];
					$alamat=$row_perubahan['Alamat'];
					$tgl_akte=$row_perubahan['Tanggal'];
					$nama_pengurus=$row_perubahan['nama_pengurus'];
					$id_jabatan=$row_perubahan['id_jabatan'];
					$kabupaten_akte=$row_perubahan['Kabupaten'];
					$propinsi_akte=$row_perubahan['propinsi'];
					$no_pm=$row_perubahan['No_Pengesahan_Mentri'];
					$tgl_pm=$row_perubahan['Tgl_Pengesahan_Menteri'];
					$no_pn=$row_perubahan['No_Pengesahan_PN'];
					$tgn_pn=$row_perubahan['Tgl_Pengesahan_PN'];
					$no_ln=$row_perubahan['No_Pengesahan_LN'];
					$tgl_ln=$row_perubahan['Tgl_Pengesahan_LN'];
					//7
					$file8=$row_perubahan['file_akte'];
					$file = new SplFileInfo($file8);
					$ext_8  = $file->getExtension();
					$name_file_8=date("Y-m-d").md5($nib.date("h:i:sa"))."_SIKI.".$ext_8;

					$image8 = file_get_contents($file8);
					if($image8){
						file_put_contents('./assets/bukti/badan_usaha/8_akte_perubahan/'.$name_file_8, $image8);
					}else{
						$name_file_8="NULL";
					}
					$select="REPLACE INTO lsbu_akte_perubahan (NIB,tgl_akte,nomer_akte,nama_notaris,alamat,nama_pengurus,
					id_jabatan,kabupaten_akte,propinsi_akte,no_pm,tgl_pm,no_pn,tgl_pn,no_ln,tgl_ln,persyaratan)
					VALUES ('$nib','$nomer_akte','$nama_notaris','$alamat','$tgl_akte','$nama_pengurus','$id_jabatan','$kabupaten_akte',
						'$propinsi_akte','$no_pm','$tgl_pm','$no_pn','$tgn_pn','$no_ln','$tgl_ln','$name_file_8')";
					$where="";
					$this->Bu_model->delete_opr($select,$where);
				}
			}
			//Pengurus========================
			$url_pengurus = "https://dev.siki.pu.go.id/siki-api/v1/badan-usaha/000.774.458.5-724.000/pengurus";
			//$url_administrasi = "https://dev.siki.pu.go.id/siki-api/v1/badan-usaha/".$npwp."/akte-pendirian";
			$nib=$this->session->userdata('id_user');
			$curl = curl_init($url_pengurus);
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
			curl_setopt($curl, CURLOPT_HEADER, false);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_HTTPHEADER,array("Content-type: application/json",'token: 45389bbe49bda920aaa4fa3b5c860efa72a869de5242fd420f575fa8b68fb51d71e1e4e036d41bf1'));
			$json_response = curl_exec($curl);
			$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
			if ( $status != 200 AND $status != 404) {
					die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
			}
			curl_close($curl);
			$responses_pengurus = json_decode($json_response, true);
			if(!empty($responses_pengurus['data'])){
				foreach($responses_pengurus['data'] as $row_pengurus){
					$no_ktp=$row_pengurus['No_KTP'];
					$nama=$row_pengurus['Nama'];
					$alamat=$row_pengurus['Alamat'];
					$kodepos=$row_pengurus['Kodepos'];
					$id_jenjang=$row_pengurus['id_jenjang'];
					$no_ijazah=$row_pengurus['no_ijazah'];
					$id_jabatan=$row_pengurus['id_jabatan'];
					$jabatan_bu=$row_pengurus['Jabatan_BU'];
					$pjbu=$row_pengurus['PJBU'];
					$id_propinsi=$row_pengurus['ID_Propinsi'];
					$id_kabupaten=$row_pengurus['ID_Kabupaten_Alamat'];
					$tgl_lahir=$row_pengurus['Tgl_Lahir'];
					$tempat_lahir=$row_pengurus['Tempat_Lahir'];
					$npwp=$row_pengurus['npwp'];

					//14
					$file14=$row_pengurus['file_ktp'];
					$file = new SplFileInfo($file14);
					$ext_14  = $file->getExtension();
					$name_file_14=date("Y-m-d").md5($nib.date("h:i:sa"))."_SIKI.".$ext_14;

					$image14 = file_get_contents($file14);
					if($image14){
						file_put_contents('./assets/bukti/badan_usaha/14_ktp_pengurus/'.$name_file_14, $image14);
					}else{
						$name_file_14="NULL";
					}
					//15
					$file15=$row_pengurus['file_npwp'];
					$file = new SplFileInfo($file15);
					$ext_15  = $file->getExtension();
					$name_file_15=date("Y-m-d").md5($nib.date("h:i:sa"))."_SIKI.".$ext_15;

					$image15 = file_get_contents($file15);
					if($image15){
						file_put_contents('./assets/bukti/badan_usaha/15_npwp_pengurus/'.$name_file_15, $image15);
					}else{
						$name_file_15="NULL";
					}
					//16
					$file16=$row_pengurus['file_riwayat'];
					$file = new SplFileInfo($file16);
					$ext_16  = $file->getExtension();
					$name_file_16=date("Y-m-d").md5($nib.date("h:i:sa"))."_SIKI.".$ext_16;

					$image16 = file_get_contents($file16);
					if($image16){
						file_put_contents('./assets/bukti/badan_usaha/15_npwp_pengurus/'.$name_file_16, $image16);
					}else{
						$name_file_16="NULL";
					}
					//17
					$file17=$row_pengurus['file_non_pns'];
					$file = new SplFileInfo($file17);
					$ext_17  = $file->getExtension();
					$name_file_17=date("Y-m-d").md5($nib.date("h:i:sa"))."_SIKI.".$ext_17;

					$image17 = file_get_contents($file17);
					if($image17){
						file_put_contents('./assets/bukti/badan_usaha/17_pernyataan_bukan_pns_pengurus/'.$name_file_17, $image17);
					}else{
						$name_file_17="NULL";
					}
					//18
					$file18=$row_pengurus['file_foto_pjbu'];
					$file = new SplFileInfo($file18);
					$ext_18  = $file->getExtension();
					$name_file_18=date("Y-m-d").md5($nib.date("h:i:sa"))."_SIKI.".$ext_18;

					$image18 = file_get_contents($file18);
					if($image18){
						file_put_contents('./assets/bukti/badan_usaha/18_photo_pjbu_pengurus/'.$name_file_18, $image18);
					}else{
						$name_file_18="NULL";
					}
					$select="REPLACE INTO lsbu_pengurus (no_ktp,NIB,nama,alamat,kodepos,id_jenjang,no_ijazah,
					id_jabatan,jabatan_bu,pjbu,id_propinsi,id_kabupaten,tgl_lahir,tempat_lahir,npwp,
					persyaratan_14,persyaratan_15,persyaratan_16,persyaratan_17,persyaratan_18)
					VALUES ('$no_ktp','$nib','$nama','$alamat','$kodepos','$id_jenjang','$no_ijazah','$id_jabatan','$jabatan_bu','$pjbu',
						'$id_propinsi','$id_kabupaten','$tgl_lahir','$tempat_lahir','$npwp','$name_file_14','$name_file_15','$name_file_16'
						,'$name_file_17','$name_file_18')";
					$where="";
					$this->Bu_model->delete_opr($select,$where);
				}
			}
			//PENGALAMAN
			$url_pengalaman = "https://dev.siki.pu.go.id/siki-api/v1/badan-usaha/000.774.458.5-724.000/pengalaman";
			//$url_administrasi = "https://dev.siki.pu.go.id/siki-api/v1/badan-usaha/".$npwp."/akte-pendirian";
			$nib=$this->session->userdata('id_user');
			$curl = curl_init($url_pengalaman);
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
			curl_setopt($curl, CURLOPT_HEADER, false);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_HTTPHEADER,array("Content-type: application/json",'token: 45389bbe49bda920aaa4fa3b5c860efa72a869de5242fd420f575fa8b68fb51d71e1e4e036d41bf1'));
			$json_response = curl_exec($curl);
			$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
			if ( $status != 200 AND $status != 404) {
					die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
			}
			curl_close($curl);
			$responses_pengalaman = json_decode($json_response, true);
			if(!empty($responses_pengalaman['data'])){
				foreach($responses_pengalaman['data'] as $row_pengalaman){
					$nomor_kontrak=$row_pengalaman['Nomor_Kontrak'];
					$nama_pengalaman=$row_pengalaman['Nama_Paket'];
					$id_klasifikasi=$row_pengalaman['ID_Klasifikasi_kbli'];
					$id_sub_klasifikasi=$row_pengalaman['ID_Sub_Klasifikasi_kbli'];
					$nilai_kontrak=$row_pengalaman['Nilai_Kontrak'];
					$id_status_kontrak=$row_pengalaman['id_status_kontrak'];
					$nomor_ba_serah_terima=$row_pengalaman['Nomor_BA_Serah_Terima'];
					$tgl_ba_serah_terima=$row_pengalaman['Tgl_BA_Serah_Terima'];
					$tgl_kontrak=$row_pengalaman['Tgl_Kontrak'];
					$tgl_mulai=$row_pengalaman['Tgl_Mulai'];
					$tgl_selesai=$row_pengalaman['Tgl_Selesai'];
					$pemberi_tugas=$row_pengalaman['Pemberi_Tugas'];
					$id_propinsi=$row_pengalaman['id_propinsi'];
					$id_sumber_dana=$row_pengalaman['ID_Sumber_Dana'];
					//36
					$file36=$row_pengalaman['file_pecah_kontrak'];
					$file = new SplFileInfo($file36);
					$ext_36  = $file->getExtension();
					$name_file_36=date("Y-m-d").md5($nib.date("h:i:sa"))."_SIKI.".$ext_36;

					$image36 = file_get_contents($file36);
					if($image36){
						file_put_contents('./assets/bukti/badan_usaha/36_surat_pecah_kontrak/'.$name_file_36, $image36);
					}else{
						$name_file_36="NULL";
					}
					//35
					$file35=$row_pengalaman['file_pajak'];
					$file = new SplFileInfo($file35);
					$ext_35  = $file->getExtension();
					$name_file_35=date("Y-m-d").md5($nib.date("h:i:sa"))."_SIKI.".$ext_35;

					$image35 = file_get_contents($file35);
					if($image35){
						file_put_contents('./assets/bukti/badan_usaha/35_faktur_pajak_ppn/'.$name_file_35, $image35);
					}else{
						$name_file_35="NULL";
					}
					//34
					$file34=$row_pengalaman['file_pho'];
					$file = new SplFileInfo($file34);
					$ext_34  = $file->getExtension();
					$name_file_34=date("Y-m-d").md5($nib.date("h:i:sa"))."_SIKI.".$ext_34;

					$image34 = file_get_contents($file34);
					if($image34){
						file_put_contents('./assets/bukti/badan_usaha/34_rekaman_pho/'.$name_file_34, $image34);
					}else{
						$name_file_34="NULL";
					}
					//32
					$file32=$row_pengalaman['file_kontrak'];
					$file = new SplFileInfo($file34);
					$ext_32  = $file->getExtension();
					$name_file_32=date("Y-m-d").md5($nib.date("h:i:sa"))."_SIKI.".$ext_32;

					$image32 = file_get_contents($file32);
					if($image32){
						file_put_contents('./assets/bukti/badan_usaha/32_pengalaman_bu/'.$name_file_32, $image32);
					}else{
						$name_file_32="NULL";
					}




					$select="REPLACE INTO lsbu_pengalaman (NIB,nomor_kontrak,nama_pengalaman,id_klasifikasi,id_sub_klasifikasi,nilai_kontrak,
					id_status_kontrak,nomor_ba_serah_terima,tgl_ba_serah_terima,tgl_kontrak,tgl_mulai,tgl_selesai,pemberi_tugas,
					id_propinsi,id_sumber_dana,persyaratan_36,persyaratan_35,persyaratan_34,persyaratan_32)
					VALUES ('$nib','$nomor_kontrak','$nama_pengalaman','$id_klasifikasi','$id_sub_klasifikasi','$nilai_kontrak','$id_status_kontrak','$nomor_ba_serah_terima','$tgl_ba_serah_terima','$tgl_kontrak',
						'$tgl_mulai','$tgl_selesai','$pemberi_tugas','$id_propinsi','$id_sumber_dana','$name_file_36','$name_file_35','$name_file_34'
						,'$name_file_32')";
					$where="";
					$this->Bu_model->delete_opr($select,$where);
				}
			}
			//KEUANGANSAHAM
			$url_saham = "https://dev.siki.pu.go.id/siki-api/v1/badan-usaha/000.774.458.5-724.000/keuangan-saham";
			//$url_administrasi = "https://dev.siki.pu.go.id/siki-api/v1/badan-usaha/".$npwp."/akte-pendirian";
			$nib=$this->session->userdata('id_user');
			$curl = curl_init($url_saham);
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
			curl_setopt($curl, CURLOPT_HEADER, false);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_HTTPHEADER,array("Content-type: application/json",'token: 45389bbe49bda920aaa4fa3b5c860efa72a869de5242fd420f575fa8b68fb51d71e1e4e036d41bf1'));
			$json_response = curl_exec($curl);
			$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
			if ( $status != 200 AND $status != 404) {
					die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
			}
			curl_close($curl);
			$responses_saham = json_decode($json_response, true);
			if(!empty($responses_saham['data'])){
				foreach($responses_saham['data'] as $row_saham){
					$nama_pemilik=$row_saham['nama_pemilik'];
					$no_ktp=$row_saham['no_ktp'];
					$alamat=$row_saham['alamat'];
					$id_propinsi=$row_saham['id_propinsi'];
					$id_kabupaten=$row_saham['id_kabupaten'];
					$kd_pos=$row_saham['kd_pos'];
					$jenis_saham=$row_saham['jenis_saham'];
					$jumlah_lembar=$row_saham['Jumlah_Lembar'];
					$nilai_perlembar=$row_saham['Nilai_Per_Lembar'];
					$modal_dasar=$row_saham['Modal_Dasar'];
					$modal_disetor=$row_saham['Modal_Disetor'];
					//36
					$filesaham=$row_saham['file_pemegang_saham'];
					$file = new SplFileInfo($filesaham);
					$ext_saham  = $file->getExtension();
					$name_file_saham=date("Y-m-d").md5($nib.date("h:i:sa"))."_SIKI.".$ext_saham;

					$imagesaham = file_get_contents($filesaham);
					if($imagesaham){
						file_put_contents('./assets/bukti/badan_usaha/bukti_pemegang_saham/'.$name_file_saham, $imagesaham);
					}else{
						$name_file_saham="NULL";
					}




					$select="REPLACE INTO lsbu_keuangan_saham (NIB,nama_pemilik,no_ktp,alamat,id_propinsi,id_kabupaten,
					kd_pos,jenis_saham,jumlah_lembar,nilai_perlembar,modal_dasar,modal_disetor,persyaratan)
					VALUES ('$nib','$nama_pemilik','$no_ktp','$alamat','$id_propinsi','$id_kabupaten','$kd_pos','$jenis_saham','$jumlah_lembar','$nilai_perlembar',
						'$modal_dasar','$modal_disetor','$name_file_saham')";
					$where="";
					$this->Bu_model->delete_opr($select,$where);
				}
			}
			//KEUANGANneraca
			$url_neraca = "https://dev.siki.pu.go.id/siki-api/v1/badan-usaha/000.774.458.5-724.000/keuangan-neraca";
			//$url_administrasi = "https://dev.siki.pu.go.id/siki-api/v1/badan-usaha/".$npwp."/akte-pendirian";
			$nib=$this->session->userdata('id_user');
			$curl = curl_init($url_neraca);
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
			curl_setopt($curl, CURLOPT_HEADER, false);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_HTTPHEADER,array("Content-type: application/json",'token: 45389bbe49bda920aaa4fa3b5c860efa72a869de5242fd420f575fa8b68fb51d71e1e4e036d41bf1'));
			$json_response = curl_exec($curl);
			$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
			if ( $status != 200 AND $status != 404) {
					die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
			}
			curl_close($curl);
			$responses_neraca = json_decode($json_response, true);
			if(!empty($responses_neraca['data'])){
				foreach($responses_neraca['data'] as $row_neraca){
					$tahun=$row_neraca['Tahun'];
					$aktiva_lancar=$row_neraca['Kas_Bank']+$row_neraca['PiutangUsaha']+$row_neraca['Persediaan']+$row_neraca['PiutangPajak']+$row_neraca['BiayaDimuka']+$row_neraca['WIP']+$row_neraca['AktivaLancarLainnya'];
					$aktiva_tetap=$row_neraca['Peralatan']+$row_neraca['Inventaris']+$row_neraca['PeralatanLain']+$row_neraca['AkumulasiPenyusutan']+$row_neraca['Asset_tanah_bangunan']+$row_neraca['AktivaTetapLainnya']+$row_neraca['AktivaLain'];
					$kewajiban_lancar=$row_neraca['UtangUsaha']+$row_neraca['UtangBank']+$row_neraca['UangMuka']+$row_neraca['UtangPajak']+$row_neraca['BiayaMasihDibayar']+$row_neraca['UtangJPJT']+$row_neraca['UtangLain'];
					$ekuitas=$row_neraca['ModalDisetor']+$row_neraca['SelisihRevaluasi']+$row_neraca['modallain']+$row_neraca['LabaDitahan'];
					$modal_disetor=$row_neraca['ModalDisetor'];
					//36
					$filekap=$row_neraca['file_akuntan_publik'];
					$file = new SplFileInfo($filekap);
					$ext_kap  = $file->getExtension();
					$name_file_kap=date("Y-m-d").md5($nib.date("h:i:sa"))."_SIKI.".$ext_kap;

					$imagekap = file_get_contents($filekap);
					if($imagekap){
						file_put_contents('./assets/bukti/badan_usaha/kap/'.$name_file_kap, $imagekap);
					}else{
						$name_file_kap="NULL";
					}




					$select="REPLACE INTO lsbu_keuangan_neraca_2 (NIB,Tahun,aktiva_lancar,aktiva_tetap,kewajiban_lancar,
					ekuitas,modal_disetor,persyaratan)
					VALUES ('$nib','$tahun','$aktiva_lancar','$aktiva_tetap','$kewajiban_lancar','$ekuitas','$modal_disetor','$name_file_kap')";
					$where="";
					$this->Bu_model->delete_opr($select,$where);
				}
			}
			//tenaga_kerja
			$url_tenaga_kerja = "https://dev.siki.pu.go.id/siki-api/v1/badan-usaha/000.774.458.5-724.000/tenaga-kerja";
			//$url_administrasi = "https://dev.siki.pu.go.id/siki-api/v1/badan-usaha/".$npwp."/akte-pendirian";
			$nib=$this->session->userdata('id_user');
			$curl = curl_init($url_tenaga_kerja);
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
			curl_setopt($curl, CURLOPT_HEADER, false);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_HTTPHEADER,array("Content-type: application/json",'token: 45389bbe49bda920aaa4fa3b5c860efa72a869de5242fd420f575fa8b68fb51d71e1e4e036d41bf1'));
			$json_response = curl_exec($curl);
			$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
			if ( $status != 200 AND $status != 404) {
					die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
			}
			curl_close($curl);
			$responses_tenaga_kerja = json_decode($json_response, true);
			if(!empty($responses_tenaga_kerja['data'])){
				foreach($responses_tenaga_kerja['data'] as $row_tk){
					$id_personal=$row_tk['no_ktp'];
					$nama=$row_tk['nama'];
					$tgl_lahir=$row_tk['tgl_lahir'];
					$no_ktp=$row_tk['no_ktp'];
					$alamat=$row_tk['alamat'];
					$kodepos=$row_tk['kodepos'];
					$pendidikan_akhir=$row_tk['Pend_Akhir'];
					$no_ijazah=$row_tk['no_ijazah'];
					$id_sub_bidang=$row_tk['ID_Sub_Bidang_Klasifikasi'];
					$id_kualifikasi=$row_tk['id_kualifikasi'];
					$pjt=$row_tk['PJT'];
					$pjk=$row_tk['PJK'];
					$pjsk=$row_tk['PJSK'];
					$tenaga_kerja=$row_tk['TRAMPIL'];
					$noreg=$row_tk['Noreg'];
					$thn_lulus=$row_tk['Thn_Lulus'];
					$id_klasifikasi_pjk1=$row_tk['id_klasifikasi_pjk1'];
					$id_klasifikasi_pjk2=$row_tk['id_klasifikasi_pjk2'];
					$id_sub_klasifikasi_pjsk1=$row_tk['id_sub_klasifikasi_pjsk1'];
					$id_sub_klasifikasi_pjsk2=$row_tk['id_sub_klasifikasi_pjsk2'];
					$npwpx=$row_tk['npwp'];
					//23
					$file23=$row_tk['file_skk'];
					$file = new SplFileInfo($file23);
					$ext_23  = $file->getExtension();
					$name_file_23=date("Y-m-d").md5($nib.date("h:i:sa"))."_SIKI.".$ext_23;
					$image23 = file_get_contents($file23);
					if($image23){
						file_put_contents('./assets/bukti/badan_usaha/23_photo_copy_ska_tk/'.$name_file_23, $image23);
					}else{
						$name_file_23="NULL";
					}

					$select="REPLACE INTO lsbu_tenaga_kerja (id_personal,NIB,nama,tgl_lahir,no_ktp,alamat,
					kodepos,pendidikan_akhir,no_ijazah,id_sub_bidang,id_kualifikasi,pjt,pjk,pjsk,tenaga_kerja,
					noreg,thn_lulus,id_klasifikasi_pjk1,id_klasifikasi_pjk2,id_sub_klasifikasi_pjsk1,id_sub_klasifikasi_pjsk2,
					npwp,persyaratan_23)
					VALUES ('id_personal','$nib','$nama','$tgl_lahir','$no_ktp','$alamat','$kodepos','$pendidikan_akhir','$no_ijazah',
					'$id_sub_bidang','$id_kualifikasi','$pjt','$pjk','$pjsk','$tenaga_kerja','$noreg','$thn_lulus','$id_klasifikasi_pjk1',
					'$id_klasifikasi_pjk2','$id_sub_klasifikasi_pjsk1','$id_sub_klasifikasi_pjsk2','$npwpx','$name_file_23')";
					$where="";
					$this->Bu_model->delete_opr($select,$where);
				}
			}
		}


		$response = array(
										'npwp'=>$npwp,
										'siki'=>$responses_administrasi,
										'pendirian'=>$responses_pendirian,
										'perubahan'=>$responses_perubahan,
										'pengurus'=>$responses_pengurus,
										'pengalaman'=>$responses_pengalaman,
										'saham'=>$responses_saham,
										'neraca'=>$responses_neraca,
										'tenaga_kerja'=>$responses_tenaga_kerja,
										'status'=>$status,
										'counter'=>$counter

									);

				echo json_encode($response);

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
			'record'=>$this->Bu_model->biodata_opr($nib)

		);
		$this->template->load('menu/menu','bu/import', $this->data);

	}
	function message_bu(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}elseif($this->ion_auth->badan_usaha()){

		$limit_per_page = 10;
		$start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$total_records = 100;
		if ($total_records > 0)
		{
				// get current page records
				$config['display_pages'] = FALSE;
				$config['base_url'] = base_url() . 'dashboard_bu/message_bu';
				$config['total_rows'] = $total_records;
				$config['per_page'] = $limit_per_page;
				$config["uri_segment"] = 3;
				$config['full_tag_open'] = '<div class="pagination">';
				$config['full_tag_close'] = '</div>';

				$config['first_link'] = '';
				$config['first_tag_open'] = '';
				$config['first_tag_close'] = '';

				$config['last_link'] = '';
				$config['last_tag_open'] = '';
				$config['last_tag_close'] = '';

				$config['next_link'] = '<span class="btn btn-default btn-icon btn-sm mr-2" data-toggle="tooltip" title="Next page"><i class="ki ki-bold-arrow-next icon-sm"></i>';
				$config['next_tag_open'] = '';
				$config['next_tag_close'] = '</span>';

				$config['prev_link'] = '<span class="btn btn-default btn-icon btn-sm mr-2" data-toggle="tooltip" title="Previose page"><i class="ki ki-bold-arrow-back icon-sm"></i>';
				$config['prev_tag_open'] = '';
				$config['prev_tag_close'] = '</span>';

				$config['cur_tag_open'] = '<span class="curlink">';
				$config['cur_tag_close'] = '</span>';

				$config['num_tag_open'] = '<span class="numlink">';
				$config['num_tag_close'] = '</span>';
				$this->pagination->initialize($config);

				// build paging links


		}
		$history=$this->Bu_model->get_current_page_records_message($limit_per_page, $start_index);
		$this->data = array(
			'links'=>$this->pagination->create_links(),
			'history'=>$history,
			'start'=>$start_index,
			'jumlah'=>$this->Bu_model->get_total_records(),
			'jumlah_message'=>$this->Bu_model->get_total_records_message(),
		);

		$this->template->load('menu/menu','message_bu', $this->data);
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
		}elseif($this->ion_auth->badan_usaha()){

		$limit_per_page = 10;
		$start_index = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$total_records = 100;
		if ($total_records > 0)
		{
				// get current page records
				$config['display_pages'] = FALSE;
				$config['base_url'] = base_url() . 'dashboard_bu/index';
				$config['total_rows'] = $total_records;
				$config['per_page'] = $limit_per_page;
				$config["uri_segment"] = 3;
				$config['full_tag_open'] = '<div class="pagination">';
				$config['full_tag_close'] = '</div>';

				$config['first_link'] = '';
				$config['first_tag_open'] = '';
				$config['first_tag_close'] = '';

				$config['last_link'] = '';
				$config['last_tag_open'] = '';
				$config['last_tag_close'] = '';

				$config['next_link'] = '<span class="btn btn-default btn-icon btn-sm mr-2" data-toggle="tooltip" title="Next page"><i class="ki ki-bold-arrow-next icon-sm"></i>';
				$config['next_tag_open'] = '';
				$config['next_tag_close'] = '</span>';

				$config['prev_link'] = '<span class="btn btn-default btn-icon btn-sm mr-2" data-toggle="tooltip" title="Previose page"><i class="ki ki-bold-arrow-back icon-sm"></i>';
				$config['prev_tag_open'] = '';
				$config['prev_tag_close'] = '</span>';

				$config['cur_tag_open'] = '<span class="curlink">';
				$config['cur_tag_close'] = '</span>';

				$config['num_tag_open'] = '<span class="numlink">';
				$config['num_tag_close'] = '</span>';
				$this->pagination->initialize($config);

				// build paging links


		}
		$history=$this->Bu_model->get_current_page_records($limit_per_page, $start_index);
    $this->data = array(
			'links'=>$this->pagination->create_links(),
			'history'=>$history,
			'start'=>$start_index,
			'jumlah'=>$this->Bu_model->get_total_records(),
			'jumlah_message'=>$this->Bu_model->get_total_records_message(),
    );

    $this->template->load('menu/menu','dashboard_bu', $this->data);
	}else{
		$this->session->set_flashdata('title','Warning');
		$this->session->set_flashdata('text','Anda tidak memiliki akses');
		$this->session->set_flashdata('class', "warning");
		redirect('login','refresh');
	}
	}

	function permohonan_masuk(){
		if (!$this->ion_auth->ceklogin())
		{
			$this->session->set_flashdata('title','Login Gagal');
			$this->session->set_flashdata('text','Anda Tidak Memiliki Akses, Silahkan Login Dahulu');
			$this->session->set_flashdata('class', "warning");
			redirect('login', 'refresh');
		}
		$this->data = array(
			'record'=>'',

		);
		$this->template->load('menu/menu','permohonan_masuk', $this->data);

	}

}
?>
