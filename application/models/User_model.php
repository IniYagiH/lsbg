<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User_model extends CI_Model
{

      	function search_user_bu($propinsi,$asosiasi){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('bu_asosiasi_detail.Nama as nama_asosiasi,propinsi.Nama as nama_propinsi,user.Username,user.Username,user.id_propinsi,user.level,user.nama,user.No_KTP');
		$otherdb->from('user_persyaratan');
		$otherdb->join("user","user_persyaratan.Username = user.Username","left");
		$otherdb->join("propinsi","user.id_propinsi = propinsi.ID_Propinsi","left");
		$otherdb->join("bu_asosiasi_detail","user.ID_Asosiasi = bu_asosiasi_detail.ID_asosiasi_BU","left");

		if($propinsi!='99'){
			$otherdb->where('user.id_propinsi',$propinsi);
		}

		$otherdb->where('user.ID_Asosiasi',$asosiasi);
		$otherdb->where('user.jenis_asosiasi','BU');
		$otherdb->order_by("user.id_propinsi", "desc");
		$query = $otherdb->get();
		return $query->result_array();
	}

	function search_user_tk($propinsi,$asosiasi,$tipe){
		$otherdb = $this->load->database('default2', TRUE);
		$otherdb->select('');
		$otherdb->from('user_persyaratan');
		$otherdb->join("user","user_persyaratan.Username = user.Username","left");
		if($propinsi!='00'){
			$otherdb->where('user.id_propinsi',$ktp);
		}

		$otherdb->where('user.ID_Asosiasi',$asosiasi);
		$otherdb->where('user.jenis_asosiasi','BU');
		$query = $otherdb->get();
		return $query->result_array();
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

	function asosiasi_tk(){
		$otherdb = $this->load->database('default2', TRUE);
		$select="SELECT ID_Asosiasi_Profesi,Nama FROM personal_profesi_ta";
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

	public function setSession($Username,$Id_Session,$u_data)
	{
		$CI = &get_instance();
		$default2 = $CI->load->database('default2', TRUE);

		//Get previous mapped session ID
		$oldSessionId = $default2->select("session_id")
					->where(array('Username' => $Username))
					->get("user")
					->row("session_id");

		//Map new session ID to the user
		$default2->where('Username', $Username);
		$default2->update('user', array('session_id' => $Id_Session));
	}
	public function setSession_survailen($Username,$Id_Session,$u_data)
	{
		$CI = &get_instance();
		$default2 = $CI->load->database('default2', TRUE);

		//Get previous mapped session ID
		$oldSessionId = $default2->select("session_id")
					->where(array('Username' => $Username))
					->get("user_survailen")
					->row("session_id");

		//Map new session ID to the user
		$default2->where('Username', $Username);
		$default2->update('user_survailen', array('session_id' => $Id_Session));
	}

	public function getSession($Username)
	{
		$CI = &get_instance();
		$default2 = $CI->load->database('default2', TRUE);

		//Get previous mapped session ID
		$oldSessionId = $default2->select("session_id")
					->where(array('Username' => $Username))
					->get("user")
					->row("session_id");

		return $oldSessionId;
	}
	public function getSession_survailen($Username)
	{
		$CI = &get_instance();
		$default2 = $CI->load->database('default2', TRUE);

		//Get previous mapped session ID
		$oldSessionId = $default2->select("session_id")
					->where(array('Username' => $Username))
					->get("user_survailen")
					->row("session_id");

		return $oldSessionId;
	}

	public function deleteSession($Username)
	{
		$CI = &get_instance();
		$default2 = $CI->load->database('default2', TRUE);

		//Map new session ID to the user
		$default2->where('Username', $Username);
		$default2->update('user', array('session_id' => NULL));
	}
	public function deleteSession_survailen($Username)
	{
		$CI = &get_instance();
		$default2 = $CI->load->database('default2', TRUE);

		//Map new session ID to the user
		$default2->where('Username', $Username);
		$default2->update('user_survailen', array('session_id' => NULL));
	}

	public function login($username,$Password)
	{
		$CI = &get_instance();
		$default2 = $CI->load->database('default2', TRUE);
		$default2->select('Username,Password');
		$default2->from('user');
		$default2->where('Username',$username);
		$default2->where('Password',$Password);

		$query = $default2->get();
		if($query->num_rows() === 1)
		{
			return TRUE;
		}
		else {
			return FALSE;
		}
	}
	public function login_survailen($username,$Password)
	{
		$CI = &get_instance();
		$default2 = $CI->load->database('default2', TRUE);
		$default2->select('Username,Password');
		$default2->from('user_survailen');
		$default2->where('Username',$username);
		$default2->where('Password',$Password);

		$query = $default2->get();
		if($query->num_rows() === 1)
		{
			return TRUE;
		}
		else {
			return FALSE;
		}
	}

	public function cekemail($email)
	{
		$CI = &get_instance();
		$default2 = $CI->load->database('default2', TRUE);
		$default2->select('*');
		$default2->from('user');
		$default2->where('email_pemberi',$email);
		$query = $default2->get();
	  return $query->result_array();
	}

	public function cek($id)
	{
		$CI = &get_instance();
		$default2 = $CI->load->database('default2', TRUE);
		$default2->select('username,Password');
		$default2->from('user');
		$default2->where('Username',$id);
		$query = $default2->get();
		if($query->num_rows() == 0)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function insert($data)
	{
		$CI = &get_instance();
		$default2 = $CI->load->database('default2', TRUE);
		$default2->insert('user', $data);
		return true;
	}

	public function selectwhere($Username)
	{
		$CI = &get_instance();
		$default2 = $CI->load->database('default2', TRUE);
		$default2->select('*');
		$default2->from('user');
		$default2->where('Username',$Username);
		$query = $default2->get();
		foreach ($query->result() as $data) {
			return $data;
		}
	}

	public function selectwhere_survailen($Username)
	{
		$CI = &get_instance();
		$default2 = $CI->load->database('default2', TRUE);
		$default2->select('*');
		$default2->from('user_survailen');
		$default2->where('Username',$Username);
		$query = $default2->get();
		foreach ($query->result() as $data) {
			return $data;
		}
	}

	public function user_detail($Username)
	{
		$CI = &get_instance();
		$default2 = $CI->load->database('default2', TRUE);
		$default2->select('*');
		$default2->from('user');
		$default2->where('Username',$Username);
		$query = $default2->get();
		return $query->result();
	}

	public function data()
	{
		$CI = &get_instance();
		$default2 = $CI->load->database('default2', TRUE);
		$default2->select('*');
		$default2->from('user');
		$query = $default2->get();

		return $query->result();
	}

	public function search($pilih,$input)
	{
		$CI = &get_instance();
		$default2 = $CI->load->database('default2', TRUE);
		$default2->select('*');
		$default2->from('user');
		$default2->join("propinsi","propinsi.id_propinsi = user.id_propinsi",'left');

		if($pilih == 'noktp')
		{
			$default2->where('No_KTP',$input);
		}
		elseif($pilih == 'nama')
		{
			$default2->like('user.Username',$input);
		}
		elseif($pilih == 'propinsi')
		{
			$default2->like('propinsi.Nama',$input);
		}
		else
		{
			$default2->where('Username',$input);
		}

		$query = $default2->get();

		return $query->result();
	}

	function select($username,$Password)
	{
		$CI = &get_instance();
		$default2 = $CI->load->database('default2', TRUE);
		$default2->select('*');
		$default2->from('user');
		$default2->where('Username',$username);
		$default2->where('Password',$Password);
		$query = $default2->get();
		foreach ($query->result() as $data) {
			return $data;
		}
	}
	function select_survailen($username,$Password)
	{
		$CI = &get_instance();
		$default2 = $CI->load->database('default2', TRUE);
		$default2->select('*');
		$default2->from('user_survailen');
		$default2->where('Username',$username);
		$default2->where('Password',$Password);
		$query = $default2->get();
		foreach ($query->result() as $data) {
			return $data;
		}
	}

	public function updateuser($Username,$data){
		$CI = &get_instance();
		$default2 = $CI->load->database('default2', TRUE);
        $default2->where('Username',$Username);
        $default2->update('user',$data);
       return true;
  	}

   public function updatebiodata($id_personal,$data){
        $this->db->where('id_personal',$id_personal);
        $this->db->update('personal',$data);
       return true;
  	}

  	public function edit($id,$data)
	{
		$CI = &get_instance();
		$default2 = $CI->load->database('default2', TRUE);
		$default2->where('Username', $id);
		$default2->update('user',$data);
		return true;
	}


}
