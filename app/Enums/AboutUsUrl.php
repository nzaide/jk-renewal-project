<?php

namespace App\Enums;

enum AboutUsUrl: string
{
    case English = 'aboutUs_en';
    case Japanese = 'aboutUs_ja';
    case Korean = 'aboutUs_ko';
    case Mandarin = 'aboutUs_zh-CN';

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
