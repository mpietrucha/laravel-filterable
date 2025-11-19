<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Enums;

enum Attribute: string
{
    case EQ = '=';

    case GT = '>';

    case GTE = '>=';

    case LT = '<';

    case LTE = '<=';
}
