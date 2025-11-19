<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Concerns\Apply;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Mpietrucha\Utility\Str;

/**
 * @phpstan-require-implements \Mpietrucha\Laravel\Filterable\Contracts\FilterInterface
 */
trait In
{
    public function apply(Builder $query, string $property, mixed $value): void
    {
        $value = Str::lines($value);

        $query->whereIn($property, $value);
    }
}
