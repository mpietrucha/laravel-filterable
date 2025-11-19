<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Embedded;

use Mpietrucha\Laravel\Filterable\Filter\Concerns\Apply;
use Mpietrucha\Laravel\Filterable\Filter\Concerns\Dependant;
use Mpietrucha\Laravel\Filterable\Filter\Embedded;

class Contains extends Embedded
{
    use Apply\Contains, Dependant\Text;
}
