<?php

namespace Mpietrucha\Laravel\Filterable\Filter;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Mpietrucha\Utility\Arr;
use Mpietrucha\Utility\Concerns\Creatable;
use Mpietrucha\Utility\Contracts\CreatableInterface;
use Mpietrucha\Utility\Normalizer;
use Mpietrucha\Utility\Value;
use Mpietrucha\Utility\Value\Contracts\EvaluationInterface;

class Negation implements CreatableInterface
{
    use Creatable;

    /**
     * @param  null|array<array-key, mixed>  $arguments
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
     * @return array<array-key, mixed>
     */
    protected function arguments(): array
    {
        return $this->arguments |> Normalizer::array(...);
    }
}
