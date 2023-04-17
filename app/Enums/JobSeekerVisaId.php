<?php

namespace App\Enums;

enum JobSeekerVisaId: int
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
     * Get text equivalent
     *
     * @return string
     */
    public function text()
    {
        return match ($this) {
            self::v13A => 'v-(13A)',
            self::vSIRV => 'v-(SIRV)',
            self::vSRRV => 'v-(SRRV)',
            self::vSVEG => 'v-(SVEG)',
            self::vTRV => 'v-(TRV)',
            self::v47a2BOI => 'v-47(a)2 BOI',
            self::v47a2Dependent => 'v-47(a)2 Dependent',
            self::v47a2PEZA => 'v-47(a)2 PEZA',
            self::v9aTourist => 'v-9(a) Tourist',
            self::v9fStudent => 'v-9(f) Student',
            self::v9gDependent => 'v-9(g) Dependent',
            self::v9gMissionary => 'v-9(g) Missionary',
            self::v9gWorking => 'v-9(g) Working',
            self::vAbroad => 'v-Abroad',
            self::vBalikBayan => 'v-Balik Bayan',
            self::vCEZA => 'v-CEZA',
            self::vDualCitizenship => 'v-Dual Citizenship',
            self::vFilipino => 'v-Filipino',
            self::vROHQ => 'v-ROHQ',
            self::vRefugee => 'v-Refugee',
            self::vSRRVDependent => 'v-SRRV Dependent',
            self::vSpecial => 'v-Special Visa (uncommon)',
        };
    }
}
