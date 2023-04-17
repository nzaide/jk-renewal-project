<?php

namespace App\Enums;

enum JapaneseFluency: int
{
    case Native = 1;
    case JLPTN1 = 2;
    case JLPTN2 = 3;
    case JLPTN3 = 4;
    case JLPTN4 = 5;
    case JLPTN5 = 6;

    /**
     * Converts the enum into its description
     *
     * @return mixed
     */
    public function text()
    {
        return match ($this) {
            self::Native => __('Native'),
            self::JLPTN1 => __('JLPT N1'),
            self::JLPTN2 => __('JLPT N2'),
            self::JLPTN3 => __('JLPT N3'),
            self::JLPTN4 => __('JLPT N4'),
            self::JLPTN5 => __('JLPT N5'),
        };
    }
}
