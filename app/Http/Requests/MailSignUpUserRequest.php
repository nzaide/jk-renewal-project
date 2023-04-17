<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailSignUpUserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|email|unique:users,email,NULL,id,deleted_at,NULL',
            'password' => [
                'required',
                'regex:/^(?=.*[a-z])(?=.*\d).+$/',
                'min:' . config('constant.PASSWORD.MIN'),
                'max:' . config('constant.PASSWORD.MAX'),
                'confirmed'
            ],
            'password_confirmation' => [
                'required'
            ],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'password.regex' => __('validation.password.format_error'),
            'password.min' => __('validation.password.format_error_length'),
            'password.max' => __('validation.password.format_error_length'),
            'password_confirmation.required' => __('validation.password.required_confirmed'),
        ];
    }
}
