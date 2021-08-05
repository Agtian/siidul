<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

	function logged_id()
    {
        return $this->session->userdata('user_id');
    }

    function logged_akses()
    {
        return $this->session->userdata('akses');
    }

	function check_login($table, $field1, $field2)
    {
        $this->db->select('TM_USER.ID AS ID_USER, TM_USER.ID_RUANG, TM_USER.ID_RUANG_SUB, TM_USER.NAMA, TM_USER.ID_AKSES, TM_USER.USERNAME, TREF_RUANG_SUB.NAMA_SUB_RUANG, TREF_RUANG.NAMA_RUANG, TREF_RUANG.NAMA_KEPALA_RUANG');
        $this->db->from('TM_USER');
        $this->db->join('TREF_RUANG_SUB', 'TM_USER.ID_RUANG_SUB = TREF_RUANG_SUB.ID');
        $this->db->join('TREF_RUANG', 'TM_USER.ID_RUANG = TREF_RUANG.ID');
        $this->db->where($field1);
        $this->db->where($field2);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }
}