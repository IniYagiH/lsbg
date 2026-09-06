<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bu_model extends CI_Model
{
	var $table = 'lsbu_registrasi_history';

	//set kolom order, kolom  pertama saya null untuk kolom edit dan hapus
	var $column_order = array('lsbu_registrasi_history.status_2');

	var $column_search = array('lsbu_registrasi_history.NIB','lsbu_bu.nama','lsbu_registrasi.nomor_kbli');
	// default order
	var $order = array('status_2' => 'desc');
	public function __construct(){
		parent::__construct();
	}
	private function _get_datatables_query()
	{
		$this->db->select("GROUP_CONCAT(distinct lsbu_registrasi.nomor_kbli, ' ') as concat_kbli,lsbu_registrasi_history.tgl_biaya,lsbu_registrasi_history.no_urut,lsbu_registrasi_history.file_pembayaran,lsbu_registrasi_history.file_perjanjian,SUM(lsbu_biaya.biaya) as biaya_lsbu,lsbu_registrasi_history.status_0,GROUP_CONCAT(distinct lsbu_registrasi.id_sub_klasifikasi, ' ') as concat_sub,lsbu_registrasi.qr,GROUP_CONCAT(distinct lsbu_registrasi.id_klasifikasi, ' ') as concat_klasifikasi,GROUP_CONCAT(distinct lsbu_registrasi.kualifikasi, ' ') as concat_kualifikasi,lsbu_bu.nama,lsbu_registrasi_history.NIB,lsbu_registrasi_history.tgl_permohonan,lsbu_registrasi_history.propinsi,lsbu_registrasi_history.tahun,lsbu_registrasi_history.status_0,lsbu_registrasi_history.status_1,lsbu_registrasi_history.status_2,lsbu_registrasi_history.status_3");
		$this->db->from('lsbu_registrasi_history');
		$this->db->join('lsbu_registrasi','lsbu_registrasi.NIB=lsbu_registrasi_history.NIB AND lsbu_registrasi.tgl_permohonan=lsbu_registrasi_history.tgl_permohonan','left');
		$this->db->join('lsbu_asesor_penilaian','lsbu_registrasi.NIB=lsbu_asesor_penilaian.NIB AND lsbu_registrasi.tgl_permohonan=lsbu_asesor_penilaian.tgl_permohonan','left');

		$this->db->join('lsbu_bu','lsbu_bu.NIB=lsbu_registrasi_history.NIB','left');
		$this->db->join('lsbu_biaya',"lsbu_biaya.kualifikasi=lsbu_registrasi.kualifikasi AND lsbu_biaya.tipe=lsbu_bu.klasifikasi_jenis_usaha",'left');

		$this->db->where('lsbu_registrasi_history.status_3','0000-00-00');
		$this->db->where("lsbu_registrasi_history.status_2!='0000-00-00'");
		$this->db->where("lsbu_asesor_penilaian.pemutus","1");
		$this->db->group_by(array("lsbu_registrasi_history.NIB", "lsbu_registrasi_history.tgl_permohonan"));
			$i = 0;
			foreach ($this->column_search as $item) // loop kolom
			{
					if ($this->input->post('search')['value']) // jika datatable mengirim POST untuk search
					{
							if ($i === 0) // looping pertama
							{
									$this->db->group_start();
									$this->db->like($item, $this->input->post('search')['value']);
							} else {
									$this->db->or_like($item, $this->input->post('search')['value']);
							}
							if (count($this->column_search) - 1 == $i) //looping terakhir
									$this->db->group_end();
					}
					$i++;
			}

			// jika datatable mengirim POST untuk order
			if ($this->input->post('order')) {
					$this->db->order_by($this->column_order[$this->input->post('order')['0']['column']], $this->input->post('order')['0']['dir']);
			} else if (isset($this->order)) {
					$order = $this->order;
					$this->db->order_by(key($order), $order[key($order)]);
			}
	}
	function get_datatables()
	{
			$this->_get_datatables_query();
			if ($this->input->post('length') != -1)
					$this->db->limit($this->input->post('length'), $this->input->post('start'));
			$query = $this->db->get();
			return $query->result();
	}
	function count_filtered()
	{
			$this->_get_datatables_query();
			$query = $this->db->get();
			return $query->num_rows();
	}
	public function count_all()
	{
			$this->db->from($this->table);
			return $this->db->count_all_results();
	}
	public function list_perbaikan()
	{
			$this->db->select('*');
			$this->db->from('lsbu_perbaikan_kbli');
			$this->db->where("status",'0');

			$query = $this->db->get();
			return $query->result_array();
	}
	public function list_pemantauan($id_user){
		$this->db->select("lsbu_registrasi.kualifikasi,lsbu_bu.Nama as nama_bujk,lsbu_klasifikasi_jenis_usaha.Nama as nama_jenis,lsbu_bentuk.Nama as bentuk_nama,lsbu_permohonan_masuk.status,lsbu_permohonan_masuk.NIB,lsbu_permohonan_masuk.id_izin,lsbu_permohonan_masuk.id_sub_klasifikasi,propinsi.Nama as nama_propinsi,");
		$this->db->from('mitra_nib');
		$this->db->join('lsbu_permohonan_masuk','mitra_nib.NIB=lsbu_permohonan_masuk.NIB','left');

		$this->db->join('lsbu_registrasi','lsbu_registrasi.id_izin=lsbu_permohonan_masuk.id_izin','left');
		$this->db->join('lsbu_bu','lsbu_bu.NIB=lsbu_permohonan_masuk.NIB','left');
		$this->db->join('propinsi','lsbu_bu.id_propinsi=propinsi.ID_Propinsi','left');
		$this->db->join('lsbu_bentuk','lsbu_bentuk.id_bentuk=lsbu_bu.bentuk_usaha','left');
		$this->db->join('lsbu_klasifikasi_jenis_usaha','lsbu_klasifikasi_jenis_usaha.id_klasifikasi_jenis_usaha=lsbu_bu.klasifikasi_jenis_usaha','left');
		$this->db->where('mitra_nib.Username',$id_user);



		$this->db->group_by(array("lsbu_permohonan_masuk.id_izin"));
		$query = $this->db->get();
		return $query->result_array();
	}
	function delete_permohonan_izin($nib,$id_izin){
		$this->db->where('NIB',$nib);
		$this->db->where('id_izin',$id_izin);
		$this->db->delete('lsbu_registrasi');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}

	}
	public function pjbu_opr_izin_perubahan($id_izin){
		$this->db->select('*');
		$this->db->from('lsbu_pjbu_izin_perubahan');
		$this->db->where('id_izin',$id_izin);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function pjskbu_opr_izin_perubahan($id_izin){
		$this->db->select('*');
		$this->db->from('lsbu_pjskbu_izin_perubahan');
		$this->db->where('id_izin',$id_izin);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function neraca_ski_izin_perubahan($id_izin){
		$this->db->select('*');
		$this->db->from('lsbu_keuangan_neraca_2_izin_perubahan');
		$this->db->where('id_izin',$id_izin);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function biodata_opr_izin_perubhan($id_izin){
		$this->db->select('lsbu_bu_izin_perubahan.sub_klasifikasi,lsbu_bu_izin_perubahan.sptjm,lsbu_bu_izin_perubahan.nama_pimpinan,lsbu_bentuk.Nama as bentuk_usaha,lsbu_klasifikasi_jenis_usaha.Nama as jenis_usaha,kabupaten.Nama as id_kabupaten,propinsi.Nama as id_propinsi,lsbu_bu_izin_perubahan.NIB,lsbu_bu_izin_perubahan.nama,lsbu_bu_izin_perubahan.klasifikasi_jenis_usaha,lsbu_bu_izin_perubahan.jabatan_pimpinan,lsbu_bu_izin_perubahan.map,lsbu_bu_izin_perubahan.minisite_name,lsbu_bu_izin_perubahan.tgl_didirikan,lsbu_bu_izin_perubahan.rekening,lsbu_bu_izin_perubahan.alamat_bu,lsbu_bu_izin_perubahan.kodepos,lsbu_bu_izin_perubahan.telepon,lsbu_bu_izin_perubahan.hp,lsbu_bu_izin_perubahan.fax,lsbu_bu_izin_perubahan.email,lsbu_bu_izin_perubahan.email_pic,lsbu_bu_izin_perubahan.web,lsbu_bu_izin_perubahan.npwp,lsbu_bu_izin_perubahan.negara_id,lsbu_bu_izin_perubahan.file_nib,lsbu_bu_izin_perubahan.file_npwp');
		$this->db->from('lsbu_bu_izin_perubahan');
		$this->db->join('propinsi','propinsi.ID_Propinsi=lsbu_bu_izin_perubahan.id_propinsi','left');
		$this->db->join('kabupaten','kabupaten.ID_Kabupaten=lsbu_bu_izin_perubahan.id_kabupaten','left');
		$this->db->join('lsbu_bentuk','lsbu_bentuk.id_bentuk=lsbu_bu_izin_perubahan.bentuk_usaha','left');
		$this->db->join('lsbu_klasifikasi_jenis_usaha','lsbu_klasifikasi_jenis_usaha.id_klasifikasi_jenis_usaha=lsbu_bu_izin_perubahan.klasifikasi_jenis_usaha','left');

		$this->db->where('lsbu_bu_izin_perubahan.id_izin',$id_izin);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function klasifikasi_kualifikasi_oprx_izin($id_izin){
		$this->db->select('lsbu_registrasi.jenis_usaha,lsbu_sifat_usaha.Nama as nama_sifat,bu_asosiasi_detail.Nama as nama_asosiasi,lsbu_klasifikasi_sub_kbli.deskripsi_subklasifikasi,lsbu_registrasi.asosiasi,lsbu_registrasi.sifat_badanusaha,lsbu_registrasi.NIB,lsbu_registrasi.id_klasifikasi,lsbu_registrasi.id_sub_klasifikasi,lsbu_registrasi.kualifikasi,lsbu_registrasi.user_pemohon,lsbu_registrasi.id_permohonan,lsbu_registrasi.tgl_permohonan,lsbu_registrasi.nomor_kbli,lsbu_registrasi.id_izin,lsbu_registrasi.user_email,lsbu_registrasi.user_hp');
		$this->db->from('lsbu_registrasi');
		$this->db->join('lsbu_klasifikasi_sub_kbli','lsbu_klasifikasi_sub_kbli.id_sub_klasifikasi=lsbu_registrasi.id_sub_klasifikasi','left');
		$this->db->join('bu_asosiasi_detail','bu_asosiasi_detail.ID_Asosiasi_BU=lsbu_registrasi.asosiasi','left');
		$this->db->join('lsbu_sifat_usaha','lsbu_sifat_usaha.id_sifat_usaha=lsbu_registrasi.sifat_badanusaha','left');

		$this->db->where('lsbu_registrasi.id_izin',$id_izin);

		$query = $this->db->get();
		return $query->result_array();
	}
	public function klasifikasi_kualifikasi_oprx_izin_perubahan($id_izin){
		$this->db->select('lsbu_registrasi_izin_perubahan.jenis_usaha,lsbu_sifat_usaha.Nama as nama_sifat,bu_asosiasi_detail.Nama as nama_asosiasi,lsbu_klasifikasi_sub_kbli.deskripsi_subklasifikasi,lsbu_registrasi_izin_perubahan.asosiasi,lsbu_registrasi_izin_perubahan.sifat_badanusaha,lsbu_registrasi_izin_perubahan.NIB,lsbu_registrasi_izin_perubahan.id_klasifikasi,lsbu_registrasi_izin_perubahan.id_sub_klasifikasi,lsbu_registrasi_izin_perubahan.kualifikasi,lsbu_registrasi_izin_perubahan.user_pemohon,lsbu_registrasi_izin_perubahan.id_permohonan,lsbu_registrasi_izin_perubahan.tgl_permohonan,lsbu_registrasi_izin_perubahan.nomor_kbli,lsbu_registrasi_izin_perubahan.id_izin,lsbu_registrasi_izin_perubahan.user_email,lsbu_registrasi_izin_perubahan.user_hp');
		$this->db->from('lsbu_registrasi_izin_perubahan');
		$this->db->join('lsbu_klasifikasi_sub_kbli','lsbu_klasifikasi_sub_kbli.id_sub_klasifikasi=lsbu_registrasi_izin_perubahan.id_sub_klasifikasi','left');
		$this->db->join('bu_asosiasi_detail','bu_asosiasi_detail.ID_Asosiasi_BU=lsbu_registrasi_izin_perubahan.asosiasi','left');
		$this->db->join('lsbu_sifat_usaha','lsbu_sifat_usaha.id_sifat_usaha=lsbu_registrasi_izin_perubahan.sifat_badanusaha','left');

		$this->db->where('lsbu_registrasi_izin_perubahan.id_izin',$id_izin);

		$query = $this->db->get();
		return $query->result_array();
	}
	public function pjtbu_opr_izin_perubahan($id_izin){
		$this->db->select('*');
		$this->db->from('lsbu_pjtbu_izin_perubahan');
		$this->db->where('id_izin',$id_izin);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function pemegang_saham_opr_izin_perubahan($id_izin){
		$this->db->select('kabupaten.Nama as id_kabupaten,propinsi.Nama as id_propinsi,lsbu_keuangan_saham_izin_perubahan.nama_pemilik,lsbu_keuangan_saham_izin_perubahan.no_ktp,lsbu_keuangan_saham_izin_perubahan.npwp,lsbu_keuangan_saham_izin_perubahan.alamat,lsbu_keuangan_saham_izin_perubahan.jumlah_lembar,lsbu_keuangan_saham_izin_perubahan.nilai_perlembar,lsbu_keuangan_saham_izin_perubahan.modal_dasar,lsbu_keuangan_saham_izin_perubahan.modal_disetor,lsbu_keuangan_saham_izin_perubahan.no_akte');
		$this->db->from('lsbu_keuangan_saham_izin_perubahan');
		$this->db->join('propinsi','propinsi.ID_Propinsi=lsbu_keuangan_saham_izin_perubahan.id_propinsi','left');
		$this->db->join('kabupaten','kabupaten.ID_Kabupaten=lsbu_keuangan_saham_izin_perubahan.id_kabupaten','left');
		$this->db->where('lsbu_keuangan_saham_izin_perubahan.id_izin',$id_izin);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function pengurus_opr_izin_perubahan($id_izin){
		$this->db->select('*');
		$this->db->from('lsbu_pengurus_izin_perubahan');

		$this->db->where('lsbu_pengurus_izin_perubahan.id_izin',$id_izin);

		$query = $this->db->get();
		return $query->result_array();
	}
	public function pengalaman_opr_izin_perubahan($id_izin){
		$this->db->select('lsbu_pengalaman_izin_perubahan.NIB,lsbu_pengalaman_izin_perubahan.nomor_kontrak,lsbu_pengalaman_izin_perubahan.id_izin,lsbu_pengalaman_izin_perubahan.nama_pengalaman,lsbu_pengalaman_izin_perubahan.nilai_kontrak,lsbu_pengalaman_izin_perubahan.email_instansi,lsbu_pengalaman_izin_perubahan.jabatan_pemberi_tugas,propinsi.Nama as lokasi_pekerjaan,lsbu_pengalaman_izin_perubahan.nama_instansi_pemberi_tugas,lsbu_pengalaman_izin_perubahan.nama_pemberi_tugas,lsbu_pengalaman_izin_perubahan.nilai_kontrak_adendum,lsbu_pengalaman_izin_perubahan.nilai_kontrak_sesuai_porsi,lsbu_pengalaman_izin_perubahan.no_telp_instansi_pemberi_tugas,lsbu_pengalaman_izin_perubahan.nomor_registrasi_pengalaman,lsbu_pengalaman_izin_perubahan.pemberi_tugas,lsbu_pengalaman_izin_perubahan.presentase_porsi,lsbu_pengalaman_izin_perubahan.status_kso,lsbu_pengalaman_izin_perubahan.sumber_dana,lsbu_pengalaman_izin_perubahan.id_sub_klasifikasi,lsbu_pengalaman_izin_perubahan.no_bash,lsbu_pengalaman_izin_perubahan.no_nkpk,lsbu_pengalaman_izin_perubahan.pemilik_proyek,lsbu_pengalaman_izin_perubahan.spesifik_pekerjaan,lsbu_pengalaman_izin_perubahan.tahun,lsbu_pengalaman_izin_perubahan.tgl_bast,lsbu_pengalaman_izin_perubahan.tgl_kontrak,lsbu_pengalaman_izin_perubahan.tgl_mulai,lsbu_pengalaman_izin_perubahan.tgl_selesai,lsbu_pengalaman_izin_perubahan.file_doc_a,lsbu_pengalaman_izin_perubahan.file_doc_b,lsbu_pengalaman_izin_perubahan.file_bash,lsbu_pengalaman_izin_perubahan.file_boq_rab_mpu,lsbu_pengalaman_izin_perubahan.file_kontrak_dengan_pemberi_tugas');
		$this->db->from('lsbu_pengalaman_izin_perubahan');
		$this->db->join('propinsi','propinsi.ID_Propinsi=lsbu_pengalaman_izin_perubahan.lokasi_pekerjaan','left');

		$this->db->where('lsbu_pengalaman_izin_perubahan.id_izin',$id_izin);

		$query = $this->db->get();
		return $query->result_array();
	}
	public function akte_opr_izin_perubahan($id_izin){
		$this->db->select('lsbu_akte_izin_perubahan.sub_klasifikasi,lsbu_akte_izin_perubahan.file_ktp,lsbu_akte_izin_perubahan.file_npwp,lsbu_akte_izin_perubahan.no_sk_kumham,propinsi.Nama as id_provinsi_notaris,kabupaten.Nama as id_kabupaten_notaris,lsbu_akte_izin_perubahan.NIB,lsbu_akte_izin_perubahan.no,lsbu_akte_izin_perubahan.jenis,lsbu_akte_izin_perubahan.nama_notaris,lsbu_akte_izin_perubahan.alamat_notaris,lsbu_akte_izin_perubahan.hargasatuan,lsbu_akte_izin_perubahan.modaldasar,lsbu_akte_izin_perubahan.modalsetor,lsbu_akte_izin_perubahan.nilaisaham,lsbu_akte_izin_perubahan.tgl_akte,lsbu_akte_izin_perubahan.maksudtujuan,lsbu_akte_izin_perubahan.file_doc');
		$this->db->from('lsbu_akte_izin_perubahan');
		$this->db->join('propinsi','propinsi.ID_Propinsi=lsbu_akte_izin_perubahan.id_provinsi_notaris','left');
		$this->db->join('kabupaten','kabupaten.ID_Kabupaten=lsbu_akte_izin_perubahan.id_kabupaten_notaris','left');
		$this->db->where('lsbu_akte_izin_perubahan.id_izin',$id_izin);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function smap_opr_izin_perubahan($izin){
		$this->db->select('*');
		$this->db->from('lsbu_smap_izin_perubahan');
		$this->db->where('id_izin',$izin);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_permohonan_masuk_perubahan($id_izin)
	{
			$this->db->select('*');
			$this->db->from('lsbu_permohonan_masuk_perubahan');
			$this->db->where("id_izin",$id_izin);

			$query = $this->db->get();
			return $query->result_array();
	}
	public function list_permohonan_masuk_perubahan(){
		$this->db->select("lsbu_permohonan_masuk_perubahan.id_izin,lsbu_permohonan_masuk_perubahan.tgl_create_izin,lsbu_permohonan_masuk_perubahan.NIB,lsbu_biaya_sertifikasi.biaya as biaya_lsbu,lsbu_registrasi_history_izin_perubahan.status_0,GROUP_CONCAT(distinct lsbu_registrasi_izin_perubahan.id_sub_klasifikasi, ' ') as concat_sub,GROUP_CONCAT(distinct lsbu_registrasi_izin_perubahan.id_klasifikasi, ' ') as concat_klasifikasi,GROUP_CONCAT(distinct lsbu_registrasi_izin_perubahan.kualifikasi, ' ') as concat_kualifikasi,lsbu_bu_izin_perubahan.nama,lsbu_registrasi_history_izin_perubahan.tgl_permohonan as tgl_permohonan_banding,lsbu_registrasi_izin_perubahan.tgl_permohonan,lsbu_registrasi_history_izin_perubahan.propinsi");
		$this->db->from('lsbu_permohonan_masuk_perubahan');
		$this->db->join('lsbu_registrasi_history_izin_perubahan','lsbu_registrasi_history_izin_perubahan.id_izin=lsbu_permohonan_masuk_perubahan.id_izin','left');
		$this->db->join('lsbu_bu_izin_perubahan','lsbu_bu_izin_perubahan.id_izin=lsbu_registrasi_history_izin_perubahan.id_izin','left');

		$this->db->join('lsbu_registrasi_izin_perubahan','lsbu_registrasi_izin_perubahan.id_izin=lsbu_registrasi_history_izin_perubahan.id_izin','left');
		$this->db->join('lsbu_biaya_sertifikasi',"lsbu_biaya_sertifikasi.tipe=lsbu_bu_izin_perubahan.klasifikasi_jenis_usaha",'left');
		$this->db->where("(lsbu_permohonan_masuk_perubahan.status='101' OR lsbu_permohonan_masuk_perubahan.status='102')");
		$this->db->group_by(array("lsbu_permohonan_masuk_perubahan.id_izin"));
		$this->db->order_by("lsbu_permohonan_masuk_perubahan.tgl_create_izin", "desc");


		$query = $this->db->get();
		return $query->result_array();
	}
	function delete_permohonan_izin2($id_izin){
		$this->db->where('id_izin',$id_izin);
		$this->db->delete('lsbu_registrasi');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}

	}
	function delete_id_izin($id_izin){
		$this->db->where('id_izin',$id_izin);
		$this->db->delete('lsbu_permohonan_masuk');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}

	}
	public function biodata_opr_izin($id_izin){
		$this->db->select('lsbu_bu_izin.sub_klasifikasi,lsbu_bu_izin.sptjm,lsbu_bu_izin.nama_pimpinan,lsbu_bentuk.Nama as bentuk_usaha,lsbu_klasifikasi_jenis_usaha.Nama as jenis_usaha,kabupaten.Nama as id_kabupaten,propinsi.Nama as id_propinsi,lsbu_bu_izin.NIB,lsbu_bu_izin.nama,lsbu_bu_izin.klasifikasi_jenis_usaha,lsbu_bu_izin.jabatan_pimpinan,lsbu_bu_izin.map,lsbu_bu_izin.minisite_name,lsbu_bu_izin.tgl_didirikan,lsbu_bu_izin.rekening,lsbu_bu_izin.alamat_bu,lsbu_bu_izin.kodepos,lsbu_bu_izin.telepon,lsbu_bu_izin.hp,lsbu_bu_izin.fax,lsbu_bu_izin.email,lsbu_bu_izin.email_pic,lsbu_bu_izin.web,lsbu_bu_izin.npwp,lsbu_bu_izin.negara_id,lsbu_bu_izin.file_nib,lsbu_bu_izin.file_npwp');
		$this->db->from('lsbu_bu_izin');
		$this->db->join('propinsi','propinsi.ID_Propinsi=lsbu_bu_izin.id_propinsi','left');
		$this->db->join('kabupaten','kabupaten.ID_Kabupaten=lsbu_bu_izin.id_kabupaten','left');
		$this->db->join('lsbu_bentuk','lsbu_bentuk.id_bentuk=lsbu_bu_izin.bentuk_usaha','left');
		$this->db->join('lsbu_klasifikasi_jenis_usaha','lsbu_klasifikasi_jenis_usaha.id_klasifikasi_jenis_usaha=lsbu_bu_izin.klasifikasi_jenis_usaha','left');

		$this->db->where('lsbu_bu_izin.id_izin',$id_izin);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function pengurus_opr_izin($id_izin){
		$this->db->select('*');
		$this->db->from('lsbu_pengurus_izin');

		$this->db->where('lsbu_pengurus_izin.id_izin',$id_izin);

		$query = $this->db->get();
		return $query->result_array();
	}
	public function pengalaman_opr_izin($id_izin){
		$this->db->select('lsbu_pengalaman_izin.NIB,lsbu_pengalaman_izin.nomor_kontrak,lsbu_pengalaman_izin.id_izin,lsbu_pengalaman_izin.nama_pengalaman,lsbu_pengalaman_izin.nilai_kontrak,lsbu_pengalaman_izin.email_instansi,lsbu_pengalaman_izin.jabatan_pemberi_tugas,propinsi.Nama as lokasi_pekerjaan,lsbu_pengalaman_izin.nama_instansi_pemberi_tugas,lsbu_pengalaman_izin.nama_pemberi_tugas,lsbu_pengalaman_izin.nilai_kontrak_adendum,lsbu_pengalaman_izin.nilai_kontrak_sesuai_porsi,lsbu_pengalaman_izin.no_telp_instansi_pemberi_tugas,lsbu_pengalaman_izin.nomor_registrasi_pengalaman,lsbu_pengalaman_izin.pemberi_tugas,lsbu_pengalaman_izin.presentase_porsi,lsbu_pengalaman_izin.status_kso,lsbu_pengalaman_izin.sumber_dana,lsbu_pengalaman_izin.id_sub_klasifikasi,lsbu_pengalaman_izin.no_bash,lsbu_pengalaman_izin.no_nkpk,lsbu_pengalaman_izin.pemilik_proyek,lsbu_pengalaman_izin.spesifik_pekerjaan,lsbu_pengalaman_izin.tahun,lsbu_pengalaman_izin.tgl_bast,lsbu_pengalaman_izin.tgl_kontrak,lsbu_pengalaman_izin.tgl_mulai,lsbu_pengalaman_izin.tgl_selesai,lsbu_pengalaman_izin.file_doc_a,lsbu_pengalaman_izin.file_doc_b,lsbu_pengalaman_izin.file_bash,lsbu_pengalaman_izin.file_boq_rab_mpu,lsbu_pengalaman_izin.file_kontrak_dengan_pemberi_tugas');
		$this->db->from('lsbu_pengalaman_izin');
		$this->db->join('propinsi','propinsi.ID_Propinsi=lsbu_pengalaman_izin.lokasi_pekerjaan','left');

		$this->db->where('lsbu_pengalaman_izin.id_izin',$id_izin);

		$query = $this->db->get();
		return $query->result_array();
	}
	public function akte_opr_izin($id_izin){
		$this->db->select('lsbu_akte_izin.sub_klasifikasi,lsbu_akte_izin.file_ktp,lsbu_akte_izin.file_npwp,lsbu_akte_izin.no_sk_kumham,propinsi.Nama as id_provinsi_notaris,kabupaten.Nama as id_kabupaten_notaris,lsbu_akte_izin.NIB,lsbu_akte_izin.no,lsbu_akte_izin.jenis,lsbu_akte_izin.nama_notaris,lsbu_akte_izin.alamat_notaris,lsbu_akte_izin.hargasatuan,lsbu_akte_izin.modaldasar,lsbu_akte_izin.modalsetor,lsbu_akte_izin.nilaisaham,lsbu_akte_izin.tgl_akte,lsbu_akte_izin.maksudtujuan,lsbu_akte_izin.file_doc');
		$this->db->from('lsbu_akte_izin');
		$this->db->join('propinsi','propinsi.ID_Propinsi=lsbu_akte_izin.id_provinsi_notaris','left');
		$this->db->join('kabupaten','kabupaten.ID_Kabupaten=lsbu_akte_izin.id_kabupaten_notaris','left');
		$this->db->where('lsbu_akte_izin.id_izin',$id_izin);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function smm_opr_izin($izin){
		$this->db->select('*');
		$this->db->from('lsbu_smm_izin');
		$this->db->where('id_izin',$izin);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function smap_opr_izin($izin){
		$this->db->select('*');
		$this->db->from('lsbu_smap_izin');
		$this->db->where('id_izin',$izin);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function neraca_ski_izin($id_izin){
		$this->db->select('*');
		$this->db->from('lsbu_keuangan_neraca_2_izin');
		$this->db->where('id_izin',$id_izin);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function pemegang_saham_opr_izin($id_izin){
		$this->db->select('kabupaten.Nama as id_kabupaten,propinsi.Nama as id_propinsi,lsbu_keuangan_saham_izin.nama_pemilik,lsbu_keuangan_saham_izin.no_ktp,lsbu_keuangan_saham_izin.npwp,lsbu_keuangan_saham_izin.alamat,lsbu_keuangan_saham_izin.jumlah_lembar,lsbu_keuangan_saham_izin.nilai_perlembar,lsbu_keuangan_saham_izin.modal_dasar,lsbu_keuangan_saham_izin.modal_disetor,lsbu_keuangan_saham_izin.no_akte');
		$this->db->from('lsbu_keuangan_saham_izin');
		$this->db->join('propinsi','propinsi.ID_Propinsi=lsbu_keuangan_saham_izin.id_propinsi','left');
		$this->db->join('kabupaten','kabupaten.ID_Kabupaten=lsbu_keuangan_saham_izin.id_kabupaten','left');
		$this->db->where('id_izin',$id_izin);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function pjbu_opr_sub_izin($id_izin){
		$this->db->select('*');
		$this->db->from('lsbu_pjbu_izin');
		$this->db->where('id_izin',$id_izin);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function pjskbu_opr_sub_izin($id_izin){
		$this->db->select('*');
		$this->db->from('lsbu_pjskbu_izin');
		$this->db->where('id_izin',$id_izin);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function pjtbu_opr_sub_izin($id_izin){
		$this->db->select('*');
		$this->db->from('lsbu_pjtbu_izin');
		$this->db->where('id_izin',$id_izin);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function list_permohonan(){
		$this->db->select("lsbu_registrasi_history.file_pembayaran,lsbu_registrasi_history.file_perjanjian,SUM(lsbu_biaya_sertifikasi.biaya) as biaya_lsbu,lsbu_registrasi_history.status_2,lsbu_registrasi_history.status_1,lsbu_registrasi_history.status_0,GROUP_CONCAT(distinct lsbu_registrasi.id_sub_klasifikasi, ' ') as concat_sub,GROUP_CONCAT(distinct lsbu_registrasi.id_klasifikasi, ' ') as concat_klasifikasi,GROUP_CONCAT(distinct lsbu_registrasi.kualifikasi, ' ') as concat_kualifikasi,lsbu_bu.nama,lsbu_registrasi_history.NIB,lsbu_registrasi_history.tgl_permohonan,lsbu_registrasi_history.propinsi,lsbu_registrasi_history.tahun,lsbu_registrasi_history.status_0,lsbu_registrasi_history.status_1,lsbu_registrasi_history.status_2,lsbu_registrasi_history.status_3");
		$this->db->from('lsbu_registrasi_history');
		$this->db->join('lsbu_registrasi','lsbu_registrasi.NIB=lsbu_registrasi_history.NIB AND lsbu_registrasi.tgl_permohonan=lsbu_registrasi_history.tgl_permohonan','left');

		$this->db->join('lsbu_bu','lsbu_bu.NIB=lsbu_registrasi_history.NIB','left');
		$this->db->join('lsbu_biaya_sertifikasi','lsbu_biaya_sertifikasi.tipe=lsbu_bu.klasifikasi_jenis_usaha','left');

		$this->db->join('lsbu_asesor_penilaian','lsbu_registrasi_history.NIB=lsbu_asesor_penilaian.NIB AND lsbu_registrasi_history.tgl_permohonan=lsbu_asesor_penilaian.tgl_permohonan','left');
		$this->db->where('lsbu_asesor_penilaian.tgl_penilaian is NOT NULL');

		$this->db->group_by(array("lsbu_registrasi_history.NIB", "lsbu_registrasi_history.tgl_permohonan"));
		$query = $this->db->get();
		return $query->result_array();
	}
	public function search_asesor_detail($id_asesor,$nib,$tgl_awal,$tgl_akhir)
	{
			$this->db->select('lsbu_bu.nama,lsbu_asesor_penilaian.NIB,lsbu_asesor_penilaian.tgl_permohonan,lsbu_asesor_penilaian.id_asesor,lsbu_asesor_penilaian.id_klasifikasi,lsbu_asesor_penilaian.id_sub_klasifikasi,lsbu_asesor_penilaian.kualifikasi,lsbu_asesor_penilaian.hasil_akhir,lsbu_asesor_penilaian.pemutus,lsbu_asesor_penilaian.peralatan,lsbu_asesor_penilaian.penjualan_tahunan,lsbu_asesor_penilaian.smm,lsbu_asesor_penilaian.smap,lsbu_asesor_penilaian.comment');
			$this->db->from('lsbu_asesor_penilaian');
			$this->db->join('lsbu_bu','lsbu_bu.NIB=lsbu_asesor_penilaian.NIB','left');

			if($nib!=''){
				$this->db->where("lsbu_asesor_penilaian.NIB",$nib);
			}
			if($tgl_awal!=date("Y-m-d") OR $tgl_akhir!=date("Y-m-d")){
				$this->db->where("tgl_permohonan BETWEEN '$tgl_awal' AND '$tgl_akhir'");
			}
			$this->db->where("lsbu_asesor_penilaian.id_asesor",$id_asesor);
			$query = $this->db->get();
			return $query->result_array();
	}
	public function list_tolak(){
		$this->db->select("lsbu_registrasi.id_sub_klasifikasi,lsbu_permohonan_masuk.id_izin,lsbu_permohonan_masuk.tgl_create_izin,lsbu_permohonan_masuk.NIB,lsbu_biaya_sertifikasi.biaya as biaya_lsbu,lsbu_registrasi_history.status_0,GROUP_CONCAT(distinct lsbu_registrasi.id_sub_klasifikasi, ' ') as concat_sub,GROUP_CONCAT(distinct lsbu_registrasi.id_klasifikasi, ' ') as concat_klasifikasi,GROUP_CONCAT(distinct lsbu_registrasi.kualifikasi, ' ') as concat_kualifikasi,lsbu_bu.nama,lsbu_registrasi_history.tgl_permohonan as tgl_permohonan_banding,lsbu_registrasi.tgl_permohonan,lsbu_registrasi_history.propinsi,lsbu_registrasi_history.tahun,lsbu_registrasi_history.status_0,lsbu_registrasi_history.status_1,lsbu_registrasi_history.status_2,lsbu_registrasi_history.status_3");
		$this->db->from('lsbu_permohonan_masuk');
		$this->db->join('lsbu_registrasi_history','lsbu_registrasi_history.NIB=lsbu_permohonan_masuk.nib','left');

		$this->db->join('lsbu_registrasi','lsbu_registrasi.NIB=lsbu_registrasi_history.NIB AND lsbu_registrasi.id_sub_klasifikasi=lsbu_permohonan_masuk.id_sub_klasifikasi','left');
		$this->db->join('lsbu_bu','lsbu_bu.NIB=lsbu_registrasi_history.NIB','left');
		$this->db->join('lsbu_biaya_sertifikasi',"lsbu_biaya_sertifikasi.tipe=lsbu_bu.klasifikasi_jenis_usaha",'left');


		$this->db->where("(lsbu_permohonan_masuk.status!='11' AND lsbu_permohonan_masuk.status!='90' AND lsbu_permohonan_masuk.status!='50')");
		$this->db->group_by(array("lsbu_permohonan_masuk.id_izin"));
		$this->db->order_by("lsbu_permohonan_masuk.tgl_create_izin", "asc");
		$this->db->order_by("lsbu_permohonan_masuk.nib", "desc");


		$query = $this->db->get();
		return $query->result_array();
	}
	public function list_cabut(){
		$this->db->select("lsbu_permohonan_masuk.id_izin,lsbu_permohonan_masuk.NIB,lsbu_permohonan_masuk.id_sub_klasifikasi,lsbu_permohonan_masuk.tgl_permohonan,lsbu_bu.nama");
		$this->db->from('lsbu_permohonan_masuk');

		$this->db->join('lsbu_bu','lsbu_bu.NIB=lsbu_permohonan_masuk.NIB','left');


		$this->db->where("lsbu_permohonan_masuk.status","50");
		$this->db->group_by(array("lsbu_permohonan_masuk.id_izin"));
		$this->db->order_by("lsbu_permohonan_masuk.tgl_create_izin", "asc");
		$this->db->order_by("lsbu_permohonan_masuk.nib", "desc");


		$query = $this->db->get();
		return $query->result_array();
	}
	public function kepemilikan_peralatan_opr($nib){
		$this->db->select('*');
		$this->db->from('lsbu_kepemilikan_peralatan');

		$this->db->where('NIB',$nib);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function check_fakte_integritas($nib,$tgl,$id_asesor){
		$this->db->select('*');
		$this->db->from('lsbu_fakta_integritas');

		$this->db->where('NIB',$nib);
		$this->db->where('tgl_permohonan',$tgl);
		$this->db->where('id_asesor',$id_asesor);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_detail_penunjukan2($nib,$tgl_permohonan,$id_asesor)
	{
			$this->db->select('lsbu_surat_penunjukan.no_surat,user.Nama,user.Email,lsbu_surat_penunjukan.file,lsbu_surat_penunjukan.tgl_cetak,lsbu_asesor_penunjukan.NIB,lsbu_asesor_penunjukan.id_asesor');
			$this->db->from('lsbu_asesor_penunjukan');
			$this->db->join('lsbu_surat_penunjukan','lsbu_surat_penunjukan.NIB=lsbu_asesor_penunjukan.NIB AND lsbu_surat_penunjukan.tgl_permohonan=lsbu_asesor_penunjukan.tgl_permohonan','left');
			$this->db->join('user','user.Username=lsbu_asesor_penunjukan.id_asesor','left');

			$this->db->where("lsbu_asesor_penunjukan.NIB",$nib);
			$this->db->where("lsbu_asesor_penunjukan.tgl_permohonan",$tgl_permohonan);
			$this->db->where("lsbu_asesor_penunjukan.id_asesor !='$id_asesor'");
			$query = $this->db->get();
			return $query->result_array();
	}
	public function check_sub_klas($nib,$id_sub_klasifikasi)
	{
			$this->db->select('*');
			$this->db->from('lsbu_registrasi');
			$this->db->where("NIB",$nib);
			$this->db->where("id_sub_klasifikasi",$id_sub_klasifikasi);
			$query = $this->db->get();
			return $query->result_array();
	}
	public function get_komite_teknis($nib,$tgl_permohonan)
	{

			$this->db->select('*');
			$this->db->from('lsbu_komite_teknis');
			$this->db->where('NIB',$nib);
			$this->db->where('tgl_permohonan',$tgl_permohonan);

			$query = $this->db->get();
			return $query->result_array();
	}

	function update_perbaikan($nib,$tgl_permohonan){
		$data=array(
			'status'=>'1',
			'read'=>'1',
		);
		$this->db->set($data);
		$this->db->where('NIB',$nib);
		$this->db->where('tgl_permohonan',$tgl_permohonan);
		$this->db->update('lsbu_pds_history');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}
	function update_qr($nib,$id_izin,$qr){
		$data=array(
			'qr'=>$qr,
		);
		$this->db->set($data);
		$this->db->where('NIB',$nib);
		$this->db->where('id_izin',$id_izin);
		$this->db->update('lsbu_registrasi');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}
	public function list_report(){
		$this->db->select("lsbu_registrasi_history.tgl_biaya,lsbu_registrasi_history.status_2,lsbu_registrasi_history.no_urut,kabupaten.Nama as nama_kabupaten,propinsi.Nama as nama_propinsi,lsbu_bentuk.Nama as bentuk_usaha,lsbu_registrasi.id_sub_klasifikasi,lsbu_registrasi.kualifikasi,lsbu_permohonan_masuk.id_izin,lsbu_permohonan_masuk.NIB,lsbu_bu.npwp,lsbu_bu.nama,lsbu_bu.alamat_bu,lsbu_registrasi.nomor_kbli,lsbu_registrasi.tgl_permohonan,lsbu_registrasi_history.file_perjanjian");
		$this->db->from('lsbu_permohonan_masuk');
		$this->db->join('lsbu_registrasi','lsbu_registrasi.id_izin=lsbu_permohonan_masuk.id_izin','left');
		$this->db->join('lsbu_bu','lsbu_bu.NIB=lsbu_permohonan_masuk.NIB','left');
		$this->db->join('lsbu_bentuk','lsbu_bentuk.id_bentuk=lsbu_bu.bentuk_usaha','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi=lsbu_bu.id_propinsi','left');

		$this->db->join('kabupaten','kabupaten.ID_Kabupaten=lsbu_bu.id_kabupaten','left');

		$this->db->join('lsbu_registrasi_history','lsbu_permohonan_masuk.NIB=lsbu_registrasi_history.NIB AND lsbu_permohonan_masuk.tgl_permohonan=lsbu_registrasi_history.tgl_permohonan','left');

		$this->db->join('lsbu_biaya',"lsbu_biaya.kualifikasi=lsbu_registrasi.kualifikasi AND lsbu_biaya.tipe=lsbu_bu.klasifikasi_jenis_usaha",'left');
		 $this->db->where("lsbu_registrasi_history.status_2 >= '2023-02-01'");
		$this->db->where("lsbu_registrasi_history.status_2 <= '2023-02-31'");
		// $this->db->where("lsbu_registrasi_history.pilihan",'2');

	//	$this->db->where("lsbu_permohonan_masuk.status","91");
		$this->db->where("lsbu_registrasi.qr IS NOT NULL");
		$this->db->group_by(array("lsbu_permohonan_masuk.id_izin"));
		$this->db->order_by("lsbu_registrasi.kualifikasi ASC, lsbu_registrasi.tgl_permohonan ASC");
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_detail_penunjukan($nib,$tgl_permohonan)
	{
			$this->db->select('user.Nama,user.Email,lsbu_surat_penunjukan.file,lsbu_surat_penunjukan.tgl_cetak,lsbu_asesor_penunjukan.NIB,lsbu_asesor_penunjukan.id_asesor,');
			$this->db->from('lsbu_asesor_penunjukan');
			$this->db->join('lsbu_surat_penunjukan','lsbu_surat_penunjukan.NIB=lsbu_asesor_penunjukan.NIB AND lsbu_surat_penunjukan.tgl_permohonan=lsbu_asesor_penunjukan.tgl_permohonan','left');
			$this->db->join('user','user.Username=lsbu_asesor_penunjukan.id_asesor','left');

			$this->db->where("lsbu_asesor_penunjukan.NIB",$nib);
			$this->db->where("lsbu_asesor_penunjukan.tgl_permohonan",$tgl_permohonan);
			$query = $this->db->get();
			return $query->result_array();
	}
	public function get_detail_penunjukan_post($nib,$tgl_permohonan)
	{
			$this->db->select('user.Nama,user.Email,lsbu_surat_penunjukan.file,lsbu_surat_penunjukan.tgl_cetak,lsbu_asesor_penunjukan.NIB,asesor_matrix.id_asesor_lpjk as id_asesor,');
			$this->db->from('lsbu_asesor_penunjukan');
			$this->db->join('lsbu_surat_penunjukan','lsbu_surat_penunjukan.NIB=lsbu_asesor_penunjukan.NIB AND lsbu_surat_penunjukan.tgl_permohonan=lsbu_asesor_penunjukan.tgl_permohonan','left');
			$this->db->join('asesor_matrix','asesor_matrix.id_asesor_lsbu=lsbu_asesor_penunjukan.id_asesor','left');

			$this->db->join('user','user.Username=lsbu_asesor_penunjukan.id_asesor','left');

			$this->db->where("lsbu_asesor_penunjukan.NIB",$nib);
			$this->db->where("lsbu_asesor_penunjukan.tgl_permohonan",$tgl_permohonan);
			$query = $this->db->get();
			return $query->result_array();
	}
	public function get_jumlah_biaya($awal,$akhir){
		$this->db->select("SUM(lsbu_biaya.biaya) as biaya_lsbu");
		$this->db->from('lsbu_registrasi_history');
		$this->db->join('lsbu_registrasi','lsbu_registrasi.NIB=lsbu_registrasi_history.NIB AND lsbu_registrasi.tgl_permohonan=lsbu_registrasi_history.tgl_permohonan','left');
		$this->db->join('lsbu_bu','lsbu_bu.NIB=lsbu_registrasi_history.NIB','left');

		$this->db->join('lsbu_biaya',"lsbu_biaya.kualifikasi=lsbu_registrasi.kualifikasi AND lsbu_biaya.tipe=lsbu_bu.klasifikasi_jenis_usaha",'left');
		if($akhir==""){
			$x=date("Y-m-d");
			$this->db->where("lsbu_registrasi_history.tgl_permohonan BETWEEN '$awal' AND '$x'");
		}else{
			$this->db->where("lsbu_registrasi_history.tgl_permohonan BETWEEN '$awal' AND '$akhir'");
		}
		$this->db->group_by(array("lsbu_registrasi_history.NIB", "lsbu_registrasi_history.tgl_permohonan"));
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_asesi(){
		$this->db->select("count(lsbu_asesor_penilaian.id_asesor) as jumlah,user.Username,user.Nama");
		$this->db->from('user');

		$this->db->join('lsbu_asesor_penilaian','lsbu_asesor_penilaian.id_asesor=user.Username','left');
		$this->db->where('user.level','3');
		$this->db->group_by(array("user.Username"));

		$this->db->limit(5);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_notif_20($id_izin)
	{

			$this->db->select('*');
			$this->db->from('lsbu_permohonan_masuk');
			$this->db->where("id_izin",$id_izin);
			$this->db->where("status",20);
			$query = $this->db->get();
			return $query->result_array();
	}
	public function neraca_asesor($nib,$tgl,$id_asesor)
	{

			$this->db->select('*');
			$this->db->from('lsbu_asesor_neraca');
			$this->db->where("NIB",$nib);
			$this->db->where("tgl_permohonan",$tgl);
			$this->db->where("id_asesor",$id_asesor);
			$query = $this->db->get();
			return $query->result_array();
	}
	public function smm_asesor($nib,$tgl,$id_asesor)
	{

			$this->db->select('*');
			$this->db->from('lsbu_asesor_smm');
			$this->db->where("NIB",$nib);
			$this->db->where("tgl_permohonan",$tgl);
			$this->db->where("id_asesor",$id_asesor);
			$query = $this->db->get();
			return $query->result_array();
	}
	public function smap_asesor($nib,$tgl,$id_asesor)
	{

			$this->db->select('*');
			$this->db->from('lsbu_asesor_smap');
			$this->db->where("NIB",$nib);
			$this->db->where("tgl_permohonan",$tgl);
			$this->db->where("id_asesor",$id_asesor);
			$query = $this->db->get();
			return $query->result_array();
	}
	public function cek_nomer()
	{

			$this->db->select('count(NIB) as nomer_urut');
			$this->db->from('lsbu_registrasi_history');
			$this->db->where("no_urut!='0'");
			$query = $this->db->get();
			return $query->result_array();
	}
	public function insert_permohonan2($nib,$tgl_permohonan,$id_propinsi,$pilihan)
	{
		$data=array(
			'NIB'=>$nib,
			'tgl_permohonan'=>$tgl_permohonan,
			'propinsi'=>$id_propinsi,
			'tahun'=>date("Y"),
			'status_0'=>date("Y-m-d"),
			'status_1'=>"0000-00-00",
			'status_2'=>"0000-00-00",
			'status_3'=>"0000-00-00",
			'user_status_0'=>$nib,
			'user_status_1'=>"",
			'user_status_2'=>"",
			'user_status_3'=>"",
			'pilihan'=>$pilihan

		);
		$table='lsbu_registrasi_history';
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->insert($table, $data);
		$otherdb->trans_complete();
		if ($otherdb->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}
	function update_qr_perubahan($id_izin,$qr){
		$data=array(
			'qr'=>$qr,
		);
		$this->db->set($data);
		$this->db->where('id_izin',$id_izin);
		$this->db->update('lsbu_registrasi_history_izin_perubahan');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}

	public function insert_permohonan($nib,$tgl_permohonan,$id_propinsi)
	{
		$data=array(
			'NIB'=>$nib,
			'tgl_permohonan'=>$tgl_permohonan,
			'propinsi'=>$id_propinsi,
			'tahun'=>date("Y"),
			'status_0'=>date("Y-m-d"),
			'status_1'=>"0000-00-00",
			'status_2'=>"0000-00-00",
			'status_3'=>"0000-00-00",
			'user_status_0'=>$nib,
			'user_status_1'=>"",
			'user_status_2'=>"",
			'user_status_3'=>""

		);
		$table='lsbu_registrasi_history';
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->insert($table, $data);
		$otherdb->trans_complete();
		if ($otherdb->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}
	public function insert_permohonan_perubahan($tgl_permohonan,$id_izin)
	{
		$data=array(
			'id_izin'=>$id_izin,
			'tgl_permohonan'=>$tgl_permohonan,
			'propinsi'=>'',
			'tahun'=>date("Y"),
			'status_0'=>date("Y-m-d"),
			'status_1'=>"0000-00-00",
			'status_2'=>"0000-00-00",
			'status_3'=>"0000-00-00",
			'user_status_0'=>$nib,
			'user_status_1'=>"",
			'user_status_2'=>"",
			'user_status_3'=>""

		);
		$table='lsbu_registrasi_history_izin_perubahan';
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->insert($table, $data);
		$otherdb->trans_complete();
		if ($otherdb->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}
  public function insert_permohonan_pembayaran($nib,$tgl_permohonan,$id_propinsi,$nomer_urut)
  {
    $data=array(
      'NIB'=>$nib,
      'tgl_permohonan'=>$tgl_permohonan,
      'propinsi'=>$id_propinsi,
      'tahun'=>date("Y"),
      'status_0'=>date("Y-m-d"),
      'status_1'=>date("Y-m-d"),
      'status_2'=>"0000-00-00",
      'status_3'=>"0000-00-00",
      'user_status_0'=>$nib,
      'user_status_1'=>$this->session->userdata('id_user'),
      'user_status_2'=>"",
      'user_status_3'=>"",
			'no_urut'=>$nomer_urut

    );
    $table='lsbu_registrasi_history';
    $otherdb = $this->load->database('default2', TRUE);
    $otherdb->insert($table, $data);
    $otherdb->trans_complete();
    if ($otherdb->trans_status() === FALSE) {
      return "Failed";
    } else {
      return "Success";
    }
  }
	public function insert_notif_masuk($nib,$tgl_permohonan,$id_sub_klasifikasi)
	{
		$data=array(
			'NIB'=>$nib,
			'tgl_permohonan'=>$tgl_permohonan,
			'id_sub_klasifikasi'=>$id_sub_klasifikasi
		);
		$table='lsbu_notif_masuk';
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->insert($table, $data);
		$otherdb->trans_complete();
		if ($otherdb->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}
	public function get_permohonan($nib)
	{
			$yesterday = new DateTime('yesterday');
			$banding=$yesterday->format('Y-m-d');
			$now=date('Y-m-d');
			$this->db->select('*');
			$this->db->from('lsbu_registrasi');
			$this->db->where("NIB",$nib);
			$this->db->where("tgl_permohonan BETWEEN '$banding' AND '$now'");
			$query = $this->db->get();
			return $query->result_array();
	}
	public function get_permohonan_masuk($nib,$tgl_permohonan)
	{
			$this->db->select('*');
			$this->db->from('lsbu_permohonan_masuk');
			$this->db->where("nib",$nib);
			$this->db->where("tgl_permohonan",$tgl_permohonan);

			$query = $this->db->get();
			return $query->result_array();
	}
	public function get_permohonan_masuk_sub($nib,$tgl_permohonan)
	{
			$this->db->select('*');
			$this->db->from('lsbu_registrasi');
			$this->db->where("NIB",$nib);
			$this->db->where("id_izin",$tgl_permohonan);

			$query = $this->db->get();
			return $query->result_array();
	}
	public function get_permohonan_masuk2($nib,$tgl_permohonan)
	{
			$this->db->select('*');
			$this->db->from('lsbu_registrasi');
			$this->db->where("NIB",$nib);
			$this->db->where("tgl_permohonan",$tgl_permohonan);

			$query = $this->db->get();
			return $query->result_array();
	}
	function get_revisi_2_sub($nib, $sub_klasifikasi){
		$this->db->select('lsbu_pds_history.tgl_permohonan,lsbu_pds_history.tgl_record,lsbu_pds_upload.Deskripsi as upload_deskripsi,lsbu_pds_deskripsi.Deskripsi as pds_deskrpsi,lsbu_pds_history.id_record,lsbu_pds_history.nib,lsbu_pds_history.tgl_permohonan,lsbu_pds_history.id_upload,lsbu_pds_history.id_user,lsbu_pds_history.tgl_record,lsbu_pds_history.ket,lsbu_pds_history.option1,lsbu_pds_history.option2,lsbu_pds_history.status,lsbu_pds_history.read');
		$this->db->from('lsbu_pds_history');
		$this->db->join('lsbu_pds_deskripsi','lsbu_pds_history.pds=lsbu_pds_deskripsi.ID_PDS','left');
		$this->db->join('lsbu_pds_upload','lsbu_pds_history.id_upload=lsbu_pds_upload.ID_Upload','left');

		$this->db->where('lsbu_pds_history.NIB',$nib);
		$this->db->where('lsbu_pds_history.tgl_permohonan',$sub_klasifikasi);

		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_90_2($id_izin){
		$this->db->select("*");
		$this->db->from('lsbu_permohonan_masuk');

		$this->db->where('id_izin',$id_izin);
		$this->db->where('status','90');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_20($nib,$sub_klasifikasi,$id_izin){
		$this->db->select("lsbu_registrasi_history.status_0");
		$this->db->from('lsbu_registrasi');
		$this->db->join('lsbu_registrasi_history','lsbu_registrasi.NIB=lsbu_registrasi_history.NIB AND lsbu_registrasi.tgl_permohonan=lsbu_registrasi_history.tgl_permohonan','left');

		$this->db->where('lsbu_registrasi.NIB',$nib);
		$this->db->where('lsbu_registrasi.id_sub_klasifikasi',$sub_klasifikasi);
		$this->db->where('lsbu_registrasi.id_izin',$id_izin);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_10($nib,$sub_klasifikasi,$id_izin){
		$this->db->select("lsbu_registrasi_history.status_1");
		$this->db->from('lsbu_registrasi');
		$this->db->join('lsbu_registrasi_history','lsbu_registrasi.NIB=lsbu_registrasi_history.NIB AND lsbu_registrasi.tgl_permohonan=lsbu_registrasi_history.tgl_permohonan','left');

		$this->db->where('lsbu_registrasi.NIB',$nib);
		$this->db->where('lsbu_registrasi.id_sub_klasifikasi',$sub_klasifikasi);
		$this->db->where('lsbu_registrasi.id_izin',$id_izin);
		$this->db->where("lsbu_registrasi_history.status_1!='0000-00-00'");
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result_array();
	}
	function get_11($nib,$tgl_permohonan){
		$this->db->select('lsbu_pds_history.tgl_permohonan,lsbu_pds_history.tgl_record,lsbu_pds_upload.Deskripsi as upload_deskripsi,lsbu_pds_deskripsi.Deskripsi as pds_deskrpsi,lsbu_pds_history.id_record,lsbu_pds_history.nib,lsbu_pds_history.tgl_permohonan,lsbu_pds_history.id_upload,lsbu_pds_history.id_user,lsbu_pds_history.tgl_record,lsbu_pds_history.ket,lsbu_pds_history.option1,lsbu_pds_history.option2,lsbu_pds_history.status,lsbu_pds_history.read');
		$this->db->from('lsbu_pds_history');
		$this->db->join('lsbu_pds_deskripsi','lsbu_pds_history.pds=lsbu_pds_deskripsi.ID_PDS','left');
		$this->db->join('lsbu_pds_upload','lsbu_pds_history.id_upload=lsbu_pds_upload.ID_Upload','left');

		$this->db->where('lsbu_pds_history.NIB',$nib);
		$this->db->where('lsbu_pds_history.tgl_permohonan',$tgl_permohonan);

		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_31($nib,$sub_klasifikasi,$id_izin){
		$this->db->select("lsbu_registrasi_history.tgl_biaya");
		$this->db->from('lsbu_registrasi');
		$this->db->join('lsbu_registrasi_history','lsbu_registrasi.NIB=lsbu_registrasi_history.NIB AND lsbu_registrasi.tgl_permohonan=lsbu_registrasi_history.tgl_permohonan','left');

		$this->db->where('lsbu_registrasi.NIB',$nib);
		$this->db->where('lsbu_registrasi.id_sub_klasifikasi',$sub_klasifikasi);
		$this->db->where('lsbu_registrasi.id_izin',$id_izin);
		$this->db->where("lsbu_registrasi_history.status_1!='0000-00-00'");
		$this->db->where('lsbu_registrasi_history.file_pembayaran IS NOT NULL');
		$this->db->where('lsbu_registrasi_history.verifikasi_pembayaran','1');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_50($nib,$sub_klasifikasi,$id_izin){
		$this->db->select("lsbu_registrasi_history.status_2");
		$this->db->from('lsbu_registrasi');
		$this->db->join('lsbu_registrasi_history','lsbu_registrasi.NIB=lsbu_registrasi_history.NIB AND lsbu_registrasi.tgl_permohonan=lsbu_registrasi_history.tgl_permohonan','left');

		$this->db->where('lsbu_registrasi.NIB',$nib);
		$this->db->where('lsbu_registrasi.id_sub_klasifikasi',$sub_klasifikasi);
		$this->db->where('lsbu_registrasi.id_izin',$id_izin);
		$this->db->where("lsbu_registrasi_history.status_2!='0000-00-00'");
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_30($nib,$sub_klasifikasi,$id_izin){
		$this->db->select("lsbu_registrasi_history.file_perjanjian");
		$this->db->from('lsbu_registrasi');
		$this->db->join('lsbu_registrasi_history','lsbu_registrasi.NIB=lsbu_registrasi_history.NIB AND lsbu_registrasi.tgl_permohonan=lsbu_registrasi_history.tgl_permohonan','left');

		$this->db->where('lsbu_registrasi.NIB',$nib);
		$this->db->where('lsbu_registrasi.id_sub_klasifikasi',$sub_klasifikasi);
		$this->db->where('lsbu_registrasi.id_izin',$id_izin);
		$this->db->where("lsbu_registrasi_history.status_1!='0000-00-00'");
		$this->db->where('lsbu_registrasi_history.file_pembayaran IS NOT NULL');

		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_permohonan_masuk_3($id_izin)
	{
			$this->db->select('*');
			$this->db->from('lsbu_permohonan_masuk');
			$this->db->where("id_izin",$id_izin);

			$query = $this->db->get();
			return $query->result_array();
	}
	public function get_pilihan($id_izin)
	{
			$this->db->select('lsbu_registrasi_history.NIB,lsbu_registrasi_history.pilihan');
			$this->db->from('lsbu_registrasi');
			$this->db->join('lsbu_registrasi_history','lsbu_registrasi_history.NIB=lsbu_registrasi.NIB AND lsbu_registrasi_history.tgl_permohonan = lsbu_registrasi.tgl_permohonan','left');

			$this->db->where("lsbu_registrasi.id_izin",$id_izin);

			$query = $this->db->get();
			return $query->result_array();
	}
	public function notif_opr($nib,$tgl)
	{

			$this->db->select('*');
			$this->db->from('lsbu_notif_masuk');
			$this->db->where("NIB",$nib);
			$this->db->where("tgl_permohonan",$tgl);
			$query = $this->db->get();
			return $query->result_array();
	}
	function search_pjbu($id_personal){
		$otherdb = $this->load->database('default2', TRUE);

		$otherdb->select('lsbu_pengurus.no_ktp,lsbu_bu.nama');
		$otherdb->from('lsbu_pengurus');
		$otherdb->join('lsbu_bu','lsbu_pengurus.NIB=lsbu_bu.NIB','left');

		$otherdb->where("lsbu_pengurus.no_ktp",$id_personal);
		$otherdb->where("lsbu_pengurus.PJBU","1");
		$query = $otherdb->get();
		return $query->result_array();
	}
	function get_jumlah_permohonan($awal,$akhir){
		$this->db->select("count(NIB) as jumlah");
		$this->db->from('lsbu_registrasi_history');
		if($akhir==""){
			$x=date("Y-m-d");
			$this->db->where("tgl_permohonan BETWEEN '$awal' AND '$x'");
		}else{
			$this->db->where("tgl_permohonan BETWEEN '$awal' AND '$akhir'");
		}
		$query = $this->db->get();
		return $query->result_array();
	}
	function token_api_siki(){
		$this->db->select("*");
		$this->db->from('lsbu_master_api');

		$query = $this->db->get();
		return $query->result_array();
	}
	public function list_banding(){
		$this->db->select("lsbu_banding.persyaratan,lsbu_registrasi_history_hapus.file_pembayaran,SUM(lsbu_biaya.biaya) as biaya_lsbu,lsbu_registrasi_history_hapus.status_0,GROUP_CONCAT(distinct lsbu_registrasi.id_sub_klasifikasi, ' ') as concat_sub,GROUP_CONCAT(distinct lsbu_registrasi.id_klasifikasi, ' ') as concat_klasifikasi,GROUP_CONCAT(distinct lsbu_registrasi.kualifikasi, ' ') as concat_kualifikasi,lsbu_bu.nama,lsbu_registrasi_history_hapus.NIB,lsbu_registrasi_history_hapus.tgl_permohonan,lsbu_registrasi_history_hapus.propinsi,lsbu_registrasi_history_hapus.tahun,lsbu_registrasi_history_hapus.status_0,lsbu_registrasi_history_hapus.status_1,lsbu_registrasi_history_hapus.status_2,lsbu_registrasi_history_hapus.status_3");
		$this->db->from('lsbu_banding');
		$this->db->join('lsbu_registrasi_history_hapus','lsbu_registrasi_history_hapus.NIB=lsbu_banding.NIB AND lsbu_registrasi_history_hapus.tgl_permohonan=lsbu_banding.tgl_permohonan','left');

		$this->db->join('lsbu_registrasi','lsbu_registrasi.NIB=lsbu_registrasi_history_hapus.NIB AND lsbu_registrasi.tgl_permohonan=lsbu_registrasi_history_hapus.tgl_permohonan','left');

		$this->db->join('lsbu_bu','lsbu_bu.NIB=lsbu_registrasi_history_hapus.NIB','left');
		$this->db->join('lsbu_biaya',"lsbu_biaya.kualifikasi=lsbu_registrasi.kualifikasi AND lsbu_biaya.tipe='0'",'left');

		$this->db->where("lsbu_banding.status='0'");
		$this->db->group_by(array("lsbu_banding.NIB", "lsbu_banding.tgl_permohonan"));
		$query = $this->db->get();
		return $query->result_array();
	}
	function get_penilaian($nib,$tgl_permohonan){
		$this->db->select('user.Nama,lsbu_asesor_penilaian.id_sub_klasifikasi,lsbu_asesor_penilaian.hasil_akhir,lsbu_asesor_penunjukan.id_asesor,lsbu_asesor_penunjukan.status');
		$this->db->from('lsbu_asesor_penunjukan');
		$this->db->join('lsbu_asesor_penilaian','lsbu_asesor_penunjukan.NIB=lsbu_asesor_penilaian.nib AND lsbu_asesor_penunjukan.tgl_permohonan=lsbu_asesor_penilaian.tgl_permohonan AND lsbu_asesor_penunjukan.id_asesor=lsbu_asesor_penilaian.id_asesor','left');
		$this->db->join('user',' lsbu_asesor_penunjukan.id_asesor=user.Username','left');

		$this->db->where("lsbu_asesor_penunjukan.NIB",$nib);
		$this->db->where("lsbu_asesor_penunjukan.tgl_permohonan",$tgl_permohonan);

		$query = $this->db->get();
		return $query->result_array();

	}
	function check_permohonan($nib,$tgl_permohonan){
		$this->db->select('*');
		$this->db->from('lsbu_registrasi_history');

		$this->db->where("NIB",$nib);
		$this->db->where("tgl_permohonan",$tgl_permohonan);
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result_array();

	}
	function get_message($id){
		$this->db->select('*');
		$this->db->from('lsbu_message');
		$this->db->where("id_record",$id);
		$query = $this->db->get();
		return $query->result_array();

	}
	function get_kualifikasi_bu($nib,$tgl_permohonan){
		$this->db->select("GROUP_CONCAT(distinct IF (kualifikasi='M' OR kualifikasi='B', kualifikasi, NULL)) 2_asesor, GROUP_CONCAT(distinct IF (kualifikasi!='M' AND kualifikasi!='B', kualifikasi, NULL)) 1_asesor");
		$this->db->from('lsbu_registrasi');
		$this->db->where('nib',$nib);
		$this->db->where('tgl_permohonan',$tgl_permohonan);

		$query = $this->db->get();
		return $query->result_array();
	}
	function get_mail($id_record){
		$this->db->select('lsbu_pds_history.option1,lsbu_pds_history.option2,lsbu_bu.nama,lsbu_pds_history.read,lsbu_pds_deskripsi.Deskripsi as Deskripsi2,lsbu_pds_upload.Deskripsi,lsbu_pds_history.id_record,lsbu_pds_history.nib,lsbu_pds_history.pds,lsbu_pds_history.id_upload,lsbu_pds_history.id_user,lsbu_pds_history.tgl_record,lsbu_pds_history.ket');
		$this->db->from('lsbu_pds_history');
		$this->db->join('lsbu_bu','lsbu_bu.NIB=lsbu_pds_history.nib','left');
		$this->db->join('lsbu_pds_upload','lsbu_pds_history.id_upload=lsbu_pds_upload.ID_Upload','left');
		$this->db->join('lsbu_pds_deskripsi','lsbu_pds_history.pds=lsbu_pds_deskripsi.ID_PDS','left');
		$this->db->where('lsbu_pds_history.ID_RECORD',$id_record);
		$query = $this->db->get();
		return $query->result_array();
	}
	function read_mail($id_record){
		$this->db->set('Read', 1);
		$this->db->where('id_record',$id_record);
		$this->db->update('lsbu_pds_history');
	}
	public function get_current_page_records($limit, $start)
	{
			$nib=$this->session->userdata('id_user');
			$this->db->limit($limit, $start);
			$this->db->select('lsbu_bu.nama,lsbu_pds_history.read,lsbu_pds_deskripsi.Deskripsi as Deskripsi2,lsbu_pds_upload.Deskripsi,lsbu_pds_history.id_record,lsbu_pds_history.nib,lsbu_pds_history.pds,lsbu_pds_history.id_upload,lsbu_pds_history.id_user,lsbu_pds_history.tgl_record,lsbu_pds_history.ket');
			$this->db->from('lsbu_pds_history');
			$this->db->join('lsbu_pds_upload','lsbu_pds_history.id_upload=lsbu_pds_upload.ID_Upload','left');
			$this->db->join('lsbu_pds_deskripsi','lsbu_pds_history.pds=lsbu_pds_deskripsi.ID_PDS','left');
			$this->db->join('lsbu_bu','lsbu_pds_history.nib=lsbu_bu.NIB','left');
			$this->db->where('lsbu_pds_history.nib',$nib);
			$this->db->where('lsbu_pds_history.status',0);
			$this->db->order_by("lsbu_pds_history.id_record", "desc");
			$query = $this->db->get();
			return $query->result_array();
	}
	public function get_current_page_records_message($limit, $start)
	{
			$nib=$this->session->userdata('id_user');
			$this->db->limit($limit, $start);
			$this->db->select('lsbu_message.proses,lsbu_bu.nama,lsbu_pds_deskripsi.Deskripsi as Deskripsi2,lsbu_message.id_record,lsbu_message.nib,lsbu_message.pds,lsbu_message.id_user,lsbu_message.Log,lsbu_message.subject');
			$this->db->from('lsbu_message');
			$this->db->join('lsbu_pds_deskripsi','lsbu_message.pds=lsbu_pds_deskripsi.ID_PDS','left');
			$this->db->join('lsbu_bu','lsbu_message.nib=lsbu_bu.NIB','left');
			$this->db->where('lsbu_message.nib',$nib);
			$this->db->order_by("lsbu_message.id_record", "desc");
			$query = $this->db->get();
			return $query->result_array();
	}
	public function get_total_records_message()
	{
			$nib=$this->session->userdata('id_user');
			$this->db->select('count(lsbu_message.nib) as jumlah');
			$this->db->from('lsbu_message');
			$this->db->join('lsbu_pds_deskripsi','lsbu_message.pds=lsbu_pds_deskripsi.ID_PDS','left');
			$this->db->join('lsbu_bu','lsbu_message.nib=lsbu_bu.NIB','left');
			$this->db->where('lsbu_message.nib',$nib);
			$this->db->order_by("lsbu_message.id_record", "desc");
			$query = $this->db->get();
			return $query->result_array();
	}
	public function get_total_records()
	{
			$nib=$this->session->userdata('id_user');

			$this->db->select('count(lsbu_pds_history.nib) as jumlah');
			$this->db->from('lsbu_pds_history');
			$this->db->join('lsbu_pds_upload','lsbu_pds_history.id_upload=lsbu_pds_upload.ID_Upload','left');
			$this->db->join('lsbu_pds_deskripsi','lsbu_pds_history.pds=lsbu_pds_deskripsi.ID_PDS','left');
			$this->db->join('lsbu_bu','lsbu_pds_history.nib=lsbu_bu.NIB','left');
			$this->db->where('lsbu_pds_history.nib',$nib);
			$this->db->where('lsbu_pds_history.status',0);
			$this->db->order_by("lsbu_pds_history.id_record", "desc");
			$query = $this->db->get();
			return $query->result_array();
	}

	public function berita_acara_penilaian($nib,$tgl,$id_asesor){
		$this->db->select('lsbu_asesor_penilaian.pemenuhan_peralatan,lsbu_asesor_penilaian.pemenuhan_penjualan_tahunan,lsbu_asesor_penilaian.pemenuhan_smm,lsbu_asesor_penilaian.pemenuhan_smap,lsbu_klasifikasi_sub_kbli.nomor_kbli,lsbu_klasifikasi_sub_kbli.deskripsi_subklasifikasi,lsbu_asesor_penilaian.pemutus,lsbu_asesor_penilaian.NIB,lsbu_asesor_penilaian.id_asesor,lsbu_asesor_penilaian.comment,lsbu_asesor_penilaian.hasil_akhir,lsbu_asesor_penilaian.kd,lsbu_asesor_penilaian.id_klasifikasi,lsbu_asesor_penilaian.id_sub_klasifikasi,lsbu_asesor_penilaian.kualifikasi,lsbu_asesor_penilaian.tgl_permohonan');
		$this->db->from('lsbu_asesor_penilaian');

		$this->db->join('lsbu_klasifikasi_sub_kbli','lsbu_klasifikasi_sub_kbli.id_sub_klasifikasi=lsbu_asesor_penilaian.id_sub_klasifikasi','left');



		$this->db->where('lsbu_asesor_penilaian.NIB',$nib);
		$this->db->where('lsbu_asesor_penilaian.tgl_permohonan',$tgl);
		$this->db->where('lsbu_asesor_penilaian.id_asesor',$id_asesor);
		$query = $this->db->get();
		return $query->result_array();
	}
	function get_ceklis_asesor($nib,$tgl,$asesor){
		$this->db->select('lsbu_ceklis_asesor.ceklis_2,user.Nama,lsbu_pds_upload.Deskripsi,lsbu_ceklis_asesor.NIB,lsbu_ceklis_asesor.tgl_permohonan,lsbu_ceklis_asesor.id_asesor,lsbu_ceklis_asesor.id,lsbu_ceklis_asesor.ceklis,lsbu_ceklis_asesor.comment,lsbu_ceklis_asesor.Log');
		$this->db->from('lsbu_ceklis_asesor');
		$this->db->join('lsbu_pds_upload','lsbu_pds_upload.ID_Upload=lsbu_ceklis_asesor.id','left');
		$this->db->join('user','lsbu_ceklis_asesor.id_asesor=user.Username','left');

		$this->db->where("lsbu_ceklis_asesor.NIB",$nib);
		$this->db->where("lsbu_ceklis_asesor.tgl_permohonan",$tgl);
		$this->db->where("lsbu_ceklis_asesor.id_asesor",$asesor);
		$query = $this->db->get();
		return $query->result_array();

	}
	function check_penunjukan($nib,$tgl,$id_asesor){
		$this->db->select('*');
		$this->db->from('lsbu_asesor_penunjukan');
		$this->db->where("NIB",$nib);
		$this->db->where("tgl_permohonan",$tgl);
		$this->db->where("id_asesor",$id_asesor);
		$query = $this->db->get();
		return $query->result_array();

	}
	function get_peralatan_master(){
		$this->db->select('*');
		$this->db->from('lsbu_master_peralatan');

		$query = $this->db->get();
		return $query->result_array();

	}
	function get_api_master(){
		$this->db->select('*');
		$this->db->from('lsbu_master_api');

		$query = $this->db->get();
		return $query->result_array();

	}
	function get_peralatan_master_jenis(){
		$this->db->select('*');
		$this->db->from('lsbu_master_peralatan');
		$this->db->group_by('jenis');
		$query = $this->db->get();
		return $query->result_array();

	}
	function get_peralatan_master_tipe(){
		$this->db->select('*');
		$this->db->from('lsbu_master_peralatan');
		$this->db->group_by('varian');
		$query = $this->db->get();
		return $query->result_array();

	}
	function get_peralatan_master_sub_tipe(){
		$this->db->select('*');
		$this->db->from('lsbu_master_peralatan');
		$this->db->group_by('subvarian');
		$query = $this->db->get();
		return $query->result_array();

	}
	function get_tipe_peralatan($tipe){
		$this->db->select('*');
		$this->db->from('lsbu_master_peralatan');
		$this->db->where('jenis',$tipe);
		$this->db->group_by('varian');
		$query = $this->db->get();
		return $query->result_array();

	}
	function get_sub_tipe_peralatan($tipe){
		$this->db->select('*');
		$this->db->from('lsbu_master_peralatan');
		$this->db->where('varian',$tipe);
		$query = $this->db->get();
		return $query->result_array();

	}
	function check_penunjukan2($nib,$tgl){
		$this->db->select('*');
		$this->db->from('lsbu_asesor_penunjukan');
		$this->db->where("NIB",$nib);
		$this->db->where("tgl_permohonan",$tgl);
		$this->db->group_by('id_asesor');

		$query = $this->db->get();
		return $query->result_array();

	}
	function get_penilaian_asesor($nib,$tgl,$id_asesor){
		$this->db->select('*');
		$this->db->from('lsbu_asesor_penilaian');
		$this->db->where("NIB",$nib);
		$this->db->where("tgl_permohonan",$tgl);
		$this->db->where("id_asesor",$id_asesor);
		$query = $this->db->get();
		return $query->result_array();

	}
	public function get_current_page_records_asesor($limit, $start)
	{
			$id_user=$this->session->userdata('id_user');
			$this->db->limit($limit, $start);
			$this->db->select('lsbu_bu.nama as nama_bu,lsbu_asesor_penunjukan.NIB,lsbu_asesor_penunjukan.tgl_permohonan,lsbu_asesor_penunjukan.username,lsbu_asesor_penunjukan.tglupdate');
			$this->db->from('lsbu_asesor_penunjukan');
			$this->db->join('lsbu_bu','lsbu_asesor_penunjukan.NIB=lsbu_bu.NIB','left');
			$this->db->join('lsbu_registrasi_history','lsbu_registrasi_history.NIB=lsbu_asesor_penunjukan.NIB AND lsbu_asesor_penunjukan.tgl_permohonan=lsbu_registrasi_history.tgl_permohonan','left');
			$this->db->where("lsbu_asesor_penunjukan.id_asesor",$id_user);

			$this->db->where("lsbu_registrasi_history.status_1!='0000-00-00'");
			$this->db->where("lsbu_registrasi_history.status_2='0000-00-00'");
			$this->db->group_by(array('lsbu_registrasi_history.NIB','lsbu_registrasi_history.tgl_permohonan'));
			$this->db->order_by("lsbu_asesor_penunjukan.tglupdate", "desc");
			$query = $this->db->get();
			return $query->result_array();
	}
	function delete_opr($select,$where){

		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}
	function get_ceklis($nib,$tgl,$status){
		$this->db->select('lsbu_pds_upload.Deskripsi,lsbu_ceklis.NIB,lsbu_ceklis.tgl_permohonan,lsbu_ceklis.status,lsbu_ceklis.id,lsbu_ceklis.ceklis,lsbu_ceklis.comment,lsbu_ceklis.Log');
		$this->db->from('lsbu_ceklis');
		$this->db->join('lsbu_pds_upload','lsbu_pds_upload.ID_Upload=lsbu_ceklis.id','left');

		$this->db->where("lsbu_ceklis.NIB",$nib);
		$this->db->where("lsbu_ceklis.tgl_permohonan",$tgl);
		$this->db->where("lsbu_ceklis.status",$status);
		$query = $this->db->get();
		return $query->result_array();

	}
	public function get_permohonan_masuk_2($nib,$tgl_permohonan)
	{
			$this->db->select('*');
			$this->db->from('lsbu_registrasi');
			$this->db->where("NIB",$nib);
			$this->db->where("tgl_permohonan",$tgl_permohonan);

			$query = $this->db->get();
			return $query->result_array();
	}
	function detele_pph_omset($nib){
		$this->db->where('NIB',$nib);
		$this->db->delete('lsbu_keuangan_pendapatan');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}

	}
	function delete_pjt($nib){
		$this->db->where('NIB',$nib);
		$this->db->delete('lsbu_pjtbu');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}

	}
	function delete_pjskbu($nib,$id_sub_klasifikasi){
		$this->db->where('NIB',$nib);
		$this->db->where('id_sub_klasifikasi_pjsk',$id_sub_klasifikasi);
		$this->db->delete('lsbu_pjskbu');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}

	}
	function delete_penjualan_tahunan($nib,$id_sub_klasifikasi){
		$this->db->where('NIB',$nib);
		$this->db->where('id_sub_klasifikasi',$id_sub_klasifikasi);
		$this->db->delete('lsbu_pengalaman');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}

	}
	function delete_permohonan($nib,$tgl_permohonan){
		$this->db->where('NIB',$nib);
		$this->db->where('tgl_permohonan',$tgl_permohonan);
		$this->db->delete('lsbu_registrasi_history');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}

	}
	function delete_master_api(){
	$this->db->where("username != ''");
		$this->db->delete('lsbu_master_api');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}

	}
	function delete_master_peralatan(){
	$this->db->where("kode != ''");
		$this->db->delete('lsbu_master_peralatan');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}

	}
	function delete_ceklis_verifikasi($nib,$tgl_permohonan){
		$this->db->where('NIB',$nib);
		$this->db->where('tgl_permohonan',$tgl_permohonan);
		$this->db->where('status','1');
		$this->db->delete('lsbu_ceklis');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}

	}
	function delete_ceklis_validasi($nib,$tgl_permohonan){
		$this->db->where('NIB',$nib);
		$this->db->where('tgl_permohonan',$tgl_permohonan);
		$this->db->where('status','2');
		$this->db->delete('lsbu_ceklis');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}

	}
	function delete_penilaian($nib,$tgl_permohonan){
		$this->db->where('NIB',$nib);
		$this->db->where('tgl_permohonan',$tgl_permohonan);
		$this->db->delete('lsbu_asesor_penilaian');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}

	}
	function delete_ceklis_penilaian($nib,$tgl_permohonan){
		$this->db->where('NIB',$nib);
		$this->db->where('tgl_permohonan',$tgl_permohonan);
		$this->db->delete('lsbu_ceklis_asesor');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}

	}
	function delete_penunjukan($nib,$tgl_permohonan){
		$this->db->where('NIB',$nib);
		$this->db->where('tgl_permohonan',$tgl_permohonan);
		$this->db->delete('lsbu_asesor_penunjukan');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}

	}
	function detele_peralatan($nib,$id){
		$this->db->where('NIB',$nib);
		$this->db->where("id IN ($id)");
		$this->db->delete('lsbu_peralatan');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}

	}
	function detele_pemegang_saham($nib,$id){
		$this->db->where('NIB',$nib);
		$this->db->where("id_saham IN ($id)");
		$this->db->delete('lsbu_keuangan_saham');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}

	}
	function detele_tenaga_kerja($nib,$id){
		$this->db->where('NIB',$nib);
		$this->db->where("noreg IN ($id)");
		$this->db->delete('lsbu_tenaga_kerja');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}

	}
	function detele_neraca($nib,$id){
		$this->db->where('NIB',$nib);
		$this->db->where("Tahun IN ($id)");
		$this->db->delete('lsbu_keuangan_neraca');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}

	}
	function detele_neraca_ski($nib,$id){
		$this->db->where('NIB',$nib);
		$this->db->where("Tahun IN ($id)");
		$this->db->delete('lsbu_keuangan_neraca_2');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}

	}
	function detele_akte_pendirian($nib){
		$this->db->where('NIB',$nib);
		$this->db->delete('lsbu_akte_pendirian');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}

	}
	function detele_akte_perubahan($nib,$id){
		$this->db->where('NIB',$nib);
		$this->db->where("nomer_akte IN ($id)");
		$this->db->delete('lsbu_akte_perubahan');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}

	}
	function detele_pengalaman($nib,$id,$id2){
		$this->db->where('NIB',$nib);
		$this->db->where("id_sub_klasifikasi IN ($id)");
		$this->db->where("nilai_kontrak IN ($id2)");

		$this->db->delete('lsbu_pengalaman');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}

	}
	function detele_pengurus($nib,$id){
		$this->db->where('NIB',$nib);
		$this->db->where("id_pengurus IN ($id)");
		$this->db->delete('lsbu_pengurus');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}

	}
	function detele_administrasi($nib){
		$this->db->where('NIB',$nib);
		$this->db->delete('lsbu_bu');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}

	}
	function update($select,$where){
		$this->db->query("$select $where");
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
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
	function get_surat_tugas($nib,$tgl_permohonan){
		$this->db->select('*');
		$this->db->from('lsbu_surat_penunjukan');

		$this->db->where('NIB',$nib);
		$this->db->where('tgl_permohonan',$tgl_permohonan);
		$query = $this->db->get();
		return $query->result_array();
	}
	function get_klasi($nib,$tgl_permohonan){
		$this->db->select('*');
		$this->db->from('lsbu_registrasi');

		$this->db->where('NIB',$nib);
		$this->db->where('tgl_permohonan',$tgl_permohonan);
		$query = $this->db->get();
		return $query->result_array();
	}

	function delete_nilai_bu($nib,$tgl_permohonan,$id_asesor){
		$this->db->where('NIB',$nib);
		$this->db->where('tgl_permohonan',$tgl_permohonan);
		$this->db->where('id_asesor',$id_asesor);
		$this->db->delete('lsbu_asesor_penunjukan');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}

	}
	function pilih_asesor($nama){
		$this->db->select('user.Username,user.Nama,user.NIB as no_ktp,propinsi.Nama as nama_propinsi');
		$this->db->from('user');
		$this->db->join('propinsi','user.Id_propinsi=propinsi.ID_Propinsi','left');

		$this->db->or_like('user.Nama', $nama);
		$this->db->where("user.level","3");

		$this->db->group_by('user.Username');

		$query = $this->db->get();
		return $query->result_array();

	}
	function cek_pilih_asesor($nib,$tgl_permohonan,$status){
		$this->db->select('user.Username,propinsi.Nama as nama_propinsi,user.Username,user.Nama,lsbu_asesor_penilaian.tgl_penilaian,lsbu_asesor_penilaian.hasil_akhir');
		$this->db->from('lsbu_asesor_penunjukan');
		$this->db->join('user','user.Username=lsbu_asesor_penunjukan.id_asesor','left');
		$this->db->join('lsbu_asesor_penilaian','lsbu_asesor_penilaian.id_asesor=lsbu_asesor_penunjukan.id_asesor AND lsbu_asesor_penilaian.tgl_permohonan=lsbu_asesor_penunjukan.tgl_permohonan AND lsbu_asesor_penilaian.NIB=lsbu_asesor_penunjukan.NIB','left');
		$this->db->join('propinsi','user.Id_propinsi=propinsi.ID_Propinsi','left');
		$this->db->where('lsbu_asesor_penunjukan.NIB',$nib);
		$this->db->where('lsbu_asesor_penunjukan.tgl_permohonan',$tgl_permohonan);
		$this->db->where('lsbu_asesor_penunjukan.status',$status);
		$this->db->group_by('lsbu_asesor_penunjukan.id_asesor');
		$this->db->limit(2);
		$query = $this->db->get();
		return $query->result_array();
	}
	function cek_pilih_asesor2($nib,$tgl_permohonan){
		$this->db->select('lsbu_fakta_integritas.persyaratan,user.Username,user.Nama,lsbu_asesor_penilaian.tgl_penilaian,lsbu_asesor_penilaian.hasil_akhir');
		$this->db->from('lsbu_asesor_penunjukan');
		$this->db->join('user','user.Username=lsbu_asesor_penunjukan.id_asesor','left');
		$this->db->join('lsbu_asesor_penilaian','lsbu_asesor_penilaian.id_asesor=lsbu_asesor_penunjukan.id_asesor AND lsbu_asesor_penilaian.tgl_permohonan=lsbu_asesor_penunjukan.tgl_permohonan AND lsbu_asesor_penilaian.NIB=lsbu_asesor_penunjukan.NIB','left');
		$this->db->join('lsbu_fakta_integritas','lsbu_fakta_integritas.id_asesor=lsbu_asesor_penunjukan.id_asesor AND lsbu_fakta_integritas.tgl_permohonan=lsbu_asesor_penunjukan.tgl_permohonan AND lsbu_fakta_integritas.NIB=lsbu_asesor_penunjukan.NIB','left');

		$this->db->where('lsbu_asesor_penunjukan.NIB',$nib);
		$this->db->where('lsbu_asesor_penunjukan.tgl_permohonan',$tgl_permohonan);
		$this->db->group_by('lsbu_asesor_penunjukan.id_asesor');
		$this->db->limit(2);
		$query = $this->db->get();
		return $query->result_array();
	}
	function cek_pilih_asesor3($nib,$tgl_permohonan,$id_asesor){
		$this->db->select('lsbu_fakta_integritas.persyaratan,user.Username,user.Nama,lsbu_asesor_penilaian.tgl_penilaian,lsbu_asesor_penilaian.hasil_akhir');
		$this->db->from('lsbu_asesor_penunjukan');
		$this->db->join('user','user.Username=lsbu_asesor_penunjukan.id_asesor','left');
		$this->db->join('lsbu_asesor_penilaian','lsbu_asesor_penilaian.id_asesor=lsbu_asesor_penunjukan.id_asesor AND lsbu_asesor_penilaian.tgl_permohonan=lsbu_asesor_penunjukan.tgl_permohonan AND lsbu_asesor_penilaian.NIB=lsbu_asesor_penunjukan.NIB','left');
		$this->db->join('lsbu_fakta_integritas','lsbu_fakta_integritas.id_asesor=lsbu_asesor_penunjukan.id_asesor AND lsbu_fakta_integritas.tgl_permohonan=lsbu_asesor_penunjukan.tgl_permohonan AND lsbu_fakta_integritas.NIB=lsbu_asesor_penunjukan.NIB','left');

		$this->db->where('lsbu_asesor_penunjukan.NIB',$nib);
		$this->db->where('lsbu_asesor_penunjukan.tgl_permohonan',$tgl_permohonan);
		$this->db->where('lsbu_asesor_penunjukan.id_asesor',$id_asesor);
		$this->db->group_by('lsbu_asesor_penunjukan.id_asesor');
		$this->db->limit(2);
		$query = $this->db->get();
		return $query->result_array();
	}
	function check_nilai($nib, $tgl_permohonan){
		$this->db->select('NIB');
		$this->db->from('lsbu_asesor_penilaian');

		$this->db->where('NIB',$nib);
		$this->db->where('tgl_permohonan',$tgl_permohonan);
		$query = $this->db->get();
		return $query->result_array();
	}
	function get_user_pelaksana(){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('Id_propinsi!="00"');
		$this->db->where('level','2');

		$query = $this->db->get();
		return $query->result_array();
	}
	function get_user_pemutus(){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('level','6');

		$query = $this->db->get();
		return $query->result_array();
	}
	function get_user_keuangan(){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('Id_propinsi','00');
		$this->db->where('level','4');

		$query = $this->db->get();
		return $query->result_array();
	}
	function get_user_sertifikasi(){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('Id_propinsi','00');
		$this->db->where('level','5');

		$query = $this->db->get();
		return $query->result_array();
	}
	function get_user_asesor(){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('Id_propinsi!="00"');
		$this->db->where('level','3');

		$query = $this->db->get();
		return $query->result_array();
	}
  function get_user($id_user){
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('Username',$id_user);
    $query = $this->db->get();
    return $query->result_array();
  }
  function get_nib_mitra($nib){
    $this->db->select('*');
    $this->db->from('mitra_nib');
    $this->db->where('NIB',$nib);
    $query = $this->db->get();
    return $query->result_array();
  }
	function get_revisi($nib, $tgl){
		$this->db->select('*');
		$this->db->from('lsbu_pds_history');
		$this->db->where('NIB',$nib);
		$this->db->where('tgl_permohonan',$tgl);

		$query = $this->db->get();
		return $query->result_array();
	}
	function get_revisi_2($nib, $tgl){
		$this->db->select('lsbu_pds_history.tgl_record,lsbu_pds_upload.Deskripsi as upload_deskripsi,lsbu_pds_deskripsi.Deskripsi as pds_deskrpsi,lsbu_pds_history.id_record,lsbu_pds_history.nib,lsbu_pds_history.tgl_permohonan,lsbu_pds_history.id_upload,lsbu_pds_history.id_user,lsbu_pds_history.tgl_record,lsbu_pds_history.ket,lsbu_pds_history.option1,lsbu_pds_history.option2,lsbu_pds_history.status,lsbu_pds_history.read');
		$this->db->from('lsbu_pds_history');
		$this->db->join('lsbu_pds_deskripsi','lsbu_pds_history.pds=lsbu_pds_deskripsi.ID_PDS','left');
		$this->db->join('lsbu_pds_upload','lsbu_pds_history.id_upload=lsbu_pds_upload.ID_Upload','left');

		$this->db->where('lsbu_pds_history.NIB',$nib);
		$this->db->where('lsbu_pds_history.tgl_permohonan',$tgl);

		$query = $this->db->get();
		return $query->result_array();
	}
	function get_revisi_3($nib, $tgl){
		$this->db->select('lsbu_pds_history.tgl_record,lsbu_pds_upload.Deskripsi as upload_deskripsi,lsbu_pds_deskripsi.Deskripsi as pds_deskrpsi,lsbu_pds_history.id_record,lsbu_pds_history.nib,lsbu_pds_history.tgl_permohonan,lsbu_pds_history.id_upload,lsbu_pds_history.id_user,lsbu_pds_history.tgl_record,lsbu_pds_history.ket,lsbu_pds_history.option1,lsbu_pds_history.option2,lsbu_pds_history.status,lsbu_pds_history.read');
		$this->db->from('lsbu_pds_history');
		$this->db->join('lsbu_pds_deskripsi','lsbu_pds_history.pds=lsbu_pds_deskripsi.ID_PDS','left');
		$this->db->join('lsbu_pds_upload','lsbu_pds_history.id_upload=lsbu_pds_upload.ID_Upload','left');

		$this->db->where('lsbu_pds_history.NIB',$nib);

		$query = $this->db->get();
		return $query->result_array();
	}
	function rekomendasi_update($nib,$tgl_permohonan){
		$this->db->set('status_2', date("Y-m_d"));
		$this->db->where('NIB',$nib);
		$this->db->where('tgl_permohonan',$tgl_permohonan);
		$this->db->update('lsbu_registrasi_history');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}
	public function berita_acara($nib,$tgl){
		$this->db->select('lsbu_asesor_penilaian.pemenuhan_penjualan_tahunan,lsbu_asesor_penilaian.pemenuhan_peralatan,lsbu_asesor_penilaian.pemenuhan_smm,lsbu_asesor_penilaian.pemenuhan_smap,lsbu_asesor_penilaian.smm,lsbu_asesor_penilaian.aset,lsbu_asesor_penilaian.tk,lsbu_asesor_penilaian.smap,lsbu_asesor_penilaian.penjualan_tahunan,lsbu_asesor_penilaian.peralatan, lsbu_klasifikasi_sub_kbli.nomor_kbli,lsbu_klasifikasi_sub_kbli.deskripsi_subklasifikasi,lsbu_asesor_penilaian.pemutus,lsbu_asesor_penilaian.NIB,user.Nama,lsbu_asesor_penilaian.id_asesor,lsbu_asesor_penilaian.comment,lsbu_asesor_penilaian.hasil_akhir,lsbu_asesor_penilaian.kd,lsbu_bu.alamat_bu,lsbu_bu.nama,lsbu_asesor_penilaian.id_klasifikasi,lsbu_asesor_penilaian.id_sub_klasifikasi,lsbu_asesor_penilaian.kualifikasi,lsbu_asesor_penilaian.tgl_permohonan');
		$this->db->from('lsbu_asesor_penilaian');
		$this->db->join('user','lsbu_asesor_penilaian.id_asesor=user.Username','left');

		$this->db->join('lsbu_bu','lsbu_bu.NIB=lsbu_asesor_penilaian.NIB','left');
		$this->db->join('lsbu_klasifikasi_sub_kbli','lsbu_klasifikasi_sub_kbli.id_sub_klasifikasi=lsbu_asesor_penilaian.id_sub_klasifikasi','left');



		$this->db->where('lsbu_asesor_penilaian.NIB',$nib);
		$this->db->where('lsbu_asesor_penilaian.tgl_permohonan',$tgl);
		$this->db->where('lsbu_asesor_penilaian.pemutus','1');
		$this->db->group_by('lsbu_asesor_penilaian.id_sub_klasifikasi');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function berita_acara2($nib,$tgl){
		$this->db->select('lsbu_asesor_penilaian.aset,lsbu_asesor_penilaian.tk,lsbu_asesor_penilaian.smm,lsbu_asesor_penilaian.smap,lsbu_asesor_penilaian.penjualan_tahunan,lsbu_asesor_penilaian.peralatan, lsbu_klasifikasi_sub_kbli.nomor_kbli,lsbu_klasifikasi_sub_kbli.deskripsi_subklasifikasi,lsbu_asesor_penilaian.pemutus,lsbu_asesor_penilaian.NIB,user.Nama,lsbu_asesor_penilaian.id_asesor,lsbu_asesor_penilaian.comment,lsbu_asesor_penilaian.hasil_akhir,lsbu_asesor_penilaian.kd,lsbu_bu.alamat_bu,lsbu_bu.nama,lsbu_asesor_penilaian.id_klasifikasi,lsbu_asesor_penilaian.id_sub_klasifikasi,lsbu_asesor_penilaian.kualifikasi,lsbu_asesor_penilaian.tgl_permohonan');
		$this->db->from('lsbu_asesor_penilaian');
		$this->db->join('user','lsbu_asesor_penilaian.id_asesor=user.Username','left');

		$this->db->join('lsbu_bu','lsbu_bu.NIB=lsbu_asesor_penilaian.NIB','left');
		$this->db->join('lsbu_klasifikasi_sub_kbli','lsbu_klasifikasi_sub_kbli.id_sub_klasifikasi=lsbu_asesor_penilaian.id_sub_klasifikasi','left');



		$this->db->where('lsbu_asesor_penilaian.NIB',$nib);
		$this->db->where('lsbu_asesor_penilaian.tgl_permohonan',$tgl);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function berita_acara2_post($nib,$tgl){
		$this->db->select('lsbu_registrasi.id_izin,lsbu_asesor_penilaian.aset,lsbu_asesor_penilaian.tk,lsbu_asesor_penilaian.smm,lsbu_asesor_penilaian.smap,lsbu_asesor_penilaian.penjualan_tahunan,lsbu_asesor_penilaian.peralatan, lsbu_klasifikasi_sub_kbli.nomor_kbli,lsbu_klasifikasi_sub_kbli.deskripsi_subklasifikasi,lsbu_asesor_penilaian.pemutus,lsbu_asesor_penilaian.NIB,user.Nama,asesor_matrix.id_asesor_lpjk as id_asesor,lsbu_asesor_penilaian.comment,lsbu_asesor_penilaian.hasil_akhir,lsbu_asesor_penilaian.kd,lsbu_bu.alamat_bu,lsbu_bu.nama,lsbu_asesor_penilaian.id_klasifikasi,lsbu_asesor_penilaian.id_sub_klasifikasi,lsbu_asesor_penilaian.kualifikasi,lsbu_asesor_penilaian.tgl_permohonan');
		$this->db->from('lsbu_asesor_penilaian');
		$this->db->join('lsbu_registrasi','lsbu_asesor_penilaian.NIB=lsbu_registrasi.NIB AND lsbu_asesor_penilaian.id_sub_klasifikasi=lsbu_registrasi.id_sub_klasifikasi','left');

		$this->db->join('user','lsbu_asesor_penilaian.id_asesor=user.Username','left');
		$this->db->join('asesor_matrix','asesor_matrix.id_asesor_lsbu=lsbu_asesor_penilaian.id_asesor','left');
		$this->db->join('lsbu_bu','lsbu_bu.NIB=lsbu_asesor_penilaian.NIB','left');
		$this->db->join('lsbu_klasifikasi_sub_kbli','lsbu_klasifikasi_sub_kbli.id_sub_klasifikasi=lsbu_asesor_penilaian.id_sub_klasifikasi','left');



		$this->db->where('lsbu_asesor_penilaian.NIB',$nib);
		$this->db->where('lsbu_asesor_penilaian.tgl_permohonan',$tgl);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function berita_acara3($nib,$tgl,$id_asesor){
		$this->db->select('lsbu_asesor_penilaian.aset,lsbu_asesor_penilaian.tk,lsbu_asesor_penilaian.smm,lsbu_asesor_penilaian.smap,lsbu_asesor_penilaian.penjualan_tahunan,lsbu_asesor_penilaian.peralatan, lsbu_klasifikasi_sub_kbli.nomor_kbli,lsbu_klasifikasi_sub_kbli.deskripsi_subklasifikasi,lsbu_asesor_penilaian.pemutus,lsbu_asesor_penilaian.NIB,user.Nama,lsbu_asesor_penilaian.id_asesor,lsbu_asesor_penilaian.comment,lsbu_asesor_penilaian.hasil_akhir,lsbu_asesor_penilaian.kd,lsbu_bu.alamat_bu,lsbu_bu.nama,lsbu_asesor_penilaian.id_klasifikasi,lsbu_asesor_penilaian.id_sub_klasifikasi,lsbu_asesor_penilaian.kualifikasi,lsbu_asesor_penilaian.tgl_permohonan');
		$this->db->from('lsbu_asesor_penilaian');
		$this->db->join('user','lsbu_asesor_penilaian.id_asesor=user.Username','left');

		$this->db->join('lsbu_bu','lsbu_bu.NIB=lsbu_asesor_penilaian.NIB','left');
		$this->db->join('lsbu_klasifikasi_sub_kbli','lsbu_klasifikasi_sub_kbli.id_sub_klasifikasi=lsbu_asesor_penilaian.id_sub_klasifikasi','left');



		$this->db->where('lsbu_asesor_penilaian.NIB',$nib);
		$this->db->where('lsbu_asesor_penilaian.tgl_permohonan',$tgl);
		$this->db->where('lsbu_asesor_penilaian.id_asesor',$id_asesor);
		$query = $this->db->get();
		return $query->result_array();
	}
	function verifikasi_update($nib,$tgl_permohonan,$nomer_urut){
		$data=array(
			'status_1'=>date("Y-m_d"),
			'user_status_1'=>$this->session->userdata('id_user'),
			'no_urut'=>$nomer_urut
		);
		$this->db->set($data);
		$this->db->where('NIB',$nib);
		$this->db->where('tgl_permohonan',$tgl_permohonan);
		$this->db->update('lsbu_registrasi_history');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}
	function pemutus_update($nib,$tgl_permohonan){
		$this->db->set('status_2', date("Y-m_d"));
		$this->db->where('NIB',$nib);
		$this->db->where('tgl_permohonan',$tgl_permohonan);
		$this->db->update('lsbu_registrasi_history');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}
	function verifikasi_pembayaran_update($nib,$tgl_permohonan){
		$data=array(
			'verifikasi_pembayaran'=>'1',
			'user_biaya'=>$this->session->userdata('id_user'),
			'tgl_biaya'=>date("Y-m-d H:i:sa")
		);
		$this->db->set($data);
		$this->db->where('NIB',$nib);
		$this->db->where('tgl_permohonan',$tgl_permohonan);
		$this->db->update('lsbu_registrasi_history');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}
	function validasi_update($nib,$tgl_permohonan){
		$data=array(
			'status_2'=>date("Y-m_d"),
			'user_status_2'=>$this->session->userdata('id_user')
		);
		$this->db->set($data);
		$this->db->where('NIB',$nib);
		$this->db->where('tgl_permohonan',$tgl_permohonan);
		$this->db->update('lsbu_registrasi_history');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}
	function update_stack($nib,$tgl_permohonan){
		$data=array(
			'stack'=>'1',
		);
		$this->db->set($data);
		$this->db->where('NIB',$nib);
		$this->db->where('tgl_permohonan',$tgl_permohonan);
		$this->db->update('lsbu_registrasi_history');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}
	}
	public function list_verifikasi(){
		$this->db->select("bu_asosiasi_detail.Nama as nama_asosiasi,lsbu_registrasi_history.pilihan,lsbu_registrasi_history.stack,propinsi.Nama as nama_propinsi,lsbu_registrasi_history.file_pembayaran,SUM(lsbu_biaya.biaya) as biaya_lsbu,lsbu_registrasi_history.status_0,GROUP_CONCAT(distinct lsbu_registrasi.id_sub_klasifikasi, ' ') as concat_sub,GROUP_CONCAT(distinct lsbu_registrasi.id_klasifikasi, ' ') as concat_klasifikasi,GROUP_CONCAT(distinct lsbu_registrasi.kualifikasi, ' ') as concat_kualifikasi,lsbu_bu.nama,lsbu_registrasi_history.NIB,lsbu_registrasi_history.tgl_permohonan,lsbu_registrasi_history.propinsi,lsbu_registrasi_history.tahun,lsbu_registrasi_history.status_0,lsbu_registrasi_history.status_1,lsbu_registrasi_history.status_2,lsbu_registrasi_history.status_3");
		$this->db->from('lsbu_registrasi_history');
		$this->db->join('lsbu_registrasi','lsbu_registrasi.NIB=lsbu_registrasi_history.NIB AND lsbu_registrasi.tgl_permohonan=lsbu_registrasi_history.tgl_permohonan','left');

		$this->db->join('lsbu_bu','lsbu_bu.NIB=lsbu_registrasi_history.NIB','left');
		$this->db->join('lsbu_biaya',"lsbu_biaya.kualifikasi=lsbu_registrasi.kualifikasi AND lsbu_biaya.tipe=lsbu_bu.klasifikasi_jenis_usaha",'left');
		$this->db->join('propinsi','lsbu_registrasi_history.propinsi=propinsi.ID_Propinsi','left');
		$this->db->join('bu_asosiasi_detail','bu_asosiasi_detail.ID_Asosiasi_BU=lsbu_registrasi.asosiasi','left');

		$this->db->where('lsbu_registrasi_history.status_1','0000-00-00');
		$this->db->where("lsbu_registrasi_history.status_0!='0000-00-00'");
		if($this->ion_auth->pelaksana()){
			$propinsi=$this->session->userdata('id_propinsi');
			$this->db->where('lsbu_registrasi_history.propinsi',$propinsi);

		}
		$this->db->group_by(array("lsbu_registrasi_history.NIB", "lsbu_registrasi_history.tgl_permohonan"));
		$query = $this->db->get();
		return $query->result_array();
	}
	public function list_verifikasi_perubahan(){
		$this->db->select("lsbu_registrasi_history_izin_perubahan.id_izin,bu_asosiasi_detail.Nama as nama_asosiasi,lsbu_registrasi_history_izin_perubahan.stack,propinsi.Nama as nama_propinsi,lsbu_registrasi_history_izin_perubahan.file_pembayaran,SUM(lsbu_biaya.biaya) as biaya_lsbu,lsbu_registrasi_history_izin_perubahan.status_0,GROUP_CONCAT(distinct lsbu_registrasi.id_sub_klasifikasi, ' ') as concat_sub,GROUP_CONCAT(distinct lsbu_registrasi.id_klasifikasi, ' ') as concat_klasifikasi,GROUP_CONCAT(distinct lsbu_registrasi.kualifikasi, ' ') as concat_kualifikasi,lsbu_bu.nama,lsbu_registrasi.NIB,lsbu_registrasi_history_izin_perubahan.tgl_permohonan,lsbu_registrasi_history_izin_perubahan.propinsi,lsbu_registrasi_history_izin_perubahan.tahun,lsbu_registrasi_history_izin_perubahan.status_0,lsbu_registrasi_history_izin_perubahan.status_1,lsbu_registrasi_history_izin_perubahan.status_2,lsbu_registrasi_history_izin_perubahan.status_3");
		$this->db->from('lsbu_registrasi_history_izin_perubahan');
		$this->db->join('lsbu_registrasi','lsbu_registrasi.id_izin=lsbu_registrasi_history_izin_perubahan.id_izin','left');

		$this->db->join('lsbu_bu','lsbu_bu.NIB=lsbu_registrasi.NIB','left');
		$this->db->join('lsbu_biaya',"lsbu_biaya.kualifikasi=lsbu_registrasi.kualifikasi AND lsbu_biaya.tipe=lsbu_bu.klasifikasi_jenis_usaha",'left');
		$this->db->join('propinsi','lsbu_registrasi_history_izin_perubahan.propinsi=propinsi.ID_Propinsi','left');
		$this->db->join('bu_asosiasi_detail','bu_asosiasi_detail.ID_Asosiasi_BU=lsbu_registrasi.asosiasi','left');

		$this->db->where('lsbu_registrasi_history_izin_perubahan.qr IS NULL');


		$this->db->group_by(array("lsbu_registrasi_history_izin_perubahan.id_izin"));
		$query = $this->db->get();
		return $query->result_array();
	}
	public function list_biaya_pembayaran(){
		$this->db->select("lsbu_registrasi_history.file_perjanjian,lsbu_registrasi_history.file_pembayaran,SUM(lsbu_biaya.biaya) as biaya_lsbu,lsbu_registrasi_history.status_0,GROUP_CONCAT(distinct lsbu_registrasi.id_sub_klasifikasi, ' ') as concat_sub,GROUP_CONCAT(distinct lsbu_registrasi.id_klasifikasi, ' ') as concat_klasifikasi,GROUP_CONCAT(distinct lsbu_registrasi.kualifikasi, ' ') as concat_kualifikasi,lsbu_bu.nama,lsbu_registrasi_history.NIB,lsbu_registrasi_history.tgl_permohonan,lsbu_registrasi_history.propinsi,lsbu_registrasi_history.tahun,lsbu_registrasi_history.status_0,lsbu_registrasi_history.status_1,lsbu_registrasi_history.status_2,lsbu_registrasi_history.status_3");
		$this->db->from('lsbu_registrasi_history');
		$this->db->join('lsbu_registrasi','lsbu_registrasi.NIB=lsbu_registrasi_history.NIB AND lsbu_registrasi.tgl_permohonan=lsbu_registrasi_history.tgl_permohonan','left');

		$this->db->join('lsbu_bu','lsbu_bu.NIB=lsbu_registrasi_history.NIB','left');
		$this->db->join('lsbu_biaya',"lsbu_biaya.kualifikasi=lsbu_registrasi.kualifikasi AND lsbu_biaya.tipe=lsbu_bu.klasifikasi_jenis_usaha",'left');


		$this->db->where("lsbu_registrasi_history.status_1!='0000-00-00'");
		$this->db->where('lsbu_registrasi_history.verifikasi_pembayaran','0');
		$this->db->group_by(array("lsbu_registrasi_history.NIB", "lsbu_registrasi_history.tgl_permohonan"));
		$query = $this->db->get();
		return $query->result_array();
	}
	public function klasifikasi_kualifikasi_opr_penilaian($nib,$tgl){
		$this->db->select('lsbu_registrasi.id_permohonan,lsbu_registrasi.id_izin,lsbu_klasifikasi_sub_kbli.nomor_kbli,lsbu_klasifikasi_sub_kbli.deskripsi_subklasifikasi,lsbu_registrasi.NIB,lsbu_registrasi.id_klasifikasi,lsbu_registrasi.id_sub_klasifikasi,lsbu_registrasi.kualifikasi,lsbu_registrasi.tgl_permohonan');
		$this->db->from('lsbu_registrasi');

		$this->db->join('lsbu_klasifikasi_sub_kbli','lsbu_klasifikasi_sub_kbli.id_sub_klasifikasi=lsbu_registrasi.id_sub_klasifikasi','left');



		$this->db->where('lsbu_registrasi.NIB',$nib);
		$this->db->where('lsbu_registrasi.tgl_permohonan',$tgl);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function list_tanda_terima(){
		$this->db->select("lsbu_registrasi_history.tgl_biaya,lsbu_registrasi_history.no_urut,lsbu_registrasi_history.file_pembayaran,lsbu_registrasi_history.file_perjanjian,SUM(lsbu_biaya.biaya) as biaya_lsbu,lsbu_registrasi_history.status_0,GROUP_CONCAT(distinct lsbu_registrasi.id_sub_klasifikasi, ' ') as concat_sub,lsbu_registrasi.qr,GROUP_CONCAT(distinct lsbu_registrasi.id_klasifikasi, ' ') as concat_klasifikasi,GROUP_CONCAT(distinct lsbu_registrasi.kualifikasi, ' ') as concat_kualifikasi,lsbu_bu.nama,lsbu_registrasi_history.NIB,lsbu_registrasi_history.tgl_permohonan,lsbu_registrasi_history.propinsi,lsbu_registrasi_history.tahun,lsbu_registrasi_history.status_0,lsbu_registrasi_history.status_1,lsbu_registrasi_history.status_2,lsbu_registrasi_history.status_3");
		$this->db->from('lsbu_registrasi_history');
		$this->db->join('lsbu_registrasi','lsbu_registrasi.NIB=lsbu_registrasi_history.NIB AND lsbu_registrasi.tgl_permohonan=lsbu_registrasi_history.tgl_permohonan','left');
		$this->db->join('lsbu_asesor_penilaian','lsbu_registrasi.NIB=lsbu_asesor_penilaian.NIB AND lsbu_registrasi.tgl_permohonan=lsbu_asesor_penilaian.tgl_permohonan','left');

		$this->db->join('lsbu_bu','lsbu_bu.NIB=lsbu_registrasi_history.NIB','left');
		$this->db->join('lsbu_biaya',"lsbu_biaya.kualifikasi=lsbu_registrasi.kualifikasi AND lsbu_biaya.tipe=lsbu_bu.klasifikasi_jenis_usaha",'left');

		$this->db->where('lsbu_registrasi_history.status_3','0000-00-00');
		$this->db->where("lsbu_registrasi_history.status_2!='0000-00-00'");
		$this->db->where("lsbu_asesor_penilaian.pemutus","1");
		$this->db->where("(lsbu_registrasi_history.status_2 >= NOW() - INTERVAL 7 DAY)");
		$this->db->group_by(array("lsbu_registrasi_history.NIB", "lsbu_registrasi_history.tgl_permohonan"));

		$query = $this->db->get();
		return $query->result_array();
	}
	function delete_permohonan_izin_perubahan($id_izin){
		$this->db->where('id_izin',$id_izin);
		$this->db->delete('lsbu_registrasi_history_izin_perubahan');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}

	}
	public function list_tanda_terima_perubahan(){
		$this->db->select("lsbu_registrasi_history_izin_perubahan.tgl_biaya,lsbu_registrasi_history_izin_perubahan.no_urut,lsbu_registrasi_history_izin_perubahan.file_pembayaran,lsbu_registrasi_history_izin_perubahan.file_perjanjian,SUM(lsbu_biaya.biaya) as biaya_lsbu,lsbu_registrasi_history_izin_perubahan.status_0,GROUP_CONCAT(distinct lsbu_registrasi.id_sub_klasifikasi, ' ') as concat_sub,lsbu_registrasi.qr,GROUP_CONCAT(distinct lsbu_registrasi.id_klasifikasi, ' ') as concat_klasifikasi,GROUP_CONCAT(distinct lsbu_registrasi.kualifikasi, ' ') as concat_kualifikasi,lsbu_bu.nama,lsbu_registrasi.NIB,lsbu_registrasi_history_izin_perubahan.tgl_permohonan,lsbu_registrasi_history_izin_perubahan.propinsi,lsbu_registrasi_history_izin_perubahan.tahun,lsbu_registrasi_history_izin_perubahan.status_0,lsbu_registrasi_history_izin_perubahan.status_1,lsbu_registrasi_history_izin_perubahan.status_2,lsbu_registrasi_history_izin_perubahan.status_3");
		$this->db->from('lsbu_registrasi_history_izin_perubahan');
		$this->db->join('lsbu_registrasi','lsbu_registrasi.id_izin=lsbu_registrasi_history_izin_perubahan.id_izin','left');
		$this->db->join('lsbu_asesor_penilaian','lsbu_registrasi.NIB=lsbu_asesor_penilaian.NIB AND lsbu_registrasi.tgl_permohonan=lsbu_asesor_penilaian.tgl_permohonan','left');

		$this->db->join('lsbu_bu','lsbu_bu.NIB=lsbu_registrasi.NIB','left');
		$this->db->join('lsbu_biaya',"lsbu_biaya.kualifikasi=lsbu_registrasi.kualifikasi AND lsbu_biaya.tipe=lsbu_bu.klasifikasi_jenis_usaha",'left');

		$this->db->where('lsbu_registrasi_history_izin_perubahan.qr IS NOT NULL');

		$this->db->group_by(array("lsbu_registrasi_history_izin_perubahan.id_izin"));

		$query = $this->db->get();
		return $query->result_array();
	}
	public function list_tanda_terima2(){
		$this->db->select("GROUP_CONCAT(distinct lsbu_registrasi.nomor_kbli, ' ') as concat_kbli,lsbu_registrasi_history.no_urut,lsbu_registrasi_history.file_pembayaran,lsbu_registrasi_history.file_perjanjian,SUM(lsbu_biaya.biaya) as biaya_lsbu,lsbu_registrasi_history.status_0,GROUP_CONCAT(distinct lsbu_registrasi.id_sub_klasifikasi, ' ') as concat_sub,lsbu_registrasi.qr,GROUP_CONCAT(distinct lsbu_registrasi.id_klasifikasi, ' ') as concat_klasifikasi,GROUP_CONCAT(distinct lsbu_registrasi.kualifikasi, ' ') as concat_kualifikasi,lsbu_bu.nama,lsbu_registrasi_history.NIB,lsbu_registrasi_history.tgl_permohonan,lsbu_registrasi_history.propinsi,lsbu_registrasi_history.tahun,lsbu_registrasi_history.status_0,lsbu_registrasi_history.status_1,lsbu_registrasi_history.status_2,lsbu_registrasi_history.status_3");
		$this->db->from('lsbu_registrasi_history');
		$this->db->join('lsbu_registrasi','lsbu_registrasi.NIB=lsbu_registrasi_history.NIB AND lsbu_registrasi.tgl_permohonan=lsbu_registrasi_history.tgl_permohonan','left');
		$this->db->join('lsbu_asesor_penilaian','lsbu_registrasi.NIB=lsbu_asesor_penilaian.NIB AND lsbu_registrasi.tgl_permohonan=lsbu_asesor_penilaian.tgl_permohonan','left');

		$this->db->join('lsbu_bu','lsbu_bu.NIB=lsbu_registrasi_history.NIB','left');
		$this->db->join('lsbu_biaya',"lsbu_biaya.kualifikasi=lsbu_registrasi.kualifikasi AND lsbu_biaya.tipe=lsbu_bu.klasifikasi_jenis_usaha",'left');

		$this->db->where('lsbu_registrasi_history.status_3','0000-00-00');
		$this->db->where("lsbu_registrasi_history.status_2!='0000-00-00'");
		$this->db->where("lsbu_asesor_penilaian.pemutus","1");

		$this->db->group_by(array("lsbu_registrasi_history.NIB", "lsbu_registrasi_history.tgl_permohonan"));

		$query = $this->db->get();
		return $query->result_array();
	}
	function delete_permohonan_registrasi($nib,$tgl_permohonan){
		$this->db->where('NIB',$nib);
		$this->db->where('tgl_permohonan',$tgl_permohonan);
		$this->db->delete('lsbu_registrasi');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}

	}
	function delete_user($username){
		$this->db->where('Username',$username);
		$this->db->delete('user');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}

	}
	function delete_pengalaman($nib,$id_izin){
		$this->db->where('NIB',$nib);
		$this->db->where('id_izin',$id_izin);
		$this->db->delete('lsbu_pengalaman');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}

	}
	function delete_pengalaman2($id_izin){
		$this->db->where('id_izin',$id_izin);
		$this->db->delete('lsbu_pengalaman');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}

	}
	function delete_peralatan($nib,$id_izin){
		$this->db->where('NIB',$nib);
		$this->db->where('id_izin',$id_izin);
		$this->db->delete('lsbu_peralatan');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}

	}
	function delete_peralatan2($id_izin){
		$this->db->where('id_izin',$id_izin);
		$this->db->delete('lsbu_peralatan');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}

	}
	function delete_ceklis($nib,$tgl_permohonan){
		$this->db->where('NIB',$nib);
		$this->db->where('tgl_permohonan',$tgl_permohonan);
		$this->db->delete('lsbu_ceklis');
		if ($this->db->trans_status() === FALSE) {
			return "Failed";
		} else {
			return "Success";
		}

	}
	public function list_permohonan_masuk(){
		$this->db->select("lsbu_permohonan_masuk.id_izin,lsbu_permohonan_masuk.tgl_create_izin,lsbu_permohonan_masuk.NIB,lsbu_biaya_sertifikasi.biaya as biaya_lsbu,lsbu_registrasi_history.status_0,GROUP_CONCAT(distinct lsbu_registrasi.id_sub_klasifikasi, ' ') as concat_sub,GROUP_CONCAT(distinct lsbu_registrasi.id_klasifikasi, ' ') as concat_klasifikasi,GROUP_CONCAT(distinct lsbu_registrasi.kualifikasi, ' ') as concat_kualifikasi,lsbu_bu.nama,lsbu_registrasi_history.tgl_permohonan as tgl_permohonan_banding,lsbu_registrasi.tgl_permohonan,lsbu_registrasi_history.propinsi,lsbu_registrasi_history.tahun,lsbu_registrasi_history.status_0,lsbu_registrasi_history.status_1,lsbu_registrasi_history.status_2,lsbu_registrasi_history.status_3");
		$this->db->from('lsbu_permohonan_masuk');
		$this->db->join('lsbu_registrasi_history','lsbu_registrasi_history.NIB=lsbu_permohonan_masuk.nib','left');

		$this->db->join('lsbu_registrasi','lsbu_registrasi.NIB=lsbu_registrasi_history.NIB AND lsbu_registrasi.id_sub_klasifikasi=lsbu_permohonan_masuk.id_sub_klasifikasi','left');
		$this->db->join('lsbu_bu','lsbu_bu.NIB=lsbu_registrasi_history.NIB','left');
		$this->db->join('lsbu_biaya_sertifikasi',"lsbu_biaya_sertifikasi.tipe=lsbu_bu.klasifikasi_jenis_usaha",'left');

		$this->db->where("lsbu_permohonan_masuk.tgl_update_izin>='2022-06-01 00:00:19'");
		$this->db->where("(lsbu_permohonan_masuk.status='0' OR lsbu_permohonan_masuk.status='20')");

		$this->db->group_by(array("lsbu_permohonan_masuk.id_izin"));
		$this->db->order_by("lsbu_permohonan_masuk.tgl_create_izin", "asc");
		$this->db->order_by("lsbu_permohonan_masuk.nib", "desc");


		$query = $this->db->get();
		return $query->result_array();
	}
	public function list_validasi(){
		$this->db->select("lsbu_registrasi_history.file_pembayaran,SUM(lsbu_biaya.biaya) as biaya_lsbu,lsbu_registrasi_history.status_1,lsbu_registrasi_history.status_0,GROUP_CONCAT(distinct lsbu_registrasi.id_sub_klasifikasi, ' ') as concat_sub,GROUP_CONCAT(distinct lsbu_registrasi.id_klasifikasi, ' ') as concat_klasifikasi,GROUP_CONCAT(distinct lsbu_registrasi.kualifikasi, ' ') as concat_kualifikasi,lsbu_bu.nama,lsbu_registrasi_history.NIB,lsbu_registrasi_history.tgl_permohonan,lsbu_registrasi_history.propinsi,lsbu_registrasi_history.tahun,lsbu_registrasi_history.status_0,lsbu_registrasi_history.status_1,lsbu_registrasi_history.status_2,lsbu_registrasi_history.status_3");
		$this->db->from('lsbu_registrasi_history');
		$this->db->join('lsbu_registrasi','lsbu_registrasi.NIB=lsbu_registrasi_history.NIB AND lsbu_registrasi.tgl_permohonan=lsbu_registrasi_history.tgl_permohonan','left');
		$this->db->join('lsbu_biaya',"lsbu_biaya.kualifikasi=lsbu_registrasi.kualifikasi AND lsbu_biaya.tipe='0'",'left');

		$this->db->join('lsbu_bu','lsbu_bu.NIB=lsbu_registrasi_history.NIB','left');

		$this->db->where('lsbu_registrasi_history.status_2','0000-00-00');
		$this->db->where("lsbu_registrasi_history.status_1!='0000-00-00'");
		$this->db->group_by(array("lsbu_registrasi_history.NIB", "lsbu_registrasi_history.tgl_permohonan"));
		$query = $this->db->get();
		return $query->result_array();
	}
	public function list_berita_acara(){
		$this->db->select("lsbu_registrasi_history.tgl_biaya,lsbu_registrasi_history.file_pembayaran,lsbu_registrasi_history.file_perjanjian,SUM(lsbu_biaya.biaya) as biaya_lsbu,lsbu_registrasi_history.status_2,lsbu_registrasi_history.status_1,lsbu_registrasi_history.status_0,GROUP_CONCAT(distinct lsbu_registrasi.id_sub_klasifikasi, ' ') as concat_sub,GROUP_CONCAT(distinct lsbu_registrasi.id_klasifikasi, ' ') as concat_klasifikasi,GROUP_CONCAT(distinct lsbu_registrasi.kualifikasi, ' ') as concat_kualifikasi,lsbu_bu.nama,lsbu_registrasi_history.NIB,lsbu_registrasi_history.tgl_permohonan,lsbu_registrasi_history.propinsi,lsbu_registrasi_history.tahun,lsbu_registrasi_history.status_0,lsbu_registrasi_history.status_1,lsbu_registrasi_history.status_2,lsbu_registrasi_history.status_3");
		$this->db->from('lsbu_registrasi_history');
		$this->db->join('lsbu_registrasi','lsbu_registrasi.NIB=lsbu_registrasi_history.NIB AND lsbu_registrasi.tgl_permohonan=lsbu_registrasi_history.tgl_permohonan','left');

		$this->db->join('lsbu_bu','lsbu_bu.NIB=lsbu_registrasi_history.NIB','left');
		$this->db->join('lsbu_biaya',"lsbu_biaya.kualifikasi=lsbu_registrasi.kualifikasi AND lsbu_biaya.tipe=lsbu_bu.klasifikasi_jenis_usaha",'left');

		$this->db->join('lsbu_asesor_penilaian','lsbu_registrasi_history.NIB=lsbu_asesor_penilaian.NIB AND lsbu_registrasi_history.tgl_permohonan=lsbu_asesor_penilaian.tgl_permohonan','left');
		$this->db->where('lsbu_asesor_penilaian.tgl_penilaian is NOT NULL');
		$this->db->where('lsbu_registrasi_history.status_2','0000-00-00');
		$this->db->where("lsbu_registrasi_history.status_1 !='0000-00-00'");
		$this->db->group_by(array("lsbu_registrasi_history.NIB", "lsbu_registrasi_history.tgl_permohonan"));
		$query = $this->db->get();
		return $query->result_array();
	}
	public function list_penunjukan_asesor(){
		$this->db->select("lsbu_registrasi_history.tgl_biaya,lsbu_registrasi_history.file_pembayaran,lsbu_registrasi_history.file_perjanjian,SUM(lsbu_biaya.biaya) as biaya_lsbu,lsbu_registrasi_history.status_2,lsbu_registrasi_history.status_1,lsbu_registrasi_history.status_0,GROUP_CONCAT(distinct lsbu_registrasi.id_sub_klasifikasi, ' ') as concat_sub,GROUP_CONCAT(distinct lsbu_registrasi.id_klasifikasi, ' ') as concat_klasifikasi,GROUP_CONCAT(distinct lsbu_registrasi.kualifikasi, ' ') as concat_kualifikasi,lsbu_bu.nama,lsbu_registrasi_history.NIB,lsbu_registrasi_history.tgl_permohonan,lsbu_registrasi_history.propinsi,lsbu_registrasi_history.tahun,lsbu_registrasi_history.status_0,lsbu_registrasi_history.status_1,lsbu_registrasi_history.status_2,lsbu_registrasi_history.status_3");
		$this->db->from('lsbu_registrasi_history');

		$this->db->join('lsbu_registrasi','lsbu_registrasi.NIB=lsbu_registrasi_history.NIB AND lsbu_registrasi.tgl_permohonan=lsbu_registrasi_history.tgl_permohonan','left');

		$this->db->join('lsbu_bu','lsbu_bu.NIB=lsbu_registrasi_history.NIB','left');
		$this->db->join('lsbu_biaya',"lsbu_biaya.kualifikasi=lsbu_registrasi.kualifikasi AND lsbu_biaya.tipe=lsbu_bu.klasifikasi_jenis_usaha",'left');

		$this->db->join('lsbu_asesor_penilaian','lsbu_registrasi_history.NIB=lsbu_asesor_penilaian.NIB AND lsbu_registrasi_history.tgl_permohonan=lsbu_asesor_penilaian.tgl_permohonan','left');

		$this->db->where('lsbu_registrasi_history.status_2','0000-00-00');
		$this->db->where("lsbu_registrasi_history.verifikasi_pembayaran","1");
		$this->db->where('lsbu_asesor_penilaian.tgl_penilaian is NULL');
		$this->db->group_by(array("lsbu_registrasi_history.NIB", "lsbu_registrasi_history.tgl_permohonan"));
		$query = $this->db->get();
		return $query->result_array();
	}
	public function cek_status_0($nib,$tgl){
		$this->db->select('*');
		$this->db->from('lsbu_registrasi_history');
		$this->db->where('NIB',$nib);
		$this->db->where('tgl_permohonan',$tgl);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function cek_status_1($nib,$tgl){
		$this->db->select('*');
		$this->db->from('lsbu_registrasi_history');
		$this->db->where('NIB',$nib);
		$this->db->where('tgl_permohonan',$tgl);
		$this->db->where('status_1','0000-00-00');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function cek_status_2($nib,$tgl){
		$this->db->select('*');
		$this->db->from('lsbu_registrasi_history');
		$this->db->where('NIB',$nib);
		$this->db->where('tgl_permohonan',$tgl);
		$this->db->where('status_2','0000-00-00');
		$query = $this->db->get();
		return $query->result_array();
	}
	function search_permohonan_bu($limit, $start){

		$this->db->limit($limit, $start);
		$this->db->select('*');
		$this->db->from('lsbu_registrasi_history');
		$query = $this->db->get();
		return $query->result_array();
	}
	function vv_user(){

		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('level','0');
		$this->db->where('status_aktif','0');
		$query = $this->db->get();
		return $query->result_array();
	}
	function get_profile($id_user){

		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('Username',$id_user);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function biodata_opr($nib){
		$this->db->select('lsbu_bu.sptjm,lsbu_bu.nama_pimpinan,lsbu_bentuk.Nama as bentuk_usaha,lsbu_klasifikasi_jenis_usaha.Nama as jenis_usaha,kabupaten.Nama as id_kabupaten,propinsi.Nama as id_propinsi,lsbu_bu.NIB,lsbu_bu.nama,lsbu_bu.klasifikasi_jenis_usaha,lsbu_bu.jabatan_pimpinan,lsbu_bu.map,lsbu_bu.minisite_name,lsbu_bu.tgl_didirikan,lsbu_bu.rekening,lsbu_bu.alamat_bu,lsbu_bu.kodepos,lsbu_bu.telepon,lsbu_bu.hp,lsbu_bu.fax,lsbu_bu.email,lsbu_bu.email_pic,lsbu_bu.web,lsbu_bu.npwp,lsbu_bu.negara_id,lsbu_bu.file_nib,lsbu_bu.file_npwp');
		$this->db->from('lsbu_bu');
		$this->db->join('propinsi','propinsi.ID_Propinsi=lsbu_bu.id_propinsi','left');
		$this->db->join('kabupaten','kabupaten.ID_Kabupaten=lsbu_bu.id_kabupaten','left');
		$this->db->join('lsbu_bentuk','lsbu_bentuk.id_bentuk=lsbu_bu.bentuk_usaha','left');
		$this->db->join('lsbu_klasifikasi_jenis_usaha','lsbu_klasifikasi_jenis_usaha.id_klasifikasi_jenis_usaha=lsbu_bu.klasifikasi_jenis_usaha','left');

		$this->db->where('lsbu_bu.NIB',$nib);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function pengurus_opr($nib){
		$this->db->select('*');
		$this->db->from('lsbu_pengurus');

		$this->db->where('lsbu_pengurus.NIB',$nib);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function pengurus_pjbu($nib){
		$this->db->select('lsbu_pengurus.id_pengurus,lsbu_pengurus.npwp,lsbu_pengurus_jabatan.Nama_Jabatan as id_jabatan,propinsi.Nama as id_propinsi,kabupaten.Nama as id_kabupaten,lsbu_pengurus.nama,lsbu_pengurus.tempat_lahir,lsbu_pengurus.no_ktp,lsbu_pengurus.tgl_lahir,lsbu_pengurus.pjbu,lsbu_pengurus.alamat,lsbu_pengurus.jabatan_bu,lsbu_pengurus.kodepos,lsbu_pengurus.no_ijazah,lsbu_pengurus.persyaratan_16,lsbu_pengurus.persyaratan_17,lsbu_pengurus.persyaratan_14,lsbu_pengurus.persyaratan_18,lsbu_pengurus.persyaratan_15');
		$this->db->from('lsbu_pengurus');
		$this->db->join('lsbu_pengurus_jabatan','lsbu_pengurus_jabatan.id_jabatan=lsbu_pengurus.id_jabatan','left');

		$this->db->join('propinsi','propinsi.ID_Propinsi=lsbu_pengurus.id_propinsi','left');
		$this->db->join('kabupaten','kabupaten.ID_Kabupaten=lsbu_pengurus.id_kabupaten','left');

		$this->db->where('lsbu_pengurus.NIB',$nib);
		$this->db->where('lsbu_pengurus.pjbu','1');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function pengalaman_opr($nib){
		$this->db->select('*');
		$this->db->from('lsbu_pengalaman');
		$this->db->where('lsbu_pengalaman.NIB',$nib);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function akte_opr($nib){
		$this->db->select('lsbu_akte.file_ktp,lsbu_akte.file_npwp,lsbu_akte.no_sk_kumham,propinsi.Nama as id_provinsi_notaris,kabupaten.Nama as id_kabupaten_notaris,lsbu_akte.NIB,lsbu_akte.no,lsbu_akte.jenis,lsbu_akte.nama_notaris,lsbu_akte.alamat_notaris,lsbu_akte.hargasatuan,lsbu_akte.modaldasar,lsbu_akte.modalsetor,lsbu_akte.nilaisaham,lsbu_akte.tgl_akte,lsbu_akte.maksudtujuan,lsbu_akte.file_doc');
		$this->db->from('lsbu_akte');
		$this->db->join('propinsi','propinsi.ID_Propinsi=lsbu_akte.id_provinsi_notaris','left');
		$this->db->join('kabupaten','kabupaten.ID_Kabupaten=lsbu_akte.id_kabupaten_notaris','left');
		$this->db->where('lsbu_akte.NIB',$nib);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function sk_kehakiman_opr($nib){
		$this->db->select('*');
		$this->db->from('lsbu_sk_kehakiman');
		$this->db->where('NIB',$nib);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function smm_opr($nib){
		$this->db->select('*');
		$this->db->from('lsbu_smm');
		$this->db->where('NIB',$nib);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function smap_opr($nib){
		$this->db->select('*');
		$this->db->from('lsbu_smap');
		$this->db->where('NIB',$nib);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function akte_pendirian_opr($nib){
		$this->db->select('lsbu_akte_pendirian.persyaratan_55,lsbu_pengurus_jabatan.Nama_Jabatan as id_jabatan,propinsi.Nama as propinsi_akte,kabupaten.Nama as kabupaten_akte,lsbu_akte_pendirian.nomer_akte,lsbu_akte_pendirian.nama_notaris,lsbu_akte_pendirian.alamat,lsbu_akte_pendirian.tgl_akte,lsbu_akte_pendirian.nama_pengurus,lsbu_akte_pendirian.no_pm,lsbu_akte_pendirian.tgl_pm,lsbu_akte_pendirian.no_pn,lsbu_akte_pendirian.tgl_pn,lsbu_akte_pendirian.no_ln,lsbu_akte_pendirian.tgl_ln,lsbu_akte_pendirian.persyaratan');
		$this->db->from('lsbu_akte_pendirian');
		$this->db->join('propinsi','propinsi.ID_Propinsi=lsbu_akte_pendirian.propinsi_akte','left');
		$this->db->join('kabupaten','kabupaten.ID_Kabupaten=lsbu_akte_pendirian.kabupaten_akte','left');
		$this->db->join('lsbu_pengurus_jabatan','lsbu_pengurus_jabatan.id_jabatan=lsbu_akte_pendirian.id_jabatan','left');

		$this->db->where('lsbu_akte_pendirian.NIB',$nib);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function akte_perubahan_opr($nib){
		$this->db->select('lsbu_akte_perubahan.persyaratan_56,lsbu_akte_perubahan.perubahan,lsbu_akte_perubahan.modal_dasar,lsbu_pengurus_jabatan.Nama_Jabatan as id_jabatan,propinsi.Nama as propinsi_akte,kabupaten.Nama as kabupaten_akte,lsbu_akte_perubahan.nomer_akte,lsbu_akte_perubahan.nama_notaris,lsbu_akte_perubahan.alamat,lsbu_akte_perubahan.tgl_akte,lsbu_akte_perubahan.nama_pengurus,lsbu_akte_perubahan.no_pm,lsbu_akte_perubahan.tgl_pm,lsbu_akte_perubahan.no_pn,lsbu_akte_perubahan.tgl_pn,lsbu_akte_perubahan.no_ln,lsbu_akte_perubahan.tgl_ln,lsbu_akte_perubahan.persyaratan');
		$this->db->from('lsbu_akte_perubahan');
		$this->db->join('propinsi','propinsi.ID_Propinsi=lsbu_akte_perubahan.propinsi_akte','left');
		$this->db->join('kabupaten','kabupaten.ID_Kabupaten=lsbu_akte_perubahan.kabupaten_akte','left');
		$this->db->join('lsbu_pengurus_jabatan','lsbu_pengurus_jabatan.id_jabatan=lsbu_akte_perubahan.id_jabatan','left');

		$this->db->where('lsbu_akte_perubahan.NIB',$nib);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function pph_omset_opr($nib){
		$this->db->select('*');
		$this->db->from('lsbu_keuangan_pendapatan');
		$this->db->where('NIB',$nib);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function neraca_opr($nib){
		$this->db->select('*');
		$this->db->from('lsbu_keuangan_neraca');
		$this->db->where('NIB',$nib);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function pemegang_saham_opr($nib){
		$this->db->select('*');
		$this->db->from('lsbu_keuangan_saham');

		$this->db->where('NIB',$nib);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function tenaga_kerja_opr($nib){
		$this->db->select('*');
		$this->db->from('lsbu_tenaga_kerja');
		$this->db->where('NIB',$nib);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function pjbu_opr($nib){
		$this->db->select('*');
		$this->db->from('lsbu_pjbu');
		$this->db->where('NIB',$nib);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function pjskbu_opr($nib){
		$this->db->select('*');
		$this->db->from('lsbu_pjskbu');
		$this->db->where('NIB',$nib);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function pjtbu_opr($nib){
		$this->db->select('*');
		$this->db->from('lsbu_pjtbu');
		$this->db->where('NIB',$nib);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function tenaga_kerja_opr_asesor($nib){
		$this->db->select('lsbu_klasifikasi_sub_kbli.deskripsi_subklasifikasi,sub_bidang_keahlian_kbli.Deskripsi as deskripsi_bidang,lsbu_tenaga_kerja.id_personal,lsbu_tenaga_kerja.nama,lsbu_tenaga_kerja.alamat,lsbu_tenaga_kerja.id_sub_bidang,lsbu_tenaga_kerja.id_kualifikasi,lsbu_tenaga_kerja.pjt,lsbu_tenaga_kerja.pjsk,lsbu_tenaga_kerja.tenaga_kerja,lsbu_tenaga_kerja.noreg,lsbu_tenaga_kerja.id_sub_klasifikasi_pjsk1,lsbu_tenaga_kerja.pjbu,lsbu_tenaga_kerja.npwp');
		$this->db->from('lsbu_tenaga_kerja');
		$this->db->join('sub_bidang_keahlian_kbli','sub_bidang_keahlian_kbli.ID_Sub_BIdang_Keahlian=lsbu_tenaga_kerja.id_sub_bidang','left');
		$this->db->join('lsbu_klasifikasi_sub_kbli','lsbu_klasifikasi_sub_kbli.id_sub_klasifikasi=lsbu_tenaga_kerja.id_sub_klasifikasi_pjsk1','left');

		$this->db->where('lsbu_tenaga_kerja.NIB',$nib);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function peralatan_opr($nib){
		$this->db->select('*');
		$this->db->from('lsbu_peralatan');

		$this->db->where('NIB',$nib);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function klasifikasi_kualifikasi_opr2($nib){
		$this->db->select('lsbu_klasifikasi_sub_kbli.deskripsi_subklasifikasi,propinsi.Nama as propinsi,lsbu_registrasi.id_klasifikasi,lsbu_registrasi.id_sub_klasifikasi,lsbu_registrasi.kualifikasi,lsbu_registrasi.tgl_permohonan,lsbu_registrasi.id_permohonan,lsbu_registrasi.persyaratan_1,lsbu_registrasi.persyaratan_2,lsbu_registrasi.persyaratan_3,lsbu_registrasi.persyaratan_4,lsbu_registrasi.persyaratan_5,lsbu_registrasi.persyaratan_12,lsbu_registrasi.persyaratan_10');
		$this->db->from('lsbu_registrasi');
		$this->db->join('propinsi','propinsi.ID_Propinsi=lsbu_registrasi.propinsi','left');
		$this->db->join('lsbu_klasifikasi_sub_kbli','lsbu_klasifikasi_sub_kbli.id_sub_klasifikasi=lsbu_registrasi.id_sub_klasifikasi','left');


		$this->db->where('lsbu_registrasi.NIB',$nib);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function klasifikasi_kualifikasi_izin($id_izin){
		$this->db->select('*');
		$this->db->from('lsbu_registrasi_izin');


		$this->db->where('lsbu_registrasi_izin.id_izin',$id_izin);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function klasifikasi_kualifikasi_opr_biaya_bujkn($nib,$tgl){
		$this->db->select('lsbu_klasifikasi_sub_kbli.nomor_kbli,lsbu_klasifikasi_sub_kbli.deskripsi_subklasifikasi,lsbu_registrasi_history.file_pembayaran,lsbu_registrasi_history.file_perjanjian,lsbu_biaya.biaya,lsbu_registrasi.id_klasifikasi,lsbu_registrasi.id_sub_klasifikasi,lsbu_registrasi.kualifikasi,lsbu_registrasi.tgl_permohonan,lsbu_registrasi.id_permohonan');
		$this->db->from('lsbu_registrasi');
		$this->db->join('lsbu_registrasi_history','lsbu_registrasi_history.NIB=lsbu_registrasi.NIB AND lsbu_registrasi_history.tgl_permohonan=lsbu_registrasi.tgl_permohonan','left');
		$this->db->join('lsbu_klasifikasi_sub_kbli','lsbu_registrasi.id_sub_klasifikasi=lsbu_klasifikasi_sub_kbli.id_sub_klasifikasi','left');

		$this->db->join('lsbu_biaya',"lsbu_biaya.kualifikasi=lsbu_registrasi.kualifikasi AND lsbu_biaya.tipe='0'",'left');

		$this->db->where('lsbu_registrasi.tgl_permohonan',$tgl);
		$this->db->where('lsbu_registrasi.NIB',$nib);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function klasifikasi_kualifikasi_biaya_sertifikasi($nib,$tgl){
		$this->db->select('lsbu_registrasi_history.status_1,lsbu_registrasi_history.no_urut,lsbu_klasifikasi_sub_kbli.nomor_kbli,lsbu_klasifikasi_sub_kbli.deskripsi_subklasifikasi,lsbu_registrasi_history.file_pembayaran,lsbu_registrasi_history.file_perjanjian,lsbu_biaya.biaya,lsbu_registrasi.id_klasifikasi,lsbu_registrasi.id_sub_klasifikasi,lsbu_registrasi.kualifikasi,lsbu_registrasi.tgl_permohonan,lsbu_registrasi.id_permohonan,lsbu_registrasi_history.file_invoice');
		$this->db->from('lsbu_registrasi');
		$this->db->join('lsbu_registrasi_history','lsbu_registrasi_history.NIB=lsbu_registrasi.NIB AND lsbu_registrasi_history.tgl_permohonan=lsbu_registrasi.tgl_permohonan','left');
		$this->db->join('lsbu_klasifikasi_sub_kbli','lsbu_registrasi.id_sub_klasifikasi=lsbu_klasifikasi_sub_kbli.id_sub_klasifikasi','left');
		$this->db->join('lsbu_bu','lsbu_bu.NIB=lsbu_registrasi.NIB','left');

		$this->db->join('lsbu_biaya',"lsbu_biaya.kualifikasi=lsbu_registrasi.kualifikasi AND lsbu_biaya.tipe=lsbu_bu.klasifikasi_jenis_usaha",'left');

		$this->db->where('lsbu_registrasi.tgl_permohonan',$tgl);
		$this->db->where('lsbu_registrasi.NIB',$nib);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function klasifikasi_kualifikasi_biaya_sertifikasi_2($nib,$tgl){
		$this->db->select('lsbu_registrasi_history.no_urut,lsbu_klasifikasi_sub_kbli.nomor_kbli,lsbu_klasifikasi_sub_kbli.deskripsi_subklasifikasi,lsbu_registrasi_history.file_pembayaran,lsbu_registrasi_history.file_perjanjian,lsbu_biaya.biaya,lsbu_registrasi.id_klasifikasi,lsbu_registrasi.id_sub_klasifikasi,lsbu_registrasi.kualifikasi,lsbu_registrasi.tgl_permohonan,lsbu_registrasi.id_permohonan,lsbu_registrasi_history.file_invoice');
		$this->db->from('lsbu_registrasi');
		$this->db->join('lsbu_registrasi_history','lsbu_registrasi_history.NIB=lsbu_registrasi.NIB AND lsbu_registrasi_history.tgl_permohonan=lsbu_registrasi.tgl_permohonan','left');
		$this->db->join('lsbu_klasifikasi_sub_kbli','lsbu_registrasi.id_sub_klasifikasi=lsbu_klasifikasi_sub_kbli.id_sub_klasifikasi','left');
		$this->db->join('lsbu_bu','lsbu_bu.NIB=lsbu_registrasi.NIB','left');

		$this->db->join('lsbu_biaya',"lsbu_biaya.kualifikasi=lsbu_registrasi.kualifikasi AND lsbu_biaya.tipe=lsbu_bu.klasifikasi_jenis_usaha",'left');

		$this->db->where('lsbu_registrasi.tgl_permohonan',$tgl);
		$this->db->where('lsbu_registrasi.NIB',$nib);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function klasifikasi_kualifikasi_biaya_sertifikasi_2_old($nib,$tgl){
		$this->db->select('lsbu_registrasi_history.no_urut,lsbu_klasifikasi_sub_kbli.nomor_kbli,lsbu_klasifikasi_sub_kbli.deskripsi_subklasifikasi,lsbu_registrasi_history.file_pembayaran,lsbu_registrasi_history.file_perjanjian,lsbu_biaya_old.biaya,lsbu_registrasi.id_klasifikasi,lsbu_registrasi.id_sub_klasifikasi,lsbu_registrasi.kualifikasi,lsbu_registrasi.tgl_permohonan,lsbu_registrasi.id_permohonan,lsbu_registrasi_history.file_invoice');
		$this->db->from('lsbu_registrasi');
		$this->db->join('lsbu_registrasi_history','lsbu_registrasi_history.NIB=lsbu_registrasi.NIB AND lsbu_registrasi_history.tgl_permohonan=lsbu_registrasi.tgl_permohonan','left');
		$this->db->join('lsbu_klasifikasi_sub_kbli','lsbu_registrasi.id_sub_klasifikasi=lsbu_klasifikasi_sub_kbli.id_sub_klasifikasi','left');
		$this->db->join('lsbu_bu','lsbu_bu.NIB=lsbu_registrasi.NIB','left');

		$this->db->join('lsbu_biaya_old',"lsbu_biaya_old.kualifikasi=lsbu_registrasi.kualifikasi AND lsbu_biaya_old.tipe=lsbu_bu.klasifikasi_jenis_usaha",'left');

		$this->db->where('lsbu_registrasi.tgl_permohonan',$tgl);
		$this->db->where('lsbu_registrasi.NIB',$nib);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function klasifikasi_kualifikasi_opr_biaya_bujka($nib,$tgl){
		$this->db->select('lsbu_klasifikasi_sub_kbli.nomor_kbli,lsbu_klasifikasi_sub_kbli.deskripsi_subklasifikasi,lsbu_registrasi_history.file_pembayaran,lsbu_registrasi_history.file_perjanjian,lsbu_biaya.biaya,lsbu_registrasi.id_klasifikasi,lsbu_registrasi.id_sub_klasifikasi,lsbu_registrasi.kualifikasi,lsbu_registrasi.tgl_permohonan,lsbu_registrasi.id_permohonan');
		$this->db->from('lsbu_registrasi');
		$this->db->join('lsbu_registrasi_history','lsbu_registrasi_history.NIB=lsbu_registrasi.NIB AND lsbu_registrasi_history.tgl_permohonan=lsbu_registrasi.tgl_permohonan','left');
		$this->db->join('lsbu_klasifikasi_sub_kbli','lsbu_registrasi.id_sub_klasifikasi=lsbu_klasifikasi_sub_kbli.id_sub_klasifikasi','left');

		$this->db->join('lsbu_biaya',"lsbu_biaya.kualifikasi=lsbu_registrasi.kualifikasi AND lsbu_biaya.tipe='1'",'left');

		$this->db->where('lsbu_registrasi.tgl_permohonan',$tgl);
		$this->db->where('lsbu_registrasi.NIB',$nib);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function klasifikasi_kualifikasi_opr($nib,$tgl){
		$this->db->select('lsbu_registrasi.jenis_usaha,lsbu_sifat_usaha.Nama as nama_sifat,bu_asosiasi_detail.Nama as nama_asosiasi,lsbu_klasifikasi_sub_kbli.deskripsi_subklasifikasi,lsbu_registrasi.asosiasi,lsbu_registrasi.sifat_badanusaha,lsbu_registrasi.NIB,lsbu_registrasi.id_klasifikasi,lsbu_registrasi.id_sub_klasifikasi,lsbu_registrasi.kualifikasi,lsbu_registrasi.user_pemohon,lsbu_registrasi.id_permohonan,lsbu_registrasi.tgl_permohonan,lsbu_registrasi.nomor_kbli,lsbu_registrasi.id_izin,lsbu_registrasi.user_email,lsbu_registrasi.user_hp');
		$this->db->from('lsbu_registrasi');
		$this->db->join('lsbu_klasifikasi_sub_kbli','lsbu_klasifikasi_sub_kbli.id_sub_klasifikasi=lsbu_registrasi.id_sub_klasifikasi','left');
		$this->db->join('bu_asosiasi_detail','bu_asosiasi_detail.ID_Asosiasi_BU=lsbu_registrasi.asosiasi','left');
		$this->db->join('lsbu_sifat_usaha','lsbu_sifat_usaha.id_sifat_usaha=lsbu_registrasi.sifat_badanusaha','left');

		$this->db->where('lsbu_registrasi.NIB',$nib);
		$this->db->where('lsbu_registrasi.tgl_permohonan',$tgl);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_email($id_izin){
		$this->db->select('*');
		$this->db->from('lsbu_registrasi');
		$this->db->where('id_izin',$id_izin);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_qr($nib,$tgl){
		$this->db->select(',lsbu_asesor_penilaian.aset,lsbu_asesor_penilaian.peralatan,lsbu_asesor_penilaian.tk,lsbu_asesor_penilaian.tk,lsbu_asesor_penilaian.penjualan_tahunan,lsbu_asesor_penilaian.smm,lsbu_asesor_penilaian.smap,lsbu_asesor_penilaian.pemenuhan_peralatan,lsbu_asesor_penilaian.pemenuhan_smm,lsbu_asesor_penilaian.pemenuhan_smap,lsbu_asesor_penilaian.pemenuhan_penjualan_tahunan,lsbu_klasifikasi_jenis_usaha.Nama as nama_klasifikasi_jenis_usaha,lsbu_jenis_usaha.Nama as nama_jenis_usaha,lsbu_registrasi.qr,lsbu_bu.nama as nama_bu,lsbu_bu.alamat_bu,lsbu_registrasi.jenis_usaha,lsbu_sifat_usaha.Nama as nama_sifat,bu_asosiasi_detail.Nama as nama_asosiasi,lsbu_klasifikasi_sub_kbli.deskripsi_subklasifikasi,lsbu_registrasi.asosiasi,lsbu_registrasi.sifat_badanusaha,lsbu_registrasi.NIB,lsbu_registrasi.id_klasifikasi,lsbu_registrasi.id_sub_klasifikasi,lsbu_registrasi.kualifikasi,lsbu_registrasi.user_pemohon,lsbu_registrasi.id_permohonan,lsbu_registrasi.tgl_permohonan,lsbu_registrasi.nomor_kbli,lsbu_registrasi.id_izin,lsbu_registrasi.user_email,lsbu_registrasi.user_hp');
		$this->db->from('lsbu_registrasi');
		$this->db->join('lsbu_asesor_penilaian','lsbu_asesor_penilaian.NIB=lsbu_registrasi.NIB AND lsbu_asesor_penilaian.tgl_permohonan=lsbu_registrasi.tgl_permohonan AND lsbu_asesor_penilaian.id_sub_klasifikasi=lsbu_registrasi.id_sub_klasifikasi','left');

		$this->db->join('lsbu_klasifikasi_sub_kbli','lsbu_klasifikasi_sub_kbli.id_sub_klasifikasi=lsbu_registrasi.id_sub_klasifikasi','left');
		$this->db->join('bu_asosiasi_detail','bu_asosiasi_detail.ID_Asosiasi_BU=lsbu_registrasi.asosiasi','left');
		$this->db->join('lsbu_sifat_usaha','lsbu_sifat_usaha.id_sifat_usaha=lsbu_registrasi.sifat_badanusaha','left');
		$this->db->join('lsbu_jenis_usaha','lsbu_jenis_usaha.id_jenis_usaha=lsbu_registrasi.jenis_usaha','left');
		$this->db->join('lsbu_bu','lsbu_bu.NIB=lsbu_registrasi.NIB','left');
		$this->db->join('lsbu_klasifikasi_jenis_usaha','lsbu_klasifikasi_jenis_usaha.id_klasifikasi_jenis_usaha=lsbu_bu.klasifikasi_jenis_usaha','left');
		$this->db->where('lsbu_registrasi.NIB',$nib);
		$this->db->where('lsbu_registrasi.tgl_permohonan',$tgl);
		$this->db->group_by(array('lsbu_registrasi.NIB','lsbu_registrasi.tgl_permohonan','lsbu_registrasi.id_sub_klasifikasi'));
		$query = $this->db->get();
		return $query->result_array();
	}
	public function klasifikasi_kualifikasi_opr_menengah_besar($nib,$tgl){
		$this->db->select('lsbu_registrasi.jenis_usaha,lsbu_sifat_usaha.Nama as nama_sifat,bu_asosiasi_detail.Nama as nama_asosiasi,lsbu_klasifikasi_sub_kbli.deskripsi_subklasifikasi,lsbu_registrasi.asosiasi,lsbu_registrasi.sifat_badanusaha,lsbu_registrasi.NIB,lsbu_registrasi.id_klasifikasi,lsbu_registrasi.id_sub_klasifikasi,lsbu_registrasi.kualifikasi,lsbu_registrasi.user_pemohon,lsbu_registrasi.id_permohonan,lsbu_registrasi.tgl_permohonan,lsbu_registrasi.nomor_kbli,lsbu_registrasi.id_izin,lsbu_registrasi.user_email,lsbu_registrasi.user_hp');
		$this->db->from('lsbu_registrasi');
		$this->db->join('lsbu_klasifikasi_sub_kbli','lsbu_klasifikasi_sub_kbli.id_sub_klasifikasi=lsbu_registrasi.id_sub_klasifikasi','left');
		$this->db->join('bu_asosiasi_detail','bu_asosiasi_detail.ID_Asosiasi_BU=lsbu_registrasi.asosiasi','left');
		$this->db->join('lsbu_sifat_usaha','lsbu_sifat_usaha.id_sifat_usaha=lsbu_registrasi.sifat_badanusaha','left');

		$this->db->where('lsbu_registrasi.NIB',$nib);
		$this->db->where('lsbu_registrasi.tgl_permohonan',$tgl);
		$this->db->where("(lsbu_registrasi.kualifikasi='B' OR lsbu_registrasi.kualifikasi='M')");
		$query = $this->db->get();
		return $query->result_array();
	}


	public function tanggal_permohonan($nib){
		$this->db->select("lsbu_registrasi.NIB,GROUP_CONCAT(distinct lsbu_registrasi.id_sub_klasifikasi, ' ') as concat_sub,GROUP_CONCAT(distinct lsbu_registrasi.id_klasifikasi, ' ') as concat_klasifikasi,lsbu_registrasi.kualifikasi,lsbu_registrasi.tgl_permohonan");
		$this->db->from('lsbu_registrasi');
		$this->db->join('lsbu_registrasi_history','lsbu_registrasi_history.NIB=lsbu_registrasi.NIB AND lsbu_registrasi_history.tgl_permohonan=lsbu_registrasi.tgl_permohonan','left');

		$this->db->where('lsbu_registrasi.NIB',$nib);
		//$this->db->where("lsbu_registrasi_history.status_2!='0000-00-00'");
		$this->db->group_by('tgl_permohonan');

		$query = $this->db->get();
		return $query->result_array();
	}
	public function tanggal_permohonan_biaya($nib){
		$this->db->select("lsbu_registrasi.NIB,GROUP_CONCAT(distinct lsbu_registrasi.id_sub_klasifikasi, ' ') as concat_sub,GROUP_CONCAT(distinct lsbu_registrasi.id_klasifikasi, ' ') as concat_klasifikasi,lsbu_registrasi.kualifikasi,lsbu_registrasi.tgl_permohonan");
		$this->db->from('lsbu_registrasi');
		$this->db->join('lsbu_registrasi_history','lsbu_registrasi_history.NIB=lsbu_registrasi.NIB AND lsbu_registrasi_history.tgl_permohonan=lsbu_registrasi.tgl_permohonan','left');

		$this->db->where('lsbu_registrasi.NIB',$nib);
		$this->db->where("lsbu_registrasi_history.status_1!='0000-00-00'");
		$this->db->group_by('tgl_permohonan');

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
	public function status_kontrak(){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('*');
		$otherdb->from('lsbu_status_kontrak');
		$query = $otherdb->get();
		return $query->result_array();
	}
	public function tenaga_kerja($nib){
		$this->db->select('*');
		$this->db->from('lsbu_tenaga_kerja');
		$this->db->where('NIB',$nib);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function neraca_ski($nib){
		$this->db->select('*');
		$this->db->from('lsbu_keuangan_neraca_2');
		$this->db->where('NIB',$nib);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function neraca($nib){
		$this->db->select('*');
		$this->db->from('lsbu_keuangan_neraca');
		$this->db->where('NIB',$nib);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function pph_omset($nib){
		$this->db->select('*');
		$this->db->from('lsbu_keuangan_pendapatan');
		$this->db->where('NIB',$nib);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function pemegang_saham($nib){
		$this->db->select('*');
		$this->db->from('lsbu_keuangan_saham');
		$this->db->where('NIB',$nib);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function akte_pendirian($nib){
		$this->db->select('*');
		$this->db->from('lsbu_akte_pendirian');
		$this->db->where('NIB',$nib);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function akte_perubahan($nib){
		$this->db->select('*');
		$this->db->from('lsbu_akte_perubahan');
		$this->db->where('NIB',$nib);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function pengalaman($nib){
		$this->db->select('*');
		$this->db->from('lsbu_pengalaman');
		$this->db->where('NIB',$nib);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function sumber_dana(){
		$this->db->select('*');
		$this->db->from('sumber_dana');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function klasifikasi_bu_2020_sifat_usaha($sifat_usaha){
		$this->db->select('*');
		$this->db->from('lsbu_klasifikasi_sub_kbli');
		if($sifat_usaha=='1'){
			$this->db->where('sifat_usaha','Umum');
		}else{
			$this->db->where('sifat_usaha','Spesialis');

		}
		$this->db->where('jenis_usaha','Pekerjaan Konstruksi');
		$this->db->group_by('klasifikasi');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function sub_klasifikasi_bu_2020_sifat_usaha($sifat_usaha){
		$this->db->select('*');
		$this->db->from('lsbu_klasifikasi_sub_kbli');
		if($sifat_usaha=='1'){
			$this->db->where('sifat_usaha','Umum');
		}else{
			$this->db->where('sifat_usaha','Spesialis');

		}
		$this->db->where('jenis_usaha','Pekerjaan Konstruksi');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function klasifikasi_bu_2020(){
		$this->db->select('*');
		$this->db->from('lsbu_klasifikasi_sub_kbli');
		$this->db->group_by('klasifikasi');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function sub_klasifikasi_bu_2020(){
		$this->db->select('*');
		$this->db->from('lsbu_klasifikasi_sub_kbli');
		$query = $this->db->get();
		return $query->result_array();
	}


	public function biodata_search($id_bu){
		$this->db->select('*');
		$this->db->from('lsbu_bu');
		$this->db->where('NIB',$id_bu);
		$query = $this->db->get();
		return $query->result_array();
	}

		public function pengurus_search($nib,$id_pengurus){
			$otherdb = $this->load->database('default2', TRUE);
			$otherdb->select('*');
			$otherdb->from('lsbu_pengurus');
			$otherdb->where('NIB',$nib);
			$otherdb->where('id_pengurus',$id_pengurus);
			$query = $otherdb->get();
			return $query->result_array();
		}
	public function jabatan_bu(){
		$this->db->select('*');
		$this->db->from('jabatan_deskripsi');
		$query = $this->db->get();
		return $query->result_array();
	}
  public function get_mitra(){
    $this->db->select('*');
    $this->db->from('user_mitra');
    $this->db->where('Username IS NOT NULL');
    $query = $this->db->get();
    return $query->result_array();
  }
  public function get_mitra2($nik){
    $this->db->select('*');
    $this->db->from('user_mitra');
    $this->db->where('nik',$nik);
    $query = $this->db->get();
    return $query->result_array();
  }
	public function pengurus($nib){
		$this->db->select('*');
		$this->db->from('lsbu_pengurus');
		$this->db->where('NIB',$nib);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function peralatan($nib){
		$this->db->select('lsbu_peralatan.persyaratan,propinsi.Nama as propinsi,lsbu_peralatan.NIB,lsbu_peralatan.id,lsbu_peralatan.jenis_peralatan,lsbu_peralatan.tipe_peralatan,lsbu_master_peralatan.subvarian as sub_tipe_peralatan,lsbu_peralatan.tahun_pembuatan,lsbu_peralatan.kapasitas,lsbu_peralatan.kondisi,lsbu_peralatan.harga');
		$this->db->from('lsbu_peralatan');
		$this->db->join('lsbu_master_peralatan','lsbu_master_peralatan.kode=lsbu_peralatan.sub_tipe_peralatan','left');
		$this->db->join('propinsi','propinsi.ID_Propinsi=lsbu_peralatan.propinsi','left');

		$this->db->where('NIB',$nib);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function klasifikasi_kualifikasi($nib){
		$this->db->select('*');
		$this->db->from('lsbu_registrasi');
		$this->db->where('NIB',$nib);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function jabatan(){
		$this->db->select('*');
		$this->db->from('lsbu_pengurus_jabatan');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function jenjang(){
		$this->db->select('*');
		$this->db->from('lsbu_jenjang_pendidikan');
		$query = $this->db->get();
		return $query->result_array();
	}

	function cek_pjbu($nib){
		$default2 = $this->load->database('default2', TRUE);
		$default2->select('noreg,pjbu');
		$default2->from('lsbu_tenaga_kerja');
		$default2->where('NIB',$nib);
		$default2->where('pjbu','1');
		$query = $default2->get();
		return $query->result_array();
	}
	function cek_pjt($nib){
		$default2 = $this->load->database('default2', TRUE);
		$default2->select('noreg,pjbu');
		$default2->from('lsbu_tenaga_kerja');
		$default2->where('NIB',$nib);
		$default2->where('pjt','1');
		$query = $default2->get();
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
	public function biodata($id_bu){
		$this->db->select('*');
		$this->db->from('lsbu_bu');
		$this->db->where('NIB',$id_bu);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function provinsi(){
		$this->db->select('*');
		$this->db->from('propinsi');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function jenis_usaha(){
		$this->db->select('*');
		$this->db->from('lsbu_jenis_usaha');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function klasifikasi_jenis_usaha(){
		$this->db->select('*');
		$this->db->from('lsbu_klasifikasi_jenis_usaha');
		$query = $this->db->get();
		return $query->result_array();
	}
  public function get_tgl_atas($nib)
  {
      $this->db->select('*');
      $this->db->from('lsbu_registrasi');
      $this->db->where("NIB",$nib);
      $this->db->order_by('tgl_permohonan', 'desc');
      $query = $this->db->get();
      return $query->result_array();
  }
	public function get_user_mitra()
	{
			$this->db->select('user_mitra.*,kabupaten.Nama as id_kabupaten,propinsi.Nama as id_propinsi');
			$this->db->from('user_mitra');
			$this->db->join('propinsi','propinsi.ID_Propinsi=user_mitra.propinsi','left');

			$this->db->join('kabupaten','kabupaten.ID_Kabupaten=user_mitra.kabupaten','left');

			$query = $this->db->get();
			return $query->result_array();
	}
	public function search_mitra($nik)
	{
			$this->db->select('user_mitra.*,kabupaten.Nama as id_kabupaten,propinsi.Nama as id_propinsi');
			$this->db->from('user_mitra');
			$this->db->join('propinsi','propinsi.ID_Propinsi=user_mitra.propinsi','left');

			$this->db->join('kabupaten','kabupaten.ID_Kabupaten=user_mitra.kabupaten','left');
			$this->db->where('user_mitra.nik',$nik);
			$query = $this->db->get();
			return $query->result_array();
	}
	public function sifat_usaha(){
		$this->db->select('*');
		$this->db->from('lsbu_sifat_usaha');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_permohonan_masuk_7($tgl_awal2,$tgl_now2){
		$this->db->select('count(id_izin) as jumlah');
		$this->db->from('lsbu_permohonan_masuk');
		$this->db->where("tgl_create_izin BETWEEN '$tgl_awal2' AND '$tgl_now2'");

		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_permohonan_tinjauan_7($tgl_awal2,$tgl_now2){
		$this->db->select('count(id_izin) as jumlah');
		$this->db->from('lsbu_registrasi');
		$this->db->where("tgl_permohonan BETWEEN '$tgl_awal2' AND '$tgl_now2'");

		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_permohonan_cetak_7($tgl_awal2,$tgl_now2){
		$this->db->select("count(lsbu_registrasi.id_izin) as jumlah");
		$this->db->from('lsbu_registrasi');
		$this->db->join('lsbu_registrasi_history','lsbu_registrasi.NIB=lsbu_registrasi_history.NIB AND lsbu_registrasi.tgl_permohonan=lsbu_registrasi_history.tgl_permohonan','left');

		$this->db->where("lsbu_registrasi_history.status_2 BETWEEN '$tgl_awal2' AND '$tgl_now2'");
		$this->db->where("lsbu_registrasi.qr IS NOT NULL");

		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_permohonan_tinjauan_7_hapus($tgl_awal2,$tgl_now2){
		$this->db->select('count(id_record) as jumlah');
		$this->db->from('lsbu_registrasi_hapus');
		$this->db->where("tgl_permohonan BETWEEN '$tgl_awal2' AND '$tgl_now2'");

		$query = $this->db->get();
		return $query->result_array();
	}
	public function kabupaten(){
		$this->db->select('*');
		$this->db->from('kabupaten');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_50_hit_ulang(){
		$this->db->select('*');
		$this->db->from('lsbu_hit');
		$this->db->where('status','0');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_master_asesor(){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('level','3');
		$query = $this->db->get();
		return $query->result_array();
	}
	public function search_asesor($id){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('Username',$id);
		$query = $this->db->get();
		return $query->result_array();
	}

}
?>
