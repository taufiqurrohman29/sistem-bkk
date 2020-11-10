<?php
class Daftar_model extends CI_Model
{
	function insert($data)
	{
		$this->db->insert('siswa', $data);
		 return $this->db->insert_id();
	}
}