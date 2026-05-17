<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Aman Myradow',
            'username' => 'admin',
            'password' => bcrypt('12345678')
        ]);

        $this->call([
            \Database\Seeders\UserSeeder::class,
            \Database\Seeders\CategorySeeder::class,
            \Database\Seeders\BrandSeeder::class,
            \Database\Seeders\PhoneSeeder::class,

        ]);
    }
}
