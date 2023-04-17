<?php

namespace App\Http\Middleware;

use App\Enums\Locale;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Localize
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
        $locales = array_map(fn ($enum) => $enum->value, Locale::cases());
        $locale = $request->segment(1);

        if (in_array($locale, $locales, true)) {
            \Illuminate\Support\Facades\App::setLocale($locale);
            \Illuminate\Support\Facades\URL::defaults(['locale' => $locale]);
            $request->route()->forgetParameter('locale');

            return $next($request);
        }

        throw new NotFoundHttpException();
    }
}
