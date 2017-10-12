<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class testingku extends TestCase
{
        public function setUp(){
        $this->resetInstance();
        $this->CI->load->model('modelku');
        $this->obj = $this->CI->modelku;
        $this->CI->load->model('Mod_artikel');
        $this->objek = $this->CI->Mod_artikel;
    }
    
        public function test_indexAdmin(){
        $_POST['username'] = "ardo";
        $_POST['pass'] = "4321";
        $output = $this->request('POST', 'MyControl/login');
        $this->assertContains('<title>Fifa - Futsal</title>', $output);
    }
        public function testCreate(){
            
            $awal = $this->objek->getCurrentRowArtikel();
            $output = $this->request(
                    'POST',
                    ['Crud_artikel', 'create'],
                    [
                        'judul' => 'asem',
                        'waktu' => '1212',
                        'deskripsi'=>'sayangs'
                        ]
                        );
            $akhir = $this->objek->getCurrentRowArtikel();
            $expected = $akhir - $awal;
            $this->assertEquals(1, $expected);
        }
}


?>