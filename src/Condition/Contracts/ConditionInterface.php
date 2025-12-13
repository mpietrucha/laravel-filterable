<?php

namespace Mpietrucha\Laravel\Filterable\Condition\Contracts;

use Mpietrucha\Laravel\Filterable\Field\Contracts\FieldInterface;
use Mpietrucha\Laravel\Filterable\Field\Contracts\InteractsWithInputInterface;
use Mpietrucha\Utility\Enumerable\Contracts\EnumerableInterface;

/**
 * @phpstan-type ConditionFiltersCollection \Mpietrucha\Utility\Enumerable\Contracts\EnumerableInterface<int, \Mpietrucha\Laravel\Filterable\Filter\Contracts\FilterInterface>
 */
interface ConditionInterface extends FieldInterface, InteractsWithInputInterface
{
    /**
     * @return ConditionFiltersCollection
     */
    public function filters(): EnumerableInterface;
}
