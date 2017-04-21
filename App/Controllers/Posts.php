<?php
namespace App\Controllers;
use \Core\View; 
use App\Models\Post;

class Posts extends \Core\Controller {
	

	public function indexAction() {

		$posts = Post::getAll();

		View::renderTemplate('Posts/index.twig', [
			'posts' => $posts, 
			'year' => date('Y')			         

		]);
	}

	public function addNewAction() {
		echo "Hello from Post@addNew";
	}

	public function editAction() {
		echo "Hello from Post@edit";
		echo htmlspecialchars(print_r($this->route_params, true));
	}


}