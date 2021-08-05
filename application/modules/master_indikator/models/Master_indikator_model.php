<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_indikator_model extends CI_Model {

	public function get_data_indikator($id_ruang)
	{
		$this->db->select('TREF_RUANG.NAMA_RUANG, TREF_JENIS_INDIKATOR.JENIS_INDIKATOR, DETAIL_INDIKATOR, DETAIL_NUM, DETAIL_DEN, NILAI_STANDAR, RUMUS_NUM, RUMUS_DEN, RUMUS_PERSEN');
		$this->db->from('TM_INDIKATOR');
		$this->db->join('TREF_RUANG', 'TM_INDIKATOR.ID_RUANG = TREF_RUANG.ID');
		$this->db->join('TREF_JENIS_INDIKATOR', 'TM_INDIKATOR.ID_JENIS_INDIKATOR = TREF_JENIS_INDIKATOR.ID');
		$this->db->where('TM_INDIKATOR.ID_RUANG', $id_ruang);
		return $this->db->get();
	}

	public function get_list_ruang()
	{
		$this->db->select('*');
		$this->db->from('TREF_RUANG');
		return $this->db->get();
	}

	public function get_list_jenis_indikator()
	{
		$this->db->select('*');
		$this->db->from('TREF_JENIS_INDIKATOR');
		return $this->db->get();
	}

}