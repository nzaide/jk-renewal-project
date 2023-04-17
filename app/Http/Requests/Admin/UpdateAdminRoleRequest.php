<?php

namespace App\Http\Requests\Admin;

use App\Http\Enum\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAdminRoleRequest extends FormRequest
{
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
            'ids' => ['required'],
            'role' => ['required', Rule::in($roles)],
        ];
    }
}
