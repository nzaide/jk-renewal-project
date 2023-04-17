<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateJobSeekerPasswordRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'password' => [
                'required',
                'between:8,20',
                'regex:/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\d)/',
                'confirmed',
            ],
            'password_confirmation' => 'required',
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
            'password.required' => __('This is required'),
            'password.between' => __('Length of the password must be between 8 to 20 characters'),
            'password.regex' => __('Password must contain atleast 1 lowercase letter, 1 number and 1 uppercase letter'),
            'password.confirmed' => __('Confirm password must be exactly the same as the password.'),
            'password_confirmation.required' => __('This is required')
        ];
    }
}
