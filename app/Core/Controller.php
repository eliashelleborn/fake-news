<?php
declare (strict_types = 1);

namespace App\Core;

use App\Models\Auth;

class Controller
{
    protected $auth = null;

    public function __construct()
    {
        $this->auth = new Auth();
    }

    public function view(string $name, array $vars = [])
    {
        extract($vars);
        require_once dirname(__DIR__) . '/views/' . $name . '.php';
    }

    public function redirect(string $url)
    {
        $baseUrl = getenv("BASE_URL");
        header("location: {$baseUrl}{$url}");
    }
}
