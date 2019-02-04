<?php

declare(strict_types = 1);

namespace App\Models;

use App\Core\Model;

class Auth extends Model
{
    public $user = null;

    public function check(): bool
    {
        return isset($_SESSION['email']);
    }

    public function getUser()
    {
        $userModel = new User();

        try {
            $this->user = $userModel->getByEmail($_SESSION['email']);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function hasRole(int $role): bool
    {
        if (isset($this->user)) {
            return $this->user['role'] >= $role;
        } else {
            return false;
        }
    }
}
