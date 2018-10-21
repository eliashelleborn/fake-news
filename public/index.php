<?php
echo "hello";

require_once '../app/Database.php';
require_once '../app/models/Article.php';
require_once '../app/models/User.php';
require_once '../app/controllers/Controller.php';

// MOVE ALL ROUTER LOGIC TO ROUTER CLASS!
// ===== ROUTING =====

$controller = 'HomeController';

if (isset($_GET['url'])) {

    // Split url [controller, method, param, param ...]
    $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));

    // Set controller (class name)
    $controller = ucwords($url[0]) . 'Controller';
}

// Require and create controller instance
require_once dirname(__DIR__) . '/app/controllers/' . $controller . '.php';
$controllerInstance = new $controller;

// Call given method on controller
if (isset($url[1])) {
    $controllerInstance->{$url[1]}();
} else {
    $controllerInstance->index();
}
