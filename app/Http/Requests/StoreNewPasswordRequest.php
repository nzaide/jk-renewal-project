<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreNewPasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'token' => 'required',
            'mail_address' => 'required|email',
            'password' => [
                'required',
                'string',
                'confirmed',
                'max:20',
                Password::min(8)
                ->mixedCase()
                ->numbers()
            ],
            'password_confirmation' => 'required|same:password',

        ];
    }

    /**
     * Validation messages for the applied rules
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'password.max' => __('Password must not exceed 20 characters.'),
        ];
    }
}
