<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchNote extends FormRequest
{
//    /**
//     * Determine if the user is authorized to make this request.
//     *
//     * @return bool
//     */
//    public function authorize()
//    {
//        return false;
//    }

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
            'text.required' => 'Text is required',
            'text.min:2' => 'Text must be at least 2 letters',
            'tags.min:2' => 'Tags must be at least 2 letters',
        ];
    }
}
