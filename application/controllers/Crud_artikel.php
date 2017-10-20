<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_artikel extends CI_Controller {
	 public function __construct()
    {
        parent::__construct();
        $this->load->model('mod_artikel');
        if($this->session->has_userdata('logged_in')){
            $group = $this->session->userdata('group');
            if($group != 2)
            {
                redirect(base_url('login/viewLogin')); }
          }
          else
          {
            redirect(base_url('login/viewLogin'));
  }

    }
	 function index(){
	 	$this->load->helper('url');
		// $data = $this->mod_artikel->getArtikel();
		$this->load->view('V_form_artikel');
	}
	function adminTabelEvent(){
		$this->load->helper('url');
		// $data = $this->mod_artikel->getArtikel();
		$this->load->view('v_tabel_event',array('data' => $data));
	}
	

	  public function create() {
            $this->load->library('form_validation');
            $this->load->library('encrypt');
		    $this->form_validation->set_rules('judul', 'Judul','required|min_length[5]|max_length[50]');
		    $this->form_validation->set_rules('waktu', 'Waktu', 'required','required|min_length[1]|max_length[6]');
		    $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|min_length[1]|max_length[100]');


                    
                    if ($this->form_validation->run()==FALSE ) {
                            echo '<script type="text/javascript">'; 
                            echo 'alert("Inputan Salah!");'; 
                            echo 'location.replace ("http://localhost/fifafutsal/myControl/viewFormArtikel");';
                            echo '</script>';
	 
                    } else {
                           $this->mod_artikel->InsertData();   
                            echo '<script type="text/javascript">'; 
                            echo 'alert("Data Inserted Successfully!.");'; 
                            echo 'location.replace ("http://localhost/fifafutsal/myControl/viewFormArtikel");';
                            echo '</script>';
                      }
  }

//	


        public function do_delete($id){
				$res = $this->mod_artikel->DeleteData($id);
        redirect('MyControl/viewTabelEvent'); }
	



	
}