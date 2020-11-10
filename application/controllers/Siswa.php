<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {
	public function __construct(){
	    parent::__construct();
        $this->load->model('pengguna_model');
        $this->load->model('jurusan_model');
        $this->load->model('tahun_model');
        $this->load->model('tentang_bkk_model');
        $this->load->model('identitas_model');
        $this->load->model('perusahaan_model');
        $this->load->model('pengumuman_model');
        $this->load->model('loker_model');
        $this->load->model('siswa_model');
        $this->load->model('pendaftaran_model');
        if($this->session->userdata('level_id') != '3'){
            redirect('auth_siswa','refresh');
        }
    }

    public function index(){
        $data['title']       = 'Home';
        $data['tentang_bkk'] = $this->tentang_bkk_model->semua_tentang_bkk()->row();
        $this->template->siswa('index', $data);
    }


    // START :: LOKER
    public function loker()
    {
        $data['title']  = 'Loker Tersedia';   
        $data['loker']  = $this->loker_model->semua_loker()->result();
        $this->template->siswa('loker/index', $data);
    }
    public function detail_loker($id_loker)
    {
        $this->form_validation->set_rules('nilai_smt_1', 'Nilai Semester 1', 'required|trim');
        $this->form_validation->set_rules('nilai_smt_2', 'Nilai Semester 2', 'required|trim');
        $this->form_validation->set_rules('nilai_smt_3', 'Nilai Semester 3', 'required|trim');
        $this->form_validation->set_rules('nilai_smt_4', 'Nilai Semester 4', 'required|trim');
        $this->form_validation->set_rules('nilai_smt_5', 'Nilai Semester 5', 'required|trim');
        $this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'required|trim');
        $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required|trim');
        $this->form_validation->set_rules('no_hp_ortu', 'No Telp Orang Tua', 'required|trim');
        if($this->form_validation->run() == TRUE){
            if($this->pendaftaran_model->add($id_loker)){
                $this->session->set_flashdata('message', 'Data lamaran berhasil terkirim');
                redirect('siswa/pendaftaran');
            }
        }
        $data['title']  = 'Form Lamaran';
        $data['loker']  = $this->loker_model->get_data($id_loker)->row();
        $this->template->siswa('loker/detail_loker', $data);   
    }
    // END :: LOKER

    // START :: PENDAFTARAN
    public function pendaftaran(){
        $data['title'] = 'Daftar Pendaftaran';
        $this->db->where(['pendaftaran.id_siswa' => $this->session->userdata('id_siswa')]);
        $data['pendaftaran'] = $this->pendaftaran_model->get_all_pendaftaran()->result();
        $this->template->siswa('pendaftaran/index', $data);
    }
    public function batal_pendaftaran($id_pendaftaran){
        if($this->pendaftaran_model->delete($id_pendaftaran)){
            $this->session->set_flashdata('message', 'Pendaftaran berhasil di batalkan!');
            redirect('siswa/pendaftaran');
        }
    }
    public function detail_pendaftaran($id_pendaftaran){
        $data['title'] = 'Detail Pendaftaran';
        $data['pendaftaran'] = $this->pendaftaran_model->get_data($id_pendaftaran)->row();
        $this->template->siswa('pendaftaran/detail', $data);
    }
    // END :: PENDAFTARAN


    // START :: PENGUMUMAN
    public function pengumuman(){
        $data['title'] = 'Pengumuman';
        $data['pengumuman'] = $this->pengumuman_model->semua_pengumuman()->result();
        $this->template->siswa('pengumuman/index', $data);
    } 
    // END :: PENGUMUMAN



    // START :: TENTANG BKK
    public function tentang_bkk(){
        $data['title'] = 'Tentang BKK';
        $data['tentang_bkk'] = $this->tentang_bkk_model->semua_tentang_bkk()->row();
        $this->template->siswa('tentang_bkk/index', $data);
    }
    // END :: TENTANG BKK

    // START :: PROFILE
    public function profile()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('status_pekerjaan', 'Status Pekerjaan', 'required');
        $this->form_validation->set_rules('kontak', 'No Handphone', 'required');
        if ($this->form_validation->run() == TRUE) {
            $data = [
                'nama'              => $this->input->post('nama'),
                'status_pekerjaan'  => $this->input->post('status_pekerjaan'),
                'kontak'            => $this->input->post('kontak')

            ];

            if ($_FILES['picture']['name']) {
                $data['image']    = $this->_upload('picture');
            }
            $this->siswa_model->update_siswa($this->session->userdata('id_siswa'), $data);
            $this->session->set_flashdata('message', 'Profile berhasil di perbarui');
            redirect('siswa/profile');
        }
        $data['title']  = "Profile";
        $data['siswa'] = $this->db->get_where('siswa', ['email' => $this->session->userdata('email')])->row();
        $this->template->siswa('profile/index', $data);

    }
    public function change_password()
    {
        $this->form_validation->set_rules('passwordLama', 'Current Password', 'trim|required');
        $this->form_validation->set_rules('password1', 'New Password', 'trim|required');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|matches[password1]');
        if ($this->form_validation->run() == TRUE) {
            $result = $this->db->get_where('siswa', ['email' => $this->session->userdata('email')])->row();
            if (password_verify($this->input->post('passwordLama'), $result->password)) {
                $this->siswa_model->update_siswa($this->session->userdata('id_siswa'), [
                    'password'  => password_hash($this->input->post('password1'), PASSWORD_DEFAULT)
                ]);
                $this->session->set_flashdata('message', 'Change Password Berhasil');
            }else{
                $this->session->set_flashdata('failed', 'Password Lama Salah');
            }
            redirect('siswa/change_password');
        }
        $data['title']  = "Change Password";
        $this->template->siswa('profile/change_password', $data);        
    }
    // END PROFILE

    private function _upload($name){
        $config['upload_path'] = './assets/image/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']  = '5000';
        
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload($name)){
            return '';
        }else{
            $data = $this->upload->data();
            return $data['file_name'];
        }
    }
    
}