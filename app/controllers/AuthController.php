<?php
declare (strict_types = 1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

class AuthController extends Controller
{
    public function register()
    {

        $errors = [];
        $input = [
            'email' => '',
            'username' => '',
            'password' => '',
            'confirmPassword' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input['email'] = $_POST['email'];
            $input['username'] = $_POST['username'];
            $input['password'] = $_POST['password'];
            $input['confirmPassword'] = $_POST['confirmPassword'];

            // Check if input is missing
            foreach ($input as $key => $value) {
                if ($key !== 'confirmPassword' && empty($value)) {
                    $errors[] = ucfirst($key) . ' is missing.';
                }
            }

            if (count($errors) === 0) {
                // See if user with email already exists
                $userModel = new User();
                $emailInUse;

                try {
                    $userModel->getByEmail($input['email']);
                } catch(\Exception $e) {

                }

                if () {
                    // Confirm Passwords
                    if ($input['password'] === $input['confirmPassword']) {
                        // Create hash & try create user
                        $userModel->create($input);

                        $_SESSION['email'] = $input['email'];

                        /* $this->redirect("/"); */

                    } else {
                        $errors[] = 'Passwords did not match.';
                    }
                } else {
                    $errors[] = 'Email is already in use.';
                }

            }
        }

        return $this->view('/auth/register', compact('input', 'errors'));
    }

    public function login()
    {
        $errors = [];
        $input = [
            'email' => '',
            'password' => '',
        ];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input['email'] = $_POST['email'];
            $input['password'] = $_POST['password'];

            // Check if input is missing
            foreach ($input as $key => $value) {
                if (empty($value)) {
                    $errors[] = ucfirst($key) . ' is missing.';
                }
            }

            if (count($errors) === 0) {
                $userModel = new User();

                try {
                    $user = $userModel->getByEmail($input['email']);
                } catch (\Exception $e) {
                    $errors[] = $e->getMessage();
                }

                // If user exists
                if ($user) {
                    if (password_verify($input['password'], $user['password'])) {
                        // Login and redirect
                        $_SESSION['email'] = $input['email'];
                        $this->redirect("/");
                    } else {
                        $errors[] = "Passwords did not match.";
                    }
                } else {
                    $errors[] = "No user with that email was found.";
                }
            }
        }

        return $this->view('/auth/login', compact('input', 'errors'));
    }

    public function logout()
    {
        if (isset($_SESSION['email'])) {
            session_unset();
            session_destroy();
            $this->redirect("/");
        } else {
            $this->redirect("/");
        }
    }
}
