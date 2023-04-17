<?php

namespace App\Enums;

enum MaritalStatus: int
{
    case Divorced = 1;
    case Married = 2;
    case Separate = 3;
    case Single = 4;
    case SingleWithDependent = 5;

    /**
     * Converts the enum into its description
     *
     * @return mixed
     */
    public function text()
    {
        return match ($this) {
            self::Divorced => __('Divorced'),
            self::Married => __('Married'),
            self::Separate => __('Separate'),
            self::Single => __('Single'),
            self::SingleWithDependent => __('Single With Dependent'),
        };
    }
}
