<?php

namespace App\Enums;

enum EmploymentType: int
{
    case Freelance = 1;
    case FullTime = 2;
    case PartTime = 3;

    /**
     * Converts the enum into its description
     *
     * @return mixed
     */
    public function text()
    {
        return match ($this) {
            self::Freelance => __('Freelance'),
            self::FullTime => __('Full Time'),
            self::PartTime => __('Part Time'),
        };
    }
}
