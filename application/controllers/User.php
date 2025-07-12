<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
        
class User extends CI_Controller
{
  public function index()
  {
    $this->load->database();
    $data['user'] = $this->db->get('tb_user')->result();

    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('user/index', $data);
    $this->load->view('template/footer');
  }

  public function hapus($id_user)
  {
    $this->db->delete('tb_user', ['id_user' => $id_user]);
    $this->session->set_flashdata('sukses', 'Data User berhasil dihapus!');
    redirect('user/index', 'refresh');
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
    $this->form_validation->set_rules('email', 'Email', 'required',[
      'required' => '%s Harus Anda Isi!'
    ]);
    $this->form_validation->set_rules('nik', 'NIK', 'required',[
      'required' => '%s Harus Anda Isi!'
    ]);
    $this->form_validation->set_rules('password', 'Password', 'required',[
      'required' => '%s Harus Anda Isi!'
    ]);

    if($this->form_validation->run() == FALSE){
			//validation gagal
			$this->load->view('user/index');
		}else{
			//validation berhasil
			$data = [
				"nama" => $this->input->post("nama"),
				"email" => $this->input->post("email"),
				"nik" => $this->input->post("nik"),
				"password" => sha1($this->input->post("password")),
				"level" => 'User'
			];
    
		$this->db->insert('tb_user', $data);
		$this->session->set_flashdata('sukses','User sudah berhasil ditambahkan!');
		redirect('user','refresh');
    }
  }

  public function edit($id_user)
  {
    $data['user'] = $this->db->get_where('tb_user', ['id_user' => $id_user])->row();

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
    $this->form_validation->set_rules('email', 'Email', 'required',[
      'required' => '%s Harus Anda Isi!'
    ]);
    $this->form_validation->set_rules('nik', 'NIK', 'required',[
      'required' => '%s Harus Anda Isi!'
    ]);
    $this->form_validation->set_rules('password', 'Password', 'required',[
      'required' => '%s Harus Anda Isi!'
    ]);

    if($this->form_validation->run() == FALSE){
			//validattion gagal
			$data['user'] = $this->db->get_where('tb_user', ['id_user' => $id_user])->row();
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('user/edit', $data, FALSE);
			$this->load->view('template/footer');
		}else{
			//validation berhasil
			$data = [
        "id_user" => $this->input->post("id_user"),
				"nama" => $this->input->post("nama"),
				"email" => $this->input->post("email"),
				"nik" => $this->input->post("nik"),
				"password" => sha1($this->input->post("password"))
			];

			$this->db->update('tb_user', $data, ['id_user'=>$id_user]);
			$this->session->set_flashdata('pesan', 
      '<div id="pesan" class="alert alert-success" role="alert">
			Data berhasil di edit!
      </div>');
			redirect('user','refresh');
    }
  }

}

/* End of file  User.php */      