<?php

namespace App\Http\Middleware;

use App\Enums\Locale;
use App\Enums\LocaleQueryParameter;
use Closure;
use Illuminate\Http\Request;

class LocalizeFromQueryParameter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        /** @var null|\App\Enums\LocaleQueryParameter */
        $localeQueryParameter = collect(LocaleQueryParameter::cases())
            ->filter(fn ($enum) => $request->has($enum->value))
            ->first();

        if ($localeQueryParameter) {
            $requestUri = $request->getRequestUri();
            if (str_contains($requestUri, $localeQueryParameter->value . '=')) {
                $requestUri = str_replace(
                    $localeQueryParameter->value . '=',
                    $localeQueryParameter->value,
                    $requestUri
                );

                return redirect($requestUri);
            }
        }

        $locale = Locale::fromLocaleQueryParameter($localeQueryParameter);
        $locale = $locale->value;

        \Illuminate\Support\Facades\App::setLocale($locale);
        \Illuminate\Support\Facades\URL::defaults(['locale' => $locale]);

        return $next($request);
    }
}
