<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Concerns\Apply;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Mpietrucha\Utility\Str;

/**
 * @phpstan-require-implements \Mpietrucha\Laravel\Filterable\Contracts\FilterInterface
 */
trait IsEmpty
{
    public function apply(Builder $query, string $property, mixed $value): void
    {
        $query->whereNull($property);
        $query->orWhere($property, Str::none());
    }
}
