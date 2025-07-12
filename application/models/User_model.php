<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    // Fungsi untuk verifikasi login berdasarkan NIK dan password
    public function verify_credentials($nik, $password)
    {
        $this->db->where('nik', $nik);
        $user = $this->db->get('tb_user')->row_array();

        // Jika user ditemukan dan password cocok
        if ($user && $user['password'] === $password) {
            return $user;
        }

        return false;
    }

    // Mendapatkan user berdasarkan NIK
    public function get_user_by_nik($nik)
    {
        $this->db->where('nik', $nik);
        return $this->db->get_where('tb_user')->row_array();
    }

    // Menyimpan data user baru
    public function save_user($data)
    {
        $this->db->insert('tb_user', $data);
        return $this->db->insert_id();
    }

    // Update user berdasarkan ID
    public function update_user($id_user, $data)
    {
        $this->db->where('id_user', $id_user);
        $this->db->update('tb_user', $data);
        return $this->db->affected_rows();
    }

    // Hapus user berdasarkan ID
    public function delete_user($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('tb_user');
        return $this->db->affected_rows();
    }

    // Mendapatkan semua data user
    public function get_all_users()
    {
        return $this->db->get('tb_user')->result();
    }

    // Mendapatkan total user berdasarkan level
    public function count_users_by_level($level)
    {
        $this->db->where('level', $level);
        return $this->db->count_all_results('tb_user');
    }
}

// End of file User_model.php
// Location: application/models/User_model.php