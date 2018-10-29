<?php

declare (strict_types = 1);

namespace App\Models;

use App\Core\Model;

class User extends Model
{
    public function getAll(): array
    {
        try {
            $sql = 'SELECT * FROM users';
            $users = $this->db->get($sql);
        } catch (\Exception $e) {
            throw $e;
        }
        return $users;
    }

    public function getById(string $id): array
    {
        try {
            $sql = 'SELECT * FROM users WHERE id = ?';
            $user = $this->db->getOne($sql, [$id]);
        } catch (\Exception $e) {
            throw $e;
        }
        return $user;
    }

    public function getByEmail(string $email): array
    {
        try {
            $sql = 'SELECT * FROM users WHERE email = ?';
            $user = $this->db->getOne($sql, [$email]);
        } catch (\PDOException $e) {
            throw $e;
        }

        return $user;
    }

    public function create(array $user): bool
    {
        try {
            $hash = password_hash($user['password'], PASSWORD_BCRYPT);
            $sql = 'INSERT INTO users ("email", "name", "password") VALUES (?,?,?)';
            $res = $this->db->insert($sql, [$user['email'], $user['username'], $hash]);
        } catch (PDOException $e) {
            throw $e;
        }
        return $res;
    }
}
