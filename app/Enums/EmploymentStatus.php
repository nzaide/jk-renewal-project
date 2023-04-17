<?php

namespace App\Enums;

enum EmploymentStatus: int
{
    case Employed = 1;
    case Studying = 2;
    case Unemployed = 3;

    /**
     * Converts the enum into its description
     *
     * @return mixed
     */
    public function text()
    {
        return match ($this) {
            self::Employed => __('Employed'),
            self::Studying => __('Studying'),
            self::Unemployed => __('Unemployed'),
        };
    }
}
