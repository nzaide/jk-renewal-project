<?php

namespace App\Http\Controllers;

use App\Enums\AboutUsUrl;
use App\Enums\ForClientsUrl;
use App\Enums\Locale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class PageController extends Controller
{
    /**
     * This action will handle all static pages.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Request $request)
    {
        $locale = Locale::English->value;
        $view = '';

        if (ForClientsUrl::tryfrom($request->path())) {
            $locale = Locale::fromForClientsUrl(ForClientsUrl::from($request->path()))->value;
            $view = 'pages.for-employers.show_' . $locale;
        } elseif (AboutUsUrl::tryfrom($request->path())) {
            $locale = Locale::fromAboutUsUrl(AboutUsUrl::from($request->path()))->value;
            $view = 'pages.about-us.show_' . $locale;
        } elseif ($request->path() == (App::currentLocale() . '/pages/privacy-policy')) {
            $locale = App::currentLocale();
            $view = 'pages.privacy-policy.show';
        }

        App::setLocale($locale);
        URL::defaults(['locale' => $locale]);

        if ($view) {
            return view($view);
        }

        abort(404);
    }
}
