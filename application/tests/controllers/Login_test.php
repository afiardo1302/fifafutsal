<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Login_test extends TestCase
{
	public function setUp()
        {
            $this->resetInstance();
            $this->CI->load->model('Modelku');
            $this->objek = $this->CI->Modelku;
            $this->form_validation = new CI_Form_validation();
        }
         public function test_login(){
            $this->request('POST', 'Login/do_login',['username' => 'admin', 'pass' => 'rahasia']);
            $this->assertRedirect(base_url('Login/viewFormArtikel'));
            
        }
         public function test_login_required(){
            $output = $this->request('POST', 'Login/do_login',['username' => 'evia', 'pass' => '']);
            $this->assertRedirect(base_url('Login/viewLogin'));
        }
        
        public function test_login_wrong(){
            $output = $this->request('POST', 'Login/do_login',['username' => 'ardo', 'pass' => 'arbi']);
            $this->assertRedirect(base_url('Login/viewLogin'));
        }
        public function test_login_wrong2(){
            $output = $this->request('POST', 'Login/do_login',['username' => '', 'pass' => '']);
            $this->assertRedirect(base_url('Login/viewLogin'));
        }
             public function test_viewLogin()
	{
		$output = $this->request('POST', 'Login/viewLogin',['g-recaptcha-response','abc']);
		$this->assertContains('<title>Login</title>', $output);
	}
                public function test_viewFormArtikel()
	{
            $_SESSION['username'] = "admin";
            $_SESSION['group'] = 2;
            $_SESSION['logged_in'] = TRUE;
            $output = $this->request('GET', 'Login/viewFormArtikel');
            $this->assertContains('<title>Fifa - Futsal</title>', $output);
	}
        
}
        
        
        ?>

