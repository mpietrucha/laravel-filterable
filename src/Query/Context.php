<?php

namespace Mpietrucha\Laravel\Filterable\Query;

use Mpietrucha\Laravel\Filterable\Query\Contracts\ContextInterface;
use Mpietrucha\Laravel\Filterable\Query\Enums\Attribute;
use Mpietrucha\Utility\Collection;
use Mpietrucha\Utility\Concerns\Creatable;
use Mpietrucha\Utility\Contracts\CreatableInterface;

/**
 * @phpstan-type ContextCollection \Mpietrucha\Utility\Collection<string, string>
 */
class Context implements ContextInterface, CreatableInterface
{
    use Creatable;

    /**
     * @var ContextCollection
     */
    protected ?Collection $context = null;

    public function use(Attribute $attribute, string $value): void
    {
        $this->context()->put($attribute->value, $value);
    }

    public function property(): string
    {
        return Attribute::PROPERTY |> $this->get(...) ?? 'property';
    }

    public function filter(): string
    {
        return Attribute::FILTER |> $this->get(...) ?? 'filter';
    }

    public function value(): string
    {
        return Attribute::VALUE |> $this->get(...) ?? 'value';
    }

    public function request(): string
    {
        return Attribute::REQUEST |> $this->get(...) ?? 'filterable';
    }

    protected function get(Attribute $attribute): ?string
    {
        return $this->context() |> $attribute->lookup(...);
    }

    /**
     * @return ContextCollection
     */
    protected function context(): Collection
    {
        return $this->context ??= Collection::create();
    }
}
