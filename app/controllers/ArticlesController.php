<?php

declare (strict_types = 1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Article;

class ArticlesController extends Controller
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

    public function single(string $id)
    {
        // If logged in -> get user
        if ($this->auth->check()) {
            $this->auth->getUser();
        }

        $articleModel = new Article();
        $article = $articleModel->getById($id);

        if (empty($article)) {
            $this->redirect('/404');
        }

        $this->view('article', compact('article'));
    }

    public function create()
    {
        if ($this->auth->check()) {
            $this->auth->getUser();
            if (!$this->auth->hasRole(1)) {
                $this->redirect('/');
            }
        } else {
            $this->redirect('/');
        }

        $errors = [];
        $input = [
            'title' => '',
            'preview' => '',
            'body' => '',
            'banner' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input['title'] = $_POST['title'];
            $input['preview'] = $_POST['preview'];
            $input['body'] = $_POST['body'];
            $input['banner'] = $_POST['banner'];

            // Check if input is missing
            foreach ($input as $key => $value) {
                if (empty($value)) {
                    $errors[] = ucfirst($key) . ' is missing.';
                }
            }

            if (count($errors) === 0) {
                $articleModel = new Article();
                if ($articleModel->create($input, $this->auth->user['id'])) {
                    $this->redirect("/admin");
                } else {
                    $errors[] = 'Could not create article.';

                }
            }
        }
        $this->view('/admin/articles/create', compact('input', 'errors'));
    }

    public function delete(string $id)
    {
        if ($this->auth->check()) {
            $this->auth->getUser();
            if (!$this->auth->hasRole(1)) {
                $this->redirect('/');
            }
        } else {
            $this->redirect('/');
        }

        $articleModel = new Article();
        $article = $articleModel->getById($id);

        if (!empty($article)) {
            $this->view('/admin/articles/delete', compact('article'));
        } else {
            $this->redirect('/admin');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($articleModel->delete($id)) {
                $this->redirect('/admin');
            }
        }
    }
}
