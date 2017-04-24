<?php

// Twig Template Engine

require_once dirname(__DIR__) . '/vendor/Twig-1.x/lib/Twig/Autoloader.php';
Twig_Autoloader::register();
//-----------------------------------------
// Eloquent ORM

require dirname(__DIR__) . '/vendor/autoload.php';
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'phactory',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Make this Capsule instance available globally via static methods
$capsule->setAsGlobal();

// Setup the Eloquent ORM
$capsule->bootEloquent();

//-----------------------------------------
// Autoloader 

spl_autoload_register(function ($class){
	$root = dirname(__DIR__);
	$file = $root . "/" . str_replace('\\', '/', $class).".php";
	if (is_readable($file)){
		require $file;
	}
});
//-----------------------------------------
// Error and Exception handling

error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

//-----------------------------------------
// Timezone

date_default_timezone_set('Europe/Belgrade');
//-----------------------------------------
// Routing

$router = new Core\Router();

$router->add('posts/one/{did:\d+}/{year:\d+}', ['controller' => 'Posts', 'action' => 'single']);

$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
$router->add('new', ['controller' => 'Old', 'action' => 'make']);
//$router->add('con', ['controller' => 'Posts', 'action' => 'index']);
$router->add('posts/new', ['controller' => 'Posts', 'action' => 'addNew']);
$router->add('posts/user/{id:\d+}', ['controller' => 'Posts', 'action' => 'show']);
$router->add('{controller}/{action}');
//$router->add('admin{action}/{controller}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);



$router->add('{controller}/{action}/{id:\d+}');

$router->dispatch($_SERVER['QUERY_STRING']);