<?php
/**
 * Part of ci-phpunit-test
 *
 * @author     Kenji Suzuki <https://github.com/kenjis>
 * @license    MIT License
 * @copyright  2015 Kenji Suzuki
 * @link       https://github.com/kenjis/ci-phpunit-test
 */

class Crud_artikel_test extends TestCase
{
	public function setUp()
        {
            $this->resetInstance();
            $this->CI->load->model('Mod_artikel');
            $this->objek = $this->CI->Mod_artikel;
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
                $_SESSION['username'] = "admin";
                $_SESSION['group'] = 2;
                $_SESSION['logged_in'] = TRUE;
                $awal2 = $this->objek->getCurrentRow();  
                $output = $this->request(
                    'POST',
                    ['crud_artikel', 'create'],
                    [
                        'judul' => 'KHUSUS TEST mAES23KSAYe3ASE2',
                        'waktu' => '2017-12-12',
                        'deskripsi' => 'Hanya Tes'
                    ]
                );
                $akhir2 = $this->objek->getCurrentRow();
                $result = $akhir2 - $awal2;
                $expected = 1;
                $this->assertEquals($expected,$result);
                $output = $this->request('POST', 'crud_artikel/create');   
    	}
        public function test_index()
        {
            $_SESSION['username'] = "admin";
            $_SESSION['group'] = 2;
            $_SESSION['logged_in'] = TRUE;
               $output = $this->request('GET', 'Crud_artikel');
        }
        
        public function test_indexNoSession()
        {
            $output = $this->request('GET', 'Crud_artikel');
        }
        
        public function test_indexWrongSession()
        {
            $_SESSION['group'] = 1;
            $_SESSION['logged_in'] = TRUE;
               $output = $this->request('GET', 'Crud_artikel');
        }
        
                public function test_adminTabelEvent()
        {
            $_SESSION['username'] = "admin";
            $_SESSION['group'] = 2;
            $_SESSION['logged_in'] = TRUE;
                    $output = $this->request('GET', 'Crud_artikel/adminTabelEvent');
//            $this->assertContains('<title>Fifa - Futsal</title>', $output);
            
        }
//            
            public function test_delete(){
                $_SESSION['username'] = "admin";
            $_SESSION['group'] = 2;
            $_SESSION['logged_in'] = TRUE;
                $result = $this->objek->getTestId();
                $id = 0;
                foreach ($result as $data)
                {
                    $id = $data['id'];
                }
                $awal = $this->objek->getNumRow($id);
                $this->assertEquals(1,$awal);
                $url = "crud_artikel/do_delete/".$id;
                $output = $this->request('GET',$url);
                $akhir = $this->objek->getNumRow($id);
                $this->assertEquals(0,$akhir);
            }
}
