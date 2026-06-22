<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    protected $fillable = [
        'site_name',
        'logo',
        'favicon',
        'email',
        'phone',
        'address',
        'facebook',
        'linkedin',
        'youtube',
        'twitter',
        'footer_text',
    ];
}
