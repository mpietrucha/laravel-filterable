<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Contracts;

interface InteractsWithBuilderInterface
{
    public static function builder(string $name): BuilderInterface;
}
