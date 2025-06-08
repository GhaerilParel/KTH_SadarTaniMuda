<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'image', 'gallery', 'detail_url', 'service_detail_slug'
    ];

    protected $casts = [
        'gallery' => 'array',
    ];

    public function serviceDetail()
    {
        return $this->belongsTo(\App\Models\ServiceDetail::class, 'service_detail_slug', 'slug');
    }
}
