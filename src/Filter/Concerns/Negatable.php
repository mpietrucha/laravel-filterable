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
        $handler = parent::apply(...);

        parent::negate($query, $property, $value, $handler);
    }

    public function negate(Builder $query, string $property, mixed $value, ?callable $handler = null): void
    {
        dd('xd');
    }
}
