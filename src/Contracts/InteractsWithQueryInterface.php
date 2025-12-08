<?php

namespace Mpietrucha\Laravel\Filterable\Contracts;

use Illuminate\Contracts\Database\Eloquent\Builder;

interface InteractsWithQueryInterface
{
    public static function query(Builder $query): QueryInterface;
}
