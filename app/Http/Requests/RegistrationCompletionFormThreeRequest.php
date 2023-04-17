<?php

namespace App\Http\Requests;

use App\Models\MasterGender;
use DateTime;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationCompletionFormThreeRequest extends FormRequest
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
            'company_name' => [
                'required',
                'max:' . config('constant.REGISTRATION_COMPLETION.COMPANY_NAME')
            ],
            'employment_status' => [
                'exists:App\Models\MasterEmploymentStatus,id'
            ],
            'cmp_year_from' => [
                function ($attribute, $value, $fail) use ($params) {
                    // check if no omitted field
                    if (
                        !$params['cmp_year_from'] ||
                        !$params['cmp_month_from']
                    ) {
                        $fail(__('lang.label.registration_completion.please_select'));
                    }

                    if (
                        $params['cmp_year_from'] &&
                        $params['cmp_month_from'] &&
                        $params['cmp_year_to'] &&
                        $params['cmp_month_to']
                    ) {
                        $dateFrom = $params['cmp_year_from'] . '-' . $params['cmp_month_from'] . '-0';
                        $dateFrom = DateTime::createFromFormat('Y-m-d', $dateFrom);

                        $dateTo = $params['cmp_year_to'] . '-' . $params['cmp_month_to'] . '-0';
                        $dateTo = DateTime::createFromFormat('Y-m-d', $dateTo);
                        if ($dateFrom > $dateTo) {
                            $fail(__('lang.label.registration_completion.start_end_date'));
                        }
                    }

                    // if month from is omitted
                    if ($params['cmp_year_to'] && !$params['cmp_month_to']) {
                        $fail(__('lang.label.registration_completion.please_select'));
                    }
                }
            ],
            'occupation' => [
                'exists:App\Models\MasterOccupation,id'
            ],
            'position' => [
                'exists:App\Models\MasterPosition,id'
            ],
            'description' => [
                'nullable',
                'max:' . config('constant.REGISTRATION_COMPLETION.JOB_DETAIL')
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
            'employment_status.exists' => __('lang.label.registration_completion.please_select'),
            'occupation.exists' => __('lang.label.registration_completion.please_select'),
            'position.exists' => __('lang.label.registration_completion.please_select'),
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
            'company_name' => __('lang.label.registration_completion.company_name'),
            'description' => __('lang.label.registration_completion.job_description'),
        ];
    }
}
