<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Auth_model', 'Administrator_model'));
        $this->load->library('template');
        $this->load->helper('url');
    }

    public function index()
    {
        $this->template->load('template', 'v_index');
    }
}
