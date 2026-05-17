<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Normal Phones'],
            ['name' => 'Foldable Phones'],
            ['name' => 'Flipable Phones'],
            ['name' => 'Three Foldable Phones'],
        ];

        foreach($categories as $category) {
            \App\Models\Category::create([
                'name' => $category['name'],
            ]);
        }
    }
}
