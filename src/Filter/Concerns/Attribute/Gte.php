<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Concerns\Attribute;

use Mpietrucha\Laravel\Filterable\Enums\Attribute;

/**
 * @phpstan-require-implements \Mpietrucha\Laravel\Filterable\Contracts\FilterInterface
 */
trait Gte
{
    public function attribute(): string
    {
        return Attribute::GTE->value;
    }
}
