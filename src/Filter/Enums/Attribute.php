<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Enums;

use Mpietrucha\Utility\Enums\Concerns\InteractsWithEnum;
use Mpietrucha\Utility\Enums\Contracts\InteractsWithEnumInterface;

enum Attribute: string implements InteractsWithEnumInterface
{
    use InteractsWithEnum;

    case EQ = '=';

    case NE = '!=';

    case GT = '>';

    case GTE = '>=';

    case LT = '<';

    case LTE = '<=';
}
