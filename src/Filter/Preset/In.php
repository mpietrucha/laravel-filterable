<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Preset;

use Mpietrucha\Laravel\Filterable\Filter\Concerns\Dependant;
use Mpietrucha\Laravel\Filterable\Filter\Concerns\Handler;
use Mpietrucha\Laravel\Filterable\Filter\Preset;

class In extends Preset
{
    use Dependant\In, Handler\In;
}
