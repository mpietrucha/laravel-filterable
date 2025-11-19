<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Concerns;

use Mpietrucha\Laravel\Filterable\Filter\Builder;
use Mpietrucha\Laravel\Filterable\Filter\Contracts\BuilderInterface;

/**
 * @phpstan-require-implements \Mpietrucha\Laravel\Filterable\Filter\Contracts\InteractsWithBuilderInterface
 */
trait InteractsWithBuilder
{
    public static function builder(string $name): BuilderInterface
    {
        return Builder::name($name);
    }
}
