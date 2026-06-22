<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class WebsiteSettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'site_name' => 'nullable|string|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'favicon' => 'nullable|image|mimes:jpg,jpeg,png,ico,webp|max:1024',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'facebook' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'footer_text' => 'nullable|string',
        ];
    }
}
