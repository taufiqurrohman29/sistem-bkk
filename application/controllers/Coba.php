<?php

class Coba extends CI_Controller{

	public function index(){

		$this->load->view('templates_user/header');
		$this->load->view('siswa/home');
		$this->load->view('templates_user/footer');
	}
}
?>