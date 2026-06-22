<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'company_name',
        'logo',
        'website_url',
        'position',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}
