<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Concerns\Dependant;

use Mpietrucha\Laravel\Filterable\Filter\Enums\Dependant;

/**
 * @phpstan-require-implements \Mpietrucha\Laravel\Filterable\Contracts\FilterInterface
 */
trait None
{
    public function dependant(): string
    {
        return Dependant::NONE->value;
    }
}
