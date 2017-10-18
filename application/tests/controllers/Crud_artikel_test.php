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
                $expected = $akhir2 - $awal2;
                $output = $this->request('POST', 'crud_artikel/create');   
    	}
           public function test_index()
        {
            $output = $this->request('GET', 'Crud_artikel');
//            $this->assertContains('<title>Fifa - Futsal</title>', $output);
            
        }
                public function test_adminTabelEvent()
        {
            $output = $this->request('GET', 'Crud_artikel/adminTabelEvent');
//            $this->assertContains('<title>Fifa - Futsal</title>', $output);
            
        }
//            
            public function test_delete(){
                $result = $this->objek->getTestId();
                $id = 0;
                foreach ($result as $data)
                {
                    $id = $data['id'];
                }
                $url = "crud_artikel/do_delete/".$id;
                $output = $this->request('GET',$url);
            }
}
