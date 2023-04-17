<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePasswordResetLinkRequest extends FormRequest
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
            'email' => 'required|email|max:255',
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
            'email.max' => __('Email must not exceed 255 characters.'),
        ];
    }
}
