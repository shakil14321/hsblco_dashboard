<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => $this->slug ?: Str::slug($this->name),
            'featured' => (int) ($this->featured ?? 0),
            'status' => (int) ($this->status ?? 1),
        ]);
    }

    public function rules(): array
    {
        $id = $this->route('product')?->id;

        return [
            'product_category_id' => 'required|exists:product_categories,id',
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug,' . $id,
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'featured' => 'required|boolean',
            'status' => 'required|boolean',
        ];
    }
}
