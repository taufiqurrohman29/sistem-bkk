<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email','trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password','trim|required');
		if($this->form_validation->run() == false){
		$this->load->view('auth/login');
		} else {
			// validasinya succes
			$this->_login();
		}

	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' =>$email])->row_array();

		//jika usernya ada
		if($user){

			//jika usernya aktif

			if($user['is_aktif'] == 1){
				// cek password

				if(password_verify($password, $user['password'])){

					$data = [
						'email' => $user['email'],
						'level_id' => $user['level_id']

					];
					$this->session->set_userdata($data);
					if($user['level_id'] == 1){
						redirect('admin');
					} else {
					redirect('pegawai');
					}

				} else {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Password salah</div>');
		redirect('auth');
				}

			}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email belum di aktivasi</div>');
		redirect('auth');
			}

		} else {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email tidak terdaftar</div>');
		redirect('auth');
		}


	}

		public function registrasi()
	{
		$this->form_validation->set_rules('nama','Nama','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]',[
			'is_unique' => 'Email Sudah Terdaftar'

		]);
		$this->form_validation->set_rules('password1','Password','required|trim|min_length[3]|matches[password2]',[
			'matches' => 'password dont match!',
			'min_length' => 'password too short!'

		]);
		$this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');



		if($this->form_validation->run() == false){
		$this->load->view('auth/registrasi');
	} 	else {
		$data = [
			'nama' => htmlspecialchars($this->input->post('nama' , true)),
			'email' => htmlspecialchars($this->input->post('email' , true)),
			'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
			'level_id' => 2,
			'is_aktif' => 1,
			'image' => 'default.jpg'
		];

		$this->db->insert('user',$data);
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Akun Berhasil Dibuat Silahkan Login</div>');
		redirect('auth');
	}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('level_id');
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">You have been logged out</div>');
		redirect('auth');
	}
}
