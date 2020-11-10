<?php
class Siswa_model extends CI_Model
{
function get_all_siswa(){
	$this->db->select('*');
	$this->db->from('siswa');
	$this->db->join('tahun' , 'siswa.id_tahun = tahun.id_tahun');
	$this->db->join('jurusan', 'siswa.id_jurusan = jurusan.id_jurusan');
	return $this->db->get();
	}

	function semua_siswa(){
		return $this->db->get('siswa');
	}


	function siswa_grafik($id_jurusan, $id_tahun){
		return $this->db->get_where('siswa', ['id_jurusan' => $id_jurusan, 'id_tahun' => $id_tahun, 'is_aktif' => 1])->num_rows();
	}

	function tambah_siswa($data){
		$this->db->insert('siswa', $data);
		 return $this->db->insert_id();
	}

	function delete($id)
	{
		$this->db->where('id_siswa', $id);
		$this->db->delete('siswa');
	}

	public function get_keyword($keyword){

		$this->db->select('*');
		$this->db->from('siswa');
		$this->db->join('tahun' , 'siswa.id_tahun = tahun.id_tahun');
		$this->db->join('jurusan', 'siswa.id_jurusan = jurusan.id_jurusan');
		$this->db->like('nama', $keyword);
		$this->db->or_like('tahun', $keyword);
		$this->db->or_like('nama_jurusan', $keyword);
		return $this->db->get()->result();
	}

	public function ambil_id_siswa($id)
	{
		$hasil = $this->db->where('id_siswa',$id)->get('siswa');
		if ($hasil->num_rows() > 0){
			return $hasil->result();
		} else{
			return false;
		}
	}

	function get_detail($id){
   	$this->db->select('*');
	$this->db->from('siswa');
	$this->db->join('tahun', 'siswa.id_tahun = tahun.id_tahun');
	$this->db->join('jurusan', 'siswa.id_jurusan = jurusan.id_jurusan');
	$this->db->where('id_siswa', $id);
	return $this->db->get();
   }

   	function get_data($id){
   	$this->db->select('*');
	$this->db->from('siswa');
	$this->db->join('tahun', 'siswa.id_tahun = tahun.id_tahun');
	$this->db->join('jurusan', 'siswa.id_jurusan = jurusan.id_jurusan');
	$this->db->where('id_siswa', $id);
	return $this->db->get();
   }

  public function update_siswa($id,$data){
				$this->db->where('id_siswa', $id);
				$this->db->update('siswa', $data);
   }


}