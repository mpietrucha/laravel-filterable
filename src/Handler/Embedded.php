<?php

namespace Mpietrucha\Laravel\Filterable\Handler;

use Mpietrucha\Laravel\Filterable\Contracts\HandlerInterface;
use Mpietrucha\Utility\Concerns\Creatable;

abstract class Embedded implements HandlerInterface
{
    use Creatable;
}
