<?php

namespace Mpietrucha\Laravel\Filterable\Handler\Embedded;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Mpietrucha\Laravel\Filterable\Handler\Embedded;
use Mpietrucha\Utility\Str;

class IsEmpty extends Embedded
{
    public static function value(): string
    {
        return Str::none();
    }

    public function apply(Builder $query, string $property, mixed $value): void
    {
        $query->whereNull($property);
        $query->orWhere($property, static::value());
    }
}
