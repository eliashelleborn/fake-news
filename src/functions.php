<?php
function connectToDB(): PDO
{
    try {
        $pdo = new PDO('sqlite:../FakeNews.db');
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int) $e->getCode());
    }
    return $pdo;
}
