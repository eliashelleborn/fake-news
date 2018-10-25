<?php

declare (strict_types = 1);

namespace App\Models;

use App\Core\Model;

class Article extends Model
{
    public function getNewsFeed(): array
    {
        $sql = "SELECT articles.id, articles.title, articles.body, users.id, users.name AS author
                FROM articles
            LEFT OUTER JOIN articles_users
                ON articles.id = articles_users.article_id
            LEFT OUTER JOIN users
                ON articles_users.user_id = users.id";

        try {
            $res = $this->db->get($sql);
        } catch (\Exception $e) {
            throw $e;
        }
        return $res;
    }
}
