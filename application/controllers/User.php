<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Auth_Controller
{
  public function __construct()
  {
    parent::__construct();
    // Entire User-management module is Admin-only.
    $this->require_admin();
  }

  public function index()
  {
    $data['user'] = $this->User_model->get_all();
    $data['trash_bin'] = $this->User_model->get_all_trash();

    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('user/index', $data);
    $this->load->view('template/footer');
  }

  public function tambah()
  {
    $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('user/tambah');
		$this->load->view('template/footer');
  }

  public function store()
  {
    $this->form_validation->set_rules('nama', 'Nama', 'required',[
      'required' => '%s Harus Anda Isi!'
    ]);
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_unique_email',[
      'required' => '%s Harus Anda Isi!',
      'valid_email' => '%s Harus berupa alamat email yang valid!'
    ]);
    $this->form_validation->set_rules('nik', 'NIK', 'required|callback_check_unique_nik',[
      'required' => '%s Harus Anda Isi!'
    ]);
    $this->form_validation->set_rules('password', 'Password', 'required',[
      'required' => '%s Harus Anda Isi!'
    ]);

    if($this->form_validation->run() == FALSE){
			//validation gagal
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('user/tambah');
			$this->load->view('template/footer');
		}else{
			//validation berhasil
			$data = [
				"nama" => $this->input->post("nama"),
				"email" => $this->input->post("email"),
				"nik" => $this->input->post("nik"),
        "password" => password_hash($this->input->post("password"), PASSWORD_DEFAULT),
				"level" => 'User'
			];

			$this->User_model->insert($data);
			$this->session->set_flashdata('sukses','User sudah berhasil ditambahkan!');
			redirect('user','refresh');
    }
  }

  public function edit($id_user)
  {
    $data['user'] = $this->User_model->get_by_id($id_user);

    $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('user/edit', $data, FALSE);
		$this->load->view('template/footer');
  }

  public function edit_store()
  {
    $id_user = $this->input->post('id_user');
    $this->form_validation->set_rules('nama', 'Nama', 'required',[
      'required' => '%s Harus Anda Isi!'
    ]);
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_unique_email',[
      'required' => '%s Harus Anda Isi!',
      'valid_email' => '%s Harus berupa alamat email yang valid!'
    ]);
    $this->form_validation->set_rules('nik', 'NIK', 'required|callback_check_unique_nik',[
      'required' => '%s Harus Anda Isi!'
    ]);
    $this->form_validation->set_rules('password', 'Password', 'required',[
      'required' => '%s Harus Anda Isi!'
    ]);

    if($this->form_validation->run() == FALSE){
			//validattion gagal
			$data['user'] = $this->User_model->get_by_id($id_user);
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('user/edit', $data, FALSE);
			$this->load->view('template/footer');
		}else{
			//validation berhasil
			$data = [
				"nama" => $this->input->post("nama"),
				"email" => $this->input->post("email"),
				"nik" => $this->input->post("nik"),
        "password" => password_hash($this->input->post("password"), PASSWORD_DEFAULT)
			];

			$this->User_model->update($id_user, $data);
			$this->session->set_flashdata('pesan',
      '<div id="pesan" class="alert alert-success" role="alert">
			Data berhasil di edit!
      </div>');
			redirect('user','refresh');
    }
  }

  public function hapus($id_user)
  {
    $user = $this->User_model->get_by_id($id_user);

    if (!$user) {
      $this->session->set_flashdata('error', 'Data user tidak ditemukan.');
      redirect('user/index', 'refresh');
      return;
    }

    $this->User_model->insert_trash($user);
    $this->User_model->delete($id_user);

    $this->session->set_flashdata('sukses', 'Data User berhasil dipindahkan ke TrashBin!');
    redirect('user/index', 'refresh');
  }

  public function trash_bin()
  {
    $data['trash_bin'] = $this->User_model->get_all_trash();

    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('user/trash_bin', $data);
    $this->load->view('template/footer');
  }

  public function restore($id_user)
  {
    $user_deleted = $this->User_model->get_trash_by_id($id_user);

    if (!$user_deleted) {
      $this->session->set_flashdata('error', 'Data user tidak ditemukan di trash bin.');
      redirect('user/index', 'refresh');
      return;
    }

    // Simpan data yang dihapus dari trash bin kembali ke tabel utama (tb_user)
    $this->User_model->insert($user_deleted);

    // Hapus data dari trash bin (tb_user_deleted)
    $this->User_model->delete_trash($id_user);

    $this->session->set_flashdata('sukses', 'Data user berhasil dipulihkan dari trash bin!');
    redirect('user/index', 'refresh');
  }

	// Callback for form_validation: ensures nik is unique so it isn't flagged as a duplicate of itself.
  public function check_unique_nik($str)
  {
    $id_user = $this->input->post('id_user');

    if ($this->User_model->nik_exists($str, $id_user)) {
      $this->form_validation->set_message('check_unique_nik', '{field} sudah digunakan oleh user lain!');
      return FALSE;
    }
    return TRUE;
  }

	// Callback for form_validation: ensures email is unique.
  public function check_unique_email($str)
  {
    $id_user = $this->input->post('id_user');

    if ($this->User_model->email_exists($str, $id_user)) {
      $this->form_validation->set_message('check_unique_email', '{field} sudah digunakan oleh user lain!');
      return FALSE;
    }
    return TRUE;
  }

}

/* End of file  User.php */
