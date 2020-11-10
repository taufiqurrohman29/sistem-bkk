<?php
class Login extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('login_model');
	}

	function index(){
		$this->load->view('login_admin');
	}

	function auth(){
		$email=htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);

        $cek_user=$this->login_model->auth_user($email,$password);
        if($cek_user->num_rows() > 0){ 
					$data=$cek_user->row_array();
        			$this->session->set_userdata('masuk',TRUE);
		        if($data['level']=='1'){ // akses admin
		            $this->session->set_userdata('akses','1');
		            $this->session->set_userdata('ses_id',$data['id_user']);
		            $this->session->set_userdata('ses_nama',$data['nama']);
		            $this->session->set_userdata('ses_email',$data['email']);
		            redirect('admin');

		         }elseif($data['level']=='2'){ //akses pegawai
		            $this->session->set_userdata('akses','2');
					$this->session->set_userdata('ses_id',$data['id_user']);
		            $this->session->set_userdata('ses_nama',$data['nama']);
		            $this->session->set_userdata('ses_email',$data['email']);
		            redirect('pegawai');
		         }

		}else{  // jika username dan password tidak ditemukan atau salah
			$this->session->set_flashdata('message', 'Email atau Password salah');
			redirect('login');
		}
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect('login', 'refresh');
	}
	
} 
	
?>