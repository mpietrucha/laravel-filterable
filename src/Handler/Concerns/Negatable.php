<?php

namespace Mpietrucha\Laravel\Filterable\Handler\Concerns;

use Illuminate\Contracts\Database\Eloquent\Builder;

/**
 * @phpstan-require-implements \Mpietrucha\Laravel\Filterable\Handler\Contracts\HandlerInterface
 */
trait Negatable
{
    public function apply(Builder $query, string $property, mixed $value): void
    {
        parent::negate($query, $property, $value);
    }

    public function negate(Builder $query, string $property, mixed $value): void
    {
        parent::apply($query, $property, $value);
    }
}
