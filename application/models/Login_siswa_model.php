<?php
class Login_siswa_model extends CI_Model{

	function auth_siswa($email,$password){
		$query="SELECT * FROM siswa WHERE email='$email' AND password=MD5('$password') LIMIT 1";
		return $this->db->query($query);
	}

}