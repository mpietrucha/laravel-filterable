<?php

namespace Mpietrucha\Laravel\Filterable\Contracts;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Mpietrucha\Utility\Contracts\CreatableInterface;

interface HandlerInterface extends ApplicableInterface, CreatableInterface
{
    public function __invoke(Builder $query, string $property, mixed $value): void;
}
