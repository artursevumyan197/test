<?php

namespace App\Classes;

use App\Models\User;

class Authenticator
{
    public static ?User $user;

    public static function check(): bool
    {
        $data = get_object_vars(json_decode(file_get_contents('./auth.json')));

        $user = User::where('auth_token', $data['auth_token'])->first();

        if (!$user) {
            return false;
        }

        self::$user = $user;

        return true;
    }

    public static function user(): User
    {
        return self::$user;
    }
}
