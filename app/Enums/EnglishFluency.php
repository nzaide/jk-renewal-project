<?php

namespace App\Enums;

enum EnglishFluency: int
{
    case A1 = 1;
    case A2 = 2;
    case B1 = 3;
    case B2 = 4;
    case C1 = 5;
    case C2 = 6;

    /**
     * Converts the enum into its description
     *
     * @return mixed
     */
    public function text()
    {
        return match ($this) {
            self::A1 => __('A1'),
            self::A2 => __('A2'),
            self::B1 => __('B1'),
            self::B2 => __('B2'),
            self::C1 => __('C1'),
            self::C2 => __('C2'),
        };
    }
}
