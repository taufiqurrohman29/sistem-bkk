<?php
class Login_siswa extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('login_siswa_model');
	}

	function index(){
		$this->load->view('login_siswa');
	}

	function auth(){
		$email=htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);

        $cek_user=$this->login_siswa_model->auth_siswa($email,$password);
        if($cek_user->num_rows() > 0){ 
					$data=$cek_user->row_array();
        			$this->session->set_userdata('masuk',TRUE);
		        if($data['level']=='siswa'){ // akses siswa
		            $this->session->set_userdata('akses','siswa');
		            $this->session->set_userdata('ses_id',$data['id_siswa']);
		            $this->session->set_userdata('ses_id1',$data['id_jurusan']);
		            $this->session->set_userdata('ses_id2',$data['id_tahun']);
		            $this->session->set_userdata('ses_nama',$data['nama']);
		            $this->session->set_userdata('ses_email',$data['email']);
		            redirect('siswa');

		         }

		}else{  // jika username dan password tidak ditemukan atau salah
			$this->session->set_flashdata('message', 'Email atau Password salah');
			redirect('login_siswa');
		}
	}
	
	function logout()
	{
		$this->session->sess_destroy();
		redirect('login_siswa', 'refresh');
	}
	
} 
	
?>