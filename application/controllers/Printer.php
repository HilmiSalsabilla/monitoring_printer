<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Printer extends Auth_Controller
{
  public function index()
  {
    $data['printer'] = $this->Printer_model->get_all();
    $data['trash_bin'] = $this->Printer_model->get_all_trash();

    $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('printer/index', $data);
		$this->load->view('template/footer');
  }

  public function tambah()
  {
    $this->require_admin();

    $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('printer/tambah');
		$this->load->view('template/footer');
  }

  public function store()
  {
    $this->require_admin();

    $this->form_validation->set_rules('device_model', 'Device Model', 'required',[
      'required' => '%s Harus Anda Isi!'
    ]);
    $this->form_validation->set_rules('sn_printer', 'SN Printer', 'required|callback_check_unique_sn_printer',[
      'required' => '%s Harus Anda Isi!'
    ]);
    $this->form_validation->set_rules('ip_address', 'IP Address', 'required|callback_check_unique_ip_address',[
      'required' => '%s Harus Anda Isi!'
    ]);
    $this->form_validation->set_rules('hostname', 'Hostname', 'required',[
      'required' => '%s Harus Anda Isi!'
    ]);
    $this->form_validation->set_rules('lokasi', 'Lokasi', 'required',[
      'required' => '%s Harus Anda Isi!'
    ]);

    if($this->form_validation->run() == FALSE){
			//validation gagal
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('printer/tambah');
			$this->load->view('template/footer');
		}else{
			//validation berhasil
			$data = [
				"device_model" => $this->input->post("device_model"),
				"sn_printer" => $this->input->post("sn_printer"),
				"ip_address" => $this->input->post("ip_address"),
				"hostname" => $this->input->post("hostname"),
				"lokasi" => $this->input->post("lokasi")
			];

			$this->Printer_model->insert($data);
			$this->session->set_flashdata('sukses','Printer sudah berhasil ditambahkan!');
			redirect('printer','refresh');
    }
  }

  public function edit($id_printer)
  {
    $this->require_admin();

    $data['printer'] = $this->Printer_model->get_by_id($id_printer);

    $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('printer/edit', $data, FALSE);
		$this->load->view('template/footer');
  }

  public function edit_store()
  {
		$this->require_admin();

		$id_printer = $this->input->post('id_printer');
    $this->form_validation->set_rules('device_model', 'Device Model', 'required',[
      'required' => '%s Harus Anda Isi!'
    ]);
    $this->form_validation->set_rules('sn_printer', 'SN Printer', 'required|callback_check_unique_sn_printer',[
      'required' => '%s Harus Anda Isi!'
    ]);
    $this->form_validation->set_rules('ip_address', 'IP Address', 'required|callback_check_unique_ip_address',[
      'required' => '%s Harus Anda Isi!'
    ]);
    $this->form_validation->set_rules('hostname', 'Hostname', 'required',[
      'required' => '%s Harus Anda Isi!'
    ]);
    $this->form_validation->set_rules('lokasi', 'Lokasi', 'required',[
      'required' => '%s Harus Anda Isi!'
    ]);

    if($this->form_validation->run() == FALSE){
			//validattion gagal
			$data['printer'] = $this->Printer_model->get_by_id($id_printer);
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('printer/edit', $data, FALSE);
			$this->load->view('template/footer');
		}else{
			//validation berhasil
			$data = [
				"device_model" => $this->input->post("device_model"),
				"sn_printer" => $this->input->post("sn_printer"),
				"ip_address" => $this->input->post("ip_address"),
				"hostname" => $this->input->post("hostname"),
				"lokasi" => $this->input->post("lokasi"),
			];

			$this->Printer_model->update($id_printer, $data);
			$this->session->set_flashdata('pesan', 'Data printer berhasil di edit!');
			redirect('printer','refresh');
    }
  }

  public function hapus($id_printer)
  {
    $this->require_admin();

    $printer = $this->Printer_model->get_by_id($id_printer);

    if (!$printer) {
      $this->session->set_flashdata('error', 'Data printer tidak ditemukan.');
      redirect('printer/index', 'refresh');
      return;
    }

    // Simpan data yang dihapus ke trash bin (tb_printer_deleted)
    $this->Printer_model->insert_trash($printer);

    // Hapus data dari tabel utama (tb_printer)
    $this->Printer_model->delete($id_printer);

    $this->session->set_flashdata('sukses', 'Data printer berhasil dipindahkan ke trash bin!');
    redirect('printer/index', 'refresh');
  }

  public function trash_bin()
  {
    $this->require_admin();

    $data['trash_bin'] = $this->Printer_model->get_all_trash();

    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('printer/trash_bin', $data);
    $this->load->view('template/footer');
  }

  public function restore($id_printer)
  {
    $this->require_admin();

    $printer_deleted = $this->Printer_model->get_trash_by_id($id_printer);

    if (!$printer_deleted) {
      $this->session->set_flashdata('error', 'Data printer tidak ditemukan di trash bin.');
      redirect('printer/index', 'refresh');
      return;
    }

    // Simpan data yang dihapus dari trash bin kembali ke tabel utama (tb_printer)
    $this->Printer_model->insert($printer_deleted);

    // Hapus data dari trash bin (tb_printer_deleted)
    $this->Printer_model->delete_trash($id_printer);

    $this->session->set_flashdata('sukses', 'Data printer berhasil dipulihkan dari trash bin!');
    redirect('printer/index', 'refresh');
  }

  /**
   * Callback for form_validation: ensures sn_printer is unique.
   * When editing (id_printer present in POST), the record's own current
   * row is excluded so it isn't flagged as a duplicate of itself.
   */
  public function check_unique_sn_printer($str)
  {
    $id_printer = $this->input->post('id_printer');

    if ($this->Printer_model->sn_printer_exists($str, $id_printer)) {
      $this->form_validation->set_message('check_unique_sn_printer', '{field} sudah digunakan oleh printer lain!');
      return FALSE;
    }
    return TRUE;
  }

  /**
   * Callback for form_validation: ensures ip_address is unique.
   * Same self-exclusion behaviour as check_unique_sn_printer().
   */
  public function check_unique_ip_address($str)
  {
    $id_printer = $this->input->post('id_printer');

    if ($this->Printer_model->ip_address_exists($str, $id_printer)) {
      $this->form_validation->set_message('check_unique_ip_address', '{field} sudah digunakan oleh printer lain!');
      return FALSE;
    }
    return TRUE;
  }

}


/* End of file Printer.php */
/* Location: ./application/controllers/Printer.php */
