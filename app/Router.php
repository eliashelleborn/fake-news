<?php

class Router
{
    private $routes = [];
    private $controller = null;
    private $method = 'index';
    private $params = [];

    public function __construct()
    {

    }

    public function route(string $route, string $handler)
    {
        $splitHandler = explode('@', $handler);
        $this->routes[] = ['route' => $route, 'controller' => $splitHandler[0], 'method' => $splitHandler[1]];
    }

    public function dispatch()
    {
        $route = null;
        // Split url [controller, method, param, param ...]
        $url = isset($_GET['url']) ? explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL)) : [];
        $route = $this->match($url);

        $this->getController($route);
        $this->getParams($url, $route);

        $method = isset($route['method']) ? $route['method'] : 'index';
        $this->controller->{$method}(...array_values($this->params));
    }

    public function match(array $url): array
    {
        array_unshift($url, "");
        foreach ($this->routes as $route) {
            $splitRoute = explode('/', filter_var(rtrim($route['route'], '/'), FILTER_SANITIZE_URL));
            $matchStatus = [];
            if (count($splitRoute) === count($url)) {
                foreach ($splitRoute as $key => $value) {
                    if (substr($value, 0, 1) !== ':') {
                        if (strtolower($value) === strtolower($url[$key])) {
                            $matchStatus[] = true;
                        } else {
                            $matchStatus[] = false;
                        }
                    } else {
                        continue;
                    }
                }
            } else {
                continue;
            }
            if (!in_array(false, $matchStatus)) {
                return $route;
            }
        }
        return ['route' => '/404', 'controller' => "NotFoundController"];
    }

    public function getController(array $route)
    {
        // Require and create controller instance
        require_once dirname(__DIR__) . '/app/controllers/' . $route['controller'] . '.php';
        $this->controller = new $route['controller'];
    }

    public function getParams(array $url, array $route)
    {
        $splitRoute = array_values(array_filter(explode('/', filter_var(rtrim($route['route'], '/'), FILTER_SANITIZE_URL))));
        foreach ($splitRoute as $key => $value) {
            if (substr($value, 0, 1) === ':') {
                $this->params[substr($value, 1)] = $url[$key];
            }
        }
    }
}
