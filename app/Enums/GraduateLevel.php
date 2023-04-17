<?php

namespace App\Enums;

enum GraduateLevel: int
{
    case PHD = 1;
    case Master = 2;
    case Bachelor = 3;
    case Vocational = 4;
    case Associate = 5;

    /**
     * Converts the enum into its description
     *
     * @return mixed
     */
    public function text()
    {
        return match ($this) {
            self::PHD => __('PHD'),
            self::Master => __('Master'),
            self::Bachelor => __('Bachelor'),
            self::Vocational => __('Vocational'),
            self::Associate => __('Associate'),
        };
    }
}
