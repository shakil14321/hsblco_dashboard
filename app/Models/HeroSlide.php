<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSlide extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'button_text',
        'button_url',
        'image',
        'slide_number',
        'position',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function features()
    {
        return $this->hasMany(HeroFeature::class, 'hero_slide_id');
    }
}
