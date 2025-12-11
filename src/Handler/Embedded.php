<?php

namespace Mpietrucha\Laravel\Filterable\Handler;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Mpietrucha\Laravel\Filterable\Contracts\HandlerInterface;
use Mpietrucha\Utility\Concerns\Creatable;

abstract class Embedded implements HandlerInterface
{
    use Creatable;

    public function __invoke(Builder $query, string $property, mixed $value): void
    {
        $this->apply($query, $property, $value);
    }
}
