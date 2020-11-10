<?php 

/**
 * 
 */
class Admin extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
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
		if($this->session->userdata('akses') != '1'){
		redirect('login','refresh');
	}
	
	}
	
	public function index(){
		
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$data['admin'] =$this->pengguna_model->jumlah_admin();
		$data['pegawai'] =$this->pengguna_model->jumlah_pegawai();
		$data['siswa'] =$this->pengguna_model->jumlah_siswa();
		$data['loker'] =$this->loker_model->jumlah_loker();
		$this->load->view('admin/dashboard',$data);
		$this->load->view('templates_admin/footer');
	}
	public function profile(){
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->db->where('id_user', $this->session->userdata('ses_id'));
		$data['user'] = $this->db->get('user')->result();
		$this->load->view('admin/profile',$data);
		$this->load->view('templates_admin/footer');		
	}

	public function update_profile(){
		$this->form_validation->set_rules('nama', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run())
		{
			$id= $this->input->post('id_user');
			$user = $this->pengguna_model->get_data($id)->row();
			if($user->password == $this->input->post('password')){
					$data = array(
						'nama'		=> $this->input->post('nama'),
						'email'		=> $this->input->post('email'),
						'password'	=> $this->input->post('password'),
						'level'		=> $this->input->post('level')
						);
					$this->pengguna_model->update($id, $data);
					$this->session->set_flashdata('message', 'Akun telah berhasil diubah');
					redirect('admin/profile/'.$id, 'refresh');
			}else if($user->password != $this->input->post('password')){
					$data = array(
						'nama'		=> $this->input->post('nama'),
						'email'		=> $this->input->post('email'),
						'password'	=> md5($this->input->post('password')),
						'level'		=> $this->input->post('level')
						);
					$this->pengguna_model->update($id, $data);
					$this->session->set_flashdata('message', 'Akun telah berhasil diubah');
					redirect('admin/profile/'.$id, 'refresh');
			}
		}
		else
		{
			$this->session->set_flashdata('message', 'Akun gagal diubah');
			redirect('admin/profile/'.$id, 'refresh');
		}
	}

	public function jurusan() {
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$data['jurusan'] = $this->jurusan_model->semua_jurusan()->result();
		$this->load->view('admin/jurusan/jurusan_view',$data);
		$this->load->view('templates_admin/footer');	
	}

	public function delete_jurusan($id){
		$this->jurusan_model->delete($id);
		$this->session->set_flashdata('message', 'Jurusan berhasil dihapus');
		redirect('admin/jurusan', 'refresh');
	}

	public function tambah_jurusan(){
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$data['jurusan'] = $this->jurusan_model->semua_jurusan('jurusan')->result();
		$this->load->view('admin/jurusan/jurusan_tambah',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_jurusan_aksi()
		{
		$this->form_validation->set_rules('kode_jurusan', 'kode_jurusan', 'required');
		$this->form_validation->set_rules('nama_jurusan', 'nama_jurusan', 'required');

		if($this->form_validation->run())
		{
			$data = array(
				'kode_jurusan'		=> $this->input->post('kode_jurusan'),
				'nama_jurusan'			=> $this->input->post('nama_jurusan'),

				);
			$id = $this->jurusan_model->insert($data);
			$this->session->set_flashdata('message', 'Jurusan berhasil ditambahkan');
			redirect('admin/jurusan', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('message', 'Jurusan gagal ditambahkan');
			redirect('admin/tambah_jurusan', 'refresh');
		}
	}

	public function edit_jurusan($id) {
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$data['jurusan'] = $this->jurusan_model->get_data($id)->result();
		$this->load->view('admin/jurusan/jurusan_edit',$data);
		$this->load->view('templates_admin/footer');	
	}

	function update_jurusan(){
		$this->form_validation->set_rules('kode_jurusan', 'kode', 'required');
		$this->form_validation->set_rules('nama_jurusan', 'Nama Jurusan', 'required');

		if($this->form_validation->run())
		{
			$data = array(
				'kode_jurusan'		=> $this->input->post('kode_jurusan'),
				'nama_jurusan'		=> $this->input->post('nama_jurusan'),


				);
			$id = $this->jurusan_model->update($this->input->post('id_jurusan'),$data);
			$this->session->set_flashdata('message', 'Jurusan berhasil diedit');
			redirect('admin/jurusan', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('warning', 'Jurusan gagal diedit');
			redirect('barang/edit_jurusan/'.$this->input->post('id'), 'refresh');
		}
	}

	public function tahun() {
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');

		
		$data['tahun'] = $this->tahun_model->semua_tahun()->result();
		$this->load->view('admin/tahun/tahun_view',$data);
		$this->load->view('templates_admin/footer');	
	}

	public function tambah_tahun(){
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$data['tahun'] = $this->tahun_model->semua_tahun('tahun')->result();
		$this->load->view('admin/tahun/tahun_tambah',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_tahun_aksi()
		{
		$this->form_validation->set_rules('tahun', 'tahun', 'required');

		if($this->form_validation->run())
		{
			$data = array(
				'tahun'		=> $this->input->post('tahun'),

				);
			$id = $this->tahun_model->insert($data);
			$this->session->set_flashdata('message', 'Tahun berhasil ditambahkan');
			redirect('admin/tahun', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('message', 'Tahun gagal ditambahkan');
			redirect('admin/tambah_tahun', 'refresh');
		}
	}

	public function delete_tahun($id){
		$this->tahun_model->delete($id);
		$this->session->set_flashdata('message', 'Tahun berhasil dihapus');
		redirect('admin/tahun', 'refresh');
	}

	public function edit_tahun($id) {
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$data['tahun'] = $this->tahun_model->get_data($id)->result();
		$this->load->view('admin/tahun/tahun_edit',$data);
		$this->load->view('templates_admin/footer');
	}

	function update_tahun(){
		$this->form_validation->set_rules('tahun', 'tahun', 'required');

		if($this->form_validation->run())
		{
			$data = array(
				'tahun'		=> $this->input->post('tahun'),


				);
			$id = $this->tahun_model->update($this->input->post('id_tahun'),$data);
			$this->session->set_flashdata('message', 'Tahun berhasil diedit');
			redirect('admin/tahun', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('warning', 'Tahun gagal diedit');
			redirect('admin/edit_tahun/'.$this->input->post('id'), 'refresh');
		}
	}

	public function identitas() {
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$data['identitas'] = $this->identitas_model->semua_identitas()->result();
		$this->load->view('admin/identitas/identitas_view',$data);
		$this->load->view('templates_admin/footer');	
	}


	public function edit_identitas($id) {
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$data['identitas'] = $this->identitas_model->get_data($id)->result();
		$this->load->view('admin/identitas/identitas_edit',$data);
		$this->load->view('templates_admin/footer');
	}

	function update_identitas(){
		$this->form_validation->set_rules('judul_website', 'judul_website', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
		$this->form_validation->set_rules('email', 'email', 'required');
		$this->form_validation->set_rules('telepon', 'telepon', 'required');

		if($this->form_validation->run())
		{
			$data = array(
				'judul_website'		=> $this->input->post('judul_website'),
				'alamat'			=> $this->input->post('alamat'),
				'email'				=> $this->input->post('email'),
				'telepon'				=> $this->input->post('telepon'),


				);
			$id = $this->identitas_model->update($this->input->post('id_identitas'),$data);
			$this->session->set_flashdata('message', 'Identitas berhasil diedit');
			redirect('admin/identitas', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('warning', 'Identitas gagal diedit');
			redirect('admin/edit_identitas/'.$this->input->post('id_identitas'), 'refresh');
		}
	}

	public function tentang_bkk() {
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$data['tentang_bkk'] = $this->tentang_bkk_model->semua_tentang_bkk()->result();
		$this->load->view('admin/tentang_bkk/tentang_bkk_view',$data);
		$this->load->view('templates_admin/footer');	
	}

	public function edit_tentang_bkk($id) {
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$data['tentang_bkk'] = $this->tentang_bkk_model->get_data($id)->result();
		$this->load->view('admin/tentang_bkk/tentang_bkk_edit',$data);
		$this->load->view('templates_admin/footer');
	}

	function update_tentang_bkk(){
		$this->form_validation->set_rules('judul', 'judul', 'required');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');

		if($this->form_validation->run())
		{
			$data = array(
				'judul'		=> $this->input->post('judul'),
				'deskripsi'			=> $this->input->post('deskripsi'),



				);
			$id = $this->tentang_bkk_model->update($this->input->post('id_tentang_bkk'),$data);
			$this->session->set_flashdata('message', 'Informasi Tentang BKK berhasil diedit');
			redirect('admin/tentang_bkk', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('warning', 'Informasi Tentang BKK gagal diedit');
			redirect('admin/edit_tentang_bkk/'.$this->input->post('id_tentang_bkk'), 'refresh');
		}
	}

	public function pegawai() {
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$data['user'] = $this->pengguna_model->semua_pegawai()->result();
		$this->load->view('admin/pegawai/pegawai_view',$data);
		$this->load->view('templates_admin/footer');
		
	}

	public function tambah_pegawai() {
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/pegawai/pegawai_tambah');
		$this->load->view('templates_admin/footer');
	}

	function validation(){
		$this->form_validation->set_rules('nama', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('konfirmasi_password', 'Password Confirmation', 'required|matches[password]');
		if($this->form_validation->run())
		{
			$data = array(
				'nama'		=> $this->input->post('nama'),
				'email'		=> $this->input->post('email'),
				'password'	=> md5($this->input->post('password')),
				'level'		=> $this->input->post('level')
				);
			$id = $this->pengguna_model->tambah_user($data);
			$this->session->set_flashdata('message', 'Akun Pegawai telah berhasil dibuat');
			redirect('admin/pegawai', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('message', 'Akun Pegawai gagal dibuat');
			redirect('admin/tambah_pegawai', 'refresh');
		}
	}

	public function delete_pegawai($id){
		$this->pengguna_model->delete($id);
		$this->session->set_flashdata('message', 'Akun Pegawai Berhasil dihapus');
			redirect('admin/pegawai', 'refresh');
	}

	public function edit_pegawai($id) {
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$data['user'] = $this->pengguna_model->get_data($id)->result();
		$this->load->view('admin/pegawai/pegawai_edit',$data);
		$this->load->view('templates_admin/footer');
	}

	function update_pegawai(){
		$this->form_validation->set_rules('nama', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if($this->form_validation->run())
		{
			$id= $this->input->post('id_user');
			$user = $this->pengguna_model->get_data($id)->row();
			if($user->password == $this->input->post('password')){
					$data = array(
						'nama'		=> $this->input->post('nama'),
						'email'		=> $this->input->post('email'),
						'password'	=> $this->input->post('password'),
						'level_id'		=> $this->input->post('level_id')
						);
					$this->pengguna_model->update($id, $data);
					$this->session->set_flashdata('message', 'Akun Pegawai telah berhasil diubah');
					redirect('admin/edit_pegawai/'.$id, 'refresh');
			}else if($user->password != $this->input->post('password')){
					$data = array(
						'nama'		=> $this->input->post('nama'),
						'email'		=> $this->input->post('email'),
						'password'	=> md5($this->input->post('password')),
						'level'		=> $this->input->post('level')
						);
					$this->pengguna_model->update($id, $data);
					$this->session->set_flashdata('message', 'Akun Pegawai telah berhasil diubah');
					redirect('admin/edit_pegawai/'.$id, 'refresh');
			}
		}
		else
		{
			$this->session->set_flashdata('message', 'Akun Pegawai gagal diubah');
			redirect('admin/edit_pegawai/'.$id, 'refresh');
		}
	}

	public function perusahaan() {
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$data['perusahaan'] = $this->perusahaan_model->semua_perusahaan()->result();
		$this->load->view('admin/perusahaan/perusahaan_view',$data);
		$this->load->view('templates_admin/footer');	
	}

	public function tambah_perusahaan(){
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$data['perusahaan'] = $this->perusahaan_model->semua_perusahaan('perusahaan')->result();
		$this->load->view('admin/perusahaan/perusahaan_tambah',$data);
		$this->load->view('templates_admin/footer');
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
		redirect('admin/perusahaan');
	}
}

	public function delete_perusahaan($id){
		$this->perusahaan_model->delete($id);
		$this->session->set_flashdata('message', 'Data Perusahaan Berhasil dihapus');
		redirect('admin/perusahaan', 'refresh');
	}

	public function edit_perusahaan($id) {
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$data['perusahaan'] = $this->perusahaan_model->get_data($id)->result();
		$this->load->view('admin/perusahaan/perusahaan_edit',$data);
		$this->load->view('templates_admin/footer');
	}

	public function pengumuman() {
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$data['pengumuman'] = $this->pengumuman_model->semua_pengumuman()->result();
		$this->load->view('admin/pengumuman/pengumuman_view',$data);
		$this->load->view('templates_admin/footer');	
	}

		public function tambah_pengumuman(){
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$data['pengumuman'] = $this->pengumuman_model->semua_pengumuman('pengumuman')->result();
		$this->load->view('admin/pengumuman/pengumuman_tambah',$data);
		$this->load->view('templates_admin/footer');
	}

		public function tambah_pengumuman_aksi(){
		$this->form_validation->set_rules('judul_pengumuman', 'judul_pengumuman', 'required|trim');
		if($this->form_validation->run())
		{

		$judul_pengumuman = $this->input->post('judul_pengumuman');
		$file = $_FILES['image'];
		if ($file=''){}else{
			$config['upload_path'] = './assets/file';
			$config['allowed_types'] = 'jpg|png|gif|tiff';
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
		redirect('admin/pengumuman');
		}
	}

		public function delete_pengumuman($id){
		$this->pengumuman_model->delete($id);
		$this->session->set_flashdata('message', 'Data Pengumuman Berhasil dihapus');
		redirect('admin/pengumuman', 'refresh');
	}

		public function loker() {
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$data['loker'] = $this->loker_model->semua_loker()->result();
		$this->load->view('admin/loker/loker_view',$data);
		$this->load->view('templates_admin/footer');	
	}

		public function tambah_loker(){
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$data['perusahaan'] = $this->loker_model->tampil_data('perusahaan')->result();
		$this->load->view('admin/loker/loker_tambah',$data);
		$this->load->view('templates_admin/footer');	
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
				redirect('admin/loker');
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
		redirect('admin/loker', 'refresh');
	}
		public function siswa() {
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$data['siswa'] = $this->siswa_model->get_all_siswa()->result();
		$this->load->view('admin/siswa/siswa_view',$data);
		$this->load->view('templates_admin/footer');	
	}

		public function tambah_siswa(){
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$data['siswa'] = $this->siswa_model->semua_siswa('siswa')->result();
		$data['jurusan'] = $this->jurusan_model->get_all_jurusan('jurusan')->result();
		$data['tahun'] = $this->tahun_model->get_all_tahun('tahun')->result();
		$this->load->view('admin/siswa/siswa_tambah',$data);
		$this->load->view('templates_admin/footer');
	}

	function tambah_siswa_aksi(){
		$this->form_validation->set_rules('nama', 'Name', 'required|trim');
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
		$this->form_validation->set_rules('status_pekerjaan', 'status_pekerjaan', 'required|trim');

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
				'status_pekerjaan'		=> $this->input->post('status_pekerjaan'),
				'level'		=> $this->input->post('level')
				);
			$id = $this->siswa_model->tambah_siswa($data);
			$this->session->set_flashdata('message', 'Akun Siswa telah berhasil dibuat');
			redirect('admin/siswa', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('message', 'Akun Siswa gagal dibuat');
			redirect('admin/tambah_siswa', 'refresh');
		}
	}

	public function detail_siswa($id) {
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$data['siswa'] = $this->siswa_model->get_detail($id)->result();
		$data['jurusan'] = $this->jurusan_model->semua_jurusan('jurusan')->result();
		$data['tahun'] = $this->tahun_model->semua_tahun('tahun')->result();
		$this->load->view('admin/siswa/siswa_detail',$data);
		$this->load->view('templates_admin/footer');
	}
	public function edit_siswa($id) {
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$data['siswa'] = $this->siswa_model->get_data($id)->result();
		$data['jurusan'] = $this->db->get('jurusan')->result();
		$data['tahun'] = $this->db->get('tahun')->result();
		$this->load->view('admin/siswa/siswa_edit',$data);
		$this->load->view('templates_admin/footer');	
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
				'nama'		=> $this->input->post('nama'),
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
				'status_pekerjaan'		=> $this->input->post('status_pekerjaan'),
				'level'		=> $this->input->post('level')
				);
			$id = $this->siswa_model->update_siswa($this->input->post('id_siswa'),$data);
			$this->session->set_flashdata('message', 'Akun Siswa telah berhasil diperbarui');
			redirect('admin/siswa', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('message', 'Akun Siswa gagal diperbarui');
			redirect('admin/edit_siswa', 'refresh');
		}
	}

		public function delete_siswa($id){
		$this->siswa_model->delete($id);
		$this->session->set_flashdata('message', 'Akun Siswa Berhasil dihapus');
			redirect('admin/siswa', 'refresh');
	}

	public function pendaftaran() {
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$data['pendaftaran'] = $this->pendaftaran_model->get_all_pendaftaran()->result();
		$this->load->view('admin/pendaftaran/pendaftaran_view',$data);
		$this->load->view('templates_admin/footer');	
	}

	public function tambah_pendaftaran() {
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$data['loker'] = $this->loker_model->semua_loker()->result();
		$data['siswa'] = $this->siswa_model->semua_siswa()->result();
		$this->load->view('admin/pendaftaran/pendaftaran_tambah',$data);
		$this->load->view('templates_admin/footer');	
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
				'id_siswa'		=> $this->input->post('id_siswa'),
				'id_loker'		=> $this->input->post('id_loker'),
				'nilai_smt_1'		=> $this->input->post('nilai_smt_1'),
				'nilai_smt_2'		=> $this->input->post('nilai_smt_2'),
				'nilai_smt_3'		=> $this->input->post('nilai_smt_3'),
				'nilai_smt_4'		=> $this->input->post('nilai_smt_4'),
				'nilai_smt_5'		=> $this->input->post('nilai_smt_5'),
				'nama_ayah'		=> $this->input->post('nama_ayah'),
				'nama_ibu'		=> $this->input->post('nama_ibu'),
				'no_hp_ortu'		=> $this->input->post('no_hp_ortu'),
				'status'			=> 'Proses seleksi'
				);
			$id = $this->pendaftaran_model->tambah_pendaftaran($data);
			$this->session->set_flashdata('message', 'Data Pendaftaran telah berhasil ditambahkan');
			redirect('admin/pendaftaran', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('message', 'Data Pendaftaran Gagal ditambahkan');
			redirect('admin/tambah_pendaftaran', 'refresh');
		}
	}

		public function delete_pendaftaran($id){
		$this->pendaftaran_model->delete($id);
		$this->session->set_flashdata('message', 'Data Pendaftaran Berhasil dihapus');
		redirect('admin/pendaftaran', 'refresh');
	}

		public function edit_pendaftaran($id) {
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$data['pendaftaran'] = $this->pendaftaran_model->get_data($id)->result();
		$data['loker'] = $this->db->get('loker')->result();
		$data['siswa'] = $this->db->get('siswa')->result();
		$this->load->view('admin/pendaftaran/pendaftaran_edit',$data);
		$this->load->view('templates_admin/footer');
	}

		public function detail_pendaftaran($id) {
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$data['pendaftaran'] = $this->pendaftaran_model->get_data($id)->result();
		$data['loker'] = $this->db->get('loker')->result();
		$data['siswa'] = $this->db->get('siswa')->result();
		$this->load->view('admin/pendaftaran/pendaftaran_detail',$data);
		$this->load->view('templates_admin/footer');
	}

	public function update_pendaftaran() {
		$this->form_validation->set_rules('status', 'status', 'required');
		if($this->form_validation->run())
		{
			$data = array(
				'status'		=> $this->input->post('status'),
				);
			$id = $this->pendaftaran_model->update($this->input->post('id_pendaftaran'), $data);
			$this->session->set_flashdata('message', 'Status Pendaftaran telah diubah');
			redirect('admin/pendaftaran', 'refresh');
		}
		else
		{
			$this->session->set_flashdata('warning', 'Status pendaftaran gagal diubah');
			redirect('admin/edit_pendaftaran/'.$this->input->post('id_pendaftaran'), 'refresh');
		}
	}

	public function print_siswa(){
		$data['siswa'] = $this->siswa_model->get_all_siswa()->result();
		$this->load->view('print_siswa',$data);
	}

	public function print_siswa_2017_2018(){
		$data['siswa'] = $this->siswa_model->get_data_siswa_2017_2018()->result();
		$this->load->view('print_siswa_2017_2018',$data);
	}
	public function print_siswa_2018_2019(){
		$data['siswa'] = $this->siswa_model->get_data_siswa_2018_2019()->result();
		$this->load->view('print_siswa_2018_2019',$data);
	}

	public function print_siswa_2019_2020(){
		$data['siswa'] = $this->siswa_model->get_data_siswa_2019_2020()->result();
		$this->load->view('print_siswa_2019_2020',$data);
	}

	public function print_siswa_2020_2021(){
		$data['siswa'] = $this->siswa_model->get_data_siswa_2020_2021()->result();
		$this->load->view('print_siswa_2020_2021',$data);
	}

	public function print_siswa_2021_2022(){
		$data['siswa'] = $this->siswa_model->get_data_siswa_2021_2022()->result();
		$this->load->view('print_siswa_2021_2022',$data);
	}

	public function print_siswa_2022_2023(){
		$data['siswa'] = $this->siswa_model->get_data_siswa_2022_2023()->result();
		$this->load->view('print_siswa_2022_2023',$data);
	}

	public function laporan_siswa() {
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/siswa/laporan_siswa');
		$this->load->view('templates_admin/footer');	
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




		




		
	
}
?>