<?php

namespace App\Enums;

enum Visa: int
{
    case v13A = 1;
    case vSIRV = 2;
    case vSRRV = 3;
    case vSVEG = 4;
    case vTRV = 5;
    case v47a2BOI = 6;
    case v47a2Dependent = 7;
    case v47a2PEZA = 8;
    case v9aTourist = 9;
    case v9fStudent = 10;
    case v9gDependent = 11;
    case v9gMissionary = 12;
    case v9gWorking = 13;
    case vAbroad = 14;
    case vBalikBayan = 15;
    case vCEZA = 16;
    case vDualCitizenship = 17;
    case vFilipino = 18;
    case vROHQ = 19;
    case vRefugee = 20;
    case vSRRVDependent = 21;
    case vSpecial = 22;

    /**
     * Converts the enum into its description
     *
     * @return mixed
     */
    public function text()
    {
        return match ($this) {
            self::v13A => __('v-(13A)'),
            self::vSIRV => __('v-(SIRV)'),
            self::vSRRV => __('v-(SRRV)'),
            self::vSVEG => __('v-(SVEG)'),
            self::vTRV => __('v-(TRV)'),
            self::v47a2BOI => __('v-47(a)2 BOI'),
            self::v47a2Dependent => __('v-47(a)2 Dependent'),
            self::v47a2PEZA => __('v-47(a)2 PEZA'),
            self::v9aTourist => __('v-9(a) Tourist'),
            self::v9fStudent => __('v-9(f) Student'),
            self::v9gDependent => __('v-9(g) Dependent'),
            self::v9gMissionary => __('v-9(g) Missionary'),
            self::v9gWorking => __('v-9(g) Working'),
            self::vAbroad => __('v-Abroad'),
            self::vBalikBayan => __('v-Balik Bayan'),
            self::vCEZA => __('v-CEZA'),
            self::vDualCitizenship => __('v-Dual Citizenship'),
            self::vFilipino => __('v-Filipino'),
            self::vROHQ => __('v-ROHQ'),
            self::vRefugee => __('v-Refugee'),
            self::vSRRVDependent => __('v-SRRV Dependent'),
            self::vSpecial => __('v-Special Visa (uncommon)'),
        };
    }
}
