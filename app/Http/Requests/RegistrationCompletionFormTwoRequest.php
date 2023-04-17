<?php

namespace App\Http\Requests;

use App\Models\MasterGender;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationCompletionFormTwoRequest extends FormRequest
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
        $params = $this->all();
        return [
            'salary' => [
                // 'nullable',
                'exists:App\Models\MasterSalary,id'
            ],
            'school_type' => [
                // 'nullable',
                'exists:App\Models\MasterGraduationSchoolType,id'
            ],
            'last_school' => [
                'required',
                'max:' . config('constant.REGISTRATION_COMPLETION.LAST_SCHOOL')
            ],
            'major' => [
                'required',
                'max:' . config('constant.REGISTRATION_COMPLETION.MAJOR')
            ],
            'grad_year' => [
                function ($attribute, $value, $fail) use ($params) {
                    // check if no omitted field
                    if (!$params['grad_year'] || !$params['grad_moth']) {
                        $fail(__('lang.label.registration_completion.please_select'));
                    }
                }
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
            'salary.exists' => __('lang.label.registration_completion.please_select'),
            'school_type.exists' => __('lang.label.registration_completion.please_select'),
        ];
    }

    /**
     * Rename attributes
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'last_school' => __('lang.label.registration_completion.last_school'),
            'major' => __('lang.label.registration_completion.major'),
        ];
    }
}
