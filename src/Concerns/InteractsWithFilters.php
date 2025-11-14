<?php

namespace Mpietrucha\Laravel\Filterable\Concerns;

use Mpietrucha\Laravel\Filterable\Contracts\FilterInterface;
use Mpietrucha\Laravel\Filterable\Exception\FilterException;
use Mpietrucha\Laravel\Filterable\Filter;
use Mpietrucha\Utility\Forward\Concerns\Bridgeable;
use Mpietrucha\Utility\Instance\Path;
use Mpietrucha\Utility\Str;

/**
 * @phpstan-require-implements \Mpietrucha\Laravel\Filterable\Contracts\InteractsWithFiltersInterface
 */
trait InteractsWithFilters
{
    use Bridgeable;

    /**
     * @param  array<array-key, mixed>  $arguments
     */
    public static function __callStatic(string $method, array $arguments): FilterInterface
    {
        $filter = Path::join('\Mpietrucha\Laravel\Filterable\Filter\Embedded', Str::studly($method));

        Filter::incompatible($filter) && FilterException::for($filter)->throw();

        return static::bridge($filter)->eval('create', $arguments);
    }
}
