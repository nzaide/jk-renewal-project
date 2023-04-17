<?php

namespace App\Enums;

enum JobPostIndustryField: string
{
    case English = 'industry_en';
    case Japanese = 'industry_jp';
    case Korean = 'industry_kr';
    case Mandarin = 'industry_cn';

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
