<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Embedded;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Mpietrucha\Laravel\Filterable\Filter\Contracts\IndependentInterface;
use Mpietrucha\Laravel\Filterable\Filter\Embedded;
use Mpietrucha\Utility\Str;

class IsEmpty extends Embedded implements IndependentInterface
{
    public function apply(Builder $query, string $property, mixed $value): void
    {
        $query->whereNull($property);
        $query->orWhere($property, Str::none());
    }
}
