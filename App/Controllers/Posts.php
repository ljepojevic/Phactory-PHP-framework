<?php
namespace App\Controllers;
use \Core\View; 
use App\Models\Post;
use \Core\Request;
//use \Core\Router;
class Posts extends \Core\Controller {
	

	public function indexAction() {

		//$posts = Post::getAll();
		//$users = Post::where('votes', '>', 1)->get();
		//$posts = Post::where('title', '=', 'Lorem ipsum')->get();
		$posts = Post::all()->sortBy("created_at");
		$ret = Request::getRequest() . "=" .Request::query('n');
		View::renderTemplate('Posts/index.twig', [
			'posts' => $posts, 
			'year' => $ret         

		]);
	}

	public function singleAction() {
		$id = $this->route_params["did"];
		$year = $this->route_params["year"];
		$posts = Post::where('id', '=', $id)->get();
		View::renderTemplate('Posts/index.twig', [
			'posts' => $posts, 
			'year' => $year		         

		]);		
	}

	public function addNewAction() {
		echo "Hello from Post@addNew";

		Request::redirect('redirected');
	}

	public function editAction() {
		echo "Hello from Post@edit";
		var_dump($this->route_params);
		echo htmlspecialchars(print_r($this->route_params, true));
	}


}