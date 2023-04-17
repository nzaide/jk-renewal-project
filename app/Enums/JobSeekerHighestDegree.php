<?php

namespace App\Enums;

enum JobSeekerHighestDegree: int
{
    case Graduate = 1;
    case Undergraduate = 2;
    case HighSchoolGraduate = 3;
    case ElementaryGraduate = 4;

    /**
     * Get text equivalent
     *
     * @return string
     */
    public function text()
    {
        return match ($this) {
            self::Graduate => 'Graduate',
            self::Undergraduate => 'Undergraduate',
            self::HighSchoolGraduate => 'High School Graduate',
            self::ElementaryGraduate => 'Elementary Graduate',
        };
    }
}
