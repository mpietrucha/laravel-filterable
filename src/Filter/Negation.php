<?php

namespace Mpietrucha\Laravel\Filterable\Filter;

use Illuminate\Contracts\Database\Query\Builder;
use Mpietrucha\Utility\Arr;
use Mpietrucha\Utility\Concerns\Creatable;
use Mpietrucha\Utility\Contracts\CreatableInterface;
use Mpietrucha\Utility\Normalizer;
use Mpietrucha\Utility\Value;
use Mpietrucha\Utility\Value\Contracts\EvaluationInterface;

/**
 * @phpstan-import-type MixedArray from \Mpietrucha\Utility\Arr
 */
class Negation implements CreatableInterface
{
    use Creatable;

    /**
     * @param  null|MixedArray  $arguments
     */
    public function __construct(protected mixed $handler, protected ?array $arguments = null)
    {
    }

    public function __invoke(Builder $query): void
    {
        $arguments = $this->arguments();

        Arr::prepend($arguments, $query) |> $this->handler()->eval(...);
    }

    protected function handler(): EvaluationInterface
    {
        return $this->handler |> Value::for(...);
    }

    /**
     * @return MixedArray
     */
    protected function arguments(): array
    {
        return $this->arguments |> Normalizer::array(...);
    }
}
