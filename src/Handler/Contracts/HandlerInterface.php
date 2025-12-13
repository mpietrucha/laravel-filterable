<?php

namespace Mpietrucha\Laravel\Filterable\Handler\Contracts;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Mpietrucha\Utility\Contracts\CreatableInterface;

interface HandlerInterface extends CreatableInterface
{
    public function __invoke(Builder $query, string $property, mixed $value): void;

    public function apply(Builder $query, string $property, mixed $value): void;

    public function negate(Builder $query, string $property, mixed $value): void;
}
