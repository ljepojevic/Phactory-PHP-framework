<?php
namespace Core;

class View {

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

		if ($twig === null) {
			$loader = new \Twig_Loader_Filesystem('../App/Views');
			$twig = new \Twig_Environment($loader);			
		}

		echo $twig->render($template, $args);
	}
}