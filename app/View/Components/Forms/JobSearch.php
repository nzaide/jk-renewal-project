<?php

namespace App\View\Components\Forms;

use App\Enums\JobPostLocationField;
use App\Enums\Locale;
use App\Enums\LocaleQueryParameter;
use App\Models\JobPost;
use App\Models\Language;
use Illuminate\View\Component;

class JobSearch extends Component
{
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $languages = Language::all(['id', 'language']);

        $locale = Locale::from(
            \Illuminate\Support\Facades\App::getLocale()
        );

        $localeQueryParameter = LocaleQueryParameter::fromLocale($locale);

        return view('components.forms.job-search', compact(
            'languages',
            'localeQueryParameter',
        ));
    }
}
