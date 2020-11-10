<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {
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
		$this->load->library('form_validation');
		if($this->session->userdata('level_id') != '2'){
		redirect('auth','refresh');
	}
	
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates_pegawai/header');
		$this->load->view('templates_pegawai/sidebar',$data);
        $data['admin'] =$this->pengguna_model->jumlah_admin();
        $data['pegawai'] =$this->pengguna_model->jumlah_pegawai();
        $data['siswa'] =$this->pengguna_model->jumlah_siswa();
        $data['loker'] =$this->loker_model->jumlah_loker();
		$this->load->view('pegawai/index',$data);
		$this->load->view('templates_pegawai/footer');
	}

	public function edit()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        if ($this->form_validation->run() == false) {
        $this->load->view('templates_pegawai/header');
        $this->load->view('templates_pegawai/sidebar',$data);
        $this->load->view('pegawai/edit_profile', $data);
        $this->load->view('templates_pegawai/footer');
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('nama', $nama);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('pegawai/edit');
        }
    }

     public function changePassword()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
        $this->load->view('templates_pegawai/header');
        $this->load->view('templates_pegawai/sidebar',$data);
        $this->load->view('pegawai/changepassword', $data);
        $this->load->view('templates_pegawai/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('pegawai/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
                    redirect('pegawai/changepassword');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!</div>');
                    redirect('pegawai/changepassword');
                }
            }
        }
    }

        public function siswa() {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates_pegawai/header');
        $this->load->view('templates_pegawai/sidebar',$data);
        $data['siswa'] = $this->siswa_model->get_all_siswa()->result();
        $this->load->view('pegawai/siswa/siswa_view',$data);
        $this->load->view('templates_pegawai/footer');    
    }

        public function detail_siswa($id) {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates_pegawai/header');
        $this->load->view('templates_pegawai/sidebar',$data);
        $data['siswa'] = $this->siswa_model->get_detail($id)->result();
        $data['jurusan'] = $this->jurusan_model->semua_jurusan('jurusan')->result();
        $data['tahun'] = $this->tahun_model->semua_tahun('tahun')->result();
        $this->load->view('pegawai/siswa/siswa_detail',$data);
        $this->load->view('templates_pegawai/footer');
    }

        public function edit_siswa($id) {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates_pegawai/header');
        $this->load->view('templates_pegawai/sidebar',$data);
        $data['siswa'] = $this->siswa_model->get_data($id)->result();
        $data['jurusan'] = $this->db->get('jurusan')->result();
        $data['tahun'] = $this->db->get('tahun')->result();
        $this->load->view('pegawai/siswa/siswa_edit',$data);
        $this->load->view('templates_pegawai/footer');    
    }

    function update_siswa(){
        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
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
        $this->form_validation->set_rules('kontak', 'kontak', 'required|trim');
        $this->form_validation->set_rules('status_pekerjaan', 'status_pekerjaan', 'required|trim');

        if($this->form_validation->run())
        {
            $data = array(
                'nama'      => $this->input->post('nama'),
                'jenis_kelamin'     => $this->input->post('jenis_kelamin'),
                'tempat'        => $this->input->post('tempat'),
                'tanggal_lahir'     => $this->input->post('tanggal_lahir'),
                'desa'      => $this->input->post('desa'),
                'rt'        => $this->input->post('rt'),
                'rw'        => $this->input->post('rw'),
                'kecamatan'     => $this->input->post('kecamatan'),
                'kabupaten'     => $this->input->post('kabupaten'),
                'kodepos'       => $this->input->post('kodepos'),
                'email'     => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
                'kontak'        => $this->input->post('kontak'),
                'status_pekerjaan'      => $this->input->post('status_pekerjaan'),
                'level_id'     => $this->input->post('level_id'),
                'is_aktif' => 1
                );
            $id = $this->siswa_model->update_siswa($this->input->post('id_siswa'),$data);
            $this->session->set_flashdata('message', 'Akun Siswa telah berhasil diperbarui');
            redirect('pegawai/siswa', 'refresh');
        }
        else
        {
            $this->session->set_flashdata('message', 'Akun Siswa gagal diperbarui');
            redirect('pegawai/edit_siswa', 'refresh');
        }
    }

        public function delete_siswa($id){
        $this->siswa_model->delete($id);
        $this->session->set_flashdata('message', 'Akun Siswa Berhasil dihapus');
            redirect('pegawai/siswa', 'refresh');
    }

        public function pdf_siswa(){
        $this->load->library('dompdf_gen');

        $data['siswa'] = $this->siswa_model->get_all_siswa()->result();
        $this->load->view('laporan_pdf',$data);

        $paper_size ='A4';
        $orientation ='potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size,$orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_siswa.pdf", array('Attachment' => 0 ));
    }

        public function print_siswa(){
        $data['siswa'] = $this->siswa_model->get_all_siswa()->result();
        $this->load->view('print_siswa',$data);
    }

        public function jurusan() {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates_pegawai/header');
        $this->load->view('templates_pegawai/sidebar',$data);
        $data['jurusan'] = $this->jurusan_model->semua_jurusan()->result();
        $this->load->view('pegawai/jurusan/jurusan_view',$data);
        $this->load->view('templates_pegawai/footer');    
    }

    public function delete_jurusan($id){
        $this->jurusan_model->delete($id);
        $this->session->set_flashdata('message', 'Jurusan berhasil dihapus');
        redirect('pegawai/jurusan', 'refresh');
    }

    public function tambah_jurusan(){
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates_pegawai/header');
        $this->load->view('templates_pegawai/sidebar',$data);
        $data['jurusan'] = $this->jurusan_model->semua_jurusan('jurusan')->result();
        $this->load->view('pegawai/jurusan/jurusan_tambah',$data);
        $this->load->view('templates_pegawai/footer');
    }

    public function tambah_jurusan_aksi()
        {
        $this->form_validation->set_rules('kode_jurusan', 'kode_jurusan', 'required');
        $this->form_validation->set_rules('nama_jurusan', 'nama_jurusan', 'required');

        if($this->form_validation->run())
        {
            $data = array(
                'kode_jurusan'      => $this->input->post('kode_jurusan'),
                'nama_jurusan'          => $this->input->post('nama_jurusan'),

                );
            $id = $this->jurusan_model->insert($data);
            $this->session->set_flashdata('message', 'Jurusan berhasil ditambahkan');
            redirect('pegawai/jurusan', 'refresh');
        }
        else
        {
            $this->session->set_flashdata('message', 'Jurusan gagal ditambahkan');
            redirect('pegawai/tambah_jurusan', 'refresh');
        }
    }

    public function edit_jurusan($id) {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates_pegawai/header');
        $this->load->view('templates_pegawai/sidebar',$data);
        $data['jurusan'] = $this->jurusan_model->get_data($id)->result();
        $this->load->view('pegawai/jurusan/jurusan_edit',$data);
        $this->load->view('templates_pegawai/footer');    
    }

    public function update_jurusan(){
        $this->form_validation->set_rules('kode_jurusan', 'kode', 'required');
        $this->form_validation->set_rules('nama_jurusan', 'Nama Jurusan', 'required');

        if($this->form_validation->run())
        {
            $data = array(
                'kode_jurusan'      => $this->input->post('kode_jurusan'),
                'nama_jurusan'      => $this->input->post('nama_jurusan'),


                );
            $id = $this->jurusan_model->update($this->input->post('id_jurusan'),$data);
            $this->session->set_flashdata('message', 'Jurusan berhasil diedit');
            redirect('pegawai/jurusan', 'refresh');
        }
        else
        {
            $this->session->set_flashdata('warning', 'Jurusan gagal diedit');
            redirect('pegawai/edit_jurusan/'.$this->input->post('id'), 'refresh');
        }
    }

     public function tahun() {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates_pegawai/header');
        $this->load->view('templates_pegawai/sidebar',$data);
        $data['tahun'] = $this->tahun_model->semua_tahun()->result();
        $this->load->view('pegawai/tahun/tahun_view',$data);
        $this->load->view('templates_pegawai/footer');    
    }

    public function tambah_tahun(){
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates_pegawai/header');
        $this->load->view('templates_pegawai/sidebar',$data);
        $data['tahun'] = $this->tahun_model->semua_tahun('tahun')->result();
        $this->load->view('pegawai/tahun/tahun_tambah',$data);
        $this->load->view('templates_pegawai/footer');
    }

    public function tambah_tahun_aksi()
        {
        $this->form_validation->set_rules('tahun', 'tahun', 'required');

        if($this->form_validation->run())
        {
            $data = array(
                'tahun'     => $this->input->post('tahun'),

                );
            $id = $this->tahun_model->insert($data);
            $this->session->set_flashdata('message', 'Tahun berhasil ditambahkan');
            redirect('pegawai/tahun', 'refresh');
        }
        else
        {
            $this->session->set_flashdata('message', 'Tahun gagal ditambahkan');
            redirect('pegawai/tambah_tahun', 'refresh');
        }
    }

    public function delete_tahun($id){
        $this->tahun_model->delete($id);
        $this->session->set_flashdata('message', 'Tahun berhasil dihapus');
        redirect('pegawai/tahun', 'refresh');
    }

    public function edit_tahun($id) {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates_pegawai/header');
        $this->load->view('templates_pegawai/sidebar',$data);
        $data['tahun'] = $this->tahun_model->get_data($id)->result();
        $this->load->view('pegawai/tahun/tahun_edit',$data);
        $this->load->view('templates_pegawai/footer');
    }

    public function update_tahun(){
        $this->form_validation->set_rules('tahun', 'tahun', 'required');

        if($this->form_validation->run())
        {
            $data = array(
                'tahun'     => $this->input->post('tahun'),


                );
            $id = $this->tahun_model->update($this->input->post('id_tahun'),$data);
            $this->session->set_flashdata('message', 'Tahun berhasil diedit');
            redirect('pegawai/tahun', 'refresh');
        }
        else
        {
            $this->session->set_flashdata('warning', 'Tahun gagal diedit');
            redirect('pegawai/edit_tahun/'.$this->input->post('id'), 'refresh');
        }
    }

    public function perusahaan() {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates_pegawai/header');
        $this->load->view('templates_pegawai/sidebar',$data);
        $data['perusahaan'] = $this->perusahaan_model->semua_perusahaan()->result();
        $this->load->view('pegawai/perusahaan/perusahaan_view',$data);
        $this->load->view('templates_pegawai/footer');    
    }

    public function tambah_perusahaan(){
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates_pegawai/header');
        $this->load->view('templates_pegawai/sidebar',$data);
        $data['perusahaan'] = $this->perusahaan_model->semua_perusahaan('perusahaan')->result();
        $this->load->view('pegawai/perusahaan/perusahaan_tambah',$data);
        $this->load->view('templates_pegawai/footer');
    }

    public function tambah_perusahaan_aksi(){
        $this->form_validation->set_rules('nama_perusahaan', 'nama_perusahaan', 'required|trim');
        if($this->form_validation->run())
        {

        $nama_perusahaan = $this->input->post('nama_perusahaan');
        $image = $_FILES['image'];
        if ($image=''){}else{
            $config['upload_path'] = './assets/image';
            $config['allowed_types'] = 'jpg|png|gif|tiff';
            $this->load->library('upload',$config);

            if(!$this->upload->do_upload('image')){
                echo "Gagal Upload"; die();
            } else {
                $image = $this->upload->data('file_name');
            }
        }

        $data = array (
            'nama_perusahaan' => $nama_perusahaan,
            'image' => $image,
        );

        $this->perusahaan_model->insert($data,'perusahaan');
        redirect('pegawai/perusahaan');
        }
    }

    public function delete_perusahaan($id){
        $this->perusahaan_model->delete($id);
        $this->session->set_flashdata('message', 'Data Perusahaan Berhasil dihapus');
        redirect('pegawai/perusahaan', 'refresh');
    }

    public function edit_perusahaan($id) {

        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'trim|required');
        if($this->form_validation->run() == TRUE){
            if($this->perusahaan_model->update_perusahaan_aksi($id)){
                $this->session->set_flashdata('message', 'Data perusahaan berhasil diubah');
            }
            redirect('pegawai/perusahaan');
        }
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates_pegawai/header');
        $this->load->view('templates_pegawai/sidebar',$data);
        $data['perusahaan'] = $this->perusahaan_model->get_data($id)->result();
        $this->load->view('pegawai/perusahaan/perusahaan_edit',$data);
        $this->load->view('templates_pegawai/footer');
    }

     public function loker() {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates_pegawai/header');
        $this->load->view('templates_pegawai/sidebar',$data);
        $data['loker'] = $this->loker_model->semua_loker()->result();
        $this->load->view('pegawai/loker/loker_view',$data);
        $this->load->view('templates_pegawai/footer');    
    }

    public function tambah_loker(){
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates_pegawai/header');
        $this->load->view('templates_pegawai/sidebar',$data);
        $data['perusahaan'] = $this->loker_model->tampil_data('perusahaan')->result();
        $this->load->view('pegawai/loker/loker_tambah',$data);
        $this->load->view('templates_pegawai/footer');    
        }

    public function tambah_loker_aksi(){
            $this->_rules();

            if($this->form_validation->run() == FALSE)
            {
                $this->tambah_loker();
            } else {
                $nama_perusahaan = $this->input->post('nama_perusahaan');
                $judul_loker = $this->input->post('judul_loker');
                $image = $_FILES['image'];
                $deskripsi_loker = $this->input->post('deskripsi_loker');
        if ($image=''){}else{
            $config['upload_path'] = './assets/image';
            $config['allowed_types'] = 'jpg|png|gif|tiff';
            $this->load->library('upload',$config);

            if(!$this->upload->do_upload('image')){
                echo "Gagal Upload"; die();
            } else {
                $image = $this->upload->data('file_name');
            }
        }

                $data = array (
                    'nama_perusahaan' => $nama_perusahaan,
                    'judul_loker' => $judul_loker,
                    'image' => $image,
                    'deskripsi_loker' => $deskripsi_loker,
                    
                );

                $this->loker_model->insert_data($data,'loker');
                $this->session->set_flashdata('message', 'Loker berhasil ditambahkan');
                redirect('pegawai/loker');
            }
        }

        public function _rules(){
            $this->form_validation->set_rules('nama_perusahaan','nama_perusahaan','required',[
                'required' => 'Nama Perusahaan harus diisi'
            ]);
            $this->form_validation->set_rules('judul_loker','judul_loker','required',[
                'required' => 'Judul Loker harus diisi'
            ]);
            $this->form_validation->set_rules('deskripsi_loker','deskripsi_loker','required',[
                'required' => 'Deskripsi Loker harus diisi'
            ]);

        }

    public function delete_loker($id){
        $this->loker_model->delete($id);
        $this->session->set_flashdata('message', 'Loker berhasil dihapus');
        redirect('pegawai/loker', 'refresh');
    }

    public function edit_loker($id) {
        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'trim|required');
        $this->form_validation->set_rules('judul_loker', 'Judul Loker', 'trim|required');
        $this->form_validation->set_rules('deskripsi_loker', 'Deskripsi Loker', 'trim|required');
        if($this->form_validation->run() == TRUE){
            if($this->loker_model->update_loker_aksi($id)){
                $this->session->set_flashdata('message', 'Data loker berhasil diubah');
            }
            redirect('pegawai/loker');
        }
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates_pegawai/header');
        $this->load->view('templates_pegawai/sidebar',$data);
        $data['loker'] = $this->loker_model->get_data($id)->result();
        $data['perusahaan'] = $this->loker_model->tampil_data('perusahaan')->result();
        $this->load->view('pegawai/loker/loker_edit',$data);
        $this->load->view('templates_pegawai/footer');
    }

        public function pengumuman() {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates_pegawai/header');
        $this->load->view('templates_pegawai/sidebar',$data);
        $data['pengumuman'] = $this->pengumuman_model->semua_pengumuman()->result();
        $this->load->view('pegawai/pengumuman/pengumuman_view',$data);
        $this->load->view('templates_pegawai/footer');    
    }

    public function tambah_pengumuman(){
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates_pegawai/header');
        $this->load->view('templates_pegawai/sidebar',$data);
        $data['pengumuman'] = $this->pengumuman_model->semua_pengumuman('pengumuman')->result();
        $this->load->view('pegawai/pengumuman/pengumuman_tambah',$data);
        $this->load->view('templates_pegawai/footer');
    }

    public function tambah_pengumuman_aksi(){
        $this->form_validation->set_rules('judul_pengumuman', 'judul_pengumuman', 'required|trim');
        if($this->form_validation->run())
        {

        $judul_pengumuman = $this->input->post('judul_pengumuman');
        $file = $_FILES['image'];
        if ($file=''){}else{
            $config['upload_path'] = './assets/file';
            $config['allowed_types'] = 'jpg|png|gif|tiff|doc|docx|pdf';
            $this->load->library('upload',$config);

            if(!$this->upload->do_upload('image')){
                echo "Gagal Upload"; die();
            } else {
                $file = $this->upload->data('file_name');
            }
        }

        $data = array (
            'judul_pengumuman' => $judul_pengumuman,
            'file' => $file,
        );

        $this->pengumuman_model->insert($data,'pengumuman');
        redirect('pegawai/pengumuman');
        }
    }

    public function delete_pengumuman($id){
        $this->pengumuman_model->delete($id);
        $this->session->set_flashdata('message', 'Data Pengumuman Berhasil dihapus');
        redirect('pegawai/pengumuman', 'refresh');
    }

    public function edit_pengumuman($id) {
        $this->form_validation->set_rules('judul_pengumuman', 'Judul Pengumuman', 'trim|required');
        if($this->form_validation->run() == TRUE){
            if($this->pengumuman_model->update_pengumuman_aksi($id)){
                $this->session->set_flashdata('message', 'Data pengumuman berhasil diubah');
            }
            redirect('pegawai/pengumuman');
        }
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates_pegawai/header');
        $this->load->view('templates_pegawai/sidebar',$data);
        $data['pengumuman'] = $this->pengumuman_model->get_data($id)->result();
        $this->load->view('pegawai/pengumuman/pengumuman_edit',$data);
        $this->load->view('templates_pegawai/footer');
    }

     public function tentang_bkk() {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates_pegawai/header');
        $this->load->view('templates_pegawai/sidebar',$data);
        $data['tentang_bkk'] = $this->tentang_bkk_model->semua_tentang_bkk()->result();
        $this->load->view('pegawai/tentang_bkk/tentang_bkk_view',$data);
        $this->load->view('templates_pegawai/footer');    
    }

    public function edit_tentang_bkk($id) {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates_pegawai/header');
        $this->load->view('templates_pegawai/sidebar',$data);
        $data['tentang_bkk'] = $this->tentang_bkk_model->get_data($id)->result();
        $this->load->view('pegawai/tentang_bkk/tentang_bkk_edit',$data);
        $this->load->view('templates_pegawai/footer');
    }

    function update_tentang_bkk(){
        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');

        if($this->form_validation->run())
        {
            $data = array(
                'judul'     => $this->input->post('judul'),
                'deskripsi'         => $this->input->post('deskripsi'),



                );
            $id = $this->tentang_bkk_model->update($this->input->post('id_tentang_bkk'),$data);
            $this->session->set_flashdata('message', 'Informasi Tentang BKK berhasil diedit');
            redirect('pegawai/tentang_bkk', 'refresh');
        }
        else
        {
            $this->session->set_flashdata('warning', 'Informasi Tentang BKK gagal diedit');
            redirect('pegawai/edit_tentang_bkk/'.$this->input->post('id_tentang_bkk'), 'refresh');
        }
    }

     public function identitas() {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates_pegawai/header');
        $this->load->view('templates_pegawai/sidebar',$data);
        $data['identitas'] = $this->identitas_model->semua_identitas()->result();
        $this->load->view('pegawai/identitas/identitas_view',$data);
        $this->load->view('templates_pegawai/footer');    
    }


    public function edit_identitas($id) {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates_pegawai/header');
        $this->load->view('templates_pegawai/sidebar',$data);
        $data['identitas'] = $this->identitas_model->get_data($id)->result();
        $this->load->view('pegawai/identitas/identitas_edit',$data);
        $this->load->view('templates_pegawai/footer');
    }

    function update_identitas(){
        $this->form_validation->set_rules('judul_website', 'judul_website', 'required');
        $this->form_validation->set_rules('alamat', 'alamat', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('telepon', 'telepon', 'required');

        if($this->form_validation->run())
        {
            $data = array(
                'judul_website'     => $this->input->post('judul_website'),
                'alamat'            => $this->input->post('alamat'),
                'email'             => $this->input->post('email'),
                'telepon'               => $this->input->post('telepon'),


                );
            $id = $this->identitas_model->update($this->input->post('id_identitas'),$data);
            $this->session->set_flashdata('message', 'Identitas berhasil diedit');
            redirect('pegawai/identitas', 'refresh');
        }
        else
        {
            $this->session->set_flashdata('warning', 'Identitas gagal diedit');
            redirect('pegawai/edit_identitas/'.$this->input->post('id_identitas'), 'refresh');
        }
    }

     public function pendaftaran() {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates_pegawai/header');
        $this->load->view('templates_pegawai/sidebar',$data);
        $data['pendaftaran'] = $this->pendaftaran_model->get_all_pendaftaran()->result();
        $this->load->view('pegawai/pendaftaran/pendaftaran_view',$data);
        $this->load->view('templates_pegawai/footer');    
    }

    public function tambah_pendaftaran() {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates_pegawai/header');
        $this->load->view('templates_pegawai/sidebar',$data);
        $data['loker'] = $this->loker_model->semua_loker()->result();
        $data['siswa'] = $this->siswa_model->semua_siswa()->result();
        $this->load->view('pegawai/pendaftaran/pendaftaran_tambah',$data);
        $this->load->view('templates_pegawai/footer');    
    }

    function tambah_pendaftaran_aksi(){
        $this->form_validation->set_rules('id_siswa', 'nama', 'required|trim');
        $this->form_validation->set_rules('id_loker', 'nama_perusahaan', 'required|trim');
        $this->form_validation->set_rules('nilai_smt_1', 'nilai_smt_1', 'required|trim');
        $this->form_validation->set_rules('nilai_smt_2', 'nilai_smt_2', 'required|trim');
        $this->form_validation->set_rules('nilai_smt_3', 'nilai_smt_3', 'required|trim');
        $this->form_validation->set_rules('nilai_smt_4', 'nilai_smt_4', 'required|trim');
        $this->form_validation->set_rules('nilai_smt_5', 'nilai_smt_5', 'required|trim');
        $this->form_validation->set_rules('nama_ayah', 'nama_ayah', 'required|trim');
        $this->form_validation->set_rules('nama_ibu', 'nama_ibu', 'required|trim');
        $this->form_validation->set_rules('no_hp_ortu', 'no_hp_ortu', 'required|trim');

        if($this->form_validation->run())
        {
            $data = array(
                'id_siswa'      => $this->input->post('id_siswa'),
                'id_loker'      => $this->input->post('id_loker'),
                'nilai_smt_1'       => $this->input->post('nilai_smt_1'),
                'nilai_smt_2'       => $this->input->post('nilai_smt_2'),
                'nilai_smt_3'       => $this->input->post('nilai_smt_3'),
                'nilai_smt_4'       => $this->input->post('nilai_smt_4'),
                'nilai_smt_5'       => $this->input->post('nilai_smt_5'),
                'nama_ayah'     => $this->input->post('nama_ayah'),
                'nama_ibu'      => $this->input->post('nama_ibu'),
                'no_hp_ortu'        => $this->input->post('no_hp_ortu'),
                'status'            => 0
                );
            $id = $this->pendaftaran_model->tambah_pendaftaran($data);
            $this->session->set_flashdata('message', 'Data Pendaftaran telah berhasil ditambahkan');
            redirect('pegawai/pendaftaran', 'refresh');
        }
        else
        {
            $this->session->set_flashdata('message', 'Data Pendaftaran Gagal ditambahkan');
            redirect('pegawai/tambah_pendaftaran', 'refresh');
        }
    }

    public function delete_pendaftaran($id){
        $this->pendaftaran_model->delete($id);
        $this->session->set_flashdata('message', 'Data Pendaftaran Berhasil dihapus');
        redirect('pegawai/pendaftaran', 'refresh');
    }

    public function edit_pendaftaran($id) {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates_pegawai/header');
        $this->load->view('templates_pegawai/sidebar',$data);
        $data['pendaftaran'] = $this->pendaftaran_model->get_data($id)->result();
        $data['loker'] = $this->db->get('loker')->result();
        $data['siswa'] = $this->db->get('siswa')->result();
        $this->load->view('pegawai/pendaftaran/pendaftaran_edit',$data);
        $this->load->view('templates_pegawai/footer');
    }

    public function update_pendaftaran() {
        $this->form_validation->set_rules('status', 'status', 'required');
        if($this->form_validation->run())
        {
            $data = array(
                'status'        => $this->input->post('status'),
                );
            $id = $this->pendaftaran_model->update($this->input->post('id_pendaftaran'), $data);
            $this->session->set_flashdata('message', 'Status Pendaftaran telah diubah');
            redirect('pegawai/pendaftaran', 'refresh');
        }
        else
        {
            $this->session->set_flashdata('warning', 'Status pendaftaran gagal diubah');
            redirect('pegawai/edit_pendaftaran/'.$this->input->post('id_pendaftaran'), 'refresh');
        }
    }

    public function detail_pendaftaran($id) {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates_pegawai/header');
        $this->load->view('templates_pegawai/sidebar',$data);
        $data['pendaftaran'] = $this->pendaftaran_model->get_data($id)->result();
        $data['loker'] = $this->db->get('loker')->result();
        $data['siswa'] = $this->db->get('siswa')->result();
        $this->load->view('pegawai/pendaftaran/pendaftaran_detail',$data);
        $this->load->view('templates_pegawai/footer');
    }

        public function laporan_siswa_persentase(){
        $data['user']       = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tahun']      = $this->tahun_model->semua_tahun()->result();
        $data['jurusan']    = $this->jurusan_model->semua_jurusan()->result(); 
        $this->load->view('templates_pegawai/header');
        $this->load->view('templates_pegawai/sidebar',$data);
        $this->load->view('pegawai/siswa/laporan_siswa_persentase');
        $this->load->view('templates_pegawai/footer');       
    }

    public function print_siswa_persentase(){
        $data['jurusan']    = $this->jurusan_model->semua_jurusan()->result(); 
        $this->load->view('print_siswa_persentase',$data);
    }

        public function laporan_perusahaan(){
        $data['user']       = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['perusahaan'] = $this->perusahaan_model->semua_perusahaan()->result();
        $this->load->view('templates_pegawai/header');
        $this->load->view('templates_pegawai/sidebar',$data);
        $this->load->view('pegawai/perusahaan/laporan_perusahaan');
        $this->load->view('templates_pegawai/footer');
    }

    public function print_perusahaan(){
        $data['perusahaan'] = $this->perusahaan_model->semua_perusahaan()->result();
        $this->load->view('print_perusahaan',$data);
    }

     public function laporan_pendaftaran(){
        $data['user']       = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if(isset($_POST['search'])){
            if($this->input->post('status') != 3){
                $this->db->where('pendaftaran.status', $this->input->post('status'));
            }
            $this->db->where('pendaftaran.tanggal >=', $this->input->post('tanggal1'));
            $this->db->where('pendaftaran.tanggal <=', $this->input->post('tanggal2'));
            $data['pendaftaran'] = $this->pendaftaran_model->get_all_pendaftaran()->result();
        }
        $this->load->view('templates_pegawai/header');
        $this->load->view('templates_pegawai/sidebar',$data);
        $this->load->view('pegawai/pendaftaran/laporan_pendaftaran');
        $this->load->view('templates_pegawai/footer');
    }

    public function print_pendaftaran($tanggal1, $tanggal2, $status)
    {
            if($status != 3){
                $this->db->where('pendaftaran.status', $status);
            }
            $this->db->where('pendaftaran.tanggal >=', $tanggal1);
            $this->db->where('pendaftaran.tanggal <=', $tanggal2);
            $data['pendaftaran'] = $this->pendaftaran_model->get_all_pendaftaran()->result();
            $this->load->view('print_pendaftaran', $data);

    }

}