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
            $_POST['register_request'] = "false";
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
                // Confirm Passwords
                if ($input['password'] === $input['confirmPassword']) {
                    // Create hash & try create user
                    $userModel = new User();
                    $userModel->createUser($input);
                    $this->redirect(getenv('BASE_URL'));

                } else {
                    $errors[] = 'Passwords did not match.';
                }
            }
        }

        return $this->view('/auth/register', compact('input', 'errors'));
    }
}
