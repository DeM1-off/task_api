<?php


namespace App\Service\Auth;

use App\Models\User;


interface AuthServiseInterface
{

    /**
     * @param array $userData
     */
    public function createUser(array $userData);


}
