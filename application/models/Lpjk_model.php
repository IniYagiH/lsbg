<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Lpjk_model extends CI_Model
{
	public function __construct(){
		parent::__construct();

	}
	function get_status_all_ta($propinsi,$date,$date_now){
		$this->db->select('ID_Personal,id_sub_bidang,ID_Asosiasi_profesi,id_Kualifikasi_profesi,id_status,tgl_permohonan');
		$this->db->from('tk_registrasi_history');
		$this->db->where('Propinsi',$propinsi);
	//	$this->db->where('id_status','99');
		$this->db->where("tgl_permohonan BETWEEN '$date' AND '$date_now'");
		$query = $this->db->get();
		return $query->result_array();
	}


	function get_personal($inputan,$option){
		$otherdb = $this->load->database('default', TRUE);
		$otherdb->select('id_personal,Nama');
		$otherdb->from('personal');
		if($option=='ktp'){
			$otherdb->where('id_personal',$inputan);
		}else{
			$otherdb->like('Alamat1',$inputan);
		}
		$otherdb->limit(100);

		$query = $otherdb->get();
		return $query->result_array();
	}

	function get_nrta($id_personal){
		$otherdb = $this->load->database('default', TRUE);
		$otherdb->select('Nomor_Urut_Baru');
		$otherdb->from('personal_nrta_kbli');
		$otherdb->where('ID_Personal',$id_personal);
		$otherdb->limit(1);
		$query = $otherdb->get();
		return $query->result_array();
	}
	function get_nrtt($id_personal,$id_propinsi){
		$otherdb = $this->load->database('default', TRUE);
		$otherdb->select('Nomor_Urut');
		$otherdb->from('personal_nrtt');
		$otherdb->where('ID_Personal',$id_personal);
		$otherdb->where('ID_propinsi',$id_propinsi);
		$otherdb->limit(1);
		$query = $otherdb->get();
		return $query->result_array();
	}

	function get_tk_registrasi_history($id_personal){
		$otherdb = $this->load->database('default', TRUE);
		$otherdb->select('MAX(id_status) as id_status,id_sub_bidang,id_Kualifikasi_profesi');
		$otherdb->from('tk_registrasi_history');
		$otherdb->where('ID_Personal',$id_personal);
		$otherdb->where("id_status!='99'");
		$otherdb->group_by('id_sub_bidang');
		$query = $otherdb->get();
		return $query->result_array();
	}
	function get_tk_registrasi_history_tt($id_personal){
		$otherdb = $this->load->database('default', TRUE);
		$otherdb->select('Propinsi,MAX(id_status) as id_status,id_sub_bidang,id_Kualifikasi_profesi');
		$otherdb->from('tk_registrasi_history_tt');
		$otherdb->where('ID_Personal',$id_personal);
		$otherdb->where("id_status!='99'");
		$otherdb->group_by('id_sub_bidang');
		$query = $otherdb->get();
		return $query->result_array();
	}
	function get_tk_registrasi_history_hapus($id_personal){
		$otherdb = $this->load->database('default', TRUE);
		$otherdb->select('MAX(id_status) as id_status,id_sub_bidang,id_Kualifikasi_profesi');
		$otherdb->from('tk_registrasi_history_hapus');
		$otherdb->where('ID_Personal',$id_personal);
		$otherdb->where("id_status!='99'");
		$otherdb->group_by('id_sub_bidang');
		$query = $otherdb->get();
		return $query->result_array();
	}
	function get_tk_registrasi_history_tt_hapus($id_personal){
		$otherdb = $this->load->database('default', TRUE);
		$otherdb->select('Propinsi,MAX(id_status) as id_status,id_sub_bidang,id_Kualifikasi_profesi');
		$otherdb->from('tk_registrasi_history_tt_hapus');
		$otherdb->where('ID_Personal',$id_personal);
		$otherdb->where("id_status!='99'");
		$otherdb->group_by('id_sub_bidang');
		$query = $otherdb->get();
		return $query->result_array();
	}

	function get_personal_reg_ta_kbli($id_personal){
		$otherdb = $this->load->database('default', TRUE);
		$otherdb->select('ID_Personal,ID_Sub_Bidang,ID_Kualifikasi');
		$otherdb->from('personal_reg_ta_kbli');
		$otherdb->where('ID_Personal',$id_personal);
		$otherdb->group_by('ID_Sub_Bidang');
		$query = $otherdb->get();
		return $query->result_array();
	}
	function get_personal_reg_tt($id_personal){
		$otherdb = $this->load->database('default', TRUE);
		$otherdb->select('ID_Personal,ID_Sub_Bidang,ID_Kualifikasi,ID_propinsi_reg');
		$otherdb->from('personal_reg_tt');
		$otherdb->where('ID_Personal',$id_personal);
		$otherdb->group_by('ID_Sub_Bidang');
		$query = $otherdb->get();
		return $query->result_array();
	}

	function get_personal_reg_ta_kbli_hapus($id_personal){
		$otherdb = $this->load->database('default', TRUE);
		$otherdb->select('ID_Personal,ID_Sub_Bidang,ID_Kualifikasi');
		$otherdb->from('personal_reg_ta_kbli_hapus');
		$otherdb->where('ID_Personal',$id_personal);
		$otherdb->group_by('ID_Sub_Bidang');
		$query = $otherdb->get();
		return $query->result_array();
	}
	function get_personal_reg_tt_hapus($id_personal){
		$otherdb = $this->load->database('default', TRUE);
		$otherdb->select('ID_Personal,ID_Sub_Bidang,ID_Kualifikasi,ID_propinsi_reg');
		$otherdb->from('personal_reg_tt_hapus');
		$otherdb->where('ID_Personal',$id_personal);
		$otherdb->group_by('ID_Sub_Bidang');
		$query = $otherdb->get();
		return $query->result_array();
	}

	function personal_sertifikat_ta($id_personal,$id_sub_bidang){
		$now=date("Y-m-d");
		$otherdb = $this->load->database('default', TRUE);
		$otherdb->select('id_personal,id_sub_bidang');
		$otherdb->from('personal_sertifikat_ta');
		$otherdb->where('id_personal',$id_personal);
		$otherdb->where('id_sub_bidang',$id_sub_bidang);
		$otherdb->where("tgl_cetak_pertama >= NOW() - INTERVAL 3 YEAR");
		$otherdb->group_by('id_sub_bidang');
		$query = $otherdb->get();
		return $query->result_array();
	}
	function personal_sertifikat_ta_doang($id_personal,$id_sub_bidang){
		$now=date("Y-m-d");
		$otherdb = $this->load->database('default', TRUE);
		$otherdb->select('id_personal,id_sub_bidang,tgl_cetak_pertama');
		$otherdb->from('personal_sertifikat_ta');
		$otherdb->where('id_personal',$id_personal);
		$otherdb->where('id_sub_bidang',$id_sub_bidang);

		$otherdb->group_by('id_sub_bidang');
		$query = $otherdb->get();
		return $query->result_array();
	}
	function personal_sertifikat_tt_doang($id_personal,$id_sub_bidang){
		$now=date("Y-m-d");
		$otherdb = $this->load->database('default', TRUE);
		$otherdb->select('id_personal,id_sub_bidang,tgl_cetak_pertama');
		$otherdb->from('personal_sertifikat_tt');
		$otherdb->where('id_personal',$id_personal);
		$otherdb->where('id_sub_bidang',$id_sub_bidang);

		$otherdb->limit(1);
		$query = $otherdb->get();
		return $query->result_array();
	}
	function personal_sertifikat_tt($id_personal,$id_sub_bidang){
		$now=date("Y-m-d");
		$otherdb = $this->load->database('default', TRUE);
		$otherdb->select('id_personal,id_sub_bidang');
		$otherdb->from('personal_sertifikat_tt');
		$otherdb->where('id_personal',$id_personal);
		$otherdb->where('id_sub_bidang',$id_sub_bidang);
		$otherdb->where("tgl_cetak_pertama >= NOW() - INTERVAL 3 YEAR");
		$otherdb->limit(1);
		$query = $otherdb->get();
		return $query->result_array();
	}










}
