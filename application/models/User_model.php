<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function get_user_by_nik($nik)
    {
        $this->db->where('nik', $nik);
        return $this->db->get_where('tb_user')->row_array();
    }

    public function save_user($data)
    {
        $this->db->insert('tb_user', $data);
        return $this->db->insert_id();
    }

    public function update_user($id_user, $data)
    {
        $this->db->where('id_user', $id_user);
        $this->db->update('tb_user', $data);
        return $this->db->affected_rows();
    }

    public function delete_user($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('tb_user');
        return $this->db->affected_rows();
    }

    // Anda dapat menambahkan fungsi lain yang sesuai dengan kebutuhan aplikasi
}

?>