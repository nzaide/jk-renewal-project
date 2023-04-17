<?php

namespace App\Enums;

enum JobPostStatus: int
{
    case Open = 1;
    case Closed = 2;
    case OnHold = 3;

    /**
     * Converts the enum into its description
     *
     * @return mixed
     */
    public function text()
    {
        return match ($this) {
            self::Open => __('Open'),
            self::Closed => __('Closed'),
            self::OnHold => __('On Hold'),
        };
    }
}
