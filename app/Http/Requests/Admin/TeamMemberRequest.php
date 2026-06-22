<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TeamMemberRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'facebook' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'position' => 'nullable|integer',
            'status' => 'required|boolean',
        ];
    }
}
