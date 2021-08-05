<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Master_user extends CI_Controller {

	public function __construct(){
	   	parent::__construct();
	   	$this->load->library(array('template', 'form_validation', 'session')); 
	   	$this->load->helper(array('form', 'url', 'url_helper', 'file'));
	   	$this->load->model(array('Master_user_model', 'Auth_model'));
	}

	public function add()
	{
		if($this->Auth_model->logged_id())
		{
			$data = array(
				'list_ruang' 	=> $this->Master_user_model->get_list_ruang(),
				'list_akses' 	=> $this->Master_user_model->get_list_akses(),
			);
			$this->template->load('template','v_add_user',$data);
		} else {
        	redirect('auth');
        }
	}
 
	public function data_user()
	{
		if($this->Auth_model->logged_id())
		{
			$data = array(
				'data_user' 	=> $this->Master_user_model->get_data_user(),
			);
	        $this->template->load('template','v_data_user',$data);
        } else {
        	redirect('auth');
        }
	}






	// 
	// PROSES CRUD
	//

	// CREATE
	//
	public function create_user()
	{
		$data = array(
			'ID_RUANG' 	=> $this->input->post('id_ruang'),
			'NAMA' 		=> $this->input->post('nama'),
			'USERNAME' 	=> $this->input->post('username'),
			'PASSWORD' 	=> md5($this->input->post('password')),
			'ID_AKSES' 	=> $this->input->post('id_akses'),
		);

		$this->db->insert('TM_USER', $data);
		$this->session->set_flashdata('message', "
	        <div class='x_content'>
          		<div class='alert alert-success alert-dismissible fade in' role='alert'>
	                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
	                </button>
	                <strong>Perhatian!</strong> <br> Data user berhasil disimpan.
	            </div>
	        </div>");
		redirect('master_user/add');
	}

	// UPDATE
	//
	public function update_user()
	{
		$data = array(
			'ID_RUANG' 	=> $this->input->post('id_ruang'),
			'NAMA' 		=> $this->input->post('nama'),
			'USERNAME' 	=> $this->input->post('username'),
			'PASSWORD' 	=> md5($this->input->post('password')),
			'ID_AKSES' 	=> $this->input->post('id_akses'),
		);

		$this->db->where('ID', $this->input->post('id'));
		$this->db->update('TM_USER', $data);
		$this->session->set_flashdata('message', "
	        <div class='x_content'>
          		<div class='alert alert-success alert-dismissible fade in' role='alert'>
	                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
	                </button>
	                <strong>Perhatian!</strong> <br> Data user berhasil diperbarui.
	            </div>
	        </div>");
		redirect('master_user/data_user');
	}

	// DELETE
	//
	public function delete_user()
	{
		$this->db->where('ID', $this->input->post('id'));
		$this->db->delete('TM_USER');
		$this->session->set_flashdata('message', "
	        <div class='x_content'>
          		<div class='alert alert-success alert-dismissible fade in' role='alert'>
	                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
	                </button>
	                <strong>Perhatian!</strong> <br> Data user berhasil diperbarui.
	            </div>
	        </div>");
		redirect('master_user/data_user');
	}
 
}