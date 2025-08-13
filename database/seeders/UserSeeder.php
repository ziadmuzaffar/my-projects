<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'زياد صالح علي مظفر',
                'email' => 'ziadmuzaffar@gmail.com',
                'password' => 'zs143031'
            ]
        ];

        foreach ($users as $user) :
            User::create($user);
        endforeach;
    }
}
