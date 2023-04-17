<?php

namespace App\Enums;

enum KoreanLanguageFluency: int
{
    case Native = 1;
    case TOPIK6 = 2;
    case TOPIK5 = 3;
    case TOPIK4 = 4;
    case TOPIK3 = 5;
    case TOPIK2 = 6;
    case TOPIK1 = 7;

    /**
     * Get text equivalent
     *
     * @return string
     */
    public function text()
    {
        return match ($this) {
            self::Native => 'Native',
            self::TOPIK6 => 'TOPIK 6',
            self::TOPIK5 => 'TOPIK 5',
            self::TOPIK4 => 'TOPIK 4',
            self::TOPIK3 => 'TOPIK 3',
            self::TOPIK2 => 'TOPIK 2',
            self::TOPIK1 => 'TOPIK 1',
        };
    }
}
