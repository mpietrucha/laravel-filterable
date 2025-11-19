<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Concerns\Attribute;

use Mpietrucha\Laravel\Filterable\Enums\Attribute;

/**
 * @phpstan-require-implements \Mpietrucha\Laravel\Filterable\Contracts\FilterInterface
 */
trait Eq
{
    public function attribute(): string
    {
        return Attribute::EQ->value;
    }
}
