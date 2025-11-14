<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Embedded;

use Mpietrucha\Laravel\Filterable\Filter\Concerns\Negatable;

class DoesntStartWith extends StartsWith
{
    use Negatable;
}
