<?php

declare (strict_types = 1);

namespace App\Models;

use App\Core\Model;

class Auth extends Model
{
    private $user = null;

    public function check(): bool
    {
        return isset($_SESSION['email']);
    }

    public function getUser(): array
    {
        $userModel = new User();

        try {
            $this->user = $userModel->getByEmail($_SESSION['email']);
        } catch (\Exception $e) {
            throw $e;
        }

        return $this->user;
    }
}
