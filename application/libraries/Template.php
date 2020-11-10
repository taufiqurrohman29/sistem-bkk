<?php 


class Template {

	protected $ci;
	public function __construct(){
		$this->ci =& get_instance();
		$this->ci->load->model(['identitas_model']);
	}


	public function siswa($content, $data=null){
		$data['identitas'] = $this->ci->identitas_model->semua_identitas()->row();
		$this->ci->load->view('siswa/template/header', $data);
		$this->ci->load->view('siswa/'.$content, $data);
		$this->ci->load->view('siswa/template/footer', $data);
	}


}



 ?>