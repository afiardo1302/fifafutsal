<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pagination_Model extends CI_Model 
{
	function __construct() {
		parent::__construct();
	}
	
	// Count all record of table "contact_info" in database.
	public function record_count() {
		return $this->db->get('article')->num_rows();
	}

	// Fetch data according to per_page limit.
	public function fetch_data($limit, $offset) {
		$this->db->order_by('id','DESC');
		$query = $this->db->get('article',$limit,$offset);
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}
}
?>