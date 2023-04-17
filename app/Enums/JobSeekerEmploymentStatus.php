<?php

namespace App\Enums;

enum JobSeekerEmploymentStatus: int
{
    case Employed = 1;
    case Studying = 2;
    case Unemployed = 3;

    /**
     * Get text equivalent
     *
     * @return string
     */
    public function text()
    {
        return match ($this) {
            self::Employed => 'Employed',
            self::Studying => 'Studying',
            self::Unemployed => 'Unemployed',
        };
    }
}
