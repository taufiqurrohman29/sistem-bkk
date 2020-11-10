<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Identitas_model extends CI_Model
{
	function semua_identitas(){
		return $this->db->get('identitas');
	}

	function insert($data)
	{
		$this->db->insert('identitas', $data);
		 return $this->db->insert_id();
	}

	function get_data($id){
		$this->db->where('id_identitas', $id);
		return $this->db->get('identitas');
	}

	function update($id,$data)
	{
		$this->db->where('id_identitas', $id);
		$this->db->update('identitas', $data);
	}

	function delete($id)
	{
		$this->db->where('id_identitas', $id);
		$this->db->delete('identitas');
	}

	public function tampil_data($table)
	{
		return $this->db->get($table);
	}




}