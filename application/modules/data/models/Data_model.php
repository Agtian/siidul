<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_model extends CI_Model {

	public function get_data_indikator()
	{
		$this->db->select('*');
		$this->db->from('TM_INDIKATOR');
		$this->db->where('ID_RUANG', $this->session->userdata('user_id_ruang'));
		return $this->db->get();
	}

	public function get_data_ruang()
	{
		$this->db->select('*');
		$this->db->from('TR_INDIKATOR');
		return $this->db->get();
	}

	public function get_tahun()
	{
		$this->db->distinct();
		$this->db->select('YEAR(TANGGAL) AS TAHUN');
		$this->db->from('TR_INDIKATOR');
		return $this->db->get();
	}

	public function get_indikator_ruang($id_ruang)
	{
		$this->db->select('*');
		$this->db->from('TM_INDIKATOR');
		$this->db->where('TM_INDIKATOR.ID_RUANG', $id_ruang);
		return $this->db->get();
	}

	public function cek_data_double($tanggal)
	{
		$this->db->select('TANGGAL');
		$this->db->from('TR_INDIKATOR');
		$this->db->where('ID_RUANG_SUB', $this->session->userdata('user_id_ruang_sub'));
		$this->db->where('TANGGAL', $tanggal);
		return $this->db->get()->num_rows();
	}

	public function get_data_pertanggal($tanggal)
	{
		$this->db->distinct();
		$this->db->select('TR_INDIKATOR.ID AS ID_INDIKATOR_MUTU, ID_INDIKATOR, NUM, DEN, TANGGAL, DETAIL_INDIKATOR, DETAIL_NUM, DETAIL_DEN, NILAI_STANDAR, ID_RUANG');
		$this->db->from('TR_INDIKATOR');
		$this->db->join('TM_INDIKATOR', 'TR_INDIKATOR.ID_INDIKATOR = TM_INDIKATOR.ID');
		$this->db->where('ID_RUANG_SUB', $this->session->userdata('user_id_ruang_sub'));
		$this->db->where('TR_INDIKATOR.TANGGAL', $tanggal);
		return $this->db->get();
	}

	public function get_data_bulanan($id_indikator, $bulan, $tahun)
	{
		$this->db->select('TR_INDIKATOR.ID, TR_INDIKATOR.TANGGAL, YEAR(TANGGAL) AS TAHUN, MONTH(TANGGAL) AS BULAN, TR_INDIKATOR.NUM, TR_INDIKATOR.DEN, TREF_RUANG.NAMA_RUANG, TM_INDIKATOR.DETAIL_INDIKATOR, TM_INDIKATOR.DETAIL_NUM, TM_INDIKATOR.DETAIL_DEN');
		$this->db->from('TR_INDIKATOR');
		$this->db->join('TREF_RUANG', 'TR_INDIKATOR.ID_RUANG = TREF_RUANG.ID');
		$this->db->join('TM_INDIKATOR', 'TR_INDIKATOR.ID_INDIKATOR = TM_INDIKATOR.ID');
		$this->db->where('TR_INDIKATOR.ID_INDIKATOR', $id_indikator);
		// $this->db->where('YEAR(TR_INDIKATOR.TANGGAL)', $tahun);
		$this->db->where('MONTH(TR_INDIKATOR.TANGGAL)', $bulan);
		$this->db->order_by('TR_INDIKATOR.TANGGAL', 'ASC');
		return $this->db->get();
	}

	public function get_total_perbulan($bulan)
	{
		$this->db->distinct();
		$this->db->select('TANGGAL');
		$this->db->from('TR_INDIKATOR');
		$this->db->where('MONTH(TANGGAL)', $bulan);
		return $this->db->get()->num_rows();
	}

	public function get_hari_hari($id_ruang_sub, $bulan)
	{
		$this->db->distinct();
		$this->db->select('TANGGAL, DAY(TANGGAL) AS DATE');
		$this->db->from('TR_INDIKATOR');
		$this->db->where('ID_RUANG_SUB', $id_ruang_sub);
		$this->db->where('MONTH(TANGGAL)', $bulan);
		$this->db->order_by('TANGGAL', 'ASC');
		$this->db->group_by('TANGGAL');
		return $this->db->get();
	}

}