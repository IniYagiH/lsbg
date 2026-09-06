<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tenaga_kerja_model extends CI_Model
{
	public function __construct(){
		parent::__construct();
	}
	function insert($table,$data){

		$this->db->insert($table, $data);

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

	function propinsi_dukcapil($propinsi){
		$this->db->select('ID_Propinsi,Nama');
		$this->db->from('matriks_propinsi_dukcapil');
		$this->db->where('NO_PROP',$propinsi);
		$query = $this->db->get();
		return $query->result_array();
	}
	function kabupaten_dukcapil($kabupaten){
		$this->db->select('ID_Kabupaten,Nama');
		$this->db->from('matriks_kabupaten_dukcapil');
		$this->db->where('NO_KAB',$kabupaten);
		$query = $this->db->get();
		return $query->result_array();
	}
	function cek_masa_berlaku_ta2($id_personal,$sub){
		$this->db->select('id_personal');
		$this->db->from('personal_sertifikat_ta_hapus');
		$this->db->where('id_personal',$id_personal);
		$this->db->where('id_sub_bidang',$sub);
		$this->db->where("tgl_cetak_pertama BETWEEN NOW() - interval '3-3' YEAR_MONTH AND NOW()", "", false);
		$query = $this->db->get();
		return $query->result_array();

	}
	function cek_masa_berlaku_ta($id_personal,$sub){
		$this->db->select('id_personal');
		$this->db->from('personal_sertifikat_ta_hapus');
		$this->db->where('id_personal',$id_personal);
		$this->db->where('id_sub_bidang',$sub);

		$query = $this->db->get();
		return $query->result_array();
	}

	function cek_masa_berlaku_ta_aktif2($id_personal,$sub){
		$this->db->select('id_personal');
		$this->db->from('personal_sertifikat_ta');
		$this->db->where('id_personal',$id_personal);
		$this->db->where('id_sub_bidang',$sub);
		$this->db->where("tgl_cetak_pertama BETWEEN NOW() - interval '3-3' YEAR_MONTH AND NOW()", "", false);

		$query = $this->db->get();
		return $query->result_array();

	}

	function cek_masa_berlaku_ta_aktif($id_personal,$sub){
		$this->db->select('id_personal');
		$this->db->from('personal_sertifikat_ta');
		$this->db->where('id_personal',$id_personal);
		$this->db->where('id_sub_bidang',$sub);

		$query = $this->db->get();
		return $query->result_array();

	}

	public function check_status2($id_personal,$tgl,$id_asosiasi)
	{
		$this->db->select('kualifikasi_profesi.Deskripsi_ahli AS kualifikasi_prov, unit_sertifikasi.nama AS unit_sertifikasi, propinsi.Nama AS prov, personal.Nama,tk_registrasi_history.ID_Personal, tk_registrasi_history.id_sub_bidang, tk_registrasi_history.ID_Asosiasi_profesi, tk_registrasi_history.id_Kualifikasi_profesi, tk_registrasi_history.Tahun, tk_registrasi_history.id_status, tk_registrasi_history.User_name, tk_registrasi_history.Tgl_proses, tk_registrasi_history.tgl_permohonan, tk_registrasi_history.Propinsi, tk_registrasi_history.id_unit_sertifikasi');
		$this->db->from('tk_registrasi_history');
		$this->db->join('personal','personal.id_personal = tk_registrasi_history.ID_Personal','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi = tk_registrasi_history.Propinsi','left');
		$this->db->join('unit_sertifikasi','unit_sertifikasi.id_unit_sertifikasi = tk_registrasi_history.id_unit_sertifikasi','left');
		$this->db->join('kualifikasi_profesi','kualifikasi_profesi.ID_Kualifikasi_Profesi = tk_registrasi_history.id_Kualifikasi_profesi','left');

		$this->db->where('tk_registrasi_history.ID_Personal',$id_personal);
		$this->db->where('tk_registrasi_history.tgl_permohonan',$tgl);
		$this->db->where('tk_registrasi_history.ID_Asosiasi_profesi',$id_asosiasi);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function check_status2_tt($id_personal,$tgl,$id_asosiasi)
	{
		$this->db->select('kualifikasi_profesi.Deskripsi_trampil AS kualifikasi_prov, unit_sertifikasi.nama AS unit_sertifikasi, propinsi.Nama AS prov, personal.Nama,tk_registrasi_history_tt.ID_Personal, tk_registrasi_history_tt.id_sub_bidang, tk_registrasi_history_tt.ID_Asosiasi_profesi, tk_registrasi_history_tt.id_Kualifikasi_profesi, tk_registrasi_history_tt.Tahun, tk_registrasi_history_tt.id_status, tk_registrasi_history_tt.User_name, tk_registrasi_history_tt.Tgl_proses, tk_registrasi_history_tt.tgl_permohonan, tk_registrasi_history_tt.Propinsi, tk_registrasi_history_tt.id_unit_sertifikasi');
		$this->db->from('tk_registrasi_history_tt');
		$this->db->join('personal','personal.id_personal = tk_registrasi_history_tt.ID_Personal','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi = tk_registrasi_history_tt.Propinsi','left');
		$this->db->join('unit_sertifikasi','unit_sertifikasi.id_unit_sertifikasi = tk_registrasi_history_tt.id_unit_sertifikasi','left');
		$this->db->join('kualifikasi_profesi','kualifikasi_profesi.ID_Kualifikasi_Profesi = tk_registrasi_history_tt.id_Kualifikasi_profesi','left');

		$this->db->where('tk_registrasi_history_tt.ID_Personal',$id_personal);
		$this->db->where('tk_registrasi_history_tt.tgl_permohonan',$tgl);
		$this->db->where('tk_registrasi_history_tt.ID_Asosiasi_profesi',$id_asosiasi);
		$query = $this->db->get();
		return $query->result_array();
	}

	function jumlah_message(){
		$propinsi=$this->session->userdata('id_propinsi');
		$id_asosiasi=$this->session->userdata('id_asosiasi');
		$id_user=$this->session->userdata('id_user');
		$this->db->where('tk_pds_mail_ta.ID_PROPINSI',$propinsi);
		if($this->ion_auth->ketualpjkprov_ta() OR $this->ion_auth->bapelpusat()){
			$this->db->where('tk_pds_mail_ta.ID_PDS',3);
		}elseif($this->ion_auth->usbupusat() OR $this->ion_auth->usbuprov()){
			$this->db->where('tk_pds_mail_ta.ID_PDS',4);
		}elseif($this->ion_auth->asosiasi_profesi_ta_propinsi()){
			$this->db->where('tk_pds_mail_ta.ID_PDS',1);
			$this->db->where('tk_pds_mail_ta.ID_ASOSIASI',$id_asosiasi);
		}elseif($this->ion_auth->asosiasi_profesi_ta_pusat()){
			$this->db->where('tk_pds_mail_ta.ID_PDS',2);
			$this->db->where('tk_pds_mail_ta.ID_ASOSIASI',$id_asosiasi);
		}
		$this->db->where("tk_pds_mail_ta.Status",0);
		$this->db->where("tk_pds_mail_ta.Read",0);
		$this->db->or_where('tk_pds_mail_ta.Id_Receive',$id_user);
		return $this->db->count_all_results("tk_pds_mail_ta");
	}

	function jumlah_message_tt(){
		$propinsi=$this->session->userdata('id_propinsi');
		$id_asosiasi=$this->session->userdata('id_asosiasi');
		$id_user=$this->session->userdata('id_user');
		$this->db->where('tk_pds_mail_tt.ID_PROPINSI',$propinsi);
		if($this->ion_auth->ketualpjkprov_tt() OR $this->ion_auth->bapelpusat()){
			$this->db->where('tk_pds_mail_tt.ID_PDS',3);
		}elseif($this->ion_auth->usbupusat() OR $this->ion_auth->usbuprov()){
			$this->db->where('tk_pds_mail_tt.ID_PDS',4);
		}elseif($this->ion_auth->asosiasi_profesi_tt_propinsi()){
			$this->db->where('tk_pds_mail_tt.ID_PDS',1);
			$this->db->where('tk_pds_mail_tt.ID_ASOSIASI',$id_asosiasi);
		}elseif($this->ion_auth->asosiasi_profesi_tt_pusat()){
			$this->db->where('tk_pds_mail_tt.ID_PDS',2);
			$this->db->where('tk_pds_mail_tt.ID_ASOSIASI',$id_asosiasi);
		}
		$this->db->where("tk_pds_mail_tt.Status",0);
		$this->db->or_where('tk_pds_mail_tt.Id_Receive',$id_user);
		return $this->db->count_all_results("tk_pds_mail_tt");
	}

	function get_message($id_record){
		$this->db->select('personal_profesi_ta.Nama as Nama_Asosiasi,tk_pds_deskripsi.Deskripsi as deskripsi_pds,personal.Nama as Nama_BU,tk_pds_group.Tgl_Permohonan,tk_pds_mail_ta.ID_RECORD,tk_pds_mail_ta.Tgl_Record,tk_pds_mail_ta.Read,tk_pds_mail_ta.ID_PDS,tk_pds_mail_ta.ID_ASOSIASI,tk_pds_mail_ta.Subject,tk_pds_mail_ta.ID_GROUP,tk_pds_mail_ta.Id_Sender,tk_pds_mail_ta.Text');
		$this->db->from('tk_pds_mail_ta');
		$this->db->join('tk_pds_deskripsi','tk_pds_deskripsi.ID_PDS=tk_pds_mail_ta.ID_PDS','left');
		$this->db->join('tk_pds_group','tk_pds_group.ID_GROUP=tk_pds_mail_ta.ID_GROUP','left');
		$this->db->join('personal','personal.ID_Personal=tk_pds_group.ID_PERSONAL','left');
		$this->db->join("personal_profesi_ta","tk_pds_group.ID_ASOSIASI = personal_profesi_ta.ID_asosiasi_Profesi","left");
		$this->db->where('tk_pds_mail_ta.ID_RECORD',$id_record);
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_message_tt($id_record){
		$this->db->select('personal_profesi_ta.Nama as Nama_Asosiasi,tk_pds_deskripsi.Deskripsi as deskripsi_pds,personal.Nama as Nama_BU,tk_pds_group.Tgl_Permohonan,tk_pds_mail_tt.ID_RECORD,tk_pds_mail_tt.Tgl_Record,tk_pds_mail_tt.Read,tk_pds_mail_tt.ID_PDS,tk_pds_mail_tt.ID_ASOSIASI,tk_pds_mail_tt.Subject,tk_pds_mail_tt.ID_GROUP,tk_pds_mail_tt.Id_Sender,tk_pds_mail_tt.Text');
		$this->db->from('tk_pds_mail_tt');
		$this->db->join('tk_pds_deskripsi','tk_pds_deskripsi.ID_PDS=tk_pds_mail_tt.ID_PDS','left');
		$this->db->join('tk_pds_group','tk_pds_group.ID_GROUP=tk_pds_mail_tt.ID_GROUP','left');
		$this->db->join('personal','personal.ID_Personal=tk_pds_group.ID_PERSONAL','left');
		$this->db->join("personal_profesi_ta","tk_pds_group.ID_ASOSIASI = personal_profesi_ta.ID_asosiasi_Profesi","left");
		$this->db->where('tk_pds_mail_tt.ID_RECORD',$id_record);
		$query = $this->db->get();
		return $query->result_array();
	}

	function read_message($id_record){
		$this->db->set('Read', 1);
		$this->db->where('ID_RECORD',$id_record);
		$this->db->update('tk_pds_mail_ta');
	}
	function read_message_tt($id_record){
		$this->db->set('Read', 1);
		$this->db->where('ID_RECORD',$id_record);
		$this->db->update('tk_pds_mail_tt');
	}

	function message($limit, $start){
		$propinsi=$this->session->userdata('id_propinsi');
		$id_asosiasi=$this->session->userdata('id_asosiasi');
		$id_user=$this->session->userdata('id_user');
		$this->db->limit($limit, $start);
		$this->db->select('personal_profesi_ta.Nama as Nama_Asosiasi,tk_pds_deskripsi.Deskripsi as deskripsi_pds,personal.Nama as Nama_BU,tk_pds_group.Tgl_Permohonan,tk_pds_mail_ta.ID_RECORD,tk_pds_mail_ta.Tgl_Record,tk_pds_mail_ta.Read,tk_pds_mail_ta.ID_PDS,tk_pds_mail_ta.ID_ASOSIASI,tk_pds_mail_ta.Subject,tk_pds_mail_ta.ID_GROUP,tk_pds_mail_ta.Id_Sender');
		$this->db->from('tk_pds_mail_ta');
		$this->db->join('tk_pds_deskripsi','tk_pds_deskripsi.ID_PDS=tk_pds_mail_ta.ID_PDS','left');
		$this->db->join('tk_pds_group','tk_pds_group.ID_GROUP=tk_pds_mail_ta.ID_GROUP','left');
		$this->db->join('personal','personal.ID_Personal=tk_pds_group.ID_PERSONAL','left');
		$this->db->join("personal_profesi_ta","tk_pds_group.ID_ASOSIASI = personal_profesi_ta.ID_asosiasi_Profesi","left");
		$this->db->where('tk_pds_mail_ta.ID_PROPINSI',$propinsi);

		if($this->ion_auth->ketualpjkprov_ta() OR $this->ion_auth->bapelpusat()){
			$this->db->where('tk_pds_mail_ta.ID_PDS',3);
		}elseif($this->ion_auth->ustkpusat() OR $this->ion_auth->ustkprov()){
			$this->db->where('tk_pds_mail_ta.ID_PDS',4);
		}elseif($this->ion_auth->asosiasi_profesi_ta_propinsi()){
			$this->db->where('tk_pds_mail_ta.ID_PDS',1);
			$this->db->where('tk_pds_mail_ta.ID_ASOSIASI',$id_asosiasi);
		}elseif($this->ion_auth->asosiasi_profesi_ta_pusat()){
			$this->db->where('tk_pds_mail_ta.ID_PDS',2);
			$this->db->where('tk_pds_mail_ta.ID_ASOSIASI',$id_asosiasi);
		}
		$this->db->where("tk_pds_mail_ta.Status",0);
		$this->db->or_where('tk_pds_mail_ta.Id_Receive',$id_user);

		$this->db->order_by("tk_pds_mail_ta.ID_RECORD", "desc");

		$query = $this->db->get();
		return $query->result_array();
	}

	function message_tt($limit, $start){
		$propinsi=$this->session->userdata('id_propinsi');
		$id_asosiasi=$this->session->userdata('id_asosiasi');
		$id_user=$this->session->userdata('id_user');
		$this->db->limit($limit, $start);
		$this->db->select('personal_profesi_ta.Nama as Nama_Asosiasi,tk_pds_deskripsi.Deskripsi as deskripsi_pds,personal.Nama as Nama_BU,tk_pds_group.Tgl_Permohonan,tk_pds_mail_tt.ID_RECORD,tk_pds_mail_tt.Tgl_Record,tk_pds_mail_tt.Read,tk_pds_mail_tt.ID_PDS,tk_pds_mail_tt.ID_ASOSIASI,tk_pds_mail_tt.Subject,tk_pds_mail_tt.ID_GROUP,tk_pds_mail_tt.Id_Sender');
		$this->db->from('tk_pds_mail_tt');
		$this->db->join('tk_pds_deskripsi','tk_pds_deskripsi.ID_PDS=tk_pds_mail_tt.ID_PDS','left');
		$this->db->join('tk_pds_group','tk_pds_group.ID_GROUP=tk_pds_mail_tt.ID_GROUP','left');
		$this->db->join('personal','personal.ID_Personal=tk_pds_group.ID_PERSONAL','left');
		$this->db->join("personal_profesi_ta","tk_pds_group.ID_ASOSIASI = personal_profesi_ta.ID_asosiasi_Profesi","left");
		$this->db->where('tk_pds_mail_tt.ID_PROPINSI',$propinsi);
		if($this->ion_auth->ketualpjkprov_tt() OR $this->ion_auth->bapelpusat()){
			$this->db->where('tk_pds_mail_tt.ID_PDS',3);
		}elseif($this->ion_auth->ustkpusat() OR $this->ion_auth->ustkprov()){
			$this->db->where('tk_pds_mail_tt.ID_PDS',4);
		}elseif($this->ion_auth->asosiasi_profesi_tt_propinsi()){
			$this->db->where('tk_pds_mail_tt.ID_PDS',1);
			$this->db->where('tk_pds_mail_tt.ID_ASOSIASI',$id_asosiasi);
		}elseif($this->ion_auth->asosiasi_profesi_tt_pusat()){
			$this->db->where('tk_pds_mail_tt.ID_PDS',2);
			$this->db->where('tk_pds_mail_tt.ID_ASOSIASI',$id_asosiasi);
		}
		$this->db->where("tk_pds_mail_tt.Status",0);
		$this->db->or_where('tk_pds_mail_tt.Id_Receive',$id_user);

		$this->db->order_by("tk_pds_mail_tt.ID_RECORD", "desc");

		$query = $this->db->get();
		return $query->result_array();
	}




	public function permohonan_propinsi($id_personal,$asosiasi,$tgl_permohonan){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('ID_Propinsi_reg,ID_Kualifikasi,ID_Sub_Bidang,ID_Asosiasi_Profesi,Tgl_Registrasi,id_permohonan');
		$otherdb->from('personal_reg_ta_kbli');
		$otherdb->where('ID_Personal',$id_personal);
		$otherdb->where('Tgl_Registrasi',$tgl_permohonan);
		$otherdb->where('ID_Asosiasi_Profesi',$asosiasi);
		$query = $otherdb->get();
		return $query->result_array();
	}
	public function permohonan_propinsi2($id_personal,$asosiasi,$tgl_permohonan,$bidang){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('ID_Propinsi_reg,ID_Kualifikasi,ID_Sub_Bidang,ID_Asosiasi_Profesi,Tgl_Registrasi,id_permohonan');
		$otherdb->from('personal_reg_ta_kbli');
		$otherdb->where('ID_Personal',$id_personal);
		$otherdb->where('Tgl_Registrasi',$tgl_permohonan);
		$otherdb->where('ID_Asosiasi_Profesi',$asosiasi);
		$otherdb->where('ID_Sub_Bidang',$bidang);
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function permohonan_propinsi_tt($id_personal,$asosiasi,$tgl_permohonan){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('ID_propinsi_reg');
		$otherdb->from('personal_reg_tt');
		$otherdb->where('ID_Personal',$id_personal);
		$otherdb->where('Tgl_Registrasi',$tgl_permohonan);
		$otherdb->where('ID_Asosiasi_Profesi',$asosiasi);
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function permohonan_propinsi_tt2($id_personal,$asosiasi,$tgl_permohonan,$bidang){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('ID_propinsi_reg,id_permohonan');
		$otherdb->from('personal_reg_tt');
		$otherdb->where('ID_Personal',$id_personal);
		$otherdb->where('Tgl_Registrasi',$tgl_permohonan);
		$otherdb->where('ID_Asosiasi_Profesi',$asosiasi);
		$otherdb->where('ID_Sub_Bidang',$bidang);
		$query = $otherdb->get();
		return $query->result_array();
	}

	function get_notification2(){
		$id_user=$this->session->userdata('id_user');
		$this->db->select('personal_profesi_ta.Nama as Nama_Asosiasi,tk_pds_history.ID_ASOSIASI');
		$this->db->from('tk_pds_history');
		$this->db->join('personal_profesi_ta','personal_profesi_ta.ID_Asosiasi_Profesi=tk_pds_history.ID_ASOSIASI','left');

		$this->db->where('tk_pds_history.Id_User',$id_user);
		$this->db->group_by('tk_pds_history.ID_ASOSIASI');
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_notification(){
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

	function revisi($id_record){
		$this->db->set('Status', 1);
		$this->db->set('Tgl_Record', date("Y-m-d_h:i:sa"));
		$this->db->where('ID_RECORD',$id_record);
		$this->db->update('tk_pds_history');

	}

	public function report_ta_ceklis(){
		$this->db->select('ID_Upload,Deskripsi');
		$this->db->from('tk_pds_upload');
		$this->db->where("ID_Upload NOT IN ('10','19','20','21','22')");
		$query = $this->db->get();
		return $query->result_array();
	}

	public function asosiasi_search($asosiasi){
		$this->db->select('ID_Asosiasi_Profesi,Nama');
		$this->db->from('personal_profesi_ta');
		$this->db->where('ID_Asosiasi_Profesi',$asosiasi);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function klasifikasi_ta_report($id_personal,$tgl,$asosiasi){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('kualifikasi_profesi.Deskripsi_ahli as ID_Kualifikasi,personal_reg_ta_kbli.id_permohonan,personal_profesi_ta.Nama as ID_Asosiasi_Profesi,personal.Nama, personal_reg_ta_kbli.ID_Personal,personal_reg_ta_kbli.ID_Sub_Bidang');
		$otherdb->from('personal_reg_ta_kbli');
		$otherdb->join('personal','personal.ID_Personal=personal_reg_ta_kbli.ID_Personal','left');
		$otherdb->join('personal_profesi_ta','personal_profesi_ta.ID_Asosiasi_Profesi=personal_reg_ta_kbli.ID_Asosiasi_Profesi','left');
		$otherdb->join('kualifikasi_profesi','kualifikasi_profesi.ID_Kualifikasi_Profesi=personal_reg_ta_kbli.ID_Kualifikasi','left');

		$otherdb->where('personal_reg_ta_kbli.ID_Personal',$id_personal);
		$otherdb->where('personal_reg_ta_kbli.Tgl_Registrasi',$tgl);
		$otherdb->where('personal_reg_ta_kbli.ID_Asosiasi_Profesi',$asosiasi);
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function klasifikasi_ta_report_terima($id_personal,$tgl,$asosiasi){

		$this->db->select('kualifikasi_profesi.Deskripsi_ahli as ID_Kualifikasi,personal_reg_ta_kbli.id_permohonan,personal_profesi_ta.Nama as ID_Asosiasi_Profesi,personal.Nama, personal_reg_ta_kbli.ID_Personal,personal_reg_ta_kbli.ID_Sub_Bidang');
		$this->db->from('personal_reg_ta_kbli');
		$this->db->join('tk_registrasi_history','personal_reg_ta_kbli.ID_Personal=tk_registrasi_history.ID_Personal AND tk_registrasi_history.id_sub_bidang=personal_reg_ta_kbli.ID_Sub_Bidang','left');
		$this->db->join('personal','personal.ID_Personal=personal_reg_ta_kbli.ID_Personal','left');
		$this->db->join('personal_profesi_ta','personal_profesi_ta.ID_Asosiasi_Profesi=personal_reg_ta_kbli.ID_Asosiasi_Profesi','left');
		$this->db->join('kualifikasi_profesi','kualifikasi_profesi.ID_Kualifikasi_Profesi=personal_reg_ta_kbli.ID_Kualifikasi','left');

		$this->db->where('personal_reg_ta_kbli.ID_Personal',$id_personal);
		$this->db->where('personal_reg_ta_kbli.Tgl_Registrasi',$tgl);
		$this->db->where('personal_reg_ta_kbli.ID_Asosiasi_Profesi',$asosiasi);
		$this->db->where('tk_registrasi_history.id_status','2');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function klasifikasi_tt_report($id_personal,$tgl,$asosiasi){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('kualifikasi_profesi.Deskripsi_trampil as ID_Kualifikasi,personal_reg_tt.id_permohonan,personal_profesi_ta.Nama as ID_Asosiasi_Profesi,personal.Nama, personal_reg_tt.ID_Personal,personal_reg_tt.ID_Sub_Bidang');
		$otherdb->from('personal_reg_tt');
		$otherdb->join('personal','personal.ID_Personal=personal_reg_tt.ID_Personal','left');
		$otherdb->join('personal_profesi_ta','personal_profesi_ta.ID_Asosiasi_Profesi=personal_reg_tt.ID_Asosiasi_Profesi','left');
		$otherdb->join('kualifikasi_profesi','kualifikasi_profesi.ID_Kualifikasi_Profesi=personal_reg_tt.ID_Kualifikasi','left');

		$otherdb->where('personal_reg_tt.ID_Personal',$id_personal);
		$otherdb->where('personal_reg_tt.Tgl_Registrasi',$tgl);
		$otherdb->where('personal_reg_tt.ID_Asosiasi_Profesi',$asosiasi);
		$query = $otherdb->get();
		return $query->result_array();
	}
	public function klasifikasi_tt_report_terima($id_personal,$tgl,$asosiasi){
		$this->db->select('kualifikasi_profesi.Deskripsi_trampil as ID_Kualifikasi,personal_reg_tt.id_permohonan,personal_profesi_ta.Nama as ID_Asosiasi_Profesi,personal.Nama, personal_reg_tt.ID_Personal,personal_reg_tt.ID_Sub_Bidang');
		$this->db->from('personal_reg_tt');
		$this->db->join('tk_registrasi_history_tt','personal_reg_tt.ID_Personal=tk_registrasi_history_tt.ID_Personal AND tk_registrasi_history_tt.id_sub_bidang=personal_reg_tt.ID_Sub_Bidang','left');

		$this->db->join('personal','personal.ID_Personal=personal_reg_tt.ID_Personal','left');
		$this->db->join('personal_profesi_ta','personal_profesi_ta.ID_Asosiasi_Profesi=personal_reg_tt.ID_Asosiasi_Profesi','left');
		$this->db->join('kualifikasi_profesi','kualifikasi_profesi.ID_Kualifikasi_Profesi=personal_reg_tt.ID_Kualifikasi','left');

		$this->db->where('personal_reg_tt.ID_Personal',$id_personal);
		$this->db->where('personal_reg_tt.Tgl_Registrasi',$tgl);
		$this->db->where('personal_reg_tt.ID_Asosiasi_Profesi',$asosiasi);
		$this->db->where('tk_registrasi_history_tt.id_status','3');
		$query = $this->db->get();
		return $query->result_array();
	}


	  public function pengalaman_proyek_report($id_personal){
	    $otherdb = $this->load->database('default2', TRUE);
	    $otherdb->select('personal_proyek.Proyek,personal_proyek.Nilai,personal_proyek.Tgl_Mulai,personal_proyek.Tgl_Selesai,personal_proyek.Jabatan,kabupaten.Nama as Lokasi');
	    $otherdb->from('personal_proyek');
			$otherdb->join('kabupaten','kabupaten.ID_Kabupaten=personal_proyek.Lokasi','left');
	    $otherdb->where('personal_proyek.id_personal',$id_personal);
			//$this->db->limit(10);
	    $query = $otherdb->get();
	    return $query->result_array();
	  }

	public function pengalaman_organisasi_report($id_personal){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('personal_pengalaman.Nama_Badan_Usaha,personal_pengalaman.Alamat,personal_pengalaman.Tgl_Mulai,personal_pengalaman.Tgl_Selesai,personal_pengalaman.Jabatan,personal_pengalaman.Role_Pekerjaan');

		$otherdb->from('personal_pengalaman');
		$otherdb->where('personal_pengalaman.ID_Personal',$id_personal);
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function kursus_report($id_personal){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('personal_kursus.Nama_Penyelenggara_Kursus,personal_kursus.Nama_Kursus,personal_kursus.Alamat1,personal_kursus.No_Sertifikat,kabupaten.Nama as ID_Kabupaten');
		$otherdb->from('personal_kursus');
		$otherdb->join('kabupaten','kabupaten.ID_Kabupaten=personal_kursus.ID_Kabupaten','left');

		$otherdb->where('personal_kursus.ID_Personal',$id_personal);
		$query = $otherdb->get();
		return $query->result_array();
	}
	public function pendidikan_report($id_personal){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('kabupaten.Nama as ID_Kabupaten,jenjang_pendidikan.Deskripsi as Jenjang,personal_pendidikan.Nama_Sekolah,personal_pendidikan.Jurusan,personal_pendidikan.Tahun,personal_pendidikan.No_Ijazah');
		$otherdb->from('personal_pendidikan');
		$otherdb->join('jenjang_pendidikan','personal_pendidikan.Jenjang=jenjang_pendidikan.ID_Jenjang','left');
		$otherdb->join('kabupaten','kabupaten.ID_Kabupaten=personal_pendidikan.ID_Kabupaten','left');

		$otherdb->where('personal_pendidikan.ID_Personal',$id_personal);
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function cek_3($id_personal,$asosiasi,$tgl){

		$this->db->distinct();
		$this->db->select('*');
		$this->db->from('tk_pds_ceklis');
		$this->db->where('ID_PERSONAL',$id_personal);
		$this->db->where('Tgl_Permohonan',$tgl);
		$this->db->where('ID_ASOSIASI',$asosiasi);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function tanggal_upload($id_personal,$asosiasi){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->distinct();
		$otherdb->select('personal_reg_ta_kbli.Tgl_Registrasi,personal_reg_ta_kbli.ID_Asosiasi_Profesi,personal_profesi_ta.Nama');
		$otherdb->from('personal_reg_ta_kbli');
		$otherdb->join('tk_registrasi_history','personal_reg_ta_kbli.ID_Personal=tk_registrasi_history.ID_Personal AND tk_registrasi_history.id_sub_bidang=personal_reg_ta_kbli.ID_Sub_Bidang','left');
		$otherdb->join('personal_profesi_ta','personal_profesi_ta.ID_Asosiasi_Profesi=personal_reg_ta_kbli.ID_Asosiasi_Profesi','left');
		$otherdb->where('personal_reg_ta_kbli.ID_Personal',$id_personal);
		$otherdb->where('personal_reg_ta_kbli.ID_Asosiasi_Profesi',$asosiasi);
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function tanggal_check($id_personal){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->distinct();
		$otherdb->select('personal_reg_ta_kbli.Tgl_Registrasi,personal_reg_ta_kbli.ID_Asosiasi_Profesi,personal_profesi_ta.Nama');
		$otherdb->from('personal_reg_ta_kbli');
		$otherdb->join('tk_registrasi_history','personal_reg_ta_kbli.ID_Personal=tk_registrasi_history.ID_Personal AND tk_registrasi_history.id_sub_bidang=personal_reg_ta_kbli.ID_Sub_Bidang','left');
		$otherdb->join('personal_profesi_ta','personal_profesi_ta.ID_Asosiasi_Profesi=personal_reg_ta_kbli.ID_Asosiasi_Profesi','left');
		$otherdb->where('personal_reg_ta_kbli.ID_Personal',$id_personal);
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function tanggal_check_tt($id_personal){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->distinct();
		$otherdb->select('personal_reg_tt.Tgl_Registrasi,personal_reg_tt.ID_Asosiasi_Profesi,personal_profesi_ta.Nama');
		$otherdb->from('personal_reg_tt');
		$otherdb->join('tk_registrasi_history_tt','personal_reg_tt.ID_Personal=tk_registrasi_history_tt.ID_Personal AND tk_registrasi_history_tt.id_sub_bidang=personal_reg_tt.ID_Sub_Bidang','left');
		$otherdb->join('personal_profesi_ta','personal_reg_tt.ID_Asosiasi_Profesi=personal_profesi_ta.ID_Asosiasi_Profesi','left');
		$otherdb->where('personal_reg_tt.ID_Personal',$id_personal);
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function tanggal_status($id_personal,$asosiasi,$tgl_permohonan){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->distinct();
		$otherdb->select('personal_reg_ta_kbli.Tgl_Registrasi,personal_reg_ta_kbli.ID_Asosiasi_Profesi,personal_profesi_ta.Nama');
		$otherdb->from('personal_reg_ta_kbli');
		$otherdb->join('tk_registrasi_history','personal_reg_ta_kbli.ID_Personal=tk_registrasi_history.ID_Personal AND tk_registrasi_history.id_sub_bidang=personal_reg_ta_kbli.ID_Sub_Bidang','left');
		$otherdb->join('personal_profesi_ta','personal_profesi_ta.ID_Asosiasi_Profesi=personal_reg_ta_kbli.ID_Asosiasi_Profesi','left');
		$otherdb->where('personal_reg_ta_kbli.ID_Personal',$id_personal);
		$otherdb->where('personal_reg_ta_kbli.ID_Asosiasi_Profesi',$asosiasi);
		$otherdb->where('tk_registrasi_history.id_status','99');

		$otherdb->where_not_in('personal_reg_ta_kbli.Tgl_Registrasi',$tgl_permohonan);
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function tanggal_status_tt($id_personal,$asosiasi){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->distinct();
		$otherdb->select('personal_reg_tt.Tgl_Registrasi,personal_reg_tt.ID_Asosiasi_Profesi,personal_profesi_ta.Nama');
		$otherdb->from('personal_reg_tt');
		$otherdb->join('tk_registrasi_history_tt','personal_reg_tt.ID_Personal=tk_registrasi_history_tt.ID_Personal AND tk_registrasi_history_tt.id_sub_bidang=personal_reg_tt.ID_Sub_Bidang','left');
		$otherdb->join('personal_profesi_ta','personal_profesi_ta.ID_Asosiasi_Profesi=personal_reg_tt.ID_Asosiasi_Profesi','left');
		$otherdb->where('personal_reg_tt.ID_Personal',$id_personal);
		$otherdb->where('personal_reg_tt.ID_Asosiasi_Profesi',$asosiasi);
		$otherdb->where('tk_registrasi_history_tt.id_status','99');
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function tanggal_upload_tt($id_personal,$asosiasi){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->distinct();
		$otherdb->select('personal_reg_tt.Tgl_Registrasi,personal_reg_tt.ID_Asosiasi_Profesi,personal_profesi_ta.Nama');
		$otherdb->from('personal_reg_tt');
		$otherdb->join('tk_registrasi_history','personal_reg_tt.ID_Personal=tk_registrasi_history.ID_Personal AND tk_registrasi_history.id_sub_bidang=personal_reg_tt.ID_Sub_Bidang','left');
		$otherdb->join('personal_profesi_ta','personal_profesi_ta.ID_Asosiasi_Profesi=personal_reg_tt.ID_Asosiasi_Profesi','left');
		$otherdb->where('personal_reg_tt.ID_Personal',$id_personal);
		$otherdb->where('personal_reg_tt.ID_Asosiasi_Profesi',$asosiasi);
		$query = $otherdb->get();
		return $query->result_array();
	}

	function get_pembayaran($id_personal,$tgl,$asosiasi){
		$this->db->select('ID_GROUP,(Kode_Pembayaran+Tagihan_Pembayaran) AS Tagihan,Kode_Pembayaran,Bukti_Pembayaran');
		$this->db->from('tk_pds_group');
		$this->db->where('ID_PERSONAL',$id_personal);
		$this->db->where('ID_ASOSIASI',$asosiasi);
		$this->db->where('Tgl_Permohonan',$tgl);
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_bill($id_personal,$asosiasi,$tgl,$id_jenis,$id_asing){
		$default2 = $this->load->database('default2', TRUE);
		$default2->select('personal_reg_ta_kbli.ID_Sub_Bidang,personal_reg_ta_kbli.ID_Kualifikasi,(profit_share_master.nilai_n+profit_share_master.nilai_p)*1000 AS Bill');
		$default2->from('personal_reg_ta_kbli');
		$default2->join('profit_share_master','profit_share_master.id_kualifikasi=personal_reg_ta_kbli.ID_Kualifikasi AND profit_share_master.id_permohonan=personal_reg_ta_kbli.id_permohonan','left');
		$default2->where('personal_reg_ta_kbli.ID_Personal',$id_personal);
		$default2->where('personal_reg_ta_kbli.ID_Asosiasi_Profesi',$asosiasi);
		$default2->where('personal_reg_ta_kbli.Tgl_Registrasi',$tgl);

		$default2->where('profit_share_master.id_jenis',$id_jenis);
		$default2->where('profit_share_master.id_asing',$id_asing);
		$default2->where('profit_share_master.id_proses','2');
		$default2->where('profit_share_master.id_program','1');

		$query = $default2->get();
		return $query->result_array();
	}


		function get_bill2($id_personal,$asosiasi,$tgl,$id_jenis,$id_asing,$bidang){
			$default2 = $this->load->database('default2', TRUE);
			$default2->select('personal_reg_ta_kbli.ID_Sub_Bidang,personal_reg_ta_kbli.ID_Kualifikasi,(profit_share_master.nilai_n+profit_share_master.nilai_p)*1000 AS Bill');
			$default2->from('personal_reg_ta_kbli');
			$default2->join('profit_share_master','profit_share_master.id_kualifikasi=personal_reg_ta_kbli.ID_Kualifikasi AND profit_share_master.id_permohonan=personal_reg_ta_kbli.id_permohonan','left');
			$default2->where('personal_reg_ta_kbli.ID_Personal',$id_personal);
			$default2->where('personal_reg_ta_kbli.ID_Asosiasi_Profesi',$asosiasi);
			$default2->where('personal_reg_ta_kbli.Tgl_Registrasi',$tgl);
			$default2->where('personal_reg_ta_kbli.ID_Sub_Bidang',$bidang);
			$default2->where('profit_share_master.id_jenis',$id_jenis);
			$default2->where('profit_share_master.id_asing',$id_asing);
			$default2->where('profit_share_master.id_proses','2');
			$default2->where('profit_share_master.id_program','1');

			$query = $default2->get();
			return $query->result_array();
		}

	function get_bill_tt($id_personal,$asosiasi,$tgl,$id_jenis,$id_asing){
		$default2 = $this->load->database('default2', TRUE);
		$default2->select('personal_reg_tt.ID_Sub_Bidang,personal_reg_tt.ID_Kualifikasi,(profit_share_master.nilai_n+profit_share_master.nilai_p)*1000 AS Bill');
		$default2->from('personal_reg_tt');
		$default2->join('profit_share_master','profit_share_master.id_kualifikasi=personal_reg_tt.ID_Kualifikasi AND profit_share_master.id_permohonan=personal_reg_tt.id_permohonan','left');
		$default2->where('personal_reg_tt.ID_Personal',$id_personal);
		$default2->where('personal_reg_tt.ID_Asosiasi_Profesi',$asosiasi);
		$default2->where('personal_reg_tt.Tgl_Registrasi',$tgl);

		$default2->where('profit_share_master.id_jenis',$id_jenis);
		$default2->where('profit_share_master.id_asing',$id_asing);
		$default2->where('profit_share_master.id_proses','2');
		$default2->where('profit_share_master.id_program','1');

		$query = $default2->get();
		return $query->result_array();
	}

	function get_jenis($id_bu){
		$default2 = $this->load->database('default2', TRUE);
		$default2->select('id_jenis_bu_kbli,id_bentuk_bu');
		$default2->from('bu');
		$default2->where('id_bu', $id_bu);
		$query = $default2->get();
		return $query->result_array();
	}


	function get_ibukota($propinsi){
		$this->db->select('Ibu_Kota_Propinsi');
		$this->db->from('propinsi');
		$this->db->where('ID_Propinsi',$propinsi);
		$query = $this->db->get();
		return $query->result_array();
	}
	function get_ketua($propinsi){
		$this->db->select('nama');
		$this->db->from('personal_ketua_ustk');
		$this->db->where('id_propinsi',$propinsi);
		$query = $this->db->get();
		return $query->result_array();
	}
	function check_kelayakan_ta($id_personal,$asosiasi,$tgl){
		$this->db->select('*');
		$this->db->from('asesor_nilai_tk_ta');
		$this->db->where('ID_Personal',$id_personal);
		$this->db->where('id_asosiasi_TK',$asosiasi);
		$this->db->where('tgl_permohonan',$tgl);

		$query = $this->db->get();
		return $query->result_array();
	}
	function check_kelayakan_ta_2($id_personal,$asosiasi,$tgl,$id_sub_bidang){
		$this->db->select('*');
		$this->db->from('asesor_nilai_tk_ta');
		$this->db->where('ID_Personal',$id_personal);
		$this->db->where('id_asosiasi_TK',$asosiasi);
		$this->db->where('tgl_permohonan',$tgl);
		$this->db->where('id_sub_bidang',$id_sub_bidang);
		$query = $this->db->get();
		return $query->result_array();
	}

	function check_kelayakan_tt($id_personal,$asosiasi,$tgl,$id_sub_bidang){
		$this->db->select('*');
		$this->db->from('asesor_nilai_tk_tt');
		$this->db->where('ID_Personal',$id_personal);
		$this->db->where('id_asosiasi_TK',$asosiasi);
		$this->db->where('tgl_permohonan',$tgl);
		$this->db->where('id_sub_bidang',$id_sub_bidang);
		$query = $this->db->get();
		return $query->result_array();
	}

	function report_asesor_ta($id_personal,$asosiasi,$tgl){
		$this->db->select('asesor_nilai_tk_ta.id_sub_bidang,asesor_nilai_tk_ta.Tgl_penilaian,kualifikasi_profesi.Deskripsi_ahli,personal.Nama,propinsi.Nama as nama_propinsi,substr(asesor_nilai_tk_ta.ID_Sub_Bidang,1,2),bidang_klasifikasi_profesi.Deskripsi');
		$this->db->from('asesor_nilai_tk_ta');
		$this->db->join('personal','personal.id_personal=asesor_nilai_tk_ta.ID_Personal','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi=asesor_nilai_tk_ta.propinsi','left');
		$this->db->join('bidang_klasifikasi_profesi','bidang_klasifikasi_profesi.ID_Bidang_Profesi=substr(asesor_nilai_tk_ta.ID_Sub_Bidang,1,2)','left');
		$this->db->join('kualifikasi_profesi','kualifikasi_profesi.ID_Kualifikasi_Profesi=asesor_nilai_tk_ta.kualifikasi','left');
		$this->db->where('asesor_nilai_tk_ta.ID_Personal',$id_personal);
		$this->db->where('asesor_nilai_tk_ta.id_asosiasi_TK',$asosiasi);
		$this->db->where('asesor_nilai_tk_ta.tgl_permohonan',$tgl);
		$query = $this->db->get();
		return $query->result_array();
	}
	function report_asesor_ta_kelayakan($id_personal,$asosiasi,$tgl,$id_sub_bidang){
		$this->db->select('asesor_nilai_tk_ta.id_sub_bidang,asesor_nilai_tk_ta.Tgl_penilaian,kualifikasi_profesi.Deskripsi_ahli,personal.Nama,propinsi.Nama as nama_propinsi,substr(asesor_nilai_tk_ta.ID_Sub_Bidang,1,2),bidang_klasifikasi_profesi.Deskripsi');
		$this->db->from('asesor_nilai_tk_ta');
		$this->db->join('personal','personal.id_personal=asesor_nilai_tk_ta.ID_Personal','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi=asesor_nilai_tk_ta.propinsi','left');
		$this->db->join('bidang_klasifikasi_profesi','bidang_klasifikasi_profesi.ID_Bidang_Profesi=substr(asesor_nilai_tk_ta.ID_Sub_Bidang,1,2)','left');
		$this->db->join('kualifikasi_profesi','kualifikasi_profesi.ID_Kualifikasi_Profesi=asesor_nilai_tk_ta.kualifikasi','left');
		$this->db->where('asesor_nilai_tk_ta.ID_Personal',$id_personal);
		$this->db->where('asesor_nilai_tk_ta.id_asosiasi_TK',$asosiasi);
		$this->db->where('asesor_nilai_tk_ta.tgl_permohonan',$tgl);
		$this->db->where('asesor_nilai_tk_ta.id_sub_bidang',$id_sub_bidang);
		$query = $this->db->get();
		return $query->result_array();
	}
	function report_asesor_ta2($id_personal,$asosiasi,$tgl,$id_sub_bidang){
		$this->db->select('asesor_nilai_tk_ta.id_sub_bidang,asesor_nilai_tk_ta.Tgl_penilaian,kualifikasi_profesi.Deskripsi_ahli,personal.Nama,propinsi.Nama as nama_propinsi,substr(asesor_nilai_tk_ta.ID_Sub_Bidang,1,2),bidang_klasifikasi_profesi.Deskripsi');
		$this->db->from('asesor_nilai_tk_ta');
		$this->db->join('personal','personal.id_personal=asesor_nilai_tk_ta.ID_Personal','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi=asesor_nilai_tk_ta.propinsi','left');
		$this->db->join('bidang_klasifikasi_profesi','bidang_klasifikasi_profesi.ID_Bidang_Profesi=substr(asesor_nilai_tk_ta.ID_Sub_Bidang,1,2)','left');
		$this->db->join('kualifikasi_profesi','kualifikasi_profesi.ID_Kualifikasi_Profesi=asesor_nilai_tk_ta.kualifikasi','left');
		$this->db->where('asesor_nilai_tk_ta.ID_Personal',$id_personal);
		$this->db->where('asesor_nilai_tk_ta.id_asosiasi_TK',$asosiasi);
		$this->db->where('asesor_nilai_tk_ta.tgl_permohonan',$tgl);
		$this->db->where('asesor_nilai_tk_ta.id_sub_bidang',$id_sub_bidang);
		$this->db->group_by("asesor_nilai_tk_ta.id_sub_bidang");
		$query = $this->db->get();
		return $query->result_array();
	}

	function report_asesor_tt($id_personal,$asosiasi,$tgl){
		$this->db->select('asesor_nilai_tk_tt.id_sub_bidang,asesor_nilai_tk_tt.Tgl_penilaian,kualifikasi_profesi.Deskripsi_trampil,personal.Nama,propinsi.Nama as nama_propinsi,substr(asesor_nilai_tk_tt.ID_Sub_Bidang,1,2),bidang_klasifikasi_profesi.Deskripsi');
		$this->db->from('asesor_nilai_tk_tt');
		$this->db->join('personal','personal.id_personal=asesor_nilai_tk_tt.ID_Personal','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi=asesor_nilai_tk_tt.propinsi','left');
		$this->db->join('bidang_klasifikasi_profesi','bidang_klasifikasi_profesi.ID_Bidang_Profesi=substr(asesor_nilai_tk_tt.ID_Sub_Bidang,1,2)','left');
		$this->db->join('kualifikasi_profesi','kualifikasi_profesi.ID_Kualifikasi_Profesi=asesor_nilai_tk_tt.kualifikasi','left');
		$this->db->where('asesor_nilai_tk_tt.ID_Personal',$id_personal);
		$this->db->where('asesor_nilai_tk_tt.id_asosiasi_TK',$asosiasi);
		$this->db->where('asesor_nilai_tk_tt.tgl_permohonan',$tgl);
		$query = $this->db->get();
		return $query->result_array();
	}

	function report_asesor_tt_kelayakan($id_personal,$asosiasi,$tgl,$sub_bidang){
		$this->db->select('asesor_nilai_tk_tt.id_sub_bidang,asesor_nilai_tk_tt.Tgl_penilaian,kualifikasi_profesi.Deskripsi_trampil,personal.Nama,propinsi.Nama as nama_propinsi,substr(asesor_nilai_tk_tt.ID_Sub_Bidang,1,2),bidang_klasifikasi_profesi.Deskripsi');
		$this->db->from('asesor_nilai_tk_tt');
		$this->db->join('personal','personal.id_personal=asesor_nilai_tk_tt.ID_Personal','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi=asesor_nilai_tk_tt.propinsi','left');
		$this->db->join('bidang_klasifikasi_profesi','bidang_klasifikasi_profesi.ID_Bidang_Profesi=substr(asesor_nilai_tk_tt.ID_Sub_Bidang,1,2)','left');
		$this->db->join('kualifikasi_profesi','kualifikasi_profesi.ID_Kualifikasi_Profesi=asesor_nilai_tk_tt.kualifikasi','left');
		$this->db->where('asesor_nilai_tk_tt.ID_Personal',$id_personal);
		$this->db->where('asesor_nilai_tk_tt.id_asosiasi_TK',$asosiasi);
		$this->db->where('asesor_nilai_tk_tt.tgl_permohonan',$tgl);
		$this->db->where('asesor_nilai_tk_tt.id_sub_bidang',$sub_bidang);
			$this->db->group_by("asesor_nilai_tk_tt.id_sub_bidang");
		$query = $this->db->get();
		return $query->result_array();
	}


	function report_asesor_tt2($id_personal,$asosiasi,$tgl){
		$this->db->select('asesor_nilai_tk_tt.id_sub_bidang,asesor_nilai_tk_tt.Tgl_penilaian,kualifikasi_profesi.Deskripsi_trampil,personal.Nama,propinsi.Nama as nama_propinsi,substr(asesor_nilai_tk_tt.ID_Sub_Bidang,1,2),bidang_klasifikasi_profesi.Deskripsi');
		$this->db->from('asesor_nilai_tk_tt');
		$this->db->join('personal','personal.id_personal=asesor_nilai_tk_tt.ID_Personal','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi=asesor_nilai_tk_tt.propinsi','left');
		$this->db->join('bidang_klasifikasi_profesi','bidang_klasifikasi_profesi.ID_Bidang_Profesi=substr(asesor_nilai_tk_tt.ID_Sub_Bidang,1,2)','left');
		$this->db->join('kualifikasi_profesi','kualifikasi_profesi.ID_Kualifikasi_Profesi=asesor_nilai_tk_tt.kualifikasi','left');
		$this->db->where('asesor_nilai_tk_tt.ID_Personal',$id_personal);
		$this->db->where('asesor_nilai_tk_tt.id_asosiasi_TK',$asosiasi);
		$this->db->where('asesor_nilai_tk_tt.tgl_permohonan',$tgl);
		$this->db->group_by("asesor_nilai_tk_tt.id_sub_bidang");

		$query = $this->db->get();
		return $query->result_array();
	}

	function check_status($id_personal,$tgl,$asosiasi,$status){
		$this->db->select('id_status');
		$this->db->from('tk_registrasi_history');
		$this->db->where('ID_Personal',$id_personal);
		$this->db->where('ID_Asosiasi_profesi',$asosiasi);
		$this->db->where('tgl_permohonan',$tgl);
		$this->db->where('id_status',$status);
		$query = $this->db->get();
		return $query->result_array();
	}
	function check_status_kelayakan($id_personal,$tgl,$asosiasi,$status,$id_sub_bidang){
		$this->db->select('id_status');
		$this->db->from('tk_registrasi_history');
		$this->db->where('ID_Personal',$id_personal);
		$this->db->where('ID_Asosiasi_profesi',$asosiasi);
		$this->db->where('tgl_permohonan',$tgl);
		$this->db->where('id_status',$status);
		$this->db->where('id_sub_bidang',$id_sub_bidang);
		$query = $this->db->get();
		return $query->result_array();
	}

	function klasifikasi_kualifikasi_status($id_personal,$tgl,$asosiasi){
		$this->db->select('ID_Personal,id_status,id_sub_bidang,ID_Asosiasi_profesi,tgl_permohonan,id_Kualifikasi_profesi');
		$this->db->from('tk_registrasi_history');
		$this->db->where('ID_Personal',$id_personal);
		$this->db->where('ID_Asosiasi_profesi',$asosiasi);
		$this->db->where('tgl_permohonan',$tgl);
		$query = $this->db->get();
		return $query->result_array();
	}
	function klasifikasi_kualifikasi_status_tt($id_personal,$tgl,$asosiasi){
		$this->db->select('ID_Personal,id_status,id_sub_bidang,ID_Asosiasi_profesi,tgl_permohonan,id_Kualifikasi_profesi');
		$this->db->from('tk_registrasi_history_tt');
		$this->db->where('ID_Personal',$id_personal);
		$this->db->where('ID_Asosiasi_profesi',$asosiasi);
		$this->db->where('tgl_permohonan',$tgl);
		$query = $this->db->get();
		return $query->result_array();
	}

	function check_status_tt($id_personal,$tgl,$asosiasi,$status){
		$this->db->select('id_status');
		$this->db->from('tk_registrasi_history_tt');
		$this->db->where('ID_Personal',$id_personal);
		$this->db->where('ID_Asosiasi_profesi',$asosiasi);
		$this->db->where('tgl_permohonan',$tgl);
		$this->db->where('id_status',$status);
		$query = $this->db->get();
		return $query->result_array();
	}
	function check_status_tt2($id_personal,$tgl,$asosiasi,$status,$id_sub_bidang){
		$this->db->select('id_status');
		$this->db->from('tk_registrasi_history_tt');
		$this->db->where('ID_Personal',$id_personal);
		$this->db->where('ID_Asosiasi_profesi',$asosiasi);
		$this->db->where('tgl_permohonan',$tgl);
		$this->db->where('id_status',$status);
		$this->db->where('id_sub_bidang',$id_sub_bidang);
		$query = $this->db->get();
		return $query->result_array();
	}

	function read_mail($id_record){
		$this->db->set('Read', 1);
		$this->db->where('ID_RECORD',$id_record);
		$this->db->update('tk_pds_history');
	}
	function check_kelayakan_bu($id_personal,$asosiasi,$tgl){
		$this->db->select('*');
		$this->db->from('asesor_nilai_tk_ta');
		$this->db->where('ID_Personal',$id_personal);
		$this->db->where('id_asosiasi_TK',$asosiasi);
		$this->db->where('tgl_permohonan',$tgl);
		$query = $this->db->get();
		return $query->result_array();
	}

	function cek($id_personal,$tgl,$id_status,$asosiasi){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->distinct();
		$otherdb->select('*');
		$otherdb->from('tk_registrasi_history');
		$otherdb->where('tk_registrasi_history.ID_Personal',$id_personal);
		$otherdb->where('tk_registrasi_history.id_status',$id_status);
		$otherdb->where('tk_registrasi_history.tgl_permohonan',$tgl);
		$otherdb->where('tk_registrasi_history.ID_Asosiasi_profesi',$asosiasi);
		$query = $otherdb->get();
		return $query->result_array();
	}

	function cek2($id_personal,$tgl,$id_status,$asosiasi,$bidang){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->distinct();
		$otherdb->select('*');
		$otherdb->from('tk_registrasi_history');
		$otherdb->where('tk_registrasi_history.ID_Personal',$id_personal);
		$otherdb->where('tk_registrasi_history.id_status',$id_status);
		$otherdb->where('tk_registrasi_history.tgl_permohonan',$tgl);
		$otherdb->where('tk_registrasi_history.ID_Asosiasi_profesi',$asosiasi);
		$otherdb->where('tk_registrasi_history.id_sub_bidang',$bidang);
		$query = $otherdb->get();
		return $query->result_array();
	}
	function tanggal_cek_0($id_personal,$asosiasi,$tgl_permohonan){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->distinct();
		$otherdb->select('tgl_permohonan');
		$otherdb->from('tk_registrasi_history');
		$otherdb->where('tk_registrasi_history.ID_Personal',$id_personal);
		$otherdb->where('tk_registrasi_history.id_status','0');
		$otherdb->where('tk_registrasi_history.ID_Asosiasi_profesi',$asosiasi);
		$otherdb->where('tk_registrasi_history.tgl_permohonan',$tgl_permohonan);
		$query = $otherdb->get();
		return $query->result_array();
	}

		function tanggal_cek_02($id_personal,$asosiasi){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->distinct();
		$otherdb->select('tgl_permohonan');
		$otherdb->from('tk_registrasi_history');
		$otherdb->where('tk_registrasi_history.ID_Personal',$id_personal);
		$otherdb->where('tk_registrasi_history.id_status','0');
		$otherdb->where('tk_registrasi_history.ID_Asosiasi_profesi',$asosiasi);
		$query = $otherdb->get();
		return $query->result_array();
	}

	function tanggal_cek_0_tt($id_personal,$asosiasi){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->distinct();
		$otherdb->select('*');
		$otherdb->from('tk_registrasi_history_tt');
		$otherdb->where('tk_registrasi_history_tt.ID_Personal',$id_personal);
		$otherdb->where('tk_registrasi_history_tt.id_status','0');
		$otherdb->where('tk_registrasi_history_tt.ID_Asosiasi_profesi',$asosiasi);
		$query = $otherdb->get();
		return $query->result_array();
	}

	function cek_tt_2($id_bu,$tgl,$id_status,$asosiasi,$bidang){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->distinct();
		$otherdb->select('*');
		$otherdb->from('tk_registrasi_history_tt');
		$otherdb->where('tk_registrasi_history_tt.ID_Personal',$id_bu);
		$otherdb->where('tk_registrasi_history_tt.id_status',$id_status);
		$otherdb->where('tk_registrasi_history_tt.tgl_permohonan',$tgl);
		$otherdb->where('tk_registrasi_history_tt.ID_Asosiasi_profesi',$asosiasi);
		$otherdb->where('tk_registrasi_history_tt.id_sub_bidang',$bidang);
		$query = $otherdb->get();
		return $query->result_array();
	}

	function cek_tt($id_bu,$tgl,$id_status,$asosiasi){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->distinct();
		$otherdb->select('*');
		$otherdb->from('tk_registrasi_history_tt');
		$otherdb->where('tk_registrasi_history_tt.ID_Personal',$id_bu);
		$otherdb->where('tk_registrasi_history_tt.id_status',$id_status);
		$otherdb->where('tk_registrasi_history_tt.tgl_permohonan',$tgl);
		$otherdb->where('tk_registrasi_history_tt.ID_Asosiasi_profesi',$asosiasi);
		$query = $otherdb->get();
		return $query->result_array();
	}
	function get_mail($id_record){
		$this->db->select('tk_pds_history.Option1,tk_pds_history.Option2,personal.Nama,tk_pds_history.Read,tk_pds_deskripsi.Deskripsi as Deskripsi2,tk_pds_upload.Deskripsi,tk_pds_history.ID_RECORD,tk_pds_history.ID_PERSONAL,tk_pds_history.ID_PDS,tk_pds_history.ID_ASOSIASI,tk_pds_history.ID_UPLOAD,tk_pds_history.Id_User,tk_pds_history.Tgl_Record,tk_pds_history.Ket');
		$this->db->from('tk_pds_history');
		$this->db->join('personal','personal.id_personal=tk_pds_history.ID_PERSONAL','left');
		$this->db->join('tk_pds_upload','tk_pds_history.ID_UPLOAD=tk_pds_upload.ID_Upload','left');
		$this->db->join('tk_pds_deskripsi','tk_pds_history.ID_PDS=tk_pds_deskripsi.ID_PDS','left');
		$this->db->where('tk_pds_history.ID_RECORD',$id_record);
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_mail2($id_record){
		$this->db->select('*');
		$this->db->from('tk_pds_history');

		$this->db->where('tk_pds_history.ID_RECORD',$id_record);
		$query = $this->db->get();
		return $query->result_array();
	}
	function get_current_page_records_ta($limit, $start){
		$propinsi=$this->session->userdata('id_propinsi');
		$id_asosiasi=$this->session->userdata('id_asosiasi');
		$this->db->limit($limit, $start);
		$this->db->select('personal.Nama,tk_pds_history.Read,tk_pds_deskripsi.Deskripsi as Deskripsi2,tk_pds_upload.Deskripsi,tk_pds_history.ID_RECORD,tk_pds_history.ID_PERSONAL,tk_pds_history.ID_PDS,tk_pds_history.ID_ASOSIASI,tk_pds_history.ID_UPLOAD,tk_pds_history.Id_User,tk_pds_history.Tgl_Record,tk_pds_history.Ket');
		$this->db->from('tk_pds_history');
		$this->db->join('personal_reg_ta_kbli','tk_pds_history.ID_Personal=personal_reg_ta_kbli.ID_Personal AND tk_pds_history.ID_ASOSIASI=personal_reg_ta_kbli.ID_Asosiasi_Profesi','left');
		$this->db->join('tk_pds_upload','tk_pds_history.ID_UPLOAD=tk_pds_upload.ID_Upload','left');
		$this->db->join('tk_pds_deskripsi','tk_pds_history.ID_PDS=tk_pds_deskripsi.ID_PDS','left');
		$this->db->join('personal','tk_pds_history.ID_PERSONAl=personal.id_personal','left');
		if($this->ion_auth->asosiasi_profesi_ta_propinsi()){

			$this->db->where('tk_pds_history.ID_ASOSIASI',$id_asosiasi);
			$this->db->where('personal_reg_ta_kbli.ID_Propinsi_reg',$propinsi);
		}else{
			$this->db->where('tk_pds_history.ID_ASOSIASI',$id_asosiasi);
		}
		$this->db->where('tk_pds_history.Status',0);
		$this->db->order_by("tk_pds_history.ID_RECORD", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}
	function get_current_page_records_tt($limit, $start){
		$propinsi=$this->session->userdata('id_propinsi');
		$id_asosiasi=$this->session->userdata('id_asosiasi');
		$this->db->limit($limit, $start);
		$this->db->select('tk_pds_history.Read,tk_pds_deskripsi.Deskripsi as Deskripsi2,tk_pds_upload.Deskripsi,tk_pds_history.ID_RECORD,tk_pds_history.ID_PERSONAL,tk_pds_history.ID_PDS,tk_pds_history.ID_ASOSIASI,tk_pds_history.ID_UPLOAD,tk_pds_history.Id_User,tk_pds_history.Tgl_Record,tk_pds_history.Ket');
		$this->db->from('tk_pds_history');
		$this->db->join('personal_reg_tt','tk_pds_history.ID_Personal=personal_reg_tt.ID_Personal AND tk_pds_history.ID_ASOSIASI=personal_reg_tt.ID_Asosiasi_Profesi','left');

		$this->db->join('tk_pds_upload','tk_pds_history.ID_UPLOAD=tk_pds_upload.ID_Upload','left');
		$this->db->join('tk_pds_deskripsi','tk_pds_history.ID_PDS=tk_pds_deskripsi.ID_PDS','left');
		$this->db->join('personal','tk_pds_history.ID_PERSONAl=personal.id_personal','left');
		if($this->ion_auth->asosiasi_profesi_tt_propinsi()){

			$this->db->where('tk_pds_history.ID_ASOSIASI',$id_asosiasi);
			$this->db->where('personal_reg_tt.ID_propinsi_reg',$propinsi);
		}else{
			$this->db->where('tk_pds_history.ID_ASOSIASI',$id_asosiasi);
		}
		$this->db->where('tk_pds_history.Status',0);
		$this->db->where('personal.Tenaga_Kerja','TRAMPIL');
		$this->db->order_by("tk_pds_history.ID_RECORD", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_total_tt()
	{
			return $this->db->count_all("tk_pds_history");
	}
	public function get_total_ta()
	{
			return $this->db->count_all("tk_pds_history");
	}


	function upload_biodata_ta($id_personal){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="INSERT IGNORE INTO $database.personal(id_personal,No_KTP,Nama,nama_tanpa_gelar,Alamat1,Kodepos,ID_Kabupaten_Alamat,Tgl_Lahir,jenis_kelamin,Tempat_Lahir,ID_Kabupaten_Lahir,ID_Propinsi,email,no_hp,npwp,nm_ibu_kandung,Tenaga_Kerja,id_Asosiasi,username,tgl_update,password,id_bu,id_user_update,ID_Negara,persyaratan_4,persyaratan_5,persyaratan_8,persyaratan_11,persyaratan_12,persyaratan_19,persyaratan_20,persyaratan_21) SELECT id_personal,No_KTP,Nama,nama_tanpa_gelar,Alamat1,Kodepos,ID_Kabupaten_Alamat,Tgl_Lahir,jenis_kelamin,Tempat_Lahir,ID_Kabupaten_Lahir,ID_Propinsi,email,no_hp,npwp,nm_ibu_kandung,Tenaga_Kerja,id_Asosiasi,username,tgl_update,password,id_bu,id_user_update,ID_Negara,persyaratan_4,persyaratan_5,persyaratan_8,persyaratan_11,persyaratan_12,persyaratan_19,persyaratan_20,persyaratan_21 FROM $database2.personal";
		$where="WHERE id_personal='$id_personal'";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function upload_biodata_ta_replace($id_personal){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="REPLACE INTO $database.personal(id_personal,No_KTP,Nama,nama_tanpa_gelar,Alamat1,Kodepos,ID_Kabupaten_Alamat,Tgl_Lahir,jenis_kelamin,Tempat_Lahir,ID_Kabupaten_Lahir,ID_Propinsi,email,no_hp,npwp,nm_ibu_kandung,Tenaga_Kerja,id_Asosiasi,username,tgl_update,password,id_bu,id_user_update,ID_Negara,persyaratan_4,persyaratan_5,persyaratan_8,persyaratan_11,persyaratan_12,persyaratan_19,persyaratan_20,persyaratan_21) SELECT id_personal,No_KTP,Nama,nama_tanpa_gelar,Alamat1,Kodepos,ID_Kabupaten_Alamat,Tgl_Lahir,jenis_kelamin,Tempat_Lahir,ID_Kabupaten_Lahir,ID_Propinsi,email,no_hp,npwp,nm_ibu_kandung,Tenaga_Kerja,id_Asosiasi,username,tgl_update,password,id_bu,id_user_update,ID_Negara,persyaratan_4,persyaratan_5,persyaratan_8,persyaratan_11,persyaratan_12,persyaratan_19,persyaratan_20,persyaratan_21 FROM $database2.personal";
		$where="WHERE id_personal='$id_personal'";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}
	function personal_dukcapil_sad($id_personal){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="REPLACE INTO personal_dukcapil(id_personal,No_KTP,Nama,nama_tanpa_gelar,Alamat1,Kodepos,ID_Kabupaten_Alamat,Tgl_Lahir,jenis_kelamin,Tempat_Lahir,ID_Kabupaten_Lahir,ID_Propinsi,email,no_hp,npwp,nm_ibu_kandung,Tenaga_Kerja,id_Asosiasi,username,tgl_update,password,id_bu,id_user_update,ID_Negara,persyaratan_4,persyaratan_5,persyaratan_8,persyaratan_11,persyaratan_12,persyaratan_19,persyaratan_20,persyaratan_21) SELECT id_personal,No_KTP,Nama,nama_tanpa_gelar,Alamat1,Kodepos,ID_Kabupaten_Alamat,Tgl_Lahir,jenis_kelamin,Tempat_Lahir,ID_Kabupaten_Lahir,ID_Propinsi,email,no_hp,npwp,nm_ibu_kandung,Tenaga_Kerja,id_Asosiasi,username,tgl_update,password,id_bu,id_user_update,ID_Negara,persyaratan_4,persyaratan_5,persyaratan_8,persyaratan_11,persyaratan_12,persyaratan_19,persyaratan_20,persyaratan_21 FROM personal";
		$where="WHERE id_personal='$id_personal'";
		$default2->query("$select $where");
		if ($default2->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function personal_dukcapil($id_personal){
		$select="REPLACE INTO personal_dukcapil(id_personal,No_KTP,Nama,nama_tanpa_gelar,Alamat1,Kodepos,ID_Kabupaten_Alamat,Tgl_Lahir,jenis_kelamin,Tempat_Lahir,ID_Kabupaten_Lahir,ID_Propinsi,email,no_hp,npwp,nm_ibu_kandung,Tenaga_Kerja,id_Asosiasi,username,tgl_update,password,id_bu,id_user_update,ID_Negara,persyaratan_4,persyaratan_5,persyaratan_8,persyaratan_11,persyaratan_12,persyaratan_19,persyaratan_20,persyaratan_21) SELECT id_personal,No_KTP,Nama,nama_tanpa_gelar,Alamat1,Kodepos,ID_Kabupaten_Alamat,Tgl_Lahir,jenis_kelamin,Tempat_Lahir,ID_Kabupaten_Lahir,ID_Propinsi,email,no_hp,npwp,nm_ibu_kandung,Tenaga_Kerja,id_Asosiasi,username,tgl_update,password,id_bu,id_user_update,ID_Negara,persyaratan_4,persyaratan_5,persyaratan_8,persyaratan_11,persyaratan_12,persyaratan_19,persyaratan_20,persyaratan_21 FROM personal";
		$where="WHERE id_personal='$id_personal'";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function download_biodata_ta_replace($id_personal){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="REPLACE INTO $database2.personal(id_personal,No_KTP,Nama,nama_tanpa_gelar,Alamat1,Kodepos,ID_Kabupaten_Alamat,Tgl_Lahir,jenis_kelamin,Tempat_Lahir,ID_Kabupaten_Lahir,ID_Propinsi,email,no_hp,npwp,nm_ibu_kandung,Tenaga_Kerja,id_Asosiasi,username,tgl_update,password,id_bu,id_user_update,ID_Negara,persyaratan_4,persyaratan_5,persyaratan_8,persyaratan_11,persyaratan_12,persyaratan_19,persyaratan_20,persyaratan_21) SELECT id_personal,No_KTP,Nama,nama_tanpa_gelar,Alamat1,Kodepos,ID_Kabupaten_Alamat,Tgl_Lahir,jenis_kelamin,Tempat_Lahir,ID_Kabupaten_Lahir,ID_Propinsi,email,no_hp,npwp,nm_ibu_kandung,Tenaga_Kerja,id_Asosiasi,username,tgl_update,password,id_bu,id_user_update,ID_Negara,persyaratan_4,persyaratan_5,persyaratan_8,persyaratan_11,persyaratan_12,persyaratan_19,persyaratan_20,persyaratan_21 FROM $database.personal";
		$where="WHERE id_personal='$id_personal'";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function upload_biodata_ta_asing($id_personal){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="INSERT IGNORE INTO $database.personal(id_personal,No_KTP,Nama,nama_tanpa_gelar,Alamat1,Kodepos,ID_Kabupaten_Alamat,Tgl_Lahir,Tempat_Lahir,ID_Kabupaten_Lahir,ID_Propinsi,npwp,nm_ibu_kandung,Tenaga_Kerja,id_Asosiasi,username,tgl_update,password,id_bu,id_user_update,ID_Negara,persyaratan_4,persyaratan_5,persyaratan_8,persyaratan_11,persyaratan_12,persyaratan_19,persyaratan_20,persyaratan_21) SELECT id_personal,No_KTP,Nama,nama_tanpa_gelar,Alamat1,Kodepos,ID_Kabupaten_Alamat,Tgl_Lahir,Tempat_Lahir,ID_Kabupaten_Lahir,ID_Propinsi,npwp,nm_ibu_kandung,Tenaga_Kerja,id_Asosiasi,username,tgl_update,password,id_bu,'',ID_Negara,persyaratan_4,persyaratan_5,persyaratan_8,persyaratan_11,persyaratan_12,persyaratan_19,persyaratan_20,persyaratan_21 FROM $database2.personal";
		$where="WHERE id_personal='$id_personal'";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function upload_organisasi_ta($id_personal,$id_organisasi){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="INSERT IGNORE INTO $database.personal_pengalaman(ID_Personal_Pengalaman,ID_Personal,Nama_Badan_USaha,NRBU,Alamat,Jenis_BU,Jabatan,Tgl_Mulai,Tgl_Selesai,Role_Pekerjaan,username,tgl_update,persyaratan_18) SELECT ID_Personal_Pengalaman,ID_Personal,Nama_Badan_USaha,NRBU,Alamat,Jenis_BU,Jabatan,Tgl_Mulai,Tgl_Selesai,Role_Pekerjaan,username,tgl_update,persyaratan_18 FROM $database2.personal_pengalaman";
		$where="WHERE ID_Personal_Pengalaman IN ($id_organisasi) AND ID_Personal='$id_personal'";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function upload_organisasi_ta_replace($id_personal,$id_organisasi){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="REPLACE INTO $database.personal_pengalaman(ID_Personal_Pengalaman,ID_Personal,Nama_Badan_USaha,NRBU,Alamat,Jenis_BU,Jabatan,Tgl_Mulai,Tgl_Selesai,Role_Pekerjaan,username,tgl_update,persyaratan_18) SELECT ID_Personal_Pengalaman,ID_Personal,Nama_Badan_USaha,NRBU,Alamat,Jenis_BU,Jabatan,Tgl_Mulai,Tgl_Selesai,Role_Pekerjaan,username,tgl_update,persyaratan_18 FROM $database2.personal_pengalaman";
		$where="WHERE ID_Personal_Pengalaman IN ($id_organisasi) AND ID_Personal='$id_personal'";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function download_organisasi_ta_replace($id_personal,$id_organisasi){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="REPLACE INTO $database2.personal_pengalaman(ID_Personal_Pengalaman,ID_Personal,Nama_Badan_USaha,NRBU,Alamat,Jenis_BU,Jabatan,Tgl_Mulai,Tgl_Selesai,Role_Pekerjaan,username,tgl_update,persyaratan_18) SELECT ID_Personal_Pengalaman,ID_Personal,Nama_Badan_USaha,NRBU,Alamat,Jenis_BU,Jabatan,Tgl_Mulai,Tgl_Selesai,Role_Pekerjaan,username,tgl_update,persyaratan_18 FROM $database.personal_pengalaman";
		$where="WHERE ID_Personal_Pengalaman IN ($id_organisasi) AND ID_Personal='$id_personal'";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function upload_proyek_ta($id_personal,$id_proyek){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="INSERT IGNORE INTO $database.personal_proyek(id_personal_proyek,id_personal,Proyek,Lokasi,Tgl_Mulai,Tgl_Selesai,Jabatan,Nilai,username,tgl_update,persyaratan_16)SELECT id_personal_proyek,id_personal,Proyek,Lokasi,Tgl_Mulai,Tgl_Selesai,Jabatan,Nilai,username,tgl_update,persyaratan_16 FROM $database2.personal_proyek";
		$where="WHERE id_personal='$id_personal' AND id_personal_proyek IN ($id_proyek)";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function upload_proyek_ta_replace($id_personal,$id_proyek){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="REPLACE INTO $database.personal_proyek(id_personal_proyek,id_personal,Proyek,Lokasi,Tgl_Mulai,Tgl_Selesai,Jabatan,Nilai,username,tgl_update,persyaratan_16)SELECT id_personal_proyek,id_personal,Proyek,Lokasi,Tgl_Mulai,Tgl_Selesai,Jabatan,Nilai,username,tgl_update,persyaratan_16 FROM $database2.personal_proyek";
		$where="WHERE id_personal='$id_personal' AND id_personal_proyek IN ($id_proyek)";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function download_proyek_ta_replace($id_personal,$id_proyek){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="REPLACE INTO $database2.personal_proyek(id_personal_proyek,id_personal,Proyek,Lokasi,Tgl_Mulai,Tgl_Selesai,Jabatan,Nilai,username,tgl_update,persyaratan_16)SELECT id_personal_proyek,id_personal,Proyek,Lokasi,Tgl_Mulai,Tgl_Selesai,Jabatan,Nilai,username,tgl_update,persyaratan_16 FROM $database.personal_proyek";
		$where="WHERE id_personal='$id_personal' AND id_personal_proyek IN ($id_proyek)";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}



	function upload_klasifikasi_ta($id_personal,$id_sub_bidang){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="INSERT IGNORE INTO $database.personal_reg_ta_kbli(ID_Registrasi_TK_Ahli,ID_Personal,ID_Sub_Bidang,ID_Sub_Sub_Bidang,ID_Asosiasi_Profesi,ID_Kualifikasi,Tgl_Registrasi,ID_Propinsi_reg,No_Reg_Asosiasi,status,ket,Tampil,id_unit_sertifikasi,id_permohonan,no_sk,username,id_user_update,tanggal_update,persyaratan_1,persyaratan_2,persyaratan_3,persyaratan_9,persyaratan_13) SELECT  ID_Registrasi_TK_Ahli,ID_Personal,ID_Sub_Bidang,ID_Sub_Sub_Bidang,ID_Asosiasi_Profesi,ID_Kualifikasi,Tgl_Registrasi,ID_Propinsi_reg,No_Reg_Asosiasi,status,ket,Tampil,id_unit_sertifikasi,id_permohonan,no_sk,username,id_user_update,tanggal_update,persyaratan_1,persyaratan_2,persyaratan_3,persyaratan_9,persyaratan_13 FROM $database2.personal_reg_ta_kbli";
		$where="WHERE ID_Personal='$id_personal' AND ID_Sub_Bidang IN ($id_sub_bidang)";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function download_klasifikasi_ta($id_personal,$id_sub_bidang){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="INSERT IGNORE INTO $database2.personal_reg_ta_kbli(ID_Registrasi_TK_Ahli,ID_Personal,ID_Sub_Bidang,ID_Sub_Sub_Bidang,ID_Asosiasi_Profesi,ID_Kualifikasi,Tgl_Registrasi,ID_Propinsi_reg,No_Reg_Asosiasi,status,ket,Tampil,id_unit_sertifikasi,id_permohonan,no_sk,username,id_user_update,tanggal_update,persyaratan_1,persyaratan_2,persyaratan_3,persyaratan_9,persyaratan_13) SELECT  ID_Registrasi_TK_Ahli,ID_Personal,ID_Sub_Bidang,ID_Sub_Sub_Bidang,ID_Asosiasi_Profesi,ID_Kualifikasi,Tgl_Registrasi,ID_Propinsi_reg,No_Reg_Asosiasi,status,ket,Tampil,id_unit_sertifikasi,id_permohonan,no_sk,username,id_user_update,tanggal_update,persyaratan_1,persyaratan_2,persyaratan_3,persyaratan_9,persyaratan_13 FROM $database.personal_reg_ta_kbli";
		$where="WHERE ID_Personal='$id_personal' AND ID_Sub_Bidang IN ($id_sub_bidang)";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function upload_klasifikasi_ta_asing($id_personal,$id_sub_bidang){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="INSERT IGNORE INTO $database.personal_reg_ta_kbli(ID_Registrasi_TK_Ahli,ID_Personal,ID_Sub_Bidang,ID_Sub_Sub_Bidang,ID_Asosiasi_Profesi,ID_Kualifikasi,Tgl_Registrasi,ID_Propinsi_reg,No_Reg_Asosiasi,status,ket,Tampil,id_unit_sertifikasi,id_permohonan,no_sk,username,id_user_update,tanggal_update,persyaratan_1,persyaratan_2,persyaratan_3,persyaratan_9,persyaratan_13,persyaratan_22) SELECT  ID_Registrasi_TK_Ahli,ID_Personal,ID_Sub_Bidang,ID_Sub_Sub_Bidang,ID_Asosiasi_Profesi,ID_Kualifikasi,Tgl_Registrasi,ID_Propinsi_reg,No_Reg_Asosiasi,status,ket,Tampil,id_unit_sertifikasi,id_permohonan,no_sk,username,id_user_update,tanggal_update,persyaratan_1,persyaratan_2,persyaratan_3,persyaratan_9,persyaratan_13,persyaratan_22 FROM $database2.personal_reg_ta_kbli";
		$where="WHERE ID_Personal='$id_personal' AND ID_Sub_Bidang IN ($id_sub_bidang)";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function upload_klasifikasi_tt($id_personal,$id_sub_bidang){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="INSERT IGNORE INTO $database.personal_reg_tt(ID_Registrasi_TK_Trampil,ID_Personal,ID_Sub_Bidang,ID_Sub_Sub_Bidang,ID_Asosiasi_Profesi,ID_Kualifikasi,Tgl_Registrasi,ID_Propinsi_reg,status,ket,id_unit_sertifikasi,id_permohonan,no_sk,username,id_user_update,tanggal_update,persyaratan_1,persyaratan_2,persyaratan_3,persyaratan_10)SELECT ID_Registrasi_TK_Trampil,ID_Personal,ID_Sub_Bidang,ID_Sub_Sub_Bidang,ID_Asosiasi_Profesi,ID_Kualifikasi,Tgl_Registrasi,ID_Propinsi_reg,status,ket,id_unit_sertifikasi,id_permohonan,no_sk,username,id_user_update,tanggal_update,persyaratan_1,persyaratan_2,persyaratan_3,persyaratan_10 FROM $database2.personal_reg_tt";
		$where="WHERE ID_Personal='$id_personal' AND ID_Sub_Bidang IN ($id_sub_bidang)";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function download_klasifikasi_tt($id_personal,$id_sub_bidang){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="INSERT IGNORE INTO $database2.personal_reg_tt(ID_Registrasi_TK_Trampil,ID_Personal,ID_Sub_Bidang,ID_Sub_Sub_Bidang,ID_Asosiasi_Profesi,ID_Kualifikasi,Tgl_Registrasi,ID_Propinsi_reg,status,ket,id_unit_sertifikasi,id_permohonan,no_sk,username,id_user_update,tanggal_update,persyaratan_1,persyaratan_2,persyaratan_3,persyaratan_10)SELECT ID_Registrasi_TK_Trampil,ID_Personal,ID_Sub_Bidang,ID_Sub_Sub_Bidang,ID_Asosiasi_Profesi,ID_Kualifikasi,Tgl_Registrasi,ID_Propinsi_reg,status,ket,id_unit_sertifikasi,id_permohonan,no_sk,username,id_user_update,tanggal_update,persyaratan_1,persyaratan_2,persyaratan_3,persyaratan_10 FROM $database.personal_reg_tt";
		$where="WHERE ID_Personal='$id_personal' AND ID_Sub_Bidang IN ($id_sub_bidang)";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function upload_kursus_ta($id_personal,$id_kursus){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="INSERT IGNORE INTO $database.personal_kursus(ID_Personal_Kursus,ID_Personal,Nama_Penyelenggara_Kursus,Alamat1,Alamat2,ID_Propinsi,ID_Kabupaten,ID_Countries,Tahun,Nama_Kursus,No_Sertifikat,username,tgl_update,persyaratan_17) SELECT ID_Personal_Kursus,ID_Personal,Nama_Penyelenggara_Kursus,Alamat1,Alamat2,ID_Propinsi,ID_Kabupaten,ID_Countries,Tahun,Nama_Kursus,No_Sertifikat,username,tgl_update,persyaratan_17 FROM $database2.personal_kursus";
		$where="WHERE ID_Personal='$id_personal' AND ID_Personal_Kursus IN ($id_kursus)";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}
	function upload_kursus_ta_replace($id_personal,$id_kursus){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="REPLACE INTO $database.personal_kursus(ID_Personal_Kursus,ID_Personal,Nama_Penyelenggara_Kursus,Alamat1,Alamat2,ID_Propinsi,ID_Kabupaten,ID_Countries,Tahun,Nama_Kursus,No_Sertifikat,username,tgl_update,persyaratan_17) SELECT ID_Personal_Kursus,ID_Personal,Nama_Penyelenggara_Kursus,Alamat1,Alamat2,ID_Propinsi,ID_Kabupaten,ID_Countries,Tahun,Nama_Kursus,No_Sertifikat,username,tgl_update,persyaratan_17 FROM $database2.personal_kursus";
		$where="WHERE ID_Personal='$id_personal' AND ID_Personal_Kursus IN ($id_kursus)";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function download_kursus_ta_replace($id_personal,$id_kursus){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="REPLACE INTO $database2.personal_kursus(ID_Personal_Kursus,ID_Personal,Nama_Penyelenggara_Kursus,Alamat1,Alamat2,ID_Propinsi,ID_Kabupaten,ID_Countries,Tahun,Nama_Kursus,No_Sertifikat,username,tgl_update,persyaratan_17) SELECT ID_Personal_Kursus,ID_Personal,Nama_Penyelenggara_Kursus,Alamat1,Alamat2,ID_Propinsi,ID_Kabupaten,ID_Countries,Tahun,Nama_Kursus,No_Sertifikat,username,tgl_update,persyaratan_17 FROM $database.personal_kursus";
		$where="WHERE ID_Personal='$id_personal' AND ID_Personal_Kursus IN ($id_kursus)";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function upload_pendidikan_ta($id_personal,$id_pendidikan){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="INSERT IGNORE INTO $database.personal_pendidikan(ID_Personal_Pendidikan,ID_Personal,Nama_Sekolah,Alamat1,Alamat2,ID_Propinsi,ID_Kabupaten,ID_Countries,Tahun,Jenjang,Jurusan,No_Ijazah,Row,username,tgl_update,persyaratan_6,persyaratan_7,persyaratan_15) SELECT ID_Personal_Pendidikan,ID_Personal,Nama_Sekolah,Alamat1,Alamat2,ID_Propinsi,ID_Kabupaten,ID_Countries,Tahun,Jenjang,Jurusan,No_Ijazah,Row,username,tgl_update,persyaratan_6,persyaratan_7,persyaratan_15 FROM $database2.personal_pendidikan";
		$where="WHERE ID_Personal_Pendidikan IN ($id_pendidikan) AND ID_Personal='$id_personal'";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function upload_pendidikan_ta_replace($id_personal,$id_pendidikan){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="REPLACE INTO $database.personal_pendidikan(ID_Personal_Pendidikan,ID_Personal,Nama_Sekolah,Alamat1,Alamat2,ID_Propinsi,ID_Kabupaten,ID_Countries,Tahun,Jenjang,Jurusan,No_Ijazah,Row,username,tgl_update,persyaratan_6,persyaratan_7,persyaratan_15) SELECT ID_Personal_Pendidikan,ID_Personal,Nama_Sekolah,Alamat1,Alamat2,ID_Propinsi,ID_Kabupaten,ID_Countries,Tahun,Jenjang,Jurusan,No_Ijazah,Row,username,tgl_update,persyaratan_6,persyaratan_7,persyaratan_15 FROM $database2.personal_pendidikan";
		$where="WHERE ID_Personal_Pendidikan IN ($id_pendidikan) AND ID_Personal='$id_personal'";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}
	function download_pendidikan_ta_replace($id_personal,$id_pendidikan){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$select="REPLACE INTO $database2.personal_pendidikan(ID_Personal_Pendidikan,ID_Personal,Nama_Sekolah,Alamat1,Alamat2,ID_Propinsi,ID_Kabupaten,ID_Countries,Tahun,Jenjang,Jurusan,No_Ijazah,Row,username,tgl_update,persyaratan_6,persyaratan_7,persyaratan_15) SELECT ID_Personal_Pendidikan,ID_Personal,Nama_Sekolah,Alamat1,Alamat2,ID_Propinsi,ID_Kabupaten,ID_Countries,Tahun,Jenjang,Jurusan,No_Ijazah,Row,username,tgl_update,persyaratan_6,persyaratan_7,persyaratan_15 FROM $database.personal_pendidikan";
		$where="WHERE ID_Personal_Pendidikan IN ($id_pendidikan) AND ID_Personal='$id_personal'";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}
	public function tanggal_permohonan_ta_bayar($id_personal,$id_asosiasi){
		$default2 = $this->load->database('default2', TRUE);
		$default2->distinct();
		$default2->select('personal_reg_ta_kbli.Tgl_Registrasi,personal_reg_ta_kbli.ID_Asosiasi_Profesi,personal_profesi_ta.Nama');
		$default2->from('personal_reg_ta_kbli');
		$default2->join('tk_registrasi_history','personal_reg_ta_kbli.ID_Personal=tk_registrasi_history.ID_Personal AND tk_registrasi_history.id_sub_bidang=personal_reg_ta_kbli.ID_Sub_Bidang','left');
		$default2->join('personal_profesi_ta','personal_profesi_ta.ID_Asosiasi_Profesi=personal_reg_ta_kbli.ID_Asosiasi_Profesi','left');
		$default2->where('personal_reg_ta_kbli.ID_Personal',$id_personal);
		$default2->where('personal_reg_ta_kbli.ID_Asosiasi_Profesi',$id_asosiasi);

		$default2->where('tk_registrasi_history.id_status','99');
		$query = $default2->get();
		return $query->result_array();
	}



	public function tanggal_permohonan_ta($id_personal){

		$this->db->distinct();
		$this->db->select('personal_reg_ta_kbli.ID_Sub_Bidang,personal_reg_ta_kbli.Tgl_Registrasi,personal_reg_ta_kbli.ID_Asosiasi_Profesi,personal_profesi_ta.Nama');
		$this->db->from('personal_reg_ta_kbli');
		$this->db->join('tk_registrasi_history','personal_reg_ta_kbli.ID_Personal=tk_registrasi_history.ID_Personal AND tk_registrasi_history.id_sub_bidang=personal_reg_ta_kbli.ID_Sub_Bidang','left');
		$this->db->join('personal_profesi_ta','personal_profesi_ta.ID_Asosiasi_Profesi=personal_reg_ta_kbli.ID_Asosiasi_Profesi','left');
		$this->db->where('personal_reg_ta_kbli.ID_Personal',$id_personal);

		$this->db->where('tk_registrasi_history.id_status','99');
		if($this->ion_auth->ketualpjkprov_ta()){
			$propinsi=$this->session->userdata('id_propinsi');
			$this->db->where('personal_reg_ta_kbli.ID_Propinsi_reg',$propinsi);
		}
		$this->db->group_by('personal_reg_ta_kbli.Tgl_Registrasi');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function tanggal_permohonan_terima_ta($id_personal){
		$this->db->distinct();
		$this->db->select('personal_reg_ta_kbli.ID_Sub_Bidang,personal_reg_ta_kbli.Tgl_Registrasi,personal_reg_ta_kbli.ID_Asosiasi_Profesi,personal_profesi_ta.Nama');
		$this->db->from('personal_reg_ta_kbli');
		$this->db->join('tk_registrasi_history','personal_reg_ta_kbli.ID_Personal=tk_registrasi_history.ID_Personal AND tk_registrasi_history.id_sub_bidang=personal_reg_ta_kbli.ID_Sub_Bidang','left');
		$this->db->join('personal_profesi_ta','personal_profesi_ta.ID_Asosiasi_Profesi=personal_reg_ta_kbli.ID_Asosiasi_Profesi','left');
		$this->db->where('personal_reg_ta_kbli.ID_Personal',$id_personal);

		$this->db->where('tk_registrasi_history.id_status','2');
		if($this->ion_auth->ketualpjkprov_ta()){
			$propinsi=$this->session->userdata('id_propinsi');
			$this->db->where('personal_reg_ta_kbli.ID_Propinsi_reg',$propinsi);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	public function tanggal_permohonan_ta_ustk($id_personal){
		$this->db->distinct();
		$this->db->select('personal_reg_ta_kbli.ID_Sub_Bidang,personal_reg_ta_kbli.Tgl_Registrasi,personal_reg_ta_kbli.ID_Asosiasi_Profesi,personal_profesi_ta.Nama');
		$this->db->from('personal_reg_ta_kbli');
		$this->db->join('tk_registrasi_history','personal_reg_ta_kbli.ID_Personal=tk_registrasi_history.ID_Personal AND tk_registrasi_history.id_sub_bidang=personal_reg_ta_kbli.ID_Sub_Bidang','left');
		$this->db->join('personal_profesi_ta','personal_profesi_ta.ID_Asosiasi_Profesi=personal_reg_ta_kbli.ID_Asosiasi_Profesi','left');
		$this->db->where('personal_reg_ta_kbli.ID_Personal',$id_personal);

		$this->db->where('tk_registrasi_history.id_status','0');
		if($this->ion_auth->ustkprov()){
			$propinsi=$this->session->userdata('id_propinsi');
			$this->db->where('personal_reg_ta_kbli.ID_Propinsi_reg',$propinsi);
		}
		$this->db->group_by('personal_reg_ta_kbli.Tgl_Registrasi');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function tanggal_permohonan_ta_ustkm($id_personal){
		$unit=$this->session->userdata('id_asosiasi');
		$this->db->distinct();
		$this->db->select('personal_reg_ta_kbli.Tgl_Registrasi,personal_reg_ta_kbli.ID_Asosiasi_Profesi,personal_profesi_ta.Nama');
		$this->db->from('personal_reg_ta_kbli');
		$this->db->join('tk_registrasi_history','personal_reg_ta_kbli.ID_Personal=tk_registrasi_history.ID_Personal AND tk_registrasi_history.id_sub_bidang=personal_reg_ta_kbli.ID_Sub_Bidang','left');
		$this->db->join('personal_profesi_ta','personal_profesi_ta.ID_Asosiasi_Profesi=personal_reg_ta_kbli.ID_Asosiasi_Profesi','left');
		$this->db->where('personal_reg_ta_kbli.ID_Personal',$id_personal);
		$this->db->where('personal_reg_ta_kbli.id_unit_sertifikasi',$unit);
		$this->db->where('tk_registrasi_history.id_status','0');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function tanggal_permohonan_tt_bayar($id_personal,$id_asosiasi){
		$default2 = $this->load->database('default2', TRUE);
		$default2->distinct();
		$default2->select('personal_reg_tt.Tgl_Registrasi,personal_reg_tt.ID_Asosiasi_Profesi,personal_profesi_ta.Nama');
		$default2->from('personal_reg_tt');
		$default2->join('tk_registrasi_history_tt','personal_reg_tt.ID_Personal=tk_registrasi_history_tt.ID_Personal AND tk_registrasi_history_tt.id_sub_bidang=personal_reg_tt.ID_Sub_Bidang','left');
		$default2->join('personal_profesi_ta','personal_profesi_ta.ID_Asosiasi_Profesi=personal_reg_tt.ID_Asosiasi_Profesi','left');
		$default2->where('personal_reg_tt.ID_Personal',$id_personal);
		$default2->where('personal_reg_tt.ID_Asosiasi_Profesi',$id_asosiasi);
		$default2->where('tk_registrasi_history_tt.id_status','99');
		$query = $default2->get();
		return $query->result_array();
	}


	public function tanggal_permohonan_tt($id_personal){
		$this->db->distinct();
		$this->db->select('personal_reg_tt.ID_Sub_Bidang,personal_reg_tt.Tgl_Registrasi,personal_reg_tt.ID_Asosiasi_Profesi,personal_profesi_ta.Nama');
		$this->db->from('personal_reg_tt');
		$this->db->join('tk_registrasi_history_tt','personal_reg_tt.ID_Personal=tk_registrasi_history_tt.ID_Personal AND tk_registrasi_history_tt.id_sub_bidang=personal_reg_tt.ID_Sub_Bidang','left');
		$this->db->join('personal_profesi_ta','personal_profesi_ta.ID_Asosiasi_Profesi=personal_reg_tt.ID_Asosiasi_Profesi','left');
		$this->db->where('personal_reg_tt.ID_Personal',$id_personal);

		$this->db->where('tk_registrasi_history_tt.id_status','99');
		if($this->ion_auth->ketualpjkprov_tt()){
			$propinsi=$this->session->userdata('id_propinsi');
			$this->db->where('personal_reg_tt.ID_propinsi_reg',$propinsi);
		}
		$this->db->group_by('personal_reg_tt.Tgl_Registrasi');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function tanggal_permohonan_terima_tt($id_personal){
		$this->db->distinct();
		$this->db->select('tk_registrasi_history_tt.id_sub_bidang,personal_reg_tt.Tgl_Registrasi,personal_reg_tt.ID_Asosiasi_Profesi,personal_profesi_ta.Nama');
		$this->db->from('personal_reg_tt');
		$this->db->join('tk_registrasi_history_tt','personal_reg_tt.ID_Personal=tk_registrasi_history_tt.ID_Personal AND tk_registrasi_history_tt.id_sub_bidang=personal_reg_tt.ID_Sub_Bidang','left');
		$this->db->join('personal_profesi_ta','personal_profesi_ta.ID_Asosiasi_Profesi=personal_reg_tt.ID_Asosiasi_Profesi','left');
		$this->db->where('personal_reg_tt.ID_Personal',$id_personal);

		$this->db->where('tk_registrasi_history_tt.id_status','2');
		if($this->ion_auth->ketualpjkprov_tt()){
			$propinsi=$this->session->userdata('id_propinsi');
			$this->db->where('personal_reg_tt.ID_Propinsi_reg',$propinsi);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	public function tanggal_permohonan_tt_ustk($id_personal){
		$this->db->distinct();
		$this->db->select('personal_reg_tt.ID_Sub_Bidang,personal_reg_tt.Tgl_Registrasi,personal_reg_tt.ID_Asosiasi_Profesi,personal_profesi_ta.Nama');
		$this->db->from('personal_reg_tt');
		$this->db->join('tk_registrasi_history_tt','personal_reg_tt.ID_Personal=tk_registrasi_history_tt.ID_Personal AND tk_registrasi_history_tt.id_sub_bidang=personal_reg_tt.ID_Sub_Bidang','left');
		$this->db->join('personal_profesi_ta','personal_profesi_ta.ID_Asosiasi_Profesi=personal_reg_tt.ID_Asosiasi_Profesi','left');
		$this->db->where('personal_reg_tt.ID_Personal',$id_personal);

		$this->db->where('tk_registrasi_history_tt.id_status','0');
		if($this->ion_auth->ustkprov()){
			$propinsi=$this->session->userdata('id_propinsi');
			$this->db->where('personal_reg_tt.ID_propinsi_reg',$propinsi);
		}
		$this->db->group_by('personal_reg_tt.Tgl_Registrasi');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function tanggal_permohonan_tt_ustkm($id_personal){
		$unit=$this->session->userdata('id_asosiasi');
		$this->db->distinct();
		$this->db->select('personal_reg_tt.Tgl_Registrasi,personal_reg_tt.ID_Asosiasi_Profesi,personal_profesi_ta.Nama');
		$this->db->from('personal_reg_tt');
		$this->db->join('tk_registrasi_history_tt','personal_reg_tt.ID_Personal=tk_registrasi_history_tt.ID_Personal AND tk_registrasi_history_tt.id_sub_bidang=personal_reg_tt.ID_Sub_Bidang','left');
		$this->db->join('personal_profesi_ta','personal_profesi_ta.ID_Asosiasi_Profesi=personal_reg_tt.ID_Asosiasi_Profesi','left');
		$this->db->where('personal_reg_tt.ID_Personal',$id_personal);
		$this->db->where('personal_reg_tt.id_unit_sertifikasi',$unit);

		$this->db->where('tk_registrasi_history_tt.id_status','0');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function tanggal_permohonan_kelayakan_ta($id_personal){
		$this->db->distinct();
		$this->db->select('tk_registrasi_history.id_sub_bidang,personal_reg_ta_kbli.Tgl_Registrasi,personal_reg_ta_kbli.ID_Asosiasi_Profesi,personal_profesi_ta.Nama');
		$this->db->from('personal_reg_ta_kbli');
		$this->db->join('tk_registrasi_history','personal_reg_ta_kbli.ID_Personal=tk_registrasi_history.ID_Personal AND tk_registrasi_history.id_sub_bidang=personal_reg_ta_kbli.ID_Sub_Bidang','left');
		$this->db->join('personal_profesi_ta','personal_profesi_ta.ID_Asosiasi_Profesi=personal_reg_ta_kbli.ID_Asosiasi_Profesi','left');
		$this->db->join('personal','personal_reg_ta_kbli.ID_Personal=personal.id_personal','left');
		$this->db->where('personal_reg_ta_kbli.ID_Personal',$id_personal);

		$this->db->where('tk_registrasi_history.id_status','1');
		if($this->ion_auth->ustkprov()){
			$propinsi=$this->session->userdata('id_propinsi');
			$this->db->where('personal_reg_ta_kbli.ID_Propinsi_reg',$propinsi);
		}
		$query = $this->db->get();
		return $query->result_array();
	}
	public function tanggal_permohonan_kelayakan_ta_m($id_personal){
		$unit=$this->session->userdata('id_asosiasi');
		$this->db->distinct();
		$this->db->select('tk_registrasi_history.id_sub_bidang,personal_reg_ta_kbli.Tgl_Registrasi,personal_reg_ta_kbli.ID_Asosiasi_Profesi,personal_profesi_ta.Nama');
		$this->db->from('personal_reg_ta_kbli');
		$this->db->join('tk_registrasi_history','personal_reg_ta_kbli.ID_Personal=tk_registrasi_history.ID_Personal AND tk_registrasi_history.id_sub_bidang=personal_reg_ta_kbli.ID_Sub_Bidang','left');
		$this->db->join('personal_profesi_ta','personal_profesi_ta.ID_Asosiasi_Profesi=personal_reg_ta_kbli.ID_Asosiasi_Profesi','left');
		$this->db->join('personal','personal_reg_ta_kbli.ID_Personal=personal.id_personal','left');
		$this->db->where('personal_reg_ta_kbli.ID_Personal',$id_personal);
		$this->db->where('personal_reg_ta_kbli.id_unit_sertifikasi',$unit);
		$this->db->where('tk_registrasi_history.id_status','1');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function tanggal_permohonan_kelayakan_tt($id_personal){
		$this->db->distinct();
		$this->db->select('tk_registrasi_history_tt.id_sub_bidang,personal_reg_tt.Tgl_Registrasi,personal_reg_tt.ID_Asosiasi_Profesi,personal_profesi_ta.Nama');
		$this->db->from('personal_reg_tt');
		$this->db->join('tk_registrasi_history_tt','personal_reg_tt.ID_Personal=tk_registrasi_history_tt.ID_Personal AND tk_registrasi_history_tt.id_sub_bidang=personal_reg_tt.ID_Sub_Bidang','left');
		$this->db->join('personal_profesi_ta','personal_profesi_ta.ID_Asosiasi_Profesi=personal_reg_tt.ID_Asosiasi_Profesi','left');
		$this->db->where('personal_reg_tt.ID_Personal',$id_personal);

		$this->db->where('tk_registrasi_history_tt.id_status','1');
		if($this->ion_auth->ustkprov()){
			$propinsi=$this->session->userdata('id_propinsi');
			$this->db->where('personal_reg_tt.ID_propinsi_reg',$propinsi);
		}
		$query = $this->db->get();
		return $query->result_array();
	}
	public function tanggal_permohonan_kelayakan_tt_m($id_personal){
		$unit=$this->session->userdata('id_asosiasi');

		$this->db->distinct();
		$this->db->select('tk_registrasi_history_tt.id_sub_bidang,personal_reg_tt.Tgl_Registrasi,personal_reg_tt.ID_Asosiasi_Profesi,personal_profesi_ta.Nama');
		$this->db->from('personal_reg_tt');
		$this->db->join('tk_registrasi_history_tt','personal_reg_tt.ID_Personal=tk_registrasi_history_tt.ID_Personal AND tk_registrasi_history_tt.id_sub_bidang=personal_reg_tt.ID_Sub_Bidang','left');
		$this->db->join('personal_profesi_ta','personal_profesi_ta.ID_Asosiasi_Profesi=personal_reg_tt.ID_Asosiasi_Profesi','left');
		$this->db->where('personal_reg_tt.ID_Personal',$id_personal);
		$this->db->where('personal_reg_tt.id_unit_sertifikasi',$unit);

		$this->db->where('tk_registrasi_history_tt.id_status','1');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function report_biodata_ta($id_personal){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('personal_reg_ta_kbli.Tgl_Registrasi,personal.id_personal,personal.Nama,personal.Tgl_Lahir,personal.Tempat_Lahir,personal.Alamat1,personal.Kodepos,personal.npwp,propinsi.Nama as Nama_Propinsi,kabupaten.Nama as Nama_Kabupaten,');
		$otherdb->from('personal');
		$otherdb->join('personal_reg_ta_kbli','personal_reg_ta_kbli.ID_Personal=personal.id_personal','left');
		$otherdb->join('propinsi','propinsi.ID_Propinsi=personal.ID_Propinsi','left');
		$otherdb->join('kabupaten','kabupaten.ID_Kabupaten=personal.ID_Kabupaten_Alamat','left');
		$otherdb->where('personal.id_personal',$id_personal);
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function report_biodata_tt($id_personal){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('personal_reg_tt.Tgl_Registrasi,personal.id_personal,personal.Nama,personal.Tgl_Lahir,personal.Tempat_Lahir,personal.Alamat1,personal.Kodepos,personal.npwp,propinsi.Nama as Nama_Propinsi,kabupaten.Nama as Nama_Kabupaten,');
		$otherdb->from('personal');
		$otherdb->join('personal_reg_tt','personal_reg_tt.ID_Personal=personal.id_personal','left');
		$otherdb->join('propinsi','propinsi.ID_Propinsi=personal.ID_Propinsi','left');
		$otherdb->join('kabupaten','kabupaten.ID_Kabupaten=personal.ID_Kabupaten_Alamat','left');
		$otherdb->where('personal.id_personal',$id_personal);
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function biodata_ahli_dukcapil($id_personal){

		$this->db->select('personal.jenis_kelamin,personal.id_personal,personal.Nama,personal.Tgl_Lahir,personal.Tempat_Lahir,personal.Alamat1,personal.Kodepos,personal.npwp,propinsi.Nama as Nama_Propinsi,kabupaten.Nama as Nama_Kabupaten,');
		$this->db->from('personal');
		$this->db->join('propinsi','propinsi.ID_Propinsi=personal.ID_Propinsi','left');
		$this->db->join('kabupaten','kabupaten.ID_Kabupaten=personal.ID_Kabupaten_Alamat','left');
		$this->db->where('id_personal',$id_personal);
		$query = $this->db->get();
		return $query->result_array();
	}

  public function biodata_ahli($id_personal){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('personal');
		$otherdb->where('id_personal',$id_personal);
		//$otherdb->where('Tenaga_Kerja','AHLI');
		$query = $otherdb->get();
		return $query->result_array();
  }
	public function check_email($id_personal,$email){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('personal');
		$otherdb->where('email',$email);
		$otherdb->where("id_personal!='$id_personal'");
        $otherdb->limit(1);
		//$otherdb->where('Tenaga_Kerja','AHLI');
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function biodata_ahli_opr($id_personal){

		$this->db->select('*');
		$this->db->from('personal');
		$this->db->where('id_personal',$id_personal);
		//$this->db->where('Tenaga_Kerja','AHLI');
		$query = $this->db->get();
		return $query->result_array();
  }

	public function biodata_tt($id_personal){

		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('personal');
		$otherdb->where('id_personal',$id_personal);
		//$otherdb->where('Tenaga_Kerja','TRAMPIL');
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function biodata_tt_opr($id_personal){

		$this->db->select('*');
		$this->db->from('personal');
		$this->db->where('id_personal',$id_personal);
		//$this->db->where('Tenaga_Kerja','TRAMPIL');
		$query = $this->db->get();
		return $query->result_array();
  }

	public function asosiasi_tk(){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('personal_profesi_ta');
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function asosiasi_tk_search($asosiasi){

		$this->db->select('ID_Asosiasi_Profesi,Nama');
		$this->db->from('personal_profesi_ta');
		$this->db->where('ID_Asosiasi_Profesi',$asosiasi);
		$query = $this->db->get();
		return $query->result_array();
	}

  public function biodata_terampil($id_personal){
    $otherdb = $this->load->database('default2', TRUE);
    $otherdb->select('*');
    $otherdb->from('personal');
    $otherdb->where('id_personal',$id_personal);
    //$otherdb->where('Tenaga_Kerja','TRAMPIL');
    $query = $otherdb->get();
    return $query->result_array();
  }

  public function kursus($id_personal){
    $otherdb = $this->load->database('default2', TRUE);
    $otherdb->select('*');
    $otherdb->from('personal_kursus');
    $otherdb->where('ID_Personal',$id_personal);
    $query = $otherdb->get();
    return $query->result_array();
  }

	public function kursus_search($id_personal,$id_kursus){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('personal_kursus');
		$otherdb->where('ID_Personal',$id_personal);
		$otherdb->where('ID_Personal_Kursus',$id_kursus);
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function kursus_opr($id_personal){

    $this->db->select('*');
    $this->db->from('personal_kursus');
    $this->db->where('ID_Personal',$id_personal);
    $query = $this->db->get();
    return $query->result_array();
  }

	public function klasifikasi_ta($id_personal,$tgl,$asosiasi){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('personal_reg_ta_kbli');
		$otherdb->where('ID_Personal',$id_personal);
		$otherdb->where('Tgl_Registrasi',$tgl);
		$otherdb->where('ID_Asosiasi_Profesi',$asosiasi);
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function cek_ta($id_personal,$tgl){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('ID_Sub_Bidang');
		$otherdb->from('personal_reg_ta_kbli');
		$otherdb->where('ID_Personal',$id_personal);
		$otherdb->where('Tgl_Registrasi',$tgl);
		$query = $otherdb->get();
		return $query->result_array();
	}
	public function cek_tt2($id_personal,$tgl){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('ID_Sub_Bidang');
		$otherdb->from('personal_reg_tt');
		$otherdb->where('ID_Personal',$id_personal);
		$otherdb->where('Tgl_Registrasi',$tgl);
		$query = $otherdb->get();
		return $query->result_array();
	}
	public function klasifikasi_ta_kelayakan($id_personal,$tgl,$asosiasi,$id_sub_bidang){

		$this->db->select('*');
		$this->db->from('personal_reg_ta_kbli');
		$this->db->where('ID_Personal',$id_personal);
		$this->db->where('Tgl_Registrasi',$tgl);
		$this->db->where('ID_Asosiasi_Profesi',$asosiasi);
		$this->db->where('ID_Sub_Bidang',$id_sub_bidang);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function klasifikasi_ta_2($id_personal){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('personal_reg_ta_kbli.persyaratan_3,personal_reg_ta_kbli.persyaratan_22,personal_reg_ta_kbli.persyaratan_13,personal_reg_ta_kbli.persyaratan_9,personal_reg_ta_kbli.persyaratan_2,personal_reg_ta_kbli.persyaratan_1,unit_sertifikasi.nama as id_unit_sertifikasi,personal_reg_ta_kbli.id_permohonan,personal_reg_ta_kbli.No_Reg_Asosiasi,propinsi.Nama as ID_Propinsi_reg,personal_profesi_ta.Nama as ID_Asosiasi_Profesi,personal_reg_ta_kbli.Tgl_Registrasi,personal_reg_ta_kbli.ID_Kualifikasi,personal_reg_ta_kbli.ket,personal_reg_ta_kbli.ID_Sub_Bidang');
		$otherdb->from('personal_reg_ta_kbli');
		$otherdb->join("personal_profesi_ta","personal_reg_ta_kbli.ID_asosiasi_Profesi = personal_profesi_ta.ID_asosiasi_Profesi","left");
		$otherdb->join("propinsi","propinsi.ID_Propinsi = personal_reg_ta_kbli.ID_Propinsi_reg","left");
		$otherdb->join("unit_sertifikasi","unit_sertifikasi.id_unit_sertifikasi = personal_reg_ta_kbli.id_unit_sertifikasi","left");

		$otherdb->where('personal_reg_ta_kbli.ID_Personal',$id_personal);
		$query = $otherdb->get();
		return $query->result_array();
	}
	public function klasifikasi_ta_2_opr2($id_personal,$bidang){
		$this->db->select('personal_reg_ta_kbli.persyaratan_3,personal_reg_ta_kbli.persyaratan_22,personal_reg_ta_kbli.persyaratan_13,personal_reg_ta_kbli.persyaratan_9,personal_reg_ta_kbli.persyaratan_2,personal_reg_ta_kbli.persyaratan_1,unit_sertifikasi.nama as id_unit_sertifikasi,personal_reg_ta_kbli.id_permohonan,personal_reg_ta_kbli.No_Reg_Asosiasi,propinsi.Nama as ID_Propinsi_reg,personal_profesi_ta.Nama as ID_Asosiasi_Profesi,personal_reg_ta_kbli.Tgl_Registrasi,personal_reg_ta_kbli.ID_Kualifikasi,personal_reg_ta_kbli.ket,personal_reg_ta_kbli.ID_Sub_Bidang');
		$this->db->from('personal_reg_ta_kbli');
		$this->db->join("personal_profesi_ta","personal_reg_ta_kbli.ID_asosiasi_Profesi = personal_profesi_ta.ID_asosiasi_Profesi","left");
		$this->db->join("propinsi","propinsi.ID_Propinsi = personal_reg_ta_kbli.ID_Propinsi_reg","left");
		$this->db->join("unit_sertifikasi","unit_sertifikasi.id_unit_sertifikasi = personal_reg_ta_kbli.id_unit_sertifikasi","left");

		$this->db->where('personal_reg_ta_kbli.ID_Personal',$id_personal);
		$this->db->where('personal_reg_ta_kbli.ID_Sub_Bidang',$bidang);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function klasifikasi_ta_2_opr($id_personal){
		$this->db->select('personal_reg_ta_kbli.persyaratan_3,personal_reg_ta_kbli.persyaratan_22,personal_reg_ta_kbli.persyaratan_13,personal_reg_ta_kbli.persyaratan_9,personal_reg_ta_kbli.persyaratan_2,personal_reg_ta_kbli.persyaratan_1,unit_sertifikasi.nama as id_unit_sertifikasi,personal_reg_ta_kbli.id_permohonan,personal_reg_ta_kbli.No_Reg_Asosiasi,propinsi.Nama as ID_Propinsi_reg,personal_profesi_ta.Nama as ID_Asosiasi_Profesi,personal_reg_ta_kbli.Tgl_Registrasi,personal_reg_ta_kbli.ID_Kualifikasi,personal_reg_ta_kbli.ket,personal_reg_ta_kbli.ID_Sub_Bidang');
		$this->db->from('personal_reg_ta_kbli');
		$this->db->join("personal_profesi_ta","personal_reg_ta_kbli.ID_asosiasi_Profesi = personal_profesi_ta.ID_asosiasi_Profesi","left");
		$this->db->join("propinsi","propinsi.ID_Propinsi = personal_reg_ta_kbli.ID_Propinsi_reg","left");
		$this->db->join("unit_sertifikasi","unit_sertifikasi.id_unit_sertifikasi = personal_reg_ta_kbli.id_unit_sertifikasi","left");

		$this->db->where('personal_reg_ta_kbli.ID_Personal',$id_personal);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function cek_klasifikasi_ta($id_personal,$id_sub_bidang){
		$this->db->select('ID_Personal');
		$this->db->from('tk_registrasi_history');
		$this->db->where('ID_Personal',$id_personal);
		$this->db->where('id_sub_bidang',$id_sub_bidang);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function cek_klasifikasi_tt($id_personal,$id_sub_bidang){
		$this->db->select('ID_Personal');
		$this->db->from('tk_registrasi_history_tt');
		$this->db->where('ID_Personal',$id_personal);
		$this->db->where('id_sub_bidang',$id_sub_bidang);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function klasifikasi_tt($id_personal,$tgl,$asosiasi){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('personal_reg_tt');
		$otherdb->where('ID_Personal',$id_personal);
		$otherdb->where('Tgl_Registrasi',$tgl);
		$otherdb->where('ID_Asosiasi_Profesi',$asosiasi);
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function klasifikasi_tt_2_sad($id_personal){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('personal_reg_tt.persyaratan_3,personal_reg_tt.persyaratan_10,personal_reg_tt.persyaratan_2,personal_reg_tt.persyaratan_1,unit_sertifikasi.nama as id_unit_sertifikasi,personal_reg_tt.id_permohonan,propinsi.Nama as ID_propinsi_reg,personal_profesi_ta.Nama as ID_Asosiasi_Profesi,personal_reg_tt.Tgl_Registrasi,personal_reg_tt.ID_Kualifikasi,personal_reg_tt.ket,personal_reg_tt.ID_Sub_Bidang');
		$otherdb->from('personal_reg_tt');
		$otherdb->join("personal_profesi_ta","personal_reg_tt.ID_asosiasi_Profesi = personal_profesi_ta.ID_asosiasi_Profesi","left");
		$otherdb->join("propinsi","propinsi.ID_Propinsi = personal_reg_tt.ID_propinsi_reg","left");
		$otherdb->join("unit_sertifikasi","unit_sertifikasi.id_unit_sertifikasi = personal_reg_tt.id_unit_sertifikasi","left");

		$otherdb->where('personal_reg_tt.ID_Personal',$id_personal);
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function klasifikasi_tt_2_opr($id_personal,$tgl,$asosiasi){

		$this->db->select('personal_reg_tt.persyaratan_3,personal_reg_tt.persyaratan_10,personal_reg_tt.persyaratan_2,personal_reg_tt.persyaratan_1,unit_sertifikasi.nama as id_unit_sertifikasi,personal_reg_tt.id_permohonan,propinsi.Nama as ID_propinsi_reg,personal_profesi_ta.Nama as ID_Asosiasi_Profesi,personal_reg_tt.Tgl_Registrasi,personal_reg_tt.ID_Kualifikasi,personal_reg_tt.ket,personal_reg_tt.ID_Sub_Bidang');
		$this->db->from('personal_reg_tt');
		$this->db->join("personal_profesi_ta","personal_reg_tt.ID_asosiasi_Profesi = personal_profesi_ta.ID_asosiasi_Profesi","left");
		$this->db->join("propinsi","propinsi.ID_Propinsi = personal_reg_tt.ID_propinsi_reg","left");
		$this->db->join("unit_sertifikasi","unit_sertifikasi.id_unit_sertifikasi = personal_reg_tt.id_unit_sertifikasi","left");

		$this->db->where('personal_reg_tt.ID_Personal',$id_personal);
		$this->db->where('personal_reg_tt.Tgl_Registrasi',$tgl);
		$this->db->where('personal_reg_tt.ID_Asosiasi_Profesi',$asosiasi);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function klasifikasi_tt_2_opr2($id_personal,$tgl,$asosiasi,$bidang){

		$this->db->select('personal_reg_tt.persyaratan_3,personal_reg_tt.persyaratan_10,personal_reg_tt.persyaratan_2,personal_reg_tt.persyaratan_1,unit_sertifikasi.nama as id_unit_sertifikasi,personal_reg_tt.id_permohonan,propinsi.Nama as ID_propinsi_reg,personal_profesi_ta.Nama as ID_Asosiasi_Profesi,personal_reg_tt.Tgl_Registrasi,personal_reg_tt.ID_Kualifikasi,personal_reg_tt.ket,personal_reg_tt.ID_Sub_Bidang');
		$this->db->from('personal_reg_tt');
		$this->db->join("personal_profesi_ta","personal_reg_tt.ID_asosiasi_Profesi = personal_profesi_ta.ID_asosiasi_Profesi","left");
		$this->db->join("propinsi","propinsi.ID_Propinsi = personal_reg_tt.ID_propinsi_reg","left");
		$this->db->join("unit_sertifikasi","unit_sertifikasi.id_unit_sertifikasi = personal_reg_tt.id_unit_sertifikasi","left");

		$this->db->where('personal_reg_tt.ID_Personal',$id_personal);
		$this->db->where('personal_reg_tt.Tgl_Registrasi',$tgl);
		$this->db->where('personal_reg_tt.ID_Asosiasi_Profesi',$asosiasi);
		$this->db->where('personal_reg_tt.ID_Sub_Bidang',$bidang);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function klasifikasi_tt_opr($id_personal,$tgl,$asosiasi){
		$this->db->select('*');
		$this->db->from('personal_reg_tt');
		$this->db->where('ID_Personal',$id_personal);
		$this->db->where('Tgl_Registrasi',$tgl);
		$this->db->where('ID_Asosiasi_Profesi',$asosiasi);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function klasifikasi_tt_oprx($id_personal,$tgl,$asosiasi,$id_sub_bidang){
		$this->db->select('*');
		$this->db->from('personal_reg_tt');
		$this->db->where('ID_Personal',$id_personal);
		$this->db->where('Tgl_Registrasi',$tgl);
		$this->db->where('ID_Asosiasi_Profesi',$asosiasi);
		$this->db->where('id_sub_bidang',$id_sub_bidang);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function klasifikasi_tt_2($id_personal,$tgl,$asosiasi){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('personal_reg_tt');

		$otherdb->where('ID_Personal',$id_personal);
		$otherdb->where('Tgl_Registrasi',$tgl);
		$otherdb->where('ID_Asosiasi_Profesi',$asosiasi);
		$query = $otherdb->get();
		return $query->result_array();
	}
	public function klasifikasi_ta_opr($id_personal){
		$this->db->select('*');
		$this->db->from('personal_reg_ta_kbli');
		$this->db->where('ID_Personal',$id_personal);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function klasifikasi_tt_sad($id_personal){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('personal_reg_tt');
		$otherdb->where('ID_Personal',$id_personal);
		$query = $otherdb->get();
		return $query->result_array();
	}
	public function klasifikasi_tt_opr2($id_personal){
		$this->db->select('*');
		$this->db->from('personal_reg_tt');
		$this->db->where('ID_Personal',$id_personal);
		$query = $this->db->get();
		return $query->result_array();
	}



	public function pendidikan($id_personal){
    $otherdb = $this->load->database('default2', TRUE);
    $otherdb->select('*');
    $otherdb->from('personal_pendidikan');
    $otherdb->where('ID_Personal',$id_personal);
    $query = $otherdb->get();
    return $query->result_array();
  }



  public function pendidikan_search($id_personal,$id_pendidikan){
    $otherdb = $this->load->database('default2', TRUE);
    $otherdb->select('*');
    $otherdb->from('personal_pendidikan');
    $otherdb->where('ID_Personal',$id_personal);
		$otherdb->where('ID_Personal_Pendidikan',$id_pendidikan);
    $query = $otherdb->get();
    return $query->result_array();
  }
	public function pendidikan_opr($id_personal){

		$this->db->select('*');
		$this->db->from('personal_pendidikan');
		$this->db->where('ID_Personal',$id_personal);
		$query = $this->db->get();
		return $query->result_array();
	}

  public function pengalaman_organisasi($id_personal){
    $otherdb = $this->load->database('default2', TRUE);
    $otherdb->select('*');
    $otherdb->from('personal_pengalaman');
    $otherdb->where('ID_Personal',$id_personal);
    $query = $otherdb->get();
    return $query->result_array();
  }

	public function pengalaman_organisasi_search($id_personal,$id_pengalaman){
    $otherdb = $this->load->database('default2', TRUE);
    $otherdb->select('*');
    $otherdb->from('personal_pengalaman');
    $otherdb->where('ID_Personal',$id_personal);
		$otherdb->where('ID_Personal_Pengalaman',$id_pengalaman);
    $query = $otherdb->get();
    return $query->result_array();
  }
	public function pengalaman_organisasi_opr($id_personal){
		$this->db->select('*');
		$this->db->from('personal_pengalaman');
		$this->db->where('ID_Personal',$id_personal);
		$query = $this->db->get();
		return $query->result_array();
	}

  public function pengalaman_proyek($id_personal){
    $otherdb = $this->load->database('default2', TRUE);
    $otherdb->select('*');
    $otherdb->from('personal_proyek');
    $otherdb->where('id_personal',$id_personal);
    $query = $otherdb->get();
    return $query->result_array();
  }

	public function pengalaman_proyek_search($id_personal,$id_proyek){
    $otherdb = $this->load->database('default2', TRUE);
    $otherdb->select('*');
    $otherdb->from('personal_proyek');
    $otherdb->where('id_personal',$id_personal);
		$otherdb->where('id_personal_proyek',$id_proyek);
    $query = $otherdb->get();
    return $query->result_array();
  }
	public function pengalaman_proyek_opr($id_personal){
		$this->db->select('*');
		$this->db->from('personal_proyek');
		$this->db->where('id_personal',$id_personal);

		$query = $this->db->get();
		return $query->result_array();
	}
	public function pengalaman_proyek_opr_limit($id_personal){
		$this->db->select('*');
		$this->db->from('personal_proyek');
		$this->db->where('id_personal',$id_personal);
		$this->db->limit(10);
		$query = $this->db->get();
		return $query->result_array();
	}
}
?>
