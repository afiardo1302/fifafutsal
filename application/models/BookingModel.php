<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class BookingModel extends CI_Model {

	
		
	// public function getProduk($where=""){

	// 	$data = $this->db->query('select * from booking'.$where);
	// 	return $data->result_array();
	// }
	// public function InsertData($tableName,$data){
	// 	$res = $this->db->insert($tableName,$data);
	// 	return $res;
	// }
	// public function UpdateData($tableName,$data,$where){
	// 	$res = $this->db->update($tableName,$data,$where);
	// 	return $res;
	// }

	// public function DeleteData($tableName,$data,$where){
	// 	$res = $this->db->delete($tableName,$data,$where);
	// 	return $res;
	// }

	        function getTestId() {
        	$this->db->SELECT('id, status');
        	$this->db->FROM('booking');
        	$this->db->WHERE('lapangan', 'A');
        	$this->db->WHERE('tanggalMain', '2017-10-15');
        	$this->db->WHERE('jamMulai', '09:00:00');
        	$query = $this->db->get();
        	return $query->result_array();
        }

    public function getNumRow($id)
    {
    	$this->db->WHERE('id',$id);
    	$query = $this->db->get('booking');
    	return $query->num_rows();
    }

    public function verifyBooking($id)
    {
    	$data = array('status' => 'Paid');
    	$this->db->WHERE('id',$id);
    	$this->db->update('booking',$data);
    }

	public function cancelBooking($id)
    {
    	$data = array('status' => 'Canceled');
    	$this->db->WHERE('id',$id);
    	$this->db->update('booking',$data);
    }

    public function getStatus($id)
    {
    	$this->db->WHERE('id',$id);
    	$query = $this->db->get('booking');
    	$status = "";
    	foreach ($query->result_array() as $row) {
    		$status = $row['status'];
    	}
    	return $status;
    }    

    public function getJamKosong($lapangan,$tanggalMain)
    {
    	$this->db->SELECT('jamMulai, jamSelesai');
    	$this->db->WHERE('lapangan', $lapangan);
    	$this->db->WHERE('tanggalMain', $tanggalMain);
    	$this->db->WHERE('status !=', 'Canceled');
    	$query = $this->db->get('booking');
    	return $query;
    }

	public function getBooking(){

		$data = $this->db->query("SELECT * FROM booking");
		return $data->result_array();
	}
        public  function getCurrentRow() {
            $this->db->SELECT('*');
            $this->db->FROM('booking');
            $query=$this->db->get();
            return $query->num_rows();
        }
			
	function addData($data) {
		$this->db->insert('booking', $data);
	}
        
	function deleteData($id){
		$this->db->where('id',$id);
		$this->db->delete('booking');
	}



}

?>
