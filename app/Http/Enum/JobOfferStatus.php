<?php

declare(strict_types=1);

namespace App\Http\Enum;

/**
 * JobOfferStatus
 */
final class JobOfferStatus
{
    /**
     * INACTIVE | 非活性
     *
     * @var int
     */
    public const INACTIVE = 0;

    /**
     * ACTIVE | アクティブ
     *
     * @var int
     */
    public const ACTIVE = 1;
}
