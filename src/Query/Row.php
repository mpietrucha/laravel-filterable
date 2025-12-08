<?php

namespace Mpietrucha\Laravel\Filterable\Query;

use Mpietrucha\Laravel\Filterable\Contracts\FilterInterface;
use Mpietrucha\Laravel\Filterable\Contracts\QueryInterface;
use Mpietrucha\Laravel\Filterable\Query\Concerns\InteractsWithInput;
use Mpietrucha\Laravel\Filterable\Query\Contracts\ContextInterface;
use Mpietrucha\Laravel\Filterable\Query\Contracts\RowInterface;
use Mpietrucha\Laravel\Filterable\Storage;
use Mpietrucha\Utility\Concerns\Compatible;
use Mpietrucha\Utility\Concerns\Creatable;
use Mpietrucha\Utility\Contracts\CompatibleInterface;
use Mpietrucha\Utility\Contracts\CreatableInterface;
use Mpietrucha\Utility\Type;

class Row implements CompatibleInterface, CreatableInterface, RowInterface
{
    use Compatible, Creatable, InteractsWithInput;

    public function property(ContextInterface $context): ?string
    {
        $property = $context->property() |> $this->input()->get(...);

        return match (true) {
            Type::string($property) => $property,
            default => null
        };
    }

    public function filter(ContextInterface $context): ?FilterInterface
    {
        $filter = $context->filter() |> $this->input()->get(...);

        return match (true) {
            Type::string($filter) => Storage::get($filter),
            default => null
        };
    }

    public function value(ContextInterface $context): mixed
    {
        return $context->value() |> $this->input()->get(...);
    }

    public function apply(QueryInterface $query): void
    {
        $filter = $this->filter($context = $query->context());

        $property = $this->property($context);

        if (static::incompatible($filter)) {
            return;
        }

        if (static::incompatible($property)) {
            return;
        }

        Expression::handle($query, $property, $filter, $this->value($context));
    }

    /**
     * @phpstan-assert-if-true !null $value
     */
    protected static function compatibility(mixed $value): bool
    {
        return Type::not()->null($value);
    }
}
