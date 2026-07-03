<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * All database access for tb_user (active users) and tb_user_deleted
 * (trash bin) lives here. Controllers should call these methods instead
 * of touching $this->db directly.
 */
class User_model extends CI_Model
{
	protected $table        = 'tb_user';
	protected $trash_table  = 'tb_user_deleted';
	protected $primary_key  = 'id_user';

	public function __construct()
	{
		parent::__construct();
	}

	// Active users (tb_user)
	public function get_all()
	{
		return $this->db->get($this->table)->result();
	}

	public function get_by_id($id_user)
	{
		return $this->db->get_where($this->table, [$this->primary_key => $id_user])->row();
	}

	public function get_by_nik($nik)
	{
		return $this->db->get_where($this->table, ['nik' => $nik])->row_array();
	}

	public function count_by_level($level)
	{
		$this->db->where('level', $level);
		return $this->db->count_all_results($this->table);
	}

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function update($id_user, $data)
	{
		return $this->db->update($this->table, $data, [$this->primary_key => $id_user]);
	}

	public function delete($id_user)
	{
		return $this->db->delete($this->table, [$this->primary_key => $id_user]);
	}

	// Trash bin (tb_user_deleted)
	public function get_all_trash()
	{
		return $this->db->get($this->trash_table)->result();
	}

	public function get_trash_by_id($id_user)
	{
		return $this->db->get_where($this->trash_table, [$this->primary_key => $id_user])->row();
	}

	public function insert_trash($row)
	{
		return $this->db->insert($this->trash_table, $row);
	}

	public function delete_trash($id_user)
	{
		return $this->db->delete($this->trash_table, [$this->primary_key => $id_user]);
	}

	// Validation helpers

	/**
	 * Returns TRUE if another user already uses this NIK.
	 * Pass $exclude_id (the record's own id_user) when editing, so the
	 * record isn't compared against itself.
	 */
	public function nik_exists($nik, $exclude_id = null)
	{
		$this->db->where('nik', $nik);
		if ($exclude_id) {
			$this->db->where($this->primary_key . ' !=', $exclude_id);
		}
		return (bool) $this->db->get($this->table)->row();
	}

	/**
	 * Returns TRUE if another user already uses this email.
	 * Pass $exclude_id (the record's own id_user) when editing, so the
	 * record isn't compared against itself.
	 */
	public function email_exists($email, $exclude_id = null)
	{
		$this->db->where('email', $email);
		if ($exclude_id) {
			$this->db->where($this->primary_key . ' !=', $exclude_id);
		}
		return (bool) $this->db->get($this->table)->row();
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */
