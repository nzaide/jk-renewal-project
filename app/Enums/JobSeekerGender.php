<?php

namespace App\Enums;

enum JobSeekerGender: int
{
    case Male = 1;
    case Female = 2;

    /**
     * Get text equivalent
     *
     * @return string
     */
    public function text()
    {
        return match ($this) {
            self::Male => 'Male',
            self::Female => 'Female',
        };
    }
}
