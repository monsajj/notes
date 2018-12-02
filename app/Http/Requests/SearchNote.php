<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchNote extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'param' => ['required', 'min:2'],
        ];
    }

    public function messages()
    {
        return [
            'param.required' => 'Text is required',
            'param.min:2' => 'Text must be at least 2 letters',
        ];
    }
}
