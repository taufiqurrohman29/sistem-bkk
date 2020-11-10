<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jurusan_model extends CI_Model
{

	function semua_jurusan(){
		return $this->db->get('jurusan');
	}

	function get_all_jurusan(){
		return $this->db->get('jurusan');
	}

	function count_all_jurusan(){
		return $this->db->get('jurusan')->num_rows();
	}


	function insert($data)
	{
		$this->db->insert('jurusan', $data);
		 return $this->db->insert_id();
	}

	function get_data($id){
		$this->db->where('id_jurusan', $id);
		return $this->db->get('jurusan');
	}

	function update($id,$data)
	{
		$this->db->where('id_jurusan', $id);
		$this->db->update('jurusan', $data);
	}

	function delete($id)
	{
		$this->db->where('id_jurusan', $id);
		$this->db->delete('jurusan');
	}

	public function tampil_data($table)
	{
		return $this->db->get($table);
	}

	public function get_keyword($keyword){
		$this->db->select('*');
		$this->db->from('jurusan');
		$this->db->like('nama_jurusan', $keyword);
		$this->db->or_like('kode_jurusan',$keyword);
		return $this->db->get()->result();
	}




}