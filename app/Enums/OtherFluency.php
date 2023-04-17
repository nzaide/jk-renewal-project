<?php

namespace App\Enums;

enum OtherFluency: int
{
    case Native = 1;
    case C2 = 2;
    case C1 = 3;
    case B2 = 4;
    case B1 = 5;
    case A2 = 6;
    case A1 = 7;

    /**
     * Converts the enum into its description
     *
     * @return mixed
     */
    public function text()
    {
        return match ($this) {
            self::Native => __('Native'),
            self::C2 => __('C2'),
            self::C1 => __('C1'),
            self::B2 => __('B2'),
            self::B1 => __('B1'),
            self::A2 => __('A2'),
            self::A1 => __('A1'),
        };
    }
}
