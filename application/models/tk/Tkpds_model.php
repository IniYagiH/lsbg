<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Tkpds_model extends CI_Model
{
	public function __construct(){
		parent::__construct();

	}
  public function pds_create_group($id,$tgl,$asosiasi,$tagihan){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$kode_pembayaran=rand(10,99);
		$select="INSERT IGNORE INTO $database.tk_pds_group (ID_PERSONAL,ID_ASOSIASI, Tgl_Permohonan, Kode_Pembayaran, Tagihan_Pembayaran) SELECT ID_Personal,ID_Asosiasi_Profesi,Tgl_Registrasi,'$kode_pembayaran','$tagihan' FROM $database2.personal_reg_ta_kbli ";
		$where="WHERE ID_Personal='$id' AND Tgl_Registrasi='$tgl' AND ID_Asosiasi_Profesi='$asosiasi' LIMIT 1";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	public function pds_create_group_tt($id,$tgl,$asosiasi,$tagihan){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$kode_pembayaran=rand(10,99);
		$select="INSERT IGNORE INTO $database.tk_pds_group (ID_PERSONAL,ID_ASOSIASI, Tgl_Permohonan, Kode_Pembayaran, Tagihan_Pembayaran) SELECT ID_Personal,ID_Asosiasi_Profesi,Tgl_Registrasi,'$kode_pembayaran','$tagihan' FROM $database2.personal_reg_tt ";
		$where="WHERE ID_Personal='$id' AND Tgl_Registrasi='$tgl' AND ID_Asosiasi_Profesi='$asosiasi' LIMIT 1";
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}
	public function get_id_group($id_bu,$tgl_permohonan,$asosiasi){
		$this->db->select('*');
		$this->db->from('tk_pds_group');
		$this->db->where('ID_PERSONAL',$id_bu);
		$this->db->where('ID_ASOSIASI',$asosiasi);
		$this->db->where('Tgl_Permohonan',$tgl_permohonan);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function pds_1_to_1($id_personal,$id_group,$id_pds){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		$query1="INSERT IGNORE INTO $database.tk_pds(ID_PERSONAL,ID_PDS,ID_UPLOAD,ID_GROUP,LINK_File,Tgl_Pds,ID_User_Pds) SELECT id_personal,'$id_pds','4','$id_group',persyaratan_4,NOW(),'yagi' FROM $database2.personal WHERE id_personal='$id_personal'";
		$query2="INSERT IGNORE INTO $database.tk_pds(ID_PERSONAL,ID_PDS,ID_UPLOAD,ID_GROUP,LINK_File,Tgl_Pds,ID_User_Pds) SELECT id_personal,'$id_pds','5','$id_group',persyaratan_5,NOW(),'yagi' FROM $database2.personal WHERE id_personal='$id_personal'";
		$query3="INSERT IGNORE INTO $database.tk_pds(ID_PERSONAL,ID_PDS,ID_UPLOAD,ID_GROUP,LINK_File,Tgl_Pds,ID_User_Pds) SELECT id_personal,'$id_pds','8','$id_group',persyaratan_8,NOW(),'yagi' FROM $database2.personal WHERE id_personal='$id_personal'";
		$query4="INSERT IGNORE INTO $database.tk_pds(ID_PERSONAL,ID_PDS,ID_UPLOAD,ID_GROUP,LINK_File,Tgl_Pds,ID_User_Pds) SELECT id_personal,'$id_pds','11','$id_group',persyaratan_11,NOW(),'yagi' FROM $database2.personal WHERE id_personal='$id_personal'";
		$query5="INSERT IGNORE INTO $database.tk_pds(ID_PERSONAL,ID_PDS,ID_UPLOAD,ID_GROUP,LINK_File,Tgl_Pds,ID_User_Pds) SELECT id_personal,'$id_pds','12','$id_group',persyaratan_12,NOW(),'yagi' FROM $database2.personal WHERE id_personal='$id_personal'";

		for($i=1;$i<6;$i++){
			if($i==1){
				$this->db->query("$query1");
			}elseif($i==2){
				$this->db->query("$query2");
			}elseif($i==3){
				$this->db->query("$query3");
			}elseif($i==4){
				$this->db->query("$query4");
			}elseif($i==5){
				$this->db->query("$query5");

			}
		}
	}

	public function get_kursus($id_personal){
		$default2 = $this->load->database('default2', TRUE);
		$default2->select('ID_Personal_Kursus');
		$default2->from('personal_kursus');
		$default2->where('ID_Personal',$id_personal);
		$query = $default2->get();
		return $query->result_array();
	}

	function pds_kursus($id_personal,$id_group,$data_kursus,$id_pds){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		foreach ($data_kursus as $row) {
			$id_kursus=$row['ID_Personal_Kursus'];

			$query1="INSERT IGNORE INTO $database.r_pds_kursus(ID_GROUP,ID_PDS,ID_UPLOAD,ID_Personal_Kursus,Link_File) SELECT '$id_group','$id_pds','17','$id_kursus',persyaratan_17 FROM $database2.personal_kursus WHERE ID_Personal='$id_personal'";
			$this->db->query("$query1");
		}

		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}


	public function get_pengalaman_organisasi($id_personal){
		$default2 = $this->load->database('default2', TRUE);
		$default2->select('ID_Personal_Pengalaman');
		$default2->from('personal_pengalaman');
		$default2->where('ID_Personal',$id_personal);
		$query = $default2->get();
		return $query->result_array();
	}

	function pds_organisasi($id_personal,$id_group,$data_organisasi,$id_pds){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		foreach ($data_organisasi as $row) {
			$id_organisasi=$row['ID_Personal_Pengalaman'];
			$query1="INSERT IGNORE INTO $database.r_pds_organisasi(ID_GROUP,ID_PDS,ID_UPLOAD,ID_Personal_Pengalaman,Link_File) SELECT '$id_group','$id_pds','18','$id_organisasi',persyaratan_18 FROM $database2.personal_pengalaman WHERE ID_Personal='$id_personal'";
			$this->db->query("$query1");
		}

		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}


	public function get_pengalaman_proyek($id_personal){
		$default2 = $this->load->database('default2', TRUE);
		$default2->select('id_personal_proyek');
		$default2->from('personal_proyek');
		$default2->where('id_personal',$id_personal);
		$query = $default2->get();
		return $query->result_array();
	}

	function pds_proyek($id_personal,$id_group,$data_proyek,$id_pds){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		foreach ($data_proyek as $row) {
			$id_proyek=$row['id_personal_proyek'];
			$query1="INSERT IGNORE INTO $database.r_pds_proyek(ID_GROUP,ID_PDS,ID_UPLOAD,id_personal_proyek,Link_File) SELECT '$id_group','$id_pds','16','$id_proyek',persyaratan_16 FROM $database2.personal_proyek WHERE id_personal='$id_personal'";
			$this->db->query("$query1");
		}

		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	public function get_pendidikan($id_personal){
		$default2 = $this->load->database('default2', TRUE);
		$default2->select('ID_Personal_Pendidikan');
		$default2->from('personal_pendidikan');
		$default2->where('ID_Personal',$id_personal);
		$query = $default2->get();
		return $query->result_array();
	}

	function pds_pendidikan($id_personal,$id_group,$data_pendidikan,$id_pds){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		foreach ($data_pendidikan as $row) {
			$id_pendidikan=$row['ID_Personal_Pendidikan'];

			for($i=1;$i<4;$i++){
				if($i==1){
					$query1="INSERT IGNORE INTO $database.r_pds_pendidikan(ID_GROUP,ID_PDS,ID_UPLOAD,ID_Personal_Pendidikan,Link_File) SELECT '$id_group','$id_pds','6','$id_pendidikan',persyaratan_6 FROM $database2.personal_pendidikan WHERE ID_Personal='$id_personal'";

					$this->db->query("$query1");
				}elseif($i==2){
					$query2="INSERT IGNORE INTO $database.r_pds_pendidikan(ID_GROUP,ID_PDS,ID_UPLOAD,ID_Personal_Pendidikan,Link_File) SELECT '$id_group','$id_pds','7','$id_pendidikan',persyaratan_7 FROM $database2.personal_pendidikan WHERE ID_Personal='$id_personal'";

					$this->db->query("$query2");
				}elseif($i==3){
					$query3="INSERT IGNORE INTO $database.r_pds_pendidikan(ID_GROUP,ID_PDS,ID_UPLOAD,ID_Personal_Pendidikan,Link_File) SELECT '$id_group','$id_pds','15','$id_pendidikan',persyaratan_15 FROM $database2.personal_pendidikan WHERE ID_Personal='$id_personal'";

					$this->db->query("$query3");
				}
			}
		}

		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	public function get_bidang($id_personal,$tgl,$asosiasi){
		$default2 = $this->load->database('default2', TRUE);
		$default2->select('ID_Sub_Bidang');
		$default2->from('personal_reg_ta_kbli');
		$default2->where('ID_Personal',$id_personal);
		$default2->where('Tgl_Registrasi',$tgl);
		$default2->where('ID_Asosiasi_Profesi',$asosiasi);
		$query = $default2->get();
		return $query->result_array();
	}

	public function get_bidang_tt($id_personal,$tgl,$asosiasi){
		$default2 = $this->load->database('default2', TRUE);
		$default2->select('ID_Sub_Bidang');
		$default2->from('personal_reg_tt');
		$default2->where('ID_Personal',$id_personal);
		$default2->where('Tgl_Registrasi',$tgl);
		$default2->where('ID_Asosiasi_Profesi',$asosiasi);
		$query = $default2->get();
		return $query->result_array();
	}

	function pds_bidang_tt($id_personal,$id_group,$data_bidang,$id_pds){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		foreach ($data_bidang as $row) {
			$id_sub_bidang=$row['ID_Sub_Bidang'];

			for($i=1;$i<5;$i++){
				if($i==1){
					$query1="INSERT IGNORE INTO $database.r_pds_bidang(ID_GROUP,ID_PDS,ID_UPLOAD,ID_Sub_Bidang,Link_File) SELECT '$id_group','$id_pds','1','$id_sub_bidang',persyaratan_1 FROM $database2.personal_reg_tt WHERE ID_Personal='$id_personal'";
					$this->db->query("$query1");
				}elseif($i==2){
					$query2="INSERT IGNORE INTO $database.r_pds_bidang(ID_GROUP,ID_PDS,ID_UPLOAD,ID_Sub_Bidang,Link_File) SELECT '$id_group','$id_pds','2','$id_sub_bidang',persyaratan_2 FROM $database2.personal_reg_tt WHERE ID_Personal='$id_personal'";
					$this->db->query("$query2");
				}elseif($i==3){
					$query3="INSERT IGNORE INTO $database.r_pds_bidang(ID_GROUP,ID_PDS,ID_UPLOAD,ID_Sub_Bidang,Link_File) SELECT '$id_group','$id_pds','3','$id_sub_bidang',persyaratan_3 FROM $database2.personal_reg_tt WHERE ID_Personal='$id_personal'";
					$this->db->query("$query3");
				}elseif($i==4){
					$query4="INSERT IGNORE INTO $database.r_pds_bidang(ID_GROUP,ID_PDS,ID_UPLOAD,ID_Sub_Bidang,Link_File) SELECT '$id_group','$id_pds','10','$id_sub_bidang',persyaratan_10 FROM $database2.personal_reg_tt WHERE ID_Personal='$id_personal'";

					$this->db->query("$query4");
				}
		}
	}

		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function pds_bidang($id_personal,$id_group,$data_bidang,$id_pds){
		$default2 = $this->load->database('default2', TRUE);
		$database2=$default2->database;
		$database=$this->db->database;
		foreach ($data_bidang as $row) {
			$id_sub_bidang=$row['ID_Sub_Bidang'];

			for($i=1;$i<6;$i++){
				if($i==1){
					$query1="INSERT IGNORE INTO $database.r_pds_bidang(ID_GROUP,ID_PDS,ID_UPLOAD,ID_Sub_Bidang,Link_File) SELECT '$id_group','$id_pds','1','$id_sub_bidang',persyaratan_1 FROM $database2.personal_reg_ta_kbli WHERE ID_Personal='$id_personal'";
					$this->db->query("$query1");
				}elseif($i==2){
					$query2="INSERT IGNORE INTO $database.r_pds_bidang(ID_GROUP,ID_PDS,ID_UPLOAD,ID_Sub_Bidang,Link_File) SELECT '$id_group','$id_pds','2','$id_sub_bidang',persyaratan_2 FROM $database2.personal_reg_ta_kbli WHERE ID_Personal='$id_personal'";
					$this->db->query("$query2");
				}elseif($i==3){
					$query3="INSERT IGNORE INTO $database.r_pds_bidang(ID_GROUP,ID_PDS,ID_UPLOAD,ID_Sub_Bidang,Link_File) SELECT '$id_group','$id_pds','3','$id_sub_bidang',persyaratan_3 FROM $database2.personal_reg_ta_kbli WHERE ID_Personal='$id_personal'";
					$this->db->query("$query3");
				}elseif($i==4){
					$query4="INSERT IGNORE INTO $database.r_pds_bidang(ID_GROUP,ID_PDS,ID_UPLOAD,ID_Sub_Bidang,Link_File) SELECT '$id_group','$id_pds','9','$id_sub_bidang',persyaratan_9 FROM $database2.personal_reg_ta_kbli WHERE ID_Personal='$id_personal'";

					$this->db->query("$query4");
				}elseif($i==5){
					$query5="INSERT IGNORE INTO $database.r_pds_bidang(ID_GROUP,ID_PDS,ID_UPLOAD,ID_Sub_Bidang,Link_File) SELECT '$id_group','$id_pds','13','$id_sub_bidang',persyaratan_13 FROM $database2.personal_reg_ta_kbli WHERE ID_Personal='$id_personal'";

					$this->db->query("$query5");
				}
		}
	}

		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

}
