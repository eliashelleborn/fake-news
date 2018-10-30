<?php
declare (strict_types = 1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Article;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $userModel = new User();
        $articleModel = new Article();

        // Check if logged in
        if ($this->auth->check()) {
            $this->auth->getUser();
            // If logged in user does not have role higher than 1
            // -> redirect
            if (!$this->auth->hasRole(1)) {
                $this->redirect('/');
            }
        } else {
            $this->redirect('/');
        }

        // Get all or authenticated users articles
        // Depending on what role they have
        // Also if user is admin get all users
        if ($this->auth->user['role'] === "1") {
            $articles = $articleModel->getByAuthor($this->auth->user['id']);
        } else if ($this->auth->user['role'] === "2") {
            $articles = $articleModel->getAll();
            $users = $userModel->getAll();
        }

        $this->view('/admin/index', compact('articles', 'users'));
    }

    public function articles()
    {

    }

    public function users()
    {

    }
}
