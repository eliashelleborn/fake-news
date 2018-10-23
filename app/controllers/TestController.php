<?php
declare (strict_types = 1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Article;

class TestController extends Controller
{
    public function index(string $id = "1")
    {
        $articleModel = new Article();
        $articles = $articleModel->getNewsFeed();

        echo $id;

        return $this->view('index', compact('articles'));
    }
}
