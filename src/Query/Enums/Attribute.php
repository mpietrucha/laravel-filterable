<?php

namespace Mpietrucha\Laravel\Filterable\Query\Enums;

use Mpietrucha\Utility\Enums\Concerns\InteractsWithEnum;
use Mpietrucha\Utility\Enums\Contracts\InteractsWithEnumInterface;

enum Attribute: string implements InteractsWithEnumInterface
{
    use InteractsWithEnum;

    case PROPERTY = 'property';

    case FILTER = 'filter';

    case VALUE = 'value';

    case REQUEST = 'request';
}
