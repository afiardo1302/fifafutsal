<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BookingController_test extends TestCase
{
	public function setUp()
        {
            $this->resetInstance();
            $this->CI->load->model('BookingModel');
            $this->objek = $this->CI->BookingModel;
            $this->form_validation = new CI_Form_validation();
        }
    
//        public function test_index()
//        {
//            $_POST['username'] = "ardo";
//            $_POST['pass'] = "4321";
//            $output = $this->request('POST', 'MyControl/login');
//            $this->assertContains('<title>Fifa - Futsal</title>', $output);
//        }
        
        public function test_create()
    	{        
                $awal2 = $this->objek->getCurrentRow();  
                $output = $this->request(
                    'POST',
                    ['BookingController', 'create'],
                    [
                        'field' => 'A',
                        'date' => '2017-10-15',
                        'time' => '09:00:00',
                        'long' => 2,
                        'name' => 'Hanya Tes',
                        'phone' => '081234554321'
                    ]
                );
                $akhir2 = $this->objek->getCurrentRow();
                $expected = $akhir2 - $awal2;
//                $output = $this->request('POST', 'BookingController/create');   
    	}
        
                public function test_create_salah()
    	{        
                $awal2 = $this->objek->getCurrentRow();  
                $output = $this->request(
                    'POST',
                    ['BookingController', 'create'],
                    [
                        'field' => 'A',
                        'date' => '',
                        'time' => '',
                        'long' => 2,
                        'name' => 'Hanya Tes',
                        'phone' => '081234554321'
                    ]
                );
                $akhir2 = $this->objek->getCurrentRow();
                $expected = $akhir2 - $awal2;
                $output = $this->request('POST', 'BookingController/create');
                $this->assertRedirect(base_url('myControl/viewFormArtikel'));
    	}
           public function test_index()
        {
            $output = $this->request('GET', 'BookingController');
//            $this->assertContains('<title>Fifa - Futsal</title>', $output);
            
        }

//            
            public function test_do_delete(){
                $_SESSION['logged_in'] = TRUE;
                $_SESSION['group'] = 2;
                $awal = $this->objek->getCurrentRow();
                $result = $this->objek->getTestId();
                $id = 0;
                foreach ($result as $data)
                {
                    $id = $data['id'];
                }
                $url = "BookingController/do_delete/".$id;
                $output = $this->request('GET',$url);
                $akhir = $this->objek->getCurrentRow();
                $result = $awal - $akhir;
                $expected = 1;
                $this->assertEquals($expected,$result);
            }
            
        public function test_getJamKosong(){
            $output = $this->request('POST', ['BookingController','getJamKosong'], ['field' => 'A', 'date' => '2017-10-16']);
        }
//        public function test_getJamMulaiKosong(){
//            $output = $this->request('POST', ['BookingController','getJamKosong'], ['field' => 'A', 'date' => '2017-10-16']);
//        }
}


