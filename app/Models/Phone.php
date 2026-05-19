<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $fillable = [
        'model',
        'brand_id',
        'brand',
        'category_id',
        'announced_year',
        'produced_year',
        'storage',
        'storage_version',
        'ram',
        'ram_version',
        'is_support_micro_sd',
        'first_camera_sensor_MP_value',
        'first_camera',
        'screen_type',
        'battery_capacity',
        'charging_speed',
    ];
}
