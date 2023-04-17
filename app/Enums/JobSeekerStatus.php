<?php

namespace App\Enums;

enum JobSeekerStatus: int
{
    case InitiallyRegistered = 1;
    case FullyRegistered = 2;
}
