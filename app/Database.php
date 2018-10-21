<?php
declare (strict_types = 1);

class DB
{
    public function connect(): PDO
    {
        try {
            $pdo = new PDO('sqlite:../FakeNews.db');
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
        return $pdo;
    }
}
