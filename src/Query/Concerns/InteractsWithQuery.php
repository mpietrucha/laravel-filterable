<?php

namespace Mpietrucha\Laravel\Filterable\Query\Concerns;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Mpietrucha\Laravel\Filterable\Query;
use Mpietrucha\Laravel\Filterable\Query\Contracts\QueryInterface;

/**
 * @phpstan-require-implements \Mpietrucha\Laravel\Filterable\Query\Contracts\InteractsWithQueryInterface
 */
trait InteractsWithQuery
{
    public static function query(Builder $query): QueryInterface
    {
        return Query::create($query);
    }
}
