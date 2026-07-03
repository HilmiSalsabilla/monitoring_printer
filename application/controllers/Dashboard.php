<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Auth_Controller {

	public function index()
	{
		$this->db->where('level','User');
		$data['total_user'] = $this->db->count_all_results('tb_user');

		$data['total_printer'] = $this->db->count_all('tb_printer');

		$data['bulan'] = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'];

		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('dashboard', $data);
		$this->load->view('template/footer');
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */
