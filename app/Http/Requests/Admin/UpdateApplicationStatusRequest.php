<?php

namespace App\Http\Requests\Admin;

use App\Enums\ApplicationStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateApplicationStatusRequest extends FormRequest
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
        }, ApplicationStatus::cases());

        return [
            'application_status' => ['required', Rule::in($statuses)],
        ];
    }
}
