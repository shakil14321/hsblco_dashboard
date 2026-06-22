<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
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
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'position' => 'nullable|integer',
            'status' => 'required|boolean',
        ];
    }
}
