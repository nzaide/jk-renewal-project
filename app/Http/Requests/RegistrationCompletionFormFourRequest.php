<?php

namespace App\Http\Requests;

use App\Http\Enum\ConditionJobChangeAttributes;
use App\Models\MasterGender;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationCompletionFormFourRequest extends FormRequest
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
            'jb_change_job' => [
                // 'nullable',
                'exists:App\Models\MasterJbDegree,id'
            ],
            'business_domain' => [
                // 'nullable',
                'exists:App\Models\MasterBusinessDomain,id'
            ],
            'desired_occupation' => [
                // 'nullable',
                'exists:App\Models\MasterOccupation,id'
            ],
            'desired_residense' => [
                // 'nullable',
                'exists:App\Models\MasterPrefecture,id'
            ],
            'desired_salary' => [
                // 'nullable',
                'exists:App\Models\MasterSalary,id'
            ],
            'consideration' => [
                function ($attribute, $value, $fail) {
                    $baseAttributes = ConditionJobChangeAttributes::ATTRIBUTE_LIST;
                    if (array_diff($value, $baseAttributes)) {
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
            'jb_change_job.exists' => __('lang.label.registration_completion.please_select'),
            'business_domain.exists' => __('lang.label.registration_completion.please_select'),
            'desired_occupation.exists' => __('lang.label.registration_completion.please_select'),
            'desired_residense.exists' => __('lang.label.registration_completion.please_select'),
            'desired_salary.exists' => __('lang.label.registration_completion.please_select'),
        ];
    }
}
