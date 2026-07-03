<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * All database access for tb_printer (active printers) and
 * tb_printer_deleted (trash bin) lives here. Controllers should call
 * these methods instead of touching $this->db directly.
 */
class Printer_model extends CI_Model
{
	protected $table        = 'tb_printer';
	protected $trash_table  = 'tb_printer_deleted';
	protected $primary_key  = 'id_printer';

	public function __construct()
	{
		parent::__construct();
	}

	// Active printers (tb_printer)
	public function get_all()
	{
		return $this->db->get($this->table)->result();
	}

	public function get_by_id($id_printer)
	{
		return $this->db->get_where($this->table, [$this->primary_key => $id_printer])->row();
	}

	public function count_all()
	{
		return $this->db->count_all($this->table);
	}

	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	public function update($id_printer, $data)
	{
		return $this->db->update($this->table, $data, [$this->primary_key => $id_printer]);
	}

	public function delete($id_printer)
	{
		return $this->db->delete($this->table, [$this->primary_key => $id_printer]);
	}

	// Trash bin (tb_printer_deleted)
	public function get_all_trash()
	{
		return $this->db->get($this->trash_table)->result();
	}

	public function get_trash_by_id($id_printer)
	{
		return $this->db->get_where($this->trash_table, [$this->primary_key => $id_printer])->row();
	}

	public function insert_trash($row)
	{
		return $this->db->insert($this->trash_table, $row);
	}

	public function delete_trash($id_printer)
	{
		return $this->db->delete($this->trash_table, [$this->primary_key => $id_printer]);
	}

	// Validation helpers

	/**
	 * Returns TRUE if another printer already uses this Serial Number.
	 * Pass $exclude_id (the record's own id_printer) when editing, so the
	 * record isn't compared against itself.
	 */
	public function sn_printer_exists($sn_printer, $exclude_id = null)
	{
		$this->db->where('sn_printer', $sn_printer);
		if ($exclude_id) {
			$this->db->where($this->primary_key . ' !=', $exclude_id);
		}
		return (bool) $this->db->get($this->table)->row();
	}

	/**
	 * Returns TRUE if another printer already uses this IP address.
	 * Pass $exclude_id (the record's own id_printer) when editing, so the
	 * record isn't compared against itself.
	 */
	public function ip_address_exists($ip_address, $exclude_id = null)
	{
		$this->db->where('ip_address', $ip_address);
		if ($exclude_id) {
			$this->db->where($this->primary_key . ' !=', $exclude_id);
		}
		return (bool) $this->db->get($this->table)->row();
	}
}

/* End of file Printer_model.php */
/* Location: ./application/models/Printer_model.php */
