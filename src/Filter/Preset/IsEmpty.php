<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Preset;

use Mpietrucha\Laravel\Filterable\Filter\Concerns\Dependant;
use Mpietrucha\Laravel\Filterable\Filter\Concerns\Handler;
use Mpietrucha\Laravel\Filterable\Filter\Preset;

class IsEmpty extends Preset
{
    use Dependant\None, Handler\IsEmpty;
}
