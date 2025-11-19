<?php

namespace Mpietrucha\Laravel\Filterable\Concerns;

use Mpietrucha\Laravel\Filterable\Contracts\FilterInterface;
use Mpietrucha\Laravel\Filterable\Exception\FilterException;
use Mpietrucha\Laravel\Filterable\Filter\Embedded;

/**
 * @phpstan-require-implements \Mpietrucha\Laravel\Filterable\Contracts\InteractsWithFiltersInterface
 */
trait InteractsWithFilters
{
    use Delegable;

    /**
     * @param  array<array-key, mixed>  $arguments
     */
    public static function __callStatic(string $method, array $arguments): FilterInterface
    {
        return static::delegate(
            Embedded::class,
            $method,
            $arguments,
            FilterInterface::class
        ) ?? FilterException::for($method)->throw();
    }
}
