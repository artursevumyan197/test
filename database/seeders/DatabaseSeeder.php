<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $data = [
            [
                'username' => 'admin1@mail.ru',
                'password' => 'password1',
                'permission' => 'update_create',
                'auth_token' => Str::random(32),
            ],
            [
                'username' => 'admin2@mail.ru',
                'password' => 'password1',
                'permission' => 'update',
                'auth_token' => Str::random(32),
            ],
            [
            'username' => 'admin3@mail.ru',
            'password' => 'password1',
            'permission' => 'create',
            'auth_token' => Str::random(32),
           ]
        ];
        Db::table('users')->insert($data);

    }
}
