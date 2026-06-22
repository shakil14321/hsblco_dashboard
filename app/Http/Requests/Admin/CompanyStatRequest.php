<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CompanyStatRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'position' => (int) $this->position,
            'status' => (int) $this->status,
        ]);
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'value' => 'required|string|max:255',
            'suffix' => 'nullable|string|max:50',
            'short_description' => 'nullable|string',
            'position' => 'nullable|integer',
            'status' => 'required|boolean',
        ];
    }
}
