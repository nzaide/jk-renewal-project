<?php

namespace App\Http\Requests\Admin;

use App\Enums\PickupJobLanguage;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequiredLanguageSortRequest extends FormRequest
{
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
            'sorted_ids' => ['required', 'array'],
            'language' => ['required', Rule::in($languages)],
        ];
    }
}
