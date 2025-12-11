<?php

namespace Mpietrucha\Laravel\Filterable\Contracts;

use Illuminate\Contracts\Database\Eloquent\Builder;

/**
 * @internal
 */
interface ApplicableInterface
{
    public function apply(Builder $query, string $property, mixed $value): void;
}
