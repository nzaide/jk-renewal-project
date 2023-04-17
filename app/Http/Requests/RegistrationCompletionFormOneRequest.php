<?php

namespace App\Http\Requests;

use App\Models\MasterGender;
use DateTime;
use Illuminate\Foundation\Http\FormRequest;

class RegistrationCompletionFormOneRequest extends FormRequest
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
            'gender' => [
                'exists:App\Models\MasterGender,id'
            ],
            'residence' => [
                'exists:App\Models\MasterPrefecture,id'
            ],
            'dob_year' => [
                function ($attribute, $value, $fail) use ($params) {
                    // check if any of field is omitted
                    if (!$params['dob_year'] || !$params['dob_month'] || !$params['dob_day']) {
                        $fail(__('lang.label.registration_completion.please_select'));
                    }

                    // validate year
                    if ($params['dob_year'] && $params['dob_month'] && $params['dob_day']) {
                        $dob = $params['dob_year'] . '-' . $params['dob_month'] . '-' . $params['dob_day'];
                        $dob = DateTime::createFromFormat('Y-m-d', $dob);
                        $age = (new DateTime())->diff($dob)->y;
                        if (
                            $age < config('constant.REGISTRATION_COMPLETION.MIN_AGE')
                            || $age > config('constant.REGISTRATION_COMPLETION.MAX_AGE')
                        ) {
                            $fail(__('lang.label.registration_completion.age_range'));
                        }
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
            'gender.exists' => __('lang.label.registration_completion.please_select'),
            'residence.exists' => __('lang.label.registration_completion.please_select'),
        ];
    }
}
