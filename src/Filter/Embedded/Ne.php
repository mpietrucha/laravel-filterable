<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Embedded;

use Mpietrucha\Laravel\Filterable\Filter\Concerns\Attribute;
use Mpietrucha\Laravel\Filterable\Filter\Concerns\Dependant;
use Mpietrucha\Laravel\Filterable\Filter\Concerns\Negatable;
use Mpietrucha\Laravel\Filterable\Filter\Embedded;

class Ne extends Embedded
{
    use Attribute\Eq, Dependant\Number, Negatable;
}
