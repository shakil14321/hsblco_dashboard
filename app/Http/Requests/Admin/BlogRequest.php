<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class BlogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => $this->slug ?: Str::slug($this->title),
            'featured' => (int) ($this->featured ?? 0),
            'status' => (int) ($this->status ?? 1),
        ]);
    }

    public function rules(): array
    {
        $blogId = $this->route('blog')?->id;

        return [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blogs,slug,' . $blogId,
            'short_description' => 'nullable|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'author_name' => 'nullable|string|max:255',
            'publish_date' => 'nullable|date',
            'featured' => 'required|boolean',
            'status' => 'required|boolean',
        ];
    }
}
