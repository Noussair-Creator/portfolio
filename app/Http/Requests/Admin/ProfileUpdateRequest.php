<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'bio' => ['required', 'string'],
            'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
            'resume' => ['nullable', 'file', 'mimes:pdf', 'max:2048'], // Add this rule
            'social_links.github' => ['nullable', 'url'],
            'social_links.linkedin' => ['nullable', 'url'],
            'social_links.twitter' => ['nullable', 'url'],
        ];
    }
}
