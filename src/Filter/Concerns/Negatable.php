<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Concerns;

/**
 * @phpstan-require-implements \Mpietrucha\Laravel\Filterable\Filter\Contracts\FilterInterface
 */
trait Negatable
{
    use \Mpietrucha\Laravel\Filterable\Handler\Concerns\Negatable;
}
