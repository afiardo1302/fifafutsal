<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Mod_artikel extends CI_Model{

	public function getArtikel($where=""){

		$data = $this->db->query('select * from article '.$where);
		return $data->result_array();
	}
        function getCurrentRow() {
            $this->db->SELECT('*');
            $this->db->FROM('article');
            $query=$this->db->get();
            return $query->num_rows();
        }

        function getNumRow($id) {
            $this->db->WHERE('id',$id);
            $query = $this->db->get('article');
            return $query->num_rows();
        }

        function getTestId() {
        	$this->db->SELECT('id');
        	$this->db->FROM('article');
        	$this->db->WHERE('judul', 'KHUSUS TEST mAES23KSAYe3ASE2');
        	$this->db->WHERE('waktu', '2017-12-12');
        	$this->db->WHERE('deskripsi', 'Hanya Tes');
        	$query = $this->db->get();
        	return $query->result_array();
        }

	public function InsertData(){
//		$res = $this->db->insert($tableName,$data);
//		return $res;

		$this->load->helper("security");

                $judul= $this->input->post('judul',TRUE);
		$waktu = $this->input->post('waktu',TRUE);
		$deskripsi = $this->input->post('deskripsi',TRUE);

		$data = array(
            'judul' => $judul,
            'waktu' => $waktu,
            'deskripsi' => $deskripsi);
//
	$this->db->insert('article',$data);
	}
//	public function UpdateData($tableName,$data,$where){
//		$res = $this->db->update($tableName,$data,$where);
//		return $res;
//	}

        public function DeleteData($where){
		$this->db->where('id',$where);
                $this->db->delete('article');
	}
 


	}