<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Mod_artikel extends CI_Model{

	public function getArtikel($where=""){

		$data = $this->db->query('select * from article '.$where);
		return $data->result_array();
	}
	public function InsertData($tableName,$data){
		$res = $this->db->insert($tableName,$data);
		return $res;
	}
	public function UpdateData($tableName,$data,$where){
		$res = $this->db->update($tableName,$data,$where);
		return $res;
	}

	public function DeleteData($tableName,$data,$where){
		$res = $this->db->delete($tableName,$data,$where);
		return $res;
	}
        function getCurrentRowArtikel(){
            return $this->db->get('article')->num_rows();
        }
	


	}