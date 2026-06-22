<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => $this->slug ?: Str::slug($this->title),
            'position' => (int)($this->position ?? 0),
            'featured' => (int)($this->featured ?? 0),
            'status' => (int)($this->status ?? 1),
        ]);
    }

    public function rules(): array
    {
        $id = $this->route('service')?->id;

        return [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:services,slug,' . $id,
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'position' => 'nullable|integer',
            'featured' => 'required|boolean',
            'status' => 'required|boolean',
        ];
    }
}
