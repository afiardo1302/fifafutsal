<?php
class MyControl extends CI_Controller {
	public function __construct() {
	parent::__construct();
	$this->load->model('modelku');
	// $this->load->model('mod_crud');
	// $this->load->model('mod_produk');
}
		function indextest(){
			$this->load->view('header');	
			$this->load->view('index');
			$this->load->view('footer');
		}

//		function event(){
//			$this->load->helper(array('url'));
//			$this->load->model('pagination_model');
//
//			$this->load->database();
//			$jumlah_data = $this->pagination_model->record_count();
//
//			$this->load->library('pagination');
//
//			$config['base_url'] = base_url().'index.php/mycontrol/event/';
//			$config['total_rows'] = $jumlah_data;
//			$config['per_page'] = 10;
//			$from = $this->uri->segment(3);
//			$this->pagination->initialize($config);
//
//			$data['result'] = $this->pagination_model->fetch_data($config['per_page'],$from);
//
//			$this->load->view('header');	
//			$this->load->view('event',$data);
//			$this->load->view('footer');
//		}

		function index() {
		
		$this->load->view('index');
	}
		function viewLogin(){
			$this->load->view('login');	

		}
		function viewFormArtikel(){

			$this->load->view('V_form_artikel');
		}
		function viewContact(){
			$this->load->view('contact');
		}
		function login(){
			$username = $this->input->post('username');
			$password = $this->input->post('pass');
			// $enc = sha1($password);
			// $i = $this->modelku->authen_user($username);
			$isLogin = $this->modelku->login_authen($username, $password);
			

			if ($isLogin == true) {
			$data_session = array(
				'nama'=>$username,
				'status'=>"login"
			);
			//$this->session->set_userdata($data_session);	
			 redirect(base_url("myControl/viewFormArtikel"));
//			echo "Sukses";

		}
			else{
//				$this->index();
//				echo '<script language="javascript">';
//				echo 'alert("Login Gagal");';
//				echo 'window.history.go(-1);';
//				echo '</script>';
                           echo  "<p>The Password field is required.</p>";
			
		}	
		
	}
		function logout(){
			$this->session->sess_destroy();
			redirect(base_url('index.php/myControl/viewLogin'));

		}
		//Ga dipake
	
		
}
?>

