<?php

declare(strict_types=1);

namespace App\Http\Enum;

/**
 * Role
 */
final class RegistrationStatus
{
    /**
     * PRE_REGISTERED | 仮登録済
     *
     * @var int
     */
    public const PRE_REGISTERED = 1;

    /**
     * ACTIVE | アクティブ
     *
     * @var int
     */
    public const ACTIVE = 2;

    /**
     * WITHDRAWED | 退会済
     *
     * @var int
     */
    public const WITHDRAWED = 3;
}
