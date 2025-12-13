<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Concerns\Handler;

use Mpietrucha\Laravel\Filterable\Handler;

/**
 * @phpstan-require-implements \Mpietrucha\Laravel\Filterable\Filter\Contracts\FilterInterface
 */
trait In
{
    public function handler(): callable
    {
        return Handler::in();
    }
}
