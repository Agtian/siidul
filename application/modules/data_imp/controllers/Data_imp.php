<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_imp extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Auth_model', 'Imp_model'));
        $this->load->library(array('template', 'form_validation', 'session'));
        $this->load->helper(array('form', 'url', 'url_helper', 'file', 'data_helper', 'views_helper'));
    }

    public function rekap_imp_rs()
    {
        if ($this->Auth_model->logged_id()) {
            //$id_ruang_sub = 99;
            $tahun             = $this->input->post('tahun');
            //$query_i         = $this->Imp_model->get_det_ruang($id_ruang_sub);

            if (empty($tahun)) {

                $data = array(
                    'list_tahun'     => $this->Imp_model->get_tahun()
                );
                $this->template->load('template', 'v_index', $data);
            } else {

                // $query             = $this->Imp_model->get_det_indikator($query_i->ID_RUANG);

                $data = array(
                    //'id_ruang_sub'        => $id_ruang_sub,
                    'tahun'                => $tahun,
                    'list_tahun'         => $this->Imp_model->get_tahun(),
                    'capaian'            => $this->Imp_model->get_capaian_imp_rs($tahun),
                );

                //print_r($data);
                //die();
                $this->template->load('template', 'v_capaian', $data);
            }
        } else {
            redirect('auth');
        }
    }
    public function rekap_imp_unit()
    {
        if ($this->Auth_model->logged_id()) {
            //$id_ruang_sub = 99;
            $tahun             = $this->input->post('tahun');
            //$query_i         = $this->Imp_model->get_det_ruang($id_ruang_sub);

            if (empty($tahun)) {

                $data = array(
                    'list_tahun'     => $this->Imp_model->get_tahun()
                );
                $this->template->load('template', 'v_index_unit', $data);
            } else {

                // $query             = $this->Imp_model->get_det_indikator($query_i->ID_RUANG);

                $data = array(
                    //'id_ruang_sub'        => $id_ruang_sub,
                    'tahun'                => $tahun,
                    'list_tahun'         => $this->Imp_model->get_tahun(),
                    'capaian'            => $this->Imp_model->get_capaian_imp_unit($tahun),
                );

                //print_r($data);
                //die();
                $this->template->load('template', 'v_capaian', $data);
            }
        } else {
            redirect('auth');
        }
    }

    public function export_capaian_imp_rs($tahun)
    {


        if (empty($id_ruang_sub) || empty($tahun)) {

            $this->session->set_flashdata('message', "
	        <div class='x_content'>
          		<div class='alert alert-danger alert-dismissible fade in' role='alert'>
	                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
	                </button>
	                <strong>Perhatian!</strong> <br> Gagal record data !.
	            </div>
	        </div>");
            redirect('lap_rekap/capaian');
        } else {

            $data = array(
                'tahun'                => $tahun,
                'list_tahun'         => $this->Imp_model->get_tahun(),

                'capaian'            => $this->Imp_model->get_capaian_imp_unit($tahun),

                'tt_hari_jan'         => $this->Imp_model->get_tt_hari_jan($tahun),
                'tt_hari_feb'         => $this->Imp_model->get_tt_hari_feb($tahun),
                'tt_hari_mar'         => $this->Imp_model->get_tt_hari_mar($tahun),
                'tt_hari_apr'         => $this->Imp_model->get_tt_hari_apr($tahun),
                'tt_hari_mei'         => $this->Imp_model->get_tt_hari_mei($tahun),
                'tt_hari_jun'         => $this->Imp_model->get_tt_hari_jun($tahun),
                'tt_hari_jul'         => $this->Imp_model->get_tt_hari_jul($tahun),
                'tt_hari_agt'         => $this->Imp_model->get_tt_hari_agt($tahun),
                'tt_hari_sep'         => $this->Imp_model->get_tt_hari_sep($tahun),
                'tt_hari_okt'         => $this->Imp_model->get_tt_hari_okt($tahun),
                'tt_hari_nov'         => $this->Imp_model->get_tt_hari_nov($tahun),
                'tt_hari_des'         => $this->Imp_model->get_tt_hari_des($tahun),

            );

            $mpdf = new \Mpdf\Mpdf();
            // Define a default Landscape page size/format by name
            $mpdf = new \Mpdf\Mpdf([
                'mode'             => 'utf-8',
                'format'         => [215, 330],
                'orientation'     => 'L'
            ]);
            $html = $this->load->view(views_export_capaian(""), $data, true);
            $mpdf->WriteHTML("<h4><center>IMP - RS </center></h4>");
            $mpdf->WriteHTML($html);
            $mpdf->Output();
        }
    }
}
