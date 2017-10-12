<?php
/**
 * Part of ci-phpunit-test
 *
 * @author     Kenji Suzuki <https://github.com/kenjis>
 * @license    MIT License
 * @copyright  2015 Kenji Suzuki
 * @link       https://github.com/kenjis/ci-phpunit-test
 */

class Welcome_test extends TestCase
{
	public function test_index()
	{
		$output = $this->request('GET', 'MyControl/indextest');
		$this->assertContains('<title>Business Casual - FIFA fUTSAL</title>',$output);
	}
        public function test_viewLogin()
	{
		$output = $this->request('GET', 'MyControl/viewLogin');
		$this->assertContains('<title>Login</title>', $output);
	}
        public function test_viewFormArtikel()
	{
		$output = $this->request('GET', 'MyControl/viewFormArtikel');
		$this->assertContains('<title>Fifa - Futsal</title>', $output);
	}
        public function test_viewContact()
	{
		$output = $this->request('GET', 'MyControl/viewContact');
		$this->assertContains('<title>FIFA FUTSAL</title>', $output);
	}


        public function indexTest1()
	{
		$output = $this->request('GET', 'MyControl/indextest');
		$this->assertContains('<title>Business Casual - FIFA fUTSAL</title>', $output);
	}
	public function test_method_404()
	{
		$this->request('GET', 'welcome/method_not_exist');
		$this->assertResponseCode(404);
	}

	public function test_APPPATH()
	{
		$actual = realpath(APPPATH);
		$expected = realpath(__DIR__ . '/../..');
		$this->assertEquals(
			$expected,
			$actual,
			'Your APPPATH seems to be wrong. Check your $application_folder in tests/Bootstrap.php'
		);
	}
}
