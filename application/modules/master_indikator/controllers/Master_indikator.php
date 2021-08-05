<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Master_indikator extends CI_Controller {

	public function __construct(){
	   	parent::__construct();
	   	$this->load->library(array('template', 'form_validation', 'session')); 
	   	$this->load->helper(array('form', 'url', 'url_helper', 'file'));
	   	$this->load->model(array('Master_indikator_model', 'Auth_model'));
	}

	public function add()
	{
		if($this->Auth_model->logged_id())
		{
			$data = array(
				'list_ruang' 			=> $this->Master_indikator_model->get_list_ruang(),
				'list_jenis_indikator' 	=> $this->Master_indikator_model->get_list_jenis_indikator(),
			);
			$this->template->load('template','v_add_indikator', $data);
		} else {
        	redirect('auth');
        }
	}
 
	public function data_indikator()
	{
		if($this->Auth_model->logged_id())
		{
			$id_ruang = $this->session->userdata("user_id_ruang");

			if (empty($id_ruang)) {
				$data = array(
					'list_ruang' 			=> $this->Master_indikator_model->get_list_ruang(),
				);
				$this->template->load('template','v_filter_data_indikator', $data);
			} else {
				$cek_data = $this->Master_indikator_model->get_data_indikator();

				if ($cek_data->num_rows() == 0) 
				{
					$this->session->set_flashdata('message', "
				        <div class='x_content'>
			          		<div class='alert alert-danger alert-dismissible fade in' role='alert'>
				                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
				                </button>
				                <strong>Perhatian!</strong> <br> Data tidak ditemukan.
				            </div>
				        </div>");
					$data = array(
						'list_ruang' 			=> $this->Master_indikator_model->get_list_ruang(),
					);
					$this->template->load('template','v_filter_data_indikator', $data);
				} else {
					$data = array(
						'list_ruang' 		=> $this->Master_indikator_model->get_list_ruang(),
						'data_indikator' 	=> $this->Master_indikator_model->get_data_indikator(),
					);
			        $this->template->load('template','v_data_indikator',$data);
				}
			}
		} else {
        	redirect('auth');
        }
	}






	// 
	// PROSES CRUD
	//

	// CREATE
	//
	public function create_indikator()
	{
		$data = array(
			'ID_RUANG' 				=> $this->input->post('id_ruang'),
			'ID_USER'				=> $this->input->post('id_user'),
			'ID_JENIS_INDIKATOR'	=> $this->input->post('id_jenis_indikator'),
			'DETAIL_INDIKATOR'		=> $this->input->post('detail_indikator'),
			'DETAIL_NUM'			=> $this->input->post('detail_num'),
			'DETAIL_DEN'			=> $this->input->post('detail_den'),
			'NILAI_STANDAR'			=> $this->input->post('nilai_standar'),
			'RUMUS_NUM'				=> $this->input->post('rumus_num'),
			'RUMUS_DEN'				=> $this->input->post('rumus_den'),
			'RUMUS_PERSEN'			=> $this->input->post('rumus_persen'),
			'F_STATUS'				=> '1',
		);

		$this->db->insert('TM_INDIKATOR', $data);
		$this->session->set_flashdata('message', "
	        <div class='x_content'>
          		<div class='alert alert-success alert-dismissible fade in' role='alert'>
	                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
	                </button>
	                <strong>Perhatian!</strong> <br> Data indikator berhasil disimpan.
	            </div>
	        </div>");
		redirect('master_indikator/add');
	}

	// UPDATE
	//
	public function update_indikator()
	{
		$data = array(
			'ID_RUANG' 				=> $this->input->post('id_ruang'),
			'ID_USER'				=> $this->input->post('id_user'),
			'ID_JENIS_INDIKATOR'	=> $this->input->post('id_jenis_indikator'),
			'DETAIL_INDIKATOR'		=> $this->input->post('detail_indikator'),
			'DETAIL_NUM'			=> $this->input->post('detail_num'),
			'DETAIL_DEN'			=> $this->input->post('detail_den'),
			'NILAI_STANDAR'			=> $this->input->post('nilai_standar'),
			'RUMUS_NUM'				=> $this->input->post('rumus_num'),
			'RUMUS_DEN'				=> $this->input->post('rumus_den'),
			'RUMUS_PERSEN'			=> $this->input->post('rumus_persen'),
			'F_STATUS'				=> '1',
		);

		$this->db->where('ID', $this->input->post('id'));
		$this->db->update('TM_INDIKATOR', $data);
		$this->session->set_flashdata('message', "
	        <div class='x_content'>
          		<div class='alert alert-success alert-dismissible fade in' role='alert'>
	                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
	                </button>
	                <strong>Perhatian!</strong> <br> Data indikator berhasil diperbarui.
	            </div>
	        </div>");
		redirect('master_indikator/data_indikator');
	}

	// DELETE
	//
	public function delete_indikator()
	{
		$this->db->set('F_STATUS', '2');
		$this->db->where('ID', $this->input->post('id'));
		$this->db->update('TM_INDIKATOR');
		$this->session->set_flashdata('message', "
	        <div class='x_content'>
          		<div class='alert alert-success alert-dismissible fade in' role='alert'>
	                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
	                </button>
	                <strong>Perhatian!</strong> <br> Data indikator berhasil diperbarui.
	            </div>
	        </div>");
		redirect('master_indikator/data_indikator');
	}
 
}