<?php

namespace App\Http\Requests;

use App\Rules\ReCaptcha;
use Illuminate\Foundation\Http\FormRequest;

class StoreInquiryRequest extends FormRequest
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
            'name' => [
                'required',
                'max:255',
            ],
            'company_name' => [
                'required',
                'max:255',
            ],
            'email' => [
                'required',
                'email',
                'max:255'
            ],
            'contact' => [
                'required',
                'max:255',
            ],
            'details' => [
                'required',
                'max:5000',
            ],
            'g-recaptcha-response' => ['required', new ReCaptcha()],
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
            'name' => __('Name'),
            'company_name' => __('Company Name'),
            'email' => __('Email Address'),
            'contact' => __('Tel no.'),
            'details' => __('Inquiry Details'),
        ];
    }
}
