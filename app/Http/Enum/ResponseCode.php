<?php

declare(strict_types=1);

namespace App\Http\Enum;

/**
 * Response code
 */
final class ResponseCode
{
    /**
     * Success code
     *
     * @var int
     */
    public const SUCCESS = 200;

    /**
     * Error code
     *
     * @var int
     */
    public const ERROR = 500;

    /**
     * Validation Error code
     *
     * @var int
     */
    public const VALIDATION_ERROR = 400;
}
