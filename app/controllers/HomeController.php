<?php

declare (strict_types = 1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        // If logged in -> get user
        if ($this->auth->check()) {
            $this->auth->getUser();
        }

        $articleModel = new Article();
        $articles = $articleModel->getNewsFeed();

        $this->view('index', compact('articles'));
    }
}
