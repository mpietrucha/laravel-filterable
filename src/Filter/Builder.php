<?php

namespace Mpietrucha\Laravel\Filterable\Filter;

use Mpietrucha\Laravel\Filterable\Contracts\FilterInterface;
use Mpietrucha\Laravel\Filterable\Enums\Dependant;
use Mpietrucha\Laravel\Filterable\Filter;
use Mpietrucha\Laravel\Filterable\Filter\Contracts\BuilderInterface;
use Mpietrucha\Utility\Concerns\Arrayable;
use Mpietrucha\Utility\Concerns\Creatable;
use Mpietrucha\Utility\Contracts\CreatableInterface;

class Builder implements BuilderInterface, CreatableInterface
{
    use Arrayable, Creatable;

    protected ?string $attribute = null;

    protected mixed $handler = null;

    protected ?string $dependant = null;

    public function __construct(protected string $name)
    {
    }

    public static function name(string $name): static
    {
        return static::create($name);
    }

    public function toArray(): array
    {
        return [
            $this->name,
            $this->attribute,
            $this->handler,
            $this->dependant,
        ];
    }

    public function attribute(string $attribute): static
    {
        $this->attribute = $attribute;

        return $this;
    }

    public function handler(mixed $handler): static
    {
        $this->handler = $handler;

        return $this;
    }

    public function dependant(string $dependant): static
    {
        $this->dependant = $dependant;

        return $this;
    }

    public function independent(): static
    {
        return Dependant::NONE->value |> $this->dependant(...);
    }

    public function build(): FilterInterface
    {
        return $this->toCollection()->pipeSpread(...) |> Filter::create(...);
    }
}
