<?php

namespace Mpietrucha\Laravel\Filterable\Query\Contracts;

use Mpietrucha\Laravel\Filterable\Query\Enums\Attribute;

interface ContextInterface
{
    public function use(Attribute $property, string $value): void;

    public function property(): string;

    public function filter(): string;

    public function value(): string;

    public function request(): string;
}
