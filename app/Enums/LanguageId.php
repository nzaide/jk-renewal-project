<?php

namespace App\Enums;

enum LanguageId: int
{
    case Japanese = 1;
    case Korean = 2;
    case Mandarin = 3;
    case Arabic = 4;
    case Armenian = 5;
    case AustralianEnglish = 6;
    case Austrian = 7;
    case Bengali = 8;
    case Bosnian = 9;
    case Bulgarian = 10;
    case Burmese = 11;
    case Cameroonian = 12;
    case Cantonese = 13;
    case Catalan = 14;
    case Croatian = 15;
    case Czech = 16;
    case Danish = 17;
    case Dutch = 18;
    case English = 19;
    case Esperanto = 20;
    case Estonian = 21;
    case Ethiopian = 22;
    case Farsi = 23;
    case Filipino = 24;
    case Finnish = 25;
    case French = 26;
    case Fukien = 27;
    case Galician = 28;
    case Georgian = 29;
    case German = 30;
    case Greek = 31;
    case HaitianCreole = 32;
    case Hausa = 33;
    case Hebrew = 34;
    case Hindi = 35;
    case Hmong = 36;
    case Hokkien = 37;
    case Hungarian = 38;
    case Icelandic = 39;
    case Igbo = 40;
    case Indonesian = 41;
    case Iranian = 42;
    case Irish = 43;
    case Italian = 44;
    case Kannada = 45;
    case Khmer = 46;
    case Lao = 47;
    case Latin = 48;
    case Lithuanian = 49;
    case Macedonian = 50;
    case Malay = 51;
    case Malayalam = 52;
    case Maltese = 53;
    case Maori = 54;
    case Marathi = 55;
    case Mongolian = 56;
    case Nepali = 57;
    case Norwegian = 58;
    case Oriya = 59;
    case Persian = 60;
    case Polish = 61;
    case Portuguese = 62;
    case Punjabi = 63;
    case Romanian = 64;
    case Russian = 65;
    case Sample = 66;
    case Serbian = 67;
    case Shona = 68;
    case Slovak = 69;
    case Slovenian = 70;
    case Somali = 71;
    case Spanish = 72;
    case Srilanka = 73;
    case Swahili = 74;
    case Swedish = 75;
    case SwissGerman = 76;
    case Taiwanese = 77;
    case Tamil = 78;
    case Telugu = 79;
    case Thai = 80;
    case Turkish = 81;
    case Twidialect = 82;
    case Ukrainian = 83;
    case Urdu = 84;
    case Vietnamese = 85;
    case Welsh = 86;
    case Yiddish = 87;
    case Yoruba = 88;
    case Zulu = 89;

    /**
     * Job post benefits field
     *
     * @return \App\Enums\JobPostBenefitsField
     */
    public function jobPostBenefitsField()
    {
        return match ($this) {
            self::Japanese => JobPostBenefitsField::Japanese,
            self::Korean => JobPostBenefitsField::Korean,
            self::Mandarin => JobPostBenefitsField::Mandarin,
        };
    }

    /**
     * Job post details field
     *
     * @return \App\Enums\JobPostDetailsField
     */
    public function jobPostDetailsField()
    {
        return match ($this) {
            self::Japanese => JobPostDetailsField::Japanese,
            self::Korean => JobPostDetailsField::Korean,
            self::Mandarin => JobPostDetailsField::Mandarin,
        };
    }

    /**
     * Job post industry field
     *
     * @return \App\Enums\JobPostDetailsField
     */
    public function jobPostIndustryField()
    {
        return match ($this) {
            self::Japanese => JobPostIndustryField::Japanese,
            self::Korean => JobPostIndustryField::Korean,
            self::Mandarin => JobPostIndustryField::Mandarin,
        };
    }

    /**
     * Job post location field
     *
     * @return \App\Enums\JobPostLocationField
     */
    public function jobPostLocationField()
    {
        return match ($this) {
            self::Japanese => JobPostLocationField::Japanese,
            self::Korean => JobPostLocationField::Korean,
            self::Mandarin => JobPostLocationField::Mandarin,
        };
    }

    /**
     * Job post name field
     *
     * @return \App\Enums\JobPostNameField
     */
    public function jobPostNameField()
    {
        return match ($this) {
            self::Japanese => JobPostNameField::Japanese,
            self::Korean => JobPostNameField::Korean,
            self::Mandarin => JobPostNameField::Mandarin,
        };
    }
}
