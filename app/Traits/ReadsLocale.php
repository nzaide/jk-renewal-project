<?php

namespace App\Traits;

use App\Enums\Locale;

trait ReadsLocale
{
    /**
     * Locale
     *
     * @var \App\Enums\Locale
     */
    private static $locale;

    /**
     * Get locale
     *
     * @return \App\Enums\Locale
     */
    public function locale()
    {
        if (self::$locale === null) {
            self::$locale = Locale::from(
                \Illuminate\Support\Facades\App::getLocale()
            );
        }

        return self::$locale;
    }
}
