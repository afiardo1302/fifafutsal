<?php
class Mod_login extends CI_Model {

  public function __construct() {
    parent::__construct();
    $this->load->database();
  }
  public function resolve_user_login($username, $password) {
    
    $this->db->select('password');
    $this->db->from('users');
    $this->db->where('username', $username);
    
    
  }

}
