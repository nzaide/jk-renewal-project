<?php

namespace App\Enums;

enum JobPostBenefitsField: string
{
    case English = 'benefits_en';
    case Japanese = 'benefits_jp';
    case Korean = 'benefits_kr';
    case Mandarin = 'benefits_cn';

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
