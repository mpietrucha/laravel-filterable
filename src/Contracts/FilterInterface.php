<?php

namespace Mpietrucha\Laravel\Filterable\Contracts;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Mpietrucha\Utility\Contracts\CompatibleInterface;

interface FilterInterface extends CompatibleInterface, FieldInterface
{
    public function handler(): mixed;

    public function dependant(): string;

    public function apply(Builder $query, string $property, mixed $value): void;

    public function negate(Builder $query, string $property, mixed $value, ?callable $handler = null): void;
}
