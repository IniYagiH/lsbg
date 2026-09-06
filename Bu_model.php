<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bu_model extends CI_Model
{
	public function __construct(){
		parent::__construct();
	}
	public function get_user($user){
		$this->db->select('user_lisensi.Asosiasi,bu_asosiasi_detail.Nama as nama_asosiasi,user_lisensi.Nama,user_lisensi.Email,user_lisensi.Hp,user_lisensi.Persyaratan_surat,user_lisensi.Persyaratan_nib');
		$this->db->from('user_lisensi');
		$this->db->join('bu_asosiasi_detail','user_lisensi.Asosiasi=bu_asosiasi_detail.ID_Asosiasi_BU','left');

		$this->db->where("user_lisensi.Username",$user);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_permohonan_perizinan(){

		$this->db->select('lisensi_permohonan_perizinan.nib,lisensi_administrasi.data_id,lisensi_administrasi.nama,lisensi_administrasi.nama_singkatan_lsbu,lisensi_administrasi.asosiasi,lisensi_administrasi.email_penanggung_jawab,lisensi_administrasi.nik_penanggung_jawab,lisensi_administrasi.hp_penanggung_jawab,dokumen_nib');
		$this->db->from('lisensi_permohonan_perizinan');
		$this->db->join('lisensi_administrasi','lisensi_permohonan_perizinan.data_id=lisensi_administrasi.data_id','left');
		$query=$this->db->get();
		return $query->result_array();
	}
	function delete_izin($where, $table){
		$otherdb = $this->load->database('default3', TRUE);

		$otherdb->where($where);
		$otherdb->delete($table);
		if ($otherdb->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}

	}
	public function delete($select, $where){
		$query=$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function update_izin($data,$table,$where){
		$otherdb = $this->load->database('default3', TRUE);
		$otherdb->set($data);
		$otherdb->where($where);
		$otherdb->update($table);
		$otherdb->trans_complete();
		if ($otherdb->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}
	function insert_perizinan($table,$data){
		$otherdb = $this->load->database('default3', TRUE);

		$otherdb->insert($table, $data);
		$otherdb->trans_complete();
		if ($otherdb->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}
	public function get_izin_master($nib){
		$this->db->select('*');
		$this->db->from('lisensi_permohonan_perizinan');

		$this->db->where('nib',$nib);
		$query = $this->db->get();
		return $query->result_array();
	}
	function insert_replace($table,$data){
		$insert_query = $this->db->insert($table, $data);
		$insert_query = str_replace('INSERT INTO','REPLACE INTO',$insert_query);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}
	public function cek_auditor_kecukupan($asosiasi){
		$this->db->select('lisensi_auditor.ketua,user_lisensi.Nama,lisensi_auditor.auditor');
		$this->db->from('lisensi_auditor');
		$this->db->join('user_lisensi','lisensi_auditor.auditor=user_lisensi.Username','left');

		$this->db->where('lisensi_auditor.asosiasi',$asosiasi);
		$this->db->where('tipe','0');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function cek_auditor_kecukupan_izin($asosiasi){
		$otherdb = $this->load->database('default3', TRUE);
		$otherdb->select('lisensi_auditor.ketua,user_lisensi.Nama,lisensi_auditor.auditor');
		$otherdb->from('lisensi_auditor');
		$otherdb->join('user_lisensi','lisensi_auditor.auditor=user_lisensi.Username','left');

		$otherdb->where('lisensi_auditor.asosiasi',$asosiasi);
		$otherdb->where('tipe','0');
		$query = $otherdb->get();
		return $query->result_array();
	}
	public function cek_auditor_lapangan($asosiasi){
		$this->db->select('lisensi_auditor.ketua,user_lisensi.Nama,lisensi_auditor.auditor');
		$this->db->from('lisensi_auditor');
		$this->db->join('user_lisensi','lisensi_auditor.auditor=user_lisensi.Username','left');

		$this->db->where('lisensi_auditor.asosiasi',$asosiasi);
		$this->db->where('tipe','1');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function cek_auditor_lapangan_izin($asosiasi){
		$otherdb = $this->load->database('default3', TRUE);
		$otherdb->select('lisensi_auditor.ketua,user_lisensi.Nama,lisensi_auditor.auditor');
		$otherdb->from('lisensi_auditor');
		$otherdb->join('user_lisensi','lisensi_auditor.auditor=user_lisensi.Username','left');

		$otherdb->where('lisensi_auditor.asosiasi',$asosiasi);
		$otherdb->where('tipe','1');
		$query = $otherdb->get();
		return $query->result_array();
	}
	public function get_ketua_kecukupan($tgl,$asosiasi){
		$this->db->select('*');
		$this->db->from('lisensi_auditor');
		$this->db->where('asosiasi',$asosiasi);
		$this->db->where('tgl_permohonan',$tgl);
		$this->db->where('tipe','0');
		$this->db->where('ketua','1');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function skema($asosiasi){
		$this->db->select('*');
		$this->db->from('lisensi_skema');
		$this->db->where('asosiasi',$asosiasi);

		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_ketua_kecukupan_lsbu($asosiasi){
		$this->db->select('*');
		$this->db->from('lisensi_auditor');
		$this->db->where('asosiasi',$asosiasi);
		$this->db->where('tipe','0');
		$this->db->where('ketua','1');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_kecukupan_lsbu($asosiasi){
		$this->db->select('*');
		$this->db->from('lisensi_auditor');
		$this->db->where('asosiasi',$asosiasi);
		$this->db->where('tipe','0');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_ketua_kelayakan_lsbu($asosiasi){
		$this->db->select('*');
		$this->db->from('lisensi_auditor');
		$this->db->where('asosiasi',$asosiasi);
		$this->db->where('tipe','1');
		$this->db->where('ketua','1');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_kelayakan_lsbu($asosiasi){
		$this->db->select('*');
		$this->db->from('lisensi_auditor');
		$this->db->where('asosiasi',$asosiasi);
		$this->db->where('tipe','1');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function cek_penilaian_auditor_kecukupan($asosiasi,$tgl,$id_user){
		$this->db->select('*');
		$this->db->from('lisensi_penilaian');
		$this->db->where('asosiasi',$asosiasi);
		$this->db->where('tgl_permohonan',$tgl);
		$this->db->where('auditor',$id_user);
		$this->db->where('tipe','0');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_notification_bu_limit(){
		$this->db->select('lisensi_history.ASOSIASI,lisensi_history.Log,lisensi_history.Status,lisensi_history.Option1,lisensi_history.Option2,lisensi_history.Ket,lisensi_upload.Deskripsi as nama_item,lisensi_administrasi.nama as nama_lsbu,bu_asosiasi_detail.Nama as nama_asosiasi,');
		$this->db->from('lisensi_history');
		$this->db->join('lisensi_administrasi','lisensi_administrasi.asosiasi=lisensi_history.ASOSIASI','left');
		$this->db->join('lisensi_upload','lisensi_upload.ID_UPLOAD=lisensi_history.ID_UPLOAD','left');

		$this->db->join('bu_asosiasi_detail','bu_asosiasi_detail.ID_Asosiasi_BU=lisensi_history.ASOSIASI','left');

		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_notification_bu_limit2(){
		$this->db->select('lisensi_history.ASOSIASI,lisensi_history.Log,lisensi_history.Status,lisensi_history.Option1,lisensi_history.Option2,lisensi_history.Ket,lisensi_upload.Deskripsi as nama_item,lisensi_administrasi.nama as nama_lsbu,bu_asosiasi_detail.Nama as nama_asosiasi,');
		$this->db->from('lisensi_history');
		$this->db->join('lisensi_administrasi','lisensi_administrasi.asosiasi=lisensi_history.ASOSIASI','left');
		$this->db->join('lisensi_upload','lisensi_upload.ID_UPLOAD=lisensi_history.ID_UPLOAD','left');

		$this->db->join('bu_asosiasi_detail','bu_asosiasi_detail.ID_Asosiasi_BU=lisensi_history.ASOSIASI','left');
		$this->db->group_by('lisensi_history.ASOSIASI');

		$query = $this->db->get();
		return $query->result_array();
	}
	public function cek_penilaian_auditor_lapangan($asosiasi,$tgl,$id_user){
		$this->db->select('*');
		$this->db->from('lisensi_penilaian');
		$this->db->where('asosiasi',$asosiasi);
		$this->db->where('tgl_permohonan',$tgl);
		$this->db->where('auditor',$id_user);
		$this->db->where('tipe','1');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function cetak_penilaian_kecukupan($tgl,$asosiasi,$id_user){
		$this->db->select('lisensi_penilaian.hasil_akhir,lisensi_penilaian.tgl_penilaian,lisensi_penilaian.ada_tidak,lisensi_penilaian.valid_tidak,lisensi_penilaian.comment,lisensi_administrasi.nama,lisensi_daftar_periksa.No,lisensi_daftar_periksa.Uraian,lisensi_daftar_periksa.Referensi');
		$this->db->from('lisensi_penilaian');
		$this->db->join('lisensi_administrasi','lisensi_administrasi.asosiasi=lisensi_penilaian.asosiasi','left');
		$this->db->join('lisensi_daftar_periksa','lisensi_daftar_periksa.Id=lisensi_penilaian.item_periksa','left');

		$this->db->where('lisensi_penilaian.asosiasi',$asosiasi);
		$this->db->where('lisensi_penilaian.tgl_permohonan',$tgl);
		$this->db->where('lisensi_penilaian.auditor',$id_user);
		$this->db->where('lisensi_penilaian.tipe','0');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function cetak_penilaian_kecukupan_tim_lisensi($asosiasi,$id_user){
		$this->db->select('lisensi_penilaian.persyaratan,lisensi_penilaian.hasil_akhir,lisensi_penilaian.tgl_penilaian,lisensi_penilaian.ada_tidak,lisensi_penilaian.valid_tidak,lisensi_penilaian.comment,lisensi_administrasi.nama,lisensi_daftar_periksa.No,lisensi_daftar_periksa.Uraian,lisensi_daftar_periksa.Referensi');
		$this->db->from('lisensi_penilaian');
		$this->db->join('lisensi_administrasi','lisensi_administrasi.asosiasi=lisensi_penilaian.asosiasi','left');
		$this->db->join('lisensi_daftar_periksa','lisensi_daftar_periksa.Id=lisensi_penilaian.item_periksa','left');

		$this->db->where('lisensi_penilaian.asosiasi',$asosiasi);

		$this->db->where('lisensi_penilaian.auditor',$id_user);
		$this->db->where('lisensi_penilaian.tipe','0');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function cetak_penilaian_kecukupan_lsbu($asosiasi,$id_user){
		$this->db->select('lisensi_penilaian.hasil_akhir,lisensi_penilaian.tgl_penilaian,lisensi_penilaian.ada_tidak,lisensi_penilaian.valid_tidak,lisensi_penilaian.comment,lisensi_administrasi.nama,lisensi_daftar_periksa.No,lisensi_daftar_periksa.Uraian,lisensi_daftar_periksa.Referensi');
		$this->db->from('lisensi_penilaian');
		$this->db->join('lisensi_administrasi','lisensi_administrasi.asosiasi=lisensi_penilaian.asosiasi','left');
		$this->db->join('lisensi_daftar_periksa','lisensi_daftar_periksa.Id=lisensi_penilaian.item_periksa','left');

		$this->db->where('lisensi_penilaian.asosiasi',$asosiasi);
		$this->db->where('lisensi_penilaian.auditor',$id_user);
		$this->db->where('lisensi_penilaian.tipe','0');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function cetak_penilaian_lapangan($tgl,$asosiasi,$id_user){
		$this->db->select('lisensi_penilaian.hasil_akhir,lisensi_penilaian.persyaratan,lisensi_penilaian.tgl_penilaian,lisensi_penilaian.ada_tidak,lisensi_penilaian.valid_tidak,lisensi_penilaian.comment,lisensi_administrasi.nama,lisensi_daftar_periksa.No,lisensi_daftar_periksa.Uraian,lisensi_daftar_periksa.Referensi');
		$this->db->from('lisensi_penilaian');
		$this->db->join('lisensi_administrasi','lisensi_administrasi.asosiasi=lisensi_penilaian.asosiasi','left');
		$this->db->join('lisensi_daftar_periksa','lisensi_daftar_periksa.Id=lisensi_penilaian.item_periksa','left');

		$this->db->where('lisensi_penilaian.asosiasi',$asosiasi);
		$this->db->where('lisensi_penilaian.tgl_permohonan',$tgl);
		$this->db->where('lisensi_penilaian.auditor',$id_user);
		$this->db->where('lisensi_penilaian.tipe','1');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function cetak_penilaian_lapangan_tim_lisensi($asosiasi,$id_user){
		$this->db->select('lisensi_penilaian.hasil_akhir,lisensi_penilaian.persyaratan,lisensi_penilaian.tgl_penilaian,lisensi_penilaian.ada_tidak,lisensi_penilaian.valid_tidak,lisensi_penilaian.comment,lisensi_administrasi.nama,lisensi_daftar_periksa.No,lisensi_daftar_periksa.Uraian,lisensi_daftar_periksa.Referensi');
		$this->db->from('lisensi_penilaian');
		$this->db->join('lisensi_administrasi','lisensi_administrasi.asosiasi=lisensi_penilaian.asosiasi','left');
		$this->db->join('lisensi_daftar_periksa','lisensi_daftar_periksa.Id=lisensi_penilaian.item_periksa','left');

		$this->db->where('lisensi_penilaian.asosiasi',$asosiasi);
		$this->db->where('lisensi_penilaian.auditor',$id_user);
		$this->db->where('lisensi_penilaian.tipe','1');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function cetak_penilaian_kelayakan_lsbu($asosiasi,$id_user){
		$this->db->select('lisensi_penilaian.hasil_akhir,lisensi_penilaian.persyaratan,lisensi_penilaian.tgl_penilaian,lisensi_penilaian.ada_tidak,lisensi_penilaian.valid_tidak,lisensi_penilaian.comment,lisensi_administrasi.nama,lisensi_daftar_periksa.No,lisensi_daftar_periksa.Uraian,lisensi_daftar_periksa.Referensi');
		$this->db->from('lisensi_penilaian');
		$this->db->join('lisensi_administrasi','lisensi_administrasi.asosiasi=lisensi_penilaian.asosiasi','left');
		$this->db->join('lisensi_daftar_periksa','lisensi_daftar_periksa.Id=lisensi_penilaian.item_periksa','left');

		$this->db->where('lisensi_penilaian.asosiasi',$asosiasi);
		$this->db->where('lisensi_penilaian.auditor',$id_user);
		$this->db->where('lisensi_penilaian.tipe','1');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_jumlah_auditor(){
		$id_user=$this->session->userdata('id_user');
		$this->db->select('*');
		$this->db->from('lisensi_auditor');
		$this->db->where('auditor',$id_user);
		$this->db->where('tipe','0');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_daftar_periksa(){
		$this->db->select('*');
		$this->db->from('lisensi_daftar_periksa');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_jumlah_auditor_lapangan(){
		$id_user=$this->session->userdata('id_user');
		$this->db->select('*');
		$this->db->from('lisensi_auditor');
		$this->db->where('auditor',$id_user);
		$this->db->where('tipe','1');
		$query = $this->db->get();
		return $query->result_array();
	}
	function delete_penunjukan($id_asesor, $tgl, $asosiasi){
		$this->db->where('auditor',$id_asesor);
		$this->db->where('tgl_permohonan',$tgl);
		$this->db->where('asosiasi',$asosiasi);
		$this->db->delete('lisensi_auditor');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}

	}
	public function get_current_page_records_asosiasi_message($limit, $start)
	{
		$asosiasi=$this->session->userdata('asosiasi');
		$this->db->limit($limit, $start);
		$this->db->select('lisensi_mail.Text,lisensi_mail.Subject,lisensi_mail.ASOSIASI,bu_asosiasi.Nama as nama_asosiasi,lisensi_pds.Deskripsi as ID_PDS,lisensi_mail.ID_RECORD,lisensi_mail.TGL_RECORD,lisensi_mail.Read');
		$this->db->from('lisensi_mail');
		$this->db->join('bu_asosiasi','lisensi_mail.ASOSIASI=bu_asosiasi.ID_Asosiasi_BU','left');
		$this->db->join('lisensi_pds','lisensi_pds.ID_PDS=lisensi_mail.ID_PDS','left');

		$this->db->where('lisensi_mail.ASOSIASI',$asosiasi);
		$this->db->where('lisensi_mail.ID_PDS','1');
		$this->db->order_by("lisensi_mail.TGL_RECORD", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}
	function revisi($id_record){
		$this->db->set('Status', 1);
		$this->db->set('Tgl_Record', date("Y-m-d H:i:s"));
		$this->db->where('ID_RECORD',$id_record);
		$this->db->update('lisensi_history');

	}
	function delete_opr($select,$where){

		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}
	function read_message($id_record){
		$this->db->set('Read', 1);
		$this->db->where('ID_RECORD',$id_record);
		$this->db->update('lisensi_mail');
	}
	function get_persyaratan_user($id_user){
		$this->db->select('*');
		$this->db->from('user_lisensi');
		$this->db->where('Username',$id_user);
		$query = $this->db->get();
		return $query->result_array();
	}
	function cek_penunjukan($tgl,$asosiasi){
		$this->db->select('user_lisensi.Nama as nama_auditor,lisensi_auditor.auditor');
		$this->db->from('lisensi_auditor');
		$this->db->join('user_lisensi','user_lisensi.Username=lisensi_auditor.auditor','left');

		$this->db->where('lisensi_auditor.tgl_permohonan',$tgl);
		$this->db->where('lisensi_auditor.asosiasi',$asosiasi);
		$this->db->where('lisensi_auditor.tipe','0');
		$this->db->order_by('lisensi_auditor.ketua','DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	function cek_penunjukan_lapangan($tgl,$asosiasi){
		$this->db->select('user_lisensi.Nama as nama_auditor,lisensi_auditor.auditor');
		$this->db->from('lisensi_auditor');
		$this->db->join('user_lisensi','user_lisensi.Username=lisensi_auditor.auditor','left');

		$this->db->where('lisensi_auditor.tgl_permohonan',$tgl);
		$this->db->where('lisensi_auditor.asosiasi',$asosiasi);
		$this->db->where('lisensi_auditor.tipe','1');
		$this->db->order_by('lisensi_auditor.ketua','DESC');
		$query = $this->db->get();
		return $query->result_array();
	}
	function get_auditor($nama_auditor){
		$this->db->select('*');
		$this->db->from('user_lisensi');
		$this->db->like('Nama', $nama_auditor);
		$this->db->where('Level','3');
		$query = $this->db->get();
		return $query->result_array();
	}
	function read_mail($id_record){
		$this->db->set('Read', 1);
		$this->db->where('ID_RECORD',$id_record);
		$this->db->update('lisensi_history');
	}
	function get_ceklis_sekretariat($asosiasi,$tgl){
		$this->db->select('lisensi_administrasi.nama,lisensi_ceklis.id_upload,lisensi_upload.Deskripsi,bu_asosiasi.Nama as nama_asosiasi,lisensi_ceklis.ket');
		$this->db->from('lisensi_ceklis');
		$this->db->join('lisensi_administrasi','lisensi_administrasi.asosiasi=lisensi_ceklis.asosiasi','left');

		$this->db->join('bu_asosiasi','lisensi_ceklis.asosiasi=bu_asosiasi.ID_Asosiasi_BU','left');
		$this->db->join('lisensi_upload','lisensi_upload.ID_UPLOAD=lisensi_ceklis.id_upload','left');
		$this->db->where('lisensi_ceklis.asosiasi',$asosiasi);
		$this->db->where('lisensi_ceklis.tgl_permohonan',$tgl);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_message($id_record)
	{
		$this->db->select('lisensi_mail.Text,lisensi_mail.Subject,lisensi_mail.ASOSIASI,bu_asosiasi.Nama as nama_asosiasi,lisensi_pds.Deskripsi as ID_PDS,lisensi_mail.ID_RECORD,lisensi_mail.TGL_RECORD,lisensi_mail.Read');
		$this->db->from('lisensi_mail');
		$this->db->join('bu_asosiasi','lisensi_mail.ASOSIASI=bu_asosiasi.ID_Asosiasi_BU','left');
		$this->db->join('lisensi_pds','lisensi_pds.ID_PDS=lisensi_mail.ID_PDS','left');

		$this->db->where('lisensi_mail.ID_RECORD',$id_record);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_jumlah_message_asosiasi()
	{
		$asosiasi=$this->session->userdata('asosiasi');
		$this->db->select('lisensi_mail.Text,lisensi_mail.Subject,lisensi_mail.ASOSIASI,bu_asosiasi.Nama as nama_asosiasi,lisensi_pds.Deskripsi as ID_PDS,lisensi_mail.ID_RECORD,lisensi_mail.TGL_RECORD,lisensi_mail.Read');
		$this->db->from('lisensi_mail');
		$this->db->join('bu_asosiasi','lisensi_mail.ASOSIASI=bu_asosiasi.ID_Asosiasi_BU','left');
		$this->db->join('lisensi_pds','lisensi_pds.ID_PDS=lisensi_mail.ID_PDS','left');

		$this->db->where('lisensi_mail.ASOSIASI',$asosiasi);
		$this->db->where('lisensi_mail.ID_PDS','1');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_current_page_records($limit, $start)
	{
		$this->db->limit($limit, $start);
		$this->db->select('lisensi_mail.Id_Receive,lisensi_mail.Status,lisensi_mail.ID_PDS as pds,lisensi_mail.Subject,lisensi_mail.ASOSIASI,bu_asosiasi.Nama as nama_asosiasi,lisensi_pds.Deskripsi as ID_PDS,lisensi_mail.ID_RECORD,lisensi_mail.TGL_RECORD,lisensi_mail.Read');
		$this->db->from('lisensi_mail');
		$this->db->join('bu_asosiasi','lisensi_mail.ASOSIASI=bu_asosiasi.ID_Asosiasi_BU','left');
		$this->db->join('lisensi_pds','lisensi_pds.ID_PDS=lisensi_mail.ID_PDS','left');

		$this->db->where('lisensi_mail.Status',0);
		$this->db->where("(lisensi_mail.ID_PDS='2' OR lisensi_mail.ID_PDS='4')");
		$this->db->order_by("lisensi_mail.ID_RECORD", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_current_page_records_auditor($limit, $start)
	{
		$id_user=$this->session->userdata('id_user');
		$this->db->limit($limit, $start);
		$this->db->select('lisensi_auditor.Log,lisensi_auditor.Tipe,user_lisensi.Nama as nama_auditor,bu_asosiasi.Nama as nama_asosiasi,lisensi_auditor.asosiasi,lisensi_auditor.tgl_permohonan,lisensi_auditor.auditor');
		$this->db->from('lisensi_auditor');
		$this->db->join('bu_asosiasi','lisensi_auditor.asosiasi=bu_asosiasi.ID_Asosiasi_BU','left');
		$this->db->join('user_lisensi','user_lisensi.Username=lisensi_auditor.auditor','left');
		$this->db->where('lisensi_auditor.auditor',$id_user);
		$this->db->where('lisensi_auditor.tipe','0');

		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_current_page_records_auditor_lapangan($limit, $start)
	{
		$id_user=$this->session->userdata('id_user');
		$this->db->limit($limit, $start);
		$this->db->select('lisensi_auditor.Log,lisensi_auditor.Tipe,user_lisensi.Nama as nama_auditor,bu_asosiasi.Nama as nama_asosiasi,lisensi_auditor.asosiasi,lisensi_auditor.tgl_permohonan,lisensi_auditor.auditor');
		$this->db->from('lisensi_registrasi_history');
		$this->db->join('lisensi_auditor','lisensi_auditor.asosiasi=lisensi_registrasi_history.asosiasi AND lisensi_auditor.tgl_permohonan=lisensi_registrasi_history.tgl_permohonan','left');
		$this->db->join('bu_asosiasi','lisensi_auditor.asosiasi=bu_asosiasi.ID_Asosiasi_BU','left');
		$this->db->join('user_lisensi','user_lisensi.Username=lisensi_auditor.auditor','left');
		$this->db->where('lisensi_registrasi_history.status','2');
		$this->db->where('lisensi_auditor.auditor',$id_user);
		$this->db->where('lisensi_auditor.tipe','1');

		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_current_page_records_asosiasi($limit, $start)
	{
		$asosiasi=$this->session->userdata('asosiasi');
		$this->db->limit($limit, $start);
		$this->db->select('lisensi_upload.Tipe,lisensi_upload_tipe.Deskripsi as nama_tipe,lisensi_upload.Deskripsi as nama_upload,lisensi_pds.Deskripsi as ID_PDS,lisensi_history.ID_RECORD,lisensi_history.ASOSIASI,lisensi_history.TGL_RECORD,lisensi_history.Ket,lisensi_history.Option1,lisensi_history.Option2,lisensi_history.Status,lisensi_history.Read');
		$this->db->from('lisensi_history');
		$this->db->join('lisensi_pds','lisensi_pds.ID_PDS=lisensi_history.ID_PDS','left');
		$this->db->join('lisensi_upload','lisensi_upload.ID_UPLOAD=lisensi_history.ID_UPLOAD','left');
		$this->db->join('lisensi_upload_tipe','lisensi_upload_tipe.ID_Tipe=lisensi_upload.Tipe','left');

		$this->db->where('lisensi_history.Status',0);
		$this->db->where('lisensi_history.ASOSIASI',$asosiasi);
		$this->db->order_by("lisensi_history.TGL_RECORD", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_mail($id_record)
	{
		$asosiasi=$this->session->userdata('asosiasi');
		$this->db->select('lisensi_upload.ID_UPLOAD,bu_asosiasi_detail.Nama as nama_asosiasi,lisensi_upload.Tipe,lisensi_upload_tipe.Deskripsi as nama_tipe,lisensi_upload.Deskripsi as nama_upload,lisensi_pds.Deskripsi as ID_PDS,lisensi_history.ID_RECORD,lisensi_history.ASOSIASI,lisensi_history.TGL_RECORD,lisensi_history.Ket,lisensi_history.Option1,lisensi_history.Option2,lisensi_history.Status,lisensi_history.Read');
		$this->db->from('lisensi_history');
		$this->db->join('lisensi_pds','lisensi_pds.ID_PDS=lisensi_history.ID_PDS','left');
		$this->db->join('lisensi_upload','lisensi_upload.ID_UPLOAD=lisensi_history.ID_UPLOAD','left');
		$this->db->join('lisensi_upload_tipe','lisensi_upload_tipe.ID_Tipe=lisensi_upload.Tipe','left');
		$this->db->join('bu_asosiasi_detail','lisensi_history.asosiasi=bu_asosiasi_detail.ID_Asosiasi_BU','left');

		$this->db->where('lisensi_history.ID_RECORD',$id_record);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_jumlah_inbox_asosiasi()
	{
		$asosiasi=$this->session->userdata('asosiasi');
		$this->db->select('lisensi_upload_tipe.Deskripsi as nama_tipe,lisensi_upload.Deskripsi as nama_upload,lisensi_pds.Deskripsi as ID_PDS,lisensi_history.ID_RECORD,lisensi_history.ASOSIASI,lisensi_history.TGL_RECORD,lisensi_history.Ket,lisensi_history.Option1,lisensi_history.Option2,lisensi_history.Status,lisensi_history.Read');
		$this->db->from('lisensi_history');
		$this->db->join('lisensi_pds','lisensi_pds.ID_PDS=lisensi_history.ID_PDS','left');
		$this->db->join('lisensi_upload','lisensi_upload.ID_UPLOAD=lisensi_history.ID_UPLOAD','left');
		$this->db->join('lisensi_upload_tipe','lisensi_upload_tipe.ID_Tipe=lisensi_upload.Tipe','left');

		$this->db->where('lisensi_history.Status',0);
		$this->db->where('lisensi_history.ASOSIASI',$asosiasi);
		$this->db->order_by("lisensi_history.ID_RECORD", "desc");
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_status_edit($asosiasi){
		$this->db->select('*');
		$this->db->from('lisensi_registrasi_history');
		$this->db->where('asosiasi',$asosiasi);
		$this->db->where('status_perbaikan','1');
		$this->db->where('status','0');
		$query = $this->db->get();
		return $query->result_array();
	}

		public function cek_permohonan_lsbu($asosiasi){
			$this->db->select('*');
			$this->db->from('lisensi_registrasi_history');
			$this->db->where('asosiasi',$asosiasi);
			$this->db->where('status','0');
			$query = $this->db->get();
			return $query->result_array();
		}
		public function cek_permohonan_lsbu_izin($asosiasi){
			$otherdb = $this->load->database('default3', TRUE);
			$otherdb->select('*');
			$otherdb->from('lisensi_registrasi_history');
			$otherdb->where('asosiasi',$asosiasi);
			$otherdb->where('status','0');
			$query = $otherdb->get();
			return $query->result_array();
		}
		public function cek_permohonan_sekretariat($asosiasi){
			$this->db->select('*');
			$this->db->from('lisensi_registrasi_history');
			$this->db->where('asosiasi',$asosiasi);
			$this->db->where('status','1');
			$query = $this->db->get();
			return $query->result_array();
		}
		public function cek_permohonan_sekretariat_izin($asosiasi){
			$otherdb = $this->load->database('default3', TRUE);
			$otherdb->select('*');
			$otherdb->from('lisensi_registrasi_history');
			$otherdb->where('asosiasi',$asosiasi);
			$otherdb->where('status','1');
			$query = $otherdb->get();
			return $query->result_array();
		}
	public function get_administrasi($asosiasi){
		$this->db->select('*');
		$this->db->from('lisensi_administrasi');
		$this->db->where('asosiasi',$asosiasi);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_administrasi_izin($asosiasi){
		$otherdb = $this->load->database('default3', TRUE);
		$otherdb->select('*');
		$otherdb->from('lisensi_administrasi');
		$otherdb->where('asosiasi',$asosiasi);
		$query = $otherdb->get();
		return $query->result_array();
	}
	public function get_lsbu($asosiasi){
		$this->db->select('*');
		$this->db->from('lisensi_struktur_organisasi_lsbu');
		$this->db->where('asosiasi',$asosiasi);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_organisasi_pelaksana($asosiasi){
		$this->db->select('*');
		$this->db->from('lisensi_struktur_organisasi_pelaksana');
		$this->db->where('asosiasi',$asosiasi);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_administrasi_lingkup($asosiasi){
		$this->db->select('*');
		$this->db->from('lisensi_administrasi_lingkup');
		$this->db->where('asosiasi',$asosiasi);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_administrasi_lingkup_izin($asosiasi){
		$otherdb = $this->load->database('default3', TRUE);
		$otherdb->select('*');
		$otherdb->from('lisensi_administrasi_lingkup');
		$otherdb->where('asosiasi',$asosiasi);
		$query = $otherdb->get();
		return $query->result_array();
	}
	public function get_administrasi_lingkup_search($asosiasi,$id_sub_klasifikasi){
		$this->db->select('*');
		$this->db->from('lisensi_administrasi_lingkup');
		$this->db->where('asosiasi',$asosiasi);
		$this->db->where('id_sub_klasifikasi_kbli',$id_sub_klasifikasi);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_pelaksana($asosiasi){
		$this->db->select('*');
		$this->db->from('lisensi_pelaksana');
		$this->db->where('asosiasi',$asosiasi);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_pelaksana_izin($asosiasi){
		$otherdb = $this->load->database('default3', TRUE);
		$otherdb->select('*');
		$otherdb->from('lisensi_pelaksana');
		$otherdb->where('asosiasi',$asosiasi);
		$query = $otherdb->get();
		return $query->result_array();
	}
	public function get_pelaksana_search($asosiasi,$nik){
		$this->db->select('*');
		$this->db->from('lisensi_pelaksana');
		$this->db->where('asosiasi',$asosiasi);
		$this->db->where('ktp',$nik);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_stuktur_organisasi_lsbu($asosiasi){
		$this->db->select('*');
		$this->db->from('lisensi_struktur_organisasi_lsbu');
		$this->db->where('asosiasi',$asosiasi);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_stuktur_organisasi_lsbu_izin($asosiasi){
		$otherdb = $this->load->database('default3', TRUE);
		$otherdb->select('*');
		$otherdb->from('lisensi_struktur_organisasi_lsbu');
		$otherdb->where('asosiasi',$asosiasi);
		$query = $otherdb->get();
		return $query->result_array();
	}
	public function get_stuktur_organisasi_pengarah($asosiasi){
		$this->db->select('*');
		$this->db->from('lisensi_struktur_organisasi_pengarah');
		$this->db->where('asosiasi',$asosiasi);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_stuktur_organisasi_pengarah_izin($asosiasi){
		$otherdb = $this->load->database('default3', TRUE);
		$otherdb->select('*');
		$otherdb->from('lisensi_pengarah');
		$otherdb->where('asosiasi',$asosiasi);
		$query = $otherdb->get();
		return $query->result_array();
	}
	public function get_stuktur_organisasi_pengarah_search($asosiasi,$nik){
		$this->db->select('*');
		$this->db->from('lisensi_struktur_organisasi_pengarah');
		$this->db->where('asosiasi',$asosiasi);
		$this->db->where('nik',$nik);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_stuktur_organisasi_pelaksana($asosiasi){
		$this->db->select('*');
		$this->db->from('lisensi_struktur_organisasi_pelaksana');
		$this->db->where('asosiasi',$asosiasi);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_stuktur_organisasi_pelaksana_izin($asosiasi){
		$otherdb = $this->load->database('default3', TRUE);
		$otherdb->select('*');
		$otherdb->from('lisensi_pelaksana');
		$otherdb->where('asosiasi',$asosiasi);
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function get_pedoman($asosiasi){
		$this->db->select('*');
		$this->db->from('lisensi_pedoman');
		$this->db->where('asosiasi',$asosiasi);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_pedoman_izin($asosiasi){
		$otherdb = $this->load->database('default3', TRUE);
		$otherdb->select('*');
		$otherdb->from('lisensi_pedoman');
		$otherdb->where('asosiasi',$asosiasi);
		$query = $otherdb->get();
		return $query->result_array();
	}
	public function get_akte_pendirian($asosiasi){
		$this->db->select('*');
		$this->db->from('lisensi_akte_pendirian');
		$this->db->where('asosiasi',$asosiasi);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_akte_perubahan($asosiasi){
		$this->db->select('*');
		$this->db->from('lisensi_akte_perubahan');
		$this->db->where('asosiasi',$asosiasi);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_akte_perubahan_search($asosiasi,$id){
		$this->db->select('*');
		$this->db->from('lisensi_akte_perubahan');
		$this->db->where('asosiasi',$asosiasi);
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_sarana_prasarana($asosiasi){
		$this->db->select('*');
		$this->db->from('lisensi_sarana_prasarana');
		$this->db->where('asosiasi',$asosiasi);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_sarana_prasarana_izin($asosiasi){
		$otherdb = $this->load->database('default3', TRUE);
		$otherdb->select('*');
		$otherdb->from('lisensi_sarana_prasarana');
		$otherdb->where('asosiasi',$asosiasi);
		$query = $otherdb->get();
		return $query->result_array();
	}
	public function get_proker($asosiasi){
		$this->db->select('*');
		$this->db->from('lisensi_proker');
		$this->db->where('asosiasi',$asosiasi);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_proker_izin($asosiasi){
		$otherdb = $this->load->database('default3', TRUE);
		$otherdb->select('*');
		$otherdb->from('lisensi_proker');
		$otherdb->where('asosiasi',$asosiasi);
		$query = $otherdb->get();
		return $query->result_array();
	}
	public function get_skema_izin($asosiasi){
		$otherdb = $this->load->database('default3', TRUE);
		$otherdb->select('*');
		$otherdb->from('lisensi_skema');
		$otherdb->where('asosiasi',$asosiasi);
		$query = $otherdb->get();
		return $query->result_array();
	}
	public function get_legalitas($asosiasi){
		$this->db->select('*');
		$this->db->from('lisensi_legalitas');
		$this->db->where('asosiasi',$asosiasi);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_legalitas_izin($asosiasi){
		$otherdb = $this->load->database('default3', TRUE);
		$otherdb->select('*');
		$otherdb->from('lisensi_legalitas');
		$otherdb->where('asosiasi',$asosiasi);
		$query = $otherdb->get();
		return $query->result_array();
	}
	public function get_asesor($asosiasi){
		$this->db->select('lisensi_asesor.persyaratan_22,lisensi_asesor.persyaratan_23,lisensi_asesor.asosiasi,lisensi_asesor.ID_asesor,lisensi_asesor.nama,lisensi_asesor.nik,asesor.NPWP as npwp');
		$this->db->from('lisensi_asesor');
		$this->db->join('asesor','asesor.ID_asesor=lisensi_asesor.ID_asesor','left');
		$this->db->where('asosiasi',$asosiasi);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_asesor_izin($asosiasi){
		$otherdb = $this->load->database('default3', TRUE);
		$otherdb->select('*');
		$otherdb->from('lisensi_asesor');
		$otherdb->where('asosiasi',$asosiasi);
		$query = $otherdb->get();
		return $query->result_array();
	}
	public function get_asesor_search($asosiasi,$id_asesor){
		$this->db->select('*');
		$this->db->from('lisensi_asesor');
		$this->db->where('asosiasi',$asosiasi);
		$this->db->where('ID_asesor',$id_asesor);
		$query = $this->db->get();
		return $query->result_array();
	}
	function get_detail_asesor($id_asesor){
		$this->db->select('asesor.ID_asesor,asesor.Nama_asesor,asesor.No_KTP,asesor.NPWP,propinsi.Nama as nama_propinsi');
		$this->db->from('asesor');
		$this->db->join('propinsi','asesor.propinsi=propinsi.ID_Propinsi','left');

		$this->db->or_like('asesor.ID_asesor', $id_asesor);
		$this->db->where("(asesor.level='2' OR asesor.level='3' OR asesor.level='7')");

		$this->db->group_by('asesor.ID_asesor');

		$query = $this->db->get();
		return $query->result_array();

	}
	function pilih_asesor($nama){
		$this->db->select('asesor.ID_asesor,asesor.Nama_asesor,asesor.No_KTP,asesor.NPWP,propinsi.Nama as nama_propinsi');
		$this->db->from('asesor');
		$this->db->join('propinsi','asesor.propinsi=propinsi.ID_Propinsi','left');

		$this->db->or_like('asesor.Nama_asesor', $nama);
		$this->db->where("(asesor.level='2' OR asesor.level='3' OR asesor.level='7')");
		$this->db->where("negara2",'1');

		$this->db->group_by('asesor.ID_asesor');

		$query = $this->db->get();
		return $query->result_array();

	}
	public function get_lingkup_search($asosiasi,$sub){
		$this->db->select('*');
		$this->db->from('lisensi_administrasi_lingkup');
		$this->db->where('asosiasi',$asosiasi);
		$this->db->where('id_sub_klasifikasi_kbli',$sub);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_lingkup_search_kualifikasi($asosiasi,$kualifikasi){
		$this->db->select('kualifikasi_kbli,GROUP_CONCAT(id_klasifikasi_kbli) as id_klasifikasi_kbli,GROUP_CONCAT(id_sub_klasifikasi_kbli) as id_sub_klasifikasi_kbli');
		$this->db->from('lisensi_administrasi_lingkup');
		$this->db->where('asosiasi',$asosiasi);
		$this->db->where('kualifikasi_kbli',$kualifikasi);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_lingkup_search_klasifikasi($asosiasi,$klasifikasi){
		$this->db->select('kualifikasi_kbli,id_sub_klasifikasi_kbli');
		$this->db->from('lisensi_administrasi_lingkup');
		$this->db->where('asosiasi',$asosiasi);
		$this->db->where('id_klasifikasi_kbli',$klasifikasi);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_lingkup($asosiasi){
		$this->db->select('*');
		$this->db->from('lisensi_administrasi_lingkup');
		$this->db->where('asosiasi',$asosiasi);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_lingkup_kualifikasi($asosiasi){
		$this->db->select('*');
		$this->db->from('lisensi_administrasi_lingkup');
		$this->db->where('asosiasi',$asosiasi);
		$this->db->group_by('kualifikasi_kbli');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_lingkup_klasifikasi($asosiasi){
		$this->db->select('*');
		$this->db->from('lisensi_administrasi_lingkup');
		$this->db->where('asosiasi',$asosiasi);
		$this->db->group_by('id_klasifikasi_kbli');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_lingkup_kualifikasi_submit($asosiasi){
		$this->db->select('id_klasifikasi_kbli,GROUP_CONCAT(kualifikasi_kbli ORDER BY id_sub_klasifikasi_kbli ASC, kualifikasi_kbli ASC) as kualifikasi_kbli,GROUP_CONCAT(id_sub_klasifikasi_kbli ORDER BY id_sub_klasifikasi_kbli ASC, kualifikasi_kbli ASC) as id_sub_klasifikasi_kbli,persyaratan_40');
		$this->db->from('lisensi_administrasi_lingkup');
		$this->db->where('asosiasi',$asosiasi);

		$this->db->group_by('id_klasifikasi_kbli');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_check_asesor_lisensi($id_asesor){
		$this->db->select('*');
		$this->db->from('lisensi_asesor');
		$this->db->where('ID_asesor',$id_asesor);
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
	public function klasifikasi_bu_2020(){
		$this->db->select('*');
		$this->db->from('bu_klasifikasi_sub_kbli_2020');
		$this->db->group_by('klasifikasi');
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
	function insert($table,$data){

		$this->db->insert($table, $data);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function update($data,$table,$where){
		$this->db->set($data);
		$this->db->where($where);
		$this->db->update($table);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}
	public function get_user_vv(){
		$this->db->select('user_lisensi.NIB,user_lisensi.NIK,bu_asosiasi_detail.Nama as nama_asosiasi,user_lisensi.Nama,user_lisensi.Email,user_lisensi.Hp,user_lisensi.Persyaratan_surat,user_lisensi.Persyaratan_nib');
		$this->db->from('user_lisensi');
		$this->db->join('bu_asosiasi_detail','user_lisensi.Asosiasi=bu_asosiasi_detail.ID_Asosiasi_BU','left');

		$this->db->where("user_lisensi.Username=''");
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_permohonan_lisensi(){
		$this->db->select('lisensi_registrasi_history.asosiasi,bu_asosiasi_detail.Nama as nama_asosiasi,lisensi_registrasi_history.tgl_permohonan');
		$this->db->from('lisensi_registrasi_history');
		$this->db->join('bu_asosiasi_detail','lisensi_registrasi_history.asosiasi=bu_asosiasi_detail.ID_Asosiasi_BU','left');

		$this->db->where("lisensi_registrasi_history.status","0");
		$this->db->where("lisensi_registrasi_history.tolak","0");
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_permohonan_lisensi_izin(){
		$this->db->select('lisensi_registrasi_history.asosiasi,bu_asosiasi_detail.Nama as nama_asosiasi,lisensi_registrasi_history.tgl_permohonan');
		$this->db->from('lisensi_registrasi_history');
		$this->db->join('bu_asosiasi_detail','lisensi_registrasi_history.asosiasi=bu_asosiasi_detail.ID_Asosiasi_BU','left');

		$this->db->where("lisensi_registrasi_history.status","0");
		$this->db->where("lisensi_registrasi_history.tolak","0");
		$query = $this->db->get();
		return $query->result_array();
	}
	public function search_get_user_vv($email){
		$this->db->select('user_lisensi.Asosiasi,bu_asosiasi_detail.Nama as nama_asosiasi,user_lisensi.Nama,user_lisensi.Email,user_lisensi.Hp,user_lisensi.Persyaratan_surat,user_lisensi.Persyaratan_nib');
		$this->db->from('user_lisensi');
		$this->db->join('bu_asosiasi_detail','user_lisensi.Asosiasi=bu_asosiasi_detail.ID_Asosiasi_BU','left');

		$this->db->where("user_lisensi.Username=''");
		$this->db->where('user_lisensi.Email',$email);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function search_get_user_vv_asosiasi($asosiasi){
		$this->db->select('user_lisensi.Asosiasi,bu_asosiasi_detail.Nama as nama_asosiasi,user_lisensi.Nama,user_lisensi.Email,user_lisensi.Hp,user_lisensi.Persyaratan_surat,user_lisensi.Persyaratan_nib');
		$this->db->from('user_lisensi');
		$this->db->join('bu_asosiasi_detail','user_lisensi.Asosiasi=bu_asosiasi_detail.ID_Asosiasi_BU','left');

		$this->db->where("user_lisensi.Username!=''");
		$this->db->where('user_lisensi.Asosiasi',$asosiasi);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function asosiasi_akreditasi(){
		$this->db->select('ID_Asosiasi_BU,Nama');
		$this->db->from('bu_asosiasi_detail');
		$this->db->where('Terakreditasi','1');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_asosiasi($asosiasi){
		$this->db->select('ID_Asosiasi_BU,Nama');
		$this->db->from('bu_asosiasi');
		$this->db->where('ID_Asosiasi_BU',$asosiasi);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_email_lisensi($email){
		$this->db->select('*');
		$this->db->from('user_lisensi');
		$this->db->where('Email',$email);
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
		$this->db->where("ID_Asosiasi_BU='$asosiasi'");
		$query = $this->db->get();
		return $query->result_array();
	}





}
?>
