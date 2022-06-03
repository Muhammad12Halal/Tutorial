<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentStore extends FormRequest
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
            'name' => 'required',
            'student_ID' => 'required|unique:students',
            'phone' => 'required',
            'email' => 'required|email|unique:students',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required!',
            'student_ID.required' => 'Student ID is required!',
            'student_ID.unique' => 'Student ID is already taken!',
            'phone.required' => 'Phone number is required!',
            'email.required' => 'Email is required!',
            'email.email' => 'Email is not valid!',
        ];
    }

}
