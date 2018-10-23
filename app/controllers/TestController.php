<?php

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
