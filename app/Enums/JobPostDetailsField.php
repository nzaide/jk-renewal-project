<?php

namespace App\Enums;

enum JobPostDetailsField: string
{
    case English = 'details_en';
    case Japanese = 'details_jp';
    case Korean = 'details_kr';
    case Mandarin = 'details_cn';

    /**
     * Get instance from locale
     *
     * @param \App\Enums\Locale $locale
     * @return self
     */
    public static function fromLocale(Locale $locale)
    {
        return match ($locale) {
            Locale::Japanese => self::Japanese,
            Locale::Korean => self::Korean,
            Locale::Mandarin => self::Mandarin,
            default => self::English,
        };
    }
}
