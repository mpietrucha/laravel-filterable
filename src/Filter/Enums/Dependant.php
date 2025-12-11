<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Enums;

use Mpietrucha\Utility\Enums\Concerns\InteractsWithEnum;
use Mpietrucha\Utility\Enums\Contracts\InteractsWithEnumInterface;

enum Dependant: string implements InteractsWithEnumInterface
{
    use InteractsWithEnum;

    case NONE = 'none';

    case TEXT = 'text';

    case NUMBER = 'number';

    case IN = 'in';
}
