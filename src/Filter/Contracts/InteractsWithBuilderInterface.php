<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Contracts;

use Mpietrucha\Laravel\Filterable\Contracts\FilterInterface;

interface InteractsWithBuilderInterface extends FilterInterface
{
    public static function builder(string $name): BuilderInterface;
}
