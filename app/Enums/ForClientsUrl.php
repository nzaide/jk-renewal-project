<?php

namespace App\Enums;

enum ForClientsUrl: string
{
    case English = 'forClients';
    case Japanese = 'forClients_ja';
    case Korean = 'forClients_ko';
    case Mandarin = 'forClients_zh-CN';

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
