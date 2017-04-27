<?php

// Twig Template Engine

require_once dirname(__DIR__) . '/vendor/Twig-1.x/lib/Twig/Autoloader.php';
Twig_Autoloader::register();
//-----------------------------------------
// OAuth 2.0
require_once(dirname(__DIR__) . '/vendor/oauth2-server-php/src/OAuth2/Autoloader.php');
OAuth2\Autoloader::register();
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
$router->set('posts/new', ['controller' => 'Posts', 'action' => 'new']);
$router->set('form', ['controller' => 'Posts', 'action' => 'form']);
$router->set('posts/add', ['controller' => 'Posts', 'action' => 'create']);
$router->set('posts/edit/{id:\d+}', ['controller' => 'Posts', 'action' => 'edit']);
$router->set('posts/save', ['controller' => 'Posts', 'action' => 'save']);

$router->set('posts/list', ['controller' => 'Posts', 'action' => 'list']);
$router->set('posts/delete/{id:\d+}', ['controller' => 'Posts', 'action' => 'delete']);
$router->set('posts/one/{did:\d+}/{year:\d+}', ['controller' => 'Posts', 'action' => 'single']);

$router->set('', ['controller' => 'Home', 'action' => 'index']);
$router->set('posts', ['controller' => 'Posts', 'action' => 'index']);

$router->set('posts/user/{id:\d+}', ['controller' => 'Posts', 'action' => 'show']);
$router->set('{controller}/{action}');
$router->set('admin/{controller}/{action}', ['namespace' => 'Admin']);



$router->set('{controller}/{action}/{id:\d+}');

$router->dispatch($_SERVER['QUERY_STRING']);