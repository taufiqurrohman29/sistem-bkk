<?php
class Pengguna_model extends CI_Model
{
	function jumlah_admin()
	{
		$this->db->where('level_id','1');
		$this->db->from('user');
		return $this->db->count_all_results();
	}

	function jumlah_pegawai(){
		$this->db->where('level_id','2');
		$this->db->from('user');
		return $this->db->count_all_results();
	}

	function jumlah_siswa(){
		$this->db->where('level_id','3');
		$this->db->from('siswa');
		return $this->db->count_all_results();
	}


	function semua_pegawai(){
		$this->db->where('level_id','2');
		return $this->db->get('user');
	}


	function tambah_user($data){
		$this->db->insert('user', $data);
		 return $this->db->insert_id();
	}

	function get_data($id){
		$this->db->where('id_user', $id);
		return $this->db->get('user');
	}

	function update($id, $data)
	{
		$this->db->where('id_user', $id);
		$this->db->update('user', $data);
	}

	function delete($id)
	{
		$this->db->where('id_user', $id);
		$this->db->delete('user');
	}

	public function ambil_id_user($id)
	{
		$hasil = $this->db->where('id_user',$id)->get('user');
		if ($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return false;
		}
	}




}