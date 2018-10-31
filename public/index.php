<?php

declare (strict_types = 1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

use App\Core\Router;
use Dotenv\Dotenv;

session_start();

$_SERVER['DOCUMENT_ROOT'] = dirname(__DIR__);

$dotenv = new Dotenv(dirname(__DIR__));
$dotenv->load();

// ===== ROUTING =====
$router = new Router();

// Main Pages
$router->route('/', 'ArticlesController@index');
$router->route('/articles/:id', 'ArticlesController@single');
$router->route('/authors/:id', 'UsersController@single');

// Authentication
$router->route('/login', 'AuthController@login');
$router->route('/register', 'AuthController@register');
$router->route('/logout', 'AuthController@logout');

// Admin
$router->route('/admin', 'AdminController@index');
$router->route('/admin/articles/create', 'ArticlesController@create');
$router->route('/admin/articles/:id/delete', 'ArticlesController@delete');
$router->route('/admin/articles/:id/edit', 'ArticlesController@edit');

$router->route('/404', 'NotFoundController@index');

$router->dispatch();
