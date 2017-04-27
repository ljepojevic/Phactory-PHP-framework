<?php
namespace App\Controllers;
use \Core\View; 

class Home extends \Core\Controller {

	protected function before() {

	}
	protected function after() {

	}

	public function indexAction() {

		View::renderTemplate('Home/index.html.twig', [
			'name' => 'Milan',
			'colors' => ['red', 'blue', 'green'], 
			'year' => date('Y')		         

		]);
	}

}