<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Master_ruang extends CI_Controller {

	public function __construct(){
	   	parent::__construct();
	   	$this->load->library(array('template', 'form_validation', 'session')); 
	   	$this->load->helper(array('form', 'url', 'url_helper', 'file'));
	   	$this->load->model(array('Master_ruang_model', 'Auth_model'));
	}

	public function add()
	{
		if($this->Auth_model->logged_id())
		{
			$this->template->load('template','v_add_ruang');
		} else {
        	redirect('auth');
        }
	}
 
	public function data_ruang()
	{
		if($this->Auth_model->logged_id())
		{
			$data = array(
				'data_ruang' 	=> $this->Master_ruang_model->get_data_ruang(),
			);
	        $this->template->load('template','v_data_ruang',$data);
	    } else {
        	redirect('auth');
        }
	}






	// 
	// PROSES CRUD
	//

	// CREATE
	//
	public function create_ruang()
	{
		$data = array(
			'NAMA_RUANG' 		=> $this->input->post('nama_ruang'),
			'NAMA_KEPALA_RUANG' => $this->input->post('nama_kepala_ruang'),
		);

		$this->db->insert('TREF_RUANG', $data);
		$this->session->set_flashdata('message', "
	        <div class='x_content'>
          		<div class='alert alert-success alert-dismissible fade in' role='alert'>
	                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
	                </button>
	                <strong>Perhatian!</strong> <br> Data ruang berhasil disimpan.
	            </div>
	        </div>");
		redirect('master_ruang/add');
	}

	// UPDATE
	//
	public function update_ruang()
	{
		$data = array(
			'NAMA_RUANG' 		=> $this->input->post('nama_ruang'),
			'NAMA_KEPALA_RUANG' => $this->input->post('nama_kepala_ruang'),
		);

		$this->db->where('ID', $this->input->post('id'));
		$this->db->update('TREF_RUANG', $data);
		$this->session->set_flashdata('message', "
	        <div class='x_content'>
          		<div class='alert alert-success alert-dismissible fade in' role='alert'>
	                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
	                </button>
	                <strong>Perhatian!</strong> <br> Data ruang berhasil diperbarui.
	            </div>
	        </div>");
		redirect('master_ruang/data_ruang');
	}

	// DELETE
	//
	public function delete_ruang()
	{
		$this->db->where('ID', $this->input->post('id'));
		$this->db->delete('TREF_RUANG');
		$this->session->set_flashdata('message', "
	        <div class='x_content'>
          		<div class='alert alert-success alert-dismissible fade in' role='alert'>
	                <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span>
	                </button>
	                <strong>Perhatian!</strong> <br> Data ruang berhasil diperbarui.
	            </div>
	        </div>");
		redirect('master_ruang/data_ruang');
	}
 
}