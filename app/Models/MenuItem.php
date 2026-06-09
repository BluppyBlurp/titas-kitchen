<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = [
        'name', 'description', 'category', 'image_url',
        'is_available', 'sizes', 'addons', 'has_spice_level', 'sort_order'
    ];

    protected $casts = [
        'sizes'           => 'array',
        'addons'          => 'array',
        'is_available'    => 'boolean',
        'has_spice_level' => 'boolean',
    ];
}