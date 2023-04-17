<?php

namespace App\Enums;

enum JapaneseLanguageFluency: int
{
    case Native = 1;
    case JLPTN1 = 2;
    case JLPTN2 = 3;
    case JLPTN3 = 4;
    case JLPTN4 = 5;
    case JLPTN5 = 6;

    /**
     * Get text equivalent
     *
     * @return string
     */
    public function text()
    {
        return match ($this) {
            self::Native => 'Native',
            self::JLPTN1 => 'N1',
            self::JLPTN2 => 'N2',
            self::JLPTN3 => 'N3',
            self::JLPTN4 => 'N4',
            self::JLPTN5 => 'N5',
        };
    }
}
