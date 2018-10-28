<?php

declare (strict_types = 1);

namespace App\Models;

use App\Core\Model;

class Article extends Model
{
    public function getNewsFeed(): array
    {
        try {
            $sql = "SELECT
                        articles.id,
                        articles.title,
                        articles.preview,
                        articles.body,
                        articles.banner,
                        users.name AS author,
                        users.id AS authorId
                    FROM
                        articles
                        LEFT OUTER JOIN users ON articles.author = users.id";

            $res = $this->db->get($sql);
        } catch (\Exception $e) {
            throw $e;
        }

        return $res;
    }

    public function getById(string $id): array
    {
        try {
            $sql = "SELECT articles.id, articles.title, articles.preview, articles.body, articles.banner, articles.publishDate, users.image AS authorImg, users.id AS authorId, users.name AS author
                FROM articles
            LEFT OUTER JOIN users
                ON articles.author = users.id
                WHERE articles.id = ?";
            $article = $this->db->getOne($sql, [$id]);
        } catch (PDOException $e) {
            throw $e;
        }
        return $article;
    }

    public function getByAuthor(string $author): array
    {
        try {
            $sql = "SELECT articles.id, articles.title, articles.preview, articles.body, articles.banner, articles.publishDate, users.image AS authorImg, users.id AS authorId, users.name AS author
                FROM articles
            LEFT OUTER JOIN users
                ON articles.author = users.id
                WHERE articles.author = ?";
            $articles = $this->db->get($sql, [$author]);
        } catch (PDOException $e) {
            throw $e;
        }
        return $articles;
    }

}
