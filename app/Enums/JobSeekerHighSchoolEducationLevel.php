<?php

namespace App\Enums;

enum JobSeekerHighSchoolEducationLevel: int
{
    case Senior = 1;
    case Junior = 2;

    /**
     * Get text equivalent
     *
     * @return string
     */
    public function text()
    {
        return match ($this) {
            self::Senior => 'Senior High School',
            self::Junior => 'Junior High School',
        };
    }
}
