<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bu_model2 extends CI_Model
{
	public function __construct(){
		parent::__construct();
	}
	function vv_user(){

		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('level','0');
		$this->db->where('status_aktif','0');
		$query = $this->db->get();
		return $query->result_array();
	}
	function search_permohonan_bu($limit, $start){

		$this->db->limit($limit, $start);
		$this->db->select('*');
		$this->db->from('bu_registrasi_history_kbli');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function klasifikasi_bu_2020(){
		$this->db->select('*');
		$this->db->from('bu_klasifikasi_sub_kbli_2020');
		$this->db->group_by('klasifikasi');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function sub_klasifikasi_bu_2020(){
		$this->db->select('*');
		$this->db->from('bu_klasifikasi_sub_kbli_2020');
		$query = $this->db->get();
		return $query->result_array();
	}


	function search_check_permohonan_bu($select,$where){
		$query=$this->db->query("$select $where");
		return $query->result_array();
  }



	function search_pjbu($id_personal){
		$otherdb = $this->load->database('default2', TRUE);

		$otherdb->select('bu_pengurus.No_KTP,bu.Nama');
		$otherdb->from('bu_pengurus');
		$otherdb->join('bu','bu_pengurus.id_bu=bu.ID_BU','left');

		$otherdb->where("bu_pengurus.No_KTP",$id_personal);
		$otherdb->where("bu_pengurus.PJBU","1");
		$query = $otherdb->get();
		return $query->result_array();
	}



	function get_user_search_bu($record,$tgl_awal,$tgl_akhir){
	$this->db->select('bu.Nama as aa,bu_asosiasi_detail.Nama as bb,bu_registrasi_history_kbli.id_sub_klasifikasi_kbli as cc,bu_registrasi_history_kbli.kualifikasi_kbli as dd,bu_registrasi_history_kbli.id_status as ee,bu_registrasi_history_kbli.Tgl_proses as ff,bu_registrasi_history_kbli.tgl_permohonan as gg');
	$this->db->from('bu_registrasi_history_kbli');
	$this->db->join('bu','bu_registrasi_history_kbli.ID_BU=bu.ID_BU','left');
	$this->db->join('bu_asosiasi_detail','bu_registrasi_history_kbli.ID_Asosiasi_BU=bu_asosiasi_detail.ID_Asosiasi_BU','left');
	$this->db->where('bu_registrasi_history_kbli.User_name',$record);
	$this->db->where("bu_registrasi_history_kbli.Tgl_proses BETWEEN '$tgl_awal' AND '$tgl_akhir'");
	$query = $this->db->get();
	return $query->result_array();
}

function get_user_search_ta($record,$tgl_awal,$tgl_akhir){
$this->db->select('personal.Nama as aa,personal_profesi_ta.Nama as bb,tk_registrasi_history.id_sub_bidang as cc,tk_registrasi_history.id_Kualifikasi_profesi as dd,tk_registrasi_history.id_status as ee,tk_registrasi_history.Tgl_proses as ff,tk_registrasi_history.tgl_permohonan as gg');
$this->db->from('tk_registrasi_history');
$this->db->join('personal','tk_registrasi_history.ID_Personal=personal.ID_Personal','left');
$this->db->join('personal_profesi_ta','tk_registrasi_history.ID_Asosiasi_profesi=personal_profesi_ta.ID_Asosiasi_Profesi','left');
$this->db->where('tk_registrasi_history.User_name',$record);
$this->db->where("tk_registrasi_history.Tgl_proses BETWEEN '$tgl_awal' AND '$tgl_akhir'");
$query = $this->db->get();
return $query->result_array();
}
function get_user_search_tt($record,$tgl_awal,$tgl_akhir){
$this->db->select('personal.Nama as aa,personal_profesi_ta.Nama as bb,tk_registrasi_history_tt.id_sub_bidang as cc,tk_registrasi_history_tt.id_Kualifikasi_profesi as dd,tk_registrasi_history_tt.id_status as ee,tk_registrasi_history_tt.Tgl_proses as ff,tk_registrasi_history_tt.tgl_permohonan as gg');
$this->db->from('tk_registrasi_history_tt');
$this->db->join('personal','tk_registrasi_history_tt.ID_Personal=personal.ID_Personal','left');
$this->db->join('personal_profesi_ta','tk_registrasi_history_tt.ID_Asosiasi_profesi=personal_profesi_ta.ID_Asosiasi_Profesi','left');
$this->db->where('tk_registrasi_history_tt.User_name',$record);
$this->db->where("tk_registrasi_history_tt.Tgl_proses BETWEEN '$tgl_awal' AND '$tgl_akhir'");
$query = $this->db->get();
return $query->result_array();
}
	function get_report_user_2020(){
			$otherdb = $this->load->database('default2', TRUE);
			$query =$otherdb->query("SELECT a.Id_User,c.Nama AS nama_provinsi,a.ID_Asosiasi,a.jenis_asosiasi,a.email_pemberi,a.No_HP,a.status_user_aktif,
	    a.nama,a.No_KTP,b.persyaratan,b.Date,b.Kode,b.Status,b.Status_kirim,b.Status_valid FROM user_lpjk a LEFT JOIN
	    user_lpjk_persyaratan_2020 b ON  a.Id_User=b.Id_User
	    INNER JOIN propinsi c ON a.id_propinsi=c.ID_Propinsi");
			return $query->result_array();
		}
	function get_valid_success_asesor($propinsi){
	$this->db->select('asesor_persyaratan.ID_asesor');
	$this->db->from('asesor_persyaratan');
	$this->db->join('asesor','asesor.ID_asesor=asesor_persyaratan.ID_asesor','left');
	$this->db->where('asesor.propinsi',$propinsi);
	$this->db->where('asesor_persyaratan.Status_Kirim','1');
	$this->db->where('asesor_persyaratan.Status_Valid','1');
	$this->db->where('asesor_persyaratan.Status','1');
	$query = $this->db->get();
	return $query->result_array();
}
	function get_valid_propinsi_asesor($propinsi){
	$this->db->select('asesor_persyaratan.ID_asesor');
	$this->db->from('asesor_persyaratan');
	$this->db->join('asesor','asesor.ID_asesor=asesor_persyaratan.ID_asesor','left');
	$this->db->where('asesor.propinsi',$propinsi);
	$this->db->where('asesor_persyaratan.Status_Kirim','1');
	$this->db->where('asesor_persyaratan.Status_Valid','1');
	$query = $this->db->get();
	return $query->result_array();
}
function get_invalid_propinsi_asesor($propinsi){
$this->db->select('asesor_persyaratan.ID_asesor');
$this->db->from('asesor_persyaratan');
$this->db->join('asesor','asesor.ID_asesor=asesor_persyaratan.ID_asesor','left');
$this->db->where('asesor.propinsi',$propinsi);
$this->db->where('asesor_persyaratan.Status_Kirim','1');
$this->db->where('asesor_persyaratan.Status_Valid','0');
$query = $this->db->get();
return $query->result_array();
}
	function get_valid_propinsi($propinsi){
	$otherdb = $this->load->database('default2', TRUE);
	$otherdb->select('user_lpjk_persyaratan_2020.Id_User');
	$otherdb->from('user_lpjk_persyaratan_2020');
	$otherdb->join('user_lpjk','user_lpjk.Id_User=user_lpjk_persyaratan_2020.Id_User','left');
	$otherdb->where('user_lpjk.id_propinsi',$propinsi);
	$otherdb->where('user_lpjk_persyaratan_2020.Status_Kirim','1');
	$otherdb->where('user_lpjk_persyaratan_2020.Status_Valid','1');
	$query = $otherdb->get();
	return $query->result_array();
}
function get_valid_success($propinsi){
$otherdb = $this->load->database('default2', TRUE);
$otherdb->select('user_lpjk_persyaratan_2020.Id_User');
$otherdb->from('user_lpjk_persyaratan_2020');
$otherdb->join('user_lpjk','user_lpjk.Id_User=user_lpjk_persyaratan_2020.Id_User','left');
$otherdb->where('user_lpjk.id_propinsi',$propinsi);
$otherdb->where('user_lpjk_persyaratan_2020.Status_Kirim','1');
$otherdb->where('user_lpjk_persyaratan_2020.Status_Valid','1');
$otherdb->where('user_lpjk_persyaratan_2020.Status','1');
$query = $otherdb->get();
return $query->result_array();
}
function get_invalid_propinsi($propinsi){
$otherdb = $this->load->database('default2', TRUE);
$otherdb->select('user_lpjk_persyaratan_2020.Id_User');
$otherdb->from('user_lpjk_persyaratan_2020');
$otherdb->join('user_lpjk','user_lpjk.Id_User=user_lpjk_persyaratan_2020.Id_User','left');
$otherdb->where('user_lpjk.id_propinsi',$propinsi);
$otherdb->where('user_lpjk_persyaratan_2020.Status_Kirim','1');
$otherdb->where('user_lpjk_persyaratan_2020.Status_Valid','0');
$query = $otherdb->get();
return $query->result_array();
}
public function search_user_asesor_2020_check($record,$count,$propinsi){


	$this->db->select('asesor_persyaratan.Status,asesor_persyaratan.Status_kirim,asesor_persyaratan.Status_valid,asesor.Alamat,asesor.Nama_asesor,asesor.No_KTP,propinsi.Nama as nama_propinsi,asesor.email,asesor.telp,asesor_persyaratan.ID_asesor,asesor_persyaratan.persyaratan');
	$this->db->from('asesor_persyaratan');
	$this->db->join('asesor','asesor_persyaratan.ID_asesor=asesor.ID_asesor','left');
	$this->db->join('propinsi','propinsi.ID_Propinsi=asesor.propinsi','left');
	if($record!=''){
		$this->db->where('asesor_persyaratan.ID_asesor',$record);
	}
	if($propinsi!='0'){
		$this->db->where('asesor.propinsi',$propinsi);
	}
	if($count!='0'){
		$this->db->limit($count);
	}


	$query = $this->db->get();
	return $query->result_array();
}
	public function search_user_asesor_2020($record,$count,$propinsi){


		$this->db->select('asesor.Alamat,asesor.Nama_asesor,asesor.No_KTP,propinsi.Nama as nama_propinsi,asesor.email,asesor.telp,asesor_persyaratan.ID_asesor,asesor_persyaratan.persyaratan');
		$this->db->from('asesor_persyaratan');
		$this->db->join('asesor','asesor_persyaratan.ID_asesor=asesor.ID_asesor','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi=asesor.propinsi','left');
		if($record!=''){
			$this->db->where('asesor_persyaratan.ID_asesor',$record);
		}
		if($propinsi!='0'){
			$this->db->where('asesor.propinsi',$propinsi);
		}
		if($count!='0'){
			$this->db->limit($count);
		}
		$this->db->where('asesor_persyaratan.Status_kirim','0');


		$query = $this->db->get();
		return $query->result_array();
	}

	public function search_user_siki_2020_check($record,$count,$propinsi){
		$otherdb = $this->load->database('default2', TRUE);

		$otherdb->select('user_lpjk_persyaratan_2020.Status,user_lpjk_persyaratan_2020.Status_kirim,user_lpjk_persyaratan_2020.Status_valid,user_lpjk.nama,user_lpjk.No_KTP,user_lpjk.Username,user_lpjk.ID_Asosiasi as nama_asosiasi,propinsi.Nama as nama_propinsi,user_lpjk.jenis_asosiasi,user_lpjk.email_pemberi,user_lpjk.No_HP,user_lpjk_persyaratan_2020.Id_User,user_lpjk_persyaratan_2020.persyaratan');
		$otherdb->from('user_lpjk_persyaratan_2020');
		$otherdb->join('user_lpjk','user_lpjk.Id_User=user_lpjk_persyaratan_2020.Id_User','left');
		$otherdb->join('propinsi','propinsi.ID_Propinsi=user_lpjk.id_propinsi','left');
		if($record!=''){
			$otherdb->where('user_lpjk_persyaratan_2020.Id_User',$record);
		}
		if($propinsi!='0'){
			$otherdb->where('user_lpjk.id_propinsi',$propinsi);
		}
		if($count!='0'){
			$otherdb->limit($count);
		}


		$query = $otherdb->get();
		return $query->result_array();
	}
	public function search_user_siki_2020($record,$count,$option,$propinsi){
		$otherdb = $this->load->database('default2', TRUE);

		$otherdb->select('user_lpjk.nama,user_lpjk.No_KTP,user_lpjk.Username,user_lpjk.ID_Asosiasi as nama_asosiasi,propinsi.Nama as nama_propinsi,user_lpjk.jenis_asosiasi,user_lpjk.email_pemberi,user_lpjk.No_HP,user_lpjk_persyaratan_2020.Id_User,user_lpjk_persyaratan_2020.persyaratan');
		$otherdb->from('user_lpjk_persyaratan_2020');
		$otherdb->join('user_lpjk','user_lpjk.Id_User=user_lpjk_persyaratan_2020.Id_User','left');
		$otherdb->join('propinsi','propinsi.ID_Propinsi=user_lpjk.id_propinsi','left');
		if($record!=''){
			$otherdb->where('user_lpjk_persyaratan_2020.Id_User',$record);
		}
		if($propinsi!='0'){
			$otherdb->where('user_lpjk.id_propinsi',$propinsi);
		}
		if($option!='0'){
			$otherdb->where('user_lpjk.jenis_asosiasi',$option);
		}
		if($count!='0'){
			$otherdb->limit($count);
		}
		$otherdb->where('user_lpjk_persyaratan_2020.Status_kirim','0');


		$query = $otherdb->get();
		return $query->result_array();
	}
	function get_bu_dukcapil(){
		//$this->db->limit(9000, 0);
		$this->db->select('bu_brbu.no_reg,log_dukcapil_report.no_ktp,log_dukcapil_report.user_get,log_dukcapil_report.time,bu_brbu.id_klasifikasi,');
		$this->db->from('log_dukcapil_report');
		$this->db->join('bu_pengurus','bu_pengurus.No_KTP=log_dukcapil_report.no_ktp','left');
		$this->db->join('bu_brbu','bu_pengurus.id_bu=bu_pengurus.id_bu','left');
		$this->db->where('bu_brbu.create_date > log_dukcapil_report.time');
		//$this->db->where('log_dukcapil_report.no_ktp','1105011909890005');


		$query = $this->db->get();
		return $query->result_array();

	}


	public function pengurus_dukcapil($id_bu){
		$this->db->select('bu_pengurus.No_KTP,bu_pengurus.Nama,bu_pengurus.Tgl_Lahir,bu_pengurus.Tempat_Lahir,bu_pengurus.Alamat,propinsi.Nama as Nama_Propinsi,kabupaten.Nama as Nama_Kabupaten');
		$this->db->from('bu_pengurus');
		$this->db->join('propinsi','propinsi.ID_Propinsi=bu_pengurus.ID_Propinsi','left');
		$this->db->join('kabupaten','kabupaten.ID_Kabupaten=bu_pengurus.ID_Kabupaten_Alamat','left');
		$this->db->where('bu_pengurus.id_bu',$id_bu);
		$this->db->where('bu_pengurus.PJBU','1');
		$query = $this->db->get();
		return $query->result_array();
	}

		public function personal_sertifikat_ta_hapus($id_personal,$sub){
			$this->db->select('*');
			$this->db->from('personal_sertifikat_ta_hapus');
			$this->db->where('ID_Personal',$id_personal);
			$this->db->where('ID_Sub_Bidang',$sub);
			$query = $this->db->get();
			return $query->result_array();
		}

	public function klasifikasi_ta_hapus($id_personal,$sub){
		$this->db->select('ID_Kualifikasi');
		$this->db->from('personal_reg_ta_kbli_hapus');
		$this->db->where('ID_Personal',$id_personal);
		$this->db->where('ID_Sub_Bidang',$sub);
		$this->db->order_by('Tgl_Registrasi', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function nps2($rata2,$sub,$id_bu){
		$sekarang=date('Y');
		$th10=$sekarang-10;
		$x=$th10.'-'.date("m-d");
		$this->db->distinct();
		$this->db->select('bu_pengalaman_kbli.Nilai_Kontrak,bu_pengalaman_kbli.ID_Sub_Klasifikasi_kbli,LEFT(bu_pengalaman_kbli.Tgl_Selesai,4) AS tahun,(((('.$rata2.'/bu_bps_indexs.rata_rata)*bu_pengalaman_kbli.Nilai_Kontrak)/1000)*3) AS KD,(('.$rata2.'/bu_bps_indexs.rata_rata)*bu_pengalaman_kbli.Nilai_Kontrak) AS NPS');
		$this->db->from('bu_pengalaman_kbli');
		$this->db->join('bu_bps_indexs','LEFT(bu_pengalaman_kbli.Tgl_Selesai,4)=bu_bps_indexs.tahun_bps','left');
		$this->db->where('bu_pengalaman_kbli.Tgl_Selesai >=', $x);
		$this->db->where('LEFT(bu_pengalaman_kbli.Tgl_Selesai,4) <=', $sekarang);
		$this->db->where('bu_pengalaman_kbli.ID_BU',$id_bu);
		$this->db->where('bu_pengalaman_kbli.ID_Sub_Klasifikasi_kbli',$sub);
		$this->db->order_by('KD', 'DESC');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function nps($rata2,$id_bu){
		$sekarang=date('Y');
		$th10=$sekarang-10;
		$this->db->distinct();
		$this->db->select('bu_pengalaman_kbli.Nilai_Kontrak,bu_pengalaman_kbli.ID_Sub_Klasifikasi_kbli,LEFT(bu_pengalaman_kbli.Tgl_Selesai,4) AS tahun,(((('.$rata2.'/bu_bps_indexs.rata_rata)*bu_pengalaman_kbli.Nilai_Kontrak)/1000)*3) AS KD,(('.$rata2.'/bu_bps_indexs.rata_rata)*bu_pengalaman_kbli.Nilai_Kontrak) AS NPS');
		$this->db->from('bu_pengalaman_kbli');
		$this->db->join('bu_bps_indexs','LEFT(bu_pengalaman_kbli.Tgl_Selesai,4)=bu_bps_indexs.tahun_bps','left');
		$this->db->where('LEFT(bu_pengalaman_kbli.Tgl_Selesai,4) >=', $th10);
		$this->db->where('LEFT(bu_pengalaman_kbli.Tgl_Selesai,4) <=', $sekarang);
		$this->db->where('bu_pengalaman_kbli.ID_BU',$id_bu);
		$this->db->order_by('KD', 'DESC');
		$this->db->group_by('bu_pengalaman_kbli.ID_Sub_Klasifikasi_kbli');
		$query = $this->db->get();
		return $query->result_array();
	}
	function propinsi(){
	$otherdb = $this->load->database('default2', TRUE);
	$otherdb->select('*');
	$otherdb->from('propinsi');
	$query = $otherdb->get();
	return $query->result_array();
}

		function get_user_propinsi($id_asosiasi){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('user_lpjk');
		if($id_asosiasi=='000' OR $id_asosiasi=='001'){
			$otherdb->where("(ID_Asosiasi='000' OR ID_Asosiasi='001')");
		}else{
			$otherdb->where('ID_Asosiasi',$id_asosiasi);
		}
		$query = $otherdb->get();
		return $query->result_array();
	}
	function get_user_ktp_bu($ktp){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('user_lpjk');
		$otherdb->where('No_KTP',$ktp);
		$otherdb->where('jenis_asosiasi','BU');

		$query = $otherdb->get();
		return $query->result_array();
	}
	function check_sama($ktp,$jenis_asosiasi){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('user_lpjk');
		$otherdb->where('No_KTP',$ktp);
		$otherdb->where('jenis_asosiasi',$jenis_asosiasi);

		$query = $otherdb->get();
		return $query->result_array();
	}
	function check_beda($ktp,$id_asosiasi){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('user_lpjk');
		$otherdb->where('No_KTP',$ktp);
		$otherdb->where("ID_Asosiasi!='$id_asosiasi'");

		$query = $otherdb->get();
		return $query->result_array();
	}

	function get_user_ktp($ktp){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('user_lpjk');
		$otherdb->where('No_KTP',$ktp);

		$query = $otherdb->get();
		return $query->result_array();
	}
	function get_user_email($email){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('user_lpjk');
		$otherdb->where('email_pemberi',$email);

		$query = $otherdb->get();
		return $query->result_array();
	}
	function get_user_ktp_ta($ktp){
			$otherdb = $this->load->database('default2', TRUE);
			$otherdb->select('*');
			$otherdb->from('user_lpjk');
			$otherdb->where('No_KTP',$ktp);
			$otherdb->where('jenis_asosiasi','TA');

			$query = $otherdb->get();
			return $query->result_array();
		}
		function get_user_ktp_tt($ktp){
			$otherdb = $this->load->database('default2', TRUE);
			$otherdb->select('*');
			$otherdb->from('user_lpjk');
			$otherdb->where('No_KTP',$ktp);
			$otherdb->where('jenis_asosiasi','TT');

			$query = $otherdb->get();
			return $query->result_array();
		}

	function get_user($id_user){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('user_lpjk');
		$otherdb->where('Id_User',$id_user);

		$query = $otherdb->get();
		return $query->result_array();
	}
	function get_user2($id_user){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('user_lpjk');
		$otherdb->where("Id_User IN ($id_user)");

		$query = $otherdb->get();
		return $query->result_array();
	}
	function get_asesor2($id_user){
		$this->db->select('*');
		$this->db->from('asesor');
		$this->db->where("ID_asesor IN ($id_user)");

		$query = $this->db->get();
		return $query->result_array();
	}
	function get_user_persyaratan($id_user){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('user_lpjk_persyaratan');
		$otherdb->where('Id_User',$id_user);
		$query = $otherdb->get();
		return $query->result_array();
	}
	function get_user_persyaratan_2020($id_user){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('user_lpjk_persyaratan_2020');
		$otherdb->where('Id_User',$id_user);
		$query = $otherdb->get();
		return $query->result_array();
	}
	function get_user_persyaratan_2020_2($id_user){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('user_lpjk_persyaratan_2020');
		$otherdb->where("Id_User IN ($id_user)");
		$query = $otherdb->get();
		return $query->result_array();
	}
	function get_asesor_persyaratan_2020_2($id_user){
		$this->db->select('*');
		$this->db->from('asesor_persyaratan');
		$this->db->where("ID_asesor IN ($id_user)");
		$query = $this->db->get();
		return $query->result_array();
	}
	function get_user_pengajuan(){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('user_lpjk_pengajuan.Id_User,user_lpjk_pengajuan.No_KTP,user_lpjk_pengajuan.nama,user_lpjk_pengajuan.id_propinsi,user_lpjk_pengajuan.ID_Asosiasi,user_lpjk_pengajuan.jenis_asosiasi,user_lpjk_persyaratan.persyaratan_97,user_lpjk_persyaratan.persyaratan_98,user_lpjk_persyaratan.persyaratan_99');
		$otherdb->from('user_lpjk_pengajuan');
		$otherdb->join("user_lpjk_persyaratan","user_lpjk_persyaratan.Id_User = user_lpjk_pengajuan.Id_User","left");
		$otherdb->where('user_lpjk_pengajuan.stat','0');
		$query = $otherdb->get();
		return $query->result_array();
	}

	function pilih_asesor_bu($nama){
		$ktp=$this->session->userdata('ktp');
		$asosiasi=$this->session->userdata('id_asosiasi');
		$otherdb = $this->load->database('default2', TRUE);

		$otherdb->select('nama,Id_User');
		$otherdb->from('user_lpjk');

		$otherdb->where('Id_User', $nama);
		$otherdb->where('ID_Asosiasi', $asosiasi);
		$otherdb->where('jenis_asosiasi','BU');
		$otherdb->group_by('Id_User');

		$query = $otherdb->get();
		return $query->result_array();
	}
	function pilih_asesor_ta($nama){
		$ktp=$this->session->userdata('ktp');
		$asosiasi=$this->session->userdata('id_asosiasi');
		$otherdb = $this->load->database('default2', TRUE);

		$otherdb->select('nama,Id_User');
		$otherdb->from('user_lpjk');

		$otherdb->where('Id_User', $nama);
		$otherdb->where('ID_Asosiasi', $asosiasi);
		$otherdb->where('jenis_asosiasi','TA');
		$otherdb->group_by('Id_User');

		$query = $otherdb->get();
		return $query->result_array();
	}
	function pilih_asesor_tt($nama){
		$ktp=$this->session->userdata('ktp');
		$asosiasi=$this->session->userdata('id_asosiasi');
		$otherdb = $this->load->database('default2', TRUE);

		$otherdb->select('nama,Id_User');
		$otherdb->from('user_lpjk');

		$otherdb->where('Id_User', $nama);
		$otherdb->where('ID_Asosiasi', $asosiasi);
		$otherdb->where('jenis_asosiasi','TT');
		$otherdb->group_by('Id_User');

		$query = $otherdb->get();
		return $query->result_array();
	}

	function get_inform_noreg($id_bu){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('bu.Nama,bu.NPWP,propinsi.Nama as nama_propinsi');
		$otherdb->from('bu');
		$otherdb->join("propinsi","bu.ID_Propinsi = propinsi.ID_Propinsi","left");
		$otherdb->where('bu.ID_BU',$id_bu);
		$query = $otherdb->get();
		return $query->result_array();
	}

	function insert2($select,$where){
			$this->db->query("$select $where");
			$this->db->trans_complete();
			if ($this->db->trans_status() === FALSE) {
				return "Failed";
			} else {
				return "Success";
			}
		}
	function insert2_sad($select,$where){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->query("$select $where");
		$otherdb->trans_complete();
		if ($otherdb->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function get_propinsi_bu($id_bu){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('ID_Propinsi');
		$otherdb->from('bu');
		$otherdb->where('ID_BU',$id_bu);
		$query = $otherdb->get();
		return $query->result_array();
	}

	function email($id_bu){
			$otherdb = $this->load->database('default2', TRUE);
			$otherdb->select('Email');
			$otherdb->from('bu');
			$otherdb->where('ID_BU',$id_bu);
			$query = $otherdb->get();
			return $query->result_array();
	}

	function permohonan_propinsi($id_bu,$asosiasi,$tgl_permohonan){
		$otherdb = $this->load->database('default2', TRUE);
			$otherdb->select('bu.NPWP,bu_registrasi_kbli.Propinsi,bu_registrasi_kbli.kualifikasi_kbli,bu_registrasi_kbli.id_unit_sertifikasi,bu_registrasi_kbli.id_sub_klasifikasi_kbli');
			$otherdb->from('bu_registrasi_kbli');
			$otherdb->join('bu','bu.ID_BU=bu_registrasi_kbli.ID_BU','left');

			$otherdb->where('bu_registrasi_kbli.ID_BU',$id_bu);
			$otherdb->where('bu_registrasi_kbli.ID_Asosiasi_BU',$asosiasi);
			$otherdb->where('bu_registrasi_kbli.Tgl_permohonan',$tgl_permohonan);
			$query = $otherdb->get();
			return $query->result_array();

	}

	function jumlah_message(){
		$propinsi=$this->session->userdata('id_propinsi');
		$id_asosiasi=$this->session->userdata('id_asosiasi');
		$id_user=$this->session->userdata('id_user');
		$this->db->where('bu_pds_mail.ID_PROPINSI',$propinsi);
		if($this->ion_auth->ketualpjkprov() OR $this->ion_auth->bapelpusat()){
			$this->db->where('bu_pds_mail.ID_PDS',3);
		}elseif($this->ion_auth->usbupusat() OR $this->ion_auth->usbuprov()){
			$this->db->where('bu_pds_mail.ID_PDS',4);
		}elseif($this->ion_auth->asosiasi_bu_propinsi()){
			$this->db->where('bu_pds_mail.ID_PDS',1);
			$this->db->where('bu_pds_mail.ID_ASOSIASI',$id_asosiasi);
		}elseif($this->ion_auth->asosiasi_bu_pusat()){
			$this->db->where('bu_pds_mail.ID_PDS',2);
			$this->db->where('bu_pds_mail.ID_ASOSIASI',$id_asosiasi);
		}
		$this->db->where("bu_pds_mail.Status",0);
		$this->db->where("bu_pds_mail.Read",0);
		$this->db->or_where('bu_pds_mail.Id_Receive',$id_user);
		return $this->db->count_all_results("bu_pds_mail");
	}

	function get_inbox_pribadi_bu_jumlah(){
		$id_user=$this->session->userdata('id_user');
		$this->db->where('bu_pds_mail.Id_Receive',$id_user);
		$this->db->where("bu_pds_mail.Read",0);

		return $this->db->count_all_results("bu_pds_mail");
	}

/*
	function jumlah_inbox(){
		$propinsi=$this->session->userdata('id_propinsi');
		$id_asosiasi=$this->session->userdata('id_asosiasi');
		$this->db->join('bu_pds_deskripsi','bu_pds_history.ID_PDS=bu_pds_deskripsi.ID_PDS','left');
		$this->db->join('bu','bu_pds_history.ID_BU=bu.ID_BU','left');
		$this->db->join('bu_registrasi_kbli','bu_pds_history.ID_BU=bu_registrasi_kbli.ID_BU AND bu_pds_history.ID_ASOSIASI=bu_registrasi_kbli.ID_Asosiasi_BU','left');
		if($this->ion_auth->asosiasi_bu_propinsi()){
			$this->db->where('bu_pds_history.ID_ASOSIASI',$id_asosiasi);
			$this->db->where('bu_registrasi_kbli.Propinsi',$propinsi);
			$array=array('B','B2','B1');
			$this->db->where_not_in('bu_registrasi_kbli.kualifikasi_kbli',$array);
			$this->db->group_by('bu_pds_history.ID_RECORD');
		}elseif ($this->ion_auth->asosiasi_bu_pusat()) {
			$this->db->where('bu_pds_history.ID_ASOSIASI',$id_asosiasi);
			$array=array('B','B2','B1');
			$this->db->where_in('bu_registrasi_kbli.kualifikasi_kbli',$array);
			$this->db->group_by('bu_pds_history.ID_RECORD');
		}else{
			$this->db->where('bu_pds_history.ID_ASOSIASI',$id_asosiasi);
		}
		$this->db->where('bu_pds_history.Status',0);
		return $this->db->count_all_results("bu_pds_history");
	}*/
	function message_pribadi($limit, $start){

		$id_user=$this->session->userdata('id_user');
		$this->db->limit($limit, $start);
		$this->db->select('bu_asosiasi_detail.Nama as Nama_Asosiasi,bu_pds_deskripsi.Deskripsi as deskripsi_pds,bu.Nama as Nama_BU,bu_pds_group.Tgl_Permohonan,bu_pds_mail.ID_RECORD,bu_pds_mail.Tgl_Record,bu_pds_mail.Read,bu_pds_mail.ID_PDS,bu_pds_mail.ID_ASOSIASI,bu_pds_mail.Subject,bu_pds_mail.ID_GROUP,bu_pds_mail.Id_Sender');
		$this->db->from('bu_pds_mail');
		$this->db->join('bu_pds_deskripsi','bu_pds_deskripsi.ID_PDS=bu_pds_mail.ID_PDS','left');
		$this->db->join('bu_pds_group','bu_pds_group.ID_GROUP=bu_pds_mail.ID_GROUP','left');
		$this->db->join('bu','bu.ID_BU=bu_pds_group.ID_BU','left');
		$this->db->join("bu_asosiasi_detail","bu_pds_group.ID_ASOSIASI = bu_asosiasi_detail.ID_asosiasi_BU","left");

		$this->db->where('bu_pds_mail.Id_Receive',$id_user);

		$this->db->order_by("bu_pds_mail.ID_RECORD", "desc");

		$query = $this->db->get();
		return $query->result_array();
	}

	function message($limit, $start){
		$propinsi=$this->session->userdata('id_propinsi');
		$id_asosiasi=$this->session->userdata('id_asosiasi');
		$id_user=$this->session->userdata('id_user');
		$this->db->limit($limit, $start);
		$this->db->select('bu_asosiasi_detail.Nama as Nama_Asosiasi,bu_pds_deskripsi.Deskripsi as deskripsi_pds,bu.Nama as Nama_BU,bu_pds_group.Tgl_Permohonan,bu_pds_mail.ID_RECORD,bu_pds_mail.Tgl_Record,bu_pds_mail.Read,bu_pds_mail.ID_PDS,bu_pds_mail.ID_ASOSIASI,bu_pds_mail.Subject,bu_pds_mail.ID_GROUP,bu_pds_mail.Id_Sender');
		$this->db->from('bu_pds_mail');
		$this->db->join('bu_pds_deskripsi','bu_pds_deskripsi.ID_PDS=bu_pds_mail.ID_PDS','left');
		$this->db->join('bu_pds_group','bu_pds_group.ID_GROUP=bu_pds_mail.ID_GROUP','left');
		$this->db->join('bu','bu.ID_BU=bu_pds_group.ID_BU','left');
		$this->db->join("bu_asosiasi_detail","bu_pds_group.ID_ASOSIASI = bu_asosiasi_detail.ID_asosiasi_BU","left");
		$this->db->where('bu_pds_mail.ID_PROPINSI',$propinsi);
		if($this->ion_auth->ketualpjkprov() OR $this->ion_auth->bapelpusat()){
			$this->db->where('bu_pds_mail.ID_PDS',3);
		}elseif($this->ion_auth->usbupusat() OR $this->ion_auth->usbuprov()){
			$this->db->where('bu_pds_mail.ID_PDS',4);
		}elseif($this->ion_auth->asosiasi_bu_propinsi()){
			$this->db->where('bu_pds_mail.ID_PDS',1);
			$this->db->where('bu_pds_mail.ID_ASOSIASI',$id_asosiasi);
		}elseif($this->ion_auth->asosiasi_bu_pusat()){
			$this->db->where('bu_pds_mail.ID_PDS',2);
			$this->db->where('bu_pds_mail.ID_ASOSIASI',$id_asosiasi);
		}
		$this->db->where("bu_pds_mail.Status",0);
		$this->db->or_where('bu_pds_mail.Id_Receive',$id_user);

		$this->db->order_by("bu_pds_mail.ID_RECORD", "desc");

		$query = $this->db->get();
		return $query->result_array();
	}



	function get_message($id_record){
		$this->db->select('bu_asosiasi_detail.Nama as Nama_Asosiasi,bu_pds_deskripsi.Deskripsi as deskripsi_pds,bu.Nama as Nama_BU,bu_pds_group.Tgl_Permohonan,bu_pds_mail.ID_RECORD,bu_pds_mail.Tgl_Record,bu_pds_mail.Read,bu_pds_mail.ID_PDS,bu_pds_mail.ID_ASOSIASI,bu_pds_mail.Subject,bu_pds_mail.ID_GROUP,bu_pds_mail.Id_Sender,bu_pds_mail.Text');
		$this->db->from('bu_pds_mail');
		$this->db->join('bu_pds_deskripsi','bu_pds_deskripsi.ID_PDS=bu_pds_mail.ID_PDS','left');
		$this->db->join('bu_pds_group','bu_pds_group.ID_GROUP=bu_pds_mail.ID_GROUP','left');
		$this->db->join('bu','bu.ID_BU=bu_pds_group.ID_BU','left');
		$this->db->join("bu_asosiasi_detail","bu_pds_group.ID_ASOSIASI = bu_asosiasi_detail.ID_asosiasi_BU","left");
		$this->db->where('bu_pds_mail.ID_RECORD',$id_record);
		$query = $this->db->get();
		return $query->result_array();
	}

	function cek_username($id_asosiasi){
		$otherdb = $this->load->database('default2', TRUE);
			$otherdb->select('Id_User,nama,jabatan_pj');
			$otherdb->from('user_lpjk');
			$otherdb->where('ID_Asosiasi',$id_asosiasi);
			$otherdb->where('jenis_asosiasi','BU');
			$query = $otherdb->get();
			return $query->result_array();

	}

	function check_status_3($id_bu,$tgl,$id_asosiasi){
		$this->db->distinct();
		$this->db->select("bu_registrasi_history_kbli.ID_BU,bu.Nama as Nama_BU,bu_registrasi_history_kbli.id_klasifikasi_kbli,bu_klasifikasi_kbli.Deskripsi,bu_registrasi_history_kbli.id_sub_klasifikasi_kbli,bu_klasifikasi_sub_kbli.Deskripsi as Deskripsi2,bu_registrasi_history_kbli.ID_Asosiasi_BU,bu_asosiasi.Nama_Lengkap,bu_registrasi_history_kbli.Tahun,bu_registrasi_history_kbli.id_status,propinsi.Nama,bu_registrasi_history_kbli.Tgl_permohonan");
		$this->db->from("bu_registrasi_history_kbli");
		$this->db->join("propinsi","bu_registrasi_history_kbli.Propinsi = propinsi.ID_Propinsi","left");
		$this->db->join("bu_klasifikasi_kbli","bu_registrasi_history_kbli.id_klasifikasi_kbli = bu_klasifikasi_kbli.ID_Klasifikasi","left");
		$this->db->join("bu_klasifikasi_sub_kbli","bu_registrasi_history_kbli.id_sub_klasifikasi_kbli = bu_klasifikasi_sub_kbli.id_sub_klasifikasi","left");
		$this->db->join("bu_asosiasi","bu_registrasi_history_kbli.ID_Asosiasi_BU = bu_asosiasi.ID_asosiasi_BU","left");
		$this->db->join("bu","bu_registrasi_history_kbli.ID_BU = bu.ID_BU",'left');
		$this->db->where('bu_registrasi_history_kbli.ID_BU',$id_bu);
		$this->db->where('bu_registrasi_history_kbli.ID_Asosiasi_BU',$id_asosiasi);
		$this->db->where('bu_registrasi_history_kbli.tgl_permohonan',$tgl);
		$query = $this->db->get();
		return $query->result_array();
	}

	function turun_kualifikasi($id_bu,$tgl,$id_asosiasi){
		$this->db->distinct();
		$this->db->select("bu_registrasi_kbli.kualifikasi_kbli,bu_registrasi_kbli.ID_BU,bu.Nama as Nama_BU,bu_registrasi_kbli.id_klasifikasi_kbli,bu_klasifikasi_kbli.Deskripsi,bu_registrasi_kbli.id_sub_klasifikasi_kbli,bu_klasifikasi_sub_kbli.Deskripsi as Deskripsi2,bu_registrasi_kbli.ID_Asosiasi_BU,bu_asosiasi.Nama_Lengkap,bu_registrasi_kbli.Tahun,propinsi.Nama,bu_registrasi_kbli.Tgl_permohonan");
		$this->db->from("bu_registrasi_kbli");
		$this->db->join("propinsi","bu_registrasi_kbli.Propinsi = propinsi.ID_Propinsi","left");
		$this->db->join("bu_klasifikasi_kbli","bu_registrasi_kbli.id_klasifikasi_kbli = bu_klasifikasi_kbli.ID_Klasifikasi","left");
		$this->db->join("bu_klasifikasi_sub_kbli","bu_registrasi_kbli.id_sub_klasifikasi_kbli = bu_klasifikasi_sub_kbli.id_sub_klasifikasi","left");
		$this->db->join("bu_asosiasi","bu_registrasi_kbli.ID_Asosiasi_BU = bu_asosiasi.ID_asosiasi_BU","left");
		$this->db->join("bu","bu_registrasi_kbli.ID_BU = bu.ID_BU",'left');
		$this->db->where('bu_registrasi_kbli.ID_BU',$id_bu);
		$this->db->where('bu_registrasi_kbli.ID_Asosiasi_BU',$id_asosiasi);
		$this->db->where('bu_registrasi_kbli.tgl_permohonan',$tgl);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function tanggal_check($id_bu){
		$id_asosiasi=$this->session->userdata('id_asosiasi');
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->distinct();
		$otherdb->select('bu_registrasi_kbli.Tgl_permohonan,bu_registrasi_kbli.ID_Asosiasi_BU,bu_asosiasi_detail.Nama');
		$otherdb->from('bu_registrasi_kbli');
		$otherdb->join('bu_asosiasi_detail','bu_registrasi_kbli.ID_Asosiasi_BU=bu_asosiasi_detail.ID_Asosiasi_BU','left');
		$otherdb->where('bu_registrasi_kbli.ID_BU',$id_bu);
		if($this->ion_auth->asosiasi_bu_pusat() OR $this->ion_auth->asosiasi_bu_propinsi()){
			$otherdb->where('bu_registrasi_kbli.ID_Asosiasi_BU',$id_asosiasi);
		}


		$query = $otherdb->get();
		return $query->result_array();
	}

	function cek_ppkb($id_personal){

			$this->db->select('NoKTP');
			$this->db->from('personal_profile');
			$this->db->where('NoKTP',$id_personal);
			$query = $this->db->get();
			return $query->result_array();

	}

	function cek_klasifikasi($id_bu,$sub_klas){

			$this->db->select('*');
			$this->db->from('bu_registrasi_history_kbli');
			$this->db->where('ID_BU',$id_bu);
			$this->db->where('id_sub_klasifikasi_kbli',$sub_klas);
			$query = $this->db->get();
			return $query->result_array();

	}


	function get_notification(){
		$id_user=$this->session->userdata('id_user');
		$this->db->select('bu_asosiasi_detail.Nama as Nama_Asosiasi,bu_pds_history.Option1,bu_pds_history.Option2,bu.Nama,bu_pds_history.Read,bu_pds_deskripsi.Deskripsi as Deskripsi2,bu_pds_upload.Deskripsi,bu_pds_history.ID_RECORD,bu_pds_history.ID_BU,bu_pds_history.ID_PDS,bu_pds_history.ID_ASOSIASI,bu_pds_history.ID_UPLOAD,bu_pds_history.Id_User,bu_pds_history.Tgl_Record,bu_pds_history.Ket');
		$this->db->from('bu_pds_history');
		$this->db->join('bu','bu.ID_BU=bu_pds_history.ID_BU','left');
		$this->db->join('bu_asosiasi_detail','bu_asosiasi_detail.ID_Asosiasi_BU=bu_pds_history.ID_ASOSIASI','left');
		$this->db->join('bu_pds_upload','bu_pds_history.ID_UPLOAD=bu_pds_upload.ID_Upload','left');
		$this->db->join('bu_pds_deskripsi','bu_pds_history.ID_PDS=bu_pds_deskripsi.ID_PDS','left');
		$this->db->where('bu_pds_history.Id_User',$id_user);
		$this->db->where('bu_pds_history.Status','1');
		$this->db->order_by("bu_pds_history.Tgl_Record", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_notification_tk(){
		$id_user=$this->session->userdata('id_user');
		$this->db->select('personal_profesi_ta.Nama as Nama_Asosiasi,tk_pds_history.Option1,tk_pds_history.Option2,personal.Nama,tk_pds_history.Read,tk_pds_deskripsi.Deskripsi as Deskripsi2,tk_pds_upload.Deskripsi,tk_pds_history.ID_RECORD,tk_pds_history.ID_PERSONAL,tk_pds_history.ID_PDS,tk_pds_history.ID_ASOSIASI,tk_pds_history.ID_UPLOAD,tk_pds_history.Id_User,tk_pds_history.Tgl_Record,tk_pds_history.Ket');
		$this->db->from('tk_pds_history');
		$this->db->join('personal','personal.id_personal=tk_pds_history.ID_PERSONAL','left');
		$this->db->join('personal_profesi_ta','personal_profesi_ta.ID_Asosiasi_Profesi=tk_pds_history.ID_ASOSIASI','left');
		$this->db->join('tk_pds_upload','tk_pds_history.ID_UPLOAD=tk_pds_upload.ID_Upload','left');
		$this->db->join('tk_pds_deskripsi','tk_pds_history.ID_PDS=tk_pds_deskripsi.ID_PDS','left');
		$this->db->where('tk_pds_history.Id_User',$id_user);
		$this->db->where('tk_pds_history.Status','1');
		$this->db->order_by("tk_pds_history.Tgl_Record", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}


	function get_notification2(){
		$id_user=$this->session->userdata('id_user');
		$this->db->select('bu_asosiasi_detail.Nama as Nama_Asosiasi,bu_pds_history.ID_ASOSIASI');
		$this->db->from('bu_pds_history');
		$this->db->join('bu_asosiasi_detail','bu_asosiasi_detail.ID_Asosiasi_BU=bu_pds_history.ID_ASOSIASI','left');

		$this->db->where('bu_pds_history.Id_User',$id_user);
		$this->db->group_by('bu_pds_history.ID_ASOSIASI');
		$query = $this->db->get();
		return $query->result_array();
	}


	function delete($select,$where){
		$default2 = $this->load->database('default2', TRUE);
		$default2->query("$select $where");
		if ($default2->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}
	function delete_opr($select,$where){

		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function persetujuan_reg_2($nomor_urut,$propinsi,$asosiasi){
		$this->db->select('bu_nomor.BU_Nomor,bu_nomor.ID_BU,bu_nomor.NPWP,bu_sbu_kbli.tgl_terbit,bu_sbu_kbli.id_klasifikasi,bu.Nama');
		$this->db->from('bu_nomor');
		$this->db->join('bu','bu.ID_BU=bu_nomor.ID_BU','left');
		$this->db->join('bu_sbu_kbli','bu_sbu_kbli.ID_BU=bu_nomor.ID_BU','left');
		$this->db->join('registrasi_ulang_persetujuan','registrasi_ulang_persetujuan.id_bu=bu_nomor.ID_BU AND registrasi_ulang_persetujuan.id_klasifikasi=bu_sbu_kbli.id_klasifikasi AND registrasi_ulang_persetujuan.id_asosiasi_bu=bu_sbu_kbli.ID_Asosiasi_BU','left');
		$this->db->join('registrasi_ulang_persetujuan_asopusat','registrasi_ulang_persetujuan_asopusat.id_bu=bu_nomor.ID_BU AND registrasi_ulang_persetujuan_asopusat.id_klasifikasi=bu_sbu_kbli.id_klasifikasi AND registrasi_ulang_persetujuan_asopusat.id_asosiasi_bu=bu_sbu_kbli.ID_Asosiasi_BU','left');
		$this->db->where('bu_sbu_kbli.ID_Asosiasi_BU',$asosiasi);
		$this->db->where('bu_nomor.id_Propinsi',$propinsi);
		$this->db->where('bu_nomor.BU_Nomor',$nomor_urut);
		$this->db->where('registrasi_ulang_persetujuan.id_klasifikasi IS NOT NULL');
		$this->db->where('registrasi_ulang_persetujuan_asopusat.id_klasifikasi IS NULL');
		$query = $this->db->get();
		return $query->result_array();
	}

	function persetujuan_reg_3($nomor_urut,$propinsi,$asosiasi){
		$this->db->select('bu_nomor.BU_Nomor,bu_nomor.ID_BU,bu_nomor.NPWP,bu_sbu_kbli.tgl_terbit,bu_sbu_kbli.id_klasifikasi,bu.Nama');
		$this->db->from('bu_nomor');
		$this->db->join('bu','bu.ID_BU=bu_nomor.ID_BU','left');
		$this->db->join('bu_sbu_kbli','bu_sbu_kbli.ID_BU=bu_nomor.ID_BU','left');
		$this->db->join('registrasi_ulang_persetujuan_thn3','registrasi_ulang_persetujuan_thn3.id_bu=bu_nomor.ID_BU AND registrasi_ulang_persetujuan_thn3.id_klasifikasi=bu_sbu_kbli.id_klasifikasi AND registrasi_ulang_persetujuan_thn3.id_asosiasi_bu=bu_sbu_kbli.ID_Asosiasi_BU','left');
		$this->db->join('registrasi_ulang_persetujuan_asopusat_thn3','registrasi_ulang_persetujuan_asopusat_thn3.id_bu=bu_nomor.ID_BU AND registrasi_ulang_persetujuan_asopusat_thn3.id_klasifikasi=bu_sbu_kbli.id_klasifikasi AND registrasi_ulang_persetujuan_asopusat_thn3.id_asosiasi_bu=bu_sbu_kbli.ID_Asosiasi_BU','left');
		$this->db->where('bu_sbu_kbli.ID_Asosiasi_BU',$asosiasi);
		$this->db->where('bu_nomor.id_Propinsi',$propinsi);
		$this->db->where('bu_nomor.BU_Nomor',$nomor_urut);
		$this->db->where('registrasi_ulang_persetujuan_thn3.id_klasifikasi IS NOT NULL');
		$this->db->where('registrasi_ulang_persetujuan_asopusat_thn3.id_klasifikasi IS NULL');
		$query = $this->db->get();
		return $query->result_array();
	}

	function pengajuan_reg_2($nomor_urut,$propinsi,$asosiasi){
		$this->db->select('bu_nomor.BU_Nomor,bu_nomor.ID_BU,bu_nomor.NPWP,bu_sbu_kbli.tgl_terbit,bu_sbu_kbli.id_klasifikasi,bu.Nama');
		$this->db->from('bu_nomor');
		$this->db->join('bu','bu.ID_BU=bu_nomor.ID_BU','left');
		$this->db->join('bu_sbu_kbli','bu_sbu_kbli.ID_BU=bu_nomor.ID_BU','left');
		$this->db->join('registrasi_ulang_persetujuan','registrasi_ulang_persetujuan.id_bu=bu_nomor.ID_BU AND registrasi_ulang_persetujuan.id_klasifikasi=bu_sbu_kbli.id_klasifikasi AND registrasi_ulang_persetujuan.id_asosiasi_bu=bu_sbu_kbli.ID_Asosiasi_BU','left');
		$this->db->where('bu_sbu_kbli.ID_Asosiasi_BU',$asosiasi);
		$this->db->where('bu_nomor.id_Propinsi',$propinsi);
		$this->db->where('bu_nomor.BU_Nomor',$nomor_urut);
		$this->db->where('registrasi_ulang_persetujuan.id_klasifikasi IS NULL');
		$query = $this->db->get();
		return $query->result_array();
	}

	function pengajuan_reg_3($nomor_urut,$propinsi,$asosiasi){
		$this->db->select('bu_nomor.BU_Nomor,bu_nomor.ID_BU,bu_nomor.NPWP,bu_sbu_kbli.tgl_terbit,bu_sbu_kbli.id_klasifikasi,bu.Nama');
		$this->db->from('bu_nomor');
		$this->db->join('bu','bu.ID_BU=bu_nomor.ID_BU','left');
		$this->db->join('bu_sbu_kbli','bu_sbu_kbli.ID_BU=bu_nomor.ID_BU','left');
		$this->db->join('registrasi_ulang_persetujuan_qrcode','registrasi_ulang_persetujuan_qrcode.id_bu=bu_nomor.ID_BU AND registrasi_ulang_persetujuan_qrcode.id_klasifikasi=bu_sbu_kbli.id_klasifikasi AND bu_sbu_kbli.ID_asosiasi_BU=registrasi_ulang_persetujuan_qrcode.id_asosiasi_bu','left');
		$this->db->join('registrasi_ulang_persetujuan_thn3','registrasi_ulang_persetujuan_thn3.id_bu=bu_nomor.ID_BU AND registrasi_ulang_persetujuan_thn3.id_klasifikasi=bu_sbu_kbli.id_klasifikasi AND AND bu_sbu_kbli.ID_asosiasi_BU=registrasi_ulang_persetujuan_thn3.id_asosiasi_bu','left');
		$this->db->where('bu_sbu_kbli.ID_Asosiasi_BU',$asosiasi);
		$this->db->where('bu_nomor.id_Propinsi',$propinsi);
		$this->db->where('bu_nomor.BU_Nomor',$nomor_urut);
		$this->db->where('registrasi_ulang_persetujuan_qrcode.id_klasifikasi IS NOT NULL');
		$this->db->where('registrasi_ulang_persetujuan_thn3.id_klasifikasi IS NULL');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_pembayaran($id_bu,$tgl,$asosiasi){
		$this->db->select('ID_GROUP,(Kode_Pembayaran+Tagihan_Pembayaran) AS Tagihan,Kode_Pembayaran,Bukti_Pembayaran');
		$this->db->from('bu_pds_group');
		$this->db->where('ID_BU',$id_bu);
		$this->db->where('ID_ASOSIASI',$asosiasi);
		$this->db->where('Tgl_Permohonan',$tgl);
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_klas($id_klas){

		$this->db->select('Kode_Kualifikasi');
		$this->db->from('bu_kualifikasi_sub_kbli');
		$this->db->where('ID_Kualifikasi_sub',$id_klas);
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_jenis($id_bu){
		$default2 = $this->load->database('default2', TRUE);
		$default2->select('ID_Jenis_BU_kbli,ID_Bentuk_BU');
		$default2->from('bu');
		$default2->where('id_bu',$id_bu);
		$query = $default2->get();
		return $query->result_array();
	}

	function get_bill($id_bu,$asosiasi,$tgl,$id_jenis,$id_asing){
		$default2 = $this->load->database('default2', TRUE);
		$default2->select('bu_registrasi_kbli.id_sub_klasifikasi_kbli,bu_registrasi_kbli.id_klasifikasi_kbli,bu_registrasi_kbli.kualifikasi_kbli,(profit_share_master.nilai_n+profit_share_master.nilai_p)*1000 AS Bill');
		$default2->from('bu_registrasi_kbli');
		$default2->join('profit_share_master','profit_share_master.id_kualifikasi=bu_registrasi_kbli.kualifikasi_kbli AND profit_share_master.id_permohonan=bu_registrasi_kbli.id_unit_sertifikasi','left');
		$default2->where('bu_registrasi_kbli.ID_BU',$id_bu);
		$default2->where('bu_registrasi_kbli.ID_Asosiasi_BU',$asosiasi);
		$default2->where('bu_registrasi_kbli.Tgl_permohonan',$tgl);
		$default2->where('profit_share_master.id_jenis',$id_jenis);
		$default2->where('profit_share_master.id_asing',$id_asing);
		$default2->where('profit_share_master.id_proses','2');

		$query = $default2->get();
		return $query->result_array();
	}

	function get_pembayaran_sub_s($id,$tgl,$aso){
	    //----mulai cari bentuk dan jenis-------
			$default2 = $this->load->database('default2', TRUE);
	    $default2->select('id_jenis_bu_kbli,id_bentuk_bu');
	    $default2->where('id_bu', $id);
	    $default2->limit(1);
	    $query = $default2->get('bu');
	    foreach ($query->result() as $row)
	    {
	        $id_jenis_bu_kbli = $row->id_jenis_bu_kbli;
	        $id_bentuk_bu = $row->id_bentuk_bu;
	    }
	    //----selesai cari bentuk dan jenis-----

	    $query = $default2->query("SELECT bb.id_sub_klasifikasi_kbli,bb.kualifikasi_kbli
			/*,(psm.nilai_n+psm.nilai_p)*1000*/
	    FROM
	    (
	    SELECT bb.id_sub_klasifikasi_kbli,bb.ID_BU,bb.Tgl_permohonan,bb.ID_Asosiasi_BU,bb.id_klasifikasi_kbli,bb.kualifikasi_kbli FROM bu_registrasi_kbli AS bb
	    WHERE bb.ID_BU='$id' and bb.Tgl_permohonan ='$tgl' and bb.ID_Asosiasi_BU='$aso'
	    LIMIT 1
	    ) AS bb
			LEFT JOIN
	    (
	    SELECT psm.nilai_n,psm.nilai_p,psm.id_kualifikasi,psm.id_permohonan FROM profit_share_master  AS psm WHERE psm.id_proses='2' AND psm.id_jenis='$id_jenis' AND psm.id_asing='$id_asing'
	    ) AS psm
	    ON bb.kualifikasi_kbli=psm.id_kualifikasi
	    ORDER BY bb.id_sub_klasifikasi_kbli ASC;");
	    return $query->result();
	}

	function cek_pjbu($id_bu){
		$default2 = $this->load->database('default2', TRUE);
		$default2->select('PJBU');
		$default2->from('bu_pengurus');
		$default2->where('id_bu',$id_bu);
		$default2->where('PJBU','1');
		$query = $default2->get();
		return $query->result_array();
	}

	function check_status($id_bu,$tgl,$asosiasi,$status){
		$this->db->select('id_status');
		$this->db->from('bu_registrasi_history_kbli');
		$this->db->where('ID_BU',$id_bu);
		$this->db->where('ID_Asosiasi_BU',$asosiasi);
		$this->db->where('tgl_permohonan',$tgl);
		$this->db->where('id_status',$status);
		$query = $this->db->get();
		return $query->result_array();
	}

	function check_kelayakan_bu($id_bu,$asosiasi,$tgl){
		$this->db->select('*');
		$this->db->from('asesor_nilai_kbli');
		$this->db->where('ID_BU',$id_bu);
		$this->db->where('id_asosiasi_BU',$asosiasi);
		$this->db->where('tgl_permohonan',$tgl);
		$query = $this->db->get();
		return $query->result_array();
	}

	function check_kelayakan_bu2($id_bu,$asosiasi,$tgl){
		$this->db->select('*');
		$this->db->from('asesor_nilai_kbli');
		$this->db->where('ID_BU',$id_bu);
		$this->db->where('id_asosiasi_BU',$asosiasi);
		$this->db->where('tgl_permohonan',$tgl);
		$query = $this->db->get();
		return $query->result_array();
	}

	function upload_neraca($id_bu,$tahun){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="REPLACE INTO $database.bu_keuangan_neraca (ID_BU,Tahun,KasBank,PiutangUsaha,Persediaan,PiutangPajak,BiayaDimuka,WIP,AktivaLancarLainnya,Peralatan,Inventaris,PeralatanLain,AkumulasiPenyusutan,Asset_tanah_bangunan,AktivaTetapLainnya,AktivaLain,UtangUsaha,UtangBank,UangMuka,UtangPajak,BiayaMasihDibayar,UtangJPJT,UtangLain,UtangBankJP,UtangLainJP,ModalDisetor,SelisihRevaluasi,LabaDitahan,modallain,Log,id_user,labaditahan_minus,persyaratan_20,persyaratan_21) SELECT ID_BU,Tahun,KasBank,PiutangUsaha,Persediaan,PiutangPajak,BiayaDimuka,WIP,AktivaLancarLainnya,Peralatan,Inventaris,PeralatanLain,AkumulasiPenyusutan,Asset_tanah_bangunan,AktivaTetapLainnya,AktivaLain,UtangUsaha,UtangBank,UangMuka,UtangPajak,BiayaMasihDibayar,UtangJPJT,UtangLain,UtangBankJP,UtangLainJP,ModalDisetor,SelisihRevaluasi,LabaDitahan,modallain,Log,id_user,labaditahan_minus,persyaratan_20,persyaratan_21 FROM $database2.bu_keuangan_neraca ";
		$where="WHERE ID_BU='$id_bu' AND Tahun IN ($tahun)";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function insert_status($select,$where){
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}
	function insert_status_sad($select,$where){
		$default2 = $this->load->database('default2', TRUE);
		$default2->query("$select $where");
		if ($default2->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function upload_klasifikasi_kualifikasi_replace($id_bu,$id_sub_klasifikasi){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="REPLACE INTO $database.bu_registrasi_kbli (ID_BU,id_klasifikasi,id_klasifikasi_kbli,id_sub_klasifikasi,id_sub_klasifikasi_kbli,ID_Asosiasi_BU,Kualifikasi,kualifikasi_kbli,No_BA_Asosiasi,id_unit_sertifikasi,Tahun,User_pemohon,Tgl_permohonan,Propinsi,hlmn_ke,no_blangko,Nilai_KD,Tahun_KD,persyaratan_1,persyaratan_2,persyaratan_3,persyaratan_4,persyaratan_5,persyaratan_12,persyaratan_10) SELECT ID_BU,id_klasifikasi,id_klasifikasi_kbli,id_sub_klasifikasi,id_sub_klasifikasi_kbli,ID_Asosiasi_BU,Kualifikasi,kualifikasi_kbli,No_BA_Asosiasi,id_unit_sertifikasi,Tahun,User_pemohon,Tgl_permohonan,Propinsi,hlmn_ke,no_blangko,Nilai_KD,Tahun_KD,persyaratan_1,persyaratan_2,persyaratan_3,persyaratan_4,persyaratan_5,persyaratan_12,persyaratan_10 FROM $database2.bu_registrasi_kbli";
		$where="WHERE ID_BU='$id_bu' AND id_sub_klasifikasi_kbli IN ($id_sub_klasifikasi)";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}
	function download_klasifikasi_kualifikasi_replace($id_bu,$id_sub_klasifikasi){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="REPLACE INTO $database2.bu_registrasi_kbli (ID_BU,id_klasifikasi,id_klasifikasi_kbli,id_sub_klasifikasi,id_sub_klasifikasi_kbli,ID_Asosiasi_BU,Kualifikasi,kualifikasi_kbli,No_BA_Asosiasi,id_unit_sertifikasi,Tahun,User_pemohon,Tgl_permohonan,Propinsi,hlmn_ke,no_blangko,Nilai_KD,Tahun_KD,persyaratan_1,persyaratan_2,persyaratan_3,persyaratan_4,persyaratan_5,persyaratan_12) SELECT ID_BU,id_klasifikasi,id_klasifikasi_kbli,id_sub_klasifikasi,id_sub_klasifikasi_kbli,ID_Asosiasi_BU,Kualifikasi,kualifikasi_kbli,No_BA_Asosiasi,id_unit_sertifikasi,Tahun,User_pemohon,Tgl_permohonan,Propinsi,hlmn_ke,no_blangko,Nilai_KD,Tahun_KD,persyaratan_1,persyaratan_2,persyaratan_3,persyaratan_4,persyaratan_5,persyaratan_12 FROM $database.bu_registrasi_kbli";
		$where="WHERE ID_BU='$id_bu' AND id_sub_klasifikasi_kbli IN ($id_sub_klasifikasi)";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}


	public function ta_tetap($id_bu,$sub_klasifikasi){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('personal_reg_ta_kbli.ID_Sub_Bidang,personal_reg_ta_kbli.ID_Kualifikasi,bu_tenaga_kerja_kbli.id_personal,bu_tenaga_kerja_kbli.id_sub_klasifikasi_pjsk1,bu_tenaga_kerja_kbli.id_sub_klasifikasi_pjsk2');
		$otherdb->from('bu_tenaga_kerja_kbli');
		$otherdb->join('personal_reg_ta_kbli','bu_tenaga_kerja_kbli.id_personal=personal_reg_ta_kbli.ID_Personal','left');
		$otherdb->where('bu_tenaga_kerja_kbli.ID_Bu',$id_bu);
		$otherdb->where('bu_tenaga_kerja_kbli.PJSK','1');
		$where="(bu_tenaga_kerja_kbli.id_sub_klasifikasi_pjsk1='$sub_klasifikasi' OR bu_tenaga_kerja_kbli.id_sub_klasifikasi_pjsk2='$sub_klasifikasi')";
		$otherdb->where($where);
		$otherdb->where('bu_tenaga_kerja_kbli.Tenaga_Kerja','AHLI');
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function pjk_ahli($id_bu,$klasifikasi){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('personal_reg_ta_kbli.ID_Sub_Bidang,personal_reg_ta_kbli.ID_Kualifikasi,bu_tenaga_kerja_kbli.id_personal,bu_tenaga_kerja_kbli.id_klasifikasi_pjk1,bu_tenaga_kerja_kbli.id_klasifikasi_pjk2,personal.Tenaga_Kerja');
		$otherdb->from('bu_tenaga_kerja_kbli');
		$otherdb->join('personal','bu_tenaga_kerja_kbli.id_personal=personal.id_personal','left');
		$otherdb->join('personal_reg_ta_kbli','bu_tenaga_kerja_kbli.id_personal=personal_reg_ta_kbli.ID_Personal','left');
		$otherdb->where('bu_tenaga_kerja_kbli.ID_Bu',$id_bu);
		$otherdb->where('bu_tenaga_kerja_kbli.PJK','1');
		$where="(bu_tenaga_kerja_kbli.id_klasifikasi_pjk1='$klasifikasi' OR bu_tenaga_kerja_kbli.id_klasifikasi_pjk2='$klasifikasi')";
		$otherdb->where($where);
		$otherdb->where('bu_tenaga_kerja_kbli.Tenaga_Kerja','AHLI');
		$query = $otherdb->get();
		return $query->result_array();
	}


	public function pjk_trampil($id_bu,$klasifikasi){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('personal_reg_tt.ID_Sub_Bidang,personal_reg_tt.ID_Kualifikasi,bu_tenaga_kerja_kbli.id_personal,bu_tenaga_kerja_kbli.id_klasifikasi_pjk1,bu_tenaga_kerja_kbli.id_klasifikasi_pjk2,personal.Tenaga_Kerja');
		$otherdb->from('bu_tenaga_kerja_kbli');
		$otherdb->join('personal','bu_tenaga_kerja_kbli.id_personal=personal.id_personal','left');
		$otherdb->join('personal_reg_tt','bu_tenaga_kerja_kbli.id_personal=personal_reg_tt.ID_Personal','left');
		$otherdb->where('bu_tenaga_kerja_kbli.ID_Bu',$id_bu);
		$otherdb->where('bu_tenaga_kerja_kbli.PJK','1');
		$where="(bu_tenaga_kerja_kbli.id_klasifikasi_pjk1='$klasifikasi' OR bu_tenaga_kerja_kbli.id_klasifikasi_pjk2='$klasifikasi')";
		$otherdb->where($where);
		$otherdb->where('bu_tenaga_kerja_kbli.Tenaga_Kerja','TRAMPIL');
		$query = $otherdb->get();
		return $query->result_array();
	}
	public function pjt_ahli($id_bu){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('personal_reg_ta_kbli.ID_Sub_Bidang,personal_reg_ta_kbli.ID_Kualifikasi,bu_tenaga_kerja_kbli.id_personal,personal.Tenaga_Kerja');
		$otherdb->from('bu_tenaga_kerja_kbli');
		$otherdb->join('personal','bu_tenaga_kerja_kbli.id_personal=personal.id_personal','left');
		$otherdb->join('personal_reg_ta_kbli','bu_tenaga_kerja_kbli.id_personal=personal_reg_ta_kbli.ID_Personal','left');
		$otherdb->where('bu_tenaga_kerja_kbli.ID_Bu',$id_bu);
		$otherdb->where('bu_tenaga_kerja_kbli.PJT','1');
		$otherdb->where('bu_tenaga_kerja_kbli.Tenaga_Kerja','AHLI');
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function pjt_ahli_tetap($id_bu){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('personal_reg_ta_kbli.ID_Sub_Bidang,personal_reg_ta_kbli.ID_Kualifikasi,bu_tenaga_kerja_kbli.id_personal,personal.Tenaga_Kerja');
		$otherdb->from('bu_tenaga_kerja_kbli');
		$otherdb->join('personal','bu_tenaga_kerja_kbli.id_personal=personal.id_personal','left');
		$otherdb->join('personal_reg_ta_kbli','bu_tenaga_kerja_kbli.id_personal=personal_reg_ta_kbli.ID_Personal','left');
		$otherdb->where('bu_tenaga_kerja_kbli.ID_Bu',$id_bu);
		//$otherdb->where('bu_tenaga_kerja_kbli.PJT','1');
		$otherdb->where('bu_tenaga_kerja_kbli.PJSK','1');
		$otherdb->where('bu_tenaga_kerja_kbli.Tenaga_Kerja','AHLI');
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function pjt_trampil($id_bu){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('personal_reg_tt.ID_Sub_Bidang,personal_reg_tt.ID_Kualifikasi,bu_tenaga_kerja_kbli.id_personal,personal.Tenaga_Kerja');
		$otherdb->from('bu_tenaga_kerja_kbli');
		$otherdb->join('personal','bu_tenaga_kerja_kbli.id_personal=personal.id_personal','left');
		$otherdb->join('personal_reg_tt','bu_tenaga_kerja_kbli.id_personal=personal_reg_tt.ID_Personal','left');
		$otherdb->where('bu_tenaga_kerja_kbli.ID_Bu',$id_bu);
		$otherdb->where('bu_tenaga_kerja_kbli.PJT','1');
		$otherdb->where('bu_tenaga_kerja_kbli.Tenaga_Kerja','TRAMPIL');
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function pjbu($id_bu){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('No_KTP');
		$otherdb->from('bu_pengurus');
		$otherdb->where('id_bu',$id_bu);
		$otherdb->where('PJBU','1');
		$query = $otherdb->get();
		return $query->result_array();
	}

	function update($select,$where){
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}
	function update_sad($select,$where){
		$default2 = $this->load->database('default2', TRUE);
		$default2->query("$select $where");
		if ($default2->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function read_mail($id_record){
		$this->db->set('Read', 1);
		$this->db->where('ID_RECORD',$id_record);
		$this->db->update('bu_pds_history');
	}
	function change_kunci_bu($id_bu,$sub_bidang,$nilai_kontrak,$value){
		$this->db->set('kunci', $value);
		$this->db->where('ID_BU',$id_bu);
		$this->db->where('ID_Sub_Klasifikasi_kbli',$sub_bidang);
		$this->db->where('Nilai_Kontrak',$nilai_kontrak);
		$this->db->update('bu_pengalaman_kbli');
	}
	function change_kunci_bu_sad($id_bu,$sub_bidang,$nilai_kontrak,$value){
		$default2 = $this->load->database('default2', TRUE);

		$default2->set('kunci', $value);
		$default2->where('ID_BU',$id_bu);
		$default2->where('ID_Sub_Klasifikasi_kbli',$sub_bidang);
		$default2->where('Nilai_Kontrak',$nilai_kontrak);
		$default2->update('bu_pengalaman_kbli');
	}
	function read_message($id_record){
		$this->db->set('Read', 1);
		$this->db->where('ID_RECORD',$id_record);
		$this->db->update('bu_pds_mail');
	}
	function update_edit($where,$table,$data){
		$this->db->set($data);
		$this->db->where($where);
		$this->db->update($table);
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}
	function update_edit_sad($where,$table,$data){
		$default2 = $this->load->database('default2', TRUE);
		$default2->set($data);
		$default2->where($where);
		$default2->update($table);
		if ($default2->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}
	function revisi($id_record){
		$this->db->set('Status', 1);
		$this->db->set('Tgl_Record', date("Y-m-d_h:i:sa"));
		$this->db->where('ID_RECORD',$id_record);
		$this->db->update('bu_pds_history');

	}

	function delete_message_bu($id_record){
		$select="UPDATE bu_pds_history SET Status=1";
		$where="WHERE ID_RECORD IN($id_record)";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function delete_message_bu2($id_record){
		$select="UPDATE bu_pds_mail SET Status=1";
		$where="WHERE ID_RECORD IN($id_record)";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function delete_message_ta($id_record){
		$select="UPDATE tk_pds_history SET Status=1";
		$where="WHERE ID_RECORD IN($id_record)";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	public function jumlah_message_dukcapil()
	{
			$propinsi=$this->session->userdata('id_propinsi');
			$id_asosiasi=$this->session->userdata('id_asosiasi');

			$this->db->select('bu.Nama,bu_pds_history.Read,bu_pds_deskripsi.Deskripsi as Deskripsi2,bu_pds_upload.Deskripsi,bu_pds_history.ID_RECORD,bu_pds_history.ID_BU,bu_pds_history.ID_PDS,bu_pds_history.ID_ASOSIASI,bu_pds_history.ID_UPLOAD,bu_pds_history.Id_User,bu_pds_history.Tgl_Record,bu_pds_history.Ket');
			$this->db->from('bu_pds_history');
			$this->db->join('bu_pds_upload','bu_pds_history.ID_UPLOAD=bu_pds_upload.ID_Upload','left');
			$this->db->join('bu_pds_deskripsi','bu_pds_history.ID_PDS=bu_pds_deskripsi.ID_PDS','left');
			$this->db->join('bu','bu_pds_history.ID_BU=bu.ID_BU','left');
			$this->db->join('bu_registrasi_kbli_hapus','bu_pds_history.ID_BU=bu_registrasi_kbli_hapus.ID_BU AND bu_pds_history.ID_ASOSIASI=bu_registrasi_kbli_hapus.ID_Asosiasi_BU','left');
			if($this->ion_auth->asosiasi_bu_propinsi()){
				$this->db->where('bu_pds_history.ID_ASOSIASI',$id_asosiasi);
				$this->db->where('bu_registrasi_kbli_hapus.Propinsi',$propinsi);
				$array=array('B','B2','B1');
				$this->db->where_not_in('bu_registrasi_kbli_hapus.kualifikasi_kbli',$array);
				$this->db->group_by('bu_pds_history.ID_RECORD');
			}elseif ($this->ion_auth->asosiasi_bu_pusat()) {
				$this->db->where('bu_pds_history.ID_ASOSIASI',$id_asosiasi);
				$array=array('B','B2','B1');
				$this->db->where_in('bu_registrasi_kbli_hapus.kualifikasi_kbli',$array);
				$this->db->group_by('bu_pds_history.ID_RECORD');
			}else{
				$this->db->where('bu_pds_history.ID_ASOSIASI',$id_asosiasi);
			}
			$this->db->where('bu_registrasi_kbli_hapus.id_ticket_hapus','999999');
			$this->db->where('bu_pds_history.Status',0);
			$this->db->order_by("bu_pds_history.ID_RECORD", "desc");
			$query = $this->db->get();
			return $query->result_array();
	}

	public function get_current_page_records_dukcapil($limit, $start)
	{
			$propinsi=$this->session->userdata('id_propinsi');
			$id_asosiasi=$this->session->userdata('id_asosiasi');
			$this->db->limit($limit, $start);
			$this->db->select('bu.Nama,bu_pds_history.Read,bu_pds_deskripsi.Deskripsi as Deskripsi2,bu_pds_upload.Deskripsi,bu_pds_history.ID_RECORD,bu_pds_history.ID_BU,bu_pds_history.ID_PDS,bu_pds_history.ID_ASOSIASI,bu_pds_history.ID_UPLOAD,bu_pds_history.Id_User,bu_pds_history.Tgl_Record,bu_pds_history.Ket');
			$this->db->from('bu_pds_history');
			$this->db->join('bu_pds_upload','bu_pds_history.ID_UPLOAD=bu_pds_upload.ID_Upload','left');
			$this->db->join('bu_pds_deskripsi','bu_pds_history.ID_PDS=bu_pds_deskripsi.ID_PDS','left');
			$this->db->join('bu','bu_pds_history.ID_BU=bu.ID_BU','left');
			$this->db->join('bu_registrasi_kbli_hapus','bu_pds_history.ID_BU=bu_registrasi_kbli_hapus.ID_BU AND bu_pds_history.ID_ASOSIASI=bu_registrasi_kbli_hapus.ID_Asosiasi_BU','left');
			if($this->ion_auth->asosiasi_bu_propinsi()){
				$this->db->where('bu_pds_history.ID_ASOSIASI',$id_asosiasi);
				$this->db->where('bu_registrasi_kbli_hapus.Propinsi',$propinsi);
				$array=array('B','B2','B1');
				$this->db->where_not_in('bu_registrasi_kbli_hapus.kualifikasi_kbli',$array);
				$this->db->group_by('bu_pds_history.ID_RECORD');
			}elseif ($this->ion_auth->asosiasi_bu_pusat()) {
				$this->db->where('bu_pds_history.ID_ASOSIASI',$id_asosiasi);
				$array=array('B','B2','B1');
				$this->db->where_in('bu_registrasi_kbli_hapus.kualifikasi_kbli',$array);
				$this->db->group_by('bu_pds_history.ID_RECORD');
			}else{
				$this->db->where('bu_pds_history.ID_ASOSIASI',$id_asosiasi);
			}
			$this->db->where('bu_registrasi_kbli_hapus.id_ticket_hapus','999999');
			$this->db->where('bu_pds_history.Status',0);
			$this->db->order_by("bu_pds_history.ID_RECORD", "desc");
			$query = $this->db->get();
			return $query->result_array();
	}

	public function get_current_page_records($limit, $start)
	{
			$propinsi=$this->session->userdata('id_propinsi');
			$id_asosiasi=$this->session->userdata('id_asosiasi');
			$this->db->limit($limit, $start);
			$this->db->select('bu.Nama,bu_pds_history.Read,bu_pds_deskripsi.Deskripsi as Deskripsi2,bu_pds_upload.Deskripsi,bu_pds_history.ID_RECORD,bu_pds_history.ID_BU,bu_pds_history.ID_PDS,bu_pds_history.ID_ASOSIASI,bu_pds_history.ID_UPLOAD,bu_pds_history.Id_User,bu_pds_history.Tgl_Record,bu_pds_history.Ket');
			$this->db->from('bu_pds_history');
			$this->db->join('bu_pds_upload','bu_pds_history.ID_UPLOAD=bu_pds_upload.ID_Upload','left');
			$this->db->join('bu_pds_deskripsi','bu_pds_history.ID_PDS=bu_pds_deskripsi.ID_PDS','left');
			$this->db->join('bu','bu_pds_history.ID_BU=bu.ID_BU','left');
			$this->db->join('bu_registrasi_kbli','bu_pds_history.ID_BU=bu_registrasi_kbli.ID_BU AND bu_pds_history.ID_ASOSIASI=bu_registrasi_kbli.ID_Asosiasi_BU','left');

			$this->db->where('bu_pds_history.Status',0);
			$this->db->order_by("bu_pds_history.ID_RECORD", "desc");
			$query = $this->db->get();
			return $query->result_array();
	}

	public function get_current_page_records_hapus($limit, $start)
	{
			$this->db->limit($limit, $start);
			$this->db->select('bu_pds_history.Read,bu_pds_deskripsi.Deskripsi as Deskripsi2,bu_pds_upload.Deskripsi,bu_pds_history.ID_RECORD,bu_pds_history.ID_BU,bu_pds_history.ID_PDS,bu_pds_history.ID_ASOSIASI,bu_pds_history.ID_UPLOAD,bu_pds_history.Id_User,bu_pds_history.Tgl_Record,bu_pds_history.Ket');
			$this->db->from('bu_pds_history');
			$this->db->join('bu_pds_upload','bu_pds_history.ID_UPLOAD=bu_pds_upload.ID_Upload','left');
			$this->db->join('bu_pds_deskripsi','bu_pds_history.ID_PDS=bu_pds_deskripsi.ID_PDS','left');
			$this->db->where('bu_pds_history.Status',1);
			$this->db->order_by("bu_pds_history.ID_RECORD", "desc");
			$query = $this->db->get();
			return $query->result_array();
	}



	public function get_total()
	{
			$this->db->where('Status',0);
			return $this->db->count_all("bu_pds_history");
	}



	function get_mail($id_record){
		$this->db->select('bu_pds_history.Option1,bu_pds_history.Option2,bu.Nama,bu_pds_history.Read,bu_pds_deskripsi.Deskripsi as Deskripsi2,bu_pds_upload.Deskripsi,bu_pds_history.ID_RECORD,bu_pds_history.ID_BU,bu_pds_history.ID_PDS,bu_pds_history.ID_ASOSIASI,bu_pds_history.ID_UPLOAD,bu_pds_history.Id_User,bu_pds_history.Tgl_Record,bu_pds_history.Ket');
		$this->db->from('bu_pds_history');
		$this->db->join('bu','bu.ID_BU=bu_pds_history.ID_BU','left');
		$this->db->join('bu_pds_upload','bu_pds_history.ID_UPLOAD=bu_pds_upload.ID_Upload','left');
		$this->db->join('bu_pds_deskripsi','bu_pds_history.ID_PDS=bu_pds_deskripsi.ID_PDS','left');
		$this->db->where('bu_pds_history.ID_RECORD',$id_record);
		$query = $this->db->get();
		return $query->result_array();
	}

	function upload_administrasi($id_bu){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="INSERT IGNORE INTO $database.bu (ID_BU,ID_Propinsi,Nama,Alamat,Kodepos,Telepon,Fax,Email,Website,NPWP,id_bentuk_usaha,ID_Bentuk_BU,ID_Jenis_BU,ID_Jenis_BU_kbli,NO_SPT,thn_spt,ID_Kabupaten,tgl_update,Username,Status_Submit,Log,ID_Negara,persyaratan_9,persyaratan_11,persyaratan_13,persyaratan_37,persyaratan_39,persyaratan_50,persyaratan_51,persyaratan_52) SELECT ID_BU,ID_Propinsi,Nama,Alamat,Kodepos,Telepon,Fax,Email,Website,NPWP,id_bentuk_usaha,ID_Bentuk_BU,ID_Jenis_BU,ID_Jenis_BU_kbli,NO_SPT,thn_spt,ID_Kabupaten,tgl_update,Username,Status_Submit,Log,ID_Negara,persyaratan_9,persyaratan_11,persyaratan_13,persyaratan_37,persyaratan_39,persyaratan_50,persyaratan_51,persyaratan_52 FROM $database2.bu";
		$where="WHERE ID_BU='$id_bu'";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function upload_administrasi_replace($id_bu){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="REPLACE INTO $database.bu (ID_BU,ID_Propinsi,Nama,Alamat,Kodepos,Telepon,Fax,Email,Website,NPWP,id_bentuk_usaha,ID_Bentuk_BU,ID_Jenis_BU,ID_Jenis_BU_kbli,NO_SPT,thn_spt,ID_Kabupaten,tgl_update,Username,Status_Submit,Log,ID_Negara,persyaratan_9,persyaratan_11,persyaratan_13,persyaratan_37,persyaratan_39,persyaratan_50,persyaratan_51,persyaratan_52) SELECT ID_BU,ID_Propinsi,Nama,Alamat,Kodepos,Telepon,Fax,Email,Website,NPWP,id_bentuk_usaha,ID_Bentuk_BU,ID_Jenis_BU,ID_Jenis_BU_kbli,NO_SPT,thn_spt,ID_Kabupaten,tgl_update,Username,Status_Submit,Log,ID_Negara,persyaratan_9,persyaratan_11,persyaratan_13,persyaratan_37,persyaratan_39,persyaratan_50,persyaratan_51,persyaratan_52 FROM $database2.bu";
		$where="WHERE ID_BU='$id_bu'";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function download_administrasi_replace($id_bu){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="REPLACE INTO $database2.bu (ID_BU,ID_Propinsi,Nama,Alamat,Kodepos,Telepon,Fax,Email,Website,NPWP,id_bentuk_usaha,ID_Bentuk_BU,ID_Jenis_BU,ID_Jenis_BU_kbli,NO_SPT,thn_spt,ID_Kabupaten,tgl_update,Username,Status_Submit,Log,ID_Negara,persyaratan_9,persyaratan_11,persyaratan_13,persyaratan_37,persyaratan_39,persyaratan_50,persyaratan_51,persyaratan_52) SELECT ID_BU,ID_Propinsi,Nama,Alamat,Kodepos,Telepon,Fax,Email,Website,NPWP,id_bentuk_usaha,ID_Bentuk_BU,ID_Jenis_BU,ID_Jenis_BU_kbli,NO_SPT,thn_spt,ID_Kabupaten,tgl_update,Username,Status_Submit,Log,ID_Negara,persyaratan_9,persyaratan_11,persyaratan_13,persyaratan_37,persyaratan_39,persyaratan_50,persyaratan_51,persyaratan_52 FROM $database.bu";
		$where="WHERE ID_BU='$id_bu'";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function download_administrasi($id_bu){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="INSERT IGNORE INTO $database2.bu (ID_BU,ID_Propinsi,Nama,Alamat,Kodepos,Telepon,Fax,Email,Website,NPWP,id_bentuk_usaha,ID_Bentuk_BU,ID_Jenis_BU,ID_Jenis_BU_kbli,NO_SPT,thn_spt,ID_Kabupaten,tgl_update,Username,Status_Submit,Log,persyaratan_9,persyaratan_10,persyaratan_11,persyaratan_13,persyaratan_37,persyaratan_39) SELECT ID_BU,ID_Propinsi,Nama,Alamat,Kodepos,Telepon,Fax,Email,Website,NPWP,id_bentuk_usaha,ID_Bentuk_BU,ID_Jenis_BU,ID_Jenis_BU_kbli,NO_SPT,thn_spt,ID_Kabupaten,tgl_update,Username,Status_Submit,Log,persyaratan_9,persyaratan_10,persyaratan_11,persyaratan_13,persyaratan_37,persyaratan_39 FROM $database.bu";
		$where="WHERE ID_BU='$id_bu'";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function upload_pengalaman($id_bu,$nomor_kontrak){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="REPLACE INTO $database.bu_pengalaman_kbli (ID_BU,Nomor_Kontrak,Nama_Paket,ID_Klasifikasi,ID_Sub_Klasifikasi,ID_Klasifikasi_kbli,ID_Sub_Klasifikasi_kbli,Nilai_Kontrak,id_status_kontrak,Nomor_BA_Serah_Terima,Tgl_BA_Serah_Terima,Tgl_Kontrak,Tgl_Mulai,Tgl_Selesai,Tahun,Pemberi_Tugas,ID_Propinsi,ID_Asosiasi_BU,ID_Sumber_Dana,Log,id_user,status_upload,kunci,persyaratan_32,persyaratan_34,persyaratan_35,persyaratan_36) SELECT ID_BU,Nomor_Kontrak,Nama_Paket,ID_Klasifikasi,ID_Sub_Klasifikasi,ID_Klasifikasi_kbli,ID_Sub_Klasifikasi_kbli,Nilai_Kontrak,id_status_kontrak,Nomor_BA_Serah_Terima,Tgl_BA_Serah_Terima,Tgl_Kontrak,Tgl_Mulai,Tgl_Selesai,Tahun,Pemberi_Tugas,ID_Propinsi,ID_Asosiasi_BU,ID_Sumber_Dana,Log,id_user,status_upload,kunci,persyaratan_32,persyaratan_34,persyaratan_35,persyaratan_36 FROM $database2.bu_pengalaman_kbli";
		$where="WHERE ID_BU='$id_bu' AND Nomor_Kontrak IN ($nomor_kontrak)";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function download_pengalaman($id_bu,$nomor_kontrak){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="REPLACE INTO $database2.bu_pengalaman_kbli (ID_BU,Nomor_Kontrak,Nama_Paket,ID_Klasifikasi,ID_Sub_Klasifikasi,ID_Klasifikasi_kbli,ID_Sub_Klasifikasi_kbli,Nilai_Kontrak,id_status_kontrak,Nomor_BA_Serah_Terima,Tgl_BA_Serah_Terima,Tgl_Kontrak,Tgl_Mulai,Tgl_Selesai,Tahun,Pemberi_Tugas,ID_Propinsi,ID_Asosiasi_BU,ID_Sumber_Dana,Log,id_user,status_upload,kunci,persyaratan_32,persyaratan_34,persyaratan_35,persyaratan_36) SELECT ID_BU,Nomor_Kontrak,Nama_Paket,ID_Klasifikasi,ID_Sub_Klasifikasi,ID_Klasifikasi_kbli,ID_Sub_Klasifikasi_kbli,Nilai_Kontrak,id_status_kontrak,Nomor_BA_Serah_Terima,Tgl_BA_Serah_Terima,Tgl_Kontrak,Tgl_Mulai,Tgl_Selesai,Tahun,Pemberi_Tugas,ID_Propinsi,ID_Asosiasi_BU,ID_Sumber_Dana,Log,id_user,status_upload,kunci,persyaratan_32,persyaratan_34,persyaratan_35,persyaratan_36 FROM $database.bu_pengalaman_kbli";
		$where="WHERE ID_BU='$id_bu' AND Nomor_Kontrak IN ($nomor_kontrak)";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function upload_pengurus($id_bu){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="INSERT IGNORE INTO $database.bu_pengurus (id_pengurus,No_KTP,id_bu,Nama,Alamat,Kodepos,id_jenjang,no_ijazah,id_jabatan,Jabatan_BU,PJBU,ID_Kabupaten_Alamat,Tgl_Lahir,Tempat_Lahir,ID_Propinsi,username,tgl_update,Log,npwp,persyaratan_14,persyaratan_15,persyaratan_16,persyaratan_17,persyaratan_18,persyaratan_53) SELECT id_pengurus,No_KTP,id_bu,Nama,Alamat,Kodepos,id_jenjang,no_ijazah,id_jabatan,Jabatan_BU,PJBU,ID_Kabupaten_Alamat,Tgl_Lahir,Tempat_Lahir,ID_Propinsi,username,tgl_update,Log,npwp,persyaratan_14,persyaratan_15,persyaratan_16,persyaratan_17,persyaratan_18,persyaratan_53 FROM $database2.bu_pengurus";
		$where="WHERE id_bu='$id_bu'";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}
	function upload_pengurus_replace($id_bu,$id_pengurus){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="REPLACE INTO $database.bu_pengurus (id_pengurus,No_KTP,id_bu,Nama,Alamat,Kodepos,id_jenjang,no_ijazah,id_jabatan,Jabatan_BU,PJBU,ID_Kabupaten_Alamat,Tgl_Lahir,Tempat_Lahir,ID_Propinsi,username,tgl_update,Log,npwp,persyaratan_14,persyaratan_15,persyaratan_16,persyaratan_17,persyaratan_18,persyaratan_53) SELECT id_pengurus,No_KTP,id_bu,Nama,Alamat,Kodepos,id_jenjang,no_ijazah,id_jabatan,Jabatan_BU,PJBU,ID_Kabupaten_Alamat,Tgl_Lahir,Tempat_Lahir,ID_Propinsi,username,tgl_update,Log,npwp,persyaratan_14,persyaratan_15,persyaratan_16,persyaratan_17,persyaratan_18,persyaratan_53 FROM $database2.bu_pengurus";
		$where="WHERE id_bu='$id_bu' AND id_pengurus IN ($id_pengurus)";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function download_pengurus_replace($id_bu,$id_pengurus){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="REPLACE INTO $database2.bu_pengurus (id_pengurus,No_KTP,id_bu,Nama,Alamat,Kodepos,id_jenjang,no_ijazah,id_jabatan,Jabatan_BU,PJBU,ID_Kabupaten_Alamat,Tgl_Lahir,Tempat_Lahir,ID_Propinsi,username,tgl_update,Log,npwp,persyaratan_14,persyaratan_15,persyaratan_16,persyaratan_17,persyaratan_18,persyaratan_53) SELECT id_pengurus,No_KTP,id_bu,Nama,Alamat,Kodepos,id_jenjang,no_ijazah,id_jabatan,Jabatan_BU,PJBU,ID_Kabupaten_Alamat,Tgl_Lahir,Tempat_Lahir,ID_Propinsi,username,tgl_update,Log,npwp,persyaratan_14,persyaratan_15,persyaratan_16,persyaratan_17,persyaratan_18,persyaratan_53 FROM $database1.bu_pengurus";
		$where="WHERE id_bu='$id_bu' AND id_pengurus IN ($id_pengurus)";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function upload_akte_pendirian($id_bu){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="REPLACE INTO $database.bu_akte_pendirian (ID_BU,No_Akte_Pendirian,Nama_Notaris,Alamat,Tgl_Akte_Pendirian,nama_pengurus,id_jabatan,Kabupaten_Akte_Pendirian,Propinsi_Akte_Pendirian,No_Pengesahan_Menteri,Tgl_Pengesahan_Menteri,No_Pengesahan_PN,Tgl_Pengesahan_PN,No_Pengesahan_LN,Tgl_Pengesahan_LN,Log,persyaratan) SELECT ID_BU,No_Akte_Pendirian,Nama_Notaris,Alamat,Tgl_Akte_Pendirian,nama_pengurus,id_jabatan,Kabupaten_Akte_Pendirian,Propinsi_Akte_Pendirian,No_Pengesahan_Menteri,Tgl_Pengesahan_Menteri,No_Pengesahan_PN,Tgl_Pengesahan_PN,No_Pengesahan_LN,Tgl_Pengesahan_LN,Log,persyaratan FROM $database2.bu_akte_pendirian";
		$where="WHERE ID_BU='$id_bu'";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function download_akte_pendirian($id_bu){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="REPLACE INTO $database2.bu_akte_pendirian (ID_BU,No_Akte_Pendirian,Nama_Notaris,Alamat,Tgl_Akte_Pendirian,nama_pengurus,id_jabatan,Kabupaten_Akte_Pendirian,Propinsi_Akte_Pendirian,No_Pengesahan_Menteri,Tgl_Pengesahan_Menteri,No_Pengesahan_PN,Tgl_Pengesahan_PN,No_Pengesahan_LN,Tgl_Pengesahan_LN,Log,persyaratan) SELECT ID_BU,No_Akte_Pendirian,Nama_Notaris,Alamat,Tgl_Akte_Pendirian,nama_pengurus,id_jabatan,Kabupaten_Akte_Pendirian,Propinsi_Akte_Pendirian,No_Pengesahan_Menteri,Tgl_Pengesahan_Menteri,No_Pengesahan_PN,Tgl_Pengesahan_PN,No_Pengesahan_LN,Tgl_Pengesahan_LN,Log,persyaratan FROM $database.bu_akte_pendirian";
		$where="WHERE ID_BU='$id_bu'";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function upload_akte_perubahan($id_bu){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="REPLACE INTO $database.bu_akte_perubahan (ID_BU,Tanggal,Nomer,Nama_Notaris,Alamat,nama_pengurus,id_jabatan,Kabupaten,propinsi,No_Pengesahan_Menteri,Tgl_Pengesahan_Menteri,No_Pengesahan_PN,Tgl_Pengesahan_PN,No_Pengesahan_LN,Tgl_Pengesahan_LN,Log,persyaratan) SELECT ID_BU,Tanggal,Nomer,Nama_Notaris,Alamat,nama_pengurus,id_jabatan,Kabupaten,propinsi,No_Pengesahan_Menteri,Tgl_Pengesahan_Menteri,No_Pengesahan_PN,Tgl_Pengesahan_PN,No_Pengesahan_LN,Tgl_Pengesahan_LN,Log,persyaratan FROM $database2.bu_akte_perubahan";
		$where="WHERE ID_BU='$id_bu'";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function download_akte_perubahan($id_bu){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="REPLACE INTO $database2.bu_akte_perubahan (ID_BU,Tanggal,Nomer,Nama_Notaris,Alamat,nama_pengurus,id_jabatan,Kabupaten,propinsi,No_Pengesahan_Menteri,Tgl_Pengesahan_Menteri,No_Pengesahan_PN,Tgl_Pengesahan_PN,No_Pengesahan_LN,Tgl_Pengesahan_LN,Log,persyaratan) SELECT ID_BU,Tanggal,Nomer,Nama_Notaris,Alamat,nama_pengurus,id_jabatan,Kabupaten,propinsi,No_Pengesahan_Menteri,Tgl_Pengesahan_Menteri,No_Pengesahan_PN,Tgl_Pengesahan_PN,No_Pengesahan_LN,Tgl_Pengesahan_LN,Log,persyaratan FROM $database.bu_akte_perubahan";
		$where="WHERE ID_BU='$id_bu'";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function upload_pph_omset($id_bu){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="REPLACE INTO $database.bu_keuangan_pendapatan(ID_BU,Tahun_SPT1,Tahun_SPT2,SPT1,SPT2,Tahun_Omset1,Tahun_Omset2,Tahun_Omset3,Tahun_Omset4,Tahun_Omset5,Omset1,Omset2,Omset3,Omset4,Omset5,Log,id_user,persyaratan) SELECT ID_BU,Tahun_SPT1,Tahun_SPT2,SPT1,SPT2,Tahun_Omset1,Tahun_Omset2,Tahun_Omset3,Tahun_Omset4,Tahun_Omset5,Omset1,Omset2,Omset3,Omset4,Omset5,Log,id_user,persyaratan FROM $database2.bu_keuangan_pendapatan";
		$where="WHERE ID_BU='$id_bu'";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function download_pph_omset($id_bu){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="REPLACE INTO $database2.bu_keuangan_pendapatan(ID_BU,Tahun_SPT1,Tahun_SPT2,SPT1,SPT2,Tahun_Omset1,Tahun_Omset2,Tahun_Omset3,Tahun_Omset4,Tahun_Omset5,Omset1,Omset2,Omset3,Omset4,Omset5,Log,id_user,persyaratan) SELECT ID_BU,Tahun_SPT1,Tahun_SPT2,SPT1,SPT2,Tahun_Omset1,Tahun_Omset2,Tahun_Omset3,Tahun_Omset4,Tahun_Omset5,Omset1,Omset2,Omset3,Omset4,Omset5,Log,id_user,persyaratan FROM $database.bu_keuangan_pendapatan";
		$where="WHERE ID_BU='$id_bu'";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function upload_pemegang_saham($id_bu){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="INSERT IGNORE INTO $database.bu_keuangan_saham(ID_Pemilik_Saham,ID_BU,nama_pemilik,no_ktp,alamat,id_propinsi,id_kabupaten,kd_pos,jenis_saham,Jumlah_Lembar,Nilai_Per_Lembar,Modal_Dasar,Modal_Disetor,Log,id_user,persyaratan) SELECT ID_Pemilik_Saham,ID_BU,nama_pemilik,no_ktp,alamat,id_propinsi,id_kabupaten,kd_pos,jenis_saham,Jumlah_Lembar,Nilai_Per_Lembar,Modal_Dasar,Modal_Disetor,Log,id_user,persyaratan FROM $database2.bu_keuangan_saham";
		$where="WHERE ID_BU='$id_bu'";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}
	function upload_pemegang_saham_replace($id_bu){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="REPLACE INTO $database.bu_keuangan_saham(ID_Pemilik_Saham,ID_BU,nama_pemilik,no_ktp,alamat,id_propinsi,id_kabupaten,kd_pos,jenis_saham,Jumlah_Lembar,Nilai_Per_Lembar,Modal_Dasar,Modal_Disetor,Log,id_user,persyaratan) SELECT ID_Pemilik_Saham,ID_BU,nama_pemilik,no_ktp,alamat,id_propinsi,id_kabupaten,kd_pos,jenis_saham,Jumlah_Lembar,Nilai_Per_Lembar,Modal_Dasar,Modal_Disetor,Log,id_user,persyaratan FROM $database2.bu_keuangan_saham";
		$where="WHERE ID_BU='$id_bu'";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function download_pemegang_saham_replace($id_bu){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="REPLACE INTO $database2.bu_keuangan_saham(ID_Pemilik_Saham,ID_BU,nama_pemilik,no_ktp,alamat,id_propinsi,id_kabupaten,kd_pos,jenis_saham,Jumlah_Lembar,Nilai_Per_Lembar,Modal_Dasar,Modal_Disetor,Log,id_user,persyaratan) SELECT ID_Pemilik_Saham,ID_BU,nama_pemilik,no_ktp,alamat,id_propinsi,id_kabupaten,kd_pos,jenis_saham,Jumlah_Lembar,Nilai_Per_Lembar,Modal_Dasar,Modal_Disetor,Log,id_user,persyaratan FROM $database.bu_keuangan_saham";
		$where="WHERE ID_BU='$id_bu'";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function upload_tenaga_kerja($id_bu,$noreg){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="INSERT IGNORE INTO $database.bu_tenaga_kerja_kbli(id_personal,ID_Bu,nama,tgl_lahir,no_ktp,alamat,kodepos,Pend_Akhir,no_ijazah,ID_Sub_Bidang_Klasifikasi,ID_Sub_Sub_Bidang_Klasifikasi,ID_Bidang_Klasifikasi,id_kualifikasi,PJT,PJK,PJSK,Tenaga_Kerja,Noreg,Thn_Lulus,id_klasifikasi_pjk1,id_klasifikasi_pjk2,id_sub_klasifikasi_pjsk1,id_sub_klasifikasi_pjsk2,Row,persyaratan_23,persyaratan_24,persyaratan_25,persyaratan_26,persyaratan_27) SELECT id_personal,ID_Bu,nama,tgl_lahir,no_ktp,alamat,kodepos,Pend_Akhir,no_ijazah,ID_Sub_Bidang_Klasifikasi,ID_Sub_Sub_Bidang_Klasifikasi,ID_Bidang_Klasifikasi,id_kualifikasi,PJT,PJK,PJSK,Tenaga_Kerja,Noreg,Thn_Lulus,id_klasifikasi_pjk1,id_klasifikasi_pjk2,id_sub_klasifikasi_pjsk1,id_sub_klasifikasi_pjsk2,Row,persyaratan_23,persyaratan_24,persyaratan_25,persyaratan_26,persyaratan_27 FROM $database2.bu_tenaga_kerja_kbli";
		$where="WHERE ID_Bu='$id_bu' AND Noreg IN ($noreg)";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function upload_tenaga_kerja_replace($id_bu,$noreg){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="REPLACE INTO $database.bu_tenaga_kerja_kbli(id_personal,ID_Bu,nama,tgl_lahir,no_ktp,alamat,kodepos,Pend_Akhir,no_ijazah,ID_Sub_Bidang_Klasifikasi,ID_Sub_Sub_Bidang_Klasifikasi,ID_Bidang_Klasifikasi,id_kualifikasi,PJT,PJK,PJSK,Tenaga_Kerja,Noreg,Thn_Lulus,id_klasifikasi_pjk1,id_klasifikasi_pjk2,id_sub_klasifikasi_pjsk1,id_sub_klasifikasi_pjsk2,Row,persyaratan_23,persyaratan_24,persyaratan_25,persyaratan_26,persyaratan_27) SELECT id_personal,ID_Bu,nama,tgl_lahir,no_ktp,alamat,kodepos,Pend_Akhir,no_ijazah,ID_Sub_Bidang_Klasifikasi,ID_Sub_Sub_Bidang_Klasifikasi,ID_Bidang_Klasifikasi,id_kualifikasi,PJT,PJK,PJSK,Tenaga_Kerja,Noreg,Thn_Lulus,id_klasifikasi_pjk1,id_klasifikasi_pjk2,id_sub_klasifikasi_pjsk1,id_sub_klasifikasi_pjsk2,Row,persyaratan_23,persyaratan_24,persyaratan_25,persyaratan_26,persyaratan_27 FROM $database2.bu_tenaga_kerja_kbli";
		$where="WHERE ID_Bu='$id_bu' AND Noreg IN ($noreg)";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function download_tenaga_kerja_replace($id_bu,$noreg){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="REPLACE INTO $database2.bu_tenaga_kerja_kbli(id_personal,ID_Bu,nama,tgl_lahir,no_ktp,alamat,kodepos,Pend_Akhir,no_ijazah,ID_Sub_Bidang_Klasifikasi,ID_Sub_Sub_Bidang_Klasifikasi,ID_Bidang_Klasifikasi,id_kualifikasi,PJT,PJK,PJSK,Tenaga_Kerja,Noreg,Thn_Lulus,id_klasifikasi_pjk1,id_klasifikasi_pjk2,id_sub_klasifikasi_pjsk1,id_sub_klasifikasi_pjsk2,Row,persyaratan_23,persyaratan_24,persyaratan_25,persyaratan_26,persyaratan_27) SELECT id_personal,ID_Bu,nama,tgl_lahir,no_ktp,alamat,kodepos,Pend_Akhir,no_ijazah,ID_Sub_Bidang_Klasifikasi,ID_Sub_Sub_Bidang_Klasifikasi,ID_Bidang_Klasifikasi,id_kualifikasi,PJT,PJK,PJSK,Tenaga_Kerja,Noreg,Thn_Lulus,id_klasifikasi_pjk1,id_klasifikasi_pjk2,id_sub_klasifikasi_pjsk1,id_sub_klasifikasi_pjsk2,Row,persyaratan_23,persyaratan_24,persyaratan_25,persyaratan_26,persyaratan_27 FROM $database.bu_tenaga_kerja_kbli";
		$where="WHERE ID_Bu='$id_bu' AND Noreg IN ($noreg)";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}


	function inserts($select,$where){
		$this->db->query("$select $where");
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}
	function inserts_sad($select,$where){
	$otherdb = $this->load->database('default2', TRUE);
	$otherdb->query("$select $where");
	$otherdb->trans_complete();
	if ($otherdb->trans_status() === FALSE) {
		return "Failed";
	} else {
		return "Success";
	}
}


	function report_bu_administrasi($id_bu,$asosiasi,$tgl_permohonan){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('bu_asosiasi.Nama as nama_asosiasi,bu_registrasi_kbli.Tgl_permohonan,bu.ID_BU,propinsi.Nama as ID_Propinsi,bu.Nama,bu.Alamat,bu.Kodepos,bu.Telepon,bu.Fax,bu.Email,bu.Website,bu.NPWP,kabupaten.Nama as ID_Kabupaten');
		$otherdb->join('propinsi','bu.ID_Propinsi=propinsi.ID_Propinsi','left');
		$otherdb->join('kabupaten','bu.ID_Kabupaten=kabupaten.ID_Kabupaten','left');
		$otherdb->join('bu_registrasi_kbli','bu.ID_BU=bu_registrasi_kbli.ID_BU','left');
		$otherdb->join('bu_asosiasi','bu_asosiasi.ID_Asosiasi_BU=bu_registrasi_kbli.ID_Asosiasi_BU','left');
		$otherdb->from('bu');
		$otherdb->WHERE('bu.ID_BU',$id_bu);
		$otherdb->WHERE('bu_registrasi_kbli.ID_Asosiasi_BU',$asosiasi);
		$otherdb->WHERE('bu_registrasi_kbli.Tgl_permohonan',$tgl_permohonan);
		$query = $otherdb->get();
		return $query->result_array();
	}

	function report_bu_administrasi_aso($id_bu,$asosiasi){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('bu_asosiasi.Nama as nama_asosiasi,bu_registrasi_kbli.Tgl_permohonan,bu.ID_BU,propinsi.Nama as ID_Propinsi,bu.Nama,bu.Alamat,bu.Kodepos,bu.Telepon,bu.Fax,bu.Email,bu.Website,bu.NPWP,kabupaten.Nama as ID_Kabupaten');
		$otherdb->join('propinsi','bu.ID_Propinsi=propinsi.ID_Propinsi','left');
		$otherdb->join('kabupaten','bu.ID_Kabupaten=kabupaten.ID_Kabupaten','left');
		$otherdb->join('bu_registrasi_kbli','bu.ID_BU=bu_registrasi_kbli.ID_BU','left');
		$otherdb->join('bu_asosiasi','bu_asosiasi.ID_Asosiasi_BU=bu_registrasi_kbli.ID_Asosiasi_BU','left');
		$otherdb->from('bu');
		$otherdb->WHERE('bu.ID_BU',$id_bu);
		$otherdb->WHERE('bu_registrasi_kbli.ID_Asosiasi_BU',$asosiasi);
		$query = $otherdb->get();
		return $query->result_array();
	}

	function report_bu_administrasi_2($id_bu){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('bu_asosiasi.Nama as nama_asosiasi,bu_registrasi_kbli.Tgl_permohonan,bu.ID_BU,propinsi.Nama as ID_Propinsi,bu.Nama,bu.Alamat,bu.Kodepos,bu.Telepon,bu.Fax,bu.Email,bu.Website,bu.NPWP,kabupaten.Nama as ID_Kabupaten');
		$otherdb->join('propinsi','bu.ID_Propinsi=propinsi.ID_Propinsi','left');
		$otherdb->join('kabupaten','bu.ID_Kabupaten=kabupaten.ID_Kabupaten','left');
		$otherdb->join('bu_registrasi_kbli','bu.ID_BU=bu_registrasi_kbli.ID_BU','left');
		$otherdb->join('bu_asosiasi','bu_asosiasi.ID_Asosiasi_BU=bu_registrasi_kbli.ID_Asosiasi_BU','left');
		$otherdb->from('bu');
		$otherdb->WHERE('bu.ID_BU',$id_bu);
		$query = $otherdb->get();
		return $query->result_array();
	}

	function report_bu_pengalaman($id_bu){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('bu_klasifikasi_sub_kbli.Deskripsi as Nama_Sub_Klasifikasi,bu_klasifikasi_kbli.Deskripsi as Nama_Klasifikasi,bu_pengalaman_kbli.Nomor_Kontrak,bu_pengalaman_kbli.Nama_Paket,bu_pengalaman_kbli.Nilai_Kontrak,bu_pengalaman_kbli.Tgl_Mulai,bu_pengalaman_kbli.Tgl_Selesai,bu_pengalaman_kbli.Nomor_BA_Serah_Terima,bu_pengalaman_kbli.ID_Sub_Klasifikasi_kbli');
		$otherdb->from('bu_pengalaman_kbli');
		$otherdb->join('bu_klasifikasi_kbli','bu_klasifikasi_kbli.ID_Klasifikasi=bu_pengalaman_kbli.ID_Klasifikasi_kbli','left');
		$otherdb->join('bu_klasifikasi_sub_kbli','bu_klasifikasi_sub_kbli.id_sub_klasifikasi=bu_pengalaman_kbli.ID_Sub_Klasifikasi_kbli','left');

		$otherdb->WHERE('bu_pengalaman_kbli.ID_BU',$id_bu);
		$query = $otherdb->get();
		return $query->result_array();
	}

	function report_bu_pengurus($id_bu){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('bu_pengurus_jabatan.Nama_Jabatan,bu_pengurus.No_KTP,bu_pengurus.Nama,bu_pengurus.Alamat,bu_pengurus.Tgl_Lahir,bu_pengurus.NPWP');
		$otherdb->from('bu_pengurus');
		$otherdb->join('bu_pengurus_jabatan','bu_pengurus.id_jabatan=bu_pengurus_jabatan.Id_Jabatan','left');

		$otherdb->WHERE('bu_pengurus.id_bu',$id_bu);
		$query = $otherdb->get();
		return $query->result_array();
	}

	function report_bu_tenaga_kerja($id_bu){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('kualifikasi_profesi.Deskripsi_ahli,kualifikasi_profesi.Deskripsi_trampil,bu_tenaga_kerja_kbli.id_personal,bu_tenaga_kerja_kbli.nama,bu_tenaga_kerja_kbli.alamat,bu_tenaga_kerja_kbli.id_personal,bu_tenaga_kerja_kbli.ID_Sub_Bidang_Klasifikasi,bu_tenaga_kerja_kbli.PJT,bu_tenaga_kerja_kbli.PJK,bu_tenaga_kerja_kbli.PJSK,bu_tenaga_kerja_kbli.Tenaga_Kerja');
		$otherdb->from('bu_tenaga_kerja_kbli');
		$otherdb->join('kualifikasi_profesi','kualifikasi_profesi.ID_Kualifikasi_Profesi=bu_tenaga_kerja_kbli.id_kualifikasi','left');

		$otherdb->WHERE('bu_tenaga_kerja_kbli.ID_Bu',$id_bu);
		$query = $otherdb->get();
		return $query->result_array();
	}


	public function akte_perubahan($id_bu){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('bu_akte_perubahan');
		$otherdb->where('ID_BU',$id_bu);
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function akte_perubahan_search($id_bu,$tgl,$nomer){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('bu_akte_perubahan');
		$otherdb->where('ID_BU',$id_bu);
		$otherdb->where('Nomer',$nomer);
		$otherdb->where('Tanggal',$tgl);
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function akte_perubahan_opr($id_bu){

		$this->db->select('bu_akte_perubahan.Nomer,bu_akte_perubahan.Nama_Notaris,bu_akte_perubahan.Alamat,bu_akte_perubahan.Tanggal,propinsi.Nama as propinsi,kabupaten.Nama as Kabupaten,bu_akte_perubahan.nama_pengurus,bu_pengurus_jabatan.Nama_Jabatan as id_jabatan,bu_akte_perubahan.Tgl_Pengesahan_Menteri,bu_akte_perubahan.No_Pengesahan_Menteri,bu_akte_perubahan.No_Pengesahan_PN,bu_akte_perubahan.Tgl_Pengesahan_PN,bu_akte_perubahan.No_Pengesahan_LN,bu_akte_perubahan.Tgl_Pengesahan_LN,bu_akte_perubahan.persyaratan');
		$this->db->from('bu_akte_perubahan');
		$this->db->join('propinsi','propinsi.ID_Propinsi=bu_akte_perubahan.propinsi','left');
		$this->db->join('bu_pengurus_jabatan','bu_pengurus_jabatan.Id_Jabatan=bu_akte_perubahan.id_jabatan','left');
		$this->db->join('kabupaten','kabupaten.ID_Kabupaten=bu_akte_perubahan.Kabupaten','left');
		$this->db->where('bu_akte_perubahan.ID_BU',$id_bu);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function report_bu_ceklis($id_bu,$id_pds,$asosiasi,$tgl_permohonan){

		$this->db->select('bu_pds_upload.Deskripsi,bu_pds_ceklis.Ket');
		$this->db->from('bu_pds_ceklis');
		$this->db->join('bu_pds_upload','bu_pds_ceklis.ID_UPLOAD=bu_pds_upload.ID_UPLOAD','left');
		$this->db->where('bu_pds_ceklis.ID_BU',$id_bu);
		$this->db->where('bu_pds_ceklis.ID_PDS',$id_pds);
		$this->db->where('bu_pds_ceklis.ID_ASOSIASI',$asosiasi);
		$this->db->where('bu_pds_ceklis.Tgl_Permohonan',$tgl_permohonan);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function report_ta_ceklis($id_personal,$id_pds,$asosiasi,$tgl_permohonan){

		$this->db->select('tk_pds_upload.Deskripsi,tk_pds_ceklis.Ket');
		$this->db->from('tk_pds_ceklis');
		$this->db->join('tk_pds_upload','tk_pds_ceklis.ID_UPLOAD=tk_pds_upload.ID_UPLOAD','left');
		$this->db->where('tk_pds_ceklis.ID_PERSONAL',$id_personal);
		$this->db->where('tk_pds_ceklis.ID_PDS',$id_pds);
		$this->db->where('tk_pds_ceklis.ID_ASOSIASI',$asosiasi);
		$this->db->where('tk_pds_ceklis.Tgl_Permohonan',$tgl_permohonan);
		$this->db->limit(20);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function report_tt_ceklis($id_personal,$id_pds,$asosiasi,$tgl_permohonan){

		$this->db->select('tk_pds_upload.Deskripsi,tk_pds_ceklis.Ket');
		$this->db->from('tk_pds_ceklis');
		$this->db->join('tk_pds_upload','tk_pds_ceklis.ID_UPLOAD=tk_pds_upload.ID_UPLOAD','left');
		$this->db->where('tk_pds_ceklis.ID_PERSONAL',$id_personal);
		$this->db->where('tk_pds_ceklis.ID_PDS',$id_pds);
		$this->db->where('tk_pds_ceklis.ID_ASOSIASI',$asosiasi);
		$this->db->where('tk_pds_ceklis.Tgl_Permohonan',$tgl_permohonan);
		$this->db->limit(20);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function status_kontrak(){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('bu_status_kontrak');
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function kd($id_bu){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('Tahun,ModalDisetor,SelisihRevaluasi,modallain,LabaDitahan,labaditahan_minus');
		$otherdb->from('bu_keuangan_neraca');
		$otherdb->where('ID_BU',$id_bu);
		$otherdb->order_by("Tahun", "desc");
		$otherdb->limit(2);
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function jenjang(){
		$this->db->select('*');
		$this->db->from('jenjang_pendidikan');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function klasifikasi_kualifikasi($id_bu){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('bu_registrasi_kbli.persyaratan_10,bu_registrasi_kbli.persyaratan_12,bu_registrasi_kbli.persyaratan_5,bu_registrasi_kbli.persyaratan_4,bu_registrasi_kbli.persyaratan_3,bu_registrasi_kbli.persyaratan_1,bu_registrasi_kbli.persyaratan_2,bu_registrasi_kbli.Tgl_permohonan,bu_registrasi_kbli.id_unit_sertifikasi,propinsi.Nama as Propinsi,bu_asosiasi_detail.Nama as ID_Asosiasi_BU,bu_registrasi_kbli.Tahun,bu_registrasi_kbli.id_klasifikasi_kbli,bu_registrasi_kbli.id_sub_klasifikasi_kbli,bu_registrasi_kbli.kualifikasi_kbli,bu_registrasi_kbli.No_BA_Asosiasi');
		$otherdb->from('bu_registrasi_kbli');
		$otherdb->join('bu_asosiasi_detail','bu_registrasi_kbli.ID_Asosiasi_BU=bu_asosiasi_detail.ID_Asosiasi_BU','left');
		$otherdb->join('propinsi','propinsi.ID_Propinsi=bu_registrasi_kbli.Propinsi','left');
		$otherdb->where('ID_BU',$id_bu);
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function klasifikasi_kualifikasi_2($id_bu,$asosiasi){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('bu_registrasi_kbli');
		$otherdb->where('ID_BU',$id_bu);
			$otherdb->where('ID_Asosiasi_BU',$asosiasi);
		$query = $otherdb->get();
		return $query->result_array();
	}
	public function cek_sub($id_bu,$tgl_permohonan,$asosiasi){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('id_sub_klasifikasi_kbli');
		$otherdb->from('bu_registrasi_kbli');
		$otherdb->where('ID_BU',$id_bu);
		$otherdb->where('Tgl_permohonan',$tgl_permohonan);
		$otherdb->where('ID_Asosiasi_BU',$asosiasi);
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function sub_klasifikasi_search($id_bu,$sub_klas){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('bu_registrasi_kbli');
		$otherdb->where('ID_BU',$id_bu);
		$otherdb->where('id_sub_klasifikasi_kbli',$sub_klas);
		$query = $otherdb->get();
		return $query->result_array();
	}
	public function klasifikasi_kualifikasi2_sad($id_bu,$tgl,$asosiasi){
	    $otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('bu_registrasi_kbli.Tgl_permohonan,bu_registrasi_kbli.id_unit_sertifikasi,propinsi.Nama as Propinsi,bu_asosiasi_detail.Nama as ID_Asosiasi_BU,bu_registrasi_kbli.Tahun,bu_registrasi_kbli.id_klasifikasi_kbli,bu_registrasi_kbli.id_sub_klasifikasi_kbli,bu_registrasi_kbli.kualifikasi_kbli,bu_registrasi_kbli.No_BA_Asosiasi,bu_registrasi_kbli.persyaratan_1,bu_registrasi_kbli.persyaratan_2,bu_registrasi_kbli.persyaratan_3,bu_registrasi_kbli.persyaratan_4,bu_registrasi_kbli.persyaratan_5,bu_registrasi_kbli.persyaratan_12,bu_registrasi_kbli.persyaratan_10');
		$otherdb->from('bu_registrasi_kbli');
		$otherdb->join('bu_asosiasi_detail','bu_registrasi_kbli.ID_Asosiasi_BU=bu_asosiasi_detail.ID_Asosiasi_BU','left');
		$otherdb->join('propinsi','propinsi.ID_Propinsi=bu_registrasi_kbli.Propinsi','left');
		$otherdb->where('bu_registrasi_kbli.ID_BU',$id_bu);
		$otherdb->where('bu_registrasi_kbli.Tgl_permohonan',$tgl);
		$otherdb->where('bu_registrasi_kbli.ID_Asosiasi_BU',$asosiasi);
		$query = $otherdb->get();
		return $query->result_array();
	}
	public function klasifikasi_kualifikasi3($id_bu,$tgl,$asosiasi){
		$this->db->select('*');
		$this->db->from('bu_registrasi_kbli');
		$this->db->where('ID_BU',$id_bu);
		$this->db->where('Tgl_permohonan',$tgl);
		$this->db->where('ID_Asosiasi_BU',$asosiasi);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function klasifikasi_kualifikasi2($id_bu,$tgl,$asosiasi){
		$this->db->select('bu_registrasi_kbli.Tgl_permohonan,bu_registrasi_kbli.id_unit_sertifikasi,propinsi.Nama as Propinsi,bu_asosiasi_detail.Nama as ID_Asosiasi_BU,bu_registrasi_kbli.Tahun,bu_registrasi_kbli.id_klasifikasi_kbli,bu_registrasi_kbli.id_sub_klasifikasi_kbli,bu_registrasi_kbli.kualifikasi_kbli,bu_registrasi_kbli.No_BA_Asosiasi,bu_registrasi_kbli.persyaratan_1,bu_registrasi_kbli.persyaratan_2,bu_registrasi_kbli.persyaratan_3,bu_registrasi_kbli.persyaratan_4,bu_registrasi_kbli.persyaratan_5,bu_registrasi_kbli.persyaratan_12,bu_registrasi_kbli.persyaratan_10');
		$this->db->from('bu_registrasi_kbli');
		$this->db->join('bu_asosiasi_detail','bu_registrasi_kbli.ID_Asosiasi_BU=bu_asosiasi_detail.ID_Asosiasi_BU','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi=bu_registrasi_kbli.Propinsi','left');
		$this->db->where('bu_registrasi_kbli.ID_BU',$id_bu);
		$this->db->where('bu_registrasi_kbli.Tgl_permohonan',$tgl);
		$this->db->where('bu_registrasi_kbli.ID_Asosiasi_BU',$asosiasi);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function tanggal_permohonan($id_bu){

		$this->db->distinct();
		$this->db->select("GROUP_CONCAT(bu_registrasi_kbli.id_sub_klasifikasi_kbli, ' ') as concat_sub,bu_registrasi_kbli.kualifikasi_kbli,bu_registrasi_kbli.Tgl_permohonan,bu_registrasi_kbli.ID_Asosiasi_BU,bu_asosiasi_detail.Nama");
		$this->db->from('bu_registrasi_kbli');
		$this->db->join('bu_registrasi_history_kbli','bu_registrasi_kbli.ID_BU=bu_registrasi_history_kbli.ID_BU AND bu_registrasi_kbli.id_sub_klasifikasi_kbli=bu_registrasi_history_kbli.id_sub_klasifikasi_kbli','left');
		$this->db->join('bu_asosiasi_detail','bu_registrasi_kbli.ID_Asosiasi_BU=bu_asosiasi_detail.ID_Asosiasi_BU','left');
		$this->db->where('bu_registrasi_kbli.ID_BU',$id_bu);

		$this->db->where('bu_registrasi_history_kbli.id_status','99');
		if($this->ion_auth->ketualpjkprov() OR $this->ion_auth->usbuprov()){
			$propinsi=$this->session->userdata('id_propinsi');
			$this->db->where('bu_registrasi_kbli.Propinsi',$propinsi);
		}
		$this->db->group_by('bu_registrasi_kbli.Tgl_permohonan','bu_registrasi_kbli.ID_Asosiasi_BU');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function tanggal_status($id_bu,$id_asosiasi){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->distinct();
		$otherdb->select('bu_registrasi_kbli.Tgl_permohonan,bu_registrasi_kbli.ID_Asosiasi_BU,bu_asosiasi_detail.Nama');
		$otherdb->from('bu_registrasi_kbli');
		$otherdb->join('bu_registrasi_history_kbli','bu_registrasi_kbli.ID_BU=bu_registrasi_history_kbli.ID_BU AND bu_registrasi_kbli.id_sub_klasifikasi_kbli=bu_registrasi_history_kbli.id_sub_klasifikasi_kbli','left');
		$otherdb->join('bu_asosiasi_detail','bu_registrasi_kbli.ID_Asosiasi_BU=bu_asosiasi_detail.ID_Asosiasi_BU','left');
		$otherdb->where('bu_registrasi_kbli.ID_BU',$id_bu);
		$otherdb->where('bu_registrasi_kbli.ID_Asosiasi_BU',$id_asosiasi);
		$otherdb->where('bu_registrasi_history_kbli.id_status','99');

		$query = $otherdb->get();
		return $query->result_array();
	}

	public function tanggal_status_2($id_bu,$id_asosiasi){
		$otherdb = $this->load->database('default2', TRUE);
		//$otherdb->distinct();
		$query=$otherdb->query("SELECT DISTINCT a.tgl_permohonan as Tgl_permohonan,
(SELECT nama FROM bu_asosiasi WHERE id_asosiasi_bu='$id_asosiasi') AS Nama,
a.id_asosiasi_bu as ID_Asosiasi_BU
FROM
(
	SELECT
	id_bu,
	id_asosiasi_bu,
	tgl_permohonan,
	id_sub_klasifikasi_kbli,
	id_status
	FROM bu_registrasi_history_kbli
	WHERE id_bu='$id_bu' AND id_asosiasi_bu='$id_asosiasi' AND id_status='99'
) AS a
LEFT JOIN
(
	SELECT
	id_bu,
	id_asosiasi_bu,
	tgl_permohonan,
	id_sub_klasifikasi_kbli,
	id_status
	FROM bu_registrasi_history_kbli
	WHERE id_bu='$id_bu' AND id_asosiasi_bu='$id_asosiasi' AND id_status='0'
) AS b
ON a.id_bu=b.id_bu AND a.id_asosiasi_BU = b.id_asosiasi_bu
AND a.tgl_permohonan=b.tgl_permohonan AND a.id_sub_klasifikasi_kbli=b.id_sub_klasifikasi_kbli
WHERE b.id_status IS NULL");


		return $query->result_array();
	}

	public function klasifikasi_kualifikasi_status($id_bu,$tgl,$asosiasi){

		$this->db->select('bu_registrasi_history_kbli.Tgl_permohonan,bu_registrasi_history_kbli.ID_Asosiasi_BU,bu_asosiasi_detail.Nama,bu_registrasi_history_kbli.id_klasifikasi_kbli,bu_registrasi_history_kbli.id_sub_klasifikasi_kbli,bu_registrasi_history_kbli.kualifikasi_kbli,id_status');
		$this->db->from('bu_registrasi_history_kbli');
		$this->db->join('bu_asosiasi_detail','bu_registrasi_history_kbli.ID_Asosiasi_BU=bu_asosiasi_detail.ID_Asosiasi_BU','left');
		$this->db->where('bu_registrasi_history_kbli.ID_BU',$id_bu);
		$this->db->where('bu_registrasi_history_kbli.ID_Asosiasi_BU',$asosiasi);
		$this->db->where('bu_registrasi_history_kbli.Tgl_permohonan',$tgl);

		$query = $this->db->get();
		return $query->result_array();
	}

	public function tanggal_upload($id_bu,$id_asosiasi){
		$otherdb = $this->load->database('default2', TRUE);

		$otherdb->select("GROUP_CONCAT(bu_registrasi_kbli.id_sub_klasifikasi_kbli, ' ') as concat_sub,bu_registrasi_kbli.Tgl_permohonan,bu_registrasi_kbli.ID_Asosiasi_BU,bu_asosiasi_detail.Nama");
		$otherdb->from('bu_registrasi_kbli');
		$otherdb->join('bu_registrasi_history_kbli','bu_registrasi_kbli.ID_BU=bu_registrasi_history_kbli.ID_BU AND bu_registrasi_kbli.id_sub_klasifikasi_kbli=bu_registrasi_history_kbli.id_sub_klasifikasi_kbli','left');
		$otherdb->join('bu_asosiasi_detail','bu_registrasi_kbli.ID_Asosiasi_BU=bu_asosiasi_detail.ID_Asosiasi_BU','left');
		$otherdb->where('bu_registrasi_kbli.ID_BU',$id_bu);
		$otherdb->where('bu_registrasi_kbli.ID_Asosiasi_BU',$id_asosiasi);
		$otherdb->group_by('bu_registrasi_kbli.Tgl_permohonan','bu_registrasi_kbli.ID_Asosiasi_BU');
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function tanggal_permohonan_tagihan($id_bu,$asosiasi){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->distinct();
		$otherdb->select('bu_registrasi_kbli.Tgl_permohonan,bu_registrasi_kbli.ID_Asosiasi_BU,bu_asosiasi_detail.Nama');
		$otherdb->from('bu_registrasi_kbli');
		$otherdb->join('bu_registrasi_history_kbli','bu_registrasi_kbli.ID_BU=bu_registrasi_history_kbli.ID_BU AND bu_registrasi_kbli.id_sub_klasifikasi_kbli=bu_registrasi_history_kbli.id_sub_klasifikasi_kbli','left');
		$otherdb->join('bu_asosiasi_detail','bu_registrasi_kbli.ID_Asosiasi_BU=bu_asosiasi_detail.ID_Asosiasi_BU','left');
		$otherdb->where('bu_registrasi_kbli.ID_BU',$id_bu);
		$otherdb->where('bu_registrasi_kbli.ID_Asosiasi_BU',$asosiasi);
		$otherdb->where('bu_registrasi_history_kbli.id_status','99');
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function tanggal_permohonan_terima($id_bu){
		$this->db->distinct();
		$this->db->select("GROUP_CONCAT(bu_registrasi_kbli.id_sub_klasifikasi_kbli, ' ') as concat_sub,bu_registrasi_kbli.kualifikasi_kbli,bu_registrasi_kbli.Tgl_permohonan,bu_registrasi_kbli.ID_Asosiasi_BU,bu_asosiasi_detail.Nama");
		$this->db->from('bu_registrasi_kbli');
		$this->db->join('bu_registrasi_history_kbli','bu_registrasi_kbli.ID_BU=bu_registrasi_history_kbli.ID_BU AND bu_registrasi_kbli.id_sub_klasifikasi_kbli=bu_registrasi_history_kbli.id_sub_klasifikasi_kbli','left');
		$this->db->join('bu_asosiasi_detail','bu_registrasi_kbli.ID_Asosiasi_BU=bu_asosiasi_detail.ID_Asosiasi_BU','left');
		$this->db->where('bu_registrasi_kbli.ID_BU',$id_bu);

		$this->db->where('bu_registrasi_history_kbli.id_status','2');
		if($this->ion_auth->ketualpjkprov() OR $this->ion_auth->usbuprov()){
			$propinsi=$this->session->userdata('id_propinsi');
			$this->db->where('bu_registrasi_kbli.Propinsi',$propinsi);
		}
		$this->db->group_by('bu_registrasi_kbli.Tgl_permohonan','bu_registrasi_kbli.ID_Asosiasi_BU');

		$query = $this->db->get();
		return $query->result_array();
	}
	public function tanggal_permohonan_usbu($id_bu){
		$this->db->distinct();
		$this->db->select("GROUP_CONCAT(bu_registrasi_kbli.id_sub_klasifikasi_kbli, ' ') as concat_sub,bu_registrasi_kbli.kualifikasi_kbli,bu_registrasi_kbli.Tgl_permohonan,bu_registrasi_kbli.ID_Asosiasi_BU,bu_asosiasi_detail.Nama");
		$this->db->from('bu_registrasi_kbli');
		$this->db->join('bu_registrasi_history_kbli','bu_registrasi_kbli.ID_BU=bu_registrasi_history_kbli.ID_BU AND bu_registrasi_kbli.id_sub_klasifikasi_kbli=bu_registrasi_history_kbli.id_sub_klasifikasi_kbli','left');
		$this->db->join('bu_asosiasi_detail','bu_registrasi_kbli.ID_Asosiasi_BU=bu_asosiasi_detail.ID_Asosiasi_BU','left');
		$this->db->where('bu_registrasi_kbli.ID_BU',$id_bu);

		$this->db->where('bu_registrasi_history_kbli.id_status','0');
		if($this->ion_auth->ketualpjkprov() OR $this->ion_auth->usbuprov()){
			$propinsi=$this->session->userdata('id_propinsi');
			$this->db->where('bu_registrasi_kbli.Propinsi',$propinsi);
		}
		$this->db->group_by('bu_registrasi_kbli.Tgl_permohonan','bu_registrasi_kbli.ID_Asosiasi_BU');

		$query = $this->db->get();
		return $query->result_array();
	}

	public function tanggal_cek_0($id_bu,$id_asosiasi){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->distinct();
		$otherdb->select('bu_registrasi_kbli.Tgl_permohonan,bu_registrasi_kbli.ID_Asosiasi_BU,bu_asosiasi_detail.Nama');
		$otherdb->from('bu_registrasi_kbli');
		$otherdb->join('bu_registrasi_history_kbli','bu_registrasi_kbli.ID_BU=bu_registrasi_history_kbli.ID_BU AND bu_registrasi_kbli.id_sub_klasifikasi_kbli=bu_registrasi_history_kbli.id_sub_klasifikasi_kbli','left');
		$otherdb->join('bu_asosiasi_detail','bu_registrasi_kbli.ID_Asosiasi_BU=bu_asosiasi_detail.ID_Asosiasi_BU','left');
		$otherdb->where('bu_registrasi_kbli.ID_BU',$id_bu);
		$otherdb->where('bu_registrasi_kbli.ID_Asosiasi_BU',$id_asosiasi);
		$otherdb->where('bu_registrasi_history_kbli.id_status','0');
		$query = $otherdb->get();
		return $query->result_array();
	}


	public function tanggal_permohonan_kelayakan($id_bu){
		$this->db->distinct();
		$this->db->select("GROUP_CONCAT(bu_registrasi_kbli.id_sub_klasifikasi_kbli, ' ') as concat_sub,bu_registrasi_kbli.kualifikasi_kbli,bu_registrasi_kbli.Tgl_permohonan,bu_registrasi_kbli.ID_Asosiasi_BU,bu_asosiasi_detail.Nama");
		$this->db->from('bu_registrasi_kbli');
		$this->db->join('bu_registrasi_history_kbli','bu_registrasi_kbli.ID_BU=bu_registrasi_history_kbli.ID_BU AND bu_registrasi_kbli.id_sub_klasifikasi_kbli=bu_registrasi_history_kbli.id_sub_klasifikasi_kbli','left');
		$this->db->join('bu_asosiasi_detail','bu_registrasi_kbli.ID_Asosiasi_BU=bu_asosiasi_detail.ID_Asosiasi_BU','left');
		$this->db->where('bu_registrasi_kbli.ID_BU',$id_bu);

		$this->db->where('bu_registrasi_history_kbli.id_status','1');
		if($this->ion_auth->ketualpjkprov() OR $this->ion_auth->usbuprov()){
			$propinsi=$this->session->userdata('id_propinsi');
			$this->db->where('bu_registrasi_kbli.Propinsi',$propinsi);
		}
		$this->db->group_by('bu_registrasi_kbli.Tgl_permohonan','bu_registrasi_kbli.ID_Asosiasi_BU');

		$query = $this->db->get();
		return $query->result_array();
	}
	public function cek($id_bu,$tgl,$id_status,$asosiasi){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->distinct();
		$otherdb->select('*');
		$otherdb->from('bu_registrasi_history_kbli');
		$otherdb->where('bu_registrasi_history_kbli.ID_BU',$id_bu);
		$otherdb->where('bu_registrasi_history_kbli.id_status',$id_status);
		$otherdb->where('bu_registrasi_history_kbli.tgl_permohonan',$tgl);
		$otherdb->where('bu_registrasi_history_kbli.ID_Asosiasi_BU',$asosiasi);
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function cek_2($id_bu,$status){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->distinct();
		$otherdb->select('*');
		$otherdb->from('bu_registrasi_history_kbli');
		$otherdb->where('bu_registrasi_history_kbli.ID_BU',$id_bu);
		$otherdb->where('bu_registrasi_history_kbli.id_status',$status);
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function cek_3($id_bu,$asosiasi,$tgl){

		$this->db->distinct();
		$this->db->select('*');
		$this->db->from('bu_pds_ceklis');
		$this->db->where('ID_BU',$id_bu);
		$this->db->where('Tgl_Permohonan',$tgl);
		$this->db->where('ID_ASOSIASI',$asosiasi);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function klasifikasi_kualifikasi_opr($id_bu){
		$this->db->select('*');
		$this->db->from('bu_registrasi_kbli');
		$this->db->where('ID_BU',$id_bu);
		$query = $this->db->get();
		return $query->result_array();
	}

	function klasifikasi_kualifikasi_opr_2($id_bu){
		$this->db->select('bu_registrasi_kbli.Tgl_permohonan,bu_registrasi_kbli.id_unit_sertifikasi,propinsi.Nama as Propinsi,bu_asosiasi_detail.Nama as ID_Asosiasi_BU,bu_registrasi_kbli.Tahun,bu_registrasi_kbli.id_klasifikasi_kbli,bu_registrasi_kbli.id_sub_klasifikasi_kbli,bu_registrasi_kbli.kualifikasi_kbli,bu_registrasi_kbli.No_BA_Asosiasi');
		$this->db->from('bu_registrasi_kbli');
		$this->db->join('bu_asosiasi_detail','bu_registrasi_kbli.ID_Asosiasi_BU=bu_asosiasi_detail.ID_Asosiasi_BU','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi=bu_registrasi_kbli.Propinsi','left');
		$this->db->where('ID_BU',$id_bu);
		$query = $this->db->get();
		return $query->result_array();
	}


	public function biodata($id_bu){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('bu');
		$otherdb->where('ID_BU',$id_bu);
		$query = $otherdb->get();
		return $query->result_array();
	}
	public function biodata_opr($id_bu){
		$this->db->select('bu.NPWP,bu.Nama,bu.ID_BU,bu.Alamat,bu.Telepon,bu.Fax,bu.Kodepos,bu.Email,bu.Website,bu_bentuk_usaha.Nama as id_bentuk_usaha,bu_jenis_kbli.Nama as ID_Jenis_BU_kbli,bu_bentuk.Nama as ID_Bentuk_BU,propinsi.Nama as ID_Propinsi,kabupaten.Nama as ID_Kabupaten,bu.persyaratan_9,bu.persyaratan_11,bu.persyaratan_13,bu.persyaratan_37,bu.persyaratan_39,bu.persyaratan_50,bu.persyaratan_51,bu.persyaratan_52,negara.nama as ID_Negara');
		$this->db->from('bu');
		$this->db->join('bu_bentuk_usaha','bu_bentuk_usaha.ID_Bentuk_usaha=bu.id_bentuk_usaha ','left');
		$this->db->join('bu_jenis_kbli','bu_jenis_kbli.ID_Jenis_BU_kbli=bu.ID_Jenis_BU_kbli ','left');
		$this->db->join('bu_bentuk','bu_bentuk.ID_Bentuk_BU=bu.ID_Bentuk_BU ','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi=bu.ID_Propinsi','left');
		$this->db->join('kabupaten','kabupaten.ID_Kabupaten=bu.ID_Kabupaten','left');
		$this->db->join('negara','negara.Id_negara=bu.ID_Negara','left');

		$this->db->where('bu.ID_BU',$id_bu);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function pengurus($id_bu){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('bu_pengurus');
		$otherdb->where('id_bu',$id_bu);
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function pengurus_search($id_bu,$id_pengurus){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('bu_pengurus');
		$otherdb->where('id_bu',$id_bu);
		$otherdb->where('id_pengurus',$id_pengurus);
		$query = $otherdb->get();
		return $query->result_array();
	}
	public function pengurus_sad($id_bu){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('bu_pengurus.id_pengurus,bu_pengurus.PJBU,bu_pengurus.Nama,bu_pengurus.No_KTP,bu_pengurus.npwp,bu_pengurus_jabatan.Nama_Jabatan as id_jabatan,bu_pengurus.Tempat_Lahir,bu_pengurus.Tgl_Lahir,bu_pengurus.Jabatan_BU,bu_pengurus.Alamat,bu_pengurus.Kodepos,bu_pengurus.no_ijazah,propinsi.Nama as ID_Propinsi, kabupaten.Nama as ID_Kabupaten_Alamat,bu_pengurus.persyaratan_14,bu_pengurus.persyaratan_15,bu_pengurus.persyaratan_16,bu_pengurus.persyaratan_17,bu_pengurus.persyaratan_18,bu_pengurus.persyaratan_53');
		$otherdb->from('bu_pengurus');
		$otherdb->join('propinsi','propinsi.ID_Propinsi=bu_pengurus.ID_Propinsi','left');
		$otherdb->join('kabupaten','kabupaten.ID_Kabupaten=bu_pengurus.ID_Kabupaten_Alamat','left');
		$otherdb->join('bu_pengurus_jabatan','bu_pengurus_jabatan.Id_Jabatan=bu_pengurus.id_jabatan','left');

		$otherdb->where('bu_pengurus.id_bu',$id_bu);

		$query = $otherdb->get();
		return $query->result_array();
	}
	public function pengurus_opr($id_bu){
		$this->db->select('bu_pengurus.id_pengurus,bu_pengurus.PJBU,bu_pengurus.Nama,bu_pengurus.No_KTP,bu_pengurus.npwp,bu_pengurus_jabatan.Nama_Jabatan as id_jabatan,bu_pengurus.Tempat_Lahir,bu_pengurus.Tgl_Lahir,bu_pengurus.Jabatan_BU,bu_pengurus.Alamat,bu_pengurus.Kodepos,bu_pengurus.no_ijazah,propinsi.Nama as ID_Propinsi, kabupaten.Nama as ID_Kabupaten_Alamat,bu_pengurus.persyaratan_14,bu_pengurus.persyaratan_15,bu_pengurus.persyaratan_16,bu_pengurus.persyaratan_17,bu_pengurus.persyaratan_18,bu_pengurus.persyaratan_53');
		$this->db->from('bu_pengurus');
		$this->db->join('propinsi','propinsi.ID_Propinsi=bu_pengurus.ID_Propinsi','left');
		$this->db->join('kabupaten','kabupaten.ID_Kabupaten=bu_pengurus.ID_Kabupaten_Alamat','left');
		$this->db->join('bu_pengurus_jabatan','bu_pengurus_jabatan.Id_Jabatan=bu_pengurus.id_jabatan','left');

		$this->db->where('bu_pengurus.id_bu',$id_bu);

		$query = $this->db->get();
		return $query->result_array();
	}

	public function pengalaman($id_bu){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('bu_pengalaman_kbli');
		$otherdb->where('ID_BU',$id_bu);
		$query = $otherdb->get();
		return $query->result_array();
	}

	function get_bps(){
		$this->db->distinct();
		$this->db->select('tahun_bps,rata_rata');
		$this->db->from('bu_bps_indexs');
		$this->db->order_by("tahun_bps", "desc");
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function pengalaman_opr($id_bu){
		$this->db->select('bu_pengalaman_kbli.Tgl_BA_Serah_Terima,bu_pengalaman_kbli.Nama_Paket,bu_pengalaman_kbli.Nomor_Kontrak,bu_pengalaman_kbli.Nilai_Kontrak,propinsi.Nama as ID_Propinsi, propinsi.Nama as ID_Propinsi,bu_pengalaman_kbli.Nomor_BA_Serah_Terima,bu_asosiasi_detail.Nama as ID_Asosiasi_BU,bu_pengalaman_kbli.Pemberi_Tugas,bu_pengalaman_kbli.Tahun,sumber_dana.Deskripsi as ID_Sumber_Dana,bu_pengalaman_kbli.ID_Klasifikasi_kbli,bu_pengalaman_kbli.ID_Sub_Klasifikasi_kbli,bu_pengalaman_kbli.Tgl_Kontrak,bu_pengalaman_kbli.Tgl_Kontrak,bu_pengalaman_kbli.Tgl_Mulai,bu_pengalaman_kbli.Tgl_Selesai,bu_pengalaman_kbli.persyaratan_32,bu_pengalaman_kbli.persyaratan_34,bu_pengalaman_kbli.persyaratan_35,bu_pengalaman_kbli.persyaratan_36,bu_bps_indexs.rata_rata,bu_pengalaman_kbli.kunci');
		$this->db->from('bu_pengalaman_kbli');
		$this->db->join('propinsi','propinsi.ID_Propinsi=bu_pengalaman_kbli.ID_Propinsi','left');
		$this->db->join('bu_asosiasi_detail','bu_asosiasi_detail.ID_Asosiasi_BU=bu_pengalaman_kbli.ID_Asosiasi_BU','left');
		$this->db->join('sumber_dana','sumber_dana.ID_Sumber_Dana=bu_pengalaman_kbli.ID_Sumber_Dana','left');
		$this->db->join('bu_bps_indexs','bu_bps_indexs.tahun_bps=bu_pengalaman_kbli.Tahun','left');

		$this->db->where('bu_pengalaman_kbli.ID_BU',$id_bu);
		$this->db->order_by("bu_pengalaman_kbli.ID_Sub_Klasifikasi_kbli", "desc");
		$this->db->limit(10);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function pengalaman_full2($limit, $start,$id_bu){
		$this->db->limit($limit, $start);
		$this->db->select('bu_pengalaman_kbli.Nama_Paket,bu_pengalaman_kbli.Nomor_Kontrak,bu_pengalaman_kbli.Nilai_Kontrak,propinsi.Nama as ID_Propinsi, propinsi.Nama as ID_Propinsi,bu_pengalaman_kbli.Nomor_BA_Serah_Terima,bu_asosiasi_detail.Nama as ID_Asosiasi_BU,bu_pengalaman_kbli.Pemberi_Tugas,bu_pengalaman_kbli.Tahun,sumber_dana.Deskripsi as ID_Sumber_Dana,bu_pengalaman_kbli.ID_Klasifikasi_kbli,bu_pengalaman_kbli.ID_Sub_Klasifikasi_kbli,bu_pengalaman_kbli.Tgl_Kontrak,bu_pengalaman_kbli.Tgl_Kontrak,bu_pengalaman_kbli.Tgl_Mulai,bu_pengalaman_kbli.Tgl_Selesai,bu_pengalaman_kbli.persyaratan_32,bu_pengalaman_kbli.persyaratan_34,bu_pengalaman_kbli.persyaratan_35,bu_pengalaman_kbli.persyaratan_36,bu_bps_indexs.rata_rata,bu_pengalaman_kbli.kunci');
		$this->db->from('bu_pengalaman_kbli');
		$this->db->join('propinsi','propinsi.ID_Propinsi=bu_pengalaman_kbli.ID_Propinsi','left');
		$this->db->join('bu_asosiasi_detail','bu_asosiasi_detail.ID_Asosiasi_BU=bu_pengalaman_kbli.ID_Asosiasi_BU','left');
		$this->db->join('sumber_dana','sumber_dana.ID_Sumber_Dana=bu_pengalaman_kbli.ID_Sumber_Dana','left');
		$this->db->join('bu_bps_indexs','bu_bps_indexs.tahun_bps=bu_pengalaman_kbli.Tahun','left');

		$this->db->where('bu_pengalaman_kbli.ID_BU',$id_bu);
		$this->db->order_by("bu_pengalaman_kbli.ID_Sub_Klasifikasi_kbli", "desc");
		$this->db->order_by("bu_pengalaman_kbli.Log", "desc");

		$query = $this->db->get();
		return $query->result_array();
	}

	public function pengalaman_full($id_bu){
		$this->db->select('bu_pengalaman_kbli.Nama_Paket,bu_pengalaman_kbli.Nomor_Kontrak,bu_pengalaman_kbli.Nilai_Kontrak,propinsi.Nama as ID_Propinsi, propinsi.Nama as ID_Propinsi,bu_pengalaman_kbli.Nomor_BA_Serah_Terima,bu_asosiasi_detail.Nama as ID_Asosiasi_BU,bu_pengalaman_kbli.Pemberi_Tugas,bu_pengalaman_kbli.Tahun,sumber_dana.Deskripsi as ID_Sumber_Dana,bu_pengalaman_kbli.ID_Klasifikasi_kbli,bu_pengalaman_kbli.ID_Sub_Klasifikasi_kbli,bu_pengalaman_kbli.Tgl_Kontrak,bu_pengalaman_kbli.Tgl_Kontrak,bu_pengalaman_kbli.Tgl_Mulai,bu_pengalaman_kbli.Tgl_Selesai,bu_pengalaman_kbli.persyaratan_32,bu_pengalaman_kbli.persyaratan_34,bu_pengalaman_kbli.persyaratan_35,bu_pengalaman_kbli.persyaratan_36,bu_bps_indexs.rata_rata,bu_pengalaman_kbli.kunci');
		$this->db->from('bu_pengalaman_kbli');
		$this->db->join('propinsi','propinsi.ID_Propinsi=bu_pengalaman_kbli.ID_Propinsi','left');
		$this->db->join('bu_asosiasi_detail','bu_asosiasi_detail.ID_Asosiasi_BU=bu_pengalaman_kbli.ID_Asosiasi_BU','left');
		$this->db->join('sumber_dana','sumber_dana.ID_Sumber_Dana=bu_pengalaman_kbli.ID_Sumber_Dana','left');
		$this->db->join('bu_bps_indexs','bu_bps_indexs.tahun_bps=bu_pengalaman_kbli.Tahun','left');

		$this->db->where('bu_pengalaman_kbli.ID_BU',$id_bu);
		$this->db->order_by("bu_pengalaman_kbli.ID_Sub_Klasifikasi_kbli", "desc");

		$query = $this->db->get();
		return $query->result_array();
	}

	public function pengalaman_search($id_bu,$nilai_kontrak,$sub_klas){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('bu_pengalaman_kbli');
		$otherdb->where('ID_BU',$id_bu);
		$otherdb->where('Nilai_Kontrak',$nilai_kontrak);
		$otherdb->where('ID_Sub_Klasifikasi_kbli',$sub_klas);
		$query = $otherdb->get();
		return $query->result_array();
	}
	public function index(){

		$this->db->distinct();
		$this->db->select('tahun_bps,rata_rata');
		$this->db->from('bu_bps_indexs');
		$this->db->order_by("tahun_bps", "desc");
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function pengalaman_simulasi($id_bu,$sub_klasifikasi,$max_year,$min_year,$rata2){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('(('.$rata2.'/bu_bps_indexs.rata_rata)*bu_pengalaman_kbli.Nilai_Kontrak) AS Nilai_Kontrak');
		$otherdb->from('bu_pengalaman_kbli');
		$otherdb->join('bu_bps_indexs','bu_pengalaman_kbli.Tahun=bu_bps_indexs.tahun_bps','left');
		$otherdb->where('bu_pengalaman_kbli.ID_BU',$id_bu);
		$otherdb->where('bu_pengalaman_kbli.ID_Sub_Klasifikasi_kbli',$sub_klasifikasi);
		$otherdb->where("bu_pengalaman_kbli.Tahun BETWEEN '$min_year' AND '$max_year'");
		$query = $otherdb->get();
		return $query->result_array();
	}


	public function akte_pendirian($id_bu){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('bu_akte_pendirian');
		$otherdb->where('ID_BU',$id_bu);
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function get_akte_pendirian_simulasi($id_bu){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('Tgl_Akte_Pendirian');
		$otherdb->from('bu_akte_pendirian');
		$otherdb->where('ID_BU',$id_bu);
		$query = $otherdb->get();
		return $query->result_array();
	}
	public function akte_pendirian_opr($id_bu){

		$this->db->select('bu_akte_pendirian.No_Akte_Pendirian,bu_akte_pendirian.Nama_Notaris,bu_akte_pendirian.Alamat,bu_akte_pendirian.Tgl_Akte_Pendirian,propinsi.Nama as Propinsi_Akte_Pendirian,kabupaten.Nama as Kabupaten_Akte_Pendirian,bu_akte_pendirian.nama_pengurus,bu_pengurus_jabatan.Nama_Jabatan as id_jabatan,bu_akte_pendirian.Tgl_Pengesahan_Menteri,bu_akte_pendirian.No_Pengesahan_Menteri,bu_akte_pendirian.Tgl_Pengesahan_PN,bu_akte_pendirian.No_Pengesahan_LN,bu_akte_pendirian.Tgl_Pengesahan_LN,bu_akte_pendirian.persyaratan');
		$this->db->from('bu_akte_pendirian');
		$this->db->join('propinsi','propinsi.ID_Propinsi=bu_akte_pendirian.Propinsi_Akte_Pendirian','left');
		$this->db->join('bu_pengurus_jabatan','bu_pengurus_jabatan.Id_Jabatan=bu_akte_pendirian.id_jabatan','left');
		$this->db->join('kabupaten','kabupaten.ID_Kabupaten=bu_akte_pendirian.Kabupaten_Akte_Pendirian','left');
		$this->db->where('bu_akte_pendirian.ID_BU',$id_bu);
		$query = $this->db->get();
		return $query->result_array();
	}


	public function pph_omset($id_bu){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('bu_keuangan_pendapatan');
		$otherdb->where('ID_BU',$id_bu);
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function pph_omset_opr($id_bu){

		$this->db->select('*');
		$this->db->from('bu_keuangan_pendapatan');
		$this->db->where('ID_BU',$id_bu);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function pemegang_saham($id_bu){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('bu_keuangan_saham');
		$otherdb->where('ID_BU',$id_bu);
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function saham_search($id_bu,$id_saham){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('bu_keuangan_saham');
		$otherdb->where('ID_BU',$id_bu);
		$otherdb->where('ID_Pemilik_Saham',$id_saham);
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function pemegang_saham_opr($id_bu){
		$this->db->select('bu_keuangan_saham.ID_Pemilik_Saham,bu_keuangan_saham.persyaratan,bu_keuangan_saham.nama_pemilik,bu_keuangan_saham.no_ktp,alamat,propinsi.Nama as id_propinsi,kabupaten.Nama as id_kabupaten,bu_keuangan_saham.kd_pos,bu_keuangan_saham.jenis_saham,bu_keuangan_saham.Jumlah_Lembar,Nilai_Per_Lembar,Modal_Dasar');
		$this->db->from('bu_keuangan_saham');
		$this->db->join('propinsi','propinsi.ID_Propinsi=bu_keuangan_saham.id_propinsi','left');
		$this->db->join('kabupaten','kabupaten.ID_Kabupaten=bu_keuangan_saham.id_kabupaten','left');
		$this->db->where('bu_keuangan_saham.ID_BU',$id_bu);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function neraca($id_bu){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('bu_keuangan_neraca');
		$otherdb->where('ID_BU',$id_bu);
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function neraca_search($id_bu,$tahun){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('bu_keuangan_neraca');
		$otherdb->where('ID_BU',$id_bu);
		$otherdb->where('Tahun',$tahun);
		$query = $otherdb->get();
		return $query->result_array();
	}
	public function jenis_usaha_kbli($id_bu){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('ID_Jenis_BU_kbli');
		$otherdb->from('bu');
		$otherdb->where('ID_BU',$id_bu);
		$query = $otherdb->get();
		return $query->result_array();
	}
	public function neraca_opr($id_bu){

		$this->db->select('*');
		$this->db->from('bu_keuangan_neraca');
		$this->db->where('ID_BU',$id_bu);
		$query = $this->db->get();
		return $query->result_array();
	}



	public function tenaga_kerja($id_bu){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('bu_tenaga_kerja_kbli');
		$otherdb->where('ID_Bu',$id_bu);
		$query = $otherdb->get();
		return $query->result_array();
	}
	public function tenaga_kerja_search($id_bu,$noreg){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('bu_tenaga_kerja_kbli');
		$otherdb->where('ID_Bu',$id_bu);
		$otherdb->where('Noreg',$noreg);
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function tenaga_kerja_opr($id_bu){
		$this->db->select('bu_tenaga_kerja_kbli.id_personal,bu_tenaga_kerja_kbli.Tenaga_kerja,bu_tenaga_kerja_kbli.Noreg,bu_tenaga_kerja_kbli.nama,bu_tenaga_kerja_kbli.no_ktp,bu_tenaga_kerja_kbli.tgl_lahir,bu_tenaga_kerja_kbli.kodepos,bu_tenaga_kerja_kbli.Pend_Akhir,bu_tenaga_kerja_kbli.no_ijazah,bu_tenaga_kerja_kbli.Thn_Lulus,bu_tenaga_kerja_kbli.npwp,bu_tenaga_kerja_kbli.alamat,bu_tenaga_kerja_kbli.ID_Sub_Bidang_Klasifikasi,bu_tenaga_kerja_kbli.Tenaga_Kerja,bu_tenaga_kerja_kbli.id_kualifikasi,bu_tenaga_kerja_kbli.PJT,bu_tenaga_kerja_kbli.PJK,bu_tenaga_kerja_kbli.PJSK,bu_tenaga_kerja_kbli.id_klasifikasi_pjk1,bu_tenaga_kerja_kbli.id_klasifikasi_pjk2,bu_tenaga_kerja_kbli.id_sub_klasifikasi_pjsk1,bu_tenaga_kerja_kbli.id_sub_klasifikasi_pjsk2,bu_tenaga_kerja_kbli.persyaratan_23,bu_tenaga_kerja_kbli.persyaratan_24,bu_tenaga_kerja_kbli.persyaratan_25,bu_tenaga_kerja_kbli.persyaratan_26,bu_tenaga_kerja_kbli.persyaratan_27');
		$this->db->from('bu_tenaga_kerja_kbli');
		$this->db->where('bu_tenaga_kerja_kbli.ID_Bu',$id_bu);
		$query = $this->db->get();
		return $query->result_array();
	}



	public function klasifikasi_bu(){
		$this->db->select('*');
		$this->db->from('bu_klasifikasi_kbli');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function klasifikasi_bu_2($jenis_klasifikasi){
		$this->db->select('*');
		$this->db->from('bu_klasifikasi_kbli');
		$this->db->where('jenis_klasifikasi',$jenis_klasifikasi);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function klasifikasi_bu_sub(){
		$this->db->select('id_sub_klasifikasi,id_klasifikasi');
		$this->db->from('bu_klasifikasi_sub_kbli');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function kualifikasi_bu(){
		$this->db->select('*');
		$this->db->from('bu_kualifikasi_sub_kbli');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function kualifikasi_bu_2($id_jenis_bu_kbli){
		$this->db->select('*');
		$this->db->from('bu_kualifikasi_sub_kbli');
		$this->db->where('ID_jenis_BU_kbli',$id_jenis_bu_kbli);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function negara(){
		$this->db->select('*');
		$this->db->from('negara');
		$this->db->where('Id_negara!=','ID');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function negara_all(){
		$this->db->select('*');
		$this->db->from('negara');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function negara_id(){
		$this->db->select('*');
		$this->db->from('negara');
		$this->db->where('Id_negara','ID');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function sumber_dana(){
		$this->db->select('*');
		$this->db->from('sumber_dana');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function unit_sertifikasi(){
		$prop=$this->session->userdata('id_propinsi');
		$this->db->select('*');

		$this->db->from('unit_sertifikasi');
		if($prop!='00'){
			$this->db->where('id_propinsi',$prop);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	public function jabatan(){
		$this->db->select('*');
		$this->db->from('bu_pengurus_jabatan');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function jabatan_bu(){
		$this->db->select('*');
		$this->db->from('jabatan_deskripsi');
		$query = $this->db->get();
		return $query->result_array();
	}

	function insert_sad($table,$data){
		$otherdb = $this->load->database('default2', TRUE);
		$insert_query = $otherdb->insert($table, $data);
		$insert_query = str_replace('INSERT INTO','INSERT IGNORE INTO',$insert_query);
		$otherdb->trans_complete();
		if ($otherdb->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function insert($table,$data){

		$this->db->insert($table, $data);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function cek_ta($noreg,$id_bu){
		$this->db->select('id_personal');
		$this->db->from('bu_ambil_ta_kbli');
		$this->db->where('id_bu',$id_bu);
		$this->db->where('nomor_urut',$noreg);
		$query = $this->db->get();
		return $query->result_array();
	}
	function cek_tt($noreg,$id_bu){
		$this->db->select('id_personal');
		$this->db->from('bu_ambil_tt');
		$this->db->where('id_bu',$id_bu);
		$this->db->where('nomor_urut',$noreg);
		$query = $this->db->get();
		return $query->result_array();
	}

	function cek_habis_ta($id_personal,$sub){
		$this->db->select('id_personal');
		$this->db->from('personal_sertifikat_ta');
		$this->db->where('id_personal',$id_personal);
		$this->db->where('id_sub_bidang',$sub);
		$this->db->where('tgl_cetak_pertama BETWEEN NOW() - INTERVAL 3 YEAR AND NOW()', "", false);
		$query = $this->db->get();
		return $query->result_array();

	}

	function cek_habis_tt($id_personal,$sub){
		$this->db->select('id_personal');
		$this->db->from('personal_sertifikat_tt');
		$this->db->where('id_personal',$id_personal);
		$this->db->where('id_sub_bidang',$sub);
		$this->db->where('tgl_cetak_pertama BETWEEN NOW() - INTERVAL 3 YEAR AND NOW()', "", false);
		$query = $this->db->get();
		return $query->result_array();

	}

	function tenaga_ahli($noreg,$sub_bidang){
		$this->db->select('tk_registrasi_history.id_Kualifikasi_profesi,personal_nrta_kbli.ID_Personal,personal.ID_Propinsi,personal.npwp,personal.Nama,personal.Alamat1,personal.Kodepos,personal.Tgl_lahir,personal.Tenaga_Kerja,personal_pendidikan.No_Ijazah,jenjang_pendidikan.Deskripsi,personal_pendidikan.Tahun,tk_registrasi_history.id_sub_bidang,sub_bidang_keahlian_kbli.Deskripsi as sub_bidang_deskripsi');
		$this->db->from('personal_nrta_kbli');
		$this->db->join('personal','personal_nrta_kbli.ID_Personal=personal.id_personal','left');
		$this->db->join('personal_pendidikan','personal_nrta_kbli.ID_Personal=personal_pendidikan.ID_Personal','left');
		$this->db->join('jenjang_pendidikan','personal_pendidikan.Jenjang=jenjang_pendidikan.ID_Jenjang','left');
		$this->db->join('tk_registrasi_history','personal_nrta_kbli.ID_Personal=tk_registrasi_history.ID_Personal','left');
		$this->db->join('sub_bidang_keahlian_kbli','tk_registrasi_history.id_sub_bidang=sub_bidang_keahlian_kbli.ID_Sub_Bidang_Keahlian','left');
		$this->db->group_by('id_sub_bidang');
		$this->db->where('personal_nrta_kbli.Nomor_Urut_Baru',$noreg);
		$this->db->where('tk_registrasi_history.id_status','4');
		$this->db->where('tk_registrasi_history.id_sub_bidang',$sub_bidang);

		$query = $this->db->get();
		return $query->result_array();
	}
	function pendidikan_get_tk($id_personal){
		$this->db->select('*');
		$this->db->from('personal_pendidikan');
		$this->db->where('ID_Personal',$id_personal);

		$query = $this->db->get();
		return $query->result_array();
	}

	function tenaga_kerja_sub_bidang($noreg){
		$this->db->select('personal_sertifikat_ta.id_sub_bidang');
		$this->db->from('personal_nrta_kbli');
	//	$this->db->join('tk_registrasi_history','personal_nrta_kbli.ID_Personal=tk_registrasi_history.ID_Personal','left');
		$this->db->join('personal_sertifikat_ta','personal_nrta_kbli.ID_Personal=personal_sertifikat_ta.ID_Personal','left');
		//$this->db->group_by('id_sub_bidang');
		$this->db->where('personal_nrta_kbli.Nomor_Urut_Baru',$noreg);
		//$this->db->where('tk_registrasi_history.id_status','4');
		$this->db->where("personal_sertifikat_ta.tgl_cetak_pertama BETWEEN NOW() - interval '3-3' YEAR_MONTH AND NOW()", "", false);

		$query = $this->db->get();
		return $query->result_array();
	}
	function tenaga_kerja_sub_bidang_trampil($noreg,$id_personal){
		$this->db->select('personal_sertifikat_tt.id_sub_bidang');
		$this->db->from('personal_nrtt');
	//	$this->db->join('tk_registrasi_history','personal_nrtt.ID_Personal=tk_registrasi_history.ID_Personal','left');
		$this->db->join('personal_sertifikat_tt','personal_nrtt.ID_Personal=personal_sertifikat_tt.ID_Personal','left');
		//$this->db->group_by('id_sub_bidang');
		$this->db->where('personal_nrtt.Nomor_Urut',$noreg);
		$this->db->where('personal_nrtt.ID_Personal',$id_personal);
		//$this->db->where('tk_registrasi_history.id_status','4');
		$this->db->where("personal_sertifikat_tt.tgl_cetak_pertama BETWEEN NOW() - interval '3-3' YEAR_MONTH AND NOW()", "", false);

		$query = $this->db->get();
		return $query->result_array();
	}


	function tenaga_terampil_search($noreg,$sub_bidang){
		$this->db->select('personal_nrtt.ID_Personal,personal_nrtt.ID_Propinsi,personal.npwp,personal.Nama,personal.Alamat1,personal.Kodepos,personal.Tgl_lahir,personal.Tenaga_Kerja,personal_pendidikan.No_Ijazah,jenjang_pendidikan.Deskripsi,personal_pendidikan.Tahun,tk_registrasi_history_tt.id_sub_bidang,sub_bidang_ketrampilan.Deskripsi as sub_bidang_deskripsi');
		$this->db->from('personal_nrtt');
		$this->db->join('personal','personal_nrtt.ID_Personal=personal.id_personal','left');
		$this->db->join('personal_pendidikan','personal_nrtt.ID_Personal=personal_pendidikan.ID_Personal','left');
		$this->db->join('jenjang_pendidikan','personal_pendidikan.Jenjang=jenjang_pendidikan.ID_Jenjang','left');
		$this->db->join('tk_registrasi_history_tt','personal_nrtt.ID_Personal=tk_registrasi_history_tt.ID_Personal','left');
		$this->db->join('sub_bidang_ketrampilan','tk_registrasi_history_tt.id_sub_bidang=sub_bidang_ketrampilan.ID_Sub_Bidang_Ketrampilan','left');
		$this->db->group_by('id_sub_bidang');
		$this->db->where('personal_nrtt.Nomor_Urut',$noreg);
		//$this->db->where('personal_nrtt.ID_Propinsi',$propinsi);
		$this->db->where('tk_registrasi_history_tt.id_status','4');
		$this->db->where('tk_registrasi_history_tt.id_sub_bidang',$sub_bidang);
		$query = $this->db->get();
		return $query->result_array();
	}


	function tenaga_terampil($noreg,$propinsi,$sub_bidang){
		$this->db->select('personal_nrtt.ID_Personal,personal_nrtt.ID_Propinsi,personal.npwp,personal.Nama,personal.Alamat1,personal.Kodepos,personal.Tgl_lahir,personal.Tenaga_Kerja,personal_pendidikan.No_Ijazah,jenjang_pendidikan.Deskripsi,personal_pendidikan.Tahun,tk_registrasi_history_tt.id_sub_bidang,sub_bidang_ketrampilan.Deskripsi as sub_bidang_deskripsi');
		$this->db->from('personal_nrtt');
		$this->db->join('personal','personal_nrtt.ID_Personal=personal.id_personal','left');
		$this->db->join('personal_pendidikan','personal_nrtt.ID_Personal=personal_pendidikan.ID_Personal','left');
		$this->db->join('jenjang_pendidikan','personal_pendidikan.Jenjang=jenjang_pendidikan.ID_Jenjang','left');
		$this->db->join('tk_registrasi_history_tt','personal_nrtt.ID_Personal=tk_registrasi_history_tt.ID_Personal','left');
		$this->db->join('sub_bidang_ketrampilan','tk_registrasi_history_tt.id_sub_bidang=sub_bidang_ketrampilan.ID_Sub_Bidang_Ketrampilan','left');
		$this->db->group_by('id_sub_bidang');
		$this->db->where('personal_nrtt.Nomor_Urut',$noreg);
		$this->db->where('personal_nrtt.ID_Propinsi',$propinsi);
		$this->db->where('tk_registrasi_history_tt.id_status','4');
		$this->db->where('tk_registrasi_history_tt.id_sub_bidang',$sub_bidang);
		$query = $this->db->get();
		return $query->result_array();
	}

  public function searching($select, $where){
    $query=$this->db->query("$select $where");
    if($query->num_rows()>0){
      foreach($query->result_array() as $row){
        $data[]=$row;
      }
      $query->free_result();
    }
    else{
      $data=NULL;
    }
    return $data;
  }

    function asosiasi_opr(){

    $select="SELECT ID_Asosiasi_BU,Nama FROM bu_asosiasi_detail";
    $query=$this->db->query("$select");
    if($query->num_rows()>0){
      foreach($query->result_array() as $row){
        $data[]=$row;
      }
      $query->free_result();
    }
    else{
      $data=NULL;
    }
    return $data;
  }


  public function provinsi_opr(){
		$this->db->select('*');
		$this->db->from('propinsi');
		$query = $this->db->get();
		return $query->result_array();
	}
  	public function klasifikasi(){
		$this->db->select('ID_Klasifikasi,Deskripsi');
		$this->db->from('bu_klasifikasi_kbli');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function klasifikasi_tk_ahli(){
	$this->db->select('*');
	$this->db->from('bidang_klasifikasi_profesi');
	$this->db->where('ID_Tipe_Profesi','1');
	$query = $this->db->get();
	return $query->result_array();
}

public function kualifikasi_profesi(){
$this->db->select('*');
$this->db->from('kualifikasi_profesi');
$query = $this->db->get();
return $query->result_array();
}

public function klasifikasi_tk_trampil(){
$this->db->select('*');
$this->db->from('bidang_klasifikasi_profesi');
$this->db->where('ID_Tipe_Profesi','2');
$query = $this->db->get();
return $query->result_array();
}
	public function sub_klasifikasi(){
		$this->db->select('id_sub_klasifikasi,Deskripsi');
		$this->db->from('bu_subklasifikasi');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function search_kabupaten($id_kabupaten){
		$this->db->select('ID_Kabupaten,Nama');
		$this->db->from('kabupaten');
		$this->db->where('ID_Kabupaten',$id_kabupaten);
		$query = $this->db->get();
		return $query->result_array();
	}




  public function searching_sad($select, $where){
    $otherdb = $this->load->database('default2', TRUE);
    $query=$otherdb->query("$select $where");
    if($query->num_rows()>0){
      foreach($query->result_array() as $row){
        $data[]=$row;
      }
      $query->free_result();
    }
    else{
      $data=NULL;
    }
    return $data;
  }

  function bentuk_usaha(){
    $otherdb = $this->load->database('default2', TRUE);
    $select="SELECT * FROM bu_bentuk_usaha";
    $query=$otherdb->query("$select");
    if($query->num_rows()>0){
      foreach($query->result_array() as $row){
        $data[]=$row;
      }
      $query->free_result();
    }
    else{
      $data=NULL;
    }
    return $data;
  }

  function jenis_usaha(){
    $otherdb = $this->load->database('default2', TRUE);
    $select="SELECT * FROM bu_jenis_kbli";
    $query=$otherdb->query("$select");
    if($query->num_rows()>0){
      foreach($query->result_array() as $row){
        $data[]=$row;
      }
      $query->free_result();
    }
    else{
      $data=NULL;
    }
    return $data;
  }

  function kategori_bu(){
    $otherdb = $this->load->database('default2', TRUE);
    $select="SELECT * FROM bu_bentuk";
    $query=$otherdb->query("$select");
    if($query->num_rows()>0){
      foreach($query->result_array() as $row){
        $data[]=$row;
      }
      $query->free_result();
    }
    else{
      $data=NULL;
    }
    return $data;
  }

	public function provinsi_search($id_propinsi){
	$this->db->select('ID_Propinsi,Nama');
	$this->db->from('propinsi');
	$this->db->where('ID_Propinsi',$id_propinsi);
	$query = $this->db->get();
	return $query->result_array();
	}

	public function kategori_bu_asing(){
	$this->db->select('*');
	$this->db->from('bu_bentuk');
	$this->db->where('ID_Bentuk_BU','3');
	$query = $this->db->get();
	return $query->result_array();
	}

	public function provinsi_luar(){
	$this->db->select('ID_Propinsi,Nama');
	$this->db->from('propinsi');
	$this->db->where('ID_Propinsi','99');
	$query = $this->db->get();
	return $query->result_array();
	}

	public function kabupaten_search($id_propinsi){
	$this->db->select('ID_Kabupaten,Nama');
	$this->db->from('kabupaten');
	$this->db->where('ID_Propinsi',$id_propinsi);
	$query = $this->db->get();
	return $query->result_array();
	}

  function provinsi(){
    $otherdb = $this->load->database('default2', TRUE);
    $select = "SELECT ID_Propinsi,Nama FROM propinsi";
    $query=$otherdb->query("$select");
    if($query->num_rows()>0){
      foreach($query->result_array() as $row){
        $data[]=$row;
      }
      $query->free_result();
    }
    else{
      $data=NULL;
    }
    return $data;
  }

  function kabupaten(){
    $otherdb = $this->load->database('default2', TRUE);
    $select="SELECT ID_Kabupaten,Nama FROM kabupaten";
    $query=$otherdb->query("$select");
    if($query->num_rows()>0){
      foreach($query->result_array() as $row){
        $data[]=$row;
      }
      $query->free_result();
    }
    else{
      $data=NULL;
    }
    return $data;
  }

  function asosiasi(){
    $otherdb = $this->load->database('default2', TRUE);
    $select="SELECT ID_Asosiasi_BU,Nama FROM bu_asosiasi_detail";
    $query=$otherdb->query("$select");
    if($query->num_rows()>0){
      foreach($query->result_array() as $row){
        $data[]=$row;
      }
      $query->free_result();
    }
    else{
      $data=NULL;
    }
    return $data;
  }

	public function asosiasi_search($asosiasi){
		$this->db->select('ID_Asosiasi_BU,Nama');
		$this->db->from('bu_asosiasi_detail');
		$this->db->where('ID_Asosiasi_BU',$asosiasi);
		$query = $this->db->get();
		return $query->result_array();
	}





}
?>
