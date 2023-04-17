<?php

namespace App\Enums;

enum JobSeekerMaritalStatus: int
{
    case Divorced = 1;
    case Married = 2;
    case Separated = 3;
    case Single = 4;
    case SingleWithDependent = 5;

    /**
     * Get text equivalent
     *
     * @return string
     */
    public function text()
    {
        return match ($this) {
            self::Divorced => 'Divorced',
            self::Married => 'Married',
            self::Separated => 'Separated',
            self::Single => 'Single',
            self::SingleWithDependent => 'Single with Dependent',
        };
    }
}
