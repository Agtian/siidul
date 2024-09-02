<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_model extends CI_Model
{

	public function get_data_indikator()
	{
		$this->db->select('*');
		$this->db->from('TM_INDIKATOR');
		$this->db->where('ID_RUANG', $this->session->userdata('user_id_ruang'));
		$this->db->where('F_STATUS', 1);
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

	//evaluasi
	public function cek_data_double_evaluasi($bulan, $tahun)
	{
		$this->db->select('*');
		$this->db->from('TR_EVALUASI');
		$this->db->where('ID_RUANG_SUB', $this->session->userdata('user_id_ruang_sub'));
		$this->db->where('BULAN', $bulan);
		$this->db->where('TAHUN', $tahun);
		return $this->db->get()->num_rows();
	}



	function get_evaluasi($bulan, $tahun, $id_ruang_sub)
	{

		return $this->db->query("select tm.DETAIL_INDIKATOR, tm.NILAI_STANDAR ,
				ev.FAKTOR_PENDORONG, ev.FAKTOR_PENGHAMBAT, sub.NAMA_SUB_RUANG,  ruang.NAMA_RUANG
				from TR_EVALUASI ev
				join TM_INDIKATOR tm on tm.ID = ev.ID_INDIKATOR
				join TREF_RUANG_SUB sub on sub.ID = ev.ID_RUANG_SUB
				join TREF_RUANG ruang on ruang.ID = sub.ID_RUANG
				where BULAN ='$bulan' and TAHUN ='$tahun'
				and ID_RUANG_SUB = '$id_ruang_sub' ")->result();
	}
	//end evaluasi



	public function get_data_pertanggal($tanggal)
	{
		$this->db->distinct();
		$this->db->select('TR_INDIKATOR.ID AS ID_INDIKATOR_MUTU, ID_INDIKATOR, NUM, DEN, TANGGAL, DETAIL_INDIKATOR, DETAIL_NUM, DETAIL_DEN, NILAI_STANDAR, TR_INDIKATOR.ID_RUANG');
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
