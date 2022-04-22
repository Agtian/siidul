<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inm_model extends CI_Model
{
    public function get_det_ruang($id_ruang_sub)
    {
        $this->db->select('*');
        $this->db->from('TREF_RUANG_SUB');
        $this->db->where('ID', $id_ruang_sub);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return $data = 0;
        } else {
            return $query->row();
        }
    }

    public function get_tahun()
    {
        $this->db->distinct();
        $this->db->select('YEAR(TANGGAL) AS TAHUN');
        $this->db->from('TR_INDIKATOR');
        $this->db->order_by("YEAR(TANGGAL)", "desc");

        return $this->db->get();
    }

    public function get_data_bulanan($bulan, $tahun)
    {
        $this->db->select("TR_INDIKATOR.ID_INDIKATOR, TM_INDIKATOR.DETAIL_INDIKATOR, sum(TR_INDIKATOR.NUM) as NUM_BULAN, 
                sum(TR_INDIKATOR.DEN) as DEN_BULAN, MONTH(TR_INDIKATOR.TANGGAL) as BULAN, TREF_RUANG.NAMA_RUANG");
        $this->db->from("TR_INDIKATOR");
        $this->db->join("TREF_RUANG_SUB", "TREF_RUANG_SUB.ID = TR_INDIKATOR.ID_RUANG_SUB");
        $this->db->join("TREF_RUANG", "TREF_RUANG.ID = TREF_RUANG_SUB.ID_RUANG");
        $this->db->join("TM_INDIKATOR", "TM_INDIKATOR.ID = TR_INDIKATOR.ID_INDIKATOR");
        $this->db->join("TREF_JENIS_INDIKATOR", "TREF_JENIS_INDIKATOR.ID =TM_INDIKATOR.ID_JENIS_INDIKATOR");
        $this->db->where("TREF_JENIS_INDIKATOR.ID", 3);
        $this->db->where("YEAR(TR_INDIKATOR.TANGGAL)", $tahun);
        $this->db->where("MONTH(TR_INDIKATOR.TANGGAL)", $bulan);
        $this->db->group_by("TR_INDIKATOR.ID_INDIKATOR,TM_INDIKATOR.DETAIL_INDIKATOR,MONTH(TR_INDIKATOR.TANGGAL),TREF_RUANG.NAMA_RUANG");
        $this->db->order_by("TR_INDIKATOR.ID_INDIKATOR");

        return $this->db->get();
    }

    public function get_hari_hari($bulan, $tahun)
    {
        $this->db->distinct();
        $this->db->select('TANGGAL, DAY(TANGGAL) AS DATE');
        $this->db->from('TR_INDIKATOR');
        $this->db->where('MONTH(TANGGAL)', $bulan);
        $this->db->where('YEAR(TANGGAL)', $tahun);
        $this->db->order_by('TANGGAL', 'ASC');
        $this->db->group_by('TANGGAL');
        return $this->db->get();
    }
}
