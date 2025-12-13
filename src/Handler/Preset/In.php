<?php

namespace Mpietrucha\Laravel\Filterable\Handler\Preset;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Mpietrucha\Laravel\Filterable\Handler\Preset;
use Mpietrucha\Utility\Normalizer;
use Mpietrucha\Utility\Str;

class In extends Preset
{
    public function apply(Builder $query, string $property, mixed $value): void
    {
        $value = Normalizer::string($value);

        $query->whereIn($property, Str::lines($value));
    }
}
