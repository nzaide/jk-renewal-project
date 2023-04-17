<?php

namespace App\Enums;

enum JobPostTarget: int
{
    case Foreigner = 1;
    case Multilingual = 2;
    case Filipino = 3;

    /**
     * Get text equivalent
     *
     * @return string
     */
    public function text()
    {
        return match ($this) {
            self::Foreigner => 'Foreigner',
            self::Multilingual => 'Multilingual-Filipino',
            self::Filipino => 'Filipino',
        };
    }
}
