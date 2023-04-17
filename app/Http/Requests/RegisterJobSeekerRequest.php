<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rule;

class RegisterJobSeekerRequest extends FormRequest
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
            'fullname' => 'required|max:255',
            'nationality' => 'required|exists:nationalities,id',
            'first_language' => 'nullable|required_if:language,=,1|exists:languages,id',
            'second_language' => 'nullable|exists:languages,id',
            'third_language' => 'nullable|exists:languages,id',
            'contact' => 'required|max:255',
            'upload_resume' => 'nullable|mimes:doc,docx,pdf,xls,xlsx,jpg,png,jpeg,gif|max:5120',
        ];
    }
}
