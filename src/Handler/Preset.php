<?php

namespace Mpietrucha\Laravel\Filterable\Handler;

use Mpietrucha\Laravel\Filterable\Handler\Concerns\Applicable;
use Mpietrucha\Laravel\Filterable\Handler\Contracts\HandlerInterface;
use Mpietrucha\Utility\Concerns\Creatable;

abstract class Preset implements HandlerInterface
{
    use Applicable, Creatable;
}
