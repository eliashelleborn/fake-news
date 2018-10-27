<?php
declare (strict_types = 1);

namespace App\Controllers\Admin;

use App\Core\Controller;

class ArticlesController extends Controller
{
    public function index()
    {
        // Check if logged in
        if ($this->auth->check()) {
            $user = $this->auth->getUser();
            // If logged in user does not have role higher than 1
            // -> redirect
            if (!$this->auth->hasRole(1)) {
                $this->redirect('/');
            }
        }

        $this->view('/admin/index', compact('user'));
    }
}
