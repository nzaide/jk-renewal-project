<?php

namespace App\Enums;

enum LanguageFluencyEnum: string
{
    case Japanese = JapaneseLanguageFluency::class;
    case Korean = KoreanLanguageFluency::class;
    case Mandarin = MandarinLanguageFluency::class;
    case Other = OtherLanguageFluency::class;

    /**
     * Get instance from language ID
     *
     * @param null|\App\Enums\LanguageId $languageId
     * @return self
     */
    public static function fromLanguageId(?LanguageId $languageId)
    {
        return match ($languageId) {
            LanguageId::Japanese => self::Japanese,
            LanguageId::Korean => self::Korean,
            LanguageId::Mandarin => self::Mandarin,
            default => self::Other,
        };
    }
}
