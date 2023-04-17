<?php

namespace App\Enums;

enum KoreanFluency: int
{
    case Native = 1;
    case TOPIK6 = 2;
    case TOPIK5 = 3;
    case TOPIK4 = 4;
    case TOPIK3 = 5;
    case TOPIK2 = 6;
    case TOPIK1 = 7;

    /**
     * Converts the enum into its description
     *
     * @return mixed
     */
    public function text()
    {
        return match ($this) {
            self::Native => __('Native'),
            self::TOPIK6 => __('TOPIK 6'),
            self::TOPIK5 => __('TOPIK 5'),
            self::TOPIK4 => __('TOPIK 4'),
            self::TOPIK3 => __('TOPIK 3'),
            self::TOPIK2 => __('TOPIK 2'),
            self::TOPIK1 => __('TOPIK 1'),
        };
    }
}
