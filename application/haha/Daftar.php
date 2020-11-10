<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Daftar extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('daftar_model');
		$this->load->model('jurusan_model');
		$this->load->model('tahun_model');
	}

	function index(){
		
		$data['jurusan'] = $this->jurusan_model->semua_jurusan('jurusan')->result();
		$data['tahun'] = $this->tahun_model->semua_tahun('tahun')->result();
		$this->load->view('daftar',$data);
	}
	function validation(){
		$this->form_validation->set_rules('nama', 'nama', 'required|trim');
		$this->form_validation->set_rules('id_jurusan', 'nama_jurusan', 'required|trim');
		$this->form_validation->set_rules('id_tahun', 'tahun', 'required|trim');
		$this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required|trim');
		$this->form_validation->set_rules('tempat', 'tempat', 'required|trim');
		$this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'required|trim');
		$this->form_validation->set_rules('desa', 'desa', 'required|trim');
		$this->form_validation->set_rules('rt', 'rt', 'required|trim');
		$this->form_validation->set_rules('rw', 'rw', 'required|trim');
		$this->form_validation->set_rules('kecamatan', 'kecamatan', 'required|trim');
		$this->form_validation->set_rules('kabupaten', 'kabupaten', 'required|trim');
		$this->form_validation->set_rules('kodepos', 'kodepos', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('konfirmasi_password', 'Password Confirmation', 'required|matches[password]');
		$this->form_validation->set_rules('kontak', 'kontak', 'required|trim');
		if($this->form_validation->run())
		{
			$data = array(
				'nama'		=> $this->input->post('nama'),
				'id_jurusan'		=> $this->input->post('id_jurusan'),
				'id_tahun'		=> $this->input->post('id_tahun'),
				'jenis_kelamin'		=> $this->input->post('jenis_kelamin'),
				'tempat'		=> $this->input->post('tempat'),
				'tanggal_lahir'		=> $this->input->post('tanggal_lahir'),
				'desa'		=> $this->input->post('desa'),
				'rt'		=> $this->input->post('rt'),
				'rw'		=> $this->input->post('rw'),
				'kecamatan'		=> $this->input->post('kecamatan'),
				'kabupaten'		=> $this->input->post('kabupaten'),
				'kodepos'		=> $this->input->post('kodepos'),
				'email'		=> $this->input->post('email'),
				'password'	=> md5($this->input->post('password')),
				'kontak'		=> $this->input->post('kontak'),
				'image'		=> 'default.jpg',
				'status_pekerjaan'		=> 'Belum Bekerja',
				'level'		=> 'siswa'
				);
			$id = $this->daftar_model->insert($data);
			$this->session->set_flashdata('message', 'Selamat akun telah berhasil dibuat');
			redirect('daftar');
		}
		else
		{
			$this->session->set_flashdata('message', 'Akun gagal dibuat');
			redirect('daftar');
		}
	}
} 
?>