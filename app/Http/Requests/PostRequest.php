<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255', Rule::unique('posts', 'title')],
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'excerpt' => 'nullable|string',
            'description' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'status' => 'required|in:draft,published,archived',
            'tags' => 'nullable|array', // Expecting an array of tag names
            'tags.*' => 'string|max:255',
        ];
    }
}
