<?php

namespace Mpietrucha\Laravel\Filterable\Query\Contracts;

use Mpietrucha\Laravel\Filterable\Contracts\FilterInterface;

interface RowInterface extends ApplicableInterface, InteractsWithInputInterface
{
    public function property(ContextInterface $context): ?string;

    public function filter(ContextInterface $context): ?FilterInterface;

    public function value(ContextInterface $context): mixed;
}
