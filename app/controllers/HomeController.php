<?php

declare (strict_types = 1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        $user = null;

        if ($this->auth->check()) {
            $user = $this->auth->getUser();
        }

        $articleModel = new Article();
        $articles = $articleModel->getNewsFeed();

        return $this->view('index', compact('articles', 'user'));
    }
}
