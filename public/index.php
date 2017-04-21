<?php

// Twig Template Engine

require_once dirname(__DIR__) . '/vendor/Twig-1.x/lib/Twig/Autoloader.php';
Twig_Autoloader::register();

// Autoloader 

spl_autoload_register(function ($class){
	$root = dirname(__DIR__);
	$file = $root . "/" . str_replace('\\', '/', $class).".php";
	if (is_readable($file)){
		require $file;
	}
});

// Error and Exception handling

error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


// Timezone

date_default_timezone_set('Europe/Belgrade');

// Routing

$router = new Core\Router();


$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add('new', ['controller' => 'Old', 'action' => 'make']);
//$router->add('con', ['controller' => 'Posts', 'action' => 'index']);
$router->add('posts/new', ['controller' => 'Posts', 'action' => 'new']);

$router->add('{controller}/{action}');
//$router->add('admin{action}/{controller}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);

$router->add('posts/user/{id:\d+}', ['controller' => 'Posts', 'action' => 'show']);

$router->add('{controller}/{action}/{id:\d+}');

$router->dispatch($_SERVER['QUERY_STRING']);