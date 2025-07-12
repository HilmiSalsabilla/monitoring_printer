<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper(['url', 'form']);

		// Proteksi akses: hanya user login yang bisa ke dashboard
		if (!$this->session->userdata('logged_in')) {
			redirect('login');
		}
	}

	public function index()
	{
		$data = [
			'nama_user' => $this->session->userdata('nama'), // atau 'nama_user' tergantung session
			'level'     => $this->session->userdata('level')
			// tambahkan data lain dari model kalau diperlukan
		];

		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('dashboard', $data);
		$this->load->view('template/footer', $data);
	}

	public function data_realtime()
	{
    $total_admin = $this->db->where('level', 'Admin')->count_all_results('tb_user');
    $total_user = $this->db->where('level', 'User')->count_all_results('tb_user');
    $total_printer = $this->db->count_all('tb_printer');

    $last_login_users = $this->db
        ->select('nama, level, last_login')
			->order_by('last_login', 'DESC')
			->limit(5)
			->get('tb_user')
			->result();

    echo json_encode([
			'total_admin' => $total_admin,
			'total_user' => $total_user,
			'total_printer' => $total_printer,
			'last_logins' => $last_login_users
    ]);
	}

}

// End of file Dashboard.php
// Location: application/controllers/Dashboard.php
// Created by: Hilmi Salsabilla
// Last modified: 2023-10-01