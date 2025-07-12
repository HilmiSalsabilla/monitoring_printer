<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Printer extends CI_Controller
{
  public function index()
  {
    $this->load->database();
    $data['printer'] = $this->db->get('tb_printer')->result();

    $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('printer/index', $data);
		$this->load->view('template/footer');
  }

  public function hapus($id_printer)
  {
    // $this->db->get_where('tb_printer', ['id_printer' => $id_printer])->row();
    $this->db->delete('tb_printer', ['id_printer' => $id_printer]);

		$this->session->set_flashdata('sukses','Data printer berhasil dihapus!');
		redirect('printer/index','refresh');
  }

  public function tambah()
  {
    $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('printer/tambah');
		$this->load->view('template/footer');
  }

  public function store()
  {  
    $this->form_validation->set_rules('device_model', 'Device Model', 'required',[
      'required' => '%s Harus Anda Isi!'
    ]);
    $this->form_validation->set_rules('sn_printer', 'SN Printer', 'required',[
      'required' => '%s Harus Anda Isi!'
    ]);
    $this->form_validation->set_rules('ip_address', 'IP Address', 'required',[
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
			$this->load->view('printer/index');
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
    $data['printer'] = $this->db->get_where('tb_printer', ['id_printer' => $id_printer])->row();

    $this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('printer/edit', $data, FALSE);
		$this->load->view('template/footer');
  }

  public function edit_store()
  {
		$id_printer = $this->input->post('id_printer');
    $this->form_validation->set_rules('device_model', 'Device Model', 'required',[
      'required' => '%s Harus Anda Isi!'
    ]);
    $this->form_validation->set_rules('sn_printer', 'SN Printer', 'required',[
      'required' => '%s Harus Anda Isi!'
    ]);
    $this->form_validation->set_rules('ip_address', 'IP Address', 'required',[
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

}


/* End of file Printer.php */
/* Location: ./application/controllers/Printer.php */