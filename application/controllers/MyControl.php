<?php
class MyControl extends CI_Controller {
	public function __construct() {
	parent::__construct();
	$this->load->model('modelku');
	$this->load->model('BookingModel');
	$this->load->model('mod_artikel');

	// $this->load->model('mod_crud');
	// $this->load->model('mod_produk');
}
		function index(){
			$this->load->view('header');	
			$this->load->view('index');
			$this->load->view('footer');
		}

		function viewEvent(){
			$this->load->helper(array('url'));
			$this->load->model('pagination_model');

			$this->load->database();
			$jumlah_data = $this->pagination_model->record_count();

			$this->load->library('pagination');

			$config['base_url'] = base_url().'index.php/mycontrol/event/';
			$config['total_rows'] = $jumlah_data;
			$config['per_page'] = 10;
			$from = $this->uri->segment(3);
			$this->pagination->initialize($config);

			$data['result'] = $this->pagination_model->fetch_data($config['per_page'],$from);

			$this->load->view('header');	
			$this->load->view('event',$data);
			$this->load->view('footer');
		}

//		function index() {
//		
//		$this->load->view('index');
//            }
		function viewLogin(){
			$this->load->view('login');	

		}
		
		function viewContact(){
			$this->load->view('header');
			$this->load->view('contact');
			$this->load->view('footer');
		}

//		function viewBooking(){
//
//			$this->load->view('Booking_View');
//		}
		function viewFormBooking(){

			$this->load->view('v_form_booking');
		}

		function viewFormArtikel(){
			$this->load->view('V_dashboard_header');
			$this->load->view('V_form_artikel');
			$this->load->view('V_dashboard_footer');
		}

		function viewOrderHistory(){

			$data = $this->BookingModel->getBooking();
			$this->load->view('V_dashboard_header');
			$this->load->view('v_orderHistory', array('data' => $data));
			$this->load->view('V_dashboard_footer');

					}
		function viewTabelEvent(){

			$data = $this->mod_artikel->getArtikel();
			$this->load->view('V_dashboard_header');
			$this->load->view('v_tabel_event', array('data' => $data));
			$this->load->view('V_dashboard_footer');

		}
               
//		function login(){
//			$this->form_validation->set_rules('username','Username','trim|required');
//			$this->form_validation->set_rules('pass','Password','trim|required');
//
//			if($this->form_validation->run() == TRUE)
//			{
//				$this->load->helper('security');
//				$username = $this->input->post('username',TRUE);
//				$password = $this->input->post('pass',TRUE);
//				$enc = sha1($password);
//				
//				$isLogin = $this->modelku->login_authen($username, $enc);
//				
//				if ($isLogin == true) {	
//					$group = $this->modelku->login_group($username, $enc);
//
//					$session_data = array(
//						'username'	=> $username,
//						'group'		=> $group,
//						'logged_in'	=> TRUE
//						);
//
//					$this->session->set_userdata($session_data);
//					redirect(base_url("MyControl/viewFormArtikel")); } 
//	            else {
//	                redirect(base_url('MyControl/viewLogin')); } } 
//                else {
//	        	redirect(base_url('MyControl/viewLogin')); } }
//		
        function logout(){
		    $this->session->unset_userdata('username');
		    $this->session->unset_userdata('group');
		    $this->session->unset_userdata('logged_in');
                    $this->session->sess_destroy();
                    redirect(base_url('MyControl/viewLogin')); }
		//Ga dipake
	
		
}
?>

