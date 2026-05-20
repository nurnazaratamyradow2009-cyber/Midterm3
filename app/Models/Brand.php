<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * Get all of the phones associated with this manufacturer brand.
     */
    public function phones(): HasMany
    {
        return $this->hasMany(Phone::class, 'brand_id');
    }
}