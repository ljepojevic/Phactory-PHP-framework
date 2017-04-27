<?php
namespace App\Controllers;
use \Core\View; 
use App\Models\Post;
use \Core\Request;
use \Core\Form;
use \Core\Pagination;
//use \Core\Router;
class Posts extends \Core\Controller {
	
	public function indexAction() {

		//$posts = Post::getAll();
		//$users = Post::where('votes', '>', 1)->get();
		//$posts = Post::where('title', '=', 'Lorem ipsum')->get();
		$posts = Post::all()->sortBy("created_at");
		$ret = Request::getRequest() . "=" .Request::query('n');
		View::renderTemplate('Posts/index.html.twig', [
			'posts' => $posts, 
			'year' => $ret  

		]);
	}

	public function searchAction() {
		$q = Request::get('q');
		//$posts = Post::where('title', '=', 'Lorem ipsum')->get();

		$posts = Post::where('title', 'LIKE', "%$q%")
		                  ->orWhere('content', 'LIKE', "%$q%")
		                  ->get();

		View::renderTemplate('List/index.html.twig', [
			'posts' => $posts

		]);		                  

	}

	public function listAction() {
		if (Request::get('q')) {
			$q = Request::get('q');
			$paginator = new Pagination();
			$posts = Post::where('title', 'LIKE', "%$q%")
			                  ->orWhere('content', 'LIKE', "%$q%")
			                  ->get();	
			$count = count($posts);	
			$paginator->total = $posts->count();
			$paginator->limit = 5;
			$paginator->paginate();
			$limit = $paginator->limit;
			$skip = $paginator->offset;
			$posts = Post::where('title', 'LIKE', "%$q%")
			                  ->orWhere('content', 'LIKE', "%$q%")->offset($skip)->take($limit)->get();			                  
			   
			$pages = $paginator->display;          		
		}
		else {
			$posts = Post::all();
			$paginator->total = $posts->count();
			$paginator->limit = 5;

			$paginator->paginate();
			$limit = $paginator->limit;
			$skip = $paginator->offset;
			$posts = Post::orderBy("created_at")->offset($skip)->take($limit)->get();
			

			$q="";
			$count = false;

			$pages = $paginator->display;
			
		}

		//-----------------------
		View::renderTemplate('List/index.html.twig', [
			'posts' => $posts,
			'q' => $q, 
			'count' => $count,
			'pageNum' => $pages,

		]);
	}

	public function singleAction() {
		$id = $this->route_params["did"];
		$year = $this->route_params["year"];
		$posts = Post::where('id', '=', $id)->get();
		View::renderTemplate('Posts/index.html.twig', [
			'posts' => $posts, 
			'year' => $year		         

		]);		
	}
	public function formAction() {
		View::renderTemplate('Form/index.html.twig');		
	}
	public function newAction() {
		//echo "Hello from Post@addNew";

		//Request::redirect('', 300);
		//$year = $this->route_params["year"];
		View::renderTemplate('Posts/new.html.twig', [
				         

		]);		
	}

	public function createAction() {
		// add new post
		$title = Request::post('title');
		$content = Request::post('content');

		$post = new Post;
		$post->title = $title;
		$post->content = $content;
		$post->save();

		Request::redirect('posts/list');
	}

	public function editAction() {
		//echo "Hello from Post@edit";
		//var_dump($this->route_params);
		//echo htmlspecialchars(print_r($this->route_params, true));
		$id = $this->route_params["id"]; 
		$post = Post::find($id);
		View::renderTemplate('Posts/edit.html.twig', [
			'post' => $post         
		]);	


	}

	// save your updates
	public function saveAction() {
		$id = Request::post('id');
		$title = Request::post('title');
		$content = Request::post('content');	

		$post = Post::find($id);
		$post->title = $title;
		$post->content = $content;
		$post->save();


		Request::redirect('posts/list');	
	}

	public function deleteAction() {
		$id = $this->route_params["id"]; // record to delete
		$post = Post::find($id);
		$post->delete();

		Request::redirect('posts/list');
	}

}

