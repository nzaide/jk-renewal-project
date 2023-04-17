<?php

namespace App\Rules;

use App\Services\Google\RecaptchaService;
use Illuminate\Contracts\Validation\Rule;

class ReCaptcha implements Rule
{
    private $recaptchaService;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->recaptchaService = new RecaptchaService();
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $this->recaptchaService->getResponse($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('The is required.');
    }
}
