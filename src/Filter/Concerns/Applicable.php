<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Concerns;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Mpietrucha\Utility\Value;

/**
 * @phpstan-require-implements \Mpietrucha\Laravel\Filterable\Filter\Contracts\FilterInterface
 */
trait Applicable
{
    use \Mpietrucha\Laravel\Filterable\Handler\Concerns\Applicable;

    public function apply(Builder $query, string $property, mixed $value): void
    {
        $evaluation = $this->handler() |> Value::for(...);

        match (true) {
            $evaluation->supported() => $evaluation->get($query, $property, $value),
            default => $query->where($property, $this->attribute(), $value)
        };
    }
}
