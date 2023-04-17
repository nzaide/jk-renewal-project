<?php

namespace App\Enums;

enum JobSeekerEnglishFluency: int
{
    case A1 = 1;
    case A2 = 2;
    case B1 = 3;
    case B2 = 4;
    case C1 = 5;
    case C2 = 6;

    /**
     * Get text equivalent
     *
     * @return string
     */
    public function text()
    {
        return match ($this) {
            self::A1 => 'A1',
            self::A2 => 'A2',
            self::B1 => 'B1',
            self::B2 => 'B2',
            self::C1 => 'C1',
            self::C2 => 'C2',
        };
    }
}
