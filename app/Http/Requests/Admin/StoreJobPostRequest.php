<?php

namespace App\Http\Requests\Admin;

use App\Enums\{
    JobPostDisplayStatus,
    JobPostStatus,
    JobPostTarget,
};
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreJobPostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $dislpayStatuses = array_map(function ($elem) {
            return $elem->value;
        }, JobPostDisplayStatus::cases());
        $statuses = array_map(function ($elem) {
            return $elem->value;
        }, JobPostStatus::cases());
        $targets = array_map(function ($elem) {
            return $elem->value;
        }, JobPostTarget::cases());

        return [
            'job_number' => ['max:255'],
            'language_ids' => ['exists:languages,id'],
            'salary' => ['required', 'max:255'],
            'post_start_date' => ['required', 'date'],
            'post_end_date' => ['nullable', 'date', 'after:post_start_date'],
            'status' => ['required', Rule::in($statuses)],
            'display_status' => ['required', Rule::in($dislpayStatuses)],
            'target' => ['required', Rule::in($targets)],
            'group_id' => ['required', 'exists:groups,id'],
            'job_name_en' => ['required', 'max:255'],
            'industry_en' => ['required', 'max:255'],
            'location_en' => ['required', 'max:255'],
            'benefits_en' => ['required'],
            'details_en' => ['required'],
            'job_name_jp' => ['max:255'],
            'industry_jp' => ['max:255'],
            'location_jp' => ['max:255'],
            'job_name_kr' => ['max:255'],
            'industry_kr' => ['max:255'],
            'location_kr' => ['max:255'],
            'job_name_cn' => ['max:255'],
            'industry_cn' => ['max:255'],
            'location_cn' => ['max:255'],
            'admin_id' => ['nullable', 'exists:admins,id'],
            'heads_needed' => ['max:255'],
            'work_arrangement' => ['max:255'],
            'tracker_url' => ['max:255'],
            'company_name' => ['max:255'],
            'position' => ['max:255'],
            'language_fluency' => ['max:255'],
            'schedule' => ['max:255'],
            'visa' => ['max:255'],
            'education' => ['max:255'],
            'age' => ['max:255'],
            'gender' => ['max:255'],
            'experience' => ['max:255'],
            'abroad' => ['max:255'],
            'website' => ['max:255'],
            'interview_schedule' => ['max:255'],
            'job_description' => ['max:255'],
            'job_description_jp' => ['max:255'],
            'job_post_jp' => ['max:255'],
        ];
    }
}
