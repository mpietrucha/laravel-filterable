<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Preset;

use Mpietrucha\Laravel\Filterable\Filter\Concerns\Attribute;
use Mpietrucha\Laravel\Filterable\Filter\Concerns\Dependant;
use Mpietrucha\Laravel\Filterable\Filter\Preset;

class IsNot extends Preset
{
    use Attribute\Ne, Dependant\Text;
}
