<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Embedded;

use Mpietrucha\Laravel\Filterable\Filter\Embedded;

class Lte extends Embedded
{
    public function attribute(): string
    {
        return '<=';
    }
}
