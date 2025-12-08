<?php

namespace Mpietrucha\Laravel\Filterable;

use Mpietrucha\Laravel\Filterable\Concerns\InteractsWithConditions;
use Mpietrucha\Laravel\Filterable\Concerns\InteractsWithInput;
use Mpietrucha\Laravel\Filterable\Contracts\ConditionInterface;
use Mpietrucha\Laravel\Filterable\Contracts\FilterInterface;
use Mpietrucha\Utility\Enumerable\Contracts\EnumerableInterface;

/**
 * @phpstan-import-type ConditionFiltersCollection from \Mpietrucha\Laravel\Filterable\Contracts\ConditionInterface
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
