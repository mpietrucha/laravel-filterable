<?php

namespace Mpietrucha\Laravel\Filterable\Filter\Exception;

use Mpietrucha\Utility\Throwable\RuntimeException;

class FilterException extends RuntimeException
{
    public function configure(string $filter): string
    {
        return 'Filter `%s` not found';
    }
}
