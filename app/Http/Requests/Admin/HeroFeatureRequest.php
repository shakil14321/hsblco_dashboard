<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class HeroFeatureRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'hero_slide_id' => 'required|exists:hero_slides,id',
            'title' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'position' => 'nullable|integer',
            'status' => 'required|boolean',
        ];
    }
}
