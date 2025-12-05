<?php

namespace Mpietrucha\Laravel\Filterable\Handler\Embedded;

use Illuminate\Contracts\Database\Query\Builder;
use Mpietrucha\Laravel\Filterable\Handler\Embedded;
use Mpietrucha\Utility\Normalizer;
use Mpietrucha\Utility\Str;

class EndsWith extends Embedded
{
    public function __invoke(Builder $query, string $property, mixed $value): void
    {
        $value = Str::start(Normalizer::string($value), '%');

        $query->whereLike($property, $value);
    }
}
