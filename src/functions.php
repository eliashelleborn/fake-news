<?php

function connectToDB() : PDO
{
    try {
        $pdo = new PDO('sqlite:../FakeNews.db');
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
    return $pdo;
}

function getNewsFeed(PDO $pdo) : array
{
    $sql = "SELECT * FROM posts;";
    $sth = $pdo->prepare($sql);
    $sth->execute();
    $articles = $sth->fetchAll();
    return $articles;
}