<?php

declare(strict_types=1);

namespace App\Http\Enum;

/**
 * Sort
 */
final class Sort
{
    /**
     * SORTBYDATE
     *
     * @var string
     */
    public const SORTBYDATE = "sort_by_date";

    /**
     * SORTBYVIEWS
     *
     * @var string
     */
    public const SORTBYVIEWS = "sort_by_views";

    /**
     * DATE
     *
     * @var string
     */
    public const POSTDATE = "post_date";

    /**
     * VIEWS
     *
     * @var string
     */
    public const VIEWS = "views";
}
