<?php

namespace Mpietrucha\Laravel\Filterable\Contracts;

use Mpietrucha\Utility\Enumerable\Contracts\EnumerableInterface;

/**
 * @phpstan-type ConditionFiltersCollection \Mpietrucha\Utility\Enumerable\Contracts\EnumerableInterface<int, \Mpietrucha\Laravel\Filterable\Contracts\FilterInterface>
 */
interface ConditionInterface extends FieldInterface, InteractsWithInputInterface
{
    /**
     * @return ConditionFiltersCollection
     */
    public function filters(): EnumerableInterface;
}
