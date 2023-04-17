<?php

namespace App\Enums;

enum HighestDegree: int
{
    case Graduate = 1;
    case Undergraduate = 2;
    case Highschool = 3;
    case Elementary = 4;

    /**
     * Converts the enum into its description
     *
     * @return mixed
     */
    public function text()
    {
        return match ($this) {
            self::Graduate => __('Graduate'),
            self::Undergraduate => __('Undergraduate'),
            self::Highschool => __('Highschool Graduate'),
            self::Elementary => __('Elementary Graduate'),
        };
    }
}
