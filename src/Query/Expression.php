<?php

namespace Mpietrucha\Laravel\Filterable\Query;

use Mpietrucha\Laravel\Filterable\Filter\Contracts\FilterInterface;
use Mpietrucha\Laravel\Filterable\Query\Contracts\QueryInterface;
use Mpietrucha\Utility\Arr;
use Mpietrucha\Utility\Concerns\Creatable;
use Mpietrucha\Utility\Contracts\CreatableInterface;
use Mpietrucha\Utility\Str;
use Mpietrucha\Utility\Type;
use Mpietrucha\Utility\Value;

class Expression implements CreatableInterface
{
    use Creatable;

    public function __construct(protected string $property, protected FilterInterface $filter, protected mixed $value)
    {
    }

    public function __invoke(QueryInterface $query, ?string $relation = null): void
    {
        $this->apply($query, $relation);
    }

    public static function handle(QueryInterface $query, string $property, FilterInterface $filter, mixed $value): void
    {
        $elements = Str::explode($property, $delimiter = Str::dot());

        $property = $elements->pop();

        $relation = $elements->join($delimiter) |> Str::nullWhenEmpty(...);

        static::create($property, $filter, $value)->apply($query, $relation);
    }

    public function property(): string
    {
        return $this->property;
    }

    public function filter(): FilterInterface
    {
        return $this->filter;
    }

    public function value(): mixed
    {
        return $this->value;
    }

    public function apply(QueryInterface $query, ?string $relation = null): void
    {
        $evaluation = $this->filter()->apply(...) |> Value::attempt(...);

        $arguments = [
            $this->property() |> $query->getModel()->qualifyColumn(...),
            $this->value(),
        ];

        if (Type::string($relation)) {
            $query->relation($relation, $evaluation, $arguments);

            return;
        }

        Arr::prepend($arguments, $query) |> $evaluation->eval(...);
    }
}
