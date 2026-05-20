<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Phone;
use App\Models\Brand;
use App\Models\Category;

class PhoneSeeder extends Seeder
{
    public function run(): void
    {
        $brandXiaomi = Brand::firstOrCreate(['name' => 'Xiaomi'])->id;
        $brandRedmi = Brand::firstOrCreate(['name' => 'Redmi'])->id;
        $brandSamsung = Brand::firstOrCreate(['name' => 'Samsung'])->id;

        $catNormal = Category::firstOrCreate(['name' => 'Normal Phones'])->id;

        $phones = [
            [
                'brand_id' => $brandRedmi,
                'brand' => 'Redmi',
                'category_id' => $catNormal,
                'model' => 'Note 11',
                'processor' => 'Snapdragon 680 4G',
                'screen_refresh_rate' => 90,
                'back_camera_count' => 4,
                'front_camera_count' => 1,
                'first_camera_mp' => 50,
                'second_camera_mp' => 8,
                'third_camera_mp' => 2,
                'fourth_camera_mp' => 2,
                'first_front_camera_mp' => 13,
            ],
            [
                'brand_id' => $brandXiaomi,
                'brand' => 'Xiaomi',
                'category_id' => $catNormal,
                'model' => '14 Ultra',
                'processor' => 'Snapdragon 8 Gen 3',
                'screen_refresh_rate' => 120,
                'back_camera_count' => 4,
                'front_camera_count' => 1,
                'first_camera_mp' => 50,
                'second_camera_mp' => 50,
                'third_camera_mp' => 50,
                'fourth_camera_mp' => 50,
                'first_front_camera_mp' => 32,
            ],
            [
                'brand_id' => $brandSamsung,
                'brand' => 'Samsung',
                'category_id' => $catNormal,
                'model' => 'Galaxy S24 Ultra',
                'processor' => 'Snapdragon 8 Gen 3 for Galaxy',
                'screen_refresh_rate' => 120,
                'back_camera_count' => 4,
                'front_camera_count' => 1,
                'first_camera_mp' => 200,
                'second_camera_mp' => 50,
                'third_camera_mp' => 10,
                'fourth_camera_mp' => 12,
                'first_front_camera_mp' => 12,
            ],
        ];

        foreach ($phones as $phone) {
            Phone::create($phone);
        }
    }
}