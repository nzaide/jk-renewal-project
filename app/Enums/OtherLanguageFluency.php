<?php

namespace App\Enums;

enum OtherLanguageFluency: int
{
    case Native = 1;
    case C2 = 2;
    case C1 = 3;
    case B2 = 4;
    case B1 = 5;
    case A2 = 6;
    case A1 = 7;

    /**
     * Get text equivalent
     *
     * @return string
     */
    public function text()
    {
        return match ($this) {
            self::Native => 'Native',
            self::C2 => 'C2',
            self::C1 => 'C1',
            self::B2 => 'B2',
            self::B1 => 'B1',
            self::A2 => 'A2',
            self::A1 => 'A1',
        };
    }
}
