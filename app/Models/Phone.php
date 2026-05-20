<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = [
        'brand_id',
        'category_id',
        'model',
        'brand',
        'processor',
        'screen_refresh_rate',
        'back_camera_count',
        'front_camera_count',

        // Rear Cameras
        'first_camera_mp',
        'second_camera_mp',
        'third_camera_mp',
        'fourth_camera_mp',
        'fifth_camera_mp',

        // Front Cameras
        'first_front_camera_mp',
        'second_front_camera_mp',
    ];
}