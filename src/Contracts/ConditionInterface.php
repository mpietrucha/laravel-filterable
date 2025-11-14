<?php

namespace Mpietrucha\Laravel\Filterable\Contracts;

use Mpietrucha\Utility\Enumerable\Contracts\EnumerableInterface;

interface ConditionInterface extends FieldInterface, InteractsWithInputInterface
{
    /**
     * @return \Mpietrucha\Utility\Enumerable\Contracts\EnumerableInterface<int, \Mpietrucha\Laravel\Filterable\Contracts\FilterInterface>
     */
    public function filters(): EnumerableInterface;
}
