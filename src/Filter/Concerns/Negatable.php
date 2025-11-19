<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Concerns;

use Illuminate\Contracts\Database\Eloquent\Builder;

/**
 * @phpstan-require-implements \Mpietrucha\Laravel\Filterable\Contracts\FilterInterface
 */
trait Negatable
{
    public function apply(Builder $query, string $property, mixed $value): void
    {
        // parent::negate($query, $property, $value, parent::apply(...));
    }

    public function negate(Builder $query, string $property, mixed $value, ?callable $handler = null): void
    {
        // parent::apply($query, $property, $value);
    }
}
