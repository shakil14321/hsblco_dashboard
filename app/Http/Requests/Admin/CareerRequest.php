<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CareerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'slug' => $this->slug ?: Str::slug($this->title),
            'status' => (int) ($this->status ?? 1),
        ]);
    }

    public function rules(): array
    {
        $id = $this->route('career')?->id;

        return [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:careers,slug,' . $id,
            'location' => 'nullable|string|max:255',
            'job_type' => 'nullable|string|max:255',
            'salary' => 'nullable|string|max:255',
            'description' => 'required|string',
            'deadline' => 'nullable|date',
            'status' => 'required|boolean',
            'department' => 'nullable|string|max:255',
            'tech_stack' => 'nullable|string|max:255',
            'apply_url' => 'nullable|string|max:255',
        ];
    }
}
