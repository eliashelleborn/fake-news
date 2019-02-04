<?php
declare(strict_types = 1);

namespace App\Core;

class Model
{
    protected $db = null;

    public function __construct()
    {
        $this->db = new Database();
    }
}
