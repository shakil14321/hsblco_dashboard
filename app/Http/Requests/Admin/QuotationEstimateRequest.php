<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class QuotationEstimateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'service_charge' => 'required|numeric|min:0',
            'domain_charge'  => 'nullable|numeric|min:0',
            'hosting_charge' => 'nullable|numeric|min:0',
            'yearly_charge'  => 'nullable|numeric|min:0',
            'monthly_charge' => 'nullable|numeric|min:0',
            'discount'       => 'nullable|numeric|min:0',
            'note'           => 'nullable|string',
        ];
    }
}
