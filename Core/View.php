<?php
namespace Core;
use App\Config;
//use Core\Form;

class View extends \Core\Form {

	// basic view method using .php files

	public static function render($view, $args = []){
		
		extract($args, EXTR_SKIP);

		$file = "../App/Views/$view";

		if (is_readable($file)) {
			require $file;
		}
		else {
			throw new \Exception("$file not found");
		}
	}

	//  Render a view template using Twig

	public static function renderTemplate($template, $args = []) {
		static $twig = null;
		/*
		private $server = $_SERVER['SERVER_NAME'];
		private $baseURL = "http://" . $server . "/phactory/";
		*/
		if ($twig === null) {
			$loader = new \Twig_Loader_Filesystem('../App/Views');
			$twig = new \Twig_Environment($loader);	
			//----------
			$forms = new \Twig_SimpleFilter('form', function($type, $name, $value = '', $attributes = []){

				if ($type == 'close') {  //  name, action, attributes
					return \Core\Form::close();
				}
				else {
					return \Core\Form::$type($name, $value, $attributes);
				}
			});

			$twig->addFilter($forms);

			$urls = new \Twig_SimpleFilter('url', function($route){
				return \Core\Request::url($route);
			});
			$twig->addFilter($urls);

			$base = new \Twig_SimpleFilter('baseUrl', function(){
				return "http://" . Config::DB_HOST . Config::BASE_DIR;
			});
			$twig->addFilter($base);

		}

		echo $twig->render($template, $args);
	}
}