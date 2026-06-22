<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ProductCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => $this->slug ?: Str::slug($this->name),
            'position' => (int) ($this->position ?? 0),
            'status' => (int) ($this->status ?? 1),
        ]);
    }

    public function rules(): array
    {
        $id = $this->route('product_category')?->id;

        return [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:product_categories,slug,' . $id,
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'position' => 'nullable|integer',
            'status' => 'required|boolean',
        ];
    }
}
