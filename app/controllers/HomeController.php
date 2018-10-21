<?php

class HomeController extends Controller
{
    public function index()
    {
        $articleModel = new Article();
        $articles = $articleModel->getNewsFeed();

        return $this->view('index', compact('articles'));
    }
}
