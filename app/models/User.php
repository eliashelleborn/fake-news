<?php

declare (strict_types = 1);

namespace App\Models;

use App\Core\Model;

class User extends Model
{

    public function getById(string $id): array
    {
        $sql = 'SELECT * FROM users WHERE id = ?';
        $sth = $this->pdo->prepare($sql);
        try {
            $sth->execute([$id]);
        } catch (PDOException $e) {
            var_dump($e);
        }
        $user = $sth->fetch();
        return $user;
    }

    public function getByEmail(string $email): array
    {
        $sql = 'SELECT * FROM users WHERE email = ?';
        $sth = $this->pdo->prepare($sql);
        $sth->execute([$email]);
        $user = $sth->fetch();
        if (empty($user)) {
            throw new \Exception('User not found');
        } else {
            return $user;
        }

    }

    public function create(array $user)
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
