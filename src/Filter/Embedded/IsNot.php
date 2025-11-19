<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Embedded;

use Mpietrucha\Laravel\Filterable\Filter\Concerns\Attribute;
use Mpietrucha\Laravel\Filterable\Filter\Concerns\Dependant;
use Mpietrucha\Laravel\Filterable\Filter\Concerns\Negatable;
use Mpietrucha\Laravel\Filterable\Filter\Embedded;

class IsNot extends Embedded
{
    use Attribute\Eq, Dependant\Text, Negatable;
}
