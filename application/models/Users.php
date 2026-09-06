<?php
// models/Users.php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Model
{
    function __construct()
    {
      parent::__construct();
    }

    public function get_current_page_records($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->select('bu_pds_history.Read,bu_pds_deskripsi.Deskripsi as Deskripsi2,bu_pds_upload.Deskripsi,bu_pds_history.ID_RECORD,bu_pds_history.ID_BU,bu_pds_history.ID_PDS,bu_pds_history.ID_ASOSIASI,bu_pds_history.ID_UPLOAD,bu_pds_history.Id_User,bu_pds_history.Tgl_Record,bu_pds_history.Ket');
    		$this->db->from('bu_pds_history');
    		$this->db->join('bu_pds_upload','bu_pds_history.ID_UPLOAD=bu_pds_upload.ID_Upload','left');
    		$this->db->join('bu_pds_deskripsi','bu_pds_history.ID_PDS=bu_pds_deskripsi.ID_PDS','left');
    		$this->db->where('bu_pds_history.Status',0);
    		$this->db->order_by("bu_pds_history.ID_RECORD", "desc");
    		$query = $this->db->get();
    		return $query->result_array();
    }

    public function get_total()
    {
        return $this->db->count_all("bu_pds_history");
    }
}
