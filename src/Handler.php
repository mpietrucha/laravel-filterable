<?php

namespace Mpietrucha\Laravel\Filterable;

use Mpietrucha\Laravel\Filterable\Handler\Concerns\InteractsWithHandlers;
use Mpietrucha\Laravel\Filterable\Handler\Contracts\InteractsWithHandlersInterface;
use Mpietrucha\Laravel\Filterable\Handler\Preset;

abstract class Handler extends Preset implements InteractsWithHandlersInterface
{
    use InteractsWithHandlers;
}
