<?php 
	class Modelku extends CI_Model{


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

	function login_group($username){
		$id = 0;
		$this->db->where('username',$username);
		$query = $this->db->get('users');
		foreach ($query->result() as $row) {
			$id = $row->usergroup_id;
		}
		return $id;
	}
//	function wrong_password($username, $value){ /* Harus ditambah parameneter passowrd supaya tambah ciamik*/
//		$this->db->set('authentication', $value);
//		$this->db->where("username", $username);
//		$this->db->update('users');
//	}
//
        }

 ?>