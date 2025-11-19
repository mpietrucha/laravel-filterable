<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Embedded;

use Mpietrucha\Laravel\Filterable\Filter\Concerns\Apply;
use Mpietrucha\Laravel\Filterable\Filter\Concerns\Dependant;
use Mpietrucha\Laravel\Filterable\Filter\Embedded;

class StartsWith extends Embedded
{
    use Apply\StartsWith, Dependant\Text;
}
