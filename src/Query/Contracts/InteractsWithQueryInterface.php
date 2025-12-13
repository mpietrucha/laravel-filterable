<?php

namespace Mpietrucha\Laravel\Filterable\Query\Contracts;

use Illuminate\Contracts\Database\Eloquent\Builder;

interface InteractsWithQueryInterface
{
    public static function query(Builder $query): QueryInterface;
}
