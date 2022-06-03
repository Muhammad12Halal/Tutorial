<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OpenRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'place' => 'required',
            'content' => 'required',
        ];
    }

    public function messages() //OPTIONAL
    {
        return [
            'title.required' => 'Title is required',
            'place.required' => 'Place is required',
            'content.required' => 'Content is required',
        ];
    }
}
