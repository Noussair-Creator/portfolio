<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ProjectUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

public function rules(): array
{
    // Get the project ID from the route
    $projectId = $this->route('project')->id;

    return [
        'title' => ['required', 'string', 'max:255'],
        // Add this line, ignoring the current project's ID
        'slug' => ['required', 'string', 'unique:projects,slug,' . $projectId],
        'description' => ['required', 'string'],
        'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:4096'],
        'project_url' => ['nullable', 'url'],
        'repo_url' => ['nullable', 'url'],
        'tags' => ['nullable', 'array'],
        'tags.*' => ['exists:tags,id'],
    ];
}
    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->title),
        ]);
    }
}
