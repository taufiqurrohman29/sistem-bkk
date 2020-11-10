<?php

class Siswa extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('identitas_model');
		$this->load->model('loker_model');
		$this->load->model('tentang_bkk_model');

		if($this->session->userdata('akses') != 'siswa'){
			redirect('login_siswa', 'refresh');
		}
	}

	public function index(){
		$data['identitas'] = $this->identitas_model->semua_identitas()->result();
		$data['tentang_bkk'] = $this->tentang_bkk_model->semua_tentang_bkk()->result();
		

		$this->load->view('templates_user/header');
		$this->load->view('templates_user/identitas',$data);
		$this->load->view('templates_user/menu');
		$this->load->view('templates_user/banner');
		$this->load->view('templates_user/tentang_bkk',$data);
		$this->load->view('siswa/home');
		$this->load->view('templates_user/footer');
	}

	public function profile(){
		$data['identitas'] = $this->identitas_model->semua_identitas()->result();

		$this->load->view('templates_user/header');
		$this->load->view('templates_user/identitas',$data);
		$this->load->view('templates_user/menu');
		$this->db->where('id_siswa', $this->session->userdata('ses_id'));
		$data['siswa'] = $this->db->get('siswa')->result();
		$this->load->view('siswa/profile',$data);
		$this->load->view('templates_user/footer');		
	}

	public function loker(){
		$data['identitas'] = $this->identitas_model->semua_identitas()->result();
		$this->load->view('templates_user/header');
		$this->load->view('templates_user/identitas',$data);
		$this->load->view('templates_user/menu');
		$data['loker'] = $this->loker_model->tampil_data('loker')->result();
		$this->load->view('siswa/loker/loker',$data);
		$this->load->view('templates_user/footer');	
	}

	public function detail_loker($id) {

		$data['identitas'] = $this->identitas_model->semua_identitas()->result();
		$this->load->view('templates_user/header');
		$this->load->view('templates_user/identitas',$data);
		$this->load->view('templates_user/menu');
		$data['loker'] = $this->loker_model->ambil_id_loker($id);
		$this->load->view('siswa/loker/loker_detail',$data);
		$this->load->view('templates_user/footer');	
	}

	public function tentang_bkk(){
		$data['identitas'] = $this->identitas_model->semua_identitas()->result();
		$this->load->view('templates_user/header');
		$this->load->view('templates_user/identitas',$data);
		$this->load->view('templates_user/menu');
		$data['tentang_bkk'] = $this->tentang_bkk_model->semua_tentang_bkk()->result();
		$this->load->view('siswa/tentang_bkk/tentang_bkk',$data);
		$this->load->view('templates_user/footer');	
	}
}
?>