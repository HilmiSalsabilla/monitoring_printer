<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Printer extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Printer_model');
    $this->load->library(['form_validation', 'session']);
    $this->load->helper(['url', 'form']);

    // Wajib login
    if (!$this->session->userdata('logged_in')) {
      redirect('login');
    }
  }

  // Boleh diakses semua (Admin dan User)
  public function index()
  {
    $data['printer'] = $this->Printer_model->get_all();

    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('printer/index', $data);
    $this->load->view('template/footer');
  }

  // Tambah printer (hanya Admin)
  public function tambah()
  {
    if ($this->session->userdata('level') !== 'Admin') {
      show_404();
    }

    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('printer/tambah');
    $this->load->view('template/footer');
  }

  public function store()
  {
    if ($this->session->userdata('level') !== 'Admin') {
      show_404();
    }

    $this->form_validation->set_rules('device_model', 'Device Model', 'required');
    $this->form_validation->set_rules('sn_printer', 'SN Printer', 'required');
    $this->form_validation->set_rules('ip_address', 'IP Address', 'required');
    $this->form_validation->set_rules('hostname', 'Hostname', 'required');
    $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');

    if ($this->form_validation->run() === FALSE) {
      $this->tambah();
    } else {
      $data = [
        "device_model" => $this->input->post("device_model"),
        "sn_printer"   => $this->input->post("sn_printer"),
        "ip_address"   => $this->input->post("ip_address"),
        "hostname"     => $this->input->post("hostname"),
        "lokasi"       => $this->input->post("lokasi")
      ];

      $this->Printer_model->insert($data);
      $this->session->set_flashdata('sukses', 'Printer berhasil ditambahkan!');
      redirect('printer');
    }
  }

  public function edit($id_printer)
  {
    if ($this->session->userdata('level') !== 'Admin') {
      show_404();
    }

    $data['printer'] = $this->Printer_model->get_by_id($id_printer);

    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('printer/edit', $data);
    $this->load->view('template/footer');
  }

  public function edit_store()
  {
    if ($this->session->userdata('level') !== 'Admin') {
      show_404();
    }

    $id = $this->input->post('id_printer');

    $this->form_validation->set_rules('device_model', 'Device Model', 'required');
    $this->form_validation->set_rules('sn_printer', 'SN Printer', 'required');
    $this->form_validation->set_rules('ip_address', 'IP Address', 'required');
    $this->form_validation->set_rules('hostname', 'Hostname', 'required');
    $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');

    if ($this->form_validation->run() === FALSE) {
      $this->edit($id);
    } else {
      $data = [
        "device_model" => $this->input->post("device_model"),
        "sn_printer"   => $this->input->post("sn_printer"),
        "ip_address"   => $this->input->post("ip_address"),
        "hostname"     => $this->input->post("hostname"),
        "lokasi"       => $this->input->post("lokasi")
      ];

      $this->Printer_model->update($id, $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success">Data printer berhasil diedit!</div>');
      redirect('printer');
    }
  }

  public function hapus($id_printer)
  {
    if ($this->session->userdata('level') !== 'Admin') {
      show_404();
    }

    $this->Printer_model->delete($id_printer);
    $this->session->set_flashdata('sukses', 'Printer berhasil dihapus!');
    redirect('printer');
  }
}

// End of file Printer.php
// Location: application/controllers/Printer.php
// Created by: Hilmi Salsabilla
// Modified by: Hilmi Salsabilla
// Last modified: 2023-10-01
// Version: 1.0.0
// Description: Controller untuk mengelola data printer, termasuk CRUD operasi.
// Note: Hanya Admin yang bisa menambah, mengedit, dan menghapus data printer.
//       User biasa hanya bisa melihat daftar printer.
//       Pastikan session 'logged_in' sudah di-set sebelum mengakses controller ini.
//       Gunakan model Printer_model untuk interaksi database.
//       Pastikan form validation sudah di-load untuk validasi input.
//       Gunakan flashdata untuk pesan sukses atau error.
//       Gunakan helper URL dan form untuk kemudahan.