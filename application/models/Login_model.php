<?php
class Login_model extends CI_Model{

	function auth_user($email,$password){
		$query="SELECT * FROM user WHERE email='$email' AND password=MD5('$password') LIMIT 1";
		return $this->db->query($query);
	}

}