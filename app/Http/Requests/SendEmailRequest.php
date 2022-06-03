<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendEmailRequest extends FormRequest
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
            'sender_name' => 'required',
            'sender_email' => 'required|email',
            'email_hob' => 'required|email',
        ];

    }
    public function messages()
    {
        return [
            'sender_name.required' => 'Sender Name is required!',
            'sender_email.required' => 'Sender Email is required!',
            'email_hob.required' => 'Email is required!',
        ];
    }
}
