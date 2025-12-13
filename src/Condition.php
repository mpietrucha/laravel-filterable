<?php

namespace Mpietrucha\Laravel\Filterable;

use Mpietrucha\Laravel\Filterable\Condition\Concerns\InteractsWithConditions;
use Mpietrucha\Laravel\Filterable\Condition\Contracts\ConditionInterface;
use Mpietrucha\Laravel\Filterable\Field\Concerns\InteractsWithInput;
use Mpietrucha\Laravel\Filterable\Filter\Contracts\FilterInterface;
use Mpietrucha\Utility\Enumerable\Contracts\EnumerableInterface;

/**
 * @phpstan-import-type ConditionFiltersCollection from \Mpietrucha\Laravel\Filterable\Condition\Contracts\ConditionInterface
 */
class Condition extends Field implements ConditionInterface
{
    use InteractsWithConditions, InteractsWithInput;

    /**
     * @var null|ConditionFiltersCollection
     */
    protected ?EnumerableInterface $filters = null;

    public function __construct(string $name, ?string $attribute = null, mixed $filters = null)
    {
        $this->use($filters);

        $this->field($name, $attribute);
    }

    public function filters(): EnumerableInterface
    {
        return $this->filters ??= $this->input()->values()->ensure(FilterInterface::class);
    }

    public function jsonSerialize(): array
    {
        return [
            'filters' => $this->filters()->map->jsonSerialize()->all(),
        ] |> parent::jsonSerialize(...);
    }
}
