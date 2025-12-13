<?php

namespace Mpietrucha\Laravel\Filterable\Handler\Preset;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Mpietrucha\Laravel\Filterable\Handler\Preset;
use Mpietrucha\Utility\Str;

class IsEmpty extends Preset
{
    public function apply(Builder $query, string $property, mixed $value): void
    {
        $query->whereNull($property);
        $query->orWhere($property, Str::none());
    }
}
