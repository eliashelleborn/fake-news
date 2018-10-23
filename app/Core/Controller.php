<?php
declare (strict_types = 1);

namespace App\Core;

class Controller
{
    public function view(string $name, array $vars = [])
    {
        extract($vars);
        require_once dirname(__DIR__) . '/views/' . $name . '.php';
    }

    public function redirect(string $url)
    {
        header("location: {$url}");
    }
}
