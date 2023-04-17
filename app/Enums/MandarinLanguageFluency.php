<?php

namespace App\Enums;

enum MandarinLanguageFluency: int
{
    case Native = 1;
    case HSK6 = 2;
    case HSK5 = 3;
    case HSK4 = 4;
    case HSK3 = 5;
    case HSK2 = 6;
    case HSK1 = 7;

    /**
     * Get text equivalent
     *
     * @return string
     */
    public function text()
    {
        return match ($this) {
            self::Native => 'Native',
            self::HSK6 => 'HSK 6',
            self::HSK5 => 'HSK 5',
            self::HSK4 => 'HSK 4',
            self::HSK3 => 'HSK 3',
            self::HSK2 => 'HSK 2',
            self::HSK1 => 'HSK 1',
        };
    }
}
