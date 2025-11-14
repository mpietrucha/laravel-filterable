<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Embedded;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Mpietrucha\Laravel\Filterable\Filter\Embedded;
use Mpietrucha\Utility\Str;

class Contains extends Embedded
{
    public function apply(Builder $query, string $property, mixed $value): void
    {
        $query->whereLike($property, Str::sprintf('%%%s%%', $value));
    }
}
