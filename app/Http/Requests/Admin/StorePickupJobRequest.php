<?php

namespace App\Http\Requests\Admin;

use App\Enums\PickupJobLanguage;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePickupJobRequest extends FormRequest
{
    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'job_post_id' => __('Job Post'),
            'language' => __('Language'),
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $languages = array_map(function ($elem) {
            return $elem->value;
        }, PickupJobLanguage::cases());

        return [
            'job_post_id' => [
                'required',
                Rule::unique('pickup_jobs')->where(fn ($query) => $query->whereNull('deleted_at')),
            ],
            'language' => [
                'required',
                Rule::in($languages),
            ],
        ];
    }
}
