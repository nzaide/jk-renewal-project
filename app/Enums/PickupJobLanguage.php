<?php

namespace App\Enums;

enum PickupJobLanguage: int
{
    case English = 1;
    case Japanese = 2;
    case Korean = 3;
    case Mandarin = 4;

    /**
     * Get instance from language ID
     *
     * @param \App\Enums\LanguageId $languageId
     * @return self|null
     */
    public static function tryFromLanguageId(LanguageId $languageId)
    {
        return match ($languageId) {
            LanguageId::English => self::English,
            LanguageId::Japanese => self::Japanese,
            LanguageId::Korean => self::Korean,
            LanguageId::Mandarin => self::Mandarin,
            default => null,
        };
    }

    /**
     * Converts the enum into its description
     *
     * @return mixed
     */
    public function text()
    {
        return match ($this) {
            self::English => __('English'),
            self::Japanese => __('Japanese'),
            self::Korean => __('Korean'),
            self::Mandarin => __('Mandarin'),
        };
    }
}
