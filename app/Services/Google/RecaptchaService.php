<?php

namespace App\Services\Google;

use Illuminate\Support\Facades\Http;

class RecaptchaService
{
    /**
     * Recaptcha Get Response
     *
     * @param mixed $value
     * @return bool
     */
    public function getResponse($value)
    {
        $response = Http::get(config('services.recaptcha.url'), [
            'secret' => config('services.recaptcha.secret_key'),
            'response' => $value,
        ]);

        return $response->json()['success'];
    }
}
