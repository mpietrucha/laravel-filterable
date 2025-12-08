<?php

namespace Mpietrucha\Laravel\Filterable\Concerns;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Mpietrucha\Laravel\Filterable\Contracts\QueryInterface;
use Mpietrucha\Laravel\Filterable\Query;

/**
 * @phpstan-require-implements \Mpietrucha\Laravel\Filterable\Contracts\InteractsWithQueryInterface
 */
trait InteractsWithQuery
{
    public static function query(Builder $query): QueryInterface
    {
        return Query::create($query);
    }
}
