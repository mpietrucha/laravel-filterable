<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Embedded;

use Mpietrucha\Laravel\Filterable\Filter\Embedded;

class Gt extends Embedded
{
    public function attribute(): string
    {
        return '>';
    }
}
