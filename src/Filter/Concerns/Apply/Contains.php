<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Concerns\Apply;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Mpietrucha\Utility\Str;

/**
 * @phpstan-require-implements \Mpietrucha\Laravel\Filterable\Contracts\FilterInterface
 */
trait Contains
{
    public function apply(Builder $query, string $property, mixed $value): void
    {
        $value = Str::sprintf('%%%s%%', $value);

        $query->whereLike($property, $value);
    }
}
