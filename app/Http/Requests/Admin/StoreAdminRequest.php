<?php

namespace App\Http\Requests\Admin;

use App\Http\Enum\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAdminRequest extends FormRequest
{
    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'mail_address' => __('Email'),
            'fullname' => __('Name'),
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $roles = array_map(function ($elem) {
            return $elem->value;
        }, Role::cases());

        return [
            'group_id' => ['required', 'exists:groups,id'],
            'fullname' => ['required', 'max:255'],
            'mail_address' => ['required', 'email', 'max:255', 'unique:admins'],
            'password' => [
                'required',
                'between:8,255',
                'regex:/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/',
                'confirmed',
            ],
            'role' => ['required', Rule::in($roles)],
        ];
    }
}
