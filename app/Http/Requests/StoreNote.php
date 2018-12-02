<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNote extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'min:2'],
            'text' => ['required', 'min:2'],
            'tags' => ['sometimes', 'nullable', 'min:2'],
            'image' => ['sometimes', 'mimes:jpeg,jpg,png,xlsx,docx,odt,pdf', 'max:2048'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'A title is required',
            'title.min:2' => 'Title must be at least 2 letters',
            'text.required' => 'Text is required',
            'text.min:2' => 'Text must be at least 2 letters',
            'tags.min:2' => 'Tags must be at least 2 letters',
        ];
    }
}
