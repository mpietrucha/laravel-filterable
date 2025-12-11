<?php

namespace Mpietrucha\Laravel\Filterable\Handler\Embedded;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Mpietrucha\Laravel\Filterable\Handler\Embedded;
use Mpietrucha\Utility\Enumerable\Contracts\EnumerableInterface;
use Mpietrucha\Utility\Normalizer;
use Mpietrucha\Utility\Str;

class In extends Embedded
{
    /**
     * @return \Mpietrucha\Utility\Enumerable\Contracts\EnumerableInterface<int, string>
     */
    public static function value(mixed $value): EnumerableInterface
    {
        return Normalizer::string($value) |> Str::lines(...);
    }

    public function apply(Builder $query, string $property, mixed $value): void
    {
        $query->whereIn($property, static::value($value));
    }
}
