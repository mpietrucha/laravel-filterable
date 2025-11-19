<?php

namespace Mpietrucha\Laravel\Filterable;

use Mpietrucha\Laravel\Filterable\Concerns\InteractsWithHandlers;
use Mpietrucha\Laravel\Filterable\Contracts\InteractsWithHandlersInterface;
use Mpietrucha\Laravel\Filterable\Handler\Embedded;

abstract class Handler extends Embedded implements InteractsWithHandlersInterface
{
    use InteractsWithHandlers;
}
