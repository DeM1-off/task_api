<?php

namespace App\Service\Auth;

use App\Models\User;

class AuthService implements AuthServiseInterface
{

    /**
     * @param array $userData
     * @return User
     */
    public function createUser(array $userData)
    {
        $user = new User();
        $user->first_name = $userData['first_name'];
        $user->last_name = $userData['last_name'];
        $user->email = $userData['email'];
        $user->phone = $userData['phone'];
        $user->password = bcrypt($userData['password']);
        $user->save();

        return $user;

    }


}
