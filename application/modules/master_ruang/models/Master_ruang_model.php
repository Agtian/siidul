<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_ruang_model extends CI_Model {

	public function get_data_ruang()
	{
		$this->db->select('*');
		$this->db->from('TREF_RUANG');
		return $this->db->get();
	}

}