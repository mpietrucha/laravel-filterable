<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Contracts;

use Mpietrucha\Laravel\Filterable\Handler\Contracts\HandlerInterface;

interface FilterInterface extends HandlerInterface
{
    public function handler(): mixed;

    public function dependant(): string;
}
