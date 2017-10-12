<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('mod_login');
  }

  // public function index()
  // {
  //   $this->form_validation->set_rules('username','Username','required');
  //   $this->form_validation->set_rules('pass','Password','required');
    
  //   if($this->form_validation->run() == FALSE) {
  //      redirect('myControl/viewLogin');
  //         echo '<script language="javascript">';
  //         echo 'alert("GAGAL LOGIN");';
  //         echo 'window.history.go(-1);';
  //         echo '</script>';  
  //   } else {
  //     $this->load->model('mod_login');
  //     $check = $this->mod_login->check();

  //     if($check == FALSE) {
  //       // $this->session->set_flashdata('error','Wrong Username/Password');
  //       redirect('login');
  //     } else {
  //       $newdata = array(
  //              'username'  => $check->username,
  //              'logged_in' => TRUE
  //          );
  //       // session_start();
  //       // $this->session->set_userdata($newdata);

  //       $this->session->set_userdata($check->username);
  //       $this->session->set_userdata($check->groups);

  //       switch($check->groups) {
  //         case 1 : redirect ('admin');
  //                  break;
  //         case 2 : redirect ('home1');
  //                  break;
  //         default : break;
  //       }
  //     }
  //   }
  // }

  public function login() {
    
    // create the data object
    // $data = new stdClass();
    
    // load form helper and validation library
    $this->load->helper('form');
    $this->load->library('form_validation');
    
    // set validation rules
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('pass', 'Password', 'required');
    
    if ($this->form_validation->run() == false) {
       $this->load->view('login');
       echo "gagal";
      // validation not ok, send validation errors to the view
     
     
    } else {
      
      // set variables from the form
      $username = $this->input->post('username');
      $password = $this->input->post('pass');
      
      if ($this->mod_login->resolve_user_login($username, $password)) {
        echo "sukses";
        
        

        
      } 
      
    }
    
  }

  public function view($halaman = 'login')
  {
    if(!file_exists(APPPATH."views/login/".$halaman.'.php')) {
    show_404();
    }

    if($halaman === 'home1') {
      $data['home'] = $this->news_model->get_news();
      $this->load->view('home/'.$halaman, $data);
    } else {
      $this->load->view('login/'.$halaman);
    }

  }


}
