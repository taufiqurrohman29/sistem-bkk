<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_siswa extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('jurusan_model');
		$this->load->model('tahun_model');
	
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email','trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password','trim|required');
		if($this->form_validation->run() == false){
		$this->load->view('auth_siswa/login_siswa');
		} else {
			// validasinya succes
			$this->_login();
		}

	}


	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$siswa = $this->db->get_where('siswa', ['email' =>$email])->row_array();

		//jika usernya ada
		if($siswa){

			//jika usernya aktif

			if($siswa['is_aktif'] == 1){
				// cek password

				if(password_verify($password, $siswa['password'])){

					$data = [
						'id_siswa'	=> $siswa['id_siswa'],
						'email' 			=> $siswa['email'],
						'level_id' => $siswa['level_id']

					];
					$this->session->set_userdata($data);
					if($siswa['level_id'] == 3){

						redirect('siswa');
					} else {
					redirect('notfound');
					}

				} else {
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Password salah</div>');
		redirect('auth_siswa');
				}

			}else{
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email belum di aktivasi</div>');
		redirect('auth_siswa');
			}

		} else {
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email tidak terdaftar</div>');
		redirect('auth_siswa');
		}


	}

		public function registrasi_siswa()
	{

		$this->form_validation->set_rules('nama','Nama','required|trim');
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
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[siswa.email]',[
			'is_unique' => 'Email Sudah Terdaftar'

		]);
		$this->form_validation->set_rules('password1','Password','required|trim|min_length[3]|matches[password2]',[
			'matches' => 'password dont match!',
			'min_length' => 'password too short!'

		]);
		$this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');
		$this->form_validation->set_rules('kontak', 'kontak', 'required|trim');

		if($this->form_validation->run() == false){
		$data['jurusan'] = $this->jurusan_model->semua_jurusan('jurusan')->result();
		$data['tahun'] = $this->tahun_model->semua_tahun('tahun')->result();
		$this->load->view('auth_siswa/registrasi_siswa',$data);

		} else {
			$email = $this->input->post('email', true);
		$data = [
			'nama' => htmlspecialchars($this->input->post('nama' , true)),
			'id_jurusan' => htmlspecialchars($this->input->post('id_jurusan' , true)),
			'id_tahun' => htmlspecialchars($this->input->post('id_tahun' , true)),
			'jenis_kelamin' => htmlspecialchars($this->input->post('jenis_kelamin' , true)),
			'tempat' => htmlspecialchars($this->input->post('tempat' , true)),
			'tanggal_lahir' => htmlspecialchars($this->input->post('tanggal_lahir' , true)),
			'desa' => htmlspecialchars($this->input->post('desa' , true)),
			'rt' => htmlspecialchars($this->input->post('rt' , true)),
			'rw' => htmlspecialchars($this->input->post('rw' , true)),
			'kecamatan' => htmlspecialchars($this->input->post('kecamatan' , true)),
			'kabupaten' => htmlspecialchars($this->input->post('kabupaten' , true)),
			'kodepos' => htmlspecialchars($this->input->post('kodepos' , true)),
			'email' => htmlspecialchars($email),
			'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
			'kontak' => htmlspecialchars($this->input->post('kontak' , true)),
			'level_id' => 3,
			'image' => 'default.jpg',
			'is_aktif' => 0,
			'status_pekerjaan' => 'Belum Bekerja'
			
		];

		// siapkan token

		$token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

		$this->db->insert('siswa', $data);
		$this->db->insert('user_token', $user_token);

		$this->_sendEmail($token, 'verify');





		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Akun Berhasil Dibuat Silahkan Cek Email Anda Untuk Aktifasi Akun Anda</div>');
		redirect('auth_siswa');
	}

	}

	private function _sendEmail($token, $type)
	{
		$config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'turrohman31@gmail.com',
            'smtp_pass' => 'nabilah48',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];
        $this->email->initialize($config);

        $this->email->from('turrohman31@gmail.com', 'Sistem Informasi BKK Sympati Purworejo');
        $this->email->to($this->input->post('email'));

		if ($type == 'verify') {

		$this->email->subject('Verifikasi Akun Anda');
		$this->email->message('Click this link to verify your account : <a href="' . base_url() . 'auth_siswa/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
	} else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth_siswa/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {

    	$email = $this->input->get('email');
    	$token = $this->input->get('token');

    	$siswa = $this->db->get_where('siswa', ['email' =>$email])->row_array();

    	if($siswa){

    		$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

    		if($user_token){
    			if (time() - $user_token['date_created'] < (60 * 60 * 24)) {

    				$this->db->set('is_aktif', 1);
                    $this->db->where('email', $email);
                    $this->db->update('siswa');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">'.$email.' Telah Aktif! Please Login</div>');
			redirect('auth_siswa');	



    			} else{
    				$this->db->delete('siswa', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);
    			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Token Expired</div>');
		redirect('auth_siswa');	
    			}

    		} else{
    			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Token Invalid</div>');
		redirect('auth_siswa');
    		}

    	} else{
    		$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Aktifasi Akun Gagal! Wrong Email</div>');
		redirect('auth_siswa');
    	}




    }




	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('level_id');
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">You have been logged out</div>');
		redirect('auth_siswa');
	}


	public function forgotpassword()
	{

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
		$this->load->view('auth_siswa/forgot_password');
	} else {
		$email = $this->input->post('email');
            $siswa = $this->db->get_where('siswa', ['email' => $email, 'is_aktif' => 1])->row_array();

            if($siswa){

            	$token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Please check your email to reset your password!</div>');
                redirect('auth_siswa/forgotpassword');

            } else {
            	$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Email belum terdaftar atau belum aktif</div>');
		redirect('auth_siswa/forgotpassword');
            }
	}
	}

	    public function resetpassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $siswa = $this->db->get_where('siswa', ['email' => $email])->row_array();

        if ($siswa) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changepassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong token.</div>');
                redirect('auth_siswa');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong email.</div>');
            redirect('auth_siswa');
        }
    }


    public function changepassword()
    {

    	if (!$this->session->userdata('reset_email')) {
            redirect('auth_siswa');
        }
    	$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');

    	if ($this->form_validation->run() == false) {
    	$this->load->view('auth_siswa/change_password');
    	} else {
    		$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('siswa');

            $this->session->unset_userdata('reset_email');

            $this->db->delete('user_token', ['email' => $email]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed! Please login.</div>');
            redirect('auth_siswa');
    	}
    }







}

