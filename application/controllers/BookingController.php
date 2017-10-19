<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BookingController extends CI_Controller {

	public function __construct() {
	parent::__construct();

        $this->load->model('BookingModel');
	 $this->load->helper('url' , 'form');
	  //  $this->load->helper();
        $this->load->database();

	}

	public function index(){ 

		
		$this->load->helper('url');
		$data = $this->BookingModel->getBooking();
		$this->load->view('header');
		$this->load->view('v_form_booking');
		$this->load->view('footer');  }

	public function verifyBooking($id){
		$this->BookingModel->verifyBooking($id);
		redirect(base_url('MyControl/viewOrderHistory')); }

	public function cancelBooking($id){
		$this->BookingModel->cancelBooking($id);
		redirect(base_url('MyControl/viewOrderHistory')); }

	public function getJamKosong()
	{
		$this->load->helper('security');
		$field = $this->input->post('lapangan');
		$date = $this->input->post('tanggal');

		$data = $this->BookingModel->getJamKosong($field,$date);
		$select_box = "";
		$exist = "tes";

		for($i = 7; $i <= 21; $i++)
		{
			$time = sprintf('%02d',$i);
			$timestamp = $time.":00:00";
			if($data->num_rows() > 0)
			{
				foreach($data->result() as $row)  {
					$start = $row->jamMulai;
					$first = ltrim(substr($start,0,2),'0');
					$end = $row->jamSelesai;
					$second = ltrim(substr($end,0,2),'0');
					if($i >= $first && $i <= $second)
					{ $exist = "<option value='".$timestamp."' style='color:red' disabled>".$time."</option>"; }
					else {
						$exist = "<option value='".$timestamp."'>".$time."</option>"; } } }
			else {
				$exist = "<option value='".$timestamp."'>".$time."</option>"; }
			$select_box .= $exist; }
		echo json_encode($select_box); }

		

	  public function create() {

		    $this->form_validation->set_rules('field', 'Field','required');
		    $this->form_validation->set_rules('date', 'Date', 'required');
		    $this->form_validation->set_rules('time', 'Time', 'required');
		    $this->form_validation->set_rules('long', 'Long', 'required');
		    $this->form_validation->set_rules('name', 'Name', 'required');
		    $this->form_validation->set_rules('phone', 'Phone', 'required');

		    $this->load->helper('security');

		    if($this->form_validation->run() == FALSE) {
		      
					echo '<script language="javascript">';
					echo 'alert("GAGAL Ditambah");';
					echo 'window.history.go(-1);';
					echo '</script>';  
                                         redirect('myControl/viewFormArtikel'); } 
                    else {

                    $time = $this->input->post('time',TRUE);
                    $start = ltrim(substr($time, 0, 2), '0');
                    $end = (int)$start + $this->input->post('long',TRUE);
                    $over = sprintf('%02d',$end).":00:00";

					 $data = array(
						'lapangan' => $this->input->post('field', TRUE),
						'tanggalMain' => $this->input->post('date', TRUE),
						'jamMulai' => $time,
						'jamSelesai' => $over,
						'namaPemesan' => $this->input->post('name', TRUE),
						'noHp' => $this->input->post('phone', TRUE)
						);
					$this->BookingModel->addData($data);
					redirect('myControl/viewBookingBerhasil'); } }
			
        public function do_delete($id){
        		if($this->session->has_userdata('logged_in')){
		  	$group = $this->session->userdata('group');
		  	if($group != 2)
		  	{
		  		redirect(base_url('MyControl/'));}
		  }
		  else
		  {
		  	redirect(base_url('MyControl/'));
  }
                $res = $this ->BookingModel->DeleteData($id); 
        redirect('BookingController/index');   }
			
		// public function create() {

	// 	$data = array(
	// 		'lapangan' => $this->input->post('lapangan'),
	// 		'tanggalMain' => $this->input->post('tanggalMain'),
	// 		'jam' => $this->input->post('jam'),
	// 		'namaPemesan' => $this->input->post('namaPemesan'),
	// 		'noHp' => $this->input->post('noHp')
		

	// 	);
	// 	$this->BookingModel->addData($data);
 //    }
  
}

?>