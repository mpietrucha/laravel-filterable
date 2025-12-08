<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Concerns;

use Illuminate\Contracts\Database\Eloquent\Builder;

/**
 * @phpstan-require-implements \Mpietrucha\Laravel\Filterable\Contracts\FilterInterface
 */
trait Negatable
{
    public function apply(Builder $builder, string $property, mixed $value): void
    {
        // parent::negate($builder, $property, $value, parent::apply(...));
    }

    public function negate(Builder $builder, string $property, mixed $value, ?callable $handler = null): void
    {
        // parent::apply($builder, $property, $value);
    }
}
