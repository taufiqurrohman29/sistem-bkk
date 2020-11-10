<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perusahaan_model extends CI_Model
{

	function semua_perusahaan(){

		return $this->db->get('perusahaan');
	}

	function insert($data)
	{
		$this->db->insert('perusahaan', $data);
		 return $this->db->insert_id();
	}

	function get_data($id){
		$this->db->where('id_perusahaan', $id);
		return $this->db->get('perusahaan');
	}

	function update($id,$data)
	{
		$this->db->where('id_perusahaan', $id);
		$this->db->update('perusahaan', $data);
	}

	function delete($id)
	{
		$this->db->where('id_perusahaan', $id);
		$this->db->delete('perusahaan');
	}

	public function tampil_data($table)
	{
		return $this->db->get($table);
	}

	public function get_keyword($keyword){
		$this->db->select('*');
		$this->db->from('perusahaan');
		$this->db->like('nama_perusahaan', $keyword);
		return $this->db->get()->result();
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function get_all_perusahaan()
	{
		$this->db->select('*');
		$this->db->from('perusahaan');
		$this->db->join('loker', 'perusahaan.id_perusahaan = loker.id_perusahaan');
		return $this->db->get();
	}
	public function ambil_id_perusahaan($id)
	{
		$hasil = $this->db->where('id_perusahaan',$id)->get('perusahaan');
		if ($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return false;
		}
	}

	public function update_perusahaan_aksi($id)
	{
		$data = [
			'nama_perusahaan' => $this->input->post('nama_perusahaan')

		];

		 $config['upload_path'] = './assets/image';
         $config['allowed_types'] = 'jpg|png|gif|tiff';
         $this->load->library('upload',$config);
         if($this->upload->do_upload('image')){
         	$data['image'] = $this->upload->data('file_name');
         }
         return $this->db->update('perusahaan', $data, ['id_perusahaan' => $id]);
	}



}