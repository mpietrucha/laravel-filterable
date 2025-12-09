<?php

namespace Mpietrucha\Laravel\Filterable\Query;

use Mpietrucha\Laravel\Filterable\Contracts\FilterInterface;
use Mpietrucha\Laravel\Filterable\Contracts\QueryInterface;
use Mpietrucha\Laravel\Filterable\Query\Contracts\ApplicableInterface;
use Mpietrucha\Utility\Concerns\Creatable;
use Mpietrucha\Utility\Contracts\CreatableInterface;
use Mpietrucha\Utility\Str;
use Mpietrucha\Utility\Type;

class Expression implements ApplicableInterface, CreatableInterface
{
    use Creatable;

    public function __construct(protected string $property, protected FilterInterface $filter, protected mixed $value, protected ?string $relation = null)
    {
    }

    public function __invoke(QueryInterface $query): void
    {
        $this->apply($query);
    }

    public static function build(string $property, FilterInterface $filter, mixed $value): static
    {
        $elements = Str::explode($property, $delimiter = Str::dot());

        $property = $elements->pop();

        $relation = $elements->join($delimiter);

        return static::create($property, $filter, $value, Str::nullWhenEmpty($relation));
    }

    public static function handle(QueryInterface $query, string $property, FilterInterface $filter, mixed $value): void
    {
        $expression = static::build($property, $filter, $value);

        $relation = $expression->relation();

        match (true) {
            Type::string($relation) => $query->relation($relation, $expression),
            default => $expression->apply($query)
        };
    }

    public function apply(QueryInterface $query): void
    {
        $this->filter()->apply(
            $query,
            $this->property() |> $query->getModel()->qualifyColumn(...),
            $this->value()
        );
    }

    public function relation(): ?string
    {
        return $this->relation;
    }

    public function property(): string
    {
        return $this->property;
    }

    protected function filter(): FilterInterface
    {
        return $this->filter;
    }

    protected function value(): mixed
    {
        return $this->value;
    }
}
