<?php

namespace App\Http\Requests\Admin;

use App\Enums\ApplicationStatus;
use App\Enums\JobSeekerStatus;
use App\Models\JobSeeker;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateApplicationRequest extends FormRequest
{
    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'admin_id' => __('recruiter'),
            'job_post_id' => __('job post'),
            'job_seeker_id' => __('applicant'),
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $statuses = array_map(function ($elem) {
            return $elem->value;
        }, ApplicationStatus::cases());

        return [
            'applied_date' => ['sometimes', 'required', 'before_or_equal:today', 'date'],
            'admin_id' => ['sometimes', 'nullable', 'exists:admins,id'],
            'job_post_id' => ['sometimes', 'required', 'exists:job_posts,id'],
            'job_seeker_id' => [
                'sometimes',
                'required',
                'exists:job_seekers,id',
                'bail',
                function ($attribute, $value, $fail) {
                    $status = JobSeeker::find($value)->status;
                    if ($status != JobSeekerStatus::FullyRegistered->value) {
                        $fail(__('The applicant is invalid.'));
                    }
                },
            ],
            'application_status' => ['sometimes', 'required', Rule::in($statuses)],
            'final_remarks' => ['max:5000'],
        ];
    }
}
