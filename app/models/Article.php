<?php

declare (strict_types = 1);

namespace App\Models;

use App\Core\Model;

class Article extends Model
{
    public function getAll(): array
    {
        try {
            $sql = "SELECT
                        articles.id,
                        articles.title,
                        articles.preview,
                        articles.body,
                        articles.banner,
                        articles.publishDate,
                        users.name AS author,
                        users.id AS authorId
                    FROM
                        articles
                        LEFT OUTER JOIN users ON articles.author = users.id
                    ORDER BY articles.publishDate DESC";

            $res = $this->db->get($sql);
        } catch (\Exception $e) {
            throw $e;
        }

        return $res;
    }

    public function getFeatured(int $limit = 3): array
    {
        try {
            $sql = "SELECT
                        articles.id,
                        articles.title,
                        articles.preview,
                        articles.body,
                        articles.banner,
                        articles.publishDate,
                        users.name AS author,
                        users.id AS authorId
                    FROM
                        articles
                        LEFT OUTER JOIN users ON articles.author = users.id
                    WHERE articles.featured = 1
                    ORDER BY articles.publishDate DESC
                    LIMIT ?";

            $res = $this->db->get($sql, [$limit]);
        } catch (\Exception $e) {
            throw $e;
        }

        return $res;
    }

    public function getPopular(int $limit = 5): array
    {
        try {
            $sql = "SELECT
                        articles.id,
                        articles.title,
                        articles.preview,
                        articles.body,
                        articles.banner,
                        articles.publishDate,
                        articles.likes,
                        users.name AS author,
                        users.id AS authorId
                    FROM
                        articles
                        LEFT OUTER JOIN users ON articles.author = users.id
                    ORDER BY articles.likes DESC
                    LIMIT ?";

            $res = $this->db->get($sql, [$limit]);
        } catch (\Exception $e) {
            throw $e;
        }

        return $res;
    }

    public function getNewsFeed(): array
    {
        try {
            $sql = "SELECT
                        articles.id,
                        articles.title,
                        articles.preview,
                        articles.body,
                        articles.banner,
                        articles.publishDate,
                        users.name AS author,
                        users.id AS authorId
                    FROM
                        articles
                        LEFT OUTER JOIN users ON articles.author = users.id
                    ORDER BY articles.publishDate DESC";

            $res = $this->db->get($sql);
        } catch (\Exception $e) {
            throw $e;
        }

        return $res;
    }

    public function getById(string $id): array
    {
        try {
            $sql = "SELECT articles.id, articles.title, articles.preview, articles.body, articles.banner, articles.publishDate, articles.likes, users.image AS authorImg, users.id AS authorId, users.name AS author
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

    public function create(array $input, string $author): bool
    {
        try {
            $sql = 'INSERT INTO articles ("title", "preview", "body", "banner", "author") VALUES (?,?,?,?,?)';
            $res = $this->db->insert($sql, array_merge(array_values($input), [$author]));
        } catch (PDOException $e) {
            throw $e;
        }
        return $res;
    }

    public function edit(string $id, array $input): bool
    {
        try {
            $sql = 'UPDATE articles SET "title" = ?, "preview" = ?, "body" = ?, "banner" = ? WHERE id = ?';
            $res = $this->db->edit($sql, array_merge(array_values($input), [$id]));
        } catch (PDOException $e) {
            throw $e;
        }
        return $res;
    }

    public function delete(string $id): bool
    {
        try {
            $sql = 'DELETE FROM articles WHERE articles.id = ?';
            $res = $this->db->delete($sql, [$id]);
        } catch (PDOException $e) {
            throw $e;
        }
        return $res;
    }

}
