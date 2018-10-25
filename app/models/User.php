<?php

declare (strict_types = 1);

namespace App\Models;

use App\Core\Model;

class User extends Model
{

    public function getById(string $id): array
    {
        try {
            $sql = 'SELECT * FROM users WHERE id = ?';
            $user = $this->db->getOne($sql, [$id]);
        } catch (PDOException $e) {
            throw $e;
        }
        return $user;
    }

    public function getByEmail(string $email): array
    {
        try {
            $sql = 'SELECT * FROM users WHERE email = ?';
            $user = $this->db->getOne($sql, [$email]);
        } catch (\Exception $e) {
            throw $e;
        }

        return $user;
    }

    public function create(array $user): bool
    {
        try {
            $hash = password_hash($user['password'], PASSWORD_BCRYPT);
            $sql = 'INSERT INTO users ("email", "name", "password") VALUES (?,?,?)';
            $status = $this->db->insert($sql, [$user['email'], $user['username'], $hash]);
        } catch (PDOException $e) {
            throw $e;
        }
        return $status;
    }
}
