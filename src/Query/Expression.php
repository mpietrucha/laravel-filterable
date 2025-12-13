<?php

namespace Mpietrucha\Laravel\Filterable\Query;

use Mpietrucha\Laravel\Filterable\Filter\Contracts\FilterInterface;
use Mpietrucha\Laravel\Filterable\Query\Contracts\ApplicableInterface;
use Mpietrucha\Laravel\Filterable\Query\Contracts\QueryInterface;
use Mpietrucha\Utility\Concerns\Creatable;
use Mpietrucha\Utility\Contracts\CreatableInterface;
use Mpietrucha\Utility\Normalizer;
use Mpietrucha\Utility\Str;
use Mpietrucha\Utility\Type;
use Mpietrucha\Utility\Value;

class Expression implements ApplicableInterface, CreatableInterface
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

        $expression = static::create($property, $filter, $value);

        $relation = $elements->join($delimiter);

        $expression->apply($query, Str::nullWhenEmpty($relation));
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
        if ($this->relation($query, $relation)) {
            return;
        }

        $evaluation = $this->filter()->apply(...) |> Value::attempt(...);

        $evaluation->eval([
            $query,
            $this->property() |> $query->getModel()->qualifyColumn(...),
            $this->value(),
        ]);
    }

    protected function relation(QueryInterface $query, ?string $relation = null): bool
    {
        if (Type::null($relation)) {
            return false;
        }

        return $query->relation($relation, $this) |> Normalizer::boolean(...);
    }
}
