<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'image',
        'facebook',
        'twitter',
        'linkedin',
        'bio',
        'position',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}
