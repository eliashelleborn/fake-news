<?php

declare (strict_types = 1);

namespace App\Models;

use App\Core\Database;

class User
{
    private $pdo = null;

    public function __construct()
    {
        $this->pdo = (new Database)->connect();
    }

    public function createUser(array $user)
    {
        $hash = password_hash($user['password'], PASSWORD_BCRYPT);
        $sql = 'INSERT INTO users ("email", "username", "password") VALUES (?,?,?)';
        $sth = $this->pdo->prepare($sql);
        try {
            $sth->execute([$user['email'], $user['username'], $hash]);
        } catch (PDOException $e) {
            var_dump($e);

        }
    }
}
