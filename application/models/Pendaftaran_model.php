<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model
{

	function tambah_pendaftaran($data){
		$this->db->insert('pendaftaran', $data);
		 return $this->db->insert_id();
	}

		function delete($id)
	{
		$this->db->where('id_pendaftaran', $id);
		return $this->db->delete('pendaftaran');
	}

	public function get_keyword($keyword){
	$this->db->select('*');
	$this->db->from('pendaftaran');
	$this->db->join('loker' , 'pendaftaran.id_loker = loker.id_loker');
	$this->db->join('siswa', 'pendaftaran.id_siswa = siswa.id_siswa');
	$this->db->like('nama_perusahaan', $keyword);
	$this->db->or_like('nama', $keyword);
	return $this->db->get()->result();
	}

	function get_all_pendaftaran(){
	$this->db->select('*');
	$this->db->from('pendaftaran');
	$this->db->join('loker' , 'pendaftaran.id_loker = loker.id_loker');
	$this->db->join('siswa', 'pendaftaran.id_siswa = siswa.id_siswa');
	return $this->db->get();
	}

   	function get_data($id){
	$this->db->select('pendaftaran.*, siswa.id_siswa, loker.*');
	$this->db->from('pendaftaran');
	$this->db->join('loker' , 'pendaftaran.id_loker = loker.id_loker');
	$this->db->join('siswa', 'pendaftaran.id_siswa = siswa.id_siswa');
	$this->db->where('id_pendaftaran', $id);
	return $this->db->get();
	}

		function update($id,$data)
	{
		$this->db->where('id_pendaftaran', $id);
		$this->db->update('pendaftaran', $data);
	}

	public  function add($id_loker){
		return $this->db->insert('pendaftaran', [
			'id_siswa' 			=> $this->session->userdata('id_siswa'),
			'id_loker'   	=> $id_loker,
			'nilai_smt_1'	=> $this->input->post('nilai_smt_1'),
			'nilai_smt_2'	=> $this->input->post('nilai_smt_2'),
			'nilai_smt_3'	=> $this->input->post('nilai_smt_3'),
			'nilai_smt_4'	=> $this->input->post('nilai_smt_4'),
			'nilai_smt_5'	=> $this->input->post('nilai_smt_5'),
			'nama_ayah'			=> $this->input->post('nama_ayah'),
			'nama_ibu'				=> $this->input->post('nama_ibu'),
			'no_hp_ortu'  => $this->input->post('no_hp_ortu'),
			'status'						=> 0,
			'tanggal'					=> date('Y-m-d')				
		]);
	}

	public function status($id_pendaftaran, $status){
		return $this->db->update('pendaftaran', ['status' => $status], ['id_pendaftaran' => $id_pendaftaran]);
	}





}