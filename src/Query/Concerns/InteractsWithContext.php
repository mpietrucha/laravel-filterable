<?php

namespace Mpietrucha\Laravel\Filterable\Query\Concerns;

use Mpietrucha\Laravel\Filterable\Query\Context;
use Mpietrucha\Laravel\Filterable\Query\Contracts\ContextInterface;
use Mpietrucha\Laravel\Filterable\Query\Enums\Attribute;

/**
 * @phpstan-require-implements \Mpietrucha\Laravel\Filterable\Query\Contracts\InteractsWithContextInterface
 */
trait InteractsWithContext
{
    protected ?ContextInterface $context = null;

    public function property(string $property): static
    {
        $this->context()->use(Attribute::PROPERTY, $property);

        return $this;
    }

    public function filter(string $filter): static
    {
        $this->context()->use(Attribute::FILTER, $filter);

        return $this;
    }

    public function value(string $value): static
    {
        $this->context()->use(Attribute::VALUE, $value);

        return $this;
    }

    public function request(string $request): static
    {
        $this->context()->use(Attribute::REQUEST, $request);

        return $this;
    }

    public function context(): ContextInterface
    {
        return $this->context ??= Context::create();
    }
}
