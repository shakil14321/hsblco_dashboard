<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyStat extends Model
{
    protected $fillable = [
        'title',
        'value',
        'suffix',
        'short_description',
        'position',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}
