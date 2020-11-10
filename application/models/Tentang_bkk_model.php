<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tentang_bkk_model extends CI_Model
{



	function semua_tentang_bkk(){
		return $this->db->get('tentang_bkk');
	}

	function insert($data)
	{
		$this->db->insert('tentang_bkk', $data);
		 return $this->db->insert_id();
	}

	function get_data($id){
		$this->db->where('id_tentang_bkk', $id);
		return $this->db->get('tentang_bkk');
	}

	function update($id,$data)
	{
		$this->db->where('id_tentang_bkk', $id);
		$this->db->update('tentang_bkk', $data);
	}

	function delete($id)
	{
		$this->db->where('id_tentang_bkk', $id);
		$this->db->delete('tentang_bkk');
	}

	public function tampil_data($table)
	{
		return $this->db->get($table);
	}




}