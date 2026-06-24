<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class QuotationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'customer_type' => 'required|in:individual,company',
            'service_id'    => 'required|exists:services,id',
            'name'          => 'required|string|max:255',
            'email'         => 'required|email|max:255',
            'phone'         => 'required|string|max:30',
            'address'       => 'nullable|string',
            'message'       => 'nullable|string',
        ];
    }
}
