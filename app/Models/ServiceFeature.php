<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceFeature extends Model
{
    protected $fillable = [
        'service_id',
        'title',
        'icon',
        'description',
        'position',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }
}
