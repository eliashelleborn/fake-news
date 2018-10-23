<?php

require_once '../app/Router.php';
require_once '../app/Database.php';
require_once '../app/models/Article.php';
require_once '../app/models/User.php';
require_once '../app/controllers/Controller.php';

// ===== ROUTING =====
$router = new Router();

$router->route('/', 'HomeController@index');
$router->route('/register', 'AuthController@register');
$router->route('/test/:id', 'TestController@index');

$router->dispatch();
