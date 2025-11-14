<?php

namespace Mpietrucha\Laravel\Filterable\Contracts;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Mpietrucha\Laravel\Filterable\Enums\Dependant;
use Mpietrucha\Laravel\Filterable\Filter\Contracts\BuilderInterface;
use Mpietrucha\Utility\Contracts\CompatibleInterface;

interface FilterInterface extends CompatibleInterface, FieldInterface
{
    public static function builder(string $name): BuilderInterface;

    public function handler(): mixed;

    public function dependant(): Dependant;

    public function apply(Builder $query, string $property, mixed $value): void;

    public function negate(Builder $query, string $property, mixed $value, ?callable $handler = null): void;
}
