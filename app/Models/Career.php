<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'department',
        'location',
        'job_type',
        'salary',
        'description',
        'tech_stack',
        'deadline',
        'apply_url',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'deadline' => 'date',
    ];
}
