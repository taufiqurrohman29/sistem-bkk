<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Loker_model extends CI_Model
{

	function get_all_loker(){
	$this->db->select('*');
	$this->db->from('loker');
	$this->db->join('pendaftaran' , 'loker.id_loker = pendaftaran.id_loker');
	$this->db->join('siswa', 'pendaftaran.id_siswa = siswa.id_siswa');
	return $this->db->get();
	}

	function semua_loker(){
		return $this->db->get('loker');
	}

	function insert($data)
	{
		$this->db->insert('loker', $data);
		 return $this->db->insert_id();
	}

	function jumlah_loker(){
		$this->db->from('loker');
		return $this->db->count_all_results();
	}

	function get_data($id){
		$this->db->where('id_loker', $id);
		return $this->db->get('loker');
	}

	function update($id,$data)
	{
		$this->db->where('id_loker', $id);
		$this->db->update('loker', $data);
	}

	function delete($id)
	{
		$this->db->where('id_loker', $id);
		$this->db->delete('loker');
	}

	public function tampil_data($table)
	{
		return $this->db->get($table);
	}

	public function get_keyword($keyword){
		$this->db->select('*');
		$this->db->from('loker');
		$this->db->like('nama_perusahaan', $keyword);
		$this->db->or_like('judul_loker', $keyword);
		return $this->db->get()->result();
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

		public function insert_data($data,$table)
	{
		$this->db->insert($table,$data);
	}

		public function ambil_id_loker($id)
	{
		$hasil = $this->db->where('id_loker',$id)->get('loker');
		if ($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return false;
		}
	}

		public function update_loker_aksi($id)
	{
		$data = [
			'nama_perusahaan' => $this->input->post('nama_perusahaan'),
			'judul_loker' => $this->input->post('judul_loker'),
			'deskripsi_loker' => $this->input->post('deskripsi_loker')

		];

		 $config['upload_path'] = './assets/image';
         $config['allowed_types'] = 'jpg|png|gif|tiff';
         $this->load->library('upload',$config);
         if($this->upload->do_upload('image')){
         	$data['image'] = $this->upload->data('file_name');
         }
         return $this->db->update('loker', $data, ['id_loker' => $id]);
	}




}