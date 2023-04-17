<?php

namespace App\Exceptions;

use App\Enums\LanguageId;
use App\Enums\Locale;
use App\Models\JobSeeker;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (NotFoundHttpException $_, $request) {
            $locales = array_map(fn ($enum) => $enum->value, Locale::cases());
            $locale = $request->segment(1);

            if (!in_array($locale, $locales, true)) {
                $locale = Locale::English;
                $user = $request->user();

                if ($user instanceof JobSeeker && $user->language_first_id) {
                    $languageId = LanguageId::from(($user->language_first_id));
                    $locale = Locale::fromLanguageId($languageId);
                }

                return redirect('/' . $locale->value . $request->getRequestUri());
            }
        });
    }
}
