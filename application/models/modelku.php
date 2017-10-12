<?php 
	class Modelku extends CI_Model{

		//Gadipake
		function authen_user($username){
		$this->db->select('authentication');
		$this->db->where('username', $username);
		$this->db->from('users');
		$query = $this->db->get();
		return $query->result_array();
}
	function login_authen($username,$password){
		$this->db->select('*');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		$this->db->from('users');
		$query = $this->db->get();
	if ($query->num_rows() == 1) {
		return true;
	}
	else{
		return false;
		}

	}
	function wrong_password($username, $value){ /* Harus ditambah parameneter passowrd supaya tambah ciamik*/
		$this->db->set('authentication', $value);
		$this->db->where("username", $username);
		$this->db->update('users');
	}
}

 ?>