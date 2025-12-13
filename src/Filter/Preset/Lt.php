<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Preset;

use Mpietrucha\Laravel\Filterable\Filter\Concerns\Attribute;
use Mpietrucha\Laravel\Filterable\Filter\Concerns\Dependant;
use Mpietrucha\Laravel\Filterable\Filter\Preset;

class Lt extends Preset
{
    use Attribute\Lt, Dependant\Number;
}
