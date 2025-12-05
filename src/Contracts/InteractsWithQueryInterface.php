<?php

namespace Mpietrucha\Laravel\Filterable\Contracts;

use Illuminate\Contracts\Database\Query\Builder;

interface InteractsWithQueryInterface
{
    public static function query(Builder $query): QueryInterface;
}
