<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Concerns;

use Mpietrucha\Laravel\Filterable\Concerns\Delegable;
use Mpietrucha\Laravel\Filterable\Filter\Contracts\FilterInterface;
use Mpietrucha\Laravel\Filterable\Filter\Exception\FilterException;
use Mpietrucha\Laravel\Filterable\Filter\Preset;

/**
 * @phpstan-require-implements \Mpietrucha\Laravel\Filterable\Filter\Contracts\InteractsWithFiltersInterface
 *
 * @phpstan-import-type MixedArray from \Mpietrucha\Utility\Arr
 */
trait InteractsWithFilters
{
    use Delegable;

    /**
     * @param  MixedArray  $arguments
     */
    public static function __callStatic(string $method, array $arguments): FilterInterface
    {
        return static::delegate(
            Preset::class,
            $method,
            $arguments,
            FilterInterface::class
        ) ?? FilterException::for($method)->throw();
    }
}
