<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rule;

class UpdateJobSeekerRequest extends FormRequest
{
    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'fullname' => __('Fullname'),
            'first_language' => __('First Language'),
            'contact' => __('Contact'),
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'fullname' => 'required|max:255',
            'nationality' => 'required|exists:nationalities,id',
            'first_language' => 'nullable|required_if:language,=,1|exists:languages,id',
            'second_language' => 'nullable|exists:languages,id',
            'third_language' => 'nullable|exists:languages,id',
            'contact' => 'required|max:255',
            'complete_blind_resume' => 'nullable|mimes:doc,docx,pdf,xls,xlsx,jpg,png,jpeg,gif|max:5120',
            'blind_resume' => 'nullable|mimes:doc,docx,pdf,xls,xlsx,jpg,png,jpeg,gif|max:5120',
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
            'fullname.max' => __(':attribute must not exceed :max characters'),
            'first_language.required_if' => __('The :attribute field is required.'),
            'contact.max' => __(':attribute must not exceed :max characters'),
            'complete_blind_resume.max' => __('File must be less than 5MB.'),
            'blind_resume.max' => __('File must be less than 5MB.'),
            'complete_blind_resume.mimes' => __('This is invalid value.'),
            'blind_resume.mimes' => __('This is invalid value.'),
        ];
    }
}
