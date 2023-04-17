<?php

namespace App\Enums;

enum UndergraduateLevel: int
{
    case FirstYear = 1;
    case SecondYear = 2;
    case ThirdYear = 3;
    case FourthYear = 4;

    /**
     * Converts the enum into its description
     *
     * @return mixed
     */
    public function text()
    {
        return match ($this) {
            self::FirstYear => __('1st year'),
            self::SecondYear => __('2nd year'),
            self::ThirdYear => __('3rd year'),
            self::FourthYear => __('4th year'),
        };
    }
}
