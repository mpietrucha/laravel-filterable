<?php

namespace Mpietrucha\Laravel\Filterable\Query\Contracts;

use Mpietrucha\Laravel\Filterable\Contracts\QueryInterface;

interface ApplicableInterface
{
    public function apply(QueryInterface $query): void;
}
