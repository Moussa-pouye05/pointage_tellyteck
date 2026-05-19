<?php

namespace App\Controllers;

use App\Models\User;

class AuthController
{
    private ?User $users = null;

    public function utilisateur(){
        $this->render("admin/utilisateur");
    }
}