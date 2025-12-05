<?php

namespace Mpietrucha\Laravel\Filterable\Query\Contracts;

use Mpietrucha\Laravel\Filterable\Contracts\QueryInterface;

interface GroupInterface extends InteractsWithInputInterface
{
    public function apply(QueryInterface $query): void;
}
