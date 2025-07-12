<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->library(['session', 'form_validation']);
		$this->load->helper(['url', 'form']);
	}

	public function index()
	{
		// Jika sudah login, langsung ke dashboard
		if ($this->session->userdata('id_user')) {
			redirect('dashboard');
		}
		$this->load->view('login');
	}

	public function proses_login()
	{
		$nik = $this->input->post('nik', true);
		$password = $this->input->post('password', true);

		// Validasi melalui User_model
		$user = $this->User_model->verify_credentials($nik, $password);

		if ($user) {
			// Simpan session
			$data = [
				'id_user'   => $user['id_user'],
				'nama'      => $user['nama'],
				'email'     => $user['email'],
				'nik'       => $user['nik'],
				'level'     => $user['level'],
				'logged_in' => true
			];
			$this->session->set_userdata($data);

			// ✅ Update kolom last_login
			$this->db->where('id_user', $user['id_user']);
			$this->db->update('tb_user', ['last_login' => date('Y-m-d H:i:s')]);

			$this->session->set_flashdata('pesan', 'Anda berhasil login.');
			redirect('dashboard');
		} else {
			$this->session->set_flashdata('error', 'NIK atau password salah!');
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}