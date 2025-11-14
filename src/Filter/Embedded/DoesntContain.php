<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Embedded;

use Mpietrucha\Laravel\Filterable\Filter\Concerns\Negatable;

class DoesntContain extends Contains
{
    use Negatable;
}
