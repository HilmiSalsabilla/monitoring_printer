<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Login extends CI_Controller
{
	public function index() {
    // Menampilkan view login
    $this->load->view('login');
	}

	public function proses_login() {
    // Mengambil input NIK dan password
    $nik = $this->input->post('nik');
    $password = $this->input->post('password');
  
    // Mengambil data user berdasarkan NIK
    $this->db->where('nik', $nik);
    $user = $this->db->get('tb_user');
    
    // Mengecek apakah user ditemukan
    if ($user->num_rows() > 0) {
      // Mengambil password yang disimpan di database
      $stored_password = $user->row()->password;

        // Memverifikasi password yang dimasukkan dengan yang ada di database
      if (password_verify($password, $stored_password)) {
        // Jika password benar
        $data = [
            'id_user' => $user->row()->id_user,
            'nama' => $user->row()->nama,
            'email' => $user->row()->email,
            'nik' => $user->row()->nik,
            'level' => $user->row()->level
        ];

        // Menyimpan data user di session
        $this->session->set_userdata($data);

      echo "<pre>";
      print_r($this->session->userdata());
      echo "</pre>";
      exit;

        $this->session->set_flashdata('pesan', 'Anda berhasil login.');
        redirect('dashboard', 'refresh');
      } else {
        // Jika password salah
        $this->session->set_flashdata('error', 'Password anda salah!');
        redirect('login', 'refresh');
      }
    } else {
      // Jika NIK tidak ditemukan
      $this->session->set_flashdata('error', 'NIK tidak ditemukan!');
      redirect('login', 'refresh');
    }
}

	public function logout() {
    // Menghapus session saat logout
    $this->session->sess_destroy();
    redirect('login', 'refresh');
	}
}

/* End of file Login.php */
