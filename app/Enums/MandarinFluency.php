<?php

namespace App\Enums;

enum MandarinFluency: int
{
    case Native = 1;
    case HSK6 = 2;
    case HSK5 = 3;
    case HSK4 = 4;
    case HSK3 = 5;
    case HSK2 = 6;
    case HSK1 = 7;

    /**
     * Converts the enum into its description
     *
     * @return mixed
     */
    public function text()
    {
        return match ($this) {
            self::Native => __('Native'),
            self::HSK6 => __('HSK 6'),
            self::HSK5 => __('HSK 5'),
            self::HSK4 => __('HS 4'),
            self::HSK3 => __('HSK 3'),
            self::HSK2 => __('HSK 2'),
            self::HSK1 => __('HSK 1'),
        };
    }
}
