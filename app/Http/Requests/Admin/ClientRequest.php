<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'position' => (int) ($this->position ?? 0),
            'status' => (int) ($this->status ?? 1),
        ]);
    }

    public function rules(): array
    {
        return [
            'company_name' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:5120',
            'website_url' => 'nullable|string|max:255',
            'position' => 'nullable|integer',
            'status' => 'required|boolean',
        ];
    }
}
