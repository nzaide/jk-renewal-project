<?php

namespace App\Enums;

enum LocaleQueryParameter: string
{
    case English = '';
    case Japanese = 'lang_ja';
    case Korean = 'lang_ko';
    case Mandarin = 'lang_zh-CN';

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
