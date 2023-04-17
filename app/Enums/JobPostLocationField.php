<?php

namespace App\Enums;

enum JobPostLocationField: string
{
    case English = 'location_en';
    case Japanese = 'location_jp';
    case Korean = 'location_kr';
    case Mandarin = 'location_cn';

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
