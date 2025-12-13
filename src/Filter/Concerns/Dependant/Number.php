<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Concerns\Dependant;

use Mpietrucha\Laravel\Filterable\Filter\Enums\Dependant;

/**
 * @phpstan-require-implements \Mpietrucha\Laravel\Filterable\Filter\Contracts\FilterInterface
 */
trait Number
{
    public function dependant(): string
    {
        return Dependant::NUMBER->value();
    }
}
