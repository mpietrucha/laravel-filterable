<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Embedded;

use Mpietrucha\Laravel\Filterable\Filter\Embedded;

class Eq extends Embedded
{
    public function attribute(): string
    {
        return '=';
    }
}
