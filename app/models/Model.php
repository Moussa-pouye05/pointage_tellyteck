<?php

namespace App\Models;

use Config\Database;

class Model
{
    protected $db;

    public function __construct()
    {
        $obj = new Database();
        $this->db = $obj->getConnection();
    }
}
