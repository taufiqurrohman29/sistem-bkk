<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tahun_model extends CI_Model
{



	function semua_tahun(){
		return $this->db->get('tahun');
	}

	function get_all_tahun(){
		return $this->db->get('tahun');
	}

	function insert($data)
	{
		$this->db->insert('tahun', $data);
		 return $this->db->insert_id();
	}

	function get_data($id){
		$this->db->where('id_tahun', $id);
		return $this->db->get('tahun');
	}

	function update($id,$data)
	{
		$this->db->where('id_tahun', $id);
		$this->db->update('tahun', $data);
	}

	function delete($id)
	{
		$this->db->where('id_tahun', $id);
		$this->db->delete('tahun');
	}

	public function tampil_data($table)
	{
		return $this->db->get($table);
	}

	public function get_keyword($keyword){
		$this->db->select('*');
		$this->db->from('tahun');
		$this->db->like('tahun', $keyword);
		return $this->db->get()->result();
	}


}