<?php

namespace App\Enums;

enum Gender: int
{
    case Male = 1;
    case Female = 2;

    /**
     * Converts the enum into its description
     *
     * @return mixed
     */
    public function text()
    {
        return match ($this) {
            self::Male => __('M'),
            self::Female => __('F'),
        };
    }
}
