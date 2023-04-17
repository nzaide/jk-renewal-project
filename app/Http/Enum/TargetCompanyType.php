<?php

declare(strict_types=1);

namespace App\Http\Enum;

/**
 * Target Company type
 */
final class TargetCompanyType
{
    /**
     * Uer used to belong  or user are currently belonging
     *
     * @var int
     */
    public const BELONGS_TO = 1;

    /**
     * user used to have been interviewed
     *
     * @var int
     */
    public const HAVE_BEEN_INTERVIEWED = 2;
}
