<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'image',
        'author_name',
        'publish_date',
        'featured',
        'status',
    ];

    protected $casts = [
        'featured' => 'boolean',
        'status' => 'boolean',
        'publish_date' => 'date',
    ];
}
