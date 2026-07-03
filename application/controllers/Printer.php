<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Printer extends Auth_Controller
{
  public function index()
  {
    $this->load->database();
    $data['printer'] = $this->db->get('tb_printer')->result();
    $data['trash_bin'] = $this->db->get('tb_printer_deleted')->result(); // Menambahkan data trash bin

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
				// "status" => 'non aktif',
				// "level" => 'user'
			];
    
		$this->db->insert('tb_printer', $data);
		$this->session->set_flashdata('sukses','Printer sudah berhasil ditambahkan!');
		redirect('printer','refresh');
    }
  }

  public function edit($id_printer)
  {
    $this->require_admin();

    $data['printer'] = $this->db->get_where('tb_printer', ['id_printer' => $id_printer])->row();

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
			$data['printer'] = $this->db->get_where('tb_printer', ['id_printer' => $id_printer])->row();
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('printer/edit', $data, FALSE);
			$this->load->view('template/footer');
		}else{
			//validation berhasil
			$data = [
        "id_printer" => $this->input->post("id_printer"),
				"device_model" => $this->input->post("device_model"),
				"sn_printer" => $this->input->post("sn_printer"),
				"ip_address" => $this->input->post("ip_address"),
				"hostname" => $this->input->post("hostname"),
				"lokasi" => $this->input->post("lokasi"),
			];

			$this->db->update('tb_printer', $data, ['id_printer'=>$id_printer]);
			$this->session->set_flashdata('pesan', 
      '<div id="pesan" class="alert alert-success" role="alert">
			Data berhasil di edit!
      </div>');
			redirect('printer','refresh');
    }
  }

  public function hapus($id_printer)
  {
    $this->require_admin();

    // $this->db->get_where('tb_printer', ['id_printer' => $id_printer])->row();
    // $this->db->delete('tb_printer', ['id_printer' => $id_printer]);

		// $this->session->set_flashdata('sukses','Data printer berhasil dihapus!');
		// redirect('printer/index','refresh');
    
    $printer = $this->db->get_where('tb_printer', ['id_printer' => $id_printer])->row();

    if (!$printer) {
      $this->session->set_flashdata('error', 'Data printer tidak ditemukan.');
      redirect('printer/index', 'refresh');
      return;
    }

    // Simpan data yang dihapus ke trash bin (tb_printer_deleted)
    $this->db->insert('tb_printer_deleted', $printer);

    // Hapus data dari tabel utama (tb_printer)
    $this->db->delete('tb_printer', ['id_printer' => $id_printer]);

    $this->session->set_flashdata('sukses', 'Data printer berhasil dipindahkan ke trash bin!');
    redirect('printer/index', 'refresh');
  }

  public function trash_bin()
  {
    $this->require_admin();

    $this->load->database();
    $data['trash_bin'] = $this->db->get('tb_printer_deleted')->result();

    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('printer/trash_bin', $data);
    $this->load->view('template/footer');
  }

  public function restore($id_printer)
  {
    $this->require_admin();

    $printer_deleted = $this->db->get_where('tb_printer_deleted', ['id_printer' => $id_printer])->row();

    if (!$printer_deleted) {
      $this->session->set_flashdata('error', 'Data printer tidak ditemukan di trash bin.');
      redirect('printer/index', 'refresh');
      return;
    }

    // Simpan data yang dihapus dari trash bin kembali ke tabel utama (tb_printer)
    $this->db->insert('tb_printer', $printer_deleted);

    // Hapus data dari trash bin (tb_printer_deleted)
    $this->db->delete('tb_printer_deleted', ['id_printer' => $id_printer]);

    $this->session->set_flashdata('sukses', 'Data printer berhasil dipulihkan dari trash bin!');
    redirect('printer/index', 'refresh');
  }

  // Callback for form_validation: ensures sn_printer is unique, so it isn't flagged as a duplicate of itself.
  public function check_unique_sn_printer($str)
  {
    $id_printer = $this->input->post('id_printer');

    $this->db->where('sn_printer', $str);
    if ($id_printer) {
      $this->db->where('id_printer !=', $id_printer);
    }
    $exists = $this->db->get('tb_printer')->row();

    if ($exists) {
      $this->form_validation->set_message('check_unique_sn_printer', '{field} sudah digunakan oleh printer lain!');
      return FALSE;
    }
    return TRUE;
  }

	// Callback for form_validation: ensures ip_address is unique.
  public function check_unique_ip_address($str)
  {
    $id_printer = $this->input->post('id_printer');

    $this->db->where('ip_address', $str);
    if ($id_printer) {
      $this->db->where('id_printer !=', $id_printer);
    }
    $exists = $this->db->get('tb_printer')->row();

    if ($exists) {
      $this->form_validation->set_message('check_unique_ip_address', '{field} sudah digunakan oleh printer lain!');
      return FALSE;
    }
    return TRUE;
  }


}


/* End of file Printer.php */
/* Location: ./application/controllers/Printer.php */
