<?php

declare(strict_types=1);

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UserEditFormRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'date_of_birth' => [
                'bail',
                'required',
                'date'
            ],
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'date_of_birth' => __('lang.label.my_page.birthdate'),
            'gender' => __('lang.label.my_page.gender'),
            'residence_prefecture' => __('lang.label.my_page.residence'),
            'current_salary' => __('lang.label.my_page.annual_salary'),
        ];
    }
}
