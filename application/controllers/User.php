<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model');
    $this->load->library(['form_validation', 'session']);
    $this->load->helper(['url', 'form']);

    // Wajib login
    if (!$this->session->userdata('logged_in')) {
      redirect('login');
    }

    // Hanya admin yang boleh akses
    if ($this->session->userdata('level') !== 'Admin') {
      redirect('dashboard');
    }
  }

  public function index()
  {
    $data['user'] = $this->User_model->get_all_users();

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
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('nik', 'NIK', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('level', 'Level', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->tambah(); // kembali ke form
    } else {
      $data = [
        "nama"     => $this->input->post("nama"),
        "email"    => $this->input->post("email"),
        "nik"      => $this->input->post("nik"),
        "password" => password_hash($this->input->post("password"), PASSWORD_DEFAULT),
        "level"    => $this->input->post("level")
      ];

      $this->User_model->insert_user($data);
      $this->session->set_flashdata('sukses', 'User berhasil ditambahkan!');
      redirect('user');
    }
  }

  public function edit($id_user)
  {
    $data['user'] = $this->User_model->get_user_by_id($id_user);

    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('user/edit', $data);
    $this->load->view('template/footer');
  }

  public function edit_store()
  {
    $id_user = $this->input->post('id_user');

    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('nik', 'NIK', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() == FALSE) {
      $this->edit($id_user);
    } else {
      $data = [
        "nama"     => $this->input->post("nama"),
        "email"    => $this->input->post("email"),
        "nik"      => $this->input->post("nik"),
        "password" => password_hash($this->input->post("password"), PASSWORD_DEFAULT)
      ];

      $this->User_model->update_user($id_user, $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success">Data berhasil diedit!</div>');
      redirect('user');
    }
  }

  public function hapus($id_user)
  {
    $this->User_model->delete_user($id_user);
    $this->session->set_flashdata('sukses', 'User berhasil dihapus!');
    redirect('user');
  }
}

// End of file User.php
// Location: application/controllers/User.php
// Created by: Hilmi Salsabilla
// This controller handles user management, including adding, editing, and deleting users.
// It requires admin privileges to access and uses the User_model for database operations.
// It also ensures that only logged-in users can access these functionalities.
// The controller uses form validation to ensure data integrity when adding or editing users.
// The password is hashed before storing it in the database for security purposes.
// The controller also provides feedback to the user through flash messages after operations like adding, editing, or deleting users.
// The views for this controller are loaded with a header, sidebar, and footer template
// to maintain a consistent layout across the application.
// The controller is designed to be part of a CodeIgniter application, following its MVC structure