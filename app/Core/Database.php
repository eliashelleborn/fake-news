<?php
declare (strict_types = 1);

namespace App\Core;

use PDO;

class Database
{
    private $pdo = null;

    public function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        try {
            $pdo = new PDO('sqlite:../FakeNews.db');
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
        $this->pdo = $pdo;
    }

    public function get(string $sql, array $args = []): array
    {
        try {
            $sth = $this->pdo->prepare($sql);
            $sth->execute($args);
            $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }

        return $result;
    }

    public function getOne(string $sql, array $args = []): array
    {
        $sth = $this->pdo->prepare($sql);
        $sth->execute($args);
        $result = $sth->fetch(PDO::FETCH_ASSOC);
        return $result ? $result : [];
    }

    public function insert(string $sql, array $args = []): bool
    {
        try {
            $sth = $this->pdo->prepare($sql);
            $res = $sth->execute($args);
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }

        return $res;
    }

    public function delete(string $sql, array $args = []): bool
    {
        try {
            $sth = $this->pdo->prepare($sql);
            $res = $sth->execute($args);
        } catch (\PDOException $e) {
            throw new \Exception($e->getMessage());
        }

        return $res;
    }
}
