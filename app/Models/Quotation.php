<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    protected $fillable = [
        'customer_type',
        'service_id',
        'name',
        'email',
        'phone',
        'address',
        'message',
        'status',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function estimates()
    {
        return $this->hasMany(QuotationEstimate::class);
    }

    public function latestEstimate()
    {
        return $this->hasOne(QuotationEstimate::class)->latestOfMany();
    }
}
