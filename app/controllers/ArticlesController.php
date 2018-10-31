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
        $featuredArticles = $articleModel->getFeatured();

        $this->view('index', compact('articles', 'featuredArticles'));
    }

    public function single(string $id)
    {
        // If logged in -> get user
        if ($this->auth->check()) {
            $this->auth->getUser();
        }

        $articleModel = new Article();
        $article = $articleModel->getById($id);
        $articlesByAuthor = $articleModel->getByAuthor($article['authorId']);

        if (empty($article)) {
            $this->redirect('/404');
        }

        $this->view('article', compact('article', 'articlesByAuthor'));
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
        $articleModel = new Article();
        $article = $articleModel->getById($id);

        if ($this->auth->check()) {
            $this->auth->getUser();

            // Check if user has role writer or higher
            if (!$this->auth->hasRole(1)) {
                $this->redirect('/');

            }
            // If user is writer check if author matches logged in user
            else if (!$this->auth->hasRole(2) && $article['authorId'] !== $this->auth->user['id']) {
                $this->redirect('/');
            }

            // If user has the right permissions
            else {
                // Go back to admin dashboard if article doesnt exist
                if (!empty($article)) {
                    $this->view('/admin/articles/delete', compact('article'));
                } else {
                    $this->redirect('/admin');
                }

                // Delete article on post request
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if ($articleModel->delete($article['id'])) {
                        $this->redirect('/admin');
                    }
                }
            }
            // Redirect if there is no user signed in
        } else {
            $this->redirect('/');
        }

    }

    public function edit(string $id)
    {
        $articleModel = new Article();
        $article = $articleModel->getById($id);

        if ($this->auth->check()) {
            $this->auth->getUser();

            // Check if user has role writer or higher
            if (!$this->auth->hasRole(1)) {
                $this->redirect('/');

            }
            // If user is writer check if author matches logged in user
            else if (!$this->auth->hasRole(2) && $article['authorId'] !== $this->auth->user['id']) {
                $this->redirect('/');
            }

            // If user has the right permissions
            else {
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
                        if ($articleModel->edit($article['id'], $input)) {
                            $this->redirect("/admin");
                        } else {
                            $errors[] = 'Could not create article.';

                        }
                    }
                }
                $this->view('/admin/articles/edit', compact('input', 'errors', 'article'));
            }
            // Redirect if there is no user signed in
        } else {
            $this->redirect('/');
        }
    }
}
