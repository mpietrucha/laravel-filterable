<?php

namespace Mpietrucha\Laravel\Filterable;

use Mpietrucha\Laravel\Filterable\Enums\Dependant;
use Mpietrucha\Laravel\Filterable\Filter\Embedded;

class Filter extends Embedded
{
    public function __construct(string $name, ?string $attribute = null, protected mixed $handler = null, protected ?Dependant $dependant = null)
    {
        $this->field($name, $attribute);
    }

    public function handler(): mixed
    {
        return $this->handler;
    }

    public function dependant(): Dependant
    {
        return $this->dependant ?? parent::dependant();
    }
}
