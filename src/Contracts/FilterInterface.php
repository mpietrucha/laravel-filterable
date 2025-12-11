<?php

namespace Mpietrucha\Laravel\Filterable\Contracts;

use Illuminate\Contracts\Database\Eloquent\Builder;

interface FilterInterface extends ApplicableInterface, FieldInterface
{
    public function handler(): mixed;

    public function dependant(): string;

    public function negate(Builder $query, string $property, mixed $value, ?callable $handler = null): void;
}
