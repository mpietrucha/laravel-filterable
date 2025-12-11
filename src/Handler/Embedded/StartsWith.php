<?php

namespace Mpietrucha\Laravel\Filterable\Handler\Embedded;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Mpietrucha\Laravel\Filterable\Handler\Embedded;
use Mpietrucha\Utility\Normalizer;
use Mpietrucha\Utility\Str;

class StartsWith extends Embedded
{
    public static function value(mixed $value): string
    {
        return Str::finish(Normalizer::string($value), '%');
    }

    public function apply(Builder $query, string $property, mixed $value): void
    {
        $query->whereLike($property, static::value($value));
    }
}
