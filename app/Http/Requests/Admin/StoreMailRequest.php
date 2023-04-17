<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreMailRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'max:255'],
            'contents' => ['required', 'max:65535'],
            'job_seekers' => [
                'required_if:send_to_all,false',
                'prohibited_if:send_to_all,true',
                'array',
                'min:1',
            ],
            'job_seekers.*' => ['required', 'array:id'],
            'job_seekers.*.id' => ['required', 'distinct', 'exists:job_seekers'],
            'send_to_all' => ['required', 'boolean'],
            'attachment' => [
                'file',
                'max:5000',
                'mimes:docx,gif,jpg,jpeg,pdf,png,xls,xlsx',
            ],
        ];
    }
}
