<?php
namespace App\Controllers\Admin;

class Users extends \Core\Controller {

	public function indexAction() {
		echo "Hello from Admin/Home@index";
	}

	protected function before() {
		echo "::before:: ";
	}
	protected function after() {
		echo " ::after::";
	}
}