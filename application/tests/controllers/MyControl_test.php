<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class MyControl_test extends TestCase
{
        public function setUp(){
            $this->resetInstance();
            $this->CI->load->model('Mod_artikel');
            $this->objek = $this->CI->Mod_artikel;
            $this->CI->load->model('Pagination_model');
            $this->objek2 = $this->CI->Pagination_model;
            $this->form_validation = new CI_Form_validation();
        }
        public function test_index()
	{
		$output = $this->request('GET', 'MyControl/index');
		$this->assertContains('<title>Business Casual - FIFA fUTSAL</title>',$output);
	}
        public function test_viewLogin()
	{
		$output = $this->request('GET', 'MyControl/viewLogin');
		$this->assertContains('<title>Login</title>', $output);
	}
        

        
        public function test_viewFormArtikel()
	{
            $_SESSION['username'] = "admin";
            $_SESSION['group'] = 2;
            $_SESSION['logged_in'] = TRUE;
            $output = $this->request('GET', 'MyControl/viewFormArtikel');
            $this->assertContains('<title>Fifa - Futsal</title>', $output);
	}
        public function test_viewFormBooking()
	{
            $_SESSION['username'] = "admin";
            $_SESSION['group'] = 2;
            $_SESSION['logged_in'] = TRUE;
            $output = $this->request('GET', 'MyControl/viewFormBooking');
            $this->assertContains('Booking', $output);
	}
        public function test_viewContact()
	{
            $output = $this->request('GET', 'MyControl/viewContact');
            $this->assertContains('<title>Business Casual - FIFA fUTSAL</title>', $output);
	}
        
        public function test_viewOrderHistory()
	{
            $_SESSION['username'] = "admin";
            $_SESSION['group'] = 2;
            $_SESSION['logged_in'] = TRUE;
            $output = $this->request('GET', 'MyControl/viewOrderHistory');
            $this->assertContains('<title>Fifa - Futsal</title>', $output);
	}
        
        public function test_tabelEvent()
	{
            $_SESSION['username'] = "admin";
            $_SESSION['group'] = 2;
            $_SESSION['logged_in'] = TRUE;
            $output = $this->request('GET', 'MyControl/viewTabelEvent');
            $this->assertContains('<title>Fifa - Futsal</title>', $output);
	}
        public function indexTest1()
	{
		$output = $this->request('GET', 'MyControl/indextest');
		//$this->assertContains('<title>Business Casual - FIFA fUTSAL</title>', $output);
                    
	}
         
        public function test_logout(){
            $_SESSION['username'] = "admin";
            $_SESSION['group'] = 2;
            $_SESSION['logged_in'] = TRUE;
            $output = $this->request('GET','MyControl/logout');
            $this->assertRedirect(base_url('MyControl/viewLogin'));
        }
        
        public function test_viewBerhasil(){
            $output = $this->request('GET','MyControl/viewBookingBerhasil');
        }
        
        public function test_viewEvent(){
            $data = $this->objek2->fetch_data(5,1);
            $output = $this->request('GET', 'MyControl/viewEvent');
            foreach ($data as $row){
                
                $judul 		= $row->judul;
                $this->assertContains($judul,$output);
            }
        }
        
        public function test_viewEvent_fail(){
            $data = $this->objek2->fetch_data(10,1);
            $output = $this->request('GET', 'MyControl/viewEvent/0');
        }

 
}
