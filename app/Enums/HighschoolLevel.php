<?php

namespace App\Enums;

enum HighschoolLevel: int
{
    case Senior = 1;
    case Junior = 2;

    /**
     * Converts the enum into its description
     *
     * @return mixed
     */
    public function text()
    {
        return match ($this) {
            self::Senior => __('Senior Highschool'),
            self::Junior => __('Junior HighSchool'),
        };
    }
}
