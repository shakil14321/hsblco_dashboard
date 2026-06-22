<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\HeroSlide;

class HeroFeature extends Model
{
    protected $fillable = [
        'hero_slide_id',
        'title',
        'icon',
        'position',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function heroSlide()
    {
        return $this->belongsTo(\App\Models\HeroSlide::class, 'hero_slide_id');
    }
}
