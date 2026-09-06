<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan_model extends CI_Model
{
	public function __construct(){
		parent::__construct();
	}

	public function get_bidang_ta($id_personal,$sub_bidang){
		$otherdb = $this->load->database('default2', TRUE);

		$otherdb->select('ID_Personal');
		$otherdb->from('personal_reg_ta_kbli');
		$otherdb->where("ID_Personal IN ($id_personal)");
		$otherdb->where('ID_Sub_Bidang',$sub_bidang);
		$query = $otherdb->get();
		return $query->result_array();
	}
	public function get_bidang_tt($id_personal,$sub_bidang){
		$otherdb = $this->load->database('default2', TRUE);

		$otherdb->select('ID_Personal');
		$otherdb->from('personal_reg_tt');
		$otherdb->where("ID_Personal IN ($id_personal)");
		$otherdb->where('ID_Sub_Bidang',$sub_bidang);
		$query = $otherdb->get();
		return $query->result_array();
	}

	public function get_search_vva($record,$option,$count,$kegiatan){
		$propinsi=$this->session->userdata('id_propinsi');
		$this->db->select('tk_kegiatan.Tenaga_kerja,tk_personal.Nama,tk_personal.Email,tk_kegiatan.Nama_kegiatan,propinsi.Nama as Nama_propinsi,tk_personal_kegiatan.ID_Personal,tk_personal_kegiatan.Id,tk_personal_kegiatan.Propinsi,');
		$this->db->from('tk_personal_kegiatan');
		$this->db->join('tk_personal','tk_personal_kegiatan.ID_Personal=tk_personal.ID_Personal','left');
		$this->db->join('tk_kegiatan','tk_personal_kegiatan.Id=tk_kegiatan.Id','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi=tk_personal_kegiatan.Propinsi','left');
		if($this->ion_auth->ketualpjkprov() OR $this->ion_auth->ketualpjkprov_ta() OR $this->ion_auth->ketualpjkprov_tt()){
			$this->db->where('tk_personal_kegiatan.Propinsi',$propinsi);
		}
		if($record!=''){
			if($option=='ktp'){
				$this->db->where('tk_personal_kegiatan.ID_Personal',$record);
			}else{
				$this->db->like('tk_personal.Nama', $record);
			}
		}
		if($count!='0'){
			$this->db->limit($count);
		}
		if($kegiatan!='0'){
			$this->db->where('tk_personal_kegiatan.Id',$kegiatan);
		}
		$this->db->where('tk_personal_kegiatan.Status','0');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_permohonan($id_kegiatan){
		$this->db->select('ID_Personal');
		$this->db->from('tk_personal_reg');
		$this->db->where('Id_kegiatan',$id_kegiatan);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_penilaian($id_kegiatan){
		$this->db->select('ID_Personal');
		$this->db->from('tk_personal_reg');
		$this->db->where('Id_kegiatan',$id_kegiatan);
		$this->db->where("hasil_uji IS NOT NULL");
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_pengalaman($id_personal){

		$this->db->select('tk_personal_pengalaman.id_personal,tk_personal_pengalaman.persyaratan,propinsi.Nama as nama_propinsi,tk_personal_pengalaman.Proyek,tk_personal_pengalaman.Nilai,tk_personal_pengalaman.Tgl_Mulai,tk_personal_pengalaman.Tgl_Selesai,tk_personal_pengalaman.Jabatan,');
		$this->db->from('tk_personal_pengalaman');
		$this->db->join('propinsi','propinsi.ID_Propinsi=tk_personal_pengalaman.Lokasi','left');

		$this->db->where('tk_personal_pengalaman.id_personal',$id_personal);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_pendidikan($id_personal){

		$this->db->select('tk_personal_pendidikan.ID_Countries,tk_personal_pendidikan.Alamat1,tk_personal_pendidikan.ID_Personal,tk_personal_pendidikan.persyaratan,propinsi.Nama as nama_propinsi,kabupaten.Nama as ID_Kabupaten,jenjang_pendidikan.Deskripsi as Jenjang,tk_personal_pendidikan.Nama_Sekolah,tk_personal_pendidikan.Jurusan,tk_personal_pendidikan.Tahun,tk_personal_pendidikan.No_Ijazah');
		$this->db->from('tk_personal_pendidikan');
		$this->db->join('jenjang_pendidikan','tk_personal_pendidikan.Jenjang=jenjang_pendidikan.ID_Jenjang','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi=tk_personal_pendidikan.ID_Propinsi','left');

		$this->db->join('kabupaten','kabupaten.ID_Kabupaten=tk_personal_pendidikan.ID_Kabupaten','left');
		$this->db->where('tk_personal_pendidikan.ID_Personal',$id_personal);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_biaya(){
		$default2 = $this->load->database('default2', TRUE);
		$default2->select('id_kualifikasi,id_proses,(nilai_n*1000) as nilai_n,(nilai_p*1000) as nilai_p,(p_jakon*1000) as p_jakon,(ppn*1000) as ppn');
		$default2->from('profit_share_master');
		$default2->where('id_jenis','TT');
		$default2->where('id_program','2');
		$default2->where('id_permohonan','1');
		$query = $default2->get();
		return $query->result_array();
	}
	public function get_biaya_ta($id_program){
		$default2 = $this->load->database('default2', TRUE);
		$default2->select('id_kualifikasi,id_proses,(nilai_n*1000) as nilai_n,(nilai_p*1000) as nilai_p,(p_jakon*1000) as p_jakon,(ppn*1000) as ppn');
		$default2->from('profit_share_master');
		$default2->where('id_jenis','TA');
		$default2->where('id_program',$id_program);
		$default2->where('id_permohonan','1');
		$query = $default2->get();
		return $query->result_array();
	}
	public function get_invoice($id){
		$this->db->select('tk_kegiatan.Tenaga_kerja,tk_kegiatan.Asosiasi,tk_kegiatan.No_invoice,tk_kegiatan.Lpjk,tk_kegiatan.Invoice,tk_kegiatan.Pengusul,propinsi.Nama as nama_propinsi,tk_kegiatan.Nama_kegiatan,tk_balai.Nama');
		$this->db->from('tk_kegiatan');
		$this->db->join('tk_balai','tk_balai.Id_balai=tk_kegiatan.Pengusul','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi=tk_kegiatan.Lpjk','left');

		$this->db->where('tk_kegiatan.Id',$id);

		$query = $this->db->get();
		return $query->result_array();
	}

	public function asosiasi_tk(){
		$this->db->select('*');
		$this->db->from('personal_profesi_ta');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_kelas3_tt($id){
		$this->db->select('ID_Personal');
		$this->db->from('tk_personal_reg');
		$this->db->where('Id_kegiatan',$id);
		$this->db->where('tenaga_kerja','tt');
		$this->db->where('kualifikasi','3');
		$this->db->where('hasil_uji','0');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_kelas3_ta($id){
		$this->db->select('ID_Personal');
		$this->db->from('tk_personal_reg');
		$this->db->where('Id_kegiatan',$id);
		$this->db->where('tenaga_kerja','ta');
		$this->db->where('kualifikasi','3');
		$this->db->where('hasil_uji','0');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_kelas2_tt($id){
		$this->db->select('ID_Personal');
		$this->db->from('tk_personal_reg');
		$this->db->where('Id_kegiatan',$id);
		$this->db->where('tenaga_kerja','tt');
		$this->db->where('kualifikasi','2');
		$this->db->where('hasil_uji','0');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_kelas1_tt($id){
		$this->db->select('ID_Personal');
		$this->db->from('tk_personal_reg');
		$this->db->where('Id_kegiatan',$id);
		$this->db->where('tenaga_kerja','tt');
		$this->db->where('kualifikasi','1');
		$this->db->where('hasil_uji','0');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_kelas1_tt_lulus($id){
		$this->db->select('ID_Personal');
		$this->db->from('tk_personal_reg');
		$this->db->where('Id_kegiatan',$id);
		$this->db->where('tenaga_kerja','tt');
		$this->db->where('kualifikasi','1');
		$this->db->where('hasil_uji','1');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_kelas2_tt_lulus($id){
		$this->db->select('ID_Personal');
		$this->db->from('tk_personal_reg');
		$this->db->where('Id_kegiatan',$id);
		$this->db->where('tenaga_kerja','tt');
		$this->db->where('kualifikasi','2');
		$this->db->where('hasil_uji','1');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_kelas3_tt_lulus($id){
		$this->db->select('ID_Personal');
		$this->db->from('tk_personal_reg');
		$this->db->where('Id_kegiatan',$id);
		$this->db->where('tenaga_kerja','tt');
		$this->db->where('kualifikasi','3');
		$this->db->where('hasil_uji','1');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_kelas3_ta_lulus($id){
		$this->db->select('ID_Personal');
		$this->db->from('tk_personal_reg');
		$this->db->where('Id_kegiatan',$id);
		$this->db->where('tenaga_kerja','ta');
		$this->db->where('kualifikasi','3');
		$this->db->where('hasil_uji','1');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_cetak_ba_tt($id){
		$this->db->select('tk_kegiatan.Tenaga_kerja,tk_personal_reg.status_hadir,tk_kegiatan.Nama_kegiatan,tk_kegiatan.Tgl_mulai,tk_kegiatan.Tgl_selesai,tk_personal_reg.status_ba,tk_personal_reg.hasil_uji,kabupaten.Nama as nama_kabupaten,personal_profesi_ta.Nama as nama_asosiasi ,tk_personal_reg.jenis_kl,tk_personal_reg.no_hp,tk_personal_reg.tempat_lahir,tk_personal_reg.tgl_lahir,tk_personal_reg.alamat,tk_personal_reg.no_ijazah,tk_personal_reg.jenjang,tk_personal_reg.nama_sekolah,tk_personal_reg.jurusan,tk_personal_reg.tahun_lulus,tk_personal_reg.nama_proyek,tk_personal_reg.lokasi,tk_personal_reg.masa_pekerjaan,tk_personal_reg.jabatan,tk_personal_reg.nilai_kontrak,tk_personal_reg.kualifikasi,tk_personal_reg.tenaga_kerja,tk_personal_reg.sub_bidang,tk_personal_reg.asosiasi,tk_personal_reg.persyaratan_foto,tk_personal_reg.Nama,tk_personal_reg.email,tk_kegiatan.Nama_kegiatan,propinsi.Nama as Nama_propinsi,tk_personal_reg.ID_Personal,tk_personal_reg.Id_kegiatan,tk_personal_reg.propinsi_lpjkp,');
		$this->db->from('tk_personal_reg');
		$this->db->join('tk_kegiatan','tk_personal_reg.Id_kegiatan=tk_kegiatan.Id','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi=tk_personal_reg.propinsi','left');
		$this->db->join('kabupaten','kabupaten.ID_Kabupaten=tk_personal_reg.kabupaten','left');
		$this->db->join("personal_profesi_ta","tk_personal_reg.asosiasi = personal_profesi_ta.ID_asosiasi_Profesi","left");

		$this->db->where('tk_personal_reg.Id_kegiatan',$id);
	//	$this->db->where('tk_personal_reg.tenaga_kerja','tt');
		$this->db->where('tk_personal_reg.hasil_uji IS NOT NULL');

		$query = $this->db->get();
		return $query->result_array();
	}

	function update_lock($id_personal,$propinsis,$kegiatan){
		$date=date("Y-m-d H:i:s");
		$this->db->set('Lock', $date);
		$this->db->where("ID_Personal IN ($id_personal) AND Id IN($kegiatan) AND Propinsi IN ($propinsis)");
		$this->db->update('tk_personal_kegiatan');
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function update_kegiatan($data,$id){
		$this->db->set($data);
		$this->db->where("Id",$id);
		$this->db->update('tk_kegiatan');
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function update_peserta($data,$id_personal,$sub_bidang){
		$this->db->set($data);
		$this->db->where("ID_Personal",$id_personal);
		$this->db->where("sub_bidang",$sub_bidang);
		$this->db->update('tk_personal_reg');
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}
	function update_siki_sad($data,$id_personal){
		$otherdb = $this->load->database('default2', TRUE);

		$otherdb->set($data);
		$otherdb->where("ID_Personal",$id_personal);
		$otherdb->update('personal');
		$otherdb->trans_complete();
		if ($otherdb->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}
	function update_siki($data,$id_personal){
		$this->db->set($data);
		$this->db->where("ID_Personal",$id_personal);
		$this->db->update('personal');
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}


	public function export_data($id){
		$this->db->select('tk_personal_reg.status_hadir,tk_personal_reg.NPWP,tk_personal_reg.hasil_uji,tk_personal_reg.status_ba,tk_personal_reg.status_hadir,tk_personal_reg.Id_Asesor,tk_personal_reg.Jadwal_start,tk_personal_reg.Jadwal_end,kabupaten.Nama as nama_kabupaten,personal_profesi_ta.Nama as nama_asosiasi ,tk_personal_reg.jenis_kl,tk_personal_reg.no_hp,tk_personal_reg.tempat_lahir,tk_personal_reg.tgl_lahir,tk_personal_reg.alamat,tk_personal_reg.no_ijazah,tk_personal_reg.jenjang,tk_personal_reg.nama_sekolah,tk_personal_reg.jurusan,tk_personal_reg.tahun_lulus,tk_personal_reg.nama_proyek,tk_personal_reg.lokasi,tk_personal_reg.masa_pekerjaan,tk_personal_reg.jabatan,tk_personal_reg.nilai_kontrak,tk_personal_reg.kualifikasi,tk_personal_reg.tenaga_kerja,tk_personal_reg.sub_bidang,tk_personal_reg.asosiasi,tk_personal_reg.persyaratan_foto,tk_personal_reg.Nama,tk_personal_reg.email,tk_kegiatan.Nama_kegiatan,propinsi.Nama as Nama_propinsi,tk_personal_reg.ID_Personal,tk_personal_reg.Id_kegiatan,tk_personal_reg.propinsi_lpjkp,');
		$this->db->from('tk_personal_reg');
		$this->db->join('tk_kegiatan','tk_personal_reg.Id_kegiatan=tk_kegiatan.Id','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi=tk_personal_reg.propinsi','left');
			$this->db->join('kabupaten','kabupaten.ID_Kabupaten=tk_personal_reg.kabupaten','left');

		$this->db->join("personal_profesi_ta","tk_personal_reg.asosiasi = personal_profesi_ta.ID_asosiasi_Profesi","left");

		$this->db->where('tk_personal_reg.Id_kegiatan',$id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_balai_propinsi($id){
		$this->db->select('propinsi.Nama,propinsi.ID_Propinsi');
		$this->db->from('tk_balai_propinsi');
		$this->db->join('propinsi','tk_balai_propinsi.Id_propinsi=propinsi.ID_Propinsi','left');

		$this->db->where('tk_balai_propinsi.Id_balai',$id);

		$query = $this->db->get();
		return $query->result_array();
	}

	public function search_peserta($id_personal){
		$this->db->select('tk_personal_reg.sub_bidang,tk_kegiatan.Nama_kegiatan,tk_personal_reg.Id_Asesor,tk_personal_reg.hasil_uji');
		$this->db->from('tk_personal_reg');
		$this->db->join('tk_kegiatan','tk_personal_reg.Id_kegiatan=tk_kegiatan.Id','left');

		$this->db->where('tk_personal_reg.ID_Personal',$id_personal);

		$query = $this->db->get();
		return $query->result_array();
	}

	public function balai(){
		$this->db->select('*');
		$this->db->from('tk_balai');

		$query = $this->db->get();
		return $query->result_array();
	}

	function pilih_asesor_ta($nama){
		$this->db->select('asesor.ID_asesor,asesor.Nama_asesor,asesor.No_KTP,asesor.NPWP,asesor.level,propinsi.Nama as nama_propinsi');
		$this->db->from('asesor');
		$this->db->join('propinsi','asesor.propinsi=propinsi.ID_Propinsi','left');

		$this->db->like('asesor.Nama_asesor', $nama);
		$this->db->where("(asesor.level='5' OR asesor.level='6' OR asesor.level='8' OR asesor.level='9')");
		$this->db->group_by('asesor.ID_asesor');

		$query = $this->db->get();
		return $query->result_array();
	}

	public function kegiatan_get_input($id_personal,$id_propinsi){
		$this->db->select('tk_personal.Nama,tk_personal.Email,tk_kegiatan.Nama_kegiatan,propinsi.Nama as Nama_propinsi,tk_personal_kegiatan.ID_Personal,tk_personal_kegiatan.Id,tk_personal_kegiatan.Propinsi,');
		$this->db->from('tk_personal_kegiatan');
		$this->db->join('tk_personal','tk_personal_kegiatan.ID_Personal=tk_personal.ID_Personal','left');
		$this->db->join('tk_kegiatan','tk_personal_kegiatan.Id=tk_kegiatan.Id','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi=tk_personal_kegiatan.Propinsi','left');
		$this->db->where('tk_personal_kegiatan.ID_Personal',$id_personal);
		$this->db->where('tk_personal_kegiatan.Propinsi',$id_propinsi);
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_acc_pesertas($id_personal,$propinsi,$kegiatan){
		$this->db->select('tk_kegiatan.Jam,tk_personal_kegiatan.Lock,propinsi.Nama as nama_propinsi,tk_kegiatan.Nama_kegiatan,tk_personal_kegiatan.ID_Personal,tk_personal_kegiatan.Propinsi,tk_personal_kegiatan.Id,tk_personal.Nama,tk_personal.Email');
		$this->db->from('tk_personal_kegiatan');
		$this->db->join('tk_personal','tk_personal_kegiatan.ID_Personal=tk_personal.ID_Personal','left');
		$this->db->join('tk_kegiatan','tk_personal_kegiatan.Id=tk_kegiatan.Id','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi=tk_personal_kegiatan.propinsi','left');

		$this->db->where("tk_personal_kegiatan.ID_Personal IN ($id_personal) AND tk_personal_kegiatan.Id IN($kegiatan) AND tk_personal_kegiatan.Propinsi IN ($propinsi) AND tk_personal_kegiatan.Status='0'");
		$query = $this->db->get();
		return $query->result_array();
	}

	function acc_pesertas($id_personal,$propinsi,$kegiatan){
		$this->db->set('Status', 1);
		$this->db->where("ID_Personal IN ($id_personal) AND Id IN($kegiatan) AND Propinsi IN ($propinsi)");
		$this->db->update('tk_personal_kegiatan');
    $this->db->trans_complete();
    if ($this->db->trans_status() === FALSE) {
      return "Failed";
    } else {
      return "Success";
    }
  }

	function failed_pesertas($id_personal,$propinsi,$kegiatan){
		$this->db->set('Status', 2);
		$this->db->where("ID_Personal IN ($id_personal) AND Id IN($kegiatan) AND Propinsi IN ($propinsi)");
		$this->db->update('tk_personal_kegiatan');
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function acc_pesertas2($id_personal){
		$this->db->set('Status', 1);
		$this->db->where("ID_Personal IN ($id_personal)");
		$this->db->update('tk_personal');
    $this->db->trans_complete();
    if ($this->db->trans_status() === FALSE) {
      return "Failed";
    } else {
      return "Success";
    }
  }

	function failed_pesertas2($id_personal){
		$this->db->set('Status', 2);
		$this->db->where("ID_Personal IN ($id_personal)");
		$this->db->update('tk_personal');
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function add_asesor($data,$id_personal,$sub_bidang){
		$this->db->set($data);
		$this->db->where("ID_Personal IN ($id_personal) AND sub_bidang IN($sub_bidang)");
		$this->db->update('tk_personal_reg');
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}


		function add_asesor_penilaian($penilaian,$id_personal,$sub_bidang){
			$this->db->set('hasil_uji', $penilaian);
			$this->db->where("ID_Personal IN ($id_personal) AND sub_bidang IN($sub_bidang) AND Id_Asesor!=''");
			$this->db->update('tk_personal_reg');
			$this->db->trans_complete();
			if ($this->db->trans_status() === FALSE) {
				return "Failed";
			} else {
				return "Success";
			}
		}
  function inserts($table,$data){

    $this->db->insert($table, $data);
    $this->db->trans_complete();
    if ($this->db->trans_status() === FALSE) {
      return "Failed";
    } else {
      return "Success";
    }
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



	public function personal_reg($id_personal){
		$this->db->select('*');
		$this->db->from('tk_personal_reg');
		$this->db->where('ID_Personal',$id_personal);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function personal_reg2($id_personal,$bidang){
		$this->db->select('*');
		$this->db->from('tk_personal_reg');
		$this->db->where('ID_Personal',$id_personal);
		$this->db->where('sub_bidang',$bidang);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_personal2($id_personal){
		$this->db->select('*');
		$this->db->from('tk_personal');
		$this->db->where('ID_Personal',$id_personal);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_personal3($id_personal,$sub_bidang){
		$this->db->select('*');
		$this->db->from('tk_personal_reg');
		$this->db->where("ID_Personal IN ($id_personal) AND sub_bidang IN($sub_bidang) AND Id_Asesor!=''");
		$query = $this->db->get();
		return $query->result_array();
	}


  public function get_personal($id_personal,$propinsi,$kegiatan){
    $this->db->select('tk_personal.ID_Personal,tk_personal.Nama,tk_personal.Email');
    $this->db->from('tk_personal');
		$this->db->join('tk_personal_kegiatan','tk_personal_kegiatan.ID_Personal=tk_personal.ID_Personal','left');
    $this->db->where('tk_personal_kegiatan.ID_Personal',$id_personal);
		$this->db->where('tk_personal_kegiatan.Propinsi',$propinsi);
		$this->db->where('tk_personal_kegiatan.Id',$kegiatan);
    $query = $this->db->get();
    return $query->result_array();
  }

	public function get_peserta($propinsi){
    $this->db->select('tk_kegiatan.Tenaga_kerja,tk_personal.Nama,tk_personal.Email,tk_kegiatan.Nama_kegiatan,propinsi.Nama as Nama_propinsi,tk_personal_kegiatan.ID_Personal,tk_personal_kegiatan.Id,tk_personal_kegiatan.Propinsi,');
    $this->db->from('tk_personal_kegiatan');
		$this->db->join('tk_personal','tk_personal_kegiatan.ID_Personal=tk_personal.ID_Personal','left');
		$this->db->join('tk_kegiatan','tk_personal_kegiatan.Id=tk_kegiatan.Id','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi=tk_personal_kegiatan.Propinsi','left');
		if($this->ion_auth->ketualpjkprov() OR $this->ion_auth->ketualpjkprov_ta() OR $this->ion_auth->ketualpjkprov_tt()){
			$this->db->where('tk_personal_kegiatan.Propinsi',$propinsi);
		}
		$this->db->where('tk_personal_kegiatan.Status','0');


    $query = $this->db->get();
    return $query->result_array();
  }

	public function get_peserta_penialaian($id_user){
		$this->db->select('kabupaten.Nama as nama_kabupaten,personal_profesi_ta.Nama as nama_asosiasi ,tk_personal_reg.jenis_kl,tk_personal_reg.no_hp,tk_personal_reg.tempat_lahir,tk_personal_reg.tgl_lahir,tk_personal_reg.alamat,tk_personal_reg.no_ijazah,tk_personal_reg.jenjang,tk_personal_reg.nama_sekolah,tk_personal_reg.jurusan,tk_personal_reg.tahun_lulus,tk_personal_reg.nama_proyek,tk_personal_reg.lokasi,tk_personal_reg.masa_pekerjaan,tk_personal_reg.jabatan,tk_personal_reg.nilai_kontrak,tk_personal_reg.kualifikasi,tk_personal_reg.tenaga_kerja,tk_personal_reg.sub_bidang,tk_personal_reg.asosiasi,tk_personal_reg.persyaratan_foto,tk_personal_reg.Nama,tk_personal_reg.email,tk_kegiatan.Nama_kegiatan,propinsi.Nama as Nama_propinsi,tk_personal_reg.ID_Personal,tk_personal_reg.Id_kegiatan,tk_personal_reg.propinsi_lpjkp,');
		$this->db->from('tk_personal_reg');
		$this->db->join('tk_kegiatan','tk_personal_reg.Id_kegiatan=tk_kegiatan.Id','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi=tk_personal_reg.propinsi','left');
		$this->db->join('kabupaten','kabupaten.ID_Kabupaten=tk_personal_reg.kabupaten','left');
		$this->db->join("personal_profesi_ta","tk_personal_reg.asosiasi = personal_profesi_ta.ID_asosiasi_Profesi","left");
		$this->db->where('tk_personal_reg.Id_Asesor',$id_user);
		$this->db->where('tk_personal_reg.hasil_uji',null);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_search_vv_perubahan($record,$option,$count,$kegiatan){
		$propinsi=$this->session->userdata('id_propinsi');
		$this->db->select('tk_personal_reg.NPWP,tk_personal_reg.persyaratan_tugas,kabupaten.Nama as nama_kabupaten,personal_profesi_ta.Nama as nama_asosiasi ,tk_personal_reg.jenis_kl,tk_personal_reg.no_hp,tk_personal_reg.tempat_lahir,tk_personal_reg.tgl_lahir,tk_personal_reg.alamat,tk_personal_reg.no_ijazah,tk_personal_reg.jenjang,tk_personal_reg.nama_sekolah,tk_personal_reg.jurusan,tk_personal_reg.tahun_lulus,tk_personal_reg.nama_proyek,tk_personal_reg.lokasi,tk_personal_reg.masa_pekerjaan,tk_personal_reg.jabatan,tk_personal_reg.nilai_kontrak,tk_personal_reg.kualifikasi,tk_personal_reg.tenaga_kerja,tk_personal_reg.sub_bidang,tk_personal_reg.asosiasi,tk_personal_reg.persyaratan_foto,tk_personal_reg.Nama,tk_personal_reg.email,tk_kegiatan.Nama_kegiatan,propinsi.Nama as Nama_propinsi,tk_personal_reg.ID_Personal,tk_personal_reg.Id_kegiatan,tk_personal_reg.propinsi_lpjkp,');
		$this->db->from('tk_personal_reg');
		$this->db->join('tk_kegiatan','tk_personal_reg.Id_kegiatan=tk_kegiatan.Id','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi=tk_personal_reg.propinsi','left');
		$this->db->join('kabupaten','kabupaten.ID_Kabupaten=tk_personal_reg.kabupaten','left');

		$this->db->join("personal_profesi_ta","tk_personal_reg.asosiasi = personal_profesi_ta.ID_asosiasi_Profesi","left");
		if($this->ion_auth->ketualpjkprov() OR $this->ion_auth->ustkprov() OR $this->ion_auth->ketualpjkprov_ta() OR $this->ion_auth->ketualpjkprov_tt()){
			$this->db->where('tk_personal_reg.propinsi_lpjkp',$propinsi);
		}
		if($record!=''){
			if($option=='ktp'){
				$this->db->where('tk_personal_reg.ID_Personal',$record);
			}else{
				$this->db->like('tk_personal_reg.nama', $record);
			}
		}
		if($kegiatan!='0'){
			$this->db->where('tk_personal_reg.Id_kegiatan',$kegiatan);
		}

		$this->db->order_by('tk_personal_reg.tgl_permohonan', 'DESC');
		$this->db->where("tk_personal_reg.Id_Asesor!=''");
		if($count!=0){
			$this->db->limit($count);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_search_vv($record,$option,$count,$kegiatan){
		$propinsi=$this->session->userdata('id_propinsi');
		$this->db->select('tk_personal_reg.NPWP,tk_personal_reg.persyaratan_tugas,kabupaten.Nama as nama_kabupaten,personal_profesi_ta.Nama as nama_asosiasi ,tk_personal_reg.jenis_kl,tk_personal_reg.no_hp,tk_personal_reg.tempat_lahir,tk_personal_reg.tgl_lahir,tk_personal_reg.alamat,tk_personal_reg.no_ijazah,tk_personal_reg.jenjang,tk_personal_reg.nama_sekolah,tk_personal_reg.jurusan,tk_personal_reg.tahun_lulus,tk_personal_reg.nama_proyek,tk_personal_reg.lokasi,tk_personal_reg.masa_pekerjaan,tk_personal_reg.jabatan,tk_personal_reg.nilai_kontrak,tk_personal_reg.kualifikasi,tk_personal_reg.tenaga_kerja,tk_personal_reg.sub_bidang,tk_personal_reg.asosiasi,tk_personal_reg.persyaratan_foto,tk_personal_reg.Nama,tk_personal_reg.email,tk_kegiatan.Nama_kegiatan,propinsi.Nama as Nama_propinsi,tk_personal_reg.ID_Personal,tk_personal_reg.Id_kegiatan,tk_personal_reg.propinsi_lpjkp,');
		$this->db->from('tk_personal_reg');
		$this->db->join('tk_kegiatan','tk_personal_reg.Id_kegiatan=tk_kegiatan.Id','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi=tk_personal_reg.propinsi','left');
		$this->db->join('kabupaten','kabupaten.ID_Kabupaten=tk_personal_reg.kabupaten','left');

		$this->db->join("personal_profesi_ta","tk_personal_reg.asosiasi = personal_profesi_ta.ID_asosiasi_Profesi","left");
		if($this->ion_auth->ketualpjkprov() OR $this->ion_auth->ustkprov() OR $this->ion_auth->ketualpjkprov_ta() OR $this->ion_auth->ketualpjkprov_tt()){
			$this->db->where('tk_personal_reg.propinsi_lpjkp',$propinsi);
		}
		if($record!=''){
			if($option=='ktp'){
				$this->db->where('tk_personal_reg.ID_Personal',$record);
			}else{
				$this->db->like('tk_personal_reg.nama', $record);
			}
		}
		if($kegiatan!='0'){
			$this->db->where('tk_personal_reg.Id_kegiatan',$kegiatan);
		}

		$this->db->order_by('tk_personal_reg.tgl_permohonan', 'DESC');
		$this->db->where('tk_personal_reg.Id_Asesor','');
		if($count!=0){
			$this->db->limit($count);
		}
		$query = $this->db->get();
		return $query->result_array();
	}


	public function get_peserta_vva($propinsi){
		$this->db->select('tk_personal_reg.persyaratan_tugas,kabupaten.Nama as nama_kabupaten,personal_profesi_ta.Nama as nama_asosiasi ,tk_personal_reg.jenis_kl,tk_personal_reg.no_hp,tk_personal_reg.tempat_lahir,tk_personal_reg.tgl_lahir,tk_personal_reg.alamat,tk_personal_reg.no_ijazah,tk_personal_reg.jenjang,tk_personal_reg.nama_sekolah,tk_personal_reg.jurusan,tk_personal_reg.tahun_lulus,tk_personal_reg.nama_proyek,tk_personal_reg.lokasi,tk_personal_reg.masa_pekerjaan,tk_personal_reg.jabatan,tk_personal_reg.nilai_kontrak,tk_personal_reg.kualifikasi,tk_personal_reg.tenaga_kerja,tk_personal_reg.sub_bidang,tk_personal_reg.asosiasi,tk_personal_reg.persyaratan_foto,tk_personal_reg.Nama,tk_personal_reg.email,tk_kegiatan.Nama_kegiatan,propinsi.Nama as Nama_propinsi,tk_personal_reg.ID_Personal,tk_personal_reg.Id_kegiatan,tk_personal_reg.propinsi_lpjkp,');
		$this->db->from('tk_personal_reg');
		$this->db->join('tk_kegiatan','tk_personal_reg.Id_kegiatan=tk_kegiatan.Id','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi=tk_personal_reg.propinsi','left');
		$this->db->join('kabupaten','kabupaten.ID_Kabupaten=tk_personal_reg.kabupaten','left');

		$this->db->join("personal_profesi_ta","tk_personal_reg.asosiasi = personal_profesi_ta.ID_asosiasi_Profesi","left");
		if($this->ion_auth->ketualpjkprov() OR $this->ion_auth->ustkprov() OR $this->ion_auth->ketualpjkprov_ta() OR $this->ion_auth->ketualpjkprov_tt()){
			$this->db->where('tk_personal_reg.propinsi_lpjkp',$propinsi);
		}
		$this->db->order_by('tk_personal_reg.tgl_permohonan', 'DESC');
		$this->db->where('tk_personal_reg.Id_Asesor','');
		$this->db->limit(200);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_peserta_vva_perubahan($propinsi){
		$this->db->select('tk_personal_reg.persyaratan_tugas,tk_personal_reg.Jadwal_start,tk_personal_reg.Jadwal_end,tk_personal_reg.Id_Asesor,kabupaten.Nama as nama_kabupaten,personal_profesi_ta.Nama as nama_asosiasi ,tk_personal_reg.jenis_kl,tk_personal_reg.no_hp,tk_personal_reg.tempat_lahir,tk_personal_reg.tgl_lahir,tk_personal_reg.alamat,tk_personal_reg.no_ijazah,tk_personal_reg.jenjang,tk_personal_reg.nama_sekolah,tk_personal_reg.jurusan,tk_personal_reg.tahun_lulus,tk_personal_reg.nama_proyek,tk_personal_reg.lokasi,tk_personal_reg.masa_pekerjaan,tk_personal_reg.jabatan,tk_personal_reg.nilai_kontrak,tk_personal_reg.kualifikasi,tk_personal_reg.tenaga_kerja,tk_personal_reg.sub_bidang,tk_personal_reg.asosiasi,tk_personal_reg.persyaratan_foto,tk_personal_reg.Nama,tk_personal_reg.email,tk_kegiatan.Nama_kegiatan,propinsi.Nama as Nama_propinsi,tk_personal_reg.ID_Personal,tk_personal_reg.Id_kegiatan,tk_personal_reg.propinsi_lpjkp,');
		$this->db->from('tk_personal_reg');
		$this->db->join('tk_kegiatan','tk_personal_reg.Id_kegiatan=tk_kegiatan.Id','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi=tk_personal_reg.propinsi','left');
			$this->db->join('kabupaten','kabupaten.ID_Kabupaten=tk_personal_reg.kabupaten','left');

		$this->db->join("personal_profesi_ta","tk_personal_reg.asosiasi = personal_profesi_ta.ID_asosiasi_Profesi","left");
		if($this->ion_auth->ketualpjkprov() OR $this->ion_auth->ustkprov() OR $this->ion_auth->ketualpjkprov_ta() OR $this->ion_auth->ketualpjkprov_tt()){
			$this->db->where('tk_personal_reg.propinsi_lpjkp',$propinsi);
		}
		$this->db->where("tk_personal_reg.Id_Asesor!=''");

		$query = $this->db->get();
		return $query->result_array();
	}

	public function permohonan($id){
		$this->db->select('tk_personal_reg.NPWP,kabupaten.Nama as nama_kabupaten,personal_profesi_ta.Nama as nama_asosiasi ,tk_personal_reg.jenis_kl,tk_personal_reg.no_hp,tk_personal_reg.tempat_lahir,tk_personal_reg.tgl_lahir,tk_personal_reg.alamat,tk_personal_reg.no_ijazah,tk_personal_reg.jenjang,tk_personal_reg.nama_sekolah,tk_personal_reg.jurusan,tk_personal_reg.tahun_lulus,tk_personal_reg.nama_proyek,tk_personal_reg.lokasi,tk_personal_reg.masa_pekerjaan,tk_personal_reg.jabatan,tk_personal_reg.nilai_kontrak,tk_personal_reg.kualifikasi,tk_personal_reg.tenaga_kerja,tk_personal_reg.sub_bidang,tk_personal_reg.asosiasi,tk_personal_reg.persyaratan_foto,tk_personal_reg.persyaratan_tugas,tk_personal_reg.Nama,tk_personal_reg.email,tk_kegiatan.Nama_kegiatan,propinsi.Nama as Nama_propinsi,tk_personal_reg.ID_Personal,tk_personal_reg.Id_kegiatan,tk_personal_reg.propinsi_lpjkp,');
		$this->db->from('tk_personal_reg');
		$this->db->join('tk_kegiatan','tk_personal_reg.Id_kegiatan=tk_kegiatan.Id','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi=tk_personal_reg.propinsi','left');
			$this->db->join('kabupaten','kabupaten.ID_Kabupaten=tk_personal_reg.kabupaten','left');

		$this->db->join("personal_profesi_ta","tk_personal_reg.asosiasi = personal_profesi_ta.ID_asosiasi_Profesi","left");

		$this->db->where('tk_personal_reg.Id_kegiatan',$id);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function belum_ditunjuk($id){
		$this->db->select('kabupaten.Nama as nama_kabupaten,personal_profesi_ta.Nama as nama_asosiasi ,tk_personal_reg.jenis_kl,tk_personal_reg.no_hp,tk_personal_reg.tempat_lahir,tk_personal_reg.tgl_lahir,tk_personal_reg.alamat,tk_personal_reg.no_ijazah,tk_personal_reg.jenjang,tk_personal_reg.nama_sekolah,tk_personal_reg.jurusan,tk_personal_reg.tahun_lulus,tk_personal_reg.nama_proyek,tk_personal_reg.lokasi,tk_personal_reg.masa_pekerjaan,tk_personal_reg.jabatan,tk_personal_reg.nilai_kontrak,tk_personal_reg.kualifikasi,tk_personal_reg.tenaga_kerja,tk_personal_reg.sub_bidang,tk_personal_reg.asosiasi,tk_personal_reg.persyaratan_foto,tk_personal_reg.Nama,tk_personal_reg.email,tk_kegiatan.Nama_kegiatan,propinsi.Nama as Nama_propinsi,tk_personal_reg.ID_Personal,tk_personal_reg.Id_kegiatan,tk_personal_reg.propinsi_lpjkp,');
		$this->db->from('tk_personal_reg');
		$this->db->join('tk_kegiatan','tk_personal_reg.Id_kegiatan=tk_kegiatan.Id','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi=tk_personal_reg.propinsi','left');
			$this->db->join('kabupaten','kabupaten.ID_Kabupaten=tk_personal_reg.kabupaten','left');

		$this->db->join("personal_profesi_ta","tk_personal_reg.asosiasi = personal_profesi_ta.ID_asosiasi_Profesi","left");

		$this->db->where('tk_personal_reg.Id_Asesor','');
		$this->db->where('tk_personal_reg.Id_kegiatan',$id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function belum_dinilai($id){
		$this->db->select('kabupaten.Nama as nama_kabupaten,personal_profesi_ta.Nama as nama_asosiasi ,tk_personal_reg.jenis_kl,tk_personal_reg.no_hp,tk_personal_reg.tempat_lahir,tk_personal_reg.tgl_lahir,tk_personal_reg.alamat,tk_personal_reg.no_ijazah,tk_personal_reg.jenjang,tk_personal_reg.nama_sekolah,tk_personal_reg.jurusan,tk_personal_reg.tahun_lulus,tk_personal_reg.nama_proyek,tk_personal_reg.lokasi,tk_personal_reg.masa_pekerjaan,tk_personal_reg.jabatan,tk_personal_reg.nilai_kontrak,tk_personal_reg.kualifikasi,tk_personal_reg.tenaga_kerja,tk_personal_reg.sub_bidang,tk_personal_reg.asosiasi,tk_personal_reg.persyaratan_foto,tk_personal_reg.Nama,tk_personal_reg.email,tk_kegiatan.Nama_kegiatan,propinsi.Nama as Nama_propinsi,tk_personal_reg.ID_Personal,tk_personal_reg.Id_kegiatan,tk_personal_reg.propinsi_lpjkp,');
		$this->db->from('tk_personal_reg');
		$this->db->join('tk_kegiatan','tk_personal_reg.Id_kegiatan=tk_kegiatan.Id','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi=tk_personal_reg.propinsi','left');
			$this->db->join('kabupaten','kabupaten.ID_Kabupaten=tk_personal_reg.kabupaten','left');

		$this->db->join("personal_profesi_ta","tk_personal_reg.asosiasi = personal_profesi_ta.ID_asosiasi_Profesi","left");
		$this->db->where("tk_personal_reg.Id_Asesor !=''");
		$this->db->where('tk_personal_reg.hasil_uji',null);
		$this->db->where('tk_personal_reg.Id_kegiatan',$id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function tdk_lolos_asesor($id){
		$this->db->select('kabupaten.Nama as nama_kabupaten,personal_profesi_ta.Nama as nama_asosiasi ,tk_personal_reg.jenis_kl,tk_personal_reg.no_hp,tk_personal_reg.tempat_lahir,tk_personal_reg.tgl_lahir,tk_personal_reg.alamat,tk_personal_reg.no_ijazah,tk_personal_reg.jenjang,tk_personal_reg.nama_sekolah,tk_personal_reg.jurusan,tk_personal_reg.tahun_lulus,tk_personal_reg.nama_proyek,tk_personal_reg.lokasi,tk_personal_reg.masa_pekerjaan,tk_personal_reg.jabatan,tk_personal_reg.nilai_kontrak,tk_personal_reg.kualifikasi,tk_personal_reg.tenaga_kerja,tk_personal_reg.sub_bidang,tk_personal_reg.asosiasi,tk_personal_reg.persyaratan_foto,tk_personal_reg.Nama,tk_personal_reg.email,tk_kegiatan.Nama_kegiatan,propinsi.Nama as Nama_propinsi,tk_personal_reg.ID_Personal,tk_personal_reg.Id_kegiatan,tk_personal_reg.propinsi_lpjkp,');
		$this->db->from('tk_personal_reg');
		$this->db->join('tk_kegiatan','tk_personal_reg.Id_kegiatan=tk_kegiatan.Id','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi=tk_personal_reg.propinsi','left');
			$this->db->join('kabupaten','kabupaten.ID_Kabupaten=tk_personal_reg.kabupaten','left');

		$this->db->join("personal_profesi_ta","tk_personal_reg.asosiasi = personal_profesi_ta.ID_asosiasi_Profesi","left");

		$this->db->where('tk_personal_reg.hasil_uji','0');
		$this->db->where('tk_personal_reg.Id_kegiatan',$id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function lolos_asesor($id){
		$this->db->select('kabupaten.Nama as nama_kabupaten,personal_profesi_ta.Nama as nama_asosiasi ,tk_personal_reg.jenis_kl,tk_personal_reg.no_hp,tk_personal_reg.tempat_lahir,tk_personal_reg.tgl_lahir,tk_personal_reg.alamat,tk_personal_reg.no_ijazah,tk_personal_reg.jenjang,tk_personal_reg.nama_sekolah,tk_personal_reg.jurusan,tk_personal_reg.tahun_lulus,tk_personal_reg.nama_proyek,tk_personal_reg.lokasi,tk_personal_reg.masa_pekerjaan,tk_personal_reg.jabatan,tk_personal_reg.nilai_kontrak,tk_personal_reg.kualifikasi,tk_personal_reg.tenaga_kerja,tk_personal_reg.sub_bidang,tk_personal_reg.asosiasi,tk_personal_reg.persyaratan_foto,tk_personal_reg.Nama,tk_personal_reg.email,tk_kegiatan.Nama_kegiatan,propinsi.Nama as Nama_propinsi,tk_personal_reg.ID_Personal,tk_personal_reg.Id_kegiatan,tk_personal_reg.propinsi_lpjkp,');
		$this->db->from('tk_personal_reg');
		$this->db->join('tk_kegiatan','tk_personal_reg.Id_kegiatan=tk_kegiatan.Id','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi=tk_personal_reg.propinsi','left');
			$this->db->join('kabupaten','kabupaten.ID_Kabupaten=tk_personal_reg.kabupaten','left');

		$this->db->join("personal_profesi_ta","tk_personal_reg.asosiasi = personal_profesi_ta.ID_asosiasi_Profesi","left");

		$this->db->where('tk_personal_reg.hasil_uji','1');
		$this->db->where('tk_personal_reg.Id_kegiatan',$id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function jumlah_pendaftar6($id_kegiatan){
		$this->db->select('ID_Personal');
		$this->db->from('tk_personal_kegiatan');
		$this->db->where('Id',$id_kegiatan);
		$this->db->where('Status','2');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function jumlah_pendaftar7($id_kegiatan){
		$this->db->select('ID_Personal');
		$this->db->from('tk_personal_kegiatan');
		$this->db->where('Id',$id_kegiatan);
		$this->db->where('Status','1');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function jumlah_pendaftar8($id_kegiatan){
		$this->db->select('ID_Personal');
		$this->db->from('tk_personal_reg');
		$this->db->where('Id_kegiatan',$id_kegiatan);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function jumlah_pendaftar9($id_kegiatan){
		$user="LM-ONLINE ".$id_kegiatan;
		$this->db->select('tk_registrasi_history_tt.ID_Personal');
		$this->db->from('tk_registrasi_history_tt');
		$this->db->join('tk_personal_reg','tk_personal_reg.ID_Personal=tk_registrasi_history_tt.ID_Personal AND tk_registrasi_history_tt.tgl_permohonan=tk_personal_reg.tgl_permohonan AND tk_personal_reg.sub_bidang=tk_registrasi_history_tt.id_sub_bidang','left');
		//$this->db->join('personal_reg_tt','personal_reg_tt.ID_Personal=tk_registrasi_history_tt.ID_Personal AND tk_registrasi_history_tt.tgl_permohonan=personal_reg_tt.Tgl_Registrasi','left');
		$this->db->where('tk_personal_reg.Id_kegiatan',$id_kegiatan);
		$this->db->where('tk_registrasi_history_tt.id_status','4');
		//$this->db->where('personal_reg_tt.username',$user);

		$query = $this->db->get();
		return $query->result_array();
	}

	public function jumlah_pendaftar10($id_kegiatan){
		$user="LM-ONLINE ".$id_kegiatan;
		$this->db->select('tk_registrasi_history.ID_Personal');
		$this->db->from('tk_registrasi_history');
		$this->db->join('tk_personal_reg','tk_personal_reg.ID_Personal=tk_registrasi_history.ID_Personal AND tk_registrasi_history.tgl_permohonan=tk_personal_reg.tgl_permohonan AND AND tk_personal_reg.sub_bidang=tk_registrasi_history.id_sub_bidang','left');
		//$this->db->join('personal_reg_ta_kbli','personal_reg_ta_kbli.ID_Personal=tk_registrasi_history.ID_Personal AND tk_registrasi_history.tgl_permohonan=personal_reg_ta_kbli.Tgl_Registrasi','left');
		$this->db->where('tk_personal_reg.Id_kegiatan',$id_kegiatan);
		$this->db->where('tk_registrasi_history.id_status','4');
		//$this->db->where('personal_reg_ta_kbli.username',$user);

		$query = $this->db->get();
		return $query->result_array();
	}

	public function jumlah_pendaftar($id_kegiatan){
		$this->db->select('ID_Personal');
		$this->db->from('tk_personal_kegiatan');
		$this->db->where('Id',$id_kegiatan);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function detail_pendaftar($id_kegiatan){
		$this->db->select('tk_personal.Nama,tk_personal.Email,tk_kegiatan.Nama_kegiatan,propinsi.Nama as Nama_propinsi,tk_personal_kegiatan.ID_Personal,tk_personal_kegiatan.Id,tk_personal_kegiatan.Propinsi,');
		$this->db->from('tk_personal_kegiatan');
		$this->db->join('tk_personal','tk_personal_kegiatan.ID_Personal=tk_personal.ID_Personal','left');
		$this->db->join('tk_kegiatan','tk_personal_kegiatan.Id=tk_kegiatan.Id','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi=tk_personal_kegiatan.Propinsi','left');
		$this->db->where('tk_personal_kegiatan.Id',$id_kegiatan);


		$query = $this->db->get();
		return $query->result_array();

	}

	public function tdk_lolos_vva($id_kegiatan){
		$this->db->select('tk_personal.Nama,tk_personal.Email,tk_kegiatan.Nama_kegiatan,propinsi.Nama as Nama_propinsi,tk_personal_kegiatan.ID_Personal,tk_personal_kegiatan.Id,tk_personal_kegiatan.Propinsi,');
		$this->db->from('tk_personal_kegiatan');
		$this->db->join('tk_personal','tk_personal_kegiatan.ID_Personal=tk_personal.ID_Personal','left');
		$this->db->join('tk_kegiatan','tk_personal_kegiatan.Id=tk_kegiatan.Id','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi=tk_personal_kegiatan.Propinsi','left');
		$this->db->where('tk_personal_kegiatan.Id',$id_kegiatan);
		$this->db->where('tk_personal_kegiatan.Status','2');

		$query = $this->db->get();
		return $query->result_array();

	}

	public function detail_lolos_vva($id_kegiatan){
		$this->db->select('tk_personal.Nama,tk_personal.Email,tk_kegiatan.Nama_kegiatan,propinsi.Nama as Nama_propinsi,tk_personal_kegiatan.ID_Personal,tk_personal_kegiatan.Id,tk_personal_kegiatan.Propinsi,');
		$this->db->from('tk_personal_kegiatan');
		$this->db->join('tk_personal','tk_personal_kegiatan.ID_Personal=tk_personal.ID_Personal','left');
		$this->db->join('tk_kegiatan','tk_personal_kegiatan.Id=tk_kegiatan.Id','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi=tk_personal_kegiatan.Propinsi','left');
		$this->db->where('tk_personal_kegiatan.Id',$id_kegiatan);
		$this->db->where('tk_personal_kegiatan.Status','1');

		$query = $this->db->get();
		return $query->result_array();

	}

	public function jumlah_pendaftar2($id_kegiatan){
		$this->db->select('ID_Personal');
		$this->db->from('tk_personal_reg');
		$this->db->where('Id_kegiatan',$id_kegiatan);
		$this->db->where('Id_Asesor','');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function jumlah_pendaftar3($id_kegiatan){
		$this->db->select('ID_Personal');
		$this->db->from('tk_personal_reg');
		$this->db->where('Id_kegiatan',$id_kegiatan);
		$this->db->where("Id_Asesor!=''");
		$this->db->where("hasil_uji",null);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function jumlah_pendaftar4($id_kegiatan){
		$this->db->select('ID_Personal');
		$this->db->from('tk_personal_reg');
		$this->db->where('Id_kegiatan',$id_kegiatan);
		$this->db->where("hasil_uji",'0');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function jumlah_pendaftar5($id_kegiatan){
		$this->db->select('ID_Personal');
		$this->db->from('tk_personal_reg');
		$this->db->where('Id_kegiatan',$id_kegiatan);
		$this->db->where("hasil_uji",'1');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_search_kegiatan($nama_kegiatan,$propinsi,$count){

		$this->db->select('tk_kegiatan.Status_bayar,tk_kegiatan.Status_close,tk_kegiatan.Id,propinsi.Nama as nama_propinsi,tk_kegiatan.Tenaga_kerja,tk_kegiatan.Invoice,tk_kegiatan.Tgl_sertifikat,tk_balai.Nama,tk_kegiatan.Id,tk_kegiatan.Nama_kegiatan,tk_kegiatan.Tgl_mulai,tk_kegiatan.Tgl_selesai,tk_kegiatan.Tempat_uji');
		$this->db->from('tk_kegiatan');
		$this->db->join('tk_balai','tk_balai.Id_balai=tk_kegiatan.Pengusul','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi=tk_kegiatan.Lpjk','left');
		if($nama_kegiatan!=''){
			$this->db->like('tk_kegiatan.Nama_kegiatan',$nama_kegiatan);
		}
		if($this->ion_auth->ketualpjkprov() OR $this->ion_auth->ustkprov() OR $this->ion_auth->ketualpjkprov_ta() OR $this->ion_auth->ketualpjkprov_tt()){
			$propinsi=$this->session->userdata('id_propinsi');
			$this->db->where('tk_kegiatan.Lpjk',$propinsi);

		}else{
			if($propinsi!='0'){
				$this->db->where('tk_kegiatan.Lpjk',$propinsi);
			}
		}

		if($count!='0'){
			$this->db->limit($count);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_kegiatan2(){

		$this->db->select('tk_kegiatan.Id,propinsi.Nama as nama_propinsi,tk_kegiatan.Tenaga_kerja,tk_kegiatan.Invoice,tk_kegiatan.Tgl_sertifikat,tk_balai.Nama,tk_kegiatan.Id,tk_kegiatan.Nama_kegiatan,tk_kegiatan.Tgl_mulai,tk_kegiatan.Tgl_selesai,tk_kegiatan.Tempat_uji');
		$this->db->from('tk_kegiatan');
		$this->db->join('tk_balai','tk_balai.Id_balai=tk_kegiatan.Pengusul','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi=tk_kegiatan.Lpjk','left');
		if($this->ion_auth->ketualpjkprov() OR $this->ion_auth->ustkprov() OR $this->ion_auth->ketualpjkprov_ta() OR $this->ion_auth->ketualpjkprov_tt()){
			$propinsi=$this->session->userdata('id_propinsi');
			$this->db->where('tk_kegiatan.Lpjk',$propinsi);

		}else{
		    $this->db->limit(10);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_kegiatan30(){

		$this->db->select('tk_kegiatan.Id,propinsi.Nama as nama_propinsi,tk_kegiatan.Tenaga_kerja,tk_kegiatan.Invoice,tk_kegiatan.Tgl_sertifikat,tk_balai.Nama,tk_kegiatan.Id,tk_kegiatan.Nama_kegiatan,tk_kegiatan.Tgl_mulai,tk_kegiatan.Tgl_selesai,tk_kegiatan.Tempat_uji');
		$this->db->from('tk_kegiatan');
		$this->db->join('tk_balai','tk_balai.Id_balai=tk_kegiatan.Pengusul','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi=tk_kegiatan.Lpjk','left');
		if($this->ion_auth->ketualpjkprov() OR $this->ion_auth->ustkprov() OR $this->ion_auth->ketualpjkprov_ta() OR $this->ion_auth->ketualpjkprov_tt()){
			$propinsi=$this->session->userdata('id_propinsi');
			$this->db->where('tk_kegiatan.Lpjk',$propinsi);

		}else{
			$this->db->limit(50);
		}
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_kegiatan3($asosiasi){

		$this->db->select('tk_kegiatan.Tgl_vva,tk_kegiatan.Tgl_melengkapi,tk_kegiatan.Tgl_uji,tk_kegiatan.Tgl_sertifikat,tk_kegiatan.Tenaga_kerja,tk_kegiatan.Invoice,tk_kegiatan.Tgl_sertifikat,tk_balai.Nama,tk_kegiatan.Id,tk_kegiatan.Nama_kegiatan,tk_kegiatan.Tgl_mulai,tk_kegiatan.Tgl_selesai,tk_kegiatan.Tempat_uji');
		$this->db->from('tk_kegiatan');
		$this->db->join('tk_balai','tk_balai.Id_balai=tk_kegiatan.Pengusul','left');
		$this->db->where('tk_kegiatan.Asosiasi',$asosiasi);
		if($this->ion_auth->asosiasi_profesi_ta_propinsi()){
			$propinsi=$this->session->userdata('id_propinsi');
			$this->db->where('tk_kegiatan.Lpjk',$propinsi);

		}
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_kegiatan_all(){
		$this->db->select('tk_kegiatan.No_invoice,tk_kegiatan.Status_bayar,tk_kegiatan.Status_close,tk_kegiatan.Tenaga_kerja,tk_kegiatan.sub_bidang,propinsi.Nama as nama_propinsi,tk_kegiatan.Id,tk_kegiatan.Invoice,tk_kegiatan.Tgl_sertifikat,tk_balai.Nama,tk_kegiatan.Id,tk_kegiatan.Nama_kegiatan,tk_kegiatan.Tgl_mulai,tk_kegiatan.Tgl_selesai,tk_kegiatan.Tempat_uji');
		$this->db->from('tk_kegiatan');
		$this->db->join('tk_balai','tk_balai.Id_balai=tk_kegiatan.Pengusul','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi=tk_kegiatan.Lpjk','left');
		//$this->db->where("tk_kegiatan.Tgl_mulai BETWEEN '2020-06-01' AND '2020-11-12'");
		$this->db->order_by('tk_kegiatan.pengusul','ASC');
		$this->db->order_by('tk_kegiatan.Lpjk', 'ASC');
		//$this->db->limit(100);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_kegiatan200($id){
		$this->db->select('*');
		$this->db->from('tk_kegiatan');
		$this->db->where("Id IN ($id)");
		$query = $this->db->get();
		return $query->result_array();
	}

  public function get_kegiatan($id){
    $this->db->select('*');
    $this->db->from('tk_kegiatan');
    $this->db->where('Id',$id);
    $query = $this->db->get();
    return $query->result_array();
  }
	public function get_kegiatan_invoice($pengusul,$id){
		$this->db->select('*');
		$this->db->from('tk_kegiatan');
		$this->db->where('Id',$id);
		$this->db->where('Pengusul',$pengusul);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_kegiatan_propinsi($propinsi){
		$this->db->select('*');
		$this->db->from('tk_kegiatan');
		$this->db->where('Lpjk',$propinsi);
		$this->db->where("No_invoice != ''");
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_propinsi(){
		$this->db->select('ID_Propinsi,Nama');
		$this->db->from('propinsi');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_propinsi2($propinsi){
		$this->db->select('ID_Propinsi,Nama');
		$this->db->from('propinsi');
		$this->db->where('ID_Propinsi',$propinsi);
		$query = $this->db->get();
		return $query->result_array();
	}
	function get_nrta_max(){
		$this->db->select('MAX( Nomor_Urut_Baru )');
		$this->db->from('personal_nrta_kbli');
		$query = $this->db->get();
    return $query->result_array();

	}
	function get_nrta($id_personal){
		$this->db->select('Nomor_Urut_Baru');
		$this->db->from('personal_nrta_kbli');
		$this->db->where('ID_Personal',$id_personal);
		$query = $this->db->get();
		return $query->result_array();
	}

	function get_nrtt_max($id_personal){
		$this->db->select('MAX( Nomor_Urut )');
		$this->db->from('personal_nrtt');
		$this->db->where('ID_propinsi',$id_personal);
		$query = $this->db->get();
		return $query->result_array();
	}
	function get_nrtt($id_personal,$id_propinsi){
		$this->db->select('Nomor_Urut');
		$this->db->from('personal_nrtt');
		$this->db->where('ID_Personal',$id_personal);
		$this->db->where('ID_propinsi',$id_propinsi);
		$query = $this->db->get();
		return $query->result_array();
	}

  public function kegiatan(){
  $date=date("Y-m-d H:i:s");
  $this->db->select('*');
  $this->db->from('tk_kegiatan');
  $this->db->where('Tgl_selesai>=',$date);
  $query = $this->db->get();
  return $query->result_array();
  }

  function insert($table,$data){
		$insert_query = $this->db->insert_string($table, $data);
		$insert_query = str_replace('INSERT INTO','INSERT IGNORE INTO',$insert_query);
    $this->db->query($insert_query);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	function inserts2($select,$where){
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

	function insert_sad($table,$data){
		$otherdb = $this->load->database('default2', TRUE);

		$insert_query = $otherdb->insert_string($table, $data);
		$insert_query = str_replace('INSERT INTO','INSERT IGNORE INTO',$insert_query);
    $otherdb->query($insert_query);
		$otherdb->trans_complete();
		if ($otherdb->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

}
?>
