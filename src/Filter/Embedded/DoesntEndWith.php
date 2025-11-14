<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Embedded;

use Mpietrucha\Laravel\Filterable\Filter\Concerns\Negatable;

class DoesntEndWith extends EndsWith
{
    use Negatable;
}
