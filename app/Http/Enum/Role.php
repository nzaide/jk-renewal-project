<?php

namespace App\Http\Enum;

enum Role: int
{
    case Administrator = 1;
    case Recruiter = 2;

    /**
     * Converts the enum into its description
     *
     * @return mixed
     */
    public function getDescription()
    {
        return match ($this) {
            self::Administrator => __('Administrator'),
            self::Recruiter => __('Recruiter'),
        };
    }
}
