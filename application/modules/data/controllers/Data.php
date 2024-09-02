<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('template', 'form_validation', 'session'));
		$this->load->helper(array('form', 'url', 'url_helper', 'file', 'data_helper', 'views_helper'));
		$this->load->model(array('Data_model', 'Auth_model'));
	}

	public function input_data()
	{
		$id_ruang 		= $this->session->userdata("user_id_ruang");
		$id_ruang_sub 	= $this->session->userdata("user_id_ruang_sub");

		if ($this->Auth_model->logged_id()) {
			$data = array(
				'data_indikator' => $this->Data_model->get_data_indikator(),
			);
			$this->template->load('template', views_input($id_ruang), $data);
		} else {
			redirect('auth');
		}
	}

	function views()
	{
		$view = 'bankdarah/v_tabel_data';
		return $view;
	}

	public function ubah_data()
	{
		$id_ruang 		= $this->session->userdata("user_id_ruang");
		$id_ruang_sub 	= $this->session->userdata("user_id_ruang_sub");


		if ($this->Auth_model->logged_id()) {
			if (empty($_GET['tanggal'])) {
				//
				// Jika tidak ditemukan tanggal
				//
				$this->template->load('template', 'v_form_ubah');
			} else {
				//
				// Jika ditemukan tanggal
				//
				$tanggal 	= $_GET['tanggal'];

				$cek_data 	= $this->Data_model->cek_data_double($tanggal);

				if ($cek_data == 0) {
					//
					// Jika data tidak tersedia
					//
					$this->session->set_flashdata('message', "
			        <div class='x_content'>
			      		<div class='alert alert-danger alert-dismissible fade in' role='alert'>
			                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
			                </button>
			                <strong>Perhatian!</strong> <br> Data " . formatHariTanggal($tanggal) . " tidak tersedia.
			            </div>
			        </div>");
					redirect('data/ubah_data');
				} else {
					//
					// Jika data tersedia
					//
					$tanggal 		= $_GET['tanggal'];

					$data = array(
						'tanggal' 			=> $tanggal,
						'data_indikator' 	=> $this->Data_model->get_data_pertanggal($tanggal),
					);
					$this->template->load('template', views_ubah($id_ruang), $data);
				}
			}
		} else {
			redirect('auth');
		}
	}


	//
	// PROSES CRUD
	//

	//
	// Insert Indikator
	public function insert_indikator()
	{
		$tanggal 		= $this->input->post('tanggal');
		$id_ruang_sub 	= $this->input->post('id_ruang_sub');
		$id_indikator 	= $this->input->post('id_indikator');
		$id_user 		= $this->input->post('id_user');
		$num 			= $this->input->post('num');
		$den 			= $this->input->post('den');

		$cek_doube = $this->Data_model->cek_data_double($tanggal);

		if ($cek_doube == 0) {

			$result = array();
			foreach ($id_indikator as $key => $val) {
				$result[] = array(
					'TANGGAL' 		=> $tanggal,
					'ID_RUANG_SUB' 	=> $id_ruang_sub,
					'ID_INDIKATOR' 	=> $id_indikator[$key],
					'ID_USER' 		=> $id_user,
					'TANGGAL' 		=> $tanggal,
					'NUM' 			=> round($num[$key]),
					'DEN' 			=> $den[$key],
				);
			}

			// echo "<pre>";
			// print_r($result); die;

			$this->db->insert_batch('TR_INDIKATOR', $result);
			$this->session->set_flashdata('message', "
	        <div class='x_content'>
          		<div class='alert alert-success alert-dismissible fade in' role='alert'>
	                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
	                </button>
	                <strong>Perhatian!</strong> <br> Data " . formatHariTanggal($tanggal) . " berhasil disimpan.
	            </div>
	        </div>");
			redirect('data/input_data');
		} else {

			$this->session->set_flashdata('message', "
	        <div class='x_content'>
          		<div class='alert alert-danger alert-dismissible fade in' role='alert'>
	                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
	                </button>
	                <strong>Perhatian!</strong> <br> Data " . formatHariTanggal($tanggal) . " telah tersedia, gagal disimpan.
	            </div>
	        </div>");
			redirect('data/input_data');
		}
	}

	//
	// Update indikator
	public function update_indikator()
	{
		$id 			= $this->input->post('id');
		$tanggal 		= $this->input->post('tanggal');
		$id_ruang_sub 	= $this->input->post('id_ruang_sub');
		$id_indikator 	= $this->input->post('id_indikator');
		$id_user 		= $this->input->post('id_user');
		$num 			= $this->input->post('num');
		$den 			= $this->input->post('den');

		$cek_doube = $this->Data_model->cek_data_double($tanggal);

		$result = array();
		foreach ($id_indikator as $key => $val) {

			$result[] = array(
				'ID'            => $id[$key],
				'TANGGAL' 		=> $tanggal,
				'ID_RUANG_SUB' 	=> $id_ruang_sub,
				'ID_INDIKATOR' 	=> $id_indikator[$key],
				'ID_USER' 		=> $id_user,
				'TANGGAL' 		=> $tanggal,
				'NUM' 			=> round($num[$key]),
				'DEN' 			=> $den[$key],
			);
		}

		// print_r($result);
		// die;
		// die($this->db->last_query());


		$this->db->update_batch('TR_INDIKATOR', $result, 'ID');

		$this->session->set_flashdata('message', "
        <div class='x_content'>
      		<div class='alert alert-success alert-dismissible fade in' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
                </button>
                <strong>Perhatian!</strong> <br> Data " . formatHariTanggal($tanggal) . " berhasil diperbarui.
            </div>
        </div>");
		redirect('data/ubah_data');
	}


	//EVALUASI

	public function evaluasi()
	{
		$id_ruang 		= $this->session->userdata("user_id_ruang");

		if ($this->Auth_model->logged_id()) {
			$data = array(
				'data_indikator' => $this->Data_model->get_data_indikator(),
			);
			$this->template->load('template', views_evaluasi($id_ruang), $data);
		} else {
			redirect('auth');
		}
	}

	public function insert_evaluasi()
	{
		date_default_timezone_set('asia/jakarta');

		$tgl 		= $this->input->post('tanggal');
		$id_ruang_sub 	= $this->session->userdata('user_id_ruang_sub');
		$id_user 		= $this->session->userdata('user_id');
		$id_indikator 	= $this->input->post('id_indikator');
		$pendorong 			= $this->input->post('pendorong');
		$penghambat 			= $this->input->post('penghambat');

		$bulan = date("n", strtotime($tgl));
		$tahun = date("Y", strtotime($tgl));
		$bulan_str = formatNamaBulan(date("n", strtotime($tgl)));

		//print_r($bulan . '----' . $tahun . '---' . $bulan_str);
		//print_r($id_ruang_sub . '----' . $id_user . '---' . $id_indikator[0]);
		//die();

		$cek_double = $this->Data_model->cek_data_double_evaluasi($bulan, $tahun);

		$hari_ini = date('Y-m-d H:m:s');
		if ($cek_double == 0) {

			$result = array();
			foreach ($id_indikator as $key => $val) {
				$result[] = array(
					'FAKTOR_PENDORONG' 		=> $pendorong[$key],
					'FAKTOR_PENGHAMBAT' 		=> $penghambat[$key],
					'BULAN' 		=> $bulan,
					'TAHUN' 		=> $tahun,
					'CREATE_DATE' 		=> $hari_ini,
					'ID_INDIKATOR' 		=> $id_indikator[$key],
					'ID_RUANG_SUB' 		=> $id_ruang_sub,
					'ID_USER' 		=> $id_user

				);
			}

			// echo "<pre>";
			// print_r($result); die;

			$this->db->insert_batch('TR_EVALUASI', $result);
			$this->session->set_flashdata('message', "
	        <div class='x_content'>
          		<div class='alert alert-success alert-dismissible fade in' role='alert'>
	                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
	                </button>
	                <strong>Perhatian!</strong> <br> Data Bulan " . $bulan_str . " Tahun   "  . $tahun . " berhasil disimpan.
	            </div>
	        </div>");
			redirect('data/evaluasi');
		} else {

			$this->session->set_flashdata('message', "
	        <div class='x_content'>
          		<div class='alert alert-danger alert-dismissible fade in' role='alert'>
	                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
	                </button>
	                <strong>Perhatian!</strong> <br> Data " . $bulan_str . " Tahun   "  . $tahun . " telah tersedia, gagal disimpan.
	            </div>
	        </div>");
			redirect('data/evaluasi');
		}
	}

	function evaluasi_hasil()
	{
		$id_ruang 		= $this->session->userdata("user_id_ruang");

		if ($this->Auth_model->logged_id()) {

			$this->template->load('template', views_evaluasi_capaian($id_ruang));
		} else {
			redirect('auth');
		}
	}


	function get_evaluasi()
	{

		date_default_timezone_set('asia/jakarta');

		$tgl 		= $this->input->post('tanggal');
		$id_ruang_sub 	= $this->session->userdata('user_id_ruang_sub');


		$bulan = date("n", strtotime($tgl));
		$tahun = date("Y", strtotime($tgl));
		$bulan_str = formatNamaBulan(date("n", strtotime($tgl)));

		$datas = $this->Data_model->get_evaluasi($bulan, $tahun, $id_ruang_sub);

		$isi['tahun'] = $tahun;
		$isi['datas'] = $datas;
		$isi['bulan'] = $bulan_str;

		//$this->template->load('template', views_tabel_capaian_evaluasi($id_ruang_sub), $isi);
		$this->load->view(views_tabel_capaian_evaluasi($id_ruang_sub), $isi);
		//print_r($datas);
		//die();
	}
}
