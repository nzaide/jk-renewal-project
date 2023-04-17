<?php

declare(strict_types=1);

namespace App\Http\Enum;

/**
 * SSOType
 */
final class SSOType
{
    /**
     * Normal
     *
     * @var int
     */
    public const NORMAL = 1;

    /**
     * Google
     *
     * @var int
     */
    public const GOOGLE = 2;

    /**
     * Facebook
     *
     * @var int
     */
    public const FACEBOOK = 3;

    /**
     * Twitter
     *
     * @var int
     */
    public const TWITTER = 4;
}
