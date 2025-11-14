<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Embedded;

use Mpietrucha\Laravel\Filterable\Filter\Embedded;

class Ne extends Embedded
{
    public function attribute(): string
    {
        return '!=';
    }
}
