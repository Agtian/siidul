<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Lap_rekap extends CI_Controller {

	public function __construct() {
	   	parent::__construct();
	   	$this->load->library(array('template', 'form_validation', 'session'));
	   	$this->load->helper(array('form', 'url', 'url_helper', 'file', 'data_helper', 'views_helper'));
	   	$this->load->model(array('Rekap_model', 'Auth_model'));
	}

	public function bulanan()
	{
		if($this->Auth_model->logged_id())
		{
			$id_ruang_sub 	= $this->input->post('id_sub_ruang');
			$query 			= $this->Rekap_model->get_det_ruang($id_ruang_sub);

			$bulan 			= $this->input->post('bulan');
			$tahun 			= $this->input->post('tahun');
			$nm_bulan 		= formatNamaBulan($bulan);

			if (empty($bulan) && empty($tahun))
			{

				$data = array(
					'list_tahun' => $this->Rekap_model->get_tahun(),
					'list_ruang'	=> $this->Rekap_model->get_ruang(),
				);
				$this->template->load('template','v_form_filter_bulanan', $data);

			} else {

				$total_hari_bulan_now 	= $this->Rekap_model->get_hari_hari($id_ruang_sub, $bulan, $tahun)->num_rows();// jumlahHari($bulan);

				if ($total_hari_bulan_now == 0)
				{
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
						'get_date'		=> $this->Rekap_model->get_hari_hari($id_ruang_sub, $bulan, $tahun),
						'id_ruang_sub'	=> $id_ruang_sub,
						'id_ruang'		=> $query->ID_RUANG,

						'bulan'			=> $bulan,
						'tahun'			=> $tahun,
						'total_hari'	=> $total_hari_bulan_now,
						'list_ruang'	=> $this->Rekap_model->get_ruang(),
						'list_tahun' 	=> $this->Rekap_model->get_tahun(),
						'data_indikator'=> $this->Rekap_model->get_indikator_ruang($query->ID_RUANG),
						'rumus'			=> $this->Rekap_model->get_indikator_ruang($query->ID_RUANG)->row(),
					);
					$this->template->load('template', views_rekap_bulanan($query->ID_RUANG), $data);
				}
			}
		} else {
        	redirect('auth');
        }
	}

	public function export_bulanan($id_ruang_sub, $bulan, $tahun)
	{
		$query 			= $this->Rekap_model->get_det_ruang($id_ruang_sub);
		$id_ruang 		= $query->ID_RUANG;

		if (empty($id_ruang_sub) || empty($bulan) || empty($tahun))
		{

			$this->session->set_flashdata('message', "
	        <div class='x_content'>
          		<div class='alert alert-danger alert-dismissible fade in' role='alert'>
	                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
	                </button>
	                <strong>Perhatian!</strong> <br> Gagal record data !.
	            </div>
	        </div>");
	      	redirect('lap_rekap/bulanan');

		} else {

			$total_hari_bulan_now 	= $this->Rekap_model->get_hari_hari($id_ruang_sub, $bulan, $tahun)->num_rows();// jumlahHari($bulan);
			$data = array(
				'get_date'		=> $this->Rekap_model->get_hari_hari($id_ruang_sub, $bulan, $tahun),
				'id_ruang_sub'		=> $id_ruang_sub,
				'id_ruang'			=> $id_ruang,
				'bulan'			=> $bulan,
				'tahun'			=> $tahun,
				// 'total_terinput'=> $this->Rekap_model->get_total_perbulan($bulan),
				'list_ruang'	=> $this->Rekap_model->get_ruang(),
				'total_hari'	=> $total_hari_bulan_now,
				'list_tahun' 	=> $this->Rekap_model->get_tahun(),
				'data_indikator'=> $this->Rekap_model->get_indikator_ruang($id_ruang),
				'rumus'			=> $this->Rekap_model->get_indikator_ruang($id_ruang)->row(),
			);
			$mpdf = new \Mpdf\Mpdf();
			// Define a default Landscape page size/format by name
			$mpdf = new \Mpdf\Mpdf([
				'mode' 		=> 'utf-8', 
				'format' 	=> [215, 330],
				'orientation' => 'L'
			]);
			$html = $this->load->view(views_export_bulanan($id_ruang), $data, true);
			$mpdf->WriteHTML("<h4><center>Ruang : $query->NAMA_SUB_RUANG </center></h4>");
       		$mpdf->WriteHTML($html);
        	$mpdf->Output();

		}
	}

	public function triwulan()
	{
		if($this->Auth_model->logged_id())
		{
			$tahun 			= $this->input->post('tahun');
			$id_ruang_sub 	= $this->input->post('id_sub_ruang');
			$query_i 			= $this->Rekap_model->get_det_ruang($id_ruang_sub);

			if (empty($tahun))
			{

				$data = array(
					'list_tahun' 	=> $this->Rekap_model->get_tahun(),
					'list_ruang'	=> $this->Rekap_model->get_ruang(),
				);
				$this->template->load('template','v_triwulan_form', $data);

			} else {

				$query 			= $this->Rekap_model->get_det_indikator($query_i->ID_RUANG);
				$id_indikator  	= $query->ID;

				$data = array(
					'id_ruang_sub'		=> $id_ruang_sub,
					'tahun'				=> $tahun,
					'list_ruang'		=> $this->Rekap_model->get_ruang(),
					'list_tahun' 		=> $this->Rekap_model->get_tahun(),

					'triwulan_i'		=> $this->Rekap_model->get_triwulan_i($id_ruang_sub, $tahun),
					'triwulan_ii'		=> $this->Rekap_model->get_triwulan_ii($id_ruang_sub, $tahun),
					'triwulan_iii'		=> $this->Rekap_model->get_triwulan_iii($id_ruang_sub, $tahun),
					'triwulan_iv'		=> $this->Rekap_model->get_triwulan_iv($id_ruang_sub, $tahun),

					'tt_hari_jan' 		=> $this->Rekap_model->get_tt_hari_jan($tahun, $id_indikator),
					'tt_hari_feb' 		=> $this->Rekap_model->get_tt_hari_feb($tahun, $id_indikator),
					'tt_hari_mar' 		=> $this->Rekap_model->get_tt_hari_mar($tahun, $id_indikator),
					'tt_hari_apr' 		=> $this->Rekap_model->get_tt_hari_apr($tahun, $id_indikator),
					'tt_hari_mei' 		=> $this->Rekap_model->get_tt_hari_mei($tahun, $id_indikator),
					'tt_hari_jun' 		=> $this->Rekap_model->get_tt_hari_jun($tahun, $id_indikator),
					'tt_hari_jul' 		=> $this->Rekap_model->get_tt_hari_jul($tahun, $id_indikator),
					'tt_hari_agt' 		=> $this->Rekap_model->get_tt_hari_agt($tahun, $id_indikator),
					'tt_hari_sep' 		=> $this->Rekap_model->get_tt_hari_sep($tahun, $id_indikator),
					'tt_hari_okt' 		=> $this->Rekap_model->get_tt_hari_okt($tahun, $id_indikator),
					'tt_hari_nov' 		=> $this->Rekap_model->get_tt_hari_nov($tahun, $id_indikator),
					'tt_hari_des' 		=> $this->Rekap_model->get_tt_hari_des($tahun, $id_indikator),

				);
				$this->template->load('template', views_rekap_triwulan($query_i->ID_RUANG), $data);

			}	
		} else {
        	redirect('auth');
        }
	}

	public function export_triwulan($id_ruang_sub, $tahun)
	{

		$query_i 			= $this->Rekap_model->get_det_ruang($id_ruang_sub);
		$id_ruang 		= $query_i->ID_RUANG;

		if (empty($id_ruang_sub) || empty($tahun))
		{

			$this->session->set_flashdata('message', "
	        <div class='x_content'>
          		<div class='alert alert-danger alert-dismissible fade in' role='alert'>
	                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
	                </button>
	                <strong>Perhatian!</strong> <br> Gagal record data !.
	            </div>
	        </div>");
	      	redirect('lap_rekap/triwulan');

		} else {

			$query 			= $this->Rekap_model->get_det_indikator($id_ruang);
			$id_indikator  	= $query->ID;

			$data = array(
				'id_ruang_sub'		=> $id_ruang_sub,
				'tahun'				=> $tahun,
				'list_ruang'		=> $this->Rekap_model->get_ruang(),
				'list_tahun' 		=> $this->Rekap_model->get_tahun(),

				'triwulan_i'		=> $this->Rekap_model->get_triwulan_i($id_ruang_sub, $tahun),
				'triwulan_ii'		=> $this->Rekap_model->get_triwulan_ii($id_ruang_sub, $tahun),
				'triwulan_iii'		=> $this->Rekap_model->get_triwulan_iii($id_ruang_sub, $tahun),
				'triwulan_iv'		=> $this->Rekap_model->get_triwulan_iv($id_ruang_sub, $tahun),

				'tt_hari_jan' 		=> $this->Rekap_model->get_tt_hari_jan($tahun, $id_indikator),
				'tt_hari_feb' 		=> $this->Rekap_model->get_tt_hari_feb($tahun, $id_indikator),
				'tt_hari_mar' 		=> $this->Rekap_model->get_tt_hari_mar($tahun, $id_indikator),
				'tt_hari_apr' 		=> $this->Rekap_model->get_tt_hari_apr($tahun, $id_indikator),
				'tt_hari_mei' 		=> $this->Rekap_model->get_tt_hari_mei($tahun, $id_indikator),
				'tt_hari_jun' 		=> $this->Rekap_model->get_tt_hari_jun($tahun, $id_indikator),
				'tt_hari_jul' 		=> $this->Rekap_model->get_tt_hari_jul($tahun, $id_indikator),
				'tt_hari_agt' 		=> $this->Rekap_model->get_tt_hari_agt($tahun, $id_indikator),
				'tt_hari_sep' 		=> $this->Rekap_model->get_tt_hari_sep($tahun, $id_indikator),
				'tt_hari_okt' 		=> $this->Rekap_model->get_tt_hari_okt($tahun, $id_indikator),
				'tt_hari_nov' 		=> $this->Rekap_model->get_tt_hari_nov($tahun, $id_indikator),
				'tt_hari_des' 		=> $this->Rekap_model->get_tt_hari_des($tahun, $id_indikator),
			);
			$mpdf = new \Mpdf\Mpdf();
			// Define a default Landscape page size/format by name
			$mpdf = new \Mpdf\Mpdf([
				'mode' 		=> 'utf-8', 
				'format' 	=> [215, 330],
				'orientation' => 'P'
			]);
			$html = $this->load->view(views_export_triwulan($id_ruang), $data, true);
			$mpdf->WriteHTML("<h4><center>Ruang : $query_i->NAMA_SUB_RUANG </center></h4>");
       		$mpdf->WriteHTML($html);
        	$mpdf->Output();

		}
	}

	public function semester()
	{
		if($this->Auth_model->logged_id())
		{
			$tahun 			= $this->input->post('tahun');
			$id_ruang_sub 	= $this->input->post('id_sub_ruang');
			$query_i 		= $this->Rekap_model->get_det_ruang($id_ruang_sub);

			if (empty($tahun))
			{

				$data = array(
					'list_tahun' 	=> $this->Rekap_model->get_tahun(),
					'list_ruang'	=> $this->Rekap_model->get_ruang(),
				);
				$this->template->load('template','v_semester_form', $data);

			} else {

				$query 			= $this->Rekap_model->get_det_indikator($query_i->ID_RUANG);
				$id_indikator  	= $query->ID;

				$data = array(
					'id_ruang_sub'		=> $id_ruang_sub,
					'id_ruang'			=> $query_i->ID_RUANG,
					'tahun'				=> $tahun,
					'list_ruang'		=> $this->Rekap_model->get_ruang(),
					'list_tahun' 		=> $this->Rekap_model->get_tahun(),

					'semester_i'		=> $this->Rekap_model->get_semester_i($id_ruang_sub, $tahun),
					'semester_ii'		=> $this->Rekap_model->get_semester_ii($id_ruang_sub, $tahun),

					'tt_hari_jan' 		=> $this->Rekap_model->get_tt_hari_jan($tahun, $id_indikator),
					'tt_hari_feb' 		=> $this->Rekap_model->get_tt_hari_feb($tahun, $id_indikator),
					'tt_hari_mar' 		=> $this->Rekap_model->get_tt_hari_mar($tahun, $id_indikator),
					'tt_hari_apr' 		=> $this->Rekap_model->get_tt_hari_apr($tahun, $id_indikator),
					'tt_hari_mei' 		=> $this->Rekap_model->get_tt_hari_mei($tahun, $id_indikator),
					'tt_hari_jun' 		=> $this->Rekap_model->get_tt_hari_jun($tahun, $id_indikator),
					'tt_hari_jul' 		=> $this->Rekap_model->get_tt_hari_jul($tahun, $id_indikator),
					'tt_hari_agt' 		=> $this->Rekap_model->get_tt_hari_agt($tahun, $id_indikator),
					'tt_hari_sep' 		=> $this->Rekap_model->get_tt_hari_sep($tahun, $id_indikator),
					'tt_hari_okt' 		=> $this->Rekap_model->get_tt_hari_okt($tahun, $id_indikator),
					'tt_hari_nov' 		=> $this->Rekap_model->get_tt_hari_nov($tahun, $id_indikator),
					'tt_hari_des' 		=> $this->Rekap_model->get_tt_hari_des($tahun, $id_indikator),
				);
				$this->template->load('template', views_rekap_semester($query_i->ID_RUANG), $data);

			}	
		} else {
        	redirect('auth');
        }
	}

	public function export_semester($id_ruang_sub, $tahun)
	{

		$query 			= $this->Rekap_model->get_det_ruang($id_ruang_sub);
		$id_ruang 		= $query->ID_RUANG;

		if (empty($id_ruang_sub) || empty($tahun))
		{

			$this->session->set_flashdata('message', "
	        <div class='x_content'>
          		<div class='alert alert-danger alert-dismissible fade in' role='alert'>
	                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
	                </button>
	                <strong>Perhatian!</strong> <br> Gagal record data !.
	            </div>
	        </div>");
	      	redirect('lap_rekap/semester');

		} else {

			$query_i 			= $this->Rekap_model->get_det_indikator($id_ruang);
			$id_indikator  	= $query_i->ID;

			$data = array(
				'id_ruang_sub'		=> $id_ruang_sub,
				'tahun'				=> $tahun,
				'list_ruang'		=> $this->Rekap_model->get_ruang(),
				'list_tahun' 		=> $this->Rekap_model->get_tahun(),

				'semester_i'		=> $this->Rekap_model->get_semester_i($id_ruang_sub, $tahun),
				'semester_ii'		=> $this->Rekap_model->get_semester_ii($id_ruang_sub, $tahun),

				'tt_hari_jan' 		=> $this->Rekap_model->get_tt_hari_jan($tahun, $id_indikator),
				'tt_hari_feb' 		=> $this->Rekap_model->get_tt_hari_feb($tahun, $id_indikator),
				'tt_hari_mar' 		=> $this->Rekap_model->get_tt_hari_mar($tahun, $id_indikator),
				'tt_hari_apr' 		=> $this->Rekap_model->get_tt_hari_apr($tahun, $id_indikator),
				'tt_hari_mei' 		=> $this->Rekap_model->get_tt_hari_mei($tahun, $id_indikator),
				'tt_hari_jun' 		=> $this->Rekap_model->get_tt_hari_jun($tahun, $id_indikator),
				'tt_hari_jul' 		=> $this->Rekap_model->get_tt_hari_jul($tahun, $id_indikator),
				'tt_hari_agt' 		=> $this->Rekap_model->get_tt_hari_agt($tahun, $id_indikator),
				'tt_hari_sep' 		=> $this->Rekap_model->get_tt_hari_sep($tahun, $id_indikator),
				'tt_hari_okt' 		=> $this->Rekap_model->get_tt_hari_okt($tahun, $id_indikator),
				'tt_hari_nov' 		=> $this->Rekap_model->get_tt_hari_nov($tahun, $id_indikator),
				'tt_hari_des' 		=> $this->Rekap_model->get_tt_hari_des($tahun, $id_indikator),
			);

			$mpdf = new \Mpdf\Mpdf();
			// Define a default Landscape page size/format by name
			$mpdf = new \Mpdf\Mpdf([
				'mode' 			=> 'utf-8', 
				'format' 		=> [215, 330],
				'orientation' 	=> 'P'
			]);
			$html = $this->load->view(views_export_semester($id_ruang), $data, true);
			$mpdf->WriteHTML("<h4><center>Ruang : $query_i->NAMA_SUB_RUANG </center></h4>");
       		$mpdf->WriteHTML($html);
        	$mpdf->Output();

		}
	}

	public function tahunan()
	{
		if($this->Auth_model->logged_id())
		{
			$tahun 			= $this->input->post('tahun');
			$id_ruang_sub 	= $this->input->post('id_sub_ruang');
			$query_i 		= $this->Rekap_model->get_det_ruang($id_ruang_sub);

			if (empty($tahun) || empty($id_ruang_sub))
			{

				$data = array(
					'list_tahun' 	=> $this->Rekap_model->get_tahun(),
					'list_ruang'	=> $this->Rekap_model->get_ruang(),
				);
				$this->template->load('template','v_tahunan_form', $data);

			} else {

				$query 			= $this->Rekap_model->get_det_indikator($query_i->ID_RUANG);
				$id_indikator  	= $query->ID;

				$data = array(
					'id_ruang_sub'		=> $id_ruang_sub,
					'tahun'				=> $tahun,
					'list_ruang'		=> $this->Rekap_model->get_ruang(),
					'list_tahun' 		=> $this->Rekap_model->get_tahun(),

					'tahunan_i'			=> $this->Rekap_model->get_tahunan($id_ruang_sub, $tahun),

					'tt_hari_jan' 		=> $this->Rekap_model->get_tt_hari_jan($tahun, $id_indikator),
					'tt_hari_feb' 		=> $this->Rekap_model->get_tt_hari_feb($tahun, $id_indikator),
					'tt_hari_mar' 		=> $this->Rekap_model->get_tt_hari_mar($tahun, $id_indikator),
					'tt_hari_apr' 		=> $this->Rekap_model->get_tt_hari_apr($tahun, $id_indikator),
					'tt_hari_mei' 		=> $this->Rekap_model->get_tt_hari_mei($tahun, $id_indikator),
					'tt_hari_jun' 		=> $this->Rekap_model->get_tt_hari_jun($tahun, $id_indikator),
					'tt_hari_jul' 		=> $this->Rekap_model->get_tt_hari_jul($tahun, $id_indikator),
					'tt_hari_agt' 		=> $this->Rekap_model->get_tt_hari_agt($tahun, $id_indikator),
					'tt_hari_sep' 		=> $this->Rekap_model->get_tt_hari_sep($tahun, $id_indikator),
					'tt_hari_okt' 		=> $this->Rekap_model->get_tt_hari_okt($tahun, $id_indikator),
					'tt_hari_nov' 		=> $this->Rekap_model->get_tt_hari_nov($tahun, $id_indikator),
					'tt_hari_des' 		=> $this->Rekap_model->get_tt_hari_des($tahun, $id_indikator),
				);
				$this->template->load('template', views_rekap_tahunan($query_i->ID_RUANG), $data);

			}	
		} else {
        	redirect('auth');
        }
	}

	public function export_tahunan($id_ruang_sub, $tahun)
	{

		$query_i 			= $this->Rekap_model->get_det_ruang($id_ruang_sub);
		$id_ruang 			= $query_i->ID_RUANG;

		if (empty($tahun))
		{

			$this->session->set_flashdata('message', "
	        <div class='x_content'>
          		<div class='alert alert-danger alert-dismissible fade in' role='alert'>
	                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
	                </button>
	                <strong>Perhatian!</strong> <br> Gagal record data !.
	            </div>
	        </div>");
	      	redirect('lap_rekap/tahunan');

		} else {

			$query 			= $this->Rekap_model->get_det_indikator($id_ruang);
			$id_indikator  	= $query->ID;

			$data = array(
					'id_ruang_sub'		=> $id_ruang_sub,
					'tahun'				=> $tahun,
					'list_tahun' 		=> $this->Rekap_model->get_tahun(),

					'tahunan_i'			=> $this->Rekap_model->get_tahunan($id_ruang_sub, $tahun),

					'tt_hari_jan' 		=> $this->Rekap_model->get_tt_hari_jan($tahun, $id_indikator),
					'tt_hari_feb' 		=> $this->Rekap_model->get_tt_hari_feb($tahun, $id_indikator),
					'tt_hari_mar' 		=> $this->Rekap_model->get_tt_hari_mar($tahun, $id_indikator),
					'tt_hari_apr' 		=> $this->Rekap_model->get_tt_hari_apr($tahun, $id_indikator),
					'tt_hari_mei' 		=> $this->Rekap_model->get_tt_hari_mei($tahun, $id_indikator),
					'tt_hari_jun' 		=> $this->Rekap_model->get_tt_hari_jun($tahun, $id_indikator),
					'tt_hari_jul' 		=> $this->Rekap_model->get_tt_hari_jul($tahun, $id_indikator),
					'tt_hari_agt' 		=> $this->Rekap_model->get_tt_hari_agt($tahun, $id_indikator),
					'tt_hari_sep' 		=> $this->Rekap_model->get_tt_hari_sep($tahun, $id_indikator),
					'tt_hari_okt' 		=> $this->Rekap_model->get_tt_hari_okt($tahun, $id_indikator),
					'tt_hari_nov' 		=> $this->Rekap_model->get_tt_hari_nov($tahun, $id_indikator),
					'tt_hari_des' 		=> $this->Rekap_model->get_tt_hari_des($tahun, $id_indikator),
				);

			$mpdf = new \Mpdf\Mpdf();
			// Define a default Landscape page size/format by name
			$mpdf = new \Mpdf\Mpdf([
				'mode' 			=> 'utf-8', 
				'format' 		=> [215, 330],
				'orientation' 	=> 'L'
			]);
			$html = $this->load->view(views_export_tahunan($id_ruang), $data, true);
			$mpdf->WriteHTML("<h4><center>Ruang : $query_i->NAMA_SUB_RUANG </center></h4>");
       		$mpdf->WriteHTML($html);
        	$mpdf->Output();

		}
	}

	public function capaian()
	{
		if($this->Auth_model->logged_id())
		{
			$tahun 			= $this->input->post('tahun');
			$id_ruang_sub 	= $this->input->post('id_sub_ruang');
			$query_i 		= $this->Rekap_model->get_det_ruang($id_ruang_sub);

			if (empty($tahun) || empty($id_ruang_sub))
			{

				$data = array(
					'list_tahun' 	=> $this->Rekap_model->get_tahun(),
					'list_ruang'	=> $this->Rekap_model->get_ruang(),
				);
				$this->template->load('template','v_capaian_form', $data);

			} else {

				$query 			= $this->Rekap_model->get_det_indikator($query_i->ID_RUANG);
				$id_indikator  	= $query->ID;

				$data = array(
					'id_ruang_sub'		=> $id_ruang_sub,
					'tahun'				=> $tahun,
					'list_tahun' 		=> $this->Rekap_model->get_tahun(),
					'list_ruang'		=> $this->Rekap_model->get_ruang(),

					'capaian'			=> $this->Rekap_model->get_capaian($id_ruang_sub, $tahun),

					'tt_hari_jan' 		=> $this->Rekap_model->get_tt_hari_jan($tahun, $id_indikator),
					'tt_hari_feb' 		=> $this->Rekap_model->get_tt_hari_feb($tahun, $id_indikator),
					'tt_hari_mar' 		=> $this->Rekap_model->get_tt_hari_mar($tahun, $id_indikator),
					'tt_hari_apr' 		=> $this->Rekap_model->get_tt_hari_apr($tahun, $id_indikator),
					'tt_hari_mei' 		=> $this->Rekap_model->get_tt_hari_mei($tahun, $id_indikator),
					'tt_hari_jun' 		=> $this->Rekap_model->get_tt_hari_jun($tahun, $id_indikator),
					'tt_hari_jul' 		=> $this->Rekap_model->get_tt_hari_jul($tahun, $id_indikator),
					'tt_hari_agt' 		=> $this->Rekap_model->get_tt_hari_agt($tahun, $id_indikator),
					'tt_hari_sep' 		=> $this->Rekap_model->get_tt_hari_sep($tahun, $id_indikator),
					'tt_hari_okt' 		=> $this->Rekap_model->get_tt_hari_okt($tahun, $id_indikator),
					'tt_hari_nov' 		=> $this->Rekap_model->get_tt_hari_nov($tahun, $id_indikator),
					'tt_hari_des' 		=> $this->Rekap_model->get_tt_hari_des($tahun, $id_indikator),
				);
				$this->template->load('template', views_rekap_capaian($query_i->ID_RUANG), $data);

			}	
		} else {
        	redirect('auth');
        }
	}

	public function export_capaian($id_ruang_sub, $tahun)
	{

		$query_i 		= $this->Rekap_model->get_det_ruang($id_ruang_sub);
		$id_ruang 		= $query_i->ID_RUANG;

		if (empty($id_ruang_sub) || empty($tahun))
		{

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

			$query 			= $this->Rekap_model->get_det_indikator($id_ruang);
			$id_indikator  	= $query->ID;

			$data = array(
					'id_ruang_sub'		=> $id_ruang_sub,
					'tahun'				=> $tahun,
					'list_tahun' 		=> $this->Rekap_model->get_tahun(),

					'capaian'			=> $this->Rekap_model->get_capaian($id_ruang_sub, $tahun),

					'tt_hari_jan' 		=> $this->Rekap_model->get_tt_hari_jan($tahun, $id_indikator),
					'tt_hari_feb' 		=> $this->Rekap_model->get_tt_hari_feb($tahun, $id_indikator),
					'tt_hari_mar' 		=> $this->Rekap_model->get_tt_hari_mar($tahun, $id_indikator),
					'tt_hari_apr' 		=> $this->Rekap_model->get_tt_hari_apr($tahun, $id_indikator),
					'tt_hari_mei' 		=> $this->Rekap_model->get_tt_hari_mei($tahun, $id_indikator),
					'tt_hari_jun' 		=> $this->Rekap_model->get_tt_hari_jun($tahun, $id_indikator),
					'tt_hari_jul' 		=> $this->Rekap_model->get_tt_hari_jul($tahun, $id_indikator),
					'tt_hari_agt' 		=> $this->Rekap_model->get_tt_hari_agt($tahun, $id_indikator),
					'tt_hari_sep' 		=> $this->Rekap_model->get_tt_hari_sep($tahun, $id_indikator),
					'tt_hari_okt' 		=> $this->Rekap_model->get_tt_hari_okt($tahun, $id_indikator),
					'tt_hari_nov' 		=> $this->Rekap_model->get_tt_hari_nov($tahun, $id_indikator),
					'tt_hari_des' 		=> $this->Rekap_model->get_tt_hari_des($tahun, $id_indikator),

				);

			$mpdf = new \Mpdf\Mpdf();
			// Define a default Landscape page size/format by name
			$mpdf = new \Mpdf\Mpdf([
				'mode' 			=> 'utf-8', 
				'format' 		=> [215, 330],
				'orientation' 	=> 'L'
			]);
			$html = $this->load->view(views_export_capaian($id_ruang), $data, true);
			$mpdf->WriteHTML("<h4><center>Ruang : $query_i->NAMA_SUB_RUANG </center></h4>");
       		$mpdf->WriteHTML($html);
        	$mpdf->Output();

		}
	}

	public function capaian_ranap()
	{
		if($this->Auth_model->logged_id())
		{
			$tahun 			= date('Y');
			$id_ruang 		= "3";

			$query 			= $this->Rekap_model->get_det_indikator($id_ruang);
			$id_indikator  	= $query->ID;

			// var_dump($this->Rekap_model->get_capaian_ranap($tahun)->result()); die;

			$data = array(
				'tahun'				=> $tahun,
				'list_tahun' 		=> $this->Rekap_model->get_tahun(),
				'list_ruang'		=> $this->Rekap_model->get_ruang(),

				'capaian'			=> $this->Rekap_model->get_capaian_ranap($tahun),

				'tt_hari_jan' 		=> $this->Rekap_model->get_tt_hari_jan($tahun, $id_indikator),
				'tt_hari_feb' 		=> $this->Rekap_model->get_tt_hari_feb($tahun, $id_indikator),
				'tt_hari_mar' 		=> $this->Rekap_model->get_tt_hari_mar($tahun, $id_indikator),
				'tt_hari_apr' 		=> $this->Rekap_model->get_tt_hari_apr($tahun, $id_indikator),
				'tt_hari_mei' 		=> $this->Rekap_model->get_tt_hari_mei($tahun, $id_indikator),
				'tt_hari_jun' 		=> $this->Rekap_model->get_tt_hari_jun($tahun, $id_indikator),
				'tt_hari_jul' 		=> $this->Rekap_model->get_tt_hari_jul($tahun, $id_indikator),
				'tt_hari_agt' 		=> $this->Rekap_model->get_tt_hari_agt($tahun, $id_indikator),
				'tt_hari_sep' 		=> $this->Rekap_model->get_tt_hari_sep($tahun, $id_indikator),
				'tt_hari_okt' 		=> $this->Rekap_model->get_tt_hari_okt($tahun, $id_indikator),
				'tt_hari_nov' 		=> $this->Rekap_model->get_tt_hari_nov($tahun, $id_indikator),
				'tt_hari_des' 		=> $this->Rekap_model->get_tt_hari_des($tahun, $id_indikator),
			);
			$this->template->load('template', 'rawatinap/v_capaian_rawatInap', $data);
		
		} else {
        	redirect('auth');
        }
	}

	public function export_capaian_ranap()
	{
		$id_ruang 		= '3';
		$tahun 			= date('Y');

		$query 			= $this->Rekap_model->get_det_indikator($id_ruang);
		$id_indikator  	= $query->ID;

		$data = array(
				'tahun'				=> $tahun,
				'list_tahun' 		=> $this->Rekap_model->get_tahun(),

				'capaian'			=> $this->Rekap_model->get_capaian_ranap($tahun),

				'tt_hari_jan' 		=> $this->Rekap_model->get_tt_hari_jan($tahun, $id_indikator),
				'tt_hari_feb' 		=> $this->Rekap_model->get_tt_hari_feb($tahun, $id_indikator),
				'tt_hari_mar' 		=> $this->Rekap_model->get_tt_hari_mar($tahun, $id_indikator),
				'tt_hari_apr' 		=> $this->Rekap_model->get_tt_hari_apr($tahun, $id_indikator),
				'tt_hari_mei' 		=> $this->Rekap_model->get_tt_hari_mei($tahun, $id_indikator),
				'tt_hari_jun' 		=> $this->Rekap_model->get_tt_hari_jun($tahun, $id_indikator),
				'tt_hari_jul' 		=> $this->Rekap_model->get_tt_hari_jul($tahun, $id_indikator),
				'tt_hari_agt' 		=> $this->Rekap_model->get_tt_hari_agt($tahun, $id_indikator),
				'tt_hari_sep' 		=> $this->Rekap_model->get_tt_hari_sep($tahun, $id_indikator),
				'tt_hari_okt' 		=> $this->Rekap_model->get_tt_hari_okt($tahun, $id_indikator),
				'tt_hari_nov' 		=> $this->Rekap_model->get_tt_hari_nov($tahun, $id_indikator),
				'tt_hari_des' 		=> $this->Rekap_model->get_tt_hari_des($tahun, $id_indikator),
			);

		$mpdf = new \Mpdf\Mpdf();
		// Define a default Landscape page size/format by name
		$mpdf = new \Mpdf\Mpdf([
			'mode' 			=> 'utf-8', 
			'format' 		=> [215, 330],
			'orientation' 	=> 'L'
		]);
		$html = $this->load->view('rawatinap/export/v_export_capaian_ranap', $data, true);
   		$mpdf->WriteHTML($html);
    	$mpdf->Output();

		
	}

	public function triwulan_iii_dewas()
	{
		if($this->Auth_model->logged_id())
		{
			$tahun 			= $this->input->post('tahun');
			$id_ruang_sub 	= $this->input->post('id_sub_ruang');
			

			if (empty($tahun) || empty($id_ruang_sub))
			{

				$data = array(
					'list_tahun' 	=> $this->Rekap_model->get_tahun(),
					'list_ruang'	=> $this->Rekap_model->get_ruang(),
				);
				$this->template->load('template','v_triwulan_dewas_form', $data);

			} else if ($id_ruang_sub == 'rawat_inap') {

				$data = array(
					'tahun'				=> $tahun,
					'list_ruang'		=> $this->Rekap_model->get_ruang(),
					'list_tahun' 		=> $this->Rekap_model->get_tahun(),

					'triwulan'		=> $this->Rekap_model->get_triwulan_dewas($tahun),
				);
				$this->template->load('template', 'rawatinap/v_triwulan_iii_tabel_dewas', $data);

			} else {

				$query_i 		= $this->Rekap_model->get_det_ruang($id_ruang_sub);
				$query 			= $this->Rekap_model->get_det_indikator($query_i->ID_RUANG);
				$id_indikator  	= $query->ID;
				$id_ruang		= $query_i->ID_RUANG;

				$data = array(
					'id_ruang_sub'		=> $id_ruang_sub,
					'tahun'				=> $tahun,
					'list_ruang'		=> $this->Rekap_model->get_ruang(),
					'list_tahun' 		=> $this->Rekap_model->get_tahun(),
					'nama_ruang'		=> $query_i->NAMA_SUB_RUANG,

					'triwulan'			=> $this->Rekap_model->get_triwulan_dewas_one_room($id_ruang, $tahun),

					'tt_hari_jan' 		=> $this->Rekap_model->get_tt_hari_jan($tahun, $id_indikator),
					'tt_hari_feb' 		=> $this->Rekap_model->get_tt_hari_feb($tahun, $id_indikator),
					'tt_hari_mar' 		=> $this->Rekap_model->get_tt_hari_mar($tahun, $id_indikator),
					'tt_hari_apr' 		=> $this->Rekap_model->get_tt_hari_apr($tahun, $id_indikator),
					'tt_hari_mei' 		=> $this->Rekap_model->get_tt_hari_mei($tahun, $id_indikator),
					'tt_hari_jun' 		=> $this->Rekap_model->get_tt_hari_jun($tahun, $id_indikator),
					'tt_hari_jul' 		=> $this->Rekap_model->get_tt_hari_jul($tahun, $id_indikator),
					'tt_hari_agt' 		=> $this->Rekap_model->get_tt_hari_agt($tahun, $id_indikator),
					'tt_hari_sep' 		=> $this->Rekap_model->get_tt_hari_sep($tahun, $id_indikator),
					'tt_hari_okt' 		=> $this->Rekap_model->get_tt_hari_okt($tahun, $id_indikator),
					'tt_hari_nov' 		=> $this->Rekap_model->get_tt_hari_nov($tahun, $id_indikator),
					'tt_hari_des' 		=> $this->Rekap_model->get_tt_hari_des($tahun, $id_indikator),
				);
				$this->template->load('template', views_rekap_triwulan_table_dewas($query_i->ID_RUANG), $data);

			}	
		} else {
        	redirect('auth');
        }
	}

	public function export_triwulan_iii_form_dewas($id_ruang_sub, $tahun)
	{

		$query_i 			= $this->Rekap_model->get_det_ruang($id_ruang_sub);
		$id_ruang 			= $query_i->ID_RUANG;

		if (empty($id_ruang_sub) || empty($tahun))
		{

			$this->session->set_flashdata('message', "
	        <div class='x_content'>
          		<div class='alert alert-danger alert-dismissible fade in' role='alert'>
	                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
	                </button>
	                <strong>Perhatian!</strong> <br> Gagal record data !.
	            </div>
	        </div>");
	      	redirect('lap_rekap/triwulan');

		// } else if ($id_ruang_sub == 'rawat_inap') {

		} else {

			$query 			= $this->Rekap_model->get_det_indikator($id_ruang);
			$id_indikator  	= $query->ID;

			$data = array(
				'id_ruang_sub'		=> $id_ruang_sub,
				'tahun'				=> $tahun,
				'list_ruang'		=> $this->Rekap_model->get_ruang(),
				'list_tahun' 		=> $this->Rekap_model->get_tahun(),
				'nama_ruang'		=> $query_i->NAMA_SUB_RUANG,

				'triwulan'			=> $this->Rekap_model->get_triwulan_dewas_one_room($id_ruang, $tahun),

				'tt_hari_jan' 		=> $this->Rekap_model->get_tt_hari_jan($tahun, $id_indikator),
				'tt_hari_feb' 		=> $this->Rekap_model->get_tt_hari_feb($tahun, $id_indikator),
				'tt_hari_mar' 		=> $this->Rekap_model->get_tt_hari_mar($tahun, $id_indikator),
				'tt_hari_apr' 		=> $this->Rekap_model->get_tt_hari_apr($tahun, $id_indikator),
				'tt_hari_mei' 		=> $this->Rekap_model->get_tt_hari_mei($tahun, $id_indikator),
				'tt_hari_jun' 		=> $this->Rekap_model->get_tt_hari_jun($tahun, $id_indikator),
				'tt_hari_jul' 		=> $this->Rekap_model->get_tt_hari_jul($tahun, $id_indikator),
				'tt_hari_agt' 		=> $this->Rekap_model->get_tt_hari_agt($tahun, $id_indikator),
				'tt_hari_sep' 		=> $this->Rekap_model->get_tt_hari_sep($tahun, $id_indikator),
				'tt_hari_okt' 		=> $this->Rekap_model->get_tt_hari_okt($tahun, $id_indikator),
				'tt_hari_nov' 		=> $this->Rekap_model->get_tt_hari_nov($tahun, $id_indikator),
				'tt_hari_des' 		=> $this->Rekap_model->get_tt_hari_des($tahun, $id_indikator),
			);

			// var_dump(json_encode($this->Rekap_model->get_triwulan_dewas_one_room($id_ruang, $tahun)->result())); die;

			$mpdf = new \Mpdf\Mpdf();
			// Define a default Landscape page size/format by name
			$mpdf = new \Mpdf\Mpdf([
				'mode' 		=> 'utf-8', 
				'format' 	=> [215, 330],
				'orientation' => 'L'
			]);
			
			$html = $this->load->view(views_export_triwulan_iii_form_dewas($id_ruang), $data, true);
			// $mpdf->WriteHTML("<h4><center>Ruang : $query_i->NAMA_SUB_RUANG </center></h4>");
       		$mpdf->WriteHTML($html);
        	$mpdf->Output();

		}
	}
}