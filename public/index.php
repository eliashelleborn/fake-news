<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Core\Router;

putenv("BASE_URL=http://localhost:8888/fake-news/public");

// ===== ROUTING =====
$router = new Router();

$router->route('/', 'HomeController@index');
$router->route('/register', 'AuthController@register');
$router->route('/test/:id', 'TestController@index');

$router->dispatch();
