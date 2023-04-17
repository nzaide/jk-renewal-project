<?php

declare(strict_types=1);

namespace App\Http\Enum;

/**
 * Response status
 */
final class ResponseStatus
{
    /**
     * Success
     *
     * @var string
     */
    public const SUCCESS = 'Success';

    /**
     * Validation error
     *
     * @var string
     */
    public const VALIDATION_ERROR = 'Validation Error';

    /**
     * Not Found
     *
     * @var string
     */
    public const ERROR = 'Error';
}
