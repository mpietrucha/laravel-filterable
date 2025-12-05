<?php

namespace Mpietrucha\Laravel\Filterable\Query\Contracts;

use Mpietrucha\Laravel\Filterable\Contracts\FilterInterface;
use Mpietrucha\Laravel\Filterable\Contracts\QueryInterface;

interface RowInterface extends InteractsWithInputInterface
{
    public function property(ContextInterface $context): ?string;

    public function filter(ContextInterface $context): ?FilterInterface;

    public function value(ContextInterface $context): mixed;

    public function apply(QueryInterface $query): void;
}
