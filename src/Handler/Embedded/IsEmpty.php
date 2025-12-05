<?php

namespace Mpietrucha\Laravel\Filterable\Handler\Embedded;

use Illuminate\Contracts\Database\Query\Builder;
use Mpietrucha\Laravel\Filterable\Handler\Embedded;
use Mpietrucha\Utility\Str;

class IsEmpty extends Embedded
{
    public function __invoke(Builder $query, string $property, mixed $value): void
    {
        $query->whereNull($property);
        $query->orWhere($property, Str::none());
    }
}
