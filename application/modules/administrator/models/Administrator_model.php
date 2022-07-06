<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator_model extends CI_Model
{
	public function get_data_ruang()
	{	
		$this->db->order_by('NAMA_SUB_RUANG', 'ASC');
		return $this->db->get('TREF_RUANG_SUB');
	}

	public function get_data_tahun()
	{
		$this->db->distinct();
		$this->db->select('YEAR(TANGGAL) AS TAHUN');
		$this->db->from('TR_INDIKATOR');
		$this->db->order_by('TAHUN', 'DESC');
		return $this->db->get();
	}

	public function get_nama_ruang($id_sub_ruang)
	{
		$this->db->select('NAMA_SUB_RUANG');
		$this->db->from('TREF_RUANG_SUB');
		$this->db->where('ID', $id_sub_ruang);
		return $this->db->get()->row();
	}

	public function get_data_kelengkapan()
	{
		$query = $this->db->query("SELECT NAMA_SUB_RUANG, TANGGAL FROM (SELECT NAMA_SUB_RUANG, ROW_NUMBER() OVER (PARTITION BY TR_INDIKATOR.ID_RUANG_SUB ORDER BY  TR_INDIKATOR.TANGGAL DESC) As RowNum, TR_INDIKATOR.TANGGAL
				FROM TR_INDIKATOR 
				JOIN TREF_RUANG_SUB ON TR_INDIKATOR.ID_RUANG_SUB = TREF_RUANG_SUB.ID  
				WHERE YEAR(TANGGAL) = 2022
			) as A
			WhERe A.RowNum = 1");
		return $query->result();
	}

	// 
	// Start Chart home 
	//
		public function get_data_progres_chart_jan($id_sub_ruang, $tahun) 
		{
			$this->db->distinct();
			$this->db->select('TANGGAL AS JAN');
			$this->db->from('TR_INDIKATOR');
			$this->db->where('ID_RUANG_SUB', $id_sub_ruang);
			$this->db->where('MONTH(TANGGAL)', '1');
			$this->db->where('YEAR(TANGGAL)', $tahun);
			$this->db->order_by('TANGGAL', 'desc');
			$this->db->limit('1');

			return $this->db->get()->row();
		}

		public function get_data_progres_chart_feb($id_sub_ruang, $tahun) 
		{
			$this->db->distinct();
			$this->db->select('TANGGAL AS FEB');
			$this->db->from('TR_INDIKATOR');
			$this->db->where('ID_RUANG_SUB', $id_sub_ruang);
			$this->db->where('MONTH(TANGGAL)', '2');
			$this->db->where('YEAR(TANGGAL)', $tahun);
			$this->db->order_by('TANGGAL', 'desc');
			$this->db->limit('1');

			return $this->db->get()->row();
		}

		public function get_data_progres_chart_mar($id_sub_ruang, $tahun) 
		{
			$this->db->distinct();
			$this->db->select('TANGGAL AS MAR');
			$this->db->from('TR_INDIKATOR');
			$this->db->where('ID_RUANG_SUB', $id_sub_ruang);
			$this->db->where('MONTH(TANGGAL)', '3');
			$this->db->where('YEAR(TANGGAL)', $tahun);
			$this->db->order_by('TANGGAL', 'desc');
			$this->db->limit('1');

			return $this->db->get()->row();
		}

		public function get_data_progres_chart_apr($id_sub_ruang, $tahun) 
		{
			$this->db->distinct();
			$this->db->select('TANGGAL AS APR');
			$this->db->from('TR_INDIKATOR');
			$this->db->where('ID_RUANG_SUB', $id_sub_ruang);
			$this->db->where('MONTH(TANGGAL)', '4');
			$this->db->where('YEAR(TANGGAL)', $tahun);
			$this->db->order_by('TANGGAL', 'desc');
			$this->db->limit('1');

			return $this->db->get()->row();
		}

		public function get_data_progres_chart_mei($id_sub_ruang, $tahun) 
		{
			$this->db->distinct();
			$this->db->select('TANGGAL AS MEI');
			$this->db->from('TR_INDIKATOR');
			$this->db->where('ID_RUANG_SUB', $id_sub_ruang);
			$this->db->where('MONTH(TANGGAL)', '5');
			$this->db->where('YEAR(TANGGAL)', $tahun);
			$this->db->order_by('TANGGAL', 'desc');
			$this->db->limit('1');

			return $this->db->get()->row();
		}

		public function get_data_progres_chart_jun($id_sub_ruang, $tahun) 
		{
			$this->db->distinct();
			$this->db->select('TANGGAL AS JUN');
			$this->db->from('TR_INDIKATOR');
			$this->db->where('ID_RUANG_SUB', $id_sub_ruang);
			$this->db->where('MONTH(TANGGAL)', '6');
			$this->db->where('YEAR(TANGGAL)', $tahun);
			$this->db->order_by('TANGGAL', 'desc');
			$this->db->limit('1');

			return $this->db->get()->row();
		}

		public function get_data_progres_chart_jul($id_sub_ruang, $tahun) 
		{
			$this->db->distinct();
			$this->db->select('TANGGAL AS JUL');
			$this->db->from('TR_INDIKATOR');
			$this->db->where('ID_RUANG_SUB', $id_sub_ruang);
			$this->db->where('MONTH(TANGGAL)', '7');
			$this->db->where('YEAR(TANGGAL)', $tahun);
			$this->db->order_by('TANGGAL', 'desc');
			$this->db->limit('1');

			return $this->db->get()->row();
		}

		public function get_data_progres_chart_agt($id_sub_ruang, $tahun) 
		{
			$this->db->distinct();
			$this->db->select('TANGGAL AS AGT');
			$this->db->from('TR_INDIKATOR');
			$this->db->where('ID_RUANG_SUB', $id_sub_ruang);
			$this->db->where('MONTH(TANGGAL)', '8');
			$this->db->where('YEAR(TANGGAL)', $tahun);
			$this->db->order_by('TANGGAL', 'desc');
			$this->db->limit('1');

			return $this->db->get()->row();
		}

		public function get_data_progres_chart_sep($id_sub_ruang, $tahun) 
		{
			$this->db->distinct();
			$this->db->select('TANGGAL AS SEP');
			$this->db->from('TR_INDIKATOR');
			$this->db->where('ID_RUANG_SUB', $id_sub_ruang);
			$this->db->where('MONTH(TANGGAL)', '9');
			$this->db->where('YEAR(TANGGAL)', $tahun);
			$this->db->order_by('TANGGAL', 'desc');
			$this->db->limit('1');

			return $this->db->get()->row();
		}

		public function get_data_progres_chart_okt($id_sub_ruang, $tahun) 
		{
			$this->db->distinct();
			$this->db->select('TANGGAL AS OKT');
			$this->db->from('TR_INDIKATOR');
			$this->db->where('ID_RUANG_SUB', $id_sub_ruang);
			$this->db->where('MONTH(TANGGAL)', '10');
			$this->db->where('YEAR(TANGGAL)', $tahun);
			$this->db->order_by('TANGGAL', 'desc');
			$this->db->limit('1');

			return $this->db->get()->row();
		}

		public function get_data_progres_chart_nov($id_sub_ruang, $tahun) 
		{
			$this->db->distinct();
			$this->db->select('TANGGAL AS NOV');
			$this->db->from('TR_INDIKATOR');
			$this->db->where('ID_RUANG_SUB', $id_sub_ruang);
			$this->db->where('MONTH(TANGGAL)', '11');
			$this->db->where('YEAR(TANGGAL)', $tahun);
			$this->db->order_by('TANGGAL', 'desc');
			$this->db->limit('1');

			return $this->db->get()->row();
		}

		public function get_data_progres_chart_des($id_sub_ruang, $tahun) 
		{
			$this->db->distinct();
			$this->db->select('TANGGAL AS DES');
			$this->db->from('TR_INDIKATOR');
			$this->db->where('ID_RUANG_SUB', $id_sub_ruang);
			$this->db->where('MONTH(TANGGAL)', '12');
			$this->db->where('YEAR(TANGGAL)', $tahun);
			$this->db->order_by('TANGGAL', 'desc');
			$this->db->limit('1');

			return $this->db->get()->row();
		}
}
