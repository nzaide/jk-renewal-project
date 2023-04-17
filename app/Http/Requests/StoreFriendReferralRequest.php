<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFriendReferralRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'max:255'
            ],
            'email' => [
                'required',
                'max:255',
                'email'
            ],
            'contact' => [
                'required',
                'max:255'
            ],
            'language' => [
                'required',
                'exists:languages,id'
            ],
            'resume' => [
                'nullable',
                'mimes:doc,docx,pdf,xls,xlsx,jpg,png,jpeg,gif',
                'max:5120',
            ],
            'jobSeeker_name' => [
                'required',
                'max:255'
            ],
            'jobSeeker_email' => [
                'required',
                'max:255',
                'email'
            ],
            'jobSeeker_contact' => [
                'required',
                'max:255'
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
            'name.required' => __('This is required'),
            'name.max' => __('Name must not exceed 255 characters'),
            'email.required' => __('This is required'),
            'email.max' => __('Email must not exceed 255 characters'),
            'email.email' => __('Email address is invalid format.'),
            'contact.required' => __('This is required'),
            'contact.max' => __('Contact Number must not exceed 255 characters'),
            'language.required' => __('This is required'),
            'language.exists' => __('This is invalid value'),
            'resume.max' => __('File must be less than 5MB'),
            'jobSeeker_name.required' => __('This is required'),
            'jobSeeker_name.max' => __('Name must not exceed 255 characters'),
            'jobSeeker_email.required' => __('This is required'),
            'jobSeeker_email.max' => __('Email must not exceed 255 characters'),
            'jobSeeker_email.email' => __('Email address is invalid format.'),
            'jobSeeker_contact.required' => __('This is required'),
            'jobSeeker_contact.max' => __('Contact Number must not exceed 255 characters'),
            'terms_and_privacy.required' => __('This is required'),
        ];
    }
}
