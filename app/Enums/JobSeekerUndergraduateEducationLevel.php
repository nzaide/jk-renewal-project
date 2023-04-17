<?php

namespace App\Enums;

enum JobSeekerUndergraduateEducationLevel: int
{
    case FirstYear = 1;
    case SecondYear = 2;
    case ThirdYear = 3;
    case FourthYear = 4;

    /**
     * Get text equivalent
     *
     * @return string
     */
    public function text()
    {
        return match ($this) {
            self::FirstYear => '1st Year',
            self::SecondYear => '2nd Year',
            self::ThirdYear => '3rd Year',
            self::FourthYear => '4th Year',
        };
    }
}
