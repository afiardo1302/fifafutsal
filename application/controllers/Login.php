<?php
class Login extends CI_Controller {
	public function __construct() {
	parent::__construct();
	$this->load->model('modelku');
        
        
        }

	public function do_login(){
			$this->form_validation->set_rules('username','Username','trim|required');
			$this->form_validation->set_rules('pass','Password','trim|required');

			if($this->form_validation->run() == TRUE)
			{
				$this->load->helper('security');
				$username = $this->input->post('username',TRUE);
				$password = $this->input->post('pass',TRUE);
				$enc = sha1($password);
				
				$isLogin = $this->modelku->login_authen($username, $enc);
				
				if ($isLogin == true) {	
					$group = $this->modelku->login_group($username, $enc);

					$session_data = array(
						'username'	=> $username,
						'group'		=> $group,
						'logged_in'	=> TRUE
						);

					$this->session->set_userdata($session_data);
					redirect(base_url("Login/viewFormArtikel")); } 
	            else {
	                redirect(base_url('Login/viewLogin')); } } 
                else {
	        	redirect(base_url('Login/viewLogin')); } }
                        
                  public function viewLogin(){
                  	$recaptcha = $this->input->post('g-recaptcha-response');
			        if (!empty($recaptcha)) {
			            $response = $this->recaptcha->verifyResponse($recaptcha);
			            if (isset($response['success']) and $response['success'] === true) {
			                echo "You got it!";
			            }
			        }
			        $data = array(
			            'widget' => $this->recaptcha->getWidget(),
			            'script' => $this->recaptcha->getScriptTag(),
			        );
			        $this->load->view('login', $data);

                        }
                    public function viewFormArtikel(){
			$this->load->view('V_dashboard_header');
			$this->load->view('V_form_artikel');
			$this->load->view('V_dashboard_footer');
		}      
                        
	
	}
	




?>
