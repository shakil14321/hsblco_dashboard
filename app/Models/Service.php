<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'icon',
        'image',
        'position',
        'featured',
        'status',
    ];

    protected $casts = [
        'featured' => 'boolean',
        'status' => 'boolean',
    ];

    public function features()
    {
        return $this->hasMany(ServiceFeature::class, 'service_id');
    }

    public function quotations()
    {
        return $this->hasMany(Quotation::class);
    }
}
