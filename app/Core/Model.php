<?php
declare (strict_types = 1);

namespace App\Core;

class Model
{
    protected $pdo = null;

    public function __construct()
    {
        $db = new Database();
        $this->pdo = $db->connect();
    }
}
