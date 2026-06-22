<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ServiceFeatureRequest extends FormRequest
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
            'service_id' => 'required|exists:services,id',
            'title' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'position' => 'nullable|integer',
            'status' => 'required|boolean',
        ];
    }
}
