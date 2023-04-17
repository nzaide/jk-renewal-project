<?php

namespace App\Http\Requests\Admin;

use App\Enums\JobPostStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateJobPostStatusRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $statuses = array_map(function ($elem) {
            return $elem->value;
        }, JobPostStatus::cases());

        return [
            'status' => ['required', Rule::in($statuses)],
        ];
    }
}
