<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateJobSeekerEmailRequest extends FormRequest
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
        $jobSeeker = Auth::guard('web')->user();

        return [
            'mail_address' => [
                'required',
                'email:rfc,dns',
                'max:255',
            ]
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
            'mail_address.required' => __('This is required'),
            'mail_address.email' => __('Email address is invalid format.'),
            'mail_address.max' => __('Email must not exceed 255 characters'),
        ];
    }
}
