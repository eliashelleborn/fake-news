<?php

declare (strict_types = 1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\Article;
use App\Models\User;

class UsersController extends Controller
{
    public function single(string $id)
    {
        // If logged in -> get user
        if ($this->auth->check()) {
            $this->auth->getUser();
        }

        $userModel = new User();
        $user = $userModel->getById($id);

        $articleModel = new Article();
        $articles = $articleModel->getByAuthor($id);

        if (empty($user)) {
            $this->redirect('/404');
        }

        if ($user['role'] > 0) {
            $this->view('author', compact('user', 'articles'));
        } else {
            $this->redirect('/404');
        }

    }
}
