<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Asesor_model extends CI_Model {

	public $ID_Personal;
	public $NPWP;
	public $Tgl_penilaian;
	public $id_sub_bidang;
	public $id_asosiasi_TK;
	public $kualifikasi;
	public $propinsi;
	public $uji_tulis;
	public $uji_tulis_k;
	public $uji_portopolio;
	public $uji_portopolio_k;
	public $uji_lisan;
	public $uji_lisan_k;
	public $studi_kasus;
	public $studi_kasus_k;
	public $pengetahuan;
	public $keterampilan;
	public $sikap;
	public $hasil_akhir;
	public $username;
	public $tgl_permohonan;
	public $kunci_tgl_nilai;
	public $id_unit_sertifikasi;
	public $ketua;
	public $tgl_hapus;
	public $tgl_restore;
	public $id_user_penghapus;
	public $user_restore;
	public $id_ticket_hapus;
	public $reason_hapus;
	public $id_ticket_restore;
	public $id_reason_restore;
	public $status;
	public $upload_persyaratan;


	public function __construct(){
		parent::__construct();
	}
	public function searching1($option,$inputan,$propinsi)
	{
		$this->db->distinct();
		$this->db->select("personal_nrta_kbli.Nomor_Urut_Baru AS NRKA, personal.id_personal, personal.Nama,personal.Alamat1,personal.npwp");
		$this->db->from("personal");
		$this->db->join("personal_nrta_kbli","personal.id_personal = personal_nrta_kbli.ID_Personal");
		$this->db->join("personal_reg_ta_kbli","personal_reg_ta_kbli.ID_Personal = personal.id_personal");

		if($option == "Id_personal")
		{
			$this->db->where('trim(personal.id_personal)',$inputan);
		}
		else if($option == "Nama"){
			$this->db->like('personal.Nama',$inputan);
		}
		else if ($option == "Nomor_urut_baru" ){
			$this->db->where('personal_nrta_kbli.Nomor_urut_baru',$inputan);
		}
		if(!empty($propinsi))
		{
			$this->db->where('personal_reg_ta_kbli.id_propinsi_reg',$propinsi);
		}

		$query = $this->db->get();
		return $query->result();
	}


	public function searchingtt($option,$inputan,$propinsi)
	{
		$this->db->distinct();
		$this->db->select("personal_nrtt.Nomor_Urut AS NRKT, personal.id_personal, personal.Nama, personal.Alamat1, personal.npwp");
		$this->db->from("personal");
		$this->db->join("personal_nrtt","personal.id_personal = personal_nrtt.ID_Personal");
		$this->db->join("personal_reg_tt","personal_reg_tt.ID_Personal = personal.id_personal");

		if($option == "Id_personal")
		{
			$this->db->where('trim(personal.id_personal)',$inputan);
		}
		else if($option == "Nama"){
			$this->db->like('personal.Nama',$inputan);
		}
		else if ($option == "Nomor_urut_baru" ){
			$this->db->where('personal_nrtt.Nomor_Urut',$inputan);
		}

		if(!empty($propinsi))
		{
			$this->db->where('personal_reg_tt.ID_propinsi_reg',$propinsi);
		}

		$query = $this->db->get();
		if($query->num_rows() != 0)
		{
			return $query->result();	
		}
		else 
		{
			return 2;
		}
	}

	public function searching($where)
	{
		$select = "SELECT b.Nomor_Urut_Baru AS NRKA,a.id_personal,a.Nama,a.Alamat1,a.npwp FROM personal a LEFT JOIN personal_nrta_kbli b ON a.id_personal=b.ID_Personal LEFT JOIN personal_reg_ta_kbli c ON c.ID_Personal=b.ID_Personal";
		$query = $this->db->query("$select $where");
		return $query->result_array();
	}

	public function data($where)
	{
		$select = "SELECT b.Nomor_Urut_Baru AS NRKA,a.id_personal,a.Nama,a.Alamat1,a.npwp FROM personal a LEFT JOIN personal_nrta_kbli b ON a.id_personal=b.ID_Personal";
		$query = $this->db->query("$select WHERE a.id_personal = '$where'");
		foreach ($query->result_array() as $data) {
			return $data;
		}
	}

	public function personal($id)
	{
		$this->db->select("*");
		$this->db->from('personal');
		$this->db->where('id_personal',$id);
		$query = $this->db->get();
		foreach ($query->result() as $data) {
			return $data;
		}
	}

	public function personaltt($id)
	{
		$this->db->select("*");
		$this->db->from('personal');
		$this->db->where('trim(id_personal)',$id);
		$query = $this->db->get();
		return $query->result();
	}

	public function propinsi($id=null)
	{
		$this->db->select("*");
		$this->db->from("propinsi");
		if(!empty($id)):
			$this->db->where("ID_Propinsi",$id);
		endif;
		$query = $this->db->get();
		$return[null] = '-- Provinsi --';
		foreach ($query->result() as $row) {
			$return[$row->ID_Propinsi] = $row->Nama;
		}
		return $return;
	}

	public function propinsi_user($id=null)
	{
		$this->db->select("*");
		$this->db->from("propinsi");
		if(!empty($id)):
			$this->db->where("ID_Propinsi",$id);
		endif;
		$query = $this->db->get();
		$return[null] = '-- Provinsi --';
		$return["00"] = "Nasional";
		foreach ($query->result() as $row) {
			$return[$row->ID_Propinsi] = $row->Nama;
		}
		return $return;
	}

	public function namapropinsi($id)
	{
		$this->db->select("*");
		$this->db->from('propinsi');
		$this->db->where('ID_Propinsi',$id);
		$query = $this->db->get();
		return $query->result();
	}

	public function profesi($id=null)
	{
		$this->db->select("*");
		$this->db->from("personal_profesi_ta_detail_baru");
		$this->db->where('propinsi',$id);
		$this->db->where('status != ','3');
		$query = $this->db->get();
		$return[null] = '-- Nama Lengkap --';
		foreach ($query->result() as $row) {
			$return[$row->ID_Asosiasi_Profesi] = $row->Nama.' - '.$row->Nama_Lengkap;
		}
		return $return;
	}	

	public function asosiasi_profesi($id=null)
	{
		$this->db->select("*");
		$this->db->from("bu_asosiasi_detail");
		$query = $this->db->get();
		$return[null] = '-- Nama Lengkap --';
		foreach ($query->result() as $row) {
			$return[$row->ID_Asosiasi_BU] = $row->Nama.' - '.$row->Nama_Lengkap;
		}
		return $return;
	}


	public function kabupaten($id=null)
	{
		$this->db->select("*");
		$this->db->from("kabupaten");
		if(!empty($id))
		{
			$this->db->where('ID_Kabupaten',$id);
		}
		$query = $this->db->get();
		$return[null] = '-- Kabupaten --';
		foreach ($query->result() as $row) {
			$return[$row->ID_Kabupaten] = $row->Nama;
		}
		return $return;
	}

	public function dataasosiasi($id=null)
	{
		$CI = &get_instance();
		$default2 = $CI->load->database('default2', TRUE);
		$default2->select('*');
		$default2->from('a_bu_asosiasi_detail_baru');
		$default2->where('Propinsi',$id);
		$query = $default2->get();
		$return[null] = '-- Asosiasi --';
		foreach ($query->result() as $data) {
			$return[$data->ID_Asosiasi_BU] = $data->Nama;
		}
		return $return;
	}

	public function tenagaasesor($id,$id_propinsi)
	{
		$this->db->distinct();
		$this->db->select('asesor_nilai_tk_ta.ID_Personal, asesor_nilai_tk_ta.NPWP, asesor_nilai_tk_ta.Tgl_penilaian, asesor_nilai_tk_ta.id_sub_bidang, asesor_nilai_tk_ta.id_asosiasi_TK, asesor_nilai_tk_ta.kualifikasi, asesor_nilai_tk_ta.propinsi, asesor_nilai_tk_ta.uji_tulis, asesor_nilai_tk_ta.uji_tulis_k, asesor_nilai_tk_ta.uji_portopolio, asesor_nilai_tk_ta.uji_portopolio_k, asesor_nilai_tk_ta.uji_lisan, asesor_nilai_tk_ta.uji_lisan_k, asesor_nilai_tk_ta.studi_kasus, asesor_nilai_tk_ta.studi_kasus_k, asesor_nilai_tk_ta.pengetahuan, asesor_nilai_tk_ta.keterampilan, asesor_nilai_tk_ta.sikap, asesor_nilai_tk_ta.hasil_akhir, asesor_nilai_tk_ta.username, asesor_nilai_tk_ta.tgl_permohonan, asesor_nilai_tk_ta.kunci_tgl_nilai, asesor_nilai_tk_ta.id_unit_sertifikasi, asesor_nilai_tk_ta.tanggal_update, asesor_nilai_tk_ta.ketua, tk_registrasi_history.id_sub_bidang, tk_registrasi_history.propinsi, kualifikasi_profesi.Deskripsi_ahli, propinsi.Nama');
		$this->db->from('asesor_nilai_tk_ta');
		$this->db->join('tk_registrasi_history','asesor_nilai_tk_ta.ID_Personal = tk_registrasi_history.ID_Personal AND asesor_nilai_tk_ta.id_sub_bidang = tk_registrasi_history.id_sub_bidang');
		$this->db->join('kualifikasi_profesi','asesor_nilai_tk_ta.kualifikasi = kualifikasi_profesi.ID_Kualifikasi_Profesi');
		$this->db->join('propinsi','asesor_nilai_tk_ta.propinsi = propinsi.ID_Propinsi');

		if(!empty($id_propinsi)):
			$this->db->where('tk_registrasi_history.propinsi',$id_propinsi);
		endif;
		$this->db->where('trim(asesor_nilai_tk_ta.ID_Personal)',$id);
		$query = $this->db->get();
		return $query->result();
	}

	public function tenagaasesortt($id,$id_propinsi)
	{
		$this->db->distinct();
		$this->db->select('asesor_nilai_tk_tt.ID_Personal, asesor_nilai_tk_tt.NPWP, asesor_nilai_tk_tt.Tgl_penilaian, asesor_nilai_tk_tt.id_sub_bidang, asesor_nilai_tk_tt.id_asosiasi_TK, asesor_nilai_tk_tt.kualifikasi, asesor_nilai_tk_tt.propinsi, asesor_nilai_tk_tt.uji_tulis, asesor_nilai_tk_tt.uji_tulis_k, asesor_nilai_tk_tt.uji_portopolio, asesor_nilai_tk_tt.uji_portopolio_k, asesor_nilai_tk_tt.uji_lisan, asesor_nilai_tk_tt.uji_lisan_k, asesor_nilai_tk_tt.studi_kasus, asesor_nilai_tk_tt.studi_kasus_k, asesor_nilai_tk_tt.pengetahuan, asesor_nilai_tk_tt.keterampilan, asesor_nilai_tk_tt.sikap, asesor_nilai_tk_tt.hasil_akhir, asesor_nilai_tk_tt.username, asesor_nilai_tk_tt.tgl_permohonan, asesor_nilai_tk_tt.kunci_tgl_nilai, asesor_nilai_tk_tt.id_unit_sertifikasi, asesor_nilai_tk_tt.tanggal_update, tk_registrasi_history_tt.id_sub_bidang, tk_registrasi_history_tt.propinsi, kualifikasi_profesi.Deskripsi_ahli, propinsi.Nama');
		$this->db->from('asesor_nilai_tk_tt');
		$this->db->join('tk_registrasi_history_tt','tk_registrasi_history_tt.ID_Personal = asesor_nilai_tk_tt.ID_Personal');
		$this->db->join('kualifikasi_profesi','asesor_nilai_tk_tt.kualifikasi = kualifikasi_profesi.ID_Kualifikasi_Profesi');
		$this->db->join('propinsi','asesor_nilai_tk_tt.propinsi = propinsi.ID_Propinsi');

		$this->db->where('asesor_nilai_tk_tt.ID_Personal',$id);
		if(!empty($id_propinsi)):
			$this->db->where('tk_registrasi_history_tt.propinsi',$id_propinsi);
		endif;
		$query = $this->db->get();
		return $query->result();
	}

	public function restoretenagaasesor($id)
	{
		$this->db->select('*');
		$this->db->from('asesor_nilai_tk_ta_hapus');
		$this->db->where('trim(ID_Personal)',$id);
		$this->db->where('status !=','1');
		$query = $this->db->get();
		return $query->result();
	}

	public function restoretenagaasesortt($id)
	{
		$this->db->select('*');
		$this->db->from('asesor_nilai_tk_tt_hapus');
		$this->db->where('trim(ID_Personal)',$id);
		$this->db->where('status != ','1');
		$query = $this->db->get();
		return $query->result();
	}

	public function dataasesor($id_personal,$id_sub_bidang,$username)
	{
		$this->db->select('*');
		$this->db->from('asesor_nilai_tk_ta');
		$this->db->where('trim(ID_Personal)',$id_personal);
		$this->db->where('id_sub_bidang',$id_sub_bidang);
		$this->db->where('username',$username);
		$query = $this->db->get();
		foreach ($query->result() as $data) {
			return $data;
		}

	}

	public function dataasesortt($id_personal,$id_sub_bidang,$username)
	{
		$this->db->select('*');
		$this->db->from('asesor_nilai_tk_tt');
		$this->db->where('trim(ID_Personal)',$id_personal);
		$this->db->where('id_sub_bidang',$id_sub_bidang);
		$this->db->where('username',$username);
		$query = $this->db->get();
		foreach ($query->result() as $data) {
			return $data;
		}

	}

	public function dataasesorrestore($id_personal,$id_sub_bidang,$username)
	{
		$this->db->select('*');
		$this->db->from('asesor_nilai_tk_ta_hapus');
		$this->db->where('trim(ID_Personal)',$id_personal);
		$this->db->where('id_sub_bidang',$id_sub_bidang);
		$this->db->where('username',$username);
		$query = $this->db->get();
		foreach ($query->result() as $data) {
			return $data;
		}

	}

	public function dataasesorrestorett($id_personal,$id_sub_bidang,$username)
	{
		$this->db->select('*');
		$this->db->from('asesor_nilai_tk_tt_hapus');
		$this->db->where('trim(ID_Personal)',$id_personal);
		$this->db->where('id_sub_bidang',$id_sub_bidang);
		$this->db->where('username',$username);
		$query = $this->db->get();
		foreach ($query->result() as $data) {
			return $data;
		}

	}

	public function insertasesor()
	{
		$data = array(
			'ID_Personal' => trim($this->ID_Personal),
			'NPWP' => $this->NPWP,
			'Tgl_penilaian' => $this->Tgl_penilaian,
			'id_sub_bidang' => $this->id_sub_bidang,
			'id_asosiasi_TK' => $this->id_asosiasi_TK,
			'kualifikasi' => $this->kualifikasi,
			'propinsi' => $this->propinsi,
			'uji_tulis' => $this->uji_tulis,
			'uji_tulis_k' => $this->uji_tulis_k,
			'uji_portopolio' => $this->uji_portopolio,
			'uji_portopolio_k' => $this->uji_portopolio_k,
			'uji_lisan' => $this->uji_lisan,
			'uji_lisan_k' => $this->uji_lisan_k,
			'studi_kasus' => $this->studi_kasus,
			'studi_kasus_k' => $this->studi_kasus_k,
			'pengetahuan' => $this->pengetahuan,
			'keterampilan' => $this->keterampilan,
			'sikap' => $this->sikap,
			'tgl_update' => date('Y-m-d H:i:s'),
			'hasil_akhir' => $this->hasil_akhir,
			'username' => $this->username,
			'tgl_permohonan' => $this->tgl_permohonan,
			'kunci_tgl_nilai' => $this->kunci_tgl_nilai,
			'id_unit_sertifikasi' => $this->id_unit_sertifikasi,
			'ketua' => $this->ketua,
			'tgl_hapus' => $this->tgl_hapus,
			'id_user_penghapus' => $this->id_user_penghapus,
			'id_ticket_hapus' => $this->id_ticket_hapus,
			'reason_hapus' => $this->reason_hapus,
			'status' => $this->status,
			'persyaratan_hapus' => $this->upload_persyaratan,
		);

		$this->db->insert('asesor_nilai_tk_ta_hapus',$data);
		return true;
	}

	public function insertasesortt()
	{
		$data = array(
			'ID_Personal' => trim($this->ID_Personal),
			'NPWP' => $this->NPWP,
			'Tgl_penilaian' => $this->Tgl_penilaian,
			'id_sub_bidang' => $this->id_sub_bidang,
			'id_asosiasi_TK' => $this->id_asosiasi_TK,
			'kualifikasi' => $this->kualifikasi,
			'propinsi' => $this->propinsi,
			'uji_tulis' => $this->uji_tulis,
			'uji_tulis_k' => $this->uji_tulis_k,
			'uji_portopolio' => $this->uji_portopolio,
			'uji_portopolio_k' => $this->uji_portopolio_k,
			'uji_lisan' => $this->uji_lisan,
			'uji_lisan_k' => $this->uji_lisan_k,
			'studi_kasus' => $this->studi_kasus,
			'studi_kasus_k' => $this->studi_kasus_k,
			'pengetahuan' => $this->pengetahuan,
			'keterampilan' => $this->keterampilan,
			'sikap' => $this->sikap,
			'hasil_akhir' => $this->hasil_akhir,
			'username' => $this->username,
			'tgl_permohonan' => $this->tgl_permohonan,
			'kunci_tgl_nilai' => $this->kunci_tgl_nilai,
			'id_unit_sertifikasi' => $this->id_unit_sertifikasi,
			'tgl_hapus' => $this->tgl_hapus,
			'id_user_penghapus' => $this->id_user_penghapus,
			'id_ticket_hapus' => $this->id_ticket_hapus,
			'reason_hapus' => $this->reason_hapus,
			'status' => $this->status,
			'persyaratan_hapus' => $this->upload_persyaratan,
		);
		$this->db->insert('asesor_nilai_tk_tt_hapus',$data);
		return true;
	}

	public function insertrestoreasesor()
	{
		$data = array(
			'ID_Personal' => trim($this->ID_Personal),
			'NPWP' => $this->NPWP,
			'Tgl_penilaian' => $this->Tgl_penilaian,
			'id_sub_bidang' => $this->id_sub_bidang,
			'id_asosiasi_TK' => $this->id_asosiasi_TK,
			'kualifikasi' => $this->kualifikasi,
			'propinsi' => $this->propinsi,
			'uji_tulis' => $this->uji_tulis,
			'uji_tulis_k' => $this->uji_tulis_k,
			'uji_portopolio' => $this->uji_portopolio,
			'uji_portopolio_k' => $this->uji_portopolio_k,
			'uji_lisan' => $this->uji_lisan,
			'uji_lisan_k' => $this->uji_lisan_k,
			'studi_kasus' => $this->studi_kasus,
			'studi_kasus_k' => $this->studi_kasus_k,
			'pengetahuan' => $this->pengetahuan,
			'keterampilan' => $this->keterampilan,
			'sikap' => $this->sikap,
			'hasil_akhir' => $this->hasil_akhir,
			'username' => $this->username,
			'tgl_permohonan' => $this->tgl_permohonan,
			'kunci_tgl_nilai' => $this->kunci_tgl_nilai,
			'id_unit_sertifikasi' => $this->id_unit_sertifikasi,
		);
		$insert_query= $this->db->insert_string('asesor_nilai_tk_ta', $data);
		$insert = str_replace("INSERT INTO","INSERT IGNORE INTO",$insert_query);
		$this->db->query($insert);
		return true;
	}

	public function insertrestoreasesortt()
	{
		$data = array(
			'ID_Personal' => trim($this->ID_Personal),
			'NPWP' => $this->NPWP,
			'Tgl_penilaian' => $this->Tgl_penilaian,
			'id_sub_bidang' => $this->id_sub_bidang,
			'id_asosiasi_TK' => $this->id_asosiasi_TK,
			'kualifikasi' => $this->kualifikasi,
			'propinsi' => $this->propinsi,
			'uji_tulis' => $this->uji_tulis,
			'uji_tulis_k' => $this->uji_tulis_k,
			'uji_portopolio' => $this->uji_portopolio,
			'uji_portopolio_k' => $this->uji_portopolio_k,
			'uji_lisan' => $this->uji_lisan,
			'uji_lisan_k' => $this->uji_lisan_k,
			'studi_kasus' => $this->studi_kasus,
			'studi_kasus_k' => $this->studi_kasus_k,
			'pengetahuan' => $this->pengetahuan,
			'keterampilan' => $this->keterampilan,
			'sikap' => $this->sikap,
			'hasil_akhir' => $this->hasil_akhir,
			'username' => $this->username,
			'tgl_permohonan' => $this->tgl_permohonan,
			'kunci_tgl_nilai' => $this->kunci_tgl_nilai,
			'id_unit_sertifikasi' => $this->id_unit_sertifikasi,
		);
		$insert_query= $this->db->insert_string('asesor_nilai_tk_tt', $data);
		$insert = str_replace("INSERT INTO","INSERT IGNORE INTO",$insert_query);
		$this->db->query($insert);
		return true;
	}

	public function updateasesor()
	{
		$data = array(
			'tgl_restore' => $this->tgl_restore,
			'id_user_restore' => $this->user_restore,
			'id_ticket_restore' => $this->id_ticket_restore,
			'reason_restore' => $this->reason_restore,
			'status' => $this->status,
			'persyaratan_restore' => $this->upload_persyaratan,
		);
		$this->db->where('trim(ID_Personal)',$this->ID_Personal);
		$this->db->where('id_sub_bidang',$this->id_sub_bidang);
		$this->db->where('username',$this->username);
		$this->db->update('asesor_nilai_tk_ta_hapus',$data);
		return true;
	}

	public function updateasesortt()
	{
		$data = array(
			'tgl_restoe' => $this->tgl_restore,
			'id_user_restore' => $this->user_restore,
			'id_ticket_restore' => $this->id_ticket_restore,
			'reason_restore' => $this->reason_restore,
			'status' => $this->status,
			'persyaratan_restore' => $this->upload_persyaratan,
		);
		$this->db->where('trim(ID_Personal)',$this->ID_Personal);
		$this->db->where('id_sub_bidang',$this->id_sub_bidang);
		$this->db->where('username',$this->username);
		$this->db->update('asesor_nilai_tk_tt_hapus',$data);
		return true;
	}

	public function hapusasesor()
	{
		$this->db->where('trim(ID_Personal)',$this->ID_Personal);
		$this->db->where('id_sub_bidang',$this->id_sub_bidang);
		$this->db->where('username',$this->username);
		$this->db->delete("asesor_nilai_tk_ta");
		return true;
	}

	public function hapusasesortt()
	{
		$this->db->where('trim(ID_Personal)',$this->ID_Personal);
		$this->db->where('id_sub_bidang',$this->id_sub_bidang);
		$this->db->where('username',$this->username);
		$this->db->delete("asesor_nilai_tk_tt");
		return true;
	}

}
