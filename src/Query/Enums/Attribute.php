<?php

namespace Mpietrucha\Laravel\Filterable\Query\Enums;

enum Attribute: string
{
    case PROPERTY = 'property';

    case FILTER = 'filter';

    case VALUE = 'value';

    case REQUEST = 'request';
}
