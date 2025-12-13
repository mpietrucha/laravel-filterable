<?php

namespace Mpietrucha\Laravel\Filterable;

use Mpietrucha\Laravel\Filterable\Filter\Concerns\InteractsWithBuilder;
use Mpietrucha\Laravel\Filterable\Filter\Concerns\InteractsWithFilters;
use Mpietrucha\Laravel\Filterable\Filter\Contracts\InteractsWithBuilderInterface;
use Mpietrucha\Laravel\Filterable\Filter\Contracts\InteractsWithFiltersInterface;
use Mpietrucha\Laravel\Filterable\Filter\Enums\Dependant;
use Mpietrucha\Laravel\Filterable\Filter\Preset;

abstract class Filter extends Preset implements InteractsWithBuilderInterface, InteractsWithFiltersInterface
{
    use InteractsWithBuilder, InteractsWithFilters;

    public function __construct(string $name, ?string $attribute = null, protected mixed $handler = null, protected ?string $dependant = null)
    {
        $this->field($name, $attribute);
    }

    public function handler(): mixed
    {
        return $this->handler;
    }

    public function dependant(): string
    {
        return $this->dependant ?? Dependant::TEXT->value;
    }
}
