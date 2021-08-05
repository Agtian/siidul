<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_user_model extends CI_Model {

	public function get_data_user()
	{
		$this->db->select('*');
		$this->db->from('TM_USER');
		return $this->db->get();
	}

	public function get_list_ruang()
	{
		$this->db->select('*');
		$this->db->from('TREF_RUANG');
		return $this->db->get();
	}

	public function get_list_akses()
	{
		$this->db->select('*');
		$this->db->from('TREF_AKSES');
		return $this->db->get();
	}	


}