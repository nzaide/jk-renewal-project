<?php

namespace App\Enums;

enum JobSeekerGraduateEducationLevel: int
{
    case PhD = 1;
    case Master = 2;
    case Bachelor = 3;
    case Vocational = 4;
    case Associate = 5;

    /**
     * Get text equivalent
     *
     * @return string
     */
    public function text()
    {
        return match ($this) {
            self::PhD => 'PhD',
            self::Master => 'Master',
            self::Bachelor => 'Bachelor',
            self::Vocational => 'Vocational',
            self::Associate => 'Associate',
        };
    }
}
