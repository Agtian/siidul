<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Auth_model', 'Administrator_model'));
        $this->load->library('template');
        $this->load->helper(array('form', 'url', 'url_helper', 'file', 'data_helper', 'views_helper'));
    }

    public function index()
    {
        $data = [
            'data_ruang'        => $this->Administrator_model->get_data_ruang()->result(),
            'data_tahun'        => $this->Administrator_model->get_data_tahun()->result(),
            'data_kelengkapan'  => $this->Administrator_model->get_data_kelengkapan(),
        ];
        $this->template->load('template', 'v_index', $data);
    }

    public function filter()
    {
        $id_sub_ruang   = $this->input->post('id_ruang_sub');
        $tahun          = $this->input->post('tahun');

        $data = [
            'data_ruang'    => $this->Administrator_model->get_data_ruang()->result(),
            'data_tahun'    => $this->Administrator_model->get_data_tahun()->result(),
            'nama_ruang'    => $this->db->query("SELECT NAMA_SUB_RUANG FROM TREF_RUANG_SUB WHERE ID = '$id_sub_ruang'")->row(),
        ];

        // var_dump($data['nama_ruang']); die;

        $jan            = $this->Administrator_model->get_data_progres_chart_jan($id_sub_ruang, $tahun);
        if (empty($jan->JAN)) {
            $data['jan']    = 0;
        } else {
            $tgl_akhir_jan  = date('t', strtotime($jan->JAN));
            $interval_jan   = date("d", strtotime($jan->JAN));
            $data['jan']    = round(($interval_jan / $tgl_akhir_jan) * 100, 2);
        }
        

        $feb            = $this->Administrator_model->get_data_progres_chart_feb($id_sub_ruang, $tahun);
        if (empty(($feb->FEB))) {
            $data['feb']    = 0;
        } else {
            $tgl_akhir_feb  = date('t', strtotime($feb->FEB));
            $interval_feb   = date("d", strtotime($feb->FEB));
            $data['feb']    = round(($interval_feb / $tgl_akhir_feb) * 100, 2);
        }
        
        $mar            = $this->Administrator_model->get_data_progres_chart_mar($id_sub_ruang, $tahun);
        if (empty(($mar->MAR))) {
            $data['mar']    = 0;
        } else {
            $tgl_akhir_mar  = date('t', strtotime($mar->MAR));
            $interval_mar   = date("d", strtotime($mar->MAR));
            $data['mar']    = round(($interval_mar / $tgl_akhir_mar) * 100, 2);
        }
        
        $apr            = $this->Administrator_model->get_data_progres_chart_apr($id_sub_ruang, $tahun);
        if (empty(($apr->APR))) {
            $data['apr']    = 0;
        } else {
            $tgl_akhir_apr  = date('t', strtotime($apr->APR));
            $interval_apr   = date("d", strtotime($apr->APR));
            $data['apr']    = round(($interval_apr / $tgl_akhir_apr) * 100, 2);
        }
        
        $mei            = $this->Administrator_model->get_data_progres_chart_mei($id_sub_ruang, $tahun);
        if (empty(($mei->MEI))) {
            $data['mei']    = 0;
        } else {
            $tgl_akhir_mei  = date('t', strtotime($mei->MEI));
            $interval_mei   = date("d", strtotime($mei->MEI));
            $data['mei']    = round(($interval_mei / $tgl_akhir_mei) * 100, 2);
        }
        
        $jun            = $this->Administrator_model->get_data_progres_chart_jun($id_sub_ruang, $tahun);
        if (empty(($jun->JUN))) {
            $data['jun']    = 0;
        } else {
            $tgl_akhir_jun  = date('t', strtotime($jun->JUN));
            $interval_jun   = date("d", strtotime($jun->JUN));
            $data['jun']    = round(($interval_jun / $tgl_akhir_jun) * 100, 2);
        }

        $jul            = $this->Administrator_model->get_data_progres_chart_jul($id_sub_ruang, $tahun);
        if (empty(($jul->JUL))) {
            $data['jul']    = 0;
        } else {
            $tgl_akhir_jul  = date('t', strtotime($jul->JUL));
            $interval_jul   = date("d", strtotime($jul->JUL));
            $data['jul']    = round(($interval_jul / $tgl_akhir_jul) * 100, 2);
        }
        
        $agt            = $this->Administrator_model->get_data_progres_chart_agt($id_sub_ruang, $tahun);
        if (empty(($agt->AGT))) {
            $data['agt']    = 0;
        } else {
            $tgl_akhir_agt  = date('t', strtotime($agt->AGT));
            $interval_agt   = date("d", strtotime($agt->AGT));
            $data['agt']    = round(($interval_agt / $tgl_akhir_agt) * 100, 2);
        }
        
        $sep            = $this->Administrator_model->get_data_progres_chart_sep($id_sub_ruang, $tahun);
        if (empty(($sep->SEP))) {
            $data['sep']    = 0;
        } else {
            $tgl_akhir_sep  = date('t', strtotime($sep->SEP));
            $interval_sep   = date("d", strtotime($sep->SEP));
            $data['sep']    = round(($interval_sep / $tgl_akhir_sep) * 100, 2);
        }
        
        $okt            = $this->Administrator_model->get_data_progres_chart_okt($id_sub_ruang, $tahun);
        if (empty(($okt->OKT))) {
            $data['okt']    = 0;
        } else {
            $tgl_akhir_okt  = date('t', strtotime($okt->OKT));
            $interval_okt   = date("d", strtotime($okt->OKT));
            $data['okt']    = round(($interval_okt / $tgl_akhir_okt) * 100, 2);
        }

        $nov            = $this->Administrator_model->get_data_progres_chart_nov($id_sub_ruang, $tahun);
        if (empty(($nov->NOV))) {
            $data['nov']    = 0;
        } else {
            $tgl_akhir_nov  = date('t', strtotime($nov->NOV));
            $interval_nov   = date("d", strtotime($nov->NOV));
            $data['nov']    = round(($interval_nov / $tgl_akhir_nov) * 100, 2);
        }
        
        $des            = $this->Administrator_model->get_data_progres_chart_des($id_sub_ruang, $tahun);
        if (empty(($des->DES))) {
            $data['des']    = 0;
        } else {
            $tgl_akhir_des  = date('t', strtotime($des->DES));
            $interval_des   = date("d", strtotime($des->DES));
            $data['des']    = round(($interval_des / $tgl_akhir_des) * 100, 2);
        }

        $this->template->load('template', 'v_filter', $data);
    }
}
