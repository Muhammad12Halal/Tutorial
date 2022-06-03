<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdate extends FormRequest
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
            'name' => 'required|max:255',
            'studentID' => 'required|max:250',
            'phone' => 'required',
            'ic' => 'required',
            'email' => 'required|email|unique:students',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'studentID.required' => 'Student ID is required!',
            'studentID.unique' => 'Student ID is already taken!',
            'phone.required' => 'Phone number is required!',
            'ic.required' => 'Ic number is required',
            'email.required' => 'Email is required!',
            'email.email' => 'Email is not valid!',
            'image.image' => 'Image is required!',
        ];
    }
}
