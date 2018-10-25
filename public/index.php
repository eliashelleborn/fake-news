<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Core\Router;
use Dotenv\Dotenv;

session_start();

$dotenv = new Dotenv(dirname(__DIR__));
$dotenv->load();

// ===== ROUTING =====
$router = new Router();

$router->route('/', 'HomeController@index');

$router->route('/login', 'AuthController@login');
$router->route('/register', 'AuthController@register');
$router->route('/logout', 'AuthController@logout');

$router->route('/test/:id', 'TestController@index');

$router->dispatch();
