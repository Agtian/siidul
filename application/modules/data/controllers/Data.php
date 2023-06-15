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
			if ($id_ruang_sub == 2 && $key == 2) {
				// Proses simpan nomor 3
				$result[] = array(
					'ID'            => $id[$key],
					'TANGGAL' 		=> $tanggal,
					'ID_RUANG_SUB' 	=> $id_ruang_sub,
					'ID_INDIKATOR' 	=> $id_indikator[$key],
					'ID_USER' 		=> $id_user,
					'TANGGAL' 		=> $tanggal,
					'NUM' 			=> $den[$key] * 4 / 60,
					'DEN' 			=> $den[$key],
				);
			} else if ($id_ruang_sub == 2 && $key == 3) {
				// Proses simpan nomor 3
				$result[] = array(
					'ID'            => $id[$key],
					'TANGGAL' 		=> $tanggal,
					'ID_RUANG_SUB' 	=> $id_ruang_sub,
					'ID_INDIKATOR' 	=> $id_indikator[$key],
					'ID_USER' 		=> $id_user,
					'TANGGAL' 		=> $tanggal,
					'NUM' 			=> $den[$key] * 7 / 60,
					'DEN' 			=> $den[$key],
				);
			} else if ($id_ruang_sub == 20 && $key == 3) {
				// Proses simpan nomor 4
				$result[] = array(
					'ID'            => $id[$key],
					'TANGGAL' 		=> $tanggal,
					'ID_RUANG_SUB' 	=> $id_ruang_sub,
					'ID_INDIKATOR' 	=> $id_indikator[$key],
					'ID_USER' 		=> $id_user,
					'TANGGAL' 		=> $tanggal,
					'NUM' 			=> $den[$key] * 30 / 60,
					'DEN' 			=> $den[$key],
				);
			} else {
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
}
