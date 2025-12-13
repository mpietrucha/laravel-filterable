<?php

namespace Mpietrucha\Laravel\Filterable\Handler\Concerns;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Mpietrucha\Laravel\Filterable\Query\Evaluation;

/**
 * @phpstan-require-implements \Mpietrucha\Laravel\Filterable\Handler\Contracts\HandlerInterface
 */
trait Applicable
{
    public function __invoke(Builder $query, string $property, mixed $value): void
    {
        $this->apply($query, $property, $value);
    }

    public function negate(Builder $query, string $property, mixed $value): void
    {
        $handler = $this->apply(...);

        Evaluation::not($query, $handler)->get($property, $value);
    }
}
