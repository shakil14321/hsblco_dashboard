<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class MenuRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => $this->slug ?: Str::slug($this->name),
            'status' => $this->status ?? 1,
            'position' => $this->position ?? 0,
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'url' => 'nullable|string|max:255',
            'parent_id' => 'nullable|exists:menus,id',
            'position' => 'nullable|integer',
            'status' => 'required|boolean',
        ];
    }
}
