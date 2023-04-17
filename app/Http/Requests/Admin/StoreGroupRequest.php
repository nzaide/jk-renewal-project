<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreGroupRequest extends FormRequest
{
    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => __('Name'),
            'sender_name' => __('Sender name'),
            'mail_address' => __('Email'),
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
            'name' => ['required', 'max:255'],
            'sender_name' => ['required', 'max:255'],
            'mail_address' => [
                'required',
                'max:255',
                'email',
                Rule::unique('groups')->where(fn ($query) => $query->whereNull('deleted_at')),
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
            'mail_address.unique' => 'The email has already been taken.',
        ];
    }
}
