<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Core\Router;
use Dotenv\Dotenv;

session_start();

$dotenv = new Dotenv(dirname(__DIR__));
$dotenv->load();

// ===== ROUTING =====
$router = new Router();

// Main Pages
$router->route('/', 'HomeController@index');

// Authentication
$router->route('/login', 'AuthController@login');
$router->route('/register', 'AuthController@register');
$router->route('/logout', 'AuthController@logout');

// Admin
$router->route('/admin', 'Admin\ArticlesController@index');

$router->route('/test/:id', 'TestController@index');

$router->dispatch();
