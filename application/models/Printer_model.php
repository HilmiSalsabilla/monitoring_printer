<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Printer_model extends CI_Model
{
  // Ambil semua data printer
  public function get_all()
  {
    return $this->db->get('tb_printer')->result();
  }

  // Ambil data printer berdasarkan ID
  public function get_by_id($id)
  {
    return $this->db->get_where('tb_printer', ['id_printer' => $id])->row();
  }

  // Tambah data printer baru
  public function insert($data)
  {
    return $this->db->insert('tb_printer', $data);
  }

  // Update data printer berdasarkan ID
  public function update($id, $data)
  {
    return $this->db->where('id_printer', $id)->update('tb_printer', $data);
  }

  // Hapus printer berdasarkan ID
  public function delete($id)
  {
    return $this->db->delete('tb_printer', ['id_printer' => $id]);
  }

  // Hitung semua data printer (untuk dashboard)
  public function count_all()
  {
    return $this->db->count_all('tb_printer');
  }
}

// End of file Printer_model.php
// Location: application/models/Printer_model.php