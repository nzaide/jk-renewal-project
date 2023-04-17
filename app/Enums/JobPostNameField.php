<?php

namespace App\Enums;

enum JobPostNameField: string
{
    case English = 'job_name_en';
    case Japanese = 'job_name_jp';
    case Korean = 'job_name_kr';
    case Mandarin = 'job_name_cn';

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
