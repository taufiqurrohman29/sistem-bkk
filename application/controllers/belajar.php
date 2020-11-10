public function lowongan_kerja() {
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$data['loker'] = $this->loker_model->get_all_loker()->result();
		$this->load->view('admin/lowongan_kerja/loker_view',$data);
		$this->load->view('templates_admin/footer');	
	}

		public function tambah_lowongan_kerja(){
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$data['perusahaan'] = $this->loker_model->tampil_data('perusahaan')->result();
		$this->load->view('admin/lowongan_kerja/loker_tambah',$data);
		$this->load->view('templates_admin/footer');	
		}

		public function tambah_lowongan_kerja_aksi(){
		$this->form_validation->set_rules('id', 'nama_perusahaan', 'required|trim');
		$this->form_validation->set_rules('judul_loker', 'judul_loker', 'required|trim');
		$this->form_validation->set_rules('deskripsi_loker', 'deskripsi_loker', 'required|trim');
		if($this->form_validation->run())
		{

		$id_perusahaan = $this->input->post('id');
		$judul_loker = $this->input->post('judul_loker');
		$deskripsi_loker = $this->input->post('deskripsi_loker');
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
			'id_perusahaan' => $id_perusahaan,
			'judul_loker' => $judul_loker,
			'deskripsi_loker' => $deskripsi_loker,
			'image' => $image,
		);

		$this->loker_model->insert($data,'loker');
		redirect('admin/lowongan_kerja');
	}
}