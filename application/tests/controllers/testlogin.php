<?php
/**
 * Part of ci-phpunit-test
 *
 * @author     Kenji Suzuki <https://github.com/kenjis>
 * @license    MIT License
 * @copyright  2015 Kenji Suzuki
 * @link       https://github.com/kenjis/ci-phpunit-test
 */

class testlogin extends TestCase
{ 
 
      
    function test_login(){
        $this->request('POST', 'MyControl/login',
                [
                    'username' => 'ardo',
                    'pass' => '4321',                   
                ]
        ); 
        $this->assertRedirect('V_form_artikel');
    }
    
    function test_login1(){
        $output = $this->request('POST', 'MyControl/login',
                [
                    'username' => 'ardu',
                    'password' => '',                   
                ]
        ); 
        $this->assertContains('<p>The Password field is required.</p>', $output);
    }

}
