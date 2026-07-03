<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function index()
	{
		// If already logged in, skip the login form entirely
		if ($this->session->userdata('nik')) {
			redirect('dashboard', 'refresh');
			return;
		}

		$this->load->view('login');
	}

	public function proses_login()
	{
		// Validasi input dari form login
		$this->form_validation->set_rules('nik', 'NIK', 'required',[
			'required' => '%s Harus di isi!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required', [
			'required' => '%s Harus di isi!'
		]);

		if ($this->form_validation->run() == FALSE) {
			// Validasi gagal, kembali ke halaman login dengan pesan error
			$this->session->set_flashdata('error', 'Harap isi NIK dan Password dengan benar.');
			redirect('login', 'refresh');
		} else {
			$nik = $this->input->post('nik');
			$password = $this->input->post('password');

			$user = $this->User_model->get_by_nik($nik);
			if ($user) {
				// Periksa apakah password sesuai
				if (password_verify($password, $user['password'])) {
						// Password benar
						$data = [
								// 'id_user' => $user['id_user'],	
								'nama' => $user['nama'],
								//'email' => $user['email'],
								'nik' => $user['nik'],
								'level' => $user['level']
						];

						$this->session->set_userdata($data);
						$this->session->set_flashdata('pesan', 'Anda berhasil login.');
						redirect('dashboard', 'refresh');
					} else {
						// Password salah
						// var_dump($user);
						$this->session->set_flashdata('error', 'Password Anda salah!');
						redirect('login', 'refresh');
				}
			} else {
					// User dengan NIK tertentu tidak ditemukan
					$this->session->set_flashdata('error', 'User dengan NIK tersebut tidak ditemukan.');
					redirect('login', 'refresh');
			}
		}
	}

	public function logout()
	{
			$this->session->sess_destroy();
			redirect('login', 'refresh');
	}
}
