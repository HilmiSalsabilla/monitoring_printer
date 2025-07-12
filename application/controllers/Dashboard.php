<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		// Memuat model dan library yang diperlukan
		$this->load->library('session');
		$this->load->helper('url');
		
		// Memastikan user sudah login
		if (!$this->session->userdata('id_user')) {
			redirect('login');
		}
	}

	public function index()
	{

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('dashboard');
		$this->load->view('template/footer');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */