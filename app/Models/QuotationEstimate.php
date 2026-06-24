<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuotationEstimate extends Model
{
    protected $fillable = [
        'quotation_id',
        'service_charge',
        'domain_charge',
        'hosting_charge',
        'yearly_charge',
        'monthly_charge',
        'discount',
        'total',
        'note',
        'sent_at',
    ];

    public function quotation()
    {
        return $this->belongsTo(Quotation::class);
    }
}
