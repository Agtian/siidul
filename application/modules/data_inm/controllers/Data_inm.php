<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_inm extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Auth_model', 'Inm_model'));
        $this->load->library(array('template', 'form_validation', 'session'));
        $this->load->helper(array('form', 'url', 'url_helper', 'file', 'data_helper', 'views_helper'));
    }

    public function rekap_bulanan()
    {
        if ($this->Auth_model->logged_id()) {

            $bulan             = $this->input->post('bulan');
            $tahun             = $this->input->post('tahun');
            $nm_bulan         = formatNamaBulan($bulan);

            if (empty($bulan) && empty($tahun)) {

                $data = array(
                    'list_tahun'    => $this->Inm_model->get_tahun(),
                );
                $this->template->load('template', 'v_index', $data);
            } else {

                $total_hari_bulan_now     = $this->Inm_model->get_hari_hari($bulan, $tahun)->num_rows(); // jumlahHari($bulan);

                if ($total_hari_bulan_now == 0) {
                    $this->session->set_flashdata('message', "
			        <div class='x_content'>
		          		<div class='alert alert-danger alert-dismissible fade in' role='alert'>
			                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
			                </button>
			                <strong>Perhatian!</strong> <br> Data belum tersedia, silahkan di input dulu data bulan $nm_bulan
			            </div>
			        </div>");
                    redirect('lap_rekap/bulanan');
                } else {
                    $data = array(
                        'get_date'          => $this->Inm_model->get_hari_hari($bulan, $tahun),

                        'bulan'             => $bulan,
                        'tahun'             => $tahun,
                        'total_hari'        => $total_hari_bulan_now,
                        'list_tahun'        => $this->Inm_model->get_tahun(),
                        'bulanan'           => $this->Inm_model->get_data_bulanan($bulan, $tahun),
                    );
                    $this->template->load('template', 'v_rekap_bulanan', $data);
                }
            }
        } else {
            redirect('auth');
        }
    }
}
