<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceDetail extends Model
{
    protected $fillable = [
        'slug', 'title', 'description', 'image', 'specs', 'benefits', 'tabs', 'footer_text', 'buy_link'
    ];

    protected $casts = [
        'specs' => 'array',
        'benefits' => 'array',
        'tabs' => 'array',
    ];
}
