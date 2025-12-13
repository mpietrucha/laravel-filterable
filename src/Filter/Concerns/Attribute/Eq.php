<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Concerns\Attribute;

use Mpietrucha\Laravel\Filterable\Filter\Enums\Attribute;

/**
 * @phpstan-require-implements \Mpietrucha\Laravel\Filterable\Filter\Contracts\FilterInterface
 */
trait Eq
{
    public function attribute(): string
    {
        return Attribute::EQ->value();
    }
}
