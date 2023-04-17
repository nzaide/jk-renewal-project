<?php

namespace App\Enums;

enum JobSeekerPreferredEmployment: int
{
    case Freelance = 1;
    case FullTime = 2;
    case PartTime = 3;

    /**
     * Get text equivalent
     *
     * @return string
     */
    public function text()
    {
        return match ($this) {
            self::Freelance => 'Freelance',
            self::FullTime => 'Full-time',
            self::PartTime => 'Part-time',
        };
    }
}
