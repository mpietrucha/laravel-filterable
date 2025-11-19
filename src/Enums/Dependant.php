<?php

namespace Mpietrucha\Laravel\Filterable\Enums;

enum Dependant: string
{
    case NONE = 'none';

    case TEXT = 'text';

    case NUMBER = 'number';

    case IN = 'in';
}
