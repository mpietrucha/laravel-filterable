<?php

namespace Mpietrucha\Laravel\Filterable\Query\Contracts;

/**
 * @internal
 */
interface ApplicableInterface
{
    public function apply(QueryInterface $query): void;
}
