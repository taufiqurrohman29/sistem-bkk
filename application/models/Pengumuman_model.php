<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengumuman_model extends CI_Model
{
	function semua_pengumuman(){
		return $this->db->get('pengumuman');
	}

	function insert($data)
	{
		$this->db->insert('pengumuman', $data);
		 return $this->db->insert_id();
	}

	function get_data($id){
		$this->db->where('id_pengumuman', $id);
		return $this->db->get('pengumuman');
	}

	function update($id,$data)
	{
		$this->db->where('id_pengumuman', $id);
		$this->db->update('pengumuman', $data);
	}

	function delete($id)
	{
		$this->db->where('id_pengumuman', $id);
		$this->db->delete('pengumuman');
	}

	public function tampil_data($table)
	{
		return $this->db->get($table);
	}

	public function get_keyword($keyword){
		$this->db->select('*');
		$this->db->from('pengumuman');
		$this->db->like('judul_pengumuman', $keyword);
		return $this->db->get()->result();
	}

	public function update_pengumuman_aksi($id)
	{
		$data = [
			'judul_pengumuman' => $this->input->post('judul_pengumuman')

		];

		 $config['upload_path'] = './assets/file';
         $config['allowed_types'] = 'jpg|png|gif|tiff|doc|docx|pdf';
         $this->load->library('upload',$config);
         if($this->upload->do_upload('file')){
         	$data['file'] = $this->upload->data('file_name');
         }
         return $this->db->update('pengumuman', $data, ['id_pengumuman' => $id]);
	}




}