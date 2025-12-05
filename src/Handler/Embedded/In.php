<?php

namespace Mpietrucha\Laravel\Filterable\Handler\Embedded;

use Illuminate\Contracts\Database\Query\Builder;
use Mpietrucha\Laravel\Filterable\Handler\Embedded;
use Mpietrucha\Utility\Normalizer;
use Mpietrucha\Utility\Str;

class In extends Embedded
{
    public function __invoke(Builder $query, string $property, mixed $value): void
    {
        $value = Normalizer::string($value) |> Str::lines(...);

        $query->whereIn($property, $value);
    }
}
