<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'admin1', 'password' => 'admin112345', 'username' => 'Admin1'],
            ['name' => 'admin2', 'password' => 'admin212345', 'username' => 'Admin2'],
            ['name' => 'admin3', 'password' => 'admin312345', 'username' => 'Admin3'],
            ['name' => 'admin4', 'password' => 'admin412345', 'username' => 'Admin4'],
            ['name' => 'user1', 'password' => 'user112345', 'username' => 'User1'],
            ['name' => 'user2', 'password' => 'user212345', 'username' => 'User2'],
            ['name' => 'user3', 'password' => 'user312345', 'username' => 'User3'],
            ['name' => 'user4', 'password' => 'user412345', 'username' => 'User4']
        ];

        foreach($users as $user) {
            \App\Models\User::create([
                'name' => $user['name'],
                'username' => $user['username'],
                'password' => $user['password']
            ]);
        }
    }
}
