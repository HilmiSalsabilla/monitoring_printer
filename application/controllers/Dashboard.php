<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Auth_Controller {

	public function index()
	{
		$data['total_user'] = $this->User_model->count_by_level('User');
		$data['total_printer'] = $this->Printer_model->count_all();

		$data['bulan'] = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'];

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('dashboard', $data);
		$this->load->view('template/footer');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */