<?php

namespace App\Enums;

enum Locale: string
{
    case English = 'en';
    case Japanese = 'ja';
    case Korean = 'ko';
    case Mandarin = 'zh-cn';

    /**
     * Converts the enum into its description
     *
     * @return mixed
     */
    public function text()
    {
        return match ($this) {
            self::English => __('English'),
            self::Japanese => __('日本語'),
            self::Korean => __('한국어'),
            self::Mandarin => __('中文'),
        };
    }

    /**
     * Get instance from language ID
     *
     * @param \App\Enums\LanguageId $languageId
     * @return self
     */
    public static function fromLanguageId(LanguageId $languageId)
    {
        return match ($languageId) {
            LanguageId::Japanese => self::Japanese,
            LanguageId::Korean => self::Korean,
            LanguageId::Mandarin => self::Mandarin,
            default => self::English,
        };
    }

    /**
     * Get instance from locale query parameter
     *
     * @param null|\App\Enums\LocaleQueryParameter $languageId
     * @return self
     */
    public static function fromLocaleQueryParameter(?LocaleQueryParameter $localeQueryParameter)
    {
        return match ($localeQueryParameter) {
            LocaleQueryParameter::Japanese => self::Japanese,
            LocaleQueryParameter::Korean => self::Korean,
            LocaleQueryParameter::Mandarin => self::Mandarin,
            default => self::English,
        };
    }

    /**
     * Get instance from About Us Url
     *
     * @param null|\App\Enums\AboutUsUrl $languageId
     * @return self
     */
    public static function fromAboutUsUrl(?AboutUsUrl $aboutUsUrl)
    {
        return match ($aboutUsUrl) {
            AboutUsUrl::Japanese => self::Japanese,
            AboutUsUrl::Korean => self::Korean,
            AboutUsUrl::Mandarin => self::Mandarin,
            default => self::English,
        };
    }

    /** Get instance from For Clients Url
     *
     * @param null|\App\Enums\ForClientsUrl $languageId
     * @return self
     */
    public static function fromForClientsUrl(?ForClientsUrl $forClientsUrl)
    {
        return match ($forClientsUrl) {
            ForClientsUrl::Japanese => self::Japanese,
            ForClientsUrl::Korean => self::Korean,
            ForClientsUrl::Mandarin => self::Mandarin,
            default => self::English,
        };
    }
}
