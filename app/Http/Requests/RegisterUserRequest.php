<?php

namespace App\Http\Requests;

use App\Enums\JobSeekerRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterUserRequest extends FormRequest
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
            'mail_address' => [
                'required',
                'email',
                'max:255',
                Rule::unique('job_seekers', 'mail_address')->where(
                    fn ($query) => $query->whereNull('deleted_at')->whereNotNull('email_verified_at')
                ),
                Rule::unique('job_seeker_requests', 'email')->where(
                    fn ($query) => $query->where('created_at', '>', date('Y-m-d H:i:s', strtotime('-1 day')))
                        ->where('request', JobSeekerRequest::RegisterDetails->value)
                ),
            ],
            'password' => [
                'required',
                'between:8,20',
                'regex:/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\d)/',
                'confirmed'
            ],
            'password_confirmation' => [
                'required'
            ],
            'terms_and_privacy' => [
                'required'
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
            'password.regex' => __('validation.password.format_error'),
            'password_confirmation.required' => __('validation.required'),
        ];
    }
}
